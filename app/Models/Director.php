<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    public function curso(){
        return $this->hasOne('App\Models\Escuela','id','idEscuela');
    }
    
}
