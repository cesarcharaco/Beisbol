<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
        Estado de Pagos
        <small>Registros de Pagos de Matrícula y Campeonatos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Estado de Pagos</a></li>
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
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Estados de Pago de Matrícula y Campeonatos  - Categoría:<strong><?php echo e($key->categoria); ?></strong></h3>
              
            </div>
            
              <div class="box-body">
              <div style="overflow: scroll;">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Num. Unif.</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Cédula</th>
                    <th>Género</th>
                    <th>Categoría</th>
                    <th>Representante</th>
                    <th>Telf.</th>
                    <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <th><?php echo e($key2->mes); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php $categoria=$key->categoria; ?>
                <?php $__currentLoopData = $atletas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atleta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($atleta->categorias->categoria==$categoria): ?>
                <tr>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"><?php echo e($num=$num+1); ?></a></td>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"><?php echo e($atleta->num_unif); ?></a></td>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"> <?php echo e($atleta->primer_apellido); ?> <?php echo e($atleta->segundo_apellido); ?></a></td>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"> <?php echo e($atleta->primer_nombre); ?> <?php echo e($atleta->segundo_nombre); ?></a></td>
                  <td>
				<?php if($atleta->cedula!==null): ?>
                  <a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"><?php echo e($atleta->nacionalidad); ?> - <?php echo e($atleta->cedula); ?></a>
				<?php endif; ?>
                  </td>
                  <td><a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>"><?php echo e($atleta->genero); ?></a></td>
                  <td>
                    <a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>">
                    <?php echo e($atleta->categorias->categoria); ?> 
                    <?php if($atleta->categorias->categoria!=$atleta->categorias->literal): ?>
                       <?php echo e($atleta->categorias->literal); ?> 
                    <?php endif; ?>
                    </a>
                  </td>
                <?php $__currentLoopData = $atleta->representantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($key->representante=="Si"): ?>
                    <td>
                      <a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>">
                        <?php echo e($key->datospersonales->nombres); ?> <?php echo e($key->datospersonales->apellidos); ?>

                      </a>
                    </td>
                    <td>
                      <a href="<?php echo e(route('atletas.edit', [$atleta->id] )); ?>">
                        <?php echo e($key->datospersonales->cod1); ?>-<?php echo e($key->datospersonales->telf1); ?>

                      </a>
                    </td>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td>
                  <div class="btn-group">
<a href="#"><button onclick="mostrardatos('<?php echo e($atleta->primer_apellido); ?> <?php echo e($atleta->segundo_apellido); ?>','<?php echo e($atleta->primer_nombre); ?> <?php echo e($atleta->segundo_nombre); ?>','<?php echo e($atleta->nacionalidad); ?>-<?php echo e($atleta->cedula); ?>','<?php echo e($atleta->fecha_nac); ?>','<?php echo e($atleta->genero); ?>','<?php echo e($atleta->parroquias->parroquia); ?>,<?php echo e($atleta->parroquias->municipios->municipio); ?>,<?php echo e($atleta->parroquias->municipios->estados->estado); ?>','<?php echo e($atleta->num_unif); ?>','<?php echo e($atleta->categorias->categoria); ?>')" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>

                      
                      
                    </div>
                  </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                 <tr>
                    <th>Nro</th>
                    <th>Num. Unif.</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Cédula</th>
                    <th>Género</th>
                    <th>Categoría</th>
                    <th>Representante</th>
                    <th>Telf.</th>
                    <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <th><?php echo e($key2->mes); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th></th>
                  </tr>
              </tfoot>
            </table>
            </div>
          </div>
        </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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