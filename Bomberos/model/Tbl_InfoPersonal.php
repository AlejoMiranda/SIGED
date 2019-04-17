<?php

Class Tbl_InfoPersonal{

        private  $idInformacionPersonal;
        private  $rutInformacionPersonal;
        private  $nombreInformacionPersonal;
        private  $apellidoPaterno;
        private  $apellidoMaterno;
        private  $fechaNacimiento;
        private  $fkEstadoCivil;
        private  $fkMedidaInformacionPersonal;
        private  $AlturaEnMetros;
        private  $Peso;
        private  $Email;
        private  $fkGenero;
        private  $TelefonoFijo;
        private  $TelefonoMovil;
        private  $DireccionPersonal;
        private  $PertenecioABrigadaJuvenil;
        private  $EsInstructor;

        public function __construct(){
        }

        public function getIdInfoPersonal(){
            return $this->idInformacionPersonal;
        }

        public function setIdInfoPersonal($idInformacionPersonal){
            $this->idInformacionPersonal = $idInformacionPersonal;
        }

        public function getRutInformacionPersonal(){
            return $this->rutInformacionPersonal;
        }

        public function setRutInformacionPersonal($rutInformacionPersonal){
            $this->rutInformacionPersonal = $rutInformacionPersonal;
        }

        public function getNombreInformacionPersonal(){
            return $this->nombreInformacionPersonal;
        }

        public function setNombreInformacionPersonal($nombreInformacionPersonal){
            $this->nombreInformacionPersonal = $nombreInformacionPersonal;
        }

        public function getApellidoPaterno(){
            return $this->apellidoPaterno;
        }

        public function setApellidoPaterno($apellidoPaterno){
            $this->apellidoPaterno = $apellidoPaterno;
        }

        public function getApellidoMaterno(){
            return $this->apellidoMaterno;
        }

        public function setApellidoMaterno($apellidoMaterno){
            $this->apellidoMaterno = $apellidoMaterno;
        }

        public function getFechaNacimiento(){
            return $this->fechaNacimiento;
        }

        public function setFechaNacimiento($fechaNacimiento){
            $this->fechaNacimiento = $fechaNacimiento;
        }

        public function getFkEstadoCivil(){
            return $this->fkEstadoCivil;
        }

        public function setFkEstadoCivil($fkEstadoCivil){
            $this->fkEstadoCivil = $fkEstadoCivil;
        }

        public function getFkMedidaInformacionPersonal(){
            return $this->fkMedidaInformacionPersonal;
        }

        public function setFkMedidaInformacionPersonal($fkMedidaInformacionPersonal){
            $this->fkMedidaInformacionPersonal = $fkMedidaInformacionPersonal;
        }

        public function getAlturaEnMetros(){
            return $this->AlturaEnMetros;
        }

        public function setAlturaEnMetros($AlturaEnMetros){
            $this->AlturaEnMetros = $AlturaEnMetros;
        }

        public function getPeso(){
            return $this->Peso;
        }

        public function setPeso($Peso){
            $this->Peso = $Peso;
        }

        public function getEmail(){
            return $this->Email;
        }

        public function setEmail($Email){
            $this->Email = $Email;
        }

        public function getFkGenero(){
            return $this->fkGenero;
        }

        public function setFkGenero($fkGenero){
            $this->fkGenero = $fkGenero;
        }

        public function getTelefonoFijo(){
            return $this->TelefonoFijo;
        }

        public function setTelefonoFijo($TelefonoFijo){
            $this->TelefonoFijo = $TelefonoFijo;
        }

        public function getTelefonoMovil(){
            return $this->TelefonoMovil;
        }

        public function setTelefonoMovil($TelefonoMovil){
            $this->TelefonoMovil = $TelefonoMovil;
        }

        public function getDireccionPersonal(){
            return $this->DireccionPersonal;
        }

        public function setDireccionPersonal($DireccionPersonal){
            $this->DireccionPersonal = $DireccionPersonal;
        }

        public function getPertenecioABrigadaJuvenil(){
            return $this->PertenecioABrigadaJuvenil;
        }

        public function setPertenecioABrigadaJuvenil($PertenecioABrigadaJuvenil){
            $this->PertenecioABrigadaJuvenil = $PertenecioABrigadaJuvenil;
        }

        public function getEsInstructor(){
            return $this->EsInstructor;
        }

        public function setEsInstructor($EsInstructor){
            $this->EsInstructor = $EsInstructor;
        }





}


 ?>
