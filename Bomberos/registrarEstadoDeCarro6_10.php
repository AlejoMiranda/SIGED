<?php
require_once("model/Data.php");
$data = new Data();

$id = isset($_REQUEST['identificadorDeEmergencia'])?$_REQUEST['identificadorDeEmergencia']:"";

$data->registrar6_10UnidadEnEmergencia($id);

$diaYHora= $data->getHora6_10($id);

$fragmentos = explode(" ", $diaYHora);
$hora= $fragmentos[1];

echo $hora;

?>
