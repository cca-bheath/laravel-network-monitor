<?php

namespace Database\Factories;

use App\Models\PingHost;
use Illuminate\Database\Eloquent\Factories\Factory;

class PingHostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PingHost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'host'    => '8.8.8.8',
            'enabled' => true,
        ];
    }
}
