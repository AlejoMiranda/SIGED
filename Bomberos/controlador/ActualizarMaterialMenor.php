<?php
require_once("../model/Data.php");
require_once("../model/Tbl_MaterialMenor.php");
$data = new Data();

$materialMenor= new Tbl_MaterialMenor();

$materialMenor->setId_material_menor($_REQUEST["idMaterialAModificar"]);
$materialMenor->setNombre_material_menor($_REQUEST["txtnombreMaterial"]);
$materialMenor->setFk_entidad_a_cargo_material_menor($_REQUEST["cboEntidadACargoModificar"]);
$materialMenor->setColor_material_menor($_REQUEST["txtColor"]);
$materialMenor->setCantidad_material_menor($_REQUEST["txtcantidadMaterial"]);
$materialMenor->setMedida_material_menor($_REQUEST["numMedida"]);
$materialMenor->setFk_unidad_de_medida_material_menor($_REQUEST["cboxMedida"]);
$materialMenor->setFk_ubicacion_fisica_material_menor($_REQUEST["cboxUbicacionModificar"]);
$materialMenor->setFabricante_material_menor($_REQUEST["txtmarca"]);
$materialMenor->setProveedor_material_menor($_REQUEST["txtProveedor"]);
$materialMenor->setFkEstadoMaterialMenor($_REQUEST["cboEstadoMaterial"]);
$materialMenor->setDetalleMaterialMenor($_REQUEST["txtDetalle"]);

$materialMenor->setFecha_de_caducidad_material_menor($_REQUEST["txtCaducidad"]);

if (isset($_POST['checknoaplica'])) {
  $materialMenor->setFecha_de_caducidad_material_menor('0000-00-00');
}

$data->actualizarMaterialMenor($materialMenor);

header("location: ../buscarInventario.php");

?>
