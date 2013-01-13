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

    public function cargarCriterios() {
        $this->load->model('etapa0-sub23/criterio_e0', 'criterio');
        $criterios = $this->criterio->obtenerCriterios();
        $numfilas = count($criterios);

        if ($numfilas != 0) {
            $i = 0;
            foreach ($criterios as $aux) {
                $rows[$i]['id'] = $aux->criterio_id;
                $rows[$i]['cell'] = array($aux->criterio_id,
                    $aux->criterio_nombre
                );
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

    public function solicitudAsistenciaTecnica() {
        $informacion['titulo'] = 'Solicitud de Asistencia Técnica';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->model('pais/departamento', 'depar');
        $departamentos = $this->depar->obtenerDepartamentos();
        $informacion['departamentos'] = $departamentos;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa0/solicitudAsistencia_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    /* Guarda la Solicitud de asistencia tecnica */

    public function guardarsolicitud() {
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
    
}

?>
