<?php
require_once("model/Data.php");
$data = new Data();
$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";

$cantidad = $data->getStockDeMaterial($id);

echo $cantidad;
?>
