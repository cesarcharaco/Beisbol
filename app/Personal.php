<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table='personal';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula','cod1','telf1','cod2','telf2','correo','direccion','id_recaudo'];

    public function recaudos()
    {
    	return $this->belongsTo('App\Recaudos','id_recaudo');
    }
}
