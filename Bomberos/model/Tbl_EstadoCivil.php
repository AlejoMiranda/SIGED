<?php

Class Tbl_EstadoCivil{

    private $idEstadoCivil;
    private $nombreEstadoCivil;

    public function __construct(){

    }

    public function getIdEstadoCivil(){
        return $this->idEstadoCivil;
    }

    public function setIdEstadoCivil($idEstadoCivil){
        $this->idEstadoCivil = $idEstadoCivil;
    }

    public function getNombreEstadoCivil(){
      return $this->nombreEstadoCivil;
    }

    public function setNombreEstadoCivil($nombreEstadoCivil){
        $this->nombreEstadoCivil = $nombreEstadoCivil;
    }

}



 ?>
