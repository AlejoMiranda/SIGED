<?php


Class VistaCombustibleReporte
{
    
    
    private $codigoUnidad;
    
    private $compania;
    
    private $tipoUnidad;
    
    private $fechaCargo;
    
    private $litros;
    
    private $responsable;

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

    public function getFechaCargo()
    {
        return $this->fechaCargo;
    }

    public function getLitros()
    {
        return $this->litros;
    }

    public function getResponsable()
    {
        return $this->responsable;
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

    public function setFechaCargo($fechaCargo)
    {
        $this->fechaCargo = $fechaCargo;
    }

    public function setLitros($litros)
    {
        $this->litros = $litros;
    }

    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    public function __construct()
    {}
}

