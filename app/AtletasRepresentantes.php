<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtletasRepresentantes extends Model
{
    protected $table='atletas_has_representantes';

    protected $fillable=['id_atleta','id_representante'];

    public function estadospagos()
    {
    	return $this->hasMany('App\EstadosPagos','id_atlerep','id');
    }
}
