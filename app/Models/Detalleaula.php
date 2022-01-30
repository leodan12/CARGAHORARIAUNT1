<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleaula extends Model
{
    use HasFactory;

    public function aula(){
        return $this->hasOne('App\Models\Aula','id','idAula');
    }

    public function cargahoraria(){
        return $this->hasOne('App\Models\Cargahoraria','id','idCargahoraria');
    }
}
