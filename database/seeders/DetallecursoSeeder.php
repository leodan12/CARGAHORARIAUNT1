<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetallecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detallecursos')->insert(['año' => '2021','idSemestre' => '2','idDocente' => '1','idCurso' => '1',]);
        DB::table('detallecursos')->insert(['año' => '2021','idSemestre' => '2','idDocente' => '2','idCurso' => '2',]);
        DB::table('detallecursos')->insert(['año' => '2021','idSemestre' => '2','idDocente' => '3','idCurso' => '3',]);
        DB::table('detallecursos')->insert(['año' => '2021','idSemestre' => '2','idDocente' => '4','idCurso' => '4',]);
        DB::table('detallecursos')->insert(['año' => '2021','idSemestre' => '2','idDocente' => '5','idCurso' => '5',]);
       
    }
}
