<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/estilo_h.css">
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<script src="js/app.js" defer></script>
</head>

<body>
	<?php session_start(); ?>


	<?php if (isset($_SESSION['id_rol']) && isset($_SESSION['id_rol']) == 1) { ?>
		<nav class="menu">
			<label class="logo">Control Interno</label>
			<ul class="menu_items">
				<li class="active"><a href="index.php"> Inicio</a></li>
				<li><a href="crear_rol.php">Roles</a>
				<ul class="submenu">
						<li><a href="asignar_rol.php">Asignar roles</a></li>
					</ul>
			</li>
				<li><a href="crear_area.php">Areas</a></li>
				<li><a href="crear_departamento.php">Departamentos</a></li>
				</li>
				<li><a href="crear_evaluacion.php">Gestión Evaluación</a>
					<ul class="submenu">
						<li><a href="crear_evaluacion.php">Crear evaluacion</a></li>
						<li><a href="responder_evaluacion_view.php">Responder evaluacion</a></li>
						<li><a href="#">Revisar evaluaciones</a></li>
						<li><a href="ver_resultados.php">Informe general</a></li>
						<li><a href="Departamentos.Inspeccion.view.php">Inspeccion de evaluacion</a></li>
					</ul>
				</li>
				<li><a href="Departamentos.view.php">Asignación Periodos</a></li>
				<li><a href="Iniciosesion.view.php">Iniciar Sesión</a>
					<ul class="submenu">
						<li><a href="bll/cerrar_session.php">Cerrar Sesión</a></li>
					</ul>
				</li>
				<li><a href="actualizar_usuario_view.php">Configuración</a></li>
			</ul>
			<span class="btn_menu">
				<i class="fas fa-bars"></i>
			</span>
		</nav>


		<?php }elseif (isset($_SESSION['id_rol']) && isset($_SESSION['id_rol']) == 2) { ?>
		<nav class="menu">
			<label class="logo">Control Interno</label>
			<ul class="menu_items">
				<li class="active"><a href="index.php"> Inicio</a></li>
				</li>
				<li><a href="#">Gestión Evaluación</a>
					<ul class="submenu">
						<li><a href="ver_resultados.php">Informe general</a></li>
						<li><a href="#">Inspeccion de evaluacion</a></li>
					</ul>
				</li>
				<li><a href="Iniciosesion.view.php">Iniciar Sesión</a>
					<ul class="submenu">
						<li><a href="bll/cerrar_session.php">Cerrar Sesión</a></li>
					</ul>
				</li>
				<li><a href="actualizar_usuario_view.php">Configuración</a></li>
			</ul>
			<span class="btn_menu">
				<i class="fas fa-bars"></i>
			</span>
		</nav>


		<?php }elseif (isset($_SESSION['id_rol']) && isset($_SESSION['id_rol']) == 3) { ?>
		<nav class="menu">
			<label class="logo">Control Interno</label>
			<ul class="menu_items">
				<li class="active"><a href="index.php"> Inicio</a></li>
				<li><a href="#">Gestión Evaluación</a>
					<ul class="submenu">
						<li><a href="crear_evaluacion.php">Crear evaluacion</a></li>
						<li><a href="#">Revisar evaluaciones</a></li>
					</ul>
				</li>
				<li><a href="Departamentos.view.php">Asignación Periodos</a></li>
				<li><a href="Iniciosesion.view.php">Iniciar Sesión</a>
					<ul class="submenu">
						<li><a href="bll/cerrar_session.php">Cerrar Sesión</a></li>
					</ul>
				</li>
				<li><a href="actualizar_usuario_view.php">Configuración</a></li>
			</ul>
			<span class="btn_menu">
				<i class="fas fa-bars"></i>
			</span>
		</nav>

		<?php }elseif (isset($_SESSION['id_rol']) && isset($_SESSION['id_rol']) == 4) { ?>
		<nav class="menu">
			<label class="logo">Control Interno</label>
			<ul class="menu_items">
				<li class="active"><a href="index.php"> Inicio</a></li>
				<li><a href="#">Evaluación</a>
					<ul class="submenu">
						<li><a href="responder_evaluacion_view.php">Responder evaluacion</a></li>
					</ul>
				</li>
				<li><a href="Iniciosesion.view.php">Iniciar Sesión</a>
					<ul class="submenu">
						<li><a href="bll/cerrar_session.php">Cerrar Sesión</a></li>
					</ul>
				</li>
				<li><a href="actualizar_usuario_view.php">Configuración</a></li>
			</ul>
			<span class="btn_menu">
				<i class="fas fa-bars"></i>
			</span>
		</nav>
	<?php } elseif (isset($_SESSION['id_rol']) && isset($_SESSION['id_rol']) == 5) { ?>

		<nav class="menu">
			<label class="logo">Control Interno</label>
			<ul class="menu_items">
				<li class="active"><a href="index.php"> Inicio</a></li>
				</li>
				</li>
				<li><a href="Iniciosesion.view.php">Iniciar Sesión</a>
					<ul class="submenu">
						<li><a href="bll/cerrar_session.php">Cerrar Sesión</a></li>
					</ul>
				</li>
				<li><a href="actualizar_usuario_view.php">Configuración</a></li>
			</ul>
			<span class="btn_menu">
				<i class="fas fa-bars"></i>
			</span>
		</nav>


	<?php } else { ?>

		<nav class="menu">
			<label class="logo">Control Interno</label>
			<ul class="menu_items">
				<li class="active"><a href="index.php"> Inicio</a></li>
				</li>
				</li>
				<li><a href="Iniciosesion.view.php">Iniciar Sesión</a>
					<ul class="submenu">
						<li><a href="Registro.view.php">Crear cuenta</a></li>
					</ul>
				</li>
			</ul>
			<span class="btn_menu">
				<i class="fas fa-bars"></i>
			</span>
		</nav>
	<?php } ?>