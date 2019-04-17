<?php

Class ServicioYSector{

  private $servicio;
  private $sector;

  public function __construct(){
  }

  public function getServicio(){
      return $this->servicio;
  }

  public function setServicio($servicio){
      $this->servicio = $servicio;
  }


  public function getSector(){
    return $this->sector;
  }

  public function setSector($sector){
      $this->sector = $sector;
  }


}

 ?>
