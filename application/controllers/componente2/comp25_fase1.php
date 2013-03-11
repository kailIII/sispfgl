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
        if ($revision[0]->rev_inf_fconformacion != "")
            $rev_inf_fconformacion = date('d-m-Y', strtotime($revision[0]->rev_inf_fconformacion));
        else
            $rev_inf_fconformacion = $revision[0]->rev_inf_fconformacion;
        if ($revision [0]->rev_inf_fregistro_asesor != "")
            $rev_inf_fregistro_asesor = date('d-m-Y', strtotime($revision [0]->rev_inf_fregistro_asesor));
        else
            $rev_inf_fregistro_asesor = $revision [0]->rev_inf_fregistro_asesor;
        if ($revision [0]->rev_inf_frevision_uep != "")
            $rev_inf_frevision_uep = date('d-m-Y', strtotime($revision [0]->rev_inf_frevision_uep));
        else
            $rev_inf_frevision_uep = $revision [0]->rev_inf_frevision_uep;


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
            $revision[0]->rev_inf_conclusion,
            $revision[0]->rev_inf_presento,
            $revision[0]->rev_inf_comision_conformada,
            $rev_inf_fconformacion,
            $revision[0]->rev_inf_presentob_eo,
            $revision [0]->rev_inf_dpresentob_eo,
            $revision [0]->rev_inf_comision,
            $revision [0]->rev_inf_acta_comision,
            $revision [0]->rev_inf_dacta_comision,
            $revision [0]->rev_inf_capacitacion,
            $revision [0]->rev_inf_dcapacitacion,
            $revision [0]->rev_inf_herramienta,
            $revision [0]->rev_inf_inv_herramienta,
            $revision [0]->rev_inf_dinv_herramienta,
            $revision [0]->rev_inf_presentoc,
            $revision [0]->rev_inf_dpresentoc,
            $revision [0]->rev_inf_presentod,
            $revision [0]->rev_inf_mapa_identificacion,
            $revision [0]->rev_inf_dmapa_identificacion,
            $revision [0]->rev_inf_presentoe,
            $revision [0]->rev_inf_dpresentoe,
            $revision [0]->rev_inf_dpresentof,
            $revision [0]->rev_inf_presentof,
            $rev_inf_fregistro_asesor,
            $rev_inf_frevision_uep,
            $revision [0]->rev_inf_adjunto_doc
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
        switch ($parte) {
            case '1':
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
                $this->revInf->actualizarRevisionInformacionP1($rev_inf_id, $rev_inf_fregistro_asesor, $rev_inf_frevision_uep, $rev_inf_adjunto_doc, $rev_inf_plan_municipalidad, $rev_inf_plan_contingencia, $rev_inf_felaboracion
                        , $rev_inf_plan_oformato, $rev_inf_gestion_reactiva, $rev_inf_ogestion_reactiva, $rev_inf_gestion_correctiva, $rev_inf_ogestion_correctiva
                        , $rev_inf_gestion_prospectiva, $rev_inf_ogestion_prospectiva, $rev_inf_plan_comunal, $rev_inf_mapa, $rev_inf_presentoa, $rev_inf_conclusion);
                break;
            case '2':
                $rev_inf_id = $this->input->post("rev_inf_id2");
                $rev_inf_presento = $this->input->post("rev_inf_presento");
                if ($rev_inf_presento == "")
                    $rev_inf_presento = null;
                $rev_inf_comision_conformada = $this->input->post("rev_inf_comision_conformada");
                if ($rev_inf_comision_conformada == "")
                    $rev_inf_comision_conformada = null;
                $rev_inf_fconformacion = $this->input->post("rev_inf_fconformacion");
                if ($rev_inf_fconformacion == "")
                    $rev_inf_fconformacion = null;
                $rev_inf_presentob_eo = $this->input->post("rev_inf_presentob_eo");
                if ($rev_inf_presentob_eo == "")
                    $rev_inf_presentob_eo = null;
                $rev_inf_dpresentob_eo = $this->input->post("rev_inf_dpresentob_eo");
                $rev_inf_comision = $this->input->post("rev_inf_comision");
                if ($rev_inf_comision == "")
                    $rev_inf_comision = null;
                $rev_inf_acta_comision = $this->input->post("rev_inf_acta_comision");
                if ($rev_inf_acta_comision == "")
                    $rev_inf_acta_comision = null;
                $rev_inf_dacta_comision = $this->input->post("rev_inf_dacta_comision");
                $rev_inf_capacitacion = $this->input->post("rev_inf_capacitacion");
                if ($rev_inf_capacitacion == "")
                    $rev_inf_capacitacion = null;
                $rev_inf_dcapacitacion = $this->input->post("rev_inf_dcapacitacion");
                $rev_inf_herramienta = $this->input->post("rev_inf_herramienta");
                if ($rev_inf_herramienta == "")
                    $rev_inf_herramienta = null;
                $rev_inf_inv_herramienta = $this->input->post("rev_inf_inv_herramienta");
                if ($rev_inf_inv_herramienta == "")
                    $rev_inf_inv_herramienta = null;
                $rev_inf_dinv_herramienta = $this->input->post("rev_inf_dinv_herramienta");
                $rev_inf_presentoc = $this->input->post("rev_inf_presentoc");
                if ($rev_inf_presentoc == "")
                    $rev_inf_presentoc = null;
                $rev_inf_dpresentoc = $this->input->post("rev_inf_dpresentoc");
                $rev_inf_presentod = $this->input->post("rev_inf_presentod");
                if ($rev_inf_presentod == "")
                    $rev_inf_presentod = null;
                $rev_inf_mapa_identificacion = $this->input->post("rev_inf_mapa_identificacion");
                if ($rev_inf_mapa_identificacion == "")
                    $rev_inf_mapa_identificacion = null;
                $rev_inf_dmapa_identificacion = $this->input->post("rev_inf_dmapa_identificacion");
                $rev_inf_presentoe = $this->input->post("rev_inf_presentoe");
                if ($rev_inf_presentoe == "")
                    $rev_inf_presentoe = null;
                $rev_inf_dpresentoe = $this->input->post("rev_inf_dpresentoe");
                $rev_inf_presentof = $this->input->post("rev_inf_presentof");
                if ($rev_inf_presentof == "")
                    $rev_inf_presentof = null;
                $rev_inf_dpresentof = $this->input->post("rev_inf_dpresentof");
                $this->revInf->actualizarRevisionInformacionP2($rev_inf_id, $rev_inf_presento, $rev_inf_comision_conformada, $rev_inf_fconformacion, $rev_inf_presentob_eo, $rev_inf_dpresentob_eo, $rev_inf_comision
                        , $rev_inf_acta_comision, $rev_inf_dacta_comision, $rev_inf_capacitacion, $rev_inf_dcapacitacion, $rev_inf_herramienta
                        , $rev_inf_inv_herramienta, $rev_inf_dinv_herramienta, $rev_inf_presentoc, $rev_inf_dpresentoc, $rev_inf_presentod, $rev_inf_mapa_identificacion
                        , $rev_inf_dmapa_identificacion, $rev_inf_presentoe, $rev_inf_dpresentoe, $rev_inf_dpresentof, $rev_inf_presentof);

                break;
            case '3':
                $rev_inf_fregistro_asesor = $this->input->post("rev_inf_fregistro_asesor");
                if ($rev_inf_fregistro_asesor == "")
                    $rev_inf_fregistro_asesor = null;
                $rev_inf_frevision_uep = $this->input->post("rev_inf_frevision_uep");
                if ($rev_inf_frevision_uep == "")
                    $rev_inf_frevision_uep = null;
                $rev_inf_id = $this->input->post("rev_inf_id3");
                $rev_inf_adjunto_doc = $this->input->post("rev_inf_adjunto_doc");
                if ($rev_inf_adjunto_doc == '0')
                    $rev_inf_adjunto_doc = null;
                $this->revInf->actualizarRevisionInformacionP3($rev_inf_id, $rev_inf_fregistro_asesor, $rev_inf_frevision_uep, $rev_inf_adjunto_doc);
                break;
        }
    }

    public function cargarPlanContingencial($tipo, $rev_inf_id) {
        $this->load->model('fase1-sub25/plan_contingencia', 'plaCon');
        $recibidos = $this->plaCon->obtenerPlanContingenciales($rev_inf_id, $tipo);
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
                $this->plaCon->agregarPlanContingencial($pla_con_numero, $pla_con_nombre, $pla_con_descripcion, $rev_inf_id, $pla_con_fdocumento, $pla_con_tipo);
                break;
            case 'edit':
                $this->plaCon->actualizarPlanContingencial($pla_con_id, $pla_con_numero, $pla_con_nombre, $pla_con_descripcion, $pla_con_fdocumento, $pla_con_tipo);
                break;
            case 'del':
                $this->plaCon->eliminarPlanContingencial($pla_con_id);
                break;
        }
    }

    public function rubrosElegibles() {
        $informacion['titulo'] = 'Componente 2.5 Registro de datos del componente';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        //OBTENER DEPARTAMENTOS
        $this->load->model('pais/departamento');
        $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();
        $this->load->model('fase1-sub25/nombre_rubro', 'nomRub');
        $informacion['nombreRubros'] = $this->nomRub->obtenerNombresRubro();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp25/fase1/rubrosElegibles_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarRubrosElegibles($mun_id) {
        $this->load->model('pais/municipio');
        $this->load->model('fase1-sub25/rubro');
        $this->load->model('fase1-sub25/rubro_elegible', 'rubEle');
        $this->load->model('fase1-sub25/detalle_fortalecimiento', 'detFor');
        $this->load->model('fase1-sub25/detalle_obra', 'detObra');
        $this->load->model('fase1-sub25/nombre_rubro', 'nomRub');
        $this->load->model('fase1-sub25/categoria_fortalecimiento', 'catFor');
        $this->load->model('fase1-sub25/obra');
        $resultado = $this->municipio->obtenerIDVariable('rub_id', $mun_id);

        if ($resultado[0]->rub_id == 0) {
            $this->rubro->agregarRubro($mun_id);
            $resultado = $this->rubro->idPorMunicipio($mun_id);
            $this->municipio->actualizarIndices('rub_id', $resultado[0]->rub_id, $mun_id);
            $rubros = $this->nomRub->obtenerNombresRubro();
            foreach ($rubros as $rubro)
                $this->rubEle->insertarRubroElegible($resultado[0]->rub_id, $rubro->nom_rub_id);
            $categorias = $this->catFor->obtenerCategoriasFortalecimiento();
            foreach ($categorias as $categoria)
                $this->detFor->insertarDetalleFortalecimiento($resultado[0]->rub_id, $categoria->cat_for_id);
            $obras = $this->obra->obtenerObras();
            foreach ($obras as $obra)
                $this->detObra->insertarDetalleObra($resultado[0]->rub_id, $obra->obr_id);
        }
        $resultado = $this->rubro->idPorMunicipio($mun_id);
        $rubros = $this->rubEle->obtenerLosRubros($resultado[0]->rub_id);
        $rubroE = array();
        foreach ($rubros as $rubro)
            $rubroE[$rubro->nom_rub_id] = array($rubro->rub_ele_seleccionado, $rubro->rub_ele_observacion);

        $rows[0]['id'] = $resultado[0]->rub_id;
        $rows[0]['cell'] = array($resultado[0]->rub_id,
            $resultado[0]->rub_observacion_general,
            $resultado[0]->rub_emite_nota,
            $rubroE
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

    public function guardarRubrosElegibles() {
        $this->load->model('fase1-sub25/rubro');
        $this->load->model('fase1-sub25/rubro_elegible', 'rubEle');
        $rub_id = $this->input->post("rub_id");
        $rub_observacion_general = $this->input->post("rub_observacion_general");
        $rub_emite_nota = $this->input->post("rub_emite_nota");
        if ($rub_emite_nota == '0')
            $rub_emite_nota = null;
        $rub_observacion = null;
        $this->rubro->actualizarRubro($rub_id, $rub_observacion_general, $rub_emite_nota, $rub_observacion);
        $rubros = $this->rubEle->obtenerLosRubros($rub_id);
        foreach ($rubros as $rubro) {
            $valor = $this->input->post("rubro_$rubro->nom_rub_id");
            if ($valor == '0')
                $valor = null;
            $conclusion = $this->input->post("conclusion_$rubro->nom_rub_id");
            $this->rubEle->actualizarRubroElegible($valor, $rub_id, $rubro->nom_rub_id, $conclusion);
        }
    }

    public function cargarNota($rub_id) {
        $this->load->model('fase1-sub25/nota');
        $notas = $this->nota->obtenerNotas($rub_id);
        $numfilas = count($notas);

        if ($numfilas != 0) {
            $i = 0;
            foreach ($notas as $aux) {
                $rows[$i]['id'] = $aux->not_id;
                $rows[$i]['cell'] = array($aux->not_id,
                    $aux->not_correlativo,
                    date('d-m-Y', strtotime($aux->not_fnota)),
                    $aux->not_observacion
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

    public function guardarNota($rub_id) {
        $this->load->model('fase1-sub25/nota');
        $not_id = $this->input->post("id");
        $not_correlativo = $this->input->post("not_correlativo");
        $not_fnota = $this->input->post("not_fnota");
        $not_observacion = $this->input->post("not_observacion");

        $operacion = $this->input->post("oper");
        switch ($operacion) {
            case 'add':
                $this->nota->agregarNota($not_correlativo, $not_fnota, $not_observacion, $rub_id);
                break;
            case 'edit':
                $this->nota->actualizarNota($not_id, $not_correlativo, $not_fnota, $not_observacion);
                break;
            case 'del':
                $this->nota->eliminarNota($not_id);
                break;
        }
    }

    public function aprobacionPerfil() {
        $informacion['titulo'] = 'Componente 2.5 Registro de datos del componente';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        //OBTENER DEPARTAMENTOS
        $this->load->model('pais/departamento');
        $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp25/fase1/aprobacionPerfil_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarAprobacionPerfil($mun_id) {
        $this->load->model('pais/municipio');
        $this->load->model('fase1-sub25/perfil_proyecto', 'perPro');
        $resultado = $this->municipio->obtenerIDVariable('per_pro_id', $mun_id);

        if ($resultado[0]->per_pro_id == 0) {
            $this->perPro->agregarPerfilProyecto($mun_id);
            $resultado = $this->perPro->idPorMunicipio($mun_id);
            $this->municipio->actualizarIndices('per_pro_id', $resultado[0]->per_pro_id, $mun_id);
        }
        $revision = $this->perPro->idPorMunicipio($mun_id);
        $per_pro_fentrega_isdem = $revision[0]->per_pro_fentrega_isdem;
        if ($per_pro_fentrega_isdem != "")
            $per_pro_fentrega_isdem = date('d-m-Y', strtotime($per_pro_fentrega_isdem));
        $per_pro_fentrega_uep = $revision[0]->per_pro_fentrega_uep;
        if ($per_pro_fentrega_uep != "")
            $per_pro_fentrega_uep = date('d-m-Y', strtotime($per_pro_fentrega_uep));
        $per_pro_fnota_autorizacion = $revision[0]->per_pro_fnota_autorizacion;
        if ($per_pro_fnota_autorizacion != "")
            $per_pro_fnota_autorizacion = date('d-m-Y', strtotime($per_pro_fnota_autorizacion));
        $per_pro_fentrega_u_i = $revision[0]->per_pro_fentrega_u_i;
        if ($per_pro_fentrega_u_i != "")
            $per_pro_fentrega_u_i = date('d-m-Y', strtotime($per_pro_fentrega_u_i));
        $per_pro_ftdr = $revision[0]->per_pro_ftdr;
        if ($per_pro_ftdr != "")
            $per_pro_ftdr = date('d-m-Y', strtotime($per_pro_ftdr));
        $per_pro_fespecificacion = $revision[0]->per_pro_fespecificacion;
        if ($per_pro_fespecificacion != "")
            $per_pro_fespecificacion = date('d-m-Y', strtotime($per_pro_fespecificacion));
        $per_pro_fcarpeta_reducida = $revision[0]->per_pro_fcarpeta_reducida;
        if ($per_pro_fcarpeta_reducida != "")
            $per_pro_fcarpeta_reducida = date('d-m-Y', strtotime($per_pro_fcarpeta_reducida));
        $per_pro_frecibe_municipio = $revision[0]->per_pro_frecibe_municipio;
        if ($per_pro_frecibe_municipio != "")
            $per_pro_frecibe_municipio = date('d-m-Y', strtotime($per_pro_frecibe_municipio));
        $per_pro_femision_acuerdo = $revision[0]->per_pro_femision_acuerdo;
        if ($per_pro_femision_acuerdo != "")
            $per_pro_femision_acuerdo = date('d-m-Y', strtotime($per_pro_femision_acuerdo));
        $per_pro_fcertificacion = $revision[0]->per_pro_fcertificacion;
        if ($per_pro_fcertificacion != "")
            $per_pro_fcertificacion = date('d-m-Y', strtotime($per_pro_fcertificacion));
        $per_pro_frecibe = $revision[0]->per_pro_frecibe;
        if ($per_pro_frecibe != "")
            $per_pro_frecibe = date('d-m-Y', strtotime($per_pro_frecibe));
        $per_pro_fencio_fisdl = $revision[0]->per_pro_fencio_fisdl;
        if ($per_pro_fencio_fisdl != "")
            $per_pro_fencio_fisdl = date('d-m-Y', strtotime($per_pro_fencio_fisdl));
        if ($revision[0]->per_pro_per_ruta_archivo == NULL || $revision[0]->per_pro_per_ruta_archivo == '0')
            $nPerfil = 'No hay Perfil para descargar';
        else
            $nPerfil = 'Descargar ' . end(explode("/", $revision[0]->per_pro_per_ruta_archivo));
        if ($revision[0]->per_pro_tdr_ruta_archivo == NULL || $revision[0]->per_pro_tdr_ruta_archivo == '0')
            $nTdr = 'No hay TDR para descargar';
        else
            $nTdr = 'Descargar ' . end(explode("/", $revision[0]->per_pro_tdr_ruta_archivo));
        if ($revision[0]->per_pro_esp_ruta_archivo == NULL || $revision[0]->per_pro_esp_ruta_archivo == '0')
            $nEsp = 'No hay Especificaciones para descargar';
        else
            $nEsp = 'Descargar ' . end(explode("/", $revision[0]->per_pro_esp_ruta_archivo));
        if ($revision[0]->per_pro_car_ruta_archivo == NULL || $revision[0]->per_pro_car_ruta_archivo == '0')
            $nCar = 'No hay Carpeta para descargar';
        else
            $nCar = 'Descargar ' . end(explode("/", $revision[0]->per_pro_car_ruta_archivo));
        if ($revision[0]->per_pro_acu_ruta_archivo == NULL || $revision[0]->per_pro_acu_ruta_archivo == '0')
            $nAcu = 'No hay Acuerdo para descargar';
        else
            $nAcu = 'Descargar ' . end(explode("/", $revision[0]->per_pro_acu_ruta_archivo));
        $rows[0]['id'] = $revision[0]->per_pro_id;
        $rows[0]['cell'] = array($revision[0]->per_pro_id,
            $per_pro_fentrega_isdem,
            $per_pro_fentrega_uep,
            $per_pro_fnota_autorizacion,
            $per_pro_fentrega_u_i,
            $per_pro_ftdr,
            $per_pro_fespecificacion,
            $per_pro_fcarpeta_reducida,
            $per_pro_frecibe_municipio,
            $per_pro_femision_acuerdo,
            $per_pro_fcertificacion,
            $per_pro_frecibe,
            $per_pro_fencio_fisdl,
            $revision[0]->per_pro_consultor_individual,
            $revision[0]->per_pro_firma,
            $revision[0]->per_pro_ong,
            $revision[0]->per_pro_observacion,
            $revision[0]->per_pro_per_ruta_archivo,
            $nPerfil,
            $revision[0]->per_pro_tdr_ruta_archivo,
            $nTdr,
            $revision[0]->per_pro_esp_ruta_archivo,
            $nEsp,
            $revision[0]->per_pro_car_ruta_archivo,
            $nCar,
            $revision[0]->per_pro_acu_ruta_archivo,
            $nAcu
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

    public function guardarAprobacionPerfil() {
        $this->load->model('fase1-sub25/perfil_proyecto', 'perPro');
        $per_pro_id = $this->input->post("per_pro_id");
        $per_pro_fentrega_isdem = $this->input->post("per_pro_fentrega_isdem");
        if ($per_pro_fentrega_isdem == "")
            $per_pro_fentrega_isdem = null;
        $per_pro_fentrega_uep = $this->input->post("per_pro_fentrega_uep");
        if ($per_pro_fentrega_uep == "")
            $per_pro_fentrega_uep = null;
        $per_pro_fnota_autorizacion = $this->input->post("per_pro_fnota_autorizacion");
        if ($per_pro_fnota_autorizacion == "")
            $per_pro_fnota_autorizacion = null;
        $per_pro_fentrega_u_i = $this->input->post("per_pro_fentrega_u_i");
        if ($per_pro_fentrega_u_i == "")
            $per_pro_fentrega_u_i = null;
        $per_pro_ftdr = $this->input->post("per_pro_ftdr");
        if ($per_pro_ftdr == "")
            $per_pro_ftdr = null;
        $per_pro_fespecificacion = $this->input->post("per_pro_fespecificacion");
        if ($per_pro_fespecificacion == "")
            $per_pro_fespecificacion = null;
        $per_pro_fcarpeta_reducida = $this->input->post("per_pro_fcarpeta_reducida");
        if ($per_pro_fcarpeta_reducida == "")
            $per_pro_fcarpeta_reducida = null;
        $per_pro_frecibe_municipio = $this->input->post("per_pro_frecibe_municipio");
        if ($per_pro_frecibe_municipio == "")
            $per_pro_frecibe_municipio = null;
        $per_pro_femision_acuerdo = $this->input->post("per_pro_femision_acuerdo");
        if ($per_pro_femision_acuerdo == "")
            $per_pro_femision_acuerdo = null;
        $per_pro_fcertificacion = $this->input->post("per_pro_fcertificacion");
        if ($per_pro_fcertificacion == "")
            $per_pro_fcertificacion = null;
        $per_pro_frecibe = $this->input->post("per_pro_frecibe");
        if ($per_pro_frecibe == "")
            $per_pro_frecibe = null;
        $per_pro_fencio_fisdl = $this->input->post("per_pro_fencio_fisdl");
        if ($per_pro_fencio_fisdl == "")
            $per_pro_fencio_fisdl = null;
        $per_pro_consultor_individual = $this->input->post("per_pro_consultor_individual");
        if ($per_pro_consultor_individual == '0')
            $per_pro_consultor_individual = null;

        $per_pro_firma = $this->input->post("per_pro_firma");
        if ($per_pro_firma == '0')
            $per_pro_firma = null;

        $per_pro_ong = $this->input->post("per_pro_ong");
        if ($per_pro_ong == '0')
            $per_pro_ong = null;

        $per_pro_observacion = $this->input->post("per_pro_observacion");
        $per_pro_tdr_ruta_archivo = $this->input->post("per_pro_tdr_ruta_archivo");
        $per_pro_esp_ruta_archivo = $this->input->post("per_pro_esp_ruta_archivo");
        $per_pro_car_ruta_archivo = $this->input->post("per_pro_car_ruta_archivo");
        $per_pro_acu_ruta_archivo = $this->input->post("per_pro_acu_ruta_archivo");
        $per_pro_per_ruta_archivo = $this->input->post("per_pro_per_ruta_archivo");
        $this->perPro->actualizarPerfilProyecto($per_pro_id, $per_pro_fentrega_isdem, $per_pro_fentrega_uep, $per_pro_fnota_autorizacion
                , $per_pro_fentrega_u_i, $per_pro_ftdr, $per_pro_fespecificacion
                , $per_pro_fcarpeta_reducida, $per_pro_frecibe_municipio, $per_pro_femision_acuerdo
                , $per_pro_fcertificacion, $per_pro_frecibe, $per_pro_fencio_fisdl
                , $per_pro_consultor_individual, $per_pro_firma, $per_pro_ong
                , $per_pro_observacion, $per_pro_tdr_ruta_archivo, $per_pro_esp_ruta_archivo
                , $per_pro_car_ruta_archivo, $per_pro_acu_ruta_archivo, $per_pro_per_ruta_archivo
        );
    }

    public function rubrosElegiblesAplica() {
        $informacion['titulo'] = 'Componente 2.5 Registro de datos del componente';
        $informacion['user_id'] = $this->tank_auth->get_user_id();
        $informacion['username'] = $this->tank_auth->get_username();
        $informacion['menu'] = $this->librerias->creaMenu($this->tank_auth->get_username());
        //OBTENER DEPARTAMENTOS
        $this->load->model('pais/departamento');
        $informacion['departamentos'] = $this->departamento->obtenerDepartamentos();
        //RUBROS
        $this->load->model('fase1-sub25/nombre_rubro', 'nomRub');
        $informacion['nombreRubros'] = $this->nomRub->obtenerNombresRubro();
        //CATEGORIA_FORTALECIMIENTO
        $this->load->model('fase1-sub25/categoria_fortalecimiento', 'catFor');
        $informacion['categorias'] = $this->catFor->obtenerCategoriasFortalecimiento();
        //OBRA
        $this->load->model('fase1-sub25/obra');
        $informacion['obras'] = $this->obra->obtenerObras();
        $this->load->view('plantilla/header', $informacion);
        $this->load->view('plantilla/menu', $informacion);
        $this->load->view('componente2/subcomp25/fase1/rubrosElegiblesAplica_view');
        $this->load->view('plantilla/footer', $informacion);
    }

    public function cargarRubrosElegiblesAplica($mun_id) {
        $this->load->model('pais/municipio');
        $this->load->model('fase1-sub25/rubro');
        $this->load->model('fase1-sub25/rubro_elegible', 'rubEle');
        $this->load->model('fase1-sub25/detalle_fortalecimiento', 'detFor');
        $this->load->model('fase1-sub25/detalle_obra', 'detObra');
        $this->load->model('fase1-sub25/nombre_rubro', 'nomRub');
        $this->load->model('fase1-sub25/categoria_fortalecimiento', 'catFor');
        $this->load->model('fase1-sub25/obra');
        $datosMunicipio = $this->municipio->obtenerMunicipio($mun_id);
        $resultado = $this->rubro->idPorMunicipio($mun_id);
        $rubros = $this->rubEle->obtenerLosRubros($resultado[0]->rub_id);
        $rubroE = array();
        $suma = 0;
        foreach ($rubros as $rubro) {
            $rubroE[$rubro->nom_rub_id] = array($rubro->rub_ele_monto);
            $suma+=$rubro->rub_ele_monto;
        }
        $categorias = $this->detFor->obtenerLosDetallesFortalecimiento($resultado[0]->rub_id);
        $detalles = array();
        $suma2 = 0;
        foreach ($categorias as $aux) {
            $detalles[$aux->cat_for_id] = array($aux->for_monto);
            $suma2+=$aux->for_monto;
        }
        $obras = $this->detObra->obtenerLosDetallesObra($resultado[0]->rub_id);
        $detallesO = array();
        $suma3 = 0;
        foreach ($obras as $aux) {
            $detallesO[$aux->obr_id] = array($aux->det_obr_monto);
            $suma3+=$aux->det_obr_monto;
        }
        $rows[0]['id'] = $resultado[0]->rub_id;
        $rows[0]['cell'] = array($resultado[0]->rub_id,
            $datosMunicipio[0]->mun_presupuesto,
            $rubroE,
            $detalles,
            $detallesO,
            $suma,
            $suma2,
            $suma3,
            $resultado[0]->rub_nombre_proyecto,
            $resultado[0]->rub_observacion
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

    public function guardarRubrosElegiblesAplica() {
        $this->load->model('fase1-sub25/rubro');
        $this->load->model('fase1-sub25/rubro_elegible', 'rubEle');
        $this->load->model('fase1-sub25/detalle_fortalecimiento', 'detFor');
        $this->load->model('fase1-sub25/detalle_obra', 'detObra');

        $rub_id = $this->input->post("rub_id");
        $rub_observacion = $this->input->post("rub_observacion");
        $rub_nombre_proyecto = $this->input->post("rub_nombre_proyecto");
        $this->rubro->actualizarRubro2($rub_id, $rub_nombre_proyecto, $rub_observacion);
        $rubros = $this->rubEle->obtenerLosRubros($rub_id);
        foreach ($rubros as $rubro) {
            $valor = $this->input->post("rub_ele_monto_$rubro->nom_rub_id");
            $this->rubEle->actualizarRubroElegible2($valor, $rub_id, $rubro->nom_rub_id);
        }
        $categorias = $this->detFor->obtenerLosDetallesFortalecimiento($rub_id);
        foreach ($categorias as $aux) {
            $valor = $this->input->post("for_monto_$aux->cat_for_id");
            $this->detFor->actualizarDetalleFortalecimiento($valor, $rub_id, $aux->cat_for_id);
        }
        $obras = $this->detObra->obtenerLosDetallesObra($rub_id);
        foreach ($obras as $aux) {
            $valor = $this->input->post("det_obra_monto_$aux->obr_id");
            $this->detObra->actualizarDetalleObra($valor, $rub_id, $aux->obr_id);
        }
    }

}

?>
