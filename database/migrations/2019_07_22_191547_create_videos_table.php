<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('cover')->nullable();
            $table->date('date')->nullable();
            $table->string('week')->nullable();
            $table->string('audio')->nullable();
            $table->string('notes')->nullable();
            $table->string('podcast')->nullable();
            $table->string('video')->nullable();
            $table->text('description')->nullable();
            $table->integer('views');
            $table->unsignedBigInteger('serie_id');
            $table->foreign('serie_id')->references('id')->on('series');
            $table->unsignedBigInteger('speaker_id');
            $table->foreign('speaker_id')->references('id')->on('speakers');
            $table->timestamps();
            $table->softDeletes(); //Columna para soft delete


            $table->unsignedBigInteger('promopack_id');
            $table->foreign('promopack_id')->references('id')->on('promopacks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
