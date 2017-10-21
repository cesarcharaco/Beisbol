<?php

use Illuminate\Database\Seeder;

class TruncateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::select('SET FOREIGN_KEY_CHECKS=0');
        DB::select('TRUNCATE atletas');
		DB::select('TRUNCATE atletas_has_representantes');
		DB::select('TRUNCATE campeonatos');
		DB::select('TRUNCATE categorias');
		DB::select('TRUNCATE cuotas_campeonatos');
		DB::select('TRUNCATE datos_personales');
		DB::select('TRUNCATE delegados');
		DB::select('TRUNCATE estados');
		DB::select('TRUNCATE estados_pagos');
		DB::select('TRUNCATE matriculas');
		DB::select('TRUNCATE meses');
		DB::select('TRUNCATE migrations');
		DB::select('TRUNCATE municipios');
		DB::select('TRUNCATE pagos');
		DB::select('TRUNCATE parentescos');
		DB::select('TRUNCATE parroquias');
		DB::select('TRUNCATE password_resets');
		DB::select('TRUNCATE personal');
		DB::select('TRUNCATE recaudos');
		DB::select('TRUNCATE recibos');
		DB::select('TRUNCATE representantes');
		DB::select('TRUNCATE tipos_personas');
		DB::select('TRUNCATE users');
		DB::select('SET FOREIGN_KEY_CHECKS=1');
    }
}
