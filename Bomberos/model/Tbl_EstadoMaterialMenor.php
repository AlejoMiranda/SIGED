<?php

Class Tbl_EstadoMaterialMenor {

private $id_estado_material_menor;
private $nombre_estado_material_menor;


public function __construct(){
}


public function getId_estado_material_menor(){
    return $this->id_estado_material_menor;
}

public function setId_estado_material_menor($id_estado_material_menor){
    $this->id_estado_material_menor = $id_estado_material_menor;
}


public function getNombre_estado_material_menor(){
  return $this->nombre_estado_material_menor;
}

public function setNombre_estado_material_menor($nombre_estado_material_menor){
    $this->nombre_estado_material_menor = $nombre_estado_material_menor;
}


}



?>
