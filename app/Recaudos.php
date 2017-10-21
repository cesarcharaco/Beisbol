<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recaudos extends Model
{
    protected $table='recaudos';

    protected $fillable=['partida_nac','copia_ced','id_tipopersona'];

    public function tipospersonas()
    {
    	return $this->belongsTo('App\TiposPersonas','id_tipopersona');
    }

    public function representantes()
    {
    	return $this->hasMany('App\Representantes','id','id_recaudo');
    }

    public function personal()
    {
        return $this->hasMany('App\Personal','id','id_recaudo');
    }

    public function atletas()
    {
        return $this->hasMany('App\Atletas','id','id_recaudo');
    }


}
