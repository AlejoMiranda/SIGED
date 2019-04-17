<?php
require_once("../model/Data.php");
$data = new Data();

$listadoDeEmergencias=$data->getServiciosDeEmergenciasActivas();

foreach ($listadoDeEmergencias as $emer) {?>

  <option selected value="<?php echo $emer->getId_servicio();?>"><?php

  $momento;
  $pieces=explode(" ",$emer->getFecha_servicio());
  $momento = date("d-m-Y", strtotime($pieces[0]));
  $momento=$momento." ".$pieces[1];
  echo $momento;

  echo " "; echo $emer->getFk_tipoDeServicio(); echo " "; $unidadesDelServicio=$data->getUnidadesInvolucradasEnServicio($emer->getId_servicio());
  foreach ($unidadesDelServicio as $u => $unidad) {
    echo $unidad." ";
  }
  ?> </option>

<?php }
?>
