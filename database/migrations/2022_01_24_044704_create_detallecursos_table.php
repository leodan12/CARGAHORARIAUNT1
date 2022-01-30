<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecursos', function (Blueprint $table) {
            $table->id();
            $table->integer('año');
            $table->integer('horas');
            $table->integer('horasT');
            $table->integer('horasL');
            $table->integer('horasP');
            $table->string('seccion');
            $table->integer('idSemestre');
            $table->integer('idDocente');
            $table->integer('idCurso');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallecursos');
    }
}
