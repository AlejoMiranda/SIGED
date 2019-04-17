<?php

  Class Tbl_Medida{

    private $idMedida;
    private $tallaChaquetaCamisa;
    private $tallaPantalon;
    private $tallaBuzo;
    private $tallaCalzado;

    public function __construct(){
    }

    public function getIdMedida(){
        return $this->idMedida;
    }

    public function setIdMedida($idMedida){
        $this->idMedida = $idMedida;
    }

    public function getTallaChaquetaCamisa(){
        return $this->tallaChaquetaCamisa;
    }

    public function setTallaChaquetaCamisa($tallaChaquetaCamisa){
        $this->tallaChaquetaCamisa = $tallaChaquetaCamisa;
    }

    public function getTallaPantalon(){
        return $this->tallaPantalon;
    }

    public function setTallaPantalon($tallaPantalon){
        $this->tallaPantalon = $tallaPantalon;
    }

    public function getTallaBuzo(){
        return $this->tallaBuzo;
    }

    public function setTallaBuzo($tallaBuzo){
        $this->tallaBuzo = $tallaBuzo;
    }

    public function getTallaCalzado(){
        return $this->tallaCalzado;
    }

    public function setTallaCalzado($tallaCalzado){
        $this->tallaCalzado = $tallaCalzado;
    }


  }

 ?>
