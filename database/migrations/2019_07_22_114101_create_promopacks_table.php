<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromopacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promopacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pc')->nullable();
            $table->string('phone')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('pc_png')->nullable();
            $table->string('phone_png')->nullable();
            $table->string('instagram_png')->nullable();
            $table->string('facebook_png')->nullable();
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
        Schema::dropIfExists('promopacks');
    }
}
