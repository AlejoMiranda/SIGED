<?php
if(isset($_POST["btnAceptar"])){//if usuario presiona boton
    //rescatar datos

    if($_POST["usu_password"]==$_POST["usu_confirm"]){

      $nombreUsuario = $_REQUEST["txtnombre"];
      $passUsuario = $_REQUEST["usu_password"];
      $perfil = $_REQUEST["perfiles"];
      //Construir un objeto con esos datos
      require_once("../model/Tbl_Usuario.php");
      require_once("../model/Tbl_TipoUsuario.php");
      require_once("../model/Data.php");

      $usuario = new Tbl_Usuario();
      //"seteo" los datos
      $usuario->setNombreUsuario($nombreUsuario);
      $usuario->setfkTipoUsuario($perfil);
      $usuario->setPassUsuario($passUsuario);


      $data = new Data();
      $data->crearUsuario($usuario);

      header("location: ../Mantenedor.php");

      }else{


        header("location: ../crearUsuario.php");
        echo "Contraseñas no coinciden";

      }

}


 ?>
