<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directors')->insert(['nombres' => 'juan boy ','correo' => 'jboy@unitru.edu.pe','telefono' => '987654321','direccion' => 'av los laureles','idEscuela' => '1',]);
      
    }
}
