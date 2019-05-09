<?php

Class VistaUnidadByFiltro
{
    private $codigoUnidad;
    
    private $compania;
    
    private $tipoUnidad;
    
    private $tipoMantencion;
    
    private $fechaMantencion;
    
    private $detalleMantencion;
    
    public function getCodigoUnidad()
    {
        return $this->codigoUnidad;
    }

    public function getCompania()
    {
        return $this->compania;
    }

    public function getTipoUnidad()
    {
        return $this->tipoUnidad;
    }

    public function getTipoMantencion()
    {
        return $this->tipoMantencion;
    }

    public function getFechaMantencion()
    {
        return $this->fechaMantencion;
    }

    public function getDetalleMantencion()
    {
        return $this->detalleMantencion;
    }

    public function setCodigoUnidad($codigoUnidad)
    {
        $this->codigoUnidad = $codigoUnidad;
    }

    public function setCompania($compania)
    {
        $this->compania = $compania;
    }

    public function setTipoUnidad($tipoUnidad)
    {
        $this->tipoUnidad = $tipoUnidad;
    }

    public function setTipoMantencion($tipoMantencion)
    {
        $this->tipoMantencion = $tipoMantencion;
    }

    public function setFechaMantencion($fechaMantencion)
    {
        $this->fechaMantencion = $fechaMantencion;
    }

    public function setDetalleMantencion($detalleMantencion)
    {
        $this->detalleMantencion = $detalleMantencion;
    }

    public function __construct()
    {}
    
    
}

