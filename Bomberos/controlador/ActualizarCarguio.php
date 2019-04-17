<?php



  require_once("../model/Conexion.php");
  require_once("../model/Data.php");
  require_once("../model/Tbl_Mantencion.php");



    $carguio = new Tbl_cargio_combustible();

    $carguio->setId_cargio_combustible($_REQUEST["idCarguioAModificar"]);
    $carguio->setResponsable_cargio_combustible($_REQUEST["txtresponsablecombustible"]);
    $carguio->setFecha_cargio($_REQUEST["txtFechaCombustible"]);
    $carguio->setDireccion_cargio($_REQUEST["txtDireccionCombustible"]);
    $carguio->setFk_tipo_combustible_cargio_combustible($_REQUEST["cboTipoCombustible"]);
    $carguio->setCantidad_litros_cargio_combustible($_REQUEST["txtcantidad"]);
    $carguio->setPrecio_litro_cargio_combustible($_REQUEST["txtpreciolitro"]);
    $carguio->setObservacion_cargio_combustible($_REQUEST["txtcomentario"]);


    $data = new Data();
    $data->actualizarCarguio($carguio);


  header("location: ../verUnidades.php");


 ?>
