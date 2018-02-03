<?php

class grid_plantilla_asistencia_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_plantilla_asistencia_xml()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nm_data    = new nm_data("es");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo     .= "_grid_plantilla_asistencia";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_plantilla_asistencia.xml";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
   }

   //----- 
   function grava_arquivo()
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
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

      $xml_charset = $_SESSION['scriptcase']['charset'];
      $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      if ($this->Grava_view)
      {
          $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
          $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
          fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
          fwrite($xml_v, "<root>\r\n");
      }
      while (!$rs->EOF)
      {
         $this->xml_registro = "<grid_plantilla_asistencia";
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
         $this->xml_registro .= " />\r\n";
         fwrite($xml_f, $this->xml_registro);
         if ($this->Grava_view)
         {
            fwrite($xml_v, $this->xml_registro);
         }
         $rs->MoveNext();
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
      if ($this->Grava_view)
      {
         fwrite($xml_v, "</root>");
         fclose($xml_v);
      }

      $rs->Close();
   }
   //----- t_evaluacion_id_estudiante
   function NM_export_t_evaluacion_id_estudiante()
   {
         nmgp_Form_Num_Val($this->look_t_evaluacion_id_estudiante, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_t_evaluacion_id_estudiante))
         {
             $this->look_t_evaluacion_id_estudiante = sc_convert_encoding($this->look_t_evaluacion_id_estudiante, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " t_evaluacion_id_estudiante =\"" . $this->trata_dados($this->look_t_evaluacion_id_estudiante) . "\"";
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 1 =\"" . $this->trata_dados($this->sc_field_0) . "\"";
   }
   //----- sc_field_1
   function NM_export_sc_field_1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_1))
         {
             $this->sc_field_1 = sc_convert_encoding($this->sc_field_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 2 =\"" . $this->trata_dados($this->sc_field_1) . "\"";
   }
   //----- sc_field_2
   function NM_export_sc_field_2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_2))
         {
             $this->sc_field_2 = sc_convert_encoding($this->sc_field_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 3 =\"" . $this->trata_dados($this->sc_field_2) . "\"";
   }
   //----- sc_field_3
   function NM_export_sc_field_3()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_3))
         {
             $this->sc_field_3 = sc_convert_encoding($this->sc_field_3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 4 =\"" . $this->trata_dados($this->sc_field_3) . "\"";
   }
   //----- sc_field_4
   function NM_export_sc_field_4()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_4))
         {
             $this->sc_field_4 = sc_convert_encoding($this->sc_field_4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 5 =\"" . $this->trata_dados($this->sc_field_4) . "\"";
   }
   //----- sc_field_5
   function NM_export_sc_field_5()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_5))
         {
             $this->sc_field_5 = sc_convert_encoding($this->sc_field_5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 6 =\"" . $this->trata_dados($this->sc_field_5) . "\"";
   }
   //----- sc_field_6
   function NM_export_sc_field_6()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_6))
         {
             $this->sc_field_6 = sc_convert_encoding($this->sc_field_6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 7 =\"" . $this->trata_dados($this->sc_field_6) . "\"";
   }
   //----- sc_field_7
   function NM_export_sc_field_7()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_7))
         {
             $this->sc_field_7 = sc_convert_encoding($this->sc_field_7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 8 =\"" . $this->trata_dados($this->sc_field_7) . "\"";
   }
   //----- sc_field_8
   function NM_export_sc_field_8()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_8))
         {
             $this->sc_field_8 = sc_convert_encoding($this->sc_field_8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 9 =\"" . $this->trata_dados($this->sc_field_8) . "\"";
   }
   //----- sc_field_9
   function NM_export_sc_field_9()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_9))
         {
             $this->sc_field_9 = sc_convert_encoding($this->sc_field_9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 10 =\"" . $this->trata_dados($this->sc_field_9) . "\"";
   }
   //----- sc_field_10
   function NM_export_sc_field_10()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_10))
         {
             $this->sc_field_10 = sc_convert_encoding($this->sc_field_10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 11 =\"" . $this->trata_dados($this->sc_field_10) . "\"";
   }
   //----- sc_field_11
   function NM_export_sc_field_11()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_11))
         {
             $this->sc_field_11 = sc_convert_encoding($this->sc_field_11, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 12 =\"" . $this->trata_dados($this->sc_field_11) . "\"";
   }
   //----- sc_field_12
   function NM_export_sc_field_12()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_12))
         {
             $this->sc_field_12 = sc_convert_encoding($this->sc_field_12, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 13 =\"" . $this->trata_dados($this->sc_field_12) . "\"";
   }
   //----- sc_field_13
   function NM_export_sc_field_13()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_13))
         {
             $this->sc_field_13 = sc_convert_encoding($this->sc_field_13, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 14 =\"" . $this->trata_dados($this->sc_field_13) . "\"";
   }
   //----- sc_field_14
   function NM_export_sc_field_14()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_14))
         {
             $this->sc_field_14 = sc_convert_encoding($this->sc_field_14, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 15 =\"" . $this->trata_dados($this->sc_field_14) . "\"";
   }
   //----- sc_field_15
   function NM_export_sc_field_15()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_15))
         {
             $this->sc_field_15 = sc_convert_encoding($this->sc_field_15, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 16 =\"" . $this->trata_dados($this->sc_field_15) . "\"";
   }
   //----- sc_field_16
   function NM_export_sc_field_16()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_16))
         {
             $this->sc_field_16 = sc_convert_encoding($this->sc_field_16, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 17 =\"" . $this->trata_dados($this->sc_field_16) . "\"";
   }
   //----- sc_field_17
   function NM_export_sc_field_17()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_17))
         {
             $this->sc_field_17 = sc_convert_encoding($this->sc_field_17, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 18 =\"" . $this->trata_dados($this->sc_field_17) . "\"";
   }
   //----- sc_field_18
   function NM_export_sc_field_18()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_18))
         {
             $this->sc_field_18 = sc_convert_encoding($this->sc_field_18, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 19 =\"" . $this->trata_dados($this->sc_field_18) . "\"";
   }
   //----- sc_field_19
   function NM_export_sc_field_19()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_19))
         {
             $this->sc_field_19 = sc_convert_encoding($this->sc_field_19, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 20 =\"" . $this->trata_dados($this->sc_field_19) . "\"";
   }
   //----- sc_field_20
   function NM_export_sc_field_20()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_20))
         {
             $this->sc_field_20 = sc_convert_encoding($this->sc_field_20, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 21 =\"" . $this->trata_dados($this->sc_field_20) . "\"";
   }
   //----- sc_field_21
   function NM_export_sc_field_21()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_21))
         {
             $this->sc_field_21 = sc_convert_encoding($this->sc_field_21, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 22 =\"" . $this->trata_dados($this->sc_field_21) . "\"";
   }
   //----- sc_field_22
   function NM_export_sc_field_22()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_22))
         {
             $this->sc_field_22 = sc_convert_encoding($this->sc_field_22, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 23 =\"" . $this->trata_dados($this->sc_field_22) . "\"";
   }
   //----- sc_field_23
   function NM_export_sc_field_23()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_23))
         {
             $this->sc_field_23 = sc_convert_encoding($this->sc_field_23, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 24 =\"" . $this->trata_dados($this->sc_field_23) . "\"";
   }
   //----- sc_field_24
   function NM_export_sc_field_24()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_24))
         {
             $this->sc_field_24 = sc_convert_encoding($this->sc_field_24, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 25 =\"" . $this->trata_dados($this->sc_field_24) . "\"";
   }
   //----- sc_field_25
   function NM_export_sc_field_25()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_25))
         {
             $this->sc_field_25 = sc_convert_encoding($this->sc_field_25, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 26 =\"" . $this->trata_dados($this->sc_field_25) . "\"";
   }
   //----- sc_field_26
   function NM_export_sc_field_26()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_26))
         {
             $this->sc_field_26 = sc_convert_encoding($this->sc_field_26, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 27 =\"" . $this->trata_dados($this->sc_field_26) . "\"";
   }
   //----- sc_field_27
   function NM_export_sc_field_27()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_27))
         {
             $this->sc_field_27 = sc_convert_encoding($this->sc_field_27, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 28 =\"" . $this->trata_dados($this->sc_field_27) . "\"";
   }
   //----- sc_field_28
   function NM_export_sc_field_28()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_28))
         {
             $this->sc_field_28 = sc_convert_encoding($this->sc_field_28, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 29 =\"" . $this->trata_dados($this->sc_field_28) . "\"";
   }
   //----- sc_field_29
   function NM_export_sc_field_29()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_29))
         {
             $this->sc_field_29 = sc_convert_encoding($this->sc_field_29, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 30 =\"" . $this->trata_dados($this->sc_field_29) . "\"";
   }
   //----- sc_field_30
   function NM_export_sc_field_30()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sc_field_30))
         {
             $this->sc_field_30 = sc_convert_encoding($this->sc_field_30, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " 31 =\"" . $this->trata_dados($this->sc_field_30) . "\"";
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_plantilla_asistencia'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Planillas de Evaluacion - :: XML</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XML</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_plantilla_asistencia_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_plantilla_asistencia"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
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
