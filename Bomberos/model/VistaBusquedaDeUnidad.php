<?php

Class VistaBusquedaDeUnidad{

  private $nombreUnidad;
  private $estado;
  private $tipoVehiculo;
  private $entidadACargo;
  private $idUnidad;



  public function __construct(){
  }

  public function getNombreUnidad(){
      return $this->nombreUnidad;
  }

  public function setNombreUnidad($nombreUnidad){
      $this->nombreUnidad = $nombreUnidad;
  }


  public function getEstado(){
    return $this->estado;
  }

  public function setEstado($estado){
      $this->estado = $estado;
  }

  public function getTipoVehiculo(){
      return $this->tipoVehiculo;
  }

  public function setTipoVehiculo($tipoVehiculo){
      $this->tipoVehiculo = $tipoVehiculo;
  }

  public function getEntidadACargo(){
      return $this->entidadACargo;
  }

  public function setEntidadACargo($entidadACargo){
      $this->entidadACargo = $entidadACargo;
  }


  public function getIdUnidad(){
    return $this->idUnidad;
  }

  public function setIdUnidad($idUnidad){
      $this->idUnidad = $idUnidad;
  }






}






?>
