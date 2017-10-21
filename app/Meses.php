<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meses extends Model
{
    protected $table='meses';

    protected $fillable=['mes'];

    public function pagos()
    {
    	return $this->belongsToMany('App\Pagos','pagos_meses','id_mes','id_pago');
    }

    
}
