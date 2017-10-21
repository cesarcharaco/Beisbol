<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegados extends Model
{
    protected $table='delegados';

    protected $fillable=['id_representante','id_categoria','anio','descuento'];

    public function representantes()
    {
    	return $this->hasMany('App\Representantes','id_representante');
    }

    public function categorias()
    {
    	return $this->hasMany('App\Categorias','id_categoria');
    }
}
