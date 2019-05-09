<?php

class VistaInventarioReporte
{

    private $material;

    private $compania;

    private $bodega;

    private $cantidad;

    private $marca;

    private $descripcion;
    
    private $estado;

    public function getMaterial()
    {
        return $this->material;
    }

    public function getCompania()
    {
        return $this->compania;
    }

    public function getBodega()
    {
        return $this->bodega;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setMaterial($material)
    {
        $this->material = $material;
    }

    public function setCompania($compania)
    {
        $this->compania = $compania;
    }

    public function setBodega($bodega)
    {
        $this->bodega = $bodega;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function __construct()
    {}
    
    
}

