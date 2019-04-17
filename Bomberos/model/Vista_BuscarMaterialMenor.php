<?php

Class Vista_BuscarMaterialMenor{

private $nombre;
private $cantidad;
private $fechaDeCaducidad;
private $nombreEntidad;
private $idMaterialMenor;


public function __construct(){
}

public function getNombre(){
    return $this->nombre;
}

public function setNombre($nombre){
    $this->nombre = $nombre;
}


public function getCantidad(){
  return $this->cantidad;
}

public function setCantidad($cantidad){
    $this->cantidad = $cantidad;
}

public function getFechaDeCaducidad(){
    return $this->fechaDeCaducidad;
}

public function setFechaDeCaducidad($fechaDeCaducidad){
    $this->fechaDeCaducidad = $fechaDeCaducidad;
}

public function getNombreEntidad(){
    return $this->nombreEntidad;
}

public function setNombreEntidad($nombreEntidad){
    $this->nombreEntidad = $nombreEntidad;
}


public function getIdMaterialMenor(){
  return $this->idMaterialMenor;
}

public function setIdMaterialMenor($idMaterialMenor){
    $this->idMaterialMenor = $idMaterialMenor;
}









}



?>
