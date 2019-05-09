<?php
require_once ("../model/Data.php");
require ('../lib/pdf/mpdf.php');

$data = new Data();

$cadena = "";
$ordenConsultaUno = 1; // usamos esta varibale para saber si agregar el where o no A LA COMPAÑIA;
$ordenConsultaDos = 1; // usamos esta varibale para saber si agregar el where o no A LA COMPAÑIA Y ESTADO;
$ordenConsultaTres = 1; // usamos esta varibale para saber si agregar el where o no A LA COMPAÑIA, ESTADO Y BODEGA;

// tenemos que reconocer cual es el primer valor que se agregara a la consulta


//compañias
//-------------------------------------------

if ($_POST['chkComUno']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE compania LIKE 'Cuerpo de Bomberos de Machali'";
        $ordenConsultaUno = 2;
    }else{
        $cadena = $cadena .= " OR compania LIKE 'Cuerpo de Bomberos de Machali'";
    }
}

if ($_POST['chkComDos']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE compania LIKE '1° Compañía'";
        $ordenConsultaUno = 2;
    }else{
        $candena = $cadena .= " OR compania LIKE '1° Compañía'";
    }
}

if ($_POST['chkComTres']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= "WHERE compania LIKE '2° Compañía'";
        $ordenConsultaUno = 2;
    }else{
        $candena = $cadena .= " OR compania LIKE '2° Compañía'";
    }
}

if ($_POST['chkComCuatro']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE compania LIKE '3° Compañía'";
        $ordenConsultaUno = 2;
    }else{
        $candena = $cadena .= " OR compania LIKE '3° Compañía'";
    }
}
// compañias
//-----------------------------------------


// estado
//----------------------------------------

if ($_POST['chkEsUno']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE estado LIKE 'Operativo'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND estado LIKE 'Operativo'";
        $ordenConsultaDos = 2;
    }else{
        $candena = $cadena .= " OR estado LIKE 'Operativo'";
    }
}

if ($_POST['chkEsDos']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= "WHERE estado LIKE 'Almacenado'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND estado LIKE 'Almacenado'";
        $ordenConsultaDos = 2;
    }else{
        $candena = $cadena .= " OR estado LIKE 'Almacenado'";
    }
}

if ($_POST['chkEsTres']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE estado LIKE 'En Mantención'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND estado LIKE 'En Mantención'";
        $ordenConsultaDos = 2;
    }else{
        $candena = $cadena .= " OR estado LIKE 'En Mantención'";
    }
}

if ($_POST['chkEsCuatro']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE estado LIKE 'Caducado'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND estado LIKE 'Caducado'";
        $ordenConsultaDos = 2;
    }else{
        $candena = $cadena .= " OR estado LIKE 'Caducado'";
    }
}

if ($_POST['chkEsCinco']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE estado LIKE 'Fuera de servicio'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND estado LIKE 'Fuera de servicio'";
        $ordenConsultaDos = 2;
    }else{
        $candena = $cadena .= " OR estado LIKE 'Fuera de servicio'";
    }
}

if ($_POST['chkEsSeis']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE estado LIKE 'Dado de baja'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND estado LIKE 'Dado de baja'";
        $ordenConsultaDos = 2;
    }else{
        $candena = $cadena .= " OR estado LIKE 'Dado de baja'";
    }
}

// estado
//-----------------------------------------


// Bodega
//-----------------------------------------

if ($_POST['chkBoUno']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Unidad B-0'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Unidad B-0'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Unidad B-0'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Unidad B-0'";
    }
}

if ($_POST['chkBoDos']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Bodega Cuerpo'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Bodega Cuerpo'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Bodega Cuerpo'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Bodega Cuerpo'";
    }
}

if ($_POST['chkBoTres']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Cuartel cuerpo'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Cuartel cuerpo'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Cuartel cuerpo'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Cuartel cuerpo'";
    }
}

if ($_POST['chkBoCuatro']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Unidad B-1'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Unidad B-1'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Unidad B-1'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Unidad B-1'";
    }
}

if ($_POST['chkBoCinco']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Bodega Primera'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Bodega Primera'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Bodega Primera'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Bodega Primera'";
    }
}

if ($_POST['chkBoSeis']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Cuartel Primera'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Cuartel Primera'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Cuartel Primera'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Cuartel Primera'";
    }
}

if ($_POST['chkBoSiete']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Unidad B-2'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Unidad B-2'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Unidad B-2'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Unidad B-2'";
    }
}

if ($_POST['chkBoOcho']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Bodega Segunda'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Bodega Segunda'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Bodega Segunda'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Bodega Segunda'";
    }
}

if ($_POST['chkBoNueve']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Cuartel Segunda'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Cuartel Segunda'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Cuartel Segunda'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Cuartel Segunda'";
    }
}

if ($_POST['chkBoDiez']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Unidad B-3'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Unidad B-3'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Unidad B-3'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Unidad B-3'";
    }
}

if ($_POST['chkBoOnce']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Bodega Tercera'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Bodega Tercera'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Bodega Tercera'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Bodega Tercera'";
    }
}

if ($_POST['chkBoDoce']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE bodega LIKE 'Cuartel Tercera'";
        $ordenConsultaUno = 2;
    }else if($ordenConsultaDos == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Cuartel Tercera'";
        $ordenConsultaDos = 2;
    }else if($ordenConsultaTres == 1){
        $cadena = $cadena .= " AND bodega LIKE 'Cuartel Tercera'";
        $ordenConsultaTres = 2;
    }else{
        $candena = $cadena .= " OR bodega LIKE 'Cuartel Tercera'";
    }
}

// Bodega
//-----------------------------------------

// DATOS INVENTARIO
$data->llenarTablaParaInventario();
// DATOS INVENTARIO


$inventarios = $data->getInventarioByFiltro($cadena);


$fecha = $data->obtenerFecha();

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