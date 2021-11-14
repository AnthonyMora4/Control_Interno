create DATABASE control_interno;
USE control_interno

CREATE TABLE areas_aplicacion(
    id_area_aplicacion int  AUTO_INCREMENT PRIMARY KEY,
    nombre_area_aplicacion  varchar(50),
    siglas_area_aplicacion varchar(10)
);


CREATE TABLE departamentos(
    id_departamento int AUTO_INCREMENT PRIMARY KEY,
    nombre_departamento  varchar(50),
    siglas_departamento varchar(10),
    id_area_aplicacion int,
    FOREIGN KEY (id_area_aplicacion) REFERENCES areas_aplicacion (id_area_aplicacion)
);

CREATE TABLE roles(
    id_rol int AUTO_INCREMENT PRIMARY KEY,
    nombre_rol varchar(30)
);
CREATE TABLE permisos(
    id_permiso int AUTO_INCREMENT PRIMARY KEY,
    nombre_permiso varchar(70)
);

CREATE TABLE permisos_rol(
    id_permiso_rol int AUTO_INCREMENT PRIMARY KEY,
    id_rol int,
    id_permiso int,
    FOREIGN KEY (id_rol) REFERENCES roles (id_rol),
    FOREIGN KEY (id_permiso) REFERENCES permisos (id_permiso)
);



CREATE TABLE usuarios(
    nombre_usuario varchar(20),
    apellidos_usuario varchar(50),
    cedula_usuario varchar(10),
    telefono_usuario int,
    correo_usuario varchar(100) PRIMARY KEY,
    contrasena varchar(30),
    id_rol int,
    id_departamento int,
    FOREIGN KEY (id_rol) REFERENCES roles (id_rol),
    FOREIGN KEY (id_departamento) REFERENCES departamentos (id_departamento)
);

CREATE TABLE componentes(
    id_componente int AUTO_INCREMENT PRIMARY KEY,
    nombre_componente varchar(30)
);
CREATE TABLE ejes(
    id_eje int AUTO_INCREMENT PRIMARY KEY,
    nombre_eje varchar(30),
    id_componente int,
    FOREIGN KEY (id_componente)REFERENCES roles (id_componente)
);

CREATE TABLE evaluaciones(
    id_evaluacion int AUTO_INCREMENT PRIMARY KEY,
    criterios varchar(300),
    evidencia_requerida varchar(300),
    estado_evidencia int,
    opcion varchar(2),
    id_eje int,
    id_departamento int,

    FOREIGN KEY (id_opcion)REFERENCES opciones (id_opcion),
    FOREIGN KEY (id_eje)REFERENCES ejes (id_eje),
    FOREIGN KEY (id_departamento)REFERENCES departamentos (id_departamento) 
);

CREATE TABLE opciones(
    id_opcion int AUTO_INCREMENT PRIMARY KEY,
    nombre_opcion
);

CREATE TABLE periodos(
    id_periodo int AUTO_INCREMENT PRIMARY KEY,
    nombre_periodo criterios varchar(50),
    fecha_hora_inicio datetime,
    fecha_hora_final datetime,
    id_departamento int,
    FOREIGN KEY (id_departamento)REFERENCES departamentos (id_departamento) 
);

CREATE evaluacion_final(
    id_evaluacion_final int AUTO_INCREMENT PRIMARY KEY,
    id_evaluacion int,
    id_periodo int,
    id_estado int,
    FOREIGN KEY (id_evaluacion)REFERENCES evaluaciones (id_evaluacion),
    FOREIGN KEY (id_periodo)REFERENCES periodos (id_periodo) 
);

/*Procedimientos almacenados*/

DELIMITER //

CREATE PROCEDURE SelRoles ()
	BEGIN
         SELECT id_rol,nombre_rol FROM roles;
	END//

DELIMITER ;




DELIMITER //

CREATE PROCEDURE InsRol (IN rol VARCHAR(30))
	BEGIN
         INSERT INTO roles(nombre_rol)
         VALUES(rol);
	END//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE SelAreas ()
	BEGIN
         SELECT nombre_area_aplicacion,siglas_area_aplicacion FROM areas_aplicacion;
	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SelDepartamentos()
	BEGIN
         SELECT id_departamento,nombre_departamento FROM departamentos;
	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SelOpciones()
	BEGIN
         SELECT id_opcion,nombre_opcion FROM opciones;
	END//

DELIMITER ;



DELIMITER //

CREATE PROCEDURE SelEjes()
	BEGIN
         SELECT id_eje,nombre_eje FROM ejes;
	END//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE SelComponentes()
	BEGIN
         SELECT id_componente,nombre_componente FROM componentes;
	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SelEjePorNombre(IN nombre varchar(50))
	BEGIN
         SELECT id_eje FROM ejes WHERE nombre_eje = nombre;
	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SelDeptoPorNombre(IN nombre varchar(50))
	BEGIN
         SELECT id_departamento FROM  departamentos WHERE nombre_departamento = nombre;
	END//

DELIMITER ;




DELIMITER //

CREATE PROCEDURE InsArea (IN nombre_area VARCHAR(50),IN siglas_area VARCHAR(10))

    BEGIN

         INSERT INTO areas_aplicacion(nombre_area_aplicacion,siglas_area_aplicacion)

         VALUES(nombre_area,siglas_area);

    END//

DELIMITER ;

DELIMITER //
///////////////////////////////////////////////////////////////////////////////////
CREATE PROCEDURE InsEvaluacionP (IN criterio VARCHAR(300),IN estado int, IN evidencia_re VARCHAR(300),IN idepto int, IN ideje int, IN opc varchar(2))

    BEGIN

         INSERT INTO evaluaciones(criterios,evidencia_requerida,estado_evidencia,opcion,id_eje,id_departamento)

         VALUES(criterio,evidencia_re,estado,opc,ideje,idepto);

    END//

DELIMITER ;



DELIMITER //

CREATE PROCEDURE SelPermisosPorRol (IN idRolIN INT)

	BEGIN
       SELECT p.id_permiso,p.nombre_permiso FROM permisos p INNER JOIN permisos_rol pr ON p.id_permiso = pr.id_permiso
       INNER JOIN roles r ON pr.id_rol = r.id_rol WHERE r.id_rol = idRolIN;
	END//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE SelEjesPorComponente (IN idComponente INT)

	BEGIN
       SELECT id_eje,nombre_eje FROM ejes WHERE id_componente = idComponente;
	END//

DELIMITER ;







