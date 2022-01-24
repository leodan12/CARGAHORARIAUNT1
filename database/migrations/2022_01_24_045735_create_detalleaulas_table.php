<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleaulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleaulas', function (Blueprint $table) {
            $table->id();
            $table->string('hora');
            $table->string('dia');
            $table->integer('duracionhoras');
            $table->integer('idAula');
            $table->integer('idCurso');
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
        Schema::dropIfExists('detalleaulas');
    }
}
