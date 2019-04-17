<?php

Class Tbl_informacionDeCargos{

  private $id_informacionDeCargos;
  private $fk_materialMenorAsignado_informacionDeCargos;
  private $cantidadAsignada_informacionDeCargos;
  private $fk_personal_informacionDeCargos;

  public function __construct(){
  }

  public function getId_informacionDeCargos(){
      return $this->id_informacionDeCargos;
  }

  public function setId_informacionDeCargos($id_informacionDeCargos){
      $this->id_informacionDeCargos = $id_informacionDeCargos;
  }


  public function getFk_materialMenorAsignado_informacionDeCargos(){
    return $this->fk_materialMenorAsignado_informacionDeCargos;
  }

  public function setFk_materialMenorAsignado_informacionDeCargos($fk_materialMenorAsignado_informacionDeCargos){
      $this->fk_materialMenorAsignado_informacionDeCargos = $fk_materialMenorAsignado_informacionDeCargos;
  }


  public function getCantidadAsignada_informacionDeCargos(){
      return $this->cantidadAsignada_informacionDeCargos;
  }

  public function setCantidadAsignada_informacionDeCargos($cantidadAsignada_informacionDeCargos){
      $this->cantidadAsignada_informacionDeCargos = $cantidadAsignada_informacionDeCargos;
  }

  public function getFk_personal_informacionDeCargos(){
      return $this->fk_personal_informacionDeCargos;
  }

  public function setFk_personal_informacionDeCargos($fk_personal_informacionDeCargos){
      $this->fk_personal_informacionDeCargos = $fk_personal_informacionDeCargos;
  }


}

 ?>
