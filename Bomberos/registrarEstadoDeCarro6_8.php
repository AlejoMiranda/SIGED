<?php
require_once("model/Data.php");
$data = new Data();

$id = isset($_REQUEST['identificadorDeEmergencia'])?$_REQUEST['identificadorDeEmergencia']:"";

$data->registrar6_8UnidadEnEmergencia($id);
$idUnidad=$data->getUnidadInvolucradaEnEmergencia($id);
$data->actualizarEstadoDeEmergenciaDeMaquina($idUnidad,1);

$diaYHora= $data->getHora6_8($id);

$fragmentos = explode(" ", $diaYHora);
$hora= $fragmentos[1];

echo $hora;

?>
