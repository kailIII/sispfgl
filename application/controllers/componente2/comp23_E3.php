<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 3
 *
 * @author Ing. Karen Peñate
 */
class Comp23_E3 extends CI_Controller {

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
        $this->load->view('componente2/subcomp23/etapa3/etapa3_view');
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
        $informacion['reuniones'] = $this->reunion->obtenerReuniones($pro_pep_id, 3);
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa3/reuniones_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function muestraReunion($reu_id) {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $this->load->model('etapa1-sub23/reunion', 'reunion');
        $this->reunion->eliminaReunion($reu_id);
        redirect('componente2/comp23_E3/muestraReuniones');
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
        $ultima = $this->reu->ultimaReunion($pro_pep_id);
        $reu_numero = (int) $ultima[0]['ultima'] + 1;
        $informacion['reu_numero'] = $reu_numero;
        $this->reu->agregarReunion(2, $pro_pep_id, $reu_numero);
        $id_reunion = $this->reu->obtenerId(2, $pro_pep_id, $reu_numero);
        $reu_id = $id_reunion[0]['reu_id'];
        $informacion['reu_id'] = $reu_id;
        //CARGAR CRITERIOS
        $this->load->model('etapa1-sub23/criterio');
        $this->load->model('etapa3-sub23/criterio_reunion', 'criterioReunion');
        $criterios = $this->criterio->obtenerCriterios();
        foreach ($criterios as $criteAux)
            $this->criterioReunion->insertarCriterioReunion($reu_id, $criteAux->cri_id);
        $informacion['criterios'] = $this->criterioReunion->obtenerLosCriteriosReunion($reu_id);
        //CARGAR POBLACION_REUNION
        $this->load->model('etapa3-sub23/poblacion_reunion', 'pobReu');
        $this->pobReu->insertarPoblacionReunion($reu_id);
        $resultado = $this->pobReu->obtenerPoblacionReunionPorReunion($reu_id);
        $informacion['pob_id'] = $resultado[0]['pob_id'];
        /**/
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa3/registrarReunion_view', $informacion);
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
        $this->load->model('etapa3-sub23/poblacion_reunion', 'pobReu');
        $resultado = $this->pobReu->obtenerPoblacionReunionPorReunion($reu_id);
        $informacion['pob_id'] = $resultado[0]['pob_id'];
        $informacion['pob_comunidad'] = $resultado[0]['pob_comunidad'];
        $informacion['pob_sector'] = $resultado[0]['pob_sector'];
        $informacion['pob_institucion'] = $resultado[0]['pob_institucion'];
        //CRITERIOS_REUNION
        $this->load->model('etapa3-sub23/criterio_reunion', 'criterioReunion');
        $informacion['criterios'] = $this->criterioReunion->obtenerLosCriteriosReunion($reu_id);
        /**/
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa3/editarReunion_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }
    
    
    public function cumplimientosMinimos() {
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

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa3/cumplimientoMinimo_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

}

?>
