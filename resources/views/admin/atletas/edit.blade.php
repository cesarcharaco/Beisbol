@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Atletas
        <small>Actualización</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Atletas</a></li>
        <li class="active">Actualizando</li>
    </ol>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            @include('alerts.requests')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Actualización del Atletas<br>
                Los campos con (<strong>*</strong>) son obligatorios</div>

                <div class="panel-body">
                   {!! Form::open(['route' => ['atletas.update',$atleta->id], 'method' => 'put']) !!}
    
                         @include('admin.atletas.partials.edit-fields')
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/atletas')}}"><i class="fa fa-times"></i> Cancelar</a>
                      </div>
                    {!! Form::close() !!} 
                        <!-- /.form-group -->
                </div>
            </div>
                
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">


$("#estados").on("change", function (event) {
    var id = event.target.value;
    $.get("/admin/municipios/"+id+"/buscar",function (data) {
       

       // $("#id_municipio").empty();
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
       
       // $("#id_parroquia").empty();
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
@endsection
