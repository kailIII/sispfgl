<?php

/**
 * Esta clase servira para definir los metodos propios utilizados
 * para el desarrollo del SIS-PFGL
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Librerias {
    
    function creaMenu($username){
        
      $this->load->model('tank_auth/users','usuarios');
      $this->load->model('rol_opcion_sistema','ros');
      $rolConsulta=  $this->usuarios->obtenerRol($username);
      foreach ($rolConsulta as $aux){
          $opcionesSistemas=  $this->ros->obtenerOpcionesRoles($aux->rol_id);
          
      }
      
    }
}

?>
