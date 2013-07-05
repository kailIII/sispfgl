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

        $informacion['titulo'] = 'CC';
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

        $informacion['titulo'] = 'CCC';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/ccc_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
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
			
			$informacion['titulo'] = 'CCC';
			$informacion['user_id'] = $this->tank_auth->get_user_id();
			$informacion['username'] = $this->tank_auth->get_username();
			$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username()); 
			$informacion['aviso'] = '<p style="color:blue">Se ha realizado el registro correctamete.</p>';         
			$this->load->view('plantilla/header', $informacion);
			$this->load->view('plantilla/menu', $informacion);
			$this->load->view('componente2/ccc_view');
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
			$informacion['aviso'] = '<p style="color:blue">Se ha realziado el registro correctamete.</p>';         
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
	
	public function reportes_comp21() {

        $informacion['titulo'] = 'Reportes Componente 2.1';
        //$informacion['user_id'] = $this->tank_auth->get_user_id();
        //$informacion['username'] = $this->tank_auth->get_username();
        //$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/reportes_comp21_view');
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
        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'Comites de Contraloria Ciudadana por Area Geografica');
        $this->phpexcel->getActiveSheet()->mergeCells('D2:J2');
        $this->phpexcel->getActiveSheet()->getStyle('D2:J2')->applyFromArray($estTitulos);
        $this->phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
        
					/*CCC por departamento*/
        $this->phpexcel->getActiveSheet()->setCellValue('A3', 'Por Departamento');
        $this->phpexcel->getActiveSheet()->getStyle('A3:A3')->applyFromArray($estSubTitulos);
        
        $this->phpexcel->getActiveSheet()->setCellValue('B4', 'Departamento');
        $this->phpexcel->getActiveSheet()->setCellValue('C4', 'Cantidad');
        $this->phpexcel->getActiveSheet()->setCellValue('D4', '%');
        $this->phpexcel->getActiveSheet()->getStyle('B4:D4')->applyFromArray($estEncabezado);
        
        $this->load->model('componente2/comp21_model');
        $consulta = $this->comp21_model->ccc_por_depto();
        $i=5;
        foreach ($consulta as $row) {
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", $row->depto);//imprime los deptos
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);//imprime la cant de CCC del depto
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B5:D$i")->applyFromArray($estCells);
        
				/*CCC por Region*/
		$i=$i+4;
		$this->phpexcel->getActiveSheet()->setCellValue('A20', 'Por Region');
        $this->phpexcel->getActiveSheet()->getStyle('A20:A20')->applyFromArray($estSubTitulos);
        
        $this->phpexcel->getActiveSheet()->setCellValue('B21', 'Region');
        $this->phpexcel->getActiveSheet()->setCellValue('C21', 'Cantidad');
        $this->phpexcel->getActiveSheet()->setCellValue('D21', '%');
        $this->phpexcel->getActiveSheet()->getStyle('B21:D21')->applyFromArray($estEncabezado);
        
        $consulta = $this->comp21_model->ccc_por_region();
        foreach ($consulta as $row) {
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", $row->reg);//imprime la region
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->suma);//imprime las cant de CCC de la region
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B22:D$i")->applyFromArray($estCells);
        
        /*Finalizacion y Descarga*/
        $filename = "rg_ccc" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
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
        $this->phpexcel->getActiveSheet()->setCellValue('C4', 'Cantidad');
        $this->phpexcel->getActiveSheet()->getStyle('A4:C4')->applyFromArray($estSubTitulos);
        
        $this->load->model('componente2/comp21_model');
        $deptos = $this->comp21_model->get_deptos();
        $i=5;
        foreach ($deptos as $row) {
			$this->phpexcel->getActiveSheet()->setCellValue("A$i", $row->dep_nombre);//imprime los deptos
            $munic = $this->comp21_model->muni_depto($row->dep_id);
            foreach($munic as $mun){
				$ccc_muni = $this->comp21_model->ccc_por_muni($mun->mun_id);
				$this->phpexcel->getActiveSheet()->setCellValue("B$i", $mun->mun_nombre);
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $ccc_muni->cant);
				$i++;
			}
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("A5:C$i")->applyFromArray($estCells);
        
        /*Finalizacion y Descarga*/
        $filename = "rg_ccc" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
	}
}
?>
