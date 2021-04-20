<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cover')->nullable();
            $table->date('date')->nullable();
            $table->string('topbanner')->nullable();
            $table->string('homepage')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('series');
    }
}
