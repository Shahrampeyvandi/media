<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('subjects')->insert(
            array(
                'name' => 'لغت',
            )
        );
        DB::table('subjects')->insert(
            array(
                'name' => 'گرامر',
            )
        );
        DB::table('subjects')->insert(
            array(
                'name' => 'اصطلاحات',
            )
        );
        DB::table('subjects')->insert(
            array(
                'name' => 'مکالمه',
            )
        );
        DB::table('subjects')->insert(
            array(
                'name' => 'رایتینگ',
            )
        );
        DB::table('subjects')->insert(
            array(
                'name' => 'ریدینگ',
            )
        );
        DB::table('subjects')->insert(
            array(
                'name' => 'سپیکینگ',
            )
        );
        DB::table('subjects')->insert(
            array(
                'name' => 'آیلتس',
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
        Schema::dropIfExists('subjects');
    }
}
