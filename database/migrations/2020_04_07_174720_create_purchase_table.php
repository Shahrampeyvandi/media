<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('members_id');
            $table->foreign('members_id')->references('id')->on('members');
            $table->unsignedBigInteger('posts_id')->nullable();
            $table->foreign('posts_id')->references('id')->on('members');
            $table->unsignedBigInteger('episods_id')->nullable();
            $table->foreign('episods_id')->references('id')->on('episodes');
            $table->integer('payedprice')->nullable();
            $table->string('payinfo')->nullable();
            $table->boolean('success')->default(0);
            $table->unsignedBigInteger('subscribe_types_id');
            $table->foreign('subscribe_types_id')->references('id')->on('subscribe_types');
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
        Schema::dropIfExists('purchase');
    }
}
