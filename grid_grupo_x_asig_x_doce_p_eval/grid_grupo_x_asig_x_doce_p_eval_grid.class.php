<?php
class grid_grupo_x_asig_x_doce_p_eval_grid
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
   var $count_ger;
   var $crea_desempeno;
   var $sc_field_0;
   var $evalua_periodo;
   var $evlua_periodom2;
   var $evlua_periodom3;
   var $evlua_periodom4;
   var $evlua_periodom5;
   var $evlua_periodom6;
   var $evalua_periodo1_m7;
   var $evalua_periodom8;
   var $evalua_disc_confam;
   var $evalua_periodo1_mo9;
   var $evalua_periodom10;
   var $evalua_p1_m11;
   var $evalua_disciplina;
   var $evalua_periodomp1;
   var $evalua_tec_iti;
   var $evalua_periodo_tran;
   var $obs_asig;
   var $eval_pendiente;
   var $ref_acade;
   var $enviar_tarea;
   var $director_grupo;
   var $boton_superar;
   var $evalua_pp;
   var $evaluar;
   var $asignatu;
   var $obs_genrales_periodo;
   var $superaciones;
   var $t_grupos_id_grado;
   var $grupo_x_asig_x_doce_id_asignatura;
   var $grupo_x_asig_x_doce_id_grupo;
   var $grupo_x_asig_x_doce_id_area;
   var $t_grupos_id_director_grupo;
   var $grupo_x_asig_x_doce_id_docente;
   var $grupo_x_asig_x_doce_tipo_asig;
//--- 
 function monta_grid($linhas = 0)
 {
   global $nm_saida;

   clearstatcache();
   $this->NM_cor_embutida();
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
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
       $nm_saida->saida("  <TD id='sc_grid_content'  colspan=3>\r\n");
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_grupo_x_asig_x_doce_p_eval'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'];
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
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "pdf")
       { 
           $flag_apaga_pdf_log = FALSE;
       } 
       $this->nm_fim_grid($flag_apaga_pdf_log);
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "pdf")
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "igual";
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'];
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
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'] = array();
   }
   $this->force_toolbar = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['force_toolbar']);
   } 
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['mostra_edit'] = "N";
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_grupo_x_asig_x_doce_p_eval", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
   $this->nmgp_botoes['SC_btn_0'] = "on";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['SC_Gb_Free_cmp']))
   { 
       $this->nmgp_botoes['summary'] = "off";
   } 
   $this->sc_proc_grid = false; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['doc_word'])
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "muda_qt_linhas";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_grupo_x_asig_x_doce_p_eval_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_pdf'] != "pdf")  
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new grid_grupo_x_asig_x_doce_p_eval_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_lin_grid'] = 10;
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_lin_grid']; 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "igual" ;  
       }
       elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_quebra'][$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "inicio" ;  
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_grid'] = ""; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_quebra'][$nmgp_ordem] == "asc") 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_quebra'][$nmgp_ordem] = "desc"; 
           }   
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_quebra'][$nmgp_ordem] = "asc"; 
           }   
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_cmp'] = $nmgp_ordem;  
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_quebra'][$nmgp_ordem]);  
       }   
       else   
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_grid'] = $nmgp_ordem  ; 
       }   
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_orig'] = " where docentes.login = '" . $_SESSION['usr_login'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao']       = "igual" ; 
   } 
// 
   $this->count_ger = 0;
   $this->Tot->quebra_geral() ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_total']);
       $this->Tot->quebra_geral() ; 
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['tot_geral'][1];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] > 0) 
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
       $nmgp_select = "SELECT t_grupos.id_grado as t_grupos_id_grado, grupo_x_asig_x_doce.id_asignatura as cmp_maior_30_1, grupo_x_asig_x_doce.id_grupo as grupo_x_asig_x_doce_id_grupo, grupo_x_asig_x_doce.id_area as grupo_x_asig_x_doce_id_area, t_grupos.id_director_grupo as t_grupos_id_director_grupo, grupo_x_asig_x_doce.id_docente as grupo_x_asig_x_doce_id_docente, grupo_x_asig_x_doce.tipo_asig as grupo_x_asig_x_doce_tipo_asig from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT t_grupos.id_grado as t_grupos_id_grado, grupo_x_asig_x_doce.id_asignatura as cmp_maior_30_1, grupo_x_asig_x_doce.id_grupo as grupo_x_asig_x_doce_id_grupo, grupo_x_asig_x_doce.id_area as grupo_x_asig_x_doce_id_area, t_grupos.id_director_grupo as t_grupos_id_director_grupo, grupo_x_asig_x_doce.id_docente as grupo_x_asig_x_doce_id_docente, grupo_x_asig_x_doce.tipo_asig as grupo_x_asig_x_doce_tipo_asig from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['order_grid'] = $nmgp_order_by;
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
       $this->t_grupos_id_grado = $this->rs_grid->fields[0] ;  
       $this->grupo_x_asig_x_doce_id_asignatura = $this->rs_grid->fields[1] ;  
       $this->grupo_x_asig_x_doce_id_grupo = $this->rs_grid->fields[2] ;  
       $this->grupo_x_asig_x_doce_id_area = $this->rs_grid->fields[3] ;  
       $this->t_grupos_id_director_grupo = $this->rs_grid->fields[4] ;  
       $this->grupo_x_asig_x_doce_id_docente = $this->rs_grid->fields[5] ;  
       $this->grupo_x_asig_x_doce_tipo_asig = $this->rs_grid->fields[6] ;  
       $GLOBALS["grupo_x_asig_x_doce_id_asignatura"] = $this->rs_grid->fields[1] ;  
       $GLOBALS["grupo_x_asig_x_doce_id_grupo"] = $this->rs_grid->fields[2] ;  
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       $this->SC_sep_quebra = false;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->t_grupos_id_grado = $this->rs_grid->fields[0] ;  
           $this->grupo_x_asig_x_doce_id_asignatura = $this->rs_grid->fields[1] ;  
           $this->grupo_x_asig_x_doce_id_grupo = $this->rs_grid->fields[2] ;  
           $this->grupo_x_asig_x_doce_id_area = $this->rs_grid->fields[3] ;  
           $this->t_grupos_id_director_grupo = $this->rs_grid->fields[4] ;  
           $this->grupo_x_asig_x_doce_id_docente = $this->rs_grid->fields[5] ;  
           $this->grupo_x_asig_x_doce_tipo_asig = $this->rs_grid->fields[6] ;  
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   { 
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Acciones :: PDF</TITLE>
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
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['pivot_charts']) : 0;
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
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>Acciones</TITLE>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
           $nm_saida->saida("   <meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;\" />\r\n");
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
       { 
           $css_body = "";
       } 
       else 
       { 
           $css_body = "margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;";
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_grupo_x_asig_x_doce_p_eval_jquery.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_grupo_x_asig_x_doce_p_eval_ajax.js\"></script>\r\n");
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
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           $nm_saida->saida("   var SC_Link_View = false;\r\n");
           if ($this->Ini->SC_Link_View)
           {
               $nm_saida->saida("   SC_Link_View = true;\r\n");
           }
           $nm_saida->saida("   var scQSInit = true;\r\n");
           $nm_saida->saida("   var scQtReg  = " . NM_encode_input($this->count_ger) . ";\r\n");
           $nm_saida->saida("  function scSetFixedHeaders() {\r\n");
           $nm_saida->saida("   var divScroll, gridHeaders, headerPlaceholder;\r\n");
           $nm_saida->saida("   gridHeaders = $(\".sc-ui-grid-header-row-grid_grupo_x_asig_x_doce_p_eval-1\");\r\n");
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
           $nm_saida->saida("   tableOriginal = $(\"#sc-ui-grid-body-e1df5407\");\r\n");
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
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               $nm_saida->saida("       $('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ancor_save'] . "').addClass('" . $this->css_scGridFieldOver . "');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ancor_save']);
           }
           $nm_saida->saida("   });\r\n");
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
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && !$this->Print_All && $this->NM_opcao != "print" && $this->NM_opcao != "pdf")
       {
           $write_css = false;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_grupo_x_asig_x_doce_p_eval_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
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
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_grupo_x_asig_x_doce_p_eval_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['num_css'] . '.css');
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
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_grupo_x_asig_x_doce_p_eval_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_pdf'] != "pdf")
       {
           $nm_saida->saida("  .css_iframes   { margin-bottom: 0px; margin-left: 0px;  margin-right: 0px;  margin-top: 0px; }\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
       { 
           $nm_saida->saida("       .ttip {border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow}\r\n");
       } 
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_grid_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
           $nm_saida->saida("  </style>\r\n");
       }
       $nm_saida->saida("  </HEAD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".grid_grupo_x_asig_x_doce_p_eval_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   { 
       $nm_saida->saida("  <body class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $css_body . "\">\r\n");
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none; position: absolute; left: 50px; top: 50px\"><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "pdf" && !$this->Print_All)
       { 
           $nm_saida->saida("      <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['doc_word'])
       { 
           $nm_saida->saida("      <div id=\"tooltip\" style=\"position:absolute;visibility:hidden;border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;padding:1px\"></div>\r\n");
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD  colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_A_grid_grupo_x_asig_x_doce_p_eval\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_A_grid_grupo_x_asig_x_doce_p_eval\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_E_grid_grupo_x_asig_x_doce_p_eval\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_E_grid_grupo_x_asig_x_doce_p_eval\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <td style=\"padding: 0px;  vertical-align: top;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\"><tr>\r\n");
           $nm_saida->saida("    <TD colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_AL_grid_grupo_x_asig_x_doce_p_eval\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_AL_grid_grupo_x_asig_x_doce_p_eval\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
        } 
   }  
 }  
 function NM_cor_embutida()
 {  
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   {
       $this->arr_buttons = array_merge($this->arr_buttons, $this->Ini->arr_buttons_usr);
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_grupo_x_asig_x_doce_p_eval']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_grupo_x_asig_x_doce_p_eval']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_grupo_x_asig_x_doce_p_eval']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_grupo_x_asig_x_doce_p_eval']) . "_";
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

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida']) ? "grid_grupo_x_asig_x_doce_p_eval_" : "";
   $this->css_sep = " ";
   $this->css_t_grupos_id_grado_label = $compl_css_emb . "css_t_grupos_id_grado_label";
   $this->css_t_grupos_id_grado_grid_line = $compl_css_emb . "css_t_grupos_id_grado_grid_line";
   $this->css_grupo_x_asig_x_doce_id_asignatura_label = $compl_css_emb . "css_grupo_x_asig_x_doce_id_asignatura_label";
   $this->css_grupo_x_asig_x_doce_id_asignatura_grid_line = $compl_css_emb . "css_grupo_x_asig_x_doce_id_asignatura_grid_line";
   $this->css_grupo_x_asig_x_doce_id_grupo_label = $compl_css_emb . "css_grupo_x_asig_x_doce_id_grupo_label";
   $this->css_grupo_x_asig_x_doce_id_grupo_grid_line = $compl_css_emb . "css_grupo_x_asig_x_doce_id_grupo_grid_line";
   $this->css_crea_desempeno_label = $compl_css_emb . "css_crea_desempeno_label";
   $this->css_crea_desempeno_grid_line = $compl_css_emb . "css_crea_desempeno_grid_line";
   $this->css_sc_field_0_label = $compl_css_emb . "css_sc_field_0_label";
   $this->css_sc_field_0_grid_line = $compl_css_emb . "css_sc_field_0_grid_line";
   $this->css_evalua_periodo_label = $compl_css_emb . "css_evalua_periodo_label";
   $this->css_evalua_periodo_grid_line = $compl_css_emb . "css_evalua_periodo_grid_line";
   $this->css_evlua_periodom2_label = $compl_css_emb . "css_evlua_periodom2_label";
   $this->css_evlua_periodom2_grid_line = $compl_css_emb . "css_evlua_periodom2_grid_line";
   $this->css_evlua_periodom3_label = $compl_css_emb . "css_evlua_periodom3_label";
   $this->css_evlua_periodom3_grid_line = $compl_css_emb . "css_evlua_periodom3_grid_line";
   $this->css_evlua_periodom4_label = $compl_css_emb . "css_evlua_periodom4_label";
   $this->css_evlua_periodom4_grid_line = $compl_css_emb . "css_evlua_periodom4_grid_line";
   $this->css_evlua_periodom5_label = $compl_css_emb . "css_evlua_periodom5_label";
   $this->css_evlua_periodom5_grid_line = $compl_css_emb . "css_evlua_periodom5_grid_line";
   $this->css_evlua_periodom6_label = $compl_css_emb . "css_evlua_periodom6_label";
   $this->css_evlua_periodom6_grid_line = $compl_css_emb . "css_evlua_periodom6_grid_line";
   $this->css_evalua_periodo1_m7_label = $compl_css_emb . "css_evalua_periodo1_m7_label";
   $this->css_evalua_periodo1_m7_grid_line = $compl_css_emb . "css_evalua_periodo1_m7_grid_line";
   $this->css_evalua_periodom8_label = $compl_css_emb . "css_evalua_periodom8_label";
   $this->css_evalua_periodom8_grid_line = $compl_css_emb . "css_evalua_periodom8_grid_line";
   $this->css_evalua_disc_confam_label = $compl_css_emb . "css_evalua_disc_confam_label";
   $this->css_evalua_disc_confam_grid_line = $compl_css_emb . "css_evalua_disc_confam_grid_line";
   $this->css_evalua_periodo1_mo9_label = $compl_css_emb . "css_evalua_periodo1_mo9_label";
   $this->css_evalua_periodo1_mo9_grid_line = $compl_css_emb . "css_evalua_periodo1_mo9_grid_line";
   $this->css_evalua_periodom10_label = $compl_css_emb . "css_evalua_periodom10_label";
   $this->css_evalua_periodom10_grid_line = $compl_css_emb . "css_evalua_periodom10_grid_line";
   $this->css_evalua_p1_m11_label = $compl_css_emb . "css_evalua_p1_m11_label";
   $this->css_evalua_p1_m11_grid_line = $compl_css_emb . "css_evalua_p1_m11_grid_line";
   $this->css_evalua_disciplina_label = $compl_css_emb . "css_evalua_disciplina_label";
   $this->css_evalua_disciplina_grid_line = $compl_css_emb . "css_evalua_disciplina_grid_line";
   $this->css_evalua_periodomp1_label = $compl_css_emb . "css_evalua_periodomp1_label";
   $this->css_evalua_periodomp1_grid_line = $compl_css_emb . "css_evalua_periodomp1_grid_line";
   $this->css_evalua_tec_iti_label = $compl_css_emb . "css_evalua_tec_iti_label";
   $this->css_evalua_tec_iti_grid_line = $compl_css_emb . "css_evalua_tec_iti_grid_line";
   $this->css_evalua_periodo_tran_label = $compl_css_emb . "css_evalua_periodo_tran_label";
   $this->css_evalua_periodo_tran_grid_line = $compl_css_emb . "css_evalua_periodo_tran_grid_line";
   $this->css_obs_asig_label = $compl_css_emb . "css_obs_asig_label";
   $this->css_obs_asig_grid_line = $compl_css_emb . "css_obs_asig_grid_line";
   $this->css_eval_pendiente_label = $compl_css_emb . "css_eval_pendiente_label";
   $this->css_eval_pendiente_grid_line = $compl_css_emb . "css_eval_pendiente_grid_line";
   $this->css_ref_acade_label = $compl_css_emb . "css_ref_acade_label";
   $this->css_ref_acade_grid_line = $compl_css_emb . "css_ref_acade_grid_line";
   $this->css_enviar_tarea_label = $compl_css_emb . "css_enviar_tarea_label";
   $this->css_enviar_tarea_grid_line = $compl_css_emb . "css_enviar_tarea_grid_line";
   $this->css_director_grupo_label = $compl_css_emb . "css_director_grupo_label";
   $this->css_director_grupo_grid_line = $compl_css_emb . "css_director_grupo_grid_line";
   $this->css_boton_superar_label = $compl_css_emb . "css_boton_superar_label";
   $this->css_boton_superar_grid_line = $compl_css_emb . "css_boton_superar_grid_line";
   $this->css_evalua_pp_label = $compl_css_emb . "css_evalua_pp_label";
   $this->css_evalua_pp_grid_line = $compl_css_emb . "css_evalua_pp_grid_line";
   $this->css_evaluar_label = $compl_css_emb . "css_evaluar_label";
   $this->css_evaluar_grid_line = $compl_css_emb . "css_evaluar_grid_line";
 }  
// 
//----- 
 function cabecalho()
 {
   global
          $nm_saida;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_liga']['cab']))
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
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cond_pesq'];
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
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cond_pesq'], 0, $trab_pos);
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
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sv_dt_head']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sv_dt_head'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sv_dt_head']['fix'] = $nm_data_fixa;
       $nm_refresch_cab_rod = true;
   } 
   else 
   { 
       $nm_refresch_cab_rod = false;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sv_dt_head'] as $ind => $val)
   {
       $tmp_var = "sc_data_cab" . $ind;
       if ($$tmp_var != $val)
       {
           $nm_refresch_cab_rod = true;
           break;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sv_dt_head']['fix'] != $nm_data_fixa)
   {
       $nm_refresch_cab_rod = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'] && $nm_refresch_cab_rod)
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sv_dt_head']['fix'] = $nm_data_fixa;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" colspan=3 style=\"vertical-align: top\">\r\n");
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
   $nm_saida->saida("        	<td id=\"lin1_col1\" class=\"" . $this->css_scGridHeaderFont . "\"><span>Acciones</span></td>\r\n");
   $nm_saida->saida("            <td id=\"lin1_col2\" class=\"" . $this->css_scGridHeaderFont . "\"><span>" . $nm_data_fixa . "</span></td>\r\n");
   $nm_saida->saida("        </tr>\r\n");
   $nm_saida->saida("    </table>		 \r\n");
   $nm_saida->saida(" </div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'] && $nm_refresch_cab_rod)
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_label'])
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
   $nm_saida->saida("    <TR id=\"tit_grid_grupo_x_asig_x_doce_p_eval__SCCS__" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . " sc-ui-grid-header-row sc-ui-grid-header-row-grid_grupo_x_asig_x_doce_p_eval-" . $tmp_header_row . "\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evaluar_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_label'])
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
             $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
             foreach ($NM_css as $cada_css)
             {
                 $css_emb .= ".grid_grupo_x_asig_x_doce_p_eval_" . substr($cada_css, 1);
             }
             $css_emb .= "</style>";
             $Cod_Html = $css_emb . $Cod_Html;
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cols_emb'] = count($Nm_temp) - 1;
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
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_t_grupos_id_grado()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['t_grupos_id_grado'])) ? $this->New_label['t_grupos_id_grado'] : "Grado"; 
   if (!isset($this->NM_cmp_hidden['t_grupos_id_grado']) || $this->NM_cmp_hidden['t_grupos_id_grado'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_t_grupos_id_grado_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_t_grupos_id_grado_label'] . "\" NOWRAP WIDTH=\"80px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_grupo_x_asig_x_doce_id_asignatura()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['grupo_x_asig_x_doce_id_asignatura'])) ? $this->New_label['grupo_x_asig_x_doce_id_asignatura'] : ""; 
   if (!isset($this->NM_cmp_hidden['grupo_x_asig_x_doce_id_asignatura']) || $this->NM_cmp_hidden['grupo_x_asig_x_doce_id_asignatura'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_grupo_x_asig_x_doce_id_asignatura_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_grupo_x_asig_x_doce_id_asignatura_label'] . "\" NOWRAP WIDTH=\"150px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_grupo_x_asig_x_doce_id_grupo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['grupo_x_asig_x_doce_id_grupo'])) ? $this->New_label['grupo_x_asig_x_doce_id_grupo'] : ""; 
   if (!isset($this->NM_cmp_hidden['grupo_x_asig_x_doce_id_grupo']) || $this->NM_cmp_hidden['grupo_x_asig_x_doce_id_grupo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_grupo_x_asig_x_doce_id_grupo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_grupo_x_asig_x_doce_id_grupo_label'] . "\" NOWRAP WIDTH=\"80px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_crea_desempeno()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['crea_desempeno'])) ? $this->New_label['crea_desempeno'] : "Crear Desempeño"; 
   if (!isset($this->NM_cmp_hidden['crea_desempeno']) || $this->NM_cmp_hidden['crea_desempeno'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_crea_desempeno_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_crea_desempeno_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_sc_field_0()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Crear Actividades Evalúa Desempeños"; 
   if (!isset($this->NM_cmp_hidden['sc_field_0']) || $this->NM_cmp_hidden['sc_field_0'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_sc_field_0_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sc_field_0_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_periodo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_periodo'])) ? $this->New_label['evalua_periodo'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_periodo']) || $this->NM_cmp_hidden['evalua_periodo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_periodo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_periodo_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evlua_periodom2()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evlua_periodom2'])) ? $this->New_label['evlua_periodom2'] : ""; 
   if (!isset($this->NM_cmp_hidden['evlua_periodom2']) || $this->NM_cmp_hidden['evlua_periodom2'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evlua_periodom2_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evlua_periodom2_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evlua_periodom3()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evlua_periodom3'])) ? $this->New_label['evlua_periodom3'] : ""; 
   if (!isset($this->NM_cmp_hidden['evlua_periodom3']) || $this->NM_cmp_hidden['evlua_periodom3'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evlua_periodom3_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evlua_periodom3_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evlua_periodom4()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evlua_periodom4'])) ? $this->New_label['evlua_periodom4'] : ""; 
   if (!isset($this->NM_cmp_hidden['evlua_periodom4']) || $this->NM_cmp_hidden['evlua_periodom4'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evlua_periodom4_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evlua_periodom4_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evlua_periodom5()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evlua_periodom5'])) ? $this->New_label['evlua_periodom5'] : ""; 
   if (!isset($this->NM_cmp_hidden['evlua_periodom5']) || $this->NM_cmp_hidden['evlua_periodom5'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evlua_periodom5_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evlua_periodom5_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evlua_periodom6()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evlua_periodom6'])) ? $this->New_label['evlua_periodom6'] : ""; 
   if (!isset($this->NM_cmp_hidden['evlua_periodom6']) || $this->NM_cmp_hidden['evlua_periodom6'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evlua_periodom6_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evlua_periodom6_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_periodo1_m7()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_periodo1_m7'])) ? $this->New_label['evalua_periodo1_m7'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_periodo1_m7']) || $this->NM_cmp_hidden['evalua_periodo1_m7'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_periodo1_m7_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_periodo1_m7_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_periodom8()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_periodom8'])) ? $this->New_label['evalua_periodom8'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_periodom8']) || $this->NM_cmp_hidden['evalua_periodom8'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_periodom8_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_periodom8_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_disc_confam()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_disc_confam'])) ? $this->New_label['evalua_disc_confam'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_disc_confam']) || $this->NM_cmp_hidden['evalua_disc_confam'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_disc_confam_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_disc_confam_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_periodo1_mo9()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_periodo1_mo9'])) ? $this->New_label['evalua_periodo1_mo9'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_periodo1_mo9']) || $this->NM_cmp_hidden['evalua_periodo1_mo9'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_periodo1_mo9_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_periodo1_mo9_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_periodom10()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_periodom10'])) ? $this->New_label['evalua_periodom10'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_periodom10']) || $this->NM_cmp_hidden['evalua_periodom10'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_periodom10_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_periodom10_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_p1_m11()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_p1_m11'])) ? $this->New_label['evalua_p1_m11'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_p1_m11']) || $this->NM_cmp_hidden['evalua_p1_m11'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_p1_m11_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_p1_m11_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_disciplina()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_disciplina'])) ? $this->New_label['evalua_disciplina'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_disciplina']) || $this->NM_cmp_hidden['evalua_disciplina'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_disciplina_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_disciplina_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_periodomp1()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_periodomp1'])) ? $this->New_label['evalua_periodomp1'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_periodomp1']) || $this->NM_cmp_hidden['evalua_periodomp1'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_periodomp1_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_periodomp1_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_tec_iti()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_tec_iti'])) ? $this->New_label['evalua_tec_iti'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_tec_iti']) || $this->NM_cmp_hidden['evalua_tec_iti'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_tec_iti_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_tec_iti_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_periodo_tran()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_periodo_tran'])) ? $this->New_label['evalua_periodo_tran'] : ""; 
   if (!isset($this->NM_cmp_hidden['evalua_periodo_tran']) || $this->NM_cmp_hidden['evalua_periodo_tran'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_periodo_tran_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_periodo_tran_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_obs_asig()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['obs_asig'])) ? $this->New_label['obs_asig'] : ""; 
   if (!isset($this->NM_cmp_hidden['obs_asig']) || $this->NM_cmp_hidden['obs_asig'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_obs_asig_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_obs_asig_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_eval_pendiente()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['eval_pendiente'])) ? $this->New_label['eval_pendiente'] : ""; 
   if (!isset($this->NM_cmp_hidden['eval_pendiente']) || $this->NM_cmp_hidden['eval_pendiente'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_eval_pendiente_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_eval_pendiente_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_ref_acade()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['ref_acade'])) ? $this->New_label['ref_acade'] : ""; 
   if (!isset($this->NM_cmp_hidden['ref_acade']) || $this->NM_cmp_hidden['ref_acade'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_ref_acade_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_ref_acade_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_enviar_tarea()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['enviar_tarea'])) ? $this->New_label['enviar_tarea'] : ""; 
   if (!isset($this->NM_cmp_hidden['enviar_tarea']) || $this->NM_cmp_hidden['enviar_tarea'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_enviar_tarea_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_enviar_tarea_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_director_grupo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['director_grupo'])) ? $this->New_label['director_grupo'] : ""; 
   if (!isset($this->NM_cmp_hidden['director_grupo']) || $this->NM_cmp_hidden['director_grupo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_director_grupo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_director_grupo_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_boton_superar()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['boton_superar'])) ? $this->New_label['boton_superar'] : " "; 
   if (!isset($this->NM_cmp_hidden['boton_superar']) || $this->NM_cmp_hidden['boton_superar'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_boton_superar_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_boton_superar_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evalua_pp()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evalua_pp'])) ? $this->New_label['evalua_pp'] : "Periodos Pendientes"; 
   if (!isset($this->NM_cmp_hidden['evalua_pp']) || $this->NM_cmp_hidden['evalua_pp'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evalua_pp_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evalua_pp_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_evaluar()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['evaluar'])) ? $this->New_label['evaluar'] : "Evaluar"; 
   if (!isset($this->NM_cmp_hidden['evaluar']) || $this->NM_cmp_hidden['evaluar'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_evaluar_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_evaluar_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ini_cor_grid']);
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
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['where_pesq_filtro'];
// 
   $SC_Label = (isset($this->New_label['t_grupos_id_grado'])) ? $this->New_label['t_grupos_id_grado'] : "Grado"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['t_grupos_id_grado'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['grupo_x_asig_x_doce_id_asignatura'])) ? $this->New_label['grupo_x_asig_x_doce_id_asignatura'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['grupo_x_asig_x_doce_id_asignatura'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['grupo_x_asig_x_doce_id_grupo'])) ? $this->New_label['grupo_x_asig_x_doce_id_grupo'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['grupo_x_asig_x_doce_id_grupo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['crea_desempeno'])) ? $this->New_label['crea_desempeno'] : "Crear Desempeño"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['crea_desempeno'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Crear Actividades Evalúa Desempeños"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['sc_field_0'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_periodo'])) ? $this->New_label['evalua_periodo'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_periodo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evlua_periodom2'])) ? $this->New_label['evlua_periodom2'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evlua_periodom2'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evlua_periodom3'])) ? $this->New_label['evlua_periodom3'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evlua_periodom3'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evlua_periodom4'])) ? $this->New_label['evlua_periodom4'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evlua_periodom4'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evlua_periodom5'])) ? $this->New_label['evlua_periodom5'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evlua_periodom5'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evlua_periodom6'])) ? $this->New_label['evlua_periodom6'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evlua_periodom6'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_periodo1_m7'])) ? $this->New_label['evalua_periodo1_m7'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_periodo1_m7'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_periodom8'])) ? $this->New_label['evalua_periodom8'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_periodom8'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_disc_confam'])) ? $this->New_label['evalua_disc_confam'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_disc_confam'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_periodo1_mo9'])) ? $this->New_label['evalua_periodo1_mo9'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_periodo1_mo9'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_periodom10'])) ? $this->New_label['evalua_periodom10'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_periodom10'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_p1_m11'])) ? $this->New_label['evalua_p1_m11'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_p1_m11'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_disciplina'])) ? $this->New_label['evalua_disciplina'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_disciplina'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_periodomp1'])) ? $this->New_label['evalua_periodomp1'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_periodomp1'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_tec_iti'])) ? $this->New_label['evalua_tec_iti'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_tec_iti'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_periodo_tran'])) ? $this->New_label['evalua_periodo_tran'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_periodo_tran'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['obs_asig'])) ? $this->New_label['obs_asig'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['obs_asig'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['eval_pendiente'])) ? $this->New_label['eval_pendiente'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['eval_pendiente'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['ref_acade'])) ? $this->New_label['ref_acade'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['ref_acade'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['enviar_tarea'])) ? $this->New_label['enviar_tarea'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['enviar_tarea'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['director_grupo'])) ? $this->New_label['director_grupo'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['director_grupo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['boton_superar'])) ? $this->New_label['boton_superar'] : " "; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['boton_superar'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evalua_pp'])) ? $this->New_label['evalua_pp'] : "Periodos Pendientes"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evalua_pp'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['evaluar'])) ? $this->New_label['evaluar'] : "Evaluar"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['labels']['evaluar'] = $SC_Label; 
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_grupo_x_asig_x_doce_p_eval#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cab_embutida'] != "S")
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
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print") 
           { 
           $nm_saida->saida("    <TD >\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_grupo_x_asig_x_doce_p_eval\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_grupo_x_asig_x_doce_p_eval\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
           } 
           $nm_saida->saida("  <td id=\"sc_grid_body\" class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" &&
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print") 
           { 
               $nm_saida->saida("</TABLE></TD>\r\n");
               $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_grupo_x_asig_x_doce_p_eval\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_grupo_x_asig_x_doce_p_eval\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("</TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_grupo_x_asig_x_doce_p_eval\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_grupo_x_asig_x_doce_p_eval\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    </TR>\r\n");
           } 
       $nm_saida->saida("</TABLE>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_grupo_x_asig_x_doce_p_eval#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
       $nm_saida->saida(" <TR> \r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TD  colspan=3>\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_grupo_x_asig_x_doce_p_eval\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_grupo_x_asig_x_doce_p_eval\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
       } 
       $nm_id_aplicacao = " id=\"apl_grid_grupo_x_asig_x_doce_p_eval#?#1\"";
   } 
   $nm_saida->saida("  <TD id=\"sc_grid_body\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-e1df5407\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['cab_embutida'] != "S" )
      { 
          $this->label_grid($linhas);
      } 
   } 
   else 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final'] = 0;
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "pdf" && -1 < $this->progress_grid)
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
          $this->t_grupos_id_grado = $this->rs_grid->fields[0] ;  
          $this->grupo_x_asig_x_doce_id_asignatura = $this->rs_grid->fields[1] ;  
          $this->grupo_x_asig_x_doce_id_grupo = $this->rs_grid->fields[2] ;  
          $this->grupo_x_asig_x_doce_id_area = $this->rs_grid->fields[3] ;  
          $this->t_grupos_id_director_grupo = $this->rs_grid->fields[4] ;  
          $this->grupo_x_asig_x_doce_id_docente = $this->rs_grid->fields[5] ;  
          $this->grupo_x_asig_x_doce_tipo_asig = $this->rs_grid->fields[6] ;  
          $GLOBALS["grupo_x_asig_x_doce_id_asignatura"] = $this->rs_grid->fields[1] ;  
          $GLOBALS["grupo_x_asig_x_doce_id_grupo"] = $this->rs_grid->fields[2] ;  
          $this->SC_seq_page++; 
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final'] + 1; 
          if (!$ini_grid) {
              $this->SC_sep_quebra = true;
          }
          else {
              $ini_grid = false;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['rows_emb']++;
          $this->sc_proc_grid = true;
          $_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_p_eval']['contr_erro'] = 'on';
if (!isset($_SESSION['database'])) {$_SESSION['database'] = "";}
if (!isset($this->sc_temp_database)) {$this->sc_temp_database = (isset($_SESSION['database'])) ? $_SESSION['database'] : "";}
if (!isset($_SESSION['bajo'])) {$_SESSION['bajo'] = "";}
if (!isset($this->sc_temp_bajo)) {$this->sc_temp_bajo = (isset($_SESSION['bajo'])) ? $_SESSION['bajo'] : "";}
if (!isset($_SESSION['par_cierre_p1'])) {$_SESSION['par_cierre_p1'] = "";}
if (!isset($this->sc_temp_par_cierre_p1)) {$this->sc_temp_par_cierre_p1 = (isset($_SESSION['par_cierre_p1'])) ? $_SESSION['par_cierre_p1'] : "";}
if (!isset($_SESSION['par_apertura_p1'])) {$_SESSION['par_apertura_p1'] = "";}
if (!isset($this->sc_temp_par_apertura_p1)) {$this->sc_temp_par_apertura_p1 = (isset($_SESSION['par_apertura_p1'])) ? $_SESSION['par_apertura_p1'] : "";}
if (!isset($_SESSION['fecha_hoy'])) {$_SESSION['fecha_hoy'] = "";}
if (!isset($this->sc_temp_fecha_hoy)) {$this->sc_temp_fecha_hoy = (isset($_SESSION['fecha_hoy'])) ? $_SESSION['fecha_hoy'] : "";}
if (!isset($_SESSION['par_modelo'])) {$_SESSION['par_modelo'] = "";}
if (!isset($this->sc_temp_par_modelo)) {$this->sc_temp_par_modelo = (isset($_SESSION['par_modelo'])) ? $_SESSION['par_modelo'] : "";}
if (!isset($_SESSION['par_tipo_asign'])) {$_SESSION['par_tipo_asign'] = "";}
if (!isset($this->sc_temp_par_tipo_asign)) {$this->sc_temp_par_tipo_asign = (isset($_SESSION['par_tipo_asign'])) ? $_SESSION['par_tipo_asign'] : "";}
if (!isset($_SESSION['par_id_grupo'])) {$_SESSION['par_id_grupo'] = "";}
if (!isset($this->sc_temp_par_id_grupo)) {$this->sc_temp_par_id_grupo = (isset($_SESSION['par_id_grupo'])) ? $_SESSION['par_id_grupo'] : "";}
if (!isset($_SESSION['par_area'])) {$_SESSION['par_area'] = "";}
if (!isset($this->sc_temp_par_area)) {$this->sc_temp_par_area = (isset($_SESSION['par_area'])) ? $_SESSION['par_area'] : "";}
    $this->modelos_evaluacion();
$this->NM_cmp_hidden["director_grupo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["director_grupo"] = "off"; }
$this->sc_temp_par_area=$this->grupo_x_asig_x_doce_id_area ;
$this->sc_temp_par_id_grupo=$this->grupo_x_asig_x_doce_id_grupo ;
$this->sc_temp_par_tipo_asign =$this->grupo_x_asig_x_doce_tipo_asig ;
$check_sql = "SELECT t_grupos.id_grupo, t_grupos.id_director_grupo, grupo_x_asig_x_doce.tipo_asig"
   . " FROM t_grupos INNER JOIN grupo_x_asig_x_doce ON grupo_x_asig_x_doce.id_grupo = t_grupos.id_grupo"
   . " WHERE id_director_grupo = '" .$this->grupo_x_asig_x_doce_id_docente . "'AND t_grupos.id_grupo = '".$this->grupo_x_asig_x_doce_id_grupo ."' AND tipo_asig = '".$this->grupo_x_asig_x_doce_tipo_asig ."' ";
 
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
    $this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }
	$this->NM_cmp_hidden["evalua_tec_iti"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_tec_iti"] = "on"; }
	$this->NM_cmp_hidden["evalua_disc_confam"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disc_confam"] = "off"; }
$this->director_grupo =$this->rs[0][1];
}
		else     
{
	 $this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }
	$this->NM_cmp_hidden["evalua_disc_confam"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disc_confam"] = "off"; }	
			$this->NM_cmp_hidden["evalua_tec_iti"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_tec_iti"] = "on"; }
			$this->director_grupo ='';
}
if($this->director_grupo >0 && $this->sc_temp_par_modelo == 8 ){
$this->NM_cmp_hidden["director_grupo"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["director_grupo"] = "on"; }
}
$check_sql = "SELECT asignatura"
   . " FROM t_asignaturas"
   . " WHERE id_asignatura = '" .$this->grupo_x_asig_x_doce_id_asignatura . "'";
 
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
$this->asignatu = $this->rs[0][0];
   
}
		else     
{
		 $this->asignatu  = '';
   
}
$this->modelos_evaluacion();
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }  
$this->NM_cmp_hidden["evalua_periodo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo"] = "off"; }  
$this->NM_cmp_hidden["evlua_periodom2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom2"] = "off"; }  
$this->NM_cmp_hidden["evlua_periodom3"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom3"] = "off"; }  
$this->NM_cmp_hidden["evlua_periodom4"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom4"] = "off"; }  
$this->NM_cmp_hidden["evlua_periodom5"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom5"] = "off"; } 
$this->NM_cmp_hidden["evlua_periodom6"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom6"] = "off"; }  
$this->NM_cmp_hidden["evalua_periodomp1"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodomp1"] = "off"; } 
$this->NM_cmp_hidden["evalua_periodom8"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodom8"] = "off"; }  
$this->NM_cmp_hidden["evalua_periodo_tran"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "off"; }
$this->NM_cmp_hidden["evalua_tec_iti"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_tec_iti"] = "off"; }$this->NM_cmp_hidden["evalua_periodo1_mo9"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo1_mo9"] = "off"; }$this->NM_cmp_hidden["evalua_periodom10"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodom10"] = "off"; }
$this->NM_cmp_hidden["evalua_periodo1_m7"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo1_m7"] = "off"; }
$this->NM_cmp_hidden["evalua_p1_m11"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_p1_m11"] = "off"; }
$this->NM_cmp_hidden["boton_superar"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["boton_superar"] = "off"; }
if($this->sc_temp_par_modelo == 1 and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodo"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }	
}elseif($this->sc_temp_par_modelo == 1 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif( $this->sc_temp_par_modelo == 1  and    $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ) {
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evalua_periodo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo"] = "off"; }	
}
if($this->sc_temp_par_modelo == 2 and  $this->t_grupos_id_grado  >=5  and ($this->grupo_x_asig_x_doce_tipo_asig  == 'A' || $this->grupo_x_asig_x_doce_tipo_asig  == 'T'|| $this->grupo_x_asig_x_doce_tipo_asig  == 'C' ) and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom2"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom2"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 2 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom2"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 2 and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) and ($this->grupo_x_asig_x_doce_tipo_asig  == 'A' || $this->grupo_x_asig_x_doce_tipo_asig  == 'T'|| $this->grupo_x_asig_x_doce_tipo_asig  == 'C' ) and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evlua_periodom2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom2"] = "off"; }	
}
if($this->sc_temp_par_modelo == 3 and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom3"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom3"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 3 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom3"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom3"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 3 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evlua_periodom3"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom3"] = "off"; }	
}
if($this->sc_temp_par_modelo == 4 and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom4"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom4"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 4 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom4"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom4"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 4  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evlua_periodom4"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom4"] = "off"; }	
}
if($this->sc_temp_par_modelo == 5 and  $this->t_grupos_id_grado  >= 5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom5"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom5"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 5 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom5"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom5"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 5 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evlua_periodom5"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom5"] = "off"; }	
}
if($this->sc_temp_par_modelo == 6 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) and  $this->t_grupos_id_grado >=5 ){
$this->NM_cmp_hidden["evlua_periodom6"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom6"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 6 and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )  and  $this->t_grupos_id_grado >=1 ){
$this->NM_cmp_hidden["evlua_periodom6"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom6"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 6 and $this->grupo_x_asig_x_doce_tipo_asig  == 'T' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )  and  $this->t_grupos_id_grado >=5){
$this->NM_cmp_hidden["evlua_periodom6"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom6"] = "off"; }
$this->NM_cmp_hidden["evalua_tec_iti"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_tec_iti"] = "on"; }}elseif($this->sc_temp_par_modelo == 6  and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado <5 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evlua_periodom6"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evlua_periodom6"] = "off"; }	
}
	if($this->sc_temp_par_modelo == 8 and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= 						$this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) )
	
	{
				$this->NM_cmp_hidden["evalua_periodom8"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodom8"] = "on"; }
				$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
				 
		}elseif($this->sc_temp_par_modelo == 8 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and 						$this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  < 5 )
	{
				$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
				$this->NM_cmp_hidden["evalua_periodom8"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodom8"] = "off"; }	
			 
		}elseif($this->sc_temp_par_modelo == 8 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= 					$this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) )
	{
				$this->NM_cmp_hidden["evalua_periodom8"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodom8"] = "off"; }
				
						
				 
		
		}
if($this->sc_temp_par_modelo == 9 and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodo1_mo9"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo1_mo9"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 9 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodo1_mo9"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo1_mo9"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 9 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evalua_periodo1_mo9"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo1_mo9"] = "off"; }	
}
		
if($this->sc_temp_par_modelo == '10' and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodom10"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodom10"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == '10' and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodom10"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodom10"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == '10' and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evalua_periodom10"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodom10"] = "off"; }	
}
				
if($this->sc_temp_par_modelo == 7 and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodo1_m7"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo1_m7"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 7 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodo1_m7"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo1_m7"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 7 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evalua_periodo1_m7"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo1_m7"] = "off"; }	
}	
		
if($this->sc_temp_par_modelo == '11' and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_p1_m11"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_p1_m11"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == '11' and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_p1_m11"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_p1_m11"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == '11' and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evalua_p1_m11"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["evalua_p1_m11"] = "off"; }	
}
		
if(empty($this->t_grupos_id_director_grupo )){
	$this->nmgp_botoes["Observaciones Generales"] = "off";}
$check_sql = "SELECT maximo"
   . " FROM valoracion"
   . " WHERE orden = 4";
 
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
  $this->sc_temp_bajo = $this->rs[0][0];
}
$check_sql = "SELECT eval_1_per,id_asignatura"
   . " FROM t_evaluacion"
   . " WHERE  id_asignatura = '" .$this->grupo_x_asig_x_doce_id_asignatura ."'AND eval_1_per <= '". $this->sc_temp_bajo  ."' AND id_grupo =  '".$this->grupo_x_asig_x_doce_id_grupo ."' ";
 
 
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
	$this->NM_cmp_hidden["boton_superar"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['php_cmp_sel']["boton_superar"] = "on"; }
	}
$this->evalua_pp ='<a href="../form_joe/docente/evaluarPeriodo/'.$this->grupo_x_asig_x_doce_id_grupo .'/'.$this->grupo_x_asig_x_doce_id_asignatura .'/'. $this->sc_temp_database .'"target="_self"> Evaluar PP</a>';
$this->evaluar = '<a href="../form_jack/Evaluacion/getEvaluacion/'.$this->grupo_x_asig_x_doce_id_grupo .'/'.$this->grupo_x_asig_x_doce_id_asignatura .'/'. $this->sc_temp_database .'"target="_self"> Evaluar</a>' ;
if (isset($this->sc_temp_par_area)) {$_SESSION['par_area'] = $this->sc_temp_par_area;}
if (isset($this->sc_temp_par_id_grupo)) {$_SESSION['par_id_grupo'] = $this->sc_temp_par_id_grupo;}
if (isset($this->sc_temp_par_tipo_asign)) {$_SESSION['par_tipo_asign'] = $this->sc_temp_par_tipo_asign;}
if (isset($this->sc_temp_par_modelo)) {$_SESSION['par_modelo'] = $this->sc_temp_par_modelo;}
if (isset($this->sc_temp_fecha_hoy)) {$_SESSION['fecha_hoy'] = $this->sc_temp_fecha_hoy;}
if (isset($this->sc_temp_par_apertura_p1)) {$_SESSION['par_apertura_p1'] = $this->sc_temp_par_apertura_p1;}
if (isset($this->sc_temp_par_cierre_p1)) {$_SESSION['par_cierre_p1'] = $this->sc_temp_par_cierre_p1;}
if (isset($this->sc_temp_bajo)) {$_SESSION['bajo'] = $this->sc_temp_bajo;}
if (isset($this->sc_temp_database)) {$_SESSION['database'] = $this->sc_temp_database;}
$_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_p_eval']['contr_erro'] = 'off';
          $nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['final']; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
          }
          $this->SC_ancora = $this->SC_seq_page;
          $nm_saida->saida("    <TR  class=\"" . $this->css_line_back . "\"" . $NM_destaque . " id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_evaluar_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\" >\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "pdf" || isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_liga']['paginacao']))
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
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
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['exibe_total'] == "S")
       { 
           $this->quebra_geral_top() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida_grid'])
   { 
       return; 
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && empty($this->nm_grid_sem_reg) && 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print") 
   { 
       $nm_saida->saida("</TABLE></TD>\r\n");
       $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_grupo_x_asig_x_doce_p_eval\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_grupo_x_asig_x_doce_p_eval\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
       $nm_saida->saida("</TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_grupo_x_asig_x_doce_p_eval\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_grupo_x_asig_x_doce_p_eval\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    </TABLE>\r\n");
           $nm_saida->saida("    </TD>\r\n");
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_t_grupos_id_grado()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['t_grupos_id_grado']) || $this->NM_cmp_hidden['t_grupos_id_grado'] != "off") { 
          $conteudo = sc_strip_script($this->t_grupos_id_grado); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_t_grupos_id_grado($conteudo , $this->t_grupos_id_grado) ; 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_t_grupos_id_grado_grid_line . "\"  style=\"" . $this->Css_Cmp['css_t_grupos_id_grado_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_t_grupos_id_grado_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_grupo_x_asig_x_doce_id_asignatura()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['grupo_x_asig_x_doce_id_asignatura']) || $this->NM_cmp_hidden['grupo_x_asig_x_doce_id_asignatura'] != "off") { 
          $conteudo = sc_strip_script($this->grupo_x_asig_x_doce_id_asignatura); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_grupo_x_asig_x_doce_id_asignatura($conteudo , $this->grupo_x_asig_x_doce_id_asignatura) ; 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_grupo_x_asig_x_doce_id_asignatura_grid_line . "\"  style=\"" . $this->Css_Cmp['css_grupo_x_asig_x_doce_id_asignatura_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_grupo_x_asig_x_doce_id_asignatura_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_grupo_x_asig_x_doce_id_grupo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['grupo_x_asig_x_doce_id_grupo']) || $this->NM_cmp_hidden['grupo_x_asig_x_doce_id_grupo'] != "off") { 
          $conteudo = sc_strip_script($this->grupo_x_asig_x_doce_id_grupo); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_grupo_x_asig_x_doce_id_grupo($conteudo , $this->grupo_x_asig_x_doce_id_grupo) ; 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_grupo_x_asig_x_doce_id_grupo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_grupo_x_asig_x_doce_id_grupo_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_grupo_x_asig_x_doce_id_grupo_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_crea_desempeno()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['crea_desempeno']) || $this->NM_cmp_hidden['crea_desempeno'] != "off") { 
          $conteudo = $this->crea_desempeno; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__box_closed_edit_24.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__box_closed_edit_24.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_crea_desempeno_grid_line . "\"  style=\"" . $this->Css_Cmp['css_crea_desempeno_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["grid_desempeno_docente_copia"]) && $this->Ini->sc_lig_md5["grid_desempeno_docente_copia"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis*scinS*scoutpar_grado*scin" . str_replace("'", "@aspass@", $this->t_grupos_id_grado) . "*scoutpar_asignatura*scin" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "*scoutNMSC_modal*scinok*scout";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis*scinS*scoutpar_grado*scin" . str_replace("'", "@aspass@", $this->t_grupos_id_grado) . "*scoutpar_asignatura*scin" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "*scoutNMSC_modal*scinok*scout";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_grid_desempeno_docente_copia_cons . "', '$this->nm_location', '$Md5_Lig', 'modal', 'inicio', '650', '1024', '', 'grid_desempeno_docente_copia', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_crea_desempeno_grid_line . "\" style=\"" . $this->Css_Cmp['css_crea_desempeno_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_sc_field_0()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['sc_field_0']) || $this->NM_cmp_hidden['sc_field_0'] != "off") { 
          $conteudo = $this->sc_field_0; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__id.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__id.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_sc_field_0_grid_line . "\"  style=\"" . $this->Css_Cmp['css_sc_field_0_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["grid_desempeno_docente"]) && $this->Ini->sc_lig_md5["grid_desempeno_docente"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?par_grado?#?" . str_replace("'", "@aspass@", $this->t_grupos_id_grado) . "?@?par_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?par_grado?#?" . str_replace("'", "@aspass@", $this->t_grupos_id_grado) . "?@?par_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_grid_desempeno_docente_cons . "', '$this->nm_location', '$Md5_Lig', '_self', 'inicio', '0', '0', '', 'grid_desempeno_docente', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_sc_field_0_grid_line . "\" style=\"" . $this->Css_Cmp['css_sc_field_0_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_periodo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_periodo']) || $this->NM_cmp_hidden['evalua_periodo'] != "off") { 
          $conteudo = $this->evalua_periodo; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_periodo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_periodo_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evalua_periodo_grid_line . "\" style=\"" . $this->Css_Cmp['css_evalua_periodo_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evlua_periodom2()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evlua_periodom2']) || $this->NM_cmp_hidden['evlua_periodom2'] != "off") { 
          $conteudo = $this->evlua_periodom2; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evlua_periodom2_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evlua_periodom2_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_m2"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_m2"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_m2_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_m2', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evlua_periodom2_grid_line . "\" style=\"" . $this->Css_Cmp['css_evlua_periodom2_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evlua_periodom3()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evlua_periodom3']) || $this->NM_cmp_hidden['evlua_periodom3'] != "off") { 
          $conteudo = $this->evlua_periodom3; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evlua_periodom3_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evlua_periodom3_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_m3"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_m3"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_m3_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_m3', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evlua_periodom3_grid_line . "\" style=\"" . $this->Css_Cmp['css_evlua_periodom3_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evlua_periodom4()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evlua_periodom4']) || $this->NM_cmp_hidden['evlua_periodom4'] != "off") { 
          $conteudo = $this->evlua_periodom4; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evlua_periodom4_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evlua_periodom4_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_m4"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_m4"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_m4_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_m4', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evlua_periodom4_grid_line . "\" style=\"" . $this->Css_Cmp['css_evlua_periodom4_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evlua_periodom5()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evlua_periodom5']) || $this->NM_cmp_hidden['evlua_periodom5'] != "off") { 
          $conteudo = $this->evlua_periodom5; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evlua_periodom5_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evlua_periodom5_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_5_auto_eval"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_5_auto_eval"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_5_auto_eval_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_5_auto_eval', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evlua_periodom5_grid_line . "\" style=\"" . $this->Css_Cmp['css_evlua_periodom5_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evlua_periodom6()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evlua_periodom6']) || $this->NM_cmp_hidden['evlua_periodom6'] != "off") { 
          $conteudo = $this->evlua_periodom6; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evlua_periodom6_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evlua_periodom6_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_m_itigvc"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_m_itigvc"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_m_itigvc_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_m_itigvc', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evlua_periodom6_grid_line . "\" style=\"" . $this->Css_Cmp['css_evlua_periodom6_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_periodo1_m7()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_periodo1_m7']) || $this->NM_cmp_hidden['evalua_periodo1_m7'] != "off") { 
          $conteudo = $this->evalua_periodo1_m7; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_periodo1_m7_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_periodo1_m7_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_m7"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_m7"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_m7_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_m7', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evalua_periodo1_m7_grid_line . "\" style=\"" . $this->Css_Cmp['css_evalua_periodo1_m7_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_periodom8()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_periodom8']) || $this->NM_cmp_hidden['evalua_periodom8'] != "off") { 
          $conteudo = $this->evalua_periodom8; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_periodom8_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_periodom8_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_5_auto_eval_confamar"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_5_auto_eval_confamar"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_5_auto_eval_confamar_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_5_auto_eval_confamar', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evalua_periodom8_grid_line . "\" style=\"" . $this->Css_Cmp['css_evalua_periodom8_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_disc_confam()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_disc_confam']) || $this->NM_cmp_hidden['evalua_disc_confam'] != "off") { 
          $conteudo = $this->evalua_disc_confam; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__disciplina.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__disciplina.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_disc_confam_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_disc_confam_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_evalua_disc_confam_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_evalua_periodo1_mo9()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_periodo1_mo9']) || $this->NM_cmp_hidden['evalua_periodo1_mo9'] != "off") { 
          $conteudo = $this->evalua_periodo1_mo9; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_periodo1_mo9_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_periodo1_mo9_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_m_jjrondon"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_m_jjrondon"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_m_jjrondon_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_m_jjrondon', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evalua_periodo1_mo9_grid_line . "\" style=\"" . $this->Css_Cmp['css_evalua_periodo1_mo9_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_periodom10()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_periodom10']) || $this->NM_cmp_hidden['evalua_periodom10'] != "off") { 
          $conteudo = $this->evalua_periodom10; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_periodom10_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_periodom10_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_5_auto_eva_pemilio_c"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_5_auto_eva_pemilio_c"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_5_auto_eva_pemilio_c_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_5_auto_eva_pemilio_c', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evalua_periodom10_grid_line . "\" style=\"" . $this->Css_Cmp['css_evalua_periodom10_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_p1_m11()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_p1_m11']) || $this->NM_cmp_hidden['evalua_p1_m11'] != "off") { 
          $conteudo = $this->evalua_p1_m11; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__ep.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_p1_m11_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_p1_m11_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_m11"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_m11"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_m11_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_m11', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evalua_p1_m11_grid_line . "\" style=\"" . $this->Css_Cmp['css_evalua_p1_m11_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_disciplina()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_disciplina']) || $this->NM_cmp_hidden['evalua_disciplina'] != "off") { 
          $conteudo = $this->evalua_disciplina; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__disciplina.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__disciplina.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_disciplina_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_disciplina_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_disciplina_general"]) && $this->Ini->sc_lig_md5["form_disciplina_general"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?N?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?N?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_disciplina_general_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_disciplina_general', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evalua_disciplina_grid_line . "\" style=\"" . $this->Css_Cmp['css_evalua_disciplina_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_periodomp1()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_periodomp1']) || $this->NM_cmp_hidden['evalua_periodomp1'] != "off") { 
          $conteudo = $this->evalua_periodomp1; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__evalua24.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__evalua24.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_periodomp1_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_periodomp1_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_m2_prueba"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_m2_prueba"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_m2_prueba_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_m2_prueba', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evalua_periodomp1_grid_line . "\" style=\"" . $this->Css_Cmp['css_evalua_periodomp1_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_tec_iti()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_tec_iti']) || $this->NM_cmp_hidden['evalua_tec_iti'] != "off") { 
          $conteudo = $this->evalua_tec_iti; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__eval_p_t.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__eval_p_t.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_tec_iti_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_tec_iti_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_m_itigvc_tec"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_m_itigvc_tec"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_m_itigvc_tec_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_m_itigvc_tec', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evalua_tec_iti_grid_line . "\" style=\"" . $this->Css_Cmp['css_evalua_tec_iti_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_periodo_tran()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_periodo_tran']) || $this->NM_cmp_hidden['evalua_periodo_tran'] != "off") { 
          $conteudo = $this->evalua_periodo_tran; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__et.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__et.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_periodo_tran_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_periodo_tran_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_trancicion"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_trancicion"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_trancicion_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_trancicion', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_evalua_periodo_tran_grid_line . "\" style=\"" . $this->Css_Cmp['css_evalua_periodo_tran_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_obs_asig()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['obs_asig']) || $this->NM_cmp_hidden['obs_asig'] != "off") { 
          $conteudo = $this->obs_asig; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__Bevel_Button-Grey_s2.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__Bevel_Button-Grey_s2.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_obs_asig_grid_line . "\"  style=\"" . $this->Css_Cmp['css_obs_asig_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_obs_asig_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_eval_pendiente()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['eval_pendiente']) || $this->NM_cmp_hidden['eval_pendiente'] != "off") { 
          $conteudo = $this->eval_pendiente; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__eval_pend.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__eval_pend.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_eval_pendiente_grid_line . "\"  style=\"" . $this->Css_Cmp['css_eval_pendiente_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_eval_pendiente_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_ref_acade()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['ref_acade']) || $this->NM_cmp_hidden['ref_acade'] != "off") { 
          $conteudo = $this->ref_acade; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__Bevel_Button-Grey_s2 (1).png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__Bevel_Button-Grey_s2 (1).png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_ref_acade_grid_line . "\"  style=\"" . $this->Css_Cmp['css_ref_acade_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_ref_acade_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_enviar_tarea()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['enviar_tarea']) || $this->NM_cmp_hidden['enviar_tarea'] != "off") { 
          $conteudo = $this->enviar_tarea; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__enviar_tar.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__enviar_tar.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_enviar_tarea_grid_line . "\"  style=\"" . $this->Css_Cmp['css_enviar_tarea_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_enviar_tarea_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_director_grupo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['director_grupo']) || $this->NM_cmp_hidden['director_grupo'] != "off") { 
          $conteudo = $this->director_grupo; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__disciplina.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__disciplina.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_director_grupo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_director_grupo_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_disciplina_confamar"]) && $this->Ini->sc_lig_md5["form_disciplina_confamar"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?nombre_asignatura?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_disciplina_confamar_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_disciplina_confamar', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_director_grupo_grid_line . "\" style=\"" . $this->Css_Cmp['css_director_grupo_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_boton_superar()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['boton_superar']) || $this->NM_cmp_hidden['boton_superar'] != "off") { 
          $conteudo = $this->boton_superar; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__super.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__btn__NM__super.png\"/>" ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_boton_superar_grid_line . "\"  style=\"" . $this->Css_Cmp['css_boton_superar_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $this->Ind_lig_mult++;
       if (isset($this->Ini->sc_lig_md5["form_t_evaluacion_p1_5_superacion_eval_confamar"]) && $this->Ini->sc_lig_md5["form_t_evaluacion_p1_5_superacion_eval_confamar"] == "S") {
           $Parms_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig  = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?id_grupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?par_idgrupo?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_grupo) . "?@?par_id_asignatura?#?" . str_replace("'", "@aspass@", $this->grupo_x_asig_x_doce_id_asignatura) . "?@?asigna?#?" . str_replace("'", "@aspass@", $this->asignatu) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_t_evaluacion_p1_5_superacion_eval_confamar_edit . "', '$this->nm_location', '$Md5_Lig', '_self', '', '0', '0', '', 'form_t_evaluacion_p1_5_superacion_eval_confamar', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_boton_superar_grid_line . "\" style=\"" . $this->Css_Cmp['css_boton_superar_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" $conteudo \r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_evalua_pp()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evalua_pp']) || $this->NM_cmp_hidden['evalua_pp'] != "off") { 
          $conteudo = sc_strip_script($this->evalua_pp); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evalua_pp_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evalua_pp_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"  ><span id=\"id_sc_field_evalua_pp_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_evaluar()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['evaluar']) || $this->NM_cmp_hidden['evaluar'] != "off") { 
          $conteudo = sc_strip_script($this->evaluar); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_evaluar_grid_line . "\"  style=\"" . $this->Css_Cmp['css_evaluar_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"  ><span id=\"id_sc_field_evaluar_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 29;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'])
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
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print") 
      {
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $UseAlias =  "S";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
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
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=XX&largura=1200&conf_larg=S&conf_fonte=10&grafico=XX&language=es&conf_socor=S&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_config_word.php?nm_cor=AM&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_move('xls', '0')", "nm_gp_move('xls', '0')", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "nm_gp_move('xml', '0')", "nm_gp_move('xml', '0')", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "nm_gp_move('csv', '0')", "nm_gp_move('csv', '0')", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_move('rtf', '0')", "nm_gp_move('rtf', '0')", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_config_print.php?nm_opc=AM&nm_cor=AM&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
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
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['SC_btn_0'] == "on" && !$this->grid_emb_form) 
      { 
           if (isset($this->Ini->sc_lig_md5["grid_panel_subgrupos_eval"]) && $this->Ini->sc_lig_md5["grid_panel_subgrupos_eval"] == "S") {
               $Parms_Lig  = "usr_login*scin" . str_replace("'", "@aspass@", $_SESSION['usr_login']) . "*scoutSC_glo_par_usr_login*scinusr_login*scoutscript_case_init*scin" . NM_encode_input($this->Ini->sc_page) . "*scoutscript_case_session*scin" .  session_id() . "*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "usr_login*scin" . str_replace("'", "@aspass@", $_SESSION['usr_login']) . "*scoutSC_glo_par_usr_login*scinusr_login*scoutscript_case_init*scin" . NM_encode_input($this->Ini->sc_page) . "*scoutscript_case_session*scin" .  session_id() . "*scout";
           }
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "SC_btn_0", "nm_gp_submit5('" .  $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link  . "" .  SC_dir_app_name('grid_panel_subgrupos_eval')  . "/index.php', '$this->nm_location', '" .  $Md5_Lig  . "', '_self', '', '', '', '', 'grid_panel_subgrupos_eval')", "nm_gp_submit5('" .  $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link  . "" .  SC_dir_app_name('grid_panel_subgrupos_eval')  . "/index.php', '$this->nm_location', '" .  $Md5_Lig  . "', '_self', '', '', '', '', 'grid_panel_subgrupos_eval')", "sc_SC_btn_0_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if (is_file("grid_grupo_x_asig_x_doce_p_eval_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_grupo_x_asig_x_doce_p_eval_help.txt"); 
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full)
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'])
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_modal'])
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
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print") 
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
          if (is_file("grid_grupo_x_asig_x_doce_p_eval_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_grupo_x_asig_x_doce_p_eval_help.txt"); 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print") 
      {
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn = true;
          $nm_saida->saida("           <table style=\"border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000\" id=\"sc_btgp_div_group_1_top\">\r\n");
              $nm_saida->saida("           <tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=XX&largura=1200&conf_larg=S&conf_fonte=10&grafico=XX&language=es&conf_socor=S&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_config_word.php?nm_cor=AM&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_move('xls', '0')", "nm_gp_move('xls', '0')", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "nm_gp_move('xml', '0')", "nm_gp_move('xml', '0')", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "nm_gp_move('csv', '0')", "nm_gp_move('csv', '0')", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_move('rtf', '0')", "nm_gp_move('rtf', '0')", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_config_print.php?nm_opc=AM&nm_cor=AM&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "");
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
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $UseAlias =  "S";
          $nm_saida->saida("            <div class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "");
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
          if (is_file("grid_grupo_x_asig_x_doce_p_eval_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_grupo_x_asig_x_doce_p_eval_help.txt"); 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print") 
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
          if (is_file("grid_grupo_x_asig_x_doce_p_eval_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_grupo_x_asig_x_doce_p_eval_help.txt"); 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   function nmgp_embbed_placeholder_bot()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
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
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
   { 
        return;
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "pdf" &&
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao_print'] != "print" && !$this->Print_All) 
   { 
      $nm_saida->saida("     <tr><td colspan=3  class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\"> \r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_B_grid_grupo_x_asig_x_doce_p_eval\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_B_grid_grupo_x_asig_x_doce_p_eval\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
      $nm_saida->saida("     </td></tr> \r\n");
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   <div id=\"sc-id-fixedheaders-placeholder\" style=\"display: none; position: fixed; top: 0\"></div>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['embutida'])
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
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
       $nm_saida->saida("      parent.scAjaxDetailHeight('grid_grupo_x_asig_x_doce_p_eval', $(document).innerHeight());\r\n");
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
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"grid_grupo_x_asig_x_doce_p_eval\"/>\r\n");
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
   $nm_saida->saida("                     action=\"grid_grupo_x_asig_x_doce_p_eval_pesq.class.php\" \r\n");
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
   $nm_saida->saida("   function SC_btn_0() \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   var tem_hint;\r\n");
   $nm_saida->saida("   function nm_mostra_hint(nm_obj, nm_evt, nm_mens)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (nm_mens == \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       tem_hint = true;\r\n");
   $nm_saida->saida("       if (document.layers)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           theString=\"<DIV CLASS='ttip'>\" + nm_mens + \"</DIV>\";\r\n");
   $nm_saida->saida("           document.tooltip.document.write(theString);\r\n");
   $nm_saida->saida("           document.tooltip.document.close();\r\n");
   $nm_saida->saida("           document.tooltip.left = nm_evt.pageX + 14;\r\n");
   $nm_saida->saida("           document.tooltip.top = nm_evt.pageY + 2;\r\n");
   $nm_saida->saida("           document.tooltip.visibility = \"show\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if(document.getElementById)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("              nmdg_nav = navigator.appName;\r\n");
   $nm_saida->saida("              elm = document.getElementById(\"tooltip\");\r\n");
   $nm_saida->saida("              elml = nm_obj;\r\n");
   $nm_saida->saida("              elm.innerHTML = nm_mens;\r\n");
   $nm_saida->saida("              if (nmdg_nav == \"Netscape\")\r\n");
   $nm_saida->saida("              {\r\n");
   $nm_saida->saida("                  elm.style.height = elml.style.height;\r\n");
   $nm_saida->saida("                  elm.style.top = nm_evt.pageY + 2 + 'px';\r\n");
   $nm_saida->saida("                  elm.style.left = nm_evt.pageX + 14 + 'px';\r\n");
   $nm_saida->saida("              }\r\n");
   $nm_saida->saida("              else\r\n");
   $nm_saida->saida("              {\r\n");
   $nm_saida->saida("                  elm.style.top = nm_evt.y + document.body.scrollTop + 10 + 'px';\r\n");
   $nm_saida->saida("                  elm.style.left = nm_evt.x + document.body.scrollLeft + 10 + 'px';\r\n");
   $nm_saida->saida("              }\r\n");
   $nm_saida->saida("              elm.style.visibility = \"visible\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_apaga_hint()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (!tem_hint)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       tem_hint = false;\r\n");
   $nm_saida->saida("       if (document.layers)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.tooltip.visibility = \"hidden\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if(document.getElementById)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("              elm.style.visibility = \"hidden\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['ajax_nav'])
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
   $nm_saida->saida("   function nm_gp_submit4(apl_lig, apl_saida, parms, target, opc, apl_name, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target = target; \r\n");
   $nm_saida->saida("      document.F3.action = apl_lig  ;\r\n");
   $nm_saida->saida("      if (opc == 'igual' || opc == 'novo') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = opc;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      if (opc != null && opc != '') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"grid\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"igual\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value   = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value       = parms ;\r\n");
   $nm_saida->saida("      if (target == '_blank') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_ancor_ult_lig = ancor;\r\n");
   $nm_saida->saida("          document.F3.nmgp_outra_jan.value = \"true\" ;\r\n");
   $nm_saida->saida("          window.open('','jan_sc','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          document.F3.target = \"jan_sc\"; \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (ancor != null && target == '_self') {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit5(apl_lig, apl_saida, parms, target, opc, modal_h, modal_w, m_confirm, apl_name, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      parms = parms.replace(/@percent@/g, \"%\"); \r\n");
   $nm_saida->saida("      if (m_confirm != null && m_confirm != '') \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          if (confirm(m_confirm))\r\n");
   $nm_saida->saida("          { }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("             return;\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (apl_lig.substr(0, 7) == \"http://\" || apl_lig.substr(0, 8) == \"https://\")\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          if (target == '_blank') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.open (apl_lig);\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.location = apl_lig;\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          return;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (target == 'modal' || target == 'modal_rpdf') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_ancor_ult_lig = ancor;\r\n");
   $nm_saida->saida("          par_modal = '?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&SC_lig_apl_orig=grid_grupo_x_asig_x_doce_p_eval';\r\n");
   $nm_saida->saida("          if (opc != null && opc != '') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              par_modal += '&nmgp_opcao=grid';\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          if (parms != null && parms != '') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              par_modal += '&nmgp_parms=' + parms;\r\n");
   $nm_saida->saida("          }\r\n");
   $Sc_parent = "";
   if ($this->grid_emb_form || $this->grid_emb_form_full)
   {
       $Sc_parent = "parent.";
   }
   $nm_saida->saida("          if (target == 'modal') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("               " . $Sc_parent . "tb_show('', apl_lig + par_modal + '&TB_iframe=true&modal=true&height=' + modal_h + '&width=' + modal_w, '');\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("               " . $Sc_parent . "tb_show('', apl_lig + par_modal + '&TB_iframe=true&height=' + modal_h + '&width=' + modal_w, '');\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          return;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.target = target; \r\n");
   $nm_saida->saida("      if (target == '_blank') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_ancor_ult_lig = ancor;\r\n");
   $nm_saida->saida("          document.F3.nmgp_outra_jan.value = \"true\" ;\r\n");
   $nm_saida->saida("          window.open('','jan_sc','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          document.F3.target = \"jan_sc\"; \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.action = apl_lig  ;\r\n");
   $nm_saida->saida("      if (opc != null && opc != '') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"grid\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      if (ancor != null && target == '_self') {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      document.F3.nmgp_outra_jan.value   = \"\" ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit6(apl_lig, apl_saida, parms, target, pos, alt, larg, opc, modal_h, modal_w, m_confirm, apl_name, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (apl_lig.substr(0, 7) == \"http://\" || apl_lig.substr(0, 8) == \"https://\")\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          if (target == '_blank') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.open (apl_lig);\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.location = apl_lig;\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          return;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (pos == \"A\") {obj = document.getElementById('nmsc_iframe_liga_A_grid_grupo_x_asig_x_doce_p_eval');} \r\n");
   $nm_saida->saida("      if (pos == \"B\") {obj = document.getElementById('nmsc_iframe_liga_B_grid_grupo_x_asig_x_doce_p_eval');} \r\n");
   $nm_saida->saida("      if (pos == \"E\") {obj = document.getElementById('nmsc_iframe_liga_E_grid_grupo_x_asig_x_doce_p_eval');} \r\n");
   $nm_saida->saida("      if (pos == \"D\") {obj = document.getElementById('nmsc_iframe_liga_D_grid_grupo_x_asig_x_doce_p_eval');} \r\n");
   $nm_saida->saida("      obj.style.height = (alt == parseInt(alt)) ? alt + 'px' : alt;\r\n");
   $nm_saida->saida("      obj.style.width  = (larg == parseInt(larg)) ? larg + 'px' : larg;\r\n");
   $nm_saida->saida("      document.F3.target = target; \r\n");
   $nm_saida->saida("      document.F3.action = apl_lig  ;\r\n");
   $nm_saida->saida("      if (opc != null && opc != '') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"grid\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      if (ancor != null && target == '_self') {\r\n");
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['grid_grupo_x_asig_x_doce_p_eval_iframe_params'] = array(
       'str_tmp'    => $this->Ini->path_imag_temp,
       'str_prod'   => $this->Ini->path_prod,
       'str_btn'    => $this->Ini->Str_btn_css,
       'str_lang'   => $this->Ini->str_lang,
       'str_schema' => $this->Ini->str_schema_all,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?script_case_session?#?" . session_id() . "?@?pbfile?#?" . $str_pbfile . "?@?jspath?#?" . $this->Ini->path_js . "?@?sc_apbgcol?#?" . $this->Ini->path_css . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_grupo_x_asig_x_doce_p_eval@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           window.location = \"" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_graf_pdf=\" + g;\r\n");
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
   $nm_saida->saida("       window.open('" . $this->Ini->path_link . "grid_grupo_x_asig_x_doce_p_eval/grid_grupo_x_asig_x_doce_p_eval_iframe_prt.php?path_botoes=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&opcao=print&tp_print=' + tp + '&cor_print=' + cor,'','location=no,menubar,resizable,scrollbars,status=no,toolbar');\r\n");
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
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campo_psq_ret']))
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$script_case_init]['grid_grupo_x_asig_x_doce_p_eval']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Doc = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Doc = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Doc = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['campo_psq_ret'] . "\");\r\n");
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
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['js_apos_busca'] . "();\r\n");
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
   $nm_saida->saida("      document.F5.action = \"grid_grupo_x_asig_x_doce_p_eval_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval']['reg_start']))
   {
       $nm_saida->saida("      parent.scAjaxDetailStatus('grid_grupo_x_asig_x_doce_p_eval');\r\n");
       $nm_saida->saida("      parent.scAjaxDetailHeight('grid_grupo_x_asig_x_doce_p_eval', $(document).innerHeight());\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
 }
function modelo_superacion()
{
$_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_p_eval']['contr_erro'] = 'on';
if (!isset($_SESSION['fecha_hoy_s'])) {$_SESSION['fecha_hoy_s'] = "";}
if (!isset($this->sc_temp_fecha_hoy_s)) {$this->sc_temp_fecha_hoy_s = (isset($_SESSION['fecha_hoy_s'])) ? $_SESSION['fecha_hoy_s'] : "";}
if (!isset($_SESSION['par_cierre_p4_s'])) {$_SESSION['par_cierre_p4_s'] = "";}
if (!isset($this->sc_temp_par_cierre_p4_s)) {$this->sc_temp_par_cierre_p4_s = (isset($_SESSION['par_cierre_p4_s'])) ? $_SESSION['par_cierre_p4_s'] : "";}
if (!isset($_SESSION['par_apertura_p4_s'])) {$_SESSION['par_apertura_p4_s'] = "";}
if (!isset($this->sc_temp_par_apertura_p4_s)) {$this->sc_temp_par_apertura_p4_s = (isset($_SESSION['par_apertura_p4_s'])) ? $_SESSION['par_apertura_p4_s'] : "";}
if (!isset($_SESSION['par_cierre_p3_s'])) {$_SESSION['par_cierre_p3_s'] = "";}
if (!isset($this->sc_temp_par_cierre_p3_s)) {$this->sc_temp_par_cierre_p3_s = (isset($_SESSION['par_cierre_p3_s'])) ? $_SESSION['par_cierre_p3_s'] : "";}
if (!isset($_SESSION['par_apertura_p3_s'])) {$_SESSION['par_apertura_p3_s'] = "";}
if (!isset($this->sc_temp_par_apertura_p3_s)) {$this->sc_temp_par_apertura_p3_s = (isset($_SESSION['par_apertura_p3_s'])) ? $_SESSION['par_apertura_p3_s'] : "";}
if (!isset($_SESSION['par_cierre_p2_s'])) {$_SESSION['par_cierre_p2_s'] = "";}
if (!isset($this->sc_temp_par_cierre_p2_s)) {$this->sc_temp_par_cierre_p2_s = (isset($_SESSION['par_cierre_p2_s'])) ? $_SESSION['par_cierre_p2_s'] : "";}
if (!isset($_SESSION['par_apertura_p2_s'])) {$_SESSION['par_apertura_p2_s'] = "";}
if (!isset($this->sc_temp_par_apertura_p2_s)) {$this->sc_temp_par_apertura_p2_s = (isset($_SESSION['par_apertura_p2_s'])) ? $_SESSION['par_apertura_p2_s'] : "";}
if (!isset($_SESSION['par_cierre_p1_s'])) {$_SESSION['par_cierre_p1_s'] = "";}
if (!isset($this->sc_temp_par_cierre_p1_s)) {$this->sc_temp_par_cierre_p1_s = (isset($_SESSION['par_cierre_p1_s'])) ? $_SESSION['par_cierre_p1_s'] : "";}
if (!isset($_SESSION['par_apertura_p1_s'])) {$_SESSION['par_apertura_p1_s'] = "";}
if (!isset($this->sc_temp_par_apertura_p1_s)) {$this->sc_temp_par_apertura_p1_s = (isset($_SESSION['par_apertura_p1_s'])) ? $_SESSION['par_apertura_p1_s'] : "";}
     


$check_sql_s = "SELECT apertura, cierre"
   . " FROM periodos_superacion ORDER BY periodos ASC";
 
      $nm_select = $check_sql_s; 
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
    $this->sc_temp_par_apertura_p1_s =  $this->rs[0][0];
	$this->sc_temp_par_cierre_p1_s = $this->rs[0][1];
	$this->sc_temp_par_apertura_p2_s = $this->rs[1][0];
    $this->sc_temp_par_cierre_p2_s = $this->rs[1][1];
	$this->sc_temp_par_apertura_p3_s = $this->rs[2][0];
    $this->sc_temp_par_cierre_p3_s = $this->rs[2][1];
	$this->sc_temp_par_apertura_p4_s =$this->rs[3][0];
    $this->sc_temp_par_cierre_p4_s = $this->rs[3][1];
	
	echo $this->sc_temp_par_apertura_p1_s;
	echo $this->sc_temp_par_cierre_p1_s;
}
		else     
{
    $this->sc_temp_par_apertura_p1_s = '';
    $this->sc_temp_par_cierre_p1_s = '';
	$this->sc_temp_par_apertura_p2_s = '';
    $this->sc_temp_par_cierre_p2_s = '';
	$this->sc_temp_par_apertura_p3_s = '';
    $this->sc_temp_par_cierre_p3_s = '';
	$this->sc_temp_par_apertura_p4_s = '';
    $this->sc_temp_par_cierre_p4_s = '';
}


$this->sc_temp_fecha_hoy_s= date('Y-m-d');
if (isset($this->sc_temp_par_apertura_p1_s)) {$_SESSION['par_apertura_p1_s'] = $this->sc_temp_par_apertura_p1_s;}
if (isset($this->sc_temp_par_cierre_p1_s)) {$_SESSION['par_cierre_p1_s'] = $this->sc_temp_par_cierre_p1_s;}
if (isset($this->sc_temp_par_apertura_p2_s)) {$_SESSION['par_apertura_p2_s'] = $this->sc_temp_par_apertura_p2_s;}
if (isset($this->sc_temp_par_cierre_p2_s)) {$_SESSION['par_cierre_p2_s'] = $this->sc_temp_par_cierre_p2_s;}
if (isset($this->sc_temp_par_apertura_p3_s)) {$_SESSION['par_apertura_p3_s'] = $this->sc_temp_par_apertura_p3_s;}
if (isset($this->sc_temp_par_cierre_p3_s)) {$_SESSION['par_cierre_p3_s'] = $this->sc_temp_par_cierre_p3_s;}
if (isset($this->sc_temp_par_apertura_p4_s)) {$_SESSION['par_apertura_p4_s'] = $this->sc_temp_par_apertura_p4_s;}
if (isset($this->sc_temp_par_cierre_p4_s)) {$_SESSION['par_cierre_p4_s'] = $this->sc_temp_par_cierre_p4_s;}
if (isset($this->sc_temp_fecha_hoy_s)) {$_SESSION['fecha_hoy_s'] = $this->sc_temp_fecha_hoy_s;}
$_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_p_eval']['contr_erro'] = 'off';
}
function modelos_evaluacion()
{
$_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_p_eval']['contr_erro'] = 'on';
if (!isset($_SESSION['fecha_hoy'])) {$_SESSION['fecha_hoy'] = "";}
if (!isset($this->sc_temp_fecha_hoy)) {$this->sc_temp_fecha_hoy = (isset($_SESSION['fecha_hoy'])) ? $_SESSION['fecha_hoy'] : "";}
if (!isset($_SESSION['par_cierre_p4'])) {$_SESSION['par_cierre_p4'] = "";}
if (!isset($this->sc_temp_par_cierre_p4)) {$this->sc_temp_par_cierre_p4 = (isset($_SESSION['par_cierre_p4'])) ? $_SESSION['par_cierre_p4'] : "";}
if (!isset($_SESSION['par_apertura_p4'])) {$_SESSION['par_apertura_p4'] = "";}
if (!isset($this->sc_temp_par_apertura_p4)) {$this->sc_temp_par_apertura_p4 = (isset($_SESSION['par_apertura_p4'])) ? $_SESSION['par_apertura_p4'] : "";}
if (!isset($_SESSION['par_cierre_p3'])) {$_SESSION['par_cierre_p3'] = "";}
if (!isset($this->sc_temp_par_cierre_p3)) {$this->sc_temp_par_cierre_p3 = (isset($_SESSION['par_cierre_p3'])) ? $_SESSION['par_cierre_p3'] : "";}
if (!isset($_SESSION['par_apertura_p3'])) {$_SESSION['par_apertura_p3'] = "";}
if (!isset($this->sc_temp_par_apertura_p3)) {$this->sc_temp_par_apertura_p3 = (isset($_SESSION['par_apertura_p3'])) ? $_SESSION['par_apertura_p3'] : "";}
if (!isset($_SESSION['par_cierre_p2'])) {$_SESSION['par_cierre_p2'] = "";}
if (!isset($this->sc_temp_par_cierre_p2)) {$this->sc_temp_par_cierre_p2 = (isset($_SESSION['par_cierre_p2'])) ? $_SESSION['par_cierre_p2'] : "";}
if (!isset($_SESSION['par_apertura_p2'])) {$_SESSION['par_apertura_p2'] = "";}
if (!isset($this->sc_temp_par_apertura_p2)) {$this->sc_temp_par_apertura_p2 = (isset($_SESSION['par_apertura_p2'])) ? $_SESSION['par_apertura_p2'] : "";}
if (!isset($_SESSION['par_cierre_p1'])) {$_SESSION['par_cierre_p1'] = "";}
if (!isset($this->sc_temp_par_cierre_p1)) {$this->sc_temp_par_cierre_p1 = (isset($_SESSION['par_cierre_p1'])) ? $_SESSION['par_cierre_p1'] : "";}
if (!isset($_SESSION['par_apertura_p1'])) {$_SESSION['par_apertura_p1'] = "";}
if (!isset($this->sc_temp_par_apertura_p1)) {$this->sc_temp_par_apertura_p1 = (isset($_SESSION['par_apertura_p1'])) ? $_SESSION['par_apertura_p1'] : "";}
if (!isset($_SESSION['par_modelo'])) {$_SESSION['par_modelo'] = "";}
if (!isset($this->sc_temp_par_modelo)) {$this->sc_temp_par_modelo = (isset($_SESSION['par_modelo'])) ? $_SESSION['par_modelo'] : "";}
     


$check_sql = "SELECT id_modelo"
   . " FROM parametros_evaluacion";
 
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
    $this->sc_temp_par_modelo = $this->rs[0][0];
 
}
		else     
{
		  $this->sc_temp_par_modelo  = '';
   
}






$check_sql = "SELECT apertura, cierre"
   . " FROM periodos ORDER BY periodos ASC";
 
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
    $this->sc_temp_par_apertura_p1 =  $this->rs[0][0];
    $this->sc_temp_par_cierre_p1 = $this->rs[0][1];
	$this->sc_temp_par_apertura_p2 = $this->rs[1][0];
    $this->sc_temp_par_cierre_p2 = $this->rs[1][1];
	$this->sc_temp_par_apertura_p3 = $this->rs[2][0];
    $this->sc_temp_par_cierre_p3 = $this->rs[2][1];
	$this->sc_temp_par_apertura_p4 =$this->rs[3][0];
    $this->sc_temp_par_cierre_p4 = $this->rs[3][1];
}
		else     
{
    $this->sc_temp_par_apertura_p1 = '';
    $this->sc_temp_par_cierre_p1 = '';
	$this->sc_temp_par_apertura_p2 = '';
    $this->sc_temp_par_cierre_p2 = '';
	$this->sc_temp_par_apertura_p3 = '';
    $this->sc_temp_par_cierre_p3 = '';
	$this->sc_temp_par_apertura_p4 = '';
    $this->sc_temp_par_cierre_p4 = '';
}


$this->sc_temp_fecha_hoy= date('Y-m-d');





$check_sql = "SELECT id_modelo"
   . " FROM parametros_evaluacion";
 
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
    $this->sc_temp_par_modelo = $this->rs[0][0];
 
}
		else     
{
		  $this->sc_temp_par_modelo  = '';
   
}
if (isset($this->sc_temp_par_modelo)) {$_SESSION['par_modelo'] = $this->sc_temp_par_modelo;}
if (isset($this->sc_temp_par_apertura_p1)) {$_SESSION['par_apertura_p1'] = $this->sc_temp_par_apertura_p1;}
if (isset($this->sc_temp_par_cierre_p1)) {$_SESSION['par_cierre_p1'] = $this->sc_temp_par_cierre_p1;}
if (isset($this->sc_temp_par_apertura_p2)) {$_SESSION['par_apertura_p2'] = $this->sc_temp_par_apertura_p2;}
if (isset($this->sc_temp_par_cierre_p2)) {$_SESSION['par_cierre_p2'] = $this->sc_temp_par_cierre_p2;}
if (isset($this->sc_temp_par_apertura_p3)) {$_SESSION['par_apertura_p3'] = $this->sc_temp_par_apertura_p3;}
if (isset($this->sc_temp_par_cierre_p3)) {$_SESSION['par_cierre_p3'] = $this->sc_temp_par_cierre_p3;}
if (isset($this->sc_temp_par_apertura_p4)) {$_SESSION['par_apertura_p4'] = $this->sc_temp_par_apertura_p4;}
if (isset($this->sc_temp_par_cierre_p4)) {$_SESSION['par_cierre_p4'] = $this->sc_temp_par_cierre_p4;}
if (isset($this->sc_temp_fecha_hoy)) {$_SESSION['fecha_hoy'] = $this->sc_temp_fecha_hoy;}
$_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_p_eval']['contr_erro'] = 'off';
}
}
?>
