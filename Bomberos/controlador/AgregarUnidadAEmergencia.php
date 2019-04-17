<?php
require_once("../model/Data.php");
$data= new Data();
session_start();
$idUnidadAAgregar = isset($_REQUEST['idUnidadExtra'])?$_REQUEST['idUnidadExtra']:"";
$idServicio= isset($_REQUEST['idEmergencia'])?$_REQUEST['idEmergencia']:"";

$data->registrarDespachoEnviado($idServicio,$idUnidadAAgregar);
$data->actualizarEstadoDeEmergenciaDeMaquina($idUnidadAAgregar,2);
?>
