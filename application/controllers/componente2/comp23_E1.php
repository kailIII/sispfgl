<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 1
 * Del PEP por los consultores asignados.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp23_E1 extends CI_Controller {

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
        $this->load->view('componente2/subcomp23/etapa1/etapa1_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarInstituciones() {
        //PARA CREAR LA LISTA DESPLEGABLE DE LA INSTITUCION
        $this->load->model('institucion', 'institucion');
        $institucion = $this->institucion->obtenerInstitucion();
        $combo = "<select name='par_institucion'>";
        $combo.= " <option value='0'> Seleccione</option>";
        foreach ($institucion as $aux)
            $combo.= " <option value='" . $aux->ins_id . "'>" . $aux->ins_nombre . "</option>";
        $combo.="</select>";

        echo $combo;
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
        $ultima = $this->reu->ultimaReunion($pro_pep_id, 1);
        $reu_numero = (int) $ultima[0]['ultima'] + 1;
        $informacion['reu_numero'] = $reu_numero;
        $this->reu->agregarReunion(1, $pro_pep_id, $reu_numero);
        $id_reunion = $this->reu->obtenerId(1, $pro_pep_id, $reu_numero);
        $informacion['reu_id'] = $id_reunion[0]['reu_id'];
        /**/
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/registrarReunion_view', $informacion);
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
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        /* FIN OBTENER DEPARTAMENTO */
        /* OBTENER DATOS DE LA REUNION  */
        $this->load->model('etapa1-sub23/reunion', 'reu');
        $datosReu = $this->reu->obtenerReunionId($reu_id);
        $informacion['reu_id'] = $reu_id;
        $informacion['reu_numero'] = $datosReu[0]->reu_numero;
        $informacion['reu_fecha'] = $datosReu[0]->reu_fecha;
        $informacion['reu_duracion_horas'] = $datosReu[0]->reu_duracion_horas;
        $informacion['reu_tema'] = $datosReu[0]->reu_tema;
        $informacion['reu_resultado'] = $datosReu[0]->reu_resultado;
        $informacion['reu_observacion'] = $datosReu[0]->reu_observacion;

        /* FIN DE OBTENER DATOS DE LA REUNION */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/editarReunion_view', $informacion);
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

        $this->load->model('etapa1-sub23/reunion', 'reunion');
        $this->reunion->actualizarReunion($reu_fecha, $reu_duracion_horas, $reu_tema, $reu_resultado, $reu_observacion, $reu_id);
        redirect('componente2/comp23_E1/muestraReuniones');
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
        $informacion['reuniones'] = $this->reunion->obtenerReuniones($pro_pep_id, 1);
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $username;
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/reuniones_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function muestraReunion($reu_id) {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $this->load->model('etapa1-sub23/reunion', 'reunion');
        $this->reunion->eliminaReunion($reu_id);
        redirect('componente2/comp23_E1/muestraReuniones');
    }

    public function cargarParticipantes($campo, $id_campo) {
        $this->load->model('participante');
        $this->load->model('institucion');
        $participantes = $this->participante->obtenerParticipantes($campo, $id_campo);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            if (isset($aux->ins_id))
                $nombreInstitucion = $this->institucion->obtenerNombreInstitucion($aux->ins_id);
            else
                $nombreInstitucion = ' ';
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_nombre,
                $aux->par_apellido,
                strtoupper($aux->par_sexo),
                $nombreInstitucion[0]['ins_nombre'],
                $aux->par_cargo
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

    public function cargarParticipantes4($campo, $id_campo) {
        $this->load->model('participante');
        $this->load->model('institucion');
        $participantes = $this->participante->obtenerParticipantesParametrizado($campo, $id_campo);
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

                if (isset($aux->ins_id))
                    $nombreInstitucion = $this->institucion->obtenerNombreInstitucion($aux->ins_id);
                else
                    $nombreInstitucion = ' ';
                $rows[$i]['id'] = $aux->par_id;
                $rows[$i]['cell'] = array($aux->par_id,
                    $aux->par_nombre,
                    $aux->par_apellido,
                    $aux->par_edad,
                    strtoupper($aux->par_sexo),
                    $nombreInstitucion[0]['ins_nombre'],
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

    public function cargarParticipantesIP($campo, $id_campo) {
        $this->load->model('participante');
        $this->load->model('institucion');
        $participantes = $this->participante->obtenerParticipantes($campo, $id_campo);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_nombre,
                $aux->par_apellido,
                strtoupper($aux->par_sexo),
                $aux->par_cargo
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

    public function gestionParticipantes($tabla, $campo, $id_campo) {
        /* VARIABLES POST */
        /* LOS COMUNES */
        $par_id = $this->input->post("id");
        $par_nombre = $this->input->post("par_nombre");
        $par_apellido = $this->input->post("par_apellido");
        $par_sexo = strtoupper($this->input->post("par_sexo"));
        $par_cargo = $this->input->post("par_cargo");
        $operacion = $this->input->post('oper');
        /* LOS VARIABLES */
        $ins_id = $this->input->post("par_institucion");
        if ($ins_id == 0)
            $ins_id = null;
        $par_tel = $this->input->post("par_tel");
        if ($par_tel == 0)
            $par_tel = null;
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
        $par_tipo = $this->input->post("par_tipo");
        if ($par_tipo == '0')
            $par_tipo = null;

        /* FIN DE VARIABLES */
        $this->load->model('participante');
        switch ($operacion) {
            case 'add':
                $this->participante->agregarParticipantes($campo, $id_campo, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco, $par_tipo);
                break;
            case 'edit':
                $this->participante->editarParticipantes($par_id, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco, $par_tipo);
                break;
            case 'del':
                $this->participante->eliminarParticipantes($par_id);
                break;
        }
    }

    public function cargarParticipantesAM($campo, $id_campo) {
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

    public function cargarParticipanteGA() {
        $this->load->model('participante');
        $id = $this->input->get("gru_apo_id");
        $participantes = $this->participante->obtenerParticipantesGA($id);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            if (strcasecmp($aux->par_proviene, 'U'))
                $proviene = 'Rural';
            else
                $proviene = 'Urbano';
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_dui,
                $aux->par_nombre,
                $aux->par_apellido,
                strtoupper($aux->par_sexo),
                $aux->par_edad,
                $proviene,
                $aux->par_cargo,
                $aux->par_nivel_esco,
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

    public function cargarParticipanteGACap() {
        $this->load->model('participante');
        $this->load->model('etapa1-sub23/participante_capacitacion', 'parCap');
        $id = $this->input->get("gru_apo_id");
        $cap_id = $this->input->get("cap_id");
        $participantes = $this->participante->obtenerParticipantesGA($id);
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

    public function cargarOtrosParticipanteGA($cap_id) {
        $this->load->model('participante');
        $participantes = $this->participante->obtenerParticipantes('par_otros', $cap_id);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            if (strcasecmp($aux->par_proviene, 'U'))
                $proviene = 'Rural';
            else
                $proviene = 'Urbano';
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_dui,
                $aux->par_nombre,
                $aux->par_apellido,
                strtoupper($aux->par_sexo),
                $aux->par_edad,
                $proviene,
                $aux->par_cargo,
                $aux->par_nivel_esco,
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

    public function gestionParticipantesCap($cap_id) {
        /* VARIABLES POST */
        $par_id = $this->input->post("id");
        $operacion = $this->input->post('oper');
        $par_cap_participa = $this->input->post("par_cap_participa");
        $par_nombre = $this->input->post("par_nombre");
        if ($par_nombre == '0')
            $par_nombre = null;
        $par_apellido = $this->input->post("par_apellido");
        if ($par_apellido == '0')
            $par_apellido = null;
        $par_sexo = strtoupper($this->input->post("par_sexo"));
        if ($par_sexo == '0')
            $par_sexo = null;
        $par_cargo = $this->input->post("par_cargo");
        if ($par_cargo == '0')
            $par_cargo = null;
        $ins_id = $this->input->post("par_institucion");
        if ($ins_id == '0')
            $ins_id = null;
        $par_tel = $this->input->post("par_tel");
        if ($par_tel == '0')
            $par_tel = null;
        $par_dui = $this->input->post("par_dui");
        if ($par_dui == '0')
            $par_dui = null;
        $par_edad = $this->input->post("par_edad");
        if ($par_edad == '0')
            $par_edad = null;
        $par_proviene = $this->input->post("par_proviene");
        if ($par_proviene == '0')
            $par_proviene = null;
        $par_nivel_esco = $this->input->post("par_nivel_esco");
        if ($par_nivel_esco == '0')
            $par_nivel_esco = null;
        /* FIN DE VARIABLES */
        $this->load->model('participante');
        $this->load->model('etapa1-sub23/participante_capacitacion', 'parCap');
        switch ($operacion) {
            case 'add':
                $this->participante->agregarParticipantes('par_otros', $cap_id, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco, null);
                $par_id_nu = $this->participante->obtenerMaximado();
                $this->parCap->insertarOtrosParticipa($cap_id, $par_id_nu[0]->par_id);
                break;
            case 'edit':
                if ($par_cap_participa == '0')
                    $this->participante->editarParticipantes($par_id, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco);
                else
                    $this->parCap->actualizaParticipa($cap_id, $par_id, $par_cap_participa);
                break;
            case 'del':
                $this->participante->eliminaParticipanteCapacitacion($par_id);
                break;
        }
    }

    public function calcularTotalSexo($campo, $id_campo) {
        $this->load->model('participante');
        $totales = $this->participante->calcularSexo($campo, $id_campo);

        $rows[0]['id'] = 1;
        $rows[0]['cell'] = array($totales[0]->total,
            $totales[0]->mujeres,
            $totales[0]->hombres,
            $totales[0]->mayor,
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

    public function calcularTotalParticipantes($tabla, $campo_id, $campo) {
        $this->load->model('participante');
        $totales = $this->participante->calcularTotalParticipantes($tabla, $campo_id, $campo);

        $rows[0]['id'] = 1;
        $rows[0]['cell'] = array($totales[0]->total,
            $totales[0]->mujeres,
            $totales[0]->hombres
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

    public function acuerdoMunicipal() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $g = $this->input->get('g');
        if ($g)
            $informacion['guardo'] = true;
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

        /* CARGAR LOS CRITERIOS  Y CONTRAPARTIDA  */
        $this->load->model('etapa1-sub23/criterio');
        $this->load->model('etapa1-sub23/contrapartida');
        $this->load->model('etapa1-sub23/contrapartida_acuerdo', 'contraAcuerdo');
        $this->load->model('etapa1-sub23/criterio_acuerdo', 'criterioAcuerdo');
        $criterios = $this->criterio->obtenerCriterios();
        $contrapartidas = $this->contrapartida->obtenerContrapartidas();

        /* FIN CARGAR LOS CRITERIOS  Y CONTRAPARTIDA  */
        /* OBTENER ACUERDO MUNICIPAL */
        $this->load->model('etapa1-sub23/acuerdo_municipal', 'acumun');

        $numAcuMun = $this->acumun->contarAcuMunPorPep($pro_pep_id, 1);
        if ($numAcuMun == 0) {
            $this->acumun->agregarAcuMun($pro_pep_id, 1);
            $idAcuMun = $this->acumun->obtenerIdAcuMun($pro_pep_id, 1);
            $acu_mun_id = $idAcuMun[0]['acu_mun_id'];
            $this->load->model('proyectoPep/proyecto_pep', 'proPep');
            foreach ($contrapartidas as $contraAux)
                $this->contraAcuerdo->insertarContrapartidaAcuerdo($acu_mun_id, $contraAux->con_id);
            foreach ($criterios as $criteAux)
                $this->criterioAcuerdo->insertarCriterioAcuerdo($acu_mun_id, $criteAux->cri_id);
        } else {
            $idAcuMun = $this->acumun->obtenerIdAcuMun($pro_pep_id, 1);
            $acu_mun_id = $idAcuMun[0]['acu_mun_id'];
            $acuerdoMun = $this->acumun->obtenerAcuMun($acu_mun_id);
            $informacion['acu_mun_fecha'] = $acuerdoMun[0]['acu_mun_fecha'];
            $informacion['acu_mun_p1'] = $acuerdoMun[0]['acu_mun_p1'];
            $informacion['acu_mun_p2'] = $acuerdoMun[0]['acu_mun_p2'];
            $informacion['acu_mun_observacion'] = $acuerdoMun[0]['acu_mun_observacion'];
            $informacion['acu_mun_ruta_archivo'] = $acuerdoMun[0]['acu_mun_ruta_archivo'];
            $informacion['nombreArchivo'] = end(explode("/", $acuerdoMun[0]['acu_mun_ruta_archivo']));
        }

        $informacion['contrapartidas'] = $this->contraAcuerdo->obtenerLasContrapartidoAcuerdo($acu_mun_id);
        $informacion['criterios'] = $this->criterioAcuerdo->obtenerLosCriteriosAcuerdo($acu_mun_id);
        /* FIN OBTENER ACUERDO MUNICIPAL */
        $informacion['acu_mun_id'] = $acu_mun_id;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/acuerdoMunicipal_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarAcuerdoMunicipal($acu_mun_id) {
        /* VARIABLES POST */
        $acu_mun_fecha = $this->input->post("acu_mun_fecha");
        if ($acu_mun_fecha == '')
            $acu_mun_fecha = null;
        $acu_mun_p1 = $this->input->post("acu_mun_p1");
        if ($acu_mun_p1 == '0')
            $acu_mun_p1 = null;
        $acu_mun_p2 = $this->input->post("acu_mun_p2");
        if ($acu_mun_p2 == '0')
            $acu_mun_p2 = null;
        $acu_mun_observacion = $this->input->post("acu_mun_observacion");
        $acu_mun_ruta_archivo = $this->input->post("acu_mun_ruta_archivo");
        /* OBTENIENDO VALORES DE LOS CRITERIOS */
        $this->load->model('etapa1-sub23/criterio');
        $this->load->model('etapa1-sub23/criterio_acuerdo', 'criAcuerdo');
        $criterios = $this->criterio->obtenerCriterios();
        foreach ($criterios as $criterio) {
            if ($this->input->post("cri_" . $criterio->cri_id) == '0')
                $valor = null;
            else
                $valor = $this->input->post("cri_" . $criterio->cri_id);
            $this->criAcuerdo->actualizarCriterioAcuerdo($valor, $acu_mun_id, $criterio->cri_id);
        }
        /* OBTENIENDO VALORES DE LA CONTRAPARTIDA */
        $this->load->model('etapa1-sub23/contrapartida');
        $this->load->model('etapa1-sub23/contrapartida_acuerdo', 'contraAcuerdo');
        $contrapartidas = $this->contrapartida->obtenerContrapartidas();
        foreach ($contrapartidas as $contrapartida) {
            if ($this->input->post("con_" . $contrapartida->con_id) == 0) {
                $valor = 'false';
                $especifique = null;
            } else {
                $valor = 'true';
                if ($this->input->post("especifique_" . $contrapartida->con_id) == '')
                    $especifique = null;
                else
                    $especifique = $this->input->post("especifique_" . $contrapartida->con_id);
            }
            $this->contraAcuerdo->actualizarContrapartidaAcuerdo($valor, $acu_mun_id, $contrapartida->con_id, $especifique);
        }

        /* ACTUALIZANDO ACUERDO MUNICIPAL */
        $this->load->model('etapa1-sub23/acuerdo_municipal', 'acuerdoMun');
        $this->acuerdoMun->actualizarAcuMun($acu_mun_id, $acu_mun_fecha, $acu_mun_p1, $acu_mun_p2, $acu_mun_observacion, $acu_mun_ruta_archivo);

        redirect('componente2/comp23_E1/acuerdoMunicipal?g=true');
    }

    public function subirArchivo($tabla, $campo_id, $campo) {
        echo $this->librerias->subirDocumento($tabla, $campo_id, $_FILES, $campo);
    }

    public function declaracionInteres() {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $g = $this->input->get('g');
        if ($g)
            $informacion['guardo'] = true;
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
        $this->load->model('etapa1-sub23/declaracion_interes', 'decint');

        $numDecInt = $this->decint->contarDecIntPorPep($pro_pep_id);
        if ($numDecInt == 0) {
            $this->decint->agregarDecInt($pro_pep_id);
            $idDecInt = $this->decint->obtenerIdDecInt($pro_pep_id);
            $dec_int_id = $idDecInt[0]['dec_int_id'];
        } else {
            $idDecInt = $this->decint->obtenerIdDecInt($pro_pep_id);
            $dec_int_id = $idDecInt[0]['dec_int_id'];
            $declaracionInt = $this->decint->obtenerDecInt($dec_int_id);
            $informacion['dec_int_fecha'] = $declaracionInt[0]['dec_int_fecha'];
            $informacion['dec_int_lugar'] = $declaracionInt[0]['dec_int_lugar'];
            $informacion['dec_int_comentario'] = $declaracionInt[0]['dec_int_comentario'];
            $informacion['dec_int_ruta_archivo'] = $declaracionInt[0]['dec_int_ruta_archivo'];
            $informacion['nombreArchivo'] = end(explode("/", $declaracionInt[0]['dec_int_ruta_archivo']));
        }
        $informacion['dec_int_id'] = $dec_int_id;
        /* CARGA DE PLANTILLAS */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/declaracionInteres_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarDeclaracionInteres($dec_int_id) {
        /* VARIABLES POST */
        $dec_int_fecha = $this->input->post("dec_int_fecha");
        if ($dec_int_fecha == '')
            $dec_int_fecha = null;
        $dec_int_lugar = $this->input->post("dec_int_lugar");
        $dec_int_comentario = $this->input->post("dec_int_comentario");
        $dec_int_ruta_archivo = $this->input->post("dec_int_ruta_archivo");

        /* ACTUALIZANDO DECLARACIÒN DE INTERÈS */
        $this->load->model('etapa1-sub23/declaracion_interes', 'decInt');
        $this->decInt->actualizarDecInt($dec_int_id, $dec_int_fecha, $dec_int_lugar, $dec_int_comentario, $dec_int_ruta_archivo);

        redirect('componente2/comp23_E1/declaracionInteres?g=true');
    }

    public function equipoApoyo() {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $g = $this->input->get('g');
        if ($g)
            $informacion['guardo'] = true;
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
        $this->load->model('etapa1-sub23/grupo_apoyo', 'gruapo');

        $numGruApo = $this->gruapo->contarGruApoPorPep($pro_pep_id);
        if ($numGruApo == 0) {
            $this->gruapo->agregarGruApo($pro_pep_id);
            $idGruApo = $this->gruapo->obtenerIdGruApo($pro_pep_id);
            $gru_apo_id = $idGruApo[0]['gru_apo_id'];
            $this->load->model('proyectoPep/proyecto_pep', 'proPep');
            $this->proPep->actualizarIndices('gru_apo_id', $gru_apo_id, $pro_pep_id);
        } else {
            $idGruApo = $this->gruapo->obtenerIdGruApo($pro_pep_id);
            $gru_apo_id = $idGruApo[0]['gru_apo_id'];
            $grupoApoyo = $this->gruapo->obtenerGruApo($gru_apo_id);
            $informacion['gru_apo_fecha'] = $grupoApoyo[0]['gru_apo_fecha'];
            $informacion['gru_apo_c3'] = $grupoApoyo[0]['gru_apo_c3'];
            $informacion['gru_apo_c4'] = $grupoApoyo[0]['gru_apo_c4'];
            $informacion['gru_apo_observacion'] = $grupoApoyo[0]['gru_apo_observacion'];
            $informacion['gru_apo_lugar'] = $grupoApoyo[0]['gru_apo_lugar'];
        }
        $informacion['gru_apo_id'] = $gru_apo_id;
        /* CARGA DE PLANTILLAS */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/equipoApoyo_view', $informacion);
        $this->load->view('plantilla/footer');
    }

    public function guardarEquipoApoyo($gru_apo_id) {
        /* VARIABLES POST */
        $gru_apo_fecha = $this->input->post('gru_apo_fecha');
        if ($gru_apo_fecha == '')
            $gru_apo_fecha = null;
        $gru_apo_c3 = $this->input->post('gru_apo_c3');
        if ($gru_apo_c3 == '0')
            $gru_apo_c3 = null;
        $gru_apo_c4 = $this->input->post('gru_apo_c4');
        if ($gru_apo_c4 == '0')
            $gru_apo_c4 = null;
        $gru_apo_observacion = $this->input->post('gru_apo_observacion');
        $gru_apo_lugar = $this->input->post('gru_apo_lugar');

        if ($gru_apo_fecha == '')
            $gru_apo_fecha = null;

        /* ACTUALIZANDO DECLARACIÒN DE INTERÈS */
        $this->load->model('etapa1-sub23/grupo_apoyo', 'gruApo');
        $this->gruApo->actualizarGruApo($gru_apo_id, $gru_apo_fecha, $gru_apo_c3, $gru_apo_c4, $gru_apo_observacion, $gru_apo_lugar);

        redirect('componente2/comp23_E1/equipoApoyo?g=true');
    }

    public function capacitacionEquipoApoyo() {
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
        $informacion['capacitaciones'] = $this->capacitacion->obtenerCapacitaciones($pro_pep_id, 1);
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/capacitacion_view', $informacion);
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
        $gru_apo_id = $resultado[0]['gru_apo_id'];
        $informacion['gru_apo_id'] = $gru_apo_id;
        /* CREAR MODELO PARA CAPACITACIÓN */
        $this->load->model('etapa1-sub23/capacitacion');
        $this->capacitacion->agregarCapacitacion($pro_pep_id, 1);
        $resultado = $this->capacitacion->obtenerIdCapacitacion($pro_pep_id, 1);
        $cap_id = $resultado[0]['cap_id'];
        /* OBTENER EL GRUPO LOCAL DE APOYO */
        $this->load->model('participante');
        $this->load->model('etapa1-sub23/participante_capacitacion', 'parCap');
        $participantes = $this->participante->obtenerParticipantesGA($gru_apo_id);
        foreach ($participantes as $aux)
            $resultado = $this->parCap->insertarParticipa($cap_id, $aux->par_id);
        /**/
        $informacion['cap_id'] = $cap_id;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/registrarCapacitacionEA_view', $informacion);
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
        $informacion['gru_apo_id'] = $resultado[0]['gru_apo_id'];

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
        $this->load->view('componente2/subcomp23/etapa1/editarCapacitacionEA_view', $informacion);
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
        redirect('componente2/comp23_E1/capacitacionEquipoApoyo');
    }

    public function cancelaCapacitacion($cap_id) {
        $this->load->model('etapa1-sub23/capacitacion');
        $this->capacitacion->eliminaCapacitacion($cap_id);
        redirect('componente2/comp23_E1/capacitacionEquipoApoyo');
    }

    public function cargarFacilitadores($campo, $campo_id) {
        $this->load->model('etapa1-sub23/facilitador');
        $facilitadores = $this->facilitador->obtenerFacilitadores($campo, $campo_id);
        $numfilas = count($facilitadores);

        $i = 0;
        foreach ($facilitadores as $aux) {
            $rows[$i]['id'] = $aux->fac_id;
            $rows[$i]['cell'] = array($aux->fac_id,
                $aux->fac_nombre,
                $aux->fac_apellido,
                $aux->fac_telefono,
                $aux->fac_email
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

    public function gestionFacilitadores($campo, $campo_id) {
        /* OBTENIENDO LAS VARIABLES */
        $fac_id = $this->input->post("id");
        $fac_nombre = $this->input->post("fac_nombre");
        $fac_apellido = $this->input->post("fac_apellido");
        $fac_email = $this->input->post("fac_email");
        $fac_telefono = $this->input->post("fac_telefono");
        $operacion = $this->input->post('oper');
        /* FIN DE VARIABLES */
        $this->load->model('etapa1-sub23/facilitador');
        switch ($operacion) {
            case 'add':
                $this->facilitador->agregarFacilitador($fac_nombre, $fac_apellido, $fac_email, $campo, $campo_id, $fac_telefono);
                break;
            case 'edit':
                $this->facilitador->modificarFacilitador($fac_id, $fac_nombre, $fac_apellido, $fac_email, $fac_telefono);
                break;
            case 'del':
                $this->facilitador->eliminarFacilitador($fac_id);
                break;
        }
    }

    public function informePreliminar() {
        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $g = $this->input->get('g');
        if ($g)
            $informacion['guardo'] = true;
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
        //CUMPLIMIENTOS MINIMOS
        $cumplimientosMinimos = $this->cumm->obtenerCumplimientoMinimo(1);
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $resultado = $this->proPep->obtenerGrupoApoyo($pro_pep_id);
        $informacion['gru_apo_id'] = $resultado[0]['gru_apo_id'];
        /* INFORMACIÓN DEL INFORME PRELIMINAR */
        $this->load->model('etapa1-sub23/informe_preliminar', 'infPre');
        $resultado = $this->infPre->contarInfPrePorPep($pro_pep_id);
        $this->load->model('etapa1-sub23/cumplimiento_informe', 'cumInf');
        if ($resultado == '0') {
            $this->infPre->agregarInfPre($pro_pep_id);
            $resultado = $this->infPre->obtenerInfPre($pro_pep_id);
            $this->load->model('proyectoPep/proyecto_pep', 'proPep');
            $this->proPep->actualizarIndices('inf_pre_id', $resultado[0]['inf_pre_id'], $pro_pep_id);
            foreach ($cumplimientosMinimos as $aux)
                $this->cumInf->insertarCumplimientoInform($resultado[0]['inf_pre_id'], $aux->cum_min_id);
        } else {
            $resultado = $this->infPre->obtenerInfPre($pro_pep_id);
        }
        $informacion['inf_pre_id'] = $resultado[0]['inf_pre_id'];
        $informacion['inf_pre_firmam'] = $resultado[0]['inf_pre_firmam'];
        $informacion['inf_pre_firmai'] = $resultado[0]['inf_pre_firmai'];
        $informacion['inf_pre_firmau'] = $resultado[0]['inf_pre_firmau'];
        $informacion['inf_pre_aceptacion'] = $resultado[0]['inf_pre_aceptacion'];
        $informacion['inf_pre_fecha_borrador'] = $resultado[0]['inf_pre_fecha_borrador'];
        $informacion['inf_pre_fecha_observacion'] = $resultado[0]['inf_pre_fecha_observacion'];
        $informacion['inf_pre_observacion'] = $resultado[0]['inf_pre_observacion'];
        $informacion['inf_pre_ruta_archivo'] = $resultado[0]['inf_pre_ruta_archivo'];
        $informacion['nombreArchivo'] = end(explode("/", $resultado[0]['inf_pre_ruta_archivo']));
        $informacion['cumplimientosMinimos'] = $this->cumInf->obtenerLosCumplimientosInforme($resultado[0]['inf_pre_id']);
        /* FIN DE INFORME PRELIMINAR */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/inforPreMunicipio_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarInformePreliminar($inf_pre_id) {
        /* VARIABLES POST */
        $inf_pre_fecha_borrador = $this->input->post("inf_pre_fecha_borrador");
        if ($inf_pre_fecha_borrador == '')
            $inf_pre_fecha_borrador = null;
        $inf_pre_fecha_observacion = $this->input->post("inf_pre_fecha_observacion");
        if ($inf_pre_fecha_observacion == '')
            $inf_pre_fecha_observacion = null;
        $inf_pre_aceptacion = $this->input->post("inf_pre_aceptacion");
        if ($inf_pre_aceptacion == '')
            $inf_pre_aceptacion = null;
        else
            $inf_pre_aceptada = 'true';
        $inf_pre_firmau = $this->input->post("inf_pre_firmau");
        if ($inf_pre_firmau == '0')
            $inf_pre_firmau = null;
        $inf_pre_firmai = $this->input->post("inf_pre_firmai");
        if ($inf_pre_firmai == '0')
            $inf_pre_firmai = null;
        $inf_pre_firmam = $this->input->post("inf_pre_firmam");
        if ($inf_pre_firmam == '0')
            $inf_pre_firmam = null;
        $inf_pre_observacion = $this->input->post("inf_pre_observacion");
        $inf_pre_ruta_archivo = $this->input->post("inf_pre_ruta_archivo");
        /* OBTENIENDO VALORES DE LOS CRITERIOS */
        $this->load->model('cumplimiento_minimo');
        $this->load->model('etapa1-sub23/cumplimiento_informe', 'cumInf');
        $cumplimientos = $this->cumplimiento_minimo->obtenerCumplimientoMinimo(1);
        foreach ($cumplimientos as $cumplimiento_minimo) {
            if ($this->input->post("cum_" . $cumplimiento_minimo->cum_min_id) == '0')
                $valor = null;
            else
                $valor = $this->input->post("cum_" . $cumplimiento_minimo->cum_min_id);
            $this->cumInf->actualizarCumplimientoInform($valor, $inf_pre_id, $cumplimiento_minimo->cum_min_id);
        }

        /* ACTUALIZANDO ACUERDO MUNICIPAL */
        $this->load->model('etapa1-sub23/informe_preliminar', 'infPre');
        $this->infPre->actualizarInfPre($inf_pre_id, $inf_pre_firmam, $inf_pre_firmau, $inf_pre_firmai, $inf_pre_fecha_borrador, $inf_pre_aceptacion, $inf_pre_fecha_observacion, $inf_pre_observacion, $inf_pre_ruta_archivo, $inf_pre_aceptada);

        redirect(base_url('componente2/comp23_E1/InformePreliminar?g=true'));
    }

    public function inventarioInformacion() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';
        $g = $this->input->get('g');
        if ($g)
            $informacion['guardo'] = true;
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
        /* VERIFICAR SI ESTA CREADO EL INVENTARIO DE INFORMACIÒN */
        $this->load->model('etapa1-sub23/inventario_informacion', 'invInf');
        $resultado = $this->invInf->contarInvInfPorPep($pro_pep_id);
        if ($resultado == '0') {
            $this->invInf->agregarInvInf($pro_pep_id);
            $resultado = $this->invInf->obtenerInvInf($pro_pep_id);
            $this->load->model('proyectoPep/proyecto_pep', 'proPep');
            $this->proPep->actualizarIndices('inv_inf_id', $resultado[0]['inv_inf_id'], $pro_pep_id);
        }else
            $resultado = $this->invInf->obtenerInvInf($pro_pep_id);
        $informacion['inv_inf_id'] = $resultado[0]['inv_inf_id'];
        $informacion['inv_inf_observacion'] = $resultado[0]['inv_inf_observacion'];

        /* FIN DE VERIFICACIÒN */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/inventarioInformacion_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarInventarioInformacion($inv_inf_id) {
        /* VARIABLES POST */
        $inv_inf_observacion = $this->input->post("inv_inf_observacion");


        $this->load->model('etapa1-sub23/inventario_informacion');
        $this->inventario_informacion->editarInventarioInformacion($inv_inf_id, $inv_inf_observacion);
        redirect('componente2/comp23_E1/inventarioInformacion?g=true');
    }

    public function cargarFuentes($inv_inf_id, $tipo) {
        if (!strcasecmp($tipo, 'p')) {
            $this->load->model('etapa1-sub23/fuente_primaria', 'fuePri');
            $fuentes = $this->fuePri->obtenerFuePri($inv_inf_id);
            $numfilas = count($fuentes);

            $i = 0;
            foreach ($fuentes as $aux) {
                $rows[$i]['id'] = $aux->fue_pri_id;
                $rows[$i]['cell'] = array($aux->fue_pri_id,
                    $aux->fue_pri_nombre,
                    $aux->fue_pri_institucion,
                    $aux->fue_pri_cargo,
                    $aux->fue_pri_telefono,
                    $aux->fue_pri_tipo_info
                );
                $i++;
            }
        } else {
            $this->load->model('etapa1-sub23/fuente_secundaria', 'fueSec');
            $fuentes = $this->fueSec->obtenerFueSec($inv_inf_id);
            $numfilas = count($fuentes);

            $i = 0;
            foreach ($fuentes as $aux) {
                $rows[$i]['id'] = $aux->fue_sec_id;
                $rows[$i]['cell'] = array($aux->fue_sec_id,
                    $aux->fue_sec_nombre,
                    $aux->fue_sec_fuente,
                    $aux->fue_sec_disponible_en,
                    $aux->fue_sec_anio
                );
                $i++;
            }
        }
        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            if (!strcasecmp($tipo, 'p'))
                $rows = array();
            else
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

    public function gestionarFuentes($inv_inf_id, $tipo) {
        if (!strcasecmp($tipo, 'p')) {
            $fue_pri_id = $this->input->post("id");
            $fue_pri_nombre = $this->input->post("fue_pri_nombre");
            $fue_pri_institucion = $this->input->post("fue_pri_institucion");
            $fue_pri_cargo = $this->input->post("fue_pri_cargo");
            $fue_pri_telefono = $this->input->post("fue_pri_telefono");
            $fue_pri_tipo_info = $this->input->post("fue_pri_tipo_info");
            $this->load->model('etapa1-sub23/fuente_primaria', 'fuePri');
        } else {
            $fue_sec_id = $this->input->post("id");
            $fue_sec_nombre = $this->input->post("fue_sec_nombre");
            $fue_sec_fuente = $this->input->post("fue_sec_fuente");
            $fue_sec_disponible_en = $this->input->post("fue_sec_disponible_en");
            $fue_sec_anio = $this->input->post("fue_sec_anio");
            $this->load->model('etapa1-sub23/fuente_secundaria', 'fueSec');
        }
        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                if (!strcasecmp($tipo, 'p'))
                    $this->fuePri->agregarFuentePrimaria($fue_pri_nombre, $fue_pri_institucion, $fue_pri_cargo, $fue_pri_telefono, $fue_pri_tipo_info, $inv_inf_id);
                else
                    $this->fueSec->agregarFuenteSecundaria($fue_sec_nombre, $fue_sec_fuente, $fue_sec_disponible_en, $fue_sec_anio, $inv_inf_id);
                break;
            case 'edit':
                if (!strcasecmp($tipo, 'p'))
                    $this->fuePri->editarFuentePrimaria($fue_pri_id, $fue_pri_nombre, $fue_pri_institucion, $fue_pri_cargo, $fue_pri_telefono, $fue_pri_tipo_info);
                else
                    $this->fueSec->editarFuenteSecundaria($fue_sec_id, $fue_sec_nombre, $fue_sec_fuente, $fue_sec_disponible_en, $fue_sec_anio);
                break;
            case 'del':
                if (!strcasecmp($tipo, 'p'))
                    $this->fuePri->eliminarFuentePrimaria($fue_pri_id);
                else
                    $this->fueSec->eliminarFuenteSecundaria($fue_sec_id);
                break;
        }
    }

}

?>
