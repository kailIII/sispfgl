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
        $this->acuerdoMun->actualizarAcuMun2($acu_mun_id, $acu_mun_fecha_observacion, $acu_mun_fecha_borrador, $acu_mun_fecha_aceptacion, $acu_mun_p1, $acu_mun_observacion, $acu_mun_ruta_archivo);

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

    public function integracionInstancia() {
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
        //CARGAR INTEGRACIÒN
        $this->load->model('etapa4-sub23/integracion_instancia', 'intIns');
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $numIntInst = $this->intIns->contarIntInsPorPep($pro_pep_id);
        $this->load->model('etapa4-sub23/criterio_integracion', 'criInt');
        if ($numIntInst == 0) {
            $this->intIns->agregarIntIns($pro_pep_id);
            $idIntIns = $this->intIns->obtenerIdIntIns($pro_pep_id);
            $int_ins_id = $idIntIns[0]['int_ins_id'];
            $this->proPep->actualizarIndices('int_ins_id', $int_ins_id, $pro_pep_id);
            $this->load->model('etapa1-sub23/criterio');
            $criterios = $this->criterio->obtenerCriterios();
            foreach ($criterios as $criteAux)
                $this->criInt->insertarCriterioIntIns($int_ins_id, $criteAux->cri_id);
        }
        $idIntIns = $this->intIns->obtenerIdIntIns($pro_pep_id);
        $int_ins_id = $idIntIns[0]['int_ins_id'];
        $intIns = $this->intIns->obtenerIntIns($int_ins_id);
        $informacion['int_ins_id'] = $int_ins_id;
        $informacion['int_ins_fecha'] = $intIns[0]['int_ins_fecha'];
        $informacion['int_ins_lugar'] = $intIns[0]['int_ins_lugar'];
        $informacion['int_ins_observacion'] = $intIns[0]['int_ins_observacion'];
        $informacion['int_ins_plan_trabajo'] = $intIns[0]['int_ins_plan_trabajo'];
        $informacion['int_ins_reglamento_int'] = $intIns[0]['int_ins_reglamento_int'];
        $informacion['int_ins_ruta_archivo'] = $intIns[0]['int_ins_ruta_archivo'];
        $informacion['criterios'] = $this->criInt->obtenerLosCriteriosIntIns($int_ins_id);
        /* LLAMADA A LAS VISTAS */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa4/integracionInstancia_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarIntegracionInstancia($int_ins_id) {
        /* VARIABLES POST */
        $int_ins_fecha = $this->input->post('int_ins_fecha');
        if ($int_ins_fecha == '')
            $int_ins_fecha = null;
        $int_ins_plan_trabajo = $this->input->post('int_ins_plan_trabajo');
        if ($int_ins_plan_trabajo == '0')
            $int_ins_plan_trabajo = null;
        $int_ins_reglamento_int = $this->input->post('int_ins_reglamento_int');
        if ($int_ins_reglamento_int == '0')
            $int_ins_reglamento_int = null;
        $int_ins_lugar = $this->input->post('int_ins_lugar');
        if ($int_ins_lugar == '0')
            $int_ins_lugar = null;
        $int_ins_observacion = $this->input->post('int_ins_observacion');
        $int_ins_ruta_archivo = $this->input->post('int_ins_ruta_archivo');

        /* ACTUALIZANDO ACUERDO MUNICIPAL */
        $this->load->model('etapa4-sub23/integracion_instancia', 'intIns');
        $this->intIns->actualizarIntIns($int_ins_id, $int_ins_fecha, $int_ins_lugar, $int_ins_observacion, $int_ins_observacion, $int_ins_plan_trabajo, $int_ins_reglamento_int, $int_ins_ruta_archivo);
        $this->load->model('etapa4-sub23/criterio_integracion', 'criInt');
        $criterios = $this->criInt->obtenerLosCriteriosIntIns($int_ins_id);
        foreach ($criterios as $criterio) {
            if ($this->input->post("cri_" . $criterio->cri_id) == '0')
                $valor = null;
            else
                $valor = $this->input->post("cri_" . $criterio->cri_id);
            $this->criInt->actualizarCriterioIntIns($valor, $int_ins_id, $criterio->cri_id);
        }


        redirect('componente2/comp23_E4/integracionInstancia');
    }

    public function cargarParticipanteIntIns($campo, $campo_id,$cap_id) {
        $this->load->model('participante');
        $this->load->model('etapa1-sub23/participante_capacitacion', 'parCap');
        $participantes = $this->participante->obtenerParticipantesParametrizado($campo,$campo_id);
        $numfilas = count($participantes);

        $i = 0;
        if ($numfilas != 0) {
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

    public function capacitacionMiembrosInstancia() {
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
        $informacion['capacitaciones'] = $this->capacitacion->obtenerCapacitaciones($pro_pep_id, 4);
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa4/capacitacion_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
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
        $int_ins_id = $resultado[0]['int_ins_id'];
        $informacion['int_ins_id'] = $int_ins_id;
        /* CREAR MODELO PARA CAPACITACIÓN */
        $this->load->model('etapa1-sub23/capacitacion');
        $this->capacitacion->agregarCapacitacion($pro_pep_id, 4);
        $resultado = $this->capacitacion->obtenerIdCapacitacion($pro_pep_id, 4);
        $cap_id = $resultado[0]['cap_id'];
        /* OBTENER EL GRUPO LOCAL DE APOYO */
        $this->load->model('participante');
        $this->load->model('etapa1-sub23/participante_capacitacion', 'parCap');
        $participantes = $this->participante->obtenerParticipantesParametrizado('int_ins_id',$int_ins_id);
        foreach ($participantes as $aux)
            $resultado = $this->parCap->insertarParticipa($cap_id, $aux->par_id);
        /**/
        $informacion['cap_id'] = $cap_id;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa4/registrarCapacitacionEA_view', $informacion);
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
         $int_ins_id = $resultado[0]['int_ins_id'];
        $informacion['int_ins_id'] = $int_ins_id;

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
        $this->load->view('componente2/subcomp23/etapa4/editarCapacitacionEA_view', $informacion);
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
        redirect('componente2/comp23_E4/capacitacionMiembrosInstancia');
    }

    public function cancelaCapacitacion($cap_id) {
        $this->load->model('etapa1-sub23/capacitacion');
        $this->capacitacion->eliminaCapacitacion($cap_id);
        redirect('componente2/comp23_E4/capacitacionMiembrosInstancia');
    }

}

?>
