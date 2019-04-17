<?php

Class Tbl_EstadoBombero{

  private $idEstado;
  private $nombreEstado;

  public function __construct(){
  }

  public function getIdEstado(){
      return $this->idEstado;
  }

  public function setIdEstado($idEstado){
      $this->idEstado = $idEstado;
  }


  public function getNombreEstado(){
    return $this->nombreEstado;
  }

  public function setNombreEstado($nombreEstado){
      $this->nombreEstado = $nombreEstado;
  }


}

 ?>
