<?php

Class Tbl_UbicacionFisica{

  private $idUbicacionFisica;
  private $nombreUbicacionFisica;

  public function __construct(){
  }

  public function getIdUbicacionFisica(){
      return $this->idUbicacionFisica;
  }

  public function setIdUbicacionFisica($idUbicacionFisica){
      $this->idUbicacionFisica = $idUbicacionFisica;
  }


  public function getNombreUbicacionFisica(){
    return $this->nombreUbicacionFisica;
  }

  public function setNombreUbicacionFisica($nombreUbicacionFisica){
      $this->nombreUbicacionFisica = $nombreUbicacionFisica;
  }


}

 ?>
