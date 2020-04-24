<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('members_id');
            $table->foreign('members_id')->references('id')->on('members');
            $table->unsignedBigInteger('posts_id')->nullable();
            $table->foreign('posts_id')->references('id')->on('posts');
            $table->integer('payedprice')->nullable();
            $table->string('payinfo')->nullable();
            $table->boolean('success')->default(0);
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
        Schema::dropIfExists('purchases');
    }
}
