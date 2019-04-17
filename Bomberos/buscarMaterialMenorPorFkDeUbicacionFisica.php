<?php
require_once("model/Data.php");

$data = new Data();

$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";

$materialesDisponibles = $data->getMaterialesMenoresPorFkUbicacionFisica($id);
foreach ($materialesDisponibles as $mat) {
  echo "<option value='".$mat->getId_material_menor()."'>";
  echo utf8_encode($mat->getNombre_material_menor());
  echo"</option>";
}

?>
