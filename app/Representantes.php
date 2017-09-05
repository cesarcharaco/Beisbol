<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representantes extends Model
{
    protected $table='representantes';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula','direccion','cod1','telf1','cod2','telf2','cod3','telf3','id_parentesco','representante'];

    public function parentescos()
    {
    	return $this->belongsTo('App\Parentescos','id_parentesco');
    }
}
