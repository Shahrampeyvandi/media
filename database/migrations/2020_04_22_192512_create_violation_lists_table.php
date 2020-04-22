<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViolationListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violation_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('violation_lists')->insert(
            array(
                'name' => 'عدم تطابق با قوانین سایت',
            )
        );
        DB::table('violation_lists')->insert(
            array(
                'name' => 'محتوای نامرتبط',
            )
        );
        DB::table('violation_lists')->insert(
            array(
                'name' => 'درج تبلیغات در محتوا',
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
        Schema::dropIfExists('violation_lists');
    }
}
