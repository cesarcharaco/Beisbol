<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(EstadosTableSeeder::class);
        $this->call(MunicipiosTableSeeder::class);
        $this->call(ParroquiasTableSeeder::class);
        $this->call(ParentescosTableSeeder::class);
        $this->call(TipoPersonasTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(RepresentantesTableSeeder::class);
        $this->call(PersonalTableSeeder::class);
        $this->call(MesesTableSeeder::class);
        $this->call(AtletasTableSeeder::class);
    }
}
