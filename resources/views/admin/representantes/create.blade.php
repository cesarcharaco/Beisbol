@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Representantes
        <small>Nuevo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Representantes</a></li>
        <li class="active">Nuevo</li>
    </ol>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            @include('alerts.requests')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Representantes<br>
                Los campos con (<strong>*</strong>) son obligatorios</div>

                <div class="panel-body">
                    {!! Form::open(['route' => ['representantes.store'], 'method' => 'post']) !!}
    
                         @include('admin.representantes.partials.create-fields')
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/representantes')}}"><i class="fa fa-times"></i> Cancelar</a>
                      </div>
                    {!! Form::close() !!} 
                        <!-- /.form-group -->
                </div>
            </div>
                
        </div>
    </div>
</div>
<script type="text/javascript">
    
    $(document).ready ( function () {
        $("#es_representante").change( function () {
            
            if($(this).is(":checked")) 
            {
                $("#correo").removeAttr('disabled');
                $("#copia_ced").removeAttr('disabled');
                
            } else {

                $("#correo").prop('disabled', true);
                $("#copia_ced").prop('disabled',true);
            }
        });
    });
</script>
@endsection