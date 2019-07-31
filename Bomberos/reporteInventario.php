<!DOCTYPE html>
<?php
// unir vista con el modelo sin pasar por un controlador
require_once("model/Data.php");
$data = new Data();
session_start();

if (isset($_SESSION["resultadosDeBusquedaDeBomberos"])) {
  unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
}

if (isset($_SESSION["resultadosDeBusquedaDeUnidad"])) {
  unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
}

if (isset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"])) {
  unset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"]);
}


if ($_SESSION["usuarioIniciado"] != null) {
  $u = $_SESSION["usuarioIniciado"];
  if ($data->verificarSiUsuarioTienePermiso($u, 18) == 0) {
    header("location: paginaError.php");
  }
}

?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Mantenedor</title>


  <link rel="stylesheet" href="css/style.css" type="text/css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script language="javascript" src="javascript/jquery"></script>

  <script language="javascript">
    // para llenar la bodega segun la compa√±ia que se selecciona
    $(document).ready(function() {
      $("#cbo_Compania").change(function() {

        //$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        $("#cbo_Compania option:selected").each(function() {
          id_compania = $(this).val();
          $.post("getBodega.php", {
            id_compania: id_compania
          }, function(data) {
            $("#cbo_unidadFisica").html(data);
          });
        });
      })
    });
  </script>


</head>

<body background="images/fondofichaintranet.jpg">

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
            <li><a href="crearInventario.php">Crear</a></li>
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

  <div class="cuerpo" style="
    margin-left: 20%;
    float: left;
    width: 75%;
    padding-left: 5%;
    padding-top: -100%;
    margin-top: -800px;
    margin-bottom: -1000px;
    ">

    <style>
      #transparencia {
        opacity: .85;
        -moz-opacity: .85;
        filter: alpha(opacity=85);

      }
    </style>


    <div style="width: 800px" style="height: 900px">
      <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
        <div class="container">

          <div class="form-group" style="margin-left:50px;">

            <span>
              <h3 style="font-weight:bold;">Reporte Inventario</h3>
            </span>

            <form target="_blank" action="plantilla/plantillaInventarioByFiltro.php" method="post">


              <span>
                <h5 style="font-weight:bold;"><?php echo utf8_encode(" CompaÒia"); ?></h5>
              </span>

              <select name="cbo_Compania" id="cbo_Compania" style="width:250px;">
                <?php
                $entiPropietaria = $data->getEntidadACargo();
                foreach ($entiPropietaria as $ep) {
                  echo "<option value='" . $ep->getIdEntidadACargo() . "'>";
                  echo utf8_encode($ep->getNombreEntidadACargo());
                  echo "</option>";
                }
                ?>
              </select>

              <br>

              <span>
                <h5 style="font-weight:bold;"><?php echo utf8_encode(" Estado"); ?></h5>
              </span>

              <select name="cbo_Estado" id="cbo_Estado" style="width:195px;">
                <?php
                $estados = $data->getEstadosInventario();
                foreach ($estados as $e) {
                  echo "<option value='" . $e->getId_estado_material_menor() . "'>";
                  echo utf8_encode($e->getNombre_estado_material_menor());
                  echo "</option>";
                }
                ?>
              </select>
              <br>

              <span>
                <h5 style="font-weight:bold;"><?php echo utf8_encode(" Bodega"); ?></h5>
              </span>

              <div>
                <select name="cbo_unidadFisica" id="cbo_unidadFisica" require="required">
                </select>
              </div>

              <br>

              <input class="btn btn-default" type="submit" name="btnGenerarReporte" value="Generar Reporte" class="btn button-primary" style="width: 150px; height:30px;" style="margin-top: 400px;">


            </form>

          </div>
          <br>
          <br>
          <br>

          <div>
            <span>
              <h3 style="font-weight:bold;">Inventario de Materiales a Bomberos</h3>
            </span>

            <form target="_blank" action="plantilla/plantillaInventarioCargos.php" method="post">
              <span>
                <h5 style="font-weight:bold;"><?php echo utf8_encode(" CompaÒia"); ?></h5>
              </span>

              <br>

              Entidad a Cargo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <select name="cboCompania" id="cboCompania" style="width:250px;">
                <?php
                $entiPropietaria = $data->getEntidadACargo();
                foreach ($entiPropietaria as $ep) {
                  echo "<option value='" . $ep->getIdEntidadACargo() . "'>";
                  echo utf8_encode($ep->getNombreEntidadACargo());
                  echo "</option>";
                }
                ?>
              </select>
              <br>

              Fecha: 
              <input style="margin-left: 0px; width: 150px;" type="date" class="form-control" name="txtFechaDesde" value="<?php date_default_timezone_set("Chile/Continental"); echo date('Y-m-d', strtotime('yesterday')); ?>" required>
              <input style="margin-left: 0px; width: 150px;" type="date" class="form-control" name="txtFechaHasta" value="<?php date_default_timezone_set("Chile/Continental"); echo date("Y-m-d"); ?>" required>
              
              <br>

              <input class="btn btn-default" type="submit" name="btnGenerarReporteCargos" value="Generar Reporte De Cargos" class="btn button-primary" style="width: 220px; height:30px;" style="margin-top: 400px;">
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="javascript/borrarVariablesEnSesionAlCargarPagina.js"></script>

</body>

</html>