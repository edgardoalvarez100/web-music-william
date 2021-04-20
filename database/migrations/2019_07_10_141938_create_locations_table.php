<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('address', 300);
            $table->string('city', 300);
            $table->string('state', 3);
            $table->string('zip', 10);
            $table->string('country', 255);
            $table->string('gmap',700)->nullable();
            $table->string('gdir',500)->nullable();
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
        Schema::dropIfExists('locations');
    }
}
