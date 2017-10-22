<?php

namespace App\Http\Controllers;

use App\Atletas;
use Illuminate\Http\Request;
use App\Estados;
use App\Municipios;
use App\Parroquias;
use App\Categorias;
use App\Recaudos;
use App\Representantes;
use App\Parentescos;
use App\Http\Requests\AtletasRequest;
use App\Pagos;
use App\EstadosPagos;
use App\Matriculas;
use App\CuotasCampeonatos;
use App\Campeonatos;
class AtletasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atletas=Atletas::all();
        $num=0;

        return view('admin.atletas.index', compact('atletas','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentescos=Parentescos::pluck('parentesco','id');
        $estados=Estados::pluck('estado','id');
        $categorias=Categorias::all();
        $representantes=Representantes::all();

        return view('admin.atletas.create',compact('estados','categorias','representantes','parentescos'));
    }

    public function obtenerMunicipios($id)
    {
        return  $municipios=Municipios::where('id_estado',$id)->get();
    }

    public function obtenerParroquias($id)
    {
        return  $parroquias=Parroquias::where('id_municipio',$id)->get();
    }

    public function buscarcategoria($edad)
    {
        return $categoria=Categorias::where('edad',$edad)->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtletasRequest $request)
    {
        $anio=date('Y');
        $pagos=Pagos::where('anio',$anio)->get();
        $buscar=count($pagos);
        if ($buscar==0) {
            flash("NO ES POSIBLE REGISTRAR UN ATLETA HASTA QUE SEAN REALIZADOS LOS REGISTROS DE LOS PAGOS DE LA MATRÍCULA!", 'error'); 
                return redirect()->route('atletas.create')->withInput();
        } else {
        
        //dd($request->id_norepresentante);
        if ($request->cedula!="") {
            $atleta=Atletas::where('cedula',$request->cedula)->first();
            if (count($atleta)>0) {
                flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
                return redirect()->route('atletas.create')->withInput();
            } else {
                $atleta=Atletas::where('num_unif',$request->num_unif)->first();
                if (count($atleta)>0) {
                    flash("EL NÚMERO DEL UNIFORME YA SE ENCUENTRA ASIGNADO!", 'error'); 
                    return redirect()->route('atletas.create')->withInput();
                } else {
                             

                    //comprobando checkbox
                    if ($request->partida_nac=="") {
                        $partida_nac="No";
                    } else {
                        $partida_nac="Si";
                    }

                    if ($request->copia_ced=="") {
                        $copia_ced="No";
                    } else {
                        $copia_ced="Si";
                    }

                    $recaudo=Recaudos::create(['partida_nac' => $partida_nac,
                                                'copia_ced' => $copia_ced,
                                                'id_tipopersona' => 4]);

                    $atleta=Atletas::create(['primer_apellido' => $request->primer_apellido,
                                             'segundo_apellido' => $request->segundo_apellido,
                                             'primer_nombre' => $request->primer_nombre,
                                             'segundo_nombre' => $request->segundo_nombre,
                                             'nacionalidad' => $request->nacionalidad,
                                             'cedula' => $request->cedula,
                                             'fecha_nac' => $request->fecha_nac,
                                             'genero' => $request->genero,
                                             'id_parroquia' => $request->id_parroquia,
                                             'num_unif' => $request->num_unif,
                                             'id_categoria' => $request->id_categoria,
                                             'id_recaudo' => $recaudo->id]);

                    $atl_rep=\DB::table('atletas_has_representantes')->insert(array(
                                            'id_atleta' => $atleta->id,
                                            'id_representante' => $request->id_representante,
                                            'id_parentesco' => $request->id_parentesco1));

                    $atl_rep2=\DB::table('atletas_has_representantes')->insert(array(
                                            'id_atleta' => $atleta->id,
                                            'id_representante' => $request->id_norepresentante,
                                            'id_parentesco' => $request->id_parentesco2));
                    //registrando pagos en estado Sin Pagar
            for ($i=1; $i <= 12; $i++) { 
                $pago=Pagos::where('id_mes',$i)->get()->last();
                $estadopago=EstadosPagos::create(['estado' => 'Sin Pagar',
                                                'forma_pago' => '',
                                                'codigo_operacion' => '',
                                                'id_atletarepres' => $atleta->representantes[0]->id]);
                $matricula=Matriculas::create(['id_pago' => $pago->id,
                                            'id_estadopago' => $estadopago->id]);
            }
            //registrando pago de torneos 
            $cuotacampeonato=CuotasCampeonatos::where('anio',$anio)->where('campeonato','Municipal')->first();

            if (count($cuotacampeonato)>0) {
                $estadopago=EstadosPagos::create(['estado' => 'Sin Pagar',
                                                'forma_pago' => '',
                                                'codigo_operacion' => '',
                                                'id_atletarepres' => $atleta->representantes[0]->id]);
                $campeonato=Campeonatos::create(['id_cuotacamp' => $cuotacampeonato->id,
                    'id_estadopago' => $estadopago->id]);
            }
            
            $cuotacampeonato2=CuotasCampeonatos::where('anio',$anio)->where('campeonato','Mantenimiento')->first();

            if (count($cuotacampeonato2)>0) {
                $estadopago=EstadosPagos::create(['estado' => 'Sin Pagar',
                                                'forma_pago' => '',
                                                'codigo_operacion' => '',
                                                'id_atletarepres' => $atleta->representantes[0]->id]);
                $campeonato=Campeonatos::create(['id_cuotacamp' => $cuotacampeonato2->id,
                    'id_estadopago' => $estadopago->id]);
            }
                    flash("REGISTRO EXITOSO!", 'success'); 
                    return redirect()->route('atletas.index');
                }
                
            }
            
        } else {
            //en caso de que no posea cedula
            $atleta=Atletas::where('num_unif',$request->num_unif)->first();
                if (count($atleta)>0) {
                    flash("EL NÚMERO DEL UNIFORME YA SE ENCUENTRA ASIGNADO!", 'error'); 
                return redirect()->route('atletas.create')->withInput();
                } else {
                //comprobando checkbox
                    if ($request->partida_nac=="") {
                        $partida_nac="No";
                    } else {
                        $partida_nac="Si";
                    }

                    if ($request->copia_ced=="") {
                        $copia_ced="No";
                    } else {
                        $copia_ced="Si";
                    }

                    $recaudo=Recaudos::create(['partida_nac' => $partida_nac,
                                                'copia_ced' => $copia_ced,
                                                'id_tipopersona' => 4]);

                    $atleta=Atletas::create(['primer_apellido' => $request->primer_apellido,
                                             'segundo_apellido' => $request->segundo_apellido,
                                             'primer_nombre' => $request->primer_nombre,
                                             'segundo_nombre' => $request->segundo_nombre,
                                             'nacionalidad' => $request->nacionalidad,
                                             'cedula' => $request->cedula,
                                             'fecha_nac' => $request->fecha_nac,
                                             'genero' => $request->genero,
                                             'id_parroquia' => $request->id_parroquia,
                                             'num_unif' => $request->num_unif,
                                             'id_categoria' => $request->id_categoria,
                                             'id_recaudo' => $recaudo->id]);

                    $atl_rep=\DB::table('atletas_has_representantes')->insert(array(
                                            'id_atleta' => $atleta->id,
                                            'id_representante' => $request->id_representante,
                                            'id_parentesco' => $request->id_parentesco1));
                    $atl_rep2=\DB::table('atletas_has_representantes')->insert(array(
                                            'id_atleta' => $atleta->id,
                                            'id_representante' => $request->id_norepresentante,
                                            'id_parentesco' => $request->id_parentesco2));
                     //registrando pagos en estado Sin Pagar
            for ($i=1; $i <= 12; $i++) { 
                $pago=Pagos::where('id_mes',$i)->get()->last();
                $estadopago=EstadosPagos::create(['estado' => 'Sin Pagar',
                                                'forma_pago' => '',
                                                'codigo_operacion' => '',
                                                'id_atletarepres' => $atleta->representantes[0]->id]);
                $matricula=Matriculas::create(['id_pago' => $pago->id,
                                            'id_estadopago' => $estadopago->id]);
            }
            //registrando pago de torneos 
            $cuotacampeonato=CuotasCampeonatos::where('anio',$anio)->where('campeonato','Municipal')->first();

            if (count($cuotacampeonato)>0) {
                $estadopago=EstadosPagos::create(['estado' => 'Sin Pagar',
                                                'forma_pago' => '',
                                                'codigo_operacion' => '',
                                                'id_atletarepres' => $atleta->representantes[0]->id]);
                $campeonato=Campeonatos::create(['id_cuotacamp' => $cuotacampeonato->id,
                    'id_estadopago' => $estadopago->id]);
            }
            
            $cuotacampeonato2=CuotasCampeonatos::where('anio',$anio)->where('campeonato','Mantenimiento')->first();

            if (count($cuotacampeonato2)>0) {
                $estadopago=EstadosPagos::create(['estado' => 'Sin Pagar',
                                                'forma_pago' => '',
                                                'codigo_operacion' => '',
                                                'id_atletarepres' => $atleta->representantes[0]->id]);
                $campeonato=Campeonatos::create(['id_cuotacamp' => $cuotacampeonato2->id,
                    'id_estadopago' => $estadopago->id]);
            }

                    flash("REGISTRO EXITOSO!", 'success'); 
                    return redirect()->route('atletas.index');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atletas  $atletas
     * @return \Illuminate\Http\Response
     */
    public function show(Atletas $atletas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atletas  $atletas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atleta=Atletas::find($id);
        $parentescos=Parentescos::all();
        $estados=Estados::pluck('estado','id');
        $categorias=Categorias::all();
        $representantes=Representantes::all();
        //dd(count($atleta->representantes));
        foreach ($representantes as $key) {
            for ($i=0; $i < 2; $i++) { 
                
                if ($atleta->representantes[$i]->id==$key->id and $key->representante=="Si") {
                    $id_representante=$key->id;
                }

                if ($atleta->representantes[$i]->id==$key->id and $key->representante=="No") {
                    $id_norepresentante=$key->id;
                }
            }
            
        }
        //dd($id_norepresentante);
        return view('admin.atletas.edit',compact('estados','categorias','representantes','parentescos','atleta','id_representante','id_norepresentante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atletas  $atletas
     * @return \Illuminate\Http\Response
     */
    public function update(AtletasRequest $request, $id)
    {
        if ($request->cedula!="") {
            $atleta=Atletas::where('cedula',$request->cedula)->where('id','<>',$id)->first();
            if (count($atleta)>0) {
                flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
                return redirect()->route('atletas.edit',['id' => $id])->withInput();
            } else {
                $atleta=Atletas::where('num_unif',$request->num_unif)->where('id','<>',$id)->first();
                if (count($atleta)>0) {
                    flash("EL NÚMERO DEL UNIFORME YA SE ENCUENTRA ASIGNADO!", 'error'); 
                    return redirect()->route('atletas.edit',['id' => $id])->withInput();
                } else {
                             

                    //comprobando checkbox
                    if ($request->partida_nac=="") {
                        $partida_nac="No";
                    } else {
                        $partida_nac="Si";
                    }

                    if ($request->copia_ced=="") {
                        $copia_ced="No";
                    } else {
                        $copia_ced="Si";
                    }

                    $recaudo=Recaudos::find($request->id_recaudo);
                    $recaudo->partida_nac=$partida_nac;
                    $recaudo->copia_ced=$copia_ced;
                    $recaudo->save();
                    
                    $atleta=Atletas::find($id);
                    $atleta->primer_apellido=$request->primer_apellido;
                    $atleta->segundo_apellido=$request->segundo_apellido;
                    $atleta->primer_nombre=$request->primer_nombre;
                    $atleta->segundo_nombre=$request->segundo_nombre;
                    $atleta->nacionalidad=$request->nacionalidad;
                    $atleta->cedula=$request->cedula;
                    $atleta->fecha_nac=$request->fecha_nac;
                    $atleta->genero=$request->genero;
                    $atleta->id_parroquia=$request->id_parroquia;
                    $atleta->num_unif=$request->num_unif;
                    $atleta->id_categoria=$request->id_categoria;
                    $atleta->id_recaudo=$request->id_recaudo;
                    $atleta->save();

                    
                    //actualizando representante
                    $sql='SELECT * FROM atletas_has_representantes WHERE id_representante='.$request->id_representante_ant.' AND id_atleta='.$id;
                    //dd($sql);
                    $atl_rep=\DB::select($sql);
                    //dd($atl_rep[0]->id);  
                    $sql2='UPDATE atletas_has_representantes SET id_representante='.$request->id_representante.',id_parentesco='.$request->id_parentesco1.' WHERE id='.$atl_rep[0]->id;
                    $atl_rep_act=\DB::update($sql2);

                    //actualizando no representante
                    $sql='SELECT * FROM atletas_has_representantes WHERE id_representante='.$request->id_norepresentante_ant.' AND id_atleta='.$id;
                    //dd($sql);
                    $atl_rep2=\DB::select($sql);
                    //dd($atl_rep[0]->id);  
                    $sql2='UPDATE atletas_has_representantes SET id_representante='.$request->id_representante.',id_parentesco='.$request->id_parentesco2.' WHERE id='.$atl_rep2[0]->id;
                    $atl_rep_act=\DB::update($sql2);
                    

                    flash("ACTUALIZACIÓN EXITOSA!", 'success'); 
                    return redirect()->route('atletas.index');
                }
                
            }
            
        } else {
            //en caso de que no posea cedula
            $atleta=Atletas::where('num_unif',$request->num_unif)->where('id','<>',$id)->first();
                if (count($atleta)>0) {
                    flash("EL NÚMERO DEL UNIFORME YA SE ENCUENTRA ASIGNADO!", 'error'); 
                return redirect()->route('atletas.edit',['id' => $id])->withInput();
                } else {
                //comprobando checkbox
                    if ($request->partida_nac=="") {
                        $partida_nac="No";
                    } else {
                        $partida_nac="Si";
                    }

                    if ($request->copia_ced=="") {
                        $copia_ced="No";
                    } else {
                        $copia_ced="Si";
                    }


                    $recaudo=Recaudos::find($request->id_recaudo);
                    $recaudo->partida_nac=$partida_nac;
                    $recaudo->copia_ced=$copia_ced;
                    $recaudo->save();
                    
                    $atleta=Atletas::find($id);
                    $atleta->primer_apellido=$request->primer_apellido;
                    $atleta->segundo_apellido=$request->segundo_apellido;
                    $atleta->primer_nombre=$request->primer_nombre;
                    $atleta->segundo_nombre=$request->segundo_nombre;
                    $atleta->nacionalidad=$request->nacionalidad;
                    $atleta->cedula=$request->cedula;
                    $atleta->fecha_nac=$request->fecha_nac;
                    $atleta->genero=$request->genero;
                    $atleta->id_parroquia=$request->id_parroquia;
                    $atleta->num_unif=$request->num_unif;
                    $atleta->id_categoria=$request->id_categoria;
                    $atleta->id_recaudo=$request->id_recaudo;
                    $atleta->save();

                    //actualizando representante
                    $sql='SELECT * FROM atletas_has_representantes WHERE id_representante='.$request->id_representante_ant.' AND id_atleta='.$id;
                    //dd($sql);
                    $atl_rep=\DB::select($sql);
                    //dd($atl_rep[0]->id);  
                    $sql2='UPDATE atletas_has_representantes SET id_representante='.$request->id_representante.',id_parentesco='.$request->id_parentesco1.' WHERE id='.$atl_rep[0]->id;
                    $atl_rep_act=\DB::update($sql2);

                    //actualizando no representante
                    $sql='SELECT * FROM atletas_has_representantes WHERE id_representante='.$request->id_norepresentante_ant.' AND id_atleta='.$id;
                    //dd($sql);
                    $atl_rep2=\DB::select($sql);
                    //dd($atl_rep[0]->id);  
                    $sql2='UPDATE atletas_has_representantes SET id_representante='.$request->id_representante.',id_parentesco='.$request->id_parentesco2.' WHERE id='.$atl_rep2[0]->id;
                    $atl_rep_act=\DB::update($sql2);
                    

                    

                    flash("ACTUALIZACIÓN EXITOSA!", 'success'); 
                    return redirect()->route('atletas.index');
                }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atletas  $atletas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atletas $atletas)
    {
        //
    }
}
