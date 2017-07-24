<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Cesar',
            'email' => 'jcesarchg9@gmail.com',
            'password' => bcrypt('1234'),
            'tipo_user' => 'Administrador'
        ]);

        DB::table('users')->insert([
            'name' => 'Alinson',
            'email' => 'alinson@gmail.com',
            'password' => bcrypt('1234'),
            'tipo_user' => 'Administrador'
        ]);

        DB::table('users')->insert([
            'name' => 'Gabriel',
            'email' => 'gabriel@gmail.com',
            'password' => bcrypt('1234'),
            'tipo_user' => 'Administrador'
        ]);

        DB::table('users')->insert([
            'name' => 'Winderson',
            'email' => 'winderson@gmail.com',
            'password' => bcrypt('1234'),
            'tipo_user' => 'Administrador'
        ]);
    }
}
