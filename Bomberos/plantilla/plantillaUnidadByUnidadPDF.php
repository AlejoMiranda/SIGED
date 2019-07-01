<?php
require_once ("../model/Data.php");
require ('../lib/pdf/mpdf.php');

$data = new Data();

$idUnidad = $_POST['cboUnidades'];

$fechaDesde = $_POST['txtFechaDesde'];
$fechaHasta = $_POST['txtFechaHasta'];

$fechaDesde = str_replace ( "-" , "/" , $fechaDesde);
$fechaHasta = str_replace ( "-", "/" , $fechaHasta);


$unidades = $data->getUnidadesParaReporteByUnidad($idUnidad, $fechaDesde, $fechaHasta);

$fecha = $data->obtenerFecha();

$html='
    
        <div>
           <link rel ="stylesheet" href="../css/printStyle.css" type="text/css">
    
	           <div>
        		   <img id="imgCabecera" src="../images/bomberos_chile_logo.jpg">
        		   <h2  id="txt1Cabecera" >'.utf8_encode("Cuerpo de Bomberos Machal�").'</h2>
        		   <h4  id="txt2Cabecera" >'.utf8_encode("Sistema de Gesti�n y Despacho - SIGED").'</h4>
        		   <h4  id="txt3Cabecera" >'.utf8_encode("Reporte M�dulo Unidad - Por Unidad").'</h4>
        		       
                   <br>
	           </div>
        		       
                <div>
                    <h4 id="txt4Cabecera" >'.utf8_encode("Fecha de elaboraci�n : ").'</h4>
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
  <th class="tableHead">' . utf8_encode("C�digo Unidad") . '</th>
  <th class="tableHead">' . utf8_encode("Compa�ia") . '</th>
  <th class="tableHead">Tipo Unidad</th>
  <th class="tableHead">' . utf8_encode("Tipo Mantenci�n") . '</th>
  <th class="tableHead">' . utf8_encode("Fecha Mantenci�n") . '</th>
  <th class="tableHead">' . utf8_encode("Detalle Mantenci�n") . '</th>
  </tr>
  </thead>
  <tbody>';

foreach ($unidades as $u => $unidad) {

    $html .= '<tr>
 
  <td class="td">' . utf8_encode($unidad->getCodigoUnidad()) . '</td>
  <td class="td">' . utf8_encode($unidad->getCompania()) . '</td>
  <td class="td">' . utf8_encode($unidad->getTipoUnidad()) . '</td>
  <td class="td">' . utf8_encode($unidad->getTipoMantencion()) . '</td>
  <td class="td">' . utf8_encode($unidad->getFechaMantencion()) . '</td>
  <td class="td">' . utf8_encode($unidad->getDetalleMantencion()) . '</td>';
}

$html .= '</tr>
  </tbody>
  </table>
 
  ';

$mpdf = new mPDF('c', 'A4');

$stylesheet = file_get_contents('../css/printStyle.css');
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

$mpdf->SetTitle('Unidad by filtro');
$mpdf->writeHTML($stylesheet, 1);

$mpdf->writeHTML($html, 2);

$mpdf->Output('Listado de Unidades.pdf', 'I');

?>