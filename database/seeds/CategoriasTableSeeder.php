<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categorias')->insert(array(
        	'edad' => '4',
        	'categoria' => 'Iniciación',
        	'literal' => 'Iniciación'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '5',
        	'categoria' => 'Iniciación',
        	'literal' => 'Iniciación'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '6',
        	'categoria' => 'Formación',
        	'literal' => 'Formación'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '7',
        	'categoria' => 'Formación',
        	'literal' => 'Formación'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '8',
        	'categoria' => 'Infantil',
        	'literal' => 'A'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '9',
        	'categoria' => 'Infantil',
        	'literal' => 'A'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '10',
        	'categoria' => 'Infantil',
        	'literal' => 'AA'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '11',
        	'categoria' => 'Infantil',
        	'literal' => 'AA'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '12',
        	'categoria' => 'Juvenil',
        	'literal' => 'A'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '13',
        	'categoria' => 'Juvenil',
        	'literal' => 'A'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '14',
        	'categoria' => 'Juvenil',
        	'literal' => 'AA'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '15',
        	'categoria' => 'Juvenil',
        	'literal' => 'AA'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '16',
        	'categoria' => 'Juvenil',
        	'literal' => 'AAA'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '17',
        	'categoria' => 'Juvenil',
        	'literal' => 'AAA'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '18',
        	'categoria' => 'Sub-23',
        	'literal' => 'Sub-23'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '19',
        	'categoria' => 'Sub-23',
        	'literal' => 'Sub-23'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '20',
        	'categoria' => 'Sub-23',
        	'literal' => 'Sub-23'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '21',
        	'categoria' => 'Sub-23',
        	'literal' => 'Sub-23'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '22',
        	'categoria' => 'Sub-23',
        	'literal' => 'Sub-23'
        ));
        \DB::table('categorias')->insert(array(
        	'edad' => '23',
        	'categoria' => 'Sub-23',
        	'literal' => 'Sub-23'
        ));
    }
}
