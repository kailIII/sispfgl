<?php

/*
 * Contiene los metodos para acceder a la tabla PORTAFOLIO PROYECTO
 *
 * @author Ing. Karen Peñate
 */

class Portafolio_proyecto extends CI_Model {

    
private $tabla = 'portafolio_proyecto';
        
    public function agregarPortafolio($pro_pep_id) {
        $datos = array(
           'pro_pep_id' => $pro_pep_id
           );
        $this->db->insert($this->tabla, $datos);
    }

     public function obtenerPortafolios($pro_pep_id) {
        $this->db->where('pro_pep_id',$pro_pep_id);
        $this->db->order_by('por_pro_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerPortafolioId($por_pro_id) {
        $this->db->where('por_pro_id', $por_pro_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerId($pro_pep_id) {
        $this->db->select_max('por_pro_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarPortafolioProyecto($por_pro_area, $por_pro_tema, $por_pro_nombre,
            $por_pro_descripcion, $por_pro_ubicacion,$por_pro_costo_estimado,
            $por_pro_fecha_desde ,$por_pro_fecha_hasta ,$por_pro_beneficiario_h,
            $por_pro_beneficiario_m,$por_pro_observacion,$por_pro_ruta_archivo,$por_pro_id) {
        $datos = array(
            'por_pro_area' => $por_pro_area,
            'por_pro_tema' => $por_pro_tema,
            'por_pro_nombre' => $por_pro_nombre,
            'por_pro_descripcion' => $por_pro_descripcion,
            'por_pro_ubicacion' => $por_pro_ubicacion,
            'por_pro_costo_estimado'=>$por_pro_costo_estimado,
            'por_pro_fecha_desde' => $por_pro_fecha_desde,
            'por_pro_fecha_hasta' => $por_pro_fecha_hasta,
            'por_pro_beneficiario_h' => $por_pro_beneficiario_h,
            'por_pro_beneficiario_m' => $por_pro_beneficiario_m,
            'por_pro_observacion' => $por_pro_observacion,
            'por_pro_ruta_archivo' => $por_pro_ruta_archivo
            );
        $this->db->where('por_pro_id', $por_pro_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminaPortafolioProyecto($por_pro_id) {
        $consulta = "DELETE FROM " . $this->tabla . " CASCADE WHERE por_pro_id=?";
        $this->db->query($consulta, array($por_pro_id));
    }
    
    public function actualizarAnios($por_pro_anio1,$por_pro_anio2,$por_pro_anio3,$por_pro_anio4,$por_pro_anio5,$por_pro_id) {
        $datos = array(
            'por_pro_anio1' => $por_pro_anio1,
            'por_pro_anio2' => $por_pro_anio2,
            'por_pro_anio3' => $por_pro_anio3,
            'por_pro_anio4' => $por_pro_anio4,
            'por_pro_anio5' => $por_pro_anio5
            
            );
        $this->db->where('por_pro_id', $por_pro_id);
        $this->db->update($this->tabla, $datos);
    }

    
}
?>
