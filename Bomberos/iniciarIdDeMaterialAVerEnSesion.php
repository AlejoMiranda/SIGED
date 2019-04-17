<?php

$data = isset($_REQUEST['idEnviado'])?$_REQUEST['idEnviado']:"";
session_start();
$_SESSION["idMaterialAVerSolicitado"]=$data;



?>
