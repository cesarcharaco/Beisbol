<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
        Personal
        <small>Registros de Personal</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Personal</a></li>
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
              <h3 class="box-title">Personal</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="<?php echo e(url('admin/personal/create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Personal
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
                    <th>correo</th>
                    <th>Telf1</th>
                    <th>Personal</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $personal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="<?php echo e(route('personal.edit', [$persona->id] )); ?>"><?php echo e($num=$num+1); ?></a></td>
                  <td><a href="<?php echo e(route('personal.edit', [$persona->id] )); ?>"> <?php echo e($persona->datospersonales->nombres); ?></a></td>
                  <td><a href="<?php echo e(route('personal.edit', [$persona->id] )); ?>"> <?php echo e($persona->datospersonales->apellidos); ?></a></td>
                  <td><a href="<?php echo e(route('personal.edit', [$persona->id] )); ?>"><?php echo e($persona->datospersonales->nacionalidad); ?> - <?php echo e($persona->datospersonales->cedula); ?></a></td>
                  <td><a href="<?php echo e(route('personal.edit', [$persona->id] )); ?>"><?php echo e($persona->datospersonales->cod1); ?> - <?php echo e($persona->telf1); ?></a></td>
                  <td><a href="<?php echo e(route('personal.edit', [$persona->id] )); ?>"><?php echo e($persona->recaudos->tipospersonas->tipo); ?></a></td>
                <td>
                  <div class="btn-group">
<a href="#"><button onclick="mostrardatos('<?php echo e($persona->datospersonales->nombres); ?>','<?php echo e($persona->datospersonales->apellidos); ?>','<?php echo e($persona->datospersonales->nacionalidad); ?>-<?php echo e($persona->datospersonales->cedula); ?>','<?php echo e($persona->datospersonales->direccion); ?>','<?php echo e($persona->datospersonales->cod1); ?> - <?php echo e($persona->datospersonales->telf1); ?>','<?php echo e($persona->datospersonales->cod2); ?> - <?php echo e($persona->datospersonales->telf2); ?>','<?php echo e($persona->datospersonales->correo); ?>','<?php echo e($persona->recaudos->copia_ced); ?>')" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>

                      <a href="<?php echo e(route('personal.edit', [$persona->id])); ?>"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="<?php echo e(route('personal.destroy', [$persona->id])); ?>"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
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
                    <th>correo</th>
                    <th>Telf1</th>
                    <th>Personal</th>
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
                    ¿Esta seguro que desea eliminar este persona en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    <?php echo Form::open(['route' => ['personal.destroy',0133], 'method' => 'DELETE']); ?>

                        <input type="text" id="persona" name="persona">
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
        <h4 class="modal-title">Datos del Personal Seleccionado</h4>
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
    $("#persona").val(id);
  }
  function mostrardatos(nombres,apellidos,cedula,direccion,telf1,telf2,correo,copia_ced) 
  {
    $('#cedula').text(cedula);
    $('#nombres').text(nombres);
    $('#apellidos').text(apellidos);
    $('#parentesco').text(parentesco);
    $('#direccion').text(direccion);
    $('#telf1').text(telf1);
    $('#telf2').text(telf2);
    $('#correo').text(correo);
    $('#copia_ced').text(copia_ced);
    
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>