<?php
  require_once("../model/Data.php");
  $data = new Data();

  $idServicio= isset($_REQUEST['idServicioACerrar'])?$_REQUEST['idServicioACerrar']:"";


  $listado=$data->getMomentos6_10DeUnServicio($idServicio);

  $todosLos6_10Dados="si";

  foreach ($listado as $li => $objeto) {
    if($objeto==null){
      $todosLos6_10Dados="no";
    }
  }

  echo $todosLos6_10Dados;

 ?>
