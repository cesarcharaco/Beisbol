<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parroquias extends Model
{
    protected $table='parroquias';

    protected $fillable=['id_municipio','parroquia'];


    public function municipios()
    {
    	return $this->belongsTo('App\Municipios','id_municipio');
    }

    public function atletas()
    {
    	return $this->hasMany('App\Atletas','id','id_parroquia');
    }
}
