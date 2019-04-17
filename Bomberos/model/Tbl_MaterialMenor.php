<?php

Class Tbl_MaterialMenor {

private $id_material_menor;
private $nombre_material_menor;
private $fk_entidad_a_cargo_material_menor;
private $color_material_menor;
private $cantidad_material_menor;
private $medida_material_menor;
private $fk_unidad_de_medida_material_menor;
private $fk_ubicacion_fisica_material_menor;
private $fabricante_material_menor;
private $fecha_de_caducidad_material_menor;
private $proveedor_material_menor;
private $fkEstadoMaterialMenor;
private $detalleMaterialMenor;

public function __construct(){
}


public function getId_material_menor(){
    return $this->id_material_menor;
}

public function setId_material_menor($id_material_menor){
    $this->id_material_menor = $id_material_menor;
}


public function getNombre_material_menor(){
  return $this->nombre_material_menor;
}

public function setNombre_material_menor($nombre_material_menor){
    $this->nombre_material_menor = $nombre_material_menor;
}

public function getFk_entidad_a_cargo_material_menor(){
    return $this->fk_entidad_a_cargo_material_menor;
}

public function setFk_entidad_a_cargo_material_menor($fk_entidad_a_cargo_material_menor){
    $this->fk_entidad_a_cargo_material_menor = $fk_entidad_a_cargo_material_menor;
}

public function getColor_material_menor(){
    return $this->color_material_menor;
}

public function setColor_material_menor($color_material_menor){
    $this->color_material_menor = $color_material_menor;
}


public function getCantidad_material_menor(){
  return $this->cantidad_material_menor;
}

public function setCantidad_material_menor($cantidad_material_menor){
    $this->cantidad_material_menor = $cantidad_material_menor;
}

public function getMedida_material_menor(){
    return $this->medida_material_menor;
}

public function setMedida_material_menor($medida_material_menor){
    $this->medida_material_menor = $medida_material_menor;
}

public function getFk_unidad_de_medida_material_menor(){
    return $this->fk_unidad_de_medida_material_menor;
}

public function setFk_unidad_de_medida_material_menor($fk_unidad_de_medida_material_menor){
    $this->fk_unidad_de_medida_material_menor = $fk_unidad_de_medida_material_menor;
}


public function getFk_ubicacion_fisica_material_menor(){
  return $this->fk_ubicacion_fisica_material_menor;
}

public function setFk_ubicacion_fisica_material_menor($fk_ubicacion_fisica_material_menor){
    $this->fk_ubicacion_fisica_material_menor = $fk_ubicacion_fisica_material_menor;
}

public function getFabricante_material_menor(){
    return $this->fabricante_material_menor;
}

public function setFabricante_material_menor($fabricante_material_menor){
    $this->fabricante_material_menor = $fabricante_material_menor;
}

public function getFecha_de_caducidad_material_menor(){
    return $this->fecha_de_caducidad_material_menor;
}

public function setFecha_de_caducidad_material_menor($fecha_de_caducidad_material_menor){
    $this->fecha_de_caducidad_material_menor = $fecha_de_caducidad_material_menor;
}


public function getProveedor_material_menor(){
    return $this->proveedor_material_menor;
}

public function setProveedor_material_menor($proveedor_material_menor){
    $this->proveedor_material_menor = $proveedor_material_menor;
}


public function getFkEstadoMaterialMenor(){
    return $this->fkEstadoMaterialMenor;
}

public function setFkEstadoMaterialMenor($fkEstadoMaterialMenor){
    $this->fkEstadoMaterialMenor = $fkEstadoMaterialMenor;
}

public function getDetalleMaterialMenor(){
    return $this->detalleMaterialMenor;
}

public function setDetalleMaterialMenor($detalleMaterialMenor){
    $this->detalleMaterialMenor = $detalleMaterialMenor;
}

}



?>
