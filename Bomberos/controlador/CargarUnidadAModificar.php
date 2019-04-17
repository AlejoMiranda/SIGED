<?php

require_once("../model/Data.php");

session_start();


$idABuscar=$_REQUEST["idDeUnidadAModificar"];


$d= new Data();

$unidadAModificar=$d->getUnidadPorId($idABuscar);

$mantenciones=$d->buscarMantencionesDeUnidad($idABuscar);
$carguios=$d->buscarCarguiosDeUnidad($idABuscar);

$_SESSION["unidadAModificar"] = $unidadAModificar;
$_SESSION["mantenciones"] = $mantenciones;
$_SESSION["carguios"] = $carguios;

header("location:../modificarUnidades.php ");



?>
