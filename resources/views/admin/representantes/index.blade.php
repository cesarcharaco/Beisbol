@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Representantes
        <small>Registros de Representantes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Representantes</a></li>
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
              <h3 class="box-title">Representantes</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/representantes/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Representante
            </a>
          </div>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cédula</th>
                    <th>Parentesco</th>
                    <th>Telf1</th>
                    <th>Es Reptt?</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($representantes as $representante)
                <tr>
                  <td><a href="{{ route('representantes.edit', [$representante->id] ) }}">{{$num=$num+1}}</a></td>
                  <td><a href="{{ route('representantes.edit', [$representante->id] ) }}"> {{$representante->nombres}}</a></td>
                  <td><a href="{{ route('representantes.edit', [$representante->id] ) }}"> {{$representante->apellidos}}</a></td>
                  <td><a href="{{ route('representantes.edit', [$representante->id] ) }}">{{$representante->nacionalidad}} - {{$representante->cedula}}</a></td>
                  
                 <td><a href="{{ route('representantes.edit', [$representante->id] ) }}"> {{$representante->parentescos->parentesco}}</a></td>
                  
                  <td><a href="{{ route('representantes.edit', [$representante->id] ) }}">{{$representante->cod1}} - {{$representante->telf1}}</a></td>
                  <td><a href="{{ route('representantes.edit', [$representante->id] ) }}">{{$representante->representante}}</a></td>
                <td>
                  <div class="btn-group">
<a href="#"><button onclick="mostrardatos('{{$representante->nombres}}','{{$representante->apellidos}}','{{$representante->nacionalidad}}-{{$representante->cedula}}','{{$representante->parentescos->parentesco}}','{{$representante->cod1}} - {{$representante->telf1}}','{{$representante->cod2}} - {{$representante->telf2}}','{{$representante->correo}}','{{$representante->representante}}','{{$representante->recaudos->copia_ced}}')" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>

                      <a href="{{ route('representantes.edit', [$representante->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="{{ route('representantes.destroy', [$representante->id]) }}"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
                      <br><br>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                 <tr>
                    <th>Nro</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cédula</th>
                    <th>Parentesco</th>
                    <th>Telf1</th>
                    <th>Es Reptt?</th>
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
                    <h4 class="modal-title">Eliminar Representante</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este representante en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['representantes.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="text" id="representante" name="representante">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

<div id="myModal2"  class="modal fade" role="dialog">
  <div class="modal-dialog">
            <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Datos del representante</h4>
      </div>
      <div class="modal-body">               
        <strong>Cédula: </strong>
        <p id="cedula"><span></span></p>
        <br>        
        <strong>Nombres: </strong>
        <p id="nombres"><span></span></p>
        <br>
        <strong>Apellidos: </strong>
        <p id="apellidos"><span></span></p>
        <br>
        <strong>Parentesco: </strong>
        <p id="parentesco"><span></span></p>
        <br>
        <strong>Teléfono Principal: </strong>
        <p id="telf1"><span></span></p>
        <br>
        <strong>Teléfono Adicional: </strong>
        <p id="telf2"><span></span></p>
        <br>
        <strong>Correo: </strong>
        <p id="correo"><span></span></p>
        <br>
        <strong>Es Representante?: </strong>
        <p id="es_representante"><span></span></p>
        <br>
        <strong>Entregó copia de la cédula?: </strong>
        <p id="copia_ced"><span></span></p>
        
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function eliminar(id) 
  {
    $("#representante").val(id);
  }
  function mostrardatos(nombres,apellidos,cedula,parentesco,telf1,telf2,correo,representante,copia_ced) 
  {
    $('#cedula').text(cedula);
    $('#nombres').text(nombres);
    $('#apellidos').text(apellidos);
    $('#parentesco').text(parentesco);
    $('#telf1').text(telf1);
    $('#telf2').text(telf2);
    $('#correo').text(correo);
    $('#copia_ced').text(copia_ced)
    $('#es_representante').text(representante);
    
  }
</script>
@endsection
