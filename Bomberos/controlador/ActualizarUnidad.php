<?php

  require_once("../model/Conexion.php");
  require_once("../model/Data.php");
  require_once("../model/Tbl_Unidad.php");
  require_once("../model/Tbl_EstadoUnidad.php");
  require_once("../model/Tbl_TipoVehiculo.php");


    $id=$_REQUEST["cboUnidadAModificar"];
    $nombre=$_REQUEST["txtnombreUnidad"];
    $anioFabricacion = $_REQUEST["txtanioFabricacion"];
    $marca = $_REQUEST["txtmarca"];
    $nmotor = $_REQUEST["txtmotor"];
    $nchasis = $_REQUEST["txtchasis"];
    $nvin = $_REQUEST["txtvin"];
    $color = $_REQUEST["txtcolor"];
    $ppu = $_REQUEST["txtppu"];
    $fechaInscripcion = $_REQUEST["txtfechainscripcion"];
    $fechaadquisicion = $_REQUEST["txtfechaadquisicion"];
    $capaOcupantes = $_REQUEST["txtcapaocupantes"];
    $fkEstadoUnidad = $_REQUEST["unidades"];
    $fkTipoVehiculo = $_REQUEST["vehiculos"];
    $fkEntidadPropietaria = $_REQUEST["entidad"];

    //Construir un objeto con esos datos

    $unidad = new Tbl_Unidad();
    //"seteo" los datos
    $unidad->setIdUnidad($id);
    $unidad->setNombreUnidad($nombre);
    $unidad->setaniodeFabricacion($anioFabricacion);
    $unidad->setMarca($marca);
    $unidad->setNmotor($nmotor);
    $unidad->setNchasis($nchasis);
    $unidad->setNVIN($nvin);
    $unidad->setColor($color);
    $unidad->setPPu($ppu);
    $unidad->setfechaInscripcion($fechaInscripcion);
    $unidad->setfechaAdquisicion($fechaadquisicion);
    $unidad->setcapacidadOcupantes($capaOcupantes);
    $unidad->setfkEstadoUnidad($fkEstadoUnidad);
    $unidad->setfkTipoVehiculo($fkTipoVehiculo);
    $unidad->setfkEntidadPropietaria($fkEntidadPropietaria);

    $data = new Data();
    $data->actualizarUnidad($unidad);

    $estadoDeEmergenciaDeLaUnidad;

    if($fkEstadoUnidad==1){
      $estadoDeEmergenciaDeLaUnidad=1;
    }else{
      $estadoDeEmergenciaDeLaUnidad=3;
    }

    $data->actualizarEstadoDeEmergenciaDeMaquina($id,$estadoDeEmergenciaDeLaUnidad);

    echo "<br>";
    echo "<br>";
    echo "<br>";

  header("location: ../buscarUnidades.php");


 ?>
