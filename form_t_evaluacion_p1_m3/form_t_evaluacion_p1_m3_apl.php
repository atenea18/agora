<?php
//
class form_t_evaluacion_p1_m3_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'navSummary'     => array(),
                                'navPage'        => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id_estudiante_;
   var $id_estudiante__1;
   var $primer_apellido_;
   var $segundo_apellido_;
   var $primer_nombre_;
   var $segundo_nombre_;
   var $id_grupo_;
   var $id_area_;
   var $id_asignatura_;
   var $id_grado_;
   var $id_nivel_;
   var $ihs_;
   var $pfa_;
   var $tipo_asig_;
   var $novedad_;
   var $estatus_;
   var $inasistencia_p1_;
   var $eval_1_per_;
   var $dc1_;
   var $dc2_;
   var $dc3_;
   var $dc4_;
   var $dc5_;
   var $dc6_;
   var $dc7_;
   var $dc8_;
   var $dc9_;
   var $pcent_dc_;
   var $ds1_;
   var $ds2_;
   var $ds3_;
   var $ds4_;
   var $ds5_;
   var $pcent_ds_;
   var $dp1_;
   var $dp2_;
   var $dp3_;
   var $dp4_;
   var $dp5_;
   var $pcent_dp_;
   var $aeep1_;
   var $porcent_aeep1_;
   var $inasistencia_p2_;
   var $eval_2_per_;
   var $dc1_2p_;
   var $dc2_2p_;
   var $dc3_2p_;
   var $dc4_2p_;
   var $dc5_2p_;
   var $pcent_dc2_;
   var $ds1_2p_;
   var $ds2_2p_;
   var $ds3_2p_;
   var $ds4_2p_;
   var $ds5_2p_;
   var $pcent_ds2_;
   var $dp1_2p_;
   var $dp2_2p_;
   var $dp3_2p_;
   var $dp4_2p_;
   var $dp5_2p_;
   var $pcent_dp2_;
   var $aee_p2_;
   var $porcet_aee_p2_;
   var $inasistencia_p3_;
   var $eval_3_per_;
   var $dc1_3p_;
   var $dc2_3p_;
   var $dc3_3p_;
   var $dc4_3p_;
   var $dc5_3p_;
   var $pcent_dc3_;
   var $ds1_p3_;
   var $ds2_p3_;
   var $ds3_p3_;
   var $ds4_p3_;
   var $ds5_p3_;
   var $pcent_ds3_;
   var $dp1_p3_;
   var $dp2_p3_;
   var $dp3_p3_;
   var $dp4_p3_;
   var $sc_field_0_;
   var $pcent_dp3_;
   var $aee_p3_;
   var $porcent_aee_p3_;
   var $inasistencia_p4_;
   var $eval_4_per_;
   var $dc1_p4_;
   var $dc2_p4_;
   var $dc3_p4_;
   var $dc4_p4_;
   var $dc5_p4_;
   var $pcent_dc4_;
   var $ds1_p4_;
   var $ds2_p4_;
   var $ds3_p4_;
   var $ds4_p4_;
   var $ds5_p4_;
   var $pcent_ds4_;
   var $dp1_p4_;
   var $dp2_p4_;
   var $dp3_p4_;
   var $dp4_p4_;
   var $dp5_p4_;
   var $aee_p4_;
   var $porcent_aee_p4_;
   var $pcent_dp4_;
   var $eval_final_;
   var $entorno_;
   var $asienta_inasistencias_;
   var $estudiantes_;
   var $id_novedad_;
   var $nom_grupo_;
   var $val_acumulada_;
   var $val_requerida_;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_max_reg = 1; 
   var $sc_max_reg_incl = 50; 
   var $form_vert_form_t_evaluacion_p1_m3 = array();
   var $form_paginacao = 'total';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = true;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['aeep1_']))
          {
              $this->aeep1_ = $this->NM_ajax_info['param']['aeep1_'];
          }
          if (isset($this->NM_ajax_info['param']['asienta_inasistencias_']))
          {
              $this->asienta_inasistencias_ = $this->NM_ajax_info['param']['asienta_inasistencias_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['dc1_']))
          {
              $this->dc1_ = $this->NM_ajax_info['param']['dc1_'];
          }
          if (isset($this->NM_ajax_info['param']['dc2_']))
          {
              $this->dc2_ = $this->NM_ajax_info['param']['dc2_'];
          }
          if (isset($this->NM_ajax_info['param']['dc3_']))
          {
              $this->dc3_ = $this->NM_ajax_info['param']['dc3_'];
          }
          if (isset($this->NM_ajax_info['param']['dc4_']))
          {
              $this->dc4_ = $this->NM_ajax_info['param']['dc4_'];
          }
          if (isset($this->NM_ajax_info['param']['dc5_']))
          {
              $this->dc5_ = $this->NM_ajax_info['param']['dc5_'];
          }
          if (isset($this->NM_ajax_info['param']['dp1_']))
          {
              $this->dp1_ = $this->NM_ajax_info['param']['dp1_'];
          }
          if (isset($this->NM_ajax_info['param']['dp2_']))
          {
              $this->dp2_ = $this->NM_ajax_info['param']['dp2_'];
          }
          if (isset($this->NM_ajax_info['param']['dp3_']))
          {
              $this->dp3_ = $this->NM_ajax_info['param']['dp3_'];
          }
          if (isset($this->NM_ajax_info['param']['ds1_']))
          {
              $this->ds1_ = $this->NM_ajax_info['param']['ds1_'];
          }
          if (isset($this->NM_ajax_info['param']['ds2_']))
          {
              $this->ds2_ = $this->NM_ajax_info['param']['ds2_'];
          }
          if (isset($this->NM_ajax_info['param']['ds3_']))
          {
              $this->ds3_ = $this->NM_ajax_info['param']['ds3_'];
          }
          if (isset($this->NM_ajax_info['param']['estatus_']))
          {
              $this->estatus_ = $this->NM_ajax_info['param']['estatus_'];
          }
          if (isset($this->NM_ajax_info['param']['eval_1_per_']))
          {
              $this->eval_1_per_ = $this->NM_ajax_info['param']['eval_1_per_'];
          }
          if (isset($this->NM_ajax_info['param']['id_asignatura_']))
          {
              $this->id_asignatura_ = $this->NM_ajax_info['param']['id_asignatura_'];
          }
          if (isset($this->NM_ajax_info['param']['id_estudiante_']))
          {
              $this->id_estudiante_ = $this->NM_ajax_info['param']['id_estudiante_'];
          }
          if (isset($this->NM_ajax_info['param']['id_grupo_']))
          {
              $this->id_grupo_ = $this->NM_ajax_info['param']['id_grupo_'];
          }
          if (isset($this->NM_ajax_info['param']['inasistencia_p1_']))
          {
              $this->inasistencia_p1_ = $this->NM_ajax_info['param']['inasistencia_p1_'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['novedad_']))
          {
              $this->novedad_ = $this->NM_ajax_info['param']['novedad_'];
          }
          if (isset($this->NM_ajax_info['param']['pcent_dc_']))
          {
              $this->pcent_dc_ = $this->NM_ajax_info['param']['pcent_dc_'];
          }
          if (isset($this->NM_ajax_info['param']['pcent_dp_']))
          {
              $this->pcent_dp_ = $this->NM_ajax_info['param']['pcent_dp_'];
          }
          if (isset($this->NM_ajax_info['param']['pcent_ds_']))
          {
              $this->pcent_ds_ = $this->NM_ajax_info['param']['pcent_ds_'];
          }
          if (isset($this->NM_ajax_info['param']['porcent_aeep1_']))
          {
              $this->porcent_aeep1_ = $this->NM_ajax_info['param']['porcent_aeep1_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['val_acumulada_']))
          {
              $this->val_acumulada_ = $this->NM_ajax_info['param']['val_acumulada_'];
          }
          if (isset($this->NM_ajax_info['param']['val_requerida_']))
          {
              $this->val_requerida_ = $this->NM_ajax_info['param']['val_requerida_'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      $this->sc_conv_var['id_estudiante'] = "id_estudiante_";
      $this->sc_conv_var['primer_apellido'] = "primer_apellido_";
      $this->sc_conv_var['segundo_apellido'] = "segundo_apellido_";
      $this->sc_conv_var['primer_nombre'] = "primer_nombre_";
      $this->sc_conv_var['segundo_nombre'] = "segundo_nombre_";
      $this->sc_conv_var['id_grupo'] = "id_grupo_";
      $this->sc_conv_var['id_area'] = "id_area_";
      $this->sc_conv_var['id_asignatura'] = "id_asignatura_";
      $this->sc_conv_var['id_grado'] = "id_grado_";
      $this->sc_conv_var['id_nivel'] = "id_nivel_";
      $this->sc_conv_var['ihs'] = "ihs_";
      $this->sc_conv_var['pfa'] = "pfa_";
      $this->sc_conv_var['tipo_asig'] = "tipo_asig_";
      $this->sc_conv_var['novedad'] = "novedad_";
      $this->sc_conv_var['estatus'] = "estatus_";
      $this->sc_conv_var['inasistencia_p1'] = "inasistencia_p1_";
      $this->sc_conv_var['eval_1_per'] = "eval_1_per_";
      $this->sc_conv_var['dc1'] = "dc1_";
      $this->sc_conv_var['dc2'] = "dc2_";
      $this->sc_conv_var['dc3'] = "dc3_";
      $this->sc_conv_var['dc4'] = "dc4_";
      $this->sc_conv_var['dc5'] = "dc5_";
      $this->sc_conv_var['dc6'] = "dc6_";
      $this->sc_conv_var['dc7'] = "dc7_";
      $this->sc_conv_var['dc8'] = "dc8_";
      $this->sc_conv_var['dc9'] = "dc9_";
      $this->sc_conv_var['pcent_dc'] = "pcent_dc_";
      $this->sc_conv_var['ds1'] = "ds1_";
      $this->sc_conv_var['ds2'] = "ds2_";
      $this->sc_conv_var['ds3'] = "ds3_";
      $this->sc_conv_var['ds4'] = "ds4_";
      $this->sc_conv_var['ds5'] = "ds5_";
      $this->sc_conv_var['pcent_ds'] = "pcent_ds_";
      $this->sc_conv_var['dp1'] = "dp1_";
      $this->sc_conv_var['dp2'] = "dp2_";
      $this->sc_conv_var['dp3'] = "dp3_";
      $this->sc_conv_var['dp4'] = "dp4_";
      $this->sc_conv_var['dp5'] = "dp5_";
      $this->sc_conv_var['pcent_dp'] = "pcent_dp_";
      $this->sc_conv_var['aeep1'] = "aeep1_";
      $this->sc_conv_var['porcent_aeep1'] = "porcent_aeep1_";
      $this->sc_conv_var['inasistencia_p2'] = "inasistencia_p2_";
      $this->sc_conv_var['eval_2_per'] = "eval_2_per_";
      $this->sc_conv_var['dc1_2p'] = "dc1_2p_";
      $this->sc_conv_var['dc2_2p'] = "dc2_2p_";
      $this->sc_conv_var['dc3_2p'] = "dc3_2p_";
      $this->sc_conv_var['dc4_2p'] = "dc4_2p_";
      $this->sc_conv_var['dc5_2p'] = "dc5_2p_";
      $this->sc_conv_var['pcent_dc2'] = "pcent_dc2_";
      $this->sc_conv_var['ds1_2p'] = "ds1_2p_";
      $this->sc_conv_var['ds2_2p'] = "ds2_2p_";
      $this->sc_conv_var['ds3_2p'] = "ds3_2p_";
      $this->sc_conv_var['ds4_2p'] = "ds4_2p_";
      $this->sc_conv_var['ds5_2p'] = "ds5_2p_";
      $this->sc_conv_var['pcent_ds2'] = "pcent_ds2_";
      $this->sc_conv_var['dp1_2p'] = "dp1_2p_";
      $this->sc_conv_var['dp2_2p'] = "dp2_2p_";
      $this->sc_conv_var['dp3_2p'] = "dp3_2p_";
      $this->sc_conv_var['dp4_2p'] = "dp4_2p_";
      $this->sc_conv_var['dp5_2p'] = "dp5_2p_";
      $this->sc_conv_var['pcent_dp2'] = "pcent_dp2_";
      $this->sc_conv_var['aee_p2'] = "aee_p2_";
      $this->sc_conv_var['porcet_aee_p2'] = "porcet_aee_p2_";
      $this->sc_conv_var['inasistencia_p3'] = "inasistencia_p3_";
      $this->sc_conv_var['eval_3_per'] = "eval_3_per_";
      $this->sc_conv_var['dc1_3p'] = "dc1_3p_";
      $this->sc_conv_var['dc2_3p'] = "dc2_3p_";
      $this->sc_conv_var['dc3_3p'] = "dc3_3p_";
      $this->sc_conv_var['dc4_3p'] = "dc4_3p_";
      $this->sc_conv_var['dc5_3p'] = "dc5_3p_";
      $this->sc_conv_var['pcent_dc3'] = "pcent_dc3_";
      $this->sc_conv_var['ds1_p3'] = "ds1_p3_";
      $this->sc_conv_var['ds2_p3'] = "ds2_p3_";
      $this->sc_conv_var['ds3_p3'] = "ds3_p3_";
      $this->sc_conv_var['ds4_p3'] = "ds4_p3_";
      $this->sc_conv_var['ds5_p3'] = "ds5_p3_";
      $this->sc_conv_var['pcent_ds3'] = "pcent_ds3_";
      $this->sc_conv_var['dp1_p3'] = "dp1_p3_";
      $this->sc_conv_var['dp2_p3'] = "dp2_p3_";
      $this->sc_conv_var['dp3_p3'] = "dp3_p3_";
      $this->sc_conv_var['dp4_p3'] = "dp4_p3_";
      $this->sc_conv_var['dp5-p3'] = "sc_field_0_";
      $this->sc_conv_var['pcent_dp3'] = "pcent_dp3_";
      $this->sc_conv_var['aee_p3'] = "aee_p3_";
      $this->sc_conv_var['porcent_aee_p3'] = "porcent_aee_p3_";
      $this->sc_conv_var['inasistencia_p4'] = "inasistencia_p4_";
      $this->sc_conv_var['eval_4_per'] = "eval_4_per_";
      $this->sc_conv_var['dc1_p4'] = "dc1_p4_";
      $this->sc_conv_var['dc2_p4'] = "dc2_p4_";
      $this->sc_conv_var['dc3_p4'] = "dc3_p4_";
      $this->sc_conv_var['dc4_p4'] = "dc4_p4_";
      $this->sc_conv_var['dc5_p4'] = "dc5_p4_";
      $this->sc_conv_var['pcent_dc4'] = "pcent_dc4_";
      $this->sc_conv_var['ds1_p4'] = "ds1_p4_";
      $this->sc_conv_var['ds2_p4'] = "ds2_p4_";
      $this->sc_conv_var['ds3_p4'] = "ds3_p4_";
      $this->sc_conv_var['ds4_p4'] = "ds4_p4_";
      $this->sc_conv_var['ds5_p4'] = "ds5_p4_";
      $this->sc_conv_var['pcent_ds4'] = "pcent_ds4_";
      $this->sc_conv_var['dp1_p4'] = "dp1_p4_";
      $this->sc_conv_var['dp2_p4'] = "dp2_p4_";
      $this->sc_conv_var['dp3_p4'] = "dp3_p4_";
      $this->sc_conv_var['dp4_p4'] = "dp4_p4_";
      $this->sc_conv_var['dp5_p4'] = "dp5_p4_";
      $this->sc_conv_var['aee_p4'] = "aee_p4_";
      $this->sc_conv_var['porcent_aee_p4'] = "porcent_aee_p4_";
      $this->sc_conv_var['pcent_dp4'] = "pcent_dp4_";
      $this->sc_conv_var['eval_final'] = "eval_final_";
      $this->sc_conv_var['entorno'] = "entorno_";
      $this->sc_conv_var['asienta_inasistencias'] = "asienta_inasistencias_";
      $this->sc_conv_var['estudiantes'] = "estudiantes_";
      $this->sc_conv_var['id_novedad'] = "id_novedad_";
      $this->sc_conv_var['nom_grupo'] = "nom_grupo_";
      $this->sc_conv_var['val_acumulada'] = "val_acumulada_";
      $this->sc_conv_var['val_requerida'] = "val_requerida_";
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->par_idgrupo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idgrupo'] = $this->par_idgrupo;
      }
      if (isset($this->par_id_asignatura) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_id_asignatura'] = $this->par_id_asignatura;
      }
      if (isset($this->entorno) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['entorno'] = $this->entorno;
      }
      if (isset($this->nombre_asignatura) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['nombre_asignatura'] = $this->nombre_asignatura;
      }
      if (isset($this->par_cod_desemp) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_cod_desemp'] = $this->par_cod_desemp;
      }
      if (isset($this->par_cod_desemp2) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_cod_desemp2'] = $this->par_cod_desemp2;
      }
      if (isset($this->par_cod_desemp3) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_cod_desemp3'] = $this->par_cod_desemp3;
      }
      if (isset($this->par_cod_desemp4) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_cod_desemp4'] = $this->par_cod_desemp4;
      }
      if (isset($this->par_cod_desemp5) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_cod_desemp5'] = $this->par_cod_desemp5;
      }
      if (isset($this->nota_maxima) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['nota_maxima'] = $this->nota_maxima;
      }
      if (isset($this->porcentaje_gr1) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['porcentaje_gr1'] = $this->porcentaje_gr1;
      }
      if (isset($this->porcentaje_gr2) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['porcentaje_gr2'] = $this->porcentaje_gr2;
      }
      if (isset($this->porcentaje_gr3) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['porcentaje_gr3'] = $this->porcentaje_gr3;
      }
      if (isset($this->porcent_autoevaluacion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['porcent_autoevaluacion'] = $this->porcent_autoevaluacion;
      }
      if (isset($this->par_desmpeno) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_desmpeno'] = $this->par_desmpeno;
      }
      if (isset($this->par_desmpeno2) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_desmpeno2'] = $this->par_desmpeno2;
      }
      if (isset($this->par_desmpeno3) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_desmpeno3'] = $this->par_desmpeno3;
      }
      if (isset($this->par_desmpeno4) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_desmpeno4'] = $this->par_desmpeno4;
      }
      if (isset($this->par_desmpeno5) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_desmpeno5'] = $this->par_desmpeno5;
      }
      if (isset($this->par_asignatura) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_asignatura'] = $this->par_asignatura;
      }
      if (isset($this->par_periodo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_periodo'] = $this->par_periodo;
      }
      if (isset($this->par_idestudiante) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idestudiante'] = $this->par_idestudiante;
      }
      if (isset($this->criterio_dp1) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['criterio_dp1'] = $this->criterio_dp1;
      }
      if (isset($this->criterio_dp2) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['criterio_dp2'] = $this->criterio_dp2;
      }
      if (isset($this->criterio_dp3) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['criterio_dp3'] = $this->criterio_dp3;
      }
      if (isset($this->criterio_dp4) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['criterio_dp4'] = $this->criterio_dp4;
      }
      if (isset($this->criterio_dp5) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['criterio_dp5'] = $this->criterio_dp5;
      }
      if (isset($this->criterio_ds1) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['criterio_ds1'] = $this->criterio_ds1;
      }
      if (isset($this->criterio_ds2) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['criterio_ds2'] = $this->criterio_ds2;
      }
      if (isset($this->criterio_ds3) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['criterio_ds3'] = $this->criterio_ds3;
      }
      if (isset($this->criterio_ds4) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['criterio_ds4'] = $this->criterio_ds4;
      }
      if (isset($this->criterio_ds5) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['criterio_ds5'] = $this->criterio_ds5;
      }
      if (isset($this->etoqieta_autoevaluacion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['etoqieta_autoevaluacion'] = $this->etoqieta_autoevaluacion;
      }
      if (isset($this->asigna) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['asigna'] = $this->asigna;
      }
      if (isset($_POST["par_idgrupo"])) 
      {
          $_SESSION['par_idgrupo'] = $this->par_idgrupo;
      }
      if (isset($_POST["par_id_asignatura"])) 
      {
          $_SESSION['par_id_asignatura'] = $this->par_id_asignatura;
      }
      if (isset($_POST["entorno"])) 
      {
          $_SESSION['entorno'] = $this->entorno;
      }
      if (isset($_POST["nombre_asignatura"])) 
      {
          $_SESSION['nombre_asignatura'] = $this->nombre_asignatura;
      }
      if (isset($_POST["par_cod_desemp"])) 
      {
          $_SESSION['par_cod_desemp'] = $this->par_cod_desemp;
      }
      if (isset($_POST["par_cod_desemp2"])) 
      {
          $_SESSION['par_cod_desemp2'] = $this->par_cod_desemp2;
      }
      if (isset($_POST["par_cod_desemp3"])) 
      {
          $_SESSION['par_cod_desemp3'] = $this->par_cod_desemp3;
      }
      if (isset($_POST["par_cod_desemp4"])) 
      {
          $_SESSION['par_cod_desemp4'] = $this->par_cod_desemp4;
      }
      if (isset($_POST["par_cod_desemp5"])) 
      {
          $_SESSION['par_cod_desemp5'] = $this->par_cod_desemp5;
      }
      if (isset($_POST["nota_maxima"])) 
      {
          $_SESSION['nota_maxima'] = $this->nota_maxima;
      }
      if (isset($_POST["porcentaje_gr1"])) 
      {
          $_SESSION['porcentaje_gr1'] = $this->porcentaje_gr1;
      }
      if (isset($_POST["porcentaje_gr2"])) 
      {
          $_SESSION['porcentaje_gr2'] = $this->porcentaje_gr2;
      }
      if (isset($_POST["porcentaje_gr3"])) 
      {
          $_SESSION['porcentaje_gr3'] = $this->porcentaje_gr3;
      }
      if (isset($_POST["porcent_autoevaluacion"])) 
      {
          $_SESSION['porcent_autoevaluacion'] = $this->porcent_autoevaluacion;
      }
      if (isset($_POST["par_desmpeno"])) 
      {
          $_SESSION['par_desmpeno'] = $this->par_desmpeno;
      }
      if (isset($_POST["par_desmpeno2"])) 
      {
          $_SESSION['par_desmpeno2'] = $this->par_desmpeno2;
      }
      if (isset($_POST["par_desmpeno3"])) 
      {
          $_SESSION['par_desmpeno3'] = $this->par_desmpeno3;
      }
      if (isset($_POST["par_desmpeno4"])) 
      {
          $_SESSION['par_desmpeno4'] = $this->par_desmpeno4;
      }
      if (isset($_POST["par_desmpeno5"])) 
      {
          $_SESSION['par_desmpeno5'] = $this->par_desmpeno5;
      }
      if (isset($_POST["par_asignatura"])) 
      {
          $_SESSION['par_asignatura'] = $this->par_asignatura;
      }
      if (isset($_POST["par_periodo"])) 
      {
          $_SESSION['par_periodo'] = $this->par_periodo;
      }
      if (isset($_POST["par_idestudiante"])) 
      {
          $_SESSION['par_idestudiante'] = $this->par_idestudiante;
      }
      if (isset($_POST["criterio_dp1"])) 
      {
          $_SESSION['criterio_dp1'] = $this->criterio_dp1;
      }
      if (isset($_POST["criterio_dp2"])) 
      {
          $_SESSION['criterio_dp2'] = $this->criterio_dp2;
      }
      if (isset($_POST["criterio_dp3"])) 
      {
          $_SESSION['criterio_dp3'] = $this->criterio_dp3;
      }
      if (isset($_POST["criterio_dp4"])) 
      {
          $_SESSION['criterio_dp4'] = $this->criterio_dp4;
      }
      if (isset($_POST["criterio_dp5"])) 
      {
          $_SESSION['criterio_dp5'] = $this->criterio_dp5;
      }
      if (isset($_POST["criterio_ds1"])) 
      {
          $_SESSION['criterio_ds1'] = $this->criterio_ds1;
      }
      if (isset($_POST["criterio_ds2"])) 
      {
          $_SESSION['criterio_ds2'] = $this->criterio_ds2;
      }
      if (isset($_POST["criterio_ds3"])) 
      {
          $_SESSION['criterio_ds3'] = $this->criterio_ds3;
      }
      if (isset($_POST["criterio_ds4"])) 
      {
          $_SESSION['criterio_ds4'] = $this->criterio_ds4;
      }
      if (isset($_POST["criterio_ds5"])) 
      {
          $_SESSION['criterio_ds5'] = $this->criterio_ds5;
      }
      if (isset($_POST["etoqieta_autoevaluacion"])) 
      {
          $_SESSION['etoqieta_autoevaluacion'] = $this->etoqieta_autoevaluacion;
      }
      if (isset($_POST["asigna"])) 
      {
          $_SESSION['asigna'] = $this->asigna;
      }
      if (isset($_GET["par_idgrupo"])) 
      {
          $_SESSION['par_idgrupo'] = $this->par_idgrupo;
      }
      if (isset($_GET["par_id_asignatura"])) 
      {
          $_SESSION['par_id_asignatura'] = $this->par_id_asignatura;
      }
      if (isset($_GET["entorno"])) 
      {
          $_SESSION['entorno'] = $this->entorno;
      }
      if (isset($_GET["nombre_asignatura"])) 
      {
          $_SESSION['nombre_asignatura'] = $this->nombre_asignatura;
      }
      if (isset($_GET["par_cod_desemp"])) 
      {
          $_SESSION['par_cod_desemp'] = $this->par_cod_desemp;
      }
      if (isset($_GET["par_cod_desemp2"])) 
      {
          $_SESSION['par_cod_desemp2'] = $this->par_cod_desemp2;
      }
      if (isset($_GET["par_cod_desemp3"])) 
      {
          $_SESSION['par_cod_desemp3'] = $this->par_cod_desemp3;
      }
      if (isset($_GET["par_cod_desemp4"])) 
      {
          $_SESSION['par_cod_desemp4'] = $this->par_cod_desemp4;
      }
      if (isset($_GET["par_cod_desemp5"])) 
      {
          $_SESSION['par_cod_desemp5'] = $this->par_cod_desemp5;
      }
      if (isset($_GET["nota_maxima"])) 
      {
          $_SESSION['nota_maxima'] = $this->nota_maxima;
      }
      if (isset($_GET["porcentaje_gr1"])) 
      {
          $_SESSION['porcentaje_gr1'] = $this->porcentaje_gr1;
      }
      if (isset($_GET["porcentaje_gr2"])) 
      {
          $_SESSION['porcentaje_gr2'] = $this->porcentaje_gr2;
      }
      if (isset($_GET["porcentaje_gr3"])) 
      {
          $_SESSION['porcentaje_gr3'] = $this->porcentaje_gr3;
      }
      if (isset($_GET["porcent_autoevaluacion"])) 
      {
          $_SESSION['porcent_autoevaluacion'] = $this->porcent_autoevaluacion;
      }
      if (isset($_GET["par_desmpeno"])) 
      {
          $_SESSION['par_desmpeno'] = $this->par_desmpeno;
      }
      if (isset($_GET["par_desmpeno2"])) 
      {
          $_SESSION['par_desmpeno2'] = $this->par_desmpeno2;
      }
      if (isset($_GET["par_desmpeno3"])) 
      {
          $_SESSION['par_desmpeno3'] = $this->par_desmpeno3;
      }
      if (isset($_GET["par_desmpeno4"])) 
      {
          $_SESSION['par_desmpeno4'] = $this->par_desmpeno4;
      }
      if (isset($_GET["par_desmpeno5"])) 
      {
          $_SESSION['par_desmpeno5'] = $this->par_desmpeno5;
      }
      if (isset($_GET["par_asignatura"])) 
      {
          $_SESSION['par_asignatura'] = $this->par_asignatura;
      }
      if (isset($_GET["par_periodo"])) 
      {
          $_SESSION['par_periodo'] = $this->par_periodo;
      }
      if (isset($_GET["par_idestudiante"])) 
      {
          $_SESSION['par_idestudiante'] = $this->par_idestudiante;
      }
      if (isset($_GET["criterio_dp1"])) 
      {
          $_SESSION['criterio_dp1'] = $this->criterio_dp1;
      }
      if (isset($_GET["criterio_dp2"])) 
      {
          $_SESSION['criterio_dp2'] = $this->criterio_dp2;
      }
      if (isset($_GET["criterio_dp3"])) 
      {
          $_SESSION['criterio_dp3'] = $this->criterio_dp3;
      }
      if (isset($_GET["criterio_dp4"])) 
      {
          $_SESSION['criterio_dp4'] = $this->criterio_dp4;
      }
      if (isset($_GET["criterio_dp5"])) 
      {
          $_SESSION['criterio_dp5'] = $this->criterio_dp5;
      }
      if (isset($_GET["criterio_ds1"])) 
      {
          $_SESSION['criterio_ds1'] = $this->criterio_ds1;
      }
      if (isset($_GET["criterio_ds2"])) 
      {
          $_SESSION['criterio_ds2'] = $this->criterio_ds2;
      }
      if (isset($_GET["criterio_ds3"])) 
      {
          $_SESSION['criterio_ds3'] = $this->criterio_ds3;
      }
      if (isset($_GET["criterio_ds4"])) 
      {
          $_SESSION['criterio_ds4'] = $this->criterio_ds4;
      }
      if (isset($_GET["criterio_ds5"])) 
      {
          $_SESSION['criterio_ds5'] = $this->criterio_ds5;
      }
      if (isset($_GET["etoqieta_autoevaluacion"])) 
      {
          $_SESSION['etoqieta_autoevaluacion'] = $this->etoqieta_autoevaluacion;
      }
      if (isset($_GET["asigna"])) 
      {
          $_SESSION['asigna'] = $this->asigna;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_t_evaluacion_p1_m3($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 if ($cadapar[0] == "id_estudiante_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "id_estudiante = " . $this->id_estudiante_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
                 if ($cadapar[0] == "id_grupo_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "id_grupo = " . $this->id_grupo_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
                 if ($cadapar[0] == "id_asignatura_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "id_asignatura = " . $this->id_asignatura_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if (isset($this->par_idgrupo)) 
          {
              $_SESSION['par_idgrupo'] = $this->par_idgrupo;
          }
          if (isset($this->par_id_asignatura)) 
          {
              $_SESSION['par_id_asignatura'] = $this->par_id_asignatura;
          }
          if (isset($this->entorno)) 
          {
              $_SESSION['entorno'] = $this->entorno;
          }
          if (isset($this->nombre_asignatura)) 
          {
              $_SESSION['nombre_asignatura'] = $this->nombre_asignatura;
          }
          if (isset($this->par_cod_desemp)) 
          {
              $_SESSION['par_cod_desemp'] = $this->par_cod_desemp;
          }
          if (isset($this->par_cod_desemp2)) 
          {
              $_SESSION['par_cod_desemp2'] = $this->par_cod_desemp2;
          }
          if (isset($this->par_cod_desemp3)) 
          {
              $_SESSION['par_cod_desemp3'] = $this->par_cod_desemp3;
          }
          if (isset($this->par_cod_desemp4)) 
          {
              $_SESSION['par_cod_desemp4'] = $this->par_cod_desemp4;
          }
          if (isset($this->par_cod_desemp5)) 
          {
              $_SESSION['par_cod_desemp5'] = $this->par_cod_desemp5;
          }
          if (isset($this->nota_maxima)) 
          {
              $_SESSION['nota_maxima'] = $this->nota_maxima;
          }
          if (isset($this->porcentaje_gr1)) 
          {
              $_SESSION['porcentaje_gr1'] = $this->porcentaje_gr1;
          }
          if (isset($this->porcentaje_gr2)) 
          {
              $_SESSION['porcentaje_gr2'] = $this->porcentaje_gr2;
          }
          if (isset($this->porcentaje_gr3)) 
          {
              $_SESSION['porcentaje_gr3'] = $this->porcentaje_gr3;
          }
          if (isset($this->porcent_autoevaluacion)) 
          {
              $_SESSION['porcent_autoevaluacion'] = $this->porcent_autoevaluacion;
          }
          if (isset($this->par_desmpeno)) 
          {
              $_SESSION['par_desmpeno'] = $this->par_desmpeno;
          }
          if (isset($this->par_desmpeno2)) 
          {
              $_SESSION['par_desmpeno2'] = $this->par_desmpeno2;
          }
          if (isset($this->par_desmpeno3)) 
          {
              $_SESSION['par_desmpeno3'] = $this->par_desmpeno3;
          }
          if (isset($this->par_desmpeno4)) 
          {
              $_SESSION['par_desmpeno4'] = $this->par_desmpeno4;
          }
          if (isset($this->par_desmpeno5)) 
          {
              $_SESSION['par_desmpeno5'] = $this->par_desmpeno5;
          }
          if (isset($this->par_asignatura)) 
          {
              $_SESSION['par_asignatura'] = $this->par_asignatura;
          }
          if (isset($this->par_periodo)) 
          {
              $_SESSION['par_periodo'] = $this->par_periodo;
          }
          if (isset($this->par_idestudiante)) 
          {
              $_SESSION['par_idestudiante'] = $this->par_idestudiante;
          }
          if (isset($this->criterio_dp1)) 
          {
              $_SESSION['criterio_dp1'] = $this->criterio_dp1;
          }
          if (isset($this->criterio_dp2)) 
          {
              $_SESSION['criterio_dp2'] = $this->criterio_dp2;
          }
          if (isset($this->criterio_dp3)) 
          {
              $_SESSION['criterio_dp3'] = $this->criterio_dp3;
          }
          if (isset($this->criterio_dp4)) 
          {
              $_SESSION['criterio_dp4'] = $this->criterio_dp4;
          }
          if (isset($this->criterio_dp5)) 
          {
              $_SESSION['criterio_dp5'] = $this->criterio_dp5;
          }
          if (isset($this->criterio_ds1)) 
          {
              $_SESSION['criterio_ds1'] = $this->criterio_ds1;
          }
          if (isset($this->criterio_ds2)) 
          {
              $_SESSION['criterio_ds2'] = $this->criterio_ds2;
          }
          if (isset($this->criterio_ds3)) 
          {
              $_SESSION['criterio_ds3'] = $this->criterio_ds3;
          }
          if (isset($this->criterio_ds4)) 
          {
              $_SESSION['criterio_ds4'] = $this->criterio_ds4;
          }
          if (isset($this->criterio_ds5)) 
          {
              $_SESSION['criterio_ds5'] = $this->criterio_ds5;
          }
          if (isset($this->etoqieta_autoevaluacion)) 
          {
              $_SESSION['etoqieta_autoevaluacion'] = $this->etoqieta_autoevaluacion;
          }
          if (isset($this->asigna)) 
          {
              $_SESSION['asigna'] = $this->asigna;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->par_idgrupo)) 
          {
              $_SESSION['par_idgrupo'] = $this->par_idgrupo;
          }
          if (isset($this->par_id_asignatura)) 
          {
              $_SESSION['par_id_asignatura'] = $this->par_id_asignatura;
          }
          if (isset($this->entorno)) 
          {
              $_SESSION['entorno'] = $this->entorno;
          }
          if (isset($this->nombre_asignatura)) 
          {
              $_SESSION['nombre_asignatura'] = $this->nombre_asignatura;
          }
          if (isset($this->par_cod_desemp)) 
          {
              $_SESSION['par_cod_desemp'] = $this->par_cod_desemp;
          }
          if (isset($this->par_cod_desemp2)) 
          {
              $_SESSION['par_cod_desemp2'] = $this->par_cod_desemp2;
          }
          if (isset($this->par_cod_desemp3)) 
          {
              $_SESSION['par_cod_desemp3'] = $this->par_cod_desemp3;
          }
          if (isset($this->par_cod_desemp4)) 
          {
              $_SESSION['par_cod_desemp4'] = $this->par_cod_desemp4;
          }
          if (isset($this->par_cod_desemp5)) 
          {
              $_SESSION['par_cod_desemp5'] = $this->par_cod_desemp5;
          }
          if (isset($this->nota_maxima)) 
          {
              $_SESSION['nota_maxima'] = $this->nota_maxima;
          }
          if (isset($this->porcentaje_gr1)) 
          {
              $_SESSION['porcentaje_gr1'] = $this->porcentaje_gr1;
          }
          if (isset($this->porcentaje_gr2)) 
          {
              $_SESSION['porcentaje_gr2'] = $this->porcentaje_gr2;
          }
          if (isset($this->porcentaje_gr3)) 
          {
              $_SESSION['porcentaje_gr3'] = $this->porcentaje_gr3;
          }
          if (isset($this->porcent_autoevaluacion)) 
          {
              $_SESSION['porcent_autoevaluacion'] = $this->porcent_autoevaluacion;
          }
          if (isset($this->par_desmpeno)) 
          {
              $_SESSION['par_desmpeno'] = $this->par_desmpeno;
          }
          if (isset($this->par_desmpeno2)) 
          {
              $_SESSION['par_desmpeno2'] = $this->par_desmpeno2;
          }
          if (isset($this->par_desmpeno3)) 
          {
              $_SESSION['par_desmpeno3'] = $this->par_desmpeno3;
          }
          if (isset($this->par_desmpeno4)) 
          {
              $_SESSION['par_desmpeno4'] = $this->par_desmpeno4;
          }
          if (isset($this->par_desmpeno5)) 
          {
              $_SESSION['par_desmpeno5'] = $this->par_desmpeno5;
          }
          if (isset($this->par_asignatura)) 
          {
              $_SESSION['par_asignatura'] = $this->par_asignatura;
          }
          if (isset($this->par_periodo)) 
          {
              $_SESSION['par_periodo'] = $this->par_periodo;
          }
          if (isset($this->par_idestudiante)) 
          {
              $_SESSION['par_idestudiante'] = $this->par_idestudiante;
          }
          if (isset($this->criterio_dp1)) 
          {
              $_SESSION['criterio_dp1'] = $this->criterio_dp1;
          }
          if (isset($this->criterio_dp2)) 
          {
              $_SESSION['criterio_dp2'] = $this->criterio_dp2;
          }
          if (isset($this->criterio_dp3)) 
          {
              $_SESSION['criterio_dp3'] = $this->criterio_dp3;
          }
          if (isset($this->criterio_dp4)) 
          {
              $_SESSION['criterio_dp4'] = $this->criterio_dp4;
          }
          if (isset($this->criterio_dp5)) 
          {
              $_SESSION['criterio_dp5'] = $this->criterio_dp5;
          }
          if (isset($this->criterio_ds1)) 
          {
              $_SESSION['criterio_ds1'] = $this->criterio_ds1;
          }
          if (isset($this->criterio_ds2)) 
          {
              $_SESSION['criterio_ds2'] = $this->criterio_ds2;
          }
          if (isset($this->criterio_ds3)) 
          {
              $_SESSION['criterio_ds3'] = $this->criterio_ds3;
          }
          if (isset($this->criterio_ds4)) 
          {
              $_SESSION['criterio_ds4'] = $this->criterio_ds4;
          }
          if (isset($this->criterio_ds5)) 
          {
              $_SESSION['criterio_ds5'] = $this->criterio_ds5;
          }
          if (isset($this->etoqieta_autoevaluacion)) 
          {
              $_SESSION['etoqieta_autoevaluacion'] = $this->etoqieta_autoevaluacion;
          }
          if (isset($this->asigna)) 
          {
              $_SESSION['asigna'] = $this->asigna;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_t_evaluacion_p1_m3_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['initialize'])
          {
              $_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_cod_desemp5)) {$this->sc_temp_par_cod_desemp5 = (isset($_SESSION['par_cod_desemp5'])) ? $_SESSION['par_cod_desemp5'] : "";}
if (!isset($this->sc_temp_par_desmpeno5)) {$this->sc_temp_par_desmpeno5 = (isset($_SESSION['par_desmpeno5'])) ? $_SESSION['par_desmpeno5'] : "";}
if (!isset($this->sc_temp_par_cod_desemp4)) {$this->sc_temp_par_cod_desemp4 = (isset($_SESSION['par_cod_desemp4'])) ? $_SESSION['par_cod_desemp4'] : "";}
if (!isset($this->sc_temp_par_desmpeno4)) {$this->sc_temp_par_desmpeno4 = (isset($_SESSION['par_desmpeno4'])) ? $_SESSION['par_desmpeno4'] : "";}
if (!isset($this->sc_temp_par_cod_desemp3)) {$this->sc_temp_par_cod_desemp3 = (isset($_SESSION['par_cod_desemp3'])) ? $_SESSION['par_cod_desemp3'] : "";}
if (!isset($this->sc_temp_par_desmpeno3)) {$this->sc_temp_par_desmpeno3 = (isset($_SESSION['par_desmpeno3'])) ? $_SESSION['par_desmpeno3'] : "";}
if (!isset($this->sc_temp_par_cod_desemp2)) {$this->sc_temp_par_cod_desemp2 = (isset($_SESSION['par_cod_desemp2'])) ? $_SESSION['par_cod_desemp2'] : "";}
if (!isset($this->sc_temp_par_desmpeno2)) {$this->sc_temp_par_desmpeno2 = (isset($_SESSION['par_desmpeno2'])) ? $_SESSION['par_desmpeno2'] : "";}
if (!isset($this->sc_temp_par_cod_desemp)) {$this->sc_temp_par_cod_desemp = (isset($_SESSION['par_cod_desemp'])) ? $_SESSION['par_cod_desemp'] : "";}
if (!isset($this->sc_temp_par_desmpeno)) {$this->sc_temp_par_desmpeno = (isset($_SESSION['par_desmpeno'])) ? $_SESSION['par_desmpeno'] : "";}
if (!isset($this->sc_temp_par_id_asignatura)) {$this->sc_temp_par_id_asignatura = (isset($_SESSION['par_id_asignatura'])) ? $_SESSION['par_id_asignatura'] : "";}
if (!isset($this->sc_temp_par_idgrupo)) {$this->sc_temp_par_idgrupo = (isset($_SESSION['par_idgrupo'])) ? $_SESSION['par_idgrupo'] : "";}
if (!isset($this->sc_temp_nota_maxima)) {$this->sc_temp_nota_maxima = (isset($_SESSION['nota_maxima'])) ? $_SESSION['nota_maxima'] : "";}
                                       $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['update'] = 'on';
$_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['delete'] = 'off';
$this->parametrosGenerales();



$check_sql = "SELECT maximo"
   . " FROM valoracion"
   . " WHERE valoracion = 'Superior'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->sc_temp_nota_maxima = $this->rs[0][0];
    
}
		else     
{
	    $this->sc_temp_nota_maxima = '';   
}
$update_sql = 'UPDATE t_evaluacion  SET novedad = 
(SELECT
novedades.abrev
FROM
novedades_x_estudiante_fecha
INNER JOIN novedades ON novedades_x_estudiante_fecha.id_novedad = novedades.id_novedad
WHERE novedades_x_estudiante_fecha.idstudents = t_evaluacion.id_estudiante ORDER BY novedades_x_estudiante_fecha.id_naf, id_naf LIMIT 1) 
';
   

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_t_evaluacion_p1_m3_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;


$check_sql = "SELECT desempeno.superior, desempeno.codigo
   FROM rel_desemp_posicion INNER JOIN desempeno ON desempeno.codigo = rel_desemp_posicion.cod_desemp
    WHERE rel_desemp_posicion.posicion = 'dc1' AND rel_desemp_posicion.id_grupo ='".$this->sc_temp_par_idgrupo."' AND rel_desemp_posicion.id_asign ='".$this->sc_temp_par_id_asignatura."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->sc_temp_par_desmpeno = strip_tags($this->rs[0][0]);
	 $this->sc_temp_par_cod_desemp = $this->rs[0][1];
   
}
		else     
{
		    $this->sc_temp_par_desmpeno = '';
            $this->sc_temp_par_cod_desemp = 'dc1';
}



$check_sql = "SELECT desempeno.superior, desempeno.codigo
   FROM rel_desemp_posicion INNER JOIN desempeno ON desempeno.codigo = rel_desemp_posicion.cod_desemp
    WHERE rel_desemp_posicion.posicion = 'dc2' AND rel_desemp_posicion.id_grupo ='".$this->sc_temp_par_idgrupo."' AND rel_desemp_posicion.id_asign ='".$this->sc_temp_par_id_asignatura."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->sc_temp_par_desmpeno2 = strip_tags($this->rs[0][0]);
	 $this->sc_temp_par_cod_desemp2 = $this->rs[0][1];
   
}
		else     
{
		    $this->sc_temp_par_desmpeno2 = '';
            $this->sc_temp_par_cod_desemp2 = 'dc2';
}


$check_sql = "SELECT desempeno.superior, desempeno.codigo
   FROM rel_desemp_posicion INNER JOIN desempeno ON desempeno.codigo = rel_desemp_posicion.cod_desemp
    WHERE rel_desemp_posicion.posicion = 'dc3' AND rel_desemp_posicion.id_grupo ='".$this->sc_temp_par_idgrupo."' AND rel_desemp_posicion.id_asign ='".$this->sc_temp_par_id_asignatura."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->sc_temp_par_desmpeno3 = strip_tags($this->rs[0][0]);
	 $this->sc_temp_par_cod_desemp3 = $this->rs[0][1];
   
}
		else     
{
		    $this->sc_temp_par_desmpeno3 = '';
            $this->sc_temp_par_cod_desemp3 = 'dc3';
}

$check_sql = "SELECT desempeno.superior, desempeno.codigo
   FROM rel_desemp_posicion INNER JOIN desempeno ON desempeno.codigo = rel_desemp_posicion.cod_desemp
    WHERE rel_desemp_posicion.posicion = 'dc4' AND rel_desemp_posicion.id_grupo ='".$this->sc_temp_par_idgrupo."' AND rel_desemp_posicion.id_asign ='".$this->sc_temp_par_id_asignatura."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->sc_temp_par_desmpeno4 = strip_tags($this->rs[0][0]);
	 $this->sc_temp_par_cod_desemp4 = $this->rs[0][1];
   
}
		else     
{
		    $this->sc_temp_par_desmpeno4 = '';
            $this->sc_temp_par_cod_desemp4 = 'dc4';
}

$check_sql = "SELECT desempeno.superior, desempeno.codigo
   FROM rel_desemp_posicion INNER JOIN desempeno ON desempeno.codigo = rel_desemp_posicion.cod_desemp
    WHERE rel_desemp_posicion.posicion = 'dc5' AND rel_desemp_posicion.id_grupo ='".$this->sc_temp_par_idgrupo."' AND rel_desemp_posicion.id_asign ='".$this->sc_temp_par_id_asignatura."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->sc_temp_par_desmpeno5 = strip_tags($this->rs[0][0]);
	 $this->sc_temp_par_cod_desemp5 = $this->rs[0][1];
   
}
		else     
{
		    $this->sc_temp_par_desmpeno5 = '';
            $this->sc_temp_par_cod_desemp5 = 'dc5';
}
if (isset($this->sc_temp_nota_maxima)) { $_SESSION['nota_maxima'] = $this->sc_temp_nota_maxima;}
if (isset($this->sc_temp_par_idgrupo)) { $_SESSION['par_idgrupo'] = $this->sc_temp_par_idgrupo;}
if (isset($this->sc_temp_par_id_asignatura)) { $_SESSION['par_id_asignatura'] = $this->sc_temp_par_id_asignatura;}
if (isset($this->sc_temp_par_desmpeno)) { $_SESSION['par_desmpeno'] = $this->sc_temp_par_desmpeno;}
if (isset($this->sc_temp_par_cod_desemp)) { $_SESSION['par_cod_desemp'] = $this->sc_temp_par_cod_desemp;}
if (isset($this->sc_temp_par_desmpeno2)) { $_SESSION['par_desmpeno2'] = $this->sc_temp_par_desmpeno2;}
if (isset($this->sc_temp_par_cod_desemp2)) { $_SESSION['par_cod_desemp2'] = $this->sc_temp_par_cod_desemp2;}
if (isset($this->sc_temp_par_desmpeno3)) { $_SESSION['par_desmpeno3'] = $this->sc_temp_par_desmpeno3;}
if (isset($this->sc_temp_par_cod_desemp3)) { $_SESSION['par_cod_desemp3'] = $this->sc_temp_par_cod_desemp3;}
if (isset($this->sc_temp_par_desmpeno4)) { $_SESSION['par_desmpeno4'] = $this->sc_temp_par_desmpeno4;}
if (isset($this->sc_temp_par_cod_desemp4)) { $_SESSION['par_cod_desemp4'] = $this->sc_temp_par_cod_desemp4;}
if (isset($this->sc_temp_par_desmpeno5)) { $_SESSION['par_desmpeno5'] = $this->sc_temp_par_desmpeno5;}
if (isset($this->sc_temp_par_cod_desemp5)) { $_SESSION['par_cod_desemp5'] = $this->sc_temp_par_cod_desemp5;}
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m3']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_t_evaluacion_p1_m3']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_t_evaluacion_p1_m3'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_t_evaluacion_p1_m3']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_t_evaluacion_p1_m3']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_t_evaluacion_p1_m3') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_t_evaluacion_p1_m3']['label'] = "ASIGNATURA: " . $_SESSION['asigna'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_t_evaluacion_p1_m3")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "evaluacion";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_popup']                 = $this->Ini->str_schema_all . "_grid.css";
      $_SESSION['scriptcase']['css_popup_dir']             = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $_SESSION['scriptcase']['css_btn_popup']             = $this->Ini->Str_btn_form . "/" . $this->Ini->Str_btn_form . ".css";
      $_SESSION['sc_session']['path_third']                = $this->Ini->path_prod . "/third";
      $_SESSION['scriptcase']['bg_btn_popup']['bok']       = nmButtonOutput($this->arr_buttons, "bok", "processa()", "processa()", "bok", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");
      $_SESSION['scriptcase']['bg_btn_popup']['btbremove'] = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove()", "self.parent.tb_remove()", "bsair", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");
      $_SESSION['scriptcase']['sc_tp_pdf']                 = "wkhtmltopdf";
      $_SESSION['scriptcase']['sc_idioma_pdf'] = array();
      $_SESSION['scriptcase']['sc_idioma_pdf']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_pdff_titl'], 'tp_imp' => $this->Ini->Nm_lang['lang_pdff_type'], 'color' => $this->Ini->Nm_lang['lang_pdff_colr'], 'econm' => $this->Ini->Nm_lang['lang_pdff_bndw'], 'tp_pap' => $this->Ini->Nm_lang['lang_pdff_pper'], 'carta' => $this->Ini->Nm_lang['lang_pdff_letr'], 'oficio' => $this->Ini->Nm_lang['lang_pdff_legl'], 'customiz' => $this->Ini->Nm_lang['lang_pdff_cstm'], 'alt_papel' => $this->Ini->Nm_lang['lang_pdff_pper_hgth'], 'larg_papel' => $this->Ini->Nm_lang['lang_pdff_pper_wdth'], 'orient' => $this->Ini->Nm_lang['lang_pdff_pper_orie'], 'retrato' => $this->Ini->Nm_lang['lang_pdff_prtr'], 'paisag' => $this->Ini->Nm_lang['lang_pdff_lnds'], 'book' => $this->Ini->Nm_lang['lang_pdff_bkmk'], 'grafico' => $this->Ini->Nm_lang['lang_pdff_chrt'], 'largura' => $this->Ini->Nm_lang['lang_pdff_wdth'], 'fonte' => $this->Ini->Nm_lang['lang_pdff_font'], 'sim' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'nao' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'cancela' => $this->Ini->Nm_lang['lang_pdff_cncl']);
      $_SESSION['scriptcase']['sc_idioma_prt'] = array();
      $_SESSION['scriptcase']['sc_idioma_prt']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'modoimp' => $this->Ini->Nm_lang['lang_btns_mode_prnt_hint'], 'curr' => $this->Ini->Nm_lang['lang_othr_curr_page'], 'total' => $this->Ini->Nm_lang['lang_othr_full'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_view'] = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['prt_view'] = false;
      if ($this->nmgp_opcao == "pdf" || $this->nmgp_opcao == "print")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_view'] = true;
          if ($this->nmgp_opcao == "print")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['prt_view'] = true;
          } 
          $this->nmgp_opcao = "igual";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opcao'] = "igual";
      } 
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['dc1_'] = '' . $_SESSION['par_cod_desemp'] . '';
      $this->nm_new_label['dc2_'] = '' . $_SESSION['par_cod_desemp2'] . '';
      $this->nm_new_label['dc3_'] = '' . $_SESSION['par_cod_desemp3'] . '';
      $this->nm_new_label['dc4_'] = '' . $_SESSION['par_cod_desemp4'] . '';
      $this->nm_new_label['dc5_'] = '' . $_SESSION['par_cod_desemp5'] . '';

      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status      = "scFormInputErrorMult";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['sc_btn_0']['hint']             = "";
      $this->arr_buttons['sc_btn_0']['type']             = "button";
      $this->arr_buttons['sc_btn_0']['value']            = "Configurar Desempeño";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_t_evaluacion_p1_m3']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_t_evaluacion_p1_m3'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['pdf'] = "on";
      $this->nmgp_botoes['print'] = "on";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "on";
      }
      else
      {
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      }
      $this->nmgp_botoes['sc_btn_0'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_orig'] = " where id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura= " . $_SESSION['par_id_asignatura'] . " AND entorno = " . $_SESSION['entorno'] . "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_pesq'] = " where id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura= " . $_SESSION['par_id_asignatura'] . " AND entorno = " . $_SESSION['entorno'] . "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_t_evaluacion_p1_m3']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_t_evaluacion_p1_m3", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'form_t_evaluacion_p1_m3_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_t_evaluacion_p1_m3_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_t_evaluacion_p1_m3/form_t_evaluacion_p1_m3_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_t_evaluacion_p1_m3_erro.class.php"); 
      }
      $this->Erro      = new form_t_evaluacion_p1_m3_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opcao']))
         { 
             if ($this->id_estudiante_ != "" || $this->id_grupo_ != "" || $this->id_asignatura_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['sc_btn_0'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['botoes']['sc_btn_0'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- inasistencia_p1_
      $this->field_config['inasistencia_p1_']               = array();
      $this->field_config['inasistencia_p1_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['inasistencia_p1_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['inasistencia_p1_']['symbol_dec'] = '';
      $this->field_config['inasistencia_p1_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['inasistencia_p1_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- eval_1_per_
      $this->field_config['eval_1_per_']               = array();
      $this->field_config['eval_1_per_']['symbol_grp'] = '';
      $this->field_config['eval_1_per_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eval_1_per_']['symbol_dec'] = ',';
      $this->field_config['eval_1_per_']['symbol_neg'] = '-';
      $this->field_config['eval_1_per_']['format_neg'] = '2';
      //-- dc1_
      $this->field_config['dc1_']               = array();
      $this->field_config['dc1_']['symbol_grp'] = '';
      $this->field_config['dc1_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc1_']['symbol_dec'] = ',';
      $this->field_config['dc1_']['symbol_neg'] = '-';
      $this->field_config['dc1_']['format_neg'] = '2';
      //-- dc2_
      $this->field_config['dc2_']               = array();
      $this->field_config['dc2_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc2_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['dc2_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc2_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc3_
      $this->field_config['dc3_']               = array();
      $this->field_config['dc3_']['symbol_grp'] = '';
      $this->field_config['dc3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc3_']['symbol_dec'] = ',';
      $this->field_config['dc3_']['symbol_neg'] = '-';
      $this->field_config['dc3_']['format_neg'] = '2';
      //-- dc4_
      $this->field_config['dc4_']               = array();
      $this->field_config['dc4_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc4_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['dc4_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc4_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc5_
      $this->field_config['dc5_']               = array();
      $this->field_config['dc5_']['symbol_grp'] = '';
      $this->field_config['dc5_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc5_']['symbol_dec'] = ',';
      $this->field_config['dc5_']['symbol_neg'] = '-';
      $this->field_config['dc5_']['format_neg'] = '2';
      //-- pcent_dc_
      $this->field_config['pcent_dc_']               = array();
      $this->field_config['pcent_dc_']['symbol_grp'] = '';
      $this->field_config['pcent_dc_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dc_']['symbol_dec'] = ',';
      $this->field_config['pcent_dc_']['symbol_neg'] = '-';
      $this->field_config['pcent_dc_']['format_neg'] = '2';
      //-- dp1_
      $this->field_config['dp1_']               = array();
      $this->field_config['dp1_']['symbol_grp'] = '';
      $this->field_config['dp1_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp1_']['symbol_dec'] = ',';
      $this->field_config['dp1_']['symbol_neg'] = '-';
      $this->field_config['dp1_']['format_neg'] = '2';
      //-- dp2_
      $this->field_config['dp2_']               = array();
      $this->field_config['dp2_']['symbol_grp'] = '';
      $this->field_config['dp2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp2_']['symbol_dec'] = ',';
      $this->field_config['dp2_']['symbol_neg'] = '-';
      $this->field_config['dp2_']['format_neg'] = '2';
      //-- dp3_
      $this->field_config['dp3_']               = array();
      $this->field_config['dp3_']['symbol_grp'] = '';
      $this->field_config['dp3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp3_']['symbol_dec'] = ',';
      $this->field_config['dp3_']['symbol_neg'] = '-';
      $this->field_config['dp3_']['format_neg'] = '2';
      //-- pcent_dp_
      $this->field_config['pcent_dp_']               = array();
      $this->field_config['pcent_dp_']['symbol_grp'] = '';
      $this->field_config['pcent_dp_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dp_']['symbol_dec'] = ',';
      $this->field_config['pcent_dp_']['symbol_neg'] = '-';
      $this->field_config['pcent_dp_']['format_neg'] = '2';
      //-- ds1_
      $this->field_config['ds1_']               = array();
      $this->field_config['ds1_']['symbol_grp'] = '';
      $this->field_config['ds1_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds1_']['symbol_dec'] = ',';
      $this->field_config['ds1_']['symbol_neg'] = '-';
      $this->field_config['ds1_']['format_neg'] = '2';
      //-- ds2_
      $this->field_config['ds2_']               = array();
      $this->field_config['ds2_']['symbol_grp'] = '';
      $this->field_config['ds2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds2_']['symbol_dec'] = ',';
      $this->field_config['ds2_']['symbol_neg'] = '-';
      $this->field_config['ds2_']['format_neg'] = '2';
      //-- ds3_
      $this->field_config['ds3_']               = array();
      $this->field_config['ds3_']['symbol_grp'] = '';
      $this->field_config['ds3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds3_']['symbol_dec'] = ',';
      $this->field_config['ds3_']['symbol_neg'] = '-';
      $this->field_config['ds3_']['format_neg'] = '2';
      //-- pcent_ds_
      $this->field_config['pcent_ds_']               = array();
      $this->field_config['pcent_ds_']['symbol_grp'] = '';
      $this->field_config['pcent_ds_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_ds_']['symbol_dec'] = ',';
      $this->field_config['pcent_ds_']['symbol_neg'] = '-';
      $this->field_config['pcent_ds_']['format_neg'] = '2';
      //-- aeep1_
      $this->field_config['aeep1_']               = array();
      $this->field_config['aeep1_']['symbol_grp'] = '';
      $this->field_config['aeep1_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['aeep1_']['symbol_dec'] = ',';
      $this->field_config['aeep1_']['symbol_neg'] = '-';
      $this->field_config['aeep1_']['format_neg'] = '2';
      //-- porcent_aeep1_
      $this->field_config['porcent_aeep1_']               = array();
      $this->field_config['porcent_aeep1_']['symbol_grp'] = '';
      $this->field_config['porcent_aeep1_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['porcent_aeep1_']['symbol_dec'] = ',';
      $this->field_config['porcent_aeep1_']['symbol_neg'] = '-';
      $this->field_config['porcent_aeep1_']['format_neg'] = '2';
      //-- val_acumulada_
      $this->field_config['val_acumulada_']               = array();
      $this->field_config['val_acumulada_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['val_acumulada_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['val_acumulada_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['val_acumulada_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['val_acumulada_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- val_requerida_
      $this->field_config['val_requerida_']               = array();
      $this->field_config['val_requerida_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['val_requerida_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['val_requerida_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['val_requerida_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['val_requerida_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_grupo_
      $this->field_config['id_grupo_']               = array();
      $this->field_config['id_grupo_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_grupo_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_grupo_']['symbol_dec'] = '';
      $this->field_config['id_grupo_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_grupo_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_area_
      $this->field_config['id_area_']               = array();
      $this->field_config['id_area_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_area_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_area_']['symbol_dec'] = '';
      $this->field_config['id_area_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_area_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_asignatura_
      $this->field_config['id_asignatura_']               = array();
      $this->field_config['id_asignatura_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_asignatura_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_asignatura_']['symbol_dec'] = '';
      $this->field_config['id_asignatura_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_asignatura_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_grado_
      $this->field_config['id_grado_']               = array();
      $this->field_config['id_grado_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_grado_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_grado_']['symbol_dec'] = '';
      $this->field_config['id_grado_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_grado_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_nivel_
      $this->field_config['id_nivel_']               = array();
      $this->field_config['id_nivel_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_nivel_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_nivel_']['symbol_dec'] = '';
      $this->field_config['id_nivel_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_nivel_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ihs_
      $this->field_config['ihs_']               = array();
      $this->field_config['ihs_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ihs_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ihs_']['symbol_dec'] = '';
      $this->field_config['ihs_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ihs_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pfa_
      $this->field_config['pfa_']               = array();
      $this->field_config['pfa_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pfa_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pfa_']['symbol_dec'] = '';
      $this->field_config['pfa_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pfa_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc6_
      $this->field_config['dc6_']               = array();
      $this->field_config['dc6_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc6_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc6_']['symbol_dec'] = '';
      $this->field_config['dc6_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc6_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc7_
      $this->field_config['dc7_']               = array();
      $this->field_config['dc7_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc7_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc7_']['symbol_dec'] = '';
      $this->field_config['dc7_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc7_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc8_
      $this->field_config['dc8_']               = array();
      $this->field_config['dc8_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc8_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc8_']['symbol_dec'] = '';
      $this->field_config['dc8_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc8_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc9_
      $this->field_config['dc9_']               = array();
      $this->field_config['dc9_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc9_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc9_']['symbol_dec'] = '';
      $this->field_config['dc9_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc9_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds4_
      $this->field_config['ds4_']               = array();
      $this->field_config['ds4_']['symbol_grp'] = '';
      $this->field_config['ds4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds4_']['symbol_dec'] = ',';
      $this->field_config['ds4_']['symbol_neg'] = '-';
      $this->field_config['ds4_']['format_neg'] = '2';
      //-- ds5_
      $this->field_config['ds5_']               = array();
      $this->field_config['ds5_']['symbol_grp'] = '';
      $this->field_config['ds5_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds5_']['symbol_dec'] = ',';
      $this->field_config['ds5_']['symbol_neg'] = '-';
      $this->field_config['ds5_']['format_neg'] = '2';
      //-- dp4_
      $this->field_config['dp4_']               = array();
      $this->field_config['dp4_']['symbol_grp'] = '';
      $this->field_config['dp4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp4_']['symbol_dec'] = ',';
      $this->field_config['dp4_']['symbol_neg'] = '-';
      $this->field_config['dp4_']['format_neg'] = '2';
      //-- dp5_
      $this->field_config['dp5_']               = array();
      $this->field_config['dp5_']['symbol_grp'] = '';
      $this->field_config['dp5_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp5_']['symbol_dec'] = ',';
      $this->field_config['dp5_']['symbol_neg'] = '-';
      $this->field_config['dp5_']['format_neg'] = '2';
      //-- inasistencia_p2_
      $this->field_config['inasistencia_p2_']               = array();
      $this->field_config['inasistencia_p2_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['inasistencia_p2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['inasistencia_p2_']['symbol_dec'] = '';
      $this->field_config['inasistencia_p2_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['inasistencia_p2_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- eval_2_per_
      $this->field_config['eval_2_per_']               = array();
      $this->field_config['eval_2_per_']['symbol_grp'] = '';
      $this->field_config['eval_2_per_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eval_2_per_']['symbol_dec'] = ',';
      $this->field_config['eval_2_per_']['symbol_neg'] = '-';
      $this->field_config['eval_2_per_']['format_neg'] = '2';
      //-- dc1_2p_
      $this->field_config['dc1_2p_']               = array();
      $this->field_config['dc1_2p_']['symbol_grp'] = '';
      $this->field_config['dc1_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc1_2p_']['symbol_dec'] = ',';
      $this->field_config['dc1_2p_']['symbol_neg'] = '-';
      $this->field_config['dc1_2p_']['format_neg'] = '2';
      //-- dc2_2p_
      $this->field_config['dc2_2p_']               = array();
      $this->field_config['dc2_2p_']['symbol_grp'] = '';
      $this->field_config['dc2_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc2_2p_']['symbol_dec'] = ',';
      $this->field_config['dc2_2p_']['symbol_neg'] = '-';
      $this->field_config['dc2_2p_']['format_neg'] = '2';
      //-- dc3_2p_
      $this->field_config['dc3_2p_']               = array();
      $this->field_config['dc3_2p_']['symbol_grp'] = '';
      $this->field_config['dc3_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc3_2p_']['symbol_dec'] = ',';
      $this->field_config['dc3_2p_']['symbol_neg'] = '-';
      $this->field_config['dc3_2p_']['format_neg'] = '2';
      //-- dc4_2p_
      $this->field_config['dc4_2p_']               = array();
      $this->field_config['dc4_2p_']['symbol_grp'] = '';
      $this->field_config['dc4_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc4_2p_']['symbol_dec'] = ',';
      $this->field_config['dc4_2p_']['symbol_neg'] = '-';
      $this->field_config['dc4_2p_']['format_neg'] = '2';
      //-- dc5_2p_
      $this->field_config['dc5_2p_']               = array();
      $this->field_config['dc5_2p_']['symbol_grp'] = '';
      $this->field_config['dc5_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc5_2p_']['symbol_dec'] = ',';
      $this->field_config['dc5_2p_']['symbol_neg'] = '-';
      $this->field_config['dc5_2p_']['format_neg'] = '2';
      //-- pcent_dc2_
      $this->field_config['pcent_dc2_']               = array();
      $this->field_config['pcent_dc2_']['symbol_grp'] = '';
      $this->field_config['pcent_dc2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dc2_']['symbol_dec'] = ',';
      $this->field_config['pcent_dc2_']['symbol_neg'] = '-';
      $this->field_config['pcent_dc2_']['format_neg'] = '2';
      //-- ds1_2p_
      $this->field_config['ds1_2p_']               = array();
      $this->field_config['ds1_2p_']['symbol_grp'] = '';
      $this->field_config['ds1_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds1_2p_']['symbol_dec'] = ',';
      $this->field_config['ds1_2p_']['symbol_neg'] = '-';
      $this->field_config['ds1_2p_']['format_neg'] = '2';
      //-- ds2_2p_
      $this->field_config['ds2_2p_']               = array();
      $this->field_config['ds2_2p_']['symbol_grp'] = '';
      $this->field_config['ds2_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds2_2p_']['symbol_dec'] = ',';
      $this->field_config['ds2_2p_']['symbol_neg'] = '-';
      $this->field_config['ds2_2p_']['format_neg'] = '2';
      //-- ds3_2p_
      $this->field_config['ds3_2p_']               = array();
      $this->field_config['ds3_2p_']['symbol_grp'] = '';
      $this->field_config['ds3_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds3_2p_']['symbol_dec'] = ',';
      $this->field_config['ds3_2p_']['symbol_neg'] = '-';
      $this->field_config['ds3_2p_']['format_neg'] = '2';
      //-- ds4_2p_
      $this->field_config['ds4_2p_']               = array();
      $this->field_config['ds4_2p_']['symbol_grp'] = '';
      $this->field_config['ds4_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds4_2p_']['symbol_dec'] = ',';
      $this->field_config['ds4_2p_']['symbol_neg'] = '-';
      $this->field_config['ds4_2p_']['format_neg'] = '2';
      //-- ds5_2p_
      $this->field_config['ds5_2p_']               = array();
      $this->field_config['ds5_2p_']['symbol_grp'] = '';
      $this->field_config['ds5_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds5_2p_']['symbol_dec'] = ',';
      $this->field_config['ds5_2p_']['symbol_neg'] = '-';
      $this->field_config['ds5_2p_']['format_neg'] = '2';
      //-- pcent_ds2_
      $this->field_config['pcent_ds2_']               = array();
      $this->field_config['pcent_ds2_']['symbol_grp'] = '';
      $this->field_config['pcent_ds2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_ds2_']['symbol_dec'] = ',';
      $this->field_config['pcent_ds2_']['symbol_neg'] = '-';
      $this->field_config['pcent_ds2_']['format_neg'] = '2';
      //-- dp1_2p_
      $this->field_config['dp1_2p_']               = array();
      $this->field_config['dp1_2p_']['symbol_grp'] = '';
      $this->field_config['dp1_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp1_2p_']['symbol_dec'] = ',';
      $this->field_config['dp1_2p_']['symbol_neg'] = '-';
      $this->field_config['dp1_2p_']['format_neg'] = '2';
      //-- dp2_2p_
      $this->field_config['dp2_2p_']               = array();
      $this->field_config['dp2_2p_']['symbol_grp'] = '';
      $this->field_config['dp2_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp2_2p_']['symbol_dec'] = ',';
      $this->field_config['dp2_2p_']['symbol_neg'] = '-';
      $this->field_config['dp2_2p_']['format_neg'] = '2';
      //-- dp3_2p_
      $this->field_config['dp3_2p_']               = array();
      $this->field_config['dp3_2p_']['symbol_grp'] = '';
      $this->field_config['dp3_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp3_2p_']['symbol_dec'] = ',';
      $this->field_config['dp3_2p_']['symbol_neg'] = '-';
      $this->field_config['dp3_2p_']['format_neg'] = '2';
      //-- dp4_2p_
      $this->field_config['dp4_2p_']               = array();
      $this->field_config['dp4_2p_']['symbol_grp'] = '';
      $this->field_config['dp4_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp4_2p_']['symbol_dec'] = ',';
      $this->field_config['dp4_2p_']['symbol_neg'] = '-';
      $this->field_config['dp4_2p_']['format_neg'] = '2';
      //-- dp5_2p_
      $this->field_config['dp5_2p_']               = array();
      $this->field_config['dp5_2p_']['symbol_grp'] = '';
      $this->field_config['dp5_2p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp5_2p_']['symbol_dec'] = ',';
      $this->field_config['dp5_2p_']['symbol_neg'] = '-';
      $this->field_config['dp5_2p_']['format_neg'] = '2';
      //-- pcent_dp2_
      $this->field_config['pcent_dp2_']               = array();
      $this->field_config['pcent_dp2_']['symbol_grp'] = '';
      $this->field_config['pcent_dp2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dp2_']['symbol_dec'] = ',';
      $this->field_config['pcent_dp2_']['symbol_neg'] = '-';
      $this->field_config['pcent_dp2_']['format_neg'] = '2';
      //-- aee_p2_
      $this->field_config['aee_p2_']               = array();
      $this->field_config['aee_p2_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['aee_p2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['aee_p2_']['symbol_dec'] = '';
      $this->field_config['aee_p2_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['aee_p2_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- porcet_aee_p2_
      $this->field_config['porcet_aee_p2_']               = array();
      $this->field_config['porcet_aee_p2_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['porcet_aee_p2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['porcet_aee_p2_']['symbol_dec'] = '';
      $this->field_config['porcet_aee_p2_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['porcet_aee_p2_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- inasistencia_p3_
      $this->field_config['inasistencia_p3_']               = array();
      $this->field_config['inasistencia_p3_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['inasistencia_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['inasistencia_p3_']['symbol_dec'] = '';
      $this->field_config['inasistencia_p3_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['inasistencia_p3_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- eval_3_per_
      $this->field_config['eval_3_per_']               = array();
      $this->field_config['eval_3_per_']['symbol_grp'] = '';
      $this->field_config['eval_3_per_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eval_3_per_']['symbol_dec'] = ',';
      $this->field_config['eval_3_per_']['symbol_neg'] = '-';
      $this->field_config['eval_3_per_']['format_neg'] = '2';
      //-- dc1_3p_
      $this->field_config['dc1_3p_']               = array();
      $this->field_config['dc1_3p_']['symbol_grp'] = '';
      $this->field_config['dc1_3p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc1_3p_']['symbol_dec'] = ',';
      $this->field_config['dc1_3p_']['symbol_neg'] = '-';
      $this->field_config['dc1_3p_']['format_neg'] = '2';
      //-- dc2_3p_
      $this->field_config['dc2_3p_']               = array();
      $this->field_config['dc2_3p_']['symbol_grp'] = '';
      $this->field_config['dc2_3p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc2_3p_']['symbol_dec'] = ',';
      $this->field_config['dc2_3p_']['symbol_neg'] = '-';
      $this->field_config['dc2_3p_']['format_neg'] = '2';
      //-- dc3_3p_
      $this->field_config['dc3_3p_']               = array();
      $this->field_config['dc3_3p_']['symbol_grp'] = '';
      $this->field_config['dc3_3p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc3_3p_']['symbol_dec'] = ',';
      $this->field_config['dc3_3p_']['symbol_neg'] = '-';
      $this->field_config['dc3_3p_']['format_neg'] = '2';
      //-- dc4_3p_
      $this->field_config['dc4_3p_']               = array();
      $this->field_config['dc4_3p_']['symbol_grp'] = '';
      $this->field_config['dc4_3p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc4_3p_']['symbol_dec'] = ',';
      $this->field_config['dc4_3p_']['symbol_neg'] = '-';
      $this->field_config['dc4_3p_']['format_neg'] = '2';
      //-- dc5_3p_
      $this->field_config['dc5_3p_']               = array();
      $this->field_config['dc5_3p_']['symbol_grp'] = '';
      $this->field_config['dc5_3p_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc5_3p_']['symbol_dec'] = ',';
      $this->field_config['dc5_3p_']['symbol_neg'] = '-';
      $this->field_config['dc5_3p_']['format_neg'] = '2';
      //-- pcent_dc3_
      $this->field_config['pcent_dc3_']               = array();
      $this->field_config['pcent_dc3_']['symbol_grp'] = '';
      $this->field_config['pcent_dc3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dc3_']['symbol_dec'] = ',';
      $this->field_config['pcent_dc3_']['symbol_neg'] = '-';
      $this->field_config['pcent_dc3_']['format_neg'] = '2';
      //-- ds1_p3_
      $this->field_config['ds1_p3_']               = array();
      $this->field_config['ds1_p3_']['symbol_grp'] = '';
      $this->field_config['ds1_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds1_p3_']['symbol_dec'] = ',';
      $this->field_config['ds1_p3_']['symbol_neg'] = '-';
      $this->field_config['ds1_p3_']['format_neg'] = '2';
      //-- ds2_p3_
      $this->field_config['ds2_p3_']               = array();
      $this->field_config['ds2_p3_']['symbol_grp'] = '';
      $this->field_config['ds2_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds2_p3_']['symbol_dec'] = ',';
      $this->field_config['ds2_p3_']['symbol_neg'] = '-';
      $this->field_config['ds2_p3_']['format_neg'] = '2';
      //-- ds3_p3_
      $this->field_config['ds3_p3_']               = array();
      $this->field_config['ds3_p3_']['symbol_grp'] = '';
      $this->field_config['ds3_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds3_p3_']['symbol_dec'] = ',';
      $this->field_config['ds3_p3_']['symbol_neg'] = '-';
      $this->field_config['ds3_p3_']['format_neg'] = '2';
      //-- ds4_p3_
      $this->field_config['ds4_p3_']               = array();
      $this->field_config['ds4_p3_']['symbol_grp'] = '';
      $this->field_config['ds4_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds4_p3_']['symbol_dec'] = ',';
      $this->field_config['ds4_p3_']['symbol_neg'] = '-';
      $this->field_config['ds4_p3_']['format_neg'] = '2';
      //-- ds5_p3_
      $this->field_config['ds5_p3_']               = array();
      $this->field_config['ds5_p3_']['symbol_grp'] = '';
      $this->field_config['ds5_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds5_p3_']['symbol_dec'] = ',';
      $this->field_config['ds5_p3_']['symbol_neg'] = '-';
      $this->field_config['ds5_p3_']['format_neg'] = '2';
      //-- pcent_ds3_
      $this->field_config['pcent_ds3_']               = array();
      $this->field_config['pcent_ds3_']['symbol_grp'] = '';
      $this->field_config['pcent_ds3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_ds3_']['symbol_dec'] = ',';
      $this->field_config['pcent_ds3_']['symbol_neg'] = '-';
      $this->field_config['pcent_ds3_']['format_neg'] = '2';
      //-- dp1_p3_
      $this->field_config['dp1_p3_']               = array();
      $this->field_config['dp1_p3_']['symbol_grp'] = '';
      $this->field_config['dp1_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp1_p3_']['symbol_dec'] = ',';
      $this->field_config['dp1_p3_']['symbol_neg'] = '-';
      $this->field_config['dp1_p3_']['format_neg'] = '2';
      //-- dp2_p3_
      $this->field_config['dp2_p3_']               = array();
      $this->field_config['dp2_p3_']['symbol_grp'] = '';
      $this->field_config['dp2_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp2_p3_']['symbol_dec'] = ',';
      $this->field_config['dp2_p3_']['symbol_neg'] = '-';
      $this->field_config['dp2_p3_']['format_neg'] = '2';
      //-- dp3_p3_
      $this->field_config['dp3_p3_']               = array();
      $this->field_config['dp3_p3_']['symbol_grp'] = '';
      $this->field_config['dp3_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp3_p3_']['symbol_dec'] = ',';
      $this->field_config['dp3_p3_']['symbol_neg'] = '-';
      $this->field_config['dp3_p3_']['format_neg'] = '2';
      //-- dp4_p3_
      $this->field_config['dp4_p3_']               = array();
      $this->field_config['dp4_p3_']['symbol_grp'] = '';
      $this->field_config['dp4_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp4_p3_']['symbol_dec'] = ',';
      $this->field_config['dp4_p3_']['symbol_neg'] = '-';
      $this->field_config['dp4_p3_']['format_neg'] = '2';
      //-- sc_field_0_
      $this->field_config['sc_field_0_']               = array();
      $this->field_config['sc_field_0_']['symbol_grp'] = '';
      $this->field_config['sc_field_0_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['sc_field_0_']['symbol_dec'] = ',';
      $this->field_config['sc_field_0_']['symbol_neg'] = '-';
      $this->field_config['sc_field_0_']['format_neg'] = '2';
      //-- pcent_dp3_
      $this->field_config['pcent_dp3_']               = array();
      $this->field_config['pcent_dp3_']['symbol_grp'] = '';
      $this->field_config['pcent_dp3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dp3_']['symbol_dec'] = ',';
      $this->field_config['pcent_dp3_']['symbol_neg'] = '-';
      $this->field_config['pcent_dp3_']['format_neg'] = '2';
      //-- aee_p3_
      $this->field_config['aee_p3_']               = array();
      $this->field_config['aee_p3_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['aee_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['aee_p3_']['symbol_dec'] = '';
      $this->field_config['aee_p3_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['aee_p3_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- porcent_aee_p3_
      $this->field_config['porcent_aee_p3_']               = array();
      $this->field_config['porcent_aee_p3_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['porcent_aee_p3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['porcent_aee_p3_']['symbol_dec'] = '';
      $this->field_config['porcent_aee_p3_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['porcent_aee_p3_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- inasistencia_p4_
      $this->field_config['inasistencia_p4_']               = array();
      $this->field_config['inasistencia_p4_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['inasistencia_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['inasistencia_p4_']['symbol_dec'] = '';
      $this->field_config['inasistencia_p4_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['inasistencia_p4_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- eval_4_per_
      $this->field_config['eval_4_per_']               = array();
      $this->field_config['eval_4_per_']['symbol_grp'] = '';
      $this->field_config['eval_4_per_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eval_4_per_']['symbol_dec'] = ',';
      $this->field_config['eval_4_per_']['symbol_neg'] = '-';
      $this->field_config['eval_4_per_']['format_neg'] = '2';
      //-- dc1_p4_
      $this->field_config['dc1_p4_']               = array();
      $this->field_config['dc1_p4_']['symbol_grp'] = '';
      $this->field_config['dc1_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc1_p4_']['symbol_dec'] = ',';
      $this->field_config['dc1_p4_']['symbol_neg'] = '-';
      $this->field_config['dc1_p4_']['format_neg'] = '2';
      //-- dc2_p4_
      $this->field_config['dc2_p4_']               = array();
      $this->field_config['dc2_p4_']['symbol_grp'] = '';
      $this->field_config['dc2_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc2_p4_']['symbol_dec'] = ',';
      $this->field_config['dc2_p4_']['symbol_neg'] = '-';
      $this->field_config['dc2_p4_']['format_neg'] = '2';
      //-- dc3_p4_
      $this->field_config['dc3_p4_']               = array();
      $this->field_config['dc3_p4_']['symbol_grp'] = '';
      $this->field_config['dc3_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc3_p4_']['symbol_dec'] = ',';
      $this->field_config['dc3_p4_']['symbol_neg'] = '-';
      $this->field_config['dc3_p4_']['format_neg'] = '2';
      //-- dc4_p4_
      $this->field_config['dc4_p4_']               = array();
      $this->field_config['dc4_p4_']['symbol_grp'] = '';
      $this->field_config['dc4_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc4_p4_']['symbol_dec'] = ',';
      $this->field_config['dc4_p4_']['symbol_neg'] = '-';
      $this->field_config['dc4_p4_']['format_neg'] = '2';
      //-- dc5_p4_
      $this->field_config['dc5_p4_']               = array();
      $this->field_config['dc5_p4_']['symbol_grp'] = '';
      $this->field_config['dc5_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc5_p4_']['symbol_dec'] = ',';
      $this->field_config['dc5_p4_']['symbol_neg'] = '-';
      $this->field_config['dc5_p4_']['format_neg'] = '2';
      //-- pcent_dc4_
      $this->field_config['pcent_dc4_']               = array();
      $this->field_config['pcent_dc4_']['symbol_grp'] = '';
      $this->field_config['pcent_dc4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dc4_']['symbol_dec'] = ',';
      $this->field_config['pcent_dc4_']['symbol_neg'] = '-';
      $this->field_config['pcent_dc4_']['format_neg'] = '2';
      //-- ds1_p4_
      $this->field_config['ds1_p4_']               = array();
      $this->field_config['ds1_p4_']['symbol_grp'] = '';
      $this->field_config['ds1_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds1_p4_']['symbol_dec'] = ',';
      $this->field_config['ds1_p4_']['symbol_neg'] = '-';
      $this->field_config['ds1_p4_']['format_neg'] = '2';
      //-- ds2_p4_
      $this->field_config['ds2_p4_']               = array();
      $this->field_config['ds2_p4_']['symbol_grp'] = '';
      $this->field_config['ds2_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds2_p4_']['symbol_dec'] = ',';
      $this->field_config['ds2_p4_']['symbol_neg'] = '-';
      $this->field_config['ds2_p4_']['format_neg'] = '2';
      //-- ds3_p4_
      $this->field_config['ds3_p4_']               = array();
      $this->field_config['ds3_p4_']['symbol_grp'] = '';
      $this->field_config['ds3_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds3_p4_']['symbol_dec'] = ',';
      $this->field_config['ds3_p4_']['symbol_neg'] = '-';
      $this->field_config['ds3_p4_']['format_neg'] = '2';
      //-- ds4_p4_
      $this->field_config['ds4_p4_']               = array();
      $this->field_config['ds4_p4_']['symbol_grp'] = '';
      $this->field_config['ds4_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds4_p4_']['symbol_dec'] = ',';
      $this->field_config['ds4_p4_']['symbol_neg'] = '-';
      $this->field_config['ds4_p4_']['format_neg'] = '2';
      //-- ds5_p4_
      $this->field_config['ds5_p4_']               = array();
      $this->field_config['ds5_p4_']['symbol_grp'] = '';
      $this->field_config['ds5_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds5_p4_']['symbol_dec'] = ',';
      $this->field_config['ds5_p4_']['symbol_neg'] = '-';
      $this->field_config['ds5_p4_']['format_neg'] = '2';
      //-- pcent_ds4_
      $this->field_config['pcent_ds4_']               = array();
      $this->field_config['pcent_ds4_']['symbol_grp'] = '';
      $this->field_config['pcent_ds4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_ds4_']['symbol_dec'] = ',';
      $this->field_config['pcent_ds4_']['symbol_neg'] = '-';
      $this->field_config['pcent_ds4_']['format_neg'] = '2';
      //-- dp1_p4_
      $this->field_config['dp1_p4_']               = array();
      $this->field_config['dp1_p4_']['symbol_grp'] = '';
      $this->field_config['dp1_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp1_p4_']['symbol_dec'] = ',';
      $this->field_config['dp1_p4_']['symbol_neg'] = '-';
      $this->field_config['dp1_p4_']['format_neg'] = '2';
      //-- dp2_p4_
      $this->field_config['dp2_p4_']               = array();
      $this->field_config['dp2_p4_']['symbol_grp'] = '';
      $this->field_config['dp2_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp2_p4_']['symbol_dec'] = ',';
      $this->field_config['dp2_p4_']['symbol_neg'] = '-';
      $this->field_config['dp2_p4_']['format_neg'] = '2';
      //-- dp3_p4_
      $this->field_config['dp3_p4_']               = array();
      $this->field_config['dp3_p4_']['symbol_grp'] = '';
      $this->field_config['dp3_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp3_p4_']['symbol_dec'] = ',';
      $this->field_config['dp3_p4_']['symbol_neg'] = '-';
      $this->field_config['dp3_p4_']['format_neg'] = '2';
      //-- dp4_p4_
      $this->field_config['dp4_p4_']               = array();
      $this->field_config['dp4_p4_']['symbol_grp'] = '';
      $this->field_config['dp4_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp4_p4_']['symbol_dec'] = ',';
      $this->field_config['dp4_p4_']['symbol_neg'] = '-';
      $this->field_config['dp4_p4_']['format_neg'] = '2';
      //-- dp5_p4_
      $this->field_config['dp5_p4_']               = array();
      $this->field_config['dp5_p4_']['symbol_grp'] = '';
      $this->field_config['dp5_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp5_p4_']['symbol_dec'] = ',';
      $this->field_config['dp5_p4_']['symbol_neg'] = '-';
      $this->field_config['dp5_p4_']['format_neg'] = '2';
      //-- aee_p4_
      $this->field_config['aee_p4_']               = array();
      $this->field_config['aee_p4_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['aee_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['aee_p4_']['symbol_dec'] = '';
      $this->field_config['aee_p4_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['aee_p4_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- porcent_aee_p4_
      $this->field_config['porcent_aee_p4_']               = array();
      $this->field_config['porcent_aee_p4_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['porcent_aee_p4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['porcent_aee_p4_']['symbol_dec'] = '';
      $this->field_config['porcent_aee_p4_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['porcent_aee_p4_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_dp4_
      $this->field_config['pcent_dp4_']               = array();
      $this->field_config['pcent_dp4_']['symbol_grp'] = '';
      $this->field_config['pcent_dp4_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dp4_']['symbol_dec'] = ',';
      $this->field_config['pcent_dp4_']['symbol_neg'] = '-';
      $this->field_config['pcent_dp4_']['format_neg'] = '2';
      //-- eval_final_
      $this->field_config['eval_final_']               = array();
      $this->field_config['eval_final_']['symbol_grp'] = '';
      $this->field_config['eval_final_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eval_final_']['symbol_dec'] = ',';
      $this->field_config['eval_final_']['symbol_neg'] = '-';
      $this->field_config['eval_final_']['format_neg'] = '2';
      //-- entorno_
      $this->field_config['entorno_']               = array();
      $this->field_config['entorno_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['entorno_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['entorno_']['symbol_dec'] = '';
      $this->field_config['entorno_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['entorno_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_novedad_
      $this->field_config['id_novedad_']               = array();
      $this->field_config['id_novedad_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_novedad_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_novedad_']['symbol_dec'] = '';
      $this->field_config['id_novedad_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_novedad_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opc_edit'] = true;  
      $sc_contr_vert = $GLOBALS["sc_contr_vert"];
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         form_t_evaluacion_p1_m3_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_t_evaluacion_p1_m3_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->id_estudiante_)) { $this->nm_limpa_alfa($this->id_estudiante_); }
         if (isset($this->novedad_)) { $this->nm_limpa_alfa($this->novedad_); }
         if (isset($this->estatus_)) { $this->nm_limpa_alfa($this->estatus_); }
         if (isset($this->inasistencia_p1_)) { $this->nm_limpa_alfa($this->inasistencia_p1_); }
         if (isset($this->eval_1_per_)) { $this->nm_limpa_alfa($this->eval_1_per_); }
         if (isset($this->dc1_)) { $this->nm_limpa_alfa($this->dc1_); }
         if (isset($this->dc2_)) { $this->nm_limpa_alfa($this->dc2_); }
         if (isset($this->dc3_)) { $this->nm_limpa_alfa($this->dc3_); }
         if (isset($this->dc4_)) { $this->nm_limpa_alfa($this->dc4_); }
         if (isset($this->dc5_)) { $this->nm_limpa_alfa($this->dc5_); }
         if (isset($this->pcent_dc_)) { $this->nm_limpa_alfa($this->pcent_dc_); }
         if (isset($this->ds1_)) { $this->nm_limpa_alfa($this->ds1_); }
         if (isset($this->ds2_)) { $this->nm_limpa_alfa($this->ds2_); }
         if (isset($this->ds3_)) { $this->nm_limpa_alfa($this->ds3_); }
         if (isset($this->pcent_ds_)) { $this->nm_limpa_alfa($this->pcent_ds_); }
         if (isset($this->dp1_)) { $this->nm_limpa_alfa($this->dp1_); }
         if (isset($this->dp2_)) { $this->nm_limpa_alfa($this->dp2_); }
         if (isset($this->dp3_)) { $this->nm_limpa_alfa($this->dp3_); }
         if (isset($this->pcent_dp_)) { $this->nm_limpa_alfa($this->pcent_dp_); }
         if (isset($this->aeep1_)) { $this->nm_limpa_alfa($this->aeep1_); }
         if (isset($this->porcent_aeep1_)) { $this->nm_limpa_alfa($this->porcent_aeep1_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert];
             $this->primer_apellido_ = $this->nmgp_dados_form['primer_apellido_']; 
             $this->segundo_apellido_ = $this->nmgp_dados_form['segundo_apellido_']; 
             $this->primer_nombre_ = $this->nmgp_dados_form['primer_nombre_']; 
             $this->segundo_nombre_ = $this->nmgp_dados_form['segundo_nombre_']; 
             $this->id_grupo_ = $this->nmgp_dados_form['id_grupo_']; 
             $this->id_area_ = $this->nmgp_dados_form['id_area_']; 
             $this->id_asignatura_ = $this->nmgp_dados_form['id_asignatura_']; 
             $this->id_grado_ = $this->nmgp_dados_form['id_grado_']; 
             $this->id_nivel_ = $this->nmgp_dados_form['id_nivel_']; 
             $this->ihs_ = $this->nmgp_dados_form['ihs_']; 
             $this->pfa_ = $this->nmgp_dados_form['pfa_']; 
             $this->tipo_asig_ = $this->nmgp_dados_form['tipo_asig_']; 
             $this->dc6_ = $this->nmgp_dados_form['dc6_']; 
             $this->dc7_ = $this->nmgp_dados_form['dc7_']; 
             $this->dc8_ = $this->nmgp_dados_form['dc8_']; 
             $this->dc9_ = $this->nmgp_dados_form['dc9_']; 
             $this->ds4_ = $this->nmgp_dados_form['ds4_']; 
             $this->ds5_ = $this->nmgp_dados_form['ds5_']; 
             $this->dp4_ = $this->nmgp_dados_form['dp4_']; 
             $this->dp5_ = $this->nmgp_dados_form['dp5_']; 
             $this->inasistencia_p2_ = $this->nmgp_dados_form['inasistencia_p2_']; 
             $this->eval_2_per_ = $this->nmgp_dados_form['eval_2_per_']; 
             $this->dc1_2p_ = $this->nmgp_dados_form['dc1_2p_']; 
             $this->dc2_2p_ = $this->nmgp_dados_form['dc2_2p_']; 
             $this->dc3_2p_ = $this->nmgp_dados_form['dc3_2p_']; 
             $this->dc4_2p_ = $this->nmgp_dados_form['dc4_2p_']; 
             $this->dc5_2p_ = $this->nmgp_dados_form['dc5_2p_']; 
             $this->pcent_dc2_ = $this->nmgp_dados_form['pcent_dc2_']; 
             $this->ds1_2p_ = $this->nmgp_dados_form['ds1_2p_']; 
             $this->ds2_2p_ = $this->nmgp_dados_form['ds2_2p_']; 
             $this->ds3_2p_ = $this->nmgp_dados_form['ds3_2p_']; 
             $this->ds4_2p_ = $this->nmgp_dados_form['ds4_2p_']; 
             $this->ds5_2p_ = $this->nmgp_dados_form['ds5_2p_']; 
             $this->pcent_ds2_ = $this->nmgp_dados_form['pcent_ds2_']; 
             $this->dp1_2p_ = $this->nmgp_dados_form['dp1_2p_']; 
             $this->dp2_2p_ = $this->nmgp_dados_form['dp2_2p_']; 
             $this->dp3_2p_ = $this->nmgp_dados_form['dp3_2p_']; 
             $this->dp4_2p_ = $this->nmgp_dados_form['dp4_2p_']; 
             $this->dp5_2p_ = $this->nmgp_dados_form['dp5_2p_']; 
             $this->pcent_dp2_ = $this->nmgp_dados_form['pcent_dp2_']; 
             $this->aee_p2_ = $this->nmgp_dados_form['aee_p2_']; 
             $this->porcet_aee_p2_ = $this->nmgp_dados_form['porcet_aee_p2_']; 
             $this->inasistencia_p3_ = $this->nmgp_dados_form['inasistencia_p3_']; 
             $this->eval_3_per_ = $this->nmgp_dados_form['eval_3_per_']; 
             $this->dc1_3p_ = $this->nmgp_dados_form['dc1_3p_']; 
             $this->dc2_3p_ = $this->nmgp_dados_form['dc2_3p_']; 
             $this->dc3_3p_ = $this->nmgp_dados_form['dc3_3p_']; 
             $this->dc4_3p_ = $this->nmgp_dados_form['dc4_3p_']; 
             $this->dc5_3p_ = $this->nmgp_dados_form['dc5_3p_']; 
             $this->pcent_dc3_ = $this->nmgp_dados_form['pcent_dc3_']; 
             $this->ds1_p3_ = $this->nmgp_dados_form['ds1_p3_']; 
             $this->ds2_p3_ = $this->nmgp_dados_form['ds2_p3_']; 
             $this->ds3_p3_ = $this->nmgp_dados_form['ds3_p3_']; 
             $this->ds4_p3_ = $this->nmgp_dados_form['ds4_p3_']; 
             $this->ds5_p3_ = $this->nmgp_dados_form['ds5_p3_']; 
             $this->pcent_ds3_ = $this->nmgp_dados_form['pcent_ds3_']; 
             $this->dp1_p3_ = $this->nmgp_dados_form['dp1_p3_']; 
             $this->dp2_p3_ = $this->nmgp_dados_form['dp2_p3_']; 
             $this->dp3_p3_ = $this->nmgp_dados_form['dp3_p3_']; 
             $this->dp4_p3_ = $this->nmgp_dados_form['dp4_p3_']; 
             $this->sc_field_0_ = $this->nmgp_dados_form['sc_field_0_']; 
             $this->pcent_dp3_ = $this->nmgp_dados_form['pcent_dp3_']; 
             $this->aee_p3_ = $this->nmgp_dados_form['aee_p3_']; 
             $this->porcent_aee_p3_ = $this->nmgp_dados_form['porcent_aee_p3_']; 
             $this->inasistencia_p4_ = $this->nmgp_dados_form['inasistencia_p4_']; 
             $this->eval_4_per_ = $this->nmgp_dados_form['eval_4_per_']; 
             $this->dc1_p4_ = $this->nmgp_dados_form['dc1_p4_']; 
             $this->dc2_p4_ = $this->nmgp_dados_form['dc2_p4_']; 
             $this->dc3_p4_ = $this->nmgp_dados_form['dc3_p4_']; 
             $this->dc4_p4_ = $this->nmgp_dados_form['dc4_p4_']; 
             $this->dc5_p4_ = $this->nmgp_dados_form['dc5_p4_']; 
             $this->pcent_dc4_ = $this->nmgp_dados_form['pcent_dc4_']; 
             $this->ds1_p4_ = $this->nmgp_dados_form['ds1_p4_']; 
             $this->ds2_p4_ = $this->nmgp_dados_form['ds2_p4_']; 
             $this->ds3_p4_ = $this->nmgp_dados_form['ds3_p4_']; 
             $this->ds4_p4_ = $this->nmgp_dados_form['ds4_p4_']; 
             $this->ds5_p4_ = $this->nmgp_dados_form['ds5_p4_']; 
             $this->pcent_ds4_ = $this->nmgp_dados_form['pcent_ds4_']; 
             $this->dp1_p4_ = $this->nmgp_dados_form['dp1_p4_']; 
             $this->dp2_p4_ = $this->nmgp_dados_form['dp2_p4_']; 
             $this->dp3_p4_ = $this->nmgp_dados_form['dp3_p4_']; 
             $this->dp4_p4_ = $this->nmgp_dados_form['dp4_p4_']; 
             $this->dp5_p4_ = $this->nmgp_dados_form['dp5_p4_']; 
             $this->aee_p4_ = $this->nmgp_dados_form['aee_p4_']; 
             $this->porcent_aee_p4_ = $this->nmgp_dados_form['porcent_aee_p4_']; 
             $this->pcent_dp4_ = $this->nmgp_dados_form['pcent_dp4_']; 
             $this->eval_final_ = $this->nmgp_dados_form['eval_final_']; 
             $this->entorno_ = $this->nmgp_dados_form['entorno_']; 
             $this->estudiantes_ = $this->nmgp_dados_form['estudiantes_']; 
             $this->id_novedad_ = $this->nmgp_dados_form['id_novedad_']; 
             $this->nom_grupo_ = $this->nmgp_dados_form['nom_grupo_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_t_evaluacion_p1_m3']) || !is_array($this->NM_ajax_info['errList']['geral_form_t_evaluacion_p1_m3']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_t_evaluacion_p1_m3'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_t_evaluacion_p1_m3'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_t_evaluacion_p1_m3'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_t_evaluacion_p1_m3'][] = $this->Campos_Mens_erro;
                  }
                  $this->NM_gera_nav_page(); 
                  $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
         form_t_evaluacion_p1_m3_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_id_estudiante_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_estudiante_');
          }
          if ('validate_estatus_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatus_');
          }
          if ('validate_novedad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'novedad_');
          }
          if ('validate_asienta_inasistencias_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'asienta_inasistencias_');
          }
          if ('validate_inasistencia_p1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'inasistencia_p1_');
          }
          if ('validate_eval_1_per_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'eval_1_per_');
          }
          if ('validate_dc1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dc1_');
          }
          if ('validate_dc2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dc2_');
          }
          if ('validate_dc3_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dc3_');
          }
          if ('validate_dc4_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dc4_');
          }
          if ('validate_dc5_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dc5_');
          }
          if ('validate_pcent_dc_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pcent_dc_');
          }
          if ('validate_dp1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dp1_');
          }
          if ('validate_dp2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dp2_');
          }
          if ('validate_dp3_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dp3_');
          }
          if ('validate_pcent_dp_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pcent_dp_');
          }
          if ('validate_ds1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ds1_');
          }
          if ('validate_ds2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ds2_');
          }
          if ('validate_ds3_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ds3_');
          }
          if ('validate_pcent_ds_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pcent_ds_');
          }
          if ('validate_aeep1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'aeep1_');
          }
          if ('validate_porcent_aeep1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'porcent_aeep1_');
          }
          if ('validate_val_acumulada_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'val_acumulada_');
          }
          if ('validate_val_requerida_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'val_requerida_');
          }
          form_t_evaluacion_p1_m3_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->id_estudiante_ = $GLOBALS["id_estudiante_" . $sc_seq_vert]; 
         $this->estatus_ = $GLOBALS["estatus_" . $sc_seq_vert]; 
         $this->novedad_ = $GLOBALS["novedad_" . $sc_seq_vert]; 
         $this->asienta_inasistencias_ = $GLOBALS["asienta_inasistencias_" . $sc_seq_vert]; 
         $this->inasistencia_p1_ = $GLOBALS["inasistencia_p1_" . $sc_seq_vert]; 
         $this->eval_1_per_ = $GLOBALS["eval_1_per_" . $sc_seq_vert]; 
         $this->dc1_ = $GLOBALS["dc1_" . $sc_seq_vert]; 
         $this->dc2_ = $GLOBALS["dc2_" . $sc_seq_vert]; 
         $this->dc3_ = $GLOBALS["dc3_" . $sc_seq_vert]; 
         $this->dc4_ = $GLOBALS["dc4_" . $sc_seq_vert]; 
         $this->dc5_ = $GLOBALS["dc5_" . $sc_seq_vert]; 
         $this->pcent_dc_ = $GLOBALS["pcent_dc_" . $sc_seq_vert]; 
         $this->dp1_ = $GLOBALS["dp1_" . $sc_seq_vert]; 
         $this->dp2_ = $GLOBALS["dp2_" . $sc_seq_vert]; 
         $this->dp3_ = $GLOBALS["dp3_" . $sc_seq_vert]; 
         $this->pcent_dp_ = $GLOBALS["pcent_dp_" . $sc_seq_vert]; 
         $this->ds1_ = $GLOBALS["ds1_" . $sc_seq_vert]; 
         $this->ds2_ = $GLOBALS["ds2_" . $sc_seq_vert]; 
         $this->ds3_ = $GLOBALS["ds3_" . $sc_seq_vert]; 
         $this->pcent_ds_ = $GLOBALS["pcent_ds_" . $sc_seq_vert]; 
         $this->aeep1_ = $GLOBALS["aeep1_" . $sc_seq_vert]; 
         $this->porcent_aeep1_ = $GLOBALS["porcent_aeep1_" . $sc_seq_vert]; 
         $this->val_acumulada_ = $GLOBALS["val_acumulada_" . $sc_seq_vert]; 
         $this->val_requerida_ = $GLOBALS["val_requerida_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert];
             $this->primer_apellido_ = $this->nmgp_dados_form['primer_apellido_']; 
             $this->segundo_apellido_ = $this->nmgp_dados_form['segundo_apellido_']; 
             $this->primer_nombre_ = $this->nmgp_dados_form['primer_nombre_']; 
             $this->segundo_nombre_ = $this->nmgp_dados_form['segundo_nombre_']; 
             $this->id_grupo_ = $this->nmgp_dados_form['id_grupo_']; 
             $this->id_area_ = $this->nmgp_dados_form['id_area_']; 
             $this->id_asignatura_ = $this->nmgp_dados_form['id_asignatura_']; 
             $this->id_grado_ = $this->nmgp_dados_form['id_grado_']; 
             $this->id_nivel_ = $this->nmgp_dados_form['id_nivel_']; 
             $this->ihs_ = $this->nmgp_dados_form['ihs_']; 
             $this->pfa_ = $this->nmgp_dados_form['pfa_']; 
             $this->tipo_asig_ = $this->nmgp_dados_form['tipo_asig_']; 
             $this->dc6_ = $this->nmgp_dados_form['dc6_']; 
             $this->dc7_ = $this->nmgp_dados_form['dc7_']; 
             $this->dc8_ = $this->nmgp_dados_form['dc8_']; 
             $this->dc9_ = $this->nmgp_dados_form['dc9_']; 
             $this->ds4_ = $this->nmgp_dados_form['ds4_']; 
             $this->ds5_ = $this->nmgp_dados_form['ds5_']; 
             $this->dp4_ = $this->nmgp_dados_form['dp4_']; 
             $this->dp5_ = $this->nmgp_dados_form['dp5_']; 
             $this->inasistencia_p2_ = $this->nmgp_dados_form['inasistencia_p2_']; 
             $this->eval_2_per_ = $this->nmgp_dados_form['eval_2_per_']; 
             $this->dc1_2p_ = $this->nmgp_dados_form['dc1_2p_']; 
             $this->dc2_2p_ = $this->nmgp_dados_form['dc2_2p_']; 
             $this->dc3_2p_ = $this->nmgp_dados_form['dc3_2p_']; 
             $this->dc4_2p_ = $this->nmgp_dados_form['dc4_2p_']; 
             $this->dc5_2p_ = $this->nmgp_dados_form['dc5_2p_']; 
             $this->pcent_dc2_ = $this->nmgp_dados_form['pcent_dc2_']; 
             $this->ds1_2p_ = $this->nmgp_dados_form['ds1_2p_']; 
             $this->ds2_2p_ = $this->nmgp_dados_form['ds2_2p_']; 
             $this->ds3_2p_ = $this->nmgp_dados_form['ds3_2p_']; 
             $this->ds4_2p_ = $this->nmgp_dados_form['ds4_2p_']; 
             $this->ds5_2p_ = $this->nmgp_dados_form['ds5_2p_']; 
             $this->pcent_ds2_ = $this->nmgp_dados_form['pcent_ds2_']; 
             $this->dp1_2p_ = $this->nmgp_dados_form['dp1_2p_']; 
             $this->dp2_2p_ = $this->nmgp_dados_form['dp2_2p_']; 
             $this->dp3_2p_ = $this->nmgp_dados_form['dp3_2p_']; 
             $this->dp4_2p_ = $this->nmgp_dados_form['dp4_2p_']; 
             $this->dp5_2p_ = $this->nmgp_dados_form['dp5_2p_']; 
             $this->pcent_dp2_ = $this->nmgp_dados_form['pcent_dp2_']; 
             $this->aee_p2_ = $this->nmgp_dados_form['aee_p2_']; 
             $this->porcet_aee_p2_ = $this->nmgp_dados_form['porcet_aee_p2_']; 
             $this->inasistencia_p3_ = $this->nmgp_dados_form['inasistencia_p3_']; 
             $this->eval_3_per_ = $this->nmgp_dados_form['eval_3_per_']; 
             $this->dc1_3p_ = $this->nmgp_dados_form['dc1_3p_']; 
             $this->dc2_3p_ = $this->nmgp_dados_form['dc2_3p_']; 
             $this->dc3_3p_ = $this->nmgp_dados_form['dc3_3p_']; 
             $this->dc4_3p_ = $this->nmgp_dados_form['dc4_3p_']; 
             $this->dc5_3p_ = $this->nmgp_dados_form['dc5_3p_']; 
             $this->pcent_dc3_ = $this->nmgp_dados_form['pcent_dc3_']; 
             $this->ds1_p3_ = $this->nmgp_dados_form['ds1_p3_']; 
             $this->ds2_p3_ = $this->nmgp_dados_form['ds2_p3_']; 
             $this->ds3_p3_ = $this->nmgp_dados_form['ds3_p3_']; 
             $this->ds4_p3_ = $this->nmgp_dados_form['ds4_p3_']; 
             $this->ds5_p3_ = $this->nmgp_dados_form['ds5_p3_']; 
             $this->pcent_ds3_ = $this->nmgp_dados_form['pcent_ds3_']; 
             $this->dp1_p3_ = $this->nmgp_dados_form['dp1_p3_']; 
             $this->dp2_p3_ = $this->nmgp_dados_form['dp2_p3_']; 
             $this->dp3_p3_ = $this->nmgp_dados_form['dp3_p3_']; 
             $this->dp4_p3_ = $this->nmgp_dados_form['dp4_p3_']; 
             $this->sc_field_0_ = $this->nmgp_dados_form['sc_field_0_']; 
             $this->pcent_dp3_ = $this->nmgp_dados_form['pcent_dp3_']; 
             $this->aee_p3_ = $this->nmgp_dados_form['aee_p3_']; 
             $this->porcent_aee_p3_ = $this->nmgp_dados_form['porcent_aee_p3_']; 
             $this->inasistencia_p4_ = $this->nmgp_dados_form['inasistencia_p4_']; 
             $this->eval_4_per_ = $this->nmgp_dados_form['eval_4_per_']; 
             $this->dc1_p4_ = $this->nmgp_dados_form['dc1_p4_']; 
             $this->dc2_p4_ = $this->nmgp_dados_form['dc2_p4_']; 
             $this->dc3_p4_ = $this->nmgp_dados_form['dc3_p4_']; 
             $this->dc4_p4_ = $this->nmgp_dados_form['dc4_p4_']; 
             $this->dc5_p4_ = $this->nmgp_dados_form['dc5_p4_']; 
             $this->pcent_dc4_ = $this->nmgp_dados_form['pcent_dc4_']; 
             $this->ds1_p4_ = $this->nmgp_dados_form['ds1_p4_']; 
             $this->ds2_p4_ = $this->nmgp_dados_form['ds2_p4_']; 
             $this->ds3_p4_ = $this->nmgp_dados_form['ds3_p4_']; 
             $this->ds4_p4_ = $this->nmgp_dados_form['ds4_p4_']; 
             $this->ds5_p4_ = $this->nmgp_dados_form['ds5_p4_']; 
             $this->pcent_ds4_ = $this->nmgp_dados_form['pcent_ds4_']; 
             $this->dp1_p4_ = $this->nmgp_dados_form['dp1_p4_']; 
             $this->dp2_p4_ = $this->nmgp_dados_form['dp2_p4_']; 
             $this->dp3_p4_ = $this->nmgp_dados_form['dp3_p4_']; 
             $this->dp4_p4_ = $this->nmgp_dados_form['dp4_p4_']; 
             $this->dp5_p4_ = $this->nmgp_dados_form['dp5_p4_']; 
             $this->aee_p4_ = $this->nmgp_dados_form['aee_p4_']; 
             $this->porcent_aee_p4_ = $this->nmgp_dados_form['porcent_aee_p4_']; 
             $this->pcent_dp4_ = $this->nmgp_dados_form['pcent_dp4_']; 
             $this->eval_final_ = $this->nmgp_dados_form['eval_final_']; 
             $this->entorno_ = $this->nmgp_dados_form['entorno_']; 
             $this->estudiantes_ = $this->nmgp_dados_form['estudiantes_']; 
             $this->id_novedad_ = $this->nmgp_dados_form['id_novedad_']; 
             $this->nom_grupo_ = $this->nmgp_dados_form['nom_grupo_']; 
         }
         if (isset($this->id_estudiante_)) { $this->nm_limpa_alfa($this->id_estudiante_); }
         if (isset($this->novedad_)) { $this->nm_limpa_alfa($this->novedad_); }
         if (isset($this->estatus_)) { $this->nm_limpa_alfa($this->estatus_); }
         if (isset($this->inasistencia_p1_)) { $this->nm_limpa_alfa($this->inasistencia_p1_); }
         if (isset($this->eval_1_per_)) { $this->nm_limpa_alfa($this->eval_1_per_); }
         if (isset($this->dc1_)) { $this->nm_limpa_alfa($this->dc1_); }
         if (isset($this->dc2_)) { $this->nm_limpa_alfa($this->dc2_); }
         if (isset($this->dc3_)) { $this->nm_limpa_alfa($this->dc3_); }
         if (isset($this->dc4_)) { $this->nm_limpa_alfa($this->dc4_); }
         if (isset($this->dc5_)) { $this->nm_limpa_alfa($this->dc5_); }
         if (isset($this->pcent_dc_)) { $this->nm_limpa_alfa($this->pcent_dc_); }
         if (isset($this->ds1_)) { $this->nm_limpa_alfa($this->ds1_); }
         if (isset($this->ds2_)) { $this->nm_limpa_alfa($this->ds2_); }
         if (isset($this->ds3_)) { $this->nm_limpa_alfa($this->ds3_); }
         if (isset($this->pcent_ds_)) { $this->nm_limpa_alfa($this->pcent_ds_); }
         if (isset($this->dp1_)) { $this->nm_limpa_alfa($this->dp1_); }
         if (isset($this->dp2_)) { $this->nm_limpa_alfa($this->dp2_); }
         if (isset($this->dp3_)) { $this->nm_limpa_alfa($this->dp3_); }
         if (isset($this->pcent_dp_)) { $this->nm_limpa_alfa($this->pcent_dp_); }
         if (isset($this->aeep1_)) { $this->nm_limpa_alfa($this->aeep1_); }
         if (isset($this->porcent_aeep1_)) { $this->nm_limpa_alfa($this->porcent_aeep1_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_estudiante_'] =  $this->id_estudiante_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['estatus_'] =  $this->estatus_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['novedad_'] =  $this->novedad_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['asienta_inasistencias_'] =  $this->asienta_inasistencias_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p1_'] =  $this->inasistencia_p1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_1_per_'] =  $this->eval_1_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_'] =  $this->dc1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_'] =  $this->dc2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_'] =  $this->dc3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_'] =  $this->dc4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_'] =  $this->dc5_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc_'] =  $this->pcent_dc_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_'] =  $this->dp1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_'] =  $this->dp2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_'] =  $this->dp3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp_'] =  $this->pcent_dp_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_'] =  $this->ds1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_'] =  $this->ds2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_'] =  $this->ds3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds_'] =  $this->pcent_ds_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aeep1_'] =  $this->aeep1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcent_aeep1_'] =  $this->porcent_aeep1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['val_acumulada_'] =  $this->val_acumulada_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['val_requerida_'] =  $this->val_requerida_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['primer_apellido_'] =  $this->primer_apellido_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['segundo_apellido_'] =  $this->segundo_apellido_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['primer_nombre_'] =  $this->primer_nombre_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['segundo_nombre_'] =  $this->segundo_nombre_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_grupo_'] =  $this->id_grupo_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_area_'] =  $this->id_area_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_asignatura_'] =  $this->id_asignatura_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_grado_'] =  $this->id_grado_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_nivel_'] =  $this->id_nivel_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ihs_'] =  $this->ihs_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pfa_'] =  $this->pfa_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['tipo_asig_'] =  $this->tipo_asig_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc6_'] =  $this->dc6_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc7_'] =  $this->dc7_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc8_'] =  $this->dc8_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc9_'] =  $this->dc9_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_'] =  $this->ds4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_'] =  $this->ds5_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_'] =  $this->dp4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp5_'] =  $this->dp5_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p2_'] =  $this->inasistencia_p2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_2_per_'] =  $this->eval_2_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_2p_'] =  $this->dc1_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_2p_'] =  $this->dc2_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_2p_'] =  $this->dc3_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_2p_'] =  $this->dc4_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_2p_'] =  $this->dc5_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc2_'] =  $this->pcent_dc2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_2p_'] =  $this->ds1_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_2p_'] =  $this->ds2_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_2p_'] =  $this->ds3_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_2p_'] =  $this->ds4_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_2p_'] =  $this->ds5_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds2_'] =  $this->pcent_ds2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_2p_'] =  $this->dp1_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_2p_'] =  $this->dp2_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_2p_'] =  $this->dp3_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_2p_'] =  $this->dp4_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp5_2p_'] =  $this->dp5_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp2_'] =  $this->pcent_dp2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aee_p2_'] =  $this->aee_p2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcet_aee_p2_'] =  $this->porcet_aee_p2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p3_'] =  $this->inasistencia_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_3_per_'] =  $this->eval_3_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_3p_'] =  $this->dc1_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_3p_'] =  $this->dc2_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_3p_'] =  $this->dc3_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_3p_'] =  $this->dc4_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_3p_'] =  $this->dc5_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc3_'] =  $this->pcent_dc3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_p3_'] =  $this->ds1_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_p3_'] =  $this->ds2_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_p3_'] =  $this->ds3_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_p3_'] =  $this->ds4_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_p3_'] =  $this->ds5_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds3_'] =  $this->pcent_ds3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_p3_'] =  $this->dp1_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_p3_'] =  $this->dp2_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_p3_'] =  $this->dp3_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_p3_'] =  $this->dp4_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['sc_field_0_'] =  $this->sc_field_0_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp3_'] =  $this->pcent_dp3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aee_p3_'] =  $this->aee_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcent_aee_p3_'] =  $this->porcent_aee_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p4_'] =  $this->inasistencia_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_4_per_'] =  $this->eval_4_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_p4_'] =  $this->dc1_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_p4_'] =  $this->dc2_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_p4_'] =  $this->dc3_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_p4_'] =  $this->dc4_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_p4_'] =  $this->dc5_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc4_'] =  $this->pcent_dc4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_p4_'] =  $this->ds1_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_p4_'] =  $this->ds2_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_p4_'] =  $this->ds3_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_p4_'] =  $this->ds4_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_p4_'] =  $this->ds5_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds4_'] =  $this->pcent_ds4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_p4_'] =  $this->dp1_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_p4_'] =  $this->dp2_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_p4_'] =  $this->dp3_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_p4_'] =  $this->dp4_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp5_p4_'] =  $this->dp5_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aee_p4_'] =  $this->aee_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcent_aee_p4_'] =  $this->porcent_aee_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp4_'] =  $this->pcent_dp4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_final_'] =  $this->eval_final_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['entorno_'] =  $this->entorno_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['estudiantes_'] =  $this->estudiantes_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_novedad_'] =  $this->id_novedad_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['nom_grupo_'] =  $this->nom_grupo_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && (!$this->NM_ajax_flag || 'event_' != substr($this->NM_ajax_opcao, 0, 6))) 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt || $this->sc_teve_excl) 
          { 
              $this->sc_after_all_update = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          form_t_evaluacion_p1_m3_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_t_evaluacion_p1_m3);
          $this->NM_ajax_info['fldList']['id_estudiante_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['id_estudiante_']);
          $this->NM_ajax_info['fldList']['id_grupo_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['id_grupo_']);
          $this->NM_ajax_info['fldList']['id_asignatura_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['id_asignatura_']);
          $this->NM_close_db();
          form_t_evaluacion_p1_m3_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_aeep1__onblur' == $this->NM_ajax_opcao)
          {
              $this->aeep1__onBlur();
          }
          if ('event_dc1__onblur' == $this->NM_ajax_opcao)
          {
              $this->dc1__onBlur();
          }
          if ('event_dc2__onblur' == $this->NM_ajax_opcao)
          {
              $this->dc2__onBlur();
          }
          if ('event_dc3__onblur' == $this->NM_ajax_opcao)
          {
              $this->dc3__onBlur();
          }
          if ('event_dc4__onblur' == $this->NM_ajax_opcao)
          {
              $this->dc4__onBlur();
          }
          if ('event_dc5__onblur' == $this->NM_ajax_opcao)
          {
              $this->dc5__onBlur();
          }
          if ('event_dp1__onblur' == $this->NM_ajax_opcao)
          {
              $this->dp1__onBlur();
          }
          if ('event_dp2__onblur' == $this->NM_ajax_opcao)
          {
              $this->dp2__onBlur();
          }
          if ('event_dp3__onblur' == $this->NM_ajax_opcao)
          {
              $this->dp3__onBlur();
          }
          if ('event_dp4__onblur' == $this->NM_ajax_opcao)
          {
              $this->dp4__onBlur();
          }
          if ('event_dp5__onblur' == $this->NM_ajax_opcao)
          {
              $this->dp5__onBlur();
          }
          if ('event_ds1__onblur' == $this->NM_ajax_opcao)
          {
              $this->ds1__onBlur();
          }
          if ('event_ds2__onblur' == $this->NM_ajax_opcao)
          {
              $this->ds2__onBlur();
          }
          if ('event_ds3__onblur' == $this->NM_ajax_opcao)
          {
              $this->ds3__onBlur();
          }
          if ('event_ds4__onblur' == $this->NM_ajax_opcao)
          {
              $this->ds4__onBlur();
          }
          if ('event_ds5__onblur' == $this->NM_ajax_opcao)
          {
              $this->ds5__onBlur();
          }
          $this->NM_close_db();
          form_t_evaluacion_p1_m3_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_view'])
      { 
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['prt_view'] && in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
          { 
              $_SESSION['scriptcase']['charset_html'] = "utf-8";
          }
          ob_start();
      } 
      $this->nm_gera_html();
      $this->NM_close_db(); 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_view'])
      { 
          $this->NM_pdf_output();
      } 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_t_evaluacion_p1_m3_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->estatus_ = sc_strip_script($this->estatus_, $_SESSION['scriptcase']['charset']);
          $this->estatus_ = sc_strip_tags($this->estatus_, $_SESSION['scriptcase']['charset']);
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_view'])
      { 
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['prt_view'] && in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
          { 
              $_SESSION['scriptcase']['charset_html'] = "utf-8";
          }
          ob_start();
      } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_pdf_output()
   {
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_view'])
      { 
          $arq_pdf_in = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_form_t_evaluacion_p1_m3_html_" . session_id() . ".html";
          $url_pdf_in = $this->Ini->server_pdf . $this->Ini->path_imag_temp . "/sc_form_t_evaluacion_p1_m3_html_" . session_id() . ".html";
          $str_htm    =  ob_get_contents();
          ob_end_clean();
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['prt_view'])
          { 
              echo $str_htm ;
              exit;
          } 
          $arq_htm    =  fopen($arq_pdf_in, 'w');
          if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
          { 
              $_SESSION['scriptcase']['charset_html'] = (isset($this->Ini->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->Ini->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
              $str_htm = sc_convert_encoding($str_htm, "UTF-8",$_SESSION['scriptcase']['charset']);
          }
          fwrite($arq_htm, $str_htm); 
          fclose($arq_htm);
          $nm_arquivo_pdf_base = "/sc_pdf_" . date("YmdHis") . "_" . rand(0, 1000) . "form_t_evaluacion_p1_m3";
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_name']))
          {
              $nm_arquivo_pdf_base = str_replace(".pdf", "", $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_name']);
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_name']);
          }
          $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base . ".pdf";
          $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
          if (isset($this->nmgp_parms_pdf) && !empty($this->nmgp_parms_pdf))
          {
              $str_pd4ml    = $this->nmgp_parms_pdf;;
          }
          else
          {
              $str_pd4ml    = " --page-size A4 --orientation Landscape";
          }
          $arq_pdf_out  = (FALSE !== strpos($nm_arquivo_pdf_serv, ' ')) ? " \"$nm_arquivo_pdf_serv\"" : " $nm_arquivo_pdf_serv";
          $url_pdf_in   = (FALSE !== strpos($url_pdf_in, ' ')) ? " \"$url_pdf_in\"" : " $url_pdf_in";
          $Win_autentication = "";
          if (isset($_SESSION['sc_pdf_usr']) && !empty($_SESSION['sc_pdf_usr']))
          {
              $_SESSION['sc_iis_usr'] = $_SESSION['sc_pdf_usr'];
          }
          if (isset($_SESSION['sc_iis_usr']) && !empty($_SESSION['sc_iis_usr']))
          {
              $Win_autentication .= " --username " . $_SESSION['sc_iis_usr'];
          }
          if (isset($_SESSION['sc_pdf_pw']) && !empty($_SESSION['sc_pdf_pw']))
          {
              $_SESSION['sc_iis_pw'] = $_SESSION['sc_pdf_pw'];
          }
          if (isset($_SESSION['sc_iis_pw']) && !empty($_SESSION['sc_iis_pw']))
          {
              $Win_autentication .= " --password " . $_SESSION['sc_iis_pw'];
          }
          if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
          {
              chdir($this->Ini->path_third . "/wkhtmltopdf/win");
              $str_execcmd = 'wkhtmltopdf ' . $str_pd4ml . $Win_autentication . '  ' . $url_pdf_in . ' ' . $arq_pdf_out;
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
          {
              $url_pdf_in = str_replace("https://", "http://", $url_pdf_in);
              if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
              {
                  chdir($this->Ini->path_third . "/wkhtmltopdf/linux-i386");
                  $str_execcmd = './wkhtmltopdf-i386 ' . $str_pd4ml . $Win_autentication . '  ' . $url_pdf_in . ' ' . $arq_pdf_out;
              }
              else
              {
                  chdir($this->Ini->path_third . "/wkhtmltopdf/linux-amd64");
                  $str_execcmd = './wkhtmltopdf-amd64 ' . $str_pd4ml . $Win_autentication . '  ' . $url_pdf_in . ' ' . $arq_pdf_out;
              }
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin')) 
          {
              chdir($this->Ini->path_third . "/wkhtmltopdf/osx/Contents/MacOS");
              $str_execcmd = './wkhtmltopdf ' . $str_pd4ml . $Win_autentication . '  ' . $url_pdf_in . ' ' . $arq_pdf_out;
          }
          $arr_execcmd = array();
          exec($str_execcmd);
          // ----- PDF log
          $fp = @fopen($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_pdf_base . '.log', 'w');
          if ($fp)
          {
              @fwrite($fp, $str_execcmd . "\r\n\r\n");
              @fwrite($fp, implode("\r\n", $arr_execcmd));
              @fclose($fp);
          }
          $NM_pdfbase = $nm_arquivo_pdf_base . ".pdf";
          $NM_tit_doc = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_name'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['pdf_name'] : "form_t_evaluacion_p1_m3";
          $path_doc_md5 = md5($NM_pdfbase);
          $_SESSION['sc_session'][$this->Ini->sc_page][$NM_tit_doc][$path_doc_md5][0] = $this->Ini->path_imag_temp . $NM_pdfbase;
          $_SESSION['sc_session'][$this->Ini->sc_page][$NM_tit_doc][$path_doc_md5][1] = $NM_tit_doc . ".pdf";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("<FONT SIZE=4>ASIGNATURA: [asigna]</font>") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PDF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($nm_arquivo_pdf_url) ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_t_evaluacion_p1_m3_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_t_evaluacion_p1_m3"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
      } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'id_estudiante_':
               return "Id Estudiante";
               break;
           case 'estatus_':
               return "Est";
               break;
           case 'novedad_':
               return "Nov";
               break;
           case 'asienta_inasistencias_':
               return "AFA";
               break;
           case 'inasistencia_p1_':
               return "FAA";
               break;
           case 'eval_1_per_':
               return "1 Per";
               break;
           case 'dc1_':
               return "" . $_SESSION['par_cod_desemp'] . "";
               break;
           case 'dc2_':
               return "" . $_SESSION['par_cod_desemp2'] . "";
               break;
           case 'dc3_':
               return "" . $_SESSION['par_cod_desemp3'] . "";
               break;
           case 'dc4_':
               return "" . $_SESSION['par_cod_desemp4'] . "";
               break;
           case 'dc5_':
               return "" . $_SESSION['par_cod_desemp5'] . "";
               break;
           case 'pcent_dc_':
               return "" . $_SESSION['porcentaje_gr1'] . " %";
               break;
           case 'dp1_':
               return "Dp 1";
               break;
           case 'dp2_':
               return "Dp 2";
               break;
           case 'dp3_':
               return "Dp 3";
               break;
           case 'pcent_dp_':
               return "" . $_SESSION['porcentaje_gr2'] . " %";
               break;
           case 'ds1_':
               return "Ds 1";
               break;
           case 'ds2_':
               return "Ds 2";
               break;
           case 'ds3_':
               return "Ds 3";
               break;
           case 'pcent_ds_':
               return "" . $_SESSION['porcentaje_gr3'] . " %";
               break;
           case 'aeep1_':
               return "Aeep1";
               break;
           case 'porcent_aeep1_':
               return "" . $_SESSION['porcent_autoevaluacion'] . " %";
               break;
           case 'val_acumulada_':
               return "VaA";
               break;
           case 'val_requerida_':
               return "VaR";
               break;
           case 'primer_apellido_':
               return "Primer Apellido";
               break;
           case 'segundo_apellido_':
               return "Segundo Apellido";
               break;
           case 'primer_nombre_':
               return "Primer Nombre";
               break;
           case 'segundo_nombre_':
               return "Segundo Nombre";
               break;
           case 'id_grupo_':
               return "Id Grupo";
               break;
           case 'id_area_':
               return "Id Area";
               break;
           case 'id_asignatura_':
               return "Id Asignatura";
               break;
           case 'id_grado_':
               return "Id Grado";
               break;
           case 'id_nivel_':
               return "Id Nivel";
               break;
           case 'ihs_':
               return "Ihs";
               break;
           case 'pfa_':
               return "Pfa";
               break;
           case 'tipo_asig_':
               return "Tipo Asig";
               break;
           case 'dc6_':
               return "Dc 6";
               break;
           case 'dc7_':
               return "Dc 7";
               break;
           case 'dc8_':
               return "Dc 8";
               break;
           case 'dc9_':
               return "Dc 9";
               break;
           case 'ds4_':
               return "Ds 4";
               break;
           case 'ds5_':
               return "Ds 5";
               break;
           case 'dp4_':
               return "Dp 4";
               break;
           case 'dp5_':
               return "Dp 5";
               break;
           case 'inasistencia_p2_':
               return "Inasistencia P 2";
               break;
           case 'eval_2_per_':
               return "2 Per";
               break;
           case 'dc1_2p_':
               return "Dc 1 2p";
               break;
           case 'dc2_2p_':
               return "Dc 2 2p";
               break;
           case 'dc3_2p_':
               return "Dc 3 2p";
               break;
           case 'dc4_2p_':
               return "Dc 4 2p";
               break;
           case 'dc5_2p_':
               return "Dc 5 2p";
               break;
           case 'pcent_dc2_':
               return "Pcent Dc 2";
               break;
           case 'ds1_2p_':
               return "Ds 1 2p";
               break;
           case 'ds2_2p_':
               return "Ds 2 2p";
               break;
           case 'ds3_2p_':
               return "Ds 3 2p";
               break;
           case 'ds4_2p_':
               return "Ds 4 2p";
               break;
           case 'ds5_2p_':
               return "Ds 5 2p";
               break;
           case 'pcent_ds2_':
               return "Pcent Ds 2";
               break;
           case 'dp1_2p_':
               return "Dp 1 2p";
               break;
           case 'dp2_2p_':
               return "Dp 2 2p";
               break;
           case 'dp3_2p_':
               return "Dp 3 2p";
               break;
           case 'dp4_2p_':
               return "Dp 4 2p";
               break;
           case 'dp5_2p_':
               return "Dp 5 2p";
               break;
           case 'pcent_dp2_':
               return "Pcent Dp 2";
               break;
           case 'aee_p2_':
               return "Aee P 2";
               break;
           case 'porcet_aee_p2_':
               return "Porcet Aee P 2";
               break;
           case 'inasistencia_p3_':
               return "Inasistencia P 3";
               break;
           case 'eval_3_per_':
               return "3 Per";
               break;
           case 'dc1_3p_':
               return "Dc 1 3p";
               break;
           case 'dc2_3p_':
               return "Dc 2 3p";
               break;
           case 'dc3_3p_':
               return "Dc 3 3p";
               break;
           case 'dc4_3p_':
               return "Dc 4 3p";
               break;
           case 'dc5_3p_':
               return "Dc 5 3p";
               break;
           case 'pcent_dc3_':
               return "Pcent Dc 3";
               break;
           case 'ds1_p3_':
               return "Ds 1 P 3";
               break;
           case 'ds2_p3_':
               return "Ds 2 P 3";
               break;
           case 'ds3_p3_':
               return "Ds 3 P 3";
               break;
           case 'ds4_p3_':
               return "Ds 4 P 3";
               break;
           case 'ds5_p3_':
               return "Ds 5 P 3";
               break;
           case 'pcent_ds3_':
               return "Pcent Ds 3";
               break;
           case 'dp1_p3_':
               return "Dp 1 P 3";
               break;
           case 'dp2_p3_':
               return "Dp 2 P 3";
               break;
           case 'dp3_p3_':
               return "Dp 3 P 3";
               break;
           case 'dp4_p3_':
               return "Dp 4 P 3";
               break;
           case 'sc_field_0_':
               return "Dp 5 P 3";
               break;
           case 'pcent_dp3_':
               return "Pcent Dp 3";
               break;
           case 'aee_p3_':
               return "Aee P 3";
               break;
           case 'porcent_aee_p3_':
               return "Porcent Aee P 3";
               break;
           case 'inasistencia_p4_':
               return "Inasistencia P 4";
               break;
           case 'eval_4_per_':
               return "4 Per";
               break;
           case 'dc1_p4_':
               return "Dc 1 P 4";
               break;
           case 'dc2_p4_':
               return "Dc 2 P 4";
               break;
           case 'dc3_p4_':
               return "Dc 3 P 4";
               break;
           case 'dc4_p4_':
               return "Dc 4 P 4";
               break;
           case 'dc5_p4_':
               return "Dc 5 P 4";
               break;
           case 'pcent_dc4_':
               return "Pcent Dc 4";
               break;
           case 'ds1_p4_':
               return "Ds 1 P 4";
               break;
           case 'ds2_p4_':
               return "Ds 2 P 4";
               break;
           case 'ds3_p4_':
               return "Ds 3 P 4";
               break;
           case 'ds4_p4_':
               return "Ds 4 P 4";
               break;
           case 'ds5_p4_':
               return "Ds 5 P 4";
               break;
           case 'pcent_ds4_':
               return "Pcent Ds 4";
               break;
           case 'dp1_p4_':
               return "Dp 1 P 4";
               break;
           case 'dp2_p4_':
               return "Dp 2 P 4";
               break;
           case 'dp3_p4_':
               return "Dp 3 P 4";
               break;
           case 'dp4_p4_':
               return "Dp 4 P 4";
               break;
           case 'dp5_p4_':
               return "Dp 5 P 4";
               break;
           case 'aee_p4_':
               return "Aee P 4";
               break;
           case 'porcent_aee_p4_':
               return "Porcent Aee P 4";
               break;
           case 'pcent_dp4_':
               return "Pcent Dp 4";
               break;
           case 'eval_final_':
               return "Eval Final";
               break;
           case 'entorno_':
               return "Entorno";
               break;
           case 'estudiantes_':
               return "Estudiantes";
               break;
           case 'id_novedad_':
               return "id_novedad";
               break;
           case 'nom_grupo_':
               return "Grupo";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_t_evaluacion_p1_m3']) || !is_array($this->NM_ajax_info['errList']['geral_form_t_evaluacion_p1_m3']))
              {
                  $this->NM_ajax_info['errList']['geral_form_t_evaluacion_p1_m3'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_t_evaluacion_p1_m3'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id_estudiante_' == $filtro)
        $this->ValidateField_id_estudiante_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'estatus_' == $filtro)
        $this->ValidateField_estatus_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'novedad_' == $filtro)
        $this->ValidateField_novedad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'asienta_inasistencias_' == $filtro)
        $this->ValidateField_asienta_inasistencias_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'inasistencia_p1_' == $filtro)
        $this->ValidateField_inasistencia_p1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'eval_1_per_' == $filtro)
        $this->ValidateField_eval_1_per_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dc1_' == $filtro)
        $this->ValidateField_dc1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dc2_' == $filtro)
        $this->ValidateField_dc2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dc3_' == $filtro)
        $this->ValidateField_dc3_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dc4_' == $filtro)
        $this->ValidateField_dc4_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dc5_' == $filtro)
        $this->ValidateField_dc5_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pcent_dc_' == $filtro)
        $this->ValidateField_pcent_dc_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dp1_' == $filtro)
        $this->ValidateField_dp1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dp2_' == $filtro)
        $this->ValidateField_dp2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dp3_' == $filtro)
        $this->ValidateField_dp3_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pcent_dp_' == $filtro)
        $this->ValidateField_pcent_dp_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ds1_' == $filtro)
        $this->ValidateField_ds1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ds2_' == $filtro)
        $this->ValidateField_ds2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ds3_' == $filtro)
        $this->ValidateField_ds3_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pcent_ds_' == $filtro)
        $this->ValidateField_pcent_ds_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'aeep1_' == $filtro)
        $this->ValidateField_aeep1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'porcent_aeep1_' == $filtro)
        $this->ValidateField_porcent_aeep1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'val_acumulada_' == $filtro)
        $this->ValidateField_val_acumulada_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'val_requerida_' == $filtro)
        $this->ValidateField_val_requerida_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_id_estudiante_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->id_estudiante_ == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['php_cmp_required']['id_estudiante_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['php_cmp_required']['id_estudiante_'] == "on"))
      {
          $Campos_Falta[] = "Id Estudiante" ; 
          if (!isset($Campos_Erros['id_estudiante_']))
          {
              $Campos_Erros['id_estudiante_'] = array();
          }
          $Campos_Erros['id_estudiante_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['id_estudiante_']) || !is_array($this->NM_ajax_info['errList']['id_estudiante_']))
          {
              $this->NM_ajax_info['errList']['id_estudiante_'] = array();
          }
          $this->NM_ajax_info['errList']['id_estudiante_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->id_estudiante_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_']) && !in_array($this->id_estudiante_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['id_estudiante_']))
              {
                  $Campos_Erros['id_estudiante_'] = array();
              }
              $Campos_Erros['id_estudiante_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['id_estudiante_']) || !is_array($this->NM_ajax_info['errList']['id_estudiante_']))
              {
                  $this->NM_ajax_info['errList']['id_estudiante_'] = array();
              }
              $this->NM_ajax_info['errList']['id_estudiante_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
   }
    } // ValidateField_id_estudiante_

    function ValidateField_estatus_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->estatus_) > 2) 
          { 
              $Campos_Crit .= "Est " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['estatus_']))
              {
                  $Campos_Erros['estatus_'] = array();
              }
              $Campos_Erros['estatus_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['estatus_']) || !is_array($this->NM_ajax_info['errList']['estatus_']))
              {
                  $this->NM_ajax_info['errList']['estatus_'] = array();
              }
              $this->NM_ajax_info['errList']['estatus_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_estatus_

    function ValidateField_novedad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->novedad_) > 20) 
          { 
              $Campos_Crit .= "Nov " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['novedad_']))
              {
                  $Campos_Erros['novedad_'] = array();
              }
              $Campos_Erros['novedad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['novedad_']) || !is_array($this->NM_ajax_info['errList']['novedad_']))
              {
                  $this->NM_ajax_info['errList']['novedad_'] = array();
              }
              $this->NM_ajax_info['errList']['novedad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_novedad_

    function ValidateField_asienta_inasistencias_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->asienta_inasistencias_) != "")  
          { 
          } 
      } 
    } // ValidateField_asienta_inasistencias_

    function ValidateField_inasistencia_p1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->inasistencia_p1_ == "")  
      { 
          $this->inasistencia_p1_ = 0;
          $this->sc_force_zero[] = 'inasistencia_p1_';
      } 
      nm_limpa_numero($this->inasistencia_p1_, $this->field_config['inasistencia_p1_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->inasistencia_p1_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->inasistencia_p1_) > $iTestSize)  
              { 
                  $Campos_Crit .= "FAA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['inasistencia_p1_']))
                  {
                      $Campos_Erros['inasistencia_p1_'] = array();
                  }
                  $Campos_Erros['inasistencia_p1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['inasistencia_p1_']) || !is_array($this->NM_ajax_info['errList']['inasistencia_p1_']))
                  {
                      $this->NM_ajax_info['errList']['inasistencia_p1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['inasistencia_p1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->inasistencia_p1_, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "FAA; " ; 
                  if (!isset($Campos_Erros['inasistencia_p1_']))
                  {
                      $Campos_Erros['inasistencia_p1_'] = array();
                  }
                  $Campos_Erros['inasistencia_p1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['inasistencia_p1_']) || !is_array($this->NM_ajax_info['errList']['inasistencia_p1_']))
                  {
                      $this->NM_ajax_info['errList']['inasistencia_p1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['inasistencia_p1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_inasistencia_p1_

    function ValidateField_eval_1_per_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->eval_1_per_ == "")  
      { 
          $this->eval_1_per_ = 0;
          $this->sc_force_zero[] = 'eval_1_per_';
      } 
      if (!empty($this->field_config['eval_1_per_']['symbol_dec']))
      {
          nm_limpa_valor($this->eval_1_per_, $this->field_config['eval_1_per_']['symbol_dec'], $this->field_config['eval_1_per_']['symbol_grp']) ; 
          if ('.' == substr($this->eval_1_per_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->eval_1_per_, 1)))
              {
                  $this->eval_1_per_ = '';
              }
              else
              {
                  $this->eval_1_per_ = '0' . $this->eval_1_per_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->eval_1_per_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->eval_1_per_) > $iTestSize)  
              { 
                  $Campos_Crit .= "1 Per: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['eval_1_per_']))
                  {
                      $Campos_Erros['eval_1_per_'] = array();
                  }
                  $Campos_Erros['eval_1_per_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['eval_1_per_']) || !is_array($this->NM_ajax_info['errList']['eval_1_per_']))
                  {
                      $this->NM_ajax_info['errList']['eval_1_per_'] = array();
                  }
                  $this->NM_ajax_info['errList']['eval_1_per_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->eval_1_per_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "1 Per; " ; 
                  if (!isset($Campos_Erros['eval_1_per_']))
                  {
                      $Campos_Erros['eval_1_per_'] = array();
                  }
                  $Campos_Erros['eval_1_per_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['eval_1_per_']) || !is_array($this->NM_ajax_info['errList']['eval_1_per_']))
                  {
                      $this->NM_ajax_info['errList']['eval_1_per_'] = array();
                  }
                  $this->NM_ajax_info['errList']['eval_1_per_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_eval_1_per_

    function ValidateField_dc1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->dc1_ == "")  
      { 
          $this->dc1_ = 0;
          $this->sc_force_zero[] = 'dc1_';
      } 
      if (!empty($this->field_config['dc1_']['symbol_dec']))
      {
          nm_limpa_valor($this->dc1_, $this->field_config['dc1_']['symbol_dec'], $this->field_config['dc1_']['symbol_grp']) ; 
          if ('.' == substr($this->dc1_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dc1_, 1)))
              {
                  $this->dc1_ = '';
              }
              else
              {
                  $this->dc1_ = '0' . $this->dc1_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dc1_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dc1_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $_SESSION['par_cod_desemp'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dc1_']))
                  {
                      $Campos_Erros['dc1_'] = array();
                  }
                  $Campos_Erros['dc1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dc1_']) || !is_array($this->NM_ajax_info['errList']['dc1_']))
                  {
                      $this->NM_ajax_info['errList']['dc1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dc1_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $_SESSION['par_cod_desemp'] . "; " ; 
                  if (!isset($Campos_Erros['dc1_']))
                  {
                      $Campos_Erros['dc1_'] = array();
                  }
                  $Campos_Erros['dc1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dc1_']) || !is_array($this->NM_ajax_info['errList']['dc1_']))
                  {
                      $this->NM_ajax_info['errList']['dc1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_dc1_

    function ValidateField_dc2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->dc2_ == "")  
      { 
          $this->dc2_ = 0;
          $this->sc_force_zero[] = 'dc2_';
      } 
      if (!empty($this->field_config['dc2_']['symbol_dec']))
      {
          nm_limpa_valor($this->dc2_, $this->field_config['dc2_']['symbol_dec'], $this->field_config['dc2_']['symbol_grp']) ; 
          if ('.' == substr($this->dc2_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dc2_, 1)))
              {
                  $this->dc2_ = '';
              }
              else
              {
                  $this->dc2_ = '0' . $this->dc2_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dc2_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dc2_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $_SESSION['par_cod_desemp2'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dc2_']))
                  {
                      $Campos_Erros['dc2_'] = array();
                  }
                  $Campos_Erros['dc2_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dc2_']) || !is_array($this->NM_ajax_info['errList']['dc2_']))
                  {
                      $this->NM_ajax_info['errList']['dc2_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc2_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dc2_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $_SESSION['par_cod_desemp2'] . "; " ; 
                  if (!isset($Campos_Erros['dc2_']))
                  {
                      $Campos_Erros['dc2_'] = array();
                  }
                  $Campos_Erros['dc2_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dc2_']) || !is_array($this->NM_ajax_info['errList']['dc2_']))
                  {
                      $this->NM_ajax_info['errList']['dc2_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc2_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_dc2_

    function ValidateField_dc3_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->dc3_ == "")  
      { 
          $this->dc3_ = 0;
          $this->sc_force_zero[] = 'dc3_';
      } 
      if (!empty($this->field_config['dc3_']['symbol_dec']))
      {
          nm_limpa_valor($this->dc3_, $this->field_config['dc3_']['symbol_dec'], $this->field_config['dc3_']['symbol_grp']) ; 
          if ('.' == substr($this->dc3_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dc3_, 1)))
              {
                  $this->dc3_ = '';
              }
              else
              {
                  $this->dc3_ = '0' . $this->dc3_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dc3_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dc3_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $_SESSION['par_cod_desemp3'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dc3_']))
                  {
                      $Campos_Erros['dc3_'] = array();
                  }
                  $Campos_Erros['dc3_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dc3_']) || !is_array($this->NM_ajax_info['errList']['dc3_']))
                  {
                      $this->NM_ajax_info['errList']['dc3_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc3_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dc3_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $_SESSION['par_cod_desemp3'] . "; " ; 
                  if (!isset($Campos_Erros['dc3_']))
                  {
                      $Campos_Erros['dc3_'] = array();
                  }
                  $Campos_Erros['dc3_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dc3_']) || !is_array($this->NM_ajax_info['errList']['dc3_']))
                  {
                      $this->NM_ajax_info['errList']['dc3_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc3_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_dc3_

    function ValidateField_dc4_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->dc4_ == "")  
      { 
          $this->dc4_ = 0;
          $this->sc_force_zero[] = 'dc4_';
      } 
      if (!empty($this->field_config['dc4_']['symbol_dec']))
      {
          nm_limpa_valor($this->dc4_, $this->field_config['dc4_']['symbol_dec'], $this->field_config['dc4_']['symbol_grp']) ; 
          if ('.' == substr($this->dc4_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dc4_, 1)))
              {
                  $this->dc4_ = '';
              }
              else
              {
                  $this->dc4_ = '0' . $this->dc4_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dc4_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dc4_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $_SESSION['par_cod_desemp4'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dc4_']))
                  {
                      $Campos_Erros['dc4_'] = array();
                  }
                  $Campos_Erros['dc4_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dc4_']) || !is_array($this->NM_ajax_info['errList']['dc4_']))
                  {
                      $this->NM_ajax_info['errList']['dc4_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc4_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dc4_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $_SESSION['par_cod_desemp4'] . "; " ; 
                  if (!isset($Campos_Erros['dc4_']))
                  {
                      $Campos_Erros['dc4_'] = array();
                  }
                  $Campos_Erros['dc4_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dc4_']) || !is_array($this->NM_ajax_info['errList']['dc4_']))
                  {
                      $this->NM_ajax_info['errList']['dc4_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc4_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_dc4_

    function ValidateField_dc5_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->dc5_ == "")  
      { 
          $this->dc5_ = 0;
          $this->sc_force_zero[] = 'dc5_';
      } 
      if (!empty($this->field_config['dc5_']['symbol_dec']))
      {
          nm_limpa_valor($this->dc5_, $this->field_config['dc5_']['symbol_dec'], $this->field_config['dc5_']['symbol_grp']) ; 
          if ('.' == substr($this->dc5_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dc5_, 1)))
              {
                  $this->dc5_ = '';
              }
              else
              {
                  $this->dc5_ = '0' . $this->dc5_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dc5_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dc5_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $_SESSION['par_cod_desemp5'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dc5_']))
                  {
                      $Campos_Erros['dc5_'] = array();
                  }
                  $Campos_Erros['dc5_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dc5_']) || !is_array($this->NM_ajax_info['errList']['dc5_']))
                  {
                      $this->NM_ajax_info['errList']['dc5_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc5_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dc5_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $_SESSION['par_cod_desemp5'] . "; " ; 
                  if (!isset($Campos_Erros['dc5_']))
                  {
                      $Campos_Erros['dc5_'] = array();
                  }
                  $Campos_Erros['dc5_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dc5_']) || !is_array($this->NM_ajax_info['errList']['dc5_']))
                  {
                      $this->NM_ajax_info['errList']['dc5_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc5_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_dc5_

    function ValidateField_pcent_dc_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->pcent_dc_ == "")  
      { 
          $this->pcent_dc_ = 0;
          $this->sc_force_zero[] = 'pcent_dc_';
      } 
      if (!empty($this->field_config['pcent_dc_']['symbol_dec']))
      {
          nm_limpa_valor($this->pcent_dc_, $this->field_config['pcent_dc_']['symbol_dec'], $this->field_config['pcent_dc_']['symbol_grp']) ; 
          if ('.' == substr($this->pcent_dc_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->pcent_dc_, 1)))
              {
                  $this->pcent_dc_ = '';
              }
              else
              {
                  $this->pcent_dc_ = '0' . $this->pcent_dc_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->pcent_dc_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->pcent_dc_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $_SESSION['porcentaje_gr1'] . " %: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['pcent_dc_']))
                  {
                      $Campos_Erros['pcent_dc_'] = array();
                  }
                  $Campos_Erros['pcent_dc_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['pcent_dc_']) || !is_array($this->NM_ajax_info['errList']['pcent_dc_']))
                  {
                      $this->NM_ajax_info['errList']['pcent_dc_'] = array();
                  }
                  $this->NM_ajax_info['errList']['pcent_dc_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->pcent_dc_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $_SESSION['porcentaje_gr1'] . " %; " ; 
                  if (!isset($Campos_Erros['pcent_dc_']))
                  {
                      $Campos_Erros['pcent_dc_'] = array();
                  }
                  $Campos_Erros['pcent_dc_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['pcent_dc_']) || !is_array($this->NM_ajax_info['errList']['pcent_dc_']))
                  {
                      $this->NM_ajax_info['errList']['pcent_dc_'] = array();
                  }
                  $this->NM_ajax_info['errList']['pcent_dc_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_pcent_dc_

    function ValidateField_dp1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->dp1_ == "")  
      { 
          $this->dp1_ = 0;
          $this->sc_force_zero[] = 'dp1_';
      } 
      if (!empty($this->field_config['dp1_']['symbol_dec']))
      {
          nm_limpa_valor($this->dp1_, $this->field_config['dp1_']['symbol_dec'], $this->field_config['dp1_']['symbol_grp']) ; 
          if ('.' == substr($this->dp1_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dp1_, 1)))
              {
                  $this->dp1_ = '';
              }
              else
              {
                  $this->dp1_ = '0' . $this->dp1_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dp1_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dp1_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Dp 1: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dp1_']))
                  {
                      $Campos_Erros['dp1_'] = array();
                  }
                  $Campos_Erros['dp1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dp1_']) || !is_array($this->NM_ajax_info['errList']['dp1_']))
                  {
                      $this->NM_ajax_info['errList']['dp1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dp1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dp1_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Dp 1; " ; 
                  if (!isset($Campos_Erros['dp1_']))
                  {
                      $Campos_Erros['dp1_'] = array();
                  }
                  $Campos_Erros['dp1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dp1_']) || !is_array($this->NM_ajax_info['errList']['dp1_']))
                  {
                      $this->NM_ajax_info['errList']['dp1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dp1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_dp1_

    function ValidateField_dp2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->dp2_ == "")  
      { 
          $this->dp2_ = 0;
          $this->sc_force_zero[] = 'dp2_';
      } 
      if (!empty($this->field_config['dp2_']['symbol_dec']))
      {
          nm_limpa_valor($this->dp2_, $this->field_config['dp2_']['symbol_dec'], $this->field_config['dp2_']['symbol_grp']) ; 
          if ('.' == substr($this->dp2_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dp2_, 1)))
              {
                  $this->dp2_ = '';
              }
              else
              {
                  $this->dp2_ = '0' . $this->dp2_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dp2_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dp2_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Dp 2: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dp2_']))
                  {
                      $Campos_Erros['dp2_'] = array();
                  }
                  $Campos_Erros['dp2_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dp2_']) || !is_array($this->NM_ajax_info['errList']['dp2_']))
                  {
                      $this->NM_ajax_info['errList']['dp2_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dp2_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dp2_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Dp 2; " ; 
                  if (!isset($Campos_Erros['dp2_']))
                  {
                      $Campos_Erros['dp2_'] = array();
                  }
                  $Campos_Erros['dp2_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dp2_']) || !is_array($this->NM_ajax_info['errList']['dp2_']))
                  {
                      $this->NM_ajax_info['errList']['dp2_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dp2_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_dp2_

    function ValidateField_dp3_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->dp3_ == "")  
      { 
          $this->dp3_ = 0;
          $this->sc_force_zero[] = 'dp3_';
      } 
      if (!empty($this->field_config['dp3_']['symbol_dec']))
      {
          nm_limpa_valor($this->dp3_, $this->field_config['dp3_']['symbol_dec'], $this->field_config['dp3_']['symbol_grp']) ; 
          if ('.' == substr($this->dp3_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dp3_, 1)))
              {
                  $this->dp3_ = '';
              }
              else
              {
                  $this->dp3_ = '0' . $this->dp3_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dp3_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dp3_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Dp 3: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dp3_']))
                  {
                      $Campos_Erros['dp3_'] = array();
                  }
                  $Campos_Erros['dp3_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dp3_']) || !is_array($this->NM_ajax_info['errList']['dp3_']))
                  {
                      $this->NM_ajax_info['errList']['dp3_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dp3_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dp3_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Dp 3; " ; 
                  if (!isset($Campos_Erros['dp3_']))
                  {
                      $Campos_Erros['dp3_'] = array();
                  }
                  $Campos_Erros['dp3_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dp3_']) || !is_array($this->NM_ajax_info['errList']['dp3_']))
                  {
                      $this->NM_ajax_info['errList']['dp3_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dp3_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_dp3_

    function ValidateField_pcent_dp_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->pcent_dp_ == "")  
      { 
          $this->pcent_dp_ = 0;
          $this->sc_force_zero[] = 'pcent_dp_';
      } 
      if (!empty($this->field_config['pcent_dp_']['symbol_dec']))
      {
          nm_limpa_valor($this->pcent_dp_, $this->field_config['pcent_dp_']['symbol_dec'], $this->field_config['pcent_dp_']['symbol_grp']) ; 
          if ('.' == substr($this->pcent_dp_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->pcent_dp_, 1)))
              {
                  $this->pcent_dp_ = '';
              }
              else
              {
                  $this->pcent_dp_ = '0' . $this->pcent_dp_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->pcent_dp_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->pcent_dp_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $_SESSION['porcentaje_gr2'] . " %: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['pcent_dp_']))
                  {
                      $Campos_Erros['pcent_dp_'] = array();
                  }
                  $Campos_Erros['pcent_dp_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['pcent_dp_']) || !is_array($this->NM_ajax_info['errList']['pcent_dp_']))
                  {
                      $this->NM_ajax_info['errList']['pcent_dp_'] = array();
                  }
                  $this->NM_ajax_info['errList']['pcent_dp_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->pcent_dp_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $_SESSION['porcentaje_gr2'] . " %; " ; 
                  if (!isset($Campos_Erros['pcent_dp_']))
                  {
                      $Campos_Erros['pcent_dp_'] = array();
                  }
                  $Campos_Erros['pcent_dp_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['pcent_dp_']) || !is_array($this->NM_ajax_info['errList']['pcent_dp_']))
                  {
                      $this->NM_ajax_info['errList']['pcent_dp_'] = array();
                  }
                  $this->NM_ajax_info['errList']['pcent_dp_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_pcent_dp_

    function ValidateField_ds1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->ds1_ == "")  
      { 
          $this->ds1_ = 0;
          $this->sc_force_zero[] = 'ds1_';
      } 
      if (!empty($this->field_config['ds1_']['symbol_dec']))
      {
          nm_limpa_valor($this->ds1_, $this->field_config['ds1_']['symbol_dec'], $this->field_config['ds1_']['symbol_grp']) ; 
          if ('.' == substr($this->ds1_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->ds1_, 1)))
              {
                  $this->ds1_ = '';
              }
              else
              {
                  $this->ds1_ = '0' . $this->ds1_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ds1_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->ds1_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Ds 1: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ds1_']))
                  {
                      $Campos_Erros['ds1_'] = array();
                  }
                  $Campos_Erros['ds1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ds1_']) || !is_array($this->NM_ajax_info['errList']['ds1_']))
                  {
                      $this->NM_ajax_info['errList']['ds1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['ds1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ds1_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Ds 1; " ; 
                  if (!isset($Campos_Erros['ds1_']))
                  {
                      $Campos_Erros['ds1_'] = array();
                  }
                  $Campos_Erros['ds1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ds1_']) || !is_array($this->NM_ajax_info['errList']['ds1_']))
                  {
                      $this->NM_ajax_info['errList']['ds1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['ds1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_ds1_

    function ValidateField_ds2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->ds2_ == "")  
      { 
          $this->ds2_ = 0;
          $this->sc_force_zero[] = 'ds2_';
      } 
      if (!empty($this->field_config['ds2_']['symbol_dec']))
      {
          nm_limpa_valor($this->ds2_, $this->field_config['ds2_']['symbol_dec'], $this->field_config['ds2_']['symbol_grp']) ; 
          if ('.' == substr($this->ds2_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->ds2_, 1)))
              {
                  $this->ds2_ = '';
              }
              else
              {
                  $this->ds2_ = '0' . $this->ds2_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ds2_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->ds2_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Ds 2: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ds2_']))
                  {
                      $Campos_Erros['ds2_'] = array();
                  }
                  $Campos_Erros['ds2_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ds2_']) || !is_array($this->NM_ajax_info['errList']['ds2_']))
                  {
                      $this->NM_ajax_info['errList']['ds2_'] = array();
                  }
                  $this->NM_ajax_info['errList']['ds2_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ds2_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Ds 2; " ; 
                  if (!isset($Campos_Erros['ds2_']))
                  {
                      $Campos_Erros['ds2_'] = array();
                  }
                  $Campos_Erros['ds2_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ds2_']) || !is_array($this->NM_ajax_info['errList']['ds2_']))
                  {
                      $this->NM_ajax_info['errList']['ds2_'] = array();
                  }
                  $this->NM_ajax_info['errList']['ds2_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_ds2_

    function ValidateField_ds3_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->ds3_ == "")  
      { 
          $this->ds3_ = 0;
          $this->sc_force_zero[] = 'ds3_';
      } 
      if (!empty($this->field_config['ds3_']['symbol_dec']))
      {
          nm_limpa_valor($this->ds3_, $this->field_config['ds3_']['symbol_dec'], $this->field_config['ds3_']['symbol_grp']) ; 
          if ('.' == substr($this->ds3_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->ds3_, 1)))
              {
                  $this->ds3_ = '';
              }
              else
              {
                  $this->ds3_ = '0' . $this->ds3_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ds3_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->ds3_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Ds 3: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ds3_']))
                  {
                      $Campos_Erros['ds3_'] = array();
                  }
                  $Campos_Erros['ds3_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ds3_']) || !is_array($this->NM_ajax_info['errList']['ds3_']))
                  {
                      $this->NM_ajax_info['errList']['ds3_'] = array();
                  }
                  $this->NM_ajax_info['errList']['ds3_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ds3_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Ds 3; " ; 
                  if (!isset($Campos_Erros['ds3_']))
                  {
                      $Campos_Erros['ds3_'] = array();
                  }
                  $Campos_Erros['ds3_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ds3_']) || !is_array($this->NM_ajax_info['errList']['ds3_']))
                  {
                      $this->NM_ajax_info['errList']['ds3_'] = array();
                  }
                  $this->NM_ajax_info['errList']['ds3_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_ds3_

    function ValidateField_pcent_ds_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->pcent_ds_ == "")  
      { 
          $this->pcent_ds_ = 0;
          $this->sc_force_zero[] = 'pcent_ds_';
      } 
      if (!empty($this->field_config['pcent_ds_']['symbol_dec']))
      {
          nm_limpa_valor($this->pcent_ds_, $this->field_config['pcent_ds_']['symbol_dec'], $this->field_config['pcent_ds_']['symbol_grp']) ; 
          if ('.' == substr($this->pcent_ds_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->pcent_ds_, 1)))
              {
                  $this->pcent_ds_ = '';
              }
              else
              {
                  $this->pcent_ds_ = '0' . $this->pcent_ds_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->pcent_ds_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->pcent_ds_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $_SESSION['porcentaje_gr3'] . " %: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['pcent_ds_']))
                  {
                      $Campos_Erros['pcent_ds_'] = array();
                  }
                  $Campos_Erros['pcent_ds_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['pcent_ds_']) || !is_array($this->NM_ajax_info['errList']['pcent_ds_']))
                  {
                      $this->NM_ajax_info['errList']['pcent_ds_'] = array();
                  }
                  $this->NM_ajax_info['errList']['pcent_ds_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->pcent_ds_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $_SESSION['porcentaje_gr3'] . " %; " ; 
                  if (!isset($Campos_Erros['pcent_ds_']))
                  {
                      $Campos_Erros['pcent_ds_'] = array();
                  }
                  $Campos_Erros['pcent_ds_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['pcent_ds_']) || !is_array($this->NM_ajax_info['errList']['pcent_ds_']))
                  {
                      $this->NM_ajax_info['errList']['pcent_ds_'] = array();
                  }
                  $this->NM_ajax_info['errList']['pcent_ds_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_pcent_ds_

    function ValidateField_aeep1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->aeep1_ == "")  
      { 
          $this->aeep1_ = 0;
          $this->sc_force_zero[] = 'aeep1_';
      } 
      if (!empty($this->field_config['aeep1_']['symbol_dec']))
      {
          nm_limpa_valor($this->aeep1_, $this->field_config['aeep1_']['symbol_dec'], $this->field_config['aeep1_']['symbol_grp']) ; 
          if ('.' == substr($this->aeep1_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->aeep1_, 1)))
              {
                  $this->aeep1_ = '';
              }
              else
              {
                  $this->aeep1_ = '0' . $this->aeep1_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->aeep1_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->aeep1_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Aeep1: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['aeep1_']))
                  {
                      $Campos_Erros['aeep1_'] = array();
                  }
                  $Campos_Erros['aeep1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['aeep1_']) || !is_array($this->NM_ajax_info['errList']['aeep1_']))
                  {
                      $this->NM_ajax_info['errList']['aeep1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['aeep1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->aeep1_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Aeep1; " ; 
                  if (!isset($Campos_Erros['aeep1_']))
                  {
                      $Campos_Erros['aeep1_'] = array();
                  }
                  $Campos_Erros['aeep1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['aeep1_']) || !is_array($this->NM_ajax_info['errList']['aeep1_']))
                  {
                      $this->NM_ajax_info['errList']['aeep1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['aeep1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_aeep1_

    function ValidateField_porcent_aeep1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->porcent_aeep1_ == "")  
      { 
          $this->porcent_aeep1_ = 0;
          $this->sc_force_zero[] = 'porcent_aeep1_';
      } 
      if (!empty($this->field_config['porcent_aeep1_']['symbol_dec']))
      {
          nm_limpa_valor($this->porcent_aeep1_, $this->field_config['porcent_aeep1_']['symbol_dec'], $this->field_config['porcent_aeep1_']['symbol_grp']) ; 
          if ('.' == substr($this->porcent_aeep1_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->porcent_aeep1_, 1)))
              {
                  $this->porcent_aeep1_ = '';
              }
              else
              {
                  $this->porcent_aeep1_ = '0' . $this->porcent_aeep1_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->porcent_aeep1_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->porcent_aeep1_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $_SESSION['porcent_autoevaluacion'] . " %: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['porcent_aeep1_']))
                  {
                      $Campos_Erros['porcent_aeep1_'] = array();
                  }
                  $Campos_Erros['porcent_aeep1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['porcent_aeep1_']) || !is_array($this->NM_ajax_info['errList']['porcent_aeep1_']))
                  {
                      $this->NM_ajax_info['errList']['porcent_aeep1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['porcent_aeep1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->porcent_aeep1_, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $_SESSION['porcent_autoevaluacion'] . " %; " ; 
                  if (!isset($Campos_Erros['porcent_aeep1_']))
                  {
                      $Campos_Erros['porcent_aeep1_'] = array();
                  }
                  $Campos_Erros['porcent_aeep1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['porcent_aeep1_']) || !is_array($this->NM_ajax_info['errList']['porcent_aeep1_']))
                  {
                      $this->NM_ajax_info['errList']['porcent_aeep1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['porcent_aeep1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_porcent_aeep1_

    function ValidateField_val_acumulada_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->val_acumulada_ == "")  
      { 
          $this->val_acumulada_ = 0;
          $this->sc_force_zero[] = 'val_acumulada_';
      } 
      if (!empty($this->field_config['val_acumulada_']['symbol_dec']))
      {
          nm_limpa_valor($this->val_acumulada_, $this->field_config['val_acumulada_']['symbol_dec'], $this->field_config['val_acumulada_']['symbol_grp']) ; 
          if ('.' == substr($this->val_acumulada_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->val_acumulada_, 1)))
              {
                  $this->val_acumulada_ = '';
              }
              else
              {
                  $this->val_acumulada_ = '0' . $this->val_acumulada_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->val_acumulada_ != '')  
          { 
              $iTestSize = 21;
              if (strlen($this->val_acumulada_) > $iTestSize)  
              { 
                  $Campos_Crit .= "VaA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['val_acumulada_']))
                  {
                      $Campos_Erros['val_acumulada_'] = array();
                  }
                  $Campos_Erros['val_acumulada_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['val_acumulada_']) || !is_array($this->NM_ajax_info['errList']['val_acumulada_']))
                  {
                      $this->NM_ajax_info['errList']['val_acumulada_'] = array();
                  }
                  $this->NM_ajax_info['errList']['val_acumulada_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->val_acumulada_, 20, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "VaA; " ; 
                  if (!isset($Campos_Erros['val_acumulada_']))
                  {
                      $Campos_Erros['val_acumulada_'] = array();
                  }
                  $Campos_Erros['val_acumulada_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['val_acumulada_']) || !is_array($this->NM_ajax_info['errList']['val_acumulada_']))
                  {
                      $this->NM_ajax_info['errList']['val_acumulada_'] = array();
                  }
                  $this->NM_ajax_info['errList']['val_acumulada_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_val_acumulada_

    function ValidateField_val_requerida_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->val_requerida_ == "")  
      { 
          $this->val_requerida_ = 0;
          $this->sc_force_zero[] = 'val_requerida_';
      } 
      if (!empty($this->field_config['val_requerida_']['symbol_dec']))
      {
          nm_limpa_valor($this->val_requerida_, $this->field_config['val_requerida_']['symbol_dec'], $this->field_config['val_requerida_']['symbol_grp']) ; 
          if ('.' == substr($this->val_requerida_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->val_requerida_, 1)))
              {
                  $this->val_requerida_ = '';
              }
              else
              {
                  $this->val_requerida_ = '0' . $this->val_requerida_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->val_requerida_ != '')  
          { 
              $iTestSize = 21;
              if (strlen($this->val_requerida_) > $iTestSize)  
              { 
                  $Campos_Crit .= "VaR: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['val_requerida_']))
                  {
                      $Campos_Erros['val_requerida_'] = array();
                  }
                  $Campos_Erros['val_requerida_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['val_requerida_']) || !is_array($this->NM_ajax_info['errList']['val_requerida_']))
                  {
                      $this->NM_ajax_info['errList']['val_requerida_'] = array();
                  }
                  $this->NM_ajax_info['errList']['val_requerida_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->val_requerida_, 20, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "VaR; " ; 
                  if (!isset($Campos_Erros['val_requerida_']))
                  {
                      $Campos_Erros['val_requerida_'] = array();
                  }
                  $Campos_Erros['val_requerida_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['val_requerida_']) || !is_array($this->NM_ajax_info['errList']['val_requerida_']))
                  {
                      $this->NM_ajax_info['errList']['val_requerida_'] = array();
                  }
                  $this->NM_ajax_info['errList']['val_requerida_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_val_requerida_

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['id_estudiante_'] = $this->id_estudiante_;
    $this->nmgp_dados_form['estatus_'] = $this->estatus_;
    $this->nmgp_dados_form['novedad_'] = $this->novedad_;
    $this->nmgp_dados_form['asienta_inasistencias_'] = $this->asienta_inasistencias_;
    $this->nmgp_dados_form['inasistencia_p1_'] = $this->inasistencia_p1_;
    $this->nmgp_dados_form['eval_1_per_'] = $this->eval_1_per_;
    $this->nmgp_dados_form['dc1_'] = $this->dc1_;
    $this->nmgp_dados_form['dc2_'] = $this->dc2_;
    $this->nmgp_dados_form['dc3_'] = $this->dc3_;
    $this->nmgp_dados_form['dc4_'] = $this->dc4_;
    $this->nmgp_dados_form['dc5_'] = $this->dc5_;
    $this->nmgp_dados_form['pcent_dc_'] = $this->pcent_dc_;
    $this->nmgp_dados_form['dp1_'] = $this->dp1_;
    $this->nmgp_dados_form['dp2_'] = $this->dp2_;
    $this->nmgp_dados_form['dp3_'] = $this->dp3_;
    $this->nmgp_dados_form['pcent_dp_'] = $this->pcent_dp_;
    $this->nmgp_dados_form['ds1_'] = $this->ds1_;
    $this->nmgp_dados_form['ds2_'] = $this->ds2_;
    $this->nmgp_dados_form['ds3_'] = $this->ds3_;
    $this->nmgp_dados_form['pcent_ds_'] = $this->pcent_ds_;
    $this->nmgp_dados_form['aeep1_'] = $this->aeep1_;
    $this->nmgp_dados_form['porcent_aeep1_'] = $this->porcent_aeep1_;
    $this->nmgp_dados_form['val_acumulada_'] = $this->val_acumulada_;
    $this->nmgp_dados_form['val_requerida_'] = $this->val_requerida_;
    $this->nmgp_dados_form['primer_apellido_'] = $this->primer_apellido_;
    $this->nmgp_dados_form['segundo_apellido_'] = $this->segundo_apellido_;
    $this->nmgp_dados_form['primer_nombre_'] = $this->primer_nombre_;
    $this->nmgp_dados_form['segundo_nombre_'] = $this->segundo_nombre_;
    $this->nmgp_dados_form['id_grupo_'] = $this->id_grupo_;
    $this->nmgp_dados_form['id_area_'] = $this->id_area_;
    $this->nmgp_dados_form['id_asignatura_'] = $this->id_asignatura_;
    $this->nmgp_dados_form['id_grado_'] = $this->id_grado_;
    $this->nmgp_dados_form['id_nivel_'] = $this->id_nivel_;
    $this->nmgp_dados_form['ihs_'] = $this->ihs_;
    $this->nmgp_dados_form['pfa_'] = $this->pfa_;
    $this->nmgp_dados_form['tipo_asig_'] = $this->tipo_asig_;
    $this->nmgp_dados_form['dc6_'] = $this->dc6_;
    $this->nmgp_dados_form['dc7_'] = $this->dc7_;
    $this->nmgp_dados_form['dc8_'] = $this->dc8_;
    $this->nmgp_dados_form['dc9_'] = $this->dc9_;
    $this->nmgp_dados_form['ds4_'] = $this->ds4_;
    $this->nmgp_dados_form['ds5_'] = $this->ds5_;
    $this->nmgp_dados_form['dp4_'] = $this->dp4_;
    $this->nmgp_dados_form['dp5_'] = $this->dp5_;
    $this->nmgp_dados_form['inasistencia_p2_'] = $this->inasistencia_p2_;
    $this->nmgp_dados_form['eval_2_per_'] = $this->eval_2_per_;
    $this->nmgp_dados_form['dc1_2p_'] = $this->dc1_2p_;
    $this->nmgp_dados_form['dc2_2p_'] = $this->dc2_2p_;
    $this->nmgp_dados_form['dc3_2p_'] = $this->dc3_2p_;
    $this->nmgp_dados_form['dc4_2p_'] = $this->dc4_2p_;
    $this->nmgp_dados_form['dc5_2p_'] = $this->dc5_2p_;
    $this->nmgp_dados_form['pcent_dc2_'] = $this->pcent_dc2_;
    $this->nmgp_dados_form['ds1_2p_'] = $this->ds1_2p_;
    $this->nmgp_dados_form['ds2_2p_'] = $this->ds2_2p_;
    $this->nmgp_dados_form['ds3_2p_'] = $this->ds3_2p_;
    $this->nmgp_dados_form['ds4_2p_'] = $this->ds4_2p_;
    $this->nmgp_dados_form['ds5_2p_'] = $this->ds5_2p_;
    $this->nmgp_dados_form['pcent_ds2_'] = $this->pcent_ds2_;
    $this->nmgp_dados_form['dp1_2p_'] = $this->dp1_2p_;
    $this->nmgp_dados_form['dp2_2p_'] = $this->dp2_2p_;
    $this->nmgp_dados_form['dp3_2p_'] = $this->dp3_2p_;
    $this->nmgp_dados_form['dp4_2p_'] = $this->dp4_2p_;
    $this->nmgp_dados_form['dp5_2p_'] = $this->dp5_2p_;
    $this->nmgp_dados_form['pcent_dp2_'] = $this->pcent_dp2_;
    $this->nmgp_dados_form['aee_p2_'] = $this->aee_p2_;
    $this->nmgp_dados_form['porcet_aee_p2_'] = $this->porcet_aee_p2_;
    $this->nmgp_dados_form['inasistencia_p3_'] = $this->inasistencia_p3_;
    $this->nmgp_dados_form['eval_3_per_'] = $this->eval_3_per_;
    $this->nmgp_dados_form['dc1_3p_'] = $this->dc1_3p_;
    $this->nmgp_dados_form['dc2_3p_'] = $this->dc2_3p_;
    $this->nmgp_dados_form['dc3_3p_'] = $this->dc3_3p_;
    $this->nmgp_dados_form['dc4_3p_'] = $this->dc4_3p_;
    $this->nmgp_dados_form['dc5_3p_'] = $this->dc5_3p_;
    $this->nmgp_dados_form['pcent_dc3_'] = $this->pcent_dc3_;
    $this->nmgp_dados_form['ds1_p3_'] = $this->ds1_p3_;
    $this->nmgp_dados_form['ds2_p3_'] = $this->ds2_p3_;
    $this->nmgp_dados_form['ds3_p3_'] = $this->ds3_p3_;
    $this->nmgp_dados_form['ds4_p3_'] = $this->ds4_p3_;
    $this->nmgp_dados_form['ds5_p3_'] = $this->ds5_p3_;
    $this->nmgp_dados_form['pcent_ds3_'] = $this->pcent_ds3_;
    $this->nmgp_dados_form['dp1_p3_'] = $this->dp1_p3_;
    $this->nmgp_dados_form['dp2_p3_'] = $this->dp2_p3_;
    $this->nmgp_dados_form['dp3_p3_'] = $this->dp3_p3_;
    $this->nmgp_dados_form['dp4_p3_'] = $this->dp4_p3_;
    $this->nmgp_dados_form['sc_field_0_'] = $this->sc_field_0_;
    $this->nmgp_dados_form['pcent_dp3_'] = $this->pcent_dp3_;
    $this->nmgp_dados_form['aee_p3_'] = $this->aee_p3_;
    $this->nmgp_dados_form['porcent_aee_p3_'] = $this->porcent_aee_p3_;
    $this->nmgp_dados_form['inasistencia_p4_'] = $this->inasistencia_p4_;
    $this->nmgp_dados_form['eval_4_per_'] = $this->eval_4_per_;
    $this->nmgp_dados_form['dc1_p4_'] = $this->dc1_p4_;
    $this->nmgp_dados_form['dc2_p4_'] = $this->dc2_p4_;
    $this->nmgp_dados_form['dc3_p4_'] = $this->dc3_p4_;
    $this->nmgp_dados_form['dc4_p4_'] = $this->dc4_p4_;
    $this->nmgp_dados_form['dc5_p4_'] = $this->dc5_p4_;
    $this->nmgp_dados_form['pcent_dc4_'] = $this->pcent_dc4_;
    $this->nmgp_dados_form['ds1_p4_'] = $this->ds1_p4_;
    $this->nmgp_dados_form['ds2_p4_'] = $this->ds2_p4_;
    $this->nmgp_dados_form['ds3_p4_'] = $this->ds3_p4_;
    $this->nmgp_dados_form['ds4_p4_'] = $this->ds4_p4_;
    $this->nmgp_dados_form['ds5_p4_'] = $this->ds5_p4_;
    $this->nmgp_dados_form['pcent_ds4_'] = $this->pcent_ds4_;
    $this->nmgp_dados_form['dp1_p4_'] = $this->dp1_p4_;
    $this->nmgp_dados_form['dp2_p4_'] = $this->dp2_p4_;
    $this->nmgp_dados_form['dp3_p4_'] = $this->dp3_p4_;
    $this->nmgp_dados_form['dp4_p4_'] = $this->dp4_p4_;
    $this->nmgp_dados_form['dp5_p4_'] = $this->dp5_p4_;
    $this->nmgp_dados_form['aee_p4_'] = $this->aee_p4_;
    $this->nmgp_dados_form['porcent_aee_p4_'] = $this->porcent_aee_p4_;
    $this->nmgp_dados_form['pcent_dp4_'] = $this->pcent_dp4_;
    $this->nmgp_dados_form['eval_final_'] = $this->eval_final_;
    $this->nmgp_dados_form['entorno_'] = $this->entorno_;
    $this->nmgp_dados_form['estudiantes_'] = $this->estudiantes_;
    $this->nmgp_dados_form['id_novedad_'] = $this->id_novedad_;
    $this->nmgp_dados_form['nom_grupo_'] = $this->nom_grupo_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->inasistencia_p1_, $this->field_config['inasistencia_p1_']['symbol_grp']) ; 
      if (!empty($this->field_config['eval_1_per_']['symbol_dec']))
      {
         nm_limpa_valor($this->eval_1_per_, $this->field_config['eval_1_per_']['symbol_dec'], $this->field_config['eval_1_per_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc1_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc1_, $this->field_config['dc1_']['symbol_dec'], $this->field_config['dc1_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc2_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc2_, $this->field_config['dc2_']['symbol_dec'], $this->field_config['dc2_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc3_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc3_, $this->field_config['dc3_']['symbol_dec'], $this->field_config['dc3_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc4_, $this->field_config['dc4_']['symbol_dec'], $this->field_config['dc4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc5_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc5_, $this->field_config['dc5_']['symbol_dec'], $this->field_config['dc5_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_dc_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_dc_, $this->field_config['pcent_dc_']['symbol_dec'], $this->field_config['pcent_dc_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp1_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp1_, $this->field_config['dp1_']['symbol_dec'], $this->field_config['dp1_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp2_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp2_, $this->field_config['dp2_']['symbol_dec'], $this->field_config['dp2_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp3_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp3_, $this->field_config['dp3_']['symbol_dec'], $this->field_config['dp3_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_dp_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_dp_, $this->field_config['pcent_dp_']['symbol_dec'], $this->field_config['pcent_dp_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds1_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds1_, $this->field_config['ds1_']['symbol_dec'], $this->field_config['ds1_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds2_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds2_, $this->field_config['ds2_']['symbol_dec'], $this->field_config['ds2_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds3_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds3_, $this->field_config['ds3_']['symbol_dec'], $this->field_config['ds3_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_ds_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_ds_, $this->field_config['pcent_ds_']['symbol_dec'], $this->field_config['pcent_ds_']['symbol_grp']);
      }
      if (!empty($this->field_config['aeep1_']['symbol_dec']))
      {
         nm_limpa_valor($this->aeep1_, $this->field_config['aeep1_']['symbol_dec'], $this->field_config['aeep1_']['symbol_grp']);
      }
      if (!empty($this->field_config['porcent_aeep1_']['symbol_dec']))
      {
         nm_limpa_valor($this->porcent_aeep1_, $this->field_config['porcent_aeep1_']['symbol_dec'], $this->field_config['porcent_aeep1_']['symbol_grp']);
      }
      if (!empty($this->field_config['val_acumulada_']['symbol_dec']))
      {
         nm_limpa_valor($this->val_acumulada_, $this->field_config['val_acumulada_']['symbol_dec'], $this->field_config['val_acumulada_']['symbol_grp']);
      }
      if (!empty($this->field_config['val_requerida_']['symbol_dec']))
      {
         nm_limpa_valor($this->val_requerida_, $this->field_config['val_requerida_']['symbol_dec'], $this->field_config['val_requerida_']['symbol_grp']);
      }
      nm_limpa_numero($this->id_grupo_, $this->field_config['id_grupo_']['symbol_grp']) ; 
      nm_limpa_numero($this->id_area_, $this->field_config['id_area_']['symbol_grp']) ; 
      nm_limpa_numero($this->id_asignatura_, $this->field_config['id_asignatura_']['symbol_grp']) ; 
      nm_limpa_numero($this->id_grado_, $this->field_config['id_grado_']['symbol_grp']) ; 
      nm_limpa_numero($this->id_nivel_, $this->field_config['id_nivel_']['symbol_grp']) ; 
      nm_limpa_numero($this->ihs_, $this->field_config['ihs_']['symbol_grp']) ; 
      nm_limpa_numero($this->pfa_, $this->field_config['pfa_']['symbol_grp']) ; 
      nm_limpa_numero($this->dc6_, $this->field_config['dc6_']['symbol_grp']) ; 
      nm_limpa_numero($this->dc7_, $this->field_config['dc7_']['symbol_grp']) ; 
      nm_limpa_numero($this->dc8_, $this->field_config['dc8_']['symbol_grp']) ; 
      nm_limpa_numero($this->dc9_, $this->field_config['dc9_']['symbol_grp']) ; 
      if (!empty($this->field_config['ds4_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds4_, $this->field_config['ds4_']['symbol_dec'], $this->field_config['ds4_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds5_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds5_, $this->field_config['ds5_']['symbol_dec'], $this->field_config['ds5_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp4_, $this->field_config['dp4_']['symbol_dec'], $this->field_config['dp4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp5_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp5_, $this->field_config['dp5_']['symbol_dec'], $this->field_config['dp5_']['symbol_grp']);
      }
      nm_limpa_numero($this->inasistencia_p2_, $this->field_config['inasistencia_p2_']['symbol_grp']) ; 
      if (!empty($this->field_config['eval_2_per_']['symbol_dec']))
      {
         nm_limpa_valor($this->eval_2_per_, $this->field_config['eval_2_per_']['symbol_dec'], $this->field_config['eval_2_per_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc1_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc1_2p_, $this->field_config['dc1_2p_']['symbol_dec'], $this->field_config['dc1_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc2_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc2_2p_, $this->field_config['dc2_2p_']['symbol_dec'], $this->field_config['dc2_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc3_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc3_2p_, $this->field_config['dc3_2p_']['symbol_dec'], $this->field_config['dc3_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc4_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc4_2p_, $this->field_config['dc4_2p_']['symbol_dec'], $this->field_config['dc4_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc5_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc5_2p_, $this->field_config['dc5_2p_']['symbol_dec'], $this->field_config['dc5_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_dc2_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_dc2_, $this->field_config['pcent_dc2_']['symbol_dec'], $this->field_config['pcent_dc2_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds1_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds1_2p_, $this->field_config['ds1_2p_']['symbol_dec'], $this->field_config['ds1_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds2_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds2_2p_, $this->field_config['ds2_2p_']['symbol_dec'], $this->field_config['ds2_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds3_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds3_2p_, $this->field_config['ds3_2p_']['symbol_dec'], $this->field_config['ds3_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds4_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds4_2p_, $this->field_config['ds4_2p_']['symbol_dec'], $this->field_config['ds4_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds5_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds5_2p_, $this->field_config['ds5_2p_']['symbol_dec'], $this->field_config['ds5_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_ds2_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_ds2_, $this->field_config['pcent_ds2_']['symbol_dec'], $this->field_config['pcent_ds2_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp1_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp1_2p_, $this->field_config['dp1_2p_']['symbol_dec'], $this->field_config['dp1_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp2_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp2_2p_, $this->field_config['dp2_2p_']['symbol_dec'], $this->field_config['dp2_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp3_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp3_2p_, $this->field_config['dp3_2p_']['symbol_dec'], $this->field_config['dp3_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp4_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp4_2p_, $this->field_config['dp4_2p_']['symbol_dec'], $this->field_config['dp4_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp5_2p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp5_2p_, $this->field_config['dp5_2p_']['symbol_dec'], $this->field_config['dp5_2p_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_dp2_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_dp2_, $this->field_config['pcent_dp2_']['symbol_dec'], $this->field_config['pcent_dp2_']['symbol_grp']);
      }
      nm_limpa_numero($this->aee_p2_, $this->field_config['aee_p2_']['symbol_grp']) ; 
      nm_limpa_numero($this->porcet_aee_p2_, $this->field_config['porcet_aee_p2_']['symbol_grp']) ; 
      nm_limpa_numero($this->inasistencia_p3_, $this->field_config['inasistencia_p3_']['symbol_grp']) ; 
      if (!empty($this->field_config['eval_3_per_']['symbol_dec']))
      {
         nm_limpa_valor($this->eval_3_per_, $this->field_config['eval_3_per_']['symbol_dec'], $this->field_config['eval_3_per_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc1_3p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc1_3p_, $this->field_config['dc1_3p_']['symbol_dec'], $this->field_config['dc1_3p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc2_3p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc2_3p_, $this->field_config['dc2_3p_']['symbol_dec'], $this->field_config['dc2_3p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc3_3p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc3_3p_, $this->field_config['dc3_3p_']['symbol_dec'], $this->field_config['dc3_3p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc4_3p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc4_3p_, $this->field_config['dc4_3p_']['symbol_dec'], $this->field_config['dc4_3p_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc5_3p_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc5_3p_, $this->field_config['dc5_3p_']['symbol_dec'], $this->field_config['dc5_3p_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_dc3_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_dc3_, $this->field_config['pcent_dc3_']['symbol_dec'], $this->field_config['pcent_dc3_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds1_p3_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds1_p3_, $this->field_config['ds1_p3_']['symbol_dec'], $this->field_config['ds1_p3_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds2_p3_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds2_p3_, $this->field_config['ds2_p3_']['symbol_dec'], $this->field_config['ds2_p3_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds3_p3_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds3_p3_, $this->field_config['ds3_p3_']['symbol_dec'], $this->field_config['ds3_p3_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds4_p3_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds4_p3_, $this->field_config['ds4_p3_']['symbol_dec'], $this->field_config['ds4_p3_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds5_p3_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds5_p3_, $this->field_config['ds5_p3_']['symbol_dec'], $this->field_config['ds5_p3_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_ds3_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_ds3_, $this->field_config['pcent_ds3_']['symbol_dec'], $this->field_config['pcent_ds3_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp1_p3_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp1_p3_, $this->field_config['dp1_p3_']['symbol_dec'], $this->field_config['dp1_p3_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp2_p3_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp2_p3_, $this->field_config['dp2_p3_']['symbol_dec'], $this->field_config['dp2_p3_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp3_p3_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp3_p3_, $this->field_config['dp3_p3_']['symbol_dec'], $this->field_config['dp3_p3_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp4_p3_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp4_p3_, $this->field_config['dp4_p3_']['symbol_dec'], $this->field_config['dp4_p3_']['symbol_grp']);
      }
      if (!empty($this->field_config['sc_field_0_']['symbol_dec']))
      {
         nm_limpa_valor($this->sc_field_0_, $this->field_config['sc_field_0_']['symbol_dec'], $this->field_config['sc_field_0_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_dp3_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_dp3_, $this->field_config['pcent_dp3_']['symbol_dec'], $this->field_config['pcent_dp3_']['symbol_grp']);
      }
      nm_limpa_numero($this->aee_p3_, $this->field_config['aee_p3_']['symbol_grp']) ; 
      nm_limpa_numero($this->porcent_aee_p3_, $this->field_config['porcent_aee_p3_']['symbol_grp']) ; 
      nm_limpa_numero($this->inasistencia_p4_, $this->field_config['inasistencia_p4_']['symbol_grp']) ; 
      if (!empty($this->field_config['eval_4_per_']['symbol_dec']))
      {
         nm_limpa_valor($this->eval_4_per_, $this->field_config['eval_4_per_']['symbol_dec'], $this->field_config['eval_4_per_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc1_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc1_p4_, $this->field_config['dc1_p4_']['symbol_dec'], $this->field_config['dc1_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc2_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc2_p4_, $this->field_config['dc2_p4_']['symbol_dec'], $this->field_config['dc2_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc3_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc3_p4_, $this->field_config['dc3_p4_']['symbol_dec'], $this->field_config['dc3_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc4_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc4_p4_, $this->field_config['dc4_p4_']['symbol_dec'], $this->field_config['dc4_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dc5_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dc5_p4_, $this->field_config['dc5_p4_']['symbol_dec'], $this->field_config['dc5_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_dc4_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_dc4_, $this->field_config['pcent_dc4_']['symbol_dec'], $this->field_config['pcent_dc4_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds1_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds1_p4_, $this->field_config['ds1_p4_']['symbol_dec'], $this->field_config['ds1_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds2_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds2_p4_, $this->field_config['ds2_p4_']['symbol_dec'], $this->field_config['ds2_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds3_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds3_p4_, $this->field_config['ds3_p4_']['symbol_dec'], $this->field_config['ds3_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds4_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds4_p4_, $this->field_config['ds4_p4_']['symbol_dec'], $this->field_config['ds4_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['ds5_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->ds5_p4_, $this->field_config['ds5_p4_']['symbol_dec'], $this->field_config['ds5_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['pcent_ds4_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_ds4_, $this->field_config['pcent_ds4_']['symbol_dec'], $this->field_config['pcent_ds4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp1_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp1_p4_, $this->field_config['dp1_p4_']['symbol_dec'], $this->field_config['dp1_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp2_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp2_p4_, $this->field_config['dp2_p4_']['symbol_dec'], $this->field_config['dp2_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp3_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp3_p4_, $this->field_config['dp3_p4_']['symbol_dec'], $this->field_config['dp3_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp4_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp4_p4_, $this->field_config['dp4_p4_']['symbol_dec'], $this->field_config['dp4_p4_']['symbol_grp']);
      }
      if (!empty($this->field_config['dp5_p4_']['symbol_dec']))
      {
         nm_limpa_valor($this->dp5_p4_, $this->field_config['dp5_p4_']['symbol_dec'], $this->field_config['dp5_p4_']['symbol_grp']);
      }
      nm_limpa_numero($this->aee_p4_, $this->field_config['aee_p4_']['symbol_grp']) ; 
      nm_limpa_numero($this->porcent_aee_p4_, $this->field_config['porcent_aee_p4_']['symbol_grp']) ; 
      if (!empty($this->field_config['pcent_dp4_']['symbol_dec']))
      {
         nm_limpa_valor($this->pcent_dp4_, $this->field_config['pcent_dp4_']['symbol_dec'], $this->field_config['pcent_dp4_']['symbol_grp']);
      }
      if (!empty($this->field_config['eval_final_']['symbol_dec']))
      {
         nm_limpa_valor($this->eval_final_, $this->field_config['eval_final_']['symbol_dec'], $this->field_config['eval_final_']['symbol_grp']);
      }
      nm_limpa_numero($this->entorno_, $this->field_config['entorno_']['symbol_grp']) ; 
      nm_limpa_numero($this->id_novedad_, $this->field_config['id_novedad_']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "inasistencia_p1_")
      {
          nm_limpa_numero($this->inasistencia_p1_, $this->field_config['inasistencia_p1_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "eval_1_per_")
      {
          if (!empty($this->field_config['eval_1_per_']['symbol_dec']))
          {
             nm_limpa_valor($this->eval_1_per_, $this->field_config['eval_1_per_']['symbol_dec'], $this->field_config['eval_1_per_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc1_")
      {
          if (!empty($this->field_config['dc1_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc1_, $this->field_config['dc1_']['symbol_dec'], $this->field_config['dc1_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc2_")
      {
          if (!empty($this->field_config['dc2_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc2_, $this->field_config['dc2_']['symbol_dec'], $this->field_config['dc2_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc3_")
      {
          if (!empty($this->field_config['dc3_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc3_, $this->field_config['dc3_']['symbol_dec'], $this->field_config['dc3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc4_")
      {
          if (!empty($this->field_config['dc4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc4_, $this->field_config['dc4_']['symbol_dec'], $this->field_config['dc4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc5_")
      {
          if (!empty($this->field_config['dc5_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc5_, $this->field_config['dc5_']['symbol_dec'], $this->field_config['dc5_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_dc_")
      {
          if (!empty($this->field_config['pcent_dc_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_dc_, $this->field_config['pcent_dc_']['symbol_dec'], $this->field_config['pcent_dc_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp1_")
      {
          if (!empty($this->field_config['dp1_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp1_, $this->field_config['dp1_']['symbol_dec'], $this->field_config['dp1_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp2_")
      {
          if (!empty($this->field_config['dp2_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp2_, $this->field_config['dp2_']['symbol_dec'], $this->field_config['dp2_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp3_")
      {
          if (!empty($this->field_config['dp3_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp3_, $this->field_config['dp3_']['symbol_dec'], $this->field_config['dp3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_dp_")
      {
          if (!empty($this->field_config['pcent_dp_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_dp_, $this->field_config['pcent_dp_']['symbol_dec'], $this->field_config['pcent_dp_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds1_")
      {
          if (!empty($this->field_config['ds1_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds1_, $this->field_config['ds1_']['symbol_dec'], $this->field_config['ds1_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds2_")
      {
          if (!empty($this->field_config['ds2_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds2_, $this->field_config['ds2_']['symbol_dec'], $this->field_config['ds2_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds3_")
      {
          if (!empty($this->field_config['ds3_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds3_, $this->field_config['ds3_']['symbol_dec'], $this->field_config['ds3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_ds_")
      {
          if (!empty($this->field_config['pcent_ds_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_ds_, $this->field_config['pcent_ds_']['symbol_dec'], $this->field_config['pcent_ds_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "aeep1_")
      {
          if (!empty($this->field_config['aeep1_']['symbol_dec']))
          {
             nm_limpa_valor($this->aeep1_, $this->field_config['aeep1_']['symbol_dec'], $this->field_config['aeep1_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "porcent_aeep1_")
      {
          if (!empty($this->field_config['porcent_aeep1_']['symbol_dec']))
          {
             nm_limpa_valor($this->porcent_aeep1_, $this->field_config['porcent_aeep1_']['symbol_dec'], $this->field_config['porcent_aeep1_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "val_acumulada_")
      {
          if (!empty($this->field_config['val_acumulada_']['symbol_dec']))
          {
             nm_limpa_valor($this->val_acumulada_, $this->field_config['val_acumulada_']['symbol_dec'], $this->field_config['val_acumulada_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "val_requerida_")
      {
          if (!empty($this->field_config['val_requerida_']['symbol_dec']))
          {
             nm_limpa_valor($this->val_requerida_, $this->field_config['val_requerida_']['symbol_dec'], $this->field_config['val_requerida_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "id_grupo_")
      {
          nm_limpa_numero($this->id_grupo_, $this->field_config['id_grupo_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_area_")
      {
          nm_limpa_numero($this->id_area_, $this->field_config['id_area_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_asignatura_")
      {
          nm_limpa_numero($this->id_asignatura_, $this->field_config['id_asignatura_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_grado_")
      {
          nm_limpa_numero($this->id_grado_, $this->field_config['id_grado_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_nivel_")
      {
          nm_limpa_numero($this->id_nivel_, $this->field_config['id_nivel_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ihs_")
      {
          nm_limpa_numero($this->ihs_, $this->field_config['ihs_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pfa_")
      {
          nm_limpa_numero($this->pfa_, $this->field_config['pfa_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc6_")
      {
          nm_limpa_numero($this->dc6_, $this->field_config['dc6_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc7_")
      {
          nm_limpa_numero($this->dc7_, $this->field_config['dc7_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc8_")
      {
          nm_limpa_numero($this->dc8_, $this->field_config['dc8_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc9_")
      {
          nm_limpa_numero($this->dc9_, $this->field_config['dc9_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds4_")
      {
          if (!empty($this->field_config['ds4_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds4_, $this->field_config['ds4_']['symbol_dec'], $this->field_config['ds4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds5_")
      {
          if (!empty($this->field_config['ds5_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds5_, $this->field_config['ds5_']['symbol_dec'], $this->field_config['ds5_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp4_")
      {
          if (!empty($this->field_config['dp4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp4_, $this->field_config['dp4_']['symbol_dec'], $this->field_config['dp4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp5_")
      {
          if (!empty($this->field_config['dp5_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp5_, $this->field_config['dp5_']['symbol_dec'], $this->field_config['dp5_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "inasistencia_p2_")
      {
          nm_limpa_numero($this->inasistencia_p2_, $this->field_config['inasistencia_p2_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "eval_2_per_")
      {
          if (!empty($this->field_config['eval_2_per_']['symbol_dec']))
          {
             nm_limpa_valor($this->eval_2_per_, $this->field_config['eval_2_per_']['symbol_dec'], $this->field_config['eval_2_per_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc1_2p_")
      {
          if (!empty($this->field_config['dc1_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc1_2p_, $this->field_config['dc1_2p_']['symbol_dec'], $this->field_config['dc1_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc2_2p_")
      {
          if (!empty($this->field_config['dc2_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc2_2p_, $this->field_config['dc2_2p_']['symbol_dec'], $this->field_config['dc2_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc3_2p_")
      {
          if (!empty($this->field_config['dc3_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc3_2p_, $this->field_config['dc3_2p_']['symbol_dec'], $this->field_config['dc3_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc4_2p_")
      {
          if (!empty($this->field_config['dc4_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc4_2p_, $this->field_config['dc4_2p_']['symbol_dec'], $this->field_config['dc4_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc5_2p_")
      {
          if (!empty($this->field_config['dc5_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc5_2p_, $this->field_config['dc5_2p_']['symbol_dec'], $this->field_config['dc5_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_dc2_")
      {
          if (!empty($this->field_config['pcent_dc2_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_dc2_, $this->field_config['pcent_dc2_']['symbol_dec'], $this->field_config['pcent_dc2_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds1_2p_")
      {
          if (!empty($this->field_config['ds1_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds1_2p_, $this->field_config['ds1_2p_']['symbol_dec'], $this->field_config['ds1_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds2_2p_")
      {
          if (!empty($this->field_config['ds2_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds2_2p_, $this->field_config['ds2_2p_']['symbol_dec'], $this->field_config['ds2_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds3_2p_")
      {
          if (!empty($this->field_config['ds3_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds3_2p_, $this->field_config['ds3_2p_']['symbol_dec'], $this->field_config['ds3_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds4_2p_")
      {
          if (!empty($this->field_config['ds4_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds4_2p_, $this->field_config['ds4_2p_']['symbol_dec'], $this->field_config['ds4_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds5_2p_")
      {
          if (!empty($this->field_config['ds5_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds5_2p_, $this->field_config['ds5_2p_']['symbol_dec'], $this->field_config['ds5_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_ds2_")
      {
          if (!empty($this->field_config['pcent_ds2_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_ds2_, $this->field_config['pcent_ds2_']['symbol_dec'], $this->field_config['pcent_ds2_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp1_2p_")
      {
          if (!empty($this->field_config['dp1_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp1_2p_, $this->field_config['dp1_2p_']['symbol_dec'], $this->field_config['dp1_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp2_2p_")
      {
          if (!empty($this->field_config['dp2_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp2_2p_, $this->field_config['dp2_2p_']['symbol_dec'], $this->field_config['dp2_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp3_2p_")
      {
          if (!empty($this->field_config['dp3_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp3_2p_, $this->field_config['dp3_2p_']['symbol_dec'], $this->field_config['dp3_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp4_2p_")
      {
          if (!empty($this->field_config['dp4_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp4_2p_, $this->field_config['dp4_2p_']['symbol_dec'], $this->field_config['dp4_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp5_2p_")
      {
          if (!empty($this->field_config['dp5_2p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp5_2p_, $this->field_config['dp5_2p_']['symbol_dec'], $this->field_config['dp5_2p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_dp2_")
      {
          if (!empty($this->field_config['pcent_dp2_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_dp2_, $this->field_config['pcent_dp2_']['symbol_dec'], $this->field_config['pcent_dp2_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "aee_p2_")
      {
          nm_limpa_numero($this->aee_p2_, $this->field_config['aee_p2_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "porcet_aee_p2_")
      {
          nm_limpa_numero($this->porcet_aee_p2_, $this->field_config['porcet_aee_p2_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "inasistencia_p3_")
      {
          nm_limpa_numero($this->inasistencia_p3_, $this->field_config['inasistencia_p3_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "eval_3_per_")
      {
          if (!empty($this->field_config['eval_3_per_']['symbol_dec']))
          {
             nm_limpa_valor($this->eval_3_per_, $this->field_config['eval_3_per_']['symbol_dec'], $this->field_config['eval_3_per_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc1_3p_")
      {
          if (!empty($this->field_config['dc1_3p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc1_3p_, $this->field_config['dc1_3p_']['symbol_dec'], $this->field_config['dc1_3p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc2_3p_")
      {
          if (!empty($this->field_config['dc2_3p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc2_3p_, $this->field_config['dc2_3p_']['symbol_dec'], $this->field_config['dc2_3p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc3_3p_")
      {
          if (!empty($this->field_config['dc3_3p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc3_3p_, $this->field_config['dc3_3p_']['symbol_dec'], $this->field_config['dc3_3p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc4_3p_")
      {
          if (!empty($this->field_config['dc4_3p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc4_3p_, $this->field_config['dc4_3p_']['symbol_dec'], $this->field_config['dc4_3p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc5_3p_")
      {
          if (!empty($this->field_config['dc5_3p_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc5_3p_, $this->field_config['dc5_3p_']['symbol_dec'], $this->field_config['dc5_3p_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_dc3_")
      {
          if (!empty($this->field_config['pcent_dc3_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_dc3_, $this->field_config['pcent_dc3_']['symbol_dec'], $this->field_config['pcent_dc3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds1_p3_")
      {
          if (!empty($this->field_config['ds1_p3_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds1_p3_, $this->field_config['ds1_p3_']['symbol_dec'], $this->field_config['ds1_p3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds2_p3_")
      {
          if (!empty($this->field_config['ds2_p3_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds2_p3_, $this->field_config['ds2_p3_']['symbol_dec'], $this->field_config['ds2_p3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds3_p3_")
      {
          if (!empty($this->field_config['ds3_p3_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds3_p3_, $this->field_config['ds3_p3_']['symbol_dec'], $this->field_config['ds3_p3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds4_p3_")
      {
          if (!empty($this->field_config['ds4_p3_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds4_p3_, $this->field_config['ds4_p3_']['symbol_dec'], $this->field_config['ds4_p3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds5_p3_")
      {
          if (!empty($this->field_config['ds5_p3_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds5_p3_, $this->field_config['ds5_p3_']['symbol_dec'], $this->field_config['ds5_p3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_ds3_")
      {
          if (!empty($this->field_config['pcent_ds3_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_ds3_, $this->field_config['pcent_ds3_']['symbol_dec'], $this->field_config['pcent_ds3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp1_p3_")
      {
          if (!empty($this->field_config['dp1_p3_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp1_p3_, $this->field_config['dp1_p3_']['symbol_dec'], $this->field_config['dp1_p3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp2_p3_")
      {
          if (!empty($this->field_config['dp2_p3_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp2_p3_, $this->field_config['dp2_p3_']['symbol_dec'], $this->field_config['dp2_p3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp3_p3_")
      {
          if (!empty($this->field_config['dp3_p3_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp3_p3_, $this->field_config['dp3_p3_']['symbol_dec'], $this->field_config['dp3_p3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp4_p3_")
      {
          if (!empty($this->field_config['dp4_p3_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp4_p3_, $this->field_config['dp4_p3_']['symbol_dec'], $this->field_config['dp4_p3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "sc_field_0_")
      {
          if (!empty($this->field_config['sc_field_0_']['symbol_dec']))
          {
             nm_limpa_valor($this->sc_field_0_, $this->field_config['sc_field_0_']['symbol_dec'], $this->field_config['sc_field_0_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_dp3_")
      {
          if (!empty($this->field_config['pcent_dp3_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_dp3_, $this->field_config['pcent_dp3_']['symbol_dec'], $this->field_config['pcent_dp3_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "aee_p3_")
      {
          nm_limpa_numero($this->aee_p3_, $this->field_config['aee_p3_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "porcent_aee_p3_")
      {
          nm_limpa_numero($this->porcent_aee_p3_, $this->field_config['porcent_aee_p3_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "inasistencia_p4_")
      {
          nm_limpa_numero($this->inasistencia_p4_, $this->field_config['inasistencia_p4_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "eval_4_per_")
      {
          if (!empty($this->field_config['eval_4_per_']['symbol_dec']))
          {
             nm_limpa_valor($this->eval_4_per_, $this->field_config['eval_4_per_']['symbol_dec'], $this->field_config['eval_4_per_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc1_p4_")
      {
          if (!empty($this->field_config['dc1_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc1_p4_, $this->field_config['dc1_p4_']['symbol_dec'], $this->field_config['dc1_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc2_p4_")
      {
          if (!empty($this->field_config['dc2_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc2_p4_, $this->field_config['dc2_p4_']['symbol_dec'], $this->field_config['dc2_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc3_p4_")
      {
          if (!empty($this->field_config['dc3_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc3_p4_, $this->field_config['dc3_p4_']['symbol_dec'], $this->field_config['dc3_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc4_p4_")
      {
          if (!empty($this->field_config['dc4_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc4_p4_, $this->field_config['dc4_p4_']['symbol_dec'], $this->field_config['dc4_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc5_p4_")
      {
          if (!empty($this->field_config['dc5_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dc5_p4_, $this->field_config['dc5_p4_']['symbol_dec'], $this->field_config['dc5_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_dc4_")
      {
          if (!empty($this->field_config['pcent_dc4_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_dc4_, $this->field_config['pcent_dc4_']['symbol_dec'], $this->field_config['pcent_dc4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds1_p4_")
      {
          if (!empty($this->field_config['ds1_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds1_p4_, $this->field_config['ds1_p4_']['symbol_dec'], $this->field_config['ds1_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds2_p4_")
      {
          if (!empty($this->field_config['ds2_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds2_p4_, $this->field_config['ds2_p4_']['symbol_dec'], $this->field_config['ds2_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds3_p4_")
      {
          if (!empty($this->field_config['ds3_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds3_p4_, $this->field_config['ds3_p4_']['symbol_dec'], $this->field_config['ds3_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds4_p4_")
      {
          if (!empty($this->field_config['ds4_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds4_p4_, $this->field_config['ds4_p4_']['symbol_dec'], $this->field_config['ds4_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ds5_p4_")
      {
          if (!empty($this->field_config['ds5_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->ds5_p4_, $this->field_config['ds5_p4_']['symbol_dec'], $this->field_config['ds5_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pcent_ds4_")
      {
          if (!empty($this->field_config['pcent_ds4_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_ds4_, $this->field_config['pcent_ds4_']['symbol_dec'], $this->field_config['pcent_ds4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp1_p4_")
      {
          if (!empty($this->field_config['dp1_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp1_p4_, $this->field_config['dp1_p4_']['symbol_dec'], $this->field_config['dp1_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp2_p4_")
      {
          if (!empty($this->field_config['dp2_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp2_p4_, $this->field_config['dp2_p4_']['symbol_dec'], $this->field_config['dp2_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp3_p4_")
      {
          if (!empty($this->field_config['dp3_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp3_p4_, $this->field_config['dp3_p4_']['symbol_dec'], $this->field_config['dp3_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp4_p4_")
      {
          if (!empty($this->field_config['dp4_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp4_p4_, $this->field_config['dp4_p4_']['symbol_dec'], $this->field_config['dp4_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dp5_p4_")
      {
          if (!empty($this->field_config['dp5_p4_']['symbol_dec']))
          {
             nm_limpa_valor($this->dp5_p4_, $this->field_config['dp5_p4_']['symbol_dec'], $this->field_config['dp5_p4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "aee_p4_")
      {
          nm_limpa_numero($this->aee_p4_, $this->field_config['aee_p4_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "porcent_aee_p4_")
      {
          nm_limpa_numero($this->porcent_aee_p4_, $this->field_config['porcent_aee_p4_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_dp4_")
      {
          if (!empty($this->field_config['pcent_dp4_']['symbol_dec']))
          {
             nm_limpa_valor($this->pcent_dp4_, $this->field_config['pcent_dp4_']['symbol_dec'], $this->field_config['pcent_dp4_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "eval_final_")
      {
          if (!empty($this->field_config['eval_final_']['symbol_dec']))
          {
             nm_limpa_valor($this->eval_final_, $this->field_config['eval_final_']['symbol_dec'], $this->field_config['eval_final_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "entorno_")
      {
          nm_limpa_numero($this->entorno_, $this->field_config['entorno_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_novedad_")
      {
          nm_limpa_numero($this->id_novedad_, $this->field_config['id_novedad_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if (!empty($this->inasistencia_p1_) || (!empty($format_fields) && isset($format_fields['inasistencia_p1_'])))
      {
          nmgp_Form_Num_Val($this->inasistencia_p1_, $this->field_config['inasistencia_p1_']['symbol_grp'], $this->field_config['inasistencia_p1_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['inasistencia_p1_']['symbol_fmt']) ; 
      }
      if (!empty($this->eval_1_per_) || (!empty($format_fields) && isset($format_fields['eval_1_per_'])))
      {
          nmgp_Form_Num_Val($this->eval_1_per_, $this->field_config['eval_1_per_']['symbol_grp'], $this->field_config['eval_1_per_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['eval_1_per_']['symbol_fmt']) ; 
      }
      if (!empty($this->dc1_) || (!empty($format_fields) && isset($format_fields['dc1_'])))
      {
          nmgp_Form_Num_Val($this->dc1_, $this->field_config['dc1_']['symbol_grp'], $this->field_config['dc1_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['dc1_']['symbol_fmt']) ; 
      }
      if (!empty($this->dc2_) || (!empty($format_fields) && isset($format_fields['dc2_'])))
      {
          nmgp_Form_Num_Val($this->dc2_, $this->field_config['dc2_']['symbol_grp'], $this->field_config['dc2_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['dc2_']['symbol_fmt']) ; 
      }
      if (!empty($this->dc3_) || (!empty($format_fields) && isset($format_fields['dc3_'])))
      {
          nmgp_Form_Num_Val($this->dc3_, $this->field_config['dc3_']['symbol_grp'], $this->field_config['dc3_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['dc3_']['symbol_fmt']) ; 
      }
      if (!empty($this->dc4_) || (!empty($format_fields) && isset($format_fields['dc4_'])))
      {
          nmgp_Form_Num_Val($this->dc4_, $this->field_config['dc4_']['symbol_grp'], $this->field_config['dc4_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['dc4_']['symbol_fmt']) ; 
      }
      if (!empty($this->dc5_) || (!empty($format_fields) && isset($format_fields['dc5_'])))
      {
          nmgp_Form_Num_Val($this->dc5_, $this->field_config['dc5_']['symbol_grp'], $this->field_config['dc5_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['dc5_']['symbol_fmt']) ; 
      }
      if (!empty($this->pcent_dc_) || (!empty($format_fields) && isset($format_fields['pcent_dc_'])))
      {
          nmgp_Form_Num_Val($this->pcent_dc_, $this->field_config['pcent_dc_']['symbol_grp'], $this->field_config['pcent_dc_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['pcent_dc_']['symbol_fmt']) ; 
      }
      if (!empty($this->dp1_) || (!empty($format_fields) && isset($format_fields['dp1_'])))
      {
          nmgp_Form_Num_Val($this->dp1_, $this->field_config['dp1_']['symbol_grp'], $this->field_config['dp1_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['dp1_']['symbol_fmt']) ; 
      }
      if (!empty($this->dp2_) || (!empty($format_fields) && isset($format_fields['dp2_'])))
      {
          nmgp_Form_Num_Val($this->dp2_, $this->field_config['dp2_']['symbol_grp'], $this->field_config['dp2_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['dp2_']['symbol_fmt']) ; 
      }
      if (!empty($this->dp3_) || (!empty($format_fields) && isset($format_fields['dp3_'])))
      {
          nmgp_Form_Num_Val($this->dp3_, $this->field_config['dp3_']['symbol_grp'], $this->field_config['dp3_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['dp3_']['symbol_fmt']) ; 
      }
      if (!empty($this->pcent_dp_) || (!empty($format_fields) && isset($format_fields['pcent_dp_'])))
      {
          nmgp_Form_Num_Val($this->pcent_dp_, $this->field_config['pcent_dp_']['symbol_grp'], $this->field_config['pcent_dp_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['pcent_dp_']['symbol_fmt']) ; 
      }
      if (!empty($this->ds1_) || (!empty($format_fields) && isset($format_fields['ds1_'])))
      {
          nmgp_Form_Num_Val($this->ds1_, $this->field_config['ds1_']['symbol_grp'], $this->field_config['ds1_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['ds1_']['symbol_fmt']) ; 
      }
      if (!empty($this->ds2_) || (!empty($format_fields) && isset($format_fields['ds2_'])))
      {
          nmgp_Form_Num_Val($this->ds2_, $this->field_config['ds2_']['symbol_grp'], $this->field_config['ds2_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['ds2_']['symbol_fmt']) ; 
      }
      if (!empty($this->ds3_) || (!empty($format_fields) && isset($format_fields['ds3_'])))
      {
          nmgp_Form_Num_Val($this->ds3_, $this->field_config['ds3_']['symbol_grp'], $this->field_config['ds3_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['ds3_']['symbol_fmt']) ; 
      }
      if (!empty($this->pcent_ds_) || (!empty($format_fields) && isset($format_fields['pcent_ds_'])))
      {
          nmgp_Form_Num_Val($this->pcent_ds_, $this->field_config['pcent_ds_']['symbol_grp'], $this->field_config['pcent_ds_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['pcent_ds_']['symbol_fmt']) ; 
      }
      if (!empty($this->aeep1_) || (!empty($format_fields) && isset($format_fields['aeep1_'])))
      {
          nmgp_Form_Num_Val($this->aeep1_, $this->field_config['aeep1_']['symbol_grp'], $this->field_config['aeep1_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['aeep1_']['symbol_fmt']) ; 
      }
      if (!empty($this->porcent_aeep1_) || (!empty($format_fields) && isset($format_fields['porcent_aeep1_'])))
      {
          nmgp_Form_Num_Val($this->porcent_aeep1_, $this->field_config['porcent_aeep1_']['symbol_grp'], $this->field_config['porcent_aeep1_']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['porcent_aeep1_']['symbol_fmt']) ; 
      }
      if (!empty($this->val_acumulada_) || (!empty($format_fields) && isset($format_fields['val_acumulada_'])))
      {
          nmgp_Form_Num_Val($this->val_acumulada_, $this->field_config['val_acumulada_']['symbol_grp'], $this->field_config['val_acumulada_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['val_acumulada_']['symbol_fmt']) ; 
      }
      if (!empty($this->val_requerida_) || (!empty($format_fields) && isset($format_fields['val_requerida_'])))
      {
          nmgp_Form_Num_Val($this->val_requerida_, $this->field_config['val_requerida_']['symbol_grp'], $this->field_config['val_requerida_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['val_requerida_']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_estudiante_']['keyVal'] = form_t_evaluacion_p1_m3_pack_protect_string($this->nmgp_dados_form['id_estudiante_']);
              $this->NM_ajax_info['fldList']['id_grupo_']['keyVal'] = form_t_evaluacion_p1_m3_pack_protect_string($this->nmgp_dados_form['id_grupo_']);
              $this->NM_ajax_info['fldList']['id_asignatura_']['keyVal'] = form_t_evaluacion_p1_m3_pack_protect_string($this->nmgp_dados_form['id_asignatura_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['id_estudiante_']) && $this->NM_ajax_changed['id_estudiante_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['id_estudiante_'] = $this->id_estudiante_;
                  }
                  if (isset($this->NM_ajax_changed['estatus_']) && $this->NM_ajax_changed['estatus_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['estatus_'] = $this->estatus_;
                  }
                  if (isset($this->NM_ajax_changed['novedad_']) && $this->NM_ajax_changed['novedad_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['novedad_'] = $this->novedad_;
                  }
                  if (isset($this->NM_ajax_changed['asienta_inasistencias_']) && $this->NM_ajax_changed['asienta_inasistencias_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['asienta_inasistencias_'] = $this->asienta_inasistencias_;
                  }
                  if (isset($this->NM_ajax_changed['inasistencia_p1_']) && $this->NM_ajax_changed['inasistencia_p1_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['inasistencia_p1_'] = $this->inasistencia_p1_;
                  }
                  if (isset($this->NM_ajax_changed['eval_1_per_']) && $this->NM_ajax_changed['eval_1_per_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['eval_1_per_'] = $this->eval_1_per_;
                  }
                  if (isset($this->NM_ajax_changed['dc1_']) && $this->NM_ajax_changed['dc1_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['dc1_'] = $this->dc1_;
                  }
                  if (isset($this->NM_ajax_changed['dc2_']) && $this->NM_ajax_changed['dc2_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['dc2_'] = $this->dc2_;
                  }
                  if (isset($this->NM_ajax_changed['dc3_']) && $this->NM_ajax_changed['dc3_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['dc3_'] = $this->dc3_;
                  }
                  if (isset($this->NM_ajax_changed['dc4_']) && $this->NM_ajax_changed['dc4_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['dc4_'] = $this->dc4_;
                  }
                  if (isset($this->NM_ajax_changed['dc5_']) && $this->NM_ajax_changed['dc5_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['dc5_'] = $this->dc5_;
                  }
                  if (isset($this->NM_ajax_changed['pcent_dc_']) && $this->NM_ajax_changed['pcent_dc_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['pcent_dc_'] = $this->pcent_dc_;
                  }
                  if (isset($this->NM_ajax_changed['dp1_']) && $this->NM_ajax_changed['dp1_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['dp1_'] = $this->dp1_;
                  }
                  if (isset($this->NM_ajax_changed['dp2_']) && $this->NM_ajax_changed['dp2_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['dp2_'] = $this->dp2_;
                  }
                  if (isset($this->NM_ajax_changed['dp3_']) && $this->NM_ajax_changed['dp3_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['dp3_'] = $this->dp3_;
                  }
                  if (isset($this->NM_ajax_changed['pcent_dp_']) && $this->NM_ajax_changed['pcent_dp_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['pcent_dp_'] = $this->pcent_dp_;
                  }
                  if (isset($this->NM_ajax_changed['ds1_']) && $this->NM_ajax_changed['ds1_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['ds1_'] = $this->ds1_;
                  }
                  if (isset($this->NM_ajax_changed['ds2_']) && $this->NM_ajax_changed['ds2_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['ds2_'] = $this->ds2_;
                  }
                  if (isset($this->NM_ajax_changed['ds3_']) && $this->NM_ajax_changed['ds3_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['ds3_'] = $this->ds3_;
                  }
                  if (isset($this->NM_ajax_changed['pcent_ds_']) && $this->NM_ajax_changed['pcent_ds_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['pcent_ds_'] = $this->pcent_ds_;
                  }
                  if (isset($this->NM_ajax_changed['aeep1_']) && $this->NM_ajax_changed['aeep1_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['aeep1_'] = $this->aeep1_;
                  }
                  if (isset($this->NM_ajax_changed['porcent_aeep1_']) && $this->NM_ajax_changed['porcent_aeep1_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['porcent_aeep1_'] = $this->porcent_aeep1_;
                  }
                  if (isset($this->NM_ajax_changed['val_acumulada_']) && $this->NM_ajax_changed['val_acumulada_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['val_acumulada_'] = $this->val_acumulada_;
                  }
                  if (isset($this->NM_ajax_changed['val_requerida_']) && $this->NM_ajax_changed['val_requerida_'])
                  {
                      $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['val_requerida_'] = $this->val_requerida_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['estatus_'] = $this->estatus_;
              $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['novedad_'] = $this->novedad_;
              $this->form_vert_form_t_evaluacion_p1_m3[$this->nmgp_refresh_row]['asienta_inasistencias_'] = $this->asienta_inasistencias_;
          }
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_t_evaluacion_p1_m3);
          foreach($this->form_vert_form_t_evaluacion_p1_m3 as $sc_seq_vert => $aRecData)
          {
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_estudiante_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_estudiante_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_inasistencia_p1_ = $this->inasistencia_p1_;
   $old_value_eval_1_per_ = $this->eval_1_per_;
   $old_value_dc1_ = $this->dc1_;
   $old_value_dc2_ = $this->dc2_;
   $old_value_dc3_ = $this->dc3_;
   $old_value_dc4_ = $this->dc4_;
   $old_value_dc5_ = $this->dc5_;
   $old_value_pcent_dc_ = $this->pcent_dc_;
   $old_value_dp1_ = $this->dp1_;
   $old_value_dp2_ = $this->dp2_;
   $old_value_dp3_ = $this->dp3_;
   $old_value_pcent_dp_ = $this->pcent_dp_;
   $old_value_ds1_ = $this->ds1_;
   $old_value_ds2_ = $this->ds2_;
   $old_value_ds3_ = $this->ds3_;
   $old_value_pcent_ds_ = $this->pcent_ds_;
   $old_value_aeep1_ = $this->aeep1_;
   $old_value_porcent_aeep1_ = $this->porcent_aeep1_;
   $old_value_val_acumulada_ = $this->val_acumulada_;
   $old_value_val_requerida_ = $this->val_requerida_;
   $this->nm_tira_formatacao();


   $unformatted_value_inasistencia_p1_ = $this->inasistencia_p1_;
   $unformatted_value_eval_1_per_ = $this->eval_1_per_;
   $unformatted_value_dc1_ = $this->dc1_;
   $unformatted_value_dc2_ = $this->dc2_;
   $unformatted_value_dc3_ = $this->dc3_;
   $unformatted_value_dc4_ = $this->dc4_;
   $unformatted_value_dc5_ = $this->dc5_;
   $unformatted_value_pcent_dc_ = $this->pcent_dc_;
   $unformatted_value_dp1_ = $this->dp1_;
   $unformatted_value_dp2_ = $this->dp2_;
   $unformatted_value_dp3_ = $this->dp3_;
   $unformatted_value_pcent_dp_ = $this->pcent_dp_;
   $unformatted_value_ds1_ = $this->ds1_;
   $unformatted_value_ds2_ = $this->ds2_;
   $unformatted_value_ds3_ = $this->ds3_;
   $unformatted_value_pcent_ds_ = $this->pcent_ds_;
   $unformatted_value_aeep1_ = $this->aeep1_;
   $unformatted_value_porcent_aeep1_ = $this->porcent_aeep1_;
   $unformatted_value_val_acumulada_ = $this->val_acumulada_;
   $unformatted_value_val_requerida_ = $this->val_requerida_;

   $nm_comando = "SELECT idstudents, concat_ws(' ',primer_apellido, segundo_apellido,primer_nombre, segundo_nombre) as nombre
FROM students 
ORDER BY nombre";

   $this->inasistencia_p1_ = $old_value_inasistencia_p1_;
   $this->eval_1_per_ = $old_value_eval_1_per_;
   $this->dc1_ = $old_value_dc1_;
   $this->dc2_ = $old_value_dc2_;
   $this->dc3_ = $old_value_dc3_;
   $this->dc4_ = $old_value_dc4_;
   $this->dc5_ = $old_value_dc5_;
   $this->pcent_dc_ = $old_value_pcent_dc_;
   $this->dp1_ = $old_value_dp1_;
   $this->dp2_ = $old_value_dp2_;
   $this->dp3_ = $old_value_dp3_;
   $this->pcent_dp_ = $old_value_pcent_dp_;
   $this->ds1_ = $old_value_ds1_;
   $this->ds2_ = $old_value_ds2_;
   $this->ds3_ = $old_value_ds3_;
   $this->pcent_ds_ = $old_value_pcent_ds_;
   $this->aeep1_ = $old_value_aeep1_;
   $this->porcent_aeep1_ = $old_value_porcent_aeep1_;
   $this->val_acumulada_ = $old_value_val_acumulada_;
   $this->val_requerida_ = $old_value_val_requerida_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_t_evaluacion_p1_m3_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_t_evaluacion_p1_m3_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_estudiante_\"";
          if (isset($this->NM_ajax_info['select_html']['id_estudiante_']) && !empty($this->NM_ajax_info['select_html']['id_estudiante_']))
          {
              eval("\$sSelComp = \"" . $this->NM_ajax_info['select_html']['id_estudiante_'] . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("id_estudiante_", $this->nmgp_refresh_fields)) ? 'select' : 'text';
                  $this->NM_ajax_info['fldList']['id_estudiante_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => $Nm_tp_obj,
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_estudiante_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_estudiante_' . $sc_seq_vert]['valList'][$i] = form_t_evaluacion_p1_m3_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_estudiante_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_estudiante_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_estudiante_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatus_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['estatus_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['estatus_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("novedad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['novedad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['novedad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("asienta_inasistencias_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['asienta_inasistencias_']);
                  $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__inasico.png"))
          { 
              $asienta_inasistencias_ = "&nbsp;" ;  
          } 
          else 
          { 
              $asienta_inasistencias_ = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__inasico.png\"/>" ; 
          } 
          $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_form_inasistencias_edit . "', '$this->nm_location', 'par_idstudents?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_estudiante_'] . "?@?par_id_grado?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_grado_'] . "?@?par_id_grupo?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_grupo_'] . "?@?par_id_asignatura?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_asignatura_'] . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?S?@?', '', '_self', '0', '0', 'form_inasistencias')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $asienta_inasistencias_ . "</font></a>";
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['asienta_inasistencias_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'imagehtml',
                       'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("inasistencia_p1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['inasistencia_p1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['inasistencia_p1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("eval_1_per_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['eval_1_per_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['eval_1_per_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dc1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dc1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dc1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dc2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dc2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dc2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dc3_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dc3_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dc3_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dc4_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dc4_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dc4_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dc5_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dc5_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dc5_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pcent_dc_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['pcent_dc_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['pcent_dc_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dp1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dp1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dp1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dp2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dp2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dp2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dp3_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dp3_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dp3_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pcent_dp_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['pcent_dp_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['pcent_dp_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ds1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ds1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['ds1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ds2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ds2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['ds2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ds3_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ds3_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['ds3_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pcent_ds_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['pcent_ds_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['pcent_ds_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("aeep1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['aeep1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['aeep1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("porcent_aeep1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['porcent_aeep1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['porcent_aeep1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("val_acumulada_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['val_acumulada_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['val_acumulada_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("val_requerida_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['val_requerida_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['val_requerida_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_id_grado'] = $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_grado_']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_id_grupo'] = $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_grupo_']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_id_asign'] = $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_asignatura_']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_par_idgrupo'] = $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_grupo_']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_par_asign'] = $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_asignatura_']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_par_idgrado'] = $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_grado_']);
   } // ajax_add_parameters
  function nm_proc_onload_record($sc_seq_vert=0)
  {
  }
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_id_estudiante_ = $this->id_estudiante_;
}
if (!isset($this->sc_temp_par_idestudiante)) {$this->sc_temp_par_idestudiante = (isset($_SESSION['par_idestudiante'])) ? $_SESSION['par_idestudiante'] : "";}
if (!isset($this->sc_temp_par_periodo)) {$this->sc_temp_par_periodo = (isset($_SESSION['par_periodo'])) ? $_SESSION['par_periodo'] : "";}
if (!isset($this->sc_temp_nombre_asignatura)) {$this->sc_temp_nombre_asignatura = (isset($_SESSION['nombre_asignatura'])) ? $_SESSION['nombre_asignatura'] : "";}
if (!isset($this->sc_temp_par_asignatura)) {$this->sc_temp_par_asignatura = (isset($_SESSION['par_asignatura'])) ? $_SESSION['par_asignatura'] : "";}
                                       


$check_sql = "SELECT asignatura"
   . " FROM t_asignaturas"
   . " WHERE id_asignatura = '" . $this->sc_temp_par_asignatura . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->sc_temp_nombre_asignatura = $this->rs[0][0];
   
}
		else     
{
		     $this->sc_temp_nombre_asignatura = '';
   
}



$check_sql = "SELECT nombre_grupo"
   . " FROM t_grupos"
   . " WHERE id_grupo = '" .$this->id_grupo_ . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->nom_grupo_ = $this->rs[0][0];
   
}
		else     
{
		    $this->nom_grupo_  = '';
    
}


$this->sc_temp_par_periodo= '1';
$this->sc_temp_par_idestudiante=$this->id_estudiante_ ;
if (isset($this->sc_temp_par_asignatura)) { $_SESSION['par_asignatura'] = $this->sc_temp_par_asignatura;}
if (isset($this->sc_temp_nombre_asignatura)) { $_SESSION['nombre_asignatura'] = $this->sc_temp_nombre_asignatura;}
if (isset($this->sc_temp_par_periodo)) { $_SESSION['par_periodo'] = $this->sc_temp_par_periodo;}
if (isset($this->sc_temp_par_idestudiante)) { $_SESSION['par_idestudiante'] = $this->sc_temp_par_idestudiante;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_id_estudiante_ != $this->id_estudiante_ || (isset($bFlagRead_id_estudiante_) && $bFlagRead_id_estudiante_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['id_estudiante_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['id_estudiante_' . $this->nmgp_refresh_row]['valList'] = array($this->id_estudiante_);
        $this->NM_ajax_changed['id_estudiante_'] = true;
    }
}
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off'; 
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->eval_1_per_ = str_replace($sc_parm1, $sc_parm2, $this->eval_1_per_); 
      $this->dc1_ = str_replace($sc_parm1, $sc_parm2, $this->dc1_); 
      $this->dc2_ = str_replace($sc_parm1, $sc_parm2, $this->dc2_); 
      $this->dc3_ = str_replace($sc_parm1, $sc_parm2, $this->dc3_); 
      $this->dc4_ = str_replace($sc_parm1, $sc_parm2, $this->dc4_); 
      $this->dc5_ = str_replace($sc_parm1, $sc_parm2, $this->dc5_); 
      $this->pcent_dc_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_dc_); 
      $this->dp1_ = str_replace($sc_parm1, $sc_parm2, $this->dp1_); 
      $this->dp2_ = str_replace($sc_parm1, $sc_parm2, $this->dp2_); 
      $this->dp3_ = str_replace($sc_parm1, $sc_parm2, $this->dp3_); 
      $this->pcent_dp_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_dp_); 
      $this->ds1_ = str_replace($sc_parm1, $sc_parm2, $this->ds1_); 
      $this->ds2_ = str_replace($sc_parm1, $sc_parm2, $this->ds2_); 
      $this->ds3_ = str_replace($sc_parm1, $sc_parm2, $this->ds3_); 
      $this->pcent_ds_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_ds_); 
      $this->aeep1_ = str_replace($sc_parm1, $sc_parm2, $this->aeep1_); 
      $this->porcent_aeep1_ = str_replace($sc_parm1, $sc_parm2, $this->porcent_aeep1_); 
      $this->val_acumulada_ = str_replace($sc_parm1, $sc_parm2, $this->val_acumulada_); 
      $this->val_requerida_ = str_replace($sc_parm1, $sc_parm2, $this->val_requerida_); 
      $this->ds4_ = str_replace($sc_parm1, $sc_parm2, $this->ds4_); 
      $this->ds5_ = str_replace($sc_parm1, $sc_parm2, $this->ds5_); 
      $this->dp4_ = str_replace($sc_parm1, $sc_parm2, $this->dp4_); 
      $this->dp5_ = str_replace($sc_parm1, $sc_parm2, $this->dp5_); 
      $this->eval_2_per_ = str_replace($sc_parm1, $sc_parm2, $this->eval_2_per_); 
      $this->dc1_2p_ = str_replace($sc_parm1, $sc_parm2, $this->dc1_2p_); 
      $this->dc2_2p_ = str_replace($sc_parm1, $sc_parm2, $this->dc2_2p_); 
      $this->dc3_2p_ = str_replace($sc_parm1, $sc_parm2, $this->dc3_2p_); 
      $this->dc4_2p_ = str_replace($sc_parm1, $sc_parm2, $this->dc4_2p_); 
      $this->dc5_2p_ = str_replace($sc_parm1, $sc_parm2, $this->dc5_2p_); 
      $this->pcent_dc2_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_dc2_); 
      $this->ds1_2p_ = str_replace($sc_parm1, $sc_parm2, $this->ds1_2p_); 
      $this->ds2_2p_ = str_replace($sc_parm1, $sc_parm2, $this->ds2_2p_); 
      $this->ds3_2p_ = str_replace($sc_parm1, $sc_parm2, $this->ds3_2p_); 
      $this->ds4_2p_ = str_replace($sc_parm1, $sc_parm2, $this->ds4_2p_); 
      $this->ds5_2p_ = str_replace($sc_parm1, $sc_parm2, $this->ds5_2p_); 
      $this->pcent_ds2_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_ds2_); 
      $this->dp1_2p_ = str_replace($sc_parm1, $sc_parm2, $this->dp1_2p_); 
      $this->dp2_2p_ = str_replace($sc_parm1, $sc_parm2, $this->dp2_2p_); 
      $this->dp3_2p_ = str_replace($sc_parm1, $sc_parm2, $this->dp3_2p_); 
      $this->dp4_2p_ = str_replace($sc_parm1, $sc_parm2, $this->dp4_2p_); 
      $this->dp5_2p_ = str_replace($sc_parm1, $sc_parm2, $this->dp5_2p_); 
      $this->pcent_dp2_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_dp2_); 
      $this->eval_3_per_ = str_replace($sc_parm1, $sc_parm2, $this->eval_3_per_); 
      $this->dc1_3p_ = str_replace($sc_parm1, $sc_parm2, $this->dc1_3p_); 
      $this->dc2_3p_ = str_replace($sc_parm1, $sc_parm2, $this->dc2_3p_); 
      $this->dc3_3p_ = str_replace($sc_parm1, $sc_parm2, $this->dc3_3p_); 
      $this->dc4_3p_ = str_replace($sc_parm1, $sc_parm2, $this->dc4_3p_); 
      $this->dc5_3p_ = str_replace($sc_parm1, $sc_parm2, $this->dc5_3p_); 
      $this->pcent_dc3_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_dc3_); 
      $this->ds1_p3_ = str_replace($sc_parm1, $sc_parm2, $this->ds1_p3_); 
      $this->ds2_p3_ = str_replace($sc_parm1, $sc_parm2, $this->ds2_p3_); 
      $this->ds3_p3_ = str_replace($sc_parm1, $sc_parm2, $this->ds3_p3_); 
      $this->ds4_p3_ = str_replace($sc_parm1, $sc_parm2, $this->ds4_p3_); 
      $this->ds5_p3_ = str_replace($sc_parm1, $sc_parm2, $this->ds5_p3_); 
      $this->pcent_ds3_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_ds3_); 
      $this->dp1_p3_ = str_replace($sc_parm1, $sc_parm2, $this->dp1_p3_); 
      $this->dp2_p3_ = str_replace($sc_parm1, $sc_parm2, $this->dp2_p3_); 
      $this->dp3_p3_ = str_replace($sc_parm1, $sc_parm2, $this->dp3_p3_); 
      $this->dp4_p3_ = str_replace($sc_parm1, $sc_parm2, $this->dp4_p3_); 
      $this->sc_field_0_ = str_replace($sc_parm1, $sc_parm2, $this->sc_field_0_); 
      $this->pcent_dp3_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_dp3_); 
      $this->eval_4_per_ = str_replace($sc_parm1, $sc_parm2, $this->eval_4_per_); 
      $this->dc1_p4_ = str_replace($sc_parm1, $sc_parm2, $this->dc1_p4_); 
      $this->dc2_p4_ = str_replace($sc_parm1, $sc_parm2, $this->dc2_p4_); 
      $this->dc3_p4_ = str_replace($sc_parm1, $sc_parm2, $this->dc3_p4_); 
      $this->dc4_p4_ = str_replace($sc_parm1, $sc_parm2, $this->dc4_p4_); 
      $this->dc5_p4_ = str_replace($sc_parm1, $sc_parm2, $this->dc5_p4_); 
      $this->pcent_dc4_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_dc4_); 
      $this->ds1_p4_ = str_replace($sc_parm1, $sc_parm2, $this->ds1_p4_); 
      $this->ds2_p4_ = str_replace($sc_parm1, $sc_parm2, $this->ds2_p4_); 
      $this->ds3_p4_ = str_replace($sc_parm1, $sc_parm2, $this->ds3_p4_); 
      $this->ds4_p4_ = str_replace($sc_parm1, $sc_parm2, $this->ds4_p4_); 
      $this->ds5_p4_ = str_replace($sc_parm1, $sc_parm2, $this->ds5_p4_); 
      $this->pcent_ds4_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_ds4_); 
      $this->dp1_p4_ = str_replace($sc_parm1, $sc_parm2, $this->dp1_p4_); 
      $this->dp2_p4_ = str_replace($sc_parm1, $sc_parm2, $this->dp2_p4_); 
      $this->dp3_p4_ = str_replace($sc_parm1, $sc_parm2, $this->dp3_p4_); 
      $this->dp4_p4_ = str_replace($sc_parm1, $sc_parm2, $this->dp4_p4_); 
      $this->dp5_p4_ = str_replace($sc_parm1, $sc_parm2, $this->dp5_p4_); 
      $this->pcent_dp4_ = str_replace($sc_parm1, $sc_parm2, $this->pcent_dp4_); 
      $this->eval_final_ = str_replace($sc_parm1, $sc_parm2, $this->eval_final_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->eval_1_per_ = "'" . $this->eval_1_per_ . "'";
      $this->dc1_ = "'" . $this->dc1_ . "'";
      $this->dc2_ = "'" . $this->dc2_ . "'";
      $this->dc3_ = "'" . $this->dc3_ . "'";
      $this->dc4_ = "'" . $this->dc4_ . "'";
      $this->dc5_ = "'" . $this->dc5_ . "'";
      $this->pcent_dc_ = "'" . $this->pcent_dc_ . "'";
      $this->dp1_ = "'" . $this->dp1_ . "'";
      $this->dp2_ = "'" . $this->dp2_ . "'";
      $this->dp3_ = "'" . $this->dp3_ . "'";
      $this->pcent_dp_ = "'" . $this->pcent_dp_ . "'";
      $this->ds1_ = "'" . $this->ds1_ . "'";
      $this->ds2_ = "'" . $this->ds2_ . "'";
      $this->ds3_ = "'" . $this->ds3_ . "'";
      $this->pcent_ds_ = "'" . $this->pcent_ds_ . "'";
      $this->aeep1_ = "'" . $this->aeep1_ . "'";
      $this->porcent_aeep1_ = "'" . $this->porcent_aeep1_ . "'";
      $this->val_acumulada_ = "'" . $this->val_acumulada_ . "'";
      $this->val_requerida_ = "'" . $this->val_requerida_ . "'";
      $this->ds4_ = "'" . $this->ds4_ . "'";
      $this->ds5_ = "'" . $this->ds5_ . "'";
      $this->dp4_ = "'" . $this->dp4_ . "'";
      $this->dp5_ = "'" . $this->dp5_ . "'";
      $this->eval_2_per_ = "'" . $this->eval_2_per_ . "'";
      $this->dc1_2p_ = "'" . $this->dc1_2p_ . "'";
      $this->dc2_2p_ = "'" . $this->dc2_2p_ . "'";
      $this->dc3_2p_ = "'" . $this->dc3_2p_ . "'";
      $this->dc4_2p_ = "'" . $this->dc4_2p_ . "'";
      $this->dc5_2p_ = "'" . $this->dc5_2p_ . "'";
      $this->pcent_dc2_ = "'" . $this->pcent_dc2_ . "'";
      $this->ds1_2p_ = "'" . $this->ds1_2p_ . "'";
      $this->ds2_2p_ = "'" . $this->ds2_2p_ . "'";
      $this->ds3_2p_ = "'" . $this->ds3_2p_ . "'";
      $this->ds4_2p_ = "'" . $this->ds4_2p_ . "'";
      $this->ds5_2p_ = "'" . $this->ds5_2p_ . "'";
      $this->pcent_ds2_ = "'" . $this->pcent_ds2_ . "'";
      $this->dp1_2p_ = "'" . $this->dp1_2p_ . "'";
      $this->dp2_2p_ = "'" . $this->dp2_2p_ . "'";
      $this->dp3_2p_ = "'" . $this->dp3_2p_ . "'";
      $this->dp4_2p_ = "'" . $this->dp4_2p_ . "'";
      $this->dp5_2p_ = "'" . $this->dp5_2p_ . "'";
      $this->pcent_dp2_ = "'" . $this->pcent_dp2_ . "'";
      $this->eval_3_per_ = "'" . $this->eval_3_per_ . "'";
      $this->dc1_3p_ = "'" . $this->dc1_3p_ . "'";
      $this->dc2_3p_ = "'" . $this->dc2_3p_ . "'";
      $this->dc3_3p_ = "'" . $this->dc3_3p_ . "'";
      $this->dc4_3p_ = "'" . $this->dc4_3p_ . "'";
      $this->dc5_3p_ = "'" . $this->dc5_3p_ . "'";
      $this->pcent_dc3_ = "'" . $this->pcent_dc3_ . "'";
      $this->ds1_p3_ = "'" . $this->ds1_p3_ . "'";
      $this->ds2_p3_ = "'" . $this->ds2_p3_ . "'";
      $this->ds3_p3_ = "'" . $this->ds3_p3_ . "'";
      $this->ds4_p3_ = "'" . $this->ds4_p3_ . "'";
      $this->ds5_p3_ = "'" . $this->ds5_p3_ . "'";
      $this->pcent_ds3_ = "'" . $this->pcent_ds3_ . "'";
      $this->dp1_p3_ = "'" . $this->dp1_p3_ . "'";
      $this->dp2_p3_ = "'" . $this->dp2_p3_ . "'";
      $this->dp3_p3_ = "'" . $this->dp3_p3_ . "'";
      $this->dp4_p3_ = "'" . $this->dp4_p3_ . "'";
      $this->sc_field_0_ = "'" . $this->sc_field_0_ . "'";
      $this->pcent_dp3_ = "'" . $this->pcent_dp3_ . "'";
      $this->eval_4_per_ = "'" . $this->eval_4_per_ . "'";
      $this->dc1_p4_ = "'" . $this->dc1_p4_ . "'";
      $this->dc2_p4_ = "'" . $this->dc2_p4_ . "'";
      $this->dc3_p4_ = "'" . $this->dc3_p4_ . "'";
      $this->dc4_p4_ = "'" . $this->dc4_p4_ . "'";
      $this->dc5_p4_ = "'" . $this->dc5_p4_ . "'";
      $this->pcent_dc4_ = "'" . $this->pcent_dc4_ . "'";
      $this->ds1_p4_ = "'" . $this->ds1_p4_ . "'";
      $this->ds2_p4_ = "'" . $this->ds2_p4_ . "'";
      $this->ds3_p4_ = "'" . $this->ds3_p4_ . "'";
      $this->ds4_p4_ = "'" . $this->ds4_p4_ . "'";
      $this->ds5_p4_ = "'" . $this->ds5_p4_ . "'";
      $this->pcent_ds4_ = "'" . $this->pcent_ds4_ . "'";
      $this->dp1_p4_ = "'" . $this->dp1_p4_ . "'";
      $this->dp2_p4_ = "'" . $this->dp2_p4_ . "'";
      $this->dp3_p4_ = "'" . $this->dp3_p4_ . "'";
      $this->dp4_p4_ = "'" . $this->dp4_p4_ . "'";
      $this->dp5_p4_ = "'" . $this->dp5_p4_ . "'";
      $this->pcent_dp4_ = "'" . $this->pcent_dp4_ . "'";
      $this->eval_final_ = "'" . $this->eval_final_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->eval_1_per_ = str_replace("'", "", $this->eval_1_per_); 
      $this->dc1_ = str_replace("'", "", $this->dc1_); 
      $this->dc2_ = str_replace("'", "", $this->dc2_); 
      $this->dc3_ = str_replace("'", "", $this->dc3_); 
      $this->dc4_ = str_replace("'", "", $this->dc4_); 
      $this->dc5_ = str_replace("'", "", $this->dc5_); 
      $this->pcent_dc_ = str_replace("'", "", $this->pcent_dc_); 
      $this->dp1_ = str_replace("'", "", $this->dp1_); 
      $this->dp2_ = str_replace("'", "", $this->dp2_); 
      $this->dp3_ = str_replace("'", "", $this->dp3_); 
      $this->pcent_dp_ = str_replace("'", "", $this->pcent_dp_); 
      $this->ds1_ = str_replace("'", "", $this->ds1_); 
      $this->ds2_ = str_replace("'", "", $this->ds2_); 
      $this->ds3_ = str_replace("'", "", $this->ds3_); 
      $this->pcent_ds_ = str_replace("'", "", $this->pcent_ds_); 
      $this->aeep1_ = str_replace("'", "", $this->aeep1_); 
      $this->porcent_aeep1_ = str_replace("'", "", $this->porcent_aeep1_); 
      $this->val_acumulada_ = str_replace("'", "", $this->val_acumulada_); 
      $this->val_requerida_ = str_replace("'", "", $this->val_requerida_); 
      $this->ds4_ = str_replace("'", "", $this->ds4_); 
      $this->ds5_ = str_replace("'", "", $this->ds5_); 
      $this->dp4_ = str_replace("'", "", $this->dp4_); 
      $this->dp5_ = str_replace("'", "", $this->dp5_); 
      $this->eval_2_per_ = str_replace("'", "", $this->eval_2_per_); 
      $this->dc1_2p_ = str_replace("'", "", $this->dc1_2p_); 
      $this->dc2_2p_ = str_replace("'", "", $this->dc2_2p_); 
      $this->dc3_2p_ = str_replace("'", "", $this->dc3_2p_); 
      $this->dc4_2p_ = str_replace("'", "", $this->dc4_2p_); 
      $this->dc5_2p_ = str_replace("'", "", $this->dc5_2p_); 
      $this->pcent_dc2_ = str_replace("'", "", $this->pcent_dc2_); 
      $this->ds1_2p_ = str_replace("'", "", $this->ds1_2p_); 
      $this->ds2_2p_ = str_replace("'", "", $this->ds2_2p_); 
      $this->ds3_2p_ = str_replace("'", "", $this->ds3_2p_); 
      $this->ds4_2p_ = str_replace("'", "", $this->ds4_2p_); 
      $this->ds5_2p_ = str_replace("'", "", $this->ds5_2p_); 
      $this->pcent_ds2_ = str_replace("'", "", $this->pcent_ds2_); 
      $this->dp1_2p_ = str_replace("'", "", $this->dp1_2p_); 
      $this->dp2_2p_ = str_replace("'", "", $this->dp2_2p_); 
      $this->dp3_2p_ = str_replace("'", "", $this->dp3_2p_); 
      $this->dp4_2p_ = str_replace("'", "", $this->dp4_2p_); 
      $this->dp5_2p_ = str_replace("'", "", $this->dp5_2p_); 
      $this->pcent_dp2_ = str_replace("'", "", $this->pcent_dp2_); 
      $this->eval_3_per_ = str_replace("'", "", $this->eval_3_per_); 
      $this->dc1_3p_ = str_replace("'", "", $this->dc1_3p_); 
      $this->dc2_3p_ = str_replace("'", "", $this->dc2_3p_); 
      $this->dc3_3p_ = str_replace("'", "", $this->dc3_3p_); 
      $this->dc4_3p_ = str_replace("'", "", $this->dc4_3p_); 
      $this->dc5_3p_ = str_replace("'", "", $this->dc5_3p_); 
      $this->pcent_dc3_ = str_replace("'", "", $this->pcent_dc3_); 
      $this->ds1_p3_ = str_replace("'", "", $this->ds1_p3_); 
      $this->ds2_p3_ = str_replace("'", "", $this->ds2_p3_); 
      $this->ds3_p3_ = str_replace("'", "", $this->ds3_p3_); 
      $this->ds4_p3_ = str_replace("'", "", $this->ds4_p3_); 
      $this->ds5_p3_ = str_replace("'", "", $this->ds5_p3_); 
      $this->pcent_ds3_ = str_replace("'", "", $this->pcent_ds3_); 
      $this->dp1_p3_ = str_replace("'", "", $this->dp1_p3_); 
      $this->dp2_p3_ = str_replace("'", "", $this->dp2_p3_); 
      $this->dp3_p3_ = str_replace("'", "", $this->dp3_p3_); 
      $this->dp4_p3_ = str_replace("'", "", $this->dp4_p3_); 
      $this->sc_field_0_ = str_replace("'", "", $this->sc_field_0_); 
      $this->pcent_dp3_ = str_replace("'", "", $this->pcent_dp3_); 
      $this->eval_4_per_ = str_replace("'", "", $this->eval_4_per_); 
      $this->dc1_p4_ = str_replace("'", "", $this->dc1_p4_); 
      $this->dc2_p4_ = str_replace("'", "", $this->dc2_p4_); 
      $this->dc3_p4_ = str_replace("'", "", $this->dc3_p4_); 
      $this->dc4_p4_ = str_replace("'", "", $this->dc4_p4_); 
      $this->dc5_p4_ = str_replace("'", "", $this->dc5_p4_); 
      $this->pcent_dc4_ = str_replace("'", "", $this->pcent_dc4_); 
      $this->ds1_p4_ = str_replace("'", "", $this->ds1_p4_); 
      $this->ds2_p4_ = str_replace("'", "", $this->ds2_p4_); 
      $this->ds3_p4_ = str_replace("'", "", $this->ds3_p4_); 
      $this->ds4_p4_ = str_replace("'", "", $this->ds4_p4_); 
      $this->ds5_p4_ = str_replace("'", "", $this->ds5_p4_); 
      $this->pcent_ds4_ = str_replace("'", "", $this->pcent_ds4_); 
      $this->dp1_p4_ = str_replace("'", "", $this->dp1_p4_); 
      $this->dp2_p4_ = str_replace("'", "", $this->dp2_p4_); 
      $this->dp3_p4_ = str_replace("'", "", $this->dp3_p4_); 
      $this->dp4_p4_ = str_replace("'", "", $this->dp4_p4_); 
      $this->dp5_p4_ = str_replace("'", "", $this->dp5_p4_); 
      $this->pcent_dp4_ = str_replace("'", "", $this->pcent_dp4_); 
      $this->eval_final_ = str_replace("'", "", $this->eval_final_); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $SC_tem_cmp_update = true; 
      if ($this->nmgp_opcao == "alterar")
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['id_estudiante_'] == $this->id_estudiante_ &&
              $this->nmgp_dados_select['estatus_'] == $this->estatus_ &&
              $this->nmgp_dados_select['novedad_'] == $this->novedad_ &&
              $this->nmgp_dados_select['inasistencia_p1_'] == $this->inasistencia_p1_ &&
              $this->nmgp_dados_select['eval_1_per_'] == $this->eval_1_per_ &&
              $this->nmgp_dados_select['dc1_'] == $this->dc1_ &&
              $this->nmgp_dados_select['dc2_'] == $this->dc2_ &&
              $this->nmgp_dados_select['dc3_'] == $this->dc3_ &&
              $this->nmgp_dados_select['dc4_'] == $this->dc4_ &&
              $this->nmgp_dados_select['dc5_'] == $this->dc5_ &&
              $this->nmgp_dados_select['pcent_dc_'] == $this->pcent_dc_ &&
              $this->nmgp_dados_select['dp1_'] == $this->dp1_ &&
              $this->nmgp_dados_select['dp2_'] == $this->dp2_ &&
              $this->nmgp_dados_select['dp3_'] == $this->dp3_ &&
              $this->nmgp_dados_select['pcent_dp_'] == $this->pcent_dp_ &&
              $this->nmgp_dados_select['ds1_'] == $this->ds1_ &&
              $this->nmgp_dados_select['ds2_'] == $this->ds2_ &&
              $this->nmgp_dados_select['ds3_'] == $this->ds3_ &&
              $this->nmgp_dados_select['pcent_ds_'] == $this->pcent_ds_ &&
              $this->nmgp_dados_select['aeep1_'] == $this->aeep1_ &&
              $this->nmgp_dados_select['porcent_aeep1_'] == $this->porcent_aeep1_)
          {
              $SC_ex_update = false; 
              $SC_ex_upd_or = false; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['id_estudiante_'] = $this->id_estudiante_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['estatus_'] = $this->estatus_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['novedad_'] = $this->novedad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['inasistencia_p1_'] = $this->inasistencia_p1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['eval_1_per_'] = $this->eval_1_per_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dc1_'] = $this->dc1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dc2_'] = $this->dc2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dc3_'] = $this->dc3_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dc4_'] = $this->dc4_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dc5_'] = $this->dc5_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['pcent_dc_'] = $this->pcent_dc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dp1_'] = $this->dp1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dp2_'] = $this->dp2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dp3_'] = $this->dp3_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['pcent_dp_'] = $this->pcent_dp_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['ds1_'] = $this->ds1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['ds2_'] = $this->ds2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['ds3_'] = $this->ds3_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['pcent_ds_'] = $this->pcent_ds_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['aeep1_'] = $this->aeep1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['porcent_aeep1_'] = $this->porcent_aeep1_;
          }
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['id_estudiante_'] = $this->id_estudiante_;
      $NM_val_form['estatus_'] = $this->estatus_;
      $NM_val_form['novedad_'] = $this->novedad_;
      $NM_val_form['asienta_inasistencias_'] = $this->asienta_inasistencias_;
      $NM_val_form['inasistencia_p1_'] = $this->inasistencia_p1_;
      $NM_val_form['eval_1_per_'] = $this->eval_1_per_;
      $NM_val_form['dc1_'] = $this->dc1_;
      $NM_val_form['dc2_'] = $this->dc2_;
      $NM_val_form['dc3_'] = $this->dc3_;
      $NM_val_form['dc4_'] = $this->dc4_;
      $NM_val_form['dc5_'] = $this->dc5_;
      $NM_val_form['pcent_dc_'] = $this->pcent_dc_;
      $NM_val_form['dp1_'] = $this->dp1_;
      $NM_val_form['dp2_'] = $this->dp2_;
      $NM_val_form['dp3_'] = $this->dp3_;
      $NM_val_form['pcent_dp_'] = $this->pcent_dp_;
      $NM_val_form['ds1_'] = $this->ds1_;
      $NM_val_form['ds2_'] = $this->ds2_;
      $NM_val_form['ds3_'] = $this->ds3_;
      $NM_val_form['pcent_ds_'] = $this->pcent_ds_;
      $NM_val_form['aeep1_'] = $this->aeep1_;
      $NM_val_form['porcent_aeep1_'] = $this->porcent_aeep1_;
      $NM_val_form['val_acumulada_'] = $this->val_acumulada_;
      $NM_val_form['val_requerida_'] = $this->val_requerida_;
      $NM_val_form['primer_apellido_'] = $this->primer_apellido_;
      $NM_val_form['segundo_apellido_'] = $this->segundo_apellido_;
      $NM_val_form['primer_nombre_'] = $this->primer_nombre_;
      $NM_val_form['segundo_nombre_'] = $this->segundo_nombre_;
      $NM_val_form['id_grupo_'] = $this->id_grupo_;
      $NM_val_form['id_area_'] = $this->id_area_;
      $NM_val_form['id_asignatura_'] = $this->id_asignatura_;
      $NM_val_form['id_grado_'] = $this->id_grado_;
      $NM_val_form['id_nivel_'] = $this->id_nivel_;
      $NM_val_form['ihs_'] = $this->ihs_;
      $NM_val_form['pfa_'] = $this->pfa_;
      $NM_val_form['tipo_asig_'] = $this->tipo_asig_;
      $NM_val_form['dc6_'] = $this->dc6_;
      $NM_val_form['dc7_'] = $this->dc7_;
      $NM_val_form['dc8_'] = $this->dc8_;
      $NM_val_form['dc9_'] = $this->dc9_;
      $NM_val_form['ds4_'] = $this->ds4_;
      $NM_val_form['ds5_'] = $this->ds5_;
      $NM_val_form['dp4_'] = $this->dp4_;
      $NM_val_form['dp5_'] = $this->dp5_;
      $NM_val_form['inasistencia_p2_'] = $this->inasistencia_p2_;
      $NM_val_form['eval_2_per_'] = $this->eval_2_per_;
      $NM_val_form['dc1_2p_'] = $this->dc1_2p_;
      $NM_val_form['dc2_2p_'] = $this->dc2_2p_;
      $NM_val_form['dc3_2p_'] = $this->dc3_2p_;
      $NM_val_form['dc4_2p_'] = $this->dc4_2p_;
      $NM_val_form['dc5_2p_'] = $this->dc5_2p_;
      $NM_val_form['pcent_dc2_'] = $this->pcent_dc2_;
      $NM_val_form['ds1_2p_'] = $this->ds1_2p_;
      $NM_val_form['ds2_2p_'] = $this->ds2_2p_;
      $NM_val_form['ds3_2p_'] = $this->ds3_2p_;
      $NM_val_form['ds4_2p_'] = $this->ds4_2p_;
      $NM_val_form['ds5_2p_'] = $this->ds5_2p_;
      $NM_val_form['pcent_ds2_'] = $this->pcent_ds2_;
      $NM_val_form['dp1_2p_'] = $this->dp1_2p_;
      $NM_val_form['dp2_2p_'] = $this->dp2_2p_;
      $NM_val_form['dp3_2p_'] = $this->dp3_2p_;
      $NM_val_form['dp4_2p_'] = $this->dp4_2p_;
      $NM_val_form['dp5_2p_'] = $this->dp5_2p_;
      $NM_val_form['pcent_dp2_'] = $this->pcent_dp2_;
      $NM_val_form['aee_p2_'] = $this->aee_p2_;
      $NM_val_form['porcet_aee_p2_'] = $this->porcet_aee_p2_;
      $NM_val_form['inasistencia_p3_'] = $this->inasistencia_p3_;
      $NM_val_form['eval_3_per_'] = $this->eval_3_per_;
      $NM_val_form['dc1_3p_'] = $this->dc1_3p_;
      $NM_val_form['dc2_3p_'] = $this->dc2_3p_;
      $NM_val_form['dc3_3p_'] = $this->dc3_3p_;
      $NM_val_form['dc4_3p_'] = $this->dc4_3p_;
      $NM_val_form['dc5_3p_'] = $this->dc5_3p_;
      $NM_val_form['pcent_dc3_'] = $this->pcent_dc3_;
      $NM_val_form['ds1_p3_'] = $this->ds1_p3_;
      $NM_val_form['ds2_p3_'] = $this->ds2_p3_;
      $NM_val_form['ds3_p3_'] = $this->ds3_p3_;
      $NM_val_form['ds4_p3_'] = $this->ds4_p3_;
      $NM_val_form['ds5_p3_'] = $this->ds5_p3_;
      $NM_val_form['pcent_ds3_'] = $this->pcent_ds3_;
      $NM_val_form['dp1_p3_'] = $this->dp1_p3_;
      $NM_val_form['dp2_p3_'] = $this->dp2_p3_;
      $NM_val_form['dp3_p3_'] = $this->dp3_p3_;
      $NM_val_form['dp4_p3_'] = $this->dp4_p3_;
      $NM_val_form['sc_field_0_'] = $this->sc_field_0_;
      $NM_val_form['pcent_dp3_'] = $this->pcent_dp3_;
      $NM_val_form['aee_p3_'] = $this->aee_p3_;
      $NM_val_form['porcent_aee_p3_'] = $this->porcent_aee_p3_;
      $NM_val_form['inasistencia_p4_'] = $this->inasistencia_p4_;
      $NM_val_form['eval_4_per_'] = $this->eval_4_per_;
      $NM_val_form['dc1_p4_'] = $this->dc1_p4_;
      $NM_val_form['dc2_p4_'] = $this->dc2_p4_;
      $NM_val_form['dc3_p4_'] = $this->dc3_p4_;
      $NM_val_form['dc4_p4_'] = $this->dc4_p4_;
      $NM_val_form['dc5_p4_'] = $this->dc5_p4_;
      $NM_val_form['pcent_dc4_'] = $this->pcent_dc4_;
      $NM_val_form['ds1_p4_'] = $this->ds1_p4_;
      $NM_val_form['ds2_p4_'] = $this->ds2_p4_;
      $NM_val_form['ds3_p4_'] = $this->ds3_p4_;
      $NM_val_form['ds4_p4_'] = $this->ds4_p4_;
      $NM_val_form['ds5_p4_'] = $this->ds5_p4_;
      $NM_val_form['pcent_ds4_'] = $this->pcent_ds4_;
      $NM_val_form['dp1_p4_'] = $this->dp1_p4_;
      $NM_val_form['dp2_p4_'] = $this->dp2_p4_;
      $NM_val_form['dp3_p4_'] = $this->dp3_p4_;
      $NM_val_form['dp4_p4_'] = $this->dp4_p4_;
      $NM_val_form['dp5_p4_'] = $this->dp5_p4_;
      $NM_val_form['aee_p4_'] = $this->aee_p4_;
      $NM_val_form['porcent_aee_p4_'] = $this->porcent_aee_p4_;
      $NM_val_form['pcent_dp4_'] = $this->pcent_dp4_;
      $NM_val_form['eval_final_'] = $this->eval_final_;
      $NM_val_form['entorno_'] = $this->entorno_;
      $NM_val_form['estudiantes_'] = $this->estudiantes_;
      $NM_val_form['id_novedad_'] = $this->id_novedad_;
      $NM_val_form['nom_grupo_'] = $this->nom_grupo_;
      if ($this->id_estudiante_ == "")  
      { 
          $this->id_estudiante_ = 0;
      } 
      if ($this->id_grupo_ == "")  
      { 
          $this->id_grupo_ = 0;
      } 
      if ($this->id_area_ == "")  
      { 
          $this->id_area_ = 0;
          $this->sc_force_zero[] = 'id_area_';
      } 
      if ($this->id_asignatura_ == "")  
      { 
          $this->id_asignatura_ = 0;
      } 
      if ($this->id_grado_ == "")  
      { 
          $this->id_grado_ = 0;
          $this->sc_force_zero[] = 'id_grado_';
      } 
      if ($this->id_nivel_ == "")  
      { 
          $this->id_nivel_ = 0;
          $this->sc_force_zero[] = 'id_nivel_';
      } 
      if ($this->ihs_ == "")  
      { 
          $this->ihs_ = 0;
          $this->sc_force_zero[] = 'ihs_';
      } 
      if ($this->pfa_ == "")  
      { 
          $this->pfa_ = 0;
          $this->sc_force_zero[] = 'pfa_';
      } 
      if ($this->inasistencia_p1_ == "")  
      { 
          $this->inasistencia_p1_ = 0;
          $this->sc_force_zero[] = 'inasistencia_p1_';
      } 
      if ($this->eval_1_per_ == "")  
      { 
          $this->eval_1_per_ = 0;
          $this->sc_force_zero[] = 'eval_1_per_';
      } 
      if ($this->dc1_ == "")  
      { 
          $this->dc1_ = 0;
          $this->sc_force_zero[] = 'dc1_';
      } 
      if ($this->dc2_ == "")  
      { 
          $this->dc2_ = 0;
          $this->sc_force_zero[] = 'dc2_';
      } 
      if ($this->dc3_ == "")  
      { 
          $this->dc3_ = 0;
          $this->sc_force_zero[] = 'dc3_';
      } 
      if ($this->dc4_ == "")  
      { 
          $this->dc4_ = 0;
          $this->sc_force_zero[] = 'dc4_';
      } 
      if ($this->dc5_ == "")  
      { 
          $this->dc5_ = 0;
          $this->sc_force_zero[] = 'dc5_';
      } 
      if ($this->dc6_ == "")  
      { 
          $this->dc6_ = 0;
          $this->sc_force_zero[] = 'dc6_';
      } 
      if ($this->dc7_ == "")  
      { 
          $this->dc7_ = 0;
          $this->sc_force_zero[] = 'dc7_';
      } 
      if ($this->dc8_ == "")  
      { 
          $this->dc8_ = 0;
          $this->sc_force_zero[] = 'dc8_';
      } 
      if ($this->dc9_ == "")  
      { 
          $this->dc9_ = 0;
          $this->sc_force_zero[] = 'dc9_';
      } 
      if ($this->pcent_dc_ == "")  
      { 
          $this->pcent_dc_ = 0;
          $this->sc_force_zero[] = 'pcent_dc_';
      } 
      if ($this->ds1_ == "")  
      { 
          $this->ds1_ = 0;
          $this->sc_force_zero[] = 'ds1_';
      } 
      if ($this->ds2_ == "")  
      { 
          $this->ds2_ = 0;
          $this->sc_force_zero[] = 'ds2_';
      } 
      if ($this->ds3_ == "")  
      { 
          $this->ds3_ = 0;
          $this->sc_force_zero[] = 'ds3_';
      } 
      if ($this->ds4_ == "")  
      { 
          $this->ds4_ = 0;
          $this->sc_force_zero[] = 'ds4_';
      } 
      if ($this->ds5_ == "")  
      { 
          $this->ds5_ = 0;
          $this->sc_force_zero[] = 'ds5_';
      } 
      if ($this->pcent_ds_ == "")  
      { 
          $this->pcent_ds_ = 0;
          $this->sc_force_zero[] = 'pcent_ds_';
      } 
      if ($this->dp1_ == "")  
      { 
          $this->dp1_ = 0;
          $this->sc_force_zero[] = 'dp1_';
      } 
      if ($this->dp2_ == "")  
      { 
          $this->dp2_ = 0;
          $this->sc_force_zero[] = 'dp2_';
      } 
      if ($this->dp3_ == "")  
      { 
          $this->dp3_ = 0;
          $this->sc_force_zero[] = 'dp3_';
      } 
      if ($this->dp4_ == "")  
      { 
          $this->dp4_ = 0;
          $this->sc_force_zero[] = 'dp4_';
      } 
      if ($this->dp5_ == "")  
      { 
          $this->dp5_ = 0;
          $this->sc_force_zero[] = 'dp5_';
      } 
      if ($this->pcent_dp_ == "")  
      { 
          $this->pcent_dp_ = 0;
          $this->sc_force_zero[] = 'pcent_dp_';
      } 
      if ($this->aeep1_ == "")  
      { 
          $this->aeep1_ = 0;
          $this->sc_force_zero[] = 'aeep1_';
      } 
      if ($this->porcent_aeep1_ == "")  
      { 
          $this->porcent_aeep1_ = 0;
          $this->sc_force_zero[] = 'porcent_aeep1_';
      } 
      if ($this->inasistencia_p2_ == "")  
      { 
          $this->inasistencia_p2_ = 0;
          $this->sc_force_zero[] = 'inasistencia_p2_';
      } 
      if ($this->eval_2_per_ == "")  
      { 
          $this->eval_2_per_ = 0;
          $this->sc_force_zero[] = 'eval_2_per_';
      } 
      if ($this->dc1_2p_ == "")  
      { 
          $this->dc1_2p_ = 0;
          $this->sc_force_zero[] = 'dc1_2p_';
      } 
      if ($this->dc2_2p_ == "")  
      { 
          $this->dc2_2p_ = 0;
          $this->sc_force_zero[] = 'dc2_2p_';
      } 
      if ($this->dc3_2p_ == "")  
      { 
          $this->dc3_2p_ = 0;
          $this->sc_force_zero[] = 'dc3_2p_';
      } 
      if ($this->dc4_2p_ == "")  
      { 
          $this->dc4_2p_ = 0;
          $this->sc_force_zero[] = 'dc4_2p_';
      } 
      if ($this->dc5_2p_ == "")  
      { 
          $this->dc5_2p_ = 0;
          $this->sc_force_zero[] = 'dc5_2p_';
      } 
      if ($this->pcent_dc2_ == "")  
      { 
          $this->pcent_dc2_ = 0;
          $this->sc_force_zero[] = 'pcent_dc2_';
      } 
      if ($this->ds1_2p_ == "")  
      { 
          $this->ds1_2p_ = 0;
          $this->sc_force_zero[] = 'ds1_2p_';
      } 
      if ($this->ds2_2p_ == "")  
      { 
          $this->ds2_2p_ = 0;
          $this->sc_force_zero[] = 'ds2_2p_';
      } 
      if ($this->ds3_2p_ == "")  
      { 
          $this->ds3_2p_ = 0;
          $this->sc_force_zero[] = 'ds3_2p_';
      } 
      if ($this->ds4_2p_ == "")  
      { 
          $this->ds4_2p_ = 0;
          $this->sc_force_zero[] = 'ds4_2p_';
      } 
      if ($this->ds5_2p_ == "")  
      { 
          $this->ds5_2p_ = 0;
          $this->sc_force_zero[] = 'ds5_2p_';
      } 
      if ($this->pcent_ds2_ == "")  
      { 
          $this->pcent_ds2_ = 0;
          $this->sc_force_zero[] = 'pcent_ds2_';
      } 
      if ($this->dp1_2p_ == "")  
      { 
          $this->dp1_2p_ = 0;
          $this->sc_force_zero[] = 'dp1_2p_';
      } 
      if ($this->dp2_2p_ == "")  
      { 
          $this->dp2_2p_ = 0;
          $this->sc_force_zero[] = 'dp2_2p_';
      } 
      if ($this->dp3_2p_ == "")  
      { 
          $this->dp3_2p_ = 0;
          $this->sc_force_zero[] = 'dp3_2p_';
      } 
      if ($this->dp4_2p_ == "")  
      { 
          $this->dp4_2p_ = 0;
          $this->sc_force_zero[] = 'dp4_2p_';
      } 
      if ($this->dp5_2p_ == "")  
      { 
          $this->dp5_2p_ = 0;
          $this->sc_force_zero[] = 'dp5_2p_';
      } 
      if ($this->pcent_dp2_ == "")  
      { 
          $this->pcent_dp2_ = 0;
          $this->sc_force_zero[] = 'pcent_dp2_';
      } 
      if ($this->aee_p2_ == "")  
      { 
          $this->aee_p2_ = 0;
          $this->sc_force_zero[] = 'aee_p2_';
      } 
      if ($this->porcet_aee_p2_ == "")  
      { 
          $this->porcet_aee_p2_ = 0;
          $this->sc_force_zero[] = 'porcet_aee_p2_';
      } 
      if ($this->inasistencia_p3_ == "")  
      { 
          $this->inasistencia_p3_ = 0;
          $this->sc_force_zero[] = 'inasistencia_p3_';
      } 
      if ($this->eval_3_per_ == "")  
      { 
          $this->eval_3_per_ = 0;
          $this->sc_force_zero[] = 'eval_3_per_';
      } 
      if ($this->dc1_3p_ == "")  
      { 
          $this->dc1_3p_ = 0;
          $this->sc_force_zero[] = 'dc1_3p_';
      } 
      if ($this->dc2_3p_ == "")  
      { 
          $this->dc2_3p_ = 0;
          $this->sc_force_zero[] = 'dc2_3p_';
      } 
      if ($this->dc3_3p_ == "")  
      { 
          $this->dc3_3p_ = 0;
          $this->sc_force_zero[] = 'dc3_3p_';
      } 
      if ($this->dc4_3p_ == "")  
      { 
          $this->dc4_3p_ = 0;
          $this->sc_force_zero[] = 'dc4_3p_';
      } 
      if ($this->dc5_3p_ == "")  
      { 
          $this->dc5_3p_ = 0;
          $this->sc_force_zero[] = 'dc5_3p_';
      } 
      if ($this->pcent_dc3_ == "")  
      { 
          $this->pcent_dc3_ = 0;
          $this->sc_force_zero[] = 'pcent_dc3_';
      } 
      if ($this->ds1_p3_ == "")  
      { 
          $this->ds1_p3_ = 0;
          $this->sc_force_zero[] = 'ds1_p3_';
      } 
      if ($this->ds2_p3_ == "")  
      { 
          $this->ds2_p3_ = 0;
          $this->sc_force_zero[] = 'ds2_p3_';
      } 
      if ($this->ds3_p3_ == "")  
      { 
          $this->ds3_p3_ = 0;
          $this->sc_force_zero[] = 'ds3_p3_';
      } 
      if ($this->ds4_p3_ == "")  
      { 
          $this->ds4_p3_ = 0;
          $this->sc_force_zero[] = 'ds4_p3_';
      } 
      if ($this->ds5_p3_ == "")  
      { 
          $this->ds5_p3_ = 0;
          $this->sc_force_zero[] = 'ds5_p3_';
      } 
      if ($this->pcent_ds3_ == "")  
      { 
          $this->pcent_ds3_ = 0;
          $this->sc_force_zero[] = 'pcent_ds3_';
      } 
      if ($this->dp1_p3_ == "")  
      { 
          $this->dp1_p3_ = 0;
          $this->sc_force_zero[] = 'dp1_p3_';
      } 
      if ($this->dp2_p3_ == "")  
      { 
          $this->dp2_p3_ = 0;
          $this->sc_force_zero[] = 'dp2_p3_';
      } 
      if ($this->dp3_p3_ == "")  
      { 
          $this->dp3_p3_ = 0;
          $this->sc_force_zero[] = 'dp3_p3_';
      } 
      if ($this->dp4_p3_ == "")  
      { 
          $this->dp4_p3_ = 0;
          $this->sc_force_zero[] = 'dp4_p3_';
      } 
      if ($this->sc_field_0_ == "")  
      { 
          $this->sc_field_0_ = 0;
          $this->sc_force_zero[] = 'sc_field_0_';
      } 
      if ($this->pcent_dp3_ == "")  
      { 
          $this->pcent_dp3_ = 0;
          $this->sc_force_zero[] = 'pcent_dp3_';
      } 
      if ($this->aee_p3_ == "")  
      { 
          $this->aee_p3_ = 0;
          $this->sc_force_zero[] = 'aee_p3_';
      } 
      if ($this->porcent_aee_p3_ == "")  
      { 
          $this->porcent_aee_p3_ = 0;
          $this->sc_force_zero[] = 'porcent_aee_p3_';
      } 
      if ($this->inasistencia_p4_ == "")  
      { 
          $this->inasistencia_p4_ = 0;
          $this->sc_force_zero[] = 'inasistencia_p4_';
      } 
      if ($this->eval_4_per_ == "")  
      { 
          $this->eval_4_per_ = 0;
          $this->sc_force_zero[] = 'eval_4_per_';
      } 
      if ($this->dc1_p4_ == "")  
      { 
          $this->dc1_p4_ = 0;
          $this->sc_force_zero[] = 'dc1_p4_';
      } 
      if ($this->dc2_p4_ == "")  
      { 
          $this->dc2_p4_ = 0;
          $this->sc_force_zero[] = 'dc2_p4_';
      } 
      if ($this->dc3_p4_ == "")  
      { 
          $this->dc3_p4_ = 0;
          $this->sc_force_zero[] = 'dc3_p4_';
      } 
      if ($this->dc4_p4_ == "")  
      { 
          $this->dc4_p4_ = 0;
          $this->sc_force_zero[] = 'dc4_p4_';
      } 
      if ($this->dc5_p4_ == "")  
      { 
          $this->dc5_p4_ = 0;
          $this->sc_force_zero[] = 'dc5_p4_';
      } 
      if ($this->pcent_dc4_ == "")  
      { 
          $this->pcent_dc4_ = 0;
          $this->sc_force_zero[] = 'pcent_dc4_';
      } 
      if ($this->ds1_p4_ == "")  
      { 
          $this->ds1_p4_ = 0;
          $this->sc_force_zero[] = 'ds1_p4_';
      } 
      if ($this->ds2_p4_ == "")  
      { 
          $this->ds2_p4_ = 0;
          $this->sc_force_zero[] = 'ds2_p4_';
      } 
      if ($this->ds3_p4_ == "")  
      { 
          $this->ds3_p4_ = 0;
          $this->sc_force_zero[] = 'ds3_p4_';
      } 
      if ($this->ds4_p4_ == "")  
      { 
          $this->ds4_p4_ = 0;
          $this->sc_force_zero[] = 'ds4_p4_';
      } 
      if ($this->ds5_p4_ == "")  
      { 
          $this->ds5_p4_ = 0;
          $this->sc_force_zero[] = 'ds5_p4_';
      } 
      if ($this->pcent_ds4_ == "")  
      { 
          $this->pcent_ds4_ = 0;
          $this->sc_force_zero[] = 'pcent_ds4_';
      } 
      if ($this->dp1_p4_ == "")  
      { 
          $this->dp1_p4_ = 0;
          $this->sc_force_zero[] = 'dp1_p4_';
      } 
      if ($this->dp2_p4_ == "")  
      { 
          $this->dp2_p4_ = 0;
          $this->sc_force_zero[] = 'dp2_p4_';
      } 
      if ($this->dp3_p4_ == "")  
      { 
          $this->dp3_p4_ = 0;
          $this->sc_force_zero[] = 'dp3_p4_';
      } 
      if ($this->dp4_p4_ == "")  
      { 
          $this->dp4_p4_ = 0;
          $this->sc_force_zero[] = 'dp4_p4_';
      } 
      if ($this->dp5_p4_ == "")  
      { 
          $this->dp5_p4_ = 0;
          $this->sc_force_zero[] = 'dp5_p4_';
      } 
      if ($this->aee_p4_ == "")  
      { 
          $this->aee_p4_ = 0;
          $this->sc_force_zero[] = 'aee_p4_';
      } 
      if ($this->porcent_aee_p4_ == "")  
      { 
          $this->porcent_aee_p4_ = 0;
          $this->sc_force_zero[] = 'porcent_aee_p4_';
      } 
      if ($this->pcent_dp4_ == "")  
      { 
          $this->pcent_dp4_ = 0;
          $this->sc_force_zero[] = 'pcent_dp4_';
      } 
      if ($this->eval_final_ == "")  
      { 
          $this->eval_final_ = 0;
          $this->sc_force_zero[] = 'eval_final_';
      } 
      if ($this->entorno_ == "")  
      { 
          $this->entorno_ = 0;
          $this->sc_force_zero[] = 'entorno_';
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->primer_apellido__before_qstr = $this->primer_apellido_;
          $this->primer_apellido_ = substr($this->Db->qstr($this->primer_apellido_), 1, -1); 
          $this->segundo_apellido__before_qstr = $this->segundo_apellido_;
          $this->segundo_apellido_ = substr($this->Db->qstr($this->segundo_apellido_), 1, -1); 
          $this->primer_nombre__before_qstr = $this->primer_nombre_;
          $this->primer_nombre_ = substr($this->Db->qstr($this->primer_nombre_), 1, -1); 
          $this->segundo_nombre__before_qstr = $this->segundo_nombre_;
          $this->segundo_nombre_ = substr($this->Db->qstr($this->segundo_nombre_), 1, -1); 
          $this->tipo_asig__before_qstr = $this->tipo_asig_;
          $this->tipo_asig_ = substr($this->Db->qstr($this->tipo_asig_), 1, -1); 
          $this->novedad__before_qstr = $this->novedad_;
          $this->novedad_ = substr($this->Db->qstr($this->novedad_), 1, -1); 
          $this->estatus__before_qstr = $this->estatus_;
          $this->estatus_ = substr($this->Db->qstr($this->estatus_), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante_ and id_grupo = $this->id_grupo_ and id_asignatura = $this->id_asignatura_ ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante_ and id_grupo = $this->id_grupo_ and id_asignatura = $this->id_asignatura_ "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_t_evaluacion_p1_m3_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET novedad = '$this->novedad_', estatus = '$this->estatus_', inasistencia_p1 = $this->inasistencia_p1_, eval_1_per = $this->eval_1_per_, dc1 = $this->dc1_, dc2 = $this->dc2_, dc3 = $this->dc3_, dc4 = $this->dc4_, dc5 = $this->dc5_, pcent_dc = $this->pcent_dc_, ds1 = $this->ds1_, ds2 = $this->ds2_, ds3 = $this->ds3_, pcent_ds = $this->pcent_ds_, dp1 = $this->dp1_, dp2 = $this->dp2_, dp3 = $this->dp3_, pcent_dp = $this->pcent_dp_, aeep1 = $this->aeep1_, porcent_aeep1 = $this->porcent_aeep1_";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET novedad = '$this->novedad_', estatus = '$this->estatus_', inasistencia_p1 = $this->inasistencia_p1_, eval_1_per = $this->eval_1_per_, dc1 = $this->dc1_, dc2 = $this->dc2_, dc3 = $this->dc3_, dc4 = $this->dc4_, dc5 = $this->dc5_, pcent_dc = $this->pcent_dc_, ds1 = $this->ds1_, ds2 = $this->ds2_, ds3 = $this->ds3_, pcent_ds = $this->pcent_ds_, dp1 = $this->dp1_, dp2 = $this->dp2_, dp3 = $this->dp3_, pcent_dp = $this->pcent_dp_, aeep1 = $this->aeep1_, porcent_aeep1 = $this->porcent_aeep1_";  
              } 
              if (isset($NM_val_form['primer_apellido_']) && $NM_val_form['primer_apellido_'] != $this->nmgp_dados_select['primer_apellido_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " primer_apellido = '$this->primer_apellido_'"; 
                  $comando_oracle        .= " primer_apellido = '$this->primer_apellido_'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['segundo_apellido_']) && $NM_val_form['segundo_apellido_'] != $this->nmgp_dados_select['segundo_apellido_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " segundo_apellido = '$this->segundo_apellido_'"; 
                  $comando_oracle        .= " segundo_apellido = '$this->segundo_apellido_'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['primer_nombre_']) && $NM_val_form['primer_nombre_'] != $this->nmgp_dados_select['primer_nombre_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " primer_nombre = '$this->primer_nombre_'"; 
                  $comando_oracle        .= " primer_nombre = '$this->primer_nombre_'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['segundo_nombre_']) && $NM_val_form['segundo_nombre_'] != $this->nmgp_dados_select['segundo_nombre_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " segundo_nombre = '$this->segundo_nombre_'"; 
                  $comando_oracle        .= " segundo_nombre = '$this->segundo_nombre_'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['id_area_']) && $NM_val_form['id_area_'] != $this->nmgp_dados_select['id_area_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " id_area = $this->id_area_"; 
                  $comando_oracle        .= " id_area = $this->id_area_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['id_grado_']) && $NM_val_form['id_grado_'] != $this->nmgp_dados_select['id_grado_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " id_grado = $this->id_grado_"; 
                  $comando_oracle        .= " id_grado = $this->id_grado_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['id_nivel_']) && $NM_val_form['id_nivel_'] != $this->nmgp_dados_select['id_nivel_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " id_nivel = $this->id_nivel_"; 
                  $comando_oracle        .= " id_nivel = $this->id_nivel_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ihs_']) && $NM_val_form['ihs_'] != $this->nmgp_dados_select['ihs_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ihs = $this->ihs_"; 
                  $comando_oracle        .= " ihs = $this->ihs_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pfa_']) && $NM_val_form['pfa_'] != $this->nmgp_dados_select['pfa_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pfa = $this->pfa_"; 
                  $comando_oracle        .= " pfa = $this->pfa_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['tipo_asig_']) && $NM_val_form['tipo_asig_'] != $this->nmgp_dados_select['tipo_asig_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " tipo_asig = '$this->tipo_asig_'"; 
                  $comando_oracle        .= " tipo_asig = '$this->tipo_asig_'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc6_']) && $NM_val_form['dc6_'] != $this->nmgp_dados_select['dc6_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc6 = $this->dc6_"; 
                  $comando_oracle        .= " dc6 = $this->dc6_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc7_']) && $NM_val_form['dc7_'] != $this->nmgp_dados_select['dc7_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc7 = $this->dc7_"; 
                  $comando_oracle        .= " dc7 = $this->dc7_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc8_']) && $NM_val_form['dc8_'] != $this->nmgp_dados_select['dc8_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc8 = $this->dc8_"; 
                  $comando_oracle        .= " dc8 = $this->dc8_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc9_']) && $NM_val_form['dc9_'] != $this->nmgp_dados_select['dc9_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc9 = $this->dc9_"; 
                  $comando_oracle        .= " dc9 = $this->dc9_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds4_']) && $NM_val_form['ds4_'] != $this->nmgp_dados_select['ds4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds4 = $this->ds4_"; 
                  $comando_oracle        .= " ds4 = $this->ds4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds5_']) && $NM_val_form['ds5_'] != $this->nmgp_dados_select['ds5_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds5 = $this->ds5_"; 
                  $comando_oracle        .= " ds5 = $this->ds5_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp4_']) && $NM_val_form['dp4_'] != $this->nmgp_dados_select['dp4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp4 = $this->dp4_"; 
                  $comando_oracle        .= " dp4 = $this->dp4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp5_']) && $NM_val_form['dp5_'] != $this->nmgp_dados_select['dp5_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp5 = $this->dp5_"; 
                  $comando_oracle        .= " dp5 = $this->dp5_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['inasistencia_p2_']) && $NM_val_form['inasistencia_p2_'] != $this->nmgp_dados_select['inasistencia_p2_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " inasistencia_p2 = $this->inasistencia_p2_"; 
                  $comando_oracle        .= " inasistencia_p2 = $this->inasistencia_p2_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['eval_2_per_']) && $NM_val_form['eval_2_per_'] != $this->nmgp_dados_select['eval_2_per_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " eval_2_per = $this->eval_2_per_"; 
                  $comando_oracle        .= " eval_2_per = $this->eval_2_per_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc1_2p_']) && $NM_val_form['dc1_2p_'] != $this->nmgp_dados_select['dc1_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc1_2p = $this->dc1_2p_"; 
                  $comando_oracle        .= " dc1_2p = $this->dc1_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc2_2p_']) && $NM_val_form['dc2_2p_'] != $this->nmgp_dados_select['dc2_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc2_2p = $this->dc2_2p_"; 
                  $comando_oracle        .= " dc2_2p = $this->dc2_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc3_2p_']) && $NM_val_form['dc3_2p_'] != $this->nmgp_dados_select['dc3_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc3_2p = $this->dc3_2p_"; 
                  $comando_oracle        .= " dc3_2p = $this->dc3_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc4_2p_']) && $NM_val_form['dc4_2p_'] != $this->nmgp_dados_select['dc4_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc4_2p = $this->dc4_2p_"; 
                  $comando_oracle        .= " dc4_2p = $this->dc4_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc5_2p_']) && $NM_val_form['dc5_2p_'] != $this->nmgp_dados_select['dc5_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc5_2p = $this->dc5_2p_"; 
                  $comando_oracle        .= " dc5_2p = $this->dc5_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dc2_']) && $NM_val_form['pcent_dc2_'] != $this->nmgp_dados_select['pcent_dc2_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dc2 = $this->pcent_dc2_"; 
                  $comando_oracle        .= " pcent_dc2 = $this->pcent_dc2_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds1_2p_']) && $NM_val_form['ds1_2p_'] != $this->nmgp_dados_select['ds1_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds1_2p = $this->ds1_2p_"; 
                  $comando_oracle        .= " ds1_2p = $this->ds1_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds2_2p_']) && $NM_val_form['ds2_2p_'] != $this->nmgp_dados_select['ds2_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds2_2p = $this->ds2_2p_"; 
                  $comando_oracle        .= " ds2_2p = $this->ds2_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds3_2p_']) && $NM_val_form['ds3_2p_'] != $this->nmgp_dados_select['ds3_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds3_2p = $this->ds3_2p_"; 
                  $comando_oracle        .= " ds3_2p = $this->ds3_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds4_2p_']) && $NM_val_form['ds4_2p_'] != $this->nmgp_dados_select['ds4_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds4_2p = $this->ds4_2p_"; 
                  $comando_oracle        .= " ds4_2p = $this->ds4_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds5_2p_']) && $NM_val_form['ds5_2p_'] != $this->nmgp_dados_select['ds5_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds5_2p = $this->ds5_2p_"; 
                  $comando_oracle        .= " ds5_2p = $this->ds5_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_ds2_']) && $NM_val_form['pcent_ds2_'] != $this->nmgp_dados_select['pcent_ds2_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_ds2 = $this->pcent_ds2_"; 
                  $comando_oracle        .= " pcent_ds2 = $this->pcent_ds2_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp1_2p_']) && $NM_val_form['dp1_2p_'] != $this->nmgp_dados_select['dp1_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp1_2p = $this->dp1_2p_"; 
                  $comando_oracle        .= " dp1_2p = $this->dp1_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp2_2p_']) && $NM_val_form['dp2_2p_'] != $this->nmgp_dados_select['dp2_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp2_2p = $this->dp2_2p_"; 
                  $comando_oracle        .= " dp2_2p = $this->dp2_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp3_2p_']) && $NM_val_form['dp3_2p_'] != $this->nmgp_dados_select['dp3_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp3_2p = $this->dp3_2p_"; 
                  $comando_oracle        .= " dp3_2p = $this->dp3_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp4_2p_']) && $NM_val_form['dp4_2p_'] != $this->nmgp_dados_select['dp4_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp4_2p = $this->dp4_2p_"; 
                  $comando_oracle        .= " dp4_2p = $this->dp4_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp5_2p_']) && $NM_val_form['dp5_2p_'] != $this->nmgp_dados_select['dp5_2p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp5_2p = $this->dp5_2p_"; 
                  $comando_oracle        .= " dp5_2p = $this->dp5_2p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dp2_']) && $NM_val_form['pcent_dp2_'] != $this->nmgp_dados_select['pcent_dp2_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dp2 = $this->pcent_dp2_"; 
                  $comando_oracle        .= " pcent_dp2 = $this->pcent_dp2_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['aee_p2_']) && $NM_val_form['aee_p2_'] != $this->nmgp_dados_select['aee_p2_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " aee_p2 = $this->aee_p2_"; 
                  $comando_oracle        .= " aee_p2 = $this->aee_p2_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['porcet_aee_p2_']) && $NM_val_form['porcet_aee_p2_'] != $this->nmgp_dados_select['porcet_aee_p2_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " porcet_aee_p2 = $this->porcet_aee_p2_"; 
                  $comando_oracle        .= " porcet_aee_p2 = $this->porcet_aee_p2_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['inasistencia_p3_']) && $NM_val_form['inasistencia_p3_'] != $this->nmgp_dados_select['inasistencia_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " inasistencia_p3 = $this->inasistencia_p3_"; 
                  $comando_oracle        .= " inasistencia_p3 = $this->inasistencia_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['eval_3_per_']) && $NM_val_form['eval_3_per_'] != $this->nmgp_dados_select['eval_3_per_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " eval_3_per = $this->eval_3_per_"; 
                  $comando_oracle        .= " eval_3_per = $this->eval_3_per_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc1_3p_']) && $NM_val_form['dc1_3p_'] != $this->nmgp_dados_select['dc1_3p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc1_3p = $this->dc1_3p_"; 
                  $comando_oracle        .= " dc1_3p = $this->dc1_3p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc2_3p_']) && $NM_val_form['dc2_3p_'] != $this->nmgp_dados_select['dc2_3p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc2_3p = $this->dc2_3p_"; 
                  $comando_oracle        .= " dc2_3p = $this->dc2_3p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc3_3p_']) && $NM_val_form['dc3_3p_'] != $this->nmgp_dados_select['dc3_3p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc3_3p = $this->dc3_3p_"; 
                  $comando_oracle        .= " dc3_3p = $this->dc3_3p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc4_3p_']) && $NM_val_form['dc4_3p_'] != $this->nmgp_dados_select['dc4_3p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc4_3p = $this->dc4_3p_"; 
                  $comando_oracle        .= " dc4_3p = $this->dc4_3p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc5_3p_']) && $NM_val_form['dc5_3p_'] != $this->nmgp_dados_select['dc5_3p_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc5_3p = $this->dc5_3p_"; 
                  $comando_oracle        .= " dc5_3p = $this->dc5_3p_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dc3_']) && $NM_val_form['pcent_dc3_'] != $this->nmgp_dados_select['pcent_dc3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dc3 = $this->pcent_dc3_"; 
                  $comando_oracle        .= " pcent_dc3 = $this->pcent_dc3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds1_p3_']) && $NM_val_form['ds1_p3_'] != $this->nmgp_dados_select['ds1_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds1_p3 = $this->ds1_p3_"; 
                  $comando_oracle        .= " ds1_p3 = $this->ds1_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds2_p3_']) && $NM_val_form['ds2_p3_'] != $this->nmgp_dados_select['ds2_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds2_p3 = $this->ds2_p3_"; 
                  $comando_oracle        .= " ds2_p3 = $this->ds2_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds3_p3_']) && $NM_val_form['ds3_p3_'] != $this->nmgp_dados_select['ds3_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds3_p3 = $this->ds3_p3_"; 
                  $comando_oracle        .= " ds3_p3 = $this->ds3_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds4_p3_']) && $NM_val_form['ds4_p3_'] != $this->nmgp_dados_select['ds4_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds4_p3 = $this->ds4_p3_"; 
                  $comando_oracle        .= " ds4_p3 = $this->ds4_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds5_p3_']) && $NM_val_form['ds5_p3_'] != $this->nmgp_dados_select['ds5_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds5_p3 = $this->ds5_p3_"; 
                  $comando_oracle        .= " ds5_p3 = $this->ds5_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_ds3_']) && $NM_val_form['pcent_ds3_'] != $this->nmgp_dados_select['pcent_ds3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_ds3 = $this->pcent_ds3_"; 
                  $comando_oracle        .= " pcent_ds3 = $this->pcent_ds3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp1_p3_']) && $NM_val_form['dp1_p3_'] != $this->nmgp_dados_select['dp1_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp1_p3 = $this->dp1_p3_"; 
                  $comando_oracle        .= " dp1_p3 = $this->dp1_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp2_p3_']) && $NM_val_form['dp2_p3_'] != $this->nmgp_dados_select['dp2_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp2_p3 = $this->dp2_p3_"; 
                  $comando_oracle        .= " dp2_p3 = $this->dp2_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp3_p3_']) && $NM_val_form['dp3_p3_'] != $this->nmgp_dados_select['dp3_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp3_p3 = $this->dp3_p3_"; 
                  $comando_oracle        .= " dp3_p3 = $this->dp3_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp4_p3_']) && $NM_val_form['dp4_p3_'] != $this->nmgp_dados_select['dp4_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp4_p3 = $this->dp4_p3_"; 
                  $comando_oracle        .= " dp4_p3 = $this->dp4_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['sc_field_0_']) && $NM_val_form['sc_field_0_'] != $this->nmgp_dados_select['sc_field_0_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " `dp5-p3` = $this->sc_field_0_"; 
                  $comando_oracle        .= " `dp5-p3` = $this->sc_field_0_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dp3_']) && $NM_val_form['pcent_dp3_'] != $this->nmgp_dados_select['pcent_dp3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dp3 = $this->pcent_dp3_"; 
                  $comando_oracle        .= " pcent_dp3 = $this->pcent_dp3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['aee_p3_']) && $NM_val_form['aee_p3_'] != $this->nmgp_dados_select['aee_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " aee_p3 = $this->aee_p3_"; 
                  $comando_oracle        .= " aee_p3 = $this->aee_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['porcent_aee_p3_']) && $NM_val_form['porcent_aee_p3_'] != $this->nmgp_dados_select['porcent_aee_p3_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " porcent_aee_p3 = $this->porcent_aee_p3_"; 
                  $comando_oracle        .= " porcent_aee_p3 = $this->porcent_aee_p3_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['inasistencia_p4_']) && $NM_val_form['inasistencia_p4_'] != $this->nmgp_dados_select['inasistencia_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " inasistencia_p4 = $this->inasistencia_p4_"; 
                  $comando_oracle        .= " inasistencia_p4 = $this->inasistencia_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['eval_4_per_']) && $NM_val_form['eval_4_per_'] != $this->nmgp_dados_select['eval_4_per_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " eval_4_per = $this->eval_4_per_"; 
                  $comando_oracle        .= " eval_4_per = $this->eval_4_per_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc1_p4_']) && $NM_val_form['dc1_p4_'] != $this->nmgp_dados_select['dc1_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc1_p4 = $this->dc1_p4_"; 
                  $comando_oracle        .= " dc1_p4 = $this->dc1_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc2_p4_']) && $NM_val_form['dc2_p4_'] != $this->nmgp_dados_select['dc2_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc2_p4 = $this->dc2_p4_"; 
                  $comando_oracle        .= " dc2_p4 = $this->dc2_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc3_p4_']) && $NM_val_form['dc3_p4_'] != $this->nmgp_dados_select['dc3_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc3_p4 = $this->dc3_p4_"; 
                  $comando_oracle        .= " dc3_p4 = $this->dc3_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc4_p4_']) && $NM_val_form['dc4_p4_'] != $this->nmgp_dados_select['dc4_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc4_p4 = $this->dc4_p4_"; 
                  $comando_oracle        .= " dc4_p4 = $this->dc4_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc5_p4_']) && $NM_val_form['dc5_p4_'] != $this->nmgp_dados_select['dc5_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc5_p4 = $this->dc5_p4_"; 
                  $comando_oracle        .= " dc5_p4 = $this->dc5_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dc4_']) && $NM_val_form['pcent_dc4_'] != $this->nmgp_dados_select['pcent_dc4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dc4 = $this->pcent_dc4_"; 
                  $comando_oracle        .= " pcent_dc4 = $this->pcent_dc4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds1_p4_']) && $NM_val_form['ds1_p4_'] != $this->nmgp_dados_select['ds1_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds1_p4 = $this->ds1_p4_"; 
                  $comando_oracle        .= " ds1_p4 = $this->ds1_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds2_p4_']) && $NM_val_form['ds2_p4_'] != $this->nmgp_dados_select['ds2_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds2_p4 = $this->ds2_p4_"; 
                  $comando_oracle        .= " ds2_p4 = $this->ds2_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds3_p4_']) && $NM_val_form['ds3_p4_'] != $this->nmgp_dados_select['ds3_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds3_p4 = $this->ds3_p4_"; 
                  $comando_oracle        .= " ds3_p4 = $this->ds3_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds4_p4_']) && $NM_val_form['ds4_p4_'] != $this->nmgp_dados_select['ds4_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds4_p4 = $this->ds4_p4_"; 
                  $comando_oracle        .= " ds4_p4 = $this->ds4_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds5_p4_']) && $NM_val_form['ds5_p4_'] != $this->nmgp_dados_select['ds5_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds5_p4 = $this->ds5_p4_"; 
                  $comando_oracle        .= " ds5_p4 = $this->ds5_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_ds4_']) && $NM_val_form['pcent_ds4_'] != $this->nmgp_dados_select['pcent_ds4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_ds4 = $this->pcent_ds4_"; 
                  $comando_oracle        .= " pcent_ds4 = $this->pcent_ds4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp1_p4_']) && $NM_val_form['dp1_p4_'] != $this->nmgp_dados_select['dp1_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp1_p4 = $this->dp1_p4_"; 
                  $comando_oracle        .= " dp1_p4 = $this->dp1_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp2_p4_']) && $NM_val_form['dp2_p4_'] != $this->nmgp_dados_select['dp2_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp2_p4 = $this->dp2_p4_"; 
                  $comando_oracle        .= " dp2_p4 = $this->dp2_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp3_p4_']) && $NM_val_form['dp3_p4_'] != $this->nmgp_dados_select['dp3_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp3_p4 = $this->dp3_p4_"; 
                  $comando_oracle        .= " dp3_p4 = $this->dp3_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp4_p4_']) && $NM_val_form['dp4_p4_'] != $this->nmgp_dados_select['dp4_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp4_p4 = $this->dp4_p4_"; 
                  $comando_oracle        .= " dp4_p4 = $this->dp4_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp5_p4_']) && $NM_val_form['dp5_p4_'] != $this->nmgp_dados_select['dp5_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp5_p4 = $this->dp5_p4_"; 
                  $comando_oracle        .= " dp5_p4 = $this->dp5_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['aee_p4_']) && $NM_val_form['aee_p4_'] != $this->nmgp_dados_select['aee_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " aee_p4 = $this->aee_p4_"; 
                  $comando_oracle        .= " aee_p4 = $this->aee_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['porcent_aee_p4_']) && $NM_val_form['porcent_aee_p4_'] != $this->nmgp_dados_select['porcent_aee_p4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " porcent_aee_p4 = $this->porcent_aee_p4_"; 
                  $comando_oracle        .= " porcent_aee_p4 = $this->porcent_aee_p4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dp4_']) && $NM_val_form['pcent_dp4_'] != $this->nmgp_dados_select['pcent_dp4_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dp4 = $this->pcent_dp4_"; 
                  $comando_oracle        .= " pcent_dp4 = $this->pcent_dp4_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['eval_final_']) && $NM_val_form['eval_final_'] != $this->nmgp_dados_select['eval_final_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " eval_final = $this->eval_final_"; 
                  $comando_oracle        .= " eval_final = $this->eval_final_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['entorno_']) && $NM_val_form['entorno_'] != $this->nmgp_dados_select['entorno_']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " entorno = $this->entorno_"; 
                  $comando_oracle        .= " entorno = $this->entorno_"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE id_estudiante = $this->id_estudiante_ and id_grupo = $this->id_grupo_ and id_asignatura = $this->id_asignatura_ ";  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_t_evaluacion_p1_m3_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->primer_apellido_ = $this->primer_apellido__before_qstr;
          $this->segundo_apellido_ = $this->segundo_apellido__before_qstr;
          $this->primer_nombre_ = $this->primer_nombre__before_qstr;
          $this->segundo_nombre_ = $this->segundo_nombre__before_qstr;
          $this->tipo_asig_ = $this->tipo_asig__before_qstr;
          $this->novedad_ = $this->novedad__before_qstr;
          $this->estatus_ = $this->estatus__before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['db_changed'] = true;

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['id_estudiante_'])) { $this->id_estudiante_ = $NM_val_form['id_estudiante_']; }
              elseif (isset($this->id_estudiante_)) { $this->nm_limpa_alfa($this->id_estudiante_); }
              if     (isset($NM_val_form) && isset($NM_val_form['novedad_'])) { $this->novedad_ = $NM_val_form['novedad_']; }
              elseif (isset($this->novedad_)) { $this->nm_limpa_alfa($this->novedad_); }
              if     (isset($NM_val_form) && isset($NM_val_form['estatus_'])) { $this->estatus_ = $NM_val_form['estatus_']; }
              elseif (isset($this->estatus_)) { $this->nm_limpa_alfa($this->estatus_); }
              if     (isset($NM_val_form) && isset($NM_val_form['inasistencia_p1_'])) { $this->inasistencia_p1_ = $NM_val_form['inasistencia_p1_']; }
              elseif (isset($this->inasistencia_p1_)) { $this->nm_limpa_alfa($this->inasistencia_p1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['eval_1_per_'])) { $this->eval_1_per_ = $NM_val_form['eval_1_per_']; }
              elseif (isset($this->eval_1_per_)) { $this->nm_limpa_alfa($this->eval_1_per_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dc1_'])) { $this->dc1_ = $NM_val_form['dc1_']; }
              elseif (isset($this->dc1_)) { $this->nm_limpa_alfa($this->dc1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dc2_'])) { $this->dc2_ = $NM_val_form['dc2_']; }
              elseif (isset($this->dc2_)) { $this->nm_limpa_alfa($this->dc2_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dc3_'])) { $this->dc3_ = $NM_val_form['dc3_']; }
              elseif (isset($this->dc3_)) { $this->nm_limpa_alfa($this->dc3_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dc4_'])) { $this->dc4_ = $NM_val_form['dc4_']; }
              elseif (isset($this->dc4_)) { $this->nm_limpa_alfa($this->dc4_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dc5_'])) { $this->dc5_ = $NM_val_form['dc5_']; }
              elseif (isset($this->dc5_)) { $this->nm_limpa_alfa($this->dc5_); }
              if     (isset($NM_val_form) && isset($NM_val_form['pcent_dc_'])) { $this->pcent_dc_ = $NM_val_form['pcent_dc_']; }
              elseif (isset($this->pcent_dc_)) { $this->nm_limpa_alfa($this->pcent_dc_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ds1_'])) { $this->ds1_ = $NM_val_form['ds1_']; }
              elseif (isset($this->ds1_)) { $this->nm_limpa_alfa($this->ds1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ds2_'])) { $this->ds2_ = $NM_val_form['ds2_']; }
              elseif (isset($this->ds2_)) { $this->nm_limpa_alfa($this->ds2_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ds3_'])) { $this->ds3_ = $NM_val_form['ds3_']; }
              elseif (isset($this->ds3_)) { $this->nm_limpa_alfa($this->ds3_); }
              if     (isset($NM_val_form) && isset($NM_val_form['pcent_ds_'])) { $this->pcent_ds_ = $NM_val_form['pcent_ds_']; }
              elseif (isset($this->pcent_ds_)) { $this->nm_limpa_alfa($this->pcent_ds_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dp1_'])) { $this->dp1_ = $NM_val_form['dp1_']; }
              elseif (isset($this->dp1_)) { $this->nm_limpa_alfa($this->dp1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dp2_'])) { $this->dp2_ = $NM_val_form['dp2_']; }
              elseif (isset($this->dp2_)) { $this->nm_limpa_alfa($this->dp2_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dp3_'])) { $this->dp3_ = $NM_val_form['dp3_']; }
              elseif (isset($this->dp3_)) { $this->nm_limpa_alfa($this->dp3_); }
              if     (isset($NM_val_form) && isset($NM_val_form['pcent_dp_'])) { $this->pcent_dp_ = $NM_val_form['pcent_dp_']; }
              elseif (isset($this->pcent_dp_)) { $this->nm_limpa_alfa($this->pcent_dp_); }
              if     (isset($NM_val_form) && isset($NM_val_form['aeep1_'])) { $this->aeep1_ = $NM_val_form['aeep1_']; }
              elseif (isset($this->aeep1_)) { $this->nm_limpa_alfa($this->aeep1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['porcent_aeep1_'])) { $this->porcent_aeep1_ = $NM_val_form['porcent_aeep1_']; }
              elseif (isset($this->porcent_aeep1_)) { $this->nm_limpa_alfa($this->porcent_aeep1_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id_estudiante_', 'estatus_', 'novedad_', 'asienta_inasistencias_', 'inasistencia_p1_', 'eval_1_per_', 'dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'pcent_dc_', 'dp1_', 'dp2_', 'dp3_', 'pcent_dp_', 'ds1_', 'ds2_', 'ds3_', 'pcent_ds_', 'aeep1_', 'porcent_aeep1_', 'val_acumulada_', 'val_requerida_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['id_estudiante_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['estatus_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['novedad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['asienta_inasistencias_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['inasistencia_p1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['eval_1_per_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dc1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dc2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dc3_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dc4_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dc5_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['pcent_dc_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dp1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dp2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dp3_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['pcent_dp_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ds1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ds2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ds3_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['pcent_ds_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['aeep1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['porcent_aeep1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['val_acumulada_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['val_requerida_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante_ and id_grupo = $this->id_grupo_ and id_asignatura = $this->id_asignatura_ "; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante_ and id_grupo = $this->id_grupo_ and id_asignatura = $this->id_asignatura_ "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_pkey']; 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_grupo, id_area, id_asignatura, id_grado, id_nivel, ihs, pfa, tipo_asig, novedad, estatus, inasistencia_p1, eval_1_per, dc1, dc2, dc3, dc4, dc5, dc6, dc7, dc8, dc9, pcent_dc, ds1, ds2, ds3, ds4, ds5, pcent_ds, dp1, dp2, dp3, dp4, dp5, pcent_dp, aeep1, porcent_aeep1, inasistencia_p2, eval_2_per, dc1_2p, dc2_2p, dc3_2p, dc4_2p, dc5_2p, pcent_dc2, ds1_2p, ds2_2p, ds3_2p, ds4_2p, ds5_2p, pcent_ds2, dp1_2p, dp2_2p, dp3_2p, dp4_2p, dp5_2p, pcent_dp2, aee_p2, porcet_aee_p2, inasistencia_p3, eval_3_per, dc1_3p, dc2_3p, dc3_3p, dc4_3p, dc5_3p, pcent_dc3, ds1_p3, ds2_p3, ds3_p3, ds4_p3, ds5_p3, pcent_ds3, dp1_p3, dp2_p3, dp3_p3, dp4_p3, `dp5-p3`, pcent_dp3, aee_p3, porcent_aee_p3, inasistencia_p4, eval_4_per, dc1_p4, dc2_p4, dc3_p4, dc4_p4, dc5_p4, pcent_dc4, ds1_p4, ds2_p4, ds3_p4, ds4_p4, ds5_p4, pcent_ds4, dp1_p4, dp2_p4, dp3_p4, dp4_p4, dp5_p4, aee_p4, porcent_aee_p4, pcent_dp4, eval_final, entorno) VALUES (" . $NM_seq_auto . "$this->id_estudiante_, '$this->primer_apellido_', '$this->segundo_apellido_', '$this->primer_nombre_', '$this->segundo_nombre_', $this->id_grupo_, $this->id_area_, $this->id_asignatura_, $this->id_grado_, $this->id_nivel_, $this->ihs_, $this->pfa_, '$this->tipo_asig_', '$this->novedad_', '$this->estatus_', $this->inasistencia_p1_, $this->eval_1_per_, $this->dc1_, $this->dc2_, $this->dc3_, $this->dc4_, $this->dc5_, $this->dc6_, $this->dc7_, $this->dc8_, $this->dc9_, $this->pcent_dc_, $this->ds1_, $this->ds2_, $this->ds3_, $this->ds4_, $this->ds5_, $this->pcent_ds_, $this->dp1_, $this->dp2_, $this->dp3_, $this->dp4_, $this->dp5_, $this->pcent_dp_, $this->aeep1_, $this->porcent_aeep1_, $this->inasistencia_p2_, $this->eval_2_per_, $this->dc1_2p_, $this->dc2_2p_, $this->dc3_2p_, $this->dc4_2p_, $this->dc5_2p_, $this->pcent_dc2_, $this->ds1_2p_, $this->ds2_2p_, $this->ds3_2p_, $this->ds4_2p_, $this->ds5_2p_, $this->pcent_ds2_, $this->dp1_2p_, $this->dp2_2p_, $this->dp3_2p_, $this->dp4_2p_, $this->dp5_2p_, $this->pcent_dp2_, $this->aee_p2_, $this->porcet_aee_p2_, $this->inasistencia_p3_, $this->eval_3_per_, $this->dc1_3p_, $this->dc2_3p_, $this->dc3_3p_, $this->dc4_3p_, $this->dc5_3p_, $this->pcent_dc3_, $this->ds1_p3_, $this->ds2_p3_, $this->ds3_p3_, $this->ds4_p3_, $this->ds5_p3_, $this->pcent_ds3_, $this->dp1_p3_, $this->dp2_p3_, $this->dp3_p3_, $this->dp4_p3_, $this->sc_field_0_, $this->pcent_dp3_, $this->aee_p3_, $this->porcent_aee_p3_, $this->inasistencia_p4_, $this->eval_4_per_, $this->dc1_p4_, $this->dc2_p4_, $this->dc3_p4_, $this->dc4_p4_, $this->dc5_p4_, $this->pcent_dc4_, $this->ds1_p4_, $this->ds2_p4_, $this->ds3_p4_, $this->ds4_p4_, $this->ds5_p4_, $this->pcent_ds4_, $this->dp1_p4_, $this->dp2_p4_, $this->dp3_p4_, $this->dp4_p4_, $this->dp5_p4_, $this->aee_p4_, $this->porcent_aee_p4_, $this->pcent_dp4_, $this->eval_final_, $this->entorno_)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_grupo, id_area, id_asignatura, id_grado, id_nivel, ihs, pfa, tipo_asig, novedad, estatus, inasistencia_p1, eval_1_per, dc1, dc2, dc3, dc4, dc5, dc6, dc7, dc8, dc9, pcent_dc, ds1, ds2, ds3, ds4, ds5, pcent_ds, dp1, dp2, dp3, dp4, dp5, pcent_dp, aeep1, porcent_aeep1, inasistencia_p2, eval_2_per, dc1_2p, dc2_2p, dc3_2p, dc4_2p, dc5_2p, pcent_dc2, ds1_2p, ds2_2p, ds3_2p, ds4_2p, ds5_2p, pcent_ds2, dp1_2p, dp2_2p, dp3_2p, dp4_2p, dp5_2p, pcent_dp2, aee_p2, porcet_aee_p2, inasistencia_p3, eval_3_per, dc1_3p, dc2_3p, dc3_3p, dc4_3p, dc5_3p, pcent_dc3, ds1_p3, ds2_p3, ds3_p3, ds4_p3, ds5_p3, pcent_ds3, dp1_p3, dp2_p3, dp3_p3, dp4_p3, `dp5-p3`, pcent_dp3, aee_p3, porcent_aee_p3, inasistencia_p4, eval_4_per, dc1_p4, dc2_p4, dc3_p4, dc4_p4, dc5_p4, pcent_dc4, ds1_p4, ds2_p4, ds3_p4, ds4_p4, ds5_p4, pcent_ds4, dp1_p4, dp2_p4, dp3_p4, dp4_p4, dp5_p4, aee_p4, porcent_aee_p4, pcent_dp4, eval_final, entorno) VALUES (" . $NM_seq_auto . "$this->id_estudiante_, '$this->primer_apellido_', '$this->segundo_apellido_', '$this->primer_nombre_', '$this->segundo_nombre_', $this->id_grupo_, $this->id_area_, $this->id_asignatura_, $this->id_grado_, $this->id_nivel_, $this->ihs_, $this->pfa_, '$this->tipo_asig_', '$this->novedad_', '$this->estatus_', $this->inasistencia_p1_, $this->eval_1_per_, $this->dc1_, $this->dc2_, $this->dc3_, $this->dc4_, $this->dc5_, $this->dc6_, $this->dc7_, $this->dc8_, $this->dc9_, $this->pcent_dc_, $this->ds1_, $this->ds2_, $this->ds3_, $this->ds4_, $this->ds5_, $this->pcent_ds_, $this->dp1_, $this->dp2_, $this->dp3_, $this->dp4_, $this->dp5_, $this->pcent_dp_, $this->aeep1_, $this->porcent_aeep1_, $this->inasistencia_p2_, $this->eval_2_per_, $this->dc1_2p_, $this->dc2_2p_, $this->dc3_2p_, $this->dc4_2p_, $this->dc5_2p_, $this->pcent_dc2_, $this->ds1_2p_, $this->ds2_2p_, $this->ds3_2p_, $this->ds4_2p_, $this->ds5_2p_, $this->pcent_ds2_, $this->dp1_2p_, $this->dp2_2p_, $this->dp3_2p_, $this->dp4_2p_, $this->dp5_2p_, $this->pcent_dp2_, $this->aee_p2_, $this->porcet_aee_p2_, $this->inasistencia_p3_, $this->eval_3_per_, $this->dc1_3p_, $this->dc2_3p_, $this->dc3_3p_, $this->dc4_3p_, $this->dc5_3p_, $this->pcent_dc3_, $this->ds1_p3_, $this->ds2_p3_, $this->ds3_p3_, $this->ds4_p3_, $this->ds5_p3_, $this->pcent_ds3_, $this->dp1_p3_, $this->dp2_p3_, $this->dp3_p3_, $this->dp4_p3_, $this->sc_field_0_, $this->pcent_dp3_, $this->aee_p3_, $this->porcent_aee_p3_, $this->inasistencia_p4_, $this->eval_4_per_, $this->dc1_p4_, $this->dc2_p4_, $this->dc3_p4_, $this->dc4_p4_, $this->dc5_p4_, $this->pcent_dc4_, $this->ds1_p4_, $this->ds2_p4_, $this->ds3_p4_, $this->ds4_p4_, $this->ds5_p4_, $this->pcent_ds4_, $this->dp1_p4_, $this->dp2_p4_, $this->dp3_p4_, $this->dp4_p4_, $this->dp5_p4_, $this->aee_p4_, $this->porcent_aee_p4_, $this->pcent_dp4_, $this->eval_final_, $this->entorno_)"; 
              }
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_t_evaluacion_p1_m3_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_I_E']++; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['id_estudiante_'] = $this->id_estudiante_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['estatus_'] = $this->estatus_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['novedad_'] = $this->novedad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['inasistencia_p1_'] = $this->inasistencia_p1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['eval_1_per_'] = $this->eval_1_per_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dc1_'] = $this->dc1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dc2_'] = $this->dc2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dc3_'] = $this->dc3_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dc4_'] = $this->dc4_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dc5_'] = $this->dc5_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['pcent_dc_'] = $this->pcent_dc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dp1_'] = $this->dp1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dp2_'] = $this->dp2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['dp3_'] = $this->dp3_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['pcent_dp_'] = $this->pcent_dp_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['ds1_'] = $this->ds1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['ds2_'] = $this->ds2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['ds3_'] = $this->ds3_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['pcent_ds_'] = $this->pcent_ds_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['aeep1_'] = $this->aeep1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert]['porcent_aeep1_'] = $this->porcent_aeep1_;
              if (!empty($this->sc_force_zero))
              {
                  foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
                  {
                      eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
                  }
              }
              $this->sc_force_zero = array();
              if (!empty($NM_val_null))
              {
                  foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
                  {
                      eval('$this->' . $sc_val_null_field . ' = "";');
                  }
              }
              if (isset($this->id_estudiante_)) { $this->nm_limpa_alfa($this->id_estudiante_); }
              if (isset($this->novedad_)) { $this->nm_limpa_alfa($this->novedad_); }
              if (isset($this->estatus_)) { $this->nm_limpa_alfa($this->estatus_); }
              if (isset($this->inasistencia_p1_)) { $this->nm_limpa_alfa($this->inasistencia_p1_); }
              if (isset($this->eval_1_per_)) { $this->nm_limpa_alfa($this->eval_1_per_); }
              if (isset($this->dc1_)) { $this->nm_limpa_alfa($this->dc1_); }
              if (isset($this->dc2_)) { $this->nm_limpa_alfa($this->dc2_); }
              if (isset($this->dc3_)) { $this->nm_limpa_alfa($this->dc3_); }
              if (isset($this->dc4_)) { $this->nm_limpa_alfa($this->dc4_); }
              if (isset($this->dc5_)) { $this->nm_limpa_alfa($this->dc5_); }
              if (isset($this->pcent_dc_)) { $this->nm_limpa_alfa($this->pcent_dc_); }
              if (isset($this->ds1_)) { $this->nm_limpa_alfa($this->ds1_); }
              if (isset($this->ds2_)) { $this->nm_limpa_alfa($this->ds2_); }
              if (isset($this->ds3_)) { $this->nm_limpa_alfa($this->ds3_); }
              if (isset($this->pcent_ds_)) { $this->nm_limpa_alfa($this->pcent_ds_); }
              if (isset($this->dp1_)) { $this->nm_limpa_alfa($this->dp1_); }
              if (isset($this->dp2_)) { $this->nm_limpa_alfa($this->dp2_); }
              if (isset($this->dp3_)) { $this->nm_limpa_alfa($this->dp3_); }
              if (isset($this->pcent_dp_)) { $this->nm_limpa_alfa($this->pcent_dp_); }
              if (isset($this->aeep1_)) { $this->nm_limpa_alfa($this->aeep1_); }
              if (isset($this->porcent_aeep1_)) { $this->nm_limpa_alfa($this->porcent_aeep1_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_inasistencia_p1_ = $this->inasistencia_p1_;
   $old_value_eval_1_per_ = $this->eval_1_per_;
   $old_value_dc1_ = $this->dc1_;
   $old_value_dc2_ = $this->dc2_;
   $old_value_dc3_ = $this->dc3_;
   $old_value_dc4_ = $this->dc4_;
   $old_value_dc5_ = $this->dc5_;
   $old_value_pcent_dc_ = $this->pcent_dc_;
   $old_value_dp1_ = $this->dp1_;
   $old_value_dp2_ = $this->dp2_;
   $old_value_dp3_ = $this->dp3_;
   $old_value_pcent_dp_ = $this->pcent_dp_;
   $old_value_ds1_ = $this->ds1_;
   $old_value_ds2_ = $this->ds2_;
   $old_value_ds3_ = $this->ds3_;
   $old_value_pcent_ds_ = $this->pcent_ds_;
   $old_value_aeep1_ = $this->aeep1_;
   $old_value_porcent_aeep1_ = $this->porcent_aeep1_;
   $old_value_val_acumulada_ = $this->val_acumulada_;
   $old_value_val_requerida_ = $this->val_requerida_;
   $this->nm_tira_formatacao();


   $unformatted_value_inasistencia_p1_ = $this->inasistencia_p1_;
   $unformatted_value_eval_1_per_ = $this->eval_1_per_;
   $unformatted_value_dc1_ = $this->dc1_;
   $unformatted_value_dc2_ = $this->dc2_;
   $unformatted_value_dc3_ = $this->dc3_;
   $unformatted_value_dc4_ = $this->dc4_;
   $unformatted_value_dc5_ = $this->dc5_;
   $unformatted_value_pcent_dc_ = $this->pcent_dc_;
   $unformatted_value_dp1_ = $this->dp1_;
   $unformatted_value_dp2_ = $this->dp2_;
   $unformatted_value_dp3_ = $this->dp3_;
   $unformatted_value_pcent_dp_ = $this->pcent_dp_;
   $unformatted_value_ds1_ = $this->ds1_;
   $unformatted_value_ds2_ = $this->ds2_;
   $unformatted_value_ds3_ = $this->ds3_;
   $unformatted_value_pcent_ds_ = $this->pcent_ds_;
   $unformatted_value_aeep1_ = $this->aeep1_;
   $unformatted_value_porcent_aeep1_ = $this->porcent_aeep1_;
   $unformatted_value_val_acumulada_ = $this->val_acumulada_;
   $unformatted_value_val_requerida_ = $this->val_requerida_;

   $nm_comando = "SELECT idstudents, concat_ws(' ',primer_apellido, segundo_apellido,primer_nombre, segundo_nombre) as nombre
FROM students 
ORDER BY nombre";

   $this->inasistencia_p1_ = $old_value_inasistencia_p1_;
   $this->eval_1_per_ = $old_value_eval_1_per_;
   $this->dc1_ = $old_value_dc1_;
   $this->dc2_ = $old_value_dc2_;
   $this->dc3_ = $old_value_dc3_;
   $this->dc4_ = $old_value_dc4_;
   $this->dc5_ = $old_value_dc5_;
   $this->pcent_dc_ = $old_value_pcent_dc_;
   $this->dp1_ = $old_value_dp1_;
   $this->dp2_ = $old_value_dp2_;
   $this->dp3_ = $old_value_dp3_;
   $this->pcent_dp_ = $old_value_pcent_dp_;
   $this->ds1_ = $old_value_ds1_;
   $this->ds2_ = $old_value_ds2_;
   $this->ds3_ = $old_value_ds3_;
   $this->pcent_ds_ = $old_value_pcent_ds_;
   $this->aeep1_ = $old_value_aeep1_;
   $this->porcent_aeep1_ = $old_value_porcent_aeep1_;
   $this->val_acumulada_ = $old_value_val_acumulada_;
   $this->val_requerida_ = $old_value_val_requerida_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_t_evaluacion_p1_m3_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_t_evaluacion_p1_m3_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['Lookup_id_estudiante_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_t_evaluacion_p1_m3_pack_protect_string(NM_charset_to_utf8($this->id_estudiante_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_estudiante_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_estudiante_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_estudiante_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->id_estudiante_));
                  $this->NM_ajax_info['fldList']['id_estudiante_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_estudiante_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_estudiante_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_estudiante_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_estudiante_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_estudiante_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['estatus_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['estatus_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->estatus_));
                  $this->NM_ajax_info['fldList']['estatus_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_estatus_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['estatus_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['estatus_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['estatus_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['estatus_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['novedad_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['novedad_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->novedad_));
                  $this->NM_ajax_info['fldList']['novedad_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_novedad_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['novedad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['novedad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['novedad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['novedad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__inasico.png"))
          { 
              $asienta_inasistencias_ = "&nbsp;" ;  
          } 
          else 
          { 
              $asienta_inasistencias_ = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__inasico.png\"/>" ; 
          } 
          $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_form_inasistencias_edit . "', '$this->nm_location', 'par_idstudents?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_estudiante_'] . "?@?par_id_grado?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_grado_'] . "?@?par_id_grupo?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_grupo_'] . "?@?par_id_asignatura?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_form'][$sc_seq_vert]['id_asignatura_'] . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?S?@?', '', '_self', '0', '0', 'form_inasistencias')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $asienta_inasistencias_ . "</font></a>";
                  $this->NM_ajax_info['fldList']['asienta_inasistencias_' . $this->nmgp_refresh_row]['type']    = 'imagehtml';
                  $this->NM_ajax_info['fldList']['asienta_inasistencias_' . $this->nmgp_refresh_row]['imgHtml'] = $sTmpImgHtml;
                  $this->NM_ajax_info['fldList']['asienta_inasistencias_' . $this->nmgp_refresh_row]['valList'] = array();
                  $this->NM_ajax_info['fldList']['asienta_inasistencias_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_asienta_inasistencias_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['asienta_inasistencias_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['asienta_inasistencias_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['asienta_inasistencias_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['asienta_inasistencias_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['inasistencia_p1_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['inasistencia_p1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->inasistencia_p1_));
                  $this->NM_ajax_info['fldList']['inasistencia_p1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_inasistencia_p1_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['inasistencia_p1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['inasistencia_p1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['inasistencia_p1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['inasistencia_p1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['eval_1_per_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['eval_1_per_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->eval_1_per_));
                  $this->NM_ajax_info['fldList']['eval_1_per_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_eval_1_per_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['eval_1_per_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['eval_1_per_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['eval_1_per_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['eval_1_per_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dc1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dc1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dc1_));
                  $this->NM_ajax_info['fldList']['dc1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dc1_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dc1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dc1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dc1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dc1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dc2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dc2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dc2_));
                  $this->NM_ajax_info['fldList']['dc2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dc2_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dc2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dc2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dc2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dc2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dc3_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dc3_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dc3_));
                  $this->NM_ajax_info['fldList']['dc3_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dc3_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dc3_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dc3_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dc3_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dc3_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dc4_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dc4_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dc4_));
                  $this->NM_ajax_info['fldList']['dc4_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dc4_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dc4_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dc4_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dc4_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dc4_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dc5_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dc5_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dc5_));
                  $this->NM_ajax_info['fldList']['dc5_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dc5_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dc5_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dc5_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dc5_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dc5_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['pcent_dc_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['pcent_dc_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->pcent_dc_));
                  $this->NM_ajax_info['fldList']['pcent_dc_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_pcent_dc_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['pcent_dc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['pcent_dc_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['pcent_dc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['pcent_dc_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dp1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dp1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dp1_));
                  $this->NM_ajax_info['fldList']['dp1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dp1_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dp1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dp1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dp1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dp1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dp2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dp2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dp2_));
                  $this->NM_ajax_info['fldList']['dp2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dp2_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dp2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dp2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dp2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dp2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dp3_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dp3_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dp3_));
                  $this->NM_ajax_info['fldList']['dp3_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dp3_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dp3_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dp3_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dp3_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dp3_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['pcent_dp_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['pcent_dp_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->pcent_dp_));
                  $this->NM_ajax_info['fldList']['pcent_dp_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_pcent_dp_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['pcent_dp_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['pcent_dp_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['pcent_dp_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['pcent_dp_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['ds1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['ds1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->ds1_));
                  $this->NM_ajax_info['fldList']['ds1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_ds1_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ds1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ds1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ds1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ds1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['ds2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['ds2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->ds2_));
                  $this->NM_ajax_info['fldList']['ds2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_ds2_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ds2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ds2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ds2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ds2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['ds3_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['ds3_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->ds3_));
                  $this->NM_ajax_info['fldList']['ds3_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_ds3_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ds3_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ds3_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ds3_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ds3_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['pcent_ds_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['pcent_ds_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->pcent_ds_));
                  $this->NM_ajax_info['fldList']['pcent_ds_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_pcent_ds_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['pcent_ds_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['pcent_ds_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['pcent_ds_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['pcent_ds_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['aeep1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['aeep1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->aeep1_));
                  $this->NM_ajax_info['fldList']['aeep1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_aeep1_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['aeep1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['aeep1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['aeep1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['aeep1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['porcent_aeep1_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['porcent_aeep1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->porcent_aeep1_));
                  $this->NM_ajax_info['fldList']['porcent_aeep1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_porcent_aeep1_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['porcent_aeep1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['porcent_aeep1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['porcent_aeep1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['porcent_aeep1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['val_acumulada_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['val_acumulada_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->val_acumulada_));
                  $this->NM_ajax_info['fldList']['val_acumulada_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_val_acumulada_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['val_acumulada_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['val_acumulada_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['val_acumulada_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['val_acumulada_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['val_requerida_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['val_requerida_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->val_requerida_));
                  $this->NM_ajax_info['fldList']['val_requerida_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_val_requerida_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['val_requerida_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['val_requerida_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['val_requerida_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['val_requerida_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['id_grupo_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['id_grupo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->id_grupo_));
                  $this->NM_ajax_info['fldList']['id_grupo_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_id_grupo_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_grupo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_grupo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_grupo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_grupo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['id_asignatura_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['id_asignatura_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->id_asignatura_));
                  $this->NM_ajax_info['fldList']['id_asignatura_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_id_asignatura_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_asignatura_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_asignatura_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_asignatura_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_asignatura_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_estudiante_ = substr($this->Db->qstr($this->id_estudiante_), 1, -1); 
          $this->id_grupo_ = substr($this->Db->qstr($this->id_grupo_), 1, -1); 
          $this->id_asignatura_ = substr($this->Db->qstr($this->id_asignatura_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante_ and id_grupo = $this->id_grupo_ and id_asignatura = $this->id_asignatura_"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante_ and id_grupo = $this->id_grupo_ and id_asignatura = $this->id_asignatura_ "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante_ and id_grupo = $this->id_grupo_ and id_asignatura = $this->id_asignatura_ "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante_ and id_grupo = $this->id_grupo_ and id_asignatura = $this->id_asignatura_ "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_t_evaluacion_p1_m3_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_I_E']--; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_excl = true; 
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['parms'] = "id_estudiante_?#?$this->id_estudiante_?@?id_grupo_?#?$this->id_grupo_?@?id_asignatura_?#?$this->id_asignatura_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_estudiante_ = substr($this->Db->qstr($this->id_estudiante_), 1, -1); 
          $this->id_grupo_ = substr($this->Db->qstr($this->id_grupo_), 1, -1); 
          $this->id_asignatura_ = substr($this->Db->qstr($this->id_asignatura_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_t_evaluacion_p1_m3']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['embutida_liga_qtd_reg'];
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_t_evaluacion_p1_m3 = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['parms'] = ""; 
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter'] . ")";
          }
      }
      $sc_where = trim("id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura= " . $_SESSION['par_id_asignatura'] . " AND entorno = " . $_SESSION['entorno'] . "");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->id_estudiante_)
          {
              $aNewWhereCond[] = "id_estudiante = " . $this->id_estudiante_;
          }
          if (null != $this->id_grupo_)
          {
              $aNewWhereCond[] = "id_grupo = " . $this->id_grupo_;
          }
          if (null != $this->id_asignatura_)
          {
              $aNewWhereCond[] = "id_asignatura = " . $this->id_asignatura_;
          }
          if (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total']))
          {
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_t_evaluacion_p1_m3 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total'] = $qt_geral_reg_form_t_evaluacion_p1_m3;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_estudiante_) && !empty($this->id_grupo_) && !empty($this->id_asignatura_))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              $Sel_Chave = "id_estudiante, id_grupo, id_asignatura"; 
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "primer_apellido, segundo_apellido, primer_nombre, segundo_nombre";
              $sc_order_by = str_replace("order by ", "", $sc_order_by);
              $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
              if (!empty($sc_order_by))
              {
                  $nmgp_select .= " order by $sc_order_by "; 
              }
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              while (!$rt->EOF && !$Reg_OK)
              { 
                  if ($rt->fields[0] == $this->id_estudiante_ && $rt->fields[1] == $this->id_grupo_ && $rt->fields[2] == $this->id_asignatura_)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_t_evaluacion_p1_m3 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_t_evaluacion_p1_m3) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] > $qt_geral_reg_form_t_evaluacion_p1_m3)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = $qt_geral_reg_form_t_evaluacion_p1_m3 - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = ($qt_geral_reg_form_t_evaluacion_p1_m3 + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_I_E'] = 0; 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "primer_apellido, segundo_apellido, primer_nombre, segundo_nombre";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['ordem_ord']; 
      } 
      $nmgp_select = "SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_grupo, id_area, id_asignatura, id_grado, id_nivel, ihs, pfa, tipo_asig, novedad, estatus, inasistencia_p1, eval_1_per, dc1, dc2, dc3, dc4, dc5, dc6, dc7, dc8, dc9, pcent_dc, ds1, ds2, ds3, ds4, ds5, pcent_ds, dp1, dp2, dp3, dp4, dp5, pcent_dp, aeep1, porcent_aeep1, inasistencia_p2, eval_2_per, dc1_2p, dc2_2p, dc3_2p, dc4_2p, dc5_2p, pcent_dc2, ds1_2p, ds2_2p, ds3_2p, ds4_2p, ds5_2p, pcent_ds2, dp1_2p, dp2_2p, dp3_2p, dp4_2p, dp5_2p, pcent_dp2, aee_p2, porcet_aee_p2, inasistencia_p3, eval_3_per, dc1_3p, dc2_3p, dc3_3p, dc4_3p, dc5_3p, pcent_dc3, ds1_p3, ds2_p3, ds3_p3, ds4_p3, ds5_p3, pcent_ds3, dp1_p3, dp2_p3, dp3_p3, dp4_p3, `dp5-p3` as sc_field_0_, pcent_dp3, aee_p3, porcent_aee_p3, inasistencia_p4, eval_4_per, dc1_p4, dc2_p4, dc3_p4, dc4_p4, dc5_p4, pcent_dc4, ds1_p4, ds2_p4, ds3_p4, ds4_p4, ds5_p4, pcent_ds4, dp1_p4, dp2_p4, dp3_p4, dp4_p4, dp5_p4, aee_p4, porcent_aee_p4, pcent_dp4, eval_final, entorno from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start']) ;  
                  } 
              } 
          } 
      }
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on")
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->id_estudiante_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_estudiante_'] = $this->id_estudiante_;
              $this->primer_apellido_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['primer_apellido_'] = $this->primer_apellido_;
              $this->segundo_apellido_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['segundo_apellido_'] = $this->segundo_apellido_;
              $this->primer_nombre_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['primer_nombre_'] = $this->primer_nombre_;
              $this->segundo_nombre_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['segundo_nombre_'] = $this->segundo_nombre_;
              $this->id_grupo_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['id_grupo_'] = $this->id_grupo_;
              $this->id_area_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['id_area_'] = $this->id_area_;
              $this->id_asignatura_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['id_asignatura_'] = $this->id_asignatura_;
              $this->id_grado_ = $rs->fields[8] ; 
              $this->nmgp_dados_select['id_grado_'] = $this->id_grado_;
              $this->id_nivel_ = $rs->fields[9] ; 
              $this->nmgp_dados_select['id_nivel_'] = $this->id_nivel_;
              $this->ihs_ = $rs->fields[10] ; 
              $this->nmgp_dados_select['ihs_'] = $this->ihs_;
              $this->pfa_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['pfa_'] = $this->pfa_;
              $this->tipo_asig_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['tipo_asig_'] = $this->tipo_asig_;
              $this->novedad_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['novedad_'] = $this->novedad_;
              $this->estatus_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['estatus_'] = $this->estatus_;
              $this->inasistencia_p1_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['inasistencia_p1_'] = $this->inasistencia_p1_;
              $this->eval_1_per_ = trim($rs->fields[16]) ; 
              $this->nmgp_dados_select['eval_1_per_'] = $this->eval_1_per_;
              $this->dc1_ = trim($rs->fields[17]) ; 
              $this->nmgp_dados_select['dc1_'] = $this->dc1_;
              $this->dc2_ = trim($rs->fields[18]) ; 
              $this->nmgp_dados_select['dc2_'] = $this->dc2_;
              $this->dc3_ = trim($rs->fields[19]) ; 
              $this->nmgp_dados_select['dc3_'] = $this->dc3_;
              $this->dc4_ = trim($rs->fields[20]) ; 
              $this->nmgp_dados_select['dc4_'] = $this->dc4_;
              $this->dc5_ = trim($rs->fields[21]) ; 
              $this->nmgp_dados_select['dc5_'] = $this->dc5_;
              $this->dc6_ = trim($rs->fields[22]) ; 
              $this->nmgp_dados_select['dc6_'] = $this->dc6_;
              $this->dc7_ = trim($rs->fields[23]) ; 
              $this->nmgp_dados_select['dc7_'] = $this->dc7_;
              $this->dc8_ = trim($rs->fields[24]) ; 
              $this->nmgp_dados_select['dc8_'] = $this->dc8_;
              $this->dc9_ = trim($rs->fields[25]) ; 
              $this->nmgp_dados_select['dc9_'] = $this->dc9_;
              $this->pcent_dc_ = trim($rs->fields[26]) ; 
              $this->nmgp_dados_select['pcent_dc_'] = $this->pcent_dc_;
              $this->ds1_ = trim($rs->fields[27]) ; 
              $this->nmgp_dados_select['ds1_'] = $this->ds1_;
              $this->ds2_ = trim($rs->fields[28]) ; 
              $this->nmgp_dados_select['ds2_'] = $this->ds2_;
              $this->ds3_ = trim($rs->fields[29]) ; 
              $this->nmgp_dados_select['ds3_'] = $this->ds3_;
              $this->ds4_ = trim($rs->fields[30]) ; 
              $this->nmgp_dados_select['ds4_'] = $this->ds4_;
              $this->ds5_ = trim($rs->fields[31]) ; 
              $this->nmgp_dados_select['ds5_'] = $this->ds5_;
              $this->pcent_ds_ = trim($rs->fields[32]) ; 
              $this->nmgp_dados_select['pcent_ds_'] = $this->pcent_ds_;
              $this->dp1_ = trim($rs->fields[33]) ; 
              $this->nmgp_dados_select['dp1_'] = $this->dp1_;
              $this->dp2_ = trim($rs->fields[34]) ; 
              $this->nmgp_dados_select['dp2_'] = $this->dp2_;
              $this->dp3_ = trim($rs->fields[35]) ; 
              $this->nmgp_dados_select['dp3_'] = $this->dp3_;
              $this->dp4_ = trim($rs->fields[36]) ; 
              $this->nmgp_dados_select['dp4_'] = $this->dp4_;
              $this->dp5_ = trim($rs->fields[37]) ; 
              $this->nmgp_dados_select['dp5_'] = $this->dp5_;
              $this->pcent_dp_ = trim($rs->fields[38]) ; 
              $this->nmgp_dados_select['pcent_dp_'] = $this->pcent_dp_;
              $this->aeep1_ = trim($rs->fields[39]) ; 
              $this->nmgp_dados_select['aeep1_'] = $this->aeep1_;
              $this->porcent_aeep1_ = trim($rs->fields[40]) ; 
              $this->nmgp_dados_select['porcent_aeep1_'] = $this->porcent_aeep1_;
              $this->inasistencia_p2_ = $rs->fields[41] ; 
              $this->nmgp_dados_select['inasistencia_p2_'] = $this->inasistencia_p2_;
              $this->eval_2_per_ = trim($rs->fields[42]) ; 
              $this->nmgp_dados_select['eval_2_per_'] = $this->eval_2_per_;
              $this->dc1_2p_ = trim($rs->fields[43]) ; 
              $this->nmgp_dados_select['dc1_2p_'] = $this->dc1_2p_;
              $this->dc2_2p_ = trim($rs->fields[44]) ; 
              $this->nmgp_dados_select['dc2_2p_'] = $this->dc2_2p_;
              $this->dc3_2p_ = trim($rs->fields[45]) ; 
              $this->nmgp_dados_select['dc3_2p_'] = $this->dc3_2p_;
              $this->dc4_2p_ = trim($rs->fields[46]) ; 
              $this->nmgp_dados_select['dc4_2p_'] = $this->dc4_2p_;
              $this->dc5_2p_ = trim($rs->fields[47]) ; 
              $this->nmgp_dados_select['dc5_2p_'] = $this->dc5_2p_;
              $this->pcent_dc2_ = trim($rs->fields[48]) ; 
              $this->nmgp_dados_select['pcent_dc2_'] = $this->pcent_dc2_;
              $this->ds1_2p_ = trim($rs->fields[49]) ; 
              $this->nmgp_dados_select['ds1_2p_'] = $this->ds1_2p_;
              $this->ds2_2p_ = trim($rs->fields[50]) ; 
              $this->nmgp_dados_select['ds2_2p_'] = $this->ds2_2p_;
              $this->ds3_2p_ = trim($rs->fields[51]) ; 
              $this->nmgp_dados_select['ds3_2p_'] = $this->ds3_2p_;
              $this->ds4_2p_ = trim($rs->fields[52]) ; 
              $this->nmgp_dados_select['ds4_2p_'] = $this->ds4_2p_;
              $this->ds5_2p_ = trim($rs->fields[53]) ; 
              $this->nmgp_dados_select['ds5_2p_'] = $this->ds5_2p_;
              $this->pcent_ds2_ = trim($rs->fields[54]) ; 
              $this->nmgp_dados_select['pcent_ds2_'] = $this->pcent_ds2_;
              $this->dp1_2p_ = trim($rs->fields[55]) ; 
              $this->nmgp_dados_select['dp1_2p_'] = $this->dp1_2p_;
              $this->dp2_2p_ = trim($rs->fields[56]) ; 
              $this->nmgp_dados_select['dp2_2p_'] = $this->dp2_2p_;
              $this->dp3_2p_ = trim($rs->fields[57]) ; 
              $this->nmgp_dados_select['dp3_2p_'] = $this->dp3_2p_;
              $this->dp4_2p_ = trim($rs->fields[58]) ; 
              $this->nmgp_dados_select['dp4_2p_'] = $this->dp4_2p_;
              $this->dp5_2p_ = trim($rs->fields[59]) ; 
              $this->nmgp_dados_select['dp5_2p_'] = $this->dp5_2p_;
              $this->pcent_dp2_ = trim($rs->fields[60]) ; 
              $this->nmgp_dados_select['pcent_dp2_'] = $this->pcent_dp2_;
              $this->aee_p2_ = trim($rs->fields[61]) ; 
              $this->nmgp_dados_select['aee_p2_'] = $this->aee_p2_;
              $this->porcet_aee_p2_ = trim($rs->fields[62]) ; 
              $this->nmgp_dados_select['porcet_aee_p2_'] = $this->porcet_aee_p2_;
              $this->inasistencia_p3_ = $rs->fields[63] ; 
              $this->nmgp_dados_select['inasistencia_p3_'] = $this->inasistencia_p3_;
              $this->eval_3_per_ = trim($rs->fields[64]) ; 
              $this->nmgp_dados_select['eval_3_per_'] = $this->eval_3_per_;
              $this->dc1_3p_ = trim($rs->fields[65]) ; 
              $this->nmgp_dados_select['dc1_3p_'] = $this->dc1_3p_;
              $this->dc2_3p_ = trim($rs->fields[66]) ; 
              $this->nmgp_dados_select['dc2_3p_'] = $this->dc2_3p_;
              $this->dc3_3p_ = trim($rs->fields[67]) ; 
              $this->nmgp_dados_select['dc3_3p_'] = $this->dc3_3p_;
              $this->dc4_3p_ = trim($rs->fields[68]) ; 
              $this->nmgp_dados_select['dc4_3p_'] = $this->dc4_3p_;
              $this->dc5_3p_ = trim($rs->fields[69]) ; 
              $this->nmgp_dados_select['dc5_3p_'] = $this->dc5_3p_;
              $this->pcent_dc3_ = trim($rs->fields[70]) ; 
              $this->nmgp_dados_select['pcent_dc3_'] = $this->pcent_dc3_;
              $this->ds1_p3_ = trim($rs->fields[71]) ; 
              $this->nmgp_dados_select['ds1_p3_'] = $this->ds1_p3_;
              $this->ds2_p3_ = trim($rs->fields[72]) ; 
              $this->nmgp_dados_select['ds2_p3_'] = $this->ds2_p3_;
              $this->ds3_p3_ = trim($rs->fields[73]) ; 
              $this->nmgp_dados_select['ds3_p3_'] = $this->ds3_p3_;
              $this->ds4_p3_ = trim($rs->fields[74]) ; 
              $this->nmgp_dados_select['ds4_p3_'] = $this->ds4_p3_;
              $this->ds5_p3_ = trim($rs->fields[75]) ; 
              $this->nmgp_dados_select['ds5_p3_'] = $this->ds5_p3_;
              $this->pcent_ds3_ = trim($rs->fields[76]) ; 
              $this->nmgp_dados_select['pcent_ds3_'] = $this->pcent_ds3_;
              $this->dp1_p3_ = trim($rs->fields[77]) ; 
              $this->nmgp_dados_select['dp1_p3_'] = $this->dp1_p3_;
              $this->dp2_p3_ = trim($rs->fields[78]) ; 
              $this->nmgp_dados_select['dp2_p3_'] = $this->dp2_p3_;
              $this->dp3_p3_ = trim($rs->fields[79]) ; 
              $this->nmgp_dados_select['dp3_p3_'] = $this->dp3_p3_;
              $this->dp4_p3_ = trim($rs->fields[80]) ; 
              $this->nmgp_dados_select['dp4_p3_'] = $this->dp4_p3_;
              $this->sc_field_0_ = trim($rs->fields[81]) ; 
              $this->nmgp_dados_select['sc_field_0_'] = $this->sc_field_0_;
              $this->pcent_dp3_ = trim($rs->fields[82]) ; 
              $this->nmgp_dados_select['pcent_dp3_'] = $this->pcent_dp3_;
              $this->aee_p3_ = trim($rs->fields[83]) ; 
              $this->nmgp_dados_select['aee_p3_'] = $this->aee_p3_;
              $this->porcent_aee_p3_ = trim($rs->fields[84]) ; 
              $this->nmgp_dados_select['porcent_aee_p3_'] = $this->porcent_aee_p3_;
              $this->inasistencia_p4_ = $rs->fields[85] ; 
              $this->nmgp_dados_select['inasistencia_p4_'] = $this->inasistencia_p4_;
              $this->eval_4_per_ = trim($rs->fields[86]) ; 
              $this->nmgp_dados_select['eval_4_per_'] = $this->eval_4_per_;
              $this->dc1_p4_ = trim($rs->fields[87]) ; 
              $this->nmgp_dados_select['dc1_p4_'] = $this->dc1_p4_;
              $this->dc2_p4_ = trim($rs->fields[88]) ; 
              $this->nmgp_dados_select['dc2_p4_'] = $this->dc2_p4_;
              $this->dc3_p4_ = trim($rs->fields[89]) ; 
              $this->nmgp_dados_select['dc3_p4_'] = $this->dc3_p4_;
              $this->dc4_p4_ = trim($rs->fields[90]) ; 
              $this->nmgp_dados_select['dc4_p4_'] = $this->dc4_p4_;
              $this->dc5_p4_ = trim($rs->fields[91]) ; 
              $this->nmgp_dados_select['dc5_p4_'] = $this->dc5_p4_;
              $this->pcent_dc4_ = trim($rs->fields[92]) ; 
              $this->nmgp_dados_select['pcent_dc4_'] = $this->pcent_dc4_;
              $this->ds1_p4_ = trim($rs->fields[93]) ; 
              $this->nmgp_dados_select['ds1_p4_'] = $this->ds1_p4_;
              $this->ds2_p4_ = trim($rs->fields[94]) ; 
              $this->nmgp_dados_select['ds2_p4_'] = $this->ds2_p4_;
              $this->ds3_p4_ = trim($rs->fields[95]) ; 
              $this->nmgp_dados_select['ds3_p4_'] = $this->ds3_p4_;
              $this->ds4_p4_ = trim($rs->fields[96]) ; 
              $this->nmgp_dados_select['ds4_p4_'] = $this->ds4_p4_;
              $this->ds5_p4_ = trim($rs->fields[97]) ; 
              $this->nmgp_dados_select['ds5_p4_'] = $this->ds5_p4_;
              $this->pcent_ds4_ = trim($rs->fields[98]) ; 
              $this->nmgp_dados_select['pcent_ds4_'] = $this->pcent_ds4_;
              $this->dp1_p4_ = trim($rs->fields[99]) ; 
              $this->nmgp_dados_select['dp1_p4_'] = $this->dp1_p4_;
              $this->dp2_p4_ = trim($rs->fields[100]) ; 
              $this->nmgp_dados_select['dp2_p4_'] = $this->dp2_p4_;
              $this->dp3_p4_ = trim($rs->fields[101]) ; 
              $this->nmgp_dados_select['dp3_p4_'] = $this->dp3_p4_;
              $this->dp4_p4_ = trim($rs->fields[102]) ; 
              $this->nmgp_dados_select['dp4_p4_'] = $this->dp4_p4_;
              $this->dp5_p4_ = trim($rs->fields[103]) ; 
              $this->nmgp_dados_select['dp5_p4_'] = $this->dp5_p4_;
              $this->aee_p4_ = trim($rs->fields[104]) ; 
              $this->nmgp_dados_select['aee_p4_'] = $this->aee_p4_;
              $this->porcent_aee_p4_ = trim($rs->fields[105]) ; 
              $this->nmgp_dados_select['porcent_aee_p4_'] = $this->porcent_aee_p4_;
              $this->pcent_dp4_ = trim($rs->fields[106]) ; 
              $this->nmgp_dados_select['pcent_dp4_'] = $this->pcent_dp4_;
              $this->eval_final_ = trim($rs->fields[107]) ; 
              $this->nmgp_dados_select['eval_final_'] = $this->eval_final_;
              $this->entorno_ = $rs->fields[108] ; 
              $this->nmgp_dados_select['entorno_'] = $this->entorno_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id_estudiante_ = (string)$this->id_estudiante_; 
              $this->id_grupo_ = (string)$this->id_grupo_; 
              $this->id_area_ = (string)$this->id_area_; 
              $this->id_asignatura_ = (string)$this->id_asignatura_; 
              $this->id_grado_ = (string)$this->id_grado_; 
              $this->id_nivel_ = (string)$this->id_nivel_; 
              $this->ihs_ = (string)$this->ihs_; 
              $this->pfa_ = (string)$this->pfa_; 
              $this->inasistencia_p1_ = (string)$this->inasistencia_p1_; 
              $this->eval_1_per_ = (strpos(strtolower($this->eval_1_per_), "e")) ? (float)$this->eval_1_per_ : $this->eval_1_per_; 
              $this->eval_1_per_ = (string)$this->eval_1_per_; 
              $this->dc1_ = (strpos(strtolower($this->dc1_), "e")) ? (float)$this->dc1_ : $this->dc1_; 
              $this->dc1_ = (string)$this->dc1_; 
              $this->dc2_ = (strpos(strtolower($this->dc2_), "e")) ? (float)$this->dc2_ : $this->dc2_; 
              $this->dc2_ = (string)$this->dc2_; 
              $this->dc3_ = (strpos(strtolower($this->dc3_), "e")) ? (float)$this->dc3_ : $this->dc3_; 
              $this->dc3_ = (string)$this->dc3_; 
              $this->dc4_ = (strpos(strtolower($this->dc4_), "e")) ? (float)$this->dc4_ : $this->dc4_; 
              $this->dc4_ = (string)$this->dc4_; 
              $this->dc5_ = (strpos(strtolower($this->dc5_), "e")) ? (float)$this->dc5_ : $this->dc5_; 
              $this->dc5_ = (string)$this->dc5_; 
              $this->dc6_ = (strpos(strtolower($this->dc6_), "e")) ? (float)$this->dc6_ : $this->dc6_; 
              $this->dc6_ = (string)$this->dc6_; 
              $this->dc7_ = (strpos(strtolower($this->dc7_), "e")) ? (float)$this->dc7_ : $this->dc7_; 
              $this->dc7_ = (string)$this->dc7_; 
              $this->dc8_ = (strpos(strtolower($this->dc8_), "e")) ? (float)$this->dc8_ : $this->dc8_; 
              $this->dc8_ = (string)$this->dc8_; 
              $this->dc9_ = (strpos(strtolower($this->dc9_), "e")) ? (float)$this->dc9_ : $this->dc9_; 
              $this->dc9_ = (string)$this->dc9_; 
              $this->pcent_dc_ = (strpos(strtolower($this->pcent_dc_), "e")) ? (float)$this->pcent_dc_ : $this->pcent_dc_; 
              $this->pcent_dc_ = (string)$this->pcent_dc_; 
              $this->ds1_ = (strpos(strtolower($this->ds1_), "e")) ? (float)$this->ds1_ : $this->ds1_; 
              $this->ds1_ = (string)$this->ds1_; 
              $this->ds2_ = (strpos(strtolower($this->ds2_), "e")) ? (float)$this->ds2_ : $this->ds2_; 
              $this->ds2_ = (string)$this->ds2_; 
              $this->ds3_ = (strpos(strtolower($this->ds3_), "e")) ? (float)$this->ds3_ : $this->ds3_; 
              $this->ds3_ = (string)$this->ds3_; 
              $this->ds4_ = (strpos(strtolower($this->ds4_), "e")) ? (float)$this->ds4_ : $this->ds4_; 
              $this->ds4_ = (string)$this->ds4_; 
              $this->ds5_ = (strpos(strtolower($this->ds5_), "e")) ? (float)$this->ds5_ : $this->ds5_; 
              $this->ds5_ = (string)$this->ds5_; 
              $this->pcent_ds_ = (strpos(strtolower($this->pcent_ds_), "e")) ? (float)$this->pcent_ds_ : $this->pcent_ds_; 
              $this->pcent_ds_ = (string)$this->pcent_ds_; 
              $this->dp1_ = (strpos(strtolower($this->dp1_), "e")) ? (float)$this->dp1_ : $this->dp1_; 
              $this->dp1_ = (string)$this->dp1_; 
              $this->dp2_ = (strpos(strtolower($this->dp2_), "e")) ? (float)$this->dp2_ : $this->dp2_; 
              $this->dp2_ = (string)$this->dp2_; 
              $this->dp3_ = (strpos(strtolower($this->dp3_), "e")) ? (float)$this->dp3_ : $this->dp3_; 
              $this->dp3_ = (string)$this->dp3_; 
              $this->dp4_ = (strpos(strtolower($this->dp4_), "e")) ? (float)$this->dp4_ : $this->dp4_; 
              $this->dp4_ = (string)$this->dp4_; 
              $this->dp5_ = (strpos(strtolower($this->dp5_), "e")) ? (float)$this->dp5_ : $this->dp5_; 
              $this->dp5_ = (string)$this->dp5_; 
              $this->pcent_dp_ = (strpos(strtolower($this->pcent_dp_), "e")) ? (float)$this->pcent_dp_ : $this->pcent_dp_; 
              $this->pcent_dp_ = (string)$this->pcent_dp_; 
              $this->aeep1_ = (strpos(strtolower($this->aeep1_), "e")) ? (float)$this->aeep1_ : $this->aeep1_; 
              $this->aeep1_ = (string)$this->aeep1_; 
              $this->porcent_aeep1_ = (strpos(strtolower($this->porcent_aeep1_), "e")) ? (float)$this->porcent_aeep1_ : $this->porcent_aeep1_; 
              $this->porcent_aeep1_ = (string)$this->porcent_aeep1_; 
              $this->inasistencia_p2_ = (string)$this->inasistencia_p2_; 
              $this->eval_2_per_ = (strpos(strtolower($this->eval_2_per_), "e")) ? (float)$this->eval_2_per_ : $this->eval_2_per_; 
              $this->eval_2_per_ = (string)$this->eval_2_per_; 
              $this->dc1_2p_ = (strpos(strtolower($this->dc1_2p_), "e")) ? (float)$this->dc1_2p_ : $this->dc1_2p_; 
              $this->dc1_2p_ = (string)$this->dc1_2p_; 
              $this->dc2_2p_ = (strpos(strtolower($this->dc2_2p_), "e")) ? (float)$this->dc2_2p_ : $this->dc2_2p_; 
              $this->dc2_2p_ = (string)$this->dc2_2p_; 
              $this->dc3_2p_ = (strpos(strtolower($this->dc3_2p_), "e")) ? (float)$this->dc3_2p_ : $this->dc3_2p_; 
              $this->dc3_2p_ = (string)$this->dc3_2p_; 
              $this->dc4_2p_ = (strpos(strtolower($this->dc4_2p_), "e")) ? (float)$this->dc4_2p_ : $this->dc4_2p_; 
              $this->dc4_2p_ = (string)$this->dc4_2p_; 
              $this->dc5_2p_ = (strpos(strtolower($this->dc5_2p_), "e")) ? (float)$this->dc5_2p_ : $this->dc5_2p_; 
              $this->dc5_2p_ = (string)$this->dc5_2p_; 
              $this->pcent_dc2_ = (strpos(strtolower($this->pcent_dc2_), "e")) ? (float)$this->pcent_dc2_ : $this->pcent_dc2_; 
              $this->pcent_dc2_ = (string)$this->pcent_dc2_; 
              $this->ds1_2p_ = (strpos(strtolower($this->ds1_2p_), "e")) ? (float)$this->ds1_2p_ : $this->ds1_2p_; 
              $this->ds1_2p_ = (string)$this->ds1_2p_; 
              $this->ds2_2p_ = (strpos(strtolower($this->ds2_2p_), "e")) ? (float)$this->ds2_2p_ : $this->ds2_2p_; 
              $this->ds2_2p_ = (string)$this->ds2_2p_; 
              $this->ds3_2p_ = (strpos(strtolower($this->ds3_2p_), "e")) ? (float)$this->ds3_2p_ : $this->ds3_2p_; 
              $this->ds3_2p_ = (string)$this->ds3_2p_; 
              $this->ds4_2p_ = (strpos(strtolower($this->ds4_2p_), "e")) ? (float)$this->ds4_2p_ : $this->ds4_2p_; 
              $this->ds4_2p_ = (string)$this->ds4_2p_; 
              $this->ds5_2p_ = (strpos(strtolower($this->ds5_2p_), "e")) ? (float)$this->ds5_2p_ : $this->ds5_2p_; 
              $this->ds5_2p_ = (string)$this->ds5_2p_; 
              $this->pcent_ds2_ = (strpos(strtolower($this->pcent_ds2_), "e")) ? (float)$this->pcent_ds2_ : $this->pcent_ds2_; 
              $this->pcent_ds2_ = (string)$this->pcent_ds2_; 
              $this->dp1_2p_ = (strpos(strtolower($this->dp1_2p_), "e")) ? (float)$this->dp1_2p_ : $this->dp1_2p_; 
              $this->dp1_2p_ = (string)$this->dp1_2p_; 
              $this->dp2_2p_ = (strpos(strtolower($this->dp2_2p_), "e")) ? (float)$this->dp2_2p_ : $this->dp2_2p_; 
              $this->dp2_2p_ = (string)$this->dp2_2p_; 
              $this->dp3_2p_ = (strpos(strtolower($this->dp3_2p_), "e")) ? (float)$this->dp3_2p_ : $this->dp3_2p_; 
              $this->dp3_2p_ = (string)$this->dp3_2p_; 
              $this->dp4_2p_ = (strpos(strtolower($this->dp4_2p_), "e")) ? (float)$this->dp4_2p_ : $this->dp4_2p_; 
              $this->dp4_2p_ = (string)$this->dp4_2p_; 
              $this->dp5_2p_ = (strpos(strtolower($this->dp5_2p_), "e")) ? (float)$this->dp5_2p_ : $this->dp5_2p_; 
              $this->dp5_2p_ = (string)$this->dp5_2p_; 
              $this->pcent_dp2_ = (strpos(strtolower($this->pcent_dp2_), "e")) ? (float)$this->pcent_dp2_ : $this->pcent_dp2_; 
              $this->pcent_dp2_ = (string)$this->pcent_dp2_; 
              $this->aee_p2_ = (strpos(strtolower($this->aee_p2_), "e")) ? (float)$this->aee_p2_ : $this->aee_p2_; 
              $this->aee_p2_ = (string)$this->aee_p2_; 
              $this->porcet_aee_p2_ = (strpos(strtolower($this->porcet_aee_p2_), "e")) ? (float)$this->porcet_aee_p2_ : $this->porcet_aee_p2_; 
              $this->porcet_aee_p2_ = (string)$this->porcet_aee_p2_; 
              $this->inasistencia_p3_ = (string)$this->inasistencia_p3_; 
              $this->eval_3_per_ = (strpos(strtolower($this->eval_3_per_), "e")) ? (float)$this->eval_3_per_ : $this->eval_3_per_; 
              $this->eval_3_per_ = (string)$this->eval_3_per_; 
              $this->dc1_3p_ = (strpos(strtolower($this->dc1_3p_), "e")) ? (float)$this->dc1_3p_ : $this->dc1_3p_; 
              $this->dc1_3p_ = (string)$this->dc1_3p_; 
              $this->dc2_3p_ = (strpos(strtolower($this->dc2_3p_), "e")) ? (float)$this->dc2_3p_ : $this->dc2_3p_; 
              $this->dc2_3p_ = (string)$this->dc2_3p_; 
              $this->dc3_3p_ = (strpos(strtolower($this->dc3_3p_), "e")) ? (float)$this->dc3_3p_ : $this->dc3_3p_; 
              $this->dc3_3p_ = (string)$this->dc3_3p_; 
              $this->dc4_3p_ = (strpos(strtolower($this->dc4_3p_), "e")) ? (float)$this->dc4_3p_ : $this->dc4_3p_; 
              $this->dc4_3p_ = (string)$this->dc4_3p_; 
              $this->dc5_3p_ = (strpos(strtolower($this->dc5_3p_), "e")) ? (float)$this->dc5_3p_ : $this->dc5_3p_; 
              $this->dc5_3p_ = (string)$this->dc5_3p_; 
              $this->pcent_dc3_ = (strpos(strtolower($this->pcent_dc3_), "e")) ? (float)$this->pcent_dc3_ : $this->pcent_dc3_; 
              $this->pcent_dc3_ = (string)$this->pcent_dc3_; 
              $this->ds1_p3_ = (strpos(strtolower($this->ds1_p3_), "e")) ? (float)$this->ds1_p3_ : $this->ds1_p3_; 
              $this->ds1_p3_ = (string)$this->ds1_p3_; 
              $this->ds2_p3_ = (strpos(strtolower($this->ds2_p3_), "e")) ? (float)$this->ds2_p3_ : $this->ds2_p3_; 
              $this->ds2_p3_ = (string)$this->ds2_p3_; 
              $this->ds3_p3_ = (strpos(strtolower($this->ds3_p3_), "e")) ? (float)$this->ds3_p3_ : $this->ds3_p3_; 
              $this->ds3_p3_ = (string)$this->ds3_p3_; 
              $this->ds4_p3_ = (strpos(strtolower($this->ds4_p3_), "e")) ? (float)$this->ds4_p3_ : $this->ds4_p3_; 
              $this->ds4_p3_ = (string)$this->ds4_p3_; 
              $this->ds5_p3_ = (strpos(strtolower($this->ds5_p3_), "e")) ? (float)$this->ds5_p3_ : $this->ds5_p3_; 
              $this->ds5_p3_ = (string)$this->ds5_p3_; 
              $this->pcent_ds3_ = (strpos(strtolower($this->pcent_ds3_), "e")) ? (float)$this->pcent_ds3_ : $this->pcent_ds3_; 
              $this->pcent_ds3_ = (string)$this->pcent_ds3_; 
              $this->dp1_p3_ = (strpos(strtolower($this->dp1_p3_), "e")) ? (float)$this->dp1_p3_ : $this->dp1_p3_; 
              $this->dp1_p3_ = (string)$this->dp1_p3_; 
              $this->dp2_p3_ = (strpos(strtolower($this->dp2_p3_), "e")) ? (float)$this->dp2_p3_ : $this->dp2_p3_; 
              $this->dp2_p3_ = (string)$this->dp2_p3_; 
              $this->dp3_p3_ = (strpos(strtolower($this->dp3_p3_), "e")) ? (float)$this->dp3_p3_ : $this->dp3_p3_; 
              $this->dp3_p3_ = (string)$this->dp3_p3_; 
              $this->dp4_p3_ = (strpos(strtolower($this->dp4_p3_), "e")) ? (float)$this->dp4_p3_ : $this->dp4_p3_; 
              $this->dp4_p3_ = (string)$this->dp4_p3_; 
              $this->sc_field_0_ = (strpos(strtolower($this->sc_field_0_), "e")) ? (float)$this->sc_field_0_ : $this->sc_field_0_; 
              $this->sc_field_0_ = (string)$this->sc_field_0_; 
              $this->pcent_dp3_ = (strpos(strtolower($this->pcent_dp3_), "e")) ? (float)$this->pcent_dp3_ : $this->pcent_dp3_; 
              $this->pcent_dp3_ = (string)$this->pcent_dp3_; 
              $this->aee_p3_ = (strpos(strtolower($this->aee_p3_), "e")) ? (float)$this->aee_p3_ : $this->aee_p3_; 
              $this->aee_p3_ = (string)$this->aee_p3_; 
              $this->porcent_aee_p3_ = (strpos(strtolower($this->porcent_aee_p3_), "e")) ? (float)$this->porcent_aee_p3_ : $this->porcent_aee_p3_; 
              $this->porcent_aee_p3_ = (string)$this->porcent_aee_p3_; 
              $this->inasistencia_p4_ = (string)$this->inasistencia_p4_; 
              $this->eval_4_per_ = (strpos(strtolower($this->eval_4_per_), "e")) ? (float)$this->eval_4_per_ : $this->eval_4_per_; 
              $this->eval_4_per_ = (string)$this->eval_4_per_; 
              $this->dc1_p4_ = (strpos(strtolower($this->dc1_p4_), "e")) ? (float)$this->dc1_p4_ : $this->dc1_p4_; 
              $this->dc1_p4_ = (string)$this->dc1_p4_; 
              $this->dc2_p4_ = (strpos(strtolower($this->dc2_p4_), "e")) ? (float)$this->dc2_p4_ : $this->dc2_p4_; 
              $this->dc2_p4_ = (string)$this->dc2_p4_; 
              $this->dc3_p4_ = (strpos(strtolower($this->dc3_p4_), "e")) ? (float)$this->dc3_p4_ : $this->dc3_p4_; 
              $this->dc3_p4_ = (string)$this->dc3_p4_; 
              $this->dc4_p4_ = (strpos(strtolower($this->dc4_p4_), "e")) ? (float)$this->dc4_p4_ : $this->dc4_p4_; 
              $this->dc4_p4_ = (string)$this->dc4_p4_; 
              $this->dc5_p4_ = (strpos(strtolower($this->dc5_p4_), "e")) ? (float)$this->dc5_p4_ : $this->dc5_p4_; 
              $this->dc5_p4_ = (string)$this->dc5_p4_; 
              $this->pcent_dc4_ = (strpos(strtolower($this->pcent_dc4_), "e")) ? (float)$this->pcent_dc4_ : $this->pcent_dc4_; 
              $this->pcent_dc4_ = (string)$this->pcent_dc4_; 
              $this->ds1_p4_ = (strpos(strtolower($this->ds1_p4_), "e")) ? (float)$this->ds1_p4_ : $this->ds1_p4_; 
              $this->ds1_p4_ = (string)$this->ds1_p4_; 
              $this->ds2_p4_ = (strpos(strtolower($this->ds2_p4_), "e")) ? (float)$this->ds2_p4_ : $this->ds2_p4_; 
              $this->ds2_p4_ = (string)$this->ds2_p4_; 
              $this->ds3_p4_ = (strpos(strtolower($this->ds3_p4_), "e")) ? (float)$this->ds3_p4_ : $this->ds3_p4_; 
              $this->ds3_p4_ = (string)$this->ds3_p4_; 
              $this->ds4_p4_ = (strpos(strtolower($this->ds4_p4_), "e")) ? (float)$this->ds4_p4_ : $this->ds4_p4_; 
              $this->ds4_p4_ = (string)$this->ds4_p4_; 
              $this->ds5_p4_ = (strpos(strtolower($this->ds5_p4_), "e")) ? (float)$this->ds5_p4_ : $this->ds5_p4_; 
              $this->ds5_p4_ = (string)$this->ds5_p4_; 
              $this->pcent_ds4_ = (strpos(strtolower($this->pcent_ds4_), "e")) ? (float)$this->pcent_ds4_ : $this->pcent_ds4_; 
              $this->pcent_ds4_ = (string)$this->pcent_ds4_; 
              $this->dp1_p4_ = (strpos(strtolower($this->dp1_p4_), "e")) ? (float)$this->dp1_p4_ : $this->dp1_p4_; 
              $this->dp1_p4_ = (string)$this->dp1_p4_; 
              $this->dp2_p4_ = (strpos(strtolower($this->dp2_p4_), "e")) ? (float)$this->dp2_p4_ : $this->dp2_p4_; 
              $this->dp2_p4_ = (string)$this->dp2_p4_; 
              $this->dp3_p4_ = (strpos(strtolower($this->dp3_p4_), "e")) ? (float)$this->dp3_p4_ : $this->dp3_p4_; 
              $this->dp3_p4_ = (string)$this->dp3_p4_; 
              $this->dp4_p4_ = (strpos(strtolower($this->dp4_p4_), "e")) ? (float)$this->dp4_p4_ : $this->dp4_p4_; 
              $this->dp4_p4_ = (string)$this->dp4_p4_; 
              $this->dp5_p4_ = (strpos(strtolower($this->dp5_p4_), "e")) ? (float)$this->dp5_p4_ : $this->dp5_p4_; 
              $this->dp5_p4_ = (string)$this->dp5_p4_; 
              $this->aee_p4_ = (strpos(strtolower($this->aee_p4_), "e")) ? (float)$this->aee_p4_ : $this->aee_p4_; 
              $this->aee_p4_ = (string)$this->aee_p4_; 
              $this->porcent_aee_p4_ = (strpos(strtolower($this->porcent_aee_p4_), "e")) ? (float)$this->porcent_aee_p4_ : $this->porcent_aee_p4_; 
              $this->porcent_aee_p4_ = (string)$this->porcent_aee_p4_; 
              $this->pcent_dp4_ = (strpos(strtolower($this->pcent_dp4_), "e")) ? (float)$this->pcent_dp4_ : $this->pcent_dp4_; 
              $this->pcent_dp4_ = (string)$this->pcent_dp4_; 
              $this->eval_final_ = (strpos(strtolower($this->eval_final_), "e")) ? (float)$this->eval_final_ : $this->eval_final_; 
              $this->eval_final_ = (string)$this->eval_final_; 
              $this->entorno_ = (string)$this->entorno_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['parms'] = "id_estudiante_?#?$this->id_estudiante_?@?id_grupo_?#?$this->id_grupo_?@?id_asignatura_?#?$this->id_asignatura_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_estudiante_'] =  $this->id_estudiante_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['estatus_'] =  $this->estatus_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['novedad_'] =  $this->novedad_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['asienta_inasistencias_'] =  $this->asienta_inasistencias_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p1_'] =  $this->inasistencia_p1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_1_per_'] =  $this->eval_1_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_'] =  $this->dc1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_'] =  $this->dc2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_'] =  $this->dc3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_'] =  $this->dc4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_'] =  $this->dc5_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc_'] =  $this->pcent_dc_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_'] =  $this->dp1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_'] =  $this->dp2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_'] =  $this->dp3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp_'] =  $this->pcent_dp_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_'] =  $this->ds1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_'] =  $this->ds2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_'] =  $this->ds3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds_'] =  $this->pcent_ds_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aeep1_'] =  $this->aeep1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcent_aeep1_'] =  $this->porcent_aeep1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['val_acumulada_'] =  $this->val_acumulada_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['val_requerida_'] =  $this->val_requerida_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['primer_apellido_'] =  $this->primer_apellido_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['segundo_apellido_'] =  $this->segundo_apellido_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['primer_nombre_'] =  $this->primer_nombre_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['segundo_nombre_'] =  $this->segundo_nombre_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_grupo_'] =  $this->id_grupo_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_area_'] =  $this->id_area_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_asignatura_'] =  $this->id_asignatura_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_grado_'] =  $this->id_grado_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_nivel_'] =  $this->id_nivel_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ihs_'] =  $this->ihs_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pfa_'] =  $this->pfa_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['tipo_asig_'] =  $this->tipo_asig_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc6_'] =  $this->dc6_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc7_'] =  $this->dc7_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc8_'] =  $this->dc8_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc9_'] =  $this->dc9_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_'] =  $this->ds4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_'] =  $this->ds5_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_'] =  $this->dp4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp5_'] =  $this->dp5_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p2_'] =  $this->inasistencia_p2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_2_per_'] =  $this->eval_2_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_2p_'] =  $this->dc1_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_2p_'] =  $this->dc2_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_2p_'] =  $this->dc3_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_2p_'] =  $this->dc4_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_2p_'] =  $this->dc5_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc2_'] =  $this->pcent_dc2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_2p_'] =  $this->ds1_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_2p_'] =  $this->ds2_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_2p_'] =  $this->ds3_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_2p_'] =  $this->ds4_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_2p_'] =  $this->ds5_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds2_'] =  $this->pcent_ds2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_2p_'] =  $this->dp1_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_2p_'] =  $this->dp2_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_2p_'] =  $this->dp3_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_2p_'] =  $this->dp4_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp5_2p_'] =  $this->dp5_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp2_'] =  $this->pcent_dp2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aee_p2_'] =  $this->aee_p2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcet_aee_p2_'] =  $this->porcet_aee_p2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p3_'] =  $this->inasistencia_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_3_per_'] =  $this->eval_3_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_3p_'] =  $this->dc1_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_3p_'] =  $this->dc2_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_3p_'] =  $this->dc3_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_3p_'] =  $this->dc4_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_3p_'] =  $this->dc5_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc3_'] =  $this->pcent_dc3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_p3_'] =  $this->ds1_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_p3_'] =  $this->ds2_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_p3_'] =  $this->ds3_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_p3_'] =  $this->ds4_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_p3_'] =  $this->ds5_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds3_'] =  $this->pcent_ds3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_p3_'] =  $this->dp1_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_p3_'] =  $this->dp2_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_p3_'] =  $this->dp3_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_p3_'] =  $this->dp4_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['sc_field_0_'] =  $this->sc_field_0_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp3_'] =  $this->pcent_dp3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aee_p3_'] =  $this->aee_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcent_aee_p3_'] =  $this->porcent_aee_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p4_'] =  $this->inasistencia_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_4_per_'] =  $this->eval_4_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_p4_'] =  $this->dc1_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_p4_'] =  $this->dc2_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_p4_'] =  $this->dc3_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_p4_'] =  $this->dc4_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_p4_'] =  $this->dc5_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc4_'] =  $this->pcent_dc4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_p4_'] =  $this->ds1_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_p4_'] =  $this->ds2_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_p4_'] =  $this->ds3_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_p4_'] =  $this->ds4_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_p4_'] =  $this->ds5_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds4_'] =  $this->pcent_ds4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_p4_'] =  $this->dp1_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_p4_'] =  $this->dp2_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_p4_'] =  $this->dp3_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_p4_'] =  $this->dp4_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp5_p4_'] =  $this->dp5_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aee_p4_'] =  $this->aee_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcent_aee_p4_'] =  $this->porcent_aee_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp4_'] =  $this->pcent_dp4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_final_'] =  $this->eval_final_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['entorno_'] =  $this->entorno_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['estudiantes_'] =  $this->estudiantes_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_novedad_'] =  $this->id_novedad_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['nom_grupo_'] =  $this->nom_grupo_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
              $this->nm_proc_onload(false);
          }
          ksort ($this->form_vert_form_t_evaluacion_p1_m3); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total'] + 1; 
          }
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] < (($qt_geral_reg_form_t_evaluacion_p1_m3 + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->id_estudiante_ = "";  
              $this->novedad_ = "";  
              $this->estatus_ = "";  
              $this->inasistencia_p1_ = "";  
              $this->eval_1_per_ = "";  
              $this->dc1_ = "";  
              $this->dc2_ = "";  
              $this->dc3_ = "";  
              $this->dc4_ = "";  
              $this->dc5_ = "";  
              $this->pcent_dc_ = "";  
              $this->ds1_ = "";  
              $this->ds2_ = "";  
              $this->ds3_ = "";  
              $this->pcent_ds_ = "";  
              $this->dp1_ = "";  
              $this->dp2_ = "";  
              $this->dp3_ = "";  
              $this->pcent_dp_ = "";  
              $this->aeep1_ = "";  
              $this->porcent_aeep1_ = "";  
              $this->entorno_ = htmlentities("" . $_SESSION['entorno'] . "");  
              $this->asienta_inasistencias_ = "";  
              $this->val_acumulada_ = "";  
              $this->val_requerida_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_estudiante_'] =  $this->id_estudiante_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['estatus_'] =  $this->estatus_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['novedad_'] =  $this->novedad_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['asienta_inasistencias_'] =  $this->asienta_inasistencias_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p1_'] =  $this->inasistencia_p1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_1_per_'] =  $this->eval_1_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_'] =  $this->dc1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_'] =  $this->dc2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_'] =  $this->dc3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_'] =  $this->dc4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_'] =  $this->dc5_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc_'] =  $this->pcent_dc_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_'] =  $this->dp1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_'] =  $this->dp2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_'] =  $this->dp3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp_'] =  $this->pcent_dp_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_'] =  $this->ds1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_'] =  $this->ds2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_'] =  $this->ds3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds_'] =  $this->pcent_ds_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aeep1_'] =  $this->aeep1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcent_aeep1_'] =  $this->porcent_aeep1_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['val_acumulada_'] =  $this->val_acumulada_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['val_requerida_'] =  $this->val_requerida_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['primer_apellido_'] =  $this->primer_apellido_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['segundo_apellido_'] =  $this->segundo_apellido_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['primer_nombre_'] =  $this->primer_nombre_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['segundo_nombre_'] =  $this->segundo_nombre_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_grupo_'] =  $this->id_grupo_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_area_'] =  $this->id_area_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_asignatura_'] =  $this->id_asignatura_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_grado_'] =  $this->id_grado_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_nivel_'] =  $this->id_nivel_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ihs_'] =  $this->ihs_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pfa_'] =  $this->pfa_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['tipo_asig_'] =  $this->tipo_asig_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc6_'] =  $this->dc6_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc7_'] =  $this->dc7_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc8_'] =  $this->dc8_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc9_'] =  $this->dc9_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_'] =  $this->ds4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_'] =  $this->ds5_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_'] =  $this->dp4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp5_'] =  $this->dp5_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p2_'] =  $this->inasistencia_p2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_2_per_'] =  $this->eval_2_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_2p_'] =  $this->dc1_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_2p_'] =  $this->dc2_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_2p_'] =  $this->dc3_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_2p_'] =  $this->dc4_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_2p_'] =  $this->dc5_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc2_'] =  $this->pcent_dc2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_2p_'] =  $this->ds1_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_2p_'] =  $this->ds2_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_2p_'] =  $this->ds3_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_2p_'] =  $this->ds4_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_2p_'] =  $this->ds5_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds2_'] =  $this->pcent_ds2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_2p_'] =  $this->dp1_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_2p_'] =  $this->dp2_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_2p_'] =  $this->dp3_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_2p_'] =  $this->dp4_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp5_2p_'] =  $this->dp5_2p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp2_'] =  $this->pcent_dp2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aee_p2_'] =  $this->aee_p2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcet_aee_p2_'] =  $this->porcet_aee_p2_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p3_'] =  $this->inasistencia_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_3_per_'] =  $this->eval_3_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_3p_'] =  $this->dc1_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_3p_'] =  $this->dc2_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_3p_'] =  $this->dc3_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_3p_'] =  $this->dc4_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_3p_'] =  $this->dc5_3p_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc3_'] =  $this->pcent_dc3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_p3_'] =  $this->ds1_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_p3_'] =  $this->ds2_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_p3_'] =  $this->ds3_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_p3_'] =  $this->ds4_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_p3_'] =  $this->ds5_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds3_'] =  $this->pcent_ds3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_p3_'] =  $this->dp1_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_p3_'] =  $this->dp2_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_p3_'] =  $this->dp3_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_p3_'] =  $this->dp4_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['sc_field_0_'] =  $this->sc_field_0_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp3_'] =  $this->pcent_dp3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aee_p3_'] =  $this->aee_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcent_aee_p3_'] =  $this->porcent_aee_p3_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['inasistencia_p4_'] =  $this->inasistencia_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_4_per_'] =  $this->eval_4_per_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc1_p4_'] =  $this->dc1_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc2_p4_'] =  $this->dc2_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc3_p4_'] =  $this->dc3_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc4_p4_'] =  $this->dc4_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dc5_p4_'] =  $this->dc5_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dc4_'] =  $this->pcent_dc4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds1_p4_'] =  $this->ds1_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds2_p4_'] =  $this->ds2_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds3_p4_'] =  $this->ds3_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds4_p4_'] =  $this->ds4_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['ds5_p4_'] =  $this->ds5_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_ds4_'] =  $this->pcent_ds4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp1_p4_'] =  $this->dp1_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp2_p4_'] =  $this->dp2_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp3_p4_'] =  $this->dp3_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp4_p4_'] =  $this->dp4_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['dp5_p4_'] =  $this->dp5_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['aee_p4_'] =  $this->aee_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['porcent_aee_p4_'] =  $this->porcent_aee_p4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['pcent_dp4_'] =  $this->pcent_dp4_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['eval_final_'] =  $this->eval_final_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['entorno_'] =  $this->entorno_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['estudiantes_'] =  $this->estudiantes_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['id_novedad_'] =  $this->id_novedad_; 
             $this->form_vert_form_t_evaluacion_p1_m3[$sc_seq_vert]['nom_grupo_'] =  $this->nom_grupo_; 
              $sc_seq_vert++; 
          } 
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
              $this->nm_proc_onload(false);
          }
      }  
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['reg_start'] + $this->sc_max_reg;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
//
function aeep1__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function get_evaluados($array) {
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                        
         $i = 0; foreach ($array as $x) 
                    if ($x > 0) $i++; 
         return $i; 
    
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function calcula_nota()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
if (!isset($this->sc_temp_porcent_autoevaluacion)) {$this->sc_temp_porcent_autoevaluacion = (isset($_SESSION['porcent_autoevaluacion'])) ? $_SESSION['porcent_autoevaluacion'] : "";}
if (!isset($this->sc_temp_porcentaje_gr3)) {$this->sc_temp_porcentaje_gr3 = (isset($_SESSION['porcentaje_gr3'])) ? $_SESSION['porcentaje_gr3'] : "";}
if (!isset($this->sc_temp_porcentaje_gr2)) {$this->sc_temp_porcentaje_gr2 = (isset($_SESSION['porcentaje_gr2'])) ? $_SESSION['porcentaje_gr2'] : "";}
if (!isset($this->sc_temp_porcentaje_gr1)) {$this->sc_temp_porcentaje_gr1 = (isset($_SESSION['porcentaje_gr1'])) ? $_SESSION['porcentaje_gr1'] : "";}
if (!isset($this->sc_temp_nota_maxima)) {$this->sc_temp_nota_maxima = (isset($_SESSION['nota_maxima'])) ? $_SESSION['nota_maxima'] : "";}
                                       
if ($this->dc1_  > $this->sc_temp_nota_maxima || $this->dc2_  > $this->sc_temp_nota_maxima || $this->dc3_  > $this->sc_temp_nota_maxima|| $this->dc4_  > $this->sc_temp_nota_maxima|| $this->dc5_  > $this->sc_temp_nota_maxima ||$this->ds1_ > $this->sc_temp_nota_maxima||$this->ds2_ > $this->sc_temp_nota_maxima||$this->ds3_ > $this->sc_temp_nota_maxima||$this->ds4_ > $this->sc_temp_nota_maxima||$this->ds5_ > $this->sc_temp_nota_maxima||$this->dp1_ > $this->sc_temp_nota_maxima||$this->dp2_2p_  > $this->sc_temp_nota_maxima||$this->dp3_ > $this->sc_temp_nota_maxima||$this->dp4_ > $this->sc_temp_nota_maxima||$this->dp5_ > $this->sc_temp_nota_maxima )
{

 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= " Error La maxima nota es".$this->sc_temp_nota_maxima;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_t_evaluacion_p1_m3' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = " Error La maxima nota es".$this->sc_temp_nota_maxima;
 }
;
}

$dc_p1=array($this->dc1_ ,$this->dc2_ ,$this->dc3_ ,$this->dc4_ ,$this->dc5_ );
$dp_p1=array($this->dp1_ ,$this->dp2_ ,$this->dp3_ ,$this->dp4_ ,$this->dp5_ );
$ds_p1=array($this->ds1_ ,$this->ds2_ ,$this->ds3_ ,$this->ds4_ ,$this->ds5_ );


$evaluados_dc_p1=$this->get_evaluados($dc_p1);

if ($evaluados_dc_p1== 0){   
	$evaluados_dc_p1 = 1;
	}
$evaluados_dp_p1=$this->get_evaluados($dp_p1);

if ($evaluados_dp_p1== 0){  
	$evaluados_dp_p1 = 1;
	}
$evaluados_ds_p1=$this->get_evaluados($ds_p1);

if ($evaluados_ds_p1== 0){  
	$evaluados_ds_p1 = 1;
	}





$this->pcent_dc_ =(($this->dc1_ +$this->dc2_ +$this->dc3_ +$this->dc4_ +$this->dc5_ )/$evaluados_dc_p1)*$this->sc_temp_porcentaje_gr1/100;
$this->pcent_dp_ =(($this->dp1_ +$this->dp2_ +$this->dp3_ +$this->dp4_ +$this->dp5_ )/$evaluados_dp_p1)*$this->sc_temp_porcentaje_gr2/100;
$this->pcent_ds_ =(($this->ds1_ +$this->ds2_ +$this->ds3_ +$this->ds4_ +$this->ds5_ )/$evaluados_ds_p1)*$this->sc_temp_porcentaje_gr3 /100;
$this->porcent_aeep1_ =($this->aeep1_ *$this->sc_temp_porcent_autoevaluacion)/100;

$this->eval_1_per_ = $this->pcent_dc_ +$this->pcent_dp_ +$this->pcent_ds_ +$this->porcent_aeep1_ ;
if (isset($this->sc_temp_nota_maxima)) { $_SESSION['nota_maxima'] = $this->sc_temp_nota_maxima;}
if (isset($this->sc_temp_porcentaje_gr1)) { $_SESSION['porcentaje_gr1'] = $this->sc_temp_porcentaje_gr1;}
if (isset($this->sc_temp_porcentaje_gr2)) { $_SESSION['porcentaje_gr2'] = $this->sc_temp_porcentaje_gr2;}
if (isset($this->sc_temp_porcentaje_gr3)) { $_SESSION['porcentaje_gr3'] = $this->sc_temp_porcentaje_gr3;}
if (isset($this->sc_temp_porcent_autoevaluacion)) { $_SESSION['porcent_autoevaluacion'] = $this->sc_temp_porcent_autoevaluacion;}
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function dc1__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function dc2__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function dc3__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function dc4__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function dc5__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function dp1__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function dp2__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function dp3__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function dp4__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function dp5__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function ds1__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function ds2__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function ds3__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function ds4__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function ds5__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
                                       
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_ds1_ = $this->ds1_;
$original_ds2_ = $this->ds2_;
$original_ds3_ = $this->ds3_;
$original_dp1_ = $this->dp1_;
$original_dp3_ = $this->dp3_;
$original_dp2_ = $this->dp2_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_porcent_aeep1_ = $this->porcent_aeep1_;
$original_aeep1_ = $this->aeep1_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_ds1_ = $this->ds1_;
$modificado_ds2_ = $this->ds2_;
$modificado_ds3_ = $this->ds3_;
$modificado_dp1_ = $this->dp1_;
$modificado_dp3_ = $this->dp3_;
$modificado_dp2_ = $this->dp2_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_porcent_aeep1_ = $this->porcent_aeep1_;
$modificado_aeep1_ = $this->aeep1_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'ds1_', 'ds2_', 'ds3_', 'dp1_', 'dp3_', 'dp2_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'porcent_aeep1_', 'aeep1_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds1_ !== $modificado_ds1_ || (isset($bFlagRead_ds1_) && $bFlagRead_ds1_))
{
    $this->nmgp_refresh_fields[] = 'ds1_';
    $this->NM_ajax_changed['ds1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds2_ !== $modificado_ds2_ || (isset($bFlagRead_ds2_) && $bFlagRead_ds2_))
{
    $this->nmgp_refresh_fields[] = 'ds2_';
    $this->NM_ajax_changed['ds2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ds3_ !== $modificado_ds3_ || (isset($bFlagRead_ds3_) && $bFlagRead_ds3_))
{
    $this->nmgp_refresh_fields[] = 'ds3_';
    $this->NM_ajax_changed['ds3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp1_ !== $modificado_dp1_ || (isset($bFlagRead_dp1_) && $bFlagRead_dp1_))
{
    $this->nmgp_refresh_fields[] = 'dp1_';
    $this->NM_ajax_changed['dp1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp3_ !== $modificado_dp3_ || (isset($bFlagRead_dp3_) && $bFlagRead_dp3_))
{
    $this->nmgp_refresh_fields[] = 'dp3_';
    $this->NM_ajax_changed['dp3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dp2_ !== $modificado_dp2_ || (isset($bFlagRead_dp2_) && $bFlagRead_dp2_))
{
    $this->nmgp_refresh_fields[] = 'dp2_';
    $this->NM_ajax_changed['dp2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porcent_aeep1_ !== $modificado_porcent_aeep1_ || (isset($bFlagRead_porcent_aeep1_) && $bFlagRead_porcent_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'porcent_aeep1_';
    $this->NM_ajax_changed['porcent_aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_aeep1_ !== $modificado_aeep1_ || (isset($bFlagRead_aeep1_) && $bFlagRead_aeep1_))
{
    $this->nmgp_refresh_fields[] = 'aeep1_';
    $this->NM_ajax_changed['aeep1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m3_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
function parametrosGenerales()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'on';
if (!isset($this->sc_temp_porcent_autoevaluacion)) {$this->sc_temp_porcent_autoevaluacion = (isset($_SESSION['porcent_autoevaluacion'])) ? $_SESSION['porcent_autoevaluacion'] : "";}
if (!isset($this->sc_temp_etoqieta_autoevaluacion)) {$this->sc_temp_etoqieta_autoevaluacion = (isset($_SESSION['etoqieta_autoevaluacion'])) ? $_SESSION['etoqieta_autoevaluacion'] : "";}
if (!isset($this->sc_temp_criterio_ds5)) {$this->sc_temp_criterio_ds5 = (isset($_SESSION['criterio_ds5'])) ? $_SESSION['criterio_ds5'] : "";}
if (!isset($this->sc_temp_criterio_ds4)) {$this->sc_temp_criterio_ds4 = (isset($_SESSION['criterio_ds4'])) ? $_SESSION['criterio_ds4'] : "";}
if (!isset($this->sc_temp_criterio_ds3)) {$this->sc_temp_criterio_ds3 = (isset($_SESSION['criterio_ds3'])) ? $_SESSION['criterio_ds3'] : "";}
if (!isset($this->sc_temp_criterio_ds2)) {$this->sc_temp_criterio_ds2 = (isset($_SESSION['criterio_ds2'])) ? $_SESSION['criterio_ds2'] : "";}
if (!isset($this->sc_temp_criterio_ds1)) {$this->sc_temp_criterio_ds1 = (isset($_SESSION['criterio_ds1'])) ? $_SESSION['criterio_ds1'] : "";}
if (!isset($this->sc_temp_criterio_dp5)) {$this->sc_temp_criterio_dp5 = (isset($_SESSION['criterio_dp5'])) ? $_SESSION['criterio_dp5'] : "";}
if (!isset($this->sc_temp_criterio_dp4)) {$this->sc_temp_criterio_dp4 = (isset($_SESSION['criterio_dp4'])) ? $_SESSION['criterio_dp4'] : "";}
if (!isset($this->sc_temp_criterio_dp3)) {$this->sc_temp_criterio_dp3 = (isset($_SESSION['criterio_dp3'])) ? $_SESSION['criterio_dp3'] : "";}
if (!isset($this->sc_temp_criterio_dp2)) {$this->sc_temp_criterio_dp2 = (isset($_SESSION['criterio_dp2'])) ? $_SESSION['criterio_dp2'] : "";}
if (!isset($this->sc_temp_criterio_dp1)) {$this->sc_temp_criterio_dp1 = (isset($_SESSION['criterio_dp1'])) ? $_SESSION['criterio_dp1'] : "";}
if (!isset($this->sc_temp_porcentaje_gr3)) {$this->sc_temp_porcentaje_gr3 = (isset($_SESSION['porcentaje_gr3'])) ? $_SESSION['porcentaje_gr3'] : "";}
if (!isset($this->sc_temp_porcentaje_gr2)) {$this->sc_temp_porcentaje_gr2 = (isset($_SESSION['porcentaje_gr2'])) ? $_SESSION['porcentaje_gr2'] : "";}
if (!isset($this->sc_temp_porcentaje_gr1)) {$this->sc_temp_porcentaje_gr1 = (isset($_SESSION['porcentaje_gr1'])) ? $_SESSION['porcentaje_gr1'] : "";}
                                       
$check_sql = "SELECT 
etiqueta_grupo_1,
porcentaje_grupo1,
etiqueta_grupo_2,
criterio_1_grupo2,
criterio_2_grupo2,
criterio_3_grupo2,
criterio_4_grupo2,
criterio_5_grupo2,
porcentaje_grupo2,
etiqueta_grupo_3,
criterio_1_grupo3,
criterio_2_grupo3,
criterio_3_grupo3,
criterio_4_grupo3,
criterio_5_grupo3,
porcentaje_grupo3,
etiqtiqueta_autoevaluacion,
porcentaje_autoevaluacion
FROM
parametros_evaluacion
";
  
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

   if (isset($this->rs[0][0]))     
{
   $_etiqueta_g1 = $this->rs[0][0];	 
	$_porce_g1 = $this->rs[0][1];
    $_etique_g2 = $this->rs[0][2];	
    $_crite_1_g2 = $this->rs[0][3];
	$_crite_2_g2 = $this->rs[0][4];
	$_crite_3_g2 = $this->rs[0][5];
	$_crite_4_g2 = $this->rs[0][6];
	$_crite_5_g2 = $this->rs[0][7];
	$_porce_g2 = $this->rs[0][8];
	$_etiqueta_g3 = $this->rs[0][9];	
	$_crite_1_g3 = $this->rs[0][10];
	$_crite_2_g3 = $this->rs[0][11];
	$_crite_3_g3 = $this->rs[0][12];
	$_crite_4_g3 = $this->rs[0][13];
	$_crite_5_g3 = $this->rs[0][14];
	$_porce_g3 = $this->rs[0][15];
	$_etique_autoeval = $this->rs[0][16];
	$_porce_auto_eval = $this->rs[0][17];
	
}
		else     
{
    $_etiqueta_g1 = "";     
	$_porce_g1 =  "";
    $_etique_g2 =  "";    
    $_crite_1_g2 =  "";
	$_crite_2_g2 =  "";
	$_crite_3_g2 =  "";
	$_crite_4_g2 =  "";
	$_crite_5_g2 =  "";
	$_porce_g2 =  "";
	$_etiqueta_g3 =  "";	
	$_crite_1_g3 =  "";
	$_crite_2_g3 =  "";
	$_crite_3_g3 =  "";
	$_crite_4_g3 =  "";
	$_crite_5_g3 =  "";
	$_porce_g3 =  "";	
	$_etique_autoeval =  "";
	$_porce_auto_eval =  "";
	
}

$this->sc_temp_porcentaje_gr1 = $_porce_g1;
$this->sc_temp_porcentaje_gr2 = $_porce_g2;
$this->sc_temp_porcentaje_gr3 = $_porce_g3;

$this->sc_temp_criterio_dp1 = $_crite_1_g2;
$this->sc_temp_criterio_dp2 = $_crite_2_g2;
$this->sc_temp_criterio_dp3 = $_crite_3_g2;
$this->sc_temp_criterio_dp4 = $_crite_4_g2;
$this->sc_temp_criterio_dp5 = $_crite_5_g2;
$this->sc_temp_criterio_ds1 = $_crite_1_g3;
$this->sc_temp_criterio_ds2 = $_crite_2_g3;
$this->sc_temp_criterio_ds3 = $_crite_3_g3;
$this->sc_temp_criterio_ds4 = $_crite_4_g3;
$this->sc_temp_criterio_ds5 = $_crite_5_g3;
$this->sc_temp_etoqieta_autoevaluacion = $_etique_autoeval;
$this->sc_temp_porcent_autoevaluacion = $_porce_auto_eval;
$this->sc_temp_porcentaje_gr1 = $_porce_g1;
$this->sc_temp_porcentaje_gr2 = $_porce_g2;
$this->sc_temp_porcentaje_gr3 = $_porce_g3;
if (isset($this->sc_temp_porcentaje_gr1)) { $_SESSION['porcentaje_gr1'] = $this->sc_temp_porcentaje_gr1;}
if (isset($this->sc_temp_porcentaje_gr2)) { $_SESSION['porcentaje_gr2'] = $this->sc_temp_porcentaje_gr2;}
if (isset($this->sc_temp_porcentaje_gr3)) { $_SESSION['porcentaje_gr3'] = $this->sc_temp_porcentaje_gr3;}
if (isset($this->sc_temp_criterio_dp1)) { $_SESSION['criterio_dp1'] = $this->sc_temp_criterio_dp1;}
if (isset($this->sc_temp_criterio_dp2)) { $_SESSION['criterio_dp2'] = $this->sc_temp_criterio_dp2;}
if (isset($this->sc_temp_criterio_dp3)) { $_SESSION['criterio_dp3'] = $this->sc_temp_criterio_dp3;}
if (isset($this->sc_temp_criterio_dp4)) { $_SESSION['criterio_dp4'] = $this->sc_temp_criterio_dp4;}
if (isset($this->sc_temp_criterio_dp5)) { $_SESSION['criterio_dp5'] = $this->sc_temp_criterio_dp5;}
if (isset($this->sc_temp_criterio_ds1)) { $_SESSION['criterio_ds1'] = $this->sc_temp_criterio_ds1;}
if (isset($this->sc_temp_criterio_ds2)) { $_SESSION['criterio_ds2'] = $this->sc_temp_criterio_ds2;}
if (isset($this->sc_temp_criterio_ds3)) { $_SESSION['criterio_ds3'] = $this->sc_temp_criterio_ds3;}
if (isset($this->sc_temp_criterio_ds4)) { $_SESSION['criterio_ds4'] = $this->sc_temp_criterio_ds4;}
if (isset($this->sc_temp_criterio_ds5)) { $_SESSION['criterio_ds5'] = $this->sc_temp_criterio_ds5;}
if (isset($this->sc_temp_etoqieta_autoevaluacion)) { $_SESSION['etoqieta_autoevaluacion'] = $this->sc_temp_etoqieta_autoevaluacion;}
if (isset($this->sc_temp_porcent_autoevaluacion)) { $_SESSION['porcent_autoevaluacion'] = $this->sc_temp_porcent_autoevaluacion;}
$_SESSION['scriptcase']['form_t_evaluacion_p1_m3']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_t_evaluacion_p1_m3_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_t_evaluacion_p1_m3_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_estudiante_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "id_estudiante", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id_asignatura", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id_grupo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ihs", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_estudiante_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "id_estudiante", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "estatus", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "novedad", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "inasistencia_p1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "eval_1_per", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc5", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_dc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_dp", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_ds", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "aeep1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "porcent_aeep1", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter_form'] . " and (id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura= " . $_SESSION['par_id_asignatura'] . " AND entorno = " . $_SESSION['entorno'] . ") and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura= " . $_SESSION['par_id_asignatura'] . " AND entorno = " . $_SESSION['entorno'] . " and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_t_evaluacion_p1_m3 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['total'] = $qt_geral_reg_form_t_evaluacion_p1_m3;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_t_evaluacion_p1_m3_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_t_evaluacion_p1_m3_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id_estudiante";$nm_numeric[] = "id_grupo";$nm_numeric[] = "id_area";$nm_numeric[] = "id_asignatura";$nm_numeric[] = "id_grado";$nm_numeric[] = "id_nivel";$nm_numeric[] = "ihs";$nm_numeric[] = "pfa";$nm_numeric[] = "inasistencia_p1";$nm_numeric[] = "eval_1_per";$nm_numeric[] = "dc1";$nm_numeric[] = "dc2";$nm_numeric[] = "dc3";$nm_numeric[] = "dc4";$nm_numeric[] = "dc5";$nm_numeric[] = "dc6";$nm_numeric[] = "dc7";$nm_numeric[] = "dc8";$nm_numeric[] = "dc9";$nm_numeric[] = "pcent_dc";$nm_numeric[] = "ds1";$nm_numeric[] = "ds2";$nm_numeric[] = "ds3";$nm_numeric[] = "ds4";$nm_numeric[] = "ds5";$nm_numeric[] = "pcent_ds";$nm_numeric[] = "dp1";$nm_numeric[] = "dp2";$nm_numeric[] = "dp3";$nm_numeric[] = "dp4";$nm_numeric[] = "dp5";$nm_numeric[] = "pcent_dp";$nm_numeric[] = "aeep1";$nm_numeric[] = "porcent_aeep1";$nm_numeric[] = "inasistencia_p2";$nm_numeric[] = "eval_2_per";$nm_numeric[] = "dc1_2p";$nm_numeric[] = "dc2_2p";$nm_numeric[] = "dc3_2p";$nm_numeric[] = "dc4_2p";$nm_numeric[] = "dc5_2p";$nm_numeric[] = "pcent_dc2";$nm_numeric[] = "ds1_2p";$nm_numeric[] = "ds2_2p";$nm_numeric[] = "ds3_2p";$nm_numeric[] = "ds4_2p";$nm_numeric[] = "ds5_2p";$nm_numeric[] = "pcent_ds2";$nm_numeric[] = "dp1_2p";$nm_numeric[] = "dp2_2p";$nm_numeric[] = "dp3_2p";$nm_numeric[] = "dp4_2p";$nm_numeric[] = "dp5_2p";$nm_numeric[] = "pcent_dp2";$nm_numeric[] = "aee_p2";$nm_numeric[] = "porcet_aee_p2";$nm_numeric[] = "inasistencia_p3";$nm_numeric[] = "eval_3_per";$nm_numeric[] = "dc1_3p";$nm_numeric[] = "dc2_3p";$nm_numeric[] = "dc3_3p";$nm_numeric[] = "dc4_3p";$nm_numeric[] = "dc5_3p";$nm_numeric[] = "pcent_dc3";$nm_numeric[] = "ds1_p3";$nm_numeric[] = "ds2_p3";$nm_numeric[] = "ds3_p3";$nm_numeric[] = "ds4_p3";$nm_numeric[] = "ds5_p3";$nm_numeric[] = "pcent_ds3";$nm_numeric[] = "dp1_p3";$nm_numeric[] = "dp2_p3";$nm_numeric[] = "dp3_p3";$nm_numeric[] = "dp4_p3";$nm_numeric[] = "`dp5-p3`";$nm_numeric[] = "pcent_dp3";$nm_numeric[] = "aee_p3";$nm_numeric[] = "porcent_aee_p3";$nm_numeric[] = "inasistencia_p4";$nm_numeric[] = "eval_4_per";$nm_numeric[] = "dc1_p4";$nm_numeric[] = "dc2_p4";$nm_numeric[] = "dc3_p4";$nm_numeric[] = "dc4_p4";$nm_numeric[] = "dc5_p4";$nm_numeric[] = "pcent_dc4";$nm_numeric[] = "ds1_p4";$nm_numeric[] = "ds2_p4";$nm_numeric[] = "ds3_p4";$nm_numeric[] = "ds4_p4";$nm_numeric[] = "ds5_p4";$nm_numeric[] = "pcent_ds4";$nm_numeric[] = "dp1_p4";$nm_numeric[] = "dp2_p4";$nm_numeric[] = "dp3_p4";$nm_numeric[] = "dp4_p4";$nm_numeric[] = "dp5_p4";$nm_numeric[] = "aee_p4";$nm_numeric[] = "porcent_aee_p4";$nm_numeric[] = "pcent_dp4";$nm_numeric[] = "eval_final";$nm_numeric[] = "entorno";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
   function SC_lookup_id_estudiante_($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT concat_ws(' ',primer_apellido,segundo_apellido,primer_nombre,segundo_nombre), idstudents FROM students WHERE (concat_ws(' ',primer_apellido,segundo_apellido,primer_nombre,segundo_nombre) LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_t_evaluacion_p1_m3_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_t_evaluacion_p1_m3_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_t_evaluacion_p1_m3_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m3']['masterValue']);
?>
}
<?php
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
