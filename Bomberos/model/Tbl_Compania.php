<?php

Class Tbl_Compania{

  private $idCompania;
  private $nombreCompania;

  public function __construct(){
  }

  public function getIdCompania(){
      return $this->idCompania;
  }

  public function setIdCompania($idCompania){
      $this->idCompania = $idCompania;
  }


  public function getNombreCompania(){
    return $this->nombreCompania;
  }

  public function setNombreCompania($nombreCompania){
      $this->nombreCompania = $nombreCompania;
  }


}

 ?>
