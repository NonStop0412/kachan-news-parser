<?php

namespace App\Console\Commands;

use App\Models\Source;
use App\Jobs\ProcessParser;
use Illuminate\Console\Command;


class Parser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parser';

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
        $sources = Source::all()->where('is_active', 1);

        foreach($sources as $source) {
            ProcessParser::dispatch($source->url);
        }

        echo 'Turn queue:work.' . "\n";
    }
}
