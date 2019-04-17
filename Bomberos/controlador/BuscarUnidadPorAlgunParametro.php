<?php
require_once("../model/Data.php");
require_once("../model/VistaBusquedaDeUnidad.php");

session_start();

$tipoDeBusqueda=$_REQUEST["tipoDeBusqueda"];

if($tipoDeBusqueda==1)
{
  //busqueda por nombre
  $nombreABuscar=trim($_REQUEST["txtBuscarNombreUnidad"]);
  $id=1;
  $_SESSION["nombreUnidadSeleccionado"]=$nombreABuscar;

  if(isset($_SESSION["companiaUnidadSeleccionado"])){
    unset($_SESSION["companiaUnidadSeleccionado"]);
  }
  if(isset($_SESSION["estadoUnidadSeleccionado"])){
    unset($_SESSION["estadoUnidadSeleccionado"]);
  }

}else if($tipoDeBusqueda==2){
  //busqueda por estado de bombero
  $nombreABuscar="";
  $id=$_REQUEST["estadoUnidad"];
  $_SESSION["estadoUnidadSeleccionado"]=$id;


  if(isset($_SESSION["companiaUnidadSeleccionado"])){
    unset($_SESSION["companiaUnidadSeleccionado"]);
  }
  if(isset($_SESSION["nombreUnidadSeleccionado"])){
    unset($_SESSION["nombreUnidadSeleccionado"]);
  }

}else if($tipoDeBusqueda==3){
  //busqueda por compania
  $nombreABuscar="";
  $id=$_REQUEST["compania"];
  $_SESSION["companiaUnidadSeleccionado"]=$id;

  if(isset($_SESSION["nombreUnidadSeleccionado"])){
    unset($_SESSION["nombreUnidadSeleccionado"]);
  }
  if(isset($_SESSION["estadoUnidadSeleccionado"])){
    unset($_SESSION["estadoUnidadSeleccionado"]);
  }

}

echo $tipoDeBusqueda;
$d= new Data();

$resultados=$d->buscarUnidadPorNombreEstadoOCompania($nombreABuscar, $id, $tipoDeBusqueda);

$_SESSION["resultadosDeBusquedaDeUnidad"] = $resultados;


header("location:../buscarUnidades.php ");



?>
