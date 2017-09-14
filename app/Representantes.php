<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representantes extends Model
{
    protected $table='representantes';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula','direccion','cod1','telf1','cod2','telf2','id_parentesco','representante','correo','id_recaudo'];

    public function parentescos()
    {
    	return $this->belongsTo('App\Parentescos','id_parentesco');
    }

    public function recaudos()
    {
    	return $this->belongsTo('App\Recaudos','id_recaudo');
    }

    public function atletas()
    {
        return $this->belongsToMany('App\Atletas','atletas_has_representantes','id_representante','id_atleta');
    }
}
