<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table='pagos';

    protected $fillable=['id_mes','monto','anio'];

    
    public function meses()
    {
        return $this->belongsTo('App\Meses','id_mes');
    }

    public function matriculas()
    {
    	return $this->hasMany('App\Matriculas','id_pago','id');
    }
}
