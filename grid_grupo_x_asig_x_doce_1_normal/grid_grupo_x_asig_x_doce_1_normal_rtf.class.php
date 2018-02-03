<?php

class grid_grupo_x_asig_x_doce_1_normal_rtf
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
   function grid_grupo_x_asig_x_doce_1_normal_rtf()
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
      $this->Arquivo   .= "_grid_grupo_x_asig_x_doce_1_normal";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_grupo_x_asig_x_doce_1_normal.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_1_normal']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_1_normal']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_1_normal']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->t_estudiante_grupo_idstudent = $Busca_temp['t_estudiante_grupo_idstudent']; 
          $tmp_pos = strpos($this->t_estudiante_grupo_idstudent, "##@@");
          if ($tmp_pos !== false)
          {
              $this->t_estudiante_grupo_idstudent = substr($this->t_estudiante_grupo_idstudent, 0, $tmp_pos);
          }
          $this->t_estudiante_grupo_idstudent_2 = $Busca_temp['t_estudiante_grupo_idstudent_input_2']; 
          $this->novedades_x_estudiante_fecha_id_novedad = $Busca_temp['novedades_x_estudiante_fecha_id_novedad']; 
          $tmp_pos = strpos($this->novedades_x_estudiante_fecha_id_novedad, "##@@");
          if ($tmp_pos !== false)
          {
              $this->novedades_x_estudiante_fecha_id_novedad = substr($this->novedades_x_estudiante_fecha_id_novedad, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT CONCAT_WS(' ',students.primer_apellido,students.segundo_apellido,students.primer_nombre,students.segundo_nombre) as nom_estudiante, novedades_x_estudiante_fecha.id_novedad as cmp_maior_30_1, t_estudiante_grupo.idstudent as t_estudiante_grupo_idstudent from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT CONCAT_WS(' ',students.primer_apellido,students.segundo_apellido,students.primer_nombre,students.segundo_nombre) as nom_estudiante, novedades_x_estudiante_fecha.id_novedad as cmp_maior_30_1, t_estudiante_grupo.idstudent as t_estudiante_grupo_idstudent from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['where_pesq'];
      $nmgp_select .= " group by t_estudiante_grupo.idstudent"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['fa'] = "" . $_SESSION['par_1'] . "";
      $this->New_label['re'] = "" . $_SESSION['par_2'] . "";
      $this->New_label['p1'] = "" . $_SESSION['par_3'] . "";
      $this->New_label['p2'] = "" . $_SESSION['par_4'] . "";
      $this->New_label['p3'] = "" . $_SESSION['par_5'] . "";
      $this->New_label['p4'] = "" . $_SESSION['par_6'] . "";
      $this->New_label['vac'] = "" . $_SESSION['par_7'] . "";
      $this->New_label['vra'] = "" . $_SESSION['par_8'] . "";
      $this->New_label['col1'] = "" . $_SESSION['par_9'] . "";
      $this->New_label['col2'] = "" . $_SESSION['par_10'] . "";
      $this->New_label['col3'] = "" . $_SESSION['par_11'] . "";
      $this->New_label['col4'] = "" . $_SESSION['par_12'] . "";
      $this->New_label['col5'] = "" . $_SESSION['par_13'] . "";
      $this->New_label['par'] = "" . $_SESSION['par_14'] . "";
      $this->New_label['app'] = "" . $_SESSION['par_15'] . "";
      $this->New_label['prp'] = "" . $_SESSION['par_16'] . "";
      $this->New_label['ren'] = "" . $_SESSION['par_17'] . "";
      $this->New_label['ptc'] = "" . $_SESSION['par_18'] . "";
      $this->New_label['red'] = "" . $_SESSION['par_19'] . "";
      $this->New_label['lid'] = "" . $_SESSION['par_20'] . "";
      $this->New_label['pel'] = "" . $_SESSION['par_21'] . "";
      $this->New_label['com'] = "" . $_SESSION['par_22'] . "";
      $this->New_label['coc'] = "" . $_SESSION['par_23'] . "";
      $this->New_label['aee'] = "" . $_SESSION['par_24'] . "";
      $this->New_label['val'] = "" . $_SESSION['par_25'] . "";

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['nom_estudiante'])) ? $this->New_label['nom_estudiante'] : "Nom Estudiante"; 
          if ($Cada_col == "nom_estudiante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['novedades_x_estudiante_fecha_id_novedad'])) ? $this->New_label['novedades_x_estudiante_fecha_id_novedad'] : "Nov"; 
          if ($Cada_col == "novedades_x_estudiante_fecha_id_novedad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fa'])) ? $this->New_label['fa'] : ""; 
          if ($Cada_col == "fa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['re'])) ? $this->New_label['re'] : ""; 
          if ($Cada_col == "re" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p1'])) ? $this->New_label['p1'] : ""; 
          if ($Cada_col == "p1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p2'])) ? $this->New_label['p2'] : ""; 
          if ($Cada_col == "p2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p3'])) ? $this->New_label['p3'] : ""; 
          if ($Cada_col == "p3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['p4'])) ? $this->New_label['p4'] : ""; 
          if ($Cada_col == "p4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vac'])) ? $this->New_label['vac'] : ""; 
          if ($Cada_col == "vac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vra'])) ? $this->New_label['vra'] : ""; 
          if ($Cada_col == "vra" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['col1'])) ? $this->New_label['col1'] : ""; 
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
          $SC_Label = (isset($this->New_label['col2'])) ? $this->New_label['col2'] : ""; 
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
          $SC_Label = (isset($this->New_label['col3'])) ? $this->New_label['col3'] : ""; 
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
          $SC_Label = (isset($this->New_label['col4'])) ? $this->New_label['col4'] : ""; 
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
          $SC_Label = (isset($this->New_label['col5'])) ? $this->New_label['col5'] : ""; 
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
          $SC_Label = (isset($this->New_label['par'])) ? $this->New_label['par'] : ""; 
          if ($Cada_col == "par" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['app'])) ? $this->New_label['app'] : ""; 
          if ($Cada_col == "app" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['prp'])) ? $this->New_label['prp'] : ""; 
          if ($Cada_col == "prp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ren'])) ? $this->New_label['ren'] : ""; 
          if ($Cada_col == "ren" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ptc'])) ? $this->New_label['ptc'] : ""; 
          if ($Cada_col == "ptc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['red'])) ? $this->New_label['red'] : ""; 
          if ($Cada_col == "red" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['lid'])) ? $this->New_label['lid'] : ""; 
          if ($Cada_col == "lid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pel'])) ? $this->New_label['pel'] : ""; 
          if ($Cada_col == "pel" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['com'])) ? $this->New_label['com'] : ""; 
          if ($Cada_col == "com" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['coc'])) ? $this->New_label['coc'] : ""; 
          if ($Cada_col == "coc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['aee'])) ? $this->New_label['aee'] : ""; 
          if ($Cada_col == "aee" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['val'])) ? $this->New_label['val'] : ""; 
          if ($Cada_col == "val" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_estudiante_grupo_idstudent'])) ? $this->New_label['t_estudiante_grupo_idstudent'] : "Estudiante"; 
          if ($Cada_col == "t_estudiante_grupo_idstudent" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->nom_estudiante = $rs->fields[0] ;  
         $this->novedades_x_estudiante_fecha_id_novedad = $rs->fields[1] ;  
         $this->t_estudiante_grupo_idstudent = $rs->fields[2] ;  
         $this->t_estudiante_grupo_idstudent = (string)$this->t_estudiante_grupo_idstudent;
         //----- lookup - novedades_x_estudiante_fecha_id_novedad
         $this->look_novedades_x_estudiante_fecha_id_novedad = $this->novedades_x_estudiante_fecha_id_novedad; 
         $this->Lookup->lookup_novedades_x_estudiante_fecha_id_novedad($this->look_novedades_x_estudiante_fecha_id_novedad, $this->novedades_x_estudiante_fecha_id_novedad) ; 
         $this->look_novedades_x_estudiante_fecha_id_novedad = ($this->look_novedades_x_estudiante_fecha_id_novedad == "&nbsp;") ? "" : $this->look_novedades_x_estudiante_fecha_id_novedad; 
         //----- lookup - t_estudiante_grupo_idstudent
         $this->look_t_estudiante_grupo_idstudent = $this->t_estudiante_grupo_idstudent; 
         $this->Lookup->lookup_t_estudiante_grupo_idstudent($this->look_t_estudiante_grupo_idstudent, $this->t_estudiante_grupo_idstudent) ; 
         $this->look_t_estudiante_grupo_idstudent = ($this->look_t_estudiante_grupo_idstudent == "&nbsp;") ? "" : $this->look_t_estudiante_grupo_idstudent; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['field_order'] as $Cada_col)
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
   //----- nom_estudiante
   function NM_export_nom_estudiante()
   {
         $this->nom_estudiante = html_entity_decode($this->nom_estudiante, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nom_estudiante = strip_tags($this->nom_estudiante);
         if (!NM_is_utf8($this->nom_estudiante))
         {
             $this->nom_estudiante = sc_convert_encoding($this->nom_estudiante, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nom_estudiante = str_replace('<', '&lt;', $this->nom_estudiante);
         $this->nom_estudiante = str_replace('>', '&gt;', $this->nom_estudiante);
         $this->Texto_tag .= "<td>" . $this->nom_estudiante . "</td>\r\n";
   }
   //----- novedades_x_estudiante_fecha_id_novedad
   function NM_export_novedades_x_estudiante_fecha_id_novedad()
   {
         $this->look_novedades_x_estudiante_fecha_id_novedad = html_entity_decode($this->look_novedades_x_estudiante_fecha_id_novedad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_novedades_x_estudiante_fecha_id_novedad = strip_tags($this->look_novedades_x_estudiante_fecha_id_novedad);
         if (!NM_is_utf8($this->look_novedades_x_estudiante_fecha_id_novedad))
         {
             $this->look_novedades_x_estudiante_fecha_id_novedad = sc_convert_encoding($this->look_novedades_x_estudiante_fecha_id_novedad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_novedades_x_estudiante_fecha_id_novedad = str_replace('<', '&lt;', $this->look_novedades_x_estudiante_fecha_id_novedad);
         $this->look_novedades_x_estudiante_fecha_id_novedad = str_replace('>', '&gt;', $this->look_novedades_x_estudiante_fecha_id_novedad);
         $this->Texto_tag .= "<td>" . $this->look_novedades_x_estudiante_fecha_id_novedad . "</td>\r\n";
   }
   //----- fa
   function NM_export_fa()
   {
         $this->fa = html_entity_decode($this->fa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fa = strip_tags($this->fa);
         if (!NM_is_utf8($this->fa))
         {
             $this->fa = sc_convert_encoding($this->fa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fa = str_replace('<', '&lt;', $this->fa);
         $this->fa = str_replace('>', '&gt;', $this->fa);
         $this->Texto_tag .= "<td>" . $this->fa . "</td>\r\n";
   }
   //----- re
   function NM_export_re()
   {
         $this->re = html_entity_decode($this->re, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->re = strip_tags($this->re);
         if (!NM_is_utf8($this->re))
         {
             $this->re = sc_convert_encoding($this->re, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->re = str_replace('<', '&lt;', $this->re);
         $this->re = str_replace('>', '&gt;', $this->re);
         $this->Texto_tag .= "<td>" . $this->re . "</td>\r\n";
   }
   //----- p1
   function NM_export_p1()
   {
         $this->p1 = html_entity_decode($this->p1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->p1 = strip_tags($this->p1);
         if (!NM_is_utf8($this->p1))
         {
             $this->p1 = sc_convert_encoding($this->p1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p1 = str_replace('<', '&lt;', $this->p1);
         $this->p1 = str_replace('>', '&gt;', $this->p1);
         $this->Texto_tag .= "<td>" . $this->p1 . "</td>\r\n";
   }
   //----- p2
   function NM_export_p2()
   {
         $this->p2 = html_entity_decode($this->p2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->p2 = strip_tags($this->p2);
         if (!NM_is_utf8($this->p2))
         {
             $this->p2 = sc_convert_encoding($this->p2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p2 = str_replace('<', '&lt;', $this->p2);
         $this->p2 = str_replace('>', '&gt;', $this->p2);
         $this->Texto_tag .= "<td>" . $this->p2 . "</td>\r\n";
   }
   //----- p3
   function NM_export_p3()
   {
         $this->p3 = html_entity_decode($this->p3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->p3 = strip_tags($this->p3);
         if (!NM_is_utf8($this->p3))
         {
             $this->p3 = sc_convert_encoding($this->p3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p3 = str_replace('<', '&lt;', $this->p3);
         $this->p3 = str_replace('>', '&gt;', $this->p3);
         $this->Texto_tag .= "<td>" . $this->p3 . "</td>\r\n";
   }
   //----- p4
   function NM_export_p4()
   {
         $this->p4 = html_entity_decode($this->p4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->p4 = strip_tags($this->p4);
         if (!NM_is_utf8($this->p4))
         {
             $this->p4 = sc_convert_encoding($this->p4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->p4 = str_replace('<', '&lt;', $this->p4);
         $this->p4 = str_replace('>', '&gt;', $this->p4);
         $this->Texto_tag .= "<td>" . $this->p4 . "</td>\r\n";
   }
   //----- vac
   function NM_export_vac()
   {
         $this->vac = html_entity_decode($this->vac, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vac = strip_tags($this->vac);
         if (!NM_is_utf8($this->vac))
         {
             $this->vac = sc_convert_encoding($this->vac, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->vac = str_replace('<', '&lt;', $this->vac);
         $this->vac = str_replace('>', '&gt;', $this->vac);
         $this->Texto_tag .= "<td>" . $this->vac . "</td>\r\n";
   }
   //----- vra
   function NM_export_vra()
   {
         $this->vra = html_entity_decode($this->vra, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vra = strip_tags($this->vra);
         if (!NM_is_utf8($this->vra))
         {
             $this->vra = sc_convert_encoding($this->vra, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->vra = str_replace('<', '&lt;', $this->vra);
         $this->vra = str_replace('>', '&gt;', $this->vra);
         $this->Texto_tag .= "<td>" . $this->vra . "</td>\r\n";
   }
   //----- col1
   function NM_export_col1()
   {
         $this->col1 = html_entity_decode($this->col1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col1 = strip_tags($this->col1);
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
         $this->col2 = html_entity_decode($this->col2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col2 = strip_tags($this->col2);
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
         $this->col3 = html_entity_decode($this->col3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col3 = strip_tags($this->col3);
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
         $this->col4 = html_entity_decode($this->col4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col4 = strip_tags($this->col4);
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
         $this->col5 = html_entity_decode($this->col5, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col5 = strip_tags($this->col5);
         if (!NM_is_utf8($this->col5))
         {
             $this->col5 = sc_convert_encoding($this->col5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->col5 = str_replace('<', '&lt;', $this->col5);
         $this->col5 = str_replace('>', '&gt;', $this->col5);
         $this->Texto_tag .= "<td>" . $this->col5 . "</td>\r\n";
   }
   //----- par
   function NM_export_par()
   {
         $this->par = html_entity_decode($this->par, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->par = strip_tags($this->par);
         if (!NM_is_utf8($this->par))
         {
             $this->par = sc_convert_encoding($this->par, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->par = str_replace('<', '&lt;', $this->par);
         $this->par = str_replace('>', '&gt;', $this->par);
         $this->Texto_tag .= "<td>" . $this->par . "</td>\r\n";
   }
   //----- app
   function NM_export_app()
   {
         $this->app = html_entity_decode($this->app, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->app = strip_tags($this->app);
         if (!NM_is_utf8($this->app))
         {
             $this->app = sc_convert_encoding($this->app, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->app = str_replace('<', '&lt;', $this->app);
         $this->app = str_replace('>', '&gt;', $this->app);
         $this->Texto_tag .= "<td>" . $this->app . "</td>\r\n";
   }
   //----- prp
   function NM_export_prp()
   {
         $this->prp = html_entity_decode($this->prp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->prp = strip_tags($this->prp);
         if (!NM_is_utf8($this->prp))
         {
             $this->prp = sc_convert_encoding($this->prp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->prp = str_replace('<', '&lt;', $this->prp);
         $this->prp = str_replace('>', '&gt;', $this->prp);
         $this->Texto_tag .= "<td>" . $this->prp . "</td>\r\n";
   }
   //----- ren
   function NM_export_ren()
   {
         $this->ren = html_entity_decode($this->ren, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ren = strip_tags($this->ren);
         if (!NM_is_utf8($this->ren))
         {
             $this->ren = sc_convert_encoding($this->ren, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ren = str_replace('<', '&lt;', $this->ren);
         $this->ren = str_replace('>', '&gt;', $this->ren);
         $this->Texto_tag .= "<td>" . $this->ren . "</td>\r\n";
   }
   //----- ptc
   function NM_export_ptc()
   {
         $this->ptc = html_entity_decode($this->ptc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ptc = strip_tags($this->ptc);
         if (!NM_is_utf8($this->ptc))
         {
             $this->ptc = sc_convert_encoding($this->ptc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ptc = str_replace('<', '&lt;', $this->ptc);
         $this->ptc = str_replace('>', '&gt;', $this->ptc);
         $this->Texto_tag .= "<td>" . $this->ptc . "</td>\r\n";
   }
   //----- red
   function NM_export_red()
   {
         $this->red = html_entity_decode($this->red, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->red = strip_tags($this->red);
         if (!NM_is_utf8($this->red))
         {
             $this->red = sc_convert_encoding($this->red, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->red = str_replace('<', '&lt;', $this->red);
         $this->red = str_replace('>', '&gt;', $this->red);
         $this->Texto_tag .= "<td>" . $this->red . "</td>\r\n";
   }
   //----- lid
   function NM_export_lid()
   {
         $this->lid = html_entity_decode($this->lid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->lid = strip_tags($this->lid);
         if (!NM_is_utf8($this->lid))
         {
             $this->lid = sc_convert_encoding($this->lid, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->lid = str_replace('<', '&lt;', $this->lid);
         $this->lid = str_replace('>', '&gt;', $this->lid);
         $this->Texto_tag .= "<td>" . $this->lid . "</td>\r\n";
   }
   //----- pel
   function NM_export_pel()
   {
         $this->pel = html_entity_decode($this->pel, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pel = strip_tags($this->pel);
         if (!NM_is_utf8($this->pel))
         {
             $this->pel = sc_convert_encoding($this->pel, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->pel = str_replace('<', '&lt;', $this->pel);
         $this->pel = str_replace('>', '&gt;', $this->pel);
         $this->Texto_tag .= "<td>" . $this->pel . "</td>\r\n";
   }
   //----- com
   function NM_export_com()
   {
         $this->com = html_entity_decode($this->com, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->com = strip_tags($this->com);
         if (!NM_is_utf8($this->com))
         {
             $this->com = sc_convert_encoding($this->com, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->com = str_replace('<', '&lt;', $this->com);
         $this->com = str_replace('>', '&gt;', $this->com);
         $this->Texto_tag .= "<td>" . $this->com . "</td>\r\n";
   }
   //----- coc
   function NM_export_coc()
   {
         $this->coc = html_entity_decode($this->coc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->coc = strip_tags($this->coc);
         if (!NM_is_utf8($this->coc))
         {
             $this->coc = sc_convert_encoding($this->coc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->coc = str_replace('<', '&lt;', $this->coc);
         $this->coc = str_replace('>', '&gt;', $this->coc);
         $this->Texto_tag .= "<td>" . $this->coc . "</td>\r\n";
   }
   //----- aee
   function NM_export_aee()
   {
         $this->aee = html_entity_decode($this->aee, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->aee = strip_tags($this->aee);
         if (!NM_is_utf8($this->aee))
         {
             $this->aee = sc_convert_encoding($this->aee, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->aee = str_replace('<', '&lt;', $this->aee);
         $this->aee = str_replace('>', '&gt;', $this->aee);
         $this->Texto_tag .= "<td>" . $this->aee . "</td>\r\n";
   }
   //----- val
   function NM_export_val()
   {
         $this->val = html_entity_decode($this->val, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->val = strip_tags($this->val);
         if (!NM_is_utf8($this->val))
         {
             $this->val = sc_convert_encoding($this->val, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->val = str_replace('<', '&lt;', $this->val);
         $this->val = str_replace('>', '&gt;', $this->val);
         $this->Texto_tag .= "<td>" . $this->val . "</td>\r\n";
   }
   //----- t_estudiante_grupo_idstudent
   function NM_export_t_estudiante_grupo_idstudent()
   {
         nmgp_Form_Num_Val($this->look_t_estudiante_grupo_idstudent, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_t_estudiante_grupo_idstudent))
         {
             $this->look_t_estudiante_grupo_idstudent = sc_convert_encoding($this->look_t_estudiante_grupo_idstudent, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_t_estudiante_grupo_idstudent = str_replace('<', '&lt;', $this->look_t_estudiante_grupo_idstudent);
         $this->look_t_estudiante_grupo_idstudent = str_replace('>', '&gt;', $this->look_t_estudiante_grupo_idstudent);
         $this->Texto_tag .= "<td>" . $this->look_t_estudiante_grupo_idstudent . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="grid_grupo_x_asig_x_doce_1_normal_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_grupo_x_asig_x_doce_1_normal"> 
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