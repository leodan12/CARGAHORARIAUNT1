<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetallecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docentes')->insert(['año' => '2022','semestre' => '2021-II','idDocente' => '1','idCurso' => '1',]);
        DB::table('docentes')->insert(['año' => '2022','semestre' => '2021-II','idDocente' => '2','idCurso' => '2',]);
        DB::table('docentes')->insert(['año' => '2022','semestre' => '2021-II','idDocente' => '3','idCurso' => '3',]);
        DB::table('docentes')->insert(['año' => '2022','semestre' => '2021-II','idDocente' => '4','idCurso' => '4',]);
        DB::table('docentes')->insert(['año' => '2022','semestre' => '2021-II','idDocente' => '5','idCurso' => '5',]);
       
    }
}
