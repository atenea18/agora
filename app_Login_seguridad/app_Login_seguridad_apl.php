<?php
//
class app_Login_seguridad_apl
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
   var $login;
   var $pswd;
   var $links;
   var $institucion;
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
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['institucion']))
          {
              $this->institucion = $this->NM_ajax_info['param']['institucion'];
          }
          if (isset($this->NM_ajax_info['param']['links']))
          {
              $this->links = $this->NM_ajax_info['param']['links'];
          }
          if (isset($this->NM_ajax_info['param']['login']))
          {
              $this->login = $this->NM_ajax_info['param']['login'];
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
          if (isset($this->NM_ajax_info['param']['pswd']))
          {
              $this->pswd = $this->NM_ajax_info['param']['pswd'];
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
      if (isset($this->usr_email) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_email'] = $this->usr_email;
      }
      if (isset($this->grupo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['grupo'] = $this->grupo;
      }
      if (isset($this->docente) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['docente'] = $this->docente;
      }
      if (isset($this->institucion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['institucion'] = $this->institucion;
      }
      if (isset($this->par_nombre_institucion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_nombre_institucion'] = $this->par_nombre_institucion;
      }
      if (isset($this->logo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['logo'] = $this->logo;
      }
      if (isset($this->database) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['database'] = $this->database;
      }
      if (isset($this->par_fecha) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_fecha'] = $this->par_fecha;
      }
      if (isset($this->par_idestudiante) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idestudiante'] = $this->par_idestudiante;
      }
      if (isset($this->par_year) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_year'] = $this->par_year;
      }
      if (isset($this->par_estudiante) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_estudiante'] = $this->par_estudiante;
      }
      if (isset($this->par_tipo_identif) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_tipo_identif'] = $this->par_tipo_identif;
      }
      if (isset($this->par_numero_doc) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_numero_doc'] = $this->par_numero_doc;
      }
      if (isset($this->modelo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['modelo'] = $this->modelo;
      }
      if (isset($this->par_1) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_1'] = $this->par_1;
      }
      if (isset($this->par_2) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_2'] = $this->par_2;
      }
      if (isset($this->par_3) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_3'] = $this->par_3;
      }
      if (isset($this->par_4) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_4'] = $this->par_4;
      }
      if (isset($this->par_5) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_5'] = $this->par_5;
      }
      if (isset($this->par_6) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_6'] = $this->par_6;
      }
      if (isset($this->par_7) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_7'] = $this->par_7;
      }
      if (isset($this->par_8) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_8'] = $this->par_8;
      }
      if (isset($this->par_9) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_9'] = $this->par_9;
      }
      if (isset($this->par_10) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_10'] = $this->par_10;
      }
      if (isset($this->par_11) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_11'] = $this->par_11;
      }
      if (isset($this->par_12) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_12'] = $this->par_12;
      }
      if (isset($this->par_13) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_13'] = $this->par_13;
      }
      if (isset($this->par_14) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_14'] = $this->par_14;
      }
      if (isset($this->par_15) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_15'] = $this->par_15;
      }
      if (isset($this->par_16) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_16'] = $this->par_16;
      }
      if (isset($this->par_17) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_17'] = $this->par_17;
      }
      if (isset($this->par_18) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_18'] = $this->par_18;
      }
      if (isset($this->par_19) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_19'] = $this->par_19;
      }
      if (isset($this->par_20) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_20'] = $this->par_20;
      }
      if (isset($this->par_21) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_21'] = $this->par_21;
      }
      if (isset($this->par_22) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_22'] = $this->par_22;
      }
      if (isset($this->par_23) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_23'] = $this->par_23;
      }
      if (isset($this->par_24) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_24'] = $this->par_24;
      }
      if (isset($this->par_25) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_25'] = $this->par_25;
      }
      if (isset($this->par_nota_maxima) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_nota_maxima'] = $this->par_nota_maxima;
      }
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["usr_email"])) 
      {
          $_SESSION['usr_email'] = $this->usr_email;
      }
      if (isset($_POST["grupo"])) 
      {
          $_SESSION['grupo'] = $this->grupo;
      }
      if (isset($_POST["docente"])) 
      {
          $_SESSION['docente'] = $this->docente;
      }
      if (isset($_POST["institucion"])) 
      {
          $_SESSION['institucion'] = $this->institucion;
      }
      if (isset($_POST["par_nombre_institucion"])) 
      {
          $_SESSION['par_nombre_institucion'] = $this->par_nombre_institucion;
      }
      if (isset($_POST["logo"])) 
      {
          $_SESSION['logo'] = $this->logo;
      }
      if (isset($_POST["database"])) 
      {
          $_SESSION['database'] = $this->database;
      }
      if (isset($_POST["par_fecha"])) 
      {
          $_SESSION['par_fecha'] = $this->par_fecha;
      }
      if (isset($_POST["par_idestudiante"])) 
      {
          $_SESSION['par_idestudiante'] = $this->par_idestudiante;
      }
      if (isset($_POST["par_year"])) 
      {
          $_SESSION['par_year'] = $this->par_year;
      }
      if (isset($_POST["par_estudiante"])) 
      {
          $_SESSION['par_estudiante'] = $this->par_estudiante;
      }
      if (isset($_POST["par_tipo_identif"])) 
      {
          $_SESSION['par_tipo_identif'] = $this->par_tipo_identif;
      }
      if (isset($_POST["par_numero_doc"])) 
      {
          $_SESSION['par_numero_doc'] = $this->par_numero_doc;
      }
      if (isset($_POST["modelo"])) 
      {
          $_SESSION['modelo'] = $this->modelo;
      }
      if (isset($_POST["par_1"])) 
      {
          $_SESSION['par_1'] = $this->par_1;
      }
      if (isset($_POST["par_2"])) 
      {
          $_SESSION['par_2'] = $this->par_2;
      }
      if (isset($_POST["par_3"])) 
      {
          $_SESSION['par_3'] = $this->par_3;
      }
      if (isset($_POST["par_4"])) 
      {
          $_SESSION['par_4'] = $this->par_4;
      }
      if (isset($_POST["par_5"])) 
      {
          $_SESSION['par_5'] = $this->par_5;
      }
      if (isset($_POST["par_6"])) 
      {
          $_SESSION['par_6'] = $this->par_6;
      }
      if (isset($_POST["par_7"])) 
      {
          $_SESSION['par_7'] = $this->par_7;
      }
      if (isset($_POST["par_8"])) 
      {
          $_SESSION['par_8'] = $this->par_8;
      }
      if (isset($_POST["par_9"])) 
      {
          $_SESSION['par_9'] = $this->par_9;
      }
      if (isset($_POST["par_10"])) 
      {
          $_SESSION['par_10'] = $this->par_10;
      }
      if (isset($_POST["par_11"])) 
      {
          $_SESSION['par_11'] = $this->par_11;
      }
      if (isset($_POST["par_12"])) 
      {
          $_SESSION['par_12'] = $this->par_12;
      }
      if (isset($_POST["par_13"])) 
      {
          $_SESSION['par_13'] = $this->par_13;
      }
      if (isset($_POST["par_14"])) 
      {
          $_SESSION['par_14'] = $this->par_14;
      }
      if (isset($_POST["par_15"])) 
      {
          $_SESSION['par_15'] = $this->par_15;
      }
      if (isset($_POST["par_16"])) 
      {
          $_SESSION['par_16'] = $this->par_16;
      }
      if (isset($_POST["par_17"])) 
      {
          $_SESSION['par_17'] = $this->par_17;
      }
      if (isset($_POST["par_18"])) 
      {
          $_SESSION['par_18'] = $this->par_18;
      }
      if (isset($_POST["par_19"])) 
      {
          $_SESSION['par_19'] = $this->par_19;
      }
      if (isset($_POST["par_20"])) 
      {
          $_SESSION['par_20'] = $this->par_20;
      }
      if (isset($_POST["par_21"])) 
      {
          $_SESSION['par_21'] = $this->par_21;
      }
      if (isset($_POST["par_22"])) 
      {
          $_SESSION['par_22'] = $this->par_22;
      }
      if (isset($_POST["par_23"])) 
      {
          $_SESSION['par_23'] = $this->par_23;
      }
      if (isset($_POST["par_24"])) 
      {
          $_SESSION['par_24'] = $this->par_24;
      }
      if (isset($_POST["par_25"])) 
      {
          $_SESSION['par_25'] = $this->par_25;
      }
      if (isset($_POST["par_nota_maxima"])) 
      {
          $_SESSION['par_nota_maxima'] = $this->par_nota_maxima;
      }
      if (isset($_POST["usr_login"])) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["usr_email"])) 
      {
          $_SESSION['usr_email'] = $this->usr_email;
      }
      if (isset($_GET["grupo"])) 
      {
          $_SESSION['grupo'] = $this->grupo;
      }
      if (isset($_GET["docente"])) 
      {
          $_SESSION['docente'] = $this->docente;
      }
      if (isset($_GET["institucion"])) 
      {
          $_SESSION['institucion'] = $this->institucion;
      }
      if (isset($_GET["par_nombre_institucion"])) 
      {
          $_SESSION['par_nombre_institucion'] = $this->par_nombre_institucion;
      }
      if (isset($_GET["logo"])) 
      {
          $_SESSION['logo'] = $this->logo;
      }
      if (isset($_GET["database"])) 
      {
          $_SESSION['database'] = $this->database;
      }
      if (isset($_GET["par_fecha"])) 
      {
          $_SESSION['par_fecha'] = $this->par_fecha;
      }
      if (isset($_GET["par_idestudiante"])) 
      {
          $_SESSION['par_idestudiante'] = $this->par_idestudiante;
      }
      if (isset($_GET["par_year"])) 
      {
          $_SESSION['par_year'] = $this->par_year;
      }
      if (isset($_GET["par_estudiante"])) 
      {
          $_SESSION['par_estudiante'] = $this->par_estudiante;
      }
      if (isset($_GET["par_tipo_identif"])) 
      {
          $_SESSION['par_tipo_identif'] = $this->par_tipo_identif;
      }
      if (isset($_GET["par_numero_doc"])) 
      {
          $_SESSION['par_numero_doc'] = $this->par_numero_doc;
      }
      if (isset($_GET["modelo"])) 
      {
          $_SESSION['modelo'] = $this->modelo;
      }
      if (isset($_GET["par_1"])) 
      {
          $_SESSION['par_1'] = $this->par_1;
      }
      if (isset($_GET["par_2"])) 
      {
          $_SESSION['par_2'] = $this->par_2;
      }
      if (isset($_GET["par_3"])) 
      {
          $_SESSION['par_3'] = $this->par_3;
      }
      if (isset($_GET["par_4"])) 
      {
          $_SESSION['par_4'] = $this->par_4;
      }
      if (isset($_GET["par_5"])) 
      {
          $_SESSION['par_5'] = $this->par_5;
      }
      if (isset($_GET["par_6"])) 
      {
          $_SESSION['par_6'] = $this->par_6;
      }
      if (isset($_GET["par_7"])) 
      {
          $_SESSION['par_7'] = $this->par_7;
      }
      if (isset($_GET["par_8"])) 
      {
          $_SESSION['par_8'] = $this->par_8;
      }
      if (isset($_GET["par_9"])) 
      {
          $_SESSION['par_9'] = $this->par_9;
      }
      if (isset($_GET["par_10"])) 
      {
          $_SESSION['par_10'] = $this->par_10;
      }
      if (isset($_GET["par_11"])) 
      {
          $_SESSION['par_11'] = $this->par_11;
      }
      if (isset($_GET["par_12"])) 
      {
          $_SESSION['par_12'] = $this->par_12;
      }
      if (isset($_GET["par_13"])) 
      {
          $_SESSION['par_13'] = $this->par_13;
      }
      if (isset($_GET["par_14"])) 
      {
          $_SESSION['par_14'] = $this->par_14;
      }
      if (isset($_GET["par_15"])) 
      {
          $_SESSION['par_15'] = $this->par_15;
      }
      if (isset($_GET["par_16"])) 
      {
          $_SESSION['par_16'] = $this->par_16;
      }
      if (isset($_GET["par_17"])) 
      {
          $_SESSION['par_17'] = $this->par_17;
      }
      if (isset($_GET["par_18"])) 
      {
          $_SESSION['par_18'] = $this->par_18;
      }
      if (isset($_GET["par_19"])) 
      {
          $_SESSION['par_19'] = $this->par_19;
      }
      if (isset($_GET["par_20"])) 
      {
          $_SESSION['par_20'] = $this->par_20;
      }
      if (isset($_GET["par_21"])) 
      {
          $_SESSION['par_21'] = $this->par_21;
      }
      if (isset($_GET["par_22"])) 
      {
          $_SESSION['par_22'] = $this->par_22;
      }
      if (isset($_GET["par_23"])) 
      {
          $_SESSION['par_23'] = $this->par_23;
      }
      if (isset($_GET["par_24"])) 
      {
          $_SESSION['par_24'] = $this->par_24;
      }
      if (isset($_GET["par_25"])) 
      {
          $_SESSION['par_25'] = $this->par_25;
      }
      if (isset($_GET["par_nota_maxima"])) 
      {
          $_SESSION['par_nota_maxima'] = $this->par_nota_maxima;
      }
      if (isset($_GET["usr_login"])) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['embutida_parms']);
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
                 nm_limpa_str_app_Login_seguridad($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->usr_email)) 
          {
              $_SESSION['usr_email'] = $this->usr_email;
          }
          if (isset($this->grupo)) 
          {
              $_SESSION['grupo'] = $this->grupo;
          }
          if (isset($this->docente)) 
          {
              $_SESSION['docente'] = $this->docente;
          }
          if (isset($this->institucion)) 
          {
              $_SESSION['institucion'] = $this->institucion;
          }
          if (isset($this->par_nombre_institucion)) 
          {
              $_SESSION['par_nombre_institucion'] = $this->par_nombre_institucion;
          }
          if (isset($this->logo)) 
          {
              $_SESSION['logo'] = $this->logo;
          }
          if (isset($this->database)) 
          {
              $_SESSION['database'] = $this->database;
          }
          if (isset($this->par_fecha)) 
          {
              $_SESSION['par_fecha'] = $this->par_fecha;
          }
          if (isset($this->par_idestudiante)) 
          {
              $_SESSION['par_idestudiante'] = $this->par_idestudiante;
          }
          if (isset($this->par_year)) 
          {
              $_SESSION['par_year'] = $this->par_year;
          }
          if (isset($this->par_estudiante)) 
          {
              $_SESSION['par_estudiante'] = $this->par_estudiante;
          }
          if (isset($this->par_tipo_identif)) 
          {
              $_SESSION['par_tipo_identif'] = $this->par_tipo_identif;
          }
          if (isset($this->par_numero_doc)) 
          {
              $_SESSION['par_numero_doc'] = $this->par_numero_doc;
          }
          if (isset($this->modelo)) 
          {
              $_SESSION['modelo'] = $this->modelo;
          }
          if (isset($this->par_1)) 
          {
              $_SESSION['par_1'] = $this->par_1;
          }
          if (isset($this->par_2)) 
          {
              $_SESSION['par_2'] = $this->par_2;
          }
          if (isset($this->par_3)) 
          {
              $_SESSION['par_3'] = $this->par_3;
          }
          if (isset($this->par_4)) 
          {
              $_SESSION['par_4'] = $this->par_4;
          }
          if (isset($this->par_5)) 
          {
              $_SESSION['par_5'] = $this->par_5;
          }
          if (isset($this->par_6)) 
          {
              $_SESSION['par_6'] = $this->par_6;
          }
          if (isset($this->par_7)) 
          {
              $_SESSION['par_7'] = $this->par_7;
          }
          if (isset($this->par_8)) 
          {
              $_SESSION['par_8'] = $this->par_8;
          }
          if (isset($this->par_9)) 
          {
              $_SESSION['par_9'] = $this->par_9;
          }
          if (isset($this->par_10)) 
          {
              $_SESSION['par_10'] = $this->par_10;
          }
          if (isset($this->par_11)) 
          {
              $_SESSION['par_11'] = $this->par_11;
          }
          if (isset($this->par_12)) 
          {
              $_SESSION['par_12'] = $this->par_12;
          }
          if (isset($this->par_13)) 
          {
              $_SESSION['par_13'] = $this->par_13;
          }
          if (isset($this->par_14)) 
          {
              $_SESSION['par_14'] = $this->par_14;
          }
          if (isset($this->par_15)) 
          {
              $_SESSION['par_15'] = $this->par_15;
          }
          if (isset($this->par_16)) 
          {
              $_SESSION['par_16'] = $this->par_16;
          }
          if (isset($this->par_17)) 
          {
              $_SESSION['par_17'] = $this->par_17;
          }
          if (isset($this->par_18)) 
          {
              $_SESSION['par_18'] = $this->par_18;
          }
          if (isset($this->par_19)) 
          {
              $_SESSION['par_19'] = $this->par_19;
          }
          if (isset($this->par_20)) 
          {
              $_SESSION['par_20'] = $this->par_20;
          }
          if (isset($this->par_21)) 
          {
              $_SESSION['par_21'] = $this->par_21;
          }
          if (isset($this->par_22)) 
          {
              $_SESSION['par_22'] = $this->par_22;
          }
          if (isset($this->par_23)) 
          {
              $_SESSION['par_23'] = $this->par_23;
          }
          if (isset($this->par_24)) 
          {
              $_SESSION['par_24'] = $this->par_24;
          }
          if (isset($this->par_25)) 
          {
              $_SESSION['par_25'] = $this->par_25;
          }
          if (isset($this->par_nota_maxima)) 
          {
              $_SESSION['par_nota_maxima'] = $this->par_nota_maxima;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_email)) 
          {
              $_SESSION['usr_email'] = $this->usr_email;
          }
          if (isset($this->grupo)) 
          {
              $_SESSION['grupo'] = $this->grupo;
          }
          if (isset($this->docente)) 
          {
              $_SESSION['docente'] = $this->docente;
          }
          if (isset($this->institucion)) 
          {
              $_SESSION['institucion'] = $this->institucion;
          }
          if (isset($this->par_nombre_institucion)) 
          {
              $_SESSION['par_nombre_institucion'] = $this->par_nombre_institucion;
          }
          if (isset($this->logo)) 
          {
              $_SESSION['logo'] = $this->logo;
          }
          if (isset($this->database)) 
          {
              $_SESSION['database'] = $this->database;
          }
          if (isset($this->par_fecha)) 
          {
              $_SESSION['par_fecha'] = $this->par_fecha;
          }
          if (isset($this->par_idestudiante)) 
          {
              $_SESSION['par_idestudiante'] = $this->par_idestudiante;
          }
          if (isset($this->par_year)) 
          {
              $_SESSION['par_year'] = $this->par_year;
          }
          if (isset($this->par_estudiante)) 
          {
              $_SESSION['par_estudiante'] = $this->par_estudiante;
          }
          if (isset($this->par_tipo_identif)) 
          {
              $_SESSION['par_tipo_identif'] = $this->par_tipo_identif;
          }
          if (isset($this->par_numero_doc)) 
          {
              $_SESSION['par_numero_doc'] = $this->par_numero_doc;
          }
          if (isset($this->modelo)) 
          {
              $_SESSION['modelo'] = $this->modelo;
          }
          if (isset($this->par_1)) 
          {
              $_SESSION['par_1'] = $this->par_1;
          }
          if (isset($this->par_2)) 
          {
              $_SESSION['par_2'] = $this->par_2;
          }
          if (isset($this->par_3)) 
          {
              $_SESSION['par_3'] = $this->par_3;
          }
          if (isset($this->par_4)) 
          {
              $_SESSION['par_4'] = $this->par_4;
          }
          if (isset($this->par_5)) 
          {
              $_SESSION['par_5'] = $this->par_5;
          }
          if (isset($this->par_6)) 
          {
              $_SESSION['par_6'] = $this->par_6;
          }
          if (isset($this->par_7)) 
          {
              $_SESSION['par_7'] = $this->par_7;
          }
          if (isset($this->par_8)) 
          {
              $_SESSION['par_8'] = $this->par_8;
          }
          if (isset($this->par_9)) 
          {
              $_SESSION['par_9'] = $this->par_9;
          }
          if (isset($this->par_10)) 
          {
              $_SESSION['par_10'] = $this->par_10;
          }
          if (isset($this->par_11)) 
          {
              $_SESSION['par_11'] = $this->par_11;
          }
          if (isset($this->par_12)) 
          {
              $_SESSION['par_12'] = $this->par_12;
          }
          if (isset($this->par_13)) 
          {
              $_SESSION['par_13'] = $this->par_13;
          }
          if (isset($this->par_14)) 
          {
              $_SESSION['par_14'] = $this->par_14;
          }
          if (isset($this->par_15)) 
          {
              $_SESSION['par_15'] = $this->par_15;
          }
          if (isset($this->par_16)) 
          {
              $_SESSION['par_16'] = $this->par_16;
          }
          if (isset($this->par_17)) 
          {
              $_SESSION['par_17'] = $this->par_17;
          }
          if (isset($this->par_18)) 
          {
              $_SESSION['par_18'] = $this->par_18;
          }
          if (isset($this->par_19)) 
          {
              $_SESSION['par_19'] = $this->par_19;
          }
          if (isset($this->par_20)) 
          {
              $_SESSION['par_20'] = $this->par_20;
          }
          if (isset($this->par_21)) 
          {
              $_SESSION['par_21'] = $this->par_21;
          }
          if (isset($this->par_22)) 
          {
              $_SESSION['par_22'] = $this->par_22;
          }
          if (isset($this->par_23)) 
          {
              $_SESSION['par_23'] = $this->par_23;
          }
          if (isset($this->par_24)) 
          {
              $_SESSION['par_24'] = $this->par_24;
          }
          if (isset($this->par_25)) 
          {
              $_SESSION['par_25'] = $this->par_25;
          }
          if (isset($this->par_nota_maxima)) 
          {
              $_SESSION['par_nota_maxima'] = $this->par_nota_maxima;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new app_Login_seguridad_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['initialize'])
          {
              $_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'on';
     if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_add_users']))
{
unset($_SESSION['scriptcase']['sc_apl_conf']['app_form_add_users']);
}
;
if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_retrieve_pswd']))
{
unset($_SESSION['scriptcase']['sc_apl_conf']['app_retrieve_pswd']);
}
;
$_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['app_Login_seguridad']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['app_Login_seguridad']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['app_Login_seguridad'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['app_Login_seguridad']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['app_Login_seguridad']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('app_Login_seguridad') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['app_Login_seguridad']['label'] = "Login";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "app_Login_seguridad")
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
      $this->nm_new_label['login'] = '' . $this->Ini->Nm_lang['lang_sec_users_fild_login'] . '';
      $this->nm_new_label['pswd'] = '' . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . '';

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



      $_SESSION['scriptcase']['error_icon']['app_Login_seguridad']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['app_Login_seguridad'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Login_seguridad']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("app_Login_seguridad", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'app_Login_seguridad_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'app_Login_seguridad_help.txt');
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
          require_once($this->Ini->path_embutida . 'app_Login_seguridad/app_Login_seguridad_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "app_Login_seguridad_erro.class.php"); 
      }
      $this->Erro      = new app_Login_seguridad_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['app_Login_seguridad']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_numero_doc)) {$this->sc_temp_par_numero_doc = (isset($_SESSION['par_numero_doc'])) ? $_SESSION['par_numero_doc'] : "";}
if (!isset($this->sc_temp_par_tipo_identif)) {$this->sc_temp_par_tipo_identif = (isset($_SESSION['par_tipo_identif'])) ? $_SESSION['par_tipo_identif'] : "";}
if (!isset($this->sc_temp_par_estudiante)) {$this->sc_temp_par_estudiante = (isset($_SESSION['par_estudiante'])) ? $_SESSION['par_estudiante'] : "";}
if (!isset($this->sc_temp_par_year)) {$this->sc_temp_par_year = (isset($_SESSION['par_year'])) ? $_SESSION['par_year'] : "";}
if (!isset($this->sc_temp_par_idestudiante)) {$this->sc_temp_par_idestudiante = (isset($_SESSION['par_idestudiante'])) ? $_SESSION['par_idestudiante'] : "";}
if (!isset($this->sc_temp_par_fecha)) {$this->sc_temp_par_fecha = (isset($_SESSION['par_fecha'])) ? $_SESSION['par_fecha'] : "";}
if (!isset($this->sc_temp_database)) {$this->sc_temp_database = (isset($_SESSION['database'])) ? $_SESSION['database'] : "";}
if (!isset($this->sc_temp_logo)) {$this->sc_temp_logo = (isset($_SESSION['logo'])) ? $_SESSION['logo'] : "";}
if (!isset($this->sc_temp_par_nombre_institucion)) {$this->sc_temp_par_nombre_institucion = (isset($_SESSION['par_nombre_institucion'])) ? $_SESSION['par_nombre_institucion'] : "";}
if (!isset($this->sc_temp_institucion)) {$this->sc_temp_institucion = (isset($_SESSION['institucion'])) ? $_SESSION['institucion'] : "";}
if (!isset($this->sc_temp_docente)) {$this->sc_temp_docente = (isset($_SESSION['docente'])) ? $_SESSION['docente'] : "";}
if (!isset($this->sc_temp_grupo)) {$this->sc_temp_grupo = (isset($_SESSION['grupo'])) ? $_SESSION['grupo'] : "";}
if (!isset($this->sc_temp_usr_email)) {$this->sc_temp_usr_email = (isset($_SESSION['usr_email'])) ? $_SESSION['usr_email'] : "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
     unset($_SESSION['scriptcase']['sc_apl_seg']);unset($_SESSION['scriptcase']['pass']);unset($_SESSION['usr_login']);
 unset($this->sc_temp_usr_login);
 unset($_SESSION['usr_email']);
 unset($this->sc_temp_usr_email);
 unset($_SESSION['grupo']);
 unset($this->sc_temp_grupo);
 unset($_SESSION['docente']);
 unset($this->sc_temp_docente);
 unset($_SESSION['institucion']);
 unset($this->sc_temp_institucion);
 unset($_SESSION['par_nombre_institucion']);
 unset($this->sc_temp_par_nombre_institucion);
 unset($_SESSION['logo']);
 unset($this->sc_temp_logo);
 unset($_SESSION['database']);
 unset($this->sc_temp_database);
 unset($_SESSION['par_fecha']);
 unset($this->sc_temp_par_fecha);
 unset($_SESSION['par_idestudiante']);
 unset($this->sc_temp_par_idestudiante);
 unset($_SESSION['par_year']);
 unset($this->sc_temp_par_year);
 unset($_SESSION['par_estudiante']);
 unset($this->sc_temp_par_estudiante);
 unset($_SESSION['par_tipo_identif']);
 unset($this->sc_temp_par_tipo_identif);
 unset($_SESSION['par_numero_doc']);
 unset($this->sc_temp_par_numero_doc);
;
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_usr_email)) { $_SESSION['usr_email'] = $this->sc_temp_usr_email;}
if (isset($this->sc_temp_grupo)) { $_SESSION['grupo'] = $this->sc_temp_grupo;}
if (isset($this->sc_temp_docente)) { $_SESSION['docente'] = $this->sc_temp_docente;}
if (isset($this->sc_temp_institucion)) { $_SESSION['institucion'] = $this->sc_temp_institucion;}
if (isset($this->sc_temp_par_nombre_institucion)) { $_SESSION['par_nombre_institucion'] = $this->sc_temp_par_nombre_institucion;}
if (isset($this->sc_temp_logo)) { $_SESSION['logo'] = $this->sc_temp_logo;}
if (isset($this->sc_temp_database)) { $_SESSION['database'] = $this->sc_temp_database;}
if (isset($this->sc_temp_par_fecha)) { $_SESSION['par_fecha'] = $this->sc_temp_par_fecha;}
if (isset($this->sc_temp_par_idestudiante)) { $_SESSION['par_idestudiante'] = $this->sc_temp_par_idestudiante;}
if (isset($this->sc_temp_par_year)) { $_SESSION['par_year'] = $this->sc_temp_par_year;}
if (isset($this->sc_temp_par_estudiante)) { $_SESSION['par_estudiante'] = $this->sc_temp_par_estudiante;}
if (isset($this->sc_temp_par_tipo_identif)) { $_SESSION['par_tipo_identif'] = $this->sc_temp_par_tipo_identif;}
if (isset($this->sc_temp_par_numero_doc)) { $_SESSION['par_numero_doc'] = $this->sc_temp_par_numero_doc;}
$_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off'; 
      }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['dados_select'];
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
          if ('validate_institucion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'institucion');
          }
          if ('validate_login' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'login');
          }
          if ('validate_pswd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pswd');
          }
          if ('validate_links' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'links');
          }
          app_Login_seguridad_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_institucion_onchange' == $this->NM_ajax_opcao)
          {
              $this->institucion_onChange();
          }
          app_Login_seguridad_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_institucion' == $this->NM_ajax_opcao)
          {
              $this->institucion = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['Lookup_institucion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['Lookup_institucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['Lookup_institucion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['Lookup_institucion'] = array(); 
    }
   $nm_comando = "SELECT SCHEMA_NAME FROM SCHEMATA WHERE (SCHEMA_NAME LIKE 'agoranet_%') AND SCHEMA_NAME LIKE '%" . substr($this->Db->qstr($this->institucion), 1, -1) . "%' ORDER BY SCHEMA_NAME";
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Ini->nm_db_conn_mysql_ge->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(app_Login_seguridad_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => app_Login_seguridad_pack_protect_string(NM_charset_to_utf8($rs->fields[0])));
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['Lookup_institucion'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql_ge->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $AjaxLim = 0;
              $aResponse = array();
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  $AjaxLim++;
                  if ($AjaxLim > 10)
                  {
                      break;
                  }
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $sLkpIndex = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpIndex);
                      $sLkpValue = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpValue);
                      $aResponse[] = array('label' => $sLkpValue, 'value' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($aResponse);
              exit;
          }
          app_Login_seguridad_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              app_Login_seguridad_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  app_Login_seguridad_pack_ajax_response();
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
          $_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  app_Login_seguridad_pack_ajax_response();
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
          $this->login = "" ;  
          $this->pswd = "" ;  
          $this->links = "" ;  
          $this->institucion = "agoranet_" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['dados_form'] as $NM_campo => $NM_valor)
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          app_Login_seguridad_pack_ajax_response();
          exit;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['campos']))
              { 
                  $institucion = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['campos'][0]; 
                  $login = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['campos'][1]; 
                  $pswd = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['campos'][2]; 
                  $links = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['campos'][3]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['campos'][0] = $this->institucion; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['campos'][1] = $this->login; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['campos'][2] = $this->pswd; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['campos'][3] = $this->links; 
          if (!empty($this->links))
          {
              $trab_saida = $this->links;
              $diretorio = explode("/", $trab_saida);
              if (count($diretorio) > 2 || count($diretorio) == 0 || strtolower(substr($this->links, 0, 7)) == "http://" || strtolower(substr($this->links, 0, 8)) == "https://" || strtolower(substr($this->links, 0, 3)) == "../")
              {
                  $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $trab_saida;
              }
              else
              {
                  if (count($diretorio) == 1)
                  {
                      $limpa_dir = 2;
                      $compoe_url = str_replace(".php", "", $trab_saida);
                      $trab_saida = SC_dir_app_name($compoe_url) . "/";
                  }
                  else
                  {
                     $limpa_dir = 3;
                     $trab_saida = $diretorio[0] . "/";
                     $compoe_url = str_replace(".php", "", $diretorio[1]);
                     $trab_saida .= $compoe_url . "/" . $compoe_url . ".php";
                  }
                  $trab_path             = explode("/", $_SERVER['PHP_SELF']);
                  $trab_count_path       = count($trab_path);
                  $path_retorno_aplicacao  = "";
                  for ($ix = 0; $ix + $limpa_dir < $trab_count_path; $ix++)
                  {
                       $path_retorno_aplicacao .=  $trab_path[$ix] . "/";
                  }
                  $path_retorno_aplicacao .=  $trab_saida;
                  $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $path_retorno_aplicacao;
                  $nm_apl_dependente = 1; 
               }
               $this->NM_close_db(); 
               $this->nmgp_redireciona(); 
               exit;
           }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("app_Login_seguridad", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("app_Login_seguridad_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
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
           $this->Ini->nm_db_conn_mysql_ge->Close(); 
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
           case 'institucion':
               return "Institución";
               break;
           case 'login':
               return "" . $this->Ini->Nm_lang['lang_sec_users_fild_login'] . "";
               break;
           case 'pswd':
               return "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . "";
               break;
           case 'links':
               return "Links";
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
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_app_Login_seguridad']) || !is_array($this->NM_ajax_info['errList']['geral_app_Login_seguridad']))
              {
                  $this->NM_ajax_info['errList']['geral_app_Login_seguridad'] = array();
              }
              $this->NM_ajax_info['errList']['geral_app_Login_seguridad'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'institucion' == $filtro)
        $this->ValidateField_institucion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "institucion";

      if ('' == $filtro || 'login' == $filtro)
        $this->ValidateField_login($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "login";

      if ('' == $filtro || 'pswd' == $filtro)
        $this->ValidateField_pswd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "pswd";

      if ('' == $filtro || 'links' == $filtro)
        $this->ValidateField_links($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "links";


      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_institucion = $this->institucion;
    $original_login = $this->login;
    $original_pswd = $this->pswd;
}
if (!isset($this->sc_temp_par_nota_maxima)) {$this->sc_temp_par_nota_maxima = (isset($_SESSION['par_nota_maxima'])) ? $_SESSION['par_nota_maxima'] : "";}
if (!isset($this->sc_temp_par_25)) {$this->sc_temp_par_25 = (isset($_SESSION['par_25'])) ? $_SESSION['par_25'] : "";}
if (!isset($this->sc_temp_par_24)) {$this->sc_temp_par_24 = (isset($_SESSION['par_24'])) ? $_SESSION['par_24'] : "";}
if (!isset($this->sc_temp_par_23)) {$this->sc_temp_par_23 = (isset($_SESSION['par_23'])) ? $_SESSION['par_23'] : "";}
if (!isset($this->sc_temp_par_22)) {$this->sc_temp_par_22 = (isset($_SESSION['par_22'])) ? $_SESSION['par_22'] : "";}
if (!isset($this->sc_temp_par_21)) {$this->sc_temp_par_21 = (isset($_SESSION['par_21'])) ? $_SESSION['par_21'] : "";}
if (!isset($this->sc_temp_par_20)) {$this->sc_temp_par_20 = (isset($_SESSION['par_20'])) ? $_SESSION['par_20'] : "";}
if (!isset($this->sc_temp_par_19)) {$this->sc_temp_par_19 = (isset($_SESSION['par_19'])) ? $_SESSION['par_19'] : "";}
if (!isset($this->sc_temp_par_18)) {$this->sc_temp_par_18 = (isset($_SESSION['par_18'])) ? $_SESSION['par_18'] : "";}
if (!isset($this->sc_temp_par_17)) {$this->sc_temp_par_17 = (isset($_SESSION['par_17'])) ? $_SESSION['par_17'] : "";}
if (!isset($this->sc_temp_par_16)) {$this->sc_temp_par_16 = (isset($_SESSION['par_16'])) ? $_SESSION['par_16'] : "";}
if (!isset($this->sc_temp_par_15)) {$this->sc_temp_par_15 = (isset($_SESSION['par_15'])) ? $_SESSION['par_15'] : "";}
if (!isset($this->sc_temp_par_14)) {$this->sc_temp_par_14 = (isset($_SESSION['par_14'])) ? $_SESSION['par_14'] : "";}
if (!isset($this->sc_temp_par_13)) {$this->sc_temp_par_13 = (isset($_SESSION['par_13'])) ? $_SESSION['par_13'] : "";}
if (!isset($this->sc_temp_par_12)) {$this->sc_temp_par_12 = (isset($_SESSION['par_12'])) ? $_SESSION['par_12'] : "";}
if (!isset($this->sc_temp_par_11)) {$this->sc_temp_par_11 = (isset($_SESSION['par_11'])) ? $_SESSION['par_11'] : "";}
if (!isset($this->sc_temp_par_10)) {$this->sc_temp_par_10 = (isset($_SESSION['par_10'])) ? $_SESSION['par_10'] : "";}
if (!isset($this->sc_temp_par_9)) {$this->sc_temp_par_9 = (isset($_SESSION['par_9'])) ? $_SESSION['par_9'] : "";}
if (!isset($this->sc_temp_par_8)) {$this->sc_temp_par_8 = (isset($_SESSION['par_8'])) ? $_SESSION['par_8'] : "";}
if (!isset($this->sc_temp_par_7)) {$this->sc_temp_par_7 = (isset($_SESSION['par_7'])) ? $_SESSION['par_7'] : "";}
if (!isset($this->sc_temp_par_6)) {$this->sc_temp_par_6 = (isset($_SESSION['par_6'])) ? $_SESSION['par_6'] : "";}
if (!isset($this->sc_temp_par_5)) {$this->sc_temp_par_5 = (isset($_SESSION['par_5'])) ? $_SESSION['par_5'] : "";}
if (!isset($this->sc_temp_par_4)) {$this->sc_temp_par_4 = (isset($_SESSION['par_4'])) ? $_SESSION['par_4'] : "";}
if (!isset($this->sc_temp_par_3)) {$this->sc_temp_par_3 = (isset($_SESSION['par_3'])) ? $_SESSION['par_3'] : "";}
if (!isset($this->sc_temp_par_2)) {$this->sc_temp_par_2 = (isset($_SESSION['par_2'])) ? $_SESSION['par_2'] : "";}
if (!isset($this->sc_temp_par_1)) {$this->sc_temp_par_1 = (isset($_SESSION['par_1'])) ? $_SESSION['par_1'] : "";}
if (!isset($this->sc_temp_modelo)) {$this->sc_temp_modelo = (isset($_SESSION['modelo'])) ? $_SESSION['modelo'] : "";}
if (!isset($this->sc_temp_logo_byte_80)) {$this->sc_temp_logo_byte_80 = (isset($_SESSION['logo_byte_80'])) ? $_SESSION['logo_byte_80'] : "";}
if (!isset($this->sc_temp_database)) {$this->sc_temp_database = (isset($_SESSION['database'])) ? $_SESSION['database'] : "";}
if (!isset($this->sc_temp_logo)) {$this->sc_temp_logo = (isset($_SESSION['logo'])) ? $_SESSION['logo'] : "";}
if (!isset($this->sc_temp_par_nombre_institucion)) {$this->sc_temp_par_nombre_institucion = (isset($_SESSION['par_nombre_institucion'])) ? $_SESSION['par_nombre_institucion'] : "";}
if (!isset($this->sc_temp_institucion)) {$this->sc_temp_institucion = (isset($_SESSION['institucion'])) ? $_SESSION['institucion'] : "";}
if (!isset($this->sc_temp_entorno)) {$this->sc_temp_entorno = (isset($_SESSION['entorno'])) ? $_SESSION['entorno'] : "";}
if (!isset($this->sc_temp_usr_email)) {$this->sc_temp_usr_email = (isset($_SESSION['usr_email'])) ? $_SESSION['usr_email'] : "";}
if (!isset($this->sc_temp_usr_name)) {$this->sc_temp_usr_name = (isset($_SESSION['usr_name'])) ? $_SESSION['usr_name'] : "";}
if (!isset($this->sc_temp_usr_priv_admin)) {$this->sc_temp_usr_priv_admin = (isset($_SESSION['usr_priv_admin'])) ? $_SESSION['usr_priv_admin'] : "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
     $slogin = $this->Db->qstr($this->login );
$spswd = $this->Db->qstr(($this->pswd ));
$database = $this->institucion ;
$entorno = date('Y');


$check_sql = "SELECT nombre_inst,logo, logo_byte"
   . " FROM datos_institucion"
   . " WHERE id = 1 ";
 
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
  $par_nombre_institucion = $this->rs[0][0];
	 $logo = '<img src=../_lib/file/img/'.$this->rs[0][1].' width="80" height="80">';
	$datos_logo_byte = base64_encode($this->rs[0][2]);
  
}
		else     
{
	    $par_nombre_institucion = '';
        $logo = '';
}


$check_sql = "SELECT * "
   . " FROM parametros_planilla_eval";
 
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
    $this->sc_temp_modelo =$this->rs[0][0];
    $this->sc_temp_par_1 = $this->rs[0][1];
	$this->sc_temp_par_2 = $this->rs[0][2];
    $this->sc_temp_par_3 = $this->rs[0][3];
	$this->sc_temp_par_4 = $this->rs[0][4];
    $this->sc_temp_par_5 = $this->rs[0][5];
	$this->sc_temp_par_6 = $this->rs[0][6];
    $this->sc_temp_par_7 = $this->rs[0][7];
	$this->sc_temp_par_8 = $this->rs[0][8];
    $this->sc_temp_par_9 = $this->rs[0][9];
	$this->sc_temp_par_10 = $this->rs[0][10];
    $this->sc_temp_par_11 = $this->rs[0][11];
	$this->sc_temp_par_12 = $this->rs[0][12];
    $this->sc_temp_par_13 = $this->rs[0][13];
	$this->sc_temp_par_14 = $this->rs[0][14];
    $this->sc_temp_par_15 = $this->rs[0][15];
	$this->sc_temp_par_16 = $this->rs[0][16];
    $this->sc_temp_par_17 = $this->rs[0][17];
	$this->sc_temp_par_18 = $this->rs[0][18];
    $this->sc_temp_par_19 = $this->rs[0][19];
	$this->sc_temp_par_20 = $this->rs[0][20];
    $this->sc_temp_par_21 = $this->rs[0][21];
	$this->sc_temp_par_22 = $this->rs[0][22];
    $this->sc_temp_par_23 = $this->rs[0][23];
	$this->sc_temp_par_24 = $this->rs[0][24];
    $this->sc_temp_par_25 = $this->rs[0][25];
	
    
}
		else     
{
	$this->sc_temp_modelo = '';
    $this->sc_temp_par_1 = '';
	$this->sc_temp_par_2 = '';
    $this->sc_temp_par_3 = '';
	$this->sc_temp_par_4 = '';
    $this->sc_temp_par_5 = '';
	$this->sc_temp_par_6 = '';
    $this->sc_temp_par_7 = '';
	$this->sc_temp_par_8 = '';
    $this->sc_temp_par_9 = '';
	$this->sc_temp_par_10 = '';
    $this->sc_temp_par_11 = '';
	$this->sc_temp_par_12 = '';
    $this->sc_temp_par_13 = '';
	$this->sc_temp_par_14 = '';
    $this->sc_temp_par_15 = '';
	$this->sc_temp_par_16 = '';
    $this->sc_temp_par_17 = '';
	$this->sc_temp_par_18 = '';
    $this->sc_temp_par_19 = '';
	$this->sc_temp_par_20 = '';
    $this->sc_temp_par_21 = '';
	$this->sc_temp_par_22 = '';
    $this->sc_temp_par_23 = '';
	$this->sc_temp_par_24 = '';
    $this->sc_temp_par_25 = '';
	


}


$check_sql = "SELECT Superior FROM valoracion";
   
 
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
    $this->sc_temp_par_nota_maxima = $this->rs[0][0];
    
}
		else     
{
		   $this->sc_temp_par_nota_maxima = '';
    
}





$sql = "SELECT 
		priv_admin,
		active, 
		name, 
		email 
	      FROM sec_users 
	      WHERE login = $slogin
		AND pswd = ".$spswd."";
	
 
      $nm_select = $sql; 
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
	
if(count($this->rs ) == 0)
{
	;
	;
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .=  $this->Ini->Nm_lang['lang_error_login'] ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_app_Login_seguridad' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] =  $this->Ini->Nm_lang['lang_error_login'] ;
 }
;
}
else if($this->rs[0][1] == 'Y')
{
	$usr_login		= $this->login ;
	$usr_priv_admin 	= ($this->rs[0][0] == 'Y') ? TRUE : FALSE;
	$usr_name		= $this->rs[0][2];
	$usr_email		= $this->rs[0][3];
	$logo_byte_80 = '<img src="data:image/png;base64,' . $datos_logo_byte . '"  height="80" />';
	 if (isset($usr_login)) {$this->sc_temp_usr_login = $usr_login;}
;
	 if (isset($usr_priv_admin)) {$this->sc_temp_usr_priv_admin = $usr_priv_admin;}
;
	 if (isset($usr_name)) {$this->sc_temp_usr_name = $usr_name;}
;
	 if (isset($usr_email)) {$this->sc_temp_usr_email = $usr_email;}
;
	 if (isset($entorno)) {$this->sc_temp_entorno = $entorno;}
;
	 if (isset($this->institucion)) {$this->sc_temp_institucion = $this->institucion;}
;
	 if (isset($par_nombre_institucion)) {$this->sc_temp_par_nombre_institucion = $par_nombre_institucion;}
;
	 if (isset($logo)) {$this->sc_temp_logo = $logo;}
;
	 if (isset($database)) {$this->sc_temp_database = $database;}
;
	 if (isset($logo_byte_80)) {$this->sc_temp_logo_byte_80 = $logo_byte_80;}
;
	
	
	
}
else
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .=  $this->Ini->Nm_lang['lang_error_not_active'] ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_app_Login_seguridad' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] =  $this->Ini->Nm_lang['lang_error_not_active'] ;
 }
;
	if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
 if (isset($this->sc_temp_usr_priv_admin)) { $_SESSION['usr_priv_admin'] = $this->sc_temp_usr_priv_admin;}
 if (isset($this->sc_temp_usr_name)) { $_SESSION['usr_name'] = $this->sc_temp_usr_name;}
 if (isset($this->sc_temp_usr_email)) { $_SESSION['usr_email'] = $this->sc_temp_usr_email;}
 if (isset($this->sc_temp_entorno)) { $_SESSION['entorno'] = $this->sc_temp_entorno;}
 if (isset($this->sc_temp_institucion)) { $_SESSION['institucion'] = $this->sc_temp_institucion;}
 if (isset($this->sc_temp_par_nombre_institucion)) { $_SESSION['par_nombre_institucion'] = $this->sc_temp_par_nombre_institucion;}
 if (isset($this->sc_temp_logo)) { $_SESSION['logo'] = $this->sc_temp_logo;}
 if (isset($this->sc_temp_database)) { $_SESSION['database'] = $this->sc_temp_database;}
 if (isset($this->sc_temp_logo_byte_80)) { $_SESSION['logo_byte_80'] = $this->sc_temp_logo_byte_80;}
 if (isset($this->sc_temp_modelo)) { $_SESSION['modelo'] = $this->sc_temp_modelo;}
 if (isset($this->sc_temp_par_1)) { $_SESSION['par_1'] = $this->sc_temp_par_1;}
 if (isset($this->sc_temp_par_2)) { $_SESSION['par_2'] = $this->sc_temp_par_2;}
 if (isset($this->sc_temp_par_3)) { $_SESSION['par_3'] = $this->sc_temp_par_3;}
 if (isset($this->sc_temp_par_4)) { $_SESSION['par_4'] = $this->sc_temp_par_4;}
 if (isset($this->sc_temp_par_5)) { $_SESSION['par_5'] = $this->sc_temp_par_5;}
 if (isset($this->sc_temp_par_6)) { $_SESSION['par_6'] = $this->sc_temp_par_6;}
 if (isset($this->sc_temp_par_7)) { $_SESSION['par_7'] = $this->sc_temp_par_7;}
 if (isset($this->sc_temp_par_8)) { $_SESSION['par_8'] = $this->sc_temp_par_8;}
 if (isset($this->sc_temp_par_9)) { $_SESSION['par_9'] = $this->sc_temp_par_9;}
 if (isset($this->sc_temp_par_10)) { $_SESSION['par_10'] = $this->sc_temp_par_10;}
 if (isset($this->sc_temp_par_11)) { $_SESSION['par_11'] = $this->sc_temp_par_11;}
 if (isset($this->sc_temp_par_12)) { $_SESSION['par_12'] = $this->sc_temp_par_12;}
 if (isset($this->sc_temp_par_13)) { $_SESSION['par_13'] = $this->sc_temp_par_13;}
 if (isset($this->sc_temp_par_14)) { $_SESSION['par_14'] = $this->sc_temp_par_14;}
 if (isset($this->sc_temp_par_15)) { $_SESSION['par_15'] = $this->sc_temp_par_15;}
 if (isset($this->sc_temp_par_16)) { $_SESSION['par_16'] = $this->sc_temp_par_16;}
 if (isset($this->sc_temp_par_17)) { $_SESSION['par_17'] = $this->sc_temp_par_17;}
 if (isset($this->sc_temp_par_18)) { $_SESSION['par_18'] = $this->sc_temp_par_18;}
 if (isset($this->sc_temp_par_19)) { $_SESSION['par_19'] = $this->sc_temp_par_19;}
 if (isset($this->sc_temp_par_20)) { $_SESSION['par_20'] = $this->sc_temp_par_20;}
 if (isset($this->sc_temp_par_21)) { $_SESSION['par_21'] = $this->sc_temp_par_21;}
 if (isset($this->sc_temp_par_22)) { $_SESSION['par_22'] = $this->sc_temp_par_22;}
 if (isset($this->sc_temp_par_23)) { $_SESSION['par_23'] = $this->sc_temp_par_23;}
 if (isset($this->sc_temp_par_24)) { $_SESSION['par_24'] = $this->sc_temp_par_24;}
 if (isset($this->sc_temp_par_25)) { $_SESSION['par_25'] = $this->sc_temp_par_25;}
 if (isset($this->sc_temp_par_nota_maxima)) { $_SESSION['par_nota_maxima'] = $this->sc_temp_par_nota_maxima;}
    if ($this->NM_ajax_flag)
    {
        $_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off';
        app_Login_seguridad_pack_ajax_response();
        exit;
    }
    $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro);
    $_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off';
    $this->Campos_Mens_erro = "";
    if ($this->nmgp_opcao == "incluir") {$this->nmgp_opcao = "novo";};
    $this->nm_formatar_campos();
    $this->nm_gera_html();
    $this->NM_close_db();
    exit;
}
}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_usr_priv_admin)) { $_SESSION['usr_priv_admin'] = $this->sc_temp_usr_priv_admin;}
if (isset($this->sc_temp_usr_name)) { $_SESSION['usr_name'] = $this->sc_temp_usr_name;}
if (isset($this->sc_temp_usr_email)) { $_SESSION['usr_email'] = $this->sc_temp_usr_email;}
if (isset($this->sc_temp_entorno)) { $_SESSION['entorno'] = $this->sc_temp_entorno;}
if (isset($this->sc_temp_institucion)) { $_SESSION['institucion'] = $this->sc_temp_institucion;}
if (isset($this->sc_temp_par_nombre_institucion)) { $_SESSION['par_nombre_institucion'] = $this->sc_temp_par_nombre_institucion;}
if (isset($this->sc_temp_logo)) { $_SESSION['logo'] = $this->sc_temp_logo;}
if (isset($this->sc_temp_database)) { $_SESSION['database'] = $this->sc_temp_database;}
if (isset($this->sc_temp_logo_byte_80)) { $_SESSION['logo_byte_80'] = $this->sc_temp_logo_byte_80;}
if (isset($this->sc_temp_modelo)) { $_SESSION['modelo'] = $this->sc_temp_modelo;}
if (isset($this->sc_temp_par_1)) { $_SESSION['par_1'] = $this->sc_temp_par_1;}
if (isset($this->sc_temp_par_2)) { $_SESSION['par_2'] = $this->sc_temp_par_2;}
if (isset($this->sc_temp_par_3)) { $_SESSION['par_3'] = $this->sc_temp_par_3;}
if (isset($this->sc_temp_par_4)) { $_SESSION['par_4'] = $this->sc_temp_par_4;}
if (isset($this->sc_temp_par_5)) { $_SESSION['par_5'] = $this->sc_temp_par_5;}
if (isset($this->sc_temp_par_6)) { $_SESSION['par_6'] = $this->sc_temp_par_6;}
if (isset($this->sc_temp_par_7)) { $_SESSION['par_7'] = $this->sc_temp_par_7;}
if (isset($this->sc_temp_par_8)) { $_SESSION['par_8'] = $this->sc_temp_par_8;}
if (isset($this->sc_temp_par_9)) { $_SESSION['par_9'] = $this->sc_temp_par_9;}
if (isset($this->sc_temp_par_10)) { $_SESSION['par_10'] = $this->sc_temp_par_10;}
if (isset($this->sc_temp_par_11)) { $_SESSION['par_11'] = $this->sc_temp_par_11;}
if (isset($this->sc_temp_par_12)) { $_SESSION['par_12'] = $this->sc_temp_par_12;}
if (isset($this->sc_temp_par_13)) { $_SESSION['par_13'] = $this->sc_temp_par_13;}
if (isset($this->sc_temp_par_14)) { $_SESSION['par_14'] = $this->sc_temp_par_14;}
if (isset($this->sc_temp_par_15)) { $_SESSION['par_15'] = $this->sc_temp_par_15;}
if (isset($this->sc_temp_par_16)) { $_SESSION['par_16'] = $this->sc_temp_par_16;}
if (isset($this->sc_temp_par_17)) { $_SESSION['par_17'] = $this->sc_temp_par_17;}
if (isset($this->sc_temp_par_18)) { $_SESSION['par_18'] = $this->sc_temp_par_18;}
if (isset($this->sc_temp_par_19)) { $_SESSION['par_19'] = $this->sc_temp_par_19;}
if (isset($this->sc_temp_par_20)) { $_SESSION['par_20'] = $this->sc_temp_par_20;}
if (isset($this->sc_temp_par_21)) { $_SESSION['par_21'] = $this->sc_temp_par_21;}
if (isset($this->sc_temp_par_22)) { $_SESSION['par_22'] = $this->sc_temp_par_22;}
if (isset($this->sc_temp_par_23)) { $_SESSION['par_23'] = $this->sc_temp_par_23;}
if (isset($this->sc_temp_par_24)) { $_SESSION['par_24'] = $this->sc_temp_par_24;}
if (isset($this->sc_temp_par_25)) { $_SESSION['par_25'] = $this->sc_temp_par_25;}
if (isset($this->sc_temp_par_nota_maxima)) { $_SESSION['par_nota_maxima'] = $this->sc_temp_par_nota_maxima;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_institucion != $this->institucion || (isset($bFlagRead_institucion) && $bFlagRead_institucion)))
    {
        $this->ajax_return_values_institucion(true);
    }
    if (($original_login != $this->login || (isset($bFlagRead_login) && $bFlagRead_login)))
    {
        $this->ajax_return_values_login(true);
    }
    if (($original_pswd != $this->pswd || (isset($bFlagRead_pswd) && $bFlagRead_pswd)))
    {
        $this->ajax_return_values_pswd(true);
    }
}
$_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off'; 
      }
      }
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
              $_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
     

$check_sql = "SELECT login, group_id"
   . " FROM sec_users_groups"
   . " WHERE login = '" . $this->sc_temp_usr_login . "'";
 
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
    $rich_login = $this->rs[0][0];
    $rich_group_id = $this->rs[0][1];
}
		else     
{
		    $rich_login = '';
          $rich_group_id = '';
}








$sql = "SELECT 
		app_name,
		priv_access,
		priv_insert,
		priv_delete,
		priv_update,
		priv_export,
		priv_print
	      FROM sec_groups_apps
	      WHERE group_id IN
	          (SELECT
		       group_id
		   FROM
		       sec_users_groups 
		   WHERE
		       login = '". $this->sc_temp_usr_login ."')";
		
	
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
if ($this->rs  !== false)
{
	while (!$this->rs->EOF)
	{
		if( $this->rs->fields[1] == 'Y')
		{
		    $_SESSION['scriptcase']['sc_apl_seg'][$this->rs->fields[0]] = "on";;
		}
		else
		{
		    $_SESSION['scriptcase']['sc_apl_seg'][$this->rs->fields[0]] = "off";;
		}

		$_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['insert'] = $this->has_priv($this->rs->fields[2]);
		$_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['delete'] = $this->has_priv($this->rs->fields[3]);
		$_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['update'] = $this->has_priv($this->rs->fields[4]);
		$export_permission = 'btn_display_'.$this->has_priv($this->rs->fields[5]);
		if ($export_permission == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['xls'] = 'on';
}
elseif ($export_permission == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['xls'] = 'off';
}
elseif ($export_permission == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['xls'] = 'on';
}
elseif ($export_permission == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['xls'] = 'off';
}
elseif ($export_permission == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission]['xls'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission] = 'xls';
}
;
		if ($export_permission == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['word'] = 'on';
}
elseif ($export_permission == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['word'] = 'off';
}
elseif ($export_permission == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['word'] = 'on';
}
elseif ($export_permission == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['word'] = 'off';
}
elseif ($export_permission == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission]['word'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission] = 'word';
}
;
		if ($export_permission == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['pdf'] = 'on';
}
elseif ($export_permission == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['pdf'] = 'off';
}
elseif ($export_permission == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['pdf'] = 'on';
}
elseif ($export_permission == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['pdf'] = 'off';
}
elseif ($export_permission == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission]['pdf'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission] = 'pdf';
}
;
		if ($export_permission == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['xml'] = 'on';
}
elseif ($export_permission == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['xml'] = 'off';
}
elseif ($export_permission == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['xml'] = 'on';
}
elseif ($export_permission == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['xml'] = 'off';
}
elseif ($export_permission == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission]['xml'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission] = 'xml';
}
;
		if ($export_permission == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['csv'] = 'on';
}
elseif ($export_permission == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['csv'] = 'off';
}
elseif ($export_permission == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['csv'] = 'on';
}
elseif ($export_permission == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['csv'] = 'off';
}
elseif ($export_permission == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission]['csv'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission] = 'csv';
}
;
		if ($export_permission == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['rtf'] = 'on';
}
elseif ($export_permission == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['rtf'] = 'off';
}
elseif ($export_permission == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['rtf'] = 'on';
}
elseif ($export_permission == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['rtf'] = 'off';
}
elseif ($export_permission == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission]['rtf'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission] = 'rtf';
}
;
		
		$export_permission = 'btn_display_'.$this->has_priv($this->rs->fields[6]);
		if ($export_permission == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['print'] = 'on';
}
elseif ($export_permission == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['btn_display']['print'] = 'off';
}
elseif ($export_permission == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['print'] = 'on';
}
elseif ($export_permission == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]]['field_display']['print'] = 'off';
}
elseif ($export_permission == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission]['print'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$this->rs->fields[0]][$export_permission] = 'print';
}
;

		$this->rs->MoveNext();	
	}
	$this->rs->Close();
	
		;
	
 if( $rich_group_id == 2){
      if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('menu_docentes') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
 }else{
	
	 if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('menu') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };	
	}
}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_institucion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['php_cmp_required']['institucion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['php_cmp_required']['institucion'] == "on")) 
      { 
          if ($this->institucion == "")  
          { 
              $Campos_Falta[] =  "Institución" ; 
              if (!isset($Campos_Erros['institucion']))
              {
                  $Campos_Erros['institucion'] = array();
              }
              $Campos_Erros['institucion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['institucion']) || !is_array($this->NM_ajax_info['errList']['institucion']))
                  {
                      $this->NM_ajax_info['errList']['institucion'] = array();
                  }
                  $this->NM_ajax_info['errList']['institucion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->institucion) > 20) 
          { 
              $Campos_Crit .= "Institución " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['institucion']))
              {
                  $Campos_Erros['institucion'] = array();
              }
              $Campos_Erros['institucion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['institucion']) || !is_array($this->NM_ajax_info['errList']['institucion']))
              {
                  $this->NM_ajax_info['errList']['institucion'] = array();
              }
              $this->NM_ajax_info['errList']['institucion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_institucion

    function ValidateField_login(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['php_cmp_required']['login']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['php_cmp_required']['login'] == "on")) 
      { 
          if ($this->login == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_sec_users_fild_login'] . "" ; 
              if (!isset($Campos_Erros['login']))
              {
                  $Campos_Erros['login'] = array();
              }
              $Campos_Erros['login'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['login']) || !is_array($this->NM_ajax_info['errList']['login']))
                  {
                      $this->NM_ajax_info['errList']['login'] = array();
                  }
                  $this->NM_ajax_info['errList']['login'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->login) > 255) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_users_fild_login'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['login']))
              {
                  $Campos_Erros['login'] = array();
              }
              $Campos_Erros['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['login']) || !is_array($this->NM_ajax_info['errList']['login']))
              {
                  $this->NM_ajax_info['errList']['login'] = array();
              }
              $this->NM_ajax_info['errList']['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_login

    function ValidateField_pswd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['php_cmp_required']['pswd']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['php_cmp_required']['pswd'] == "on")) 
      { 
          if ($this->pswd == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . "" ; 
              if (!isset($Campos_Erros['pswd']))
              {
                  $Campos_Erros['pswd'] = array();
              }
              $Campos_Erros['pswd'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['pswd']) || !is_array($this->NM_ajax_info['errList']['pswd']))
                  {
                      $this->NM_ajax_info['errList']['pswd'] = array();
                  }
                  $this->NM_ajax_info['errList']['pswd'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pswd) > 32) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pswd']))
              {
                  $Campos_Erros['pswd'] = array();
              }
              $Campos_Erros['pswd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pswd']) || !is_array($this->NM_ajax_info['errList']['pswd']))
              {
                  $this->NM_ajax_info['errList']['pswd'] = array();
              }
              $this->NM_ajax_info['errList']['pswd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_pswd

    function ValidateField_links(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->links) != "")  
          { 
          } 
      } 
    } // ValidateField_links

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
    $this->nmgp_dados_form['institucion'] = $this->institucion;
    $this->nmgp_dados_form['login'] = $this->login;
    $this->nmgp_dados_form['pswd'] = $this->pswd;
    $this->nmgp_dados_form['links'] = $this->links;
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['dados_form'] = $this->nmgp_dados_form;
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
          $this->ajax_return_values_institucion();
          $this->ajax_return_values_login();
          $this->ajax_return_values_pswd();
          $this->ajax_return_values_links();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- institucion
   function ajax_return_values_institucion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("institucion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->institucion);
              $aLookup = array();
              $this->_tmp_lookup_institucion = $this->institucion;

   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['Lookup_institucion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['Lookup_institucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['Lookup_institucion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['Lookup_institucion'] = array(); 
    }
   $nm_comando = "SELECT SCHEMA_NAME FROM SCHEMATA WHERE (SCHEMA_NAME LIKE 'agoranet_%') AND SCHEMA_NAME = '" . substr($this->Db->qstr($this->institucion), 1, -1) . "' ORDER BY SCHEMA_NAME";
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Ini->nm_db_conn_mysql_ge->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(app_Login_seguridad_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => app_Login_seguridad_pack_protect_string(NM_charset_to_utf8($rs->fields[0])));
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['Lookup_institucion'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql_ge->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['institucion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['institucion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['institucion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['institucion']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][app_Login_seguridad_pack_protect_string(NM_charset_to_utf8($this->institucion))]) ? $aLookup[0][app_Login_seguridad_pack_protect_string(NM_charset_to_utf8($this->institucion))] : "";
          $this->NM_ajax_info['fldList']['institucion_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- login
   function ajax_return_values_login($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("login", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->login);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['login'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pswd
   function ajax_return_values_pswd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pswd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pswd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pswd'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

          //----- links
   function ajax_return_values_links($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("links", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->links);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['links'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['upload_dir'][$fieldName][] = $newName;
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
function has_priv($param)
{
$_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'on';
     
return ($param == 'Y' ? 'on' : 'off');

$_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off';
}
function institucion_onChange()
{
$_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'on';
     
$original_institucion = $this->institucion;


if (isset($_SESSION['scriptcase']['sc_connection_edit']))
{
    unset($_SESSION['scriptcase']['sc_connection_edit']);
}



$arr_conn = array();

$arr_conn['user'] = "root";
$arr_conn['password'] = "";
$arr_conn['database'] = $this->institucion ;



sc_connection_edit("conn_mysql", $arr_conn);



$modificado_institucion = $this->institucion;
$this->nm_formatar_campos('institucion');
if ($original_institucion !== $modificado_institucion || (isset($bFlagRead_institucion) && $bFlagRead_institucion))
{
    $this->ajax_return_values_institucion(true);
}
app_Login_seguridad_pack_ajax_response();
exit;
$_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              app_Login_seguridad_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['retorno_edit'] . "';";
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
    if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
    $_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'on';
     clearstatcache();


$_SESSION['scriptcase']['sc_apl_conf']['app_form_add_users']['start'] = 'new';
$form_bg = "../_lib/img/grp__NM__bg__NM__punto3.gif";

$button_normal = "../_lib/img/grp__NM__buttonOK.png";
$button_hover = "../_lib/img/grp__NM__buttonOK_h.png";

$titleimgset = array();
$titleimgset['en_us'] = "../_lib/img/grp__NM__title.png";
$titleimgset['pt_br'] = "../_lib/img/grp__NM__title_pt.png";
$titleimgset['pt_pt'] = "../_lib/img/grp__NM__title_pt.png";
$titleimgset['es'] = "../_lib/img/grp__NM__bg__NM__titulo7.png";

$bgset = array();
$bgset[] = "../_lib/img/grp__NM__bg__NM__fondov2.jpg";
$bgset[] = "../_lib/img/grp__NM__bg__NM__fondov2.jpg";
$bgset[] = "../_lib/img/grp__NM__bg__NM__fondov2.jpg";

$selectbg = rand(0, (count($bgset)-1));
$img = $bgset[$selectbg];
$lang = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "en_us";
$title_img = (isset($titleimgset[$lang]) && !empty($titleimgset[$lang])) ? $titleimgset[$lang] : $titleimgset['en_us'];

echo "
<div class='bgphoto'><div><div><div class='titleLabel'></div></div></div></div>
<div class='userLogin'>

</div>
<style>
.scFormPage{
	background: url(".$form_bg.");
	margin:0;
}
.bgphoto{
	position: absolute;
	height: 100%;
	width: 100%;
	min-width: 1024px;
	min-height: 768px;
    z-index: -1;
}
.bgphoto>div{
	position: relative;
	height: 100%;
	width: 100%;
}
.bgphoto>div>div{
	background-image: url(".$img.");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
	height:100%;
	width:70%;
	position: absolute;
	left: 0px;
	box-shadow: -8px 0px 7px 10px #121212;
}
.titleLabel{
	background-image: url(".$title_img.");
	height: 152px;
	width: 502px;
	position: absolute;
	top: 50%;
	margin-top: -76px;
	right: 0;
}
form[name=F1]{
	width: 100%;
	height: 100%;
	min-width: 1024px;
	min-height: 768px;
	position: absolute;
	-webkit-box-sizing: border-box; 
    -moz-box-sizing: border-box;   
    box-sizing: border-box;
}
form[name=F1]>table{
	margin: 0 5% 0 0;
	-webkit-box-sizing: border-box; 
    -moz-box-sizing: border-box;   
    box-sizing: border-box;
	position: absolute;
	top: 50%;
	margin-top: -114px;
	right: 0px;
	background: #333;
	border: 0;
	width: 20%;
	box-shadow: 0px 0px 8px 0px #101010;
}
form[name=F1]>table td,form[name=F1]>table tr, form[name=F1]>table table, form[name=F1]>table div{
	background: transparent !important;
	border: 0 !important;
	
}
.scFormLabelOddFormat{
	color: #fff;	
}
#id_sc_field_login:hover{
	
}
#id_sc_field_login{
	width: 97%;
	box-shadow: inset 1px 2px 3px 0px #121212;
	border-radius: 3px;	
	margin-top: 5px;
	height: 25px;
	border-color: transparent;
	border: 0;
}
#id_sc_field_passwd:hover{
	
}
#id_sc_field_pswd{
	width: 97%;
	box-shadow: inset 1px 2px 3px 0px #121212;
	border-radius: 3px;	
	margin-top: 5px;
	height: 25px;
	border-color: transparent;
	border: 0;
}
#id_sc_field_cod_institucion:hover{
	
}
#id_sc_field_cod_institucion{
	width: 97%;
	box-shadow: inset 1px 2px 3px 0px #121212;
	border-radius: 3px;	
	margin-top: 5px;
	height: 25px;
	border-color: transparent;
	border: 0;
}
.scFormToolbar{
	padding: 0 0 10px 0 !important;
}
#sub_form_b{
	background-image: url(".$button_normal.");
	background-position: right;
	padding: 10px 60px 9px 20px;
	width: 154px;
	color: #fff;
	text-shadow: 1px 1px 1px #666;
	font-size: 14px;
	overflow: hidden;
	-webkit-box-sizing: border-box; 
    -moz-box-sizing: border-box;   
    box-sizing: border-box;
	border-radius: 5px;
	border: solid 1px #E48810;
}
#sub_form_b:hover{
	background-image: url(".$button_hover.");
}
.userLogin{
	position: absolute;
	height: 100%;
	width: 100%;
	
	min-width: 1024px;
	min-height: 768px;
}
.userLogin>div{
	color: #fff;
	position: absolute;
	top: 75%;
	right: 9%;
	background-color: gray;
	padding: 10px;
	border-radius: 5px;
	box-shadow: 0px 0px 8px 0px #101010;
}
.userLogin>div>div{
	padding-top: 10px;
	font-size: 10pt;
	font-family: Arial, sans-serif;
}
#id_error_display_fixed{
top: 200px !important;
left: 75% !important;
z-index: 100;
}

/* max-width */
@media screen and (max-width: 800px)
{ 
	.scFormPage{
	background: #333;
	}

	.bgphoto{
	display:none;
	}
	
	form[name=F1]{
	width: 100%;
	height: 100%;
	position: relative;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	min-width: 0px;
	min-height: 0px;
	max-height: 213px;
	max-width: 210px;
	margin: 75px auto;
	}



	form[name=F1]>table {
	margin: auto;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	position: relative;
	top: 15%;
	margin-top: auto;
	right: 0px;
	margin: auto;
	background: #333;
	border: 0;
	width: 50%;
	box-shadow: 0px 0px 8px 0px #101010;
	max-width: 230px;
	}



	.userLogin{
	position: relative;
	height: 150px;
	width: 230px;
	margin: auto;
	min-height: 150px;
	min-width: 230px;
	max-width: 230px;
	max-height: 150px;
	}

	.userLogin>div{
	color: #fff;
	position: absolute;
	top: 35%;
	background-color: gray;
	padding: 10px;
	border-radius: 5px;
	box-shadow: 0px 0px 8px 0px #101010;
	/* left: 6%; */
	right: 0;
	}

	.userLogin>div>div{
	padding-top: 10px;
	font-size: 10pt;
	font-family: Arial, sans-serif;
	}

}
</style>

";
$_SESSION['scriptcase']['app_Login_seguridad']['contr_erro'] = 'off'; 
    }
    if (!empty($this->Campos_Mens_erro)) 
    {
        $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
    }
    $this->nm_formatar_campos();
    include_once("app_Login_seguridad_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              app_Login_seguridad_pack_ajax_response();
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_app_Login_seguridad = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['total'] = $qt_geral_reg_app_Login_seguridad;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          app_Login_seguridad_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          app_Login_seguridad_pack_ajax_response();
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
      
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['decimal_db'] == ".")
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['sc_outra_jan'])
   {
       $nmgp_saida_form = "app_Login_seguridad_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['nm_run_menu'] = 2;
       $nmgp_saida_form = "app_Login_seguridad_fim.php";
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
       app_Login_seguridad_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login_seguridad']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           app_Login_seguridad_pack_ajax_response();
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
       app_Login_seguridad_pack_ajax_response();
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
       if ($this->Ini->nm_db_conn_mysql_ge)
       {
           $this->Ini->nm_db_conn_mysql_ge->Close();
       }
       exit;
   }
}
}
?>