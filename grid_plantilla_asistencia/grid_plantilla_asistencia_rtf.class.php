<?php

class grid_plantilla_asistencia_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_plantilla_asistencia_rtf()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_plantilla_asistencia";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_plantilla_asistencia.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_plantilla_asistencia']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_plantilla_asistencia']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_plantilla_asistencia']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT t_evaluacion.id_estudiante as t_evaluacion_id_estudiante, t_evaluacion.id_grupo as t_evaluacion_id_grupo, t_evaluacion.id_area as t_evaluacion_id_area, t_evaluacion.id_asignatura as t_evaluacion_id_asignatura, t_evaluacion.id_grado as t_evaluacion_id_grado, t_grupos.id_sede as t_grupos_id_sede, grupo_x_asig_x_doce.id_docente as grupo_x_asig_x_doce_id_docente, t_grupos.id_director_grupo as t_grupos_id_director_grupo, t_grupos.jornada as t_grupos_jornada from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT t_evaluacion.id_estudiante as t_evaluacion_id_estudiante, t_evaluacion.id_grupo as t_evaluacion_id_grupo, t_evaluacion.id_area as t_evaluacion_id_area, t_evaluacion.id_asignatura as t_evaluacion_id_asignatura, t_evaluacion.id_grado as t_evaluacion_id_grado, t_grupos.id_sede as t_grupos_id_sede, grupo_x_asig_x_doce.id_docente as grupo_x_asig_x_doce_id_docente, t_grupos.id_director_grupo as t_grupos_id_director_grupo, t_grupos.jornada as t_grupos_jornada from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_select .= " group by t_evaluacion.id_estudiante"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['t_evaluacion_id_estudiante'])) ? $this->New_label['t_evaluacion_id_estudiante'] : "Estudiante"; 
          if ($Cada_col == "t_evaluacion_id_estudiante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "1"; 
          if ($Cada_col == "sc_field_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_1'])) ? $this->New_label['sc_field_1'] : "2"; 
          if ($Cada_col == "sc_field_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_2'])) ? $this->New_label['sc_field_2'] : "3"; 
          if ($Cada_col == "sc_field_2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_3'])) ? $this->New_label['sc_field_3'] : "4"; 
          if ($Cada_col == "sc_field_3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_4'])) ? $this->New_label['sc_field_4'] : "5"; 
          if ($Cada_col == "sc_field_4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_5'])) ? $this->New_label['sc_field_5'] : "6"; 
          if ($Cada_col == "sc_field_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_6'])) ? $this->New_label['sc_field_6'] : "7"; 
          if ($Cada_col == "sc_field_6" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_7'])) ? $this->New_label['sc_field_7'] : "8"; 
          if ($Cada_col == "sc_field_7" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_8'])) ? $this->New_label['sc_field_8'] : "9"; 
          if ($Cada_col == "sc_field_8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_9'])) ? $this->New_label['sc_field_9'] : "10"; 
          if ($Cada_col == "sc_field_9" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_10'])) ? $this->New_label['sc_field_10'] : "11"; 
          if ($Cada_col == "sc_field_10" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_11'])) ? $this->New_label['sc_field_11'] : "12"; 
          if ($Cada_col == "sc_field_11" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_12'])) ? $this->New_label['sc_field_12'] : "13"; 
          if ($Cada_col == "sc_field_12" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_13'])) ? $this->New_label['sc_field_13'] : "14"; 
          if ($Cada_col == "sc_field_13" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_14'])) ? $this->New_label['sc_field_14'] : "15"; 
          if ($Cada_col == "sc_field_14" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_15'])) ? $this->New_label['sc_field_15'] : "16"; 
          if ($Cada_col == "sc_field_15" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_16'])) ? $this->New_label['sc_field_16'] : "17"; 
          if ($Cada_col == "sc_field_16" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_17'])) ? $this->New_label['sc_field_17'] : "18"; 
          if ($Cada_col == "sc_field_17" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_18'])) ? $this->New_label['sc_field_18'] : "19"; 
          if ($Cada_col == "sc_field_18" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_19'])) ? $this->New_label['sc_field_19'] : "20"; 
          if ($Cada_col == "sc_field_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_20'])) ? $this->New_label['sc_field_20'] : "21"; 
          if ($Cada_col == "sc_field_20" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_21'])) ? $this->New_label['sc_field_21'] : "22"; 
          if ($Cada_col == "sc_field_21" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_22'])) ? $this->New_label['sc_field_22'] : "23"; 
          if ($Cada_col == "sc_field_22" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_23'])) ? $this->New_label['sc_field_23'] : "24"; 
          if ($Cada_col == "sc_field_23" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_24'])) ? $this->New_label['sc_field_24'] : "25"; 
          if ($Cada_col == "sc_field_24" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_25'])) ? $this->New_label['sc_field_25'] : "26"; 
          if ($Cada_col == "sc_field_25" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_26'])) ? $this->New_label['sc_field_26'] : "27"; 
          if ($Cada_col == "sc_field_26" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_27'])) ? $this->New_label['sc_field_27'] : "28"; 
          if ($Cada_col == "sc_field_27" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_28'])) ? $this->New_label['sc_field_28'] : "29"; 
          if ($Cada_col == "sc_field_28" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_29'])) ? $this->New_label['sc_field_29'] : "30"; 
          if ($Cada_col == "sc_field_29" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_30'])) ? $this->New_label['sc_field_30'] : "31"; 
          if ($Cada_col == "sc_field_30" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->Texto_tag .= "<tr>\r\n";
         $this->t_evaluacion_id_estudiante = $rs->fields[0] ;  
         $this->t_evaluacion_id_estudiante = (string)$this->t_evaluacion_id_estudiante;
         $this->t_evaluacion_id_grupo = $rs->fields[1] ;  
         $this->t_evaluacion_id_grupo = (string)$this->t_evaluacion_id_grupo;
         $this->t_evaluacion_id_area = $rs->fields[2] ;  
         $this->t_evaluacion_id_area = (string)$this->t_evaluacion_id_area;
         $this->t_evaluacion_id_asignatura = $rs->fields[3] ;  
         $this->t_evaluacion_id_asignatura = (string)$this->t_evaluacion_id_asignatura;
         $this->t_evaluacion_id_grado = $rs->fields[4] ;  
         $this->t_evaluacion_id_grado = (string)$this->t_evaluacion_id_grado;
         $this->t_grupos_id_sede = $rs->fields[5] ;  
         $this->t_grupos_id_sede = (string)$this->t_grupos_id_sede;
         $this->grupo_x_asig_x_doce_id_docente = $rs->fields[6] ;  
         $this->grupo_x_asig_x_doce_id_docente = (string)$this->grupo_x_asig_x_doce_id_docente;
         $this->t_grupos_id_director_grupo = $rs->fields[7] ;  
         $this->t_grupos_id_director_grupo = (string)$this->t_grupos_id_director_grupo;
         $this->t_grupos_jornada = $rs->fields[8] ;  
         //----- lookup - t_evaluacion_id_estudiante
         $this->look_t_evaluacion_id_estudiante = $this->t_evaluacion_id_estudiante; 
         $this->Lookup->lookup_t_evaluacion_id_estudiante($this->look_t_evaluacion_id_estudiante, $this->t_evaluacion_id_estudiante) ; 
         $this->look_t_evaluacion_id_estudiante = ($this->look_t_evaluacion_id_estudiante == "&nbsp;") ? "" : $this->look_t_evaluacion_id_estudiante; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- t_evaluacion_id_estudiante
   function NM_export_t_evaluacion_id_estudiante()
   {
         nmgp_Form_Num_Val($this->look_t_evaluacion_id_estudiante, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_t_evaluacion_id_estudiante))
         {
             $this->look_t_evaluacion_id_estudiante = sc_convert_encoding($this->look_t_evaluacion_id_estudiante, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_t_evaluacion_id_estudiante = str_replace('<', '&lt;', $this->look_t_evaluacion_id_estudiante);
         $this->look_t_evaluacion_id_estudiante = str_replace('>', '&gt;', $this->look_t_evaluacion_id_estudiante);
         $this->Texto_tag .= "<td>" . $this->look_t_evaluacion_id_estudiante . "</td>\r\n";
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         $this->sc_field_0 = html_entity_decode($this->sc_field_0, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_0 = strip_tags($this->sc_field_0);
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_0 = str_replace('<', '&lt;', $this->sc_field_0);
         $this->sc_field_0 = str_replace('>', '&gt;', $this->sc_field_0);
         $this->Texto_tag .= "<td>" . $this->sc_field_0 . "</td>\r\n";
   }
   //----- sc_field_1
   function NM_export_sc_field_1()
   {
         $this->sc_field_1 = html_entity_decode($this->sc_field_1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_1 = strip_tags($this->sc_field_1);
         if (!NM_is_utf8($this->sc_field_1))
         {
             $this->sc_field_1 = sc_convert_encoding($this->sc_field_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_1 = str_replace('<', '&lt;', $this->sc_field_1);
         $this->sc_field_1 = str_replace('>', '&gt;', $this->sc_field_1);
         $this->Texto_tag .= "<td>" . $this->sc_field_1 . "</td>\r\n";
   }
   //----- sc_field_2
   function NM_export_sc_field_2()
   {
         $this->sc_field_2 = html_entity_decode($this->sc_field_2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_2 = strip_tags($this->sc_field_2);
         if (!NM_is_utf8($this->sc_field_2))
         {
             $this->sc_field_2 = sc_convert_encoding($this->sc_field_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_2 = str_replace('<', '&lt;', $this->sc_field_2);
         $this->sc_field_2 = str_replace('>', '&gt;', $this->sc_field_2);
         $this->Texto_tag .= "<td>" . $this->sc_field_2 . "</td>\r\n";
   }
   //----- sc_field_3
   function NM_export_sc_field_3()
   {
         $this->sc_field_3 = html_entity_decode($this->sc_field_3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_3 = strip_tags($this->sc_field_3);
         if (!NM_is_utf8($this->sc_field_3))
         {
             $this->sc_field_3 = sc_convert_encoding($this->sc_field_3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_3 = str_replace('<', '&lt;', $this->sc_field_3);
         $this->sc_field_3 = str_replace('>', '&gt;', $this->sc_field_3);
         $this->Texto_tag .= "<td>" . $this->sc_field_3 . "</td>\r\n";
   }
   //----- sc_field_4
   function NM_export_sc_field_4()
   {
         $this->sc_field_4 = html_entity_decode($this->sc_field_4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_4 = strip_tags($this->sc_field_4);
         if (!NM_is_utf8($this->sc_field_4))
         {
             $this->sc_field_4 = sc_convert_encoding($this->sc_field_4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_4 = str_replace('<', '&lt;', $this->sc_field_4);
         $this->sc_field_4 = str_replace('>', '&gt;', $this->sc_field_4);
         $this->Texto_tag .= "<td>" . $this->sc_field_4 . "</td>\r\n";
   }
   //----- sc_field_5
   function NM_export_sc_field_5()
   {
         $this->sc_field_5 = html_entity_decode($this->sc_field_5, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_5 = strip_tags($this->sc_field_5);
         if (!NM_is_utf8($this->sc_field_5))
         {
             $this->sc_field_5 = sc_convert_encoding($this->sc_field_5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_5 = str_replace('<', '&lt;', $this->sc_field_5);
         $this->sc_field_5 = str_replace('>', '&gt;', $this->sc_field_5);
         $this->Texto_tag .= "<td>" . $this->sc_field_5 . "</td>\r\n";
   }
   //----- sc_field_6
   function NM_export_sc_field_6()
   {
         $this->sc_field_6 = html_entity_decode($this->sc_field_6, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_6 = strip_tags($this->sc_field_6);
         if (!NM_is_utf8($this->sc_field_6))
         {
             $this->sc_field_6 = sc_convert_encoding($this->sc_field_6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_6 = str_replace('<', '&lt;', $this->sc_field_6);
         $this->sc_field_6 = str_replace('>', '&gt;', $this->sc_field_6);
         $this->Texto_tag .= "<td>" . $this->sc_field_6 . "</td>\r\n";
   }
   //----- sc_field_7
   function NM_export_sc_field_7()
   {
         $this->sc_field_7 = html_entity_decode($this->sc_field_7, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_7 = strip_tags($this->sc_field_7);
         if (!NM_is_utf8($this->sc_field_7))
         {
             $this->sc_field_7 = sc_convert_encoding($this->sc_field_7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_7 = str_replace('<', '&lt;', $this->sc_field_7);
         $this->sc_field_7 = str_replace('>', '&gt;', $this->sc_field_7);
         $this->Texto_tag .= "<td>" . $this->sc_field_7 . "</td>\r\n";
   }
   //----- sc_field_8
   function NM_export_sc_field_8()
   {
         $this->sc_field_8 = html_entity_decode($this->sc_field_8, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_8 = strip_tags($this->sc_field_8);
         if (!NM_is_utf8($this->sc_field_8))
         {
             $this->sc_field_8 = sc_convert_encoding($this->sc_field_8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_8 = str_replace('<', '&lt;', $this->sc_field_8);
         $this->sc_field_8 = str_replace('>', '&gt;', $this->sc_field_8);
         $this->Texto_tag .= "<td>" . $this->sc_field_8 . "</td>\r\n";
   }
   //----- sc_field_9
   function NM_export_sc_field_9()
   {
         $this->sc_field_9 = html_entity_decode($this->sc_field_9, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_9 = strip_tags($this->sc_field_9);
         if (!NM_is_utf8($this->sc_field_9))
         {
             $this->sc_field_9 = sc_convert_encoding($this->sc_field_9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_9 = str_replace('<', '&lt;', $this->sc_field_9);
         $this->sc_field_9 = str_replace('>', '&gt;', $this->sc_field_9);
         $this->Texto_tag .= "<td>" . $this->sc_field_9 . "</td>\r\n";
   }
   //----- sc_field_10
   function NM_export_sc_field_10()
   {
         $this->sc_field_10 = html_entity_decode($this->sc_field_10, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_10 = strip_tags($this->sc_field_10);
         if (!NM_is_utf8($this->sc_field_10))
         {
             $this->sc_field_10 = sc_convert_encoding($this->sc_field_10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_10 = str_replace('<', '&lt;', $this->sc_field_10);
         $this->sc_field_10 = str_replace('>', '&gt;', $this->sc_field_10);
         $this->Texto_tag .= "<td>" . $this->sc_field_10 . "</td>\r\n";
   }
   //----- sc_field_11
   function NM_export_sc_field_11()
   {
         $this->sc_field_11 = html_entity_decode($this->sc_field_11, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_11 = strip_tags($this->sc_field_11);
         if (!NM_is_utf8($this->sc_field_11))
         {
             $this->sc_field_11 = sc_convert_encoding($this->sc_field_11, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_11 = str_replace('<', '&lt;', $this->sc_field_11);
         $this->sc_field_11 = str_replace('>', '&gt;', $this->sc_field_11);
         $this->Texto_tag .= "<td>" . $this->sc_field_11 . "</td>\r\n";
   }
   //----- sc_field_12
   function NM_export_sc_field_12()
   {
         $this->sc_field_12 = html_entity_decode($this->sc_field_12, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_12 = strip_tags($this->sc_field_12);
         if (!NM_is_utf8($this->sc_field_12))
         {
             $this->sc_field_12 = sc_convert_encoding($this->sc_field_12, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_12 = str_replace('<', '&lt;', $this->sc_field_12);
         $this->sc_field_12 = str_replace('>', '&gt;', $this->sc_field_12);
         $this->Texto_tag .= "<td>" . $this->sc_field_12 . "</td>\r\n";
   }
   //----- sc_field_13
   function NM_export_sc_field_13()
   {
         $this->sc_field_13 = html_entity_decode($this->sc_field_13, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_13 = strip_tags($this->sc_field_13);
         if (!NM_is_utf8($this->sc_field_13))
         {
             $this->sc_field_13 = sc_convert_encoding($this->sc_field_13, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_13 = str_replace('<', '&lt;', $this->sc_field_13);
         $this->sc_field_13 = str_replace('>', '&gt;', $this->sc_field_13);
         $this->Texto_tag .= "<td>" . $this->sc_field_13 . "</td>\r\n";
   }
   //----- sc_field_14
   function NM_export_sc_field_14()
   {
         $this->sc_field_14 = html_entity_decode($this->sc_field_14, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_14 = strip_tags($this->sc_field_14);
         if (!NM_is_utf8($this->sc_field_14))
         {
             $this->sc_field_14 = sc_convert_encoding($this->sc_field_14, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_14 = str_replace('<', '&lt;', $this->sc_field_14);
         $this->sc_field_14 = str_replace('>', '&gt;', $this->sc_field_14);
         $this->Texto_tag .= "<td>" . $this->sc_field_14 . "</td>\r\n";
   }
   //----- sc_field_15
   function NM_export_sc_field_15()
   {
         $this->sc_field_15 = html_entity_decode($this->sc_field_15, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_15 = strip_tags($this->sc_field_15);
         if (!NM_is_utf8($this->sc_field_15))
         {
             $this->sc_field_15 = sc_convert_encoding($this->sc_field_15, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_15 = str_replace('<', '&lt;', $this->sc_field_15);
         $this->sc_field_15 = str_replace('>', '&gt;', $this->sc_field_15);
         $this->Texto_tag .= "<td>" . $this->sc_field_15 . "</td>\r\n";
   }
   //----- sc_field_16
   function NM_export_sc_field_16()
   {
         $this->sc_field_16 = html_entity_decode($this->sc_field_16, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_16 = strip_tags($this->sc_field_16);
         if (!NM_is_utf8($this->sc_field_16))
         {
             $this->sc_field_16 = sc_convert_encoding($this->sc_field_16, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_16 = str_replace('<', '&lt;', $this->sc_field_16);
         $this->sc_field_16 = str_replace('>', '&gt;', $this->sc_field_16);
         $this->Texto_tag .= "<td>" . $this->sc_field_16 . "</td>\r\n";
   }
   //----- sc_field_17
   function NM_export_sc_field_17()
   {
         $this->sc_field_17 = html_entity_decode($this->sc_field_17, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_17 = strip_tags($this->sc_field_17);
         if (!NM_is_utf8($this->sc_field_17))
         {
             $this->sc_field_17 = sc_convert_encoding($this->sc_field_17, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_17 = str_replace('<', '&lt;', $this->sc_field_17);
         $this->sc_field_17 = str_replace('>', '&gt;', $this->sc_field_17);
         $this->Texto_tag .= "<td>" . $this->sc_field_17 . "</td>\r\n";
   }
   //----- sc_field_18
   function NM_export_sc_field_18()
   {
         $this->sc_field_18 = html_entity_decode($this->sc_field_18, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_18 = strip_tags($this->sc_field_18);
         if (!NM_is_utf8($this->sc_field_18))
         {
             $this->sc_field_18 = sc_convert_encoding($this->sc_field_18, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_18 = str_replace('<', '&lt;', $this->sc_field_18);
         $this->sc_field_18 = str_replace('>', '&gt;', $this->sc_field_18);
         $this->Texto_tag .= "<td>" . $this->sc_field_18 . "</td>\r\n";
   }
   //----- sc_field_19
   function NM_export_sc_field_19()
   {
         $this->sc_field_19 = html_entity_decode($this->sc_field_19, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_19 = strip_tags($this->sc_field_19);
         if (!NM_is_utf8($this->sc_field_19))
         {
             $this->sc_field_19 = sc_convert_encoding($this->sc_field_19, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_19 = str_replace('<', '&lt;', $this->sc_field_19);
         $this->sc_field_19 = str_replace('>', '&gt;', $this->sc_field_19);
         $this->Texto_tag .= "<td>" . $this->sc_field_19 . "</td>\r\n";
   }
   //----- sc_field_20
   function NM_export_sc_field_20()
   {
         $this->sc_field_20 = html_entity_decode($this->sc_field_20, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_20 = strip_tags($this->sc_field_20);
         if (!NM_is_utf8($this->sc_field_20))
         {
             $this->sc_field_20 = sc_convert_encoding($this->sc_field_20, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_20 = str_replace('<', '&lt;', $this->sc_field_20);
         $this->sc_field_20 = str_replace('>', '&gt;', $this->sc_field_20);
         $this->Texto_tag .= "<td>" . $this->sc_field_20 . "</td>\r\n";
   }
   //----- sc_field_21
   function NM_export_sc_field_21()
   {
         $this->sc_field_21 = html_entity_decode($this->sc_field_21, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_21 = strip_tags($this->sc_field_21);
         if (!NM_is_utf8($this->sc_field_21))
         {
             $this->sc_field_21 = sc_convert_encoding($this->sc_field_21, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_21 = str_replace('<', '&lt;', $this->sc_field_21);
         $this->sc_field_21 = str_replace('>', '&gt;', $this->sc_field_21);
         $this->Texto_tag .= "<td>" . $this->sc_field_21 . "</td>\r\n";
   }
   //----- sc_field_22
   function NM_export_sc_field_22()
   {
         $this->sc_field_22 = html_entity_decode($this->sc_field_22, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_22 = strip_tags($this->sc_field_22);
         if (!NM_is_utf8($this->sc_field_22))
         {
             $this->sc_field_22 = sc_convert_encoding($this->sc_field_22, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_22 = str_replace('<', '&lt;', $this->sc_field_22);
         $this->sc_field_22 = str_replace('>', '&gt;', $this->sc_field_22);
         $this->Texto_tag .= "<td>" . $this->sc_field_22 . "</td>\r\n";
   }
   //----- sc_field_23
   function NM_export_sc_field_23()
   {
         $this->sc_field_23 = html_entity_decode($this->sc_field_23, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_23 = strip_tags($this->sc_field_23);
         if (!NM_is_utf8($this->sc_field_23))
         {
             $this->sc_field_23 = sc_convert_encoding($this->sc_field_23, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_23 = str_replace('<', '&lt;', $this->sc_field_23);
         $this->sc_field_23 = str_replace('>', '&gt;', $this->sc_field_23);
         $this->Texto_tag .= "<td>" . $this->sc_field_23 . "</td>\r\n";
   }
   //----- sc_field_24
   function NM_export_sc_field_24()
   {
         $this->sc_field_24 = html_entity_decode($this->sc_field_24, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_24 = strip_tags($this->sc_field_24);
         if (!NM_is_utf8($this->sc_field_24))
         {
             $this->sc_field_24 = sc_convert_encoding($this->sc_field_24, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_24 = str_replace('<', '&lt;', $this->sc_field_24);
         $this->sc_field_24 = str_replace('>', '&gt;', $this->sc_field_24);
         $this->Texto_tag .= "<td>" . $this->sc_field_24 . "</td>\r\n";
   }
   //----- sc_field_25
   function NM_export_sc_field_25()
   {
         $this->sc_field_25 = html_entity_decode($this->sc_field_25, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_25 = strip_tags($this->sc_field_25);
         if (!NM_is_utf8($this->sc_field_25))
         {
             $this->sc_field_25 = sc_convert_encoding($this->sc_field_25, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_25 = str_replace('<', '&lt;', $this->sc_field_25);
         $this->sc_field_25 = str_replace('>', '&gt;', $this->sc_field_25);
         $this->Texto_tag .= "<td>" . $this->sc_field_25 . "</td>\r\n";
   }
   //----- sc_field_26
   function NM_export_sc_field_26()
   {
         $this->sc_field_26 = html_entity_decode($this->sc_field_26, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_26 = strip_tags($this->sc_field_26);
         if (!NM_is_utf8($this->sc_field_26))
         {
             $this->sc_field_26 = sc_convert_encoding($this->sc_field_26, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_26 = str_replace('<', '&lt;', $this->sc_field_26);
         $this->sc_field_26 = str_replace('>', '&gt;', $this->sc_field_26);
         $this->Texto_tag .= "<td>" . $this->sc_field_26 . "</td>\r\n";
   }
   //----- sc_field_27
   function NM_export_sc_field_27()
   {
         $this->sc_field_27 = html_entity_decode($this->sc_field_27, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_27 = strip_tags($this->sc_field_27);
         if (!NM_is_utf8($this->sc_field_27))
         {
             $this->sc_field_27 = sc_convert_encoding($this->sc_field_27, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_27 = str_replace('<', '&lt;', $this->sc_field_27);
         $this->sc_field_27 = str_replace('>', '&gt;', $this->sc_field_27);
         $this->Texto_tag .= "<td>" . $this->sc_field_27 . "</td>\r\n";
   }
   //----- sc_field_28
   function NM_export_sc_field_28()
   {
         $this->sc_field_28 = html_entity_decode($this->sc_field_28, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_28 = strip_tags($this->sc_field_28);
         if (!NM_is_utf8($this->sc_field_28))
         {
             $this->sc_field_28 = sc_convert_encoding($this->sc_field_28, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_28 = str_replace('<', '&lt;', $this->sc_field_28);
         $this->sc_field_28 = str_replace('>', '&gt;', $this->sc_field_28);
         $this->Texto_tag .= "<td>" . $this->sc_field_28 . "</td>\r\n";
   }
   //----- sc_field_29
   function NM_export_sc_field_29()
   {
         $this->sc_field_29 = html_entity_decode($this->sc_field_29, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_29 = strip_tags($this->sc_field_29);
         if (!NM_is_utf8($this->sc_field_29))
         {
             $this->sc_field_29 = sc_convert_encoding($this->sc_field_29, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_29 = str_replace('<', '&lt;', $this->sc_field_29);
         $this->sc_field_29 = str_replace('>', '&gt;', $this->sc_field_29);
         $this->Texto_tag .= "<td>" . $this->sc_field_29 . "</td>\r\n";
   }
   //----- sc_field_30
   function NM_export_sc_field_30()
   {
         $this->sc_field_30 = html_entity_decode($this->sc_field_30, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_30 = strip_tags($this->sc_field_30);
         if (!NM_is_utf8($this->sc_field_30))
         {
             $this->sc_field_30 = sc_convert_encoding($this->sc_field_30, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_30 = str_replace('<', '&lt;', $this->sc_field_30);
         $this->sc_field_30 = str_replace('>', '&gt;', $this->sc_field_30);
         $this->Texto_tag .= "<td>" . $this->sc_field_30 . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
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
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Planillas de Evaluacion - :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_plantilla_asistencia_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_plantilla_asistencia"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
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
              if ($cont2 >= $tam_campo)
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
}

?>
