<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtletasRepresentantes extends Model
{
    protected $table='atletas_has_representantes';

    protected $fillable=['id_atleta','id_representante'];

    public function pagos()
    {
    	return $this->hasMany('App\Pagos','id','id_atlerep');
    }
}
