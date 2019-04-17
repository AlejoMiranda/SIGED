<?php
  Class Tbl_estadoOficial{
    private $idEstadoOficial;
    private $fkOficial;
    private $nombreEstado_estado_oficial;
    private $momento;

    public function __construct(){
    }

    public function getIdEstadoOficial(){
        return $this->idEstadoOficial;
    }
    public function setIdEstadoOficial($idEstadoOficial){
        $this->idEstadoOficial = $idEstadoOficial;
    }
    public function getFkOficial(){
      return $this->fkOficial;
    }
    public function setFkOficial($fkOficial){
      $this->fkOficial = $fkOficial;
    }
    public function getNombreEstado_estado_oficial(){
      return $this->nombreEstado_estado_oficial;
    }
    public function setNombreEstado_estado_oficial($nombreEstado_estado_oficial){
      $this->nombreEstado_estado_oficial = $nombreEstado_estado_oficial;
    }
    public function getMomento(){
      return $this->momento;
    }
    public function setMomento($momento){
      $this->momento = $momento;
    }

  }
 ?>
