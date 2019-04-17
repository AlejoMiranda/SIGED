CREATE DATABASE SIGED_BD;

USE SIGED_BD;
SET lc_time_names = 'es_CL';

/*
5.7.6 en adelante
ALTER USER 'root'@'localhost' IDENTIFIED BY 'MyNewPass';

5.7.5 y atras (esta es la que sirve en este caso para mi pc)
SET PASSWORD FOR 'root'@'localhost' = PASSWORD('123');
*/


CREATE TABLE tbl_permiso (
id_permiso INT AUTO_INCREMENT,
nombre_permiso VARCHAR (5000),
PRIMARY KEY (id_permiso)
);

CREATE TABLE tbl_tipo_usuario(
id_tipo_usuario INT AUTO_INCREMENT,
nombre_tipo_usuario VARCHAR (2000),
PRIMARY KEY (id_tipo_usuario)
);

CREATE TABLE tbl_tipo_usuario_permisos (
id_tipo_usuario_permisos INT AUTO_INCREMENT,
fk_tipo_usuario_tipo_usuario_permisos INT,
fk_permiso_tipo_usuario_permisos INT,
otorgado_tipo_usuario_permisos BOOLEAN,
FOREIGN KEY (fk_tipo_usuario_tipo_usuario_permisos) REFERENCES tbl_tipo_usuario (id_tipo_usuario),
FOREIGN KEY (fk_permiso_tipo_usuario_permisos) REFERENCES tbl_permiso (id_permiso),
PRIMARY KEY (id_tipo_usuario_permisos)
);

CREATE TABLE tbl_usuario(
id_usuario_usuario INT AUTO_INCREMENT,
nombre_usuario_usuario VARCHAR(20000),
fk_tipo_usuario__usuario INT,
contrasenia_usuario_usuario VARCHAR (2000),
FOREIGN KEY (fk_tipo_usuario__usuario) REFERENCES tbl_tipo_usuario (id_tipo_usuario),
PRIMARY KEY (id_usuario_usuario)
);


CREATE TABLE tbl_estado_civil(
id_estado_civil INT AUTO_INCREMENT,
nombre_estado_civil VARCHAR (300),
PRIMARY KEY (id_estado_civil)
);

CREATE TABLE tbl_genero(
id_genero INT AUTO_INCREMENT,
nombre_genero VARCHAR (21844),
PRIMARY KEY (id_genero)
);


CREATE TABLE tbl_medida (
id_medida INT AUTO_INCREMENT,
talla_de_chaqueta_camisa_medida VARCHAR (5000),
talla_de_pantalon_medida VARCHAR (5000),
talla_de_buzo_medida VARCHAR (5000),
talla_de_calzado_medida VARCHAR (5000),
PRIMARY KEY(id_medida)
);



/*
SELECT tbl_medida.id_medida, tbl_medida.talla_de_chaqueta_camisa_medida, tbl_medida.talla_de_pantalon_medida,  tbl_medida.talla_de_buzo_medida,
tbl_medida.talla_de_calzado_medida FROM tbl_medida, tbl_informacionPersonal WHERE 
tbl_informacionPersonal.fk_medida_informacionPersonal=tbl_medida.id_medida AND tbl_informacionPersonal.id_informacionPersonal=1;
*/

CREATE TABLE tbl_informacionPersonal(
id_informacionPersonal INT AUTO_INCREMENT,
rut_informacionPersonal VARCHAR (12) UNIQUE,
nombre_informacionPersonal VARCHAR (5000),
apellido_paterno_informacionPersonal VARCHAR (5000),
apellido_materno_informacionPersonal VARCHAR (5000),
fecha_de_nacimiento_informacionPersonal DATE,
fk_estado_civil_informacionPersonal INT,
fk_medida_informacionPersonal INT,
altura_en_metros_informacionPersonal VARCHAR (5000),
peso_en_kg_informacionPersonal VARCHAR (5000),
e_mail_informacionPersonal VARCHAR (5000),
fk_genero_informacionPersonal INT,
telefono_fijo_informacionPersonal VARCHAR (5000),
telefono_movil_informacionPersonal VARCHAR (5000),
direccion_personal_informacionPersonal VARCHAR (5000),
pertenecio_a_brigada_juvenil_informacionPersonal VARCHAR (5000),
esInstructor_informacionPersonal VARCHAR (5000),
FOREIGN KEY (fk_estado_civil_informacionPersonal) REFERENCES tbl_estado_civil (id_estado_civil),
FOREIGN KEY (fk_medida_informacionPersonal) REFERENCES tbl_medida (id_medida),
FOREIGN KEY (fk_genero_informacionPersonal) REFERENCES tbl_genero (id_genero),
PRIMARY KEY (id_informacionPersonal)
);


CREATE TABLE tbl_entidadACargo (
id_entidadACargo INT AUTO_INCREMENT,
nombre_entidadACargo VARCHAR (5000),
PRIMARY KEY(id_entidadACargo)
);



CREATE TABLE tbl_region (
  id_region INT AUTO_INCREMENT,
  nombre_region VARCHAR(64) ,
  ordinal_region VARCHAR(4),
  PRIMARY KEY (id_region)
);


CREATE TABLE tbl_provincia (
  id_provincia INT AUTO_INCREMENT,
  nombre_provincia VARCHAR(64),
  fk_region_provincia INT,
  FOREIGN KEY (fk_region_provincia) REFERENCES tbl_region (id_region),
  PRIMARY KEY (id_provincia)
); 


CREATE TABLE tbl_comuna (
  id_comuna INT AUTO_INCREMENT,
  nombre_comuna VARCHAR(64),
  fk_provincia_comuna INT,
  FOREIGN KEY (fk_provincia_comuna) REFERENCES tbl_provincia (id_provincia),
  PRIMARY KEY (id_comuna)
);

CREATE TABLE tbl_estadoBombero (
id_estado INT AUTO_INCREMENT,
nombre_estado VARCHAR (20000),
PRIMARY KEY (id_estado)
);

CREATE TABLE tbl_cargo (
id_cargo INT AUTO_INCREMENT,
nombre_cargo VARCHAR (5000),
PRIMARY KEY (id_cargo)
);

-- fk_id_entidadACargo_informacionBomberil INT,
-- FOREIGN KEY (fk_id_entidadACargo_informacionBomberil) REFERENCEs tbl_entidadACargo (id_entidadACargo),
CREATE TABLE tbl_informacionBomberil (
id_informacionBomberil INT AUTO_INCREMENT,
fk_region_informacionBomberil INT,
cuerpo_informacionBomberil VARCHAR (20000),
fk_id_entidadACargo_informacionBomberil INT,
fk_cargo_informacionBomberil INT,
fecha_de_ingreso_informacionBomberil DATE,
N_Reg_General_informacionBomberil INT,
fk_estado_informacionBomberil INT,
N_Reg_Cia_informacionBomberil INT,
fk_informacion_personal__informacionBomberil INT,
FOREIGN KEY (fk_id_entidadACargo_informacionBomberil) REFERENCEs tbl_entidadACargo (id_entidadACargo),
FOREIGN KEY (fk_informacion_personal__informacionBomberil) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
FOREIGN KEY (fk_region_informacionBomberil) REFERENCES tbl_region (id_region),
FOREIGN KEY (fk_cargo_informacionBomberil) REFERENCEs tbl_cargo (id_cargo),
FOREIGN KEY (fk_estado_informacionBomberil) REFERENCEs tbl_estadoBombero (id_estado),
PRIMARY KEY (id_informacionBomberil)
);





CREATE TABLE tbl_informacionLaboral (
id_informacionLaboral INT AUTO_INCREMENT,
nombre_de_empresa_informacionLaboral VARCHAR (5000),
direccion_de_empresa_informacionLaboral VARCHAR (5000),
telefono_de_empresa_informacionLaboral VARCHAR (5000),
cargo_en_la_empresa_informacionLaboral VARCHAR (5000),
fecha_de_ingreso_a_la_empresa_informacionLaboral DATE,
area_o_departamento_en_la_empresa_informacionLaboral VARCHAR (5000),
afp_informacionLaboral VARCHAR (5000),
profesion_informacionLaboral VARCHAR (5000),
fk_informacion_personal_informacionLaboral INT,
FOREIGN KEY (fk_informacion_personal_informacionLaboral) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
PRIMARY KEY (id_informacionLaboral)
);


CREATE TABLE tbl_grupo_sanguineo (
id_grupo_sanguineo INT AUTO_INCREMENT,
nombre_grupo_sanguineo VARCHAR (30), 
PRIMARY KEY (id_grupo_sanguineo)
);

CREATE TABLE tbl_parentesco (
id_parentesco INT AUTO_INCREMENT,
nombre_parentesco VARCHAR (5000),
PRIMARY KEY(id_parentesco)
);




CREATE TABLE tbl_informacionMedica1 (
id_informacionMedica1 INT AUTO_INCREMENT,
prestacionMedica_informacionMedica1 VARCHAR (5000),
alergias_informacionMedica1 VARCHAR (5000),
enfermedades_croncias_informacionMedica1 VARCHAR (5000),
fk_informacion_personal_informacionMedica1 INT,
FOREIGN KEY (fk_informacion_personal_informacionMedica1) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
PRIMARY KEY (id_informacionMedica1)
);


CREATE TABLE tbl_informacionMedica2 (
id_informacionMedica2 INT AUTO_INCREMENT,
medicamentos_habituales_informacionMedica2 VARCHAR (5000),
nombre_de_contacto_informacionMedica2 VARCHAR (5000),
telefono_de_contacto_informacionMedica2 VARCHAR (5000),
fk_parentesco_del_contacto_informacionMedica2 INT,
nivel_de_actividad_fisica_informacionMedica2 VARCHAR (5000),
es_donante_informacionMedica2 BOOLEAN,
es_fumador_informacionMedica2 BOOLEAN,
fk_grupo_sanguineo_informacionMedica2 INT,
fk_informacion_personal_informacionMedica2 INT,
FOREIGN KEY (fk_informacion_personal_informacionMedica2) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
FOREIGN KEY (fk_parentesco_del_contacto_informacionMedica2) REFERENCES tbl_parentesco (id_parentesco),
FOREIGN KEY (fk_grupo_sanguineo_informacionMedica2) REFERENCES tbl_grupo_sanguineo (id_grupo_sanguineo),
PRIMARY KEY (id_informacionMedica2)
);



CREATE TABLE tbl_informacionFamiliar (
id_informacionFamiliar INT AUTO_INCREMENT,
nombres_informacionFamiliar VARCHAR (5000),
fecha_de_nacimiento_informacionFamiliar DATE,
fk_parentesco_informacionFamiliar INT,
fk_informacionPersonal_informacionFamiliar INT,
FOREIGN KEY (fk_informacionPersonal_informacionFamiliar) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
FOREIGN KEY (fk_parentesco_informacionFamiliar) REFERENCES tbl_parentesco (id_parentesco),
PRIMARY KEY(id_informacionFamiliar)
);


CREATE TABLE tbl_estado_curso(
id_estado_curso INT AUTO_INCREMENT,
nombre_estado_curso VARCHAR (5000),
PRIMARY KEY(id_estado_curso)
);


CREATE TABLE tbl_informacionAcademica(
id_informacionAcademica INT AUTO_INCREMENT,
fecha_informacionAcademica DATE,
actividad_informacionAcademica VARCHAR (300),
fk_estado_curso_informacionAcademica INT,
fk_informacionPersonal_informacionAcademica INT,
FOREIGN KEY (fk_informacionPersonal_informacionAcademica) REFERENCES tbl_informacionPersonal (id_informacionPersonal), 
FOREIGN KEY (fk_estado_curso_informacionAcademica) REFERENCES tbl_estado_curso (id_estado_curso), 
PRIMARY KEY (id_informacionAcademica)
);


CREATE TABLE tbl_entrenamientoEstandar(
id_entrenamientoEstandar INT AUTO_INCREMENT,
fecha_entrenamientoEstandar DATE,
actividad_entrenamientoEstandar VARCHAR (300),
fk_estado_curso_entrenamientoEstandar INT,
fk_informacionPersonal_entrenamientoEstandar INT,
FOREIGN KEY (fk_informacionPersonal_entrenamientoEstandar) REFERENCES tbl_informacionPersonal (id_informacionPersonal), 
FOREIGN KEY (fk_estado_curso_entrenamientoEstandar) REFERENCES tbl_estado_curso (id_estado_curso), 
PRIMARY KEY (id_entrenamientoEstandar)
);



CREATE TABLE tbl_informacionHistorica(
id_informacionHistorica INT AUTO_INCREMENT,
fk_region_informacionHistorica INT,
cuerpo_informacionHistorica VARCHAR (5000),
compania_informacionHistorica VARCHAR (5000),
fechaDeCambio_informacionHistorica DATE,
premio_informacionHistorica VARCHAR (20000),
motivo_informacionHistorica TEXT (2000),
detalle_informacionHistorica VARCHAR (20000),
cargo_informacionHistorica VARCHAR (5000),
fk_informacionPersonal_informacionHistorica INT,
FOREIGN KEY (fk_informacionPersonal_informacionHistorica) REFERENCES tbl_informacionPersonal (id_informacionPersonal), 
FOREIGN KEY (fk_region_informacionHistorica) REFERENCES tbl_region (id_region), 
PRIMARY KEY (id_informacionHistorica)
);
 

CREATE TABLE tbl_tipo_vehiculo (
id_tipo_vehiculo INT AUTO_INCREMENT,
nombre_tipo_vehiculo VARCHAR (5000),
PRIMARY KEY(id_tipo_vehiculo)
);


CREATE TABLE tbl_estado_unidad (
id_estado_unidad INT AUTO_INCREMENT,
nombre_estado_unidad VARCHAR (5000),
PRIMARY KEY(id_estado_unidad)
);

CREATE TABLE tbl_unidad (
id_unidad INT AUTO_INCREMENT,
nombre_unidad VARCHAR (300),
anioDeFabricacion_unidad VARCHAR (300),
marca_unidad VARCHAR (300),
nMotor_unidad VARCHAR (300),
nChasis_unidad VARCHAR (300),
nVIN_unidad VARCHAR (300),
color_unidad VARCHAR (300),
ppu_unidad VARCHAR (300) UNIQUE,
fechaInscripcion_unidad DATE,
fechaAdquisicion_unidad DATE,
capacidadOcupantes_unidad INT,
fk_estado_unidad_unidad INT,
fk_tipo_vehiculo_unidad INT,
fk_entidadACargo INT,
FOREIGN KEY (fk_estado_unidad_unidad) REFERENCES tbl_estado_unidad (id_estado_unidad),
FOREIGN KEY (fk_tipo_vehiculo_unidad) REFERENCES tbl_tipo_vehiculo (id_tipo_vehiculo),
FOREIGN KEY (fk_entidadACargo) REFERENCES tbl_entidadACargo (id_entidadACargo),
PRIMARY KEY (id_unidad)
);

CREATE TABLE tbl_tipoDeMantencion (
id_tipo_de_mantencion INT AUTO_INCREMENT,
nombre_tipoDeMantencion VARCHAR (5000),
PRIMARY KEY(id_tipo_de_mantencion)
);


CREATE TABLE tbl_mantencion (
id_mantencion INT AUTO_INCREMENT,
fk_tipo_mantencion INT,
fecha_mantencion DATE,
responsable_mantencion VARCHAR (5000),
direccion_mantencion VARCHAR (5000),
comentarios_mantencion VARCHAR (5000),
fk_unidad INT,
FOREIGN KEY (fk_unidad) REFERENCES tbl_unidad (id_unidad),
FOREIGN KEY (fk_tipo_mantencion) REFERENCES tbl_tipoDeMantencion (id_tipo_de_mantencion),
PRIMARY KEY (id_mantencion)
);

CREATE TABLE tbl_tipo_combustible (
id_tipo_combustible INT AUTO_INCREMENT,
nombre_tipo_combustible VARCHAR (5000),
PRIMARY KEY (id_tipo_combustible)
);

CREATE TABLE tbl_cargio_combustible (
id_cargio_combustible INT AUTO_INCREMENT,
responsable_cargio_combustible VARCHAR (5000),
fecha_cargio DATE,
direccion_cargio VARCHAR (5000),
fk_tipo_combustible_cargio_combustible INT,
cantidad_litros_cargio_combustible FLOAT,
precio_litro_cargio_combustible INT,
observacion_cargio_combustible VARCHAR (5000),
fk_unidad INT,
FOREIGN KEY (fk_tipo_combustible_cargio_combustible) REFERENCES tbl_tipo_combustible (id_tipo_combustible),
FOREIGN KEY (fk_unidad) REFERENCES tbl_unidad (id_unidad),
PRIMARY KEY (id_cargio_combustible)
);

CREATE TABLE tbl_tipo_servicio(
id_tipo_servicio INT AUTO_INCREMENT,
codigo_tipo_servicio VARCHAR (5000),
nombre_tipo_servicio VARCHAR (5000),
PRIMARY KEY (id_tipo_servicio)
);


CREATE TABLE tbl_bitacora (
id_bitacora INT AUTO_INCREMENT,
fecha_bitacora DATE,
fk_tipo_de_servicio_bitacora INT,
direccion_bitacora VARCHAR (5000),
oficial_a_cargo_bitacora VARCHAR (5000),
maquinista_bitacora VARCHAR (5000),
cantidad_de_voluntarios_bitacora VARCHAR (5000),
hora_de_salida_bitacora TIME,
hora_de_llegada_bitacora TIME,
kilometros_bitacora INT,
hora_de_motor_bitacora TIME,
fk_combustible_bitacora INT,
hora_bomba_bitacora TIME,
observaciones_bitacora INT,
PRIMARY KEY (id_bitacora)
);


CREATE TABLE tbl_ubicacion_fisica (
id_ubicacion_fisica INT AUTO_INCREMENT,
nombre_ubicacion_fisica VARCHAR (5000),
fk_entidad_a_cargo INT,
FOREIGN KEY (fk_entidad_a_cargo) REFERENCES tbl_entidadACargo (id_entidadACargo),
PRIMARY KEY (id_ubicacion_fisica)
);


CREATE TABLE tbl_tipo_de_medida (
id_tipo_de_medida INT AUTO_INCREMENT,
nombre_tipo_de_medida VARCHAR (5000),
PRIMARY KEY (id_tipo_de_medida)
);

CREATE TABLE tbl_unidad_de_medida (
id_unidad_de_medida INT AUTO_INCREMENT,
fk_tipo_de_medida_unidad_de_medida INT,
nombre_unidad_de_medida VARCHAR (5000),
FOREIGN KEY (fk_tipo_de_medida_unidad_de_medida) REFERENCES tbl_tipo_de_medida (id_tipo_de_medida),
PRIMARY KEY (id_unidad_de_medida)
);

CREATE TABLE tbl_estado_material_menor (
id_estado_material_menor INT AUTO_INCREMENT,
nombre_estado_material_menor VARCHAR (300),
PRIMARY KEY(id_estado_material_menor)
);

CREATE TABLE tbl_material_menor (
id_material_menor INT AUTO_INCREMENT,
nombre_material_menor VARCHAR (300),
fk_entidad_a_cargo_material_menor INT,
color_material_menor VARCHAR (300),
cantidad_material_menor INT,
medida_material_menor INT,
fk_unidad_de_medida_material_menor INT,
fk_ubicacion_fisica_material_menor INT,
fabricante_material_menor VARCHAR (300),
fecha_de_caducidad_material_menor DATE,
proveedor_material_menor VARCHAR (300),
fk_estado_material_menor INT,
detalle_material_menor VARCHAR (500),
FOREIGN KEY (fk_estado_material_menor) REFERENCES tbl_estado_material_menor (id_estado_material_menor),
FOREIGN KEY (fk_entidad_a_cargo_material_menor) REFERENCES tbl_entidadACargo (id_entidadACargo),
FOREIGN KEY (fk_unidad_de_medida_material_menor) REFERENCES tbl_unidad_de_medida (id_unidad_de_medida),
FOREIGN KEY (fk_ubicacion_fisica_material_menor) REFERENCES tbl_ubicacion_fisica (id_ubicacion_fisica),
PRIMARY KEY (id_material_menor)
);

CREATE TABLE tbl_informacionDeCargos (
id_informacionDeCargos INT AUTO_INCREMENT,
fk_materialMenorAsignado_informacionDeCargos INT,
cantidadAsignada_informacionDeCargos INT,
fk_personal_informacionDeCargos INT,
FOREIGN KEY (fk_materialMenorAsignado_informacionDeCargos) REFERENCES tbl_material_menor (id_material_menor),
FOREIGN KEY (fk_personal_informacionDeCargos) REFERENCES tbl_informacionPersonal (id_informacionPersonal),
PRIMARY KEY (id_informacionDeCargos)
);

CREATE TABLE tbl_oficial(
id_oficial INT AUTO_INCREMENT,
rango_oficial VARCHAR (50),
codigo INT,
PRIMARY KEY(id_oficial)
);

INSERT INTO tbl_oficial (rango_oficial,codigo)VALUES 
('Capitán',41),
('Director',71),
('Teniente 1°',101),
('Teniente 2°',102),
('Teniente 3°',103),
('Ayudante',104),
('Maquinista',105),
('Secretario',106),
('Tesorero',107),
('Ayudante 2 °',108),
('Capitán',42),
('Director',72),
('Teniente 1°',201),
('Teniente 2°',202),
('Teniente 3°',203),
('Ayudante',204),
('Maquinista',205),
('Secretario',206),
('Tesorero',207),
('Ayudante 2 °',208),
('Capitán',43),
('Director',73),
('Teniente 1°',301),
('Teniente 2°',302),
('Teniente 3°',303),
('Ayudante',304),
('Maquinista',305),
('Secretario',306),
('Tesorero',307),
('Ayudante 2 °',308),
('Capitán',1),
('Director',2),
('Teniente 1°',3),
('Teniente 2°',4),
('Teniente 3°',5),
('Ayudante',6),
('Maquinista',7),
('Secretario',8),
('Tesorero',9),
('Ayudante 2 °',10)  ;

CREATE TABLE tbl_estado_oficial(
id_estado_oficial INT AUTO_INCREMENT,
fkOficial INT,
nombreEstado_estado_oficial VARCHAR (50),
momento DATETIME,
FOREIGN KEY (fkOficial) REFERENCES tbl_oficial (id_oficial),
PRIMARY KEY(id_estado_oficial)
);

INSERT INTO tbl_estado_oficial (fkOficial,nombreEstado_estado_oficial,momento) VALUES (1,'0-8',NOW()),
(2,'0-8',NOW()),
(3,'0-8',NOW()),
(4,'0-8',NOW()),
(5,'0-8',NOW()),
(6,'0-8',NOW()),
(7,'0-8',NOW()),
(8,'0-8',NOW()),
(9,'0-8',NOW()),
(10,'0-8',NOW()),
(11,'0-8',NOW()),
(12,'0-8',NOW()),
(13,'0-8',NOW()),
(14,'0-8',NOW()),
(15,'0-8',NOW()),
(16,'0-8',NOW()),
(17,'0-8',NOW()),
(18,'0-8',NOW()),
(19,'0-8',NOW()),
(20,'0-8',NOW()),
(21,'0-8',NOW()),
(22,'0-8',NOW()),
(23,'0-8',NOW()),
(24,'0-8',NOW()),
(25,'0-8',NOW()),
(26,'0-8',NOW()),
(27,'0-8',NOW()),
(28,'0-8',NOW()),
(29,'0-8',NOW()),
(30,'0-8',NOW()),
(31,'0-8',NOW()),
(32,'0-8',NOW()),
(33,'0-8',NOW()),
(34,'0-8',NOW()),
(35,'0-8',NOW()),
(36,'0-8',NOW()),
(37,'0-8',NOW()),
(38,'0-8',NOW()),
(39,'0-8',NOW()),
(40,'0-8',NOW());

CREATE TABLE tbl_sector(
id_sector INT AUTO_INCREMENT,
nombre_sector VARCHAR (300),
PRIMARY KEY(id_sector)
);

CREATE TABLE tbl_servicio(
id_servicio INT AUTO_INCREMENT,
nombre_servicio VARCHAR (300),
rut_servicio VARCHAR (300),
telefono_servicio VARCHAR (300),
direccion_servicio VARCHAR (300),
esquina1_servicio VARCHAR (300),
esquina2_servicio VARCHAR (300),
fk_sector INT,
fk_tipoDeServicio INT,
detalles_servicio VARCHAR (1000),
fecha_servicio DATETIME,
FOREIGN KEY (fk_sector) REFERENCES tbl_sector(id_sector),
FOREIGN KEY (fk_tipoDeServicio) REFERENCES tbl_tipo_servicio(id_tipo_servicio),
PRIMARY KEY(id_servicio)
);


CREATE TABLE tbl_servicio_unidad(
id_servicio_unidad INT AUTO_INCREMENT,
fk_servicio INT,
fk_unidad INT,
momento6_0 DATETIME,
obac VARCHAR (100),
conductor VARCHAR (100),
nBomberos VARCHAR (100),
momento6_3 DATETIME,
momento6_7 DATETIME,
momento6_8 DATETIME,
momento6_9 DATETIME,
momento6_10 DATETIME,
emergenciaActiva BOOLEAN,
FOREIGN KEY(fk_servicio) REFERENCES tbl_servicio (id_servicio),
FOREIGN KEY(fk_unidad) REFERENCES tbl_unidad (id_unidad),
PRIMARY KEY(id_servicio_unidad)
);

CREATE TABLE tbl_entidad_exteriror(
id_entidad_exterior INT AUTO_INCREMENT,
nombre_entidad_exterior VARCHAR (300),
PRIMARY KEY(id_entidad_exterior)
);

CREATE TABLE tbl_apoyo(
id_apoyo INT AUTO_INCREMENT,
fk_entidadExterior INT,
responsable VARCHAR (300),
PPUU VARCHAR (300),
FOREIGN KEY (fk_entidadExterior) REFERENCES tbl_entidad_exteriror (id_entidad_exterior),
PRIMARY KEY(id_apoyo)
);


CREATE TABLE tbl_apoyoEntidadExterior_servicio(
id_apoyoEntidadExterior_servicio INT AUTO_INCREMENT,
fk_servicio INT,
fk_apoyo INT,
FOREIGN KEY(fk_servicio) REFERENCES tbl_servicio (id_servicio),
FOREIGN KEY(fk_apoyo) REFERENCES tbl_apoyo (id_apoyo),
PRIMARY KEY(id_apoyoEntidadExterior_servicio)
);

CREATE TABLE tbl_estado_de_servicio_de_maquina(
id_estado_de_servicio_de_maquina INT AUTO_INCREMENT,
nombre_estado_de_servicio_de_maquina VARCHAR (50),
PRIMARY KEY (id_estado_de_servicio_de_maquina)
);

CREATE TABLE tbl_estado_servicio_unidad(
id_estado_servicio_unidad INT AUTO_INCREMENT,
fk_unidad INT,
fk_estado INT,
FOREIGN KEY (fk_unidad) REFERENCES tbl_unidad (id_unidad),
FOREIGN KEY (fk_estado) REFERENCES tbl_estado_de_servicio_de_maquina (id_estado_de_servicio_de_maquina),
PRIMARY KEY(id_estado_servicio_unidad)
);



-- Procedimientos

DELIMITER //
CREATE PROCEDURE CRUDPermiso (id INT, nombre VARCHAR (5000), tipoDeOperacion INT)
BEGIN
IF tipoDeOperacion= 1 THEN
INSERT INTO tbl_permiso VALUES (NULL , nombre);
ELSEIF tipoDeOperacion= 2 THEN
SELECT * FROM tbl_permiso WHERE id_permiso=id;
ELSEIF tipoDeOperacion= 3 THEN
UPDATE tbl_permiso SET nombre_permiso=nombre WHERE id_permiso=id ;
ELSEIF tipoDeOperacion= 4 THEN
DELETE FROM tbl_permiso  WHERE id_permiso=id;
END IF;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE CRUDTipo_usuario (id INT, nombre VARCHAR (5000), tipoDeOperacion INT )
BEGIN
IF tipoDeOperacion= 1 THEN
INSERT INTO tbl_tipo_usuario VALUES (NULL , nombre);
ELSEIF tipoDeOperacion= 2 THEN
SELECT * FROM tbl_tipo_usuario WHERE id_tipo_usuario=id;
ELSEIF tipoDeOperacion= 3 THEN
UPDATE tbl_tipo_usuario SET nombre_tipo_usuario=nombre WHERE id_tipo_usuario=id ;
ELSEIF tipoDeOperacion= 4 THEN
DELETE FROM tbl_tipo_usuario  WHERE id_tipo_usuario=id;
END IF;

END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE CRUDTipo_usuario_permisos (id INT, tipo_usuario_fk INT, permiso_usuario_fk INT, autorizado BOOLEAN, tipoDeOperacion INT )
BEGIN
IF tipoDeOperacion= 1 THEN
INSERT INTO tbl_tipo_usuario_permisos VALUES (NULL , tipo_usuario_fk, permiso_usuario_fk, autorizado);
ELSEIF tipoDeOperacion= 2 THEN
SELECT * FROM tbl_tipo_usuario_permisos WHERE id_tipo_usuario_permisos=id;
ELSEIF tipoDeOperacion= 3 THEN
UPDATE tbl_tipo_usuario_permisos SET fk_tipo_usuario_tipo_usuario_permisos=tipo_usuario_fk, fk_permiso_tipo_usuario_permisos= permiso_usuario_fk,
otorgado_tipo_usuario_permisos=autorizado WHERE id_tipo_usuario_permisos=id ;
ELSEIF tipoDeOperacion= 4 THEN
DELETE FROM tbl_tipo_usuario_permisos  WHERE id_tipo_usuario_permisos=id;
END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDUsuario (id INT, nombre_usuario VARCHAR (20000), fk_tipo_usuario INT, contrasenia VARCHAR (2000), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_usuario VALUES (NULL, nombre_usuario, fk_tipo_usuario, contrasenia);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_usuario WHERE id_usuario_usuario=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_usuario SET nombre_usuario_usuario=nombre_usuario, fk_tipo_usuario__usuario=fk_tipo_usuario, contrasenia_usuario_usuario=contrasenia WHERE id_usuario_usuario=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_usuario WHERE id_usuario_usuario=id;
END IF;
END//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE CRUDEstadoCivil (id INT, nombre VARCHAR (300), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_estado_civil VALUES (NULL, nombre);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_estado_civil WHERE id_estado_civil=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_estado_civil SET nombre_estado_civil=nombre WHERE id_estado_civil=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_estado_civil WHERE id_estado_civil=id;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDGenero (id INT, nombre VARCHAR (300), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_genero VALUES (NULL, nombre);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_genero WHERE id_genero=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_genero SET nombre_genero=nombre WHERE id_genero=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_genero WHERE id_genero=id;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDRegion (id INT, nombre VARCHAR (300), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_region VALUES (NULL, nombre);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_region WHERE id_region=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_region SET nombre_region=nombre WHERE id_region=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_region WHERE id_region=id;
END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDProvincia (id INT, nombre VARCHAR (64), fkRegion INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_provincia VALUES (NULL, nombre, fkRegion);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_provincia WHERE id_provincia=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_provincia SET nombre_provincia=nombre, fk_region_provincia=fkRegion WHERE id_provincia=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_provincia WHERE id_provincia=id;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDComuna (id INT, nombre VARCHAR (64), fkProvincia INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_comuna VALUES (NULL, nombre, fkProvincia);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_comuna WHERE id_comuna=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_comuna SET nombre_comuna=nombre, fk_provincia_comuna=fkProvincia WHERE id_comuna=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_comuna WHERE id_comuna=id;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDCargo (id INT, nombre VARCHAR (5000), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_cargo VALUES (NULL, nombre);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_cargo WHERE id_cargo=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_cargo SET nombre_cargo=nombre WHERE id_cargo=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_cargo WHERE id_cargo=id;
END IF;
END//
DELIMITER ;



DELIMITER //
CREATE PROCEDURE CRUDMedida (id INT, talla_chaqueta VARCHAR (5000), talla_pantalon VARCHAR (5000), talla_buzo VARCHAR (5000), talla_calzado VARCHAR (5000), tipoDeOperacion INT)
BEGIN
IF tipoDeOperacion= 1 THEN
INSERT INTO tbl_medida VALUES (NULL , talla_chaqueta, talla_pantalon, talla_buzo, talla_calzado);
ELSEIF tipoDeOperacion= 2 THEN
SELECT * FROM tbl_medida WHERE id_medida=id;
ELSEIF tipoDeOperacion= 3 THEN
UPDATE tbl_medida SET talla_chaqueta_medida=talla_chaqueta, talla_pantalon_medida= talla_pantalon,
talla_buzo_medida=talla_buzo, talla_calzado_medida=talla_calzado WHERE id_medida=id ;
ELSEIF tipoDeOperacion= 4 THEN
DELETE FROM tbl_medida  WHERE id_medida=id;
END IF;
END //
DELIMITER ;


DELIMITER // 
CREATE PROCEDURE CRUDInformacionPersonal (id INT, rut VARCHAR(12), nombre VARCHAR (5000), apellidoPaterno VARCHAR(5000), apellidoMaterno VARCHAR(5000), fechaDeNacimiento DATE,
fkEstadoCivil INT, fkMedida INT, altura VARCHAR (5000), peso VARCHAR (5000), email VARCHAR (5000), fkGenero INT, telefonoFijo VARCHAR (5000), telefonoMovil VARCHAR (5000),
direccionPersonal VARCHAR (5000), pertenecioABrigadaJuvenil VARCHAR (5000), esInstructor VARCHAR (5000), tipoOperacion INT ) 
BEGIN

DECLARE fkMedidas INT;
SELECT MAX(id_medida) INTO fkMedidas FROM tbl_medida;

IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionPersonal VALUES (NULL, rut, nombre, apellidoPaterno, apellidoMaterno, fechaDeNacimiento, fkEstadoCivil, fkMedidas,
altura, peso, email, fkGenero, telefonoFijo, telefonoMovil, direccionPersonal, pertenecioABrigadaJuvenil, esInstructor);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionPersonal WHERE id_informacionPersonal=id;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionPersonal SET rut_informacionPersonal=rut, nombre_informacionPersonal=nombre, apellido_paterno_informacionPersonal=apellidoPaterno,
apellido_materno_informacionPersonal=apellidoMaterno, fecha_de_nacimiento_informacionPersonal=fechaDeNacimiento, fk_estado_civil_informacionPersonal=fkEstadoCivil,
fk_medida_informacionPersonal=fkMedidas, altura_en_metros_informacionPersonal=altura, peso_en_kg_informacionPersonal=peso, e_mail_informacionPersonal=email,
fk_genero_informacionPersonal=fkGenero, telefono_fijo_informacionPersonal=telefonoFijo, telefono_movil_informacionPersonal=telefonoMovil, direccion_personal_informacionPersonal=direccionPersonal,
pertenecio_a_brigada_juvenil_informacionPersonal=pertenecioABrigadaJuvenil, esInstructor_informacionPersonal=esInstructor WHERE id_informacionPersonal=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionPersonal WHERE id_informacionPersonal=id;
END IF;
END//

DELIMITER ;




DELIMITER //
CREATE PROCEDURE CRUDFichaInformacionBomberil (id INT, fkRegion INT, cuerpo VARCHAR (2000), fkCompania INT, fkCargo INT, 
fechaIngreso DATE, NRG INT, fkEstado INT, NRC INT, fkInformacionPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionBomberil VALUES (NULL, fkRegion, cuerpo, fkCompania, fkCargo, fechaIngreso, NRG, fkEstado, NRC, fkInformacionPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionBomberil WHERE fk_informacion_personal__informacionBomberil=fkInformacionPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionBomberil SET fk_region_informacionBomberil=fkRegion,cuerpo_informacionBomberil=cuerpo, fk_id_entidadACargo_informacionBomberil=fkCompania,
fk_cargo_informacionBomberil=fkCargo, fecha_de_ingreso_informacionBomberil=fechaIngreso, N_Reg_General_informacionBomberil=NRG, fk_estado_informacionBomberil=fkEstado,
 N_Reg_Cia_informacionBomberil=NRC, fk_informacion_personal__informacionBomberil=fkInformacionPersonal  WHERE fk_informacion_personal__informacionBomberil=fkInformacionPersonal;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionBomberil WHERE id_informacionBomberil=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_informacionBomberil WHERE fk_informacion_personal__informacionBomberil=fkInformacionPersonal;
END IF;
END//
DELIMITER ;


DELIMITER // 
CREATE PROCEDURE CRUDInformacionLaboral (id INT, nombreEmpresa VARCHAR (5000), direccionEmpresa VARCHAR (5000), telefonoEmpresa VARCHAR (5000), cargoEmpresa VARCHAR (5000),
fechaDeIngresoALaEmpresa DATE, dptoEnEmpresa VARCHAR (5000), afp VARCHAR (5000), profesion VARCHAR (5000), fkInfoPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionLaboral VALUES (NULL, nombreEmpresa, direccionEmpresa, telefonoEmpresa, cargoEmpresa, fechaDeIngresoALaEmpresa,
dptoEnEmpresa, afp, profesion,fkInfoPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionLaboral WHERE fk_informacion_personal_informacionLaboral=fkInfoPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionLaboral SET nombre_de_empresa_informacionLaboral=nombreEmpresa, direccion_de_empresa_informacionLaboral=direccionEmpresa, telefono_de_empresa_informacionLaboral=telefonoEmpresa,
cargo_en_la_empresa_informacionLaboral=cargoEmpresa, fecha_de_ingreso_a_la_empresa_informacionLaboral=fechaDeIngresoALaEmpresa, area_o_departamento_en_la_empresa_informacionLaboral= dptoEnEmpresa,
afp_informacionLaboral=afp, profesion_informacionLaboral=profesion, fk_informacion_personal_informacionLaboral=fkInfoPersonal   WHERE fk_informacion_personal_informacionLaboral=fkInfoPersonal;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionLaboral WHERE id_informacionLaboral=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_informacionLaboral WHERE fk_informacion_personal_informacionLaboral=fkInfoPersonal;
END IF;
END//
DELIMITER ;


DELIMITER // 
CREATE PROCEDURE CRUDInformacionMedica1 (id INT, prestacionMedica VARCHAR (5000), alergias VARCHAR (5000), enfermedadesCronicas VARCHAR (5000), fkInfoPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionMedica1 VALUES (NULL, prestacionMedica, alergias, enfermedadesCronicas, fkInfoPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT *  FROM tbl_informacionMedica1 WHERE fk_informacion_personal_informacionMedica1=fkInfoPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionMedica1 SET prestacionMedica_informacionMedica1=prestacionMedica, alergias_informacionMedica1=alergias, enfermedades_croncias_informacionMedica1=enfermedadesCronicas,
fk_informacion_personal_informacionMedica1=fkInfoPersonal WHERE tbl_informacionMedica1.fk_informacion_personal_informacionMedica1=fkInfoPersonal;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionMedica1 WHERE tbl_informacionMedica1=id;
ELSEIF tipoOperacion=5 THEN
SELECT *  FROM tbl_informacionMedica1 WHERE fk_informacion_personal_informacionMedica1=fkInfoPersonal;
END IF;
END//
DELIMITER ;

DELIMITER // 
CREATE PROCEDURE CRUDInformacionMedica2 (id INT, medicamentos_habituales VARCHAR (5000), nombre_de_contacto VARCHAR (5000), telefono_de_contacto VARCHAR (5000), fkParentesco INT,
nivel_de_actividad_fisica VARCHAR (5000), es_donante BOOLEAN, es_fumador BOOLEAN, fk_grupoSanguineo INT, fk_inforPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionMedica2 VALUES (NULL, medicamentos_habituales, nombre_de_contacto, telefono_de_contacto, fkParentesco, nivel_de_actividad_fisica, es_donante,
 es_fumador, fk_grupoSanguineo, fk_inforPersonal );
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionMedica2 WHERE fk_informacion_personal_informacionMedica2=fk_inforPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionMedica2 SET medicamentos_habituales_informacionMedica2=medicamentos_habituales, nombre_de_contacto_informacionMedica2=nombre_de_contacto, telefono_de_contacto_informacionMedica2=telefono_de_contacto,
fk_parentesco_del_contacto_informacionMedica2=fkParentesco, nivel_de_actividad_fisica_informacionMedica2=nivel_de_actividad_fisica, es_donante_informacionMedica2=es_donante,
es_fumador_informacionMedica2=es_fumador, fk_grupo_sanguineo_informacionMedica2=fk_grupoSanguineo, fk_informacion_personal_informacionMedica2=fk_inforPersonal WHERE fk_informacion_personal_informacionMedica2=fk_inforPersonal;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionMedica2 WHERE id_informacionMedica2=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_informacionMedica2 WHERE fk_informacion_personal_informacionMedica2=fk_inforPersonal;
 END IF;
END//
DELIMITER ;

DELIMITER // 
CREATE PROCEDURE CRUDInformacionFamiliar (id INT, nombresInfoFlia VARCHAR (5000), fechaDeNacimientoInfoFlia DATE, fk_parentesco INT , fk_inforPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionFamiliar VALUES (NULL, nombresInfoFlia , fechaDeNacimientoInfoFlia, fk_parentesco, fk_inforPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionFamiliar WHERE fk_informacionPersonal_informacionFamiliar=fk_inforPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionFamiliar SET nombres_informacionFamiliar=nombresInfoFlia, fecha_de_nacimiento_informacionFamiliar=fechaDeNacimientoInfoFlia,
fk_parentesco_informacionFamiliar=fk_parentesco, fk_informacionPersonal_informacionFamiliar=fk_inforPersonal WHERE id_informacionFamiliar=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionFamiliar WHERE id_informacionFamiliar=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_informacionFamiliar WHERE fk_informacionPersonal_informacionFamiliar=fk_inforPersonal;
END IF;
END//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE CRUDInformacionAcademica (id INT, fechaInfoAcademica DATE, actividadInfoAcademica VARCHAR (300) , fk_estadoCurso INT, fk_infoPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionAcademica VALUES (NULL, fechaInfoAcademica, actividadInfoAcademica , fk_estadoCurso, fk_infoPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_informacionAcademica WHERE fk_informacionPersonal_informacionAcademica=fk_infoPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionAcademica SET fecha_informacionAcademica=fechaInfoAcademica, actividad_informacionAcademica=actividadInfoAcademica, fk_estado_curso_informacionAcademica=fk_estadoCurso,
fk_informacionPersonal_informacionAcademica=fk_infoPersonal WHERE id_informacionAcademica=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_informacionAcademica WHERE id_informacionAcademica=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_informacionAcademica WHERE fk_informacionPersonal_informacionAcademica=fk_infoPersonal;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDInformacionEntrenamientoEstandar (id INT, fechaInfoEntrenamientoEstandar DATE, actividadEntrenamientoEstandar VARCHAR (300) , fk_estadoCurso INT, fk_inforPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_entrenamientoEstandar VALUES (NULL, fechaInfoEntrenamientoEstandar, actividadEntrenamientoEstandar, fk_estadoCurso, fk_inforPersonal );
ELSEIF tipoOperacion=2 THEN
SELECT * FROM tbl_entrenamientoEstandar WHERE fk_informacionPersonal_entrenamientoEstandar=fk_inforPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_entrenamientoEstandar SET fecha_entrenamientoEstandar=fechaInfoEntrenamientoEstandar, actividad_entrenamientoEstandar=actividadEntrenamientoEstandar,
fk_estado_curso_entrenamientoEstandar=fk_estadoCurso, fk_informacionPersonal_entrenamientoEstandar=fk_inforPersonal WHERE id_entrenamientoEstandar=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM tbl_entrenamientoEstandar WHERE id_entrenamientoEstandar=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM tbl_entrenamientoEstandar WHERE fk_informacionPersonal_entrenamientoEstandar=fk_inforPersonal;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CRUDInformacionHistorica (id INT, fkRegion INT, cuerpo VARCHAR (5000) , compania VARCHAR (5000), fechaDeCambio DATE, premio VARCHAR (20000),
motivo TEXT (20000), detalle VARCHAR (20000), cargo VARCHAR (5000), fkInformacionPersonal INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO tbl_informacionHistorica VALUES (NULL, fkRegion, cuerpo, compania, fechaDeCambio, premio, motivo,  detalle, cargo, fkInformacionPersonal);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM  tbl_informacionHistorica WHERE fk_informacionPersonal_informacionHistorica=fkInformacionPersonal;
ELSEIF tipoOperacion=3 THEN
UPDATE tbl_informacionHistorica SET fk_region_informacionHistorica=fkRegion, cuerpo_informacionHistorica=cuerpo, compania_informacionHistorica=compania, fechaDeCambio_informacionHistorica=fechaDeCambio,
 premio_informacionHistorica=premio, motivo_informacionHistorica=motivo, detalle_informacionHistorica=detalle, cargo_informacionHistorica=cargo, fk_informacionPersonal_informacionHistorica=fkInformacionPersonal  WHERE id_informacionHistorica=id;
ELSEIF tipoOperacion=4 THEN
DELETE FROM  tbl_informacionHistorica WHERE id_informacionHistorica=id;
ELSEIF tipoOperacion=5 THEN
SELECT * FROM  tbl_informacionHistorica WHERE fk_informacionPersonal_informacionHistorica=fkInformacionPersonal;
END IF;
END//
DELIMITER ;


DELIMITER // 
CREATE PROCEDURE CRUDUnidad (id INT, nombre VARCHAR (300), anioDeFabricacion VARCHAR (300), marca VARCHAR (300), nMotor VARCHAR (300), nChasis VARCHAR  (300),
nVIN VARCHAR (300), color VARCHAR (300), ppu VARCHAR (300), fechaInscripcion DATE, fechaAdquisicion DATE,
capacidadOcupantes INT, fk_estado INT, fk_tipo_vehiculo INT, fk_entidadProp INT, tipoDeOperacion INT)

BEGIN
IF tipoDeOperacion= 1 THEN
INSERT INTO tbl_unidad VALUES (NULL ,nombre, anioDeFabricacion, marca , nMotor, nChasis ,
nVIN  , color , ppu , fechaInscripcion , fechaAdquisicion ,capacidadOcupantes , fk_estado, fk_tipo_vehiculo , fk_entidadProp );
ELSEIF tipoDeOperacion= 2 THEN
SELECT * FROM tbl_unidad WHERE id_unidad=id_unidad;
ELSEIF tipoDeOperacion= 3 THEN
UPDATE tbl_unidad SET nombre_unidad=nombre, anioDeFabricacion_unidad=anioDeFabricacion, marca_unidad=marca, nMotor_unidad=nMotor, nChasis_unidad=nChasis,
nVIN_unidad=nVIN, color_unidad=color, ppu_unidad=ppu, fechaInscripcion_unidad=fechaInscripcion , fechaAdquisicion_unidad=fechaAdquisicion,
capacidadOcupantes_unidad=capacidadOcupantes , fk_estado_unidad_unidad=fk_estado , fk_tipo_vehiculo_unidad=fk_tipo_vehiculo, fk_entidadACargo=fk_entidadProp WHERE id_unidad=id;
ELSEIF tipoDeOperacion= 4 THEN
DELETE FROM tbl_unidad  WHERE id_unidad=id;
END IF;

END //
DELIMITER ;

/*
DROP DATABASE bomberosBD;
*/