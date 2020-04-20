<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_fname');
            $table->string('teacher_lname');
            $table->string('teacher_username')->unique();
            $table->string('teacher_pass');
            $table->string('teacher_email')->nullable();
            $table->string('teacher_age');
            $table->string('teacher_history')->nullable();
            $table->string('teacher_sanavat')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
