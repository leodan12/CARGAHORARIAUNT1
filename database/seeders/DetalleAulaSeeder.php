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
        DB::table('detalleaulas')->insert(['dia' => 'lunes','inicio' => '07:00','fin' => '12:00','horas' => '5','idAula' => '1','idCargahoraria' => '1',]);
        DB::table('detalleaulas')->insert(['dia' => 'lunes','inicio' => '13:00','fin' => '17:00','horas' => '4','idAula' => '2','idCargahoraria' => '2',]);
        DB::table('detalleaulas')->insert(['dia' => 'martes','inicio' => '07:00','fin' => '11:00','horas' => '4','idAula' => '1','idCargahoraria' => '1',]);
        DB::table('detalleaulas')->insert(['dia' => 'martes','inicio' => '13:00','fin' => '18:00','horas' => '5','idAula' => '2','idCargahoraria' => '2',]);

        DB::table('detalleaulas')->insert(['dia' => 'miercoles','inicio' => '07:00','fin' => '11:00','horas' => '4','idAula' => '6','idCargahoraria' => '3',]);
        DB::table('detalleaulas')->insert(['dia' => 'jueves','inicio' => '17:00','fin' => '20:00','horas' => '3','idAula' => '6','idCargahoraria' => '3',]);
        
        DB::table('detalleaulas')->insert(['dia' => 'miercoles','inicio' => '11:00','fin' => '12:00','horas' => '1','idAula' => '6','idCargahoraria' => '4',]);
        DB::table('detalleaulas')->insert(['dia' => 'jueves','inicio' => '07:00','fin' => '11:00','horas' => '4','idAula' => '6','idCargahoraria' => '5',]);
        DB::table('detalleaulas')->insert(['dia' => 'viernes','inicio' => '14:00','fin' => '20:00','horas' => '6','idAula' => '6','idCargahoraria' => '6',]);
        DB::table('detalleaulas')->insert(['dia' => 'viernes','inicio' => '09:00','fin' => '12:00','horas' => '3','idAula' => '6','idCargahoraria' => '7',]);
        DB::table('detalleaulas')->insert(['dia' => 'viernes','inicio' => '07:00','fin' => '8:00','horas' => '1','idAula' => '6','idCargahoraria' => '8',]);
    }
}
