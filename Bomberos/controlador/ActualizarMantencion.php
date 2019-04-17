<?php



  require_once("../model/Conexion.php");
  require_once("../model/Data.php");
  require_once("../model/Tbl_Mantencion.php");



    $mantencion = new Tbl_Mantencion();

    $mantencion->setIdMantencion($_REQUEST["idDeLaMantencionAModificar"]);
    $mantencion->setFk_tipo_mantencion($_REQUEST["cboTipoMantencion"]);
    $mantencion->setFecha_mantencion($_REQUEST["fechaMantencion"]);
    $mantencion->setResponsable_mantencion($_REQUEST["txtresponsableMantencion"]);
    $mantencion->setDireccion_mantencion($_REQUEST["txtDireccion"]);
    $mantencion->setComentarios_mantencion($_REQUEST["txtcomentario"]);
    $mantencion->setFk_unidad(0);


    $data = new Data();
    $data->actualizarMantencion($mantencion);


  header("location: ../verUnidades.php");


 ?>
