<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posts_id')->nullable();;
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('episodes_id')->nullable();;
            $table->foreign('episodes_id')->references('id')->on('episodes')->onDelete('cascade');
            $table->unsignedBigInteger('members_id')->nullable();
            $table->foreign('members_id')->references('id')->on('members')->onDelete('cascade');
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
        Schema::dropIfExists('likes');
    }
}
