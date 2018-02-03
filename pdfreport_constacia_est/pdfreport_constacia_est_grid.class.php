<?php
class pdfreport_constacia_est_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $cadena_principal = array();
   var $cadena_principal_1 = array();
   var $cadena_secundaria = array();
   var $cargo_pri_firma = array();
   var $cargo_seg_firma = array();
   var $cod_dane = array();
   var $direccion = array();
   var $encabezado = array();
   var $especialidad = array();
   var $logo = array();
   var $municipio = array();
   var $nit = array();
   var $nombre_institucion = array();
   var $pie_pagina = array();
   var $primera_firma = array();
   var $segunda_firma = array();
   var $telefonos = array();
   var $idstudents = array();
   var $id_sede = array();
   var $id_jornada = array();
   var $semestre = array();
   var $tipo_identificacion = array();
   var $numero_documento = array();
   var $primer_nombre = array();
   var $segundo_nombre = array();
   var $primer_apellido = array();
   var $segundo_apellido = array();
   var $grado_igreso = array();
   var $id_grupo = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("es");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = 'Helvetica';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "LETTER";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_constacia_est']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_constacia_est", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->idstudents[0] = $Busca_temp['idstudents']; 
       $tmp_pos = strpos($this->idstudents[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->idstudents[0] = substr($this->idstudents[0], 0, $tmp_pos);
       }
       $idstudents_2 = $Busca_temp['idstudents_input_2']; 
       $this->idstudents_2 = $Busca_temp['idstudents_input_2']; 
       $this->id_sede[0] = $Busca_temp['id_sede']; 
       $tmp_pos = strpos($this->id_sede[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_sede[0] = substr($this->id_sede[0], 0, $tmp_pos);
       }
       $this->id_jornada[0] = $Busca_temp['id_jornada']; 
       $tmp_pos = strpos($this->id_jornada[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_jornada[0] = substr($this->id_jornada[0], 0, $tmp_pos);
       }
       $id_jornada_2 = $Busca_temp['id_jornada_input_2']; 
       $this->id_jornada_2 = $Busca_temp['id_jornada_input_2']; 
       $this->semestre[0] = $Busca_temp['semestre']; 
       $tmp_pos = strpos($this->semestre[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->semestre[0] = substr($this->semestre[0], 0, $tmp_pos);
       }
       $semestre_2 = $Busca_temp['semestre_input_2']; 
       $this->semestre_2 = $Busca_temp['semestre_input_2']; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_constacia_est']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_constacia_est']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_constacia_est']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_constacia_est']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_orig'] = " where idstudents =  " . $_SESSION['par_estudiante'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idstudents, id_sede, id_jornada, semestre, tipo_identificacion, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, grado_igreso, id_grupo from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idstudents, id_sede, id_jornada, semestre, tipo_identificacion, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, grado_igreso, id_grupo from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 8, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 8);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['idstudents'] = "Idstudents";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['id_sede'] = "Id Sede";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['id_jornada'] = "Id Jornada";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['semestre'] = "Semestre";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['tipo_identificacion'] = "Tipo Identificacion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['numero_documento'] = "Numero Documento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['primer_nombre'] = "Primer Nombre";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['segundo_nombre'] = "Segundo Nombre";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['primer_apellido'] = "Primer Apellido";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['segundo_apellido'] = "Segundo Apellido";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['grado_igreso'] = "Grado Igreso";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['id_grupo'] = "Id Grupo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['cadena_principal'] = "cadena_principal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['cadena_principal_1'] = "cadena_principal_1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['cadena_secundaria'] = "cadena_secundaria";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['cargo_pri_firma'] = "cargo_pri_firma";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['cargo_seg_firma'] = "cargo_seg_firma";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['cod_dane'] = "cod_dane";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['direccion'] = "direccion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['encabezado'] = "encabezado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['especialidad'] = "especialidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['logo'] = "logo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['municipio'] = "municipio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['nit'] = "nit";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['nombre_institucion'] = "nombre_institucion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['pie_pagina'] = "pie_pagina";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['primera_firma'] = "primera_firma";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['segunda_firma'] = "segunda_firma";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['labels']['telefonos'] = "telefonos";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_constacia_est']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_constacia_est']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_constacia_est']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(10, 10, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->idstudents[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->idstudents[$this->nm_grid_colunas] = (string)$this->idstudents[$this->nm_grid_colunas];
          $this->id_sede[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->id_jornada[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->id_jornada[$this->nm_grid_colunas] = (string)$this->id_jornada[$this->nm_grid_colunas];
          $this->semestre[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->semestre[$this->nm_grid_colunas] = (string)$this->semestre[$this->nm_grid_colunas];
          $this->tipo_identificacion[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->numero_documento[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->primer_nombre[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->segundo_nombre[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->primer_apellido[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->segundo_apellido[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->grado_igreso[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->grado_igreso[$this->nm_grid_colunas] = (string)$this->grado_igreso[$this->nm_grid_colunas];
          $this->id_grupo[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->id_grupo[$this->nm_grid_colunas] = (string)$this->id_grupo[$this->nm_grid_colunas];
          $this->cadena_principal[$this->nm_grid_colunas] = "";
          $this->cadena_principal_1[$this->nm_grid_colunas] = "";
          $this->cadena_secundaria[$this->nm_grid_colunas] = "";
          $this->cargo_pri_firma[$this->nm_grid_colunas] = "";
          $this->cargo_seg_firma[$this->nm_grid_colunas] = "";
          $this->cod_dane[$this->nm_grid_colunas] = "";
          $this->direccion[$this->nm_grid_colunas] = "";
          $this->encabezado[$this->nm_grid_colunas] = "";
          $this->especialidad[$this->nm_grid_colunas] = "";
          $this->logo[$this->nm_grid_colunas] = "";
          $this->municipio[$this->nm_grid_colunas] = "";
          $this->nit[$this->nm_grid_colunas] = "";
          $this->nombre_institucion[$this->nm_grid_colunas] = "";
          $this->pie_pagina[$this->nm_grid_colunas] = "";
          $this->primera_firma[$this->nm_grid_colunas] = "";
          $this->segunda_firma[$this->nm_grid_colunas] = "";
          $this->telefonos[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['pdfreport_constacia_est']['contr_erro'] = 'on';
if (!isset($_SESSION['entorno'])) {$_SESSION['entorno'] = "";}
if (!isset($this->sc_temp_entorno)) {$this->sc_temp_entorno = (isset($_SESSION['entorno'])) ? $_SESSION['entorno'] : "";}
  

$check_sql = "SELECT logo, iddepartamento, idmunicipio, nombre_inst, nit, direccion, telefonos, cod_dane  "
   . " FROM datos_institucion"
   . " WHERE id = 1 ";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs[$this->nm_grid_colunas] = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$this->nm_grid_colunas][$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs[$this->nm_grid_colunas] = false;
          $this->rs_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[$this->nm_grid_colunas][0][0]))     
{
    $this->logo[$this->nm_grid_colunas]  = $this->rs[$this->nm_grid_colunas][0][0];
	$id_departamento =$this->rs[$this->nm_grid_colunas][0][1];
    $id_municipio =$this->rs[$this->nm_grid_colunas][0][2];
	$this->nombre_institucion[$this->nm_grid_colunas] =$this->rs[$this->nm_grid_colunas][0][3];
	$this->nit[$this->nm_grid_colunas] =$this->rs[$this->nm_grid_colunas][0][4];
	$this->direccion[$this->nm_grid_colunas] =$this->rs[$this->nm_grid_colunas][0][5];
	$this->telefonos[$this->nm_grid_colunas] =$this->rs[$this->nm_grid_colunas][0][6]; 
	$codigo_dane =$this->rs[$this->nm_grid_colunas][0][7]; 
}
		else     
{
		     $this->logo[$this->nm_grid_colunas]  = '';
  }        


switch ($this->grado_igreso[$this->nm_grid_colunas] ) {
    case "1":    
$nombre_grado = "MATERNO";
        break;
    case "2":   
$nombre_grado = "PRE-JARDIN";
        break;
    case "3":    
$nombre_grado = "JARDIN";
        break;
    case "4":    
$nombre_grado = "TRANSICIÓN";
        break;
	case "5":    
$nombre_grado = "PRIMERO";
        break;
    case "6":    
$nombre_grado = "SEGUNDO";
        break;
	case "7":    
$nombre_grado = "TERCERO";
        break;
	case "8":    
$nombre_grado = "CUARTO";
        break;
	case "9":    
$nombre_grado = "QUINTO";
        break;
	case "10":    
$nombre_grado = "SEXTO";
        break;
	case "11":    
$nombre_grado = "SEPTIMO";
        break;
	case "12":    
$nombre_grado = "OCTAVO";
        break;
	case "13":    
$nombre_grado = "NOVENO";
        break;
	case "14":    
$nombre_grado = "DECIMO";
        break;
	case "15":    
$nombre_grado = "ONCE";
        break;
	case "16":    
$nombre_grado = "EGRESADO";
        break;
}


$check_sql = "SELECT nombre_grupo"
   . " FROM t_grupos"
   . " WHERE id_grupo = '" .$this->id_grupo[$this->nm_grid_colunas] . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs[$this->nm_grid_colunas] = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$this->nm_grid_colunas][$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs[$this->nm_grid_colunas] = false;
          $this->rs_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[$this->nm_grid_colunas][0][0]))     
{
   $nombre_grupo = $this->rs[$this->nm_grid_colunas][0][0];
   
}
		else     
{
		    $nombre_grupo = '';
   
}



$check_sql = "SELECT jornada"
   . " FROM jornadas"
   . " WHERE id_jornada = '" .$this->id_jornada[$this->nm_grid_colunas] . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs[$this->nm_grid_colunas] = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$this->nm_grid_colunas][$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs[$this->nm_grid_colunas] = false;
          $this->rs_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[$this->nm_grid_colunas][0][0]))     
{
    $nombre_jornada = $this->rs[$this->nm_grid_colunas][0][0];
   
}
		else     
{
		   $nombre_jornada = '';
   
}











$this->cadena_principal[$this->nm_grid_colunas]  = "Que ".$this->primer_apellido[$this->nm_grid_colunas] . " ".$this->segundo_apellido[$this->nm_grid_colunas] ." ".$this->primer_nombre[$this->nm_grid_colunas] ." ".$this->segundo_nombre[$this->nm_grid_colunas] ." identificado con ".$this->tipo_identificacion[$this->nm_grid_colunas] ." ".$this->numero_documento[$this->nm_grid_colunas] ." se encuentra matriculado en el grado ". $nombre_grado."y asiste a clases en el grupo ". $nombre_grupo . " en el calendario escolar A, año lectivo ". $this->sc_temp_entorno." , Jornada de la ".  $nombre_jornada;




$check_sql = "SELECT nombre"
   . " FROM departamento"
   . " WHERE iddepartamento = '" . $id_departamento . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs[$this->nm_grid_colunas] = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$this->nm_grid_colunas][$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs[$this->nm_grid_colunas] = false;
          $this->rs_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[$this->nm_grid_colunas][0][0]))     
{
    $nombre_departamento = $this->rs[$this->nm_grid_colunas][0][0];
   
}
		else     
{
		    $nombre_departamento = '';
   
}




$check_sql = "SELECT nombreMunicipio"
   . " FROM municipio"
   . " WHERE idmunicipio = '" . $id_municipio . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs[$this->nm_grid_colunas] = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$this->nm_grid_colunas][$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs[$this->nm_grid_colunas] = false;
          $this->rs_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[$this->nm_grid_colunas][0][0]))     
{
    $nombre_municipio = $this->rs[$this->nm_grid_colunas][0][0];
   
}
		else     
{
		    $nombre_municipio = '';
   
}

$nombre_municipio = ucwords(strtolower($nombre_municipio));
$nombre_departamento = ucwords(strtolower($nombre_departamento));


$this->cadena_secundaria[$this->nm_grid_colunas]  = "Para constancia se firma en ". $nombre_municipio. " (".$nombre_departamento."), el ". date('d-m-Y') ;


$this->nombre_institucion[$this->nm_grid_colunas]  =	$this->nombre_institucion[$this->nm_grid_colunas] ;
$this->nit[$this->nm_grid_colunas]  = "Nit: ".$this->nit[$this->nm_grid_colunas] ;
$this->direccion[$this->nm_grid_colunas]  = "Direccion: ".$this->direccion[$this->nm_grid_colunas]; 
$this->telefonos[$this->nm_grid_colunas]  ="Teléfono: ". $this->telefonos[$this->nm_grid_colunas];
$this->municipio[$this->nm_grid_colunas]  = "Municipio: ".  $nombre_municipio;
$this->cod_dane[$this->nm_grid_colunas]  = "Código DANE: ". $codigo_dane;	
	
	
	
	


$check_sql = "SELECT especialidad, primera_firma, cargo_pri_firma, segunda_firma, cargo_seg_firma, encabezado, pie_pagina"
   . " FROM constancias"
   . " WHERE id_constancia = '1'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs[$this->nm_grid_colunas] = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$this->nm_grid_colunas][$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs[$this->nm_grid_colunas] = false;
          $this->rs_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[$this->nm_grid_colunas][0][0]))     
{
$this->especialidad[$this->nm_grid_colunas] = $this->rs[$this->nm_grid_colunas][0][0];
$this->primera_firma[$this->nm_grid_colunas] = $this->rs[$this->nm_grid_colunas][0][1];
$this->cargo_pri_firma[$this->nm_grid_colunas] = $this->rs[$this->nm_grid_colunas][0][2];
$this->segunda_firma[$this->nm_grid_colunas] = $this->rs[$this->nm_grid_colunas][0][3];
$this->cargo_seg_firma[$this->nm_grid_colunas] = $this->rs[$this->nm_grid_colunas][0][4];
$this->encabezado[$this->nm_grid_colunas] = $this->rs[$this->nm_grid_colunas][0][5];
$this->pie_pagina[$this->nm_grid_colunas] = $this->rs[$this->nm_grid_colunas][0][6];
}
		else     
{
		    $this->especialidad[$this->nm_grid_colunas]  = '';
            $this->primera_firma[$this->nm_grid_colunas]  = '';
			 $this->cargo_pri_firma[$this->nm_grid_colunas]  = '';
            $this->segunda_firma[$this->nm_grid_colunas]  = '';
			 $this->cargo_seg_firma[$this->nm_grid_colunas]  = '';
            $this->encabezado[$this->nm_grid_colunas]  = '';
			$this->pie_pagina[$this->nm_grid_colunas]  = '';
}
if (isset($this->sc_temp_entorno)) {$_SESSION['entorno'] = $this->sc_temp_entorno;}
$_SESSION['scriptcase']['pdfreport_constacia_est']['contr_erro'] = 'off';
          $this->idstudents[$this->nm_grid_colunas] = sc_strip_script($this->idstudents[$this->nm_grid_colunas]);
          if ($this->idstudents[$this->nm_grid_colunas] === "") 
          { 
              $this->idstudents[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idstudents[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idstudents[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idstudents[$this->nm_grid_colunas]);
          $this->id_sede[$this->nm_grid_colunas] = sc_strip_script($this->id_sede[$this->nm_grid_colunas]);
          if ($this->id_sede[$this->nm_grid_colunas] === "") 
          { 
              $this->id_sede[$this->nm_grid_colunas] = "" ;  
          } 
          $this->id_sede[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_sede[$this->nm_grid_colunas]);
          $this->id_jornada[$this->nm_grid_colunas] = sc_strip_script($this->id_jornada[$this->nm_grid_colunas]);
          if ($this->id_jornada[$this->nm_grid_colunas] === "") 
          { 
              $this->id_jornada[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->id_jornada[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->id_jornada[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_jornada[$this->nm_grid_colunas]);
          $this->semestre[$this->nm_grid_colunas] = sc_strip_script($this->semestre[$this->nm_grid_colunas]);
          if ($this->semestre[$this->nm_grid_colunas] === "") 
          { 
              $this->semestre[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->semestre[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->semestre[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->semestre[$this->nm_grid_colunas]);
          $this->tipo_identificacion[$this->nm_grid_colunas] = sc_strip_script($this->tipo_identificacion[$this->nm_grid_colunas]);
          if ($this->tipo_identificacion[$this->nm_grid_colunas] === "") 
          { 
              $this->tipo_identificacion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tipo_identificacion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tipo_identificacion[$this->nm_grid_colunas]);
          $this->numero_documento[$this->nm_grid_colunas] = sc_strip_script($this->numero_documento[$this->nm_grid_colunas]);
          if ($this->numero_documento[$this->nm_grid_colunas] === "") 
          { 
              $this->numero_documento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->numero_documento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numero_documento[$this->nm_grid_colunas]);
          $this->primer_nombre[$this->nm_grid_colunas] = sc_strip_script($this->primer_nombre[$this->nm_grid_colunas]);
          if ($this->primer_nombre[$this->nm_grid_colunas] === "") 
          { 
              $this->primer_nombre[$this->nm_grid_colunas] = "" ;  
          } 
          $this->primer_nombre[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->primer_nombre[$this->nm_grid_colunas]);
          $this->segundo_nombre[$this->nm_grid_colunas] = sc_strip_script($this->segundo_nombre[$this->nm_grid_colunas]);
          if ($this->segundo_nombre[$this->nm_grid_colunas] === "") 
          { 
              $this->segundo_nombre[$this->nm_grid_colunas] = "" ;  
          } 
          $this->segundo_nombre[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->segundo_nombre[$this->nm_grid_colunas]);
          $this->primer_apellido[$this->nm_grid_colunas] = sc_strip_script($this->primer_apellido[$this->nm_grid_colunas]);
          if ($this->primer_apellido[$this->nm_grid_colunas] === "") 
          { 
              $this->primer_apellido[$this->nm_grid_colunas] = "" ;  
          } 
          $this->primer_apellido[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->primer_apellido[$this->nm_grid_colunas]);
          $this->segundo_apellido[$this->nm_grid_colunas] = sc_strip_script($this->segundo_apellido[$this->nm_grid_colunas]);
          if ($this->segundo_apellido[$this->nm_grid_colunas] === "") 
          { 
              $this->segundo_apellido[$this->nm_grid_colunas] = "" ;  
          } 
          $this->segundo_apellido[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->segundo_apellido[$this->nm_grid_colunas]);
          $this->grado_igreso[$this->nm_grid_colunas] = sc_strip_script($this->grado_igreso[$this->nm_grid_colunas]);
          if ($this->grado_igreso[$this->nm_grid_colunas] === "") 
          { 
              $this->grado_igreso[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->grado_igreso[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->grado_igreso[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->grado_igreso[$this->nm_grid_colunas]);
          $this->id_grupo[$this->nm_grid_colunas] = sc_strip_script($this->id_grupo[$this->nm_grid_colunas]);
          if ($this->id_grupo[$this->nm_grid_colunas] === "") 
          { 
              $this->id_grupo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->id_grupo[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->id_grupo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_grupo[$this->nm_grid_colunas]);
          if ($this->cadena_principal[$this->nm_grid_colunas] === "") 
          { 
              $this->cadena_principal[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cadena_principal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cadena_principal[$this->nm_grid_colunas]);
          if ($this->cadena_principal_1[$this->nm_grid_colunas] === "") 
          { 
              $this->cadena_principal_1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cadena_principal_1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cadena_principal_1[$this->nm_grid_colunas]);
          if ($this->cadena_secundaria[$this->nm_grid_colunas] === "") 
          { 
              $this->cadena_secundaria[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cadena_secundaria[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cadena_secundaria[$this->nm_grid_colunas]);
          if ($this->cargo_pri_firma[$this->nm_grid_colunas] === "") 
          { 
              $this->cargo_pri_firma[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cargo_pri_firma[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cargo_pri_firma[$this->nm_grid_colunas]);
          if ($this->cargo_seg_firma[$this->nm_grid_colunas] === "") 
          { 
              $this->cargo_seg_firma[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cargo_seg_firma[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cargo_seg_firma[$this->nm_grid_colunas]);
          if ($this->cod_dane[$this->nm_grid_colunas] === "") 
          { 
              $this->cod_dane[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cod_dane[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cod_dane[$this->nm_grid_colunas]);
          if ($this->direccion[$this->nm_grid_colunas] === "") 
          { 
              $this->direccion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->direccion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->direccion[$this->nm_grid_colunas]);
          if ($this->encabezado[$this->nm_grid_colunas] === "") 
          { 
              $this->encabezado[$this->nm_grid_colunas] = "" ;  
          } 
          $this->encabezado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->encabezado[$this->nm_grid_colunas]);
          if ($this->especialidad[$this->nm_grid_colunas] === "") 
          { 
              $this->especialidad[$this->nm_grid_colunas] = "" ;  
          } 
          $this->especialidad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->especialidad[$this->nm_grid_colunas]);
          if ($this->logo[$this->nm_grid_colunas] === "") 
          { 
              $this->logo[$this->nm_grid_colunas] = "" ;  
          } 
          elseif ($this->Ini->Gd_missing)
          { 
              $this->logo[$this->nm_grid_colunas] = "<span class=\"scErrorLine\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>";
          } 
          else 
          { 
              $this->logo[$this->nm_grid_colunas] = $this->Ini->root . $this->Ini->path_imagens . "" . "/" .  $this->logo[$this->nm_grid_colunas];
              $out_logo = $this->Ini->path_imag_temp . "/sc_logo_8080" . $_SESSION['scriptcase']['sc_num_img'] . ".jpg" ;  
              if (is_file($this->logo[$this->nm_grid_colunas])) 
              { 
                  $sc_obj_img = new nm_trata_img($this->logo[$this->nm_grid_colunas]);
                  $sc_obj_img->setWidth(80);
                  $sc_obj_img->setHeight(80);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_logo);
              } 
              $this->logo[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_logo;
              $_SESSION['scriptcase']['sc_num_img']++;
          } 
          if ($this->municipio[$this->nm_grid_colunas] === "") 
          { 
              $this->municipio[$this->nm_grid_colunas] = "" ;  
          } 
          $this->municipio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->municipio[$this->nm_grid_colunas]);
          if ($this->nit[$this->nm_grid_colunas] === "") 
          { 
              $this->nit[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nit[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nit[$this->nm_grid_colunas]);
          if ($this->nombre_institucion[$this->nm_grid_colunas] === "") 
          { 
              $this->nombre_institucion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nombre_institucion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nombre_institucion[$this->nm_grid_colunas]);
          if ($this->pie_pagina[$this->nm_grid_colunas] === "") 
          { 
              $this->pie_pagina[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pie_pagina[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pie_pagina[$this->nm_grid_colunas]);
          if ($this->primera_firma[$this->nm_grid_colunas] === "") 
          { 
              $this->primera_firma[$this->nm_grid_colunas] = "" ;  
          } 
          $this->primera_firma[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->primera_firma[$this->nm_grid_colunas]);
          if ($this->segunda_firma[$this->nm_grid_colunas] === "") 
          { 
              $this->segunda_firma[$this->nm_grid_colunas] = "" ;  
          } 
          $this->segunda_firma[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->segunda_firma[$this->nm_grid_colunas]);
          if ($this->telefonos[$this->nm_grid_colunas] === "") 
          { 
              $this->telefonos[$this->nm_grid_colunas] = "" ;  
          } 
          $this->telefonos[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->telefonos[$this->nm_grid_colunas]);
            $cell_logo = array('posx' => 23, 'posy' => 14, 'data' => $this->logo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nombre_institucion = array('posx' => 50, 'posy' => 15, 'data' => $this->nombre_institucion[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_municipio = array('posx' => 50, 'posy' => 20, 'data' => $this->municipio[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_direccion = array('posx' => 50, 'posy' => 23, 'data' => $this->direccion[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_telefonos = array('posx' => 50, 'posy' => 26, 'data' => $this->telefonos[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nit = array('posx' => 50, 'posy' => 29, 'data' => $this->nit[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cod_dane = array('posx' => 50, 'posy' => 32, 'data' => $this->cod_dane[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_encabezado = array('posx' => 30, 'posy' => 40, 'data' => $this->encabezado[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $hace_constar = array('posx' => 90, 'posy' => 70, 'data' => $this->SC_conv_utf8('HACE CONSTAR'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => BU);
            $cell_cadena_principal = array('posx' => 30, 'posy' => 85, 'data' => $this->cadena_principal[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cadena_secundaria = array('posx' => 30, 'posy' => 125, 'data' => $this->cadena_secundaria[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_especialidad = array('posx' => 0, 'posy' => 0, 'data' => $this->especialidad[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_primera_firma = array('posx' => 30, 'posy' => 155, 'data' => $this->primera_firma[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cargo_pri_firma = array('posx' => 30, 'posy' => 158, 'data' => $this->cargo_pri_firma[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_segunda_firma = array('posx' => 140, 'posy' => 155, 'data' => $this->segunda_firma[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cargo_seg_firma = array('posx' => 140, 'posy' => 158, 'data' => $this->cargo_seg_firma[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pie_pagina = array('posx' => 30, 'posy' => 200, 'data' => $this->pie_pagina[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);

            if (isset($cell_logo['data']) && !empty($cell_logo['data']) && is_file($cell_logo['data']))
            {
                $this->Pdf->Image($cell_logo['data'], $cell_logo['posx'], $cell_logo['posy'], 0, 0);
            }

            $this->Pdf->SetFont($cell_nombre_institucion['font_type'], $cell_nombre_institucion['font_style'], $cell_nombre_institucion['font_size']);
            $this->pdf_text_color($cell_nombre_institucion['data'], $cell_nombre_institucion['color_r'], $cell_nombre_institucion['color_g'], $cell_nombre_institucion['color_b']);
            if (!empty($cell_nombre_institucion['posx']) && !empty($cell_nombre_institucion['posy']))
            {
                $this->Pdf->SetXY($cell_nombre_institucion['posx'], $cell_nombre_institucion['posy']);
            }
            elseif (!empty($cell_nombre_institucion['posx']))
            {
                $this->Pdf->SetX($cell_nombre_institucion['posx']);
            }
            elseif (!empty($cell_nombre_institucion['posy']))
            {
                $this->Pdf->SetY($cell_nombre_institucion['posy']);
            }
            $this->Pdf->Cell($cell_nombre_institucion['width'], 0, $cell_nombre_institucion['data'], 0, 0, $cell_nombre_institucion['align']);

            $this->Pdf->SetFont($cell_municipio['font_type'], $cell_municipio['font_style'], $cell_municipio['font_size']);
            $this->pdf_text_color($cell_municipio['data'], $cell_municipio['color_r'], $cell_municipio['color_g'], $cell_municipio['color_b']);
            if (!empty($cell_municipio['posx']) && !empty($cell_municipio['posy']))
            {
                $this->Pdf->SetXY($cell_municipio['posx'], $cell_municipio['posy']);
            }
            elseif (!empty($cell_municipio['posx']))
            {
                $this->Pdf->SetX($cell_municipio['posx']);
            }
            elseif (!empty($cell_municipio['posy']))
            {
                $this->Pdf->SetY($cell_municipio['posy']);
            }
            $this->Pdf->Cell($cell_municipio['width'], 0, $cell_municipio['data'], 0, 0, $cell_municipio['align']);

            $this->Pdf->SetFont($cell_direccion['font_type'], $cell_direccion['font_style'], $cell_direccion['font_size']);
            $this->pdf_text_color($cell_direccion['data'], $cell_direccion['color_r'], $cell_direccion['color_g'], $cell_direccion['color_b']);
            if (!empty($cell_direccion['posx']) && !empty($cell_direccion['posy']))
            {
                $this->Pdf->SetXY($cell_direccion['posx'], $cell_direccion['posy']);
            }
            elseif (!empty($cell_direccion['posx']))
            {
                $this->Pdf->SetX($cell_direccion['posx']);
            }
            elseif (!empty($cell_direccion['posy']))
            {
                $this->Pdf->SetY($cell_direccion['posy']);
            }
            $this->Pdf->Cell($cell_direccion['width'], 0, $cell_direccion['data'], 0, 0, $cell_direccion['align']);

            $this->Pdf->SetFont($cell_telefonos['font_type'], $cell_telefonos['font_style'], $cell_telefonos['font_size']);
            $this->pdf_text_color($cell_telefonos['data'], $cell_telefonos['color_r'], $cell_telefonos['color_g'], $cell_telefonos['color_b']);
            if (!empty($cell_telefonos['posx']) && !empty($cell_telefonos['posy']))
            {
                $this->Pdf->SetXY($cell_telefonos['posx'], $cell_telefonos['posy']);
            }
            elseif (!empty($cell_telefonos['posx']))
            {
                $this->Pdf->SetX($cell_telefonos['posx']);
            }
            elseif (!empty($cell_telefonos['posy']))
            {
                $this->Pdf->SetY($cell_telefonos['posy']);
            }
            $this->Pdf->Cell($cell_telefonos['width'], 0, $cell_telefonos['data'], 0, 0, $cell_telefonos['align']);

            $this->Pdf->SetFont($cell_nit['font_type'], $cell_nit['font_style'], $cell_nit['font_size']);
            $this->pdf_text_color($cell_nit['data'], $cell_nit['color_r'], $cell_nit['color_g'], $cell_nit['color_b']);
            if (!empty($cell_nit['posx']) && !empty($cell_nit['posy']))
            {
                $this->Pdf->SetXY($cell_nit['posx'], $cell_nit['posy']);
            }
            elseif (!empty($cell_nit['posx']))
            {
                $this->Pdf->SetX($cell_nit['posx']);
            }
            elseif (!empty($cell_nit['posy']))
            {
                $this->Pdf->SetY($cell_nit['posy']);
            }
            $this->Pdf->Cell($cell_nit['width'], 0, $cell_nit['data'], 0, 0, $cell_nit['align']);

            $this->Pdf->SetFont($cell_cod_dane['font_type'], $cell_cod_dane['font_style'], $cell_cod_dane['font_size']);
            $this->pdf_text_color($cell_cod_dane['data'], $cell_cod_dane['color_r'], $cell_cod_dane['color_g'], $cell_cod_dane['color_b']);
            if (!empty($cell_cod_dane['posx']) && !empty($cell_cod_dane['posy']))
            {
                $this->Pdf->SetXY($cell_cod_dane['posx'], $cell_cod_dane['posy']);
            }
            elseif (!empty($cell_cod_dane['posx']))
            {
                $this->Pdf->SetX($cell_cod_dane['posx']);
            }
            elseif (!empty($cell_cod_dane['posy']))
            {
                $this->Pdf->SetY($cell_cod_dane['posy']);
            }
            $this->Pdf->Cell($cell_cod_dane['width'], 0, $cell_cod_dane['data'], 0, 0, $cell_cod_dane['align']);


            $this->Pdf->SetFont($cell_encabezado['font_type'], $cell_encabezado['font_style'], $cell_encabezado['font_size']);
            $this->Pdf->SetTextColor($cell_encabezado['color_r'], $cell_encabezado['color_g'], $cell_encabezado['color_b']);
            if (!empty($cell_encabezado['posx']) && !empty($cell_encabezado['posy']))
            {
                $this->Pdf->SetXY($cell_encabezado['posx'], $cell_encabezado['posy']);
            }
            elseif (!empty($cell_encabezado['posx']))
            {
                $this->Pdf->SetX($cell_encabezado['posx']);
            }
            elseif (!empty($cell_encabezado['posy']))
            {
                $this->Pdf->SetY($cell_encabezado['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_encabezado['width'], 0, $cell_encabezado['data'], 0, 0, $cell_encabezado['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_encabezado['width'], 0, $atu_X, $atu_Y, $cell_encabezado['data'], 0, 0, false, true, $cell_encabezado['align']);
            }

            $this->Pdf->SetFont($hace_constar['font_type'], $hace_constar['font_style'], $hace_constar['font_size']);
            $this->pdf_text_color($hace_constar['data'], $hace_constar['color_r'], $hace_constar['color_g'], $hace_constar['color_b']);
            if (!empty($hace_constar['posx']) && !empty($hace_constar['posy']))
            {
                $this->Pdf->SetXY($hace_constar['posx'], $hace_constar['posy']);
            }
            elseif (!empty($hace_constar['posx']))
            {
                $this->Pdf->SetX($hace_constar['posx']);
            }
            elseif (!empty($hace_constar['posy']))
            {
                $this->Pdf->SetY($hace_constar['posy']);
            }
            $this->Pdf->Cell($hace_constar['width'], 0, $hace_constar['data'], 0, 0, $hace_constar['align']);


            $this->Pdf->SetFont($cell_cadena_principal['font_type'], $cell_cadena_principal['font_style'], $cell_cadena_principal['font_size']);
            $this->Pdf->SetTextColor($cell_cadena_principal['color_r'], $cell_cadena_principal['color_g'], $cell_cadena_principal['color_b']);
            if (!empty($cell_cadena_principal['posx']) && !empty($cell_cadena_principal['posy']))
            {
                $this->Pdf->SetXY($cell_cadena_principal['posx'], $cell_cadena_principal['posy']);
            }
            elseif (!empty($cell_cadena_principal['posx']))
            {
                $this->Pdf->SetX($cell_cadena_principal['posx']);
            }
            elseif (!empty($cell_cadena_principal['posy']))
            {
                $this->Pdf->SetY($cell_cadena_principal['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_cadena_principal['width'], 0, $cell_cadena_principal['data'], 0, 0, $cell_cadena_principal['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_cadena_principal['width'], 0, $atu_X, $atu_Y, $cell_cadena_principal['data'], 0, 0, false, true, $cell_cadena_principal['align']);
            }

            $this->Pdf->SetFont($cell_cadena_secundaria['font_type'], $cell_cadena_secundaria['font_style'], $cell_cadena_secundaria['font_size']);
            $this->pdf_text_color($cell_cadena_secundaria['data'], $cell_cadena_secundaria['color_r'], $cell_cadena_secundaria['color_g'], $cell_cadena_secundaria['color_b']);
            if (!empty($cell_cadena_secundaria['posx']) && !empty($cell_cadena_secundaria['posy']))
            {
                $this->Pdf->SetXY($cell_cadena_secundaria['posx'], $cell_cadena_secundaria['posy']);
            }
            elseif (!empty($cell_cadena_secundaria['posx']))
            {
                $this->Pdf->SetX($cell_cadena_secundaria['posx']);
            }
            elseif (!empty($cell_cadena_secundaria['posy']))
            {
                $this->Pdf->SetY($cell_cadena_secundaria['posy']);
            }
            $this->Pdf->Cell($cell_cadena_secundaria['width'], 0, $cell_cadena_secundaria['data'], 0, 0, $cell_cadena_secundaria['align']);

            $this->Pdf->SetFont($cell_especialidad['font_type'], $cell_especialidad['font_style'], $cell_especialidad['font_size']);
            $this->pdf_text_color($cell_especialidad['data'], $cell_especialidad['color_r'], $cell_especialidad['color_g'], $cell_especialidad['color_b']);
            if (!empty($cell_especialidad['posx']) && !empty($cell_especialidad['posy']))
            {
                $this->Pdf->SetXY($cell_especialidad['posx'], $cell_especialidad['posy']);
            }
            elseif (!empty($cell_especialidad['posx']))
            {
                $this->Pdf->SetX($cell_especialidad['posx']);
            }
            elseif (!empty($cell_especialidad['posy']))
            {
                $this->Pdf->SetY($cell_especialidad['posy']);
            }
            $this->Pdf->Cell($cell_especialidad['width'], 0, $cell_especialidad['data'], 0, 0, $cell_especialidad['align']);

            $this->Pdf->SetFont($cell_primera_firma['font_type'], $cell_primera_firma['font_style'], $cell_primera_firma['font_size']);
            $this->pdf_text_color($cell_primera_firma['data'], $cell_primera_firma['color_r'], $cell_primera_firma['color_g'], $cell_primera_firma['color_b']);
            if (!empty($cell_primera_firma['posx']) && !empty($cell_primera_firma['posy']))
            {
                $this->Pdf->SetXY($cell_primera_firma['posx'], $cell_primera_firma['posy']);
            }
            elseif (!empty($cell_primera_firma['posx']))
            {
                $this->Pdf->SetX($cell_primera_firma['posx']);
            }
            elseif (!empty($cell_primera_firma['posy']))
            {
                $this->Pdf->SetY($cell_primera_firma['posy']);
            }
            $this->Pdf->Cell($cell_primera_firma['width'], 0, $cell_primera_firma['data'], 0, 0, $cell_primera_firma['align']);

            $this->Pdf->SetFont($cell_cargo_pri_firma['font_type'], $cell_cargo_pri_firma['font_style'], $cell_cargo_pri_firma['font_size']);
            $this->pdf_text_color($cell_cargo_pri_firma['data'], $cell_cargo_pri_firma['color_r'], $cell_cargo_pri_firma['color_g'], $cell_cargo_pri_firma['color_b']);
            if (!empty($cell_cargo_pri_firma['posx']) && !empty($cell_cargo_pri_firma['posy']))
            {
                $this->Pdf->SetXY($cell_cargo_pri_firma['posx'], $cell_cargo_pri_firma['posy']);
            }
            elseif (!empty($cell_cargo_pri_firma['posx']))
            {
                $this->Pdf->SetX($cell_cargo_pri_firma['posx']);
            }
            elseif (!empty($cell_cargo_pri_firma['posy']))
            {
                $this->Pdf->SetY($cell_cargo_pri_firma['posy']);
            }
            $this->Pdf->Cell($cell_cargo_pri_firma['width'], 0, $cell_cargo_pri_firma['data'], 0, 0, $cell_cargo_pri_firma['align']);

            $this->Pdf->SetFont($cell_segunda_firma['font_type'], $cell_segunda_firma['font_style'], $cell_segunda_firma['font_size']);
            $this->pdf_text_color($cell_segunda_firma['data'], $cell_segunda_firma['color_r'], $cell_segunda_firma['color_g'], $cell_segunda_firma['color_b']);
            if (!empty($cell_segunda_firma['posx']) && !empty($cell_segunda_firma['posy']))
            {
                $this->Pdf->SetXY($cell_segunda_firma['posx'], $cell_segunda_firma['posy']);
            }
            elseif (!empty($cell_segunda_firma['posx']))
            {
                $this->Pdf->SetX($cell_segunda_firma['posx']);
            }
            elseif (!empty($cell_segunda_firma['posy']))
            {
                $this->Pdf->SetY($cell_segunda_firma['posy']);
            }
            $this->Pdf->Cell($cell_segunda_firma['width'], 0, $cell_segunda_firma['data'], 0, 0, $cell_segunda_firma['align']);

            $this->Pdf->SetFont($cell_cargo_seg_firma['font_type'], $cell_cargo_seg_firma['font_style'], $cell_cargo_seg_firma['font_size']);
            $this->pdf_text_color($cell_cargo_seg_firma['data'], $cell_cargo_seg_firma['color_r'], $cell_cargo_seg_firma['color_g'], $cell_cargo_seg_firma['color_b']);
            if (!empty($cell_cargo_seg_firma['posx']) && !empty($cell_cargo_seg_firma['posy']))
            {
                $this->Pdf->SetXY($cell_cargo_seg_firma['posx'], $cell_cargo_seg_firma['posy']);
            }
            elseif (!empty($cell_cargo_seg_firma['posx']))
            {
                $this->Pdf->SetX($cell_cargo_seg_firma['posx']);
            }
            elseif (!empty($cell_cargo_seg_firma['posy']))
            {
                $this->Pdf->SetY($cell_cargo_seg_firma['posy']);
            }
            $this->Pdf->Cell($cell_cargo_seg_firma['width'], 0, $cell_cargo_seg_firma['data'], 0, 0, $cell_cargo_seg_firma['align']);


            $this->Pdf->SetFont($cell_pie_pagina['font_type'], $cell_pie_pagina['font_style'], $cell_pie_pagina['font_size']);
            $this->Pdf->SetTextColor($cell_pie_pagina['color_r'], $cell_pie_pagina['color_g'], $cell_pie_pagina['color_b']);
            if (!empty($cell_pie_pagina['posx']) && !empty($cell_pie_pagina['posy']))
            {
                $this->Pdf->SetXY($cell_pie_pagina['posx'], $cell_pie_pagina['posy']);
            }
            elseif (!empty($cell_pie_pagina['posx']))
            {
                $this->Pdf->SetX($cell_pie_pagina['posx']);
            }
            elseif (!empty($cell_pie_pagina['posy']))
            {
                $this->Pdf->SetY($cell_pie_pagina['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_pie_pagina['width'], 0, $cell_pie_pagina['data'], 0, 0, $cell_pie_pagina['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_pie_pagina['width'], 0, $atu_X, $atu_Y, $cell_pie_pagina['data'], 0, 0, false, true, $cell_pie_pagina['align']);
            }
          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
