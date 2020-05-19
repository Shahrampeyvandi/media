<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('latin_name');
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        DB::table('categories')->insert(
            array(
                'name' => 'فیلم',
                'latin_name' => 'videos'
            )
        );
        DB::table('categories')->insert(
            array(
                'name' => 'انیمیشن',
                'latin_name' => 'animations'

            )
        );
        DB::table('categories')->insert(
            array(

                'name' => 'ژن پلاس',
                'latin_name' => 'genplus'

                )
        );
        DB::table('categories')->insert(
            array(
                'name' => 'موسیقی',
                'latin_name' => 'musics'

            )
        );
        DB::table('categories')->insert(
            array(
                'name' => 'پادکست',
                'latin_name' => 'podcasts'

            )
        );
        DB::table('categories')->insert(
            array(
                'name' => 'دوره آموزشی',
                'latin_name' => 'tutorial'

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
        Schema::dropIfExists('categories');
    }
}
