<div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
	{!! Form::label('mes','Ha elegido modificar las cuotas a partir del mes '.$cuotacampeonato->meses->mes.'') !!}
	
</div>

<div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
	{!! Form::label('monto','* Monto') !!}
	{!! Form::number('monto',$cuotacampeonato->monto,['class' => 'form-control','min' => '1','required' => 'required','placeholder' => '22000', 'title' => 'Ingrese el monto de la cuota', 'style'=>$errors->has('monto') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('campeonato') ? ' has-error' : '' }}">
	{!! Form::label('campeonato','* Campeonato') !!}
	{!! Form::select('campeonato',['Municipal' => 'Municipal','Mantenimiento' => 'Mantenimiento'],$cuotacampeonato->campeonato,['class' => 'form-control','required' => 'required', 'title' => 'Ingrese el monto de la cuota', 'style'=>$errors->has('campeonato') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('anio') ? ' has-error' : '' }}">
	{!! Form::label('anio','* Año') !!}
	<select name="anio" title="Seleccione el año" class="form-control">
		@for($i=2017;$i<2030;$i++)
			<option value="{{$i}}" @if($cuotacampeonato->anio==$i) selected="selected" @endif >{{$i}}</option>
		@endfor
	</select>
</div>
