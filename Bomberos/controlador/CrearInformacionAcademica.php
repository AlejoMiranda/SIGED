<?php


require_once("../model/Data.php");

require_once("../model/Tbl_InfoAcademica.php");
require_once("../model/Tbl_InfoPersonal.php");
require_once("../model/Tbl_EstadoCurso.php");
session_start();

 $idInformacionAcademica=0;
 $fechaInformacionAcademica=$_REQUEST["txtfechaAcademica"];
 $actividadInformacionAcademica=$_REQUEST["txtActivdidadAcademica"];
 $fkEstadoCursoInformacionAcademica=$_REQUEST["cboEstadoCursoAcademico"];
 $fkInformacionPersonalInformacionAcademica=$_SESSION['idDeBomberoMasReciente'];

$infoAcademica=new Tbl_InfoAcademica();

$infoAcademica->setIdidInformacionAcademica($idInformacionAcademica);
$infoAcademica->setfechaInformacionAcademica($fechaInformacionAcademica);
$infoAcademica->setactividadInformacionAcademica($actividadInformacionAcademica);
$infoAcademica->setfkEstadoCursoInformacionAcademica($fkEstadoCursoInformacionAcademica);
$infoAcademica->setfkInformacionPersonalInformacionAcademica($fkInformacionPersonalInformacionAcademica);

$d= new Data();

$d->crearInformacionAcademica($infoAcademica);

if(isset($_SESSION['seEstaModificandoUBombero'])){
  header("location: CargarFichaAModificar.php");
}else{
    header("location: ../CrearFicha.php");
}






?>
