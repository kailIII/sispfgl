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
	
	public function insertar_etm($new_etm) {
		
		$data_etm = array(
		  'mun_id' => $new_etm['mun_id'],
          'fecha_conformacion' => $new_etm['fecha_conformacion'],
                    'fecha_induccion'=> $new_etm['fecha_ind_etm'],
                    'fecha_capacitacion'=> $new_etm['fecha_cap_etm'],
          'lugar_conformacion' => $new_etm['lugar_convocatoria'],
                    'fase' => $new_etm['fase_etm'],
		  'total_hombres' => $new_etm['total_hombres_etm'],
		  'total_mujeres' => $new_etm['total_mujeres_etm'],
                    'tipo_etm'=> $new_etm['etm'],
		  
        );
        
        $this->db->insert('etm', $data_etm);
        $query = $this->db->query("select currval('etm_etm_id_seq') as id;");
		$row = $query->row();
		$id= $row->id;
              
        	}
                
public function insertar_comi($new_comi) {
		
		$data_comi = array(
		  'mun_id' => $new_comi['mun_id'],
          'fecha_constitucion' => $new_comi['fecha_conformacion'],
                    'lugar_constitucion'=> $new_comi['lugar_convocatoria'],
                    'total_hombres'=> $new_comi['total_hombres_cm'],
                    'total_mujeres'=> $new_comi['total_mujeres_cm']
          	  
        );
        
        $this->db->insert('comision_mant', $data_comi);
        $query = $this->db->query("select currval('comision_mant_cm_id_seq') as id;");
		$row = $query->row();
		$id= $row->id;
              
        	}
	
        
	public function insertar_ccc($new_ccc) {
		
		$data_ccc = array(
		  'mun_id' => $new_ccc['mun_id'],
                  'lugar_conformacion' => $new_ccc['lugar_convocatoria'],
                  'fase' => $new_ccc['fase_ccc'],
                  'razon' => $new_ccc['ccc'],
                  'fecha_capacitacion' => $new_ccc['fecha_cap_ccc'],
                  'fecha_conformacion' => $new_ccc['fecha_con_ccc'],
                  'total_hombres' => $new_ccc['total_hombres_ccc'],
                    'total_mujeres' => $new_ccc['total_mujeres_ccc']
          
          
        );
        
        $this->db->insert('ccc', $data_ccc);
        $query = $this->db->query("select currval('ccc_ccc_id_seq') as id;");
		$row = $query->row();
		$id= $row->id;
              
        $k=0;
        for($i=0;$i<$new_ccc['cant_proy'];$i++){
			
				$data_proy[$k] = array(
				  'ccc_id' => $id,
				  'nom_subproy' => $new_ccc['nombre_proy'.$i],
				  'nom_com_beneficiadas' => $new_ccc['com_beneficiadas'.$i],
				  'num_com_beneficiadas' => $new_ccc['pob_beneficiada'.$i]
				);
				$k++;
		}// ingresa los asistentes al un array
		
		
		if($k!=0)
			for($i=0;$i<$k;$i++){
				$this->db->insert('subproy_segui', $data_proy[$i]);
			}
		
	}
	
	public function insertar_guia($guia) {
		
		if(isset($guia['recibida'])){
			if($guia['recibida']=='si')
				$recibida=1;
			else
				$recibida=0;
		}
		else $recibida=0;
		
		
		if($guia['posee_guia']=='si'){
			$posee=1;
			$fecha=$guia['fecha_entrega'];
		}
		else{
			$posee=0;
			$recibida=0;
			$fecha=null;
		}
				
			
		$data_guia = array(
		'ccc_id' => $guia['id'],
		'posee_guia' => $posee,
		'fecha_entrega' => $fecha,
		'recibida' => $recibida
		);
	
		if($guia['id']!=null)
			$this->db->insert('guia_socioambiental', $data_guia);
		
		
	}
	
	public function ccc_por_depto(){
		$query = $this->db->query("select D.dep_nombre as depto, count(Mun.ccc_id) cant
									from (select dep_id, C.mun_id, ccc_id
											from ccc C, municipio M 
											where C.mun_id=M.mun_id) as Mun
									right outer join departamento D 
									on (Mun.dep_id=D.dep_id)
									group by D.dep_nombre
									order by D.dep_nombre;");
		return $query->result();
	}
public function ccc_por_region(){
	$query = $this->db->query("select R.reg_nombre reg,sum(cant) suma
				from (select D.dep_nombre as depto, D.reg_id regid, count(Mun.ccc_id) cant
					from (select dep_id, C.mun_id, ccc_id
						from ccc C, municipio M 
						where C.mun_id=M.mun_id) as Mun
						right outer join departamento D on (Mun.dep_id=D.dep_id)
						group by D.dep_nombre,D.reg_id
						order by D.dep_nombre) as cccdepto
					right outer join region R on (cccdepto.regid=R.reg_id)
					group by R.reg_nombre
					order by R.reg_nombre;");
		return $query->result();
	}
	
public function etm_por_depto(){
		$query = $this->db->query("select D.dep_nombre as depto, count(Mun.etm_id) cant
									from (select dep_id, C.mun_id, etm_id
											from etm C, municipio M 
											where C.mun_id=M.mun_id) as Mun
									right outer join departamento D 
									on (Mun.dep_id=D.dep_id)
									group by D.dep_nombre
									order by D.dep_nombre;");
		return $query->result();
	}
        
        
public function etm_por_region(){
	$query = $this->db->query("select R.reg_nombre reg,sum(cant) suma
	   			   from (select D.dep_nombre as depto, D.reg_id regid, count(Mun.etm_id) cant
					 from (select dep_id, C.mun_id, etm_id
					       from etm C, municipio M 
					        where C.mun_id=M.mun_id) as Mun
											right outer join departamento D 
											on (Mun.dep_id=D.dep_id)
											group by D.dep_nombre,D.reg_id
											order by D.dep_nombre) as cccdepto
									right outer join region R
									on (cccdepto.regid=R.reg_id)
									group by R.reg_nombre
									order by R.reg_nombre;");
		return $query->result();
	}

 public function etm_por_muni($mun_id){
		$query = $this->db->query("select count(etm_id) as cant
									from etm
									where mun_id=".$mun_id.";");
		return $query->row();
	}       
        
public function comi_por_depto(){
    $query = $this->db->query("select D.dep_nombre as depto, count(Mun.cm_id) cant
from (select dep_id, C.mun_id, cm_id
      from comision_mant C, municipio M 
      where C.mun_id=M.mun_id) as Mun
      right outer join departamento D
      on (Mun.dep_id=D.dep_id)
group by D.dep_nombre
order by D.dep_nombre;");
		return $query->result();
	}
public function comi_por_region(){
	$query = $this->db->query("select R.reg_nombre reg,sum(cant) suma
from (select D.dep_nombre as depto, D.reg_id regid, count(Mun.cm_id) cant
	from (select dep_id, C.mun_id, cm_id
	      from comision_mant C, municipio M
	      where C.mun_id=M.mun_id) as Mun
	      right outer join departamento D
	      on (Mun.dep_id=D.dep_id)
	      group by D.dep_nombre,D.reg_id
	      order by D.dep_nombre) as cccdepto
	      right outer join region R
	      on (cccdepto.regid=R.reg_id)
group by R.reg_nombre
order by R.reg_nombre;");
		return $query->result();
	}
        
  public function cm_por_muni($mun_id){
		$query = $this->db->query("select count(cm_id) as cant
									from comision_mant
									where mun_id=".$mun_id.";");
		return $query->row();
	}             
        
	public function cc_por_depto(){
		$query = $this->db->query("select D.dep_nombre as depto, count(Mun.cc_id) cant
									from (select dep_id, C.mun_id, cc_id
											from cc C, municipio M 
											where C.mun_id=M.mun_id) as Mun
									right outer join departamento D 
									on (Mun.dep_id=D.dep_id)
									group by D.dep_nombre
									order by D.dep_nombre;");
		return $query->result();
	}
	
	public function proy_cc_por_depto(){ //devuelve la cantidad de cc por depto, y el numero de proyectos de cc por depto
		$query = $this->db->query("select D.dep_nombre as depto, count(Mun.id) cant, sum(nproy) n
									from (select * from (select dep_id, C.mun_id, C.cc_id id
										from cc C, municipio M 
										where C.mun_id=M.mun_id) F
										left outer join (select cc_id, count(id_proy_cc) nproy from proyectos_cc
													group by cc_id) Pcc
													on (F.id=Pcc.cc_id)
										) as Mun
										right outer join departamento D 
											on (Mun.dep_id=D.dep_id)
										group by D.dep_nombre
										order by D.dep_nombre;");
		return $query->result();
	}
	
	
        
	public function cc_por_region(){
		$query = $this->db->query("select R.reg_nombre reg,sum(cant) suma
									from (select D.dep_nombre as depto, D.reg_id regid, count(Mun.cc_id) cant
											from (select dep_id, C.mun_id, cc_id
													from cc C, municipio M 
													where C.mun_id=M.mun_id) as Mun
											right outer join departamento D 
											on (Mun.dep_id=D.dep_id)
											group by D.dep_nombre,D.reg_id
											order by D.dep_nombre) as ccdepto
									right outer join region R
									on (ccdepto.regid=R.reg_id)
									group by R.reg_nombre
									order by R.reg_nombre;");
		return $query->result();
	}
	
	public function proy_cc_por_region(){
		$query = $this->db->query("select R.reg_nombre reg,sum(cant) suma, nproy
									from (select D.dep_nombre as depto, D.reg_id regid, count(Mun.id) cant, nproy
											from ((select dep_id, C.mun_id, cc_id id
													from cc C, municipio M 
													where C.mun_id=M.mun_id) P
													left outer join 
													(select cc_id, count(id_proy_cc) nproy from proyectos_cc
													group by cc_id) S
													on (P.id=S.cc_id)) as Mun
											right outer join departamento D 
											on (Mun.dep_id=D.dep_id)
											group by D.dep_nombre,D.reg_id,nproy
											order by D.dep_nombre) as ccdepto
									right outer join region R
									on (ccdepto.regid=R.reg_id)
									group by R.reg_nombre, nproy
									order by R.reg_nombre;");
		return $query->result();
	}
	
	public function get_deptos(){
		$query = $this->db->query("select dep_id, dep_nombre
									from departamento
									order by dep_nombre;");
		return $query->result();
	}
	
	public function muni_depto($dep_id){
		$query = $this->db->query("select mun_id, mun_nombre
									from municipio
									where dep_id=".$dep_id."
									order by mun_nombre;");
		return $query->result();
	}
	
	public function ccc_por_muni($mun_id){
		$query = $this->db->query("select count(ccc_id) as cant
									from ccc
									where mun_id=".$mun_id.";");
		return $query->row();
	}
	
	public function monto_total_proy_cc(){
		$query = $this->db->query("select sum(monto_proy) as mtotal
									from proyectos_cc;");
		return $query->row();
	}
	
	public function total_combeneficiadas_proy_cc(){
		$query = $this->db->query("select sum(com_beneficiadas) as comtotal
									from proyectos_cc;");
		return $query->row();
	}
	
	public function total_tipo_proy($tipo){
		$query = $this->db->query("select count(*) as total
									from proyectos_cc
									where tipo_proy='".$tipo."';");
		return $query->row();
	}
	
	public function total_proy(){
		$query = $this->db->query("select count(*) as totalp
									from proyectos_cc;");
		return $query->row();
	}
	
	public function total_proy_by_year($year){
		$query = $this->db->query("select count(*) as total
									from proyectos_cc
									where cc_id in (select cc_id 
											from cc 
											where EXTRACT(YEAR FROM cc_fecha)='".$year."');");
		return $query->row();
	}
	
	public function total_cc(){
		$query = $this->db->query("select count(*) as total
									from cc;");
		return $query->row();
	}
	
	public function total_cc_by_year($year){
		$query = $this->db->query("select count(*) as total
									from cc where EXTRACT(YEAR FROM cc_fecha)='".$year."';");
		return $query->row();
	}
	
	public function total_m_cc(){
		$query = $this->db->query("select sum(total_mujeres) as total
									from cc;");
		return $query->row();
	}
	
	public function total_h_cc(){
		$query = $this->db->query("select sum(total_hombres) as total
									from cc;");
		return $query->row();
	}
	
	public function prom_m_por_cc(){
		$tcc=$this->total_cc()->total;
		$tm=$this->total_m_cc()->total;
		if($tcc==0)
			return 0;
		else return ($tm/$tcc);
	}
	
	public function prom_h_por_cc(){
		$tcc=$this->total_cc()->total;
		$th=$this->total_h_cc()->total;
		if($tcc==0)
			return 0;
		else return ($th/$tcc);
	}


}

?>
