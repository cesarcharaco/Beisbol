<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campeonatos;
use App\EstadosPagos;
use App\CuotasCampeonatos;
use App\Atletas;
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
        $cuotascampeonatos=CuotasCampeonatos::all();
       $num=0;
        return view('admin.cuotascampeonatos.index', compact('cuotascampeonatos','num'));
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
        $anio=date('Y');
        $buscar=CuotasCampeonatos::where('anio',$anio)->where('campeonato',$request->campeonato)->first();

        if (count($buscar)>0) {
            flash("YA HAN SIDO REGISTRADAS LAS CUOTAS DEL AÑO ".$anio." Y EL CAMPEONATO ".$request->campeonato.", DEBERÁ MODIFICARLAS DESDE LA LISTA PRINCIPAL!", 'error'); 
            return redirect()->route('cuotascampeonatos.create')->withInput();
        } else {

            
                $cuotacampeonato=CuotasCampeonatos::create(['monto' => $request->monto,
                                                            'anio' => $anio,
                                                            'campeonato' => $request->campeonato]);
                $atletas=Atletas::all();
                foreach ($atletas as $key) {
                $estadopago=EstadosPagos::create(['estado' => 'Sin pagar',
                                                'forma_pago' => '',
                                                'codigo_operacion' => '',
                                                'id_atletarepres' => $key->representantes[0]->id]);
                $campeonato=Campeonatos::create(['id_cuotacamp' => $cuotacampeonato->id, 
                                                'id_estadopago' => $estadopago->id]);
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
        $atletas=Atletas::all();
        return view('admin.cuotascampeonatos.show', compact('cuotascampeonatos','num','meses','poranio','atletas'));
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
        //dd($id);
        $cuotacampeonato=CuotaCampeonatos::find($id);

        return view('admin.cuotascampeonatos.edit', compact('cuotacampeonato'));
    }

    public function editar($id_mes,$anio,$campeonato)
    {
        //dd($campeonato);
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
        //dd($id);
        $buscar=CuotaCampeonatos::find($id);
        dd($buscar->monto);
                $buscar->monto=$request->monto;
                $buscar->save();
        
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
