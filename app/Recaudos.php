<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recaudos extends Model
{
    protected $table='recaudos';

    protected $fillable=['partida_nac','copia_ced','id_tipopersona'];

    public function tipopersonas()
    {
    	return $this->belongsTo('App\TipoPersonas','id_tipopersona');
    }

    public function representantes()
    {
    	return $this->hasMany('App\Representantes','id','id_recaudo');
    }
}
