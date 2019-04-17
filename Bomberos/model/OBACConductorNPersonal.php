<?php
  Class OBACConductorNPersonal{

    private $obac;
    private $conductor;
    private $cantidad;

    public function __construct(){
    }

    public function getObac(){
        return $this->obac;
    }
    public function setObac($obac){
        $this->obac = $obac;
    }

    public function getConductor(){
      return $this->conductor;
    }
    public function setConductor($conductor){
      $this->conductor = $conductor;
    }

    public function getCantidad(){
        return $this->cantidad;
    }
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }


  }
 ?>
