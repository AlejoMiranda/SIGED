<?php
require_once("../model/Data.php");
session_start();
$d= new Data();

$infoCargos=new Tbl_informacionDeCargos();

echo 'Id Info Cargos = '.$_SESSION['idDeBomberoMasReciente'];
echo 'Maerial Menor Asignado = '.$_REQUEST['cboMaterialesDisponibles'];
echo 'Cantidad Material = '.$_REQUEST["cantidadDeMaterialesAsignados"];
echo 'Id del bombero = '.$_SESSION['idDeBomberoMasReciente'];

$infoCargos->setId_informacionDeCargos($_SESSION['idDeBomberoMasReciente']);
$infoCargos->setFk_materialMenorAsignado_informacionDeCargos($_REQUEST['cboMaterialesDisponibles']);
$infoCargos->setCantidadAsignada_informacionDeCargos($_REQUEST["cantidadDeMaterialesAsignados"]);
$infoCargos->setFk_personal_informacionDeCargos($_SESSION['idDeBomberoMasReciente']);
$infoCargos->setFechaEntrega($_SESSION['txtFechaEntrega']);

$d->crearInformacionCargos($infoCargos);
$cantidadNueva=($d->getStockDeMaterial($_REQUEST['cboMaterialesDisponibles']))-($_REQUEST["cantidadDeMaterialesAsignados"]);
$d->actualizarStockDeMaterialMenor($_REQUEST['cboMaterialesDisponibles'],$cantidadNueva);


if(isset($_SESSION['seEstaModificandoUBombero'])){
  header("location: CargarFichaAModificar.php");
}else{
    header("location: ../CrearFicha.php");
}

?>
