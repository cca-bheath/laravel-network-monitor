<?php

namespace App\Jobs;

use Acamposm\Ping\Ping;
use Acamposm\Ping\PingCommandBuilder;
use App\Models\PingResults;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PingHost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $host;

    /**
     * Create a new job instance.
     *
     * @param $host
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $command = (new PingCommandBuilder($this->host->host));
        $result = app(Ping::class, ['command' => $command])->run();

        if ($result->host_status == 'Ok') {
            PingResults::create([
                'ping_host_id' => $this->host->id,
                'latency'      => $result->latency,
                'result'       => $result,
            ]);
        } else {
            PingResults::create([
                'ping_host_id' => $this->host->id,
                'latency'      => 0,
                'result'       => $result,
                'successful'   => false,
            ]);
        }
    }
}
