<?php

class grid_parametros_evaluacion_rtf
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
   function grid_parametros_evaluacion_rtf()
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
      $this->Arquivo   .= "_grid_parametros_evaluacion";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_parametros_evaluacion.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_parametros_evaluacion']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_parametros_evaluacion']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_parametros_evaluacion']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->porcentaje_grupo1 = $Busca_temp['porcentaje_grupo1']; 
          $tmp_pos = strpos($this->porcentaje_grupo1, "##@@");
          if ($tmp_pos !== false)
          {
              $this->porcentaje_grupo1 = substr($this->porcentaje_grupo1, 0, $tmp_pos);
          }
          $this->porcentaje_grupo1_2 = $Busca_temp['porcentaje_grupo1_input_2']; 
          $this->id_modelo_eval = $Busca_temp['id_modelo_eval']; 
          $tmp_pos = strpos($this->id_modelo_eval, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_modelo_eval = substr($this->id_modelo_eval, 0, $tmp_pos);
          }
          $this->id_modelo_eval_2 = $Busca_temp['id_modelo_eval_input_2']; 
          $this->etiqueta_grupo_1 = $Busca_temp['etiqueta_grupo_1']; 
          $tmp_pos = strpos($this->etiqueta_grupo_1, "##@@");
          if ($tmp_pos !== false)
          {
              $this->etiqueta_grupo_1 = substr($this->etiqueta_grupo_1, 0, $tmp_pos);
          }
          $this->num_columnas_grupo1 = $Busca_temp['num_columnas_grupo1']; 
          $tmp_pos = strpos($this->num_columnas_grupo1, "##@@");
          if ($tmp_pos !== false)
          {
              $this->num_columnas_grupo1 = substr($this->num_columnas_grupo1, 0, $tmp_pos);
          }
          $this->num_columnas_grupo1_2 = $Busca_temp['num_columnas_grupo1_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_modelo_eval, etiqueta_grupo_1, num_columnas_grupo1, porcentaje_grupo1, etiqueta_grupo_2, num_columnas_grupo2 from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_modelo_eval, etiqueta_grupo_1, num_columnas_grupo1, porcentaje_grupo1, etiqueta_grupo_2, num_columnas_grupo2 from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['id_modelo_eval'])) ? $this->New_label['id_modelo_eval'] : "Id Modelo Eval"; 
          if ($Cada_col == "id_modelo_eval" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['etiqueta_grupo_1'])) ? $this->New_label['etiqueta_grupo_1'] : "Etiqueta Grupo 1"; 
          if ($Cada_col == "etiqueta_grupo_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['num_columnas_grupo1'])) ? $this->New_label['num_columnas_grupo1'] : "Num Columnas Grupo 1"; 
          if ($Cada_col == "num_columnas_grupo1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porcentaje_grupo1'])) ? $this->New_label['porcentaje_grupo1'] : "Porcentaje Grupo 1"; 
          if ($Cada_col == "porcentaje_grupo1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['etiqueta_grupo_2'])) ? $this->New_label['etiqueta_grupo_2'] : "Etiqueta Grupo 2"; 
          if ($Cada_col == "etiqueta_grupo_2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['num_columnas_grupo2'])) ? $this->New_label['num_columnas_grupo2'] : "Num Columnas Grupo 2"; 
          if ($Cada_col == "num_columnas_grupo2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->id_modelo_eval = $rs->fields[0] ;  
         $this->id_modelo_eval = (string)$this->id_modelo_eval;
         $this->etiqueta_grupo_1 = $rs->fields[1] ;  
         $this->num_columnas_grupo1 = $rs->fields[2] ;  
         $this->num_columnas_grupo1 = (string)$this->num_columnas_grupo1;
         $this->porcentaje_grupo1 = $rs->fields[3] ;  
         $this->porcentaje_grupo1 = (string)$this->porcentaje_grupo1;
         $this->etiqueta_grupo_2 = $rs->fields[4] ;  
         $this->num_columnas_grupo2 = $rs->fields[5] ;  
         $this->num_columnas_grupo2 = (string)$this->num_columnas_grupo2;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['field_order'] as $Cada_col)
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
   //----- id_modelo_eval
   function NM_export_id_modelo_eval()
   {
         nmgp_Form_Num_Val($this->id_modelo_eval, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_modelo_eval))
         {
             $this->id_modelo_eval = sc_convert_encoding($this->id_modelo_eval, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_modelo_eval = str_replace('<', '&lt;', $this->id_modelo_eval);
         $this->id_modelo_eval = str_replace('>', '&gt;', $this->id_modelo_eval);
         $this->Texto_tag .= "<td>" . $this->id_modelo_eval . "</td>\r\n";
   }
   //----- etiqueta_grupo_1
   function NM_export_etiqueta_grupo_1()
   {
         $this->etiqueta_grupo_1 = html_entity_decode($this->etiqueta_grupo_1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->etiqueta_grupo_1 = strip_tags($this->etiqueta_grupo_1);
         if (!NM_is_utf8($this->etiqueta_grupo_1))
         {
             $this->etiqueta_grupo_1 = sc_convert_encoding($this->etiqueta_grupo_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->etiqueta_grupo_1 = str_replace('<', '&lt;', $this->etiqueta_grupo_1);
         $this->etiqueta_grupo_1 = str_replace('>', '&gt;', $this->etiqueta_grupo_1);
         $this->Texto_tag .= "<td>" . $this->etiqueta_grupo_1 . "</td>\r\n";
   }
   //----- num_columnas_grupo1
   function NM_export_num_columnas_grupo1()
   {
         nmgp_Form_Num_Val($this->num_columnas_grupo1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->num_columnas_grupo1))
         {
             $this->num_columnas_grupo1 = sc_convert_encoding($this->num_columnas_grupo1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->num_columnas_grupo1 = str_replace('<', '&lt;', $this->num_columnas_grupo1);
         $this->num_columnas_grupo1 = str_replace('>', '&gt;', $this->num_columnas_grupo1);
         $this->Texto_tag .= "<td>" . $this->num_columnas_grupo1 . "</td>\r\n";
   }
   //----- porcentaje_grupo1
   function NM_export_porcentaje_grupo1()
   {
         nmgp_Form_Num_Val($this->porcentaje_grupo1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->porcentaje_grupo1))
         {
             $this->porcentaje_grupo1 = sc_convert_encoding($this->porcentaje_grupo1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->porcentaje_grupo1 = str_replace('<', '&lt;', $this->porcentaje_grupo1);
         $this->porcentaje_grupo1 = str_replace('>', '&gt;', $this->porcentaje_grupo1);
         $this->Texto_tag .= "<td>" . $this->porcentaje_grupo1 . "</td>\r\n";
   }
   //----- etiqueta_grupo_2
   function NM_export_etiqueta_grupo_2()
   {
         $this->etiqueta_grupo_2 = html_entity_decode($this->etiqueta_grupo_2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->etiqueta_grupo_2 = strip_tags($this->etiqueta_grupo_2);
         if (!NM_is_utf8($this->etiqueta_grupo_2))
         {
             $this->etiqueta_grupo_2 = sc_convert_encoding($this->etiqueta_grupo_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->etiqueta_grupo_2 = str_replace('<', '&lt;', $this->etiqueta_grupo_2);
         $this->etiqueta_grupo_2 = str_replace('>', '&gt;', $this->etiqueta_grupo_2);
         $this->Texto_tag .= "<td>" . $this->etiqueta_grupo_2 . "</td>\r\n";
   }
   //----- num_columnas_grupo2
   function NM_export_num_columnas_grupo2()
   {
         nmgp_Form_Num_Val($this->num_columnas_grupo2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->num_columnas_grupo2))
         {
             $this->num_columnas_grupo2 = sc_convert_encoding($this->num_columnas_grupo2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->num_columnas_grupo2 = str_replace('<', '&lt;', $this->num_columnas_grupo2);
         $this->num_columnas_grupo2 = str_replace('>', '&gt;', $this->num_columnas_grupo2);
         $this->Texto_tag .= "<td>" . $this->num_columnas_grupo2 . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_parametros_evaluacion'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - parametros_evaluacion :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_parametros_evaluacion_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_parametros_evaluacion"> 
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
