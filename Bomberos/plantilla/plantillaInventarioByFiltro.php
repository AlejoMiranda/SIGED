<?php
require_once ("../model/Data.php");
require ('../lib/pdf/mpdf.php');

$data = new Data();

$compania = $_POST['cbo_Compania'];
$estado =$_POST['cbo_Estado'];
$bodega = $_POST['cbo_unidadFisica'];


$inventarios = "";
$inventarios = $data->llenarDatosInventario($compania,$estado,$bodega);

$fecha = $data->obtenerFecha();

echo $inventarios;


$html='
    
        <div>
           <link rel ="stylesheet" href="../css/printStyle.css" type="text/css">
    
	           <div>
        		   <img id="imgCabecera" src="../images/bomberos_chile_logo.jpg">
        		   <h2  id="txt1Cabecera" >'.utf8_encode("Cuerpo de Bomberos Machalí").'</h2>
        		   <h4  id="txt2Cabecera" >'.utf8_encode("Sistema de Gestión y Despacho - SIGED").'</h4>
        		  <h4 id="txt3Cabecera" >'.utf8_encode("Reporte Módulo Inventario - Inventario de Materiales").'</h4>
        		       
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
  <th class="tableHead">Bodega</th>
  <th class="tableHead">Cantidad</th>
  <th class="tableHead">Marca</th>
  <th class="tableHead">' . utf8_encode("Descripción") . '</th>
  <th class="tableHead">Estado</th>
  </tr>
  </thead>
  <tbody>';

foreach ($inventarios as $i => $inventario) {

    $html .= '<tr>
 
  <td class="td">' . utf8_encode($inventario->getMaterial()) . '</td>
  <td class="td">' . utf8_encode($inventario->getCompania()) . '</td>
  <td class="td">' . utf8_encode($inventario->getBodega()) . '</td>
  <td class="td">' . utf8_encode($inventario->getCantidad()) . '</td>
  <td class="td">' . utf8_encode($inventario->getMarca()) . '</td>
  <td class="td">' . utf8_encode($inventario->getDescripcion()) . '</td>
  <td class="td">' . utf8_encode($inventario->getEstado()) . '</td>';
}

$html .= '</tr>
  </tbody>
  </table>
 
  ';

$mpdf = new mPDF('c', 'A4');

$stylesheet = file_get_contents('../css/printStyle.css');
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

$mpdf->SetTitle('Listado General de Bomberos');
$mpdf->writeHTML($stylesheet, 1);

$mpdf->writeHTML($html, 2);

$mpdf->Output('Inventario.pdf', 'I');

?>