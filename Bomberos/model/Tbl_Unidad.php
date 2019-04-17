<?php

Class Tbl_Unidad{

        private  $idUnidad;
        private  $nombreUnidad;
        private  $aniodeFabricacion;
        private  $Marca;
        private  $Nmotor;
        private  $Nchasis;
        private  $NVIN;
        private  $Color;
        private  $PPu;
        private  $fechaInscripcion;
        private  $fechaAdquisicion;
        private  $capacidadOcupantes;
        private  $fkEstadoUnidad;
        private  $fkTipoVehiculo;
        private  $fkEntidadPropietaria;

        public function __construct(){
        }

        public function getIdUnidad(){
            return $this->idUnidad;
        }

        public function setIdUnidad($idUnidad){
            $this->idUnidad = $idUnidad;
        }

        public function getNombreUnidad(){
            return $this->nombreUnidad;
        }

        public function setNombreUnidad($nombreUnidad){
            $this->nombreUnidad = $nombreUnidad;
        }

        public function getaniodeFabricacion(){
            return $this->aniodeFabricacion;
        }

        public function setaniodeFabricacion($aniodeFabricacion){
            $this->aniodeFabricacion = $aniodeFabricacion;
        }

        public function getMarca(){
            return $this->Marca;
        }

        public function setMarca($Marca){
            $this->Marca = $Marca;
        }

        public function getNmotor(){
            return $this->Nmotor;
        }

        public function setNmotor($Nmotor){
            $this->Nmotor = $Nmotor;
        }

        public function getNchasis(){
            return $this->Nchasis;
        }

        public function setNchasis($Nchasis){
            $this->Nchasis = $Nchasis;
        }

        public function getNVIN(){
            return $this->NVIN;
        }

        public function setNVIN($NVIN){
            $this->NVIN = $NVIN;
        }

        public function getColor(){
            return $this->Color;
        }

        public function setColor($Color){
            $this->Color = $Color;
        }

        public function getPPu(){
            return $this->PPu;
        }

        public function setPPu($PPu){
            $this->PPu = $PPu;
        }

        public function getfechaInscripcion(){
            return $this->fechaInscripcion;
        }

        public function setfechaInscripcion($fechaInscripcion){
            $this->fechaInscripcion = $fechaInscripcion;
        }

        public function getfechaAdquisicion(){
            return $this->fechaAdquisicion;
        }

        public function setfechaAdquisicion($fechaAdquisicion){
            $this->fechaAdquisicion = $fechaAdquisicion;
        }

        public function getcapacidadOcupantes(){
            return $this->capacidadOcupantes;
        }

        public function setcapacidadOcupantes($capacidadOcupantes){
            $this->capacidadOcupantes = $capacidadOcupantes;
        }

        public function getfkEstadoUnidad(){
            return $this->fkEstadoUnidad;
        }

        public function setfkEstadoUnidad($fkEstadoUnidad){
            $this->fkEstadoUnidad = $fkEstadoUnidad;
        }

        public function getfkTipoVehiculo(){
            return $this->fkTipoVehiculo;
        }

        public function setfkTipoVehiculo($fkTipoVehiculo){
            $this->fkTipoVehiculo = $fkTipoVehiculo;
        }

        public function getfkEntidadPropietaria(){
            return $this->fkEntidadPropietaria;
        }

        public function setfkEntidadPropietaria($fkEntidadPropietaria){
            $this->fkEntidadPropietaria = $fkEntidadPropietaria;
        }

}


 ?>
