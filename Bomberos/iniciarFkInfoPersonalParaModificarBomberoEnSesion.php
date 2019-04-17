<?php

$data = isset($_REQUEST['idParaModificar'])?$_REQUEST['idParaModificar']:"";
session_start();
$_SESSION["idAModificar"]=$data;



?>
