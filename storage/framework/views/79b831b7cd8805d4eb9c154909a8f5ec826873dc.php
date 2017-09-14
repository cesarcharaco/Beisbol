<div class="row">
<div class="col-xs-6">
<div class="form-group<?php echo e($errors->has('id_representante') ? ' has-error' : ''); ?>">
	<?php echo Form::label('representante','* Representante'); ?>

	<select name="id_representante" id="id_representante" title="Seleccione el representante con el estudiante" class="form-control select2">
		<?php $__currentLoopData = $representantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($key->representante=="Si"): ?>
			<option value="<?php echo e($key->id); ?>"><?php echo e($key->apellidos); ?>,<?php echo e($key->nombres); ?> <?php echo e($key->nacionalidad); ?>-<?php echo e($key->cedula); ?></option>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
</div>
</div>

<div class="col-xs-6">
<div class="form-group<?php echo e($errors->has('id_representante') ? ' has-error' : ''); ?>">
	<?php echo Form::label('representante','* Otro Representante'); ?>

	<select name="id_norepresentante" id="id_norepresentante" title="Seleccione el otro representante con el estudiante" class="form-control select2">
		<?php $__currentLoopData = $representantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($key->representante=="No"): ?>
			<option value="<?php echo e($key->id); ?>"><?php echo e($key->apellidos); ?>,<?php echo e($key->nombres); ?> <?php echo e($key->nacionalidad); ?>-<?php echo e($key->cedula); ?></option>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
</div>
</div>
</div>
<div class="form-group<?php echo e($errors->has('primer_nombre') ? ' has-error' : ''); ?>">
	<?php echo Form::label('nombre','* Primer Nombre'); ?>

	<?php echo Form::text('primer_nombre',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin', 'title' => 'Ingrese el primer Nombre del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primer_nombre') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('segundo_nombre') ? ' has-error' : ''); ?>">
	<?php echo Form::label('segundo_nombre','Segundo Nombre'); ?>

	<?php echo Form::text('segundo_nombre',null,['class' => 'form-control','placeholder' => 'Ej: José', 'title' => 'Ingrese el segundo Nombre del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('segundo_nombre') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('primer_apellido') ? ' has-error' : ''); ?>">
	<?php echo Form::label('primer_apellido','* Primer Apellido'); ?>

	<?php echo Form::text('primer_apellido',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos', 'title' => 'Ingrese el Primer Apellido del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primer_apellido') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('segundo_apellido') ? ' has-error' : ''); ?>">
	<?php echo Form::label('segundo_apellido','Segundo Apellido'); ?>

	<?php echo Form::text('segundo_apellido',null,['class' => 'form-control','placeholder' => 'Ej: Ribas', 'title' => 'Ingrese el Segundo Apellido del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('segundo_apellido') ? 'border-color: red; border: 1px solid red;': '']); ?>

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
	      <input type="text" name="fecha_nac" id="fecha_nac" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
    </div>
</div>

<div class="form-group">
	<?php echo Form::label('genero', '* Género'); ?>

</div>

<div class="form-group">
	<?php echo Form::label('Masculino', 'Masculino '); ?>

	<?php echo Form::radio('genero','M',true); ?>

	<?php echo Form::label('Femenino', 'Femenino '); ?>

	<?php echo Form::radio('genero','F',false); ?>

</div>

<div class="form-group">
	<?php echo Form::label('edad','Edad (para asignación de categoría se calcula la edad aunque no halla cumplido aún)'); ?>

	<font color="blue"><strong><p id="edad"><span></span> </p></strong></font>
	<?php echo Form::hidden('edad',null,['id' => 'edad_actual']); ?>

</div>

<div class="form-group">
	<?php echo Form::label('categoria','Categoría'); ?>

	<font color="blue"><strong><p id="categoria" ><span></span> </p></strong></font>
	<?php echo Form::hidden('id_categoria',null,['id' => 'id_categoria']); ?>

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

	<?php echo Form::select('id_municipio',['placeholder' => 'Seleccione el Municipio'],null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Municipio','id' => 'id_municipio']); ?>

	</div>
	<div class="col-xs-4">
	<?php echo Form::label('parroquia','Parroquia'); ?>

	<?php echo Form::select('id_parroquia',['placeholder' => 'Seleccione la Parroquia'],null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione la Parroquia','id' => 'id_parroquia']); ?>

	</div>
</div>
</div>
<br>

<div class="form-group<?php echo e($errors->has('num_unif') ? ' has-error' : ''); ?>">
	<?php echo Form::label('num_unif','* Número del Uniforme'); ?>

	<?php echo Form::number('num_unif',null,['class' => 'form-control','min' => '1', 'maxlength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','required' => 'required','placeholder' => '22', 'title' => 'Ingrese el Número del Uniforme', 'style'=>$errors->has('num_unif') ? 'border-color: red; border: 1px solid red;': '; width:80px']); ?>

</div>
<div class="form-group">
	<?php echo Form::label('recaudos','Recaudos'); ?>

</div>

<div class="form-group">
	<?php echo Form::label('partida_nac','Partida de Nacimiento'); ?>

	<?php echo Form::checkbox('partida_nac','Si',false,['title' => 'Seleccione si entregó la partida de Nacimiento del Atleta','id' => 'partida_nac']); ?>

	<?php echo Form::label('copia_cedula','Copia de la Cédula de Indentidad'); ?>

	<?php echo Form::checkbox('copia_ced','Si',false,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser representante','id' => 'copia_ced']); ?>

</div>