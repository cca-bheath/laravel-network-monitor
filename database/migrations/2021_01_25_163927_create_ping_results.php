<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePingResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ping_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ping_host_id')->constrained();
            $table->float('latency');
            $table->boolean('successful')
                  ->default(true);
            $table->json('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ping_results');
    }
}
