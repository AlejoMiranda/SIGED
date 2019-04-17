<?php
require_once("../model/Data.php");

$d= new Data();
session_start();
$fkServicio=$_SESSION["idDeServicioCreado"];

$d->crearDespachoInicial($fkServicio);

header("location: ../centraldeDespacho.php");
?>
