<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;
use App\Recaudos;
use App\TipoPersonas;
use App\Http\Requests\PersonalRequest;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal=Personal::all();
        $num=0;

        return view('admin.personal.index', compact('personal','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipopersonas=TipoPersonas::where('id','<=',3)->pluck('tipo','id');
        return view('admin.personal.create',compact('tipopersonas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonalRequest $request)
    {

         //verificando la cedula que no este registrada
        $buscar=Personal::where('cedula',$request->cedula)->first();
        if (count($buscar)>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('personal.create')->withInput();
        } else {

            $buscar2=Personal::where('correo',$request->correo)->first();
            if (count($buscar2)>0) {
                flash("EL CORREO ELECTRÓNICO YA HA SIDO REGISTRADO!", 'error'); 
                return redirect()->route('personal.create')->withInput();
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
                                       'id_tipopersona' => $request->id_tipopersona]);
            //registrando personal
            $persona=Personal::create(['nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'nacionalidad' => $request->nacionalidad,
                'cedula' => $request->cedula,
                'cod1' => $request->cod1,
                'telf1' => $request->telf1,
                'cod2' => $cod2,
                'telf2' => $telf2,
                'correo' => $request->correo,
                'direccion' => $request->direccion,
                'id_recaudo' => $recaudo->id]);
            flash("REGISTRO EXITOSO!", 'succes'); 
            return redirect()->route('personal.index');
                }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona=Personal::find($id);
        $tipopersonas=TipoPersonas::where('id','<=',3)->pluck('tipo','id');

        return view('admin.personal.edit', compact('persona','tipopersonas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(PersonalRequest $request,$id)
    {
        //verificando la cedula que no este registrada
        $buscar=Personal::where('cedula',$request->cedula)->where('id','<>',$id)->first();

        if (count($buscar)>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('personal.edit',$id)->withInput();
        } else {

                $buscar2=Personal::where('correo',$request->correo)->where('id','<>',$id)->first();
                if (count($buscar2)>0) {
                    flash("EL CORREO ELECTRÓNICO YA HA SIDO REGISTRADO!", 'error'); 
                    return redirect()->route('personal.edit',$id)->withInput();
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
                    $recaudo->id_tipopersona=$request->id_tipopersona;
                    $recaudo->save();
                    //actualizando persona
                    $persona=Personal::find($id);
                    $persona->nombres=$request->nombres;
                    $persona->apellidos=$request->apellidos;
                    $persona->nacionalidad=$request->nacionalidad;
                    $persona->cedula=$request->cedula;
                    $persona->direccion=$request->direccion;
                    $persona->cod1=$request->cod1;
                    $persona->telf1=$request->telf1;
                    $persona->cod2=$cod2;
                    $persona->telf2=$telf2;
                    $persona->correo=$request->correo;
                    $persona->save();
                    flash("ACTUALIZACIÓN EXITOSA!", 'success'); 
                    return redirect()->route('personal.index');
                
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }
}