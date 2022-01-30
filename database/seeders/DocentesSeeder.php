<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docentes')->insert(['nombres' => 'santos','apellidos' => 'fernandez','dni' => '32165487','condicion' => 'nombrado','categoria' => 'especialidad','modalidad' => 'completa','idUsuario' => '4','idEscuela' => '1',]);
        DB::table('docentes')->insert(['nombres' => 'david','apellidos' => 'agreda','dni' => '78965421','condicion' => 'nombrado','categoria' => 'especialidad','modalidad' => 'completa','idUsuario' => '5','idEscuela' => '1',]);
        DB::table('docentes')->insert(['nombres' => 'robert','apellidos' => 'sanchez','dni' => '14523698','condicion' => 'nombrado','categoria' => 'especialidad','modalidad' => 'completa','idUsuario' => '6','idEscuela' => '1',]);
        DB::table('docentes')->insert(['nombres' => 'marcelino','apellidos' => 'rodriguez','dni' => '26879421','condicion' => 'nombrado','categoria' => 'especialidad','modalidad' => 'completa','idUsuario' => '7','idEscuela' => '1',]);
        DB::table('docentes')->insert(['nombres' => 'alberto','apellidos' => 'gomez','dni' => '98752314','condicion' => 'nombrado','categoria' => 'especialidad','modalidad' => 'completa','idUsuario' => '8','idEscuela' => '1',]);
        
    }
}
