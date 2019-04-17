<?php

require_once("../model/Data.php");
require_once("../model/Vista_BusquedaBombero.php");

$tipoDeBusqueda=$_REQUEST["tipoDeBusqueda"];

session_start();

if($tipoDeBusqueda==1)
{
  //busqueda por nombre
  $nombreABuscar=trim($_REQUEST["txtBuscar"]);
  $id=1;
  $_SESSION["nombreBomberoSeleccionado"]=$nombreABuscar;

  if(isset($_SESSION["estadoBomberoSeleccionado"])){
    unset($_SESSION["estadoBomberoSeleccionado"]);
  }
  if(isset($_SESSION["companiaBomberoSeleccionado"])){
    unset($_SESSION["companiaBomberoSeleccionado"]);
  }


}else if($tipoDeBusqueda==2){
  //busqueda por estado de bombero
  $nombreABuscar=$_REQUEST["txtBuscar"];
  $id=$_REQUEST["estadoBombero"];
  $_SESSION["estadoBomberoSeleccionado"]=$id;

  if(isset($_SESSION["nombreBomberoSeleccionado"])){
    unset($_SESSION["nombreBomberoSeleccionado"]);
  }
  if(isset($_SESSION["companiaBomberoSeleccionado"])){
    unset($_SESSION["companiaBomberoSeleccionado"]);
  }

}else if($tipoDeBusqueda==3){
  //busqueda por compania
  $nombreABuscar=$_REQUEST["txtBuscar"];
  $id=$_REQUEST["compania"];
  $_SESSION["companiaBomberoSeleccionado"]=$id;

  if(isset($_SESSION["estadoBomberoSeleccionado"])){
    unset($_SESSION["estadoBomberoSeleccionado"]);
  }
  if(isset($_SESSION["nombreBomberoSeleccionado"])){
    unset($_SESSION["nombreBomberoSeleccionado"]);
  }

}

$d= new Data();

$resultados=$d->buscarInformacionDeBomberoParaTabla($nombreABuscar, $id, $tipoDeBusqueda);

$_SESSION["resultadosDeBusquedaDeBomberos"] = $resultados;

header("location:../buscarBombero.php ");
?>
