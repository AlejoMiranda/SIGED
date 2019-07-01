<?php
require_once ("../model/Data.php");
require ('../lib/pdf/mpdf.php');

$data = new Data();

$idCompania = $_POST['cboCompania'];


$fechaDesde = $_POST['txtFechaDesde'];
$fechaHasta = $_POST['txtFechaHasta'];

$fechaDesde = str_replace ( "-" , "/" , $fechaDesde);
$fechaHasta = str_replace ( "-", "/" , $fechaHasta);



$cargos = $data->getCargosParaReporteByCompania($idCompania, $fechaDesde, $fechaHasta);

echo 'QUERY : '.$cargos;

$fecha = $data->obtenerFecha();

$html='
    
        <div>
           <link rel ="stylesheet" href="../css/printStyle.css" type="text/css">
    
	           <div>
        		   <img id="imgCabecera" src="../images/bomberos_chile_logo.jpg">
        		   <h2  id="txt1Cabecera" >'.utf8_encode("Cuerpo de Bomberos Machalí").'</h2>
        		   <h4  id="txt2Cabecera" >'.utf8_encode("Sistema de Gestión y Despacho - SIGED").'</h4>
        		   <h4 id="txt3Cabecera" >'.utf8_encode("Reporte Módulo Cargo A Bombero- Por Compañia").'</h4>
        		       
                   <br>
	           </div>
        		       
                <div>
                    <h4 id="txt4Cabecera" >'.utf8_encode("Fecha de elaboración : ").'</h4>
                </div>
                        
                <div>
                    <h4 id="txt5Cabecera">'. $fecha. '</h4>
                </div>
                        
                <br>
                <br>
         </div>
    <br>
    <br>
 
 
  <table cellspacing="1" cellpadding="4" class="table">
  <thead>
  <tr>
  <th class="tableHead">' . utf8_encode("Material") . '</th>
  <th class="tableHead">' . utf8_encode("Compañia") . '</th>
  <th class="tableHead">Bombero</th>
  <th class="tableHead">' . utf8_encode("Cantidad") . '</th>
  <th class="tableHead">' . utf8_encode("Fecha Entrega") . '</th>
  <th class="tableHead">' . utf8_encode("Descripción") . '</th>
  </tr>
  </thead>
  <tbody>';

foreach ($cargos as $c => $cargo) {

    $html .= '<tr>
 
  <td class="td">' . utf8_encode($cargo->getMaterial()) . '</td>
  <td class="td">' . utf8_encode($cargo->getCompania()) . '</td>
  <td class="td">' . utf8_encode($cargo->getBombero()) . '</td>
  <td class="td">' . utf8_encode($cargo->getCantidad()) . '</td>
  <td class="td">' . utf8_encode($cargo->getFechaEntrega()) . '</td>
  <td class="td">' . utf8_encode($cargo->getDescripcion()) . '</td>';
}

$html .= '</tr>
  </tbody>
  </table>
 
  ';

$mpdf = new mPDF('c', 'A4');

$stylesheet = file_get_contents('../css/printStyle.css');
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

$mpdf->SetTitle('Cargo By Compaï¿½ia');
$mpdf->writeHTML($stylesheet, 1);

$mpdf->writeHTML($html, 2);

$mpdf->Output('Listado de Cargos.pdf', 'I');

?>