<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TranslatePost implements ShouldQueue
{
    use Queueable;
    use InteractsWithQueue;
    use SerializesModels;
    use Dispatchable;



    /**
     * Create a new job instance.
     */
    public function __construct(public Post $post)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        //logger('hello from TranslatePost');
       // AI::translatePost($this->post->description , 'spanish');

        logger('Translate Post' . $this->post->description . ' to Spanish.');
    }
}
