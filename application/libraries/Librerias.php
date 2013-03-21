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
        $this->ci->load->model('admin/rol_opcion_sistema', 'ros');
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
    
     public function subirDocumento2($tabla, $campo_id, $archivo, $campo,$ext) {
        $partes = explode(".", $archivo['userfile']['name']);
        $extension = end($partes);
        //OBTERNER LA EXTENSIÒN DEL ARCHIVO SI HAY UNO YA GUARDADO EN LA BASE
        $this->ci->load->model('ayuda_archivo', 'ayuArc');
        $nombreArchivoBase = $this->ci->ayuArc->obtenerRutaArchivo2($campo, $campo_id, $tabla,$ext);
        $extArchivoBase = end(explode(".", $nombreArchivoBase[0]['ruta_archivo']));
        if (strcasecmp($extension, $extArchivoBase) && $extArchivoBase != '0')
            unlink($nombreArchivoBase[0]['ruta_archivo']);
        $directorio = 'documentos/' . $tabla . '/';
        $archivoSubir = $directorio . ($tabla . $campo_id.substr($ext,3,4)) . '.' . $extension;
        if ($archivo['userfile']['size'] < 1050000) {
            if (move_uploaded_file($archivo['userfile']['tmp_name'], $archivoSubir)) {
                $this->ci->ayuArc->actualizarArchivo2($campo, $campo_id, $tabla, $archivoSubir,$ext);
                echo $archivoSubir;
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }
    }
    
        function parse_input($tipo, $campo){
        switch ($tipo){ 
        	case 'phone':
                $d = explode('-',$campo);
                return $d[0] . $d[1];
        	break;
            
            case 'date':
            //d/m/Y a Y-m-d
                if(!$campo) return null;
                $t = explode('/',$campo);
                return date('Y-m-d',mktime(0,0,0,$t[1],$t[0],$t[2]));
            break;
        
        	default :
        }
    }
    
    function parse_output($tipo,$valor){
        if(!$valor) return '';
        switch ($tipo){ 
        	case 'date':
            //Y-m-d a d/m/Y
                $t = explode('-',$valor);
                return date('d/m/Y',mktime(0,0,0,$t[1],$t[2],$t[0]));
        	break;
        
        	case 'phone':
                $t = explode('',$valor,4);
                return $t[0] . '-' . $t[1];
        	break;
        
        	case 'money':
        	break;
            
            case 'bool':
                return ($valor == 't');
            break;
        
        	default :
                    return $valor;
        }
    }
    
    function json_out($result, $index,$campos='all',$rows=10){
        
        //$consultoresInt = $this->conInt->obtenerConsultoresInteres($pro_id);
        $numfilas = $result->num_rows();

        $i = 0;
        if ($numfilas != 0) {
            foreach ($result->result() as $aux) {
                $row = array();
                foreach ($aux as $r => $v){
                    //echo "r-$r;v-$v<br>\n";
                    if($campos != 'all' && in_array($r,$campos)){
                        array_push($row,$v);
                    }else if($campos == 'all'){
                        array_push($row,$v);
                    }
                }
                $data[$i]['id'] = $aux->$index;
                $data[$i]['cell'] = $row;
                $i++;
            }
            array_multisort($data, SORT_ASC);
        } else {
            $data = array();
        }

        $datos = json_encode($data);
        $pages = floor($numfilas / 10) + 1;
        
        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        return $jsonresponse;
    }
    
    function setNewId($tabla,$campo,$data){
        $this->ci->db->insert($tabla,$data);
        echo $this->ci->db->last_query();
        $lastId = $this->ci->db->query("SELECT $campo FROM $tabla ORDER BY $campo DESC LIMIT 1;")->row()->$campo;
        return $lastId;
    }

}

?>
