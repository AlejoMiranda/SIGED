<?php

Class Tbl_Mantencion{

private $id_mantencion;
private $fk_tipo_mantencion;
private $fecha_mantencion;
private $responsable_mantencion;
private $direccion_mantencion;
private $comentarios_mantencion;
private $fk_unidad;


  public function __construct(){
  }

  public function getIdMantencion(){
      return $this->id_mantencion;
  }

  public function setIdMantencion($id_mantencion){
      $this->id_mantencion = $id_mantencion;
  }


  public function getFk_tipo_mantencion(){
    return $this->fk_tipo_mantencion;
  }

  public function setFk_tipo_mantencion($fk_tipo_mantencion){
      $this->fk_tipo_mantencion = $fk_tipo_mantencion;
  }

  public function getFecha_mantencion(){
    return $this->fecha_mantencion;
  }

  public function setFecha_mantencion($fecha_mantencion){
      $this->fecha_mantencion = $fecha_mantencion;
  }


  public function getResponsable_mantencion(){
    return $this->responsable_mantencion;
  }

  public function setResponsable_mantencion($responsable_mantencion){
      $this->responsable_mantencion = $responsable_mantencion;
  }


  public function getDireccion_mantencion(){
    return $this->direccion_mantencion;
  }

  public function setDireccion_mantencion($direccion_mantencion){
      $this->direccion_mantencion = $direccion_mantencion;
  }


  public function getComentarios_mantencion(){
    return $this->comentarios_mantencion;
  }

  public function setComentarios_mantencion($comentarios_mantencion){
      $this->comentarios_mantencion = $comentarios_mantencion;
  }

  public function getFk_unidad(){
    return $this->fk_unidad;
  }

  public function setFk_unidad($fk_unidad){
      $this->fk_unidad = $fk_unidad;
  }



}

?>
