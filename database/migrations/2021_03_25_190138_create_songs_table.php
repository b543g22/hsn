<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            if(!Schema::hasTable('songs')) {
                Schema::create('songs', function (Blueprint $table) {
                    $table->Increments('song_id',10);
                    $table->string('song_title',100);
                    $table->string('lyrics');
                    $table->integer('artist_id')->unsigned();
                    $table->foreign('artist_id')->references('artist_id')->on('artists');
                    $table->timestamps();
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
