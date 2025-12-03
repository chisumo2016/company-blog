# COMMENTS 
    - add the folder comments/index
    - add the folder inside comment and call reply / index
    - add the folder inside comment and call reply / index
    - add url 
      'comments'       => CommentController::class,
        'comment/replies' => CommentReplyController::class,
    - create a controller
        php artisan make:controller Backend/CommentController -r
        php artisan make:controller Backend/CommentReplyController -r

    Create migration 
            php artisan make:model Comment -m
            php artisan make:model CommentReply -m
    Mass Assigment and 
        post has many comments
        comments has many replies

    php artisan make:migration add_photo_column_to_comments --table=comments
    php artisan make:migration add_photo_column_to_comment_replies --table=comment_replies
        
    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        <input type="hidden" value="0">
        @method('PATCH')

        @if($comment->is_active == 1)
            <button class="btn btn-sm btn-success">Active</button>
        @else
            <button class="btn btn-sm btn-secondary">Inactive</button>
        @endif
    </form>

         public function update(Request $request, Comment $comment)
            {
                $comment->is_active = !$comment->is_active;
        
                $comment->save();
        
                return back()->with('success', 'Comment status updated.');
            }
