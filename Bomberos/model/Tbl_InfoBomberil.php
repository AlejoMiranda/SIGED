<?php

  Class Tbl_InfoBomberil{


    private $idInformacionBomberil;
    private $fkRegioninformacionBomberil;
    private $cuerpoInformacionBomberil;
    private $fkCompaniainformacionBomberil;
    private $fkCargoinformacionBomberil;
    private $fechaIngresoinformacionBomberil;
    private $NRegGeneralinformacionBomberil;
    private $fkEstadoinformacionBomberil;
    private $NRegCiainformacionBomberil;
    private $fkInfoPersonalinformacionBomberil;

    public function __construct(){
    }

    public function getIdInformacionBomberil(){
        return $this->idInformacionBomberil;
    }

    public function setIdInformacionBomberil($idInformacionBomberil){
        $this->idInformacionBomberil = $idInformacionBomberil;
    }


    public function getfkRegioninformacionBomberil(){
      return $this->fkRegioninformacionBomberil;
    }

    public function setfkRegioninformacionBomberil($fkRegioninformacionBomberil){
        $this->fkRegioninformacionBomberil = $fkRegioninformacionBomberil;
    }

    public function getcuerpoInformacionBomberil(){
      return $this->cuerpoInformacionBomberil;
    }

    public function setcuerpoInformacionBomberil($cuerpoInformacionBomberil){
        $this->cuerpoInformacionBomberil = $cuerpoInformacionBomberil;
    }

    public function getfkCompaniainformacionBomberil(){
        return $this->fkCompaniainformacionBomberil;
    }

    public function setfkCompaniainformacionBomberil($fkCompaniainformacionBomberil){
        $this->fkCompaniainformacionBomberil = $fkCompaniainformacionBomberil;
    }

    public function getfkCargoinformacionBomberil(){
        return $this->fkCargoinformacionBomberil;
    }

    public function setfkCargoinformacionBomberil($fkCargoinformacionBomberil){
        $this->fkCargoinformacionBomberil = $fkCargoinformacionBomberil;
    }

    public function getfechaIngresoinformacionBomberil(){
        return $this->fechaIngresoinformacionBomberil;
    }

    public function setfechaIngresoinformacionBomberil($fechaIngresoinformacionBomberil){
        $this->fechaIngresoinformacionBomberil = $fechaIngresoinformacionBomberil;
    }

    public function getNRegGeneralinformacionBomberil(){
        return $this->NRegGeneralinformacionBomberil;
    }

    public function setNRegGeneralinformacionBomberil($NRegGeneralinformacionBomberil){
        $this->NRegGeneralinformacionBomberil = $NRegGeneralinformacionBomberil;
    }

    public function getfkEstadoinformacionBomberil(){
        return $this->fkEstadoinformacionBomberil;
    }

    public function setfkEstadoinformacionBomberil($fkEstadoinformacionBomberil){
        $this->fkEstadoinformacionBomberil = $fkEstadoinformacionBomberil;
    }

    public function getNRegCiainformacionBomberil(){
        return $this->NRegCiainformacionBomberil;
    }

    public function setNRegCiainformacionBomberil($NRegCiainformacionBomberil){
        $this->NRegCiainformacionBomberil = $NRegCiainformacionBomberil;
    }

    public function getfkInfoPersonalinformacionBomberil(){
        return $this->fkInfoPersonalinformacionBomberil;
    }

    public function setfkInfoPersonalinformacionBomberil($fkInfoPersonalinformacionBomberil){
        $this->fkInfoPersonalinformacionBomberil = $fkInfoPersonalinformacionBomberil;
    }

  }





 ?>
