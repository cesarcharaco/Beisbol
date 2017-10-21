<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
        Representantes
        <small>Registros de Representantes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Representantes</a></li>
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
              <h3 class="box-title">Representantes</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="<?php echo e(url('admin/representantes/create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Representante
            </a>
          </div>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cédula</th>
                    <th>Telf1</th>
                    <th>Es Reptt?</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $representantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $representante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="<?php echo e(route('representantes.edit', [$representante->id] )); ?>"><?php echo e($num=$num+1); ?></a></td>
                  <td><a href="<?php echo e(route('representantes.edit', [$representante->id] )); ?>"> <?php echo e($representante->datospersonales->nombres); ?></a></td>
                  <td><a href="<?php echo e(route('representantes.edit', [$representante->id] )); ?>"> <?php echo e($representante->datospersonales->apellidos); ?></a></td>
                  <td><a href="<?php echo e(route('representantes.edit', [$representante->id] )); ?>"><?php echo e($representante->datospersonales->nacionalidad); ?> - <?php echo e($representante->datospersonales->cedula); ?></a></td>
                  
                  <td><a href="<?php echo e(route('representantes.edit', [$representante->id] )); ?>"><?php echo e($representante->datospersonales->cod1); ?> - <?php echo e($representante->datospersonales->telf1); ?></a></td>
                  <td><a href="<?php echo e(route('representantes.edit', [$representante->id] )); ?>"><?php echo e($representante->representante); ?></a></td>
                <td>
                  <div class="btn-group">
<a href="#"><button onclick="mostrardatos('<?php echo e($representante->datospersonales->nombres); ?>','<?php echo e($representante->datospersonales->apellidos); ?>','<?php echo e($representante->datospersonales->nacionalidad); ?>-<?php echo e($representante->datospersonales->cedula); ?>','<?php echo e($representante->datospersonales->direccion); ?>','<?php echo e($representante->datospersonales->cod1); ?> - <?php echo e($representante->datospersonales->telf1); ?>','<?php echo e($representante->datospersonales->cod2); ?> - <?php echo e($representante->datospersonales->telf2); ?>','<?php echo e($representante->datospersonales->correo); ?>','<?php echo e($representante->datospersonales->representante); ?>','<?php echo e($representante->recaudos->copia_ced); ?>')" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>

                      <a href="<?php echo e(route('representantes.edit', [$representante->id])); ?>"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="<?php echo e(route('representantes.destroy', [$representante->id])); ?>"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
                      <br><br>
                    </div>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                 <tr>
                    <th>Nro</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cédula</th>
                    <th>Telf1</th>
                    <th>Es Reptt?</th>
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
        <h4 class="modal-title">Datos del representante</h4>
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
        <strong>Dirección: </strong>
        <p id="direccion"><span></span></p>
        <br>
        <strong>Teléfono Principal: </strong>
        <p id="telf1"><span></span></p>
        <br>
        <strong>Teléfono Adicional: </strong>
        <p id="telf2"><span></span></p>
        <br>
        <strong>Correo: </strong>
        <p id="correo"><span></span></p>
        <br>
        <strong>Es Representante?: </strong>
        <p id="es_representante"><span></span></p>
        <br>
        <strong>Entregó copia de la cédula?: </strong>
        <p id="copia_ced"><span></span></p>
        
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
  function mostrardatos(nombres,apellidos,cedula,direccion,telf1,telf2,correo,representante,copia_ced) 
  {
    $('#cedula').text(cedula);
    $('#nombres').text(nombres);
    $('#apellidos').text(apellidos);
    $('#direccion').text(direccion);
    $('#telf1').text(telf1);
    $('#telf2').text(telf2);
    $('#correo').text(correo);
    $('#copia_ced').text(copia_ced)
    $('#es_representante').text(representante);
    
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>