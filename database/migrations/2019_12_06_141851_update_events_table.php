<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('events', function (Blueprint $table) {
            $table->string('time')->nullable()->change();
            $table->text('short_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('events', function (Blueprint $table) {
        $table->string('time')->nullable(false)->change();
        $table->text('short_description')->nullable(false)->change();
        });
    }
}
