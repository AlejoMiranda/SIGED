<?php
require_once("../model/Data.php");

$d= new Data();
session_start();

$servicio = new Tbl_servicio();

$servicio->setId_servicio(1);
$servicio->setNombre_servicio($_REQUEST["txtnombre"]);
$servicio->setRut_servicio($_REQUEST["txtrut"]);
$servicio->setTelefono_servicio($_REQUEST["txtTF"]);
$servicio->setDireccion_servicio($_REQUEST["txtdireccion"]);
$servicio->setEsquina1_servicio($_REQUEST["txtEsquina1"]);
$servicio->setEsquina2_servicio($_REQUEST["txtEsquina2"]);
$servicio->setFk_sector($_REQUEST["cboSectores"]);
$servicio->setFk_tipoDeServicio($_REQUEST["cboTiposDeServicios"]);
$servicio->setDetalles_servicio($_REQUEST["detalle"]);
//$servicio->setFecha_servicio(date("Y-m-d H:i:s"));

$d->crearServicio($servicio);

$_SESSION["idDeServicioCreado"]=$d->getIdServicioMasReciente();

header("location: ../centraldeDespacho.php");



?>
