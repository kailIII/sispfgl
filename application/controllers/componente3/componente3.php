<?php

/**
 * Controlador para componente 3
 *
 * @author Carlos Romero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class  componente3 extends CI_Controller {
	
    public function diag_sect_anal_tran() {

        $informacion['titulo'] = '3.1 Diagnostico Sectorial y Analisis Transversales';
                        
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente3/ingresar_dsat');
        $this->load->view('plantilla/footer', $informacion);
    }
    
    function form_dropdown_from_db($name = '', $sql, $selected = array(), $extra = '')
    {
        $CI =& get_instance();
        if ( ! is_array($selected))
        {
            $selected = array($selected);
        }

        // If no selected state was submitted we will attempt to set it automatically
        if (count($selected) === 0)
        {
            // If the form name appears in the $_POST array we have a winner!
            if (isset($_POST[$name]))
            {
                $selected = array($_POST[$name]);
            }
        }

        if ($extra != '') $extra = ' '.$extra;

        $multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

        $form = '<select name="'.$name.'"'.$extra.$multiple.">\n";
        $query=$CI->db->query($sql);
        if ($query->num_rows() > 0)
        {
           foreach ($query->result_array() as $row)
           {
                  $values = array_values($row);
                  if (count($values)===2){
                    $key = (string) $values[0];
                    $val = (string) $values[1];
                    //$this->option($values[0], $values[1]);
                  }

                $sel = (in_array($key, $selected))?' selected="selected"':'';

                $form .= '<option value="'.$key.'"'.$sel.'>'.$val."</option>\n";
           }
        }
        $form .= '</select>';
        return $form;
    }

}

?>
