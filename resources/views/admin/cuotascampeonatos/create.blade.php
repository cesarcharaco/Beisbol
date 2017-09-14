@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Cuotas de Campeonatos
        <small>Nuevo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Cuotas</a></li>
        <li class="active">Nuevo</li>
    </ol>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            @include('alerts.requests')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Cuotas<br>
                Los campos con (<strong>*</strong>) son obligatorios</div>

                <div class="panel-body">
                
                    {!! Form::open(['route' => ['cuotascampeonatos.store'], 'method' => 'post']) !!}
    
                         @include('admin.cuotascampeonatos.partials.create-fields')
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/cuotascampeonatos')}}"><i class="fa fa-times"></i> Cancelar</a>
                      </div>
                    {!! Form::close() !!} 
                        <!-- /.form-group -->
                </div>
            </div>
                
        </div>
    </div>
</div>

@endsection
