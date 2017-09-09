<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
	{!! Form::label('nombres','* Nombres') !!}
	{!! Form::text('nombres',$representante->nombres,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin José', 'title' => 'Ingrese el/los Nombre(s) del Representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('nombres') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
	{!! Form::label('apellidos','* Apellidos') !!}
	{!! Form::text('apellidos',$representante->apellidos,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos Ribas', 'title' => 'Ingrese el/los Apellido(s) del Representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('apellidos') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
	{!! Form::label('cedula','* Cédula') !!}
	
	<select class="form-control" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del representante" >
		<option value="V" @if($representante->nacionalidad=="V") selected="selected" @endif >V</option>
		<option value="E" @if($representante->nacionalidad=="E") selected="selected" @endif>E</option>
	</select>
	{!! Form::text('cedula', $representante->cedula, ['class' => 'form-control','placeholder' => 'Ej: 1234567','required' => 'required', 'title' => 'Ingrese la cédula del representante sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('id_parentesco') ? ' has-error' : '' }}">
	{!! Form::label('consulta','* Parentesco') !!}<br>
	{!! Form::select('id_parentesco',$parentescos,$representante->id_parentesco,['class' => 'form control select2', 'title' => 'Seleccione el Parentesco', 'required' => 'required']) !!}
</div>

<div class="form-group{{ $errors->has('direccion') ? 'has-error' : ''}}">
	{!! Form::label('direccion','* Dirección')  !!}
	{!! Form::textarea('direccion',$representante->direccion,['class' => 'form-control','required' => 'required', 'title' => 'Ingrese la dirección del Representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('direccion') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="row">
<div class="col-xs-6">
		<div class="form-group{{ $errors->has('telf1') ? ' has-error' : '' }}">
			{!! Form::label('telefono','* Teléfono Principal') !!}
			<select name="cod1" id="cod1" style="width: 100px;" class="form-control select2" title="Seleccione el código del número telefónico">
				<option value="0244" @if($representante->cod1=="0244") selected="selected" @endif >0244</option>
				<option value="0412" @if($representante->cod1=="0412") selected="selected" @endif >0412</option>
				<option value="0414" @if($representante->cod1=="0414") selected="selected" @endif >0414</option>
				<option value="0424" @if($representante->cod1=="0424") selected="selected" @endif >0424</option>
				<option value="0416" @if($representante->cod1=="0416") selected="selected" @endif >0416</option>
				<option value="0426" @if($representante->cod1=="0426") selected="selected" @endif >0426</option>
			</select>
			{!! Form::text('telf1', $representante->telf1, ['class' => 'form-control','required' => 'required', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telf1') ? 'border-color: red; border: 1px solid red;': '']) !!}
		</div>
</div>
<div class="col-xs-6">
		<div class="form-group{{ $errors->has('telf2') ? ' has-error' : '' }}">
			{!! Form::label('telefono','Teléfono Adicional') !!}
			<select name="cod2" id="cod2" style="width: 100px;" class="form-control select2" title="Seleccione el código del número telefónico">
				<option value="0244" @if($representante->cod2=="0244") selected="selected" @endif >0244</option>
				<option value="0412" @if($representante->cod2=="0412") selected="selected" @endif >0412</option>
				<option value="0414" @if($representante->cod2=="0414") selected="selected" @endif >0414</option>
				<option value="0424" @if($representante->cod2=="0424") selected="selected" @endif >0424</option>
				<option value="0416" @if($representante->cod2=="0416") selected="selected" @endif >0416</option>
				<option value="0426" @if($representante->cod2=="0426") selected="selected" @endif >0426</option>
			</select>
			@if($representante->telf2=="0000000")
			{!! Form::text('telf2', null, ['class' => 'form-control', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telf2') ? 'border-color: red; border: 1px solid red;': '']) !!}
			@else
			{!! Form::text('telf2', $representante->telf2, ['class' => 'form-control', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telf2') ? 'border-color: red; border: 1px solid red;': '']) !!}
			@endif
		</div>
</div>
</div>
<div class="form-group{{ $errors->has('representante') ? ' has-error' : '' }}">
	{!! Form::label('representante','Es Representante?') !!}
	@if($representante->representante=="Si")
	{!! Form::checkbox('representante','Si',true,['id' => 'es_representante']) !!}
	@else
	{!! Form::checkbox('representante','Si',false,['id' => 'es_representante']) !!}
	@endif
</div>

<div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
	{!! Form::label('correo','Correo') !!}
	@if($representante->correo=="Ninguno")
	{!! Form::email('correo',null,['class' => 'form-control','id' => 'correo', 'title' => 'Ingrese el correo electrónico si es representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('correo') ? 'border-color: red; border: 1px solid red;': '']) !!}
	@else
	{!! Form::email('correo',$representante->correo,['class' => 'form-control','id' => 'correo', 'title' => 'Ingrese el correo electrónico si es representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('correo') ? 'border-color: red; border: 1px solid red;': '']) !!}
	@endif
</div>

<div class="form-group">
	{!! Form::label('recaudos','Recaudos') !!}
</div>

<div class="form-group">
	{!! Form::label('copia_cedula','Copia de la Cédula de Indentidad') !!}
	@if($representante->recaudos->copia_ced=="Si")
	{!! Form::checkbox('copia_ced','Si',true,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser representante', 'id' => 'copia_ced']) !!}
	@else
	{!! Form::checkbox('copia_ced','Si',false,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser representante', 'id' => 'copia_ced']) !!}
	@endif
</div>
{!! Form::hidden('id_recaudo',$representante->id_recaudo) !!}