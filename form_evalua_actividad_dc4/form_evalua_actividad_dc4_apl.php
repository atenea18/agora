<?php
//
class form_evalua_actividad_dc4_apl
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
   var $id_estudiante;
   var $id_estudiante_1;
   var $primer_apellido;
   var $segundo_apellido;
   var $primer_nombre;
   var $segundo_nombre;
   var $id_grupo;
   var $id_area;
   var $id_asignatura;
   var $id_grado;
   var $id_nivel;
   var $ihs;
   var $pfa;
   var $tipo_asig;
   var $novedad;
   var $estatus;
   var $eval_1_per;
   var $dc1;
   var $dc2;
   var $dc3;
   var $dc4;
   var $dc5;
   var $pcent_dc;
   var $ds1;
   var $ds2;
   var $ds3;
   var $ds4;
   var $ds5;
   var $pcent_ds;
   var $dp1;
   var $dp2;
   var $dp3;
   var $dp4;
   var $dp5;
   var $pcent_dp;
   var $eval_2_per;
   var $dc1_2p;
   var $dc2_2p;
   var $dc3_2p;
   var $dc4_2p;
   var $dc5_2p;
   var $pcent_dc2;
   var $ds1_2p;
   var $ds2_2p;
   var $ds3_2p;
   var $ds4_2p;
   var $ds5_2p;
   var $pcent_ds2;
   var $dp1_2p;
   var $dp2_2p;
   var $dp3_2p;
   var $dp4_2p;
   var $dp5_2p;
   var $pcent_dp2;
   var $eval_3_per;
   var $dc1_3p;
   var $dc2_3p;
   var $dc3_3p;
   var $dc4_3p;
   var $dc5_3p;
   var $pcent_dc3;
   var $ds1_p3;
   var $ds2_p3;
   var $ds3_p3;
   var $ds4_p3;
   var $ds5_p3;
   var $pcent_ds3;
   var $dp1_p3;
   var $dp2_p3;
   var $dp3_p3;
   var $dp4_p3;
   var $sc_field_0;
   var $pcent_dp3;
   var $eval_4_per;
   var $dc1_p4;
   var $dc2_p4;
   var $dc3_p4;
   var $dc4_p4;
   var $dc5_p4;
   var $pcent_dc4;
   var $ds1_p4;
   var $ds2_p4;
   var $ds3_p4;
   var $ds4_p4;
   var $ds5_p4;
   var $pcent_ds4;
   var $dp1_p4;
   var $dp2_p4;
   var $dp3_p4;
   var $dp4_p4;
   var $dp5_p4;
   var $pcent_dp4;
   var $eval_final;
   var $entorno;
   var $actividades;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
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
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
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
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['actividades']))
          {
              $this->actividades = $this->NM_ajax_info['param']['actividades'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['dc4']))
          {
              $this->dc4 = $this->NM_ajax_info['param']['dc4'];
          }
          if (isset($this->NM_ajax_info['param']['id_asignatura']))
          {
              $this->id_asignatura = $this->NM_ajax_info['param']['id_asignatura'];
          }
          if (isset($this->NM_ajax_info['param']['id_estudiante']))
          {
              $this->id_estudiante = $this->NM_ajax_info['param']['id_estudiante'];
          }
          if (isset($this->NM_ajax_info['param']['id_grupo']))
          {
              $this->id_grupo = $this->NM_ajax_info['param']['id_grupo'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
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
      $this->sc_conv_var['dp5-p3'] = "sc_field_0";
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
      if (isset($this->par_idasignatura) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idasignatura'] = $this->par_idasignatura;
      }
      if (isset($this->par_idestudiante) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idestudiante'] = $this->par_idestudiante;
      }
      if (isset($this->entorno) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['entorno'] = $this->entorno;
      }
      if (isset($this->par_codigo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_codigo'] = $this->par_codigo;
      }
      if (isset($_POST["par_idgrupo"])) 
      {
          $_SESSION['par_idgrupo'] = $this->par_idgrupo;
      }
      if (isset($_POST["par_idasignatura"])) 
      {
          $_SESSION['par_idasignatura'] = $this->par_idasignatura;
      }
      if (isset($_POST["par_idestudiante"])) 
      {
          $_SESSION['par_idestudiante'] = $this->par_idestudiante;
      }
      if (isset($_POST["entorno"])) 
      {
          $_SESSION['entorno'] = $this->entorno;
      }
      if (isset($_POST["par_codigo"])) 
      {
          $_SESSION['par_codigo'] = $this->par_codigo;
      }
      if (isset($_GET["par_idgrupo"])) 
      {
          $_SESSION['par_idgrupo'] = $this->par_idgrupo;
      }
      if (isset($_GET["par_idasignatura"])) 
      {
          $_SESSION['par_idasignatura'] = $this->par_idasignatura;
      }
      if (isset($_GET["par_idestudiante"])) 
      {
          $_SESSION['par_idestudiante'] = $this->par_idestudiante;
      }
      if (isset($_GET["entorno"])) 
      {
          $_SESSION['entorno'] = $this->entorno;
      }
      if (isset($_GET["par_codigo"])) 
      {
          $_SESSION['par_codigo'] = $this->par_codigo;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
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
                 nm_limpa_str_form_evalua_actividad_dc4($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->par_idgrupo)) 
          {
              $_SESSION['par_idgrupo'] = $this->par_idgrupo;
          }
          if (isset($this->par_idasignatura)) 
          {
              $_SESSION['par_idasignatura'] = $this->par_idasignatura;
          }
          if (isset($this->par_idestudiante)) 
          {
              $_SESSION['par_idestudiante'] = $this->par_idestudiante;
          }
          if (isset($this->entorno)) 
          {
              $_SESSION['entorno'] = $this->entorno;
          }
          if (isset($this->par_codigo)) 
          {
              $_SESSION['par_codigo'] = $this->par_codigo;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['total']))
          {
              $_SESSION['sc_session'][$script_case_init]['form_det_evalua_actividad']['reg_start'] = "";
              unset($_SESSION['sc_session'][$script_case_init]['form_det_evalua_actividad']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->par_idgrupo)) 
          {
              $_SESSION['par_idgrupo'] = $this->par_idgrupo;
          }
          if (isset($this->par_idasignatura)) 
          {
              $_SESSION['par_idasignatura'] = $this->par_idasignatura;
          }
          if (isset($this->par_idestudiante)) 
          {
              $_SESSION['par_idestudiante'] = $this->par_idestudiante;
          }
          if (isset($this->entorno)) 
          {
              $_SESSION['entorno'] = $this->entorno;
          }
          if (isset($this->par_codigo)) 
          {
              $_SESSION['par_codigo'] = $this->par_codigo;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_evalua_actividad_dc4_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_evalua_actividad_dc4']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_evalua_actividad_dc4']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_evalua_actividad_dc4'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_evalua_actividad_dc4']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_evalua_actividad_dc4']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_evalua_actividad_dc4') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_evalua_actividad_dc4']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - t_evaluacion";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_evalua_actividad_dc4")
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
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
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
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);



      $_SESSION['scriptcase']['error_icon']['form_evalua_actividad_dc4']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_evalua_actividad_dc4'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "off";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_orig'] = " where id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura = " . $_SESSION['par_idasignatura'] . " AND id_estudiante = " . $_SESSION['par_idestudiante'] . " AND entorno = " . $_SESSION['entorno'] . "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_pesq'] = " where id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura = " . $_SESSION['par_idasignatura'] . " AND id_estudiante = " . $_SESSION['par_idestudiante'] . " AND entorno = " . $_SESSION['entorno'] . "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_evalua_actividad_dc4']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['dados_form'];
          if (!isset($this->primer_apellido)){$this->primer_apellido = $this->nmgp_dados_form['primer_apellido'];} 
          if (!isset($this->segundo_apellido)){$this->segundo_apellido = $this->nmgp_dados_form['segundo_apellido'];} 
          if (!isset($this->primer_nombre)){$this->primer_nombre = $this->nmgp_dados_form['primer_nombre'];} 
          if (!isset($this->segundo_nombre)){$this->segundo_nombre = $this->nmgp_dados_form['segundo_nombre'];} 
          if (!isset($this->id_grupo)){$this->id_grupo = $this->nmgp_dados_form['id_grupo'];} 
          if (!isset($this->id_area)){$this->id_area = $this->nmgp_dados_form['id_area'];} 
          if (!isset($this->id_asignatura)){$this->id_asignatura = $this->nmgp_dados_form['id_asignatura'];} 
          if (!isset($this->id_grado)){$this->id_grado = $this->nmgp_dados_form['id_grado'];} 
          if (!isset($this->id_nivel)){$this->id_nivel = $this->nmgp_dados_form['id_nivel'];} 
          if (!isset($this->ihs)){$this->ihs = $this->nmgp_dados_form['ihs'];} 
          if (!isset($this->pfa)){$this->pfa = $this->nmgp_dados_form['pfa'];} 
          if (!isset($this->tipo_asig)){$this->tipo_asig = $this->nmgp_dados_form['tipo_asig'];} 
          if (!isset($this->novedad)){$this->novedad = $this->nmgp_dados_form['novedad'];} 
          if (!isset($this->estatus)){$this->estatus = $this->nmgp_dados_form['estatus'];} 
          if (!isset($this->eval_1_per)){$this->eval_1_per = $this->nmgp_dados_form['eval_1_per'];} 
          if (!isset($this->dc1)){$this->dc1 = $this->nmgp_dados_form['dc1'];} 
          if (!isset($this->dc2)){$this->dc2 = $this->nmgp_dados_form['dc2'];} 
          if (!isset($this->dc3)){$this->dc3 = $this->nmgp_dados_form['dc3'];} 
          if (!isset($this->dc5)){$this->dc5 = $this->nmgp_dados_form['dc5'];} 
          if (!isset($this->pcent_dc)){$this->pcent_dc = $this->nmgp_dados_form['pcent_dc'];} 
          if (!isset($this->ds1)){$this->ds1 = $this->nmgp_dados_form['ds1'];} 
          if (!isset($this->ds2)){$this->ds2 = $this->nmgp_dados_form['ds2'];} 
          if (!isset($this->ds3)){$this->ds3 = $this->nmgp_dados_form['ds3'];} 
          if (!isset($this->ds4)){$this->ds4 = $this->nmgp_dados_form['ds4'];} 
          if (!isset($this->ds5)){$this->ds5 = $this->nmgp_dados_form['ds5'];} 
          if (!isset($this->pcent_ds)){$this->pcent_ds = $this->nmgp_dados_form['pcent_ds'];} 
          if (!isset($this->dp1)){$this->dp1 = $this->nmgp_dados_form['dp1'];} 
          if (!isset($this->dp2)){$this->dp2 = $this->nmgp_dados_form['dp2'];} 
          if (!isset($this->dp3)){$this->dp3 = $this->nmgp_dados_form['dp3'];} 
          if (!isset($this->dp4)){$this->dp4 = $this->nmgp_dados_form['dp4'];} 
          if (!isset($this->dp5)){$this->dp5 = $this->nmgp_dados_form['dp5'];} 
          if (!isset($this->pcent_dp)){$this->pcent_dp = $this->nmgp_dados_form['pcent_dp'];} 
          if (!isset($this->eval_2_per)){$this->eval_2_per = $this->nmgp_dados_form['eval_2_per'];} 
          if (!isset($this->dc1_2p)){$this->dc1_2p = $this->nmgp_dados_form['dc1_2p'];} 
          if (!isset($this->dc2_2p)){$this->dc2_2p = $this->nmgp_dados_form['dc2_2p'];} 
          if (!isset($this->dc3_2p)){$this->dc3_2p = $this->nmgp_dados_form['dc3_2p'];} 
          if (!isset($this->dc4_2p)){$this->dc4_2p = $this->nmgp_dados_form['dc4_2p'];} 
          if (!isset($this->dc5_2p)){$this->dc5_2p = $this->nmgp_dados_form['dc5_2p'];} 
          if (!isset($this->pcent_dc2)){$this->pcent_dc2 = $this->nmgp_dados_form['pcent_dc2'];} 
          if (!isset($this->ds1_2p)){$this->ds1_2p = $this->nmgp_dados_form['ds1_2p'];} 
          if (!isset($this->ds2_2p)){$this->ds2_2p = $this->nmgp_dados_form['ds2_2p'];} 
          if (!isset($this->ds3_2p)){$this->ds3_2p = $this->nmgp_dados_form['ds3_2p'];} 
          if (!isset($this->ds4_2p)){$this->ds4_2p = $this->nmgp_dados_form['ds4_2p'];} 
          if (!isset($this->ds5_2p)){$this->ds5_2p = $this->nmgp_dados_form['ds5_2p'];} 
          if (!isset($this->pcent_ds2)){$this->pcent_ds2 = $this->nmgp_dados_form['pcent_ds2'];} 
          if (!isset($this->dp1_2p)){$this->dp1_2p = $this->nmgp_dados_form['dp1_2p'];} 
          if (!isset($this->dp2_2p)){$this->dp2_2p = $this->nmgp_dados_form['dp2_2p'];} 
          if (!isset($this->dp3_2p)){$this->dp3_2p = $this->nmgp_dados_form['dp3_2p'];} 
          if (!isset($this->dp4_2p)){$this->dp4_2p = $this->nmgp_dados_form['dp4_2p'];} 
          if (!isset($this->dp5_2p)){$this->dp5_2p = $this->nmgp_dados_form['dp5_2p'];} 
          if (!isset($this->pcent_dp2)){$this->pcent_dp2 = $this->nmgp_dados_form['pcent_dp2'];} 
          if (!isset($this->eval_3_per)){$this->eval_3_per = $this->nmgp_dados_form['eval_3_per'];} 
          if (!isset($this->dc1_3p)){$this->dc1_3p = $this->nmgp_dados_form['dc1_3p'];} 
          if (!isset($this->dc2_3p)){$this->dc2_3p = $this->nmgp_dados_form['dc2_3p'];} 
          if (!isset($this->dc3_3p)){$this->dc3_3p = $this->nmgp_dados_form['dc3_3p'];} 
          if (!isset($this->dc4_3p)){$this->dc4_3p = $this->nmgp_dados_form['dc4_3p'];} 
          if (!isset($this->dc5_3p)){$this->dc5_3p = $this->nmgp_dados_form['dc5_3p'];} 
          if (!isset($this->pcent_dc3)){$this->pcent_dc3 = $this->nmgp_dados_form['pcent_dc3'];} 
          if (!isset($this->ds1_p3)){$this->ds1_p3 = $this->nmgp_dados_form['ds1_p3'];} 
          if (!isset($this->ds2_p3)){$this->ds2_p3 = $this->nmgp_dados_form['ds2_p3'];} 
          if (!isset($this->ds3_p3)){$this->ds3_p3 = $this->nmgp_dados_form['ds3_p3'];} 
          if (!isset($this->ds4_p3)){$this->ds4_p3 = $this->nmgp_dados_form['ds4_p3'];} 
          if (!isset($this->ds5_p3)){$this->ds5_p3 = $this->nmgp_dados_form['ds5_p3'];} 
          if (!isset($this->pcent_ds3)){$this->pcent_ds3 = $this->nmgp_dados_form['pcent_ds3'];} 
          if (!isset($this->dp1_p3)){$this->dp1_p3 = $this->nmgp_dados_form['dp1_p3'];} 
          if (!isset($this->dp2_p3)){$this->dp2_p3 = $this->nmgp_dados_form['dp2_p3'];} 
          if (!isset($this->dp3_p3)){$this->dp3_p3 = $this->nmgp_dados_form['dp3_p3'];} 
          if (!isset($this->dp4_p3)){$this->dp4_p3 = $this->nmgp_dados_form['dp4_p3'];} 
          if (!isset($this->sc_field_0)){$this->sc_field_0 = $this->nmgp_dados_form['sc_field_0'];} 
          if (!isset($this->pcent_dp3)){$this->pcent_dp3 = $this->nmgp_dados_form['pcent_dp3'];} 
          if (!isset($this->eval_4_per)){$this->eval_4_per = $this->nmgp_dados_form['eval_4_per'];} 
          if (!isset($this->dc1_p4)){$this->dc1_p4 = $this->nmgp_dados_form['dc1_p4'];} 
          if (!isset($this->dc2_p4)){$this->dc2_p4 = $this->nmgp_dados_form['dc2_p4'];} 
          if (!isset($this->dc3_p4)){$this->dc3_p4 = $this->nmgp_dados_form['dc3_p4'];} 
          if (!isset($this->dc4_p4)){$this->dc4_p4 = $this->nmgp_dados_form['dc4_p4'];} 
          if (!isset($this->dc5_p4)){$this->dc5_p4 = $this->nmgp_dados_form['dc5_p4'];} 
          if (!isset($this->pcent_dc4)){$this->pcent_dc4 = $this->nmgp_dados_form['pcent_dc4'];} 
          if (!isset($this->ds1_p4)){$this->ds1_p4 = $this->nmgp_dados_form['ds1_p4'];} 
          if (!isset($this->ds2_p4)){$this->ds2_p4 = $this->nmgp_dados_form['ds2_p4'];} 
          if (!isset($this->ds3_p4)){$this->ds3_p4 = $this->nmgp_dados_form['ds3_p4'];} 
          if (!isset($this->ds4_p4)){$this->ds4_p4 = $this->nmgp_dados_form['ds4_p4'];} 
          if (!isset($this->ds5_p4)){$this->ds5_p4 = $this->nmgp_dados_form['ds5_p4'];} 
          if (!isset($this->pcent_ds4)){$this->pcent_ds4 = $this->nmgp_dados_form['pcent_ds4'];} 
          if (!isset($this->dp1_p4)){$this->dp1_p4 = $this->nmgp_dados_form['dp1_p4'];} 
          if (!isset($this->dp2_p4)){$this->dp2_p4 = $this->nmgp_dados_form['dp2_p4'];} 
          if (!isset($this->dp3_p4)){$this->dp3_p4 = $this->nmgp_dados_form['dp3_p4'];} 
          if (!isset($this->dp4_p4)){$this->dp4_p4 = $this->nmgp_dados_form['dp4_p4'];} 
          if (!isset($this->dp5_p4)){$this->dp5_p4 = $this->nmgp_dados_form['dp5_p4'];} 
          if (!isset($this->pcent_dp4)){$this->pcent_dp4 = $this->nmgp_dados_form['pcent_dp4'];} 
          if (!isset($this->eval_final)){$this->eval_final = $this->nmgp_dados_form['eval_final'];} 
          if (!isset($this->entorno)){$this->entorno = $this->nmgp_dados_form['entorno'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_evalua_actividad_dc4", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_evalua_actividad_dc4_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_evalua_actividad_dc4_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_evalua_actividad_dc4/form_evalua_actividad_dc4_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_evalua_actividad_dc4_erro.class.php"); 
      }
      $this->Erro      = new form_evalua_actividad_dc4_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opcao']))
         { 
             if ($this->id_estudiante != "" || $this->id_grupo != "" || $this->id_asignatura != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_evalua_actividad_dc4']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      if ($this->nmgp_opcao == "excluir")
      {
          $GLOBALS['script_case_init'] = $this->Ini->sc_page;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['embutida_form'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['embutida_proc'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['reg_start'] = "";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_det_evalua_actividad') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_det_evalua_actividad') . "/form_det_evalua_actividad_apl.php");
          $this->form_det_evalua_actividad = new form_det_evalua_actividad_apl;
      }
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->id_estudiante)) { $this->nm_limpa_alfa($this->id_estudiante); }
      if (isset($this->dc4)) { $this->nm_limpa_alfa($this->dc4); }
      if (isset($this->actividades)) { $this->nm_limpa_alfa($this->actividades); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- dc4
      $this->field_config['dc4']               = array();
      $this->field_config['dc4']['symbol_grp'] = '';
      $this->field_config['dc4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc4']['symbol_dec'] = ',';
      $this->field_config['dc4']['symbol_neg'] = '-';
      $this->field_config['dc4']['format_neg'] = '2';
      //-- id_grupo
      $this->field_config['id_grupo']               = array();
      $this->field_config['id_grupo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_grupo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_grupo']['symbol_dec'] = '';
      $this->field_config['id_grupo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_grupo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_area
      $this->field_config['id_area']               = array();
      $this->field_config['id_area']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_area']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_area']['symbol_dec'] = '';
      $this->field_config['id_area']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_area']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_asignatura
      $this->field_config['id_asignatura']               = array();
      $this->field_config['id_asignatura']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_asignatura']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_asignatura']['symbol_dec'] = '';
      $this->field_config['id_asignatura']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_asignatura']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_grado
      $this->field_config['id_grado']               = array();
      $this->field_config['id_grado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_grado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_grado']['symbol_dec'] = '';
      $this->field_config['id_grado']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_grado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_nivel
      $this->field_config['id_nivel']               = array();
      $this->field_config['id_nivel']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_nivel']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_nivel']['symbol_dec'] = '';
      $this->field_config['id_nivel']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_nivel']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ihs
      $this->field_config['ihs']               = array();
      $this->field_config['ihs']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ihs']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ihs']['symbol_dec'] = '';
      $this->field_config['ihs']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ihs']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pfa
      $this->field_config['pfa']               = array();
      $this->field_config['pfa']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pfa']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pfa']['symbol_dec'] = '';
      $this->field_config['pfa']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pfa']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- eval_1_per
      $this->field_config['eval_1_per']               = array();
      $this->field_config['eval_1_per']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['eval_1_per']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eval_1_per']['symbol_dec'] = '';
      $this->field_config['eval_1_per']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['eval_1_per']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc1
      $this->field_config['dc1']               = array();
      $this->field_config['dc1']['symbol_grp'] = '';
      $this->field_config['dc1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc1']['symbol_dec'] = ',';
      $this->field_config['dc1']['symbol_neg'] = '-';
      $this->field_config['dc1']['format_neg'] = '2';
      //-- dc2
      $this->field_config['dc2']               = array();
      $this->field_config['dc2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc2']['symbol_dec'] = '';
      $this->field_config['dc2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc3
      $this->field_config['dc3']               = array();
      $this->field_config['dc3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc3']['symbol_dec'] = '';
      $this->field_config['dc3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc5
      $this->field_config['dc5']               = array();
      $this->field_config['dc5']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc5']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc5']['symbol_dec'] = '';
      $this->field_config['dc5']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc5']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_dc
      $this->field_config['pcent_dc']               = array();
      $this->field_config['pcent_dc']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_dc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dc']['symbol_dec'] = '';
      $this->field_config['pcent_dc']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_dc']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds1
      $this->field_config['ds1']               = array();
      $this->field_config['ds1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds1']['symbol_dec'] = '';
      $this->field_config['ds1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds2
      $this->field_config['ds2']               = array();
      $this->field_config['ds2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds2']['symbol_dec'] = '';
      $this->field_config['ds2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds3
      $this->field_config['ds3']               = array();
      $this->field_config['ds3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds3']['symbol_dec'] = '';
      $this->field_config['ds3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds4
      $this->field_config['ds4']               = array();
      $this->field_config['ds4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds4']['symbol_dec'] = '';
      $this->field_config['ds4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds5
      $this->field_config['ds5']               = array();
      $this->field_config['ds5']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds5']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds5']['symbol_dec'] = '';
      $this->field_config['ds5']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds5']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_ds
      $this->field_config['pcent_ds']               = array();
      $this->field_config['pcent_ds']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_ds']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_ds']['symbol_dec'] = '';
      $this->field_config['pcent_ds']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_ds']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp1
      $this->field_config['dp1']               = array();
      $this->field_config['dp1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp1']['symbol_dec'] = '';
      $this->field_config['dp1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp2
      $this->field_config['dp2']               = array();
      $this->field_config['dp2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp2']['symbol_dec'] = '';
      $this->field_config['dp2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp3
      $this->field_config['dp3']               = array();
      $this->field_config['dp3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp3']['symbol_dec'] = '';
      $this->field_config['dp3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp4
      $this->field_config['dp4']               = array();
      $this->field_config['dp4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp4']['symbol_dec'] = '';
      $this->field_config['dp4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp5
      $this->field_config['dp5']               = array();
      $this->field_config['dp5']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp5']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp5']['symbol_dec'] = '';
      $this->field_config['dp5']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp5']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_dp
      $this->field_config['pcent_dp']               = array();
      $this->field_config['pcent_dp']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_dp']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dp']['symbol_dec'] = '';
      $this->field_config['pcent_dp']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_dp']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- eval_2_per
      $this->field_config['eval_2_per']               = array();
      $this->field_config['eval_2_per']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['eval_2_per']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eval_2_per']['symbol_dec'] = '';
      $this->field_config['eval_2_per']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['eval_2_per']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc1_2p
      $this->field_config['dc1_2p']               = array();
      $this->field_config['dc1_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc1_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc1_2p']['symbol_dec'] = '';
      $this->field_config['dc1_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc1_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc2_2p
      $this->field_config['dc2_2p']               = array();
      $this->field_config['dc2_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc2_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc2_2p']['symbol_dec'] = '';
      $this->field_config['dc2_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc2_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc3_2p
      $this->field_config['dc3_2p']               = array();
      $this->field_config['dc3_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc3_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc3_2p']['symbol_dec'] = '';
      $this->field_config['dc3_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc3_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc4_2p
      $this->field_config['dc4_2p']               = array();
      $this->field_config['dc4_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc4_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc4_2p']['symbol_dec'] = '';
      $this->field_config['dc4_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc4_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc5_2p
      $this->field_config['dc5_2p']               = array();
      $this->field_config['dc5_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc5_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc5_2p']['symbol_dec'] = '';
      $this->field_config['dc5_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc5_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_dc2
      $this->field_config['pcent_dc2']               = array();
      $this->field_config['pcent_dc2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_dc2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dc2']['symbol_dec'] = '';
      $this->field_config['pcent_dc2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_dc2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds1_2p
      $this->field_config['ds1_2p']               = array();
      $this->field_config['ds1_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds1_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds1_2p']['symbol_dec'] = '';
      $this->field_config['ds1_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds1_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds2_2p
      $this->field_config['ds2_2p']               = array();
      $this->field_config['ds2_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds2_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds2_2p']['symbol_dec'] = '';
      $this->field_config['ds2_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds2_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds3_2p
      $this->field_config['ds3_2p']               = array();
      $this->field_config['ds3_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds3_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds3_2p']['symbol_dec'] = '';
      $this->field_config['ds3_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds3_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds4_2p
      $this->field_config['ds4_2p']               = array();
      $this->field_config['ds4_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds4_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds4_2p']['symbol_dec'] = '';
      $this->field_config['ds4_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds4_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds5_2p
      $this->field_config['ds5_2p']               = array();
      $this->field_config['ds5_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds5_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds5_2p']['symbol_dec'] = '';
      $this->field_config['ds5_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds5_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_ds2
      $this->field_config['pcent_ds2']               = array();
      $this->field_config['pcent_ds2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_ds2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_ds2']['symbol_dec'] = '';
      $this->field_config['pcent_ds2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_ds2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp1_2p
      $this->field_config['dp1_2p']               = array();
      $this->field_config['dp1_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp1_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp1_2p']['symbol_dec'] = '';
      $this->field_config['dp1_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp1_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp2_2p
      $this->field_config['dp2_2p']               = array();
      $this->field_config['dp2_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp2_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp2_2p']['symbol_dec'] = '';
      $this->field_config['dp2_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp2_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp3_2p
      $this->field_config['dp3_2p']               = array();
      $this->field_config['dp3_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp3_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp3_2p']['symbol_dec'] = '';
      $this->field_config['dp3_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp3_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp4_2p
      $this->field_config['dp4_2p']               = array();
      $this->field_config['dp4_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp4_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp4_2p']['symbol_dec'] = '';
      $this->field_config['dp4_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp4_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp5_2p
      $this->field_config['dp5_2p']               = array();
      $this->field_config['dp5_2p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp5_2p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp5_2p']['symbol_dec'] = '';
      $this->field_config['dp5_2p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp5_2p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_dp2
      $this->field_config['pcent_dp2']               = array();
      $this->field_config['pcent_dp2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_dp2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dp2']['symbol_dec'] = '';
      $this->field_config['pcent_dp2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_dp2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- eval_3_per
      $this->field_config['eval_3_per']               = array();
      $this->field_config['eval_3_per']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['eval_3_per']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eval_3_per']['symbol_dec'] = '';
      $this->field_config['eval_3_per']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['eval_3_per']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc1_3p
      $this->field_config['dc1_3p']               = array();
      $this->field_config['dc1_3p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc1_3p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc1_3p']['symbol_dec'] = '';
      $this->field_config['dc1_3p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc1_3p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc2_3p
      $this->field_config['dc2_3p']               = array();
      $this->field_config['dc2_3p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc2_3p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc2_3p']['symbol_dec'] = '';
      $this->field_config['dc2_3p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc2_3p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc3_3p
      $this->field_config['dc3_3p']               = array();
      $this->field_config['dc3_3p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc3_3p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc3_3p']['symbol_dec'] = '';
      $this->field_config['dc3_3p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc3_3p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc4_3p
      $this->field_config['dc4_3p']               = array();
      $this->field_config['dc4_3p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc4_3p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc4_3p']['symbol_dec'] = '';
      $this->field_config['dc4_3p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc4_3p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc5_3p
      $this->field_config['dc5_3p']               = array();
      $this->field_config['dc5_3p']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc5_3p']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc5_3p']['symbol_dec'] = '';
      $this->field_config['dc5_3p']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc5_3p']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_dc3
      $this->field_config['pcent_dc3']               = array();
      $this->field_config['pcent_dc3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_dc3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dc3']['symbol_dec'] = '';
      $this->field_config['pcent_dc3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_dc3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds1_p3
      $this->field_config['ds1_p3']               = array();
      $this->field_config['ds1_p3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds1_p3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds1_p3']['symbol_dec'] = '';
      $this->field_config['ds1_p3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds1_p3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds2_p3
      $this->field_config['ds2_p3']               = array();
      $this->field_config['ds2_p3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds2_p3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds2_p3']['symbol_dec'] = '';
      $this->field_config['ds2_p3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds2_p3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds3_p3
      $this->field_config['ds3_p3']               = array();
      $this->field_config['ds3_p3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds3_p3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds3_p3']['symbol_dec'] = '';
      $this->field_config['ds3_p3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds3_p3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds4_p3
      $this->field_config['ds4_p3']               = array();
      $this->field_config['ds4_p3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds4_p3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds4_p3']['symbol_dec'] = '';
      $this->field_config['ds4_p3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds4_p3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds5_p3
      $this->field_config['ds5_p3']               = array();
      $this->field_config['ds5_p3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds5_p3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds5_p3']['symbol_dec'] = '';
      $this->field_config['ds5_p3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds5_p3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_ds3
      $this->field_config['pcent_ds3']               = array();
      $this->field_config['pcent_ds3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_ds3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_ds3']['symbol_dec'] = '';
      $this->field_config['pcent_ds3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_ds3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp1_p3
      $this->field_config['dp1_p3']               = array();
      $this->field_config['dp1_p3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp1_p3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp1_p3']['symbol_dec'] = '';
      $this->field_config['dp1_p3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp1_p3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp2_p3
      $this->field_config['dp2_p3']               = array();
      $this->field_config['dp2_p3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp2_p3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp2_p3']['symbol_dec'] = '';
      $this->field_config['dp2_p3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp2_p3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp3_p3
      $this->field_config['dp3_p3']               = array();
      $this->field_config['dp3_p3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp3_p3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp3_p3']['symbol_dec'] = '';
      $this->field_config['dp3_p3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp3_p3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp4_p3
      $this->field_config['dp4_p3']               = array();
      $this->field_config['dp4_p3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp4_p3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp4_p3']['symbol_dec'] = '';
      $this->field_config['dp4_p3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp4_p3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- sc_field_0
      $this->field_config['sc_field_0']               = array();
      $this->field_config['sc_field_0']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['sc_field_0']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['sc_field_0']['symbol_dec'] = '';
      $this->field_config['sc_field_0']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['sc_field_0']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_dp3
      $this->field_config['pcent_dp3']               = array();
      $this->field_config['pcent_dp3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_dp3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dp3']['symbol_dec'] = '';
      $this->field_config['pcent_dp3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_dp3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- eval_4_per
      $this->field_config['eval_4_per']               = array();
      $this->field_config['eval_4_per']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['eval_4_per']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eval_4_per']['symbol_dec'] = '';
      $this->field_config['eval_4_per']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['eval_4_per']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc1_p4
      $this->field_config['dc1_p4']               = array();
      $this->field_config['dc1_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc1_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc1_p4']['symbol_dec'] = '';
      $this->field_config['dc1_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc1_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc2_p4
      $this->field_config['dc2_p4']               = array();
      $this->field_config['dc2_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc2_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc2_p4']['symbol_dec'] = '';
      $this->field_config['dc2_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc2_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc3_p4
      $this->field_config['dc3_p4']               = array();
      $this->field_config['dc3_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc3_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc3_p4']['symbol_dec'] = '';
      $this->field_config['dc3_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc3_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc4_p4
      $this->field_config['dc4_p4']               = array();
      $this->field_config['dc4_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc4_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc4_p4']['symbol_dec'] = '';
      $this->field_config['dc4_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc4_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dc5_p4
      $this->field_config['dc5_p4']               = array();
      $this->field_config['dc5_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dc5_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dc5_p4']['symbol_dec'] = '';
      $this->field_config['dc5_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dc5_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_dc4
      $this->field_config['pcent_dc4']               = array();
      $this->field_config['pcent_dc4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_dc4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dc4']['symbol_dec'] = '';
      $this->field_config['pcent_dc4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_dc4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds1_p4
      $this->field_config['ds1_p4']               = array();
      $this->field_config['ds1_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds1_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds1_p4']['symbol_dec'] = '';
      $this->field_config['ds1_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds1_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds2_p4
      $this->field_config['ds2_p4']               = array();
      $this->field_config['ds2_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds2_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds2_p4']['symbol_dec'] = '';
      $this->field_config['ds2_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds2_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds3_p4
      $this->field_config['ds3_p4']               = array();
      $this->field_config['ds3_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds3_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds3_p4']['symbol_dec'] = '';
      $this->field_config['ds3_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds3_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds4_p4
      $this->field_config['ds4_p4']               = array();
      $this->field_config['ds4_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds4_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds4_p4']['symbol_dec'] = '';
      $this->field_config['ds4_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds4_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ds5_p4
      $this->field_config['ds5_p4']               = array();
      $this->field_config['ds5_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ds5_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ds5_p4']['symbol_dec'] = '';
      $this->field_config['ds5_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ds5_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_ds4
      $this->field_config['pcent_ds4']               = array();
      $this->field_config['pcent_ds4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_ds4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_ds4']['symbol_dec'] = '';
      $this->field_config['pcent_ds4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_ds4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp1_p4
      $this->field_config['dp1_p4']               = array();
      $this->field_config['dp1_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp1_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp1_p4']['symbol_dec'] = '';
      $this->field_config['dp1_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp1_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp2_p4
      $this->field_config['dp2_p4']               = array();
      $this->field_config['dp2_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp2_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp2_p4']['symbol_dec'] = '';
      $this->field_config['dp2_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp2_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp3_p4
      $this->field_config['dp3_p4']               = array();
      $this->field_config['dp3_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp3_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp3_p4']['symbol_dec'] = '';
      $this->field_config['dp3_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp3_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp4_p4
      $this->field_config['dp4_p4']               = array();
      $this->field_config['dp4_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp4_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp4_p4']['symbol_dec'] = '';
      $this->field_config['dp4_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp4_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dp5_p4
      $this->field_config['dp5_p4']               = array();
      $this->field_config['dp5_p4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dp5_p4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dp5_p4']['symbol_dec'] = '';
      $this->field_config['dp5_p4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dp5_p4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pcent_dp4
      $this->field_config['pcent_dp4']               = array();
      $this->field_config['pcent_dp4']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pcent_dp4']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pcent_dp4']['symbol_dec'] = '';
      $this->field_config['pcent_dp4']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pcent_dp4']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- eval_final
      $this->field_config['eval_final']               = array();
      $this->field_config['eval_final']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['eval_final']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['eval_final']['symbol_dec'] = '';
      $this->field_config['eval_final']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['eval_final']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- entorno
      $this->field_config['entorno']               = array();
      $this->field_config['entorno']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['entorno']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['entorno']['symbol_dec'] = '';
      $this->field_config['entorno']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['entorno']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
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

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_id_estudiante' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_estudiante');
          }
          if ('validate_dc4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dc4');
          }
          if ('validate_actividades' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'actividades');
          }
          form_evalua_actividad_dc4_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['inline_form_seq'] = $this->sc_seq_row;
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
              form_evalua_actividad_dc4_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_evalua_actividad_dc4']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_evalua_actividad_dc4_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
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
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_evalua_actividad_dc4_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_evalua_actividad_dc4_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
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
           case 'id_estudiante':
               return "Id Estudiante";
               break;
           case 'dc4':
               return "Dc 4";
               break;
           case 'actividades':
               return "actividades";
               break;
           case 'primer_apellido':
               return "Primer Apellido";
               break;
           case 'segundo_apellido':
               return "Segundo Apellido";
               break;
           case 'primer_nombre':
               return "Primer Nombre";
               break;
           case 'segundo_nombre':
               return "Segundo Nombre";
               break;
           case 'id_grupo':
               return "Id Grupo";
               break;
           case 'id_area':
               return "Id Area";
               break;
           case 'id_asignatura':
               return "Id Asignatura";
               break;
           case 'id_grado':
               return "Id Grado";
               break;
           case 'id_nivel':
               return "Id Nivel";
               break;
           case 'ihs':
               return "Ihs";
               break;
           case 'pfa':
               return "Pfa";
               break;
           case 'tipo_asig':
               return "Tipo Asig";
               break;
           case 'novedad':
               return "Novedad";
               break;
           case 'estatus':
               return "Estatus";
               break;
           case 'eval_1_per':
               return "Eval 1 Per";
               break;
           case 'dc1':
               return "Dc 1";
               break;
           case 'dc2':
               return "Dc 2";
               break;
           case 'dc3':
               return "Dc 3";
               break;
           case 'dc5':
               return "Dc 5";
               break;
           case 'pcent_dc':
               return "Pcent Dc";
               break;
           case 'ds1':
               return "Ds 1";
               break;
           case 'ds2':
               return "Ds 2";
               break;
           case 'ds3':
               return "Ds 3";
               break;
           case 'ds4':
               return "Ds 4";
               break;
           case 'ds5':
               return "Ds 5";
               break;
           case 'pcent_ds':
               return "Pcent Ds";
               break;
           case 'dp1':
               return "Dp 1";
               break;
           case 'dp2':
               return "Dp 2";
               break;
           case 'dp3':
               return "Dp 3";
               break;
           case 'dp4':
               return "Dp 4";
               break;
           case 'dp5':
               return "Dp 5";
               break;
           case 'pcent_dp':
               return "Pcent Dp";
               break;
           case 'eval_2_per':
               return "Eval 2 Per";
               break;
           case 'dc1_2p':
               return "Dc 1 2p";
               break;
           case 'dc2_2p':
               return "Dc 2 2p";
               break;
           case 'dc3_2p':
               return "Dc 3 2p";
               break;
           case 'dc4_2p':
               return "Dc 4 2p";
               break;
           case 'dc5_2p':
               return "Dc 5 2p";
               break;
           case 'pcent_dc2':
               return "Pcent Dc 2";
               break;
           case 'ds1_2p':
               return "Ds 1 2p";
               break;
           case 'ds2_2p':
               return "Ds 2 2p";
               break;
           case 'ds3_2p':
               return "Ds 3 2p";
               break;
           case 'ds4_2p':
               return "Ds 4 2p";
               break;
           case 'ds5_2p':
               return "Ds 5 2p";
               break;
           case 'pcent_ds2':
               return "Pcent Ds 2";
               break;
           case 'dp1_2p':
               return "Dp 1 2p";
               break;
           case 'dp2_2p':
               return "Dp 2 2p";
               break;
           case 'dp3_2p':
               return "Dp 3 2p";
               break;
           case 'dp4_2p':
               return "Dp 4 2p";
               break;
           case 'dp5_2p':
               return "Dp 5 2p";
               break;
           case 'pcent_dp2':
               return "Pcent Dp 2";
               break;
           case 'eval_3_per':
               return "Eval 3 Per";
               break;
           case 'dc1_3p':
               return "Dc 1 3p";
               break;
           case 'dc2_3p':
               return "Dc 2 3p";
               break;
           case 'dc3_3p':
               return "Dc 3 3p";
               break;
           case 'dc4_3p':
               return "Dc 4 3p";
               break;
           case 'dc5_3p':
               return "Dc 5 3p";
               break;
           case 'pcent_dc3':
               return "Pcent Dc 3";
               break;
           case 'ds1_p3':
               return "Ds 1 P 3";
               break;
           case 'ds2_p3':
               return "Ds 2 P 3";
               break;
           case 'ds3_p3':
               return "Ds 3 P 3";
               break;
           case 'ds4_p3':
               return "Ds 4 P 3";
               break;
           case 'ds5_p3':
               return "Ds 5 P 3";
               break;
           case 'pcent_ds3':
               return "Pcent Ds 3";
               break;
           case 'dp1_p3':
               return "Dp 1 P 3";
               break;
           case 'dp2_p3':
               return "Dp 2 P 3";
               break;
           case 'dp3_p3':
               return "Dp 3 P 3";
               break;
           case 'dp4_p3':
               return "Dp 4 P 3";
               break;
           case 'sc_field_0':
               return "Dp 5 P 3";
               break;
           case 'pcent_dp3':
               return "Pcent Dp 3";
               break;
           case 'eval_4_per':
               return "Eval 4 Per";
               break;
           case 'dc1_p4':
               return "Dc 1 P 4";
               break;
           case 'dc2_p4':
               return "Dc 2 P 4";
               break;
           case 'dc3_p4':
               return "Dc 3 P 4";
               break;
           case 'dc4_p4':
               return "Dc 4 P 4";
               break;
           case 'dc5_p4':
               return "Dc 5 P 4";
               break;
           case 'pcent_dc4':
               return "Pcent Dc 4";
               break;
           case 'ds1_p4':
               return "Ds 1 P 4";
               break;
           case 'ds2_p4':
               return "Ds 2 P 4";
               break;
           case 'ds3_p4':
               return "Ds 3 P 4";
               break;
           case 'ds4_p4':
               return "Ds 4 P 4";
               break;
           case 'ds5_p4':
               return "Ds 5 P 4";
               break;
           case 'pcent_ds4':
               return "Pcent Ds 4";
               break;
           case 'dp1_p4':
               return "Dp 1 P 4";
               break;
           case 'dp2_p4':
               return "Dp 2 P 4";
               break;
           case 'dp3_p4':
               return "Dp 3 P 4";
               break;
           case 'dp4_p4':
               return "Dp 4 P 4";
               break;
           case 'dp5_p4':
               return "Dp 5 P 4";
               break;
           case 'pcent_dp4':
               return "Pcent Dp 4";
               break;
           case 'eval_final':
               return "Eval Final";
               break;
           case 'entorno':
               return "Entorno";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_evalua_actividad_dc4']) || !is_array($this->NM_ajax_info['errList']['geral_form_evalua_actividad_dc4']))
              {
                  $this->NM_ajax_info['errList']['geral_form_evalua_actividad_dc4'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_evalua_actividad_dc4'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id_estudiante' == $filtro)
        $this->ValidateField_id_estudiante($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dc4' == $filtro)
        $this->ValidateField_dc4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'actividades' == $filtro)
        $this->ValidateField_actividades($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_id_estudiante(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->id_estudiante == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['php_cmp_required']['id_estudiante']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['php_cmp_required']['id_estudiante'] == "on"))
      {
          $Campos_Falta[] = "Id Estudiante" ; 
          if (!isset($Campos_Erros['id_estudiante']))
          {
              $Campos_Erros['id_estudiante'] = array();
          }
          $Campos_Erros['id_estudiante'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['id_estudiante']) || !is_array($this->NM_ajax_info['errList']['id_estudiante']))
          {
              $this->NM_ajax_info['errList']['id_estudiante'] = array();
          }
          $this->NM_ajax_info['errList']['id_estudiante'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->id_estudiante) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['Lookup_id_estudiante']) && !in_array($this->id_estudiante, $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['Lookup_id_estudiante']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['id_estudiante']))
              {
                  $Campos_Erros['id_estudiante'] = array();
              }
              $Campos_Erros['id_estudiante'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['id_estudiante']) || !is_array($this->NM_ajax_info['errList']['id_estudiante']))
              {
                  $this->NM_ajax_info['errList']['id_estudiante'] = array();
              }
              $this->NM_ajax_info['errList']['id_estudiante'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
   }
    } // ValidateField_id_estudiante

    function ValidateField_dc4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->dc4 == "")  
      { 
          $this->dc4 = 0;
          $this->sc_force_zero[] = 'dc4';
      } 
      if (!empty($this->field_config['dc4']['symbol_dec']))
      {
          nm_limpa_valor($this->dc4, $this->field_config['dc4']['symbol_dec'], $this->field_config['dc4']['symbol_grp']) ; 
          if ('.' == substr($this->dc4, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dc4, 1)))
              {
                  $this->dc4 = '';
              }
              else
              {
                  $this->dc4 = '0' . $this->dc4;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dc4 != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dc4) > $iTestSize)  
              { 
                  $Campos_Crit .= "Dc 4: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dc4']))
                  {
                      $Campos_Erros['dc4'] = array();
                  }
                  $Campos_Erros['dc4'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dc4']) || !is_array($this->NM_ajax_info['errList']['dc4']))
                  {
                      $this->NM_ajax_info['errList']['dc4'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc4'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dc4, 11, 1, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Dc 4; " ; 
                  if (!isset($Campos_Erros['dc4']))
                  {
                      $Campos_Erros['dc4'] = array();
                  }
                  $Campos_Erros['dc4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dc4']) || !is_array($this->NM_ajax_info['errList']['dc4']))
                  {
                      $this->NM_ajax_info['errList']['dc4'] = array();
                  }
                  $this->NM_ajax_info['errList']['dc4'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_dc4

    function ValidateField_actividades(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->actividades) != "")  
          { 
          } 
      } 
    } // ValidateField_actividades

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
    $this->nmgp_dados_form['id_estudiante'] = $this->id_estudiante;
    $this->nmgp_dados_form['dc4'] = $this->dc4;
    $this->nmgp_dados_form['actividades'] = $this->actividades;
    $this->nmgp_dados_form['primer_apellido'] = $this->primer_apellido;
    $this->nmgp_dados_form['segundo_apellido'] = $this->segundo_apellido;
    $this->nmgp_dados_form['primer_nombre'] = $this->primer_nombre;
    $this->nmgp_dados_form['segundo_nombre'] = $this->segundo_nombre;
    $this->nmgp_dados_form['id_grupo'] = $this->id_grupo;
    $this->nmgp_dados_form['id_area'] = $this->id_area;
    $this->nmgp_dados_form['id_asignatura'] = $this->id_asignatura;
    $this->nmgp_dados_form['id_grado'] = $this->id_grado;
    $this->nmgp_dados_form['id_nivel'] = $this->id_nivel;
    $this->nmgp_dados_form['ihs'] = $this->ihs;
    $this->nmgp_dados_form['pfa'] = $this->pfa;
    $this->nmgp_dados_form['tipo_asig'] = $this->tipo_asig;
    $this->nmgp_dados_form['novedad'] = $this->novedad;
    $this->nmgp_dados_form['estatus'] = $this->estatus;
    $this->nmgp_dados_form['eval_1_per'] = $this->eval_1_per;
    $this->nmgp_dados_form['dc1'] = $this->dc1;
    $this->nmgp_dados_form['dc2'] = $this->dc2;
    $this->nmgp_dados_form['dc3'] = $this->dc3;
    $this->nmgp_dados_form['dc5'] = $this->dc5;
    $this->nmgp_dados_form['pcent_dc'] = $this->pcent_dc;
    $this->nmgp_dados_form['ds1'] = $this->ds1;
    $this->nmgp_dados_form['ds2'] = $this->ds2;
    $this->nmgp_dados_form['ds3'] = $this->ds3;
    $this->nmgp_dados_form['ds4'] = $this->ds4;
    $this->nmgp_dados_form['ds5'] = $this->ds5;
    $this->nmgp_dados_form['pcent_ds'] = $this->pcent_ds;
    $this->nmgp_dados_form['dp1'] = $this->dp1;
    $this->nmgp_dados_form['dp2'] = $this->dp2;
    $this->nmgp_dados_form['dp3'] = $this->dp3;
    $this->nmgp_dados_form['dp4'] = $this->dp4;
    $this->nmgp_dados_form['dp5'] = $this->dp5;
    $this->nmgp_dados_form['pcent_dp'] = $this->pcent_dp;
    $this->nmgp_dados_form['eval_2_per'] = $this->eval_2_per;
    $this->nmgp_dados_form['dc1_2p'] = $this->dc1_2p;
    $this->nmgp_dados_form['dc2_2p'] = $this->dc2_2p;
    $this->nmgp_dados_form['dc3_2p'] = $this->dc3_2p;
    $this->nmgp_dados_form['dc4_2p'] = $this->dc4_2p;
    $this->nmgp_dados_form['dc5_2p'] = $this->dc5_2p;
    $this->nmgp_dados_form['pcent_dc2'] = $this->pcent_dc2;
    $this->nmgp_dados_form['ds1_2p'] = $this->ds1_2p;
    $this->nmgp_dados_form['ds2_2p'] = $this->ds2_2p;
    $this->nmgp_dados_form['ds3_2p'] = $this->ds3_2p;
    $this->nmgp_dados_form['ds4_2p'] = $this->ds4_2p;
    $this->nmgp_dados_form['ds5_2p'] = $this->ds5_2p;
    $this->nmgp_dados_form['pcent_ds2'] = $this->pcent_ds2;
    $this->nmgp_dados_form['dp1_2p'] = $this->dp1_2p;
    $this->nmgp_dados_form['dp2_2p'] = $this->dp2_2p;
    $this->nmgp_dados_form['dp3_2p'] = $this->dp3_2p;
    $this->nmgp_dados_form['dp4_2p'] = $this->dp4_2p;
    $this->nmgp_dados_form['dp5_2p'] = $this->dp5_2p;
    $this->nmgp_dados_form['pcent_dp2'] = $this->pcent_dp2;
    $this->nmgp_dados_form['eval_3_per'] = $this->eval_3_per;
    $this->nmgp_dados_form['dc1_3p'] = $this->dc1_3p;
    $this->nmgp_dados_form['dc2_3p'] = $this->dc2_3p;
    $this->nmgp_dados_form['dc3_3p'] = $this->dc3_3p;
    $this->nmgp_dados_form['dc4_3p'] = $this->dc4_3p;
    $this->nmgp_dados_form['dc5_3p'] = $this->dc5_3p;
    $this->nmgp_dados_form['pcent_dc3'] = $this->pcent_dc3;
    $this->nmgp_dados_form['ds1_p3'] = $this->ds1_p3;
    $this->nmgp_dados_form['ds2_p3'] = $this->ds2_p3;
    $this->nmgp_dados_form['ds3_p3'] = $this->ds3_p3;
    $this->nmgp_dados_form['ds4_p3'] = $this->ds4_p3;
    $this->nmgp_dados_form['ds5_p3'] = $this->ds5_p3;
    $this->nmgp_dados_form['pcent_ds3'] = $this->pcent_ds3;
    $this->nmgp_dados_form['dp1_p3'] = $this->dp1_p3;
    $this->nmgp_dados_form['dp2_p3'] = $this->dp2_p3;
    $this->nmgp_dados_form['dp3_p3'] = $this->dp3_p3;
    $this->nmgp_dados_form['dp4_p3'] = $this->dp4_p3;
    $this->nmgp_dados_form['sc_field_0'] = $this->sc_field_0;
    $this->nmgp_dados_form['pcent_dp3'] = $this->pcent_dp3;
    $this->nmgp_dados_form['eval_4_per'] = $this->eval_4_per;
    $this->nmgp_dados_form['dc1_p4'] = $this->dc1_p4;
    $this->nmgp_dados_form['dc2_p4'] = $this->dc2_p4;
    $this->nmgp_dados_form['dc3_p4'] = $this->dc3_p4;
    $this->nmgp_dados_form['dc4_p4'] = $this->dc4_p4;
    $this->nmgp_dados_form['dc5_p4'] = $this->dc5_p4;
    $this->nmgp_dados_form['pcent_dc4'] = $this->pcent_dc4;
    $this->nmgp_dados_form['ds1_p4'] = $this->ds1_p4;
    $this->nmgp_dados_form['ds2_p4'] = $this->ds2_p4;
    $this->nmgp_dados_form['ds3_p4'] = $this->ds3_p4;
    $this->nmgp_dados_form['ds4_p4'] = $this->ds4_p4;
    $this->nmgp_dados_form['ds5_p4'] = $this->ds5_p4;
    $this->nmgp_dados_form['pcent_ds4'] = $this->pcent_ds4;
    $this->nmgp_dados_form['dp1_p4'] = $this->dp1_p4;
    $this->nmgp_dados_form['dp2_p4'] = $this->dp2_p4;
    $this->nmgp_dados_form['dp3_p4'] = $this->dp3_p4;
    $this->nmgp_dados_form['dp4_p4'] = $this->dp4_p4;
    $this->nmgp_dados_form['dp5_p4'] = $this->dp5_p4;
    $this->nmgp_dados_form['pcent_dp4'] = $this->pcent_dp4;
    $this->nmgp_dados_form['eval_final'] = $this->eval_final;
    $this->nmgp_dados_form['entorno'] = $this->entorno;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      if (!empty($this->field_config['dc4']['symbol_dec']))
      {
         nm_limpa_valor($this->dc4, $this->field_config['dc4']['symbol_dec'], $this->field_config['dc4']['symbol_grp']);
      }
      nm_limpa_numero($this->id_grupo, $this->field_config['id_grupo']['symbol_grp']) ; 
      nm_limpa_numero($this->id_area, $this->field_config['id_area']['symbol_grp']) ; 
      nm_limpa_numero($this->id_asignatura, $this->field_config['id_asignatura']['symbol_grp']) ; 
      nm_limpa_numero($this->id_grado, $this->field_config['id_grado']['symbol_grp']) ; 
      nm_limpa_numero($this->id_nivel, $this->field_config['id_nivel']['symbol_grp']) ; 
      nm_limpa_numero($this->ihs, $this->field_config['ihs']['symbol_grp']) ; 
      nm_limpa_numero($this->pfa, $this->field_config['pfa']['symbol_grp']) ; 
      nm_limpa_numero($this->eval_1_per, $this->field_config['eval_1_per']['symbol_grp']) ; 
      if (!empty($this->field_config['dc1']['symbol_dec']))
      {
         nm_limpa_valor($this->dc1, $this->field_config['dc1']['symbol_dec'], $this->field_config['dc1']['symbol_grp']);
      }
      nm_limpa_numero($this->dc2, $this->field_config['dc2']['symbol_grp']) ; 
      nm_limpa_numero($this->dc3, $this->field_config['dc3']['symbol_grp']) ; 
      nm_limpa_numero($this->dc5, $this->field_config['dc5']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_dc, $this->field_config['pcent_dc']['symbol_grp']) ; 
      nm_limpa_numero($this->ds1, $this->field_config['ds1']['symbol_grp']) ; 
      nm_limpa_numero($this->ds2, $this->field_config['ds2']['symbol_grp']) ; 
      nm_limpa_numero($this->ds3, $this->field_config['ds3']['symbol_grp']) ; 
      nm_limpa_numero($this->ds4, $this->field_config['ds4']['symbol_grp']) ; 
      nm_limpa_numero($this->ds5, $this->field_config['ds5']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_ds, $this->field_config['pcent_ds']['symbol_grp']) ; 
      nm_limpa_numero($this->dp1, $this->field_config['dp1']['symbol_grp']) ; 
      nm_limpa_numero($this->dp2, $this->field_config['dp2']['symbol_grp']) ; 
      nm_limpa_numero($this->dp3, $this->field_config['dp3']['symbol_grp']) ; 
      nm_limpa_numero($this->dp4, $this->field_config['dp4']['symbol_grp']) ; 
      nm_limpa_numero($this->dp5, $this->field_config['dp5']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_dp, $this->field_config['pcent_dp']['symbol_grp']) ; 
      nm_limpa_numero($this->eval_2_per, $this->field_config['eval_2_per']['symbol_grp']) ; 
      nm_limpa_numero($this->dc1_2p, $this->field_config['dc1_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->dc2_2p, $this->field_config['dc2_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->dc3_2p, $this->field_config['dc3_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->dc4_2p, $this->field_config['dc4_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->dc5_2p, $this->field_config['dc5_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_dc2, $this->field_config['pcent_dc2']['symbol_grp']) ; 
      nm_limpa_numero($this->ds1_2p, $this->field_config['ds1_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->ds2_2p, $this->field_config['ds2_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->ds3_2p, $this->field_config['ds3_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->ds4_2p, $this->field_config['ds4_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->ds5_2p, $this->field_config['ds5_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_ds2, $this->field_config['pcent_ds2']['symbol_grp']) ; 
      nm_limpa_numero($this->dp1_2p, $this->field_config['dp1_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->dp2_2p, $this->field_config['dp2_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->dp3_2p, $this->field_config['dp3_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->dp4_2p, $this->field_config['dp4_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->dp5_2p, $this->field_config['dp5_2p']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_dp2, $this->field_config['pcent_dp2']['symbol_grp']) ; 
      nm_limpa_numero($this->eval_3_per, $this->field_config['eval_3_per']['symbol_grp']) ; 
      nm_limpa_numero($this->dc1_3p, $this->field_config['dc1_3p']['symbol_grp']) ; 
      nm_limpa_numero($this->dc2_3p, $this->field_config['dc2_3p']['symbol_grp']) ; 
      nm_limpa_numero($this->dc3_3p, $this->field_config['dc3_3p']['symbol_grp']) ; 
      nm_limpa_numero($this->dc4_3p, $this->field_config['dc4_3p']['symbol_grp']) ; 
      nm_limpa_numero($this->dc5_3p, $this->field_config['dc5_3p']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_dc3, $this->field_config['pcent_dc3']['symbol_grp']) ; 
      nm_limpa_numero($this->ds1_p3, $this->field_config['ds1_p3']['symbol_grp']) ; 
      nm_limpa_numero($this->ds2_p3, $this->field_config['ds2_p3']['symbol_grp']) ; 
      nm_limpa_numero($this->ds3_p3, $this->field_config['ds3_p3']['symbol_grp']) ; 
      nm_limpa_numero($this->ds4_p3, $this->field_config['ds4_p3']['symbol_grp']) ; 
      nm_limpa_numero($this->ds5_p3, $this->field_config['ds5_p3']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_ds3, $this->field_config['pcent_ds3']['symbol_grp']) ; 
      nm_limpa_numero($this->dp1_p3, $this->field_config['dp1_p3']['symbol_grp']) ; 
      nm_limpa_numero($this->dp2_p3, $this->field_config['dp2_p3']['symbol_grp']) ; 
      nm_limpa_numero($this->dp3_p3, $this->field_config['dp3_p3']['symbol_grp']) ; 
      nm_limpa_numero($this->dp4_p3, $this->field_config['dp4_p3']['symbol_grp']) ; 
      nm_limpa_numero($this->sc_field_0, $this->field_config['sc_field_0']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_dp3, $this->field_config['pcent_dp3']['symbol_grp']) ; 
      nm_limpa_numero($this->eval_4_per, $this->field_config['eval_4_per']['symbol_grp']) ; 
      nm_limpa_numero($this->dc1_p4, $this->field_config['dc1_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->dc2_p4, $this->field_config['dc2_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->dc3_p4, $this->field_config['dc3_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->dc4_p4, $this->field_config['dc4_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->dc5_p4, $this->field_config['dc5_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_dc4, $this->field_config['pcent_dc4']['symbol_grp']) ; 
      nm_limpa_numero($this->ds1_p4, $this->field_config['ds1_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->ds2_p4, $this->field_config['ds2_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->ds3_p4, $this->field_config['ds3_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->ds4_p4, $this->field_config['ds4_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->ds5_p4, $this->field_config['ds5_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_ds4, $this->field_config['pcent_ds4']['symbol_grp']) ; 
      nm_limpa_numero($this->dp1_p4, $this->field_config['dp1_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->dp2_p4, $this->field_config['dp2_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->dp3_p4, $this->field_config['dp3_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->dp4_p4, $this->field_config['dp4_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->dp5_p4, $this->field_config['dp5_p4']['symbol_grp']) ; 
      nm_limpa_numero($this->pcent_dp4, $this->field_config['pcent_dp4']['symbol_grp']) ; 
      nm_limpa_numero($this->eval_final, $this->field_config['eval_final']['symbol_grp']) ; 
      nm_limpa_numero($this->entorno, $this->field_config['entorno']['symbol_grp']) ; 
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
      if ($Nome_Campo == "dc4")
      {
          if (!empty($this->field_config['dc4']['symbol_dec']))
          {
             nm_limpa_valor($this->dc4, $this->field_config['dc4']['symbol_dec'], $this->field_config['dc4']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "id_grupo")
      {
          nm_limpa_numero($this->id_grupo, $this->field_config['id_grupo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_area")
      {
          nm_limpa_numero($this->id_area, $this->field_config['id_area']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_asignatura")
      {
          nm_limpa_numero($this->id_asignatura, $this->field_config['id_asignatura']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_grado")
      {
          nm_limpa_numero($this->id_grado, $this->field_config['id_grado']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_nivel")
      {
          nm_limpa_numero($this->id_nivel, $this->field_config['id_nivel']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ihs")
      {
          nm_limpa_numero($this->ihs, $this->field_config['ihs']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pfa")
      {
          nm_limpa_numero($this->pfa, $this->field_config['pfa']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "eval_1_per")
      {
          nm_limpa_numero($this->eval_1_per, $this->field_config['eval_1_per']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc1")
      {
          if (!empty($this->field_config['dc1']['symbol_dec']))
          {
             nm_limpa_valor($this->dc1, $this->field_config['dc1']['symbol_dec'], $this->field_config['dc1']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dc2")
      {
          nm_limpa_numero($this->dc2, $this->field_config['dc2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc3")
      {
          nm_limpa_numero($this->dc3, $this->field_config['dc3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc5")
      {
          nm_limpa_numero($this->dc5, $this->field_config['dc5']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_dc")
      {
          nm_limpa_numero($this->pcent_dc, $this->field_config['pcent_dc']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds1")
      {
          nm_limpa_numero($this->ds1, $this->field_config['ds1']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds2")
      {
          nm_limpa_numero($this->ds2, $this->field_config['ds2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds3")
      {
          nm_limpa_numero($this->ds3, $this->field_config['ds3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds4")
      {
          nm_limpa_numero($this->ds4, $this->field_config['ds4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds5")
      {
          nm_limpa_numero($this->ds5, $this->field_config['ds5']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_ds")
      {
          nm_limpa_numero($this->pcent_ds, $this->field_config['pcent_ds']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp1")
      {
          nm_limpa_numero($this->dp1, $this->field_config['dp1']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp2")
      {
          nm_limpa_numero($this->dp2, $this->field_config['dp2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp3")
      {
          nm_limpa_numero($this->dp3, $this->field_config['dp3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp4")
      {
          nm_limpa_numero($this->dp4, $this->field_config['dp4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp5")
      {
          nm_limpa_numero($this->dp5, $this->field_config['dp5']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_dp")
      {
          nm_limpa_numero($this->pcent_dp, $this->field_config['pcent_dp']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "eval_2_per")
      {
          nm_limpa_numero($this->eval_2_per, $this->field_config['eval_2_per']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc1_2p")
      {
          nm_limpa_numero($this->dc1_2p, $this->field_config['dc1_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc2_2p")
      {
          nm_limpa_numero($this->dc2_2p, $this->field_config['dc2_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc3_2p")
      {
          nm_limpa_numero($this->dc3_2p, $this->field_config['dc3_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc4_2p")
      {
          nm_limpa_numero($this->dc4_2p, $this->field_config['dc4_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc5_2p")
      {
          nm_limpa_numero($this->dc5_2p, $this->field_config['dc5_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_dc2")
      {
          nm_limpa_numero($this->pcent_dc2, $this->field_config['pcent_dc2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds1_2p")
      {
          nm_limpa_numero($this->ds1_2p, $this->field_config['ds1_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds2_2p")
      {
          nm_limpa_numero($this->ds2_2p, $this->field_config['ds2_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds3_2p")
      {
          nm_limpa_numero($this->ds3_2p, $this->field_config['ds3_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds4_2p")
      {
          nm_limpa_numero($this->ds4_2p, $this->field_config['ds4_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds5_2p")
      {
          nm_limpa_numero($this->ds5_2p, $this->field_config['ds5_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_ds2")
      {
          nm_limpa_numero($this->pcent_ds2, $this->field_config['pcent_ds2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp1_2p")
      {
          nm_limpa_numero($this->dp1_2p, $this->field_config['dp1_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp2_2p")
      {
          nm_limpa_numero($this->dp2_2p, $this->field_config['dp2_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp3_2p")
      {
          nm_limpa_numero($this->dp3_2p, $this->field_config['dp3_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp4_2p")
      {
          nm_limpa_numero($this->dp4_2p, $this->field_config['dp4_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp5_2p")
      {
          nm_limpa_numero($this->dp5_2p, $this->field_config['dp5_2p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_dp2")
      {
          nm_limpa_numero($this->pcent_dp2, $this->field_config['pcent_dp2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "eval_3_per")
      {
          nm_limpa_numero($this->eval_3_per, $this->field_config['eval_3_per']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc1_3p")
      {
          nm_limpa_numero($this->dc1_3p, $this->field_config['dc1_3p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc2_3p")
      {
          nm_limpa_numero($this->dc2_3p, $this->field_config['dc2_3p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc3_3p")
      {
          nm_limpa_numero($this->dc3_3p, $this->field_config['dc3_3p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc4_3p")
      {
          nm_limpa_numero($this->dc4_3p, $this->field_config['dc4_3p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc5_3p")
      {
          nm_limpa_numero($this->dc5_3p, $this->field_config['dc5_3p']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_dc3")
      {
          nm_limpa_numero($this->pcent_dc3, $this->field_config['pcent_dc3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds1_p3")
      {
          nm_limpa_numero($this->ds1_p3, $this->field_config['ds1_p3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds2_p3")
      {
          nm_limpa_numero($this->ds2_p3, $this->field_config['ds2_p3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds3_p3")
      {
          nm_limpa_numero($this->ds3_p3, $this->field_config['ds3_p3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds4_p3")
      {
          nm_limpa_numero($this->ds4_p3, $this->field_config['ds4_p3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds5_p3")
      {
          nm_limpa_numero($this->ds5_p3, $this->field_config['ds5_p3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_ds3")
      {
          nm_limpa_numero($this->pcent_ds3, $this->field_config['pcent_ds3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp1_p3")
      {
          nm_limpa_numero($this->dp1_p3, $this->field_config['dp1_p3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp2_p3")
      {
          nm_limpa_numero($this->dp2_p3, $this->field_config['dp2_p3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp3_p3")
      {
          nm_limpa_numero($this->dp3_p3, $this->field_config['dp3_p3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp4_p3")
      {
          nm_limpa_numero($this->dp4_p3, $this->field_config['dp4_p3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "sc_field_0")
      {
          nm_limpa_numero($this->sc_field_0, $this->field_config['sc_field_0']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_dp3")
      {
          nm_limpa_numero($this->pcent_dp3, $this->field_config['pcent_dp3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "eval_4_per")
      {
          nm_limpa_numero($this->eval_4_per, $this->field_config['eval_4_per']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc1_p4")
      {
          nm_limpa_numero($this->dc1_p4, $this->field_config['dc1_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc2_p4")
      {
          nm_limpa_numero($this->dc2_p4, $this->field_config['dc2_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc3_p4")
      {
          nm_limpa_numero($this->dc3_p4, $this->field_config['dc3_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc4_p4")
      {
          nm_limpa_numero($this->dc4_p4, $this->field_config['dc4_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dc5_p4")
      {
          nm_limpa_numero($this->dc5_p4, $this->field_config['dc5_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_dc4")
      {
          nm_limpa_numero($this->pcent_dc4, $this->field_config['pcent_dc4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds1_p4")
      {
          nm_limpa_numero($this->ds1_p4, $this->field_config['ds1_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds2_p4")
      {
          nm_limpa_numero($this->ds2_p4, $this->field_config['ds2_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds3_p4")
      {
          nm_limpa_numero($this->ds3_p4, $this->field_config['ds3_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds4_p4")
      {
          nm_limpa_numero($this->ds4_p4, $this->field_config['ds4_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ds5_p4")
      {
          nm_limpa_numero($this->ds5_p4, $this->field_config['ds5_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_ds4")
      {
          nm_limpa_numero($this->pcent_ds4, $this->field_config['pcent_ds4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp1_p4")
      {
          nm_limpa_numero($this->dp1_p4, $this->field_config['dp1_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp2_p4")
      {
          nm_limpa_numero($this->dp2_p4, $this->field_config['dp2_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp3_p4")
      {
          nm_limpa_numero($this->dp3_p4, $this->field_config['dp3_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp4_p4")
      {
          nm_limpa_numero($this->dp4_p4, $this->field_config['dp4_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dp5_p4")
      {
          nm_limpa_numero($this->dp5_p4, $this->field_config['dp5_p4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pcent_dp4")
      {
          nm_limpa_numero($this->pcent_dp4, $this->field_config['pcent_dp4']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "eval_final")
      {
          nm_limpa_numero($this->eval_final, $this->field_config['eval_final']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "entorno")
      {
          nm_limpa_numero($this->entorno, $this->field_config['entorno']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if (!empty($this->dc4) || (!empty($format_fields) && isset($format_fields['dc4'])))
      {
          nmgp_Form_Num_Val($this->dc4, $this->field_config['dc4']['symbol_grp'], $this->field_config['dc4']['symbol_dec'], "1", "S", "", "", "", "-", $this->field_config['dc4']['symbol_fmt']) ; 
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
          $this->ajax_return_values_id_estudiante();
          $this->ajax_return_values_dc4();
          $this->ajax_return_values_actividades();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_estudiante']['keyVal'] = form_evalua_actividad_dc4_pack_protect_string($this->nmgp_dados_form['id_estudiante']);
              $this->NM_ajax_info['fldList']['id_grupo']['keyVal'] = form_evalua_actividad_dc4_pack_protect_string($this->nmgp_dados_form['id_grupo']);
              $this->NM_ajax_info['fldList']['id_asignatura']['keyVal'] = form_evalua_actividad_dc4_pack_protect_string($this->nmgp_dados_form['id_asignatura']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['foreign_key']['id_estudent'] = $this->nmgp_dados_form['id_estudiante'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['where_filter'] = "id_estudent = " . $this->nmgp_dados_form['id_estudiante'] . "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['where_detal']  = "id_estudent = " . $this->nmgp_dados_form['id_estudiante'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['reg_start'] = "";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['total']);
          }
   } // ajax_return_values

          //----- id_estudiante
   function ajax_return_values_id_estudiante($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_estudiante", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_estudiante);
              $aLookup = array();
              $this->_tmp_lookup_id_estudiante = $this->id_estudiante;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['Lookup_id_estudiante']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['Lookup_id_estudiante'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['Lookup_id_estudiante']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['Lookup_id_estudiante'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dc4 = $this->dc4;
   $this->nm_tira_formatacao();


   $unformatted_value_dc4 = $this->dc4;

   $nm_comando = "SELECT idstudents, concat_ws(' ',primer_apellido, segundo_apellido,primer_nombre, segundo_nombre) as nombre
FROM students 
ORDER BY nombre";

   $this->dc4 = $old_value_dc4;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_evalua_actividad_dc4_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_evalua_actividad_dc4_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['Lookup_id_estudiante'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_estudiante\"";
          if (isset($this->NM_ajax_info['select_html']['id_estudiante']) && !empty($this->NM_ajax_info['select_html']['id_estudiante']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_estudiante'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->id_estudiante == $sValue)
                  {
                      $this->_tmp_lookup_id_estudiante = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("id_estudiante", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['id_estudiante'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_estudiante']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_estudiante']['valList'][$i] = form_evalua_actividad_dc4_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_estudiante']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_estudiante']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_estudiante']['labList'] = $aLabel;
          }
   }

          //----- dc4
   function ajax_return_values_dc4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dc4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dc4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dc4'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- actividades
   function ajax_return_values_actividades($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("actividades", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->actividades);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['actividades'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['upload_dir'][$fieldName][] = $newName;
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
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_evalua_actividad_dc4']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_codigo)) {$this->sc_temp_par_codigo = (isset($_SESSION['par_codigo'])) ? $_SESSION['par_codigo'] : "";}
if (!isset($this->sc_temp_par_idasignatura)) {$this->sc_temp_par_idasignatura = (isset($_SESSION['par_idasignatura'])) ? $_SESSION['par_idasignatura'] : "";}
if (!isset($this->sc_temp_par_idgrupo)) {$this->sc_temp_par_idgrupo = (isset($_SESSION['par_idgrupo'])) ? $_SESSION['par_idgrupo'] : "";}
if (!isset($this->sc_temp_entorno)) {$this->sc_temp_entorno = (isset($_SESSION['entorno'])) ? $_SESSION['entorno'] : "";}
if (!isset($this->sc_temp_par_idestudiante)) {$this->sc_temp_par_idestudiante = (isset($_SESSION['par_idestudiante'])) ? $_SESSION['par_idestudiante'] : "";}
 $insert_sql="INSERT INTO  act_rel_est(id_estudent, actividad, codigo_desemp, posicion, id_asignatura, id_grupo, porcentaje, entorno) 
SELECT
t_evaluacion.id_estudiante,
actividades.actividad,
actividades.codigo_desemp,
actividades.posicion,
actividades.id_asignatura,
actividades.id_grupo,
actividades.porcentaje,
actividades.entorno
FROM
actividades
INNER JOIN t_evaluacion ON actividades.id_grupo = t_evaluacion.id_grupo AND actividades.id_asignatura = t_evaluacion.id_asignatura AND actividades.entorno = t_evaluacion.entorno
WHERE t_evaluacion.id_estudiante =  ".$this->sc_temp_par_idestudiante."  AND t_evaluacion.entorno = '".$this->sc_temp_entorno."' AND t_evaluacion.id_grupo = ".$this->sc_temp_par_idgrupo." AND t_evaluacion.id_asignatura =  ".$this->sc_temp_par_idasignatura." AND actividades.codigo_desemp =  '".$this->sc_temp_par_codigo."' AND NOT EXISTS(SELECT id_estudent FROM act_rel_est WHERE id_estudent = ".$this->sc_temp_par_idestudiante." )";


     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_evalua_actividad_dc4_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_par_idestudiante)) { $_SESSION['par_idestudiante'] = $this->sc_temp_par_idestudiante;}
if (isset($this->sc_temp_entorno)) { $_SESSION['entorno'] = $this->sc_temp_entorno;}
if (isset($this->sc_temp_par_idgrupo)) { $_SESSION['par_idgrupo'] = $this->sc_temp_par_idgrupo;}
if (isset($this->sc_temp_par_idasignatura)) { $_SESSION['par_idasignatura'] = $this->sc_temp_par_idasignatura;}
if (isset($this->sc_temp_par_codigo)) { $_SESSION['par_codigo'] = $this->sc_temp_par_codigo;}
$_SESSION['scriptcase']['form_evalua_actividad_dc4']['contr_erro'] = 'off'; 
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
      $this->dc4 = str_replace($sc_parm1, $sc_parm2, $this->dc4); 
      $this->dc1 = str_replace($sc_parm1, $sc_parm2, $this->dc1); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->dc4 = "'" . $this->dc4 . "'";
      $this->dc1 = "'" . $this->dc1 . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->dc4 = str_replace("'", "", $this->dc4); 
      $this->dc1 = str_replace("'", "", $this->dc1); 
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
      global  $nm_form_submit, $teste_validade, $sc_where;
 
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
      $NM_val_form['id_estudiante'] = $this->id_estudiante;
      $NM_val_form['dc4'] = $this->dc4;
      $NM_val_form['actividades'] = $this->actividades;
      $NM_val_form['primer_apellido'] = $this->primer_apellido;
      $NM_val_form['segundo_apellido'] = $this->segundo_apellido;
      $NM_val_form['primer_nombre'] = $this->primer_nombre;
      $NM_val_form['segundo_nombre'] = $this->segundo_nombre;
      $NM_val_form['id_grupo'] = $this->id_grupo;
      $NM_val_form['id_area'] = $this->id_area;
      $NM_val_form['id_asignatura'] = $this->id_asignatura;
      $NM_val_form['id_grado'] = $this->id_grado;
      $NM_val_form['id_nivel'] = $this->id_nivel;
      $NM_val_form['ihs'] = $this->ihs;
      $NM_val_form['pfa'] = $this->pfa;
      $NM_val_form['tipo_asig'] = $this->tipo_asig;
      $NM_val_form['novedad'] = $this->novedad;
      $NM_val_form['estatus'] = $this->estatus;
      $NM_val_form['eval_1_per'] = $this->eval_1_per;
      $NM_val_form['dc1'] = $this->dc1;
      $NM_val_form['dc2'] = $this->dc2;
      $NM_val_form['dc3'] = $this->dc3;
      $NM_val_form['dc5'] = $this->dc5;
      $NM_val_form['pcent_dc'] = $this->pcent_dc;
      $NM_val_form['ds1'] = $this->ds1;
      $NM_val_form['ds2'] = $this->ds2;
      $NM_val_form['ds3'] = $this->ds3;
      $NM_val_form['ds4'] = $this->ds4;
      $NM_val_form['ds5'] = $this->ds5;
      $NM_val_form['pcent_ds'] = $this->pcent_ds;
      $NM_val_form['dp1'] = $this->dp1;
      $NM_val_form['dp2'] = $this->dp2;
      $NM_val_form['dp3'] = $this->dp3;
      $NM_val_form['dp4'] = $this->dp4;
      $NM_val_form['dp5'] = $this->dp5;
      $NM_val_form['pcent_dp'] = $this->pcent_dp;
      $NM_val_form['eval_2_per'] = $this->eval_2_per;
      $NM_val_form['dc1_2p'] = $this->dc1_2p;
      $NM_val_form['dc2_2p'] = $this->dc2_2p;
      $NM_val_form['dc3_2p'] = $this->dc3_2p;
      $NM_val_form['dc4_2p'] = $this->dc4_2p;
      $NM_val_form['dc5_2p'] = $this->dc5_2p;
      $NM_val_form['pcent_dc2'] = $this->pcent_dc2;
      $NM_val_form['ds1_2p'] = $this->ds1_2p;
      $NM_val_form['ds2_2p'] = $this->ds2_2p;
      $NM_val_form['ds3_2p'] = $this->ds3_2p;
      $NM_val_form['ds4_2p'] = $this->ds4_2p;
      $NM_val_form['ds5_2p'] = $this->ds5_2p;
      $NM_val_form['pcent_ds2'] = $this->pcent_ds2;
      $NM_val_form['dp1_2p'] = $this->dp1_2p;
      $NM_val_form['dp2_2p'] = $this->dp2_2p;
      $NM_val_form['dp3_2p'] = $this->dp3_2p;
      $NM_val_form['dp4_2p'] = $this->dp4_2p;
      $NM_val_form['dp5_2p'] = $this->dp5_2p;
      $NM_val_form['pcent_dp2'] = $this->pcent_dp2;
      $NM_val_form['eval_3_per'] = $this->eval_3_per;
      $NM_val_form['dc1_3p'] = $this->dc1_3p;
      $NM_val_form['dc2_3p'] = $this->dc2_3p;
      $NM_val_form['dc3_3p'] = $this->dc3_3p;
      $NM_val_form['dc4_3p'] = $this->dc4_3p;
      $NM_val_form['dc5_3p'] = $this->dc5_3p;
      $NM_val_form['pcent_dc3'] = $this->pcent_dc3;
      $NM_val_form['ds1_p3'] = $this->ds1_p3;
      $NM_val_form['ds2_p3'] = $this->ds2_p3;
      $NM_val_form['ds3_p3'] = $this->ds3_p3;
      $NM_val_form['ds4_p3'] = $this->ds4_p3;
      $NM_val_form['ds5_p3'] = $this->ds5_p3;
      $NM_val_form['pcent_ds3'] = $this->pcent_ds3;
      $NM_val_form['dp1_p3'] = $this->dp1_p3;
      $NM_val_form['dp2_p3'] = $this->dp2_p3;
      $NM_val_form['dp3_p3'] = $this->dp3_p3;
      $NM_val_form['dp4_p3'] = $this->dp4_p3;
      $NM_val_form['sc_field_0'] = $this->sc_field_0;
      $NM_val_form['pcent_dp3'] = $this->pcent_dp3;
      $NM_val_form['eval_4_per'] = $this->eval_4_per;
      $NM_val_form['dc1_p4'] = $this->dc1_p4;
      $NM_val_form['dc2_p4'] = $this->dc2_p4;
      $NM_val_form['dc3_p4'] = $this->dc3_p4;
      $NM_val_form['dc4_p4'] = $this->dc4_p4;
      $NM_val_form['dc5_p4'] = $this->dc5_p4;
      $NM_val_form['pcent_dc4'] = $this->pcent_dc4;
      $NM_val_form['ds1_p4'] = $this->ds1_p4;
      $NM_val_form['ds2_p4'] = $this->ds2_p4;
      $NM_val_form['ds3_p4'] = $this->ds3_p4;
      $NM_val_form['ds4_p4'] = $this->ds4_p4;
      $NM_val_form['ds5_p4'] = $this->ds5_p4;
      $NM_val_form['pcent_ds4'] = $this->pcent_ds4;
      $NM_val_form['dp1_p4'] = $this->dp1_p4;
      $NM_val_form['dp2_p4'] = $this->dp2_p4;
      $NM_val_form['dp3_p4'] = $this->dp3_p4;
      $NM_val_form['dp4_p4'] = $this->dp4_p4;
      $NM_val_form['dp5_p4'] = $this->dp5_p4;
      $NM_val_form['pcent_dp4'] = $this->pcent_dp4;
      $NM_val_form['eval_final'] = $this->eval_final;
      $NM_val_form['entorno'] = $this->entorno;
      if ($this->id_estudiante == "")  
      { 
          $this->id_estudiante = 0;
      } 
      if ($this->id_grupo == "")  
      { 
          $this->id_grupo = 0;
      } 
      if ($this->id_area == "")  
      { 
          $this->id_area = 0;
          $this->sc_force_zero[] = 'id_area';
      } 
      if ($this->id_asignatura == "")  
      { 
          $this->id_asignatura = 0;
      } 
      if ($this->id_grado == "")  
      { 
          $this->id_grado = 0;
          $this->sc_force_zero[] = 'id_grado';
      } 
      if ($this->id_nivel == "")  
      { 
          $this->id_nivel = 0;
          $this->sc_force_zero[] = 'id_nivel';
      } 
      if ($this->ihs == "")  
      { 
          $this->ihs = 0;
          $this->sc_force_zero[] = 'ihs';
      } 
      if ($this->pfa == "")  
      { 
          $this->pfa = 0;
          $this->sc_force_zero[] = 'pfa';
      } 
      if ($this->eval_1_per == "")  
      { 
          $this->eval_1_per = 0;
          $this->sc_force_zero[] = 'eval_1_per';
      } 
      if ($this->dc1 == "")  
      { 
          $this->dc1 = 0;
          $this->sc_force_zero[] = 'dc1';
      } 
      if ($this->dc2 == "")  
      { 
          $this->dc2 = 0;
          $this->sc_force_zero[] = 'dc2';
      } 
      if ($this->dc3 == "")  
      { 
          $this->dc3 = 0;
          $this->sc_force_zero[] = 'dc3';
      } 
      if ($this->dc4 == "")  
      { 
          $this->dc4 = 0;
          $this->sc_force_zero[] = 'dc4';
      } 
      if ($this->dc5 == "")  
      { 
          $this->dc5 = 0;
          $this->sc_force_zero[] = 'dc5';
      } 
      if ($this->pcent_dc == "")  
      { 
          $this->pcent_dc = 0;
          $this->sc_force_zero[] = 'pcent_dc';
      } 
      if ($this->ds1 == "")  
      { 
          $this->ds1 = 0;
          $this->sc_force_zero[] = 'ds1';
      } 
      if ($this->ds2 == "")  
      { 
          $this->ds2 = 0;
          $this->sc_force_zero[] = 'ds2';
      } 
      if ($this->ds3 == "")  
      { 
          $this->ds3 = 0;
          $this->sc_force_zero[] = 'ds3';
      } 
      if ($this->ds4 == "")  
      { 
          $this->ds4 = 0;
          $this->sc_force_zero[] = 'ds4';
      } 
      if ($this->ds5 == "")  
      { 
          $this->ds5 = 0;
          $this->sc_force_zero[] = 'ds5';
      } 
      if ($this->pcent_ds == "")  
      { 
          $this->pcent_ds = 0;
          $this->sc_force_zero[] = 'pcent_ds';
      } 
      if ($this->dp1 == "")  
      { 
          $this->dp1 = 0;
          $this->sc_force_zero[] = 'dp1';
      } 
      if ($this->dp2 == "")  
      { 
          $this->dp2 = 0;
          $this->sc_force_zero[] = 'dp2';
      } 
      if ($this->dp3 == "")  
      { 
          $this->dp3 = 0;
          $this->sc_force_zero[] = 'dp3';
      } 
      if ($this->dp4 == "")  
      { 
          $this->dp4 = 0;
          $this->sc_force_zero[] = 'dp4';
      } 
      if ($this->dp5 == "")  
      { 
          $this->dp5 = 0;
          $this->sc_force_zero[] = 'dp5';
      } 
      if ($this->pcent_dp == "")  
      { 
          $this->pcent_dp = 0;
          $this->sc_force_zero[] = 'pcent_dp';
      } 
      if ($this->eval_2_per == "")  
      { 
          $this->eval_2_per = 0;
          $this->sc_force_zero[] = 'eval_2_per';
      } 
      if ($this->dc1_2p == "")  
      { 
          $this->dc1_2p = 0;
          $this->sc_force_zero[] = 'dc1_2p';
      } 
      if ($this->dc2_2p == "")  
      { 
          $this->dc2_2p = 0;
          $this->sc_force_zero[] = 'dc2_2p';
      } 
      if ($this->dc3_2p == "")  
      { 
          $this->dc3_2p = 0;
          $this->sc_force_zero[] = 'dc3_2p';
      } 
      if ($this->dc4_2p == "")  
      { 
          $this->dc4_2p = 0;
          $this->sc_force_zero[] = 'dc4_2p';
      } 
      if ($this->dc5_2p == "")  
      { 
          $this->dc5_2p = 0;
          $this->sc_force_zero[] = 'dc5_2p';
      } 
      if ($this->pcent_dc2 == "")  
      { 
          $this->pcent_dc2 = 0;
          $this->sc_force_zero[] = 'pcent_dc2';
      } 
      if ($this->ds1_2p == "")  
      { 
          $this->ds1_2p = 0;
          $this->sc_force_zero[] = 'ds1_2p';
      } 
      if ($this->ds2_2p == "")  
      { 
          $this->ds2_2p = 0;
          $this->sc_force_zero[] = 'ds2_2p';
      } 
      if ($this->ds3_2p == "")  
      { 
          $this->ds3_2p = 0;
          $this->sc_force_zero[] = 'ds3_2p';
      } 
      if ($this->ds4_2p == "")  
      { 
          $this->ds4_2p = 0;
          $this->sc_force_zero[] = 'ds4_2p';
      } 
      if ($this->ds5_2p == "")  
      { 
          $this->ds5_2p = 0;
          $this->sc_force_zero[] = 'ds5_2p';
      } 
      if ($this->pcent_ds2 == "")  
      { 
          $this->pcent_ds2 = 0;
          $this->sc_force_zero[] = 'pcent_ds2';
      } 
      if ($this->dp1_2p == "")  
      { 
          $this->dp1_2p = 0;
          $this->sc_force_zero[] = 'dp1_2p';
      } 
      if ($this->dp2_2p == "")  
      { 
          $this->dp2_2p = 0;
          $this->sc_force_zero[] = 'dp2_2p';
      } 
      if ($this->dp3_2p == "")  
      { 
          $this->dp3_2p = 0;
          $this->sc_force_zero[] = 'dp3_2p';
      } 
      if ($this->dp4_2p == "")  
      { 
          $this->dp4_2p = 0;
          $this->sc_force_zero[] = 'dp4_2p';
      } 
      if ($this->dp5_2p == "")  
      { 
          $this->dp5_2p = 0;
          $this->sc_force_zero[] = 'dp5_2p';
      } 
      if ($this->pcent_dp2 == "")  
      { 
          $this->pcent_dp2 = 0;
          $this->sc_force_zero[] = 'pcent_dp2';
      } 
      if ($this->eval_3_per == "")  
      { 
          $this->eval_3_per = 0;
          $this->sc_force_zero[] = 'eval_3_per';
      } 
      if ($this->dc1_3p == "")  
      { 
          $this->dc1_3p = 0;
          $this->sc_force_zero[] = 'dc1_3p';
      } 
      if ($this->dc2_3p == "")  
      { 
          $this->dc2_3p = 0;
          $this->sc_force_zero[] = 'dc2_3p';
      } 
      if ($this->dc3_3p == "")  
      { 
          $this->dc3_3p = 0;
          $this->sc_force_zero[] = 'dc3_3p';
      } 
      if ($this->dc4_3p == "")  
      { 
          $this->dc4_3p = 0;
          $this->sc_force_zero[] = 'dc4_3p';
      } 
      if ($this->dc5_3p == "")  
      { 
          $this->dc5_3p = 0;
          $this->sc_force_zero[] = 'dc5_3p';
      } 
      if ($this->pcent_dc3 == "")  
      { 
          $this->pcent_dc3 = 0;
          $this->sc_force_zero[] = 'pcent_dc3';
      } 
      if ($this->ds1_p3 == "")  
      { 
          $this->ds1_p3 = 0;
          $this->sc_force_zero[] = 'ds1_p3';
      } 
      if ($this->ds2_p3 == "")  
      { 
          $this->ds2_p3 = 0;
          $this->sc_force_zero[] = 'ds2_p3';
      } 
      if ($this->ds3_p3 == "")  
      { 
          $this->ds3_p3 = 0;
          $this->sc_force_zero[] = 'ds3_p3';
      } 
      if ($this->ds4_p3 == "")  
      { 
          $this->ds4_p3 = 0;
          $this->sc_force_zero[] = 'ds4_p3';
      } 
      if ($this->ds5_p3 == "")  
      { 
          $this->ds5_p3 = 0;
          $this->sc_force_zero[] = 'ds5_p3';
      } 
      if ($this->pcent_ds3 == "")  
      { 
          $this->pcent_ds3 = 0;
          $this->sc_force_zero[] = 'pcent_ds3';
      } 
      if ($this->dp1_p3 == "")  
      { 
          $this->dp1_p3 = 0;
          $this->sc_force_zero[] = 'dp1_p3';
      } 
      if ($this->dp2_p3 == "")  
      { 
          $this->dp2_p3 = 0;
          $this->sc_force_zero[] = 'dp2_p3';
      } 
      if ($this->dp3_p3 == "")  
      { 
          $this->dp3_p3 = 0;
          $this->sc_force_zero[] = 'dp3_p3';
      } 
      if ($this->dp4_p3 == "")  
      { 
          $this->dp4_p3 = 0;
          $this->sc_force_zero[] = 'dp4_p3';
      } 
      if ($this->sc_field_0 == "")  
      { 
          $this->sc_field_0 = 0;
          $this->sc_force_zero[] = 'sc_field_0';
      } 
      if ($this->pcent_dp3 == "")  
      { 
          $this->pcent_dp3 = 0;
          $this->sc_force_zero[] = 'pcent_dp3';
      } 
      if ($this->eval_4_per == "")  
      { 
          $this->eval_4_per = 0;
          $this->sc_force_zero[] = 'eval_4_per';
      } 
      if ($this->dc1_p4 == "")  
      { 
          $this->dc1_p4 = 0;
          $this->sc_force_zero[] = 'dc1_p4';
      } 
      if ($this->dc2_p4 == "")  
      { 
          $this->dc2_p4 = 0;
          $this->sc_force_zero[] = 'dc2_p4';
      } 
      if ($this->dc3_p4 == "")  
      { 
          $this->dc3_p4 = 0;
          $this->sc_force_zero[] = 'dc3_p4';
      } 
      if ($this->dc4_p4 == "")  
      { 
          $this->dc4_p4 = 0;
          $this->sc_force_zero[] = 'dc4_p4';
      } 
      if ($this->dc5_p4 == "")  
      { 
          $this->dc5_p4 = 0;
          $this->sc_force_zero[] = 'dc5_p4';
      } 
      if ($this->pcent_dc4 == "")  
      { 
          $this->pcent_dc4 = 0;
          $this->sc_force_zero[] = 'pcent_dc4';
      } 
      if ($this->ds1_p4 == "")  
      { 
          $this->ds1_p4 = 0;
          $this->sc_force_zero[] = 'ds1_p4';
      } 
      if ($this->ds2_p4 == "")  
      { 
          $this->ds2_p4 = 0;
          $this->sc_force_zero[] = 'ds2_p4';
      } 
      if ($this->ds3_p4 == "")  
      { 
          $this->ds3_p4 = 0;
          $this->sc_force_zero[] = 'ds3_p4';
      } 
      if ($this->ds4_p4 == "")  
      { 
          $this->ds4_p4 = 0;
          $this->sc_force_zero[] = 'ds4_p4';
      } 
      if ($this->ds5_p4 == "")  
      { 
          $this->ds5_p4 = 0;
          $this->sc_force_zero[] = 'ds5_p4';
      } 
      if ($this->pcent_ds4 == "")  
      { 
          $this->pcent_ds4 = 0;
          $this->sc_force_zero[] = 'pcent_ds4';
      } 
      if ($this->dp1_p4 == "")  
      { 
          $this->dp1_p4 = 0;
          $this->sc_force_zero[] = 'dp1_p4';
      } 
      if ($this->dp2_p4 == "")  
      { 
          $this->dp2_p4 = 0;
          $this->sc_force_zero[] = 'dp2_p4';
      } 
      if ($this->dp3_p4 == "")  
      { 
          $this->dp3_p4 = 0;
          $this->sc_force_zero[] = 'dp3_p4';
      } 
      if ($this->dp4_p4 == "")  
      { 
          $this->dp4_p4 = 0;
          $this->sc_force_zero[] = 'dp4_p4';
      } 
      if ($this->dp5_p4 == "")  
      { 
          $this->dp5_p4 = 0;
          $this->sc_force_zero[] = 'dp5_p4';
      } 
      if ($this->pcent_dp4 == "")  
      { 
          $this->pcent_dp4 = 0;
          $this->sc_force_zero[] = 'pcent_dp4';
      } 
      if ($this->eval_final == "")  
      { 
          $this->eval_final = 0;
          $this->sc_force_zero[] = 'eval_final';
      } 
      if ($this->entorno == "")  
      { 
          $this->entorno = 0;
          $this->sc_force_zero[] = 'entorno';
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->primer_apellido_before_qstr = $this->primer_apellido;
          $this->primer_apellido = substr($this->Db->qstr($this->primer_apellido), 1, -1); 
          $this->segundo_apellido_before_qstr = $this->segundo_apellido;
          $this->segundo_apellido = substr($this->Db->qstr($this->segundo_apellido), 1, -1); 
          $this->primer_nombre_before_qstr = $this->primer_nombre;
          $this->primer_nombre = substr($this->Db->qstr($this->primer_nombre), 1, -1); 
          $this->segundo_nombre_before_qstr = $this->segundo_nombre;
          $this->segundo_nombre = substr($this->Db->qstr($this->segundo_nombre), 1, -1); 
          $this->tipo_asig_before_qstr = $this->tipo_asig;
          $this->tipo_asig = substr($this->Db->qstr($this->tipo_asig), 1, -1); 
          $this->novedad_before_qstr = $this->novedad;
          $this->novedad = substr($this->Db->qstr($this->novedad), 1, -1); 
          $this->estatus_before_qstr = $this->estatus;
          $this->estatus = substr($this->Db->qstr($this->estatus), 1, -1); 
          $this->actividades_before_qstr = $this->actividades;
          $this->actividades = substr($this->Db->qstr($this->actividades), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante and id_grupo = $this->id_grupo and id_asignatura = $this->id_asignatura ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante and id_grupo = $this->id_grupo and id_asignatura = $this->id_asignatura "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_evalua_actividad_dc4_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
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
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET dc4 = $this->dc4";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET dc4 = $this->dc4";  
              } 
              if (isset($NM_val_form['primer_apellido']) && $NM_val_form['primer_apellido'] != $this->nmgp_dados_select['primer_apellido']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " primer_apellido = '$this->primer_apellido'"; 
                  $comando_oracle        .= " primer_apellido = '$this->primer_apellido'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['segundo_apellido']) && $NM_val_form['segundo_apellido'] != $this->nmgp_dados_select['segundo_apellido']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " segundo_apellido = '$this->segundo_apellido'"; 
                  $comando_oracle        .= " segundo_apellido = '$this->segundo_apellido'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['primer_nombre']) && $NM_val_form['primer_nombre'] != $this->nmgp_dados_select['primer_nombre']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " primer_nombre = '$this->primer_nombre'"; 
                  $comando_oracle        .= " primer_nombre = '$this->primer_nombre'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['segundo_nombre']) && $NM_val_form['segundo_nombre'] != $this->nmgp_dados_select['segundo_nombre']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " segundo_nombre = '$this->segundo_nombre'"; 
                  $comando_oracle        .= " segundo_nombre = '$this->segundo_nombre'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['id_area']) && $NM_val_form['id_area'] != $this->nmgp_dados_select['id_area']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " id_area = $this->id_area"; 
                  $comando_oracle        .= " id_area = $this->id_area"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['id_grado']) && $NM_val_form['id_grado'] != $this->nmgp_dados_select['id_grado']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " id_grado = $this->id_grado"; 
                  $comando_oracle        .= " id_grado = $this->id_grado"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['id_nivel']) && $NM_val_form['id_nivel'] != $this->nmgp_dados_select['id_nivel']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " id_nivel = $this->id_nivel"; 
                  $comando_oracle        .= " id_nivel = $this->id_nivel"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ihs']) && $NM_val_form['ihs'] != $this->nmgp_dados_select['ihs']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ihs = $this->ihs"; 
                  $comando_oracle        .= " ihs = $this->ihs"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pfa']) && $NM_val_form['pfa'] != $this->nmgp_dados_select['pfa']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pfa = $this->pfa"; 
                  $comando_oracle        .= " pfa = $this->pfa"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['tipo_asig']) && $NM_val_form['tipo_asig'] != $this->nmgp_dados_select['tipo_asig']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " tipo_asig = '$this->tipo_asig'"; 
                  $comando_oracle        .= " tipo_asig = '$this->tipo_asig'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['novedad']) && $NM_val_form['novedad'] != $this->nmgp_dados_select['novedad']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " novedad = '$this->novedad'"; 
                  $comando_oracle        .= " novedad = '$this->novedad'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['estatus']) && $NM_val_form['estatus'] != $this->nmgp_dados_select['estatus']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " estatus = '$this->estatus'"; 
                  $comando_oracle        .= " estatus = '$this->estatus'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['eval_1_per']) && $NM_val_form['eval_1_per'] != $this->nmgp_dados_select['eval_1_per']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " eval_1_per = $this->eval_1_per"; 
                  $comando_oracle        .= " eval_1_per = $this->eval_1_per"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc1']) && $NM_val_form['dc1'] != $this->nmgp_dados_select['dc1']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc1 = $this->dc1"; 
                  $comando_oracle        .= " dc1 = $this->dc1"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc2']) && $NM_val_form['dc2'] != $this->nmgp_dados_select['dc2']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc2 = $this->dc2"; 
                  $comando_oracle        .= " dc2 = $this->dc2"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc3']) && $NM_val_form['dc3'] != $this->nmgp_dados_select['dc3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc3 = $this->dc3"; 
                  $comando_oracle        .= " dc3 = $this->dc3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc5']) && $NM_val_form['dc5'] != $this->nmgp_dados_select['dc5']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc5 = $this->dc5"; 
                  $comando_oracle        .= " dc5 = $this->dc5"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dc']) && $NM_val_form['pcent_dc'] != $this->nmgp_dados_select['pcent_dc']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dc = $this->pcent_dc"; 
                  $comando_oracle        .= " pcent_dc = $this->pcent_dc"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds1']) && $NM_val_form['ds1'] != $this->nmgp_dados_select['ds1']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds1 = $this->ds1"; 
                  $comando_oracle        .= " ds1 = $this->ds1"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds2']) && $NM_val_form['ds2'] != $this->nmgp_dados_select['ds2']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds2 = $this->ds2"; 
                  $comando_oracle        .= " ds2 = $this->ds2"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds3']) && $NM_val_form['ds3'] != $this->nmgp_dados_select['ds3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds3 = $this->ds3"; 
                  $comando_oracle        .= " ds3 = $this->ds3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds4']) && $NM_val_form['ds4'] != $this->nmgp_dados_select['ds4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds4 = $this->ds4"; 
                  $comando_oracle        .= " ds4 = $this->ds4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds5']) && $NM_val_form['ds5'] != $this->nmgp_dados_select['ds5']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds5 = $this->ds5"; 
                  $comando_oracle        .= " ds5 = $this->ds5"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_ds']) && $NM_val_form['pcent_ds'] != $this->nmgp_dados_select['pcent_ds']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_ds = $this->pcent_ds"; 
                  $comando_oracle        .= " pcent_ds = $this->pcent_ds"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp1']) && $NM_val_form['dp1'] != $this->nmgp_dados_select['dp1']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp1 = $this->dp1"; 
                  $comando_oracle        .= " dp1 = $this->dp1"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp2']) && $NM_val_form['dp2'] != $this->nmgp_dados_select['dp2']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp2 = $this->dp2"; 
                  $comando_oracle        .= " dp2 = $this->dp2"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp3']) && $NM_val_form['dp3'] != $this->nmgp_dados_select['dp3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp3 = $this->dp3"; 
                  $comando_oracle        .= " dp3 = $this->dp3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp4']) && $NM_val_form['dp4'] != $this->nmgp_dados_select['dp4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp4 = $this->dp4"; 
                  $comando_oracle        .= " dp4 = $this->dp4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp5']) && $NM_val_form['dp5'] != $this->nmgp_dados_select['dp5']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp5 = $this->dp5"; 
                  $comando_oracle        .= " dp5 = $this->dp5"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dp']) && $NM_val_form['pcent_dp'] != $this->nmgp_dados_select['pcent_dp']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dp = $this->pcent_dp"; 
                  $comando_oracle        .= " pcent_dp = $this->pcent_dp"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['eval_2_per']) && $NM_val_form['eval_2_per'] != $this->nmgp_dados_select['eval_2_per']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " eval_2_per = $this->eval_2_per"; 
                  $comando_oracle        .= " eval_2_per = $this->eval_2_per"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc1_2p']) && $NM_val_form['dc1_2p'] != $this->nmgp_dados_select['dc1_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc1_2p = $this->dc1_2p"; 
                  $comando_oracle        .= " dc1_2p = $this->dc1_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc2_2p']) && $NM_val_form['dc2_2p'] != $this->nmgp_dados_select['dc2_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc2_2p = $this->dc2_2p"; 
                  $comando_oracle        .= " dc2_2p = $this->dc2_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc3_2p']) && $NM_val_form['dc3_2p'] != $this->nmgp_dados_select['dc3_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc3_2p = $this->dc3_2p"; 
                  $comando_oracle        .= " dc3_2p = $this->dc3_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc4_2p']) && $NM_val_form['dc4_2p'] != $this->nmgp_dados_select['dc4_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc4_2p = $this->dc4_2p"; 
                  $comando_oracle        .= " dc4_2p = $this->dc4_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc5_2p']) && $NM_val_form['dc5_2p'] != $this->nmgp_dados_select['dc5_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc5_2p = $this->dc5_2p"; 
                  $comando_oracle        .= " dc5_2p = $this->dc5_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dc2']) && $NM_val_form['pcent_dc2'] != $this->nmgp_dados_select['pcent_dc2']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dc2 = $this->pcent_dc2"; 
                  $comando_oracle        .= " pcent_dc2 = $this->pcent_dc2"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds1_2p']) && $NM_val_form['ds1_2p'] != $this->nmgp_dados_select['ds1_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds1_2p = $this->ds1_2p"; 
                  $comando_oracle        .= " ds1_2p = $this->ds1_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds2_2p']) && $NM_val_form['ds2_2p'] != $this->nmgp_dados_select['ds2_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds2_2p = $this->ds2_2p"; 
                  $comando_oracle        .= " ds2_2p = $this->ds2_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds3_2p']) && $NM_val_form['ds3_2p'] != $this->nmgp_dados_select['ds3_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds3_2p = $this->ds3_2p"; 
                  $comando_oracle        .= " ds3_2p = $this->ds3_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds4_2p']) && $NM_val_form['ds4_2p'] != $this->nmgp_dados_select['ds4_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds4_2p = $this->ds4_2p"; 
                  $comando_oracle        .= " ds4_2p = $this->ds4_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds5_2p']) && $NM_val_form['ds5_2p'] != $this->nmgp_dados_select['ds5_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds5_2p = $this->ds5_2p"; 
                  $comando_oracle        .= " ds5_2p = $this->ds5_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_ds2']) && $NM_val_form['pcent_ds2'] != $this->nmgp_dados_select['pcent_ds2']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_ds2 = $this->pcent_ds2"; 
                  $comando_oracle        .= " pcent_ds2 = $this->pcent_ds2"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp1_2p']) && $NM_val_form['dp1_2p'] != $this->nmgp_dados_select['dp1_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp1_2p = $this->dp1_2p"; 
                  $comando_oracle        .= " dp1_2p = $this->dp1_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp2_2p']) && $NM_val_form['dp2_2p'] != $this->nmgp_dados_select['dp2_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp2_2p = $this->dp2_2p"; 
                  $comando_oracle        .= " dp2_2p = $this->dp2_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp3_2p']) && $NM_val_form['dp3_2p'] != $this->nmgp_dados_select['dp3_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp3_2p = $this->dp3_2p"; 
                  $comando_oracle        .= " dp3_2p = $this->dp3_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp4_2p']) && $NM_val_form['dp4_2p'] != $this->nmgp_dados_select['dp4_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp4_2p = $this->dp4_2p"; 
                  $comando_oracle        .= " dp4_2p = $this->dp4_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp5_2p']) && $NM_val_form['dp5_2p'] != $this->nmgp_dados_select['dp5_2p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp5_2p = $this->dp5_2p"; 
                  $comando_oracle        .= " dp5_2p = $this->dp5_2p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dp2']) && $NM_val_form['pcent_dp2'] != $this->nmgp_dados_select['pcent_dp2']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dp2 = $this->pcent_dp2"; 
                  $comando_oracle        .= " pcent_dp2 = $this->pcent_dp2"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['eval_3_per']) && $NM_val_form['eval_3_per'] != $this->nmgp_dados_select['eval_3_per']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " eval_3_per = $this->eval_3_per"; 
                  $comando_oracle        .= " eval_3_per = $this->eval_3_per"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc1_3p']) && $NM_val_form['dc1_3p'] != $this->nmgp_dados_select['dc1_3p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc1_3p = $this->dc1_3p"; 
                  $comando_oracle        .= " dc1_3p = $this->dc1_3p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc2_3p']) && $NM_val_form['dc2_3p'] != $this->nmgp_dados_select['dc2_3p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc2_3p = $this->dc2_3p"; 
                  $comando_oracle        .= " dc2_3p = $this->dc2_3p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc3_3p']) && $NM_val_form['dc3_3p'] != $this->nmgp_dados_select['dc3_3p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc3_3p = $this->dc3_3p"; 
                  $comando_oracle        .= " dc3_3p = $this->dc3_3p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc4_3p']) && $NM_val_form['dc4_3p'] != $this->nmgp_dados_select['dc4_3p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc4_3p = $this->dc4_3p"; 
                  $comando_oracle        .= " dc4_3p = $this->dc4_3p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc5_3p']) && $NM_val_form['dc5_3p'] != $this->nmgp_dados_select['dc5_3p']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc5_3p = $this->dc5_3p"; 
                  $comando_oracle        .= " dc5_3p = $this->dc5_3p"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dc3']) && $NM_val_form['pcent_dc3'] != $this->nmgp_dados_select['pcent_dc3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dc3 = $this->pcent_dc3"; 
                  $comando_oracle        .= " pcent_dc3 = $this->pcent_dc3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds1_p3']) && $NM_val_form['ds1_p3'] != $this->nmgp_dados_select['ds1_p3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds1_p3 = $this->ds1_p3"; 
                  $comando_oracle        .= " ds1_p3 = $this->ds1_p3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds2_p3']) && $NM_val_form['ds2_p3'] != $this->nmgp_dados_select['ds2_p3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds2_p3 = $this->ds2_p3"; 
                  $comando_oracle        .= " ds2_p3 = $this->ds2_p3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds3_p3']) && $NM_val_form['ds3_p3'] != $this->nmgp_dados_select['ds3_p3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds3_p3 = $this->ds3_p3"; 
                  $comando_oracle        .= " ds3_p3 = $this->ds3_p3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds4_p3']) && $NM_val_form['ds4_p3'] != $this->nmgp_dados_select['ds4_p3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds4_p3 = $this->ds4_p3"; 
                  $comando_oracle        .= " ds4_p3 = $this->ds4_p3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds5_p3']) && $NM_val_form['ds5_p3'] != $this->nmgp_dados_select['ds5_p3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds5_p3 = $this->ds5_p3"; 
                  $comando_oracle        .= " ds5_p3 = $this->ds5_p3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_ds3']) && $NM_val_form['pcent_ds3'] != $this->nmgp_dados_select['pcent_ds3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_ds3 = $this->pcent_ds3"; 
                  $comando_oracle        .= " pcent_ds3 = $this->pcent_ds3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp1_p3']) && $NM_val_form['dp1_p3'] != $this->nmgp_dados_select['dp1_p3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp1_p3 = $this->dp1_p3"; 
                  $comando_oracle        .= " dp1_p3 = $this->dp1_p3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp2_p3']) && $NM_val_form['dp2_p3'] != $this->nmgp_dados_select['dp2_p3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp2_p3 = $this->dp2_p3"; 
                  $comando_oracle        .= " dp2_p3 = $this->dp2_p3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp3_p3']) && $NM_val_form['dp3_p3'] != $this->nmgp_dados_select['dp3_p3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp3_p3 = $this->dp3_p3"; 
                  $comando_oracle        .= " dp3_p3 = $this->dp3_p3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp4_p3']) && $NM_val_form['dp4_p3'] != $this->nmgp_dados_select['dp4_p3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp4_p3 = $this->dp4_p3"; 
                  $comando_oracle        .= " dp4_p3 = $this->dp4_p3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['sc_field_0']) && $NM_val_form['sc_field_0'] != $this->nmgp_dados_select['sc_field_0']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " `dp5-p3` = $this->sc_field_0"; 
                  $comando_oracle        .= " `dp5-p3` = $this->sc_field_0"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dp3']) && $NM_val_form['pcent_dp3'] != $this->nmgp_dados_select['pcent_dp3']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dp3 = $this->pcent_dp3"; 
                  $comando_oracle        .= " pcent_dp3 = $this->pcent_dp3"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['eval_4_per']) && $NM_val_form['eval_4_per'] != $this->nmgp_dados_select['eval_4_per']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " eval_4_per = $this->eval_4_per"; 
                  $comando_oracle        .= " eval_4_per = $this->eval_4_per"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc1_p4']) && $NM_val_form['dc1_p4'] != $this->nmgp_dados_select['dc1_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc1_p4 = $this->dc1_p4"; 
                  $comando_oracle        .= " dc1_p4 = $this->dc1_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc2_p4']) && $NM_val_form['dc2_p4'] != $this->nmgp_dados_select['dc2_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc2_p4 = $this->dc2_p4"; 
                  $comando_oracle        .= " dc2_p4 = $this->dc2_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc3_p4']) && $NM_val_form['dc3_p4'] != $this->nmgp_dados_select['dc3_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc3_p4 = $this->dc3_p4"; 
                  $comando_oracle        .= " dc3_p4 = $this->dc3_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc4_p4']) && $NM_val_form['dc4_p4'] != $this->nmgp_dados_select['dc4_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc4_p4 = $this->dc4_p4"; 
                  $comando_oracle        .= " dc4_p4 = $this->dc4_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dc5_p4']) && $NM_val_form['dc5_p4'] != $this->nmgp_dados_select['dc5_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dc5_p4 = $this->dc5_p4"; 
                  $comando_oracle        .= " dc5_p4 = $this->dc5_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dc4']) && $NM_val_form['pcent_dc4'] != $this->nmgp_dados_select['pcent_dc4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dc4 = $this->pcent_dc4"; 
                  $comando_oracle        .= " pcent_dc4 = $this->pcent_dc4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds1_p4']) && $NM_val_form['ds1_p4'] != $this->nmgp_dados_select['ds1_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds1_p4 = $this->ds1_p4"; 
                  $comando_oracle        .= " ds1_p4 = $this->ds1_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds2_p4']) && $NM_val_form['ds2_p4'] != $this->nmgp_dados_select['ds2_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds2_p4 = $this->ds2_p4"; 
                  $comando_oracle        .= " ds2_p4 = $this->ds2_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds3_p4']) && $NM_val_form['ds3_p4'] != $this->nmgp_dados_select['ds3_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds3_p4 = $this->ds3_p4"; 
                  $comando_oracle        .= " ds3_p4 = $this->ds3_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds4_p4']) && $NM_val_form['ds4_p4'] != $this->nmgp_dados_select['ds4_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds4_p4 = $this->ds4_p4"; 
                  $comando_oracle        .= " ds4_p4 = $this->ds4_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['ds5_p4']) && $NM_val_form['ds5_p4'] != $this->nmgp_dados_select['ds5_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ds5_p4 = $this->ds5_p4"; 
                  $comando_oracle        .= " ds5_p4 = $this->ds5_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_ds4']) && $NM_val_form['pcent_ds4'] != $this->nmgp_dados_select['pcent_ds4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_ds4 = $this->pcent_ds4"; 
                  $comando_oracle        .= " pcent_ds4 = $this->pcent_ds4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp1_p4']) && $NM_val_form['dp1_p4'] != $this->nmgp_dados_select['dp1_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp1_p4 = $this->dp1_p4"; 
                  $comando_oracle        .= " dp1_p4 = $this->dp1_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp2_p4']) && $NM_val_form['dp2_p4'] != $this->nmgp_dados_select['dp2_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp2_p4 = $this->dp2_p4"; 
                  $comando_oracle        .= " dp2_p4 = $this->dp2_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp3_p4']) && $NM_val_form['dp3_p4'] != $this->nmgp_dados_select['dp3_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp3_p4 = $this->dp3_p4"; 
                  $comando_oracle        .= " dp3_p4 = $this->dp3_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp4_p4']) && $NM_val_form['dp4_p4'] != $this->nmgp_dados_select['dp4_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp4_p4 = $this->dp4_p4"; 
                  $comando_oracle        .= " dp4_p4 = $this->dp4_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dp5_p4']) && $NM_val_form['dp5_p4'] != $this->nmgp_dados_select['dp5_p4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dp5_p4 = $this->dp5_p4"; 
                  $comando_oracle        .= " dp5_p4 = $this->dp5_p4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['pcent_dp4']) && $NM_val_form['pcent_dp4'] != $this->nmgp_dados_select['pcent_dp4']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " pcent_dp4 = $this->pcent_dp4"; 
                  $comando_oracle        .= " pcent_dp4 = $this->pcent_dp4"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['eval_final']) && $NM_val_form['eval_final'] != $this->nmgp_dados_select['eval_final']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " eval_final = $this->eval_final"; 
                  $comando_oracle        .= " eval_final = $this->eval_final"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['entorno']) && $NM_val_form['entorno'] != $this->nmgp_dados_select['entorno']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " entorno = $this->entorno"; 
                  $comando_oracle        .= " entorno = $this->entorno"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE id_estudiante = $this->id_estudiante and id_grupo = $this->id_grupo and id_asignatura = $this->id_asignatura ";  
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
                                  form_evalua_actividad_dc4_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->primer_apellido = $this->primer_apellido_before_qstr;
          $this->segundo_apellido = $this->segundo_apellido_before_qstr;
          $this->primer_nombre = $this->primer_nombre_before_qstr;
          $this->segundo_nombre = $this->segundo_nombre_before_qstr;
          $this->tipo_asig = $this->tipo_asig_before_qstr;
          $this->novedad = $this->novedad_before_qstr;
          $this->estatus = $this->estatus_before_qstr;
          $this->actividades = $this->actividades_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id_estudiante'])) { $this->id_estudiante = $NM_val_form['id_estudiante']; }
              elseif (isset($this->id_estudiante)) { $this->nm_limpa_alfa($this->id_estudiante); }
              if     (isset($NM_val_form) && isset($NM_val_form['dc4'])) { $this->dc4 = $NM_val_form['dc4']; }
              elseif (isset($this->dc4)) { $this->nm_limpa_alfa($this->dc4); }
              if     (isset($NM_val_form) && isset($NM_val_form['actividades'])) { $this->actividades = $NM_val_form['actividades']; }
              elseif (isset($this->actividades)) { $this->nm_limpa_alfa($this->actividades); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id_estudiante', 'dc4', 'actividades'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante and id_grupo = $this->id_grupo and id_asignatura = $this->id_asignatura "; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante and id_grupo = $this->id_grupo and id_asignatura = $this->id_asignatura "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_evalua_actividad_dc4_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_grupo, id_area, id_asignatura, id_grado, id_nivel, ihs, pfa, tipo_asig, novedad, estatus, eval_1_per, dc1, dc2, dc3, dc4, dc5, pcent_dc, ds1, ds2, ds3, ds4, ds5, pcent_ds, dp1, dp2, dp3, dp4, dp5, pcent_dp, eval_2_per, dc1_2p, dc2_2p, dc3_2p, dc4_2p, dc5_2p, pcent_dc2, ds1_2p, ds2_2p, ds3_2p, ds4_2p, ds5_2p, pcent_ds2, dp1_2p, dp2_2p, dp3_2p, dp4_2p, dp5_2p, pcent_dp2, eval_3_per, dc1_3p, dc2_3p, dc3_3p, dc4_3p, dc5_3p, pcent_dc3, ds1_p3, ds2_p3, ds3_p3, ds4_p3, ds5_p3, pcent_ds3, dp1_p3, dp2_p3, dp3_p3, dp4_p3, `dp5-p3`, pcent_dp3, eval_4_per, dc1_p4, dc2_p4, dc3_p4, dc4_p4, dc5_p4, pcent_dc4, ds1_p4, ds2_p4, ds3_p4, ds4_p4, ds5_p4, pcent_ds4, dp1_p4, dp2_p4, dp3_p4, dp4_p4, dp5_p4, pcent_dp4, eval_final, entorno) VALUES (" . $NM_seq_auto . "$this->id_estudiante, '$this->primer_apellido', '$this->segundo_apellido', '$this->primer_nombre', '$this->segundo_nombre', $this->id_grupo, $this->id_area, $this->id_asignatura, $this->id_grado, $this->id_nivel, $this->ihs, $this->pfa, '$this->tipo_asig', '$this->novedad', '$this->estatus', $this->eval_1_per, $this->dc1, $this->dc2, $this->dc3, $this->dc4, $this->dc5, $this->pcent_dc, $this->ds1, $this->ds2, $this->ds3, $this->ds4, $this->ds5, $this->pcent_ds, $this->dp1, $this->dp2, $this->dp3, $this->dp4, $this->dp5, $this->pcent_dp, $this->eval_2_per, $this->dc1_2p, $this->dc2_2p, $this->dc3_2p, $this->dc4_2p, $this->dc5_2p, $this->pcent_dc2, $this->ds1_2p, $this->ds2_2p, $this->ds3_2p, $this->ds4_2p, $this->ds5_2p, $this->pcent_ds2, $this->dp1_2p, $this->dp2_2p, $this->dp3_2p, $this->dp4_2p, $this->dp5_2p, $this->pcent_dp2, $this->eval_3_per, $this->dc1_3p, $this->dc2_3p, $this->dc3_3p, $this->dc4_3p, $this->dc5_3p, $this->pcent_dc3, $this->ds1_p3, $this->ds2_p3, $this->ds3_p3, $this->ds4_p3, $this->ds5_p3, $this->pcent_ds3, $this->dp1_p3, $this->dp2_p3, $this->dp3_p3, $this->dp4_p3, $this->sc_field_0, $this->pcent_dp3, $this->eval_4_per, $this->dc1_p4, $this->dc2_p4, $this->dc3_p4, $this->dc4_p4, $this->dc5_p4, $this->pcent_dc4, $this->ds1_p4, $this->ds2_p4, $this->ds3_p4, $this->ds4_p4, $this->ds5_p4, $this->pcent_ds4, $this->dp1_p4, $this->dp2_p4, $this->dp3_p4, $this->dp4_p4, $this->dp5_p4, $this->pcent_dp4, $this->eval_final, $this->entorno)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_grupo, id_area, id_asignatura, id_grado, id_nivel, ihs, pfa, tipo_asig, novedad, estatus, eval_1_per, dc1, dc2, dc3, dc4, dc5, pcent_dc, ds1, ds2, ds3, ds4, ds5, pcent_ds, dp1, dp2, dp3, dp4, dp5, pcent_dp, eval_2_per, dc1_2p, dc2_2p, dc3_2p, dc4_2p, dc5_2p, pcent_dc2, ds1_2p, ds2_2p, ds3_2p, ds4_2p, ds5_2p, pcent_ds2, dp1_2p, dp2_2p, dp3_2p, dp4_2p, dp5_2p, pcent_dp2, eval_3_per, dc1_3p, dc2_3p, dc3_3p, dc4_3p, dc5_3p, pcent_dc3, ds1_p3, ds2_p3, ds3_p3, ds4_p3, ds5_p3, pcent_ds3, dp1_p3, dp2_p3, dp3_p3, dp4_p3, `dp5-p3`, pcent_dp3, eval_4_per, dc1_p4, dc2_p4, dc3_p4, dc4_p4, dc5_p4, pcent_dc4, ds1_p4, ds2_p4, ds3_p4, ds4_p4, ds5_p4, pcent_ds4, dp1_p4, dp2_p4, dp3_p4, dp4_p4, dp5_p4, pcent_dp4, eval_final, entorno) VALUES (" . $NM_seq_auto . "$this->id_estudiante, '$this->primer_apellido', '$this->segundo_apellido', '$this->primer_nombre', '$this->segundo_nombre', $this->id_grupo, $this->id_area, $this->id_asignatura, $this->id_grado, $this->id_nivel, $this->ihs, $this->pfa, '$this->tipo_asig', '$this->novedad', '$this->estatus', $this->eval_1_per, $this->dc1, $this->dc2, $this->dc3, $this->dc4, $this->dc5, $this->pcent_dc, $this->ds1, $this->ds2, $this->ds3, $this->ds4, $this->ds5, $this->pcent_ds, $this->dp1, $this->dp2, $this->dp3, $this->dp4, $this->dp5, $this->pcent_dp, $this->eval_2_per, $this->dc1_2p, $this->dc2_2p, $this->dc3_2p, $this->dc4_2p, $this->dc5_2p, $this->pcent_dc2, $this->ds1_2p, $this->ds2_2p, $this->ds3_2p, $this->ds4_2p, $this->ds5_2p, $this->pcent_ds2, $this->dp1_2p, $this->dp2_2p, $this->dp3_2p, $this->dp4_2p, $this->dp5_2p, $this->pcent_dp2, $this->eval_3_per, $this->dc1_3p, $this->dc2_3p, $this->dc3_3p, $this->dc4_3p, $this->dc5_3p, $this->pcent_dc3, $this->ds1_p3, $this->ds2_p3, $this->ds3_p3, $this->ds4_p3, $this->ds5_p3, $this->pcent_ds3, $this->dp1_p3, $this->dp2_p3, $this->dp3_p3, $this->dp4_p3, $this->sc_field_0, $this->pcent_dp3, $this->eval_4_per, $this->dc1_p4, $this->dc2_p4, $this->dc3_p4, $this->dc4_p4, $this->dc5_p4, $this->pcent_dc4, $this->ds1_p4, $this->ds2_p4, $this->ds3_p4, $this->ds4_p4, $this->ds5_p4, $this->pcent_ds4, $this->dp1_p4, $this->dp2_p4, $this->dp3_p4, $this->dp4_p4, $this->dp5_p4, $this->pcent_dp4, $this->eval_final, $this->entorno)"; 
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
                              form_evalua_actividad_dc4_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_estudiante = substr($this->Db->qstr($this->id_estudiante), 1, -1); 
          $this->id_grupo = substr($this->Db->qstr($this->id_grupo), 1, -1); 
          $this->id_asignatura = substr($this->Db->qstr($this->id_asignatura), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "id_estudent = " . $this->id_estudiante . "";
              $this->form_det_evalua_actividad->ini_controle();
              if ($this->form_det_evalua_actividad->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante and id_grupo = $this->id_grupo and id_asignatura = $this->id_asignatura"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante and id_grupo = $this->id_grupo and id_asignatura = $this->id_asignatura "); 
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
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante and id_grupo = $this->id_grupo and id_asignatura = $this->id_asignatura "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_estudiante = $this->id_estudiante and id_grupo = $this->id_grupo and id_asignatura = $this->id_asignatura "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_evalua_actividad_dc4_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total']);
              }

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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['parms'] = "id_estudiante?#?$this->id_estudiante?@?id_grupo?#?$this->id_grupo?@?id_asignatura?#?$this->id_asignatura?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_estudiante = substr($this->Db->qstr($this->id_estudiante), 1, -1); 
          $this->id_grupo = substr($this->Db->qstr($this->id_grupo), 1, -1); 
          $this->id_asignatura = substr($this->Db->qstr($this->id_asignatura), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->id_estudiante) && empty($this->id_grupo) && empty($this->id_asignatura)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->id_estudiante) === "" || trim($this->id_grupo) === "" || trim($this->id_asignatura) === "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura = " . $_SESSION['par_idasignatura'] . " AND id_estudiante = " . $_SESSION['par_idestudiante'] . " AND entorno = " . $_SESSION['entorno'] . "");
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
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total']))
      { 
          $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_evalua_actividad_dc4 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total'] = $qt_geral_reg_form_evalua_actividad_dc4;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_estudiante) && !empty($this->id_grupo) && !empty($this->id_asignatura))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              $Sel_Chave = "id_estudiante, id_grupo, id_asignatura"; 
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "id_estudiante, id_grupo, id_asignatura";
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
                  if ($rt->fields[0] == $this->id_estudiante && $rt->fields[1] == $this->id_grupo && $rt->fields[2] == $this->id_asignatura)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_evalua_actividad_dc4 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] > $qt_geral_reg_form_evalua_actividad_dc4)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] = $qt_geral_reg_form_evalua_actividad_dc4; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] = $qt_geral_reg_form_evalua_actividad_dc4; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_evalua_actividad_dc4) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['parms'] = ""; 
          $nmgp_select = "SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_grupo, id_area, id_asignatura, id_grado, id_nivel, ihs, pfa, tipo_asig, novedad, estatus, eval_1_per, dc1, dc2, dc3, dc4, dc5, pcent_dc, ds1, ds2, ds3, ds4, ds5, pcent_ds, dp1, dp2, dp3, dp4, dp5, pcent_dp, eval_2_per, dc1_2p, dc2_2p, dc3_2p, dc4_2p, dc5_2p, pcent_dc2, ds1_2p, ds2_2p, ds3_2p, ds4_2p, ds5_2p, pcent_ds2, dp1_2p, dp2_2p, dp3_2p, dp4_2p, dp5_2p, pcent_dp2, eval_3_per, dc1_3p, dc2_3p, dc3_3p, dc4_3p, dc5_3p, pcent_dc3, ds1_p3, ds2_p3, ds3_p3, ds4_p3, ds5_p3, pcent_ds3, dp1_p3, dp2_p3, dp3_p3, dp4_p3, `dp5-p3` as sc_field_0, pcent_dp3, eval_4_per, dc1_p4, dc2_p4, dc3_p4, dc4_p4, dc5_p4, pcent_dc4, ds1_p4, ds2_p4, ds3_p4, ds4_p4, ds5_p4, pcent_ds4, dp1_p4, dp2_p4, dp3_p4, dp4_p4, dp5_p4, pcent_dp4, eval_final, entorno from " . $this->Ini->nm_tabela ; 
          $aWhere = array();
          $aWhere[] = "id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura = " . $_SESSION['par_idasignatura'] . " AND id_estudiante = " . $_SESSION['par_idestudiante'] . " AND entorno = " . $_SESSION['entorno'] . "";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                 $aWhere[] = "id_estudiante = $this->id_estudiante and id_grupo = $this->id_grupo and id_asignatura = $this->id_asignatura"; 
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "id_estudiante, id_grupo, id_asignatura";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start']) ;  
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
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes['update'] = "off";
              $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes['delete'] = "off";
              return; 
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id_estudiante = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_estudiante'] = $this->id_estudiante;
              $this->primer_apellido = $rs->fields[1] ; 
              $this->nmgp_dados_select['primer_apellido'] = $this->primer_apellido;
              $this->segundo_apellido = $rs->fields[2] ; 
              $this->nmgp_dados_select['segundo_apellido'] = $this->segundo_apellido;
              $this->primer_nombre = $rs->fields[3] ; 
              $this->nmgp_dados_select['primer_nombre'] = $this->primer_nombre;
              $this->segundo_nombre = $rs->fields[4] ; 
              $this->nmgp_dados_select['segundo_nombre'] = $this->segundo_nombre;
              $this->id_grupo = $rs->fields[5] ; 
              $this->nmgp_dados_select['id_grupo'] = $this->id_grupo;
              $this->id_area = $rs->fields[6] ; 
              $this->nmgp_dados_select['id_area'] = $this->id_area;
              $this->id_asignatura = $rs->fields[7] ; 
              $this->nmgp_dados_select['id_asignatura'] = $this->id_asignatura;
              $this->id_grado = $rs->fields[8] ; 
              $this->nmgp_dados_select['id_grado'] = $this->id_grado;
              $this->id_nivel = $rs->fields[9] ; 
              $this->nmgp_dados_select['id_nivel'] = $this->id_nivel;
              $this->ihs = $rs->fields[10] ; 
              $this->nmgp_dados_select['ihs'] = $this->ihs;
              $this->pfa = $rs->fields[11] ; 
              $this->nmgp_dados_select['pfa'] = $this->pfa;
              $this->tipo_asig = $rs->fields[12] ; 
              $this->nmgp_dados_select['tipo_asig'] = $this->tipo_asig;
              $this->novedad = $rs->fields[13] ; 
              $this->nmgp_dados_select['novedad'] = $this->novedad;
              $this->estatus = $rs->fields[14] ; 
              $this->nmgp_dados_select['estatus'] = $this->estatus;
              $this->eval_1_per = trim($rs->fields[15]) ; 
              $this->nmgp_dados_select['eval_1_per'] = $this->eval_1_per;
              $this->dc1 = trim($rs->fields[16]) ; 
              $this->nmgp_dados_select['dc1'] = $this->dc1;
              $this->dc2 = trim($rs->fields[17]) ; 
              $this->nmgp_dados_select['dc2'] = $this->dc2;
              $this->dc3 = trim($rs->fields[18]) ; 
              $this->nmgp_dados_select['dc3'] = $this->dc3;
              $this->dc4 = trim($rs->fields[19]) ; 
              $this->nmgp_dados_select['dc4'] = $this->dc4;
              $this->dc5 = trim($rs->fields[20]) ; 
              $this->nmgp_dados_select['dc5'] = $this->dc5;
              $this->pcent_dc = trim($rs->fields[21]) ; 
              $this->nmgp_dados_select['pcent_dc'] = $this->pcent_dc;
              $this->ds1 = trim($rs->fields[22]) ; 
              $this->nmgp_dados_select['ds1'] = $this->ds1;
              $this->ds2 = trim($rs->fields[23]) ; 
              $this->nmgp_dados_select['ds2'] = $this->ds2;
              $this->ds3 = trim($rs->fields[24]) ; 
              $this->nmgp_dados_select['ds3'] = $this->ds3;
              $this->ds4 = trim($rs->fields[25]) ; 
              $this->nmgp_dados_select['ds4'] = $this->ds4;
              $this->ds5 = trim($rs->fields[26]) ; 
              $this->nmgp_dados_select['ds5'] = $this->ds5;
              $this->pcent_ds = trim($rs->fields[27]) ; 
              $this->nmgp_dados_select['pcent_ds'] = $this->pcent_ds;
              $this->dp1 = trim($rs->fields[28]) ; 
              $this->nmgp_dados_select['dp1'] = $this->dp1;
              $this->dp2 = trim($rs->fields[29]) ; 
              $this->nmgp_dados_select['dp2'] = $this->dp2;
              $this->dp3 = trim($rs->fields[30]) ; 
              $this->nmgp_dados_select['dp3'] = $this->dp3;
              $this->dp4 = trim($rs->fields[31]) ; 
              $this->nmgp_dados_select['dp4'] = $this->dp4;
              $this->dp5 = trim($rs->fields[32]) ; 
              $this->nmgp_dados_select['dp5'] = $this->dp5;
              $this->pcent_dp = trim($rs->fields[33]) ; 
              $this->nmgp_dados_select['pcent_dp'] = $this->pcent_dp;
              $this->eval_2_per = trim($rs->fields[34]) ; 
              $this->nmgp_dados_select['eval_2_per'] = $this->eval_2_per;
              $this->dc1_2p = trim($rs->fields[35]) ; 
              $this->nmgp_dados_select['dc1_2p'] = $this->dc1_2p;
              $this->dc2_2p = trim($rs->fields[36]) ; 
              $this->nmgp_dados_select['dc2_2p'] = $this->dc2_2p;
              $this->dc3_2p = trim($rs->fields[37]) ; 
              $this->nmgp_dados_select['dc3_2p'] = $this->dc3_2p;
              $this->dc4_2p = trim($rs->fields[38]) ; 
              $this->nmgp_dados_select['dc4_2p'] = $this->dc4_2p;
              $this->dc5_2p = trim($rs->fields[39]) ; 
              $this->nmgp_dados_select['dc5_2p'] = $this->dc5_2p;
              $this->pcent_dc2 = trim($rs->fields[40]) ; 
              $this->nmgp_dados_select['pcent_dc2'] = $this->pcent_dc2;
              $this->ds1_2p = trim($rs->fields[41]) ; 
              $this->nmgp_dados_select['ds1_2p'] = $this->ds1_2p;
              $this->ds2_2p = trim($rs->fields[42]) ; 
              $this->nmgp_dados_select['ds2_2p'] = $this->ds2_2p;
              $this->ds3_2p = trim($rs->fields[43]) ; 
              $this->nmgp_dados_select['ds3_2p'] = $this->ds3_2p;
              $this->ds4_2p = trim($rs->fields[44]) ; 
              $this->nmgp_dados_select['ds4_2p'] = $this->ds4_2p;
              $this->ds5_2p = trim($rs->fields[45]) ; 
              $this->nmgp_dados_select['ds5_2p'] = $this->ds5_2p;
              $this->pcent_ds2 = trim($rs->fields[46]) ; 
              $this->nmgp_dados_select['pcent_ds2'] = $this->pcent_ds2;
              $this->dp1_2p = trim($rs->fields[47]) ; 
              $this->nmgp_dados_select['dp1_2p'] = $this->dp1_2p;
              $this->dp2_2p = trim($rs->fields[48]) ; 
              $this->nmgp_dados_select['dp2_2p'] = $this->dp2_2p;
              $this->dp3_2p = trim($rs->fields[49]) ; 
              $this->nmgp_dados_select['dp3_2p'] = $this->dp3_2p;
              $this->dp4_2p = trim($rs->fields[50]) ; 
              $this->nmgp_dados_select['dp4_2p'] = $this->dp4_2p;
              $this->dp5_2p = trim($rs->fields[51]) ; 
              $this->nmgp_dados_select['dp5_2p'] = $this->dp5_2p;
              $this->pcent_dp2 = trim($rs->fields[52]) ; 
              $this->nmgp_dados_select['pcent_dp2'] = $this->pcent_dp2;
              $this->eval_3_per = trim($rs->fields[53]) ; 
              $this->nmgp_dados_select['eval_3_per'] = $this->eval_3_per;
              $this->dc1_3p = trim($rs->fields[54]) ; 
              $this->nmgp_dados_select['dc1_3p'] = $this->dc1_3p;
              $this->dc2_3p = trim($rs->fields[55]) ; 
              $this->nmgp_dados_select['dc2_3p'] = $this->dc2_3p;
              $this->dc3_3p = trim($rs->fields[56]) ; 
              $this->nmgp_dados_select['dc3_3p'] = $this->dc3_3p;
              $this->dc4_3p = trim($rs->fields[57]) ; 
              $this->nmgp_dados_select['dc4_3p'] = $this->dc4_3p;
              $this->dc5_3p = trim($rs->fields[58]) ; 
              $this->nmgp_dados_select['dc5_3p'] = $this->dc5_3p;
              $this->pcent_dc3 = trim($rs->fields[59]) ; 
              $this->nmgp_dados_select['pcent_dc3'] = $this->pcent_dc3;
              $this->ds1_p3 = trim($rs->fields[60]) ; 
              $this->nmgp_dados_select['ds1_p3'] = $this->ds1_p3;
              $this->ds2_p3 = trim($rs->fields[61]) ; 
              $this->nmgp_dados_select['ds2_p3'] = $this->ds2_p3;
              $this->ds3_p3 = trim($rs->fields[62]) ; 
              $this->nmgp_dados_select['ds3_p3'] = $this->ds3_p3;
              $this->ds4_p3 = trim($rs->fields[63]) ; 
              $this->nmgp_dados_select['ds4_p3'] = $this->ds4_p3;
              $this->ds5_p3 = trim($rs->fields[64]) ; 
              $this->nmgp_dados_select['ds5_p3'] = $this->ds5_p3;
              $this->pcent_ds3 = trim($rs->fields[65]) ; 
              $this->nmgp_dados_select['pcent_ds3'] = $this->pcent_ds3;
              $this->dp1_p3 = trim($rs->fields[66]) ; 
              $this->nmgp_dados_select['dp1_p3'] = $this->dp1_p3;
              $this->dp2_p3 = trim($rs->fields[67]) ; 
              $this->nmgp_dados_select['dp2_p3'] = $this->dp2_p3;
              $this->dp3_p3 = trim($rs->fields[68]) ; 
              $this->nmgp_dados_select['dp3_p3'] = $this->dp3_p3;
              $this->dp4_p3 = trim($rs->fields[69]) ; 
              $this->nmgp_dados_select['dp4_p3'] = $this->dp4_p3;
              $this->sc_field_0 = trim($rs->fields[70]) ; 
              $this->nmgp_dados_select['sc_field_0'] = $this->sc_field_0;
              $this->pcent_dp3 = trim($rs->fields[71]) ; 
              $this->nmgp_dados_select['pcent_dp3'] = $this->pcent_dp3;
              $this->eval_4_per = trim($rs->fields[72]) ; 
              $this->nmgp_dados_select['eval_4_per'] = $this->eval_4_per;
              $this->dc1_p4 = trim($rs->fields[73]) ; 
              $this->nmgp_dados_select['dc1_p4'] = $this->dc1_p4;
              $this->dc2_p4 = trim($rs->fields[74]) ; 
              $this->nmgp_dados_select['dc2_p4'] = $this->dc2_p4;
              $this->dc3_p4 = trim($rs->fields[75]) ; 
              $this->nmgp_dados_select['dc3_p4'] = $this->dc3_p4;
              $this->dc4_p4 = trim($rs->fields[76]) ; 
              $this->nmgp_dados_select['dc4_p4'] = $this->dc4_p4;
              $this->dc5_p4 = trim($rs->fields[77]) ; 
              $this->nmgp_dados_select['dc5_p4'] = $this->dc5_p4;
              $this->pcent_dc4 = trim($rs->fields[78]) ; 
              $this->nmgp_dados_select['pcent_dc4'] = $this->pcent_dc4;
              $this->ds1_p4 = trim($rs->fields[79]) ; 
              $this->nmgp_dados_select['ds1_p4'] = $this->ds1_p4;
              $this->ds2_p4 = trim($rs->fields[80]) ; 
              $this->nmgp_dados_select['ds2_p4'] = $this->ds2_p4;
              $this->ds3_p4 = trim($rs->fields[81]) ; 
              $this->nmgp_dados_select['ds3_p4'] = $this->ds3_p4;
              $this->ds4_p4 = trim($rs->fields[82]) ; 
              $this->nmgp_dados_select['ds4_p4'] = $this->ds4_p4;
              $this->ds5_p4 = trim($rs->fields[83]) ; 
              $this->nmgp_dados_select['ds5_p4'] = $this->ds5_p4;
              $this->pcent_ds4 = trim($rs->fields[84]) ; 
              $this->nmgp_dados_select['pcent_ds4'] = $this->pcent_ds4;
              $this->dp1_p4 = trim($rs->fields[85]) ; 
              $this->nmgp_dados_select['dp1_p4'] = $this->dp1_p4;
              $this->dp2_p4 = trim($rs->fields[86]) ; 
              $this->nmgp_dados_select['dp2_p4'] = $this->dp2_p4;
              $this->dp3_p4 = trim($rs->fields[87]) ; 
              $this->nmgp_dados_select['dp3_p4'] = $this->dp3_p4;
              $this->dp4_p4 = trim($rs->fields[88]) ; 
              $this->nmgp_dados_select['dp4_p4'] = $this->dp4_p4;
              $this->dp5_p4 = trim($rs->fields[89]) ; 
              $this->nmgp_dados_select['dp5_p4'] = $this->dp5_p4;
              $this->pcent_dp4 = trim($rs->fields[90]) ; 
              $this->nmgp_dados_select['pcent_dp4'] = $this->pcent_dp4;
              $this->eval_final = trim($rs->fields[91]) ; 
              $this->nmgp_dados_select['eval_final'] = $this->eval_final;
              $this->entorno = $rs->fields[92] ; 
              $this->nmgp_dados_select['entorno'] = $this->entorno;
              $this->actividades = $rs->fields[93] ; 
              $this->nmgp_dados_select['actividades'] = $this->actividades;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id_estudiante = (string)$this->id_estudiante; 
              $this->id_grupo = (string)$this->id_grupo; 
              $this->id_area = (string)$this->id_area; 
              $this->id_asignatura = (string)$this->id_asignatura; 
              $this->id_grado = (string)$this->id_grado; 
              $this->id_nivel = (string)$this->id_nivel; 
              $this->ihs = (string)$this->ihs; 
              $this->pfa = (string)$this->pfa; 
              $this->eval_1_per = (strpos(strtolower($this->eval_1_per), "e")) ? (float)$this->eval_1_per : $this->eval_1_per; 
              $this->eval_1_per = (string)$this->eval_1_per; 
              $this->dc1 = (strpos(strtolower($this->dc1), "e")) ? (float)$this->dc1 : $this->dc1; 
              $this->dc1 = (string)$this->dc1; 
              $this->dc2 = (strpos(strtolower($this->dc2), "e")) ? (float)$this->dc2 : $this->dc2; 
              $this->dc2 = (string)$this->dc2; 
              $this->dc3 = (strpos(strtolower($this->dc3), "e")) ? (float)$this->dc3 : $this->dc3; 
              $this->dc3 = (string)$this->dc3; 
              $this->dc4 = (strpos(strtolower($this->dc4), "e")) ? (float)$this->dc4 : $this->dc4; 
              $this->dc4 = (string)$this->dc4; 
              $this->dc5 = (strpos(strtolower($this->dc5), "e")) ? (float)$this->dc5 : $this->dc5; 
              $this->dc5 = (string)$this->dc5; 
              $this->pcent_dc = (strpos(strtolower($this->pcent_dc), "e")) ? (float)$this->pcent_dc : $this->pcent_dc; 
              $this->pcent_dc = (string)$this->pcent_dc; 
              $this->ds1 = (strpos(strtolower($this->ds1), "e")) ? (float)$this->ds1 : $this->ds1; 
              $this->ds1 = (string)$this->ds1; 
              $this->ds2 = (strpos(strtolower($this->ds2), "e")) ? (float)$this->ds2 : $this->ds2; 
              $this->ds2 = (string)$this->ds2; 
              $this->ds3 = (strpos(strtolower($this->ds3), "e")) ? (float)$this->ds3 : $this->ds3; 
              $this->ds3 = (string)$this->ds3; 
              $this->ds4 = (strpos(strtolower($this->ds4), "e")) ? (float)$this->ds4 : $this->ds4; 
              $this->ds4 = (string)$this->ds4; 
              $this->ds5 = (strpos(strtolower($this->ds5), "e")) ? (float)$this->ds5 : $this->ds5; 
              $this->ds5 = (string)$this->ds5; 
              $this->pcent_ds = (strpos(strtolower($this->pcent_ds), "e")) ? (float)$this->pcent_ds : $this->pcent_ds; 
              $this->pcent_ds = (string)$this->pcent_ds; 
              $this->dp1 = (strpos(strtolower($this->dp1), "e")) ? (float)$this->dp1 : $this->dp1; 
              $this->dp1 = (string)$this->dp1; 
              $this->dp2 = (strpos(strtolower($this->dp2), "e")) ? (float)$this->dp2 : $this->dp2; 
              $this->dp2 = (string)$this->dp2; 
              $this->dp3 = (strpos(strtolower($this->dp3), "e")) ? (float)$this->dp3 : $this->dp3; 
              $this->dp3 = (string)$this->dp3; 
              $this->dp4 = (strpos(strtolower($this->dp4), "e")) ? (float)$this->dp4 : $this->dp4; 
              $this->dp4 = (string)$this->dp4; 
              $this->dp5 = (strpos(strtolower($this->dp5), "e")) ? (float)$this->dp5 : $this->dp5; 
              $this->dp5 = (string)$this->dp5; 
              $this->pcent_dp = (strpos(strtolower($this->pcent_dp), "e")) ? (float)$this->pcent_dp : $this->pcent_dp; 
              $this->pcent_dp = (string)$this->pcent_dp; 
              $this->eval_2_per = (strpos(strtolower($this->eval_2_per), "e")) ? (float)$this->eval_2_per : $this->eval_2_per; 
              $this->eval_2_per = (string)$this->eval_2_per; 
              $this->dc1_2p = (strpos(strtolower($this->dc1_2p), "e")) ? (float)$this->dc1_2p : $this->dc1_2p; 
              $this->dc1_2p = (string)$this->dc1_2p; 
              $this->dc2_2p = (strpos(strtolower($this->dc2_2p), "e")) ? (float)$this->dc2_2p : $this->dc2_2p; 
              $this->dc2_2p = (string)$this->dc2_2p; 
              $this->dc3_2p = (strpos(strtolower($this->dc3_2p), "e")) ? (float)$this->dc3_2p : $this->dc3_2p; 
              $this->dc3_2p = (string)$this->dc3_2p; 
              $this->dc4_2p = (strpos(strtolower($this->dc4_2p), "e")) ? (float)$this->dc4_2p : $this->dc4_2p; 
              $this->dc4_2p = (string)$this->dc4_2p; 
              $this->dc5_2p = (strpos(strtolower($this->dc5_2p), "e")) ? (float)$this->dc5_2p : $this->dc5_2p; 
              $this->dc5_2p = (string)$this->dc5_2p; 
              $this->pcent_dc2 = (strpos(strtolower($this->pcent_dc2), "e")) ? (float)$this->pcent_dc2 : $this->pcent_dc2; 
              $this->pcent_dc2 = (string)$this->pcent_dc2; 
              $this->ds1_2p = (strpos(strtolower($this->ds1_2p), "e")) ? (float)$this->ds1_2p : $this->ds1_2p; 
              $this->ds1_2p = (string)$this->ds1_2p; 
              $this->ds2_2p = (strpos(strtolower($this->ds2_2p), "e")) ? (float)$this->ds2_2p : $this->ds2_2p; 
              $this->ds2_2p = (string)$this->ds2_2p; 
              $this->ds3_2p = (strpos(strtolower($this->ds3_2p), "e")) ? (float)$this->ds3_2p : $this->ds3_2p; 
              $this->ds3_2p = (string)$this->ds3_2p; 
              $this->ds4_2p = (strpos(strtolower($this->ds4_2p), "e")) ? (float)$this->ds4_2p : $this->ds4_2p; 
              $this->ds4_2p = (string)$this->ds4_2p; 
              $this->ds5_2p = (strpos(strtolower($this->ds5_2p), "e")) ? (float)$this->ds5_2p : $this->ds5_2p; 
              $this->ds5_2p = (string)$this->ds5_2p; 
              $this->pcent_ds2 = (strpos(strtolower($this->pcent_ds2), "e")) ? (float)$this->pcent_ds2 : $this->pcent_ds2; 
              $this->pcent_ds2 = (string)$this->pcent_ds2; 
              $this->dp1_2p = (strpos(strtolower($this->dp1_2p), "e")) ? (float)$this->dp1_2p : $this->dp1_2p; 
              $this->dp1_2p = (string)$this->dp1_2p; 
              $this->dp2_2p = (strpos(strtolower($this->dp2_2p), "e")) ? (float)$this->dp2_2p : $this->dp2_2p; 
              $this->dp2_2p = (string)$this->dp2_2p; 
              $this->dp3_2p = (strpos(strtolower($this->dp3_2p), "e")) ? (float)$this->dp3_2p : $this->dp3_2p; 
              $this->dp3_2p = (string)$this->dp3_2p; 
              $this->dp4_2p = (strpos(strtolower($this->dp4_2p), "e")) ? (float)$this->dp4_2p : $this->dp4_2p; 
              $this->dp4_2p = (string)$this->dp4_2p; 
              $this->dp5_2p = (strpos(strtolower($this->dp5_2p), "e")) ? (float)$this->dp5_2p : $this->dp5_2p; 
              $this->dp5_2p = (string)$this->dp5_2p; 
              $this->pcent_dp2 = (strpos(strtolower($this->pcent_dp2), "e")) ? (float)$this->pcent_dp2 : $this->pcent_dp2; 
              $this->pcent_dp2 = (string)$this->pcent_dp2; 
              $this->eval_3_per = (strpos(strtolower($this->eval_3_per), "e")) ? (float)$this->eval_3_per : $this->eval_3_per; 
              $this->eval_3_per = (string)$this->eval_3_per; 
              $this->dc1_3p = (strpos(strtolower($this->dc1_3p), "e")) ? (float)$this->dc1_3p : $this->dc1_3p; 
              $this->dc1_3p = (string)$this->dc1_3p; 
              $this->dc2_3p = (strpos(strtolower($this->dc2_3p), "e")) ? (float)$this->dc2_3p : $this->dc2_3p; 
              $this->dc2_3p = (string)$this->dc2_3p; 
              $this->dc3_3p = (strpos(strtolower($this->dc3_3p), "e")) ? (float)$this->dc3_3p : $this->dc3_3p; 
              $this->dc3_3p = (string)$this->dc3_3p; 
              $this->dc4_3p = (strpos(strtolower($this->dc4_3p), "e")) ? (float)$this->dc4_3p : $this->dc4_3p; 
              $this->dc4_3p = (string)$this->dc4_3p; 
              $this->dc5_3p = (strpos(strtolower($this->dc5_3p), "e")) ? (float)$this->dc5_3p : $this->dc5_3p; 
              $this->dc5_3p = (string)$this->dc5_3p; 
              $this->pcent_dc3 = (strpos(strtolower($this->pcent_dc3), "e")) ? (float)$this->pcent_dc3 : $this->pcent_dc3; 
              $this->pcent_dc3 = (string)$this->pcent_dc3; 
              $this->ds1_p3 = (strpos(strtolower($this->ds1_p3), "e")) ? (float)$this->ds1_p3 : $this->ds1_p3; 
              $this->ds1_p3 = (string)$this->ds1_p3; 
              $this->ds2_p3 = (strpos(strtolower($this->ds2_p3), "e")) ? (float)$this->ds2_p3 : $this->ds2_p3; 
              $this->ds2_p3 = (string)$this->ds2_p3; 
              $this->ds3_p3 = (strpos(strtolower($this->ds3_p3), "e")) ? (float)$this->ds3_p3 : $this->ds3_p3; 
              $this->ds3_p3 = (string)$this->ds3_p3; 
              $this->ds4_p3 = (strpos(strtolower($this->ds4_p3), "e")) ? (float)$this->ds4_p3 : $this->ds4_p3; 
              $this->ds4_p3 = (string)$this->ds4_p3; 
              $this->ds5_p3 = (strpos(strtolower($this->ds5_p3), "e")) ? (float)$this->ds5_p3 : $this->ds5_p3; 
              $this->ds5_p3 = (string)$this->ds5_p3; 
              $this->pcent_ds3 = (strpos(strtolower($this->pcent_ds3), "e")) ? (float)$this->pcent_ds3 : $this->pcent_ds3; 
              $this->pcent_ds3 = (string)$this->pcent_ds3; 
              $this->dp1_p3 = (strpos(strtolower($this->dp1_p3), "e")) ? (float)$this->dp1_p3 : $this->dp1_p3; 
              $this->dp1_p3 = (string)$this->dp1_p3; 
              $this->dp2_p3 = (strpos(strtolower($this->dp2_p3), "e")) ? (float)$this->dp2_p3 : $this->dp2_p3; 
              $this->dp2_p3 = (string)$this->dp2_p3; 
              $this->dp3_p3 = (strpos(strtolower($this->dp3_p3), "e")) ? (float)$this->dp3_p3 : $this->dp3_p3; 
              $this->dp3_p3 = (string)$this->dp3_p3; 
              $this->dp4_p3 = (strpos(strtolower($this->dp4_p3), "e")) ? (float)$this->dp4_p3 : $this->dp4_p3; 
              $this->dp4_p3 = (string)$this->dp4_p3; 
              $this->sc_field_0 = (strpos(strtolower($this->sc_field_0), "e")) ? (float)$this->sc_field_0 : $this->sc_field_0; 
              $this->sc_field_0 = (string)$this->sc_field_0; 
              $this->pcent_dp3 = (strpos(strtolower($this->pcent_dp3), "e")) ? (float)$this->pcent_dp3 : $this->pcent_dp3; 
              $this->pcent_dp3 = (string)$this->pcent_dp3; 
              $this->eval_4_per = (strpos(strtolower($this->eval_4_per), "e")) ? (float)$this->eval_4_per : $this->eval_4_per; 
              $this->eval_4_per = (string)$this->eval_4_per; 
              $this->dc1_p4 = (strpos(strtolower($this->dc1_p4), "e")) ? (float)$this->dc1_p4 : $this->dc1_p4; 
              $this->dc1_p4 = (string)$this->dc1_p4; 
              $this->dc2_p4 = (strpos(strtolower($this->dc2_p4), "e")) ? (float)$this->dc2_p4 : $this->dc2_p4; 
              $this->dc2_p4 = (string)$this->dc2_p4; 
              $this->dc3_p4 = (strpos(strtolower($this->dc3_p4), "e")) ? (float)$this->dc3_p4 : $this->dc3_p4; 
              $this->dc3_p4 = (string)$this->dc3_p4; 
              $this->dc4_p4 = (strpos(strtolower($this->dc4_p4), "e")) ? (float)$this->dc4_p4 : $this->dc4_p4; 
              $this->dc4_p4 = (string)$this->dc4_p4; 
              $this->dc5_p4 = (strpos(strtolower($this->dc5_p4), "e")) ? (float)$this->dc5_p4 : $this->dc5_p4; 
              $this->dc5_p4 = (string)$this->dc5_p4; 
              $this->pcent_dc4 = (strpos(strtolower($this->pcent_dc4), "e")) ? (float)$this->pcent_dc4 : $this->pcent_dc4; 
              $this->pcent_dc4 = (string)$this->pcent_dc4; 
              $this->ds1_p4 = (strpos(strtolower($this->ds1_p4), "e")) ? (float)$this->ds1_p4 : $this->ds1_p4; 
              $this->ds1_p4 = (string)$this->ds1_p4; 
              $this->ds2_p4 = (strpos(strtolower($this->ds2_p4), "e")) ? (float)$this->ds2_p4 : $this->ds2_p4; 
              $this->ds2_p4 = (string)$this->ds2_p4; 
              $this->ds3_p4 = (strpos(strtolower($this->ds3_p4), "e")) ? (float)$this->ds3_p4 : $this->ds3_p4; 
              $this->ds3_p4 = (string)$this->ds3_p4; 
              $this->ds4_p4 = (strpos(strtolower($this->ds4_p4), "e")) ? (float)$this->ds4_p4 : $this->ds4_p4; 
              $this->ds4_p4 = (string)$this->ds4_p4; 
              $this->ds5_p4 = (strpos(strtolower($this->ds5_p4), "e")) ? (float)$this->ds5_p4 : $this->ds5_p4; 
              $this->ds5_p4 = (string)$this->ds5_p4; 
              $this->pcent_ds4 = (strpos(strtolower($this->pcent_ds4), "e")) ? (float)$this->pcent_ds4 : $this->pcent_ds4; 
              $this->pcent_ds4 = (string)$this->pcent_ds4; 
              $this->dp1_p4 = (strpos(strtolower($this->dp1_p4), "e")) ? (float)$this->dp1_p4 : $this->dp1_p4; 
              $this->dp1_p4 = (string)$this->dp1_p4; 
              $this->dp2_p4 = (strpos(strtolower($this->dp2_p4), "e")) ? (float)$this->dp2_p4 : $this->dp2_p4; 
              $this->dp2_p4 = (string)$this->dp2_p4; 
              $this->dp3_p4 = (strpos(strtolower($this->dp3_p4), "e")) ? (float)$this->dp3_p4 : $this->dp3_p4; 
              $this->dp3_p4 = (string)$this->dp3_p4; 
              $this->dp4_p4 = (strpos(strtolower($this->dp4_p4), "e")) ? (float)$this->dp4_p4 : $this->dp4_p4; 
              $this->dp4_p4 = (string)$this->dp4_p4; 
              $this->dp5_p4 = (strpos(strtolower($this->dp5_p4), "e")) ? (float)$this->dp5_p4 : $this->dp5_p4; 
              $this->dp5_p4 = (string)$this->dp5_p4; 
              $this->pcent_dp4 = (strpos(strtolower($this->pcent_dp4), "e")) ? (float)$this->pcent_dp4 : $this->pcent_dp4; 
              $this->pcent_dp4 = (string)$this->pcent_dp4; 
              $this->eval_final = (strpos(strtolower($this->eval_final), "e")) ? (float)$this->eval_final : $this->eval_final; 
              $this->eval_final = (string)$this->eval_final; 
              $this->entorno = (string)$this->entorno; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['parms'] = "id_estudiante?#?$this->id_estudiante?@?id_grupo?#?$this->id_grupo?@?id_asignatura?#?$this->id_asignatura?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] < $qt_geral_reg_form_evalua_actividad_dc4;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->id_estudiante = "";  
              $this->primer_apellido = "";  
              $this->segundo_apellido = "";  
              $this->primer_nombre = "";  
              $this->segundo_nombre = "";  
              $this->id_grupo = "";  
              $this->id_area = "";  
              $this->id_asignatura = "";  
              $this->id_grado = "";  
              $this->id_nivel = "";  
              $this->ihs = "";  
              $this->pfa = "";  
              $this->tipo_asig = "";  
              $this->novedad = "";  
              $this->estatus = "";  
              $this->eval_1_per = "";  
              $this->dc1 = "";  
              $this->dc2 = "";  
              $this->dc3 = "";  
              $this->dc4 = "";  
              $this->dc5 = "";  
              $this->pcent_dc = "";  
              $this->ds1 = "";  
              $this->ds2 = "";  
              $this->ds3 = "";  
              $this->ds4 = "";  
              $this->ds5 = "";  
              $this->pcent_ds = "";  
              $this->dp1 = "";  
              $this->dp2 = "";  
              $this->dp3 = "";  
              $this->dp4 = "";  
              $this->dp5 = "";  
              $this->pcent_dp = "";  
              $this->eval_2_per = "";  
              $this->dc1_2p = "";  
              $this->dc2_2p = "";  
              $this->dc3_2p = "";  
              $this->dc4_2p = "";  
              $this->dc5_2p = "";  
              $this->pcent_dc2 = "";  
              $this->ds1_2p = "";  
              $this->ds2_2p = "";  
              $this->ds3_2p = "";  
              $this->ds4_2p = "";  
              $this->ds5_2p = "";  
              $this->pcent_ds2 = "";  
              $this->dp1_2p = "";  
              $this->dp2_2p = "";  
              $this->dp3_2p = "";  
              $this->dp4_2p = "";  
              $this->dp5_2p = "";  
              $this->pcent_dp2 = "";  
              $this->eval_3_per = "";  
              $this->dc1_3p = "";  
              $this->dc2_3p = "";  
              $this->dc3_3p = "";  
              $this->dc4_3p = "";  
              $this->dc5_3p = "";  
              $this->pcent_dc3 = "";  
              $this->ds1_p3 = "";  
              $this->ds2_p3 = "";  
              $this->ds3_p3 = "";  
              $this->ds4_p3 = "";  
              $this->ds5_p3 = "";  
              $this->pcent_ds3 = "";  
              $this->dp1_p3 = "";  
              $this->dp2_p3 = "";  
              $this->dp3_p3 = "";  
              $this->dp4_p3 = "";  
              $this->sc_field_0 = "";  
              $this->pcent_dp3 = "";  
              $this->eval_4_per = "";  
              $this->dc1_p4 = "";  
              $this->dc2_p4 = "";  
              $this->dc3_p4 = "";  
              $this->dc4_p4 = "";  
              $this->dc5_p4 = "";  
              $this->pcent_dc4 = "";  
              $this->ds1_p4 = "";  
              $this->ds2_p4 = "";  
              $this->ds3_p4 = "";  
              $this->ds4_p4 = "";  
              $this->ds5_p4 = "";  
              $this->pcent_ds4 = "";  
              $this->dp1_p4 = "";  
              $this->dp2_p4 = "";  
              $this->dp3_p4 = "";  
              $this->dp4_p4 = "";  
              $this->dp5_p4 = "";  
              $this->pcent_dp4 = "";  
              $this->eval_final = "";  
              $this->entorno = "";  
              $this->actividades = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      $this->nm_proc_onload();
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad']['embutida_parms'] = "NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['reg_start'] + 1;
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_evalua_actividad_dc4_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("form_evalua_actividad_dc4_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_evalua_actividad_dc4_pack_ajax_response();
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
          $data_lookup = $this->SC_lookup_id_estudiante($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "id_estudiante", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "primer_apellido", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "segundo_apellido", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "primer_nombre", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "segundo_nombre", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id_grupo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id_area", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id_asignatura", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id_grado", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id_nivel", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ihs", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pfa", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tipo_asig", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "novedad", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "estatus", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "ds4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds5", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_ds", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "dp4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp5", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_dp", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "eval_2_per", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc1_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc2_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc3_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc4_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc5_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_dc2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds1_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds2_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds3_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds4_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds5_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_ds2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp1_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp2_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp3_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp4_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp5_2p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_dp2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "eval_3_per", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc1_3p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc2_3p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc3_3p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc4_3p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc5_3p", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_dc3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds1_p3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds2_p3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds3_p3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds4_p3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds5_p3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_ds3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp1_p3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp2_p3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp3_p3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp4_p3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`dp5-p3`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_dp3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "eval_4_per", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc1_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc2_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc3_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc4_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc5_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_dc4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds1_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds2_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds3_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds4_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ds5_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_ds4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp1_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp2_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp3_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp4_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dp5_p4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pcent_dp4", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "eval_final", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "entorno", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_estudiante($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "id_estudiante", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "dc4", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter_form'] . " and (id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura = " . $_SESSION['par_idasignatura'] . " AND id_estudiante = " . $_SESSION['par_idestudiante'] . " AND entorno = " . $_SESSION['entorno'] . ") and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where id_grupo = " . $_SESSION['par_idgrupo'] . " AND id_asignatura = " . $_SESSION['par_idasignatura'] . " AND id_estudiante = " . $_SESSION['par_idestudiante'] . " AND entorno = " . $_SESSION['entorno'] . " and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_evalua_actividad_dc4 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['total'] = $qt_geral_reg_form_evalua_actividad_dc4;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_evalua_actividad_dc4_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_evalua_actividad_dc4_pack_ajax_response();
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
      $nm_numeric[] = "id_estudiante";$nm_numeric[] = "id_grupo";$nm_numeric[] = "id_area";$nm_numeric[] = "id_asignatura";$nm_numeric[] = "id_grado";$nm_numeric[] = "id_nivel";$nm_numeric[] = "ihs";$nm_numeric[] = "pfa";$nm_numeric[] = "eval_1_per";$nm_numeric[] = "dc1";$nm_numeric[] = "dc2";$nm_numeric[] = "dc3";$nm_numeric[] = "dc4";$nm_numeric[] = "dc5";$nm_numeric[] = "pcent_dc";$nm_numeric[] = "ds1";$nm_numeric[] = "ds2";$nm_numeric[] = "ds3";$nm_numeric[] = "ds4";$nm_numeric[] = "ds5";$nm_numeric[] = "pcent_ds";$nm_numeric[] = "dp1";$nm_numeric[] = "dp2";$nm_numeric[] = "dp3";$nm_numeric[] = "dp4";$nm_numeric[] = "dp5";$nm_numeric[] = "pcent_dp";$nm_numeric[] = "eval_2_per";$nm_numeric[] = "dc1_2p";$nm_numeric[] = "dc2_2p";$nm_numeric[] = "dc3_2p";$nm_numeric[] = "dc4_2p";$nm_numeric[] = "dc5_2p";$nm_numeric[] = "pcent_dc2";$nm_numeric[] = "ds1_2p";$nm_numeric[] = "ds2_2p";$nm_numeric[] = "ds3_2p";$nm_numeric[] = "ds4_2p";$nm_numeric[] = "ds5_2p";$nm_numeric[] = "pcent_ds2";$nm_numeric[] = "dp1_2p";$nm_numeric[] = "dp2_2p";$nm_numeric[] = "dp3_2p";$nm_numeric[] = "dp4_2p";$nm_numeric[] = "dp5_2p";$nm_numeric[] = "pcent_dp2";$nm_numeric[] = "eval_3_per";$nm_numeric[] = "dc1_3p";$nm_numeric[] = "dc2_3p";$nm_numeric[] = "dc3_3p";$nm_numeric[] = "dc4_3p";$nm_numeric[] = "dc5_3p";$nm_numeric[] = "pcent_dc3";$nm_numeric[] = "ds1_p3";$nm_numeric[] = "ds2_p3";$nm_numeric[] = "ds3_p3";$nm_numeric[] = "ds4_p3";$nm_numeric[] = "ds5_p3";$nm_numeric[] = "pcent_ds3";$nm_numeric[] = "dp1_p3";$nm_numeric[] = "dp2_p3";$nm_numeric[] = "dp3_p3";$nm_numeric[] = "dp4_p3";$nm_numeric[] = "`dp5-p3`";$nm_numeric[] = "pcent_dp3";$nm_numeric[] = "eval_4_per";$nm_numeric[] = "dc1_p4";$nm_numeric[] = "dc2_p4";$nm_numeric[] = "dc3_p4";$nm_numeric[] = "dc4_p4";$nm_numeric[] = "dc5_p4";$nm_numeric[] = "pcent_dc4";$nm_numeric[] = "ds1_p4";$nm_numeric[] = "ds2_p4";$nm_numeric[] = "ds3_p4";$nm_numeric[] = "ds4_p4";$nm_numeric[] = "ds5_p4";$nm_numeric[] = "pcent_ds4";$nm_numeric[] = "dp1_p4";$nm_numeric[] = "dp2_p4";$nm_numeric[] = "dp3_p4";$nm_numeric[] = "dp4_p4";$nm_numeric[] = "dp5_p4";$nm_numeric[] = "pcent_dp4";$nm_numeric[] = "eval_final";$nm_numeric[] = "entorno";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['decimal_db'] == ".")
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
   function SC_lookup_id_estudiante($condicao, $campo)
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_evalua_actividad_dc4_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_evalua_actividad_dc4_fim.php";
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
       form_evalua_actividad_dc4_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_evalua_actividad_dc4']['masterValue']);
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
