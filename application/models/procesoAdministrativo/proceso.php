<?php

/*
 * Contiene los metodos para acceder a la tabla proceso
 *
 * @author Ing. Karen Peñate
 */

class Proceso extends CI_Model {

    private $tabla = 'proceso';

    public function agregarPro($mun_id) {
        $datos = array(
            'mun_id' => $mun_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function contarProPorMuni($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function obtenerPro($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function editarPro($pro_id, $pro_exp_ruta_archivo, $pro_faclara_dudas, $pro_fexpresion_interes, $pro_fpublicacion, $pro_numero, $pro_observacion1, $pro_pub_ruta_archivo) {
        $datos = array(
            'pro_numero' => $pro_numero,
            'pro_fpublicacion' => $pro_fpublicacion,
            'pro_faclara_dudas' => $pro_faclara_dudas,
            'pro_fexpresion_interes' => $pro_fexpresion_interes,
            'pro_observacion1' => $pro_observacion1,
            'pro_pub_ruta_archivo' => $pro_pub_ruta_archivo,
            'pro_exp_ruta_archivo' => $pro_exp_ruta_archivo
        );
        $this->db->where('pro_id', $pro_id);
        $this->db->update($this->tabla, $datos);
    }

    public function editarProGrup($mun_id, $pro_exp_ruta_archivo, $pro_faclara_dudas, $pro_fexpresion_interes, $pro_fpublicacion, $pro_numero, $pro_observacion1, $pro_pub_ruta_archivo) {
        $datos = array(
            'pro_numero' => $pro_numero,
            'pro_fpublicacion' => $pro_fpublicacion,
            'pro_faclara_dudas' => $pro_faclara_dudas,
            'pro_fexpresion_interes' => $pro_fexpresion_interes,
            'pro_observacion1' => $pro_observacion1,
            'pro_pub_ruta_archivo' => $pro_pub_ruta_archivo,
            'pro_exp_ruta_archivo' => $pro_exp_ruta_archivo
        );
        $this->db->where('mun_id', $mun_id);
        $this->db->update($this->tabla, $datos);
    }

    public function editarPro2($pro_id, $pro_ffinalizacion, $pro_finicio) {
        $datos = array(
            'pro_ffinalizacion' => $pro_ffinalizacion,
            'pro_finicio' => $pro_finicio
        );
        $this->db->where('pro_id', $pro_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function editarPro2Grup($mun_id, $pro_ffinalizacion, $pro_finicio) {
        $datos = array(
            'pro_ffinalizacion' => $pro_ffinalizacion,
            'pro_finicio' => $pro_finicio
        );
        $this->db->where('mun_id', $mun_id);
        $this->db->update($this->tabla, $datos);
    }

    public function editarPro3($pro_id, $pro_fenvio_informacion, $pro_flimite_recepcion) {
        $datos = array(
            'pro_fenvio_informacion' => $pro_fenvio_informacion,
            'pro_flimite_recepcion' => $pro_flimite_recepcion
        );
        $this->db->where('pro_id', $pro_id);
        $this->db->update($this->tabla, $datos);
    }

    public function editarPro3Grup($mun_id, $pro_fenvio_informacion, $pro_flimite_recepcion) {
        $datos = array(
            'pro_fenvio_informacion' => $pro_fenvio_informacion,
            'pro_flimite_recepcion' => $pro_flimite_recepcion
        );
        $this->db->where('mun_id', $mun_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function editarPro4($pro_id, $pro_fsolicitud, $pro_frecepcion, $pro_fcierre_negociacion, $pro_ffirma_contrato, $pro_faperturatecnica, $pro_faperturafinanciera, $pro_observacion2) {
        $datos = array(
            'pro_fsolicitud' => $pro_fsolicitud,
            'pro_frecepcion' => $pro_frecepcion,
            'pro_fcierre_negociacion' => $pro_fcierre_negociacion,
            'pro_ffirma_contrato' => $pro_ffirma_contrato,
            'pro_faperturatecnica' => $pro_faperturatecnica,
            'pro_faperturafinanciera' => $pro_faperturafinanciera,
            'pro_observacion2' => $pro_observacion2
        );
        $this->db->where('pro_id', $pro_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function editarPro4Grup($mun_id, $pro_fsolicitud, $pro_frecepcion, $pro_fcierre_negociacion, $pro_ffirma_contrato, $pro_faperturatecnica, $pro_faperturafinanciera, $pro_observacion2) {
        $datos = array(
            'pro_fsolicitud' => $pro_fsolicitud,
            'pro_frecepcion' => $pro_frecepcion,
            'pro_fcierre_negociacion' => $pro_fcierre_negociacion,
            'pro_ffirma_contrato' => $pro_ffirma_contrato,
            'pro_faperturatecnica' => $pro_faperturatecnica,
            'pro_faperturafinanciera' => $pro_faperturafinanciera,
            'pro_observacion2' => $pro_observacion2
        );
        $this->db->where('mun_id', $mun_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function consultarSeleccionadaProceso($grupo_id_pep){
        $sql="SELECT consultora.cons_nombre  consultora
              FROM municipio, grupo,$this->tabla,consultores_interes,consultora
              WHERE municipio.grup_id_pep=grupo.gru_id 
                    AND proceso.mun_id=municipio.mun_id
                    AND consultores_interes.pro_id=$this->tabla.pro_id
                    AND consultora.cons_id=consultores_interes.cons_id
                    AND municipio.grup_id_pep=$grupo_id_pep 
                    AND consultores_interes.con_int_seleccionada='Si'";
        $consulta = $this->db->query($sql);
        return $consulta->result();
    }

}

?>
