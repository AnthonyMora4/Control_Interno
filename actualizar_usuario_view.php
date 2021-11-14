<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_modificar_usuario.css">

<section>
<form action="bll/actualizar_usuario.php" method="POST">

    <input type="text" name="txtCorreo" id="correoElectronico" class="Entradas" placeholder="Correo">
    <input type="text" name="txtNombre" id="Nombre" class="Entradas" placeholder="Nombre">
    <input type="text" name="txtApellido" id="Apellido" class="Entradas" placeholder="Apeliido">
    <input type="text" name="txtTelefono" id="Telefono" class="Entradas" placeholder="Telefono">
    <input type="text" name="txtPassword" id="Password" class="Entradas" placeholder="Password">
    <input type="submit" name="btnActualizar" id="Boton" class="Boton" value="Actualizar">

</form>

</section>

<footer>
    <div class="FooterNegro">
        <P>2021 Administración y programación de sitios web</P>
    </div>
</footer>