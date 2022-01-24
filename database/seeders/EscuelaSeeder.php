<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escuelas')->insert(['escuela' => 'ing de sistemas','facultad' => 'ingenieria',]);
      
    }
}
