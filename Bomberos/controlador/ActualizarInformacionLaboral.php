<?php


require_once("../model/Data.php");
require_once("../model/Tbl_InfoLaboral.php");


$idInformacionLaboral=$_REQUEST["idLaboral"];
$nombreEmpresainformacionLaboral=$_REQUEST["txtnomempresa"];
$direccionEmpresainformacionLaboral=$_REQUEST["txtdirecempresa"];
$telefonoEmpresainformacionLaboral=$_REQUEST["txttlfempresa"];
$cargoEmpresainformacionLaboral=$_REQUEST["txtcargo"];
$fechaIngresoEmpresainformacionLaboral=$_REQUEST["txfingresoempresa"];
$areaDeptoEmpresainformacionLaboral=$_REQUEST["txtareatrabajo"];
$afp_informacionLaboral=$_REQUEST["txtafp"];
$profesion_informacionLaboral=$_REQUEST["txtprofesion"];
$fkInfoPersonalinformacionLaboral=$_REQUEST["idPersonal"];

$infoLaboral=new Tbl_InfoLaboral();
$infoLaboral->setIdidInformacionLaboral($idInformacionLaboral);
$infoLaboral->setnombreEmpresainformacionLaboral($nombreEmpresainformacionLaboral);
$infoLaboral->setdireccionEmpresainformacionLaboral($direccionEmpresainformacionLaboral);
$infoLaboral->settelefonoEmpresainformacionLaboral($telefonoEmpresainformacionLaboral);
$infoLaboral->setcargoEmpresainformacionLaboral($cargoEmpresainformacionLaboral);
$infoLaboral->setfechaIngresoEmpresainformacionLaboral($fechaIngresoEmpresainformacionLaboral);
$infoLaboral->setareaDeptoEmpresainformacionLaboral($areaDeptoEmpresainformacionLaboral);
$infoLaboral->setafp_informacionLaboral($afp_informacionLaboral);
$infoLaboral->setprofesion_informacionLaboral($profesion_informacionLaboral);
$infoLaboral->setfkInfoPersonalinformacionLaboral($fkInfoPersonalinformacionLaboral);

$d=new Data();
$d->actualizarInformacionLaboral($infoLaboral);

header("location: CargarFichaAModificar.php");?>
