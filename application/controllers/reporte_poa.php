<?php

/**
 * Contendrá todos los metodos utilizados para definir los reportes asociados a los 
 * diferentes componentes.
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reporte_poa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->model('poa/poa_actividad_seguimiento', 'seguimiento');
        $this->load->model('poa/poa_actividad_detalle', 'detalle');
        $this->load->model('poa/poa_actividad', 'actividad');
    }

    public function reportesPOA() {
        $anio = $this->input->post('anio');

        $this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('C1 FISDL');

        /* ESTILOS */
        $estEnc = array(
            'font' => array('bold' => true, 'size' => 18, 'name' => 'Arial', 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '04B4AE')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc2 = array(
            'font' => array('bold' => true, 'size' => 11, 'name' => 'Arial', 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '04B4AE')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc3 = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial', 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '04B4AE')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estCuerpo = array(
            'font' => array('size' => 10, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estCuerpoPadre = array(
            'font' => array('size' => 10, 'name' => 'Arial', 'bold' => true),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'DCDC87')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estCuerpoNegrita = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            )
        );
        $estCuerpoDer = array(
            'font' => array('size' => 10, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            )
        );
        $soloBorde = array(
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        //CARGANDO LOS MODELOS
        $this->load->model('poa/poa_componente', 'componente');
        $this->load->model('poa/poa_actividad', 'actividad');
        $this->load->model('poa/poa_indicador', 'indicador');
        $this->load->model('poa/poa_actividad_detalle', 'detalle');
        $this->load->model('poa/poa_actividad_seguimiento', 'seguimiento');
        $this->load->model('poa/poa_actividad_seg_tri', 'trimestral');
        $this->load->model('poa/poa_model', 'poa');

        $componente1 = $this->poa->obtener_por_id('poa_componente', 'poa_com_codigo', '1.');


        //ENCABEZADO DEL DOCUMENTO
        $this->phpexcel->getActiveSheet()
                ->setCellValue('B2', 'Proyecto de Fortalecimiento de los Gobiernos Locales PFGL
Préstamo BIRF 7916');
        $this->phpexcel->getActiveSheet()->mergeCells('B2:G2');
        $this->phpexcel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
        $this->phpexcel->getActiveSheet()->getStyle('B2:G2')->applyFromArray($estEnc);


        $this->phpexcel->getActiveSheet()
                ->setCellValue('B3', 'Componente');
        $this->phpexcel->getActiveSheet()->getStyle('B3')->applyFromArray($estCuerpoNegrita);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('C3', $componente1->poa_com_codigo . ' ' . $componente1->poa_com_descripcion);
        $this->phpexcel->getActiveSheet()->mergeCells('C3:G3');
        $this->phpexcel->getActiveSheet()->getStyle('C3:G3')->applyFromArray($estCuerpoDer);


        $this->phpexcel->getActiveSheet()
                ->setCellValue('B4', 'Subcomponente');
        $this->phpexcel->getActiveSheet()->getStyle('B4')->applyFromArray($estCuerpoNegrita);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('C4', 'N/A');
        $this->phpexcel->getActiveSheet()->mergeCells('C4:G4');
        $this->phpexcel->getActiveSheet()->getStyle('C4:G4')->applyFromArray($estCuerpoDer);


        $this->phpexcel->getActiveSheet()
                ->setCellValue('B5', 'Objetivo especìfico al que aporta:');
        $this->phpexcel->getActiveSheet()->mergeCells('B5:G5');
        $this->phpexcel->getActiveSheet()->getStyle('B5')->applyFromArray($estCuerpoNegrita);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('B6', $componente1->poa_com_objetivo);
        $this->phpexcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
        $this->phpexcel->getActiveSheet()->mergeCells('B6:G6');
        $this->phpexcel->getActiveSheet()->getStyle('B6:G6')->applyFromArray($estCuerpoDer);


        $this->phpexcel->getActiveSheet()
                ->setCellValue('B7', 'Resultado estratégico al que aporta:');
        $this->phpexcel->getActiveSheet()->mergeCells('B7:G7');
        $this->phpexcel->getActiveSheet()->getStyle('B7')->applyFromArray($estCuerpoNegrita);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('B8', $componente1->poa_com_resultado);
        $this->phpexcel->getActiveSheet()->mergeCells('B8:G8');
        $this->phpexcel->getActiveSheet()->getRowDimension('8')->setRowHeight(30);
        $this->phpexcel->getActiveSheet()->getStyle('B8:G8')->applyFromArray($estCuerpoDer);


        $this->phpexcel->getActiveSheet()
                ->setCellValue('B9', 'Indicador de logro a los 5 años: ');
        $this->phpexcel->getActiveSheet()->mergeCells('B9:G9');
        $this->phpexcel->getActiveSheet()->getStyle('B9')->applyFromArray($estCuerpoNegrita);
        $indicadores = $this->indicador->obtenerIndicadoresComponenteTipo($componente1->poa_com_id, 5);
        $cad = '';
        $i = 1;
        foreach ($indicadores as $ind) {
            $cad.=$i . ') ' . $ind->poa_ind_descripcion . "\r";
            $i++;
        }
        $this->phpexcel->getActiveSheet()
                ->setCellValue('B10', $cad);
        $this->phpexcel->getActiveSheet()->getRowDimension('10')->setRowHeight(60);
        $this->phpexcel->getActiveSheet()->mergeCells('B10:G10');
        $this->phpexcel->getActiveSheet()->getStyle('B10:G10')->applyFromArray($estCuerpoDer);


        $this->phpexcel->getActiveSheet()
                ->setCellValue('B11', 'Indicador de avance al segundo año:');
        $this->phpexcel->getActiveSheet()->mergeCells('B11:G11');
        $this->phpexcel->getActiveSheet()->getStyle('B11')->applyFromArray($estCuerpoNegrita);
        $indicadores = $this->indicador->obtenerIndicadoresComponenteTipo($componente1->poa_com_id, 2);
        $cad = '';
        $i = 1;
        foreach ($indicadores as $ind) {
            $cad.=$i . ') ' . $ind->poa_ind_descripcion . "\r";
            $i++;
        }
        $this->phpexcel->getActiveSheet()
                ->setCellValue('B12', $cad);
        $this->phpexcel->getActiveSheet()->mergeCells('B12:G12');
        $this->phpexcel->getActiveSheet()->getStyle('B12:G12')->applyFromArray($estCuerpoDer);
        $this->phpexcel->getActiveSheet()->getRowDimension('12')->setRowHeight(60);

        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
        $this->phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
        $this->phpexcel->getActiveSheet()->getStyle('B2:G12')->applyFromArray($soloBorde);

        //ENCABEZADO TABLA PRINCIPAL
        $this->phpexcel->getActiveSheet()
                ->setCellValue('B15', "Código Actividad");
        $this->phpexcel->getActiveSheet()->mergeCells('B15:B16');
        $this->phpexcel->getActiveSheet()->getStyle('B15:B16')->applyFromArray($estEnc2);


        $this->phpexcel->getActiveSheet()
                ->setCellValue('C15', "Actividad");
        $this->phpexcel->getActiveSheet()->mergeCells('C15:C16');
        $this->phpexcel->getActiveSheet()->getStyle('C15:C16')->applyFromArray($estEnc2);


        $this->phpexcel->getActiveSheet()->setCellValue('D14', "Año $anio");
        $this->phpexcel->getActiveSheet()->mergeCells('D14:G14');
        $this->phpexcel->getActiveSheet()->getStyle('D14:G14')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()->setCellValue('D15', "1º Semestre");
        $this->phpexcel->getActiveSheet()->mergeCells('D15:E15');
        $this->phpexcel->getActiveSheet()->getStyle('D15:E15')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()->setCellValue('D16', "Ene - Mar");
        $this->phpexcel->getActiveSheet()->setCellValue('E16', "Abr - Jun");
        $this->phpexcel->getActiveSheet()->getStyle('D16:E16')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(5);
        $this->phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
        $this->phpexcel->getActiveSheet()->setCellValue('F15', "2º Semestre");
        $this->phpexcel->getActiveSheet()->mergeCells('F15:G15');
        $this->phpexcel->getActiveSheet()->getStyle('F15:G15')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()->setCellValue('F16', "Jul - Sep");
        $this->phpexcel->getActiveSheet()->setCellValue('G16', "Oct - Dic");
        $this->phpexcel->getActiveSheet()->getStyle('F16:G16')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
        $this->phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);


        $this->phpexcel->getActiveSheet()->setCellValue('H15', "Fecha inicio");
        $this->phpexcel->getActiveSheet()->mergeCells('H15:H16');
        $this->phpexcel->getActiveSheet()->getStyle('H15:H16')->applyFromArray($estEnc3);

        $this->phpexcel->getActiveSheet()->setCellValue('I15', "Fecha final");
        $this->phpexcel->getActiveSheet()->mergeCells('I15:I16');
        $this->phpexcel->getActiveSheet()->getStyle('I15:I16')->applyFromArray($estEnc3);

        $this->phpexcel->getActiveSheet()->setCellValue('J15', "Meta Total");
        $this->phpexcel->getActiveSheet()->mergeCells('J15:J16');
        $this->phpexcel->getActiveSheet()->getStyle('J15:J16')->applyFromArray($estEnc3);

        $this->phpexcel->getActiveSheet()->setCellValue('K15', "Meta Acumulada a Dic " . ($anio - 1));
        $this->phpexcel->getActiveSheet()->mergeCells('K15:K16');
        $this->phpexcel->getActiveSheet()->getStyle('K15:K16')->applyFromArray($estEnc3);

        $this->phpexcel->getActiveSheet()->setCellValue('L15', "% Planificado a Dic " . ($anio - 1));
        $this->phpexcel->getActiveSheet()->mergeCells('L15:L16');
        $this->phpexcel->getActiveSheet()->getStyle('L15:L16')->applyFromArray($estEnc3);

        $this->phpexcel->getActiveSheet()->setCellValue('M15', "Meta Planificada para " . ($anio));
        $this->phpexcel->getActiveSheet()->mergeCells('M15:M16');
        $this->phpexcel->getActiveSheet()->getStyle('M15:M16')->applyFromArray($estEnc3);

        $this->phpexcel->getActiveSheet()->setCellValue('N15', "% Planificado para  " . ($anio));
        $this->phpexcel->getActiveSheet()->mergeCells('N15:N16');
        $this->phpexcel->getActiveSheet()->getStyle('N15:N16')->applyFromArray($estEnc3);

        $this->phpexcel->getActiveSheet()->setCellValue('O15', "% Planificado acumulado a " . ($anio));
        $this->phpexcel->getActiveSheet()->mergeCells('O15:O16');
        $this->phpexcel->getActiveSheet()->getStyle('O15:O16')->applyFromArray($estEnc3);

        $this->phpexcel->getActiveSheet()->setCellValue('P15', "% Pendiente de planificar para " . ($anio + 1) . " y " . ($anio + 2));
        $this->phpexcel->getActiveSheet()->mergeCells('P15:P16');
        $this->phpexcel->getActiveSheet()->getStyle('P15:P16')->applyFromArray($estEnc3);
        $this->phpexcel->getActiveSheet()->getRowDimension('15')->setRowHeight(25);
        $this->phpexcel->getActiveSheet()->getRowDimension('16')->setRowHeight(25);

        $actividades = $this->actividad->obtenerPorActividadDetalle($componente1->poa_com_id, $anio, 'poa_act_codigo');
        $i = 17;
        foreach ($actividades as $aux) {
            if (!is_null($aux->poa_act_padre)) {
                $this->phpexcel->getActiveSheet()->setCellValue("B$i", $aux->poa_act_codigo);
                $this->phpexcel->getActiveSheet()->setCellValue("C$i", $aux->poa_act_descripcion);
                for ($j = $aux->poa_act_mes_inicio; $j <= $aux->poa_actividad_mes_fin; $j++) {
                    if ($j >= 1 && $j <= 3)
                        $this->phpexcel->getActiveSheet()->setCellValue("D$i", "X");
                    if ($j >= 4 && $j <= 6)
                        $this->phpexcel->getActiveSheet()->setCellValue("E$i", "X");
                    if ($j >= 7 && $j <= 9)
                        $this->phpexcel->getActiveSheet()->setCellValue("F$i", "X");
                    if ($j >= 10 && $j <= 12)
                        $this->phpexcel->getActiveSheet()->setCellValue("G$i", "X");
                }
                switch ($aux->poa_act_mes_inicio) {
                    case 1: $variable = 'Enero';
                        break;
                    case 2: $variable = 'Febrero';
                        break;
                    case 3: $variable = 'Marzo';
                        break;
                    case 4: $variable = 'Abril';
                        break;
                    case 5: $variable = 'Mayo';
                        break;
                    case 6: $variable = 'Junio';
                        break;
                    case 7: $variable = 'Julio';
                        break;
                    case 8: $variable = 'Agosto';
                        break;
                    case 9: $variable = 'Septiembre';
                        break;
                    case 10: $variable = 'Octubre';
                        break;
                    case 11: $variable = 'Noviembre';
                        break;
                    case 12: $variable = 'Diciembre';
                        break;
                }
                $this->phpexcel->getActiveSheet()->setCellValue("H$i", $variable);
                switch ($aux->poa_actividad_mes_fin) {
                    case 1: $variable = 'Enero';
                        break;
                    case 2: $variable = 'Febrero';
                        break;
                    case 3: $variable = 'Marzo';
                        break;
                    case 4: $variable = 'Abril';
                        break;
                    case 5: $variable = 'Mayo';
                        break;
                    case 6: $variable = 'Junio';
                        break;
                    case 7: $variable = 'Julio';
                        break;
                    case 8: $variable = 'Agosto';
                        break;
                    case 9: $variable = 'Septiembre';
                        break;
                    case 10: $variable = 'Octubre';
                        break;
                    case 11: $variable = 'Noviembre';
                        break;
                    case 12: $variable = 'Diciembre';
                        break;
                }
                $this->phpexcel->getActiveSheet()->setCellValue("I$i", $variable);
                $this->phpexcel->getActiveSheet()->setCellValue("J$i", $aux->poa_act_meta_total);
                $this->phpexcel->getActiveSheet()->setCellValue("K$i", $aux->poa_act_det_meta_acumulada);
                $this->phpexcel->getActiveSheet()->setCellValue("L$i", "=K$i/J$i");
                $this->phpexcel->getActiveSheet()->getStyle("L$i")->getNumberFormat()->setFormatCode('0.000%');
                $this->phpexcel->getActiveSheet()->setCellValue("M$i", $aux->poa_act_det_meta_planificada);
                $this->phpexcel->getActiveSheet()->setCellValue("N$i", "=M$i/J$i");
                $this->phpexcel->getActiveSheet()->getStyle("N$i")->getNumberFormat()->setFormatCode('0.000%');
                $this->phpexcel->getActiveSheet()->setCellValue("O$i", "=N$i+L$i");
                $this->phpexcel->getActiveSheet()->getStyle("O$i")->getNumberFormat()->setFormatCode('0.000%');
                $this->phpexcel->getActiveSheet()->setCellValue("P$i", "=IF((1-O$i)<0,0,(1-O$i))");
                $this->phpexcel->getActiveSheet()->getStyle("P$i")->getNumberFormat()->setFormatCode('0.000%');



                $this->phpexcel->getActiveSheet()->getStyle("B$i:P$i")->applyFromArray($estCuerpo);
            } else {
                $this->phpexcel->getActiveSheet()->setCellValue("B$i", $aux->poa_act_codigo);
                $this->phpexcel->getActiveSheet()->setCellValue("C$i", $aux->poa_act_descripcion);
                $this->phpexcel->getActiveSheet()->mergeCells("C$i:P$i");
                $this->phpexcel->getActiveSheet()->getStyle("B$i:P$i")->applyFromArray($estCuerpoPadre);
            }
            $i++;
        }
        /* HOJA 2-5 */
        for ($k = 1; $k <= 4; $k++) {
            $this->phpexcel->createSheet($k);
            $this->phpexcel->setActiveSheetIndex($k);
            $var = ($k + 1);
            $this->phpexcel->getActiveSheet()->setTitle("C2.$var");

            $componente2 = $this->poa->obtener_por_id('poa_componente', 'poa_com_codigo', "2.$var.");

            if (count($componente2) != 0) {
                //ENCABEZADO DEL DOCUMENTO
                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B2', 'Proyecto de Fortalecimiento de los Gobiernos Locales PFGL
Préstamo BIRF 7916');
                $this->phpexcel->getActiveSheet()->mergeCells('B2:G2');
                $this->phpexcel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
                $this->phpexcel->getActiveSheet()->getStyle('B2:G2')->applyFromArray($estEnc);


                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B3', 'Componente');
                $this->phpexcel->getActiveSheet()->getStyle('B3')->applyFromArray($estCuerpoNegrita);
                //OBTENIENDO PADRE
                $padre = $this->poa->obtener_por_id('poa_componente', 'poa_com_id', $componente2->poa_com_padre);
                $this->phpexcel->getActiveSheet()
                        ->setCellValue('C3', $padre->poa_com_codigo . ' ' . $padre->poa_com_descripcion);
                $this->phpexcel->getActiveSheet()->mergeCells('C3:G3');
                $this->phpexcel->getActiveSheet()->getStyle('C3:G3')->applyFromArray($estCuerpoDer);


                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B4', 'Subcomponente');
                $this->phpexcel->getActiveSheet()->getStyle('B4')->applyFromArray($estCuerpoNegrita);
                $this->phpexcel->getActiveSheet()
                        ->setCellValue('C4', $componente2->poa_com_codigo . ' ' . $componente2->poa_com_descripcion);
                $this->phpexcel->getActiveSheet()->mergeCells('C4:G4');
                $this->phpexcel->getActiveSheet()->getStyle('C4:G4')->applyFromArray($estCuerpoDer);


                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B5', 'Objetivo especìfico al que aporta:');
                $this->phpexcel->getActiveSheet()->mergeCells('B5:G5');
                $this->phpexcel->getActiveSheet()->getStyle('B5')->applyFromArray($estCuerpoNegrita);
                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B6', $componente2->poa_com_objetivo);
                $this->phpexcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
                $this->phpexcel->getActiveSheet()->mergeCells('B6:G6');
                $this->phpexcel->getActiveSheet()->getStyle('B6:G6')->applyFromArray($estCuerpoDer);


                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B7', 'Resultado estratégico al que aporta:');
                $this->phpexcel->getActiveSheet()->mergeCells('B7:G7');
                $this->phpexcel->getActiveSheet()->getStyle('B7')->applyFromArray($estCuerpoNegrita);
                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B8', $componente2->poa_com_resultado);
                $this->phpexcel->getActiveSheet()->mergeCells('B8:G8');
                $this->phpexcel->getActiveSheet()->getRowDimension('8')->setRowHeight(30);
                $this->phpexcel->getActiveSheet()->getStyle('B8:G8')->applyFromArray($estCuerpoDer);


                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B9', 'Indicador de logro a los 5 años: ');
                $this->phpexcel->getActiveSheet()->mergeCells('B9:G9');
                $this->phpexcel->getActiveSheet()->getStyle('B9')->applyFromArray($estCuerpoNegrita);
                $indicadores = $this->indicador->obtenerIndicadoresComponenteTipo($componente2->poa_com_id, 5);
                $cad = '';
                $i = 1;
                foreach ($indicadores as $ind) {
                    $cad.=$i . ') ' . $ind->poa_ind_descripcion . "\r";
                    $i++;
                }
                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B10', $cad);
                $this->phpexcel->getActiveSheet()->getRowDimension('10')->setRowHeight(60);
                $this->phpexcel->getActiveSheet()->mergeCells('B10:G10');
                $this->phpexcel->getActiveSheet()->getStyle('B10:G10')->applyFromArray($estCuerpoDer);


                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B11', 'Indicador de avance al segundo año:');
                $this->phpexcel->getActiveSheet()->mergeCells('B11:G11');
                $this->phpexcel->getActiveSheet()->getStyle('B11')->applyFromArray($estCuerpoNegrita);
                $indicadores = $this->indicador->obtenerIndicadoresComponenteTipo($componente2->poa_com_id, 2);
                $cad = '';
                $i = 1;
                foreach ($indicadores as $ind) {
                    $cad.=$i . ') ' . $ind->poa_ind_descripcion . "\r";
                    $i++;
                }
                $this->phpexcel->getActiveSheet()
                        ->setCellValue('B12', $cad);
                $this->phpexcel->getActiveSheet()->mergeCells('B12:G12');
                $this->phpexcel->getActiveSheet()->getStyle('B12:G12')->applyFromArray($estCuerpoDer);
                $this->phpexcel->getActiveSheet()->getRowDimension('12')->setRowHeight(60);

                $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
                $this->phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
                $this->phpexcel->getActiveSheet()->getStyle('B2:G12')->applyFromArray($soloBorde);

                //CUERPO DEL COMPONENTE
                //ENCABEZADO
                $this->phpexcel->getActiveSheet()->setCellValue('A15', "Código \r Presupuestario");
                $this->phpexcel->getActiveSheet()->mergeCells('A15:A16');
                $this->phpexcel->getActiveSheet()->getStyle('A15:A16')->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('B15', "Código Actividad");
                $this->phpexcel->getActiveSheet()->mergeCells('B15:B16');
                $this->phpexcel->getActiveSheet()->getStyle('B15:B16')->applyFromArray($estEnc2);


                $this->phpexcel->getActiveSheet()->setCellValue('C15', "Actividad");
                $this->phpexcel->getActiveSheet()->mergeCells('C15:C16');
                $this->phpexcel->getActiveSheet()->getStyle('C15:C16')->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('D15', "Unidad de \r Medida");
                $this->phpexcel->getActiveSheet()->mergeCells('D15:D16');
                $this->phpexcel->getActiveSheet()->getStyle('D15:D16')->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('E15', "Cantidad");
                $this->phpexcel->getActiveSheet()->mergeCells("E15:E16");
                $this->phpexcel->getActiveSheet()->getStyle("E15:E16")->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('F15', "Costo\rUnitario \r ($)");
                $this->phpexcel->getActiveSheet()->mergeCells("F15:F16");
                $this->phpexcel->getActiveSheet()->getStyle("F15:F16")->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('G15', "Costo Total \r ($)");
                $this->phpexcel->getActiveSheet()->mergeCells("G15:G16");
                $this->phpexcel->getActiveSheet()->getStyle("G15:G16")->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('H15', "Responsable");
                $this->phpexcel->getActiveSheet()->mergeCells("H15:H16");
                $this->phpexcel->getActiveSheet()->getStyle("H15:H16")->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('I15', "Producto");
                $this->phpexcel->getActiveSheet()->mergeCells("I15:I16");
                $this->phpexcel->getActiveSheet()->getStyle("I15:I16")->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('J14', "Año $anio");
                $this->phpexcel->getActiveSheet()->mergeCells('J14:U14');
                $this->phpexcel->getActiveSheet()->getStyle('J14:U14')->applyFromArray($estEnc2);
                $this->phpexcel->getActiveSheet()->setCellValue('J15', "1º Semestre");
                $this->phpexcel->getActiveSheet()->mergeCells('J15:O15');
                $this->phpexcel->getActiveSheet()->getStyle('J15:O15')->applyFromArray($estEnc2);
                $this->phpexcel->getActiveSheet()->setCellValue('J16', "Ene");
                $this->phpexcel->getActiveSheet()->setCellValue('K16', "Feb");
                $this->phpexcel->getActiveSheet()->setCellValue('L16', "Mar");
                $this->phpexcel->getActiveSheet()->setCellValue('M16', "Abr");
                $this->phpexcel->getActiveSheet()->setCellValue('N16', "May");
                $this->phpexcel->getActiveSheet()->setCellValue('O16', "Jun");
                $this->phpexcel->getActiveSheet()->setCellValue('P15', "2º Semestre");
                $this->phpexcel->getActiveSheet()->mergeCells('P15:U15');
                $this->phpexcel->getActiveSheet()->getStyle('P15:U15')->applyFromArray($estEnc2);
                $this->phpexcel->getActiveSheet()->setCellValue('P16', "Jul");
                $this->phpexcel->getActiveSheet()->setCellValue('Q16', "Ago");
                $this->phpexcel->getActiveSheet()->setCellValue('R16', "Sep");
                $this->phpexcel->getActiveSheet()->setCellValue('S16', "Oct");
                $this->phpexcel->getActiveSheet()->setCellValue('T16', "Nov");
                $this->phpexcel->getActiveSheet()->setCellValue('U16', "Dic");
                $this->phpexcel->getActiveSheet()->getStyle('J16:U16')->applyFromArray($estEnc2);
                $this->phpexcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('P')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
                $this->phpexcel->getActiveSheet()->getColumnDimension('U')->setWidth(5);

                $this->phpexcel->getActiveSheet()->setCellValue('V15', "Realiza");
                $this->phpexcel->getActiveSheet()->mergeCells("V15:V16");
                $this->phpexcel->getActiveSheet()->getStyle("V15:V16")->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue("W15", "Fecha de\rentrega de \rTDRs o ET");
                $this->phpexcel->getActiveSheet()->mergeCells("W15:W16");
                $this->phpexcel->getActiveSheet()->getStyle("W15:W16")->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue("X15", "Periodo\rejecución\ractividad");
                $this->phpexcel->getActiveSheet()->mergeCells("X15:X16");
                $this->phpexcel->getActiveSheet()->getStyle("X15:X16")->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue("Y15", "Monto estimado");
                $this->phpexcel->getActiveSheet()->mergeCells("Y15:Y16");
                $this->phpexcel->getActiveSheet()->getStyle("Y15:Y16")->applyFromArray($estEnc2);
                $this->phpexcel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);

                $this->phpexcel->getActiveSheet()->setCellValue("Z15", "Método de Contratación");
                $this->phpexcel->getActiveSheet()->mergeCells("Z15:Z16");
                $this->phpexcel->getActiveSheet()->getStyle("Z15:Z16")->applyFromArray($estEnc2);
                $this->phpexcel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);

                $this->phpexcel->getActiveSheet()->setCellValue("AA15", "No. Correlativo \r en PAC");
                $this->phpexcel->getActiveSheet()->mergeCells("AA15:AA16");
                $this->phpexcel->getActiveSheet()->getStyle("AA15:AA16")->applyFromArray($estEnc2);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);

                $this->phpexcel->getActiveSheet()->setCellValue('AB15', "Fecha inicio");
                $this->phpexcel->getActiveSheet()->mergeCells('AB15:AB16');
                $this->phpexcel->getActiveSheet()->getStyle('AB15:AB16')->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('AC15', "Fecha final");
                $this->phpexcel->getActiveSheet()->mergeCells('AC15:AC16');
                $this->phpexcel->getActiveSheet()->getStyle('AC15:AC16')->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('AD15', "Desembolsos $anio");
                $this->phpexcel->getActiveSheet()->mergeCells('AD15:AO15');
                $this->phpexcel->getActiveSheet()->getStyle('AD15:AO15')->applyFromArray($estEnc2);
                $this->phpexcel->getActiveSheet()->setCellValue('AD16', "Enero");
                $this->phpexcel->getActiveSheet()->setCellValue('AE16', "Febrero");
                $this->phpexcel->getActiveSheet()->setCellValue('AF16', "Marzo");
                $this->phpexcel->getActiveSheet()->setCellValue('AG16', "Abril");
                $this->phpexcel->getActiveSheet()->setCellValue('AH16', "Mayo");
                $this->phpexcel->getActiveSheet()->setCellValue('AI16', "Junio");
                $this->phpexcel->getActiveSheet()->setCellValue('AJ16', "Julio");
                $this->phpexcel->getActiveSheet()->setCellValue('AK16', "Agosto");
                $this->phpexcel->getActiveSheet()->setCellValue('AL16', "Septiembre");
                $this->phpexcel->getActiveSheet()->setCellValue('AM16', "Octubre");
                $this->phpexcel->getActiveSheet()->setCellValue('AN16', "Noviembre");
                $this->phpexcel->getActiveSheet()->setCellValue('AO16', "Diciembre");
                $this->phpexcel->getActiveSheet()->getStyle('AD16:AO16')->applyFromArray($estEnc2);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AD')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AE')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AF')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AG')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AH')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AI')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AK')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AL')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AM')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AN')->setWidth(10);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AO')->setWidth(10);

                $this->phpexcel->getActiveSheet()->setCellValue('AP15', "Total BIRF");
                $this->phpexcel->getActiveSheet()->mergeCells('AP15:AP16');
                $this->phpexcel->getActiveSheet()->getStyle('AP15:AP16')->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('AQ15', "Total \rContrapartida");
                $this->phpexcel->getActiveSheet()->mergeCells('AQ15:AQ16');
                $this->phpexcel->getActiveSheet()->getStyle('AQ15:AQ16')->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('AR15', "Total \rProyecto");
                $this->phpexcel->getActiveSheet()->mergeCells('AR15:AR16');
                $this->phpexcel->getActiveSheet()->getStyle('AR15:AR16')->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->setCellValue('AS15', "Pendiente \r para " . ($anio + 1));
                $this->phpexcel->getActiveSheet()->mergeCells('AS15:AS16');
                $this->phpexcel->getActiveSheet()->getStyle('AS15:AS16')->applyFromArray($estEnc2);

                $this->phpexcel->getActiveSheet()->getRowDimension('15')->setRowHeight(25);
                $this->phpexcel->getActiveSheet()->getRowDimension('16')->setRowHeight(25);
                $actividades = $this->actividad->obtenerPorActividadDetalle($componente2->poa_com_id, $anio, 'poa_act_id');
                $i = 17;
                foreach ($actividades as $aux) {
                    $this->phpexcel->getActiveSheet()->setCellValue("A$i", $aux->poa_act_cod_presupuestario);
                    $this->phpexcel->getActiveSheet()->setCellValue("B$i", $aux->poa_act_codigo);
                    $this->phpexcel->getActiveSheet()->setCellValue("C$i", $aux->poa_act_descripcion);
                    $this->phpexcel->getActiveSheet()->setCellValue("D$i", $aux->poa_act_unidad_medida);
                    if ($aux->poa_act_cantidad != 0)
                        $this->phpexcel->getActiveSheet()->setCellValue("E$i", $aux->poa_act_cantidad);
                    if ($aux->poa_act_costo_unitario != 0)
                        $this->phpexcel->getActiveSheet()->setCellValue("F$i", $aux->poa_act_costo_unitario);
                    $this->phpexcel->getActiveSheet()->setCellValue("G$i", $aux->poa_act_meta_total);
                    $this->phpexcel->getActiveSheet()->getStyle("G$i")->getNumberFormat()->setFormatCode("$ #,###,###.##");
                    $this->phpexcel->getActiveSheet()->setCellValue("H$i", $aux->poa_act_responsable);
                    $this->phpexcel->getActiveSheet()->setCellValue("I$i", $aux->poa_act_producto);
                    for ($j = $aux->poa_act_mes_inicio; $j <= $aux->poa_actividad_mes_fin; $j++) {
                        switch ($j) {
                            case 1: $this->phpexcel->getActiveSheet()->setCellValue("J$i", "X");
                                break;
                            case 2: $this->phpexcel->getActiveSheet()->setCellValue("K$i", "X");
                                break;
                            case 3: $this->phpexcel->getActiveSheet()->setCellValue("L$i", "X");
                                break;
                            case 4: $this->phpexcel->getActiveSheet()->setCellValue("M$i", "X");
                                break;
                            case 5: $this->phpexcel->getActiveSheet()->setCellValue("N$i", "X");
                                break;
                            case 6: $this->phpexcel->getActiveSheet()->setCellValue("O$i", "X");
                                break;
                            case 7: $this->phpexcel->getActiveSheet()->setCellValue("P$i", "X");
                                break;
                            case 8: $this->phpexcel->getActiveSheet()->setCellValue("Q$i", "X");
                                break;
                            case 9: $this->phpexcel->getActiveSheet()->setCellValue("R$i", "X");
                                break;
                            case 10: $this->phpexcel->getActiveSheet()->setCellValue("S$i", "X");
                                break;
                            case 11: $this->phpexcel->getActiveSheet()->setCellValue("T$i", "X");
                                break;
                            case 12: $this->phpexcel->getActiveSheet()->setCellValue("U$i", "X");
                                break;
                        }
                    }
                    if ($aux->poa_act_realiza != '0')
                        $this->phpexcel->getActiveSheet()->setCellValue("V$i", $aux->poa_act_realiza);
                    $this->phpexcel->getActiveSheet()->setCellValue("W$i", $aux->poa_act_ftdrs);
                    if ($aux->poa_act_periodo_car != 0)
                        $this->phpexcel->getActiveSheet()->setCellValue("X$i", $aux->poa_act_periodo_car . " " . $aux->poa_act_periodo_tipo);
                    $this->phpexcel->getActiveSheet()->setCellValue("Y$i", $aux->poa_act_monto_estimado);
                    $this->phpexcel->getActiveSheet()->getStyle("Y$i")->getNumberFormat()->setFormatCode("$ #,###,###");
                    if ($aux->poa_act_metodo != '0')
                        $this->phpexcel->getActiveSheet()->setCellValue("Z$i", $aux->poa_act_metodo);
                    if ($aux->poa_act_pac != '0')
                        $this->phpexcel->getActiveSheet()->setCellValue("AA$i", $aux->poa_act_pac);
                    $this->phpexcel->getActiveSheet()->getColumnDimension('AO')->setWidth(25);
                    switch ($aux->poa_act_mes_inicio) {
                        case 1: $variable = 'Enero';
                            break;
                        case 2: $variable = 'Febrero';
                            break;
                        case 3: $variable = 'Marzo';
                            break;
                        case 4: $variable = 'Abril';
                            break;
                        case 5: $variable = 'Mayo';
                            break;
                        case 6: $variable = 'Junio';
                            break;
                        case 7: $variable = 'Julio';
                            break;
                        case 8: $variable = 'Agosto';
                            break;
                        case 9: $variable = 'Septiembre';
                            break;
                        case 10: $variable = 'Octubre';
                            break;
                        case 11: $variable = 'Noviembre';
                            break;
                        case 12: $variable = 'Diciembre';
                            break;
                    }
                    $this->phpexcel->getActiveSheet()->setCellValue("AB$i", $variable);
                    switch ($aux->poa_actividad_mes_fin) {
                        case 1: $variable = 'Enero';
                            break;
                        case 2: $variable = 'Febrero';
                            break;
                        case 3: $variable = 'Marzo';
                            break;
                        case 4: $variable = 'Abril';
                            break;
                        case 5: $variable = 'Mayo';
                            break;
                        case 6: $variable = 'Junio';
                            break;
                        case 7: $variable = 'Julio';
                            break;
                        case 8: $variable = 'Agosto';
                            break;
                        case 9: $variable = 'Septiembre';
                            break;
                        case 10: $variable = 'Octubre';
                            break;
                        case 11: $variable = 'Noviembre';
                            break;
                        case 12: $variable = 'Diciembre';
                            break;
                    }
                    $this->phpexcel->getActiveSheet()->setCellValue("AC$i", $variable);

                    $seguimientos = $this->seguimiento->obtenerSeguimientoActividad($aux->poa_act_det_id);
                    foreach ($seguimientos as $seg) {
                        switch ($seg->poa_act_seg_mes) {
                            case 1: $this->phpexcel->getActiveSheet()->setCellValue("AD$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 2: $this->phpexcel->getActiveSheet()->setCellValue("AE$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 3: $this->phpexcel->getActiveSheet()->setCellValue("AF$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 4: $this->phpexcel->getActiveSheet()->setCellValue("AG$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 5: $this->phpexcel->getActiveSheet()->setCellValue("AH$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 6: $this->phpexcel->getActiveSheet()->setCellValue("AI$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 7: $this->phpexcel->getActiveSheet()->setCellValue("AJ$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 8: $this->phpexcel->getActiveSheet()->setCellValue("AK$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 9: $this->phpexcel->getActiveSheet()->setCellValue("AL$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 10: $this->phpexcel->getActiveSheet()->setCellValue("AM$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 11: $this->phpexcel->getActiveSheet()->setCellValue("AN$i", $seg->poa_act_seg_desembolso);
                                break;
                            case 12: $this->phpexcel->getActiveSheet()->setCellValue("AO$i", $seg->poa_act_seg_desembolso);
                                break;
                        }
                    }

                    /*
                      $this->phpexcel->getActiveSheet()->getStyle("O$i")->getNumberFormat()->setFormatCode('0.000%');
                      $this->phpexcel->getActiveSheet()->setCellValue("P$i", "=IF((1-O$i)<0,0,(1-O$i))");
                     */
                    $this->phpexcel->getActiveSheet()->setCellValue("AP$i", $aux->poa_act_det_birf);
                    $this->phpexcel->getActiveSheet()->setCellValue("AQ$i", $aux->poa_act_det_contrapartida);
                    $this->phpexcel->getActiveSheet()->setCellValue("AR$i", $aux->poa_act_det_total_proyecto);
                    $this->phpexcel->getActiveSheet()->setCellValue("AS$i", "=IF((G$i-AP$i)<0,0,(G$i-AP$i))");

                    $this->phpexcel->getActiveSheet()->getStyle("AD$i:AS$i")->getNumberFormat()->setFormatCode("$ #,###,###.##");

                    $this->phpexcel->getActiveSheet()->getStyle("A$i:AS$i")->applyFromArray($estCuerpo);
                    $i++;
                }
            }
        }

//COMPONENTE 3
        $this->phpexcel->createSheet($k);
        $this->phpexcel->setActiveSheetIndex($k);
        $this->phpexcel->getActiveSheet()->setTitle("C3");

        $componente3 = $this->poa->obtener_por_id('poa_componente', 'poa_com_codigo', "3.1.");
        if (count($componente3) != 0) {
            //ENCABEZADO DEL DOCUMENTO
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B2', 'Proyecto de Fortalecimiento de los Gobiernos Locales PFGL
Préstamo BIRF 7916');
            $this->phpexcel->getActiveSheet()->mergeCells('B2:G2');
            $this->phpexcel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
            $this->phpexcel->getActiveSheet()->getStyle('B2:G2')->applyFromArray($estEnc);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B3', 'Componente');
            $this->phpexcel->getActiveSheet()->getStyle('B3')->applyFromArray($estCuerpoNegrita);
            //OBTENIENDO PADRE
            $padre = $this->poa->obtener_por_id('poa_componente', 'poa_com_id', $componente3->poa_com_padre);
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('C3', $padre->poa_com_codigo . ' ' . $padre->poa_com_descripcion);
            $this->phpexcel->getActiveSheet()->mergeCells('C3:G3');
            $this->phpexcel->getActiveSheet()->getStyle('C3:G3')->applyFromArray($estCuerpoDer);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B4', 'Subcomponente');
            $this->phpexcel->getActiveSheet()->getStyle('B4')->applyFromArray($estCuerpoNegrita);
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('C4', $componente3->poa_com_codigo . ' ' . $componente3->poa_com_descripcion);
            $this->phpexcel->getActiveSheet()->mergeCells('C4:G4');
            $this->phpexcel->getActiveSheet()->getStyle('C4:G4')->applyFromArray($estCuerpoDer);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B5', 'Objetivo especìfico al que aporta:');
            $this->phpexcel->getActiveSheet()->mergeCells('B5:G5');
            $this->phpexcel->getActiveSheet()->getStyle('B5')->applyFromArray($estCuerpoNegrita);
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B6', $componente3->poa_com_objetivo);
            $this->phpexcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
            $this->phpexcel->getActiveSheet()->mergeCells('B6:G6');
            $this->phpexcel->getActiveSheet()->getStyle('B6:G6')->applyFromArray($estCuerpoDer);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B7', 'Resultado estratégico al que aporta:');
            $this->phpexcel->getActiveSheet()->mergeCells('B7:G7');
            $this->phpexcel->getActiveSheet()->getStyle('B7')->applyFromArray($estCuerpoNegrita);
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B8', $componente3->poa_com_resultado);
            $this->phpexcel->getActiveSheet()->mergeCells('B8:G8');
            $this->phpexcel->getActiveSheet()->getRowDimension('8')->setRowHeight(30);
            $this->phpexcel->getActiveSheet()->getStyle('B8:G8')->applyFromArray($estCuerpoDer);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B9', 'Indicador de logro a los 5 años: ');
            $this->phpexcel->getActiveSheet()->mergeCells('B9:G9');
            $this->phpexcel->getActiveSheet()->getStyle('B9')->applyFromArray($estCuerpoNegrita);
            $indicadores = $this->indicador->obtenerIndicadoresComponenteTipo($componente3->poa_com_id, 5);
            $cad = '';
            $i = 1;
            foreach ($indicadores as $ind) {
                $cad.=$i . ') ' . $ind->poa_ind_descripcion . "\r";
                $i++;
            }
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B10', $cad);
            $this->phpexcel->getActiveSheet()->getRowDimension('10')->setRowHeight(60);
            $this->phpexcel->getActiveSheet()->mergeCells('B10:G10');
            $this->phpexcel->getActiveSheet()->getStyle('B10:G10')->applyFromArray($estCuerpoDer);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B11', 'Indicador de avance al segundo año:');
            $this->phpexcel->getActiveSheet()->mergeCells('B11:G11');
            $this->phpexcel->getActiveSheet()->getStyle('B11')->applyFromArray($estCuerpoNegrita);
            $indicadores = $this->indicador->obtenerIndicadoresComponenteTipo($componente3->poa_com_id, 2);
            $cad = '';
            $i = 1;
            foreach ($indicadores as $ind) {
                $cad.=$i . ') ' . $ind->poa_ind_descripcion . "\r";
                $i++;
            }
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B12', $cad);
            $this->phpexcel->getActiveSheet()->mergeCells('B12:G12');
            $this->phpexcel->getActiveSheet()->getStyle('B12:G12')->applyFromArray($estCuerpoDer);
            $this->phpexcel->getActiveSheet()->getRowDimension('12')->setRowHeight(60);

            $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
            $this->phpexcel->getActiveSheet()->getStyle('B2:G12')->applyFromArray($soloBorde);

            //CUERPO DEL COMPONENTE
            //ENCABEZADO
            $this->phpexcel->getActiveSheet()->setCellValue('A15', "Código \r Presupuestario");
            $this->phpexcel->getActiveSheet()->mergeCells('A15:A16');
            $this->phpexcel->getActiveSheet()->getStyle('A15:A16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('B15', "Código Actividad");
            $this->phpexcel->getActiveSheet()->mergeCells('B15:B16');
            $this->phpexcel->getActiveSheet()->getStyle('B15:B16')->applyFromArray($estEnc2);


            $this->phpexcel->getActiveSheet()->setCellValue('C15', "Actividad");
            $this->phpexcel->getActiveSheet()->mergeCells('C15:C16');
            $this->phpexcel->getActiveSheet()->getStyle('C15:C16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('D15', "Unidad de \r Medida");
            $this->phpexcel->getActiveSheet()->mergeCells('D15:D16');
            $this->phpexcel->getActiveSheet()->getStyle('D15:D16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('E15', "Cantidad");
            $this->phpexcel->getActiveSheet()->mergeCells("E15:E16");
            $this->phpexcel->getActiveSheet()->getStyle("E15:E16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('F15', "Costo\rUnitario \r ($)");
            $this->phpexcel->getActiveSheet()->mergeCells("F15:F16");
            $this->phpexcel->getActiveSheet()->getStyle("F15:F16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('G15', "Costo Total \r ($)");
            $this->phpexcel->getActiveSheet()->mergeCells("G15:G16");
            $this->phpexcel->getActiveSheet()->getStyle("G15:G16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('H15', "Responsable");
            $this->phpexcel->getActiveSheet()->mergeCells("H15:H16");
            $this->phpexcel->getActiveSheet()->getStyle("H15:H16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('I15', "Producto");
            $this->phpexcel->getActiveSheet()->mergeCells("I15:I16");
            $this->phpexcel->getActiveSheet()->getStyle("I15:I16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('J14', "Año $anio");
            $this->phpexcel->getActiveSheet()->mergeCells('J14:U14');
            $this->phpexcel->getActiveSheet()->getStyle('J14:U14')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->setCellValue('J15', "1º Semestre");
            $this->phpexcel->getActiveSheet()->mergeCells('J15:O15');
            $this->phpexcel->getActiveSheet()->getStyle('J15:O15')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->setCellValue('J16', "Ene");
            $this->phpexcel->getActiveSheet()->setCellValue('K16', "Feb");
            $this->phpexcel->getActiveSheet()->setCellValue('L16', "Mar");
            $this->phpexcel->getActiveSheet()->setCellValue('M16', "Abr");
            $this->phpexcel->getActiveSheet()->setCellValue('N16', "May");
            $this->phpexcel->getActiveSheet()->setCellValue('O16', "Jun");
            $this->phpexcel->getActiveSheet()->setCellValue('P15', "2º Semestre");
            $this->phpexcel->getActiveSheet()->mergeCells('P15:U15');
            $this->phpexcel->getActiveSheet()->getStyle('P15:U15')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->setCellValue('P16', "Jul");
            $this->phpexcel->getActiveSheet()->setCellValue('Q16', "Ago");
            $this->phpexcel->getActiveSheet()->setCellValue('R16', "Sep");
            $this->phpexcel->getActiveSheet()->setCellValue('S16', "Oct");
            $this->phpexcel->getActiveSheet()->setCellValue('T16', "Nov");
            $this->phpexcel->getActiveSheet()->setCellValue('U16', "Dic");
            $this->phpexcel->getActiveSheet()->getStyle('J16:U16')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('P')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('U')->setWidth(5);

            $this->phpexcel->getActiveSheet()->setCellValue('V15', "Realiza");
            $this->phpexcel->getActiveSheet()->mergeCells("V15:V16");
            $this->phpexcel->getActiveSheet()->getStyle("V15:V16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue("W15", "Fecha de\rentrega de \rTDRs o ET");
            $this->phpexcel->getActiveSheet()->mergeCells("W15:W16");
            $this->phpexcel->getActiveSheet()->getStyle("W15:W16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue("X15", "Periodo\rejecución\ractividad");
            $this->phpexcel->getActiveSheet()->mergeCells("X15:X16");
            $this->phpexcel->getActiveSheet()->getStyle("X15:X16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue("Y15", "Monto estimado");
            $this->phpexcel->getActiveSheet()->mergeCells("Y15:Y16");
            $this->phpexcel->getActiveSheet()->getStyle("Y15:Y16")->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);

            $this->phpexcel->getActiveSheet()->setCellValue("Z15", "Método de Contratación");
            $this->phpexcel->getActiveSheet()->mergeCells("Z15:Z16");
            $this->phpexcel->getActiveSheet()->getStyle("Z15:Z16")->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);

            $this->phpexcel->getActiveSheet()->setCellValue("AA15", "No. Correlativo \r en PAC");
            $this->phpexcel->getActiveSheet()->mergeCells("AA15:AA16");
            $this->phpexcel->getActiveSheet()->getStyle("AA15:AA16")->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);

            $this->phpexcel->getActiveSheet()->setCellValue('AB15', "Fecha inicio");
            $this->phpexcel->getActiveSheet()->mergeCells('AB15:AB16');
            $this->phpexcel->getActiveSheet()->getStyle('AB15:AB16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('AC15', "Fecha final");
            $this->phpexcel->getActiveSheet()->mergeCells('AC15:AC16');
            $this->phpexcel->getActiveSheet()->getStyle('AC15:AC16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('AD15', "Desembolsos $anio");
            $this->phpexcel->getActiveSheet()->mergeCells('AD15:AO15');
            $this->phpexcel->getActiveSheet()->getStyle('AD15:AO15')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->setCellValue('AD16', "Enero");
            $this->phpexcel->getActiveSheet()->setCellValue('AE16', "Febrero");
            $this->phpexcel->getActiveSheet()->setCellValue('AF16', "Marzo");
            $this->phpexcel->getActiveSheet()->setCellValue('AG16', "Abril");
            $this->phpexcel->getActiveSheet()->setCellValue('AH16', "Mayo");
            $this->phpexcel->getActiveSheet()->setCellValue('AI16', "Junio");
            $this->phpexcel->getActiveSheet()->setCellValue('AJ16', "Julio");
            $this->phpexcel->getActiveSheet()->setCellValue('AK16', "Agosto");
            $this->phpexcel->getActiveSheet()->setCellValue('AL16', "Septiembre");
            $this->phpexcel->getActiveSheet()->setCellValue('AM16', "Octubre");
            $this->phpexcel->getActiveSheet()->setCellValue('AN16', "Noviembre");
            $this->phpexcel->getActiveSheet()->setCellValue('AO16', "Diciembre");
            $this->phpexcel->getActiveSheet()->getStyle('AD16:AO16')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AD')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AE')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AF')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AG')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AH')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AI')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AK')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AL')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AM')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AN')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AO')->setWidth(10);

            $this->phpexcel->getActiveSheet()->setCellValue('AP15', "Total BIRF");
            $this->phpexcel->getActiveSheet()->mergeCells('AP15:AP16');
            $this->phpexcel->getActiveSheet()->getStyle('AP15:AP16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('AQ15', "Total \rContrapartida");
            $this->phpexcel->getActiveSheet()->mergeCells('AQ15:AQ16');
            $this->phpexcel->getActiveSheet()->getStyle('AQ15:AQ16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('AR15', "Total \rProyecto");
            $this->phpexcel->getActiveSheet()->mergeCells('AR15:AR16');
            $this->phpexcel->getActiveSheet()->getStyle('AR15:AR16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('AS15', "Pendiente \r para " . ($anio + 1));
            $this->phpexcel->getActiveSheet()->mergeCells('AS15:AS16');
            $this->phpexcel->getActiveSheet()->getStyle('AS15:AS16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->getRowDimension('15')->setRowHeight(25);
            $this->phpexcel->getActiveSheet()->getRowDimension('16')->setRowHeight(25);
            $actividades = $this->actividad->obtenerPorActividadDetalle($componente3->poa_com_id, $anio, 'poa_act_id');
            $i = 17;
            foreach ($actividades as $aux) {
                $this->phpexcel->getActiveSheet()->setCellValue("A$i", $aux->poa_act_cod_presupuestario);
                $this->phpexcel->getActiveSheet()->setCellValue("B$i", $aux->poa_act_codigo);
                $this->phpexcel->getActiveSheet()->setCellValue("C$i", $aux->poa_act_descripcion);
                $this->phpexcel->getActiveSheet()->setCellValue("D$i", $aux->poa_act_unidad_medida);
                if ($aux->poa_act_cantidad != 0)
                    $this->phpexcel->getActiveSheet()->setCellValue("E$i", $aux->poa_act_cantidad);
                if ($aux->poa_act_costo_unitario != 0)
                    $this->phpexcel->getActiveSheet()->setCellValue("F$i", $aux->poa_act_costo_unitario);
                $this->phpexcel->getActiveSheet()->setCellValue("G$i", $aux->poa_act_meta_total);
                $this->phpexcel->getActiveSheet()->getStyle("G$i")->getNumberFormat()->setFormatCode("$ #,###,###.##");
                $this->phpexcel->getActiveSheet()->setCellValue("H$i", $aux->poa_act_responsable);
                $this->phpexcel->getActiveSheet()->setCellValue("I$i", $aux->poa_act_producto);
                for ($j = $aux->poa_act_mes_inicio; $j <= $aux->poa_actividad_mes_fin; $j++) {
                    switch ($j) {
                        case 1: $this->phpexcel->getActiveSheet()->setCellValue("J$i", "X");
                            break;
                        case 2: $this->phpexcel->getActiveSheet()->setCellValue("K$i", "X");
                            break;
                        case 3: $this->phpexcel->getActiveSheet()->setCellValue("L$i", "X");
                            break;
                        case 4: $this->phpexcel->getActiveSheet()->setCellValue("M$i", "X");
                            break;
                        case 5: $this->phpexcel->getActiveSheet()->setCellValue("N$i", "X");
                            break;
                        case 6: $this->phpexcel->getActiveSheet()->setCellValue("O$i", "X");
                            break;
                        case 7: $this->phpexcel->getActiveSheet()->setCellValue("P$i", "X");
                            break;
                        case 8: $this->phpexcel->getActiveSheet()->setCellValue("Q$i", "X");
                            break;
                        case 9: $this->phpexcel->getActiveSheet()->setCellValue("R$i", "X");
                            break;
                        case 10: $this->phpexcel->getActiveSheet()->setCellValue("S$i", "X");
                            break;
                        case 11: $this->phpexcel->getActiveSheet()->setCellValue("T$i", "X");
                            break;
                        case 12: $this->phpexcel->getActiveSheet()->setCellValue("U$i", "X");
                            break;
                    }
                }
                if ($aux->poa_act_realiza != '0')
                    $this->phpexcel->getActiveSheet()->setCellValue("V$i", $aux->poa_act_realiza);
                $this->phpexcel->getActiveSheet()->setCellValue("W$i", $aux->poa_act_ftdrs);
                if ($aux->poa_act_periodo_car != 0)
                    $this->phpexcel->getActiveSheet()->setCellValue("X$i", $aux->poa_act_periodo_car . " " . $aux->poa_act_periodo_tipo);
                $this->phpexcel->getActiveSheet()->setCellValue("Y$i", $aux->poa_act_monto_estimado);
                $this->phpexcel->getActiveSheet()->getStyle("Y$i")->getNumberFormat()->setFormatCode("$ #,###,###");
                if ($aux->poa_act_metodo != '0')
                    $this->phpexcel->getActiveSheet()->setCellValue("Z$i", $aux->poa_act_metodo);
                if ($aux->poa_act_pac != '0')
                    $this->phpexcel->getActiveSheet()->setCellValue("AA$i", $aux->poa_act_pac);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AO')->setWidth(25);
                switch ($aux->poa_act_mes_inicio) {
                    case 1: $variable = 'Enero';
                        break;
                    case 2: $variable = 'Febrero';
                        break;
                    case 3: $variable = 'Marzo';
                        break;
                    case 4: $variable = 'Abril';
                        break;
                    case 5: $variable = 'Mayo';
                        break;
                    case 6: $variable = 'Junio';
                        break;
                    case 7: $variable = 'Julio';
                        break;
                    case 8: $variable = 'Agosto';
                        break;
                    case 9: $variable = 'Septiembre';
                        break;
                    case 10: $variable = 'Octubre';
                        break;
                    case 11: $variable = 'Noviembre';
                        break;
                    case 12: $variable = 'Diciembre';
                        break;
                }
                $this->phpexcel->getActiveSheet()->setCellValue("AB$i", $variable);
                switch ($aux->poa_actividad_mes_fin) {
                    case 1: $variable = 'Enero';
                        break;
                    case 2: $variable = 'Febrero';
                        break;
                    case 3: $variable = 'Marzo';
                        break;
                    case 4: $variable = 'Abril';
                        break;
                    case 5: $variable = 'Mayo';
                        break;
                    case 6: $variable = 'Junio';
                        break;
                    case 7: $variable = 'Julio';
                        break;
                    case 8: $variable = 'Agosto';
                        break;
                    case 9: $variable = 'Septiembre';
                        break;
                    case 10: $variable = 'Octubre';
                        break;
                    case 11: $variable = 'Noviembre';
                        break;
                    case 12: $variable = 'Diciembre';
                        break;
                }
                $this->phpexcel->getActiveSheet()->setCellValue("AC$i", $variable);

                $seguimientos = $this->seguimiento->obtenerSeguimientoActividad($aux->poa_act_det_id);
                foreach ($seguimientos as $seg) {
                    switch ($seg->poa_act_seg_mes) {
                        case 1: $this->phpexcel->getActiveSheet()->setCellValue("AD$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 2: $this->phpexcel->getActiveSheet()->setCellValue("AE$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 3: $this->phpexcel->getActiveSheet()->setCellValue("AF$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 4: $this->phpexcel->getActiveSheet()->setCellValue("AG$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 5: $this->phpexcel->getActiveSheet()->setCellValue("AH$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 6: $this->phpexcel->getActiveSheet()->setCellValue("AI$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 7: $this->phpexcel->getActiveSheet()->setCellValue("AJ$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 8: $this->phpexcel->getActiveSheet()->setCellValue("AK$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 9: $this->phpexcel->getActiveSheet()->setCellValue("AL$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 10: $this->phpexcel->getActiveSheet()->setCellValue("AM$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 11: $this->phpexcel->getActiveSheet()->setCellValue("AN$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 12: $this->phpexcel->getActiveSheet()->setCellValue("AO$i", $seg->poa_act_seg_desembolso);
                            break;
                    }
                }

                /*
                  $this->phpexcel->getActiveSheet()->getStyle("O$i")->getNumberFormat()->setFormatCode('0.000%');
                  $this->phpexcel->getActiveSheet()->setCellValue("P$i", "=IF((1-O$i)<0,0,(1-O$i))");
                 */
                $this->phpexcel->getActiveSheet()->setCellValue("AP$i", $aux->poa_act_det_birf);
                $this->phpexcel->getActiveSheet()->setCellValue("AQ$i", $aux->poa_act_det_contrapartida);
                $this->phpexcel->getActiveSheet()->setCellValue("AR$i", $aux->poa_act_det_total_proyecto);
                $this->phpexcel->getActiveSheet()->setCellValue("AS$i", "=IF((G$i-AP$i)<0,0,(G$i-AP$i))");

                $this->phpexcel->getActiveSheet()->getStyle("AD$i:AS$i")->getNumberFormat()->setFormatCode("$ #,###,###.##");

                $this->phpexcel->getActiveSheet()->getStyle("A$i:AS$i")->applyFromArray($estCuerpo);
                $i++;
            }
        }

        //COMPONENTE 4
        $this->phpexcel->createSheet($k + 1);
        $this->phpexcel->setActiveSheetIndex($k + 1);
        $this->phpexcel->getActiveSheet()->setTitle("C4");

        $componente4 = $this->poa->obtener_por_id('poa_componente', 'poa_com_codigo', "4.3.");

        if (count($componente4) != 0) {
            //ENCABEZADO DEL DOCUMENTO
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B2', 'Proyecto de Fortalecimiento de los Gobiernos Locales PFGL
Préstamo BIRF 7916');
            $this->phpexcel->getActiveSheet()->mergeCells('B2:G2');
            $this->phpexcel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
            $this->phpexcel->getActiveSheet()->getStyle('B2:G2')->applyFromArray($estEnc);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B3', 'Componente');
            $this->phpexcel->getActiveSheet()->getStyle('B3')->applyFromArray($estCuerpoNegrita);
            //OBTENIENDO PADRE
            $padre = $this->poa->obtener_por_id('poa_componente', 'poa_com_id', $componente4->poa_com_padre);
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('C3', $padre->poa_com_codigo . ' ' . $padre->poa_com_descripcion);
            $this->phpexcel->getActiveSheet()->mergeCells('C3:G3');
            $this->phpexcel->getActiveSheet()->getStyle('C3:G3')->applyFromArray($estCuerpoDer);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B4', 'Subcomponente');
            $this->phpexcel->getActiveSheet()->getStyle('B4')->applyFromArray($estCuerpoNegrita);
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('C4', $componente4->poa_com_codigo . ' ' . $componente4->poa_com_descripcion);
            $this->phpexcel->getActiveSheet()->mergeCells('C4:G4');
            $this->phpexcel->getActiveSheet()->getStyle('C4:G4')->applyFromArray($estCuerpoDer);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B5', 'Objetivo especìfico al que aporta:');
            $this->phpexcel->getActiveSheet()->mergeCells('B5:G5');
            $this->phpexcel->getActiveSheet()->getStyle('B5')->applyFromArray($estCuerpoNegrita);
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B6', $componente4->poa_com_objetivo);
            $this->phpexcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
            $this->phpexcel->getActiveSheet()->mergeCells('B6:G6');
            $this->phpexcel->getActiveSheet()->getStyle('B6:G6')->applyFromArray($estCuerpoDer);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B7', 'Resultado estratégico al que aporta:');
            $this->phpexcel->getActiveSheet()->mergeCells('B7:G7');
            $this->phpexcel->getActiveSheet()->getStyle('B7')->applyFromArray($estCuerpoNegrita);
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B8', $componente4->poa_com_resultado);
            $this->phpexcel->getActiveSheet()->mergeCells('B8:G8');
            $this->phpexcel->getActiveSheet()->getRowDimension('8')->setRowHeight(30);
            $this->phpexcel->getActiveSheet()->getStyle('B8:G8')->applyFromArray($estCuerpoDer);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B9', 'Indicador de logro a los 5 años: ');
            $this->phpexcel->getActiveSheet()->mergeCells('B9:G9');
            $this->phpexcel->getActiveSheet()->getStyle('B9')->applyFromArray($estCuerpoNegrita);
            $indicadores = $this->indicador->obtenerIndicadoresComponenteTipo($componente4->poa_com_id, 5);
            $cad = '';
            $i = 1;
            foreach ($indicadores as $ind) {
                $cad.=$i . ') ' . $ind->poa_ind_descripcion . "\r";
                $i++;
            }
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B10', $cad);
            $this->phpexcel->getActiveSheet()->getRowDimension('10')->setRowHeight(60);
            $this->phpexcel->getActiveSheet()->mergeCells('B10:G10');
            $this->phpexcel->getActiveSheet()->getStyle('B10:G10')->applyFromArray($estCuerpoDer);


            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B11', 'Indicador de avance al segundo año:');
            $this->phpexcel->getActiveSheet()->mergeCells('B11:G11');
            $this->phpexcel->getActiveSheet()->getStyle('B11')->applyFromArray($estCuerpoNegrita);
            $indicadores = $this->indicador->obtenerIndicadoresComponenteTipo($componente4->poa_com_id, 2);
            $cad = '';
            $i = 1;
            foreach ($indicadores as $ind) {
                $cad.=$i . ') ' . $ind->poa_ind_descripcion . "\r";
                $i++;
            }
            $this->phpexcel->getActiveSheet()
                    ->setCellValue('B12', $cad);
            $this->phpexcel->getActiveSheet()->mergeCells('B12:G12');
            $this->phpexcel->getActiveSheet()->getStyle('B12:G12')->applyFromArray($estCuerpoDer);
            $this->phpexcel->getActiveSheet()->getRowDimension('12')->setRowHeight(60);

            $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
            $this->phpexcel->getActiveSheet()->getStyle('B2:G12')->applyFromArray($soloBorde);

            //CUERPO DEL COMPONENTE
            //ENCABEZADO
            $this->phpexcel->getActiveSheet()->setCellValue('A15', "Código \r Presupuestario");
            $this->phpexcel->getActiveSheet()->mergeCells('A15:A16');
            $this->phpexcel->getActiveSheet()->getStyle('A15:A16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('B15', "Código Actividad");
            $this->phpexcel->getActiveSheet()->mergeCells('B15:B16');
            $this->phpexcel->getActiveSheet()->getStyle('B15:B16')->applyFromArray($estEnc2);


            $this->phpexcel->getActiveSheet()->setCellValue('C15', "Actividad");
            $this->phpexcel->getActiveSheet()->mergeCells('C15:C16');
            $this->phpexcel->getActiveSheet()->getStyle('C15:C16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('D15', "Unidad de \r Medida");
            $this->phpexcel->getActiveSheet()->mergeCells('D15:D16');
            $this->phpexcel->getActiveSheet()->getStyle('D15:D16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('E15', "Cantidad");
            $this->phpexcel->getActiveSheet()->mergeCells("E15:E16");
            $this->phpexcel->getActiveSheet()->getStyle("E15:E16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('F15', "Costo\rUnitario \r ($)");
            $this->phpexcel->getActiveSheet()->mergeCells("F15:F16");
            $this->phpexcel->getActiveSheet()->getStyle("F15:F16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('G15', "Costo Total \r ($)");
            $this->phpexcel->getActiveSheet()->mergeCells("G15:G16");
            $this->phpexcel->getActiveSheet()->getStyle("G15:G16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('H15', "Responsable");
            $this->phpexcel->getActiveSheet()->mergeCells("H15:H16");
            $this->phpexcel->getActiveSheet()->getStyle("H15:H16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('I15', "Producto");
            $this->phpexcel->getActiveSheet()->mergeCells("I15:I16");
            $this->phpexcel->getActiveSheet()->getStyle("I15:I16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('J14', "Año $anio");
            $this->phpexcel->getActiveSheet()->mergeCells('J14:U14');
            $this->phpexcel->getActiveSheet()->getStyle('J14:U14')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->setCellValue('J15', "1º Semestre");
            $this->phpexcel->getActiveSheet()->mergeCells('J15:O15');
            $this->phpexcel->getActiveSheet()->getStyle('J15:O15')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->setCellValue('J16', "Ene");
            $this->phpexcel->getActiveSheet()->setCellValue('K16', "Feb");
            $this->phpexcel->getActiveSheet()->setCellValue('L16', "Mar");
            $this->phpexcel->getActiveSheet()->setCellValue('M16', "Abr");
            $this->phpexcel->getActiveSheet()->setCellValue('N16', "May");
            $this->phpexcel->getActiveSheet()->setCellValue('O16', "Jun");
            $this->phpexcel->getActiveSheet()->setCellValue('P15', "2º Semestre");
            $this->phpexcel->getActiveSheet()->mergeCells('P15:U15');
            $this->phpexcel->getActiveSheet()->getStyle('P15:U15')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->setCellValue('P16', "Jul");
            $this->phpexcel->getActiveSheet()->setCellValue('Q16', "Ago");
            $this->phpexcel->getActiveSheet()->setCellValue('R16', "Sep");
            $this->phpexcel->getActiveSheet()->setCellValue('S16', "Oct");
            $this->phpexcel->getActiveSheet()->setCellValue('T16', "Nov");
            $this->phpexcel->getActiveSheet()->setCellValue('U16', "Dic");
            $this->phpexcel->getActiveSheet()->getStyle('J16:U16')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('P')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
            $this->phpexcel->getActiveSheet()->getColumnDimension('U')->setWidth(5);

            $this->phpexcel->getActiveSheet()->setCellValue('V15', "Realiza");
            $this->phpexcel->getActiveSheet()->mergeCells("V15:V16");
            $this->phpexcel->getActiveSheet()->getStyle("V15:V16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue("W15", "Fecha de\rentrega de \rTDRs o ET");
            $this->phpexcel->getActiveSheet()->mergeCells("W15:W16");
            $this->phpexcel->getActiveSheet()->getStyle("W15:W16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue("X15", "Periodo\rejecución\ractividad");
            $this->phpexcel->getActiveSheet()->mergeCells("X15:X16");
            $this->phpexcel->getActiveSheet()->getStyle("X15:X16")->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue("Y15", "Monto estimado");
            $this->phpexcel->getActiveSheet()->mergeCells("Y15:Y16");
            $this->phpexcel->getActiveSheet()->getStyle("Y15:Y16")->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);

            $this->phpexcel->getActiveSheet()->setCellValue("Z15", "Método de Contratación");
            $this->phpexcel->getActiveSheet()->mergeCells("Z15:Z16");
            $this->phpexcel->getActiveSheet()->getStyle("Z15:Z16")->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);

            $this->phpexcel->getActiveSheet()->setCellValue("AA15", "No. Correlativo \r en PAC");
            $this->phpexcel->getActiveSheet()->mergeCells("AA15:AA16");
            $this->phpexcel->getActiveSheet()->getStyle("AA15:AA16")->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);

            $this->phpexcel->getActiveSheet()->setCellValue('AB15', "Fecha inicio");
            $this->phpexcel->getActiveSheet()->mergeCells('AB15:AB16');
            $this->phpexcel->getActiveSheet()->getStyle('AB15:AB16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('AC15', "Fecha final");
            $this->phpexcel->getActiveSheet()->mergeCells('AC15:AC16');
            $this->phpexcel->getActiveSheet()->getStyle('AC15:AC16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('AD15', "Desembolsos $anio");
            $this->phpexcel->getActiveSheet()->mergeCells('AD15:AO15');
            $this->phpexcel->getActiveSheet()->getStyle('AD15:AO15')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->setCellValue('AD16', "Enero");
            $this->phpexcel->getActiveSheet()->setCellValue('AE16', "Febrero");
            $this->phpexcel->getActiveSheet()->setCellValue('AF16', "Marzo");
            $this->phpexcel->getActiveSheet()->setCellValue('AG16', "Abril");
            $this->phpexcel->getActiveSheet()->setCellValue('AH16', "Mayo");
            $this->phpexcel->getActiveSheet()->setCellValue('AI16', "Junio");
            $this->phpexcel->getActiveSheet()->setCellValue('AJ16', "Julio");
            $this->phpexcel->getActiveSheet()->setCellValue('AK16', "Agosto");
            $this->phpexcel->getActiveSheet()->setCellValue('AL16', "Septiembre");
            $this->phpexcel->getActiveSheet()->setCellValue('AM16', "Octubre");
            $this->phpexcel->getActiveSheet()->setCellValue('AN16', "Noviembre");
            $this->phpexcel->getActiveSheet()->setCellValue('AO16', "Diciembre");
            $this->phpexcel->getActiveSheet()->getStyle('AD16:AO16')->applyFromArray($estEnc2);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AD')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AE')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AF')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AG')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AH')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AI')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AK')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AL')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AM')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AN')->setWidth(10);
            $this->phpexcel->getActiveSheet()->getColumnDimension('AO')->setWidth(10);

            $this->phpexcel->getActiveSheet()->setCellValue('AP15', "Total BIRF");
            $this->phpexcel->getActiveSheet()->mergeCells('AP15:AP16');
            $this->phpexcel->getActiveSheet()->getStyle('AP15:AP16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('AQ15', "Total \rContrapartida");
            $this->phpexcel->getActiveSheet()->mergeCells('AQ15:AQ16');
            $this->phpexcel->getActiveSheet()->getStyle('AQ15:AQ16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('AR15', "Total \rProyecto");
            $this->phpexcel->getActiveSheet()->mergeCells('AR15:AR16');
            $this->phpexcel->getActiveSheet()->getStyle('AR15:AR16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->setCellValue('AS15', "Pendiente \r para " . ($anio + 1));
            $this->phpexcel->getActiveSheet()->mergeCells('AS15:AS16');
            $this->phpexcel->getActiveSheet()->getStyle('AS15:AS16')->applyFromArray($estEnc2);

            $this->phpexcel->getActiveSheet()->getRowDimension('15')->setRowHeight(25);
            $this->phpexcel->getActiveSheet()->getRowDimension('16')->setRowHeight(25);
            $actividades = $this->actividad->obtenerPorActividadDetalle($componente4->poa_com_id, $anio, 'poa_act_id');
            $i = 17;
            foreach ($actividades as $aux) {
                $this->phpexcel->getActiveSheet()->setCellValue("A$i", $aux->poa_act_cod_presupuestario);
                $this->phpexcel->getActiveSheet()->setCellValue("B$i", $aux->poa_act_codigo);
                $this->phpexcel->getActiveSheet()->setCellValue("C$i", $aux->poa_act_descripcion);
                $this->phpexcel->getActiveSheet()->setCellValue("D$i", $aux->poa_act_unidad_medida);
                if ($aux->poa_act_cantidad != 0)
                    $this->phpexcel->getActiveSheet()->setCellValue("E$i", $aux->poa_act_cantidad);
                if ($aux->poa_act_costo_unitario != 0)
                    $this->phpexcel->getActiveSheet()->setCellValue("F$i", $aux->poa_act_costo_unitario);
                $this->phpexcel->getActiveSheet()->setCellValue("G$i", $aux->poa_act_meta_total);
                $this->phpexcel->getActiveSheet()->getStyle("G$i")->getNumberFormat()->setFormatCode("$ #,###,###.##");
                $this->phpexcel->getActiveSheet()->setCellValue("H$i", $aux->poa_act_responsable);
                $this->phpexcel->getActiveSheet()->setCellValue("I$i", $aux->poa_act_producto);
                for ($j = $aux->poa_act_mes_inicio; $j <= $aux->poa_actividad_mes_fin; $j++) {
                    switch ($j) {
                        case 1: $this->phpexcel->getActiveSheet()->setCellValue("J$i", "X");
                            break;
                        case 2: $this->phpexcel->getActiveSheet()->setCellValue("K$i", "X");
                            break;
                        case 3: $this->phpexcel->getActiveSheet()->setCellValue("L$i", "X");
                            break;
                        case 4: $this->phpexcel->getActiveSheet()->setCellValue("M$i", "X");
                            break;
                        case 5: $this->phpexcel->getActiveSheet()->setCellValue("N$i", "X");
                            break;
                        case 6: $this->phpexcel->getActiveSheet()->setCellValue("O$i", "X");
                            break;
                        case 7: $this->phpexcel->getActiveSheet()->setCellValue("P$i", "X");
                            break;
                        case 8: $this->phpexcel->getActiveSheet()->setCellValue("Q$i", "X");
                            break;
                        case 9: $this->phpexcel->getActiveSheet()->setCellValue("R$i", "X");
                            break;
                        case 10: $this->phpexcel->getActiveSheet()->setCellValue("S$i", "X");
                            break;
                        case 11: $this->phpexcel->getActiveSheet()->setCellValue("T$i", "X");
                            break;
                        case 12: $this->phpexcel->getActiveSheet()->setCellValue("U$i", "X");
                            break;
                    }
                }
                if ($aux->poa_act_realiza != '0')
                    $this->phpexcel->getActiveSheet()->setCellValue("V$i", $aux->poa_act_realiza);
                $this->phpexcel->getActiveSheet()->setCellValue("W$i", $aux->poa_act_ftdrs);
                if ($aux->poa_act_periodo_car != 0)
                    $this->phpexcel->getActiveSheet()->setCellValue("X$i", $aux->poa_act_periodo_car . " " . $aux->poa_act_periodo_tipo);
                $this->phpexcel->getActiveSheet()->setCellValue("Y$i", $aux->poa_act_monto_estimado);
                $this->phpexcel->getActiveSheet()->getStyle("Y$i")->getNumberFormat()->setFormatCode("$ #,###,###");
                if ($aux->poa_act_metodo != '0')
                    $this->phpexcel->getActiveSheet()->setCellValue("Z$i", $aux->poa_act_metodo);
                if ($aux->poa_act_pac != '0')
                    $this->phpexcel->getActiveSheet()->setCellValue("AA$i", $aux->poa_act_pac);
                $this->phpexcel->getActiveSheet()->getColumnDimension('AO')->setWidth(25);
                switch ($aux->poa_act_mes_inicio) {
                    case 1: $variable = 'Enero';
                        break;
                    case 2: $variable = 'Febrero';
                        break;
                    case 3: $variable = 'Marzo';
                        break;
                    case 4: $variable = 'Abril';
                        break;
                    case 5: $variable = 'Mayo';
                        break;
                    case 6: $variable = 'Junio';
                        break;
                    case 7: $variable = 'Julio';
                        break;
                    case 8: $variable = 'Agosto';
                        break;
                    case 9: $variable = 'Septiembre';
                        break;
                    case 10: $variable = 'Octubre';
                        break;
                    case 11: $variable = 'Noviembre';
                        break;
                    case 12: $variable = 'Diciembre';
                        break;
                }
                $this->phpexcel->getActiveSheet()->setCellValue("AB$i", $variable);
                switch ($aux->poa_actividad_mes_fin) {
                    case 1: $variable = 'Enero';
                        break;
                    case 2: $variable = 'Febrero';
                        break;
                    case 3: $variable = 'Marzo';
                        break;
                    case 4: $variable = 'Abril';
                        break;
                    case 5: $variable = 'Mayo';
                        break;
                    case 6: $variable = 'Junio';
                        break;
                    case 7: $variable = 'Julio';
                        break;
                    case 8: $variable = 'Agosto';
                        break;
                    case 9: $variable = 'Septiembre';
                        break;
                    case 10: $variable = 'Octubre';
                        break;
                    case 11: $variable = 'Noviembre';
                        break;
                    case 12: $variable = 'Diciembre';
                        break;
                }
                $this->phpexcel->getActiveSheet()->setCellValue("AC$i", $variable);

                $seguimientos = $this->seguimiento->obtenerSeguimientoActividad($aux->poa_act_det_id);
                foreach ($seguimientos as $seg) {
                    switch ($seg->poa_act_seg_mes) {
                        case 1: $this->phpexcel->getActiveSheet()->setCellValue("AD$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 2: $this->phpexcel->getActiveSheet()->setCellValue("AE$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 3: $this->phpexcel->getActiveSheet()->setCellValue("AF$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 4: $this->phpexcel->getActiveSheet()->setCellValue("AG$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 5: $this->phpexcel->getActiveSheet()->setCellValue("AH$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 6: $this->phpexcel->getActiveSheet()->setCellValue("AI$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 7: $this->phpexcel->getActiveSheet()->setCellValue("AJ$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 8: $this->phpexcel->getActiveSheet()->setCellValue("AK$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 9: $this->phpexcel->getActiveSheet()->setCellValue("AL$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 10: $this->phpexcel->getActiveSheet()->setCellValue("AM$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 11: $this->phpexcel->getActiveSheet()->setCellValue("AN$i", $seg->poa_act_seg_desembolso);
                            break;
                        case 12: $this->phpexcel->getActiveSheet()->setCellValue("AO$i", $seg->poa_act_seg_desembolso);
                            break;
                    }
                }
                $this->phpexcel->getActiveSheet()->setCellValue("AP$i", $aux->poa_act_det_birf);
                $this->phpexcel->getActiveSheet()->setCellValue("AQ$i", $aux->poa_act_det_contrapartida);
                $this->phpexcel->getActiveSheet()->setCellValue("AR$i", $aux->poa_act_det_total_proyecto);
                $this->phpexcel->getActiveSheet()->setCellValue("AS$i", "=IF((G$i-AP$i)<0,0,(G$i-AP$i))");

                $this->phpexcel->getActiveSheet()->getStyle("AD$i:AS$i")->getNumberFormat()->setFormatCode("$ #,###,###.##");

                $this->phpexcel->getActiveSheet()->getStyle("A$i:AS$i")->applyFromArray($estCuerpo);
                $i++;
            }
        }
        $k++;

        //RESUMEN
        $this->phpexcel->createSheet($k + 1);
        $this->phpexcel->setActiveSheetIndex($k + 1);
        $this->phpexcel->getActiveSheet()->setTitle("Consolidado POA-$anio");
        //ENCABEZADO
        $this->phpexcel->getActiveSheet()->setCellValue('B3', "Componente");
        $this->phpexcel->getActiveSheet()->mergeCells('B3:B4');
        $this->phpexcel->getActiveSheet()->getStyle('B3:B4')->applyFromArray($estEnc2);

        $this->phpexcel->getActiveSheet()->setCellValue('C3', "Sub-Componente");
        $this->phpexcel->getActiveSheet()->mergeCells('C3:C4');
        $this->phpexcel->getActiveSheet()->getStyle('C3:C4')->applyFromArray($estEnc2);

        $this->phpexcel->getActiveSheet()->setCellValue('D3', "Datos");
        $this->phpexcel->getActiveSheet()->mergeCells('D3:Q3');
        $this->phpexcel->getActiveSheet()->getStyle('D3:Q3')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()->setCellValue('D4', "Suma-Ene");
        $this->phpexcel->getActiveSheet()->setCellValue('E4', "Suma-Feb");
        $this->phpexcel->getActiveSheet()->setCellValue('F4', "Suma-Mar");
        $this->phpexcel->getActiveSheet()->setCellValue('G4', "Suma-Abr");
        $this->phpexcel->getActiveSheet()->setCellValue('H4', "Suma-May");
        $this->phpexcel->getActiveSheet()->setCellValue('I4', "Suma-Jun");
        $this->phpexcel->getActiveSheet()->setCellValue('J4', "Suma-Jul");
        $this->phpexcel->getActiveSheet()->setCellValue('K4', "Suma-Ago");
        $this->phpexcel->getActiveSheet()->setCellValue('L4', "Suma-Sep");
        $this->phpexcel->getActiveSheet()->setCellValue('M4', "Suma-Oct");
        $this->phpexcel->getActiveSheet()->setCellValue('N4', "Suma-Nov");
        $this->phpexcel->getActiveSheet()->setCellValue('O4', "Suma-Dic");
        $this->phpexcel->getActiveSheet()->setCellValue('P4', "Suma - Total BIRF");
        $this->phpexcel->getActiveSheet()->setCellValue('Q4', "Suma - Total Contrapartida");
        $this->phpexcel->getActiveSheet()->getStyle('D4:Q4')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
        //CUERPO DEL REPORTE
        $this->phpexcel->getActiveSheet()->setCellValue('B5', "2");
        $this->phpexcel->getActiveSheet()->mergeCells('B5:B9');
        $this->phpexcel->getActiveSheet()->setCellValue('C5', "2.2");
        //Valores de cada mes
        $actividad = $this->detalle->obtenerPorActividadDetalleCod($anio, '2.2');
        if (!empty($actividad)) {
            for ($i = 1; $i <= 12; $i++) {
                $valor = $this->seguimiento->obtenerDetalleActividadSeguimiento('2.2', $anio, $i);
                switch ($i) {
                    case 1:
                        $this->phpexcel->getActiveSheet()->setCellValue("D5", $valor);
                        break;
                    case 2:
                        $this->phpexcel->getActiveSheet()->setCellValue("E5", $valor);
                        break;
                    case 3:
                        $this->phpexcel->getActiveSheet()->setCellValue("F5", $valor);
                        break;
                    case 4:
                        $this->phpexcel->getActiveSheet()->setCellValue("G5", $valor);
                        break;
                    case 5:
                        $this->phpexcel->getActiveSheet()->setCellValue("H5", $valor);
                        break;
                    case 6:
                        $this->phpexcel->getActiveSheet()->setCellValue("I5", $valor);
                        break;
                    case 7:
                        $this->phpexcel->getActiveSheet()->setCellValue("J5", $valor);
                        break;
                    case 8:
                        $this->phpexcel->getActiveSheet()->setCellValue("K5", $valor);
                        break;
                    case 9:
                        $this->phpexcel->getActiveSheet()->setCellValue("L5", $valor);
                        break;
                    case 10:
                        $this->phpexcel->getActiveSheet()->setCellValue("M5", $valor);
                        break;
                    case 11:
                        $this->phpexcel->getActiveSheet()->setCellValue("N5", $valor);
                        break;
                    case 12:
                        $this->phpexcel->getActiveSheet()->setCellValue("O5", $valor);
                        break;
                }
            }


            $this->phpexcel->getActiveSheet()->setCellValue('P5', $actividad[0]->poa_act_det_birf);
            $this->phpexcel->getActiveSheet()->setCellValue('Q5', $actividad[0]->poa_act_det_contrapartida);
            $this->phpexcel->getActiveSheet()->getStyle("D5:Q5")->getNumberFormat()->setFormatCode("$ #,###,###.##");
        }
        //2.3
        //CUERPO DEL REPORTE
        $this->phpexcel->getActiveSheet()->setCellValue('C6', "2.3");
        //Valores de cada mes
        $actividad = $this->detalle->obtenerPorActividadDetalleCod($anio, '2.3');
        if (!empty($actividad)) {

            for ($i = 1; $i <= 12; $i++) {
                $valor = $this->seguimiento->obtenerDetalleActividadSeguimiento('2.3', $anio, $i);
                switch ($i) {
                    case 1:
                        $this->phpexcel->getActiveSheet()->setCellValue("D6", $valor);
                        break;
                    case 2:
                        $this->phpexcel->getActiveSheet()->setCellValue("E6", $valor);
                        break;
                    case 3:
                        $this->phpexcel->getActiveSheet()->setCellValue("F6", $valor);
                        break;
                    case 4:
                        $this->phpexcel->getActiveSheet()->setCellValue("G6", $valor);
                        break;
                    case 5:
                        $this->phpexcel->getActiveSheet()->setCellValue("H6", $valor);
                        break;
                    case 6:
                        $this->phpexcel->getActiveSheet()->setCellValue("I6", $valor);
                        break;
                    case 7:
                        $this->phpexcel->getActiveSheet()->setCellValue("J6", $valor);
                        break;
                    case 8:
                        $this->phpexcel->getActiveSheet()->setCellValue("K6", $valor);
                        break;
                    case 9:
                        $this->phpexcel->getActiveSheet()->setCellValue("L6", $valor);
                        break;
                    case 10:
                        $this->phpexcel->getActiveSheet()->setCellValue("M6", $valor);
                        break;
                    case 11:
                        $this->phpexcel->getActiveSheet()->setCellValue("N6", $valor);
                        break;
                    case 12:
                        $this->phpexcel->getActiveSheet()->setCellValue("O6", $valor);
                        break;
                }
            }


            $this->phpexcel->getActiveSheet()->setCellValue('P6', $actividad[0]->poa_act_det_birf);
            $this->phpexcel->getActiveSheet()->setCellValue('Q6', $actividad[0]->poa_act_det_contrapartida);
            $this->phpexcel->getActiveSheet()->getStyle("D6:Q6")->getNumberFormat()->setFormatCode("$ #,###,###.##");
        }
        //2.4
        //CUERPO DEL REPORTE
        $this->phpexcel->getActiveSheet()->setCellValue('C7', "2.4");
        //Valores de cada mes
        $actividad = $this->detalle->obtenerPorActividadDetalleCod($anio, '2.4');

        if (!empty($actividad)) {
            for ($i = 1; $i <= 12; $i++) {
                $valor = $this->seguimiento->obtenerDetalleActividadSeguimiento('2.4', $anio, $i);
                switch ($i) {
                    case 1:
                        $this->phpexcel->getActiveSheet()->setCellValue("D7", $valor);
                        break;
                    case 2:
                        $this->phpexcel->getActiveSheet()->setCellValue("E7", $valor);
                        break;
                    case 3:
                        $this->phpexcel->getActiveSheet()->setCellValue("F7", $valor);
                        break;
                    case 4:
                        $this->phpexcel->getActiveSheet()->setCellValue("G7", $valor);
                        break;
                    case 5:
                        $this->phpexcel->getActiveSheet()->setCellValue("H7", $valor);
                        break;
                    case 6:
                        $this->phpexcel->getActiveSheet()->setCellValue("I7", $valor);
                        break;
                    case 7:
                        $this->phpexcel->getActiveSheet()->setCellValue("J7", $valor);
                        break;
                    case 8:
                        $this->phpexcel->getActiveSheet()->setCellValue("K7", $valor);
                        break;
                    case 9:
                        $this->phpexcel->getActiveSheet()->setCellValue("L7", $valor);
                        break;
                    case 10:
                        $this->phpexcel->getActiveSheet()->setCellValue("M7", $valor);
                        break;
                    case 11:
                        $this->phpexcel->getActiveSheet()->setCellValue("N7", $valor);
                        break;
                    case 12:
                        $this->phpexcel->getActiveSheet()->setCellValue("O7", $valor);
                        break;
                }
            }
            $this->phpexcel->getActiveSheet()->setCellValue('P7', $actividad[0]->poa_act_det_birf);
            $this->phpexcel->getActiveSheet()->setCellValue('Q7', $actividad[0]->poa_act_det_contrapartida);
            $this->phpexcel->getActiveSheet()->getStyle("D7:Q7")->getNumberFormat()->setFormatCode("$ #,###,###.##");
        }

//2.5
        //CUERPO DEL REPORTE
        $this->phpexcel->getActiveSheet()->setCellValue('C8', "2.5");
        //Valores de cada mes
        $actividad = $this->detalle->obtenerPorActividadDetalleCod($anio, '2.5');

        if (!empty($actividad)) {
            for ($i = 1; $i <= 12; $i++) {
                $valor = $this->seguimiento->obtenerDetalleActividadSeguimiento('2.5', $anio, $i);
                switch ($i) {
                    case 1:
                        $this->phpexcel->getActiveSheet()->setCellValue("D8", $valor);
                        break;
                    case 2:
                        $this->phpexcel->getActiveSheet()->setCellValue("E8", $valor);
                        break;
                    case 3:
                        $this->phpexcel->getActiveSheet()->setCellValue("F8", $valor);
                        break;
                    case 4:
                        $this->phpexcel->getActiveSheet()->setCellValue("G8", $valor);
                        break;
                    case 5:
                        $this->phpexcel->getActiveSheet()->setCellValue("H8", $valor);
                        break;
                    case 6:
                        $this->phpexcel->getActiveSheet()->setCellValue("I8", $valor);
                        break;
                    case 7:
                        $this->phpexcel->getActiveSheet()->setCellValue("J8", $valor);
                        break;
                    case 8:
                        $this->phpexcel->getActiveSheet()->setCellValue("K8", $valor);
                        break;
                    case 9:
                        $this->phpexcel->getActiveSheet()->setCellValue("L8", $valor);
                        break;
                    case 10:
                        $this->phpexcel->getActiveSheet()->setCellValue("M8", $valor);
                        break;
                    case 11:
                        $this->phpexcel->getActiveSheet()->setCellValue("N8", $valor);
                        break;
                    case 12:
                        $this->phpexcel->getActiveSheet()->setCellValue("O8", $valor);
                        break;
                }
            }
            $this->phpexcel->getActiveSheet()->setCellValue('P8', $actividad[0]->poa_act_det_birf);
            $this->phpexcel->getActiveSheet()->setCellValue('Q8', $actividad[0]->poa_act_det_contrapartida);
            $this->phpexcel->getActiveSheet()->getStyle("D8:Q8")->getNumberFormat()->setFormatCode("$ #,###,###.##");
        }

        //CUERPO DEL REPORTE
        $this->phpexcel->getActiveSheet()->setCellValue('B10', "3");
        $this->phpexcel->getActiveSheet()->mergeCells('B10:B11');
        $this->phpexcel->getActiveSheet()->setCellValue('C11', "3.1");
        //Valores de cada mes
        $actividad = $this->detalle->obtenerPorActividadDetalleCod($anio, '3.1');

        if (!empty($actividad)) {
            for ($i = 1; $i <= 12; $i++) {
                $valor = $this->seguimiento->obtenerDetalleActividadSeguimiento('3.1', $anio, $i);
                switch ($i) {
                    case 1:
                        $this->phpexcel->getActiveSheet()->setCellValue("D11", $valor);
                        break;
                    case 2:
                        $this->phpexcel->getActiveSheet()->setCellValue("E11", $valor);
                        break;
                    case 3:
                        $this->phpexcel->getActiveSheet()->setCellValue("F11", $valor);
                        break;
                    case 4:
                        $this->phpexcel->getActiveSheet()->setCellValue("G11", $valor);
                        break;
                    case 5:
                        $this->phpexcel->getActiveSheet()->setCellValue("H11", $valor);
                        break;
                    case 6:
                        $this->phpexcel->getActiveSheet()->setCellValue("I11", $valor);
                        break;
                    case 7:
                        $this->phpexcel->getActiveSheet()->setCellValue("J11", $valor);
                        break;
                    case 8:
                        $this->phpexcel->getActiveSheet()->setCellValue("K11", $valor);
                        break;
                    case 9:
                        $this->phpexcel->getActiveSheet()->setCellValue("L11", $valor);
                        break;
                    case 10:
                        $this->phpexcel->getActiveSheet()->setCellValue("M11", $valor);
                        break;
                    case 11:
                        $this->phpexcel->getActiveSheet()->setCellValue("N11", $valor);
                        break;
                    case 12:
                        $this->phpexcel->getActiveSheet()->setCellValue("O11", $valor);
                        break;
                }
            }
            $this->phpexcel->getActiveSheet()->setCellValue('P11', $actividad[0]->poa_act_det_birf);
            $this->phpexcel->getActiveSheet()->setCellValue('Q11', $actividad[0]->poa_act_det_contrapartida);
            $this->phpexcel->getActiveSheet()->getStyle("D11:Q11")->getNumberFormat()->setFormatCode("$ #,###,###.##");
        }
        //CUERPO DEL REPORTE
        $this->phpexcel->getActiveSheet()->setCellValue('B12', "4");
        $this->phpexcel->getActiveSheet()->mergeCells('B12:B16');
        $this->phpexcel->getActiveSheet()->setCellValue('C13', "4.1");
        //Valores de cada mes
        $actividad = $this->detalle->obtenerPorActividadDetalleCod($anio, '4.1');

        if (!empty($actividad)) {
            for ($i = 1; $i <= 12; $i++) {
                $valor = $this->seguimiento->obtenerDetalleActividadSeguimiento('4.1', $anio, $i);
                switch ($i) {
                    case 1:
                        $this->phpexcel->getActiveSheet()->setCellValue("D13", $valor);
                        break;
                    case 2:
                        $this->phpexcel->getActiveSheet()->setCellValue("E13", $valor);
                        break;
                    case 3:
                        $this->phpexcel->getActiveSheet()->setCellValue("F13", $valor);
                        break;
                    case 4:
                        $this->phpexcel->getActiveSheet()->setCellValue("G13", $valor);
                        break;
                    case 5:
                        $this->phpexcel->getActiveSheet()->setCellValue("H13", $valor);
                        break;
                    case 6:
                        $this->phpexcel->getActiveSheet()->setCellValue("I13", $valor);
                        break;
                    case 7:
                        $this->phpexcel->getActiveSheet()->setCellValue("J13", $valor);
                        break;
                    case 8:
                        $this->phpexcel->getActiveSheet()->setCellValue("K13", $valor);
                        break;
                    case 9:
                        $this->phpexcel->getActiveSheet()->setCellValue("L13", $valor);
                        break;
                    case 10:
                        $this->phpexcel->getActiveSheet()->setCellValue("M13", $valor);
                        break;
                    case 11:
                        $this->phpexcel->getActiveSheet()->setCellValue("N13", $valor);
                        break;
                    case 12:
                        $this->phpexcel->getActiveSheet()->setCellValue("O13", $valor);
                        break;
                }
            }
            $this->phpexcel->getActiveSheet()->setCellValue('P13', $actividad[0]->poa_act_det_birf);
            $this->phpexcel->getActiveSheet()->setCellValue('Q13', $actividad[0]->poa_act_det_contrapartida);
            $this->phpexcel->getActiveSheet()->getStyle("D13:Q13")->getNumberFormat()->setFormatCode("$ #,###,###.##");
        }

        $this->phpexcel->getActiveSheet()->setCellValue('C14', "4.2");
        //Valores de cada mes
        $actividad = $this->detalle->obtenerPorActividadDetalleCod($anio, '4.2');

        if (!empty($actividad)) {
            for ($i = 1; $i <= 12; $i++) {
                $valor = $this->seguimiento->obtenerDetalleActividadSeguimiento('4.2', $anio, $i);
                switch ($i) {
                    case 1:
                        $this->phpexcel->getActiveSheet()->setCellValue("D14", $valor);
                        break;
                    case 2:
                        $this->phpexcel->getActiveSheet()->setCellValue("E14", $valor);
                        break;
                    case 3:
                        $this->phpexcel->getActiveSheet()->setCellValue("F14", $valor);
                        break;
                    case 4:
                        $this->phpexcel->getActiveSheet()->setCellValue("G14", $valor);
                        break;
                    case 5:
                        $this->phpexcel->getActiveSheet()->setCellValue("H14", $valor);
                        break;
                    case 6:
                        $this->phpexcel->getActiveSheet()->setCellValue("I14", $valor);
                        break;
                    case 7:
                        $this->phpexcel->getActiveSheet()->setCellValue("J14", $valor);
                        break;
                    case 8:
                        $this->phpexcel->getActiveSheet()->setCellValue("K14", $valor);
                        break;
                    case 9:
                        $this->phpexcel->getActiveSheet()->setCellValue("L14", $valor);
                        break;
                    case 10:
                        $this->phpexcel->getActiveSheet()->setCellValue("M14", $valor);
                        break;
                    case 11:
                        $this->phpexcel->getActiveSheet()->setCellValue("N14", $valor);
                        break;
                    case 12:
                        $this->phpexcel->getActiveSheet()->setCellValue("O14", $valor);
                        break;
                }
            }
            $this->phpexcel->getActiveSheet()->setCellValue('P14', $actividad[0]->poa_act_det_birf);
            $this->phpexcel->getActiveSheet()->setCellValue('Q14', $actividad[0]->poa_act_det_contrapartida);
            $this->phpexcel->getActiveSheet()->getStyle("D14:Q14")->getNumberFormat()->setFormatCode("$ #,###,###.##");
        }

        $this->phpexcel->getActiveSheet()->setCellValue('C15', "4.3");
        //Valores de cada mes
        $actividad = $this->detalle->obtenerPorActividadDetalleCod($anio, '4.3');

        if (!empty($actividad)) {
            for ($i = 1; $i <= 12; $i++) {
                $valor = $this->seguimiento->obtenerDetalleActividadSeguimiento('4.3', $anio, $i);
                switch ($i) {
                    case 1:
                        $this->phpexcel->getActiveSheet()->setCellValue("D15", $valor);
                        break;
                    case 2:
                        $this->phpexcel->getActiveSheet()->setCellValue("E15", $valor);
                        break;
                    case 3:
                        $this->phpexcel->getActiveSheet()->setCellValue("F15", $valor);
                        break;
                    case 4:
                        $this->phpexcel->getActiveSheet()->setCellValue("G15", $valor);
                        break;
                    case 5:
                        $this->phpexcel->getActiveSheet()->setCellValue("H15", $valor);
                        break;
                    case 6:
                        $this->phpexcel->getActiveSheet()->setCellValue("I15", $valor);
                        break;
                    case 7:
                        $this->phpexcel->getActiveSheet()->setCellValue("J15", $valor);
                        break;
                    case 8:
                        $this->phpexcel->getActiveSheet()->setCellValue("K15", $valor);
                        break;
                    case 9:
                        $this->phpexcel->getActiveSheet()->setCellValue("L15", $valor);
                        break;
                    case 10:
                        $this->phpexcel->getActiveSheet()->setCellValue("M15", $valor);
                        break;
                    case 11:
                        $this->phpexcel->getActiveSheet()->setCellValue("N15", $valor);
                        break;
                    case 12:
                        $this->phpexcel->getActiveSheet()->setCellValue("O15", $valor);
                        break;
                }
            }
            $this->phpexcel->getActiveSheet()->setCellValue('P15', $actividad[0]->poa_act_det_birf);
            $this->phpexcel->getActiveSheet()->setCellValue('Q15', $actividad[0]->poa_act_det_contrapartida);
            $this->phpexcel->getActiveSheet()->getStyle("D15:Q15")->getNumberFormat()->setFormatCode("$ #,###,###.##");
        }

        $this->phpexcel->getActiveSheet()->setCellValue('C16', "4.4");
        //Valores de cada mes
        $actividad = $this->detalle->obtenerPorActividadDetalleCod($anio, '4.4');

        if (!empty($actividad)) {
            for ($i = 1; $i <= 12; $i++) {
                $valor = $this->seguimiento->obtenerDetalleActividadSeguimiento('4.3', $anio, $i);
                switch ($i) {
                    case 1:
                        $this->phpexcel->getActiveSheet()->setCellValue("D16", $valor);
                        break;
                    case 2:
                        $this->phpexcel->getActiveSheet()->setCellValue("E16", $valor);
                        break;
                    case 3:
                        $this->phpexcel->getActiveSheet()->setCellValue("F16", $valor);
                        break;
                    case 4:
                        $this->phpexcel->getActiveSheet()->setCellValue("G16", $valor);
                        break;
                    case 5:
                        $this->phpexcel->getActiveSheet()->setCellValue("H16", $valor);
                        break;
                    case 6:
                        $this->phpexcel->getActiveSheet()->setCellValue("I16", $valor);
                        break;
                    case 7:
                        $this->phpexcel->getActiveSheet()->setCellValue("J16", $valor);
                        break;
                    case 8:
                        $this->phpexcel->getActiveSheet()->setCellValue("K16", $valor);
                        break;
                    case 9:
                        $this->phpexcel->getActiveSheet()->setCellValue("L16", $valor);
                        break;
                    case 10:
                        $this->phpexcel->getActiveSheet()->setCellValue("M16", $valor);
                        break;
                    case 11:
                        $this->phpexcel->getActiveSheet()->setCellValue("N16", $valor);
                        break;
                    case 12:
                        $this->phpexcel->getActiveSheet()->setCellValue("O16", $valor);
                        break;
                }
            }
            $this->phpexcel->getActiveSheet()->setCellValue('P16', $actividad[0]->poa_act_det_birf);
            $this->phpexcel->getActiveSheet()->setCellValue('Q16', $actividad[0]->poa_act_det_contrapartida);
            $this->phpexcel->getActiveSheet()->getStyle("D16:Q16")->getNumberFormat()->setFormatCode("$ #,###,###.##");
        }
        $this->phpexcel->getActiveSheet()->setCellValue("B17", 'Total Resultado');
        $this->phpexcel->getActiveSheet()->mergeCells('B17:C17');
        $this->phpexcel->getActiveSheet()->setCellValue("D17", "=SUM(D5:D16)");
        $this->phpexcel->getActiveSheet()->setCellValue("E17", "=SUM(E5:E16)");
        $this->phpexcel->getActiveSheet()->setCellValue("F17", "=SUM(F5:F16)");
        $this->phpexcel->getActiveSheet()->setCellValue("G17", "=SUM(G5:G16)");
        $this->phpexcel->getActiveSheet()->setCellValue("H17", "=SUM(H5:H16)");
        $this->phpexcel->getActiveSheet()->setCellValue("I17", "=SUM(I5:I16)");
        $this->phpexcel->getActiveSheet()->setCellValue("J17", "=SUM(J5:J16)");
        $this->phpexcel->getActiveSheet()->setCellValue("K17", "=SUM(K5:K16)");
        $this->phpexcel->getActiveSheet()->setCellValue("L17", "=SUM(L5:L16)");
        $this->phpexcel->getActiveSheet()->setCellValue("M17", "=SUM(M5:M16)");
        $this->phpexcel->getActiveSheet()->setCellValue("N17", "=SUM(N5:N16)");
        $this->phpexcel->getActiveSheet()->setCellValue("O17", "=SUM(O5:O16)");
        $this->phpexcel->getActiveSheet()->setCellValue("P17", "=SUM(P5:P16)");
        $this->phpexcel->getActiveSheet()->setCellValue("Q17", "=SUM(Q5:Q16)");
$this->phpexcel->getActiveSheet()->getStyle("D17:Q17")->getNumberFormat()->setFormatCode("$ #,###,###.##");
        $this->phpexcel->getActiveSheet()->getStyle('B5:Q16')->applyFromArray($estCuerpo);
        $this->phpexcel->getActiveSheet()->getStyle('B17:Q17')->applyFromArray($estCuerpoNegrita);
        /*
         * SALIDA DEL DOCUMENTO
         */
        $filename = "POA_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
    }

}

?>
