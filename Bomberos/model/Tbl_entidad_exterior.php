<?php
  Class Tbl_entidad_exterior{

    private $idEntidadExterior;
    private $nombreEntidadExterior;

    public function __construct(){
    }

    public function getIdEntidadExterior(){
        return $this->idEntidadExterior;
    }
    public function setIdEntidadExterior($idEntidadExterior){
        $this->idEntidadExterior = $idEntidadExterior;
    }
    public function getNombreEntidadExterior(){
      return $this->nombreEntidadExterior;
    }
    public function setNombreEntidadExterior($nombreEntidadExterior){
      $this->nombreEntidadExterior = $nombreEntidadExterior;
    }

  }
 ?>
