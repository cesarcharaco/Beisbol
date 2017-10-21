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
            $table->integer('id_datopersonal')->unsigned();
            $table->string('representante',2);
            $table->integer('id_recaudo')->unsigned();

            $table->foreign('id_datopersonal')->references('id')->on('datos_personales')->onDelete('cascade');
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
        Schema::dropIfExists('representantes');
    }
}
