<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('author_id')->nullable();
            $table->string('title_en');
            $table->string('title_bn');
            $table->string('image')->nullable();
            $table->text('details_en');
            $table->text('details_bn');
            $table->text('tags_en');
            $table->text('tags_bn');
            $table->integer('headline')->nullable();
            $table->integer('first_section')->nullable();
            $table->integer('first_section_thumbnail')->nullable();
            $table->integer('bigthumbnail')->nullable();
            $table->string('post_date');
            $table->string('post_month');
            $table->string('post_year');
            $table->string('soft_delete')->nullable()->default(0);
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
        Schema::dropIfExists('posts');
    }
}
