<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/estilo_i.css">
<link rel="stylesheet" href="css/estilo_crear_departamento.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/estilo_select.css">
<link rel="stylesheet" href="css/estilo_boton.css">
<div class="titulo">
    <h1 class="m-0">Gestión de Departamentos</h1>
</div>
<style>
  .titulo{
    font-size: 25px;
    padding:15px 15px;
}
</style>
<form action="bll/crear_departamento.php" method="POST">
    <div class="contenedor">
      <div class="select">
        <div class="areas">
            <label for="cars">Seleccione el area:</label>

            <select name="areas" id="area">
           <option selected disabled value=""></option>
            <?php

                # Carga el select de html

                require ('database/db.php');
                $stmt = $db_connection->prepare("CALL SelAreas();");
                $stmt->execute();
                $getArea = $stmt->get_result();
                $qtyResults = $getArea->num_rows;
                $db_connection->close();
                while ($row = mysqli_fetch_array($getArea)) { ?>
                <option value="volvo"><?php echo $row['nombre_area_aplicacion'] ?></option>  
              <?php }?> 
         
                ?>
                </select>


        </div>
        </div>
        <div class="contenedor2">
            <div class="nombre">
                <input class="Entradas" type="text" id="nombre" name="txtNombre" placeholder="Ingrese el nombre del Depto">
            </div>

            <div class="siglas">
                <input class="Entradas" type="text" id="siglas" name="txtSiglas" placeholder="Ingrese las siglas del Depto">
            </div>
            <div class="crear">
            <style>
        .a{
            background: white;
            border: none;
        }
    </style>
    <div class="btn">
        <input type="submit" value="Crear" class="a">
      <div class="dot"></div>
    </div>
            </div>
        </div>
    </div>
</form>


<div class="container">
    <h2>Departamentos</h2>
    <ul class="responsive-table">
      <li class="table-header">
      <div class="col col-1">Id Departamento</div>
        <div class="col col-1">Nombre departamento</div>
      </li>
      <?php
        require ('database/db.php');
        $stmt = $db_connection->prepare("CALL SelDepartamentos();");
        $stmt->execute();
        $getDep = $stmt->get_result();
        $qtyResults = $getDep->num_rows;
        $db_connection->close();
        while ($row = mysqli_fetch_array($getDep)) { ?>
        <li class="table-row">
        <div class="col col-1" data-label="Id Departamento"> <?php echo $row['id_departamento']?> </div>
        <div class="col col-1" data-label="Nombre departamento"> <?php echo $row['nombre_departamento']?> </div> 
      </li>
      <?php }?> 
    </ul>
  </div>


