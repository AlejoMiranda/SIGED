<?php
require_once("../model/Data.php");
$d= new Data();
$idServicio=$_REQUEST["idServicio"];

$idEntidadExterna=$_REQUEST["entidad"];
$responsable=$_REQUEST["res"];;
$ppu=$_REQUEST["ppuu"];;

$d->crearNuevoApoyo($idEntidadExterna, $responsable, $ppu);
$idApoyo=$d->getIDApoyoMasReciente();

$d->agregarEntidadExteriorComoApoyo($idServicio,$idApoyo);



?>
