<?php
require_once("../model/Data.php");
session_start();
$data = new Data();

$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";

if(isset($_SESSION["unidadesExtraAAgregar"])){
  $unidadesAAgregar=$_SESSION["unidadesExtraAAgregar"];
}else{
  $unidadesAAgregar=array();
}

if(isset($_SESSION["idDeServicioCreado"])){
  $idServicioCreado=$_SESSION["idDeServicioCreado"];

  $idTipoServ=$data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getServicio();
  $idTipoServ=$data->getIdDeTipoDeServicioAPartirDelCodigo($idTipoServ);
  $idSector=$data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getSector();
  $idSector=$data->getIdDeSectorAPartirDelNombre($idSector);
  $listadoDeUnidadesAEnviar=$data->determinarCarrosADespacharSegunCodigoDeServicioYSector($idTipoServ,$idSector);

}else{
  $listadoDeUnidadesAEnviar=array();
}

$unidad = $data->obtenerUnidadesDisponibles();
foreach ($unidad as $u) {
  if((!in_array($u->getIdUnidad(),$unidadesAAgregar)) && (!in_array($u->getIdUnidad(),$listadoDeUnidadesAEnviar))){
    echo "<option value='".$u->getIdUnidad()."'>";
        echo $u->getNombreUnidad();
    echo"</option>";
  }
}
?>
