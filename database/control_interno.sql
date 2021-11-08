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

CREATE PROCEDURE InsArea (IN nombre_area VARCHAR(50),IN siglas_area VARCHAR(10))

    BEGIN

         INSERT INTO areas_aplicacion(nombre_area_aplicacion,siglas_area_aplicacion)

         VALUES(nombre_area,siglas_area);

    END//

DELIMITER ;



DELIMITER //

CREATE PROCEDURE SelPermisosPorRol (IN idRolIN INT)

	BEGIN
       SELECT p.id_permiso,p.nombre_permiso FROM permisos p INNER JOIN permisos_rol pr ON p.id_permiso = pr.id_permiso
       INNER JOIN roles r ON pr.id_rol = r.id_rol WHERE r.id_rol = idRolIN;
	END//

DELIMITER ;




