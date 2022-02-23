<?php

namespace App\Jobs;

use App\Parsing;
use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessParser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $link;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $link)
    {
        $this->link = $link;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $feeds = (new Parsing($this->link))->getFeed();
        (new Article())->unloading($feeds);
    }
}
