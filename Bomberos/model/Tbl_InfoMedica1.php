<?php

  Class Tbl_InfoMedica1{


      private $idInformacionMedica1;
      private $prestacionMedica_informacionMedica1;
      private $alergias_informacionMedica1;
      private $enfermedadesCronicasinformacionMedica1;
      private $fkInfoPersonalinformacionMedica1;

      public function __construct(){
      }

      public function getidInformacionMedica1(){
          return $this->idInformacionMedica1;
      }

      public function setidInformacionMedica1($idInformacionMedica1){
          $this->idInformacionMedica1 = $idInformacionMedica1;
      }


      public function getprestacionMedica_informacionMedica1(){
        return $this->prestacionMedica_informacionMedica1;
      }

      public function setprestacionMedica_informacionMedica1($prestacionMedica_informacionMedica1){
          $this->prestacionMedica_informacionMedica1 = $prestacionMedica_informacionMedica1;
      }

      public function getalergias_informacionMedica1(){
        return $this->alergias_informacionMedica1;
      }

      public function setalergias_informacionMedica1($alergias_informacionMedica1){
          $this->alergias_informacionMedica1 = $alergias_informacionMedica1;
      }

      public function getenfermedadesCronicasinformacionMedica1(){
          return $this->enfermedadesCronicasinformacionMedica1;
      }

      public function setenfermedadesCronicasinformacionMedica1($enfermedadesCronicasinformacionMedica1){
          $this->enfermedadesCronicasinformacionMedica1 = $enfermedadesCronicasinformacionMedica1;
      }

      public function getfkInfoPersonalinformacionMedica1(){
          return $this->fkInfoPersonalinformacionMedica1;
      }

      public function setfkInfoPersonalinformacionMedica1($fkInfoPersonalinformacionMedica1){
          $this->fkInfoPersonalinformacionMedica1 = $fkInfoPersonalinformacionMedica1;
      }




  }

?>
