<?php


require_once("../model/Data.php");

require_once("../model/Tbl_InfoFamiliar.php");
require_once("../model/Tbl_Parentesco.php");
require_once("../model/Tbl_InfoPersonal.php");


/*
require_once("../model/Tbl_comuna.php");
require_once("../model/Tbl_EntrenamientoEstandar.php");
require_once("../model/Tbl_EstadoCurso.php");
require_once("../model/Tbl_GrupoSanguineo.php");
require_once("../model/Tbl_InfoAcademica.php");
require_once("../model/Tbl_InfoBomberil.php");
require_once("../model/Tbl_InfoFamiliar.php");
require_once("../model/Tbl_InfoHistorica.php");
require_once("../model/Tbl_InfoLaboral.php");
require_once("../model/Tbl_InfoMedica1.php");
require_once("../model/Tbl_InfoMedica2.php");
require_once("../model/Parentesco.php");
require_once("../model/Provincia.php");
*/


$idInformacionFamiliar=$_REQUEST["idFamil"];
$nombresInformacionFamiliar=$_REQUEST["txtnombreFamiliar"];
$fechaNacimientoInformacionFamiliar=$_REQUEST["txtfechafamiliar"];
$fkParentescoinformacionFamiliar=$_REQUEST["cboParentesco2"];
$fkInfoPersonalinformacionFamiliar=$_REQUEST["idPersonalFamiliar"];


$infoFamiliar=new Tbl_InfoFamiliar();

$infoFamiliar->setIdInformacionFamiliar($idInformacionFamiliar);
$infoFamiliar->setNombresInformacionFamiliar($nombresInformacionFamiliar);
$infoFamiliar->setFechaNacimientoInformacionFamiliar($fechaNacimientoInformacionFamiliar);
$infoFamiliar->setfkParentescoinformacionFamiliar($fkParentescoinformacionFamiliar);
$infoFamiliar->setfkInfoPersonalinformacionFamiliar($fkInfoPersonalinformacionFamiliar);

$d= new Data();

$d->actualizarInformacionFamiliar($infoFamiliar);


 header("location: ../verFicha.php");






?>
