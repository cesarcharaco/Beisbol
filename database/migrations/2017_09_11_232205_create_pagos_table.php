<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_atlerep')->unsigned();
            $table->integer('id_recibopago')->unsigned();
            $table->double('monto');
            $table->enum('abono',['Si','No']);
            $table->string('observacion');

            $table->foreign('id_atlerep')->references('id')->on('atletas_has_representantes')->onDelete('cascade');
            $table->foreign('id_recibopago')->references('id')->on('recibos_pagos')->onDelete('cascade');
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
        Schema::dropIfExists('pagos');
    }
}
