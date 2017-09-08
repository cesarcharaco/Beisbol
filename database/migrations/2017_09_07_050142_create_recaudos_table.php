<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecaudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recaudos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('partida_nac',2);
            $table->string('copia_ced',2);
            $table->integer('id_tipopersona')->unsigned();

            $table->foreign('id_tipopersona')->references('id')->on('tipo_personas')->onDelete('cascade');
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
        Schema::dropIfExists('recaudos');
    }
}
