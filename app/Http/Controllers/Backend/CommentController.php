<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::latest()->get();

        return view('admin.backend.comments.index' , compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $user = auth()->user();

        $data = $request->commentData($user);

        Comment::create($data);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Comment Created Successfully, wait for admin approval'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, Comment $comment)
    {
       // dd($comment);

        return view('admin.backend.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //dd($comment);

        //$comment->update($request->all());

        $comment->update([
            'is_active' => $request->is_active
        ]);

        $message = $comment->is_active
            ? 'Comment has been approved successfully by admin.'
            : 'Comment has been unapproved successfully by admin.';

        $notification = [
            'alert-type' => 'success',
            'message' =>  $message,
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Comment Deleted Successfully by admin '
        ];

        return redirect()->back()->with($notification);

    }


}
