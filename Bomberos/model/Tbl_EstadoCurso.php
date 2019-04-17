<?php

Class Tbl_EstadoCurso{

  private $idEstadoCurso;
  private $nombreEstadoCurso;

  public function __construct(){
  }

  public function getIdEstadoCurso(){
      return $this->idEstadoCurso;
  }

  public function setIdEstadoCurso($idEstadoCurso){
      $this->idEstadoCurso = $idEstadoCurso;
  }


  public function getNombreEstadoCurso(){
    return $this->nombreEstadoCurso;
  }

  public function setNombreEstadoCurso($nombreEstadoCurso){
      $this->nombreEstadoCurso = $nombreEstadoCurso;
  }


}

 ?>
