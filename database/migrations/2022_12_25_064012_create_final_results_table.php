<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('series_id');
            $table->unsignedBigInteger('question_id');
            $table->integer('result');
            $table->integer('result_future')->nullable();
            $table->string('question');
            $table->string('ques_answer');
            $table->string('user_answer');
            $table->text('ques_desc');
            $table->string('file_path')->nullable();
            $table->string('vide_patbh')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('series_id')->references('id')->on('series');
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
        Schema::dropIfExists('final_results');
    }
}
