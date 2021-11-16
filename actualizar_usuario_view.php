<?php include("includes/header.php") ?>
<link rel="stylesheet" href="css/estilo_modificar_usuario.css">
<link rel="stylesheet" href="css/Estilo_menu_lateral.css">

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
<nav class="main-menu">
        <ul>
            <li>
                <a href="actualizar_usuario_view.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fa fa-user-circle fa-2x" class="icon icon-tabler icon-tabler-user" width="42" height="42" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                      </svg>
                    
                    <span class="nav-text">
                        Modificar Usuario
                    </span>
                </a>
              
            </li>
            <li class="has-subnav">
                <a href="SolicitarRol.view.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fa fa-laptop fa-2x" class="icon icon-tabler icon-tabler-user-check" width="42" height="42" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="9" cy="7" r="4" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 11l2 2l4 -4" />
                      </svg>
                   
                    <span class="nav-text">
                        Solicitar Rol
                    </span>
                </a>
                
            </li>
        </ul>
    </nav>

<footer>
    <div class="FooterNegro">
        <P>2021 Administración y programación de sitios web</P>
    </div>
</footer>