<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateTestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('series_id');
            $table->unsignedBigInteger('question_id');
            $table->string('answer');
            $table->integer('question_count');
            $table->timestamps();
            // $table->unsignedBigInteger('test_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('series_id')->references('id')->on('series');
            $table->foreign('question_id')->references('id')->on('questions');
            // $table->foreign('test_id')->references('id')->on('tests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
