<?php

namespace App\Http\Controllers;

use App\Representantes;
use Illuminate\Http\Request;
use App\Parentescos;

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
    public function store(Request $request)
    {
        //
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
    public function edit(Representantes $representantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Representantes  $representantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Representantes $representantes)
    {
        //
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
