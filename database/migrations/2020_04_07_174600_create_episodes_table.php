<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posts_id');
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('number')->nullable();
            $table->unsignedBigInteger('categories_id')->default(6);
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->unsignedBigInteger('languages_id');
            $table->foreign('languages_id')->references('id')->on('languages');
            $table->unsignedBigInteger('subjects_id');
            $table->foreign('subjects_id')->references('id')->on('subjects');
            $table->unsignedBigInteger('levels_id');
            $table->foreign('levels_id')->references('id')->on('levels');
            $table->string('title');
            $table->text('desc');
            $table->string('picture')->nullable();
            $table->string('content_link')->nullable();
            $table->string('content_name')->nullable();
            $table->string('content_link_low')->nullable();
            $table->string('duration')->nullable();
            $table->enum('type',['free','money']);
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('members_id');
            $table->foreign('members_id')->references('id')->on('members')->onDelete('cascade');
            $table->boolean('confirmed')->default(0);
            $table->string('rejectreason')->nullable();
            $table->text('otheroninformation')->nullable();
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('episodes');
    }
}
