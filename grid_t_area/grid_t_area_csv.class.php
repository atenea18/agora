<?php

class grid_t_area_csv
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Tit_doc;
   var $Delim_dados;
   var $Delim_line;
   var $Delim_col;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_t_area_csv()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_csv()
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
      $this->Arquivo     = "sc_csv";
      $this->Arquivo    .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo    .= "_grid_t_area";
      $this->Arquivo    .= ".csv";
      $this->Tit_doc    = "grid_t_area.csv";
      $this->Delim_dados = "\"";
      $this->Delim_col   = ";";
      $this->Delim_line  = "\r\n";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_t_area']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_t_area']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_t_area']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->t_area_area = $Busca_temp['t_area_area']; 
          $tmp_pos = strpos($this->t_area_area, "##@@");
          if ($tmp_pos !== false)
          {
              $this->t_area_area = substr($this->t_area_area, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['where_pesq_filtro'];
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_t_area']['contr_erro'] = 'on';
if (!isset($_SESSION['par_tipo_educ'])) {$_SESSION['par_tipo_educ'] = "";}
if (!isset($this->sc_temp_par_tipo_educ)) {$this->sc_temp_par_tipo_educ = (isset($_SESSION['par_tipo_educ'])) ? $_SESSION['par_tipo_educ'] : "";}
if (!isset($_SESSION['par_calendario'])) {$_SESSION['par_calendario'] = "";}
if (!isset($this->sc_temp_par_calendario)) {$this->sc_temp_par_calendario = (isset($_SESSION['par_calendario'])) ? $_SESSION['par_calendario'] : "";}
if (!isset($_SESSION['par_modalidad'])) {$_SESSION['par_modalidad'] = "";}
if (!isset($this->sc_temp_par_modalidad)) {$this->sc_temp_par_modalidad = (isset($_SESSION['par_modalidad'])) ? $_SESSION['par_modalidad'] : "";}
if (!isset($_SESSION['par_num_doc'])) {$_SESSION['par_num_doc'] = "";}
if (!isset($this->sc_temp_par_num_doc)) {$this->sc_temp_par_num_doc = (isset($_SESSION['par_num_doc'])) ? $_SESSION['par_num_doc'] : "";}
if (!isset($_SESSION['par_tipo_ident'])) {$_SESSION['par_tipo_ident'] = "";}
if (!isset($this->sc_temp_par_tipo_ident)) {$this->sc_temp_par_tipo_ident = (isset($_SESSION['par_tipo_ident'])) ? $_SESSION['par_tipo_ident'] : "";}
if (!isset($_SESSION['par_grado'])) {$_SESSION['par_grado'] = "";}
if (!isset($this->sc_temp_par_grado)) {$this->sc_temp_par_grado = (isset($_SESSION['par_grado'])) ? $_SESSION['par_grado'] : "";}
if (!isset($_SESSION['par_jornada'])) {$_SESSION['par_jornada'] = "";}
if (!isset($this->sc_temp_par_jornada)) {$this->sc_temp_par_jornada = (isset($_SESSION['par_jornada'])) ? $_SESSION['par_jornada'] : "";}
if (!isset($_SESSION['psr_nombre_grupo'])) {$_SESSION['psr_nombre_grupo'] = "";}
if (!isset($this->sc_temp_psr_nombre_grupo)) {$this->sc_temp_psr_nombre_grupo = (isset($_SESSION['psr_nombre_grupo'])) ? $_SESSION['psr_nombre_grupo'] : "";}
if (!isset($_SESSION['par_year'])) {$_SESSION['par_year'] = "";}
if (!isset($this->sc_temp_par_year)) {$this->sc_temp_par_year = (isset($_SESSION['par_year'])) ? $_SESSION['par_year'] : "";}
if (!isset($_SESSION['par_idestudiante'])) {$_SESSION['par_idestudiante'] = "";}
if (!isset($this->sc_temp_par_idestudiante)) {$this->sc_temp_par_idestudiante = (isset($_SESSION['par_idestudiante'])) ? $_SESSION['par_idestudiante'] : "";}
 

$check_sql = "SELECT  t_grupos.nombre_grupo, t_grupos.jornada, t_grados.grado, students.tipo_identificacion,
students.numero_documento,t_grupos.modalidad, t_grupos.tipo_educ, t_grupos.calendario "
   . " FROM students
       INNER JOIN t_evaluacion ON students.idstudents = t_evaluacion.id_estudiante
       INNER JOIN t_grupos ON t_evaluacion.id_grupo = t_grupos.id_grupo
       INNER JOIN t_grados ON t_grupos.id_grado = t_grados.id_grado"
   . " WHERE students.idstudents= '" . $this->sc_temp_par_idestudiante . "' AND YEAR(t_evaluacion.fecha_entorno )='".$this->sc_temp_par_year."' ";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->sc_temp_psr_nombre_grupo = $this->rs[0][0];
    $this->sc_temp_par_jornada = $this->rs[0][1];
	$this->sc_temp_par_grado = $this->rs[0][2];
	$this->sc_temp_par_tipo_ident = $this->rs[0][3];
	$this->sc_temp_par_num_doc = $this->rs[0][4];
	$this->sc_temp_par_modalidad = $this->rs[0][5];	
	$this->sc_temp_par_calendario = $this->rs[0][7];
}
		else     
{
    $this->sc_temp_psr_nombre_grupo = "";
    $this->sc_temp_par_jornada = "";
	$this->sc_temp_par_grado = "";
	$this->sc_temp_par_tipo_ident = "";
	$this->sc_temp_par_num_doc = "";
	$this->sc_temp_par_modalidad = "";
	$this->sc_temp_par_tipo_educ = "";
	$this->sc_temp_par_calendario = "";
}

$check_sql = "SELECT nivel"
   . " FROM niveles"
   . " WHERE id_nivel = '" . $this->rs[0][6] . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs1 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs1[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs1 = false;
          $this->rs1_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs1[0][0]))     
{
     $this->sc_temp_par_tipo_educ  = $this->rs1[0][0];
   
}
		else     
{
		     $this->sc_temp_par_tipo_educ  = '';
   
}
if (isset($this->sc_temp_par_idestudiante)) {$_SESSION['par_idestudiante'] = $this->sc_temp_par_idestudiante;}
if (isset($this->sc_temp_par_year)) {$_SESSION['par_year'] = $this->sc_temp_par_year;}
if (isset($this->sc_temp_psr_nombre_grupo)) {$_SESSION['psr_nombre_grupo'] = $this->sc_temp_psr_nombre_grupo;}
if (isset($this->sc_temp_par_jornada)) {$_SESSION['par_jornada'] = $this->sc_temp_par_jornada;}
if (isset($this->sc_temp_par_grado)) {$_SESSION['par_grado'] = $this->sc_temp_par_grado;}
if (isset($this->sc_temp_par_tipo_ident)) {$_SESSION['par_tipo_ident'] = $this->sc_temp_par_tipo_ident;}
if (isset($this->sc_temp_par_num_doc)) {$_SESSION['par_num_doc'] = $this->sc_temp_par_num_doc;}
if (isset($this->sc_temp_par_modalidad)) {$_SESSION['par_modalidad'] = $this->sc_temp_par_modalidad;}
if (isset($this->sc_temp_par_calendario)) {$_SESSION['par_calendario'] = $this->sc_temp_par_calendario;}
if (isset($this->sc_temp_par_tipo_educ)) {$_SESSION['par_tipo_educ'] = $this->sc_temp_par_tipo_educ;}
$_SESSION['scriptcase']['grid_t_area']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['csv_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['csv_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['csv_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT t_area.area as t_area_area, SUM(t_evaluacion.ihs) as sc_field_0, AVG(evaluacion) as sc_field_1, t_area.id_area as t_area_id_area from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT t_area.area as t_area_area, SUM(t_evaluacion.ihs) as sc_field_0, AVG(evaluacion) as sc_field_1, t_area.id_area as t_area_id_area from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['where_pesq'];
      $nmgp_select .= " group by t_area.id_area"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $csv_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      while (!$rs->EOF)
      {
         $this->csv_registro = "";
         $this->NM_prim_col  = 0;
         $this->t_area_area = $rs->fields[0] ;  
         $this->sc_field_0 = $rs->fields[1] ;  
         $this->sc_field_0 =  str_replace(",", ".", $this->sc_field_0);
         $this->sc_field_0 = (string)$this->sc_field_0;
         $this->sc_field_1 = $rs->fields[2] ;  
         $this->sc_field_1 = (strpos(strtolower($this->sc_field_1), "e")) ? (float)$this->sc_field_1 : $this->sc_field_1; 
         $this->sc_field_1 = (string)$this->sc_field_1;
         $this->t_area_id_area = $rs->fields[3] ;  
         $this->t_area_id_area = (string)$this->t_area_id_area;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_t_area']['contr_erro'] = 'on';
 

$check_sql = "SELECT valoracion.val"
   . " FROM valoracion"
   . " WHERE ". $this->sc_field_1  ." BETWEEN valoracion.minimo AND valoracion.maximo AND valoracion.valoracion LIKE '%Primaria%'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->n_desp_area  = $this->rs[0][0];
   
}
		else     
{
		    $this->n_desp_area  = '';
   
}
$_SESSION['scriptcase']['grid_t_area']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->csv_registro .= $this->Delim_line;
         fwrite($csv_f, $this->csv_registro);
         $rs->MoveNext();
      }
      fclose($csv_f);

      $rs->Close();
   }
   //----- t_area_area
   function NM_export_t_area_area()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->t_area_area);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         nmgp_Form_Num_Val($this->sc_field_0, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->sc_field_0);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- sc_field_1
   function NM_export_sc_field_1()
   {
         nmgp_Form_Num_Val($this->sc_field_1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "1", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->sc_field_1);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- n_desp_area
   function NM_export_n_desp_area()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->n_desp_area);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_area'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>CERTIFICADO DE ESTUDIO :: CSV</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">CSV</td>
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
<form name="Fdown" method="get" action="grid_t_area_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_t_area"> 
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
