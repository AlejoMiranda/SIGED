<!DOCTYPE html>
<?php
require_once("model/Data.php");
require_once("model/Tbl_Usuario.php");
$dataUsuario = new Data();
session_start();
if ($_SESSION["usuarioIniciado"] != null) {
  $u = $_SESSION["usuarioIniciado"];
  if ($dataUsuario->verificarSiUsuarioTienePermiso($u, 2) == 0) {
    header("location: paginaError.php");
  }
}

if (isset($_SESSION['idDeBomberoMasReciente'])) {
  $idDeBomberoMasReciente = $_SESSION['idDeBomberoMasReciente'];
}

if (isset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"])) {
  unset($_SESSION["resultadosDeBusquedaDeBomberoByNombre"]);
}

if (isset($_SESSION['seEstaModificandoUBombero'])) {
  unset($_SESSION['seEstaModificandoUBombero']);
}

if (isset($_SESSION["resultadosDeBusquedaDeUnidad"])) {
  unset($_SESSION["resultadosDeBusquedaDeUnidad"]);;
}

if (isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])) {
  unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css" rel="stylesheet" />


  <script src="javascript/verificarRutv2.js"></script>
  <!-- Necesario poner estas 3 lineas aqui. Todas hacen referencia a un js dentro del directorio del programa, excepto el ultimo. Lo tengo
dentro del directorio, pero no cacho bien como referenciarlo -->
  <script src="javascript/JQuery.js"></script>
  <script type="text/javascript" src="javascript/sweetAlertMin.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

  <!-- -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
    .custom-combobox {
      position: relative;
      display: inline-block;
    }

    .custom-combobox-toggle {
      position: absolute;
      top: 0;
      bottom: 0;
      margin-left: -1px;
      padding: 0;
    }

    .custom-combobox-input {
      margin: 0;
      padding: 5px 10px;
    }
  </style>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(function() {
      $.widget("custom.combobox", {
        _create: function() {
          this.wrapper = $("<span>")
            .addClass("custom-combobox")
            .insertAfter(this.element);

          this.element.hide();
          this._createAutocomplete();
          this._createShowAllButton();
        },

        _createAutocomplete: function() {
          var selected = this.element.children(":selected"),
            value = selected.val() ? selected.text() : "";


          this.input = $("<input>")
            .appendTo(this.wrapper)
            .val(value)
            .attr("title", "")
            .addClass("custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left")
            .autocomplete({
              delay: 0,
              minLength: 0,
              source: $.proxy(this, "_source")
            })
            .tooltip({
              classes: {
                "ui-tooltip": "ui-state-highlight"
              }
            });

          this._on(this.input, {
            autocompleteselect: function(event, ui) {
              ui.item.option.selected = true;
              /*Aqui tiene que ir la funcion que creaste*/
              cargarDatosDeMaterialSeleccionado();
              actualizarStockDisponible();


              this._trigger("select", event, {
                item: ui.item.option

              });
            },

            autocompletechange: "_removeIfInvalid"
          });
        },

        _createShowAllButton: function() {
          var input = this.input,
            wasOpen = false;

          $("<a>")
            .attr("tabIndex", -1)
            .attr("title", "Mostrar todo")
            .tooltip()
            .appendTo(this.wrapper)
            .button({
              icons: {
                primary: "ui-icon-triangle-1-s"
              },
              text: false
            })
            .removeClass("ui-corner-all")
            .addClass("custom-combobox-toggle ui-corner-right")
            .on("mousedown", function() {
              wasOpen = input.autocomplete("widget").is(":visible");
            })
            .on("click", function() {
              input.trigger("focus");

              if (wasOpen) {
                return;
              }

              input.autocomplete("search", "");
            });
        },

        _source: function(request, response) {
          var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
          response(this.element.children("option").map(function() {
            var text = $(this).text();
            if (this.value && (!request.term || matcher.test(text)))
              return {
                label: text,
                value: text,
                option: this
              };
          }));
        },

        _removeIfInvalid: function(event, ui) {

          if (ui.item) {
            return;
          }

          var value = this.input.val(),
            valueLowerCase = value.toLowerCase(),
            valid = false;
          this.element.children("option").each(function() {
            if ($(this).text().toLowerCase() === valueLowerCase) {
              this.selected = valid = true;
              return false;
            }
          });

          if (valid) {
            return;
          }

          this.input
            .val("")
            .attr("title", value + " No hay coincidencias")
            .tooltip("open");
          this.element.val("");
          this._delay(function() {
            this.input.tooltip("close").attr("title", "");
          }, 2500);
          this.input.autocomplete("instance").term = "";
        },

        _destroy: function() {
          this.wrapper.remove();
          this.element.show();
        }
      });

      $("#cboMaterialesDisponibles").combobox();
      $("#toggle").on("click", function() {
        $("#cboMaterialesDisponibles").toggle();
      });
    });
  </script>

  <!-- -->

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
    <?php
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    $data = new Data();

    ?>
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

          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" style="text-decoration: none;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <center>Información Personal</center>
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel panel-primary">
                  <div class="panel-heading panel-title">
                    Información Personal
                  </div>
                  <div class="panel-body">
                    <div class="col-sm-5">
                      <div style="margin-left: 0px;">
                        <img src="images/avatar_opt.jpg">
                      </div>
                      <form id="formPersonal" action="controlador/CrearInfoPersonal.php" method="post">
                        Talla Chaqueta/Camisa : <input class="form-control onlyLetter maxCarcateres" type="text" name="txtchaqueta" maxlength="2" required>
                        Talla Pantalón: <input class="form-control onlyNumber maxCarcateres" type="text" name="txtpantalon" maxlength="2" required>
                        Talla buzo: <input class="form-control" type="text" name="txtbuzo" maxlength="2" required>
                        Talla Calzado: <input class="form-control onlyNumber" type="text" name="txtcalzado" maxlength="2" required>
                        Altura :<input class="form-control onlyNumber" type="text" name="txtaltura" required>
                        Peso: <input class="form-control onlyNumber" type="text" name="txtpeso" required>
                        Perteneció a Brigada Juvenil? <input class="form-control" type="text" name="txtbrigada" required>
                        Instructor: <input class="form-control onlyLetter" type="text" name="txtinstructor" required>

                    </div>

                    <div class="col-md-5" style="margin-left: 50px;">
                      Rut:<input class="form-control" name="txtRut" type="text" id="txtRutACrear" tabindex="2" type="text" maxlength="9" onkeypress="return soloRUT(event)" onblur="checkRutGenerico(txtRutACrear.value, false, 2)" onfocus="limpiaPuntoGuion(2)" onpaste="return false" ondrag="return false" ondrop="return false" oncopy="return false" oncut="return false" autocomplete="off">
                      Nombre: <input class="form-control onlyLetter" type="text" id="nombreDeBomberoACrear" name="txtNombre" required>
                      Apellido Paterno: <input class="form-control onlyLetter" type="text" name="txtApePa" required>
                      Apellido Materno: <input class="form-control onlyLetter" name="txtApeMa" required>
                      Fecha Nacimiento: <input class="form-control" name="txtFecha" type="date" required>
                      Estado Civil:
                      <select class="form-control" name="cboEstadoCivil">
                        <?php

                        require_once("model/Data.php");
                        require_once("model/Tbl_EstadoCivil.php");
                        $d = new Data();

                        $estadosCiviles = $d->readEstadosCiviles();
                        foreach ($estadosCiviles as $e => $estado) {
                          ?>
                          <option value="<?php echo $estado->getIdEstadoCivil(); ?>"><?php echo $estado->getNombreEstadoCivil(); ?></option>
                        <?php
                      }
                      ?>
                      </select>
                      Dirección: <input class="form-control onlyNumbLetter" Type="text" name="txtDireccion" required>
                      Teléfonos: <input class="form-control onlyNumber" type="text" name="txtTelefonos" required>
                      Email: <input class="form-control" type="text" name="txtemail" required>
                      Genero:
                      <select class="form-control" name="cboGenero">
                        <?php
                        require_once("model/Data.php");
                        require_once("model/Tbl_Genero.php");
                        $d = new Data();

                        $generos = $d->readGeneros();
                        foreach ($generos as $g => $genero) {
                          ?>
                          <option value="<?php echo $genero->getIdGenero(); ?>"><?php echo $genero->getNombreGenero(); ?></option>
                        <?php
                      }
                      ?>
                      </select>
                      <br>
                      <center> <input type="submit" name="btnInfoPersonal" id="btn_crearInfoPersonal" value="Guardar" class="btn button-primary" style="width: 150px;"> <span></span>

                      </center>
                      </form>
                      <br>
                    </div>

                  </div>
                </div>
              </div>
            </div>


            <!-- INFORMACION PERSONAL -->
            <!-- INFORMACION bomberilL -->
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" style="text-decoration: none;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <center>Información Bomberil</center>
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel panel-primary">
                  <div class="panel-heading panel-title">
                    <form id="formBomberil" action="controlador/CrearInformacionBomberil.php" method="post">
                      Información Bomberil
                  </div>
                  <div class="panel-body">


                    <div class="col-sm-6">
                      Creando ficha para: <?php
                                          if (isset($idDeBomberoMasReciente)) {
                                            echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                                          }
                                          ?>
                      <br>
                      Región :
                      <select class="form-control" name="cboRegion">
                        <?php
                        require_once("model/Data.php");
                        require_once("model/Tbl_Region.php");
                        $d = new Data();

                        $regiones = $d->readRegiones();
                        foreach ($regiones as $r => $region) {
                          ?>
                          <option value="<?php echo $region->getIdRegion(); ?>"><?php echo utf8_encode($region->getNombreRegion()); ?></option>
                        <?php
                      }
                      ?>
                      </select>

                      Compañía:
                      <!-- <input class="form-control" type="text" name="txtcompania"> -->
                      <!--Combobox-->
                      <select name="compania" class="form-control">
                        <?php
                        $compania = $data->readSoloCompanias();
                        foreach ($compania as $c) {
                          echo "<option value='" . $c->getIdEntidadACargo() . "'>";
                          echo utf8_encode($c->getNombreEntidadACargo());
                          echo "</option>";
                        }
                        ?>

                      </select>
                      Fecha Ingreso: <input class="form-control" type="date" name="txtfingreso" required>
                      Nº Reg.General: <input class="form-control" type="number" name="txtgeneral" required min="1" pattern="^[0-9]+" onkeydown="javascript: return event.keyCode == 69 ? false : true">
                    </div>


                    <div class="col-md-6">
                      <br>
                      Cuerpo: <input class="form-control" type="text" name="txtcuerpo" required>
                      Cargo:
                      <select class="form-control" name="cboCargo">
                        <?php
                        require_once("model/Data.php");
                        require_once("model/Tbl_Cargo.php");
                        $d = new Data();

                        $cargos = $d->readCargos();
                        foreach ($cargos as $c => $cargo) {
                          ?>
                          <option value="<?php echo $cargo->getIdCargo(); ?>"><?php echo utf8_encode($cargo->getNombreCargo()); ?></option>
                        <?php
                      }
                      ?>
                      </select>

                      Estado:
                      <select class="form-control" name="cboEstadoBombero">
                        <?php
                        require_once("model/Data.php");
                        require_once("model/Tbl_EstadoBombero.php");
                        $d = new Data();

                        $estados = $d->readEstadosDeBomberos();
                        foreach ($estados as $e => $estado) {
                          ?>
                          <option value="<?php echo $estado->getIdEstado(); ?>"><?php echo utf8_encode($estado->getNombreEstado()); ?></option>
                        <?php
                      }
                      ?>
                      </select>
                      Nº Reg.Cia: <input class="form-control" type="number" name="txtcia" required min="1" pattern="^[0-9]+" onkeydown="javascript: return event.keyCode == 69 ? false : true">
                      <br>
                      <center> <input type="submit" id="btn_crearBomberil" name="btnInfoBomberil" value="Guardar" class="btn button-primary" style="width: 150px;"> <span></span>
                      </center>
                      </form>

                    </div>

                  </div>
                </div>
              </div>
            </div>

            <!-- INFORMACION bomberilL -->


            <!-- INFORMACION laboral -->

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" style="text-decoration: none;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <center>Información Laboral</center>
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel panel-primary">
                  <div class="panel-heading panel-title">
                    <form id="formCrearInfoLaboral" action="controlador/CrearInformacionLaboral.php" method="post">
                      Información Laboral
                  </div>
                  <div class="panel-body">

                    <div class="col-sm-6">
                      Creando ficha para: <?php
                                          if (isset($idDeBomberoMasReciente)) {
                                            echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                                          }
                                          ?>
                      <br>
                      Nombre Empresa : <input class="form-control" type="text" name="txtnomempresa" required>
                      Dirección Empresa: <input class="form-control" type="text" name="txtdirecempresa" required>
                      Teléfono Empresa: <input class="form-control onlyNumber" type="text" name="txttlfempresa" required>
                      Fecha Ingreso: <input class="form-control" type="date" name="txfingresoempresa" required>

                    </div>

                    <div class="col-md-6">
                      <br>
                      Cargo : <input class="form-control" type="text" name="txtcargo" required>

                      Area/Depto de trabajo: <input class="form-control" type="text" name="txtareatrabajo" required>
                      AFP: <input class="form-control" type="text" name="txtafp" required>
                      Profesión: <input class="form-control onlyLetter" name="txtprofesion" required>
                      <br>
                      <center> <input type="submit" id="btn_crearInfoLaboral" name="btnInfoLaboral" value="Guardar" class="btn button-primary" style="width: 150px;"> <span></span>
                      </center>
                      </form>

                    </div>



                  </div>
                </div>
              </div>
            </div>

            <!-- INFORMACION laboral -->
            <!-- INFORMACION medica -->

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingcuatro">
                <h4 class="panel-title">
                  <a class="collapsed" style="text-decoration: none;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                    <center>Información Medica</center>
                  </a>
                </h4>
              </div>
              <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingcuatro">
                <div class="panel panel-primary">
                  <div class="panel-heading panel-title">
                    <form id="formCrearInfoMedica" action="controlador/CrearInformacionMedica.php" method="post">
                      Información Medica
                  </div>
                  <div class="panel-body">

                    <div class="col-sm-6">
                      Creando ficha para: <?php
                                          if (isset($idDeBomberoMasReciente)) {
                                            echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                                          }
                                          ?>
                      <br>
                      Prestación Médica : <input class="form-control onlyLetter" type="text" name="txtpresmedica" required>
                      Alergias: <input class="form-control onlyLetter" type="text" name="txtalergias" required>
                      Enfermedades Crónicas: <input class="form-control onlyLetter" type="text" name="txtenfermedadescronicas" required>
                      Medicamentos Habituales: <input class="form-control onlyLetter" type="text" name="txtmedicamentosHabituales" required>
                      Nombre del Contacto: <input class="form-control onlyLetter" type="text" name="txtnomContacto" required>
                      Teléfono del Contacto : <input class="form-control onlyLetter" type="text" name="txttlfcontacto" required>

                    </div>

                    <div class="col-md-6">
                      <br>
                      Parentesco del Contacto:
                      <select class="form-control" name="cboParentesco1">
                        <?php
                        require_once("model/Data.php");
                        require_once("model/Tbl_Parentesco.php");
                        $d = new Data();

                        $parentescos = $d->readParentescos();
                        foreach ($parentescos as $p => $parentesco) {
                          ?>
                          <option value="<?php echo $parentesco->getIdParentesco(); ?>"><?php echo utf8_encode($parentesco->getNombreParentesco()); ?></option>
                        <?php
                      }
                      ?>
                      </select>
                      Nivel de Actividad Fisica: <input class="form-control" type="text" name="txtactvfisica" required>
                      Donante: <input class="form-control" value="seleccionado" type="checkbox" name="txtdonante">
                      Fumador: <input class="form-control" value="seleccionado" type="checkbox" name="txtfumador">
                      Grupo Sanguineo:
                      <select class="form-control" name="cboGrupoSanguineo">
                        <?php
                        require_once("model/Data.php");
                        require_once("model/Tbl_GrupoSanguineo.php");
                        $d = new Data();

                        $gruposSanguineos = $d->readGruposSanguineos();
                        foreach ($gruposSanguineos as $gs => $grupoSanguineo) {
                          ?>
                          <option value="<?php echo $grupoSanguineo->getIdGrupoSanguineo(); ?>"><?php echo $grupoSanguineo->getNombreGrupoSanguineo(); ?></option>
                        <?php
                      }
                      ?>
                      </select>
                      <br>
                      <center> <input type="submit" id="btn_crearInfoMedica" name="btninfoMedica" value="Guardar" class="btn button-primary" style="width: 150px;"> <span></span>

                      </center>
                      </form>

                    </div>


                  </div>
                </div>
              </div>
            </div>

            <!-- INFORMACION medica -->
            <!-- INFORMACION Familiar -->


            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingcinco">
                <h4 class="panel-title">
                  <a class="collapsed" style="text-decoration: none;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                    <center>Información Familiar</center>
                  </a>
                </h4>
              </div>
              <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingcinco">
                <div class="panel panel-primary">
                  <div class="panel-heading panel-title">
                    <form id="formCrearInfoFamiliar" action="controlador/CrearInformacionFamiliar.php" method="post">
                      Información Familiar
                  </div>
                  <div class="panel-body">

                    <div class="col-sm-6">
                      Creando ficha para: <?php
                                          if (isset($idDeBomberoMasReciente)) {
                                            echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                                          }
                                          ?>
                      <br>
                      Nombre: <input class="form-control onlyLetter" type="text" name="txtnombreFamiliar" required>
                      Fecha de Nacimiento: <input class="form-control" type="date" name="txtfechafamiliar" required>
                      Parentesco:
                      <select class="form-control" name="cboParentesco2">
                        <?php
                        require_once("model/Data.php");
                        require_once("model/Tbl_Parentesco.php");
                        $d = new Data();

                        $parentescos = $d->readParentescos();
                        foreach ($parentescos as $p => $parentesco) {
                          ?>
                          <option value="<?php echo $parentesco->getIdParentesco(); ?>"><?php echo utf8_encode($parentesco->getNombreParentesco()); ?></option>
                        <?php
                      }
                      ?>
                      </select>

                    </div>

                    <div class="col-md-6">
                      <br><br><br><br><br><br><br>
                      <center> <input type="submit" id="btn_crearInfoFamiliar" name="btninfoFamiliar" value="Guardar" class="btn button-primary" style="width: 150px;"> <span></span>
                        <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                      </center>
                      </form>

                    </div>


                  </div>
                </div>
              </div>
            </div>

            <!-- INFORMACION Familiar -->
            <!-- INFORMACION academica -->


            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingseis">
                <h4 class="panel-title">
                  <a class="collapsed" style="text-decoration: none;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                    <center>Información Academica</center>
                  </a>
                </h4>
              </div>
              <div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingseis">
                <div class="panel panel-primary">
                  <div class="panel-heading panel-title">
                    <form id="formCrearInfoAcademica" action="controlador/CrearInformacionAcademica.php" method="post">
                      Información Academica
                  </div>
                  <div class="panel-body">

                    <div class="col-sm-6">
                      Creando ficha para: <?php
                                          if (isset($idDeBomberoMasReciente)) {
                                            echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                                          }
                                          ?>
                      <br>
                      Fecha: <input class="form-control" type="date" name="txtfechaAcademica" required>
                      Actividad: <input class="form-control" type="text" name="txtActivdidadAcademica" required>
                      Estado:
                      <select class="form-control" name="cboEstadoCursoAcademico">
                        <?php
                        require_once("model/Data.php");
                        require_once("model/Tbl_EstadoCurso.php");
                        $d = new Data();

                        $estadosDeCursos = $d->readEstadosCurso();
                        foreach ($estadosDeCursos as $ec => $estado) {
                          ?>
                          <option value="<?php echo $estado->getIdEstadoCurso(); ?>"><?php echo utf8_encode($estado->getNombreEstadoCurso()); ?></option>
                        <?php
                      }
                      ?>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <br><br><br><br><br><br>
                      <center> <input type="submit" id="btn_crearInfoAcademica" name="btninfoAcademica" value="Guardar" class="btn button-primary" style="width: 150px;"> <span></span>
                        <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                      </center>
                      </form>

                    </div>


                  </div>
                </div>
              </div>
            </div>

            <!-- INFORMACION academica -->
            <!-- INFORMACION estandar -->

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingsiete">
                <h4 class="panel-title">
                  <a class="collapsed" style="text-decoration: none;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                    <center>Información Entrenamiento Estandar</center>
                  </a>
                </h4>
              </div>
              <div id="collapseseven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsiete">
                <div class="panel panel-primary">
                  <div class="panel-heading panel-title">
                    <form id="formCrearInfoEntrenamientoEstandar" action="controlador/CrearInfoEntrenamientoEstandar.php" method="post">
                      Información Entrenamiento Estandar
                  </div>
                  <div class="panel-body">

                    <div class="col-sm-6">
                      Creando ficha para: <?php
                                          if (isset($idDeBomberoMasReciente)) {
                                            echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                                          }
                                          ?>
                      <br>
                      Fecha: <input class="form-control" type="date" name="txtfechaEstandar" required>
                      Actividad: <input class="form-control" type="text" name="txtActividadEntrenamientoEstandar" required>
                      Estado:
                      <select class="form-control" name="cboEstadoCursoEstandar">
                        <?php
                        require_once("model/Data.php");
                        require_once("model/Tbl_EstadoCurso.php");
                        $d = new Data();

                        $estadosDeCursos2 = $d->readEstadosCurso();
                        foreach ($estadosDeCursos2 as $ec2 => $estado2) {
                          ?>
                          <option value="<?php echo $estado2->getIdEstadoCurso(); ?>"><?php echo utf8_encode($estado2->getNombreEstadoCurso()); ?></option>
                        <?php
                      }
                      ?>
                      </select>

                    </div>

                    <div class="col-md-6">
                      <br><br><br><br><br><br>
                      <center> <input type="submit" id="btn_crearInfoEntrenEstandar" name="btninfoEstandar" value="Guardar" class="btn button-primary" style="width: 150px;"> <span></span>
                        <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                      </center>
                      </form>

                    </div>

                  </div>
                </div>
              </div>
            </div>


            <!-- INFORMACION estandar -->
            <!-- INFORMACION historica -->

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingocho">
                <h4 class="panel-title">
                  <a class="collapsed" style="text-decoration: none;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseocho" aria-expanded="false" aria-controls="collapseocho">
                    <center>Información Historica</center>
                  </a>
                </h4>
              </div>
              <div id="collapseocho" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingocho">
                <div class="panel panel-primary">
                  <div class="panel-heading panel-title">
                    Información Historica
                  </div>
                  <div class="panel-body">

                    <div class="col-sm-6">
                      Creando ficha para: <?php
                                          if (isset($idDeBomberoMasReciente)) {
                                            echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                                          }
                                          ?>
                      <br>

                      Región:
                      <select class="form-control" name="cboxRegion">
                        <?php
                        require_once("model/Data.php");
                        require_once("model/Tbl_Region.php");
                        $d = new Data();

                        $regiones = $d->readRegiones();
                        foreach ($regiones as $r => $region) {
                          ?>
                          <option value="<?php echo $region->getIdRegion(); ?>"><?php echo utf8_encode($region->getNombreRegion()); ?></option>
                        <?php
                      }
                      ?>
                      </select>

                      Cuerpo: <input type="text" name="txtcuerpoHistorico" class="form-control" required>
                      Compañia:<input type="text" name="txtCompania" class="form-control" required>
                      <!--   <select name="cboxCompania" class="form-control">
                                      <?php
                                      require_once("model/Data.php");
                                      require_once("model/Tbl_EntidadACargo.php");
                                      $d = new Data();

                                      $companias = $d->readSoloCompanias();
                                      foreach ($companias as $c => $compania) {
                                        ?>
                                          <option value="<?php /*echo $compania->getIdEntidadACargo(); ?>"><?php echo utf8_encode($compania->getNombreEntidadACargo());*/ ?></option>
                                      <?php
                                    }
                                    ?>
                                    </select>
                                  -->
                      Fecha: <input type="date" name="txtfechaCambioInfoHistorica" class="form-control" required>


                    </div>

                    <div class="col-md-6">
                      <br>
                      Cargo: <input type="text" name="cboxCargo" class="form-control" required>
                      Premio: <input type="text" name="txtPremioInforHistorica" class="form-control" required>
                      Motivo: <input type="text" name="txtMotivo" class="form-control" required>
                      Detalle: <input type="text" name="txtDetalleHistorico" class="form-control" required>
                      <br>

                      </form>

                      <center> <input type="submit" id="btn_crearInfoHistorica" name="btninfohistorica" value="Guardar" class="btn button-primary" style="width: 150px;"> <span></span>
                      </center>

                    </div>


                  </div>
                </div>
              </div>
            </div>

            <!-- INFORMACION historica -->
            <!-- INFORMACION cargos -->

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingnueve">
                <h4 class="panel-title">
                  <a class="collapsed" style="text-decoration: none;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                    <center>Información de Cargos</center>
                  </a>
                </h4>
              </div>
              <div id="collapsenine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingnueve">
                <div class="panel panel-primary">
                  <div class="panel-heading panel-title">
                    <form id="formCrearInfoCargos" action="controlador/CrearInformacionDeCargos.php" method="post">
                      Información de Cargos
                  </div>
                  <div class="col-sm-6">
                    Creando ficha para: <?php
                                        if (isset($idDeBomberoMasReciente)) {
                                          echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                                        }
                                        ?>
                    <br>
                    Entidad a Cargo:
                    <select name="cboEntidadACargo" id="cboEntidadACargo" class="form-control" onchange="actualizarComboBox()">
                      <?php
                      $entiPropietaria = $data->getEntidadACargo();
                      foreach ($entiPropietaria as $ep) {
                        echo "<option value='" . $ep->getIdEntidadACargo() . "'>";
                        echo utf8_encode($ep->getNombreEntidadACargo());
                        echo "</option>";
                      }
                      ?>
                    </select>

                    Material menor a asignar:
                    <div class="ui-widget" class="form-control" style="width:100px;">
                      <select name="cboMaterialesDisponibles" id="cboMaterialesDisponibles" class="form-control" onchange="actualizarStockDisponible(), cargarDatosDeMaterialSeleccionado()">
                        <?php
                        $materialesDisponibles = $data->getMaterialesMenoresPorFkUbicacionFisica(1);
                        foreach ($materialesDisponibles as $mat) {
                          echo "<option value='" . $mat->getId_material_menor() . "'>";
                          echo utf8_encode($mat->getNombre_material_menor());
                          echo "</option>";
                        }
                        ?>
                      </select>
                    </div>

                    <br>

                    <center>
                      <input type="submit" name="btnInfoCargos" id="btn_crearCargo" value="Guardar" class="btn button-primary" style="width: 150px;"> <span></span>
                    </center>
                    <br>
                    <div>
                      Marca:<br> <input type="text" id="detalleMarca" name="detalleMarca" disabled style="width: 260px;">
                      <br>
                      Color:<br> <input type="text" id="detalleColor" name="detalleColor" disabled style="width: 260px;">
                      <br>
                      Proveedor:<br> <input type="text" id="detalleProveedor" name="detalleProveedor" disabled style="width: 260px;">
                      <br>
                      Estado: <br><input type="text" id="detalleEstado" name="detalleEstado" disabled style="width: 256px;">
                      <br>

                    </div>


                    </form>
                    <br>
                  </div>

                  <div class="col-md-6">
                    <br>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-auto">
                          Ubicacion Fisica:
                          <select name="cboxUbicacion" id="cboxUbicacion" class="form-control" onchange="actualizarComboBoxDeMateriales()">
                            <?php
                            $ubicacionesFisicas = $data->getUbicacionFisica(1);
                            foreach ($ubicacionesFisicas as $ubi) {
                              echo "<option value='" . $ubi->getIdUbicacionFisica() . "'>";
                              echo utf8_encode($ubi->getNombreUbicacionFisica());
                              echo "</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-auto">
                          Stock: <input type="number" class="form-control" id="stock" name="stock" style="width:50px;" disabled>
                        </div>
                        <div class="col-md-auto" style="margin-left: 80px;margin-top:-55px;">
                          Cantidad a asignar:
                          <input type="number" class="form-control" style="width:50px;" value="1" id="cantidadDeMaterialesAsignados" name="cantidadDeMaterialesAsignados" min="1" max="10">
                          <br>
                          Fecha Entrega: <input style="margin-left: -80px;" type="date" class="form-control" name="txtFechaEntrega" value="<?php date_default_timezone_set("Chile/Continental");
                                                                                                                                            echo date("Y-m-d"); ?>" required>
                        </div>
                      </div>
                    </div>

                    <br>
                    <div>
                      <br><br>
                      Fecha de caducidad:<br> <input type="text" id="detalleFecha" name="detalleFecha" disabled style="width: 260px;">
                      <br>
                      Medida: <br><input type="text" id="detalleMedida" name="detalleMedida" disabled style="width: 260px;">
                      <br>
                      Tipo de medida: <br><input type="text" id="detalleTipoDeMedida" name="detalleTipoDeMedida" disabled style="width: 260px;">
                      <br>
                      Observaciones:<br> <input type="text" id="detalleObservaciones" name="detalleObservaciones" disabled style="width: 260px;">
                      <br>
                    </div>
                  </div>


                </div>
              </div>


            </div>
          </div>





        </div>
      </div>

    </div>
  </div>
  </div>




  <script>
    /*La siguiente funcion se activa al clickear el boton de guardar en la ficha de info personal, y puede mostrar un mensaje con una variable string.
Sin embargo, aún no estoy seguro de como implementar esto para que sea al enviar el submit. De todas formas, se muestra el mensaje de que se
intenta crear al bombero, llamandolo por su nombre, pero el mensaje de exito solo aparece si de verdad se enviaron los datos*/


    function actualizarComboBox() {
      var val = document.getElementById("cboEntidadACargo").value;

      $.ajax({
        url: "buscarUbicacionFisica.php",
        type: "POST",
        data: {
          "datos": val
        }
      }).done(function(data) {
        console.log(data);
        $('#cboxUbicacion')
          .find('option')
          .remove()
          .end();
        $('#cboxUbicacion').append(data);

      });
    }



    function actualizarComboBoxDeMateriales() {
      var val = document.getElementById("cboxUbicacion").value;

      $.ajax({
        url: "buscarMaterialMenorPorFkDeUbicacionFisica.php",
        type: "POST",
        data: {
          "datos": val
        }
      }).done(function(data) {
        console.log(data);
        $('#cboMaterialesDisponibles')
          .find('option')
          .remove()
          .end();
        $('#cboMaterialesDisponibles').append(data);

      });
    }


    function actualizarStockDisponible() {
      var id = document.getElementById("cboMaterialesDisponibles").value;
      $.ajax({
        type: "POST",
        url: 'obtenerStockDeUnMaterialPorId.php',
        data: {
          "datos": id
        },
        success: function(data) {
          var valorMaximo = document.getElementById("cantidadDeMaterialesAsignados");
          valorMaximo.setAttribute("max", data);
          document.getElementById("stock").value = data;
        }
      });
    }



    // Hay que darle un id a cada forma, y hacer una estructura parecida para cada forma (APLICAR A TODAS LAS FORM QUE CREEN O ACTUALIZEN COSAS)
    $('#btn_crearInfoPersonal').on('click', function(e) {
      e.preventDefault();
      var form = $(this).parents('form');
      swal({
        title: "Sistema de bomberos",
        text: "Operación exitosa",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ok",
        closeOnConfirm: false,
      }, function(isConfirm) {
        if (isConfirm) document.getElementById("formPersonal").submit();

        //form.submit();
      });
    });


    $('#btn_crearBomberil').on('click', function(e) {
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
      }, function(isConfirm) {
        if (isConfirm) document.getElementById("formBomberil").submit();
        //form.submit();
      });
    });

    $('#btn_crearInfoLaboral').on('click', function(e) {
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
      }, function(isConfirm) {
        if (isConfirm) document.getElementById("formCrearInfoLaboral").submit();
        //form.submit();
      });
    });

    $('#btn_crearInfoMedica').on('click', function(e) {
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
      }, function(isConfirm) {
        if (isConfirm) document.getElementById("formCrearInfoMedica").submit();
        //form.submit();
      });
    });



    $('#btn_crearInfoFamiliar').on('click', function(e) {
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
      }, function(isConfirm) {
        if (isConfirm) document.getElementById("formCrearInfoFamiliar").submit();
        //form.submit();
      });
    });

    $('#btn_crearInfoAcademica').on('click', function(e) {
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
      }, function(isConfirm) {
        if (isConfirm) document.getElementById("formCrearInfoAcademica").submit();
        //form.submit();
      });
    });

    $('#btn_crearInfoEntrenEstandar').on('click', function(e) {
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
      }, function(isConfirm) {
        if (isConfirm) document.getElementById("formCrearInfoEntrenamientoEstandar").submit();
        //form.submit();
      });
    });


    $('#btn_crearInfoHistorica').on('click', function(e) {
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
      }, function(isConfirm) {
        if (isConfirm) document.getElementById("formCrearInfoHistorica").submit();
        //form.submit();
      });
    });


    $('#btn_crearCargo').on('click', function(e) {
      //e.preventDefault();
      var stock = document.getElementById("stock").value;
      var cantidadAsignada = document.getElementById("cantidadDeMaterialesAsignados").value;

      var form = $(this).parents('form');

      if (cantidadAsignada > stock) {
        swal({
          title: "Sistema de bomberos",
          text: "El valor ingresado excede el límite",
          type: "error",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ok",
          closeOnConfirm: true,
        });
      } else if (cantidadAsignada <= stock) {
        swal({
          title: "Sistema de bomberos",
          text: "Operación exitosa",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ok",
          closeOnConfirm: true,
        }, function(isConfirm) {
          if (isConfirm) {
            document.getElementById("formCrearInfoCargosEnModificar").submit();
          }
        });
      }
    });

    function cargarDatosDeMaterialSeleccionado() {
      var id = document.getElementById("cboMaterialesDisponibles").value;

      $.ajax({
        url: "buscarMaterialMenorPorId.php",
        type: "POST",
        data: {
          "datos": id
        }
      }).done(function(data) {
        console.log(data);
        var ob = $.parseJSON(data);

        document.getElementById("detalleMarca").value = ob.fabricante;
        document.getElementById("detalleColor").value = ob.color;
        document.getElementById("detalleProveedor").value = ob.proveedor;
        document.getElementById("detalleEstado").value = ob.estado;
        document.getElementById("detalleFecha").value = ob.fechaDeCaducidad;
        document.getElementById("detalleMedida").value = ob.medida;
        document.getElementById("detalleTipoDeMedida").value = ob.fkUnidad;
        document.getElementById("detalleObservaciones").value = ob.detalle;

      });
    }
  </script>

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