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
	        \DB::table('personal')->insert(array(
		        	'nombres' => 'MIGUEL',
		        	'apellidos' => 'SANCHEZ',
		        	'nacionalidad' => 'V',
		        	'cedula' => '2345600',
		        	'cod1' => '0416',
		        	'telf1' => '1234567',
		        	'cod2' => '0416',
		        	'telf2' => '1234567',
		        	'correo' => 'MIGUELSANCHEZ@GMAIL.COM',
		        	'direccion' => 'AQUÍ',
		        	'id_recaudo' => 4
		        ));
        \DB::table('recaudos')->insert(array(
	        	'partida_nac' => 'No',
	        	'copia_ced' => 'No',
	        	'id_tipopersona' => 2
	    ));
	       	\DB::table('personal')->insert(array(
		        	'nombres' => 'MARÍA',
		        	'apellidos' => 'MARTÍNEZ',
		        	'nacionalidad' => 'V',
		        	'cedula' => '12345645',
		        	'cod1' => '0416',
		        	'telf1' => '1234567',
		        	'cod2' => '0416',
		        	'telf2' => '1234567',
		        	'correo' => 'MARIAMARTINEZ@GMAIL.COM',
		        	'direccion' => 'AQUÍ',
		        	'id_recaudo' => 5
		        ));
       	\DB::table('recaudos')->insert(array(
	        	'partida_nac' => 'No',
	        	'copia_ced' => 'Si',
	        	'id_tipopersona' => 3
	    ));
	       	\DB::table('personal')->insert(array(
		        	'nombres' => 'ALEJANDRO',
		        	'apellidos' => 'SANZ',
		        	'nacionalidad' => 'V',
		        	'cedula' => '9345670',
		        	'cod1' => '0416',
		        	'telf1' => '1234567',
		        	'cod2' => '0416',
		        	'telf2' => '1234567',
		        	'correo' => 'ALEJANDROSANZ@GMAIL.COM',
		        	'direccion' => 'AQUÍ',
		        	'id_recaudo' => 6
		        ));
    }
}
