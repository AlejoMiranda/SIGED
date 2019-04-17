<?php
session_start();

if(isset($_SESSION["nombreBomberoSeleccionado"])){
  unset($_SESSION["nombreBomberoSeleccionado"]);
}

if(isset($_SESSION["companiaBomberoSeleccionado"])){
  unset($_SESSION["companiaBomberoSeleccionado"]);
}

if(isset($_SESSION["estadoBomberoSeleccionado"])){
  unset($_SESSION["estadoBomberoSeleccionado"]);
}

if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
  unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
}


header("location:../buscarBombero.php ");

?>
