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
        /* REGLAS DE VALIDACIÒN */

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
        $pro_pep_id = $datos[0]->id;
        $informacion['proyectoPep'] = $datos[0]->Proyecto;
        /* FIN OBTENER DEPARTAMENTO */
        /* OBTENER DATOS DE LA REUNION  */
        $this->load->model('etapa1-sub23/reunion', 'reu');
        $datosReu = $this->reu->obtenerReunionId($reu_id);
        $informacion['reu_id']=$reu_id;
        $informacion['reu_numero']=$datosReu[0]->reu_numero;
        $informacion['reu_fecha']=$datosReu[0]->reu_fecha;
        $informacion['reu_duracion_horas']=$datosReu[0]->reu_duracion_horas;
        $informacion['reu_tema']=$datosReu[0]->reu_tema;
        $informacion['reu_resultado']=$datosReu[0]->reu_resultado;
        $informacion['reu_observacion']=$datosReu[0]->reu_observacion;
        
        /* FIN DE OBTENER DATOS DE LA REUNION*/
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
        $participantes = $this->participante->obtenerParticipantes($campo, $id_campo);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_nombre,
                $aux->par_apellido,
                strtoupper($aux->par_sexo),
                $aux->ins_id,
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
        $id = $this->input->post("id");
        $par_nombre = $this->input->post("par_nombre");
        $par_apellido = $this->input->post("par_apellido");
        $par_sexo = $this->input->post("par_sexo");
        $ins_id = $this->input->post("par_institucion");
        $par_cargo = $this->input->post("par_cargo");
        $operacion = $this->input->post('oper');

        /* VARIABLE GET */
        $this->load->model('participante');
        switch ($operacion) {
            case 'add':
                $this->participante->agregarParticipantes($campo, $id_campo, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo);
                break;
            case 'edit':
                $this->participante->editarParticipantes($id, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo);
                break;
            case 'del':
                $this->participante->eliminarParticipantes($id);
                break;
        }
    }
    
    public function calcularTotalSexo($campo, $id_campo) {
        $this->load->model('participante');
        $totales = $this->participante->calcularSexo($campo, $id_campo);

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

        $this->load->model('criterio');
        $datos['criterios'] = $this->criterio->obtenerCriterios();
        $this->load->model('contrapartida');
        $datos['contrapartidas'] = $this->contrapartida->obtenerContrapartidas();
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/acuerdoMunicipal_view', $datos);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function declaracionInteres() {

        $informacion['titulo'] = 'Componente 2.3.2';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/declaracionInteres_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function equipoApoyo() {

        $informacion['titulo'] = 'Componente 2.3.2';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $informacion['gru_apo_id'] = 1;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/equipoApoyo_view');
        $this->load->view('plantilla/footer');
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

    public function capacitacionEquipoApoyo() {

        $informacion['titulo'] = 'Componente 2.3 Pautas Metodológicas para la 
            Planeación Estratégica Participativa';

        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/etapa1/capacitacionEquipoApoyo_view');
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

    public function cargarParticipanteGA() {
        $this->load->model('participante');
        $id = $this->input->get("gru_apo_id");
        $participantes = $this->participante->obtenerParticipantesGA($id);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_dui,
                $aux->par_nombre,
                $aux->par_apellido,
                strtoupper($aux->par_sexo),
                $aux->par_edad,
                $aux->par_proviene,
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

}

?>
