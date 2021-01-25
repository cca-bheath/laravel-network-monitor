<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PingHost extends Model
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
        'host'    => 'string',
        'enabled' => 'boolean',
    ];
}
