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
        $ultima = $this->reu->ultimaReunion($pro_pep_id, 3);
        $reu_numero = (int) $ultima[0]['ultima'] + 1;
        $informacion['reu_numero'] = $reu_numero;
        $this->reu->agregarReunion(3, $pro_pep_id, $reu_numero);
        $id_reunion = $this->reu->obtenerId(3, $pro_pep_id, $reu_numero);
        $reu_id = $id_reunion[0]['reu_id'];
        $informacion['reu_id'] = $reu_id;
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $resultado = $this->proPep->obtenerGrupoApoyo($pro_pep_id);
        $gru_ges_id = $resultado[0]['gru_ges_id'];
        $informacion['gru_ges_id'] = $gru_ges_id;
        $this->load->model('etapa3-sub23/participante_reunion', 'parReu');
        $this->load->model('participante');
        $participantes = $this->participante->obtenerParticipantesGG($gru_ges_id);
        foreach ($participantes as $aux)
            $resultado = $this->parReu->insertarParticipa($reu_id, $aux->par_id);
        //CARGAR CRITERIOS
        $this->load->model('etapa3-sub23/resultado');
        $this->load->model('etapa3-sub23/resultado_reunion', 'resultadoReunion');
        $resultados = $this->resultado->obtenerResultados();
        foreach ($resultados as $resulAux)
            $this->resultadoReunion->insertarResultadoReunion($reu_id, $resulAux->res_id);
        $informacion['resultados'] = $this->resultadoReunion->obtenerLosResultadosReunion($reu_id);
        /**/
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa3/registrarReunion_view', $informacion);
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

        $this->load->model('etapa3-sub23/resultado_reunion', 'resReu');
        $resultados = $this->resReu->obtenerLosResultadosReunion($reu_id);
        foreach ($resultados as $resultado) {
            if ($this->input->post("res_" . $resultado->res_id) == 0)
                $valor = 'false';
            else
                $valor = 'true';
            $this->resReu->actualizarResultadoReunion($valor, $reu_id, $resultado->res_id);
        }

        redirect('componente2/comp23_E3/muestraReuniones');
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
        $informacion['reu_duracion_horas'] = $datosReu[0]->reu_duracion_horas;
        $informacion['reu_numero'] = $datosReu[0]->reu_numero;
        $informacion['reu_tema'] = $datosReu[0]->reu_tema;
        $informacion['reu_observacion'] = $datosReu[0]->reu_observacion;
        //CRITERIOS_REUNION
        $this->load->model('etapa3-sub23/resultado_reunion', 'resultadoReunion');
        $informacion['resultados'] = $this->resultadoReunion->obtenerLosResultadosReunion($reu_id);
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $resultado = $this->proPep->obtenerGrupoApoyo($pro_pep_id);
        $gru_ges_id = $resultado[0]['gru_ges_id'];
        $informacion['gru_ges_id'] = $gru_ges_id;
        /**/
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa3/editarReunion_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarParticipanteGGReu($id, $reu_id) {
        $this->load->model('participante');
        $this->load->model('etapa3-sub23/participante_reunion', 'parReu');
        $participantes = $this->participante->obtenerParticipantesGG($id);
        $numfilas = count($participantes);

        $i = 0;
        if ($numfilas != 0) {
            foreach ($participantes as $aux) {
                $resultado = $this->parReu->obtenerParticipantesReu($reu_id, $aux->par_id);
                $rows[$i]['id'] = $aux->par_id;
                $rows[$i]['cell'] = array($aux->par_id,
                    $aux->par_dui,
                    $aux->par_nombre . ' ' . $aux->par_apellido,
                    strtoupper($aux->par_sexo),
                    $aux->par_cargo,
                    $aux->par_tel,
                    $resultado[0]['par_reu_participa']
                );
                $i++;
            }

            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ', ' ', ' ', ' ', ' ', ' ');
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

    public function gestionParticipantesReu($reu_id) {
        /* VARIABLES POST */
        $par_id = $this->input->post("id");
        $par_reu_participa = $this->input->post("par_reu_participa");

        $this->load->model('etapa3-sub23/participante_reunion', 'parReu');

        $this->parReu->actualizaParticipa($reu_id, $par_id, $par_reu_participa);
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
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $datos = $this->proPep->obtenerProyectoPep($pro_pep_id);
        $this->load->model('etapa3-sub23/cumplimiento_proyecto', 'cumPro');
        $cant = $this->cumPro->contarCumplimientosPep($pro_pep_id);
        if ($cant == 0) {
            $this->load->model('cumplimiento_minimo', 'cumm');
            $cumplimientosMinimos = $this->cumm->obtenerCumplimientoMinimo(3);
            foreach ($cumplimientosMinimos as $aux)
                $this->cumPro->insertarCumplimientoProy($pro_pep_id, $aux->cum_min_id);
        }
        $informacion['cumplimientosMinimos'] = $this->cumPro->obtenerLosCumplimientosPro($pro_pep_id);
        $informacion['pro_pep_fecha_borrador'] = $datos[0]->pro_pep_fecha_borrador;
        $informacion['pro_pep_fecha_observacion'] = $datos[0]->pro_pep_fecha_observacion;
        $informacion['pro_pep_fecha_aprobacion'] = $datos[0]->pro_pep_fecha_aprobacion;
        $informacion['pro_pep_ruta_archivo'] = $datos[0]->pro_pep_ruta_archivo;
        $informacion['pro_pep_observacion'] = $datos[0]->pro_pep_observacion;
        $informacion['pro_pep_firmaue'] = $datos[0]->pro_pep_firmaue;
        $informacion['pro_pep_firmais'] = $datos[0]->pro_pep_firmais;
        $informacion['pro_pep_firmacm'] = $datos[0]->pro_pep_firmacm;
        $informacion['pro_pep_id'] = $pro_pep_id;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa3/cumplimientoMinimo_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarCumplimientosMinimos($pro_pep_id) {
        /* VARIABLES POST */
        $pro_pep_fecha_borrador = $this->input->post("pro_pep_fecha_borrador");
        if ($pro_pep_fecha_borrador == '')
            $pro_pep_fecha_borrador = null;
        $pro_pep_fecha_observacion = $this->input->post("pro_pep_fecha_observacion");
        if ($pro_pep_fecha_observacion == '')
            $pro_pep_fecha_observacion = null;
        $pro_pep_fecha_aprobacion = $this->input->post("pro_pep_fecha_aprobacion");
        if ($pro_pep_fecha_aprobacion == '')
            $pro_pep_fecha_aprobacion = null;
        $pro_pep_firmaue = $this->input->post("pro_pep_firmaue");
        if ($pro_pep_firmaue == '0')
            $pro_pep_firmaue = null;
        $pro_pep_firmais = $this->input->post("pro_pep_firmais");
        if ($pro_pep_firmais == '0')
            $pro_pep_firmais = null;
        $pro_pep_firmacm = $this->input->post("pro_pep_firmacm");
        if ($pro_pep_firmacm == '0')
            $pro_pep_firmacm = null;
        $pro_pep_observacion = $this->input->post("pro_pep_observacion");
        $pro_pep_ruta_archivo = $this->input->post("pro_pep_ruta_archivo");
        /* OBTENIENDO VALORES DE LOS CRITERIOS */
        $this->load->model('etapa3-sub23/cumplimiento_proyecto', 'cumPro');
        $cumplimientos = $this->cumPro->obtenerLosCumplimientosPro($pro_pep_id);
        foreach ($cumplimientos as $cumplimiento_minimo) {
            if ($this->input->post("cum_" . $cumplimiento_minimo->cum_min_id) == '0')
                $valor = null;
            else
                $valor = $this->input->post("cum_" . $cumplimiento_minimo->cum_min_id);
            $this->cumPro->actualizarCumplimientoProy($valor, $pro_pep_id, $cumplimiento_minimo->cum_min_id);
        }

        /* ACTUALIZANDO ACUERDO MUNICIPAL */
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $this->proPep->actualizarProyectoPep($pro_pep_id, $pro_pep_firmacm, $pro_pep_firmais,$pro_pep_firmaue,$pro_pep_fecha_borrador,$pro_pep_fecha_observacion,$pro_pep_fecha_aprobacion,$pro_pep_ruta_archivo,$pro_pep_observacion);

        redirect(base_url('componente2/comp23_E3/cumplimientosMinimos'));
    }

}

?>
