<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by');
            $table->string('name');
            $table->integer('nik');
            $table->integer('region_id');
            $table->integer('departemen_id');
            $table->integer('place_id');
            $table->integer('area_id');
            $table->date('date');
            $table->time('time_first');
            $table->time('time_last');
            $table->string('tempat_cctv');
            $table->text('description');
            $table->integer('role_last_app');
            $table->integer('role_next_app');
            $table->integer('status');
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
        Schema::dropIfExists('form');
    }
}
