<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("series_id");
            $table->string("file_path")->nullable();
            $table->string("audio_path")->nullable();
            $table->string("video_path")->nullable();
            $table->text("question");
            $table->text("option1");
            $table->text("option2");
            $table->text("option3")->nullable();
            $table->text("option4")->nullable();
            $table->text("answer");
            $table->text("description");
            $table->string("question_type");
            $table->timestamps();

            $table->foreign('series_id')->references('id')->on('series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discovery_questions');
    }
}
