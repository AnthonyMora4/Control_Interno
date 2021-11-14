<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/estilo_crear_rol.css">

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/style.css">
<?php $idRol = $_GET['id_rol'];?>
<?php $nombreRol = $_GET['nombre_rol'];?>

<?php
include('database/db.php');
$stmt = $db_connection->prepare("CALL SelPermisosPorRol(?);");
$stmt->bind_param('i',$idRol);
$stmt->execute();
$getPermissions = $stmt->get_result();
$qtyResults = $getPermissions->num_rows;
$db_connection->close();

?>

<div class="titulo">
    <h1 class="m-0">Gestión de Permisos</h1>
</div>
<div>
    <h3 class="rol">Rol actual: <?php echo($nombreRol)?></h3>
</div>

<div class="container">
    <h2>Permisos del rol</h2>
    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1">Id permiso</div>
            <div class="col col-2">Nombre del permiso</div>   
        </li>
        <?php while ($row = mysqli_fetch_array($getPermissions)) { ?>
        <li class="table-row">
            <div class="col col-1"> <?php echo $row['id_permiso']?></div>
            <div class="col col-2"> <?php echo $row['nombre_permiso']?></div>
        </li>
        <?php }?>
</div>





<?php include("includes/footer.php") ?>