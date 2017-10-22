<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
        Montos de pago de Matrícula
        <small>Registros de Montos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cuotas de Matrículas</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<div class="col-xs-12">
<?php echo $__env->make('alerts.requests', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="container">

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cuotas</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="<?php echo e(url('admin/pagos/create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Pago
            </a>
          </div>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
	                    <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <th><?php echo e($mes->mes); ?></th>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tr>
							</thead>
							<tbody>
							<?php if($cuantos>0): ?>
								<tr>
									<td>
									<?php if($mes_actual<=1): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($enero->id); ?>,'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($enero->monto); ?></button></a>
									<?php else: ?>
										<?php echo e($enero->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=2 ): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($febrero->id); ?>,'Febrero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($febrero->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($febrero->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=3 ): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($marzo->id); ?>,'Marzo')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($marzo->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($marzo->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=4 ): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($abril->id); ?>,'Abril')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($abril->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($abril->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=5 ): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($mayo->id); ?>,'Mayo')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($mayo->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($mayo->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=6 ): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($junio->id); ?>,'Junio')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($junio->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($junio->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=7 ): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($julio->id); ?>,'Julio')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($julio->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($julio->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=8 ): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($agosto->id); ?>,'Agosto')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($agosto->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($agosto->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=9 ): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($septiembre->id); ?>,'Septiembre')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($septiembre->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($septiembre->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=10 ): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($octubre->id); ?>,'Octubre')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($octubre->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($octubre->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=11 ): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($noviembre->id); ?>,'Noviembre')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($noviembre->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($noviembre->monto); ?>

									<?php endif; ?>
									</td>
									<td>
									<?php if($mes_actual<=12): ?>
									<a href="#"><button onclick="cambiar(<?php echo e($diciembre->id); ?>,'Diciembre')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" ><?php echo e($diciembre->monto); ?></button></a>
									<?php else: ?>
									<?php echo e($diciembre->monto); ?>

									<?php endif; ?>
									</td>
									
								</tr>
								<?php endif; ?>
							</tbody>
              <tfoot>
                <tr>
                    <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo e($mes->mes); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cambiar el Monto desde el mes de <strong><p id="mes"></p></strong></h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea cambiar este monto en específico?...<br>
                    <?php echo Form::open(['route' => ['pagos.edit',0], 'method' => 'GET']); ?>

                    <div class="form-group">
                    	<label>Monto Nuevo</label>
                    	<input type="number" min="1" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required="required" name="monto_nuevo" title="Ingrese el Nuevo Monto para la matrícula en el mes seleccionado">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>


                        <input type="hidden" id="key" name="key">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
  
  function cambiar(id,mes) 
  {
    $("#key").val(id);
    $("#mes").text(mes);
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>