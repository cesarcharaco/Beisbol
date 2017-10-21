<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposPersonas extends Model
{
    protected $table='tipos_personas';

    protected $fillable=['tipo'];

    public function recaudos()
    {
    	return $this->hasMany('App\Recaudos','id','id_tipopersona');
    }
}
