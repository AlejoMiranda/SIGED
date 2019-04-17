<?php

require_once("../model/Data.php");
require_once("../model/Tbl_Unidad.php");



session_start();


$idABuscar=$_SESSION["idDeLaUnidadQuSeVaModificar"];
echo $idABuscar;

$d= new Data();

$unidad=$d->getUnidadVehiculoPorId($idABuscar);


$_SESSION["unidadAModificarSolicitada"] = $unidad;
header("location:../modificarUnidades.php ");



?>
