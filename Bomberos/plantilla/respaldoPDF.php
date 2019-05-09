<?php

header("Content-Type: text/html; charset=iso-8859-1 ");

require_once ("../model/Data.php");
require('../lib/pdf/mpdf.php');

$data = new Data();

session_start();

if (isset($_SESSION["infoPersonalSolicitada"])) {
    $infoPersonal = $_SESSION["infoPersonalSolicitada"];
}

if (isset($_SESSION["infoMedidasSolicitada"])) {
    $infoMedidas = $_SESSION["infoMedidasSolicitada"];
}

if (isset($_SESSION["infoBomberilSolicitada"])) {
    $infoBomberil = $_SESSION["infoBomberilSolicitada"];
}

if (isset($_SESSION["infoLaboralSolicitada"])) {
    $infoLaboral = $_SESSION["infoLaboralSolicitada"];
}

if (isset($_SESSION["infoMedica1Solicitada"])) {
    $infoMedica1 = $_SESSION["infoMedica1Solicitada"];
}

if (isset($_SESSION["infoMedica2Solicitada"])) {
    $infoMedica2 = $_SESSION["infoMedica2Solicitada"];
}

if (isset($_SESSION["infoFamiliarSolicitada"])) {
    $infoFamiliar = $_SESSION["infoFamiliarSolicitada"];
}

if (isset($_SESSION["infoAcademicaSolicitada"])) {
    $infoAcademica = $_SESSION["infoAcademicaSolicitada"];
}

if (isset($_SESSION["infoEntrenamientoEstandarSolicitada"])) {
    $infoEntrenamientoEstandar = $_SESSION["infoEntrenamientoEstandarSolicitada"];
}

if (isset($_SESSION["infoHistoricaSolicitada"])) {
    $infoHistorica = $_SESSION["infoHistoricaSolicitada"];
}

if (isset($_SESSION["infoCargosSolicitada"])) {
    $infoCargos = $_SESSION["infoCargosSolicitada"];
}

if (isset($_SESSION["resultadosDeBusquedaDeUnidad"])) {
    unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
}

if (isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])) {
    unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
}

/* DARLE FORMATO A LA FECHA*/

$fecha_bd= $infoPersonal->getFechaNacimiento();
$fecha_format_2 = date('d-m-Y', strtotime($fecha_bd));

echo 'FORMATO 1: '.$fecha_format.' - FORMATO 2:'.$fecha_format_2;

$fechaNacimiento = 
$fechaNacimiento = date_format($fechaNacimiento, 'd-m-Y');
/* DARLE FORMATO A LA FECHA*/

/*OBTENGO EL ESTADO CIVIL*/

require_once ("../model/Data.php");
require_once ("../model/Tbl_EstadoCivil.php");
$d = new Data();

$estadosCiviles = $d->readEstadosCiviles();

$estadoCivilMostrar = "";

foreach ($estadosCiviles as $e => $estado) {
    if ($infoPersonal->getFkEstadoCivil() == $estado->getIdEstadoCivil()) {
        $estadoCivilMostrar = $estado->getNombreEstadoCivil();
    }
}

/*OBTENGO EL ESTADO CIVIL*/

/* OBTENER GENERO DE LA PERSONA*/

require_once ("../model/Data.php");
require_once ("../model/Tbl_Genero.php");

$d = new Data();
$generos = $d->readGeneros();


$generoMostrar = "";

foreach ($generos as $g => $genero) {
    if ($infoPersonal->getFkGenero() == $genero->getIdGenero()) {
        $generoMostrar =  $genero->getNombreGenero(); 
    }
}
/* OBTENER GENERO DE LA PERSONA*/

/*INFO BOMBERIL*/

$regionBomberil = "";
$companiaBomberil = "Test";
$cargoBomberil = "";
$estadoBomberil = "";



//region

require_once ("../model/Data.php");
require_once ("../model/Tbl_Region.php");
$d = new Data();

$regiones = $d->readRegiones();

foreach ($regiones as $r => $region) {
    if ($infoBomberil->getfkRegioninformacionBomberil() == $region->getIdRegion()) {
        $regionBomberil = utf8_encode($region->getNombreRegion());
    }
}
//region    


//compañia

$data = new Data();

$companias = $data->readSoloCompanias();

foreach ($companias as $c => $compania) {
    $companiaBomberil = utf8_encode($data->getEntidadACargoByID($infoBomberil->getfkCompaniainformacionBomberil()));
}
//compañia

//fecha
$fechaInfoBomberil = date('d-m-Y', strtotime($infoBomberil->getfechaIngresoinformacionBomberil()));

//fecha

// cargo

require_once ("../model/Data.php");
require_once ("../model/Tbl_Cargo.php");

$d = new Data();
    
$cargos = $d->readCargos();

foreach ($cargos as $c => $cargo) {
    if ($infoBomberil->getfkCargoinformacionBomberil() == $cargo->getIdCargo()) {
        $cargoBomberil = $cargo->getNombreCargo();
    } 
}
// cargo


//estado bombero
require_once ("../model/Data.php");
require_once ("../model/Tbl_EstadoBombero.php");

$d = new Data();
    
$estados = $d->readEstadosDeBomberos();
foreach ($estados as $e => $estado) {
    if ($infoBomberil->getfkEstadoinformacionBomberil() == $estado->getIdEstado()) {
        $estadoBomberil = utf8_encode($estado->getNombreEstado());
	}
}

//estado bombero
/*INFO BOMBERIL*/


/*InfoMedica*/
$grupoSanguineo = "";

//grupo sanguineo

require_once ("../model/Data.php");
require_once ("../model/Tbl_GrupoSanguineo.php");
$d = new Data();

$grupos = $d->readGruposSanguineos();
foreach ($grupos as $g => $grupo) {
    
    if ($infoMedica2->getfkGrupoSanguineoinformacionMedica2() == $grupo->getIdGrupoSanguineo()) {
        
        $grupoSanguineo = $grupo->getNombreGrupoSanguineo();
    }
}

//grupo sanguineo

//donante y fumador

$donanteChequeado = "Si";
$fumadorChequeado = "Si";

if ($infoMedica2->getesDonanteinformacionMedica2() == FALSE) {
    $donanteChequeado = "No";
}

if ($infoMedica2->getesFumadorinformacionMedica2() == FALSE) {
    $fumadorChequeado = "No";
}
//donante y fumador

//parentescoinfo

$parentescoInfoMedico = "";

require_once ("../model/Data.php");
require_once ("../model/Tbl_Parentesco.php");
$d = new Data();

$parentescos = $d->readParentescos();

foreach ($parentescos as $p => $parentesco) {
    if ($infoMedica2->getfkParentescoContactoinformacionMedica2() == $parentesco->getIdParentesco()) {
        $parentescoInfoMedico = utf8_encode($parentesco->getNombreParentesco());
    }
}
//parentesco

/*InfoMedica*/


/*INFO LABORAL*/

$empresaInfoLa = "No Hay Datos";
$direccionEmpresaInfoLa = "No Hay Datos";
$telefonoEmpresaInfoLa = "No Hay Datos";
$cargoEmpresaInfoLa = "No Hay Datos";
$fechaIngresoInfoLa = "No Hay Datos";
$departamentoInfoLa = "No Hay Datos";
$afpInfoLa = "No Hay Datos";
$profesionInfoLa = "No Hay Datos";


if (isset($infoLaboral)) {
    $empresaInfoLa = $infoLaboral->getnombreEmpresainformacionLaboral();
}
            
            
if (isset($infoLaboral)) {
    $direccionEmpresaInfoLa = $infoLaboral->getdireccionEmpresainformacionLaboral();
}


if (isset($infoLaboral)) {
    $telefonoEmpresaInfoLa = $infoLaboral->gettelefonoEmpresainformacionLaboral();
}


if (isset($infoLaboral)) {
    $cargoEmpresaInfoLa = $infoLaboral->getcargoEmpresainformacionLaboral();
}

            
if (isset($infoLaboral)) {
    $fechaIngresoInfoLa = date('d-m-Y', strtotime($fechaIngresoInfoLa = $infoLaboral->getfechaIngresoEmpresainformacionLaboral()));
}
            
            
if (isset($infoLaboral)) {
    $departamentoInfoLa = $infoLaboral->getareaDeptoEmpresainformacionLaboral();
}

            
if (isset($infoLaboral)) {
    $afpInfoLa = $infoLaboral->getafp_informacionLaboral();
}

            
if (isset($infoLaboral)) {
    $profesionInfoLa = $infoLaboral->getprofesion_informacionLaboral();
}
            
            
/*INFO LABORAL*/

/*INFO FAMILIAR*/
$nombreInfoFami = "";
$fechaInfoFami = "";
$parentesco = "";

foreach ($infoFamiliar as $iFamiliar => $datos) {
    
    $nombreInfoFami = $datos->getNombresInformacionFamiliar();
    
    $fechaInfoFami = date("d-m-Y", strtotime($datos->getFechaNacimientoInformacionFamiliar()));
    
    $parentesco = utf8_encode($d->buscarNombreParentescoPorId($datos->getfkParentescoinformacionFamiliar())->getNombreParentesco());
                      
}
/*INFO FAMILIAR*/

/*INFO ACADEMICA*/

$actividadAcademica = "";
$fechaInfoAca = "";
$estadoCursoInfoAca = "";

foreach ($infoAcademica as $iAcademica => $datos) {
    $actividadAcademica = $datos->getactividadInformacionAcademica();
    $fechaInfoAca = date("d-m-Y", strtotime($datos->getfechaInformacionAcademica()));
    $estadoCursoInfoAca = $d->buscarEstadoDeCursoPorId($datos->getfkEstadoCursoInformacionAcademica());
}
                          
/*INFO ACADEMICA*/

/*ENTRENAMIENTO ESTANDAR*/
$fechaEntrenamiento = "";
$actividad = "";
$estadoCurso = "";

foreach ($infoEntrenamientoEstandar as $iEstandar => $datos) {
    $actividad =  $datos->getactividad();    
    $fechaEntrenamiento = date("d-m-Y", strtotime($datos->getfechaEntrenamientoEstandar()));    
    $estadoCurso =  $d->buscarEstadoDeCursoPorId($datos->getFkEstadoCurso());
                           
}
                            
/*ENTRENAMIENTO ESTANDAR*/

/*FECHA DE CAMBIO*/
$nombreRegion = "";
$cuerpo = "";
$compañia = "";
$fechaCambio = "";
$premio = "";
$motivo = "";
$detalle = "";
$cargo = "";

foreach ($infoHistorica as $iHistorica => $info) {
    
    $nombreRegion = utf8_encode($d->buscarNombreDeRegionPorId($info->getfkRegioninformacionHistorica()));
    $cuerpo = utf8_encode($info->getcuerpo());
    $compañia = $info->getcompania();
    $fechaCambio = date("d-m-Y", strtotime($info->getfechaDeCambio()));
    $premio = $info->getPremio();
    $motivo = $info->getmotivo();
    $detalle = $info->getdetalle();
    $cargo = utf8_encode($info->getCargo());
}
/*FECHA DE CAMBIO*/

$header = '
        <div>
           <link rel ="stylesheet" href="../css/printStyle.css" type="text/css">

	           <div>
        		   <img id="imgCabecera" src="../images/bomberos_chile_logo.jpg">
        		   <h2  id="txt1Cabecera" >BOMBEROS DE CHILE</h2>
        		   <h4  id="txt2Cabecera" >SISTEMA DE REGISTRO NACIONAL DE BOMBEROS</h4>
        		   <h4  id="txt3Cabecera" >HOJA DE VIDA</h4>
        	       <h3 id ="salto"> __________________________________________ </h3>
	           </div>
         </div>
';

$html='

        <div>
           <link rel ="stylesheet" href="../css/printStyle.css" type="text/css">

	           <div>
        		   <img id="imgCabecera" src="../images/bomberos_chile_logo.jpg">
        		   <h2  id="txt1Cabecera" >BOMBEROS DE CHILE</h2>
        		   <h4  id="txt2Cabecera" >SISTEMA DE REGISTRO NACIONAL DE BOMBEROS</h4>
        		   <h4  id="txt3Cabecera" >HOJA DE VIDA</h4>
        	       <h3 id ="salto"> __________________________________________ </h3>
                   <br>
	           </div>
         </div>

<div class = "contenedor">

	<div class="titulo">'.utf8_encode("Información Personal").'</div>
		<img id="imgPerfil" src="../images/avatar_opt.jpg">
		
	     <div id="datosPersonales1">

    		<div class="title1">RUT</div>
    		<div class="title2">:</div>
    		
    		<div class="resp1">
                <p class="inputStyle">'.$infoPersonal->getRutInformacionPersonal().'</p> 		
    		</div>
    		
    		
    		
    		<div class="title1">Nombre</div>
    		<div class="title2">:</div>  
    		
    		<div class="resp1">
                <p class="inputStyle">'.utf8_encode($infoPersonal->getNombreInformacionPersonal()).'</p> 
    		</div>
    		
    		
    		<div class="title1">Apellido Paterno</div>
    		<div class="title2">:</div>  
    		
    		<div class="resp1">
                <p class="inputStyle">'.utf8_encode($infoPersonal->getApellidoPaterno()).'</p> 
    		</div>
    		
    		
    		
    		<div class="title1">Apellido Materno</div>
    		<div class="title2">:</div> 
    		
    		<div class="resp1">
                <p class="inputStyle">'.utf8_encode($infoPersonal->getApellidoMaterno()).'</p>
    		</div>
    		 
    		
    		
    		<div class="title1">Fecha Nacimiento</div>
    		<div class="title2">:</div> 
    		
    		<div class="resp1">
                <p class="inputStyle">'.$fecha_format_2.'</p>
    		</div>
    		
    		
    		
    		<div class="title1">Estado Civil</div>
    		<div class="title2">:</div> 
    		
    		<div class="resp1">
                <p class="inputStyle">'.$estadoCivilMostrar.'</p>
    		</div>
    		 
    		
            
            
            <div class="title1">Talla Chaqueta / Camisa</div>
    		<div class="title2">:</div> 
    		
    		<div class="resp1">
                <p class="inputStyle">'.$infoMedidas->getTallaChaquetaCamisa().'</p>
    		</div>
    		
            
    		
    		<div class="title1">'.utf8_encode("Talla de Pantalón").'</div>
    		<div class="title2">:</div> 
    		
    		<div class="resp1">
                <p class="inputStyle">'.$infoMedidas->getTallaPantalon().'</p>
    		</div>
    		
    		
    		
    		<div class="title1">Talla de Buzo</div>
    		<div class="title2">:</div> 
    		
    		<div class="resp1">
                <p class="inputStyle">'.$infoMedidas->getTallaBuzo().'</p>
    		</div>
    		
    		
    		
    		
    		<div class="title1">Talla de Calzado</div>
    		<div class="title2">:</div>  
    		
    		<div class="resp1">
                <p class="inputStyle">'.$infoMedidas->getTallaCalzado().'</p>
    		</div>
    		
    		
    		 
    		<div class="title1">Altura</div>
    		<div class="title2">:</div>
    		
    		<div class="resp1">
                <p class="inputStyle">'.$infoPersonal->getAlturaEnMetros().'</p>
    		</div> 
    		
    		
    		
    		
    		<div class="title1">Peso</div>
    		<div class="title2">:</div>
    		 
    		<div class="resp1">
                <p class="inputStyle">'.$infoPersonal->getPeso().'</p>
    		</div> 
    		 
    		
    		
    		<div class="title1">E-mail</div>
    		
    		<div class="title2">:</div> 
    		
    		<div class="resp1">
                <p class="inputStyle">'.$infoPersonal->getEmail().'</p>
    		</div>
		
	    </div>	

		<div id="datosPersonales2">
		
    		<div class="title3">'.utf8_encode("Género").'</div>
    		<div class="title4">:</div> 
    		
    		<div class="resp2">
                <p class="inputStyle">'.$generoMostrar.'</p>
    		</div><br>
                       
            
            <div class="title3">'.utf8_encode("Teléfonos").'</div>
    		<div class="title4">:</div> 
    		
    		<div class="resp2">
                <p class="inputStyle">'.$infoPersonal->getTelefonoFijo().'</p>
    		</div>                           		
            		
		
		</div>
		
        <br>
		<br>
		
		<div id="datosPersonales3">
		
			<div class="title5">'.utf8_encode("Dirección Personal").'</div>
			<div class="title6">:</div>
			
			<div class="resp3">
                <p class="inputStyle">'.$infoPersonal->getDireccionPersonal().'</p>
			</div> 
			
			<div class="title5">'.utf8_encode("Perteneció a Brigada Juvenil?").'</div>
			<div class="title6">:</div>
			
			<div class="resp3">
                <p class="inputStyle">'.$infoPersonal->getPertenecioABrigadaJuvenil().'</p>
			</div> 
			
			
			<div class="title5">Instructor</div>
			<div class="title6">:</div>
			<div class="resp3">
                <p class="inputStyle">'.$infoPersonal->getEsInstructor().'</p>
			</div>
   
			<br>
			<br>
			<br>                 
                    
		
	   </div>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class = "contenedor">

	<div class="titulo">'.utf8_encode("Información Bomberil").'</div>
	
	<div id="informacionBomberil1">
		
			<div class="title7">'.utf8_encode("Región").'</div>
			<div class="title8">:</div>
			
			<div class="resp4">
                <p>'.$regionBomberil.'</p>
            </div>
                     
                     
                     
            <div class="title7">Cuerpo</div>
			<div class="title8">:</div>

			<div class="resp4">
                <p>'.$infoBomberil->getcuerpoInformacionBomberil().'</p>
			</div>        
                     
                     
            <div class="title7">'.utf8_encode("Compañía").'</div>
			<div class="title8">:</div>
			
			<div class="resp4">
                <p>'.$companiaBomberil.'</p>
            </div>
                       
                    <div class="title7">Cargo</div>
					<div class="title8">:</div> 
                       
                    <div class="resp4">    			
                        <p>'.$cargoBomberil.'</p>                       
			         </div> 
                     	
		
			<div class="title7">Fecha Ingreso</div>
					<div class="title8">:</div> 
                       
                    <div class="resp4">
            			<p>'.$fechaInfoBomberil.'</p>                       
					</div> 
					
					
					<div class="title7">'.utf8_encode("Nº Reg.General").'</div>
					<div class="title8">:</div> 
                       
                    <div class="resp4">
    					 <p>'.$infoBomberil->getNRegGeneralinformacionBomberil().'</p>                     
					</div> 
					
					
					
			<div id="informacionBomberil2">
			
				<div class="title9">Estado</div>
				<div class="title10">:</div> 
                       
                <div class="resp5">
    			  <p>'.$estadoBomberil.'</p>   
                </div> 
					
					
				<div class="title9">'.utf8_encode("Nº Reg.Cia").'</div>
				<div class="title10">:</div> 
                <div class="resp5">
                 <p>'.$infoBomberil->getNRegCiainformacionBomberil().'</p>                    
				</div>
			</div>

<br>
<br>

</div>    	
</div>
			         
<br>
<br>
<br>


<div class = "contenedor">	
	
	<div class="titulo">'.utf8_encode("Información Laboral").'</div>
	
	<div id="informacionPersonal">

    	<div class="title11">Nombre Empresa</div>
    	<div class="title12">:</div> 
                       
        <div class="resp6">
                <p class="inputStyle2">'.$empresaInfoLa.'</p>
    	</div>
	
	
    	<div class="title11">'.utf8_encode("Dirección Empresa").'</div>
    	<div class="title12">:</div> 
                       
        <div class="resp6">
                <p class="inputStyle2">'.$direccionEmpresaInfoLa.'</p>
    	</div>
	
    	<div class="title11">'.utf8_encode("Teléfono Empresa").'</div>
    	<div class="title12">:</div> 
    	<div class="resp6">
                <p class="inputStyle2">'.$telefonoEmpresaInfoLa.'</p>
    	</div>
	
    	<div class="title11">Cargo</div>
    	<div class="title12">:</div> 
    	<div class="resp6">
            <p class="inputStyle2">'.$cargoEmpresaInfoLa.'</p>
    	</div>
		 
		
    	<div class="title11">Fecha Ingreso</div>
    	<div class="title12">:</div> 
    	<div class="resp6">
            <p class="inputStyle2">'.$fechaIngresoInfoLa.'</p>
    	</div>	

    	<div class="title11">'.utf8_encode("Área / Depto de trabajo").'</div>
    	<div class="title12">:</div> 
    	<div class="resp6">
            <p class="inputStyle2">'.$departamentoInfoLa.'</p>
    	</div>
		
		
    	<div class="title11">AFP</div>
    	<div class="title12">:</div> 
    	<div class="resp6">
            <p class="inputStyle2">'.$afpInfoLa.'</p>
    	</div>
		
    	<div class="title11">'.utf8_encode("Profesión").'</div>
    	<div class="title12">:</div> 
    	<div class="resp6">
            <p class="inputStyle2">'.$profesionInfoLa.'</p>
    	</div>
	
	</div>	 
</div>

<br>
<br>
<br>


<div class = "contenedor">

    	<div class="titulo">'.utf8_encode("Información Médica").'</div>
	
	   <div id="informacionMedica1">
		
		
    		<div class="title13">'.utf8_encode("Prestación Médica").'</div>
            <div class="title14">:</div> 
            
            <div class="resp7">
                <p class="inputStyle2">'.$infoMedica1->getprestacionMedica_informacionMedica1().'</p>
    		</div>
    		
    		<div class="title13">Alergias</div>
            <div class="title14">:</div> 
            
            <div class="resp7">
                <p class="inputStyle2">'.$infoMedica1->getalergias_informacionMedica1().'</p>
    		</div>
    		
    		<div class="title13">'.utf8_encode("Enfermedades Crónicas").'</div>
            <div class="title14">:</div> 
            
            <div class="resp7">
                <p class="inputStyle2">'.$infoMedica1->getenfermedadesCronicasinformacionMedica1().'</p>
    		</div>
    		
    		<div class="title13">Medicamentos Habituales</div>
            <div class="title14">:</div> 
            
            <div class="resp7">
                <p class="inputStyle2">'.$infoMedica2->getmedicamentosHabitualesinformacionMedica2().'</p>
    		</div>
    		
    		<div class="title13">Nombre del Contacto</div>
            <div class="title14">:</div> 
            <div class="resp7">
                <p class="inputStyle2">'.$infoMedica2->getnombreContactoinformacionMedica2().'</p>
    		</div>
    		
    		<div class="title13">'.utf8_encode("Teléfono del Contacto").'</div>
            <div class="title14">:</div> 
            
            <div class="resp7">
                <p class="inputStyle2">'.$infoMedica2->gettelefonoContactoinformacionMedica2().'</p>
    		</div>
    	
    		<div class="title13">Parentesco del Contacto</div>
            <div class="title14">:</div> 
            <div class="resp7">
                <p class="inputStyle2">'.$parentescoInfoMedico.'</p>
    		</div>
    		
    		<div class="title13">'.utf8_encode("Nivel de Actividad Física").'</div>
            <div class="title14">:</div> 
            
            <div class="resp7">
                <p class="inputStyle2">'.$infoMedica2->getnivelActividadFisicainformacionMedica2().'</p>
    		</div>
    		
    	<!-- FIN DE DIV informacionMedica1 -->	                    
    	</div>
    		
    	<div id="informacionMedica2">
    
            <div class="title15">Donante</div>
            <div class="title16">:</div> 
            <div class="resp8"> 
                <p class="inputStyle2">'.$donanteChequeado.'</p>
            </div>
    		
        	<div class="title15">Fumador</div>
            <div class="title16">:</div> 
            <div class="resp8"> 
                <p class="inputStyle2">'.$fumadorChequeado.'</p>
            </div>
    		
        	<div class="title15">'.utf8_encode("Grupo Sanguíneo").'</div>
            <div class="title16">:</div> 
                    	
            <div class="resp8">
                <p class="inputStyle2">'.$grupoSanguineo.'</p>
        	</div>
	
	   <!-- FIN DE DIV informacionMedica2 -->	
	     </div> 
	
<!-- FIN DE DIV contenedor InfoMedica -->
</div>


<br>
<br>
<br>

<div class = "contenedor">
	<div class="titulo">'.utf8_encode("Información Familiar").'</div>

	<table  class="table">
		<thead>
			<tr>
				<th class="tableHead">Nombre</th>
				<th class="tableHead">Fecha de Nacimiento</th>
				<th class="tableHead">Parentesco</th>
			</tr>
		</thead>
		<tbody>

        <tr>
				<td class="td">'.$nombreInfoFami.'</td>
				<td class="td">'.$fechaInfoFami.'</td>
				<td class="td">'.$parentesco.'</td>
             
        
        </tr>

		</tbody>
	</table>
</div>

<br>
<br>
<br>

<div class = "contenedor">
	<div class="titulo">'.utf8_encode("Información Academica").'</div>


	<table   cellspacing="1" cellpadding="4"   class="table">
		<thead>
			<tr>
				<th class="tableHead">Fecha</th>
				<th class="tableHead">Actividad</th>
				<th class="tableHead">Estado</th>
			</tr>
		</thead>

		<tbody>

           <tr>
                <td class="td">'.$fechaInfoAca.'</td>
				<td class="td">'.$actividadAcademica.'</td>				
				<td class="td">'.$estadoCursoInfoAca.'</td>
            </tr>

		</tbody>
	</table>

</div>

<br>
<br>
<br>

<div class = "contenedor">
	<div class="titulo">'.utf8_encode("Información Entrenamiento Estandar").'</div>

		<table  cellspacing="1" cellpadding="4"    class="table">
			<thead>
				<tr>
					<th class="tableHead">Fecha</th>
					<th class="tableHead">Actividad</th>
					<th class="tableHead">Estado</th>
				</tr>
			</thead>
			<tbody>
                <tr>
					<td class="td">'.$fechaEntrenamiento.'</td>
					<td class="td">'.$actividad.'</td>
					<td class="td">'.$estadoCurso.'</td>
                </tr>
			</tbody>
		</table>

	</div>

<br>
<br>
<br>

<div class = "contenedor">
	<div class="titulo">'.utf8_encode("Información Histórica").'</div>

		<table   cellspacing="1" cellpadding="4"   class="table">
			<thead>
				<tr>
					<th class="tableHead">'.utf8_encode("Región").'</th>
					<th class="tableHead">Cuerpo</th>
					<th class="tableHead">'.utf8_encode("Compañía").'</th>
					<th class="tableHead">Fecha</th>
					<th class="tableHead">Premio</th>
					<th class="tableHead">Motivo</th>
					<th class="tableHead">Detalle</th>
					<th class="tableHead">Cargo</th>
				</tr>
			</thead>
			<tbody>
                                
                            <tr>
					<td class="td">'.$nombreRegion.'</td>
					<td class="td">'.$cuerpo.'</td>
					<td class="td">'.$compañia.'</td>
					<td class="td">'.$fechaCambio.'</td>
					<td class="td">'.$premio.'</td>
					<td class="td">'.$motivo.'</td>
					<td class="td">'.$detalle.'</td>
					<td class="td">'.$cargo.'</td>
				</tr>                          
              </tbody>
		</table>

	</div>

';



$mpdf = new mPDF('c','A4');


$stylesheet = file_get_contents('../css/printStyle.css');
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

$mpdf -> SetTitle('---- Reporte De Bombero ----');
$mpdf->writeHTML($stylesheet,1);

$mpdf->writeHTML($html, 2);


$mpdf->SetHTMLFooter(utf8_encode("Página").' {PAGENO}/{nb}');

$mpdf->Output('Reporte.pdf','I');