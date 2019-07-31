<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mantenedor</title>


    <link rel ="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
   <script src="js/bootstrap.js"></script>

  </head>

  <?php
require_once("model/Data.php");
require_once("model/Tbl_Usuario.php");
$dataUsuario= new Data();
session_start();
if($_SESSION["usuarioIniciado"]!=null){
  $u=$_SESSION["usuarioIniciado"];
  if($dataUsuario->verificarSiUsuarioTienePermiso($u,5)==0){
    header("location: paginaError.php");
  }
}

if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
  unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
}

if(isset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"])){
    unset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"]);
}

if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
  unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
}

if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
  unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
}
?>

<body  background="images/fondofichaintranet.jpg">

    <br>
    <nav class="navbar navbar-default nav-stacked  navbar-pills" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="Mantenedor.php" class="navbar-brand" href="#">SIGED</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bomberos <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="CrearFicha.php">Crear</a></li>
              <li><a href="buscarBombero.php">Buscar</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unidades <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="crearUnidades.php">Crear</a></li>
              <li><a href="buscarUnidades.php">Buscar Unidades</a></li>
              <li><a href="bitacoraUnidad.php">Bitacora</a></li>
              <li><a href="buscarBitacora.php">Buscar Bitacora</a></li>

            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventario <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="crearInventario.php" >Crear</a></li>
              <li><a href="buscarInventario.php">Buscar </a></li>


            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Despacho <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="centraldeAlarma.php">Central de Alarma</a></li>
              <li><a href="Comunicaciones.php">Comunicaciones</a></li>

            </ul>
          </li>
        </ul>
        
        <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporte <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="reporteBombero.php">Bombero</a></li>
            <li><a href="reporteInventario.php">Inventario</a></li>
            <li><a href="reporteUnidad.php">Unidad</a></li>
            <li><a href="reporteDespacho.php">Despacho</a></li>
            

          </ul>
        </li>
      </ul>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <button class="btn btn-default" style="width: 150px;" style="margin-top: 400px"> <a href="crearUsuario.php" style="text-decoration:none;color:black;">Crear Usuario</a> </button>

        <br>
        <br>
        <button class="btn btn-danger" style="width: 150px;" style="margin-top: 400px"> <a href="controlador/CerrarSesion.php" style="text-decoration:none;color:black;">Cerrar Sesion</a> </button>





      </div><!-- /.navbar-collapse -->
    </nav>

  <div class = "cuerpo" style="
    margin-left: 20%;
    float: left;
    width: 75%;
    padding-left: 5%;
    padding-top: -100%;
    margin-top: -800px;
    margin-bottom: -1000px;
    ">

<style>

#transparencia{
    opacity: .85;
    -moz-opacity: .85;
    filter: alpha(opacity=85);

}

</style>
<?php
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    $data = new Data();

?>

<div style="width: 800px" style="height: 900px">
    <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
      <div class="container">

              <span><h4 style="font-weight:bold;margin-left:300px;">Buscar Bitacora</h4></span>

      <div class="form-group" style="margin-left:50px;">
        <span><h5 style="font-weight:bold;">Buscar por Fecha</h5></span>
        <form action="" method="post">

        <input type="date" name="txtBuscar"  value="<?php echo date('Y-m-d'); ?>"placeholder="Buscar por fecha" style="height:30px;width: 175px;" >

        <input type="hidden" name="tipoDeBusqueda" value="1">
        <input class="btn btn-default" type="submit" name="btnInfoPersonal" value="Buscar" class="btn button-primary" style="width: 100px; height:30px;" style="margin-top: 400px;" onclick="porNombre()">
      <!--  <button class="btn btn-default" name="btnBuscar" style="width: 100px; height:30px;" style="margin-top: 400px"> <a href="·" style="text-decoration:none;color:black;">Buscar</a> </button> -->
    </form>

        <form action="" method="post">
        <span><h5 style="font-weight:bold;">Tipo de Servicio</h5></span>
              <select name="tipoServicio" style="width:175px; height:30px;">
                <?php
                    $tipoBombero = $data->readTiposDeServicios();
                    foreach ($tipoBombero as $tb) {
                        echo "<option value='".$tb->getId_tipo_servicio()."'>";
                            echo utf8_encode($tb->getNombre_tipo_servicio());
                        echo"</option>";
                    }
                ?>
              </select>
              <input type="hidden" name="tipoDeBusqueda" value="2">
              <input class="btn btn-default" type="submit" name="btnInfoPersonal" value="Buscar" class="btn button-primary" style="width: 100px; height:30px;" style="margin-top: 400px;" onclick="porEstado()">
            </form>

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>APP</th>
                        <th>Compañía</th>
                        <th>Ver Ficha</th>
                        <th>Modificar información</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
                        // se hizo una busqueda
                        $listado=$_SESSION["resultadosDeBusquedaDeBomberos"];





                        foreach ($listado as $o => $objeto) {
                          ?>
                          <tr>
                            <td><?php echo $objeto->getRut();?></td>
                            <td><?php echo $objeto->getNombre();?></td>
                            <td><?php echo $objeto->getApellidoPaterno();?></td>
                            <td><?php echo utf8_encode($objeto->getCompania());?></td>
                            <td>
                              <form action="controlador/CargarFicha.php" method="post">
                                <input type="hidden" id="idBombero" name="idBombero" value="<?php echo $objeto->getIdInfoPersonal();?>">

                              <input type="submit" value="Ver ficha" onclick="alterarValor(<?php echo $objeto->getIdInfoPersonal();?>)" >
                            </form>
                              </td>
                              <td>
                                <form action="controlador/CargarFichaAModificar.php" method="post">
                                  <input type="hidden" id="idBomberoAModificar" name="idBomberoAModificar" value="<?php echo $objeto->getIdInfoPersonal();?>">

                                <input type="submit" value="Modificar" onclick="alterarValor2(<?php echo $objeto->getIdInfoPersonal();?>)" >

                                </form>
                              </td>
                          </tr>
                        <?php
                      }

                    unset($_SESSION["resultadosDeBusquedaDeBomberos"]);


                    }
                      ?>




                    </tbody>
                  </table>


      </div>



     </div>
   </div>
 </div>
</div>

<!-- Preciso el javaScript porque tengo 3 hidden con el mismo nombre, lo cual significa que el ultimo es el que se rescata
en el controlador. Tengo 3 porque la idea era que cada uno mandara un valor distinto, pero se toma solo el ultimo. Asi que use javascript para alterar
el valor del ultimo hidden con el numero que necesito en el handler

 -->
<script src="javascript/JQuery.js"></script>
        <script>

        function porNombre() {
          document.getElementById("tipoDeBusqueda").value = "1";
            }

        function porEstado() {
              document.getElementById("tipoDeBusqueda").value = "2";
                }

        function porCompania() {
                  document.getElementById("tipoDeBusqueda").value = "3";
                    }

          function alterarValor(id) {
                      document.getElementById("idBombero").value=id;

                      $.ajax({
                        url: "iniciarFKInfoPersonalEnSesion.php",
                        type: "POST",
                        data:{"idEnviado":id}
                      }).done(function(data) {
                        console.log(data);
                      });
                        }


                        function alterarValor2(id) {
                                    document.getElementById("idBomberoAModificar").value=id;

                                    $.ajax({
                                      url: "iniciarFkInfoPersonalParaModificarBomberoEnSesion.php",
                                      type: "POST",
                                      data:{"idParaModificar":id}
                                    }).done(function(data) {
                                      console.log(data);
                                    });
                                      }



        </script>
        <script src="javascript/borrarVariablesEnSesionAlCargarPagina.js"></script>

  </body>
</html>
