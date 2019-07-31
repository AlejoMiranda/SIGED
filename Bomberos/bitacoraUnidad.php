<!DOCTYPE html>
<?php
// unir vista con el modelo sin pasar por un controlador
require_once("model/Data.php");
$data = new Data();

session_start();
if (isset($_SESSION["resultadosDeBusquedaDeBomberos"])) {
  unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
}

if (isset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"])) {
  unset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"]);
}
/*
    if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
      unset($_SESSION["resultadosDeBusquedaDeUnidad"])
    }*/
if (isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])) {
  unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
}


if ($_SESSION["usuarioIniciado"] != null) {
  $u = $_SESSION["usuarioIniciado"];
  if ($data->verificarSiUsuarioTienePermiso($u, 11) == 0) {
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

</head>

<?php
/*
require_once("model/Data.php");
require_once("model/Tbl_Usuario.php");
$dataUsuario= new Data();
session_start();
if($_SESSION["usuarioIniciado"]!=null){
  $u=$_SESSION["usuarioIniciado"];
  if($dataUsuario->verificarSiUsuarioTienePermiso($u,1)==0){
    header("location: paginaError.php");
  }
}*/
?>

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
    margin-top: -950px;
    margin-bottom: -1000px;
    ">

    <style>
      #transparencia {
        opacity: .85;
        -moz-opacity: .85;
        filter: alpha(opacity=85);
      }
    </style>


    <div style="width: 800px" style="height: 400px">
      <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
        <div class="container">

          <div class="form-group" style="margin-left:50px;">
            <span>
              <h5 style="font-weight:bold;">Bitacora de Unidad</h5>
            </span>

            <form action="controlador/CrearBitacora.php" method="post">

              Tipo de Servicio:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;
              <select name="cboTiposDeServicios" style="width:175px; height:30px;">
                <?php


                $listado = $data->readTiposDeServicios();
                foreach ($listado as $o => $objeto) {
                  ?>
                  <option value="<?php echo $objeto->getId_tipo_servicio(); ?>"><?php echo $objeto->getCodigo_tipo_servicio(); ?></option>
                <?php
              }
              ?>
              </select>

              &nbsp;&nbsp;&nbsp;Fecha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="date" name="txtFechaServicio" required><br><br>

              Direccion:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input Type="textarea" class="form-class onlyNumbLetter" name="txtDireccionServicio" required><br><br>

              Oficial a Cargo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;
              <input type="text" class="form-class onlyLetter" name="txtoficialCargo" required>

              &nbsp;&nbsp;&nbsp;Maquinista: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-class onlyLetter" name="txtmaquinista"> <br><br>

              Nº Voluntarios:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;
              <input type="text" class="form-class onlyNumber" name="txtvoluntarios" required><br><br>

              Hora de Salida:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;
              <input type="time" name="txtsalida" required>&nbsp; /&nbsp;

              Hora de Llegada: <input type="time" name="txtLlegada" required> <br><br>

              Kilometros:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" class="form-class onlyNumber"name="txtkilometros" required>

              &nbsp;&nbsp;&nbsp;Hora de Motor: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="time" name="txthoramotor" required><br><br>

              Combustible:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" class="form-class onlyNumber" name="txtCombustibleServicio" required>

              &nbsp;&nbsp;&nbsp;Hora Bomba:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="time" name="txtBomba" required><br><br>

              Carga de Combustible(Litros): <input type="text" class="form-class onlyNumber" name="txtcargaCombustible" required><br><br>

              Observaciones:<br>
              <textarea Type="textarea" class="form-class onlyNumbLetter" name="txtObservaciones" style="width:670px; height:30px;"></textarea>

              <center> <input type="submit" name="btncrear" value="Crear Servicio" class="btn button-primary" style="width: 150px;"> <span></span>
              </center>

            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="javascript/borrarVariablesEnSesionAlCargarPagina.js"></script>

  <script>
    $('.onlyNumber').keypress(function(tecla) {
      if (tecla.charCode < 48 || tecla.charCode > 57) return false;
    });

    $('.onlyLetter').keypress(function(tecla) {
      if ((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 32)) return false;
    });

    $('.onlyNumbLetter').keypress(function(tecla) {
      if ((tecla.charCode < 48 || tecla.charCode > 57) && (tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 32)) return false;
    });
  </script>

</body>

</html>