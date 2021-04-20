<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',255);
            $table->string('slug')->unique();;
            $table->text('description');
            $table->text('short_description');
            $table->string('image',300);
            $table->date('start_date');
            $table->date('end_date');
            $table->date('start_date_event');
            $table->string('time', 255);
            $table->string('price',50)->nullable();
            $table->string('currency',10)->nullable();
            $table->string('date_in_text', 255);
            $table->boolean('featured'); //destacado
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('restrict');;
            $table->unsignedBigInteger('user_created');
            $table->foreign('user_created')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes(); //Columna para soft delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
