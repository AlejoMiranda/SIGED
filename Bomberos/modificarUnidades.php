<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mantenedor</title>


    <link rel ="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="javascript/JQuery.js"></script>
    <script type="text/javascript" src="javascript/sweetAlertMin.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

  </head>

  <?php
 require_once("model/Data.php");
 require_once("model/Tbl_Usuario.php");
 $dataUsuario= new Data();
 session_start();
 if($_SESSION["usuarioIniciado"]!=null){
   $u=$_SESSION["usuarioIniciado"];
   if($dataUsuario->verificarSiUsuarioTienePermiso($u,9)==0){
     header("location: paginaError.php");
   }
 }

$_SESSION['seEstaModificandoUnaUnidad']=TRUE;;

if(isset($_SESSION["unidadAModificarSolicitada"])){
  $unidadAModificar=$_SESSION["unidadAModificarSolicitada"];
}else{
  $unidadAModificar= new Tbl_Unidad();
}


if(isset($_SESSION["mantenciones"])){
  $mantenciones=$_SESSION["mantenciones"];
}else{
  $mantenciones= array();
}

if(isset($_SESSION["carguios"])){
  $carguios=$_SESSION["carguios"];
}else{
  $carguios= array();
}

if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
  unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
}
/*
if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
  unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
}*/

if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
  unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);;
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

    ?>

    <div style="width: 800px" style="height: 900px">
        <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
          <div class="container">

          <div style="margin-left:52px;">

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


            <!-- modificar unidad-->


            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" style="text-decoration: none;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <center>Modificar Unidades</center>
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel panel-primary">
                    <div class="panel-heading panel-title">
                        Modificar Unidades
                    </div>
                <div class="panel-body">
                  <div class="col-sm-4" >
                    <div style="margin-left: 0px;">
                      <img src="images/avatar_opt.jpg">
                    </div>
                    <form id="formActualizarUnidad" action="controlador/ActualizarUnidad.php" method="post">
                    <!--  Modificando unidad:
                      <select name="cboUnidadAModificar"  class="form-control" disabled>
                          <?php/*
                              $unidad = $data->readUnidadesVehiculos();
                              foreach ($unidad as $u) {
                                if($u->getIdUnidad()==$unidadAModificar->getIdUnidad()){
                                  echo "<option value='".$u->getIdUnidad()."'>";
                                      echo $u->getNombreUnidad();
                                  echo" selected </option>";

                                }else{
                                  echo "<option value='".$u->getIdUnidad()."'>";
                                      echo $u->getNombreUnidad();
                                  echo"</option>";

                                }

                              }
                      */    ?>
                      </select>
                    -->
                      <input type="hidden" name="cboUnidadAModificar" value="<?php echo $unidadAModificar->getIdUnidad();?>">



                      Marca:<input id="nombre" type="text" value="<?php echo $unidadAModificar->getMarca();?>" name="txtmarca" class="form-control" required="">
                      Nº Motor:<input id="nombre" type="text" value="<?php echo $unidadAModificar->getNmotor();?>" name="txtmotor" class="form-control" required="">
                      Nº Chasis :<input id="nombre" type="text" value="<?php echo $unidadAModificar->getNchasis();?>" name="txtchasis" class="form-control" required="">
                      Nº VIN: <input id="nombre" type="text" value="<?php echo $unidadAModificar->getNVIN();?>" name="txtvin" class="form-control" required="">
                      Color:<br><input id="nombre" type="text" value="<?php echo $unidadAModificar->getColor();?>" name="txtcolor" class="form-control" required="">
                      PPU: <br><input id="nombre" type="text" value="<?php echo $unidadAModificar->getPPu();?>" name="txtppu" class="form-control" required="">



                  </div>
                  <div class="col-sm-6" style="margin-left: 60px;">

                    Nombre Unidad:<input id="nombre" type="txt" value="<?php echo $unidadAModificar->getNombreUnidad();?>" class="form-control" name="txtnombreUnidad"  required="">
                    Año de Fabricacion:<input id="nombre" type="text" value="<?php echo $unidadAModificar->getaniodeFabricacion();?>" class="form-control" name="txtanioFabricacion"  required="">
                    Fecha de Inscripcion:<input id="nombre" type="date" value="<?php echo $unidadAModificar->getfechaInscripcion();?>" class="form-control" name="txtfechainscripcion"   required="">
                    Fecha de Adquisición:<input id="nombre" type="date" value="<?php echo $unidadAModificar->getfechaAdquisicion();?>" class="form-control" name="txtfechaadquisicion" required="">
                    Capacidad Ocupantes :<input id="nombre" type="number" value="<?php echo $unidadAModificar->getcapacidadOcupantes();?>" class="form-control" name="txtcapaocupantes"  required="">

                    Estado de Unidad:
                    <select name="unidades"  class="form-control">
                        <?php
                            $unidad = $data->getUnidades();
                            foreach ($unidad as $u) {

                              if($unidadAModificar->getfkEstadoUnidad()==$u->getIdEstadoUnidad()){
                                echo "<option selected value='".$u->getIdEstadoUnidad()."'>";
                                    echo $u->getNombreEstadoUnidad();
                                echo"</option>";
                              }else{
                                echo "<option value='".$u->getIdEstadoUnidad()."'>";
                                    echo $u->getNombreEstadoUnidad();
                                echo"</option>";
                              }


                            }
                        ?>
                    </select>

                  Tipo de Vehiculo:
                  <select name="vehiculos"  class="form-control">
                      <?php
                          $vehiculo = $data->getVehiculos();
                          foreach ($vehiculo as $v) {

                            if($unidadAModificar->getfkTipoVehiculo()==$v->getIdTipoVehiculo()){
                              echo "<option selected value='".$v->getIdTipoVehiculo()."'>";
                                  echo $v->getNombreTipoVehiculo();
                              echo"</option>";
                            }else{
                              echo "<option value='".$v->getIdTipoVehiculo()."'>";
                                  echo $v->getNombreTipoVehiculo();
                              echo"</option>";
                            }

                          }
                      ?>
                  </select>

               Entidad a Cargo:
                <select name="entidad" class="form-control">
                    <?php
                        $entiPropietaria = $data->getEntidadACargo();
                        foreach ($entiPropietaria as $ep) {

                          if($unidadAModificar->getfkEntidadPropietaria()==$ep->getIdEntidadACargo()){
                            echo "<option selected value='".$ep->getIdEntidadACargo()."'>";
                                echo utf8_encode($ep->getNombreEntidadACargo());
                            echo"</option>";
                          }else{
                            echo "<option value='".$ep->getIdEntidadACargo()."'>";
                                echo utf8_encode($ep->getNombreEntidadACargo());
                            echo"</option>";
                          }


                        }
                    ?>
                </select>
                      <br><br>
                    <center> <input type="submit" id="btn_modificarUnidad" name="btncrear" value="Modificar Unidad" class="btn button-primary" style="width: 150px;"> <span ></span>
                        <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                    </center>
                  </form>
                    <br>
                  </div>
                  <br>
                  <br>


                </div>
              </div>
            </div>
            </div>



                          <!--modificar unidad -->
                          <!-- mantencion-->


                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                  <a class="collapsed" style="text-decoration: none;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <center>Modificar Mantención</center>
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel panel-primary">
                                    <div class="panel-heading panel-title">
                                        Modificar Mantención
                                    </div>
                                <div class="panel-body">
                                  <div class="col-sm-4" >

                                    <form id="formCrearMantencionEnModificarUnidad" action="controlador/CrearMantencion.php" method="post">
                                      <input type="hidden" name="cboUnidades" value="<?php echo $unidadAModificar->getIdUnidad();?>">
                                      Tipo Mantención:
                                      <select name="cboTipoMantencion" class="form-control">
                                          <?php
                                              $listado = $data->readTiposDeMantencion();
                                              foreach ($listado as $o) {
                                                  echo "<option value='".$o->getId_tipo_de_mantencion()."'>";
                                                      echo $o->getNombre_tipoDeMantencion();
                                                  echo"</option>";
                                              }
                                          ?>
                                      </select>
                                      Fecha de mantención: <input id="nombre" type="date" name="fechaMantencion" class="form-control">

                                      Responsable:<input id="responsableDeMantencion" type="text" name="txtresponsableMantencion" class="form-control">



                                  </div>
                                  <div class="col-sm-6" style="margin-left: 60px;">

                                    Dirección: <textarea class="form-control" Type="textarea" name="txtDireccion" ></textarea>
                                    Comentarios/Observaciones: <textarea class="form-control" Type="textarea" name="txtcomentario" ></textarea>

                                      <br><br>
                                    <center> <input type="submit" id="btn_crearMantencionEnModificar" name="btnModificarMantencion" value="Crear mantención" class="btn button-primary" style="width: 150px;"> <span ></span>
                                        <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                                    </center>
                                  </form>

                                                            <br>
                                  </div>
                                  <br>
                                  <br>

                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Tipo de mantención</th>
                                        <th>Fecha de mantención</th>
                                        <th>Responsable</th>
                                        <th>Dirección</th>
                                        <th>Comentarios/Observaciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      foreach ($mantenciones as $my => $mantencion) {?>
                                        <tr>
                                          <input type="hidden" value="<?php echo $mantencion->getIdMantencion();?>" name="idMantencion" id="idMantencion">
                                          <td><?php echo $data->buscarNombreDeTipoDeMantencion($mantencion->getFk_tipo_mantencion());?></td>
                                          <td><?php $fechaSinConvertir=$mantencion->getFecha_mantencion();

                                          $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                          echo $fechaConvertida;

                                          ?></td>
                                          <td><?php echo $mantencion->getResponsable_mantencion();?></td>
                                          <td><?php echo $mantencion->getDireccion_mantencion();?></td>
                                          <td><?php echo $mantencion->getComentarios_mantencion();?></td>
                                        </tr>

                                    <?php  }
                                      ?>

                                    </tbody>

                                  </table>




                                </div>
                              </div>
                            </div>
                            </div>


                          <!-- mantenciion-->
                          <!-- mcombustible-->


                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                  <a class="collapsed" style="text-decoration: none;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <center>Modificar Carguio de combustible</center>
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel panel-primary">
                                    <div class="panel-heading panel-title">
                                        Modificar Carguio de combustible
                                    </div>
                                <div class="panel-body">
                                  <div class="col-sm-4" >

                                    <form id="formCrearCarguioEnModificar" action="controlador/CrearCarguioDeCombustible.php" method="post">

                                      <input type="hidden" name="idUnidadAModificar" value="<?php echo $unidadAModificar->getIdUnidad();?>">


                                      Tipo Combustible:
                                      <select name="cboTipoCombustible" class="form-control">
                                          <?php
                                              $listado = $data->readTiposDeCombustibles();
                                              foreach ($listado as $o) {
                                                  echo "<option value='".$o->getId_tipo_combustible()."'>";
                                                      echo $o->getNombre_tipo_combustible();
                                                  echo"</option>";
                                              }
                                          ?>
                                      </select>

                                      Responsable:<input id="nombre" type="text" name="txtresponsablecombustible" class="form-control" >
                                      Dirección: <textarea class="form-control" Type="textarea" name="txtDireccionCombustible" ></textarea>
                                      Fecha:<input id="nombre" type="date" name="txtFechaCombustible" class="form-control" >

                                  </div>
                                  <div class="col-sm-6" style="margin-left: 60px;">

                                    Cantidad:<input id="nombre" type="number" name="txtcantidad" class="form-control" >
                                    Precio/Litro:<input id="nombre" type="number" name="txtpreciolitro" class="form-control" >
                                    Comentarios/Observaciones: <textarea class="form-control" Type="textarea" name="txtcomentario" ></textarea>

                                      <br>
                                    <center> <input type="submit" id="btn_crearCarguioEnModificar" name="btncrear" value="Crear carga" class="btn button-primary" style="width: 150px;"> <span ></span>
                                        <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                                    </center>
                                  </form>
                                  <br>

                                  </div>
                                  <br>
                                  <br>
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Responsable de carguio</th>
                                        <th>Fecha de carguio</th>
                                        <th>Dirección de carguio</th>
                                        <th>Tipo de combustible</th>
                                        <th>Cantidad de litros</th>
                                        <th>Precio por litro</th>
                                        <th>Observacion</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      foreach ($carguios as $ca => $carguio) {?>
                                        <tr>
                                          <input type="hidden" value="<?php echo $carguio->getId_cargio_combustible();?>" name="idCarguio" id="idCarguio">
                                          <td><?php echo $carguio->getResponsable_cargio_combustible();?></td>
                                          <td><?php $fechaSinConvertir=$carguio->getFecha_cargio();

                                          $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                          echo $fechaConvertida;

                                          ?></td>
                                          <td><?php echo $carguio->getDireccion_cargio();?></td>
                                          <td><?php echo $carguio->getFk_tipo_combustible_cargio_combustible();?></td>
                                          <td><?php echo $carguio->getCantidad_litros_cargio_combustible();?></td>
                                          <td><?php echo $carguio->getPrecio_litro_cargio_combustible();?></td>
                                          <td><?php echo $carguio->getCantidad_litros_cargio_combustible();?></td>
                                          <td><?php echo $carguio->getObservacion_cargio_combustible();?></td>
                                        </tr>

                                    <?php  }
                                      ?>

                                    </tbody>

                                  </table>



                                </div>
                              </div>
                            </div>
                            </div>

                          <!-- cargui combustible-->
        </div>
       </div>
       <form action="buscarUnidades.php">
       <center><input type="submit" value="Volver atrás"></center>
       </form>
   </div>

 </div>
</div>
</div>


 <script type="text/javascript">

 $('#btn_modificarUnidad').on('click',function(e){
 e.preventDefault();
 var form = $(this).parents('form');
 swal({
    title: "Sistema de bomberos",
     text: "Operación exitosa",
     type: "success",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
     confirmButtonText: "Ok",
     closeOnConfirm: true,
 }, function(isConfirm){
     if (isConfirm)  document.getElementById("formActualizarUnidad").submit();
     //form.submit();
 });
 });

 $('#btn_crearMantencionEnModificar').on('click',function(e){
 e.preventDefault();
 var form = $(this).parents('form');
 swal({
     title: "Sistema de bomberos",
     text: "Operación exitosa",
     type: "success",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
     confirmButtonText: "Ok",
     closeOnConfirm: true,
 }, function(isConfirm){
     if (isConfirm)  document.getElementById("formCrearMantencionEnModificarUnidad").submit();
     //form.submit();
 });
 });

 $('#btn_crearCarguioEnModificar').on('click',function(e){
 e.preventDefault();
 var form = $(this).parents('form');
 swal({
     title: "Sistema de bomberos",
     text: "Operación exitosa",
     type: "success",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
     confirmButtonText: "Ok",
     closeOnConfirm: true,
 }, function(isConfirm){
     if (isConfirm)  document.getElementById("formCrearCarguioEnModificar").submit();
     //form.submit();
 });
 });
</script>

<script src="javascript/borrarVariablesEnSesionAlCargarPagina.js"></script>


  </body>
</html>
