<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria','local' => 'ingenieria', 'numero' => 'I-5',]);
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria','local' => 'ingenieria', 'numero' => 'I-4',]);
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria','local' => 'ingenieria','numero' => 'I-3',]);
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria','local' => 'ingenieria', 'numero' => 'I-2',]);
        DB::table('aulas')->insert(['ubicacion' => 'ciudad universitaria','local' => 'ingenieria','numero' => 'I-1',]);
        
    }
}
