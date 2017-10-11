<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meses;
use App\CuotaCampeonatos;
use App\Http\Requests\CuotasCampeonatosRequest;
use DB;
class CuotasCampeonatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuotascampeonatos=CuotaCampeonatos::all();
        
        $uno="Mantenimiento";
        $dos="Municipal";
        $sql="SELECT * FROM cuota_campeonatos WHERE campeonato='".$uno."' or campeonato='".$dos."' group by campeonato,anio ORDER BY anio ASC ";
        //dd($sql);
        $poranio=DB::select($sql);
        
        $num=0;
        $meses=Meses::all();

        return view('admin.cuotascampeonatos.index', compact('cuotascampeonatos','num','meses','poranio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cuotascampeonatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuotasCampeonatosRequest $request)
    {

        $buscar=CuotaCampeonatos::where('anio',$request->anio)->where('campeonato',$request->campeonato)->first();

        if (count($buscar)>0) {
            flash("YA HAN SIDO REGISTRADAS LAS CUOTAS DEL AÑO ".$request->anio." Y EL CAMPEONATO ".$request->campeonato.", DEBERÁ MODIFICARLAS DESDE LA LISTA PRINCIPAL!", 'error'); 
            return redirect()->route('cuotascampeonatos.create')->withInput();
        } else {
            for($i=1;$i<=12;$i++){
                $cuotascampeonato=CuotaCampeonatos::create(['monto' => $request->monto,
                                                            'campeonato' => $request->campeonato,
                                                            'anio' => $request->anio,
                                                            'id_mes' => $i]);
            }
            flash("REGISTRO EXITOSO!", 'success'); 
            return redirect()->route('cuotascampeonatos.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuotascampeonatos=CuotaCampeonatos::all();
        
        $uno="Mantenimiento";
        $dos="Municipal";
        $sql="SELECT * FROM cuota_campeonatos WHERE campeonato='".$uno."' or campeonato='".$dos."' group by campeonato,anio ORDER BY anio ASC ";
        //dd($sql);
        $poranio=DB::select($sql);
        
        $num=0;
        $meses=Meses::all();

        return view('admin.cuotascampeonatos.show', compact('cuotascampeonatos','num','meses','poranio'));
    }

    public function mostrar()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuotacampeonato=CuotaCampeonatos::find($id);

        return view('admin.cuotascampeonatos.edit', compact('cuotacampeonato'));
    }

    public function editar($id_mes,$anio,$campeonato)
    {
        $cuotacampeonato=CuotaCampeonatos::where('id_mes',$id_mes)->where('anio',$anio)->where('campeonato',$campeonato)->first();

        return view('admin.cuotascampeonatos.edit', compact('cuotacampeonato'));   
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CuotasCampeonatosRequest $request, $id)
    {
        $buscar=CuotaCampeonatos::find($id);
        for($i=$buscar->id_mes;$i<=12;$i++){
                $buscar2=CuotaCampeonatos::where('id_mes',$i)->where('anio',$request->anio)->where('campeonato',$request->campeonato)->first();
                $buscar2->monto=$request->monto;
                $buscar2->save();
            }
            flash("ACTUALIZACIÓN EXITOSA!", 'success'); 
            return redirect()->route('cuotascampeonatos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}