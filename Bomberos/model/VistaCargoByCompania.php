<?php

Class VistaCargoByCompania{

  private $material;
  private $compania;
  private $bombero;
  private $cantidad;
  private $fechaEntrega;  
  private $descripcion;



  public function getMaterial()
    {
        return $this->material;
    }

public function getCompania()
    {
        return $this->compania;
    }

public function getBombero()
    {
        return $this->bombero;
    }

public function getCantidad()
    {
        return $this->cantidad;
    }

public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

public function getDescripcion()
    {
        return $this->descripcion;
    }

public function setMaterial($material)
    {
        $this->material = $material;
    }

public function setCompania($compania)
    {
        $this->compania = $compania;
    }

public function setBombero($bombero)
    {
        $this->bombero = $bombero;
    }

public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;
    }

public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

public function __construct(){
  }

}






?>