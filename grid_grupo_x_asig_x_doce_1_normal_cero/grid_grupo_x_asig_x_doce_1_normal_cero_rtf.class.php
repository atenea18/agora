<?php

class grid_grupo_x_asig_x_doce_1_normal_cero_rtf
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
   function grid_grupo_x_asig_x_doce_1_normal_cero_rtf()
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
      $this->Arquivo   .= "_grid_grupo_x_asig_x_doce_1_normal_cero";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_grupo_x_asig_x_doce_1_normal_cero.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_1_normal_cero']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_1_normal_cero']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_1_normal_cero']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['campos_busca'];
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT CONCAT_WS(' ',students.primer_apellido,students.segundo_apellido,students.primer_nombre,students.segundo_nombre) as nom_estudiante, novedades_x_estudiante_fecha.id_novedad as cmp_maior_30_1, t_estudiante_grupo.idstudent as t_estudiante_grupo_idstudent, students.estatus as students_estatus from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT CONCAT_WS(' ',students.primer_apellido,students.segundo_apellido,students.primer_nombre,students.segundo_nombre) as nom_estudiante, novedades_x_estudiante_fecha.id_novedad as cmp_maior_30_1, t_estudiante_grupo.idstudent as t_estudiante_grupo_idstudent, students.estatus as students_estatus from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['where_pesq'];
      $nmgp_select .= " group by t_estudiante_grupo.idstudent"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['nom_estudiante'])) ? $this->New_label['nom_estudiante'] : "Nombres y Apellidos"; 
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
          $SC_Label = (isset($this->New_label['est'])) ? $this->New_label['est'] : "Est"; 
          if ($Cada_col == "est" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['fa'])) ? $this->New_label['fa'] : "FA"; 
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
          $SC_Label = (isset($this->New_label['re'])) ? $this->New_label['re'] : "RE"; 
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
          $SC_Label = (isset($this->New_label['p1'])) ? $this->New_label['p1'] : "P1"; 
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
          $SC_Label = (isset($this->New_label['p2'])) ? $this->New_label['p2'] : "P2"; 
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
          $SC_Label = (isset($this->New_label['p3'])) ? $this->New_label['p3'] : "P3"; 
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
          $SC_Label = (isset($this->New_label['p4'])) ? $this->New_label['p4'] : "P4"; 
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
          $SC_Label = (isset($this->New_label['vac'])) ? $this->New_label['vac'] : "Vac"; 
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
          $SC_Label = (isset($this->New_label['vra'])) ? $this->New_label['vra'] : "VRa"; 
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
          $SC_Label = (isset($this->New_label['col1'])) ? $this->New_label['col1'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['col2'])) ? $this->New_label['col2'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['col3'])) ? $this->New_label['col3'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['col4'])) ? $this->New_label['col4'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['col5'])) ? $this->New_label['col5'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['col6'])) ? $this->New_label['col6'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['col7'])) ? $this->New_label['col7'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['col8'])) ? $this->New_label['col8'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['col9'])) ? $this->New_label['col9'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['col10'])) ? $this->New_label['col10'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['par'])) ? $this->New_label['par'] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
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
          $SC_Label = (isset($this->New_label['val'])) ? $this->New_label['val'] : "Val"; 
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
         $this->students_estatus = $rs->fields[3] ;  
         //----- lookup - novedades_x_estudiante_fecha_id_novedad
         $this->look_novedades_x_estudiante_fecha_id_novedad = $this->novedades_x_estudiante_fecha_id_novedad; 
         $this->Lookup->lookup_novedades_x_estudiante_fecha_id_novedad($this->look_novedades_x_estudiante_fecha_id_novedad, $this->novedades_x_estudiante_fecha_id_novedad) ; 
         $this->look_novedades_x_estudiante_fecha_id_novedad = ($this->look_novedades_x_estudiante_fecha_id_novedad == "&nbsp;") ? "" : $this->look_novedades_x_estudiante_fecha_id_novedad; 
         //----- lookup - t_estudiante_grupo_idstudent
         $this->look_t_estudiante_grupo_idstudent = $this->t_estudiante_grupo_idstudent; 
         $this->Lookup->lookup_t_estudiante_grupo_idstudent($this->look_t_estudiante_grupo_idstudent, $this->t_estudiante_grupo_idstudent) ; 
         $this->look_t_estudiante_grupo_idstudent = ($this->look_t_estudiante_grupo_idstudent == "&nbsp;") ? "" : $this->look_t_estudiante_grupo_idstudent; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_1_normal_cero']['contr_erro'] = 'on';
 if($this->students_estatus == 'N'){
        $this->est  = $this->students_estatus ;
	}else{
	   $this->est  = ' ';
	}
$_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_1_normal_cero']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['field_order'] as $Cada_col)
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
   //----- est
   function NM_export_est()
   {
         $this->est = html_entity_decode($this->est, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->est = strip_tags($this->est);
         if (!NM_is_utf8($this->est))
         {
             $this->est = sc_convert_encoding($this->est, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->est = str_replace('<', '&lt;', $this->est);
         $this->est = str_replace('>', '&gt;', $this->est);
         $this->Texto_tag .= "<td>" . $this->est . "</td>\r\n";
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
   //----- col6
   function NM_export_col6()
   {
         $this->col6 = html_entity_decode($this->col6, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col6 = strip_tags($this->col6);
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
         $this->col7 = html_entity_decode($this->col7, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col7 = strip_tags($this->col7);
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
         $this->col8 = html_entity_decode($this->col8, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->col8 = strip_tags($this->col8);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal_cero'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="grid_grupo_x_asig_x_doce_1_normal_cero_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_grupo_x_asig_x_doce_1_normal_cero"> 
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
