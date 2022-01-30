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
        DB::table('cargas')->insert(['carga' => 'clases','idCurso' => '1',]);
        DB::table('cargas')->insert(['carga' => 'preparacion y evaluacion','idCurso' => '1',]);
        DB::table('cargas')->insert(['carga' => 'capacitacion','idCurso' => '1',]);
        DB::table('cargas')->insert(['carga' => 'consejeria','idCurso' => '1',]);
        DB::table('cargas')->insert(['carga' => 'Investigacion','idCurso' => '1',]);
        DB::table('cargas')->insert(['carga' => 'responsabilidad social universitaria','idCurso' => '1',]);
        DB::table('cargas')->insert(['carga' => 'asesoria de tesis','idCurso' => '1',]);
        
    }
}
