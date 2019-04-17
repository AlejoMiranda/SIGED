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
    if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
      unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
    }
    
    if(isset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"])){
        unset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"]);
    }


    if(isset($_SESSION["idDeServicioCreado"])){
      $idServicioCreado=$_SESSION["idDeServicioCreado"];
    }

    if($_SESSION["usuarioIniciado"]!=null){
      $u=$_SESSION["usuarioIniciado"];
      if($data->verificarSiUsuarioTienePermiso($u,19)==0){
        header("location: paginaError.php");
      }
    }



?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Comunicaciones</title>


    <link rel ="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
   <script src="js/bootstrap.js"></script>

   <script src="javascript/JQuery.js"></script>
   <!-- <script type="text/javascript" src="javascript/sweetAlertMin.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    -->


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>


  </head>


<body  background="images/fondofichaintranet.jpg">

    <br>
    <nav class="navbar navbar-default nav-stacked  navbar-pills responsive" role="navigation" >
      <div class="jumbotron">
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
    </div>
    </nav>

  <div class = "cuerpo" style="
    margin-left: 20%;
    float: left;
    width: 75%;
    padding-left: 5%;
    padding-top: -100%;
    margin-top: -980px;
    margin-bottom: -1000px;
    width: 1000px;
    height: 800px;
    ">

<style>
#transparencia{
    opacity: .75;
    -moz-opacity: .75;
    filter: alpha(opacity=75);
}

#cuadro1{
  width: 800px;
  height: 385px;
  margin-top: 20px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;

}

#cuadro2{
  width: 800px;
  height: 385px;
  margin-top: 21px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;

}
#cuadro3{
  width: 800px;
  height: 434px;
  margin-top: 7px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;
}

#cuadro4{
  width: 800px;
  height: 434px;
  margin-top: 7px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;
}

#jum{
    width: 900px;
    height: 1000px;
    margin-bottom: 100px;
}
.something {
      width: 90px;
      background: red;
    }

#divtabla{
  overflow:scroll;
  height:150px;
     width:600px;
}

#divtabla table {
    width:500px;
}

#divtabla2{
  overflow:scroll;
  height:250px;
     width:700px;
}

#divtabla2 table {
    width:700px;
}

</style>


<?php

    require_once("model/Data.php");
    $data = new Data();
?>

<center><h2>Sección de comunicaciones</h2></center>
<br>
<br>
<center><button onclick="reproducirSonido()">Dar aviso</button></center>
<br>
<br>
<div id="cuadro1" style="height: 705px;margin-top:10px;">
    <div class="jumbotron"  style="height: 700px;border-radius: 70px 70px 70px 70px;">
      <div class="container" style="height: 700px;">
        <center style="margin-top:-30px;font-weight:bold;"> Últimos Servicios</center><br>
      <div class="form-group" style="margin-left:0px;Margin-top:-7px;">
        <?php
        $ultimosServicios=$data->getUltimos20Servicios();

        ?>

        <table class="table table-striped">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Servicio</th>
                <th>Unidades</th>
                <th>Sector</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($ultimosServicios as $s => $servicio) {?>
                <tr>
                  <td><?php
                  $fechaSinConvertir =  $servicio->getFecha_servicio();
                  $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                  echo $fechaConvertida;
                  ?></td>
                  <td>
                    <?php
                    $fechaSinConvertir =  $servicio->getFecha_servicio();
                    $hora = date("H:i",strtotime($fechaSinConvertir));
                    echo $hora;
                    ?>

                  </td>
                  <td><?php echo utf8_encode($data->verNombreDeServicioPorId($servicio->getFk_tipoDeServicio()));?></td>
                  <td><?php
                  $unidades=$data->getUnidadesInvolucradasEnServicio($servicio->getId_servicio());
                  foreach ($unidades as $u => $unidad) {
                    echo $unidad." ";
                  }
                  ?></td>
                  <td><?php echo $data->getNombreDeSectorPorId($servicio->getFk_sector());?></td>
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



<script>

function reproducirSonido(){
  var music = new Audio('sonidos/bleep.mp3');
  music.play();
}


</script>


  </body>
</html>
