<?php

class grid_panel_subgrupos_eval_xml
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
   function grid_panel_subgrupos_eval_xml()
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
      $this->Arquivo     .= "_grid_panel_subgrupos_eval";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_panel_subgrupos_eval.xml";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_panel_subgrupos_eval']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_panel_subgrupos_eval']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_panel_subgrupos_eval']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->sub_grupo_x_asig_x_doce_id_asignatura = $Busca_temp['sub_grupo_x_asig_x_doce_id_asignatura']; 
          $tmp_pos = strpos($this->sub_grupo_x_asig_x_doce_id_asignatura, "##@@");
          if ($tmp_pos !== false)
          {
              $this->sub_grupo_x_asig_x_doce_id_asignatura = substr($this->sub_grupo_x_asig_x_doce_id_asignatura, 0, $tmp_pos);
          }
          $this->sub_grupo_x_asig_x_doce_id_asignatura_2 = $Busca_temp['sub_grupo_x_asig_x_doce_id_asignatura_input_2']; 
          $this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo = $Busca_temp['sub_grupo_x_asig_x_doce_id_docente_sub_grupo']; 
          $tmp_pos = strpos($this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo, "##@@");
          if ($tmp_pos !== false)
          {
              $this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo = substr($this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo, 0, $tmp_pos);
          }
          $this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo_2 = $Busca_temp['sub_grupo_x_asig_x_doce_id_docente_sub_grupo_input_2']; 
          $this->sub_grupo_x_asig_x_doce_intensidad_horaria = $Busca_temp['sub_grupo_x_asig_x_doce_intensidad_horaria']; 
          $tmp_pos = strpos($this->sub_grupo_x_asig_x_doce_intensidad_horaria, "##@@");
          if ($tmp_pos !== false)
          {
              $this->sub_grupo_x_asig_x_doce_intensidad_horaria = substr($this->sub_grupo_x_asig_x_doce_intensidad_horaria, 0, $tmp_pos);
          }
          $this->sub_grupo_x_asig_x_doce_intensidad_horaria_2 = $Busca_temp['sub_grupo_x_asig_x_doce_intensidad_horaria_input_2']; 
          $this->sub_grupo_x_asig_x_doce_peso_asig_fre_area = $Busca_temp['sub_grupo_x_asig_x_doce_peso_asig_fre_area']; 
          $tmp_pos = strpos($this->sub_grupo_x_asig_x_doce_peso_asig_fre_area, "##@@");
          if ($tmp_pos !== false)
          {
              $this->sub_grupo_x_asig_x_doce_peso_asig_fre_area = substr($this->sub_grupo_x_asig_x_doce_peso_asig_fre_area, 0, $tmp_pos);
          }
          $this->sub_grupo_x_asig_x_doce_peso_asig_fre_area_2 = $Busca_temp['sub_grupo_x_asig_x_doce_peso_asig_fre_area_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT t_subgrupos.id_grado as t_subgrupos_id_grado, t_subgrupos.id_subgrupo as t_subgrupos_id_subgrupo, sub_grupo_x_asig_x_doce.id_asignatura as cmp_maior_30_1, sub_grupo_x_asig_x_doce.id_docente_sub_grupo as cmp_maior_30_2, sub_grupo_x_asig_x_doce.intensidad_horaria as cmp_maior_30_3, sub_grupo_x_asig_x_doce.peso_asig_fre_area as cmp_maior_30_4, sub_grupo_x_asig_x_doce.tipo_asig as cmp_maior_30_5, docentes.id_area as docentes_id_area from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT t_subgrupos.id_grado as t_subgrupos_id_grado, t_subgrupos.id_subgrupo as t_subgrupos_id_subgrupo, sub_grupo_x_asig_x_doce.id_asignatura as cmp_maior_30_1, sub_grupo_x_asig_x_doce.id_docente_sub_grupo as cmp_maior_30_2, sub_grupo_x_asig_x_doce.intensidad_horaria as cmp_maior_30_3, sub_grupo_x_asig_x_doce.peso_asig_fre_area as cmp_maior_30_4, sub_grupo_x_asig_x_doce.tipo_asig as cmp_maior_30_5, docentes.id_area as docentes_id_area from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['order_grid'];
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
         $this->xml_registro = "<grid_panel_subgrupos_eval";
         $this->t_subgrupos_id_grado = $rs->fields[0] ;  
         $this->t_subgrupos_id_grado = (string)$this->t_subgrupos_id_grado;
         $this->t_subgrupos_id_subgrupo = $rs->fields[1] ;  
         $this->t_subgrupos_id_subgrupo = (string)$this->t_subgrupos_id_subgrupo;
         $this->sub_grupo_x_asig_x_doce_id_asignatura = $rs->fields[2] ;  
         $this->sub_grupo_x_asig_x_doce_id_asignatura = (string)$this->sub_grupo_x_asig_x_doce_id_asignatura;
         $this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo = $rs->fields[3] ;  
         $this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo = (string)$this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo;
         $this->sub_grupo_x_asig_x_doce_intensidad_horaria = $rs->fields[4] ;  
         $this->sub_grupo_x_asig_x_doce_intensidad_horaria = (string)$this->sub_grupo_x_asig_x_doce_intensidad_horaria;
         $this->sub_grupo_x_asig_x_doce_peso_asig_fre_area = $rs->fields[5] ;  
         $this->sub_grupo_x_asig_x_doce_peso_asig_fre_area = (string)$this->sub_grupo_x_asig_x_doce_peso_asig_fre_area;
         $this->sub_grupo_x_asig_x_doce_tipo_asig = $rs->fields[6] ;  
         $this->docentes_id_area = $rs->fields[7] ;  
         $this->docentes_id_area = (string)$this->docentes_id_area;
         //----- lookup - t_subgrupos_id_grado
         $this->look_t_subgrupos_id_grado = $this->t_subgrupos_id_grado; 
         $this->Lookup->lookup_t_subgrupos_id_grado($this->look_t_subgrupos_id_grado, $this->t_subgrupos_id_grado) ; 
         $this->look_t_subgrupos_id_grado = ($this->look_t_subgrupos_id_grado == "&nbsp;") ? "" : $this->look_t_subgrupos_id_grado; 
         //----- lookup - t_subgrupos_id_subgrupo
         $this->look_t_subgrupos_id_subgrupo = $this->t_subgrupos_id_subgrupo; 
         $this->Lookup->lookup_t_subgrupos_id_subgrupo($this->look_t_subgrupos_id_subgrupo, $this->t_subgrupos_id_subgrupo) ; 
         $this->look_t_subgrupos_id_subgrupo = ($this->look_t_subgrupos_id_subgrupo == "&nbsp;") ? "" : $this->look_t_subgrupos_id_subgrupo; 
         //----- lookup - sub_grupo_x_asig_x_doce_id_asignatura
         $this->look_sub_grupo_x_asig_x_doce_id_asignatura = $this->sub_grupo_x_asig_x_doce_id_asignatura; 
         $this->Lookup->lookup_sub_grupo_x_asig_x_doce_id_asignatura($this->look_sub_grupo_x_asig_x_doce_id_asignatura, $this->sub_grupo_x_asig_x_doce_id_asignatura) ; 
         $this->look_sub_grupo_x_asig_x_doce_id_asignatura = ($this->look_sub_grupo_x_asig_x_doce_id_asignatura == "&nbsp;") ? "" : $this->look_sub_grupo_x_asig_x_doce_id_asignatura; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_panel_subgrupos_eval']['contr_erro'] = 'on';
 

$_SESSION['scriptcase']['grid_panel_subgrupos_eval']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['field_order'] as $Cada_col)
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
   //----- t_subgrupos_id_grado
   function NM_export_t_subgrupos_id_grado()
   {
         nmgp_Form_Num_Val($this->look_t_subgrupos_id_grado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_t_subgrupos_id_grado))
         {
             $this->look_t_subgrupos_id_grado = sc_convert_encoding($this->look_t_subgrupos_id_grado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " t_subgrupos_id_grado =\"" . $this->trata_dados($this->look_t_subgrupos_id_grado) . "\"";
   }
   //----- t_subgrupos_id_subgrupo
   function NM_export_t_subgrupos_id_subgrupo()
   {
         nmgp_Form_Num_Val($this->look_t_subgrupos_id_subgrupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_t_subgrupos_id_subgrupo))
         {
             $this->look_t_subgrupos_id_subgrupo = sc_convert_encoding($this->look_t_subgrupos_id_subgrupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " t_subgrupos_id_subgrupo =\"" . $this->trata_dados($this->look_t_subgrupos_id_subgrupo) . "\"";
   }
   //----- sub_grupo_x_asig_x_doce_id_asignatura
   function NM_export_sub_grupo_x_asig_x_doce_id_asignatura()
   {
         nmgp_Form_Num_Val($this->look_sub_grupo_x_asig_x_doce_id_asignatura, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_sub_grupo_x_asig_x_doce_id_asignatura))
         {
             $this->look_sub_grupo_x_asig_x_doce_id_asignatura = sc_convert_encoding($this->look_sub_grupo_x_asig_x_doce_id_asignatura, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " sub_grupo_x_asig_x_doce_id_asignatura =\"" . $this->trata_dados($this->look_sub_grupo_x_asig_x_doce_id_asignatura) . "\"";
   }
   //----- evaluar_tec
   function NM_export_evaluar_tec()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->evaluar_tec))
         {
             $this->evaluar_tec = sc_convert_encoding($this->evaluar_tec, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " evaluar_tec =\"" . $this->trata_dados($this->evaluar_tec) . "\"";
   }
   //----- sub_grupo_x_asig_x_doce_id_docente_sub_grupo
   function NM_export_sub_grupo_x_asig_x_doce_id_docente_sub_grupo()
   {
         nmgp_Form_Num_Val($this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo))
         {
             $this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo = sc_convert_encoding($this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " sub_grupo_x_asig_x_doce_id_docente_sub_grupo =\"" . $this->trata_dados($this->sub_grupo_x_asig_x_doce_id_docente_sub_grupo) . "\"";
   }
   //----- sub_grupo_x_asig_x_doce_intensidad_horaria
   function NM_export_sub_grupo_x_asig_x_doce_intensidad_horaria()
   {
         nmgp_Form_Num_Val($this->sub_grupo_x_asig_x_doce_intensidad_horaria, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sub_grupo_x_asig_x_doce_intensidad_horaria))
         {
             $this->sub_grupo_x_asig_x_doce_intensidad_horaria = sc_convert_encoding($this->sub_grupo_x_asig_x_doce_intensidad_horaria, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " sub_grupo_x_asig_x_doce_intensidad_horaria =\"" . $this->trata_dados($this->sub_grupo_x_asig_x_doce_intensidad_horaria) . "\"";
   }
   //----- sub_grupo_x_asig_x_doce_peso_asig_fre_area
   function NM_export_sub_grupo_x_asig_x_doce_peso_asig_fre_area()
   {
         nmgp_Form_Num_Val($this->sub_grupo_x_asig_x_doce_peso_asig_fre_area, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sub_grupo_x_asig_x_doce_peso_asig_fre_area))
         {
             $this->sub_grupo_x_asig_x_doce_peso_asig_fre_area = sc_convert_encoding($this->sub_grupo_x_asig_x_doce_peso_asig_fre_area, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " sub_grupo_x_asig_x_doce_peso_asig_fre_area =\"" . $this->trata_dados($this->sub_grupo_x_asig_x_doce_peso_asig_fre_area) . "\"";
   }
   //----- sub_grupo_x_asig_x_doce_tipo_asig
   function NM_export_sub_grupo_x_asig_x_doce_tipo_asig()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->sub_grupo_x_asig_x_doce_tipo_asig))
         {
             $this->sub_grupo_x_asig_x_doce_tipo_asig = sc_convert_encoding($this->sub_grupo_x_asig_x_doce_tipo_asig, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " sub_grupo_x_asig_x_doce_tipo_asig =\"" . $this->trata_dados($this->sub_grupo_x_asig_x_doce_tipo_asig) . "\"";
   }
   //----- docentes_id_area
   function NM_export_docentes_id_area()
   {
         nmgp_Form_Num_Val($this->docentes_id_area, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->docentes_id_area))
         {
             $this->docentes_id_area = sc_convert_encoding($this->docentes_id_area, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " docentes_id_area =\"" . $this->trata_dados($this->docentes_id_area) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_panel_subgrupos_eval'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="grid_panel_subgrupos_eval_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_panel_subgrupos_eval"> 
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
