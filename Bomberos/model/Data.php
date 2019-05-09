<?php
require_once ("Conexion.php");
require_once ("Tbl_Usuario.php");
require_once ("Tbl_EstadoUnidad.php");
require_once ("Tbl_UnidadMedida.php");
require_once ("Tbl_TipoBodega.php");
require_once ("Tbl_UbicacionFisica.php");
require_once ("Tbl_MaterialMenor.php");
require_once ("Tbl_TipoVehiculo.php");
require_once ("Tbl_TipoUsuario.php");
require_once ("Tbl_EntidadACargo.php");
require_once ("Tbl_Estado.php");
require_once ("Tbl_EstadoBombero.php");
require_once ("Tbl_Genero.php");
require_once ("Tbl_EstadoCivil.php");
require_once ("Tbl_tipoMantencion.php");
require_once ("Tbl_tipoCombustible.php");
require_once ("Tbl_Unidad.php");
require_once ("Tbl_tipo_servicio.php");
require_once ("Tbl_InfoPersonal.php");
require_once ("Vista_BusquedaBombero.php");
require_once ("Tbl_Medida.php");
require_once ("Tbl_InfoBomberil.php");
require_once ("Tbl_InfoLaboral.php");
require_once ("Tbl_InfoMedica1.php");
require_once ("Tbl_InfoMedica2.php");
require_once ("Tbl_InfoFamiliar.php");
require_once ("Tbl_InfoAcademica.php");
require_once ("Tbl_EntrenamientoEstandar.php");
require_once ("Tbl_InfoHistorica.php");
require_once ("Tbl_Mantencion.php");
require_once ("Tbl_carguiCombustible.php");
require_once ("Tbl_MaterialMenor.php");
require_once ("Vista_BuscarMaterialMenor.php");
require_once ("VistaBusquedaDeUnidad.php");
require_once ("Tbl_EstadoMaterialMenor.php");
require_once ("Tbl_informacionDeCargos.php");
require_once ("Tbl_MaterialMenor.php");
require_once ("Tbl_sector.php");
require_once ("Tbl_oficial.php");
require_once ("Tbl_estadoOficial.php");
require_once ("Tbl_servicio.php");
require_once ("Tbl_servicio_unidad.php");
require_once ("ServicioYSector.php");
require_once ("Tbl_entidad_exterior.php");
require_once ("Tbl_apoyo.php");
require_once ("Tbl_Parentesco.php");
require_once ("OBACConductorNPersonal.php");
require_once ("VistaBomberoReporte.php");
require_once ("VistaUnidadReporte.php");
require_once ("VistaUnidadByFiltro.php");
require_once ("VistaCombustibleReporte.php");
require_once ("VistaInventarioReporte.php");
require_once ("VistaCargoByCompania.php");



class Data
{

    private $c;

    public function __construct()
    {
        $this->c = new Conexion("SIGED_BD", "root", "");
    }
    
    
    public function obtenerFecha(){
        date_default_timezone_set("Chile/Continental");
        setlocale(LC_TIME,"es_CL");
        
        $dia = date("d");
        $mesNum = date("M");
        $mesLetra = "";
        $año = date("Y");
        
        switch ($mesNum){
            case "Jan":
                $mesLetra = "Enero";
                break;
            case "Feb":
                $mesLetra = "Febrero";
                break;
            case "Mar":
                $mesLetra = "Marzo";
                break;
            case "Apr":
                $mesLetra = "Abril";
                break;
            case "May":
                $mesLetra = "Mayo";
                break;
            case "Jun":
                $mesLetra = "Junio";
                break;
            case "Jul":
                $mesLetra = "Julio";
                break;
            case "Aug":
                $mesLetra = "Agosto";
                break;
            case "Sep":
                $mesLetra = "Septiembre";
                break;
            case "Oct":
                $mesLetra = "Octubre";
                break;
            case "Nov":
                $mesLetra = "Noviembre";
                break;
            case "Dic":
                $mesLetra = "Diciembre";
                break;                
        }
        
        return $dia . ' de '.$mesLetra. ' '.$año; 
        
    }
    
    public function crearUsuario($usuario)
    {
        $insert = "insert into tbl_usuario
        values(null, '" . $usuario->getNombreUsuario() . "',
        '" . $usuario->getfkTipoUsuario() . "'," . $usuario->getPassUsuario() . ")";

        $this->c->conectar();
        $this->c->ejecutar($insert);
        $this->c->desconectar();
    }

    public function getUsuario($nombre, $pass)
    {
        $this->c->conectar();
        $query = "SELECT * from tbl_usuario where nombre_usuario_usuario = '$nombre' and contrasenia_usuario_usuario = '$pass' ";
        $rs = $this->c->ejecutar($query);
        if ($obj = $rs->fetch_object()) { // por cada vuelta, pongo el registro en un objeto y el objeto en una lista
            $u = new Tbl_Usuario();

            $u->setIdUsuario($obj->id_usuario_usuario);
            $u->setNombreUsuario($obj->nombre_usuario_usuario);
            $u->setfkTipoUsuario($obj->fk_tipo_usuario__usuario);
            $u->setPassUsuario($obj->contrasenia_usuario_usuario);
            // nombre debe ser igual a lo que muestro en la bd
        }
        $this->c->desconectar();
        return $u;
    }

    public function verificarSiUsuarioTienePermiso($usuario, $idPermiso)
    {
        $this->c->conectar();
        $query = "SELECT tbl_tipo_usuario_permisos.otorgado_tipo_usuario_permisos FROM
      tbl_tipo_usuario_permisos, tbl_permiso, tbl_tipo_usuario, tbl_usuario  WHERE
      tbl_tipo_usuario_permisos.fk_tipo_usuario_tipo_usuario_permisos=tbl_tipo_usuario.id_tipo_usuario AND
      tbl_tipo_usuario_permisos.fk_permiso_tipo_usuario_permisos=tbl_permiso.id_permiso AND
      tbl_tipo_usuario.id_tipo_usuario=tbl_usuario.fk_tipo_usuario__usuario AND tbl_permiso.id_permiso=" . $idPermiso . " AND
       tbl_usuario.id_usuario_usuario=" . $usuario->getIdUsuario() . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $valor = $reg[0];
        }
        $this->c->desconectar();
        return $valor;
    }

    public function getUnidades()
    {
        $lista = array();
        $this->c->conectar();

        $select = "SELECT * from tbl_estado_unidad;";
        $rs = $this->c->ejecutar($select);
        while ($obj = $rs->fetch_object()) {

            $eu = new Tbl_EstadoUnidad();

            $eu->setIdEstadoUnidad($obj->id_estado_unidad);
            $eu->setNombreEstadoUnidad($obj->nombre_estado_unidad);

            array_push($lista, $eu);
        }

        $this->c->desconectar();
        return $lista;
    }

    public function getVehiculos()
    {
        $lista = array();
        $this->c->conectar();
        $select = "SELECT * from tbl_tipo_vehiculo;";
        $rs = $this->c->ejecutar($select);
        while ($obj = $rs->fetch_object()) {

            $eu = new Tbl_TipoVehiculo();

            $eu->setIdTipoVehiculo($obj->id_tipo_vehiculo);
            $eu->setNombreTipoVehiculo($obj->nombre_tipo_vehiculo);

            array_push($lista, $eu);
        }

        $this->c->desconectar();
        return $lista;
    }

    public function getEntidadACargo()
    {
        $lista = array();
        $this->c->conectar();
        $select = "SELECT * from tbl_entidadACargo;";
        $rs = $this->c->ejecutar($select);
        while ($obj = $rs->fetch_object()) {
            $eu = new Tbl_EntidadACargo();
            $eu->setIdEntidadACargo($obj->id_entidadACargo);
            $eu->setNombreEntidadACargo($obj->nombre_entidadACargo);
            array_push($lista, $eu);
        }
        $this->c->desconectar();
        return $lista;
    }

    public function getEntidadACargoByID($id)
    {
        $nombreEntidad = "";
        $this->c->conectar();
        $select = "SELECT * from tbl_entidadACargo WHERE id_entidadACargo = " . $id;
        $rs = $this->c->ejecutar($select);
        while ($obj = $rs->fetch_object()) {
            $nombreEntidad = $obj->nombre_entidadACargo;
        }
        $this->c->desconectar();
        return $nombreEntidad;
    }

    public function readSoloCompanias()
    {
        $lista = array();
        $this->c->conectar();
        $select = "SELECT * FROM tbl_entidadACargo WHERE nombre_entidadACargo LIKE '%Compa%';";
        $rs = $this->c->ejecutar($select);

        while ($obj = $rs->fetch_object()) {
            $eu = new Tbl_EntidadACargo();
            $eu->setIdEntidadACargo($obj->id_entidadACargo);
            $eu->setNombreEntidadACargo($obj->nombre_entidadACargo);
            array_push($lista, $eu);
        }
        $this->c->desconectar();
        return $lista;
    }

    public function getPerfiles()
    {
        $lista = array();
        $this->c->conectar();
        $select = "SELECT * from tbl_tipo_usuario;";
        $rs = $this->c->ejecutar($select);
        while ($obj = $rs->fetch_object()) {

            $tu = new Tbl_TipoUsuario();

            $tu->setidTipoUsuario($obj->id_tipo_usuario);
            $tu->setnombreTipoUsuario($obj->nombre_tipo_usuario);

            array_push($lista, $tu);
        }
        $this->c->desconectar();
        return $lista;
    }

    public function crearMedida($medida)
    {
        $query = "CALL CRUDMedida (" . $medida->getIdMedida() . ", '" . $medida->getTallaChaquetaCamisa() . "', '" . $medida->getTallaPantalon() . "',
    '" . $medida->getTallaBuzo() . "', '" . $medida->getTallaCalzado() . "', 1);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearInformacionPersonalDeBombero($infoPersonalBombero)
    {
        $query = "CALL CRUDInformacionPersonal (1,'" . $infoPersonalBombero->getRutInformacionPersonal() . "','" . $infoPersonalBombero->getNombreInformacionPersonal() . "', '" . $infoPersonalBombero->getApellidoPaterno() . "', '" . $infoPersonalBombero->getApellidoMaterno() . "','" . $infoPersonalBombero->getFechaNacimiento() . "'," . $infoPersonalBombero->getFkEstadoCivil() . "
      ," . $infoPersonalBombero->getFkMedidaInformacionPersonal() . ",'" . $infoPersonalBombero->getAlturaEnMetros() . "','" . $infoPersonalBombero->getPeso() . "','" . $infoPersonalBombero->getEmail() . "',
      " . $infoPersonalBombero->getFkGenero() . ",'" . $infoPersonalBombero->getTelefonoFijo() . "','" . $infoPersonalBombero->getTelefonoMovil() . "','" . $infoPersonalBombero->getDireccionPersonal() . "','" . $infoPersonalBombero->getPertenecioABrigadaJuvenil() . "', '" . $infoPersonalBombero->getEsInstructor() . "',1);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearInformacionBomberil($infoBomberil)
    {
        $query = "CALL CRUDFichaInformacionBomberil (1," . $infoBomberil->getfkRegioninformacionBomberil() . ", '" . $infoBomberil->getcuerpoInformacionBomberil() . "', " . $infoBomberil->getfkCompaniainformacionBomberil() . ",
       " . $infoBomberil->getfkCargoinformacionBomberil() . ",'" . $infoBomberil->getfechaIngresoinformacionBomberil() . "', '" . $infoBomberil->getNRegGeneralinformacionBomberil() . "', " . $infoBomberil->getfkEstadoinformacionBomberil() . ",
      '" . $infoBomberil->getNRegCiainformacionBomberil() . "', " . $infoBomberil->getfkInfoPersonalinformacionBomberil() . ", 1);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearInformacionLaboral($infoLaboral)
    {
        $query = "CALL CRUDInformacionLaboral (1, '" . $infoLaboral->getnombreEmpresainformacionLaboral() . "', '" . $infoLaboral->getdireccionEmpresainformacionLaboral() . "', '" . $infoLaboral->gettelefonoEmpresainformacionLaboral() . "',
       '" . $infoLaboral->getcargoEmpresainformacionLaboral() . "','" . $infoLaboral->getfechaIngresoEmpresainformacionLaboral() . "', '" . $infoLaboral->getareaDeptoEmpresainformacionLaboral() . "', '" . $infoLaboral->getafp_informacionLaboral() . "',
      '" . $infoLaboral->getprofesion_informacionLaboral() . "', " . $infoLaboral->getfkInfoPersonalinformacionLaboral() . ", 1);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearInformacionMedica1($infoMedica1)
    {
        $query = "CALL CRUDInformacionMedica1 (1, '" . $infoMedica1->getprestacionMedica_informacionMedica1() . "', '" . $infoMedica1->getalergias_informacionMedica1() . "', '" . $infoMedica1->getenfermedadesCronicasinformacionMedica1() . "',
       " . $infoMedica1->getfkInfoPersonalinformacionMedica1() . ", 1);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearInformacionMedica2($infoMedica2)
    {
        $query = "CALL CRUDInformacionMedica2 (1, '" . $infoMedica2->getmedicamentosHabitualesinformacionMedica2() . "', '" . $infoMedica2->getnombreContactoinformacionMedica2() . "', '" . $infoMedica2->gettelefonoContactoinformacionMedica2() . "',
       " . $infoMedica2->getfkParentescoContactoinformacionMedica2() . ", '" . $infoMedica2->getnivelActividadFisicainformacionMedica2() . "', '" . $infoMedica2->getesDonanteinformacionMedica2() . "', '" . $infoMedica2->getesFumadorinformacionMedica2() . "',
       " . $infoMedica2->getfkGrupoSanguineoinformacionMedica2() . ", " . $infoMedica2->getfkInfoPersonalinformacionMedica2() . ", 1);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearInformacionFamiliar($infoFamiliar)
    {
        $query = "CALL CRUDInformacionFamiliar (1, '" . $infoFamiliar->getNombresInformacionFamiliar() . "', '" . $infoFamiliar->getFechaNacimientoInformacionFamiliar() . "', " . $infoFamiliar->getfkParentescoinformacionFamiliar() . ",
       " . $infoFamiliar->getfkInfoPersonalinformacionFamiliar() . ",  1);";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearInformacionAcademica($infoAcademica)
    {
        $query = "CALL CRUDInformacionAcademica (1, '" . $infoAcademica->getfechaInformacionAcademica() . "', '" . $infoAcademica->getactividadInformacionAcademica() . "', " . $infoAcademica->getfkEstadoCursoInformacionAcademica() . ",
       " . $infoAcademica->getfkInformacionPersonalInformacionAcademica() . ", 1);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearInformacionEntrenamientoEstandar($infoEntrenamientoEstandar)
    {
        $query = "CALL CRUDInformacionEntrenamientoEstandar (1, '" . $infoEntrenamientoEstandar->getfechaEntrenamientoEstandar() . "', '" . $infoEntrenamientoEstandar->getactividad() . "', " . $infoEntrenamientoEstandar->getFkEstadoCurso() . ",
       " . $infoEntrenamientoEstandar->getFkInformacionPersonal() . ", 1);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearInformacionHistorica($infoHistorica)
    {
        $query = "CALL CRUDInformacionHistorica (1, " . $infoHistorica->getfkRegioninformacionHistorica() . ", '" . $infoHistorica->getcuerpo() . "', '" . $infoHistorica->getcompania() . "',
       '" . $infoHistorica->getfechaDeCambio() . "', '" . $infoHistorica->getPremio() . "', '" . $infoHistorica->getmotivo() . "', '" . $infoHistorica->getdetalle() . "', '" . $infoHistorica->getCargo() . "'  , " . $infoHistorica->getfkInfoPersonalinformacionHistorica() . ", 1);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearInformacionCargos($infoCargos)
    {
        $query = "INSERT INTO tbl_informacionDeCargos VALUES (NULL, " . $infoCargos->getFk_materialMenorAsignado_informacionDeCargos() . "," . $infoCargos->getCantidadAsignada_informacionDeCargos() . "," . $infoCargos->getFk_personal_informacionDeCargos() . "," . $infoCargos->getFechaEntrega() . ");";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearUnidades($unidad)
    {
        $query = "insert into tbl_unidad values(null,
                '" . $unidad->getNombreUnidad() . "',
                '" . $unidad->getaniodeFabricacion() . "',
                '" . $unidad->getMarca() . "',
                '" . $unidad->getNmotor() . "',
                '" . $unidad->getNchasis() . "',
                '" . $unidad->getNVIN() . "',
                '" . $unidad->getColor() . "',
                '" . $unidad->getPPu() . "',
                '" . $unidad->getfechaInscripcion() . "',
                '" . $unidad->getfechaAdquisicion() . "',
                " . $unidad->getcapacidadOcupantes() . ",
                " . $unidad->getfkEstadoUnidad() . ",
                " . $unidad->getfkTipoVehiculo() . ",
                " . $unidad->getfkEntidadPropietaria() . ");";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearMantencion($mantencion)
    {
        $query = "insert into tbl_mantencion values(null,
                " . $mantencion->getFk_tipo_mantencion() . ",
                '" . $mantencion->getFecha_mantencion() . "',
                '" . $mantencion->getResponsable_mantencion() . "',
                '" . $mantencion->getDireccion_mantencion() . "',
                '" . $mantencion->getComentarios_mantencion() . "',
                " . $mantencion->getFk_unidad() . ");";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function crearCargaDeCombustible($carga)
    {
        $query = "insert into tbl_cargio_combustible values(null,
                '" . $carga->getResponsable_cargio_combustible() . "',
                '" . $carga->getFecha_cargio() . "',
                '" . $carga->getDireccion_cargio() . "',
                " . $carga->getFk_tipo_combustible_cargio_combustible() . ",
                " . $carga->getCantidad_litros_cargio_combustible() . ",
                " . $carga->getPrecio_litro_cargio_combustible() . ",
                '" . $carga->getObservacion_cargio_combustible() . "',
                " . $carga->getFk_unidad() . ");";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function readEstadosCiviles()
    {
        $this->c->conectar();

        $query = "SELECT * FROM tbl_estado_civil;";
        $rs = $this->c->ejecutar($query);

        $listadoEstadosCiviles = array();

        while ($reg = $rs->fetch_array()) {

            $id = $reg[0];
            $nombre = $reg[1];
            $estadoCivil = new Tbl_EstadoCivil();
            $estadoCivil->setIdEstadoCivil($id);
            $estadoCivil->setNombreEstadoCivil($nombre);
            $listadoEstadosCiviles[] = $estadoCivil;
        }

        $this->c->desconectar();
        return $listadoEstadosCiviles;
    }

    public function readGeneros()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_genero;";
        $rs = $this->c->ejecutar($query);
        $listadoGeneros = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $genero = new Tbl_Genero();
            $genero->setIdGenero($id);
            $genero->setNombreGenero($nombre);
            $listadoGeneros[] = $genero;
        }
        $this->c->desconectar();
        return $listadoGeneros;
    }

    public function readCargos()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_cargo ORDER BY id_cargo DESC;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $cargo = new Tbl_Cargo();
            $cargo->setIdCargo($id);
            $cargo->setNombreCargo($nombre);
            $listado[] = $cargo;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function readEstadosDeBomberos()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_estadoBombero;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $obj = new Tbl_EstadoBombero();
            $obj->setIdEstado($id);
            $obj->setNombreEstado($nombre);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function readRegiones()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_region;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $obj = new Tbl_Region();
            $obj->setIdRegion($id);
            $obj->setNombreRegion($nombre);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function readGruposSanguineos()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_grupo_sanguineo;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $obj = new Tbl_GrupoSanguineo();
            $obj->setIdGrupoSanguineo($id);
            $obj->setNombreGrupoSanguineo($nombre);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function readParentescos()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_parentesco;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $obj = new Tbl_Parentesco();
            $obj->setIdParentesco($id);
            $obj->setNombreParentesco($nombre);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function readEstadosCurso()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_estado_curso;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $obj = new Tbl_EstadoCurso();
            $obj->setIdEstadoCurso($id);
            $obj->setNombreEstadoCurso($nombre);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function readTiposDeMantencion()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_tipoDeMantencion;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $obj = new Tbl_tipoMantencion();
            $obj->setId_tipo_de_mantencion($id);
            $obj->setNombre_tipoDeMantencion($nombre);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function readTiposDeCombustibles()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_tipo_combustible;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $obj = new Tbl_tipo_combustible();
            $obj->setId_tipo_combustible($id);
            $obj->setNombre_tipo_combustible($nombre);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function readUnidadesVehiculos()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_unidad;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $aniodeFabricacion = $reg[2];
            $marca = $reg[3];
            $Nmotor = $reg[4];
            $Nchasis = $reg[5];
            $NVIN = $reg[6];
            $Color = $reg[7];
            $PPu = $reg[8];
            $fechaInscripcion = $reg[9];
            $fechaAdquisicion = $reg[10];
            $capacidadOcupantes = $reg[11];
            $fkEstadoUnidad = $reg[12];
            $fkTipoVehiculo = $reg[13];
            $fkEntidadPropietaria = $reg[14];

            $obj = new Tbl_Unidad();
            $obj->setIdUnidad($id);
            $obj->setNombreUnidad($nombre);
            $obj->setaniodeFabricacion($aniodeFabricacion);
            $obj->setMarca($marca);
            $obj->setNmotor($Nmotor);
            $obj->setNchasis($Nchasis);
            $obj->setNVIN($NVIN);
            $obj->setColor($Color);
            $obj->setPPu($PPu);
            $obj->setfechaInscripcion($fechaInscripcion);
            $obj->setfechaAdquisicion($fechaAdquisicion);
            $obj->setcapacidadOcupantes($capacidadOcupantes);
            $obj->setfkEstadoUnidad($fkEstadoUnidad);
            $obj->setfkTipoVehiculo($fkTipoVehiculo);
            $obj->setfkEntidadPropietaria($fkEntidadPropietaria);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getUnidadVehiculoPorId($id)
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_unidad WHERE id_unidad=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        echo $query;

        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $aniodeFabricacion = $reg[2];
            $marca = $reg[3];
            $Nmotor = $reg[4];
            $Nchasis = $reg[5];
            $NVIN = $reg[6];
            $Color = $reg[7];
            $PPu = $reg[8];
            $fechaInscripcion = $reg[9];
            $fechaAdquisicion = $reg[10];
            $capacidadOcupantes = $reg[11];
            $fkEstadoUnidad = $reg[12];
            $fkTipoVehiculo = $reg[13];
            $fkEntidadPropietaria = $reg[14];

            $obj = new Tbl_Unidad();
            $obj->setIdUnidad($id);
            $obj->setNombreUnidad($nombre);
            $obj->setaniodeFabricacion($aniodeFabricacion);
            $obj->setMarca($marca);
            $obj->setNmotor($Nmotor);
            $obj->setNchasis($Nchasis);
            $obj->setNVIN($NVIN);
            $obj->setColor($Color);
            $obj->setPPu($PPu);
            $obj->setfechaInscripcion($fechaInscripcion);
            $obj->setfechaAdquisicion($fechaAdquisicion);
            $obj->setcapacidadOcupantes($capacidadOcupantes);
            $obj->setfkEstadoUnidad($fkEstadoUnidad);
            $obj->setfkTipoVehiculo($fkTipoVehiculo);
            $obj->setfkEntidadPropietaria($fkEntidadPropietaria);
        }
        $this->c->desconectar();
        return $obj;
    }

    public function readTiposDeServicios()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_tipo_servicio;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $codigo = $reg[2];
            $obj = new Tbl_tipo_servicio();
            $obj->setId_tipo_servicio($id);
            $obj->setCodigo_tipo_servicio($nombre);
            $obj->setNombre_tipo_servicio($codigo);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function readInformacionPersonalBomberos()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_informacionPersonal;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $idInformacionPersonal = $reg[0];
            $rutInformacionPersonal = $reg[1];
            $nombreInformacionPersonal = $reg[2];
            $apellidoPaterno = $reg[3];
            $apellidoMaterno = $reg[4];
            $fechaNacimiento = $reg[5];
            $fkEstadoCivil = $reg[6];
            $fkMedidaInformacionPersonal = $reg[7];
            $AlturaEnMetros = $reg[8];
            $Peso = $reg[9];
            $Email = $reg[10];
            $fkGenero = $reg[11];
            $TelefonoFijo = $reg[12];
            $TelefonoMovil = $reg[13];
            $DireccionPersonal = $reg[14];
            $PertenecioABrigadaJuvenil = $reg[15];
            $EsInstructor = $reg[16];

            $obj = new Tbl_InfoPersonal();
            $obj->setIdInfoPersonal($idInformacionPersonal);
            $obj->setRutInformacionPersonal($rutInformacionPersonal);
            $obj->setNombreInformacionPersonal($nombreInformacionPersonal);
            $obj->setApellidoPaterno($apellidoPaterno);
            $obj->setApellidoMaterno($apellidoMaterno);
            $obj->setFechaNacimiento($fechaNacimiento);
            $obj->setFkEstadoCivil($fkEstadoCivil);
            $obj->setFkMedidaInformacionPersonal($fkMedidaInformacionPersonal);
            $obj->setAlturaEnMetros($AlturaEnMetros);
            $obj->setPeso($Peso);
            $obj->setEmail($Email);
            $obj->setFkGenero($fkGenero);
            $obj->setTelefonoFijo($TelefonoFijo);
            $obj->setTelefonoMovil($TelefonoMovil);
            $obj->setDireccionPersonal($DireccionPersonal);
            $obj->setPertenecioABrigadaJuvenil($PertenecioABrigadaJuvenil);
            $obj->setEsInstructor($EsInstructor);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function mostrarBomberos()
    {
        $this->c->conectar();
        $query = "SELECT * FROM mostrarbomberosreporte";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $registro = $reg[0];
            $compania = $reg[1];
            $rut = $reg[2];
            $nombre = $reg[3];
            $apellido = $reg[4];
            $fechaIngreso = $reg[5];
            $fechaNacimiento = $reg[6];
            $tipoVoluntario = $reg[7];
            $telefono = $reg[8];
            $email = $reg[9];

            $obj = new VistaBomberoReporte();

            $obj->setRegistro($registro);
            $obj->setCompania($compania);
            $obj->setRut($rut);
            $obj->setNombre($nombre);
            $obj->setApellido($apellido);
            $obj->setFechaIngreso($fechaIngreso);
            $obj->setFechaNacimiento($fechaNacimiento);
            $obj->setTipoVoluntario($tipoVoluntario);
            $obj->setTelefono($telefono);
            $obj->setEmail($email);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function mostrarUnidadesReporte()
    {
        $this->c->conectar();
        $query = "SELECT * FROM mostrarUnidades";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $codigoUnidad = $reg[0];
            $compania = $reg[1];
            $chasis = $reg[2];
            $tipoUnidad = $reg[3];
            $fechaRegistro = $reg[4];

            $obj = new VistaUnidadReporte();

            $obj->setCodigoUnidad($codigoUnidad);
            $obj->setCompania($compania);
            $obj->setChasis($chasis);
            $obj->setTipoUnidad($tipoUnidad);
            $obj->setFechaRegistro($fechaRegistro);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getUnidadesParaReporteByUnidad($idUnidad)
    {
        $this->c->conectar();
        $query = "SELECT
                    tbl_unidad.nombre_unidad AS 'Codigo Unidad',
                    tbl_entidadacargo.nombre_entidadACargo AS 'Compañia',
                    tbl_tipo_vehiculo.nombre_tipo_vehiculo AS 'Tipo Unidad',
                    tbl_tipodemantencion.nombre_tipoDeMantencion AS 'Tipo Mantencion',
                    DATE_FORMAT(tbl_mantencion.fecha_mantencion , '%d/%m/%Y') AS 'Fecha Mantencion',
                    tbl_mantencion.comentarios_mantencion AS 'Detalle Mantencion'
                  FROM
                    tbl_unidad,
                    tbl_entidadacargo,
                    tbl_tipo_vehiculo,
                    tbl_tipodemantencion,
                    tbl_mantencion
                  WHERE
                    tbl_mantencion.fk_tipo_mantencion = tbl_tipoDeMantencion.id_tipo_de_mantencion AND
                    tbl_mantencion.fk_unidad = tbl_unidad.id_unidad AND
                    tbl_unidad.fk_tipo_vehiculo_unidad = tbl_tipo_vehiculo.id_tipo_vehiculo AND
                    tbl_unidad.fk_entidadACargo = tbl_entidadacargo.id_entidadACargo AND
                    tbl_unidad.id_unidad=" . $idUnidad . ";";

        $rs = $this->c->ejecutar($query);
        $listado = array();

        while ($reg = $rs->fetch_array()) {
            $codigoUnidad = $reg[0];
            $compania = $reg[1];
            $tipoUnidad = $reg[2];
            $tipoMantencion = $reg[3];
            $fechaMantencion = $reg[4];
            $detalleMantencion = $reg[5];

            $obj = new VistaUnidadByFiltro();

            $obj->setCodigoUnidad($codigoUnidad);
            $obj->setCompania($compania);
            $obj->setTipoUnidad($tipoUnidad);
            $obj->setTipoMantencion($tipoMantencion);
            $obj->setFechaMantencion($fechaMantencion);
            $obj->setDetalleMantencion($detalleMantencion);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }
    
    public function getUnidadesParaReporteByCompania($idCompania)
    {
        $this->c->conectar();
        $query = "SELECT 
                    tbl_unidad.nombre_unidad AS 'Codigo Unidad', 
                    tbl_entidadacargo.nombre_entidadACargo AS 'Compañia', 
                    tbl_tipo_vehiculo.nombre_tipo_vehiculo AS 'Tipo Unidad', 
                    tbl_tipodemantencion.nombre_tipoDeMantencion AS 'Tipo Mantencion', 
                    DATE_FORMAT(tbl_mantencion.fecha_mantencion , '%d/%m/%Y') AS 'Fecha Mantencion',
                    tbl_mantencion.comentarios_mantencion AS 'Detalle Mantencion'
                  FROM 
                    tbl_unidad, 
                    tbl_entidadacargo, 
                    tbl_tipo_vehiculo,
                    tbl_tipodemantencion, 
                    tbl_mantencion
                  WHERE
                    tbl_mantencion.fk_tipo_mantencion = tbl_tipoDeMantencion.id_tipo_de_mantencion AND
                    tbl_mantencion.fk_unidad = tbl_unidad.id_unidad AND
                    tbl_unidad.fk_tipo_vehiculo_unidad = tbl_tipo_vehiculo.id_tipo_vehiculo AND
                    tbl_unidad.fk_entidadACargo = tbl_entidadacargo.id_entidadACargo AND
                    tbl_entidadacargo.id_entidadACargo = " . $idCompania . ";";
        
        echo $query;
        
        $rs = $this->c->ejecutar($query);
        $listado = array();
        
        while ($reg = $rs->fetch_array()) {
            $codigoUnidad = $reg[0];
            $compania = $reg[1];
            $tipoUnidad = $reg[2];
            $tipoMantencion = $reg[3];
            $fechaMantencion = $reg[4];
            $detalleMantencion = $reg[5];
            
            $obj = new VistaUnidadByFiltro();
            
            $obj->setCodigoUnidad($codigoUnidad);
            $obj->setCompania($compania);
            $obj->setTipoUnidad($tipoUnidad);
            $obj->setTipoMantencion($tipoMantencion);
            $obj->setFechaMantencion($fechaMantencion);
            $obj->setDetalleMantencion($detalleMantencion);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }
    
    public function getUnidadesCombustibleParaReporteByUnidad($idUnidad)
    {
        $this->c->conectar();
        $query = "SELECT 
                    tbl_unidad.nombre_unidad AS 'Codigo Unidad', 
                    tbl_entidadacargo.nombre_entidadACargo AS 'Compañia', 
                    tbl_tipo_vehiculo.nombre_tipo_vehiculo AS 'Tipo Unidad', 
                    DATE_FORMAT(tbl_cargio_combustible.fecha_cargio  , '%d/%m/%Y') AS 'Fecha Cargo Combustible',
                    tbl_cargio_combustible.cantidad_litros_cargio_combustible AS 'Litros', 
                    tbl_cargio_combustible.responsable_cargio_combustible AS 'Responsable'
                  FROM 
                    tbl_unidad,
                    tbl_entidadacargo, 
                    tbl_tipo_vehiculo, 
                    tbl_cargio_combustible
                  WHERE
                    tbl_unidad.fk_tipo_vehiculo_unidad = tbl_tipo_vehiculo.id_tipo_vehiculo AND
                    tbl_unidad.fk_entidadACargo = tbl_entidadacargo.id_entidadACargo AND
                    tbl_cargio_combustible.fk_unidad = tbl_unidad.id_unidad AND
                    tbl_unidad.id_unidad = " . $idUnidad . ";";
        
        echo $query;
        
        $rs = $this->c->ejecutar($query);
        $listado = array();
        
        while ($reg = $rs->fetch_array()) {
            $codigoUnidad = $reg[0];
            $compania = $reg[1];
            $tipoUnidad = $reg[2];
            $fechaCargo = $reg[3];
            $litros = $reg[4];
            $responsable = $reg[5];
            
            $obj = new VistaCombustibleReporte();
            
            $obj->setCodigoUnidad($codigoUnidad);
            $obj->setCompania($compania);
            $obj->setTipoUnidad($tipoUnidad);
            $obj->setFechaCargo($fechaCargo);
            $obj->setLitros($litros);
            $obj->setResponsable($responsable);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }
    
    public function getUnidadesCombustibleParaReporteByCompania($idCompania)
    {
        $this->c->conectar();
        $query = "SELECT 
                    tbl_unidad.nombre_unidad AS 'Codigo Unidad', 
                    tbl_entidadacargo.nombre_entidadACargo AS 'Compañia', 
                    tbl_tipo_vehiculo.nombre_tipo_vehiculo AS 'Tipo Unidad', 
                    DATE_FORMAT(tbl_cargio_combustible.fecha_cargio  , '%d/%m/%Y') AS 'Fecha Cargo Combustible',
                    tbl_cargio_combustible.cantidad_litros_cargio_combustible AS 'Litros', 
                    tbl_cargio_combustible.responsable_cargio_combustible AS 'Responsable'
                  FROM 
                    tbl_unidad,
                    tbl_entidadacargo, 
                    tbl_tipo_vehiculo, 
                    tbl_cargio_combustible
                  WHERE
                    tbl_unidad.fk_tipo_vehiculo_unidad = tbl_tipo_vehiculo.id_tipo_vehiculo AND
                    tbl_unidad.fk_entidadACargo = tbl_entidadacargo.id_entidadACargo AND
                    tbl_cargio_combustible.fk_unidad = tbl_unidad.id_unidad AND
                    tbl_entidadacargo.id_entidadACargo = " . $idCompania . ";";
        
        echo $query;
        
        $rs = $this->c->ejecutar($query);
        $listado = array();
        
        while ($reg = $rs->fetch_array()) {
            $codigoUnidad = $reg[0];
            $compania = $reg[1];
            $tipoUnidad = $reg[2];
            $fechaCargo = $reg[3];
            $litros = $reg[4];
            $responsable = $reg[5];
            
            $obj = new VistaCombustibleReporte();
            
            $obj->setCodigoUnidad($codigoUnidad);
            $obj->setCompania($compania);
            $obj->setTipoUnidad($tipoUnidad);
            $obj->setFechaCargo($fechaCargo);
            $obj->setLitros($litros);
            $obj->setResponsable($responsable);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }
    
    public function llenarTablaParaInventario(){
        $this->c->conectar();
        $query = "CALL cargarDatosParaInventario();";
        
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }
    
    public function getInventarioByFiltro($filtro)
    {   
        $this->c->conectar();
        $query = "SELECT * FROM tbl_mostrarInventario".$filtro;
        
        $rs = $this->c->ejecutar($query);
        $listado = array();
        
        while ($reg = $rs->fetch_array()) {
            $material = $reg[1];
            $compania = $reg[2];
            $bodega = $reg[3];
            $cantidad = $reg[4];
            $marca = $reg[5];
            $descripcion = $reg[6];
            $estado = $reg[7];
            
            $obj = new VistaInventarioReporte();
            
            $obj->setMaterial($material);
            $obj->setCompania($compania);
            $obj->setBodega($bodega);
            $obj->setCantidad($cantidad);
            $obj->setMarca($marca);
            $obj->setDescripcion($descripcion);
            $obj->setEstado($estado);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
        
    }
    
    public function getCargosParaReporteByCompania($nomCompania)
    {
        $this->c->conectar();
        $query = "SELECT 
                    tbl_material_menor.nombre_material_menor AS 'Material', 
                    tbl_entidadacargo.nombre_entidadACargo AS 'Compañia', 
                    tbl_informacionpersonal.nombre_informacionPersonal AS 'Nombre', 
                    concat_ws(' ',tbl_informacionpersonal.apellido_paterno_informacionPersonal ,tbl_informacionpersonal.apellido_materno_informacionPersonal) AS 'Apellido',
                    tbl_informaciondecargos.cantidadAsignada_informacionDeCargos AS 'Cantidad', 
                    tbl_material_menor.detalle_material_menor AS 'Descripcion',
                    DATE_FORMAT(tbl_informaciondecargos.fechaEntrega  , '%d/%m/%Y') AS 'Fecha'
                  FROM 
                    tbl_material_menor, 
                    tbl_entidadacargo,
                    tbl_informacionpersonal, 
                    tbl_informaciondecargos,
                    tbl_informacionbomberil
                  WHERE
                    tbl_informaciondecargos.fk_materialMenorAsignado_informacionDeCargos = tbl_material_menor.id_material_menor
                    AND tbl_informaciondecargos.fk_personal_informacionDeCargos = tbl_informacionPersonal.id_informacionPersonal
                    AND tbl_informacionpersonal.id_informacionPersonal = tbl_informacionbomberil.fk_informacion_personal__informacionBomberil
                    AND tbl_informacionbomberil.fk_id_entidadACargo_informacionBomberil = tbl_entidadACargo.id_entidadACargo
                  AND tbl_entidadacargo.nombre_entidadACargo LIKE '$nomCompania'";
        
        $rs = $this->c->ejecutar($query);
        $listado = array();
        
        while ($reg = $rs->fetch_array()) {
            
            $material = $reg[0];
            $compania = $reg[1];
            $nombre = $reg[2];
            $apellido = $reg[3];
            $bombero = $nombre . " ". $apellido;
            $cantidad = $reg[4];
            $descripcion = $reg[5];
            $fechaEntrega = $reg[6];
            
            $obj = new VistaCargoByCompania();
            
            $obj->setMaterial($material);
            $obj->setCompania($compania);
            $obj->setBombero($bombero);
            $obj->setCantidad($cantidad);
            $obj->setDescripcion($descripcion);
            $obj->setFechaEntrega($fechaEntrega);
            
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

        
    
    public function getIdBomberoMasReciente()
    {
        $this->c->conectar();
        $query = "SELECT MAX(id_informacionPersonal) FROM tbl_informacionPersonal;";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
        }
        $this->c->desconectar();
        return $id;
    }

    public function getNombreBomberoPorId($id)
    {
        $this->c->conectar();
        $query = "SELECT nombre_informacionPersonal FROM tbl_informacionPersonal WHERE id_informacionPersonal=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
        }
        $this->c->desconectar();
        return $id;
    }

    public function getNombreCargoPorId($id)
    {
        $this->c->conectar();
        $query = "SELECT nombre_cargo FROM tbl_cargo WHERE id_cargo=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
        }
        $this->c->desconectar();
        return $id;
    }

    public function buscarInformacionDeBomberoByNombre($nombre)
    {
        $this->c->conectar();

        $anexoAQuery = "AND tbl_informacionPersonal.nombre_informacionPersonal LIKE '%" . $nombre . "%';";

        $query = "SELECT tbl_informacionPersonal.rut_informacionPersonal, tbl_informacionPersonal.nombre_informacionPersonal,
  tbl_informacionPersonal.apellido_paterno_informacionPersonal, tbl_entidadACargo.nombre_entidadACargo,
  tbl_informacionPersonal.id_informacionPersonal FROM tbl_informacionPersonal, tbl_informacionBomberil, tbl_entidadACargo
  WHERE tbl_informacionBomberil.fk_id_entidadACargo_informacionBomberil=tbl_entidadACargo.id_entidadACargo AND
  tbl_informacionPersonal.id_informacionPersonal=tbl_informacionBomberil.fk_informacion_personal__informacionBomberil " . $anexoAQuery;

        echo $query;

        $rs = $this->c->ejecutar($query);
        $listado = array();

        while ($reg = $rs->fetch_array()) {
            $rut = $reg[0];
            $nombre = $reg[1];
            $apellidoPaterno = $reg[2];
            $compania = $reg[3];
            $id = $reg[4];
            $obj = new Vista_BusquedaBombero();
            $obj->setRut($rut);
            $obj->setNombre($nombre);
            $obj->setApellidoPaterno($apellidoPaterno);
            $obj->setCompania($compania);
            $obj->setIdInfoPersonal($id);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function buscarInformacionDeBomberoParaTabla($nombre, $id, $tipoDeBusqueda)
    {
        $this->c->conectar();

        if ($tipoDeBusqueda == 1) {
            $anexoAQuery = "AND
    tbl_informacionPersonal.nombre_informacionPersonal LIKE '%" . $nombre . "%';";
        } else if ($tipoDeBusqueda == 2) {
            $anexoAQuery = "AND
      tbl_informacionBomberil.fk_estado_informacionBomberil =" . $id . " ;";
        } else if ($tipoDeBusqueda == 3) {
            $anexoAQuery = "AND
        tbl_entidadACargo.id_entidadACargo =" . $id . " ;";
        }

        $query = "SELECT tbl_informacionPersonal.rut_informacionPersonal, tbl_informacionPersonal.nombre_informacionPersonal,
  tbl_informacionPersonal.apellido_paterno_informacionPersonal, tbl_entidadACargo.nombre_entidadACargo,
  tbl_informacionPersonal.id_informacionPersonal FROM tbl_informacionPersonal, tbl_informacionBomberil, tbl_entidadACargo
  WHERE tbl_informacionBomberil.fk_id_entidadACargo_informacionBomberil=tbl_entidadACargo.id_entidadACargo AND
  tbl_informacionPersonal.id_informacionPersonal=tbl_informacionBomberil.fk_informacion_personal__informacionBomberil " . $anexoAQuery;

        echo $query;

        $rs = $this->c->ejecutar($query);
        $listado = array();

        while ($reg = $rs->fetch_array()) {
            $rut = $reg[0];
            $nombre = $reg[1];
            $apellidoPaterno = $reg[2];
            $compania = $reg[3];
            $id = $reg[4];
            $obj = new Vista_BusquedaBombero();
            $obj->setRut($rut);
            $obj->setNombre($nombre);
            $obj->setApellidoPaterno($apellidoPaterno);
            $obj->setCompania($compania);
            $obj->setIdInfoPersonal($id);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getInfoPersonal($idABuscar)
    {
        $this->c->conectar();
        $query = "CALL CRUDInformacionPersonal (" . $idABuscar . ",'20898088-2','Marcelo', 'Aranda', 'Tatto','1991-12-16',1,1,'1,70','80,2','cheloz_20@hotmail.com',
1,'123123123123','958677107','Carretera El Cobre','No sabe', 'Creo que no', 2);";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {

            $infoPersonal = new Tbl_InfoPersonal();
            $infoPersonal->setIdInfoPersonal($reg[0]);
            $infoPersonal->setRutInformacionPersonal($reg[1]);
            $infoPersonal->setNombreInformacionPersonal($reg[2]);
            $infoPersonal->setApellidoPaterno($reg[3]);
            $infoPersonal->setApellidoMaterno($reg[4]);
            $infoPersonal->setFechaNacimiento($reg[5]);
            $infoPersonal->setFkEstadoCivil($reg[6]);
            $infoPersonal->setFkMedidaInformacionPersonal($reg[7]);
            $infoPersonal->setAlturaEnMetros($reg[8]);
            $infoPersonal->setPeso($reg[9]);
            $infoPersonal->setEmail($reg[10]);
            $infoPersonal->setFkGenero($reg[11]);
            $infoPersonal->setTelefonoFijo($reg[12]);
            $infoPersonal->setTelefonoMovil($reg[13]);
            $infoPersonal->setDireccionPersonal($reg[14]);
            $infoPersonal->setPertenecioABrigadaJuvenil($reg[15]);
            $infoPersonal->setEsInstructor($reg[16]);
        }
        $this->c->desconectar();
        return $infoPersonal;
    }

    public function getInfoMedidas($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT tbl_medida.id_medida, tbl_medida.talla_de_chaqueta_camisa_medida, tbl_medida.talla_de_pantalon_medida, tbl_medida.talla_de_buzo_medida, tbl_medida.talla_de_calzado_medida FROM tbl_medida, tbl_informacionPersonal WHERE tbl_informacionPersonal.fk_medida_informacionPersonal=tbl_medida.id_medida
AND tbl_informacionPersonal.id_informacionPersonal=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $info = new Tbl_Medida();
            $info->setIdMedida($reg[0]);
            $info->setTallaChaquetaCamisa($reg[1]);
            $info->setTallaPantalon($reg[2]);
            $info->setTallaBuzo($reg[3]);
            $info->setTallaCalzado($reg[4]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function getInfoBomberil($idABuscar)
    {
        $this->c->conectar();
        $query = "CALL CRUDFichaInformacionBomberil(1,1,'Machali',2,1,'2001-12-16',1,1,1," . $idABuscar . ",2);";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {
            $info = new Tbl_InfoBomberil();
            $info->setIdInformacionBomberil($reg[0]);
            $info->setfkRegioninformacionBomberil($reg[1]);
            $info->setcuerpoInformacionBomberil($reg[2]);
            $info->setfkCompaniainformacionBomberil($reg[3]);
            $info->setfkCargoinformacionBomberil($reg[4]);
            $info->setfechaIngresoinformacionBomberil($reg[5]);
            $info->setNRegGeneralinformacionBomberil($reg[6]);
            $info->setfkEstadoinformacionBomberil($reg[7]);
            $info->setNRegCiainformacionBomberil($reg[8]);
            $info->setfkInfoPersonalinformacionBomberil($reg[9]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function getInfoLaboral($idABuscar)
    {
        $this->c->conectar();
        $query = "CALL CRUDInformacionLaboral (1,'Acquiried','algun lado','598677','empleado','2018-08-12','ciencias','masvida','ingeniero', " . $idABuscar . ", 2);";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {
            $info = new Tbl_InfoLaboral();
            $info->setIdidInformacionLaboral($reg[0]);
            $info->setnombreEmpresainformacionLaboral($reg[1]);
            $info->setdireccionEmpresainformacionLaboral($reg[2]);
            $info->settelefonoEmpresainformacionLaboral($reg[3]);
            $info->setcargoEmpresainformacionLaboral($reg[4]);
            $info->setfechaIngresoEmpresainformacionLaboral($reg[5]);
            $info->setareaDeptoEmpresainformacionLaboral($reg[6]);
            $info->setafp_informacionLaboral($reg[7]);
            $info->setprofesion_informacionLaboral($reg[8]);
            $info->setfkInfoPersonalinformacionLaboral($reg[9]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function getInfoMedica1($idABuscar)
    {
        $this->c->conectar();
        $query = "CALL CRUDInformacionMedica1 (1, 'alguna','ninguna', 'no hay', " . $idABuscar . ",2);";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {
            $info = new Tbl_InfoMedica1();
            $info->setidInformacionMedica1($reg[0]);
            $info->setprestacionMedica_informacionMedica1($reg[1]);
            $info->setalergias_informacionMedica1($reg[2]);
            $info->setenfermedadesCronicasinformacionMedica1($reg[3]);
            $info->setfkInfoPersonalinformacionMedica1($reg[4]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function getInfoMedica2($idABuscar)
    {
        $this->c->conectar();
        $query = "CALL CRUDInformacionMedica2 (1,'Ninguno', 'Familiar', '96666',3, 'Sin especificar',0,0,1," . $idABuscar . ",2);";
        $rs = $this->c->ejecutar($query);
        echo $query;

        while ($reg = $rs->fetch_array()) {
            $info = new Tbl_InfoMedica2();
            $info->setidInformacionMedica2($reg[0]);
            $info->setmedicamentosHabitualesinformacionMedica2($reg[1]);
            $info->setnombreContactoinformacionMedica2($reg[2]);
            $info->settelefonoContactoinformacionMedica2($reg[3]);
            $info->setfkParentescoContactoinformacionMedica2($reg[4]);
            $info->setnivelActividadFisicainformacionMedica2($reg[5]);
            $info->setesDonanteinformacionMedica2($reg[6]);
            $info->setesFumadorinformacionMedica2($reg[7]);
            $info->setfkGrupoSanguineoinformacionMedica2($reg[8]);
            $info->setfkInfoPersonalinformacionMedica2($reg[9]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function readInfoFamiliar($idABuscar)
    {
        $this->c->conectar();
        $query = "CALL CRUDInformacionFamiliar (1,'Alguno', '1991-12-05',1," . $idABuscar . ",2);";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {

            $obj = new Tbl_InfoFamiliar();
            $obj->setIdInformacionFamiliar($reg[0]);
            $obj->setNombresInformacionFamiliar($reg[1]);
            $obj->setFechaNacimientoInformacionFamiliar($reg[2]);
            $obj->setfkParentescoinformacionFamiliar($reg[3]);
            $obj->setfkInfoPersonalinformacionFamiliar($reg[4]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getInfoCargos($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_informacionDeCargos WHERE fk_personal_informacionDeCargos=" . $idABuscar . ";";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $info = new Tbl_informacionDeCargos();
            $info->setId_informacionDeCargos($reg[0]);
            $info->setFk_materialMenorAsignado_informacionDeCargos($reg[1]);
            $info->setCantidadAsignada_informacionDeCargos($reg[2]);
            $info->setFk_personal_informacionDeCargos($reg[3]);

            $listado[] = $info;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function buscarNombreParentescoPorId($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT nombre_parentesco FROM tbl_parentesco WHERE id_parentesco=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $info = new Tbl_Parentesco();
            $info->setNombreParentesco($reg[0]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function readInfoAcademica($idABuscar)
    {
        $this->c->conectar();
        $query = "CALL CRUDInformacionAcademica (1,'2019-05-06','Curso',1," . $idABuscar . ",2);";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {

            $obj = new Tbl_InfoAcademica();
            $obj->setIdidInformacionAcademica($reg[0]);
            $obj->setfechaInformacionAcademica($reg[1]);
            $obj->setactividadInformacionAcademica($reg[2]);
            $obj->setfkEstadoCursoInformacionAcademica($reg[3]);
            $obj->setfkInformacionPersonalInformacionAcademica($reg[4]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function buscarEstadoDeCursoPorId($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT nombre_estado_curso FROM tbl_estado_curso WHERE id_estado_curso=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $info = ($reg[0]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function readInfoEntrenamientoEstandar($idABuscar)
    {
        $this->c->conectar();
        $query = "CALL CRUDInformacionEntrenamientoEstandar (1,'2018-09-09', 'algo',1," . $idABuscar . ",2);";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {

            $obj = new EntrenamientoEstandar();
            $obj->setIdEntrenamientoEstandar($reg[0]);
            $obj->setfechaEntrenamientoEstandar($reg[1]);
            $obj->setactividad($reg[2]);
            $obj->setFkEstadoCurso($reg[3]);
            $obj->setFkInformacionPersonal($reg[4]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function readInfoHistorica($idABuscar)
    {
        $this->c->conectar();
        $query = "CALL CRUDInformacionHistorica (1,1,'Algun cuerpo',1,'2010-10-10', 'Transferencia', 'Solicitud personal', 'No disponible', 'Algo'," . $idABuscar . ",2);";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {

            $obj = new Tbl_InfoHistorica();
            $obj->setIdInformacionHistorica($reg[0]);
            $obj->setfkRegioninformacionHistorica($reg[1]);
            $obj->setcuerpo($reg[2]);
            $obj->setcompania($reg[3]);
            $obj->setfechaDeCambio($reg[4]);
            $obj->setPremio($reg[5]);
            $obj->setmotivo($reg[6]);
            $obj->setdetalle($reg[7]);
            $obj->setCargo($reg[8]);
            $obj->setfkInfoPersonalinformacionHistorica($reg[9]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    // Ahora muestra todos los materiales de la ubicacion fisica seleccionada, independiente de su cantidad.
    public function getMaterialesMenoresPorFkUbicacionFisica($fkUbicacionFisica)
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_material_menor WHERE fk_ubicacion_fisica_material_menor=" . $fkUbicacionFisica . ";";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {

            $obj = new Tbl_MaterialMenor();
            $obj->setId_material_menor($reg[0]);
            $obj->setNombre_material_menor($reg[1]);
            $obj->setFk_entidad_a_cargo_material_menor($reg[2]);
            $obj->setColor_material_menor($reg[3]);
            $obj->setCantidad_material_menor($reg[4]);
            $obj->setMedida_material_menor($reg[5]);
            $obj->setFk_unidad_de_medida_material_menor($reg[6]);
            $obj->setFk_ubicacion_fisica_material_menor($reg[7]);
            $obj->setFabricante_material_menor($reg[8]);
            $obj->setFecha_de_caducidad_material_menor($reg[9]);
            $obj->setProveedor_material_menor($reg[10]);
            $obj->setFkEstadoMaterialMenor($reg[11]);
            $obj->getDetalleMaterialMenor($reg[12]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getMaterialeMenorPorId($id)
    {
        $this->c->conectar();
        // $query="SELECT * FROM tbl_material_menor WHERE id_material_menor=".$id.";";
        $query = "SELECT tbl_material_menor.id_material_menor, tbl_material_menor.nombre_material_menor, tbl_entidadACargo.nombre_entidadACargo, tbl_material_menor.color_material_menor,
tbl_material_menor.cantidad_material_menor, tbl_material_menor.medida_material_menor, tbl_unidad_de_medida.nombre_unidad_de_medida, tbl_ubicacion_fisica.nombre_ubicacion_fisica,
tbl_material_menor.fabricante_material_menor, DATE_FORMAT(fecha_de_caducidad_material_menor,'%d/%m/%Y'), tbl_material_menor.proveedor_material_menor, tbl_estado_material_menor.nombre_estado_material_menor, tbl_material_menor.detalle_material_menor
FROM tbl_material_menor, tbl_estado_material_menor,tbl_entidadACargo,tbl_unidad_de_medida,tbl_ubicacion_fisica WHERE
tbl_material_menor.fk_entidad_a_cargo_material_menor=tbl_entidadACargo.id_entidadACargo AND
tbl_material_menor.fk_unidad_de_medida_material_menor=tbl_unidad_de_medida.id_unidad_de_medida AND
tbl_material_menor.fk_ubicacion_fisica_material_menor=tbl_ubicacion_fisica.id_ubicacion_fisica AND
tbl_material_menor.fk_estado_material_menor=tbl_estado_material_menor.id_estado_material_menor  AND
tbl_material_menor.id_material_menor=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Tbl_MaterialMenor();
            $obj->setId_material_menor($reg[0]);
            $obj->setNombre_material_menor($reg[1]);
            $obj->setFk_entidad_a_cargo_material_menor($reg[2]);
            $obj->setColor_material_menor($reg[3]);
            $obj->setCantidad_material_menor($reg[4]);
            $obj->setMedida_material_menor($reg[5]);
            $obj->setFk_unidad_de_medida_material_menor($reg[6]);
            $obj->setFk_ubicacion_fisica_material_menor($reg[7]);
            $obj->setFabricante_material_menor($reg[8]);
            $obj->setFecha_de_caducidad_material_menor($reg[9]);
            $obj->setProveedor_material_menor($reg[10]);
            $obj->setFkEstadoMaterialMenor($reg[11]);
            $obj->setDetalleMaterialMenor($reg[12]);
        }
        $this->c->desconectar();
        return $obj;
    }

    public function buscarNombreDeRegionPorId($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT nombre_region FROM tbl_region WHERE id_region=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $info = ($reg[0]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function actualizarMedida($medida)
    {
        $query = "CALL CRUDMedida (" . $medida->getIdMedida() . ", '" . $medida->getTallaChaquetaCamisa() . "', '" . $medida->getTallaPantalon() . "',
'" . $medida->getTallaBuzo() . "', '" . $medida->getTallaCalzado() . "', 3);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarInformacionPersonalDeBombero($infoPersonalBombero)
    {
        $query = "CALL CRUDInformacionPersonal (" . $infoPersonalBombero->getIdInfoPersonal() . ",'" . $infoPersonalBombero->getRutInformacionPersonal() . "','" . $infoPersonalBombero->getNombreInformacionPersonal() . "', '" . $infoPersonalBombero->getApellidoPaterno() . "', '" . $infoPersonalBombero->getApellidoMaterno() . "','" . $infoPersonalBombero->getFechaNacimiento() . "'," . $infoPersonalBombero->getFkEstadoCivil() . "
  ," . $infoPersonalBombero->getFkMedidaInformacionPersonal() . ",'" . $infoPersonalBombero->getAlturaEnMetros() . "','" . $infoPersonalBombero->getPeso() . "','" . $infoPersonalBombero->getEmail() . "',
  " . $infoPersonalBombero->getFkGenero() . ",'" . $infoPersonalBombero->getTelefonoFijo() . "','" . $infoPersonalBombero->getTelefonoMovil() . "','" . $infoPersonalBombero->getDireccionPersonal() . "','" . $infoPersonalBombero->getPertenecioABrigadaJuvenil() . "', '" . $infoPersonalBombero->getEsInstructor() . "',3);";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarInformacionBomberil($infoBomberil)
    {
        $query = "CALL CRUDFichaInformacionBomberil (" . $infoBomberil->getIdInformacionBomberil() . "," . $infoBomberil->getfkRegioninformacionBomberil() . ", '" . $infoBomberil->getcuerpoInformacionBomberil() . "', " . $infoBomberil->getfkCompaniainformacionBomberil() . ",
   " . $infoBomberil->getfkCargoinformacionBomberil() . ",'" . $infoBomberil->getfechaIngresoinformacionBomberil() . "', '" . $infoBomberil->getNRegGeneralinformacionBomberil() . "', " . $infoBomberil->getfkEstadoinformacionBomberil() . ",
  '" . $infoBomberil->getNRegCiainformacionBomberil() . "', " . $infoBomberil->getfkInfoPersonalinformacionBomberil() . ", 3);";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarInformacionLaboral($infoLaboral)
    {
        $query = "CALL CRUDInformacionLaboral (" . $infoLaboral->getIdidInformacionLaboral() . ", '" . $infoLaboral->getnombreEmpresainformacionLaboral() . "', '" . $infoLaboral->getdireccionEmpresainformacionLaboral() . "', '" . $infoLaboral->gettelefonoEmpresainformacionLaboral() . "',
   '" . $infoLaboral->getcargoEmpresainformacionLaboral() . "','" . $infoLaboral->getfechaIngresoEmpresainformacionLaboral() . "', '" . $infoLaboral->getareaDeptoEmpresainformacionLaboral() . "', '" . $infoLaboral->getafp_informacionLaboral() . "',
  '" . $infoLaboral->getprofesion_informacionLaboral() . "', " . $infoLaboral->getfkInfoPersonalinformacionLaboral() . ", 3);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarInformacionMedica1($infoMedica1)
    {
        $query = "CALL CRUDInformacionMedica1 (" . $infoMedica1->getidInformacionMedica1() . ", '" . $infoMedica1->getprestacionMedica_informacionMedica1() . "', '" . $infoMedica1->getalergias_informacionMedica1() . "', '" . $infoMedica1->getenfermedadesCronicasinformacionMedica1() . "',
   " . $infoMedica1->getfkInfoPersonalinformacionMedica1() . ", 3);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarInformacionMedica2($infoMedica2)
    {
        $query = "CALL CRUDInformacionMedica2 (" . $infoMedica2->getidInformacionMedica2() . ", '" . $infoMedica2->getmedicamentosHabitualesinformacionMedica2() . "', '" . $infoMedica2->getnombreContactoinformacionMedica2() . "', '" . $infoMedica2->gettelefonoContactoinformacionMedica2() . "',
   " . $infoMedica2->getfkParentescoContactoinformacionMedica2() . ", '" . $infoMedica2->getnivelActividadFisicainformacionMedica2() . "', " . $infoMedica2->getesDonanteinformacionMedica2() . ", " . $infoMedica2->getesFumadorinformacionMedica2() . ",
   " . $infoMedica2->getfkGrupoSanguineoinformacionMedica2() . ", " . $infoMedica2->getfkInfoPersonalinformacionMedica2() . ", 3);";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarInformacionFamiliar($infoFamiliar)
    {
        $query = "CALL CRUDInformacionFamiliar (" . $infoFamiliar->getIdInformacionFamiliar() . ", '" . $infoFamiliar->getNombresInformacionFamiliar() . "', '" . $infoFamiliar->getFechaNacimientoInformacionFamiliar() . "', " . $infoFamiliar->getfkParentescoinformacionFamiliar() . ",
   " . $infoFamiliar->getfkInfoPersonalinformacionFamiliar() . ",  3);";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarInformacionAcademica($infoAcademica)
    {
        $query = "CALL CRUDInformacionAcademica (" . $infoAcademica->getIdidInformacionAcademica() . ", '" . $infoAcademica->getfechaInformacionAcademica() . "', '" . $infoAcademica->getactividadInformacionAcademica() . "', " . $infoAcademica->getfkEstadoCursoInformacionAcademica() . ",
   " . $infoAcademica->getfkInformacionPersonalInformacionAcademica() . ", 3);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarInformacionEntrenamientoEstandar($infoEntrenamientoEstandar)
    {
        $query = "CALL CRUDInformacionEntrenamientoEstandar (" . $infoEntrenamientoEstandar->getIdEntrenamientoEstandar() . ", '" . $infoEntrenamientoEstandar->getfechaEntrenamientoEstandar() . "', '" . $infoEntrenamientoEstandar->getactividad() . "', " . $infoEntrenamientoEstandar->getFkEstadoCurso() . ",
   " . $infoEntrenamientoEstandar->getFkInformacionPersonal() . ", 3);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarInformacionHistorica($infoHistorica)
    {
        $query = "CALL CRUDInformacionHistorica (" . $infoHistorica->getIdInformacionHistorica() . ", " . $infoHistorica->getfkRegioninformacionHistorica() . ", '" . $infoHistorica->getcuerpo() . "', '" . $infoHistorica->getcompania() . "',
   '" . $infoHistorica->getfechaDeCambio() . "', '" . $infoHistorica->getPremio() . "', '" . $infoHistorica->getmotivo() . "', '" . $infoHistorica->getdetalle() . "', '" . $infoHistorica->getCargo() . "'  , " . $infoHistorica->getfkInfoPersonalinformacionHistorica() . ", 3);";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarUnidad($infoUnidad)
    {
        $query = "CALL CRUDUnidad (" . $infoUnidad->getIdUnidad() . ",'" . $infoUnidad->getNombreUnidad() . "',
  '" . $infoUnidad->getaniodeFabricacion() . "','" . $infoUnidad->getMarca() . "','" . $infoUnidad->getNmotor() . "','" . $infoUnidad->getNchasis() . "','" . $infoUnidad->getNVIN() . "',
  '" . $infoUnidad->getColor() . "','" . $infoUnidad->getPPu() . "','" . $infoUnidad->getfechaInscripcion() . "','" . $infoUnidad->getfechaAdquisicion() . "'," . $infoUnidad->getcapacidadOcupantes() . ",
  " . $infoUnidad->getfkEstadoUnidad() . "," . $infoUnidad->getfkTipoVehiculo() . "," . $infoUnidad->getfkEntidadPropietaria() . ",3);
";

        echo $query;
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarMantencion($infoMantencion)
    {
        $query = "UPDATE tbl_mantencion SET fk_tipo_mantencion=" . $infoMantencion->getFk_tipo_mantencion() . ", fecha_mantencion='" . $infoMantencion->getFecha_mantencion() . "', responsable_mantencion='" . $infoMantencion->getResponsable_mantencion() . "',
direccion_mantencion='" . $infoMantencion->getDireccion_mantencion() . "', comentarios_mantencion='" . $infoMantencion->getComentarios_mantencion() . "' WHERE id_mantencion=" . $infoMantencion->getIdMantencion() . ";";

        echo $query;
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarCarguio($infoCarguio)
    {
        $query = "UPDATE tbl_cargio_combustible SET responsable_cargio_combustible='" . $infoCarguio->getResponsable_cargio_combustible() . "', fecha_cargio='" . $infoCarguio->getFecha_cargio() . "', direccion_cargio='" . $infoCarguio->getDireccion_cargio() . "',
fk_tipo_combustible_cargio_combustible=" . $infoCarguio->getFk_tipo_combustible_cargio_combustible() . ", cantidad_litros_cargio_combustible=" . $infoCarguio->getCantidad_litros_cargio_combustible() . ", precio_litro_cargio_combustible=" . $infoCarguio->getPrecio_litro_cargio_combustible() . ",
 observacion_cargio_combustible='" . $infoCarguio->getObservacion_cargio_combustible() . "' WHERE id_cargio_combustible=" . $infoCarguio->getId_cargio_combustible() . ";";

        echo $query;
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function buscarNombreDeEstadoDeUnidadPorId($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT nombre_estado_unidad FROM tbl_estado_unidad WHERE id_estado_unidad=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $info = ($reg[0]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function buscarNombreDeTipoDeVehiculoDeUnidadPorId($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT nombre_tipo_vehiculo FROM tbl_tipo_vehiculo WHERE id_tipo_vehiculo=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $info = ($reg[0]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function buscarNombreDeEntidadACargoPorId($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT nombre_entidadPropietaria FROM tbl_entidadPropietaria WHERE id_entidadPropietaria=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $info = ($reg[0]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function buscarNombreDeTipoDeMantencion($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT nombre_tipoDeMantencion FROM tbl_tipoDeMantencion WHERE id_tipo_de_mantencion=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $info = ($reg[0]);
        }
        $this->c->desconectar();
        return $info;
    }

    public function getUnidadPorId($idUnidad)
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_unidad WHERE id_unidad=" . $idUnidad . ";";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $aniodeFabricacion = $reg[2];
            $marca = $reg[3];
            $Nmotor = $reg[4];
            $Nchasis = $reg[5];
            $NVIN = $reg[6];
            $Color = $reg[7];
            $PPu = $reg[8];
            $fechaInscripcion = $reg[9];
            $fechaAdquisicion = $reg[10];
            $capacidadOcupantes = $reg[11];
            $fkEstadoUnidad = $reg[12];
            $fkTipoVehiculo = $reg[13];
            $fkEntidadACargo = $reg[14];

            $obj = new Tbl_Unidad();
            $obj->setIdUnidad($id);
            $obj->setNombreUnidad($nombre);
            $obj->setaniodeFabricacion($aniodeFabricacion);
            $obj->setMarca($marca);
            $obj->setNmotor($Nmotor);
            $obj->setNchasis($Nchasis);
            $obj->setNVIN($NVIN);
            $obj->setColor($Color);
            $obj->setPPu($PPu);
            $obj->setfechaInscripcion($fechaInscripcion);
            $obj->setfechaAdquisicion($fechaAdquisicion);
            $obj->setcapacidadOcupantes($capacidadOcupantes);
            $obj->setfkEstadoUnidad($fkEstadoUnidad);
            $obj->setfkTipoVehiculo($fkTipoVehiculo);
            $obj->setfkEntidadPropietaria($fkEntidadACargo);
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getTodasLasUnidades()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_unidad;";
        $rs = $this->c->ejecutar($query);
        $listado = array();

        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $aniodeFabricacion = $reg[2];
            $marca = $reg[3];
            $Nmotor = $reg[4];
            $Nchasis = $reg[5];
            $NVIN = $reg[6];
            $Color = $reg[7];
            $PPu = $reg[8];
            $fechaInscripcion = $reg[9];
            $fechaAdquisicion = $reg[10];
            $capacidadOcupantes = $reg[11];
            $fkEstadoUnidad = $reg[12];
            $fkTipoVehiculo = $reg[13];
            $fkEntidadACargo = $reg[14];

            $obj = new Tbl_Unidad();
            $obj->setIdUnidad($id);
            $obj->setNombreUnidad($nombre);
            $obj->setaniodeFabricacion($aniodeFabricacion);
            $obj->setMarca($marca);
            $obj->setNmotor($Nmotor);
            $obj->setNchasis($Nchasis);
            $obj->setNVIN($NVIN);
            $obj->setColor($Color);
            $obj->setPPu($PPu);
            $obj->setfechaInscripcion($fechaInscripcion);
            $obj->setfechaAdquisicion($fechaAdquisicion);
            $obj->setcapacidadOcupantes($capacidadOcupantes);
            $obj->setfkEstadoUnidad($fkEstadoUnidad);
            $obj->setfkTipoVehiculo($fkTipoVehiculo);
            $obj->setfkEntidadPropietaria($fkEntidadACargo);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function buscarMantencionesDeUnidad($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_mantencion WHERE fk_unidad=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {

            $obj = new Tbl_Mantencion();
            $obj->setIdMantencion($reg[0]);
            $obj->setFk_tipo_mantencion($reg[1]);
            $obj->setFecha_mantencion($reg[2]);
            $obj->setResponsable_mantencion($reg[3]);
            $obj->setDireccion_mantencion($reg[4]);
            $obj->setComentarios_mantencion($reg[5]);
            $obj->setFk_unidad($reg[6]);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function buscarNombreDeMantencionPorId($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT nombre_tipoDeMantencion FROM tbl_tipoDeMantencion WHERE id_tipo_de_mantencion=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function buscarCarguiosDeUnidad($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_cargio_combustible WHERE fk_unidad=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {

            $obj = new Tbl_cargio_combustible();
            $obj->setId_cargio_combustible($reg[0]);
            $obj->setResponsable_cargio_combustible($reg[1]);
            $obj->setFecha_cargio($reg[2]);
            $obj->setDireccion_cargio($reg[3]);
            $obj->setFk_tipo_combustible_cargio_combustible($reg[4]);
            $obj->setCantidad_litros_cargio_combustible($reg[5]);
            $obj->setPrecio_litro_cargio_combustible($reg[6]);
            $obj->setObservacion_cargio_combustible($reg[7]);
            $obj->setFk_unidad($reg[8]);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function buscarNombreDeCombustiblePorId($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT nombre_tipo_combustible FROM tbl_tipo_combustible WHERE id_tipo_combustible=" . $idABuscar . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getMedidas()
    {
        $lista = array();
        $this->c->conectar();
        $select = "SELECT * from tbl_unidad_de_medida;";
        $rs = $this->c->ejecutar($select);
        while ($obj = $rs->fetch_object()) {
            $tu = new Tbl_UnidadMedida();

            $tu->setidUnidadMedida($obj->id_unidad_de_medida);
            $tu->setTipoDeMedida($obj->fk_tipo_de_medida_unidad_de_medida);
            $tu->setnombreUnidadMedida($obj->nombre_unidad_de_medida);
            array_push($lista, $tu);
        }
        $this->c->desconectar();
        return $lista;
    }

    public function getUbicacionFisica($fk_entidadACargo)
    {
        $lista = array();
        $this->c->conectar();
        $select = "SELECT * from tbl_ubicacion_fisica WHERE fk_entidad_a_cargo=" . $fk_entidadACargo . ";";
        $rs = $this->c->ejecutar($select);
        while ($obj = $rs->fetch_object()) {
            $tu = new Tbl_UbicacionFisica();

            $tu->setidUbicacionFisica($obj->id_ubicacion_fisica);
            $tu->setnombreUbicacionFisica($obj->nombre_ubicacion_fisica);
            array_push($lista, $tu);
        }
        $this->c->desconectar();
        return $lista;
    }

    public function crerMaterialMenor($materialMenor)
    {
        $query = "INSERT INTO tbl_material_menor VALUES (NULL, '" . $materialMenor->getNombre_material_menor() . "', " . $materialMenor->getFk_entidad_a_cargo_material_menor() . ",
'" . $materialMenor->getColor_material_menor() . "' , " . $materialMenor->getCantidad_material_menor() . ",
" . $materialMenor->getMedida_material_menor() . ", " . $materialMenor->getFk_unidad_de_medida_material_menor() . ", " . $materialMenor->getFk_ubicacion_fisica_material_menor() . ", '" . $materialMenor->getFabricante_material_menor() . "',
'" . $materialMenor->getFecha_de_caducidad_material_menor() . "', '" . $materialMenor->getProveedor_material_menor() . "', " . $materialMenor->getFkEstadoMaterialMenor() . ",'" . $materialMenor->getDetalleMaterialMenor() . "');";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function buscarMaterialMenorPorId($idABuscar)
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_material_menor WHERE id_material_menor=" . $idABuscar . " ;";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {

            $obj = new Tbl_MaterialMenor();
            $obj->setId_material_menor($reg[0]);
            $obj->setNombre_material_menor($reg[1]);
            $obj->setFk_entidad_a_cargo_material_menor($reg[2]);
            $obj->setColor_material_menor($reg[3]);
            $obj->setCantidad_material_menor($reg[4]);
            $obj->setMedida_material_menor($reg[5]);
            $obj->setFk_unidad_de_medida_material_menor($reg[6]);
            $obj->setFk_ubicacion_fisica_material_menor($reg[7]);
            $obj->setFabricante_material_menor($reg[8]);
            $obj->setFecha_de_caducidad_material_menor($reg[9]);
            $obj->setProveedor_material_menor($reg[10]);
            $obj->setFkEstadoMaterialMenor($reg[11]);
            $obj->setDetalleMaterialMenor($reg[12]);
        }
        $this->c->desconectar();
        return $obj;
    }

    public function buscarMaterialMenorPorNombreCompaniaOBodega($nombre, $id, $tipoDeBusqueda)
    {
        $this->c->conectar();

        $query = "";

        if ($tipoDeBusqueda == 1) {
            $query = "SELECT tbl_material_menor.nombre_material_menor, tbl_material_menor.cantidad_material_menor, tbl_material_menor.fecha_de_caducidad_material_menor, tbl_entidadACargo.nombre_entidadACargo,
tbl_material_menor.id_material_menor FROM tbl_material_menor, tbl_entidadACargo WHERE tbl_material_menor.fk_entidad_a_cargo_material_menor=tbl_entidadACargo.id_entidadACargo
AND tbl_material_menor.nombre_material_menor LIKE '%" . $nombre . "%';";
        } else if ($tipoDeBusqueda == 3) {
            $query = "SELECT tbl_material_menor.nombre_material_menor, tbl_material_menor.cantidad_material_menor, tbl_material_menor.fecha_de_caducidad_material_menor,
 tbl_entidadACargo.nombre_entidadACargo, tbl_material_menor.id_material_menor FROM tbl_material_menor, tbl_entidadACargo, tbl_estado_material_menor
 WHERE tbl_material_menor.fk_entidad_a_cargo_material_menor=tbl_entidadACargo.id_entidadACargo AND tbl_material_menor.fk_estado_material_menor=tbl_estado_material_menor.id_estado_material_menor
 AND tbl_estado_material_menor.id_estado_material_menor=" . $id . ";";
        } else if ($tipoDeBusqueda == 2) {
            $query = "SELECT tbl_material_menor.nombre_material_menor, tbl_material_menor.cantidad_material_menor, tbl_material_menor.fecha_de_caducidad_material_menor, tbl_entidadACargo.nombre_entidadACargo,
tbl_material_menor.id_material_menor FROM tbl_material_menor, tbl_entidadACargo WHERE tbl_material_menor.fk_entidad_a_cargo_material_menor=tbl_entidadACargo.id_entidadACargo
AND tbl_entidadACargo.id_entidadACargo=" . $id . ";";
        }
        /*
         * $query="SELECT tbl_material_menor.nombre_material_menor, tbl_material_menor.cantidad_material_menor, tbl_material_menor.fecha_de_caducidad_material_menor, tbl_entidadACargo.nombre_entidadACargo,
         * tbl_material_menor.id_material_menor FROM tbl_material_menor, tbl_entidadACargo WHERE tbl_material_menor.fk_entidad_a_cargo_material_menor=tbl_entidadACargo.id_entidadACargo;";
         */

        echo $query;

        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $obj = new Vista_BuscarMaterialMenor();
            $obj->setNombre($reg[0]);
            $obj->setCantidad($reg[1]);
            $obj->setFechaDeCaducidad($reg[2]);
            $obj->setNombreEntidad($reg[3]);
            $obj->setIdMaterialMenor($reg[4]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function actualizarMaterialMenor($materialMenor)
    {
        $query = "UPDATE tbl_material_menor SET nombre_material_menor='" . $materialMenor->getNombre_material_menor() . "', fk_entidad_a_cargo_material_menor=" . $materialMenor->getFk_entidad_a_cargo_material_menor() . ", color_material_menor=
 '" . $materialMenor->getColor_material_menor() . "' , cantidad_material_menor= " . $materialMenor->getCantidad_material_menor() . ", medida_material_menor=
" . $materialMenor->getMedida_material_menor() . ", fk_unidad_de_medida_material_menor=" . $materialMenor->getFk_unidad_de_medida_material_menor() . ",  fk_ubicacion_fisica_material_menor=" . $materialMenor->getFk_ubicacion_fisica_material_menor() . ", fabricante_material_menor='" . $materialMenor->getFabricante_material_menor() . "',
 fecha_de_caducidad_material_menor='" . $materialMenor->getFecha_de_caducidad_material_menor() . "', proveedor_material_menor= '" . $materialMenor->getProveedor_material_menor() . "', fk_estado_material_menor=" . $materialMenor->getFkEstadoMaterialMenor() . ", detalle_material_menor='" . $materialMenor->getDetalleMaterialMenor() . "' WHERE id_material_menor=" . $materialMenor->getId_material_menor() . "
  ;";

        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function buscarUnidadPorNombreEstadoOCompania($nombre, $id, $tipoDeBusqueda)
    {
        $this->c->conectar();

        $query = "SELECT tbl_unidad.nombre_unidad, tbl_estado_unidad.nombre_estado_unidad, tbl_tipo_vehiculo.nombre_tipo_vehiculo, tbl_entidadACargo.nombre_entidadACargo, tbl_unidad.id_unidad FROM tbl_unidad,
tbl_estado_unidad, tbl_tipo_vehiculo, tbl_entidadACargo WHERE tbl_unidad.fk_estado_unidad_unidad=tbl_estado_unidad.id_estado_unidad AND
tbl_unidad.fk_tipo_vehiculo_unidad=tbl_tipo_vehiculo.id_tipo_vehiculo AND tbl_unidad.fk_entidadACargo=tbl_entidadACargo.id_entidadACargo ";

        if ($tipoDeBusqueda == 1) {
            $anexoQuery = "AND tbl_unidad.nombre_unidad LIKE '%" . $nombre . "%';";
        } else if ($tipoDeBusqueda == 2) {
            $anexoQuery = "AND tbl_estado_unidad.id_estado_unidad=" . $id . ";";
        } else if ($tipoDeBusqueda == 3) {
            $anexoQuery = "AND tbl_entidadACargo.id_entidadACargo=" . $id . ";";
        }

        $query = $query . $anexoQuery;

        echo $query;

        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $obj = new VistaBusquedaDeUnidad();
            $obj->setNombreUnidad($reg[0]);
            $obj->setEstado($reg[1]);
            $obj->setTipoVehiculo($reg[2]);
            $obj->setEntidadACargo($reg[3]);
            $obj->setIdUnidad($reg[4]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getEstadosInventario()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_estado_material_menor;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {

            $obj = new Tbl_EstadoMaterialMenor();
            $obj->setId_estado_material_menor($reg[0]);
            $obj->setNombre_estado_material_menor($reg[1]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function actualizarStockDeMaterialMenor($idMaterial, $cantidadNueva)
    {
        $query = "UPDATE tbl_material_menor SET cantidad_material_menor=" . $cantidadNueva . " WHERE id_material_menor=" . $idMaterial . "; ";
        echo $query;
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function getStockDeMaterial($idDeMaterial)
    {
        $this->c->conectar();
        $query = "SELECT cantidad_material_menor FROM tbl_material_menor WHERE id_material_menor=" . $idDeMaterial . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function readSectores()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_sector;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $id = $reg[0];
            $nombre = $reg[1];
            $obj = new Tbl_sector();
            $obj->setIdSector($id);
            $obj->setNombreSector($nombre);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getEstadoActualDeOficial($idOficial)
    {
        $this->c->conectar();
        $query = "SELECT nombreEstado_estado_oficial FROM tbl_estado_oficial WHERE fkOficial=" . $idOficial . " ORDER BY id_estado_oficial DESC LIMIT 1;";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {
            $nombre = $reg[0];
        }
        $this->c->desconectar();
        return $nombre;
    }

    public function crearServicio($servicio)
    {
        $query = "INSERT INTO tbl_servicio VALUES (NULL, '" . $servicio->getNombre_servicio() . "',
                                                '" . $servicio->getRut_servicio() . "',
                                                '" . $servicio->getTelefono_servicio() . "',
                                                '" . $servicio->getDireccion_servicio() . "',
                                                '" . $servicio->getEsquina1_servicio() . "',
                                                '" . $servicio->getEsquina2_servicio() . "',
                                                " . $servicio->getFk_sector() . ",
                                                " . $servicio->getFk_tipoDeServicio() . ",
                                                '" . $servicio->getDetalles_servicio() . "',
                                                NOW() )";
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function getUltimos5Servicios()
    {
        $this->c->conectar();
        $query = "SELECT tbl_servicio.id_servicio, tbl_servicio.nombre_servicio, tbl_servicio.rut_servicio, tbl_servicio.telefono_servicio,
tbl_servicio.direccion_servicio, tbl_servicio.esquina1_servicio,
tbl_servicio.esquina2_servicio, tbl_servicio.fk_sector, tbl_servicio.fk_tipoDeServicio, tbl_servicio.detalles_servicio,
tbl_servicio.fecha_servicio FROM tbl_servicio,tbl_servicio_unidad
WHERE tbl_servicio_unidad.fk_servicio=tbl_servicio.id_servicio AND tbl_servicio_unidad.emergenciaActiva=0  GROUP BY tbl_servicio.id_servicio
ORDER BY id_servicio DESC LIMIT 5;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $servicio = new Tbl_servicio();
            $servicio->setId_servicio($reg[0]);
            $servicio->setNombre_servicio($reg[1]);
            $servicio->setRut_servicio($reg[2]);
            $servicio->setTelefono_servicio($reg[3]);
            $servicio->setDireccion_servicio($reg[4]);
            $servicio->setEsquina1_servicio($reg[5]);
            $servicio->setEsquina2_servicio($reg[6]);
            $servicio->setFk_sector($reg[7]);
            $servicio->setFk_tipoDeServicio($reg[8]);
            $servicio->setDetalles_servicio($reg[9]);
            $servicio->setFecha_servicio($reg[10]);

            $listado[] = $servicio;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function verDetallesDeServicioPorId($id)
    {
        $this->c->conectar();
        $query = "SELECT tbl_servicio.id_servicio, tbl_servicio.nombre_servicio, tbl_servicio.rut_servicio, tbl_servicio.telefono_servicio, tbl_servicio.direccion_servicio,
tbl_servicio.esquina1_servicio,tbl_servicio.esquina2_servicio,tbl_sector.nombre_sector,tbl_tipo_servicio.codigo_tipo_servicio,tbl_servicio.detalles_servicio, tbl_servicio.fecha_servicio
 FROM tbl_servicio, tbl_sector, tbl_tipo_servicio  WHERE tbl_servicio.fk_sector=tbl_sector.id_sector AND tbl_servicio.fk_tipoDeServicio=tbl_tipo_servicio.id_tipo_servicio  AND tbl_servicio.id_servicio=" . $id . ";";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {
            $servicio = new Tbl_servicio();
            $servicio->setId_servicio($reg[0]);
            $servicio->setNombre_servicio($reg[1]);
            $servicio->setRut_servicio($reg[2]);
            $servicio->setTelefono_servicio($reg[3]);
            $servicio->setDireccion_servicio($reg[4]);
            $servicio->setEsquina1_servicio($reg[5]);
            $servicio->setEsquina2_servicio($reg[6]);
            $servicio->setFk_sector($reg[7]);
            $servicio->setFk_tipoDeServicio($reg[8]);
            $servicio->setDetalles_servicio($reg[9]);
            $servicio->setFecha_servicio($reg[10]);
        }
        $this->c->desconectar();
        return $servicio;
    }

    public function verNombreDeServicioPorId($id)
    {
        $this->c->conectar();
        $query = "SELECT nombre_tipo_servicio FROM tbl_tipo_servicio WHERE id_tipo_servicio=" . $id . ";";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {

            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getUnidadesInvolucradasEnServicio($id)
    {
        $this->c->conectar();
        $query = "SELECT tbl_unidad.nombre_unidad FROM tbl_unidad, tbl_servicio_unidad,tbl_servicio WHERE tbl_unidad.id_unidad=tbl_servicio_unidad.fk_unidad AND
  tbl_servicio.id_servicio=tbl_servicio_unidad.fk_servicio AND tbl_servicio.id_servicio=" . $id . "";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {

            $obj = $reg[0];

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getIdDeUnidadesInvolucradasEnServicio($id)
    {
        $this->c->conectar();
        $query = "SELECT tbl_unidad.id_unidad FROM tbl_unidad, tbl_servicio_unidad,tbl_servicio WHERE tbl_unidad.id_unidad=tbl_servicio_unidad.fk_unidad AND
  tbl_servicio.id_servicio=tbl_servicio_unidad.fk_servicio AND tbl_servicio.id_servicio=" . $id . "";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {

            $obj = $reg[0];

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function crearDespachoInicial($fkServicio)
    {
        $this->c->conectar();
        $query = "INSERT INTO tbl_servicio_unidad (fk_servicio) VALUES (" . $fkServicio . ");";
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function getIdServicioMasReciente()
    {
        $this->c->conectar();
        $query = "SELECT MAX(id_servicio) FROM tbl_servicio;";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }

        $this->c->desconectar();
        return $obj;
    }

    public function getTipoDeServicioYSectorDeServicio($idServicio)
    {
        $this->c->conectar();
        $query = "SELECT tbl_tipo_servicio.codigo_tipo_servicio, tbl_sector.nombre_sector FROM tbl_servicio, tbl_sector, tbl_tipo_servicio WHERE tbl_servicio.fk_tipoDeServicio=tbl_tipo_servicio.id_tipo_servicio AND
  tbl_servicio.fk_sector=tbl_sector.id_sector AND tbl_servicio.id_servicio=" . $idServicio . ";";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {
            $obj = new ServicioYSector();
            $obj->setServicio($reg[0]);
            $obj->setSector($reg[1]);
        }

        $this->c->desconectar();
        return $obj;
    }

    public function actualizarOBACConductorYNPersonalServicioUnidad($obac, $conductor, $nBomberos, $idServicio)
    {
        $this->c->conectar();
        $query = "UPDATE tbl_servicio_unidad SET obac='" . $obac . "', conductor='" . $conductor . "', nBomberos='" . $nBomberos . "' WHERE id_servicio_unidad=" . $idServicio . ";";
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function getServiciosDeEmergenciasActivas()
    {
        $this->c->conectar();
        $query = "SELECT tbl_servicio.id_servicio, tbl_servicio.nombre_servicio, tbl_servicio.rut_servicio, tbl_servicio.telefono_servicio, tbl_servicio.direccion_servicio, tbl_servicio.esquina1_servicio,
   tbl_servicio.esquina2_servicio, tbl_sector.nombre_sector, tbl_tipo_servicio.codigo_tipo_servicio, tbl_servicio.detalles_servicio, tbl_servicio.fecha_servicio FROM tbl_servicio, tbl_sector, tbl_tipo_servicio,
    tbl_servicio_unidad WHERE tbl_servicio.fk_sector=tbl_sector.id_sector AND tbl_servicio.fk_tipoDeServicio=tbl_tipo_servicio.id_tipo_servicio AND tbl_servicio_unidad.fk_servicio=tbl_servicio.id_servicio AND
    tbl_servicio_unidad.emergenciaActiva=1 GROUP BY id_servicio;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $servicio = new Tbl_servicio();
            $servicio->setId_servicio($reg[0]);
            $servicio->setNombre_servicio($reg[1]);
            $servicio->setRut_servicio($reg[2]);
            $servicio->setTelefono_servicio($reg[3]);
            $servicio->setDireccion_servicio($reg[4]);
            $servicio->setEsquina1_servicio($reg[5]);
            $servicio->setEsquina2_servicio($reg[6]);
            $servicio->setFk_sector($reg[7]);
            $servicio->setFk_tipoDeServicio($reg[8]);
            $servicio->setDetalles_servicio($reg[9]);
            $servicio->setFecha_servicio($reg[10]);

            $listado[] = $servicio;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getServicioUnidadPorFkServicio($fk)
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_servicio_unidad WHERE fk_servicio=" . $fk . ";";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $obj = new Tbl_servicio_unidad();
            $obj->setId_servicio_unidad($reg[0]);
            $obj->setFk_servicio($reg[1]);
            $obj->setFk_unidad($reg[2]);
            $obj->setMomento6_0($reg[3]);
            $obj->setObac($reg[4]);
            $obj->setConductor($reg[5]);
            $obj->setN_Bomberos($reg[6]);
            $obj->setMomento6_3($reg[7]);
            $obj->setMomento6_7($reg[8]);
            $obj->setMomento6_8($reg[9]);
            $obj->setMomento6_9($reg[10]);
            $obj->setMomento6_10($reg[11]);
            $obj->setEmergenciaActiva($reg[12]);

            $listado[] = $obj;
        }

        $this->c->desconectar();
        return $listado;
    }

    public function getNombreDeUnidadPorId($id)
    {
        $this->c->conectar();
        $query = "SELECT nombre_unidad FROM tbl_unidad WHERE id_unidad=" . $id . ";";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }

        $this->c->desconectar();
        return $obj;
    }

    public function getIdDeTipoDeServicioAPartirDelCodigo($codigo)
    {
        $this->c->conectar();
        $query = "SELECT id_tipo_servicio FROM tbl_tipo_servicio WHERE codigo_tipo_servicio='" . $codigo . "';";

        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getIdDeSectorAPartirDelNombre($sector)
    {
        $this->c->conectar();
        $query = "SELECT id_sector FROM tbl_sector WHERE nombre_sector='" . $sector . "';";

        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function registrarDespachoEnviado($idServico, $idUnidad)
    {
        $this->c->conectar();
        $query = "INSERT INTO tbl_servicio_unidad (fk_servicio, fk_unidad, emergenciaActiva) VALUES (" . $idServico . "," . $idUnidad . ",1);";
        echo $query;
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function determinarCarrosADespacharSegunCodigoDeServicioYSector($idServicio, $idSector)
    {
        $carrosAEnviar = array();

        if (($idSector == 1) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 1) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 2) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 3) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 4) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 5) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 6) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 7) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 8) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 9) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 10) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 11) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 12) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 13) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 14) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 15) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 16) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 17) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 18) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 19) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 20) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 21) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 22) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 23) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 24) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 25) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 26) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 27) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 28) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 29) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 30) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 31) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 32) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 33) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 1)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 2)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 3)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 4)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 5)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 6)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 7)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 8)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 9)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 10)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 11)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 12)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 13)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 14)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        } elseif (($idSector == 34) && ($idServicio == 15)) {
            $carrosAEnviar[] = 1;
            $carrosAEnviar[] = 2;
        }

        return $carrosAEnviar;
    }

    public function registrar6_0UnidadEnEmergencia($idEmergencia)
    {
        $this->c->conectar();
        $query = "UPDATE tbl_servicio_unidad SET momento6_0=NOW() WHERE id_servicio_unidad=" . $idEmergencia . ";";

        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function registrar6_3UnidadEnEmergencia($idEmergencia)
    {
        $this->c->conectar();
        $query = "UPDATE tbl_servicio_unidad SET momento6_3=NOW() WHERE id_servicio_unidad=" . $idEmergencia . ";";

        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function registrar6_7UnidadEnEmergencia($idEmergencia)
    {
        $this->c->conectar();
        $query = "UPDATE tbl_servicio_unidad SET momento6_7=NOW() WHERE id_servicio_unidad=" . $idEmergencia . ";";

        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function registrar6_8UnidadEnEmergencia($idEmergencia)
    {
        $this->c->conectar();
        $query = "UPDATE tbl_servicio_unidad SET momento6_8=NOW() WHERE id_servicio_unidad=" . $idEmergencia . ";";

        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function getUnidadInvolucradaEnEmergencia($idEmergencia)
    {
        $this->c->conectar();
        $query = "SELECT fk_unidad FROM tbl_servicio_unidad WHERE id_servicio_unidad=" . $idEmergencia . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function registrar6_9UnidadEnEmergencia($idEmergencia)
    {
        $this->c->conectar();
        $query = "UPDATE tbl_servicio_unidad SET momento6_9=NOW() WHERE id_servicio_unidad=" . $idEmergencia . ";";

        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function registrar6_10UnidadEnEmergencia($idEmergencia)
    {
        $this->c->conectar();
        $query = "UPDATE tbl_servicio_unidad SET momento6_10=NOW() WHERE id_servicio_unidad=" . $idEmergencia . ";";

        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function getHora6_0($id)
    {
        $this->c->conectar();
        $query = "SELECT momento6_0 FROM tbl_servicio_unidad WHERE id_servicio_unidad=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getHora6_3($id)
    {
        $this->c->conectar();
        $query = "SELECT momento6_3 FROM tbl_servicio_unidad WHERE id_servicio_unidad=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getHora6_7($id)
    {
        $this->c->conectar();
        $query = "SELECT momento6_7 FROM tbl_servicio_unidad WHERE id_servicio_unidad=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getHora6_8($id)
    {
        $this->c->conectar();
        $query = "SELECT momento6_8 FROM tbl_servicio_unidad WHERE id_servicio_unidad=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getHora6_9($id)
    {
        $this->c->conectar();
        $query = "SELECT momento6_9 FROM tbl_servicio_unidad WHERE id_servicio_unidad=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getHora6_10($id)
    {
        $this->c->conectar();
        $query = "SELECT momento6_10 FROM tbl_servicio_unidad WHERE id_servicio_unidad=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getTodasLasEntidadesExteriores()
    {
        $this->c->conectar();
        $query = "SELECT * FROM tbl_entidad_exteriror;";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Tbl_entidad_exterior();
            $obj->setIdEntidadExterior($reg[0]);
            $obj->setNombreEntidadExterior($reg[1]);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function crearNuevoApoyo($fkEntidadExterior, $responsable, $ppuu)
    {
        $this->c->conectar();
        $query = "INSERT INTO  tbl_apoyo VALUES (NULL," . $fkEntidadExterior . ",'" . $responsable . "', '" . $ppuu . "');";
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function getIDApoyoMasReciente()
    {
        $this->c->conectar();
        $query = "SELECT MAX(id_apoyo) FROM tbl_apoyo;";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function agregarEntidadExteriorComoApoyo($idServicio, $idApoyo)
    {
        $this->c->conectar();
        $query = "INSERT INTO  tbl_apoyoEntidadExterior_servicio VALUES (NULL," . $idServicio . "," . $idApoyo . ");";
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function getApoyosDelServicio($idServicio)
    {
        $this->c->conectar();
        $query = "SELECT tbl_apoyo.id_apoyo, tbl_entidad_exteriror.nombre_entidad_exterior, tbl_apoyo.responsable, tbl_apoyo.PPUU FROM tbl_entidad_exteriror, tbl_apoyo, tbl_apoyoEntidadExterior_servicio, tbl_servicio
WHERE tbl_entidad_exteriror.id_entidad_exterior=tbl_apoyo.fk_entidadExterior AND  tbl_apoyoEntidadExterior_servicio.fk_apoyo=tbl_apoyo.id_apoyo AND
tbl_apoyoEntidadExterior_servicio.fk_servicio=tbl_servicio.id_servicio AND tbl_servicio.id_servicio=" . $idServicio . ";";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Tbl_apoyo();
            $obj->setIdApoyo($reg[0]);
            $obj->setFkEntidad($reg[1]);
            $obj->setResponsable($reg[2]);
            $obj->setPpuu($reg[3]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getOBACCoonductorYCantidad($idServicio)
    {
        $this->c->conectar();
        $query = "SELECT tbl_servicio_unidad.obac, tbl_servicio_unidad.conductor, tbl_servicio_unidad.nBomberos FROM tbl_servicio_unidad WHERE id_servicio_unidad=" . $idServicio . ";";
        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {
            $obj = new OBACConductorNPersonal();
            $obj->setObac($reg[0]);
            $obj->setConductor($reg[1]);
            $obj->setCantidad($reg[2]);
        }

        $this->c->desconectar();
        return $obj;
    }

    public function cerrarServicio($idServicio)
    {
        $this->c->conectar();
        $query = "UPDATE tbl_servicio_unidad SET emergenciaActiva=0 WHERE fk_servicio=" . $idServicio . ";";
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function getMomentos6_10DeUnServicio($idServicio)
    {
        $this->c->conectar();
        $query = "SELECT momento6_10 FROM tbl_servicio_unidad WHERE fk_servicio=" . $idServicio . ";";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getEstadoDeServicioDeMaquina($idMaquina)
    {
        $this->c->conectar();
        $query = "SELECT nombre_estado_de_servicio_de_maquina FROM tbl_estado_servicio_unidad WHERE id_estado_servicio_unidad=" . $idMaquina . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function estabecerEstadoDeEmergenciaDeMaquina($idMaquina, $estado)
    {
        $this->c->conectar();
        $query = "INSERT INTO tbl_estado_servicio_unidad VALUES (NULL," . $idMaquina . "," . $estado . ");";
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function actualizarEstadoDeEmergenciaDeMaquina($idMaquina, $estado)
    {
        $this->c->conectar();
        $query = "UPDATE tbl_estado_servicio_unidad SET fk_estado=" . $estado . " WHERE fk_unidad=" . $idMaquina . ";";

        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function rescatarIdDeMaquinaMasReciente()
    {
        $this->c->conectar();
        $query = "SELECT MAX(id_unidad) FROM tbl_unidad;";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function getEstadoDeEmergenciaDeLaUnidad($idUnidad)
    {
        $this->c->conectar();
        $query = "SELECT fk_estado FROM tbl_estado_servicio_unidad WHERE fk_unidad=" . $idUnidad . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function verificarExistenciaDeEmergenciasEnProgreso()
    {
        $this->c->conectar();
        $query = "SELECT COUNT(tbl_servicio.id_servicio) FROM tbl_servicio,tbl_servicio_unidad
  WHERE tbl_servicio_unidad.fk_servicio=tbl_servicio.id_servicio AND tbl_servicio_unidad.emergenciaActiva=1;";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }

    public function obtenerUnidadesDisponibles()
    {
        $this->c->conectar();
        $query = "SELECT tbl_unidad.id_unidad, tbl_unidad.nombre_unidad FROM tbl_unidad, tbl_estado_de_servicio_de_maquina, tbl_estado_servicio_unidad WHERE
  tbl_estado_servicio_unidad.fk_estado=tbl_estado_de_servicio_de_maquina.id_estado_de_servicio_de_maquina AND
  tbl_unidad.id_unidad=tbl_estado_servicio_unidad.fk_unidad AND
  tbl_estado_servicio_unidad.fk_estado=1;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $obj = new Tbl_Unidad();
            $obj->setIdUnidad($reg[0]);
            $obj->setNombreUnidad($reg[1]);
            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getUltimos20Servicios()
    {
        $this->c->conectar();
        $query = "SELECT tbl_servicio.id_servicio, tbl_servicio.nombre_servicio, tbl_servicio.rut_servicio, tbl_servicio.telefono_servicio,
tbl_servicio.direccion_servicio, tbl_servicio.esquina1_servicio,
tbl_servicio.esquina2_servicio, tbl_servicio.fk_sector, tbl_servicio.fk_tipoDeServicio, tbl_servicio.detalles_servicio,
tbl_servicio.fecha_servicio FROM tbl_servicio,tbl_servicio_unidad
WHERE tbl_servicio_unidad.fk_servicio=tbl_servicio.id_servicio AND tbl_servicio_unidad.emergenciaActiva=0  GROUP BY tbl_servicio.id_servicio
ORDER BY id_servicio DESC LIMIT 20;";
        $rs = $this->c->ejecutar($query);
        $listado = array();
        while ($reg = $rs->fetch_array()) {
            $servicio = new Tbl_servicio();
            $servicio->setId_servicio($reg[0]);
            $servicio->setNombre_servicio($reg[1]);
            $servicio->setRut_servicio($reg[2]);
            $servicio->setTelefono_servicio($reg[3]);
            $servicio->setDireccion_servicio($reg[4]);
            $servicio->setEsquina1_servicio($reg[5]);
            $servicio->setEsquina2_servicio($reg[6]);
            $servicio->setFk_sector($reg[7]);
            $servicio->setFk_tipoDeServicio($reg[8]);
            $servicio->setDetalles_servicio($reg[9]);
            $servicio->setFecha_servicio($reg[10]);

            $listado[] = $servicio;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function getNombreDeSectorPorId($id)
    {
        $this->c->conectar();
        $query = "SELECT nombre_sector FROM tbl_sector WHERE id_sector=" . $id . ";";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = $reg[0];
        }
        $this->c->desconectar();
        return $obj;
    }
}
?>
