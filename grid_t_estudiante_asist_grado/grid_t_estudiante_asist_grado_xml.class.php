<?php

class grid_t_estudiante_asist_grado_xml
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
   function grid_t_estudiante_asist_grado_xml()
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
      $this->Arquivo     .= "_grid_t_estudiante_asist_grado";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_t_estudiante_asist_grado.xml";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
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
         $this->xml_registro = "<grid_t_estudiante_asist_grado";
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
   //----- nombre
   function NM_export_nombre()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre))
         {
             $this->nombre = sc_convert_encoding($this->nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nombre =\"" . $this->trata_dados($this->nombre) . "\"";
   }
   //----- novedades_novedad
   function NM_export_novedades_novedad()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->novedades_novedad))
         {
             $this->novedades_novedad = sc_convert_encoding($this->novedades_novedad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " novedades_novedad =\"" . $this->trata_dados($this->novedades_novedad) . "\"";
   }
   //----- col1
   function NM_export_col1()
   {
         nmgp_Form_Num_Val($this->col1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col1))
         {
             $this->col1 = sc_convert_encoding($this->col1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col1 =\"" . $this->trata_dados($this->col1) . "\"";
   }
   //----- col2
   function NM_export_col2()
   {
         nmgp_Form_Num_Val($this->col2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col2))
         {
             $this->col2 = sc_convert_encoding($this->col2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col2 =\"" . $this->trata_dados($this->col2) . "\"";
   }
   //----- col3
   function NM_export_col3()
   {
         nmgp_Form_Num_Val($this->col3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col3))
         {
             $this->col3 = sc_convert_encoding($this->col3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col3 =\"" . $this->trata_dados($this->col3) . "\"";
   }
   //----- col4
   function NM_export_col4()
   {
         nmgp_Form_Num_Val($this->col4, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col4))
         {
             $this->col4 = sc_convert_encoding($this->col4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col4 =\"" . $this->trata_dados($this->col4) . "\"";
   }
   //----- col5
   function NM_export_col5()
   {
         nmgp_Form_Num_Val($this->col5, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col5))
         {
             $this->col5 = sc_convert_encoding($this->col5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col5 =\"" . $this->trata_dados($this->col5) . "\"";
   }
   //----- col6
   function NM_export_col6()
   {
         nmgp_Form_Num_Val($this->col6, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col6))
         {
             $this->col6 = sc_convert_encoding($this->col6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col6 =\"" . $this->trata_dados($this->col6) . "\"";
   }
   //----- col7
   function NM_export_col7()
   {
         nmgp_Form_Num_Val($this->col7, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col7))
         {
             $this->col7 = sc_convert_encoding($this->col7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col7 =\"" . $this->trata_dados($this->col7) . "\"";
   }
   //----- col8
   function NM_export_col8()
   {
         nmgp_Form_Num_Val($this->col8, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col8))
         {
             $this->col8 = sc_convert_encoding($this->col8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col8 =\"" . $this->trata_dados($this->col8) . "\"";
   }
   //----- col9
   function NM_export_col9()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col9))
         {
             $this->col9 = sc_convert_encoding($this->col9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col9 =\"" . $this->trata_dados($this->col9) . "\"";
   }
   //----- col10
   function NM_export_col10()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col10))
         {
             $this->col10 = sc_convert_encoding($this->col10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col10 =\"" . $this->trata_dados($this->col10) . "\"";
   }
   //----- col11
   function NM_export_col11()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col11))
         {
             $this->col11 = sc_convert_encoding($this->col11, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col11 =\"" . $this->trata_dados($this->col11) . "\"";
   }
   //----- col12
   function NM_export_col12()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col12))
         {
             $this->col12 = sc_convert_encoding($this->col12, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col12 =\"" . $this->trata_dados($this->col12) . "\"";
   }
   //----- col13
   function NM_export_col13()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col13))
         {
             $this->col13 = sc_convert_encoding($this->col13, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col13 =\"" . $this->trata_dados($this->col13) . "\"";
   }
   //----- col14
   function NM_export_col14()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col14))
         {
             $this->col14 = sc_convert_encoding($this->col14, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col14 =\"" . $this->trata_dados($this->col14) . "\"";
   }
   //----- col15
   function NM_export_col15()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col15))
         {
             $this->col15 = sc_convert_encoding($this->col15, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col15 =\"" . $this->trata_dados($this->col15) . "\"";
   }
   //----- col16
   function NM_export_col16()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col16))
         {
             $this->col16 = sc_convert_encoding($this->col16, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col16 =\"" . $this->trata_dados($this->col16) . "\"";
   }
   //----- col17
   function NM_export_col17()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col17))
         {
             $this->col17 = sc_convert_encoding($this->col17, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col17 =\"" . $this->trata_dados($this->col17) . "\"";
   }
   //----- col18
   function NM_export_col18()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col18))
         {
             $this->col18 = sc_convert_encoding($this->col18, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col18 =\"" . $this->trata_dados($this->col18) . "\"";
   }
   //----- col19
   function NM_export_col19()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col19))
         {
             $this->col19 = sc_convert_encoding($this->col19, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col19 =\"" . $this->trata_dados($this->col19) . "\"";
   }
   //----- col20
   function NM_export_col20()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col20))
         {
             $this->col20 = sc_convert_encoding($this->col20, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col20 =\"" . $this->trata_dados($this->col20) . "\"";
   }
   //----- col21
   function NM_export_col21()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col21))
         {
             $this->col21 = sc_convert_encoding($this->col21, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col21 =\"" . $this->trata_dados($this->col21) . "\"";
   }
   //----- col22
   function NM_export_col22()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col22))
         {
             $this->col22 = sc_convert_encoding($this->col22, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col22 =\"" . $this->trata_dados($this->col22) . "\"";
   }
   //----- col23
   function NM_export_col23()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col23))
         {
             $this->col23 = sc_convert_encoding($this->col23, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col23 =\"" . $this->trata_dados($this->col23) . "\"";
   }
   //----- col24
   function NM_export_col24()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col24))
         {
             $this->col24 = sc_convert_encoding($this->col24, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col24 =\"" . $this->trata_dados($this->col24) . "\"";
   }
   //----- col25
   function NM_export_col25()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col25))
         {
             $this->col25 = sc_convert_encoding($this->col25, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col25 =\"" . $this->trata_dados($this->col25) . "\"";
   }
   //----- col26
   function NM_export_col26()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col26))
         {
             $this->col26 = sc_convert_encoding($this->col26, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col26 =\"" . $this->trata_dados($this->col26) . "\"";
   }
   //----- col27
   function NM_export_col27()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col27))
         {
             $this->col27 = sc_convert_encoding($this->col27, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col27 =\"" . $this->trata_dados($this->col27) . "\"";
   }
   //----- col28
   function NM_export_col28()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col28))
         {
             $this->col28 = sc_convert_encoding($this->col28, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col28 =\"" . $this->trata_dados($this->col28) . "\"";
   }
   //----- col29
   function NM_export_col29()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col29))
         {
             $this->col29 = sc_convert_encoding($this->col29, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col29 =\"" . $this->trata_dados($this->col29) . "\"";
   }
   //----- col30
   function NM_export_col30()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col30))
         {
             $this->col30 = sc_convert_encoding($this->col30, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col30 =\"" . $this->trata_dados($this->col30) . "\"";
   }
   //----- col31
   function NM_export_col31()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col31))
         {
             $this->col31 = sc_convert_encoding($this->col31, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col31 =\"" . $this->trata_dados($this->col31) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_estudiante_asist_grado'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -  :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_t_estudiante_asist_grado_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_t_estudiante_asist_grado"> 
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
