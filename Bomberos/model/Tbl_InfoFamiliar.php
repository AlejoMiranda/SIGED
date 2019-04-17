<?php

  Class Tbl_InfoFamiliar{


      private $idInformacionFamiliar;
      private $nombresInformacionFamiliar;
      private $fechaNacimientoInformacionFamiliar;
      private $fkParentescoinformacionFamiliar;
      private $fkInfoPersonalinformacionFamiliar;

      public function __construct(){
      }

      public function getIdInformacionFamiliar(){
          return $this->idInformacionFamiliar;
      }

      public function setIdInformacionFamiliar($idInformacionFamiliar){
          $this->idInformacionFamiliar = $idInformacionFamiliar;
      }


      public function getNombresInformacionFamiliar(){
        return $this->nombresInformacionFamiliar;
      }

      public function setNombresInformacionFamiliar($nombresInformacionFamiliar){
          $this->nombresInformacionFamiliar = $nombresInformacionFamiliar;
      }

      public function getFechaNacimientoInformacionFamiliar(){
        return $this->fechaNacimientoInformacionFamiliar;
      }

      public function setFechaNacimientoInformacionFamiliar($fechaNacimientoInformacionFamiliar){
          $this->fechaNacimientoInformacionFamiliar = $fechaNacimientoInformacionFamiliar;
      }

      public function getfkParentescoinformacionFamiliar(){
          return $this->fkParentescoinformacionFamiliar;
      }

      public function setfkParentescoinformacionFamiliar($fkParentescoinformacionFamiliar){
          $this->fkParentescoinformacionFamiliar = $fkParentescoinformacionFamiliar;
      }

      public function getfkInfoPersonalinformacionFamiliar(){
          return $this->fkInfoPersonalinformacionFamiliar;
      }

      public function setfkInfoPersonalinformacionFamiliar($fkInfoPersonalinformacionFamiliar){
          $this->fkInfoPersonalinformacionFamiliar = $fkInfoPersonalinformacionFamiliar;
      }

  }
?>
