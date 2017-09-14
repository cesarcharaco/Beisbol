<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuotaMensualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuota_mensual', function (Blueprint $table) {
            $table->increments('id');
            $table->double('monto');
            $table->integer('id_mes')->unsigned();
            $table->string('anio',4);

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
        Schema::dropIfExists('cuota_mensual');
    }
}
