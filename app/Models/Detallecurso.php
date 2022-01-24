<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallecurso extends Model
{
    use HasFactory;

    public function curso(){
        return $this->hasOne('App\Models\Curso','id','idCurso');
    }
    public function docente(){
        return $this->hasOne('App\Models\Docente','id','idDocente');
    }

    public function cargahorarias() {
        
        return $this->hasMany(Cargahoraria::class,'idCargahoraria','id');

     }
}
