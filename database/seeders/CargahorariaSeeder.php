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
        DB::table('cargahorarias')->insert(['idCarga' => '1','idDetallecurso' => '10',]);
        DB::table('cargahorarias')->insert(['idCarga' => '1','idDetallecurso' => '11',]);

        DB::table('cargahorarias')->insert(['idCarga' => '2','idDetallecurso' => '1',]);
        DB::table('cargahorarias')->insert(['idCarga' => '3','idDetallecurso' => '1',]);
        DB::table('cargahorarias')->insert(['idCarga' => '4','idDetallecurso' => '1',]);

        DB::table('cargahorarias')->insert(['idCarga' => '5','idDetallecurso' => '1',]);
        DB::table('cargahorarias')->insert(['idCarga' => '6','idDetallecurso' => '1',]);
        DB::table('cargahorarias')->insert(['idCarga' => '7','idDetallecurso' => '1',]);
        
       
    }
}
