<?php
include("includes/header.php");//includ de el header
?>
<link rel="stylesheet" href="css/EstiloPeriodos.css">
<link rel="stylesheet" href="css/tablacss/style.css">
<?php

if(isset($_GET['id_depto'])){
    $id_Departamento =$_GET['id_depto'];
    $Nom_Departamento =$_GET['depa'];
    $id_periodo =$_GET['Id_peri'];
    //extrae info para la tabla
    include("php/Conexion.php");//llamo la conexion
    $conex=conectar();//llama la funcion de conexion que conecta la base de datos
    $stmt = $conex->prepare("SELECT a.id_periodo,a.nombre_periodo,a.fecha_hora_inicio,a.fecha_hora_final,b.id_estado FROM periodos a  JOIN evaluacion_final b on a.id_periodo=b.id_periodo WHERE a.id_periodo=$id_periodo");
    $stmt->execute();
    $Info_tabla = $stmt->get_result();
    
}else{
    $id_Departamento =$_GET['id_depto'];
    $Nom_Departamento ="Error al cargar el departamento";
}
?>
<?php session_start();?>

<!-- Section-->
<section>
<div class="contenedor">
<h2>Dependencia seleccionada:<?php echo $Nom_Departamento?></h3>
<form action="php/Programacion_ModPeriodos.php" method="post">
<label class="lbl">Hora y fecha de inicio:</label>
<input class="calendar" type="datetime-local" id="Cal_inicio" name="Cal_inicio" min="2021-01-01" max="2100-12-31">
<label class="lbl">Hora y fecha de finalización:</label>
<input class="calendar" type="datetime-local" id="Cal_fin" name="Cal_fin" min="2021-01-01" max="2100-12-31">
<br>
<input class="input" type="hidden" id="id_Peri" name="id_Peri" value="<?php echo   $id_periodo?>" >
<input class="input" type="hidden" id="id_Depto" name="id_Depto" value="<?php echo   $id_Departamento?>" >
<input class="input" type="hidden" id="Nom_Depto" name="Nom_Depto" value=<?php echo  $_GET['depa']?> >
<input class="input" type="text" id="Nombre_periodo" name="Nombre_periodo" placeholder="Nombre de Periodo">
<br>
<br>
<?php if($_GET['activ']==1){ ?>
<div class="separar">
<label>Activo</label>
<label class="switch">
  <input type="checkbox" name="activo" id="activo" value="Activo" checked="checked" >
  <div class="slider round"></div>
</label>
</div>
<?php }else{ ?>
    <div class="separar">
<label>Activo</label>
<label class="switch">
  <input type="checkbox" name="activo" id="activo" value="Activo">
  <div class="slider round"></div>
</label>
</div>
<?php } ?>
<br>
<input class="btn" type="submit" id="btn_inicio_periodo" name="btn_inicio_periodo" value="Modificar periodo" >
</form>
<br>
<br>
<label class="mensaje"><?php
    //imprimo el mensaje de usuario registrado
        echo $_SESSION['mensaje'];
        $_SESSION['mensaje']="";
    ?></label>

<div class="container">
    <h2>Periodo Seleccionado:</h2>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Nombre de periodo</div>
        <div class="col col-2">Fecha de inicio</div>
        <div class="col col-3">Fecha de finalización</div>
        <div class="col col-3">Estado</div>
      </li>
      <?php while ($row = mysqli_fetch_array($Info_tabla)) { ?>
      <li class="table-row">
      <div class="col col-1"><?php echo $row['nombre_periodo']?> </div>
        <div class="col col-2"><?php echo $row['fecha_hora_inicio']?> </div>
        <div class="col col-3"><?php echo $row['fecha_hora_final']?> </div>
        <div class="col col-3"><?php 
        //pone activo si el id es 1 o si es 0 entonces es inactivo
        if($row['id_estado']==1){
          echo "Activo";
        }else{
          echo "Inactivo";
        }
        ?></div>
      </li>
      <?php }?>
    </ul>


  </div>
<br>
<br>
<br>
<br>


</div>
</section>
<footer>
        <div class="FooterNegro">
            <P>2021 Administración y programación de sitios web</P>
        </div>
</footer>