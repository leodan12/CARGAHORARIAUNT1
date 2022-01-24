<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert(['nombre' => 'ing de software','semestre' => 'octavo', 'codigo' => 'IS-II','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'ing de datos','semestre' => 'octavo', 'codigo' => 'ID-II','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'redes','semestre' => 'octavo', 'codigo' => 'RC-II','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'IOT','semestre' => 'octavo', 'codigo' => 'IoT-II','creditos' => '3',]);
        DB::table('cursos')->insert(['nombre' => 'requerimientos','semestre' => 'octavo', 'codigo' => 'R-II','creditos' => '3',]);
       
    }
}
