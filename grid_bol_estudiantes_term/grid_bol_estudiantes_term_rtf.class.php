<?php

class grid_bol_estudiantes_term_rtf
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
   function grid_bol_estudiantes_term_rtf()
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
      $this->Arquivo   .= "_grid_bol_estudiantes_term";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_bol_estudiantes_term.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->t_evaluacion_primer_apellido = $Busca_temp['t_evaluacion_primer_apellido']; 
          $tmp_pos = strpos($this->t_evaluacion_primer_apellido, "##@@");
          if ($tmp_pos !== false)
          {
              $this->t_evaluacion_primer_apellido = substr($this->t_evaluacion_primer_apellido, 0, $tmp_pos);
          }
          $this->t_evaluacion_segundo_apellido = $Busca_temp['t_evaluacion_segundo_apellido']; 
          $tmp_pos = strpos($this->t_evaluacion_segundo_apellido, "##@@");
          if ($tmp_pos !== false)
          {
              $this->t_evaluacion_segundo_apellido = substr($this->t_evaluacion_segundo_apellido, 0, $tmp_pos);
          }
          $this->t_evaluacion_primer_nombre = $Busca_temp['t_evaluacion_primer_nombre']; 
          $tmp_pos = strpos($this->t_evaluacion_primer_nombre, "##@@");
          if ($tmp_pos !== false)
          {
              $this->t_evaluacion_primer_nombre = substr($this->t_evaluacion_primer_nombre, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->Sub_Consultas[] = "areas";
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT t_grupos.id_director_grupo as t_grupos_id_director_grupo, t_evaluacion.id_estudiante as t_evaluacion_id_estudiante, t_evaluacion.primer_apellido as t_evaluacion_primer_apellido, t_evaluacion.segundo_apellido as t_evaluacion_segundo_apellido, t_evaluacion.primer_nombre as t_evaluacion_primer_nombre, t_evaluacion.segundo_nombre as t_evaluacion_segundo_nombre, t_evaluacion.id_grupo as t_evaluacion_id_grupo, t_grupos.id_sede as t_grupos_id_sede from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT t_grupos.id_director_grupo as t_grupos_id_director_grupo, t_evaluacion.id_estudiante as t_evaluacion_id_estudiante, t_evaluacion.primer_apellido as t_evaluacion_primer_apellido, t_evaluacion.segundo_apellido as t_evaluacion_segundo_apellido, t_evaluacion.primer_nombre as t_evaluacion_primer_nombre, t_evaluacion.segundo_nombre as t_evaluacion_segundo_nombre, t_evaluacion.id_grupo as t_evaluacion_id_grupo, t_grupos.id_sede as t_grupos_id_sede from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_select .= " group by t_evaluacion.id_estudiante"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['field_order'] as $Cada_col)
      { 
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
          $SC_Label = (isset($this->New_label['linea1'])) ? $this->New_label['linea1'] : "linea1"; 
          if ($Cada_col == "linea1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_grupos_id_director_grupo'])) ? $this->New_label['t_grupos_id_director_grupo'] : "Id Director Grupo"; 
          if ($Cada_col == "t_grupos_id_director_grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['titulo'])) ? $this->New_label['titulo'] : "titulo"; 
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
         $this->t_grupos_id_director_grupo = $rs->fields[0] ;  
         $this->t_grupos_id_director_grupo = (string)$this->t_grupos_id_director_grupo;
         $this->t_evaluacion_id_estudiante = $rs->fields[1] ;  
         $this->t_evaluacion_id_estudiante = (string)$this->t_evaluacion_id_estudiante;
         $this->t_evaluacion_primer_apellido = $rs->fields[2] ;  
         $this->t_evaluacion_segundo_apellido = $rs->fields[3] ;  
         $this->t_evaluacion_primer_nombre = $rs->fields[4] ;  
         $this->t_evaluacion_segundo_nombre = $rs->fields[5] ;  
         $this->t_evaluacion_id_grupo = $rs->fields[6] ;  
         $this->t_evaluacion_id_grupo = (string)$this->t_evaluacion_id_grupo;
         $this->t_grupos_id_sede = $rs->fields[7] ;  
         $this->t_grupos_id_sede = (string)$this->t_grupos_id_sede;
         //----- lookup - t_grupos_id_director_grupo
         $this->look_t_grupos_id_director_grupo = $this->t_grupos_id_director_grupo; 
         $this->Lookup->lookup_t_grupos_id_director_grupo($this->look_t_grupos_id_director_grupo, $this->t_grupos_id_director_grupo) ; 
         $this->look_t_grupos_id_director_grupo = ($this->look_t_grupos_id_director_grupo == "&nbsp;") ? "" : $this->look_t_grupos_id_director_grupo; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_bol_estudiantes_term']['contr_erro'] = 'on';
if (!isset($_SESSION['par_inasist'])) {$_SESSION['par_inasist'] = "";}
if (!isset($this->sc_temp_par_inasist)) {$this->sc_temp_par_inasist = (isset($_SESSION['par_inasist'])) ? $_SESSION['par_inasist'] : "";}
 $this->estudiantes =$this->t_evaluacion_primer_apellido .' '.$this->t_evaluacion_segundo_apellido .' '.$this->t_evaluacion_primer_nombre .' '.$this->t_evaluacion_segundo_nombre ;



$this->dias_inasiste = "Inasistencias acumuladas del Período: ".$this->sc_temp_par_inasist;
$this->obs ="Observaciones Generales";
$this->linea1 ="<hr>";
$this->titulo  = "Director de Grupo";

if($this->sc_temp_par_inasist== 0){
$this->NM_cmp_hidden["dias_inasiste"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['php_cmp_sel']["dias_inasiste"] = "off"; }
}
if (isset($this->sc_temp_par_inasist)) {$_SESSION['par_inasist'] = $this->sc_temp_par_inasist;}
$_SESSION['scriptcase']['grid_bol_estudiantes_term']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['field_order'] as $Cada_col)
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
   //----- linea1
   function NM_export_linea1()
   {
         $this->linea1 = html_entity_decode($this->linea1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->linea1 = strip_tags($this->linea1);
         if (!NM_is_utf8($this->linea1))
         {
             $this->linea1 = sc_convert_encoding($this->linea1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->linea1 = str_replace('<', '&lt;', $this->linea1);
         $this->linea1 = str_replace('>', '&gt;', $this->linea1);
         $this->Texto_tag .= "<td>" . $this->linea1 . "</td>\r\n";
   }
   //----- t_grupos_id_director_grupo
   function NM_export_t_grupos_id_director_grupo()
   {
         nmgp_Form_Num_Val($this->look_t_grupos_id_director_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_t_grupos_id_director_grupo))
         {
             $this->look_t_grupos_id_director_grupo = sc_convert_encoding($this->look_t_grupos_id_director_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_t_grupos_id_director_grupo = str_replace('<', '&lt;', $this->look_t_grupos_id_director_grupo);
         $this->look_t_grupos_id_director_grupo = str_replace('>', '&gt;', $this->look_t_grupos_id_director_grupo);
         $this->Texto_tag .= "<td>" . $this->look_t_grupos_id_director_grupo . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_bol_estudiantes_term'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="grid_bol_estudiantes_term_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_bol_estudiantes_term"> 
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
