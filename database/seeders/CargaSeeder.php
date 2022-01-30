<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargas')->insert(['carga' => 'curso',]);
        DB::table('cargas')->insert(['carga' => 'preparacion y evaluacion',]);
        DB::table('cargas')->insert(['carga' => 'capacitacion',]);
        DB::table('cargas')->insert(['carga' => 'consejeria',]);
        DB::table('cargas')->insert(['carga' => 'Investigacion',]);
        DB::table('cargas')->insert(['carga' => 'responsabilidad social universitaria',]);
        DB::table('cargas')->insert(['carga' => 'asesoria de tesis y examenes profesionales',]);
        
    }
}
