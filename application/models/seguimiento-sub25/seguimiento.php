<?php

/*
 * Contiene los metodos para acceder a la tabla seguimiento
 *
 * @author Ing. Karen Peñate
 */

class Seguimiento extends CI_Model {

    private $tabla = 'seguimiento';

  public function agregarSeguimiento($mun_id) {
        $datos = array(
            'mun_id' => $mun_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function idPorMunicipio($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function actualizarSeguimiento($seg_id, $seg_forden_preparacion, $seg_facta_recepcion,  $seg_forden_diagnostico
            ,$seg_fsocializacion,$seg_facta_aprobacion_d,$seg_forden_planificacion,$seg_facta_aprobacion_p,$seg_facuerdo_municipal
            ,$seg_fpresentacion_publica,$seg_forden_seguimiento,$seg_comentario) {
        $datos = array(
            'seg_forden_preparacion' => $seg_forden_preparacion,
            'seg_facta_recepcion' => $seg_facta_recepcion,
            'seg_forden_diagnostico' => $seg_forden_diagnostico,
            'seg_fsocializacion'=>$seg_fsocializacion,
            'seg_facta_aprobacion_d'=>$seg_facta_aprobacion_d,
            'seg_forden_planificacion'=>$seg_forden_planificacion,
            'seg_facta_aprobacion_p'=>$seg_facta_aprobacion_p,
            'seg_facuerdo_municipal'=>$seg_facuerdo_municipal,
            'seg_fpresentacion_publica'=>$seg_fpresentacion_publica,
            'seg_forden_seguimiento'=>$seg_forden_seguimiento,
            'seg_comentario'=>$seg_comentario
            );
        $this->db->where('seg_id', $seg_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function contarGDRTerminados($reg_id){
        $sql="SELECT count(*) si
              FROM municipio A,departamento B, region C, $this->tabla D
              WHERE A.dep_id = B.dep_id AND C.reg_id=B.reg_id AND D.mun_id=A.mun_id
              	AND D.seg_forden_seguimiento IS NOT NULL AND C.reg_id=$reg_id";
        $consulta = $this->db->query($sql, array());
        $resultado=$consulta->result();
        return $resultado[0]->si;
    }
    
    public function contarGDRDesarrollo($reg_id){
        $sql="SELECT count(*) si
              FROM municipio A,departamento B, region C, $this->tabla D
              WHERE A.dep_id = B.dep_id AND C.reg_id=B.reg_id AND D.mun_id=A.mun_id
              	AND D.seg_forden_preparacion IS NOT NULL AND C.reg_id=$reg_id";
        $consulta = $this->db->query($sql, array());
        $resultado=$consulta->result();
        return $resultado[0]->si;
    }
    
}

?>
