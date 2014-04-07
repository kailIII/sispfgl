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
        $this->load->model('poa/poa_actividad_detalle', 'detalle');
        $this->load->model('poa/poa_actividad_seg_tri', 'trimestral');
        $this->load->model('poa/poa_actividad_seguimiento', 'seguimiento');
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

    public function cargarActividades($poa_com_id, $anio = false) {
        $informacion['ruta'] = $this->ruta;
        if ($anio == false) {
            $informacion['poa_com_id'] = $poa_com_id;
            $informacion['actividades'] = $this->actividad->obtenerActividadesPadres($poa_com_id);
        } else {
            $informacion['poa_com_id'] = $poa_com_id;
            $informacion['actividades'] = $this->actividad->obtenerActividadesPadresSeg($poa_com_id, $anio);
        }
        $this->load->view($this->ruta . 'cargar_actividades_view', $informacion);
    }

    public function gestionarActividad($poa_comp_id, $anio, $poa_act_id = false, $poa_act_hijo = false) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $informacion['titulo'] = 'Planificación Operativa Anual';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $informacion['poa_com_id'] = $poa_comp_id;
        $informacion['anio'] = $anio;
        if ($poa_act_id != false) {
            $actividad = $this->poa->obtener_por_id($this->dbPrefix . 'actividad', $this->dbPrefix . 'act_id', (int) $poa_act_id);
            $informacion['poa_act_cod_presupuestario'] = $actividad->poa_act_cod_presupuestario;
            $informacion['poa_act_codigo'] = $actividad->poa_act_codigo;
            $informacion['poa_act_descripcion'] = $actividad->poa_act_descripcion;
            $informacion['poa_act_unidad_medida'] = $actividad->poa_act_unidad_medida;
            $informacion['poa_act_cantidad'] = $actividad->poa_act_cantidad;
            $informacion['poa_act_costo_unitario'] = $actividad->poa_act_costo_unitario;
            $informacion['poa_act_meta_total'] = $actividad->poa_act_meta_total;
            $informacion['poa_act_responsable'] = $actividad->poa_act_responsable;
            $informacion['poa_act_producto'] = $actividad->poa_act_producto;
            $informacion['poa_act_id'] = $actividad->poa_act_id;
            $informacion['poa_act_padre'] = $actividad->poa_act_padre;
        }
        $informacion['ruta'] = $this->ruta;
        if ($poa_comp_id == 1) {
            $this->load->view($this->ruta . 'gestion_act_componente1_view', $informacion);
        } else {
            $this->load->view($this->ruta . 'gestion_act_componente2_view', $informacion);
        }

        $this->load->view('plantilla/footer', $informacion);
    }

    public function gestionarSubActividad($poa_comp_id, $poa_act_padre, $anio, $poa_act_id = false) {
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
        $informacion['anio'] = $anio;
        $informacion['ruta'] = $this->ruta;
        if ($poa_act_id != false) {
            $actividad = $this->poa->obtener_por_id($this->dbPrefix . 'actividad', $this->dbPrefix . 'act_id', (int) $poa_act_id);
            $informacion['poa_act_cod_presupuestario'] = $actividad->poa_act_cod_presupuestario;
            $informacion['poa_act_codigo'] = $actividad->poa_act_codigo;
            $informacion['poa_act_descripcion'] = $actividad->poa_act_descripcion;
            $informacion['poa_act_unidad_medida'] = $actividad->poa_act_unidad_medida;
            $informacion['poa_act_cantidad'] = $actividad->poa_act_cantidad;
            $informacion['poa_act_costo_unitario'] = $actividad->poa_act_costo_unitario;
            $informacion['poa_act_meta_total'] = $actividad->poa_act_meta_total;
            $informacion['poa_act_responsable'] = $actividad->poa_act_responsable;
            $informacion['poa_act_producto'] = $actividad->poa_act_producto;
            $informacion['poa_act_id'] = $actividad->poa_act_id;
        }

        if ($poa_comp_id == 1) {
            $this->load->view($this->ruta . 'gestion_act_componente1_view', $informacion);
        } else {
            $this->load->view($this->ruta . 'gestion_act_componente2_view', $informacion);
        }

        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarActividad() {
        $tabla = 'poa_actividad';
        $detalle = 'poa_actividad_detalle';
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
                $datos = array(
                    'poa_act_id' => $poa_act_id,
                    'poa_act_det_anio' => $this->input->post('anio')
                );
                $this->poa->insertar_tabla($detalle, $datos);
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
                    'poa_act_cod_presupuestario' => $this->input->post('poa_act_cod_presupuestario'),
                    'poa_act_codigo' => $this->input->post('poa_act_codigo'),
                    'poa_act_descripcion' => $this->input->post('poa_act_descripcion'),
                    'poa_act_unidad_medida' => $this->input->post('poa_act_unidad_medida'),
                    'poa_act_cantidad' => $this->input->post('poa_act_cantidad'),
                    'poa_act_costo_unitario' => $this->input->post('poa_act_costo_unitario'),
                    'poa_act_meta_total' => $this->input->post('poa_act_meta_total'),
                    'poa_act_responsable' => $this->input->post('poa_act_responsable'),
                    'poa_act_producto' => $this->input->post('poa_act_producto'),
                    'poa_act_padre' => $valor,
                    'poa_com_id' => (int) $this->input->post('poa_com_id')
                );
                $this->poa->insertar_tabla($tabla, $datos);
                $poa_act_id = $this->poa->ultimoId($tabla, $campo);
                $datos = array(
                    'poa_act_id' => $poa_act_id,
                    'poa_act_det_anio' => $this->input->post('anio')
                );
                $this->poa->insertar_tabla($detalle, $datos);
            } else {
                $datos = array(
                    'poa_act_cod_presupuestario' => $this->input->post('poa_act_cod_presupuestario'),
                    'poa_act_codigo' => $this->input->post('poa_act_codigo'),
                    'poa_act_descripcion' => $this->input->post('poa_act_descripcion'),
                    'poa_act_unidad_medida' => $this->input->post('poa_act_unidad_medida'),
                    'poa_act_cantidad' => $this->input->post('poa_act_cantidad'),
                    'poa_act_costo_unitario' => $this->input->post('poa_act_costo_unitario'),
                    'poa_act_meta_total' => $this->input->post('poa_act_meta_total'),
                    'poa_act_responsable' => $this->input->post('poa_act_responsable'),
                    'poa_act_producto' => $this->input->post('poa_act_producto')
                );
                $poa_act_id = $this->input->post('poa_act_id');
                $this->poa->actualizar_tabla($tabla, $campo, $this->input->post('poa_act_id'), $datos);
            }
        }

        echo json_encode((int) $poa_act_id);
    }

    public function planificacionAnual() {
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
        $this->load->view($this->ruta . 'programacion_anio_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function gestionProgramacionAnual($anio, $poa_com_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $informacion['titulo'] = 'Planificación Operativa Anual';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $informacion['ruta'] = $this->ruta;
        $componente = $this->poa->obtener_por_id('poa_componente', 'poa_com_id', $poa_com_id);

        $informacion['componente'] = $componente->poa_com_codigo . " " . $componente->poa_com_descripcion;
        $informacion['anio'] = $anio;
        $informacion['poa_com_id'] = $poa_com_id;
        $actividades = $this->actividad->obtenerActividadComponente($poa_com_id, $anio);
        if ($this->detalle->obtenerActividadDetalle($anio, $poa_com_id)->valor == 0) {
            foreach ($actividades as $aux) {
                $datos = array(
                    'poa_act_id' => $aux->poa_act_id,
                    'poa_act_det_anio' => $anio
                );
                $this->poa->insertar_tabla('poa_actividad_detalle', $datos);
            }
        } else {
            foreach ($actividades as $aux) {
                if ($this->detalle->obtenerPorActividadDetalle($anio, $aux->poa_act_id)->valor == 0) {
                    $datos = array(
                        'poa_act_id' => $aux->poa_act_id,
                        'poa_act_det_anio' => $anio
                    );
                    $this->poa->insertar_tabla('poa_actividad_detalle', $datos);
                }
            }
        }
        if ($poa_com_id != 1)
            $ordenamiento = 'poa_act_id';
        else
            $ordenamiento = 'poa_act_codigo';
        $actividades = $this->actividad->obtenerPorActividadDetalle($poa_com_id, $anio, $ordenamiento);
        $informacion['actividades'] = $actividades;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        if ($poa_com_id == 1)
            $this->load->view($this->ruta . 'gestion_programacion_anual_view', $informacion);
        else
            $this->load->view($this->ruta . 'gestion_programacion_anual_2_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarPlanificacionAnual($poa_act_id, $poa_com_id) {
        $actividad = $this->actividad->obtenerActividad($poa_act_id);
        $tabla = "poa_actividad_detalle";
        $tabla2 = "poa_actividad_seguimiento";
        $campo = "poa_act_det_id";
        $campo2 = "poa_act_seg_mes";
        if ($poa_com_id != 1) {
            if ($this->input->post($poa_act_id . '_poa_actividad_mes_fin') == '')
                $fechaFin = NULL;
            else
                $fechaFin = $this->input->post($poa_act_id . '_poa_actividad_mes_fin');

            if ($this->input->post($poa_act_id . '_poa_act_mes_inicio') == '')
                $fechaInicio = NULL;
            else
                $fechaInicio = $this->input->post($poa_act_id . '_poa_act_mes_inicio');

            if ($this->input->post($poa_act_id . '_poa_act_realiza') == '')
                $realiza = NULL;
            else
                $realiza = $this->input->post($poa_act_id . '_poa_act_realiza');

            if ($this->input->post($poa_act_id . '_poa_act_periodo_car') == '')
                $periodoCar = NULL;
            else
                $periodoCar = $this->input->post($poa_act_id . '_poa_act_periodo_car');

            if ($this->input->post($poa_act_id . '_poa_act_monto_estimado') == '')
                $montoEstimado = NULL;
            else
                $montoEstimado = $this->input->post($poa_act_id . '_poa_act_monto_estimado');

            if ($this->input->post($poa_act_id . '_poa_act_metodo') == '')
                $metodo = NULL;
            else
                $metodo = $this->input->post($poa_act_id . '_poa_act_metodo');

            if ($this->input->post($poa_act_id . '_poa_act_pac') == '')
                $pac = NULL;
            else
                $pac = $this->input->post($poa_act_id . '_poa_act_pac');
            if ($this->input->post($poa_act_id . '_poa_act_ftdrs') == 0)
                $ftdrs = NULL;
            else
                $ftdrs = $this->input->post($poa_act_id . '_poa_act_ftdrs');

            $datos = array(
                'poa_act_det_contrapartida' => $this->input->post($poa_act_id . '_poa_act_det_contrapartida'),
                'poa_act_det_total_proyecto' => $this->input->post($poa_act_id . '_poa_act_det_total_proyecto'),
                'poa_act_mes_inicio' => $fechaInicio,
                'poa_actividad_mes_fin' => $fechaFin,
                'poa_act_realiza' => $realiza,
                'poa_act_ftdrs' => $ftdrs,
                'poa_act_periodo_car' => $periodoCar,
                'poa_act_periodo_tipo' => $this->input->post($poa_act_id . '_poa_act_periodo_tipo'),
                'poa_act_monto_estimado' => $montoEstimado,
                'poa_act_metodo' => $metodo,
                'poa_act_pac' => $pac,
                'poa_act_det_birf' => $this->input->post($poa_act_id . '_poa_act_det_birf')
            );
            $this->poa->actualizar_tabla($tabla, $campo, $actividad[0]->poa_act_det_id, $datos);
            $seguimientos = $this->seguimiento->obtenerSeguimientoActividad($actividad[0]->poa_act_det_id);
            foreach ($seguimientos as $seg) {
                $datos = array(
                    'poa_act_seg_desembolso' => $this->input->post($poa_act_id . "_" . $seg->poa_act_seg_mes . '_valor')
                );
                $this->poa->actualizar_tabla_2($tabla2, $campo, $actividad[0]->poa_act_det_id, $campo2, $seg->poa_act_seg_mes, $datos);
            }
        } else {
            if ($this->input->post($poa_act_id . '_poa_actividad_mes_fin') == '')
                $fechaFin = NULL;
            else
                $fechaFin = $this->input->post($poa_act_id . '_poa_actividad_mes_fin');
            if ($this->input->post($poa_act_id . '_poa_act_mes_inicio') == '')
                $fechaInicio = NULL;
            else
                $fechaInicio = $this->input->post($poa_act_id . '_poa_act_mes_inicio');
            $datos = array(
                'poa_act_det_meta_acumulada' => $this->input->post($poa_act_id . '_poa_act_det_meta_acumulada'),
                'poa_act_det_meta_planificada' => $this->input->post($poa_act_id . '_poa_act_det_meta_planificada'),
                'poa_act_mes_inicio' => $fechaInicio,
                'poa_actividad_mes_fin' => $fechaFin
            );
            $this->poa->actualizar_tabla($tabla, $campo, $actividad[0]->poa_act_det_id, $datos);
        }
    }

    public function obtenerActividadDetalle($poa_act_id) {
        $actividad = $this->actividad->obtenerActividad($poa_act_id);

        $rows[0]['id'] = $poa_act_id;
        $rows[0]['cell'] = array(
            $poa_act_id,
            $actividad[0]->poa_act_realiza,
            date('d-m-Y', strtotime($actividad[0]->poa_act_ftdrs)),
            $actividad[0]->poa_act_periodo_car,
            $actividad[0]->poa_act_periodo_tipo,
            $actividad[0]->poa_act_monto_estimado,
            $actividad[0]->poa_act_metodo,
            $actividad[0]->poa_act_pac,
            $actividad[0]->poa_act_mes_inicio,
            $actividad[0]->poa_actividad_mes_fin,
            $actividad[0]->poa_act_det_contrapartida,
            $actividad[0]->poa_act_det_total_proyecto,
            $actividad[0]->poa_act_det_meta_acumulada
        );
         $seguimientos = $this->seguimiento->obtenerSeguimientoActividad($actividad[0]->poa_act_det_id);
         $j=13;
        foreach ($seguimientos as $seg) {
            $rows[0]['cell'][$j] = array(
                $seg->poa_act_seg_desembolso
            );
            $j++;
        }

        $datos = json_encode($rows);

        $jsonresponse = '{
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function seguimientoPlanificacionAnual() {
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
        $this->load->view($this->ruta . 'programacion_anio_seguimiento_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function gestionSeguimientoTrimestral($anio, $poa_com_id, $trimestre) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $informacion['titulo'] = 'Planificación Operativa Anual';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $informacion['ruta'] = $this->ruta;
        $componente = $this->poa->obtener_por_id('poa_componente', 'poa_com_id', $poa_com_id);

        $informacion['componente'] = $componente->poa_com_codigo . " " . $componente->poa_com_descripcion;
        $informacion['anio'] = $anio;
        $informacion['poa_com_id'] = $poa_com_id;
        $actividades = $this->actividad->obtenerActividadComponente($poa_com_id, $anio);
        if ($this->trimestral->obtenerActividadDetalleTri($anio, $poa_com_id, $trimestre)->valor == 0) {
            if ($poa_com_id != 1)
                $ordenamiento = 'poa_act_id';
            else
                $ordenamiento = 'poa_act_codigo';
            $actividades = $this->actividad->obtenerPorActividadDetalle($poa_com_id, $anio, $ordenamiento);
            foreach ($actividades as $aux) {
                $datos = array(
                    'poa_act_det_id' => $aux->poa_act_det_id,
                    'poa_act_seg_tri_mes' => $trimestre
                );
                $this->poa->insertar_tabla('poa_actividad_seg_tri', $datos);
            }
        } else {
            if ($poa_com_id != 1)
                $ordenamiento = 'poa_act_id';
            else
                $ordenamiento = 'poa_act_codigo';
            $actividades = $this->actividad->obtenerPorActividadDetalle($poa_com_id, $anio, $ordenamiento);
            foreach ($actividades as $aux) {
                if ($this->trimestral->obtenerActividadTri($anio, $aux->poa_act_id, $trimestre)->valor == 0) {
                    $datos = array(
                        'poa_act_det_id' => $aux->poa_act_det_id,
                        'poa_act_seg_tri_mes' => $trimestre
                    );
                    $this->poa->insertar_tabla('poa_actividad_seg_tri', $datos);
                }
            }
        }
        $actividades = $this->actividad->obtenerPorActividadDetalleTri($poa_com_id, $anio, $trimestre);
        switch ($trimestre) {
            case 1:
                $trim = "Primer";
                break;
            case 2:
                $trim = "Segundo";
                break;
            case 3:
                $trim = "Tercer";
                break;
            case 4:
                $trim = "Cuarto";
                break;
        }

        $informacion['actividades'] = $actividades;
        $informacion['trimestre'] = $trim;
        $informacion['poa_act_seg_tri_mes'] = $trimestre;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view($this->ruta . 'gestion_programacion_anual_trimestral_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarPlanificacionTrimestral($anio, $poa_com_id, $trimestre) {
        $actividades = $this->actividad->obtenerPorActividadDetalleTri($poa_com_id, $anio, $trimestre);
        $tabla = "poa_actividad_seg_tri";
        $campo = "poa_act_seg_tri_id";
        foreach ($actividades as $aux) {
            if ($this->input->post($aux->poa_act_id . '_poa_act_seg_tri_nivel') == '')
                $nivel = NULL;
            else
                $nivel = $this->input->post($aux->poa_act_id . '_poa_act_seg_tri_nivel');
            $datos = array(
                'poa_act_seg_tri_nivel' => $nivel,
                'poa_act_seg_tri_valoracion' => $this->input->post($aux->poa_act_id . '_poa_act_seg_tri_valoracion'),
                'poa_act_seg_tri_decision' => $this->input->post($aux->poa_act_id . '_poa_act_seg_tri_decision'),
                'poa_act_seg_tri_observacion' => $this->input->post($aux->poa_act_id . '_poa_act_seg_tri_observacion')
            );
            $this->poa->actualizar_tabla($tabla, $campo, $aux->poa_act_seg_tri_id, $datos);
        }
    }

    public function eliminarActividad($poa_act_id) {
        $this->actividad->eliminarActividad($poa_act_id);
        redirect($this->ruta . "gestionActividades");
    }

}

?>
