<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('levels')->insert(
            array(
                'name' => 'کودکانه',
            )
        );
        DB::table('levels')->insert(
            array(
                'name' => 'مقدماتی',
            )
        );
        DB::table('levels')->insert(
            array(
                'name' => 'متوسط',
            )
        );
        DB::table('levels')->insert(
            array(
                'name' => 'پیشرفته',
            )
        );
        DB::table('levels')->insert(
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
        Schema::dropIfExists('levels');
    }
}
