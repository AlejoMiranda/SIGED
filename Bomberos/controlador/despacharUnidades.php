<?php
require_once("../Model/Data.php");
session_start();
$data = new Data();

function deleteElement($element, &$array){
    $index = array_search($element, $array);
    if($index !== false){
        unset($array[$index]);
    }
}

if(isset($_SESSION["idDeServicioCreado"])){
 $idServicio=$_SESSION["idDeServicioCreado"];

  $idTipoDeServicio=$_REQUEST["tipoServicio"];
  $idSector=$_REQUEST["sector"];
  $listadoDeUnidadesAEnviar=array();
  $listadoDeUnidadesAEnviar=$data->determinarCarrosADespacharSegunCodigoDeServicioYSector($idTipoDeServicio,$idSector);

  foreach ($listadoDeUnidadesAEnviar as $lis => $unidad) {

    $disponibilidad=$data->getEstadoDeEmergenciaDeLaUnidad($unidad);
    if($disponibilidad!=1){

      deleteElement($unidad, $listadoDeUnidadesAEnviar);
    }else{

      $data->registrarDespachoEnviado($idServicio,$unidad);
      $data->actualizarEstadoDeEmergenciaDeMaquina($unidad,2);
    }
  }


if(isset($_SESSION["unidadesExtraAAgregar"])){
  $listadoDeUnidadesExtra=$_SESSION["unidadesExtraAAgregar"];

  foreach ($listadoDeUnidadesExtra as $lue => $unidadExtra) {
    $data->registrarDespachoEnviado($idServicio,$unidadExtra);
    $data->actualizarEstadoDeEmergenciaDeMaquina($unidadExtra,2);
  }
  unset($_SESSION["unidadesExtraAAgregar"]);

}

  unset($_SESSION["idDeServicioCreado"]);
}




 header("location: ../centralDeDespacho.php");
?>
