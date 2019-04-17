<?php
Class Tbl_InfoHistorica{

      private $idInformacionHistorica;
      private $fkRegioninformacionHistorica;
      private $cuerpo;
      private $compania;
      private $fechaDeCambio;
      private $premio;
      private $motivo;
      private $detalle;
      private $cargo;
      private $fkInfoPersonalinformacionHistorica;

      public function __construct(){
      }
      public function getIdInformacionHistorica(){
          return $this->idInformacionHistorica;
      }
      public function setIdInformacionHistorica($idInformacionHistorica){
          $this->idInformacionHistorica = $idInformacionHistorica;
      }
      public function getfkRegioninformacionHistorica(){
        return $this->fkRegioninformacionHistorica;
      }
      public function setfkRegioninformacionHistorica($fkRegioninformacionHistorica){
          $this->fkRegioninformacionHistorica = $fkRegioninformacionHistorica;
      }
      public function getcuerpo(){
        return $this->cuerpo;
      }
      public function setcuerpo($cuerpo){
          $this->cuerpo = $cuerpo;
      }
      public function getcompania(){
          return $this->compania;
      }
      public function setcompania($compania){
          $this->compania = $compania;
      }
      public function getfechaDeCambio(){
          return $this->fechaDeCambio;
      }
      public function setfechaDeCambio($fechaDeCambio){
          $this->fechaDeCambio = $fechaDeCambio;
      }
      public function getPremio(){
          return $this->premio;
      }
      public function setPremio($premio){
          $this->premio = $premio;
      }
      public function getmotivo(){
          return $this->motivo;
      }
      public function setmotivo($motivo){
          $this->motivo = $motivo;
      }
      public function getdetalle(){
          return $this->detalle;
      }
      public function setdetalle($detalle){
          $this->detalle = $detalle;
      }
      public function getCargo(){
          return $this->cargo;
      }
      public function setCargo($cargo){
          $this->cargo = $cargo;
      }
      public function getfkInfoPersonalinformacionHistorica(){
          return $this->fkInfoPersonalinformacionHistorica;
      }
      public function setfkInfoPersonalinformacionHistorica($fkInfoPersonalinformacionHistorica){
          $this->fkInfoPersonalinformacionHistorica = $fkInfoPersonalinformacionHistorica;
      }
}
?>
