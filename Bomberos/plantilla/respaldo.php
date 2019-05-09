<div class = "contenedor">

            	<div class="titulo">
            		Información Personal
            	</div>

		        <img id="imgPerfil" src="../images/avatar_opt.jpg">
    
            <div id="datosPersonales1">

        		<div class="title1">Rut</div>
        		<div class="title2">:</div>
        		
        		<div class="resp1">
                    <input class="inputStyle" value="'.$infoPersonal->getRutInformacionPersonal().'" type="text" name="txtRut" disabled>			
        	    </div>		
        		
        		
        		<div class="title1">Nombre</div>
        		<div class="title2">:</div>  
        		
        		<div class="resp1">
                    <input class="inputStyle" value="'.utf8_encode($infoPersonal->getNombreInformacionPersonal()).'" type="text" name="txtNombre" disabled>
        		</div>
        		
        		
        		<div class="title1">Apellido Paterno</div>
        		<div class="title2">:</div>  
        		
        		<div class="resp1">
                    <input class="inputStyle" value="'.utf8_encode($infoPersonal->getApellidoPaterno()).'" type="text" name="txtApePa" disabled>	
        		</div>
        		
        		
        		
        		<div class="title1">Apellido Materno</div>
        		<div class="title2">:</div> 
        		
        		<div class="resp1">
                    <input class="inputStyle" value="'.utf8_encode($infoPersonal->getApellidoMaterno()).'" type="text" name="txtApeMa" disabled>
        		</div>
        		 
        		
        		
        		<div class="title1">Fecha Nacimiento</div>
        		<div class="title2">:</div> 
        		
        		<div class="resp1">
        			<input class="inputStyle" value="'.$fecha_format_2.'" type="text" name="txtFechaNacimiento" disabled> 	 		
        		</div>
        		
        		
        		
        		<div class="title1">Estado Civil</div>
        		<div class="title2">:</div> 
        		
        		<div class="resp1">
                    <input class="inputStyle" value="'.$estadoCivilMostrar.'" type="text" name="txtEstadoCivil" disabled>
        		</div>
        		 
                
                
                <div class="title1">Talla Chaqueta/camisa</div>
        		<div class="title2">:</div> 
        		
        		<div class="resp1">
        			<input class="inputStyle" value="'.$infoMedidas->getTallaChaquetaCamisa().'" type="text" name="txtchaqueta" disabled>
        		</div>
        		
                
        		
        		<div class="title1">Talla Pantalón</div>
        		<div class="title2">:</div> 
        		
        		<div class="resp1">
                    <input class="inputStyle" value="'.$infoMedidas->getTallaPantalon().'" type="text" name="txtPantalon" disabled>
        		</div>
        		
        		
        		
        		<div class="title1">Talla buzo</div>
        		<div class="title2">:</div> 
        		
        		<div class="resp1">
                    <input class="inputStyle" value="'.$infoMedidas->getTallaBuzo().'" type="text" name="txtbuzo" disabled>
        		</div>
        		
        		
        		<div class="title1">Talla Calzado</div>
        		<div class="title2">:</div>  
        		
        		<div class="resp1">
                    <input class="inputStyle" value="'.$infoMedidas->getTallaCalzado().'" type="text" name="txtcalzado" disabled>
        		</div>
        		
        		
        		 
        		<div class="title1">Altura</div>
        		<div class="title2">:</div>
        		
        		<div class="resp1">
                    <input class="inputStyle" value="'.$infoPersonal->getAlturaEnMetros().'" type="text" name="txtaltura" disabled>
        		</div> 
        		
        		
        		<div class="title1">Peso</div>
        		<div class="title2">:</div>
        		 
        		<div class="resp1">
                    <input class="inputStyle" value="'.$infoPersonal->getPeso().'" type="text" name="txtpeso" disabled>
        		</div> 
        		 
        		
        		
        		<div class="title1">Email</div>		
        		<div class="title2">:</div> 
        		
        		<div class="resp1">
                    <input class="inputStyle" value="'.$infoPersonal->getEmail().'" type="text" name="txtemail" disabled>
        		</div>
		
            </div>
	
		

		    <div id="datosPersonales2">
		
        		<div class="title3">Genero</div>
        		<div class="title4">:</div> 
        		
        		<div class="resp2">
                    <input class="inputStyle" value="'.$generoMostrar.'" type="text" name="txtGenero" disabled>
        		</div>
    
                       
            
                <div class="title3">Teléfonos</div>
        		<div class="title4">:</div> 
        		
        		<div class="resp2">
                    <input class="inputStyle" value="'.$infoPersonal->getTelefonoFijo().'" type="text" name="txtTelefonos" disabled>
        		</div>                           		
            		
            </div>
		
            <br>
	        <br>
		
		    <div id="datosPersonales3">
		
    			<div class="title5">Dirección</div>
    			<div class="title6">:</div>
    			
    			<div class="resp3">
                    <input class="inputStyle" value="'.$infoPersonal->getDireccionPersonal().'" type="text" name="txtDireccion" disabled>
    			</div> 
    			
    			<div class="title5">Perteneció a Brigada Juvenil?</div>
    			<div class="title6">:</div>
    			
    			<div class="resp3">
                    <input class="inputStyle" value="'.$infoPersonal->getPertenecioABrigadaJuvenil().'" type="text" name="txtbrigada" disabled>
    			</div> 
    			
    			
    			<div class="title5">Instructor</div>
    			<div class="title6">:</div>
    			<div class="resp3">
                    <input class="inputStyle" value="'.$infoPersonal->getEsInstructor().'" type="text" name="txtinstructor" disabled>
    			</div>
		<br>
		<br>
		<br>
		
    </div>
</div>


<br>
<br>
<br>








<div class = "contenedor">

	<div class="titulo">
		Información Bomberil
	</div>
	
	<div id="informacionBomberil1">
		
			<div class="title7">Región</div>
			<div class="title8">:</div>
			<div class="resp4">
    			<input class="inputStyle2" value="'.$regionBomberil.'" type="text" name="txtRegion" disabled>
             </div>
                     
                     
                     
            <div class="title7">Cuerpo</div>
			<div class="title8">:</div>
			<div class="resp4">
    			<input class="inputStyle2" value="'.$infoBomberil->getcuerpoInformacionBomberil().'" type="text" name="txtcuerpo" disabled>
			</div>         
                     
                     
            <div class="title7">Compañía</div>
			<div class="title8">:</div>
			     
			<div class="resp4">
    		  <input class="inputStyle2" value="'.$companiaBomberil.'" type="text" name="txtcuerpo" disabled>
            </div>
                       
            <div class="title7">Cargo</div>
			<div class="title8">:</div> 
                       
            <div class="resp4">
    		  <input class="inputStyle2" value="'.$cargoBomberil.'" type="text" name="txtcuerpo" disabled>                       
			</div> 
                     	
		
			<div class="title7">Fecha Ingreso</div>
			<div class="title8">:</div> 
                       
             <div class="resp4">
        	   <input class="inputStyle2" value="'.$infoBomberil->getfechaIngresoinformacionBomberil().'" type="date" name="txtfingreso" disabled>                       
    		 </div> 
					
					
			 <div class="title7">Nº Reg.General</div>
			 <div class="title8">:</div> 
                       
             <div class="resp4">
                <input class="inputStyle2" value="'.$infoBomberil->getNRegGeneralinformacionBomberil().'" type="text" name="txtgeneral" disabled>                       
			 </div> 
					
					
					
	   <div id="informacionBomberil2">
			
			<div class="title9">Estado</div>
			<div class="title10">:</div> 
                       
            <div class="resp5">
    		  <input class="inputStyle2" value="'.$estadoBomberil.'" type="text" name="txtestado" disabled>
			</div> 
					
					
			<div class="title9">Nº Reg.Cia</div>
			<div class="title10">:</div> 
                       
             <div class="resp5">
                 <input class="inputStyle2" value="'.$infoBomberil->getNRegCiainformacionBomberil().'" type="text" name="txtcia" disabled>                       
			</div>
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

	<div class="titulo">
		Información Histórica
	</div>

	<table cellspacing="1" cellpadding="4" class="table">
		<thead>
			<tr>
				<th class="tableHead">Región</th>
				<th class="tableHead">Cuerpo</th>
				<th class="tableHead">Compañía</th>
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
    		    <td class="td"><'.$premio.'></td>
    		  	<td class="td"><'.$motivo.'</td>
    			<td class="td">'.$detalle.'</td>
    			<td class="td">'.$cargo.'</td>
			</tr>
         </tbody>
	</table>
    <br>
</div>

<br>
<br>
<br>