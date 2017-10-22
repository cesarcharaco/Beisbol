<div class="form-group<?php echo e($errors->has('nombres') ? ' has-error' : ''); ?>">
	<?php echo Form::label('nombres','* Nombres'); ?>

	<?php echo Form::text('nombres',$persona->datospersonales->nombres,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin José', 'title' => 'Ingrese el/los Nombre(s) del Representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('nombres') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('apellidos') ? ' has-error' : ''); ?>">
	<?php echo Form::label('apellidos','* Apellidos'); ?>

	<?php echo Form::text('apellidos',$persona->datospersonales->apellidos,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos Ribas', 'title' => 'Ingrese el/los Apellido(s) del Representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('apellidos') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('cedula') ? ' has-error' : ''); ?>">
	<?php echo Form::label('cedula','* Cédula'); ?>

	
	<select class="form-control" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del persona" >
		<option value="V" <?php if($persona->datospersonales->nacionalidad=="V"): ?> selected="selected" <?php endif; ?> >V</option>
		<option value="E" <?php if($persona->datospersonales->nacionalidad=="E"): ?> selected="selected" <?php endif; ?>>E</option>
	</select>
	<?php echo Form::text('cedula', $persona->datospersonales->cedula, ['class' => 'form-control','placeholder' => 'Ej: 1234567','required' => 'required', 'title' => 'Ingrese la cédula del persona sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('id_tipopersona') ? ' has-error' : ''); ?>">
	<?php echo Form::label('Tipopersona','* Tipo de Personal'); ?><br>
	<?php echo Form::select('id_tipopersona',$tipospersonas,$persona->recaudos->id_tipopersona,['class' => 'form control select2', 'title' => 'Seleccione el tipo de Personal', 'required' => 'required']); ?>

</div>

<div class="form-group<?php echo e($errors->has('direccion') ? 'has-error' : ''); ?>">
	<?php echo Form::label('direccion','* Dirección'); ?>

	<?php echo Form::textarea('direccion',$persona->datospersonales->direccion,['class' => 'form-control','required' => 'required', 'title' => 'Ingrese la dirección del Representante', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('direccion') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>
<div class="row">
<div class="col-xs-6">
		<div class="form-group<?php echo e($errors->has('telf1') ? ' has-error' : ''); ?>">
			<?php echo Form::label('telefono','* Teléfono Principal'); ?>

			<select name="cod1" id="cod1" style="width: 100px;" class="form-control select2" title="Seleccione el código del número telefónico">
				<option value="0244" <?php if($persona->datospersonales->cod1=="0244"): ?> selected="selected" <?php endif; ?> >0244</option>
				<option value="0412" <?php if($persona->datospersonales->cod1=="0412"): ?> selected="selected" <?php endif; ?> >0412</option>
				<option value="0414" <?php if($persona->datospersonales->cod1=="0414"): ?> selected="selected" <?php endif; ?> >0414</option>
				<option value="0424" <?php if($persona->datospersonales->cod1=="0424"): ?> selected="selected" <?php endif; ?> >0424</option>
				<option value="0416" <?php if($persona->datospersonales->cod1=="0416"): ?> selected="selected" <?php endif; ?> >0416</option>
				<option value="0426" <?php if($persona->datospersonales->cod1=="0426"): ?> selected="selected" <?php endif; ?> >0426</option>
			</select>
			<?php echo Form::text('telf1', $persona->datospersonales->telf1, ['class' => 'form-control','required' => 'required', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telf1') ? 'border-color: red; border: 1px solid red;': '']); ?>

		</div>
</div>
<div class="col-xs-6">
		<div class="form-group<?php echo e($errors->has('telf2') ? ' has-error' : ''); ?>">
			<?php echo Form::label('telefono','Teléfono Adicional'); ?>

			<select name="cod2" id="cod2" style="width: 100px;" class="form-control select2" title="Seleccione el código del número telefónico">
				<option value="0244" <?php if($persona->datospersonales->cod2=="0244"): ?> selected="selected" <?php endif; ?> >0244</option>
				<option value="0412" <?php if($persona->datospersonales->cod2=="0412"): ?> selected="selected" <?php endif; ?> >0412</option>
				<option value="0414" <?php if($persona->datospersonales->cod2=="0414"): ?> selected="selected" <?php endif; ?> >0414</option>
				<option value="0424" <?php if($persona->datospersonales->cod2=="0424"): ?> selected="selected" <?php endif; ?> >0424</option>
				<option value="0416" <?php if($persona->datospersonales->cod2=="0416"): ?> selected="selected" <?php endif; ?> >0416</option>
				<option value="0426" <?php if($persona->datospersonales->cod2=="0426"): ?> selected="selected" <?php endif; ?> >0426</option>
			</select>
			<?php if($persona->telf2=="0000000"): ?>
			<?php echo Form::text('telf2', null, ['class' => 'form-control', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telf2') ? 'border-color: red; border: 1px solid red;': '']); ?>

			<?php else: ?>
			<?php echo Form::text('telf2', $persona->datospersonales->telf2, ['class' => 'form-control', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telf2') ? 'border-color: red; border: 1px solid red;': '']); ?>

			<?php endif; ?>
		</div>
</div>
</div>

<div class="form-group<?php echo e($errors->has('correo') ? ' has-error' : ''); ?>">
	<?php echo Form::label('correo','Correo'); ?>

	
	<?php echo Form::email('correo',$persona->datospersonales->correo,['class' => 'form-control','id' => 'correo', 'title' => 'Ingrese el correo electrónico si es persona', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('correo') ? 'border-color: red; border: 1px solid red;': '']); ?>

	
</div>

<div class="form-group">
	<?php echo Form::label('recaudos','Recaudos'); ?>

</div>

<div class="form-group">
	<?php echo Form::label('copia_cedula','Copia de la Cédula de Indentidad'); ?>

	<?php if($persona->recaudos->copia_ced=="Si"): ?>
	<?php echo Form::checkbox('copia_ced','Si',true,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser persona', 'id' => 'copia_ced']); ?>

	<?php else: ?>
	<?php echo Form::checkbox('copia_ced','Si',false,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser persona', 'id' => 'copia_ced']); ?>

	<?php endif; ?>
</div>
<?php echo Form::hidden('id_recaudo',$persona->id_recaudo); ?>