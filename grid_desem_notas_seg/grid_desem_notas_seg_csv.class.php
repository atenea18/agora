<?php

class grid_desem_notas_seg_csv
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
   function grid_desem_notas_seg_csv()
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
      $this->Arquivo    .= "_grid_desem_notas_seg";
      $this->Arquivo    .= ".csv";
      $this->Tit_doc    = "grid_desem_notas_seg.csv";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->codigo = $Busca_temp['codigo']; 
          $tmp_pos = strpos($this->codigo, "##@@");
          if ($tmp_pos !== false)
          {
              $this->codigo = substr($this->codigo, 0, $tmp_pos);
          }
          $this->codigo_2 = $Busca_temp['codigo_input_2']; 
          $this->superior = $Busca_temp['superior']; 
          $tmp_pos = strpos($this->superior, "##@@");
          if ($tmp_pos !== false)
          {
              $this->superior = substr($this->superior, 0, $tmp_pos);
          }
          $this->alto = $Busca_temp['alto']; 
          $tmp_pos = strpos($this->alto, "##@@");
          if ($tmp_pos !== false)
          {
              $this->alto = substr($this->alto, 0, $tmp_pos);
          }
          $this->basico = $Busca_temp['basico']; 
          $tmp_pos = strpos($this->basico, "##@@");
          if ($tmp_pos !== false)
          {
              $this->basico = substr($this->basico, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['csv_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['csv_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['csv_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT codigo, dc1, dc2, dc3, dc4, dc5, dc6, dc7, dc8, dc9, dc10, dc11, dc12 from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT codigo, dc1, dc2, dc3, dc4, dc5, dc6, dc7, dc8, dc9, dc10, dc11, dc12 from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['where_pesq'];
      $nmgp_select .= " group by id_estudiante"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['order_grid'];
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
         $this->codigo = $rs->fields[0] ;  
         $this->codigo = (string)$this->codigo;
         $this->dc1 = $rs->fields[1] ;  
         $this->dc1 = (strpos(strtolower($this->dc1), "e")) ? (float)$this->dc1 : $this->dc1; 
         $this->dc1 = (string)$this->dc1;
         $this->dc2 = $rs->fields[2] ;  
         $this->dc2 = (strpos(strtolower($this->dc2), "e")) ? (float)$this->dc2 : $this->dc2; 
         $this->dc2 = (string)$this->dc2;
         $this->dc3 = $rs->fields[3] ;  
         $this->dc3 = (strpos(strtolower($this->dc3), "e")) ? (float)$this->dc3 : $this->dc3; 
         $this->dc3 = (string)$this->dc3;
         $this->dc4 = $rs->fields[4] ;  
         $this->dc4 = (strpos(strtolower($this->dc4), "e")) ? (float)$this->dc4 : $this->dc4; 
         $this->dc4 = (string)$this->dc4;
         $this->dc5 = $rs->fields[5] ;  
         $this->dc5 = (strpos(strtolower($this->dc5), "e")) ? (float)$this->dc5 : $this->dc5; 
         $this->dc5 = (string)$this->dc5;
         $this->dc6 = $rs->fields[6] ;  
         $this->dc6 = (strpos(strtolower($this->dc6), "e")) ? (float)$this->dc6 : $this->dc6; 
         $this->dc6 = (string)$this->dc6;
         $this->dc7 = $rs->fields[7] ;  
         $this->dc7 = (strpos(strtolower($this->dc7), "e")) ? (float)$this->dc7 : $this->dc7; 
         $this->dc7 = (string)$this->dc7;
         $this->dc8 = $rs->fields[8] ;  
         $this->dc8 = (strpos(strtolower($this->dc8), "e")) ? (float)$this->dc8 : $this->dc8; 
         $this->dc8 = (string)$this->dc8;
         $this->dc9 = $rs->fields[9] ;  
         $this->dc9 = (strpos(strtolower($this->dc9), "e")) ? (float)$this->dc9 : $this->dc9; 
         $this->dc9 = (string)$this->dc9;
         $this->dc10 = $rs->fields[10] ;  
         $this->dc10 = (strpos(strtolower($this->dc10), "e")) ? (float)$this->dc10 : $this->dc10; 
         $this->dc10 = (string)$this->dc10;
         $this->dc11 = $rs->fields[11] ;  
         $this->dc11 = (strpos(strtolower($this->dc11), "e")) ? (float)$this->dc11 : $this->dc11; 
         $this->dc11 = (string)$this->dc11;
         $this->dc12 = $rs->fields[12] ;  
         $this->dc12 = (strpos(strtolower($this->dc12), "e")) ? (float)$this->dc12 : $this->dc12; 
         $this->dc12 = (string)$this->dc12;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_desem_notas_seg']['contr_erro'] = 'on';
 
$this->NM_cmp_hidden["desem_asig1"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig1"] = "off"; }$this->NM_cmp_hidden["desem_asig2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig2"] = "off"; }$this->NM_cmp_hidden["desem_asig3"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig3"] = "off"; }$this->NM_cmp_hidden["desem_asig4"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig4"] = "off"; }$this->NM_cmp_hidden["desem_asig5"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig5"] = "off"; }$this->NM_cmp_hidden["desem_asig6"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig6"] = "off"; }$this->NM_cmp_hidden["desem_asig7"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig7"] = "off"; }$this->NM_cmp_hidden["desem_asig8"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig8"] = "off"; }$this->NM_cmp_hidden["desem_asig9"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig9"] = "off"; }$this->NM_cmp_hidden["desem_asig10"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig10"] = "off"; }$this->NM_cmp_hidden["desem_asig11"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig11"] = "off"; }$this->NM_cmp_hidden["desem_asig12"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig12"] = "off"; }if($this->dc1 >0 ){
$this->NM_cmp_hidden["desem_asig1"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig1"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup1 = $this->rs[0][0];
    $alt1 = $this->rs[0][1];
	$basico1 = $this->rs[0][2];
	$bajo1 = $this->rs[0][3];
}
		else     
{
		    $sup1 = '';
            $alt1 = '';
			 $basico1 = '';
            $bajo1 = '';	
     	}
$check_sql1 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc1 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql1; 
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
    $val_dc1 = $this->rs1[0][0];
	
	switch ($val_dc1) {
    case "1":
$this->desem_asig1 = $sup1 ;
        break;
    case "2":
$this->desem_asig1 =$alt1;
        break;
    case "3":
$this->desem_asig1 =$basico1;

        break;
		 case "4":
$this->desem_asig1 =$bajo1;
        break;
	}   
}
		else     
{
		    $val_dc1 = '';
  $this->NM_cmp_hidden["desem_asig1"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig1"] = "off"; }}
}


if($this->dc2 >0){

$this->NM_cmp_hidden["desem_asig2"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig2"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup2 = $this->rs[0][0];
    $alt2 = $this->rs[0][1];
	$basico2 = $this->rs[0][2];
	$bajo2 = $this->rs[0][3];
}
		else     
{
		    $sup2 = '';
            $alt2 = '';
			 $basico2 = '';
            $bajo2 = '';	
     	}
	
	
	
	
	
$check_sql2 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc2 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql2; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs2 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs2[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs2 = false;
          $this->rs2_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs2[0][0]))     
{
    $val_dc2 = $this->rs2[0][0];
	
	switch ($val_dc2) {
    case "1":
$this->desem_asig2  = $sup2;
        break;
    case "2":
$this->desem_asig2 = $alt2;
        break;
    case "3":
$this->desem_asig2 = $basico2;

        break;
		 case "4":
$this->desem_asig2 =$bajo2;
        break;
		
}
   
}
		else     
{
		    $val_dc2 = '';
   $this->NM_cmp_hidden["desem_asig2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig2"] = "off"; }}
}


if($this->dc6 >0){

$this->NM_cmp_hidden["desem_asig6"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig6"] = "on"; }$check_sql6 = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
      $nm_select = $check_sql6; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs6 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs6[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs6 = false;
          $this->rs6_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $sup6 = $this->rs6[0][0];
    $alt6 = $this->rs6[0][1];
	$basico6 = $this->rs6[0][2];
	$bajo6 = $this->rs6[0][3];
}
		else     
{
		    $sup6 = '';
            $alt6 = '';
			 $basico6 = '';
            $bajo6 = '';	
     	}
		
	
	
	
     	
$check_sql6 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc6 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql6; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs6 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs6[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs6 = false;
          $this->rs6_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs6[0][0]))     
{
    $val_dc6 = $this->rs6[0][0];
	
	switch ($val_dc6) {
    case "1":
$this->desem_asig6  =$sup6;
        break;
    case "2":
$this->desem_asig6 =$alt6;
        break;
    case "3":
$this->desem_asig6 =$basico6;

        break;
		 case "4":
$this->desem_asig6 =$bajo6;
        break;
		
}
   
}
		else     
{
		    $val_dc6 = '';
 $this->NM_cmp_hidden["desem_asig6"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig6"] = "off"; }}
}


if($this->dc7 >0){

$this->NM_cmp_hidden["desem_asig7"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig7"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup = $this->rs[0][0];
    $alt = $this->rs[0][1];
	$this->basico = $this->rs[0][2];
	$this->bajo = $this->rs[0][3];
}
		else     
{
		    $sup = '';
            $alt = '';
			 $this->basico = '';
            $this->bajo = '';	
     	}
			
	
	
	
	
     	
$check_sql7 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc7 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql7; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs7 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs7[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs7 = false;
          $this->rs7_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs7[0][0]))     
{
    $val_dc7 = $this->rs7[0][0];
	
	switch ($val_dc7) {
    case "1":
$this->desem_asig7  = $sup;
        break;
    case "2":
$this->desem_asig7 =$alt;
        break;
    case "3":
$this->desem_asig7 =$this->basico;

        break;
		 case "4":
$this->desem_asig7 =$this->bajo;
        break;
		
}
   
}
		else     
{
		    $val_dc7 = '';
$this->NM_cmp_hidden["desem_asig7"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig7"] = "off"; }}
}

if($this->dc9 >0){

$this->NM_cmp_hidden["desem_asig9"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig9"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup = $this->rs[0][0];
    $alt = $this->rs[0][1];
	$this->basico = $this->rs[0][2];
	$this->bajo = $this->rs[0][3];
}
		else     
{
		    $sup = '';
            $alt = '';
			 $this->basico = '';
            $this->bajo = '';	
     	}
					
	
	
	
	
	
$check_sql9 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc9 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql9; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs9 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs9[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs9 = false;
          $this->rs9_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs9[0][0]))     
{
    $val_dc9 = $this->rs9[0][0];
	
	switch ($val_dc9) {
    case "1":
$this->desem_asig9  =$sup;
        break;
    case "2":
$this->desem_asig9 =$alt;
        break;
    case "3":
$this->desem_asig9 =$this->basico;

        break;
		 case "4":
$this->desem_asig9 =$this->bajo;
        break;
		
}
   
}
		else     
{
		    $val_dc9 = '';
 $this->NM_cmp_hidden["desem_asig9"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig9"] = "off"; }}
}


if($this->dc10 >0){

$this->NM_cmp_hidden["desem_asig10"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig10"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup = $this->rs[0][0];
    $alt = $this->rs[0][1];
	$this->basico = $this->rs[0][2];
	$this->bajo = $this->rs[0][3];
}
		else     
{
		    $sup = '';
            $alt = '';
			 $this->basico = '';
            $this->bajo = '';	
     	}
					
		
	
     	
$check_sql10 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc10 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql10; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs10 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs10[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs10 = false;
          $this->rs10_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs10[0][0]))     
{
    $val_dc10 = $this->rs10[0][0];
	
	switch ($val_dc10) {
    case "1":
$this->desem_asig10  =$sup;
        break;
    case "2":
$this->desem_asig10 =$alt;
        break;
    case "3":
$this->desem_asig10 =$this->basico;

        break;
		 case "4":
$this->desem_asig10 =$this->bajo;
        break;
		
}
   
}
		else     
{
		    $val_dc10 = '';
 $this->NM_cmp_hidden["desem_asig10"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig10"] = "off"; }}
}

if($this->dc11 >0){

$this->NM_cmp_hidden["desem_asig11"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig11"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup = $this->rs[0][0];
    $alt = $this->rs[0][1];
	$this->basico = $this->rs[0][2];
	$this->bajo = $this->rs[0][3];
}
		else     
{
		    $sup = '';
            $alt = '';
			 $this->basico = '';
            $this->bajo = '';	
     	}
	
	
     	
$check_sql11 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc11 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql11; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs11 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs11[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs11 = false;
          $this->rs11_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs11[0][0]))     
{
    $val_dc11 = $this->rs11[0][0];
	
	switch ($val_dc11) {
    case "1":
$this->desem_asig11  =$sup;
        break;
    case "2":
$this->desem_asig11 =$alt;
        break;
    case "3":
$this->desem_asig11 = $this->basico;

        break;
		 case "4":
$this->desem_asig11 =$this->bajo;
        break;
		
}
   
}
		else     
{
		    $val_dc11 = '';
  $this->NM_cmp_hidden["desem_asig11"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig11"] = "off"; }}
}

if($this->dc3 >0){
$this->NM_cmp_hidden["desem_asig3"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig3"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup3 = $this->rs[0][0];
    $alt3 = $this->rs[0][1];
	$basico3 = $this->rs[0][2];
	$bajo3 = $this->rs[0][3];
}
		else     
{
		    $sup3 = '';
            $alt3 = '';
			 $basico3 = '';
            $bajo3 = '';	
     	}
	
     	
$check_sql3 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc3 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql3; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs3 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs3[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs3 = false;
          $this->rs3_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs3[0][0]))     
{
    $val_dc3 = $this->rs3[0][0];
	
	switch ($val_dc3) {
    case "1":
$this->desem_asig3  =$sup3;
        break;
    case "2":
$this->desem_asig3 =$alt3;
        break;
    case "3":
$this->desem_asig3 =$basico3;

        break;
		 case "4":
$this->desem_asig3 =$bajo3 ;
        break;
		
}
   
}
		else     
{
		    $val_dc3 = '';
   $this->NM_cmp_hidden["desem_asig3"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig3"] = "off"; }}
}

if($this->dc4 >0){
$this->NM_cmp_hidden["desem_asig4"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig4"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup4 = $this->rs[0][0];
    $alt4 = $this->rs[0][1];
	$basico4 = $this->rs[0][2];
	$bajo4 = $this->rs[0][3];
}
		else     
{
		    $sup4 = '';
            $alt4 = '';
			 $basico4 = '';
            $bajo4 = '';	
     	}
		
	
	
     	
$check_sql4 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc4 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql4; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs4 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs4[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs4 = false;
          $this->rs4_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs4[0][0]))     
{
    $val_dc4 = $this->rs4[0][0];
	
	switch ($val_dc4) {
    case "1":
$this->desem_asig4  = $sup4;
        break;
    case "2":
$this->desem_asig4 =$alt4;
        break;
    case "3":
$this->desem_asig4 =$basico4;

        break;
		 case "4":
$this->desem_asig4 =$bajo4 ;
        break;
		
}
   
}
		else     
{
		    $val_dc4 = '';
  $this->NM_cmp_hidden["desem_asig4"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig4"] = "off"; }}
}


if($this->dc5 >0){
$this->NM_cmp_hidden["desem_asig5"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig5"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup5 = $this->rs[0][0];
    $alt5 = $this->rs[0][1];
	$basico5 = $this->rs[0][2];
	$bajo5 = $this->rs[0][3];
}
		else     
{
		    $sup5 = '';
            $alt5 = '';
			 $basico5 = '';
            $bajo5 = '';	
     	}
	
	
	
     	
$check_sql5 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc5 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql5; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs5 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs5[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs5 = false;
          $this->rs5_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs5[0][0]))     
{
    $val_dc5 = $this->rs5[0][0];
	
	switch ($val_dc5) {
    case "1":
$this->desem_asig5  =$sup5;
        break;
    case "2":
$this->desem_asig5 =$alt5;
        break;
    case "3":
$this->desem_asig5 =$basico5;

        break;
		 case "4":
$this->desem_asig5 =$bajo5;
        break;
		
}
   
}
		else     
{
		    $val_dc5 = '';
  $this->NM_cmp_hidden["desem_asig5"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig5"] = "off"; }}
}


if($this->dc8 >0){

$this->NM_cmp_hidden["desem_asig8"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig8"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup = $this->rs[0][0];
    $alt = $this->rs[0][1];
	$this->basico = $this->rs[0][2];
	$this->bajo = $this->rs[0][3];
}
		else     
{
		    $sup = '';
            $alt = '';
			 $this->basico = '';
            $this->bajo = '';	
     	}
				
	
	
	
	
	
     	
$check_sql8 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc8 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql8; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs8 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs8[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs8 = false;
          $this->rs8_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs8[0][0]))     
{
    $val_dc8 = $this->rs8[0][0];
	
	switch ($val_dc8) {
    case "1":
$this->desem_asig8  =$sup;
        break;
    case "2":
$this->desem_asig8 =$alt;
        break;
    case "3":
$this->desem_asig8 = $this->basico;

        break;
		 case "4":
$this->desem_asig8 =$this->bajo;
        break;
		
}
   
}
		else     
{
		    $val_dc8 = '';
$this->NM_cmp_hidden["desem_asig8"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig8"] = "off"; }}
}


if($this->dc12 >0){

$this->NM_cmp_hidden["desem_asig12"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig12"] = "on"; }$check_sql = "SELECT superior, alto, basico, bajo"
   . " FROM  desem_notas"
   . " WHERE codigo = '" .$this->codigo . "'";
 
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
    $sup = $this->rs[0][0];
    $alt = $this->rs[0][1];
	$this->basico = $this->rs[0][2];
	$this->bajo = $this->rs[0][3];
}
		else     
{
		    $sup = '';
            $alt = '';
			 $this->basico = '';
            $this->bajo = '';	
     	}
	
	
	
	
     	
$check_sql12 = "SELECT orden"
   . " FROM valoracion"
   . " WHERE  '" .$this->dc12 . "' BETWEEN minimo AND  maximo ";
 
      $nm_select = $check_sql12; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs12 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs12[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs12 = false;
          $this->rs12_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs12[0][0]))     
{
    $val_dc12 = $this->rs12[0][0];
	
	switch ($val_dc12) {
    case "1":
$this->desem_asig12  =$sup;
        break;
    case "2":
$this->desem_asig12 =$alt;
        break;
    case "3":
$this->desem_asig12 = $this->basico;

        break;
		 case "4":
$this->desem_asig12 =$this->bajo;
        break;
		
}
   
}
		else     
{
		    $val_dc12 = '';
 $this->NM_cmp_hidden["desem_asig12"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['php_cmp_sel']["desem_asig12"] = "off"; }}
}
$_SESSION['scriptcase']['grid_desem_notas_seg']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['field_order'] as $Cada_col)
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
   //----- desem_asig1
   function NM_export_desem_asig1()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig1);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig2
   function NM_export_desem_asig2()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig2);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig3
   function NM_export_desem_asig3()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig3);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig4
   function NM_export_desem_asig4()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig4);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig5
   function NM_export_desem_asig5()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig5);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig6
   function NM_export_desem_asig6()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig6);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig7
   function NM_export_desem_asig7()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig7);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig8
   function NM_export_desem_asig8()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig8);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig9
   function NM_export_desem_asig9()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig9);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig10
   function NM_export_desem_asig10()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig10);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig11
   function NM_export_desem_asig11()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig11);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- desem_asig12
   function NM_export_desem_asig12()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->desem_asig12);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desem_notas_seg'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - desem_notas :: CSV</TITLE>
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
<form name="Fdown" method="get" action="grid_desem_notas_seg_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_desem_notas_seg"> 
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
