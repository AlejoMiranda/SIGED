<?php


require_once("../model/Data.php");
require_once("../model/Tbl_Mantencion.php");
session_start();

$d= new Data();

$id=0;
$fk_tipo_mantencion=$_REQUEST["cboTipoMantencion"];
$fecha_mantencion=$_REQUEST["fechaMantencion"];
$responsable_mantencion=$_REQUEST["txtresponsableMantencion"];
$direccion_mantencion=$_REQUEST["txtDireccion"];
$comentarios_mantencion=$_REQUEST["txtcomentario"];
$fk_unidad=$_REQUEST["cboUnidades"];

$mantencion=new Tbl_Mantencion();

$mantencion->setIdMantencion($id);
$mantencion->setFk_tipo_mantencion($fk_tipo_mantencion);
$mantencion->setFecha_mantencion($fecha_mantencion);
$mantencion->setResponsable_mantencion($responsable_mantencion);
$mantencion->setDireccion_mantencion($direccion_mantencion);
$mantencion->setComentarios_mantencion($comentarios_mantencion);
$mantencion->setFk_unidad($fk_unidad);



$d->crearMantencion($mantencion);


if(isset($_SESSION['seEstaModificandoUnaUnidad'])){
  header("location: CargarFichaUnidadAModificar.php");
}else{
   header("location: ../CrearUnidades.php");
}


?>
