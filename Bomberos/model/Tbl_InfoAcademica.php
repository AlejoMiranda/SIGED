<?php

 Class Tbl_InfoAcademica{


    private $idInformacionAcademica;
    private $fechaInformacionAcademica;
    private $actividadInformacionAcademica;
    private $fkEstadoCursoInformacionAcademica;
    private $fkInformacionPersonalInformacionAcademica;

    public function __construct(){
    }

    public function getIdidInformacionAcademica(){
        return $this->idInformacionAcademica;
    }

    public function setIdidInformacionAcademica($idInformacionAcademica){
        $this->idInformacionAcademica = $idInformacionAcademica;
    }

    public function getfechaInformacionAcademica(){
        return $this->fechaInformacionAcademica;
    }

    public function setfechaInformacionAcademica($fechaInformacionAcademica){
        $this->fechaInformacionAcademica = $fechaInformacionAcademica;
    }

    public function getactividadInformacionAcademica(){
        return $this->actividadInformacionAcademica;
    }

    public function setactividadInformacionAcademica($actividadInformacionAcademica){
        $this->actividadInformacionAcademica = $actividadInformacionAcademica;
    }

    public function getfkEstadoCursoInformacionAcademica(){
        return $this->fkEstadoCursoInformacionAcademica;
    }

    public function setfkEstadoCursoInformacionAcademica($fkEstadoCursoInformacionAcademica){
        $this->fkEstadoCursoInformacionAcademica = $fkEstadoCursoInformacionAcademica;
    }

    public function getfkInformacionPersonalInformacionAcademica(){
        return $this->fkInformacionPersonalInformacionAcademica;
    }

    public function setfkInformacionPersonalInformacionAcademica($fkInformacionPersonalInformacionAcademica){
        $this->fkInformacionPersonalInformacionAcademica = $fkInformacionPersonalInformacionAcademica;
    }


 }





?>
