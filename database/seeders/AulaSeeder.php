<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria1','local' => 'ingenieria', 'numero' => 'I-5',]);
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria2','local' => 'ingenieria', 'numero' => 'I-4',]);
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria3','local' => 'ingenieria','numero' => 'I-3',]);
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria4','local' => 'ingenieria', 'numero' => 'I-2',]);
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria5','local' => 'ingenieria','numero' => 'I-1',]);
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria6','local' => 'ingenieria','numero' => 'cubiculo 5',]);
        
    }
}
