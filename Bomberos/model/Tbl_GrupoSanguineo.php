<?php

Class Tbl_GrupoSanguineo{

  private $idGrupoSanguineo;
  private $nombreGrupoSanguineo;
  private $factorRHPositivo;

  public function __construct(){
  }

  public function getIdGrupoSanguineo(){
      return $this->idGrupoSanguineo;
  }

  public function setIdGrupoSanguineo($idGrupoSanguineo){
      $this->idGrupoSanguineo = $idGrupoSanguineo;
  }


  public function getNombreGrupoSanguineo(){
    return $this->nombreGrupoSanguineo;
  }

  public function setNombreGrupoSanguineo($nombreGrupoSanguineo){
      $this->nombreGrupoSanguineo = $nombreGrupoSanguineo;
  }

  public function getFactorRHPositivo(){
    return $this->factorRHPositivo;
  }

  public function setFactorRHPositivo($factorRHPositivo){
      $this->factorRHPositivo = $factorRHPositivo;
  }


}

 ?>
