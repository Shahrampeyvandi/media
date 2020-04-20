<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('members_id')->nullable();
            $table->foreign('members_id')->references('id')->on('members');
            $table->unsignedBigInteger('comments_id')->nullable();
            $table->foreign('comments_id')->references('id')->on('comments');
            $table->enum('score',['like','dislike']);
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
        Schema::dropIfExists('comments_likes');
    }
}
