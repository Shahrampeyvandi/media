<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['واریز','برداشت'])->default('واریز');
            $table->integer('amount')->default(0);
            $table->unsignedBigInteger('members_id')->nullable();
            $table->foreign('members_id')->references('id')->on('members')->onDelete('cascade');
            $table->unsignedBigInteger('posts_id')->nullable();
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
