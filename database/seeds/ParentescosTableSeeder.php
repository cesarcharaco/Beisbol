<?php

use Illuminate\Database\Seeder;

class ParentescosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('parentescos')->insert(array(
        	'parentesco' => 'Madre'
        ));
        \DB::table('parentescos')->insert(array(
        	'parentesco' => 'Padre'
        ));
        \DB::table('parentescos')->insert(array(
        	'parentesco' => 'Hermano(a)'
        ));
        \DB::table('parentescos')->insert(array(
        	'parentesco' => 'Tio(a)'
        ));
        \DB::table('parentescos')->insert(array(
        	'parentesco' => 'Abuelo(a)'
        ));
        \DB::table('parentescos')->insert(array(
        	'parentesco' => 'Primo(a)'
        ));
    }
}
