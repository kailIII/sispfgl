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

    function __construct() {
        $this->ci = & get_instance();
    }

    public function creaMenu($username) {
        $this->ci->load->model('rol_opcion_sistema', 'ros');
        $this->ci->load->model('tank_auth/users', 'usuarios');
        $rolConsulta = $this->ci->usuarios->obtenerRol($username);
        $menu = '';
        $rol = $rolConsulta[0]->rol_id;
        $opcionesN1 = $this->ci->ros->obtenerOpcionN1($rol);
        foreach ($opcionesN1->result() as $rolPadre) {
            $menu.='<li><a href="' . base_url($rolPadre->opc_sis_url) . '">' . $rolPadre->opc_sis_nombre . '</a>';
            $opcionesN2 = $this->ci->ros->obtenerOpcionesOtrosNiveles($rol, $rolPadre->opc_sis_id);
            if ($opcionesN2->num_rows() != 0) {
                $menu.='<ul>';
                foreach ($opcionesN2->result() as $opcN2) {
                    $menu.='<li><a href="' . base_url($opcN2->opc_sis_url) . '">' . $opcN2->opc_sis_nombre . '</a>';
                    $opcionesN3 = $this->ci->ros->obtenerOpcionesOtrosNiveles($rol, $opcN2->opc_sis_id);
                    if ($opcionesN3->num_rows() != 0) {
                        $menu.='<ul>';
                        foreach ($opcionesN3->result() as $opcN3)
                            $menu.='<li><a href="' . base_url($opcN3->opc_sis_url) . '">' . $opcN3->opc_sis_nombre . '</a></li>';
                        $menu.='</ul></li>';
                    }else 
                        $menu.='</li>';//FIN NIVEL 3
                }
                $menu.='</ul></li>';
            }else
              $menu.='</li>';  ////FIN NIVEL 2
        }
        return $menu;
    }

    public function subirDocumento($tabla, $campo_id, $archivo, $campo) {
        $partes = explode(".", $archivo['userfile']['name']);
        $extension = end($partes);
        //OBTERNER LA EXTENSIÒN DEL ARCHIVO SI HAY UNO YA GUARDADO EN LA BASE
        $this->ci->load->model('ayuda_archivo', 'ayuArc');
        $nombreArchivoBase = $this->ci->ayuArc->obtenerRutaArchivo($campo, $campo_id, $tabla);
        $extArchivoBase = end(explode(".", $nombreArchivoBase[0]['ruta_archivo']));
        if (strcasecmp($extension, $extArchivoBase) && $extArchivoBase != '0')
            unlink($nombreArchivoBase[0]['ruta_archivo']);
        $directorio = 'documentos/' . $tabla . '/';
        $archivoSubir = $directorio . ($tabla . $campo_id) . '.' . $extension;
        if ($archivo['userfile']['size'] < 1050000) {
            if (move_uploaded_file($archivo['userfile']['tmp_name'], $archivoSubir)) {
                $this->ci->ayuArc->actualizarArchivo($campo, $campo_id, $tabla, $archivoSubir);
                echo $archivoSubir;
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }
    }

}

?>
