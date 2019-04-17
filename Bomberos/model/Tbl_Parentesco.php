<?php

Class Tbl_Parentesco{

  private $idParentesco;
  private $nombreParentesco;

  public function __construct(){
  }

  public function getIdParentesco(){
      return $this->idParentesco;
  }

  public function setIdParentesco($idParentesco){
      $this->idParentesco = $idParentesco;
  }


  public function getNombreParentesco(){
    return $this->nombreParentesco;
  }

  public function setNombreParentesco($nombreParentesco){
      $this->nombreParentesco = $nombreParentesco;
  }


}

 ?>
