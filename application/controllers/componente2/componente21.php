<?php

/**
 * Controlador para componente 21
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  componente21 extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
    }
    
    public function cc() {

        $informacion['titulo'] = 'Consulta Ciudadana';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/cc_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function ccc_guia_socio_amb() {

        $informacion['titulo'] = 'Gu&iacute;a Socio-Ambiental CCC';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/ccc_guia_socioamb_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function ccc() {

        $informacion['titulo'] = 'Comite Contraluria Ciudadana';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/ccc_view');
        $this->load->view('plantilla/footer', $informacion);
    }
///////////////////////////////////////////////
public function cargar_cc($mun_id) {
          $data=array();
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $sql="select * from  cc where mun_id=?";
        $query = $this->db->query($sql,array($mun_id));
        
       foreach ($query->result() as $row)
   {
      $data['cc_id']= $row->cc_id;
      $data ['total_mujeres']= $row->total_mujeres;
      $data ['total_hombres']= $row->total_hombres;
      $data ['cc_lugar']= $row->cc_lugar;
      $data ['acta_final']= $row->acta_final;
      $data ['listado_asistencia']= $row->listado_asistencia;
      $data ['cc_fecha']= $row->cc_fecha;
      $data ['anexo8']= $row->anexo8;
     
   }
      
   echo json_encode($data);
  }     

///////////////////////////////////////////////
 public function cargarGeneralCcc($mun_id) {
          $data=array();
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $sql="select * from  ccc where mun_id=?";
        $query = $this->db->query($sql,array($mun_id));
        
       foreach ($query->result() as $row)
   {
      $data['ccc_id']= $row->ccc_id;
      $data ['total_mujeres']= $row->total_mujeres;
      $data ['total_hombres']= $row->total_hombres;
      $data ['mun_id']= $row->mun_id;
      $data ['lugar_conformacion']= $row->lugar_conformacion;
     
   }
      
   echo json_encode($data);
  }   
 public function guardarGeneralCcc(){
      if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
      $mun_id = $this->input->post("mun_id");
        $total_mujeres = $this->input->post("total_mujeres");
        $total_hombres = $this->input->post("total_hombres");
        $lugar_conformacion = $this->input->post("lugar_conformacion");
        $ccc_id=$this->input->post("ccc_id");
       
                
     $data = array(
         'mun_id'=>$mun_id,
         'total_mujeres'=>$total_mujeres,
         'total_hombres'=>$total_hombres,
         'lugar_conformacion'=>$lugar_conformacion,
     );
     if($ccc_id) {$this->db->where('ccc_id', $ccc_id);
                $this->db->update('ccc', $data); }
     else $this->db->insert('ccc', $data);
     
     $informacion['titulo'] = 'Comite Contraluria Ciudadana';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/ccc_view');
        $this->load->view('plantilla/footer', $informacion);
  }
 public function cargar_ccc_asis1($ccc_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
      
        $this->load->model('componente2/comp21_model');
        $notas = $this->comp21_model->obtenerCccAsis1($ccc_id);
        $numfilas = count($notas);
         if ($numfilas != 0) {
            $i = 0;
            foreach ($notas as $aux) {
                $rows[$i]['id'] = $aux->id_motivo_fecha;
                $rows[$i]['cell'] = array($aux->id_motivo_fecha,
                    $aux->motivo_fecha,
                    date('d-m-Y', strtotime($aux->fecha_conformacion)),
                    date('d-m-Y', strtotime($aux->fecha_induccion)),
                    date('d-m-Y', strtotime($aux->fecha_capacitacion))
                    
                );
                $i++;
            }
         
            array_multisort($rows, SORT_ASC);
        } else {
           $rows = array();
        }

          
        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }
   public function cargar_ccc_asis2($ccc_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
      
        $this->load->model('componente2/comp21_model');
        $notas = $this->comp21_model->obtenerCccAsis2($ccc_id);
        $numfilas = count($notas);
         if ($numfilas != 0) {
            $i = 0;
            foreach ($notas as $aux) {
                $rows[$i]['id'] = $aux->asis_ccc_id;
                $rows[$i]['cell'] = array($aux->asis_ccc_id,
                    $aux->nombre_asis,
                    $aux->responsabilidad,
                    $aux->sexo
                    
                    
                );
                $i++;
            }
         
            array_multisort($rows, SORT_ASC);
        } else {
           $rows = array();
        }

          
        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }
  public function cargar_ccc_asis3($ccc_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
      
        $this->load->model('componente2/comp21_model');
        $notas = $this->comp21_model->obtenerCccAsis3($ccc_id);
        $numfilas = count($notas);
         if ($numfilas != 0) {
            $i = 0;
            foreach ($notas as $aux) {
                $rows[$i]['id'] = $aux->id_proyecto;
                $rows[$i]['cell'] = array($aux->id_proyecto,
                    $aux->id_ccc,
                    $aux->nombre_proyecto,
                    $aux->tipo_proyecto,
                    $aux->num_comunidades,
                    $aux->comunidades
                    
                );
                $i++;
            }
         
            array_multisort($rows, SORT_ASC);
        } else {
           $rows = array();
        }

          
        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }
  
    public function cargar_cc_asis3($cc_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
      
        $this->load->model('componente2/comp21_model');
        $notas = $this->comp21_model->obtenerCcAsis3($cc_id);
        $numfilas = count($notas);
         if ($numfilas != 0) {
            $i = 0;
            foreach ($notas as $aux) {
                $rows[$i]['id'] = $aux->id_proy_cc;
                $rows[$i]['cell'] = array($aux->id_proy_cc,
                    $aux->cc_id,
                    $aux->nombre_proy,
                    $aux->tipo_proy,
                    $aux->ubicacion,
                    $aux->comunidades
                    
                );
                $i++;
            }
         
            array_multisort($rows, SORT_ASC);
        } else {
           $rows = array();
        }

          
        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }
    
   public function modificar_ccc_asis1($ccc_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $this->load->model('componente2/comp21_model');
        //$etm_id = $this->input->post("etm_id");
        $motivo_fecha = $this->input->post("motivo_fecha");
        $fecha_conformacion = $this->input->post("fecha_conformacion");
        $fecha_induccion = $this->input->post("fecha_induccion");
        $fecha_capacitacion = $this->input->post("fecha_capacitacion");
        $id_motivo_fecha = $this->input->post("id");

        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->comp21_model->agregarAsitencia1($ccc_id,$motivo_fecha,$fecha_capacitacion,$fecha_conformacion,$fecha_induccion);
                break;
            case 'edit':
                $this->comp21_model->actualizarAsistencia1($id_motivo_fecha,$motivo_fecha,$fecha_capacitacion,$fecha_conformacion,$fecha_induccion);
                break;
            case 'del':
                $this->comp21_model->eliminarAsistencia1($id_motivo_fecha);
                break;
        }
    } 
   public function modificar_ccc_asis2($ccc_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $this->load->model('componente2/comp21_model');
        //$etm_id = $this->input->post("etm_id");
        $asis_ccc_id = $this->input->post("id");
        $nombre_asis = $this->input->post("nombre_asis");
        $responsabilidad = $this->input->post("responsabilidad");
        $sexo = $this->input->post("sexo");
        
        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->comp21_model->agregarAsitenciaccc2($ccc_id,$nombre_asis,$responsabilidad,$sexo);
                break;
            case 'edit':
                $this->comp21_model->actualizarAsistenciaccc2($asis_ccc_id,$nombre_asis,$responsabilidad,$sexo);
                break;
            case 'del':
                $this->comp21_model->eliminarAsistenciaccc2($asis_ccc_id);
                break;
        }
    } 
    
    public function modificar_ccc_asis3($ccc_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $this->load->model('componente2/comp21_model');
        //$etm_id = $this->input->post("etm_id");
        $id_proyecto = $this->input->post("id");
//        $id_ccc = $this->input->post("id_ccc");
        $nombre_proyecto = $this->input->post("nombre_proyecto");
        $tipo_proyecto = $this->input->post("tipo_proyecto");
        $num_comunidades = $this->input->post("num_comunidades");
        $comunidades = $this->input->post("comunidades");
        
        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->comp21_model->agregarAsitenciaccc3($ccc_id,$nombre_proyecto,$tipo_proyecto,$num_comunidades,$comunidades);
                break;
            case 'edit':
                $this->comp21_model->actualizarAsistenciaccc3($id_proyecto,$nombre_proyecto,$tipo_proyecto,$num_comunidades,$comunidades);
                break;
            case 'del':
                $this->comp21_model->eliminarAsistenciaccc3($id_proyecto);
                break;
        }
    } 
      public function modificar_cc_asis3($cc_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $this->load->model('componente2/comp21_model');
        $id_proy_cc = $this->input->post("id");
        $nombre_proy = $this->input->post("nombre_proy");
        $tipo_proy = $this->input->post("tipo_proy");
        $ubicacion = $this->input->post("ubicacion");
        $comunidades = $this->input->post("comunidades");
        
        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->comp21_model->agregarAsitenciacc3($cc_id,$nombre_proy,$tipo_proy,$ubicacion,$comunidades);
                break;
            case 'edit':
                $this->comp21_model->actualizarAsistenciacc3($id_proy_cc,$nombre_proy,$tipo_proy,$ubicacion,$comunidades);
                break;
            case 'del':
                $this->comp21_model->eliminarAsistenciacc3($id_proy_cc);
                break;
        }
    } 
///////////////////////////////////////////////
    
    public function cargarGeneralEtm($mun_id) {
          $data=array();
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $sql="select * from  etm where mun_id=?";
        $query = $this->db->query($sql,array($mun_id));
        
       foreach ($query->result() as $row)
   {
      $data['etm_id']= $row->etm_id;
      $data ['total_mujeres']= $row->total_mujeres;
      $data ['total_hombres']= $row->total_hombres;
      $data ['mun_id']= $row->mun_id;
      $data ['lugar_conformacion']= $row->lugar_conformacion;
     
   }
      
   echo json_encode($data);
  }
  public function guardarGeneralEtm(){
      if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
      $mun_id = $this->input->post("mun_id");
        $total_mujeres = $this->input->post("total_mujeres");
        $total_hombres = $this->input->post("total_hombres");
        $lugar_conformacion = $this->input->post("lugar_conformacion");
        $etm_id=$this->input->post("etm_id");
       
                
     $data = array(
      'mun_id'=>$mun_id,
         'total_mujeres'=>$total_mujeres,
         'total_hombres'=>$total_hombres,
         'lugar_conformacion'=>$lugar_conformacion,
     );
     if($etm_id) {$this->db->where('etm_id', $etm_id);
                $this->db->update('etm', $data); }
     else $this->db->insert('etm', $data);
     
     $informacion['titulo'] = 'Equipo Tecnico Municipal';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/etm_view');
        $this->load->view('plantilla/footer', $informacion);
  }
  
   public function cargar_etm_asis($etm_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
      
        $this->load->model('componente2/comp21_model');
        $notas = $this->comp21_model->obtenerEtmAsis($etm_id);
        $numfilas = count($notas);
         if ($numfilas != 0) {
            $i = 0;
            foreach ($notas as $aux) {
                $rows[$i]['id'] = $aux->id_motivo_fecha;
                $rows[$i]['cell'] = array($aux->id_motivo_fecha,
                    $aux->motivo_fecha,
                    date('d-m-Y', strtotime($aux->fecha_conformacion)),
                    date('d-m-Y', strtotime($aux->fecha_induccion)),
                    date('d-m-Y', strtotime($aux->fecha_capacitacion))
                    
                );
                $i++;
            }
         
            array_multisort($rows, SORT_ASC);
        } else {
           $rows = array();
        }

          
        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }
  
    public function modificar_etm_asis($etm_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $this->load->model('componente2/comp21_model');
        //$etm_id = $this->input->post("etm_id");
        $motivo_fecha = $this->input->post("motivo_fecha");
        $fecha_conformacion = $this->input->post("fecha_conformacion");
        $fecha_induccion = $this->input->post("fecha_induccion");
        $fecha_capacitacion = $this->input->post("fecha_capacitacion");
        $id_motivo_fecha = $this->input->post("id");

        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->comp21_model->agregarAsitencia($etm_id,$motivo_fecha,$fecha_capacitacion,$fecha_conformacion,$fecha_induccion);
                break;
            case 'edit':
                $this->comp21_model->actualizarAsistencia($id_motivo_fecha,$motivo_fecha,$fecha_capacitacion,$fecha_conformacion,$fecha_induccion);
                break;
            case 'del':
                $this->comp21_model->eliminarAsistencia($id_motivo_fecha);
                break;
        }
    }
//¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡

       public function cargar_etm_asis2($etm_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
      
        $this->load->model('componente2/comp21_model');
        $notas = $this->comp21_model->obtenerEtmAsis2($etm_id);
        $numfilas = count($notas);
         if ($numfilas != 0) {
            $i = 0;
            foreach ($notas as $aux) {
                $rows[$i]['id'] = $aux->asis_etm_id;
                $rows[$i]['cell'] = array($aux->asis_etm_id,
                    $aux->nombre_asis,
                    $aux->responsabilidad,
                    $aux->sexo
                    
                );
                $i++;
            }
         
            array_multisort($rows, SORT_ASC);
        } else {
           $rows = array();
        }

          
        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }
  
    public function modificar_etm_asis2($etm_id) {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $this->load->model('componente2/comp21_model');
        //$etm_id = $this->input->post("etm_id");
        $asis_etm_id = $this->input->post("id");
        $nombre_asis = $this->input->post("nombre_asis");
        $responsabilidad = $this->input->post("responsabilidad");
        $sexo = $this->input->post("sexo");
        
        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->comp21_model->agregarAsitencia2($etm_id,$nombre_asis,$responsabilidad,$sexo);
                break;
            case 'edit':
                $this->comp21_model->actualizarAsistencia2($asis_etm_id,$nombre_asis,$responsabilidad,$sexo);
                break;
            case 'del':
                $this->comp21_model->eliminarAsistencia2($asis_etm_id);
                break;
        }
    }
    
    
    
    //**************************************************************
    public function etm() {

        $informacion['titulo'] = 'Equipo Tecnico Municipal';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/etm_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    

     
      
    ///***************************************************************************/

    public function comi() {

        $informacion['titulo'] = 'Comision de Mantenimiento';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/comi_view');
        $this->load->view('plantilla/footer', $informacion);
    }


    
    public function guardar_comi() {

        $datos_comi = $_POST;
		unset($datos_comi['guardar']);
		
		$this->load->model('componente2/comp21_model');
		$this->comp21_model->insertar_comi($datos_comi);
		
		$informacion['titulo'] = 'Comision de Mantenimiento';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete de la CM.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente2/comi_view');
			$this->load->view('plantilla/footer', $informacion);
		
	}

    //************************************************************
     public function guardar_cc() {
if (!$this->tank_auth->is_logged_in())
            redirect('/auth');
        $mun_id = $this->input->post("mun_id");
        $total_mujeres = $this->input->post("total_mujeres");
        $total_hombres = $this->input->post("total_hombres");
        $cc_lugar = $this->input->post("cc_lugar");
        $cc_id=$this->input->post("cc_id");
        $listado_asistencia=$this->input->post("listado_asistencia");
        $acta_final=$this->input->post("acta_final");
        $anexo8=$this->input->post("anexo8");
        $cc_fecha=$this->input->post("cc_fecha");
       
        if ($listado_asistencia == ""){ $listado_asistencia = null;}
        if ($anexo8 == "") {$anexo8 = null;}
        if ($acta_final == "") {$acta_final = null;}
        
        $data = array(
         'mun_id'=>$mun_id,
         'total_mujeres'=>$total_mujeres,
         'total_hombres'=>$total_hombres,
         'cc_lugar'=>$cc_lugar,
         'listado_asistencia'=>$listado_asistencia,
         'acta_final'=>$acta_final,
         'anexo8'=>$anexo8,
         'cc_fecha'=>$cc_fecha,
     );
     if($cc_id) {$this->db->where('cc_id', $cc_id);
                $this->db->update('cc', $data); }
     else $this->db->insert('cc', $data);
     
     $informacion['titulo'] = 'Consulta Ciudadana';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/cc_view');
        $this->load->view('plantilla/footer', $informacion);
        
			
	}
	
//******************************************	
	public function guardar_ccc() {

        $datos_ccc = $_POST;
		unset($datos_ccc['guardar']);
		
		$this->load->model('componente2/comp21_model');
		$this->comp21_model->insertar_ccc($datos_ccc);
		
		$informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente2/ccc_view');
			$this->load->view('plantilla/footer', $informacion);
		
	}
	
	public function guardar_info_guia(){
		$datos_guia = $_POST;
		unset($datos_guia['guardar']);
		
		$this->load->model('componente2/comp21_model');
		$this->comp21_model->insertar_guia($datos_guia);
		
		$informacion['titulo'] = 'Gu&iacute;a Socio-Ambiental CCC';
		$informacion['user_id'] = $this->tank_auth->get_user_id();
		$informacion['username'] = $this->tank_auth->get_username();
		$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
		$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete.</p>';         
		$this->load->view('plantilla/header', $informacion);
		$this->load->view('plantilla/menu', $informacion);
		$this->load->view('componente2/ccc_guia_socioamb_view', $informacion);
		$this->load->view('plantilla/footer', $informacion);
	}
	
	public function reportes_comp21_ccc() {

        $informacion['titulo'] = 'Reportes Componente 2.1 CCC';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/reportes_comp21_ccc_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function reportes_comp21_cc() {

        $informacion['titulo'] = 'Reportes Componente 2.1 CC';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/reportes_comp21_cc_view');
        $this->load->view('plantilla/footer', $informacion);
    }
	
	public function reporte_ccc_por_region(){
		/*Inicio*/
		$this->load->library('PHPExcel');
		$this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('Reporte General CCC');
        
        /*Definicion de Estilos de Celdas*/
        $estTitulos = array(
            'font' => array('bold' => true, 'size' => 11, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'C5E0EB')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estSubTitulos = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E0F3FC')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
         $estEncabezado = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E6E6F0')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estCells = array(
            'font' => array('size' => 10, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        /*Reporte*/
        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'Resumen General por Area Geografica');
        $this->phpexcel->getActiveSheet()->mergeCells('D2:J2');
        $this->phpexcel->getActiveSheet()->getStyle('D2:J2')->applyFromArray($estTitulos);
        $this->phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
        
					/*CCC por departamento*/
        $this->phpexcel->getActiveSheet()->setCellValue('A3', 'Por Departamento');
        $this->phpexcel->getActiveSheet()->getStyle('A3:A3')->applyFromArray($estSubTitulos);
        
        $this->phpexcel->getActiveSheet()->setCellValue('B4', 'Departamento');
        $this->phpexcel->getActiveSheet()->setCellValue('C4', 'ETM');
        $this->phpexcel->getActiveSheet()->setCellValue('D4', 'CCC');
        $this->phpexcel->getActiveSheet()->setCellValue('E4', 'CM');
        $this->phpexcel->getActiveSheet()->getStyle('B4:E4')->applyFromArray($estEncabezado);
        
        $this->load->model('componente2/comp21_model');
        $consulta = $this->comp21_model->etm_por_depto();
        $i=5;
        foreach ($consulta as $row) {
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", $row->depto);//imprime los deptos
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);//imprime la cant de CCC del depto
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B5:D$i")->applyFromArray($estCells);
        /*CCC por Departamento*/
        $consulta = $this->comp21_model->ccc_por_depto();
        $i=5;
        foreach ($consulta as $row) {
		$this->phpexcel->getActiveSheet()->setCellValue("D$i", $row->cant);//imprime la cant de CCC del depto
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B5:E$i")->applyFromArray($estCells);
        
        
        
        $consulta2 = $this->comp21_model->comi_por_depto();
        $i2=5;
        foreach ($consulta2 as $row) {
		$this->phpexcel->getActiveSheet()->setCellValue("E$i2", $row->cant);//imprime la cant de CCC del depto
            $i2++;
		}
        
        /*Termina por departamentos*/
				/*CCC por Region*/
		$i=$i+4;
		$this->phpexcel->getActiveSheet()->setCellValue('A20', 'Por Region');
        $this->phpexcel->getActiveSheet()->getStyle('A20:A20')->applyFromArray($estSubTitulos);
        
        $this->phpexcel->getActiveSheet()->setCellValue('B21', 'Region');
        $this->phpexcel->getActiveSheet()->setCellValue('C21', 'ETM');
        $this->phpexcel->getActiveSheet()->setCellValue('D21', 'CCC');
        $this->phpexcel->getActiveSheet()->setCellValue('E21', 'CM');
        $this->phpexcel->getActiveSheet()->getStyle('B21:E21')->applyFromArray($estEncabezado);
        
        $consulta = $this->comp21_model->etm_por_region();
        foreach ($consulta as $row) {
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", $row->reg);//imprime la region
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->suma);//imprime las cant de CCC de la region
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("C22:D$i")->applyFromArray($estCells);
        
        $consulta1 = $this->comp21_model->ccc_por_region();
        $ii=22;
        foreach ($consulta1 as $row) {
		$this->phpexcel->getActiveSheet()->setCellValue("D$ii", $row->suma);//imprime la cant de CCC del depto
            $ii++;
		}
		$ii--;
        $this->phpexcel->getActiveSheet()->getStyle("B5:E$ii")->applyFromArray($estCells);
        
        
        
        
        $consulta3 = $this->comp21_model->comi_por_region();
        $i3=22;
        foreach ($consulta3 as $row) {
		$this->phpexcel->getActiveSheet()->setCellValue("E$i3", $row->suma);//imprime la cant de CCC del depto
            $i3++;
		}
        /*Finalizacion y Descarga*/
        $filename = "RepteGral_CCC_Area_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
	}
    
    public function reporte_ccc_por_muni(){
		/*Inicio*/
		$this->load->library('PHPExcel');
		$this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('Reporte General CCC');
        
        /*Definicion de Estilos de Celdas*/
        $estTitulos = array(
            'font' => array('bold' => true, 'size' => 11, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'C5E0EB')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estSubTitulos = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E0F3FC')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
         $estEncabezado = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E6E6F0')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estCells = array(
            'font' => array('size' => 10, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        /*Reporte*/
        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'Comites de Contraloria Ciudadana por Municipio');
        $this->phpexcel->getActiveSheet()->mergeCells('D2:J2');
        $this->phpexcel->getActiveSheet()->getStyle('D2:J2')->applyFromArray($estTitulos);
        $this->phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
        
					/*CCC por Municipio*/
        
        $this->phpexcel->getActiveSheet()->setCellValue('A4', 'Departamento');
        $this->phpexcel->getActiveSheet()->setCellValue('B4', 'Municipio');
        $this->phpexcel->getActiveSheet()->setCellValue('C4', 'ETM');
        $this->phpexcel->getActiveSheet()->setCellValue('d4', 'CCC');
        $this->phpexcel->getActiveSheet()->setCellValue('e4', 'CM');
        $this->phpexcel->getActiveSheet()->getStyle('A4:e4')->applyFromArray($estSubTitulos);
        
        $this->load->model('componente2/comp21_model');
        $deptos = $this->comp21_model->get_deptos();
        $i=5;
        foreach ($deptos as $row) {
			$inicial=$i;
			$this->phpexcel->getActiveSheet()->setCellValue("A$i", $row->dep_nombre);//imprime el depto
            $munic = $this->comp21_model->muni_depto($row->dep_id);
            foreach($munic as $mun){
				$etm_muni = $this->comp21_model->etm_por_muni($mun->mun_id);
                                $ccc_muni = $this->comp21_model->ccc_por_muni($mun->mun_id);
                                $cm_muni = $this->comp21_model->cm_por_muni($mun->mun_id);
                                
				$this->phpexcel->getActiveSheet()->setCellValue("B$i", $mun->mun_nombre);//imprime el municipio
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $etm_muni->cant);//imprime la cant de ccc del municipio
                                $this->phpexcel->getActiveSheet()->setCellValue("d$i", $ccc_muni->cant);
                                $this->phpexcel->getActiveSheet()->setCellValue("e$i", $cm_muni->cant);
				$i++;
			}
			$final=$i-1;
			$this->phpexcel->getActiveSheet()->mergeCells("A$inicial".":"."A$final");
            //$i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("A5:e$i")->applyFromArray($estCells);
        
        /*Finalizacion y Descarga*/
        $filename = "RepteGral_CCC_Muni_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
	}
	
	public function reporte_gral_cc(){
		/*Inicio*/
		$this->load->library('PHPExcel');
		$this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('Reporte General');
        
        /*Definicion de Estilos de Celdas*/
        $estTitulos = array(
            'font' => array('bold' => true, 'size' => 11, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'C5E0EB')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estSubTitulos = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E0F3FC')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
         $estEncabezado = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E6E6F0')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estCells = array(
            'font' => array('size' => 10, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        /*Reporte*/
        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'Componente 2.1 - Reporte Gral Consultas Ciudadanas');
        $this->phpexcel->getActiveSheet()->mergeCells('D2:J2');
        $this->phpexcel->getActiveSheet()->getStyle('D2:J2')->applyFromArray($estTitulos);

        $this->phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
        
					/*CCC por departamento*/
        $this->phpexcel->getActiveSheet()->setCellValue('A3', 'Por Departamento');
        $this->phpexcel->getActiveSheet()->getStyle('A3:A3')->applyFromArray($estSubTitulos);
        
        $this->phpexcel->getActiveSheet()->setCellValue('B4', 'Departamento');
        $this->phpexcel->getActiveSheet()->setCellValue('C4', 'Cantidad CC');
        $this->phpexcel->getActiveSheet()->setCellValue('D4', '%');
        $this->phpexcel->getActiveSheet()->setCellValue('E4', 'SubProyectos CC');
        $this->phpexcel->getActiveSheet()->getStyle('B4:E4')->applyFromArray($estEncabezado);
        
        $this->load->model('componente2/comp21_model');
        $consulta = $this->comp21_model->proy_cc_por_depto();
        $total=0;
        foreach ($consulta as $row){
			$total=$total+$row->cant;
		}
		if ($total==0) 
			$total=1;
        $i=5;
        foreach ($consulta as $row) {
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", $row->depto);//imprime los deptos
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);//imprime la cant de CC del depto
            $this->phpexcel->getActiveSheet()->setCellValue("D$i", (round((($row->cant / $total)*100),2)));
            if(!($row->n))
				$row->n=0;
            $this->phpexcel->getActiveSheet()->setCellValue("E$i", $row->n);
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B5:E$i")->applyFromArray($estCells);
        
				/*CCC por Region*/
		$i=$i+4;
		$this->phpexcel->getActiveSheet()->setCellValue('A20', 'Por Region');
        $this->phpexcel->getActiveSheet()->getStyle('A20:A20')->applyFromArray($estSubTitulos);
        
        $this->phpexcel->getActiveSheet()->setCellValue('B21', 'Region');
        $this->phpexcel->getActiveSheet()->setCellValue('C21', 'Cantidad');
        $this->phpexcel->getActiveSheet()->setCellValue('D21', '%');
        $this->phpexcel->getActiveSheet()->setCellValue('E21', 'SubProyectos CC');
        $this->phpexcel->getActiveSheet()->getStyle('B21:E21')->applyFromArray($estEncabezado);
        
        $consulta = $this->comp21_model->proy_cc_por_region();
        $total=0;
        foreach ($consulta as $row){
			$total=$total+$row->suma;
		}
		if ($total==0) 
			$total=1;
        foreach ($consulta as $row) {
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", $row->reg);//imprime la region
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->suma);//imprime las cant de CC de la region
            $this->phpexcel->getActiveSheet()->setCellValue("D$i", (round((($row->suma / $total)*100),2)));
            if(!($row->nproy))
				$row->nproy=0;
            $this->phpexcel->getActiveSheet()->setCellValue("E$i", $row->nproy);
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B22:E$i")->applyFromArray($estCells);
        
        $i=$i+2;
        $this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Indicadores');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estSubTitulos);
        $i++;
        
        $this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Monto SubProyectos CC');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estEncabezado);
        
			$mtcc=$this->comp21_model->monto_total_proy_cc();
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:H$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "El monto total de los SubProyectos de CC asciende a: $".$mtcc->mtotal);
			$this->phpexcel->getActiveSheet()->getStyle("B$i:H$i")->applyFromArray($estCells);
			$i++;
			
		$this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Comunidades Beneficiadas');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estEncabezado);
        
			$comben=$this->comp21_model->total_combeneficiadas_proy_cc();
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:H$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "El numero aproximado de comunidades beneficiadas de los SubProyectos de CC asciende a: $".$comben->comtotal);
			$this->phpexcel->getActiveSheet()->getStyle("B$i:H$i")->applyFromArray($estCells);
			$i++;
			
		$this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Tipos de SubProyecto');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estEncabezado);
        
			$t1=$this->comp21_model->total_proy();
			$t2=$this->comp21_model->total_tipo_proy('Nuevo Subproyecto');
			if($t1->totalp==0)
				$t1->totalp=1;
			$ts=round((($t2->total / $t1->totalp)*100),2);
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:H$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "El ".$ts."% de los SubProyectos son de tipo 'Nuevo' mientras que el ".(100-$ts)."% son de tipo 'Cambio'");
			$this->phpexcel->getActiveSheet()->getStyle("B$i:H$i")->applyFromArray($estCells);
			$i++;
		
		$this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Genero');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estEncabezado);
        
			$t1=$this->comp21_model->total_h_cc();
			$t2=$this->comp21_model->total_m_cc();
			$thm=$t1->total+$t2->total;
			$th=round((($t1->total / $thm)*100),2);
			
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:H$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "El ".$th."% de los asistentes a CC son Hombres, mientras que el ".(100-$th)."% son Mujeres");
			$this->phpexcel->getActiveSheet()->getStyle("B$i:H$i")->applyFromArray($estCells);
			$i++;
        
			$t1=round($this->comp21_model->prom_h_por_cc(),2);
			$t2=round($this->comp21_model->prom_m_por_cc(),2);
			
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:H$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "Por cada CC, en promedio asisten: $t1 Hombres y $t2 Mujeres");
			$this->phpexcel->getActiveSheet()->getStyle("B$i:H$i")->applyFromArray($estCells);
			
        /*Finalizacion y Descarga*/
        $filename = "RepteGral_CC" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
	}
}
?>
