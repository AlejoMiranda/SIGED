<?php
require_once("../model/Data.php");

session_start();

$idABuscar=$_POST["idBomberoReporte"];

$d= new Data();

$infoPersonal = $d->getInfoPersonal($idABuscar);
$infoMedidas = $d->getInfoMedidas($idABuscar);
$infoBomberil = $d->getInfoBomberil($idABuscar);
$infoLaboral = $d->getInfoLaboral($idABuscar);
$infoMedica1 = $d->getInfoMedica1($idABuscar);
$infoMedica2 = $d->getInfoMedica2($idABuscar);
$infoFamiliar = $d->readInfoFamiliar($idABuscar);
$infoAcademica = $d->readInfoAcademica($idABuscar);
$infoEntrenamientoEstandar = $d->readInfoEntrenamientoEstandar($idABuscar);
$infoHistorica = $d->readInfoHistorica($idABuscar);
$infoCargos = $d->getInfoCargos($idABuscar);

$_SESSION["infoPersonalSolicitada"] = $infoPersonal;
$_SESSION["infoMedidasSolicitada"] = $infoMedidas;
$_SESSION["infoBomberilSolicitada"] = $infoBomberil;
$_SESSION["infoLaboralSolicitada"] = $infoLaboral;
$_SESSION["infoMedica1Solicitada"] = $infoMedica1;
$_SESSION["infoMedica2Solicitada"] = $infoMedica2;
$_SESSION["infoFamiliarSolicitada"] = $infoFamiliar;
$_SESSION["infoAcademicaSolicitada"] = $infoAcademica;
$_SESSION["infoEntrenamientoEstandarSolicitada"] = $infoEntrenamientoEstandar;
$_SESSION["infoHistoricaSolicitada"] = $infoHistorica;
$_SESSION["infoCargosSolicitada"] = $infoCargos;

//header("location:../plantilla/plantillaBomberoImprimir.php ");
header("location:../plantilla/plantillaBomberoImprimirPDF.php ");
?>

