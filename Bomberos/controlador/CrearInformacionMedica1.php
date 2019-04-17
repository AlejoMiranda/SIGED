<?php


require_once("../model/Data.php");

require_once("../model/Tbl_InfoMedica1.php");

session_start();

$idInformacionMedica1=$_REQUEST["cboBombero"];
$prestacionMedica_informacionMedica1=$_REQUEST["txtpresmedica"];
$alergias_informacionMedica1=$_REQUEST["txtalergias"];
$enfermedadesCronicasinformacionMedica1=$_REQUEST["txtenfermedadescronicas"];
$fkInfoPersonalinformacionMedica1=$_SESSION['idDeBomberoMasReciente'];

$infoMedica1=new Tbl_InfoMedica1();

$infoMedica1->setidInformacionMedica1($idInformacionMedica1);
$infoMedica1->setprestacionMedica_informacionMedica1($prestacionMedica_informacionMedica1);
$infoMedica1->setalergias_informacionMedica1($alergias_informacionMedica1);
$infoMedica1->setenfermedadesCronicasinformacionMedica1($enfermedadesCronicasinformacionMedica1);
$infoMedica1->setfkInfoPersonalinformacionMedica1($fkInfoPersonalinformacionMedica1);

$d= new Data();

$d->borrarRegistrosMedicos1SegunFkPersonal($fkInfoPersonalinformacionMedica1);
$d->crearInformacionMedica1($infoMedica1);

if(isset($_SESSION['seEstaModificandoUBombero'])){
  header("location: ../modificarBombero.php");
}
header("location: ../index.php");






?>
