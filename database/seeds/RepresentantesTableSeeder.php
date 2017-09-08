<?php

use Illuminate\Database\Seeder;

class RepresentantesTableSeeder extends Seeder
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
	        	'id_tipopersona' => 5
	    ));
	        \DB::table('representantes')->insert(array(
		        	'nombres' => 'Hector',
		        	'apellidos' => 'Sifontes',
		        	'nacionalidad' => 'V',
		        	'cedula' => '12345678',
		        	'direccion' => 'aquí',
		        	'cod1' => '0416',
		        	'telf1' => '1234567',
		        	'cod2' => '0416',
		        	'telf2' => '1234567',
		        	'correo' => 'hectorsifontes@gmail.com',
		        	'id_parentesco' => 2,
		        	'representante' => 'Si',
		        	'id_recaudo' => 1
		        ));
        \DB::table('recaudos')->insert(array(
	        	'partida_nac' => 'No',
	        	'copia_ced' => 'No',
	        	'id_tipopersona' => 5
	    ));
	       	\DB::table('representantes')->insert(array(
		        	'nombres' => 'Yohana',
		        	'apellidos' => 'Malavé',
		        	'nacionalidad' => 'V',
		        	'cedula' => '12345679',
		        	'direccion' => 'aquí',
		        	'cod1' => '0416',
		        	'telf1' => '1234567',
		        	'cod2' => '0416',
		        	'telf2' => '1234567',
		        	'correo' => 'Ninguno',
		        	'id_parentesco' => 2,
		        	'representante' => 'No',
		        	'id_recaudo' => 2
		        ));
       	\DB::table('recaudos')->insert(array(
	        	'partida_nac' => 'No',
	        	'copia_ced' => 'Si',
	        	'id_tipopersona' => 5
	    ));
	       	\DB::table('representantes')->insert(array(
		        	'nombres' => 'Manuel',
		        	'apellidos' => 'Correa',
		        	'nacionalidad' => 'V',
		        	'cedula' => '12345670',
		        	'direccion' => 'aquí',
		        	'cod1' => '0416',
		        	'telf1' => '1234567',
		        	'cod2' => '0416',
		        	'telf2' => '1234567',
		        	'correo' => 'manuelcorrea@gmail.com',
		        	'id_parentesco' => 2,
		        	'representante' => 'Si',
		        	'id_recaudo' => 3
		        ));
    }
}
