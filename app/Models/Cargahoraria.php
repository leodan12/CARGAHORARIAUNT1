<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargahoraria extends Model
{
    use HasFactory;

    public function detallecurso(){
        return $this->hasOne('App\Models\Detallecurso','id','idDetallecurso');
    }

    public function carga(){
        return $this->hasOne('App\Models\Carga','id','idCarga');
    }

    public function detalleaulas() {
        
        return $this->hasMany(Detalleaula::class,'idCargahoraria','id');

     }

}
