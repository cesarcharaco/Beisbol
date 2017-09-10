<?php

namespace App\Http\Controllers;

use App\Atletas;
use Illuminate\Http\Request;
use App\Estados;
use App\Municipios;
use App\Parroquias;

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
        $estados=Estados::pluck('estado','id');
        return view('admin.atletas.create',compact('estados'));
    }

    public function obtenerMunicipios(Request $request,$id)
    {
        dd($request);
        if ($request->ajax()) {
            $municipios=Municipios::municipios($id);
            return response()->json($municipios);
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
        //
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
    public function edit(Atletas $atletas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atletas  $atletas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atletas $atletas)
    {
        //
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
