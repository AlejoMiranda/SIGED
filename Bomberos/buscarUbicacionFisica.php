<?php
require_once("model/Data.php");

$data = new Data();

$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";



$ubicacionesFisicas = $data->getUbicacionFisica($id);
foreach ($ubicacionesFisicas as $ubi) {
    echo "<option value='".$ubi->getIdUbicacionFisica()."'>";
        echo utf8_encode($ubi->getNombreUbicacionFisica());
    echo"</option>";
}


?>
