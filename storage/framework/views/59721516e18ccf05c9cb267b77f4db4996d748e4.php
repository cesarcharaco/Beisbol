<?php echo Form::hidden('id_recaudo',$atleta->id_recaudo); ?>

<div class="row">
<div class="col-xs-6">
<?php echo Form::hidden('id_representante_ant',$id_representante); ?>

<div class="form-group<?php echo e($errors->has('id_representante') ? ' has-error' : ''); ?>">
	<?php echo Form::label('representante','* Representante'); ?>

	<select name="id_representante" id="id_representante" title="Seleccione el representante con el estudiante" class="form-control select2">
		<?php $__currentLoopData = $representantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($key->representante=="Si"): ?>
			<option value="<?php echo e($key->id); ?>"
				<?php if($key->id==$id_representante): ?> selected="selected" <?php endif; ?> 
			><?php echo e($key->apellidos); ?>,<?php echo e($key->nombres); ?> <?php echo e($key->nacionalidad); ?>-<?php echo e($key->cedula); ?></option>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
</div>
</div>

<div class="col-xs-6">
<?php echo Form::hidden('id_norepresentante_ant',$id_norepresentante); ?>

<div class="form-group<?php echo e($errors->has('id_representante') ? ' has-error' : ''); ?>">
	<?php echo Form::label('representante','* Otro Representante'); ?>

	<select name="id_norepresentante" id="id_norepresentante" title="Seleccione el otro representante con el estudiante" class="form-control select2">
		<?php $__currentLoopData = $representantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($key->representante=="No"): ?>
			<option value="<?php echo e($key->id); ?>" 
			<?php if($key->id==$id_norepresentante): ?> selected="selected" <?php endif; ?> 
			><?php echo e($key->apellidos); ?>,<?php echo e($key->nombres); ?> <?php echo e($key->nacionalidad); ?>-<?php echo e($key->cedula); ?></option>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
</div>
</div>
</div>
<div class="form-group<?php echo e($errors->has('primer_nombre') ? ' has-error' : ''); ?>">
	<?php echo Form::label('nombre','* Primer Nombre'); ?>

	<?php echo Form::text('primer_nombre',$atleta->primer_nombre,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin', 'title' => 'Ingrese el primer Nombre del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primer_nombre') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('segundo_nombre') ? ' has-error' : ''); ?>">
	<?php echo Form::label('segundo_nombre','Segundo Nombre'); ?>

	<?php echo Form::text('segundo_nombre',$atleta->segundo_nombre,['class' => 'form-control','placeholder' => 'Ej: José', 'title' => 'Ingrese el segundo Nombre del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('segundo_nombre') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('primer_apellido') ? ' has-error' : ''); ?>">
	<?php echo Form::label('primer_apellido','* Primer Apellido'); ?>

	<?php echo Form::text('primer_apellido',$atleta->primer_apellido,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos', 'title' => 'Ingrese el Primer Apellido del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primer_apellido') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('segundo_apellido') ? ' has-error' : ''); ?>">
	<?php echo Form::label('segundo_apellido','Segundo Apellido'); ?>

	<?php echo Form::text('segundo_apellido',$atleta->segundo_apellido,['class' => 'form-control','placeholder' => 'Ej: Ribas', 'title' => 'Ingrese el Segundo Apellido del Atleta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('segundo_apellido') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('cedula') ? ' has-error' : ''); ?>">
	<?php echo Form::label('cedula','* Cédula'); ?>

	
	<select class="form-control" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del Atleta" >
		<option value="V" <?php if($atleta->nacionalidad=="V"): ?> selected="selected" <?php endif; ?> >V</option>
		<option value="E" <?php if($atleta->nacionalidad=="E"): ?> selected="selected" <?php endif; ?> >E</option>
	</select>

	<?php echo Form::text('cedula', $atleta->cedula, ['class' => 'form-control','placeholder' => 'Ej: 1234567', 'title' => 'Ingrese la cédula del representante sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']); ?>

</div>

<div class="form-group<?php echo e($errors->has('fecha_nac') ? ' has-error' : ''); ?>">
	<?php echo Form::label('fecha_nac','* Fecha de Nacimiento'); ?><br>
	<div class="input-group">
	      <div class="input-group-addon">
	        <i class="fa fa-calendar"></i>
	      </div>
	      <input value="<?php echo e($atleta->fecha_nac); ?>" type="text" name="fecha_nac" id="fecha_nac" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
    </div>
</div>

<div class="form-group">
	<?php echo Form::label('genero', '* Género'); ?>

</div>

<div class="form-group">
	<?php echo Form::label('Masculino', 'Masculino '); ?>

	<?php if($atleta->genero=="M"): ?>
	<?php echo Form::radio('genero','M',true); ?>

	<?php else: ?>
	<?php echo Form::radio('genero','M',false); ?>

	<?php endif; ?>
	<?php echo Form::label('Femenino', 'Femenino '); ?>

	<?php if($atleta->genero=="F"): ?>
	<?php echo Form::radio('genero','F',true); ?>

	<?php else: ?>
	<?php echo Form::radio('genero','F',false); ?>

	<?php endif; ?>
</div>

<div class="form-group">
	<?php echo Form::label('edad','Edad (para asignación de categoría se calcula la edad aunque no halla cumplido aún)'); ?>

	<font color="blue"><strong><p id="edad"><span></span> </p></strong></font>
	<?php echo Form::hidden('edad',null,['id' => 'edad_actual']); ?>

</div>

<div class="form-group">
	<?php echo Form::label('categoria','Categoría'); ?>

	<font color="blue"><strong><p id="categoria" ><span></span> </p></strong></font>
	<?php echo Form::hidden('id_categoria',$atleta->id_categoria,['id' => 'id_categoria']); ?>

</div>
<?php echo Form::label('lugar_nac','* Lugar de Nacimiento'); ?><br>
<div class="row">
<div class="form-group">
	<div class="col-xs-4">
	
	<?php echo Form::label('estado','Estado: '.$atleta->parroquias->municipios->estados->estado); ?>

	<?php echo Form::select('id_estado',$estados,$atleta->parroquias->municipios->estados->id,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Estado','id' => 'estados']); ?>

	</div>

	<div class="col-xs-4">
	<?php echo Form::label('municipio','Municipio: '.$atleta->parroquias->municipios->municipio); ?>

	<?php echo Form::select('id_municipio',['placeholder' => 'Seleccione el Municipio'],$atleta->parroquias->municipios->id,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Municipio','id' => 'id_municipio']); ?>

	</div>
	<div class="col-xs-4">
	<?php echo Form::label('parroquia','Parroquia: '.$atleta->parroquias->parroquia); ?>

	<?php echo Form::select('id_parroquia',['placeholder' => 'Seleccione la Parroquia'],$atleta->parroquias->id,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione la Parroquia','id' => 'id_parroquia']); ?>

	</div>
</div>
</div>
<br>

<div class="form-group<?php echo e($errors->has('num_unif') ? ' has-error' : ''); ?>">
	<?php echo Form::label('num_unif','* Número del Uniforme'); ?>

	<?php echo Form::number('num_unif',$atleta->num_unif,['class' => 'form-control','min' => '1', 'maxlength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','required' => 'required','placeholder' => '22', 'title' => 'Ingrese el Número del Uniforme', 'style'=>$errors->has('num_unif') ? 'border-color: red; border: 1px solid red;': '; width:80px']); ?>

</div>
<div class="form-group">
	<?php echo Form::label('recaudos','Recaudos'); ?>

</div>

<div class="form-group">
	<?php echo Form::label('partida_nac','Partida de Nacimiento'); ?>

	<?php if($atleta->recaudos->partida_nac=="No"): ?>
	<?php echo Form::checkbox('partida_nac','Si',false,['title' => 'Seleccione si entregó la partida de Nacimiento del Atleta','id' => 'partida_nac']); ?>

	<?php else: ?>
	<?php echo Form::checkbox('partida_nac','Si',true,['title' => 'Seleccione si entregó la partida de Nacimiento del Atleta','id' => 'partida_nac']); ?>

	<?php endif; ?>
	<?php echo Form::label('copia_cedula','Copia de la Cédula de Indentidad'); ?>

	<?php if($atleta->recaudos->copia_ced=="No"): ?>
	<?php echo Form::checkbox('copia_ced','Si',false,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser representante','id' => 'copia_ced']); ?>

	<?php else: ?>
	<?php echo Form::checkbox('copia_ced','Si',true,['title' => 'Seleccione si entregó la copia de la cédula en caso de ser representante','id' => 'copia_ced']); ?>

	<?php endif; ?>
</div>