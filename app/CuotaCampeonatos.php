<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuotaCampeonatos extends Model
{
    protected $table='cuota_campeonatos';

    protected $fillable=['monto','campeonato','anio','id_mes'];

    public function recibospagos()
    {
    	return $this->belongsToMany('App\RecibosPagos','pagos_camp','id_cuotacamp','id_recibopago');
    }

    public function meses()
    {
    	return $this->belongsTo('App\Meses','id_mes');
    }
}
