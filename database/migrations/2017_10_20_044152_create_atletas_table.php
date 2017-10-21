<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('primer_apellido',255);
            $table->string('segundo_apellido',255)->nullable();
            $table->string('primer_nombre',255);
            $table->string('segundo_nombre',255)->nullable();
            $table->string('nacionalidad',2);
            $table->string('cedula',8)->nullable();
            $table->date('fecha_nac');
            $table->string('genero',10);
            $table->integer('id_parroquia')->unsigned();
            $table->string('num_unif',2);
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_recaudo')->unsigned();

            $table->foreign('id_parroquia')->references('id')->on('parroquias')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
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
        Schema::dropIfExists('atletas');
    }
}
