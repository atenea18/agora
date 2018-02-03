<?php

class grid_t_estudiante_asist_grado_rtf
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
   function grid_t_estudiante_asist_grado_rtf()
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
      $this->Arquivo   .= "_grid_t_estudiante_asist_grado";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_t_estudiante_asist_grado.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_t_estudiante_asist_grado']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_t_estudiante_asist_grado']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_t_estudiante_asist_grado']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->novedades_novedad = $Busca_temp['novedades_novedad']; 
          $tmp_pos = strpos($this->novedades_novedad, "##@@");
          if ($tmp_pos !== false)
          {
              $this->novedades_novedad = substr($this->novedades_novedad, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT concat_ws(' ',primer_apellido,segundo_apellido,primer_nombre,segundo_nombre) as nombre, novedades.novedad as novedades_novedad from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT concat_ws(' ',primer_apellido,segundo_apellido,primer_nombre,segundo_nombre) as nombre, novedades.novedad as novedades_novedad from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['nombre'])) ? $this->New_label['nombre'] : "Nombre"; 
          if ($Cada_col == "nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['novedades_novedad'])) ? $this->New_label['novedades_novedad'] : "Nov"; 
          if ($Cada_col == "novedades_novedad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col1'])) ? $this->New_label['col1'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col2'])) ? $this->New_label['col2'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col3'])) ? $this->New_label['col3'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col4'])) ? $this->New_label['col4'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col5'])) ? $this->New_label['col5'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col6'])) ? $this->New_label['col6'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col6" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col7'])) ? $this->New_label['col7'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col7" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col8'])) ? $this->New_label['col8'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col9'])) ? $this->New_label['col9'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col9" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col10'])) ? $this->New_label['col10'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col10" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col11'])) ? $this->New_label['col11'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col11" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col12'])) ? $this->New_label['col12'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col12" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col13'])) ? $this->New_label['col13'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col13" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col14'])) ? $this->New_label['col14'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col14" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col15'])) ? $this->New_label['col15'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col15" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col16'])) ? $this->New_label['col16'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col16" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col17'])) ? $this->New_label['col17'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col17" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col18'])) ? $this->New_label['col18'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col18" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col19'])) ? $this->New_label['col19'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col20'])) ? $this->New_label['col20'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col20" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col21'])) ? $this->New_label['col21'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col21" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col22'])) ? $this->New_label['col22'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col22" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col23'])) ? $this->New_label['col23'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col23" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col24'])) ? $this->New_label['col24'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col24" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col25'])) ? $this->New_label['col25'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col25" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col26'])) ? $this->New_label['col26'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col26" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col27'])) ? $this->New_label['col27'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col27" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col28'])) ? $this->New_label['col28'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col28" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col29'])) ? $this->New_label['col29'] : "&nbsp;&nbsp;&nbsp;&nbsp;"; 
          if ($Cada_col == "col29" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col30'])) ? $this->New_label['col30'] : "    "; 
          if ($Cada_col == "col30" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col31'])) ? $this->New_label['col31'] : "    "; 
          if ($Cada_col == "col31" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->nombre = $rs->fields[0] ;  
         $this->novedades_novedad = $rs->fields[1] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_t_estudiante_asist_grado']['contr_erro'] = 'on';
 $this->novedades_novedad  = substr($this->novedades_novedad , 0, 3);
$_SESSION['scriptcase']['grid_t_estudiante_asist_grado']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['field_order'] as $Cada_col)
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
   //----- nombre
   function NM_export_nombre()
   {
         $this->nombre = html_entity_decode($this->nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre = strip_tags($this->nombre);
         if (!NM_is_utf8($this->nombre))
         {
             $this->nombre = sc_convert_encoding($this->nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nombre = str_replace('<', '&lt;', $this->nombre);
         $this->nombre = str_replace('>', '&gt;', $this->nombre);
         $this->Texto_tag .= "<td>" . $this->nombre . "</td>\r\n";
   }
   //----- novedades_novedad
   function NM_export_novedades_novedad()
   {
         $this->novedades_novedad = html_entity_decode($this->novedades_novedad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->novedades_novedad = strip_tags($this->novedades_novedad);
         if (!NM_is_utf8($this->novedades_novedad))
         {
             $this->novedades_novedad = sc_convert_encoding($this->novedades_novedad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->novedades_novedad = str_replace('<', '&lt;', $this->novedades_novedad);
         $this->novedades_novedad = str_replace('>', '&gt;', $this->novedades_novedad);
         $this->Texto_tag .= "<td>" . $this->novedades_novedad . "</td>\r\n";
   }
   //----- col1
   function NM_export_col1()
   {
         nmgp_Form_Num_Val($this->col1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->col1))
         {
             $this->col1 = sc_convert_encoding($this->col1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col1 = str_replace('<', '&lt;', $this->col1);
         $this->col1 = str_replace('>', '&gt;', $this->col1);
         $this->Texto_tag .= "<td>" . $this->col1 . "</td>\r\n";
   }
   //----- col2
   function NM_export_col2()
   {
         nmgp_Form_Num_Val($this->col2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->col2))
         {
             $this->col2 = sc_convert_encoding($this->col2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col2 = str_replace('<', '&lt;', $this->col2);
         $this->col2 = str_replace('>', '&gt;', $this->col2);
         $this->Texto_tag .= "<td>" . $this->col2 . "</td>\r\n";
   }
   //----- col3
   function NM_export_col3()
   {
         nmgp_Form_Num_Val($this->col3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->col3))
         {
             $this->col3 = sc_convert_encoding($this->col3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col3 = str_replace('<', '&lt;', $this->col3);
         $this->col3 = str_replace('>', '&gt;', $this->col3);
         $this->Texto_tag .= "<td>" . $this->col3 . "</td>\r\n";
   }
   //----- col4
   function NM_export_col4()
   {
         nmgp_Form_Num_Val($this->col4, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->col4))
         {
             $this->col4 = sc_convert_encoding($this->col4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col4 = str_replace('<', '&lt;', $this->col4);
         $this->col4 = str_replace('>', '&gt;', $this->col4);
         $this->Texto_tag .= "<td>" . $this->col4 . "</td>\r\n";
   }
   //----- col5
   function NM_export_col5()
   {
         nmgp_Form_Num_Val($this->col5, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->col5))
         {
             $this->col5 = sc_convert_encoding($this->col5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col5 = str_replace('<', '&lt;', $this->col5);
         $this->col5 = str_replace('>', '&gt;', $this->col5);
         $this->Texto_tag .= "<td>" . $this->col5 . "</td>\r\n";
   }
   //----- col6
   function NM_export_col6()
   {
         nmgp_Form_Num_Val($this->col6, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->col6))
         {
             $this->col6 = sc_convert_encoding($this->col6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col6 = str_replace('<', '&lt;', $this->col6);
         $this->col6 = str_replace('>', '&gt;', $this->col6);
         $this->Texto_tag .= "<td>" . $this->col6 . "</td>\r\n";
   }
   //----- col7
   function NM_export_col7()
   {
         nmgp_Form_Num_Val($this->col7, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->col7))
         {
             $this->col7 = sc_convert_encoding($this->col7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col7 = str_replace('<', '&lt;', $this->col7);
         $this->col7 = str_replace('>', '&gt;', $this->col7);
         $this->Texto_tag .= "<td>" . $this->col7 . "</td>\r\n";
   }
   //----- col8
   function NM_export_col8()
   {
         nmgp_Form_Num_Val($this->col8, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->col8))
         {
             $this->col8 = sc_convert_encoding($this->col8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col8 = str_replace('<', '&lt;', $this->col8);
         $this->col8 = str_replace('>', '&gt;', $this->col8);
         $this->Texto_tag .= "<td>" . $this->col8 . "</td>\r\n";
   }
   //----- col9
   function NM_export_col9()
   {
         $this->col9 = html_entity_decode($this->col9, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col9 = strip_tags($this->col9);
         if (!NM_is_utf8($this->col9))
         {
             $this->col9 = sc_convert_encoding($this->col9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col9 = str_replace('<', '&lt;', $this->col9);
         $this->col9 = str_replace('>', '&gt;', $this->col9);
         $this->Texto_tag .= "<td>" . $this->col9 . "</td>\r\n";
   }
   //----- col10
   function NM_export_col10()
   {
         $this->col10 = html_entity_decode($this->col10, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col10 = strip_tags($this->col10);
         if (!NM_is_utf8($this->col10))
         {
             $this->col10 = sc_convert_encoding($this->col10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col10 = str_replace('<', '&lt;', $this->col10);
         $this->col10 = str_replace('>', '&gt;', $this->col10);
         $this->Texto_tag .= "<td>" . $this->col10 . "</td>\r\n";
   }
   //----- col11
   function NM_export_col11()
   {
         $this->col11 = html_entity_decode($this->col11, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col11 = strip_tags($this->col11);
         if (!NM_is_utf8($this->col11))
         {
             $this->col11 = sc_convert_encoding($this->col11, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col11 = str_replace('<', '&lt;', $this->col11);
         $this->col11 = str_replace('>', '&gt;', $this->col11);
         $this->Texto_tag .= "<td>" . $this->col11 . "</td>\r\n";
   }
   //----- col12
   function NM_export_col12()
   {
         $this->col12 = html_entity_decode($this->col12, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col12 = strip_tags($this->col12);
         if (!NM_is_utf8($this->col12))
         {
             $this->col12 = sc_convert_encoding($this->col12, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col12 = str_replace('<', '&lt;', $this->col12);
         $this->col12 = str_replace('>', '&gt;', $this->col12);
         $this->Texto_tag .= "<td>" . $this->col12 . "</td>\r\n";
   }
   //----- col13
   function NM_export_col13()
   {
         $this->col13 = html_entity_decode($this->col13, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col13 = strip_tags($this->col13);
         if (!NM_is_utf8($this->col13))
         {
             $this->col13 = sc_convert_encoding($this->col13, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col13 = str_replace('<', '&lt;', $this->col13);
         $this->col13 = str_replace('>', '&gt;', $this->col13);
         $this->Texto_tag .= "<td>" . $this->col13 . "</td>\r\n";
   }
   //----- col14
   function NM_export_col14()
   {
         $this->col14 = html_entity_decode($this->col14, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col14 = strip_tags($this->col14);
         if (!NM_is_utf8($this->col14))
         {
             $this->col14 = sc_convert_encoding($this->col14, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col14 = str_replace('<', '&lt;', $this->col14);
         $this->col14 = str_replace('>', '&gt;', $this->col14);
         $this->Texto_tag .= "<td>" . $this->col14 . "</td>\r\n";
   }
   //----- col15
   function NM_export_col15()
   {
         $this->col15 = html_entity_decode($this->col15, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col15 = strip_tags($this->col15);
         if (!NM_is_utf8($this->col15))
         {
             $this->col15 = sc_convert_encoding($this->col15, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col15 = str_replace('<', '&lt;', $this->col15);
         $this->col15 = str_replace('>', '&gt;', $this->col15);
         $this->Texto_tag .= "<td>" . $this->col15 . "</td>\r\n";
   }
   //----- col16
   function NM_export_col16()
   {
         $this->col16 = html_entity_decode($this->col16, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col16 = strip_tags($this->col16);
         if (!NM_is_utf8($this->col16))
         {
             $this->col16 = sc_convert_encoding($this->col16, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col16 = str_replace('<', '&lt;', $this->col16);
         $this->col16 = str_replace('>', '&gt;', $this->col16);
         $this->Texto_tag .= "<td>" . $this->col16 . "</td>\r\n";
   }
   //----- col17
   function NM_export_col17()
   {
         $this->col17 = html_entity_decode($this->col17, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col17 = strip_tags($this->col17);
         if (!NM_is_utf8($this->col17))
         {
             $this->col17 = sc_convert_encoding($this->col17, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col17 = str_replace('<', '&lt;', $this->col17);
         $this->col17 = str_replace('>', '&gt;', $this->col17);
         $this->Texto_tag .= "<td>" . $this->col17 . "</td>\r\n";
   }
   //----- col18
   function NM_export_col18()
   {
         $this->col18 = html_entity_decode($this->col18, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col18 = strip_tags($this->col18);
         if (!NM_is_utf8($this->col18))
         {
             $this->col18 = sc_convert_encoding($this->col18, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col18 = str_replace('<', '&lt;', $this->col18);
         $this->col18 = str_replace('>', '&gt;', $this->col18);
         $this->Texto_tag .= "<td>" . $this->col18 . "</td>\r\n";
   }
   //----- col19
   function NM_export_col19()
   {
         $this->col19 = html_entity_decode($this->col19, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col19 = strip_tags($this->col19);
         if (!NM_is_utf8($this->col19))
         {
             $this->col19 = sc_convert_encoding($this->col19, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col19 = str_replace('<', '&lt;', $this->col19);
         $this->col19 = str_replace('>', '&gt;', $this->col19);
         $this->Texto_tag .= "<td>" . $this->col19 . "</td>\r\n";
   }
   //----- col20
   function NM_export_col20()
   {
         $this->col20 = html_entity_decode($this->col20, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col20 = strip_tags($this->col20);
         if (!NM_is_utf8($this->col20))
         {
             $this->col20 = sc_convert_encoding($this->col20, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col20 = str_replace('<', '&lt;', $this->col20);
         $this->col20 = str_replace('>', '&gt;', $this->col20);
         $this->Texto_tag .= "<td>" . $this->col20 . "</td>\r\n";
   }
   //----- col21
   function NM_export_col21()
   {
         $this->col21 = html_entity_decode($this->col21, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col21 = strip_tags($this->col21);
         if (!NM_is_utf8($this->col21))
         {
             $this->col21 = sc_convert_encoding($this->col21, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col21 = str_replace('<', '&lt;', $this->col21);
         $this->col21 = str_replace('>', '&gt;', $this->col21);
         $this->Texto_tag .= "<td>" . $this->col21 . "</td>\r\n";
   }
   //----- col22
   function NM_export_col22()
   {
         $this->col22 = html_entity_decode($this->col22, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col22 = strip_tags($this->col22);
         if (!NM_is_utf8($this->col22))
         {
             $this->col22 = sc_convert_encoding($this->col22, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col22 = str_replace('<', '&lt;', $this->col22);
         $this->col22 = str_replace('>', '&gt;', $this->col22);
         $this->Texto_tag .= "<td>" . $this->col22 . "</td>\r\n";
   }
   //----- col23
   function NM_export_col23()
   {
         $this->col23 = html_entity_decode($this->col23, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col23 = strip_tags($this->col23);
         if (!NM_is_utf8($this->col23))
         {
             $this->col23 = sc_convert_encoding($this->col23, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col23 = str_replace('<', '&lt;', $this->col23);
         $this->col23 = str_replace('>', '&gt;', $this->col23);
         $this->Texto_tag .= "<td>" . $this->col23 . "</td>\r\n";
   }
   //----- col24
   function NM_export_col24()
   {
         $this->col24 = html_entity_decode($this->col24, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col24 = strip_tags($this->col24);
         if (!NM_is_utf8($this->col24))
         {
             $this->col24 = sc_convert_encoding($this->col24, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col24 = str_replace('<', '&lt;', $this->col24);
         $this->col24 = str_replace('>', '&gt;', $this->col24);
         $this->Texto_tag .= "<td>" . $this->col24 . "</td>\r\n";
   }
   //----- col25
   function NM_export_col25()
   {
         $this->col25 = html_entity_decode($this->col25, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col25 = strip_tags($this->col25);
         if (!NM_is_utf8($this->col25))
         {
             $this->col25 = sc_convert_encoding($this->col25, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col25 = str_replace('<', '&lt;', $this->col25);
         $this->col25 = str_replace('>', '&gt;', $this->col25);
         $this->Texto_tag .= "<td>" . $this->col25 . "</td>\r\n";
   }
   //----- col26
   function NM_export_col26()
   {
         $this->col26 = html_entity_decode($this->col26, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col26 = strip_tags($this->col26);
         if (!NM_is_utf8($this->col26))
         {
             $this->col26 = sc_convert_encoding($this->col26, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col26 = str_replace('<', '&lt;', $this->col26);
         $this->col26 = str_replace('>', '&gt;', $this->col26);
         $this->Texto_tag .= "<td>" . $this->col26 . "</td>\r\n";
   }
   //----- col27
   function NM_export_col27()
   {
         $this->col27 = html_entity_decode($this->col27, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col27 = strip_tags($this->col27);
         if (!NM_is_utf8($this->col27))
         {
             $this->col27 = sc_convert_encoding($this->col27, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col27 = str_replace('<', '&lt;', $this->col27);
         $this->col27 = str_replace('>', '&gt;', $this->col27);
         $this->Texto_tag .= "<td>" . $this->col27 . "</td>\r\n";
   }
   //----- col28
   function NM_export_col28()
   {
         $this->col28 = html_entity_decode($this->col28, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col28 = strip_tags($this->col28);
         if (!NM_is_utf8($this->col28))
         {
             $this->col28 = sc_convert_encoding($this->col28, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col28 = str_replace('<', '&lt;', $this->col28);
         $this->col28 = str_replace('>', '&gt;', $this->col28);
         $this->Texto_tag .= "<td>" . $this->col28 . "</td>\r\n";
   }
   //----- col29
   function NM_export_col29()
   {
         $this->col29 = html_entity_decode($this->col29, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col29 = strip_tags($this->col29);
         if (!NM_is_utf8($this->col29))
         {
             $this->col29 = sc_convert_encoding($this->col29, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col29 = str_replace('<', '&lt;', $this->col29);
         $this->col29 = str_replace('>', '&gt;', $this->col29);
         $this->Texto_tag .= "<td>" . $this->col29 . "</td>\r\n";
   }
   //----- col30
   function NM_export_col30()
   {
         $this->col30 = html_entity_decode($this->col30, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col30 = strip_tags($this->col30);
         if (!NM_is_utf8($this->col30))
         {
             $this->col30 = sc_convert_encoding($this->col30, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col30 = str_replace('<', '&lt;', $this->col30);
         $this->col30 = str_replace('>', '&gt;', $this->col30);
         $this->Texto_tag .= "<td>" . $this->col30 . "</td>\r\n";
   }
   //----- col31
   function NM_export_col31()
   {
         $this->col31 = html_entity_decode($this->col31, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col31 = strip_tags($this->col31);
         if (!NM_is_utf8($this->col31))
         {
             $this->col31 = sc_convert_encoding($this->col31, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col31 = str_replace('<', '&lt;', $this->col31);
         $this->col31 = str_replace('>', '&gt;', $this->col31);
         $this->Texto_tag .= "<td>" . $this->col31 . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -  :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_t_estudiante_asist_grado_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_t_estudiante_asist_grado"> 
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
