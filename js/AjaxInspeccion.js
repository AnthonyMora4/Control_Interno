$(document).ready(function(){
$('#selectComponente').on('change',function(){
    var id=$('#selectComponente').val();
    var id_depto=$('#id_depto').val();

    var id_componente1=$('#id_componente1').val();
    var id_componente2=$('#id_componente2').val();
    var id_componente3=$('#id_componente3').val();
    var id_componente4=$('#id_componente4').val();
    var id_componente5=$('#id_componente5').val();
   
    if(id==id_componente1){
            $('#headertabla').html('<div class="col col-2">Sección-Ambiente de Control</div><div class="col col-2" >Evidencia Requerida</div><div class="col col-3">Evidencia</div><div class="col col-3">Resultado</div><div class="col col-3">Comentario</div>');
    }else if(id==id_componente2){
        $('#headertabla').html('<div class="col col-2">Sección-Valoración del Riesgo</div><div class="col col-2" >Evidencia Requerida</div><div class="col col-3">Evidencia</div><div class="col col-3">Resultado</div><div class="col col-3">Comentario</div>');
    }else if(id==id_componente3){
        $('#headertabla').html('<div class="col col-2">Sección-Actividades de Control</div><div class="col col-2" >Evidencia Requerida</div><div class="col col-3">Evidencia</div><div class="col col-3">Resultado</div><div class="col col-3">Comentario</div>');
    }else if(id==id_componente4){
        $('#headertabla').html('<div class="col col-2">Sección-Sistema de Información</div><div class="col col-2" >Evidencia Requerida</div><div class="col col-3">Evidencia</div><div class="col col-3">Resultado</div><div class="col col-3">Comentario</div>');
    }else if(id==id_componente5){
        $('#headertabla').html('<div class="col col-2">Sección-Seguimiento del Sistema</div><div class="col col-2" >Evidencia Requerida</div><div class="col col-3">Evidencia</div><div class="col col-3">Resultado</div><div class="col col-3">Comentario</div>');
    }
    
    $.ajax({
        type:'POST',
        url: 'php/CargarTablaInspeccion.php',
        data:{
            'id':id,
            'id_depto':id_depto
        }
    })
    .done(function(data){
        $('#table-row').html(data)
    })
    .fail(function(){
        alert('Hubo un error al cargar los datos');
    });
    
 });
});