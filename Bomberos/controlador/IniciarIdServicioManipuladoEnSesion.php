<?php
require_once("../model/Data.php");
session_start();

$d= new Data();

$idSer=$_REQUEST["idServicioSeleccionado"];

$_SESSION["idDeServicioQueSeEstaManipulando"]=$idSer;

//ojo que este header hace que se muestre todo el codigo de la pagina de central de alarma en los console.log de js
header("location: ../centraldeAlarma.php");
?>
