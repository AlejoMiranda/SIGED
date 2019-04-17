<?php

  Class Tbl_InfoMedica2{


        private $idInformacionMedica2;
        private $medicamentosHabitualesinformacionMedica2;
        private $nombreContactoinformacionMedica2;
        private $telefonoContactoinformacionMedica2;
        private $fkParentescoContactoinformacionMedica2;
        private $nivelActividadFisicainformacionMedica2;
        private $esDonanteinformacionMedica2;
        private $esFumadorinformacionMedica2;
        private $fkGrupoSanguineoinformacionMedica2;
        private $fkInfoPersonalinformacionMedica2;

      public function __construct(){
      }

      public function getidInformacionMedica2(){
          return $this->idInformacionMedica2;
      }

      public function setidInformacionMedica2($idInformacionMedica2){
          $this->idInformacionMedica2 = $idInformacionMedica2;
      }


      public function getmedicamentosHabitualesinformacionMedica2(){
        return $this->medicamentosHabitualesinformacionMedica2;
      }

      public function setmedicamentosHabitualesinformacionMedica2($medicamentosHabitualesinformacionMedica2){
          $this->medicamentosHabitualesinformacionMedica2 = $medicamentosHabitualesinformacionMedica2;
      }

      public function getnombreContactoinformacionMedica2(){
        return $this->nombreContactoinformacionMedica2;
      }

      public function setnombreContactoinformacionMedica2($nombreContactoinformacionMedica2){
          $this->nombreContactoinformacionMedica2 = $nombreContactoinformacionMedica2;
      }

      public function gettelefonoContactoinformacionMedica2(){
          return $this->telefonoContactoinformacionMedica2;
      }

      public function settelefonoContactoinformacionMedica2($telefonoContactoinformacionMedica2){
          $this->telefonoContactoinformacionMedica2 = $telefonoContactoinformacionMedica2;
      }

      public function getfkParentescoContactoinformacionMedica2(){
          return $this->fkParentescoContactoinformacionMedica2;
      }

      public function setfkParentescoContactoinformacionMedica2($fkParentescoContactoinformacionMedica2){
          $this->fkParentescoContactoinformacionMedica2 = $fkParentescoContactoinformacionMedica2;
      }

      public function getnivelActividadFisicainformacionMedica2(){
          return $this->nivelActividadFisicainformacionMedica2;
      }

      public function setnivelActividadFisicainformacionMedica2($nivelActividadFisicainformacionMedica2){
          $this->nivelActividadFisicainformacionMedica2 = $nivelActividadFisicainformacionMedica2;
      }

      public function getesDonanteinformacionMedica2(){
          return $this->esDonanteinformacionMedica2;
      }

      public function setesDonanteinformacionMedica2($esDonanteinformacionMedica2){
          $this->esDonanteinformacionMedica2 = $esDonanteinformacionMedica2;
      }

      public function getesFumadorinformacionMedica2(){
          return $this->esFumadorinformacionMedica2;
      }

      public function setesFumadorinformacionMedica2($esFumadorinformacionMedica2){
          $this->esFumadorinformacionMedica2 = $esFumadorinformacionMedica2;
      }

      public function getfkGrupoSanguineoinformacionMedica2(){
          return $this->fkGrupoSanguineoinformacionMedica2;
      }

      public function setfkGrupoSanguineoinformacionMedica2($fkGrupoSanguineoinformacionMedica2){
          $this->fkGrupoSanguineoinformacionMedica2 = $fkGrupoSanguineoinformacionMedica2;
      }

      public function getfkInfoPersonalinformacionMedica2(){
          return $this->fkInfoPersonalinformacionMedica2;
      }

      public function setfkInfoPersonalinformacionMedica2($fkInfoPersonalinformacionMedica2){
          $this->fkInfoPersonalinformacionMedica2 = $fkInfoPersonalinformacionMedica2;
      }




  }

?>
