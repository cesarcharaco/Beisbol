<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table='pagos';

    protected $fillable=['id_atlerep','id_recibopago','monto','abono','observacion'];

    public function recibospagos()
    {
    	return $this->belongsTo('App\RecibosPagos','id_recibopago');
    }

    public function atletasrepresentantes()
    {
    	return $this->belongsTo('App\AtletasRepresentantes','id_atlerep');
    }

    public function meses()
    {
        return $this->belongsToMany('App\Meses','pagos_meses','id_pago','id_mes');
    }
}
