<?php

Class Tbl_TipoBodega{

  private $idTipoBodega;
  private $nombreTipoBodega;

  public function __construct(){
  }

  public function getIdidTipoBodega(){
      return $this->idTipoBodega;
  }

  public function setidTipoBodega($idTipoBodega){
      $this->idTipoBodega = $idTipoBodega;
  }


  public function getNombreTipoBodega(){
    return $this->nombreTipoBodega;
  }

  public function setNombreTipoBodega($nombreTipoBodega){
      $this->nombreTipoBodega = $nombreTipoBodega;
  }


}

 ?>
