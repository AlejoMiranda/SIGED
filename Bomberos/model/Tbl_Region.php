<?php

  Class Tbl_Region{

    private $idRegion;
    private $nombreRegion;
    private $ordinalRegion;

    public function __construct(){
    }


    public function getIdRegion(){
        return $this->idRegion;
    }

    public function setIdRegion($idRegion){
        $this->idRegion = $idRegion;
    }


    public function getNombreRegion(){
      return $this->nombreRegion;
    }

    public function setNombreRegion($nombreRegion){
        $this->nombreRegion = $nombreRegion;
    }

    public function getOrdinalRegion(){
        return $this->ordinalRegion;
    }

    public function setOrdinalRegion($ordinalRegion){
        $this->ordinalRegion = $ordinalRegion;
    }



  }

 ?>
