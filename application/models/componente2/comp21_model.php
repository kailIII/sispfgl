<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Class comp21_model extends CI_Model{
	
	
	
	public function insertar_cc($new_cc,$new_arch1,$new_arch2) {
		
		$data_cc = array(
		  'mun_id' => $new_cc['mun_id'],
          'cc_fecha' => $new_cc['fecha_convocatoria'],
          'cc_lugar' => $new_cc['lugar_convocatoria'],
		  'total_mujeres' => $new_cc['total_mujeres'],
		  'total_hombres' => $new_cc['total_hombres'],
		  'acta_final' => $new_arch1,
		  'listado_asistencia' => $new_arch2
        );
        
        $this->db->insert('cc', $data_cc);
        $query = $this->db->query("select currval('cc_cc_id_seq') as id;");
		$row = $query->row();
		$id= $row->id;
              
        $k=0;
        for($i=0;$i<$new_cc['cant_proy'];$i++){
			
				$data_proy[$k] = array(
				  'cc_id' => $id,
				  'nombre_proy' => $new_cc['nombre_proy'.$i],
				  'monto_proy' => $new_cc['monto_proy'.$i],
				  'com_beneficiadas' => $new_cc['com_beneficiadas'.$i],
				  'pob_beneficiada' => $new_cc['pob_beneficiada'.$i],
				  'tipo_proy' => $new_cc['tipo_proy'.$i]
				);
				$k++;
		}// ingresa los asistentes al un array
		
		
		if($k!=0)
			for($i=0;$i<$k;$i++){
				$this->db->insert('proyectos_cc', $data_proy[$i]);
			}
		//return $data_sec;
		//$this->db->where('id', $id);
		//$this->db->update('gestionperiodos', $data);
	}
	

}

?>
