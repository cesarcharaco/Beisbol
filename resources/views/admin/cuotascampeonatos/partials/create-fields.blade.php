<div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
	{!! Form::label('monto','* Monto') !!}
	{!! Form::number('monto',null,['class' => 'form-control','min' => '1','required' => 'required','placeholder' => '22000', 'title' => 'Ingrese el monto de la cuota', 'style'=>$errors->has('monto') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('campeonato') ? ' has-error' : '' }}">
	{!! Form::label('campeonato','* Campeonato') !!}
	{!! Form::select('campeonato',['Municipal' => 'Municipal','Mantenimiento' => 'Mantenimiento'],null,['class' => 'form-control','required' => 'required', 'title' => 'Ingrese el monto de la cuota', 'style'=>$errors->has('campeonato') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>


