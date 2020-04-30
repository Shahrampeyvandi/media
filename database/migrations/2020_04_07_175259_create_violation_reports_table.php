<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violation_reports', function (Blueprint $table) {
            $table->id();
            $table->text('info')->nullable();
            $table->unsignedBigInteger('members_id');
            $table->foreign('members_id')->references('id')->on('members')->onDelete('cascade');
            $table->unsignedBigInteger('posts_id')->nullable();
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('episods_id')->nullable();
            $table->foreign('episods_id')->references('id')->on('episodes')->onDelete('cascade');
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
        Schema::dropIfExists('violation_report');
    }
}
