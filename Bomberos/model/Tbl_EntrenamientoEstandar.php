<?php

  Class EntrenamientoEstandar{


    private $idEntrenamientoEstandar;
    private $fechaEntrenamientoEstandar;
    private $actividad;
    private $fkEstadoCurso;
    private $fkInformacionPersonal;

    public function __construct(){
    }

    public function getIdEntrenamientoEstandar(){
        return $this->idEntrenamientoEstandar;
    }

    public function setIdEntrenamientoEstandar($idEntrenamientoEstandar){
        $this->idEntrenamientoEstandar = $idEntrenamientoEstandar;
    }


    public function getfechaEntrenamientoEstandar(){
      return $this->fechaEntrenamientoEstandar;
    }

    public function setfechaEntrenamientoEstandar($fechaEntrenamientoEstandar){
        $this->fechaEntrenamientoEstandar = $fechaEntrenamientoEstandar;
    }

    public function getactividad(){
      return $this->actividad;
    }

    public function setactividad($actividad){
        $this->actividad = $actividad;
    }

    public function getFkEstadoCurso(){
        return $this->fkEstadoCurso;
    }

    public function setFkEstadoCurso($fkEstadoCurso){
        $this->fkEstadoCurso = $fkEstadoCurso;
    }

    public function getFkInformacionPersonal(){
        return $this->fkInformacionPersonal;
    }

    public function setFkInformacionPersonal($fkInformacionPersonal){
        $this->fkInformacionPersonal = $fkInformacionPersonal;
    }

  }





 ?>
