<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletasHasRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas_has_representantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_atleta')->unsigned();
            $table->integer('id_representante')->unsigned();

            $table->foreign('id_atleta')->references('id')->on('atletas')->onDelete('cascade');
            $table->foreign('id_representante')->references('id')->on('representantes')->onDelete('cascade');
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
        Schema::dropIfExists('atletas_has_representantes');
    }
}
