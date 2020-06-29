<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prayers', function (Blueprint $table) {
            $table->id();
            $table->string('fajr_en')->nullable();
            $table->string('fajr_bn')->nullable();
            $table->string('johr_en')->nullable();
            $table->string('johr_bn')->nullable();
            $table->string('asor_en')->nullable();
            $table->string('asor_bn')->nullable();
            $table->string('magrib_en')->nullable();
            $table->string('magrib_bn')->nullable();
            $table->string('esha_en')->nullable();
            $table->string('esha_bn')->nullable();
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
        Schema::dropIfExists('prayers');
    }
}
