<?php

use Illuminate\Database\Seeder;

class PersonalTableSeeder extends Seeder
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
	        	'id_tipopersona' => 1
	    ));

	    \DB::table('datos_personales')->insert(array(
	        	'nombres' => 'MIGUEL',
	        	'apellidos' => 'SANCHEZ',
	        	'nacionalidad' => 'V',
	        	'cedula' => '2345600',
	        	'direccion' => 'AQUÍ',
	        	'cod1' => '0416',
	        	'telf1' => '1234567',
	        	'cod2' => '0416',
	        	'telf2' => '1234567',
	        	'correo' => 'MIGUELSANCHEZ@GMAIL.COM'
	    ));
	        \DB::table('personal')->insert(array(
		        	'id_datopersonal' => 4,
		        	'id_recaudo' => 4
		        ));
	    //---- segundo
        \DB::table('recaudos')->insert(array(
	        	'partida_nac' => 'No',
	        	'copia_ced' => 'No',
	        	'id_tipopersona' => 2
	    ));
	    \DB::table('datos_personales')->insert(array(
	        	'nombres' => 'MARÍA',
	        	'apellidos' => 'MARTÍNEZ',
	        	'nacionalidad' => 'V',
	        	'cedula' => '12345645',
	        	'direccion' => 'AQUÍ',
	        	'cod1' => '0416',
	        	'telf1' => '1234567',
	        	'cod2' => '0416',
	        	'telf2' => '1234567',
	        	'correo' => 'MARIAMARTINEZ@GMAIL.COM'
	    ));
	       	\DB::table('personal')->insert(array(
		        	'id_datopersonal' => 5,
		        	'id_recaudo' => 5
		        ));
	    //--- tercero
       	\DB::table('recaudos')->insert(array(
	        	'partida_nac' => 'No',
	        	'copia_ced' => 'Si',
	        	'id_tipopersona' => 1
	    ));
	    \DB::table('datos_personales')->insert(array(
	        	'nombres' => 'ALEJANDRO',
	        	'apellidos' => 'SANZ',
	        	'nacionalidad' => 'V',
	        	'cedula' => '9345670',
	        	'direccion' => 'AQUÍ',
	        	'cod1' => '0416',
	        	'telf1' => '1234567',
	        	'cod2' => '0416',
	        	'telf2' => '1234567',
	        	'correo' => 'ALEJANDROSANZ@GMAIL.COM'
	    ));
	       	\DB::table('personal')->insert(array(
		        	'id_datopersonal' => 6,
		        	'id_recaudo' => 6
		        ));
    }
}
