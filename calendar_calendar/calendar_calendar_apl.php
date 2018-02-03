<?php
//
class calendar_calendar_apl
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
   var $id;
   var $login;
   var $title;
   var $description;
   var $start_date;
   var $start_time;
   var $end_date;
   var $end_time;
   var $recurrence;
   var $recurrence_1;
   var $period;
   var $period_1;
   var $__calend_all_day__;
   var $__calend_all_day___1;
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
   var $is_calendar_app = true;
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
          if (isset($this->NM_ajax_info['param']['__calend_all_day__']))
          {
              $this->__calend_all_day__ = $this->NM_ajax_info['param']['__calend_all_day__'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['description']))
          {
              $this->description = $this->NM_ajax_info['param']['description'];
          }
          if (isset($this->NM_ajax_info['param']['end_date']))
          {
              $this->end_date = $this->NM_ajax_info['param']['end_date'];
          }
          if (isset($this->NM_ajax_info['param']['end_time']))
          {
              $this->end_time = $this->NM_ajax_info['param']['end_time'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
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
          if (isset($this->NM_ajax_info['param']['period']))
          {
              $this->period = $this->NM_ajax_info['param']['period'];
          }
          if (isset($this->NM_ajax_info['param']['recurrence']))
          {
              $this->recurrence = $this->NM_ajax_info['param']['recurrence'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['start_date']))
          {
              $this->start_date = $this->NM_ajax_info['param']['start_date'];
          }
          if (isset($this->NM_ajax_info['param']['start_time']))
          {
              $this->start_time = $this->NM_ajax_info['param']['start_time'];
          }
          if (isset($this->NM_ajax_info['param']['title']))
          {
              $this->title = $this->NM_ajax_info['param']['title'];
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
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["usr_login"])) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["usr_login"])) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['calendar_calendar']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['calendar_calendar']['embutida_parms']);
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
                 nm_limpa_str_calendar_calendar($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['calendar_calendar']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['calendar_calendar']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['parms']);
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

      if ('' == $this->nmgp_opcao && !$this->NM_ajax_flag)
      {
          $this->nmgp_opcao = 'calendar';
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['calendar_calendar']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new calendar_calendar_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['calendar_calendar']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['calendar_calendar']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['calendar_calendar'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['calendar_calendar']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['calendar_calendar']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('calendar_calendar') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['calendar_calendar']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - calendar";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "calendar_calendar")
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
      $this->nm_new_label['__calend_all_day__'] = '' . $this->Ini->Nm_lang['lang_per_allday'] . '';

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



      $_SESSION['scriptcase']['error_icon']['calendar_calendar']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['calendar_calendar'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_orig'] = " where login = '" . $_SESSION['usr_login'] . "'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_pesq'] = " where login = '" . $_SESSION['usr_login'] . "'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_calendar']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }

      $this->nmgp_botoes['first']   = "off";
      $this->nmgp_botoes['back']    = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last']    = "off";

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("calendar_calendar", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'calendar_calendar/calendar_calendar_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'calendar_calendar_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'calendar_calendar_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'calendar_calendar_help.txt');
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
          require_once($this->Ini->path_embutida . 'calendar_calendar/calendar_calendar_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "calendar_calendar_erro.class.php"); 
      }
      $this->Erro      = new calendar_calendar_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['calendar_calendar']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->login)) { $this->nm_limpa_alfa($this->login); }
      if (isset($this->title)) { $this->nm_limpa_alfa($this->title); }
      if (isset($this->description)) { $this->nm_limpa_alfa($this->description); }
      if (isset($this->recurrence)) { $this->nm_limpa_alfa($this->recurrence); }
      if (isset($this->period)) { $this->nm_limpa_alfa($this->period); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- start_date
      $this->field_config['start_date']                 = array();
      $this->field_config['start_date']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['start_date']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['start_date']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'start_date');
      //-- start_time
      $this->field_config['start_time']                 = array();
      $this->field_config['start_time']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['start_time']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['start_time']['date_display'] = "hhiiss";
      $this->new_date_format('HH', 'start_time');
      //-- end_date
      $this->field_config['end_date']                 = array();
      $this->field_config['end_date']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['end_date']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['end_date']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'end_date');
      //-- end_time
      $this->field_config['end_time']                 = array();
      $this->field_config['end_time']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['end_time']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['end_time']['date_display'] = "hhiiss";
      $this->new_date_format('HH', 'end_time');
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
      $this->calendarConfigValues = array(
          'insert'           => 'on' == $this->nmgp_botoes['insert'],
          'update'           => 'on' == $this->nmgp_botoes['update'],
          'delete'           => 'on' == $this->nmgp_botoes['delete'],
          'eventColorPast'   => 'scCalendarEventPast',
          'eventColorToday'  => 'scCalendarEventOnDay',
          'eventColorFuture' => 'scCalendarEventFuture',
      );
      if ('calendar' == $this->nmgp_opcao)
      {
          $this->calendarOutputDisplay();
          exit;
      }
      elseif ('calendar_fetch' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents();
          $this->calendarOutputJson($this->calendarNormalizeEvents($aEvents));
          exit;
      }
      elseif ('calendar_drop' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarDragDrop());
          exit;
      }
      elseif ('calendar_resize' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarResize());
          exit;
      }
      elseif ('calendar_print' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents('', true);
          $this->calendarOutputJson($this->calendarPrintEvents($this->calendarNormalizeEvents($aEvents)));
          exit;
      }

      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id');
          }
          if ('validate_title' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'title');
          }
          if ('validate_description' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'description');
          }
          if ('validate_start_date' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'start_date');
          }
          if ('validate_start_time' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'start_time');
          }
          if ('validate_end_date' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_date');
          }
          if ('validate_end_time' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_time');
          }
          if ('validate_recurrence' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'recurrence');
          }
          if ('validate_period' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'period');
          }
          if ('validate___calend_all_day__' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, '__calend_all_day__');
          }
          if ('validate_login' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'login');
          }
          calendar_calendar_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->__calend_all_day__))
          {
              $x = 0; 
              $this->__calend_all_day___1 = $this->__calend_all_day__;
              $this->__calend_all_day__ = ""; 
              if ($this->__calend_all_day___1 != "") 
              { 
                  foreach ($this->__calend_all_day___1 as $dados___calend_all_day___1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->__calend_all_day__ .= ";";
                      } 
                      $this->__calend_all_day__ .= $dados___calend_all_day___1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              calendar_calendar_pack_ajax_response();
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
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['calendar_calendar']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  calendar_calendar_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_redir_atualiz'] == "ok")
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
          calendar_calendar_pack_ajax_response();
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
          calendar_calendar_pack_ajax_response();
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
           case 'id':
               return "Id";
               break;
           case 'title':
               return "Titulo";
               break;
           case 'description':
               return "Descripción";
               break;
           case 'start_date':
               return "Fecha Inicio";
               break;
           case 'start_time':
               return "Hora Inicio";
               break;
           case 'end_date':
               return "Fecha Final";
               break;
           case 'end_time':
               return "Hora Final";
               break;
           case 'recurrence':
               return "Recurrencia";
               break;
           case 'period':
               return "Período";
               break;
           case '__calend_all_day__':
               return "" . $this->Ini->Nm_lang['lang_per_allday'] . "";
               break;
           case 'login':
               return "Login";
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
              if (!isset($this->NM_ajax_info['errList']['geral_calendar_calendar']) || !is_array($this->NM_ajax_info['errList']['geral_calendar_calendar']))
              {
                  $this->NM_ajax_info['errList']['geral_calendar_calendar'] = array();
              }
              $this->NM_ajax_info['errList']['geral_calendar_calendar'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['bypass_required_time']['start_time'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['bypass_required_time']['end_time'] = true;
      }
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "id";

      if ('' == $filtro || 'title' == $filtro)
        $this->ValidateField_title($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "title";

      if ('' == $filtro || 'description' == $filtro)
        $this->ValidateField_description($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "description";

      if ('' == $filtro || 'start_date' == $filtro)
        $this->ValidateField_start_date($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "start_date";

      if ('' == $filtro || 'start_time' == $filtro)
        $this->ValidateField_start_time($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "start_time";

      if ('' == $filtro || 'end_date' == $filtro)
        $this->ValidateField_end_date($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "end_date";

      if ('' == $filtro || 'end_time' == $filtro)
        $this->ValidateField_end_time($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "end_time";

      if ('' == $filtro || 'recurrence' == $filtro)
        $this->ValidateField_recurrence($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "recurrence";

      if ('' == $filtro || 'period' == $filtro)
        $this->ValidateField_period($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "period";

      if ('' == $filtro || '__calend_all_day__' == $filtro)
        $this->ValidateField___calend_all_day__($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "__calend_all_day__";

      if ('' == $filtro || 'login' == $filtro)
        $this->ValidateField_login($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "login";

      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['bypass_required_time']['start_time'] = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['bypass_required_time']['end_time'] = false;

      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
          $this->start_time = '';
          $this->end_time = '';
      }

//-- converter datas   
      $this->nm_converte_datas();
//---
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

    function ValidateField_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id) > $iTestSize)  
              { 
                  $Campos_Crit .= "Id: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Id; " ; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id

    function ValidateField_title(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['php_cmp_required']['title']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['php_cmp_required']['title'] == "on")) 
      { 
          if ($this->title == "")  
          { 
              $Campos_Falta[] =  "Titulo" ; 
              if (!isset($Campos_Erros['title']))
              {
                  $Campos_Erros['title'] = array();
              }
              $Campos_Erros['title'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['title']) || !is_array($this->NM_ajax_info['errList']['title']))
                  {
                      $this->NM_ajax_info['errList']['title'] = array();
                  }
                  $this->NM_ajax_info['errList']['title'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->title) > 300) 
          { 
              $Campos_Crit .= "Titulo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['title']))
              {
                  $Campos_Erros['title'] = array();
              }
              $Campos_Erros['title'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['title']) || !is_array($this->NM_ajax_info['errList']['title']))
              {
                  $this->NM_ajax_info['errList']['title'] = array();
              }
              $this->NM_ajax_info['errList']['title'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_title

    function ValidateField_description(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->description) > 32767) 
          { 
              $Campos_Crit .= "Descripción " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['description']))
              {
                  $Campos_Erros['description'] = array();
              }
              $Campos_Erros['description'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['description']) || !is_array($this->NM_ajax_info['errList']['description']))
              {
                  $this->NM_ajax_info['errList']['description'] = array();
              }
              $this->NM_ajax_info['errList']['description'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_description

    function ValidateField_start_date(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->start_date, $this->field_config['start_date']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['start_date']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['start_date']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['start_date']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['start_date']['date_sep']) ; 
          if (trim($this->start_date) != "")  
          { 
              if ($teste_validade->Data($this->start_date, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Fecha Inicio; " ; 
                  if (!isset($Campos_Erros['start_date']))
                  {
                      $Campos_Erros['start_date'] = array();
                  }
                  $Campos_Erros['start_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['start_date']) || !is_array($this->NM_ajax_info['errList']['start_date']))
                  {
                      $this->NM_ajax_info['errList']['start_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['start_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif ((!$this->NM_ajax_flag || 'validate_start_date' != $this->NM_ajax_opcao) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['php_cmp_required']['start_date']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['php_cmp_required']['start_date'] == "on")) 
           { 
              $Campos_Falta[] = "Fecha Inicio" ; 
              if (!isset($Campos_Erros['start_date']))
              {
                  $Campos_Erros['start_date'] = array();
              }
              $Campos_Erros['start_date'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['start_date']) || !is_array($this->NM_ajax_info['errList']['start_date']))
                  {
                      $this->NM_ajax_info['errList']['start_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['start_date'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['start_date']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_start_date

    function ValidateField_start_time(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_hora($this->start_time, $this->field_config['start_time']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['start_time']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['start_time']['time_sep']) ; 
          if (trim($this->start_time) != "")  
          { 
              if ($teste_validade->Hora($this->start_time, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Hora Inicio; " ; 
                  if (!isset($Campos_Erros['start_time']))
                  {
                      $Campos_Erros['start_time'] = array();
                  }
                  $Campos_Erros['start_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['start_time']) || !is_array($this->NM_ajax_info['errList']['start_time']))
                  {
                      $this->NM_ajax_info['errList']['start_time'] = array();
                  }
                  $this->NM_ajax_info['errList']['start_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_start_time

    function ValidateField_end_date(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->end_date, $this->field_config['end_date']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['end_date']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['end_date']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['end_date']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['end_date']['date_sep']) ; 
          if (trim($this->end_date) != "")  
          { 
              if ($teste_validade->Data($this->end_date, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Fecha Final; " ; 
                  if (!isset($Campos_Erros['end_date']))
                  {
                      $Campos_Erros['end_date'] = array();
                  }
                  $Campos_Erros['end_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['end_date']) || !is_array($this->NM_ajax_info['errList']['end_date']))
                  {
                      $this->NM_ajax_info['errList']['end_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['end_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['end_date']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_end_date

    function ValidateField_end_time(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_hora($this->end_time, $this->field_config['end_time']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['end_time']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['end_time']['time_sep']) ; 
          if (trim($this->end_time) != "")  
          { 
              if ($teste_validade->Hora($this->end_time, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Hora Final; " ; 
                  if (!isset($Campos_Erros['end_time']))
                  {
                      $Campos_Erros['end_time'] = array();
                  }
                  $Campos_Erros['end_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['end_time']) || !is_array($this->NM_ajax_info['errList']['end_time']))
                  {
                      $this->NM_ajax_info['errList']['end_time'] = array();
                  }
                  $this->NM_ajax_info['errList']['end_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_end_time

    function ValidateField_recurrence(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->recurrence == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
    } // ValidateField_recurrence

    function ValidateField_period(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->period == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
    } // ValidateField_period

    function ValidateField___calend_all_day__(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->__calend_all_day__ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->__calend_all_day__ = "";
      } 
      else 
      { 
          if (is_array($this->__calend_all_day__))
          {
              $x = 0; 
              $this->__calend_all_day___1 = array(); 
              foreach ($this->__calend_all_day__ as $ind => $dados___calend_all_day___1 ) 
              {
                  if ($dados___calend_all_day___1 !== "") 
                  {
                      $this->__calend_all_day___1[] = $dados___calend_all_day___1;
                  } 
              } 
              $this->__calend_all_day__ = ""; 
              foreach ($this->__calend_all_day___1 as $dados___calend_all_day___1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->__calend_all_day__ .= ";";
                   } 
                   $this->__calend_all_day__ .= $dados___calend_all_day___1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField___calend_all_day__

    function ValidateField_login(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->login) > 40) 
          { 
              $Campos_Crit .= "Login " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['login']))
              {
                  $Campos_Erros['login'] = array();
              }
              $Campos_Erros['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['login']) || !is_array($this->NM_ajax_info['errList']['login']))
              {
                  $this->NM_ajax_info['errList']['login'] = array();
              }
              $this->NM_ajax_info['errList']['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_login

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
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['title'] = $this->title;
    $this->nmgp_dados_form['description'] = $this->description;
    $this->nmgp_dados_form['start_date'] = $this->start_date;
    $this->nmgp_dados_form['start_time'] = $this->start_time;
    $this->nmgp_dados_form['end_date'] = $this->end_date;
    $this->nmgp_dados_form['end_time'] = $this->end_time;
    $this->nmgp_dados_form['recurrence'] = $this->recurrence;
    $this->nmgp_dados_form['period'] = $this->period;
    $this->nmgp_dados_form['__calend_all_day__'] = $this->__calend_all_day__;
    $this->nmgp_dados_form['login'] = $this->login;
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_data($this->start_date, $this->field_config['start_date']['date_sep']) ; 
      nm_limpa_hora($this->start_time, $this->field_config['start_time']['time_sep']) ; 
      nm_limpa_data($this->end_date, $this->field_config['end_date']['date_sep']) ; 
      nm_limpa_hora($this->end_time, $this->field_config['end_time']['time_sep']) ; 
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
      if ($Nome_Campo == "id")
      {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
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
      if (!empty($this->id) || (!empty($format_fields) && isset($format_fields['id'])))
      {
          nmgp_Form_Num_Val($this->id, $this->field_config['id']['symbol_grp'], $this->field_config['id']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id']['symbol_fmt']) ; 
      }
      if ((!empty($this->start_date) && 'null' != $this->start_date) || (!empty($format_fields) && isset($format_fields['start_date'])))
      {
          nm_volta_data($this->start_date, $this->field_config['start_date']['date_format']) ; 
          nmgp_Form_Datas($this->start_date, $this->field_config['start_date']['date_format'], $this->field_config['start_date']['date_sep']) ;  
      }
      elseif ('null' == $this->start_date || '' == $this->start_date)
      {
          $this->start_date = '';
      }
      if ((!empty($this->start_time) && 'null' != $this->start_time) || (!empty($format_fields) && isset($format_fields['start_time'])))
      {
          nm_volta_hora($this->start_time, $this->field_config['start_time']['date_format']) ; 
          nmgp_Form_Hora($this->start_time, $this->field_config['start_time']['date_format'], $this->field_config['start_time']['time_sep']) ;  
      }
      elseif ('null' == $this->start_time || '' == $this->start_time)
      {
          $this->start_time = '';
      }
      if ((!empty($this->end_date) && 'null' != $this->end_date) || (!empty($format_fields) && isset($format_fields['end_date'])))
      {
          nm_volta_data($this->end_date, $this->field_config['end_date']['date_format']) ; 
          nmgp_Form_Datas($this->end_date, $this->field_config['end_date']['date_format'], $this->field_config['end_date']['date_sep']) ;  
      }
      elseif ('null' == $this->end_date || '' == $this->end_date)
      {
          $this->end_date = '';
      }
      if ((!empty($this->end_time) && 'null' != $this->end_time) || (!empty($format_fields) && isset($format_fields['end_time'])))
      {
          nm_volta_hora($this->end_time, $this->field_config['end_time']['date_format']) ; 
          nmgp_Form_Hora($this->end_time, $this->field_config['end_time']['date_format'], $this->field_config['end_time']['time_sep']) ;  
      }
      elseif ('null' == $this->end_time || '' == $this->end_time)
      {
          $this->end_time = '';
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
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['start_date']['date_format'];
      if ($this->start_date != "")  
      { 
          nm_conv_data($this->start_date, $this->field_config['start_date']['date_format']) ; 
          $this->start_date_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->start_date_hora = substr($this->start_date_hora, 0, -4);
          }
      } 
      if ($this->start_date == "" && $use_null)  
      { 
          $this->start_date = "null" ; 
      } 
      $this->field_config['start_date']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['start_time']['date_format'];
      if ($this->start_time != "")  
      { 
          $this->start_time_hora = $this->start_time;
          $this->start_time = "1900-01-01";
          nm_conv_hora($this->start_time_hora, $this->field_config['start_time']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->start_time_hora = substr($this->start_time_hora, 0, -4);
          }
          $this->start_time = $this->start_time_hora;
      } 
      if ($this->start_time == "" && $use_null)  
      { 
          $this->start_time = "null" ; 
      } 
      $this->field_config['start_time']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['end_date']['date_format'];
      if ($this->end_date != "")  
      { 
          nm_conv_data($this->end_date, $this->field_config['end_date']['date_format']) ; 
          $this->end_date_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->end_date_hora = substr($this->end_date_hora, 0, -4);
          }
      } 
      if ($this->end_date == "" && $use_null)  
      { 
          $this->end_date = "null" ; 
      } 
      $this->field_config['end_date']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['end_time']['date_format'];
      if ($this->end_time != "")  
      { 
          $this->end_time_hora = $this->end_time;
          $this->end_time = "1900-01-01";
          nm_conv_hora($this->end_time_hora, $this->field_config['end_time']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->end_time_hora = substr($this->end_time_hora, 0, -4);
          }
          $this->end_time = $this->end_time_hora;
      } 
      if ($this->end_time == "" && $use_null)  
      { 
          $this->end_time = "null" ; 
      } 
      $this->field_config['end_time']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_id();
          $this->ajax_return_values_title();
          $this->ajax_return_values_description();
          $this->ajax_return_values_start_date();
          $this->ajax_return_values_start_time();
          $this->ajax_return_values_end_date();
          $this->ajax_return_values_end_time();
          $this->ajax_return_values_recurrence();
          $this->ajax_return_values_period();
          $this->ajax_return_values___calend_all_day__();
          $this->ajax_return_values_login();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = calendar_calendar_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

          //----- id
   function ajax_return_values_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- title
   function ajax_return_values_title($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("title", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->title);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['title'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- description
   function ajax_return_values_description($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("description", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->description);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['description'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- start_date
   function ajax_return_values_start_date($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("start_date", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->start_date);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['start_date'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- start_time
   function ajax_return_values_start_time($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("start_time", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->start_time);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['start_time'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- end_date
   function ajax_return_values_end_date($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_date", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_date);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_date'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- end_time
   function ajax_return_values_end_time($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_time", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_time);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_time'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- recurrence
   function ajax_return_values_recurrence($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("recurrence", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->recurrence);
              $aLookup = array();
              $this->_tmp_lookup_recurrence = $this->recurrence;

$aLookup[] = array(calendar_calendar_pack_protect_string('Y') => calendar_calendar_pack_protect_string("" . $this->Ini->Nm_lang['lang_peri_yes'] . ""));
$aLookup[] = array(calendar_calendar_pack_protect_string('N') => calendar_calendar_pack_protect_string("" . $this->Ini->Nm_lang['lang_peri_no'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup_recurrence'][] = 'Y';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup_recurrence'][] = 'N';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"recurrence\"";
          if (isset($this->NM_ajax_info['select_html']['recurrence']) && !empty($this->NM_ajax_info['select_html']['recurrence']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['recurrence'];
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

                  if ($this->recurrence == $sValue)
                  {
                      $this->_tmp_lookup_recurrence = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['recurrence'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['recurrence']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['recurrence']['valList'][$i] = calendar_calendar_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['recurrence']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['recurrence']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['recurrence']['labList'] = $aLabel;
          }
   }

          //----- period
   function ajax_return_values_period($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("period", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->period);
              $aLookup = array();
              $this->_tmp_lookup_period = $this->period;

$aLookup[] = array(calendar_calendar_pack_protect_string('D') => calendar_calendar_pack_protect_string("" . $this->Ini->Nm_lang['lang_recu_daily'] . ""));
$aLookup[] = array(calendar_calendar_pack_protect_string('W') => calendar_calendar_pack_protect_string("" . $this->Ini->Nm_lang['lang_recu_weekly'] . ""));
$aLookup[] = array(calendar_calendar_pack_protect_string('A') => calendar_calendar_pack_protect_string("" . $this->Ini->Nm_lang['lang_recu_annual'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup_period'][] = 'D';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup_period'][] = 'W';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup_period'][] = 'A';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"period\"";
          if (isset($this->NM_ajax_info['select_html']['period']) && !empty($this->NM_ajax_info['select_html']['period']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['period'];
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

                  if ($this->period == $sValue)
                  {
                      $this->_tmp_lookup_period = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['period'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['period']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['period']['valList'][$i] = calendar_calendar_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['period']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['period']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['period']['labList'] = $aLabel;
          }
   }

          //----- __calend_all_day__
   function ajax_return_values___calend_all_day__($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("__calend_all_day__", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->__calend_all_day__);
              $aLookup = array();
              $this->_tmp_lookup___calend_all_day__ = $this->__calend_all_day__;

$aLookup[] = array(calendar_calendar_pack_protect_string('Y') => calendar_calendar_pack_protect_string("" . $this->Ini->Nm_lang['lang_per_allday'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup___calend_all_day__'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['__calend_all_day__']) && !empty($this->NM_ajax_info['select_html']['__calend_all_day__']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['__calend_all_day__'];
          }
          $this->NM_ajax_info['fldList']['__calend_all_day__'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-__calend_all_day__',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['__calend_all_day__']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['__calend_all_day__']['valList'][$i] = calendar_calendar_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['__calend_all_day__']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['__calend_all_day__']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['__calend_all_day__']['labList'] = $aLabel;
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['upload_dir'][$fieldName][] = $newName;
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
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
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
      $NM_val_form['id'] = $this->id;
      $NM_val_form['title'] = $this->title;
      $NM_val_form['description'] = $this->description;
      $NM_val_form['start_date'] = $this->start_date;
      $NM_val_form['start_time'] = $this->start_time;
      $NM_val_form['end_date'] = $this->end_date;
      $NM_val_form['end_time'] = $this->end_time;
      $NM_val_form['recurrence'] = $this->recurrence;
      $NM_val_form['period'] = $this->period;
      $NM_val_form['__calend_all_day__'] = $this->__calend_all_day__;
      $NM_val_form['login'] = $this->login;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->login_before_qstr = $this->login;
          $this->login = substr($this->Db->qstr($this->login), 1, -1); 
          $this->title_before_qstr = $this->title;
          $this->title = substr($this->Db->qstr($this->title), 1, -1); 
          $this->description_before_qstr = $this->description;
          $this->description = substr($this->Db->qstr($this->description), 1, -1); 
          if ($this->start_date == "")  
          { 
              $this->start_date = "null"; 
              $NM_val_null[] = "start_date";
          } 
          if ($this->start_time == "")  
          { 
              $this->start_time = "null"; 
              $NM_val_null[] = "start_time";
          } 
          if ($this->end_date == "")  
          { 
              $this->end_date = "null"; 
              $NM_val_null[] = "end_date";
          } 
          if ($this->end_time == "")  
          { 
              $this->end_time = "null"; 
              $NM_val_null[] = "end_time";
          } 
          $this->recurrence_before_qstr = $this->recurrence;
          $this->recurrence = substr($this->Db->qstr($this->recurrence), 1, -1); 
          $this->period_before_qstr = $this->period;
          $this->period = substr($this->Db->qstr($this->period), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 calendar_calendar_pack_ajax_response();
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
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET login = '$this->login', title = '$this->title', description = '$this->description', start_date = " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", start_time = " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", end_date = " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", end_time = " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", recurrence = '$this->recurrence', period = '$this->period'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET login = '$this->login', title = '$this->title', description = '$this->description', start_date = " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", start_time = " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", end_date = " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", end_time = " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", recurrence = '$this->recurrence', period = '$this->period'";  
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE id = $this->id ";  
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
                                  calendar_calendar_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->login = $this->login_before_qstr;
          $this->title = $this->title_before_qstr;
          $this->description = $this->description_before_qstr;
          $this->recurrence = $this->recurrence_before_qstr;
          $this->period = $this->period_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['db_changed'] = true;

              $this->NM_ajax_info['calendarReload'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['login'])) { $this->login = $NM_val_form['login']; }
              elseif (isset($this->login)) { $this->nm_limpa_alfa($this->login); }
              if     (isset($NM_val_form) && isset($NM_val_form['title'])) { $this->title = $NM_val_form['title']; }
              elseif (isset($this->title)) { $this->nm_limpa_alfa($this->title); }
              if     (isset($NM_val_form) && isset($NM_val_form['description'])) { $this->description = $NM_val_form['description']; }
              elseif (isset($this->description)) { $this->nm_limpa_alfa($this->description); }
              if     (isset($NM_val_form) && isset($NM_val_form['recurrence'])) { $this->recurrence = $NM_val_form['recurrence']; }
              elseif (isset($this->recurrence)) { $this->nm_limpa_alfa($this->recurrence); }
              if     (isset($NM_val_form) && isset($NM_val_form['period'])) { $this->period = $NM_val_form['period']; }
              elseif (isset($this->period)) { $this->nm_limpa_alfa($this->period); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id', 'title', 'description', 'start_date', 'start_time', 'end_date', 'end_time', 'recurrence', 'period', '__calend_all_day__', 'login'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      calendar_calendar_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, title, description, start_date, start_time, end_date, end_time, recurrence, period) VALUES (" . $NM_seq_auto . "'$this->login', '$this->title', '$this->description', " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", '$this->recurrence', '$this->period')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "login, title, description, start_date, start_time, end_date, end_time, recurrence, period) VALUES (" . $NM_seq_auto . "'$this->login', '$this->title', '$this->description', " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", '$this->recurrence', '$this->period')"; 
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
                              calendar_calendar_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

              $this->sc_evento = "insert"; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id "); 
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          calendar_calendar_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

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
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if (('insert' == $this->sc_evento && 1 != $GLOBALS["erro_incl"]) || 'delete' == $this->sc_evento)
      {
          $this->calendarOutputReload();
          exit;
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['parms'] = ""; 
          $nmgp_select = "SELECT id, login, title, description, start_date, start_time, end_date, end_time, recurrence, period from " . $this->Ini->nm_tabela ; 
          $aWhere = array();
          $aWhere[] = "login = '" . $_SESSION['usr_login'] . "'";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
                 $aWhere[] = "id = $this->id"; 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "id";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['empty_filter'] = true;
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
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id = $rs->fields[0] ; 
              $this->nmgp_dados_select['id'] = $this->id;
              $this->login = $rs->fields[1] ; 
              $this->nmgp_dados_select['login'] = $this->login;
              $this->title = $rs->fields[2] ; 
              $this->nmgp_dados_select['title'] = $this->title;
              $this->description = $rs->fields[3] ; 
              $this->nmgp_dados_select['description'] = $this->description;
              $this->start_date = $rs->fields[4] ; 
              $this->nmgp_dados_select['start_date'] = $this->start_date;
              $this->start_time = $rs->fields[5] ; 
              $this->nmgp_dados_select['start_time'] = $this->start_time;
              $this->end_date = $rs->fields[6] ; 
              $this->nmgp_dados_select['end_date'] = $this->end_date;
              $this->end_time = $rs->fields[7] ; 
              $this->nmgp_dados_select['end_time'] = $this->end_time;
              $this->recurrence = $rs->fields[8] ; 
              $this->nmgp_dados_select['recurrence'] = $this->recurrence;
              $this->period = $rs->fields[9] ; 
              $this->nmgp_dados_select['period'] = $this->period;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id = (string)$this->id; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['reg_start'] < $qt_geral_reg_calendar_calendar;
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opcao']   = '';
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
              $this->id = "";  
              $this->login = "" . $_SESSION['usr_login'] . "";  
              $this->title = "";  
              $this->description = "";  
              $this->start_date = "";  
              $this->start_date_hora = "" ;  
              $this->start_time = "";  
              $this->start_time_hora = "" ;  
              $this->end_date = "";  
              $this->end_date_hora = "" ;  
              $this->end_time = "";  
              $this->end_time_hora = "" ;  
              $this->recurrence = "";  
              $this->period = "";  
              $this->__calend_all_day__ = "";  
              $this->formatado = false;
          }

          if (isset($this->sc_cal_click_date) && isset($this->sc_cal_click_time))
          {
              list($iTimestampIni, $iTimestampEnd) = $this->calendarInitTimestamp();

              $sTimeFormat1 = 'true' == $this->sc_cal_click_allday ? ''          : 'H:i:s';
              $sTimeFormat2 = 'true' == $this->sc_cal_click_allday ? ' 00:00:00' : ' H:i:s';

              $this->start_date = date('Y-m-d', $iTimestampIni);
              $this->start_time = date($sTimeFormat1, $iTimestampIni);
              $this->end_date = date('Y-m-d', $iTimestampEnd);
              $this->end_time = date($sTimeFormat1, $iTimestampEnd);
          }

          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['foreign_key'] as $sFKName => $sFKValue)
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              calendar_calendar_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }

    if (('' == $this->start_time || '00:00:00' == $this->start_time) && ('' == $this->end_time || '00:00:00' == $this->end_time))
    {
        $this->__calend_all_day__ = 'Y';
    }

    include_once("calendar_calendar_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function calendarOutputDisplay()
   {
       if (isset($_SESSION['scriptcase']['reg_conf']['date_format']) && '' != $_SESSION['scriptcase']['reg_conf']['date_format'])
       {
           $iPosDay     = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'd');
           $iPosMonth   = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'm');
           $sCalDateCol = (false !== $iPosDay && false !== $iPosMonth && $iPosDay > $iPosMonth) ? 'M/d' : 'd/M';
       }
       else
       {
           $sCalDateCol = 'M/d';
       }

       $iFirstDay = isset($_SESSION['scriptcase']['reg_conf']['date_week_ini']) && '' != $_SESSION['scriptcase']['reg_conf']['date_week_ini'] ? array_search($_SESSION['scriptcase']['reg_conf']['date_week_ini'], array('SU', 'MO', 'TU', 'WE', 'TH', 'FR', 'SA')) : false;
       $iFirstDay = false === $iFirstDay ? 0 : $iFirstDay;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <title></title>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/fullcalendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <script type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
 </script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/fullcalendar.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/gcal.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <script type="text/javascript">
  function calendar_reload() {
    $('#calendar').fullCalendar('refetchEvents');
  }
  $(document).ready(function() {
    $('#calendar').fullCalendar({
      monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
      monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
      dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
      dayNamesShort: ["<?php   echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
      allDayText: "<?php       echo html_entity_decode($this->Ini->Nm_lang["lang_per_allday"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);     ?>",
      buttonText: {
        today: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
        month: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_month"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
        week: "<?php   echo html_entity_decode($this->Ini->Nm_lang["lang_per_week"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);        ?>",
        day: "<?php    echo html_entity_decode($this->Ini->Nm_lang["lang_per_day"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);         ?>",
        agenda: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
        print: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);  ?>"
      },
      columnFormat: {
        month: 'ddd',
        week: 'ddd <?php echo $sCalDateCol; ?>',
        day: 'dddd <?php echo $sCalDateCol; ?>'
      },
      firstDay: <?php echo $iFirstDay; ?>,
      header: {
        left: 'prev,next today print',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,scAgenda'
      },
      printUrl: "calendar_calendar.php",
      editable: <?php echo ($this->calendarConfigValues['update'] ? 'true' : 'false'); ?>,
      events: 'calendar_calendar.php?nmgp_opcao=calendar_fetch',
      dayClick: function(date, allDay, jsEvent, view) {
<?php
       if ($this->calendarConfigValues['insert'])
       {
?>
        var sDate = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate(),
            sTime = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
        scAddNewEvent(sDate, sTime, allDay);
<?php
}
else
{
?>
        tb_show('', 'calendar_calendar.php?nmgp_opcao=edit_novo&sc_cal_click_date=' + sDate + '&sc_cal_click_time=' + sTime + '&sc_cal_click_allday=' + allDay + '&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
<?php
}

?>
<?php
       }
?>
      },
      eventClick: function(calEvent, jsEvent, view) {
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
        scEditEvent(calEvent.id);
<?php
}
else
{
?>
        tb_show('', 'calendar_calendar.php?nmgp_opcao=igual&id=' + calEvent.id + '&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
<?php
}

?>
      },
      eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {
        $.ajax({
          url: 'calendar_calendar.php',
          type: 'POST',
          dataType: 'json',
          data: { 'nmgp_opcao': 'calendar_drop', 'sc_event_id': event.id, 'sc_day_delta': dayDelta, 'sc_time_delta': minuteDelta, 'sc_all_day': allDay, 'sc_all_day_before': event.originalAllDay },
          originalEvent: event,
          success: function(data) {
            var bChanged = false;
            if (false == data['status']) {
              revertFunc();
            }
            else {
              if ('' != data['backgroundColor']) {
                if (this.originalEvent.backgroundColor != data['backgroundColor']) {
                  bChanged = true;
                }
                this.originalEvent.backgroundColor = data['backgroundColor'];
              }
              if ('' != data['borderColor']) {
                if (this.originalEvent.borderColor != data['borderColor']) {
                  bChanged = true;
                }
                this.originalEvent.borderColor = data['borderColor'];
              }
              if (this.originalEvent.allDay || this.originalEvent.originalAllDay || bChanged) {
                $('#calendar').fullCalendar('refetchEvents');
              }
              else {
                $('#calendar').fullCalendar('updateEvent', this.originalEvent);
              }
            }
            if ('' != data['message']) {
              alert(data['message']);
            }
          }
        });
      },
      eventResize: function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view) {
        $.post(
          'calendar_calendar.php',
          { 'nmgp_opcao': 'calendar_resize', 'sc_event_id': event.id, 'sc_day_delta': dayDelta, 'sc_time_delta': minuteDelta },
          function(data) {
            if (false == data['status']) {
              revertFunc();
            }
            if ('' != data['message']) {
              alert(data['message']);
            }
          },
          'json'
        );
      },
      defaultView: 'agendaWeek',
      axisFormat: 'h(:mm)tt',
      timeFormat: 'h(:mm)tt'
    });
  });
  function scAddNewEvent(sDate, sTime, allDay) {
    $("#sc-ui-nmgp_opcao").val("edit_novo");
    $("#sc-ui-click-date").val(sDate);
    $("#sc-ui-click-time").val(sTime);
    $("#sc-ui-click-allday").val(allDay);
    $("#sc-ui-form").submit();
  }
  function scEditEvent(sEventId) {
    $("#sc-ui-nmgp_opcao").val("igual");
    $("#sc-ui-event-id").val(sEventId);
    $("#sc-ui-form").submit();
  }
 </script>
</head>
<body class="scAppCalendarPage">
<div id="calendar"></div>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
<form name="F1" id="sc-ui-form" method="post"
      action="./"
      target="_self">
 <input type="hidden" name="nm_form_submit" value="1" />
 <input type="hidden" name="nmgp_url_saida" value="" />
 <input type="hidden" name="nmgp_opcao" id="sc-ui-nmgp_opcao" value="" />
 <input type="hidden" name="nmgp_parms" value="" />
 <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>" />
 <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>" />
 <input type="hidden" name="sc_cal_click_date" id="sc-ui-click-date" value="" />
 <input type="hidden" name="sc_cal_click_time" id="sc-ui-click-time" value="" />
 <input type="hidden" name="sc_cal_click_allday" id="sc-ui-click-allday" value="" />
 <input type="hidden" name="id" id="sc-ui-event-id" value="" />
</form>
<?php
}

?>
</body>
</html>
<?php
   } // calendarOutputDisplay

   function calendarOutputJson($events)
   {
       if (!isset($_GET['nmgp_opcao']) || ($_GET['nmgp_opcao'] != 'igual' && $_GET['nmgp_opcao'] != 'edit_novo'))
       {
            $Temp = ob_get_clean();
       }
       $oJson = new Services_JSON();
       echo $oJson->encode($events);
   } // calendarOutputJson

   function calendarOutputReload()
   {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
 <script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></script>
 <script type="text/javascript">
  $(document).ready(function() {
    self.parent.calendar_reload();
    self.parent.tb_remove();
  });
 </script>
</head>
<body>
</body>
</html>
<?php
   } // calendarOutputReload

   function calendarFetchEvents($sId = '', $bPrintCalendar = false)
   {
       $aEvents = array_merge($this->calendarFetchNormalEvents($sId, $bPrintCalendar), $this->calendarFetchRecurrentEvents($sId, $bPrintCalendar));

       foreach ($aEvents as $iEvent => $aEventData)
       {
           if ($aEventData['start'] < date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorPast'];
           }
           elseif ($aEventData['start'] > date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorFuture'];
           }
           else
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorToday'];
           }
       }

       return $aEvents;
   } // calendarFetchEvents

   function calendarFetchNormalEvents($sId, $bPrintCalendar = false)
   {
       $aSelect = $this->calendarFetchSelect();

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $this->calendarWhere($sId, false, $bPrintCalendar);
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array();

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           $aEvents[] = $aEvent;

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchNormalEvents

   function calendarFetchRecurrentEvents($sId, $bPrintCalendar = false)
   {
       if ('' != $sId)
       {
           return array();
       }

       $aSelect = $this->calendarFetchSelect();

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $this->calendarWhere($sId, true, $bPrintCalendar);
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       if (!$bPrintCalendar)
       {
           $sStart = isset($_GET['start']) && '' != $_GET['start'] ? date('Ymd', $_GET['start']) : '';
           $sEnd   = isset($_GET['end'])   && '' != $_GET['end']   ? date('Ymd', $_GET['end'])   : '';
       }
       else
       {
           $sStart = isset($_GET['start']) && '' != $_GET['start'] ? str_replace('-', '', $_GET['start']) : '';
           $sEnd   = isset($_GET['end'])   && '' != $_GET['end']   ? str_replace('-', '', $_GET['end'])   : '';
       }

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array();

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           switch ($aEvent['period'])
           {
               case 'D':
                   $this->calendarRecurrentDay($aEvents, $aEvent, $sStart, $sEnd);
                   break;

               case 'W':
                   $this->calendarRecurrentWeek($aEvents, $aEvent, $sStart, $sEnd);
                   break;

               case 'M':
                   $this->calendarRecurrentMonth($aEvents, $aEvent, $sStart, $sEnd);
                   break;

               case 'A':
                   $this->calendarRecurrentYear($aEvents, $aEvent, $sStart, $sEnd);
                   break;
           }

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchRecurrentEvents

   function calendarFetchSelect()
   {
       $aSelect = array();

       $aSelect['id'] = "id";

       $aSelect['title'] = "title";

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start'] = "convert(char(23),start_date,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start'] = "str_replace(convert(char(10),start_date,102), '.', '-') + ' ' + convert(char(8),start_date,20)";
       }
       else
       {
           $aSelect['start'] = "start_date";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['end'] = "convert(char(23),end_date,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['end'] = "str_replace(convert(char(10),end_date,102), '.', '-') + ' ' + convert(char(8),end_date,20)";
       }
       else
       {
           $aSelect['end'] = "end_date";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start_time'] = "convert(char(23),start_time,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start_time'] = "str_replace(convert(char(10),start_time,102), '.', '-') + ' ' + convert(char(8),start_time,20)";
       }
       else
       {
           $aSelect['start_time'] = "start_time";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['end_time'] = "convert(char(23),end_time,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['end_time'] = "str_replace(convert(char(10),end_time,102), '.', '-') + ' ' + convert(char(8),end_time,20)";
       }
       else
       {
           $aSelect['end_time'] = "end_time";
       }

       $aSelect['period'] = "period";

       return $aSelect;
   } // calendarFetchSelect

   function calendarWhere($sId, $bRecur, $bPrintCalendar = false)
   {
       if ('' != $sId)
       {
           return " WHERE id = " . $sId;
       }

       $aWhere = array();

       $sStart = isset($_GET['start']) && '' != $_GET['start'] ? $_GET['start'] : '';
       $sEnd   = isset($_GET['end'])   && '' != $_GET['end']   ? $_GET['end']   : '';

       if ('' != $sStart && '' != $sEnd)
       {
           if (!$bPrintCalendar)
           {
               $s_Ini_StartFormat = date('Y-m-d', $sStart);
               $s_Ini_EndFormat   = date('Y-m-d', $sEnd);
           }
           else
           {
               $s_Ini_StartFormat = $sStart;
               $s_Ini_EndFormat   = $sEnd;
           }
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
           {
               $aWhere[] = "convert(char(23),start_date,121) >= '" . $s_Ini_StartFormat . "' AND convert(char(23),start_date,121) <= '" . $s_Ini_EndFormat . "'";
           }
           elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
           {
               $aWhere[] = "str_replace(convert(char(10),start_date,102), '.', '-') + ' ' + convert(char(8),start_date,20) >= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),start_date,102), '.', '-') + ' ' + convert(char(8),start_date,20) <= '" . $s_Ini_EndFormat . "'";
           }
           elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
           {
               $aWhere[] = "start_date >= #" . $s_Ini_StartFormat . "# AND start_date <= #" . $s_Ini_EndFormat . "#";
           }
           else
           {
               $aWhere[] = "start_date >= '" . $s_Ini_StartFormat . "' AND start_date <= '" . $s_Ini_EndFormat . "'";
           }

           if (!$bPrintCalendar)
           {
               $s_Fin_StartFormat = date('Y-m-d', $sStart);
               $s_Fin_EndFormat   = date('Y-m-d', $sEnd);
           }
           else
           {
               $s_Fin_StartFormat = $sStart;
               $s_Fin_EndFormat   = $sEnd;
           }
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
           {
               $aWhere[] = "convert(char(23),end_date,121) >= '" . $s_Fin_StartFormat . "' AND convert(char(23),end_date,121) <= '" . $s_Fin_EndFormat . "'";
               $aWhere[] = "convert(char(23),start_date,121) <= '" . $s_Ini_StartFormat . "' AND convert(char(23),end_date,121) >= '" . $s_Fin_EndFormat . "'";
           }
           elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
           {
               $aWhere[] = "str_replace(convert(char(10),end_date,102), '.', '-') + ' ' + convert(char(8),end_date,20) >= '" . $s_Fin_StartFormat . "' AND str_replace(convert(char(10),end_date,102), '.', '-') + ' ' + convert(char(8),end_date,20) <= '" . $s_Fin_EndFormat . "'";
               $aWhere[] = "str_replace(convert(char(10),start_date,102), '.', '-') + ' ' + convert(char(8),start_date,20) <= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),end_date,102), '.', '-') + ' ' + convert(char(8),end_date,20) >= '" . $s_Fin_EndFormat . "'";
           }
           elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
           {
               $aWhere[] = "end_date >= #" . $s_Fin_StartFormat . "# AND end_date <= #" . $s_Fin_EndFormat . "#";
               $aWhere[] = "start_date <= #" . $s_Ini_StartFormat . "# AND end_date >= #" . $s_Fin_EndFormat . "#";
           }
           else
           {
               $aWhere[] = "end_date >= '" . $s_Fin_StartFormat . "' AND end_date <= '" . $s_Fin_EndFormat . "'";
               $aWhere[] = "start_date <= '" . $s_Ini_StartFormat . "' AND end_date >= '" . $s_Fin_EndFormat . "'";
           }
       }

       $aFinal = array('(' . implode(') OR (', $aWhere) . ')');

       $aFinal[] = "recurrence " . ($bRecur ? "=" : "<>") . " 'Y'";
       $cWhere = array();
       $sc_where_filter = '';
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter_form'])
       {
           $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter_form'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter'])
       {
           if (empty($sc_where_filter))
           {
               $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter'];
           }
           else
           {
               $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter'] . ")";
           }
       }
       $cWhere[] = "login = '" . $_SESSION['usr_login'] . "'";
       $cWhere[] = $sc_where_filter;
       $wUsr     = $this->returnWhere($cWhere);
       if (!empty($wUsr))
       {
           $aFinal[] = substr(trim($wUsr), 5);
       }

       return empty($aWhere) && empty($cWhere) ? '' : ' WHERE (' . implode(') AND (', $aFinal) . ')';
   } // calendarWhere

   function calendarRecurrentDay(&$aEvents, $aEvent, $sStart, $sEnd)
   {
       $iStartDate = $this->calendarStartToTimestamp($aEvent);
       $sOrigDate  = date('Ymd', $iStartDate);
       $sStartDate = date('Ymd', $iStartDate);
       $sStartTime = date('His', $iStartDate);

       $i = 1;
       while ($sStartDate < $sEnd)
       {
           $iEndDate = $this->calendarEndToTimestamp($aEvent);
           if (false === $iEndDate)
           {
               $iEndDate = $iStartDate;
           }
           $sEndDate = date('Ymd', $iEndDate);
           $sEndTime = date('His', $iEndDate);

           if ($sStart < $sStartDate && $sEnd > $sStartDate && $sStartDate <= $sEndDate)
           {
               $aNewEvent = $aEvent;
               $this->calendarTimestampToStart($aNewEvent, $this->calendarGetMktime($sStartDate, $sStartTime));
               $this->calendarTimestampToEnd($aNewEvent, $this->calendarGetMktime($sStartDate, $sEndTime));

               $aEvents[] = $aNewEvent;
           }

           $sStartDate = $this->calendarRecurrentAddDay($sOrigDate, $i);
           $i++;
       }
   } // calendarRecurrentDay

   function calendarRecurrentWeek(&$aEvents, $aEvent, $sStart, $sEnd)
   {
       $iStartDate = $this->calendarStartToTimestamp($aEvent);
       $sOrigDate  = date('Ymd', $iStartDate);
       $sStartDate = date('Ymd', $iStartDate);
       $sStartTime = date('His', $iStartDate);

       $i = 1;
       while ($sStartDate < $sEnd)
       {
           $iEndDate = $this->calendarEndToTimestamp($aEvent);
           if (false === $iEndDate)
           {
               $iEndDate = $iStartDate;
           }
           $sEndDate = date('Ymd', $iEndDate);
           $sEndTime = date('His', $iEndDate);

           if ($sStart < $sStartDate && $sEnd > $sStartDate && $sStartDate <= $sEndDate)
           {
               $aNewEvent = $aEvent;
               $this->calendarTimestampToStart($aNewEvent, $this->calendarGetMktime($sStartDate, $sStartTime));
               $this->calendarTimestampToEnd($aNewEvent, $this->calendarGetMktime($sStartDate, $sEndTime));

               $aEvents[] = $aNewEvent;
           }

           $sStartDate = $this->calendarRecurrentAddDay($sOrigDate, $i * 7);
           $i++;
       }
   } // calendarRecurrentWeek

   function calendarRecurrentMonth(&$aEvents, $aEvent, $sStart, $sEnd)
   {
       $iStartDate = $this->calendarStartToTimestamp($aEvent);
       $sOrigDate  = date('Ymd', $iStartDate);
       $sStartDate = date('Ymd', $iStartDate);
       $sStartTime = date('His', $iStartDate);

       $i = 1;
       while ($sStartDate < $sEnd)
       {
           $iEndDate = $this->calendarEndToTimestamp($aEvent);
           if (false === $iEndDate)
           {
               $iEndDate = $iStartDate;
           }
           $sEndDate = date('Ymd', $iEndDate);
           $sEndTime = date('His', $iEndDate);

           if ($sStart < $sStartDate && $sEnd > $sStartDate && $sStartDate <= $sEndDate)
           {
               $aNewEvent = $aEvent;
               $this->calendarTimestampToStart($aNewEvent, $this->calendarGetMktime($sStartDate, $sStartTime));
               $this->calendarTimestampToEnd($aNewEvent, $this->calendarGetMktime($sStartDate, $sEndTime));

               $aEvents[] = $aNewEvent;
           }

           $sStartDate = $this->calendarRecurrentAddMonth($sOrigDate, $i);
           $i++;
       }
   } // calendarRecurrentMonth

   function calendarRecurrentYear(&$aEvents, $aEvent, $sStart, $sEnd)
   {
       $iStartDate = $this->calendarStartToTimestamp($aEvent);
       $sOrigDate  = date('Ymd', $iStartDate);
       $sStartDate = date('Ymd', $iStartDate);
       $sStartTime = date('His', $iStartDate);

       $i = 1;
       while ($sStartDate < $sEnd)
       {
           $iEndDate = $this->calendarEndToTimestamp($aEvent);
           $sEndDate = date('Ymd', $iEndDate);
           $sEndTime = date('His', $iEndDate);

           if ($sStart < $sStartDate && $sEnd > $sStartDate && $sStartDate <= $sEndDate)
           {
               $aNewEvent = $aEvent;
               $this->calendarTimestampToStart($aNewEvent, $this->calendarGetMktime($sStartDate, $sStartTime));
               $this->calendarTimestampToEnd($aNewEvent, $this->calendarGetMktime($sStartDate, $sEndTime));

               $aEvents[] = $aNewEvent;
           }

           $sStartDate = $this->calendarRecurrentAddYear($sOrigDate, $i);
           $i++;
       }
   } // calendarRecurrentYear

   function calendarRecurrentAddDay($sDate, $iAdd)
   {
       $iDate = $this->calendarGetMktime($sDate, '000000', $iAdd);

       return date('Ymd', $iDate);
   } // calendarRecurrentAddDay

   function calendarRecurrentAddMonth($sDate, $iAdd)
   {
       $iYear  = (integer) substr($sDate, 0, 4);
       $iMonth = (integer) substr($sDate, 4, 2) + $iAdd;
       $iDay   = (integer) substr($sDate, 6, 2);

       while (12 < $iMonth)
       {
           $iMonth -= 12;
           $iYear++;
       }

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 28 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (2 == $iMonth && $this->calendarIsLeapYear($iYear) && 29 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (in_array($iMonth, array(4, 6, 9, 11)) && 31 == $iDay)
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . '30';
       }
       else
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . substr($sDate, 6);
       }

       return $sDate;
   } // calendarRecurrentAddMonth

   function calendarRecurrentAddYear($sDate, $iAdd)
   {
       $iYear  = substr($sDate, 0, 4) + $iAdd;
       $iMonth = (integer) substr($sDate, 4, 2);
       $iDay   = (integer) substr($sDate, 6, 2);

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 29 == $iDay)
       {
           $sDate = $iYear . '0228';
       }
       else
       {
           $sDate = $iYear . substr($sDate, 4);
       }

       return $sDate;
   } // calendarRecurrentAddYear

   function calendarIsLeapYear(&$iYear)
   {
       if ($iYear % 4 != 0)
       {
           return false;
       }
       else
       {
           if ($iYear % 100 != 0)
           {
               return true;
           }
           else
           {
               if ($iYear % 400 != 0)
               {
                   return false;
               }
               else
               {
                   return true;
               }
           }
       }
   } // calendarIsLeapYear

   function calendarHandleEvents($aEvents)
   {
       foreach ($aEvents as $i => $aEventData)
       {
           if (false !== strpos($aEventData['start'], ' '))
           {
               $aTemp               = explode(' ', $aEventData['start']);
               $aEventData['start'] = $aTemp[0];
           }
           if (false !== strpos($aEventData['start_time'], ' '))
           {
               $aTemp                    = explode(' ', $aEventData['start_time']);
               $aEventData['start_time'] = $aTemp[1];
           }
           elseif (8 < strlen($aEventData['start_time']))
           {
               $aEventData['start_time'] = substr($aEventData['start_time'], 0, 8);
           }
           if (false !== strpos($aEventData['end'], ' '))
           {
               $aTemp             = explode(' ', $aEventData['end']);
               $aEventData['end'] = $aTemp[0];
           }
           if (false !== strpos($aEventData['end_time'], ' '))
           {
               $aTemp                  = explode(' ', $aEventData['end_time']);
               $aEventData['end_time'] = $aTemp[1];
           }
           elseif (8 < strlen($aEventData['end_time']))
           {
               $aEventData['end_time'] = substr($aEventData['end_time'], 0, 8);
           }

           $aEvents[$i] = $aEventData;
       }

       return $aEvents;
   } // calendarHandleEvents

   function calendarNormalizeEvents($aEvents)
   {
       $aEvents = $this->calendarHandleEvents($aEvents);

       foreach ($aEvents as $i => $aEventData)
       {
           if ((isset($aEventData['id']) && '' == $aEventData['id']) || (isset($aEventData['title']) && '' == $aEventData['title']) || (isset($aEventData['start']) && '' == $aEventData['start']))
           {
               unset($aEvents[$i]);
           }
           else
           {

               $bStartTime = false;
               $bEndTime   = false;

               if (isset($aEventData['start_time']) && '' == $aEventData['start_time'])
               {
                   unset($aEventData['start_time']);
               }

               if (isset($aEventData['end']) && '' == $aEventData['end'])
               {
                   unset($aEventData['end']);
                   unset($aEventData['end_time']);
               }
               elseif (isset($aEventData['end_time']) && '' == $aEventData['end_time'])
               {
                   unset($aEventData['end_time']);
               }

               if (isset($aEventData['start']) && isset($aEventData['start_time']))
               {
                   $aEventData['start'] .= ' ' . $aEventData['start_time'];
                   unset($aEventData['start_time']);
                   $bStartTime = true;
               }
               if (isset($aEventData['end']) && isset($aEventData['end_time']))
               {
                   $aEventData['end'] .= ' ' . $aEventData['end_time'];
                   unset($aEventData['end_time']);
                   $bEndTime = true;
               }

               if ($bStartTime && $bEndTime)
               {
                   $aEventData['allDay'] = false;
               }

               $aEvents[$i] = $aEventData;
           }
       }

       return $aEvents;
   } // calendarNormalizeEvents

   function calendarPrintEvents($aEvents)
   {
       $aEventHtml = array();
       $sPrintHtml = '';
       $sLastDay   = '';

       $sPrintHtml .= "<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\n";
       $sPrintHtml .= "<head>\n";
       $sPrintHtml .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar.css\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" />\n";
       $sPrintHtml .= "<style type=\"text/css\">\n";
       $sPrintHtml .= ".sc-ui-cal-time { padding-left: 20px }\n";
       $sPrintHtml .= ".sc-ui-cal-event { padding-left: 35px }\n";
       $sPrintHtml .= "</style>\n";
       $sPrintHtml .= "</head>\n";
       $sPrintHtml .= "<body>\n";

       $sPrintHtml .= "" . $this->Ini->Nm_lang['lang_events_order'] . "<hr style=\"border-style: solid; border-width: 1px 0 0 0\"/><br />\n";
       foreach ($this->calendarPrintSort($aEvents) as $aEventData)
       {
           $aStartInfo = explode(' ', $aEventData['start']);
           $aEndInfo   = explode(' ', $aEventData['end']);
           if (!isset($aStartInfo[1]))
           {
               $aStartInfo[1] = '';
           }
           if (!isset($aEndInfo[1]))
           {
               $aEndInfo[1] = '';
           }

           $sEventHtml = '';

           if ('' == $sLastDay || $aStartInfo[0] != $sLastDay)
           {
               $sEventHtml .= '<div class="scCalendarPrintDate">' . sc_convert_encoding($this->calendarPrintFormatDate($aStartInfo[0]), 'UTF-8', $_SESSION['scriptcase']['charset']) . "</div>\n";
               $sLastDay = $aStartInfo[0];
           }
           $sEventHtml .= '<div class="scCalendarPrintTime sc-ui-cal-time">';
           if ('' == $aStartInfo[1])
           {
               $sEventHtml .= sc_convert_encoding($this->Ini->Nm_lang['lang_per_allday'], 'UTF-8', $_SESSION['scriptcase']['charset']);
           }
           elseif ($aEventData['start'] == $aEventData['end'])
           {
               $sEventHtml .= $aStartInfo[1];
           }
           else
           {
               $sEventHtml .= $aStartInfo[1] . ' ' . sc_convert_encoding($this->Ini->Nm_lang['lang_othr_txto'], 'UTF-8', $_SESSION['scriptcase']['charset']) . ' ' . $aEndInfo[1];
           }
           $sEventHtml .= "</div>\n";
           $sEventHtml .= '<div class="scCalendarPrintEvent sc-ui-cal-event">';
           $sEventHtml .= $aEventData['title'];
           $sEventHtml .= "</div>\n";

           $aEventHtml[] = $sEventHtml;
       }

       $sPrintHtml .= implode('<br />', $aEventHtml);

       $sPrintHtml .= "</body>\n";
       $sPrintHtml .= "</html>\n";

       $sTmpFile  = $this->Ini->path_imag_temp . '/sc_cal_print' . md5(session_id() . microtime()) . '.html';
       $rHtmlFile = @fopen($this->Ini->root . $sTmpFile, 'w');
       if ($rHtmlFile)
       {
           @fwrite($rHtmlFile, $sPrintHtml);
           @fclose($rHtmlFile);
           return array('outputFormat' => 'file', 'fileHtml' => $sTmpFile);
       }
       else
       {
           return array('outputFormat' => 'html', 'printHtml' => $sPrintHtml);
       }
   } // calendarPrintEvents

   function calendarPrintSort($aEvents)
   {
       $aUnsortedEvents = array();
       $aSortedEvents   = array();

       foreach ($aEvents as $aEventData)
       {
           if (!isset($aUnsortedEvents[ $aEventData['start'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ] = array();
           }
           if (!isset($aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ] = array();
           }
           $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ][] = $aEventData;
       }

       ksort($aUnsortedEvents);
       foreach ($aUnsortedEvents as $aEventsEnd)
       {
           ksort($aEventsEnd);
           foreach ($aEventsEnd as $aEventList)
           {
               foreach ($aEventList as $aEventData)
               {
                   $aSortedEvents[] = $aEventData;
               }
           }
       }

       return $aSortedEvents;
   } // calendarPrintSort

   function calendarPrintFormatDate($sDate)
   {
       $aDateTime     = explode(' ', $sDate);
       $aDateParts    = explode('-', $aDateTime[0]);
       $iMktime       = mktime(0, 0, 0, $aDateParts[1], $aDateParts[2], $aDateParts[0]);
       $sFormatString = "l, F j";
       $sFormatted    = '';
       $bSlash        = false;

       for ($i = 0; $i < strlen($sFormatString); $i++)
       {
           $sFormatChar = $sFormatString[$i];
           if (!$bSlash && "\\" == $sFormatChar)
           {
               $bSlash = true;
           }
           elseif ($bSlash)
           {
               $bSlash      = false;
               $sFormatChar = "\\" . $sFormatString[$i];
           }
           if ($bSlash)
           {
               continue;
           }
           elseif ('D' == $sFormatChar || 'l' == $sFormatChar)
           {
               $sWeekDay = date('w', $iMktime);
               $sShort   = 'D' == $sFormatChar ? 'shrt_' : '';
               switch ($sWeekDay)
               {
                   case '0':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '1':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           elseif ('F' == $sFormatChar || 'M' == $sFormatChar)
           {
               $sShort = 'M' == $sFormatChar ? 'shrt_' : '';
               switch ($aDateParts[1])
               {
                   case '1':
                   case '01':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                   case '02':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                   case '03':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                   case '04':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                   case '05':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                   case '06':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '7':
                   case '07':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '8':
                   case '08':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '9':
                   case '09':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '10':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '11':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '12':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           else
           {
               $sFormatted .= date($sFormatChar, $iMktime);
           }
       }

       return $sFormatted;
   } // calendarPrintFormatDate

   function calendarUpdateEvent($sOp, $sId, $iDays, $iMinutes, $bAllDay, $bAllDayBefore)
   {
       $aEvents = $this->calendarFetchEvents($sId);
       if (1 != sizeof($aEvents))
       {
           return array('status' => false, 'message' => 'Erro ao recuperar informacoes do evento');
       }
       $aEvent = $aEvents[0];

       $iStart = $this->calendarStartToTimestamp($aEvent);
       $iEnd   = $this->calendarEndToTimestamp($aEvent);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data inicial');
       }
       elseif (false === $iEnd)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data final');
       }

       $iStart += ('move' == $sOp) ? ($iDays * 86400) + ($iMinutes * 60) : $iDays * 86400;
       if ($bAllDayBefore)
       {
           $iEnd = $iStart + 7200;
       }
       else
       {
           $iEnd += ($iDays * 86400) + ($iMinutes * 60);
       }

       $this->calendarTimestampToStart($aEvent, $iStart, $bAllDay);
       $this->calendarTimestampToEnd($aEvent, $iEnd, $bAllDay);

       if ('' == $aEvent['start'])
       {
           $aEvent['start'] = 'null';
       }
       if ('' == $aEvent['start_time'])
       {
           $aEvent['start_time'] = 'null';
       }
       if ('' == $aEvent['end'])
       {
           $aEvent['end'] = 'null';
       }
       if ('' == $aEvent['end_time'])
       {
           $aEvent['end_time'] = 'null';
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET start_date = #" . $aEvent['start'] . "#, start_time = #" . $aEvent['start_time'] . "#, end_date = #" . $aEvent['end'] . "#, end_time = #" . $aEvent['end_time'] . "#" . $this->calendarWhere($sId);
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET start_date = EXTEND(start_date, YEAR TO DAY), end_date = EXTEND(end_date, YEAR TO DAY)" . $this->calendarWhere($sId);
       }
       else
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET start_date = '" . $aEvent['start'] . "', start_time = '" . $aEvent['start_time'] . "', end_date = '" . $aEvent['end'] . "', end_time = '" . $aEvent['end_time'] . "'" . $this->calendarWhere($sId);
       }

       $sSql = str_replace(array('#null#', "'null'"), array('null', 'null'), $sSql);

       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na atualizacao do evento');
       }

       $aReturn = array('status' => true, 'message' => '');

       if ($aEvent['start_only'] < date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorPast'];
       }
       elseif ($aEvent['start_only'] > date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorFuture'];
       }
       else
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorToday'];
       }

       return $aReturn;
   } // calendarUpdateEvent

   function calendarStartToTimestamp($aEvent)
   {
       if (!isset($aEvent['start']) || '' == $aEvent['start'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['start'], 0, 4);
       $iMonth = (integer) substr($aEvent['start'], 5, 2);
       $iDay   = (integer) substr($aEvent['start'], 8, 2);

       if (!isset($aEvent['start_time']) || '' == $aEvent['start_time'])
       {
           $iHour   = 0;
           $iMinute = 0;
           $iSecond = 0;
       }
       else
       {
           $iHour   = (integer) substr($aEvent['start_time'], 0, 2);
           $iMinute = (integer) substr($aEvent['start_time'], 3, 2);
           $iSecond = (integer) substr($aEvent['start_time'], 6, 2);
       }

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarStartToTimestamp

   function calendarEndToTimestamp($aEvent)
   {
       if (!isset($aEvent['end']) || '' == $aEvent['end'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['end'], 0, 4);
       $iMonth = (integer) substr($aEvent['end'], 5, 2);
       $iDay   = (integer) substr($aEvent['end'], 8, 2);

       if (!isset($aEvent['end_time']) || '' == $aEvent['end_time'])
       {
           $iHour   = 0;
           $iMinute = 0;
           $iSecond = 0;
       }
       else
       {
           $iHour   = (integer) substr($aEvent['end_time'], 0, 2);
           $iMinute = (integer) substr($aEvent['end_time'], 3, 2);
           $iSecond = (integer) substr($aEvent['end_time'], 6, 2);
       }

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarEndToTimestamp

   function calendarTimestampToStart(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['start_only'] = date('Y-m-d', $iTimestamp);
       $aEvent['start']      = date('Y-m-d', $iTimestamp);
       $aEvent['start_time'] = $bAllDay ? '' : date('H:i:s', $iTimestamp);
   } // calendarTimestampToStart

   function calendarTimestampToEnd(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['end']      = date('Y-m-d', $iTimestamp);
       $aEvent['end_time'] = $bAllDay ? '' : date('H:i:s', $iTimestamp);
   } // calendarTimestampToEnd

   function calendarGetMktime($sDate, $sTime, $iAddDay = 0)
   {
       return mktime( (integer) substr($sTime, 0, 2),
                      (integer) substr($sTime, 2, 2),
                      (integer) substr($sTime, 4, 2),
                      (integer) substr($sDate, 4, 2),
                     ((integer) substr($sDate, 6, 2)) + $iAddDay,
                      (integer) substr($sDate, 0, 4));
   } // calendarGetMktime

   function calendarDragDrop()
   {
       return $this->calendarUpdateEvent('move', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, 'true' == $this->sc_all_day, 'true' == $this->sc_all_day_before);
   } // calendarDragDrop

   function calendarResize()
   {
       return $this->calendarUpdateEvent('resize', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, false, false);
   } // calendarDragDrop

   function calendarRemoveTime(&$iTimestamp)
   {
       $iTimestamp = mktime(0, 0, 0, date('m', $iTimestamp), date('d', $iTimestamp), date('Y', $iTimestamp));
   } // calendarRemoveTime

   function calendarInitTimestamp()
   {
       $aDate = explode('-', $this->sc_cal_click_date);
       $aTime = 'true' == $this->sc_cal_click_allday ? array(0, 0, 0) : explode(':', $this->sc_cal_click_time);

       $iInit = mktime($aTime[0], $aTime[1], $aTime[2], $aDate[1], $aDate[2], $aDate[0]);
       $iEnd  = 'true' == $this->sc_cal_click_allday ? $iInit : $iInit + 7200;

       return array($iInit, $iEnd);
   } // calendarInitTimestamp

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              calendar_calendar_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "id", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "title", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "description", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_recurrence($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "recurrence", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_period($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "period", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "login", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter_form'] . " and (login = '" . $_SESSION['usr_login'] . "') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where login = '" . $_SESSION['usr_login'] . "' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_calendar_calendar = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['total'] = $qt_geral_reg_calendar_calendar;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          calendar_calendar_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          calendar_calendar_pack_ajax_response();
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
      $nm_numeric[] = "id";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['decimal_db'] == ".")
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
      $Nm_datas['start_date'] = "date";$Nm_datas['start_time'] = "time";$Nm_datas['end_date'] = "date";$Nm_datas['end_time'] = "time";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_outra_jan'])
   {
       $nmgp_saida_form = "calendar_calendar_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['nm_run_menu'] = 2;
       $nmgp_saida_form = "calendar_calendar_fim.php";
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
       calendar_calendar_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['masterValue']);
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
