<?php
  Class Tbl_oficial{
    private $idOficial;
    private $rangoOficial;
    private $codigoOficial;

    public function __construct(){
    }

    public function getIdOficial(){
        return $this->idOficial;
    }
    public function setIdOficial($idOficial){
        $this->idOficial = $idOficial;
    }
    public function getRangoOficial(){
      return $this->rangoOficial;
    }
    public function setRangoOficial($rangoOficial){
      $this->rangoOficial = $rangoOficial;
    }
    public function getCodigoOficial(){
      return $this->codigoOficial;
    }
    public function setCodigoOficial($codigoOficial){
      $this->codigoOficial = $codigoOficial;
    }



  }
 ?>
