<?php

namespace App\Console\Commands;

use App\Jobs\SpeedTest;
use Illuminate\Console\Command;

class RunSpeedTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedtest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run speed';

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
        dispatch(new SpeedTest());
        $this->info('Running');

        return 0;
    }
}
