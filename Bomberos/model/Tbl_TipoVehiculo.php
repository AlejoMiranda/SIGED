<?php


  Class Tbl_TipoVehiculo{

    private $idTipoVehiculo;
    private $nombreTipoVehiculo;

    public function __construct(){
    }

    public function getIdTipoVehiculo(){
        return $this->idTipoVehiculo;
    }

    public function setIdTipoVehiculo($idTipoVehiculo){
        $this->idTipoVehiculo = $idTipoVehiculo;
    }

    public function getNombreTipoVehiculo(){
      return $this->nombreTipoVehiculo;
    }

    public function setNombreTipoVehiculo($nombreTipoVehiculo){
      $this->nombreTipoVehiculo = $nombreTipoVehiculo;
    }

  }

 ?>
