<?php

Class VistaBomberoReporte
{

    private $registro;

    private $compania;

    private $rut;

    private $nombre;

    private $apellido;

    private $fechaIngreso;

    private $fechaNacimiento;

    private $tipoVoluntario;

    private $telefono;

    private $email;

    public function __construct()
    {}

    public function getRegistro()
    {
        return $this->registro;
    }

    public function getCompania()
    {
        return $this->compania;
    }

    public function getRut()
    {
        return $this->rut;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function getTipoVoluntario()
    {
        return $this->tipoVoluntario;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setRegistro($registro)
    {
        $this->registro = $registro;
    }

    public function setCompania($compania)
    {
        $this->compania = $compania;
    }

    public function setRut($rut)
    {
        $this->rut = $rut;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setTipoVoluntario($tipoVoluntario)
    {
        $this->tipoVoluntario = $tipoVoluntario;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}

