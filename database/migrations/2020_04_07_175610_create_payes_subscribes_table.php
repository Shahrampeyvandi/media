<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayesSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payes_subscribes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('members_id');
            $table->foreign('members_id')->references('id')->on('members');
            $table->unsignedBigInteger('posts_id')->nullable();
            $table->foreign('posts_id')->references('id')->on('members');
            $table->unsignedBigInteger('episods_id')->nullable();
            $table->foreign('episods_id')->references('id')->on('episodes');
            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id')->references('id')->on('purchase');
            $table->string('subscribe_type');
            $table->dateTime('expires_date',0);
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
        Schema::dropIfExists('payes_subscribes');
    }
}
