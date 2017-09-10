<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atletas extends Model
{
    protected $table='atletas';

    protected $fillable=['primer_apellido','segundo_apellido','primer_nombre','segundo_nombre','nacionalidad','cedula','fecha_nac','genero','id_parroquia','num_unif','id_categoria'];


    public function parroquias()
    {
    	return $this->belongsTo('App\Parroquias','id_parroquia');
    }

    public function categorias()
    {
    	return $this->belongsTo('App\Categorias','id_categoria');
    }
}
