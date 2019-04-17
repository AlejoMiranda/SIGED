<?php
  require_once("../model/Data.php");
    $data = new Data();
    $emergenciasEnProgreso=$data->verificarExistenciaDeEmergenciasEnProgreso();
  echo $emergenciasEnProgreso;
 ?>
