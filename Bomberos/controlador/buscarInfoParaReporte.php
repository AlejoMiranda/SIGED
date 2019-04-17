<?php
require_once ("../model/Data.php");
require_once ("../model/Vista_BusquedaBombero.php");

session_start();
// busqueda por nombre
$nombreABuscar = trim($_REQUEST["txtBuscar"]);
$_SESSION["nombreBomberoSeleccionado"] = $nombreABuscar;

$d = new Data();

$resultados = $d->buscarInformacionDeBomberoByNombre($nombreABuscar);

$_SESSION["resultadosDeBusquedaDeBomberoByNombre"] = $resultados;

header("location:../reporteBombero.php ");
?>