<?php $__env->startSection('htmlheader_title'); ?>
  Representantes
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

<!--Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $__env->yieldContent('contentheader_title', 'Representantes'); ?>
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Representantes</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
  <div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">Lista de Representantes registrados

            <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
              <a href="<?php echo e(url('admin/representantes/create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                  <i class="fa fa-pencil"></i> Registrar representante  
              </a>
            </div>

          </div>

          <div class="col-xs-12">
         
          </div>
            <div class="panel-body">
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cédula</th>
                    <th>Parentesco</th>
                    <th>Telf1</th>
                    <th>Es Reptt?</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $representantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $representante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="<?php echo e(route('admin.representantes.edit', [$representante->id] )); ?>"><?php echo e($num=$num+1); ?></a></td>
                  <td><a href="<?php echo e(route('admin.representantes.edit', [$representante->id] )); ?>"> <?php echo e($representante->nombres); ?></a></td>
                  <td><a href="<?php echo e(route('admin.representantes.edit', [$representante->id] )); ?>"> <?php echo e($representante->apellidos); ?></a></td>
                  <td><a href="<?php echo e(route('admin.representantes.edit', [$representante->id] )); ?>"><?php echo e($representante->nacionalidad); ?> - <?php echo e($representante->cedula); ?></a></td>
                  
                 <td><a href="<?php echo e(route('admin.representantes.edit', [$representante->id] )); ?>"> <?php echo e($representante->parentescos->parentesco); ?></a></td>
                  <td>
                  <td><a href="<?php echo e(route('admin.representantes.edit', [$representante->parentesco->parentesco] )); ?>"><?php echo e($representante->cod1); ?> - <?php echo e($representante->telf1); ?></a></td>
                  <td><a href="<?php echo e(route('admin.representantes.edit', [$representante->parentesco->parentesco] )); ?>"><?php echo e($representante->representante); ?></a></td>

                  <div class="btn-group">

                      <a href="#"><button onclick="mostrardatos('<?php echo e($representante->nombres); ?>',
                        '<?php echo e($representante->apellidos); ?>',
                        '<?php echo e($representante->nacionalidad); ?>-<?php echo e($representante->cedula); ?>','<?php echo e($representante->parentescos->parentesco); ?>','<?php echo e($representante->cod1); ?> - <?php echo e($representante->telf1); ?>','<?php echo e($representante->cod2); ?> - <?php echo e($representante->telf2); ?>','<?php echo e($representante->cod3); ?> - <?php echo e($representante->telf3); ?>','<?php echo e($representante->representante); ?>'
                        )" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>

                      <a href="<?php echo e(route('admin.representantes.edit', [$representante->id])); ?>"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="<?php echo e(route('admin.representantes.destroy', [$representante->id])); ?>"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
                      <br><br>
                    </div>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div><!-- /.content-wrapper -->



<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Eliminar Representante</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este representante en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    <?php echo Form::open(['route' => ['representantes.destroy',0133], 'method' => 'DELETE']); ?>

                        <input type="text" id="representante" name="representante">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>

<div id="myModal2"  class="modal fade" role="dialog">
  <div class="modal-dialog">
            <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Datos del representantes</h4>
      </div>
      <div class="modal-body">               
        <strong>Cédula: </strong>
        <p id="cedula"><span></span></p>
        <br>        
        <strong>Nombres: </strong>
        <p id="nombres"><span></span></p>
        <br>
        <strong>Apellidos: </strong>
        <p id="apellidos"><span></span></p>
        <br>
        <strong>Profesión: </strong>
        <p id="profesion"><span></span></p>
        <br>
        <strong>Parentesco: </strong>
        <p id="parentesco"><span></span></p>
        <br>
        <strong>Teléfono 1: </strong>
        <p id="telf1"><span></span></p>
        <br>
        <strong>Teléfono 2: </strong>
        <p id="telf2"><span></span></p>
        <br>
        <strong>Teléfono 3: </strong>
        <p id="telf3"><span></span></p>
        <br>
        <strong>Es Representante?: </strong>
        <p id="es_representante"><span></span></p>
        
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function eliminar(id) 
  {
    $("#representante").val(id);
  }
  function mostrardatos(nombres,apellidos,cedula,parentesco,telf1,telf2,telf3,representante) 
  {
    $('#cedula').text(cedula);
    $('#nombres').text(nombres);
    $('#apellidos').text(apellidos);
    $('#parentesco').text(parentesco);
    $('#telf1').text(telf1);
    $('#telf2').text(telf2);
    $('#telf3').text(telf3);
    $('#es_representante').text(representante);
    
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>