<?php

  Class Tbl_TipoUsuario{

    private $idTipoUsuario;
    private $nombreTipoUsuario;

    public function __construct(){

    }

    public function getidTipoUsuario(){
        return $this->idTipoUsuario;
    }

    public function setidTipoUsuario($idTipoUsuario){
        $this->idTipoUsuario = $idTipoUsuario;
    }

    public function getnombreTipoUsuario(){
      return $this->nombreTipoUsuario;
    }

    public function setnombreTipoUsuario($nombreTipoUsuario){
      $this->nombreTipoUsuario = $nombreTipoUsuario;
    }


  }

 ?>
