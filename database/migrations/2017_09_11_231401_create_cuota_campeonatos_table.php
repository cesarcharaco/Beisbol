<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuotaCampeonatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuota_campeonatos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('monto');
            $table->enum('campeonato',['Municipal','Mantenimiento']);
            $table->string('anio',4);
            $table->integer('id_mes')->unsigned();

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
        Schema::dropIfExists('cuota_campeonatos');
    }
}
