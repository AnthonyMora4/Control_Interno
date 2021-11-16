<?php include('../database/db.php');?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<?php 
$usuario = $_POST['user'];
$rol = $_POST['rol'];


$stmt = $db_connection->prepare("CALL SelRolPorNombre(?);");
$stmt->bind_param('s', $rol);
$stmt->execute();
$getEje = $stmt->get_result();
$qtyResults = $getEje->num_rows;
while ($row = mysqli_fetch_array($getEje)) {
    $id_rol =$row['id_rol'];
}
$db_connection->close();

require('../database/db.php');
$stmt = $db_connection->prepare("CALL DelSolicitud(?);");
$stmt->bind_param('s', $usuario);
$stmt->execute();
$db_connection->close();

require('../database/db.php');
$stmt = $db_connection->prepare("CALL UpdRolUsuario(?,?);");
$stmt->bind_param('si', $usuario,$id_rol);
$stmt->execute();
$db_connection->close();
if ($stmt) {
    echo '<div class="alert alert-success">Rol actualizado correctamente, en 3 segundos será redireccionado</div>';
header("Refresh: 2; URL=http://localhost/Final/asignar_rol.php");
}
?>

