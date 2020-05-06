<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('header_slide_count')->default(1);
            $table->integer('footer_slide_count')->default(4);
            $table->string('footer_slider_title');
            $table->integer('commission')->default(50);
            $table->boolean('mainpage_films')->default(1);
            $table->boolean('mainpage_animations')->default(1);
            $table->boolean('mainpage_plus')->default(1);
            $table->boolean('mainpage_musics')->default(1);
            $table->boolean('mainpage_podcasts')->default(1);
            $table->boolean('mainpage_taturials')->default(1);
            $table->timestamps();
        });
        DB::table('settings')->insert(
            array(
                'header_slide_count' => 1,
                'footer_slide_count' => 4,
                'footer_slider_title' => 'نماد های مربوطه',
                'commission' => 50

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
        Schema::dropIfExists('settings');
    }
}
