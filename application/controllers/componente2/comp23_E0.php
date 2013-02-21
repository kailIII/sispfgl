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
        $rows = array();
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
        $this->load->model('etapa0-sub23/criterio_e0', 'criterio');
        $criterios = $this->criterio->obtenerCriterios();
        $informacion['criterios'] = $criterios;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/modificarSolicitudAsistencia_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function agregarSolicitudAsistencia() {
        $informacion['titulo'] = 'Solicitud de Asistencia Técnica';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('pais/municipio');
        $nombre = $this->municipio->obtenerNomMunDep($this->input->post('selMun'));
        $informacion['departamento'] = $nombre[0]->depto;
        $informacion['municipio'] = $nombre[0]->muni;
        $mun_id = $this->input->post('selMun');
        $informacion['id_mun'] = $mun_id;
        $this->load->model('etapa0-sub23/solicitud_asistencia', 'solAsi');
        $this->solAsi->agregarSolictudAsistencia($mun_id);
        $solicitud = $this->solAsi->obtenerId($mun_id);
        $tuplaSolicitud = $this->solAsi->obtenerSolicitudPorId($solicitud[0]['sol_asis_id']);
        $informacion['idfila'] = $solicitud[0]['sol_asis_id'];
        $informacion['nombre_solicitante'] = $tuplaSolicitud[0]->nombre_solicitante;
        $informacion['cargo'] = $tuplaSolicitud[0]->cargo;
        $informacion['telefono'] = $tuplaSolicitud[0]->telefono;
        $informacion['sol_asis_ruta_archivo'] = $tuplaSolicitud[0]->sol_asis_ruta_archivo;
        $informacion['nombreArchivo'] = end(explode("/", $tuplaSolicitud[0]->sol_asis_ruta_archivo));
        $informacion['leido_cri'] = $tuplaSolicitud[0]->c1;
        $informacion['cumple_cri'] = $tuplaSolicitud[0]->c2;
        $informacion['solicitud_fecha'] = $tuplaSolicitud[0]->fecha_solicitud;
        $informacion['comentarios'] = $tuplaSolicitud[0]->comentarios;
        $this->load->model('etapa0-sub23/seleccion_comite', 'selCom');
        $this->selCom->agregarSeleccionComite($solicitud[0]['sol_asis_id']);
        $this->load->model('etapa0-sub23/criterio_e0', 'criterio');
        $criterios = $this->criterio->obtenerCriterios();
        $informacion['criterios'] = $criterios;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/solicitudAsistencia_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function actualizarSolicitud() {
        /* VARIABLES POST */
        $sol_asis_id = $this->input->post("idfila");
        $c1 = $this->input->post("leido_cri");
        $c2 = $this->input->post("cumple_cri");
        $fecha_solicitud = $this->input->post("solicitud_fecha");
        if ($fecha_solicitud == '')
            $fecha_solicitud = null;
        $nombre_solicitante = $this->input->post("nombre_solicitante");
        $cargo = $this->input->post("cargo");
        $telefono = $this->input->post("telefono");
        $comentarios = $this->input->post('comentarios');
        $sol_asis_ruta_archivo = $this->input->post('sol_asis_ruta_archivo');

        $this->load->model('etapa0-sub23/solicitud_asistencia', 'sol_asistencia');
        $this->sol_asistencia->ActualizarSolictudAsistencia($sol_asis_id, $c1, $c2, $fecha_solicitud, $nombre_solicitante, $cargo, $telefono, $comentarios, $sol_asis_ruta_archivo);
    }

    public function borrarSolicitud() {
        $operacion = $this->input->post("oper");
        if ($operacion == 'del')
            $sol_asis_id = $this->input->post("id");
        else
            $sol_asis_id = $this->input->get("id");
        $this->load->model('etapa0-sub23/solicitud_asistencia', 'solicitud');
        $this->solicitud->eliminarSolicitud($sol_asis_id);
        if ($operacion != 'del')
            redirect('componente2/comp23_E0/gestionsolicitudAsistencia');
    }

    /* Integracion de Grupos     */

    public function integracionDeGrupos() {

        $informacion['titulo'] = 'Registro de Intregación de Grupos';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('consultor/consultora');
        $informacion['consultoras'] = $this->consultora->obtenerConsultora();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/integracionDeGrupos_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarRegionesDisponibles() {
        $this->load->model('pais/region');
        $regiones = $this->region->obtenerRegionSinConsultora();
        $numfilas = count($regiones);

        $i = 0;
        $rows = array();
        if ($numfilas != 0) {
            foreach ($regiones as $aux) {
                $rows[$i]['id'] = $aux->reg_id;
                $rows[$i]['cell'] = array($aux->reg_id,
                    $aux->reg_nombre
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
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

    public function cargarDeptosDisponibles($reg_id) {
        $this->load->model('pais/departamento');
        $deptos = $this->departamento->obtenerDepartamentosSinConsultora($reg_id);
        $numfilas = count($deptos);

        $i = 0;
        $rows = array();
        if ($numfilas != 0) {
            foreach ($deptos as $aux) {
                $rows[$i]['id'] = $aux->dep_id;
                $rows[$i]['cell'] = array($aux->dep_id,
                    $aux->dep_nombre
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
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

    public function cargarMuniDisponibles($dep_id) {
        $this->load->model('pais/municipio');
        $municipios = $this->municipio->obtenerMunicipiosSinConsultora($dep_id);
        $numfilas = count($municipios);

        $i = 0;
        $rows = array();
        if ($numfilas != 0) {
            foreach ($municipios as $aux) {
                $rows[$i]['id'] = $aux->mun_id;
                $rows[$i]['cell'] = array($aux->mun_id,
                    $aux->mun_nombre
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
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

    public function cargarMunicipiosConsultora($cons_id) {
        $this->load->model('pais/municipio');
        $municipios = $this->municipio->obtenerMunicipioPorConsultora($cons_id);
        $numfilas = count($municipios);

        $i = 0;
        $rows = array();
        if ($numfilas != 0) {
            foreach ($municipios as $aux) {
                $rows[$i]['id'] = $aux->mun_id;
                $rows[$i]['cell'] = array($aux->mun_id,
                    $aux->mun_nombre
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
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

    public function actualizarMunicipio($mun_id, $cons_id) {
        $operacion = $this->input->post('oper');
        $this->load->model('pais/municipio');
        if ($operacion == 'del') {
            $mun_id = $this->input->post('id');
            $cons_id = null;
        } else {
            $muni = $this->municipio->obtenerNomMunDep($mun_id);
            $numfilas = 1;
            $rows[0]['id'] = $mun_id;
            $rows[0]['cell'] = array($mun_id, $muni[0]->muni);
            $datos = json_encode($rows);
            $pages = floor($numfilas / 15) + 1;

            $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';
        }

        $this->municipio->actualizarConsultoraMuni($cons_id, $mun_id);

        if ($operacion == 'edit')
            return false;
        else
            echo $jsonresponse;
    }

    /* Fin de Integracion de Grupos
     */

    /* Plan de Trabajo de Consultora */

    public function planTrabajoConsultora() {
        $informacion['titulo'] = 'Solicitud de Asistencia Técnica';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('consultor/consultora');
        $informacion['consultoras'] = $this->consultora->obtenerConsultora();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/planTrabajoConsul_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarPlanTrabajo() {
        /* VARIABLES POST */
        $pla_tra_id = $this->input->post("pla_tra_id");
        $pla_tra_forden_inicio = $this->input->post("pla_tra_forden_inicio");
        if ($pla_tra_forden_inicio == '')
            $pla_tra_forden_inicio = null;
        $pla_tra_fentrega_plan = $this->input->post("pla_tra_fentrega_plan");
        if ($pla_tra_fentrega_plan == '')
            $pla_tra_fentrega_plan = null;
        $pla_tra_frecepcion_obs = $this->input->post("pla_tra_frecepcion_obs");
        if ($pla_tra_frecepcion_obs == '')
            $pla_tra_frecepcion_obs = null;
        $pla_tra_fsuperacion_obs = $this->input->post("pla_tra_fsuperacion_obs");
        if ($pla_tra_fsuperacion_obs == '')
            $pla_tra_fsuperacion_obs = null;
        $pla_tra_fvisto_bueno = $this->input->post("pla_tra_fvisto_bueno");
        if ($pla_tra_fvisto_bueno == '')
            $pla_tra_fvisto_bueno = null;
        $pla_tra_fpresentacion = $this->input->post("pla_tra_fpresentacion");
        if ($pla_tra_fpresentacion == '')
            $pla_tra_fpresentacion = null;
        $pla_tra_frecepcion = $this->input->post("pla_tra_frecepcion");
        if ($pla_tra_frecepcion == '')
            $pla_tra_frecepcion = null;
        $pla_tra_firmada_mun = $this->input->post("pla_tra_firmada_mun");
        if ($pla_tra_firmada_mun == '0')
            $pla_tra_firmada_mun = null;
        $pla_tra_firmada_isdem = $this->input->post("pla_tra_firmada_isdem");
        if ($pla_tra_firmada_isdem == '0')
            $pla_tra_firmada_isdem = null;
        $pla_tra_firmada_uep = $this->input->post("pla_tra_firmada_uep");
        if ($pla_tra_firmada_uep == '0')
            $pla_tra_firmada_uep = null;
        $pla_tra_ruta_archivo = $this->input->post("pla_tra_ruta_archivo");
        $pla_tra_observaciones = $this->input->post("pla_tra_observaciones");

        $this->load->model('etapa0-sub23/plan_trabajo', 'plaTra');
        $this->plaTra->actualizarPlanTrabajo($pla_tra_id, $pla_tra_forden_inicio, $pla_tra_fentrega_plan, $pla_tra_frecepcion_obs, $pla_tra_fsuperacion_obs, $pla_tra_fvisto_bueno, $pla_tra_fpresentacion, $pla_tra_frecepcion, $pla_tra_firmada_mun, $pla_tra_firmada_isdem, $pla_tra_firmada_uep, $pla_tra_ruta_archivo, $pla_tra_observaciones);
    }

    public function cargarPlanTrabajo($mun_id) {
        $this->load->model('etapa0-sub23/plan_trabajo', 'plaTra');
        if ($this->plaTra->contarPlanTrabajo($mun_id) == 0) {
            $this->plaTra->agregarPlanTrabajo($mun_id);
        }
        $planTrabajo = $this->plaTra->obtenerId($mun_id);
        $rows[0]['id'] = $planTrabajo[0]->pla_tra_id;
        if ($planTrabajo[0]->pla_tra_ruta_archivo == NULL)
            $nombreArchivo = 'No hay acta para descargar';
        else
            $nombreArchivo = 'Descargar ' . end(explode("/", $planTrabajo[0]->pla_tra_ruta_archivo));
        //
        if ($planTrabajo[0]->pla_tra_forden_inicio != "")
            $pla_tra_forden_inicio = date('d-m-Y', strtotime($planTrabajo[0]->pla_tra_forden_inicio));
        else
            $pla_tra_forden_inicio = $planTrabajo[0]->pla_tra_forden_inicio;
        if ($planTrabajo[0]->pla_tra_fentrega_plan != "")
            $pla_tra_fentrega_plan = date('d-m-Y', strtotime($planTrabajo[0]->pla_tra_fentrega_plan));
        else
            $pla_tra_fentrega_plan = $planTrabajo[0]->pla_tra_fentrega_plan;
        if ($planTrabajo[0]->pla_tra_frecepcion_obs != "")
            $pla_tra_frecepcion_obs = date('d-m-Y', strtotime($planTrabajo[0]->pla_tra_frecepcion_obs));
        else
            $pla_tra_frecepcion_obs = $planTrabajo[0]->pla_tra_frecepcion_obs;
        if ($planTrabajo[0]->pla_tra_fsuperacion_obs != "")
            $pla_tra_fsuperacion_obs = date('d-m-Y', strtotime($planTrabajo[0]->pla_tra_fsuperacion_obs));
        else
            $pla_tra_fsuperacion_obs = $planTrabajo[0]->pla_tra_fsuperacion_obs;
        if ($planTrabajo[0]->pla_tra_fvisto_bueno != "")
            $pla_tra_fvisto_bueno = date('d-m-Y', strtotime($planTrabajo[0]->pla_tra_fvisto_bueno));
        else
            $pla_tra_fvisto_bueno = $planTrabajo[0]->pla_tra_fvisto_bueno;
        if ($planTrabajo[0]->pla_tra_fpresentacion != "")
            $pla_tra_fpresentacion = date('d-m-Y', strtotime($planTrabajo[0]->pla_tra_fpresentacion));
        else
            $pla_tra_fpresentacion = $planTrabajo[0]->pla_tra_fpresentacion;
        if ($planTrabajo[0]->pla_tra_frecepcion != "")
            $pla_tra_frecepcion = date('d-m-Y', strtotime($planTrabajo[0]->pla_tra_frecepcion));
        else
            $pla_tra_frecepcion = $planTrabajo[0]->pla_tra_frecepcion;
        $rows[0]['cell'] = array($planTrabajo[0]->pla_tra_id,
            $pla_tra_forden_inicio,
            $pla_tra_fentrega_plan,
            $pla_tra_frecepcion_obs,
            $pla_tra_fsuperacion_obs,
            $pla_tra_fvisto_bueno,
            $pla_tra_fpresentacion,
            $pla_tra_frecepcion,
            $planTrabajo[0]->pla_tra_firmada_mun,
            $planTrabajo[0]->pla_tra_firmada_isdem,
            $planTrabajo[0]->pla_tra_firmada_uep,
            $planTrabajo[0]->pla_tra_ruta_archivo,
            $planTrabajo[0]->pla_tra_observaciones,
            $nombreArchivo
        );
        $datos = json_encode($rows);
        $pages = floor(1 / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . 1 . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function cargarDeptosPorConsultora($cons_id) {
        $this->load->model('pais/departamento');
        $deptos = $this->departamento->obtenerDepartamentosPorConsultora($cons_id);
        $numfilas = count($deptos);

        $i = 0;
        $rows = array();
        if ($numfilas != 0) {
            foreach ($deptos as $aux) {
                $rows[$i]['id'] = $aux->dep_id;
                $rows[$i]['cell'] = array($aux->dep_id,
                    $aux->dep_nombre
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
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

    public function cargarMuniPorConsultora($dep_id, $cons_id) {
        $this->load->model('pais/municipio');
        $municipios = $this->municipio->obtenerMunicipioPorConsultoraDepto($cons_id, $dep_id);
        $numfilas = count($municipios);

        $i = 0;
        $rows = array();
        if ($numfilas != 0) {
            foreach ($municipios as $aux) {
                $rows[$i]['id'] = $aux->mun_id;
                $rows[$i]['cell'] = array($aux->mun_id,
                    $aux->mun_nombre
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
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

    /* Registro de aporte de la Municipalidad */

    public function registroAporteMunicipal() {
        $informacion['titulo'] = 'Registro de Aporte a la Municipalidad';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('pais/departamento', 'depar');
        $departamentos = $this->depar->obtenerDepartamentosSeleccionado();
        $informacion['departamentos'] = $departamentos;

        $this->load->model('etapa', 'eta');
        $etapas = $this->eta->obtenerEtapas();
        $informacion['etapas'] = $etapas;

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/registroAporteMunicipal_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarMuniSeleccionados($dep_id) {
        $this->load->model('pais/municipio');
        $municipios = $this->municipio->obtenerMunicipiosSeleccionado($dep_id);
        $numfilas = count($municipios);

        $i = 0;
        $rows = array();
        if ($numfilas != 0) {
            foreach ($municipios as $aux) {
                $rows[$i]['id'] = $aux->mun_id;
                $rows[$i]['cell'] = array($aux->mun_id,
                    $aux->mun_nombre
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
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
        $informacion['titulo'] = 'Selección de Municipios por el Comite Interinstitucional';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('pais/departamento', 'depar');
        $departamentos = $this->depar->obtenerDepartamentos();
        $informacion['departamentos'] = $departamentos;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/comiteInterinstitucional_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarSolicitudes2($mun_id) {
        $this->load->model('etapa0-sub23/solicitud_asistencia', 'solicitud');
        $this->load->model('etapa0-sub23/seleccion_comite', 'selCom');
        $solicitudes = $this->solicitud->obtenerSolicitudesPorMuni($mun_id);
        $numfilas = count($solicitudes);
        $rows = array();
        if ($numfilas != 0) {
            $i = 0;
            foreach ($solicitudes as $aux) {
                $comite = $this->selCom->obtenerId($aux->sol_asis_id);
                $rows[$i]['id'] = $aux->sol_asis_id;
                $rows[$i]['cell'] = array($aux->sol_asis_id,
                    $aux->nombre_solicitante,
                    date('d/m/Y', strtotime($aux->fecha_solicitud)),
                    $comite[0]->sel_com_fverificacion,
                    $comite[0]->sel_com_seleccionado
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
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

}

?>
