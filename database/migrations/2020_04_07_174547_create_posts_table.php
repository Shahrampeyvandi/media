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
            $table->string('title');
            $table->text('desc');
            $table->string('picture');
            $table->string('content_name')->nullable();
            $table->string('content_link')->nullable();
            $table->string('content_link_low')->nullable();
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('languages_id');
            $table->foreign('languages_id')->references('id')->on('languages')->onDelete('cascade');
            $table->unsignedBigInteger('subjects_id');
            $table->foreign('subjects_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->unsignedBigInteger('levels_id');
            $table->foreign('levels_id')->references('id')->on('levels')->onDelete('cascade');
            $table->enum('media',['video','audio']);
            $table->string('duration')->nullable();
            $table->enum('type',['free','money']);
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('members_id');
            $table->foreign('members_id')->references('id')->on('members')->onDelete('cascade');
            $table->boolean('confirmed')->default(0);
            $table->string('rejectreason')->nullable();
            $table->integer('rejectstatus')->default(0);
            $table->text('otheroninformation')->nullable();
            $table->text('subtitle')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
