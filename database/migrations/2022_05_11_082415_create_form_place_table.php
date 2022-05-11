<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_place', function (Blueprint $table) {
            $table->id();
            $table->integer('form_id');
            $table->integer('place_id');
            $table->integer('area_id');
            $table->string('tempat_cctv');
            $table->text('description');
            $table->integer('role_last_app');
            $table->integer('role_next_app');
            $table->integer('status');
            $table->integer('created_by');
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
        Schema::dropIfExists('form_place');
    }
}
