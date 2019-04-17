<?php
require_once("model/Data.php");
$data = new Data();

$idServicioUni = isset($_REQUEST['idServicioUnidad'])?$_REQUEST['idServicioUnidad']:"";

$nombreOBAC = isset($_REQUEST['nombreOBAC'])?$_REQUEST['nombreOBAC']:"";
$nombreConductor = isset($_REQUEST['nombreConductor'])?$_REQUEST['nombreConductor']:"";
$cantidadBomberos = isset($_REQUEST['cantidadPersonal'])?$_REQUEST['cantidadPersonal']:"";


$data->actualizarOBACConductorYNPersonalServicioUnidad($nombreOBAC, $nombreConductor, $cantidadBomberos, $idServicioUni );
?>
