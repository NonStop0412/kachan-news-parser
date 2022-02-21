<?php

namespace App\Console\Commands;

use App\Models\Source;
use Illuminate\Console\Command;

class Sources extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:add_source';

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
        (new Source())->create('Test2', 'http://feeds.feedburner.com/Itcua?format=xmlll');
        echo 'Source is added.' . "\n";
    }
}
