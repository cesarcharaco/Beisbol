<?php

use Illuminate\Database\Seeder;

class TipoPersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('tipos_personas')->insert(array(
        	'tipo' => 'Entrenador(a)'
        ));
        \DB::table('tipos_personas')->insert(array(
        	'tipo' => 'Técnico(a)'
        ));
        \DB::table('tipos_personas')->insert(array(
        	'tipo' => 'Delegado(a)'
        ));
        \DB::table('tipos_personas')->insert(array(
        	'tipo' => 'Atleta'
        ));
        \DB::table('tipos_personas')->insert(array(
        	'tipo' => 'Representante'
        ));
    }
}
