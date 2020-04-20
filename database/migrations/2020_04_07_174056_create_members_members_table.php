<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_members', function (Blueprint $table) {
            $table->unsignedBigInteger('members_id_follower');
            $table->unsignedBigInteger('members_id_followed');
            $table->foreign('members_id_follower')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('members_id_followed')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_members');
    }
}
