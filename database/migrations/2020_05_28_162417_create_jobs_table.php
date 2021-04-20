<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('slug');
            
            $table->dateTime('publication_startdate', 0)->nullable();
            $table->dateTime('publication_enddate', 0)->nullable();
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->mediumText('location')->nullable();
            $table->string('type');
            $table->string('email_notification');
            $table->string('file')->nullable();
            $table->string('image')->nullable();
            $table->integer('status');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
