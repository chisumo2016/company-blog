<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentReplyRequest;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $replies = CommentReply::all();

        return view('admin.backend.comments.reply.index', compact('replies'));


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
    public function store(Request $request)
    {
        //
    }

    public function replyComment(CommentReplyRequest $request)
    {
        $user = auth()->user();

        $data = $request->replyData($user);

        CommentReply::create($data);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Your reply has been submitted'
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(CommentReply $commentReply)
    {
        dd($commentReply->comment_id);

        return view('admin.backend.comments.reply.show', compact('reply'));
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
    public function update(Request $request, CommentReply $reply)
    {
        //dd($comment);

        //$comment->update($request->all());

        $reply->update([
            'is_active' => $request->is_active
        ]);

        $message = $reply->is_active
            ? 'Comment has been approved successfully by admin.'
            : 'Comment has been unapproved successfully by admin.';

        $notification = [
            'alert-type' => 'success',
            'message' => $message ,
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommentReply $reply)
    {

        $reply->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Comment Reply  Deleted Successfully by admin '
        ];

        return redirect()->back()->with($notification);
    }
}
