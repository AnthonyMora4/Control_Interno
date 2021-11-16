<?php
include("includes/header.php");//includ de el header
?>
<?php include('database/db.php');?>
<link rel="stylesheet" href="css/EstiloPeriodos.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/estilo_boton.css">
<?php
//extraen los valores de los inputs
if(isset($_GET['depa'])){
    $id_Departamento =$_GET['id_depto'];
    $Nom_Departamento =$_GET['depa'];
    //extrae info para la tabla
    $stmt = $db_connection->prepare("SELECT a.id_periodo,a.nombre_periodo,a.fecha_hora_inicio,a.fecha_hora_final,b.id_estado FROM periodos a  JOIN evaluacion_final b on a.id_periodo=b.id_periodo WHERE a.id_departamento=$id_Departamento ORDER BY
    a.id_periodo DESC");
    $stmt->execute();
    $Info_tabla = $stmt->get_result();
}else{
    $id_Departamento =$_GET['id_depto'];
    $Nom_Departamento ="Error al cargar el Departamento";
}
?>
<?php session_start();?>

<!-- Section-->
<section>
<div class="contenedor">
<h2>Dependencia seleccionada:<?php echo $Nom_Departamento?></h3>
<form action="php/Programacion_Periodos.php" method="post">
<label class="lbl">Hora y fecha de inicio:</label>
<input class="calendar" type="datetime-local" id="Cal_inicio" name="Cal_inicio" min="2021-01-01" max="2100-12-31">
<label class="lbl">Hora y fecha de finalización:</label>
<input class="calendar" type="datetime-local" id="Cal_fin" name="Cal_fin" min="2021-01-01" max="2100-12-31">
<br>
<input class="input" type="hidden" id="id_Depto" name="id_Depto" value="<?php echo   $id_Departamento?>" >
<input class="input" type="hidden" id="Nom_Depto" name="Nom_Depto" value=<?php echo  $_GET['depa']?> >
<input class="input" type="text" id="Nombre_periodo" name="Nombre_periodo" placeholder="Nombre de Periodo">
<br>
<br>
<div class="separar">
<label>Activo</label>
<label class="switch">
  <input type="checkbox" name="activo" id="activo" value="Activo">
  <div class="slider round"></div>
</label>
</div>
<br>
<style>
        .a{
            background: white;
            border: none;
        }
        .btn{
          margin-left: 20px;
        }
    </style>
    <div class="btn">
        <input type="submit" value="Iniciar periodo" class="a">
      <div class="dot"></div>
    </div>
</form>
<br>
<br>
<label class="mensaje"><?php
    //imprimo el mensaje de usuario registrado
        if(isset($_SESSION['mensaje'])){
          echo $_SESSION['mensaje'];
          $_SESSION['mensaje']="";
        }
    ?></label>

<div class="container">
    <h2>Periodos</h2>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Nombre de periodo</div>
        <div class="col col-2">Fecha de inicio</div>
        <div class="col col-3">Fecha de finalización</div>
        <div class="col col-3">Estado</div>
        <div class="col col-3">Modificar</div>
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
        <div class="col col-3">
          <a href="Modificar_periodos.view.php?depa=<?php echo $_GET['depa']?>&id_depto=<?php echo $_GET['id_depto']?>&Id_peri=<?php echo $row['id_periodo']?>&activ=<?php echo $row['id_estado']?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
            <line x1="16" y1="5" x2="19" y2="8" />
            </svg></a>
        </div>
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