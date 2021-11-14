<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/estilo_i.css">
<link rel="stylesheet" href="css/estilo_crear_departamento.css">

<form action="">
    <div class="contenedor">
        <div class="areas">
            <label for="cars">Seleccione el area:</label>

            <select name="areas" id="area">
            <option value="" selected="seleccionar">Areas</option>
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
        <div class="contenedor2">
            <div class="nombre">
                <input class="Entradas" type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del Depto">
            </div>

            <div class="siglas">
                <input class="Entradas" type="text" id="siglas" name="siglas" placeholder="Ingrese las siglas del Depto">
            </div>
            <div class="crear">
                <input class="Boton" type="submit" id="btnregistrar" name="btnregistrar" value="Crear Depto">
            </div>
        </div>
    </div>
</form>


