<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Class componente3_model extends CI_Model{
	
	public function get_dsat_id(){
		$query = $this->db->query("select nextval('dsat_seq') as id;");
		$row = $query->row();
		return $row->id;
	}
	public function get_fcdp_id(){
		$query = $this->db->query("select nextval('fcdp_seq') as id;");
		$row = $query->row();
		return $row->id;
	}
	public function get_epi_id(){
		$query = $this->db->query("select nextval('epi_seq') as id;");
		$row = $query->row();
		return $row->id;
	}
	public function get_dd_id(){
		$query = $this->db->query("select nextval('dd_seq') as id;");
		$row = $query->row();
		return $row->id;
	}
	
	public function insertar_dsat($new_dsat,$new_arch) {
		
		$newid=$this->get_dsat_id();
		
		$data_dsat = array(
		  'dsat_id' => $newid,
          'dsat_fecha' => $new_dsat['fecha_act'],
          'dsat_actividad' => $new_dsat['nombre_act'],
		  'dsat_municipio' => $new_dsat['mun_id'],
		  'dsat_observaciones' => $new_dsat['observaciones'],
		  'dsat_archivo' => $new_arch
        );
        
        $j=0;
        for($i=1;$i<=6;$i++){
			if(isset($new_dsat['sector_act'.$i])){
				$data_sec[$j] = array(
				  'dsat_id' => $newid,
				  'sec_id' => $new_dsat['sector_act'.$i]
				);
				$j++;
			}
		} //Deterina los sectores seleccionados y forma varios array
        
        $k=0;
        for($i=0;$i<$new_dsat['cant_asis'];$i++){
			
				$data_asis[$k] = array(
				  'dsat_id' => $newid,
				  'asis_nombre' => $new_dsat['par_nombre'.$i],
				  'asis_sexo' => $new_dsat['par_sexo'.$i],
				  'asis_cargo' => $new_dsat['par_cargo'.$i],
				  'asis_sector' => $new_dsat['par_sector'.$i]
				);
				$k++;
		}// ingresa los asistentes al un array
		
		$this->db->insert('dsat', $data_dsat); 
		
        if($j!=0)
			for($i=0;$i<$j;$i++){
				$this->db->insert('dsat_sector', $data_sec[$i]);
			}
			
		if($k!=0)
			for($i=0;$i<$k;$i++){
				$this->db->insert('asistente_dsat', $data_asis[$i]);
			}
		//return $data_sec;
		//$this->db->where('id', $id);
		//$this->db->update('gestionperiodos', $data);
	}
	
	public function insertar_fcdp($new_fcdp,$new_arch) {
		
		$newid=$this->get_fcdp_id();
		if(isset($new_fcdp['ultimo_con']))
			$ultimo='S';
		else $ultimo='N';
				
		$data_fcdp = array(
		  'fcdp_id' => $newid,
          'fcdp_fecha' => $new_fcdp['fecha_con'],
          'fcdp_tematica' => $new_fcdp['tematica_con'],
		  'fcdp_ultima' => $ultimo,
		  'fcdp_observaciones' => $new_fcdp['observaciones'],
		  'fcdp_archivo' => $new_arch
        );
                   
        $k=0;
        for($i=0;$i<$new_fcdp['cant_asis'];$i++){
			
				$data_asis[$k] = array(
				  'fcdp_id' => $newid,
				  'asis_nombre' => $new_fcdp['par_nombre'.$i],
				  'asis_sexo' => $new_fcdp['par_sexo'.$i],
				  'asis_cargo' => $new_fcdp['par_cargo'.$i],
				  'asis_sector' => $new_fcdp['par_sector'.$i]
				);
				$k++;
		}// ingresa los asistentes a un array
		
		$this->db->insert('fcdp', $data_fcdp); 
			
		if($k!=0)
			for($i=0;$i<$k;$i++){
				$this->db->insert('asistente_fcdp', $data_asis[$i]);
			}
		//return $data_sec;
		//$this->db->where('id', $id);
		//$this->db->update('gestionperiodos', $data);
	}
	
	public function insertar_epi($new_epi) {
		
		$newid=$this->get_epi_id();
				
		$data_epi = array(
		  'epi_id' => $newid,
          'epi_nombre' => 'Plan-'.$newid.'-Elaborado el: '.date("d-m-Y")
        );
                   
        $k=0;
        for($i=0;$i<$new_epi['cant_act'];$i++){
			
				$data_act[$k] = array(
				  'epi_id' => $newid,
				  'act_nombre' => $new_epi['act_nombre'.$i],
				  'act_fecha_ini' => $new_epi['act_inicio'.$i],
				  'act_fecha_fin' => $new_epi['act_fin'.$i],
				  'act_estado' => null,
				  'act_responsable' => $new_epi['act_responsable'.$i],
				  'act_cargo' => $new_epi['act_cargo'.$i],
				  'act_descripcion' => $new_epi['act_desc'.$i],
				  'act_recursos' => $new_epi['act_recursos'.$i],
				);
				$k++;
		}// ingresa las actividades a un array
		
		$r=$this->db->insert('epi', $data_epi); 
		
		if($r){	
			if($k!=0)
				for($i=0;$i<$k;$i++){
					$r=$this->db->insert('actividades_epi', $data_act[$i]);
				}
		}
		
		return $r;
	}
	
	public function insertar_dd($new_dd,$new_arch1,$new_arch2) {
		
		$newid=$this->get_dd_id();
		
		$data_dd = array(
		  'dd_id' => $newid,
          'dd_fecha' => $new_dd['fecha_doc'],
          'dd_descripcion' => $new_dd['desc_doc'],
		  'dd_archivo_resumen' => $new_arch1,
		  'dd_archivo_completo' => $new_arch2
        );
        
        $j=0;
        for($i=1;$i<=6;$i++){
			if(isset($new_dd['sector_act'.$i])){
				$data_sec[$j] = array(
				  'dd_id' => $newid,
				  'sec_id' => $new_dd['sector_act'.$i]
				);
				$j++;
			}
		} //Deterina los sectores seleccionados y forma varios array
		
		$this->db->insert('dd', $data_dd); 
		
        if($j!=0)
			for($i=0;$i<$j;$i++){
				$this->db->insert('dd_sector', $data_sec[$i]);
			}
		//return $data_sec;
		//$this->db->where('id', $id);
		//$this->db->update('gestionperiodos', $data);
	}
	
	public function get_actividades_divu() {
        $query = $this->db->get('divu');
        return $query->result();
    }
    
    public function get_mun_nombre($id_mun){
		$this->db->where('mun_id', $id_mun);
		$query = $this->db->get('municipio');
		$row = $query->row();
 		return $row->mun_nombre;
	}
	
	public function get_depto_nombre($id_mun){
		$this->db->where('mun_id', $id_mun);
		$query = $this->db->get('municipio');
		$row = $query->row();
 		
 		$this->db->where('dep_id', $row->dep_id);
 		$query = $this->db->get('departamento');
 		$row = $query->row();
 		
 		return $row->dep_nombre;
	}
	
	public function insertar_divu($act_nombre, $act_fecha, $act_tipo, $act_responsable, $act_mun) {
		
		$data_divu = array(
		  'divu_nombre' => $act_nombre,
          'divu_fecha' => $act_fecha,
          'divu_tipo' => $act_tipo,
		  'divu_responsable' => $act_responsable,
		  'divu_municipio' => $act_mun
        );
        
        $this->db->insert('divu', $data_divu); 
        
        
	}
	
	public function insertar_asis_divu($asis_nombre, $asis_sexo, $asis_sector, $asis_cargo, $divu_id){
		
		$data_asis_divu = array(
		  'divu_id' => $divu_id,
          'asis_nombre' => $asis_nombre,
          'asis_sexo' => $asis_sexo,
		  'asis_cargo' => $asis_cargo,
		  'asis_sector' => $asis_sector
        );
        
        $this->db->insert('asistente_divu', $data_asis_divu);
	}
	
	
	
	public function get_asistentes_divu($divu_id){
		$this->db->where('divu_id',$divu_id);
		$query = $this->db->get('asistente_divu');
        return $query->result();
	}
	
	public function get_asistentes_dsat($dsat_id){
		$this->db->where('dsat_id',$dsat_id);
		$query = $this->db->get('asistente_dsat');
        return $query->result();
	}
	
	public function get_asistentes_fcdp($fcdp_id){
		$this->db->where('fcdp_id',$fcdp_id);
		$query = $this->db->get('asistente_fcdp');
        return $query->result();
	}
	
	public function get_actividades_dsat() {
        $query = $this->db->get('dsat');
        return $query->result();
    }
    
    public function get_epi() {
        $query = $this->db->get('epi');
        return $query->result();
    }
    
    public function get_act_epi($epi_id){
		$this->db->where('epi_id',$epi_id);
		$query = $this->db->get('actividades_epi');
        return $query->result();
	}
    
    public function get_actividades_fcdp() {
        $query = $this->db->get('fcdp');
        return $query->result();
    }
    
    public function get_dd() {
        $query = $this->db->get('dd');
        return $query->result();
    }
    
    public function get_sectores_dsat($dsat_id){
		$this->db->where('dsat_id',$dsat_id);
		$query = $this->db->get('dsat_sector');
		$sectores = $query->result();
		$r='';
		foreach ($sectores as $aux) {
			$r=$r.$this->get_sectores_nom($aux->sec_id).', ';
		}
		return $r;
	}
	
	public function get_sectores_dd($dd_id){
		$this->db->where('dd_id',$dd_id);
		$query = $this->db->get('dd_sector');
		$sectores = $query->result();
		$r='';
		foreach ($sectores as $aux) {
			$r=$r.$this->get_sectores_nom($aux->sec_id).', ';
		}
		return $r;
	}
	
	public function get_sectores_nom($sec_id){
		$this->db->where('sec_id', $sec_id);
		$query = $this->db->get('sector');
		$row = $query->row();
 		return $row->sec_nombre;
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
