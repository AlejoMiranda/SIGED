<?php
require_once ("../model/Data.php");
require ('../lib/pdf/mpdf.php');

$data = new Data();

$cadenaUno = "";
$cadenaDos = "";
$cadenaTres = "";

$ordenConsultaUno = 1; // usamos esta varibale para saber si agregar el where o no A LA COMPAΡIA;
$ordenConsultaDos = 1; // usamos esta varibale para saber si agregar el where o no A LA COMPAΡIA Y ESTADO;
$ordenConsultaTres = 1; // usamos esta varibale para saber si agregar el where o no A LA COMPAΡIA, ESTADO Y BODEGA;

// tenemos que reconocer cual es el primer valor que se agregara a la consulta


//compaρias
//-------------------------------------------

if ($_POST['chkComUno']) {
    if($ordenConsultaUno == 1){
        $cadenaUno = $cadenaUno .= " compania LIKE 'Cuerpo de Bomberos de Machali'";
        $ordenConsultaUno = 2;
    }else{
        $cadenaUno = $cadenaUno .= " OR compania LIKE 'Cuerpo de Bomberos de Machali'";
    }
}

if ($_POST['chkComDos']) {
    if($ordenConsultaUno == 1){
        $cadenaUno = $cadenaUno .= " compania LIKE '1° Compaρνa'";
        $ordenConsultaUno = 2;
    }else{
        $cadenaUno = $cadenaUno .= " OR compania LIKE '1° Compaρνa'";
    }
}

if ($_POST['chkComTres']) {
    if($ordenConsultaUno == 1){
        $cadenaUno = $cadenaUno .= " compania LIKE '2° Compaρνa'";
        $ordenConsultaUno = 2;
    }else{
        $cadenaUno = $cadenaUno .= " OR compania LIKE '2° Compaρνa'";
    }
}

if ($_POST['chkComCuatro']) {
    if($ordenConsultaUno == 1){
        $cadenaUno = $cadenaUno .= " compania LIKE '3° Compaρνa'";
        $ordenConsultaUno = 2;
    }else{
        $cadenaUno = $cadenaUno .= " OR compania LIKE '3° Compaρνa'";
    }
}
// compaρias
//-----------------------------------------


// estado
//----------------------------------------

if ($_POST['chkEsUno']) {
    if($ordenConsultaDos == 1){
        $cadenaDos = $cadenaDos .= " estado LIKE 'Operativo'";
        $ordenConsultaDos = 2;
    }else{
        $cadenaDos = $cadenaDos .= " OR estado LIKE 'Operativo'";
    }
}

if ($_POST['chkEsDos']) {
    if($ordenConsultaDos == 1){
        $cadenaDos = $cadenaDos .= " estado LIKE 'Almacenado'";
        $ordenConsultaDos = 2;
    }else{
        $cadenaDos = $cadenaDos .= " OR estado LIKE 'Almacenado'";
    }
}

if ($_POST['chkEsTres']) {
    if($ordenConsultaDos == 1){
        $cadenaDos = $cadenaDos .= " estado LIKE 'En Mantenciσn'";
        $ordenConsultaDos = 2;
    }else{
        $cadenaDos = $cadenaDos .= " OR estado LIKE 'En Mantenciσn'";
    }
}

if ($_POST['chkEsCuatro']) {
    if($ordenConsultaDos == 1){
        $cadenaDos = $cadenaDos .= " estado LIKE 'Caducado'";
        $ordenConsultaDos = 2;
    }else{
        $cadenaDos = $cadenaDos .= " OR estado LIKE 'Caducado'";
    }
}

if ($_POST['chkEsCinco']) {
    if($ordenConsultaDos == 1){
        $cadenaDos = $cadenaDos .= " estado LIKE 'Fuera de servicio'";
        $ordenConsultaDos = 2;
    }else{
        $cadenaDos = $cadenaDos .= " OR estado LIKE 'Fuera de servicio'";
    }
}

if ($_POST['chkEsSeis']) {
    if($ordenConsultaDos == 1){
        $cadenaDos = $cadenaDos .= " estado LIKE 'Dado de baja'";
        $ordenConsultaDos = 2;
    }else{
        $cadenaDos = $cadenaDos .= " OR estado LIKE 'Dado de baja'";
    }
}

// estado
//-----------------------------------------


// Bodega
//-----------------------------------------

if ($_POST['chkBoUno']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Unidad B-0'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Unidad B-0'";
    }
}

if ($_POST['chkBoDos']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Bodega Cuerpo'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Bodega Cuerpo'";
    }
}

if ($_POST['chkBoTres']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Cuartel cuerpo'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Cuartel cuerpo'";
    }
}

if ($_POST['chkBoCuatro']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Unidad B-1'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Unidad B-1'";
    }
}

if ($_POST['chkBoCinco']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Bodega Primera'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Bodega Primera'";
    }
}

if ($_POST['chkBoSeis']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Cuartel Primera'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Cuartel Primera'";
    }
}

if ($_POST['chkBoSiete']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Unidad B-2'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Unidad B-2'";
    }
}

if ($_POST['chkBoOcho']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Bodega Segunda'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Bodega Segunda'";
    }
}

if ($_POST['chkBoNueve']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Cuartel Segunda'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Cuartel Segunda'";
    }
}

if ($_POST['chkBoDiez']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Unidad B-3'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Unidad B-3'";
    }
}

if ($_POST['chkBoOnce']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Bodega Tercera'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Bodega Tercera'";
    }
}

if ($_POST['chkBoDoce']) {
    if($ordenConsultaTres == 1){
        $cadenaTres = $cadenaTres .= " bodega LIKE 'Cuartel Tercera'";
        $ordenConsultaTres = 2;
    }else{
        $cadenaTres = $cadenaTres .= " OR bodega LIKE 'Cuartel Tercera'";
    }
}

// Bodega
//-----------------------------------------


if($cadenaUno == ""){
    $cadenaUno = "nada";
}

if($cadenaDos == ""){
    $cadenaDos = "nada";
}

if($cadenaTres == ""){
    $cadenaTres = "nada";
}


// DATOS INVENTARIO
$data->llenarDatosInventario($cadenaUno,$cadenaDos,$cadenaTres);
// DATOS INVENTARIO

header("location: ../plantilla/plantillaInventarioByFiltro.php");
?>