<?php
//
class control_list_estudiantes_mob_apl
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
   var $estatus;
   var $estatus_1;
   var $semestre;
   var $semestre_1;
   var $fecha_matricula;
   var $fecha_matricula_1;
   var $tipo_identificacion;
   var $tipo_identificacion_1;
   var $numero_documento;
   var $numero_documento_1;
   var $genero;
   var $genero_1;
   var $fecha_nacimiento;
   var $fecha_nacimiento_1;
   var $anos_cumplidos;
   var $anos_cumplidos_1;
   var $telefono;
   var $telefono_1;
   var $etnia;
   var $etnia_1;
   var $emai;
   var $emai_1;
   var $zona;
   var $zona_1;
   var $celdas_vacias;
   var $celdas_vacias_1;
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
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['anos_cumplidos']))
          {
              $this->anos_cumplidos = $this->NM_ajax_info['param']['anos_cumplidos'];
          }
          if (isset($this->NM_ajax_info['param']['celdas_vacias']))
          {
              $this->celdas_vacias = $this->NM_ajax_info['param']['celdas_vacias'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['emai']))
          {
              $this->emai = $this->NM_ajax_info['param']['emai'];
          }
          if (isset($this->NM_ajax_info['param']['estatus']))
          {
              $this->estatus = $this->NM_ajax_info['param']['estatus'];
          }
          if (isset($this->NM_ajax_info['param']['etnia']))
          {
              $this->etnia = $this->NM_ajax_info['param']['etnia'];
          }
          if (isset($this->NM_ajax_info['param']['fecha_matricula']))
          {
              $this->fecha_matricula = $this->NM_ajax_info['param']['fecha_matricula'];
          }
          if (isset($this->NM_ajax_info['param']['fecha_nacimiento']))
          {
              $this->fecha_nacimiento = $this->NM_ajax_info['param']['fecha_nacimiento'];
          }
          if (isset($this->NM_ajax_info['param']['genero']))
          {
              $this->genero = $this->NM_ajax_info['param']['genero'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['numero_documento']))
          {
              $this->numero_documento = $this->NM_ajax_info['param']['numero_documento'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['semestre']))
          {
              $this->semestre = $this->NM_ajax_info['param']['semestre'];
          }
          if (isset($this->NM_ajax_info['param']['telefono']))
          {
              $this->telefono = $this->NM_ajax_info['param']['telefono'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_identificacion']))
          {
              $this->tipo_identificacion = $this->NM_ajax_info['param']['tipo_identificacion'];
          }
          if (isset($this->NM_ajax_info['param']['zona']))
          {
              $this->zona = $this->NM_ajax_info['param']['zona'];
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
      if (isset($this->par_estatus) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_estatus'] = $this->par_estatus;
      }
      if (isset($this->par_semestre) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_semestre'] = $this->par_semestre;
      }
      if (isset($this->par_fecha_matricula) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_fecha_matricula'] = $this->par_fecha_matricula;
      }
      if (isset($this->par_tipo_identificacion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_tipo_identificacion'] = $this->par_tipo_identificacion;
      }
      if (isset($this->par_numero_documento) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_numero_documento'] = $this->par_numero_documento;
      }
      if (isset($this->par_genero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_genero'] = $this->par_genero;
      }
      if (isset($this->par_fecha_nacimiento) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_fecha_nacimiento'] = $this->par_fecha_nacimiento;
      }
      if (isset($this->par_anos_cuplidos) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_anos_cuplidos'] = $this->par_anos_cuplidos;
      }
      if (isset($this->par_telefono) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_telefono'] = $this->par_telefono;
      }
      if (isset($this->par_etnia) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_etnia'] = $this->par_etnia;
      }
      if (isset($this->par_email) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_email'] = $this->par_email;
      }
      if (isset($this->par_zona) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_zona'] = $this->par_zona;
      }
      if (isset($this->par_num_celdas) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_num_celdas'] = $this->par_num_celdas;
      }
      if (isset($_POST["par_estatus"])) 
      {
          $_SESSION['par_estatus'] = $this->par_estatus;
      }
      if (isset($_POST["par_semestre"])) 
      {
          $_SESSION['par_semestre'] = $this->par_semestre;
      }
      if (isset($_POST["par_fecha_matricula"])) 
      {
          $_SESSION['par_fecha_matricula'] = $this->par_fecha_matricula;
      }
      if (isset($_POST["par_tipo_identificacion"])) 
      {
          $_SESSION['par_tipo_identificacion'] = $this->par_tipo_identificacion;
      }
      if (isset($_POST["par_numero_documento"])) 
      {
          $_SESSION['par_numero_documento'] = $this->par_numero_documento;
      }
      if (isset($_POST["par_genero"])) 
      {
          $_SESSION['par_genero'] = $this->par_genero;
      }
      if (isset($_POST["par_fecha_nacimiento"])) 
      {
          $_SESSION['par_fecha_nacimiento'] = $this->par_fecha_nacimiento;
      }
      if (isset($_POST["par_anos_cuplidos"])) 
      {
          $_SESSION['par_anos_cuplidos'] = $this->par_anos_cuplidos;
      }
      if (isset($_POST["par_telefono"])) 
      {
          $_SESSION['par_telefono'] = $this->par_telefono;
      }
      if (isset($_POST["par_etnia"])) 
      {
          $_SESSION['par_etnia'] = $this->par_etnia;
      }
      if (isset($_POST["par_email"])) 
      {
          $_SESSION['par_email'] = $this->par_email;
      }
      if (isset($_POST["par_zona"])) 
      {
          $_SESSION['par_zona'] = $this->par_zona;
      }
      if (isset($_POST["par_num_celdas"])) 
      {
          $_SESSION['par_num_celdas'] = $this->par_num_celdas;
      }
      if (isset($_GET["par_estatus"])) 
      {
          $_SESSION['par_estatus'] = $this->par_estatus;
      }
      if (isset($_GET["par_semestre"])) 
      {
          $_SESSION['par_semestre'] = $this->par_semestre;
      }
      if (isset($_GET["par_fecha_matricula"])) 
      {
          $_SESSION['par_fecha_matricula'] = $this->par_fecha_matricula;
      }
      if (isset($_GET["par_tipo_identificacion"])) 
      {
          $_SESSION['par_tipo_identificacion'] = $this->par_tipo_identificacion;
      }
      if (isset($_GET["par_numero_documento"])) 
      {
          $_SESSION['par_numero_documento'] = $this->par_numero_documento;
      }
      if (isset($_GET["par_genero"])) 
      {
          $_SESSION['par_genero'] = $this->par_genero;
      }
      if (isset($_GET["par_fecha_nacimiento"])) 
      {
          $_SESSION['par_fecha_nacimiento'] = $this->par_fecha_nacimiento;
      }
      if (isset($_GET["par_anos_cuplidos"])) 
      {
          $_SESSION['par_anos_cuplidos'] = $this->par_anos_cuplidos;
      }
      if (isset($_GET["par_telefono"])) 
      {
          $_SESSION['par_telefono'] = $this->par_telefono;
      }
      if (isset($_GET["par_etnia"])) 
      {
          $_SESSION['par_etnia'] = $this->par_etnia;
      }
      if (isset($_GET["par_email"])) 
      {
          $_SESSION['par_email'] = $this->par_email;
      }
      if (isset($_GET["par_zona"])) 
      {
          $_SESSION['par_zona'] = $this->par_zona;
      }
      if (isset($_GET["par_num_celdas"])) 
      {
          $_SESSION['par_num_celdas'] = $this->par_num_celdas;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['control_list_estudiantes']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['control_list_estudiantes']['embutida_parms']);
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
                 nm_limpa_str_control_list_estudiantes_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->par_estatus)) 
          {
              $_SESSION['par_estatus'] = $this->par_estatus;
          }
          if (isset($this->par_semestre)) 
          {
              $_SESSION['par_semestre'] = $this->par_semestre;
          }
          if (isset($this->par_fecha_matricula)) 
          {
              $_SESSION['par_fecha_matricula'] = $this->par_fecha_matricula;
          }
          if (isset($this->par_tipo_identificacion)) 
          {
              $_SESSION['par_tipo_identificacion'] = $this->par_tipo_identificacion;
          }
          if (isset($this->par_numero_documento)) 
          {
              $_SESSION['par_numero_documento'] = $this->par_numero_documento;
          }
          if (isset($this->par_genero)) 
          {
              $_SESSION['par_genero'] = $this->par_genero;
          }
          if (isset($this->par_fecha_nacimiento)) 
          {
              $_SESSION['par_fecha_nacimiento'] = $this->par_fecha_nacimiento;
          }
          if (isset($this->par_anos_cuplidos)) 
          {
              $_SESSION['par_anos_cuplidos'] = $this->par_anos_cuplidos;
          }
          if (isset($this->par_telefono)) 
          {
              $_SESSION['par_telefono'] = $this->par_telefono;
          }
          if (isset($this->par_etnia)) 
          {
              $_SESSION['par_etnia'] = $this->par_etnia;
          }
          if (isset($this->par_email)) 
          {
              $_SESSION['par_email'] = $this->par_email;
          }
          if (isset($this->par_zona)) 
          {
              $_SESSION['par_zona'] = $this->par_zona;
          }
          if (isset($this->par_num_celdas)) 
          {
              $_SESSION['par_num_celdas'] = $this->par_num_celdas;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->par_estatus)) 
          {
              $_SESSION['par_estatus'] = $this->par_estatus;
          }
          if (isset($this->par_semestre)) 
          {
              $_SESSION['par_semestre'] = $this->par_semestre;
          }
          if (isset($this->par_fecha_matricula)) 
          {
              $_SESSION['par_fecha_matricula'] = $this->par_fecha_matricula;
          }
          if (isset($this->par_tipo_identificacion)) 
          {
              $_SESSION['par_tipo_identificacion'] = $this->par_tipo_identificacion;
          }
          if (isset($this->par_numero_documento)) 
          {
              $_SESSION['par_numero_documento'] = $this->par_numero_documento;
          }
          if (isset($this->par_genero)) 
          {
              $_SESSION['par_genero'] = $this->par_genero;
          }
          if (isset($this->par_fecha_nacimiento)) 
          {
              $_SESSION['par_fecha_nacimiento'] = $this->par_fecha_nacimiento;
          }
          if (isset($this->par_anos_cuplidos)) 
          {
              $_SESSION['par_anos_cuplidos'] = $this->par_anos_cuplidos;
          }
          if (isset($this->par_telefono)) 
          {
              $_SESSION['par_telefono'] = $this->par_telefono;
          }
          if (isset($this->par_etnia)) 
          {
              $_SESSION['par_etnia'] = $this->par_etnia;
          }
          if (isset($this->par_email)) 
          {
              $_SESSION['par_email'] = $this->par_email;
          }
          if (isset($this->par_zona)) 
          {
              $_SESSION['par_zona'] = $this->par_zona;
          }
          if (isset($this->par_num_celdas)) 
          {
              $_SESSION['par_num_celdas'] = $this->par_num_celdas;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new control_list_estudiantes_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['control_list_estudiantes_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_list_estudiantes_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_list_estudiantes_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_list_estudiantes_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_list_estudiantes_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('control_list_estudiantes_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_list_estudiantes_mob']['label'] = "Escoja los Campos a Imprimir";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "control_list_estudiantes_mob")
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



      $_SESSION['scriptcase']['error_icon']['control_list_estudiantes_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['control_list_estudiantes_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_list_estudiantes_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("control_list_estudiantes_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'control_list_estudiantes_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'control_list_estudiantes_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
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
          require_once($this->Ini->path_embutida . 'control_list_estudiantes/control_list_estudiantes_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "control_list_estudiantes_mob_erro.class.php"); 
      }
      $this->Erro      = new control_list_estudiantes_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['control_list_estudiantes_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


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
          if ('validate_estatus' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatus');
          }
          if ('validate_semestre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'semestre');
          }
          if ('validate_fecha_matricula' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha_matricula');
          }
          if ('validate_tipo_identificacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_identificacion');
          }
          if ('validate_numero_documento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_documento');
          }
          if ('validate_genero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'genero');
          }
          if ('validate_fecha_nacimiento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha_nacimiento');
          }
          if ('validate_anos_cumplidos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anos_cumplidos');
          }
          if ('validate_telefono' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'telefono');
          }
          if ('validate_etnia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'etnia');
          }
          if ('validate_emai' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'emai');
          }
          if ('validate_zona' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zona');
          }
          if ('validate_celdas_vacias' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'celdas_vacias');
          }
          control_list_estudiantes_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->estatus))
          {
              $x = 0; 
              $this->estatus_1 = $this->estatus;
              $this->estatus = ""; 
              if ($this->estatus_1 != "") 
              { 
                  foreach ($this->estatus_1 as $dados_estatus_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->estatus .= ";";
                      } 
                      $this->estatus .= $dados_estatus_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->semestre))
          {
              $x = 0; 
              $this->semestre_1 = $this->semestre;
              $this->semestre = ""; 
              if ($this->semestre_1 != "") 
              { 
                  foreach ($this->semestre_1 as $dados_semestre_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->semestre .= ";";
                      } 
                      $this->semestre .= $dados_semestre_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fecha_matricula))
          {
              $x = 0; 
              $this->fecha_matricula_1 = $this->fecha_matricula;
              $this->fecha_matricula = ""; 
              if ($this->fecha_matricula_1 != "") 
              { 
                  foreach ($this->fecha_matricula_1 as $dados_fecha_matricula_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fecha_matricula .= ";";
                      } 
                      $this->fecha_matricula .= $dados_fecha_matricula_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->tipo_identificacion))
          {
              $x = 0; 
              $this->tipo_identificacion_1 = $this->tipo_identificacion;
              $this->tipo_identificacion = ""; 
              if ($this->tipo_identificacion_1 != "") 
              { 
                  foreach ($this->tipo_identificacion_1 as $dados_tipo_identificacion_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->tipo_identificacion .= ";";
                      } 
                      $this->tipo_identificacion .= $dados_tipo_identificacion_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->numero_documento))
          {
              $x = 0; 
              $this->numero_documento_1 = $this->numero_documento;
              $this->numero_documento = ""; 
              if ($this->numero_documento_1 != "") 
              { 
                  foreach ($this->numero_documento_1 as $dados_numero_documento_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->numero_documento .= ";";
                      } 
                      $this->numero_documento .= $dados_numero_documento_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->genero))
          {
              $x = 0; 
              $this->genero_1 = $this->genero;
              $this->genero = ""; 
              if ($this->genero_1 != "") 
              { 
                  foreach ($this->genero_1 as $dados_genero_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->genero .= ";";
                      } 
                      $this->genero .= $dados_genero_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fecha_nacimiento))
          {
              $x = 0; 
              $this->fecha_nacimiento_1 = $this->fecha_nacimiento;
              $this->fecha_nacimiento = ""; 
              if ($this->fecha_nacimiento_1 != "") 
              { 
                  foreach ($this->fecha_nacimiento_1 as $dados_fecha_nacimiento_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fecha_nacimiento .= ";";
                      } 
                      $this->fecha_nacimiento .= $dados_fecha_nacimiento_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->anos_cumplidos))
          {
              $x = 0; 
              $this->anos_cumplidos_1 = $this->anos_cumplidos;
              $this->anos_cumplidos = ""; 
              if ($this->anos_cumplidos_1 != "") 
              { 
                  foreach ($this->anos_cumplidos_1 as $dados_anos_cumplidos_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->anos_cumplidos .= ";";
                      } 
                      $this->anos_cumplidos .= $dados_anos_cumplidos_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->telefono))
          {
              $x = 0; 
              $this->telefono_1 = $this->telefono;
              $this->telefono = ""; 
              if ($this->telefono_1 != "") 
              { 
                  foreach ($this->telefono_1 as $dados_telefono_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->telefono .= ";";
                      } 
                      $this->telefono .= $dados_telefono_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->etnia))
          {
              $x = 0; 
              $this->etnia_1 = $this->etnia;
              $this->etnia = ""; 
              if ($this->etnia_1 != "") 
              { 
                  foreach ($this->etnia_1 as $dados_etnia_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->etnia .= ";";
                      } 
                      $this->etnia .= $dados_etnia_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->emai))
          {
              $x = 0; 
              $this->emai_1 = $this->emai;
              $this->emai = ""; 
              if ($this->emai_1 != "") 
              { 
                  foreach ($this->emai_1 as $dados_emai_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->emai .= ";";
                      } 
                      $this->emai .= $dados_emai_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->zona))
          {
              $x = 0; 
              $this->zona_1 = $this->zona;
              $this->zona = ""; 
              if ($this->zona_1 != "") 
              { 
                  foreach ($this->zona_1 as $dados_zona_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->zona .= ";";
                      } 
                      $this->zona .= $dados_zona_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              control_list_estudiantes_mob_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['control_list_estudiantes_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_list_estudiantes_mob_pack_ajax_response();
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['control_list_estudiantes_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_list_estudiantes_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->estatus = "" ;  
          $this->semestre = "" ;  
          $this->fecha_matricula = "" ;  
          $this->tipo_identificacion = "" ;  
          $this->numero_documento = "" ;  
          $this->genero = "" ;  
          $this->fecha_nacimiento = "" ;  
          $this->anos_cumplidos = "" ;  
          $this->telefono = "" ;  
          $this->etnia = "" ;  
          $this->emai = "" ;  
          $this->zona = "" ;  
          $this->celdas_vacias = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          control_list_estudiantes_mob_pack_ajax_response();
          exit;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos']))
              { 
                  $estatus = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][0]; 
                  $semestre = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][1]; 
                  $fecha_matricula = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][2]; 
                  $tipo_identificacion = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][3]; 
                  $numero_documento = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][4]; 
                  $genero = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][5]; 
                  $fecha_nacimiento = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][6]; 
                  $anos_cumplidos = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][7]; 
                  $telefono = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][8]; 
                  $etnia = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][9]; 
                  $emai = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][10]; 
                  $zona = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][11]; 
                  $celdas_vacias = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][12]; 
              } 
          }
          $this->nm_gera_html();
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][0] = $this->estatus; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][1] = $this->semestre; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][2] = $this->fecha_matricula; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][3] = $this->tipo_identificacion; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][4] = $this->numero_documento; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][5] = $this->genero; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][6] = $this->fecha_nacimiento; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][7] = $this->anos_cumplidos; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][8] = $this->telefono; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][9] = $this->etnia; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][10] = $this->emai; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][11] = $this->zona; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['campos'][12] = $this->celdas_vacias; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("control_list_estudiantes_mob", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->nmgp_redireciona_form("control_list_estudiantes_mob_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
              }
          }
      }
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
           case 'estatus':
               return "";
               break;
           case 'semestre':
               return "";
               break;
           case 'fecha_matricula':
               return "";
               break;
           case 'tipo_identificacion':
               return "";
               break;
           case 'numero_documento':
               return "";
               break;
           case 'genero':
               return "";
               break;
           case 'fecha_nacimiento':
               return "";
               break;
           case 'anos_cumplidos':
               return "";
               break;
           case 'telefono':
               return "";
               break;
           case 'etnia':
               return "";
               break;
           case 'emai':
               return "";
               break;
           case 'zona':
               return "";
               break;
           case 'celdas_vacias':
               return "Número de Celdas Vacías a la Derecha";
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
              if (!isset($this->NM_ajax_info['errList']['geral_control_list_estudiantes_mob']) || !is_array($this->NM_ajax_info['errList']['geral_control_list_estudiantes_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_control_list_estudiantes_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_control_list_estudiantes_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'estatus' == $filtro)
        $this->ValidateField_estatus($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'semestre' == $filtro)
        $this->ValidateField_semestre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fecha_matricula' == $filtro)
        $this->ValidateField_fecha_matricula($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_identificacion' == $filtro)
        $this->ValidateField_tipo_identificacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'numero_documento' == $filtro)
        $this->ValidateField_numero_documento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'genero' == $filtro)
        $this->ValidateField_genero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fecha_nacimiento' == $filtro)
        $this->ValidateField_fecha_nacimiento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'anos_cumplidos' == $filtro)
        $this->ValidateField_anos_cumplidos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'telefono' == $filtro)
        $this->ValidateField_telefono($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'etnia' == $filtro)
        $this->ValidateField_etnia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'emai' == $filtro)
        $this->ValidateField_emai($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'zona' == $filtro)
        $this->ValidateField_zona($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'celdas_vacias' == $filtro)
        $this->ValidateField_celdas_vacias($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

      if (empty($Campos_Crit) && empty($Campos_Falta) && empty($this->Campos_Mens_erro))
      {
          if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
          {
              $_SESSION['scriptcase']['control_list_estudiantes_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_anos_cumplidos = $this->anos_cumplidos;
    $original_celdas_vacias = $this->celdas_vacias;
    $original_emai = $this->emai;
    $original_estatus = $this->estatus;
    $original_etnia = $this->etnia;
    $original_fecha_matricula = $this->fecha_matricula;
    $original_fecha_nacimiento = $this->fecha_nacimiento;
    $original_genero = $this->genero;
    $original_numero_documento = $this->numero_documento;
    $original_semestre = $this->semestre;
    $original_telefono = $this->telefono;
    $original_tipo_identificacion = $this->tipo_identificacion;
    $original_zona = $this->zona;
}
if (!isset($this->sc_temp_par_num_celdas)) {$this->sc_temp_par_num_celdas = (isset($_SESSION['par_num_celdas'])) ? $_SESSION['par_num_celdas'] : "";}
if (!isset($this->sc_temp_par_zona)) {$this->sc_temp_par_zona = (isset($_SESSION['par_zona'])) ? $_SESSION['par_zona'] : "";}
if (!isset($this->sc_temp_par_email)) {$this->sc_temp_par_email = (isset($_SESSION['par_email'])) ? $_SESSION['par_email'] : "";}
if (!isset($this->sc_temp_par_etnia)) {$this->sc_temp_par_etnia = (isset($_SESSION['par_etnia'])) ? $_SESSION['par_etnia'] : "";}
if (!isset($this->sc_temp_par_telefono)) {$this->sc_temp_par_telefono = (isset($_SESSION['par_telefono'])) ? $_SESSION['par_telefono'] : "";}
if (!isset($this->sc_temp_par_anos_cuplidos)) {$this->sc_temp_par_anos_cuplidos = (isset($_SESSION['par_anos_cuplidos'])) ? $_SESSION['par_anos_cuplidos'] : "";}
if (!isset($this->sc_temp_par_fecha_nacimiento)) {$this->sc_temp_par_fecha_nacimiento = (isset($_SESSION['par_fecha_nacimiento'])) ? $_SESSION['par_fecha_nacimiento'] : "";}
if (!isset($this->sc_temp_par_genero)) {$this->sc_temp_par_genero = (isset($_SESSION['par_genero'])) ? $_SESSION['par_genero'] : "";}
if (!isset($this->sc_temp_par_numero_documento)) {$this->sc_temp_par_numero_documento = (isset($_SESSION['par_numero_documento'])) ? $_SESSION['par_numero_documento'] : "";}
if (!isset($this->sc_temp_par_tipo_identificacion)) {$this->sc_temp_par_tipo_identificacion = (isset($_SESSION['par_tipo_identificacion'])) ? $_SESSION['par_tipo_identificacion'] : "";}
if (!isset($this->sc_temp_par_fecha_matricula)) {$this->sc_temp_par_fecha_matricula = (isset($_SESSION['par_fecha_matricula'])) ? $_SESSION['par_fecha_matricula'] : "";}
if (!isset($this->sc_temp_par_semestre)) {$this->sc_temp_par_semestre = (isset($_SESSION['par_semestre'])) ? $_SESSION['par_semestre'] : "";}
if (!isset($this->sc_temp_par_estatus)) {$this->sc_temp_par_estatus = (isset($_SESSION['par_estatus'])) ? $_SESSION['par_estatus'] : "";}
if (!isset($this->sc_temp_global_0)) {$this->sc_temp_global_0 = (isset($_SESSION['par_estatus];[par_semestre]; [par_fecha_matricula]; [par_tipo_identificacion]; [par_numero_documento]; [par_genero]; [par_fecha_nacimiento]; [par_anos_cuplidos]; [par_telefono]; [par_etnia]; [par_email];  [par_zona]; [par_num_celdas'])) ? $_SESSION['par_estatus];[par_semestre]; [par_fecha_matricula]; [par_tipo_identificacion]; [par_numero_documento]; [par_genero]; [par_fecha_nacimiento]; [par_anos_cuplidos]; [par_telefono]; [par_etnia]; [par_email];  [par_zona]; [par_num_celdas'] : "";}
 if(empty($this->estatus )){
	$this->sc_temp_par_estatus = 2;
	}else{
$this->sc_temp_par_estatus=$this->estatus ;
	}
if(empty($this->semestre )){
$this->sc_temp_par_semestre = 2;	
	}else{
$this->sc_temp_par_semestre=$this->semestre ;
	}
if(empty($this->fecha_matricula )){
$this->sc_temp_par_fecha_matricula = 2;	
	}else{
$this->sc_temp_par_fecha_matricula=$this->fecha_matricula ;
	}
if(empty($this->tipo_identificacion )){
	$this->sc_temp_par_tipo_identificacion = 2;
	}else{
$this->sc_temp_par_tipo_identificacion=$this->tipo_identificacion ;
	}
if(empty($this->numero_documento )){
	$this->sc_temp_par_numero_documento = 2;
	}else{
$this->sc_temp_par_numero_documento=$this->numero_documento ;
	}
if(empty($this->genero )){
	$this->sc_temp_par_genero = 2;
	}else{
$this->sc_temp_par_genero=$this->genero ;
	}
if(empty($this->fecha_nacimiento )){
$this->sc_temp_par_fecha_nacimiento = 2;	
	}else{
$this->sc_temp_par_fecha_nacimiento=$this->fecha_nacimiento ;
	}
if(empty($this->anos_cumplidos )){
	$this->sc_temp_par_anos_cuplidos= 2;
	}else{
$this->sc_temp_par_anos_cuplidos=$this->anos_cumplidos ;
	}
if(empty($this->telefono )){
	$this->sc_temp_par_telefono = 2;
	}else{
$this->sc_temp_par_telefono=$this->telefono ;
	}
if(empty($this->etnia )){
	$this->sc_temp_par_etnia = 2;
	}else{
$this->sc_temp_par_etnia=$this->etnia ;
	}
if(empty($this->emai )){
	$this->sc_temp_par_email =2;
	}else{
$this->sc_temp_par_email=$this->emai ;
	}
if(empty($this->zona )){
$this->sc_temp_par_zona=2;	
	}else{
$this->sc_temp_par_zona=$this->zona ;
}
$this->sc_temp_par_num_celdas =$this->celdas_vacias ;

 if (isset($this->sc_temp_global_0)) { $_SESSION['par_estatus];[par_semestre]; [par_fecha_matricula]; [par_tipo_identificacion]; [par_numero_documento]; [par_genero]; [par_fecha_nacimiento]; [par_anos_cuplidos]; [par_telefono]; [par_etnia]; [par_email];  [par_zona]; [par_num_celdas'] = $this->sc_temp_global_0;}
 if (isset($this->sc_temp_par_estatus)) { $_SESSION['par_estatus'] = $this->sc_temp_par_estatus;}
 if (isset($this->sc_temp_par_semestre)) { $_SESSION['par_semestre'] = $this->sc_temp_par_semestre;}
 if (isset($this->sc_temp_par_fecha_matricula)) { $_SESSION['par_fecha_matricula'] = $this->sc_temp_par_fecha_matricula;}
 if (isset($this->sc_temp_par_tipo_identificacion)) { $_SESSION['par_tipo_identificacion'] = $this->sc_temp_par_tipo_identificacion;}
 if (isset($this->sc_temp_par_numero_documento)) { $_SESSION['par_numero_documento'] = $this->sc_temp_par_numero_documento;}
 if (isset($this->sc_temp_par_genero)) { $_SESSION['par_genero'] = $this->sc_temp_par_genero;}
 if (isset($this->sc_temp_par_fecha_nacimiento)) { $_SESSION['par_fecha_nacimiento'] = $this->sc_temp_par_fecha_nacimiento;}
 if (isset($this->sc_temp_par_anos_cuplidos)) { $_SESSION['par_anos_cuplidos'] = $this->sc_temp_par_anos_cuplidos;}
 if (isset($this->sc_temp_par_telefono)) { $_SESSION['par_telefono'] = $this->sc_temp_par_telefono;}
 if (isset($this->sc_temp_par_etnia)) { $_SESSION['par_etnia'] = $this->sc_temp_par_etnia;}
 if (isset($this->sc_temp_par_email)) { $_SESSION['par_email'] = $this->sc_temp_par_email;}
 if (isset($this->sc_temp_par_zona)) { $_SESSION['par_zona'] = $this->sc_temp_par_zona;}
 if (isset($this->sc_temp_par_num_celdas)) { $_SESSION['par_num_celdas'] = $this->sc_temp_par_num_celdas;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_t_grupos_4') . "/", $this->nm_location, $this->sc_temp_global_0, "_self", "ret_self", 440, 630);
 }
if (isset($this->sc_temp_global_0)) { $_SESSION['par_estatus];[par_semestre]; [par_fecha_matricula]; [par_tipo_identificacion]; [par_numero_documento]; [par_genero]; [par_fecha_nacimiento]; [par_anos_cuplidos]; [par_telefono]; [par_etnia]; [par_email];  [par_zona]; [par_num_celdas'] = $this->sc_temp_global_0;}
if (isset($this->sc_temp_par_estatus)) { $_SESSION['par_estatus'] = $this->sc_temp_par_estatus;}
if (isset($this->sc_temp_par_semestre)) { $_SESSION['par_semestre'] = $this->sc_temp_par_semestre;}
if (isset($this->sc_temp_par_fecha_matricula)) { $_SESSION['par_fecha_matricula'] = $this->sc_temp_par_fecha_matricula;}
if (isset($this->sc_temp_par_tipo_identificacion)) { $_SESSION['par_tipo_identificacion'] = $this->sc_temp_par_tipo_identificacion;}
if (isset($this->sc_temp_par_numero_documento)) { $_SESSION['par_numero_documento'] = $this->sc_temp_par_numero_documento;}
if (isset($this->sc_temp_par_genero)) { $_SESSION['par_genero'] = $this->sc_temp_par_genero;}
if (isset($this->sc_temp_par_fecha_nacimiento)) { $_SESSION['par_fecha_nacimiento'] = $this->sc_temp_par_fecha_nacimiento;}
if (isset($this->sc_temp_par_anos_cuplidos)) { $_SESSION['par_anos_cuplidos'] = $this->sc_temp_par_anos_cuplidos;}
if (isset($this->sc_temp_par_telefono)) { $_SESSION['par_telefono'] = $this->sc_temp_par_telefono;}
if (isset($this->sc_temp_par_etnia)) { $_SESSION['par_etnia'] = $this->sc_temp_par_etnia;}
if (isset($this->sc_temp_par_email)) { $_SESSION['par_email'] = $this->sc_temp_par_email;}
if (isset($this->sc_temp_par_zona)) { $_SESSION['par_zona'] = $this->sc_temp_par_zona;}
if (isset($this->sc_temp_par_num_celdas)) { $_SESSION['par_num_celdas'] = $this->sc_temp_par_num_celdas;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_anos_cumplidos != $this->anos_cumplidos || (isset($bFlagRead_anos_cumplidos) && $bFlagRead_anos_cumplidos)))
    {
        $this->ajax_return_values_anos_cumplidos(true);
    }
    if (($original_celdas_vacias != $this->celdas_vacias || (isset($bFlagRead_celdas_vacias) && $bFlagRead_celdas_vacias)))
    {
        $this->ajax_return_values_celdas_vacias(true);
    }
    if (($original_emai != $this->emai || (isset($bFlagRead_emai) && $bFlagRead_emai)))
    {
        $this->ajax_return_values_emai(true);
    }
    if (($original_estatus != $this->estatus || (isset($bFlagRead_estatus) && $bFlagRead_estatus)))
    {
        $this->ajax_return_values_estatus(true);
    }
    if (($original_etnia != $this->etnia || (isset($bFlagRead_etnia) && $bFlagRead_etnia)))
    {
        $this->ajax_return_values_etnia(true);
    }
    if (($original_fecha_matricula != $this->fecha_matricula || (isset($bFlagRead_fecha_matricula) && $bFlagRead_fecha_matricula)))
    {
        $this->ajax_return_values_fecha_matricula(true);
    }
    if (($original_fecha_nacimiento != $this->fecha_nacimiento || (isset($bFlagRead_fecha_nacimiento) && $bFlagRead_fecha_nacimiento)))
    {
        $this->ajax_return_values_fecha_nacimiento(true);
    }
    if (($original_genero != $this->genero || (isset($bFlagRead_genero) && $bFlagRead_genero)))
    {
        $this->ajax_return_values_genero(true);
    }
    if (($original_numero_documento != $this->numero_documento || (isset($bFlagRead_numero_documento) && $bFlagRead_numero_documento)))
    {
        $this->ajax_return_values_numero_documento(true);
    }
    if (($original_semestre != $this->semestre || (isset($bFlagRead_semestre) && $bFlagRead_semestre)))
    {
        $this->ajax_return_values_semestre(true);
    }
    if (($original_telefono != $this->telefono || (isset($bFlagRead_telefono) && $bFlagRead_telefono)))
    {
        $this->ajax_return_values_telefono(true);
    }
    if (($original_tipo_identificacion != $this->tipo_identificacion || (isset($bFlagRead_tipo_identificacion) && $bFlagRead_tipo_identificacion)))
    {
        $this->ajax_return_values_tipo_identificacion(true);
    }
    if (($original_zona != $this->zona || (isset($bFlagRead_zona) && $bFlagRead_zona)))
    {
        $this->ajax_return_values_zona(true);
    }
}
$_SESSION['scriptcase']['control_list_estudiantes_mob']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_estatus(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->estatus == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->estatus))
          {
              $x = 0; 
              $this->estatus_1 = array(); 
              foreach ($this->estatus as $ind => $dados_estatus_1 ) 
              {
                  if ($dados_estatus_1 !== "") 
                  {
                      $this->estatus_1[] = $dados_estatus_1;
                  } 
              } 
              $this->estatus = ""; 
              foreach ($this->estatus_1 as $dados_estatus_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->estatus .= ";";
                   } 
                   $this->estatus .= $dados_estatus_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_estatus

    function ValidateField_semestre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->semestre == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->semestre))
          {
              $x = 0; 
              $this->semestre_1 = array(); 
              foreach ($this->semestre as $ind => $dados_semestre_1 ) 
              {
                  if ($dados_semestre_1 !== "") 
                  {
                      $this->semestre_1[] = $dados_semestre_1;
                  } 
              } 
              $this->semestre = ""; 
              foreach ($this->semestre_1 as $dados_semestre_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->semestre .= ";";
                   } 
                   $this->semestre .= $dados_semestre_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_semestre

    function ValidateField_fecha_matricula(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->fecha_matricula == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fecha_matricula))
          {
              $x = 0; 
              $this->fecha_matricula_1 = array(); 
              foreach ($this->fecha_matricula as $ind => $dados_fecha_matricula_1 ) 
              {
                  if ($dados_fecha_matricula_1 !== "") 
                  {
                      $this->fecha_matricula_1[] = $dados_fecha_matricula_1;
                  } 
              } 
              $this->fecha_matricula = ""; 
              foreach ($this->fecha_matricula_1 as $dados_fecha_matricula_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fecha_matricula .= ";";
                   } 
                   $this->fecha_matricula .= $dados_fecha_matricula_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_fecha_matricula

    function ValidateField_tipo_identificacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->tipo_identificacion == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->tipo_identificacion))
          {
              $x = 0; 
              $this->tipo_identificacion_1 = array(); 
              foreach ($this->tipo_identificacion as $ind => $dados_tipo_identificacion_1 ) 
              {
                  if ($dados_tipo_identificacion_1 !== "") 
                  {
                      $this->tipo_identificacion_1[] = $dados_tipo_identificacion_1;
                  } 
              } 
              $this->tipo_identificacion = ""; 
              foreach ($this->tipo_identificacion_1 as $dados_tipo_identificacion_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->tipo_identificacion .= ";";
                   } 
                   $this->tipo_identificacion .= $dados_tipo_identificacion_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_tipo_identificacion

    function ValidateField_numero_documento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->numero_documento == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->numero_documento))
          {
              $x = 0; 
              $this->numero_documento_1 = array(); 
              foreach ($this->numero_documento as $ind => $dados_numero_documento_1 ) 
              {
                  if ($dados_numero_documento_1 !== "") 
                  {
                      $this->numero_documento_1[] = $dados_numero_documento_1;
                  } 
              } 
              $this->numero_documento = ""; 
              foreach ($this->numero_documento_1 as $dados_numero_documento_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->numero_documento .= ";";
                   } 
                   $this->numero_documento .= $dados_numero_documento_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_numero_documento

    function ValidateField_genero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->genero == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->genero))
          {
              $x = 0; 
              $this->genero_1 = array(); 
              foreach ($this->genero as $ind => $dados_genero_1 ) 
              {
                  if ($dados_genero_1 !== "") 
                  {
                      $this->genero_1[] = $dados_genero_1;
                  } 
              } 
              $this->genero = ""; 
              foreach ($this->genero_1 as $dados_genero_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->genero .= ";";
                   } 
                   $this->genero .= $dados_genero_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_genero

    function ValidateField_fecha_nacimiento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->fecha_nacimiento == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fecha_nacimiento))
          {
              $x = 0; 
              $this->fecha_nacimiento_1 = array(); 
              foreach ($this->fecha_nacimiento as $ind => $dados_fecha_nacimiento_1 ) 
              {
                  if ($dados_fecha_nacimiento_1 !== "") 
                  {
                      $this->fecha_nacimiento_1[] = $dados_fecha_nacimiento_1;
                  } 
              } 
              $this->fecha_nacimiento = ""; 
              foreach ($this->fecha_nacimiento_1 as $dados_fecha_nacimiento_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fecha_nacimiento .= ";";
                   } 
                   $this->fecha_nacimiento .= $dados_fecha_nacimiento_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_fecha_nacimiento

    function ValidateField_anos_cumplidos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->anos_cumplidos == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->anos_cumplidos))
          {
              $x = 0; 
              $this->anos_cumplidos_1 = array(); 
              foreach ($this->anos_cumplidos as $ind => $dados_anos_cumplidos_1 ) 
              {
                  if ($dados_anos_cumplidos_1 !== "") 
                  {
                      $this->anos_cumplidos_1[] = $dados_anos_cumplidos_1;
                  } 
              } 
              $this->anos_cumplidos = ""; 
              foreach ($this->anos_cumplidos_1 as $dados_anos_cumplidos_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->anos_cumplidos .= ";";
                   } 
                   $this->anos_cumplidos .= $dados_anos_cumplidos_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_anos_cumplidos

    function ValidateField_telefono(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->telefono == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->telefono))
          {
              $x = 0; 
              $this->telefono_1 = array(); 
              foreach ($this->telefono as $ind => $dados_telefono_1 ) 
              {
                  if ($dados_telefono_1 !== "") 
                  {
                      $this->telefono_1[] = $dados_telefono_1;
                  } 
              } 
              $this->telefono = ""; 
              foreach ($this->telefono_1 as $dados_telefono_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->telefono .= ";";
                   } 
                   $this->telefono .= $dados_telefono_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_telefono

    function ValidateField_etnia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->etnia == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->etnia))
          {
              $x = 0; 
              $this->etnia_1 = array(); 
              foreach ($this->etnia as $ind => $dados_etnia_1 ) 
              {
                  if ($dados_etnia_1 !== "") 
                  {
                      $this->etnia_1[] = $dados_etnia_1;
                  } 
              } 
              $this->etnia = ""; 
              foreach ($this->etnia_1 as $dados_etnia_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->etnia .= ";";
                   } 
                   $this->etnia .= $dados_etnia_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_etnia

    function ValidateField_emai(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->emai == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->emai))
          {
              $x = 0; 
              $this->emai_1 = array(); 
              foreach ($this->emai as $ind => $dados_emai_1 ) 
              {
                  if ($dados_emai_1 !== "") 
                  {
                      $this->emai_1[] = $dados_emai_1;
                  } 
              } 
              $this->emai = ""; 
              foreach ($this->emai_1 as $dados_emai_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->emai .= ";";
                   } 
                   $this->emai .= $dados_emai_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_emai

    function ValidateField_zona(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->zona == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->zona = "";
      } 
      else 
      { 
          if (is_array($this->zona))
          {
              $x = 0; 
              $this->zona_1 = array(); 
              foreach ($this->zona as $ind => $dados_zona_1 ) 
              {
                  if ($dados_zona_1 !== "") 
                  {
                      $this->zona_1[] = $dados_zona_1;
                  } 
              } 
              $this->zona = ""; 
              foreach ($this->zona_1 as $dados_zona_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->zona .= ";";
                   } 
                   $this->zona .= $dados_zona_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_zona

    function ValidateField_celdas_vacias(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->celdas_vacias == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->celdas_vacias = "0"; 
      } 
    } // ValidateField_celdas_vacias

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
    $this->nmgp_dados_form['estatus'] = $this->estatus;
    $this->nmgp_dados_form['semestre'] = $this->semestre;
    $this->nmgp_dados_form['fecha_matricula'] = $this->fecha_matricula;
    $this->nmgp_dados_form['tipo_identificacion'] = $this->tipo_identificacion;
    $this->nmgp_dados_form['numero_documento'] = $this->numero_documento;
    $this->nmgp_dados_form['genero'] = $this->genero;
    $this->nmgp_dados_form['fecha_nacimiento'] = $this->fecha_nacimiento;
    $this->nmgp_dados_form['anos_cumplidos'] = $this->anos_cumplidos;
    $this->nmgp_dados_form['telefono'] = $this->telefono;
    $this->nmgp_dados_form['etnia'] = $this->etnia;
    $this->nmgp_dados_form['emai'] = $this->emai;
    $this->nmgp_dados_form['zona'] = $this->zona;
    $this->nmgp_dados_form['celdas_vacias'] = $this->celdas_vacias;
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
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
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
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

   function ajax_return_values()
   {
          $this->ajax_return_values_estatus();
          $this->ajax_return_values_semestre();
          $this->ajax_return_values_fecha_matricula();
          $this->ajax_return_values_tipo_identificacion();
          $this->ajax_return_values_numero_documento();
          $this->ajax_return_values_genero();
          $this->ajax_return_values_fecha_nacimiento();
          $this->ajax_return_values_anos_cumplidos();
          $this->ajax_return_values_telefono();
          $this->ajax_return_values_etnia();
          $this->ajax_return_values_emai();
          $this->ajax_return_values_zona();
          $this->ajax_return_values_celdas_vacias();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- estatus
   function ajax_return_values_estatus($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatus", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatus);
              $aLookup = array();
              $this->_tmp_lookup_estatus = $this->estatus;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Estatus"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_estatus'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatus']) && !empty($this->NM_ajax_info['select_html']['estatus']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['estatus'];
          }
          $this->NM_ajax_info['fldList']['estatus'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-estatus',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatus']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatus']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatus']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatus']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatus']['labList'] = $aLabel;
          }
   }

          //----- semestre
   function ajax_return_values_semestre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("semestre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->semestre);
              $aLookup = array();
              $this->_tmp_lookup_semestre = $this->semestre;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Semestre"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_semestre'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['semestre']) && !empty($this->NM_ajax_info['select_html']['semestre']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['semestre'];
          }
          $this->NM_ajax_info['fldList']['semestre'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-semestre',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['semestre']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['semestre']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['semestre']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['semestre']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['semestre']['labList'] = $aLabel;
          }
   }

          //----- fecha_matricula
   function ajax_return_values_fecha_matricula($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha_matricula", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha_matricula);
              $aLookup = array();
              $this->_tmp_lookup_fecha_matricula = $this->fecha_matricula;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Fecha de Matrícula"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_fecha_matricula'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fecha_matricula']) && !empty($this->NM_ajax_info['select_html']['fecha_matricula']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fecha_matricula'];
          }
          $this->NM_ajax_info['fldList']['fecha_matricula'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fecha_matricula',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fecha_matricula']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fecha_matricula']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fecha_matricula']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fecha_matricula']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fecha_matricula']['labList'] = $aLabel;
          }
   }

          //----- tipo_identificacion
   function ajax_return_values_tipo_identificacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_identificacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_identificacion);
              $aLookup = array();
              $this->_tmp_lookup_tipo_identificacion = $this->tipo_identificacion;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Tipo de Identificación"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_tipo_identificacion'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['tipo_identificacion']) && !empty($this->NM_ajax_info['select_html']['tipo_identificacion']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['tipo_identificacion'];
          }
          $this->NM_ajax_info['fldList']['tipo_identificacion'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-tipo_identificacion',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_identificacion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_identificacion']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_identificacion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_identificacion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_identificacion']['labList'] = $aLabel;
          }
   }

          //----- numero_documento
   function ajax_return_values_numero_documento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_documento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numero_documento);
              $aLookup = array();
              $this->_tmp_lookup_numero_documento = $this->numero_documento;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Número de Documento"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_numero_documento'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['numero_documento']) && !empty($this->NM_ajax_info['select_html']['numero_documento']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['numero_documento'];
          }
          $this->NM_ajax_info['fldList']['numero_documento'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-numero_documento',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['numero_documento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['numero_documento']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['numero_documento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['numero_documento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['numero_documento']['labList'] = $aLabel;
          }
   }

          //----- genero
   function ajax_return_values_genero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("genero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->genero);
              $aLookup = array();
              $this->_tmp_lookup_genero = $this->genero;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Género"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_genero'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['genero']) && !empty($this->NM_ajax_info['select_html']['genero']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['genero'];
          }
          $this->NM_ajax_info['fldList']['genero'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-genero',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['genero']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['genero']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['genero']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['genero']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['genero']['labList'] = $aLabel;
          }
   }

          //----- fecha_nacimiento
   function ajax_return_values_fecha_nacimiento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha_nacimiento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha_nacimiento);
              $aLookup = array();
              $this->_tmp_lookup_fecha_nacimiento = $this->fecha_nacimiento;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Fecha de Nacimiento"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_fecha_nacimiento'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fecha_nacimiento']) && !empty($this->NM_ajax_info['select_html']['fecha_nacimiento']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fecha_nacimiento'];
          }
          $this->NM_ajax_info['fldList']['fecha_nacimiento'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fecha_nacimiento',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fecha_nacimiento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fecha_nacimiento']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fecha_nacimiento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fecha_nacimiento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fecha_nacimiento']['labList'] = $aLabel;
          }
   }

          //----- anos_cumplidos
   function ajax_return_values_anos_cumplidos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anos_cumplidos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anos_cumplidos);
              $aLookup = array();
              $this->_tmp_lookup_anos_cumplidos = $this->anos_cumplidos;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Años Cumplidos"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_anos_cumplidos'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['anos_cumplidos']) && !empty($this->NM_ajax_info['select_html']['anos_cumplidos']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['anos_cumplidos'];
          }
          $this->NM_ajax_info['fldList']['anos_cumplidos'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-anos_cumplidos',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['anos_cumplidos']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['anos_cumplidos']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['anos_cumplidos']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['anos_cumplidos']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['anos_cumplidos']['labList'] = $aLabel;
          }
   }

          //----- telefono
   function ajax_return_values_telefono($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telefono", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->telefono);
              $aLookup = array();
              $this->_tmp_lookup_telefono = $this->telefono;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Teléfono"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_telefono'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['telefono']) && !empty($this->NM_ajax_info['select_html']['telefono']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['telefono'];
          }
          $this->NM_ajax_info['fldList']['telefono'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-telefono',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['telefono']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['telefono']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['telefono']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['telefono']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['telefono']['labList'] = $aLabel;
          }
   }

          //----- etnia
   function ajax_return_values_etnia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("etnia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->etnia);
              $aLookup = array();
              $this->_tmp_lookup_etnia = $this->etnia;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Etnia"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_etnia'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['etnia']) && !empty($this->NM_ajax_info['select_html']['etnia']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['etnia'];
          }
          $this->NM_ajax_info['fldList']['etnia'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-etnia',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['etnia']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['etnia']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['etnia']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['etnia']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['etnia']['labList'] = $aLabel;
          }
   }

          //----- emai
   function ajax_return_values_emai($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("emai", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->emai);
              $aLookup = array();
              $this->_tmp_lookup_emai = $this->emai;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Email"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_emai'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['emai']) && !empty($this->NM_ajax_info['select_html']['emai']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['emai'];
          }
          $this->NM_ajax_info['fldList']['emai'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-emai',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['emai']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['emai']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['emai']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['emai']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['emai']['labList'] = $aLabel;
          }
   }

          //----- zona
   function ajax_return_values_zona($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zona", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zona);
              $aLookup = array();
              $this->_tmp_lookup_zona = $this->zona;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("Comuna"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_zona'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['zona']) && !empty($this->NM_ajax_info['select_html']['zona']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['zona'];
          }
          $this->NM_ajax_info['fldList']['zona'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-zona',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['zona']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['zona']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['zona']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['zona']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['zona']['labList'] = $aLabel;
          }
   }

          //----- celdas_vacias
   function ajax_return_values_celdas_vacias($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("celdas_vacias", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->celdas_vacias);
              $aLookup = array();
              $this->_tmp_lookup_celdas_vacias = $this->celdas_vacias;

$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('1') => control_list_estudiantes_mob_pack_protect_string("1"));
$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('2') => control_list_estudiantes_mob_pack_protect_string("2"));
$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('3') => control_list_estudiantes_mob_pack_protect_string("3"));
$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('4') => control_list_estudiantes_mob_pack_protect_string("4"));
$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('5') => control_list_estudiantes_mob_pack_protect_string("5"));
$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('6') => control_list_estudiantes_mob_pack_protect_string("6"));
$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('7') => control_list_estudiantes_mob_pack_protect_string("7"));
$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('8') => control_list_estudiantes_mob_pack_protect_string("8"));
$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('9') => control_list_estudiantes_mob_pack_protect_string("9"));
$aLookup[] = array(control_list_estudiantes_mob_pack_protect_string('10') => control_list_estudiantes_mob_pack_protect_string("10"));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '2';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '3';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '4';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '5';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '6';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '7';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '8';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '9';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '10';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"celdas_vacias\"";
          if (isset($this->NM_ajax_info['select_html']['celdas_vacias']) && !empty($this->NM_ajax_info['select_html']['celdas_vacias']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['celdas_vacias'];
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

                  if ($this->celdas_vacias == $sValue)
                  {
                      $this->_tmp_lookup_celdas_vacias = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['celdas_vacias'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['celdas_vacias']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['celdas_vacias']['valList'][$i] = control_list_estudiantes_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['celdas_vacias']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['celdas_vacias']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['celdas_vacias']['labList'] = $aLabel;
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['upload_dir'][$fieldName][] = $newName;
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              control_list_estudiantes_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    $this->nm_formatar_campos();
    include_once("control_list_estudiantes_mob_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['csrf_token'];
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['sc_outra_jan'])
   {
       $nmgp_saida_form = "control_list_estudiantes_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "control_list_estudiantes_mob_fim.php";
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
       control_list_estudiantes_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['masterValue']);
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
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           control_list_estudiantes_mob_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
           $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       }
       control_list_estudiantes_mob_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
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
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&script_case_session=<?php echo session_id() ?> &nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
   </BODY>
   </HTML>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
}
?>
