<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
        Atletas
        <small>Registros de Atletas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Atletas</a></li>
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
              <h3 class="box-title">Atletas</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="<?php echo e(url('admin/atletas/create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Atletas
            </a>
          </div>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Cédula</th>
                    <th>Género</th>
                    <th>Categoría</th>
                    <th>Num. Unif.</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $atletas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atleta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"><?php echo e($num=$num+1); ?></a></td>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"> <?php echo e($atleta->primer_apellido); ?> <?php echo e($atleta->segundo_apellido); ?></a></td>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"> <?php echo e($atleta->primer_nombre); ?> <?php echo e($atleta->segundo_nombre); ?></a></td>
                  <td>
				<?php if($atleta->cedula!="00000000"): ?>
                  <a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"><?php echo e($atleta->nacionalidad); ?> - <?php echo e($atleta->cedula); ?></a>
				<?php endif; ?>
                  </td>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"><?php echo e($atleta->genero); ?></a></td>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"><?php echo e($atleta->caegorias->categoria); ?></a></td>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"><?php echo e($atleta->num_unif); ?></a></td>
                <td>
                  <div class="btn-group">
<a href="#"><button onclick="mostrardatos('<?php echo e($atleta->primer_apellido); ?> <?php echo e($atleta->segundo_apellido); ?>','<?php echo e($atleta->primer_nombre); ?> <?php echo e($atleta->segundo_nombre); ?>','<?php echo e($atleta->nacionalidad); ?>-<?php echo e($atleta->cedula); ?>','<?php echo e($atleta->fecha_nac); ?>','<?php echo e($atleta->genero); ?>','<?php echo e($atleta->paroquias->parroquia); ?>,<?php echo e($atleta->parroquias->municipios->municipio); ?>,<?php echo e($atleta->parroquias->municipios->estados->estado); ?>','<?php echo e($atleta->num_unif); ?>','<?php echo e($atleta->categorias->categoria); ?>')" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>

                      <a href="<?php echo e(route('atletas.edit', [$atleta->id])); ?>"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="<?php echo e(route('atletas.destroy', [$atleta->id])); ?>"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
                      <br><br>
                    </div>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                 <tr>
                    <th>Nro</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Cédula</th>
                    <th>Género</th>
                    <th>Categoría</th>
                    <th>Num. Unif.</th>
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
                    <h4 class="modal-title">Eliminar Atleta</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este atleta en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    <?php echo Form::open(['route' => ['atletas.destroy',0133], 'method' => 'DELETE']); ?>

                        <input type="text" id="atleta" name="atleta">
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
        <h4 class="modal-title">Datos del Atletas Seleccionado</h4>
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
        <strong>Género: </strong>
        <p id="genero"><span></span></p>
        <br>
        <strong>Fecha de Nacimiento: </strong>
        <p id="fecha_nac"><span></span></p>
        <br>
        <strong>Lugar de Nacimiento: </strong>
        <p id="lugar_nac"><span></span></p>
        <br>
        <strong>Categoría: </strong>
        <p id="categoria"><span></span></p>
        <br>
        <strong>Número de Uniforme: </strong>
        <p id="num_unif"><span></span></p>
        
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
    $("#atleta").val(id);
  }
  function mostrardatos(nombres,apellidos,cedula,fecha_nac,genero,lugar_nac,num_unif,categoria) 
  {
    $('#cedula').text(cedula);
    $('#nombres').text(nombres);
    $('#apellidos').text(apellidos);
    $('#fecha_nac').text(fecha_nac);
    $('#genero').text(genero);
    $('#lugar_nac').text(lugar_nac);
    $('#num_unif').text(num_unif);
    $('#categoria').text(categoria);
    
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>