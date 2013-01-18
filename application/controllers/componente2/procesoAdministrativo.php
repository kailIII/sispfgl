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
        $this->load->model('pais/departamento');
        $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();
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

        $mun_id = $this->input->post("selMun");
        $this->load->model('procesoAdministrativo/proceso');
        $resultado = $this->proceso->contarProPorMuni($mun_id);
        if ($resultado == '0')
            $this->proceso->agregarPro($mun_id);
        $resultado = $this->proceso->obtenerPro($mun_id);
        $informacion['pro_id'] = $resultado[0]->pro_id;
        $informacion['pro_numero'] = $resultado[0]->pro_numero;
        $informacion['pro_fpublicacion'] = $resultado[0]->pro_fpublicacion;
        $informacion['pro_faclara_dudas'] = $resultado[0]->pro_faclara_dudas;
        $informacion['pro_fexpresion_interes'] = $resultado[0]->pro_fexpresion_interes;
        $informacion['pro_observacion1'] = $resultado[0]->pro_observacion1;
        $informacion['pro_pub_ruta_archivo'] = $resultado[0]->pro_pub_ruta_archivo;
        $informacion['pro_exp_ruta_archivo'] = $resultado[0]->pro_exp_ruta_archivo;
        $this->load->model('pais/municipio');
        $resultado=  $this->municipio->obtenerNomMunDep($mun_id);
        $informacion['departamento'] = $resultado[0]->depto;
        $informacion['municipio'] = $resultado[0]->muni;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/proceso_administrativo/editarProceso_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function guardarProceso($tipo) {
        $this->load->model('procesoAdministrativo/proceso');
        $pro_id = $this->input->post("pro_id");
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

                $this->proceso->editarPro($pro_id, $pro_exp_ruta_archivo, $pro_faclara_dudas, $pro_fexpresion_interes, $pro_fpublicacion, $pro_numero, $pro_observacion1, $pro_pub_ruta_archivo);
                redirect('componente2/procesoAdministrativo/adquisicionContrataciones');
                break;

            case 2:
                $pro_finicio = $this->input->post("pro_finicio");
                if ($pro_finicio == "")
                    $pro_finicio = null;
                $pro_ffinalizacion = $this->input->post("pro_ffinalizacion");
                if ($pro_ffinalizacion == "")
                    $pro_ffinalizacion = null;
                $this->proceso->editarPro2($pro_id, $pro_ffinalizacion, $pro_finicio);
                redirect('componente2/procesoAdministrativo/propuestaTecnica');
                break;

            case 3:
                $pro_flimite_recepcion = $this->input->post("pro_flimite_recepcion");
                if ($pro_flimite_recepcion == "")
                    $pro_flimite_recepcion = null;
                $pro_fenvio_informacion = $this->input->post("pro_fenvio_informacion");
                if ($pro_fenvio_informacion == "")
                    $pro_fenvio_informacion = null;
                $this->proceso->editarPro3($pro_id, $pro_fenvio_informacion, $pro_flimite_recepcion);
                redirect('componente2/procesoAdministrativo/seleccionConsultoras');
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

        $con_int_aplica = $this->input->post("con_int_aplica");
        $con_int_seleccionada = $this->input->post("con_int_seleccionada");

        $this->load->model('procesoAdministrativo/consultores_interes', 'conInt');
        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->conInt->agregarConsultoresInteres($con_int_nombre, $con_int_tipo, $pro_id);
                break;
            case 'edit':
                if ($con_int_aplica == 0)
                    if ($con_int_seleccionada == 0)
                        $this->conInt->editarConsultoresInteresSeleccionado($con_int_id, $con_int_seleccionada);
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
        $this->load->model('pais/departamento');
        $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();
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
        $this->load->model('pais/departamento');
        $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/proceso_administrativo/seleccionConsultoras_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function editarSeleccionConsultora() {
        $informacion['titulo'] = 'Proceso de Adquisicion y Contrataciones';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $mun_id = $this->input->post("selMun");
        $this->load->model('procesoAdministrativo/proceso');
        $resultado = $this->proceso->obtenerPro($mun_id);
        $informacion['pro_id'] = $resultado[0]->pro_id;
        $informacion['pro_numero'] = $resultado[0]->pro_numero;
        $informacion['pro_fenvio_informacion'] = $resultado[0]->pro_fenvio_informacion;
        $informacion['pro_flimite_recepcion'] = $resultado[0]->pro_flimite_recepcion;
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp23/proceso_administrativo/editarSeleccionConsultora_view');
        $this->load->view('plantilla/footer', $informacion);
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

    public function cargarEvaluacionDeclaracion($mun_id) {
        $this->load->model('procesoAdministrativo/proceso');
        if($this->proceso->contarProPorMuni($mun_id)!=0) {
            $resultado = $this->proceso->obtenerPro($mun_id);
            $id=$resultado[0]->pro_id;
            $numero=$resultado[0]->pro_numero;
            if ($resultado[0]->pro_finicio != "")
                $pro_fininicio = date('d/m/y', strtotime($resultado[0]->pro_finicio));
            else
                $pro_fininicio = $resultado[0]->pro_finicio;
            if ($resultado[0]->pro_ffinalizacion != "")
                $pro_ffinalizacion = date('d/m/y', strtotime($resultado[0]->pro_ffinalizacion));
            else
                $pro_ffinalizacion = $resultado[0]->pro_ffinalizacion;
        }else{
            $id=0;
            $numero=null;
            $pro_fininicio = "";
            $pro_ffinalizacion = "";
        }
        $rows[0]['id'] = $id;
        $rows[0]['cell'] = array($id,
            $numero,
            $pro_fininicio,
            $pro_ffinalizacion
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

     public function cargarSeleccionConsultora($mun_id) {
        $this->load->model('procesoAdministrativo/proceso');
        if($this->proceso->contarProPorMuni($mun_id)!=0) {
            $resultado = $this->proceso->obtenerPro($mun_id);
            $id=$resultado[0]->pro_id;
            $numero=$resultado[0]->pro_numero;
            if ($resultado[0]->pro_fenvio_informacion != "")
                $pro_fenvio_informacion = date('d/m/y', strtotime($resultado[0]->pro_fenvio_informacion));
            else
                $pro_fenvio_informacion = $resultado[0]->pro_fenvio_informacion;
            if ($resultado[0]->pro_ffinalizacion != "")
                $pro_flimite_recepcion = date('d/m/y', strtotime($resultado[0]->pro_flimite_recepcion));
            else
                $pro_flimite_recepcion = $resultado[0]->pro_flimite_recepcion;
        }else{
            $id=0;
            $numero=null;
            $pro_fenvio_informacion = "";
            $pro_flimite_recepcion = "";
        }
        $rows[0]['id'] = $id;
        $rows[0]['cell'] = array($id,
            $numero,
            $pro_fenvio_informacion,
            $pro_flimite_recepcion
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
    
    public function subirArchivo2($tabla, $campo_id, $campo, $ext) {
        echo $this->librerias->subirDocumento2($tabla, $campo_id, $_FILES, $campo, $ext);
    }

}

?>
