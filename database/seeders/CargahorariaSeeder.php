<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargahorariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargahorarias')->insert(['horas' => '6','idCarga' => '1','idDetallecurso' => '1',]);
        DB::table('cargahorarias')->insert(['horas' => '2','idCarga' => '2','idDetallecurso' => '1',]);
        DB::table('cargahorarias')->insert(['horas' => '1','idCarga' => '3','idDetallecurso' => '1',]);
        DB::table('cargahorarias')->insert(['horas' => '2','idCarga' => '4','idDetallecurso' => '1',]);
        DB::table('cargahorarias')->insert(['horas' => '3','idCarga' => '5','idDetallecurso' => '1',]);
        DB::table('cargahorarias')->insert(['horas' => '2','idCarga' => '6','idDetallecurso' => '1',]);
        DB::table('cargahorarias')->insert(['horas' => '1','idCarga' => '7','idDetallecurso' => '1',]);
        
    }
}
