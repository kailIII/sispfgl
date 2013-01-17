<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas relacionadas
  a la gestión de los proyectos PEP
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProyectoPep extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $informacion['titulo'] = 'Proyectos para la Planeación Estratégica Participativa (PEPS)';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());

        /* OBTENER REGIONES DEL PAIS */
        $this->load->model('pais/region');
        $informacion['regiones'] = $this->region->obtenerRegiones();
        /* REGIONES */

        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('proyectopep/proyecto_pep_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarProyectosPorMunicipio() {
        $this->load->model('proyectoPep/proyecto_pep', 'propep');
        $mun_id = $this->input->get("mun_id");
        $proyectosPep = $this->propep->obtenerProyectoPepPorMun($mun_id);
        $numfilas = count($proyectosPep);

        $i = 0;
        if ($numfilas != 0) {
            foreach ($proyectosPep as $aux) {
                $rows[$i]['id'] = $aux->pro_pep_id;
                $rows[$i]['cell'] = array($aux->pro_pep_id,
                    $aux->pro_pep_nombre/* ,
                          'NO', 'NO', 'NO', 'NO' */
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ');
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

    public function cargarDepartamentos() {
        $reg_id = $this->input->get("reg_id");
        $this->load->model('pais/departamento', 'depto');
        $departamentos = $this->depto->obtenerDepartamentosPorRegion($reg_id);
        $numfilas = count($departamentos);

        $i = 0;
        foreach ($departamentos as $aux) {
            $rows[$i]['id'] = $aux->dep_id;
            $rows[$i]['cell'] = array($aux->dep_id,
                $aux->dep_nombre
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ');
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

    public function gestionProyectoPep() {
        /* VARIABLES POST */
        $id = $this->input->post("id");
        $nombre = $this->input->post("pro_pep_nombre");
        $operacion = $this->input->post('oper');

        /* VARIABLE GET */
        $mun_id = $this->input->get("mun_id");

        $this->load->model('proyectoPep/proyecto_pep', 'propep');
        switch ($operacion) {
            case 'add':
                $this->propep->agregarProyecto($mun_id, $nombre);
                break;
            case 'edit':
                $this->propep->editarProyecto($id, $nombre);
                break;
        }
    }

    public function cargarMunicipios() {
        $dep_id = $this->input->get("dep_id");
        $this->load->model('pais/municipio', 'mun');
        $municipios = $this->mun->obtenerMunicipioPorDepartamento($dep_id);

        $numfilas = count($municipios);

        $i = 0;
        foreach ($municipios as $aux) {
            $rows[$i]['id'] = $aux->mun_id;
            $rows[$i]['cell'] = array($aux->mun_id,
                $aux->mun_nombre
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ');
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

    public function cuantosPepMuni($mun_id) {
        $this->load->model('proyectoPep/proyecto_pep', 'proPep');
        $totales = $this->proPep->cuantosPep($mun_id);

        $rows[0]['id'] = 1;
        $rows[0]['cell'] = array($totales);

        $datos = json_encode($rows);
        $pages = floor(1 / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . 1 . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

}

?>
