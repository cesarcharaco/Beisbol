<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table='personal';

    protected $fillable=['id_datopersonal','id_recaudo'];

    public function recaudos()
    {
    	return $this->belongsTo('App\Recaudos','id_recaudo');
    }

    public function datospersonales()
    {
    	return $this->belongsTo('App\DatosPersonales','id_datopersonal');
    }
}
