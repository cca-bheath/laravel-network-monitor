<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PingResults extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'ping_host_id'  => 'int',
        'latency'       => 'float',
        'successful'    => 'boolean',
        'result'        => 'json',
    ];
}
