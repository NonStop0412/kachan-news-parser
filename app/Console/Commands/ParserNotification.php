<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ParserNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parsingNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = (new \DateTime('-24 hour'));
        $countArticles = ['count' => Article::where('created_at', '>', $date)->count()];

        Mail::send(['text'=> 'mails.parser'], $countArticles, function ($message){
            $message->subject('Parser');
        });

        echo 'Notification, has been sent!' . "\n";
    }
}
