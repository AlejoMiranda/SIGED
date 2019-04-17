<?php
require_once("model/Data.php");

//require_once("javascript/jsonScript.js");

$data = new Data();

$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";

$materialMenor = $data->getMaterialeMenorPorId($id);

$id=$materialMenor->getId_material_menor();
$nombre=$materialMenor->getNombre_material_menor();
$fkEntidadACargo=$materialMenor->getFk_entidad_a_cargo_material_menor();
$color=$materialMenor->getColor_material_menor();
$cantidad=$materialMenor->getCantidad_material_menor();
$medida=$materialMenor->getMedida_material_menor();
$fkUnidadMedida=$materialMenor->getFk_unidad_de_medida_material_menor();
$fkUbicacionFisica=$materialMenor->getFk_ubicacion_fisica_material_menor();
$fabricante=$materialMenor->getFabricante_material_menor();
$fechaDeCaducidad=$materialMenor->getFecha_de_caducidad_material_menor();

if($fechaDeCaducidad=='00/00/0000'){
  $fechaDeCaducidad='No aplica';
}

$proveedor=$materialMenor->getProveedor_material_menor();
$estado=$materialMenor->getFkEstadoMaterialMenor();
$detalle=$materialMenor->getDetalleMaterialMenor();

$arrayRepresentativoDelObjeto=array("id"=>$id ,"nombre"=> utf8_encode($nombre),
                                  "fkEntidadACargo"=> utf8_encode($fkEntidadACargo),
                                   "color"=> utf8_encode($color),
                                   "cantidad"=> $cantidad, "medida"=> $medida,
                                   "fkUnidad"=> utf8_encode($fkUnidadMedida), "fkUbicacion"=> utf8_encode($fkUbicacionFisica), "fabricante"=> utf8_encode($fabricante),
                                   "fechaDeCaducidad"=>$fechaDeCaducidad, "proveedor"=> utf8_encode($proveedor),
                                   "estado"=> utf8_encode($estado), "detalle"=> utf8_encode($detalle) );

//var_dump($arrayACrear);
//$algo=array('name' => "Marcelo",'age' => "27");
$obj=json_encode($arrayRepresentativoDelObjeto);
echo $obj;

?>
