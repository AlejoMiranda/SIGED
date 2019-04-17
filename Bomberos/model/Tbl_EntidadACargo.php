<?php
  Class Tbl_EntidadACargo{
    private $idEntidadACargo;
    private $nombreEntidadACargo;

    public function __construct(){
    }
    public function getIdEntidadACargo(){
        return $this->idEntidadACargo;
    }
    public function setIdEntidadACargo($idEntidadACargo){
        $this->idEntidadACargo = $idEntidadACargo;
    }
    public function getNombreEntidadACargo(){
      return $this->nombreEntidadACargo;
    }
    public function setNombreEntidadACargo($nombreEntidadACargo){
      $this->nombreEntidadACargo = $nombreEntidadACargo;
    }
  }
 ?>
