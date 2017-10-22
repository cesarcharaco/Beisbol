<div class="row">
<div class="col-xs-6">
<div class="form-group{{ $errors->has('id_representante') ? ' has-error' : '' }}">
	{!! Form::label('representante','* Representante') !!}
	<select name="id_representante" id="id_representante" title="Seleccione el representante con el estudiante" class="form-control select2">
		@foreach($representantes as $key)
			@if($key->representante=="Si")
			<option value="{{$key->id}}">{{$key->datospersonales->apellidos}},{{$key->datospersonales->nombres}} {{$key->datospersonales->nacionalidad}}-{{$key->datospersonales->cedula}}</option>
			@endif
		@endforeach
	</select>
</div>
<div class="form-group">
	{!! Form::label('parentesco', '&nbsp;&nbsp;Parentesco') !!}
	{!! Form::select('id_parentesco1',$parentescos,null,['class' => 'form-control select2', 'title' => 'Seleccione el parentesco para el primer representante']) !!}
</div>
</div>

<div class="col-xs-6">
<div class="form-group{{ $errors->has('id_representante') ? ' has-error' : '' }}">
	{!! Form::label('representante','* Otro Representante') !!}
	<select name="id_norepresentante" id="id_norepresentante" title="Seleccione el otro representante con el estudiante" class="form-control select2">
		@foreach($representantes as $key)
			@if($key->representante=="No")
			<option value="{{$key->id}}">{{$key->datospersonales->apellidos}},{{$key->datospersonales->nombres}} {{$key->datospersonales->nacionalidad}}-{{$key->datospersonales->cedula}}</option>
			@endif
		@endforeach
	</select>
</div>

<div class="form-group">
	{!! Form::label('parentesco', '&nbsp;&nbsp;Parentesco') !!}
	{!! Form::select('id_parentesco2',$parentescos,null,['class' => 'form-control select2', 'title' => 'Seleccione el parentesco para el segundo representante']) !!}
</div>
</div>
</div>
<div class="form-group{{ $errors->has('primer_nombre') ? ' has-error' : '' }}">
	{!! Form::label('nombre','* Primer Nombre') !!}
	{!! Form::text('primer_nombre',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin', 'title' => 'Ingrese el primer Nombre del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primer_nombre') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('segundo_nombre') ? ' has-error' : '' }}">
	{!! Form::label('segundo_nombre','Segundo Nombre') !!}
	{!! Form::text('segundo_nombre',null,['class' => 'form-control','placeholder' => 'Ej: José', 'title' => 'Ingrese el segundo Nombre del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('segundo_nombre') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('primer_apellido') ? ' has-error' : '' }}">
	{!! Form::label('primer_apellido','* Primer Apellido') !!}
	{!! Form::text('primer_apellido',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos', 'title' => 'Ingrese el Primer Apellido del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primer_apellido') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('segundo_apellido') ? ' has-error' : '' }}">
	{!! Form::label('segundo_apellido','Segundo Apellido') !!}
	{!! Form::text('segundo_apellido',null,['class' => 'form-control','placeholder' => 'Ej: Ribas', 'title' => 'Ingrese el Segundo Apellido del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('segundo_apellido') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
	{!! Form::label('cedula','* Cédula') !!}
	
	<select class="form-control" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del Atleta" >
		<option value="V">V</option>
		<option value="E">E</option>
	</select>
	{!! Form::text('cedula', null, ['class' => 'form-control','placeholder' => 'Ej: 1234567', 'title' => 'Ingrese la cédula del representante sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
	{!! Form::label('fecha_nac','* Fecha de Nacimiento') !!}<br>
	<div class="input-group">
	      <div class="input-group-addon">
	        <i class="fa fa-calendar"></i>
	      </div>
	      <input type="text" name="fecha_nac" id="fecha_nac" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
    </div>
</div>

<div class="form-group">
	{!!  Form::label('genero', '* Género')!!}
</div>

<div class="form-group">
	{!! Form::label('Masculino', 'Masculino ')!!}
	{!! Form::radio('genero','M',true) !!}
	{!! Form::label('Femenino', 'Femenino ')!!}
	{!! Form::radio('genero','F',false) !!}
</div>

<div class="form-group">
	{!! Form::label('edad','Edad (para asignación de categoría se calcula la edad aunque no halla cumplido aún)') !!}
	<font color="blue"><strong><p id="edad"><span></span> </p></strong></font>
	{!! Form::hidden('edad',null,['id' => 'edad_actual']) !!}
</div>

<div class="form-group">
	{!! Form::label('categoria','Categoría') !!}
	<font color="blue"><strong><p id="categoria" ><span></span> </p></strong></font>
	{!!  Form::hidden('id_categoria',null,['id' => 'id_categoria'])!!}
</div>
{!! Form::label('lugar_nac','* Lugar de Nacimiento')  !!}<br>
<div class="row">
<div class="form-group">
	<div class="col-xs-4">
	
	{!! Form::label('estado','Estado')  !!}
	{!! Form::select('id_estado',$estados,null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Estado','id' => 'estados']) !!}
	</div>

	<div class="col-xs-4">
	{!! Form::label('municipio','Municipio')  !!}
	{!! Form::select('id_municipio',['placeholder' => 'Seleccione el Municipio'],null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Municipio','id' => 'id_municipio']) !!}
	</div>
	<div class="col-xs-4">
	{!! Form::label('parroquia','Parroquia')  !!}
	{!! Form::select('id_parroquia',['placeholder' => 'Seleccione la Parroquia'],null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione la Parroquia','id' => 'id_parroquia']) !!}
	</div>
</div>
</div>
<br>
{{-- <div class="form-group{{ $errors->has('id_categoria') ? ' has-error' : '' }}">
	{!! Form::label('categoria','* Categoría') !!}

	<select name="id_categoria" title="Seleccione la Categoría" required="required" class="form-control select2">
		@foreach($categorias as $categoria)
			<option value="{{$categoria->id}}">Edad: {{$categoria->edad}}, {{$categoria->categoria}}
				@if($categoria->literal=="A" || $categoria->literal=="AA" || $categoria->literal=="AAA")
			 - {{$categoria->literal}}
				@endif
			 </option>
		@endforeach
	</select>

</div> --}}
<div class="form-group{{ $errors->has('num_unif') ? ' has-error' : '' }}">
	{!! Form::label('num_unif','* Número del Uniforme') !!}
	{!! Form::number('num_unif',null,['class' => 'form-control','min' => '1', 'maxlength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','required' => 'required','placeholder' => '22', 'title' => 'Ingrese el Número del Uniforme', 'style'=>$errors->has('num_unif') ? 'border-color: red; border: 1px solid red;': '; width:80px']) !!}
</div>
<div class="form-group">
	{!! Form::label('recaudos','Recaudos') !!}
</div>

<div class="form-group">
	{!! Form::label('partida_nac','Partida de Nacimiento') !!}
	{!! Form::checkbox('partida_nac','Si',false,['title' => 'Seleccione si entregó la partida de Nacimiento del Atleta','id' => 'partida_nac']) !!}
	{!! Form::label('copia_cedula','Copia de la Cédula de Indentidad') !!}
	{!! Form::checkbox('copia_ced','Si',false,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser representante','id' => 'copia_ced']) !!}
</div>