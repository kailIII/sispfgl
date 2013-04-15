<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas del 
 * componente 2.5: gestión de riesgos
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class comp25_seguimiento extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $informacion['titulo'] = 'Fortalecimiento de Gobiernos Locales';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp25/comp25_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function seguimiento() {
        $informacion['titulo'] = 'Componente 2.5 Registro de datos del componente';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        //OBTENER DEPARTAMENTOS
        $this->load->model('tank_auth/users', 'usuarios');
        $rol = $this->usuarios->obtenerCodigoRol($this->tank_auth->get_username());
        //OBTENER DEPARTAMENTOS
        $this->load->model('pais/departamento');
        $this->load->model('consultor/consultor');
        $cons = $this->consultor->obtenerConsultorPorUsuario($this->tank_auth->get_username());

        if (strcmp($rol[0]->rol_codigo, 'gdrc') == 0)
            $informacion['departamentos'] = $this->departamento->obtenerDepartamentosPorGrupoGDR($cons[0]->cons_id);
        else
            $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp25/seguimiento/seguimiento_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarSeguimiento($mun_id) {
        $this->load->model('pais/municipio');
        $this->load->model('seguimiento-sub25/seguimiento');
        $resultado = $this->municipio->obtenerIDVariable('seg_id', $mun_id);

        if ($resultado[0]->seg_id == 0) {
            $this->seguimiento->agregarSeguimiento($mun_id);
            $seg = $this->seguimiento->idPorMunicipio($mun_id);
            $this->municipio->actualizarIndices('seg_id', $seg[0]->seg_id, $mun_id);
        }
        $seg = $this->seguimiento->idPorMunicipio($mun_id);
        if ($seg[0]->seg_forden_preparacion != "")
            $seg_forden_preparacion = date('d-m-Y', strtotime($seg[0]->seg_forden_preparacion));
        else
            $seg_forden_preparacion = $seg[0]->seg_forden_preparacion;
        if ($seg[0]->seg_facta_recepcion != "")
            $seg_facta_recepcion = date('d-m-Y', strtotime($seg[0]->seg_facta_recepcion));
        else
            $seg_facta_recepcion = $seg[0]->seg_facta_recepcion;
        if ($seg [0]->seg_forden_diagnostico != "")
            $seg_forden_diagnostico = date('d-m-Y', strtotime($seg [0]->seg_forden_diagnostico));
        else
            $seg_forden_diagnostico = $seg [0]->seg_forden_diagnostico;
        if ($seg [0]->seg_fsocializacion != "")
            $seg_fsocializacion = date('d-m-Y', strtotime($seg [0]->seg_fsocializacion));
        else
            $seg_fsocializacion = $seg [0]->seg_fsocializacion;
        if ($seg[0]->seg_facta_aprobacion_d != "")
            $seg_facta_aprobacion_d = date('d-m-Y', strtotime($seg[0]->seg_facta_aprobacion_d));
        else
            $seg_facta_aprobacion_d = $seg[0]->seg_facta_aprobacion_d;
        if ($seg[0]->seg_forden_planificacion != "")
            $seg_forden_planificacion = date('d-m-Y', strtotime($seg[0]->seg_forden_planificacion));
        else
            $seg_forden_planificacion = $seg[0]->seg_forden_planificacion;
        if ($seg [0]->seg_facta_aprobacion_p != "")
            $seg_facta_aprobacion_p = date('d-m-Y', strtotime($seg [0]->seg_facta_aprobacion_p));
        else
            $seg_facta_aprobacion_p = $seg [0]->seg_facta_aprobacion_p;
        if ($seg [0]->seg_facuerdo_municipal != "")
            $seg_facuerdo_municipal = date('d-m-Y', strtotime($seg [0]->seg_facuerdo_municipal));
        else
            $seg_facuerdo_municipal = $seg [0]->seg_facuerdo_municipal;
        if ($seg[0]->seg_fpresentacion_publica != "")
            $seg_fpresentacion_publica = date('d-m-Y', strtotime($seg[0]->seg_fpresentacion_publica));
        else
            $seg_fpresentacion_publica = $seg[0]->seg_fpresentacion_publica;
        if ($seg[0]->seg_forden_seguimiento != "")
            $seg_forden_seguimiento = date('d-m-Y', strtotime($seg[0]->seg_forden_seguimiento));
        else
            $seg_forden_seguimiento = $seg[0]->seg_forden_seguimiento;
        if ($seg[0]->seg_ruta_archivo == NULL || $seg[0]->seg_ruta_archivo == '0')
            $nombreRuta = 'No hay listado para descargar';
        else
            $nombreRuta = 'Descargar ' . end(explode("/", $seg[0]->seg_ruta_archivo));
        $rows[0]['id'] = $seg[0]->seg_id;
        $rows[0]['cell'] = array($seg[0]->seg_id,
            $seg_forden_preparacion,
            $seg_facta_recepcion,
            $seg_forden_diagnostico,
            $seg_fsocializacion,
            $seg_facta_aprobacion_d,
            $seg_forden_planificacion,
            $seg_facta_aprobacion_p,
            $seg_facuerdo_municipal,
            $seg_fpresentacion_publica,
            $seg_forden_seguimiento,
            $seg[0]->seg_comentario,
            $seg[0]->seg_ruta_archivo,
            $nombreRuta
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

    public function guardarSeguimiento() {
        $this->load->model('seguimiento-sub25/seguimiento');
        $seg_id = $this->input->post("seg_id");
        $seg_forden_preparacion = $this->input->post("seg_forden_preparacion");
        if ($seg_forden_preparacion == "")
            $seg_forden_preparacion = null;
        $seg_facta_recepcion = $this->input->post("seg_facta_recepcion");
        if ($seg_facta_recepcion == "")
            $seg_facta_recepcion = null;
        $seg_forden_diagnostico = $this->input->post("seg_forden_diagnostico");
        if ($seg_forden_diagnostico == "")
            $seg_forden_diagnostico = null;
        $seg_fsocializacion = $this->input->post("seg_fsocializacion");
        if ($seg_fsocializacion == "")
            $seg_fsocializacion = null;
        $seg_facta_aprobacion_d = $this->input->post("seg_facta_aprobacion_d");
        if ($seg_facta_aprobacion_d == "")
            $seg_facta_aprobacion_d = null;
        $seg_forden_planificacion = $this->input->post("seg_forden_planificacion");
        if ($seg_forden_planificacion == "")
            $seg_forden_planificacion = null;
        $seg_facta_aprobacion_p = $this->input->post("seg_facta_aprobacion_p");
        if ($seg_facta_aprobacion_p == "")
            $seg_facta_aprobacion_p = null;
        $seg_facuerdo_municipal = $this->input->post("seg_facuerdo_municipal");
        if ($seg_facuerdo_municipal == "")
            $seg_facuerdo_municipal = null;
        $seg_fpresentacion_publica = $this->input->post("seg_fpresentacion_publica");
        if ($seg_fpresentacion_publica == "")
            $seg_fpresentacion_publica = null;
        $seg_forden_seguimiento = $this->input->post("seg_forden_seguimiento");
        if ($seg_forden_seguimiento == "")
            $seg_forden_seguimiento = null;
        $seg_comentario = $this->input->post("seg_comentario");
        $this->seguimiento->actualizarSeguimiento($seg_id, $seg_forden_preparacion, $seg_facta_recepcion, $seg_forden_diagnostico
                , $seg_fsocializacion, $seg_facta_aprobacion_d, $seg_forden_planificacion, $seg_facta_aprobacion_p, $seg_facuerdo_municipal
                , $seg_fpresentacion_publica, $seg_forden_seguimiento, $seg_comentario);
    }

}
?>
 

