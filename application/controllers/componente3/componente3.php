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
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/reporte_estado_comp3_view',$estado);
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function reporte_epp(){
		/*Inicio*/
		$this->load->library('PHPExcel');
		$this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('Detalles de Actividades PP');
        
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
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
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
        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'Componente 3 - Reporte de Elaboracion de Plan Piloto');
        $this->phpexcel->getActiveSheet()->mergeCells('D2:J2');
        $this->phpexcel->getActiveSheet()->getStyle('D2:J2')->applyFromArray($estTitulos);
        
        $this->load->model('componente3/componente3_model');
        $epp = $this->componente3_model->get_epi();
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
        $i=4;
        foreach ($epp as $row) {
			$inicialP=$i;
			$costoT=0;
			
			$this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Nombre por defecto del Plan Piloto:');
			$this->phpexcel->getActiveSheet()->setCellValue("A".($i+1), 'Cantidad de Actividades que comprende:');
			$this->phpexcel->getActiveSheet()->setCellValue("A".($i+2), 'Costo total de todas las Actividades:');
			
			$this->phpexcel->getActiveSheet()->mergeCells("A".$i.":B".$i);
			$this->phpexcel->getActiveSheet()->mergeCells("A".($i+1).":B".($i+1));
			$this->phpexcel->getActiveSheet()->mergeCells("A".($i+2).":B".($i+2));
			$this->phpexcel->getActiveSheet()->getStyle("A".$i.":A".($i+2))->applyFromArray($estSubTitulos);
				
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->epi_nombre);//imprime el nombre del epi
			$this->phpexcel->getActiveSheet()->mergeCells("C$i:F$i");
			$this->phpexcel->getActiveSheet()->mergeCells("C".($i+1).":F".($i+1));
			$this->phpexcel->getActiveSheet()->mergeCells("C".($i+2).":F".($i+2));
            $this->phpexcel->getActiveSheet()->getStyle("C$i:F".($i+2))->applyFromArray($estCells);
            
            
            $act_epi = $this->componente3_model->get_act_epi($row->epi_id);//devuelve las actividades del epp
            
            $cant_act=count($act_epi);
            $plural=($cant_act==1) ? " Actividad":" Actividades";
            $cant_act=$cant_act.$plural;
            
            $this->phpexcel->getActiveSheet()->setCellValue("C".($i+1), $cant_act);//imprime la cant de act del epp
            
            $i=$i+4;
            //$inicial=$i;
            foreach($act_epi as $act){
				$inicial=$i;
				
				$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Nombre de la Actividad');
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $act->act_nombre);
				$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
				$i++;
				
				$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Fecha de Inicio');
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $act->act_fecha_ini);
				$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
				$i++;
				
				$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Fecha de Fin');
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $act->act_fecha_fin);
				$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
				$i++;
				
				$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Costo ($)');
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $act->act_recursos);
				$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
				$i++;
				
				$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Responsable');
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $act->act_responsable);
				$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
				$i++;
				
				$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Descripcion de la Actividad');
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $act->act_descripcion);
				$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
				
				$this->phpexcel->getActiveSheet()->getStyle("B$inicial:B$i")->applyFromArray($estEncabezado);
				$this->phpexcel->getActiveSheet()->getStyle("C$inicial:C$i")->applyFromArray($estCells);
				$this->phpexcel->getActiveSheet()->getStyle("D$inicial:D$i")->applyFromArray($estCells);
				
				$costoT=$costoT+$act->act_recursos;
				$i=$i+2;
			}
			//$final=$i-1;
			//$this->phpexcel->getActiveSheet()->mergeCells("A$inicial".":"."A$final");
            //$i++;*/
            $this->phpexcel->getActiveSheet()->setCellValue("C".($inicialP+2), "($) ".$costoT);
            $i++;
		}
        
        
        
       
        
        /*Finalizacion y Descarga*/
        $filename = "RepteComp3_EPP_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
	}
	
	public function reporte_divu(){
		$this->load->library('PHPExcel');
		$this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('Detalles de Actividades PP');
        
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
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
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
        
        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'Componente 3 - Reporte Etapa de Divulgacion');
        $this->phpexcel->getActiveSheet()->mergeCells('D2:J2');
        $this->phpexcel->getActiveSheet()->getStyle('D2:J2')->applyFromArray($estTitulos);
        
        $this->load->model('componente3/componente3_model');
        $act_divu = $this->componente3_model->get_actividades_divu();
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
        $i=4;
        
        $this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Cantidad de Actividades Registradas:');
		$this->phpexcel->getActiveSheet()->mergeCells("A$i:B$i");
		$this->phpexcel->getActiveSheet()->getStyle("A$i:B$i")->applyFromArray($estSubTitulos);
		$this->phpexcel->getActiveSheet()->mergeCells("C$i:F$i");
		$this->phpexcel->getActiveSheet()->getStyle("C$i:F$i")->applyFromArray($estCells);
		
			$cant_act=count($act_divu);
			$plural=($cant_act==1) ? " Actividad":" Actividades";
			$cant_act=$cant_act.$plural;
        
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", $cant_act);//imprime la cant de act de divulgacion
        
        $i=$i+2;
        foreach ($act_divu as $act) {
			$inicialA=$i;
				
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Nombre de la Actividad');
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", $act->divu_nombre);
			$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
			$i++;
			
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Fecha');
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", $act->divu_fecha);
			$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
			$i++;
			
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Tipo de Actividad');
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", $act->divu_tipo);
			$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
			$i++;
			
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Responsable de la Actividad');
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", $act->divu_responsable);
			$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
			$i++;
			
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Municipio en que se realiza');
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", $this->componente3_model->get_mun_nombre( $act->divu_municipio));
			$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
			$i++;
			
			$asis_act = $this->componente3_model->get_asistentes_divu($act->divu_id);
			
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Asistentes de la Actividad');
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", count($asis_act));
			$this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
			
			$this->phpexcel->getActiveSheet()->getStyle("B$inicialA:B$i")->applyFromArray($estEncabezado);
			$this->phpexcel->getActiveSheet()->getStyle("C$inicialA:C$i")->applyFromArray($estCells);
			$this->phpexcel->getActiveSheet()->getStyle("D$inicialA:D$i")->applyFromArray($estCells);
			
			$i=$i+2;
        }
        
        /*Finalizacion y Descarga*/
        $filename = "RepteComp3_DIVU_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
        
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
