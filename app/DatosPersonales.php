<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosPersonales extends Model
{
    protected $table='datos_personales';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula','direccion','cod1','telf1','cod2','telf2','correo'];

    public function personal()
    {
    	return $this->hasOne('App\Personal','id_datopersonal','id');
    }

    public function representantes()
    {
    	return $this->hasOne('App\Representantes','id_datopersonal','id');
    }
}
