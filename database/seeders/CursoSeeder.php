<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert(['nombre' => 'CargaNoLectiva','ciclo' => 'todos', 'codigo' => 'CNL', 'categoria' => 'CNL','creditos' => '0',]);
       
        DB::table('cursos')->insert(['nombre' => 'ing de software','ciclo' => 'octavo', 'codigo' => 'IS-II', 'categoria' => 'ES','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'ing de datos','ciclo' => 'octavo', 'codigo' => 'ID-II', 'categoria' => 'ES','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'redes','ciclo' => 'octavo', 'codigo' => 'RC-II', 'categoria' => 'ES','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'IOT','ciclo' => 'octavo', 'codigo' => 'IoT-II', 'categoria' => 'ES','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'requerimientos','ciclo' => 'octavo', 'codigo' => 'R-II', 'categoria' => 'ES','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'Elab Proyecto de tesis II','ciclo' => 'decimo', 'codigo' => 'PT-II', 'categoria' => 'ES','creditos' => '4',]);
       
        
    }
}
