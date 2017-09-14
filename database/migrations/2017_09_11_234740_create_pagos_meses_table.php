<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosMesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_meses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_recibopago')->unsigned();
            $table->integer('id_mes')->unsigned();

            $table->foreign('id_recibopago')->references('id')->on('recibos_pagos')->onDelete('cascade');
            $table->foreign('id_mes')->references('id')->on('meses')->onDelete('cascade');
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
        Schema::dropIfExists('pagos_meses');
    }
}
