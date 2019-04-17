<!DOCTYPE html>
<?php
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    $data = new Data();
    session_start();

    if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
      unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
    }

    if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
      unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
    }


    if($_SESSION["usuarioIniciado"]!=null){
      $u=$_SESSION["usuarioIniciado"];
      if($data->verificarSiUsuarioTienePermiso($u,18)==0){
        header("location: paginaError.php");
      }
    }

?>
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


<div style="width: 800px" style="height: 900px">
    <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
      <div class="container">

      <div class="form-group" style="margin-left:50px;">

        <span><h5 style="font-weight:bold;">Reporte Bomberos</h5></span>

        <form action="controlador/buscarInfoParaReporte.php" method="post">
        
        <form>
        <input type="text" name="txtBuscar" value="<?php
        if(isset($nombreSeleccionado)){
          echo utf8_encode($nombreSeleccionado);
        }
        ?>" placeholder="Buscar por nombre" style="height:30px;">
        <input class="btn btn-default" type="submit" name="btnInfoPersonal" value="Buscar" class="btn button-primary" style="width: 100px; height:30px;" style="margin-top: 400px;" onclick="porNombre()">
      <!--  <button class="btn btn-default" name="btnBuscar" style="width: 100px; height:30px;" style="margin-top: 400px"> <a href="·" style="text-decoration:none;color:black;">Buscar</a> </button> -->
        </form>
	
		
		<?php
              if(isset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"])){
                $resultadosDeBusquedaHecha=$_SESSION["resultadosDeBusquedaDeBomberoByNombre"];
                if(count($resultadosDeBusquedaHecha)>1){?>
                  <br>
                  Mostrando <?php echo count($resultadosDeBusquedaHecha);?> resultados
                  <br>
              <?php  }else if(count($resultadosDeBusquedaHecha)==1){  ?>
              <br>
              Mostrando <?php echo count($resultadosDeBusquedaHecha);?> resultado
              <br>
            <?php }else if(count($resultadosDeBusquedaHecha)==0){  ?>
              <br>
              No hay resultados
              <br>
            <?php
            }
            }
             ?>
             
             
        <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Compañía</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      if(isset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"])){
                        // se hizo una busqueda
                        $listado=$_SESSION["resultadosDeBusquedaDeBomberoByNombre"];

                        foreach ($listado as $o => $objeto) {
                          ?>
                          <tr>
                            <td><?php echo $objeto->getNombre();?></td>
                            <td><?php echo utf8_encode($objeto->getCompania());?></td>
                            <td>
                              <form target="_blank" action="controlador/CargarBomberoImprimir.php" method="post">
                                <input type="hidden" id="idBomberoReporte" name="idBomberoReporte" value="<?php echo $objeto->getIdInfoPersonal();?>">

                              <input type="submit" value="Ver Reporte Personal">
                            </form>
                              </td>
                          </tr>
                        <?php

                    }
                  }
                      ?>




                    </tbody>
                  </table>









     </div>
   </div>
 </div>
</div>
</div>
</body>
</html>
