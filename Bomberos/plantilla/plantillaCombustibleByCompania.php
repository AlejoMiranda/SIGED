<?php
require_once ("../model/Data.php");
require ('../lib/pdf/mpdf.php');

$data = new Data();

$idCompania = $_POST['cbocompania2'];


$unidades = $data->getUnidadesCombustibleParaReporteByCompania($idCompania);

$fecha = $data->obtenerFecha();

$html='
    
        <div>
           <link rel ="stylesheet" href="../css/printStyle.css" type="text/css">
    
	           <div>
        		   <img id="imgCabecera" src="../images/bomberos_chile_logo.jpg">
        		   <h2  id="txt1Cabecera" >'.utf8_encode("Cuerpo de Bomberos Machalí").'</h2>
        		   <h4  id="txt2Cabecera" >'.utf8_encode("Sistema de Gestión y Despacho - SIGED").'</h4>
        		   <h4 id="txt3Cabecera" >'.utf8_encode("Reporte Módulo Cargo Combustible - Por Compañia").'</h4>
        		       
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
  <th class="tableHead">' . utf8_encode("Código Unidad") . '</th>
  <th class="tableHead">' . utf8_encode("Compañia") . '</th>
  <th class="tableHead">Tipo Unidad</th>
  <th class="tableHead">' . utf8_encode("Fecha Cargo Combustible") . '</th>
  <th class="tableHead">' . utf8_encode("Litros") . '</th>
  <th class="tableHead">' . utf8_encode("Responsable") . '</th>
  </tr>
  </thead>
  <tbody>';

foreach ($unidades as $u => $unidad) {

    $html .= '<tr>
 
  <td class="td">' . utf8_encode($unidad->getCodigoUnidad()) . '</td>
  <td class="td">' . utf8_encode($unidad->getCompania()) . '</td>
  <td class="td">' . utf8_encode($unidad->getTipoUnidad()) . '</td>
  <td class="td">' . utf8_encode($unidad->getFechaCargo()) . '</td>
  <td class="td">' . utf8_encode($unidad->getLitros()) . '</td>
  <td class="td">' . utf8_encode($unidad->getResponsable()) . '</td>';
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