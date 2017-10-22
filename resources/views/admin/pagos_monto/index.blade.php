@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Montos de pago de Matrícula
        <small>Registros de Montos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cuotas de Matrículas</a></li>
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
            <a href="{{ url('admin/pagos/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Pago
            </a>
          </div>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
	                    @foreach($meses as $mes)
	                        <th>{{$mes->mes}}</th>
	                    @endforeach
					</tr>
							</thead>
							<tbody>
							@if($cuantos>0)
								<tr>
									<td>
									@if($mes_actual<=1)
									<a href="#"><button onclick="cambiar({{$enero->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$enero->monto}}</button></a>
									@else
										{{$enero->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=2 )
									<a href="#"><button onclick="cambiar({{$febrero->id}},'Febrero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$febrero->monto}}</button></a>
									@else
									{{$febrero->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=3 )
									<a href="#"><button onclick="cambiar({{$marzo->id}},'Marzo')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$marzo->monto}}</button></a>
									@else
									{{$marzo->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=4 )
									<a href="#"><button onclick="cambiar({{$abril->id}},'Abril')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$abril->monto}}</button></a>
									@else
									{{$abril->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=5 )
									<a href="#"><button onclick="cambiar({{$mayo->id}},'Mayo')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$mayo->monto}}</button></a>
									@else
									{{$mayo->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=6 )
									<a href="#"><button onclick="cambiar({{$junio->id}},'Junio')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$junio->monto}}</button></a>
									@else
									{{$junio->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=7 )
									<a href="#"><button onclick="cambiar({{$julio->id}},'Julio')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$julio->monto}}</button></a>
									@else
									{{$julio->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=8 )
									<a href="#"><button onclick="cambiar({{$agosto->id}},'Agosto')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$agosto->monto}}</button></a>
									@else
									{{$agosto->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=9 )
									<a href="#"><button onclick="cambiar({{$septiembre->id}},'Septiembre')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$septiembre->monto}}</button></a>
									@else
									{{$septiembre->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=10 )
									<a href="#"><button onclick="cambiar({{$octubre->id}},'Octubre')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$octubre->monto}}</button></a>
									@else
									{{$octubre->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=11 )
									<a href="#"><button onclick="cambiar({{$noviembre->id}},'Noviembre')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$noviembre->monto}}</button></a>
									@else
									{{$noviembre->monto}}
									@endif
									</td>
									<td>
									@if($mes_actual<=12)
									<a href="#"><button onclick="cambiar({{$diciembre->id}},'Diciembre')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$diciembre->monto}}</button></a>
									@else
									{{$diciembre->monto}}
									@endif
									</td>
									
								</tr>
								@endif
							</tbody>
              <tfoot>
                <tr>
                    @foreach($meses as $mes)
                        <th>{{$mes->mes}}</th>
                    @endforeach
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
                    <h4 class="modal-title">Cambiar el Monto desde el mes de <strong><p id="mes"></p></strong></h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea cambiar este monto en específico?...<br>
                    {!! Form::open(['route' => ['pagos.edit',0], 'method' => 'GET']) !!}
                    <div class="form-group">
                    	<label>Monto Nuevo</label>
                    	<input type="number" min="1" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required="required" name="monto_nuevo" title="Ingrese el Nuevo Monto para la matrícula en el mes seleccionado">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>


                        <input type="hidden" id="key" name="key">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
  
  function cambiar(id,mes) 
  {
    $("#key").val(id);
    $("#mes").text(mes);
  }
</script>
@endsection
