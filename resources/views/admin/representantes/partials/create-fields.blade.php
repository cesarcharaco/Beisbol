<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
	{!! Form::label('nombres','* Nombres') !!}
	{!! Form::text('nombres',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin José', 'title' => 'Ingrese el/los Nombre(s) del Representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('nombres') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
	{!! Form::label('apellidos','* Apellidos') !!}
	{!! Form::text('apellidos',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos Ribas', 'title' => 'Ingrese el/los Apellido(s) del Representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('apellidos') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
	{!! Form::label('cedula','* Cédula') !!}
	
	<select class="form-control" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del representante" >
		<option value="V">V</option>
		<option value="E">E</option>
	</select>
	{!! Form::text('cedula', null, ['class' => 'form-control','placeholder' => 'Ej: 1234567','required' => 'required', 'title' => 'Ingrese la cédula del representante sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>


<div class="form-group{{ $errors->has('direccion') ? 'has-error' : ''}}">
	{!! Form::label('direccion','* Dirección')  !!}
	{!! Form::textarea('direccion',null,['class' => 'form-control','required' => 'required', 'title' => 'Ingrese la dirección del Representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('direccion') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="row">
<div class="col-xs-6">
		<div class="form-group{{ $errors->has('telf1') ? ' has-error' : '' }}">
			{!! Form::label('telefono','* Teléfono Principal') !!}
			<select name="cod1" id="cod1" style="width: 100px;" class="form-control select2" title="Seleccione el código del número telefónico">
				<option value="0244">0244</option>
				<option value="0412">0412</option>
				<option value="0414">0414</option>
				<option value="0424">0424</option>
				<option value="0416">0416</option>
				<option value="0426">0426</option>
			</select>
			{!! Form::text('telf1', null, ['class' => 'form-control','required' => 'required', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telefono') ? 'border-color: red; border: 1px solid red;': '']) !!}
		</div>
</div>
<div class="col-xs-6">
		<div class="form-group{{ $errors->has('telf2') ? ' has-error' : '' }}">
			{!! Form::label('telefono','Teléfono Adicional') !!}
			<select name="cod2" id="cod2" style="width: 100px;" class="form-control select2" title="Seleccione el código del número telefónico">
				<option value="0244">0244</option>
				<option value="0412">0412</option>
				<option value="0414">0414</option>
				<option value="0424">0424</option>
				<option value="0416">0416</option>
				<option value="0426">0426</option>
			</select>
			{!! Form::text('telf2', null, ['class' => 'form-control', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telf2') ? 'border-color: red; border: 1px solid red;': '']) !!}
		</div>
</div>
</div>
<div class="form-group{{ $errors->has('representante') ? ' has-error' : '' }}">
	{!! Form::label('representante','Es Representante?') !!}
	{!! Form::checkbox('representante','Si',false,['id' => 'es_representante']) !!}
</div>

<div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
	{!! Form::label('correo','Correo') !!}
	{!! Form::email('correo',null,['class' => 'form-control','id' => 'correo', 'title' => 'Ingrese el correo electrónico si es representante','disabled' => 'disabled', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('correo') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group">
	{!! Form::label('recaudos','Recaudos') !!}
</div>

<div class="form-group">
	{!! Form::label('copia_cedula','Copia de la Cédula de Indentidad') !!}
	{!! Form::checkbox('copia_ced','Si',false,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser representante','id' => 'copia_ced']) !!}
</div>