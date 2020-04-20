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
            $table->string('age')->nullable();
            $table->enum('group',['student','teacher','admin']);
            $table->string('history')->nullable();
            $table->string('books')->nullable();
            $table->string('years')->nullable();
            $table->boolean('active')->default(1);
            $table->enum('ability',['admin','mid-level-admin','member']);
            $table->timestamps();
        });
        DB::table('members')->insert(
            array(
                'firstname'=>'admin',
                'lastname'=>'admin',
                'avatar'=>null,
                'mobile'=>'09381699949',
                'username'=>'admin_panel',
                'password'=>Hash::make('123456'),
                'email'=>'email',
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
