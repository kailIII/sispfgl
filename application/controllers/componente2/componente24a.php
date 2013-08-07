<?php

/**
 * Controlador para componente 24a
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  componente24a extends CI_Controller {
	
	public function index() {

    }
	
    public function capacitaciones() {

        $informacion['titulo'] = 'Componente 2.4.a, Capacitaciones';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/comp24a_cap_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function cargar_capacitaciones() {
        $this->load->model('componente2/componente24a_model');
        $capacitaciones = $this->componente24a_model->get_capacitaciones();
        $numfilas = count($capacitaciones);

        $i = 0;
        foreach ($capacitaciones as $aux) {
            $rows[$i]['id'] = $aux->comp_id;
            $rows[$i]['cell'] = array($aux->comp_id,
				$this->componente24a_model->get_mun_nombre($aux->mun_id),
                $aux->fecha_cap,
                $aux->tema_cap,
                $aux->total_mujeres,
                $aux->total_hombres,
                $aux->fecha_instalacion,
                $aux->fecha_operacion,
                $aux->observaciones
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
    
    public function guardar_comp24a_cap() {
        
        $mun_id = $this->input->post("nombre_muni");
        $fecha_cap = $this->input->post("fecha_cap");
        $tema_cap = strtoupper($this->input->post("tema_cap"));
        $total_mujeres = $this->input->post("total_mujeres");
        $total_hombres = $this->input->post("total_hombres");
        $fecha_instalacion = $this->input->post("fecha_inst");
        $fecha_operacion = $this->input->post("fecha_ope");
        $observaciones = $this->input->post("observaciones");

        $this->load->model('componente2/componente24a_model');
        $this->componente24a_model->insertar_comp24a_cap($mun_id, $fecha_cap, $tema_cap, $total_mujeres, $total_hombres, $fecha_instalacion, $fecha_operacion, $observaciones);

    }
    
    public function asis_tec_municipal() {

        $informacion['titulo'] = 'Componente 2.4.a, Asistencia T&eacute;cnica Municipal';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/comp24a_atm_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function cargar_asistencias() {
        $this->load->model('componente2/componente24a_model');
        $asistencias = $this->componente24a_model->get_asistencias();
        $numfilas = count($asistencias);

        $i = 0;
        foreach ($asistencias as $aux) {
            $rows[$i]['id'] = $aux->comp_id;
            $rows[$i]['cell'] = array($aux->comp_id,
				$this->componente24a_model->get_mun_nombre($aux->mun_id),
                $aux->fecha_atm,
                $this->componente24a_model->get_area_nombre($aux->id_area_accion),
                $aux->tipo_entidad_asesora,
                $aux->nombre_entidad_asesora,
                $aux->monto
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
    
    public function guardar_comp24a_atm() {
        
        $mun_id = $this->input->post("nombre_muni");
        $fecha_atm = $this->input->post("fecha_atm");
        $id_area_accion = $this->input->post("area_atm");
        $tipo_entidad_asesora = $this->input->post("entidad_atm");
        $nombre_entidad_asesora = $this->input->post("nombre_atm");
        $monto = $this->input->post("monto_atm");

        $this->load->model('componente2/componente24a_model');
        $this->componente24a_model->insertar_comp24a_atm($mun_id, $fecha_atm, $id_area_accion, $tipo_entidad_asesora, $nombre_entidad_asesora, $monto);

    }
    
    public function reportes_comp24a() {

        $informacion['titulo'] = 'Reportes Componente 2.4 a';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/reportes_comp24a_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function reporte_gral_comp24a_cap(){
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
        
        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'Componente 2.4 a - Reporte Gral Capacitaciones');
        $this->phpexcel->getActiveSheet()->mergeCells('D2:J2');
        $this->phpexcel->getActiveSheet()->getStyle('D2:J2')->applyFromArray($estTitulos);

        $this->phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
        
        $i=3;
        $this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Capacitaciones por Depto.');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estSubTitulos);
        $i++;
        
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Departamento');
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", 'Cantidad Cap.');
        $this->phpexcel->getActiveSheet()->setCellValue("D$i", '%');
        $this->phpexcel->getActiveSheet()->getStyle("B$i:D$i")->applyFromArray($estEncabezado);
        
        $this->load->model('componente2/componente24a_model');
				/*Cap por Depto*/
        $consulta = $this->componente24a_model->cap_por_depto();
        $i++;
        $band=$i;
        $total=0;
        foreach ($consulta as $row){
			$total=$total+$row->cant;
		}
		if ($total==0) 
			$total=1;
        foreach ($consulta as $row) {
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", $row->depto);//imprime los deptos
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);
            $this->phpexcel->getActiveSheet()->setCellValue("D$i", (round((($row->cant / $total)*100),2)));
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B$band:D$i")->applyFromArray($estCells);
			/*Cap por Region*/
        
        $i=$i+2;
		$this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Capacitaciones por Region');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estSubTitulos);
        $i++;
        
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Region');
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", 'Cantidad');
        $this->phpexcel->getActiveSheet()->setCellValue("D$i", '%');
        $this->phpexcel->getActiveSheet()->getStyle("B$i:D$i")->applyFromArray($estEncabezado);
        $i++;
        $band=$i;
        $consulta = $this->componente24a_model->cap_por_region();
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
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B$band:D$i")->applyFromArray($estCells);
		
			/*Indicadore*/
        $i=$i+2;
        $this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Indicadores');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estSubTitulos);
        $i++;
        
        $this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Genero');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estEncabezado);
        
			$t1=$this->componente24a_model->total_h_cap();
			$t2=$this->componente24a_model->total_m_cap();
			$thm=$t1->total+$t2->total;
			$th=round((($t1->total / $thm)*100),2);
			
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:G$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "El ".$th."% de los asistentes a CC son Hombres, mientras que el ".(100-$th)."% son Mujeres");
			$this->phpexcel->getActiveSheet()->getStyle("B$i:G$i")->applyFromArray($estCells);
			$i++;
        
			$t1=round($this->componente24a_model->prom_h_por_cap(),2);
			$t2=round($this->componente24a_model->prom_m_por_cap(),2);
			
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:G$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "Por cada Capacitacion, en promedio asisten: $t1 Hombres y $t2 Mujeres");
			$this->phpexcel->getActiveSheet()->getStyle("B$i:G$i")->applyFromArray($estCells);
        
        /*Finalizacion y Descarga*/
        $filename = "RepteGral_Comp24a_Cap" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
	}
	
	public function reporte_gral_comp24a_atm(){
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
        
        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'Componente 2.4 a - Reporte Gral Aitencia Tecnica Municipal');
        $this->phpexcel->getActiveSheet()->mergeCells('D2:J2');
        $this->phpexcel->getActiveSheet()->getStyle('D2:J2')->applyFromArray($estTitulos);

        $this->phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
        
        $i=3;
        $this->phpexcel->getActiveSheet()->setCellValue("A$i", 'ATM por Departamento');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estSubTitulos);
        $i++;
        
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Departamento');
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", 'Cantidad ATM');
        $this->phpexcel->getActiveSheet()->setCellValue("D$i", '%');
        $this->phpexcel->getActiveSheet()->getStyle("B$i:D$i")->applyFromArray($estEncabezado);
        
        $this->load->model('componente2/componente24a_model');
				/*ATM por Depto*/
        $consulta = $this->componente24a_model->atm_por_depto();
        $i++;
        $band=$i;
        $total=0;
        foreach ($consulta as $row){
			$total=$total+$row->cant;
		}
		if ($total==0) 
			$total=1;
        foreach ($consulta as $row) {
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", $row->depto);//imprime los deptos
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);
            $this->phpexcel->getActiveSheet()->setCellValue("D$i", (round((($row->cant / $total)*100),2)));
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B$band:D$i")->applyFromArray($estCells);
			/*ATM por Region*/
        
        $i=$i+2;
		$this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Capacitaciones por Region');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estSubTitulos);
        $i++;
        
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Region');
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", 'Cantidad');
        $this->phpexcel->getActiveSheet()->setCellValue("D$i", '%');
        $this->phpexcel->getActiveSheet()->getStyle("B$i:D$i")->applyFromArray($estEncabezado);
        $i++;
        $band=$i;
        $consulta = $this->componente24a_model->atm_por_region();
        $total=0;
        foreach ($consulta as $row){
			$total=$total+$row->suma;
		}
		if ($total==0) 
			$total=1;
		
		foreach ($consulta as $row) {
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", $row->reg);//imprime la region
            $this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->suma);//imprime las cant de atm de la region
            $this->phpexcel->getActiveSheet()->setCellValue("D$i", (round((($row->suma / $total)*100),2)));
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B$band:D$i")->applyFromArray($estCells);
		
			/*Indicadore*/
        $i=$i+2;
        $this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Indicadores');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estSubTitulos);
        $i++;
        
        $this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Entidades Asesoras');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estEncabezado);
 
			$band=$i;
			$t1=$this->componente24a_model->total_ong()->total;
			$t2=$this->componente24a_model->total_fc()->total;
			$t3=$this->componente24a_model->total_ci()->total;
			$t4=$this->componente24a_model->total_otro()->total;
			$total_atm=$this->componente24a_model->total_atm()->total;
			if($total_atm==0)
				$total_atm==1;
			
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:E$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "El ".round((($t1 / $total_atm)*100),2)."% de las ATM son Asesoradas por ONG.");
			$i++;
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:E$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "El ".round((($t2 / $total_atm)*100),2)."% de las ATM son Asesoradas por Firmas Consultoras.");
			$i++;
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:E$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "El ".round((($t3 / $total_atm)*100),2)."% de las ATM son Asesoradas por Consultores Individuales.");
			$i++;
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:E$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", "El ".round((($t4 / $total_atm)*100),2)."% de las ATM son Asesoradas por Otro Tipo de Entidades.");
			
			$this->phpexcel->getActiveSheet()->getStyle("B$band:E$i")->applyFromArray($estCells);
			$i=$i+2;
			
		$this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Area de Accion');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estEncabezado);
        
        $this->phpexcel->getActiveSheet()->mergeCells("B$i:E$i");
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'El porcentaje segun el area de accion de las ATM es el siguiente:');
        $this->phpexcel->getActiveSheet()->getStyle("B$i:E$i")->applyFromArray($estCells);
        $i++;
        
        $this->phpexcel->getActiveSheet()->mergeCells("B$i:C$i");
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Area de Accion');
        $this->phpexcel->getActiveSheet()->setCellValue("D$i", 'Cantidad');
        $this->phpexcel->getActiveSheet()->setCellValue("E$i", 'Porcentaje');
        $this->phpexcel->getActiveSheet()->getStyle("B$i:E$i")->applyFromArray($estCells);
        
        $i++;
			$band=$i;
        
        $consulta = $this->componente24a_model->total_por_area_accion();
        $total=0;
        foreach ($consulta as $row){
			$total=$total+$row->cant;
		}
		if ($total==0) 
			$total=1;
		
        foreach ($consulta as $row) {
			$this->phpexcel->getActiveSheet()->mergeCells("B$i:C$i");
			$this->phpexcel->getActiveSheet()->setCellValue("B$i", $row->nombre);
            $this->phpexcel->getActiveSheet()->setCellValue("D$i", $row->cant);
            $this->phpexcel->getActiveSheet()->setCellValue("E$i", (round((($row->cant / $total)*100),2)).'%');
            $i++;
		}
		$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B$band:E$i")->applyFromArray($estCells);

        
        /*Finalizacion y Descarga*/
        $filename = "RepteGral_Comp24a_ATM" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
	}
    
    
}
?>
