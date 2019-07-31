<?php
require_once("../model/Data.php");
$d= new Data();

$idServicio=$_REQUEST["idServicio"];
$detalle=$_REQUEST["detalle"];

$d->agregarDetalle($idServicio, $detalle);



?>
