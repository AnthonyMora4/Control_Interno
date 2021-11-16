<?php
 include('../database/db.php');
if(isset($_POST['id_eje1'])){
    $id_eje1=$_POST['id_eje1'];
    $id_eje2=$_POST['id_eje2'];
    $id_eje3=$_POST['id_eje3'];
    $id_eje4=$_POST['id_eje4'];
    $id_componente=$_POST['id_componentecom'];
    $id_depto=$_POST['id_depto'];
$depa=$_POST['nom_depto'];

if(isset($_POST['comentario_eje1']) && $_POST['comentario_eje1']!=""){
    $comentario1=$_POST['comentario_eje1'];
    $consulta="INSERT INTO comentarios_evaluaciones (`id_comentario`, `id_eje`, `id_componente`, `comentario`) VALUES (NULL, '$id_eje1', '$id_componente', '$comentario1')";
    $resultado=mysqli_query($db_connection,$consulta);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
}
if(isset($_POST['comentario_eje2']) && $_POST['comentario_eje2']!=""){
    $comentario2=$_POST['comentario_eje2'];
    $consulta="INSERT INTO comentarios_evaluaciones (`id_comentario`, `id_eje`, `id_componente`, `comentario`) VALUES (NULL, '$id_eje1', '$id_componente', '$comentario2')";
    $resultado=mysqli_query($db_connection,$consulta);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
}
if(isset($_POST['comentario_eje3']) && $_POST['comentario_eje3']!=""){
    $comentario3=$_POST['comentario_eje3'];
    $consulta="INSERT INTO comentarios_evaluaciones (`id_comentario`, `id_eje`, `id_componente`, `comentario`) VALUES (NULL, '$id_eje1', '$id_componente', '$comentario3')";
    $resultado=mysqli_query($db_connection,$consulta);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
}
if(isset($_POST['comentario_eje4']) && $_POST['comentario_eje4']!=""){
    $comentario4=$_POST['comentario_eje4'];
    $consulta="INSERT INTO comentarios_evaluaciones (`id_comentario`, `id_eje`, `id_componente`, `comentario`) VALUES (NULL, '$id_eje1', '$id_componente', '$comentario4')";
    $resultado=mysqli_query($db_connection,$consulta);//al ser un select guarda un 1 o mas si no hay errores y un 0 si los hay
}
echo '<div class="alert alert-danger"><h3>Comentario ingresado, en 3 segundos será redireccionado</h3></div>';
    header("Refresh: 2; URL=http://localhost/GitProyectoASPW/Control_Interno/Inspeccion_evaluacion.view.php?id_depto=$id_depto&depa=$depa");  
}else{
    echo '<div class="alert alert-danger"><h3>Error al insertar los datos los datos, en 3 segundos será redireccionado</h3></div>';
    header("Refresh: 2; URL=http://localhost/GitProyectoASPW/Control_Interno/Inspeccion_evaluacion.view.php?id_depto=$id_depto&depa=$depa");  
}






?>