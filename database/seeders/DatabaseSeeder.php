<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        
        $this->call(PerfilsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AulaSeeder::class);
        $this->call(CargahorariaSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(DeclaracionjuradaSeeder::class);
        $this->call(DetalleAulaSeeder::class);
        $this->call(DetallecursoSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(DocentesSeeder::class);
        $this->call(EscuelaSeeder::class);
    }
}
