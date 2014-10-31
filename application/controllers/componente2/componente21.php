<?php

/**
 * Controlador para componente 21
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  componente21 extends CI_Controller {
	
	public function index() {

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
    ///************************************************************
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
<<<<<<< HEAD
    
=======
    public function guardar_etm() {

        $datos_etm = $_POST;
		unset($datos_etm['guardar']);
		
		$this->load->model('componente2/comp21_model');
		$this->comp21_model->insertar_etm($datos_etm);
		
		$informacion['titulo'] = 'Equipo Tecnico Municipal';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete del ETM.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente2/etm_view');
			$this->load->view('plantilla/footer', $informacion);
		
	}
    
    ///***************************************************************************
>>>>>>> 8435cef9aface6857774d885123de48b944745d0
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
<<<<<<< HEAD
=======
    
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
>>>>>>> 8435cef9aface6857774d885123de48b944745d0
    //************************************************************
     public function guardar_cc() {

        $datos_cc = $_POST;
		unset($datos_cc['guardar']);
		
		//configuracion del archivo adjunto a subir
		$config['upload_path'] = 'documentos/cc/';
		$config['allowed_types'] = 'doc|docx|pdf|rtf';
		$config['max_size']	= '2048';
		
		$this->load->library('upload', $config);
		
		if ($datos_cc['acta']=='si')
		{
			
			if ( ! $this->upload->do_upload('acta_final'))//retorna falso si hubo un error y entonces entra al if
			{
				$error_upload = $this->upload->display_errors('<p style="color:red">Error: ', '</p>');
				$informacion['titulo'] = 'CC';
				$informacion['user_id'] = $this->tank_auth->get_user_id();
				$informacion['username'] = $this->tank_auth->get_username();
				$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
				$informacion['aviso'] = $error_upload; 
				$this->load->view('plantilla/header', $informacion);
				$this->load->view('plantilla/menu', $informacion);
				$this->load->view('componente2/cc_view');
				$this->load->view('plantilla/footer', $informacion);
			}
			else
			{			
				$datos_arch1 = $this->upload->data();
				$ruta1=$config['upload_path'].$datos_arch1['file_name'];
			}
		
		}
		else $ruta1=null;
		
		if($datos_cc['lista']=='si'){
			
			if ( ! $this->upload->do_upload('lista_asis'))//retorna falso si hubo un error y entonces entra al if
			{
				$error_upload = $this->upload->display_errors('<p style="color:red">Error: ', '</p>');
				$informacion['titulo'] = 'CC';
				$informacion['user_id'] = $this->tank_auth->get_user_id();
				$informacion['username'] = $this->tank_auth->get_username();
				$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
				$informacion['aviso'] = $error_upload; 
				$this->load->view('plantilla/header', $informacion);
				$this->load->view('plantilla/menu', $informacion);
				$this->load->view('componente2/cc_view');
				$this->load->view('plantilla/footer', $informacion);
			}
			else
			{			
				$datos_arch2 = $this->upload->data();
				$ruta2=$config['upload_path'].$datos_arch2['file_name'];
			}
			
		}
		else $ruta2=null;
			
			$this->load->model('componente2/comp21_model');
			$this->comp21_model->insertar_cc($datos_cc,$ruta1,$ruta2);				
			
			$informacion['titulo'] = 'CC';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete del CC.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente2/cc_view');
			$this->load->view('plantilla/footer', $informacion);
			
	}
	
	
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
