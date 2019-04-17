<?php

  Class Tbl_TipoUsuarioPermiso{

    private $idTipoUsuarioPermiso;
    private $fkTipoUsuario;
    private $fkPermiso;
    private $otorgadoTipoUsuarioPermiso;

    public function __construct(){

    }

    public function getidTipoUsuarioPermiso(){
        return $this->idTipoUsuarioPermiso;
    }

    public function setidTipoUsuarioPermiso($idTipoUsuarioPermiso){
        $this->idTipoUsuarioPermiso = $idTipoUsuarioPermiso;
    }

    public function getfkTipoUsuario(){
      return $this->fkTipoUsuario
    }

    public function setfkTipoUsuario($fkTipoUsuario){
      $this->fkTipoUsuario = $fkTipoUsuario
    }

    public function getfkPermiso(){
        return $this->fkPermiso;
    }

    public function setfkPermiso($fkPermiso){
        $this->fkPermiso = $fkPermiso;
    }

    public function getotorgadoTipoUsuarioPermiso(){
      return $this->otorgadoTipoUsuarioPermiso
    }

    public function setotorgadoTipoUsuarioPermiso($otorgadoTipoUsuarioPermiso){
      $this->otorgadoTipoUsuarioPermiso = $otorgadoTipoUsuarioPermiso
    }


  }

 ?>
