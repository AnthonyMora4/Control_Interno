<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_f.css">
<link rel="stylesheet" href="css/estilo_i.css">
<link rel="stylesheet" href="css/estilo_crear_departamento.css">

<form action="">
    <div class="contenedor">
        <div class="areas">
            <label for="cars">Seleccione el area:</label>
            <select name="areas" id="area">
                <option value="volvo">a</option>
                <option value="saab">b</option>
                <option value="mercedes">c</option>
                <option value="audi">d</option>
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




<?php include("includes/footer.php") ?>