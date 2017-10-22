<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('estado',['Sin pagar','Cancelado','Abonado'])->default('Sin pagar');
            $table->enum('forma_pago',['Efectivo','Transferencias','Depósito'])->default('Efectivo')->nullable();
            $table->string('codigo_operacion',255)->nullable();
            $table->integer('id_atletarepres')->unsigned();

            $table->foreign('id_atletarepres')->references('id')->on('atletas_has_representantes')->onDelete('cascade');
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
        Schema::dropIfExists('estados_pagos');
    }
}
