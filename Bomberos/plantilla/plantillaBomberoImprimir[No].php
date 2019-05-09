<?php

require_once ("../model/Data.php");
require_once ('../lib/pdf/mpdf.php');
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

?>

<!-- Cabecera del pfd-->
<LINK REL=StyleSheet HREF="../css/printStyle.css" TYPE="text/css" MEDIA=screen>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />


<div>
	<div>
		<img id="imgCabecera" src="../images/bomberos_chile_logo.jpg">
		<h2  id="txt1Cabecera" >BOMBEROS DE CHILE</h2>
		<h4  id="txt2Cabecera" >SISTEMA DE REGISTRO NACIONAL DE BOMBEROS</h4>
		<h4  id="txt3Cabecera" >HOJA DE VIDA</h4>
		<h3 id ="salto"> __________________________________________ </h3>
	</div>
</div>

<div class = "contenedor">
	<div class="titulo">
		Información Personal
	</div>
		<img id="imgPerfil" src="../images/avatar_opt.jpg">
		
	<div id="datosPersonales1">
		<div class="title1">Rut</div>
		<div class="title2">:</div>
		
		<div class="resp1">
			<input class="inputStyle" value="<?php echo $infoPersonal->getRutInformacionPersonal();?>" type="text" name="txtRut" disabled>		
		</div>
		
		
		
		<div class="title1">Nombre</div>
		<div class="title2">:</div>  
		
		<div class="resp1">
			<input class="inputStyle" value="<?php echo utf8_encode($infoPersonal->getNombreInformacionPersonal());?>" type="text" name="txtNombre" disabled>		
		</div>
		
		
		<div class="title1">Apellido Paterno</div>
		<div class="title2">:</div>  
		
		<div class="resp1">
			<input class="inputStyle" value="<?php echo utf8_encode($infoPersonal->getApellidoPaterno());?>" type="text" name="txtApePa" disabled> 		
		</div>
		
		
		
		<div class="title1">Apellido Materno</div>
		<div class="title2">:</div> 
		
		<div class="resp1">
			<input class="inputStyle" value="<?php echo utf8_encode($infoPersonal->getApellidoMaterno());?>" name="txtApeMa" disabled> 		
		</div>
		 
		
		
		<div class="title1">Fecha Nacimiento</div>
		<div class="title2">:</div> 
		
		<div class="resp1">
			<input class="inputStyle" value="<?php 
			
			
			$fechaSinConvertir = $infoPersonal->getFechaNacimiento();
			$fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
			
			
			echo $fechaConvertida;?>"> 		
		</div>
		
		
		
		<div class="title1">Estado Civil</div>
		<div class="title2">:</div> 
		
		<div class="resp1">
			<select class="inputStyle" name="cboEstadoCivil" disabled>
                    <?php

                    require_once ("../model/Data.php");
                    require_once ("../model/Tbl_EstadoCivil.php");
                    $d = new Data();

                    $estadosCiviles = $d->readEstadosCiviles();
                    foreach ($estadosCiviles as $e => $estado) {
                        if ($infoPersonal->getFkEstadoCivil() == $estado->getIdEstadoCivil()) {
                            ?>
                        <option
			value="<?php echo $estado->getIdEstadoCivil(); ?>" selected><?php echo $estado->getNombreEstadoCivil(); ?></option>
                        <?php
                        } else {
                            ?>
                          <option
			value="<?php echo $estado->getIdEstadoCivil(); ?>"><?php echo $estado->getNombreEstadoCivil(); ?></option>
                          <?php
                        }
                    }
                    ?>
                      <?php

                    ?>
                    </select>
		</div>
		 
		
        
        
        <div class="title1">Talla Chaqueta/camisa</div>
		<div class="title2">:</div> 
		
		<div class="resp1">
			<input class="inputStyle" value="<?php echo $infoMedidas->getTallaChaquetaCamisa();?>" type="text" name="txtchaqueta" disabled>
		</div>
		
        
		
		<div class="title1">Talla Pantalón</div>
		<div class="title2">:</div> 
		
		<div class="resp1">
			<input class="inputStyle" value="<?php echo $infoMedidas->getTallaPantalon();?>" type="text" name="txtpantalon" disabled>
		</div>
		
		
		
		<div class="title1">Talla buzo</div>
		<div class="title2">:</div> 
		
		<div class="resp1">
			<input class="inputStyle"
		value="<?php echo $infoMedidas->getTallaBuzo();?>" type="text"
		name="txtbuzo" disabled>
		</div>
		
		
		
		
		<div class="title1">Talla Calzado</div>
		<div class="title2">:</div>  
		
		<div class="resp1">
			<input class="inputStyle"
		value="<?php echo $infoMedidas->getTallaCalzado();?>" type="text"
		name="txtcalzado" disabled>
		</div>
		
		
		 
		<div class="title1">Altura</div>
		<div class="title2">:</div>
		
		<div class="resp1">
			<input class="inputStyle"
		value="<?php echo $infoPersonal->getAlturaEnMetros();?>" type="text"
		name="txtaltura" disabled>	
		</div> 
		
		
		
		
		<div class="title1">Peso</div>
		<div class="title2">:</div>
		 
		<div class="resp1">
			<input class="inputStyle"
		value="<?php echo $infoPersonal->getPeso();?>" type="text"
		name="txtpeso" disabled>		
		</div> 
		 
		
		
		<div class="title1">Email</div>
		
		<div class="title2">:</div> 
		
		<div class="resp1">
			<input class="inputStyle" value="<?php echo $infoPersonal->getEmail();?>" type="text" name="txtemail" disabled>		
		</div>
		
	</div>	

		<div id="datosPersonales2">
		
		<div class="title3">Genero</div>
		<div class="title4">:</div> 
		
		<div class="resp2">
			<select class="inputStyle" name="cboGenero" disabled>
                                  <?php
                                require_once ("../model/Data.php");
                                require_once ("../model/Tbl_Genero.php");
                                $d = new Data();
            
                                $generos = $d->readGeneros();
                                foreach ($generos as $g => $genero) {
                                    if ($infoPersonal->getFkGenero() == $genero->getIdGenero()) {
                                        ?>
                                      <option
            			value="<?php echo $genero->getIdGenero(); ?>" selected><?php echo $genero->getNombreGenero(); ?></option>
                                      <?php
                                    } else {
                                        ?>
                                        <option
            			value="<?php echo $genero->getIdGenero(); ?>"><?php echo $genero->getNombreGenero(); ?></option>
                                        <?php
                                    }
                                }
                                ?>
                                    <?php
            
                                    ?>
                                  </select>
		</div><br>
                   
        
        <div class="title3">Teléfonos</div>
		<div class="title4">:</div> 
		
		<div class="resp2">
			<input class="inputStyle"
            		value="<?php echo $infoPersonal->getTelefonoFijo();?>" type="text"
            		name="txtTelefonos" disabled>	
		</div>                           		
            		
		
		</div>
		<br>
			<br>
		
		<div id="datosPersonales3">
		
			<div class="title5">Dirección</div>
			<div class="title6">:</div>
			
			<div class="resp3">
    			<input class="inputStyle"
    			value="<?php echo $infoPersonal->getDireccionPersonal();?>"
                type="text" name="txtDireccion" disabled>	
			</div> 
			
			<div class="title5">Perteneció a Brigada Juvenil?</div>
			<div class="title6">:</div>
			
			<div class="resp3">
    			<input class="inputStyle"
				value="<?php echo $infoPersonal->getPertenecioABrigadaJuvenil();?>"
				type="text" name="txtbrigada" disabled>	
			</div> 
			
			
			<div class="title5">Instructor</div>
			<div class="title6">:</div>
			<div class="resp3">
    			<input class="inputStyle"
				value="<?php echo $infoPersonal->getEsInstructor();?>" type="text"
				name="txtinstructor" disabled> 	
			</div>   
			<br>
			<br>
			<br>                 
                    
		
			</div>
		</div>
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
    			<select class="inputStyle2" name="cboRegion" disabled>
                     <?php
                    require_once ("../model/Data.php");
                    require_once ("../model/Tbl_Region.php");
                    $d = new Data();

                    $regiones = $d->readRegiones();
                    foreach ($regiones as $r => $region) {
                        if ($infoBomberil->getfkRegioninformacionBomberil() == $region->getIdRegion()) {
                            ?>
                         <option
			value="<?php echo $region->getIdRegion(); ?>" selected><?php echo utf8_encode($region->getNombreRegion()); ?></option>
                         <?php
                        } else {
                            ?>
                           <option
			value="<?php echo $region->getIdRegion(); ?>"><?php echo utf8_encode($region->getNombreRegion()); ?></option>
                           <?php
                        }
                    }
                    ?>
                       <?php

                    ?>
                     </select>
             </div>
                     
                     
                     
            <div class="title7">Cuerpo</div>
			<div class="title8">:</div>
			<div class="resp4">
    			<input class="inputStyle2"
        		value="<?php echo $infoBomberil->getcuerpoInformacionBomberil();?>"
        		type="text" name="txtcuerpo" disabled>
			</div>         
                     
                     
                     
                     
                     
                     
                     
                     
            <div class="title7">Compañía</div>
			<div class="title8">:</div>
			
			<div class="resp4">
    			<select class="inputStyle2" name="txtcompania"
		class="form-control" disabled>
                     <?php
                    $companias = $data->readSoloCompanias();
                    foreach ($companias as $c => $compania) {
                        if ($infoBomberil->getfkCompaniainformacionBomberil() == $compania->getIdEntidadACargo()) {
                            ?>
                           <option
			value="<?php echo $compania->getIdEntidadACargo(); ?>" selected><?php echo utf8_encode($compania->getNombreEntidadACargo()); ?></option>
                           <?php
                        } else {
                            ?>
                             <option
			value="<?php echo $compania->getIdEntidadACargo(); ?>"><?php echo utf8_encode($compania->getNombreEntidadACargo()); ?></option>
                             <?php
                        }
                    }
                    ?>
                         <?php

                        ?>
                       </select>	
                       </div>
                       
                    <div class="title7">Cargo</div>
					<div class="title8">:</div> 
                       
                    <div class="resp4">
    			<select class="inputStyle2" name="cboCargo"
		disabled>
                     <?php
                    require_once ("../model/Data.php");
                    require_once ("../model/Tbl_Cargo.php");
                    $d = new Data();

                    $cargos = $d->readCargos();
                    foreach ($cargos as $c => $cargo) {
                        if ($infoBomberil->getfkCargoinformacionBomberil() == $cargo->getIdCargo()) {
                            ?>
                         <option
			value="<?php echo $cargo->getIdCargo(); ?>" selected><?php echo $cargo->getNombreCargo(); ?></option>
                         <?php
                        } else {
                            ?>
                           <option
			value="<?php echo $cargo->getIdCargo(); ?>"><?php echo $cargo->getNombreCargo(); ?></option>
                           <?php
                        }
                    }
                    ?>
                       <?php

                    ?>
                     </select>
                       
			</div> 
                     	
		
			<div class="title7">Fecha Ingreso</div>
					<div class="title8">:</div> 
                       
                    <div class="resp4">
    			<input class="inputStyle2"
            		value="<?php echo $infoBomberil->getfechaIngresoinformacionBomberil();?>"
            		type="date" name="txtfingreso" disabled>
                       
					</div> 
					
					
					<div class="title7">Nº Reg.General</div>
					<div class="title8">:</div> 
                       
                    <div class="resp4">
    					<input class="inputStyle2"
                			value="<?php echo $infoBomberil->getNRegGeneralinformacionBomberil();?>"
                			type="text" name="txtgeneral" disabled>                       
					</div> 
					
					
					
			<div id="informacionBomberil2">
			
				<div class="title9">Estado</div>
					<div class="title10">:</div> 
                       
                    <div class="resp5">
    					<select class="inputStyle2" name="cboEstadoBombero"
		disabled>
                     <?php
                    require_once ("../model/Data.php");
                    require_once ("../model/Tbl_EstadoBombero.php");
                    $d = new Data();

                    $estados = $d->readEstadosDeBomberos();
                    foreach ($estados as $e => $estado) {
                        if ($infoBomberil->getfkEstadoinformacionBomberil() == $estado->getIdEstado()) {
                            ?>
                         <option
			value="<?php echo $estado->getIdEstado(); ?>" selected><?php echo utf8_encode($estado->getNombreEstado()); ?></option>
                         <?php
                        } else {
                            ?>
                           <option
			value="<?php echo $estado->getIdEstado(); ?>"><?php echo utf8_encode($estado->getNombreEstado()); ?></option>
                           <?php
                        }
                    }
                    ?>
                       <?php

                    ?>
                     </select>
                       
					</div> 
					
					
					<div class="title9">Nº Reg.Cia</div>
					<div class="title10">:</div> 
                       
                    <div class="resp5">
                		<input class="inputStyle2"
                		value="<?php echo $infoBomberil->getNRegCiainformacionBomberil();?>"
                		name="txtcia" disabled>                       
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
		Información Laboral <br>
	</div>
	
	<div id="informacionPersonal">
	
	<div class="title11">Nombre Empresa</div>
	<div class="title12">:</div> 
                       
    <div class="resp6">
    	<input  class="inputStyle2"
        value="<?php
        if (isset($infoLaboral)) {
        echo $infoLaboral->getnombreEmpresainformacionLaboral();
        }
        ?>"
        type="text" name="txtnomempresa" disabled>                        
	</div>
	
	
	<div class="title11">Dirección Empresa</div>
	<div class="title12">:</div> 
                       
    <div class="resp6">
    	<input  class="inputStyle2"
        value="<?php
        if (isset($infoLaboral)) {
            echo $infoLaboral->getdireccionEmpresainformacionLaboral();
        }
        ?>"
		type="text" name="txtdirecempresa" disabled>                        
	</div>
	
	<div class="title11">Teléfono Empresa</div>
	<div class="title12">:</div> 
	<div class="resp6">
    	<input  class="inputStyle2"
        value="<?php
        
        if (isset($infoLaboral)) {
            echo $infoLaboral->gettelefonoEmpresainformacionLaboral();
        }
        ?>"
		type="text" name="txttlfempresa" disabled>                        
	</div>
	
	<div class="title11">Cargo</div>
	<div class="title12">:</div> 
	<div class="resp6">
    	<input  class="inputStyle2"
        value="<?php
        if (isset($infoLaboral)) {
            echo $infoLaboral->getcargoEmpresainformacionLaboral();
        }
        ?>"
		type="text" name="txtcargo" disabled>                        
	</div>
		 
		
	<div class="title11">Fecha Ingreso</div>
	<div class="title12">:</div> 
	<div class="resp6">
    	<input  class="inputStyle2"
        value="<?php
        if (isset($infoLaboral)) {
            echo $infoLaboral->getfechaIngresoEmpresainformacionLaboral();
        }
        
        ?>"
		type="date" name="txfingresoempresa" disabled>                        
	</div>	
		 
	<div class="title11">Area/Depto de trabajo</div>
	<div class="title12">:</div> 
	<div class="resp6">
    	<input  class="inputStyle2"
        value="<?php
        if (isset($infoLaboral)) {
            echo $infoLaboral->getareaDeptoEmpresainformacionLaboral();
        }
        ?>"
		type="text" name="txtareatrabajo" disabled>                        
	</div>
		
		
	<div class="title11">AFP</div>
	<div class="title12">:</div> 
	<div class="resp6">
    	<input  class="inputStyle2"
        value="<?php
        if (isset($infoLaboral)) {
            echo $infoLaboral->getafp_informacionLaboral();
        }
        ?>"
		type="text" name="txtafp" disabled>                        
	</div>
		
	<div class="title11">Profesión</div>
	<div class="title12">:</div> 
	<div class="resp6">
    	<input  class="inputStyle2"
        value="<?php
        if (isset($infoLaboral)) {
            echo $infoLaboral->getprofesion_informacionLaboral();
        }
        ?>"
		name="txtprofesion" disabled>                        
	</div>
	
	</div>	 
</div>

<br>
<br>
<br>


<div class = "contenedor">
	<div class="titulo">
		Información Medica <br>
	</div>
	
	<div id="informacionMedica1">
		
		
		<div class="title13">Prestación Médica</div>
        	<div class="title14">:</div> 
            	<div class="resp7">
                	<input  class="inputStyle2"
                    value="<?php echo $infoMedica1->getprestacionMedica_informacionMedica1();?>"
            		type="text" name="txtpresmedica" disabled>                        
		</div>
		
		<div class="title13">Alergias</div>
        	<div class="title14">:</div> 
            	<div class="resp7">
                	<input  class="inputStyle2"
                    value="<?php echo $infoMedica1->getalergias_informacionMedica1();?>"
					type="text" name="txtalergias" disabled>                        
		</div>
		
		<div class="title13">Enfermedades Crónicas</div>
        	<div class="title14">:</div> 
            	<div class="resp7">
                	<input  class="inputStyle2"
                    value="<?php echo $infoMedica1->getenfermedadesCronicasinformacionMedica1();?>"
					type="text" name="txtenfermedadescronicas" disabled>                        
		</div>
		
		<div class="title13">Medicamentos Habituales</div>
        	<div class="title14">:</div> 
            	<div class="resp7">
                	<input  class="inputStyle2"
                    value="<?php echo $infoMedica2->getmedicamentosHabitualesinformacionMedica2();?>"
					type="text" name="txtmedicamentosHabituales" disabled>                       
		</div>
		
		<div class="title13">Nombre del Contacto</div>
        	<div class="title14">:</div> 
            	<div class="resp7">
                	<input  class="inputStyle2"
                    value="<?php echo $infoMedica2->getnombreContactoinformacionMedica2();?>"
					type="text" name="txtnomContacto" disabled>                       
		</div>
		
		<div class="title13">Teléfono del Contacto</div>
        	<div class="title14">:</div> 
            	<div class="resp7">
                	<input  class="inputStyle2"
                    value="<?php echo $infoMedica2->gettelefonoContactoinformacionMedica2();?>"
					type="text" name="txttlfcontacto" disabled>                       
		</div>
	
		<div class="title13">Parentesco del Contacto</div>
        	<div class="title14">:</div> 
            	<div class="resp7">
                	<select class="inputStyle2" name="cboParentesco1" disabled>
                     <?php
                    require_once ("../model/Data.php");
                    require_once ("../model/Tbl_Parentesco.php");
                    $d = new Data();

                    $parentescos = $d->readParentescos();
                    foreach ($parentescos as $p => $parentesco) {
                        if ($infoMedica2->getfkParentescoContactoinformacionMedica2() == $parentesco->getIdParentesco()) {
                            ?>
                         		<option
								value="<?php echo $parentesco->getIdParentesco(); ?>" selected><?php echo utf8_encode($parentesco->getNombreParentesco()); ?></option>
                         		<?php
                        } else {
                            ?>
                           		<option
								value="<?php echo $parentesco->getIdParentesco(); ?>"><?php echo utf8_encode($parentesco->getNombreParentesco()); ?></option>
                           		<?php
                        }
                    }
                    ?>
                       <?php

                    ?>
                     </select>                       
		</div>
		
		<div class="title13">Nivel de Actividad Fisica</div>
        	<div class="title14">:</div> 
            	<div class="resp7">
                	<input class="inputStyle2" value="<?php echo $infoMedica2->getnivelActividadFisicainformacionMedica2();?>"
					type="text" name="txtactvfisica" disabled>                     
		</div>
		
		                    
		</div>
		
		<div id="informacionMedica2">
			<?php
            $donanteChequeado = "checked";
            $fumadorChequeado = "checked";
            if ($infoMedica2->getesDonanteinformacionMedica2() == FALSE) {
               $donanteChequeado = "";
             }
             if ($infoMedica2->getesFumadorinformacionMedica2() == FALSE) {
               $fumadorChequeado = "";
            }

          ?>
          
        <div class="title15">Donante</div>
        	<div class="title16">:</div> 
            	<div class="resp8">
                	<input class="inputStyle2" type="checkbox"                   
		            <?php echo $donanteChequeado;?> name="txtdonante" disabled>                     
		</div>
		
		<div class="title15">Fumador</div>
        	<div class="title16">:</div> 
            	<div class="resp8">
                	<input class="inputStyle2" type="checkbox" <?php echo $fumadorChequeado;?> name="txtfumador" disabled>                     
		</div>
		
		<div class="title15">Grupo Sanguineo</div>
        	<div class="title16">:</div> 
            	<div class="resp8">
                	<select class="inputStyle2"  name="cboGrupoSanguineo" disabled>
                     <?php
                    require_once ("../model/Data.php");
                    require_once ("../model/Tbl_GrupoSanguineo.php");
                    $d = new Data();

                    $grupos = $d->readGruposSanguineos();
                    foreach ($grupos as $g => $grupo) {

                        if ($infoMedica2->getfkGrupoSanguineoinformacionMedica2() == $grupo->getIdGrupoSanguineo()) {
                            ?>
                         <option
			value="<?php echo $grupo->getIdGrupoSanguineo(); ?>" selected><?php echo $grupo->getNombreGrupoSanguineo(); ?></option>
                         <?php
                        } else {
                            ?>
                           <option
			value="<?php echo $grupo->getIdGrupoSanguineo(); ?>"><?php echo $grupo->getNombreGrupoSanguineo(); ?></option>
                           <?php
                        }
                    }
                    ?>
                       <?php

                    ?>
                     </select>		
		</div>
	
	<!-- FIN DE DIV MEDICA -->
	</div> 	
</div>

<br>
<br>
<br>

<div class = "contenedor">
	<div class="titulo">
		Información Familiar <br>
	</div>

	<table  class="table">
		<thead>
			<tr>
				<th class="tableHead">Nombre</th>
				<th class="tableHead">Fecha de Nacimiento</th>
				<th class="tableHead">Parentesco</th>
			</tr>
		</thead>
		<tbody>
                         <?php
                        foreach ($infoFamiliar as $iFamiliar => $datos) {
                            ?>
                         <tr>
				<td  class="td"><?php echo $datos->getNombresInformacionFamiliar();?></td>
				<td  class="td"><?php
                            $fechaSinConvertir = $datos->getFechaNacimientoInformacionFamiliar();
                            $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));

                            echo $fechaConvertida;
                            ?></td>
				<td  class="td"><?php echo utf8_encode($d->buscarNombreParentescoPorId($datos->getfkParentescoinformacionFamiliar())->getNombreParentesco());?></td>
                      <?php
                        }
                        ?>
                         </tr>

		</tbody>
	</table>
</div>

<br>
<br>
<br>

<div class = "contenedor">
	<div class="titulo">
		Información Academica <br>
	</div>


	<table   cellspacing="1" cellpadding="4"   class="table">
		<thead>
			<tr>
				<th class="tableHead">Fecha</th>
				<th class="tableHead">Actividad</th>
				<th class="tableHead">Estado</th>
			</tr>
		</thead>
		<tbody>
                             <?php
                            foreach ($infoAcademica as $iAcademica => $datos) {
                                ?>
                             <tr>
				<td class="td"><?php echo $datos->getactividadInformacionAcademica();?></td>
				<td class="td"><?php
                                $fechaSinConvertir = $datos->getfechaInformacionAcademica();
                                $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                echo $fechaConvertida;
                                ?></td>
				<td class="td"><?php echo $d->buscarEstadoDeCursoPorId($datos->getfkEstadoCursoInformacionAcademica());?></td>
                          <?php
                            }
                            ?>
                             </tr>

		</tbody>
	</table>

</div>

<br>
<br>
<br>

<div class = "contenedor">
	<div class="titulo">
	Información Entrenamiento Estandar
		</div>

		<table  cellspacing="1" cellpadding="4"    class="table">
			<thead>
				<tr>
					<th class="tableHead">Fecha</th>
					<th class="tableHead">Actividad</th>
					<th class="tableHead">Estado</th>
				</tr>
			</thead>
			<tbody>
                               <?php
                            foreach ($infoEntrenamientoEstandar as $iEstandar => $datos) {
                                ?>
                               <tr>
					<td class="td"><?php echo $datos->getactividad();?></td>
					<td class="td"><?php
                                $fechaSinConvertir = $datos->getfechaEntrenamientoEstandar();
                                $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));

                                echo $fechaConvertida;
                                ?></td>
					<td class="td"><?php echo $d->buscarEstadoDeCursoPorId($datos->getFkEstadoCurso());?></td>
                            <?php
                            }
                            ?>
                               </tr>

			</tbody>
		</table>

	</div>

<br>
<br>
<br>


<div class = "contenedor">
	<div class="titulo">
		Información Histórica
		</div>

		<table   cellspacing="1" cellpadding="4"   class="table">
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
                               <?php
                            foreach ($infoHistorica as $iHistorica => $info) {
                                ?>
                            <tr>
					<td class="td"><?php echo utf8_encode($d->buscarNombreDeRegionPorId($info->getfkRegioninformacionHistorica()));   ?></td>
					<td class="td"><?php echo utf8_encode($info->getcuerpo());   ?></td>
					<td class="td"><?php echo $info->getcompania();  ?></td>
					<td class="td"><?php
                                $fechaSinConvertir = $info->getfechaDeCambio();
                                $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                echo $fechaConvertida;
                                ?></td>
					<td class="td"><?php echo $info->getPremio();   ?></td>
					<td class="td"><?php echo $info->getmotivo();   ?></td>
					<td class="td"><?php echo $info->getdetalle();   ?></td>
					<td class="td"><?php echo utf8_encode($info->getCargo());   ?></td>
				</tr>


                               <?php
                            }
                            ?>


                </tbody>
		</table>

	</div>