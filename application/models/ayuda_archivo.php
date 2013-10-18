<?php
/*
 * Esta clase de utilizara para generalizar el manejo de la subida
 * de los archivos en todas las tablas que sea necesario.
 *
 * @author Ing. Karen Peñate
 */

class Ayuda_archivo extends CI_Model {
    
   public function obtenerRutaArchivo($campo,$campo_id,$tabla) {
        $query = "SELECT COALESCE(".  substr($campo,0,-2)."ruta_archivo,'/.0') ruta_archivo FROM ".
                $tabla." WHERE ".$campo."=".$campo_id;
        $consulta = $this->db->query($query);
        return $consulta->result_array();
   }
   
   public function actualizarArchivo($campo,$campo_id,$tabla,$ruta_archivo) {
        $datos = array(
            substr($campo,0,-2).'ruta_archivo' => $ruta_archivo
        );
        $this->db->where($campo, $campo_id);
        $this->db->update($tabla, $datos);
    }
    
     public function obtenerRutaArchivo2($campo,$campo_id,$tabla,$ext) {
        $query = "SELECT COALESCE(".$ext."ruta_archivo,'/.0') ruta_archivo FROM ".
                $tabla." WHERE ".$campo."=".$campo_id;
        $consulta = $this->db->query($query);
        return $consulta->result_array();
   }
   
   public function actualizarArchivo2($campo,$campo_id,$tabla,$ruta_archivo,$ext) {
        $datos = array(
            $ext.'ruta_archivo' => $ruta_archivo
        );
        $this->db->where($campo, $campo_id);
        $this->db->update($tabla, $datos);
    }
}

?>
