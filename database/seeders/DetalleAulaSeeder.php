<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleAulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalleaulas')->insert(['dia' => 'lunes','inicio' => '07:00','fin' => '1:00','idAula' => '1','idCargahoraria' => '1',]);
        DB::table('detalleaulas')->insert(['dia' => 'martes','inicio' => '07:00','fin' => '9:00','idAula' => '2','idCargahoraria' => '2',]);
        DB::table('detalleaulas')->insert(['dia' => 'miercoles','inicio' => '07:00','fin' => '8:00','idAula' => '6','idCargahoraria' => '3',]);
        DB::table('detalleaulas')->insert(['dia' => 'jueves','inicio' => '07:00','fin' => '9:00','idAula' => '6','idCargahoraria' => '4',]);
        DB::table('detalleaulas')->insert(['dia' => 'viernes','inicio' => '07:00','fin' => '10:00','idAula' => '6','idCargahoraria' => '5',]);
        DB::table('detalleaulas')->insert(['dia' => 'lunes','inicio' => '07:00','fin' => '9:00','idAula' => '3','idCargahoraria' => '6',]);
        DB::table('detalleaulas')->insert(['dia' => 'martes','inicio' => '07:00','fin' => '8:00','idAula' => '4','idCargahoraria' => '7',]);
       
    }
}
