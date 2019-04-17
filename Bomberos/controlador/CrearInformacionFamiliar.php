<?php
require_once("../model/Data.php");

require_once("../model/Tbl_InfoFamiliar.php");
require_once("../model/Tbl_Parentesco.php");
require_once("../model/Tbl_InfoPersonal.php");

session_start();

$idInformacionFamiliar=0;
$nombresInformacionFamiliar=$_REQUEST["txtnombreFamiliar"];
$fechaNacimientoInformacionFamiliar=$_REQUEST["txtfechafamiliar"];
$fkParentescoinformacionFamiliar=$_REQUEST["cboParentesco2"];
$fkInfoPersonalinformacionFamiliar=$_SESSION['idDeBomberoMasReciente'];

$infoFamiliar=new Tbl_InfoFamiliar();

$infoFamiliar->setIdInformacionFamiliar($idInformacionFamiliar);
$infoFamiliar->setNombresInformacionFamiliar($nombresInformacionFamiliar);
$infoFamiliar->setFechaNacimientoInformacionFamiliar($fechaNacimientoInformacionFamiliar);
$infoFamiliar->setfkParentescoinformacionFamiliar($fkParentescoinformacionFamiliar);
$infoFamiliar->setfkInfoPersonalinformacionFamiliar($fkInfoPersonalinformacionFamiliar);

$d= new Data();

$d->crearInformacionFamiliar($infoFamiliar);

if(isset($_SESSION['seEstaModificandoUBombero'])){
  header("location: CargarFichaAModificar.php");
}else{
    header("location: ../CrearFicha.php");
}







?>
