<?php
require_once("model/Data.php");

$data = new Data();

$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";

$arrayDeEmergencias = $data->getServicioUnidadPorFkServicio($id);

$contenedorDeJSONs= array();

foreach ($arrayDeEmergencias as $ae => $emer) {

  $idSer=$emer->getId_servicio_unidad();
  $nombreUnidad=$data->getNombreDeUnidadPorId($emer->getFk_unidad());
  $momento6_0=$emer->getMomento6_0();
  $momento6_3=$emer->getMomento6_3();
  $momento6_7=$emer->getMomento6_7();
  $momento6_8=$emer->getMomento6_8();
  $momento6_9=$emer->getMomento6_9();
  $momento6_10=$emer->getMomento6_10();

  if($momento6_0==null){
    $momento6_0="";
  }else {
    $fragmentos=explode(" ",$momento6_0);
      $momento6_0 = date("d-m-Y", strtotime($fragmentos[0]));
      $momento6_0=$momento6_0." ".$fragmentos[1];
  }


  if($momento6_3==null){
    $momento6_3="";
  }else {
    $fragmentos=explode(" ",$momento6_3);
      $momento6_3 = date("d-m-Y", strtotime($fragmentos[0]));
      $momento6_3=$momento6_3." ".$fragmentos[1];
  }

  if($momento6_7==null){
    $momento6_7="";
  }else {
    $fragmentos=explode(" ",$momento6_7);
      $momento6_7 = date("d-m-Y", strtotime($fragmentos[0]));
      $momento6_7=$momento6_7." ".$fragmentos[1];
  }

  if($momento6_8==null){
    $momento6_8="";
  }else {
    $fragmentos=explode(" ",$momento6_8);
      $momento6_8 = date("d-m-Y", strtotime($fragmentos[0]));
      $momento6_8=$momento6_8." ".$fragmentos[1];
  }

  if($momento6_9==null){
    $momento6_9="";
  }else {
    $fragmentos=explode(" ",$momento6_9);
      $momento6_9 = date("d-m-Y", strtotime($fragmentos[0]));
      $momento6_9=$momento6_9." ".$fragmentos[1];
  }

  if($momento6_10==null){
    $momento6_10="";
  }else {
    $fragmentos=explode(" ",$momento6_10);
      $momento6_10 = date("d-m-Y", strtotime($fragmentos[0]));
      $momento6_10=$momento6_10." ".$fragmentos[1];
  }


  $arrayRepresentativoDelObjeto=array("id"=>$idSer ,"nombre"=> utf8_encode($nombreUnidad),
                                    "momento6_0"=> $momento6_0,
                                     "momento6_3"=> $momento6_3,
                                     "momento6_7"=> $momento6_7, "momento6_8"=> $momento6_8,
                                     "momento6_9"=> $momento6_9, "momento6_10"=> $momento6_10);


  $obj=json_encode($arrayRepresentativoDelObjeto);

  $contenedorDeJSONs[]=$obj;
}

/*
foreach ($contenedorDeJSONs as $c => $conte) {
  echo $conte;
}
*/
echo json_encode($contenedorDeJSONs);

?>
