<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_links', function (Blueprint $table) {
            $table->id();
            $table->string('content_link');
            $table->string('pic_address')->nullable();
            $table->enum('type',['image','video']);
            $table->string('cat_id');
           
            $table->integer('view_count');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('advert_links');
    }
}
