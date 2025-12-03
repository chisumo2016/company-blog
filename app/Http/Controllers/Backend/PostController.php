<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('admin.backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.backend.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //dd($request->tags);
        $data = $request->validated();

        //dd($data);

        /**Handle image upload if provided*/
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid())  . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);

            $img->resize(746,500)->save(public_path('upload/posts/') . $name_generate);

            $data['thumbnail'] = 'upload/posts/' . $name_generate;
            //$save_url = 'upload/posts/' . $name_generate;

               //$data['user_id'] = auth()->id();

            // ✅ Create testimonial using validated request data
            $post = Post::create([
                'category_id'  => $data['category_id'],
                'user_id'      => auth()->id(),
                'title'        => $data['title'],
                'slug'         => Str::slug($data['title']),
                'excerpt'      => $data['excerpt'],
                'thumbnail'    => $data['thumbnail'] ?? null,
                'description'  => $data['description'],
                'is_published' => $data['is_published'] ?? false,
                'published_at' => $data['is_published'] ? now() : null,

            ]);

            /**check if we have the tags */
           if ($request->has('tags')) {

               $post->tags()->attach($request->tags);
           }


            if ($post->author && $post->author->email) {
                Mail::to($post->author->email)->queue(
                    new \App\Mail\PostPosted($post)
                );
            }
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Post Created Successfully'
        ];

        return redirect()->route('posts.index')->with($notification);


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view('home.pages.blog.single-blog', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.backend.posts.edit', compact('post' , 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        /** Handle new image upload */
        if ($request->hasFile('thumbnail')) {

            // Delete old image if exists
            if ($post->thumbnail && file_exists(public_path($post->thumbnail))) {
                unlink(public_path($post->thumbnail));
            }
            $image = $request->file('thumbnail');
            $manager = new ImageManager(new Driver());

            // Unique file name
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            // Resize & save
            $img = $manager->read($image);
            $img->resize(746, 500)->save(public_path('upload/posts/') . $name_generate);

            // Save new path
            $data['thumbnail'] = 'upload/posts/' . $name_generate;
        }

        /** Update slug only if title changed */
        if ($post->title !== $data['title']) {
            $data['slug'] = Str::slug($data['title']);
        }

        /** Update publish logic */
        $data['is_published'] = $data['is_published'] ?? false;
        $data['published_at'] = $data['is_published'] ? now() : null;

        /** Update Post */
        $post->update($data);

        /** remove tags */
        $post->tags()->sync($request->tags);

        /** Notification */
        $notification = [
            'alert-type' => 'success',
            'message'    => 'Post Updated Successfully',
        ];

        return redirect()->route('posts.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete thumbnail file if exists
        if ($post->thumbnail && file_exists(public_path($post->thumbnail))) {
            unlink(public_path($post->thumbnail));
        }

        /*Detach the post */
        $post->tags()->detach();

        // Delete post from database
        $post->delete();

        // Notification
        $notification = [
            'alert-type' => 'success',
            'message'    => 'Post Deleted Successfully',
        ];

        return redirect()->route('posts.index')->with($notification);
    }
}
