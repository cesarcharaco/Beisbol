@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Estado de Pagos
        <small>Registros de Pagos de Matrícula y Campeonatos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Estado de Pagos</a></li>
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
            @foreach($categorias as $key)
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Estados de Pago de Matrícula y Campeonatos  - Categoría:<strong>{{$key->categoria}}</strong></h3>
              
            </div>
            
              <div class="box-body">
              <div style="overflow: scroll;">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Num. Unif.</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Cédula</th>
                    <th>Género</th>
                    <th>Categoría</th>
                    <th>Representante</th>
                    <th>Telf.</th>
                    @foreach($meses as $key2)
                      <th>{{$key2->mes}}</th>
                    @endforeach
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php $categoria=$key->categoria; ?>
                @foreach($atletas as $atleta)
                @if($atleta->categorias->categoria==$categoria)
                <tr>
                  <td><a href="{{ route('atletas.edit', [$atleta->id] ) }}">{{$num=$num+1}}</a></td>
                  <td><a href="{{ route('atletas.edit', [$atleta->id] ) }}">{{$atleta->num_unif}}</a></td>
                  <td><a href="{{ route('atletas.edit', [$atleta->id] ) }}"> {{$atleta->primer_apellido}} {{$atleta->segundo_apellido}}</a></td>
                  <td><a href="{{ route('atletas.edit', [$atleta->id] ) }}"> {{$atleta->primer_nombre}} {{$atleta->segundo_nombre}}</a></td>
                  <td>
				@if($atleta->cedula!==null)
                  <a href="{{ route('atletas.edit', [$atleta->id] ) }}">{{$atleta->nacionalidad}} - {{$atleta->cedula}}</a>
				@endif
                  </td>
                  <td><a href="{{ route('atletas.edit', [$atleta->id] ) }}">{{$atleta->genero}}</a></td>
                  <td>
                    <a href="{{ route('atletas.edit', [$atleta->id] ) }}">
                    {{$atleta->categorias->categoria}} 
                    @if($atleta->categorias->categoria!=$atleta->categorias->literal)
                       {{$atleta->categorias->literal}} 
                    @endif
                    </a>
                  </td>
                @foreach($atleta->representantes as $key)
                  @if($key->representante=="Si")
                    <td>
                      <a href="{{ route('atletas.edit', [$atleta->id] ) }}">
                        {{$key->datospersonales->nombres}} {{$key->datospersonales->apellidos}}
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('atletas.edit', [$atleta->id] ) }}">
                        {{$key->datospersonales->cod1}}-{{$key->datospersonales->telf1}}
                      </a>
                    </td>
                  @endif
                @endforeach
                @foreach($pagos as $key3)
                  {{-- 
                    @if($key3->anio==$anio and $key3->matriculas->estadospagos->atletasrepresentantes->id_atleta==$atleta->id )
                      
                          <th>{{$key3->pagos->monto}}</th>
                      
                    @endif --}}
                  
                @endforeach
                <td>
                  <div class="btn-group">
<a href="#"><button onclick="mostrardatos('{{$atleta->primer_apellido}} {{$atleta->segundo_apellido}}','{{$atleta->primer_nombre}} {{$atleta->segundo_nombre}}','{{$atleta->nacionalidad}}-{{$atleta->cedula}}','{{$atleta->fecha_nac}}','{{$atleta->genero}}','{{$atleta->parroquias->parroquia}},{{$atleta->parroquias->municipios->municipio}},{{$atleta->parroquias->municipios->estados->estado}}','{{$atleta->num_unif}}','{{$atleta->categorias->categoria}}')" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>

                      {{-- <a href="{{ route('atletas.edit', [$atleta->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="{{ route('atletas.destroy', [$atleta->id]) }}"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a> --}}
                      
                    </div>
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
              <tfoot>
                 <tr>
                    <th>Nro</th>
                    <th>Num. Unif.</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Cédula</th>
                    <th>Género</th>
                    <th>Categoría</th>
                    <th>Representante</th>
                    <th>Telf.</th>
                    @foreach($meses as $key2)
                      <th>{{$key2->mes}}</th>
                    @endforeach
                    <th></th>
                  </tr>
              </tfoot>
            </table>
            </div>
          </div>
        </div>

            @endforeach
      </div>
    </div>
  </div>




<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Eliminar Atleta</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este atleta en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['atletas.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="text" id="atleta" name="atleta">
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
        <h4 class="modal-title">Datos del Atletas Seleccionado</h4>
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
        <strong>Género: </strong>
        <p id="genero"><span></span></p>
        <br>
        <strong>Fecha de Nacimiento: </strong>
        <p id="fecha_nac"><span></span></p>
        <br>
        <strong>Lugar de Nacimiento: </strong>
        <p id="lugar_nac"><span></span></p>
        <br>
        <strong>Categoría: </strong>
        <p id="categoria"><span></span></p>
        <br>
        <strong>Número de Uniforme: </strong>
        <p id="num_unif"><span></span></p>
        
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
    $("#atleta").val(id);
  }
  function mostrardatos(nombres,apellidos,cedula,fecha_nac,genero,lugar_nac,num_unif,categoria) 
  {
    $('#cedula').text(cedula);
    $('#nombres').text(nombres);
    $('#apellidos').text(apellidos);
    $('#fecha_nac').text(fecha_nac);
    $('#genero').text(genero);
    $('#lugar_nac').text(lugar_nac);
    $('#num_unif').text(num_unif);
    $('#categoria').text(categoria);
    
  }
</script>
@endsection
