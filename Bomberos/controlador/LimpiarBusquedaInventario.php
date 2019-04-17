<?php
session_start();

if(isset($_SESSION["nombreMaterialSeleccionado"])){
  unset($_SESSION["nombreMaterialSeleccionado"]);
}

if(isset($_SESSION["companiaMaterialSeleccionado"])){
  unset($_SESSION["companiaMaterialSeleccionado"]);
}

if(isset($_SESSION["estadoMaterialSeleccionado"])){
  unset($_SESSION["estadoMaterialSeleccionado"]);
}

if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
  unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
}

header("location:../buscarInventario.php ");

?>
