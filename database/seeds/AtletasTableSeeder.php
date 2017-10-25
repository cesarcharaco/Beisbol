<?php

use Illuminate\Database\Seeder;

class AtletasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('recaudos')->insert(array(
	        	'partida_nac' => 'No',
	        	'copia_ced' => 'Si',
	        	'id_tipopersona' => 4
	    ));
	        \DB::table('atletas')->insert(array(
		        	'primer_apellido' => 'PITT',
		        	'segundo_apellido' => '',
		        	'primer_nombre' => 'BRAD',
		        	'segundo_nombre' => '',
		        	'nacionalidad' => 'V',
		        	'cedula' => '12345899',
		        	'fecha_nac' => '2010-01-01',
		        	'genero' => 'M',
		        	'id_parroquia' => 79,
		        	'num_unif' => '16',
		        	'id_categoria' => 4,
		        	'id_recaudo' => 7
		        ));
	    \DB::table('atletas_has_representantes')->insert(array(
	        	'id_atleta' => 1,
	        	'id_representante' => 1,
	        	'id_parentesco' => 1
	    ));
	    \DB::table('atletas_has_representantes')->insert(array(
	        	'id_atleta' => 1,
	        	'id_representante' => 2,
	        	'id_parentesco' => 1
	    ));

	    //--- registro del segundo
	    \DB::table('recaudos')->insert(array(
	        	'partida_nac' => 'No',
	        	'copia_ced' => 'Si',
	        	'id_tipopersona' => 4
	    ));
        \DB::table('atletas')->insert(array(
	        	'primer_apellido' => 'CARLOS',
	        	'segundo_apellido' => '',
	        	'primer_nombre' => 'BAUTE',
	        	'segundo_nombre' => '',
	        	'nacionalidad' => 'V',
	        	'cedula' => '12343399',
	        	'fecha_nac' => '2010-01-01',
	        	'genero' => 'M',
	        	'id_parroquia' => 79,
	        	'num_unif' => '64',
	        	'id_categoria' => 4,
	        	'id_recaudo' => 8
		        ));
	    \DB::table('atletas_has_representantes')->insert(array(
	        	'id_atleta' => 2,
	        	'id_representante' => 2,
	        	'id_parentesco' => 2
	    ));
	    \DB::table('atletas_has_representantes')->insert(array(
	        	'id_atleta' => 2,
	        	'id_representante' => 3,
	        	'id_parentesco' => 1
	    ));
    }
}
