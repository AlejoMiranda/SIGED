<?php

require_once("../model/Data.php");
require_once("../model/Tbl_Unidad.php");



session_start();


$idABuscar=$_REQUEST["idUnidad"];
echo $idABuscar;

$d= new Data();

$unidad=$d->getUnidadVehiculoPorId($idABuscar);
$mantenciones=$d->buscarMantencionesDeUnidad($idABuscar);
$carguios=$d->buscarCarguiosDeUnidad($idABuscar);



$_SESSION["unidadAVerSolicitada"] = $unidad;
$_SESSION["mantencionesAVerSolicitada"] = $mantenciones;
$_SESSION["carguiosAVerSolicitada"] = $carguios;
header("location:../verUnidad.php ");



?>
