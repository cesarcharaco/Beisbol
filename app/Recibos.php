<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recibos extends Model
{
    protected $table='recibos';

    protected $fillable=['codigo_recibo','fecha','total','observacion','id_estadopago'];

    public function estadospagos()
    {
    	return $this->belongsTo('App\EstadosPagos','id_estadopago');
    }
}
