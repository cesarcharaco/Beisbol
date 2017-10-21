<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table='categorias';

    protected $fillable=['edad','categoria','literal'];

    public function delegados()
    {
    	return $this->belongsTo('App\Delegdos','id_categoria','id');
    }

    public function atletas()
    {
    	return $this->hasOne('App\Atletas','id_categoria','id');
    }
}
