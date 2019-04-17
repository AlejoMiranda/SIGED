<?php


  Class Tbl_Permiso{

    private $idPermiso;
    private $nombrePermiso;

    public function __construct(){
    }

    public function getIdPermiso(){
        return $this->idPermiso;
    }

    public function setIdPermiso($idPermiso){
        $this->idPermiso = $idPermiso;
    }

    public function getNombrePermiso(){
      return $this->nombrePermiso
    }

    public function setNombrePermiso($nombrePermiso){
      $this->nombrePermiso = $nombrePermiso
    }







  }

 ?>
