<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    
     public function detallecursos() {
        
        return $this->hasMany(Detallecurso::class,'idCurso','id');

     }
     
}
