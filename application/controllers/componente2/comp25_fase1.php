<?php

/**
 * Contendrá todos los metodos utilizados para definir las pantallas del 
 * componente 2.5: gestión de riesgos
 *
 * @author Ing. Karen Peñate
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comp25_fase1 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $informacion['titulo'] = 'Fortalecimiento de Gobiernos Locales';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp25/comp25_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function revisionInformacion() {
        $informacion['titulo'] = 'Componente 2.5 Registro de datos del componente';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        //OBTENER DEPARTAMENTOS
        $this->load->model('pais/departamento');
        $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp25/fase1/revisionInformacion_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarTipoMapa() {
        $this->load->model('fase1-sub25/tipo_mapa', 'tipMap');
        $tipos = $this->tipMap->obtenerTiposMapas();
        $combo = "<select name='tip_map_id'>";
        $combo.= " <option value='0'> -- Seleccione --</option>";
        foreach ($tipos as $aux)
            $combo.= " <option value='" . $aux->tip_map_id . "'>" . $aux->tip_map_nombre . "</option>";
        $combo.="</select>";

        echo $combo;
    }

    public function cargarRevisionInformacion($mun_id) {
        $this->load->model('pais/municipio');
        $this->load->model('fase1-sub25/revision_informacion', 'revInf');
        $resultado = $this->municipio->obtenerIDVariable('rev_inf_id', $mun_id);

        if ($resultado[0]->rev_inf_id == 0) {
            $this->revInf->agregarRevisionInformacion($mun_id);
            $revision = $this->revInf->idPorMunicipio($mun_id);
            $this->municipio->actualizarIndices('rev_inf_id', $revision[0]->rev_inf_id, $mun_id);
        }
        $revision = $this->revInf->idPorMunicipio($mun_id);
        if ($revision[0]->rev_inf_felaboracion != "")
            $rev_inf_felaboracion = date('d-m-Y', strtotime($revision[0]->rev_inf_felaboracion));
        else
            $rev_inf_felaboracion = $revision[0]->rev_inf_felaboracion;

        $rows[0]['id'] = $revision[0]->rev_inf_id;
        $rows[0]['cell'] = array($revision[0]->rev_inf_id,
            $revision[0]->rev_inf_plan_municipalidad,
            $revision[0]->rev_inf_plan_contingencia,
            $rev_inf_felaboracion,
            $revision[0]->rev_inf_plan_oformato,
            $revision[0]->rev_inf_gestion_reactiva,
            $revision[0]->rev_inf_ogestion_reactiva,
            $revision[0]->rev_inf_gestion_correctiva,
            $revision[0]->rev_inf_ogestion_correctiva,
            $revision[0]->rev_inf_gestion_prospectiva,
            $revision[0]->rev_inf_ogestion_prospectiva,
            $revision[0]->rev_inf_plan_comunal,
            $revision[0]->rev_inf_mapa,
            $revision[0]->rev_inf_presentoa,
            $revision[0]->rev_inf_conclusion
        );
        $datos = json_encode($rows);
        $pages = floor(1 / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . 1 . '", 
               "rows":' . $datos . '}';

        echo $jsonresponse;
    }

    public function guardarRevisionInformacion($parte) {
        $this->load->model('fase1-sub25/revision_informacion', 'revInf');
        $rev_inf_id = $this->input->post("rev_inf_id");
        $rev_inf_fregistro_asesor = $this->input->post("rev_inf_fregistro_asesor");
        if ($rev_inf_fregistro_asesor == "")
            $rev_inf_fregistro_asesor = null;
        $rev_inf_frevision_uep = $this->input->post("rev_inf_frevision_uep");
        if ($rev_inf_frevision_uep == "")
            $rev_inf_frevision_uep = null;
        $rev_inf_adjunto_doc = $this->input->post("rev_inf_adjunto_doc");
        if ($rev_inf_adjunto_doc == "")
            $rev_inf_adjunto_doc = null;
        $rev_inf_plan_municipalidad = $this->input->post("rev_inf_plan_municipalidad");
        if ($rev_inf_plan_municipalidad == "")
            $rev_inf_plan_municipalidad = null;
        $rev_inf_plan_contingencia = $this->input->post("rev_inf_plan_contingencia");
        if ($rev_inf_plan_contingencia == "")
            $rev_inf_plan_contingencia = null;
        $rev_inf_felaboracion = $this->input->post("rev_inf_felaboracion");
        if ($rev_inf_felaboracion == "")
            $rev_inf_felaboracion = null;
        $rev_inf_plan_oformato = $this->input->post("rev_inf_plan_oformato");
        if ($rev_inf_plan_oformato == "")
            $rev_inf_plan_oformato = null;
        $rev_inf_gestion_reactiva = $this->input->post("rev_inf_gestion_reactiva");
        if ($rev_inf_gestion_reactiva == "")
            $rev_inf_gestion_reactiva = null;
        $rev_inf_ogestion_reactiva = $this->input->post("rev_inf_ogestion_reactiva");
        $rev_inf_gestion_correctiva = $this->input->post("rev_inf_gestion_correctiva");
        if ($rev_inf_gestion_correctiva == "")
            $rev_inf_gestion_correctiva = null;
        $rev_inf_ogestion_correctiva = $this->input->post("rev_inf_ogestion_correctiva");
        $rev_inf_gestion_prospectiva = $this->input->post("rev_inf_gestion_prospectiva");
        if ($rev_inf_gestion_prospectiva == "")
            $rev_inf_gestion_prospectiva = null;
        $rev_inf_ogestion_prospectiva = $this->input->post("rev_inf_ogestion_prospectiva");
        $rev_inf_plan_comunal = $this->input->post("rev_inf_plan_comunal");
        if ($rev_inf_plan_comunal == "")
            $rev_inf_plan_comunal = null;
        $rev_inf_mapa = $this->input->post("rev_inf_mapa");
        if ($rev_inf_mapa == "")
            $rev_inf_mapa = null;
        $rev_inf_presentoa = $this->input->post("rev_inf_presentoa");
        if ($rev_inf_presentoa == "")
            $rev_inf_presentoa = null;
        $rev_inf_conclusion = $this->input->post("rev_inf_conclusion");

        if ($parte == '1')
            $this->revInf->actualizarRevisionInformacionP1($rev_inf_id, $rev_inf_fregistro_asesor, $rev_inf_frevision_uep, $rev_inf_adjunto_doc, $rev_inf_plan_municipalidad, $rev_inf_plan_contingencia, $rev_inf_felaboracion
                    , $rev_inf_plan_oformato, $rev_inf_gestion_reactiva, $rev_inf_ogestion_reactiva, $rev_inf_gestion_correctiva, $rev_inf_ogestion_correctiva
                    , $rev_inf_gestion_prospectiva, $rev_inf_ogestion_prospectiva, $rev_inf_plan_comunal, $rev_inf_mapa, $rev_inf_presentoa, $rev_inf_conclusion);
    }

    public function cargarPlanContingencial($tipo, $rev_inf_id) {
        $this->load->model('fase1-sub25/plan_contingencia', 'plaCon');
        $recibidos = $this->plaCon->obtenerPlanContingenciales($rev_inf_id,$tipo );
        $numfilas = count($recibidos);

        if ($numfilas != 0) {
            $i = 0;
            foreach ($recibidos as $aux) {
                $rows[$i]['id'] = $aux->pla_con_id;
                $rows[$i]['cell'] = array($aux->pla_con_id,
                    $aux->pla_con_numero,
                    $aux->pla_con_nombre,
                    $aux->pla_con_descripcion,
                     date('d-m-Y', strtotime($aux->pla_con_fdocumento))
                );
                $i++;
            }
            array_multisort($rows, SORT_ASC);
        } else {
            $rows = array();
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

    public function guardarPlanContingencial($pla_con_tipo, $rev_inf_id) {
        $this->load->model('fase1-sub25/plan_contingencia', 'plaCon');
        $pla_con_id = $this->input->post("id");
        $pla_con_numero = $this->input->post("pla_con_numero");
        $pla_con_nombre = $this->input->post("pla_con_nombre");
        $pla_con_descripcion = $this->input->post("pla_con_descripcion");
        $pla_con_fdocumento = $this->input->post("pla_con_fdocumento");
        if ($pla_con_fdocumento == "")
            $pla_con_fdocumento = null;
        
        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->plaCon->agregarPlanContingencial($pla_con_numero, $pla_con_nombre, $pla_con_descripcion, $rev_inf_id,$pla_con_fdocumento,$pla_con_tipo );
                break;
            case 'edit':
                $this->plaCon->actualizarPlanContingencial($pla_con_id,$pla_con_numero, $pla_con_nombre, $pla_con_descripcion,$pla_con_fdocumento,$pla_con_tipo);
                break;
            case 'del':
                $this->plaCon->eliminarPlanContingencial($pla_con_id);
                break;
        }
    }

}

?>
