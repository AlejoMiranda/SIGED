<?php
require_once("../model/Data.php");
require_once("../model/Tbl_InfoLaboral.php");

session_start();

$idInformacionLaboral=1;
$nombreEmpresainformacionLaboral=$_REQUEST["txtnomempresa"];
$direccionEmpresainformacionLaboral=$_REQUEST["txtdirecempresa"];
$telefonoEmpresainformacionLaboral=$_REQUEST["txttlfempresa"];
$cargoEmpresainformacionLaboral=$_REQUEST["txtcargo"];
$fechaIngresoEmpresainformacionLaboral=$_REQUEST["txfingresoempresa"];
$areaDeptoEmpresainformacionLaboral=$_REQUEST["txtareatrabajo"];
$afp_informacionLaboral=$_REQUEST["txtafp"];
$profesion_informacionLaboral=$_REQUEST["txtprofesion"];
$fkInfoPersonalinformacionLaboral=$_SESSION['idDeBomberoMasReciente'];

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

$d= new Data();

if(isset($_SESSION['seEstaModificandoUBombero'])){
  $d->actualizarInformacionLaboral($infoLaboral);
  header("location: ../modificarBombero.php");
}else{
  $d->actualizarInformacionLaboral($infoLaboral);
    header("location: ../CrearFicha.php");
}

?>
