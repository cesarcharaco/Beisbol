<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representantes extends Model
{
    protected $table='representantes';

    protected $fillable=['id_datopersonal','representante','id_recaudo'];


    public function recaudos()
    {
    	return $this->belongsTo('App\Recaudos','id_recaudo');
    }

    public function datospersonales()
    {
        return $this->belongsTo('App\DatosPersonales','id_datopersonal');
    }
    public function atletas()
    {
        return $this->belongsToMany('App\Atletas','atletas_has_representantes','id_representante','id_atleta')->withPivot('id_parentesco');
    }

    public function parentescos()
    {
        return $this->belongsToMany('App\Parentescos','atletas_has_representantes','id_representante','id_parentesco')->withPivot('id_atleta');
    }

    public function delegados()
    {
        return $this->hasMany('App\Delegados','id_representante','id');
    }
}
