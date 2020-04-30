<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');   
            $table->string('avatar')->nullable();
            $table->string('mobile')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->nullable()->unique();
            $table->string('google_id')->nullable();
            $table->string('age')->nullable();
            $table->enum('group',['student','teacher','admin'])->default('student');
            $table->string('certificate')->nullable();
            $table->string('edu_level')->nullable();
            $table->string('history')->nullable();
            $table->string('books')->nullable();
            $table->string('years')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('approved')->default(0);
            $table->enum('ability',['admin','mid-level-admin','member'])->default('member');
            $table->text('aboutus')->nullable();
            $table->timestamps();
        });
        DB::table('members')->insert(
            array(
                'firstname'=>'admin',
                'lastname'=>'admin',
                'avatar'=>null,
                'mobile'=>'09381699949',
                'username'=>'admin',
                'password'=>Hash::make('123456'),
                'email'=>'info@genebartar.com',
                'age'=>'30',
                'group'=>'admin',
                'history'=>null,
                'books'=>null,
                'years'=>'2',
                'active'=>1,
                'ability'=>'admin',

                )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
