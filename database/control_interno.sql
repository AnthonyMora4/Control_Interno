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
    nombre_componente varchar(70)
);
CREATE TABLE ejes(
    id_eje int AUTO_INCREMENT PRIMARY KEY,
    nombre_eje varchar(80),
    id_componente int,
    FOREIGN KEY (id_componente)REFERENCES ejes (id_componente)
);

CREATE TABLE evaluaciones(
    id_evaluacion int AUTO_INCREMENT PRIMARY KEY,
    criterios varchar(300),
    evidencia_requerida varchar(300),
    estado_evidencia int,
    opcion varchar(2),
    id_eje int,
    id_departamento int,
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

CREATE TABLE solicitudes_rol(
solicitudes_rol int AUTO_INCREMENT PRIMARY KEY,
correo_usuario varchar(100),
id_rol_actual int,
id_rol_solicitado int,
id_departamento int,
FOREIGN KEY (correo_usuario) REFERENCES usuarios (correo_usuario),
FOREIGN KEY (id_departamento) REFERENCES departamentos (id_departamento)
);


CREATE TABLE EvaluacionRespondida(
    id_evaluacion int AUTO_INCREMENT PRIMARY Key,
    estado_evidencia int,
    evidencia VARCHAR(100),
    id_eje int,
    opcion varchar(12),
    puntuaje int,
    encargado_correo VARCHAR(150)
);


CREATE TABLE Comentarios_evaluaciones(
id_comentario int AUTO_INCREMENT PRIMARY KEY,
id_eje int,
id_componente int,
comentario varchar(500),
FOREIGN KEY (id_eje) REFERENCES ejes (id_eje),
FOREIGN KEY (id_componente) REFERENCES componentes (id_componente)
);

DELIMITER //

CREATE PROCEDURE InsDep (IN nombre_departamento VARCHAR(50),IN siglas_dep VARCHAR(10))

    BEGIN

         INSERT INTO departamentos(nombre_departamento,siglas_departamento)
         VALUES(nombre_departamento,siglas_dep);

    END//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE RegistrarRespuestaEvidencia(IN estado_evidencia INT,IN evidencia VARCHAR(100),IN id_eje INT,
IN  opcion VARCHAR(12),IN puntuaje int , IN encargado_correo VARCHAR(150))
BEGIN

    INSERT INTO EvaluacionRespondida(estado_evidencia,evidencia,id_eje,opcion,puntuaje,encargado_correo)
    VALUES(estado_evidencia,evidencia,id_eje,opcion,puntuaje,encargado_correo);
END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SelobtenerPreguntas (IN id INT)

	BEGIN
       SELECT criterios,estado_evidencia,evidencia_requerida,
        id_eje,opcion FROM evaluaciones WHERE id_departamento = id;
	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SelidDeparamentoPorUsuario (IN correo VARCHAR(100))

	BEGIN
       SELECT id_departamento FROM usuarios WHERE correo_usuario = correo;
	END//

DELIMITER ;

/*Procedimientos almacenados*/

DELIMITER //

CREATE PROCEDURE SelRoles ()
	BEGIN
         SELECT id_rol,nombre_rol FROM roles;
	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SelRolPorID (IN idrol INT)
	BEGIN
         SELECT id_rol,nombre_rol FROM roles WHERE id_rol = idrol;
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

CREATE PROCEDURE SelRolPorNombre(IN rol varchar(30))
	BEGIN
         SELECT id_rol FROM  roles WHERE nombre_rol= rol;
	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE DelSolicitud(IN usuario varchar(100))
	BEGIN
         Delete  FROM  solicitudes_rol WHERE correo_usuario= usuario;
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


DELIMITER //

CREATE PROCEDURE SelCountEjes (IN idEje INT, IN idDepto INT)

	BEGIN
       SELECT COUNT(*) AS 'conteo' FROM evaluaciones WHERE id_eje = idEje and id_departamento = idDepto;
	END//

DELIMITER ;
USE control_interno;
SELECT id_eje FROM ejes WHERE id_eje <> 5

DELIMITER //

CREATE PROCEDURE SelEjesDiferenteUno (IN idEje INT, IN idCompo INT)

	BEGIN
       SELECT nombre_eje FROM ejes WHERE id_componente = idCompo AND id_eje <> idEje;
	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SelComponentePorId (IN idCompo INT)

	BEGIN
       SELECT nombre_componente FROM componentes WHERE id_componente = idCompo;
	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SelUsuariosPorDepartamento (IN idDepto INT)

	BEGIN
       SELECT a.nombre_usuario,a.apellidos_usuario,a.correo_usuario,b.nombre_rol,c.nombre_departamento FROM usuarios a INNER JOIN roles b ON b.id_rol = a.id_rol INNER JOIN departamentos c ON a.id_departamento = c.id_departamento WHERE a.id_departamento = idDepto;
	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE genSelAreasByRol (IN idRolIN INT)
      SELECT c.idCuentaPresupuestaria,c.nombreCuenta,u.idUEjecutora,u.nombreUEjecutora,m.idMeta,m.nombre FROM cuentapresupuestaria c INNER JOIN uejecutora u ON c.idUEjecutora = u.idUEjecutora INNER JOIN metas m  ON m.idMeta = c.idMeta WHERE u.idUEjecutora = idUEjecutoraIN;
	BEGIN
       SELECT a.idArea,a.areaDescripcion From area a INNER JOIN areasxrol ar ON a.idArea = ar.idArea INNER JOIN roles r ON r.idRol = ar.idRol WHERE r.idRol = idRolIN;
	END//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE genSelSolicitudesRol ()

    BEGIN
      SELECT solicitudes_rol, correo_usuario, id_rol_actual, id_rol_solicitado, id_departamento FROM solicitudes_rol;

	END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE SelDeprtamentoPorId (IN idDepto INT)

	BEGIN
       SELECT nombre_departamento FROM departamentos WHERE id_departamento = idDepto;
	END//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE UpdRolUsuario (IN idusuario VARCHAR(100),IN idrol int)

	BEGIN
       UPDATE usuarios  SET id_rol= idrol WHERE correo_usuario = idusuario;
	END//

DELIMITER ;



USE control_interno;

INSERT INTO componentes (nombre_componente) VALUES ('Ambiente de control');
INSERT INTO componentes (nombre_componente) VALUES ('Valoracion del riesgo');
INSERT INTO componentes (nombre_componente) VALUES ('Actividades de control');
INSERT INTO componentes (nombre_componente) VALUES ('Sistemas de informacion');
INSERT INTO componentes (nombre_componente) VALUES ('Seguimiento del SCI');


USE control_interno;

INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Compromiso', 1);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Etica', 1);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Personal', 1);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Estructura', 1);

INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Marco orientador', 2);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Herramienta para la administracion de la informacion', 2);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Funcionamiento del SEVRI', 2);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Documentacion y comunicacion', 2);

INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Caracteristicas', 3);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Alcance', 3);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Formalidad', 3);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Aplicacion', 3);

INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Alcance de los sistemas de informacion', 4);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Calidad de la informacion', 4);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Calidad de la comunicacion', 4);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Control de los sistemas de informacion', 4);

INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Participantes', 5);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Formalidad', 5);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Alcance', 5);
INSERT INTO ejes (nombre_eje, id_componente) VALUES ('Contribucion a la mejora del sistema de control interno', 5);


USE control_interno;
INSERT INTO roles (nombre_rol) VALUES ('Administrador');
INSERT INTO roles (nombre_rol) VALUES ('Director');
INSERT INTO roles (nombre_rol) VALUES ('Fiscalizador');
INSERT INTO roles (nombre_rol) VALUES ('Dependencia');
INSERT INTO roles (nombre_rol) VALUES ('Empleado');