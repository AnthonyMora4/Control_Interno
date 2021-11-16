<?php
 include('../database/db.php');

 $correo = $_POST['correos'];
 $idRolActual = $_POST['idRolActual'];
 $idDepto = $_POST['iddepto'];
 $idRolSoli = $_POST['select'];

 if(isset($idRolSoli)){
    $stmt = $db_connection->prepare("INSERT INTO solicitudes_rol VALUES (NULL,'$correo', $idRolActual, $idRolSoli,$idDepto)");
    $stmt->execute();
    echo '<div class="alert alert-success"><h3>Solicitud realizada, en 3 segundos será redireccionado</h3></div>';
    header("Refresh: 2; URL=http://localhost/GitProyectoASPW/Control_Interno/SolicitarRol.view.php");  
 }else{
    echo '<div class="alert alert-danger"><h3>Error,Seleccione el rol a solicitar, 3 segundos será redireccionado</h3></div>';
    header("Refresh: 2; URL=http://localhost/GitProyectoASPW/Control_Interno/SolicitarRol.view.php");
 }
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">