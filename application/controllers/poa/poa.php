<?php

/**
 * 
 *
 * @author
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class poa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
    public function subir_archivo_poa() {

        $informacion['titulo'] = 'Subir Archivo de Excel Seguimiento POA';
        //require_once 'excel_reader2.php';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('poa/subir_archivo_poa',array('error' => ' ' ));
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function subir_archivo_poa_financiero() {

        $informacion['titulo'] = 'Subir Archivo de Excel Seguimiento POA';
        //require_once 'excel_reader2.php';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('poa/subir_archivo_poa_financiero',array('error' => ' ' ));
        $this->load->view('plantilla/footer', $informacion);
    }
    
    function do_upload_poa_financiero()
	{
		$config['upload_path'] = 'documentos/seguimiento_poa_financiero/';
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size']	= '0';
		
		
		if(file_exists('documentos/seguimiento_poa_financiero/poa_base.xlsx')){
				if(isset($_POST['subs'])){
					unlink('documentos/seguimiento_poa_financiero/poa_base.xlsx');
					$config['file_name']='poa_base';
				}
				else 
				$config['file_name'] = 'poa_seguimiento_'.date("d-m-y");
		}
		else
			$config['file_name']='poa_base';
		
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$informacion['titulo'] = 'Subida de Archivo';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('poa/subir_archivo_poa_financiero',$error);
			$this->load->view('plantilla/footer', $informacion);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());				
			$data2 = $this->upload->data();
			//$this->load->view('upload_success', $data);
			//include("excel_reader2.php"); 
			//$excel = new Spreadsheet_Excel_Reader("uploads/".$data2['file_name']."");
			
			//$this->excel_todb($data2['file_name']);
			
			$informacion['titulo'] = 'Archivo Subido con Exito.';//'Subida de Archivo: '.$data2['file_name'].' name: '.$excel->val(10,'A');
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('poa/subida_exitosa_financiero_view',$data);
			$this->load->view('plantilla/footer', $informacion);
		}
	}
	
	function do_upload()
	{
		$config['upload_path'] = 'documentos/seguimiento_poa/';
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size']	= '0';
		
		
		if(file_exists('documentos/seguimiento_poa/poa_base.xlsx')){
				if(isset($_POST['subs'])){
					unlink('documentos/seguimiento_poa/poa_base.xlsx');
					$config['file_name']='poa_base';
				}
				else 
				$config['file_name'] = 'poa_seguimiento_'.$_POST['trim'].'_'.$_POST['anio'];
		}
		else
			$config['file_name']='poa_base';
		
		if(file_exists('documentos/seguimiento_poa/'.$config['file_name'].'.xlsx')){
			if($config['file_name']!='poa_base'){
				unlink('documentos/seguimiento_poa/'.$config['file_name'].'.xlsx');
			}
		}
		
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$informacion['titulo'] = 'Subida de Archivo';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('poa/subir_archivo_poa',$error);
			$this->load->view('plantilla/footer', $informacion);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());				
			$data2 = $this->upload->data();
			//$this->load->view('upload_success', $data);
			//include("excel_reader2.php"); 
			//$excel = new Spreadsheet_Excel_Reader("uploads/".$data2['file_name']."");
			
			//$this->excel_todb($data2['file_name']);
			
			$informacion['titulo'] = 'Archivo Subido con Exito.';//'Subida de Archivo: '.$data2['file_name'].' name: '.$excel->val(10,'A');
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('poa/subida_exitosa_view',$data);
			$this->load->view('plantilla/footer', $informacion);
		}
	}
	
	public function ver_arch_poa_seguimiento_view() {
		
		for($anio=2011;$anio<2016;$anio++){//se crean divs para cada anio, los cuales contienen botones para realizar la accion de comparar
			$informacion['a'.$anio]='<div id="'.$anio.'" hidden><h5>A&ntilde;o '.$anio.'</h5>';
			for($trim=1;$trim<5;$trim++){
				$dir='documentos/seguimiento_poa/';
				$file='poa_seguimiento_'.$trim.'_'.$anio.'.xlsx';
				if(file_exists($dir.$file)){
					$informacion['a'.$anio].='<input type="button" id="comparar'.$trim.$anio.'" name="'.$file.'" value="Comparar Archivo Trimestre '.$trim.'-'.$anio.'"/><br/><br/>';
				}
			}
			$informacion['a'.$anio].='</div>';
			
			if($informacion['a'.$anio]=='<div id="'.$anio.'" hidden><h5>A&ntilde;o '.$anio.'</h5></div>')//si no hay datos
				$informacion['a'.$anio]='<div id="'.$anio.'" hidden><p>Aun no hay archivos para el a&ntilde;o seleccionado.</p></div>';
		}
		
		
        $informacion['titulo'] = 'Archivos POA Seguimiento';
        //require_once 'excel_reader2.php';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('poa/ver_arch_poa_seguimiento_view',$informacion);
        $this->load->view('plantilla/footer', $informacion);
    }
	
	public function nextFileName($file,$dir) {//aun no se utiliza

			$i=1; $probeer=$file;

			while(file_exists($dir.$probeer)) {
				$punt=strrpos($file,".");
				if(substr($file,($punt-3),1)!==("[") && substr($file,($punt-1),1)!==("]")) {
					$probeer=substr($file,0,$punt)."[".$i."]".
					substr($file,($punt),strlen($file)-$punt);
				} else {
					$probeer=substr($file,0,($punt-3))."[".$i."]".
					substr($file,($punt),strlen($file)-$punt);
				}
				$i++;
			}
			return $probeer;
	}
	
	public function subir_poa_gr(){
		$informacion['titulo'] = 'Subir Archivo POA - Gestion de Riesgo';
        //require_once 'excel_reader2.php';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('poa/subir_poa_gr_view',array('error' => ' ' ));
        $this->load->view('plantilla/footer', $informacion);
	}
	
	public function guardar_poa_gr() {//gestion de riesgo

        $datos = $_POST;
		unset($datos['guardar']);
		
		//configuracion del archivo adjunto a subir
		$config['upload_path'] = 'documentos/seguimiento_poa/gestion_riesgo/';
		$config['allowed_types'] = 'xls|xlsx';
		//$config['max_size']	= '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('doc_gr'))//retorna falso si hubo un error y entonces entra al if
		{
			$error_upload = $this->upload->display_errors('<p style="color:red">Error en archivo: ', '</p>');
			$informacion['titulo'] = 'Subir Archivo POA - Gestion de Riesgo';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = $error_upload; 
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('poa/subir_poa_gr_view',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		}
		else{
			$datos_arch = $this->upload->data();
					
					$ruta=$config['upload_path'].$datos_arch['file_name'];
					
					$this->load->model('poa/poa_model');
					$this->poa_model->insertar_poa_gr($datos,$ruta);				
					
					$informacion['titulo'] = 'Subir Archivo POA - Gestion de Riesgo';
					$informacion['user_id'] = $this->tank_auth->get_user_id();
					$informacion['username'] = $this->tank_auth->get_username();
					$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
					$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete.</p>';         
					$this->load->view('plantilla/header', $informacion);
					$this->load->view('plantilla/menu', $informacion);
					$this->load->view('poa/subir_poa_gr_view',$informacion);
					$this->load->view('plantilla/footer', $informacion);
				
				}
		//$prueba=$this->componente3_model->insertar_dd($datos_dd);
		//for($i=0;$i<2;$i++)
		//	echo $prueba[$i]['sec_id'];
		
    }
    
    public function cargar_docs_gr() {
        $this->load->model('poa/poa_model');
        $docs = $this->poa_model->get_docs_gr();
        $numfilas = count($docs);

        $i = 0;
        foreach ($docs as $aux) {
			
			if($aux->doc_poa_gr!='')
				$arch='<a href="'.base_url().''.$aux->doc_poa_gr.'">Descargar</a>';
            else $arch='No disponible';
			
            $rows[$i]['id'] = $aux->id_poa_gr;
            $rows[$i]['cell'] = array($aux->id_poa_gr,
				$this->poa_model->get_mun_nombre($aux->id_mun),
                $aux->anio_poa_gr,
                $aux->estado_poa_gr,
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
    
    public function actualizar_estado_poa_gr() {
			 $gr = $_POST;
			 $this->load->model('poa/poa_model');
			 $this->poa_model->actualizar_estado_poa_gr($gr);
	}
    
    public function subir_poa_rf(){//rescate financiero
		$informacion['titulo'] = 'Subir Archivo POA - Rescate Financiero';
        //require_once 'excel_reader2.php';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('poa/subir_poa_rf_view',array('error' => ' ' ));
        $this->load->view('plantilla/footer', $informacion);
	}
	
	public function guardar_poa_rf() {

        $datos = $_POST;
		unset($datos['guardar']);
		
		//configuracion del archivo adjunto a subir
		$config['upload_path'] = 'documentos/seguimiento_poa/rescate_financiero/';
		$config['allowed_types'] = 'xls|xlsx';
		//$config['max_size']	= '2048';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('doc_rf'))//retorna falso si hubo un error y entonces entra al if
		{
			$error_upload = $this->upload->display_errors('<p style="color:red">Error en archivo: ', '</p>');
			$informacion['titulo'] = 'Subir Archivo POA - Rescate Financiero';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = $error_upload; 
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('poa/subir_poa_rf_view',$informacion);
			$this->load->view('plantilla/footer', $informacion);
		}
		else{
			$datos_arch = $this->upload->data();
					
					$ruta=$config['upload_path'].$datos_arch['file_name'];
					
					$this->load->model('poa/poa_model');
					$this->poa_model->insertar_poa_rf($datos,$ruta);			
					
					$informacion['titulo'] = 'Subir Archivo POA - Rescate Financiero';
					$informacion['user_id'] = $this->tank_auth->get_user_id();
					$informacion['username'] = $this->tank_auth->get_username();
					$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
					$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete.</p>';         
					$this->load->view('plantilla/header', $informacion);
					$this->load->view('plantilla/menu', $informacion);
					$this->load->view('poa/subir_poa_rf_view',$informacion);
					$this->load->view('plantilla/footer', $informacion);
				
				}
		//$prueba=$this->componente3_model->insertar_dd($datos_dd);
		//for($i=0;$i<2;$i++)
		//	echo $prueba[$i]['sec_id'];
		
    }
    
    public function cargar_docs_rf() {
        $this->load->model('poa/poa_model');
        $docs = $this->poa_model->get_docs_gr();
        $numfilas = count($docs);

        $i = 0;
        foreach ($docs as $aux) {
			
			if($aux->doc_poa_gr!='')
				$arch='<a href="'.base_url().''.$aux->doc_poa_gr.'">Descargar</a>';
            else $arch='No disponible';
			
            $rows[$i]['id'] = $aux->id_poa_gr;
            $rows[$i]['cell'] = array($aux->id_poa_gr,
				$this->poa_model->get_mun_nombre($aux->id_mun),
                $aux->anio_poa_gr,
                $aux->estado_poa_gr,
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
    
    public function actualizar_estado_poa_rf() {
			 $rf = $_POST;
			 $this->load->model('poa/poa_model');
			 $this->poa_model->actualizar_estado_poa_rf($rf);
	}
		
	public function comparar_poa($new_file){
		$this->load->library('PHPExcel');
		$inputFileName = 'documentos/seguimiento_poa/'.$new_file;
		$inputFileNameBase = 'documentos/seguimiento_poa/poa_base.xlsx';
		
		$poa_base = PHPExcel_IOFactory::load($inputFileNameBase);
		$poa_comp = PHPExcel_IOFactory::load($inputFileName);
		
		$report=$this->phpexcel;
		$report->setActiveSheetIndex(0);
        $report->getActiveSheet()->setTitle('Evaluacion POA');
        
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
        
        $estComp = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'BDD5F2')),//95B3D7  9EBCE0
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estSubComp = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'D9EBB1')),//C4D79B  CADCA1
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estMacroAct = array(
            'font' => array('bold' => false, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E2E2E2')),//E4E2E2  EDEAEA
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estAct = array(
            'font' => array('bold' => false, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'F4F4F4')), //F5F5F5
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estRight = array(
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT)
        );
        
        $report->getActiveSheet()->setCellValue('B2', 'Seguiminto POA PFGL - Avance Fisico y Financiero.');
        $report->getActiveSheet()->mergeCells('B2:H2');
        $report->getActiveSheet()->getStyle('B2:H2')->applyFromArray($estTitulos);

        $report->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $report->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $report->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $report->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $report->getActiveSheet()->getColumnDimension('E')->setWidth(22);
        $report->getActiveSheet()->getColumnDimension('F')->setWidth(22);
        $report->getActiveSheet()->mergeCells('A4:C4');
        
        $report->getActiveSheet()->setCellValue('A4', 'Componente/SubComponente/Actividad');
        $report->getActiveSheet()->setCellValue('D4', 'Total Planificado');
        $report->getActiveSheet()->setCellValue('E4', 'Total a la Fecha (Avance Fisico)');
        $report->getActiveSheet()->setCellValue('F4', 'Ejecutado (Avance Financiero)');
        $report->getActiveSheet()->getStyle('A4:F4')->applyFromArray($estSubTitulos);
        
        
        
        
        
        /*Comenzando la Evaluacion*/
		/*$i=9;
		$poa_base->getActiveSheet()->getCell("G".$i)->getValue();
		$poa_comp->getActiveSheet()->getCell("G".$i)->getValue();
		$report->getActiveSheet()->setCellValue("B".$i, $poa_base->getActiveSheet()->getCell("G".$i)->getValue() - $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
		*/
		$i=0; $j=5;
		for($i=9;$i<223;$i++){
			
			$comp=$poa_base->getActiveSheet()->getCell("B".$i);
			if($comp!=''){ //si la celda B$i no esta vacia
				if($comp=='1'||$comp=='2'||$comp=='3'||$comp=='4'){ //Si es un Componente
					
					$report->getActiveSheet()->mergeCells("A".$j.":C".$j);
					$report->getActiveSheet()->setCellValue("A".$j, $comp.' '.$poa_base->getActiveSheet()->getCell("C".$i)->getValue());
					$report->getActiveSheet()->setCellValue("D".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
					$report->getActiveSheet()->setCellValue("E".$j, $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
						$plan=$poa_base->getActiveSheet()->getCell("G".$i)->getValue();
						$ejec=$poa_comp->getActiveSheet()->getCell("G".$i)->getValue();
						if($plan==0)
							$plan=1;
					$report->getActiveSheet()->setCellValue("F".$j, (($ejec/$plan) * 100).'%' );
					$report->getActiveSheet()->getStyle("A".$j.":F".$j)->applyFromArray($estComp);
					$j++;
					
				}
				else{ //Es Subcomponente
					
					$report->getActiveSheet()->mergeCells("A".$j.":C".$j);
					$report->getActiveSheet()->setCellValue("A".$j, ' '.$comp.' '.$poa_base->getActiveSheet()->getCell("C".$i)->getValue());
					$report->getActiveSheet()->setCellValue("D".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
					$report->getActiveSheet()->setCellValue("E".$j, $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
						$plan=$poa_base->getActiveSheet()->getCell("G".$i)->getValue();
						$ejec=$poa_comp->getActiveSheet()->getCell("G".$i)->getValue();
						if($plan==0)
							$plan=1;
					$report->getActiveSheet()->setCellValue("F".$j, (($ejec/$plan) * 100).'%');
					$report->getActiveSheet()->getStyle("A".$j.":F".$j)->applyFromArray($estSubComp);
					$j++;
				}
			}
			else{
				$comp=$poa_base->getActiveSheet()->getCell("C".$i);
				if($comp!=''){//Es Macro Actividad
					
					$report->getActiveSheet()->mergeCells("A".$j.":C".$j);
					$report->getActiveSheet()->setCellValue("A".$j, '   '.$comp.' '.$poa_base->getActiveSheet()->getCell("D".$i)->getValue());
					$report->getActiveSheet()->setCellValue("D".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
					$report->getActiveSheet()->setCellValue("E".$j, $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
						$plan=$poa_base->getActiveSheet()->getCell("G".$i)->getValue();
						$ejec=$poa_comp->getActiveSheet()->getCell("G".$i)->getValue();
						if($plan==0)
							$plan=1;
					$report->getActiveSheet()->setCellValue("F".$j, (($ejec / $plan  ) * 100).'%');
					//$report->getActiveSheet()->setCellValue("F".$j, substr($poa_base->getActiveSheet()->getCell("G".$i)->getValue(),1,-1) - substr($poa_comp->getActiveSheet()->getCell("G".$i)->getValue(),1,-1));
					$report->getActiveSheet()->getStyle("A".$j.":F".$j)->applyFromArray($estMacroAct);
					$j++;
				
				}
				else{
					$comp=$poa_base->getActiveSheet()->getCell("D".$i);
					if($comp!=''){
						if(strlen($comp)>3){ //Es Actividad
							
							$report->getActiveSheet()->mergeCells("A".$j.":C".$j);
							$report->getActiveSheet()->setCellValue("A".$j, '    '.$comp.' '.$poa_base->getActiveSheet()->getCell("E".$i)->getValue());
							$report->getActiveSheet()->setCellValue("D".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
							$report->getActiveSheet()->setCellValue("E".$j, $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
								$plan=$poa_base->getActiveSheet()->getCell("G".$i)->getValue();
								$ejec=$poa_comp->getActiveSheet()->getCell("G".$i)->getValue();
								if($plan==0)
									$plan=1;
							$report->getActiveSheet()->setCellValue("F".$j, (($ejec / $plan  ) * 100).'%');
							//$report->getActiveSheet()->setCellValue("F".$j, substr($poa_base->getActiveSheet()->getCell("G".$i)->getValue(),1,-1) - substr($poa_comp->getActiveSheet()->getCell("G".$i)->getValue(),1,-1));
							$report->getActiveSheet()->getStyle("A".$j.":F".$j)->applyFromArray($estAct);
							$j++;
						}
						else{//Es SubActividad
							//if($i==187)
								//$report->getActiveSheet()->setCellValue("A".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
							$report->getActiveSheet()->mergeCells("A".$j.":C".$j);
							$report->getActiveSheet()->setCellValue("A".$j, '     '.$comp.' '.$poa_base->getActiveSheet()->getCell("E".$i)->getValue());
							$report->getActiveSheet()->setCellValue("D".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
							$report->getActiveSheet()->setCellValue("E".$j, $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
								$plan=$poa_base->getActiveSheet()->getCell("G".$i)->getValue();
								$ejec=$poa_comp->getActiveSheet()->getCell("G".$i)->getValue();
								if($plan==0)
									$plan=1;
							$report->getActiveSheet()->setCellValue("F".$j, (($ejec / $plan  ) * 100).'%');
							//$report->getActiveSheet()->setCellValue("F".$j, substr($poa_base->getActiveSheet()->getCell("G".$i)->getValue(),1,-1) - substr($poa_comp->getActiveSheet()->getCell("G".$i)->getValue(),1,-1));
							$report->getActiveSheet()->getStyle("A".$j.":F".$j)->applyFromArray($estCells);
							$j++;
						} 
					}
				}
				
			}
		}
		
		$report->getActiveSheet()->getStyle("D5:F".$j)->applyFromArray($estRight);
		
		
		
		/*Finalizacion y Descarga*/
        $filename = "Seg_Eval_POA_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($report, 'Excel5');
        $objWriter->save('php://output');
		
	}
	
		public function comparar_poa_financiero($new_file){
		$this->load->library('PHPExcel');
		$inputFileName = 'documentos/seguimiento_poa_financiero/'.$new_file;
		$inputFileNameBase = 'documentos/seguimiento_poa_financiero/poa_base.xlsx';
		
		$poa_base = PHPExcel_IOFactory::load($inputFileNameBase);
		$poa_comp = PHPExcel_IOFactory::load($inputFileName);
		
		$report=$this->phpexcel;
		$report->setActiveSheetIndex(0);
        $report->getActiveSheet()->setTitle('Evaluacion POA');
        
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
        
        $estComp = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'BDD5F2')),//95B3D7  9EBCE0
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estSubComp = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'D9EBB1')),//C4D79B  CADCA1
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estMacroAct = array(
            'font' => array('bold' => false, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E2E2E2')),//E4E2E2  EDEAEA
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $estAct = array(
            'font' => array('bold' => false, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'F4F4F4')), //F5F5F5
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => false
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        
        $report->getActiveSheet()->setCellValue('C2', 'Seguiminto POA PFGL - Avance Fisico y Financiero.');
        $report->getActiveSheet()->mergeCells('C2:I2');
        $report->getActiveSheet()->getStyle('C2:I2')->applyFromArray($estTitulos);

        $report->getActiveSheet()->getColumnDimension('A')->setWidth(19);
        $report->getActiveSheet()->getColumnDimension('B')->setWidth(19);
        $report->getActiveSheet()->getColumnDimension('C')->setWidth(19);
        $report->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $report->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $report->getActiveSheet()->mergeCells('A4:C4');
        
        $report->getActiveSheet()->setCellValue('A4', 'Componente/SubComponente/Actividad');
        $report->getActiveSheet()->setCellValue('D4', 'Total Costos Inicial');
        $report->getActiveSheet()->setCellValue('E4', 'Total a la Fecha');
        $report->getActiveSheet()->setCellValue('F4', 'Variacion');
        $report->getActiveSheet()->getStyle('A4:F4')->applyFromArray($estSubTitulos);
        
        
        
        
        
        /*Comenzando la Evaluacion*/
		/*$i=9;
		$poa_base->getActiveSheet()->getCell("G".$i)->getValue();
		$poa_comp->getActiveSheet()->getCell("G".$i)->getValue();
		$report->getActiveSheet()->setCellValue("B".$i, $poa_base->getActiveSheet()->getCell("G".$i)->getValue() - $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
		*/
		$i=0; $j=5;
		for($i=9;$i<223;$i++){
			
			$comp=$poa_base->getActiveSheet()->getCell("B".$i);
			if($comp!=''){ //si la celda B$i no esta vacia
				if($comp=='1'||$comp=='2'||$comp=='3'||$comp=='4'){ //Si es un Componente
					
					$report->getActiveSheet()->mergeCells("A".$j.":C".$j);
					$report->getActiveSheet()->setCellValue("A".$j, $comp.' '.$poa_base->getActiveSheet()->getCell("C".$i)->getValue());
					$report->getActiveSheet()->setCellValue("D".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
					$report->getActiveSheet()->setCellValue("E".$j, $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
					$report->getActiveSheet()->setCellValue("F".$j, substr($poa_base->getActiveSheet()->getCell("G".$i)->getValue(),1,-1) - substr($poa_comp->getActiveSheet()->getCell("G".$i)->getValue(),1,-1));
					$report->getActiveSheet()->getStyle("A".$j.":F".$j)->applyFromArray($estComp);
					$j++;
					
				}
				else{ //Es Subcomponente
					
					$report->getActiveSheet()->mergeCells("A".$j.":C".$j);
					$report->getActiveSheet()->setCellValue("A".$j, ' '.$comp.' '.$poa_base->getActiveSheet()->getCell("C".$i)->getValue());
					$report->getActiveSheet()->setCellValue("D".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
					$report->getActiveSheet()->setCellValue("E".$j, $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
					$report->getActiveSheet()->setCellValue("F".$j, substr($poa_base->getActiveSheet()->getCell("G".$i)->getValue(),1,-1) - substr($poa_comp->getActiveSheet()->getCell("G".$i)->getValue(),1,-1));
					$report->getActiveSheet()->getStyle("A".$j.":F".$j)->applyFromArray($estSubComp);
					$j++;
				}
			}
			else{
				$comp=$poa_base->getActiveSheet()->getCell("C".$i);
				if($comp!=''){//Es Macro Actividad
					
					$report->getActiveSheet()->mergeCells("A".$j.":C".$j);
					$report->getActiveSheet()->setCellValue("A".$j, '   '.$comp.' '.$poa_base->getActiveSheet()->getCell("D".$i)->getValue());
					$report->getActiveSheet()->setCellValue("D".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
					$report->getActiveSheet()->setCellValue("E".$j, $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
					$report->getActiveSheet()->setCellValue("F".$j, substr($poa_base->getActiveSheet()->getCell("G".$i)->getValue(),1,-1) - substr($poa_comp->getActiveSheet()->getCell("G".$i)->getValue(),1,-1));
					$report->getActiveSheet()->getStyle("A".$j.":F".$j)->applyFromArray($estMacroAct);
					$j++;
				
				}
				else{
					$comp=$poa_base->getActiveSheet()->getCell("D".$i);
					if($comp!=''){
						if(strlen($comp)>3){ //Es Actividad
							
							$report->getActiveSheet()->mergeCells("A".$j.":C".$j);
							$report->getActiveSheet()->setCellValue("A".$j, '    '.$comp.' '.$poa_base->getActiveSheet()->getCell("E".$i)->getValue());
							$report->getActiveSheet()->setCellValue("D".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
							$report->getActiveSheet()->setCellValue("E".$j, $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
							$report->getActiveSheet()->setCellValue("F".$j, substr($poa_base->getActiveSheet()->getCell("G".$i)->getValue(),1,-1) - substr($poa_comp->getActiveSheet()->getCell("G".$i)->getValue(),1,-1));
							$report->getActiveSheet()->getStyle("A".$j.":F".$j)->applyFromArray($estAct);
							$j++;
						}
						else{//Es SubActividad
							//if($i==187)
								//$report->getActiveSheet()->setCellValue("A".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
							$report->getActiveSheet()->mergeCells("A".$j.":C".$j);
							$report->getActiveSheet()->setCellValue("A".$j, '     '.$comp.' '.$poa_base->getActiveSheet()->getCell("E".$i)->getValue());
							$report->getActiveSheet()->setCellValue("D".$j, $poa_base->getActiveSheet()->getCell("G".$i)->getValue());
							$report->getActiveSheet()->setCellValue("E".$j, $poa_comp->getActiveSheet()->getCell("G".$i)->getValue());
							$report->getActiveSheet()->setCellValue("F".$j, substr($poa_base->getActiveSheet()->getCell("G".$i)->getValue(),1,-1) - substr($poa_comp->getActiveSheet()->getCell("G".$i)->getValue(),1,-1));
							$report->getActiveSheet()->getStyle("A".$j.":F".$j)->applyFromArray($estCells);
							$j++;
						} 
					}
				}
				
			}
		}
		
		
		
		/*Finalizacion y Descarga*/
        $filename = "Seg_Eval_POA_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($report, 'Excel5');
        $objWriter->save('php://output');
		
	}
	
	public function excel_todb($nombre_archivo) {
		$this->load->model('carpetas_pfgl/excel_todb_model');
		$this->excel_todb_model->insertar_data($nombre_archivo);
	}

}

?>
