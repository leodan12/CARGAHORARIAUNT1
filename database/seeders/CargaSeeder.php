<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargas')->insert(['carga' => 'curso','descripcion'=>'Datos completos y con claridad']);
        DB::table('cargas')->insert(['carga' => 'PREPARACION Y EVALUACION','descripcion'=>'(Max 50% de Trabajo Lectivo)'],);
        DB::table('cargas')->insert(['carga' => 'CAPACITACION','descripcion'=>': Señale lo referente a este rubro en el marco de los planes de cada Facultad (como máximo 05 semanales)'],);
        DB::table('cargas')->insert(['carga' => 'CONSEJERIA','descripcion'=>'Señalar número de alumnos y el ciclo académico con los que se desarrolla. (Como mínimo una 01 hora semanal).'],);
        DB::table('cargas')->insert(['carga' => 'INVESTIGACION','descripcion'=>' Consignar el N° de inscripción, código, nombre y duración del proyecto. (Como mínimo 04 y 05 horas semanales, según modalidad de trabajo de docentes ordinarios)'],);
        DB::table('cargas')->insert(['carga' => 'RESPONSABILIDAD SOCIAL UNIVERSITARIA','descripcion'=>'Señalar actividad, proyecto programa a ejecutarse n beneficio de la comunidad local o regional. (Como máximo 02 horas semanales)',]);
        DB::table('cargas')->insert(['carga' => 'ASESORIA DE TESIS Y EXAMENES PROFESIONALES','descripcion'=>': Indicar el número de Resolución Decanal, precisando el nombre y duración de la actividad programada.',]);
        
    }
}
