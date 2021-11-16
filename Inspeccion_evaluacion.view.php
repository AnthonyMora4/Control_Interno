<?php
include("includes/header.php");//includ de el header
?>
<link rel="stylesheet" href="css/Estilo_inspeccion.css">
<link rel="stylesheet" href="css/tablacss/style.css">
<link rel="stylesheet" href="css/estilo_select.css">

<?php

if(isset($_GET['id_depto'])){
$id_depto=$_GET['id_depto'];
$Nombre_depto=$_GET['depa'];
}else{
    $id_depto="";
    $Nombre_depto="Error, No se han cargado los departamentos";
}

include('database/db.php');
    $stmt = $db_connection->prepare("SELECT a.id_componente,a.nombre_componente FROM componentes a");
    $stmt->execute();
    $Info_componente = $stmt->get_result();
    $datosComponente=array(10);
    $idx=0;
    while ($row1 = mysqli_fetch_array($Info_componente)) {
        $datosComponente[$idx]=$row1['id_componente'];
        $idx++;
        $datosComponente[$idx]=$row1['nombre_componente'];
        $idx++;
    }
?>
<h2>Modelo de Control Interno</h2>

<br>
    <h4>Departamento:<?php echo $Nombre_depto?></h4>
    <br>
    <input class="input" type="hidden" id="id_componente1" name="id_componente1" value="<?php echo   $datosComponente[0]?>" >
    <input class="input" type="hidden" id="id_componente2" name="id_componente2" value="<?php echo   $datosComponente[2]?>" >
    <input class="input" type="hidden" id="id_componente3" name="id_componente3" value="<?php echo   $datosComponente[4]?>" >
    <input class="input" type="hidden" id="id_componente4" name="id_componente4" value="<?php echo   $datosComponente[6]?>" >
    <input class="input" type="hidden" id="id_componente5" name="id_componente5" value="<?php echo   $datosComponente[8]?>" >
    <input class="input" type="hidden" id="id_depto" name="id_depto" value="<?php echo   $id_depto?>" >
    
    <form action="php/CargarTablaInspeccion.php"  method="post">
    <input class="input" type="hidden" id="id_depto" name="id_depto" value="<?php echo   $id_depto?>" >
    <input class="input" type="hidden" id="nom_depto" name="nom_depto" value="<?php echo   $Nombre_depto?>" >

    <select class="select" name="select" id="selectComponente">
        <option disabled="true" selected="true" class="select_arrow" id="seleccione" value="seleccione">Seleccione un Componente </option>
        <option class="select_arrow" id="id_compo" name="id_compo" value="<?php echo $datosComponente[0] ?>"><?php echo $datosComponente[1] ?></option>
        <option class="select_arrow" id="id_compo" name="id_compo" value="<?php echo $datosComponente[2] ?>"><?php echo $datosComponente[3] ?></option>
        <option class="select_arrow" id="id_compo" name="id_compo" value="<?php echo $datosComponente[4] ?>"><?php echo $datosComponente[5] ?></option>
        <option class="select_arrow" id="id_compo" name="id_compo" value="<?php echo $datosComponente[6] ?>"><?php echo $datosComponente[7] ?></option>
        <option class="select_arrow" id="id_compo" name="id_compo" value="<?php echo $datosComponente[8] ?>"><?php echo $datosComponente[9] ?></option>
    </select>
    <input class="btn" type="submit" id="btncargadatos" name="btncargadatos" value="Cargar datos" >
    </form>
    <form action="php/Inspeccion_evaluacion.php"  method="post">
    <div class="container">
        <ul class="responsive-table">
          <li id="headertabla" name="headertabla" class="table-header">
          <div class="col col-2">Ejes</div>
          <div class="col col-2" >Evidencia Requerida</div>
          <div class="col col-3">Evidencia</div>
          <div class="col col-3">Resultado</div>
          <div class="col col-3">Comentario</div>
          </li>
          <?php  session_start();?>
          <input class="input" type="hidden" id="id_depto" name="id_depto" value="<?php echo   $id_depto?>" >
          <input class="input" type="hidden" id="nom_depto" name="nom_depto" value="<?php echo   $Nombre_depto?>" >
          <input class="input" type="hidden" id="id_componentecom" name="id_componentecom" value="<?php if(isset($_SESSION['id_componente'])){ echo $_SESSION['id_componente'];}else{ echo "";}?>" >
          <input class="input" type="hidden" id="id_eje1" name="id_eje1" value="<?php if(isset($_SESSION['eje1'])){ echo $_SESSION['eje1'];}else{ echo "";}?>" >
          <li class="table-row">
          <div class="col col-2" data-label="Eje:"><?php if(isset($_SESSION['CompromisoFinal1'])){ echo $_SESSION['CompromisoFinal1'];}?></div>
            <div class="col col-2"data-label="Evidencia Requerida:"><?php if(isset($_SESSION['CompromisoFinal2'])){ echo $_SESSION['CompromisoFinal2'];}?></div>
            <div class="col col-3"data-label="Evidencia:"><?php if(isset($_SESSION['CompromisoFinal3'])){ echo $_SESSION['CompromisoFinal3'];}?></div>
            <div class="col col-3"data-label="Resultado:"><?php if(isset($_SESSION['CompromisoFinal4'])){ echo $_SESSION['CompromisoFinal4'];}?></div>
            <div class="col col-3"data-label="Comentario:"><textarea id="comentario" name="comentario_eje1" placeholder="Compromisos y comentarios" height="50px"></textarea> </div>
          </li>
          <input class="input" type="hidden" id="id_eje2" name="id_eje2" value="<?php if(isset($_SESSION['eje2'])){ echo $_SESSION['eje2'];}else{ echo "";}?>" >
          <li class="table-row">
          <div class="col col-2"data-label="Eje:"><?php if(isset($_SESSION['EticaFinal1'])){ echo $_SESSION['EticaFinal1'];}?></div>
            <div class="col col-2"data-label="Evidencia Requerida:"><?php if(isset($_SESSION['EticaFinal2'])){ echo $_SESSION['EticaFinal2'];}?></div>
            <div class="col col-3"data-label="Evidencia:"><?php if(isset($_SESSION['EticaFinal3'])){ echo $_SESSION['EticaFinal3'];}?></div>
            <div class="col col-3"data-label="Resultado:"><?php if(isset($_SESSION['EticaFinal4'])){ echo $_SESSION['EticaFinal4'];}?></div>
            <div class="col col-3"data-label="Comentario:"><textarea id="comentario" name="comentario_eje2" placeholder="Compromisos y comentarios" height="50px"></textarea> </div>
          </li>
          <input class="input" type="hidden" id="id_eje3" name="id_eje3" value="<?php if(isset($_SESSION['eje3'])){ echo $_SESSION['eje3'];}else{ echo "";}?>" >
          <li class="table-row">
          <div class="col col-2"data-label="Eje:"><?php if(isset($_SESSION['PersonalFinal1'])){ echo $_SESSION['PersonalFinal1'];}?></div>
            <div class="col col-2"data-label="Evidencia Requerida:"><?php if(isset($_SESSION['PersonalFinal2'])){ echo $_SESSION['PersonalFinal2'];}?></div>
            <div class="col col-3"data-label="Evidencia:"><?php if(isset($_SESSION['PersonalFinal3'])){ echo $_SESSION['PersonalFinal3'];}?></div>
            <div class="col col-3"data-label="Resultado:"><?php if(isset($_SESSION['PersonalFinal4'])){ echo $_SESSION['PersonalFinal4'];}?></div>
            <div class="col col-3"data-label="Comentario:"><textarea id="comentario" name="comentario_eje3" placeholder="Compromisos y comentarios" height="50px"></textarea> </div>
          </li>
          <input class="input" type="hidden" id="id_eje4" name="id_eje4" value="<?php if(isset($_SESSION['eje4'])){ echo $_SESSION['eje4'];}else{ echo "";}?>" >
          <li class="table-row">
          <div class="col col-2"data-label="Eje:"><?php if(isset($_SESSION['EstructuraFinal1'])){ echo $_SESSION['EstructuraFinal1'];}?></div>
            <div class="col col-2"data-label="Evidencia Requerida:"><?php if(isset($_SESSION['EstructuraFinal2'])){ echo $_SESSION['EstructuraFinal2'];}?></div>
            <div class="col col-3"data-label="Evidencia:"><?php if(isset($_SESSION['EstructuraFinal3'])){ echo $_SESSION['EstructuraFinal3'];}?></div>
            <div class="col col-3"data-label="Resultado:"><?php if(isset($_SESSION['EstructuraFinal4'])){ echo $_SESSION['EstructuraFinal4'];}?></div>
            <div class="col col-3"data-label="Comentario:"><textarea id="comentario" name="comentario_eje4" placeholder="Compromisos y comentarios" height="50px"></textarea> </div>
          </li>
        </ul>
    
        <input class="input" type="submit" id="btn_input" name="btn_input" value="Guardar comentarios" >
      </div>
      </form>
     