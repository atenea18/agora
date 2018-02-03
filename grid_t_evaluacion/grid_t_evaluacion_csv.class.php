<?php

class grid_t_evaluacion_csv
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
   function grid_t_evaluacion_csv()
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
      $this->Arquivo    .= "_grid_t_evaluacion";
      $this->Arquivo    .= ".csv";
      $this->Tit_doc    = "grid_t_evaluacion.csv";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['campos_busca'];
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
          $this->id_grupo = $Busca_temp['id_grupo']; 
          $tmp_pos = strpos($this->id_grupo, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_grupo = substr($this->id_grupo, 0, $tmp_pos);
          }
          $this->id_grupo_2 = $Busca_temp['id_grupo_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['csv_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['csv_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['csv_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_estudiante, id_grupo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_estudiante, id_grupo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['where_pesq'];
      $nmgp_select .= " group by id_estudiante"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['asig1'] = " " . $_SESSION['par_assig1'] . "";
      $this->New_label['asig2'] = " " . $_SESSION['par_assig2'] . "";
      $this->New_label['asig3'] = " " . $_SESSION['par_assig3'] . " ";
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
      $this->New_label['asig26'] = " " . $_SESSION['par_assig26'] . "";
      $this->New_label['asig27'] = " " . $_SESSION['par_assig27'] . "";
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
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['field_order'] as $Cada_col)
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
         nmgp_Form_Num_Val($this->asig1, "", ",", "2", "N", "", "", "N:2", "-") ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig1);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig2
   function NM_export_asig2()
   {
         nmgp_Form_Num_Val($this->asig2, "", ",", "2", "N", "", "", "N:2", "-") ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig2);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig3
   function NM_export_asig3()
   {
         nmgp_Form_Num_Val($this->asig3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig3);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig4
   function NM_export_asig4()
   {
         nmgp_Form_Num_Val($this->asig4, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig4);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig5
   function NM_export_asig5()
   {
         nmgp_Form_Num_Val($this->asig5, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig5);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig6
   function NM_export_asig6()
   {
         nmgp_Form_Num_Val($this->asig6, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig6);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig7
   function NM_export_asig7()
   {
         nmgp_Form_Num_Val($this->asig7, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig7);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig8
   function NM_export_asig8()
   {
         nmgp_Form_Num_Val($this->asig8, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig8);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig9
   function NM_export_asig9()
   {
         nmgp_Form_Num_Val($this->asig9, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig9);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig10
   function NM_export_asig10()
   {
         nmgp_Form_Num_Val($this->asig10, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig10);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig11
   function NM_export_asig11()
   {
         nmgp_Form_Num_Val($this->asig11, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig11);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig12
   function NM_export_asig12()
   {
         nmgp_Form_Num_Val($this->asig12, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig12);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig13
   function NM_export_asig13()
   {
         nmgp_Form_Num_Val($this->asig13, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig13);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig14
   function NM_export_asig14()
   {
         nmgp_Form_Num_Val($this->asig14, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig14);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig15
   function NM_export_asig15()
   {
         nmgp_Form_Num_Val($this->asig15, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig15);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig16
   function NM_export_asig16()
   {
         nmgp_Form_Num_Val($this->asig16, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig16);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig17
   function NM_export_asig17()
   {
         nmgp_Form_Num_Val($this->asig17, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig17);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig18
   function NM_export_asig18()
   {
         nmgp_Form_Num_Val($this->asig18, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig18);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig19
   function NM_export_asig19()
   {
         nmgp_Form_Num_Val($this->asig19, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig19);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig20
   function NM_export_asig20()
   {
         nmgp_Form_Num_Val($this->asig20, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig20);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig21
   function NM_export_asig21()
   {
         nmgp_Form_Num_Val($this->asig21, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig21);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig22
   function NM_export_asig22()
   {
         nmgp_Form_Num_Val($this->asig22, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig22);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig23
   function NM_export_asig23()
   {
         nmgp_Form_Num_Val($this->asig23, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig23);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig24
   function NM_export_asig24()
   {
         nmgp_Form_Num_Val($this->asig24, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig24);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig25
   function NM_export_asig25()
   {
         nmgp_Form_Num_Val($this->asig25, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig25);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig26
   function NM_export_asig26()
   {
         nmgp_Form_Num_Val($this->asig26, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig26);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig27
   function NM_export_asig27()
   {
         nmgp_Form_Num_Val($this->asig27, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig27);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig28
   function NM_export_asig28()
   {
         nmgp_Form_Num_Val($this->asig28, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig28);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig29
   function NM_export_asig29()
   {
         nmgp_Form_Num_Val($this->asig29, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig29);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- asig30
   function NM_export_asig30()
   {
         nmgp_Form_Num_Val($this->asig30, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->asig30);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- id_grupo
   function NM_export_id_grupo()
   {
         nmgp_Form_Num_Val($this->id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->id_grupo);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE> <?php echo $_SESSION['par_nombre_institucion'] ?> :: CSV</TITLE>
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
<form name="Fdown" method="get" action="grid_t_evaluacion_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_t_evaluacion"> 
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
