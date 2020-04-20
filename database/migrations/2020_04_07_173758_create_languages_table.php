<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('languages')->insert(
            array(
                'name' => 'انگلیسی امریکن',
            )
        );
        DB::table('languages')->insert(
            array(
                'name' => 'انگلیسی بریتیش',
            )
        );
        DB::table('languages')->insert(
            array(
                'name' => 'سایر زبان ها',
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
        Schema::dropIfExists('language');
    }
}
