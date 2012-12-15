<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 4
 *
 * @author Ing. Karen Peñate
 */
class Comp23_E4 extends CI_Controller {

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
        $this->load->view('componente2/subcomp23/etapa4/etapa4_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function acuerdoMunicipal() {
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
        $this->load->model('etapa1-sub23/acuerdo_municipal', 'acumun');
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $numAcuMun = $this->acumun->contarAcuMunPorPep($pro_pep_id, 4);
        if ($numAcuMun == 0) {
            $this->acumun->agregarAcuMun($pro_pep_id, 4);
            $idAcuMun = $this->acumun->obtenerIdAcuMun($pro_pep_id, 4);
            $acu_mun_id = $idAcuMun[0]['acu_mun_id'];
            $this->proPep->actualizarIndices('acu_mun_id', $acu_mun_id, $pro_pep_id);
        }
        $idAcuMun = $this->acumun->obtenerIdAcuMun($pro_pep_id, 4);
        $acu_mun_id = $idAcuMun[0]['acu_mun_id'];
        $acuerdoMun = $this->acumun->obtenerAcuMun($acu_mun_id);
        $informacion['acu_mun_id'] = $acu_mun_id;
        $informacion['acu_mun_fecha_borrador'] = $acuerdoMun[0]['acu_mun_fecha_borrador'];
        $informacion['acu_mun_fecha_observacion'] = $acuerdoMun[0]['acu_mun_fecha_observacion'];
        $informacion['acu_mun_fecha_aceptacion'] = $acuerdoMun[0]['acu_mun_fecha_aceptacion'];
        $informacion['acu_mun_p1'] = $acuerdoMun[0]['acu_mun_p1'];
        $informacion['acu_mun_observacion'] = $acuerdoMun[0]['acu_mun_observacion'];
        $informacion['acu_mun_ruta_archivo'] = $acuerdoMun[0]['acu_mun_ruta_archivo'];

        /* LLAMADA A LAS VISTAS */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa4/acuerdoMunicipal_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarAcuerdoMunicipal($acu_mun_id) {
        /* VARIABLES POST */
        $acu_mun_fecha_observacion = $this->input->post("acu_mun_fecha_observacion");
        if ($acu_mun_fecha_observacion == '')
            $acu_mun_fecha_observacion = null;
        $acu_mun_fecha_borrador = $this->input->post("acu_mun_fecha_borrador");
        if ($acu_mun_fecha_borrador == '')
            $acu_mun_fecha_borrador = null;
        $acu_mun_fecha_aceptacion = $this->input->post("acu_mun_fecha_aceptacion");
        if ($acu_mun_fecha_aceptacion == '')
            $acu_mun_fecha_aceptacion = null;
        $acu_mun_p1 = $this->input->post("acu_mun_p1");
        if ($acu_mun_p1 == '0')
            $acu_mun_p1 = null;
        $acu_mun_observacion = $this->input->post("acu_mun_observacion");
        $acu_mun_ruta_archivo = $this->input->post("acu_mun_ruta_archivo");

        /* ACTUALIZANDO ACUERDO MUNICIPAL */
        $this->load->model('etapa1-sub23/acuerdo_municipal', 'acuerdoMun');
        $this->acuerdoMun->actualizarAcuMun2($acu_mun_id, $acu_mun_fecha_observacion,$acu_mun_fecha_borrador,$acu_mun_fecha_aceptacion, $acu_mun_p1, $acu_mun_observacion, $acu_mun_ruta_archivo);

        redirect('componente2/comp23_E4/acuerdoMunicipal');
    }

    public function cargarParticipantes($campo, $id_campo) {
        $this->load->model('participante');
        $participantes = $this->participante->obtenerParticipantes($campo, $id_campo);
        $numfilas = count($participantes);

        $i = 0;

        if ($numfilas != 0) {
            foreach ($participantes as $aux) {
                switch ($aux->par_tipo) {
                    case 'gg':
                        $tipo = "Grupo Gestor";
                        break;
                    case 'gl':
                        $tipo = "Gobierno Local";
                        break;
                }
                $rows[$i]['id'] = $aux->par_id;
                $rows[$i]['cell'] = array($aux->par_id,
                    $aux->par_nombre,
                    $aux->par_apellido,
                    $aux->par_sexo,
                    $aux->par_cargo,
                    $tipo
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ', ' ', ' ', ' ', ' ');
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

}

?>
