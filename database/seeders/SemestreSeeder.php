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
        DB::table('semestres')->insert(['año' => '2021','semestre' => '2021-I','inicio' => '2021/03/10','fin' => '2021/08/10','estado' => '0',]);
        DB::table('semestres')->insert(['año' => '2021','semestre' => '2021-II','inicio' => '2021/09/10','fin' => '2021/12/24','estado' => '0',]);
        DB::table('semestres')->insert(['año' => '2022','semestre' => '2022-I','inicio' => '2022/03/10','fin' => '2021/08/10',]);
        DB::table('semestres')->insert(['año' => '2022','semestre' => '2022-II','inicio' => '2022/09/10','fin' => '2021/12/24',]);
       
    }
}
