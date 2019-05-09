<?php

Class VistaUnidadReporte
{

    private $codigoUnidad;

    private $compania;

    private $chasis;

    private $tipoUnidad;

    private $fechaRegistro;

    public function __construct()
    {}

    public function getCodigoUnidad()
    {
        return $this->codigoUnidad;
    }

    public function getCompania()
    {
        return $this->compania;
    }

    public function getChasis()
    {
        return $this->chasis;
    }

    public function getTipoUnidad()
    {
        return $this->tipoUnidad;
    }

    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    public function setCodigoUnidad($codigoUnidad)
    {
        $this->codigoUnidad = $codigoUnidad;
    }

    public function setCompania($compania)
    {
        $this->compania = $compania;
    }

    public function setChasis($chasis)
    {
        $this->chasis = $chasis;
    }

    public function setTipoUnidad($tipoUnidad)
    {
        $this->tipoUnidad = $tipoUnidad;
    }

    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    }
}