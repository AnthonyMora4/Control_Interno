
<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/estilo_i.css">
<link rel="stylesheet" href="css/estilo_crear_rol.css">


<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/style.css">

<?php

require('database/db.php');
$stmt = $db_connection->prepare("CALL SelRoles();");
$stmt->execute();
$getRol = $stmt->get_result();
$qtyResults = $getRol->num_rows;
$db_connection->close();
?>


<form action="bll/nuevo_rol.php" method="post">
  <div class="contenedor">
    <div class="nombre">
      <input class="Entradas" type="text" id="nombre_rol" name="nombre_rol" placeholder="Ingrese el nombre del rol">
    </div>
    <div class="crear">
      <input class="Boton" type="submit" id="btnregistrar" name="btnregistrar" value="Crear rol">
    </div>
  </div>
</form>


  <div class="container">
    <h2>Roles</h2>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Nombre del rol</div>
        <div class="col col-2">Acción</div>
      </li>
      <?php while ($row = mysqli_fetch_array($getRol)) { ?>
      <li class="table-row">
        <div class="col col-1"> <?php echo $row['nombre_rol']?> </div>
        <div class="col col-2">
          <a href="modificar_permisos.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <circle cx="10" cy="10" r="7" />
              <line x1="21" y1="21" x2="15" y2="15" />
            </svg></a>
        </div>
      </li>
      <?php }?>
    </ul>


  </div>

<?php include("includes/footer.php") ?>