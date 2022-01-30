<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;

    public function docentes() {
        
        return $this->hasMany(Docente::class,'idEscuela','id');

     }

     public function directores() {
        
        return $this->hasMany(Director::class,'idEscuela','id');

     }

     public function facultad(){
      return $this->hasOne('App\Models\Facultad','id','idFacultad');
  }

}
