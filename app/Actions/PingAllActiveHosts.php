<?php

namespace App\Actions;

use App\Models\PingHost;

class PingAllActiveHosts
{
    public function execute()
    {
        $hosts = PingHost::whereEnabled(true)->get();

        foreach ($hosts as $host) {
            dispatch(new \App\Jobs\PingHost($host));
        }
    }
}
