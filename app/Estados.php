<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table='estados';

    protected $fillable=['estado'];

    public function municipios()
    {
    	return $this->hasMany('App\Municipios','id','id_estado');
    }
}
