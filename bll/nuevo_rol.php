<?php include('../database/db.php');?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
$resultado = false;
$RolName = $_POST['nombre_rol'];
$stmt = $db_connection->prepare("CALL SelRoles();");
$stmt->execute();
$getRol = $stmt->get_result();
$qtyResults = $getRol->num_rows;

while ($row = mysqli_fetch_array($getRol)) {
 if($row['nombre_rol']==$RolName){
    $resultado = true;
 }
}?>

<?php
if($resultado){
    echo '<div class="alert alert-danger">Ha ocurrido un problema al momento de crear el rol, 3 segundos será redireccionado</div>';
    header("Refresh: 2; URL=http://localhost/Proyecto/crear_rol.php");
}else{
$stmt = $db_connection->prepare("CALL InsRol(?);");
$stmt->bind_param('s',$RolName);
$stmt->execute();
$db_connection->close();
echo '<div class="alert alert-success">Rol creado correctamente, en 3 segundos será redireccionado</div>';
header("Refresh: 2; URL=http://localhost/Proyecto/crear_rol.php");
}
$stmt->close();
?>