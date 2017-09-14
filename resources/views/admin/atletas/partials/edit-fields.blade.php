<div class="row">
<div class="col-xs-6">
<div class="form-group{{ $errors->has('id_representante') ? ' has-error' : '' }}">
	{!! Form::label('representante','* Representante') !!}
	<select name="id_representante" id="id_representante" title="Seleccione el representante con el estudiante" class="form-control select2">
		@foreach($representantes as $key)
			@if($key->representante=="Si")
			<option value="{{$key->id}}"
				@if($key->id==$id_representante) selected="selected" @endif 
			>{{$key->apellidos}},{{$key->nombres}} {{$key->nacionalidad}}-{{$key->cedula}}</option>
			@endif
		@endforeach
	</select>
</div>
</div>

<div class="col-xs-6">
<div class="form-group{{ $errors->has('id_representante') ? ' has-error' : '' }}">
	{!! Form::label('representante','* Otro Representante') !!}
	<select name="id_norepresentante" id="id_norepresentante" title="Seleccione el otro representante con el estudiante" class="form-control select2">
		@foreach($representantes as $key)
			@if($key->representante=="No")
			<option value="{{$key->id}}" 
			@if($key->id==$id_norepresentante) selected="selected" @endif 
			>{{$key->apellidos}},{{$key->nombres}} {{$key->nacionalidad}}-{{$key->cedula}}</option>
			@endif
		@endforeach
	</select>
</div>
</div>
</div>
<div class="form-group{{ $errors->has('primer_nombre') ? ' has-error' : '' }}">
	{!! Form::label('nombre','* Primer Nombre') !!}
	{!! Form::text('primer_nombre',$atleta->primer_nombre,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin', 'title' => 'Ingrese el primer Nombre del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primer_nombre') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('segundo_nombre') ? ' has-error' : '' }}">
	{!! Form::label('segundo_nombre','Segundo Nombre') !!}
	{!! Form::text('segundo_nombre',$atleta->segundo_nombre,['class' => 'form-control','placeholder' => 'Ej: José', 'title' => 'Ingrese el segundo Nombre del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('segundo_nombre') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('primer_apellido') ? ' has-error' : '' }}">
	{!! Form::label('primer_apellido','* Primer Apellido') !!}
	{!! Form::text('primer_apellido',$atleta->primer_apellido,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos', 'title' => 'Ingrese el Primer Apellido del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primer_apellido') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('segundo_apellido') ? ' has-error' : '' }}">
	{!! Form::label('segundo_apellido','Segundo Apellido') !!}
	{!! Form::text('segundo_apellido',$atleta->segundo_apellido,['class' => 'form-control','placeholder' => 'Ej: Ribas', 'title' => 'Ingrese el Segundo Apellido del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('segundo_apellido') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
	{!! Form::label('cedula','* Cédula') !!}
	
	<select class="form-control" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del Atleta" >
		<option value="V" @if($atleta->nacionalidad=="V") selected="selected" @endif >V</option>
		<option value="E" @if($atleta->nacionalidad=="E") selected="selected" @endif >E</option>
	</select>

	{!! Form::text('cedula', $atleta->cedula, ['class' => 'form-control','placeholder' => 'Ej: 1234567', 'title' => 'Ingrese la cédula del representante sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
	{!! Form::label('fecha_nac','* Fecha de Nacimiento') !!}<br>
	<div class="input-group">
	      <div class="input-group-addon">
	        <i class="fa fa-calendar"></i>
	      </div>
	      <input value="{{$atleta->fecha_nac}}" type="text" name="fecha_nac" id="fecha_nac" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
    </div>
</div>

<div class="form-group">
	{!!  Form::label('genero', '* Género')!!}
</div>

<div class="form-group">
	{!! Form::label('Masculino', 'Masculino ')!!}
	@if($atleta->genero=="M")
	{!! Form::radio('genero','M',true) !!}
	@else
	{!! Form::radio('genero','M',false) !!}
	@endif
	{!! Form::label('Femenino', 'Femenino ')!!}
	@if($atleta->genero=="F")
	{!! Form::radio('genero','F',true) !!}
	@else
	{!! Form::radio('genero','F',false) !!}
	@endif
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
	
	{!! Form::label('estado','Estado: '.$atleta->parroquias->municipios->estados->estado)  !!}
	{!! Form::select('id_estado',$estados,$atleta->parroquias->municipios->estados->id,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Estado','id' => 'estados']) !!}
	</div>

	<div class="col-xs-4">
	{!! Form::label('municipio','Municipio: '.$atleta->parroquias->municipios->municipio)  !!}
	{!! Form::select('id_municipio',['placeholder' => 'Seleccione el Municipio'],$atleta->parroquias->municipios->id,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Municipio','id' => 'id_municipio']) !!}
	</div>
	<div class="col-xs-4">
	{!! Form::label('parroquia','Parroquia: '.$atleta->parroquias->parroquia)  !!}
	{!! Form::select('id_parroquia',['placeholder' => 'Seleccione la Parroquia'],$atleta->parroquias->id,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione la Parroquia','id' => 'id_parroquia']) !!}
	</div>
</div>
</div>
<br>

<div class="form-group{{ $errors->has('num_unif') ? ' has-error' : '' }}">
	{!! Form::label('num_unif','* Número del Uniforme') !!}
	{!! Form::number('num_unif',$atleta->num_unif,['class' => 'form-control','min' => '1', 'maxlength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','required' => 'required','placeholder' => '22', 'title' => 'Ingrese el Número del Uniforme', 'style'=>$errors->has('num_unif') ? 'border-color: red; border: 1px solid red;': '; width:80px']) !!}
</div>
<div class="form-group">
	{!! Form::label('recaudos','Recaudos') !!}
</div>

<div class="form-group">
	{!! Form::label('partida_nac','Partida de Nacimiento') !!}
	@if($atleta->recaudos->partida_nac=="No")
	{!! Form::checkbox('partida_nac','Si',false,['title' => 'Seleccione si entregó la partida de Nacimiento del Atleta','id' => 'partida_nac']) !!}
	@else
	{!! Form::checkbox('partida_nac','Si',true,['title' => 'Seleccione si entregó la partida de Nacimiento del Atleta','id' => 'partida_nac']) !!}
	@endif
	{!! Form::label('copia_cedula','Copia de la Cédula de Indentidad') !!}
	@if($atleta->recaudos->copia_ced=="No")
	{!! Form::checkbox('copia_ced','Si',false,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser representante','id' => 'copia_ced']) !!}
	@else
	{!! Form::checkbox('copia_ced','Si',true,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser representante','id' => 'copia_ced']) !!}
	@endif
</div>