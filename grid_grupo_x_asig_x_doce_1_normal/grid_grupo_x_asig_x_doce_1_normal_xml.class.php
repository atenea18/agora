<?php

class grid_grupo_x_asig_x_doce_1_normal_xml
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
   function grid_grupo_x_asig_x_doce_1_normal_xml()
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
      $this->Arquivo     .= "_grid_grupo_x_asig_x_doce_1_normal";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_grupo_x_asig_x_doce_1_normal.xml";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
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
         $this->xml_registro = "<grid_grupo_x_asig_x_doce_1_normal";
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
   //----- nom_estudiante
   function NM_export_nom_estudiante()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nom_estudiante))
         {
             $this->nom_estudiante = sc_convert_encoding($this->nom_estudiante, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nom_estudiante =\"" . $this->trata_dados($this->nom_estudiante) . "\"";
   }
   //----- novedades_x_estudiante_fecha_id_novedad
   function NM_export_novedades_x_estudiante_fecha_id_novedad()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_novedades_x_estudiante_fecha_id_novedad))
         {
             $this->look_novedades_x_estudiante_fecha_id_novedad = sc_convert_encoding($this->look_novedades_x_estudiante_fecha_id_novedad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " novedades_x_estudiante_fecha_id_novedad =\"" . $this->trata_dados($this->look_novedades_x_estudiante_fecha_id_novedad) . "\"";
   }
   //----- fa
   function NM_export_fa()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fa))
         {
             $this->fa = sc_convert_encoding($this->fa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " fa =\"" . $this->trata_dados($this->fa) . "\"";
   }
   //----- re
   function NM_export_re()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->re))
         {
             $this->re = sc_convert_encoding($this->re, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " re =\"" . $this->trata_dados($this->re) . "\"";
   }
   //----- p1
   function NM_export_p1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->p1))
         {
             $this->p1 = sc_convert_encoding($this->p1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " p1 =\"" . $this->trata_dados($this->p1) . "\"";
   }
   //----- p2
   function NM_export_p2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->p2))
         {
             $this->p2 = sc_convert_encoding($this->p2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " p2 =\"" . $this->trata_dados($this->p2) . "\"";
   }
   //----- p3
   function NM_export_p3()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->p3))
         {
             $this->p3 = sc_convert_encoding($this->p3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " p3 =\"" . $this->trata_dados($this->p3) . "\"";
   }
   //----- p4
   function NM_export_p4()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->p4))
         {
             $this->p4 = sc_convert_encoding($this->p4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " p4 =\"" . $this->trata_dados($this->p4) . "\"";
   }
   //----- vac
   function NM_export_vac()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->vac))
         {
             $this->vac = sc_convert_encoding($this->vac, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " vac =\"" . $this->trata_dados($this->vac) . "\"";
   }
   //----- vra
   function NM_export_vra()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->vra))
         {
             $this->vra = sc_convert_encoding($this->vra, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " vra =\"" . $this->trata_dados($this->vra) . "\"";
   }
   //----- col1
   function NM_export_col1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col1))
         {
             $this->col1 = sc_convert_encoding($this->col1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col1 =\"" . $this->trata_dados($this->col1) . "\"";
   }
   //----- col2
   function NM_export_col2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col2))
         {
             $this->col2 = sc_convert_encoding($this->col2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col2 =\"" . $this->trata_dados($this->col2) . "\"";
   }
   //----- col3
   function NM_export_col3()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col3))
         {
             $this->col3 = sc_convert_encoding($this->col3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col3 =\"" . $this->trata_dados($this->col3) . "\"";
   }
   //----- col4
   function NM_export_col4()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col4))
         {
             $this->col4 = sc_convert_encoding($this->col4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col4 =\"" . $this->trata_dados($this->col4) . "\"";
   }
   //----- col5
   function NM_export_col5()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->col5))
         {
             $this->col5 = sc_convert_encoding($this->col5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " col5 =\"" . $this->trata_dados($this->col5) . "\"";
   }
   //----- par
   function NM_export_par()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->par))
         {
             $this->par = sc_convert_encoding($this->par, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " par =\"" . $this->trata_dados($this->par) . "\"";
   }
   //----- app
   function NM_export_app()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->app))
         {
             $this->app = sc_convert_encoding($this->app, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " app =\"" . $this->trata_dados($this->app) . "\"";
   }
   //----- prp
   function NM_export_prp()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->prp))
         {
             $this->prp = sc_convert_encoding($this->prp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " prp =\"" . $this->trata_dados($this->prp) . "\"";
   }
   //----- ren
   function NM_export_ren()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ren))
         {
             $this->ren = sc_convert_encoding($this->ren, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ren =\"" . $this->trata_dados($this->ren) . "\"";
   }
   //----- ptc
   function NM_export_ptc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ptc))
         {
             $this->ptc = sc_convert_encoding($this->ptc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ptc =\"" . $this->trata_dados($this->ptc) . "\"";
   }
   //----- red
   function NM_export_red()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->red))
         {
             $this->red = sc_convert_encoding($this->red, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " red =\"" . $this->trata_dados($this->red) . "\"";
   }
   //----- lid
   function NM_export_lid()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->lid))
         {
             $this->lid = sc_convert_encoding($this->lid, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " lid =\"" . $this->trata_dados($this->lid) . "\"";
   }
   //----- pel
   function NM_export_pel()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->pel))
         {
             $this->pel = sc_convert_encoding($this->pel, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " pel =\"" . $this->trata_dados($this->pel) . "\"";
   }
   //----- com
   function NM_export_com()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->com))
         {
             $this->com = sc_convert_encoding($this->com, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " com =\"" . $this->trata_dados($this->com) . "\"";
   }
   //----- coc
   function NM_export_coc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->coc))
         {
             $this->coc = sc_convert_encoding($this->coc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " coc =\"" . $this->trata_dados($this->coc) . "\"";
   }
   //----- aee
   function NM_export_aee()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->aee))
         {
             $this->aee = sc_convert_encoding($this->aee, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " aee =\"" . $this->trata_dados($this->aee) . "\"";
   }
   //----- val
   function NM_export_val()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->val))
         {
             $this->val = sc_convert_encoding($this->val, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " val =\"" . $this->trata_dados($this->val) . "\"";
   }
   //----- t_estudiante_grupo_idstudent
   function NM_export_t_estudiante_grupo_idstudent()
   {
         nmgp_Form_Num_Val($this->look_t_estudiante_grupo_idstudent, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_t_estudiante_grupo_idstudent))
         {
             $this->look_t_estudiante_grupo_idstudent = sc_convert_encoding($this->look_t_estudiante_grupo_idstudent, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " t_estudiante_grupo_idstudent =\"" . $this->trata_dados($this->look_t_estudiante_grupo_idstudent) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_1_normal'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="grid_grupo_x_asig_x_doce_1_normal_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_grupo_x_asig_x_doce_1_normal"> 
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
