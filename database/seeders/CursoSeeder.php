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
       
        DB::table('cursos')->insert(['nombre' => 'ing de software','ciclo' => '8', 'codigo' => 'IS-II', 'categoria' => 'ES','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'ing de datos','ciclo' => '8', 'codigo' => 'ID-II', 'categoria' => 'ES','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'redes','ciclo' => '8', 'codigo' => 'RC-II', 'categoria' => 'ES','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'IOT','ciclo' => '8', 'codigo' => 'IoT-II', 'categoria' => 'ES','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'requerimientos','ciclo' => '8', 'codigo' => 'R-II', 'categoria' => 'ES','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'Elab Proyecto de tesis II','ciclo' => '10', 'codigo' => 'PT-II', 'categoria' => 'ES','creditos' => '4',]);
       
        
    }
}
