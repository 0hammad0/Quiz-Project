<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_videos', function (Blueprint $table) {
            $table->id();
            $table->text('videoLink');
            $table->unsignedBigInteger("series_type_id");
            $table->timestamps();

            $table->foreign('series_type_id')->references('id')->on('series_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_videos');
    }
}
