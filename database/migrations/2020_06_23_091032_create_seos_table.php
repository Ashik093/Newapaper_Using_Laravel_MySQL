<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->string('meta_author_en')->nullable();
            $table->string('meta_author_bn')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_bn')->nullable();
            $table->string('meta_keyword_en')->nullable();
            $table->string('meta_keyword_bn')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_bn')->nullable();
            $table->text('google_analytics')->nullable();
            $table->string('google_verifications')->nullable();
            $table->text('alexa_analytics')->nullable();
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
        Schema::dropIfExists('seos');
    }
}
