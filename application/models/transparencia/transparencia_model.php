<?php

Class transparencia_model extends CI_Model{

public function get_mun_nombre($id_mun){
		$this->db->where('mun_id', $id_mun);
		$query = $this->db->get('municipio');
		$row = $query->row();
 		return $row->mun_nombre;
	}

public function get_cc($id_mun) {
		$this->db->where('mun_id', $id_mun);
        $query = $this->db->get('cc');
        return $query->result();
    }

public function get_ccc($id_mun) {
		$this->db->where('mun_id', $id_mun);
        $query = $this->db->get('ccc');
        return $query->result();
    }
    
public function insertar_obs_cc($datos_obs){
	
		$data_obs = array(
		  'cc_id' => $datos_obs['id'],
          'nombre_persona' => $datos_obs['nombre_persona'],
          'email' => $datos_obs['email'],
		  'comentario' => $datos_obs['observacion'],
		  'fecha_coment' => date('Y-m-d')
        );
        
        $this->db->insert('comentario_publico_cc', $data_obs);
}

public function insertar_obs_ccc($datos_obs){
	
		$data_obs = array(
		  'ccc_id' => $datos_obs['id'],
          'nombre_persona' => $datos_obs['nombre_persona'],
          'email' => $datos_obs['email'],
		  'comentario' => $datos_obs['observacion'],
		  'fecha_coment' => date('Y-m-d')
        );
        
        $this->db->insert('comentario_publico_ccc', $data_obs);
}
    

}
?>
