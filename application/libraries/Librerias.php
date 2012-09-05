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
    function __construct()
	{
		$this->ci =& get_instance();

	
	}
    public function creaMenu($username) {

        $this->ci->load->model('rol_opcion_sistema', 'ros');
        $this->ci->load->model('tank_auth/users', 'usuarios');
        $rolConsulta = $this->ci->usuarios->obtenerRol($username);
        $menu='';
        foreach ($rolConsulta as $aux)
            $rol = $aux->rol_id;
        
        $opcionesN1=  $this->ci->ros->obtenerOpcionN1($rol);
        foreach ($opcionesN1->result() as $rolPadre){
            $menu.='<li class="top"><a class="top_link" href="';
            $opcionesN2=  $this->ci->ros->obtenerOpcionesOtrosNiveles($rol,$rolPadre->opc_sis_id);
            if($opcionesN2->num_rows()!=0){
                $menu.=$rolPadre->opc_sis_url.'"><span class="down">'.$rolPadre->opc_sis_nombre.'</span></a>';
                    $menu.='<ul class="sub">';
                    foreach ($opcionesN2->result() as $opcN2){
                       $menu.='<li><a href="'.$opcN2->opc_sis_url.'"';
                       $opcionesN3=$this->ci->ros->obtenerOpcionesOtrosNiveles($rol,$opcN2->opc_sis_id);
                       if($opcionesN3->num_rows()!=0){
                           $menu.=' class="fly">'.$opcN2->opc_sis_nombre.'</a>';
                           $menu.='<ul>';
                           foreach ($opcionesN3->result() as $opcN3){
                               $menu.='<li><a href="'.$opcN3->opc_sis_url.'"';
                               $opcionesN4=$this->ci->ros->obtenerOpcionesOtrosNiveles($rol,$opcN3->opc_sis_id);
                               if($opcionesN4->num_rows()!=0){
                                    $menu.=' class="fly">'.$opcN3->opc_sis_nombre.'</a>';
                                    $menu.='<ul>';
                                    foreach ($opcionesN4->result() as $opcN4)
                                        $menu.='<li><a href="'.$opcN4->opc_sis_url.'">'.$opcN4->opc_sis_nombre.'</a></li>';
                                    $menu.='</ul>';
                               }else
                                   $menu.='>'.$opcN3->opc_sis_nombre.'</a></li>';
                           }
                           $menu.='</ul>';
                       }else
                           $menu.='>'.$opcN2->opc_sis_nombre.'</a></li>';                        
                    }
                    $menu.='</ul></li>';
            }else
                $menu.=$rolPadre->opc_sis_url.'"><span>'.$rolPadre->opc_sis_nombre.'</span></a></li>';   
        }
        return $menu;
    }

}

?>
