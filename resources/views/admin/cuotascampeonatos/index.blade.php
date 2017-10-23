@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Cuotas de los Campeonatos
        <small>Registros de Cuotas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cuotas de Campeonatos</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<div class="col-xs-12">
@include('alerts.requests')
@include('flash::message')
</div>
<div class="container">

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cuotas</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/cuotascampeonatos/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Cuota
            </a>
          </div>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>    
                    <th>Año</th>
                    <th>Torneo</th>
                    <th>Cuota</th>
                  </tr>
                </thead>
                <tbody>

                
                </tbody>
                <tfoot>
                  <tr>
                    <th>Año</th>
                    <th>Torneo</th>
                    <th>Cuota</th>
                  </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>




<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Eliminar la Cuota</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta cuota en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['cuotascampeonatos.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="text" id="key" name="key">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
  
  function eliminar(id) 
  {
    $("#key").val(id);
  }
</script>
@endsection
