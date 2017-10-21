<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadosPagos extends Model
{
    protected $table='estados_pagos';

    protected $fillable=['estado','forma_pago','codigo_operacion','id_atletarepres'];

    public function campeonatos()
    {
    	return $this->hasMany('App\Campeonatos','id_estadopago','id');
    }

    public function atletasrepresentantes()
    {
    	return $this->belongsTo('App\AtletasRepresentantes','id_atletarepres');
    }

    public function matriculas()
    {
    	return $this->hasMany('App\Matriculas','id_estadopago','id');
    }

    public function recibos()
    {
    	return $this->hasMany('App\Recibos','id_estadopago','id');
    }
}
