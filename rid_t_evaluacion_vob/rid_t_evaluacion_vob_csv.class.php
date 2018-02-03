<?php

class rid_t_evaluacion_vob_csv
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
   function rid_t_evaluacion_vob_csv()
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
      $this->Arquivo    .= "_rid_t_evaluacion_vob";
      $this->Arquivo    .= ".csv";
      $this->Tit_doc    = "rid_t_evaluacion_vob.csv";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campos_busca'];
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
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['csv_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['csv_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['csv_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_estudiante, id_grupo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_estudiante, id_grupo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq'];
      $nmgp_select .= " group by id_estudiante"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['asig1'] = "" . $_SESSION['par_assig1'] . "";
      $this->New_label['asig2'] = "" . $_SESSION['par_assig2'] . "";
      $this->New_label['asig3'] = "" . $_SESSION['par_assig3'] . "";
      $this->New_label['asig4'] = "" . $_SESSION['par_assig4'] . "";
      $this->New_label['asig5'] = "" . $_SESSION['par_assig5'] . "";
      $this->New_label['asig6'] = "" . $_SESSION['par_assig6'] . "";
      $this->New_label['asig7'] = "" . $_SESSION['par_assig7'] . "";
      $this->New_label['asig8'] = "" . $_SESSION['par_assig8'] . "";
      $this->New_label['asig9'] = "" . $_SESSION['par_assig9'] . "";
      $this->New_label['asig10'] = "" . $_SESSION['par_assig10'] . "";
      $this->New_label['asig11'] = "" . $_SESSION['par_assig11'] . "";
      $this->New_label['asig12'] = "" . $_SESSION['par_assig12'] . "";
      $this->New_label['asig13'] = "" . $_SESSION['par_assig13'] . "";
      $this->New_label['asig14'] = "" . $_SESSION['par_assig14'] . "";
      $this->New_label['asig15'] = "" . $_SESSION['par_assig15'] . "";
      $this->New_label['asig16'] = "" . $_SESSION['par_assig16'] . "";
      $this->New_label['asig17'] = "" . $_SESSION['par_assig17'] . "";
      $this->New_label['asig18'] = "" . $_SESSION['par_assig18'] . "";
      $this->New_label['asig19'] = "" . $_SESSION['par_assig19'] . "";
      $this->New_label['asig20'] = "" . $_SESSION['par_assig20'] . "";
      $this->New_label['asig21'] = "" . $_SESSION['par_assig21'] . "";
      $this->New_label['asig22'] = "" . $_SESSION['par_assig22'] . "";
      $this->New_label['asig23'] = "" . $_SESSION['par_assig23'] . "";
      $this->New_label['asig24'] = "" . $_SESSION['par_assig24'] . "";
      $this->New_label['asig25'] = "" . $_SESSION['par_assig25'] . "";
      $this->New_label['asig26'] = "" . $_SESSION['par_assig26'] . "";
      $this->New_label['asig27'] = "" . $_SESSION['par_assig27'] . "";
      $this->New_label['asig28'] = "" . $_SESSION['par_assig28'] . "";
      $this->New_label['asig29'] = "" . $_SESSION['par_assig29'] . "";
      $this->New_label['asig30'] = "" . $_SESSION['par_assig30'] . "";

      $csv_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      while (!$rs->EOF)
      {
         $this->csv_registro = "";
         $this->NM_prim_col  = 0;
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
         $_SESSION['scriptcase']['rid_t_evaluacion_vob']['contr_erro'] = 'on';
if (!isset($_SESSION['par_assig30'])) {$_SESSION['par_assig30'] = "";}
if (!isset($this->sc_temp_par_assig30)) {$this->sc_temp_par_assig30 = (isset($_SESSION['par_assig30'])) ? $_SESSION['par_assig30'] : "";}
if (!isset($_SESSION['par_id_asig30'])) {$_SESSION['par_id_asig30'] = "";}
if (!isset($this->sc_temp_par_id_asig30)) {$this->sc_temp_par_id_asig30 = (isset($_SESSION['par_id_asig30'])) ? $_SESSION['par_id_asig30'] : "";}
if (!isset($_SESSION['par_assig29'])) {$_SESSION['par_assig29'] = "";}
if (!isset($this->sc_temp_par_assig29)) {$this->sc_temp_par_assig29 = (isset($_SESSION['par_assig29'])) ? $_SESSION['par_assig29'] : "";}
if (!isset($_SESSION['par_id_asig29'])) {$_SESSION['par_id_asig29'] = "";}
if (!isset($this->sc_temp_par_id_asig29)) {$this->sc_temp_par_id_asig29 = (isset($_SESSION['par_id_asig29'])) ? $_SESSION['par_id_asig29'] : "";}
if (!isset($_SESSION['par_assig28'])) {$_SESSION['par_assig28'] = "";}
if (!isset($this->sc_temp_par_assig28)) {$this->sc_temp_par_assig28 = (isset($_SESSION['par_assig28'])) ? $_SESSION['par_assig28'] : "";}
if (!isset($_SESSION['par_id_asig28'])) {$_SESSION['par_id_asig28'] = "";}
if (!isset($this->sc_temp_par_id_asig28)) {$this->sc_temp_par_id_asig28 = (isset($_SESSION['par_id_asig28'])) ? $_SESSION['par_id_asig28'] : "";}
if (!isset($_SESSION['par_assig27'])) {$_SESSION['par_assig27'] = "";}
if (!isset($this->sc_temp_par_assig27)) {$this->sc_temp_par_assig27 = (isset($_SESSION['par_assig27'])) ? $_SESSION['par_assig27'] : "";}
if (!isset($_SESSION['par_id_asig27'])) {$_SESSION['par_id_asig27'] = "";}
if (!isset($this->sc_temp_par_id_asig27)) {$this->sc_temp_par_id_asig27 = (isset($_SESSION['par_id_asig27'])) ? $_SESSION['par_id_asig27'] : "";}
if (!isset($_SESSION['par_assig26'])) {$_SESSION['par_assig26'] = "";}
if (!isset($this->sc_temp_par_assig26)) {$this->sc_temp_par_assig26 = (isset($_SESSION['par_assig26'])) ? $_SESSION['par_assig26'] : "";}
if (!isset($_SESSION['par_id_asig26'])) {$_SESSION['par_id_asig26'] = "";}
if (!isset($this->sc_temp_par_id_asig26)) {$this->sc_temp_par_id_asig26 = (isset($_SESSION['par_id_asig26'])) ? $_SESSION['par_id_asig26'] : "";}
if (!isset($_SESSION['par_assig25'])) {$_SESSION['par_assig25'] = "";}
if (!isset($this->sc_temp_par_assig25)) {$this->sc_temp_par_assig25 = (isset($_SESSION['par_assig25'])) ? $_SESSION['par_assig25'] : "";}
if (!isset($_SESSION['par_id_asig25'])) {$_SESSION['par_id_asig25'] = "";}
if (!isset($this->sc_temp_par_id_asig25)) {$this->sc_temp_par_id_asig25 = (isset($_SESSION['par_id_asig25'])) ? $_SESSION['par_id_asig25'] : "";}
if (!isset($_SESSION['par_assig24'])) {$_SESSION['par_assig24'] = "";}
if (!isset($this->sc_temp_par_assig24)) {$this->sc_temp_par_assig24 = (isset($_SESSION['par_assig24'])) ? $_SESSION['par_assig24'] : "";}
if (!isset($_SESSION['par_id_asig24'])) {$_SESSION['par_id_asig24'] = "";}
if (!isset($this->sc_temp_par_id_asig24)) {$this->sc_temp_par_id_asig24 = (isset($_SESSION['par_id_asig24'])) ? $_SESSION['par_id_asig24'] : "";}
if (!isset($_SESSION['par_assig23'])) {$_SESSION['par_assig23'] = "";}
if (!isset($this->sc_temp_par_assig23)) {$this->sc_temp_par_assig23 = (isset($_SESSION['par_assig23'])) ? $_SESSION['par_assig23'] : "";}
if (!isset($_SESSION['par_id_asig23'])) {$_SESSION['par_id_asig23'] = "";}
if (!isset($this->sc_temp_par_id_asig23)) {$this->sc_temp_par_id_asig23 = (isset($_SESSION['par_id_asig23'])) ? $_SESSION['par_id_asig23'] : "";}
if (!isset($_SESSION['par_assig22'])) {$_SESSION['par_assig22'] = "";}
if (!isset($this->sc_temp_par_assig22)) {$this->sc_temp_par_assig22 = (isset($_SESSION['par_assig22'])) ? $_SESSION['par_assig22'] : "";}
if (!isset($_SESSION['par_id_asig22'])) {$_SESSION['par_id_asig22'] = "";}
if (!isset($this->sc_temp_par_id_asig22)) {$this->sc_temp_par_id_asig22 = (isset($_SESSION['par_id_asig22'])) ? $_SESSION['par_id_asig22'] : "";}
if (!isset($_SESSION['par_assig21'])) {$_SESSION['par_assig21'] = "";}
if (!isset($this->sc_temp_par_assig21)) {$this->sc_temp_par_assig21 = (isset($_SESSION['par_assig21'])) ? $_SESSION['par_assig21'] : "";}
if (!isset($_SESSION['par_id_asig21'])) {$_SESSION['par_id_asig21'] = "";}
if (!isset($this->sc_temp_par_id_asig21)) {$this->sc_temp_par_id_asig21 = (isset($_SESSION['par_id_asig21'])) ? $_SESSION['par_id_asig21'] : "";}
if (!isset($_SESSION['par_assig20'])) {$_SESSION['par_assig20'] = "";}
if (!isset($this->sc_temp_par_assig20)) {$this->sc_temp_par_assig20 = (isset($_SESSION['par_assig20'])) ? $_SESSION['par_assig20'] : "";}
if (!isset($_SESSION['par_id_asig20'])) {$_SESSION['par_id_asig20'] = "";}
if (!isset($this->sc_temp_par_id_asig20)) {$this->sc_temp_par_id_asig20 = (isset($_SESSION['par_id_asig20'])) ? $_SESSION['par_id_asig20'] : "";}
if (!isset($_SESSION['par_assig19'])) {$_SESSION['par_assig19'] = "";}
if (!isset($this->sc_temp_par_assig19)) {$this->sc_temp_par_assig19 = (isset($_SESSION['par_assig19'])) ? $_SESSION['par_assig19'] : "";}
if (!isset($_SESSION['par_id_asig19'])) {$_SESSION['par_id_asig19'] = "";}
if (!isset($this->sc_temp_par_id_asig19)) {$this->sc_temp_par_id_asig19 = (isset($_SESSION['par_id_asig19'])) ? $_SESSION['par_id_asig19'] : "";}
if (!isset($_SESSION['par_assig18'])) {$_SESSION['par_assig18'] = "";}
if (!isset($this->sc_temp_par_assig18)) {$this->sc_temp_par_assig18 = (isset($_SESSION['par_assig18'])) ? $_SESSION['par_assig18'] : "";}
if (!isset($_SESSION['par_id_asig18'])) {$_SESSION['par_id_asig18'] = "";}
if (!isset($this->sc_temp_par_id_asig18)) {$this->sc_temp_par_id_asig18 = (isset($_SESSION['par_id_asig18'])) ? $_SESSION['par_id_asig18'] : "";}
if (!isset($_SESSION['par_assig17'])) {$_SESSION['par_assig17'] = "";}
if (!isset($this->sc_temp_par_assig17)) {$this->sc_temp_par_assig17 = (isset($_SESSION['par_assig17'])) ? $_SESSION['par_assig17'] : "";}
if (!isset($_SESSION['par_id_asig17'])) {$_SESSION['par_id_asig17'] = "";}
if (!isset($this->sc_temp_par_id_asig17)) {$this->sc_temp_par_id_asig17 = (isset($_SESSION['par_id_asig17'])) ? $_SESSION['par_id_asig17'] : "";}
if (!isset($_SESSION['par_assig16'])) {$_SESSION['par_assig16'] = "";}
if (!isset($this->sc_temp_par_assig16)) {$this->sc_temp_par_assig16 = (isset($_SESSION['par_assig16'])) ? $_SESSION['par_assig16'] : "";}
if (!isset($_SESSION['par_id_asig16'])) {$_SESSION['par_id_asig16'] = "";}
if (!isset($this->sc_temp_par_id_asig16)) {$this->sc_temp_par_id_asig16 = (isset($_SESSION['par_id_asig16'])) ? $_SESSION['par_id_asig16'] : "";}
if (!isset($_SESSION['par_assig15'])) {$_SESSION['par_assig15'] = "";}
if (!isset($this->sc_temp_par_assig15)) {$this->sc_temp_par_assig15 = (isset($_SESSION['par_assig15'])) ? $_SESSION['par_assig15'] : "";}
if (!isset($_SESSION['par_id_asig15'])) {$_SESSION['par_id_asig15'] = "";}
if (!isset($this->sc_temp_par_id_asig15)) {$this->sc_temp_par_id_asig15 = (isset($_SESSION['par_id_asig15'])) ? $_SESSION['par_id_asig15'] : "";}
if (!isset($_SESSION['par_assig14'])) {$_SESSION['par_assig14'] = "";}
if (!isset($this->sc_temp_par_assig14)) {$this->sc_temp_par_assig14 = (isset($_SESSION['par_assig14'])) ? $_SESSION['par_assig14'] : "";}
if (!isset($_SESSION['par_id_asig14'])) {$_SESSION['par_id_asig14'] = "";}
if (!isset($this->sc_temp_par_id_asig14)) {$this->sc_temp_par_id_asig14 = (isset($_SESSION['par_id_asig14'])) ? $_SESSION['par_id_asig14'] : "";}
if (!isset($_SESSION['par_assig13'])) {$_SESSION['par_assig13'] = "";}
if (!isset($this->sc_temp_par_assig13)) {$this->sc_temp_par_assig13 = (isset($_SESSION['par_assig13'])) ? $_SESSION['par_assig13'] : "";}
if (!isset($_SESSION['par_id_asig13'])) {$_SESSION['par_id_asig13'] = "";}
if (!isset($this->sc_temp_par_id_asig13)) {$this->sc_temp_par_id_asig13 = (isset($_SESSION['par_id_asig13'])) ? $_SESSION['par_id_asig13'] : "";}
if (!isset($_SESSION['par_assig12'])) {$_SESSION['par_assig12'] = "";}
if (!isset($this->sc_temp_par_assig12)) {$this->sc_temp_par_assig12 = (isset($_SESSION['par_assig12'])) ? $_SESSION['par_assig12'] : "";}
if (!isset($_SESSION['par_id_asig12'])) {$_SESSION['par_id_asig12'] = "";}
if (!isset($this->sc_temp_par_id_asig12)) {$this->sc_temp_par_id_asig12 = (isset($_SESSION['par_id_asig12'])) ? $_SESSION['par_id_asig12'] : "";}
if (!isset($_SESSION['par_assig11'])) {$_SESSION['par_assig11'] = "";}
if (!isset($this->sc_temp_par_assig11)) {$this->sc_temp_par_assig11 = (isset($_SESSION['par_assig11'])) ? $_SESSION['par_assig11'] : "";}
if (!isset($_SESSION['par_id_asig11'])) {$_SESSION['par_id_asig11'] = "";}
if (!isset($this->sc_temp_par_id_asig11)) {$this->sc_temp_par_id_asig11 = (isset($_SESSION['par_id_asig11'])) ? $_SESSION['par_id_asig11'] : "";}
if (!isset($_SESSION['par_assig10'])) {$_SESSION['par_assig10'] = "";}
if (!isset($this->sc_temp_par_assig10)) {$this->sc_temp_par_assig10 = (isset($_SESSION['par_assig10'])) ? $_SESSION['par_assig10'] : "";}
if (!isset($_SESSION['par_id_asig10'])) {$_SESSION['par_id_asig10'] = "";}
if (!isset($this->sc_temp_par_id_asig10)) {$this->sc_temp_par_id_asig10 = (isset($_SESSION['par_id_asig10'])) ? $_SESSION['par_id_asig10'] : "";}
if (!isset($_SESSION['par_assig9'])) {$_SESSION['par_assig9'] = "";}
if (!isset($this->sc_temp_par_assig9)) {$this->sc_temp_par_assig9 = (isset($_SESSION['par_assig9'])) ? $_SESSION['par_assig9'] : "";}
if (!isset($_SESSION['par_id_asig9'])) {$_SESSION['par_id_asig9'] = "";}
if (!isset($this->sc_temp_par_id_asig9)) {$this->sc_temp_par_id_asig9 = (isset($_SESSION['par_id_asig9'])) ? $_SESSION['par_id_asig9'] : "";}
if (!isset($_SESSION['par_assig8'])) {$_SESSION['par_assig8'] = "";}
if (!isset($this->sc_temp_par_assig8)) {$this->sc_temp_par_assig8 = (isset($_SESSION['par_assig8'])) ? $_SESSION['par_assig8'] : "";}
if (!isset($_SESSION['par_id_asig8'])) {$_SESSION['par_id_asig8'] = "";}
if (!isset($this->sc_temp_par_id_asig8)) {$this->sc_temp_par_id_asig8 = (isset($_SESSION['par_id_asig8'])) ? $_SESSION['par_id_asig8'] : "";}
if (!isset($_SESSION['par_assig7'])) {$_SESSION['par_assig7'] = "";}
if (!isset($this->sc_temp_par_assig7)) {$this->sc_temp_par_assig7 = (isset($_SESSION['par_assig7'])) ? $_SESSION['par_assig7'] : "";}
if (!isset($_SESSION['par_id_asig7'])) {$_SESSION['par_id_asig7'] = "";}
if (!isset($this->sc_temp_par_id_asig7)) {$this->sc_temp_par_id_asig7 = (isset($_SESSION['par_id_asig7'])) ? $_SESSION['par_id_asig7'] : "";}
if (!isset($_SESSION['par_assig6'])) {$_SESSION['par_assig6'] = "";}
if (!isset($this->sc_temp_par_assig6)) {$this->sc_temp_par_assig6 = (isset($_SESSION['par_assig6'])) ? $_SESSION['par_assig6'] : "";}
if (!isset($_SESSION['par_id_asig6'])) {$_SESSION['par_id_asig6'] = "";}
if (!isset($this->sc_temp_par_id_asig6)) {$this->sc_temp_par_id_asig6 = (isset($_SESSION['par_id_asig6'])) ? $_SESSION['par_id_asig6'] : "";}
if (!isset($_SESSION['par_assig5'])) {$_SESSION['par_assig5'] = "";}
if (!isset($this->sc_temp_par_assig5)) {$this->sc_temp_par_assig5 = (isset($_SESSION['par_assig5'])) ? $_SESSION['par_assig5'] : "";}
if (!isset($_SESSION['par_id_asig5'])) {$_SESSION['par_id_asig5'] = "";}
if (!isset($this->sc_temp_par_id_asig5)) {$this->sc_temp_par_id_asig5 = (isset($_SESSION['par_id_asig5'])) ? $_SESSION['par_id_asig5'] : "";}
if (!isset($_SESSION['par_assig4'])) {$_SESSION['par_assig4'] = "";}
if (!isset($this->sc_temp_par_assig4)) {$this->sc_temp_par_assig4 = (isset($_SESSION['par_assig4'])) ? $_SESSION['par_assig4'] : "";}
if (!isset($_SESSION['par_id_asig4'])) {$_SESSION['par_id_asig4'] = "";}
if (!isset($this->sc_temp_par_id_asig4)) {$this->sc_temp_par_id_asig4 = (isset($_SESSION['par_id_asig4'])) ? $_SESSION['par_id_asig4'] : "";}
if (!isset($_SESSION['par_assig3'])) {$_SESSION['par_assig3'] = "";}
if (!isset($this->sc_temp_par_assig3)) {$this->sc_temp_par_assig3 = (isset($_SESSION['par_assig3'])) ? $_SESSION['par_assig3'] : "";}
if (!isset($_SESSION['par_id_asig3'])) {$_SESSION['par_id_asig3'] = "";}
if (!isset($this->sc_temp_par_id_asig3)) {$this->sc_temp_par_id_asig3 = (isset($_SESSION['par_id_asig3'])) ? $_SESSION['par_id_asig3'] : "";}
if (!isset($_SESSION['par_assig2'])) {$_SESSION['par_assig2'] = "";}
if (!isset($this->sc_temp_par_assig2)) {$this->sc_temp_par_assig2 = (isset($_SESSION['par_assig2'])) ? $_SESSION['par_assig2'] : "";}
if (!isset($_SESSION['par_id_asig2'])) {$_SESSION['par_id_asig2'] = "";}
if (!isset($this->sc_temp_par_id_asig2)) {$this->sc_temp_par_id_asig2 = (isset($_SESSION['par_id_asig2'])) ? $_SESSION['par_id_asig2'] : "";}
if (!isset($_SESSION['par_assig1'])) {$_SESSION['par_assig1'] = "";}
if (!isset($this->sc_temp_par_assig1)) {$this->sc_temp_par_assig1 = (isset($_SESSION['par_assig1'])) ? $_SESSION['par_assig1'] : "";}
if (!isset($_SESSION['par_id_asig1'])) {$_SESSION['par_id_asig1'] = "";}
if (!isset($this->sc_temp_par_id_asig1)) {$this->sc_temp_par_id_asig1 = (isset($_SESSION['par_id_asig1'])) ? $_SESSION['par_id_asig1'] : "";}
if (!isset($_SESSION['par_id_grupo'])) {$_SESSION['par_id_grupo'] = "";}
if (!isset($this->sc_temp_par_id_grupo)) {$this->sc_temp_par_id_grupo = (isset($_SESSION['par_id_grupo'])) ? $_SESSION['par_id_grupo'] : "";}
 
$check_sql = "SELECT t_asignaturas.asignatura, grupo_x_asig_x_doce.id_asignatura"
   . " FROM grupo_x_asig_x_doce INNER JOIN t_asignaturas ON t_asignaturas.id_asignatura = grupo_x_asig_x_doce.id_asignatura"
   . " WHERE grupo_x_asig_x_doce.id_grupo = '" .  $this->sc_temp_par_id_grupo . "'";
 
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
    $this->sc_temp_par_id_asig1 = $this->rs[0][0];
    $this->sc_temp_par_assig1 = $this->rs[0][1];
	$this->sc_temp_par_id_asig2 = $this->rs[1][0];
    $this->sc_temp_par_assig2 = $this->rs[1][1];
	$this->sc_temp_par_id_asig3 = $this->rs[2][0];
    $this->sc_temp_par_assig3 = $this->rs[2][1];
	$this->sc_temp_par_id_asig4 = $this->rs[3][0];
    $this->sc_temp_par_assig4 = $this->rs[3][1];
	$this->sc_temp_par_id_asig5 = $this->rs[4][0];
    $this->sc_temp_par_assig5 = $this->rs[4][1];
	$this->sc_temp_par_id_asig6 = $this->rs[5][0];
    $this->sc_temp_par_assig6 = $this->rs[5][1];
	$this->sc_temp_par_id_asig7 = $this->rs[6][0];
    $this->sc_temp_par_assig7 = $this->rs[6][1];
	$this->sc_temp_par_id_asig8 = $this->rs[7][0];
    $this->sc_temp_par_assig8 = $this->rs[7][1];
	$this->sc_temp_par_id_asig9 = $this->rs[8][0];
    $this->sc_temp_par_assig9 = $this->rs[8][1];
	$this->sc_temp_par_id_asig10 = $this->rs[9][0];
    $this->sc_temp_par_assig10 = $this->rs[9][1];
	$this->sc_temp_par_id_asig11 = $this->rs[10][0];
    $this->sc_temp_par_assig11 = $this->rs[10][1];
	$this->sc_temp_par_id_asig12 = $this->rs[11][0];
    $this->sc_temp_par_assig12 = $this->rs[11][1];
	$this->sc_temp_par_id_asig13 = $this->rs[12][0];
    $this->sc_temp_par_assig13 = $this->rs[12][1];
	$this->sc_temp_par_id_asig14 = $this->rs[13][0];
    $this->sc_temp_par_assig14 = $this->rs[13][1];
	$this->sc_temp_par_id_asig15 = $this->rs[14][0];
    $this->sc_temp_par_assig15 = $this->rs[14][1];
	$this->sc_temp_par_id_asig16 = $this->rs[15][0];
    $this->sc_temp_par_assig16 = $this->rs[15][1];
	$this->sc_temp_par_id_asig17 = $this->rs[16][0];
    $this->sc_temp_par_assig17 = $this->rs[16][1];
	$this->sc_temp_par_id_asig18 = $this->rs[17][0];
    $this->sc_temp_par_assig18 = $this->rs[17][1];
	$this->sc_temp_par_id_asig19 = $this->rs[18][0];
    $this->sc_temp_par_assig19 = $this->rs[18][1];
	$this->sc_temp_par_id_asig20 = $this->rs[19][0];
    $this->sc_temp_par_assig20 = $this->rs[19][1];
	$this->sc_temp_par_id_asig21 = $this->rs[20][0];
    $this->sc_temp_par_assig21 = $this->rs[20][1];
	$this->sc_temp_par_id_asig22 = $this->rs[21][0];
    $this->sc_temp_par_assig22 = $this->rs[21][1];
	$this->sc_temp_par_id_asig23 = $this->rs[22][0];
    $this->sc_temp_par_assig23 = $this->rs[22][1];
	$this->sc_temp_par_id_asig24 = $this->rs[23][0];
    $this->sc_temp_par_assig24 = $this->rs[23][1];
	$this->sc_temp_par_id_asig25 = $this->rs[24][0];
    $this->sc_temp_par_assig25 = $this->rs[24][1];
	$this->sc_temp_par_id_asig26 = $this->rs[25][0];
    $this->sc_temp_par_assig26 = $this->rs[25][1];
	$this->sc_temp_par_id_asig27 = $this->rs[26][0];
    $this->sc_temp_par_assig27 = $this->rs[26][1];
	$this->sc_temp_par_id_asig28 = $this->rs[27][0];
    $this->sc_temp_par_assig28 = $this->rs[27][1];
	$this->sc_temp_par_id_asig29 = $this->rs[28][0];
    $this->sc_temp_par_assig29 = $this->rs[28][1];
	$this->sc_temp_par_id_asig30 = $this->rs[29][0];
    $this->sc_temp_par_assig30 = $this->rs[29][1];
	
}
		else     
{
		   $this->sc_temp_par_id_asig1 = '';
           $this->sc_temp_par_assig1 = '';
}
if (isset($this->sc_temp_par_id_grupo)) {$_SESSION['par_id_grupo'] = $this->sc_temp_par_id_grupo;}
if (isset($this->sc_temp_par_id_asig1)) {$_SESSION['par_id_asig1'] = $this->sc_temp_par_id_asig1;}
if (isset($this->sc_temp_par_assig1)) {$_SESSION['par_assig1'] = $this->sc_temp_par_assig1;}
if (isset($this->sc_temp_par_id_asig2)) {$_SESSION['par_id_asig2'] = $this->sc_temp_par_id_asig2;}
if (isset($this->sc_temp_par_assig2)) {$_SESSION['par_assig2'] = $this->sc_temp_par_assig2;}
if (isset($this->sc_temp_par_id_asig3)) {$_SESSION['par_id_asig3'] = $this->sc_temp_par_id_asig3;}
if (isset($this->sc_temp_par_assig3)) {$_SESSION['par_assig3'] = $this->sc_temp_par_assig3;}
if (isset($this->sc_temp_par_id_asig4)) {$_SESSION['par_id_asig4'] = $this->sc_temp_par_id_asig4;}
if (isset($this->sc_temp_par_assig4)) {$_SESSION['par_assig4'] = $this->sc_temp_par_assig4;}
if (isset($this->sc_temp_par_id_asig5)) {$_SESSION['par_id_asig5'] = $this->sc_temp_par_id_asig5;}
if (isset($this->sc_temp_par_assig5)) {$_SESSION['par_assig5'] = $this->sc_temp_par_assig5;}
if (isset($this->sc_temp_par_id_asig6)) {$_SESSION['par_id_asig6'] = $this->sc_temp_par_id_asig6;}
if (isset($this->sc_temp_par_assig6)) {$_SESSION['par_assig6'] = $this->sc_temp_par_assig6;}
if (isset($this->sc_temp_par_id_asig7)) {$_SESSION['par_id_asig7'] = $this->sc_temp_par_id_asig7;}
if (isset($this->sc_temp_par_assig7)) {$_SESSION['par_assig7'] = $this->sc_temp_par_assig7;}
if (isset($this->sc_temp_par_id_asig8)) {$_SESSION['par_id_asig8'] = $this->sc_temp_par_id_asig8;}
if (isset($this->sc_temp_par_assig8)) {$_SESSION['par_assig8'] = $this->sc_temp_par_assig8;}
if (isset($this->sc_temp_par_id_asig9)) {$_SESSION['par_id_asig9'] = $this->sc_temp_par_id_asig9;}
if (isset($this->sc_temp_par_assig9)) {$_SESSION['par_assig9'] = $this->sc_temp_par_assig9;}
if (isset($this->sc_temp_par_id_asig10)) {$_SESSION['par_id_asig10'] = $this->sc_temp_par_id_asig10;}
if (isset($this->sc_temp_par_assig10)) {$_SESSION['par_assig10'] = $this->sc_temp_par_assig10;}
if (isset($this->sc_temp_par_id_asig11)) {$_SESSION['par_id_asig11'] = $this->sc_temp_par_id_asig11;}
if (isset($this->sc_temp_par_assig11)) {$_SESSION['par_assig11'] = $this->sc_temp_par_assig11;}
if (isset($this->sc_temp_par_id_asig12)) {$_SESSION['par_id_asig12'] = $this->sc_temp_par_id_asig12;}
if (isset($this->sc_temp_par_assig12)) {$_SESSION['par_assig12'] = $this->sc_temp_par_assig12;}
if (isset($this->sc_temp_par_id_asig13)) {$_SESSION['par_id_asig13'] = $this->sc_temp_par_id_asig13;}
if (isset($this->sc_temp_par_assig13)) {$_SESSION['par_assig13'] = $this->sc_temp_par_assig13;}
if (isset($this->sc_temp_par_id_asig14)) {$_SESSION['par_id_asig14'] = $this->sc_temp_par_id_asig14;}
if (isset($this->sc_temp_par_assig14)) {$_SESSION['par_assig14'] = $this->sc_temp_par_assig14;}
if (isset($this->sc_temp_par_id_asig15)) {$_SESSION['par_id_asig15'] = $this->sc_temp_par_id_asig15;}
if (isset($this->sc_temp_par_assig15)) {$_SESSION['par_assig15'] = $this->sc_temp_par_assig15;}
if (isset($this->sc_temp_par_id_asig16)) {$_SESSION['par_id_asig16'] = $this->sc_temp_par_id_asig16;}
if (isset($this->sc_temp_par_assig16)) {$_SESSION['par_assig16'] = $this->sc_temp_par_assig16;}
if (isset($this->sc_temp_par_id_asig17)) {$_SESSION['par_id_asig17'] = $this->sc_temp_par_id_asig17;}
if (isset($this->sc_temp_par_assig17)) {$_SESSION['par_assig17'] = $this->sc_temp_par_assig17;}
if (isset($this->sc_temp_par_id_asig18)) {$_SESSION['par_id_asig18'] = $this->sc_temp_par_id_asig18;}
if (isset($this->sc_temp_par_assig18)) {$_SESSION['par_assig18'] = $this->sc_temp_par_assig18;}
if (isset($this->sc_temp_par_id_asig19)) {$_SESSION['par_id_asig19'] = $this->sc_temp_par_id_asig19;}
if (isset($this->sc_temp_par_assig19)) {$_SESSION['par_assig19'] = $this->sc_temp_par_assig19;}
if (isset($this->sc_temp_par_id_asig20)) {$_SESSION['par_id_asig20'] = $this->sc_temp_par_id_asig20;}
if (isset($this->sc_temp_par_assig20)) {$_SESSION['par_assig20'] = $this->sc_temp_par_assig20;}
if (isset($this->sc_temp_par_id_asig21)) {$_SESSION['par_id_asig21'] = $this->sc_temp_par_id_asig21;}
if (isset($this->sc_temp_par_assig21)) {$_SESSION['par_assig21'] = $this->sc_temp_par_assig21;}
if (isset($this->sc_temp_par_id_asig22)) {$_SESSION['par_id_asig22'] = $this->sc_temp_par_id_asig22;}
if (isset($this->sc_temp_par_assig22)) {$_SESSION['par_assig22'] = $this->sc_temp_par_assig22;}
if (isset($this->sc_temp_par_id_asig23)) {$_SESSION['par_id_asig23'] = $this->sc_temp_par_id_asig23;}
if (isset($this->sc_temp_par_assig23)) {$_SESSION['par_assig23'] = $this->sc_temp_par_assig23;}
if (isset($this->sc_temp_par_id_asig24)) {$_SESSION['par_id_asig24'] = $this->sc_temp_par_id_asig24;}
if (isset($this->sc_temp_par_assig24)) {$_SESSION['par_assig24'] = $this->sc_temp_par_assig24;}
if (isset($this->sc_temp_par_id_asig25)) {$_SESSION['par_id_asig25'] = $this->sc_temp_par_id_asig25;}
if (isset($this->sc_temp_par_assig25)) {$_SESSION['par_assig25'] = $this->sc_temp_par_assig25;}
if (isset($this->sc_temp_par_id_asig26)) {$_SESSION['par_id_asig26'] = $this->sc_temp_par_id_asig26;}
if (isset($this->sc_temp_par_assig26)) {$_SESSION['par_assig26'] = $this->sc_temp_par_assig26;}
if (isset($this->sc_temp_par_id_asig27)) {$_SESSION['par_id_asig27'] = $this->sc_temp_par_id_asig27;}
if (isset($this->sc_temp_par_assig27)) {$_SESSION['par_assig27'] = $this->sc_temp_par_assig27;}
if (isset($this->sc_temp_par_id_asig28)) {$_SESSION['par_id_asig28'] = $this->sc_temp_par_id_asig28;}
if (isset($this->sc_temp_par_assig28)) {$_SESSION['par_assig28'] = $this->sc_temp_par_assig28;}
if (isset($this->sc_temp_par_id_asig29)) {$_SESSION['par_id_asig29'] = $this->sc_temp_par_id_asig29;}
if (isset($this->sc_temp_par_assig29)) {$_SESSION['par_assig29'] = $this->sc_temp_par_assig29;}
if (isset($this->sc_temp_par_id_asig30)) {$_SESSION['par_id_asig30'] = $this->sc_temp_par_id_asig30;}
if (isset($this->sc_temp_par_assig30)) {$_SESSION['par_assig30'] = $this->sc_temp_par_assig30;}
$_SESSION['scriptcase']['rid_t_evaluacion_vob']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['field_order'] as $Cada_col)
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
   //----- id_estudiante
   function NM_export_id_estudiante()
   {
         nmgp_Form_Num_Val($this->look_id_estudiante, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_id_estudiante);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig1
   function NM_export_asig1()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig1);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig2
   function NM_export_asig2()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig2);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig3
   function NM_export_asig3()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig3);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig4
   function NM_export_asig4()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig4);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig5
   function NM_export_asig5()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig5);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig6
   function NM_export_asig6()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig6);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig7
   function NM_export_asig7()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig7);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig8
   function NM_export_asig8()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig8);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig9
   function NM_export_asig9()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig9);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig10
   function NM_export_asig10()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig10);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig11
   function NM_export_asig11()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig11);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig12
   function NM_export_asig12()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig12);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig13
   function NM_export_asig13()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig13);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig14
   function NM_export_asig14()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig14);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig15
   function NM_export_asig15()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig15);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig16
   function NM_export_asig16()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig16);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig17
   function NM_export_asig17()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig17);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig18
   function NM_export_asig18()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig18);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig19
   function NM_export_asig19()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig19);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig20
   function NM_export_asig20()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig20);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig21
   function NM_export_asig21()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig21);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig22
   function NM_export_asig22()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig22);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig23
   function NM_export_asig23()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig23);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig24
   function NM_export_asig24()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig24);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig25
   function NM_export_asig25()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig25);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig26
   function NM_export_asig26()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig26);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig27
   function NM_export_asig27()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig27);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig28
   function NM_export_asig28()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig28);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig29
   function NM_export_asig29()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig29);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig30
   function NM_export_asig30()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig30);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Grupo - <?php echo $_SESSION['par_nombre_grupo'] ?> :: CSV</TITLE>
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
<form name="Fdown" method="get" action="rid_t_evaluacion_vob_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="rid_t_evaluacion_vob"> 
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
