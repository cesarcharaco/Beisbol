<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representantes extends Model
{
    protected $table='representantes';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula','direccion','cod1','telf1','cod2','telf2','id_parentesco','representante','correo'];

    public function parentescos()
    {
    	return $this->belongsTo('App\Parentescos','id_parentesco');
    }
}
