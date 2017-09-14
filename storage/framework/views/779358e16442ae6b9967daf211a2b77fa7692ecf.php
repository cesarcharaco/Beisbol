<div class="form-group<?php echo e($errors->has('monto') ? ' has-error' : ''); ?>">
	<?php echo Form::label('monto','* Monto'); ?>

	<?php echo Form::number('monto',null,['class' => 'form-control','min' => '1','required' => 'required','placeholder' => '22000', 'title' => 'Ingrese el monto de la cuota', 'style'=>$errors->has('monto') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('campeonato') ? ' has-error' : ''); ?>">
	<?php echo Form::label('campeonato','* Campeonato'); ?>

	<?php echo Form::select('campeonato',['Municipal' => 'Municipal','Mantenimiento' => 'Mantenimiento'],null,['class' => 'form-control','required' => 'required', 'title' => 'Ingrese el monto de la cuota', 'style'=>$errors->has('campeonato') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('anio') ? ' has-error' : ''); ?>">
	<?php echo Form::label('anio','* Año'); ?>

	<select name="anio" title="Seleccione el año" class="form-control">
		<?php for($i=2017;$i<2030;$i++): ?>
			<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
		<?php endfor; ?>
	</select>
</div>

