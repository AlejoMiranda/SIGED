<?php
    require ('model/data.php');
    
    $data = new Data();

	
    $id_compania = $_POST['id_compania'];
    
    $resultadoM = $data->getUbicacionFisica($id_compania);
	
	$html= "<option value='0'>Seleccionar Bodega</option>";
	
	foreach($resultadoM as $p => $bodega)
	{
		$html.= "<option value='".$bodega->getIdUbicacionFisica()."'>".$bodega->getNombreUbicacionFisica()."</option>";
	}
	
	echo $html;
?>