<?php
Class Tbl_tipo_servicio{
  private $id_tipo_servicio;
  private $codigo_tipo_servicio;
  private $nombre_tipo_servicio;
  public function __construct(){
  }
  public function getId_tipo_servicio(){
      return $this->id_tipo_servicio;
  }
  public function setId_tipo_servicio($id_tipo_servicio){
      $this->id_tipo_servicio = $id_tipo_servicio;
  }
  public function getCodigo_tipo_servicio(){
    return $this->codigo_tipo_servicio;
  }
  public function setCodigo_tipo_servicio($codigo_tipo_servicio){
      $this->codigo_tipo_servicio = $codigo_tipo_servicio;
  }
  public function getNombre_tipo_servicio(){
    return $this->nombre_tipo_servicio;
  }
  public function setNombre_tipo_servicio($nombre_tipo_servicio){
      $this->nombre_tipo_servicio = $nombre_tipo_servicio;
  }
}
 ?>
