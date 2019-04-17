<?php

Class Tbl_cargio_combustible{

  private $id_cargio_combustible;
  private $responsable_cargio_combustible;
  private $fecha_cargio;
  private $direccion_cargio;
  private $fk_tipo_combustible_cargio_combustible;
  private $cantidad_litros_cargio_combustible;
  private $precio_litro_cargio_combustible;
  private $observacion_cargio_combustible;
  private $fk_unidad;



  public function __construct(){
  }

  public function getId_cargio_combustible(){
      return $this->id_cargio_combustible;
  }

  public function setId_cargio_combustible($id_cargio_combustible){
      $this->id_cargio_combustible = $id_cargio_combustible;
  }

  public function getResponsable_cargio_combustible(){
    return $this->responsable_cargio_combustible;
  }

  public function setResponsable_cargio_combustible($responsable_cargio_combustible){
      $this->responsable_cargio_combustible = $responsable_cargio_combustible;
  }

  public function getFecha_cargio(){
    return $this->fecha_cargio;
  }

  public function setFecha_cargio($fecha_cargio){
      $this->fecha_cargio = $fecha_cargio;
  }

  public function getDireccion_cargio(){
      return $this->direccion_cargio;
  }

  public function setDireccion_cargio($direccion_cargio){
      $this->direccion_cargio = $direccion_cargio;
  }

  public function getFk_tipo_combustible_cargio_combustible(){
    return $this->fk_tipo_combustible_cargio_combustible;
  }

  public function setFk_tipo_combustible_cargio_combustible($fk_tipo_combustible_cargio_combustible){
      $this->fk_tipo_combustible_cargio_combustible = $fk_tipo_combustible_cargio_combustible;
  }

  public function getCantidad_litros_cargio_combustible(){
    return $this->cantidad_litros_cargio_combustible;
  }

  public function setCantidad_litros_cargio_combustible($cantidad_litros_cargio_combustible){
      $this->cantidad_litros_cargio_combustible = $cantidad_litros_cargio_combustible;
  }

  public function getPrecio_litro_cargio_combustible(){
      return $this->precio_litro_cargio_combustible;
  }

  public function setPrecio_litro_cargio_combustible($precio_litro_cargio_combustible){
      $this->precio_litro_cargio_combustible = $precio_litro_cargio_combustible;
  }

  public function getObservacion_cargio_combustible(){
    return $this->observacion_cargio_combustible;
  }

  public function setObservacion_cargio_combustible($observacion_cargio_combustible){
      $this->observacion_cargio_combustible = $observacion_cargio_combustible;
  }

  public function getFk_unidad(){
    return $this->fk_unidad;
  }

  public function setFk_unidad($fk_unidad){
      $this->fk_unidad = $fk_unidad;
  }

}

 ?>
