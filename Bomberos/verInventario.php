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
    if($dataUsuario->verificarSiUsuarioTienePermiso($u,17)==0){
      header("location: paginaError.php");
    }
  }
  $data= new Data();

  if(isset($_SESSION["materialMenorAVerSolicitado"])){
    $material=$_SESSION["materialMenorAVerSolicitado"];
  }

  if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
    unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
  }

  if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
    unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
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
        <a href="Mantenedor.php" class="navbar-brand" href="#">Sistema Bomberos</a>
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
              <li><a href="reporteUnidad.php">Reporte</a></li>
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
              <li><a href="reporteInventario.php">Reporte </a></li>


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

<div style="width: 800px" style="height: 400px">
    <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
      <div class="container">

      <div class="form-group" style="margin-left:50px;">
        <span><h5 style="font-weight:bold;">Inventario</h5></span>

        <form action="controlador/ActualizarMaterialMenor.php" method="post">


          Nombre Material: &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="txtnombreMaterial" id="txtnombreMaterial" style="width:575px;" value="<?php echo $material->getNombre_material_menor();?>" disabled><br><br>

          Entidad a Cargo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <select name="cboEntidadACargoModificar" id="cboEntidadACargoModificar" style="width:230px;" disabled>
               <?php
                   $entiPropietaria = $data->getEntidadACargo();
                   foreach ($entiPropietaria as $ep) {
                     if($material->getFk_entidad_a_cargo_material_menor()==$ep->getIdEntidadACargo()){?>
                       <option value="<?php echo $ep->getIdEntidadACargo(); ?>" selected ><?php echo utf8_encode($ep->getNombreEntidadACargo()); ?></option>
                       <?php
                     }else{
                         ?>
                         <option  value="<?php echo $ep->getIdEntidadACargo(); ?>" ><?php echo utf8_encode($ep->getNombreEntidadACargo()); ?></option>
                         <?php
                       }
                     }

               ?>
           </select>

             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ubicacion Fisica:
           <select name="cboxUbicacionModificar" id="cboxUbicacionModificar" disabled style="width:195px;" >
             <?php
             $ubicacionesFisicas = $data->getUbicacionFisica($material->getFk_entidad_a_cargo_material_menor());
             foreach ($ubicacionesFisicas as $ubi) {
               if($material->getFk_ubicacion_fisica_material_menor()==$ubi->getIdUbicacionFisica()){?>
                 <option  value="<?php echo $ubi->getIdUbicacionFisica(); ?>" selected ><?php echo utf8_encode($ubi->getNombreUbicacionFisica()); ?></option>
                 <?php
               }else{
                   ?>
                   <option value="<?php echo $ubi->getIdUbicacionFisica(); ?>" ><?php echo utf8_encode($ubi->getNombreUbicacionFisica()); ?></option>
                   <?php
                 }
               }
             ?>

           </select>
           <br><br>



          Marca: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="txtmarca" value="<?php echo utf8_encode($material->getFabricante_material_menor());?>" disabled style="width:230px;">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


          Color:
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input Type="text" name="txtColor" value="<?php echo $material->getColor_material_menor();?>" disabled  style="width:195px;"><br><br>

           Proveedor: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="text" name="txtProveedor" value="<?php echo utf8_encode($material->getProveedor_material_menor());?>" disabled  style="width:230px;">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


           Estado:
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <select name="cboEstadoMaterial" id="cboEstadoMaterial" disabled>
             <?php
               $estados = $data->getEstadosInventario();
             foreach ($estados as $e) {
               if($material->getFkEstadoMaterialMenor()==$e->getId_estado_material_menor()){?>
                 <option  value="<?php echo $e->getId_estado_material_menor(); ?>" selected ><?php echo utf8_encode($e->getNombre_estado_material_menor()); ?></option>
                 <?php
               }else{
                   ?>
                   <option  value="<?php echo $e->getId_estado_material_menor(); ?>" ><?php echo utf8_encode($e->getNombre_estado_material_menor()); ?></option>
                   <?php
                 }
               }

             ?>
           </select>

           <br><br>

           Fecha de Caducidad:
           <input type="date" name="txtCaducidad"  value="<?php echo $material->getFecha_de_caducidad_material_menor();?>" disabled style="width:230px;" >

           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           No aplica:
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <?php
           if ($material->getFecha_de_caducidad_material_menor()=='0000-00-00'){?>
              <input type="checkbox" checked name="checknoaplica" disabled style="width:100px;height:25px;">
              <?php
           }else{ ?>
             <input type="checkbox" name="checknoaplica" disabled style="width:100px;height:25px;">
          <?php
         }
           ?>


           <br><br>


           Cantidad:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="number" name="txtcantidadMaterial" value="<?php echo $material->getCantidad_material_menor();?>" disabled style="width:150px;" >

           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           Medida: <input type="number" name="numMedida" value="<?php echo $material->getMedida_material_menor();?>" disabled style="width:100px;"> /

          <select name="cboxMedida" disabled>
            <?php
             $medidas = $data->getMedidas();
             foreach ($medidas as $me) {
               if($material->getFk_unidad_de_medida_material_menor()==$me->getIdUnidadMedida()){?>
                 <option value="<?php echo $me->getIdUnidadMedida(); ?>" selected ><?php echo utf8_encode($me->getNombreUnidadMedida()); ?></option>
                 <?php
               }else{
                   ?>
                   <option value="<?php echo $me->getIdUnidadMedida(); ?>" ><?php echo utf8_encode($me->getNombreUnidadMedida()); ?></option>
                   <?php
                 }
               }

            ?>

          </select>
          <br>
          <br>
          Detalle: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="txtDetalle" disabled value="<?php echo $material->getDetalleMaterialMenor();?>" style="width:575px;">


           <br><br>




        </form>


      </div>



     </div>

     <form action="buscarInventario.php">
     <center><input type="submit" value="Volver atrás"></center>
     </form>
   </div>

 </div>
</div>


<script src="javascript/borrarVariablesEnSesionAlCargarPagina.js"></script>
  </body>
</html>
