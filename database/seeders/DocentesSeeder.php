<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docentes')->insert(['nombres' => 'santos fernandez ','dni' => '32165487','condicion' => 'nombrado','categoria' => 'especialidad','modalidad' => 'completa','idEscuela' => '1',]);
        DB::table('docentes')->insert(['nombres' => 'david agreda ','dni' => '78965421','condicion' => 'nombrado','categoria' => 'especialidad','modalidad' => 'completa','idEscuela' => '1',]);
        DB::table('docentes')->insert(['nombres' => 'robert sanchez','dni' => '14523698','condicion' => 'nombrado','categoria' => 'especialidad','modalidad' => 'completa','idEscuela' => '1',]);
        DB::table('docentes')->insert(['nombres' => 'marcelino rodriguez','dni' => '26879421','condicion' => 'nombrado','categoria' => 'especialidad','modalidad' => 'completa','idEscuela' => '1',]);
        DB::table('docentes')->insert(['nombres' => 'alberto gomez','dni' => '98752314','condicion' => 'nombrado','categoria' => 'especialidad','modalidad' => 'completa','idEscuela' => '1',]);
        
    }
}
