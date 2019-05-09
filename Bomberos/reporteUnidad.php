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
      	
      	<span><h3 style="font-weight:bold;">Reporte Unidades</h3></span>
        <br>
      
      	<span><h5 style="font-weight:bold;">Todas Las Unidades</h5></span>
		<br>
		<form target="_blank" action="plantilla/plantillaListaUnidadesPDF.php" method="post">
            <input class="btn btn-default" type="submit" name="btnReporteBomberos" value="Generar Reporte" class="btn button-primary" style="width: 150px; height:30px;" style="margin-top: 400px;">
        </form>
        
        <br>
        <br>
        <br>
		<span><h3 style="font-weight:bold;">Mantenciones de Unidades</h3></span>
        <span><h5 style="font-weight:bold;">Por Unidad</h5></span>
        <br>
        
        <form target="_blank" action="plantilla/plantillaUnidadByUnidadPDF.php" method="post">
        	 <select name="cboUnidades" style="width: 180px;" >
            	<?php
                    $unidad = $data->readUnidadesVehiculos();
                    foreach ($unidad as $u) {
                        echo "<option value='".$u->getIdUnidad()."'>";                              
                            echo $u->getNombreUnidad();
                        echo"</option>";
                        
                    }
                ?>
        		</select>
        		<br><br>

             <input class="btn btn-default" type="submit" name="btnReporteUByFiltro" value="Generar Reporte de Unidad" class="btn button-primary" style="width: 220px; height:30px;" style="margin-top: 400px;">
        </form>
        <br>
        
        <span><h5 style="font-weight:bold;"><?php echo utf8_encode("Por Compañia"); ?></h5></span>
        
        <form target="_blank" action="plantilla/plantillaUnidadByCompania.php" method="post">
        	 <select name="cbocompania" style="width:175px; height:30px;">
                  <?php
                      $compania = $data->readSoloCompanias();
                      foreach ($compania as $c) {
                        if(isset($companiaSeleccionada) && ($companiaSeleccionada==$c->getIdEntidadACargo())){
                            echo "<option selected value='".$c->getIdEntidadACargo()."'>";
                              echo utf8_encode($c->getNombreEntidadACargo());
                          echo"</option>";
                        }else{
                          echo "<option value='".$c->getIdEntidadACargo()."'>";
                              echo utf8_encode($c->getNombreEntidadACargo());
                          echo"</option>";
                        }
                      }
                  ?>

                </select>
        		<br><br>

             <input class="btn btn-default" type="submit" name="btnReporteUByFiltro" value="Generar Reporte de Unidad" class="btn button-primary" style="width: 220px; height:30px;" style="margin-top: 400px;">
        </form>
        <br>
        
        <span><h3 style="font-weight:bold;">Reporte Carga Combustible</h3></span>
       
		<span><h5 style="font-weight:bold;">Por Unidad</h5></span>
        <br>
        
        <form target="_blank" action="plantilla/plantillaCombustibleByUnidad.php" method="post">
        	 <select name="cboUnidades2" style="width: 180px;" >
            	<?php
                    $unidad = $data->readUnidadesVehiculos();
                    foreach ($unidad as $u) {
                        echo "<option value='".$u->getIdUnidad()."'>";                              
                            echo $u->getNombreUnidad();
                        echo"</option>";
                        
                    }
                ?>
        		</select>
        		<br><br>

             <input class="btn btn-default" type="submit" name="btnReporteUByFiltro" value="Generar Reporte de Unidad" class="btn button-primary" style="width: 220px; height:30px;" style="margin-top: 400px;">
        </form>
        <br>
        
        <span><h5 style="font-weight:bold;"><?php echo utf8_encode("Por Compañia"); ?></h5></span>
        
        <form target="_blank" action="plantilla/plantillaCombustibleByCompania.php" method="post">
        	 <select name="cbocompania2" style="width:175px; height:30px;">
                  <?php
                      $compania = $data->readSoloCompanias();
                      foreach ($compania as $c) {
                        if(isset($companiaSeleccionada) && ($companiaSeleccionada==$c->getIdEntidadACargo())){
                            echo "<option selected value='".$c->getIdEntidadACargo()."'>";
                              echo utf8_encode($c->getNombreEntidadACargo());
                          echo"</option>";
                        }else{
                          echo "<option value='".$c->getIdEntidadACargo()."'>";
                              echo utf8_encode($c->getNombreEntidadACargo());
                          echo"</option>";
                        }
                      }
                  ?>

                </select>
        		<br><br>

             <input class="btn btn-default" type="submit" name="btnReporteUByFiltro" value="Generar Reporte de Unidad" class="btn button-primary" style="width: 220px; height:30px;" style="margin-top: 400px;">
        </form>
        <br>


    <!--    Tipo Servicio:
        <select  name="cboTiposDeServicios" style="width: 180px;">
       <?php
/*

        $listado = $data->readTiposDeServicios();
        foreach($listado as $o => $objeto){
        ?>
        <option value="<?php echo $objeto->getId_tipo_servicio(); ?>"><?php echo $objeto->getCodigo_tipo_servicio(); ?></option>
        <?php
      }*/
        ?>
      </select> -->
        
     </div>
   </div>
 </div>
</div>
</div>

<script src="javascript/borrarVariablesEnSesionAlCargarPagina.js"></script>

  </body>
</html>
