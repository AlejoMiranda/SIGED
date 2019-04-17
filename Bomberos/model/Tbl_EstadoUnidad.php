<?php


  Class Tbl_EstadoUnidad{

    private $idEstadoUnidad;
    private $nombreEstadoUnidad;

    public function __construct(){
    }

    public function getIdEstadoUnidad(){
        return $this->idEstadoUnidad;
    }

    public function setIdEstadoUnidad($idEstadoUnidad){
        $this->idEstadoUnidad = $idEstadoUnidad;
    }

    public function getNombreEstadoUnidad(){
      return $this->nombreEstadoUnidad;
    }

    public function setNombreEstadoUnidad($nombreEstadoUnidad){
      $this->nombreEstadoUnidad = $nombreEstadoUnidad;
    }

  }

 ?>
