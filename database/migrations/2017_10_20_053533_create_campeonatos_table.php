<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cuotacamp')->unsigned();
            $table->integer('id_estadopago')->unsigned();

            $table->foreign('id_cuotacamp')->references('id')->on('cuotas_campeonatos')->onDelete('cascade');
            $table->foreign('id_estadopago')->references('id')->on('estados_pagos')->onDelete('cascade');
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
        Schema::dropIfExists('campeonatos');
    }
}
