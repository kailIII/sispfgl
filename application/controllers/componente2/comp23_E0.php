<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 1
 * Del PEP por los consultores asignados.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp23_E0 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /* Gestion de Criterios */

    public function cargarCriterios() {
        $this->load->model('etapa0-sub23/criterio_e0', 'criterio');
        $criterios = $this->criterio->obtenerCriterios();
        $numfilas = count($criterios);

        if ($numfilas != 0) {
            $i = 0;
            foreach ($criterios as $aux) {
                $rows[$i]['id'] = $aux->criterio_id;
                $rows[$i]['cell'] = array($aux->criterio_id, $aux->criterio_nombre);
                $i++;
            }
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ');
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 15) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

// http://localhost/sispfgl/gestionCriterios
    public function gestionCriterios() {
        $informacion['titulo'] = 'Gestion de Criterios';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/crudCriterios_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function gestionarCriterios() {
        /* VARIABLES POST */

        $criterio_id = $this->input->post("id");
        $criterio_nombre = $this->input->post("criterio_nombre");
        $operacion = $this->input->post('oper');
        /* FIN DE VARIABLES */
        $this->load->model('etapa0-sub23/criterio_e0', 'criterio');
        switch ($operacion) {
            case 'add':
                $this->criterio->agregarCriterio($criterio_nombre);
                break;
            case 'edit':
                $this->criterio->editarCriterio($criterio_id, $criterio_nombre);
                break;
            case 'del':
                $this->criterio->eliminarCriterio($criterio_id);
                break;
        }
    }

    /* Solicitud de asitencia tecnica */

    public function cargarSolicitudes($mun_id) {
        $this->load->model('etapa0-sub23/solicitud_asistencia', 'solicitud');
        $solicitudes = $this->solicitud->obtenerSolicitudesPorMuni($mun_id);
        $numfilas = count($solicitudes);

        if ($numfilas != 0) {
            $i = 0;
            foreach ($solicitudes as $aux) {
                $rows[$i]['id'] = $aux->sol_asis_id;
                $rows[$i]['cell'] = array($aux->sol_asis_id,
                    date('d/m/Y', strtotime($aux->fecha_solicitud)),
                    $aux->nombre_solicitante,
                    $aux->cargo,
                    $aux->telefono
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ', ' ', ' ', ' ');
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 15) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function gestionSolicitudAsistencia() {

        $informacion['titulo'] = 'Solicitud de Asistencia Técnica';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('pais/departamento', 'depar');
        $departamentos = $this->depar->obtenerDepartamentos();
        $informacion['departamentos'] = $departamentos;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/gestionSolicitudAsistencia_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function modificarSolicitudAsistencia() {
        $informacion['titulo'] = 'Solicitud de Asistencia Técnica';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

        $this->load->model('pais/municipio');

        $nombre = $this->municipio->obtenerNomMunDep($this->input->post('selMun'));
        $informacion['departamento'] = $nombre[0]->depto;
        $informacion['municipio'] = $nombre[0]->muni;
        $informacion['id_mun'] = $this->input->post('selMun');

        $id_solicitud = $this->input->post("idfila");
        $informacion['idfila'] = $this->input->post("idfila");
        $this->load->model('etapa0-sub23/solicitud_asistencia', 'solicitud');
        $tuplaSolicitud = $this->solicitud->obtenerSolicitudPorId($id_solicitud);

        $informacion['nombre_solicitante'] = $tuplaSolicitud[0]->nombre_solicitante;
        $informacion['cargo'] = $tuplaSolicitud[0]->cargo;
        $informacion['telefono'] = $tuplaSolicitud[0]->telefono;
        $informacion['sol_asis_ruta_archivo'] = $tuplaSolicitud[0]->sol_asis_ruta_archivo;
        $informacion['nombreArchivo'] = end(explode("/", $tuplaSolicitud[0]->sol_asis_ruta_archivo));
        $informacion['leido_cri'] = $tuplaSolicitud[0]->c1;
        $informacion['cumple_cri'] = $tuplaSolicitud[0]->c2;
        $informacion['solicitud_fecha'] = $tuplaSolicitud[0]->fecha_solicitud;
        $informacion['comentarios'] = $tuplaSolicitud[0]->comentarios;

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/modificarSolicitudAsistencia_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function agregarsolicitudAsistencia() {
        $informacion['titulo'] = 'Solicitud de Asistencia Técnica';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('pais/municipio');
        $nombre = $this->municipio->obtenerNomMunDep($this->input->post('selMun'));
        $informacion['departamento'] = $nombre[0]->depto;
        $informacion['municipio'] = $nombre[0]->muni;
        $informacion['selMun'] = $this->input->post('selMun');
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/solicitudAsistencia_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarsolicitud() {
        /* VARIABLES POST */
        $c1 = $this->input->post("leido_cri");
        $c2 = $this->input->post("cumple_cri");
        $mun_id = $this->input->post("selMun");
        $fecha_solicitud = $this->input->post("solicitud_fecha");
        if ($fecha_solicitud == '')
            $fecha_solicitud = null;
        $nombre_solicitante = $this->input->post("nombre_solicitante");
        $cargo = $this->input->post("cargo");
        $telefono = $this->input->post("telefono");
        $comentarios = $this->input->post('comentarios');
        $sol_asis_ruta_archivo = $this->input->post('sol_asis_ruta_archivo');

        $this->load->model('etapa0-sub23/solicitud_asistencia', 'sol_asistencia');
        $this->sol_asistencia->agregarSolictudAsistencia($c1, $c2, $mun_id, $fecha_solicitud, $nombre_solicitante, $cargo, $telefono, $comentarios, $sol_asis_ruta_archivo);
        redirect('componente2/comp23_E0/gestionsolicitudAsistencia');
    }

    public function actualizarSolicitud() {
        /* VARIABLES POST */
        $sol_asis_id = $this->input->post("idfila");
        $c1 = $this->input->post("leido_cri");
        $c2 = $this->input->post("cumple_cri");
        $mun_id = $this->input->post("id_mun");
        $fecha_solicitud = $this->input->post("solicitud_fecha");
        if ($fecha_solicitud == '')
            $fecha_solicitud = null;
        $nombre_solicitante = $this->input->post("nombre_solicitante");
        $cargo = $this->input->post("cargo");
        $telefono = $this->input->post("telefono");
        $comentarios = $this->input->post('comentarios');
        $sol_asis_ruta_archivo = $this->input->post('sol_asis_ruta_archivo');

        $this->load->model('etapa0-sub23/solicitud_asistencia', 'sol_asistencia');
        $this->sol_asistencia->ActualizarSolictudAsistencia($sol_asis_id, $c1, $c2, $mun_id, $fecha_solicitud, $nombre_solicitante, $cargo, $telefono, $comentarios, $sol_asis_ruta_archivo);
        redirect('componente2/comp23_E0/gestionsolicitudAsistencia');
    }

    public function borrarSolicitud() {
        $sol_asis_id = $this->input->post("id");
        $operacion = $this->input->post("oper");
        $this->load->model('etapa0-sub23/solicitud_asistencia', 'solicitud');
        switch ($operacion) {
            case 'add':
                echo 'no se puede';
                break;
            case 'edit':
                echo 'no se puede';
                break;
            case 'del':
                $this->solicitud->eliminarSolicitud($sol_asis_id);
                break;
        }
    }

    /* Integracion de Grupos     */

    public function integracionDeGrupos() {

        $informacion['titulo'] = 'Registro de Intregación de Grupos';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('pais/region');
        $informacion['regiones'] = $this->region->obtenerRegiones();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/integracionDeGrupos_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    /* Fin de Integracion de Grupos
     */

    /* Plan de Trabajo de Consultora */

    public function planTrabajoConsultora() {
        $informacion['titulo'] = 'Solicitud de Asistencia Técnica';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('pais/departamento', 'depar');
        $departamentos = $this->depar->obtenerDepartamentos();
        $informacion['departamentos'] = $departamentos;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/planTrabajoConsul_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarPlanTrabajo() {
        /* VARIABLES POST */
        $leido_cri = $this->input->post("leido_cri");
        $cumple_cri = $this->input->post("cumple_cri");

        $solicitud_fecha = $this->input->post("solicitud_fecha");
        if ($acu_mun_fecha == '')
            $acu_mun_fecha = null;
        $acu_mun_p2 = $this->input->post("acu_mun_p2");
        $acu_mun_observacion = $this->input->post("acu_mun_observacion");
        $acu_mun_ruta_archivo = $this->input->post("acu_mun_ruta_archivo");
    }

    /* Registro de aporte de la Municipalidad */

    public function registroAporteMunicipal() {
        $informacion['titulo'] = 'Registro de Aporte a la Municipalidad';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('pais/departamento', 'depar');
        $departamentos = $this->depar->obtenerDepartamentos();
        $informacion['departamentos'] = $departamentos;

        $this->load->model('etapa', 'eta');
        $etapas = $this->eta->obtenerEtapas();
        $informacion['etapas'] = $etapas;

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/registroAporteMunicipal_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarResgitrodeAporte() {
        /* VARIABLES POST */
        $leido_cri = $this->input->post("leido_cri");
        $cumple_cri = $this->input->post("cumple_cri");

        $solicitud_fecha = $this->input->post("solicitud_fecha");
        if ($acu_mun_fecha == '')
            $acu_mun_fecha = null;
        $acu_mun_p2 = $this->input->post("acu_mun_p2");
        $acu_mun_observacion = $this->input->post("acu_mun_observacion");
        $acu_mun_ruta_archivo = $this->input->post("acu_mun_ruta_archivo");
    }

    /* Seleccion de municipios por el comite interinstitucional */

    public function comiteInterinstitucional() {
        $informacion['titulo'] = 'Seleccion de Municipios por el Comite Interinstitucional';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/comiteInterinstitucional_view');
        $this->load->view('plantilla/footer', $informacion);
    }

}

?>
