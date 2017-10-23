<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagos;
use App\Meses;
use App\Atletas;
use App\EstadosPagos;
use App\Matriculas;
class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anio=date('Y');
        $meses=Meses::all();
        $mes_actual=date('m');
        $cuantos=count($pagos=Pagos::where('anio',$anio)->get());
        $enero=Pagos::where('anio',$anio)->where('id_mes',1)->get()->last();
        $febrero=Pagos::where('anio',$anio)->where('id_mes',2)->get()->last();
        $marzo=Pagos::where('anio',$anio)->where('id_mes',3)->get()->last();
        $abril=Pagos::where('anio',$anio)->where('id_mes',4)->get()->last();
        $mayo=Pagos::where('anio',$anio)->where('id_mes',5)->get()->last();
        $junio=Pagos::where('anio',$anio)->where('id_mes',6)->get()->last();
        $julio=Pagos::where('anio',$anio)->where('id_mes',7)->get()->last();
        $agosto=Pagos::where('anio',$anio)->where('id_mes',8)->get()->last();
        $septiembre=Pagos::where('anio',$anio)->where('id_mes',9)->get()->last();
        $octubre=Pagos::where('anio',$anio)->where('id_mes',10)->get()->last();
        $noviembre=Pagos::where('anio',$anio)->where('id_mes',11)->get()->last();
        $diciembre=Pagos::where('anio',$anio)->where('id_mes',12)->get()->last();

        return View('admin.pagos_monto.index', compact('meses','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre','mes_actual','cuantos','anio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anio=date('Y');
        $pagos=Pagos::where('anio',$anio)->get();

        if (count($pagos)>0) {
        	flash("NO ES POSIBLE CREAR NUEVOS MONTOS PUES YA EXISTEN PARA ESTE AÑO!", 'error'); 
                return redirect()->back();
        } else {
        	
        	return View('admin.pagos_monto.create',compact('anio'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anio=date('Y');
    	for ($i=1; $i <= 12; $i++) { 
                $pago=Pagos::create(['id_mes' => $i,
                					'monto' => $request->monto,
                					'anio' => $anio]);
             
            }
        $atletas=Atletas::all();
        foreach ($atletas as $key) {
        	
            for ($i=1; $i <= 12; $i++) { 
                $pago=Pagos::where('id_mes',$i)->get()->last();
                $estadopago=EstadosPagos::create(['estado' => 'Sin Pagar',
                                                'forma_pago' => '',
                                                'codigo_operacion' => '',
                                                'id_atletarepres' => $key->representantes[0]->id]);
                $matricula=Matriculas::create(['id_pago' => $pago->id,
                                            'id_estadopago' => $estadopago->id]);
        	}
        }
        flash("REGISTRO DE MONTO MENSUAL DE PAGO DE MATRÍCULA EXITOSO!", 'success'); 
                return redirect()->route('pagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
    	//dd($request->all());
        $pagos=Pagos::find($request->key);
        $anio=date('Y');
        for ($i=$pagos->id_mes; $i <= 12 ; $i++) { 
        	$pago=Pagos::create(['id_mes' => $i,
        					'monto' => $request->monto_nuevo,
        					'anio' => $anio]);	
        }
        
        flash("MONTO ACTUALIZADO CON ÉXITO!", 'success'); 
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
