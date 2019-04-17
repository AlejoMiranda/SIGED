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
    <title>Mantenedor</title>


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
  border-radius: 50px 50px 50px 50px;
}
#cuadro2{
  width: 800px;
  height: 385px;
  margin-top: 21px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 50px 50px 50px 50px;
}
#cuadro3{
  width: 800px;
  height: 434px;
  margin-top: 7px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 50px 50px 50px 50px;
}
#cuadro4{
  width: 800px;
  height: 434px;
  margin-top: 7px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 50px 50px 50px 50px;
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
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    $data = new Data();
?>

<div style="width: 900px" style="height: 500px" style="margin-top: -100px" id="jum">
    <div class="jumbotron" style="border-radius: 50px 50px 50px 50px" id="transparencia">
        <center style="font-weight:bold;font-size:20px;margin-top:-40px;">Central de Despacho</center>
      <b>
        <div style="margin-left:590px;margin-top:-21px">
        <?php
      date_default_timezone_set('America/Santiago');
      $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
      $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      echo "<b>".$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')."</b>" ;
          ?>
        </div>
        <div id="currentTime" style="margin-left:800px;margin-top:-20px"></div> </b>
      <div class="container">

        <div id="cuadro1" style="height: 125px;margin-top:7px;">
            <div class="jumbotron"  style="height: 120px;border-radius: 70px 70px 70px 70px;">
              <div class="container" style="height: 190px;">
              <div class="form-group" style="margin-left:50px;Margin-top:-40px;">


              Despacho:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php
              if(isset($_SESSION["idDeServicioCreado"])){
                echo utf8_encode($data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getServicio());
               echo "  "; echo utf8_encode($data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getSector()); echo " ";
               $idTipoServ=$data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getServicio();
               $idTipoServ=$data->getIdDeTipoDeServicioAPartirDelCodigo($idTipoServ);
               $idSector=$data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getSector();
               $idSector=$data->getIdDeSectorAPartirDelNombre($idSector);
               function deleteElement($element, &$array){
                   $index = array_search($element, $array);
                   if($index !== false){
                       unset($array[$index]);
                   }
               }
               $listadoDeUnidadesAEnviar=$data->determinarCarrosADespacharSegunCodigoDeServicioYSector($idTipoServ,$idSector);
                foreach ($listadoDeUnidadesAEnviar as $lu => $unidad) {
                  $disponibilidad=$data->getEstadoDeEmergenciaDeLaUnidad($unidad);
                  if($disponibilidad!=1){
                    deleteElement($unidad,$listadoDeUnidadesAEnviar);
                  }else{
                    echo utf8_encode($data->getNombreDeUnidadPorId($unidad));
                    echo " ";
                  }
                  }
              }
              ?>" type="text"id="txtDespacho" name="txtDespacho" disabled style="width:400px;margin-top:10px;height:30px;">

              <form id="formEnviarUnidades" name="formEnviarUnidades" action="controlador/despacharUnidades.php" method="post">
                <input type="hidden" name="tipoServicio" id="tipoServicio" value="<?php echo $idTipoServ;?>">
                <input type="hidden" name="sector" id="sector" value="<?php echo $idSector;?>">

              </form>
              <button type="submit"  id="btn_despachar" name="btnsonido" onclick="verificarQueUnidadesSeleccionadasEstenDisponibles()" style="width:60px;height:60px;margin-left:530px;margin-top:-19px;">
                <img src="images/torre.png" alt="x" /></button>

                <?php
                $emergenciasActivas=$data->getServiciosDeEmergenciasActivas();
                if(empty($emergenciasActivas)){
                  echo "<center><h5>No hay emergencias activas</h5></center>";
                }else{?>


              En Despacho:&nbsp;
              <select id="cboxdespacho" name="cboxdespacho" onchange="cargarTabla(),guardarIdDeServicioManipuladoEnSesion()" onclick="borrarOpcionSeleccionarEmergencia()"style="width:400px;height:30px;margin-top:-12px;" >
                <?php $emergenciasActivas=$data->getServiciosDeEmergenciasActivas();
                if(count($emergenciasActivas)>1){?>
                  <option selected disabled value="0">Seleccionar emergencia</option>
              <?php  }
                ?>

                <?php $emergenciasActivas=$data->getServiciosDeEmergenciasActivas();
                if(isset($_SESSION["idDeServicioQueSeEstaManipulando"])){
                  foreach ($emergenciasActivas as $e => $emer) {?>
                    <option <?php if($_SESSION["idDeServicioQueSeEstaManipulando"]==$emer->getId_servicio()){ echo "selected";}?> value="<?php echo $emer->getId_servicio();?>"><?php
                    $momento;
                    $pieces=explode(" ",$emer->getFecha_servicio());
                    $momento = date("d-m-Y", strtotime($pieces[0]));
                    $momento=$momento." ".$pieces[1];
                    echo $momento;
                    echo " "; echo $emer->getFk_tipoDeServicio(); echo " "; $unidadesDelServicio=$data->getUnidadesInvolucradasEnServicio($emer->getId_servicio());
                    foreach ($unidadesDelServicio as $u => $unidad) {
                      echo $unidad." ";
                    }
                    ?> </option>
                <?php
              }
            }else{
              foreach ($emergenciasActivas as $e => $emer) {?>
                <option  value="<?php echo $emer->getId_servicio();?>"><?php
                $momento;
                $pieces=explode(" ",$emer->getFecha_servicio());
                $momento = date("d-m-Y", strtotime($pieces[0]));
                $momento=$momento." ".$pieces[1];
                echo $momento;
                echo " "; echo $emer->getFk_tipoDeServicio(); echo " "; $unidadesDelServicio=$data->getUnidadesInvolucradasEnServicio($emer->getId_servicio());
                foreach ($unidadesDelServicio as $u => $unidad) {
                  echo $unidad." ";
                }
                ?> </option>
            <?php
          }
        }
      }
              ?>


              </select>
            <br><br>
              </div>

             </div>
           </div>
         </div>

         <div id="cuadro1" style="height: 140px;margin-top:5px;">
             <div class="jumbotron"  style="height: 10px;border-radius:  50px 50px 50px 50px">
               <div class="container" style="height: 10px;">
               <div class="form-group" style="margin-left:50px;Margin-top:-40px;">
                 <br>

                 <?php $unidad = $data->obtenerUnidadesDisponibles();?>
                 <?php if (empty($unidad)){?>
                   No hay ninguna unidad disponible. Solicite apoyo a otro cuerpo.
                 <?php }else{ ?>


                   <?php
                   //Si hay servicios disponibles y se esta creando un despacho, mostrar
                   // añadir al despacho, si no se estaa creando un despacho, mostrar despachar undiad extra
                   if(isset($_SESSION["idDeServicioCreado"])){?>

                                        Añadir al despacho:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <select name="cboUnidades" id="cboUnidades" style="width: 180px;height:30px;" >
                                                   <?php

                                                       foreach ($unidad as $u) {
                                                         if(!in_array($u->getIdUnidad(),$listadoDeUnidadesAEnviar)){
                                                           echo "<option value='".$u->getIdUnidad()."'>";
                                                               echo $u->getNombreUnidad();
                                                           echo"</option>";
                                                         }

                                                       }
                                                   ?>
                                         </select>
                                         <div style="margin-top: -26px;margin-left:340px">
                                           <button type="submit"  id="btn_despachar" onclick="agregarUnidadADespacho()" name="btnsonido" style="width:100px;height:33px;margin-top:-20px;">
                                             &nbsp;Asignar</button>
                     </div>
                  <?php }else{?>
                    <div class="form-group" style="margin-left:50px;Margin-top:-40px;">
                      <?php $unidad = $data->obtenerUnidadesDisponibles();
                      if(empty($unidad)){?>

                      <?php }else{?>
                        <br>
                        <br>
                        <br>
                        Despachar unidad extra:
                          <select name="cboUnidadExtra" id="cboUnidadExtra" style="width: 180px;height:30px;" >
                                     <?php
                                         foreach ($unidad as $u) {
                                             echo "<option value='".$u->getIdUnidad()."'>";
                                                 echo $u->getNombreUnidad();
                                             echo"</option>";
                                         }
                                     ?>
                           </select>
                           <div style="margin-top: -26px;margin-left:340px">
                             <button type="submit"  id="btn_despachar" onclick="agregarUnidadAEmergencia()" name="btnsonido" style="width:100px;height:33px;margin-top:-20px;">
                               &nbsp;Despachar</button>
                           </div>
                           
                      <?php }?>

                  <br><br>
                    </div>
                <?php  }?>



                  <?php  }?>
                <br><br>

               </div>


              </div>
            </div>
          </div>




  <div id="cuadro2" style="height: 305px;margin-top:5px;">
      <div class="jumbotron"  style="height: 300px;border-radius: 50px 50px 50px 50px;">
        <div class="container" style="height: 330px;">
          <center style="margin-top:-30px;font-weight:bold;"> Detalle del Servicio</center><br>
        <div id="divtabla2" style="margin-left:-25px;Margin-top:-9px;">

          <table id="tablaDeEmergencia" name="tablaDeEmergencia" class="table table-striped" RULES="cols" >
              <thead>
                <TD style="width:80px;">Unidad</TD>
                <TD>6-0</TD>
                <TD style="width:50px;"></TD>
                <TD>6-3</TD>
                <TD>6-7</TD>
                <TD>6-8</TD>
                <TD>6-9</TD>
                <TD>6-10</TD>
              </thead>
              <tbody>


              </tbody>
              </table>
        </div>

       </div>
     </div>
   </div>

   <div id="cuadro3" style="height: 301px;margin-top:5px;">
       <div class="jumbotron" style="height: 297px;border-radius: 70px 70px 70px 70px">
         <div class="container" style="height: 240px;">

         <div class="form-group" style="margin-left:-20px;margin-top:-35px;">

          <input type="hidden" id="idDeServicioAlQueSeVaAApoyar" name="idDeServicioAlQueSeVaAApoyar" value="">

           <?php
           $listadoDeEntidadesDeApoyo=$data->getTodasLasEntidadesExteriores();
           ?>
            Apoyo otra Entidad:
            <select id="entidadExteriorApoyando" name="entidadExteriorApoyando" style="width:525px;height:25px;">
              <?php
              foreach ($listadoDeEntidadesDeApoyo as $e => $entidadExterior) {?>
                <option value="<?php echo $entidadExterior->getIdEntidadExterior();?>"><?php echo utf8_encode($entidadExterior->getNombreEntidadExterior());?> </option>

          <?php    }
              ?>
            </select>

            <br><br>

            Responsable:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" id="txtresposableapoyo" name="txtresposableapoyo" style="width:300px;">


            P.P.U.U:
            <input type="text" id="txtppuapoyo" name="txtppuapoyo">

            <br><br>
            <div id="divtabla" style="margin-left: 50px;">
            <table  id="tablaApoyosAEmergencia"  name="tablaApoyosAEmergencia" class="table table-striped " RULES="cols" style="overflow:scroll" >
                <thead>
                  <TD >Apoyo</TD>
                  <TD>Responsable</TD>
                  <TD>PPUU</TD>
                </thead>
                <tbody>


                </tbody>
                </table>
            </div >

                <div style="margin-top: 10px;margin-left:550px">
                  <button type="submit" onclick="guardarApoyo()" id="btn_despachar" name="btnsonido" style="width:100px;height:33px;">
                    <img src="images/guardar.png" alt="x" />&nbsp;Guardar</button>
                </div>




         </div>
        </div>

      </div>

    </div>

   <div id="cuadro4" style="height: 184px;margin-top:5px;">
       <div class="jumbotron" style="height: 180px;border-radius: 50px 50px 50px 50px">
         <div class="container" style="height: 240px;">

         <div class="form-group" style="margin-left:-20px;margin-top:-35px;">

            Detalles:<br>
            <textarea style="width:700px;height:100px">
            </textarea>

         </div>
        </div>

      </div>
      <div style="margin-top: -73px;margin-left: 620px;">
        <button type="submit"  id="btn_despachar" name="btnsonido" style="width:100px;height:33px;">
          <img src="images/guardar.png" alt="x" />&nbsp;Guardar</button>

      </div>
    </div>
    <br>

<center style="margin-top:20px;">


  <button type="submit"  id="nuevoDespacho" name="nuevoDespacho" style="width:200px;height:33px;margin-top: -50px">
      <img src="images/camion.png" alt="x" /><a href="centraldeAlarma.php" style="text-decoration:none;color:black;" >&nbsp;Nuevo Despacho</a></button>


      <button type="submit"  id="btn_despachar" onclick="cerrarServicio(),redirigirACentralDeAlarmaSiNoQuedanEmergenciasActivas()" name="btnsonido" style="width:200px;height:33px;margin-top:-100px;">
        <img src="images/comprobar.png" alt="x" /><a style="text-decoration:none;color:black;">&nbsp;Cerrar Servicio</button>
</center>


     </div>
   </div>
 </div>


</div>

<?php
if(isset($_SESSION["idDeServicioQueSeEstaManipulando"])){
  unset($_SESSION["idDeServicioQueSeEstaManipulando"]);
}
?>

<script>
function redirigirACentralDeAlarmaSiNoQuedanEmergenciasActivas(){
  var opcionesRestantes=$('#cboxdespacho option').length;
  if(opcionesRestantes==1){
setTimeout(function(){swal({title: "Sistema de Bomberos",
     text: "No quedan emergencias en progreso",
     type: "info"
}); }, 1000);
    setTimeout(function(){window.location.href = 'centraldeAlarma.php'; }, 3000);
  }
}
function agregarUnidadAEmergencia(){
  var idUnidadExtra=document.getElementById("cboUnidadExtra").value;
  var idEmergencia=document.getElementById("cboxdespacho").value;
  Swal.fire({
    title: 'Sistema de bomberos',
    text: "¿Despachar unidad extra?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      reproducirSonido();
      //settimeout puede llamar una funcion despues de una cantidad especifica de milisegundos
      setTimeout(function(){
        $.ajax({
          url: "controlador/AgregarUnidadAEmergencia.php",
          type: "POST",
          data:{"idUnidadExtra": idUnidadExtra,
        "idEmergencia":idEmergencia}
        }).done(function(data) {
          console.log(data);
          recargarCboDeUnidadesDisponiblesParaEmergenciaEnCurso();
          cargarTabla();
        });
       }, 5000);
    }
  });
}
function agregarUnidadADespacho(){
  event.preventDefault();
  var idDeUnidadAAgregar=document.getElementById("cboUnidades").value;
  var e = document.getElementById("cboUnidades");
  var nomUnidadAAgregar = e.options[e.selectedIndex].text;
  var txtDespacho=document.getElementById("txtDespacho").value;



  Swal.fire({
    title: 'Sistema de bomberos',
    text: "¿Agregar unidad?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "controlador/AgregarUnidadesADespachoInicial.php",
        type: "POST",
        data:{"idDeUnidadAAgregar": idDeUnidadAAgregar}
      }).done(function(data) {
        console.log(data);
        document.getElementById("txtDespacho").value=txtDespacho +" "+ nomUnidadAAgregar;
        recargarCboDeUnidadesDisponibles();
      });
    }
  });
}

function verificarQueUnidadesSeleccionadasEstenDisponibles(){
  var sector=document.getElementById("sector").value;;
  var servicio=document.getElementById("tipoServicio").value;;
  $.ajax({
    url: "controlador/determinarUnidadesDisponiblesParaEmergencia.php",
    type: "POST",
    data:{"sector": sector, "servicio": servicio}
  }).done(function(data) {
    console.log(data);
    if(data=="No se selecciono ninguna unidad disponible"){
      swal({
        title: "Sistema de bomberos",
        text: data + " o no ingreso destino y sector",
        type: "error"
      });
    }else {
      despacharUnidadesALaEmergencia();
    }
  });
}
function borrarOpcionSeleccionarEmergencia(){
  $("#cboxdespacho option[value='0']").remove();
}
function reproducirSonido(){
  var music = new Audio('sonidos/bleep.mp3');
  music.play();
}
function guardarIdDeServicioManipuladoEnSesion(){
var id=document.getElementById("cboxdespacho").value;
  $.ajax({
    url: "controlador/IniciarIdServicioManipuladoEnSesion.php",
    type: "POST",
    data:{"idServicioSeleccionado": id}
  }).done(function(data) {
    //console.log(data);
  });
}
function cargarCboDeServiciosActivos(){
  $.ajax({
    url: "controlador/GetEmergenciasActivasMedianteAjax.php",
    type: "POST",
    data:{"datos": ""}
  }).done(function(data) {
    console.log(data);
    $('#cboxdespacho')
    .find('option')
    .remove()
    .end();
    $('#cboxdespacho').append(data);
    cargarTabla();
  });
}
function recargarCboDeUnidadesDisponibles(){
  $.ajax({
    url: "controlador/RecargarUnidadesDisponiblesDelCboDeDespacho.php",
    type: "POST",
    data:{"datos":"nada"}
  }).done(function(data) {
    console.log(data);
    $('#cboUnidades')
    .find('option')
    .remove()
    .end();
    $('#cboUnidades').append(data);
  });
}
function recargarCboDeUnidadesDisponiblesParaEmergenciaEnCurso(){
  $.ajax({
    url: "controlador/RecargarUnidadesDisponiblesDelCboDeDespacho.php",
    type: "POST",
    data:{"datos":"nada"}
  }).done(function(data) {
    console.log(data);
    $('#cboUnidadExtra')
    .find('option')
    .remove()
    .end();
    $('#cboUnidadExtra').append(data);
  });
}
function cerrarServicio(){
//Esto sirve para subir arriba$('html, body').animate({scrollTop:0}, "300");
  var idSer=document.getElementById("idDeServicioAlQueSeVaAApoyar").value;
  $.ajax({
    url: "controlador/VerificarQueSeHayaAlcanzado6_10EnTodosLosCarrosInvolucrados.php",
    type: "POST",
    data:{"idServicioACerrar": idSer},
    success: function(data){
      var resultado = data;
      if(resultado === "si"){
        $.ajax({
          url: "controlador/CerrarServicio.php",
          type: "POST",
          data:{"idServicioACerrar": idSer},
          success: function(data){
            console.log(data);
            cargarCboDeServiciosActivos();
            recargarCboDeUnidadesDisponibles();
            swal({
              title: "Sistema de bomberos:",
              text:"Servicio cerrado",
              type: "success"
            });
            }
        });
      }else if(resultado === "no"){
        swal({
          title: "Sistema de bomberos",
          text: "No puede cerrar el servicio hasta que todos los carros de la emergencia hayan dado el 6-10",
          type: "error"
        });
      }
      }
  });
}
function guardarApoyo(){
  var idSer=document.getElementById("idDeServicioAlQueSeVaAApoyar").value;
  var entidadExterior=document.getElementById("entidadExteriorApoyando").value;
  var responsable=document.getElementById("txtresposableapoyo").value;
  var ppuu=document.getElementById("txtppuapoyo").value;
  $.ajax({
    url: "controlador/AgregarApoyoEntidadExteriorAServicio.php",
    type: "POST",
    data:{"idServicio": idSer, "entidad":entidadExterior,
    "res":responsable, "ppuu":ppuu},
    success: function(data){
        swal({
          title: "Sistema de bomberos",
          text:" Operación exitosa",
          type:"success"
        });
      document.getElementById("txtresposableapoyo").value="";
      document.getElementById("txtppuapoyo").value="";
      var id = document.getElementById("cboxdespacho").value;
      document.getElementById("idDeServicioAlQueSeVaAApoyar").value=id;
      $.ajax({
        url: "getApoyosDelServicio.php",
        type: "POST",
        data:{"idServicio":id}
      }).done(function(data) {
        console.log(data);
        var objetos=JSON.parse(data);
         $("#tablaApoyosAEmergencia tbody tr").remove();
        var i;
        for (i = 0; i < objetos.length; i++) {
          var objetoJSON= $.parseJSON(objetos[i]);
          var idApoyo=objetoJSON.idApoyo;
          var nombreEntidadApoyo=objetoJSON.nombreEntidadApoyo;
          var responsableApoyo=objetoJSON.responsableApoyo;
          var ppuuApoyo=objetoJSON.ppuuApoyo;
          if (!document.getElementsByTagName) return;
          //la siguiente linea obtiene el elemento por nombre del tag, pero la segunda coincidecnia se rescata
          tabBody=document.getElementsByTagName("tbody").item(1);
          row=document.createElement("tr");
          cell1 = document.createElement("td");
          textnode1=document.createTextNode(nombreEntidadApoyo);
          textnode2=document.createTextNode(responsableApoyo);
          cell2 = document.createElement("td");
          textnode3=document.createTextNode(ppuuApoyo);
          cell3 = document.createElement("td");
          cell1.appendChild(textnode1);
          cell2.appendChild(textnode2);
          cell3.appendChild(textnode3)
          row.appendChild(cell1);
          row.appendChild(cell2);
          row.appendChild(cell3);
          tabBody.appendChild(row);
        }
      });
      }
  });
}
function actualizarDatosOBACConductoryNPersonal(idSerUnidad){
  var htmlAPoner='OBAC <input type="text" id="OBAC" class="swal2-input">' +
  'Conductor <input  type="text" id="Conductor" class="swal2-input">'+
  'Cantidad de bomberos <input  type="text" id="NPersonal" class="swal2-input">';
  $.ajax({
    url: "getDatosOBACConductorYCantidad.php",
    type: "POST",
    data:{"idServicioUnidad": idSerUnidad},
    success: function(data){
      console.log(data);
      var datosRescatados=JSON.parse(data);
      if( (datosRescatados.obac!="") || (datosRescatados.conductor!="") || (datosRescatados.cantidad!="") ){
        htmlAPoner=  'OBAC <input  value="'+datosRescatados.obac+'" type="text" id="OBAC" class="swal2-input">' +
        'Conductor <input  value="'+datosRescatados.conductor+'" type="text" id="Conductor" class="swal2-input">'+
        'Cantidad de bomberos <input  value="'+datosRescatados.cantidad+'" type="text" id="NPersonal" class="swal2-input">';
      }
      swal({
        title: 'Ingresar datos:',
        html: htmlAPoner,
        preConfirm: function () {
          return new Promise(function (resolve) {
            resolve([
              $('#OBAC').val(),
              $('#Conductor').val(),
              $('#NPersonal').val()
            ])
          })
        },
        onOpen: function () {
          $('#OBAC').focus()
        }
      }).then(function (result) {
        var ar=(JSON.stringify(result)).split(/(?:,|{|}|")+/);
        var nomOb=ar[3];
        var nomCon=ar[4];
        var nPer=ar[5];
        swal({
            title: "Sistema de bomberos",
            text: "Operación exitosa",
            type: "success",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ok",
        })
        $.ajax({
          url: "actualizarOBACConductorYNPersonal.php",
          type: "POST",
          data:{"nombreOBAC": nomOb,
                "nombreConductor": nomCon,
                "cantidadPersonal": nPer,
                "idServicioUnidad": idSerUnidad,}
        });
      }).catch(swal.noop)
    }
  });
}
function mostrarhora(){
var f=new Date();
cad=f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();
window.status =cad;
setTimeout("mostrarhora()",1000);
}
function despacharUnidadesALaEmergencia(){
  var txtDespacho=document.getElementById("txtDespacho").value;
  if(txtDespacho==""){
    swal({
      title: "Sistema de bomberos",
      text: "No ha ingresado los datos para un nuevo despacho",
      type: "error"
    });
  }else{
    Swal.fire({
      title: 'Sistema de bomberos',
      text: "¿Despachar unidades?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        reproducirSonido();
        setTimeout(function(){ document.getElementById("formEnviarUnidades").submit(); }, 5000);
      }
    });
  }
}
function obtenerHoraActual(){
  var today = new Date();
  var minutos=today.getMinutes();
  if (minutos<10){
    minutos= "0"+minutos;
  }
  var segundos =today.getSeconds();
  if (segundos<10){
    segundos="0"+segundos;
  }
  var time = today.getHours() + ":" + minutos + ":" + segundos;
  return time;
}
$(document).ready(
 function() {
 setInterval(function() {
 var hora = obtenerHoraActual();
  $('#currentTime').text(hora);
}, 1000);
});
function marcarHora(){
  return $('#currentTime').text();
}
//registra el momento exacto y muestra la hora exacta en la que se hizo la actualizacion
function registrarHora6_0(idDeLaEmergencia){
  $.ajax({
    url: "registrarEstadoDeCarro6_0.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
      document.getElementById(idDeLaEmergencia).innerHTML = data;
      }
  });
}
function registrarHora6_3(idDeLaEmergencia, e){
  $.ajax({
    url: "registrarEstadoDeCarro6_3.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
      e.innerHTML = data;
    }
  });
}
function registrarHora6_7(idDeLaEmergencia, e){
  $.ajax({
    url: "registrarEstadoDeCarro6_7.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
      e.innerHTML = data;
    }
  });
}
function registrarHora6_8(idDeLaEmergencia, e){
  $.ajax({
    url: "registrarEstadoDeCarro6_8.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
      e.innerHTML = data;
    }
  });
}
function registrarHora6_9(idDeLaEmergencia,e){
  $.ajax({
    url: "registrarEstadoDeCarro6_9.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
      e.innerHTML = data;
    }
  });
}
function registrarHora6_10(idDeLaEmergencia, e){
  $.ajax({
    url: "registrarEstadoDeCarro6_10.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
      e.innerHTML = data;
    }
  });
}
function cargarTabla(){
  var id = document.getElementById("cboxdespacho").value;
  //cargarInfoDeApoyos aqui
  document.getElementById("idDeServicioAlQueSeVaAApoyar").value=id;
  $.ajax({
    url: "getApoyosDelServicio.php",
    type: "POST",
    data:{"idServicio":id}
  }).done(function(data) {
    console.log(data);
    var objetos=JSON.parse(data);
     $("#tablaApoyosAEmergencia tbody tr").remove();
    var i;
    for (i = 0; i < objetos.length; i++) {
      var objetoJSON= $.parseJSON(objetos[i]);
      var idApoyo=objetoJSON.idApoyo;
      var nombreEntidadApoyo=objetoJSON.nombreEntidadApoyo;
      var responsableApoyo=objetoJSON.responsableApoyo;
      var ppuuApoyo=objetoJSON.ppuuApoyo;
      if (!document.getElementsByTagName) return;
      //la siguiente linea obtiene el elemento por nombre del tag, pero la segunda coincidecnia se rescata
      tabBody=document.getElementsByTagName("tbody").item(1);
      row=document.createElement("tr");
      cell1 = document.createElement("td");
      textnode1=document.createTextNode(nombreEntidadApoyo);
      textnode2=document.createTextNode(responsableApoyo);
      cell2 = document.createElement("td");
      textnode3=document.createTextNode(ppuuApoyo);
      cell3 = document.createElement("td");
      cell1.appendChild(textnode1);
      cell2.appendChild(textnode2);
      cell3.appendChild(textnode3)
      row.appendChild(cell1);
      row.appendChild(cell2);
      row.appendChild(cell3);
      tabBody.appendChild(row);
    }
  });
  $.ajax({
    url: "getServiciosUnidad.php",
    type: "POST",
    data:{"datos":id}
  }).done(function(data) {
    console.log(data);
    var objetos=JSON.parse(data);
     $("#tablaDeEmergencia tbody tr").remove();
    var i;
    for (i = 0; i < objetos.length; i++) {
      var objetoJSON= $.parseJSON(objetos[i]);
      var idEmergencia=objetoJSON.id;
      var nombreUnidadEmergencia=objetoJSON.nombre;
      var momento6_0Emergencia=objetoJSON.momento6_0;
      var momento6_3Emergencia=objetoJSON.momento6_3;
      var momento6_7Emergencia=objetoJSON.momento6_7;
      var momento6_8Emergencia=objetoJSON.momento6_8;
      var momento6_9Emergencia=objetoJSON.momento6_9;
      var momento6_10Emergencia=objetoJSON.momento6_10;
      if (!document.getElementsByTagName) return;
      tabBody=document.getElementsByTagName("tbody").item(0);
      row=document.createElement("tr");
      cell1 = document.createElement("td");
      textnode1=document.createTextNode(nombreUnidadEmergencia);
      textnode2=document.createTextNode(momento6_0Emergencia);
      cell2 = document.createElement("td");
      cell2.setAttribute("id",idEmergencia);
      cell2.setAttribute('onclick','registrarHora6_0('+idEmergencia+')');
      //this.innerText = getHora6_0('+idEmergencia+',this)'
      textnode4=document.createTextNode(momento6_3Emergencia);
      cell4 = document.createElement("td");
      cell4.setAttribute("id",idEmergencia);
      cell4.setAttribute('onclick','registrarHora6_3('+idEmergencia+',this) ');
      textnode5=document.createTextNode(momento6_7Emergencia);
      cell5 = document.createElement("td");
      cell5.setAttribute("id",idEmergencia);
      cell5.setAttribute('onclick','registrarHora6_7('+idEmergencia+',this) ');
      textnode6=document.createTextNode(momento6_8Emergencia);
      cell6 = document.createElement("td");
      cell6.setAttribute("id",idEmergencia);
      cell6.setAttribute('onclick','registrarHora6_8('+idEmergencia+',this) ');
      textnode7=document.createTextNode(momento6_9Emergencia);
      cell7 = document.createElement("td");
      cell7.setAttribute("id", idEmergencia);
      cell7.setAttribute('onclick','registrarHora6_9('+idEmergencia+',this) ');
      textnode8=document.createTextNode(momento6_10Emergencia);
      cell8 = document.createElement("td");
      cell8.setAttribute("id", idEmergencia);
      cell8.setAttribute('onclick','registrarHora6_10('+idEmergencia+',this) ');
      var cell3=document.createElement("INPUT");
      var foto = document.getElementById("foto");
      cell3.setAttribute('onclick','actualizarDatosOBACConductoryNPersonal('+idEmergencia+')');
      cell3.setAttribute("type", "submit");
      cell3.setAttribute("value", "");
      cell3.setAttribute("style","border-radius: 70px 70px 70px 70px;width:50px;height:50px;");
      cell3.setAttribute("img","images/bombero.png");
      cell1.appendChild(textnode1);
      cell2.appendChild(textnode2);
      cell4.appendChild(textnode4)
      cell5.appendChild(textnode5);
      cell6.appendChild(textnode6);
      cell7.appendChild(textnode7);
      cell8.appendChild(textnode8);
      row.appendChild(cell1);
      row.appendChild(cell2);
      row.appendChild(cell3);
      row.appendChild(cell4);
      row.appendChild(cell5);
      row.appendChild(cell6);
      row.appendChild(cell7);
      row.appendChild(cell8);
      tabBody.appendChild(row);
    }
  });
}
window.onload = function() {
  cargarTabla();
};
</script>


  </body>
</html>
