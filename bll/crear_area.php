<?php include('../database/db.php');?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
$resultado = false;
$nombreArea = $_POST['nombre'];
$siglas = $_POST["siglas"];
$stmt = $db_connection->prepare("CALL SelAreas();");
$stmt->execute();
$getArea = $stmt->get_result();
$qtyResults = $getArea->num_rows;
$db_connection->close();
while ($row = mysqli_fetch_array($getArea)) {
 if($row['nombre_area_aplicacion']==$nombreArea){
    $resultado = true;
 }
}?>


<?php
if($resultado){
    echo '<div class="alert alert-danger">Ha ocurrido un problema al momento de crear el area, 3 segundos será redireccionado</div>';
    header("Refresh: 2; URL=http://localhost/ProyectoAPSW/Control_interno/crear_area.php");
}else{
include('../database/db.php');
$stmt = $db_connection->prepare("CALL InsArea(?,?);");
$stmt->bind_param('ss',$nombreArea,$siglas);
$stmt->execute();
$db_connection->close();
echo '<div class="alert alert-success">Rol creado correctamente, en 3 segundos será redireccionado</div>';
header("Refresh: 2; URL=http://localhost/Proyecto/crear_rol.php");
}
$stmt->close();
?>