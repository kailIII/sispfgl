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
        $ultima = $this->reu->ultimaReunion($pro_pep_id);
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
        $informacion['reuniones'] = $this->reunion->obtenerReuniones();
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
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

        /* FIN DE VARIABLES */
        $this->load->model('participante');
        switch ($operacion) {
            case 'add':
                $this->participante->agregarParticipantes($campo, $id_campo, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco);
                break;
            case 'edit':
                $this->participante->editarParticipantes($par_id, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco);
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
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');
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

        $numAcuMun = $this->acumun->contarAcuMunPorPep($pro_pep_id);
        if ($numAcuMun == 0) {
            $this->acumun->agregarAcuMun($pro_pep_id);
            $idAcuMun = $this->acumun->obtenerIdAcuMun($pro_pep_id);
            $acu_mun_id = $idAcuMun[0]['acu_mun_id'];
            foreach ($contrapartidas as $contraAux)
                $this->contraAcuerdo->insertarContrapartidaAcuerdo($acu_mun_id, $contraAux->con_id);
            foreach ($criterios as $criteAux)
                $this->criterioAcuerdo->insertarCriterioAcuerdo($acu_mun_id, $criteAux->cri_id);
        } else {
            $idAcuMun = $this->acumun->obtenerIdAcuMun($pro_pep_id);
            $acu_mun_id = $idAcuMun[0]['acu_mun_id'];
            $acuerdoMun = $this->acumun->obtenerAcuMun($acu_mun_id);
            $informacion['acu_mun_fecha'] = $acuerdoMun[0]['acu_mun_fecha'];
            $informacion['acu_mun_p1'] = $acuerdoMun[0]['acu_mun_p1'];
            $informacion['acu_mun_p2'] = $acuerdoMun[0]['acu_mun_p2'];
            $informacion['acu_mun_observacion'] = $acuerdoMun[0]['acu_mun_observacion'];
            $informacion['acu_mun_ruta_archivo'] = $acuerdoMun[0]['acu_mun_ruta_archivo'];
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
        if ($acu_mun_p1 == 0)
            $acu_mun_p1 = null;
        $acu_mun_p2 = $this->input->post("acu_mun_p2");
        if ($acu_mun_p2 == 0)
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
            if ($this->input->post("con_" . $contrapartida->con_id) == 0)
                $valor = 'false';
            else
                $valor = 'true';
            $this->contraAcuerdo->actualizarContrapartidaAcuerdo($valor, $acu_mun_id, $contrapartida->con_id);
        }

        /* ACTUALIZANDO ACUERDO MUNICIPAL */
        $this->load->model('etapa1-sub23/acuerdo_municipal', 'acuerdoMun');
        $this->acuerdoMun->actualizarAcuMun($acu_mun_id, $acu_mun_fecha, $acu_mun_p1, $acu_mun_p2, $acu_mun_observacion, $acu_mun_ruta_archivo);

        redirect('componente2/comp23_E1/');
    }

    public function subirArchivo($tabla, $campo_id, $campo) {
        echo $this->librerias->subirDocumento($tabla, $campo_id, $_FILES, $campo);
    }

    public function declaracionInteres() {
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

        redirect('componente2/comp23_E1/');
    }

    public function equipoApoyo() {
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
        $this->load->model('etapa1-sub23/grupo_apoyo', 'gruapo');

        $numGruApo = $this->gruapo->contarGruApoPorPep($pro_pep_id);
        if ($numGruApo == 0) {
            $this->gruapo->agregarGruApo($pro_pep_id);
            $idGruApo = $this->gruapo->obtenerIdGruApo($pro_pep_id);
            $gru_apo_id = $idGruApo[0]['gru_apo_id'];
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
        $gru_apo_c3 = $this->input->post('gru_apo_c3');
        $gru_apo_c4 = $this->input->post('gru_apo_c4');
        $gru_apo_observacion = $this->input->post('gru_apo_observacion');
        $gru_apo_lugar = $this->input->post('gru_apo_lugar');

        if ($gru_apo_fecha == '')
            $gru_apo_fecha = null;

        /* ACTUALIZANDO DECLARACIÒN DE INTERÈS */
        $this->load->model('etapa1-sub23/grupo_apoyo', 'gruApo');
        $this->gruApo->actualizarGruApo($gru_apo_id, $gru_apo_fecha, $gru_apo_c3, $gru_apo_c4, $gru_apo_observacion, $gru_apo_lugar);

        redirect('componente2/comp23_E1/');
    }

    public function capacitacionEquipoApoyo() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
                
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/capacitacion_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function inforPreMunicipio() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $this->load->model('cumplimiento_minimo', 'cumm');
        $datos['cumplimientosMinimos'] = $this->cumm->obtenerCumplimientoMinimo();
        $this->load->model('participante');
        $datos['participantes'] = $this->participante->obtenerParticipantes();
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/inforPreMunicipio_view', $datos);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function inventarioInformacion() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/inventarioInformacion_view');
        $this->load->view('plantilla/footer', $informacion);
    }

}

?>
