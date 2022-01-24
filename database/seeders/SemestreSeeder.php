<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semestres')->insert(['año' => '2021','semestre' => '2021-I','estado' => '0',]);
        DB::table('semestres')->insert(['año' => '2021','semestre' => '2021-II','estado' => '0',]);
        DB::table('semestres')->insert(['año' => '2022','semestre' => '2022-I',]);
        DB::table('semestres')->insert(['año' => '2022','semestre' => '2022-II',]);
       
    }
}
