<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
        Atletas
        <small>Nuevo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Atletas</a></li>
        <li class="active">Nuevo</li>
    </ol>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            <?php echo $__env->make('alerts.requests', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Atletas<br>
                Los campos con (<strong>*</strong>) son obligatorios</div>

                <div class="panel-body">
                <div class="form-group">
    <a href="#" ><button style="padding: 10px 10px 10px 10px;"  class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede registrar el representante" ><i class="fa fa-user-plus"></i> Registrar Representante</button></a>
                      <br><br>
</div>
                    <?php echo Form::open(['route' => ['atletas.store'], 'method' => 'post']); ?>

    
                         <?php echo $__env->make('admin.atletas.partials.create-fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a class="btn btn-danger pull-right btn-flat" href="<?php echo e(url('admin/atletas')); ?>"><i class="fa fa-times"></i> Cancelar</a>
                      </div>
                    <?php echo Form::close(); ?> 
                        <!-- /.form-group -->
                </div>
            </div>
                
        </div>
    </div>
</div>

<div id="myModal"  class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar Representante</h4>
                </div>
                <div class="modal-body">
                    Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.
                    <?php echo Form::open(['route' => ['representantes.store'], 'method' => 'POST']); ?>

                        <?php echo $__env->make('admin.representantes.partials.create-fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <input type="hidden" name="desde" value="1">
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <?php echo Form::close(); ?>



                </div>
            </div>
        </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">


$("#estados").on("change", function (event) {
    var id = event.target.value;
    $.get("/admin/municipios/"+id+"/buscar",function (data) {
       

       $("#id_municipio").empty();
       $("#id_municipio").append('<option value="" selected disabled> Seleccione el Municipio</option>');
        
        if(data.length > 0){

            for (var i = 0; i < data.length ; i++) 
            {  
                $("#id_municipio").removeAttr('disabled');
                $("#id_municipio").append('<option value="'+ data[i].id + '">' + data[i].municipio +'</option>');
            }

        }else{
            
            $("#id_municipio").attr('disabled', false);

        }
    });
});

$("#id_municipio").on("change", function (event) {
    var id = event.target.value;

    $.get("/admin/parroquias/"+id+"/buscar",function (data) {
       
       $("#id_parroquia").empty();
       $("#id_parroquia").append('<option value="" selected disabled> Seleccione la Parroquia</option>');
        
        if(data.length > 0){

            for (var i = 0; i < data.length ; i++) 
            {  
                $("#id_parroquia").removeAttr('disabled');
                $("#id_parroquia").append('<option value="'+ data[i].id + '">' + data[i].parroquia +'</option>');
            }

        }else{
            
            $("#id_parroquia").attr('disabled', false);

        }
    });
});

$("#fecha_nac").on("blur",function (event) {
   var fecha_nac=event.target.value;

   var hoy = new Date();
    var cumpleanos = new Date(fecha_nac);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    // para efectos del sistema
     $("#edad").text(edad+" años");
     $("#edad_actual").val(edad);

      $.get("/admin/categorias/"+edad+"/buscar",function (data) {
            
            if(data[0].literal==="A" || data[0].literal==="AA" || data[0].literal==="AAA"){
                $("#categoria").text(data[0].categoria+" - "+data[0].literal);
            }else{
                $("#categoria").text(data[0].categoria);    
            }
            $("#id_categoria").val(data[0].id);
       });
    
});
</script>
<script type="text/javascript">
    
    $(document).ready ( function () {
        $("#es_representante").change( function () {
            
            if($(this).is(":checked")) 
            {
                $("#correo").removeAttr('disabled');
                $("#copia_ced").removeAttr('disabled');
                
            } else {

                $("#correo").prop('disabled', true);
                $("#copia_ced").prop('disabled',true);
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>