<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriculas extends Model
{
    protected $table='matriculas';

    protected $fillable=['id_pago','id_estadopago'];

    public function pagos()
    {
    	return $this->belongsTo('App\Pagos','id_pago');
    }

    public function estadospagos()
    {
    	return $this->belongsTo('App\EstadosPagos','id_estadopago');
    }
}
