<?php

Class Tbl_InfoLaboral{


      private $idInformacionLaboral;
      private $nombreEmpresainformacionLaboral;
      private $direccionEmpresainformacionLaboral;
      private $telefonoEmpresainformacionLaboral;
      private $cargoEmpresainformacionLaboral;
      private $fechaIngresoEmpresainformacionLaboral;
      private $areaDeptoEmpresainformacionLaboral;
      private $afp_informacionLaboral;
      private $profesion_informacionLaboral;
      private $fkInfoPersonalinformacionLaboral;

      public function __construct(){
      }

      public function getIdidInformacionLaboral(){
          return $this->idInformacionLaboral;
      }

      public function setIdidInformacionLaboral($idInformacionLaboral){
          $this->idInformacionLaboral = $idInformacionLaboral;
      }


      public function getnombreEmpresainformacionLaboral(){
        return $this->nombreEmpresainformacionLaboral;
      }

      public function setnombreEmpresainformacionLaboral($nombreEmpresainformacionLaboral){
          $this->nombreEmpresainformacionLaboral = $nombreEmpresainformacionLaboral;
      }

      public function getdireccionEmpresainformacionLaboral(){
        return $this->direccionEmpresainformacionLaboral;
      }

      public function setdireccionEmpresainformacionLaboral($direccionEmpresainformacionLaboral){
          $this->direccionEmpresainformacionLaboral = $direccionEmpresainformacionLaboral;
      }

      public function gettelefonoEmpresainformacionLaboral(){
          return $this->telefonoEmpresainformacionLaboral;
      }

      public function settelefonoEmpresainformacionLaboral($telefonoEmpresainformacionLaboral){
          $this->telefonoEmpresainformacionLaboral = $telefonoEmpresainformacionLaboral;
      }

      public function getcargoEmpresainformacionLaboral(){
          return $this->cargoEmpresainformacionLaboral;
      }

      public function setcargoEmpresainformacionLaboral($cargoEmpresainformacionLaboral){
          $this->cargoEmpresainformacionLaboral = $cargoEmpresainformacionLaboral;
      }

      public function getfechaIngresoEmpresainformacionLaboral(){
          return $this->fechaIngresoEmpresainformacionLaboral;
      }

      public function setfechaIngresoEmpresainformacionLaboral($fechaIngresoEmpresainformacionLaboral){
          $this->fechaIngresoEmpresainformacionLaboral = $fechaIngresoEmpresainformacionLaboral;
      }

      public function getareaDeptoEmpresainformacionLaboral(){
          return $this->areaDeptoEmpresainformacionLaboral;
      }

      public function setareaDeptoEmpresainformacionLaboral($areaDeptoEmpresainformacionLaboral){
          $this->areaDeptoEmpresainformacionLaboral = $areaDeptoEmpresainformacionLaboral;
      }

      public function getafp_informacionLaboral(){
          return $this->afp_informacionLaboral;
      }

      public function setafp_informacionLaboral($afp_informacionLaboral){
          $this->afp_informacionLaboral = $afp_informacionLaboral;
      }

      public function getprofesion_informacionLaboral(){
          return $this->profesion_informacionLaboral;
      }

      public function setprofesion_informacionLaboral($profesion_informacionLaboral){
          $this->profesion_informacionLaboral = $profesion_informacionLaboral;
      }

      public function getfkInfoPersonalinformacionLaboral(){
          return $this->fkInfoPersonalinformacionLaboral;
      }

      public function setfkInfoPersonalinformacionLaboral($fkInfoPersonalinformacionLaboral){
          $this->fkInfoPersonalinformacionLaboral = $fkInfoPersonalinformacionLaboral;
      }






}
?>
