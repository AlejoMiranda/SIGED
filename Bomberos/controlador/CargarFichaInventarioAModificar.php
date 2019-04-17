<?php

require_once("../model/Data.php");
require_once("../model/Tbl_MaterialMenor.php");



session_start();


$idABuscar=$_SESSION["idMaterialAModificarSolicitado"];


$d= new Data();

$materialMenor=$d->buscarMaterialMenorPorId($idABuscar);


$_SESSION["materialMenorAModificarSolicitado"] = $materialMenor;
header("location:../modificarInventario.php ");



?>
