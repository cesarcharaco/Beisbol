<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atletas extends Model
{
    protected $table='atletas';

    protected $fillable=['primer_apellido','segundo_apellido','primer_nombre','segundo_nombre','nacionalidad','cedula','fecha_nac','genero','id_parroquia','num_unif','id_categoria','id_recaudo'];


    public function parroquias()
    {
    	return $this->belongsTo('App\Parroquias','id_parroquia');
    }

    public function categorias()
    {
    	return $this->belongsTo('App\Categorias','id_categoria');
    }

    public function recaudos()
    {
        return $this->belongsTo('App\Recaudos','id_recaudo');
    }

    public function representantes()
    {
        return $this->belongsToMany('App\Representantes','atletas_has_representantes','id_atleta','id_representante')->withPivot('id_parentesco');
    }

    public function parentescos()
    {
        return $this->belongsToMany('App\Parentescos','atletas_has_representantes','id_atleta','id_parentesco')->withPivot('id_representante');
    }
}
