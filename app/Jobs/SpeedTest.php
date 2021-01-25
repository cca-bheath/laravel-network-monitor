<?php

namespace App\Jobs;

use App\Models\SpeedTestResult;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SpeedTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $output = shell_exec('speedtest-cli --json');
        $json = json_decode($output, true);
        SpeedTestResult::create([
            'upload' => $json['upload'],
            'download' => $json['download'],
            'latency' => $json['ping'],
            'result' => $output,
        ]);
    }
}
