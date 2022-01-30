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
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '22','horasT' => '0','horasL' => '0','horasP' => '0','seccion' => 'todas','idSemestre' => '2','idDocente' => '1','idCurso' => '1',]);
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '22','horasT' => '0','horasL' => '0','horasP' => '0','seccion' => 'todas','idSemestre' => '2','idDocente' => '2','idCurso' => '1',]);
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '22','horasT' => '0','horasL' => '0','horasP' => '0','seccion' => 'todas','idSemestre' => '2','idDocente' => '3','idCurso' => '1',]);
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '22','horasT' => '0','horasL' => '0','horasP' => '0','seccion' => 'todas','idSemestre' => '2','idDocente' => '4','idCurso' => '1',]);
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '22','horasT' => '0','horasL' => '0','horasP' => '0','seccion' => 'todas','idSemestre' => '2','idDocente' => '5','idCurso' => '1',]);
       
       
   
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '9','horasT' => '5','horasL' => '2','horasP' => '2','seccion' => 'A','idSemestre' => '2','idDocente' => '2','idCurso' => '2',]);
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '9','horasT' => '5','horasL' => '2','horasP' => '2','seccion' => 'A','idSemestre' => '2','idDocente' => '3','idCurso' => '3',]);
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '9','horasT' => '4','horasL' => '2','horasP' => '3','seccion' => 'A','idSemestre' => '2','idDocente' => '4','idCurso' => '4',]);
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '9','horasT' => '5','horasL' => '2','horasP' => '2','seccion' => 'A','idSemestre' => '2','idDocente' => '5','idCurso' => '5',]);
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '9','horasT' => '4','horasL' => '3','horasP' => '2','seccion' => 'A','idSemestre' => '2','idDocente' => '1','idCurso' => '6',]);
        DB::table('detallecursos')->insert(['año' => '2021','horas' => '9','horasT' => '4','horasL' => '0','horasP' => '5','seccion' => 'A','idSemestre' => '2','idDocente' => '1','idCurso' => '7',]);
    }
}
