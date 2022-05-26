<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCctvFinishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cctv_finish', function (Blueprint $table) {
            $table->id();
            $table->integer('form_id');
            $table->integer('created_by');
            $table->string('created_name');
            $table->integer('approved_by');
            $table->string('approved_name');
            $table->string('status');
            $table->uuid('uuid')->nullable();
            $table->string('video')->nullable();
            $table->string('path')->nullable();
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
        Schema::dropIfExists('cctv_finish');
    }
}
