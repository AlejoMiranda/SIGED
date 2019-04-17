<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="javascript/borrarResultadosDeBusqueda.js"></script>
  </head>
  <?php
 require_once("model/Data.php");
 require_once("model/Tbl_Usuario.php");
 $dataUsuario= new Data();
 session_start();
 if($_SESSION["usuarioIniciado"]!=null){
   $u=$_SESSION["usuarioIniciado"];
   if($dataUsuario->verificarSiUsuarioTienePermiso($u,24)==0){
     header("location: paginaError.php");
   }
 }

 if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
   unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
 }

 if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
   unset($_SESSION["resultadosDeBusquedaDeUnidad"]);;
 }

 if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
   unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);;;
 }
 ?>
  <body  background="images/fondointranet_opt.jpg" width="100%" height="100" >

    <br>
    <br>
    <br>
    <br>
    <div class="container" style="width: 589px" style="height: 200px">
            <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" >
                <div class="container" >
                    <h3>Sistema Bomberos</h3>


                    <br>
                    <form action="controlador/CrearUsuario.php" method="post" class="form-inline">

                      <?php
                          // unir vista con el modelo sin pasar por un controlador
                          require_once("model/Data.php");
                          $data = new Data();

                      ?>
                        <div class="form-group">
                         &nbsp;&nbsp;Nombre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <input id="inputid" type="text" name="txtnombre" placeholder="EJ: nombre" required="" class="form-control" style="width: 250px; text-align: center">

                         <br>
                         <br>
                         &nbsp;&nbsp;Contraseña: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <input id="pass" type="password" name="usu_password" placeholder="********" max="8" required="" class="form-control" style="width: 250px; text-align: center">
                         <br>
                         <br>
                         &nbsp; Repita Contraseña:    <input id="pass" type="password" name="usu_confirm" placeholder="********" max="8" required class="form-control" style="width: 250px; text-align: center">

                         <br>
                         <br>
                         &nbsp;&nbsp;Perfil: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <select name="perfiles">
                           <?php
                               $perfil = $data->getPerfiles();
                               foreach ($perfil as $p) {
                                   echo "<option value='".$p->getidTipoUsuario()."'>";
                                       echo utf8_encode($p->getnombreTipoUsuario());
                                   echo"</option>";
                               }
                           ?>
                         </select>
                           <input type="submit" value="Crear"  name="btnAceptar" class="btn button-primary" style="width: 55px;" onclick="validarcontrasenia()">


                           <button class="btn button-primary" style="width: 57px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>
                     </div>

                    </form>

                </div>
            </div>

        </div>

        <script src="javascript/JQuery.js"></script>

        <script type="text/javascript">

          /*  $("form").submit(function(){
              alert("Operación exitosa");
            });*/

              function validarcontrasenia(){

                  if("usu_confirm" != "usu_password"){

                    $("form").submit(function(){
                      alert("Las contraseñas no coinciden");
                      });

                    $("#inputid").focus();

                  }

              }


                  $("form").submit(function(){
                    alert("Operación exitosa");
                    });





        </script>




  </body>
</html>
