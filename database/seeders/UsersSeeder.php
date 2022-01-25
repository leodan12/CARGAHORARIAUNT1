<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'administrador','email' => 'administrador@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '1','is_admin' => TRUE,]);
        DB::table('users')->insert(['name' => 'docente','email' => 'docenteE@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '2','is_admin' => FALSE,]);
        DB::table('users')->insert(['name' => 'director','email' => 'director@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '3','is_admin' => FALSE,]);
          //usuarios de egresados

        DB::table('users')->insert(['name' => 'santosfernandez','email' => 'santosfernandez@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '2','is_admin' => FALSE,]);
        DB::table('users')->insert(['name' => 'davidagreda','email' => 'davidagreda@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '2','is_admin' => FALSE,]);
        DB::table('users')->insert(['name' => 'robertsanchez','email' => 'robertsanchez@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '2','is_admin' => FALSE,]);
        DB::table('users')->insert(['name' => 'marcelinorodriguez','email' => 'marcelinorodriguez@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '2','is_admin' => FALSE,]);
        DB::table('users')->insert(['name' => 'albertogomez','email' => 'albertogomez@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '2','is_admin' => FALSE,]);

    }
}
