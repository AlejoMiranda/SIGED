<?php
Class Tbl_sector{

  private $idSector;
  private $nombreSector;

  public function __construct(){
  }

  public function getIdSector(){
      return $this->idSector;
  }

  public function setIdSector($idSector){
      $this->idSector = $idSector;
  }


  public function getNombreSector(){
    return $this->nombreSector;
  }

  public function setNombreSector($nombreSector){
      $this->nombreSector = $nombreSector;
  }


}
 ?>
