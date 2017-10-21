<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentescos extends Model
{
    protected $table='parentescos';

    protected $fillable=['parentesco'];


    public function representantes()
    {
    	return $this->hasMany('App\Representantes','id','id_parentesco');
    }

    public function atletas()
    {
    	return $this->belongsToMany('App\Atletas','atletas_has_representantes','id_parentesco','id_atleta')->withPivot('id_representante');
    }
}
