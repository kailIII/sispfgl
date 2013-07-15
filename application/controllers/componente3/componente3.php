<?php

/**
 * Controlador para componente 3
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  componente3 extends CI_Controller {
	
	public function index() {

    }
	
    public function diag_sect_anal_tran() {

        $informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_dsat');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function form_conc_disc_poli() {

        $informacion['titulo'] = '3.2.1 Formacion de Concenso y Discusion de la Politica de Descentralizacion';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_fcdp');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function elab_plan_imp() {

        $informacion['titulo'] = '3.2.2 Elaboracion del Plan Piloto';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_epi');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function divu() {

        $informacion['titulo'] = '3.3 Divulgaci&oacute;n';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_divu');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function docs_desc() {

        $informacion['titulo'] = 'Documentos Concernientes a Descentralizaci&oacute;n';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_dd');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function reporte_estado_comp3() {
		
		$this->load->model('componente3/componente3_model');
		$estado = $this->componente3_model->get_estado_comp3();
		
        $informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
        //$informacion['user_id'] = $this->tank_auth->get_user_id();
        //$informacion['username'] = $this->tank_auth->get_username();
        //$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/reporte_estado_comp3_view',$estado);
        $this->load->view('plantilla/footer', $informacion);
    }
    
    
    public function guardar_dsat() {

        $datos_dsat = $_POST;
		unset($datos_dsat['guardar']);
		
		//configuracion del archivo adjunto a subir
		$config['upload_path'] = 'documentos/dsat/';
		$config['allowed_types'] = 'doc|docx|pdf|rtf';
		$config['max_size']	= '2048';
		
		if ($datos_dsat['adjunto']=='si')
		{
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('archivo_reporte'))//retorna falso si hubo un error y entonces entra al if
		{
			$error_upload = $this->upload->display_errors('<p style="color:red">Error: ', '</p>');
			$informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = $error_upload; 
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_dsat',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		}
		else
		{
			$datos_arch = $this->upload->data();
			$ruta=$config['upload_path'].$datos_arch['file_name'];
			
			$this->load->model('componente3/componente3_model');
			$this->componente3_model->insertar_dsat($datos_dsat,$ruta);				
			
			$informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_dsat',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		
		}
		
	}
	else{
		$ruta=null;
			
			$this->load->model('componente3/componente3_model');
			$this->componente3_model->insertar_dsat($datos_dsat,$ruta);				
			
			$informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_dsat',$informacion);
			$this->load->view('plantilla/footer', $informacion);
			
	}
	
		//$prueba=$this->componente3_model->insertar_dsat($datos_dsat);
		//for($i=0;$i<2;$i++)
		//	echo $prueba[$i]['sec_id'];
		
    }
    
    public function guardar_fcdp() {

        $datos_fcdp = $_POST;
		unset($datos_fcdp['guardar']);
		
		//configuracion del archivo adjunto a subir
		$config['upload_path'] = 'documentos/fcdp/';
		$config['allowed_types'] = 'doc|docx|pdf|rtf';
		$config['max_size']	= '2048';
		
		if ($datos_fcdp['adjunto']=='si')
		{
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('archivo_reporte'))//retorna falso si hubo un error y entonces entra al if
		{
			$error_upload = $this->upload->display_errors('<p style="color:red">Error: ', '</p>');
			$informacion['titulo'] = '3.2.1 Formacion de Concenso y Discusion de la Politica de Descentralizacion';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = $error_upload;         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_fcdp',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		}
		else
		{
			$datos_arch = $this->upload->data();
			$ruta=$config['upload_path'].$datos_arch['file_name'];
			
			$this->load->model('componente3/componente3_model');
			$this->componente3_model->insertar_fcdp($datos_fcdp,$ruta);				
			
			$informacion['titulo'] = '3.2.1 Formacion de Concenso y Discusion de la Politica de Descentralizacion';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_fcdp',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		
		}
	}
	else{
		$ruta=null;
		
		$this->load->model('componente3/componente3_model');
			$this->componente3_model->insertar_fcdp($datos_fcdp,$ruta);				
			
			$informacion['titulo'] = '3.2.1 Formacion de Concenso y Discusion de la Politica de Descentralizacion';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_fcdp',$informacion);
			$this->load->view('plantilla/footer', $informacion);
	}
		//$prueba=$this->componente3_model->insertar_dsat($datos_dsat);
		//for($i=0;$i<2;$i++)
		//	echo $prueba[$i]['sec_id'];
		
    }
    
    public function guardar_epi() {

        $datos_epi = $_POST;
		unset($datos_epi['guardar']);
		
			
			$this->load->model('componente3/componente3_model');
			$r=$this->componente3_model->insertar_epi($datos_epi);
							
			if(!$r)
				$informacion['aviso'] = '<p style="color:red">Error al tratar ingresar el registro.</p>';
			else
				$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';
				
			$informacion['titulo'] = '3.2.2 Elaboracion del Plan Piloto';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_epi',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		
		
		//$prueba=$this->componente3_model->insertar_epi($datos_epi);
		//for($i=0;$i<2;$i++)
		//	echo $prueba[$i]['sec_id'];
		
    }
    
    public function guardar_dd() {

        $datos_dd = $_POST;
		unset($datos_dd['guardar']);
		
		//configuracion del archivo adjunto a subir
		$config['upload_path'] = 'documentos/dd/';
		$config['allowed_types'] = 'doc|docx|pdf|rtf';
		$config['max_size']	= '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('archivo_ejec'))//retorna falso si hubo un error y entonces entra al if
		{
			$error_upload = $this->upload->display_errors('<p style="color:red">Error en archivo resumen: ', '</p>');
			$informacion['titulo'] = 'Documentos Concernientes a Descentralizaci&oacute;n';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = $error_upload; 
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente3/ingresar_dd',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		}
		else{
			$datos_arch1 = $this->upload->data();
			if ( ! $this->upload->do_upload('archivo_comp'))//retorna falso si hubo un error y entonces entra al if
				{
					$error_upload = $this->upload->display_errors('<p style="color:red">Error en archivo completo: ', '</p>');
					$informacion['titulo'] = 'Documentos Concernientes a Descentralizaci&oacute;n';
					$informacion['user_id'] = $this->tank_auth->get_user_id();
					$informacion['username'] = $this->tank_auth->get_username();
					$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
					$informacion['aviso'] = $error_upload; 
					$this->load->view('plantilla/header', $informacion);
					$this->load->view('plantilla/menu', $informacion);
					$this->load->view('componente3/ingresar_dd',$informacion);
					$this->load->view('plantilla/footer', $informacion);
				}
			else
				{
					$datos_arch2 = $this->upload->data();
					
					$ruta1=$config['upload_path'].$datos_arch1['file_name'];
					$ruta2=$config['upload_path'].$datos_arch2['file_name'];
					
					$this->load->model('componente3/componente3_model');
					$this->componente3_model->insertar_dd($datos_dd,$ruta1,$ruta2);				
					
					$informacion['titulo'] = 'Documentos Concernientes a Descentralizaci&oacute;n';
					$informacion['user_id'] = $this->tank_auth->get_user_id();
					$informacion['username'] = $this->tank_auth->get_username();
					$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
					$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';         
					$this->load->view('plantilla/header', $informacion);
					$this->load->view('plantilla/menu', $informacion);
					$this->load->view('componente3/ingresar_dd',$informacion);
					$this->load->view('plantilla/footer', $informacion);
				
				}
		}
		//$prueba=$this->componente3_model->insertar_dd($datos_dd);
		//for($i=0;$i<2;$i++)
		//	echo $prueba[$i]['sec_id'];
		
    }
    
    public function cargarMunicipios() {
       $dep_id = $this->input->get("dep_id");
        $this->load->model('pais/municipio', 'mun');
        $municipios = $this->mun->obtenerMunicipioPorDepartamento($dep_id);
       
        $numfilas = count($municipios);

        $i = 0;
        foreach ($municipios as $aux) {
            $rows[$i]['id'] = $aux->mun_id;
            $rows[$i]['cell'] = array($aux->mun_id,
                $aux->mun_nombre
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            $rows[0]['id'] = 0;
            $rows[0]['cell'] = array(' ', ' ');
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
    
    public function cargar_act_divu() {
        $this->load->model('componente3/componente3_model');
        $actividades = $this->componente3_model->get_actividades_divu();
        $numfilas = count($actividades);

        $i = 0;
        foreach ($actividades as $aux) {
            $rows[$i]['id'] = $aux->divu_id;
            $rows[$i]['cell'] = array($aux->divu_id,
                $aux->divu_nombre,
                $aux->divu_fecha,
                $aux->divu_tipo,
                $aux->divu_responsable,
                $this->componente3_model->get_depto_nombre($aux->divu_municipio),
                $this->componente3_model->get_mun_nombre($aux->divu_municipio)
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            //$rows[0]['id'] = 0;
           // $rows[0]['cell'] = array('0', ' ', ' ', ' ', ' ', ' ');
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
    
    public function guardar_divu() {
        
        $act_nombre = $this->input->post("act_nombre");
        $act_fecha = $this->input->post("act_fecha");
        $act_tipo = strtoupper($this->input->post("act_tipo"));
        $act_responsable = $this->input->post("act_responsable");
        $act_mun = $this->input->post("act_mun");
        $operacion = $this->input->post('oper');

        $this->load->model('componente3/componente3_model');
        $this->componente3_model->insertar_divu($act_nombre, $act_fecha, $act_tipo, $act_responsable, $act_mun);

    }
    
    public function cargarAsistentes_divu($divu_id) {
		if(!isset($divu_id))
			$divu_id='';
        $this->load->model('componente3/componente3_model');
        $asistentes = $this->componente3_model->get_asistentes_divu($divu_id);
        $numfilas = count($asistentes);

        $i = 0;
        foreach ($asistentes as $aux) {
            $rows[$i]['id'] = $aux->asis_id;
            $rows[$i]['cell'] = array($aux->asis_id,
                $aux->asis_nombre,
                $aux->asis_sexo,
                $aux->asis_cargo,
                $aux->asis_sector
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            //$rows[0]['id'] = 0;
           // $rows[0]['cell'] = array('0', ' ', ' ', ' ', ' ', ' ');
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
    
    
    public function guardar_asis_divu() {
        
        $asis_nombre = $this->input->post("par_nombre");
        $asis_sexo = $this->input->post("par_sexo");
        $asis_sector = strtoupper($this->input->post("par_sector"));
        $asis_cargo = $this->input->post("par_cargo");
        $divu_id = $this->input->post("act_id");
        
        $this->load->model('componente3/componente3_model');
        $this->componente3_model->insertar_asis_divu($asis_nombre, $asis_sexo, $asis_sector, $asis_cargo, $divu_id);

    }
    
    public function cargarAsistentes_dsat($dsat_id) {
        if(!isset($dsat_id))
			$dsat_id='';
        $this->load->model('componente3/componente3_model');
        $asistentes = $this->componente3_model->get_asistentes_dsat($dsat_id);
        $numfilas = count($asistentes);

        $i = 0;
        foreach ($asistentes as $aux) {
            $rows[$i]['id'] = $aux->asis_id;
            $rows[$i]['cell'] = array($aux->asis_id,
                $aux->asis_nombre,
                $aux->asis_sexo,
                $aux->asis_cargo,
                $aux->asis_sector
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            //$rows[0]['id'] = 0;
           // $rows[0]['cell'] = array('0', ' ', ' ', ' ', ' ', ' ');
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
    
     public function diag_sect_anal_tran_ssdt() {

        $informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_dsat_ssdt');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function form_conc_disc_poli_ssdt() {

        $informacion['titulo'] = '3.2.1 Formacion de Concenso y Discusion de la Politica de Descentralizacion';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_fcdp_ssdt');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function elab_plan_imp_ssdt() {

        $informacion['titulo'] = '3.2.2 Elaboracion del Plan Piloto';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_epi_ssdt');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function divu_ssdt() {

        $informacion['titulo'] = '3.3 Divulgaci&oacute;n';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_divu_ssdt');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function docs_desc_ssdt() {

        $informacion['titulo'] = 'Documentos Concernientes a Descentralizaci&oacute;n';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());                 
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_dd_ssdt');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function cargar_act_dsat(){
		$this->load->model('componente3/componente3_model');
        $actividades = $this->componente3_model->get_actividades_dsat();
        $numfilas = count($actividades);

        $i = 0;
        foreach ($actividades as $aux) {
            
            if($aux->dsat_archivo!='')
				$arch='<a href="'.base_url().''.$aux->dsat_archivo.'">Descargar</a>';
            else $arch='No disponible';
            
            $rows[$i]['id'] = $aux->dsat_id;
            $rows[$i]['cell'] = array($aux->dsat_id,
                $aux->dsat_fecha,
                $aux->dsat_actividad,
                $this->componente3_model->get_sectores_dsat($aux->dsat_id),
                $this->componente3_model->get_mun_nombre($aux->dsat_municipio),
                $aux->dsat_observaciones,
                $arch
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            //$rows[0]['id'] = 0;
           // $rows[0]['cell'] = array('0', ' ', ' ', ' ', ' ', ' ');
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
	
	public function cargar_act_fcdp(){
		$this->load->model('componente3/componente3_model');
        $actividades = $this->componente3_model->get_actividades_fcdp();
        $numfilas = count($actividades);

        $i = 0;
        foreach ($actividades as $aux) {
            
            if($aux->fcdp_archivo!='')
				$arch='<a href="'.base_url().''.$aux->fcdp_archivo.'">Descargar</a>';
            else $arch='No disponible';
            
            $rows[$i]['id'] = $aux->fcdp_id;
            $rows[$i]['cell'] = array($aux->fcdp_id,
                $aux->fcdp_fecha,
                $aux->fcdp_tematica,
                $aux->fcdp_ultima,
                $aux->fcdp_observaciones,
                $arch
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            //$rows[0]['id'] = 0;
           // $rows[0]['cell'] = array('0', ' ', ' ', ' ', ' ', ' ');
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
    
    
    public function cargarAsistentes_fcdp($fcdp_id) {
        if(!isset($fcdp_id))
			$fcdp_id='';
        $this->load->model('componente3/componente3_model');
        $asistentes = $this->componente3_model->get_asistentes_fcdp($fcdp_id);
        $numfilas = count($asistentes);

        $i = 0;
        foreach ($asistentes as $aux) {
            $rows[$i]['id'] = $aux->asis_id;
            $rows[$i]['cell'] = array($aux->asis_id,
                $aux->asis_nombre,
                $aux->asis_sexo,
                $aux->asis_cargo,
                $aux->asis_sector
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            //$rows[0]['id'] = 0;
           // $rows[0]['cell'] = array('0', ' ', ' ', ' ', ' ', ' ');
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
    
    public function cargar_dd(){
		$this->load->model('componente3/componente3_model');
        $actividades = $this->componente3_model->get_dd();
        $numfilas = count($actividades);

        $i = 0;
        foreach ($actividades as $aux) {
            
            if($aux->dd_archivo_resumen!='')
				$arch1='<a href="'.base_url().''.$aux->dd_archivo_resumen.'">Descargar</a>';
            else $arch1='No disponible';
            
            if($aux->dd_archivo_completo!='')
				$arch2='<a href="'.base_url().''.$aux->dd_archivo_completo.'">Descargar</a>';
            else $arch2='No disponible';
            
            $rows[$i]['id'] = $aux->dd_id;
            $rows[$i]['cell'] = array($aux->dd_id,
                $aux->dd_fecha,
                $aux->dd_descripcion,
                $this->componente3_model->get_sectores_dd($aux->dd_id),
                $arch1,
                $arch2
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            //$rows[0]['id'] = 0;
           // $rows[0]['cell'] = array('0', ' ', ' ', ' ', ' ', ' ');
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
    
    
    public function cargar_epi(){
		$this->load->model('componente3/componente3_model');
        $actividades = $this->componente3_model->get_epi();
        $numfilas = count($actividades);

        $i = 0;
        foreach ($actividades as $aux) {
            
            $rows[$i]['id'] = $aux->epi_id;
            $rows[$i]['cell'] = array($aux->epi_id,
                $aux->epi_nombre
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            //$rows[0]['id'] = 0;
           // $rows[0]['cell'] = array('0', ' ', ' ', ' ', ' ', ' ');
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
	
	public function cargarActividadess_epi($epi_id) {
        if(!isset($epi_id))
			$epi_id='';
        $this->load->model('componente3/componente3_model');
        $act = $this->componente3_model->get_act_epi($epi_id);
        $numfilas = count($act);

        $i = 0;
        foreach ($act as $aux) {
            $rows[$i]['id'] = $aux->act_id;
            $rows[$i]['cell'] = array($aux->act_id,
                $aux->act_nombre,
                $aux->act_fecha_ini,
                $aux->act_fecha_fin,
                $aux->act_responsable,
                $aux->act_cargo,
                $aux->act_descripcion,
                $aux->act_recursos
            );
            $i++;
        }

        if ($numfilas != 0) {
            array_multisort($rows, SORT_ASC);
        } else {
            //$rows[0]['id'] = 0;
           // $rows[0]['cell'] = array('0', ' ', ' ', ' ', ' ', ' ');
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
    

}

?>
