<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecibosPagos extends Model
{
    protected $table='recibos_estados';

    protected $fillable=['numero','estado'];

    public function pagos()
    {
    	return $this->hasMany('App\Pagos','id','id_recibopago');
    }

    public function cuotacampeonatos()
    {
    	return $this->belongsToMany('App\CuotaCampeonatos','pagos_camp','id_recibopago','id_cuotacamp');
    }


}
