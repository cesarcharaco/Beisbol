<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table='municipios';

    protected $fillable=['id_estado','municipio'];


    public function estados()
    {
    	return $this->belongsTo('App\Estdos','id_estado');
    }

    public function parroquias()
    {
    	return $this->hasMany('App\Parroquias','id','id_municipio');
    }

    public function municipios($id)
    {
        return Municipios::where('id_estado','=',$id)->get();
    }
}
