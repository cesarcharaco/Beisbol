<?php

namespace App\Http\Controllers;

use App\Representantes;
use Illuminate\Http\Request;
use App\Parentescos;
use App\Recaudos;
use App\DatosPersonales;
use App\Http\Requests\RepresentantesRequest;


class RepresentantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representantes=Representantes::all();
        $num=0;
        
        return view('admin.representantes.index', compact('representantes','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentescos=Parentescos::pluck('parentesco','id');

        return view('admin.representantes.create', compact('parentescos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepresentantesRequest $request)
    {
        //verificando la cedula que no este registrada
        $representante=Representantes::all();
        $buscar=0;
        $buscar2=0;
        foreach ($representante as $key) {
            if($key->datospersonales->cedula==$request->cedula){
                $buscar++;
            }
            if ($key->datospersonales->correo==$request->correo) {
                $buscar2++;
            }
        }
        
        if ($buscar>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('representantes.create')->withInput();
        } else {

            if ($request->representante=="Si") {
                if ($request->correo=="") {
                    flash("SI SELECCIONÓ COMO REPRESENTANTE DEBE INGRESAR EL CORREO ELECTRÓNICO!", 'error'); 
                    return redirect()->route('representantes.create')->withInput();
                } else {
                    if ($buscar2>0) {
                        flash("EL CORREO ELECTRÓNICO YA HA SIDO REGISTRADO!", 'error'); 
                        return redirect()->route('representantes.create')->withInput();
                    } else {
                        if ($request->copia_ced=="") {
                            $copia_ced="No";
                        } else {
                            $copia_ced="Si";
                        }
                        if ($request->telf2=="") {
                            $cod2="0000";
                            $telf2="0000000";
                        } else {
                            $cod2=$request->cod2;
                            $telf2=$request->telf2;
                        }
                        
                        //registrando el recaudo
                        $recaudo=Recaudos::create(['partida_nac' => 'No',
                                                   'copia_ced' => $request->copia_ced,
                                                   'id_tipopersona' => 5]);
        
                        //registrando representante
                        $datopersonal=DatosPersonales::create(['nombres' => $request->nombres,
                            'apellidos' => $request->apellidos,
                            'nacionalidad' => $request->nacionalidad,
                            'cedula' => $request->cedula,
                            'direccion' => $request->direccion,
                            'cod1' => $request->cod1,
                            'telf1' => $request->telf1,
                            'cod2' => $cod2,
                            'telf2' => $telf2,
                            'correo' => $request->correo]);
                        
                        $representante=Representantes::create(['id_datopersonal' => $datopersonal->id,
                            'representante' => $request->representante,
                            'id_recaudo' => $recaudo->id]);

                        flash("REGISTRO EXITOSO!", 'success'); 
                        if ($request->desde==1) {
                            return redirect()->back();    
                        } else {
                            return redirect()->route('representantes.index');
                        }
                    }
                }
            } else {//si no es un representante
                if ($request->copia_ced=="") {
                    $copia_ced="No";
                }
                if ($request->telf2=="") {
                    $cod2="0000";
                    $telf2="0000000";
                } else {
                    $cod2=$request->cod2;
                    $telf2=$request->telf2;
                }
                
                //registrando el recaudo
                $recaudo=Recaudos::create(['partida_nac' => 'No',
                                           'copia_ced' => $request->copia_ced,
                                           'id_tipopersona' => 5]);
                //registrando representante

                $datopersonal=DatosPersonales::create(['nombres' => $request->nombres,
                    'apellidos' => $request->apellidos,
                    'nacionalidad' => $request->nacionalidad,
                    'cedula' => $request->cedula,
                    'direccion' => $request->direccion,
                    'cod1' => $request->cod1,
                    'telf2' => $request->telf1,
                    'cod2' => $cod2,
                    'telf2' => $telf,
                    'correo' => 'Ninguno']);
                $representante=Representantes::create(['id_datopersonal' => $datopersonal->id,
                    'representante' => 'No',
                    'id_recaudo' => $recaudo->id]);
                        flash("REGISTRO EXITOSO!", 'succes'); 
                        if ($request->desde==1) {
                            return redirect()->back();    
                        } else {
                            return redirect()->route('representantes.index');
                        }
            }
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Representantes  $representantes
     * @return \Illuminate\Http\Response
     */
    public function show(Representantes $representantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Representantes  $representantes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $representante=Representantes::find($id);
        return view('admin.representantes.edit', compact('representante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Representantes  $representantes
     * @return \Illuminate\Http\Response
     */
    public function update(RepresentantesRequest $request,$id)
    {
        //verificando la cedula que no este registrada
        $representante=Representantes::all();
        $buscar=0;
        $buscar2=0;
        foreach ($representante as $key) {
            if($key->datospersonales->cedula==$request->cedula and $key->id!=$id){
                $buscar++;
            }
            if ($key->datospersonales->correo==$request->correo) {
                $buscar2++;
            }
        }
        

        if ($buscar>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('representantes.edit',$id)->withInput();
        } else {

            if ($request->representante=="Si") {
                if ($request->correo=="") {
                    flash("SI SELECCIONÓ COMO REPRESENTANTE DEBE INGRESAR EL CORREO ELECTRÓNICO!", 'error'); 
                    return redirect()->route('representantes.edit',$id)->withInput();
                } else {
                    
                    if ($buscar2>0) {
                        flash("EL CORREO ELECTRÓNICO YA HA SIDO REGISTRADO!", 'error'); 
                        return redirect()->route('representantes.edit',$id)->withInput();
                    } else {
                        if ($request->copia_ced=="") {
                            $copia_ced="No";
                        } else {
                            $copia_ced="Si";
                        }
                        if ($request->telf2=="") {
                            $cod2="0000";
                            $telf2="0000000";
                        } else {
                            $cod2=$request->cod2;
                            $telf2=$request->telf2;
                        }
                        
                        //actualizando el recaudo
                        $recaudo=Recaudos::find($request->id_recaudo);
                        $recaudo->copia_ced=$copia_ced;
                        $recaudo->save();
                        //actualizando representante
                    $representante=Representantes::find($id);
                    $representante->datospersonales->nombres=$request->nombres;
                    $representante->datospersonales->apellidos=$request->apellidos;
                    $representante->datospersonales->nacionalidad=$request->nacionalidad;
                    $representante->datospersonales->cedula=$request->cedula;
                    $representante->datospersonales->direccion=$request->direccion;
                    $representante->datospersonales->cod1=$request->cod1;
                    $representante->datospersonales->telf1=$request->telf1;
                    $representante->datospersonales->cod2=$cod2;
                    $representante->datospersonales->telf2=$telf2;
                    $representante->datospersonales->correo=$request->correo;

                    $representante->datospersonales->save();
                    $representante->representante=$request->representante;
                    $representante->save();
                        flash("ACTUALIZACIÓN EXITOSA!", 'success'); 
                        return redirect()->route('representantes.index');
                    }
                }
            } else {//si no es un representante
                if ($request->copia_ced=="") {
                    $copia_ced="No";
                } else {
                    $copia_ced="Si";
                }
                if ($request->telf2=="") {
                    $cod2="0000";
                    $telf2="0000000";
                } else {
                    $cod2=$request->cod2;
                    $telf2=$request->telf2;
                }
                
                //actualizando el recaudo
                $recaudo=Recaudos::find($request->id_recaudo);
                $recaudo->copia_ced=$copia_ced;
                $recaudo->save();
                //actualizando representante
                $representante=Representantes::find($id);
                $representante->datospersonales->nombres=$request->nombres;
                $representante->datospersonales->apellidos=$request->apellidos;
                $representante->datospersonales->nacionalidad=$request->nacionalidad;
                $representante->datospersonales->cedula=$request->cedula;
                $representante->datospersonales->direccion=$request->direccion;
                $representante->datospersonales->cod1=$request->cod1;
                $representante->datospersonales->telf1=$request->telf1;
                $representante->datospersonales->cod2=$cod2;
                $representante->datospersonales->telf2=$telf2;
                $representante->datospersonales->correo='Ninguno';
                $representante->datospersonales->save();

                $representante->representante='No';
                $representante->save();
                        flash("ACTUALIZACIÓN EXITOSA!", 'success'); 
                        return redirect()->route('representantes.index');
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Representantes  $representantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Representantes $representantes)
    {
        //
    }
}
