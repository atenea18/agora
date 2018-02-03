<?php
class rid_t_evaluacion_vob_grid
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Tot;
   var $Lin_impressas;
   var $Lin_final;
   var $Rows_span;
   var $NM_colspan;
   var $rs_grid;
   var $nm_grid_ini;
   var $nm_grid_sem_reg;
   var $nm_prim_linha;
   var $Rec_ini;
   var $Rec_fim;
   var $nmgp_reg_start;
   var $nmgp_reg_inicial;
   var $nmgp_reg_final;
   var $SC_seq_register;
   var $SC_seq_page;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $NM_raiz_img; 
   var $Ind_lig_mult; 
   var $NM_opcao; 
   var $NM_flag_antigo; 
   var $nm_campos_cab = array();
   var $NM_cmp_hidden = array();
   var $nmgp_botoes = array();
   var $Cmps_ord_def = array();
   var $nmgp_label_quebras = array();
   var $nmgp_prim_pag_pdf;
   var $Campos_Mens_erro;
   var $Print_All;
   var $NM_field_over;
   var $NM_field_click;
   var $progress_fp;
   var $progress_tot;
   var $progress_now;
   var $progress_lim_tot;
   var $progress_lim_now;
   var $progress_lim_qtd;
   var $progress_grid;
   var $progress_pdf;
   var $progress_res;
   var $progress_graf;
   var $array_asig1 = array();
   var $array_asig2 = array();
   var $array_asig3 = array();
   var $array_asig4 = array();
   var $array_asig5 = array();
   var $array_asig6 = array();
   var $array_asig7 = array();
   var $array_asig8 = array();
   var $array_asig9 = array();
   var $array_asig10 = array();
   var $array_asig11 = array();
   var $array_asig12 = array();
   var $array_asig13 = array();
   var $array_asig14 = array();
   var $array_asig15 = array();
   var $array_asig16 = array();
   var $array_asig17 = array();
   var $array_asig18 = array();
   var $array_asig19 = array();
   var $array_asig20 = array();
   var $array_asig21 = array();
   var $array_asig22 = array();
   var $array_asig23 = array();
   var $array_asig24 = array();
   var $array_asig25 = array();
   var $array_asig26 = array();
   var $array_asig27 = array();
   var $array_asig28 = array();
   var $array_asig29 = array();
   var $array_asig30 = array();
   var $count_ger;
   var $asig1;
   var $asig2;
   var $asig3;
   var $asig4;
   var $asig5;
   var $asig6;
   var $asig7;
   var $asig8;
   var $asig9;
   var $asig10;
   var $asig11;
   var $asig12;
   var $asig13;
   var $asig14;
   var $asig15;
   var $asig16;
   var $asig17;
   var $asig18;
   var $asig19;
   var $asig20;
   var $asig21;
   var $asig22;
   var $asig23;
   var $asig24;
   var $asig25;
   var $asig26;
   var $asig27;
   var $asig28;
   var $asig29;
   var $asig30;
   var $id_estudiante;
   var $id_grupo;
//--- 
 function monta_grid($linhas = 0)
 {
   global $nm_saida;

   clearstatcache();
   $this->NM_cor_embutida();
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
       $this->nm_fim_grid();
   } 
   else 
   { 
       $this->cabecalho();
       $nm_saida->saida(" <TR>\r\n");
       $nm_saida->saida("  <TD id='sc_grid_content'  colspan=1>\r\n");
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['rid_t_evaluacion_vob'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'];
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_top();
           $this->nmgp_embbed_placeholder_top();
       } 
       $this->grid();
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_embbed_placeholder_bot();
           $this->nmgp_barra_bot();
       } 
       $nm_saida->saida("   </table>\r\n");
       $nm_saida->saida("  </TD>\r\n");
       $nm_saida->saida(" </TR>\r\n");
       $flag_apaga_pdf_log = TRUE;
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "pdf")
       { 
           $flag_apaga_pdf_log = FALSE;
       } 
       $this->nm_fim_grid($flag_apaga_pdf_log);
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "pdf")
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "igual";
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'];
 }
 function resume($linhas = 0)
 {
    $this->Lin_impressas = 0;
    $this->Lin_final     = FALSE;
    $this->grid($linhas);
 }
//--- 
 function inicializa()
 {
   global $nm_saida, $NM_run_iframe,
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det,
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->Ind_lig_mult = 0;
   $this->nm_data    = new nm_data("es");
   $this->Css_Cmp = array();
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['Lig_Md5'] = array();
   }
   $this->force_toolbar = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['force_toolbar']);
   } 
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['mostra_edit'] = "N";
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("rid_t_evaluacion_vob", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['group_2'] = "on";
   $this->nmgp_botoes['exit'] = "on";
   $this->nmgp_botoes['first'] = "off";
   $this->nmgp_botoes['back'] = "off";
   $this->nmgp_botoes['forward'] = "off";
   $this->nmgp_botoes['last'] = "off";
   $this->nmgp_botoes['pdf'] = "on";
   $this->nmgp_botoes['xls'] = "on";
   $this->nmgp_botoes['xml'] = "on";
   $this->nmgp_botoes['csv'] = "on";
   $this->nmgp_botoes['rtf'] = "on";
   $this->nmgp_botoes['word'] = "on";
   $this->nmgp_botoes['export'] = "on";
   $this->nmgp_botoes['print'] = "on";
   $this->nmgp_botoes['sel_col'] = "on";
   $this->nmgp_botoes['sort_col'] = "on";
   $this->nmgp_botoes['qsearch'] = "on";
   $this->nmgp_botoes['gantt'] = "on";
   $this->nmgp_botoes['groupby'] = "on";
   $this->nmgp_botoes['gridsave'] = "on";
   $this->Cmps_ord_def['id_estudiante'] = " desc";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['SC_Gb_Free_cmp']))
   { 
       $this->nmgp_botoes['summary'] = "off";
   } 
   $this->sc_proc_grid = false; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['doc_word'])
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->id_estudiante = $Busca_temp['id_estudiante']; 
       $tmp_pos = strpos($this->id_estudiante, "##@@");
       if ($tmp_pos !== false && !is_array($this->id_estudiante))
       {
           $this->id_estudiante = substr($this->id_estudiante, 0, $tmp_pos);
       }
       $id_estudiante_2 = $Busca_temp['id_estudiante_input_2']; 
       $this->id_estudiante_2 = $Busca_temp['id_estudiante_input_2']; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "muda_qt_linhas";
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "rid_t_evaluacion_vob_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_pdf'] != "pdf")  
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
       } 
       else 
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = "pdf";
       } 
   } 
   else 
   { 
       $this->nm_location = $_SESSION['scriptcase']['contr_link_emb'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new rid_t_evaluacion_vob_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_lin_grid'] = 10;
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_lin_grid']; 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_select'] = array(); 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_select']['primer_apellido'] = 'asc'; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_select']['segundo_apellido'] = 'asc'; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_select']['primer_nombre'] = 'asc'; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_select']['segundo_nombre'] = 'ASC'; 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "igual" ;  
       }
       elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_quebra'][$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "inicio" ;  
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_grid'] = ""; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_quebra'][$nmgp_ordem] == "asc") 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_quebra'][$nmgp_ordem] = "desc"; 
           }   
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_quebra'][$nmgp_ordem] = "asc"; 
           }   
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_cmp'] = $nmgp_ordem;  
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_quebra'][$nmgp_ordem]);  
       }   
       else   
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_grid'] = $nmgp_ordem  ; 
       }   
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_orig'] = " where id_grupo = " . $_SESSION['par_id_grupo'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao']       = "igual" ; 
   } 
// 
   $this->count_ger = 0;
   $this->Tot->quebra_geral() ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_total']);
       $this->Tot->quebra_geral() ; 
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['tot_geral'][1];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] > 0) 
   { 
       $this->nmgp_reg_start--; 
   } 
   $this->nm_grid_ini = $this->nmgp_reg_start + 1; 
   if ($this->nmgp_reg_start != 0) 
   { 
       $this->nm_grid_ini++;
   }  
//----- 
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
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->force_toolbar = true;
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
   else 
   { 
       $this->id_estudiante = $this->rs_grid->fields[0] ;  
       $this->id_estudiante = (string)$this->id_estudiante;
       $this->id_grupo = $this->rs_grid->fields[1] ;  
       $this->id_grupo = (string)$this->id_grupo;
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       $this->Lookup->lookup_asig1($this->asig1, $this->id_estudiante, $_SESSION['par_id_asig1'], $this->array_asig1); 
       $this->Lookup->lookup_asig2($this->asig2, $this->id_estudiante, $_SESSION['par_id_asig2'], $this->array_asig2); 
       $this->Lookup->lookup_asig3($this->asig3, $this->id_estudiante, $_SESSION['par_id_asig3'], $this->array_asig3); 
       $this->Lookup->lookup_asig4($this->asig4, $this->id_estudiante, $_SESSION['par_id_asig4'], $this->array_asig4); 
       $this->Lookup->lookup_asig5($this->asig5, $this->id_estudiante, $_SESSION['par_id_asig5'], $this->array_asig5); 
       $this->Lookup->lookup_asig6($this->asig6, $this->id_estudiante, $_SESSION['par_id_asig6'], $this->array_asig6); 
       $this->Lookup->lookup_asig7($this->asig7, $this->id_estudiante, $_SESSION['par_id_asig7'], $this->array_asig7); 
       $this->Lookup->lookup_asig8($this->asig8, $this->id_estudiante, $_SESSION['par_id_asig8'], $this->array_asig8); 
       $this->Lookup->lookup_asig9($this->asig9, $this->id_estudiante, $_SESSION['par_id_asig9'], $this->array_asig9); 
       $this->Lookup->lookup_asig10($this->asig10, $this->id_estudiante, $_SESSION['par_id_asig10'], $this->array_asig10); 
       $this->Lookup->lookup_asig11($this->asig11, $this->id_estudiante, $_SESSION['par_id_asig11'], $this->array_asig11); 
       $this->Lookup->lookup_asig12($this->asig12, $this->id_estudiante, $_SESSION['par_id_asig12'], $this->array_asig12); 
       $this->Lookup->lookup_asig13($this->asig13, $this->id_estudiante, $_SESSION['par_id_asig13'], $this->array_asig13); 
       $this->Lookup->lookup_asig14($this->asig14, $this->id_estudiante, $_SESSION['par_id_asig14'], $this->array_asig14); 
       $this->Lookup->lookup_asig15($this->asig15, $this->id_estudiante, $_SESSION['par_id_asig15'], $this->array_asig15); 
       $this->Lookup->lookup_asig16($this->asig16, $this->id_estudiante, $_SESSION['par_id_asig16'], $this->array_asig16); 
       $this->Lookup->lookup_asig17($this->asig17, $this->id_estudiante, $_SESSION['par_id_asig17'], $this->array_asig17); 
       $this->Lookup->lookup_asig18($this->asig18, $this->id_estudiante, $_SESSION['par_id_asig18'], $this->array_asig18); 
       $this->Lookup->lookup_asig19($this->asig19, $this->id_estudiante, $_SESSION['par_id_asig19'], $this->array_asig19); 
       $this->Lookup->lookup_asig20($this->asig20, $this->id_estudiante, $_SESSION['par_id_asig20'], $this->array_asig20); 
       $this->Lookup->lookup_asig21($this->asig21, $this->id_estudiante, $_SESSION['par_id_asig21'], $this->array_asig21); 
       $this->Lookup->lookup_asig22($this->asig22, $this->id_estudiante, $_SESSION['par_id_asig22'], $this->array_asig22); 
       $this->Lookup->lookup_asig23($this->asig23, $this->id_estudiante, $_SESSION['par_id_asig23'], $this->array_asig23); 
       $this->Lookup->lookup_asig24($this->asig24, $this->id_estudiante, $_SESSION['par_id_asig24'], $this->array_asig24); 
       $this->Lookup->lookup_asig25($this->asig25, $this->id_estudiante, $_SESSION['par_id_asig25'], $this->array_asig25); 
       $this->Lookup->lookup_asig26($this->asig26, $this->id_estudiante, $_SESSION['par_id_asig26'], $this->array_asig26); 
       $this->Lookup->lookup_asig27($this->asig27, $this->id_estudiante, $_SESSION['par_id_asig27'], $this->array_asig27); 
       $this->Lookup->lookup_asig28($this->asig28, $this->id_estudiante, $_SESSION['par_id_asig28'], $this->array_asig28); 
       $this->Lookup->lookup_asig29($this->asig29, $this->id_estudiante, $_SESSION['par_id_asig29'], $this->array_asig29); 
       $this->Lookup->lookup_asig30($this->asig30, $this->id_estudiante, $_SESSION['par_id_asig30'], $this->array_asig30); 
       $this->SC_sep_quebra = false;
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->id_estudiante = $this->rs_grid->fields[0] ;  
           $this->id_grupo = $this->rs_grid->fields[1] ;  
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Grupo - <?php echo $_SESSION['par_nombre_grupo'] ?> :: PDF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
           if ($_SESSION['scriptcase']['proc_mobile'])
           {
?>
              <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
           }
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
 <SCRIPT LANGUAGE="Javascript" SRC="<?php echo $this->Ini->path_js; ?>/nm_gauge.js"></SCRIPT>
</HEAD>
<BODY scrolling="no">
<table class="scGridTabela" style="padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;"><tr class="scGridFieldOddVert"><td>
<?php echo $this->Ini->Nm_lang['lang_pdff_gnrt']; ?>...<br>
<?php
           $this->progress_grid    = $this->rs_grid->RecordCount();
           $this->progress_pdf     = 0;
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['pivot_charts']) : 0;
           $this->progress_graf    = 0;
           $this->progress_tot     = 0;
           $this->progress_now     = 0;
           $this->progress_lim_tot = 0;
           $this->progress_lim_now = 0;
           if (-1 < $this->progress_grid)
           {
               $this->progress_lim_qtd = (250 < $this->progress_grid) ? 250 : $this->progress_grid;
               $this->progress_lim_tot = floor($this->progress_grid / $this->progress_lim_qtd);
               $this->progress_pdf     = floor($this->progress_grid * 0.25) + 1;
               $this->progress_tot     = $this->progress_grid + $this->progress_pdf + $this->progress_res + $this->progress_graf;
               $str_pbfile             = isset($_GET['pbfile']) ? urldecode($_GET['pbfile']) : $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
               $this->progress_fp      = fopen($str_pbfile, 'w');
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>Grupo - " . $_SESSION['par_nombre_grupo'] . "</TITLE>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
           $nm_saida->saida("   <meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;\" />\r\n");
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
       { 
           $css_body = "";
       } 
       else 
       { 
           $css_body = "margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;";
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
       { 
           $nm_saida->saida("   <form name=\"form_ajax_redir_1\" method=\"post\" style=\"display: none\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . session_id() . "\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $nm_saida->saida("   <form name=\"form_ajax_redir_2\" method=\"post\" style=\"display: none\"> \r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . session_id() . "\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"rid_t_evaluacion_vob_jquery.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"rid_t_evaluacion_vob_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var sc_ajaxBg = '" . $this->Ini->Color_bg_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordC = '" . $this->Ini->Border_c_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordS = '" . $this->Ini->Border_s_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordW = '" . $this->Ini->Border_w_ajax . "';\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery-ui.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery/css/smoothness/jquery-ui.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';</script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <style type=\"text/css\">\r\n");
           $nm_saida->saida("     #quicksearchph_top {\r\n");
           $nm_saida->saida("       position: relative;\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     #quicksearchph_top img {\r\n");
           $nm_saida->saida("       position: absolute;\r\n");
           $nm_saida->saida("       top: 0;\r\n");
           $nm_saida->saida("       right: 0;\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   </style>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           $nm_saida->saida("   var SC_Link_View = false;\r\n");
           if ($this->Ini->SC_Link_View)
           {
               $nm_saida->saida("   SC_Link_View = true;\r\n");
           }
           $nm_saida->saida("   var Qsearch_ok = true;\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] != "on")
           {
               $nm_saida->saida("   Qsearch_ok = false;\r\n");
           }
           $nm_saida->saida("   var scQSInit = true;\r\n");
           $nm_saida->saida("   var scQtReg  = " . NM_encode_input($this->count_ger) . ";\r\n");
           $nm_saida->saida("  function scSetFixedHeaders() {\r\n");
           $nm_saida->saida("   var divScroll, gridHeaders, headerPlaceholder;\r\n");
           $nm_saida->saida("   gridHeaders = $(\".sc-ui-grid-header-row-rid_t_evaluacion_vob-1\");\r\n");
           $nm_saida->saida("   headerPlaceholder = $(\"#sc-id-fixedheaders-placeholder\");\r\n");
           $nm_saida->saida("   scSetFixedHeadersContents(gridHeaders, headerPlaceholder);\r\n");
           $nm_saida->saida("   scSetFixedHeadersSize(gridHeaders);\r\n");
           $nm_saida->saida("   scSetFixedHeadersPosition(gridHeaders, headerPlaceholder);\r\n");
           $nm_saida->saida("   if (scIsHeaderVisible(gridHeaders)) {\r\n");
           $nm_saida->saida("    headerPlaceholder.hide();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   else {\r\n");
           $nm_saida->saida("    headerPlaceholder.show();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersPosition(gridHeaders, headerPlaceholder) {\r\n");
           $nm_saida->saida("   headerPlaceholder.css({\"top\": \"0\", \"left\": (Math.floor(gridHeaders.position().left) - $(document).scrollLeft()) + \"px\"});\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scIsHeaderVisible(gridHeaders) {\r\n");
           $nm_saida->saida("   return gridHeaders.offset().top > $(document).scrollTop();\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersContents(gridHeaders, headerPlaceholder) {\r\n");
           $nm_saida->saida("   var i, htmlContent;\r\n");
           $nm_saida->saida("   htmlContent = \"<table id=\\\"sc-id-fixed-headers\\\" class=\\\"scGridTabela\\\">\";\r\n");
           $nm_saida->saida("   for (i = 0; i < gridHeaders.length; i++) {\r\n");
           $nm_saida->saida("    htmlContent += \"<tr class=\\\"scGridLabel\\\" id=\\\"sc-id-fixed-headers-row-\" + i + \"\\\">\" + $(gridHeaders[i]).html() + \"</tr>\";\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   htmlContent += \"</table>\";\r\n");
           $nm_saida->saida("   headerPlaceholder.html(htmlContent);\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersSize(gridHeaders) {\r\n");
           $nm_saida->saida("   var i, j, headerColumns, gridColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;\r\n");
           $nm_saida->saida("   tableOriginal = $(\"#sc-ui-grid-body-760be750\");\r\n");
           $nm_saida->saida("   tableHeaders = document.getElementById(\"sc-id-fixed-headers\");\r\n");
           $nm_saida->saida("   $(tableHeaders).css(\"width\", $(tableOriginal).outerWidth());\r\n");
           $nm_saida->saida("   for (i = 0; i < gridHeaders.length; i++) {\r\n");
           $nm_saida->saida("    headerColumns = $(\"#sc-id-fixed-headers-row-\" + i).find(\"td\");\r\n");
           $nm_saida->saida("    gridColumns = $(gridHeaders[i]).find(\"td\");\r\n");
           $nm_saida->saida("    for (j = 0; j < gridColumns.length; j++) {\r\n");
           $nm_saida->saida("     if (window.getComputedStyle(gridColumns[j])) {\r\n");
           $nm_saida->saida("      cellWidth = window.getComputedStyle(gridColumns[j]).width;\r\n");
           $nm_saida->saida("      cellHeight = window.getComputedStyle(gridColumns[j]).height;\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else {\r\n");
           $nm_saida->saida("      cellWidth = $(gridColumns[j]).width() + \"px\";\r\n");
           $nm_saida->saida("      cellHeight = $(gridColumns[j]).height() + \"px\";\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $(headerColumns[j]).css({\r\n");
           $nm_saida->saida("      \"width\": cellWidth,\r\n");
           $nm_saida->saida("      \"height\": cellHeight\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function SC_init_jquery(isScrollNav){ \r\n");
           $nm_saida->saida("   \$(function(){ \r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     \$('#SC_fast_search_top').keyup(function(e) {\r\n");
               $nm_saida->saida("       scQuickSearchKeyUp('top', e);\r\n");
               $nm_saida->saida("     });\r\n");
           }
           $nm_saida->saida("     $('#id_F0_top').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#id_F0_bot').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpText\").mouseover(function() { $(this).addClass(\"scBtnGrpTextOver\"); }).mouseout(function() { $(this).removeClass(\"scBtnGrpTextOver\"); });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpClick\").find(\"a\").click(function(e){\r\n");
           $nm_saida->saida("        e.preventDefault();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpClick\").click(function(){\r\n");
           $nm_saida->saida("        var aObj = $(this).find(\"a\"), aHref = aObj.attr(\"href\");\r\n");
           $nm_saida->saida("        if (\"javascript:\" == aHref.substr(0, 11)) {\r\n");
           $nm_saida->saida("           eval(aHref.substr(11));\r\n");
           $nm_saida->saida("        }\r\n");
           $nm_saida->saida("        else {\r\n");
           $nm_saida->saida("           aObj.trigger(\"click\");\r\n");
           $nm_saida->saida("        }\r\n");
           $nm_saida->saida("      }).mouseover(function(){\r\n");
           $nm_saida->saida("        $(this).css(\"cursor\", \"pointer\");\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  SC_init_jquery(false);\r\n");
           $nm_saida->saida("   \$(window).load(function() {\r\n");
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               $nm_saida->saida("       $('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ancor_save'] . "').addClass('" . $this->css_scGridFieldOver . "');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ancor_save']);
           }
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     scQuickSearchInit(false, '');\r\n");
               $nm_saida->saida("     $('#SC_fast_search_top').listen();\r\n");
               $nm_saida->saida("     scQuickSearchKeyUp('top', null);\r\n");
               $nm_saida->saida("     scQSInit = false;\r\n");
           }
           $nm_saida->saida("   });\r\n");
           $nm_saida->saida("   function scQuickSearchSubmit_top() {\r\n");
           $nm_saida->saida("     document.F0_top.nmgp_opcao.value = 'fast_search';\r\n");
           $nm_saida->saida("     document.F0_top.submit();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scQuickSearchInit(bPosOnly, sPos) {\r\n");
           $nm_saida->saida("     if (!bPosOnly) {\r\n");
           $nm_saida->saida("       if ('' == sPos || 'top' == sPos) scQuickSearchSize('SC_fast_search_top', 'SC_fast_search_close_top', 'SC_fast_search_submit_top', 'quicksearchph_top');\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {\r\n");
           $nm_saida->saida("     if($('#' + sIdInput).length)\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("         var oInput = $('#' + sIdInput),\r\n");
           $nm_saida->saida("             oClose = $('#' + sIdClose),\r\n");
           $nm_saida->saida("             oSubmit = $('#' + sIdSubmit),\r\n");
           $nm_saida->saida("             oPlace = $('#' + sPlaceHolder),\r\n");
           $nm_saida->saida("             iInputP = parseInt(oInput.css('padding-right')) || 0,\r\n");
           $nm_saida->saida("             iInputB = parseInt(oInput.css('border-right-width')) || 0,\r\n");
           $nm_saida->saida("             iInputW = oInput.outerWidth(),\r\n");
           $nm_saida->saida("             iPlaceW = oPlace.outerWidth(),\r\n");
           $nm_saida->saida("             oInputO = oInput.offset(),\r\n");
           $nm_saida->saida("             oPlaceO = oPlace.offset(),\r\n");
           $nm_saida->saida("             iNewRight;\r\n");
           $nm_saida->saida("         iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;\r\n");
           $nm_saida->saida("         oInput.css({\r\n");
           $nm_saida->saida("           'height': Math.max(oInput.height(), 16) + 'px',\r\n");
           $nm_saida->saida("           'padding-right': iInputP + 16 + " . $this->Ini->Str_qs_image_padding . " + 'px'\r\n");
           $nm_saida->saida("         });\r\n");
           $nm_saida->saida("         oClose.css({\r\n");
           $nm_saida->saida("           'right': iNewRight + " . $this->Ini->Str_qs_image_padding . " + 'px',\r\n");
           $nm_saida->saida("           'cursor': 'pointer'\r\n");
           $nm_saida->saida("         });\r\n");
           $nm_saida->saida("         oSubmit.css({\r\n");
           $nm_saida->saida("           'right': iNewRight + " . $this->Ini->Str_qs_image_padding . " + 'px',\r\n");
           $nm_saida->saida("           'cursor': 'pointer'\r\n");
           $nm_saida->saida("         });\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scQuickSearchKeyUp(sPos, e) {\r\n");
           $nm_saida->saida("    if(typeof scQSInitVal !== 'undefined')\r\n");
           $nm_saida->saida("    {\r\n");
           $nm_saida->saida("     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {\r\n");
           $nm_saida->saida("       $('#SC_fast_search_close_' + sPos).show();\r\n");
           $nm_saida->saida("       $('#SC_fast_search_submit_' + sPos).hide();\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else {\r\n");
           $nm_saida->saida("       $('#SC_fast_search_close_' + sPos).hide();\r\n");
           $nm_saida->saida("       $('#SC_fast_search_submit_' + sPos).show();\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     if (null != e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("         if ('top' == sPos) nm_gp_submit_qsearch('top');\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).success(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSaveGridShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).success(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSaveGridHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_save_grid_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_save_grid_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).success(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).success(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   var scBtnGrpStatus = {};\r\n");
           $nm_saida->saida("   function scBtnGrpShow(sGroup) {\r\n");
           $nm_saida->saida("     var btnPos = $('#sc_btgp_btn_' + sGroup).offset();\r\n");
           $nm_saida->saida("     scBtnGrpStatus[sGroup] = 'open';\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).mouseout(function() {\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup + ' span a').click(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       scBtnGrpHide(sGroup);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup).css({\r\n");
           $nm_saida->saida("       'left': btnPos.left\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseleave(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .show('fast');\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpHide(sGroup) {\r\n");
           $nm_saida->saida("     if ('over' != scBtnGrpStatus[sGroup]) {\r\n");
           $nm_saida->saida("       $('#sc_btgp_div_' + sGroup).hide('fast');\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   </script> \r\n");
       } 
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] && !$this->Print_All && $this->NM_opcao != "print" && $this->NM_opcao != "pdf")
       {
           $write_css = false;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_rid_t_evaluacion_vob_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
       {
           $this->NM_field_over  = 0;
           $this->NM_field_click = 0;
           $Css_sub_cons = array();
           if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           else 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           if (is_file($this->Ini->path_css . $NM_css_file))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (is_file($this->Ini->path_css . $NM_css_dir))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (!empty($Css_sub_cons))
           {
               $Css_sub_cons = array_unique($Css_sub_cons);
               foreach ($Css_sub_cons as $Cada_css_sub)
               {
                   if (is_file($this->Ini->path_css . $Cada_css_sub))
                   {
                       $compl_css = str_replace(".", "_", $Cada_css_sub);
                       $temp_css  = explode("/", $compl_css);
                       if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
                       $NM_css_attr = file($this->Ini->path_css . $Cada_css_sub);
                       foreach ($NM_css_attr as $NM_line_css)
                       {
                           $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                           if ($write_css) {@fwrite($NM_css, "    ." .  $compl_css . "_" . substr(trim($NM_line_css), 1) . "\r\n");}
                       }
                   }
               }
           }
       }
       if ($write_css) {@fclose($NM_css);}
           $this->NM_css_val_embed .= "win";
           $this->NM_css_ajx_embed .= "ult_set";
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       elseif ($this->NM_opcao == "print" || $this->Print_All)
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_rid_t_evaluacion_vob_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['num_css'] . '.css');
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("  </style>\r\n");
       }
       else
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_rid_t_evaluacion_vob_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_grid_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
           $nm_saida->saida("  </style>\r\n");
       }
       $nm_saida->saida("  </HEAD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".rid_t_evaluacion_vob_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
       $nm_saida->saida("  <body class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $css_body . "\">\r\n");
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none; position: absolute; left: 50px; top: 50px\"><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "pdf" && !$this->Print_All)
       { 
           $nm_saida->saida("      <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
   }  
 }  
 function NM_cor_embutida()
 {  
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   {
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['rid_t_evaluacion_vob']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['rid_t_evaluacion_vob']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['rid_t_evaluacion_vob']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['rid_t_evaluacion_vob']) . "_";
           } 
       }
   }
   $temp_css  = explode("/", $compl_css);
   if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
   $this->css_scGridPage           = $compl_css . "scGridPage";
   $this->css_scGridPageLink       = $compl_css . "scGridPageLink";
   $this->css_scGridToolbar        = $compl_css . "scGridToolbar";
   $this->css_scGridToolbarPadd    = $compl_css . "scGridToolbarPadding";
   $this->css_css_toolbar_obj      = $compl_css . "css_toolbar_obj";
   $this->css_scGridHeader         = $compl_css . "scGridHeader";
   $this->css_scGridHeaderFont     = $compl_css . "scGridHeaderFont";
   $this->css_scGridFooter         = $compl_css . "scGridFooter";
   $this->css_scGridFooterFont     = $compl_css . "scGridFooterFont";
   $this->css_scGridBlock          = $compl_css . "scGridBlock";
   $this->css_scGridBlockFont      = $compl_css . "scGridBlockFont";
   $this->css_scGridBlockAlign     = $compl_css . "scGridBlockAlign";
   $this->css_scGridTotal          = $compl_css . "scGridTotal";
   $this->css_scGridTotalFont      = $compl_css . "scGridTotalFont";
   $this->css_scGridSubtotal       = $compl_css . "scGridSubtotal";
   $this->css_scGridSubtotalFont   = $compl_css . "scGridSubtotalFont";
   $this->css_scGridFieldEven      = $compl_css . "scGridFieldEven";
   $this->css_scGridFieldEvenFont  = $compl_css . "scGridFieldEvenFont";
   $this->css_scGridFieldEvenVert  = $compl_css . "scGridFieldEvenVert";
   $this->css_scGridFieldEvenLink  = $compl_css . "scGridFieldEvenLink";
   $this->css_scGridFieldOdd       = $compl_css . "scGridFieldOdd";
   $this->css_scGridFieldOddFont   = $compl_css . "scGridFieldOddFont";
   $this->css_scGridFieldOddVert   = $compl_css . "scGridFieldOddVert";
   $this->css_scGridFieldOddLink   = $compl_css . "scGridFieldOddLink";
   $this->css_scGridFieldClick     = $compl_css . "scGridFieldClick";
   $this->css_scGridFieldOver      = $compl_css . "scGridFieldOver";
   $this->css_scGridLabel          = $compl_css . "scGridLabel";
   $this->css_scGridLabelVert      = $compl_css . "scGridLabelVert";
   $this->css_scGridLabelFont      = $compl_css . "scGridLabelFont";
   $this->css_scGridLabelLink      = $compl_css . "scGridLabelLink";
   $this->css_scGridTabela         = $compl_css . "scGridTabela";
   $this->css_scGridTabelaTd       = $compl_css . "scGridTabelaTd";
   $this->css_scGridBlockBg        = $compl_css . "scGridBlockBg";
   $this->css_scGridBlockLineBg    = $compl_css . "scGridBlockLineBg";
   $this->css_scGridBlockSpaceBg   = $compl_css . "scGridBlockSpaceBg";
   $this->css_scGridLabelNowrap    = "";
   $this->css_scAppDivMoldura      = $compl_css . "scAppDivMoldura";
   $this->css_scAppDivHeader       = $compl_css . "scAppDivHeader";
   $this->css_scAppDivHeaderText   = $compl_css . "scAppDivHeaderText";
   $this->css_scAppDivContent      = $compl_css . "scAppDivContent";
   $this->css_scAppDivContentText  = $compl_css . "scAppDivContentText";
   $this->css_scAppDivToolbar      = $compl_css . "scAppDivToolbar";
   $this->css_scAppDivToolbarInput = $compl_css . "scAppDivToolbarInput";

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida']) ? "rid_t_evaluacion_vob_" : "";
   $this->css_sep = " ";
   $this->css_id_estudiante_label = $compl_css_emb . "css_id_estudiante_label";
   $this->css_id_estudiante_grid_line = $compl_css_emb . "css_id_estudiante_grid_line";
   $this->css_asig1_label = $compl_css_emb . "css_asig1_label";
   $this->css_asig1_grid_line = $compl_css_emb . "css_asig1_grid_line";
   $this->css_asig2_label = $compl_css_emb . "css_asig2_label";
   $this->css_asig2_grid_line = $compl_css_emb . "css_asig2_grid_line";
   $this->css_asig3_label = $compl_css_emb . "css_asig3_label";
   $this->css_asig3_grid_line = $compl_css_emb . "css_asig3_grid_line";
   $this->css_asig4_label = $compl_css_emb . "css_asig4_label";
   $this->css_asig4_grid_line = $compl_css_emb . "css_asig4_grid_line";
   $this->css_asig5_label = $compl_css_emb . "css_asig5_label";
   $this->css_asig5_grid_line = $compl_css_emb . "css_asig5_grid_line";
   $this->css_asig6_label = $compl_css_emb . "css_asig6_label";
   $this->css_asig6_grid_line = $compl_css_emb . "css_asig6_grid_line";
   $this->css_asig7_label = $compl_css_emb . "css_asig7_label";
   $this->css_asig7_grid_line = $compl_css_emb . "css_asig7_grid_line";
   $this->css_asig8_label = $compl_css_emb . "css_asig8_label";
   $this->css_asig8_grid_line = $compl_css_emb . "css_asig8_grid_line";
   $this->css_asig9_label = $compl_css_emb . "css_asig9_label";
   $this->css_asig9_grid_line = $compl_css_emb . "css_asig9_grid_line";
   $this->css_asig10_label = $compl_css_emb . "css_asig10_label";
   $this->css_asig10_grid_line = $compl_css_emb . "css_asig10_grid_line";
   $this->css_asig11_label = $compl_css_emb . "css_asig11_label";
   $this->css_asig11_grid_line = $compl_css_emb . "css_asig11_grid_line";
   $this->css_asig12_label = $compl_css_emb . "css_asig12_label";
   $this->css_asig12_grid_line = $compl_css_emb . "css_asig12_grid_line";
   $this->css_asig13_label = $compl_css_emb . "css_asig13_label";
   $this->css_asig13_grid_line = $compl_css_emb . "css_asig13_grid_line";
   $this->css_asig14_label = $compl_css_emb . "css_asig14_label";
   $this->css_asig14_grid_line = $compl_css_emb . "css_asig14_grid_line";
   $this->css_asig15_label = $compl_css_emb . "css_asig15_label";
   $this->css_asig15_grid_line = $compl_css_emb . "css_asig15_grid_line";
   $this->css_asig16_label = $compl_css_emb . "css_asig16_label";
   $this->css_asig16_grid_line = $compl_css_emb . "css_asig16_grid_line";
   $this->css_asig17_label = $compl_css_emb . "css_asig17_label";
   $this->css_asig17_grid_line = $compl_css_emb . "css_asig17_grid_line";
   $this->css_asig18_label = $compl_css_emb . "css_asig18_label";
   $this->css_asig18_grid_line = $compl_css_emb . "css_asig18_grid_line";
   $this->css_asig19_label = $compl_css_emb . "css_asig19_label";
   $this->css_asig19_grid_line = $compl_css_emb . "css_asig19_grid_line";
   $this->css_asig20_label = $compl_css_emb . "css_asig20_label";
   $this->css_asig20_grid_line = $compl_css_emb . "css_asig20_grid_line";
   $this->css_asig21_label = $compl_css_emb . "css_asig21_label";
   $this->css_asig21_grid_line = $compl_css_emb . "css_asig21_grid_line";
   $this->css_asig22_label = $compl_css_emb . "css_asig22_label";
   $this->css_asig22_grid_line = $compl_css_emb . "css_asig22_grid_line";
   $this->css_asig23_label = $compl_css_emb . "css_asig23_label";
   $this->css_asig23_grid_line = $compl_css_emb . "css_asig23_grid_line";
   $this->css_asig24_label = $compl_css_emb . "css_asig24_label";
   $this->css_asig24_grid_line = $compl_css_emb . "css_asig24_grid_line";
   $this->css_asig25_label = $compl_css_emb . "css_asig25_label";
   $this->css_asig25_grid_line = $compl_css_emb . "css_asig25_grid_line";
   $this->css_asig26_label = $compl_css_emb . "css_asig26_label";
   $this->css_asig26_grid_line = $compl_css_emb . "css_asig26_grid_line";
   $this->css_asig27_label = $compl_css_emb . "css_asig27_label";
   $this->css_asig27_grid_line = $compl_css_emb . "css_asig27_grid_line";
   $this->css_asig28_label = $compl_css_emb . "css_asig28_label";
   $this->css_asig28_grid_line = $compl_css_emb . "css_asig28_grid_line";
   $this->css_asig29_label = $compl_css_emb . "css_asig29_label";
   $this->css_asig29_grid_line = $compl_css_emb . "css_asig29_grid_line";
   $this->css_asig30_label = $compl_css_emb . "css_asig30_label";
   $this->css_asig30_grid_line = $compl_css_emb . "css_asig30_grid_line";
 }  
// 
//----- 
 function cabecalho()
 {
   global
          $nm_saida;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_liga']['cab']))
   {
       return; 
   }
   $nm_cab_filtro   = ""; 
   $nm_cab_filtrobr = ""; 
   $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
   $Lim   = strlen($Str_date);
   $Ult   = "";
   $Arr_D = array();
   for ($I = 0; $I < $Lim; $I++)
   {
       $Char = substr($Str_date, $I, 1);
       if ($Char != $Ult)
       {
           $Arr_D[] = $Char;
       }
       $Ult = $Char;
   }
   $Prim = true;
   $Str  = "";
   foreach ($Arr_D as $Cada_d)
   {
       $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
       $Str .= $Cada_d;
       $Prim = false;
   }
   $Str = str_replace("a", "Y", $Str);
   $Str = str_replace("y", "Y", $Str);
   $nm_data_fixa = date($Str); 
   $this->sc_proc_grid = false; 
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cond_pesq'];
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cond_pesq'], 0, $trab_pos);
       $nm_cab_filtrobr = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and . "<br />", $nm_cab_filtro);
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $nm_cab_filtro;
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       if ($trab_pos === false)
       {
       }
       else  
       {  
          $nm_cab_filtro = substr($nm_cab_filtro, 0, $trab_pos) . " " .  $nm_cond_filtro_or . $nm_cond_filtro_and . substr($nm_cab_filtro, $trab_pos + 5);
          $nm_cab_filtro = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and, $nm_cab_filtro);
       }   
   }   
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $nm_saida->saida(" <TR id=\"sc_grid_head\">\r\n");
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sv_dt_head']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sv_dt_head'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sv_dt_head']['fix'] = $nm_data_fixa;
       $nm_refresch_cab_rod = true;
   } 
   else 
   { 
       $nm_refresch_cab_rod = false;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sv_dt_head'] as $ind => $val)
   {
       $tmp_var = "sc_data_cab" . $ind;
       if ($$tmp_var != $val)
       {
           $nm_refresch_cab_rod = true;
           break;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sv_dt_head']['fix'] != $nm_data_fixa)
   {
       $nm_refresch_cab_rod = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'] && $nm_refresch_cab_rod)
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sv_dt_head']['fix'] = $nm_data_fixa;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
   } 
   else 
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
   } 
   $nm_saida->saida("<style>\r\n");
   $nm_saida->saida("#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 \r\n");
   $nm_saida->saida("#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}\r\n");
   $nm_saida->saida("</style>\r\n");
   $nm_saida->saida("<div style=\"width: 100%\">\r\n");
   $nm_saida->saida(" <div class=\"" . $this->css_scGridHeader . "\" style=\"height:11px; display: block; border-width:0px; \"></div>\r\n");
   $nm_saida->saida(" <div style=\"height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block\">\r\n");
   $nm_saida->saida(" 	<table style=\"width:100%; border-collapse:collapse; padding:0;\">\r\n");
   $nm_saida->saida("    	<tr>\r\n");
   $nm_saida->saida("        	<td id=\"lin1_col1\" class=\"" . $this->css_scGridHeaderFont . "\"><span>Grupo - " . $_SESSION['par_nombre_grupo'] . "</span></td>\r\n");
   $nm_saida->saida("            <td id=\"lin1_col2\" class=\"" . $this->css_scGridHeaderFont . "\"><span>" . $nm_data_fixa . "</span></td>\r\n");
   $nm_saida->saida("        </tr>\r\n");
   $nm_saida->saida("    </table>		 \r\n");
   $nm_saida->saida(" </div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'] && $nm_refresch_cab_rod)
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_head', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida(" </TR>\r\n");
 }
// 
 function label_grid($linhas = 0)
 {
   global 
           $nm_saida;
   static $nm_seq_titulos   = 0; 
   $contr_embutida = false;
   $salva_htm_emb  = "";
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   $tmp_header_row = $nm_seq_titulos;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_label'])
      { 
          if (!isset($_SESSION['scriptcase']['saida_var']) || !$_SESSION['scriptcase']['saida_var']) 
          { 
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $contr_embutida = true;
          } 
          else 
          { 
              $salva_htm_emb = $_SESSION['scriptcase']['saida_html'];
              $_SESSION['scriptcase']['saida_html'] = "";
          } 
      } 
   $nm_saida->saida("    <TR id=\"tit_rid_t_evaluacion_vob__SCCS__" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . " sc-ui-grid-header-row sc-ui-grid-header-row-rid_t_evaluacion_vob-" . $tmp_header_row . "\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig30_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_label'])
     { 
         if (isset($_SESSION['scriptcase']['saida_var']) && $_SESSION['scriptcase']['saida_var'])
         { 
             $Cod_Html = $_SESSION['scriptcase']['saida_html'];
             $pos_tag = strpos($Cod_Html, "<TD ");
             $Cod_Html = substr($Cod_Html, $pos_tag);
             $pos      = 0;
             $pos_tag  = false;
             $pos_tmp  = true; 
             $tmp      = $Cod_Html;
             while ($pos_tmp)
             {
                $pos = strpos($tmp, "</TR>", $pos);
                if ($pos !== false)
                {
                    $pos_tag = $pos;
                    $pos += 4;
                }
                else
                {
                    $pos_tmp = false;
                }
             }
             $Cod_Html = substr($Cod_Html, 0, $pos_tag);
             $Nm_temp = explode("</TD>", $Cod_Html);
             $css_emb = "<style type=\"text/css\">";
             $NM_css = file($this->Ini->root . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
             foreach ($NM_css as $cada_css)
             {
                 $css_emb .= ".rid_t_evaluacion_vob_" . substr($cada_css, 1);
             }
             $css_emb .= "</style>";
             $Cod_Html = $css_emb . $Cod_Html;
             $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cols_emb'] = count($Nm_temp) - 1;
             if ($contr_embutida) 
             { 
                 $_SESSION['scriptcase']['saida_var']  = false;
                 $nm_saida->saida($Cod_Html);
             } 
             else 
             { 
                 $_SESSION['scriptcase']['saida_html'] = $salva_htm_emb . $Cod_Html;
             } 
         } 
     } 
     $NM_seq_lab = 1;
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_id_estudiante()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['id_estudiante'])) ? $this->New_label['id_estudiante'] : "Estudiante"; 
   if (!isset($this->NM_cmp_hidden['id_estudiante']) || $this->NM_cmp_hidden['id_estudiante'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_id_estudiante_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_id_estudiante_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_cmp'] == 'id_estudiante')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = nl2br($SC_Label) . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<IMG style=\"float: right\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG style=\"float: left\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('id_estudiante')\" class=\"" . $this->css_scGridLabelLink . "\">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_asig1()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig1'])) ? $this->New_label['asig1'] : "" . $_SESSION['par_assig1'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig1']) || $this->NM_cmp_hidden['asig1'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig1_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig1_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig2()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig2'])) ? $this->New_label['asig2'] : "" . $_SESSION['par_assig2'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig2']) || $this->NM_cmp_hidden['asig2'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig2_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig2_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig3()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig3'])) ? $this->New_label['asig3'] : "" . $_SESSION['par_assig3'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig3']) || $this->NM_cmp_hidden['asig3'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig3_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig3_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig4()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig4'])) ? $this->New_label['asig4'] : "" . $_SESSION['par_assig4'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig4']) || $this->NM_cmp_hidden['asig4'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig4_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig4_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig5()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig5'])) ? $this->New_label['asig5'] : "" . $_SESSION['par_assig5'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig5']) || $this->NM_cmp_hidden['asig5'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig5_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig5_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig6()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig6'])) ? $this->New_label['asig6'] : "" . $_SESSION['par_assig6'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig6']) || $this->NM_cmp_hidden['asig6'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig6_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig6_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig7()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig7'])) ? $this->New_label['asig7'] : "" . $_SESSION['par_assig7'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig7']) || $this->NM_cmp_hidden['asig7'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig7_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig7_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig8()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig8'])) ? $this->New_label['asig8'] : "" . $_SESSION['par_assig8'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig8']) || $this->NM_cmp_hidden['asig8'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig8_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig8_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig9()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig9'])) ? $this->New_label['asig9'] : "" . $_SESSION['par_assig9'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig9']) || $this->NM_cmp_hidden['asig9'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig9_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig9_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig10()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig10'])) ? $this->New_label['asig10'] : "" . $_SESSION['par_assig10'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig10']) || $this->NM_cmp_hidden['asig10'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig10_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig10_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig11()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig11'])) ? $this->New_label['asig11'] : "" . $_SESSION['par_assig11'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig11']) || $this->NM_cmp_hidden['asig11'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig11_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig11_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig12()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig12'])) ? $this->New_label['asig12'] : "" . $_SESSION['par_assig12'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig12']) || $this->NM_cmp_hidden['asig12'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig12_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig12_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig13()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig13'])) ? $this->New_label['asig13'] : "" . $_SESSION['par_assig13'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig13']) || $this->NM_cmp_hidden['asig13'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig13_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig13_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig14()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig14'])) ? $this->New_label['asig14'] : "" . $_SESSION['par_assig14'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig14']) || $this->NM_cmp_hidden['asig14'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig14_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig14_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig15()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig15'])) ? $this->New_label['asig15'] : "" . $_SESSION['par_assig15'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig15']) || $this->NM_cmp_hidden['asig15'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig15_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig15_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig16()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig16'])) ? $this->New_label['asig16'] : "" . $_SESSION['par_assig16'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig16']) || $this->NM_cmp_hidden['asig16'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig16_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig16_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig17()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig17'])) ? $this->New_label['asig17'] : "" . $_SESSION['par_assig17'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig17']) || $this->NM_cmp_hidden['asig17'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig17_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig17_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig18()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig18'])) ? $this->New_label['asig18'] : "" . $_SESSION['par_assig18'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig18']) || $this->NM_cmp_hidden['asig18'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig18_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig18_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig19()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig19'])) ? $this->New_label['asig19'] : "" . $_SESSION['par_assig19'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig19']) || $this->NM_cmp_hidden['asig19'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig19_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig19_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig20()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig20'])) ? $this->New_label['asig20'] : "" . $_SESSION['par_assig20'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig20']) || $this->NM_cmp_hidden['asig20'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig20_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig20_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig21()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig21'])) ? $this->New_label['asig21'] : "" . $_SESSION['par_assig21'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig21']) || $this->NM_cmp_hidden['asig21'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig21_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig21_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig22()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig22'])) ? $this->New_label['asig22'] : "" . $_SESSION['par_assig22'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig22']) || $this->NM_cmp_hidden['asig22'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig22_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig22_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig23()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig23'])) ? $this->New_label['asig23'] : "" . $_SESSION['par_assig23'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig23']) || $this->NM_cmp_hidden['asig23'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig23_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig23_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig24()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig24'])) ? $this->New_label['asig24'] : "" . $_SESSION['par_assig24'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig24']) || $this->NM_cmp_hidden['asig24'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig24_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig24_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig25()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig25'])) ? $this->New_label['asig25'] : "" . $_SESSION['par_assig25'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig25']) || $this->NM_cmp_hidden['asig25'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig25_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig25_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig26()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig26'])) ? $this->New_label['asig26'] : "" . $_SESSION['par_assig26'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig26']) || $this->NM_cmp_hidden['asig26'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig26_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig26_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig27()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig27'])) ? $this->New_label['asig27'] : "" . $_SESSION['par_assig27'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig27']) || $this->NM_cmp_hidden['asig27'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig27_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig27_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig28()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig28'])) ? $this->New_label['asig28'] : "" . $_SESSION['par_assig28'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig28']) || $this->NM_cmp_hidden['asig28'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig28_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig28_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig29()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig29'])) ? $this->New_label['asig29'] : "" . $_SESSION['par_assig29'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig29']) || $this->NM_cmp_hidden['asig29'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig29_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig29_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asig30()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asig30'])) ? $this->New_label['asig30'] : "" . $_SESSION['par_assig30'] . ""; 
   if (!isset($this->NM_cmp_hidden['asig30']) || $this->NM_cmp_hidden['asig30'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asig30_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asig30_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida;
   $fecha_tr               = "</tr>";
   $this->Ini->qual_linha  = "par";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ini_cor_grid']);
       }
   }
   static $nm_seq_execucoes = 0; 
   static $nm_seq_titulos   = 0; 
   $this->SC_ancora = "";
   $this->Rows_span = 1;
   $nm_seq_execucoes++; 
   $nm_seq_titulos++; 
   $this->nm_prim_linha  = true; 
   $this->Ini->nm_cont_lin = 0; 
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['where_pesq_filtro'];
// 
   $SC_Label = (isset($this->New_label['id_estudiante'])) ? $this->New_label['id_estudiante'] : "Estudiante"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['id_estudiante'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig1'])) ? $this->New_label['asig1'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig1'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig2'])) ? $this->New_label['asig2'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig2'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig3'])) ? $this->New_label['asig3'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig3'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig4'])) ? $this->New_label['asig4'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig4'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig5'])) ? $this->New_label['asig5'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig5'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig6'])) ? $this->New_label['asig6'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig6'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig7'])) ? $this->New_label['asig7'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig7'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig8'])) ? $this->New_label['asig8'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig8'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig9'])) ? $this->New_label['asig9'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig9'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig10'])) ? $this->New_label['asig10'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig10'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig11'])) ? $this->New_label['asig11'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig11'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig12'])) ? $this->New_label['asig12'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig12'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig13'])) ? $this->New_label['asig13'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig13'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig14'])) ? $this->New_label['asig14'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig14'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig15'])) ? $this->New_label['asig15'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig15'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig16'])) ? $this->New_label['asig16'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig16'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig17'])) ? $this->New_label['asig17'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig17'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig18'])) ? $this->New_label['asig18'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig18'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig19'])) ? $this->New_label['asig19'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig19'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig20'])) ? $this->New_label['asig20'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig20'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig21'])) ? $this->New_label['asig21'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig21'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig22'])) ? $this->New_label['asig22'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig22'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig23'])) ? $this->New_label['asig23'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig23'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig24'])) ? $this->New_label['asig24'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig24'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig25'])) ? $this->New_label['asig25'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig25'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig26'])) ? $this->New_label['asig26'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig26'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig27'])) ? $this->New_label['asig27'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig27'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig28'])) ? $this->New_label['asig28'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig28'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig29'])) ? $this->New_label['asig29'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig29'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asig30'])) ? $this->New_label['asig30'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['labels']['asig30'] = $SC_Label; 
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['rid_t_evaluacion_vob']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_rid_t_evaluacion_vob#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cab_embutida'] != "S")
               {
                   $this->label_grid($linhas);
               }
               $this->NM_calc_span();
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridFieldOdd . "\"  style=\"padding: 0px; font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\" colspan = \"" . $this->NM_colspan . "\" align=\"center\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "\r\n");
               $nm_saida->saida("  </td></tr>\r\n");
               $nm_saida->saida("  </table></td></tr></table>\r\n");
               $this->Lin_final = $this->rs_grid->EOF;
               if ($this->Lin_final)
               {
                   $this->rs_grid->Close();
               }
           }
       }
       else
       {
           $nm_saida->saida(" <TR> \r\n");
           $nm_saida->saida("  <td id=\"sc_grid_body\" class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_rid_t_evaluacion_vob#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = " id=\"apl_rid_t_evaluacion_vob#?#1\"";
   } 
   $nm_saida->saida("  <TD id=\"sc_grid_body\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-760be750\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['cab_embutida'] != "S" )
      { 
          $this->label_grid($linhas);
      } 
   } 
   else 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final'] = 0;
   } 
   $this->nmgp_prim_pag_pdf = false;
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   $ini_grid = true;
   while (!$this->rs_grid->EOF && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 1;
          $this->NM_field_style = array();
          //---------- Gauge ----------
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->id_estudiante = $this->rs_grid->fields[0] ;  
          $this->id_estudiante = (string)$this->id_estudiante;
          $this->id_grupo = $this->rs_grid->fields[1] ;  
          $this->id_grupo = (string)$this->id_grupo;
          $this->SC_seq_page++; 
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final'] + 1; 
          if (!$ini_grid) {
              $this->SC_sep_quebra = true;
          }
          else {
              $ini_grid = false;
          }
          $this->Lookup->lookup_asig1($this->asig1, $this->id_estudiante, $_SESSION['par_id_asig1'], $this->array_asig1); 
          $this->Lookup->lookup_asig2($this->asig2, $this->id_estudiante, $_SESSION['par_id_asig2'], $this->array_asig2); 
          $this->Lookup->lookup_asig3($this->asig3, $this->id_estudiante, $_SESSION['par_id_asig3'], $this->array_asig3); 
          $this->Lookup->lookup_asig4($this->asig4, $this->id_estudiante, $_SESSION['par_id_asig4'], $this->array_asig4); 
          $this->Lookup->lookup_asig5($this->asig5, $this->id_estudiante, $_SESSION['par_id_asig5'], $this->array_asig5); 
          $this->Lookup->lookup_asig6($this->asig6, $this->id_estudiante, $_SESSION['par_id_asig6'], $this->array_asig6); 
          $this->Lookup->lookup_asig7($this->asig7, $this->id_estudiante, $_SESSION['par_id_asig7'], $this->array_asig7); 
          $this->Lookup->lookup_asig8($this->asig8, $this->id_estudiante, $_SESSION['par_id_asig8'], $this->array_asig8); 
          $this->Lookup->lookup_asig9($this->asig9, $this->id_estudiante, $_SESSION['par_id_asig9'], $this->array_asig9); 
          $this->Lookup->lookup_asig10($this->asig10, $this->id_estudiante, $_SESSION['par_id_asig10'], $this->array_asig10); 
          $this->Lookup->lookup_asig11($this->asig11, $this->id_estudiante, $_SESSION['par_id_asig11'], $this->array_asig11); 
          $this->Lookup->lookup_asig12($this->asig12, $this->id_estudiante, $_SESSION['par_id_asig12'], $this->array_asig12); 
          $this->Lookup->lookup_asig13($this->asig13, $this->id_estudiante, $_SESSION['par_id_asig13'], $this->array_asig13); 
          $this->Lookup->lookup_asig14($this->asig14, $this->id_estudiante, $_SESSION['par_id_asig14'], $this->array_asig14); 
          $this->Lookup->lookup_asig15($this->asig15, $this->id_estudiante, $_SESSION['par_id_asig15'], $this->array_asig15); 
          $this->Lookup->lookup_asig16($this->asig16, $this->id_estudiante, $_SESSION['par_id_asig16'], $this->array_asig16); 
          $this->Lookup->lookup_asig17($this->asig17, $this->id_estudiante, $_SESSION['par_id_asig17'], $this->array_asig17); 
          $this->Lookup->lookup_asig18($this->asig18, $this->id_estudiante, $_SESSION['par_id_asig18'], $this->array_asig18); 
          $this->Lookup->lookup_asig19($this->asig19, $this->id_estudiante, $_SESSION['par_id_asig19'], $this->array_asig19); 
          $this->Lookup->lookup_asig20($this->asig20, $this->id_estudiante, $_SESSION['par_id_asig20'], $this->array_asig20); 
          $this->Lookup->lookup_asig21($this->asig21, $this->id_estudiante, $_SESSION['par_id_asig21'], $this->array_asig21); 
          $this->Lookup->lookup_asig22($this->asig22, $this->id_estudiante, $_SESSION['par_id_asig22'], $this->array_asig22); 
          $this->Lookup->lookup_asig23($this->asig23, $this->id_estudiante, $_SESSION['par_id_asig23'], $this->array_asig23); 
          $this->Lookup->lookup_asig24($this->asig24, $this->id_estudiante, $_SESSION['par_id_asig24'], $this->array_asig24); 
          $this->Lookup->lookup_asig25($this->asig25, $this->id_estudiante, $_SESSION['par_id_asig25'], $this->array_asig25); 
          $this->Lookup->lookup_asig26($this->asig26, $this->id_estudiante, $_SESSION['par_id_asig26'], $this->array_asig26); 
          $this->Lookup->lookup_asig27($this->asig27, $this->id_estudiante, $_SESSION['par_id_asig27'], $this->array_asig27); 
          $this->Lookup->lookup_asig28($this->asig28, $this->id_estudiante, $_SESSION['par_id_asig28'], $this->array_asig28); 
          $this->Lookup->lookup_asig29($this->asig29, $this->id_estudiante, $_SESSION['par_id_asig29'], $this->array_asig29); 
          $this->Lookup->lookup_asig30($this->asig30, $this->id_estudiante, $_SESSION['par_id_asig30'], $this->array_asig30); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['rows_emb']++;
          $this->sc_proc_grid = true;
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
          $nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['final']; 
          $this->Ini->cor_link_dados = ($this->Ini->cor_link_dados == $this->css_scGridFieldOddLink) ? $this->css_scGridFieldEvenLink : $this->css_scGridFieldOddLink; 
          $this->Ini->qual_linha   = ($this->Ini->qual_linha == "par") ? "impar" : "par";
          if ("impar" == $this->Ini->qual_linha)
          {
              $this->css_line_back = $this->css_scGridFieldOdd;
              $this->css_line_fonf = $this->css_scGridFieldOddFont;
          }
          else
          {
              $this->css_line_back = $this->css_scGridFieldEven;
              $this->css_line_fonf = $this->css_scGridFieldEvenFont;
          }
          $NM_destaque = " onmouseover=\"over_tr(this, '" . $this->css_line_back . "');\" onmouseout=\"out_tr(this, '" . $this->css_line_back . "');\" onclick=\"click_tr(this, '" . $this->css_line_back . "');\"";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
          }
          $this->SC_ancora = $this->SC_seq_page;
          $nm_saida->saida("    <TR  class=\"" . $this->css_line_back . "\"" . $NM_destaque . " id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_asig30_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\">\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "pdf" || isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_liga']['paginacao']))
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
      $this->Lin_final = $this->rs_grid->EOF;
      if ($this->Lin_final)
      {
         $this->rs_grid->Close();
      }
   } 
   else
   {
      $this->rs_grid->Close();
   }
   if ($this->rs_grid->EOF) 
   { 
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['exibe_total'] == "S")
       { 
           $this->quebra_geral_top() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida_grid'])
   { 
       return; 
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_id_estudiante()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['id_estudiante']) || $this->NM_cmp_hidden['id_estudiante'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->id_estudiante)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_id_estudiante($conteudo , $this->id_estudiante) ; 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_id_estudiante_grid_line . "\"  style=\"" . $this->Css_Cmp['css_id_estudiante_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_id_estudiante_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig1()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig1']) || $this->NM_cmp_hidden['asig1'] != "off") { 
          $conteudo = sc_strip_script($this->asig1); 
          $conteudo = trim($this->asig1); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig1_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig1_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig1_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig2()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig2']) || $this->NM_cmp_hidden['asig2'] != "off") { 
          $conteudo = sc_strip_script($this->asig2); 
          $conteudo = trim($this->asig2); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig2_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig2_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig2_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig3()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig3']) || $this->NM_cmp_hidden['asig3'] != "off") { 
          $conteudo = sc_strip_script($this->asig3); 
          $conteudo = trim($this->asig3); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig3_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig3_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig3_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig4()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig4']) || $this->NM_cmp_hidden['asig4'] != "off") { 
          $conteudo = sc_strip_script($this->asig4); 
          $conteudo = trim($this->asig4); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig4_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig4_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig4_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig5()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig5']) || $this->NM_cmp_hidden['asig5'] != "off") { 
          $conteudo = sc_strip_script($this->asig5); 
          $conteudo = trim($this->asig5); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig5_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig5_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig5_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig6()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig6']) || $this->NM_cmp_hidden['asig6'] != "off") { 
          $conteudo = sc_strip_script($this->asig6); 
          $conteudo = trim($this->asig6); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig6_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig6_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig6_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig7()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig7']) || $this->NM_cmp_hidden['asig7'] != "off") { 
          $conteudo = sc_strip_script($this->asig7); 
          $conteudo = trim($this->asig7); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig7_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig7_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig7_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig8()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig8']) || $this->NM_cmp_hidden['asig8'] != "off") { 
          $conteudo = sc_strip_script($this->asig8); 
          $conteudo = trim($this->asig8); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig8_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig8_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig8_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig9()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig9']) || $this->NM_cmp_hidden['asig9'] != "off") { 
          $conteudo = sc_strip_script($this->asig9); 
          $conteudo = trim($this->asig9); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig9_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig9_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig9_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig10()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig10']) || $this->NM_cmp_hidden['asig10'] != "off") { 
          $conteudo = sc_strip_script($this->asig10); 
          $conteudo = trim($this->asig10); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig10_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig10_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig10_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig11()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig11']) || $this->NM_cmp_hidden['asig11'] != "off") { 
          $conteudo = sc_strip_script($this->asig11); 
          $conteudo = trim($this->asig11); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig11_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig11_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig11_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig12()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig12']) || $this->NM_cmp_hidden['asig12'] != "off") { 
          $conteudo = sc_strip_script($this->asig12); 
          $conteudo = trim($this->asig12); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig12_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig12_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig12_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig13()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig13']) || $this->NM_cmp_hidden['asig13'] != "off") { 
          $conteudo = sc_strip_script($this->asig13); 
          $conteudo = trim($this->asig13); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig13_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig13_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig13_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig14()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig14']) || $this->NM_cmp_hidden['asig14'] != "off") { 
          $conteudo = sc_strip_script($this->asig14); 
          $conteudo = trim($this->asig14); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig14_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig14_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig14_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig15()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig15']) || $this->NM_cmp_hidden['asig15'] != "off") { 
          $conteudo = sc_strip_script($this->asig15); 
          $conteudo = trim($this->asig15); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig15_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig15_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig15_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig16()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig16']) || $this->NM_cmp_hidden['asig16'] != "off") { 
          $conteudo = sc_strip_script($this->asig16); 
          $conteudo = trim($this->asig16); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig16_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig16_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig16_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig17()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig17']) || $this->NM_cmp_hidden['asig17'] != "off") { 
          $conteudo = sc_strip_script($this->asig17); 
          $conteudo = trim($this->asig17); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig17_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig17_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig17_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig18()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig18']) || $this->NM_cmp_hidden['asig18'] != "off") { 
          $conteudo = sc_strip_script($this->asig18); 
          $conteudo = trim($this->asig18); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig18_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig18_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig18_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig19()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig19']) || $this->NM_cmp_hidden['asig19'] != "off") { 
          $conteudo = sc_strip_script($this->asig19); 
          $conteudo = trim($this->asig19); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig19_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig19_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig19_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig20()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig20']) || $this->NM_cmp_hidden['asig20'] != "off") { 
          $conteudo = sc_strip_script($this->asig20); 
          $conteudo = trim($this->asig20); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig20_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig20_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig20_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig21()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig21']) || $this->NM_cmp_hidden['asig21'] != "off") { 
          $conteudo = sc_strip_script($this->asig21); 
          $conteudo = trim($this->asig21); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig21_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig21_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig21_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig22()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig22']) || $this->NM_cmp_hidden['asig22'] != "off") { 
          $conteudo = sc_strip_script($this->asig22); 
          $conteudo = trim($this->asig22); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig22_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig22_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig22_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig23()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig23']) || $this->NM_cmp_hidden['asig23'] != "off") { 
          $conteudo = sc_strip_script($this->asig23); 
          $conteudo = trim($this->asig23); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig23_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig23_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig23_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig24()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig24']) || $this->NM_cmp_hidden['asig24'] != "off") { 
          $conteudo = sc_strip_script($this->asig24); 
          $conteudo = trim($this->asig24); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig24_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig24_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig24_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig25()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig25']) || $this->NM_cmp_hidden['asig25'] != "off") { 
          $conteudo = sc_strip_script($this->asig25); 
          $conteudo = trim($this->asig25); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig25_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig25_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig25_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig26()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig26']) || $this->NM_cmp_hidden['asig26'] != "off") { 
          $conteudo = sc_strip_script($this->asig26); 
          $conteudo = trim($this->asig26); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig26_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig26_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig26_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig27()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig27']) || $this->NM_cmp_hidden['asig27'] != "off") { 
          $conteudo = sc_strip_script($this->asig27); 
          $conteudo = trim($this->asig27); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig27_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig27_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig27_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig28()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig28']) || $this->NM_cmp_hidden['asig28'] != "off") { 
          $conteudo = sc_strip_script($this->asig28); 
          $conteudo = trim($this->asig28); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig28_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig28_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig28_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig29()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig29']) || $this->NM_cmp_hidden['asig29'] != "off") { 
          $conteudo = sc_strip_script($this->asig29); 
          $conteudo = trim($this->asig29); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig29_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig29_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig29_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asig30()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asig30']) || $this->NM_cmp_hidden['asig30'] != "off") { 
          $conteudo = sc_strip_script($this->asig30); 
          $conteudo = trim($this->asig30); 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asig30_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asig30_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asig30_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 31;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'])
   {
       $this->NM_colspan++;
   }
   foreach ($this->NM_cmp_hidden as $Cmp => $Hidden)
   {
       if ($Hidden == "off")
       {
           $this->NM_colspan--;
       }
   }
 }
 function quebra_geral_top() 
 {
   global $nm_saida; 
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
   function nmgp_barra_top_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=hidden id=\"script_session_f0_top\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'][2] : "";
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
          {
              $this->Ini->Arr_result['setVar'][] = array('var' => 'change_fast_top', 'value' => "");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <input type=\"hidden\" id=\"cond_fast_search_f0_top\" name=\"nmgp_cond_fast_search\" value=\"qp\">\r\n");
          $nm_saida->saida("          <script type=\"text/javascript\">var scQSInitVal = \"" . addslashes($OPC_dat) . "\";</script>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\">\r\n");
          $nm_saida->saida("           <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"10\" onChange=\"change_fast_top = 'CH';\" alt=\"{watermark:'" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "', watermarkClass:'css_toolbar_objWm', maxLength: 255}\">\r\n");
          $nm_saida->saida("           <img style=\"display: none\" id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = ''; nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("           <img style=\"display: none\" id=\"SC_fast_search_submit_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("          </span>\r\n");
          $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if (is_file("rid_t_evaluacion_vob_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("rid_t_evaluacion_vob_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full)
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'])
      {
         if ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='$nm_url_saida'; document.F5.submit()", "document.F5.action='$nm_url_saida'; document.F5.submit()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
         elseif (!$this->Ini->SC_Link_View && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "document.F5.action='$nm_url_saida'; document.F5.submit()", "document.F5.action='$nm_url_saida'; document.F5.submit()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
      }
      elseif ($this->nmgp_botoes['exit'] == "on")
      {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_modal'])
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "self.parent.tb_remove()", "self.parent.tb_remove()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
        }
        else
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "window.close()", "window.close()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
        }
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "scBtnSelCamposShow('" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $UseAlias =  "S";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "scBtnOrderCamposShow('" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn = true;
          $nm_saida->saida("           <table style=\"border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000\" id=\"sc_btgp_div_group_1_top\">\r\n");
              $nm_saida->saida("           <tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=XX&largura=1200&conf_larg=S&conf_fonte=10&grafico=XX&language=es&conf_socor=S&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_config_word.php?nm_cor=AM&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_move('xls', '0')", "nm_gp_move('xls', '0')", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "nm_gp_move('xml', '0')", "nm_gp_move('xml', '0')", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "nm_gp_move('csv', '0')", "nm_gp_move('csv', '0')", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_move('rtf', '0')", "nm_gp_move('rtf', '0')", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_config_print.php?nm_opc=AM&nm_cor=AM&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr>\r\n");
          $nm_saida->saida("           </table>\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid))
      {
          if ($NM_btn)
          {
              $NM_btn = false;
              $NM_ult_sep = "NM_sep_1";
              $nm_saida->saida("          <img id=\"NM_sep_1\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_top', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_bot_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn = false;
      $this->NM_calc_span();
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=hidden id=\"script_session_f0_bot\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_print'] != "print") 
      {
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if (empty($this->nm_grid_sem_reg))
          {
              $nm_sumario = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
              $nm_sumario = str_replace("?start?", $this->nmgp_reg_inicial, $nm_sumario);
              $nm_sumario = str_replace("?final?", $this->count_ger, $nm_sumario);
              $nm_sumario = str_replace("?total?", $this->count_ger, $nm_sumario);
              $nm_saida->saida("           <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border:0px;\">" . $nm_sumario . "</span>\r\n");
              $NM_btn = true;
          }
          if (is_file("rid_t_evaluacion_vob_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("rid_t_evaluacion_vob_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_bot', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top_mobile()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=hidden id=\"script_session_f0_top\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['fast_search'][2] : "";
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
          {
              $this->Ini->Arr_result['setVar'][] = array('var' => 'change_fast_top', 'value' => "");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <input type=\"hidden\" id=\"cond_fast_search_f0_top\" name=\"nmgp_cond_fast_search\" value=\"qp\">\r\n");
          $nm_saida->saida("          <script type=\"text/javascript\">var scQSInitVal = \"" . addslashes($OPC_dat) . "\";</script>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\">\r\n");
          $nm_saida->saida("           <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"10\" onChange=\"change_fast_top = 'CH';\" alt=\"{watermark:'" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "', watermarkClass:'css_toolbar_objWm', maxLength: 255}\">\r\n");
          $nm_saida->saida("           <img style=\"display: none\" id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = ''; nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("           <img style=\"display: none\" id=\"SC_fast_search_submit_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("          </span>\r\n");
          $NM_btn = true;
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn = true;
          $nm_saida->saida("           <table style=\"border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000\" id=\"sc_btgp_div_group_1_top\">\r\n");
              $nm_saida->saida("           <tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=XX&largura=1200&conf_larg=S&conf_fonte=10&grafico=XX&language=es&conf_socor=S&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_config_word.php?nm_cor=AM&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_move('xls', '0')", "nm_gp_move('xls', '0')", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "nm_gp_move('xml', '0')", "nm_gp_move('xml', '0')", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "nm_gp_move('csv', '0')", "nm_gp_move('csv', '0')", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_move('rtf', '0')", "nm_gp_move('rtf', '0')", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_config_print.php?nm_opc=AM&nm_cor=AM&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr>\r\n");
          $nm_saida->saida("           </table>\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['group_2'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_2_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_top')", "scBtnGrpShow('group_2_top')", "sc_btgp_btn_group_2_top", "", "" . $this->Ini->Nm_lang['lang_btns_settings'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_settings'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn = true;
          $nm_saida->saida("           <table style=\"border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000\" id=\"sc_btgp_div_group_2_top\">\r\n");
              $nm_saida->saida("           <tr><td class=\"scBtnGrpBackground\">\r\n");
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "scBtnSelCamposShow('" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $UseAlias =  "S";
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "scBtnOrderCamposShow('" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $nm_saida->saida("           </td></tr>\r\n");
          $nm_saida->saida("           </table>\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_2_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_2_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if (is_file("rid_t_evaluacion_vob_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("rid_t_evaluacion_vob_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_top', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_bot_mobile()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn = false;
      $this->NM_calc_span();
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=hidden id=\"script_session_f0_bot\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg))
          {
              $nm_sumario = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
              $nm_sumario = str_replace("?start?", $this->nmgp_reg_inicial, $nm_sumario);
              $nm_sumario = str_replace("?final?", $this->count_ger, $nm_sumario);
              $nm_sumario = str_replace("?total?", $this->count_ger, $nm_sumario);
              $nm_saida->saida("           <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border:0px;\">" . $nm_sumario . "</span>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if (is_file("rid_t_evaluacion_vob_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("rid_t_evaluacion_vob_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_bot', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top()
   {
       if(isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_barra_top_mobile();
       }
       else
       {
           $this->nmgp_barra_top_normal();
       }
   }
   function nmgp_barra_bot()
   {
       if(isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_barra_bot_mobile();
       }
       else
       {
           $this->nmgp_barra_bot_normal();
       }
   }
   function nmgp_embbed_placeholder_top()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   function nmgp_embbed_placeholder_bot()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
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
 function check_btns()
 {
 }
 function nm_fim_grid($flag_apaga_pdf_log = TRUE)
 {
   global
   $nm_saida, $nm_url_saida, $NMSC_modal;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
        return;
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   <div id=\"sc-id-fixedheaders-placeholder\" style=\"display: none; position: fixed; top: 0\"></div>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['embutida'])
   { 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']))
       {
           $temp = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               $temp[] = $NM_aplic;
           }
           $temp = array_unique($temp);
           foreach ($temp as $NM_aplic)
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
               { 
                   $this->Ini->Arr_result['setArr'][] = array('var' => ' NM_tab_' . $NM_aplic, 'value' => '');
               } 
               $nm_saida->saida("   NM_tab_" . $NM_aplic . " = new Array();\r\n");
           }
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               foreach ($resto as $NM_ind => $NM_quebra)
               {
                   foreach ($NM_quebra as $NM_nivel => $NM_tipo)
                   {
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
                       { 
                           $this->Ini->Arr_result['setVar'][] = array('var' => ' NM_tab_' . $NM_aplic . '[' . $NM_ind . ']', 'value' => $NM_tipo . $NM_nivel);
                       } 
                       $nm_saida->saida("   NM_tab_" . $NM_aplic . "[" . $NM_ind . "] = '" . $NM_tipo . $NM_nivel . "';\r\n");
                   }
               }
           }
       }
   }
   $nm_saida->saida("   function NM_liga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = parseInt (Obj[tbody].substr(3));\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = parseInt (Obj[ind].substr(3));\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if (Nivel == Nv && Tp == 'top')\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if (((Nivel + 1) == Nv && Tp == 'top') || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='';\r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_apaga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = Obj[tbody].substr(3);\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = Obj[ind].substr(3);\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if ((Nivel == Nv && Tp == 'top') || Nv < Nivel)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if ((Nivel != Nv) || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='none';\r\n");
   $nm_saida->saida("               if (Tp == 'top')\r\n");
   $nm_saida->saida("               {\r\n");
   $nm_saida->saida("                   document.getElementById('b_open_' + Apl + '_' + ind).style.display='';\r\n");
   $nm_saida->saida("                   document.getElementById('b_close_' + Apl + '_' + ind).style.display='none';\r\n");
   $nm_saida->saida("               } \r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   NM_obj_ant = '';\r\n");
   $nm_saida->saida("   function NM_apaga_div_lig(obj_nome)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      if (NM_obj_ant != '')\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_obj_ant.style.display='none';\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      obj = document.getElementById(obj_nome);\r\n");
   $nm_saida->saida("      NM_obj_ant = obj;\r\n");
   $nm_saida->saida("      ind_time = setTimeout(\"obj.style.display='none'\", 300);\r\n");
   $nm_saida->saida("      return ind_time;\r\n");
   $nm_saida->saida("   }\r\n");
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   if (@is_file($str_pbfile) && $flag_apaga_pdf_log)
   {
      @unlink($str_pbfile);
   }
   $nm_saida->saida("  $(window).scroll(function() {\r\n");
   $nm_saida->saida("   scSetFixedHeaders();\r\n");
   $nm_saida->saida("  }).resize(function() {\r\n");
   $nm_saida->saida("   scSetFixedHeaders();\r\n");
   $nm_saida->saida("  });\r\n");
   if (isset($this->redir_modal) && !empty($this->redir_modal))
   {
       echo $this->redir_modal;
   }
   $nm_saida->saida("   </script>\r\n");
   if ($this->grid_emb_form || $this->grid_emb_form_full)
   {
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("      parent.scAjaxDetailHeight('rid_t_evaluacion_vob', $(document).innerHeight());\r\n");
       $nm_saida->saida("   </script>\r\n");
   }
   $nm_saida->saida("   </HTML>\r\n");
 }
//--- 
//--- 
 function form_navegacao()
 {
   global
   $nm_saida, $nm_url_saida;
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   $nm_saida->saida("   <form name=\"F3\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_chave\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_ordem\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"rid_t_evaluacion_vob\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parm_acum\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_quant_linhas\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_pdf\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_orig_pesq\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F4\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"rec\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"rec\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_call_php\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F5\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"rid_t_evaluacion_vob_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("  <form name=\"Fdoc_word\" method=\"post\" \r\n");
   $nm_saida->saida("        action=\"./\" \r\n");
   $nm_saida->saida("        target=\"_self\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"doc_word\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_word\" value=\"AM\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_navegator_print\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"> \r\n");
   $nm_saida->saida("  </form> \r\n");
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("    document.Fdoc_word.nmgp_navegator_print.value = navigator.appName;\r\n");
   $nm_saida->saida("   function nm_gp_word_conf(cor)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("       document.Fdoc_word.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var obj_tr      = \"\";\r\n");
   $nm_saida->saida("   var css_tr      = \"\";\r\n");
   $nm_saida->saida("   var field_over  = " . $this->NM_field_over . ";\r\n");
   $nm_saida->saida("   var field_click = " . $this->NM_field_click . ";\r\n");
   $nm_saida->saida("   function over_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldOver . "';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function out_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = class_obj;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function click_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_click != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr != \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr.className = css_tr;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr     = '';\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj_tr        = obj;\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldClick . "';\r\n");
   $nm_saida->saida("   }\r\n");
   if ($this->Rec_ini == 0)
   {
       $nm_saida->saida("   nm_gp_ini = \"ini\";\r\n");
   }
   else
   {
       $nm_saida->saida("   nm_gp_ini = \"\";\r\n");
   }
   $nm_saida->saida("   nm_gp_rec_ini = \"" . $this->Rec_ini . "\";\r\n");
   $nm_saida->saida("   nm_gp_rec_fim = \"" . $this->Rec_fim . "\";\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['ajax_nav'])
   {
       if ($this->Rec_ini == 0)
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "ini");
       }
       else
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "");
       }
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_ini', 'value' => $this->Rec_ini);
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_fim', 'value' => $this->Rec_fim);
   }
   $nm_saida->saida("   function nm_gp_submit_rec(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (nm_gp_ini == \"ini\" && (campo == \"ini\" || campo == nm_gp_rec_ini)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      if (nm_gp_fim == \"fim\" && (campo == \"fim\" || campo == nm_gp_rec_fim)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"rec\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit_qsearch(pos) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      var out_qsearch = \"\";\r\n");
   $nm_saida->saida("       out_qsearch = document.getElementById('fast_search_f0_' + pos).value;\r\n");
   $nm_saida->saida("       out_qsearch += \"_SCQS_\" + document.getElementById('cond_fast_search_f0_' + pos).value;\r\n");
   $nm_saida->saida("       out_qsearch += \"_SCQS_\" + document.getElementById('SC_fast_search_' + pos).value;\r\n");
   $nm_saida->saida("       ajax_navigate('fast_search', out_qsearch); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit_ajax(opc, parm) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      ajax_navigate(opc, parm); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit2(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"ordem\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit3(parms, parm_acum, opc, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target               = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parm_acum.value = parm_acum ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value     = opc ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action               = \"./\"  ;\r\n");
   $nm_saida->saida("      if (ancor != null) {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_submit_modal(parms, t_parent) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (t_parent == 'S' && typeof parent.tb_show == 'function')\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("           parent.tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("         tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_move(tipo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F6.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F6.submit() ;\r\n");
   $nm_saida->saida("      return;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       document.F3.action           = \"./\"  ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_parms.value = \"SC_null\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_orig_pesq.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_url_saida.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_opcao.value = x; \r\n");
   $nm_saida->saida("       document.F3.nmgp_outra_jan.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.target = \"_self\"; \r\n");
   $nm_saida->saida("       if (y == 1) \r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.target = \"_blank\"; \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"busca\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.nmgp_orig_pesq.value = z; \r\n");
   $nm_saida->saida("           z = '';\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (z != null && z != '') \r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.F3.nmgp_tipo_pdf.value = z; \r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (\"xls\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   if (!extension_loaded("zip"))
   {
       $nm_saida->saida("           alert (\"" . html_entity_decode($this->Ini->Nm_lang['lang_othr_prod_xtzp'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\");\r\n");
       $nm_saida->saida("           return false;\r\n");
   } 
   $nm_saida->saida("       }\r\n");
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['rid_t_evaluacion_vob_iframe_params'] = array(
       'str_tmp'    => $this->Ini->path_imag_temp,
       'str_prod'   => $this->Ini->path_prod,
       'str_btn'    => $this->Ini->Str_btn_css,
       'str_lang'   => $this->Ini->str_lang,
       'str_schema' => $this->Ini->str_schema_all,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?script_case_session?#?" . session_id() . "?@?pbfile?#?" . $str_pbfile . "?@?jspath?#?" . $this->Ini->path_js . "?@?sc_apbgcol?#?" . $this->Ini->path_css . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@rid_t_evaluacion_vob@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           window.location = \"" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_graf_pdf=\" + g;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if ((x == 'igual' || x == 'edit') && NM_ancor_ult_lig != \"\")\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("                ajax_save_ancor(\"F3\", NM_ancor_ult_lig);\r\n");
   $nm_saida->saida("                NM_ancor_ult_lig = \"\";\r\n");
   $nm_saida->saida("            } else {\r\n");
   $nm_saida->saida("                document.F3.submit() ;\r\n");
   $nm_saida->saida("            } \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       window.open('" . $this->Ini->path_link . "rid_t_evaluacion_vob/rid_t_evaluacion_vob_iframe_prt.php?path_botoes=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&opcao=print&tp_print=' + tp + '&cor_print=' + cor,'','location=no,menubar,resizable,scrollbars,status=no,toolbar');\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   nm_img = new Image();\r\n");
   $nm_saida->saida("   function nm_mostra_img(imagem, altura, largura)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       tb_show(\"\", imagem, \"\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2, campo3, campo4)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       while (campo2.lastIndexOf(\"&\") != -1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          campo2 = campo2.replace(\"&\" , \"**Ecom**\");\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       while (campo2.lastIndexOf(\"#\") != -1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          campo2 = campo2.replace(\"#\" , \"**Jvel**\");\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       while (campo2.lastIndexOf(\"+\") != -1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          campo2 = campo2.replace(\"+\" , \"**Plus**\");\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       NovaJanela = window.open (campo4 + \"?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&nm_cod_doc=\" + campo1 + \"&nm_nome_doc=\" + campo2 + \"&nm_cod_apl=\" + campo3, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_escreve_window()\r\n");
   $nm_saida->saida("   {\r\n");
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campo_psq_ret']))
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$script_case_init]['rid_t_evaluacion_vob']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Doc = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Doc = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Doc = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['campo_psq_ret'] . "\");\r\n");
          $nm_saida->saida("          }\r\n");
      }
          $nm_saida->saida("          else\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = null;\r\n");
          $nm_saida->saida("          }\r\n");
      $nm_saida->saida("          if (Obj_Form.value != document.Fpesq.nm_ret_psq.value)\r\n");
      $nm_saida->saida("          {\r\n");
      $nm_saida->saida("              Obj_Form.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              if (null != Obj_Readonly)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Readonly.innerHTML = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['js_apos_busca'] . "();\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              else if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
     else
     {
      $nm_saida->saida("              if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
      $nm_saida->saida("          }\r\n");
      $nm_saida->saida("      }\r\n");
   }
   $nm_saida->saida("      document.F5.action = \"rid_t_evaluacion_vob_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['rid_t_evaluacion_vob']['reg_start']))
   {
       $nm_saida->saida("      parent.scAjaxDetailStatus('rid_t_evaluacion_vob');\r\n");
       $nm_saida->saida("      parent.scAjaxDetailHeight('rid_t_evaluacion_vob', $(document).innerHeight());\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
 }
}
?>
