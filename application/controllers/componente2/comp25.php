<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas del 
 * componente 2.5: gestión de riesgos
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp25 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $informacion['titulo'] = 'Fortalecimiento de Gobiernos Locales';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp25/comp25_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function elaboracionProyecto() {
        $informacion['titulo'] = 'Componente 2.5 Registro de datos del componente';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        //OBTENER DEPARTAMENTOS
        $this->load->model('pais/departamento');
        $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp25/fase1/elaboracionProyecto_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarParticipantesET($campo, $id_campo) {
        $this->load->model('participante');
        $participantes = $this->participante->obtenerParticipantes($campo, $id_campo);
        $numfilas = count($participantes);

        $i = 0;
        foreach ($participantes as $aux) {
            $rows[$i]['id'] = $aux->par_id;
            $rows[$i]['cell'] = array($aux->par_id,
                $aux->par_nombre,
                $aux->par_apellido,
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

    public function cargarElaboracionProyecto($mun_id) {
        $this->load->model('pais/municipio');
        $this->load->model('fase1-sub25/elaboracion_proyecto', 'elaPro');
        $resultado = $this->municipio->obtenerIDVariable('ela_pro_id', $mun_id);

        if ($resultado[0]->ela_pro_id == 0) {
            $this->elaPro->agregarElaboracionProyecto($mun_id);
            $elaboracion = $this->elaPro->idPorMunicipio($mun_id);
            $this->municipio->actualizarIndices('ela_pro_id', $elaboracion[0]->ela_pro_id, $mun_id);
        }
        $elaboracion = $this->elaPro->idPorMunicipio($mun_id);
        if ($elaboracion[0]->ela_pro_fentrega_idem != "")
            $ela_pro_fentrega_idem = date('d-m-Y', strtotime($elaboracion[0]->ela_pro_fentrega_idem));
        else
            $ela_pro_fentrega_idem = $elaboracion[0]->ela_pro_fentrega_idem;

        if ($elaboracion[0]->ela_pro_fentrega_uep != "")
            $ela_pro_fentrega_uep = date('d-m-Y', strtotime($elaboracion[0]->ela_pro_fentrega_uep));
        else
            $ela_pro_fentrega_uep = $elaboracion[0]->ela_pro_fentrega_uep;

        if ($elaboracion[0]->ela_pro_fconformacion != "")
            $ela_pro_fconformacion = date('d-m-Y', strtotime($elaboracion[0]->ela_pro_fconformacion));
        else
            $ela_pro_fconformacion = $elaboracion[0]->ela_pro_fconformacion;

        $rows[0]['id'] = $elaboracion[0]->ela_pro_id;
        $rows[0]['cell'] = array($elaboracion[0]->ela_pro_id,
            $elaboracion[0]->ela_pro_carta_exp,
            $ela_pro_fentrega_idem,
            $ela_pro_fentrega_uep,
            $elaboracion[0]->ela_pro_carta_confirmacion,
            $ela_pro_fconformacion,
            $elaboracion[0]->ela_pro_observacion
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

    public function guardarElaboracionProyecto() {
        $this->load->model('fase1-sub25/elaboracion_proyecto', 'elaPro');

        $ela_pro_id = $this->input->post("ela_pro_id");
        $ela_pro_carta_exp = $this->input->post("ela_pro_carta_exp");
        if ($ela_pro_carta_exp == '0')
            $ela_pro_carta_exp = null;
        $ela_pro_fentrega_idem = $this->input->post("ela_pro_fentrega_idem");
        if ($ela_pro_fentrega_idem == "")
            $ela_pro_fentrega_idem = null;
        $ela_pro_fentrega_uep = $this->input->post("ela_pro_fentrega_uep");
        if ($ela_pro_fentrega_uep == "")
            $ela_pro_fentrega_uep = null;
        $ela_pro_carta_confirmacion = $this->input->post("ela_pro_carta_confirmacion");
        if ($ela_pro_carta_confirmacion == "")
            $ela_pro_carta_confirmacion = null;
        $ela_pro_fconformacion = $this->input->post("ela_pro_fconformacion");
        if ($ela_pro_fconformacion == "")
            $ela_pro_fconformacion = null;
        $ela_pro_observacion = $this->input->post("ela_pro_observacion");

        $this->elaPro->actualizarAcuMun($ela_pro_id, $ela_pro_carta_exp, $ela_pro_fentrega_idem, $ela_pro_fentrega_uep, $ela_pro_carta_confirmacion, $ela_pro_fconformacion, $ela_pro_observacion);
    }

    public function recibidoMunicipalidad($ela_pro_id) {
        $this->load->model('fase1-sub25/recibido_municipalidad', 'recMun');
        $recibidos = $this->recMun->obtenerRecibidoMunicipalidades($ela_pro_id);
        $numfilas = count($recibidos);

        if ($numfilas != 0) {
            $i = 0;
            foreach ($recibidos as $aux) {
                $rows[$i]['id'] = $aux->rec_mun_id;
                $rows[$i]['cell'] = array($aux->rec_mun_id,
                    $aux->rec_mun_correlativo,
                    date('d-m-Y', strtotime($aux->rec_mun_frecibido)),
                    $aux->rec_mun_observacion
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

    public function guardarRecibidoMunicipalidad($ela_pro_id) {
        $this->load->model('fase1-sub25/recibido_municipalidad', 'recMun');
        $rec_mun_id = $this->input->post("id");
        $rec_mun_correlativo = $this->input->post("rec_mun_correlativo");
        $rec_mun_frecibido = $this->input->post("rec_mun_frecibido");
        if ($rec_mun_frecibido == "")
            $rec_mun_frecibido = null;
        $rec_mun_observacion = $this->input->post("rec_mun_observacion");
        $operacion = $this->input->post("oper");
        switch ($operacion){
            case 'add':
                $this->recMun->agregarRecibidoMunicipalidad($rec_mun_correlativo, $rec_mun_frecibido, $rec_mun_observacion, $ela_pro_id);
                break;
            case 'edit':
                $this->recMun->actualizarRecibidoMunicipalidad($rec_mun_id,$rec_mun_correlativo, $rec_mun_frecibido, $rec_mun_observacion); 
                break;
            case 'del':
                $this->recMun-> eliminarRecibidoMunicipalidad($rec_mun_id);
                break;
        }
        
    }

}

?>
