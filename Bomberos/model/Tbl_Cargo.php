<?php

Class Tbl_Cargo{

  private $idCargo;
  private $nombreCargo;

  public function __construct(){
  }

  public function getIdCargo(){
      return $this->idCargo;
  }

  public function setIdCargo($idCargo){
      $this->idCargo = $idCargo;
  }


  public function getNombreCargo(){
    return $this->nombreCargo;
  }

  public function setNombreCargo($nombreCargo){
      $this->nombreCargo = $nombreCargo;
  }


}

 ?>
