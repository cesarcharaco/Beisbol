<div class="form-group">
	<?php echo Form::label('anio','Monto por mes para pago de Matrículas del año '.$anio); ?>


	<input type="number" min="1" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required="required" name="monto" title="Ingrese el Nuevo Monto para la matrícula en el mes seleccionado">
</div>