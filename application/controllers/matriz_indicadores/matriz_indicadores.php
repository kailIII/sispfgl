<?php

/**
 * 
 *
 * @author
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class matriz_indicadores extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
    public function gestion_matriz($comp) {
		if(!isset($comp))
			$comp='0';
        $informacion['titulo'] = 'Matriz de Indicadores del Componente '.$comp;
        $informacion['componente']=$comp;
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('matriz_indicadores/matriz_indicadores_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
        
        
    }
    
    public function gestion_matriz_public($comp) {
		if(!isset($comp))
			$comp='0';
        $informacion['titulo'] = 'Matriz de Indicadores del Componente '.$comp;
        $informacion['componente']=$comp;
        //$informacion['user_id'] = $this->tank_auth->get_user_id();
        //$informacion['username'] = $this->tank_auth->get_username();
        //$informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('matriz_indicadores/matriz_indicadores_public_view', $informacion);
        $this->load->view('plantilla/footer', $informacion);
        
        
    }
    
    public function cargar_indicadores($comp) {
        $this->load->model('matriz_indicadores/matriz_indicadores_model');
        $ind = $this->matriz_indicadores_model->get_indicadores($comp);
        $numfilas = count($ind);

        $i = 0;
        foreach ($ind as $aux) {
			
			if($aux->planificado==0)
				$por_avance='0';
			else
				$por_avance=(($aux->total/$aux->planificado)*100);
			
            $rows[$i]['id'] = $aux->id;
            $rows[$i]['cell'] = array($aux->id,
                $aux->cod,
                $aux->indicador,
                $aux->linea_base,
                $aux->anio_1,
                $aux->anio_2,
                $aux->anio_3,
                $aux->anio_4,
                $aux->anio_5,
                $aux->total,
                $aux->planificado,
                $por_avance.'%',
                $aux->comentario
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
    
     public function actualizar_indicador() {
			 $indicador = $_POST;
			 $this->load->model('matriz_indicadores/matriz_indicadores_model');
			 $this->matriz_indicadores_model->actualizar_indicador($indicador);
	}
	
	public function add_new_ind(){
		$cod=$this->input->post("cod");
		$ind=$this->input->post("ind");

		$this->load->model('matriz_indicadores/matriz_indicadores_model');
		$this->matriz_indicadores_model->add_new_ind($cod, $ind);
			 
		echo '1';
	}
	
	public function export_excel($comp){
				/*Inicio*/
		$this->load->library('PHPExcel');
		$report=$this->phpexcel;
		$report->setActiveSheetIndex(0);
        $report->getActiveSheet()->setTitle('Reporte General CCC');
        
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
        if($comp!=0)
        $report->getActiveSheet()->setCellValue('C2', 'MAtriz de Indicadores del Componente '.$comp.'.');
        else
        $report->getActiveSheet()->setCellValue('C2', 'Matriz de Indicadores de Nivel Superior.');
        
        $report->getActiveSheet()->mergeCells('C2:I2');
        $report->getActiveSheet()->getStyle('C2:I2')->applyFromArray($estTitulos);
        
        $report->getActiveSheet()->getColumnDimension('A')->setWidth(6);
        $report->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $report->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $report->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $report->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $report->getActiveSheet()->getColumnDimension('F')->setWidth(12);
        $report->getActiveSheet()->getColumnDimension('G')->setWidth(12);
        $report->getActiveSheet()->getColumnDimension('H')->setWidth(12);
        $report->getActiveSheet()->getColumnDimension('I')->setWidth(12);
        $report->getActiveSheet()->getColumnDimension('J')->setWidth(12);
        $report->getActiveSheet()->getColumnDimension('K')->setWidth(12);
        $report->getActiveSheet()->getColumnDimension('L')->setWidth(25);
        
        $report->getActiveSheet()->setCellValue('A4', 'Codigo');
        $report->getActiveSheet()->setCellValue('B4', 'Indicador');
        $report->getActiveSheet()->setCellValue('C4', 'Linea Base');
        $report->getActiveSheet()->setCellValue('D4', 'Ejecutado 2011');
        $report->getActiveSheet()->setCellValue('E4', 'Ejecutado 2012');
        $report->getActiveSheet()->setCellValue('F4', 'Ejecutado 2013');
        $report->getActiveSheet()->setCellValue('G4', 'Ejecutado 2014');
        $report->getActiveSheet()->setCellValue('H4', 'Ejecutado 2015');
        $report->getActiveSheet()->setCellValue('I4', 'Total Ejecutado');
        $report->getActiveSheet()->setCellValue('J4', 'Total Planificado');
        $report->getActiveSheet()->setCellValue('K4', '% Avance');
        $report->getActiveSheet()->setCellValue('L4', 'Comentario');
        $report->getActiveSheet()->getStyle('A4:L4')->applyFromArray($estSubTitulos);
        
        $this->load->model('matriz_indicadores/matriz_indicadores_model');
        $ind = $this->matriz_indicadores_model->get_indicadores($comp);
        
        $i=5;
        foreach ($ind as $aux) {	
			if($aux->planificado==0)
				$por_avance='0';
			else
				$por_avance=(($aux->total/$aux->planificado)*100);
			
                $report->getActiveSheet()->setCellValue("A".$i, $aux->cod);
                $report->getActiveSheet()->setCellValue("B".$i, $aux->indicador);
                $report->getActiveSheet()->setCellValue("C".$i, $aux->linea_base);
                $report->getActiveSheet()->setCellValue("D".$i, $aux->anio_1);
                $report->getActiveSheet()->setCellValue("E".$i, $aux->anio_2);
                $report->getActiveSheet()->setCellValue("F".$i, $aux->anio_3);
                $report->getActiveSheet()->setCellValue("G".$i, $aux->anio_4);
                $report->getActiveSheet()->setCellValue("H".$i, $aux->anio_5);
                $report->getActiveSheet()->setCellValue("I".$i, $aux->total);
                $report->getActiveSheet()->setCellValue("J".$i, $aux->planificado);
                $report->getActiveSheet()->setCellValue("K".$i, $por_avance.'%');
                $report->getActiveSheet()->setCellValue("L".$i, $aux->comentario);
				
				$i++;
        }
        $i--;
        $report->getActiveSheet()->getStyle("A"."5:L".$i)->applyFromArray($estCells);
        
        /*Finalizacion y Descarga*/
        $filename = "Matriz_Indicadores_Comp".$comp."_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($report, 'Excel5');
        $objWriter->save('php://output');
        
	}
    
}
?>
