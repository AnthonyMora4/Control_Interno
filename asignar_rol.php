<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/estilo_select.css">
<link rel="stylesheet" href="css/estilo_asignar_rol.css">
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/style.css">


<?php //SelRolPorID
require('database/db.php');
$stmt = $db_connection->prepare("SELECT id_departamento,nombre_departamento FROM departamentos;");
$stmt->execute();
$getDepartamento = $stmt->get_result();
$qtyResults = $getDepartamento->num_rows;
$db_connection->close();
?>
<?php
if (isset($_GET['idDepto'])) {
    $id_departamento = $_GET['idDepto'];
    require('database/db.php');
    $stmt = $db_connection->prepare("SELECT a.nombre_usuario,a.apellidos_usuario,a.correo_usuario,b.nombre_rol,c.nombre_departamento FROM usuarios a INNER JOIN roles b ON b.id_rol = a.id_rol INNER JOIN departamentos c ON a.id_departamento = c.id_departamento WHERE a.id_departamento = idDepto;");
    $stmt->bind_param('i', $id_departamento);
    $stmt->execute();
    $departamentos = $stmt->get_result();
    $qtyResults = $departamentos->num_rows;
    $db_connection->close();
}
?>
<?php 
require('database/db.php');
$stmt = $db_connection->prepare(" SELECT solicitudes_rol, correo_usuario, id_rol_actual, id_rol_solicitado, id_departamento FROM solicitudes_rol;");
$stmt->execute();
$solicitudes = $stmt->get_result();
$qtyResults = $solicitudes->num_rows;
$db_connection->close();
?>
 

<div class="contenedor">
<div class="container">
<h2>Solicitudes de cambio de rol</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Usuario</div>
      <div class="col col-2">Rol</div>
      <div class="col col-3">Rol solicitado</div>
      <div class="col col-4">Departamento</div>
    </li>
    <?php while ($row = mysqli_fetch_array($solicitudes)) { ?>
    <li class="table-row">
        <div class="col col-1" data-label="Usuario"><?php echo($row['correo_usuario']);?></div>
        <?php require('database/db.php');
            $variable=$row['id_rol_actual'];
            $stmt = $db_connection->prepare("SELECT id_rol,nombre_rol FROM roles WHERE id_rol =  $variable;");
            $stmt->execute();
            $rol = $stmt->get_result();
            $qtyResults = $rol->num_rows;
            while ($row2 = mysqli_fetch_array($rol)) {
                $idRolActual =$row2['nombre_rol'];
            }
            $db_connection->close();?>
        <div class="col col-2" data-label="Rol"><?php echo $idRolActual?></div>
        <?php require('database/db.php');
         $rolasosiado=$row['id_rol_solicitado'];
            $stmt = $db_connection->prepare("SELECT id_rol,nombre_rol FROM roles WHERE id_rol = $rolasosiado;");
            $stmt->execute();
            $rol2 = $stmt->get_result();
            $qtyResults = $rol2->num_rows;
            while ($row3 = mysqli_fetch_array($rol2)) {
                $idRolsolicitado =$row3['nombre_rol'];
            }
            $db_connection->close();?>
        <div class="col col-3" data-label="Rol solicitado"><?php echo $idRolsolicitado?></div>
        <?php require('database/db.php');
            $stmt = $db_connection->prepare("CALL SelDeprtamentoPorId(?);");
            $stmt->bind_param('i', $row['id_departamento']);
            $stmt->execute();
            $dep = $stmt->get_result();
            $qtyResults = $dep->num_rows;
            while ($row4 = mysqli_fetch_array($dep)) {
                $nombre_departamento =$row4['nombre_departamento'];
            }
            $db_connection->close();?>
        <div class="col col-4" data-label="Departamento"><?php echo $nombre_departamento?></div>
      </li>
      <?php }?>
  </ul>
  </div>
    <div class="select">
        <div class="areas">
            <div class="areas">
                <label for="cars">Filtrar usuarios por departamento:</label>

                <select name="select1" onchange="javascript:location.href = this.value;">
                    <option selected="true" disabled="true" value=""></option>
                    <?php while ($row = mysqli_fetch_array($getDepartamento)) { ?>
                        <option value="asignar_rol.php?idDepto=<?php echo $row['id_departamento'] ?>"><?php echo $row['nombre_departamento'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Personal</h2>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Nombre</div>
                <div class="col col-2">Correo</div>
                <div class="col col-3">Rol</div>
                <div class="col col-4">Departamento</div>
                <div class="col col-5">Modificar rol</div>
            </li>
            <?php if (isset($_GET['idDepto'])) {
                while ($row = mysqli_fetch_array($departamentos)) { ?>
                    <li class="table-row">
                        <div class="col col-1" data-label="Nombre"><?php echo $row['nombre_usuario']," ",$row['apellidos_usuario'] ?></div>
                        <div class="col col-2" data-label="Correo"><?php echo $row['correo_usuario'] ?></div>
                        <div class="col col-3" data-label="Rol"><?php echo $row['nombre_rol'] ?></div>
                        <div class="col col-4" data-label="Departamento"><?php echo $row['nombre_departamento'] ?></div>
                        <div class="col col-5" data-label="Modificar rol"> <a href="cambio_rol.php?usuario=<?php echo($row['correo_usuario'])?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                            </svg>
                            </a>
                        </div>
                    </li>
            <?php }
            } ?>
        </ul>
    </div>

    <?php include("includes/footer.php") ?>