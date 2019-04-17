<?php

Class Tbl_Comuna{

  private $idComuna;
  private $nombreComuna;
  private $fkProvincia;

  public function __construct(){
  }

  public function getIdComuna(){
      return $this->idComuna;
  }

  public function setIdComuna($idComuna){
      $this->idComuna = $idComuna;
  }


  public function getNombreComuna(){
    return $this->nombreComuna;
  }

  public function setNombreComuna($nombreComuna){
      $this->nombreComuna = $nombreComuna;
  }

  public function getFkComuna(){
      return $this->fkComuna;
  }

  public function setFkComuna($fkComuna){
      $this->fkComuna = $fkComuna;
  }

}



 ?>
