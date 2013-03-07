<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Class financiera_model extends CI_Model{
	
	public function getcod_com($com_id){
		$query = $this->db->query("select com_codigo from componente where com_id=".$com_id.";");
		$row = $query->row();
		return $row->com_codigo;
	}
	
	public function getcod_act($act_id){
		$query = $this->db->query("select act_codigo from actividad where act_id=".$act_id.";");
		$row = $query->row();
		return $row->act_codigo;
	}
	
	public function total_hijos_com($com_id){
		$query = $this->db->query("select count(com_id) as cant from componente where com_com_id=".$com_id.";");
		$row = $query->row();
		return $row->cant;
	}
	
	public function total_hijos_subcom($com_id){
		$query = $this->db->query("select count(act_id) as cant from actividad where com_id=".$com_id." and act_tipo='Macroactividad';");
		$row = $query->row();
		return $row->cant;
	}
	
	public function total_hijos_macroact($act_id){
		$query = $this->db->query("select count(act_id) as cant from actividad where act_act_id=".$act_id.";");
		$row = $query->row();
		return $row->cant;
	}
	
	public function insertar_subcom($datos){
		$new_data = array(
		  'com_com_id' => $datos['com'],
          'com_codigo' => $datos['subcom_cod'],
          'com_nombre' => $datos['subcom_nombre'],
		  'com_descripcion' => $datos['com_desc'],
		  'fecha_creacion' => date('Y-m-d'),
		  'com_tipo' => 'Subcomponente'
        );
        
        if($this->verificar_cod($datos['subcom_cod']))
			return false;
        
        $this->db->insert('componente', $new_data);
			return true;
	}
	
	public function verificar_cod($cod){
		$query = $this->db->query("select count(com_codigo) as cant from componente where com_codigo='".$cod."';");
		$row = $query->row();
		if($row->cant!=0)
			return true;
	}
	public function verificar_cod_act($cod){
		$query = $this->db->query("select count(act_codigo) as cant from actividad where act_codigo='".$cod."';");
		$row = $query->row();
		if($row->cant!=0)
			return true;
	}
	
	public function get_hijos($tabla,$campo,$id){
		$query = $this->db->query("select * from ".$tabla." where ".$campo."=".$id.";");
		return $query->result();
	}
	
	public function get_hijos_sub($tabla,$campo,$id){
		$query = $this->db->query("select * from ".$tabla." where ".$campo."=".$id." and act_tipo='Macroactividad';");
		return $query->result();
	}
	
	public function insertar_macroact($datos){
		$new_data = array(
		  'com_id' => $datos['subcom'],
          'act_codigo' => $datos['macroact_cod'],
          'act_nombre' => $datos['macroact_nombre'],
		  'act_descripcion' => $datos['macroact_desc'],
		  'fecha_creacion' => date('Y-m-d'),
		  'act_tipo' => 'Macroactividad'
        );
        
        if($this->verificar_cod_act($datos['macroact_cod']))
			return false;
        
        $this->db->insert('actividad', $new_data);
			return true;
	}
	
	public function insertar_act($datos){
		$new_data = array(
		  'com_id' => $datos['subcom'],
		  'act_act_id' => $datos['macroact'],
          'act_codigo' => $datos['act_cod'],
          'act_nombre' => $datos['act_nombre'],
		  'act_descripcion' => $datos['act_desc'],
		  'fecha_creacion' => date('Y-m-d'),
		  'act_tipo' => 'Actividad'
        );
        
        if($this->verificar_cod_act($datos['act_cod']))
			return false;
        
        $this->db->insert('actividad', $new_data);
			return true;
	}
	
	public function insertar_subact($datos){
		$new_data = array(
		  'com_id' => $datos['subcom'],
		  'act_act_id' => $datos['act'],
          'act_codigo' => $datos['subact_cod'],
          'act_nombre' => $datos['subact_nombre'],
		  'act_descripcion' => $datos['subact_desc'],
		  'fecha_creacion' => date('Y-m-d'),
		  'act_tipo' => 'Subactividad',
		  'saldo_goes' => $datos['goes'],
		  'saldo_gmun' => $datos['gmun'],
		  'saldo_birf' => $datos['birf']
        );
        
        if($this->verificar_cod_act($datos['subact_cod']))
			return false;
        
        $this->db->insert('actividad', $new_data);
			return true;
	}
	
	public function get_goes($act_id){
		$this->db->where('act_id', $act_id);
 		$query = $this->db->get('actividad');
 		$row = $query->row();
 		
 		return $row->saldo_goes;
	}
	
	public function get_gmun($act_id){
		$this->db->where('act_id', $act_id);
 		$query = $this->db->get('actividad');
 		$row = $query->row();
 		
 		return $row->saldo_gmun;
	}
	
	public function get_birf($act_id){
		$this->db->where('act_id', $act_id);
 		$query = $this->db->get('actividad');
 		$row = $query->row();
 		
 		return $row->saldo_birf;
	}
	
	public function insertar_transfer($datos){
		if(isset($datos['goest'])){
			$new_data = array(
			  'act_origen' => $datos['subact'],
			  'act_destino' => $datos['subactd'],
			  'monto' => $datos['goest'],
			  'trans_fuente' => 'GOES',
			  'trans_desc' => $datos['trans_desc'],
			  'trans_obs' => $datos['trans_obs'],
			  'trans_fecha' => $datos['trans_fecha']
			);
			
			$this->db->insert('transferencia', $new_data);//registrar transaccion
			
			$this->db->where('act_id', $datos['subact']);
			$query = $this->db->get('actividad');
			$row = $query->row();
			$goes_actual=$row->saldo_goes;//obtener saldo actual origen
			
			$actualizar = array(
               'saldo_goes' => $goes_actual-$datos['goest'],
            );

			$this->db->where('act_id', $datos['subact']);
			$this->db->update('actividad', $actualizar); //actualziar saldo origen
			
			$this->db->where('act_id', $datos['subactd']);
			$query = $this->db->get('actividad');
			$row = $query->row();
			$goes_actual=$row->saldo_goes;//obtener saldo actual destino
			
			$actualizar = array(
               'saldo_goes' => $goes_actual+$datos['goest'],
            );

			$this->db->where('act_id', $datos['subactd']);
			$this->db->update('actividad', $actualizar); //actualziar saldo destino
			
		}
				///////////////////
        if(isset($datos['gmunt'])){
			$new_data = array(
			  'act_origen' => $datos['subact'],
			  'act_destino' => $datos['subactd'],
			  'monto' => $datos['gmunt'],
			  'trans_fuente' => 'GMUN',
			  'trans_desc' => $datos['trans_desc'],
			  'trans_obs' => $datos['trans_obs'],
			  'trans_fecha' => $datos['trans_fecha']
			);
			
			$this->db->insert('transferencia', $new_data);//registrar transaccion
			
			$this->db->where('act_id', $datos['subact']);
			$query = $this->db->get('actividad');
			$row = $query->row();
			$gmun_actual=$row->saldo_gmun;//obtener saldo actual origen
			
			$actualizar = array(
               'saldo_gmun' => $gmun_actual-$datos['gmunt'],
            );

			$this->db->where('act_id', $datos['subact']);
			$this->db->update('actividad', $actualizar); //actualziar saldo origen
			
			$this->db->where('act_id', $datos['subactd']);
			$query = $this->db->get('actividad');
			$row = $query->row();
			$gmun_actual=$row->saldo_gmun;//obtener saldo actual destino
			
			$actualizar = array(
               'saldo_gmun' => $gmun_actual+$datos['gmunt'],
            );

			$this->db->where('act_id', $datos['subactd']);
			$this->db->update('actividad', $actualizar); //actualziar saldo destino
			
		}
		
		 if(isset($datos['birft'])){
			$new_data = array(
			  'act_origen' => $datos['subact'],
			  'act_destino' => $datos['subactd'],
			  'monto' => $datos['birft'],
			  'trans_fuente' => 'BIRF',
			  'trans_desc' => $datos['trans_desc'],
			  'trans_obs' => $datos['trans_obs'],
			  'trans_fecha' => $datos['trans_fecha']
			);
			
			$this->db->insert('transferencia', $new_data);//registrar transaccion
			
			$this->db->where('act_id', $datos['subact']);
			$query = $this->db->get('actividad');
			$row = $query->row();
			$birf_actual=$row->saldo_birf;//obtener saldo actual origen
			
			$actualizar = array(
               'saldo_birf' => $birf_actual-$datos['birft'],
            );

			$this->db->where('act_id', $datos['subact']);
			$this->db->update('actividad', $actualizar); //actualziar saldo origen
			
			$this->db->where('act_id', $datos['subactd']);
			$query = $this->db->get('actividad');
			$row = $query->row();
			$birf_actual=$row->saldo_birf;//obtener saldo actual destino
			
			$actualizar = array(
               'saldo_birf' => $birf_actual+$datos['birft'],
            );

			$this->db->where('act_id', $datos['subactd']);
			$this->db->update('actividad', $actualizar); //actualziar saldo destino
			
		}

	}
	
}

?>
