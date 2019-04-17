<?php
Class Tbl_tipoMantencion{

  private $id_tipo_de_mantencion;
  private $nombre_tipoDeMantencion;

  public function __construct(){
  }
  
  public function getId_tipo_de_mantencion(){
      return $this->id_tipo_de_mantencion;
  }
  public function setId_tipo_de_mantencion($id_tipo_de_mantencion){
      $this->id_tipo_de_mantencion = $id_tipo_de_mantencion;
  }
  public function getNombre_tipoDeMantencion(){
    return $this->nombre_tipoDeMantencion;
  }
  public function setNombre_tipoDeMantencion($nombre_tipoDeMantencion){
      $this->nombre_tipoDeMantencion = $nombre_tipoDeMantencion;
  }
}
 ?>
