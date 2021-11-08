<?php
include("includes/header.php");//includ de el header
?>
<script src="js/Registro.js"></script>
<link rel="stylesheet" href="css/Estiloregistro.css">
<?php session_start();?>

<p id="mensaje">
    <?php
    //imprimo el mensaje de usuario registrado
        echo $_SESSION['mensaje'];
        $_SESSION['mensaje']="";
    ?>
</p>

<section>
        <form method="POST" action="php/Programacion_registro.php">
        <input class="Entradas" type="text" id="nombre" name="nombre" placeholder="Nombre">
        <span class="error" id="error1">*El nombre es obligatorio.</span>
        <br>
        <br>
        <br>
        <input class="Entradas" type="text" id="apellido" name="apellido" placeholder="Apellido">
        <span class="error" id="error2">*El apellido es obligatorio.</span>
        <br>
        <br>
        <br>
        <input  class="Entradas" type="text" id="cedula" name="cedula" placeholder="Cedula">
        <span class="error" id="error3">*La cedula es obligatoria.</span>
        <br>
        <br>
        <br>
        <input  class="Entradas" type="text" id="correo" name="correo" placeholder="Correo Electrónico">
        <span class="error" id="error4">*El correo no es valido.</span>
        <br>
        <br>
        <br>
        <input  class="Entradas" type="text" id="telefono" name="telefono" placeholder="Teléfono">
        <span class="error" id="error5">*El teléfono no es valido.</span>
        <br>
        <br>
        <br>
        <input  class="Entradas" type="text" id="contra" name="contra" placeholder="Contraseña">
        <span class="error" id="error6">*La contraseña es obligatoria.</span>
        <br>
        <br>
        <br>
        <select id="departamentos" class="Entradas" name="departamentos">
            <option value="Departamento" disabled="true" selected="true">Departamento</option>
            <?php
            //se incluye el archivo con las funciones y se extraen los departamentos de la bd
            include("php/Funciones.php");
            $departamentos=Extraer_depto(); 
            foreach($departamentos as $opciones): ?>
            <option value="<?php echo $opciones['id_departamento']; ?>"><?php echo $opciones['siglas_departamento'];echo "-"; echo $opciones['nombre_departamento']; ?></option>
            <?php endforeach ?>
        </select>
        <span class="error" id="error7">*Selecciona un departamento.</span>
        <br>
        <br>
        <br>
        <input  class="Boton" type="submit" id="btnregistrar" name="btnregistrar" value="Registrar">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
        </form>
    </section>
    <footer>
        <div class="FooterNegro">
            <P>2021 Administración y programación de sitios web</P>
        </div>
    </footer>
