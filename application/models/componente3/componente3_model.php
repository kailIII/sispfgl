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
	
	public function get_estado_comp3(){
		
		$query = $this->db->query("select count(*) as cant from epi;");
		$row = $query->row();
 		
 		if($row->cant > 0){
				$query1 = $this->db->query("select max(epi_id) as id from epi;");
				$row1 = $query1->row();
				
				$query2 = $this->db->query("select epi_nombre from epi where epi_id=".$row1->id.";");
				$row2 = $query2->row();
				
				$estado['img']='<img src="'.base_url("resource/imagenes/epp.png").'" height="200px" width="200px"/>';
				$estado['msg']='El Plan Piloto ha sido elaborado.<br/>El nombre por defecto es:<br/><br/>';
				$estado['info']=$row2->epi_nombre;
				$estado['pb']='<br/><br/>Porcentaje de Avance:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="'.base_url("resource/imagenes/pb100.png").'" height="50px" width="300px"/>';
				$estado['rpt_detalle']='<br/><a href="'.base_url("index.php/componente3/componente3/reporte_epp").'">Ver Reporte Detallado.</a>';
				return $estado;
		}
		
		$query = $this->db->query("select count(*) as cant from dd;");
		$row = $query->row();
		
		if($row->cant > 0){
				$query1 = $this->db->query("select max(dd_id) as id from dd;");
				$row1 = $query1->row();
				
				$query2 = $this->db->query("select * from dd where dd_id=".$row1->id.";");
				$row2 = $query2->row();
				
				$estado['img']='<img src="'.base_url("resource/imagenes/dd.png").'" height="200px" width="200px"/>';
				$estado['msg']='Los Documentos de Descentralizaci&oacute;n han sido registrados.<br/>';
				$estado['info']='Fecha de Registro: '.$row2->dd_fecha.'<br/>
								Documentos:<br/>
									&nbsp;&nbsp;Resumen Ejecutivo: <a href="'.base_url($row2->dd_archivo_resumen).'">Descargar</a></br>
									&nbsp;&nbsp;Documento Completo: <a href="'.base_url($row2->dd_archivo_completo).'">Descargar</a></br>';
				$estado['pb']='<br/><br/>Porcentaje de Avance:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="'.base_url("resource/imagenes/pb80.png").'" height="50px" width="300px"/>';
				return $estado;
		}
		
		$query = $this->db->query("select count(*) as cant from divu;");
		$row = $query->row();
		
		if($row->cant > 0){
				//$query1 = $this->db->query("select min(divu_id) as id from divu;");
				//$row1 = $query1->row();
				
				$query1 = $this->db->query("select * from divu where divu_id=(select min(divu_id) as id from divu);");
				$row1 = $query1->row();
				
				$query2 = $this->db->query("select * from divu where divu_id=(select max(divu_id) as id from divu);");
				$row2 = $query2->row();
				
				$estado['img']='<img src="'.base_url("resource/imagenes/divu.png").'" height="200px" width="200px"/>';
				$estado['msg']='Las Actividades de Divulgaci&oacute;n han sido registradas.<br/><br/>';
				$estado['info']='Primera Actividad registrada, programada para el d&iacute;a: '.$row1->divu_fecha.'<br/>
								&Uacute;ltima Actividad registrada, programada para el d&iacute;a: '.$row2->divu_fecha.'<br/>
								Total de Actividades registradas: '.$row->cant;
				$estado['pb']='<br/><br/>Porcentaje de Avance:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="'.base_url("resource/imagenes/pb60.png").'" height="50px" width="300px"/>';
				$estado['rpt_detalle']='<br/><a href="'.base_url("index.php/componente3/componente3/reporte_divu").'">Ver Reporte Detallado.</a>';
				return $estado;
		}
		
		
		$query = $this->db->query("select count(*) as cant from fcdp;");
		$row = $query->row();
		
		if($row->cant > 0){
				//$query1 = $this->db->query("select min(divu_id) as id from divu;");
				//$row1 = $query1->row();
				
				$query1 = $this->db->query("select * from fcdp where fcdp_id=(select min(fcdp_id) as id from fcdp);");
				$row1 = $query1->row();
				
				$query2 = $this->db->query("select * from fcdp where fcdp_id=(select max(fcdp_id) as id from fcdp);");
				$row2 = $query2->row();
				
				$query3 = $this->db->query("select count(*) as cant from fcdp where fcdp_ultima='S';");
				$row3 = $query3->row();
				if($row3->cant > 0)
					$pendientes='No. La ultima reuni&oacute;n se ha llevado a cabo.';
				else $pendientes='Si. Aun hay reuniones pendientes.';
				
				$estado['img']='<img src="'.base_url("resource/imagenes/fcdp.png").'" height="200px" width="200px"/>';
				$estado['msg']='Las Actividades de Formaci&oacute;n de Consenso y Discuci&oacute;n de la Pol&iacute;tica han iniciado.<br/><br/>';
				$estado['info']='Primera Actividad realizada el d&iacute;a: '.$row1->fcdp_fecha.'<br/>
								&Uacute;ltima Actividad realizada el d&iacute;a: '.$row2->fcdp_fecha.'<br/>
								Reuniones Pendientes: '.$pendientes;
				$estado['pb']='<br/><br/>Porcentaje de Avance:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="'.base_url("resource/imagenes/pb40.png").'" height="50px" width="300px"/>';
				return $estado;
		}
		
		$query = $this->db->query("select count(*) as cant from dsat;");
		$row = $query->row();
		
		if($row->cant > 0){
				//$query1 = $this->db->query("select min(divu_id) as id from divu;");
				//$row1 = $query1->row();
				
				$query1 = $this->db->query("select * from dsat where dsat_id=(select min(dsat_id) as id from dsat);");
				$row1 = $query1->row();
				
				$query2 = $this->db->query("select * from dsat where dsat_id=(select max(dsat_id) as id from dsat);");
				$row2 = $query2->row();
				
				$estado['img']='<img src="'.base_url("resource/imagenes/dsat.png").'" height="200px" width="200px"/>';
				$estado['msg']='Las Actividades Diagnostico Sectorial y Analisis Transversal han sido iniciadas.<br/><br/>';
				$estado['info']='Primera Actividad realizada el d&iacute;a: '.$row1->dsat_fecha.'<br/>
								&Uacute;ltima Actividad realizada el d&iacute;a: '.$row2->dsat_fecha.'<br/>
								Total de Actividades registradas: '.$row->cant;
				$estado['pb']='<br/><br/>Porcentaje de Avance:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="'.base_url("resource/imagenes/pb20.png").'" height="50px" width="300px"/>';
				return $estado;
		}
		else{
				$estado['img']='<img src="'.base_url("resource/imagenes/noini.png").'" height="200px" width="200px"/>';
				$estado['msg']='Las Actividades Diagnostico Sectorial y Analisis Transversal no han sido iniciadas.<br/><br/>';
				$estado['info']='Total de Actividades registradas: 0';
				$estado['pb']='<br/><br/>Porcentaje de Avance:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="'.base_url("resource/imagenes/pb0.png").'" height="50px" width="300px"/>';
				return $estado;
		
		}
		
 		
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
