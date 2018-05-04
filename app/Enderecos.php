<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    protected $table = 'enderecos';
    public function orcamento(){
        return $this->belongsTo('App\Pacientes', 'pacientes_id');
    }
}
