<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',255);
            $table->string('apellidos',255);
            $table->string('nacionalidad',2);
            $table->string('cedula');
            $table->string('cod1',4);
            $table->string('telf1',7);
            $table->string('cod2',4);
            $table->string('telf2',7);
            $table->string('correo',255);
            $table->text('direccion');
            $table->integer('id_recaudo')->unsigned();

            $table->foreign('id_recaudo')->references('id')->on('recaudos')->onDelete('cascade');
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
        Schema::dropIfExists('personal');
    }
}
