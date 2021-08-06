<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrawledVesselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawled_vessels', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('vessel_name', 190);
            $table->bigInteger('imo')->nullable();
            $table->bigInteger('mmsi')->nullable();
            $table->string('call_sign',190)->nullable();
            $table->string('longitude',190)->nullable();
            $table->string('latitude',190)->nullable();
            $table->dateTime('time_received')->nullable();
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
        Schema::dropIfExists('crawled_vessels');
    }
}
