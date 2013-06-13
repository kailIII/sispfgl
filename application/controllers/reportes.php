<?php

/**
 * Contendrá todos los metodos utilizados para definir los reportes asociados a los 
 * diferentes componentes.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('PHPExcel');
    }

    public function gdrGeneral() {
        $this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('GR');
        //ENCABEZADO DEL DOCUMENTO
        $this->phpexcel->getActiveSheet()
                ->setCellValue('D3', 'Proceso de Elaboración del Proyecto');
        $this->phpexcel->getActiveSheet()->mergeCells('D3:E3');
        $estilos = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial'
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array(
                    'rgb' => 'FFFF99'
                )
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array(
                'outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
                )
        );
        $this->phpexcel->getActiveSheet()->getStyle('D3:E3')->applyFromArray($estilos);        
        $this->phpexcel->getActiveSheet()->getRowDimension('3')->setRowHeight(35);
        $this->phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $this->phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('D4', '(1) ENTRADA');
        $this->phpexcel->getActiveSheet()->mergeCells('D4:E4');
        $estilos = array(
            'font' => array(
                'italic' => true,
                'size' => 9,
                'name' => 'Arial'
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array(
                'outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
                )
        );
        $this->phpexcel->getActiveSheet()->getStyle('D4:E4')->applyFromArray($estilos);
        $this->phpexcel->getActiveSheet()->getRowDimension('4')->setRowHeight(25);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('D5', 'MUNICIPALIDAD  ENTREGA INFORMACIÓN EN GRD A ISDEM/UEP');        
        $estilos = array(
            'font' => array(
                'size' => 8,
                'name' => 'Arial'
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array(
                'outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
                )
        );        
        $this->phpexcel->getActiveSheet()
                ->setCellValue('E5', 'UEP ENTREGA CARTA DE RECEPCIÓN DE INFORMACIÓN RECIBIDA');        
        $this->phpexcel->getActiveSheet()->getStyle('D5')->applyFromArray($estilos);
        $this->phpexcel->getActiveSheet()->getStyle('E5')->applyFromArray($estilos);
        //SALIDA DEL DOCUMENTO
        $filename = "gdr_" . date("d-m-y") . ".xlsx"; //GUARDANDO CON ESTE NOMBRE
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
    }

}

?>
