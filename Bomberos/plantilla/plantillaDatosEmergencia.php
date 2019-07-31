<?php
require_once ("../model/Data.php");
require ('../lib/pdf/mpdf.php');

$data = new Data();

$idServicio = $_POST['idServicio'];

//datos del que llamo para la emergencia
$despachos = $data->detallesDeServicioPorIdReporte($idServicio);

foreach ($despachos as $c => $des) {        
    $nombre = $des->getNombre_servicio();
    $rut = $des->getRut_servicio();
    $telefono = $des->getTelefono_servicio();    
    $direccion = $des->getDireccion_servicio();
    $esquina1 = $des->getEsquina1_servicio();
    $esquina2 = $des->getEsquina2_servicio();
    $sector = $des->getFk_sector();
    $tipoEmergencia = $des->getFk_tipoDeServicio();
    $detalles = $des->getDetalles_servicio();
    
}

//maquinas que fueron deribadas a la emergencia
$maquinas = $data->getServicioUnidadPorFkServicio($idServicio);

foreach ($maquinas as $c => $des) {
    $detalleServicioUnidad =  $des->getDetalleEmergencia();
}

$apoyos = $data->getApoyosDelServicio($idServicio);

$fecha = $data->obtenerFecha();

$html='
    
        <div>
           <link rel ="stylesheet" href="../css/printStyle.css" type="text/css">
    
	           <div>
        		   <img id="imgCabecera" src="../images/bomberos_chile_logo.jpg">
        		   <h2  id="txt1Cabecera" >'.utf8_encode("Cuerpo de Bomberos Machalí").'</h2>
        		   <h4  id="txt2Cabecera" >'.utf8_encode("Sistema de Gestión y Despacho - SIGED").'</h4>
        		   <h4 id="txt3Cabecera" >'.utf8_encode("Reporte Módulo Despacho - Datos de Emergencia").'</h4>
        		       
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

    <div class = "contenedor">
    <div class="titulo">'.utf8_encode("Datos").'</div>

    <div id="datosEmergencia">
	    
    		<div id="t1">Nombre</div>
    		<div id="t2">:</div>    

    		<div id="r1">
                <p class="iStyle">'.utf8_encode($nombre).'</p>
    		</div>
                    
                    
                    
    		<div id="t3">RUT</div>
    		<div id="t4">:</div>
                    
    		<div id="r2">
                <p class="iStyle">'.utf8_encode($rut).'</p>
    		</div>
                    
                    
    		<div id="t5">Telefono</div>
    		<div id="t6">:</div>
                    
    		<div id="r3">
                <p class="iStyle">'.utf8_encode($telefono).'</p>
    		</div>
                    
                    
                    
    		<div id="t7">Direccion</div>
    		<div id="t8">:</div>
                    
    		<div id="r4">
                <p class="iStyle">'.utf8_encode($direccion).'</p>
    		</div>
                    
                    
                    
    		<div id="t9">Esquina 1</div>
    		<div id="t10">:</div>
                    
    		<div id="r5">
                <p class="iStyle">'.utf8_encode($esquina1).'</p>
    		</div>
                    
                    
                    
    		<div id="t11">Esquina 2</div>
    		<div id="t12">:</div>
                    
    		<div id="r6">
                <p class="iStyle">'.utf8_encode($esquina2).'</p>
    		</div>
                                       
                    
            <div id="t13">Sector</div>
    		<div id="t14">:</div>
                    
    		<div id="r7">
                <p class="iStyle">'.utf8_encode($sector).'</p>
    		</div>
                    
                    
                    
    		<div id="t15">'.utf8_encode("Tipo Emergencia").'</div>
    		<div id="t16">:</div>
    		    
    		<div id="r8">
                <p class="iStyle">'.utf8_encode($tipoEmergencia).'</p>
    		</div>
                                    
                    
    		<div id="t17">Detalle</div>
    		<div id="t18">:</div>
                    
    		<div id="r9">
                <p class="iStyle">'.utf8_encode($detalles).'</p>
    		</div>
                    
                                        
	    </div>
        </div>
    <br>
    <br>

    <div class = "contenedor">
    <div class="titulo">'.utf8_encode("Unidades Asignadas").'</div>
                        
                        
  <table cellspacing="1" cellpadding="4" class="table">
  <thead>
  <tr>
  <th class="tableHead">' . utf8_encode("Unidad") . '</th>
  <th class="tableHead">' . utf8_encode("OBAC") . '</th>
  <th class="tableHead">Conductor</th>
  <th class="tableHead">' . utf8_encode("N° Bomberos") . '</th>
  <th class="tableHead">' . utf8_encode("6-0") . '</th>
  <th class="tableHead">' . utf8_encode("6-3") . '</th>
  <th class="tableHead">' . utf8_encode("6-7") . '</th>
  <th class="tableHead">' . utf8_encode("6-8") . '</th>
  <th class="tableHead">' . utf8_encode("6-9") . '</th>
  <th class="tableHead">' . utf8_encode("6-10") . '</th>
  </tr>
  </thead>
  <tbody>';

foreach ($maquinas as $c => $ma) {
    
    $html .= '<tr>
        
  <td class="td">' . utf8_encode($data->getNombreDeUnidadPorId($ma->getFk_unidad())) . '</td>
  <td class="td">' . utf8_encode($ma->getObac()) . '</td>
  <td class="td">' . utf8_encode($ma->getConductor()) . '</td>
  <td class="td">' . utf8_encode($ma->getN_Bomberos()) . '</td>
  <td class="td">' . utf8_encode(date("d-m-Y H:i:s", strtotime($ma->getMomento6_0()))) . '</td>
 <td class="td">' . utf8_encode(date("d-m-Y H:i:s", strtotime($ma->getMomento6_3()))) . '</td>
 <td class="td">' . utf8_encode(date("d-m-Y H:i:s", strtotime($ma->getMomento6_7()))) . '</td>
 <td class="td">' . utf8_encode(date("d-m-Y H:i:s", strtotime($ma->getMomento6_8()))) . '</td>
 <td class="td">' . utf8_encode(date("d-m-Y H:i:s", strtotime($ma->getMomento6_9()))) . '</td>
 <td class="td">' . utf8_encode(date("d-m-Y H:i:s", strtotime($ma->getMomento6_10()))) . '</td>';
}

$html .= '</tr>
  </tbody>
  </table>

        </div>

    <br>
    <br>

    <div class = "contenedor">
    <div class="titulo">'.utf8_encode("Detalle Emergencia").'</div>
    
        <div id="r10">
            <p class="iStyle">'.utf8_encode($detalleServicioUnidad).'</p>
        </div>
    </div>  

<br>
<br>

    <div class = "contenedor">
        <div class="titulo">'.utf8_encode("Apoyo Externo").'</div>

    <table cellspacing="1" cellpadding="4" class="table">
  <thead>
  <tr>
  <th class="tableHead">' . utf8_encode("Entidad") . '</th>
  <th class="tableHead">' . utf8_encode("Responsable") . '</th>
  <th class="tableHead">' . utf8_encode("PPUU") . '</th>
  </tr>
  </thead>
  <tbody>';

foreach ($apoyos as $c => $ap) {
    
    $html .= '<tr>
        
  <td class="td">' . utf8_encode($ap->getFkEntidad()) . '</td>
  <td class="td">' . utf8_encode($ap->getResponsable()) . '</td>
 <td class="td">' . utf8_encode($ap->getPpuu()) . '</td>';
}

$html .= '</tr>
  </tbody>
  </table>
</div>
  ';

$mpdf = new mPDF('c', 'A4');

$stylesheet = file_get_contents('../css/printStyle.css');
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

$mpdf->SetTitle('Despacho');
$mpdf->writeHTML($stylesheet, 1);

$mpdf->writeHTML($html, 2);

$mpdf->Output('Datos de Emergencia.pdf', 'I');

?>