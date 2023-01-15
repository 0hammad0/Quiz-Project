<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMistakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mistakes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('series_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('seriesType_id');
            $table->string('sectionType');
            $table->string('result');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('series_id')->references('id')->on('series');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('seriesType_id')->references('id')->on('series_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mistakes');
    }
}
