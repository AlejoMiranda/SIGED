<?php
require_once("../model/Data.php");
require_once("../model/Tbl_InfoHistorica.php");
require_once("../model/Tbl_InfoPersonal.php");
require_once("../model/Tbl_Region.php");
session_start();

 $idInformacionHistorica=1;
 $fkRegioninformacionHistorica=$_REQUEST["cboxRegion"];
 $cuerpo=$_REQUEST["txtcuerpoHistorico"];
 $compania=$_REQUEST["txtCompania"];
 $fechaDeCambio=$_REQUEST["txtfechaCambioInfoHistorica"];
 $premio=$_REQUEST["txtPremioInforHistorica"];
 $motivo=$_REQUEST["txtMotivo"];
 $detalle=$_REQUEST["txtDetalleHistorico"];
 $cargo=$_REQUEST["cboxCargo"];
 $fkInfoPersonalinformacionHistorica=$_SESSION['idDeBomberoMasReciente'];

$infoHistorica=new Tbl_InfoHistorica();

$infoHistorica->setIdInformacionHistorica($idInformacionHistorica);
$infoHistorica->setfkRegioninformacionHistorica($fkRegioninformacionHistorica);
$infoHistorica->setcuerpo($cuerpo);
$infoHistorica->setcompania($compania);
$infoHistorica->setfechaDeCambio($fechaDeCambio);
$infoHistorica->setPremio($premio);
$infoHistorica->setmotivo($motivo);
$infoHistorica->setdetalle($detalle);
$infoHistorica->setCargo($cargo);
$infoHistorica->setfkInfoPersonalinformacionHistorica($fkInfoPersonalinformacionHistorica);

$d= new Data();

$d->crearInformacionHistorica($infoHistorica);

if(isset($_SESSION['seEstaModificandoUBombero'])){
  header("location: CargarFichaAModificar.php");
}else{
    header("location: ../CrearFicha.php");
}
?>
