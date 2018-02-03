<?php

class grid_t_evaluacion_grupos_area_xml
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
   function grid_t_evaluacion_grupos_area_xml()
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
      $this->Arquivo     .= "_grid_t_evaluacion_grupos_area";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_t_evaluacion_grupos_area.xml";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_grupos_area']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_grupos_area']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_grupos_area']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->id_estudiante = $Busca_temp['id_estudiante']; 
          $tmp_pos = strpos($this->id_estudiante, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_estudiante = substr($this->id_estudiante, 0, $tmp_pos);
          }
          $this->id_estudiante_2 = $Busca_temp['id_estudiante_input_2']; 
          $this->id_grupo = $Busca_temp['id_grupo']; 
          $tmp_pos = strpos($this->id_grupo, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_grupo = substr($this->id_grupo, 0, $tmp_pos);
          }
          $this->id_grupo_2 = $Busca_temp['id_grupo_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_estudiante, id_grupo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_estudiante, id_grupo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['where_pesq'];
      $nmgp_select .= " group by id_estudiante"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['order_grid'];
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
         $this->xml_registro = "<grid_t_evaluacion_grupos_area";
         $this->id_estudiante = $rs->fields[0] ;  
         $this->id_estudiante = (string)$this->id_estudiante;
         $this->id_grupo = $rs->fields[1] ;  
         $this->id_grupo = (string)$this->id_grupo;
         //----- lookup - id_estudiante
         $this->look_id_estudiante = $this->id_estudiante; 
         $this->Lookup->lookup_id_estudiante($this->look_id_estudiante, $this->id_estudiante) ; 
         $this->look_id_estudiante = ($this->look_id_estudiante == "&nbsp;") ? "" : $this->look_id_estudiante; 
         $this->sc_proc_grid = true; 
         //----- lookup - asig1
         $this->Lookup->lookup_asig1($this->asig1, $this->id_estudiante, $_SESSION['par_id_asig1'], $this->array_asig1); 
         $this->asig1 = str_replace("<br>", " ", $this->asig1); 
         $this->asig1 = ($this->asig1 == "&nbsp;") ? "" : $this->asig1; 
         //----- lookup - asig2
         $this->Lookup->lookup_asig2($this->asig2, $this->id_estudiante, $_SESSION['par_id_asig2'], $this->array_asig2); 
         $this->asig2 = str_replace("<br>", " ", $this->asig2); 
         $this->asig2 = ($this->asig2 == "&nbsp;") ? "" : $this->asig2; 
         //----- lookup - asig3
         $this->Lookup->lookup_asig3($this->asig3, $this->id_estudiante, $_SESSION['par_id_asig3'], $this->array_asig3); 
         $this->asig3 = str_replace("<br>", " ", $this->asig3); 
         $this->asig3 = ($this->asig3 == "&nbsp;") ? "" : $this->asig3; 
         //----- lookup - asig4
         $this->Lookup->lookup_asig4($this->asig4, $this->id_estudiante, $_SESSION['par_id_asig4'], $this->array_asig4); 
         $this->asig4 = str_replace("<br>", " ", $this->asig4); 
         $this->asig4 = ($this->asig4 == "&nbsp;") ? "" : $this->asig4; 
         //----- lookup - asig5
         $this->Lookup->lookup_asig5($this->asig5, $this->id_estudiante, $_SESSION['par_id_asig5'], $this->array_asig5); 
         $this->asig5 = str_replace("<br>", " ", $this->asig5); 
         $this->asig5 = ($this->asig5 == "&nbsp;") ? "" : $this->asig5; 
         //----- lookup - asig6
         $this->Lookup->lookup_asig6($this->asig6, $this->id_estudiante, $_SESSION['par_id_asig6'], $this->array_asig6); 
         $this->asig6 = str_replace("<br>", " ", $this->asig6); 
         $this->asig6 = ($this->asig6 == "&nbsp;") ? "" : $this->asig6; 
         //----- lookup - asig7
         $this->Lookup->lookup_asig7($this->asig7, $this->id_estudiante, $_SESSION['par_id_asig7'], $this->array_asig7); 
         $this->asig7 = str_replace("<br>", " ", $this->asig7); 
         $this->asig7 = ($this->asig7 == "&nbsp;") ? "" : $this->asig7; 
         //----- lookup - asig8
         $this->Lookup->lookup_asig8($this->asig8, $this->id_estudiante, $_SESSION['par_id_asig8'], $this->array_asig8); 
         $this->asig8 = str_replace("<br>", " ", $this->asig8); 
         $this->asig8 = ($this->asig8 == "&nbsp;") ? "" : $this->asig8; 
         //----- lookup - asig9
         $this->Lookup->lookup_asig9($this->asig9, $this->id_estudiante, $_SESSION['par_id_asig9'], $this->array_asig9); 
         $this->asig9 = str_replace("<br>", " ", $this->asig9); 
         $this->asig9 = ($this->asig9 == "&nbsp;") ? "" : $this->asig9; 
         //----- lookup - asig10
         $this->Lookup->lookup_asig10($this->asig10, $this->id_estudiante, $_SESSION['par_id_asig10'], $this->array_asig10); 
         $this->asig10 = str_replace("<br>", " ", $this->asig10); 
         $this->asig10 = ($this->asig10 == "&nbsp;") ? "" : $this->asig10; 
         //----- lookup - asig11
         $this->Lookup->lookup_asig11($this->asig11, $this->id_estudiante, $_SESSION['par_id_asig11'], $this->array_asig11); 
         $this->asig11 = str_replace("<br>", " ", $this->asig11); 
         $this->asig11 = ($this->asig11 == "&nbsp;") ? "" : $this->asig11; 
         //----- lookup - asig12
         $this->Lookup->lookup_asig12($this->asig12, $this->id_estudiante, $_SESSION['par_id_asig12'], $this->array_asig12); 
         $this->asig12 = str_replace("<br>", " ", $this->asig12); 
         $this->asig12 = ($this->asig12 == "&nbsp;") ? "" : $this->asig12; 
         //----- lookup - asig13
         $this->Lookup->lookup_asig13($this->asig13, $this->id_estudiante, $_SESSION['par_id_asig13'], $this->array_asig13); 
         $this->asig13 = str_replace("<br>", " ", $this->asig13); 
         $this->asig13 = ($this->asig13 == "&nbsp;") ? "" : $this->asig13; 
         //----- lookup - asig14
         $this->Lookup->lookup_asig14($this->asig14, $this->id_estudiante, $_SESSION['par_id_asig14'], $this->array_asig14); 
         $this->asig14 = str_replace("<br>", " ", $this->asig14); 
         $this->asig14 = ($this->asig14 == "&nbsp;") ? "" : $this->asig14; 
         //----- lookup - asig15
         $this->Lookup->lookup_asig15($this->asig15, $this->id_estudiante, $_SESSION['par_id_asig15'], $this->array_asig15); 
         $this->asig15 = str_replace("<br>", " ", $this->asig15); 
         $this->asig15 = ($this->asig15 == "&nbsp;") ? "" : $this->asig15; 
         //----- lookup - asig16
         $this->Lookup->lookup_asig16($this->asig16, $this->id_estudiante, $_SESSION['par_id_asig16'], $this->array_asig16); 
         $this->asig16 = str_replace("<br>", " ", $this->asig16); 
         $this->asig16 = ($this->asig16 == "&nbsp;") ? "" : $this->asig16; 
         //----- lookup - asig17
         $this->Lookup->lookup_asig17($this->asig17, $this->id_estudiante, $_SESSION['par_id_asig17'], $this->array_asig17); 
         $this->asig17 = str_replace("<br>", " ", $this->asig17); 
         $this->asig17 = ($this->asig17 == "&nbsp;") ? "" : $this->asig17; 
         //----- lookup - asig18
         $this->Lookup->lookup_asig18($this->asig18, $this->id_estudiante, $_SESSION['par_id_asig18'], $this->array_asig18); 
         $this->asig18 = str_replace("<br>", " ", $this->asig18); 
         $this->asig18 = ($this->asig18 == "&nbsp;") ? "" : $this->asig18; 
         //----- lookup - asig19
         $this->Lookup->lookup_asig19($this->asig19, $this->id_estudiante, $_SESSION['par_id_asig19'], $this->array_asig19); 
         $this->asig19 = str_replace("<br>", " ", $this->asig19); 
         $this->asig19 = ($this->asig19 == "&nbsp;") ? "" : $this->asig19; 
         //----- lookup - asig20
         $this->Lookup->lookup_asig20($this->asig20, $this->id_estudiante, $_SESSION['par_id_asig20'], $this->array_asig20); 
         $this->asig20 = str_replace("<br>", " ", $this->asig20); 
         $this->asig20 = ($this->asig20 == "&nbsp;") ? "" : $this->asig20; 
         //----- lookup - asig21
         $this->Lookup->lookup_asig21($this->asig21, $this->id_estudiante, $_SESSION['par_id_asig21'], $this->array_asig21); 
         $this->asig21 = str_replace("<br>", " ", $this->asig21); 
         $this->asig21 = ($this->asig21 == "&nbsp;") ? "" : $this->asig21; 
         //----- lookup - asig22
         $this->Lookup->lookup_asig22($this->asig22, $this->id_estudiante, $_SESSION['par_id_asig22'], $this->array_asig22); 
         $this->asig22 = str_replace("<br>", " ", $this->asig22); 
         $this->asig22 = ($this->asig22 == "&nbsp;") ? "" : $this->asig22; 
         //----- lookup - asig23
         $this->Lookup->lookup_asig23($this->asig23, $this->id_estudiante, $_SESSION['par_id_asig23'], $this->array_asig23); 
         $this->asig23 = str_replace("<br>", " ", $this->asig23); 
         $this->asig23 = ($this->asig23 == "&nbsp;") ? "" : $this->asig23; 
         //----- lookup - asig24
         $this->Lookup->lookup_asig24($this->asig24, $this->id_estudiante, $_SESSION['par_id_asig24'], $this->array_asig24); 
         $this->asig24 = str_replace("<br>", " ", $this->asig24); 
         $this->asig24 = ($this->asig24 == "&nbsp;") ? "" : $this->asig24; 
         //----- lookup - asig25
         $this->Lookup->lookup_asig25($this->asig25, $this->id_estudiante, $_SESSION['par_id_asig25'], $this->array_asig25); 
         $this->asig25 = str_replace("<br>", " ", $this->asig25); 
         $this->asig25 = ($this->asig25 == "&nbsp;") ? "" : $this->asig25; 
         //----- lookup - asig26
         $this->Lookup->lookup_asig26($this->asig26, $this->id_estudiante, $_SESSION['par_id_asig26'], $this->array_asig26); 
         $this->asig26 = str_replace("<br>", " ", $this->asig26); 
         $this->asig26 = ($this->asig26 == "&nbsp;") ? "" : $this->asig26; 
         //----- lookup - asig27
         $this->Lookup->lookup_asig27($this->asig27, $this->id_estudiante, $_SESSION['par_id_asig27'], $this->array_asig27); 
         $this->asig27 = str_replace("<br>", " ", $this->asig27); 
         $this->asig27 = ($this->asig27 == "&nbsp;") ? "" : $this->asig27; 
         //----- lookup - asig28
         $this->Lookup->lookup_asig28($this->asig28, $this->id_estudiante, $_SESSION['par_id_asig28'], $this->array_asig28); 
         $this->asig28 = str_replace("<br>", " ", $this->asig28); 
         $this->asig28 = ($this->asig28 == "&nbsp;") ? "" : $this->asig28; 
         //----- lookup - asig29
         $this->Lookup->lookup_asig29($this->asig29, $this->id_estudiante, $_SESSION['par_id_asig29'], $this->array_asig29); 
         $this->asig29 = str_replace("<br>", " ", $this->asig29); 
         $this->asig29 = ($this->asig29 == "&nbsp;") ? "" : $this->asig29; 
         //----- lookup - asig30
         $this->Lookup->lookup_asig30($this->asig30, $this->id_estudiante, $_SESSION['par_id_asig30'], $this->array_asig30); 
         $this->asig30 = str_replace("<br>", " ", $this->asig30); 
         $this->asig30 = ($this->asig30 == "&nbsp;") ? "" : $this->asig30; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['field_order'] as $Cada_col)
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
   //----- id_estudiante
   function NM_export_id_estudiante()
   {
         nmgp_Form_Num_Val($this->look_id_estudiante, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_id_estudiante))
         {
             $this->look_id_estudiante = sc_convert_encoding($this->look_id_estudiante, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_estudiante =\"" . $this->trata_dados($this->look_id_estudiante) . "\"";
   }
   //----- asig1
   function NM_export_asig1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig1))
         {
             $this->asig1 = sc_convert_encoding($this->asig1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig1 =\"" . $this->trata_dados($this->asig1) . "\"";
   }
   //----- asig2
   function NM_export_asig2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig2))
         {
             $this->asig2 = sc_convert_encoding($this->asig2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig2 =\"" . $this->trata_dados($this->asig2) . "\"";
   }
   //----- asig3
   function NM_export_asig3()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig3))
         {
             $this->asig3 = sc_convert_encoding($this->asig3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig3 =\"" . $this->trata_dados($this->asig3) . "\"";
   }
   //----- asig4
   function NM_export_asig4()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig4))
         {
             $this->asig4 = sc_convert_encoding($this->asig4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig4 =\"" . $this->trata_dados($this->asig4) . "\"";
   }
   //----- asig5
   function NM_export_asig5()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig5))
         {
             $this->asig5 = sc_convert_encoding($this->asig5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig5 =\"" . $this->trata_dados($this->asig5) . "\"";
   }
   //----- asig6
   function NM_export_asig6()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig6))
         {
             $this->asig6 = sc_convert_encoding($this->asig6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig6 =\"" . $this->trata_dados($this->asig6) . "\"";
   }
   //----- asig7
   function NM_export_asig7()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig7))
         {
             $this->asig7 = sc_convert_encoding($this->asig7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig7 =\"" . $this->trata_dados($this->asig7) . "\"";
   }
   //----- asig8
   function NM_export_asig8()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig8))
         {
             $this->asig8 = sc_convert_encoding($this->asig8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig8 =\"" . $this->trata_dados($this->asig8) . "\"";
   }
   //----- asig9
   function NM_export_asig9()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig9))
         {
             $this->asig9 = sc_convert_encoding($this->asig9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig9 =\"" . $this->trata_dados($this->asig9) . "\"";
   }
   //----- asig10
   function NM_export_asig10()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig10))
         {
             $this->asig10 = sc_convert_encoding($this->asig10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig10 =\"" . $this->trata_dados($this->asig10) . "\"";
   }
   //----- asig11
   function NM_export_asig11()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig11))
         {
             $this->asig11 = sc_convert_encoding($this->asig11, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig11 =\"" . $this->trata_dados($this->asig11) . "\"";
   }
   //----- asig12
   function NM_export_asig12()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig12))
         {
             $this->asig12 = sc_convert_encoding($this->asig12, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig12 =\"" . $this->trata_dados($this->asig12) . "\"";
   }
   //----- asig13
   function NM_export_asig13()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig13))
         {
             $this->asig13 = sc_convert_encoding($this->asig13, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig13 =\"" . $this->trata_dados($this->asig13) . "\"";
   }
   //----- asig14
   function NM_export_asig14()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig14))
         {
             $this->asig14 = sc_convert_encoding($this->asig14, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig14 =\"" . $this->trata_dados($this->asig14) . "\"";
   }
   //----- asig15
   function NM_export_asig15()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig15))
         {
             $this->asig15 = sc_convert_encoding($this->asig15, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig15 =\"" . $this->trata_dados($this->asig15) . "\"";
   }
   //----- asig16
   function NM_export_asig16()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig16))
         {
             $this->asig16 = sc_convert_encoding($this->asig16, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig16 =\"" . $this->trata_dados($this->asig16) . "\"";
   }
   //----- asig17
   function NM_export_asig17()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig17))
         {
             $this->asig17 = sc_convert_encoding($this->asig17, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig17 =\"" . $this->trata_dados($this->asig17) . "\"";
   }
   //----- asig18
   function NM_export_asig18()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig18))
         {
             $this->asig18 = sc_convert_encoding($this->asig18, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig18 =\"" . $this->trata_dados($this->asig18) . "\"";
   }
   //----- asig19
   function NM_export_asig19()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig19))
         {
             $this->asig19 = sc_convert_encoding($this->asig19, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig19 =\"" . $this->trata_dados($this->asig19) . "\"";
   }
   //----- asig20
   function NM_export_asig20()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig20))
         {
             $this->asig20 = sc_convert_encoding($this->asig20, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig20 =\"" . $this->trata_dados($this->asig20) . "\"";
   }
   //----- asig21
   function NM_export_asig21()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig21))
         {
             $this->asig21 = sc_convert_encoding($this->asig21, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig21 =\"" . $this->trata_dados($this->asig21) . "\"";
   }
   //----- asig22
   function NM_export_asig22()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig22))
         {
             $this->asig22 = sc_convert_encoding($this->asig22, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig22 =\"" . $this->trata_dados($this->asig22) . "\"";
   }
   //----- asig23
   function NM_export_asig23()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig23))
         {
             $this->asig23 = sc_convert_encoding($this->asig23, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig23 =\"" . $this->trata_dados($this->asig23) . "\"";
   }
   //----- asig24
   function NM_export_asig24()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig24))
         {
             $this->asig24 = sc_convert_encoding($this->asig24, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig24 =\"" . $this->trata_dados($this->asig24) . "\"";
   }
   //----- asig25
   function NM_export_asig25()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig25))
         {
             $this->asig25 = sc_convert_encoding($this->asig25, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig25 =\"" . $this->trata_dados($this->asig25) . "\"";
   }
   //----- asig26
   function NM_export_asig26()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig26))
         {
             $this->asig26 = sc_convert_encoding($this->asig26, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig26 =\"" . $this->trata_dados($this->asig26) . "\"";
   }
   //----- asig27
   function NM_export_asig27()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig27))
         {
             $this->asig27 = sc_convert_encoding($this->asig27, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig27 =\"" . $this->trata_dados($this->asig27) . "\"";
   }
   //----- asig28
   function NM_export_asig28()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig28))
         {
             $this->asig28 = sc_convert_encoding($this->asig28, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig28 =\"" . $this->trata_dados($this->asig28) . "\"";
   }
   //----- asig29
   function NM_export_asig29()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig29))
         {
             $this->asig29 = sc_convert_encoding($this->asig29, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig29 =\"" . $this->trata_dados($this->asig29) . "\"";
   }
   //----- asig30
   function NM_export_asig30()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->asig30))
         {
             $this->asig30 = sc_convert_encoding($this->asig30, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " asig30 =\"" . $this->trata_dados($this->asig30) . "\"";
   }
   //----- id_grupo
   function NM_export_id_grupo()
   {
         nmgp_Form_Num_Val($this->id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->id_grupo))
         {
             $this->id_grupo = sc_convert_encoding($this->id_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_grupo =\"" . $this->trata_dados($this->id_grupo) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_grupos_area'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE> <?php echo $_SESSION['par_nombre_institucion'] ?> :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_t_evaluacion_grupos_area_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_t_evaluacion_grupos_area"> 
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
