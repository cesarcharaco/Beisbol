<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPersonas extends Model
{
    protected $table='tipo_personas';

    protected $fillable=['tipo'];

    public function recaudos()
    {
    	return $this->hasMany('App\Recaudos','id','id_tipopersona');
    }
}
