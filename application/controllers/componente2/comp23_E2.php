<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 2
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp23_E2 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/etapa2_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function muestraReuniones() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $this->load->model('etapa1-sub23/reunion', 'reunion');
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $username = $this->tank_auth->get_username();
        $datos = $this->usuario->obtenerDepartamento($username);
        $pro_pep_id = $datos[0]->id;
        $informacion['reuniones'] = $this->reunion->obtenerReuniones($pro_pep_id, 2);
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/reuniones_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function muestraReunion($reu_id) {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $this->load->model('etapa1-sub23/reunion', 'reunion');
        $this->reunion->eliminaReunion($reu_id);
        redirect('componente2/comp23_E2/muestraReuniones');
    }

    public function registrarReunion() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $username = $this->tank_auth->get_username();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $informacion['departamento'] = $datos[0]->Depto;
        $informacion['municipio'] = $datos[0]->Muni;
        $pro_pep_id = $datos[0]->id;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;

        /* REGISTRAR REUNION */
        $this->load->model('etapa1-sub23/reunion', 'reu');
        $ultima = $this->reu->ultimaReunion($pro_pep_id, 2);
        $reu_numero = (int) $ultima[0]['ultima'] + 1;
        $informacion['reu_numero'] = $reu_numero;
        $this->reu->agregarReunion(2, $pro_pep_id, $reu_numero);
        $id_reunion = $this->reu->obtenerId(2, $pro_pep_id, $reu_numero);
        $reu_id = $id_reunion[0]['reu_id'];
        $informacion['reu_id'] = $reu_id;
        //CARGAR CRITERIOS
        $this->load->model('etapa1-sub23/criterio');
        $this->load->model('etapa2-sub23/criterio_reunion', 'criterioReunion');
        $criterios = $this->criterio->obtenerCriterios();
        foreach ($criterios as $criteAux)
            $this->criterioReunion->insertarCriterioReunion($reu_id, $criteAux->cri_id);
        $informacion['criterios'] = $this->criterioReunion->obtenerLosCriteriosReunion($reu_id);
        //CARGAR POBLACION_REUNION
        $this->load->model('etapa2-sub23/poblacion_reunion', 'pobReu');
        $this->pobReu->insertarPoblacionReunion($reu_id);
        $resultado = $this->pobReu->obtenerPoblacionReunionPorReunion($reu_id);
        $informacion['pob_id'] = $resultado[0]['pob_id'];
        /**/
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/registrarReunion_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function editarReunion($reu_id) {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $username = $this->tank_auth->get_username();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $informacion['departamento'] = $datos[0]->Depto;
        $informacion['municipio'] = $datos[0]->Muni;
        $pro_pep_id = $datos[0]->id;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        /* OBTENER LA REUNION */
        $this->load->model('etapa1-sub23/reunion', 'reu');
        $datosReu = $this->reu->obtenerReunionId($reu_id);
        $informacion['reu_id'] = $reu_id;
        $informacion['reu_fecha'] = $datosReu[0]->reu_fecha;
        $informacion['reu_numero'] = $datosReu[0]->reu_numero;
        $informacion['reu_tema'] = $datosReu[0]->reu_tema;
        $informacion['reu_resultado'] = $datosReu[0]->reu_resultado;
        $informacion['reu_observacion'] = $datosReu[0]->reu_observacion;
        //POBLACION_REUNION
        $this->load->model('etapa2-sub23/poblacion_reunion', 'pobReu');
        $resultado = $this->pobReu->obtenerPoblacionReunionPorReunion($reu_id);
        $informacion['pob_id'] = $resultado[0]['pob_id'];
        $informacion['pob_comunidad'] = $resultado[0]['pob_comunidad'];
        $informacion['pob_sector'] = $resultado[0]['pob_sector'];
        $informacion['pob_institucion'] = $resultado[0]['pob_institucion'];
        //CRITERIOS_REUNION
        $this->load->model('etapa2-sub23/criterio_reunion', 'criterioReunion');
        $informacion['criterios'] = $this->criterioReunion->obtenerLosCriteriosReunion($reu_id);
        /**/
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/editarReunion_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarReunion() {
        /* VARIABLES POST */
        $reu_fecha = $this->input->post("reu_fecha");
        $reu_duracion_horas = $this->input->post("reu_duracion_horas");
        $reu_tema = $this->input->post("reu_tema");
        $reu_resultado = $this->input->post("reu_resultado");
        $reu_observacion = $this->input->post("reu_observacion");
        $reu_id = $this->input->post("reu_id");
        $pob_id = $this->input->post("pob_id");
        if ($this->input->post("pob_institucion") == 0)
            $pob_institucion = 'false';
        else
            $pob_institucion = 'true';

        if ($this->input->post("pob_comunidad") == 0)
            $pob_comunidad = 'false';
        else
            $pob_comunidad = 'true';

        if ($this->input->post("pob_sector") == 0)
            $pob_sector = 'false';
        else
            $pob_sector = 'true';

        $this->load->model('etapa2-sub23/criterio_reunion', 'criReu');
        $criterios = $this->criReu->obtenerLosCriteriosReunion($reu_id);
        foreach ($criterios as $criterio) {
            if ($this->input->post("cri_" . $criterio->cri_id) == '0')
                $valor = null;
            else
                $valor = $this->input->post("cri_" . $criterio->cri_id);
            $this->criReu->actualizarCriterioReunion($valor, $reu_id, $criterio->cri_id);
        }
        $this->load->model('etapa2-sub23/poblacion_reunion', 'pobReu');
        $this->pobReu->actualizarPoblacionReunion($pob_comunidad, $pob_sector, $pob_institucion, $pob_id);
        $this->load->model('etapa1-sub23/reunion', 'reunion');
        $this->reunion->actualizarReunion($reu_fecha, $reu_duracion_horas, $reu_tema, $reu_resultado, $reu_observacion, $reu_id);
        redirect('componente2/comp23_E2/muestraReuniones');
    }

    public function cargarParticipantesRDM($campo, $id_campo) {
        $this->load->model('participante');
        $participantes = $this->participante->obtenerParticipantes($campo, $id_campo);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_nombre,
                $aux->par_apellido,
                strtoupper($aux->par_sexo),
                $aux->par_edad,
                $aux->par_cargo,
                $aux->par_tel
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function cargarProblemasIdentificados($valor, $campo) {
        $this->load->model('etapa2-sub23/problema_identificado', 'proIde');
        $this->load->model('etapa2-sub23/area_dimension', 'area');
        $problemas = $this->proIde->obtenerProIdePorReunion($valor, $campo);
        $numfilas = count($problemas);
        $i = 0;
        if ($numfilas != 0) {
            foreach ($problemas as $aux) {
                $rows[$i]['id'] = $aux->pro_ide_id;
                $nombreArea = $this->area->obtenerNombreAreaDimension($aux->are_dim_id);
                $rows[$i]['cell'] = array($aux->pro_ide_id,
                    $nombreArea[0]['are_dim_nombre'],
                    $aux->pro_ide_tema,
                    $aux->pro_ide_problema,
                    $aux->pro_ide_prioridad
                );
                $i++;
            }
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function gestionarProblemasIdentificados($valor, $campo) {
        $pro_ide_id = $this->input->post("id");
        $are_dim_id = $this->input->post("are_dim_id");
        $pro_ide_tema = $this->input->post("pro_ide_tema");
        $pro_ide_problema = $this->input->post("pro_ide_problema");
        $pro_ide_prioridad = $this->input->post("pro_ide_prioridad");
        $this->load->model('etapa2-sub23/problema_identificado', 'proIde');
        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->proIde->insertarProIde($valor, $campo, $are_dim_id, $pro_ide_tema, $pro_ide_problema, $pro_ide_prioridad);
                break;
            case 'edit':
                $this->proIde->actualizarProIde($are_dim_id, $pro_ide_tema, $pro_ide_problema, $pro_ide_prioridad, $pro_ide_id);
                break;
            case 'del':
                $this->proIde->eliminarProIde($pro_ide_id);
                break;
        }
    }

    public function cargarAreasDimension() {
        $this->load->model('etapa2-sub23/area_dimension', 'areDim');
        $areas = $this->areDim->obtenerAreaDimension();
        $combo = "<select name='are_dim_id'>";
        $combo.= " <option value='0'> Seleccione</option>";
        foreach ($areas as $aux)
            $combo.= " <option value='" . $aux->are_dim_id . "'>" . $aux->are_dim_nombre . "</option>";
        $combo.="</select>";

        echo $combo;
    }

    public function muestraAsociatividades() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $this->load->model('etapa2-sub23/asociatividad');
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $username = $this->tank_auth->get_username();
        $datos = $this->usuario->obtenerDepartamento($username);
        $pro_pep_id = $datos[0]->id;
        $informacion['asociatividades'] = $this->asociatividad->obtenerAsociatividades($pro_pep_id);
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/asociatividad_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function muestraAsociatividad($aso_id) {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $this->load->model('etapa2-sub23/asociatividad');
        $this->asociatividad->eliminaAsociatividad($aso_id);
        redirect('componente2/comp23_E2/muestraAsociatividades');
    }

    public function guardarAsociatividad() {
        /* VARIABLES POST */
        $aso_id = $this->input->post("aso_id");
        $aso_nombre = $this->input->post("aso_nombre");
        $aso_fecha_constitucion = $this->input->post("aso_fecha_constitucion");
        $aso_movil = $this->input->post("aso_movil");
        $aso_apoyo = $this->input->post("aso_apoyo");
        $aso_unidad_tecnica = $this->input->post("aso_unidad_tecnica");
        $tip_id = $this->input->post("selTipo");
        $this->load->model('etapa2-sub23/asociatividad');
        $this->asociatividad->actualizarAsociatividad($aso_fecha_constitucion, $aso_nombre, $aso_movil, $aso_apoyo, $aso_unidad_tecnica, $tip_id, $aso_id);
        redirect('componente2/comp23_E2/muestraAsociatividades');
    }

    public function registrarAsociatividad() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $username = $this->tank_auth->get_username();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $informacion['departamento'] = $datos[0]->Depto;
        $informacion['municipio'] = $datos[0]->Muni;
        $pro_pep_id = $datos[0]->id;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        $this->load->model('pais/departamento');
        $informacion['dep_id'] = $this->departamento->obtenerIdPorNombre($datos[0]->Depto);
        /* REGISTRAR ASOCIATIVIDAD */
        $this->load->model('etapa2-sub23/asociatividad');
        $this->asociatividad->agregarAsociatividad($pro_pep_id);
        $resultado = $this->asociatividad->obtenerId($pro_pep_id);
        $aso_id = $resultado[0]['aso_id'];
        $informacion['aso_id'] = $aso_id;
        $this->load->model('etapa2-sub23/tipo');
        $informacion['tipos'] = $this->tipo->obtenerTipos();
        /**/
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/registrarAsociatividad_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function editarAsociatividad($aso_id) {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $username = $this->tank_auth->get_username();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $informacion['departamento'] = $datos[0]->Depto;
        $informacion['municipio'] = $datos[0]->Muni;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        $this->load->model('pais/departamento');
        $informacion['dep_id'] = $this->departamento->obtenerIdPorNombre($datos[0]->Depto);
        /* REGISTRAR ASOCIATIVIDAD */
        $this->load->model('etapa2-sub23/asociatividad');
        $resultado = $this->asociatividad->obtenerAsociatividadId($aso_id);
        $informacion['aso_id'] = $aso_id;
        $informacion['aso_nombre'] = $resultado[0]['aso_nombre'];
        $informacion['aso_fecha_constitucion'] = $resultado[0]['aso_fecha_constitucion'];
        $informacion['aso_movil'] = $resultado[0]['aso_movil'];
        $informacion['aso_apoyo'] = $resultado[0]['aso_apoyo'];
        $informacion['aso_unidad_tecnica'] = $resultado[0]['aso_unidad_tecnica'];
        $informacion['tip_id'] = $resultado[0]['tip_id'];

        $this->load->model('etapa2-sub23/tipo');
        $informacion['tipos'] = $this->tipo->obtenerTipos();
        /**/
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/editarAsociatividad_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarParticipantesAP($campo, $id_campo) {
        $this->load->model('participante');
        $participantes = $this->participante->obtenerParticipantes($campo, $id_campo);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_nombre,
                $aux->par_apellido,
                $aux->par_email,
                $aux->par_tel,
                $aux->par_direccion
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function cargarParticipanteGG($campo, $id_campo) {
        $this->load->model('participante');
        $participantes = $this->participante->obtenerParticipantes($campo, $id_campo);
        $numfilas = count($participantes);
        $i = 0;
        if ($numfilas != 0) {
            foreach ($participantes as $aux) {
                switch ($aux->par_tipo) {
                    case 'C':
                        $tipo = "Comunidad";
                        break;
                    case 'S':
                        $tipo = "Sector";
                        break;
                    case 'I':
                        $tipo = "institución";
                        break;
                    default :
                        $tipo = "";
                        break;
                }

                $rows[$i]['id'] = $aux->par_id;
                $rows[$i]['cell'] = array($aux->par_id,
                    $aux->par_dui,
                    $aux->par_nombre,
                    $aux->par_apellido,
                    strtoupper($aux->par_sexo),
                    $aux->par_edad,
                    $tipo,
                    $aux->par_cargo,
                    $aux->par_tel
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function gestionParticipantes($campo, $id_campo) {
        /* VARIABLES POST */
        /* LOS COMUNES */
        $par_id = $this->input->post("id");
        $par_nombre = $this->input->post("par_nombre");
        $par_apellido = $this->input->post("par_apellido");
        $operacion = $this->input->post('oper');
        /* LOS VARIABLES */
        $par_sexo = $this->input->post("par_sexo");
        if ($par_sexo == '0')
            $ins_id = null;
        else {
            $par_sexo = strtoupper($this->input->post("par_sexo"));
        }
        $par_cargo = $this->input->post("par_cargo");
        if ($par_cargo == '0')
            $par_cargo = null;
        $ins_id = $this->input->post("par_institucion");
        if ($ins_id == 0)
            $ins_id = null;
        $par_tel = $this->input->post("par_tel");
        if ($par_tel == 0)
            $par_tel = null;
        $par_direccion = $this->input->post("par_direccion");
        if ($par_direccion == '0')
            $par_direccion = null;
        $par_dui = $this->input->post("par_dui");
        if ($par_dui == 0)
            $par_dui = null;
        $par_edad = $this->input->post("par_edad");
        if ($par_edad == 0)
            $par_edad = null;
        $par_proviene = $this->input->post("par_proviene");
        if ($par_proviene == 0)
            $par_proviene = null;
        $par_nivel_esco = $this->input->post("par_nivel_esco");
        if ($par_nivel_esco == '0')
            $par_nivel_esco = null;
        $par_email = $this->input->post("par_email");
        if ($par_email == '0')
            $par_email = null;
        $par_tipo = $this->input->post("par_tipo");
        if ($par_tipo == '0')
            $par_tipo = null;
        /* FIN DE VARIABLES */
        $this->load->model('participante');
        switch ($operacion) {
            case 'add':
                $this->participante->agregarParticipantes2($campo, $id_campo, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco, $par_direccion, $par_email, $par_tipo);
                break;
            case 'edit':
                $this->participante->editarParticipantes2($par_id, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco, $par_direccion, $par_email, $par_tipo);
                break;
            case 'del':
                $this->participante->eliminarParticipantes($par_id);
                break;
        }
    }

    public function cargarMunicipio($dep_id) {
        //PARA CREAR LA LISTA DESPLEGABLE DE LA INSTITUCION
        $this->load->model('pais/municipio');
        $municipios = $this->municipio->obtenerMunicipioPorDepartamento($dep_id);
        $combo = "<select name='int_aso_nombre'>";
        $combo.= " <option value='0'> Seleccione</option>";
        foreach ($municipios as $aux)
            $combo.= " <option value='" . $aux->mun_nombre . "'>" . $aux->mun_nombre . "</option>";
        $combo.="</select>";

        echo $combo;
    }

    public function cargarIntegradores($aso_id) {
        $this->load->model('etapa2-sub23/integrante_asociatividad', 'integrante');
        $integradores = $this->integrante->obtenerIntegranteAsociatividades($aso_id);
        $numfilas = count($integradores);

        $i = 0;
        if ($numfilas != 0) {
            foreach ($integradores as $aux) {
                $rows[$i]['id'] = $aux->int_aso_id;
                $rows[$i]['cell'] = array($aux->int_aso_id,
                    $aux->int_aso_nombre
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function gestionarIntegradores($aso_id) {
        /* VARIABLES POST */
        /* LOS COMUNES */
        $int_aso_id = $this->input->post("id");
        $int_aso_nombre = $this->input->post("int_aso_nombre");
        $operacion = $this->input->post('oper');

        /* FIN DE VARIABLES */
        $this->load->model('etapa2-sub23/integrante_asociatividad', 'integrante');
        switch ($operacion) {
            case 'add':
                $this->integrante->agregarIntegranteAsociatividad($int_aso_nombre, $aso_id);
                break;
            case 'edit':
                $this->integrante->modificarIntegranteAsociatividad($int_aso_id, $int_aso_nombre);
                break;
            case 'del':
                $this->integrante->eliminarIntegranteAsociatividad($int_aso_id);
                break;
        }
    }

    public function grupoGestor() {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $username = $this->tank_auth->get_username();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $informacion['departamento'] = $datos[0]->Depto;
        $informacion['municipio'] = $datos[0]->Muni;
        //PROYECTO PEP ASOCIADO
        $pro_pep_id = $datos[0]->id;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        /* FIN OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('etapa2-sub23/grupo_gestor', 'gruGes');
        $this->load->model('etapa2-sub23/criterio_grupo_gestor', 'criterioGruGes');

        $numGruGes = $this->gruGes->contarGruGesPorPep($pro_pep_id);
        if ($numGruGes == 0) {
            $this->gruGes->agregarGruGes($pro_pep_id);
            $idGruGes = $this->gruGes->obtenerIdGruGes($pro_pep_id);
            $gru_ges_id = $idGruGes[0]['gru_ges_id'];
            $this->load->model('proyectoPep/proyecto_pep', 'proPep');
            $this->proPep->actualizarIndices('gru_ges_id', $gru_ges_id, $pro_pep_id);
            //CARGAR CRITERIOS
            $this->load->model('etapa1-sub23/criterio');
            $criterios = $this->criterio->obtenerCriterios();
            foreach ($criterios as $criteAux)
                $this->criterioGruGes->insertarCriterioGruGes($gru_ges_id, $criteAux->cri_id);
        } else {
            $idGruGes = $this->gruGes->obtenerIdGruGes($pro_pep_id);
            $gru_ges_id = $idGruGes[0]['gru_ges_id'];
            $grupoGestor = $this->gruGes->obtenerGruGes($gru_ges_id);
            $informacion['gru_ges_lugar'] = $grupoGestor[0]['gru_ges_lugar'];
            $informacion['gru_ges_fecha'] = $grupoGestor[0]['gru_ges_fecha'];
            $informacion['gru_ges_observacion'] = $grupoGestor[0]['gru_ges_observacion'];
            $informacion['gru_ges_acuerdo'] = $grupoGestor[0]['gru_ges_acuerdo'];
        }
        $informacion['gru_ges_id'] = $gru_ges_id;
        $informacion['criterios'] = $this->criterioGruGes->obtenerLosCriteriosGruGes($gru_ges_id);
        /* CARGA DE PLANTILLAS */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/grupoGestor_view', $informacion);
        $this->load->view('plantilla/footer');
    }

    public function guardarGrupoGestor() {
        /* VARIABLES POST */
        $gru_ges_id = $this->input->post("gru_ges_id");
        $gru_ges_lugar = $this->input->post("gru_ges_lugar");
        $gru_ges_fecha = $this->input->post("gru_ges_fecha");
        if ($gru_ges_fecha == "")
            $gru_ges_fecha = null;
        $gru_ges_acuerdo = $this->input->post("gru_ges_acuerdo");
        if ($gru_ges_acuerdo == '0')
            $gru_ges_acuerdo = null;
        $gru_ges_observacion = $this->input->post("gru_ges_observacion");

        $this->load->model('etapa2-sub23/criterio_grupo_gestor', 'criGruGes');
        $criterios = $this->criGruGes->obtenerLosCriteriosGruGes($gru_ges_id);
        foreach ($criterios as $criterio) {
            if ($this->input->post("cri_" . $criterio->cri_id) == '0')
                $valor = null;
            else
                $valor = $this->input->post("cri_" . $criterio->cri_id);
            $this->criGruGes->actualizarCriterioGruGes($valor, $gru_ges_id, $criterio->cri_id);
        }

        $this->load->model('etapa2-sub23/grupo_gestor', 'gruGes');
        $this->gruGes->actualizarGruGes($gru_ges_id, $gru_ges_lugar, $gru_ges_fecha, $gru_ges_acuerdo, $gru_ges_observacion);
        redirect('componente2/comp23_E2/grupoGestor');
    }

    public function capacitacionGrupoGestor() {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $username = $this->tank_auth->get_username();
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $pro_pep_id = $datos[0]->id;
        $this->load->model('etapa1-sub23/capacitacion');
        $informacion['capacitaciones'] = $this->capacitacion->obtenerCapacitaciones($pro_pep_id, 2);
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/capacitacion_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarParticipanteGGCap($id, $cap_id) {
        $this->load->model('participante');
        $this->load->model('etapa1-sub23/participante_capacitacion', 'parCap');
        $participantes = $this->participante->obtenerParticipantesGG($id);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {

            $resultado = $this->parCap->obtenerParticipantesCap($cap_id, $aux->par_id);
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_dui,
                $aux->par_nombre . ' ' . $aux->par_apellido,
                strtoupper($aux->par_sexo),
                $aux->par_cargo,
                $aux->par_tel,
                $resultado[0]['par_cap_participa']
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function cargarParticipanteGGDef($id, $def_id) {
        $this->load->model('participante');
        $this->load->model('etapa2-sub23/participante_definicion', 'parDef');
        $participantes = $this->participante->obtenerParticipantesGG($id);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            $resultado = $this->parDef->obtenerParticipantesDef($def_id, $aux->par_id);
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_dui,
                $aux->par_nombre . ' ' . $aux->par_apellido,
                strtoupper($aux->par_sexo),
                $aux->par_cargo,
                $aux->par_tel,
                $resultado[0]['par_def_participa']
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function cargarParticipanteGGPri($id, $pri_id) {
        $this->load->model('participante');
        $this->load->model('etapa2-sub23/participante_priorizacion', 'parPri');
        $participantes = $this->participante->obtenerParticipantesGG($id);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            $resultado = $this->parPri->obtenerParticipantesPri($pri_id, $aux->par_id);
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_dui,
                $aux->par_nombre . ' ' . $aux->par_apellido,
                strtoupper($aux->par_sexo),
                $aux->par_cargo,
                $aux->par_tel,
                $resultado[0]['par_pri_participa']
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function gestionParticipantesDef($def_id) {
        /* VARIABLES POST */
        $par_id = $this->input->post("id");
        $par_def_participa = $this->input->post("par_def_participa");

        $this->load->model('etapa2-sub23/participante_definicion', 'parDef');

        $this->parDef->actualizaParticipa($def_id, $par_id, $par_def_participa);
    }

    public function gestionParticipantesPri($pri_id) {
        /* VARIABLES POST */
        $par_id = $this->input->post("id");
        $par_pri_participa = $this->input->post("par_pri_participa");

        $this->load->model('etapa2-sub23/participante_priorizacion', 'parPri');

        $this->parPri->actualizaParticipa($pri_id, $par_id, $par_pri_participa);
    }

    public function registrarCapacitacion() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $username = $this->tank_auth->get_username();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($username);
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $informacion['departamento'] = $datos[0]->Depto;
        $informacion['municipio'] = $datos[0]->Muni;
        $pro_pep_id = $datos[0]->id;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $resultado = $this->proPep->obtenerGrupoApoyo($pro_pep_id);
        $gru_ges_id = $resultado[0]['gru_ges_id'];
        $informacion['gru_ges_id'] = $gru_ges_id;
        /* CREAR MODELO PARA CAPACITACIÓN */
        $this->load->model('etapa1-sub23/capacitacion');
        $this->capacitacion->agregarCapacitacion($pro_pep_id, 2);
        $resultado = $this->capacitacion->obtenerIdCapacitacion($pro_pep_id, 2);
        $cap_id = $resultado[0]['cap_id'];
        /* OBTENER EL GRUPO LOCAL DE APOYO */
        $this->load->model('participante');
        $this->load->model('etapa1-sub23/participante_capacitacion', 'parCap');
        $participantes = $this->participante->obtenerParticipantesGG($gru_ges_id);
        foreach ($participantes as $aux)
            $resultado = $this->parCap->insertarParticipa($cap_id, $aux->par_id);
        /**/
        $informacion['cap_id'] = $cap_id;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/registrarCapacitacionEA_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function editarCapacitacion($cap_id) {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $username = $this->tank_auth->get_username();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($username);
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $informacion['departamento'] = $datos[0]->Depto;
        $informacion['municipio'] = $datos[0]->Muni;
        $pro_pep_id = $datos[0]->id;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $resultado = $this->proPep->obtenerGrupoApoyo($pro_pep_id);
        $informacion['gru_ges_id'] = $resultado[0]['gru_ges_id'];

        /* CREAR MODELO PARA CAPACITACIÒN */
        $this->load->model('etapa1-sub23/capacitacion');
        $resultado = $this->capacitacion->obtenerCapacitacion($cap_id);
        $informacion['cap_id'] = $resultado[0]['cap_id'];
        $informacion['cap_fecha'] = $resultado[0]['cap_fecha'];
        $informacion['cap_tema'] = $resultado[0]['cap_tema'];
        $informacion['cap_lugar'] = $resultado[0]['cap_lugar'];
        $informacion['cap_observacion'] = $resultado[0]['cap_observacion'];
        $informacion['cap_area'] = $resultado[0]['cap_area'];

        /* FIN DE OBTENER DATOS DE CAPACITACIÒN */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/editarCapacitacionEA_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarCapacitacion($cap_id) {
        /* VARIABLES POST */
        $cap_fecha = $this->input->post("cap_fecha");
        $cap_lugar = $this->input->post("cap_lugar");
        $cap_area = $this->input->post("cap_area");
        $cap_observacion = $this->input->post("cap_observacion");
        $cap_tema = $this->input->post("cap_tema");

        $this->load->model('etapa1-sub23/capacitacion');
        $this->capacitacion->editarCapacitacion($cap_fecha, $cap_lugar, $cap_id, $cap_area, $cap_observacion, $cap_tema);
        redirect('componente2/comp23_E2/capacitacionGrupoGestor');
    }

    public function cancelaCapacitacion($cap_id) {
        $this->load->model('etapa1-sub23/capacitacion');
        $this->capacitacion->eliminaCapacitacion($cap_id);
        redirect('componente2/comp23_E2/capacitacionGrupoGestor');
    }

    public function definicionTema() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $username = $this->tank_auth->get_username();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($username);
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $informacion['departamento'] = $datos[0]->Depto;
        $informacion['municipio'] = $datos[0]->Muni;
        $pro_pep_id = $datos[0]->id;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $resultado = $this->proPep->obtenerGrupoApoyo($pro_pep_id);
        $gru_ges_id = $resultado[0]['gru_ges_id'];
        $informacion['gru_ges_id'] = $gru_ges_id;
        /* CREAR MODELO PARA CAPACITACIÓN */
        /* OBTENER EL GRUPO LOCAL DE APOYO */
        $this->load->model('etapa2-sub23/definicion');
        $this->load->model('etapa2-sub23/participante_definicion', 'parDef');

        $numDef = $this->definicion->contarDefPorPep($pro_pep_id);
        if ($numDef == 0) {
            $this->definicion->agregarDef($pro_pep_id);
            $idDef = $this->definicion->obtenerIdDef($pro_pep_id);
            $def_id = $idDef[0]['def_id'];
            $this->load->model('proyectoPep/proyecto_pep', 'proPep');
            $this->proPep->actualizarIndices('def_id', $def_id, $pro_pep_id);
            $this->load->model('participante');
            $participantes = $this->participante->obtenerParticipantesGG($gru_ges_id);
            foreach ($participantes as $aux)
                $resultado = $this->parDef->insertarParticipa($def_id, $aux->par_id);
        } else {
            $idDef = $this->definicion->obtenerIdDef($pro_pep_id);
            $def_id = $idDef[0]['def_id'];
            $definicion = $this->definicion->obtenerDef($def_id);
            $informacion['def_fecha'] = $definicion[0]['def_fecha'];
            $informacion['def_ruta_archivo'] = $definicion[0]['def_ruta_archivo'];
            $informacion['nombreArchivo'] =end(explode("/", $definicion[0]['def_ruta_archivo'])); 
        }
        $informacion['gru_ges_id'] = $gru_ges_id;
        $informacion['def_id'] = $def_id;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/definicion_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarDefinicionTema($def_id) {
        /* VARIABLES POST */
        $def_fecha = $this->input->post("def_fecha");
        $def_ruta_archivo = $this->input->post("def_ruta_archivo");
        $def_observacion = $this->input->post("def_observacion");

        $this->load->model('etapa2-sub23/definicion');
        $this->definicion->actualizarDef($def_id, $def_fecha, $def_ruta_archivo);
        redirect('componente2/comp23_E2/definicionTema');
    }

    public function priorizacion() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $username = $this->tank_auth->get_username();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($username);
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $informacion['departamento'] = $datos[0]->Depto;
        $informacion['municipio'] = $datos[0]->Muni;
        $pro_pep_id = $datos[0]->id;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $resultado = $this->proPep->obtenerGrupoApoyo($pro_pep_id);
        $gru_ges_id = $resultado[0]['gru_ges_id'];
        $informacion['gru_ges_id'] = $gru_ges_id;
        /* CREAR MODELO PARA CAPACITACIÓN */
        /* OBTENER EL GRUPO LOCAL DE APOYO */
        $this->load->model('etapa2-sub23/priorizacion');
        $this->load->model('etapa2-sub23/participante_priorizacion', 'parPri');
        $numPri = $this->priorizacion->contarPriPorPep($pro_pep_id);
        if ($numPri == 0) {
            $this->priorizacion->agregarPri($pro_pep_id);
            $idPri = $this->priorizacion->obtenerIdPri($pro_pep_id);
            $pri_id = $idPri[0]['pri_id'];
            $this->load->model('proyectoPep/proyecto_pep', 'proPep');
            $this->proPep->actualizarIndices('pri_id', $pri_id, $pro_pep_id);
            $this->load->model('participante');
            $participantes = $this->participante->obtenerParticipantesGG($gru_ges_id);
            foreach ($participantes as $aux)
                $resultado = $this->parPri->insertarParticipa($pri_id, $aux->par_id);
        } else {
            $idPri = $this->priorizacion->obtenerIdPri($pro_pep_id);
            $pri_id = $idPri[0]['pri_id'];
            $priorizacion = $this->priorizacion->obtenerPri($pri_id);
            $informacion['pri_fecha'] = $priorizacion[0]['pri_fecha'];
            $informacion['pri_observacion'] = $priorizacion[0]['pri_observacion'];
        }
        $informacion['gru_ges_id'] = $gru_ges_id;
        $informacion['pri_id'] = $pri_id;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/priorizacion_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarPriorizacion($pri_id) {
        /* VARIABLES POST */
        $pri_fecha = $this->input->post("pri_fecha");
        $pri_observacion = $this->input->post("pri_observacion");

        $this->load->model('etapa2-sub23/priorizacion');
        $this->priorizacion->actualizarPri($pri_id, $pri_fecha, $pri_observacion);
        redirect('componente2/comp23_E2/priorizacion');
    }

    public function cargarProyectosIdentificados($pri_id) {
        $this->load->model('etapa2-sub23/proyecto_identificado', 'proIden');
        $proyectos = $this->proIden->obtenerProIde($pri_id);
        $numfilas = count($proyectos);

        $i = 0;
        if ($numfilas != 0) {
            foreach ($proyectos as $aux) {
                switch ($aux->pro_ide_ff) {
                    case 'GL':
                        $ff = 'Gobierno Local';
                        break;
                    case 'GC':
                        $ff = 'Gobierno Central';
                        break;
                }
                switch ($aux->pro_ide_estado) {
                    case 'I':
                        $estado = 'Identificado';
                        break;
                    case 'P':
                        $estado = 'Perfil';
                        break;
                    case 'G':
                        $estado = 'Gestión';
                        break;
                    case 'E':
                        $estado = 'En Ejecución';
                        break;
                    case 'F':
                        $estado = 'Finalizado';
                        break;
                }
                $rows[$i]['id'] = $aux->pro_ide_id;
                $rows[$i]['cell'] = array($aux->pro_ide_id,
                    $aux->pro_ide_nombre,
                    $aux->pro_ide_ubicacion,
                    $ff,
                    $aux->pro_ide_monto,
                    $aux->pro_ide_plazoejec,
                    $aux->pro_ide_pbh,
                    $aux->pro_ide_pbm,
                    $aux->pro_ide_prioridad,
                    $estado
                );
                $i++;
            }
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function gestionarProyectosIdentificados($pri_id) {

        $pro_ide_id = $this->input->post("id");
        $pro_ide_nombre = $this->input->post("pro_ide_nombre");
        $pro_ide_ubicacion = $this->input->post("pro_ide_ubicacion");
        $pro_ide_ff = $this->input->post("pro_ide_ff");
        $pro_ide_monto = $this->input->post("pro_ide_monto");
        $pro_ide_plazoejec = $this->input->post("pro_ide_plazoejec");
        $pro_ide_pbh = $this->input->post("pro_ide_pbh");
        $pro_ide_pbm = $this->input->post("pro_ide_pbm");
        $pro_ide_prioridad = $this->input->post("pro_ide_prioridad");
        $pro_ide_estado = $this->input->post("pro_ide_estado");
        $pro_ide_ruta_archivo = $this->input->post("pro_ide_ruta_archivo");

        $operacion = $this->input->post('oper');

        /* FIN DE VARIABLES */
        $this->load->model('etapa2-sub23/proyecto_identificado', 'proIden');
        switch ($operacion) {
            case 'add':
                $this->proIden->agregarProIde($pro_ide_nombre, $pro_ide_ubicacion, $pro_ide_ff, $pro_ide_monto, $pro_ide_plazoejec, $pro_ide_pbh, $pro_ide_pbm, $pro_ide_prioridad, $pro_ide_estado, $pro_ide_ruta_archivo, $pri_id);
                break;
            case 'edit':
                $this->proIden->editarProIde($pro_ide_id, $pro_ide_nombre, $pro_ide_ubicacion, $pro_ide_ff, $pro_ide_monto, $pro_ide_plazoejec, $pro_ide_pbh, $pro_ide_pbm, $pro_ide_prioridad, $pro_ide_estado, $pro_ide_ruta_archivo);
                break;
            case 'del':
                $this->proIden->eliminarProIden($pro_ide_id);
                break;
        }
    }

    public function diagnostico() {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $username = $this->tank_auth->get_username();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        /* OBTENER DEPARTAMENTO Y MUNICIPIO DEL USUARIO */
        $this->load->model('tank_auth/users', 'usuario');
        $datos = $this->usuario->obtenerDepartamento($username);
        $informacion['departamento'] = $datos[0]->Depto;
        $informacion['municipio'] = $datos[0]->Muni;
        //PROYECTO PEP ASOCIADO
        $pro_pep_id = $datos[0]->id;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        $informacion['pro_pep_id'] = $pro_pep_id;
        /* INFORME PRELIMINAR ASPECTOS IMPORTANTES */
        $this->load->model('cumplimiento_minimo', 'cumm');
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        //CUMPLIMIENTOS MINIMOS
        $cumplimientosMinimos = $this->cumm->obtenerCumplimientoMinimo(2);
        /* INFORMACIÓN DEL INFORME PRELIMINAR */
        $this->load->model('etapa2-sub23/diagnostico', 'Dia');
        $resultado = $this->Dia->contarDiaPorPep($pro_pep_id);
        $this->load->model('etapa2-sub23/cumplimiento_diagnostico', 'cumDia');
        if ($resultado == '0') {
            $this->Dia->agregarDia($pro_pep_id);
            $resultado = $this->Dia->obtenerDia($pro_pep_id);
            $this->load->model('proyectoPep/proyecto_pep', 'proPep');
            $this->proPep->actualizarIndices('dia_id', $resultado[0]['dia_id'], $pro_pep_id);
            foreach ($cumplimientosMinimos as $aux)
                $this->cumDia->insertarCumplimientoDiag($resultado[0]['dia_id'], $aux->cum_min_id);
        } else {
            $resultado = $this->Dia->obtenerDia($pro_pep_id);
        }
        $informacion['dia_id'] = $resultado[0]['dia_id'];
        $informacion['dia_fecha_borrador'] = $resultado[0]['dia_fecha_borrador'];
        $informacion['dia_fecha_observacion'] = $resultado[0]['dia_fecha_observacion'];
        $informacion['dia_fecha_concejo_muni'] = $resultado[0]['dia_fecha_concejo_muni'];
        $informacion['dia_vision'] = $resultado[0]['dia_vision'];
        $informacion['dia_observacion'] = $resultado[0]['dia_observacion'];
        $informacion['dia_ruta_archivo'] = $resultado[0]['dia_ruta_archivo'];
        $informacion['nombreArchivo'] =end(explode("/", $resultado[0]['dia_ruta_archivo'])); 
        $informacion['cumplimientosMinimos'] = $this->cumDia->obtenerLosCumplimientosDiagnostico($resultado[0]['dia_id']);
        /* FIN DE INFORME PRELIMINAR */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa2/diagnostico_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarDiagnostico($dia_id) {
        /* VARIABLES POST */
        $dia_fecha_borrador = $this->input->post("dia_fecha_borrador");
        if ($dia_fecha_borrador == '')
            $dia_fecha_borrador = null;
        $dia_fecha_observacion = $this->input->post("dia_fecha_observacion");
        if ($dia_fecha_observacion == '')
            $dia_fecha_observacion = null;
        $dia_fecha_concejo_muni = $this->input->post("dia_fecha_concejo_muni");
        if ($dia_fecha_concejo_muni == '')
            $dia_fecha_concejo_muni = null;
        $dia_vision = $this->input->post("dia_vision");
        if ($dia_vision == '0')
            $dia_vision = null;
        $dia_observacion = $this->input->post("dia_observacion");
        $dia_ruta_archivo = $this->input->post("dia_ruta_archivo");
        /* OBTENIENDO VALORES DE LOS CRITERIOS */
        $this->load->model('etapa2-sub23/cumplimiento_diagnostico', 'cumDia');
        $cumplimientos = $this->cumDia->obtenerLosCumplimientosDiagnostico($dia_id);
        foreach ($cumplimientos as $cumplimiento_minimo) {
            if ($this->input->post("cum_" . $cumplimiento_minimo->cum_min_id) == '0')
                $valor = null;
            else
                $valor = $this->input->post("cum_" . $cumplimiento_minimo->cum_min_id);
            $this->cumDia->actualizarCumplimientoDiag($valor, $dia_id, $cumplimiento_minimo->cum_min_id);
        }

        /* ACTUALIZANDO ACUERDO MUNICIPAL */
        $this->load->model('etapa2-sub23/diagnostico', 'Dia');
        $this->Dia->actualizarDia($dia_id, $dia_fecha_borrador, $dia_fecha_concejo_muni, $dia_fecha_observacion, $dia_observacion, $dia_ruta_archivo, $dia_vision);

        redirect(base_url('componente2/comp23_E2/diagnostico'));
    }

}

?>
