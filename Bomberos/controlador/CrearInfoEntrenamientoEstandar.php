<?php
require_once("../model/Data.php");

require_once("../model/Tbl_EntrenamientoEstandar.php");
require_once("../model/Tbl_InfoPersonal.php");
require_once("../model/Tbl_EstadoCurso.php");

session_start();

$idEntrenamientoEstandar=1;
$fechaEntrenamientoEstandar=$_REQUEST["txtfechaEstandar"];
$actividad=$_REQUEST["txtActividadEntrenamientoEstandar"];
$fkEstadoCurso=$_REQUEST["cboEstadoCursoEstandar"];
$fkInformacionPersonal=$_SESSION['idDeBomberoMasReciente'];

$infoEntrenamientoEstandar=new EntrenamientoEstandar();

$infoEntrenamientoEstandar->setIdEntrenamientoEstandar($idEntrenamientoEstandar);
$infoEntrenamientoEstandar->setfechaEntrenamientoEstandar($fechaEntrenamientoEstandar);
$infoEntrenamientoEstandar->setactividad($actividad);
$infoEntrenamientoEstandar->setFkEstadoCurso($fkEstadoCurso);
$infoEntrenamientoEstandar->setFkInformacionPersonal($fkInformacionPersonal);

$d= new Data();

$d->crearInformacionEntrenamientoEstandar($infoEntrenamientoEstandar);

if(isset($_SESSION['seEstaModificandoUBombero'])){
  header("location: CargarFichaAModificar.php");
}else{
    header("location: ../CrearFicha.php");
}

?>
