<?php
  require_once("../model/Data.php");
  $data = new Data();

  $idServicio= isset($_REQUEST['idServicioACerrar'])?$_REQUEST['idServicioACerrar']:"";

  $listadoDeUnidades=$data->getIdDeUnidadesInvolucradasEnServicio($idServicio);

  foreach ($listadoDeUnidades as $l => $idUnidad) {
    $data->actualizarEstadoDeEmergenciaDeMaquina($idUnidad,1);
  }
  $data->cerrarServicio($idServicio);
 ?>
