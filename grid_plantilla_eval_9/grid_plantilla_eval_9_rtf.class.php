<?php

class grid_plantilla_eval_9_rtf
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
   function grid_plantilla_eval_9_rtf()
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
      $this->Arquivo   .= "_grid_plantilla_eval_9";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_plantilla_eval_9.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_plantilla_eval_9']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_plantilla_eval_9']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_plantilla_eval_9']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['where_pesq_filtro'];
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_plantilla_eval_9']['contr_erro'] = 'on';
 $g = 1;
$this->contador = $g++ ;
$_SESSION['scriptcase']['grid_plantilla_eval_9']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT t_evaluacion.id_estudiante as t_evaluacion_id_estudiante, t_evaluacion.novedad as t_evaluacion_novedad, t_evaluacion.inasistencia_p1 as t_evaluacion_inasistencia_p1, t_evaluacion.eval_1_per as t_evaluacion_eval_1_per, t_evaluacion.eval_2_per as t_evaluacion_eval_2_per, t_evaluacion.eval_3_per as t_evaluacion_eval_3_per, t_evaluacion.dc1 as t_evaluacion_dc1, t_evaluacion.dc2 as t_evaluacion_dc2, t_evaluacion.dc3 as t_evaluacion_dc3, t_evaluacion.dc4 as t_evaluacion_dc4, t_evaluacion.dc5 as t_evaluacion_dc5, t_evaluacion.id_grupo as t_evaluacion_id_grupo, t_evaluacion.id_area as t_evaluacion_id_area, t_evaluacion.id_asignatura as t_evaluacion_id_asignatura, t_evaluacion.id_grado as t_evaluacion_id_grado, t_grupos.id_sede as t_grupos_id_sede, grupo_x_asig_x_doce.id_docente as grupo_x_asig_x_doce_id_docente, t_grupos.id_director_grupo as t_grupos_id_director_grupo, t_grupos.jornada as t_grupos_jornada from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT t_evaluacion.id_estudiante as t_evaluacion_id_estudiante, t_evaluacion.novedad as t_evaluacion_novedad, t_evaluacion.inasistencia_p1 as t_evaluacion_inasistencia_p1, t_evaluacion.eval_1_per as t_evaluacion_eval_1_per, t_evaluacion.eval_2_per as t_evaluacion_eval_2_per, t_evaluacion.eval_3_per as t_evaluacion_eval_3_per, t_evaluacion.dc1 as t_evaluacion_dc1, t_evaluacion.dc2 as t_evaluacion_dc2, t_evaluacion.dc3 as t_evaluacion_dc3, t_evaluacion.dc4 as t_evaluacion_dc4, t_evaluacion.dc5 as t_evaluacion_dc5, t_evaluacion.id_grupo as t_evaluacion_id_grupo, t_evaluacion.id_area as t_evaluacion_id_area, t_evaluacion.id_asignatura as t_evaluacion_id_asignatura, t_evaluacion.id_grado as t_evaluacion_id_grado, t_grupos.id_sede as t_grupos_id_sede, grupo_x_asig_x_doce.id_docente as grupo_x_asig_x_doce_id_docente, t_grupos.id_director_grupo as t_grupos_id_director_grupo, t_grupos.jornada as t_grupos_jornada from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_select .= " group by t_evaluacion.id_estudiante"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      if (!empty($this->Ini->nm_col_dinamica)) 
      {
          foreach ($this->Ini->nm_col_dinamica as $nm_cada_col => $nm_nova_col)
          {
                   $nmgp_select = str_replace($nm_cada_col, $nm_nova_col, $nmgp_select); 
          }
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['field_order'] as $Cada_col)
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
          $SC_Label = (isset($this->New_label['t_evaluacion_novedad'])) ? $this->New_label['t_evaluacion_novedad'] : "Nov"; 
          if ($Cada_col == "t_evaluacion_novedad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_evaluacion_inasistencia_p1'])) ? $this->New_label['t_evaluacion_inasistencia_p1'] : "FA"; 
          if ($Cada_col == "t_evaluacion_inasistencia_p1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['t_evaluacion_eval_1_per'])) ? $this->New_label['t_evaluacion_eval_1_per'] : "P1"; 
          if ($Cada_col == "t_evaluacion_eval_1_per" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_evaluacion_eval_2_per'])) ? $this->New_label['t_evaluacion_eval_2_per'] : "P2"; 
          if ($Cada_col == "t_evaluacion_eval_2_per" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_evaluacion_eval_3_per'])) ? $this->New_label['t_evaluacion_eval_3_per'] : "P3"; 
          if ($Cada_col == "t_evaluacion_eval_3_per" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fa'])) ? $this->New_label['fa'] : "VAc"; 
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
          $SC_Label = (isset($this->New_label['t_evaluacion_dc1'])) ? $this->New_label['t_evaluacion_dc1'] : "ExP"; 
          if ($Cada_col == "t_evaluacion_dc1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_evaluacion_dc2'])) ? $this->New_label['t_evaluacion_dc2'] : "ExFp"; 
          if ($Cada_col == "t_evaluacion_dc2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_evaluacion_dc3'])) ? $this->New_label['t_evaluacion_dc3'] : "TyT"; 
          if ($Cada_col == "t_evaluacion_dc3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_evaluacion_dc4'])) ? $this->New_label['t_evaluacion_dc4'] : "ParA"; 
          if ($Cada_col == "t_evaluacion_dc4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_evaluacion_dc5'])) ? $this->New_label['t_evaluacion_dc5'] : "ObsR"; 
          if ($Cada_col == "t_evaluacion_dc5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['val'])) ? $this->New_label['val'] : "VAL"; 
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
      } 
      $this->Texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->Texto_tag .= "<tr>\r\n";
         $this->t_evaluacion_id_estudiante = $rs->fields[0] ;  
         $this->t_evaluacion_id_estudiante = (string)$this->t_evaluacion_id_estudiante;
         $this->t_evaluacion_novedad = $rs->fields[1] ;  
         $this->t_evaluacion_inasistencia_p1 = $rs->fields[2] ;  
         $this->t_evaluacion_inasistencia_p1 = (string)$this->t_evaluacion_inasistencia_p1;
         $this->t_evaluacion_eval_1_per = $rs->fields[3] ;  
         $this->t_evaluacion_eval_1_per = (strpos(strtolower($this->t_evaluacion_eval_1_per), "e")) ? (float)$this->t_evaluacion_eval_1_per : $this->t_evaluacion_eval_1_per; 
         $this->t_evaluacion_eval_1_per = (string)$this->t_evaluacion_eval_1_per;
         $this->t_evaluacion_eval_2_per = $rs->fields[4] ;  
         $this->t_evaluacion_eval_2_per = (strpos(strtolower($this->t_evaluacion_eval_2_per), "e")) ? (float)$this->t_evaluacion_eval_2_per : $this->t_evaluacion_eval_2_per; 
         $this->t_evaluacion_eval_2_per = (string)$this->t_evaluacion_eval_2_per;
         $this->t_evaluacion_eval_3_per = $rs->fields[5] ;  
         $this->t_evaluacion_eval_3_per = (strpos(strtolower($this->t_evaluacion_eval_3_per), "e")) ? (float)$this->t_evaluacion_eval_3_per : $this->t_evaluacion_eval_3_per; 
         $this->t_evaluacion_eval_3_per = (string)$this->t_evaluacion_eval_3_per;
         $this->t_evaluacion_dc1 = $rs->fields[6] ;  
         $this->t_evaluacion_dc1 = (strpos(strtolower($this->t_evaluacion_dc1), "e")) ? (float)$this->t_evaluacion_dc1 : $this->t_evaluacion_dc1; 
         $this->t_evaluacion_dc1 = (string)$this->t_evaluacion_dc1;
         $this->t_evaluacion_dc2 = $rs->fields[7] ;  
         $this->t_evaluacion_dc2 = (strpos(strtolower($this->t_evaluacion_dc2), "e")) ? (float)$this->t_evaluacion_dc2 : $this->t_evaluacion_dc2; 
         $this->t_evaluacion_dc2 = (string)$this->t_evaluacion_dc2;
         $this->t_evaluacion_dc3 = $rs->fields[8] ;  
         $this->t_evaluacion_dc3 = (strpos(strtolower($this->t_evaluacion_dc3), "e")) ? (float)$this->t_evaluacion_dc3 : $this->t_evaluacion_dc3; 
         $this->t_evaluacion_dc3 = (string)$this->t_evaluacion_dc3;
         $this->t_evaluacion_dc4 = $rs->fields[9] ;  
         $this->t_evaluacion_dc4 = (strpos(strtolower($this->t_evaluacion_dc4), "e")) ? (float)$this->t_evaluacion_dc4 : $this->t_evaluacion_dc4; 
         $this->t_evaluacion_dc4 = (string)$this->t_evaluacion_dc4;
         $this->t_evaluacion_dc5 = $rs->fields[10] ;  
         $this->t_evaluacion_dc5 = (strpos(strtolower($this->t_evaluacion_dc5), "e")) ? (float)$this->t_evaluacion_dc5 : $this->t_evaluacion_dc5; 
         $this->t_evaluacion_dc5 = (string)$this->t_evaluacion_dc5;
         $this->t_evaluacion_id_grupo = $rs->fields[11] ;  
         $this->t_evaluacion_id_grupo = (string)$this->t_evaluacion_id_grupo;
         $this->t_evaluacion_id_area = $rs->fields[12] ;  
         $this->t_evaluacion_id_area = (string)$this->t_evaluacion_id_area;
         $this->t_evaluacion_id_asignatura = $rs->fields[13] ;  
         $this->t_evaluacion_id_asignatura = (string)$this->t_evaluacion_id_asignatura;
         $this->t_evaluacion_id_grado = $rs->fields[14] ;  
         $this->t_evaluacion_id_grado = (string)$this->t_evaluacion_id_grado;
         $this->t_grupos_id_sede = $rs->fields[15] ;  
         $this->t_grupos_id_sede = (string)$this->t_grupos_id_sede;
         $this->grupo_x_asig_x_doce_id_docente = $rs->fields[16] ;  
         $this->grupo_x_asig_x_doce_id_docente = (string)$this->grupo_x_asig_x_doce_id_docente;
         $this->t_grupos_id_director_grupo = $rs->fields[17] ;  
         $this->t_grupos_id_director_grupo = (string)$this->t_grupos_id_director_grupo;
         $this->t_grupos_jornada = $rs->fields[18] ;  
         //----- lookup - t_evaluacion_id_estudiante
         $this->look_t_evaluacion_id_estudiante = $this->t_evaluacion_id_estudiante; 
         $this->Lookup->lookup_t_evaluacion_id_estudiante($this->look_t_evaluacion_id_estudiante, $this->t_evaluacion_id_estudiante) ; 
         $this->look_t_evaluacion_id_estudiante = ($this->look_t_evaluacion_id_estudiante == "&nbsp;") ? "" : $this->look_t_evaluacion_id_estudiante; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['field_order'] as $Cada_col)
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
   //----- t_evaluacion_novedad
   function NM_export_t_evaluacion_novedad()
   {
         $this->t_evaluacion_novedad = html_entity_decode($this->t_evaluacion_novedad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->t_evaluacion_novedad = strip_tags($this->t_evaluacion_novedad);
         if (!NM_is_utf8($this->t_evaluacion_novedad))
         {
             $this->t_evaluacion_novedad = sc_convert_encoding($this->t_evaluacion_novedad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_evaluacion_novedad = str_replace('<', '&lt;', $this->t_evaluacion_novedad);
         $this->t_evaluacion_novedad = str_replace('>', '&gt;', $this->t_evaluacion_novedad);
         $this->Texto_tag .= "<td>" . $this->t_evaluacion_novedad . "</td>\r\n";
   }
   //----- t_evaluacion_inasistencia_p1
   function NM_export_t_evaluacion_inasistencia_p1()
   {
         nmgp_Form_Num_Val($this->t_evaluacion_inasistencia_p1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->t_evaluacion_inasistencia_p1))
         {
             $this->t_evaluacion_inasistencia_p1 = sc_convert_encoding($this->t_evaluacion_inasistencia_p1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_evaluacion_inasistencia_p1 = str_replace('<', '&lt;', $this->t_evaluacion_inasistencia_p1);
         $this->t_evaluacion_inasistencia_p1 = str_replace('>', '&gt;', $this->t_evaluacion_inasistencia_p1);
         $this->Texto_tag .= "<td>" . $this->t_evaluacion_inasistencia_p1 . "</td>\r\n";
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
   //----- t_evaluacion_eval_1_per
   function NM_export_t_evaluacion_eval_1_per()
   {
         nmgp_Form_Num_Val($this->t_evaluacion_eval_1_per, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->t_evaluacion_eval_1_per))
         {
             $this->t_evaluacion_eval_1_per = sc_convert_encoding($this->t_evaluacion_eval_1_per, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_evaluacion_eval_1_per = str_replace('<', '&lt;', $this->t_evaluacion_eval_1_per);
         $this->t_evaluacion_eval_1_per = str_replace('>', '&gt;', $this->t_evaluacion_eval_1_per);
         $this->Texto_tag .= "<td>" . $this->t_evaluacion_eval_1_per . "</td>\r\n";
   }
   //----- t_evaluacion_eval_2_per
   function NM_export_t_evaluacion_eval_2_per()
   {
         nmgp_Form_Num_Val($this->t_evaluacion_eval_2_per, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->t_evaluacion_eval_2_per))
         {
             $this->t_evaluacion_eval_2_per = sc_convert_encoding($this->t_evaluacion_eval_2_per, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_evaluacion_eval_2_per = str_replace('<', '&lt;', $this->t_evaluacion_eval_2_per);
         $this->t_evaluacion_eval_2_per = str_replace('>', '&gt;', $this->t_evaluacion_eval_2_per);
         $this->Texto_tag .= "<td>" . $this->t_evaluacion_eval_2_per . "</td>\r\n";
   }
   //----- t_evaluacion_eval_3_per
   function NM_export_t_evaluacion_eval_3_per()
   {
         nmgp_Form_Num_Val($this->t_evaluacion_eval_3_per, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->t_evaluacion_eval_3_per))
         {
             $this->t_evaluacion_eval_3_per = sc_convert_encoding($this->t_evaluacion_eval_3_per, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_evaluacion_eval_3_per = str_replace('<', '&lt;', $this->t_evaluacion_eval_3_per);
         $this->t_evaluacion_eval_3_per = str_replace('>', '&gt;', $this->t_evaluacion_eval_3_per);
         $this->Texto_tag .= "<td>" . $this->t_evaluacion_eval_3_per . "</td>\r\n";
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
   //----- t_evaluacion_dc1
   function NM_export_t_evaluacion_dc1()
   {
         nmgp_Form_Num_Val($this->t_evaluacion_dc1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->t_evaluacion_dc1))
         {
             $this->t_evaluacion_dc1 = sc_convert_encoding($this->t_evaluacion_dc1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_evaluacion_dc1 = str_replace('<', '&lt;', $this->t_evaluacion_dc1);
         $this->t_evaluacion_dc1 = str_replace('>', '&gt;', $this->t_evaluacion_dc1);
         $this->Texto_tag .= "<td>" . $this->t_evaluacion_dc1 . "</td>\r\n";
   }
   //----- t_evaluacion_dc2
   function NM_export_t_evaluacion_dc2()
   {
         nmgp_Form_Num_Val($this->t_evaluacion_dc2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->t_evaluacion_dc2))
         {
             $this->t_evaluacion_dc2 = sc_convert_encoding($this->t_evaluacion_dc2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_evaluacion_dc2 = str_replace('<', '&lt;', $this->t_evaluacion_dc2);
         $this->t_evaluacion_dc2 = str_replace('>', '&gt;', $this->t_evaluacion_dc2);
         $this->Texto_tag .= "<td>" . $this->t_evaluacion_dc2 . "</td>\r\n";
   }
   //----- t_evaluacion_dc3
   function NM_export_t_evaluacion_dc3()
   {
         nmgp_Form_Num_Val($this->t_evaluacion_dc3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->t_evaluacion_dc3))
         {
             $this->t_evaluacion_dc3 = sc_convert_encoding($this->t_evaluacion_dc3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_evaluacion_dc3 = str_replace('<', '&lt;', $this->t_evaluacion_dc3);
         $this->t_evaluacion_dc3 = str_replace('>', '&gt;', $this->t_evaluacion_dc3);
         $this->Texto_tag .= "<td>" . $this->t_evaluacion_dc3 . "</td>\r\n";
   }
   //----- t_evaluacion_dc4
   function NM_export_t_evaluacion_dc4()
   {
         nmgp_Form_Num_Val($this->t_evaluacion_dc4, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->t_evaluacion_dc4))
         {
             $this->t_evaluacion_dc4 = sc_convert_encoding($this->t_evaluacion_dc4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_evaluacion_dc4 = str_replace('<', '&lt;', $this->t_evaluacion_dc4);
         $this->t_evaluacion_dc4 = str_replace('>', '&gt;', $this->t_evaluacion_dc4);
         $this->Texto_tag .= "<td>" . $this->t_evaluacion_dc4 . "</td>\r\n";
   }
   //----- t_evaluacion_dc5
   function NM_export_t_evaluacion_dc5()
   {
         nmgp_Form_Num_Val($this->t_evaluacion_dc5, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->t_evaluacion_dc5))
         {
             $this->t_evaluacion_dc5 = sc_convert_encoding($this->t_evaluacion_dc5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->t_evaluacion_dc5 = str_replace('<', '&lt;', $this->t_evaluacion_dc5);
         $this->t_evaluacion_dc5 = str_replace('>', '&gt;', $this->t_evaluacion_dc5);
         $this->Texto_tag .= "<td>" . $this->t_evaluacion_dc5 . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_eval_9'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE> :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_plantilla_eval_9_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_plantilla_eval_9"> 
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
