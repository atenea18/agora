<?php

class grid_estu_boletines_rtf
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
   function grid_estu_boletines_rtf()
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
      $this->Arquivo   .= "_grid_estu_boletines";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_estu_boletines.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_estu_boletines']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_estu_boletines']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_estu_boletines']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->students_idstudents = $Busca_temp['students_idstudents']; 
          $tmp_pos = strpos($this->students_idstudents, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_idstudents = substr($this->students_idstudents, 0, $tmp_pos);
          }
          $this->students_idstudents_2 = $Busca_temp['students_idstudents_input_2']; 
          $this->students_id_sede = $Busca_temp['students_id_sede']; 
          $tmp_pos = strpos($this->students_id_sede, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_id_sede = substr($this->students_id_sede, 0, $tmp_pos);
          }
          $this->students_id_jornada = $Busca_temp['students_id_jornada']; 
          $tmp_pos = strpos($this->students_id_jornada, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_id_jornada = substr($this->students_id_jornada, 0, $tmp_pos);
          }
          $this->students_id_jornada_2 = $Busca_temp['students_id_jornada_input_2']; 
          $this->students_numero_documento = $Busca_temp['students_numero_documento']; 
          $tmp_pos = strpos($this->students_numero_documento, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_numero_documento = substr($this->students_numero_documento, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT students.idstudents as students_idstudents, students.id_sede as students_id_sede, students.id_jornada as students_id_jornada, students.numero_documento as students_numero_documento, students.primer_nombre as students_primer_nombre, students.segundo_nombre as students_segundo_nombre, students.grado_igreso as students_grado_igreso, students.id_grupo as students_id_grupo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT students.idstudents as students_idstudents, students.id_sede as students_id_sede, students.id_jornada as students_id_jornada, students.numero_documento as students_numero_documento, students.primer_nombre as students_primer_nombre, students.segundo_nombre as students_segundo_nombre, students.grado_igreso as students_grado_igreso, students.id_grupo as students_id_grupo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['students_idstudents'])) ? $this->New_label['students_idstudents'] : "Estudiante"; 
          if ($Cada_col == "students_idstudents" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_id_sede'])) ? $this->New_label['students_id_sede'] : "Sede"; 
          if ($Cada_col == "students_id_sede" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_id_jornada'])) ? $this->New_label['students_id_jornada'] : "Id Jornada"; 
          if ($Cada_col == "students_id_jornada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_numero_documento'])) ? $this->New_label['students_numero_documento'] : "Numero Documento"; 
          if ($Cada_col == "students_numero_documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_primer_nombre'])) ? $this->New_label['students_primer_nombre'] : "Primer Nombre"; 
          if ($Cada_col == "students_primer_nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_segundo_nombre'])) ? $this->New_label['students_segundo_nombre'] : "Segundo Nombre"; 
          if ($Cada_col == "students_segundo_nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->students_idstudents = $rs->fields[0] ;  
         $this->students_idstudents = (string)$this->students_idstudents;
         $this->students_id_sede = $rs->fields[1] ;  
         $this->students_id_jornada = $rs->fields[2] ;  
         $this->students_id_jornada = (string)$this->students_id_jornada;
         $this->students_numero_documento = $rs->fields[3] ;  
         $this->students_primer_nombre = $rs->fields[4] ;  
         $this->students_segundo_nombre = $rs->fields[5] ;  
         $this->students_grado_igreso = $rs->fields[6] ;  
         $this->students_grado_igreso = (string)$this->students_grado_igreso;
         $this->students_id_grupo = $rs->fields[7] ;  
         $this->students_id_grupo = (string)$this->students_id_grupo;
         //----- lookup - students_idstudents
         $this->look_students_idstudents = $this->students_idstudents; 
         $this->Lookup->lookup_students_idstudents($this->look_students_idstudents) ; 
         $this->look_students_idstudents = ($this->look_students_idstudents == "&nbsp;") ? "" : $this->look_students_idstudents; 
         //----- lookup - students_id_sede
         $this->look_students_id_sede = $this->students_id_sede; 
         $this->Lookup->lookup_students_id_sede($this->look_students_id_sede, $this->students_id_sede) ; 
         $this->look_students_id_sede = ($this->look_students_id_sede == "&nbsp;") ? "" : $this->look_students_id_sede; 
         //----- lookup - students_id_jornada
         $this->look_students_id_jornada = $this->students_id_jornada; 
         $this->Lookup->lookup_students_id_jornada($this->look_students_id_jornada, $this->students_id_jornada) ; 
         $this->look_students_id_jornada = ($this->look_students_id_jornada == "&nbsp;") ? "" : $this->look_students_id_jornada; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['field_order'] as $Cada_col)
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
   //----- students_idstudents
   function NM_export_students_idstudents()
   {
         nmgp_Form_Num_Val($this->look_students_idstudents, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_students_idstudents))
         {
             $this->look_students_idstudents = sc_convert_encoding($this->look_students_idstudents, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_students_idstudents = str_replace('<', '&lt;', $this->look_students_idstudents);
         $this->look_students_idstudents = str_replace('>', '&gt;', $this->look_students_idstudents);
         $this->Texto_tag .= "<td>" . $this->look_students_idstudents . "</td>\r\n";
   }
   //----- students_id_sede
   function NM_export_students_id_sede()
   {
         $this->look_students_id_sede = html_entity_decode($this->look_students_id_sede, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_students_id_sede = strip_tags($this->look_students_id_sede);
         if (!NM_is_utf8($this->look_students_id_sede))
         {
             $this->look_students_id_sede = sc_convert_encoding($this->look_students_id_sede, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_students_id_sede = str_replace('<', '&lt;', $this->look_students_id_sede);
         $this->look_students_id_sede = str_replace('>', '&gt;', $this->look_students_id_sede);
         $this->Texto_tag .= "<td>" . $this->look_students_id_sede . "</td>\r\n";
   }
   //----- students_id_jornada
   function NM_export_students_id_jornada()
   {
         nmgp_Form_Num_Val($this->look_students_id_jornada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_students_id_jornada))
         {
             $this->look_students_id_jornada = sc_convert_encoding($this->look_students_id_jornada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_students_id_jornada = str_replace('<', '&lt;', $this->look_students_id_jornada);
         $this->look_students_id_jornada = str_replace('>', '&gt;', $this->look_students_id_jornada);
         $this->Texto_tag .= "<td>" . $this->look_students_id_jornada . "</td>\r\n";
   }
   //----- students_numero_documento
   function NM_export_students_numero_documento()
   {
         $this->students_numero_documento = html_entity_decode($this->students_numero_documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_numero_documento = strip_tags($this->students_numero_documento);
         if (!NM_is_utf8($this->students_numero_documento))
         {
             $this->students_numero_documento = sc_convert_encoding($this->students_numero_documento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_numero_documento = str_replace('<', '&lt;', $this->students_numero_documento);
         $this->students_numero_documento = str_replace('>', '&gt;', $this->students_numero_documento);
         $this->Texto_tag .= "<td>" . $this->students_numero_documento . "</td>\r\n";
   }
   //----- students_primer_nombre
   function NM_export_students_primer_nombre()
   {
         $this->students_primer_nombre = html_entity_decode($this->students_primer_nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_primer_nombre = strip_tags($this->students_primer_nombre);
         if (!NM_is_utf8($this->students_primer_nombre))
         {
             $this->students_primer_nombre = sc_convert_encoding($this->students_primer_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_primer_nombre = str_replace('<', '&lt;', $this->students_primer_nombre);
         $this->students_primer_nombre = str_replace('>', '&gt;', $this->students_primer_nombre);
         $this->Texto_tag .= "<td>" . $this->students_primer_nombre . "</td>\r\n";
   }
   //----- students_segundo_nombre
   function NM_export_students_segundo_nombre()
   {
         $this->students_segundo_nombre = html_entity_decode($this->students_segundo_nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_segundo_nombre = strip_tags($this->students_segundo_nombre);
         if (!NM_is_utf8($this->students_segundo_nombre))
         {
             $this->students_segundo_nombre = sc_convert_encoding($this->students_segundo_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_segundo_nombre = str_replace('<', '&lt;', $this->students_segundo_nombre);
         $this->students_segundo_nombre = str_replace('>', '&gt;', $this->students_segundo_nombre);
         $this->Texto_tag .= "<td>" . $this->students_segundo_nombre . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estu_boletines'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE> <?php echo $_SESSION['par_nombre_institucion'] ?> :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_estu_boletines_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_estu_boletines"> 
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
