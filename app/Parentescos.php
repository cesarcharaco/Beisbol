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
}
