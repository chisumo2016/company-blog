<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->withCount('posts')->get();

        $app       = App::find(1);

        $posts = Post::with(['author','tags'])
            ->published()
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        $recentPosts = Post::published()
                ->latest()
                ->take(5)
                ->get();


        return view('home.pages.blog.posts', compact('posts' , 'categories' ,'app', 'recentPosts'));
    }

    public function show($slug, Post $post)
    {
        $app       = App::find(1);

        $categories = Category::latest()->withCount('posts')->get();

        $recentPosts = Post::published()
            ->latest()
            ->take(5)
            ->get();



        $post = Post::published()->where('slug', $slug)->firstOrFail();

        //$comments = Comment::all();
        $comments = $post->comments()->whereIsActive(1)->get();




        //d($comments);

        //dd($post);

       return view('home.pages.blog.single-blog', compact(  'app','categories' , 'post', 'recentPosts','comments'
       ));
    }

    public function blogCategory($id)
    {
        $app = App::find(1);

        // Load the category (including name)
        $categoryName = Category::findOrFail($id);

        // Load all posts inside this category
        $CategoryPost = Post::published()
            ->where('category_id', $id)
            ->latest()
            ->get();

        $posts = Post::with('author')
            ->published()
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        $categories = Category::latest()->withCount('posts')->get();
        $recentPosts = Post::published()->latest()->take(5)->get();

        return view('home.pages.blog.blog_category', compact(
            'app',
            'categories',
            'recentPosts',
            'CategoryPost',
            'categoryName',
            'posts'

        ));

       }
    }
