<?php
require_once("model/Data.php");
$data = new Data();

$id = isset($_REQUEST['identificadorDeEmergencia'])?$_REQUEST['identificadorDeEmergencia']:"";

$data->registrar6_0UnidadEnEmergencia($id);
// se registra la acutalización primero, y DESPUÉS se muestra

$diaYHora= $data->getHora6_0($id);

$fragmentos = explode(" ", $diaYHora);
$hora= $fragmentos[1];

echo $hora;

?>
