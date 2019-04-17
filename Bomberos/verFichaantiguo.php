<!DOCTYPE html>

<?php
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    $data = new Data();
    session_start();
    if(isset($_SESSION["infoPersonalSolicitada"])){
      $infoPersonal=$_SESSION["infoPersonalSolicitada"];
    }
    if(isset($_SESSION["infoMedidasSolicitada"])){
      $infoMedidas=$_SESSION["infoMedidasSolicitada"];
    }
    if(isset($_SESSION["infoBomberilSolicitada"])){
      $infoBomberil=$_SESSION["infoBomberilSolicitada"];
    }
    if(isset($_SESSION["infoLaboralSolicitada"])){
      $infoLaboral=$_SESSION["infoLaboralSolicitada"];
    }
    if(isset($_SESSION["infoMedica1Solicitada"])){
      $infoMedica1=$_SESSION["infoMedica1Solicitada"];
    }
    if(isset($_SESSION["infoMedica2Solicitada"])){
      $infoMedica2=$_SESSION["infoMedica2Solicitada"];
    }
    if(isset($_SESSION["infoFamiliarSolicitada"])){
      $infoFamiliar=$_SESSION["infoFamiliarSolicitada"];
    }
    if(isset($_SESSION["infoAcademicaSolicitada"])){
      $infoAcademica=$_SESSION["infoAcademicaSolicitada"];
    }
    if(isset($_SESSION["infoEntrenamientoEstandarSolicitada"])){
      $infoEntrenamientoEstandar=$_SESSION["infoEntrenamientoEstandarSolicitada"];
    }
    if(isset($_SESSION["infoHistoricaSolicitada"])){
      $infoHistorica=$_SESSION["infoHistoricaSolicitada"];
    }
    if(isset($_SESSION["infoCargosSolicitada"])){
      $infoCargos=$_SESSION["infoCargosSolicitada"];
    }
/*
    if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
      unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
    }*/
    if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
      unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
    }
    if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
      unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
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
              <li><a href="crearUnidades.php" >Crear</a></li>
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



    <div style="width: 1055px" style="height: 900px">
        <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
          <div class="container" style="margin-left:-20px;">


          <div style="margin-left:30px;">
             <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#antecedentes">
                   Información Personal
               </button>
           </div>

           <div class="col-md-12 collapse" id="antecedentes">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Personal
                   </div>
                   <div class="panel-body">

                       <div class="col-sm-5" >
                         <div style="margin-left: 0px;">
                           <img src="images/avatar_opt.jpg">
                         </div>

                         Talla Chaqueta/camisa : <input class="form-control" value="<?php echo $infoMedidas->getTallaChaquetaCamisa();?>" type="text" name="txtchaqueta" disabled>
                         Talla Pantalón: <input class="form-control" value="<?php echo $infoMedidas->getTallaPantalon();?>" type="text" name="txtpantalon" disabled>
                         Talla buzo: <input class="form-control" value="<?php echo $infoMedidas->getTallaBuzo();?>" type="text" name="txtbuzo" disabled>
                         Talla Calzado: <input class="form-control" value="<?php echo $infoMedidas->getTallaCalzado();?>" type="text" name="txtcalzado" disabled>
                         Altura :<input class="form-control" value="<?php echo $infoPersonal->getAlturaEnMetros();?>"  type="text" name="txtaltura" disabled>
                         Peso: <input class="form-control" value="<?php echo $infoPersonal->getPeso();?>"  type="text" name="txtpeso" disabled>
                         Perteneció a Brigada Juvenil? <input class="form-control" value="<?php echo $infoPersonal->getPertenecioABrigadaJuvenil();?>"  type="text" name="txtbrigada" disabled>
                         Instructor: <input class="form-control" value="<?php echo $infoPersonal->getEsInstructor();?>"  type="text" name="txtinstructor" disabled>

                       </div>
                       <div class="col-md-5" style="margin-left: 50px;">
                         Rut: <input class="form-control" value="<?php echo $infoPersonal->getRutInformacionPersonal();?>"  type="text" name="txtRut" disabled>
                         Nombre: <input class="form-control" value="<?php echo utf8_encode($infoPersonal->getNombreInformacionPersonal());?>" type="text" name="txtNombre" disabled>
                         Apellido Paterno: <input class="form-control" value="<?php echo utf8_encode($infoPersonal->getApellidoPaterno());?>" type="text" name="txtApePa" disabled>
                         Apellido Materno: <input class="form-control" value="<?php echo utf8_encode($infoPersonal->getApellidoMaterno());?>" name="txtApeMa" disabled>
                         Fecha Nacimiento: <input class="form-control" value="<?php echo $infoPersonal->getFechaNacimiento();?>" name="txtFecha" type="date" disabled>
                         Estado Civil:
                         <select class="form-control" name="cboEstadoCivil" disabled>
                         <?php
                         require_once("model/Data.php");
                         require_once("model/Tbl_EstadoCivil.php");
                         $d= new Data();
                         $estadosCiviles = $d->readEstadosCiviles();
                         foreach($estadosCiviles as $e => $estado){
                           if($infoPersonal->getFkEstadoCivil()==$estado->getIdEstadoCivil()){?>
                             <option value="<?php echo $estado->getIdEstadoCivil(); ?>" selected ><?php echo $estado->getNombreEstadoCivil(); ?></option>
                             <?php
                           }else{
                               ?>
                               <option value="<?php echo $estado->getIdEstadoCivil(); ?>" ><?php echo $estado->getNombreEstadoCivil(); ?></option>
                               <?php
                             }
                           }
                           ?>
                           <?php
                           ?>
                         </select>
                         Dirección: <input class="form-control" value="<?php echo $infoPersonal->getDireccionPersonal();?>" Type="text" name="txtDireccion" disabled>
                         Teléfonos:  <input class="form-control" value="<?php echo $infoPersonal->getTelefonoFijo();?>" type="text" name="txtTelefonos" disabled>
                         Email: <input class="form-control" value="<?php echo $infoPersonal->getEmail();?>" type="text" name="txtemail" disabled>
                         Genero:
                         <select class="form-control" name="cboGenero" disabled>
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Genero.php");
                           $d= new Data();
                           $generos = $d->readGeneros();
                           foreach($generos as $g => $genero){
                             if($infoPersonal->getFkGenero()==$genero->getIdGenero()){?>
                               <option value="<?php echo $genero->getIdGenero(); ?>" selected ><?php echo $genero->getNombreGenero(); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $genero->getIdGenero(); ?>" ><?php echo $genero->getNombreGenero(); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php
                             ?>
                           </select>
                           <br>

                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                         </center>


                                                     <br>
                       </div>
                       <br>
                       <br>


                   </div>
               </div>
           </div>
           <!-- INFORMACION PERSONAL -->
           <!-- INFORMACION bomberilL -->
           <br><br>
           <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#bomberil">
                   Información Bomberil
               </button>
           </div>
           <div class="col-md-12 collapse" id="bomberil">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Bomberil
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">
                         Región : <!-- <input class="form-control" type="text" name="txtregion"> --><!--Region del libertador bernardo ohggins-->
                         <select class="form-control" name="cboRegion" disabled>
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Region.php");
                           $d= new Data();
                           $regiones = $d->readRegiones();
                           foreach($regiones as $r => $region){
                             if($infoBomberil->getfkRegioninformacionBomberil()==$region->getIdRegion()){?>
                               <option value="<?php echo $region->getIdRegion(); ?>" selected ><?php echo utf8_encode($region->getNombreRegion()); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $region->getIdRegion(); ?>" ><?php echo utf8_encode($region->getNombreRegion()); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php
                             ?>
                           </select>

                         Compañía: <!-- <input class="form-control" type="text" name="txtcompania"> --> <!--Combobox-->
                         <!-- <input class="form-control" value="<?php /*echo $infoBomberil->getfkCompaniainformacionBomberil();*/?>" type="text" name="txtcompania" disabled> -->
                         <select name="txtcompania" class="form-control"  disabled>
                           <?php
                               $companias = $data->readSoloCompanias();
                               foreach ($companias as $c => $compania) {
                               if($infoBomberil->getfkCompaniainformacionBomberil()==$compania->getIdEntidadACargo()){?>
                                 <option value="<?php echo $compania->getIdEntidadACargo(); ?>" selected ><?php echo utf8_encode($compania->getNombreEntidadACargo()); ?></option>
                                 <?php
                               }else{
                                   ?>
                                   <option value="<?php echo $compania->getIdEntidadACargo(); ?>" ><?php echo utf8_encode($compania->getNombreEntidadACargo()); ?></option>
                                   <?php
                                 }
                               }
                               ?>
                               <?php
                               ?>
                             </select>

                         Fecha Ingreso:
                         <br>
                         <input class="form-control" value="<?php echo $infoBomberil->getfechaIngresoinformacionBomberil();?>" type="date" name="txtfingreso" disabled>
                         Nº Reg.General: <input class="form-control" value="<?php echo $infoBomberil->getNRegGeneralinformacionBomberil();?>" type="text" name="txtgeneral" disabled>
                       </div>
                       <div class="col-md-6">
                         Cuerpo: <input class="form-control" value="<?php echo $infoBomberil->getcuerpoInformacionBomberil();?>" type="text" name="txtcuerpo" disabled>
                         Cargo: <!-- <input class="form-control" type="text" name="txtcargo"> -->
                         <select class="form-control" name="cboCargo" disabled>
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Cargo.php");
                           $d= new Data();
                           $cargos = $d->readCargos();
                           foreach($cargos as $c => $cargo){
                             if($infoBomberil->getfkCargoinformacionBomberil()==$cargo->getIdCargo()){?>
                               <option value="<?php echo $cargo->getIdCargo(); ?>" selected ><?php echo $cargo->getNombreCargo(); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $cargo->getIdCargo(); ?>" ><?php echo $cargo->getNombreCargo(); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php
                             ?>
                           </select>


                         Estado: <!-- <input class="form-control" type="text" name="txtestado" > --> <!--Combobox -->
                         <!-- no se ve-->
                         <select class="form-control" name="cboEstadoBombero" disabled>
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_EstadoBombero.php");
                           $d= new Data();
                           $estados = $d->readEstadosDeBomberos();
                           foreach($estados as $e => $estado){
                             if($infoBomberil->getfkEstadoinformacionBomberil()==$estado->getIdEstado()){?>
                               <option value="<?php echo $estado->getIdEstado(); ?>" selected ><?php echo utf8_encode($estado->getNombreEstado()); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $estado->getIdEstado(); ?>" ><?php echo utf8_encode($estado->getNombreEstado()); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php
                             ?>
                           </select>

                         Nº Reg.Cia: <input class="form-control" value="<?php echo $infoBomberil->getNRegCiainformacionBomberil();?>" name="txtcia" disabled>
                         <br>
                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                         </center>

                       </div>
                   </div>
               </div>
           </div>
           <!-- INFORMACION bomberilL -->
           <!-- INFORMACION laboral -->
           <br>
           <br>
           <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#laboral">
                   Información Laboral
               </button>
           </div>
           <div class="col-md-12 collapse" id="laboral">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Laboral
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-5">

                         Nombre Empresa : <input class="form-control" value="<?php
                         if(isset($infoLaboral)){
                           echo $infoLaboral->getnombreEmpresainformacionLaboral();
                         }
                         ?>" type="text" name="txtnomempresa" disabled>
                         Dirección Empresa: <input class="form-control" value="<?php
                         if(isset($infoLaboral)){
                          echo $infoLaboral->getdireccionEmpresainformacionLaboral();
                         }
                         ?>" type="text" name="txtdirecempresa" disabled>
                         Teléfono Empresa: <input class="form-control" value="<?php
                         if(isset($infoLaboral)){
                              echo $infoLaboral->gettelefonoEmpresainformacionLaboral();
                         }
                      ?>" type="text" name="txttlfempresa" disabled>

                         Fecha Ingreso: <input class="form-control" value="<?php
                         if(isset($infoLaboral)){
                               echo $infoLaboral->getfechaIngresoEmpresainformacionLaboral();
                         }
                        ?>" type="date" name="txfingresoempresa" disabled>



                       </div>
                       <div class="col-md-5">

                         cargo : <input class="form-control" value="<?php
                         if(isset($infoLaboral)){
                                echo $infoLaboral->getcargoEmpresainformacionLaboral();
                         }
                        ?>" type="text" name="txtcargo" disabled>

                         Area/Depto de trabajo: <input class="form-control" value="<?php
                         if(isset($infoLaboral)){
                              echo $infoLaboral->getareaDeptoEmpresainformacionLaboral();
                         }
                        ?>" type="text" name="txtareatrabajo" disabled>
                         AFP: <input class="form-control" value="<?php
                         if(isset($infoLaboral)){
                               echo $infoLaboral->getafp_informacionLaboral();
                         }
                        ?>" type="text" name="txtafp" disabled>
                         Profesión: <input class="form-control" value="<?php
                         if(isset($infoLaboral)){
                              echo $infoLaboral->getprofesion_informacionLaboral();
                         }
                         ?>" name="txtprofesion" disabled>
                         <br>
                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                         </center>

                       </div>
                   </div>
               </div>
           </div>
           <!-- INFORMACION laboral -->
           <!-- INFORMACION medica -->
           <br>
           <br>
           <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#medica">
                   Información Médica
               </button>
           </div>
           <div class="col-md-12 collapse" id="medica">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Médica
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">
                         Prestación Médica : <input class="form-control"  value="<?php echo $infoMedica1->getprestacionMedica_informacionMedica1();?>" type="text" name="txtpresmedica" disabled>
                         Alergias: <input class="form-control"  value="<?php echo $infoMedica1->getalergias_informacionMedica1();?>" type="text" name="txtalergias" disabled>
                         Enfermedades Crónicas: <input class="form-control"  value="<?php echo $infoMedica1->getenfermedadesCronicasinformacionMedica1();?>" type="text" name="txtenfermedadescronicas" disabled>
                         Medicamentos Habituales: <input class="form-control"  value="<?php echo $infoMedica2->getmedicamentosHabitualesinformacionMedica2();?>" type="text" name="txtmedicamentosHabituales" disabled>
                         Nombre del Contacto: <input class="form-control"  value="<?php echo $infoMedica2->getnombreContactoinformacionMedica2();?>" type="text" name="txtnomContacto" disabled>
                         Teléfono del Contacto : <input class="form-control"  value="<?php echo $infoMedica2->gettelefonoContactoinformacionMedica2();?>" type="text" name="txttlfcontacto" disabled>

                       </div>
                       <div class="col-md-6">

                         Parentesco del Contacto: <!-- <input class="form-control" type="text" name="txtparentesco"> -->
                         <select class="form-control" name="cboParentesco1" disabled>
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Parentesco.php");
                           $d= new Data();
                           $parentescos = $d->readParentescos();
                           foreach($parentescos as $p => $parentesco){
                             if($infoMedica2->getfkParentescoContactoinformacionMedica2()==$parentesco->getIdParentesco()){?>
                               <option value="<?php echo $parentesco->getIdParentesco(); ?>" selected ><?php echo utf8_encode($parentesco->getNombreParentesco()); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $parentesco->getIdParentesco(); ?>" ><?php echo utf8_encode($parentesco->getNombreParentesco()); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php
                             ?>
                           </select>
                         Nivel de Actividad Fisica: <input class="form-control"  value="<?php echo $infoMedica2->getnivelActividadFisicainformacionMedica2();?>" type="text" name="txtactvfisica" disabled>
                         <?php
                         $donanteChequeado="checked";
                         $fumadorChequeado="checked";
                        if($infoMedica2->getesDonanteinformacionMedica2()==FALSE){
                          $donanteChequeado="";
                        }
                        if($infoMedica2->getesFumadorinformacionMedica2()==FALSE){
                          $fumadorChequeado="";
                        }
                         ?>
                         Donante:  <input class="form-control" type="checkbox" <?php echo $donanteChequeado;?> name="txtdonante" disabled>
                         Fumador: <input class="form-control" type="checkbox" <?php echo $fumadorChequeado;?> name="txtfumador" disabled>
                         Grupo Sanguineo: <!-- <input class="form-control" type="text" name="txtgruposanguineo"> -->
                         <select class="form-control" name="cboGrupoSanguineo" disabled>
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_GrupoSanguineo.php");
                           $d= new Data();
                           $grupos = $d->readGruposSanguineos();
                           foreach($grupos as $g => $grupo){
                             if($infoMedica2->getfkGrupoSanguineoinformacionMedica2()==$grupo->getIdGrupoSanguineo()){?>
                               <option value="<?php echo $grupo->getIdGrupoSanguineo(); ?>" selected ><?php echo $grupo->getNombreGrupoSanguineo(); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $grupo->getIdGrupoSanguineo(); ?>" ><?php echo $grupo->getNombreGrupoSanguineo(); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php
                             ?>
                           </select>

                           <br>
                               <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                           </center>

                       </div>
                   </div>
               </div>
           </div>
           <!-- INFORMACION medica -->
           <!-- INFORMACION Familiar -->
           <br>
           <br>
           <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#familiar">
                   Información Familiar
               </button>
           </div>
           <div class="col-md-12 collapse" id="familiar">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Familiar
                   </div>
                   <div class="panel-body">


                       <div class="col-sm-6">

                         <!-- Nivel de actividad fisica: <input class="form-control" type="text" name="txtactvfisica"> -->
                         <table class="table table-striped">
                             <thead>
                               <tr>
                                 <th>Nombre</th>
                                 <th>Fecha de Nacimiento</th>
                                 <th>Parentesco</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php
                               foreach ($infoFamiliar as $iFamiliar => $datos) {
                               ?>
                               <tr>
                                 <td><?php echo $datos->getNombresInformacionFamiliar();?></td>
                                 <td><?php
                                 $fechaSinConvertir = $datos->getFechaNacimientoInformacionFamiliar();
                                 $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                 echo $fechaConvertida;?></td>
                                 <td><?php echo utf8_encode($d->buscarNombreParentescoPorId($datos->getfkParentescoinformacionFamiliar())->getNombreParentesco());?></td>
                            <?php
                             }
                               ?>
                               </tr>

                             </tbody>
                           </table>

                      </div>
                      <div class="col-md-6">
                         <br><br><br><br><br><br>
                          </center>

                      </div>

                   </div>

               </div>
           </div>
             <!-- INFORMACION Familiar -->
               <!-- INFORMACION academica -->
           <br>
           <br>

           <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#academica">
                   Información Académica
               </button>
           </div>
           <div class="col-md-12 collapse" id="academica">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Académica
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">

                         <table class="table table-striped">
                             <thead>
                               <tr>
                                 <th>Fecha</th>
                                 <th>Actividad</th>
                                 <th>Estado</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php
                               foreach ($infoAcademica as $iAcademica => $datos) {
                               ?>
                               <tr>
                                 <td><?php echo $datos->getactividadInformacionAcademica();?></td>
                                 <td><?php
                                 $fechaSinConvertir = $datos->getfechaInformacionAcademica();
                                 $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                 echo $fechaConvertida;?></td>
                                 <td><?php echo $d->buscarEstadoDeCursoPorId($datos->getfkEstadoCursoInformacionAcademica());?></td>
                            <?php
                             }
                               ?>
                               </tr>

                             </tbody>
                           </table>

                      </div>
                      <div class="col-md-6">
                         <br><br><br><br><br><br>
                          </center>

                      </div>
                   </div>

               </div>
             </div>
               <!-- INFORMACION academica -->
                 <!-- INFORMACION estandar -->
               <br>
               <br>

               <div class="col-md-24">
                   <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#estandar">
                       Información Entrenamiento Estandar
                   </button>
               </div>
               <div class="col-md-12 collapse" id="estandar">
                   <div class="panel panel-primary">
                       <div class="panel-heading panel-title">
                           Información Entrenamiento Estandar
                       </div>
                       <div class="panel-body">
                           <div class="col-sm-6">
                             <table class="table table-striped">
                                 <thead>
                                   <tr>
                                     <th>Fecha</th>
                                     <th>Actividad</th>
                                     <th>Estado</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <?php
                                   foreach ($infoEntrenamientoEstandar as $iEstandar => $datos) {
                                   ?>
                                   <tr>
                                     <td><?php echo $datos->getactividad();?></td>
                                     <td><?php
                                     $fechaSinConvertir = $datos->getfechaEntrenamientoEstandar();
                                     $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                     echo $fechaConvertida;?></td>
                                     <td><?php echo $d->buscarEstadoDeCursoPorId($datos->getFkEstadoCurso());?></td>
                                <?php
                                 }
                                   ?>
                                   </tr>

                                 </tbody>
                               </table>

                          </div>
                          <div class="col-md-6">
                             <br><br><br><br><br><br>
                              </center>

                          </div>
                       </div>

                   </div>
               </div>

                 <!-- INFORMACION estandar -->
                 <!-- INFORMACION historica -->
               <br>
               <br>

               <div class="col-md-24">
                   <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#historica">
                       Información Histórica
                   </button>
               </div>
               <div class="col-md-12 collapse" id="historica">
                   <div class="panel panel-primary">
                       <div class="panel-heading panel-title">
                           Información Histórica
                       </div>
                       <div class="panel-body" style="margin-left: -20px;">
                           <div class="col-sm-6">



                             <table class="table table-striped">
                                 <thead>
                                   <tr>
                                     <th>Región</th>
                                     <th>Cuerpo</th>
                                     <th>Compañía</th>
                                     <th>Fecha</th>
                                     <th>Premio</th>
                                     <th>Motivo</th>
                                     <th>Detalle</th>
                                     <th>Cargo</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <?php
                                   foreach ($infoHistorica as $iHistorica => $info) {
                                ?>
                                <tr>
                                  <td><?php echo utf8_encode($d->buscarNombreDeRegionPorId($info->getfkRegioninformacionHistorica()));   ?></td>
                                  <td><?php echo utf8_encode($info->getcuerpo());   ?></td>
                                  <td><?php echo $info->getcompania();  ?></td>
                                  <td><?php
                                  $fechaSinConvertir = $info->getfechaDeCambio();
                                  $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                  echo $fechaConvertida;   ?></td>
                                  <td><?php echo $info->getPremio();   ?></td>
                                  <td><?php echo $info->getmotivo();   ?></td>
                                  <td><?php echo $info->getdetalle();   ?></td>
                                  <td><?php echo utf8_encode($info->getCargo());   ?></td>
                                </tr>


                                   <?php
                                 }
                                     ?>


                                 </tbody>
                               </table>

                          </div>

                          <div class="col-md-6">
                             <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                  <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                              </center>

                          </div>



                       </div>

                   </div>
               </div>
                 <!-- INFORMACION historica -->
                   <!-- INFORMACION de cargos -->
               <br>
               <br>

               <div class="col-md-24">
                   <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#cargos">
                       Información de Cargos
                   </button>
               </div>
               <div class="col-md-12 collapse" id="cargos">
                   <div class="panel panel-primary">
                       <div class="panel-heading panel-title">

                           Información de Cargos
                       </div>
                       <div class="panel-body" style="margin-left: -20px;">
                           <div class="col-sm-6">
                             <table class="table table-striped">
                                 <thead>
                                   <tr>
                                     <th>Nombre</th>
                                     <th>Entidad de procedencia</th>
                                     <th>Color</th>
                                     <th>Medida</th>
                                     <th>Tipo de medida</th>
                                     <th>Ubicación física de procedencia</th>
                                     <th>Marca</th>
                                     <th>Fecha de caducidad</th>
                                     <th>Proveedor</th>
                                     <th>Estado</th>
                                     <th>Detalle</th>
                                     <th>Cantidad asignada</th>

                                   </tr>
                                 </thead>
                                 <tbody>
                                   <?php
                                   foreach ($infoCargos as $icargos => $datos) {
                                     $material=$d->getMaterialeMenorPorId($datos->getFk_materialMenorAsignado_informacionDeCargos());
                                   ?>
                                   <tr>
                                     <td><?php echo utf8_encode($material->getNombre_material_menor());?></td>
                                     <td><?php echo utf8_encode($material->getFk_entidad_a_cargo_material_menor());?></td>
                                     <td><?php echo utf8_encode($material->getColor_material_menor());?></td>
                                     <td><?php echo utf8_encode($material->getMedida_material_menor());?></td>
                                     <td><?php echo utf8_encode($material->getFk_unidad_de_medida_material_menor());?></td>
                                     <td><?php echo utf8_encode($material->getFk_ubicacion_fisica_material_menor());?></td>
                                     <td><?php echo utf8_encode($material->getFabricante_material_menor());?></td>
                                     <td><?php echo utf8_encode($material->getFecha_de_caducidad_material_menor());?></td>
                                     <td><?php echo utf8_encode($material->getProveedor_material_menor());?></td>
                                     <td><?php echo utf8_encode($material->getFkEstadoMaterialMenor());?></td>
                                     <td><?php echo utf8_encode($material->getDetalleMaterialMenor());?></td>
                                     <td><?php echo $datos->getCantidadAsignada_informacionDeCargos();?></td>
                                <?php
                                 }
                                   ?>
                                   </tr>
                                 </tbody>
                               </table>
                          </div>
                          <div class="col-md-6">
                             <br><br><br><br><br><br><br><br><br><br><br>



                          </div>
                       </div>

                   </div>
               </div>

</div>


          </div>
          <br>
          <form action="buscarBombero.php">
          <center><input type="submit" value="Volver atrás"></center>
          </form>

   </div>


 </div>
 <script src="javascript/JQuery.js"></script>
 <script type="text/javascript">
 </script>



  </body>
</html>
