<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuotaMensual extends Model
{
    protected $table='cuota_mensual';

    protected $fillable=['monto','id_mes','anio'];

    public function meses()
    {
    	return $this->belongsTo('App\Meses','id_mes');
    }
}
