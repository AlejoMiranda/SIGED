<?php

require_once("../model/Data.php");

require_once("../model/Tbl_InfoPersonal.php");
require_once("../model/Tbl_Medida.php");
require_once("../model/Tbl_EstadoCivil.php");
require_once("../model/Tbl_Genero.php");

$d= new Data();
session_start();


if(isset($_SESSION['seEstaModificandoUBombero'])){
  header("location: ../modificarBombero.php");
}else{

  $talla_chaqueta = $_REQUEST["txtchaqueta"];
  $talla_pantalon = $_REQUEST["txtpantalon"];
  $talla_buzo = $_REQUEST["txtbuzo"];
  $talla_calzado = $_REQUEST["txtcalzado"];


  $medida = new Tbl_Medida();
  $medida->setIdMedida(0);
  $medida->setTallaChaquetaCamisa($talla_chaqueta);
  $medida->setTallaPantalon($talla_pantalon);
  $medida->setTallaBuzo($talla_buzo);
  $medida->setTallaCalzado($talla_calzado);


  $d->crearMedida($medida);

  $id=0;
  $rut=$_REQUEST["txtRut"];
  $nombre=$_REQUEST["txtNombre"];
  $apellido_paterno=$_REQUEST["txtApePa"];
  $apellido_materno=$_REQUEST["txtApeMa"];
  $fecha_de_nacimiento=$_REQUEST["txtFecha"];
  $fk_estado_civil=$_REQUEST["cboEstadoCivil"];
  $fkMedida=0;//$_REQUEST[""];
  $altura=$_REQUEST["txtaltura"];
  $peso=$_REQUEST["txtpeso"];
  $e_mail=$_REQUEST["txtemail"];
  $fk_genero=$_REQUEST["cboGenero"];
  $telefono_fijo=$_REQUEST["txtTelefonos"];
  $telefono_movil=$_REQUEST["txtTelefonos"];
  $direccion_personal=$_REQUEST["txtDireccion"];
  $pertenecioABrigadaJuvenil=$_REQUEST["txtbrigada"];
  $esInstructor=$_REQUEST["txtinstructor"];


  $inforPersonal= new Tbl_InfoPersonal();

  $inforPersonal->setIdInfoPersonal($id);
  $inforPersonal->setRutInformacionPersonal($rut);
  $inforPersonal->setNombreInformacionPersonal($nombre);
  $inforPersonal->setApellidoPaterno($apellido_paterno);
  $inforPersonal->setApellidoMaterno($apellido_materno);
  $inforPersonal->setFechaNacimiento($fecha_de_nacimiento);
  $inforPersonal->setFkEstadoCivil($fk_estado_civil);
  $inforPersonal->setFkMedidaInformacionPersonal($fkMedida);
  $inforPersonal->setAlturaEnMetros($altura);
  $inforPersonal->setPeso($peso);
  $inforPersonal->setEmail($e_mail);
  $inforPersonal->setFkGenero($fk_genero);
  $inforPersonal->setTelefonoFijo($telefono_fijo);
  $inforPersonal->setTelefonoMovil($telefono_movil);
  $inforPersonal->setDireccionPersonal($direccion_personal);
  $inforPersonal->setPertenecioABrigadaJuvenil($pertenecioABrigadaJuvenil);
  $inforPersonal->setEsInstructor($esInstructor);

  $d->crearInformacionPersonalDeBombero($inforPersonal);
  $idBomberoMasReciente=$d->getIdBomberoMasReciente();
  $_SESSION['idDeBomberoMasReciente']=$idBomberoMasReciente;
  /* Crear registros de informacion bomberil, laboral y medica, con datos vacíos, para propositos de busquda*/

  $infoBomberil= new Tbl_InfoBomberil();
  $infoBomberil->setIdInformacionBomberil(1);
  $infoBomberil->setfkRegioninformacionBomberil(1);
  $infoBomberil->setcuerpoInformacionBomberil("");
  $infoBomberil->setfkCompaniainformacionBomberil(2);
  $infoBomberil->setfkCargoinformacionBomberil(7);
  $infoBomberil->setfechaIngresoinformacionBomberil('0000-00-00');
  $infoBomberil->setNRegGeneralinformacionBomberil(0);
  $infoBomberil->setfkEstadoinformacionBomberil(1);
  $infoBomberil->setNRegCiainformacionBomberil(0);
  $infoBomberil->setfkInfoPersonalinformacionBomberil($idBomberoMasReciente);

  $infoLaboral=new Tbl_InfoLaboral();
  $infoLaboral->setIdidInformacionLaboral(1);
  $infoLaboral->setnombreEmpresainformacionLaboral("");
  $infoLaboral->setdireccionEmpresainformacionLaboral("");
  $infoLaboral->settelefonoEmpresainformacionLaboral("");
  $infoLaboral->setcargoEmpresainformacionLaboral("");
  $infoLaboral->setfechaIngresoEmpresainformacionLaboral('0000-00-00');
  $infoLaboral->setareaDeptoEmpresainformacionLaboral("");
  $infoLaboral->setafp_informacionLaboral("");
  $infoLaboral->setprofesion_informacionLaboral("");
  $infoLaboral->setfkInfoPersonalinformacionLaboral($idBomberoMasReciente);

  $infoMedica1=new Tbl_InfoMedica1();
  $infoMedica1->setidInformacionMedica1(1);
  $infoMedica1->setprestacionMedica_informacionMedica1("");
  $infoMedica1->setalergias_informacionMedica1("");
  $infoMedica1->setenfermedadesCronicasinformacionMedica1("");
  $infoMedica1->setfkInfoPersonalinformacionMedica1($idBomberoMasReciente);

  $infoMedica2=new Tbl_InfoMedica2();
  $infoMedica2->setidInformacionMedica2(1);
  $infoMedica2->setmedicamentosHabitualesinformacionMedica2("");
  $infoMedica2->setnombreContactoinformacionMedica2("");
  $infoMedica2->settelefonoContactoinformacionMedica2("");
  $infoMedica2->setfkParentescoContactoinformacionMedica2(1);
  $infoMedica2->setnivelActividadFisicainformacionMedica2("");
  $infoMedica2->setesDonanteinformacionMedica2(FALSE);
  $infoMedica2->setesFumadorinformacionMedica2(FALSE);
  $infoMedica2->setfkGrupoSanguineoinformacionMedica2(1);
  $infoMedica2->setfkInfoPersonalinformacionMedica2($idBomberoMasReciente);

$d->crearInformacionBomberil($infoBomberil);
$d->crearInformacionLaboral($infoLaboral);
$d->crearInformacionMedica1($infoMedica1);
$d->crearInformacionMedica2($infoMedica2);

header("location: ../CrearFicha.php");

}


?>
