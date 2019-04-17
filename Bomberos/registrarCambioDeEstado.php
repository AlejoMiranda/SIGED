<?php
require_once("model/Data.php");

$data = new Data();

$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";

$estado=$data->getEstadoActualDeOficial($id);

if($estado=="0-8"){
  $estado="0-9";
}elseif ($estado=="0-9") {
  $estado="0-8";
}

$data->ingresarCambioDeEstadoDeOficial($id,$estado);


?>
