<?php
require_once ("../model/Data.php");
require ('../lib/pdf/mpdf.php');

$data = new Data();

$bomberos = $data->mostrarBomberos();


$fecha = $data->obtenerFecha();

$html='
    
        <div>
           <link rel ="stylesheet" href="../css/printStyle.css" type="text/css">
    
	           <div>
        		   <img id="imgCabecera" src="../images/bomberos_chile_logo.jpg">
        		   <h2  id="txt1Cabecera" >'.utf8_encode("Cuerpo de Bomberos Machalí").'</h2>
        		   <h4  id="txt2Cabecera" >'.utf8_encode("Sistema de Gestión y Despacho - SIGED").'</h4>
        		   <h4  id="txt3Cabecera" >'.utf8_encode("Reporte Módulo Bombero - Listado Bomberos").'</h4>
        		       
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
  <th class="tableHead">' . utf8_encode("N° Registro") . '</th>
  <th class="tableHead">' . utf8_encode("Compañia") . '</th>
  <th class="tableHead">RUT</th>
  <th class="tableHead">Nombre</th>
  <th class="tableHead">Apellido</th>
  <th class="tableHead">Fecha Ingreso</th>
  <th class="tableHead">Fecha Nacimiento</th>
  <th class="tableHead">Tipo Voluntario</th>
  <th class="tableHead">' . utf8_encode("Teléfono") . '</th>
  <th class="tableHead">E-Mail</th>
  </tr>
  </thead>
  <tbody>';

foreach ($bomberos as $b => $bombero) {

    $html .= '<tr>
 
  <td class="td">' . utf8_encode($bombero->getRegistro()) . '</td>
  <td class="td">' . utf8_encode($bombero->getCompania()) . '</td>
  <td class="td">' . utf8_encode($bombero->getRut()) . '</td>
  <td class="td">' . utf8_encode($bombero->getNombre()) . '</td>
  <td class="td">' . utf8_encode($bombero->getApellido()) . '</td>
  <td class="td">' . utf8_encode($bombero->getFechaIngreso()) . '</td>
  <td class="td">' . utf8_encode($bombero->getFechaNacimiento()) . '</td>
  <td class="td">' . utf8_encode($bombero->getTipoVoluntario()) . '</td>
  <td class="td">' . utf8_encode($bombero->getTelefono()) . '</td>
  <td class="td">' . utf8_encode($bombero->getEmail()) . '</td>';
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

$mpdf->Output('Listado General de Bomberos.pdf', 'I');

?>