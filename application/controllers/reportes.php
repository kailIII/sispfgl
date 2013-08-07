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

    public function index() {
        $informacion['titulo'] = 'Fortalecimiento de Gobiernos Locales';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->model('tank_auth/users', 'usuarios');
        $rol = $this->usuarios->obtenerCodigoRol($this->tank_auth->get_username());
        if (strcmp(trim($rol[0]->rol_codigo), 'apg') == 0)
            $this->load->view('reporte/index_pep_view');
        else
            $this->load->view('reporte/index_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function gdrGeneral() {
        $this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('GDR');

        /* ESTILOS */
        $estPais = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E6E6F0')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc = array(
            'font' => array('bold' => true, 'size' => 9, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFFF99')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc2 = array(
            'font' => array('italic' => true, 'size' => 9, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc3 = array(
            'font' => array('size' => 8, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc4 = array(
            'font' => array('bold' => true, 'size' => 8, 'name' => 'Arial', 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '00008A')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc5 = array(
            'font' => array('bold' => true, 'size' => 16, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFE0C2')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estRegion = array(
            'font' => array('bold' => true, 'size' => 8, 'name' => 'Arial', 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '00008A')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estCuerpo = array(
            'font' => array('size' => 8, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estCuerpoDer = array(
            'font' => array('size' => 8, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estTotales = array(
            'font' => array('bold' => true, 'size' => 8, 'name' => 'Arial', 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '000000')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estDivDepto = array(
            'font' => array('bold' => true, 'size' => 8, 'name' => 'Arial', 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '008000')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        //ENCABEZADO DEL DOCUMENTO
        $this->phpexcel->getActiveSheet()
                ->setCellValue('A3', 'No.');
        $this->phpexcel->getActiveSheet()->mergeCells('A3:A7');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('B3', 'DEPARTAMENTO');
        $this->phpexcel->getActiveSheet()->mergeCells('B3:B7');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('C3', 'MUNICIPIO');
        $this->phpexcel->getActiveSheet()->mergeCells('C3:C7');
        $this->phpexcel->getActiveSheet()->getStyle('A3:C7')->applyFromArray($estPais);
        $this->phpexcel->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
        $this->phpexcel->getActiveSheet()->getRowDimension('3')->setRowHeight(25);
        $this->phpexcel->getActiveSheet()->getRowDimension('4')->setRowHeight(25);
        $this->phpexcel->getActiveSheet()->getRowDimension('5')->setRowHeight(30);
        $this->phpexcel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
        $this->phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
        $this->phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $this->phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $this->phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
        $this->phpexcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
        $this->phpexcel->getActiveSheet()->getColumnDimension('O')->setWidth(3);
        $this->phpexcel->getActiveSheet()->getColumnDimension('P')->setWidth(3);
        $this->phpexcel->getActiveSheet()->getColumnDimension('Q')->setWidth(3);
        $this->phpexcel->getActiveSheet()->getColumnDimension('R')->setWidth(3);
        $this->phpexcel->getActiveSheet()->getColumnDimension('S')->setWidth(3);
        $this->phpexcel->getActiveSheet()->getColumnDimension('T')->setWidth(3);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('A2', 'AVANCE 2.5:  FORTALECIMIENTO DE LAS CAPACIDADES MUNICIPALES EN GESTIÓN DE RIESGO DE DESASTRES (GRD)');
        $this->phpexcel->getActiveSheet()->mergeCells('A2:T2');
        $this->phpexcel->getActiveSheet()->getStyle('A2:T2')->applyFromArray($estEnc5);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('D3', 'Proceso de Elaboración del Proyecto');
        $this->phpexcel->getActiveSheet()->mergeCells('D3:T3');
        $this->phpexcel->getActiveSheet()->getStyle('D3:T3')->applyFromArray($estEnc);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('D4', '(1) ENTRADA');
        $this->phpexcel->getActiveSheet()->mergeCells('D4:E4');
        $this->phpexcel->getActiveSheet()->getStyle('D4:E4')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('D5', 'MUNICIPALIDAD  ENTREGA INFORMACIÓN EN GRD A ISDEM/UEP');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('D6', 'INICIO');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('D7', 'UEP');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('E5', 'UEP ENTREGA CARTA DE RECEPCIÓN DE INFORMACIÓN RECIBIDA');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('E6', 'FECHA DE RECIBIDO DE LA MINICIPALIDAD');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('E7', 'UEP');
        $this->phpexcel->getActiveSheet()->getStyle('D5:E6')->applyFromArray($estEnc3);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('F4', '(2) REVISIÓN DE INFORMACIÓN');
        $this->phpexcel->getActiveSheet()->mergeCells('F4:G4');
        $this->phpexcel->getActiveSheet()->getStyle('F4:G6')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('F5', 'NO PRESENTO INFORMACIÓN');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('F7', 'UEP');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('G5', 'SI PRESENTÓ INFORMACIÓN DE AVANCES EN GRD');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('G7', 'UEP');
        $this->phpexcel->getActiveSheet()->getStyle('F5:G6')->applyFromArray($estEnc3);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('H4', '(3) ANALISIS DE INFORMACIÓN ');
        $this->phpexcel->getActiveSheet()->getStyle('H4')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('H5', 'RECIBIDA DESDE UEP/ISDEM');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('H6', 'FECHA DE CONCLUIDO EL ANALISIS');
        $this->phpexcel->getActiveSheet()->getStyle('H5:H6')->applyFromArray($estEnc3);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('I4', '(4) RECEPCIÓN DE PERFIL DE PROYECTO');
        $this->phpexcel->getActiveSheet()->getStyle('I4')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('I5', 'MUNICIPALIDAD ENTREGA FIRMADO A ISDEM  (FECHA)');
        $this->phpexcel->getActiveSheet()->mergeCells('I5:I6');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('I7', 'ISDEM');
        $this->phpexcel->getActiveSheet()->getStyle('I5:I6')->applyFromArray($estEnc3);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('J4', '(5) APROBACIÓN DE PERFIL PROYECTO');
        $this->phpexcel->getActiveSheet()->mergeCells('J4:T4');
        $this->phpexcel->getActiveSheet()->getStyle('J4:T4')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('J5', 'FECHA DE NOTA DE AUTORIZACIÓN DE PERFIL DE PROYECTO');
        $this->phpexcel->getActiveSheet()->mergeCells('J5:K5');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('J6', 'ACORDE A EMISIÓN DE UEP');
        $this->phpexcel->getActiveSheet()->mergeCells('J6:K6');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('J7', 'UEP');
        $this->phpexcel->getActiveSheet()->getStyle('J5:K6')->applyFromArray($estEnc3);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('L5', 'FECHA DE RECEPCIÓN DE LA MUNICIPALIDAD');
        $this->phpexcel->getActiveSheet()->mergeCells('L5:M5');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('L6', 'FINAL');
        $this->phpexcel->getActiveSheet()->mergeCells('L6:M6');
        $this->phpexcel->getActiveSheet()
                ->setCellValue('L7', 'ISDEM');
        $this->phpexcel->getActiveSheet()->getStyle('L5:M6')->applyFromArray($estEnc3);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('O5', 'RUBROS ELEGIBLES A LOS QUE APLICA LA MUNICIPALIDAD');
        $this->phpexcel->getActiveSheet()->mergeCells('O5:T5');
        $this->phpexcel->getActiveSheet()->setCellValue('O6', 'a');
        $this->phpexcel->getActiveSheet()->setCellValue('P6', 'b');
        $this->phpexcel->getActiveSheet()->setCellValue('Q6', 'c');
        $this->phpexcel->getActiveSheet()->setCellValue('R6', 'd');
        $this->phpexcel->getActiveSheet()->setCellValue('S6', 'e');
        $this->phpexcel->getActiveSheet()->setCellValue('T6', 'f');
        $this->phpexcel->getActiveSheet()->getStyle('O5:T6')->applyFromArray($estEnc3);
        //COLOR A TODA LA FILA
        $this->phpexcel->getActiveSheet()->getStyle('D7:T7')->applyFromArray($estEnc4);
        /*
         * CUERPO DEL EXCEL
         */

        $this->load->model('pais/municipio');
        $consulta = $this->municipio->gdrReporte1();
        $region = '';
        $depto = '';
        $i = 8;
        $numero = 1;
        foreach ($consulta as $aux) {
            if (strcmp($aux->reg_nombre, $region) != 0) {
                $this->phpexcel->getActiveSheet()->setCellValue("A$i", "REGION " . strtoupper($aux->reg_nombre));
                $this->phpexcel->getActiveSheet()->mergeCells("A$i:T$i");
                $this->phpexcel->getActiveSheet()->getStyle("A$i:T$i")->applyFromArray($estRegion);
                $region = $aux->reg_nombre;
                $depto = $aux->dep_nombre;
                $numero = 1;
                $i++;
            }
            if (strcmp($aux->dep_nombre, $depto) != 0) {
                $this->phpexcel->getActiveSheet()->mergeCells("A$i:T$i");
                $this->phpexcel->getActiveSheet()->getStyle("A$i:T$i")->applyFromArray($estDivDepto);
                $depto = $aux->dep_nombre;
                $numero = 1;
                $i++;
            }
            $this->phpexcel->getActiveSheet()->setCellValue("A$i", $numero);
            $this->phpexcel->getActiveSheet()->setCellValue("B$i", $aux->dep_nombre);
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $aux->mun_nombre);
            if (isset($aux->ela_pro_fentrega_idem))
                $this->phpexcel->getActiveSheet()->setCellValue("D$i", date('d-m-Y', strtotime($aux->ela_pro_fentrega_idem)));
            else
                $this->phpexcel->getActiveSheet()->setCellValue("D$i", "");
            if (isset($aux->rec_mun_frecibido))
                $this->phpexcel->getActiveSheet()->setCellValue("E$i", date('d-m-Y', strtotime($aux->rec_mun_frecibido)));
            else
                $this->phpexcel->getActiveSheet()->setCellValue("E$i", "");
            if (isset($aux->rev_inf_adjunto_doc)) {
                if ($aux->rev_inf_adjunto_doc == 't') {
                    $this->phpexcel->getActiveSheet()->setCellValue("F$i", 0);
                    $this->phpexcel->getActiveSheet()->setCellValue("G$i", 1);
                } else {
                    $this->phpexcel->getActiveSheet()->setCellValue("F$i", 1);
                    $this->phpexcel->getActiveSheet()->setCellValue("G$i", 0);
                }
            } else {
                $this->phpexcel->getActiveSheet()->setCellValue("F$i", '');
                $this->phpexcel->getActiveSheet()->setCellValue("G$i", '');
            }
            if (isset($aux->rev_inf_frevision_uep))
                $this->phpexcel->getActiveSheet()->setCellValue("H$i", date('d-m-Y', strtotime($aux->rev_inf_frevision_uep)));
            else
                $this->phpexcel->getActiveSheet()->setCellValue("H$i", "");
            if (isset($aux->per_pro_fentrega_isdem))
                $this->phpexcel->getActiveSheet()->setCellValue("I$i", date('d-m-Y', strtotime($aux->per_pro_fentrega_isdem)));
            else
                $this->phpexcel->getActiveSheet()->setCellValue("I$i", "");
            if (isset($aux->per_pro_fentrega_u_i)) {
                $this->phpexcel->getActiveSheet()->setCellValue("J$i", date('d-m-Y', strtotime($aux->per_pro_fentrega_u_i)));
                $this->phpexcel->getActiveSheet()->setCellValue("K$i", 1);
            } else {
                $this->phpexcel->getActiveSheet()->setCellValue("J$i", "");
                $this->phpexcel->getActiveSheet()->setCellValue("K$i", 0);
            }
            if (isset($aux->per_pro_frecibe_municipio)) {
                $this->phpexcel->getActiveSheet()->setCellValue("L$i", date('d-m-Y', strtotime($aux->per_pro_frecibe_municipio)));
                $this->phpexcel->getActiveSheet()->setCellValue("M$i", 1);
            } else {
                $this->phpexcel->getActiveSheet()->setCellValue("L$i", "");
                $this->phpexcel->getActiveSheet()->setCellValue("M$i", 0);
            }
            $this->load->model('fase1-sub25/rubro_elegible', 'rubEle');
            $rubros = $this->rubEle->obtenerRubroElegible($aux->rub_id);
            if (count($rubros) != 0) {
                $j = 1;
                foreach ($rubros as $seleccion) {
                    switch ($j) {
                        case 1:
                            if ($seleccion->rub_ele_seleccionado == 't')
                                $this->phpexcel->getActiveSheet()->setCellValue("O$i", 1);
                            else
                                $this->phpexcel->getActiveSheet()->setCellValue("O$i", 0);
                            break;
                        case 2:
                            if ($seleccion->rub_ele_seleccionado == 't')
                                $this->phpexcel->getActiveSheet()->setCellValue("P$i", 1);
                            else
                                $this->phpexcel->getActiveSheet()->setCellValue("P$i", 0);
                            break;
                        case 3:
                            if ($seleccion->rub_ele_seleccionado == 't')
                                $this->phpexcel->getActiveSheet()->setCellValue("Q$i", 1);
                            else
                                $this->phpexcel->getActiveSheet()->setCellValue("Q$i", 0);
                            break;
                        case 4:
                            if ($seleccion->rub_ele_seleccionado == 't')
                                $this->phpexcel->getActiveSheet()->setCellValue("R$i", 1);
                            else
                                $this->phpexcel->getActiveSheet()->setCellValue("R$i", 0);
                            break;
                        case 5:
                            if ($seleccion->rub_ele_seleccionado == 't')
                                $this->phpexcel->getActiveSheet()->setCellValue("S$i", 1);
                            else
                                $this->phpexcel->getActiveSheet()->setCellValue("S$i", 0);
                            break;
                        case 6:
                            if ($seleccion->rub_ele_seleccionado == 't')
                                $this->phpexcel->getActiveSheet()->setCellValue("T$i", 1);
                            else
                                $this->phpexcel->getActiveSheet()->setCellValue("T$i", 0);
                            break;
                    }
                    $j++;
                }
            } else {
                $this->phpexcel->getActiveSheet()->setCellValue("O$i", '');
                $this->phpexcel->getActiveSheet()->setCellValue("P$i", '');
                $this->phpexcel->getActiveSheet()->setCellValue("Q$i", '');
                $this->phpexcel->getActiveSheet()->setCellValue("R$i", '');
                $this->phpexcel->getActiveSheet()->setCellValue("S$i", '');
                $this->phpexcel->getActiveSheet()->setCellValue("T$i", '');
            }
            $this->phpexcel->getActiveSheet()->getStyle("A$i:T$i")->applyFromArray($estCuerpo);
            $i++;
            $numero++;
        }
        $this->phpexcel->getActiveSheet()->setCellValue("E$i", 'SUBTOTAL');
        $this->phpexcel->getActiveSheet()->setCellValue("F$i", "=SUM(F8:F" . ($i - 2) . ")");
        $this->phpexcel->getActiveSheet()->setCellValue("G$i", "=SUM(G8:G" . ($i - 2) . ")");
        $this->phpexcel->getActiveSheet()->getStyle("E$i:G$i")->applyFromArray($estTotales);
        $this->phpexcel->getActiveSheet()->setCellValue("J$i", 'TOTAL');
        $this->phpexcel->getActiveSheet()->setCellValue("K$i", "=SUM(K8:K" . ($i - 1) . ")");
        $this->phpexcel->getActiveSheet()->setCellValue("L$i", 'TOTAL');
        $this->phpexcel->getActiveSheet()->setCellValue("M$i", "=SUM(M8:M" . ($i - 1) . ")");
        $this->phpexcel->getActiveSheet()->setCellValue("N$i", "TOTAL");
        $this->phpexcel->getActiveSheet()->setCellValue("O$i", "=SUM(O8:O" . ($i - 1) . ")");
        $this->phpexcel->getActiveSheet()->setCellValue("P$i", "=SUM(P8:P" . ($i - 1) . ")");
        $this->phpexcel->getActiveSheet()->setCellValue("Q$i", "=SUM(Q8:Q" . ($i - 1) . ")");
        $this->phpexcel->getActiveSheet()->setCellValue("R$i", "=SUM(R8:R" . ($i - 1) . ")");
        $this->phpexcel->getActiveSheet()->setCellValue("S$i", "=SUM(S8:S" . ($i - 1) . ")");
        $this->phpexcel->getActiveSheet()->setCellValue("T$i", "=SUM(T8:T" . ($i - 1) . ")");
        $this->phpexcel->getActiveSheet()->getStyle("J$i:T$i")->applyFromArray($estTotales);
        $i++;
        $this->phpexcel->getActiveSheet()->setCellValue("F$i", "=(F" . ($i - 1) . ")/F" . ($i + 3));
        $this->phpexcel->getActiveSheet()->getStyle("F$i")->getNumberFormat()->setFormatCode('0%');
        $this->phpexcel->getActiveSheet()->setCellValue("G$i", "=(G" . ($i - 1) . ")/F" . ($i + 3));
        $this->phpexcel->getActiveSheet()->getStyle("G$i")->getNumberFormat()->setFormatCode('0%');
        $this->phpexcel->getActiveSheet()->getStyle("F$i:G$i")->applyFromArray($estCuerpo);
        $i+=2;
        $this->phpexcel->getActiveSheet()->setCellValue("E$i", 'TOTAL RECOGIDOS');
        $this->phpexcel->getActiveSheet()->setCellValue("F$i", "=F" . ($i - 3) . "+G" . ($i - 3));
        $this->phpexcel->getActiveSheet()->setCellValue("G$i", "=(F$i)/F" . ($i + 1));
        $this->phpexcel->getActiveSheet()->getStyle("G$i")->getNumberFormat()->setFormatCode('0%');
        $this->phpexcel->getActiveSheet()->getStyle("E$i:G$i")->applyFromArray($estTotales);
        $i++;
        $this->phpexcel->getActiveSheet()->setCellValue("E$i", 'TOTAL PAIS');
        $municipios = $this->municipio->obtenerTodosLosMunicipios();
        $this->phpexcel->getActiveSheet()->setCellValue("F$i", count($municipios));
        $this->phpexcel->getActiveSheet()->setCellValue("G$i", "100%");
        $this->phpexcel->getActiveSheet()->getStyle("E$i:G$i")->applyFromArray($estCuerpo);
        $i+=2;
        $this->phpexcel->getActiveSheet()->setCellValue("E$i", 'CONSOLIDADO POR DEPARTAMENTO');
        $this->phpexcel->getActiveSheet()->mergeCells("E$i:G$i");
        $this->phpexcel->getActiveSheet()->getStyle("E$i:G$i")->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()->setCellValue("I$i", 'AUTORIZACION Y APROBACIÓN DEL PROYECTO');
        $this->phpexcel->getActiveSheet()->mergeCells("I$i:M$i");
        $this->phpexcel->getActiveSheet()->getStyle("I$i:M$i")->applyFromArray($estEnc2);
        $i++;
        $this->phpexcel->getActiveSheet()->setCellValue("E$i", 'DEPARTAMENTO');
        $this->phpexcel->getActiveSheet()->setCellValue("F$i", 'NO PRESENTO INFORMACION');
        $this->phpexcel->getActiveSheet()->setCellValue("G$i", 'SI PRESENTÓ INFORMACIÓN DE AVANCES EN GRD');
        $this->phpexcel->getActiveSheet()->getStyle("E$i:G$i")->applyFromArray($estTotales);
        $this->phpexcel->getActiveSheet()->getRowDimension($i)->setRowHeight(48);
        $this->phpexcel->getActiveSheet()->setCellValue("I$i", 'DEPARTAMENTO');
        $this->phpexcel->getActiveSheet()->setCellValue("K$i", 'NOTA DE APROBACIÓN');
        $this->phpexcel->getActiveSheet()->setCellValue("M$i", 'RECIBIDO POR MUNICIPALIDAD');
        $this->phpexcel->getActiveSheet()->getStyle("I$i:M$i")->applyFromArray($estTotales);
        $i++;
        $this->load->model('pais/departamento');
        $deptos = $this->departamento->obtenerDepartamentosOrdenadosRegion();
        $numero = 1;
        $j = $i;
        foreach ($deptos as $depto) {
            $this->phpexcel->getActiveSheet()->setCellValue("D$j", $numero);
            $this->phpexcel->getActiveSheet()->setCellValue("E$j", $depto->dep_nombre);
            $this->phpexcel->getActiveSheet()->setCellValue("F$j", "=SUMIF(B8:B" . ($i - 9) . ",E$j,F8:F" . ($i - 9) . ")");
            $this->phpexcel->getActiveSheet()->setCellValue("G$j", "=SUMIF(B8:B" . ($i - 9) . ",E$j,G8:G" . ($i - 9) . ")");
            $this->phpexcel->getActiveSheet()->setCellValue("H$j", $numero);
            $this->phpexcel->getActiveSheet()->setCellValue("I$j", $depto->dep_nombre);
            $this->phpexcel->getActiveSheet()->setCellValue("K$j", "=SUMIF(B8:B" . ($i - 9) . ",I$j,K8:K" . ($i - 9) . ")");
            $this->phpexcel->getActiveSheet()->setCellValue("M$j", "=SUMIF(B8:B" . ($i - 9) . ",I$j,N8:N" . ($i - 9) . ")");
            $this->phpexcel->getActiveSheet()->getStyle("D$j:M$j")->applyFromArray($estCuerpo);
            $this->phpexcel->getActiveSheet()->getStyle("D$j")->applyFromArray($estCuerpoDer);
            $this->phpexcel->getActiveSheet()->getStyle("H$j")->applyFromArray($estCuerpoDer);
            $j++;
            $numero++;
        }


        /*
         * SALIDA DEL DOCUMENTO
         */
        $filename = "gdr_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function seguimientoReporte() {
        $this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('Seguimiento');

        /* ESTILOS */
        $estPais = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E6E6F0')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estCuerpo = array(
            'font' => array('size' => 8, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );

        //ENCABEZADO DEL DOCUMENTO
        $this->phpexcel->getActiveSheet()->setCellValue('A2', 'No.');
        $this->phpexcel->getActiveSheet()->mergeCells('A2:A3');
        $this->phpexcel->getActiveSheet()->setCellValue('B2', 'DEPARTAMENTO');
        $this->phpexcel->getActiveSheet()->mergeCells('B2:B3');
        $this->phpexcel->getActiveSheet()->setCellValue('C2', 'MUNICIPIO');
        $this->phpexcel->getActiveSheet()->mergeCells('C2:C3');

        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'PREPARACIÓN');
        $this->phpexcel->getActiveSheet()->mergeCells('D2:E2');
        $this->phpexcel->getActiveSheet()->setCellValue('D3', 'Fecha de orden de inicio');
        $this->phpexcel->getActiveSheet()->setCellValue('E3', 'Fecha de acta de recepción');

        $this->phpexcel->getActiveSheet()->setCellValue('F2', 'DIAGNÓSTICO');
        $this->phpexcel->getActiveSheet()->mergeCells('F2:H2');
        $this->phpexcel->getActiveSheet()->setCellValue('F3', 'Fecha de inicio del diagnóstico');
        $this->phpexcel->getActiveSheet()->setCellValue('G3', 'Fecha de socialización');
        $this->phpexcel->getActiveSheet()->setCellValue('H3', 'Fecha de acta de aprobación');

        $this->phpexcel->getActiveSheet()->setCellValue('I2', 'PLANIFICACIÓN PARA LA GESTIÓN DE RIESGOS');
        $this->phpexcel->getActiveSheet()->mergeCells('I2:L2');
        $this->phpexcel->getActiveSheet()->setCellValue('I3', 'Fecha de inicio');
        $this->phpexcel->getActiveSheet()->setCellValue('J3', 'Fecha de acta de aprobación(comite evaluador)');
        $this->phpexcel->getActiveSheet()->setCellValue('K3', 'Fecha de acuerdo municipal de aprobación de plan');
        $this->phpexcel->getActiveSheet()->setCellValue('L3', 'Fecha de presentación pública del plan GRD');

        $this->phpexcel->getActiveSheet()->setCellValue('M2', 'SEGUIMIENTO');
        $this->phpexcel->getActiveSheet()->setCellValue('M3', 'Fecha de inicio');

        $this->phpexcel->getActiveSheet()->setCellValue('N2', 'COMENTARIOS');
        $this->phpexcel->getActiveSheet()->getStyle('A2:N3')->applyFromArray($estPais);
        //$this->phpexcel->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
        $this->phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
        $this->phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $this->phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $this->phpexcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $this->phpexcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $this->phpexcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);


        /*
         * CUERPO DEL EXCEL
         */

        $this->load->model('pais/municipio');
        $consulta = $this->municipio->gdrReporte2();
        $i = 4;
        $numero = 1;
        foreach ($consulta as $aux) {
            $this->phpexcel->getActiveSheet()->setCellValue("A$i", $numero);
            $this->phpexcel->getActiveSheet()->setCellValue("B$i", $aux->dep_nombre);
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $aux->mun_nombre);
            if (isset($aux->seg_forden_preparacion))
                $this->phpexcel->getActiveSheet()->setCellValue("D$i", date('d-m-Y', strtotime($aux->seg_forden_preparacion)));
            if (isset($aux->seg_facta_recepcion))
                $this->phpexcel->getActiveSheet()->setCellValue("E$i", date('d-m-Y', strtotime($aux->seg_facta_recepcion)));
            if (isset($aux->seg_forden_diagnostico))
                $this->phpexcel->getActiveSheet()->setCellValue("F$i", date('d-m-Y', strtotime($aux->seg_forden_diagnostico)));
            if (isset($aux->seg_fsocializacion))
                $this->phpexcel->getActiveSheet()->setCellValue("G$i", date('d-m-Y', strtotime($aux->seg_fsocializacion)));
            if (isset($aux->seg_facta_aprobacion_d))
                $this->phpexcel->getActiveSheet()->setCellValue("H$i", date('d-m-Y', strtotime($aux->seg_facta_aprobacion_d)));
            if (isset($aux->seg_forden_planificacion))
                $this->phpexcel->getActiveSheet()->setCellValue("I$i", date('d-m-Y', strtotime($aux->seg_forden_planificacion)));
            if (isset($aux->seg_facta_aprobacion_p))
                $this->phpexcel->getActiveSheet()->setCellValue("J$i", date('d-m-Y', strtotime($aux->seg_facta_aprobacion_p)));
            if (isset($aux->seg_facuerdo_municipal))
                $this->phpexcel->getActiveSheet()->setCellValue("K$i", date('d-m-Y', strtotime($aux->seg_facuerdo_municipal)));
            if (isset($aux->seg_fpresentacion_publica))
                $this->phpexcel->getActiveSheet()->setCellValue("L$i", date('d-m-Y', strtotime($aux->seg_fpresentacion_publica)));
            if (isset($aux->seg_forden_seguimiento))
                $this->phpexcel->getActiveSheet()->setCellValue("M$i", $aux->seg_forden_seguimiento);
            $this->phpexcel->getActiveSheet()->setCellValue("N$i", $aux->seg_comentario);
            $this->phpexcel->getActiveSheet()->getStyle("A$i:N$i")->applyFromArray($estCuerpo);
            $i++;
            $numero++;
        }


        /*
         * SALIDA DEL DOCUMENTO
         */
        $filename = "seguimiento_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function resumenEjecutivoReporte() {
        $this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('Resumen Ejecutivo');

        /* ESTILOS */
        $estEnc = array(
            'font' => array('bold' => true, 'size' => 9, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFFF99')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc5 = array(
            'font' => array('bold' => true, 'size' => 16, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFE0C2')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc2 = array(
            'font' => array('italic' => true, 'size' => 9, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estCuerpo = array(
            'font' => array('size' => 8, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estPais = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E6E6F0')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        /*
         * CUERPO DEL EXCEL
         */
        $this->load->model('fase1-sub25/elaboracion_proyecto', 'ep');
        $this->load->model('fase1-sub25/revision_informacion', 'ri');
        $this->load->model('fase1-sub25/perfil_proyecto', 'pp');

        $this->phpexcel->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
        $this->phpexcel->getActiveSheet()->getRowDimension('3')->setRowHeight(50);
        $this->phpexcel->getActiveSheet()
                ->setCellValue('B2', 'Resumen Ejecutivo para la Gestión del Riesgo de Desastres (GDR)');
        $this->phpexcel->getActiveSheet()->mergeCells('B2:M2');
        $this->phpexcel->getActiveSheet()->getStyle('B2:M2')->applyFromArray($estEnc5);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('B3', 'Municipios Visitados');
        $this->phpexcel->getActiveSheet()->mergeCells('B3:C3');
        $this->phpexcel->getActiveSheet()->getStyle('B3:C3')->applyFromArray($estEnc);
        $this->phpexcel->getActiveSheet()->setCellValue('B4', 'Total');
        $this->phpexcel->getActiveSheet()->setCellValue('B5', '262');
        $this->phpexcel->getActiveSheet()->setCellValue('C4', '%');
        $this->phpexcel->getActiveSheet()->setCellValue('C5', '1');
        $this->phpexcel->getActiveSheet()->getStyle("C5")->getNumberFormat()->setFormatCode('0.000%');
        $this->phpexcel->getActiveSheet()->getStyle('B4:C4')->applyFromArray($estEnc2);

        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('D3', 'Municipalidades que han enviado solicitud');
        $this->phpexcel->getActiveSheet()->mergeCells('D3:G3');
        $this->phpexcel->getActiveSheet()->getStyle('D3:G3')->applyFromArray($estEnc);
        $this->phpexcel->getActiveSheet()->setCellValue('D4', 'Total');
        $this->phpexcel->getActiveSheet()->setCellValue('D5', $this->ep->obtenerTotalCartaElaboracionGDR());
        $this->phpexcel->getActiveSheet()->mergeCells('D4:E4');
        $this->phpexcel->getActiveSheet()->mergeCells('D5:E5');
        $this->phpexcel->getActiveSheet()->setCellValue('F4', '%');
        $this->phpexcel->getActiveSheet()->setCellValue('F5', "=D5/B5");
        $this->phpexcel->getActiveSheet()->getStyle("F5")->getNumberFormat()->setFormatCode('0.000%');
        $this->phpexcel->getActiveSheet()->mergeCells('F4:G4');
        $this->phpexcel->getActiveSheet()->mergeCells('F5:G5');
        $this->phpexcel->getActiveSheet()->getStyle('D4:G4')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()->setCellValue('D6', 'No tiene información');
        $this->phpexcel->getActiveSheet()->mergeCells('D6:E6');
        $this->phpexcel->getActiveSheet()->setCellValue('F6', 'Tienen avance');
        $this->phpexcel->getActiveSheet()->mergeCells('F6:G6');
        $this->phpexcel->getActiveSheet()->getStyle('D6:G6')->applyFromArray($estPais);
        $this->phpexcel->getActiveSheet()->setCellValue('D7', 'Total');
        $this->phpexcel->getActiveSheet()->setCellValue('D8', $this->ep->obtenerTotalCartaElaboracionGDR() - $this->ri->obtenerTotalNoTieneInformacionGDR());
        $this->phpexcel->getActiveSheet()->setCellValue('E7', '%');
        $this->phpexcel->getActiveSheet()->setCellValue('E8', "=D8/B5");
        $this->phpexcel->getActiveSheet()->getStyle("E8")->getNumberFormat()->setFormatCode('0.000%');
        $this->phpexcel->getActiveSheet()->setCellValue('F7', 'Total');
        $this->phpexcel->getActiveSheet()->setCellValue('F8', $this->ri->obtenerTotalNoTieneInformacionGDR());
        $this->phpexcel->getActiveSheet()->setCellValue('G7', '%');
        $this->phpexcel->getActiveSheet()->setCellValue('G8', "=F8/B5");
        $this->phpexcel->getActiveSheet()->getStyle("G8")->getNumberFormat()->setFormatCode('0.000%');
        $this->phpexcel->getActiveSheet()->getStyle('D7:G7')->applyFromArray($estEnc2);
        $this->phpexcel->getActiveSheet()->getStyle('D8:G8')->applyFromArray($estCuerpo);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('H3', 'Municipalidades que se le ha emitido Documento de Autorización');
        $this->phpexcel->getActiveSheet()->mergeCells('H3:I3');
        $this->phpexcel->getActiveSheet()->getStyle('H3:I3')->applyFromArray($estEnc);
        $this->phpexcel->getActiveSheet()->setCellValue('H4', 'Total');
        $this->phpexcel->getActiveSheet()->setCellValue('H5', $this->pp->obtenerTotalDocumentosAprobadoGDR());
        $this->phpexcel->getActiveSheet()->setCellValue('I4', '%');
        $this->phpexcel->getActiveSheet()->setCellValue('I5', "=H5/B5");
        $this->phpexcel->getActiveSheet()->getStyle("I5")->getNumberFormat()->setFormatCode('0.000%');
        $this->phpexcel->getActiveSheet()->getStyle('H4:I4')->applyFromArray($estEnc2);

        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('J3', 'Tiene toda la documentación y pueden iniciar el proceso de adquisiciones');
        $this->phpexcel->getActiveSheet()->mergeCells('J3:K3');
        $this->phpexcel->getActiveSheet()->getStyle('J3:K3')->applyFromArray($estEnc);
        $this->phpexcel->getActiveSheet()->setCellValue('J4', 'Total');
        $this->phpexcel->getActiveSheet()->setCellValue('J5', $this->pp->obtenerTotalProcesoAdquisicionGDR());
        $this->phpexcel->getActiveSheet()->setCellValue('K4', '%');
        $this->phpexcel->getActiveSheet()->setCellValue('K5', "=J5/B5");
        $this->phpexcel->getActiveSheet()->getStyle("K5")->getNumberFormat()->setFormatCode('0.000%');
        $this->phpexcel->getActiveSheet()->getStyle('J4:K4')->applyFromArray($estEnc2);

        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()
                ->setCellValue('L3', 'Paquetes de documentos de las municipalidades que FISDL-PROGRAMAS recibe de ISDEM');
        $this->phpexcel->getActiveSheet()->mergeCells('L3:M3');
        $this->phpexcel->getActiveSheet()->getStyle('L3:M3')->applyFromArray($estEnc);
        $this->phpexcel->getActiveSheet()->setCellValue('L4', 'Total');
        $this->phpexcel->getActiveSheet()->setCellValue('L5', $this->pp->obtenerTotalFisdlIsdemGDR());
        $this->phpexcel->getActiveSheet()->setCellValue('M4', '%');
        $this->phpexcel->getActiveSheet()->setCellValue('M5', "=L5/B5");
        $this->phpexcel->getActiveSheet()->getStyle("M5")->getNumberFormat()->setFormatCode('0.000%');
        $this->phpexcel->getActiveSheet()->getStyle('L4:M4')->applyFromArray($estEnc2);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()->getStyle('B5:M5')->applyFromArray($estCuerpo);
        /*
         * SALIDA DEL DOCUMENTO
         */
        $filename = "resumen_ejecutivo_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function avancesConsolidadosReporte() {
        $this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('Resumen Ejecutivo');

        /* ESTILOS */
        $estEnc = array(
            'font' => array('bold' => true, 'size' => 9, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFFF99')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc5 = array(
            'font' => array('bold' => true, 'size' => 16, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFE0C2')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estEnc2 = array(
            'font' => array('italic' => true, 'size' => 9, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estCuerpo = array(
            'font' => array('size' => 8, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estPais = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E6E6F0')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estTotales = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E6E6F0')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );

        /*
         * CUERPO DEL EXCEL
         */
        $this->load->model('pais/region');
        $this->load->model('seguimiento-sub25/seguimiento');
        $this->phpexcel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);

        $this->phpexcel->getActiveSheet()
                ->setCellValue('B2', 'PLANES MUNICIPALES DE GESTIÓN DEL RIESGO DE DESASTRE');
        $this->phpexcel->getActiveSheet()->mergeCells('B2:F2');
        $this->phpexcel->getActiveSheet()->getStyle('B2:F2')->applyFromArray($estEnc5);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()->setCellValue('C3', 'FONDOS PFGL');
        $this->phpexcel->getActiveSheet()->mergeCells('C3:D3');
        $this->phpexcel->getActiveSheet()->setCellValue('E3', 'OTROS FONDOS');
        $this->phpexcel->getActiveSheet()->mergeCells('E3:F3');
        $this->phpexcel->getActiveSheet()->getStyle('C3:F3')->applyFromArray($estEnc);
        $this->phpexcel->getActiveSheet()->setCellValue('C4', 'TERMINADO');
        $this->phpexcel->getActiveSheet()->setCellValue('D4', 'EN DESARROLLO');
        $this->phpexcel->getActiveSheet()->setCellValue('E4', 'TERMINADO');
        $this->phpexcel->getActiveSheet()->setCellValue('F4', 'EN DESARROLLO');
        $this->phpexcel->getActiveSheet()->getStyle('C4:F5')->applyFromArray($estEnc2);
        /*         * *************************************************** */
        $this->phpexcel->getActiveSheet()->setCellValue('B4', 'Región:');
        $this->phpexcel->getActiveSheet()->getStyle("B4")->applyFromArray($estCuerpo);
        $regiones = $this->region->obtenerRegiones();
        $i = 5;
        foreach ($regiones as $aux) {
            $this->phpexcel->getActiveSheet()->setCellValue("B$i", $aux->reg_nombre);
            $this->phpexcel->getActiveSheet()->getStyle("B$i")->applyFromArray($estPais);
            $t = $this->seguimiento->contarGDRTerminados($aux->reg_id);
            $d = $this->seguimiento->contarGDRDesarrollo($aux->reg_id);
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $t);
            $this->phpexcel->getActiveSheet()->setCellValue("D$i", $d);
            $this->phpexcel->getActiveSheet()->setCellValue("E$i", "0");
            $this->phpexcel->getActiveSheet()->setCellValue("F$i", "0");
            $this->phpexcel->getActiveSheet()->getStyle("C$i:F$i")->applyFromArray($estCuerpo);
            $i++;
        }
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", "Sub-Total");
        $j = $i - 1;
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$j)");
        $this->phpexcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$j)");
        $this->phpexcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$j)");
        $this->phpexcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$j)");
        $this->phpexcel->getActiveSheet()->getStyle("B$i:F$i")->applyFromArray($estPais);
        $i++;
        $j = $i - 1;
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", "=SUM(C$j:D$j)");
        $this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
        $this->phpexcel->getActiveSheet()->setCellValue("E$i", "=SUM(E$j:F$j)");
        $this->phpexcel->getActiveSheet()->mergeCells("E$i:F$i");
        $this->phpexcel->getActiveSheet()->getStyle("C$i:F$i")->applyFromArray($estPais);
        $i+=2;
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", "Total Avance Planes Terminado");
        $this->phpexcel->getActiveSheet()->getStyle("B$i")->applyFromArray($estTotales);
        $this->phpexcel->getActiveSheet()->mergeCells("B$i:B" . ($i + 1));
        $this->phpexcel->getActiveSheet()->setCellValue("E$i", "Total Referencia");
        $this->phpexcel->getActiveSheet()->getStyle("E$i")->applyFromArray($estPais);
        $this->phpexcel->getActiveSheet()->setCellValue("F$i", "262");
        $this->phpexcel->getActiveSheet()->getStyle("F$i")->applyFromArray($estCuerpo);
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", "=SUM(C$j,E$j)");
        $this->phpexcel->getActiveSheet()->setCellValue("C" . ($i + 1), "=C$i/F$i");
        $this->phpexcel->getActiveSheet()->getStyle("C$i:C" . ($i + 1))->applyFromArray($estCuerpo);
        $this->phpexcel->getActiveSheet()->getStyle("C" . ($i + 1))->getNumberFormat()->setFormatCode('0.000%');
        $this->phpexcel->getActiveSheet()->getRowDimension($i)->setRowHeight(15);
        $this->phpexcel->getActiveSheet()->getRowDimension($i + 1)->setRowHeight(15);
        $i+=3;
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", "Total Avance Planes en Desarrollo");
        $this->phpexcel->getActiveSheet()->getStyle("B$i")->applyFromArray($estTotales);
        $this->phpexcel->getActiveSheet()->mergeCells("B$i:B" . ($i + 1));
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", "=SUM(D$j,F$j)");
        $this->phpexcel->getActiveSheet()->setCellValue("C" . ($i + 1), "=C$i/F" . ($i - 3));
        $this->phpexcel->getActiveSheet()->getStyle("C$i:C" . ($i + 1))->applyFromArray($estCuerpo);
        $this->phpexcel->getActiveSheet()->getStyle("C" . ($i + 1))->getNumberFormat()->setFormatCode('0.000%');
        $this->phpexcel->getActiveSheet()->getRowDimension($i)->setRowHeight(15);
        $this->phpexcel->getActiveSheet()->getRowDimension($i + 1)->setRowHeight(15);
        /*         * *************************************************** */
        /*
         * SALIDA DEL DOCUMENTO
         */
        $filename = "avances_consolidados_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function avancesPEP() {
        $this->phpexcel->setActiveSheetIndex(0);
        $this->phpexcel->getActiveSheet()->setTitle('Seguimiento');

        /* ESTILOS */
        $estEnc5 = array(
            'font' => array('bold' => true, 'size' => 16, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFE0C2')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estRegion = array(
            'font' => array('bold' => true, 'size' => 8, 'name' => 'Arial', 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '00008A')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estPais = array(
            'font' => array('bold' => true, 'size' => 10, 'name' => 'Arial'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'E6E6F0')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estCuerpo = array(
            'font' => array('size' => 8, 'name' => 'Arial'),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estDivDepto = array(
            'font' => array('bold' => true, 'size' => 8, 'name' => 'Arial', 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '008000')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $estTotales = array(
            'font' => array('bold' => true, 'size' => 8, 'name' => 'Arial', 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '000000')),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                'wrapText' => true,
                'shrinkToFit' => true
            ),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        //ENCABEZADO DEL DOCUMENTO
        $this->phpexcel->getActiveSheet()
                ->setCellValue('B1', 'AVANCES DE LOS PEP');
        $this->phpexcel->getActiveSheet()->mergeCells('B1:H1');
        $this->phpexcel->getActiveSheet()->getStyle('B1:H1')->applyFromArray($estEnc5);
        $this->phpexcel->getActiveSheet()->setCellValue('B2', 'No.');
        $this->phpexcel->getActiveSheet()->setCellValue('C2', 'DEPARTAMENTO');
        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'MUNICIPIO');
        $this->phpexcel->getActiveSheet()->setCellValue('E2', 'ETAPA I');
        $this->phpexcel->getActiveSheet()->setCellValue('F2', 'ETAPA II');
        $this->phpexcel->getActiveSheet()->setCellValue('G2', 'ETAPA III');
        $this->phpexcel->getActiveSheet()->setCellValue('H2', 'ETAPA IV');

        $this->phpexcel->getActiveSheet()->getStyle('B2:H2')->applyFromArray($estPais);
        $this->phpexcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
        $this->phpexcel->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
        $this->phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(4);
        $this->phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $this->phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(18);


        /*
         * CUERPO DEL EXCEL
         */

        $this->load->model('pais/municipio');
        /* ETAPA 1 */
        $this->load->model('etapa1-sub23/acuerdo_municipal');
        $this->load->model('etapa1-sub23/declaracion_interes');
        $this->load->model('etapa1-sub23/grupo_apoyo');

        /* ETAPA 2 */
        $this->load->model('etapa2-sub23/asociatividad');
        $this->load->model('etapa2-sub23/grupo_gestor');
        $this->load->model('etapa2-sub23/definicion');
        $this->load->model('etapa2-sub23/priorizacion');

        /* ETAPA 3 */
        $this->load->model('etapa3-sub23/portafolio_proyecto');
        $this->load->model('etapa3-sub23/proyeccion_ingreso');

        /* ETAPA 4 */
        $this->load->model('etapa4-sub23/integracion_instancia');

        $consulta = $this->municipio->obtenerMunicipiosTodos();
        $region = '';
        $depto = '';
        $i = 3;
        $numero = 1;
        foreach ($consulta as $aux) {
            if (strcmp($aux->reg_nombre, $region) != 0) {
                $this->phpexcel->getActiveSheet()->setCellValue("B$i", "REGION " . strtoupper($aux->reg_nombre));
                $this->phpexcel->getActiveSheet()->mergeCells("B$i:H$i");
                $this->phpexcel->getActiveSheet()->getStyle("B$i:H$i")->applyFromArray($estRegion);
                $region = $aux->reg_nombre;
                $depto = $aux->dep_nombre;
                $numero = 1;
                $i++;
            } if (strcmp($aux->dep_nombre, $depto) != 0) {
                $this->phpexcel->getActiveSheet()->mergeCells("B$i:H$i");
                $this->phpexcel->getActiveSheet()->getStyle("B$i:H$i")->applyFromArray($estDivDepto);
                $depto = $aux->dep_nombre;
                $numero = 1;
                $i++;
            }

            $this->phpexcel->getActiveSheet()->setCellValue("B$i", $numero);
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $aux->dep_nombre);
            $this->phpexcel->getActiveSheet()->setCellValue("D$i", $aux->mun_nombre);
            /*  AQUI INICIA LA ETAPA 1   */
            $consulta2 = $this->acuerdo_municipal->verificarAcuerdoMunicipal($aux->mun_id, 1);
            if (count($consulta2) != 0) {
                if ($consulta2[0]->resultado == '1') {
                    $consulta3 = $this->acuerdo_municipal->verificarCriteriosAcuerdoMunicipal($aux->mun_id, 1);
                    if ($consulta3[0]->valor == '4') {
                        $consulta4 = $this->declaracion_interes->verificarDeclaracionInteres($aux->mun_id);
                        if (count($consulta4) != 0) {
                            if ($consulta4[0]->resultado == '1') {
                                $consulta5 = $this->grupo_apoyo->verificarGrupoApoyo($aux->mun_id);
                                if (count($consulta5) != 0) {
                                    if ($consulta5[0]->resultado == '1') {
                                        $consulta6 = $this->grupo_apoyo->verificarParticipantesGrupoApoyo($aux->mun_id);
                                        if ($consulta6[0]->valor != '0') {
                                            $this->phpexcel->getActiveSheet()->setCellValue("E$i", '1');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            /*  AQUI INICIA LA ETAPA 2   */
            $consulta2 = $this->asociatividad->verificarAsociatividadMunicipal($aux->mun_id);
            if (count($consulta2) != 0) {
                if ($consulta2[0]->resultado != '0') {
                    $consulta3 = $this->grupo_gestor->verificarGrupoGestor($aux->mun_id);
                    if (count($consulta3) != 0) {
                        if ($consulta3[0]->resultado == '1') {
                            $consulta4 = $this->grupo_gestor->verificarParticipantesGrupoGestor($aux->mun_id);
                            if ($consulta4[0]->valor != '0') {
                                $consulta5 = $this->grupo_gestor->verificarCriteriosGrupoGestor($aux->mun_id);
                                if ($consulta5[0]->valor != '0') {
                                    $consulta6 = $this->grupo_gestor->verificarCapacipacionGrupoGestor($aux->mun_id);
                                    if ($consulta6[0]->valor != '0') {
                                        $consulta7 = $this->definicion->verificarDefinicion($aux->mun_id);
                                        if (count($consulta7) != 0) {
                                            if ($consulta7[0]->resultado == '1') {
                                                $consulta8 = $this->definicion->verificarParticipantesDefinicion($aux->mun_id);
                                                if ($consulta8[0]->valor != '0') {
                                                    $consulta9 = $this->priorizacion->verificarPriorizacion($aux->mun_id);
                                                    if (count($consulta9) != 0) {
                                                        if ($consulta9[0]->resultado == '1') {
                                                            $consulta10 = $this->priorizacion->verificarParticipantesPriorizacion($aux->mun_id);
                                                            if ($consulta10[0]->valor != '0') {
                                                                $this->phpexcel->getActiveSheet()->setCellValue("F$i", '1');
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            /*  AQUI INICIA LA ETAPA 3   */
            $consulta2 = $this->portafolio_proyecto->verificarPriorizacionProyecto($aux->mun_id);
            if ($consulta2[0]->valor != '0') {
                $consulta3 = $this->proyeccion_ingreso->verificarProyeccionIngreso($aux->mun_id);
                if ($consulta3[0]->valor != '0') {
                    $consulta4 = $this->proyeccion_ingreso->verificarProyeccionIngresoDetalle($aux->mun_id);
                    if ($consulta4[0]->valor != '0') {
                        $consulta5 = $this->portafolio_proyecto->verificarEjecucionProyecto($aux->mun_id);
                        if ($consulta5[0]->valor != '0') {
                            $this->phpexcel->getActiveSheet()->setCellValue("G$i", '1');
                        }
                    }
                }
            }
            /*  AQUI INICIA LA ETAPA 4   */
            $consulta2 = $this->acuerdo_municipal->verificarAcuerdoMunicipal2($aux->mun_id, 4);
            if (count($consulta2) != 0) {
                if ($consulta2[0]->resultado == '1') {
                    $consulta3 = $this->integracion_instancia->verificarIntegracionInstancia($aux->mun_id);
                    if (count($consulta3) != 0) {
                        if ($consulta3[0]->resultado == '1') {
                            $consulta4 = $this->integracion_instancia->verificarParticipantesIntegracionInstancia($aux->mun_id);
                            if ($consulta4[0]->valor != '0') {
                                $consulta5 = $this->integracion_instancia->verificarCriteriosIntegracionInstancia($aux->mun_id);
                                if ($consulta5[0]->valor == '4') {
                                    $this->phpexcel->getActiveSheet()->setCellValue("H$i", '1');
                                }
                            }
                        }
                    }
                }
            }

            $this->phpexcel->getActiveSheet()->getStyle("B$i:H$i")->applyFromArray($estCuerpo);
            $i++;
            $numero++;
        }
        $i++;
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'TOTAL POR DEPARTAMENTOS');
        $this->phpexcel->getActiveSheet()->mergeCells("B$i:D$i");
        $this->phpexcel->getActiveSheet()->setCellValue("E$i", 'ETAPA I');
        $this->phpexcel->getActiveSheet()->setCellValue("F$i", 'ETAPA II');
        $this->phpexcel->getActiveSheet()->setCellValue("G$i", 'ETAPA III');
        $this->phpexcel->getActiveSheet()->setCellValue("H$i", 'ETAPA IV');

        $this->phpexcel->getActiveSheet()->getStyle("B$i:H$i")->applyFromArray($estTotales);
        $final = $i - 2;
        $i++;
        $this->load->model('pais/departamento');
        $deptos = $this->departamento->obtenerDepartamentosOrdenadosRegion();
        $numero = 1;
        foreach ($deptos as $depto) {
            $this->phpexcel->getActiveSheet()->setCellValue("B$i", $numero);
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $depto->dep_nombre);
            $this->phpexcel->getActiveSheet()->mergeCells("C$i:D$i");
            $this->phpexcel->getActiveSheet()->setCellValue("E$i", "=SUMIF(C4:C$final,C$i,E4:E$final)");
            $this->phpexcel->getActiveSheet()->setCellValue("F$i", "=SUMIF(C4:C$final,C$i,F4:F$final)");
            $this->phpexcel->getActiveSheet()->setCellValue("G$i", "=SUMIF(C4:C$final,C$i,G4:G$final)");
            $this->phpexcel->getActiveSheet()->setCellValue("H$i", "=SUMIF(C4:C$final,C$i,H4:H$final)");
            $this->phpexcel->getActiveSheet()->getStyle("B$i:H$i")->applyFromArray($estCuerpo);
            $numero++;
            $i++;
        }
        /*
         * SALIDA DEL DOCUMENTO
         */
        $filename = "avancePep_" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
    }

}

?>
