<?php

/**
 * Controlador para componente 26
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  componente26 extends CI_Controller {
	
	public function index() {

    }
    
    public function comp26() {

        $informacion['titulo'] = 'Componente 2.6';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/comp26_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function cargar_capacitaciones() {
        $this->load->model('componente2/componente26_model');
        $capacitaciones = $this->componente26_model->get_capacitaciones();
        $numfilas = count($capacitaciones);

        $i = 0;
        foreach ($capacitaciones as $aux) {
            $rows[$i]['id'] = $aux->comp_id;
            $rows[$i]['cell'] = array($aux->comp_id,
				$aux->nombre_cap,
                $aux->fecha_cap,
                $aux->nombre_capacitador,
                $aux->total_mujeres,
                $aux->total_hombres,
                $aux->monto_cap,
                $aux->entidad
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
    
    public function guardar_comp26_cap() {
        
        $nombre_cap = $this->input->post("nombre_cap");
        $fecha_cap = $this->input->post("fecha_cap");
        $nomb_capacitador = strtoupper($this->input->post("nomb_capacitador"));
        $total_mujeres = $this->input->post("total_mujeres");
        $total_hombres = $this->input->post("total_hombres");
        $monto_cap = $this->input->post("monto_cap");
        $entidad = $this->input->post("entidad");

        $this->load->model('componente2/componente26_model');
        $this->componente26_model->insertar_comp26_cap($nombre_cap, $fecha_cap, $nomb_capacitador, $total_mujeres, $total_hombres, $monto_cap, $entidad);

    }
    
    public function cargar_consultorias() {
        $this->load->model('componente2/componente26_model');
        $consultorias = $this->componente26_model->get_consultorias();
        $numfilas = count($consultorias);

        $i = 0;
        foreach ($consultorias as $aux) {
            $rows[$i]['id'] = $aux->comp_id;
            $rows[$i]['cell'] = array($aux->comp_id,
				$aux->nombre_con,
                $aux->fecha_con,
                $aux->nombre_consultor,
                $aux->monto_con,
                $aux->entidad
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
    
    public function guardar_comp26_con() {
        
        $nombre_con = $this->input->post("nombre_con");
        $fecha_con = $this->input->post("fecha_con");
        $nomb_consultor = $this->input->post("nomb_consultor");
        $monto_con = $this->input->post("monto_con");
        $entidad = $this->input->post("entidad");

        $this->load->model('componente2/componente26_model');
        $this->componente26_model->insertar_comp26_con($nombre_con, $fecha_con, $nomb_consultor, $monto_con, $entidad);

    }
    
    public function cargar_equipamientos() {
        $this->load->model('componente2/componente26_model');
        $equi = $this->componente26_model->get_equi();
        $numfilas = count($equi);

        $i = 0;
        foreach ($equi as $aux) {
            $rows[$i]['id'] = $aux->comp_id;
            $rows[$i]['cell'] = array($aux->comp_id,
				$aux->desc_equi,
                $aux->fecha_equi,
                $aux->monto_equi,
                $aux->entidad
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
    
    public function guardar_comp26_equi() {
        
        $desc_equi = $this->input->post("desc_equi");
        $fecha_equi = $this->input->post("fecha_equi");
        $monto_equi = $this->input->post("monto_equi");
        $entidad = $this->input->post("entidad");

        $this->load->model('componente2/componente26_model');
        $this->componente26_model->insertar_comp26_equi($desc_equi, $fecha_equi, $monto_equi, $entidad);

    }
    
    public function reportes_comp26() {

        $informacion['titulo'] = 'Reportes Componente 2.6';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());         
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/reportes_comp26_view');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    public function reporte_gral_comp26(){
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
        $this->phpexcel->getActiveSheet()->setCellValue('D2', 'Componente 2.6 - Reporte Gral');
        $this->phpexcel->getActiveSheet()->mergeCells('D2:J2');
        $this->phpexcel->getActiveSheet()->getStyle('D2:J2')->applyFromArray($estTitulos);

        $this->phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $this->phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
        
					/*Capacitaciones*/
        $this->phpexcel->getActiveSheet()->setCellValue('A3', 'Capacitaciones');
        $this->phpexcel->getActiveSheet()->getStyle('A3:A3')->applyFromArray($estSubTitulos);
        
        $this->phpexcel->getActiveSheet()->setCellValue('B4', 'Entidad');
        $this->phpexcel->getActiveSheet()->setCellValue('C4', 'Cantidad Cap.');
        $this->phpexcel->getActiveSheet()->setCellValue('D4', 'Monto Total ($)');
        $this->phpexcel->getActiveSheet()->setCellValue('E4', 'Total Mujeres');
        $this->phpexcel->getActiveSheet()->setCellValue('F4', 'Total Hombres');
        $this->phpexcel->getActiveSheet()->getStyle('B4:F4')->applyFromArray($estEncabezado);
        
        $this->load->model('componente2/componente26_model');
        $consulta = $this->componente26_model->get_info_caps();
        $t_caps=0;
        $t_montos=0;
        $t_m=0;
        $t_h=0;
        foreach ($consulta as $row){
			$t_caps=$t_caps+$row->cant;
			$t_montos=$t_montos+$row->monto_t;
			$t_m=$t_m+$row->tm;
			$t_h=$t_h+$row->th;
		}
        $i=5;
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'COMURES');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+1), 'FISDL');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+2), 'ISDEM');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+3), 'MH');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+4), 'SSDT');
        
        $arrayData = array(
			array(0, 0, 0, 0),
			array(0, 0, 0, 0),
			array(0, 0, 0, 0),
			array(0, 0, 0, 0),
			array(0, 0, 0, 0)
		);
		
		$this->phpexcel->getActiveSheet()->fromArray($arrayData,1,'C5');
		
        foreach ($consulta as $row) {
					
			if($row->entidad == 'COMURES'){
				$i=5;
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D$i", $row->monto_t);
				$this->phpexcel->getActiveSheet()->setCellValue("E$i", $row->tm);
				$this->phpexcel->getActiveSheet()->setCellValue("F$i", $row->th);
			}
			if($row->entidad == 'FISDL'){
				$i=6;
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D$i", $row->monto_t);
				$this->phpexcel->getActiveSheet()->setCellValue("E$i", $row->tm);
				$this->phpexcel->getActiveSheet()->setCellValue("F$i", $row->th);
			}
			if($row->entidad == 'ISDEM'){
				$i=7;
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D$i", $row->monto_t);
				$this->phpexcel->getActiveSheet()->setCellValue("E$i", $row->tm);
				$this->phpexcel->getActiveSheet()->setCellValue("F$i", $row->th);
			}
			if($row->entidad == 'MH'){
				$i=8;
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D$i", $row->monto_t);
				$this->phpexcel->getActiveSheet()->setCellValue("E$i", $row->tm);
				$this->phpexcel->getActiveSheet()->setCellValue("F$i", $row->th);
			}
			if($row->entidad == 'SSDT'){
				$i=9;
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D$i", $row->monto_t);
				$this->phpexcel->getActiveSheet()->setCellValue("E$i", $row->tm);
				$this->phpexcel->getActiveSheet()->setCellValue("F$i", $row->th);
			}
			
			
		}
		//$i--;
        $this->phpexcel->getActiveSheet()->getStyle("B5:F9")->applyFromArray($estCells);
        
        $this->phpexcel->getActiveSheet()->setCellValue("B11", 'Indicadores');
        $this->phpexcel->getActiveSheet()->getStyle("B11:B11")->applyFromArray($estEncabezado);
        
        $this->phpexcel->getActiveSheet()->setCellValue("B12", 'Porcentaje de Capacitaciones segun Entidad:');
        $this->phpexcel->getActiveSheet()->mergeCells('B12:G12');
        $this->phpexcel->getActiveSheet()->getStyle("B12:G12")->applyFromArray($estCells);
        if($t_caps==0)
			$t_caps=1;
        
        $a=$this->phpexcel->getActiveSheet()->getCell('C5')->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("C13", 'COMURES');
			$this->phpexcel->getActiveSheet()->setCellValue("C14", (round((($a / $t_caps)*100),2)).'%'); 
		$a=$this->phpexcel->getActiveSheet()->getCell('C6')->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("D13", 'FISDL');
			$this->phpexcel->getActiveSheet()->setCellValue("D14", (round((($a / $t_caps)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell('C7')->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("E13", 'ISDEM');
			$this->phpexcel->getActiveSheet()->setCellValue("E14", (round((($a / $t_caps)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell('C8')->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("F13", 'MH');
			$this->phpexcel->getActiveSheet()->setCellValue("F14", (round((($a / $t_caps)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell('C9')->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("G13", 'SSDT');
			$this->phpexcel->getActiveSheet()->setCellValue("G14", (round((($a / $t_caps)*100),2)).'%');
		
		$this->phpexcel->getActiveSheet()->getStyle("C13:G14")->applyFromArray($estCells);
		
		$this->phpexcel->getActiveSheet()->setCellValue("B15", 'Monto de Capacitaciones segun Entidad:');
        $this->phpexcel->getActiveSheet()->mergeCells('B15:G15');
        $this->phpexcel->getActiveSheet()->getStyle("B15:G15")->applyFromArray($estCells);
        if($t_montos==0)
			$t_montos=1;
        
        $a=$this->phpexcel->getActiveSheet()->getCell('D5')->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("C16", 'COMURES');
			$this->phpexcel->getActiveSheet()->setCellValue("C17", (round((($a / $t_montos)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell('D6')->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("D16", 'FISDL');
			$this->phpexcel->getActiveSheet()->setCellValue("D17", (round((($a / $t_montos)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell('D7')->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("E16", 'ISDEM');
			$this->phpexcel->getActiveSheet()->setCellValue("E17", (round((($a / $t_montos)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell('D8')->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("F16", 'MH');
			$this->phpexcel->getActiveSheet()->setCellValue("F17", (round((($a / $t_montos)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell('D9')->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("G16", 'SSDT');
			$this->phpexcel->getActiveSheet()->setCellValue("G17", (round((($a / $t_montos)*100),2)).'%');
		
		$this->phpexcel->getActiveSheet()->getStyle("C16:G17")->applyFromArray($estCells);
		
		$this->phpexcel->getActiveSheet()->setCellValue("B18", 'Genero:');
        $this->phpexcel->getActiveSheet()->mergeCells('B18:G18');
        $this->phpexcel->getActiveSheet()->getStyle("B18:G18")->applyFromArray($estCells);
        if($t_m==0)
			$pm=0;
		else $pm=(round((($t_m / ($t_m+$t_h))*100),2));
		if($t_h==0)
			$ph=0;
		else $ph=(round((($t_h / ($t_m+$t_h))*100),2));
		
		$this->phpexcel->getActiveSheet()->mergeCells('C19:G19');
		$this->phpexcel->getActiveSheet()->setCellValue("C19", "El ".$ph."% de los asistentes a las Capacitaciones son Hombres, mientras que el ".$pm."% son Mujeres");
			$this->phpexcel->getActiveSheet()->getStyle("C19:G19")->applyFromArray($estCells);
		
			/*Consultorias*/
			
		$i=21;
		$this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Consultorias');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estSubTitulos);
        
        $i++;
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Entidad');
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", 'Cantidad Con.');
        $this->phpexcel->getActiveSheet()->setCellValue("D$i", 'Monto Total ($)');
        $this->phpexcel->getActiveSheet()->getStyle("B$i:D$i")->applyFromArray($estEncabezado);
        
        $consulta = $this->componente26_model->get_info_cons();
        $t_cons=0;
        $t_montos=0;
		
        foreach ($consulta as $row){
			$t_cons=$t_cons+$row->cant;
			$t_montos=$t_montos+$row->monto_t;
		}
		
		$i++;
		$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'COMURES');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+1), 'FISDL');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+2), 'ISDEM');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+3), 'MH');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+4), 'SSDT');
        
        $arrayData = array(
			array(0, 0),
			array(0, 0),
			array(0, 0),
			array(0, 0),
			array(0, 0)
		);
		
		$this->phpexcel->getActiveSheet()->fromArray($arrayData,1,"C$i");
		$band=$i;
        foreach ($consulta as $row) {
					
			if($row->entidad == 'COMURES'){
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D$i", $row->monto_t);
			}
			if($row->entidad == 'FISDL'){
				$this->phpexcel->getActiveSheet()->setCellValue("C".($i+1), $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D".($i+1), $row->monto_t);
			}
			if($row->entidad == 'ISDEM'){
				$this->phpexcel->getActiveSheet()->setCellValue("C".($i+2), $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D".($i+2), $row->monto_t);
			}
			if($row->entidad == 'MH'){
				$this->phpexcel->getActiveSheet()->setCellValue("C".($i+3), $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D".($i+3), $row->monto_t);
			}
			if($row->entidad == 'SSDT'){
				$this->phpexcel->getActiveSheet()->setCellValue("C".($i+4), $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D".($i+4), $row->monto_t);;
			}
			
			
		}
		
        $this->phpexcel->getActiveSheet()->getStyle("B$i:D".($i+4))->applyFromArray($estCells);
		$i=$i+5;
		
		$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Indicadores');
        $this->phpexcel->getActiveSheet()->getStyle("B$i:B$i")->applyFromArray($estEncabezado);
        $i++;
        
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Porcentaje de Consultorias segun Entidad:');
        $this->phpexcel->getActiveSheet()->mergeCells("B$i:G$i");
        $this->phpexcel->getActiveSheet()->getStyle("B$i:G$i")->applyFromArray($estCells);
        
        if($t_cons==0)
			$t_cons=1;
        $i++;
        $a=$this->phpexcel->getActiveSheet()->getCell("C$band")->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", 'COMURES');
			$this->phpexcel->getActiveSheet()->setCellValue("C".($i+1), (round((($a / $t_cons)*100),2)).'%'); 
		$a=$this->phpexcel->getActiveSheet()->getCell("C".($band+1))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("D$i", 'FISDL');
			$this->phpexcel->getActiveSheet()->setCellValue("D".($i+1), (round((($a / $t_cons)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("C".($band+2))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("E$i", 'ISDEM');
			$this->phpexcel->getActiveSheet()->setCellValue("E".($i+1), (round((($a / $t_cons)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("C".($band+3))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("F$i", 'MH');
			$this->phpexcel->getActiveSheet()->setCellValue("F".($i+1), (round((($a / $t_cons)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("C".($band+4))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("G$i", 'SSDT');
			$this->phpexcel->getActiveSheet()->setCellValue("G".($i+1), (round((($a / $t_cons)*100),2)).'%');
		
		$this->phpexcel->getActiveSheet()->getStyle("C$i:G".($i+1))->applyFromArray($estCells);
		
		$i=$i+2;
		$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Monto de Consultorias segun Entidad:');
        $this->phpexcel->getActiveSheet()->mergeCells("B$i:G$i");
        $this->phpexcel->getActiveSheet()->getStyle("B$i:G$i")->applyFromArray($estCells);
        
        if($t_montos==0)
			$t_montos=1;
        $i++;
        $a=$this->phpexcel->getActiveSheet()->getCell("D$band")->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", 'COMURES');
			$this->phpexcel->getActiveSheet()->setCellValue("C".($i+1), (round((($a / $t_montos)*100),2)).'%'); 
		$a=$this->phpexcel->getActiveSheet()->getCell("D".($band+1))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("D$i", 'FISDL');
			$this->phpexcel->getActiveSheet()->setCellValue("D".($i+1), (round((($a / $t_montos)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("D".($band+2))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("E$i", 'ISDEM');
			$this->phpexcel->getActiveSheet()->setCellValue("E".($i+1), (round((($a / $t_montos)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("D".($band+3))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("F$i", 'MH');
			$this->phpexcel->getActiveSheet()->setCellValue("F".($i+1), (round((($a / $t_montos)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("D".($band+4))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("G$i", 'SSDT');
			$this->phpexcel->getActiveSheet()->setCellValue("G".($i+1), (round((($a / $t_montos)*100),2)).'%');
		
		$this->phpexcel->getActiveSheet()->getStyle("C$i:G".($i+1))->applyFromArray($estCells);
		
		$i=$i+3;
		
		/*	Equipamiento	*/
		
		$this->phpexcel->getActiveSheet()->setCellValue("A$i", 'Equipamiento');
        $this->phpexcel->getActiveSheet()->getStyle("A$i:A$i")->applyFromArray($estSubTitulos);
        
        $i++;
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Entidad');
        $this->phpexcel->getActiveSheet()->setCellValue("C$i", 'Cantidad Equipos.');
        $this->phpexcel->getActiveSheet()->setCellValue("D$i", 'Monto Total ($)');
        $this->phpexcel->getActiveSheet()->getStyle("B$i:D$i")->applyFromArray($estEncabezado);
        
        $consulta = $this->componente26_model->get_info_equi();
        $t_equi=0;
        $t_montos=0;
		
        foreach ($consulta as $row){
			$t_equi=$t_equi+$row->cant;
			$t_montos=$t_montos+$row->monto_t;
		}
		
		$i++;
		$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'COMURES');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+1), 'FISDL');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+2), 'ISDEM');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+3), 'MH');
        $this->phpexcel->getActiveSheet()->setCellValue("B".($i+4), 'SSDT');
        
        $arrayData = array(
			array(0, 0),
			array(0, 0),
			array(0, 0),
			array(0, 0),
			array(0, 0)
		);
		
		$this->phpexcel->getActiveSheet()->fromArray($arrayData,1,"C$i");
		$band=$i;
        foreach ($consulta as $row) {
					
			if($row->entidad == 'COMURES'){
				$this->phpexcel->getActiveSheet()->setCellValue("C$i", $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D$i", $row->monto_t);
			}
			if($row->entidad == 'FISDL'){
				$this->phpexcel->getActiveSheet()->setCellValue("C".($i+1), $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D".($i+1), $row->monto_t);
			}
			if($row->entidad == 'ISDEM'){
				$this->phpexcel->getActiveSheet()->setCellValue("C".($i+2), $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D".($i+2), $row->monto_t);
			}
			if($row->entidad == 'MH'){
				$this->phpexcel->getActiveSheet()->setCellValue("C".($i+3), $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D".($i+3), $row->monto_t);
			}
			if($row->entidad == 'SSDT'){
				$this->phpexcel->getActiveSheet()->setCellValue("C".($i+4), $row->cant);
				$this->phpexcel->getActiveSheet()->setCellValue("D".($i+4), $row->monto_t);;
			}
			
			
		}
		
        $this->phpexcel->getActiveSheet()->getStyle("B$i:D".($i+4))->applyFromArray($estCells);
		$i=$i+5;
		
		$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Indicadores');
        $this->phpexcel->getActiveSheet()->getStyle("B$i:B$i")->applyFromArray($estEncabezado);
        $i++;
        
        $this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Porcentaje de Equipamiento segun Entidad:');
        $this->phpexcel->getActiveSheet()->mergeCells("B$i:G$i");
        $this->phpexcel->getActiveSheet()->getStyle("B$i:G$i")->applyFromArray($estCells);
        
        if($t_equi==0)
			$t_equi=1;
        $i++;
        $a=$this->phpexcel->getActiveSheet()->getCell("C$band")->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", 'COMURES');
			$this->phpexcel->getActiveSheet()->setCellValue("C".($i+1), (round((($a / $t_equi)*100),2)).'%'); 
		$a=$this->phpexcel->getActiveSheet()->getCell("C".($band+1))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("D$i", 'FISDL');
			$this->phpexcel->getActiveSheet()->setCellValue("D".($i+1), (round((($a / $t_equi)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("C".($band+2))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("E$i", 'ISDEM');
			$this->phpexcel->getActiveSheet()->setCellValue("E".($i+1), (round((($a / $t_equi)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("C".($band+3))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("F$i", 'MH');
			$this->phpexcel->getActiveSheet()->setCellValue("F".($i+1), (round((($a / $t_equi)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("C".($band+4))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("G$i", 'SSDT');
			$this->phpexcel->getActiveSheet()->setCellValue("G".($i+1), (round((($a / $t_equi)*100),2)).'%');
		
		$this->phpexcel->getActiveSheet()->getStyle("C$i:G".($i+1))->applyFromArray($estCells);
		
		$i=$i+2;
		$this->phpexcel->getActiveSheet()->setCellValue("B$i", 'Monto de Equipamiento segun Entidad:');
        $this->phpexcel->getActiveSheet()->mergeCells("B$i:G$i");
        $this->phpexcel->getActiveSheet()->getStyle("B$i:G$i")->applyFromArray($estCells);
        
        if($t_montos==0)
			$t_montos=1;
        $i++;
        $a=$this->phpexcel->getActiveSheet()->getCell("D$band")->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("C$i", 'COMURES');
			$this->phpexcel->getActiveSheet()->setCellValue("C".($i+1), (round((($a / $t_montos)*100),2)).'%'); 
		$a=$this->phpexcel->getActiveSheet()->getCell("D".($band+1))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("D$i", 'FISDL');
			$this->phpexcel->getActiveSheet()->setCellValue("D".($i+1), (round((($a / $t_montos)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("D".($band+2))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("E$i", 'ISDEM');
			$this->phpexcel->getActiveSheet()->setCellValue("E".($i+1), (round((($a / $t_montos)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("D".($band+3))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("F$i", 'MH');
			$this->phpexcel->getActiveSheet()->setCellValue("F".($i+1), (round((($a / $t_montos)*100),2)).'%');
		$a=$this->phpexcel->getActiveSheet()->getCell("D".($band+4))->getValue();
			$this->phpexcel->getActiveSheet()->setCellValue("G$i", 'SSDT');
			$this->phpexcel->getActiveSheet()->setCellValue("G".($i+1), (round((($a / $t_montos)*100),2)).'%');
		
		$this->phpexcel->getActiveSheet()->getStyle("C$i:G".($i+1))->applyFromArray($estCells);
		
		
        /*Finalizacion y Descarga*/
        $filename = "RepteGral_Comp26" . date("d-m-y") . ".xls"; //GUARDANDO CON ESTE NOMBRE
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
        $objWriter->save('php://output');
	}
    
}
?>
