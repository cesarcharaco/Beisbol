<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meses extends Model
{
    protected $table='meses';

    protected $fillable=['mes'];

    public function cuotamensual()
    {
    	return $this->hasMany('App\CuotaMensual','id','id_mes');
    }

    public function pagos()
    {
    	return $this->belongsToMany('App\Pagos','pagos_meses','id_mes','id_pago');
    }

    public function cuotascampeonatos()
    {
        return $this->hasMany('App\CuotasCampeonatos','id','id_mes');
    }
}
