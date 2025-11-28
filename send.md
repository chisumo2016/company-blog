# SENDING EMAIL
     To send a new email after posting the post to user
        php artisan make:mail PostPosted 

        Route::get('test', function () {
        return new \App\Mail\PostPosted();
        });

    Send Mail
        Route::get('/test', function () {
            \Illuminate\Support\Facades\Mail::to('jeffrey@laracasts.com')
            ->send( new \App\Mail\PostPosted());
            
            return 'done';
            });

    It takes time to deleiver email
