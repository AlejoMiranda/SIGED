<?php
if (isset($_POST['btnIniciarSesion'])) {
    require_once("../model/Conexion.php");
    require_once("../model/Data.php");

    $nombre = $_REQUEST["txtNombre"];
    $contrasenia = $_REQUEST["txtpass"];

    $d = new Data();

    $usuario = $d->getUsuario($nombre,$contrasenia);


      if ($usuario == null) {



         header("location: ../index.html");


       } else {

          session_start();
          $_SESSION["txtNombre"] = serialize($usuario);
          $_SESSION["usuarioIniciado"] = $usuario;

         header("location: ../Mantenedor.php");

      }

}
?>
