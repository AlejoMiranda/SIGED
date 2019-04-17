<?php

Class Tbl_servicio{

  private $id_servicio;
  private $nombre_servicio;
  private $rut_servicio;
  private $telefono_servicio;
  private $direccion_servicio;
  private $esquina1_servicio;
  private $esquina2_servicio;
  private $fk_sector;
  private $fk_tipoDeServicio;
  private $detalles_servicio;
  private $fecha_servicio;

  public function __construct(){
  }

  public function getId_servicio(){
      return $this->id_servicio;
  }

  public function setId_servicio($id_servicio){
      $this->id_servicio = $id_servicio;
  }


  public function getNombre_servicio(){
    return $this->nombre_servicio;
  }

  public function setNombre_servicio($nombre_servicio){
      $this->nombre_servicio = $nombre_servicio;
  }

  public function getRut_servicio(){
      return $this->rut_servicio;
  }

  public function setRut_servicio($rut_servicio){
      $this->rut_servicio = $rut_servicio;
  }


  public function getTelefono_servicio(){
    return $this->telefono_servicio;
  }

  public function setTelefono_servicio($telefono_servicio){
      $this->telefono_servicio = $telefono_servicio;
  }

  public function getDireccion_servicio(){
      return $this->direccion_servicio;
  }

  public function setDireccion_servicio($direccion_servicio){
      $this->direccion_servicio = $direccion_servicio;
  }


  public function getEsquina1_servicio(){
    return $this->esquina1_servicio;
  }

  public function setEsquina1_servicio($esquina1_servicio){
      $this->esquina1_servicio = $esquina1_servicio;
  }

  public function getEsquina2_servicio(){
      return $this->esquina2_servicio;
  }

  public function setEsquina2_servicio($esquina2_servicio){
      $this->esquina2_servicio = $esquina2_servicio;
  }


  public function getFk_sector(){
    return $this->fk_sector;
  }

  public function setFk_sector($fk_sector){
      $this->fk_sector = $fk_sector;
  }

  public function getFk_tipoDeServicio(){
      return $this->fk_tipoDeServicio;
  }

  public function setFk_tipoDeServicio($fk_tipoDeServicio){
      $this->fk_tipoDeServicio = $fk_tipoDeServicio;
  }


  public function getDetalles_servicio(){
    return $this->detalles_servicio;
  }

  public function setDetalles_servicio($detalles_servicio){
      $this->detalles_servicio = $detalles_servicio;
  }

  public function getFecha_servicio(){
      return $this->fecha_servicio;
  }

  public function setFecha_servicio($fecha_servicio){
      $this->fecha_servicio = $fecha_servicio;
  }



}

 ?>
