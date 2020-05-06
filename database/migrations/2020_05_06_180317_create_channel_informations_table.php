<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_informations', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->string('kart_melli')->nullable();
            $table->string('madrak')->nullable();
            $table->string('parvane_faaliat')->nullable();
            $table->boolean('accepted')->default(0);
            $table->string('link_telegram')->nullable();
            $table->string('link_whatsapp')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_linkedin')->nullable();
            $table->text('about')->nullable();
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
        Schema::dropIfExists('channel_informations');
    }
}
