<?php

Class Vista_BusquedaBombero{

  private $rut;
  private $nombre;
  private $apellidoPaterno;
  private $compania;
  private $idInfoPersonal;

  public function __construct(){

  }

  public function getRut(){
      return $this->rut;
  }

  public function setRut($rut){
      $this->rut = $rut;
  }


  public function getNombre(){
    return $this->nombre;
  }

  public function setNombre($nombre){
      $this->nombre = $nombre;
  }

  public function getApellidoPaterno(){
      return $this->apellidoPaterno;
  }

  public function setApellidoPaterno($apellidoPaterno){
      $this->apellidoPaterno = $apellidoPaterno;
  }


  public function getCompania(){
    return $this->compania;
  }

  public function setCompania($compania){
      $this->compania = $compania;
  }


  public function getIdInfoPersonal(){
      return $this->idInfoPersonal;
  }

  public function setIdInfoPersonal($idInfoPersonal){
      $this->idInfoPersonal = $idInfoPersonal;
  }










}

 ?>
