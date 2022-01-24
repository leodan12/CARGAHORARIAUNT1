<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaracionjurada extends Model
{
    use HasFactory;

    public function docente(){
        return $this->hasOne('App\Models\Docente','id','idDocente');
    }


}
