<?php
class pdfreport_grupo_matricula_grid
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
   var $anyo_mat = array();
   var $anyo_nacimiento = array();
   var $aprobado = array();
   var $caracter_acad = array();
   var $caracter_tec = array();
   var $cero = array();
   var $cinco = array();
   var $continuidad = array();
   var $cuatro = array();
   var $desertor = array();
   var $dia_mat = array();
   var $dia_nacimiento = array();
   var $diez = array();
   var $directtor_grupo = array();
   var $documento_docente_dg = array();
   var $dos = array();
   var $esp_agropec = array();
   var $esp_comercial = array();
   var $esp_normalista = array();
   var $esp_turismo = array();
   var $est_educativo = array();
   var $gen_femenino = array();
   var $gen_masculino = array();
   var $idmunicipio = array();
   var $institucion_educ = array();
   var $interno_no = array();
   var $interno_si = array();
   var $logo = array();
   var $mes_mat = array();
   var $mes_nacimiento = array();
   var $n_basica_prim = array();
   var $n_basica_secund = array();
   var $n_preescolar = array();
   var $nombre_docente_dg = array();
   var $nueve = array();
   var $nuevo = array();
   var $ocho = array();
   var $once = array();
   var $otro_modelo_aceleracion = array();
   var $otro_modelo_n1 = array();
   var $otro_modelo_n2 = array();
   var $reprobado = array();
   var $seis = array();
   var $siete = array();
   var $subsidio_no = array();
   var $subsidio_si = array();
   var $ti_cc = array();
   var $ti_ce = array();
   var $ti_rc = array();
   var $ti_ti = array();
   var $tres = array();
   var $uno = array();
   var $zona_rural = array();
   var $zona_urbana = array();
   var $idstudents = array();
   var $id_sede = array();
   var $id_jornada = array();
   var $semestre = array();
   var $estatus = array();
   var $fecha_matricula = array();
   var $tipo_identificacion = array();
   var $numero_documento = array();
   var $departanebti_expedicion = array();
   var $municipio_expedicion = array();
   var $primer_nombre = array();
   var $segundo_nombre = array();
   var $primer_apellido = array();
   var $segundo_apellido = array();
   var $firstname = array();
   var $lastname = array();
   var $genero = array();
   var $fecha_nacimiento = array();
   var $anos_cumplidos = array();
   var $dpto_nacimiento = array();
   var $municipio_nacimiento = array();
   var $address = array();
   var $barrio = array();
   var $zona = array();
   var $city = array();
   var $state = array();
   var $telefono = array();
   var $grado_anterior = array();
   var $last_year = array();
   var $nombre_ult_plantel = array();
   var $resultado = array();
   var $grado_igreso = array();
   var $id_nivel = array();
   var $subsidado = array();
   var $interno = array();
   var $id_grupo = array();
   var $otro_modelo = array();
   var $caracter = array();
   var $especialidad = array();
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
   $Tp_papel = "LEGAL";
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
   $_SESSION['scriptcase']['pdfreport_grupo_matricula']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_grupo_matricula", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['campos_busca'];
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
       $this->mes_nacimiento[0] = $Busca_temp['mes_nacimiento']; 
       $tmp_pos = strpos($this->mes_nacimiento[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->mes_nacimiento[0] = substr($this->mes_nacimiento[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_grupo_matricula']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_grupo_matricula']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_grupo_matricula']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_grupo_matricula']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_orig'] = " where id_grupo = " . $_SESSION['par_grupo'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idstudents, id_sede, id_jornada, semestre, estatus, fecha_matricula, tipo_identificacion, numero_documento, departanebti_expedicion, municipio_expedicion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, firstname, lastname, genero, fecha_nacimiento, anos_cumplidos, dpto_nacimiento, municipio_nacimiento, address, barrio, zona, city, state, telefono, grado_anterior, last_year, nombre_ult_plantel, resultado, grado_igreso, id_nivel, subsidado, interno, id_grupo, otro_modelo, caracter, especialidad from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idstudents, id_sede, id_jornada, semestre, estatus, fecha_matricula, tipo_identificacion, numero_documento, departanebti_expedicion, municipio_expedicion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, firstname, lastname, genero, fecha_nacimiento, anos_cumplidos, dpto_nacimiento, municipio_nacimiento, address, barrio, zona, city, state, telefono, grado_anterior, last_year, nombre_ult_plantel, resultado, grado_igreso, id_nivel, subsidado, interno, id_grupo, otro_modelo, caracter, especialidad from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['order_grid'] = $nmgp_order_by;
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
         $this->Pdf->SetFont($this->default_font, $this->default_style, 7, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 7);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__matricula_datos5.jpg", 1, 1, 216, 356, '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['idstudents'] = "Idstudents";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['id_sede'] = "Id Sede";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['id_jornada'] = "Id Jornada";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['semestre'] = "Semestre";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['estatus'] = "Estatus";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['fecha_matricula'] = "Fecha Matricula";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['tipo_identificacion'] = "Tipo Identificacion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['numero_documento'] = "Numero Documento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['departanebti_expedicion'] = "Departanebti Expedicion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['municipio_expedicion'] = "Municipio Expedicion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['primer_nombre'] = "Primer Nombre";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['segundo_nombre'] = "Segundo Nombre";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['primer_apellido'] = "Primer Apellido";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['segundo_apellido'] = "Segundo Apellido";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['firstname'] = "Firstname";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['lastname'] = "Lastname";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['genero'] = "Genero";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['fecha_nacimiento'] = "Fecha Nacimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['anos_cumplidos'] = "Anos Cumplidos";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['dpto_nacimiento'] = "Dpto Nacimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['municipio_nacimiento'] = "Municipio Nacimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['address'] = "Address";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['barrio'] = "Barrio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['zona'] = "Zona";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['city'] = "City";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['state'] = "State";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['telefono'] = "Telefono";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['grado_anterior'] = "Grado Anterior";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['last_year'] = "Last Year";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['nombre_ult_plantel'] = "Nombre Ult Plantel";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['resultado'] = "Resultado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['grado_igreso'] = "Grado Igreso";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['id_nivel'] = "Id Nivel";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['subsidado'] = "Subsidado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['interno'] = "Interno";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['id_grupo'] = "Id Grupo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['otro_modelo'] = "Otro Modelo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['caracter'] = "Caracter";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['especialidad'] = "Especialidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['anyo_mat'] = "anyo_mat";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['anyo_nacimiento'] = "anyo_nacimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['aprobado'] = "aprobado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['caracter_acad'] = "caracter_acad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['caracter_tec'] = "caracter_tec";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['cero'] = "cero";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['cinco'] = "cinco";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['continuidad'] = "continuidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['cuatro'] = "cuatro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['desertor'] = "desertor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['dia_mat'] = "dia_mat";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['dia_nacimiento'] = "dia_nacimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['diez'] = "diez";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['directtor_grupo'] = "directtor_grupo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['documento_docente_dg'] = "documento_docente_dg";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['dos'] = "dos";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['esp_agropec'] = "esp_agropec";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['esp_comercial'] = "esp_comercial";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['esp_normalista'] = "esp_normalista";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['esp_turismo'] = "esp_turismo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['est_educativo'] = "est_educativo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['gen_femenino'] = "gen_femenino";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['gen_masculino'] = "gen_masculino";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['idmunicipio'] = "idmunicipio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['institucion_educ'] = "institucion_educ";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['interno_no'] = "interno_no";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['interno_si'] = "interno_si";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['logo'] = "logo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['mes_mat'] = "mes_mat";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['mes_nacimiento'] = "mes_nacimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['n_basica_prim'] = "n_basica_prim";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['n_basica_secund'] = "n_basica_secund";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['n_preescolar'] = "n_preescolar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['nombre_docente_dg'] = "nombre_docente_dg";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['nueve'] = "nueve";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['nuevo'] = "nuevo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['ocho'] = "ocho";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['once'] = "once";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['otro_modelo_aceleracion'] = "otro_modelo_aceleracion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['otro_modelo_n1'] = "otro_modelo_n1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['otro_modelo_n2'] = "otro_modelo_n2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['reprobado'] = "reprobado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['seis'] = "seis";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['siete'] = "siete";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['subsidio_no'] = "subsidio_no";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['subsidio_si'] = "subsidio_si";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['ti_cc'] = "ti_cc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['ti_ce'] = "ti_ce";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['ti_rc'] = "ti_rc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['ti_ti'] = "ti_ti";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['tres'] = "tres";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['uno'] = "uno";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['zona_rural'] = "zona_rural";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['labels']['zona_urbana'] = "zona_urbana";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_grupo_matricula']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_grupo_matricula']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_grupo_matricula']['lig_edit'];
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
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grupo_matricula']['qt_col_grid']) 
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
          $this->estatus[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->fecha_matricula[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->tipo_identificacion[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->numero_documento[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->departanebti_expedicion[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->departanebti_expedicion[$this->nm_grid_colunas] = (string)$this->departanebti_expedicion[$this->nm_grid_colunas];
          $this->municipio_expedicion[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->municipio_expedicion[$this->nm_grid_colunas] = (string)$this->municipio_expedicion[$this->nm_grid_colunas];
          $this->primer_nombre[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->segundo_nombre[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->primer_apellido[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->segundo_apellido[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->firstname[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->lastname[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->genero[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->fecha_nacimiento[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->anos_cumplidos[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->anos_cumplidos[$this->nm_grid_colunas] = (string)$this->anos_cumplidos[$this->nm_grid_colunas];
          $this->dpto_nacimiento[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->dpto_nacimiento[$this->nm_grid_colunas] = (string)$this->dpto_nacimiento[$this->nm_grid_colunas];
          $this->municipio_nacimiento[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->municipio_nacimiento[$this->nm_grid_colunas] = (string)$this->municipio_nacimiento[$this->nm_grid_colunas];
          $this->address[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->barrio[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->zona[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->city[$this->nm_grid_colunas] = $this->rs_grid->fields[24] ;  
          $this->city[$this->nm_grid_colunas] = (string)$this->city[$this->nm_grid_colunas];
          $this->state[$this->nm_grid_colunas] = $this->rs_grid->fields[25] ;  
          $this->state[$this->nm_grid_colunas] = (string)$this->state[$this->nm_grid_colunas];
          $this->telefono[$this->nm_grid_colunas] = $this->rs_grid->fields[26] ;  
          $this->grado_anterior[$this->nm_grid_colunas] = $this->rs_grid->fields[27] ;  
          $this->grado_anterior[$this->nm_grid_colunas] = (string)$this->grado_anterior[$this->nm_grid_colunas];
          $this->last_year[$this->nm_grid_colunas] = $this->rs_grid->fields[28] ;  
          $this->nombre_ult_plantel[$this->nm_grid_colunas] = $this->rs_grid->fields[29] ;  
          $this->resultado[$this->nm_grid_colunas] = $this->rs_grid->fields[30] ;  
          $this->grado_igreso[$this->nm_grid_colunas] = $this->rs_grid->fields[31] ;  
          $this->grado_igreso[$this->nm_grid_colunas] = (string)$this->grado_igreso[$this->nm_grid_colunas];
          $this->id_nivel[$this->nm_grid_colunas] = $this->rs_grid->fields[32] ;  
          $this->id_nivel[$this->nm_grid_colunas] = (string)$this->id_nivel[$this->nm_grid_colunas];
          $this->subsidado[$this->nm_grid_colunas] = $this->rs_grid->fields[33] ;  
          $this->interno[$this->nm_grid_colunas] = $this->rs_grid->fields[34] ;  
          $this->id_grupo[$this->nm_grid_colunas] = $this->rs_grid->fields[35] ;  
          $this->id_grupo[$this->nm_grid_colunas] = (string)$this->id_grupo[$this->nm_grid_colunas];
          $this->otro_modelo[$this->nm_grid_colunas] = $this->rs_grid->fields[36] ;  
          $this->caracter[$this->nm_grid_colunas] = $this->rs_grid->fields[37] ;  
          $this->especialidad[$this->nm_grid_colunas] = $this->rs_grid->fields[38] ;  
          $this->anyo_mat[$this->nm_grid_colunas] = "";
          $this->anyo_nacimiento[$this->nm_grid_colunas] = "";
          $this->aprobado[$this->nm_grid_colunas] = "";
          $this->caracter_acad[$this->nm_grid_colunas] = "";
          $this->caracter_tec[$this->nm_grid_colunas] = "";
          $this->cero[$this->nm_grid_colunas] = "";
          $this->cinco[$this->nm_grid_colunas] = "";
          $this->continuidad[$this->nm_grid_colunas] = "";
          $this->cuatro[$this->nm_grid_colunas] = "";
          $this->desertor[$this->nm_grid_colunas] = "";
          $this->dia_mat[$this->nm_grid_colunas] = "";
          $this->dia_nacimiento[$this->nm_grid_colunas] = "";
          $this->diez[$this->nm_grid_colunas] = "";
          $this->directtor_grupo[$this->nm_grid_colunas] = "";
          $this->documento_docente_dg[$this->nm_grid_colunas] = "";
          $this->dos[$this->nm_grid_colunas] = "";
          $this->esp_agropec[$this->nm_grid_colunas] = "";
          $this->esp_comercial[$this->nm_grid_colunas] = "";
          $this->esp_normalista[$this->nm_grid_colunas] = "";
          $this->esp_turismo[$this->nm_grid_colunas] = "";
          $this->est_educativo[$this->nm_grid_colunas] = "";
          $this->gen_femenino[$this->nm_grid_colunas] = "";
          $this->gen_masculino[$this->nm_grid_colunas] = "";
          $this->idmunicipio[$this->nm_grid_colunas] = "";
          $this->institucion_educ[$this->nm_grid_colunas] = "";
          $this->interno_no[$this->nm_grid_colunas] = "";
          $this->interno_si[$this->nm_grid_colunas] = "";
          $this->logo[$this->nm_grid_colunas] = "";
          $this->mes_mat[$this->nm_grid_colunas] = "";
          $this->mes_nacimiento[$this->nm_grid_colunas] = "";
          $this->n_basica_prim[$this->nm_grid_colunas] = "";
          $this->n_basica_secund[$this->nm_grid_colunas] = "";
          $this->n_preescolar[$this->nm_grid_colunas] = "";
          $this->nombre_docente_dg[$this->nm_grid_colunas] = "";
          $this->nueve[$this->nm_grid_colunas] = "";
          $this->nuevo[$this->nm_grid_colunas] = "";
          $this->ocho[$this->nm_grid_colunas] = "";
          $this->once[$this->nm_grid_colunas] = "";
          $this->otro_modelo_aceleracion[$this->nm_grid_colunas] = "";
          $this->otro_modelo_n1[$this->nm_grid_colunas] = "";
          $this->otro_modelo_n2[$this->nm_grid_colunas] = "";
          $this->reprobado[$this->nm_grid_colunas] = "";
          $this->seis[$this->nm_grid_colunas] = "";
          $this->siete[$this->nm_grid_colunas] = "";
          $this->subsidio_no[$this->nm_grid_colunas] = "";
          $this->subsidio_si[$this->nm_grid_colunas] = "";
          $this->ti_cc[$this->nm_grid_colunas] = "";
          $this->ti_ce[$this->nm_grid_colunas] = "";
          $this->ti_rc[$this->nm_grid_colunas] = "";
          $this->ti_ti[$this->nm_grid_colunas] = "";
          $this->tres[$this->nm_grid_colunas] = "";
          $this->uno[$this->nm_grid_colunas] = "";
          $this->zona_rural[$this->nm_grid_colunas] = "";
          $this->zona_urbana[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['pdfreport_grupo_matricula']['contr_erro'] = 'on';
if (!isset($_SESSION['par_nombre_institucion'])) {$_SESSION['par_nombre_institucion'] = "";}
if (!isset($this->sc_temp_par_nombre_institucion)) {$this->sc_temp_par_nombre_institucion = (isset($_SESSION['par_nombre_institucion'])) ? $_SESSION['par_nombre_institucion'] : "";}
 $this->est_educativo[$this->nm_grid_colunas]  =  $this->sc_temp_par_nombre_institucion;
$this->institucion_educ[$this->nm_grid_colunas]  = $this->sc_temp_par_nombre_institucion;

$this->dia_mat[$this->nm_grid_colunas]  = $this->nm_conv_data_db($this->fecha_matricula[$this->nm_grid_colunas] , "aaaa/mm/dd", "dd");
$this->mes_mat[$this->nm_grid_colunas]  = $this->nm_conv_data_db($this->fecha_matricula[$this->nm_grid_colunas] , "aaaa/mm/dd", "mm");
$this->anyo_mat[$this->nm_grid_colunas]  = $this->nm_conv_data_db($this->fecha_matricula[$this->nm_grid_colunas] , "aaaa/mm/dd", "aaaa");
if($this->estatus[$this->nm_grid_colunas]  == "C"){
$this->continuidad[$this->nm_grid_colunas]  = "X";
$this->nuevo[$this->nm_grid_colunas]  = " ";	
}elseif($this->estatus[$this->nm_grid_colunas]  == "N"){
$this->continuidad[$this->nm_grid_colunas]  = " ";
$this->nuevo[$this->nm_grid_colunas]  = "X";	
}

	 

$check_sql = "SELECT logo, idmunicipio "
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
    $this->idmunicipio[$this->nm_grid_colunas] = $this->rs[$this->nm_grid_colunas][0][1];
   
}
		else     
{
		     $this->logo[$this->nm_grid_colunas]  = '';
             $this->idmunicipio[$this->nm_grid_colunas] = '';
}



$check_sql = "SELECT docentes.documento, docentes.primer_apellido, docentes.segundo_apellido, docentes.primer_nombre, docentes.segundo_nombre"
   . " FROM students
INNER JOIN t_grupos ON students.id_grupo = t_grupos.id_grupo
INNER JOIN docentes ON docentes.id_docente = t_grupos.id_director_grupo"
   . " WHERE students.id_grupo = '" . $this->id_grupo[$this->nm_grid_colunas]  . "'GROUP BY t_grupos.id_grupo";
 
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
$this->documento_docente_dg[$this->nm_grid_colunas] = $this->rs[$this->nm_grid_colunas][0][0];
	
$this->nombre_docente_dg[$this->nm_grid_colunas]  = $this->rs[$this->nm_grid_colunas][0][1].' '.$this->rs[$this->nm_grid_colunas][0][2].' '.$this->rs[$this->nm_grid_colunas][0][3].' '.$this->rs[$this->nm_grid_colunas][0][4];
    
	
}
		else     
{
		    $this->nombre_docente_dg[$this->nm_grid_colunas]  = '';
          
}

switch ($this->tipo_identificacion[$this->nm_grid_colunas] ) {
    case "CC":
    $this->ti_cc[$this->nm_grid_colunas]  = "X";
    $this->ti_rc[$this->nm_grid_colunas]  = " ";
    $this->ti_ti[$this->nm_grid_colunas]  = " ";
    $this->ti_ce[$this->nm_grid_colunas]  = " ";
        break;
    case "CE":
    $this->ti_cc[$this->nm_grid_colunas]  = " ";
    $this->ti_rc[$this->nm_grid_colunas]  = " ";
    $this->ti_ti[$this->nm_grid_colunas]  = " ";
    $this->ti_ce[$this->nm_grid_colunas]  = "X";
        break;
    case "RC":
    $this->ti_cc[$this->nm_grid_colunas]  = " ";
    $this->ti_rc[$this->nm_grid_colunas]  = "X";
    $this->ti_ti[$this->nm_grid_colunas]  = " ";
    $this->ti_ce[$this->nm_grid_colunas]  = " ";
        break;
	case "TI":
    $this->ti_cc[$this->nm_grid_colunas]  = " ";
    $this->ti_rc[$this->nm_grid_colunas]  = " ";
    $this->ti_ti[$this->nm_grid_colunas]  = "X";
    $this->ti_ce[$this->nm_grid_colunas]  = " ";
        break;
}

switch ($this->genero[$this->nm_grid_colunas] ) {
    case "M":
$this->gen_masculino[$this->nm_grid_colunas]  = "X";
$this->gen_femenino[$this->nm_grid_colunas]  =" ";
        break;
    case "F":
$this->gen_masculino[$this->nm_grid_colunas]  = " ";
$this->gen_femenino[$this->nm_grid_colunas]  ="X";
        break;
   
}
$this->dia_nacimiento[$this->nm_grid_colunas]  = $this->nm_conv_data_db($this->fecha_nacimiento[$this->nm_grid_colunas] , "aaaa/mm/dd", "dd");
$this->mes_nacimiento[$this->nm_grid_colunas]  = $this->nm_conv_data_db($this->fecha_nacimiento[$this->nm_grid_colunas] , "aaaa/mm/dd", "mm");
$this->anyo_nacimiento[$this->nm_grid_colunas]  = $this->nm_conv_data_db($this->fecha_nacimiento[$this->nm_grid_colunas] , "aaaa/mm/dd", "aaaa");


switch ($this->zona[$this->nm_grid_colunas] ) {
    case "Rural":
$this->zona_rural[$this->nm_grid_colunas]  = "X";
$this->zona_urbana[$this->nm_grid_colunas]  =" ";
        break;
    case "Urbana":
$this->zona_rural[$this->nm_grid_colunas]  = " ";
$this->zona_urbana[$this->nm_grid_colunas]  ="X";
        break;
}

$this->nombre_ult_plantel[$this->nm_grid_colunas]  = str_replace("Institución Educativa", "", $this->nombre_ult_plantel[$this->nm_grid_colunas] );

$this->resultado[$this->nm_grid_colunas] ;

switch ($this->resultado[$this->nm_grid_colunas] ) {
    case "A":
$this->aprobado[$this->nm_grid_colunas]  = "X";
$this->reprobado[$this->nm_grid_colunas]  =" ";
$this->desertor[$this->nm_grid_colunas]  =" ";
        break;
    case "R":
$this->aprobado[$this->nm_grid_colunas]  = " ";
$this->reprobado[$this->nm_grid_colunas]  ="X";
$this->desertor[$this->nm_grid_colunas]  =" ";
        break;
	 case "D":
$this->aprobado[$this->nm_grid_colunas]  = " ";
$this->reprobado[$this->nm_grid_colunas]  =" ";
$this->desertor[$this->nm_grid_colunas]  ="X";
        break;
}
switch ($this->grado_igreso[$this->nm_grid_colunas] ) {
    case 1 :
$this->cero[$this->nm_grid_colunas]  = "X";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";	
        break;
	  case 2 :
$this->cero[$this->nm_grid_colunas]  = "X";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
	  case 3 :
$this->cero[$this->nm_grid_colunas]  = "X";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
	  case 4 :
$this->cero[$this->nm_grid_colunas]  = "X";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
    case 5:
 
$this->cero[$this->nm_grid_colunas]  = " ";
$this->uno[$this->nm_grid_colunas]  = "X";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
	 
 case 6:
$this->cero[$this->nm_grid_colunas]  = " ";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  ="X";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
	 
 case 7:
$this->cero[$this->nm_grid_colunas]  = " ";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  ="X";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
	 
 case 8:
$this->cero[$this->nm_grid_colunas]  = " ";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  ="X";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
	
 case 9:
$this->cero[$this->nm_grid_colunas]  = " ";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  ="X";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
	 
 case 10:
$this->cero[$this->nm_grid_colunas]  = " ";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  ="X";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
	 
 case 11:
$this->cero[$this->nm_grid_colunas]  = " ";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  ="X";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
	
 case 12: 
$this->cero[$this->nm_grid_colunas]  = " ";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  ="X";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
	
 case 13:
$this->cero[$this->nm_grid_colunas]  = "";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  ="X";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
case 14:
$this->cero[$this->nm_grid_colunas]  = "";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	="X";
$this->once[$this->nm_grid_colunas]   =" ";
        break;
case 15:
$this->cero[$this->nm_grid_colunas]  = "";
$this->uno[$this->nm_grid_colunas]  = " ";
$this->dos[$this->nm_grid_colunas]  =" ";
$this->tres[$this->nm_grid_colunas]  =" ";
$this->cuatro[$this->nm_grid_colunas]  =" ";
$this->cinco[$this->nm_grid_colunas]  =" ";
$this->seis[$this->nm_grid_colunas]  =" ";
$this->siete[$this->nm_grid_colunas]  =" ";
$this->ocho[$this->nm_grid_colunas]  =" ";
$this->nueve[$this->nm_grid_colunas]  =" ";
$this->diez[$this->nm_grid_colunas] 	=" ";
$this->once[$this->nm_grid_colunas]   ="X";
        break;
	
}


switch ($this->id_nivel[$this->nm_grid_colunas] ) {
    case "1":
$this->n_preescolar[$this->nm_grid_colunas]  = "X";
$this->n_basica_prim[$this->nm_grid_colunas]  =" ";
$this->n_basica_secund[$this->nm_grid_colunas]  =" ";	
        break;
 case "2":
$this->n_preescolar[$this->nm_grid_colunas]  = " ";
$this->n_basica_prim[$this->nm_grid_colunas]  ="X";
$this->n_basica_secund[$this->nm_grid_colunas]  =" ";	
        break;
 case "3":
$this->n_preescolar[$this->nm_grid_colunas]  = " ";
$this->n_basica_prim[$this->nm_grid_colunas]  =" ";
$this->n_basica_secund[$this->nm_grid_colunas]  ="X";	
        break;
}


switch ($this->subsidado[$this->nm_grid_colunas] ) {
    case "Y":
$this->subsidio_si[$this->nm_grid_colunas]  = "X";
$this->subsidio_no[$this->nm_grid_colunas]  =" ";
        break;
 case "N":
$this->subsidio_si[$this->nm_grid_colunas]  = " ";
$this->subsidio_no[$this->nm_grid_colunas]  ="X";
        break;

}


switch ($this->interno[$this->nm_grid_colunas] ) {
    case "Y":
$this->interno_si[$this->nm_grid_colunas]  = "X";
$this->interno_no[$this->nm_grid_colunas]  =" ";
        break;
 case "N":
$this->interno_si[$this->nm_grid_colunas]  = " ";
$this->interno_no[$this->nm_grid_colunas]  ="X";
        break;

}
switch ($this->otro_modelo[$this->nm_grid_colunas] ) {
    case "N1":
$this->otro_modelo_n1[$this->nm_grid_colunas]  = "X";
$this->otro_modelo_n2[$this->nm_grid_colunas]  =" ";
$this->otro_modelo_aceleracion[$this->nm_grid_colunas]  =" ";	
        break;
 case "N2":
$this->otro_modelo_n1[$this->nm_grid_colunas]  = "";
$this->otro_modelo_n2[$this->nm_grid_colunas]  ="X";
$this->otro_modelo_aceleracion[$this->nm_grid_colunas]  =" ";	
        break;
 case "AC":
$this->otro_modelo_n1[$this->nm_grid_colunas]  = " ";
$this->otro_modelo_n2[$this->nm_grid_colunas]  =" ";
$this->otro_modelo_aceleracion[$this->nm_grid_colunas]  ="X";	
        break;
}

switch ($this->caracter[$this->nm_grid_colunas] ) {
    case "A":
$this->caracter_acad[$this->nm_grid_colunas]  = "X";
$this->caracter_tec[$this->nm_grid_colunas]  =" ";
        break;
 case "T":
$this->caracter_acad[$this->nm_grid_colunas]  = " ";
$this->caracter_tec[$this->nm_grid_colunas]  ="X";
        break;
}	

switch ($this->especialidad[$this->nm_grid_colunas] ) {
    case "C":
$this->esp_comercial[$this->nm_grid_colunas] = "X";
$this->esp_agropec[$this->nm_grid_colunas]  = " ";
$this->esp_turismo[$this->nm_grid_colunas]  = " ";
$this->esp_normalista[$this->nm_grid_colunas]  = " ";
        break;
    case "A":
$this->esp_comercial[$this->nm_grid_colunas] = " ";
$this->esp_agropec[$this->nm_grid_colunas]  = "X";
$this->esp_turismo[$this->nm_grid_colunas]  = " ";
$this->esp_normalista[$this->nm_grid_colunas]  = " ";
        break;
    case "T":
$this->esp_comercial[$this->nm_grid_colunas] = " ";
$this->esp_agropec[$this->nm_grid_colunas]  = " ";
$this->esp_turismo[$this->nm_grid_colunas]  = "X";
$this->esp_normalista[$this->nm_grid_colunas]  = " ";
        break;
	case "N":
$this->esp_comercial[$this->nm_grid_colunas] = " ";
$this->esp_agropec[$this->nm_grid_colunas]  = " ";
$this->esp_turismo[$this->nm_grid_colunas]  = " ";
$this->esp_normalista[$this->nm_grid_colunas]  = "X";
        break;
}
if (isset($this->sc_temp_par_nombre_institucion)) {$_SESSION['par_nombre_institucion'] = $this->sc_temp_par_nombre_institucion;}
$_SESSION['scriptcase']['pdfreport_grupo_matricula']['contr_erro'] = 'off';
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
          $this->Lookup->lookup_id_sede($this->id_sede[$this->nm_grid_colunas] , $this->id_sede[$this->nm_grid_colunas]) ; 
          $this->id_sede[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_sede[$this->nm_grid_colunas]);
          $this->Lookup->lookup_id_jornada($this->id_jornada[$this->nm_grid_colunas] , $this->id_jornada[$this->nm_grid_colunas]) ; 
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
          $this->estatus[$this->nm_grid_colunas] = sc_strip_script($this->estatus[$this->nm_grid_colunas]);
          if ($this->estatus[$this->nm_grid_colunas] === "") 
          { 
              $this->estatus[$this->nm_grid_colunas] = "" ;  
          } 
          $this->estatus[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->estatus[$this->nm_grid_colunas]);
          $this->fecha_matricula[$this->nm_grid_colunas] = sc_strip_script($this->fecha_matricula[$this->nm_grid_colunas]);
          if ($this->fecha_matricula[$this->nm_grid_colunas] === "") 
          { 
              $this->fecha_matricula[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fecha_matricula_x =  $this->fecha_matricula[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecha_matricula_x, "YYYY-MM-DD");
               if (is_numeric($fecha_matricula_x) && $fecha_matricula_x > 0) 
               { 
                   $this->nm_data->SetaData($this->fecha_matricula[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fecha_matricula[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecha_matricula[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecha_matricula[$this->nm_grid_colunas]);
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
          $this->Lookup->lookup_departanebti_expedicion($this->departanebti_expedicion[$this->nm_grid_colunas] , $this->departanebti_expedicion[$this->nm_grid_colunas]) ; 
          $this->departanebti_expedicion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->departanebti_expedicion[$this->nm_grid_colunas]);
          $this->Lookup->lookup_municipio_expedicion($this->municipio_expedicion[$this->nm_grid_colunas] , $this->municipio_expedicion[$this->nm_grid_colunas]) ; 
          $this->municipio_expedicion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->municipio_expedicion[$this->nm_grid_colunas]);
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
          $this->firstname[$this->nm_grid_colunas] = sc_strip_script($this->firstname[$this->nm_grid_colunas]);
          if ($this->firstname[$this->nm_grid_colunas] === "") 
          { 
              $this->firstname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->firstname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->firstname[$this->nm_grid_colunas]);
          $this->lastname[$this->nm_grid_colunas] = sc_strip_script($this->lastname[$this->nm_grid_colunas]);
          if ($this->lastname[$this->nm_grid_colunas] === "") 
          { 
              $this->lastname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->lastname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->lastname[$this->nm_grid_colunas]);
          $this->genero[$this->nm_grid_colunas] = sc_strip_script($this->genero[$this->nm_grid_colunas]);
          if ($this->genero[$this->nm_grid_colunas] === "") 
          { 
              $this->genero[$this->nm_grid_colunas] = "" ;  
          } 
          $this->genero[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->genero[$this->nm_grid_colunas]);
          $this->fecha_nacimiento[$this->nm_grid_colunas] = sc_strip_script($this->fecha_nacimiento[$this->nm_grid_colunas]);
          if ($this->fecha_nacimiento[$this->nm_grid_colunas] === "") 
          { 
              $this->fecha_nacimiento[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fecha_nacimiento_x =  $this->fecha_nacimiento[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecha_nacimiento_x, "YYYY-MM-DD");
               if (is_numeric($fecha_nacimiento_x) && $fecha_nacimiento_x > 0) 
               { 
                   $this->nm_data->SetaData($this->fecha_nacimiento[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fecha_nacimiento[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecha_nacimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecha_nacimiento[$this->nm_grid_colunas]);
          $this->anos_cumplidos[$this->nm_grid_colunas] = sc_strip_script($this->anos_cumplidos[$this->nm_grid_colunas]);
          if ($this->anos_cumplidos[$this->nm_grid_colunas] === "") 
          { 
              $this->anos_cumplidos[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anos_cumplidos[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->anos_cumplidos[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anos_cumplidos[$this->nm_grid_colunas]);
          $this->Lookup->lookup_dpto_nacimiento($this->dpto_nacimiento[$this->nm_grid_colunas] , $this->dpto_nacimiento[$this->nm_grid_colunas]) ; 
          $this->dpto_nacimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dpto_nacimiento[$this->nm_grid_colunas]);
          $this->Lookup->lookup_municipio_nacimiento($this->municipio_nacimiento[$this->nm_grid_colunas] , $this->municipio_nacimiento[$this->nm_grid_colunas]) ; 
          $this->municipio_nacimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->municipio_nacimiento[$this->nm_grid_colunas]);
          $this->address[$this->nm_grid_colunas] = sc_strip_script($this->address[$this->nm_grid_colunas]);
          if ($this->address[$this->nm_grid_colunas] === "") 
          { 
              $this->address[$this->nm_grid_colunas] = "" ;  
          } 
          $this->address[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->address[$this->nm_grid_colunas]);
          $this->barrio[$this->nm_grid_colunas] = sc_strip_script($this->barrio[$this->nm_grid_colunas]);
          if ($this->barrio[$this->nm_grid_colunas] === "") 
          { 
              $this->barrio[$this->nm_grid_colunas] = "" ;  
          } 
          $this->barrio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->barrio[$this->nm_grid_colunas]);
          $this->zona[$this->nm_grid_colunas] = sc_strip_script($this->zona[$this->nm_grid_colunas]);
          if ($this->zona[$this->nm_grid_colunas] === "") 
          { 
              $this->zona[$this->nm_grid_colunas] = "" ;  
          } 
          $this->zona[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->zona[$this->nm_grid_colunas]);
          $this->Lookup->lookup_city($this->city[$this->nm_grid_colunas] , $this->city[$this->nm_grid_colunas]) ; 
          $this->city[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->city[$this->nm_grid_colunas]);
          $this->Lookup->lookup_state($this->state[$this->nm_grid_colunas] , $this->state[$this->nm_grid_colunas]) ; 
          $this->state[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->state[$this->nm_grid_colunas]);
          $this->telefono[$this->nm_grid_colunas] = sc_strip_script($this->telefono[$this->nm_grid_colunas]);
          if ($this->telefono[$this->nm_grid_colunas] === "") 
          { 
              $this->telefono[$this->nm_grid_colunas] = "" ;  
          } 
          $this->telefono[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->telefono[$this->nm_grid_colunas]);
          $this->Lookup->lookup_grado_anterior($this->grado_anterior[$this->nm_grid_colunas] , $this->grado_anterior[$this->nm_grid_colunas]) ; 
          $this->grado_anterior[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->grado_anterior[$this->nm_grid_colunas]);
          $this->last_year[$this->nm_grid_colunas] = sc_strip_script($this->last_year[$this->nm_grid_colunas]);
          if ($this->last_year[$this->nm_grid_colunas] === "") 
          { 
              $this->last_year[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $last_year_x =  $this->last_year[$this->nm_grid_colunas];
               nm_conv_limpa_dado($last_year_x, "YYYY-MM-DD");
               if (is_numeric($last_year_x) && $last_year_x > 0) 
               { 
                   $this->nm_data->SetaData($this->last_year[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->last_year[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "aaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->last_year[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->last_year[$this->nm_grid_colunas]);
          $this->nombre_ult_plantel[$this->nm_grid_colunas] = sc_strip_script($this->nombre_ult_plantel[$this->nm_grid_colunas]);
          if ($this->nombre_ult_plantel[$this->nm_grid_colunas] === "") 
          { 
              $this->nombre_ult_plantel[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nombre_ult_plantel[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nombre_ult_plantel[$this->nm_grid_colunas]);
          $this->resultado[$this->nm_grid_colunas] = sc_strip_script($this->resultado[$this->nm_grid_colunas]);
          if ($this->resultado[$this->nm_grid_colunas] === "") 
          { 
              $this->resultado[$this->nm_grid_colunas] = "" ;  
          } 
          $this->resultado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->resultado[$this->nm_grid_colunas]);
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
          $this->id_nivel[$this->nm_grid_colunas] = sc_strip_script($this->id_nivel[$this->nm_grid_colunas]);
          if ($this->id_nivel[$this->nm_grid_colunas] === "") 
          { 
              $this->id_nivel[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->id_nivel[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->id_nivel[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_nivel[$this->nm_grid_colunas]);
          $this->subsidado[$this->nm_grid_colunas] = sc_strip_script($this->subsidado[$this->nm_grid_colunas]);
          if ($this->subsidado[$this->nm_grid_colunas] === "") 
          { 
              $this->subsidado[$this->nm_grid_colunas] = "" ;  
          } 
          $this->subsidado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->subsidado[$this->nm_grid_colunas]);
          $this->interno[$this->nm_grid_colunas] = sc_strip_script($this->interno[$this->nm_grid_colunas]);
          if ($this->interno[$this->nm_grid_colunas] === "") 
          { 
              $this->interno[$this->nm_grid_colunas] = "" ;  
          } 
          $this->interno[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->interno[$this->nm_grid_colunas]);
          $this->Lookup->lookup_id_grupo($this->id_grupo[$this->nm_grid_colunas] , $this->id_grupo[$this->nm_grid_colunas]) ; 
          $this->id_grupo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_grupo[$this->nm_grid_colunas]);
          $this->otro_modelo[$this->nm_grid_colunas] = sc_strip_script($this->otro_modelo[$this->nm_grid_colunas]);
          if ($this->otro_modelo[$this->nm_grid_colunas] === "") 
          { 
              $this->otro_modelo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->otro_modelo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->otro_modelo[$this->nm_grid_colunas]);
          $this->caracter[$this->nm_grid_colunas] = sc_strip_script($this->caracter[$this->nm_grid_colunas]);
          if ($this->caracter[$this->nm_grid_colunas] === "") 
          { 
              $this->caracter[$this->nm_grid_colunas] = "" ;  
          } 
          $this->caracter[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->caracter[$this->nm_grid_colunas]);
          $this->especialidad[$this->nm_grid_colunas] = sc_strip_script($this->especialidad[$this->nm_grid_colunas]);
          if ($this->especialidad[$this->nm_grid_colunas] === "") 
          { 
              $this->especialidad[$this->nm_grid_colunas] = "" ;  
          } 
          $this->especialidad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->especialidad[$this->nm_grid_colunas]);
          if ($this->anyo_mat[$this->nm_grid_colunas] === "") 
          { 
              $this->anyo_mat[$this->nm_grid_colunas] = "" ;  
          } 
          $this->anyo_mat[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anyo_mat[$this->nm_grid_colunas]);
          if ($this->anyo_nacimiento[$this->nm_grid_colunas] === "") 
          { 
              $this->anyo_nacimiento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->anyo_nacimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anyo_nacimiento[$this->nm_grid_colunas]);
          if ($this->aprobado[$this->nm_grid_colunas] === "") 
          { 
              $this->aprobado[$this->nm_grid_colunas] = "" ;  
          } 
          $this->aprobado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->aprobado[$this->nm_grid_colunas]);
          if ($this->caracter_acad[$this->nm_grid_colunas] === "") 
          { 
              $this->caracter_acad[$this->nm_grid_colunas] = "" ;  
          } 
          $this->caracter_acad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->caracter_acad[$this->nm_grid_colunas]);
          if ($this->caracter_tec[$this->nm_grid_colunas] === "") 
          { 
              $this->caracter_tec[$this->nm_grid_colunas] = "" ;  
          } 
          $this->caracter_tec[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->caracter_tec[$this->nm_grid_colunas]);
          if ($this->cero[$this->nm_grid_colunas] === "") 
          { 
              $this->cero[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cero[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cero[$this->nm_grid_colunas]);
          if ($this->cinco[$this->nm_grid_colunas] === "") 
          { 
              $this->cinco[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cinco[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cinco[$this->nm_grid_colunas]);
          if ($this->continuidad[$this->nm_grid_colunas] === "") 
          { 
              $this->continuidad[$this->nm_grid_colunas] = "" ;  
          } 
          $this->continuidad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->continuidad[$this->nm_grid_colunas]);
          if ($this->cuatro[$this->nm_grid_colunas] === "") 
          { 
              $this->cuatro[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cuatro[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cuatro[$this->nm_grid_colunas]);
          if ($this->desertor[$this->nm_grid_colunas] === "") 
          { 
              $this->desertor[$this->nm_grid_colunas] = "" ;  
          } 
          $this->desertor[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->desertor[$this->nm_grid_colunas]);
          if ($this->dia_mat[$this->nm_grid_colunas] === "") 
          { 
              $this->dia_mat[$this->nm_grid_colunas] = "" ;  
          } 
          $this->dia_mat[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dia_mat[$this->nm_grid_colunas]);
          if ($this->dia_nacimiento[$this->nm_grid_colunas] === "") 
          { 
              $this->dia_nacimiento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->dia_nacimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dia_nacimiento[$this->nm_grid_colunas]);
          if ($this->diez[$this->nm_grid_colunas] === "") 
          { 
              $this->diez[$this->nm_grid_colunas] = "" ;  
          } 
          $this->diez[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->diez[$this->nm_grid_colunas]);
          if ($this->directtor_grupo[$this->nm_grid_colunas] === "") 
          { 
              $this->directtor_grupo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->directtor_grupo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->directtor_grupo[$this->nm_grid_colunas]);
          if ($this->documento_docente_dg[$this->nm_grid_colunas] === "") 
          { 
              $this->documento_docente_dg[$this->nm_grid_colunas] = "" ;  
          } 
          $this->documento_docente_dg[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->documento_docente_dg[$this->nm_grid_colunas]);
          if ($this->dos[$this->nm_grid_colunas] === "") 
          { 
              $this->dos[$this->nm_grid_colunas] = "" ;  
          } 
          $this->dos[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dos[$this->nm_grid_colunas]);
          if ($this->esp_agropec[$this->nm_grid_colunas] === "") 
          { 
              $this->esp_agropec[$this->nm_grid_colunas] = "" ;  
          } 
          $this->esp_agropec[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->esp_agropec[$this->nm_grid_colunas]);
          if ($this->esp_comercial[$this->nm_grid_colunas] === "") 
          { 
              $this->esp_comercial[$this->nm_grid_colunas] = "" ;  
          } 
          $this->esp_comercial[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->esp_comercial[$this->nm_grid_colunas]);
          if ($this->esp_normalista[$this->nm_grid_colunas] === "") 
          { 
              $this->esp_normalista[$this->nm_grid_colunas] = "" ;  
          } 
          $this->esp_normalista[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->esp_normalista[$this->nm_grid_colunas]);
          if ($this->esp_turismo[$this->nm_grid_colunas] === "") 
          { 
              $this->esp_turismo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->esp_turismo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->esp_turismo[$this->nm_grid_colunas]);
          if ($this->est_educativo[$this->nm_grid_colunas] === "") 
          { 
              $this->est_educativo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->est_educativo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->est_educativo[$this->nm_grid_colunas]);
          if ($this->gen_femenino[$this->nm_grid_colunas] === "") 
          { 
              $this->gen_femenino[$this->nm_grid_colunas] = "" ;  
          } 
          $this->gen_femenino[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->gen_femenino[$this->nm_grid_colunas]);
          if ($this->gen_masculino[$this->nm_grid_colunas] === "") 
          { 
              $this->gen_masculino[$this->nm_grid_colunas] = "" ;  
          } 
          $this->gen_masculino[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->gen_masculino[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idmunicipio($this->idmunicipio[$this->nm_grid_colunas] , $this->idmunicipio[$this->nm_grid_colunas]) ; 
          $this->idmunicipio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idmunicipio[$this->nm_grid_colunas]);
          if ($this->institucion_educ[$this->nm_grid_colunas] === "") 
          { 
              $this->institucion_educ[$this->nm_grid_colunas] = "" ;  
          } 
          $this->institucion_educ[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->institucion_educ[$this->nm_grid_colunas]);
          if ($this->interno_no[$this->nm_grid_colunas] === "") 
          { 
              $this->interno_no[$this->nm_grid_colunas] = "" ;  
          } 
          $this->interno_no[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->interno_no[$this->nm_grid_colunas]);
          if ($this->interno_si[$this->nm_grid_colunas] === "") 
          { 
              $this->interno_si[$this->nm_grid_colunas] = "" ;  
          } 
          $this->interno_si[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->interno_si[$this->nm_grid_colunas]);
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
              $out_logo = $this->Ini->path_imag_temp . "/sc_logo_6060" . $_SESSION['scriptcase']['sc_num_img'] . ".jpg" ;  
              if (is_file($this->logo[$this->nm_grid_colunas])) 
              { 
                  $sc_obj_img = new nm_trata_img($this->logo[$this->nm_grid_colunas]);
                  $sc_obj_img->setWidth(60);
                  $sc_obj_img->setHeight(60);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_logo);
              } 
              $this->logo[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_logo;
              $_SESSION['scriptcase']['sc_num_img']++;
          } 
          if ($this->mes_mat[$this->nm_grid_colunas] === "") 
          { 
              $this->mes_mat[$this->nm_grid_colunas] = "" ;  
          } 
          $this->mes_mat[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->mes_mat[$this->nm_grid_colunas]);
          if ($this->mes_nacimiento[$this->nm_grid_colunas] === "") 
          { 
              $this->mes_nacimiento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->mes_nacimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->mes_nacimiento[$this->nm_grid_colunas]);
          if ($this->n_basica_prim[$this->nm_grid_colunas] === "") 
          { 
              $this->n_basica_prim[$this->nm_grid_colunas] = "" ;  
          } 
          $this->n_basica_prim[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->n_basica_prim[$this->nm_grid_colunas]);
          if ($this->n_basica_secund[$this->nm_grid_colunas] === "") 
          { 
              $this->n_basica_secund[$this->nm_grid_colunas] = "" ;  
          } 
          $this->n_basica_secund[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->n_basica_secund[$this->nm_grid_colunas]);
          if ($this->n_preescolar[$this->nm_grid_colunas] === "") 
          { 
              $this->n_preescolar[$this->nm_grid_colunas] = "" ;  
          } 
          $this->n_preescolar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->n_preescolar[$this->nm_grid_colunas]);
          if ($this->nombre_docente_dg[$this->nm_grid_colunas] === "") 
          { 
              $this->nombre_docente_dg[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nombre_docente_dg[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nombre_docente_dg[$this->nm_grid_colunas]);
          if ($this->nueve[$this->nm_grid_colunas] === "") 
          { 
              $this->nueve[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nueve[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nueve[$this->nm_grid_colunas]);
          if ($this->nuevo[$this->nm_grid_colunas] === "") 
          { 
              $this->nuevo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nuevo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nuevo[$this->nm_grid_colunas]);
          if ($this->ocho[$this->nm_grid_colunas] === "") 
          { 
              $this->ocho[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ocho[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ocho[$this->nm_grid_colunas]);
          if ($this->once[$this->nm_grid_colunas] === "") 
          { 
              $this->once[$this->nm_grid_colunas] = "" ;  
          } 
          $this->once[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->once[$this->nm_grid_colunas]);
          if ($this->otro_modelo_aceleracion[$this->nm_grid_colunas] === "") 
          { 
              $this->otro_modelo_aceleracion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->otro_modelo_aceleracion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->otro_modelo_aceleracion[$this->nm_grid_colunas]);
          if ($this->otro_modelo_n1[$this->nm_grid_colunas] === "") 
          { 
              $this->otro_modelo_n1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->otro_modelo_n1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->otro_modelo_n1[$this->nm_grid_colunas]);
          if ($this->otro_modelo_n2[$this->nm_grid_colunas] === "") 
          { 
              $this->otro_modelo_n2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->otro_modelo_n2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->otro_modelo_n2[$this->nm_grid_colunas]);
          if ($this->reprobado[$this->nm_grid_colunas] === "") 
          { 
              $this->reprobado[$this->nm_grid_colunas] = "" ;  
          } 
          $this->reprobado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->reprobado[$this->nm_grid_colunas]);
          if ($this->seis[$this->nm_grid_colunas] === "") 
          { 
              $this->seis[$this->nm_grid_colunas] = "" ;  
          } 
          $this->seis[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->seis[$this->nm_grid_colunas]);
          if ($this->siete[$this->nm_grid_colunas] === "") 
          { 
              $this->siete[$this->nm_grid_colunas] = "" ;  
          } 
          $this->siete[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->siete[$this->nm_grid_colunas]);
          if ($this->subsidio_no[$this->nm_grid_colunas] === "") 
          { 
              $this->subsidio_no[$this->nm_grid_colunas] = "" ;  
          } 
          $this->subsidio_no[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->subsidio_no[$this->nm_grid_colunas]);
          if ($this->subsidio_si[$this->nm_grid_colunas] === "") 
          { 
              $this->subsidio_si[$this->nm_grid_colunas] = "" ;  
          } 
          $this->subsidio_si[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->subsidio_si[$this->nm_grid_colunas]);
          if ($this->ti_cc[$this->nm_grid_colunas] === "") 
          { 
              $this->ti_cc[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ti_cc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ti_cc[$this->nm_grid_colunas]);
          if ($this->ti_ce[$this->nm_grid_colunas] === "") 
          { 
              $this->ti_ce[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ti_ce[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ti_ce[$this->nm_grid_colunas]);
          if ($this->ti_rc[$this->nm_grid_colunas] === "") 
          { 
              $this->ti_rc[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ti_rc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ti_rc[$this->nm_grid_colunas]);
          if ($this->ti_ti[$this->nm_grid_colunas] === "") 
          { 
              $this->ti_ti[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ti_ti[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ti_ti[$this->nm_grid_colunas]);
          if ($this->tres[$this->nm_grid_colunas] === "") 
          { 
              $this->tres[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tres[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tres[$this->nm_grid_colunas]);
          if ($this->uno[$this->nm_grid_colunas] === "") 
          { 
              $this->uno[$this->nm_grid_colunas] = "" ;  
          } 
          $this->uno[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->uno[$this->nm_grid_colunas]);
          if ($this->zona_rural[$this->nm_grid_colunas] === "") 
          { 
              $this->zona_rural[$this->nm_grid_colunas] = "" ;  
          } 
          $this->zona_rural[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->zona_rural[$this->nm_grid_colunas]);
          if ($this->zona_urbana[$this->nm_grid_colunas] === "") 
          { 
              $this->zona_urbana[$this->nm_grid_colunas] = "" ;  
          } 
          $this->zona_urbana[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->zona_urbana[$this->nm_grid_colunas]);
            $Institucion = array('posx' => 10, 'posy' => 10, 'data' => $this->institucion_educ[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_est_educativo = array('posx' => 11, 'posy' => 61, 'data' => $this->est_educativo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_logo = array('posx' => 181, 'posy' => 8, 'data' => $this->logo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nuevo = array('posx' => 148, 'posy' => 40, 'data' => $this->nuevo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_continuidad = array('posx' => 187, 'posy' => 40, 'data' => $this->continuidad[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_id_sede = array('posx' => 90, 'posy' => 61, 'data' => $this->id_sede[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idmunicipio = array('posx' => 170, 'posy' => 61, 'data' => $this->idmunicipio[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_documento_docente_dg = array('posx' => 24, 'posy' => 65, 'data' => $this->documento_docente_dg[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nombre_docente_dg = array('posx' => 87, 'posy' => 65, 'data' => $this->nombre_docente_dg[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ti_cc = array('posx' => 16, 'posy' => 81, 'data' => $this->ti_cc[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ti_rc = array('posx' => 25, 'posy' => 81, 'data' => $this->ti_rc[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ti_ti = array('posx' => 36, 'posy' => 81, 'data' => $this->ti_ti[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ti_ce = array('posx' => 45, 'posy' => 81, 'data' => $this->ti_ce[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numero_documento = array('posx' => 50, 'posy' => 81, 'data' => $this->numero_documento[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anos_cumplidos = array('posx' => 96, 'posy' => 81, 'data' => $this->anos_cumplidos[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_departanebti_expedicion = array('posx' => 112, 'posy' => 81, 'data' => $this->departanebti_expedicion[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_municipio_expedicion = array('posx' => 140, 'posy' => 81, 'data' => $this->municipio_expedicion[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_gen_masculino = array('posx' => 185, 'posy' => 81, 'data' => $this->gen_masculino[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_gen_femenino = array('posx' => 205, 'posy' => 81, 'data' => $this->gen_femenino[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_primer_apellido = array('posx' => 10, 'posy' => 93, 'data' => $this->primer_apellido[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_segundo_apellido = array('posx' => 40, 'posy' => 93, 'data' => $this->segundo_apellido[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_primer_nombre = array('posx' => 70, 'posy' => 93, 'data' => $this->primer_nombre[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_segundo_nombre = array('posx' => 100, 'posy' => 93, 'data' => $this->segundo_nombre[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dpto_nacimiento = array('posx' => 130, 'posy' => 93, 'data' => $this->dpto_nacimiento[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_municipio_nacimiento = array('posx' => 155, 'posy' => 93, 'data' => $this->municipio_nacimiento[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dia_nacimiento = array('posx' => 180, 'posy' => 93, 'data' => $this->dia_nacimiento[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_mes_nacimiento = array('posx' => 190, 'posy' => 93, 'data' => $this->mes_nacimiento[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anyo_nacimiento = array('posx' => 200, 'posy' => 93, 'data' => $this->anyo_nacimiento[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_address = array('posx' => 11, 'posy' => 105, 'data' => $this->address[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_barrio = array('posx' => 50, 'posy' => 105, 'data' => $this->barrio[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_zona_rural = array('posx' => 103, 'posy' => 105, 'data' => $this->zona_rural[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_zona_urbana = array('posx' => 93, 'posy' => 105, 'data' => $this->zona_urbana[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_state = array('posx' => 110, 'posy' => 105, 'data' => $this->state[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_city = array('posx' => 140, 'posy' => 105, 'data' => $this->city[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_telefono = array('posx' => 170, 'posy' => 105, 'data' => $this->telefono[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_grado_anterior = array('posx' => 12, 'posy' => 125, 'data' => $this->grado_anterior[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_last_year = array('posx' => 22, 'posy' => 125, 'data' => $this->last_year[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_id_jornada = array('posx' => 10, 'posy' => 30, 'data' => $this->id_jornada[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_semestre = array('posx' => 10, 'posy' => 40, 'data' => $this->semestre[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dia_mat = array('posx' => 156, 'posy' => 49, 'data' => $this->dia_mat[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_mes_mat = array('posx' => 177, 'posy' => 49, 'data' => $this->mes_mat[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anyo_mat = array('posx' => 195, 'posy' => 49, 'data' => $this->anyo_mat[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nombre_ult_plantel = array('posx' => 30, 'posy' => 125, 'data' => $this->nombre_ult_plantel[$this->nm_grid_colunas], 'width'      => 20, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 6, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_aprobado = array('posx' => 82, 'posy' => 125, 'data' => $this->aprobado[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_reprobado = array('posx' => 92, 'posy' => 125, 'data' => $this->reprobado[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_desertor = array('posx' => 102, 'posy' => 125, 'data' => $this->desertor[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_grado_igreso = array('posx' => 10, 'posy' => 320, 'data' => $this->grado_igreso[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cero = array('posx' => 114, 'posy' => 122, 'data' => $this->cero[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_uno = array('posx' => 125, 'posy' => 122, 'data' => $this->uno[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dos = array('posx' => 134, 'posy' => 122, 'data' => $this->dos[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tres = array('posx' => 144, 'posy' => 122, 'data' => $this->tres[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cuatro = array('posx' => 154, 'posy' => 122, 'data' => $this->cuatro[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cinco = array('posx' => 114, 'posy' => 125, 'data' => $this->cinco[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_seis = array('posx' => 125, 'posy' => 125, 'data' => $this->seis[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_siete = array('posx' => 134, 'posy' => 125, 'data' => $this->siete[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ocho = array('posx' => 144, 'posy' => 125, 'data' => $this->ocho[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nueve = array('posx' => 154, 'posy' => 125, 'data' => $this->nueve[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_n_preescolar = array('posx' => 202, 'posy' => 114, 'data' => $this->n_preescolar[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_n_basica_prim = array('posx' => 202, 'posy' => 118, 'data' => $this->n_basica_prim[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_n_basica_secund = array('posx' => 202, 'posy' => 121, 'data' => $this->n_basica_secund[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsidio_si = array('posx' => 12, 'posy' => 137, 'data' => $this->subsidio_si[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsidio_no = array('posx' => 22, 'posy' => 137, 'data' => $this->subsidio_no[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_interno_si = array('posx' => 33, 'posy' => 137, 'data' => $this->interno_si[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_interno_no = array('posx' => 43, 'posy' => 137, 'data' => $this->interno_no[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_id_grupo = array('posx' => 162, 'posy' => 65, 'data' => $this->id_grupo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_otro_modelo_n1 = array('posx' => 53, 'posy' => 137, 'data' => $this->otro_modelo_n1[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_otro_modelo_n2 = array('posx' => 63, 'posy' => 137, 'data' => $this->otro_modelo_n2[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_otro_modelo_aceleracion = array('posx' => 77, 'posy' => 137, 'data' => $this->otro_modelo_aceleracion[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_diez = array('posx' => 94, 'posy' => 137, 'data' => $this->diez[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_once = array('posx' => 103, 'posy' => 137, 'data' => $this->once[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_caracter_acad = array('posx' => 112, 'posy' => 137, 'data' => $this->caracter_acad[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_caracter_tec = array('posx' => 122, 'posy' => 137, 'data' => $this->caracter_tec[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_esp_comercial = array('posx' => 138, 'posy' => 137, 'data' => $this->esp_comercial[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_esp_agropec = array('posx' => 158, 'posy' => 137, 'data' => $this->esp_agropec[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_esp_turismo = array('posx' => 178, 'posy' => 137, 'data' => $this->esp_turismo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_esp_normalista = array('posx' => 198, 'posy' => 137, 'data' => $this->esp_normalista[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($Institucion['font_type'], $Institucion['font_style'], $Institucion['font_size']);
            $this->pdf_text_color($Institucion['data'], $Institucion['color_r'], $Institucion['color_g'], $Institucion['color_b']);
            if (!empty($Institucion['posx']) && !empty($Institucion['posy']))
            {
                $this->Pdf->SetXY($Institucion['posx'], $Institucion['posy']);
            }
            elseif (!empty($Institucion['posx']))
            {
                $this->Pdf->SetX($Institucion['posx']);
            }
            elseif (!empty($Institucion['posy']))
            {
                $this->Pdf->SetY($Institucion['posy']);
            }
            $this->Pdf->Cell($Institucion['width'], 0, $Institucion['data'], 0, 0, $Institucion['align']);

            $this->Pdf->SetFont($cell_est_educativo['font_type'], $cell_est_educativo['font_style'], $cell_est_educativo['font_size']);
            $this->pdf_text_color($cell_est_educativo['data'], $cell_est_educativo['color_r'], $cell_est_educativo['color_g'], $cell_est_educativo['color_b']);
            if (!empty($cell_est_educativo['posx']) && !empty($cell_est_educativo['posy']))
            {
                $this->Pdf->SetXY($cell_est_educativo['posx'], $cell_est_educativo['posy']);
            }
            elseif (!empty($cell_est_educativo['posx']))
            {
                $this->Pdf->SetX($cell_est_educativo['posx']);
            }
            elseif (!empty($cell_est_educativo['posy']))
            {
                $this->Pdf->SetY($cell_est_educativo['posy']);
            }
            $this->Pdf->Cell($cell_est_educativo['width'], 0, $cell_est_educativo['data'], 0, 0, $cell_est_educativo['align']);

            if (isset($cell_logo['data']) && !empty($cell_logo['data']) && is_file($cell_logo['data']))
            {
                $this->Pdf->Image($cell_logo['data'], $cell_logo['posx'], $cell_logo['posy'], 0, 0);
            }

            $this->Pdf->SetFont($cell_nuevo['font_type'], $cell_nuevo['font_style'], $cell_nuevo['font_size']);
            $this->pdf_text_color($cell_nuevo['data'], $cell_nuevo['color_r'], $cell_nuevo['color_g'], $cell_nuevo['color_b']);
            if (!empty($cell_nuevo['posx']) && !empty($cell_nuevo['posy']))
            {
                $this->Pdf->SetXY($cell_nuevo['posx'], $cell_nuevo['posy']);
            }
            elseif (!empty($cell_nuevo['posx']))
            {
                $this->Pdf->SetX($cell_nuevo['posx']);
            }
            elseif (!empty($cell_nuevo['posy']))
            {
                $this->Pdf->SetY($cell_nuevo['posy']);
            }
            $this->Pdf->Cell($cell_nuevo['width'], 0, $cell_nuevo['data'], 0, 0, $cell_nuevo['align']);

            $this->Pdf->SetFont($cell_continuidad['font_type'], $cell_continuidad['font_style'], $cell_continuidad['font_size']);
            $this->pdf_text_color($cell_continuidad['data'], $cell_continuidad['color_r'], $cell_continuidad['color_g'], $cell_continuidad['color_b']);
            if (!empty($cell_continuidad['posx']) && !empty($cell_continuidad['posy']))
            {
                $this->Pdf->SetXY($cell_continuidad['posx'], $cell_continuidad['posy']);
            }
            elseif (!empty($cell_continuidad['posx']))
            {
                $this->Pdf->SetX($cell_continuidad['posx']);
            }
            elseif (!empty($cell_continuidad['posy']))
            {
                $this->Pdf->SetY($cell_continuidad['posy']);
            }
            $this->Pdf->Cell($cell_continuidad['width'], 0, $cell_continuidad['data'], 0, 0, $cell_continuidad['align']);

            $this->Pdf->SetFont($cell_id_sede['font_type'], $cell_id_sede['font_style'], $cell_id_sede['font_size']);
            $this->pdf_text_color($cell_id_sede['data'], $cell_id_sede['color_r'], $cell_id_sede['color_g'], $cell_id_sede['color_b']);
            if (!empty($cell_id_sede['posx']) && !empty($cell_id_sede['posy']))
            {
                $this->Pdf->SetXY($cell_id_sede['posx'], $cell_id_sede['posy']);
            }
            elseif (!empty($cell_id_sede['posx']))
            {
                $this->Pdf->SetX($cell_id_sede['posx']);
            }
            elseif (!empty($cell_id_sede['posy']))
            {
                $this->Pdf->SetY($cell_id_sede['posy']);
            }
            $this->Pdf->Cell($cell_id_sede['width'], 0, $cell_id_sede['data'], 0, 0, $cell_id_sede['align']);

            $this->Pdf->SetFont($cell_idmunicipio['font_type'], $cell_idmunicipio['font_style'], $cell_idmunicipio['font_size']);
            $this->pdf_text_color($cell_idmunicipio['data'], $cell_idmunicipio['color_r'], $cell_idmunicipio['color_g'], $cell_idmunicipio['color_b']);
            if (!empty($cell_idmunicipio['posx']) && !empty($cell_idmunicipio['posy']))
            {
                $this->Pdf->SetXY($cell_idmunicipio['posx'], $cell_idmunicipio['posy']);
            }
            elseif (!empty($cell_idmunicipio['posx']))
            {
                $this->Pdf->SetX($cell_idmunicipio['posx']);
            }
            elseif (!empty($cell_idmunicipio['posy']))
            {
                $this->Pdf->SetY($cell_idmunicipio['posy']);
            }
            $this->Pdf->Cell($cell_idmunicipio['width'], 0, $cell_idmunicipio['data'], 0, 0, $cell_idmunicipio['align']);

            $this->Pdf->SetFont($cell_documento_docente_dg['font_type'], $cell_documento_docente_dg['font_style'], $cell_documento_docente_dg['font_size']);
            $this->pdf_text_color($cell_documento_docente_dg['data'], $cell_documento_docente_dg['color_r'], $cell_documento_docente_dg['color_g'], $cell_documento_docente_dg['color_b']);
            if (!empty($cell_documento_docente_dg['posx']) && !empty($cell_documento_docente_dg['posy']))
            {
                $this->Pdf->SetXY($cell_documento_docente_dg['posx'], $cell_documento_docente_dg['posy']);
            }
            elseif (!empty($cell_documento_docente_dg['posx']))
            {
                $this->Pdf->SetX($cell_documento_docente_dg['posx']);
            }
            elseif (!empty($cell_documento_docente_dg['posy']))
            {
                $this->Pdf->SetY($cell_documento_docente_dg['posy']);
            }
            $this->Pdf->Cell($cell_documento_docente_dg['width'], 0, $cell_documento_docente_dg['data'], 0, 0, $cell_documento_docente_dg['align']);

            $this->Pdf->SetFont($cell_nombre_docente_dg['font_type'], $cell_nombre_docente_dg['font_style'], $cell_nombre_docente_dg['font_size']);
            $this->pdf_text_color($cell_nombre_docente_dg['data'], $cell_nombre_docente_dg['color_r'], $cell_nombre_docente_dg['color_g'], $cell_nombre_docente_dg['color_b']);
            if (!empty($cell_nombre_docente_dg['posx']) && !empty($cell_nombre_docente_dg['posy']))
            {
                $this->Pdf->SetXY($cell_nombre_docente_dg['posx'], $cell_nombre_docente_dg['posy']);
            }
            elseif (!empty($cell_nombre_docente_dg['posx']))
            {
                $this->Pdf->SetX($cell_nombre_docente_dg['posx']);
            }
            elseif (!empty($cell_nombre_docente_dg['posy']))
            {
                $this->Pdf->SetY($cell_nombre_docente_dg['posy']);
            }
            $this->Pdf->Cell($cell_nombre_docente_dg['width'], 0, $cell_nombre_docente_dg['data'], 0, 0, $cell_nombre_docente_dg['align']);

            $this->Pdf->SetFont($cell_ti_cc['font_type'], $cell_ti_cc['font_style'], $cell_ti_cc['font_size']);
            $this->pdf_text_color($cell_ti_cc['data'], $cell_ti_cc['color_r'], $cell_ti_cc['color_g'], $cell_ti_cc['color_b']);
            if (!empty($cell_ti_cc['posx']) && !empty($cell_ti_cc['posy']))
            {
                $this->Pdf->SetXY($cell_ti_cc['posx'], $cell_ti_cc['posy']);
            }
            elseif (!empty($cell_ti_cc['posx']))
            {
                $this->Pdf->SetX($cell_ti_cc['posx']);
            }
            elseif (!empty($cell_ti_cc['posy']))
            {
                $this->Pdf->SetY($cell_ti_cc['posy']);
            }
            $this->Pdf->Cell($cell_ti_cc['width'], 0, $cell_ti_cc['data'], 0, 0, $cell_ti_cc['align']);

            $this->Pdf->SetFont($cell_ti_rc['font_type'], $cell_ti_rc['font_style'], $cell_ti_rc['font_size']);
            $this->pdf_text_color($cell_ti_rc['data'], $cell_ti_rc['color_r'], $cell_ti_rc['color_g'], $cell_ti_rc['color_b']);
            if (!empty($cell_ti_rc['posx']) && !empty($cell_ti_rc['posy']))
            {
                $this->Pdf->SetXY($cell_ti_rc['posx'], $cell_ti_rc['posy']);
            }
            elseif (!empty($cell_ti_rc['posx']))
            {
                $this->Pdf->SetX($cell_ti_rc['posx']);
            }
            elseif (!empty($cell_ti_rc['posy']))
            {
                $this->Pdf->SetY($cell_ti_rc['posy']);
            }
            $this->Pdf->Cell($cell_ti_rc['width'], 0, $cell_ti_rc['data'], 0, 0, $cell_ti_rc['align']);

            $this->Pdf->SetFont($cell_ti_ti['font_type'], $cell_ti_ti['font_style'], $cell_ti_ti['font_size']);
            $this->pdf_text_color($cell_ti_ti['data'], $cell_ti_ti['color_r'], $cell_ti_ti['color_g'], $cell_ti_ti['color_b']);
            if (!empty($cell_ti_ti['posx']) && !empty($cell_ti_ti['posy']))
            {
                $this->Pdf->SetXY($cell_ti_ti['posx'], $cell_ti_ti['posy']);
            }
            elseif (!empty($cell_ti_ti['posx']))
            {
                $this->Pdf->SetX($cell_ti_ti['posx']);
            }
            elseif (!empty($cell_ti_ti['posy']))
            {
                $this->Pdf->SetY($cell_ti_ti['posy']);
            }
            $this->Pdf->Cell($cell_ti_ti['width'], 0, $cell_ti_ti['data'], 0, 0, $cell_ti_ti['align']);

            $this->Pdf->SetFont($cell_ti_ce['font_type'], $cell_ti_ce['font_style'], $cell_ti_ce['font_size']);
            $this->pdf_text_color($cell_ti_ce['data'], $cell_ti_ce['color_r'], $cell_ti_ce['color_g'], $cell_ti_ce['color_b']);
            if (!empty($cell_ti_ce['posx']) && !empty($cell_ti_ce['posy']))
            {
                $this->Pdf->SetXY($cell_ti_ce['posx'], $cell_ti_ce['posy']);
            }
            elseif (!empty($cell_ti_ce['posx']))
            {
                $this->Pdf->SetX($cell_ti_ce['posx']);
            }
            elseif (!empty($cell_ti_ce['posy']))
            {
                $this->Pdf->SetY($cell_ti_ce['posy']);
            }
            $this->Pdf->Cell($cell_ti_ce['width'], 0, $cell_ti_ce['data'], 0, 0, $cell_ti_ce['align']);

            $this->Pdf->SetFont($cell_numero_documento['font_type'], $cell_numero_documento['font_style'], $cell_numero_documento['font_size']);
            $this->pdf_text_color($cell_numero_documento['data'], $cell_numero_documento['color_r'], $cell_numero_documento['color_g'], $cell_numero_documento['color_b']);
            if (!empty($cell_numero_documento['posx']) && !empty($cell_numero_documento['posy']))
            {
                $this->Pdf->SetXY($cell_numero_documento['posx'], $cell_numero_documento['posy']);
            }
            elseif (!empty($cell_numero_documento['posx']))
            {
                $this->Pdf->SetX($cell_numero_documento['posx']);
            }
            elseif (!empty($cell_numero_documento['posy']))
            {
                $this->Pdf->SetY($cell_numero_documento['posy']);
            }
            $this->Pdf->Cell($cell_numero_documento['width'], 0, $cell_numero_documento['data'], 0, 0, $cell_numero_documento['align']);

            $this->Pdf->SetFont($cell_anos_cumplidos['font_type'], $cell_anos_cumplidos['font_style'], $cell_anos_cumplidos['font_size']);
            $this->pdf_text_color($cell_anos_cumplidos['data'], $cell_anos_cumplidos['color_r'], $cell_anos_cumplidos['color_g'], $cell_anos_cumplidos['color_b']);
            if (!empty($cell_anos_cumplidos['posx']) && !empty($cell_anos_cumplidos['posy']))
            {
                $this->Pdf->SetXY($cell_anos_cumplidos['posx'], $cell_anos_cumplidos['posy']);
            }
            elseif (!empty($cell_anos_cumplidos['posx']))
            {
                $this->Pdf->SetX($cell_anos_cumplidos['posx']);
            }
            elseif (!empty($cell_anos_cumplidos['posy']))
            {
                $this->Pdf->SetY($cell_anos_cumplidos['posy']);
            }
            $this->Pdf->Cell($cell_anos_cumplidos['width'], 0, $cell_anos_cumplidos['data'], 0, 0, $cell_anos_cumplidos['align']);

            $this->Pdf->SetFont($cell_departanebti_expedicion['font_type'], $cell_departanebti_expedicion['font_style'], $cell_departanebti_expedicion['font_size']);
            $this->pdf_text_color($cell_departanebti_expedicion['data'], $cell_departanebti_expedicion['color_r'], $cell_departanebti_expedicion['color_g'], $cell_departanebti_expedicion['color_b']);
            if (!empty($cell_departanebti_expedicion['posx']) && !empty($cell_departanebti_expedicion['posy']))
            {
                $this->Pdf->SetXY($cell_departanebti_expedicion['posx'], $cell_departanebti_expedicion['posy']);
            }
            elseif (!empty($cell_departanebti_expedicion['posx']))
            {
                $this->Pdf->SetX($cell_departanebti_expedicion['posx']);
            }
            elseif (!empty($cell_departanebti_expedicion['posy']))
            {
                $this->Pdf->SetY($cell_departanebti_expedicion['posy']);
            }
            $this->Pdf->Cell($cell_departanebti_expedicion['width'], 0, $cell_departanebti_expedicion['data'], 0, 0, $cell_departanebti_expedicion['align']);

            $this->Pdf->SetFont($cell_municipio_expedicion['font_type'], $cell_municipio_expedicion['font_style'], $cell_municipio_expedicion['font_size']);
            $this->pdf_text_color($cell_municipio_expedicion['data'], $cell_municipio_expedicion['color_r'], $cell_municipio_expedicion['color_g'], $cell_municipio_expedicion['color_b']);
            if (!empty($cell_municipio_expedicion['posx']) && !empty($cell_municipio_expedicion['posy']))
            {
                $this->Pdf->SetXY($cell_municipio_expedicion['posx'], $cell_municipio_expedicion['posy']);
            }
            elseif (!empty($cell_municipio_expedicion['posx']))
            {
                $this->Pdf->SetX($cell_municipio_expedicion['posx']);
            }
            elseif (!empty($cell_municipio_expedicion['posy']))
            {
                $this->Pdf->SetY($cell_municipio_expedicion['posy']);
            }
            $this->Pdf->Cell($cell_municipio_expedicion['width'], 0, $cell_municipio_expedicion['data'], 0, 0, $cell_municipio_expedicion['align']);

            $this->Pdf->SetFont($cell_gen_masculino['font_type'], $cell_gen_masculino['font_style'], $cell_gen_masculino['font_size']);
            $this->pdf_text_color($cell_gen_masculino['data'], $cell_gen_masculino['color_r'], $cell_gen_masculino['color_g'], $cell_gen_masculino['color_b']);
            if (!empty($cell_gen_masculino['posx']) && !empty($cell_gen_masculino['posy']))
            {
                $this->Pdf->SetXY($cell_gen_masculino['posx'], $cell_gen_masculino['posy']);
            }
            elseif (!empty($cell_gen_masculino['posx']))
            {
                $this->Pdf->SetX($cell_gen_masculino['posx']);
            }
            elseif (!empty($cell_gen_masculino['posy']))
            {
                $this->Pdf->SetY($cell_gen_masculino['posy']);
            }
            $this->Pdf->Cell($cell_gen_masculino['width'], 0, $cell_gen_masculino['data'], 0, 0, $cell_gen_masculino['align']);

            $this->Pdf->SetFont($cell_gen_femenino['font_type'], $cell_gen_femenino['font_style'], $cell_gen_femenino['font_size']);
            $this->pdf_text_color($cell_gen_femenino['data'], $cell_gen_femenino['color_r'], $cell_gen_femenino['color_g'], $cell_gen_femenino['color_b']);
            if (!empty($cell_gen_femenino['posx']) && !empty($cell_gen_femenino['posy']))
            {
                $this->Pdf->SetXY($cell_gen_femenino['posx'], $cell_gen_femenino['posy']);
            }
            elseif (!empty($cell_gen_femenino['posx']))
            {
                $this->Pdf->SetX($cell_gen_femenino['posx']);
            }
            elseif (!empty($cell_gen_femenino['posy']))
            {
                $this->Pdf->SetY($cell_gen_femenino['posy']);
            }
            $this->Pdf->Cell($cell_gen_femenino['width'], 0, $cell_gen_femenino['data'], 0, 0, $cell_gen_femenino['align']);

            $this->Pdf->SetFont($cell_primer_apellido['font_type'], $cell_primer_apellido['font_style'], $cell_primer_apellido['font_size']);
            $this->pdf_text_color($cell_primer_apellido['data'], $cell_primer_apellido['color_r'], $cell_primer_apellido['color_g'], $cell_primer_apellido['color_b']);
            if (!empty($cell_primer_apellido['posx']) && !empty($cell_primer_apellido['posy']))
            {
                $this->Pdf->SetXY($cell_primer_apellido['posx'], $cell_primer_apellido['posy']);
            }
            elseif (!empty($cell_primer_apellido['posx']))
            {
                $this->Pdf->SetX($cell_primer_apellido['posx']);
            }
            elseif (!empty($cell_primer_apellido['posy']))
            {
                $this->Pdf->SetY($cell_primer_apellido['posy']);
            }
            $this->Pdf->Cell($cell_primer_apellido['width'], 0, $cell_primer_apellido['data'], 0, 0, $cell_primer_apellido['align']);

            $this->Pdf->SetFont($cell_segundo_apellido['font_type'], $cell_segundo_apellido['font_style'], $cell_segundo_apellido['font_size']);
            $this->pdf_text_color($cell_segundo_apellido['data'], $cell_segundo_apellido['color_r'], $cell_segundo_apellido['color_g'], $cell_segundo_apellido['color_b']);
            if (!empty($cell_segundo_apellido['posx']) && !empty($cell_segundo_apellido['posy']))
            {
                $this->Pdf->SetXY($cell_segundo_apellido['posx'], $cell_segundo_apellido['posy']);
            }
            elseif (!empty($cell_segundo_apellido['posx']))
            {
                $this->Pdf->SetX($cell_segundo_apellido['posx']);
            }
            elseif (!empty($cell_segundo_apellido['posy']))
            {
                $this->Pdf->SetY($cell_segundo_apellido['posy']);
            }
            $this->Pdf->Cell($cell_segundo_apellido['width'], 0, $cell_segundo_apellido['data'], 0, 0, $cell_segundo_apellido['align']);

            $this->Pdf->SetFont($cell_primer_nombre['font_type'], $cell_primer_nombre['font_style'], $cell_primer_nombre['font_size']);
            $this->pdf_text_color($cell_primer_nombre['data'], $cell_primer_nombre['color_r'], $cell_primer_nombre['color_g'], $cell_primer_nombre['color_b']);
            if (!empty($cell_primer_nombre['posx']) && !empty($cell_primer_nombre['posy']))
            {
                $this->Pdf->SetXY($cell_primer_nombre['posx'], $cell_primer_nombre['posy']);
            }
            elseif (!empty($cell_primer_nombre['posx']))
            {
                $this->Pdf->SetX($cell_primer_nombre['posx']);
            }
            elseif (!empty($cell_primer_nombre['posy']))
            {
                $this->Pdf->SetY($cell_primer_nombre['posy']);
            }
            $this->Pdf->Cell($cell_primer_nombre['width'], 0, $cell_primer_nombre['data'], 0, 0, $cell_primer_nombre['align']);

            $this->Pdf->SetFont($cell_segundo_nombre['font_type'], $cell_segundo_nombre['font_style'], $cell_segundo_nombre['font_size']);
            $this->pdf_text_color($cell_segundo_nombre['data'], $cell_segundo_nombre['color_r'], $cell_segundo_nombre['color_g'], $cell_segundo_nombre['color_b']);
            if (!empty($cell_segundo_nombre['posx']) && !empty($cell_segundo_nombre['posy']))
            {
                $this->Pdf->SetXY($cell_segundo_nombre['posx'], $cell_segundo_nombre['posy']);
            }
            elseif (!empty($cell_segundo_nombre['posx']))
            {
                $this->Pdf->SetX($cell_segundo_nombre['posx']);
            }
            elseif (!empty($cell_segundo_nombre['posy']))
            {
                $this->Pdf->SetY($cell_segundo_nombre['posy']);
            }
            $this->Pdf->Cell($cell_segundo_nombre['width'], 0, $cell_segundo_nombre['data'], 0, 0, $cell_segundo_nombre['align']);

            $this->Pdf->SetFont($cell_dpto_nacimiento['font_type'], $cell_dpto_nacimiento['font_style'], $cell_dpto_nacimiento['font_size']);
            $this->pdf_text_color($cell_dpto_nacimiento['data'], $cell_dpto_nacimiento['color_r'], $cell_dpto_nacimiento['color_g'], $cell_dpto_nacimiento['color_b']);
            if (!empty($cell_dpto_nacimiento['posx']) && !empty($cell_dpto_nacimiento['posy']))
            {
                $this->Pdf->SetXY($cell_dpto_nacimiento['posx'], $cell_dpto_nacimiento['posy']);
            }
            elseif (!empty($cell_dpto_nacimiento['posx']))
            {
                $this->Pdf->SetX($cell_dpto_nacimiento['posx']);
            }
            elseif (!empty($cell_dpto_nacimiento['posy']))
            {
                $this->Pdf->SetY($cell_dpto_nacimiento['posy']);
            }
            $this->Pdf->Cell($cell_dpto_nacimiento['width'], 0, $cell_dpto_nacimiento['data'], 0, 0, $cell_dpto_nacimiento['align']);

            $this->Pdf->SetFont($cell_municipio_nacimiento['font_type'], $cell_municipio_nacimiento['font_style'], $cell_municipio_nacimiento['font_size']);
            $this->pdf_text_color($cell_municipio_nacimiento['data'], $cell_municipio_nacimiento['color_r'], $cell_municipio_nacimiento['color_g'], $cell_municipio_nacimiento['color_b']);
            if (!empty($cell_municipio_nacimiento['posx']) && !empty($cell_municipio_nacimiento['posy']))
            {
                $this->Pdf->SetXY($cell_municipio_nacimiento['posx'], $cell_municipio_nacimiento['posy']);
            }
            elseif (!empty($cell_municipio_nacimiento['posx']))
            {
                $this->Pdf->SetX($cell_municipio_nacimiento['posx']);
            }
            elseif (!empty($cell_municipio_nacimiento['posy']))
            {
                $this->Pdf->SetY($cell_municipio_nacimiento['posy']);
            }
            $this->Pdf->Cell($cell_municipio_nacimiento['width'], 0, $cell_municipio_nacimiento['data'], 0, 0, $cell_municipio_nacimiento['align']);

            $this->Pdf->SetFont($cell_dia_nacimiento['font_type'], $cell_dia_nacimiento['font_style'], $cell_dia_nacimiento['font_size']);
            $this->pdf_text_color($cell_dia_nacimiento['data'], $cell_dia_nacimiento['color_r'], $cell_dia_nacimiento['color_g'], $cell_dia_nacimiento['color_b']);
            if (!empty($cell_dia_nacimiento['posx']) && !empty($cell_dia_nacimiento['posy']))
            {
                $this->Pdf->SetXY($cell_dia_nacimiento['posx'], $cell_dia_nacimiento['posy']);
            }
            elseif (!empty($cell_dia_nacimiento['posx']))
            {
                $this->Pdf->SetX($cell_dia_nacimiento['posx']);
            }
            elseif (!empty($cell_dia_nacimiento['posy']))
            {
                $this->Pdf->SetY($cell_dia_nacimiento['posy']);
            }
            $this->Pdf->Cell($cell_dia_nacimiento['width'], 0, $cell_dia_nacimiento['data'], 0, 0, $cell_dia_nacimiento['align']);

            $this->Pdf->SetFont($cell_mes_nacimiento['font_type'], $cell_mes_nacimiento['font_style'], $cell_mes_nacimiento['font_size']);
            $this->pdf_text_color($cell_mes_nacimiento['data'], $cell_mes_nacimiento['color_r'], $cell_mes_nacimiento['color_g'], $cell_mes_nacimiento['color_b']);
            if (!empty($cell_mes_nacimiento['posx']) && !empty($cell_mes_nacimiento['posy']))
            {
                $this->Pdf->SetXY($cell_mes_nacimiento['posx'], $cell_mes_nacimiento['posy']);
            }
            elseif (!empty($cell_mes_nacimiento['posx']))
            {
                $this->Pdf->SetX($cell_mes_nacimiento['posx']);
            }
            elseif (!empty($cell_mes_nacimiento['posy']))
            {
                $this->Pdf->SetY($cell_mes_nacimiento['posy']);
            }
            $this->Pdf->Cell($cell_mes_nacimiento['width'], 0, $cell_mes_nacimiento['data'], 0, 0, $cell_mes_nacimiento['align']);

            $this->Pdf->SetFont($cell_anyo_nacimiento['font_type'], $cell_anyo_nacimiento['font_style'], $cell_anyo_nacimiento['font_size']);
            $this->pdf_text_color($cell_anyo_nacimiento['data'], $cell_anyo_nacimiento['color_r'], $cell_anyo_nacimiento['color_g'], $cell_anyo_nacimiento['color_b']);
            if (!empty($cell_anyo_nacimiento['posx']) && !empty($cell_anyo_nacimiento['posy']))
            {
                $this->Pdf->SetXY($cell_anyo_nacimiento['posx'], $cell_anyo_nacimiento['posy']);
            }
            elseif (!empty($cell_anyo_nacimiento['posx']))
            {
                $this->Pdf->SetX($cell_anyo_nacimiento['posx']);
            }
            elseif (!empty($cell_anyo_nacimiento['posy']))
            {
                $this->Pdf->SetY($cell_anyo_nacimiento['posy']);
            }
            $this->Pdf->Cell($cell_anyo_nacimiento['width'], 0, $cell_anyo_nacimiento['data'], 0, 0, $cell_anyo_nacimiento['align']);

            $this->Pdf->SetFont($cell_address['font_type'], $cell_address['font_style'], $cell_address['font_size']);
            $this->pdf_text_color($cell_address['data'], $cell_address['color_r'], $cell_address['color_g'], $cell_address['color_b']);
            if (!empty($cell_address['posx']) && !empty($cell_address['posy']))
            {
                $this->Pdf->SetXY($cell_address['posx'], $cell_address['posy']);
            }
            elseif (!empty($cell_address['posx']))
            {
                $this->Pdf->SetX($cell_address['posx']);
            }
            elseif (!empty($cell_address['posy']))
            {
                $this->Pdf->SetY($cell_address['posy']);
            }
            $this->Pdf->Cell($cell_address['width'], 0, $cell_address['data'], 0, 0, $cell_address['align']);

            $this->Pdf->SetFont($cell_barrio['font_type'], $cell_barrio['font_style'], $cell_barrio['font_size']);
            $this->pdf_text_color($cell_barrio['data'], $cell_barrio['color_r'], $cell_barrio['color_g'], $cell_barrio['color_b']);
            if (!empty($cell_barrio['posx']) && !empty($cell_barrio['posy']))
            {
                $this->Pdf->SetXY($cell_barrio['posx'], $cell_barrio['posy']);
            }
            elseif (!empty($cell_barrio['posx']))
            {
                $this->Pdf->SetX($cell_barrio['posx']);
            }
            elseif (!empty($cell_barrio['posy']))
            {
                $this->Pdf->SetY($cell_barrio['posy']);
            }
            $this->Pdf->Cell($cell_barrio['width'], 0, $cell_barrio['data'], 0, 0, $cell_barrio['align']);

            $this->Pdf->SetFont($cell_zona_rural['font_type'], $cell_zona_rural['font_style'], $cell_zona_rural['font_size']);
            $this->pdf_text_color($cell_zona_rural['data'], $cell_zona_rural['color_r'], $cell_zona_rural['color_g'], $cell_zona_rural['color_b']);
            if (!empty($cell_zona_rural['posx']) && !empty($cell_zona_rural['posy']))
            {
                $this->Pdf->SetXY($cell_zona_rural['posx'], $cell_zona_rural['posy']);
            }
            elseif (!empty($cell_zona_rural['posx']))
            {
                $this->Pdf->SetX($cell_zona_rural['posx']);
            }
            elseif (!empty($cell_zona_rural['posy']))
            {
                $this->Pdf->SetY($cell_zona_rural['posy']);
            }
            $this->Pdf->Cell($cell_zona_rural['width'], 0, $cell_zona_rural['data'], 0, 0, $cell_zona_rural['align']);

            $this->Pdf->SetFont($cell_zona_urbana['font_type'], $cell_zona_urbana['font_style'], $cell_zona_urbana['font_size']);
            $this->pdf_text_color($cell_zona_urbana['data'], $cell_zona_urbana['color_r'], $cell_zona_urbana['color_g'], $cell_zona_urbana['color_b']);
            if (!empty($cell_zona_urbana['posx']) && !empty($cell_zona_urbana['posy']))
            {
                $this->Pdf->SetXY($cell_zona_urbana['posx'], $cell_zona_urbana['posy']);
            }
            elseif (!empty($cell_zona_urbana['posx']))
            {
                $this->Pdf->SetX($cell_zona_urbana['posx']);
            }
            elseif (!empty($cell_zona_urbana['posy']))
            {
                $this->Pdf->SetY($cell_zona_urbana['posy']);
            }
            $this->Pdf->Cell($cell_zona_urbana['width'], 0, $cell_zona_urbana['data'], 0, 0, $cell_zona_urbana['align']);

            $this->Pdf->SetFont($cell_state['font_type'], $cell_state['font_style'], $cell_state['font_size']);
            $this->pdf_text_color($cell_state['data'], $cell_state['color_r'], $cell_state['color_g'], $cell_state['color_b']);
            if (!empty($cell_state['posx']) && !empty($cell_state['posy']))
            {
                $this->Pdf->SetXY($cell_state['posx'], $cell_state['posy']);
            }
            elseif (!empty($cell_state['posx']))
            {
                $this->Pdf->SetX($cell_state['posx']);
            }
            elseif (!empty($cell_state['posy']))
            {
                $this->Pdf->SetY($cell_state['posy']);
            }
            $this->Pdf->Cell($cell_state['width'], 0, $cell_state['data'], 0, 0, $cell_state['align']);

            $this->Pdf->SetFont($cell_city['font_type'], $cell_city['font_style'], $cell_city['font_size']);
            $this->pdf_text_color($cell_city['data'], $cell_city['color_r'], $cell_city['color_g'], $cell_city['color_b']);
            if (!empty($cell_city['posx']) && !empty($cell_city['posy']))
            {
                $this->Pdf->SetXY($cell_city['posx'], $cell_city['posy']);
            }
            elseif (!empty($cell_city['posx']))
            {
                $this->Pdf->SetX($cell_city['posx']);
            }
            elseif (!empty($cell_city['posy']))
            {
                $this->Pdf->SetY($cell_city['posy']);
            }
            $this->Pdf->Cell($cell_city['width'], 0, $cell_city['data'], 0, 0, $cell_city['align']);

            $this->Pdf->SetFont($cell_telefono['font_type'], $cell_telefono['font_style'], $cell_telefono['font_size']);
            $this->pdf_text_color($cell_telefono['data'], $cell_telefono['color_r'], $cell_telefono['color_g'], $cell_telefono['color_b']);
            if (!empty($cell_telefono['posx']) && !empty($cell_telefono['posy']))
            {
                $this->Pdf->SetXY($cell_telefono['posx'], $cell_telefono['posy']);
            }
            elseif (!empty($cell_telefono['posx']))
            {
                $this->Pdf->SetX($cell_telefono['posx']);
            }
            elseif (!empty($cell_telefono['posy']))
            {
                $this->Pdf->SetY($cell_telefono['posy']);
            }
            $this->Pdf->Cell($cell_telefono['width'], 0, $cell_telefono['data'], 0, 0, $cell_telefono['align']);

            $this->Pdf->SetFont($cell_grado_anterior['font_type'], $cell_grado_anterior['font_style'], $cell_grado_anterior['font_size']);
            $this->pdf_text_color($cell_grado_anterior['data'], $cell_grado_anterior['color_r'], $cell_grado_anterior['color_g'], $cell_grado_anterior['color_b']);
            if (!empty($cell_grado_anterior['posx']) && !empty($cell_grado_anterior['posy']))
            {
                $this->Pdf->SetXY($cell_grado_anterior['posx'], $cell_grado_anterior['posy']);
            }
            elseif (!empty($cell_grado_anterior['posx']))
            {
                $this->Pdf->SetX($cell_grado_anterior['posx']);
            }
            elseif (!empty($cell_grado_anterior['posy']))
            {
                $this->Pdf->SetY($cell_grado_anterior['posy']);
            }
            $this->Pdf->Cell($cell_grado_anterior['width'], 0, $cell_grado_anterior['data'], 0, 0, $cell_grado_anterior['align']);

            $this->Pdf->SetFont($cell_last_year['font_type'], $cell_last_year['font_style'], $cell_last_year['font_size']);
            $this->pdf_text_color($cell_last_year['data'], $cell_last_year['color_r'], $cell_last_year['color_g'], $cell_last_year['color_b']);
            if (!empty($cell_last_year['posx']) && !empty($cell_last_year['posy']))
            {
                $this->Pdf->SetXY($cell_last_year['posx'], $cell_last_year['posy']);
            }
            elseif (!empty($cell_last_year['posx']))
            {
                $this->Pdf->SetX($cell_last_year['posx']);
            }
            elseif (!empty($cell_last_year['posy']))
            {
                $this->Pdf->SetY($cell_last_year['posy']);
            }
            $this->Pdf->Cell($cell_last_year['width'], 0, $cell_last_year['data'], 0, 0, $cell_last_year['align']);

            $this->Pdf->SetFont($cell_id_jornada['font_type'], $cell_id_jornada['font_style'], $cell_id_jornada['font_size']);
            $this->pdf_text_color($cell_id_jornada['data'], $cell_id_jornada['color_r'], $cell_id_jornada['color_g'], $cell_id_jornada['color_b']);
            if (!empty($cell_id_jornada['posx']) && !empty($cell_id_jornada['posy']))
            {
                $this->Pdf->SetXY($cell_id_jornada['posx'], $cell_id_jornada['posy']);
            }
            elseif (!empty($cell_id_jornada['posx']))
            {
                $this->Pdf->SetX($cell_id_jornada['posx']);
            }
            elseif (!empty($cell_id_jornada['posy']))
            {
                $this->Pdf->SetY($cell_id_jornada['posy']);
            }
            $this->Pdf->Cell($cell_id_jornada['width'], 0, $cell_id_jornada['data'], 0, 0, $cell_id_jornada['align']);

            $this->Pdf->SetFont($cell_semestre['font_type'], $cell_semestre['font_style'], $cell_semestre['font_size']);
            $this->pdf_text_color($cell_semestre['data'], $cell_semestre['color_r'], $cell_semestre['color_g'], $cell_semestre['color_b']);
            if (!empty($cell_semestre['posx']) && !empty($cell_semestre['posy']))
            {
                $this->Pdf->SetXY($cell_semestre['posx'], $cell_semestre['posy']);
            }
            elseif (!empty($cell_semestre['posx']))
            {
                $this->Pdf->SetX($cell_semestre['posx']);
            }
            elseif (!empty($cell_semestre['posy']))
            {
                $this->Pdf->SetY($cell_semestre['posy']);
            }
            $this->Pdf->Cell($cell_semestre['width'], 0, $cell_semestre['data'], 0, 0, $cell_semestre['align']);

            $this->Pdf->SetFont($cell_dia_mat['font_type'], $cell_dia_mat['font_style'], $cell_dia_mat['font_size']);
            $this->pdf_text_color($cell_dia_mat['data'], $cell_dia_mat['color_r'], $cell_dia_mat['color_g'], $cell_dia_mat['color_b']);
            if (!empty($cell_dia_mat['posx']) && !empty($cell_dia_mat['posy']))
            {
                $this->Pdf->SetXY($cell_dia_mat['posx'], $cell_dia_mat['posy']);
            }
            elseif (!empty($cell_dia_mat['posx']))
            {
                $this->Pdf->SetX($cell_dia_mat['posx']);
            }
            elseif (!empty($cell_dia_mat['posy']))
            {
                $this->Pdf->SetY($cell_dia_mat['posy']);
            }
            $this->Pdf->Cell($cell_dia_mat['width'], 0, $cell_dia_mat['data'], 0, 0, $cell_dia_mat['align']);

            $this->Pdf->SetFont($cell_mes_mat['font_type'], $cell_mes_mat['font_style'], $cell_mes_mat['font_size']);
            $this->pdf_text_color($cell_mes_mat['data'], $cell_mes_mat['color_r'], $cell_mes_mat['color_g'], $cell_mes_mat['color_b']);
            if (!empty($cell_mes_mat['posx']) && !empty($cell_mes_mat['posy']))
            {
                $this->Pdf->SetXY($cell_mes_mat['posx'], $cell_mes_mat['posy']);
            }
            elseif (!empty($cell_mes_mat['posx']))
            {
                $this->Pdf->SetX($cell_mes_mat['posx']);
            }
            elseif (!empty($cell_mes_mat['posy']))
            {
                $this->Pdf->SetY($cell_mes_mat['posy']);
            }
            $this->Pdf->Cell($cell_mes_mat['width'], 0, $cell_mes_mat['data'], 0, 0, $cell_mes_mat['align']);

            $this->Pdf->SetFont($cell_anyo_mat['font_type'], $cell_anyo_mat['font_style'], $cell_anyo_mat['font_size']);
            $this->pdf_text_color($cell_anyo_mat['data'], $cell_anyo_mat['color_r'], $cell_anyo_mat['color_g'], $cell_anyo_mat['color_b']);
            if (!empty($cell_anyo_mat['posx']) && !empty($cell_anyo_mat['posy']))
            {
                $this->Pdf->SetXY($cell_anyo_mat['posx'], $cell_anyo_mat['posy']);
            }
            elseif (!empty($cell_anyo_mat['posx']))
            {
                $this->Pdf->SetX($cell_anyo_mat['posx']);
            }
            elseif (!empty($cell_anyo_mat['posy']))
            {
                $this->Pdf->SetY($cell_anyo_mat['posy']);
            }
            $this->Pdf->Cell($cell_anyo_mat['width'], 0, $cell_anyo_mat['data'], 0, 0, $cell_anyo_mat['align']);

            $this->Pdf->SetFont($cell_nombre_ult_plantel['font_type'], $cell_nombre_ult_plantel['font_style'], $cell_nombre_ult_plantel['font_size']);
            $this->pdf_text_color($cell_nombre_ult_plantel['data'], $cell_nombre_ult_plantel['color_r'], $cell_nombre_ult_plantel['color_g'], $cell_nombre_ult_plantel['color_b']);
            if (!empty($cell_nombre_ult_plantel['posx']) && !empty($cell_nombre_ult_plantel['posy']))
            {
                $this->Pdf->SetXY($cell_nombre_ult_plantel['posx'], $cell_nombre_ult_plantel['posy']);
            }
            elseif (!empty($cell_nombre_ult_plantel['posx']))
            {
                $this->Pdf->SetX($cell_nombre_ult_plantel['posx']);
            }
            elseif (!empty($cell_nombre_ult_plantel['posy']))
            {
                $this->Pdf->SetY($cell_nombre_ult_plantel['posy']);
            }
            $this->Pdf->Cell($cell_nombre_ult_plantel['width'], 0, $cell_nombre_ult_plantel['data'], 0, 0, $cell_nombre_ult_plantel['align']);

            $this->Pdf->SetFont($cell_aprobado['font_type'], $cell_aprobado['font_style'], $cell_aprobado['font_size']);
            $this->pdf_text_color($cell_aprobado['data'], $cell_aprobado['color_r'], $cell_aprobado['color_g'], $cell_aprobado['color_b']);
            if (!empty($cell_aprobado['posx']) && !empty($cell_aprobado['posy']))
            {
                $this->Pdf->SetXY($cell_aprobado['posx'], $cell_aprobado['posy']);
            }
            elseif (!empty($cell_aprobado['posx']))
            {
                $this->Pdf->SetX($cell_aprobado['posx']);
            }
            elseif (!empty($cell_aprobado['posy']))
            {
                $this->Pdf->SetY($cell_aprobado['posy']);
            }
            $this->Pdf->Cell($cell_aprobado['width'], 0, $cell_aprobado['data'], 0, 0, $cell_aprobado['align']);

            $this->Pdf->SetFont($cell_reprobado['font_type'], $cell_reprobado['font_style'], $cell_reprobado['font_size']);
            $this->pdf_text_color($cell_reprobado['data'], $cell_reprobado['color_r'], $cell_reprobado['color_g'], $cell_reprobado['color_b']);
            if (!empty($cell_reprobado['posx']) && !empty($cell_reprobado['posy']))
            {
                $this->Pdf->SetXY($cell_reprobado['posx'], $cell_reprobado['posy']);
            }
            elseif (!empty($cell_reprobado['posx']))
            {
                $this->Pdf->SetX($cell_reprobado['posx']);
            }
            elseif (!empty($cell_reprobado['posy']))
            {
                $this->Pdf->SetY($cell_reprobado['posy']);
            }
            $this->Pdf->Cell($cell_reprobado['width'], 0, $cell_reprobado['data'], 0, 0, $cell_reprobado['align']);

            $this->Pdf->SetFont($cell_desertor['font_type'], $cell_desertor['font_style'], $cell_desertor['font_size']);
            $this->pdf_text_color($cell_desertor['data'], $cell_desertor['color_r'], $cell_desertor['color_g'], $cell_desertor['color_b']);
            if (!empty($cell_desertor['posx']) && !empty($cell_desertor['posy']))
            {
                $this->Pdf->SetXY($cell_desertor['posx'], $cell_desertor['posy']);
            }
            elseif (!empty($cell_desertor['posx']))
            {
                $this->Pdf->SetX($cell_desertor['posx']);
            }
            elseif (!empty($cell_desertor['posy']))
            {
                $this->Pdf->SetY($cell_desertor['posy']);
            }
            $this->Pdf->Cell($cell_desertor['width'], 0, $cell_desertor['data'], 0, 0, $cell_desertor['align']);

            $this->Pdf->SetFont($cell_grado_igreso['font_type'], $cell_grado_igreso['font_style'], $cell_grado_igreso['font_size']);
            $this->pdf_text_color($cell_grado_igreso['data'], $cell_grado_igreso['color_r'], $cell_grado_igreso['color_g'], $cell_grado_igreso['color_b']);
            if (!empty($cell_grado_igreso['posx']) && !empty($cell_grado_igreso['posy']))
            {
                $this->Pdf->SetXY($cell_grado_igreso['posx'], $cell_grado_igreso['posy']);
            }
            elseif (!empty($cell_grado_igreso['posx']))
            {
                $this->Pdf->SetX($cell_grado_igreso['posx']);
            }
            elseif (!empty($cell_grado_igreso['posy']))
            {
                $this->Pdf->SetY($cell_grado_igreso['posy']);
            }
            $this->Pdf->Cell($cell_grado_igreso['width'], 0, $cell_grado_igreso['data'], 0, 0, $cell_grado_igreso['align']);

            $this->Pdf->SetFont($cell_cero['font_type'], $cell_cero['font_style'], $cell_cero['font_size']);
            $this->pdf_text_color($cell_cero['data'], $cell_cero['color_r'], $cell_cero['color_g'], $cell_cero['color_b']);
            if (!empty($cell_cero['posx']) && !empty($cell_cero['posy']))
            {
                $this->Pdf->SetXY($cell_cero['posx'], $cell_cero['posy']);
            }
            elseif (!empty($cell_cero['posx']))
            {
                $this->Pdf->SetX($cell_cero['posx']);
            }
            elseif (!empty($cell_cero['posy']))
            {
                $this->Pdf->SetY($cell_cero['posy']);
            }
            $this->Pdf->Cell($cell_cero['width'], 0, $cell_cero['data'], 0, 0, $cell_cero['align']);

            $this->Pdf->SetFont($cell_uno['font_type'], $cell_uno['font_style'], $cell_uno['font_size']);
            $this->pdf_text_color($cell_uno['data'], $cell_uno['color_r'], $cell_uno['color_g'], $cell_uno['color_b']);
            if (!empty($cell_uno['posx']) && !empty($cell_uno['posy']))
            {
                $this->Pdf->SetXY($cell_uno['posx'], $cell_uno['posy']);
            }
            elseif (!empty($cell_uno['posx']))
            {
                $this->Pdf->SetX($cell_uno['posx']);
            }
            elseif (!empty($cell_uno['posy']))
            {
                $this->Pdf->SetY($cell_uno['posy']);
            }
            $this->Pdf->Cell($cell_uno['width'], 0, $cell_uno['data'], 0, 0, $cell_uno['align']);

            $this->Pdf->SetFont($cell_dos['font_type'], $cell_dos['font_style'], $cell_dos['font_size']);
            $this->pdf_text_color($cell_dos['data'], $cell_dos['color_r'], $cell_dos['color_g'], $cell_dos['color_b']);
            if (!empty($cell_dos['posx']) && !empty($cell_dos['posy']))
            {
                $this->Pdf->SetXY($cell_dos['posx'], $cell_dos['posy']);
            }
            elseif (!empty($cell_dos['posx']))
            {
                $this->Pdf->SetX($cell_dos['posx']);
            }
            elseif (!empty($cell_dos['posy']))
            {
                $this->Pdf->SetY($cell_dos['posy']);
            }
            $this->Pdf->Cell($cell_dos['width'], 0, $cell_dos['data'], 0, 0, $cell_dos['align']);

            $this->Pdf->SetFont($cell_tres['font_type'], $cell_tres['font_style'], $cell_tres['font_size']);
            $this->pdf_text_color($cell_tres['data'], $cell_tres['color_r'], $cell_tres['color_g'], $cell_tres['color_b']);
            if (!empty($cell_tres['posx']) && !empty($cell_tres['posy']))
            {
                $this->Pdf->SetXY($cell_tres['posx'], $cell_tres['posy']);
            }
            elseif (!empty($cell_tres['posx']))
            {
                $this->Pdf->SetX($cell_tres['posx']);
            }
            elseif (!empty($cell_tres['posy']))
            {
                $this->Pdf->SetY($cell_tres['posy']);
            }
            $this->Pdf->Cell($cell_tres['width'], 0, $cell_tres['data'], 0, 0, $cell_tres['align']);

            $this->Pdf->SetFont($cell_cuatro['font_type'], $cell_cuatro['font_style'], $cell_cuatro['font_size']);
            $this->pdf_text_color($cell_cuatro['data'], $cell_cuatro['color_r'], $cell_cuatro['color_g'], $cell_cuatro['color_b']);
            if (!empty($cell_cuatro['posx']) && !empty($cell_cuatro['posy']))
            {
                $this->Pdf->SetXY($cell_cuatro['posx'], $cell_cuatro['posy']);
            }
            elseif (!empty($cell_cuatro['posx']))
            {
                $this->Pdf->SetX($cell_cuatro['posx']);
            }
            elseif (!empty($cell_cuatro['posy']))
            {
                $this->Pdf->SetY($cell_cuatro['posy']);
            }
            $this->Pdf->Cell($cell_cuatro['width'], 0, $cell_cuatro['data'], 0, 0, $cell_cuatro['align']);

            $this->Pdf->SetFont($cell_cinco['font_type'], $cell_cinco['font_style'], $cell_cinco['font_size']);
            $this->pdf_text_color($cell_cinco['data'], $cell_cinco['color_r'], $cell_cinco['color_g'], $cell_cinco['color_b']);
            if (!empty($cell_cinco['posx']) && !empty($cell_cinco['posy']))
            {
                $this->Pdf->SetXY($cell_cinco['posx'], $cell_cinco['posy']);
            }
            elseif (!empty($cell_cinco['posx']))
            {
                $this->Pdf->SetX($cell_cinco['posx']);
            }
            elseif (!empty($cell_cinco['posy']))
            {
                $this->Pdf->SetY($cell_cinco['posy']);
            }
            $this->Pdf->Cell($cell_cinco['width'], 0, $cell_cinco['data'], 0, 0, $cell_cinco['align']);

            $this->Pdf->SetFont($cell_seis['font_type'], $cell_seis['font_style'], $cell_seis['font_size']);
            $this->pdf_text_color($cell_seis['data'], $cell_seis['color_r'], $cell_seis['color_g'], $cell_seis['color_b']);
            if (!empty($cell_seis['posx']) && !empty($cell_seis['posy']))
            {
                $this->Pdf->SetXY($cell_seis['posx'], $cell_seis['posy']);
            }
            elseif (!empty($cell_seis['posx']))
            {
                $this->Pdf->SetX($cell_seis['posx']);
            }
            elseif (!empty($cell_seis['posy']))
            {
                $this->Pdf->SetY($cell_seis['posy']);
            }
            $this->Pdf->Cell($cell_seis['width'], 0, $cell_seis['data'], 0, 0, $cell_seis['align']);

            $this->Pdf->SetFont($cell_siete['font_type'], $cell_siete['font_style'], $cell_siete['font_size']);
            $this->pdf_text_color($cell_siete['data'], $cell_siete['color_r'], $cell_siete['color_g'], $cell_siete['color_b']);
            if (!empty($cell_siete['posx']) && !empty($cell_siete['posy']))
            {
                $this->Pdf->SetXY($cell_siete['posx'], $cell_siete['posy']);
            }
            elseif (!empty($cell_siete['posx']))
            {
                $this->Pdf->SetX($cell_siete['posx']);
            }
            elseif (!empty($cell_siete['posy']))
            {
                $this->Pdf->SetY($cell_siete['posy']);
            }
            $this->Pdf->Cell($cell_siete['width'], 0, $cell_siete['data'], 0, 0, $cell_siete['align']);

            $this->Pdf->SetFont($cell_ocho['font_type'], $cell_ocho['font_style'], $cell_ocho['font_size']);
            $this->pdf_text_color($cell_ocho['data'], $cell_ocho['color_r'], $cell_ocho['color_g'], $cell_ocho['color_b']);
            if (!empty($cell_ocho['posx']) && !empty($cell_ocho['posy']))
            {
                $this->Pdf->SetXY($cell_ocho['posx'], $cell_ocho['posy']);
            }
            elseif (!empty($cell_ocho['posx']))
            {
                $this->Pdf->SetX($cell_ocho['posx']);
            }
            elseif (!empty($cell_ocho['posy']))
            {
                $this->Pdf->SetY($cell_ocho['posy']);
            }
            $this->Pdf->Cell($cell_ocho['width'], 0, $cell_ocho['data'], 0, 0, $cell_ocho['align']);

            $this->Pdf->SetFont($cell_nueve['font_type'], $cell_nueve['font_style'], $cell_nueve['font_size']);
            $this->pdf_text_color($cell_nueve['data'], $cell_nueve['color_r'], $cell_nueve['color_g'], $cell_nueve['color_b']);
            if (!empty($cell_nueve['posx']) && !empty($cell_nueve['posy']))
            {
                $this->Pdf->SetXY($cell_nueve['posx'], $cell_nueve['posy']);
            }
            elseif (!empty($cell_nueve['posx']))
            {
                $this->Pdf->SetX($cell_nueve['posx']);
            }
            elseif (!empty($cell_nueve['posy']))
            {
                $this->Pdf->SetY($cell_nueve['posy']);
            }
            $this->Pdf->Cell($cell_nueve['width'], 0, $cell_nueve['data'], 0, 0, $cell_nueve['align']);

            $this->Pdf->SetFont($cell_n_preescolar['font_type'], $cell_n_preescolar['font_style'], $cell_n_preescolar['font_size']);
            $this->pdf_text_color($cell_n_preescolar['data'], $cell_n_preescolar['color_r'], $cell_n_preescolar['color_g'], $cell_n_preescolar['color_b']);
            if (!empty($cell_n_preescolar['posx']) && !empty($cell_n_preescolar['posy']))
            {
                $this->Pdf->SetXY($cell_n_preescolar['posx'], $cell_n_preescolar['posy']);
            }
            elseif (!empty($cell_n_preescolar['posx']))
            {
                $this->Pdf->SetX($cell_n_preescolar['posx']);
            }
            elseif (!empty($cell_n_preescolar['posy']))
            {
                $this->Pdf->SetY($cell_n_preescolar['posy']);
            }
            $this->Pdf->Cell($cell_n_preescolar['width'], 0, $cell_n_preescolar['data'], 0, 0, $cell_n_preescolar['align']);

            $this->Pdf->SetFont($cell_n_basica_prim['font_type'], $cell_n_basica_prim['font_style'], $cell_n_basica_prim['font_size']);
            $this->pdf_text_color($cell_n_basica_prim['data'], $cell_n_basica_prim['color_r'], $cell_n_basica_prim['color_g'], $cell_n_basica_prim['color_b']);
            if (!empty($cell_n_basica_prim['posx']) && !empty($cell_n_basica_prim['posy']))
            {
                $this->Pdf->SetXY($cell_n_basica_prim['posx'], $cell_n_basica_prim['posy']);
            }
            elseif (!empty($cell_n_basica_prim['posx']))
            {
                $this->Pdf->SetX($cell_n_basica_prim['posx']);
            }
            elseif (!empty($cell_n_basica_prim['posy']))
            {
                $this->Pdf->SetY($cell_n_basica_prim['posy']);
            }
            $this->Pdf->Cell($cell_n_basica_prim['width'], 0, $cell_n_basica_prim['data'], 0, 0, $cell_n_basica_prim['align']);

            $this->Pdf->SetFont($cell_n_basica_secund['font_type'], $cell_n_basica_secund['font_style'], $cell_n_basica_secund['font_size']);
            $this->pdf_text_color($cell_n_basica_secund['data'], $cell_n_basica_secund['color_r'], $cell_n_basica_secund['color_g'], $cell_n_basica_secund['color_b']);
            if (!empty($cell_n_basica_secund['posx']) && !empty($cell_n_basica_secund['posy']))
            {
                $this->Pdf->SetXY($cell_n_basica_secund['posx'], $cell_n_basica_secund['posy']);
            }
            elseif (!empty($cell_n_basica_secund['posx']))
            {
                $this->Pdf->SetX($cell_n_basica_secund['posx']);
            }
            elseif (!empty($cell_n_basica_secund['posy']))
            {
                $this->Pdf->SetY($cell_n_basica_secund['posy']);
            }
            $this->Pdf->Cell($cell_n_basica_secund['width'], 0, $cell_n_basica_secund['data'], 0, 0, $cell_n_basica_secund['align']);

            $this->Pdf->SetFont($cell_subsidio_si['font_type'], $cell_subsidio_si['font_style'], $cell_subsidio_si['font_size']);
            $this->pdf_text_color($cell_subsidio_si['data'], $cell_subsidio_si['color_r'], $cell_subsidio_si['color_g'], $cell_subsidio_si['color_b']);
            if (!empty($cell_subsidio_si['posx']) && !empty($cell_subsidio_si['posy']))
            {
                $this->Pdf->SetXY($cell_subsidio_si['posx'], $cell_subsidio_si['posy']);
            }
            elseif (!empty($cell_subsidio_si['posx']))
            {
                $this->Pdf->SetX($cell_subsidio_si['posx']);
            }
            elseif (!empty($cell_subsidio_si['posy']))
            {
                $this->Pdf->SetY($cell_subsidio_si['posy']);
            }
            $this->Pdf->Cell($cell_subsidio_si['width'], 0, $cell_subsidio_si['data'], 0, 0, $cell_subsidio_si['align']);

            $this->Pdf->SetFont($cell_subsidio_no['font_type'], $cell_subsidio_no['font_style'], $cell_subsidio_no['font_size']);
            $this->pdf_text_color($cell_subsidio_no['data'], $cell_subsidio_no['color_r'], $cell_subsidio_no['color_g'], $cell_subsidio_no['color_b']);
            if (!empty($cell_subsidio_no['posx']) && !empty($cell_subsidio_no['posy']))
            {
                $this->Pdf->SetXY($cell_subsidio_no['posx'], $cell_subsidio_no['posy']);
            }
            elseif (!empty($cell_subsidio_no['posx']))
            {
                $this->Pdf->SetX($cell_subsidio_no['posx']);
            }
            elseif (!empty($cell_subsidio_no['posy']))
            {
                $this->Pdf->SetY($cell_subsidio_no['posy']);
            }
            $this->Pdf->Cell($cell_subsidio_no['width'], 0, $cell_subsidio_no['data'], 0, 0, $cell_subsidio_no['align']);

            $this->Pdf->SetFont($cell_interno_si['font_type'], $cell_interno_si['font_style'], $cell_interno_si['font_size']);
            $this->pdf_text_color($cell_interno_si['data'], $cell_interno_si['color_r'], $cell_interno_si['color_g'], $cell_interno_si['color_b']);
            if (!empty($cell_interno_si['posx']) && !empty($cell_interno_si['posy']))
            {
                $this->Pdf->SetXY($cell_interno_si['posx'], $cell_interno_si['posy']);
            }
            elseif (!empty($cell_interno_si['posx']))
            {
                $this->Pdf->SetX($cell_interno_si['posx']);
            }
            elseif (!empty($cell_interno_si['posy']))
            {
                $this->Pdf->SetY($cell_interno_si['posy']);
            }
            $this->Pdf->Cell($cell_interno_si['width'], 0, $cell_interno_si['data'], 0, 0, $cell_interno_si['align']);

            $this->Pdf->SetFont($cell_interno_no['font_type'], $cell_interno_no['font_style'], $cell_interno_no['font_size']);
            $this->pdf_text_color($cell_interno_no['data'], $cell_interno_no['color_r'], $cell_interno_no['color_g'], $cell_interno_no['color_b']);
            if (!empty($cell_interno_no['posx']) && !empty($cell_interno_no['posy']))
            {
                $this->Pdf->SetXY($cell_interno_no['posx'], $cell_interno_no['posy']);
            }
            elseif (!empty($cell_interno_no['posx']))
            {
                $this->Pdf->SetX($cell_interno_no['posx']);
            }
            elseif (!empty($cell_interno_no['posy']))
            {
                $this->Pdf->SetY($cell_interno_no['posy']);
            }
            $this->Pdf->Cell($cell_interno_no['width'], 0, $cell_interno_no['data'], 0, 0, $cell_interno_no['align']);

            $this->Pdf->SetFont($cell_id_grupo['font_type'], $cell_id_grupo['font_style'], $cell_id_grupo['font_size']);
            $this->pdf_text_color($cell_id_grupo['data'], $cell_id_grupo['color_r'], $cell_id_grupo['color_g'], $cell_id_grupo['color_b']);
            if (!empty($cell_id_grupo['posx']) && !empty($cell_id_grupo['posy']))
            {
                $this->Pdf->SetXY($cell_id_grupo['posx'], $cell_id_grupo['posy']);
            }
            elseif (!empty($cell_id_grupo['posx']))
            {
                $this->Pdf->SetX($cell_id_grupo['posx']);
            }
            elseif (!empty($cell_id_grupo['posy']))
            {
                $this->Pdf->SetY($cell_id_grupo['posy']);
            }
            $this->Pdf->Cell($cell_id_grupo['width'], 0, $cell_id_grupo['data'], 0, 0, $cell_id_grupo['align']);

            $this->Pdf->SetFont($cell_otro_modelo_n1['font_type'], $cell_otro_modelo_n1['font_style'], $cell_otro_modelo_n1['font_size']);
            $this->pdf_text_color($cell_otro_modelo_n1['data'], $cell_otro_modelo_n1['color_r'], $cell_otro_modelo_n1['color_g'], $cell_otro_modelo_n1['color_b']);
            if (!empty($cell_otro_modelo_n1['posx']) && !empty($cell_otro_modelo_n1['posy']))
            {
                $this->Pdf->SetXY($cell_otro_modelo_n1['posx'], $cell_otro_modelo_n1['posy']);
            }
            elseif (!empty($cell_otro_modelo_n1['posx']))
            {
                $this->Pdf->SetX($cell_otro_modelo_n1['posx']);
            }
            elseif (!empty($cell_otro_modelo_n1['posy']))
            {
                $this->Pdf->SetY($cell_otro_modelo_n1['posy']);
            }
            $this->Pdf->Cell($cell_otro_modelo_n1['width'], 0, $cell_otro_modelo_n1['data'], 0, 0, $cell_otro_modelo_n1['align']);

            $this->Pdf->SetFont($cell_otro_modelo_n2['font_type'], $cell_otro_modelo_n2['font_style'], $cell_otro_modelo_n2['font_size']);
            $this->pdf_text_color($cell_otro_modelo_n2['data'], $cell_otro_modelo_n2['color_r'], $cell_otro_modelo_n2['color_g'], $cell_otro_modelo_n2['color_b']);
            if (!empty($cell_otro_modelo_n2['posx']) && !empty($cell_otro_modelo_n2['posy']))
            {
                $this->Pdf->SetXY($cell_otro_modelo_n2['posx'], $cell_otro_modelo_n2['posy']);
            }
            elseif (!empty($cell_otro_modelo_n2['posx']))
            {
                $this->Pdf->SetX($cell_otro_modelo_n2['posx']);
            }
            elseif (!empty($cell_otro_modelo_n2['posy']))
            {
                $this->Pdf->SetY($cell_otro_modelo_n2['posy']);
            }
            $this->Pdf->Cell($cell_otro_modelo_n2['width'], 0, $cell_otro_modelo_n2['data'], 0, 0, $cell_otro_modelo_n2['align']);

            $this->Pdf->SetFont($cell_otro_modelo_aceleracion['font_type'], $cell_otro_modelo_aceleracion['font_style'], $cell_otro_modelo_aceleracion['font_size']);
            $this->pdf_text_color($cell_otro_modelo_aceleracion['data'], $cell_otro_modelo_aceleracion['color_r'], $cell_otro_modelo_aceleracion['color_g'], $cell_otro_modelo_aceleracion['color_b']);
            if (!empty($cell_otro_modelo_aceleracion['posx']) && !empty($cell_otro_modelo_aceleracion['posy']))
            {
                $this->Pdf->SetXY($cell_otro_modelo_aceleracion['posx'], $cell_otro_modelo_aceleracion['posy']);
            }
            elseif (!empty($cell_otro_modelo_aceleracion['posx']))
            {
                $this->Pdf->SetX($cell_otro_modelo_aceleracion['posx']);
            }
            elseif (!empty($cell_otro_modelo_aceleracion['posy']))
            {
                $this->Pdf->SetY($cell_otro_modelo_aceleracion['posy']);
            }
            $this->Pdf->Cell($cell_otro_modelo_aceleracion['width'], 0, $cell_otro_modelo_aceleracion['data'], 0, 0, $cell_otro_modelo_aceleracion['align']);

            $this->Pdf->SetFont($cell_diez['font_type'], $cell_diez['font_style'], $cell_diez['font_size']);
            $this->pdf_text_color($cell_diez['data'], $cell_diez['color_r'], $cell_diez['color_g'], $cell_diez['color_b']);
            if (!empty($cell_diez['posx']) && !empty($cell_diez['posy']))
            {
                $this->Pdf->SetXY($cell_diez['posx'], $cell_diez['posy']);
            }
            elseif (!empty($cell_diez['posx']))
            {
                $this->Pdf->SetX($cell_diez['posx']);
            }
            elseif (!empty($cell_diez['posy']))
            {
                $this->Pdf->SetY($cell_diez['posy']);
            }
            $this->Pdf->Cell($cell_diez['width'], 0, $cell_diez['data'], 0, 0, $cell_diez['align']);

            $this->Pdf->SetFont($cell_once['font_type'], $cell_once['font_style'], $cell_once['font_size']);
            $this->pdf_text_color($cell_once['data'], $cell_once['color_r'], $cell_once['color_g'], $cell_once['color_b']);
            if (!empty($cell_once['posx']) && !empty($cell_once['posy']))
            {
                $this->Pdf->SetXY($cell_once['posx'], $cell_once['posy']);
            }
            elseif (!empty($cell_once['posx']))
            {
                $this->Pdf->SetX($cell_once['posx']);
            }
            elseif (!empty($cell_once['posy']))
            {
                $this->Pdf->SetY($cell_once['posy']);
            }
            $this->Pdf->Cell($cell_once['width'], 0, $cell_once['data'], 0, 0, $cell_once['align']);

            $this->Pdf->SetFont($cell_caracter_acad['font_type'], $cell_caracter_acad['font_style'], $cell_caracter_acad['font_size']);
            $this->pdf_text_color($cell_caracter_acad['data'], $cell_caracter_acad['color_r'], $cell_caracter_acad['color_g'], $cell_caracter_acad['color_b']);
            if (!empty($cell_caracter_acad['posx']) && !empty($cell_caracter_acad['posy']))
            {
                $this->Pdf->SetXY($cell_caracter_acad['posx'], $cell_caracter_acad['posy']);
            }
            elseif (!empty($cell_caracter_acad['posx']))
            {
                $this->Pdf->SetX($cell_caracter_acad['posx']);
            }
            elseif (!empty($cell_caracter_acad['posy']))
            {
                $this->Pdf->SetY($cell_caracter_acad['posy']);
            }
            $this->Pdf->Cell($cell_caracter_acad['width'], 0, $cell_caracter_acad['data'], 0, 0, $cell_caracter_acad['align']);

            $this->Pdf->SetFont($cell_caracter_tec['font_type'], $cell_caracter_tec['font_style'], $cell_caracter_tec['font_size']);
            $this->pdf_text_color($cell_caracter_tec['data'], $cell_caracter_tec['color_r'], $cell_caracter_tec['color_g'], $cell_caracter_tec['color_b']);
            if (!empty($cell_caracter_tec['posx']) && !empty($cell_caracter_tec['posy']))
            {
                $this->Pdf->SetXY($cell_caracter_tec['posx'], $cell_caracter_tec['posy']);
            }
            elseif (!empty($cell_caracter_tec['posx']))
            {
                $this->Pdf->SetX($cell_caracter_tec['posx']);
            }
            elseif (!empty($cell_caracter_tec['posy']))
            {
                $this->Pdf->SetY($cell_caracter_tec['posy']);
            }
            $this->Pdf->Cell($cell_caracter_tec['width'], 0, $cell_caracter_tec['data'], 0, 0, $cell_caracter_tec['align']);

            $this->Pdf->SetFont($cell_esp_comercial['font_type'], $cell_esp_comercial['font_style'], $cell_esp_comercial['font_size']);
            $this->pdf_text_color($cell_esp_comercial['data'], $cell_esp_comercial['color_r'], $cell_esp_comercial['color_g'], $cell_esp_comercial['color_b']);
            if (!empty($cell_esp_comercial['posx']) && !empty($cell_esp_comercial['posy']))
            {
                $this->Pdf->SetXY($cell_esp_comercial['posx'], $cell_esp_comercial['posy']);
            }
            elseif (!empty($cell_esp_comercial['posx']))
            {
                $this->Pdf->SetX($cell_esp_comercial['posx']);
            }
            elseif (!empty($cell_esp_comercial['posy']))
            {
                $this->Pdf->SetY($cell_esp_comercial['posy']);
            }
            $this->Pdf->Cell($cell_esp_comercial['width'], 0, $cell_esp_comercial['data'], 0, 0, $cell_esp_comercial['align']);

            $this->Pdf->SetFont($cell_esp_agropec['font_type'], $cell_esp_agropec['font_style'], $cell_esp_agropec['font_size']);
            $this->pdf_text_color($cell_esp_agropec['data'], $cell_esp_agropec['color_r'], $cell_esp_agropec['color_g'], $cell_esp_agropec['color_b']);
            if (!empty($cell_esp_agropec['posx']) && !empty($cell_esp_agropec['posy']))
            {
                $this->Pdf->SetXY($cell_esp_agropec['posx'], $cell_esp_agropec['posy']);
            }
            elseif (!empty($cell_esp_agropec['posx']))
            {
                $this->Pdf->SetX($cell_esp_agropec['posx']);
            }
            elseif (!empty($cell_esp_agropec['posy']))
            {
                $this->Pdf->SetY($cell_esp_agropec['posy']);
            }
            $this->Pdf->Cell($cell_esp_agropec['width'], 0, $cell_esp_agropec['data'], 0, 0, $cell_esp_agropec['align']);

            $this->Pdf->SetFont($cell_esp_turismo['font_type'], $cell_esp_turismo['font_style'], $cell_esp_turismo['font_size']);
            $this->pdf_text_color($cell_esp_turismo['data'], $cell_esp_turismo['color_r'], $cell_esp_turismo['color_g'], $cell_esp_turismo['color_b']);
            if (!empty($cell_esp_turismo['posx']) && !empty($cell_esp_turismo['posy']))
            {
                $this->Pdf->SetXY($cell_esp_turismo['posx'], $cell_esp_turismo['posy']);
            }
            elseif (!empty($cell_esp_turismo['posx']))
            {
                $this->Pdf->SetX($cell_esp_turismo['posx']);
            }
            elseif (!empty($cell_esp_turismo['posy']))
            {
                $this->Pdf->SetY($cell_esp_turismo['posy']);
            }
            $this->Pdf->Cell($cell_esp_turismo['width'], 0, $cell_esp_turismo['data'], 0, 0, $cell_esp_turismo['align']);

            $this->Pdf->SetFont($cell_esp_normalista['font_type'], $cell_esp_normalista['font_style'], $cell_esp_normalista['font_size']);
            $this->pdf_text_color($cell_esp_normalista['data'], $cell_esp_normalista['color_r'], $cell_esp_normalista['color_g'], $cell_esp_normalista['color_b']);
            if (!empty($cell_esp_normalista['posx']) && !empty($cell_esp_normalista['posy']))
            {
                $this->Pdf->SetXY($cell_esp_normalista['posx'], $cell_esp_normalista['posy']);
            }
            elseif (!empty($cell_esp_normalista['posx']))
            {
                $this->Pdf->SetX($cell_esp_normalista['posx']);
            }
            elseif (!empty($cell_esp_normalista['posy']))
            {
                $this->Pdf->SetY($cell_esp_normalista['posy']);
            }
            $this->Pdf->Cell($cell_esp_normalista['width'], 0, $cell_esp_normalista['data'], 0, 0, $cell_esp_normalista['align']);

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
