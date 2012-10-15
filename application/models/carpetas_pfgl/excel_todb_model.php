<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Class excel_todb_model extends CI_Model{
	
	public function insertar_data ($archivo) {
		include("./resource/excel_reader/excel_reader2.php"); 
		$excel = new Spreadsheet_Excel_Reader("./uploads/".$archivo);
		
		$data = array(
            'estadoPeriodoMatricula' => 1
            'pro_id',
  'mun_id'
  'com_id'
  'pro_codigo'
  'pro_nombre' => $excel->val(10,'A');
  'pro_num_ord_llegada'
  'pro_zona_fisdl'
  'pro_nom_formulador'
  'pro_nom_ref_tec_municipal'
  'pro_email_ref_tec_municipal'
  'pro_tel_ref_tec_municipal'
  'pro_nom_ase_fisdl'
  'pro_email_ase_fisdl'
  'pro_tel_ase_fisdl'
  'pro_fec_ent_gl_fisdl' 
  'pro_fec_ent_gop_gpr'
  'pro_rec_gpr date'
  'pro_fec_ent_gpr_din'
  'pro_estatus'
  'pro_mon_ejecucion'
  'pro_fec_visita'
  'pro_num_rev'
  'pro_fec_visado'
  'pro_mon_visado'
  'pro_obs_din'
  'pro_tipologia'
  'pro_sal_par_ciudadana' 
  'pro_sal_pue_indigenas'
  'pro_sal_rea_involuntario'
        );

		//$this->db->where('id', $id);
		//$this->db->update('gestionperiodos', $data);
	}
	
	public function finalizar_pmatricula() {
		/*$data = array(
            'estadoPeriodoMatricula' => 0
        );

		//$this->db->where('id', $id);
		$this->db->update('gestionperiodos', $data);*/
	}
}

?>
