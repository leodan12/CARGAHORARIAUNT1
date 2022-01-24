<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    public function detallecursos() {
        
        return $this->hasMany(Detallecurso::class,'idDocente','id');

     }

     public function escuela(){
        return $this->hasOne('App\Models\Escuela','id','idEscuela');
    }

    public function declaracionjuradas() {
        
        return $this->hasMany(Declaracionjurada::class,'idDocente','id');

     }

}
