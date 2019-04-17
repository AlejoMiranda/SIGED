<?php

require_once("../model/Data.php");
require_once("../model/Vista_BuscarMaterialMenor.php");

$tipoDeBusqueda=$_REQUEST["tipoDeBusqueda"];

session_start();

if($tipoDeBusqueda==1)
{

  $nombreABuscar=trim($_REQUEST["txtBuscaNombre"]);
  $id=1;
  $_SESSION["nombreMaterialSeleccionado"]=$nombreABuscar;

  if(isset($_SESSION["companiaMaterialSeleccionado"])){
    unset($_SESSION["companiaMaterialSeleccionado"]);
  }
  if(isset($_SESSION["estadoMaterialSeleccionado"])){
    unset($_SESSION["estadoMaterialSeleccionado"]);
  }
}else if($tipoDeBusqueda==2){

  $nombreABuscar="";
  $id=$_REQUEST["compania"];
  $_SESSION["companiaMaterialSeleccionado"]=$id;

  if(isset($_SESSION["estadoMaterialSeleccionado"])){
    unset($_SESSION["estadoMaterialSeleccionado"]);
  }
  if(isset($_SESSION["nombreMaterialSeleccionado"])){
    unset($_SESSION["nombreMaterialSeleccionado"]);
  }

}else if($tipoDeBusqueda==3){

  $nombreABuscar="";
  $id=$_REQUEST["estadoMaterial"];
  $_SESSION["estadoMaterialSeleccionado"]=$id;

  if(isset($_SESSION["nombreMaterialSeleccionado"])){
    unset($_SESSION["nombreMaterialSeleccionado"]);
  }
  if(isset($_SESSION["companiaMaterialSeleccionado"])){
    unset($_SESSION["companiaMaterialSeleccionado"]);
  }

}

echo $tipoDeBusqueda;
$d= new Data();

$resultados=$d->buscarMaterialMenorPorNombreCompaniaOBodega($nombreABuscar, $id, $tipoDeBusqueda);

$_SESSION["resultadosDeBusquedaDeMaterialMenor"] = $resultados;

header("location:../buscarInventario.php ");



?>
