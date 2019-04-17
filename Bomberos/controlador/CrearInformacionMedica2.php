<?php


require_once("../model/Data.php");

require_once("../model/Tbl_InfoMedica2.php");
require_once("../model/Tbl_GrupoSanguineo.php");
require_once("../model/Parentesco.php");
require_once("../model/Tbl_InfoPersonal.php");


session_start();

 $idInformacionMedica2=0;
 $medicamentosHabitualesinformacionMedica2=$_REQUEST["txtmedicamentosHabituales"];
 $nombreContactoinformacionMedica2=$_REQUEST["txtnomContacto"];
 $telefonoContactoinformacionMedica2=$_REQUEST["txttlfcontacto"];
 $fkParentescoContactoinformacionMedica2=$_REQUEST["cboParentesco1"];
 $nivelActividadFisicainformacionMedica2=$_REQUEST["txtactvfisica"];
 $esDonanteinformacionMedica2=$_REQUEST["txtdonante"];
 $esFumadorinformacionMedica2=$_REQUEST["txtfumador"];
 $fkGrupoSanguineoinformacionMedica2=$_REQUEST["cboGrupoSanguineo"];
 $fkInfoPersonalinformacionMedica2=$_SESSION['idDeBomberoMasReciente'];


$infoMedica2=new Tbl_InfoMedica2();

$infoMedica2->setidInformacionMedica2($idInformacionMedica2);
$infoMedica2->setmedicamentosHabitualesinformacionMedica2($medicamentosHabitualesinformacionMedica2);
$infoMedica2->setnombreContactoinformacionMedica2($nombreContactoinformacionMedica2);
$infoMedica2->settelefonoContactoinformacionMedica2($telefonoContactoinformacionMedica2);
$infoMedica2->setfkParentescoContactoinformacionMedica2($fkParentescoContactoinformacionMedica2);
$infoMedica2->setnivelActividadFisicainformacionMedica2($nivelActividadFisicainformacionMedica2);
$infoMedica2->setesDonanteinformacionMedica2($esDonanteinformacionMedica2);
$infoMedica2->setesFumadorinformacionMedica2($esFumadorinformacionMedica2);
$infoMedica2->setfkGrupoSanguineoinformacionMedica2($fkGrupoSanguineoinformacionMedica2);
$infoMedica2->setfkInfoPersonalinformacionMedica2($fkInfoPersonalinformacionMedica2);


$d= new Data();

$d->borrarRegistrosMedicos2SegunFkPersonal($fkInfoPersonalinformacionMedica2);
$d->crearInformacionMedica2($infoMedica2);

if(isset($_SESSION['seEstaModificandoUBombero'])){
  header("location: ../modificarBombero.php");
}
header("location: ../index.php");
?>
