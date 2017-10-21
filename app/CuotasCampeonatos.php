<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuotasCampeonatos extends Model
{
    protected $table='cuotas_campeonatos';

    protected $fillable=['monto','anio','campeonato'];

    public function campeonatos()
    {
    	return $this->hasMany('App\Campeonatos','id_cuotacamp','id');
    }
}
