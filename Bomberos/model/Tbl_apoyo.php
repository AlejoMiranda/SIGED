<?php
  Class Tbl_apoyo{

    private $idApoyo;
    private $fkEntidad;
    private $responsable;
    private $ppuu;

    public function __construct(){
    }

    public function getIdApoyo(){
        return $this->idApoyo;
    }
    public function setIdApoyo($idApoyo){
        $this->idApoyo = $idApoyo;
    }
    public function getFkEntidad(){
      return $this->fkEntidad;
    }
    public function setFkEntidad($fkEntidad){
      $this->fkEntidad = $fkEntidad;
    }

    public function getResponsable(){
        return $this->responsable;
    }
    public function setResponsable($responsable){
        $this->responsable = $responsable;
    }
    public function getPpuu(){
      return $this->ppuu;
    }
    public function setPpuu($ppuu){
      $this->ppuu = $ppuu;
    }

  }
 ?>
