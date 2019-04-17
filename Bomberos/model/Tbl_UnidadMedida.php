<?php

Class Tbl_UnidadMedida{

  private $idUnidadMedida;
  private $tipoDeMedida;
  private $nombreUnidadMedida;

  public function __construct(){
  }

  public function getIdUnidadMedida(){
      return $this->idUnidadMedida;
  }

  public function setIdUnidadMedida($idUnidadMedida){
      $this->idUnidadMedida = $idUnidadMedida;
  }

  public function getTipoDeMedida(){
      return $this->tipoDeMedida;
  }

  public function setTipoDeMedida($tipoDeMedida){
      $this->tipoDeMedida = $tipoDeMedida;
  }

  public function getNombreUnidadMedida(){
    return $this->nombreUnidadMedida;
  }

  public function setNombreUnidadMedida($nombreUnidadMedida){
      $this->nombreUnidadMedida = $nombreUnidadMedida;
  }


}

 ?>
