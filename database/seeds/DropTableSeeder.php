<?php

use Illuminate\Database\Seeder;

class DropTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::select('SET FOREIGN_KEY_CHECKS=0');
        DB::select('DROP TABLE atletas, atletas_has_representantes, campeonatos, categorias, cuotas_campeonatos, datos_personales, delegados, estados, estados_pagos, matriculas, meses, migrations, municipios, pagos, parentescos, parroquias, password_resets, personal, recaudos, recibos, representantes, tipos_personas, users');
        DB::select('SET FOREIGN_KEY_CHECKS=1');
    }
}
