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

	    \DB::table('datos_personales')->insert(array(
	        	'nombres' => 'Hector',
	        	'apellidos' => 'Sifontes',
	        	'nacionalidad' => 'V',
	        	'cedula' => '12345678',
	        	'direccion' => 'aquí',
	        	'cod1' => '0416',
	        	'telf1' => '1234567',
	        	'cod2' => '0416',
	        	'telf2' => '1234567',
	        	'correo' => 'hectorsifontes@gmail.com'
	    ));
	    \DB::table('representantes')->insert(array(
		        	'id_datopersonal' => 1,
		        	'representante' => 'Si',
		        	'id_recaudo' => 1
		        ));
	    //--- segundo    
        \DB::table('recaudos')->insert(array(
	        	'partida_nac' => 'No',
	        	'copia_ced' => 'No',
	        	'id_tipopersona' => 5
	    ));

	    \DB::table('datos_personales')->insert(array(
	        	'nombres' => 'Yohana',
	        	'apellidos' => 'Malavé',
	        	'nacionalidad' => 'V',
	        	'cedula' => '12345679',
	        	'direccion' => 'aquí',
	        	'cod1' => '0416',
	        	'telf1' => '1234567',
	        	'cod2' => '0416',
	        	'telf2' => '1234567',
	        	'correo' => 'Ninguno'
	    ));
	    \DB::table('representantes')->insert(array(
		        	'id_datopersonal' => 2,
		        	'representante' => 'No',
		        	'id_recaudo' => 2
		        ));
	    //--- tercero
       	\DB::table('recaudos')->insert(array(
	        	'partida_nac' => 'No',
	        	'copia_ced' => 'Si',
	        	'id_tipopersona' => 5
	    ));
	    \DB::table('datos_personales')->insert(array(
	        	'nombres' => 'Manuel',
	        	'apellidos' => 'Correa',
	        	'nacionalidad' => 'V',
	        	'cedula' => '12345670',
	        	'direccion' => 'aquí',
	        	'cod1' => '0416',
	        	'telf1' => '1234567',
	        	'cod2' => '0416',
	        	'telf2' => '1234567',
	        	'correo' => 'manuelcorrea@gmail.com'
	    ));
	    \DB::table('representantes')->insert(array(
		        	'id_datopersonal' => 3,
		        	'representante' => 'Si',
		        	'id_recaudo' => 3
		        ));
	    //-- cuarto
	    

    }
}
