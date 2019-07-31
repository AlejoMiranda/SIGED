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
  if($dataUsuario->verificarSiUsuarioTienePermiso($u,13)==0){
    header("location: paginaError.php");
  }
}

if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
  unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
}

if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
  unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
}

if(isset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"])){
    unset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"]);
}
/*
if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
  unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
}*/


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
    margin-top: -950px;
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

    if(isset($_SESSION["nombreMaterialSeleccionado"])){
      $nombreSeleccionado=$_SESSION["nombreMaterialSeleccionado"];
    }

    if(isset($_SESSION["companiaMaterialSeleccionado"])){
      $companiaSeleccionada=$_SESSION["companiaMaterialSeleccionado"];
    }

    if(isset($_SESSION["estadoMaterialSeleccionado"])){
      $estadoSeleccionado=$_SESSION["estadoMaterialSeleccionado"];
    }





?>

<div style="width: 800px" style="height: 900px">
    <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
      <div class="container">

              <span><h4 style="font-weight:bold;margin-left:300px;">Buscar Inventario</h4></span>

      <div class="form-group" style="margin-left:50px;">
        <span><h5 style="font-weight:bold;">Buscar por Nombre</h5></span>
        <form action="controlador/BuscarMaterialMenorPorAlgunParametro.php" method="post">
        <form>
        <input type="text" name="txtBuscaNombre"  value="<?php
        if(isset($nombreSeleccionado)){
          echo $nombreSeleccionado;
        }
        ?>" placeholder="Buscar por nombre" style="height:30px;width: 230px;">
        <input type="hidden" name="tipoDeBusqueda" value="1">
        <input class="btn btn-default" type="submit" name="btnBusqueda" value="Buscar" class="btn button-primary" style="width: 100px; height:30px;" style="margin-top: 400px;" onclick="porNombre()">
      <!--  <button class="btn btn-default" name="btnBuscar" style="width: 100px; height:30px;" style="margin-top: 400px"> <a href="·" style="text-decoration:none;color:black;">Buscar</a> </button> -->
        <form>


                        <form action="controlador/BuscarMaterialMenorPorAlgunParametro.php" method="post">
                        <span><h5 style="font-weight:bold;">Compañia</h5></span>
                          <select name="compania" style="width:230px; height:30px;">
                            <?php
                                $compania = $data->getEntidadACargo();
                                foreach ($compania as $c) {


                                  if(isset($companiaSeleccionada)&& ($companiaSeleccionada)==$c->getIdEntidadACargo()){
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
                          <input type="hidden" id="tipoDeBusqueda" name="tipoDeBusqueda" value="2">
                          <input class="btn btn-default" type="submit" name="btnBusqueda" value="Buscar" class="btn button-primary" style="width: 100px; height:30px;" style="margin-top: 400px;" onclick="porCompania()" >
                        </form>

        <form action="controlador/BuscarMaterialMenorPorAlgunParametro.php" method="post">
        <span><h5 style="font-weight:bold;">Estado de material</h5></span>
              <select name="estadoMaterial" style="width:230px; height:30px;">
                <?php
                    $estados = $data->getEstadosInventario();
                    foreach ($estados as $e) {
                      if(isset($estadoSeleccionado)&& ($estadoSeleccionado)==$e->getId_estado_material_menor()){
                        echo "<option selected value='".$e->getId_estado_material_menor()."'>";
                            echo utf8_encode($e->getNombre_estado_material_menor());
                        echo"</option>";
                      }else{
                        echo "<option value='".$e->getId_estado_material_menor()."'>";
                            echo utf8_encode($e->getNombre_estado_material_menor());
                        echo"</option>";
                    }
                  }
                ?>

              </select>
              <input type="hidden" name="tipoDeBusqueda" value="3">
              <input class="btn btn-default" type="submit" name="btnBusqueda" value="Buscar" class="btn button-primary" style="width: 100px; height:30px;" style="margin-top: 400px;"  onclick="porBodega()" >
              <form>
                <br>
                <br>
                <input class="btn btn-default" type="button" name="btnLimpiar" value="Limpiar" class="btn button-primary" style="width: 100px; height:30px;" style="margin-top: 400px;" onclick="location.href='controlador/LimpiarBusquedaInventario.php'" >
                <br>

                <?php
                if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
                  $resultadosDeBusquedaHecha=$_SESSION["resultadosDeBusquedaDeMaterialMenor"];
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
                        <th>Cantidad</th>
                        <th>Fecha Caducidad</th>
                        <th>Entidad asignada</th>
                        <th>Ver Inventario</th>
                        <th>Modificar información</th>
                      </tr>
                    </thead>
                    <tbody>


                      <?php

                      if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
                        // se hizo una busqueda
                        $listado=$_SESSION["resultadosDeBusquedaDeMaterialMenor"];


                        foreach ($listado as $o => $objeto) {
                          ?>
                          <tr>
                            <td><?php echo $objeto->getNombre();?></td>
                            <td><?php echo $objeto->getCantidad();?></td>
                            <td><?php

                            $fechaSinConvertir = $objeto->getFechaDeCaducidad();
                            $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));

                            if($fechaConvertida=='01-01-1970'){
                              echo "No aplica";
                            }else {
                              echo $fechaConvertida;
                            }

                          ?>  </td>
                            <td><?php echo utf8_encode($objeto->getNombreEntidad());?></td>



                            <td>
                                <input type="hidden" id="idMaterial" name="idMaterial" value="<?php echo $objeto->getIdMaterialMenor();?>">
                                <input type="button" onclick="location.href='controlador/CargarFichaInventario.php',alterarValor(<?php echo $objeto->getIdMaterialMenor();?>);" value="Ver Ficha" />
                              </td>
                              <td>
                                <input type="hidden" id="idMaterialAModificar" name="idMaterialAModificar" value="<?php echo $objeto->getIdMaterialMenor();?>">
                                <input type="button" onclick="location.href='controlador/CargarFichaInventarioAModificar.php',alterarValor2(<?php echo $objeto->getIdMaterialMenor();?>);" value="Modificar" />
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

<script src="javascript/JQuery.js"></script>
        <script>

        function porNombre() {
          document.getElementById("tipoDeBusqueda").value = "1";
            }

        function porBodega() {
              document.getElementById("tipoDeBusqueda").value = "3";
                }

        function porCompania() {
                  document.getElementById("tipoDeBusqueda").value = "2";
                    }


          function alterarValor(id) {
                      document.getElementById("idMaterial").value=id;

                      $.ajax({
                        url: "iniciarIdDeMaterialAVerEnSesion.php",
                        type: "POST",
                        data:{"idEnviado":id}
                      }).done(function(data) {
                        console.log(data);
                      });
                        }

                        function alterarValor2(id) {
                                    document.getElementById("idMaterialAModificar").value=id;

                                    $.ajax({
                                      url: "iniciarIdDeMaterialAModificarEnSesion.php",
                                      type: "POST",
                                      data:{"idEnviado":id}
                                    }).done(function(data) {
                                      console.log(data);
                                    });
                                      }




        </script>
        <script src="javascript/borrarVariablesEnSesionAlCargarPagina.js"></script>

  </body>
</html>
