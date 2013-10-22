<?php

/**
 * Contendra todos los metodos que se utilizaràn para el manejo del sistema
 * como los roles, las opciones, usuarios, entre otros. 
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administracion extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $informacion['titulo'] = 'Administración del SISPFGL';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('admin/admin_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function rolesSistema() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $informacion['titulo'] = 'Administración de roles del SISPFGL';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('admin/roles_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function obtenerRol() {
        $this->load->model('admin/rol');
        $roles = $this->rol->obtenerRoles();
        $numfilas = count($roles);

        $i = 0;
        $rows = array();
        foreach ($roles as $aux) {
            $rows[$i]['id'] = $aux->rol_id;
            $rows[$i]['cell'] = array($aux->rol_id,
                $aux->rol_nombre,
                $aux->rol_descripcion,
                $aux->rol_codigo
            );
            $i++;
        }

        array_multisort($rows, SORT_ASC);


        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function gestionRoles() {
        /* VARIABLES POST */
        $rol_id = $this->input->post("id");
        $rol_nombre = $this->input->post("rol_nombre");
        $rol_descripcion = $this->input->post("rol_descripcion");
        $rol_codigo = $this->input->post("rol_codigo");
        $operacion = $this->input->post('oper');
        $this->load->model('admin/rol');
        switch ($operacion) {
            case 'add':
                $this->rol->insertarRol($rol_nombre, $rol_descripcion,$rol_codigo);
                $response->responseText = "Rol Agregado con Èxito";
                break;
            case 'edit':
                $this->rol->editarRol($rol_nombre, $rol_descripcion, $rol_id);
                $response->responseText = "Rol Editado con Èxito";
                break;
            case 'del':
                $result = $this->rol->eliminarRol($rol_id);
                if ($result == 1) {
                    echo json_encode(array("success" => true, "message" => "Se borro"));
                } else {
                    echo json_encode(array("success" => false, "message" => "No borro"));
                }

                break;
        }
    }

    public function asignarRolesOpciones() {
        $informacion['titulo'] = 'Asignar Roles a Opciones';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('admin/asignar_rol_opcion_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function consultarOpciones() {
        $this->load->model('admin/opcion_sistema', 'opcSis');
        $opciones = $this->opcSis->obtenerOpciones();
        $numfilas = count($opciones);
        $i = 0;
        foreach ($opciones as $opc) {
            $rows[$i]['id'] = $opc->opc_sis_id;
            $rows[$i]['cell'] = array($opc->opc_sis_id,
                $opc->opc_sis_nombre,
                $opc->opc_opc_sis_id
            );
            $i++;
        }
        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 15) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function consultarOpcionesAsignadasRol($rol) {
        $this->load->model('admin/rol_opcion_sistema', 'rolOpcSis');
        $opciones = $this->rolOpcSis->obtenerOpcionesRoles($rol)->result();
        $numfilas = count($opciones);
        $i = 0;
        foreach ($opciones as $opc) {
            $rows[$i]['id'] = $opc->opc_sis_id;
            $rows[$i]['cell'] = array($opc->opc_sis_id,
                $opc->opc_sis_nombre,
                $opc->opc_opc_sis_id
            );
            $i++;
        }
        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 15) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function consultarOpcionesSinAsignar($rol) {
        $this->load->model('admin/rol_opcion_sistema', 'rolOpcSis');
        $opciones = $this->rolOpcSis->obtenerOpcionesNoAsignadas($rol);
        $numfilas = count($opciones);
        $i = 0;
        foreach ($opciones as $opc) {
            $rows[$i]['id'] = $opc->opc_sis_id;
            $rows[$i]['cell'] = array($opc->opc_sis_id,
                $opc->opc_sis_nombre,
                $opc->opc_opc_sis_id
            );
            $i++;
        }
        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / 15) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function insertOpcSeleccRol($rol_id, $opc_id) {
        $this->load->model('admin/rol_opcion_sistema', 'rolOpcSis');
        $this->rolOpcSis->insertarRolOpcion($rol_id, $opc_id);
        return $this->consultarOpcionesAsignadasRol($rol_id);
    }

    public function deleteOpcSeleccRol($rol_id, $opc_id) {
        $this->load->model('admin/rol_opcion_sistema', 'rolOpcSis');
        $this->rolOpcSis->eliminarRolOpcion($rol_id, $opc_id);

        return $this->consultarOpcionesAsignadasRol($rol_id);
    }

    public function opcionesSistema() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $informacion['titulo'] = 'Gestionar las Opciones del Sistema';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('admin/opciones_sistema_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function consultarOpcionesCompleta() {
        $this->load->model('admin/opcion_sistema', 'opcSis');
        $opciones = $this->opcSis->obtenerOpciones();
        $numfilas = count($opciones);
        $i = 0;
        foreach ($opciones as $opc) {
            $rows[$i]['id'] = $opc->opc_sis_id;
            $rows[$i]['cell'] = array($opc->opc_sis_id,
                $opc->opc_sis_nombre,
                $opc->opc_sis_url,
                $opc->opc_opc_sis_id,
                $opc->opc_sis_orden
            );
            $i++;
        }
        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
        }

        $datos = json_encode($rows);
        $pages = floor($numfilas / $this->input->get("rows")) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function gestionarOpcionesSistema() {
        $opc_sis_nombre = $this->input->post('nombre');
        $opc_sis_url = $this->input->post('enlace');
        $opc_sis_id = $this->input->post('id');
        $opc_opc_sis_id = $this->input->post('opcpadre');
        if ($opc_opc_sis_id == 0)
            $opc_opc_sis_id = null;
        $opc_sis_orden = $this->input->post('orden');
        if ($opc_sis_orden == 0)
            $opc_sis_orden = null;
        $operacion = $this->input->post('oper');

        $this->load->model('admin/opcion_sistema', 'opcSis');
        switch ($operacion) {
            case 'add':
                $this->opcSis->insertarOpcSis($opc_sis_nombre, $opc_sis_url, $opc_opc_sis_id, $opc_sis_orden);
                break;
            case 'edit':
                $this->opcSis->editarOpcSis($opc_sis_nombre, $opc_sis_url, $opc_opc_sis_id, $opc_sis_orden, $opc_sis_id);
                break;
            case 'del':
                $this->opcSis->eliminarOpcSis($opc_sis_id);
                break;
        }
    }

}

?>
