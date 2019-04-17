<?php
session_start();

if(isset($_SESSION["nombreUnidadSeleccionado"])){
  unset($_SESSION["nombreUnidadSeleccionado"]);
}

if(isset($_SESSION["companiaUnidadSeleccionado"])){
  unset($_SESSION["companiaUnidadSeleccionado"]);
}

if(isset($_SESSION["estadoUnidadSeleccionado"])){
  unset($_SESSION["estadoUnidadSeleccionado"]);
}

if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
  unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
}

header("location:../buscarUnidades.php ");

?>
