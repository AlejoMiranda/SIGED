<?php

require_once("../model/Data.php");
require_once("../model/Tbl_InfoBomberil.php");
require_once("../model/Tbl_InfoPersonal.php");
require_once("../model/Tbl_Region.php");
require_once("../model/Tbl_EstadoBombero.php");
require_once("../model/Tbl_Cargo.php");


//Hay que poner un hidden que tenga el id de la informacionBomberil a modificar
$d= new Data();

$id=$_REQUEST["idBomberil"];;
$fk_region=$_REQUEST["cboRegion"];
$cuerpo=$_REQUEST["txtcuerpo"];
$fk_compania=$_REQUEST["compania"];
$fk_cargo=$_REQUEST["cboCargo"];
$fecha_ingreso=$_REQUEST["txtfingreso"];
$nrg=$_REQUEST["txtgeneral"];
$fk_estado=$_REQUEST["cboEstadoBombero"];
$nrc=$_REQUEST["txtcia"];
$fk_infoPersonal=$_REQUEST["idPersonal"];


$infoBomberil= new Tbl_InfoBomberil();

$infoBomberil->setIdInformacionBomberil($id);
$infoBomberil->setfkRegioninformacionBomberil($fk_region);
$infoBomberil->setcuerpoInformacionBomberil($cuerpo);
$infoBomberil->setfkCompaniainformacionBomberil($fk_compania);
$infoBomberil->setfkCargoinformacionBomberil($fk_cargo);
$infoBomberil->setfechaIngresoinformacionBomberil($fecha_ingreso);
$infoBomberil->setNRegGeneralinformacionBomberil($nrg);
$infoBomberil->setfkEstadoinformacionBomberil($fk_estado);
$infoBomberil->setNRegCiainformacionBomberil($nrc);
$infoBomberil->setfkInfoPersonalinformacionBomberil($fk_infoPersonal);

$d->actualizarInformacionBomberil($infoBomberil);

header("location: CargarFichaAModificar.php");
?>
