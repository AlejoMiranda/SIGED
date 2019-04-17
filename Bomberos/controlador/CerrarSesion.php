<?php
session_start();
  session_destroy();
  unset($_SESSION["txtNombre"]);
  unset($_SESSION["txtNombre"]);
  unset($_SESSION["usuarioIniciado"]);
  header("location: ../index.html");

?>
