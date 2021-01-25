<?php

namespace App\Console\Commands;

use App\Actions\PingAllActiveHosts;
use App\Models\PingHost;
use Illuminate\Console\Command;

class AddHost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ping:addhost {host}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add host';

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
        PingHost::create([
            'host' => $this->argument('host')
        ]);

        $this->info('Added');

        return 0;
    }
}
