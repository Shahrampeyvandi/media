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
            $table->foreign('posts_id')->references('id')->on('posts');
            $table->string('title');
            $table->text('desc');
            $table->string('picture')->nullable();
            $table->string('content_link');
            $table->string('duration')->nullable();
            $table->enum('type',['free','money']);
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('members_id');
            $table->foreign('members_id')->references('id')->on('members');
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
