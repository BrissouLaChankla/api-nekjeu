<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->string("username");
            $table->text("avatar");
            $table->integer("score");
            $table->integer("nb_of_musics");

            $table->bigInteger('gametype_id')->unsigned()->nullable()->default(1);
            $table->foreign('gametype_id')->references('id')->on('gametypes');

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
        Schema::dropIfExists('scores');
    }
};
