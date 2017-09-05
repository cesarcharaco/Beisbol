<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',255);
            $table->string('apellidos',255);
            $table->string('nacionalidad',2);
            $table->string('cedula');
            $table->text('direccion');
            $table->string('cod1',4);
            $table->string('telf1',7);
            $table->string('cod2',4);
            $table->string('telf2',7);
            $table->string('cod3',4);
            $table->string('telf3',7);
            $table->integer('id_parentesco')->unsigned();
            $table->enum('representante',['Si','No']);

            $table->foreign('id_parentesco')->references('id')->on('parentescos')->onDelete('cascade');
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
        Schema::dropIfExists('representantes');
    }
}
