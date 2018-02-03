<?php

class grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima_csv
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
   function grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima_csv()
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
      $this->Arquivo    .= "_grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima";
      $this->Arquivo    .= ".csv";
      $this->Tit_doc    = "grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima.csv";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['csv_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['csv_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['csv_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT t_grupos.id_grado as t_grupos_id_grado, grupo_x_asig_x_doce.id_asignatura as cmp_maior_30_1, grupo_x_asig_x_doce.id_grupo as grupo_x_asig_x_doce_id_grupo, grupo_x_asig_x_doce.id_area as grupo_x_asig_x_doce_id_area, t_grupos.id_director_grupo as t_grupos_id_director_grupo, grupo_x_asig_x_doce.id_docente as grupo_x_asig_x_doce_id_docente, grupo_x_asig_x_doce.tipo_asig as grupo_x_asig_x_doce_tipo_asig from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT t_grupos.id_grado as t_grupos_id_grado, grupo_x_asig_x_doce.id_asignatura as cmp_maior_30_1, grupo_x_asig_x_doce.id_grupo as grupo_x_asig_x_doce_id_grupo, grupo_x_asig_x_doce.id_area as grupo_x_asig_x_doce_id_area, t_grupos.id_director_grupo as t_grupos_id_director_grupo, grupo_x_asig_x_doce.id_docente as grupo_x_asig_x_doce_id_docente, grupo_x_asig_x_doce.tipo_asig as grupo_x_asig_x_doce_tipo_asig from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['order_grid'];
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
         $this->t_grupos_id_grado = $rs->fields[0] ;  
         $this->grupo_x_asig_x_doce_id_asignatura = $rs->fields[1] ;  
         $this->grupo_x_asig_x_doce_id_grupo = $rs->fields[2] ;  
         $this->grupo_x_asig_x_doce_id_area = $rs->fields[3] ;  
         $this->t_grupos_id_director_grupo = $rs->fields[4] ;  
         $this->grupo_x_asig_x_doce_id_docente = $rs->fields[5] ;  
         $this->grupo_x_asig_x_doce_tipo_asig = $rs->fields[6] ;  
         //----- lookup - t_grupos_id_grado
         $this->look_t_grupos_id_grado = $this->t_grupos_id_grado; 
         $this->Lookup->lookup_t_grupos_id_grado($this->look_t_grupos_id_grado, $this->t_grupos_id_grado) ; 
         $this->look_t_grupos_id_grado = ($this->look_t_grupos_id_grado == "&nbsp;") ? "" : $this->look_t_grupos_id_grado; 
         //----- lookup - grupo_x_asig_x_doce_id_asignatura
         $this->look_grupo_x_asig_x_doce_id_asignatura = $this->grupo_x_asig_x_doce_id_asignatura; 
         $this->Lookup->lookup_grupo_x_asig_x_doce_id_asignatura($this->look_grupo_x_asig_x_doce_id_asignatura, $this->grupo_x_asig_x_doce_id_asignatura) ; 
         $this->look_grupo_x_asig_x_doce_id_asignatura = ($this->look_grupo_x_asig_x_doce_id_asignatura == "&nbsp;") ? "" : $this->look_grupo_x_asig_x_doce_id_asignatura; 
         //----- lookup - grupo_x_asig_x_doce_id_grupo
         $this->look_grupo_x_asig_x_doce_id_grupo = $this->grupo_x_asig_x_doce_id_grupo; 
         $this->Lookup->lookup_grupo_x_asig_x_doce_id_grupo($this->look_grupo_x_asig_x_doce_id_grupo, $this->grupo_x_asig_x_doce_id_grupo) ; 
         $this->look_grupo_x_asig_x_doce_id_grupo = ($this->look_grupo_x_asig_x_doce_id_grupo == "&nbsp;") ? "" : $this->look_grupo_x_asig_x_doce_id_grupo; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['contr_erro'] = 'on';
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
    $this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "on"; }
	$this->NM_cmp_hidden["evalua_tec_iti"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_tec_iti"] = "on"; }
	$this->NM_cmp_hidden["evalua_disc_confam"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disc_confam"] = "off"; }
}
		else     
{
	 $this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "off"; }
	$this->NM_cmp_hidden["evalua_disc_confam"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disc_confam"] = "off"; }	
			$this->NM_cmp_hidden["evalua_tec_iti"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_tec_iti"] = "on"; }
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


$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "off"; }  
$this->NM_cmp_hidden["evalua_periodo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo"] = "off"; }  
$this->NM_cmp_hidden["evlua_periodom2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom2"] = "off"; }  
$this->NM_cmp_hidden["evlua_periodom3"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom3"] = "off"; }  
$this->NM_cmp_hidden["evlua_periodom4"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom4"] = "off"; }  
$this->NM_cmp_hidden["evlua_periodom5"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom5"] = "off"; } 
$this->NM_cmp_hidden["evlua_periodom6"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom6"] = "off"; }  
$this->NM_cmp_hidden["evalua_periodomp1"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodomp1"] = "off"; } 
$this->NM_cmp_hidden["evalua_periodom8"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodom8"] = "off"; }  
$this->NM_cmp_hidden["evalua_periodo_tran"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo_tran"] = "off"; }
$this->NM_cmp_hidden["evalua_tec_iti"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_tec_iti"] = "off"; }if($this->sc_temp_par_modelo == 1 and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodo"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "off"; }	
}elseif($this->sc_temp_par_modelo == 1 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif( $this->sc_temp_par_modelo == 1  and    $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ) {
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evalua_periodo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo"] = "off"; }	
}


if($this->sc_temp_par_modelo == 2 and  $this->t_grupos_id_grado  >=5  and ($this->grupo_x_asig_x_doce_tipo_asig  == 'A' || $this->grupo_x_asig_x_doce_tipo_asig  == 'T'|| $this->grupo_x_asig_x_doce_tipo_asig  == 'C' ) and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom2"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom2"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 2 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom2"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 2 and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) and ($this->grupo_x_asig_x_doce_tipo_asig  == 'A' || $this->grupo_x_asig_x_doce_tipo_asig  == 'T'|| $this->grupo_x_asig_x_doce_tipo_asig  == 'C' ) and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evlua_periodom2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom2"] = "off"; }	
}

if($this->sc_temp_par_modelo == 3 and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom3"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom3"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 3 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom3"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom3"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 3 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evlua_periodom3"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom3"] = "off"; }	
}


if($this->sc_temp_par_modelo == 4 and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom4"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom4"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 4 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom4"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom4"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 4  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evlua_periodom4"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom4"] = "off"; }	
}

if($this->sc_temp_par_modelo == 5 and  $this->t_grupos_id_grado  >= 5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom5"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom5"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 5 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evlua_periodom5"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom5"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 5 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  <5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evlua_periodom5"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom5"] = "off"; }	
}


if($this->sc_temp_par_modelo == 6 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) and  $this->t_grupos_id_grado >=5 ){
$this->NM_cmp_hidden["evlua_periodom6"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom6"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 6 and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )  and  $this->t_grupos_id_grado >=1 ){
$this->NM_cmp_hidden["evlua_periodom6"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom6"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 6 and $this->grupo_x_asig_x_doce_tipo_asig  == 'T' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )  and  $this->t_grupos_id_grado >=5){
$this->NM_cmp_hidden["evlua_periodom6"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom6"] = "off"; }
$this->NM_cmp_hidden["evalua_tec_iti"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_tec_iti"] = "on"; }}elseif($this->sc_temp_par_modelo == 6  and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado <5 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evlua_periodom6"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evlua_periodom6"] = "off"; }	
}

if($this->sc_temp_par_modelo == 8 and  $this->t_grupos_id_grado  >=5  and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodom8"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodom8"] = "on"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "off"; }		
}elseif($this->sc_temp_par_modelo == 8 and  $this->t_grupos_id_grado  >= 1  and $this->grupo_x_asig_x_doce_tipo_asig  == 'C' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 ) ){
$this->NM_cmp_hidden["evalua_periodom8"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodom8"] = "off"; }
$this->NM_cmp_hidden["evalua_disciplina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_disciplina"] = "on"; }	
}elseif($this->sc_temp_par_modelo == 8 and $this->grupo_x_asig_x_doce_tipo_asig  == 'A' and ($this->sc_temp_fecha_hoy>= $this->sc_temp_par_apertura_p1 and $this->sc_temp_fecha_hoy<= $this->sc_temp_par_cierre_p1 )and  $this->t_grupos_id_grado  < 5 ){
$this->NM_cmp_hidden["evalua_periodo_tran"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodo_tran"] = "on"; }
$this->NM_cmp_hidden["evalua_periodom8"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['php_cmp_sel']["evalua_periodom8"] = "off"; }	

}








if(empty($this->t_grupos_id_director_grupo )){
	$this->nmgp_botoes["Observaciones Generales"] = "off";}
if (isset($this->sc_temp_par_area)) {$_SESSION['par_area'] = $this->sc_temp_par_area;}
if (isset($this->sc_temp_par_id_grupo)) {$_SESSION['par_id_grupo'] = $this->sc_temp_par_id_grupo;}
if (isset($this->sc_temp_par_tipo_asign)) {$_SESSION['par_tipo_asign'] = $this->sc_temp_par_tipo_asign;}
if (isset($this->sc_temp_par_modelo)) {$_SESSION['par_modelo'] = $this->sc_temp_par_modelo;}
if (isset($this->sc_temp_fecha_hoy)) {$_SESSION['fecha_hoy'] = $this->sc_temp_fecha_hoy;}
if (isset($this->sc_temp_par_apertura_p1)) {$_SESSION['par_apertura_p1'] = $this->sc_temp_par_apertura_p1;}
if (isset($this->sc_temp_par_cierre_p1)) {$_SESSION['par_cierre_p1'] = $this->sc_temp_par_cierre_p1;}
$_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['field_order'] as $Cada_col)
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
   //----- t_grupos_id_grado
   function NM_export_t_grupos_id_grado()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_t_grupos_id_grado);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- grupo_x_asig_x_doce_id_asignatura
   function NM_export_grupo_x_asig_x_doce_id_asignatura()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_grupo_x_asig_x_doce_id_asignatura);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- grupo_x_asig_x_doce_id_grupo
   function NM_export_grupo_x_asig_x_doce_id_grupo()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_grupo_x_asig_x_doce_id_grupo);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- crea_desempeno
   function NM_export_crea_desempeno()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->crea_desempeno);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->sc_field_0);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evalua_periodo
   function NM_export_evalua_periodo()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evalua_periodo);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evlua_periodom2
   function NM_export_evlua_periodom2()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evlua_periodom2);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evlua_periodom3
   function NM_export_evlua_periodom3()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evlua_periodom3);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evlua_periodom4
   function NM_export_evlua_periodom4()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evlua_periodom4);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evlua_periodom5
   function NM_export_evlua_periodom5()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evlua_periodom5);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evlua_periodom6
   function NM_export_evlua_periodom6()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evlua_periodom6);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evalua_periodom8
   function NM_export_evalua_periodom8()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evalua_periodom8);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evalua_disc_confam
   function NM_export_evalua_disc_confam()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evalua_disc_confam);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evalua_disciplina
   function NM_export_evalua_disciplina()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evalua_disciplina);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evalua_periodomp1
   function NM_export_evalua_periodomp1()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evalua_periodomp1);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evalua_tec_iti
   function NM_export_evalua_tec_iti()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evalua_tec_iti);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- evalua_periodo_tran
   function NM_export_evalua_periodo_tran()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->evalua_periodo_tran);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- obs_asig
   function NM_export_obs_asig()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->obs_asig);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- superaciones
   function NM_export_superaciones()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->superaciones);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- eval_pendiente
   function NM_export_eval_pendiente()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->eval_pendiente);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- ref_acade
   function NM_export_ref_acade()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->ref_acade);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- enviar_tarea
   function NM_export_enviar_tarea()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->enviar_tarea);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Acciones :: CSV</TITLE>
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
<form name="Fdown" method="get" action="grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima"> 
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
function modelos_evaluacion()
{
$_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['contr_erro'] = 'on';
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
$_SESSION['scriptcase']['grid_grupo_x_asig_x_doce_p_eval_seguridad_ultima']['contr_erro'] = 'off';
}
}

?>
