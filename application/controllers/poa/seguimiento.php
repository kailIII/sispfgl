<?php

/**
 * Contendrá todos los metodos realacionados al registro del POA dentro del
 * sistema.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

    private $ruta = "poa/seguimiento/";
    private $dbPrefix = "poa_";

    public function __construct() {
        parent::__construct();
        $this->load->model('poa/poa_componente', 'componente');
        $this->load->model('poa/poa_indicador', 'indicador');
        $this->load->model('poa/poa_actividad', 'actividad');
        $this->load->model('poa/poa_model', 'poa');
    }

    public function informacionComponente() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $informacion['titulo'] = 'Planificación Operativa Anual';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $informacion['ruta'] = $this->ruta;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view($this->ruta . 'gestion_componente_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarComponentes() {
        $resultados = $this->componente->obtenerComponentesPadres();
        $rows = array();
        $numfilas = count($resultados);
        $i = 0;
        if ($numfilas != 0) {
            foreach ($resultados as $aux) {
                $rows[$i]['id'] = $aux->poa_com_id;
                $rows[$i]['cell'] = array($aux->poa_com_id,
                    $aux->poa_com_codigo,
                    $aux->poa_com_descripcion
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / $this->input->get('rows')) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function cargarSubComponentes($padre) {
        $resultados = $this->componente->obtenerSubComponentes($padre);
        $rows = array();
        $numfilas = count($resultados);
        $i = 0;
        if ($numfilas != 0) {
            foreach ($resultados as $aux) {
                $rows[$i]['id'] = $aux->poa_com_id;
                $rows[$i]['cell'] = array($aux->poa_com_id,
                    $aux->poa_com_codigo,
                    $aux->poa_com_descripcion
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / $this->input->get('rows')) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function gestionarComponente($poa_comp_id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        if (!$poa_comp_id) {
            $codigo = $this->componente->obtenerUltimoCodigo();
            $codigo = str_replace('.', '', $codigo);
            $datos = array('poa_com_codigo' => ((int) $codigo + 1) . '.');
            $this->poa->insertar_tabla('poa_componente', $datos);
            $poa_comp_id = $this->poa->ultimoId('poa_componente', 'poa_com_id');
        }
        $componente = $this->poa->obtener_por_id("poa_componente", 'poa_com_id', $poa_comp_id);
        $informacion['poa_com_descripcion'] = $componente->poa_com_descripcion;
        $informacion['poa_com_objetivo'] = $componente->poa_com_objetivo;
        $informacion['poa_com_resultado'] = $componente->poa_com_resultado;
        $informacion['poa_com_codigo'] = $componente->poa_com_codigo;
        $informacion['poa_com_id'] = $poa_comp_id;
        $informacion['titulo'] = 'Planificación Operativa Anual';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $informacion['ruta'] = $this->ruta;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view($this->ruta . 'crear_componente_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function borrarComponente($poa_com_id) {
        $tabla = $this->dbPrefix . 'componente';
        $this->poa->eliminar_tabla($tabla, 'poa_com_id', $poa_com_id);
        redirect(base_url($this->ruta . 'informacionComponente'));
    }

    public function guardarComponente() {

        $datos = array(
            $this->dbPrefix . 'com_codigo' => $this->input->post($this->dbPrefix . 'com_codigo'),
            $this->dbPrefix . 'com_objetivo' => $this->input->post($this->dbPrefix . 'com_objetivo'),
            $this->dbPrefix . 'com_resultado' => $this->input->post($this->dbPrefix . 'com_resultado'),
            $this->dbPrefix . 'com_descripcion' => $this->input->post($this->dbPrefix . 'com_descripcion')
        );

        $this->poa->actualizar_tabla('poa_componente', 'poa_com_id', $this->input->post($this->dbPrefix . 'com_id'), $datos);
    }

    public function cargarIndicadores($poa_ind_tipo, $poa_com_id) {
        $resultados = $this->indicador->obtenerIndicadoresComponenteTipo($poa_com_id, $poa_ind_tipo);
        $rows = array();
        $numfilas = count($resultados);
        $i = 0;
        if ($numfilas != 0) {
            foreach ($resultados as $aux) {
                $rows[$i]['id'] = $aux->poa_ind_id;
                $rows[$i]['cell'] = array($aux->poa_ind_id,
                    $i + 1,
                    $aux->poa_ind_descripcion
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / $this->input->get('rows')) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function gestionarIndicadores($poa_ind_tipo, $poa_com_id) {

        $datos = array(
            "poa_ind_descripcion" => $this->input->post("poa_ind_descripcion"),
            "poa_ind_tipo" => $poa_ind_tipo,
            "poa_com_id" => $poa_com_id
        );

        switch ($this->input->post("oper")) {
            case 'add':
                $this->poa->insertar_tabla('poa_indicador', $datos);
                break;
            case 'edit':
                $this->poa->actualizar_tabla('poa_indicador', 'poa_ind_id', $this->input->post('id'), $datos);
                break;
            case 'del':
                $this->poa->eliminar_tabla('poa_indicador', 'poa_ind_id', $this->input->post('id'));
                break;
        }
    }

    public function eliminarComponente($poa_com_id) {
        $tabla = $this->dbPrefix . 'componente';
        $this->poa->eliminar_tabla($tabla, 'poa_com_id', $poa_com_id);

        $resultado['resultado'] = array('valor' => 0);
        echo json_encode($resultado);
    }

    public function eliminarSubComponente() {
        $tabla = $this->dbPrefix . 'componente';
        $this->poa->eliminar_tabla($tabla, 'poa_com_id', $this->input->post('id'));
    }

    public function gestionarSubComponente($poa_com_padre, $poa_comp_id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        if (!$poa_comp_id) {
            $codigo = $this->componente->obtenerUltimoCodigoHijo($poa_com_padre);
            $codigo = explode(".", $codigo);
            $datos = array('poa_com_codigo' => $codigo[0] . "." . ((int) $codigo[1] + 1) . '.',
                'poa_com_padre' => $poa_com_padre);
            $this->poa->insertar_tabla('poa_componente', $datos);
            $poa_comp_id = $this->poa->ultimoId('poa_componente', 'poa_com_id');
        }
        $componente = $this->poa->obtener_por_id("poa_componente", 'poa_com_id', $poa_comp_id);
        $informacion['poa_com_descripcion'] = $componente->poa_com_descripcion;
        $informacion['poa_com_objetivo'] = $componente->poa_com_objetivo;
        $informacion['poa_com_resultado'] = $componente->poa_com_resultado;
        $informacion['poa_com_codigo'] = $componente->poa_com_codigo;
        $padre = $this->poa->obtener_por_id("poa_componente", 'poa_com_id', $poa_com_padre);
        $informacion['poa_comp_padre'] = $padre->poa_com_descripcion;
        $informacion['poa_com_id'] = $poa_comp_id;
        $informacion['titulo'] = 'Planificación Operativa Anual';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $informacion['ruta'] = $this->ruta;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view($this->ruta . 'crear_subcomponente_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function gestionActividades() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $informacion['titulo'] = 'Planificación Operativa Anual';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $informacion['ruta'] = $this->ruta;
        $informacion['componentes'] = $this->componente->obtenerComponentes();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view($this->ruta . 'gestion_actividades_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarActividades($poa_com_id) {
        $informacion['ruta'] = $this->ruta;
        $informacion['poa_com_id'] = $poa_com_id;
        $informacion['actividades'] = $this->actividad->obtenerActividadesPadres($poa_com_id);

        $this->load->view($this->ruta . 'cargar_actividades_view', $informacion);
    }

    public function gestionarActividad($poa_comp_id, $poa_act_id = false, $poa_act_hijo = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $informacion['titulo'] = 'Planificación Operativa Anual';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $informacion['poa_com_id'] = $poa_comp_id;
        if ($poa_act_id != false) {
            $actividad = $this->poa->obtener_por_id($this->dbPrefix . 'actividad', $this->dbPrefix . 'act_id', (int) $poa_act_id);
            $informacion['poa_act_codigo'] = $actividad->poa_act_codigo;
            $informacion['poa_act_descripcion'] = $actividad->poa_act_descripcion;
            $informacion['poa_act_meta_total'] = $actividad->poa_act_meta_total;
            $informacion['poa_act_id'] = $actividad->poa_act_id;
            $informacion['poa_act_padre'] = $actividad->poa_act_padre;
        }
        $informacion['ruta'] = $this->ruta;
     //   if ($poa_comp_id == 1) {
            $this->load->view($this->ruta . 'gestion_act_componente1_view', $informacion);
      //  } else {
     //       $this->load->view($this->ruta . 'gestion_act_componentes_view', $informacion);
     //   }

        $this->load->view('plantilla/footer', $informacion);
    }

    public function gestionarSubActividad($poa_comp_id, $poa_act_padre, $poa_act_id = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $informacion['titulo'] = 'Planificación Operativa Anual';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $informacion['poa_com_id'] = $poa_comp_id;
        $informacion['poa_act_padre'] = $poa_act_padre;
        $informacion['ruta'] = $this->ruta;
        if ($poa_act_id != false) {
            $actividad = $this->poa->obtener_por_id($this->dbPrefix . 'actividad', $this->dbPrefix . 'act_id', (int) $poa_act_id);
            $informacion['poa_act_codigo'] = $actividad->poa_act_codigo;
            $informacion['poa_act_descripcion'] = $actividad->poa_act_descripcion;
            $informacion['poa_act_meta_total'] = $actividad->poa_act_meta_total;
            $informacion['poa_act_id'] = $actividad->poa_act_id;
        }

        //   if ($poa_comp_id == 1) {
        $this->load->view($this->ruta . 'gestion_act_componente1_view', $informacion);
        // } else {
        //  $this->load->view($this->ruta . 'gestion_act_componentes_view', $informacion);
        //}

        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarActividad() {
        $tabla = 'poa_actividad';
        $campo = 'poa_act_id';
        if ($this->input->post('poa_com_id') == 1) {
            if ($this->input->post('poa_act_id') == '') {
                if ($this->input->post('poa_act_padre') == "")
                    $valor = null;
                else
                    $valor = $this->input->post('poa_act_padre');
                $datos = array(
                    'poa_act_padre' => $valor,
                    'poa_act_codigo' => $this->input->post('poa_act_codigo'),
                    'poa_act_descripcion' => $this->input->post('poa_act_descripcion'),
                    'poa_act_meta_total' => $this->input->post('poa_act_meta_total'),
                    'poa_com_id' => (int) $this->input->post('poa_com_id')
                );
                $this->poa->insertar_tabla($tabla, $datos);
                $poa_act_id = $this->poa->ultimoId($tabla, $campo);
            } else {
                $datos = array(
                    'poa_act_codigo' => $this->input->post('poa_act_codigo'),
                    'poa_act_descripcion' => $this->input->post('poa_act_descripcion'),
                    'poa_act_meta_total' => $this->input->post('poa_act_meta_total')
                );
                $poa_act_id = $this->input->post('poa_act_id');
                $this->poa->actualizar_tabla($tabla, $campo, $this->input->post('poa_act_id'), $datos);
            }
        } else {
            if ($this->input->post('poa_act_id') == '') {
                if ($this->input->post('poa_act_padre') == "")
                    $valor = null;
                else
                    $valor = $this->input->post('poa_act_padre');
                $datos = array(
                    'poa_act_padre' => $valor,
                    'poa_act_codigo' => $this->input->post('poa_act_codigo'),
                    'poa_act_descripcion' => $this->input->post('poa_act_descripcion'),
                    'poa_act_meta_total' => $this->input->post('poa_act_meta_total'),
                    'poa_com_id' => (int) $this->input->post('poa_com_id')
                );
                $this->poa->insertar_tabla($tabla, $datos);
                $poa_act_id = $this->poa->ultimoId($tabla, $campo);
            } else {
                $datos = array(
                    'poa_act_codigo' => $this->input->post('poa_act_codigo'),
                    'poa_act_descripcion' => $this->input->post('poa_act_descripcion'),
                    'poa_act_meta_total' => $this->input->post('poa_act_meta_total')
                );
                $poa_act_id = $this->input->post('poa_act_id');
                $this->poa->actualizar_tabla($tabla, $campo, $this->input->post('poa_act_id'), $datos);
            }
        }

        echo json_encode((int) $poa_act_id);
    }

}

?>
