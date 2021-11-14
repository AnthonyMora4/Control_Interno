<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/estilo_i.css">
<link rel="stylesheet" href="css/estilo_crear_area.css">


<form action="bll/crear_area.php" method="POST">
  <div class="contenedor">
    <div class="nombre">
      <input class="Entradas" type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del area">
    </div>

    <div class="siglas">
      <input class="Entradas" type="text" id="siglas" name="siglas" placeholder="Ingrese las siglas del area">
    </div>
    <div class="crear">
      <input class="Boton" type="submit" id="btnregistrar" name="btnregistrar" value="Crear area">
    </div>
  </div>
</form>

<div class="container">
    <h2>Areas_aplicacion</h2>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Nombre del area</div>
        <div class="col col-2">Acción</div>
      </li>
      <?php
        require ('database/db.php');
        $stmt = $db_connection->prepare("CALL SelAreas();");
        $stmt->execute();
        $getArea = $stmt->get_result();
        $qtyResults = $getArea->num_rows;
        $db_connection->close();
        while ($row = mysqli_fetch_array($getArea)) { ?>
        <li class="table-row">
        <div class="col col-1"> <?php echo $row['nombre_area_aplicacion']?> </div>
        <div class="col col-2"> <?php echo $row['siglas_area_aplicacion']?> </div>

      </li>
      <?php }?> 
    </ul>
  </div>





<?php include("includes/footer.php") ?>