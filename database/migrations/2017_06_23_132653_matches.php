<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Matches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_one_id')->unsigned();
            $table->integer('team_two_id')->unsigned();
            $table->string('result');
            $table->dateTime('date');
            $table->foreign('team_one_id')->references('id')->on('teams')->onDelete('cascade');

            $table->foreign('team_two_id')->references('id')->on('teams')->onDelete('cascade');

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
        Schema::dropIfExists('teams');

    }
}
