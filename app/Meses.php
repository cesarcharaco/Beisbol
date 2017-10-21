<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meses extends Model
{
    protected $table='meses';

    protected $fillable=['mes'];

    public function pagos()
    {
    	return $this->hasMany('App\Pagos','id_mes','id');
    }

    
}
