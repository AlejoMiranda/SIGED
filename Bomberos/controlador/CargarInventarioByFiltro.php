<?php
require_once("../model/Data.php");

$cadena = "";
$ordenConsultaUno = 1; // usamos esta varibale para saber si agregar el where o no A LA COMPAÑIA;
$ordenConsultaDos = 1; // usamos esta varibale para saber si agregar el where o no A LA COMPAÑIA Y ESTADO;
$ordenConsultaTres = 1; // usamos esta varibale para saber si agregar el where o no A LA COMPAÑIA, ESTADO Y BODEGA;

// tenemos que reconocer cual es el primer valor que se agregara a la consulta


//compañias
//-------------------------------------------

if ($_POST['chkComUno']) {
    if($ordenConsultaUno == 1){        
        $cadena = $cadena .= " WHERE compañia LIKE 'Cuerpo de Bomberos de Machali'";
        $ordenConsultaUno = 2;
    }else{
        $cadena = $cadena .= " OR compañia LIKE 'Cuerpo de Bomberos de Machali'";
    }
}

if ($_POST['chkComDos']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE compañia LIKE '1° Compañía'";
        $ordenConsultaUno = 2;
    }else{
        $candena = $cadena .= " OR compañia LIKE '1° Compañía'";
    }
}

if ($_POST['chkComTres']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= "WHERE compañia LIKE '2° Compañía'";
        $ordenConsultaUno = 2;
    }else{
        $candena = $cadena .= " OR compañia LIKE '2° Compañía'";
    }
}

if ($_POST['chkComCuatro']) {
    if($ordenConsultaUno == 1){
        $cadena = $cadena .= " WHERE compañia LIKE '3° Compañía'";
        $ordenConsultaUno = 2;
    }else{
        $candena = $cadena .= " OR compañia LIKE '3° Compañía'";
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

$d= new Data();

$consulta = $d->getInventarioByFiltro($cadena);

echo $consulta;







































/*
$idABuscar=$_POST["idBomberoReporte"];

$d= new Data();

$infoPersonal = $d->getInfoPersonal($idABuscar);
$infoMedidas = $d->getInfoMedidas($idABuscar);
$infoBomberil = $d->getInfoBomberil($idABuscar);
$infoLaboral = $d->getInfoLaboral($idABuscar);
$infoMedica1 = $d->getInfoMedica1($idABuscar);
$infoMedica2 = $d->getInfoMedica2($idABuscar);
$infoFamiliar = $d->readInfoFamiliar($idABuscar);
$infoAcademica = $d->readInfoAcademica($idABuscar);
$infoEntrenamientoEstandar = $d->readInfoEntrenamientoEstandar($idABuscar);
$infoHistorica = $d->readInfoHistorica($idABuscar);
$infoCargos = $d->getInfoCargos($idABuscar);

$_SESSION["infoPersonalSolicitada"] = $infoPersonal;
$_SESSION["infoMedidasSolicitada"] = $infoMedidas;
$_SESSION["infoBomberilSolicitada"] = $infoBomberil;
$_SESSION["infoLaboralSolicitada"] = $infoLaboral;
$_SESSION["infoMedica1Solicitada"] = $infoMedica1;
$_SESSION["infoMedica2Solicitada"] = $infoMedica2;
$_SESSION["infoFamiliarSolicitada"] = $infoFamiliar;
$_SESSION["infoAcademicaSolicitada"] = $infoAcademica;
$_SESSION["infoEntrenamientoEstandarSolicitada"] = $infoEntrenamientoEstandar;
$_SESSION["infoHistoricaSolicitada"] = $infoHistorica;
$_SESSION["infoCargosSolicitada"] = $infoCargos;

//header("location:../plantilla/plantillaBomberoImprimir.php ");
header("location:../plantilla/plantillaBomberoImprimirPDF.php ");
*/
?>

