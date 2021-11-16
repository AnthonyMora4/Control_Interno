<?php include("includes/header.php") ?>

<link rel="stylesheet" href="css/tablacss/style.css">
<link rel="stylesheet" href="css/Estilo_menu_lateral.css">
<link rel="stylesheet" href="css/Estilo_SolicitarRol.css">
<?php session_start();?>
<?php
if(isset($_SESSION['id_rol'])){
    $id_rol=$_SESSION['id_rol'];
    $correo=$_SESSION['usuario'];
  }else{
      $id_rol="1";
      $correo="jackelg57@gmail.com";
  }
?>
<?php
 include('database/db.php');
$stmt = $db_connection->prepare("SELECT * FROM roles");
$stmt->execute();
$Roles = $stmt->get_result();
?>
<?php
$stmt = $db_connection->prepare("SELECT a.nombre_usuario,a.correo_usuario,b.id_rol,b.nombre_rol,c.id_departamento,c.nombre_departamento FROM usuarios a JOIN roles b on a.id_rol=b.id_rol JOIN departamentos c on c.id_departamento=a.id_departamento WHERE a.correo_usuario='$correo'");
$stmt->execute();
$InfoUser = $stmt->get_result();

?>
<label class="mensaje"><?php
    //imprimo el mensaje de usuario registrado
        if(isset($_SESSION['mensaje'])){
          echo $_SESSION['mensaje'];
          $_SESSION['mensaje']="";
        }
    ?></label>
<section>

<div class="containerr">
    <h2>Tu información</h2>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Nombre</div>
        <div class="col col-2">Correo</div>
        <div class="col col-3">Rol Actual</div>
        <div class="col col-3">Departamentos</div>
      </li>
      <?php while ($row = mysqli_fetch_array($InfoUser)) { ?>
        <?php 
            $id_depto= $row['id_departamento'];
            $id_rol_Actual=$row['id_rol'];
            ?>
      <li class="table-row">
      <div class="col col-1"><?php echo $row['nombre_usuario']?> </div>
        <div class="col col-2"><?php echo $row['correo_usuario']?> </div>
        <div class="col col-3"><?php echo $row['nombre_rol']?> </div>
        <div class="col col-3"><?php echo $row['nombre_departamento']?> </div>
      </li>
      <?php }?>
    </ul>
  </div>

<form action="php/SolicitarRol.php" method="POST">
<input type="hidden" id="correos" name="correos" value="<?php echo $correo?>">
<input type="hidden" id="idRolActual" name="idRolActual" value="<?php echo $id_rol_Actual?>">
<input type="hidden" id="iddepto" name="iddepto" value="<?php echo $id_depto?>">
    <div class="centrar">
    <h2>Roles:</h2>
    <select class="select" name="select">
    <?php while ($row = mysqli_fetch_array($Roles)) { ?>
    <option class="select_arrow" value="<?php echo $row['id_rol'] ?>"><?php echo $row['nombre_rol']?></option>
    <?php }?>
    </select>
    </div>
    <input type="submit" name="btnActualizar" id="Boton" class="Boton" value="Solicitar Rol">

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