<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campeonatos extends Model
{
    protected $table='campeonatos';

    protected $fillable=['id_cuotacamp','id_estadopago'];

    public function cuotascampeonatos()
    {
    	return $this->belongsTo('App\CuotasCampeonatos','id_cuotacamp');
    }

    public function estadospagos()
    {
    	return $this->belongsTo('App\EstadosPagos','id_estadopago','id');
    }

}
