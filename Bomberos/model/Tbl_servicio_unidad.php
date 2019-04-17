<?php

Class Tbl_servicio_unidad{

  private $id_servicio_unidad;
  private $fk_servicio;
  private $momento6_0;
  private $obac;
  private $conductor;
  private $n_Bomberos;
  private $momento6_3;
  private $momento6_7;
  private $momento6_8;
  private $momento6_9;
  private $momento6_10;
  private $emergenciaActiva;


  public function __construct(){
  }

  public function getId_servicio_unidad(){
      return $this->id_servicio_unidad;
  }

  public function setId_servicio_unidad($id_servicio_unidad){
      $this->id_servicio_unidad = $id_servicio_unidad;
  }


  public function getFk_servicio(){
    return $this->fk_servicio;
  }

  public function setFk_servicio($fk_servicio){
      $this->fk_servicio = $fk_servicio;
  }

  public function getFk_unidad(){
      return $this->fk_unidad;
  }

  public function setFk_unidad($fk_unidad){
      $this->fk_unidad = $fk_unidad;
  }


  public function getMomento6_0(){
      return $this->momento6_0;
  }

  public function setMomento6_0($momento6_0){
      $this->momento6_0 = $momento6_0;
  }


  public function getObac(){
    return $this->obac;
  }

  public function setObac($obac){
      $this->obac = $obac;
  }

  public function getConductor(){
      return $this->conductor;
  }

  public function setConductor($conductor){
      $this->conductor = $conductor;
  }


  public function getN_Bomberos(){
      return $this->n_Bomberos;
  }

  public function setN_Bomberos($n_Bomberos){
      $this->n_Bomberos = $n_Bomberos;
  }


  public function getMomento6_3(){
    return $this->momento6_3;
  }

  public function setMomento6_3($momento6_3){
      $this->momento6_3 = $momento6_3;
  }


  public function getMomento6_7(){
    return $this->momento6_7;
  }

  public function setMomento6_7($momento6_7){
      $this->momento6_7 = $momento6_7;
  }


  public function getMomento6_8(){
    return $this->momento6_8;
  }

  public function setMomento6_8($momento6_8){
      $this->momento6_8 = $momento6_8;
  }


  public function getMomento6_9(){
    return $this->momento6_9;
  }

  public function setMomento6_9($momento6_9){
      $this->momento6_9 = $momento6_9;
  }


  public function getMomento6_10(){
    return $this->momento6_10;
  }

  public function setMomento6_10($momento6_10){
      $this->momento6_10 = $momento6_10;
  }

  public function getEmergenciaActiva(){
    return $this->emergenciaActiva;
  }

  public function setEmergenciaActiva($emergenciaActiva){
      $this->emergenciaActiva = $emergenciaActiva;
  }




}

 ?>
