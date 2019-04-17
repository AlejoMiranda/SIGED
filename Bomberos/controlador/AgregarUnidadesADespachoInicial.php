<?php
session_start();
$idUnidadAAgregar = isset($_REQUEST['idDeUnidadAAgregar'])?$_REQUEST['idDeUnidadAAgregar']:"";

if(isset($_SESSION["unidadesExtraAAgregar"])){
  $listadoDeUnidadesAAgregar=$_SESSION["unidadesExtraAAgregar"];
  $listadoDeUnidadesAAgregar[]=$idUnidadAAgregar;
  $_SESSION["unidadesExtraAAgregar"]=$listadoDeUnidadesAAgregar;
  echo "Agregado id: ".$idUnidadAAgregar;
}else{
  $listadoDeUnidadesAAgregar= array();
  $listadoDeUnidadesAAgregar[]=$idUnidadAAgregar;
  $_SESSION["unidadesExtraAAgregar"]=$listadoDeUnidadesAAgregar;
  echo "Creado array y agregado id: ".$idUnidadAAgregar;
}

?>
