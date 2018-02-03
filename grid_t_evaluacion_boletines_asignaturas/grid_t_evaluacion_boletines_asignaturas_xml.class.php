<?php

class grid_t_evaluacion_boletines_asignaturas_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_t_evaluacion_boletines_asignaturas_xml()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_xml()
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
      $this->nm_data    = new nm_data("es");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo     .= "_grid_t_evaluacion_boletines_asignaturas";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_t_evaluacion_boletines_asignaturas.xml";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_boletines_asignaturas']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_boletines_asignaturas']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_boletines_asignaturas']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['campos_busca'];
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
          $this->primer_apellido = $Busca_temp['primer_apellido']; 
          $tmp_pos = strpos($this->primer_apellido, "##@@");
          if ($tmp_pos !== false)
          {
              $this->primer_apellido = substr($this->primer_apellido, 0, $tmp_pos);
          }
          $this->segundo_apellido = $Busca_temp['segundo_apellido']; 
          $tmp_pos = strpos($this->segundo_apellido, "##@@");
          if ($tmp_pos !== false)
          {
              $this->segundo_apellido = substr($this->segundo_apellido, 0, $tmp_pos);
          }
          $this->primer_nombre = $Busca_temp['primer_nombre']; 
          $tmp_pos = strpos($this->primer_nombre, "##@@");
          if ($tmp_pos !== false)
          {
              $this->primer_nombre = substr($this->primer_nombre, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_asignatura, inasistencia_p1, ihs, id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_grupo, id_grado, eval_1_per, dc1, dc2, dc3, dc4, dc5, dp1, dp2, dp3, dp4, dp5, ds1, ds2, ds3, ds4, ds5 from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_asignatura, inasistencia_p1, ihs, id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_grupo, id_grado, eval_1_per, dc1, dc2, dc3, dc4, dc5, dp1, dp2, dp3, dp4, dp5, ds1, ds2, ds3, ds4, ds5 from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $xml_charset = $_SESSION['scriptcase']['charset'];
      $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      if ($this->Grava_view)
      {
          $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
          $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
          fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
          fwrite($xml_v, "<root>\r\n");
      }
      while (!$rs->EOF)
      {
         $this->xml_registro = "<grid_t_evaluacion_boletines_asignaturas";
         $this->id_asignatura = $rs->fields[0] ;  
         $this->id_asignatura = (string)$this->id_asignatura;
         $this->inasistencia_p1 = $rs->fields[1] ;  
         $this->inasistencia_p1 = (string)$this->inasistencia_p1;
         $this->ihs = $rs->fields[2] ;  
         $this->ihs = (string)$this->ihs;
         $this->id_estudiante = $rs->fields[3] ;  
         $this->id_estudiante = (string)$this->id_estudiante;
         $this->primer_apellido = $rs->fields[4] ;  
         $this->segundo_apellido = $rs->fields[5] ;  
         $this->primer_nombre = $rs->fields[6] ;  
         $this->segundo_nombre = $rs->fields[7] ;  
         $this->id_grupo = $rs->fields[8] ;  
         $this->id_grupo = (string)$this->id_grupo;
         $this->id_grado = $rs->fields[9] ;  
         $this->id_grado = (string)$this->id_grado;
         $this->eval_1_per = $rs->fields[10] ;  
         $this->eval_1_per = (strpos(strtolower($this->eval_1_per), "e")) ? (float)$this->eval_1_per : $this->eval_1_per; 
         $this->eval_1_per = (string)$this->eval_1_per;
         $this->dc1 = $rs->fields[11] ;  
         $this->dc1 = (strpos(strtolower($this->dc1), "e")) ? (float)$this->dc1 : $this->dc1; 
         $this->dc1 = (string)$this->dc1;
         $this->dc2 = $rs->fields[12] ;  
         $this->dc2 = (strpos(strtolower($this->dc2), "e")) ? (float)$this->dc2 : $this->dc2; 
         $this->dc2 = (string)$this->dc2;
         $this->dc3 = $rs->fields[13] ;  
         $this->dc3 = (strpos(strtolower($this->dc3), "e")) ? (float)$this->dc3 : $this->dc3; 
         $this->dc3 = (string)$this->dc3;
         $this->dc4 = $rs->fields[14] ;  
         $this->dc4 = (strpos(strtolower($this->dc4), "e")) ? (float)$this->dc4 : $this->dc4; 
         $this->dc4 = (string)$this->dc4;
         $this->dc5 = $rs->fields[15] ;  
         $this->dc5 = (strpos(strtolower($this->dc5), "e")) ? (float)$this->dc5 : $this->dc5; 
         $this->dc5 = (string)$this->dc5;
         $this->dp1 = $rs->fields[16] ;  
         $this->dp1 = (strpos(strtolower($this->dp1), "e")) ? (float)$this->dp1 : $this->dp1; 
         $this->dp1 = (string)$this->dp1;
         $this->dp2 = $rs->fields[17] ;  
         $this->dp2 = (strpos(strtolower($this->dp2), "e")) ? (float)$this->dp2 : $this->dp2; 
         $this->dp2 = (string)$this->dp2;
         $this->dp3 = $rs->fields[18] ;  
         $this->dp3 = (strpos(strtolower($this->dp3), "e")) ? (float)$this->dp3 : $this->dp3; 
         $this->dp3 = (string)$this->dp3;
         $this->dp4 = $rs->fields[19] ;  
         $this->dp4 = (strpos(strtolower($this->dp4), "e")) ? (float)$this->dp4 : $this->dp4; 
         $this->dp4 = (string)$this->dp4;
         $this->dp5 = $rs->fields[20] ;  
         $this->dp5 = (strpos(strtolower($this->dp5), "e")) ? (float)$this->dp5 : $this->dp5; 
         $this->dp5 = (string)$this->dp5;
         $this->ds1 = $rs->fields[21] ;  
         $this->ds1 = (strpos(strtolower($this->ds1), "e")) ? (float)$this->ds1 : $this->ds1; 
         $this->ds1 = (string)$this->ds1;
         $this->ds2 = $rs->fields[22] ;  
         $this->ds2 = (strpos(strtolower($this->ds2), "e")) ? (float)$this->ds2 : $this->ds2; 
         $this->ds2 = (string)$this->ds2;
         $this->ds3 = $rs->fields[23] ;  
         $this->ds3 = (strpos(strtolower($this->ds3), "e")) ? (float)$this->ds3 : $this->ds3; 
         $this->ds3 = (string)$this->ds3;
         $this->ds4 = $rs->fields[24] ;  
         $this->ds4 = (strpos(strtolower($this->ds4), "e")) ? (float)$this->ds4 : $this->ds4; 
         $this->ds4 = (string)$this->ds4;
         $this->ds5 = $rs->fields[25] ;  
         $this->ds5 = (strpos(strtolower($this->ds5), "e")) ? (float)$this->ds5 : $this->ds5; 
         $this->ds5 = (string)$this->ds5;
         //----- lookup - id_asignatura
         $this->look_id_asignatura = $this->id_asignatura; 
         $this->Lookup->lookup_id_asignatura($this->look_id_asignatura, $this->id_asignatura) ; 
         $this->look_id_asignatura = ($this->look_id_asignatura == "&nbsp;") ? "" : $this->look_id_asignatura; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_t_evaluacion_boletines_asignaturas']['contr_erro'] = 'on';
if (!isset($_SESSION['par_inasist'])) {$_SESSION['par_inasist'] = "";}
if (!isset($this->sc_temp_par_inasist)) {$this->sc_temp_par_inasist = (isset($_SESSION['par_inasist'])) ? $_SESSION['par_inasist'] : "";}
   $dc_p1=array($this->dc1 ,$this->dc2 ,$this->dc3 ,$this->dc4 ,$this->dc5 );
$dp_p1=array($this->dp1 ,$this->dp2 ,$this->dp3 ,$this->dp4 ,$this->dp5 );
$ds_p1=array($this->ds1 ,$this->ds2 ,$this->ds3 ,$this->ds4 ,$this->ds5 );


$evaluados_dc_p1=$this->get_evaluados($dc_p1);

if ($evaluados_dc_p1== 0){   
	$evaluados_dc_p1 = 1;
	}
$evaluados_dp_p1=$this->get_evaluados($dp_p1);

if ($evaluados_dp_p1== 0){  
	$evaluados_dp_p1 = 1;
	}
$evaluados_ds_p1=$this->get_evaluados($ds_p1);

if ($evaluados_ds_p1== 0){  
	$evaluados_ds_p1 = 1;
	}





$pcent_dc=(($this->dc1  + $this->dc2  + $this->dc3  + $this->dc4  + $this->dc5  )/$evaluados_dc_p1)* 80 / 100;
$pcent_dp=(( $this->dp1  + $this->dp2  + $this->dp3  + $this->dp4 + $this->dp5 )/$evaluados_dp_p1)*10 / 100;
$pcent_ds=(($this->ds1  + $this->ds2  + $this->ds3  + $this->ds4  + $this->ds5  )/$evaluados_ds_p1)*10 /100;


if($this->id_grado  <= 4){
$this->eval_periodo1 =(($this->dc1  + $this->dc2  + $this->dc3  + $this->dc4  + $this->dc5  )/$evaluados_dc_p1);
}else{		
$this->eval_periodo1 = $pcent_dc + $pcent_dp + $pcent_ds; 
}

if($this->id_asignatura == 41){
$this->eval_periodo1 =$this->eval_1_per ;
}






$check_sql = "SELECT val"
   . " FROM valoracion"
   . " WHERE  '" .$this->eval_periodo1 . "' BETWEEN minimo AND maximo";
 
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
    $this->desem_asig  = $this->rs[0][0];
    
}
		else     
{
		    $val_dc1 = '';   
}
 


if($this->inasistencia_p1  == 0){
	$this->NM_cmp_hidden["inasistencia_p1"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['php_cmp_sel']["inasistencia_p1"] = "off"; }
	}


$check_sql = "SELECT count(id_inasistencia)as aff"
   . " FROM inasistencias"
   . " WHERE fecha < 'curdate(2017/04/25)' AND id_grado > 4 And id_grado < 10 ";
 
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
   $this->sc_temp_par_inasist = $this->rs[0][0];
   
}
		else     
{
		  $this->sc_temp_par_inasist = '';
   
}
if (isset($this->sc_temp_par_inasist)) {$_SESSION['par_inasist'] = $this->sc_temp_par_inasist;}
$_SESSION['scriptcase']['grid_t_evaluacion_boletines_asignaturas']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->xml_registro .= " />\r\n";
         fwrite($xml_f, $this->xml_registro);
         if ($this->Grava_view)
         {
            fwrite($xml_v, $this->xml_registro);
         }
         $rs->MoveNext();
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
      if ($this->Grava_view)
      {
         fwrite($xml_v, "</root>");
         fclose($xml_v);
      }

      $rs->Close();
   }
   //----- id_asignatura
   function NM_export_id_asignatura()
   {
         nmgp_Form_Num_Val($this->look_id_asignatura, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_id_asignatura))
         {
             $this->look_id_asignatura = sc_convert_encoding($this->look_id_asignatura, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_asignatura =\"" . $this->trata_dados($this->look_id_asignatura) . "\"";
   }
   //----- inasistencia_p1
   function NM_export_inasistencia_p1()
   {
         nmgp_Form_Num_Val($this->inasistencia_p1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->inasistencia_p1))
         {
             $this->inasistencia_p1 = sc_convert_encoding($this->inasistencia_p1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " inasistencia_p1 =\"" . $this->trata_dados($this->inasistencia_p1) . "\"";
   }
   //----- ihs
   function NM_export_ihs()
   {
         nmgp_Form_Num_Val($this->ihs, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ihs))
         {
             $this->ihs = sc_convert_encoding($this->ihs, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ihs =\"" . $this->trata_dados($this->ihs) . "\"";
   }
   //----- eval_periodo1
   function NM_export_eval_periodo1()
   {
         nmgp_Form_Num_Val($this->eval_periodo1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "1", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->eval_periodo1))
         {
             $this->eval_periodo1 = sc_convert_encoding($this->eval_periodo1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " eval_periodo1 =\"" . $this->trata_dados($this->eval_periodo1) . "\"";
   }
   //----- desem_asig
   function NM_export_desem_asig()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->desem_asig))
         {
             $this->desem_asig = sc_convert_encoding($this->desem_asig, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " desem_asig =\"" . $this->trata_dados($this->desem_asig) . "\"";
   }
   //----- id_estudiante
   function NM_export_id_estudiante()
   {
         nmgp_Form_Num_Val($this->id_estudiante, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->id_estudiante))
         {
             $this->id_estudiante = sc_convert_encoding($this->id_estudiante, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_estudiante =\"" . $this->trata_dados($this->id_estudiante) . "\"";
   }
   //----- primer_apellido
   function NM_export_primer_apellido()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->primer_apellido))
         {
             $this->primer_apellido = sc_convert_encoding($this->primer_apellido, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " primer_apellido =\"" . $this->trata_dados($this->primer_apellido) . "\"";
   }
   //----- segundo_apellido
   function NM_export_segundo_apellido()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->segundo_apellido))
         {
             $this->segundo_apellido = sc_convert_encoding($this->segundo_apellido, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " segundo_apellido =\"" . $this->trata_dados($this->segundo_apellido) . "\"";
   }
   //----- primer_nombre
   function NM_export_primer_nombre()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->primer_nombre))
         {
             $this->primer_nombre = sc_convert_encoding($this->primer_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " primer_nombre =\"" . $this->trata_dados($this->primer_nombre) . "\"";
   }
   //----- segundo_nombre
   function NM_export_segundo_nombre()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->segundo_nombre))
         {
             $this->segundo_nombre = sc_convert_encoding($this->segundo_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " segundo_nombre =\"" . $this->trata_dados($this->segundo_nombre) . "\"";
   }
   //----- id_grupo
   function NM_export_id_grupo()
   {
         nmgp_Form_Num_Val($this->id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->id_grupo))
         {
             $this->id_grupo = sc_convert_encoding($this->id_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_grupo =\"" . $this->trata_dados($this->id_grupo) . "\"";
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_boletines_asignaturas'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - t_evaluacion :: XML</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XML</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_t_evaluacion_boletines_asignaturas_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_t_evaluacion_boletines_asignaturas"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
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
function get_evaluados($array) {
$_SESSION['scriptcase']['grid_t_evaluacion_boletines_asignaturas']['contr_erro'] = 'on';
    
         $i = 0; foreach ($array as $x) 
                    if ($x > 0) $i++; 
         return $i; 
    
$_SESSION['scriptcase']['grid_t_evaluacion_boletines_asignaturas']['contr_erro'] = 'off';
}
}

?>
