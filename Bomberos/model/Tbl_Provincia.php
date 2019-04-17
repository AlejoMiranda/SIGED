<?php

Class Tbl_Provincia{

  private $idProvincia;
  private $nombreProvincia;
  private $fkRegion;

  public function __construct(){
  }

  public function getIdProvincia(){
      return $this->idProvincia;
  }

  public function setIdProvincia($idProvincia){
      $this->idProvincia = $idProvincia;
  }


  public function getNombreProvincia(){
    return $this->nombreProvincia;
  }

  public function setNombreProvincia($nombreProvincia){
      $this->nombreProvincia = $nombreProvincia;
  }

  public function getFkRegion(){
      return $this->fkRegion;
  }

  public function setFkRegion($fkRegion){
      $this->fkRegion = $fkRegion;
  }



}





?>
