<?php

Class Tbl_tipo_combustible{

  private $id_tipo_combustible;
  private $nombre_tipo_combustible;

  public function __construct(){
  }

  public function getId_tipo_combustible(){
      return $this->id_tipo_combustible;
  }

  public function setId_tipo_combustible($id_tipo_combustible){
      $this->id_tipo_combustible = $id_tipo_combustible;
  }

  public function getNombre_tipo_combustible(){
    return $this->nombre_tipo_combustible;
  }

  public function setNombre_tipo_combustible($nombre_tipo_combustible){
      $this->nombre_tipo_combustible = $nombre_tipo_combustible;
  }


}

 ?>
