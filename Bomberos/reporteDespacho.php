<!DOCTYPE html>
<?php
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    $data = new Data();
    session_start();

    if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
      unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
    }
    /*
    if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
      unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
    }*/
    
    if(isset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"])){
        unset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"]);
    }

    if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
      unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
    }

    if($_SESSION["usuarioIniciado"]!=null){
      $u=$_SESSION["usuarioIniciado"];
      if($data->verificarSiUsuarioTienePermiso($u,12)==0){
        header("location: paginaError.php");
      }
    }

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reporte Despacho</title>


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


<div style="width: 800px" style="height: 900px">
    <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
      <div class="container">

      <div class="form-group" style="margin-left:50px;">
      	
      	<span><h3 style="font-weight:bold;">Reporte Despachos</h3></span>
        <br>
        <br>
        
        <div id="cuadro3" style="height: 334px;margin-top:10px;">
      		<div class="jumbotron"  style="height: 330px;border-radius: 70px 70px 70px 70px;">
        		<div class="container" style="height: 330px;">
          		<center style="margin-top:-30px;font-weight:bold;">Servicios</center><br>
        			<div class="form-group" style="margin-left:0px;Margin-top:-7px;">
          				<?php
                            $servicios=$data->getServicios();
                        ?>

                          <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Fecha</th>
                                  <th>Servicio</th>
                                  <th>Unidades</th>
                                  <th>Detalles</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                foreach ($servicios as $s => $servicio) {?>
                                  <tr>
                                    <td><?php
                                    $fechaSinConvertir =  $servicio->getFecha_servicio();
                                    $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                    echo $fechaConvertida;
                                    ?>
                                    </td>
                                    <td><?php echo utf8_encode($data->verNombreDeServicioPorId($servicio->getFk_tipoDeServicio()));?></td>
                                    <td><?php
                                    $unidades=$data->getUnidadesInvolucradasEnServicio($servicio->getId_servicio());
                                    foreach ($unidades as $u => $unidad) {
                                      echo $unidad." ";
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    	<form target="_blank" action="plantilla/plantillaDatosEmergencia.php" method="post">
                                    		<?php echo '<input type="hidden" name="idServicio" value="'.$servicio->getId_servicio().'">';?>
                                    		<input type="submit" name="btn_generarReporte" value="Generar Reporte">
                                    		
                                    	</form>
                                    </td>
                                  </tr>
                              <?php
                                }
                                ?>
                
                
                              </tbody>
                              </table>
                
                
                        </div>
              	 	</div>
            	</div>
   			</div>
        
     </div>
   </div>
 </div>
</div>

<script src="javascript/borrarVariablesEnSesionAlCargarPagina.js"></script>

  </body>
</html>
