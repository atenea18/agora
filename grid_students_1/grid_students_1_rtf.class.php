<?php

class grid_students_1_rtf
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
   function grid_students_1_rtf()
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
      $this->Arquivo   .= "_grid_students_1";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_students_1.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['campos_busca'];
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
      $this->Sub_Consultas[] = "areas";
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT students.idstudents as students_idstudents, students.id_sede as students_id_sede, students.id_grupo as students_id_grupo, students.id_jornada as students_id_jornada, students.grado_igreso as students_grado_igreso from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT students.idstudents as students_idstudents, students.id_sede as students_id_sede, students.id_grupo as students_id_grupo, students.id_jornada as students_id_jornada, students.grado_igreso as students_grado_igreso from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['students_idstudents'])) ? $this->New_label['students_idstudents'] : ""; 
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
          $SC_Label = (isset($this->New_label['dias_inasiste'])) ? $this->New_label['dias_inasiste'] : "dias_inasiste"; 
          if ($Cada_col == "dias_inasiste" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['obs'])) ? $this->New_label['obs'] : "obs"; 
          if ($Cada_col == "obs" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['linea_1'])) ? $this->New_label['linea_1'] : "linea_1"; 
          if ($Cada_col == "linea_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['linea_2'])) ? $this->New_label['linea_2'] : "linea_2"; 
          if ($Cada_col == "linea_2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dir_grupo'])) ? $this->New_label['dir_grupo'] : "dir_grupo"; 
          if ($Cada_col == "dir_grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['titulo'])) ? $this->New_label['titulo'] : ""; 
          if ($Cada_col == "titulo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->students_id_grupo = $rs->fields[2] ;  
         $this->students_id_grupo = (string)$this->students_id_grupo;
         $this->students_id_jornada = $rs->fields[3] ;  
         $this->students_id_jornada = (string)$this->students_id_jornada;
         $this->students_grado_igreso = $rs->fields[4] ;  
         $this->students_grado_igreso = (string)$this->students_grado_igreso;
         //----- lookup - students_idstudents
         $this->look_students_idstudents = $this->students_idstudents; 
         $this->Lookup->lookup_students_idstudents($this->look_students_idstudents) ; 
         $this->look_students_idstudents = ($this->look_students_idstudents == "&nbsp;") ? "" : $this->look_students_idstudents; 
         $this->sc_proc_grid = true; 
         //----- lookup - dir_grupo
         $this->Lookup->lookup_dir_grupo($this->dir_grupo, $this->students_idstudents, $this->array_dir_grupo); 
         $this->dir_grupo = str_replace("<br>", " ", $this->dir_grupo); 
         $this->dir_grupo = ($this->dir_grupo == "&nbsp;") ? "" : $this->dir_grupo; 
         $_SESSION['scriptcase']['grid_students_1']['contr_erro'] = 'on';
if (!isset($_SESSION['par_inasist'])) {$_SESSION['par_inasist'] = "";}
if (!isset($this->sc_temp_par_inasist)) {$this->sc_temp_par_inasist = (isset($_SESSION['par_inasist'])) ? $_SESSION['par_inasist'] : "";}
 


$this->dias_inasiste = "Inasistencias acumuladas del Período: ".$this->sc_temp_par_inasist;
$this->obs ="Observaciones Generales";
$this->linea_1 ="<hr>";
$this->linea_2 ="<hr>";
$linea_3 ="<hr>";
$linea_4 ="<hr>";
$linea_5 ="<hr>";
$this->titulo  = "Director de Grupo";

if($this->sc_temp_par_inasist== 0){
$this->NM_cmp_hidden["dias_inasiste"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['php_cmp_sel']["dias_inasiste"] = "off"; }
}
if (isset($this->sc_temp_par_inasist)) {$_SESSION['par_inasist'] = $this->sc_temp_par_inasist;}
$_SESSION['scriptcase']['grid_students_1']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['field_order'] as $Cada_col)
         { 
            if ((!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off") && !in_array($Cada_col, $this->Sub_Consultas))
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
   //----- dias_inasiste
   function NM_export_dias_inasiste()
   {
         $this->dias_inasiste = html_entity_decode($this->dias_inasiste, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dias_inasiste = strip_tags($this->dias_inasiste);
         if (!NM_is_utf8($this->dias_inasiste))
         {
             $this->dias_inasiste = sc_convert_encoding($this->dias_inasiste, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dias_inasiste = str_replace('<', '&lt;', $this->dias_inasiste);
         $this->dias_inasiste = str_replace('>', '&gt;', $this->dias_inasiste);
         $this->Texto_tag .= "<td>" . $this->dias_inasiste . "</td>\r\n";
   }
   //----- obs
   function NM_export_obs()
   {
         $this->obs = html_entity_decode($this->obs, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->obs = strip_tags($this->obs);
         if (!NM_is_utf8($this->obs))
         {
             $this->obs = sc_convert_encoding($this->obs, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->obs = str_replace('<', '&lt;', $this->obs);
         $this->obs = str_replace('>', '&gt;', $this->obs);
         $this->Texto_tag .= "<td>" . $this->obs . "</td>\r\n";
   }
   //----- linea_1
   function NM_export_linea_1()
   {
         $this->linea_1 = html_entity_decode($this->linea_1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->linea_1 = strip_tags($this->linea_1);
         if (!NM_is_utf8($this->linea_1))
         {
             $this->linea_1 = sc_convert_encoding($this->linea_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->linea_1 = str_replace('<', '&lt;', $this->linea_1);
         $this->linea_1 = str_replace('>', '&gt;', $this->linea_1);
         $this->Texto_tag .= "<td>" . $this->linea_1 . "</td>\r\n";
   }
   //----- linea_2
   function NM_export_linea_2()
   {
         $this->linea_2 = html_entity_decode($this->linea_2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->linea_2 = strip_tags($this->linea_2);
         if (!NM_is_utf8($this->linea_2))
         {
             $this->linea_2 = sc_convert_encoding($this->linea_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->linea_2 = str_replace('<', '&lt;', $this->linea_2);
         $this->linea_2 = str_replace('>', '&gt;', $this->linea_2);
         $this->Texto_tag .= "<td>" . $this->linea_2 . "</td>\r\n";
   }
   //----- dir_grupo
   function NM_export_dir_grupo()
   {
         if (!NM_is_utf8($this->dir_grupo))
         {
             $this->dir_grupo = sc_convert_encoding($this->dir_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dir_grupo = str_replace('<', '&lt;', $this->dir_grupo);
         $this->dir_grupo = str_replace('>', '&gt;', $this->dir_grupo);
         $this->Texto_tag .= "<td>" . $this->dir_grupo . "</td>\r\n";
   }
   //----- titulo
   function NM_export_titulo()
   {
         $this->titulo = html_entity_decode($this->titulo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->titulo = strip_tags($this->titulo);
         if (!NM_is_utf8($this->titulo))
         {
             $this->titulo = sc_convert_encoding($this->titulo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->titulo = str_replace('<', '&lt;', $this->titulo);
         $this->titulo = str_replace('>', '&gt;', $this->titulo);
         $this->Texto_tag .= "<td>" . $this->titulo . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_students_1'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="grid_students_1_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_students_1"> 
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
