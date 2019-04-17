<?php

require_once("../model/Data.php");

require_once("../model/Tbl_InfoPersonal.php");
require_once("../model/Tbl_Medida.php");
require_once("../model/Tbl_EstadoCivil.php");
require_once("../model/Tbl_Genero.php");



$d= new Data();


$talla_chaqueta = $_REQUEST["txtchaqueta"];
$talla_pantalon = $_REQUEST["txtpantalon"];
$talla_buzo = $_REQUEST["txtbuzo"];
$talla_calzado = $_REQUEST["txtcalzado"];




$medida = new Tbl_Medida();
$medida->setIdMedida(0);
$medida->setTallaChaquetaCamisa($talla_chaqueta);
$medida->setTallaPantalon($talla_pantalon);
$medida->setTallaBuzo($talla_buzo);
$medida->setTallaCalzado($talla_calzado);


$d->crearMedida($medida);

$id=$_REQUEST["idPersonal"];
$rut=$_REQUEST["txtRut"];
$nombre=$_REQUEST["txtNombre"];
$apellido_paterno=$_REQUEST["txtApePa"];
$apellido_materno=$_REQUEST["txtApeMa"];
$fecha_de_nacimiento=$_REQUEST["txtFecha"];
$fk_estado_civil=$_REQUEST["cboEstadoCivil"];
$fkMedida=0;//$_REQUEST[""];
$altura=$_REQUEST["txtaltura"];
$peso=$_REQUEST["txtpeso"];
$e_mail=$_REQUEST["txtemail"];
$fk_genero=$_REQUEST["cboGenero"];
$telefono_fijo=$_REQUEST["txtTelefonos"];
$telefono_movil=$_REQUEST["txtTelefonos"];
$direccion_personal=$_REQUEST["txtDireccion"];
$pertenecioABrigadaJuvenil=$_REQUEST["txtbrigada"];
$esInstructor=$_REQUEST["txtinstructor"];


$inforPersonal= new Tbl_InfoPersonal();

$inforPersonal->setIdInfoPersonal($id);
$inforPersonal->setRutInformacionPersonal($rut);
$inforPersonal->setNombreInformacionPersonal($nombre);
$inforPersonal->setApellidoPaterno($apellido_paterno);
$inforPersonal->setApellidoMaterno($apellido_materno);
$inforPersonal->setFechaNacimiento($fecha_de_nacimiento);
$inforPersonal->setFkEstadoCivil($fk_estado_civil);
$inforPersonal->setFkMedidaInformacionPersonal($fkMedida);
$inforPersonal->setAlturaEnMetros($altura);
$inforPersonal->setPeso($peso);
$inforPersonal->setEmail($e_mail);
$inforPersonal->setFkGenero($fk_genero);
$inforPersonal->setTelefonoFijo($telefono_fijo);
$inforPersonal->setTelefonoMovil($telefono_movil);
$inforPersonal->setDireccionPersonal($direccion_personal);
$inforPersonal->setPertenecioABrigadaJuvenil($pertenecioABrigadaJuvenil);
$inforPersonal->setEsInstructor($esInstructor);

$d->actualizarInformacionPersonalDeBombero($inforPersonal);


header("location: CargarFichaAModificar.php");

?>
