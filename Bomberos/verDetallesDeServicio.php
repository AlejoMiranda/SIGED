<?php
require_once("model/Data.php");

$data = new Data();

$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";

$detalles=$data->verDetallesDeServicioPorId($id);

echo " ".$detalles->getFk_tipoDeServicio()."  solicitado por ".$detalles->getNombre_servicio().", Rut: ".$detalles->getRut_servicio()."
Teléfono: ".$detalles->getTelefono_servicio().". En el sector de ".$detalles->getFk_sector().", ".$detalles->getDireccion_servicio().",
".$detalles->getEsquina1_servicio()." con ".$detalles->getEsquina2_servicio().". ".$detalles->getDetalles_servicio()."
";

?>
