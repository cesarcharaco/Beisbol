<div class="form-group<?php echo e($errors->has('primer_nombre') ? ' has-error' : ''); ?>">
	<?php echo Form::label('nombre','* Primer Nombre'); ?>

	<?php echo Form::text('primer_nombre',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin', 'title' => 'Ingrese el primer Nombre del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primer_nombre') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('segundo_nombre') ? ' has-error' : ''); ?>">
	<?php echo Form::label('segundo_nombre','* Segundo Nombre'); ?>

	<?php echo Form::text('segundo_nombre',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: José', 'title' => 'Ingrese el segundo Nombre del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('segundo_nombre') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('primer_apellido') ? ' has-error' : ''); ?>">
	<?php echo Form::label('primer_apellido','* Primer Apellido'); ?>

	<?php echo Form::text('primer_apellido',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos', 'title' => 'Ingrese el Primer Apellido del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primer_apellido') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('segundo_apellido') ? ' has-error' : ''); ?>">
	<?php echo Form::label('segundo_apellido','* Segundo Apellido'); ?>

	<?php echo Form::text('segundo_apellido',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Ribas', 'title' => 'Ingrese el Segundo Apellido del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('segundo_apellido') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('cedula') ? ' has-error' : ''); ?>">
	<?php echo Form::label('cedula','* Cédula'); ?>

	
	<select class="form-control" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del Atleta" >
		<option value="V">V</option>
		<option value="E">E</option>
	</select>
	<?php echo Form::text('cedula', null, ['class' => 'form-control','placeholder' => 'Ej: 1234567', 'title' => 'Ingrese la cédula del representante sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('fecha_nac') ? ' has-error' : ''); ?>">
	<?php echo Form::label('fecha_nac','* Fecha de Nacimiento'); ?><br>
	<div class="input-group">
	      <div class="input-group-addon">
	        <i class="fa fa-calendar"></i>
	      </div>
	      <input type="text" name="fecha_nac" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
    </div>
</div>
<?php echo Form::label('lugar_nac','* Lugar de Nacimiento'); ?><br>
<div class="row">
<div class="form-group">
	<div class="col-xs-4">
	
	<?php echo Form::label('estado','Estado'); ?>

	<?php echo Form::select('id_estado',$estados,null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Estado','id' => 'estados']); ?>

	</div>

	<div class="col-xs-4">
	<?php echo Form::label('municipio','Municipio'); ?>

	<?php echo Form::select('id_municipio',['placeholder' => 'Seleccione el Municipio'],null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Municipio','id' => 'municipios']); ?>

	</div>
	<div class="col-xs-4">
	<?php echo Form::label('parroquia','Parroquia'); ?>

	<?php echo Form::select('id_parroquia',['placeholder' => 'Seleccione la Parroquia'],null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione la Parroquia','id' => 'parroquias']); ?>

	</div>
</div>
</div>
<br>
<div class="row">
<div class="col-xs-6">
		<div class="form-group<?php echo e($errors->has('telf1') ? ' has-error' : ''); ?>">
			<?php echo Form::label('telefono','* Teléfono Principal'); ?>

			<select name="cod1" id="cod1" style="width: 100px;" class="form-control select2" title="Seleccione el código del número telefónico">
				<option value="0244">0244</option>
				<option value="0412">0412</option>
				<option value="0414">0414</option>
				<option value="0424">0424</option>
				<option value="0416">0416</option>
				<option value="0426">0426</option>
			</select>
			<?php echo Form::text('telf1', null, ['class' => 'form-control','required' => 'required', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telefono') ? 'border-color: red; border: 1px solid red;': '']); ?>

		</div>
</div>
<div class="col-xs-6">
		<div class="form-group<?php echo e($errors->has('telf2') ? ' has-error' : ''); ?>">
			<?php echo Form::label('telefono','Teléfono Adicional'); ?>

			<select name="cod2" id="cod2" style="width: 100px;" class="form-control select2" title="Seleccione el código del número telefónico">
				<option value="0244">0244</option>
				<option value="0412">0412</option>
				<option value="0414">0414</option>
				<option value="0424">0424</option>
				<option value="0416">0416</option>
				<option value="0426">0426</option>
			</select>
			<?php echo Form::text('telf2', null, ['class' => 'form-control', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telf2') ? 'border-color: red; border: 1px solid red;': '']); ?>

		</div>
</div>
</div>

<div class="form-group<?php echo e($errors->has('correo') ? ' has-error' : ''); ?>">
	<?php echo Form::label('correo','Correo'); ?>

	<?php echo Form::email('correo',null,['class' => 'form-control','id' => 'correo', 'title' => 'Ingrese el correo electrónico si es representante','required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('correo') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group">
	<?php echo Form::label('recaudos','Recaudos'); ?>

</div>

<div class="form-group">
	<?php echo Form::label('copia_cedula','Copia de la Cédula de Indentidad'); ?>

	<?php echo Form::checkbox('copia_ced','Si',false,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser representante','id' => 'copia_ced']); ?>

</div>