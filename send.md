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

# QUEUES 
    config/queue.php

    Change to queue
             if ($post->author && $post->author->email) {
                Mail::to($post->author->email)->send(
                    new \App\Mail\PostPosted($post)
                );
            }


         if ($post->author && $post->author->email) {
                Mail::to($post->author->email)->queue(
                    new \App\Mail\PostPosted($post)
                );
            }

    Job
    Queues
    Worker
    
    Queues Worker command 
    Terminal
        php artisan queue:work
    In production server you need to run this behind , some tools to use 
        eg supervisor

# DISPATCHING A JOB
    dispatch the job -> And the Job is  thrown into the queues ->php artisan queue:work
        Route::get('test' , function () {
            dispatch(function (){
                logger('hello form queues');
            })->delay(5);
        
            return 'done';
        });

# DEDICATED JOB CLASSES
    php artisan make:job TranslatePost

        Route::get('test' , function () {
            \App\Jobs\TranslateJob::dispatch();
            });
    php artisan queue:work

    Always restart the worker after making a code change .

    TERMS
        Queue
        Job
        Worker

# VITE
    HOT RELOADING (HMR)
    Instant updates without reloading the page or losing application state .


     <td>{{ $post->created_at ? $category->created_at->diffForHumans() : 'no date' }}</td>








    

