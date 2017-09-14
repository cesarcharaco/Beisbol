<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
        Cuotas de los Campeonatos
        <small>Registros de Cuotas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cuotas de Campeonatos</a></li>
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
            <a href="<?php echo e(url('admin/cuotascampeonatos/create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Cuota
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
                    <th>Año</th>
                    <th>Campeonato</th>
                  </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $poranio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr> 

                  <?php $__currentLoopData = $cuotascampeonatos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key2->anio==$key->anio && $key2->campeonato==$key->campeonato): ?>
                    <td><a href="<?php echo e(url('admin/cuotascampeonatos/editar', [$mes->id,$key->anio,$key->campeonato] )); ?>"> <?php echo e($key2->monto); ?></a></td>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <td><?php echo e($key->anio); ?></td>
                  <td><?php echo e($key->campeonato); ?></td>

                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                 <tr>
                    <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <th><?php echo e($mes->mes); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th>Año</th>
                    <th>Campeonato</th>
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
                    <h4 class="modal-title">Eliminar la Cuota</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta cuota en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    <?php echo Form::open(['route' => ['cuotascampeonatos.destroy',0133], 'method' => 'DELETE']); ?>

                        <input type="text" id="key" name="key">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
  
  function eliminar(id) 
  {
    $("#key").val(id);
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>