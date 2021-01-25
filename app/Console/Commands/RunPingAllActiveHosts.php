<?php

namespace App\Console\Commands;

use App\Actions\PingAllActiveHosts;
use Illuminate\Console\Command;

class RunPingAllActiveHosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ping:allhosts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ping all active hosts';

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
        app(PingAllActiveHosts::class)->execute();
        $this->info('Running');

        return 0;
    }
}
