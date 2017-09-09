<?php

namespace App\Http\Controllers;

use App\Representantes;
use Illuminate\Http\Request;
use App\Parentescos;
use App\Recaudos;
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
        $buscar=Representantes::where('cedula',$request->cedula)->first();
        if (count($buscar)>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('representantes.create')->withInput();
        } else {

            if ($request->representante=="Si") {
                if ($request->correo=="") {
                    flash("SI SELECCIONÓ COMO REPRESENTANTE DEBE INGRESAR EL CORREO ELECTRÓNICO!", 'error'); 
                    return redirect()->route('representantes.create')->withInput();
                } else {
                    $buscar2=Representantes::where('correo',$request->correo)->first();
                    if (count($buscar2)>0) {
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
                        $representante=Representantes::create(['nombres' => $request->nombres,
                            'apellidos' => $request->apellidos,
                            'nacionalidad' => $request->nacionalidad,
                            'cedula' => $request->cedula,
                            'direccion' => $request->direccion,
                            'cod1' => $request->cod1,
                            'telf1' => $request->telf1,
                            'cod2' => $cod2,
                            'telf2' => $telf2,
                            'id_parentesco' => $request->id_parentesco,
                            'representante' => $request->representante,
                            'correo' => $request->correo,
                            'id_recaudo' => $recaudo->id]);
                        flash("REGISTRO EXITOSO!", 'succes'); 
                        return redirect()->route('representantes.index');
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
                $representante=Representantes::create(['nombres' => $request->nombres,
                    'apellidos' => $request->apellidos,
                    'nacionalidad' => $request->nacionalidad,
                    'cedula' => $request->cedula,
                    'direccion' => $request->direccion,
                    'cod1' => $request->cod1,
                    'telf2' => $request->telf1,
                    'cod2' => $cod2,
                    'telf2' => $telf2,
                    'id_parentesco' => $request->id_parentesco,
                    'representante' => 'No',
                    'correo' => 'Ninguno',
                    'id_recaudo' => $recaudo->id]);

                        flash("REGISTRO EXITOSO!", 'succes'); 
                        return redirect()->route('representantes.index');
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
        $parentescos=Parentescos::pluck('parentesco','id');
        return view('admin.representantes.edit', compact('representante','parentescos'));
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
        $buscar=Representantes::where('cedula',$request->cedula)->where('id','<>',$id)->first();

        if (count($buscar)>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('representantes.edit',$id)->withInput();
        } else {

            if ($request->representante=="Si") {
                if ($request->correo=="") {
                    flash("SI SELECCIONÓ COMO REPRESENTANTE DEBE INGRESAR EL CORREO ELECTRÓNICO!", 'error'); 
                    return redirect()->route('representantes.edit',$id)->withInput();
                } else {
                    $buscar2=Representantes::where('correo',$request->correo)->where('id','<>',$id)->first();
                    if (count($buscar2)>0) {
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
                        $representante->nombres=$request->nombres;
                        $representante->apellidos=$request->apellidos;
                        $representante->nacionalidad=$request->nacionalidad;
                        $representante->cedula=$request->cedula;
                        $representante->direccion=$request->direccion;
                        $representante->cod1=$request->cod1;
                        $representante->telf1=$request->telf1;
                        $representante->cod2=$cod2;
                        $representante->telf2=$telf2;
                        $representante->id_parentesco=$request->id_parentesco;
                        $representante->representante=$request->representante;
                        $representante->correo=$request->correo;
                        $representante->save();
                        flash("ACTUALIZACIÓN EXITOSA!", 'success'); 
                        return redirect()->route('representantes.index');
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
                
                //actualizando el recaudo
                $recaudo=Recaudos::find($request->id_recaudo);
                $recaudo->copia_ced=$copia_ced;
                $recaudo->save();
                //actualizando representante
                $representante=Representantes::find($id);
                $representante->nombres=$request->nombres;
                $representante->apellidos=$request->apellidos;
                $representante->nacionalidad=$request->nacionalidad;
                $representante->cedula=$request->cedula;
                $representante->direccion=$request->direccion;
                $representante->cod1=$request->cod1;
                $representante->telf1=$request->telf1;
                $representante->cod2=$cod2;
                $representante->telf2=$telf2;
                $representante->id_parentesco=$request->id_parentesco;
                $representante->representante='No';
                $representante->correo='Ninguno';
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
