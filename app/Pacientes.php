<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $table = 'pacientes';
    
    public function enderecos(){
        return $this->hasMany('App\Enderecos', 'pacientes_id');
    }
}
