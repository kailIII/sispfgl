<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas de la Etapa 1
 * Del PEP por los consultores asignados.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProcesoAdministrativo extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $informacion['titulo'] = 'Proceso Administrativo del PEP';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/proceso_administrativo/index_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function adquisicionContrataciones() {
        $informacion['titulo'] = 'Proceso de Adquisicion y Contrataciones';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
//OBTENER DEPARTAMENTOS
        $this->load->model('etapa0-sub23/grupo');
        $informacion['grupos'] = $this->grupo->obtenerGrupos();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/proceso_administrativo/adquisicionyContrataciones_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function editarAdquisicionContrataciones() {
        $informacion['titulo'] = 'Proceso de Adquisicion y Contrataciones';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

//$mun_id = $this->input->post("selMun");
        $gru_id = $this->input->post("selGrupo");
        $this->load->model('procesoAdministrativo/proceso');
        $this->load->model('pais/municipio');
        $this->load->model('procesoAdministrativo/pestania_proceso', 'pesPro');
        $this->load->model('procesoAdministrativo/proceso_etapa', 'proEta');
        $this->load->model('procesoAdministrativo/nombre_fecha_aprobacion', 'nomFecApr');
        $this->load->model('procesoAdministrativo/nombrefecha_procesoetapa', 'fechaPro');
        $this->load->model('etapa0-sub23/grupo');
        $municipios = $this->municipio->obtenerMunicipioPorGrupo($gru_id);
        foreach ($municipios as $mun) {
            $resultado = $this->proceso->contarProPorMuni($mun->mun_id);
            if ($resultado == '0') {
                $this->proceso->agregarPro($mun->mun_id);
                $pestanias = $this->pesPro->obtenerPestaniaProcesos();
                foreach ($pestanias as $aux) {
                    $this->proEta->insertarProcesoEtapa($mun->mun_id, $aux->pes_pro_id);
                    $nombresFechas = $this->nomFecApr->obtenerNombresFechas();
                    $etapaId = $this->proEta->obtenerMaxId();
                    foreach ($nombresFechas as $aux2) {
                        $this->fechaPro->insertarFechaProceso($etapaId[0]->pro_eta_id, $aux2->nom_fec_apr_id);
                    }
                }
            }
            $mun_id = $mun->mun_id;
        }

        $resultado = $this->proceso->obtenerPro($mun_id);
        $grupo = $this->grupo->obtenerGrupo($gru_id);
        $informacion['grupo_id'] = $grupo[0]->gru_id;
        $informacion['grupo_numero'] = $grupo[0]->gru_numero;
        $informacion['pro_id'] = $resultado[0]->pro_id;
        $informacion['pro_numero'] = $resultado[0]->pro_numero;
        $informacion['pro_fpublicacion'] = $resultado[0]->pro_fpublicacion;
        $informacion['pro_faclara_dudas'] = $resultado[0]->pro_faclara_dudas;
        $informacion['pro_fexpresion_interes'] = $resultado[0]->pro_fexpresion_interes;
        $informacion['pro_observacion1'] = $resultado[0]->pro_observacion1;
        $informacion['pro_pub_ruta_archivo'] = $resultado[0]->pro_pub_ruta_archivo;
        $informacion['pro_exp_ruta_archivo'] = $resultado[0]->pro_exp_ruta_archivo;
        /* $resultado = $this->municipio->obtenerNomMunDep($mun_id);
          $informacion['departamento'] = $resultado[0]->depto;
          $informacion['municipio'] = $resultado[0]->muni; */
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/proceso_administrativo/editarProceso_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarProceso($tipo) {
        $this->load->model('procesoAdministrativo/proceso');
        //$pro_id = $this->input->post("pro_id");
        $gru_id = $this->input->post("grup_id_pep");
        $this->load->model('pais/municipio');
        $municipios = $this->municipio->obtenerMunicipioPorGrupo($gru_id);
        switch ($tipo) {
            case 1:
                $pro_numero = $this->input->post("pro_numero");
                $pro_fpublicacion = $this->input->post("pro_fpublicacion");
                if ($pro_fpublicacion == "")
                    $pro_fpublicacion = null;
                $pro_faclara_dudas = $this->input->post("pro_faclara_dudas");
                if ($pro_faclara_dudas == "")
                    $pro_faclara_dudas = null;
                $pro_fexpresion_interes = $this->input->post("pro_fexpresion_interes");
                if ($pro_fexpresion_interes == "")
                    $pro_fexpresion_interes = null;
                $pro_observacion1 = $this->input->post("pro_observacion1");
                $pro_pub_ruta_archivo = $this->input->post("pro_pub_ruta_archivo");
                $pro_exp_ruta_archivo = $this->input->post("pro_exp_ruta_archivo");
                foreach ($municipios as $mun) {
                    //$this->proceso->editarPro($pro_id, $pro_exp_ruta_archivo, $pro_faclara_dudas, $pro_fexpresion_interes, $pro_fpublicacion, $pro_numero, $pro_observacion1, $pro_pub_ruta_archivo);
                    $this->proceso->editarProGrup($mun->mun_id, $pro_exp_ruta_archivo, $pro_faclara_dudas, $pro_fexpresion_interes, $pro_fpublicacion, $pro_numero, $pro_observacion1, $pro_pub_ruta_archivo);
                }
                break;
            case 2:
                $pro_finicio = $this->input->post("pro_finicio");
                if ($pro_finicio == "")
                    $pro_finicio = null;
                $pro_ffinalizacion = $this->input->post("pro_ffinalizacion");
                if ($pro_ffinalizacion == "")
                    $pro_ffinalizacion = null;
                foreach ($municipios as $mun) {
                    //$this->proceso->editarPro2($pro_id, $pro_ffinalizacion, $pro_finicio);
                    $this->proceso->editarPro2Grup($mun->mun_id, $pro_ffinalizacion, $pro_finicio);
                    ;
                }
                break;
            case 3:
                $pro_flimite_recepcion = $this->input->post("pro_flimite_recepcion");
                if ($pro_flimite_recepcion == "")
                    $pro_flimite_recepcion = null;
                $pro_fenvio_informacion = $this->input->post("pro_fenvio_informacion");
                if ($pro_fenvio_informacion == "")
                    $pro_fenvio_informacion = null;
                foreach ($municipios as $mun) {
                    //$this->proceso->editarPro3($pro_id, $pro_fenvio_informacion, $pro_flimite_recepcion);
                    $this->proceso->editarPro3Grup($mun->mun_id, $pro_fenvio_informacion, $pro_flimite_recepcion);
                }
                break;
            case 4:
                $pro_fsolicitud = $this->input->post("pro_fsolicitud");
                if ($pro_fsolicitud == "")
                    $pro_fsolicitud = null;
                $pro_frecepcion = $this->input->post("pro_frecepcion");
                if ($pro_frecepcion == "")
                    $pro_frecepcion = null;
                $pro_fcierre_negociacion = $this->input->post("pro_fcierre_negociacion");
                if ($pro_fcierre_negociacion == "")
                    $pro_fcierre_negociacion = null;
                $pro_ffirma_contrato = $this->input->post("pro_ffirma_contrato");
                if ($pro_ffirma_contrato == "")
                    $pro_ffirma_contrato = null;
                $pro_faperturatecnica = $this->input->post("pro_faperturatecnica");
                if ($pro_faperturatecnica == "")
                    $pro_faperturatecnica = null;
                $pro_faperturafinanciera = $this->input->post("pro_faperturafinanciera");
                if ($pro_faperturafinanciera == "")
                    $pro_faperturafinanciera = null;
                $pro_observacion2 = $this->input->post("pro_observacion2");
                foreach ($municipios as $mun) {
                    //$this->proceso->editarPro4($pro_id, $pro_fsolicitud, $pro_frecepcion, $pro_fcierre_negociacion, $pro_ffirma_contrato, $pro_faperturatecnica, $pro_faperturafinanciera, $pro_observacion2);
                    $this->proceso->editarPro4Grup($mun->mun_id, $pro_fsolicitud, $pro_frecepcion, $pro_fcierre_negociacion, $pro_ffirma_contrato, $pro_faperturatecnica, $pro_faperturafinanciera, $pro_observacion2);
                }
                break;
        }
    }

    public function cargarConsultoraInteres($pro_id) {
        $this->load->model('procesoAdministrativo/consultores_interes', 'conInt');
        $consultoresInt = $this->conInt->obtenerConsultoresInteres($pro_id);
        $numfilas = count($consultoresInt);

        $i = 0;
        if ($numfilas != 0) {
            foreach ($consultoresInt as $aux) {
                $rows[$i]['id'] = $aux->con_int_id;
                $rows[$i]['cell'] = array($aux->con_int_id,
                    $aux->con_int_nombre,
                    $aux->con_int_tipo
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

    public function gestionarConsultoresInteres($pro_id) {
        $con_int_id = $this->input->post("id");
        $con_int_tipo = $this->input->post("con_int_tipo");
        $con_int_nombre = $this->input->post("con_int_nombre");

        if ($this->input->post("con_int_aplica"))
            $con_int_aplica = $this->input->post("con_int_aplica");
        else
            $con_int_aplica = '0';

        if ($this->input->post("con_int_seleccionada"))
            $con_int_seleccionada = $this->input->post("con_int_seleccionada");
        else
            $con_int_seleccionada = '0';


        $this->load->model('procesoAdministrativo/consultores_interes', 'conInt');
        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->conInt->agregarConsultoresInteres($con_int_nombre, $con_int_tipo, $pro_id);
                break;
            case 'edit':
                if (strcmp($con_int_aplica, "0") != 0 | strcmp($con_int_seleccionada, "0") != 0)
                    if (strcmp($con_int_seleccionada, "0") != 0)
                        $this->conInt->editarConsultoresInteresSeleccionado($con_int_id, $con_int_seleccionada, $pro_id);
                    else
                        $this->conInt->editarConsultoresInteresAplica($con_int_id, $con_int_aplica);
                else
                    $this->conInt->editarConsultoresInteres($con_int_id, $con_int_nombre, $con_int_tipo);
                break;
            case 'del':
                $this->conInt->eliminarConsultoresInteres($con_int_id);
                break;
        }
    }

    public function evaluacionExpresionInteres() {
        $informacion['titulo'] = 'Proceso de Adquisicion y Contrataciones';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        //OBTENER DEPARTAMENTOS
        /* $this->load->model('pais/departamento');
          $informacion['departamentos'] = $this->departamento->obtenerDepartamentos(); */
        $this->load->model('etapa0-sub23/grupo');
        $informacion['grupos'] = $this->grupo->obtenerGrupos();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/proceso_administrativo/evaluacionDeclaracion_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarConsultoraInteres2($pro_id) {
        $this->load->model('procesoAdministrativo/consultores_interes', 'conInt');
        $consultoresInt = $this->conInt->obtenerConsultoresInteres($pro_id);
        $numfilas = count($consultoresInt);

        $i = 0;
        if ($numfilas != 0) {
            foreach ($consultoresInt as $aux) {
                $rows[$i]['id'] = $aux->con_int_id;
                $rows[$i]['cell'] = array($aux->con_int_id,
                    $aux->con_int_nombre,
                    $aux->con_int_tipo,
                    $aux->con_int_aplica
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

    public function seleccionConsultoras() {
        $informacion['titulo'] = 'Proceso de Adquisicion y Contrataciones';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        //OBTENER DEPARTAMENTOS
        /* $this->load->model('pais/departamento');
          $informacion['departamentos'] = $this->departamento->obtenerDepartamentos(); */
        $this->load->model('etapa0-sub23/grupo');
        $informacion['grupos'] = $this->grupo->obtenerGrupos();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/proceso_administrativo/seleccionConsultoras_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarConsultoras($pro_id) {
//PARA CREAR LA LISTA DESPLEGABLE DE LA INSTITUCION
        $this->load->model('consultor/consultora');
        $consultoras = $this->consultora->obtenerConsultoraNoRegistradas($pro_id);
        $combo = "<select name='con_int_nombre'>";
        $combo.= " <option value='0'> -- Seleccione --</option>";
        foreach ($consultoras as $aux)
            $combo.= " <option value='" . $aux->cons_id . "'>" . $aux->cons_nombre . "</option>";
        $combo.="</select>";

        echo $combo;
    }

    public function cargarConsultoraInteres3($pro_id) {
        $this->load->model('procesoAdministrativo/consultores_interes', 'conInt');
        $consultoresInt = $this->conInt->obtenerConsultoresAplican($pro_id);
        $numfilas = count($consultoresInt);

        $i = 0;
        if ($numfilas != 0) {
            foreach ($consultoresInt as $aux) {
                $rows[$i]['id'] = $aux->con_int_id;
                $rows[$i]['cell'] = array($aux->con_int_id,
                    $aux->con_int_nombre,
                    $aux->con_int_tipo,
                    $aux->con_int_seleccionada
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

    public function propuestaTecnica() {
        $informacion['titulo'] = 'Proceso de Adquisicion y Contrataciones';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
//OBTENER DEPARTAMENTOS
        $this->load->model('pais/departamento');
        $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/proceso_administrativo/propuestaTecnica_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarEvaluacionDeclaracion($gru_id) {
        $this->load->model('procesoAdministrativo/proceso');
        $this->load->model('pais/municipio');
        $rows = array();
        $numfilas = 0;
        $muni = $this->municipio->obtenerMaxMuniProceso($gru_id);
        if ($this->proceso->contarProPorMuni($muni[0]->mun_id) != 0) {
            $resultado = $this->proceso->obtenerPro($muni[0]->mun_id);
            $id = $resultado[0]->pro_id;
            $numero = $resultado[0]->pro_numero;
            if ($resultado[0]->pro_fexpresion_interes != "")
                $pro_fexpresion_interes = date('d-m-Y', strtotime($resultado[0]->pro_fexpresion_interes . '1 day'));
            else
                $pro_fexpresion_interes = $resultado[0]->pro_fexpresion_interes;
            if ($resultado[0]->pro_finicio != "")
                $pro_fininicio = date('d-m-Y', strtotime($resultado[0]->pro_finicio));
            else
                $pro_fininicio = $resultado[0]->pro_finicio;
            if ($resultado[0]->pro_ffinalizacion != "")
                $pro_ffinalizacion = date('d-m-Y', strtotime($resultado[0]->pro_ffinalizacion));
            else
                $pro_ffinalizacion = $resultado[0]->pro_ffinalizacion;
            $rows[0]['id'] = $id;
            $rows[0]['cell'] = array($id,
                $numero,
                $pro_fininicio,
                $pro_ffinalizacion,
                $pro_fexpresion_interes
            );
            $numfilas = 1;
        }


        $datos = json_encode($rows);
        $pages = floor(1 / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function cargarSeleccionConsultora($gru_id) {
        $this->load->model('procesoAdministrativo/proceso');
        $this->load->model('pais/municipio');
        $rows = array();
        $numfilas = 0;
        $muni = $this->municipio->obtenerMaxMuniProceso($gru_id);
        if ($this->proceso->contarProPorMuni($muni[0]->mun_id) != 0) {
            $resultado = $this->proceso->obtenerPro($muni[0]->mun_id);
            $id = $resultado[0]->pro_id;
            $numero = $resultado[0]->pro_numero;
            if ($resultado[0]->pro_ffinalizacion != "")
                $pro_ffinalizacion = date('d-m-Y', strtotime($resultado[0]->pro_ffinalizacion . '1 day'));
            else
                $pro_ffinalizacion = $resultado[0]->pro_ffinalizacion;
            if ($resultado[0]->pro_fenvio_informacion != "")
                $pro_fenvio_informacion = date('d-m-Y', strtotime($resultado[0]->pro_fenvio_informacion));
            else
                $pro_fenvio_informacion = $resultado[0]->pro_fenvio_informacion;
            if ($resultado[0]->pro_flimite_recepcion != "")
                $pro_flimite_recepcion = date('d-m-Y', strtotime($resultado[0]->pro_flimite_recepcion));
            else
                $pro_flimite_recepcion = $resultado[0]->pro_flimite_recepcion;
            $rows[0]['id'] = $id;
            $rows[0]['cell'] = array($id,
                $numero,
                $pro_fenvio_informacion,
                $pro_flimite_recepcion,
                $pro_ffinalizacion
            );
            $numfilas = 1;
        }
        $datos = json_encode($rows);
        $pages = floor(1 / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function cargarPropuestaTecnica($mun_id) {
        $this->load->model('procesoAdministrativo/proceso');

        $rows = array();
        $numfilas = 0;
        if ($this->proceso->contarProPorMuni($mun_id) != 0) {
            $resultado = $this->proceso->obtenerPro($mun_id);
            $id = $resultado[0]->pro_id;
            $numero = $resultado[0]->pro_numero;
            if ($resultado[0]->pro_flimite_recepcion != "")
                $pro_flimite_recepcion = date('d-m-Y', strtotime($resultado[0]->pro_flimite_recepcion . "1 day"));
            else
                $pro_flimite_recepcion = $resultado[0]->pro_flimite_recepcion;
            if ($resultado[0]->pro_fsolicitud != "")
                $pro_fsolicitud = date('d-m-Y', strtotime($resultado[0]->pro_fsolicitud));
            else
                $pro_fsolicitud = $resultado[0]->pro_fsolicitud;
            if ($resultado[0]->pro_frecepcion != "")
                $pro_frecepcion = date('d-m-Y', strtotime($resultado[0]->pro_frecepcion));
            else
                $pro_frecepcion = $resultado[0]->pro_frecepcion;
            if ($resultado[0]->pro_faperturatecnica != "")
                $pro_faperturatecnica = date('d-m-Y', strtotime($resultado[0]->pro_faperturatecnica));
            else
                $pro_faperturatecnica = $resultado[0]->pro_faperturatecnica;
            if ($resultado[0]->pro_faperturafinanciera != "")
                $pro_faperturafinanciera = date('d-m-Y', strtotime($resultado[0]->pro_faperturafinanciera));
            else
                $pro_faperturafinanciera = $resultado[0]->pro_faperturafinanciera;
            if ($resultado[0]->pro_fcierre_negociacion != "")
                $pro_fcierre_negociacion = date('d-m-Y', strtotime($resultado[0]->pro_fcierre_negociacion));
            else
                $pro_fcierre_negociacion = $resultado[0]->pro_fcierre_negociacion;
            if ($resultado[0]->pro_ffirma_contrato != "")
                $pro_ffirma_contrato = date('d-m-Y', strtotime($resultado[0]->pro_ffirma_contrato));
            else
                $pro_ffirma_contrato = $resultado[0]->pro_ffirma_contrato;
            $rows[0]['id'] = $id;
            $rows[0]['cell'] = array($id,
                $numero,
                $pro_fsolicitud,
                $pro_frecepcion,
                $pro_faperturatecnica,
                $pro_faperturafinanciera,
                $pro_fcierre_negociacion,
                $pro_ffirma_contrato,
                $resultado[0]->pro_observacion2,
                $pro_flimite_recepcion
            );
            $numfilas = 1;
        }
        $datos = json_encode($rows);
        $pages = floor(1 / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function cargarUltimaFechaProTecFin($mun_id) {
        $this->load->model('procesoAdministrativo/proceso');
        $resultado = $this->proceso->obtenerPro($mun_id);
        $id = $resultado[0]->pro_id;
        if ($resultado[0]->pro_ffirma_contrato != "")
            $pro_ffirma_contrato = date('d-m-Y', strtotime($resultado[0]->pro_ffirma_contrato . "1 Day"));
        else
            $pro_ffirma_contrato = $resultado[0]->pro_ffirma_contrato;
        $rows[0]['id'] = $id;
        $rows[0]['cell'] = array($id,
            $pro_ffirma_contrato
        );
        $numfilas = 1;

        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function recepcionAprobacionProductos() {
        $informacion['titulo'] = 'Recepción y Aprobación de Productos';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
//OBTENER DEPARTAMENTOS
        $this->load->model('pais/departamento');
        $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();
        $this->load->model('procesoAdministrativo/proceso_etapa', 'proEta');
        $this->load->model('procesoAdministrativo/pestania_proceso', 'pesPro');
        $this->load->model('procesoAdministrativo/nombre_fecha_aprobacion', 'fechaAproba');
        $etapa = $this->pesPro->obtenerPestaniaProcesos();
        $nombresFecha = $this->fechaAproba->obtenerNombresFechas();
        $informacion['etapas'] = $etapa;
        $informacion['fechas'] = $nombresFecha;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/proceso_administrativo/recepcion_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarAprobacionProductos($mun_id) {
        $this->load->model('procesoAdministrativo/proceso_etapa', 'proEta');
        $this->load->model('procesoAdministrativo/pestania_proceso', 'pesPro');
        $this->load->model('procesoAdministrativo/proceso');
        $rows = array();
        $numfilas = 0;
        if ($this->proceso->contarProPorMuni($mun_id) != 0) {
            $pestanias = $this->pesPro->obtenerPestaniaProcesos();
            $i = 0;
            foreach ($pestanias as $pestania) {
                $valores = $this->proEta->obtenerValoresEtapas($mun_id, $pestania->pes_pro_id);
                $fechas = array();
                $j = 0;
                foreach ($valores as $valor) {
                    $pro_eta_id = $valor->pro_eta_id;
                    $pro_eta_observacion = $valor->pro_eta_observacion;
                    $valorFecha = $valor->nomfec_proeta_valor;
                    if ($valorFecha != "")
                        $valorFecha = date('d-m-Y', strtotime($valorFecha));
                    $fechas[$valor->nom_fec_apr_id] = $valorFecha;
                    $j++;
                }
                $rows[$i]['id'] = $pro_eta_id;
                $rows[$i]['cell'] = array($pro_eta_id,
                    $fechas,
                    $pro_eta_observacion);
                $i++;
            }
            $numfilas = count($rows);
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

    public function guardarAprobacionProductos($etapa) {
        $this->load->model('procesoAdministrativo/proceso_etapa', 'proEta');
        $this->load->model('procesoAdministrativo/nombrefecha_procesoetapa', 'nombreFecha');
        $this->load->model('procesoAdministrativo/nombre_fecha_aprobacion', 'fechas');

        $pro_eta_id = $this->input->post("pro_eta_id_" . $etapa);
        $pro_eta_observacion = $this->input->post("pro_eta_observacion_" . $etapa);
        $fechasO = $this->fechas->obtenerNombresFechas();
        foreach ($fechasO as $fecha) {
            $fechaGuardar = $this->input->post("eta" . $etapa . "_fecha" . $fecha->nom_fec_apr_id);
            if ($fechaGuardar == "")
                $fechaGuardar = null;
            $this->nombreFecha->actualizarFechaProceso($fechaGuardar, $pro_eta_id, $fecha->nom_fec_apr_id);
        }
        $this->proEta->actualizarProcesoEtapa($pro_eta_observacion, $pro_eta_id);
    }

    function subirArchivo2($tabla, $campo_id, $campo, $ext) {
        echo $this->librerias->subirDocumento2($tabla, $campo_id, $_FILES, $campo, $ext);
    }

}

?>
