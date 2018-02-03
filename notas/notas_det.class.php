<?php
//--- 
class notas_det
{
   var $Ini;
   var $Erro;
   var $Db;
   var $nm_data;
   var $NM_raiz_img; 
   var $nmgp_botoes; 
   var $nm_location;
   var $t_asignaturas_asignatura;
   var $t_evaluacion_id_estudiante;
   var $t_evaluacion_primer_apellido;
   var $t_evaluacion_segundo_apellido;
   var $t_evaluacion_primer_nombre;
   var $t_evaluacion_segundo_nombre;
   var $t_evaluacion_id_grupo;
   var $t_evaluacion_id_area;
   var $t_evaluacion_id_grado;
   var $t_evaluacion_eval_1_per;
   var $t_evaluacion_dc1;
   var $t_evaluacion_dc2;
   var $t_evaluacion_dc3;
   var $t_evaluacion_dc4;
   var $t_evaluacion_dc5;
   var $t_evaluacion_dc6;
   var $t_evaluacion_dc7;
   var $t_evaluacion_dc8;
   var $t_evaluacion_dc9;
   var $t_evaluacion_dc10;
   var $t_evaluacion_dc11;
   var $t_evaluacion_dc12;
   var $t_evaluacion_pcent_dc;
   var $t_evaluacion_ds1;
   var $t_evaluacion_ds2;
   var $t_evaluacion_ds3;
   var $t_evaluacion_ds4;
   var $t_evaluacion_letras_p1;
   var $t_evaluacion_ds5;
   var $t_evaluacion_pcent_ds;
   var $t_evaluacion_dp1;
   var $t_evaluacion_dp2;
   var $t_evaluacion_dp3;
   var $t_evaluacion_dp4;
   var $t_evaluacion_dp5;
   var $t_evaluacion_pcent_dp;
   var $t_evaluacion_aeep1;
   var $t_evaluacion_porcent_aeep1;
   var $t_evaluacion_inasistencia_p1;
 function monta_det()
 {
    global 
           $nm_saida, $nm_lang, $nmgp_cor_print, $nmgp_tipo_pdf;
    $this->nmgp_botoes['det_pdf'] = "on";
    $this->nmgp_botoes['det_print'] = "on";
    $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
    if (isset($_SESSION['scriptcase']['sc_apl_conf']['notas']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['notas']['btn_display']))
    {
        foreach ($_SESSION['scriptcase']['sc_apl_conf']['notas']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
        {
            $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
        }
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['notas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['notas']['campos_busca']))
    { 
        $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['notas']['campos_busca'];
        if ($_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        $this->t_asignaturas_asignatura = $Busca_temp['t_asignaturas_asignatura']; 
        $tmp_pos = strpos($this->t_asignaturas_asignatura, "##@@");
        if ($tmp_pos !== false)
        {
            $this->t_asignaturas_asignatura = substr($this->t_asignaturas_asignatura, 0, $tmp_pos);
        }
        $this->t_evaluacion_id_estudiante = $Busca_temp['t_evaluacion_id_estudiante']; 
        $tmp_pos = strpos($this->t_evaluacion_id_estudiante, "##@@");
        if ($tmp_pos !== false)
        {
            $this->t_evaluacion_id_estudiante = substr($this->t_evaluacion_id_estudiante, 0, $tmp_pos);
        }
        $this->t_evaluacion_id_estudiante_2 = $Busca_temp['t_evaluacion_id_estudiante_input_2']; 
        $this->t_evaluacion_primer_apellido = $Busca_temp['t_evaluacion_primer_apellido']; 
        $tmp_pos = strpos($this->t_evaluacion_primer_apellido, "##@@");
        if ($tmp_pos !== false)
        {
            $this->t_evaluacion_primer_apellido = substr($this->t_evaluacion_primer_apellido, 0, $tmp_pos);
        }
        $this->t_evaluacion_segundo_apellido = $Busca_temp['t_evaluacion_segundo_apellido']; 
        $tmp_pos = strpos($this->t_evaluacion_segundo_apellido, "##@@");
        if ($tmp_pos !== false)
        {
            $this->t_evaluacion_segundo_apellido = substr($this->t_evaluacion_segundo_apellido, 0, $tmp_pos);
        }
    } 
    $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['notas']['where_orig'];
    $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['notas']['where_pesq'];
    $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['notas']['where_pesq_filtro'];
    $this->nm_field_dinamico = array();
    $this->nm_order_dinamico = array();
    $this->nm_data = new nm_data("es_es");
    $this->NM_raiz_img  = ""; 
    $this->sc_proc_grid = false; 
    include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
    $_SESSION['sc_session'][$this->Ini->sc_page]['notas']['seq_dir'] = 0; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['notas']['sub_dir'] = array(); 
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
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
       $nmgp_select = "SELECT t_asignaturas.asignatura as t_asignaturas_asignatura, t_evaluacion.id_estudiante as t_evaluacion_id_estudiante, t_evaluacion.primer_apellido as t_evaluacion_primer_apellido, t_evaluacion.segundo_apellido as t_evaluacion_segundo_apellido, t_evaluacion.primer_nombre as t_evaluacion_primer_nombre, t_evaluacion.segundo_nombre as t_evaluacion_segundo_nombre, t_evaluacion.id_grupo as t_evaluacion_id_grupo, t_evaluacion.id_area as t_evaluacion_id_area, t_evaluacion.id_grado as t_evaluacion_id_grado, t_evaluacion.eval_1_per as t_evaluacion_eval_1_per, t_evaluacion.dc1 as t_evaluacion_dc1, t_evaluacion.dc2 as t_evaluacion_dc2, t_evaluacion.dc3 as t_evaluacion_dc3, t_evaluacion.dc4 as t_evaluacion_dc4, t_evaluacion.dc5 as t_evaluacion_dc5, t_evaluacion.dc6 as t_evaluacion_dc6, t_evaluacion.dc7 as t_evaluacion_dc7, t_evaluacion.dc8 as t_evaluacion_dc8, t_evaluacion.dc9 as t_evaluacion_dc9, t_evaluacion.dc10 as t_evaluacion_dc10, t_evaluacion.dc11 as t_evaluacion_dc11, t_evaluacion.dc12 as t_evaluacion_dc12, t_evaluacion.pcent_dc as t_evaluacion_pcent_dc, t_evaluacion.ds1 as t_evaluacion_ds1, t_evaluacion.ds2 as t_evaluacion_ds2, t_evaluacion.ds3 as t_evaluacion_ds3, t_evaluacion.ds4 as t_evaluacion_ds4, t_evaluacion.letras_p1 as t_evaluacion_letras_p1, t_evaluacion.ds5 as t_evaluacion_ds5, t_evaluacion.pcent_ds as t_evaluacion_pcent_ds, t_evaluacion.dp1 as t_evaluacion_dp1, t_evaluacion.dp2 as t_evaluacion_dp2, t_evaluacion.dp3 as t_evaluacion_dp3, t_evaluacion.dp4 as t_evaluacion_dp4, t_evaluacion.dp5 as t_evaluacion_dp5, t_evaluacion.pcent_dp as t_evaluacion_pcent_dp, t_evaluacion.aeep1 as t_evaluacion_aeep1, t_evaluacion.porcent_aeep1 as t_evaluacion_porcent_aeep1, t_evaluacion.inasistencia_p1 as t_evaluacion_inasistencia_p1 from " . $this->Ini->nm_tabela; 
   $parms_det = explode("*PDet*", $_SESSION['sc_session'][$this->Ini->sc_page]['notas']['chave_det']) ; 
   foreach ($parms_det as $key => $cada_par)
   {
       $parms_det[$key] = $this->Db->qstr($parms_det[$key]);
       $parms_det[$key] = substr($parms_det[$key], 1, strlen($parms_det[$key]) - 2);
   } 
   $nmgp_select .= " where  t_asignaturas.asignatura = '$parms_det[0]' and t_evaluacion.id_estudiante = $parms_det[1] and t_evaluacion.primer_apellido = '$parms_det[2]' and t_evaluacion.segundo_apellido = '$parms_det[3]' and t_evaluacion.primer_nombre = '$parms_det[4]' and t_evaluacion.segundo_nombre = '$parms_det[5]' and t_evaluacion.id_grupo = $parms_det[6]" ;  
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $rs = $this->Db->Execute($nmgp_select) ; 
   if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   $this->t_asignaturas_asignatura = $rs->fields[0] ;  
   $this->t_evaluacion_id_estudiante = $rs->fields[1] ;  
   $this->t_evaluacion_id_estudiante = (string)$this->t_evaluacion_id_estudiante;
   $this->t_evaluacion_primer_apellido = $rs->fields[2] ;  
   $this->t_evaluacion_segundo_apellido = $rs->fields[3] ;  
   $this->t_evaluacion_primer_nombre = $rs->fields[4] ;  
   $this->t_evaluacion_segundo_nombre = $rs->fields[5] ;  
   $this->t_evaluacion_id_grupo = $rs->fields[6] ;  
   $this->t_evaluacion_id_grupo = (string)$this->t_evaluacion_id_grupo;
   $this->t_evaluacion_id_area = $rs->fields[7] ;  
   $this->t_evaluacion_id_area = (string)$this->t_evaluacion_id_area;
   $this->t_evaluacion_id_grado = $rs->fields[8] ;  
   $this->t_evaluacion_id_grado = (string)$this->t_evaluacion_id_grado;
   $this->t_evaluacion_eval_1_per = $rs->fields[9] ;  
   $this->t_evaluacion_eval_1_per = (strpos(strtolower($this->t_evaluacion_eval_1_per), "e")) ? (float)$this->t_evaluacion_eval_1_per : $this->t_evaluacion_eval_1_per; 
   $this->t_evaluacion_eval_1_per = (string)$this->t_evaluacion_eval_1_per;
   $this->t_evaluacion_dc1 = $rs->fields[10] ;  
   $this->t_evaluacion_dc1 = (strpos(strtolower($this->t_evaluacion_dc1), "e")) ? (float)$this->t_evaluacion_dc1 : $this->t_evaluacion_dc1; 
   $this->t_evaluacion_dc1 = (string)$this->t_evaluacion_dc1;
   $this->t_evaluacion_dc2 = $rs->fields[11] ;  
   $this->t_evaluacion_dc2 = (strpos(strtolower($this->t_evaluacion_dc2), "e")) ? (float)$this->t_evaluacion_dc2 : $this->t_evaluacion_dc2; 
   $this->t_evaluacion_dc2 = (string)$this->t_evaluacion_dc2;
   $this->t_evaluacion_dc3 = $rs->fields[12] ;  
   $this->t_evaluacion_dc3 = (strpos(strtolower($this->t_evaluacion_dc3), "e")) ? (float)$this->t_evaluacion_dc3 : $this->t_evaluacion_dc3; 
   $this->t_evaluacion_dc3 = (string)$this->t_evaluacion_dc3;
   $this->t_evaluacion_dc4 = $rs->fields[13] ;  
   $this->t_evaluacion_dc4 = (strpos(strtolower($this->t_evaluacion_dc4), "e")) ? (float)$this->t_evaluacion_dc4 : $this->t_evaluacion_dc4; 
   $this->t_evaluacion_dc4 = (string)$this->t_evaluacion_dc4;
   $this->t_evaluacion_dc5 = $rs->fields[14] ;  
   $this->t_evaluacion_dc5 = (strpos(strtolower($this->t_evaluacion_dc5), "e")) ? (float)$this->t_evaluacion_dc5 : $this->t_evaluacion_dc5; 
   $this->t_evaluacion_dc5 = (string)$this->t_evaluacion_dc5;
   $this->t_evaluacion_dc6 = $rs->fields[15] ;  
   $this->t_evaluacion_dc6 = (strpos(strtolower($this->t_evaluacion_dc6), "e")) ? (float)$this->t_evaluacion_dc6 : $this->t_evaluacion_dc6; 
   $this->t_evaluacion_dc6 = (string)$this->t_evaluacion_dc6;
   $this->t_evaluacion_dc7 = $rs->fields[16] ;  
   $this->t_evaluacion_dc7 = (strpos(strtolower($this->t_evaluacion_dc7), "e")) ? (float)$this->t_evaluacion_dc7 : $this->t_evaluacion_dc7; 
   $this->t_evaluacion_dc7 = (string)$this->t_evaluacion_dc7;
   $this->t_evaluacion_dc8 = $rs->fields[17] ;  
   $this->t_evaluacion_dc8 = (strpos(strtolower($this->t_evaluacion_dc8), "e")) ? (float)$this->t_evaluacion_dc8 : $this->t_evaluacion_dc8; 
   $this->t_evaluacion_dc8 = (string)$this->t_evaluacion_dc8;
   $this->t_evaluacion_dc9 = $rs->fields[18] ;  
   $this->t_evaluacion_dc9 = (strpos(strtolower($this->t_evaluacion_dc9), "e")) ? (float)$this->t_evaluacion_dc9 : $this->t_evaluacion_dc9; 
   $this->t_evaluacion_dc9 = (string)$this->t_evaluacion_dc9;
   $this->t_evaluacion_dc10 = $rs->fields[19] ;  
   $this->t_evaluacion_dc10 = (strpos(strtolower($this->t_evaluacion_dc10), "e")) ? (float)$this->t_evaluacion_dc10 : $this->t_evaluacion_dc10; 
   $this->t_evaluacion_dc10 = (string)$this->t_evaluacion_dc10;
   $this->t_evaluacion_dc11 = $rs->fields[20] ;  
   $this->t_evaluacion_dc11 = (strpos(strtolower($this->t_evaluacion_dc11), "e")) ? (float)$this->t_evaluacion_dc11 : $this->t_evaluacion_dc11; 
   $this->t_evaluacion_dc11 = (string)$this->t_evaluacion_dc11;
   $this->t_evaluacion_dc12 = $rs->fields[21] ;  
   $this->t_evaluacion_dc12 = (strpos(strtolower($this->t_evaluacion_dc12), "e")) ? (float)$this->t_evaluacion_dc12 : $this->t_evaluacion_dc12; 
   $this->t_evaluacion_dc12 = (string)$this->t_evaluacion_dc12;
   $this->t_evaluacion_pcent_dc = $rs->fields[22] ;  
   $this->t_evaluacion_pcent_dc = (strpos(strtolower($this->t_evaluacion_pcent_dc), "e")) ? (float)$this->t_evaluacion_pcent_dc : $this->t_evaluacion_pcent_dc; 
   $this->t_evaluacion_pcent_dc = (string)$this->t_evaluacion_pcent_dc;
   $this->t_evaluacion_ds1 = $rs->fields[23] ;  
   $this->t_evaluacion_ds1 = (strpos(strtolower($this->t_evaluacion_ds1), "e")) ? (float)$this->t_evaluacion_ds1 : $this->t_evaluacion_ds1; 
   $this->t_evaluacion_ds1 = (string)$this->t_evaluacion_ds1;
   $this->t_evaluacion_ds2 = $rs->fields[24] ;  
   $this->t_evaluacion_ds2 = (strpos(strtolower($this->t_evaluacion_ds2), "e")) ? (float)$this->t_evaluacion_ds2 : $this->t_evaluacion_ds2; 
   $this->t_evaluacion_ds2 = (string)$this->t_evaluacion_ds2;
   $this->t_evaluacion_ds3 = $rs->fields[25] ;  
   $this->t_evaluacion_ds3 = (strpos(strtolower($this->t_evaluacion_ds3), "e")) ? (float)$this->t_evaluacion_ds3 : $this->t_evaluacion_ds3; 
   $this->t_evaluacion_ds3 = (string)$this->t_evaluacion_ds3;
   $this->t_evaluacion_ds4 = $rs->fields[26] ;  
   $this->t_evaluacion_ds4 = (strpos(strtolower($this->t_evaluacion_ds4), "e")) ? (float)$this->t_evaluacion_ds4 : $this->t_evaluacion_ds4; 
   $this->t_evaluacion_ds4 = (string)$this->t_evaluacion_ds4;
   $this->t_evaluacion_letras_p1 = $rs->fields[27] ;  
   $this->t_evaluacion_ds5 = $rs->fields[28] ;  
   $this->t_evaluacion_ds5 = (strpos(strtolower($this->t_evaluacion_ds5), "e")) ? (float)$this->t_evaluacion_ds5 : $this->t_evaluacion_ds5; 
   $this->t_evaluacion_ds5 = (string)$this->t_evaluacion_ds5;
   $this->t_evaluacion_pcent_ds = $rs->fields[29] ;  
   $this->t_evaluacion_pcent_ds = (strpos(strtolower($this->t_evaluacion_pcent_ds), "e")) ? (float)$this->t_evaluacion_pcent_ds : $this->t_evaluacion_pcent_ds; 
   $this->t_evaluacion_pcent_ds = (string)$this->t_evaluacion_pcent_ds;
   $this->t_evaluacion_dp1 = $rs->fields[30] ;  
   $this->t_evaluacion_dp1 = (strpos(strtolower($this->t_evaluacion_dp1), "e")) ? (float)$this->t_evaluacion_dp1 : $this->t_evaluacion_dp1; 
   $this->t_evaluacion_dp1 = (string)$this->t_evaluacion_dp1;
   $this->t_evaluacion_dp2 = $rs->fields[31] ;  
   $this->t_evaluacion_dp2 = (strpos(strtolower($this->t_evaluacion_dp2), "e")) ? (float)$this->t_evaluacion_dp2 : $this->t_evaluacion_dp2; 
   $this->t_evaluacion_dp2 = (string)$this->t_evaluacion_dp2;
   $this->t_evaluacion_dp3 = $rs->fields[32] ;  
   $this->t_evaluacion_dp3 = (strpos(strtolower($this->t_evaluacion_dp3), "e")) ? (float)$this->t_evaluacion_dp3 : $this->t_evaluacion_dp3; 
   $this->t_evaluacion_dp3 = (string)$this->t_evaluacion_dp3;
   $this->t_evaluacion_dp4 = $rs->fields[33] ;  
   $this->t_evaluacion_dp4 = (strpos(strtolower($this->t_evaluacion_dp4), "e")) ? (float)$this->t_evaluacion_dp4 : $this->t_evaluacion_dp4; 
   $this->t_evaluacion_dp4 = (string)$this->t_evaluacion_dp4;
   $this->t_evaluacion_dp5 = $rs->fields[34] ;  
   $this->t_evaluacion_dp5 = (strpos(strtolower($this->t_evaluacion_dp5), "e")) ? (float)$this->t_evaluacion_dp5 : $this->t_evaluacion_dp5; 
   $this->t_evaluacion_dp5 = (string)$this->t_evaluacion_dp5;
   $this->t_evaluacion_pcent_dp = $rs->fields[35] ;  
   $this->t_evaluacion_pcent_dp = (strpos(strtolower($this->t_evaluacion_pcent_dp), "e")) ? (float)$this->t_evaluacion_pcent_dp : $this->t_evaluacion_pcent_dp; 
   $this->t_evaluacion_pcent_dp = (string)$this->t_evaluacion_pcent_dp;
   $this->t_evaluacion_aeep1 = $rs->fields[36] ;  
   $this->t_evaluacion_aeep1 = (strpos(strtolower($this->t_evaluacion_aeep1), "e")) ? (float)$this->t_evaluacion_aeep1 : $this->t_evaluacion_aeep1; 
   $this->t_evaluacion_aeep1 = (string)$this->t_evaluacion_aeep1;
   $this->t_evaluacion_porcent_aeep1 = $rs->fields[37] ;  
   $this->t_evaluacion_porcent_aeep1 = (strpos(strtolower($this->t_evaluacion_porcent_aeep1), "e")) ? (float)$this->t_evaluacion_porcent_aeep1 : $this->t_evaluacion_porcent_aeep1; 
   $this->t_evaluacion_porcent_aeep1 = (string)$this->t_evaluacion_porcent_aeep1;
   $this->t_evaluacion_inasistencia_p1 = $rs->fields[38] ;  
   $this->t_evaluacion_inasistencia_p1 = (string)$this->t_evaluacion_inasistencia_p1;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['notas']['cmp_acum']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['notas']['cmp_acum']))
   {
       $parms_acum = explode(";", $_SESSION['sc_session'][$this->Ini->sc_page]['notas']['cmp_acum']);
       foreach ($parms_acum as $cada_par)
       {
          $cada_val = explode("=", $cada_par);
          $this->$cada_val[0] = $cada_val[1];
       }
   }
//--- 
   $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
   $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
   $nm_saida->saida("<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
   $nm_saida->saida("<HEAD>\r\n");
   $nm_saida->saida("   <TITLE>" . $this->Ini->Nm_lang['lang_othr_detl_titl'] . " - </TITLE>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
   $nm_saida->saida(" <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
   if ($_SESSION['scriptcase']['proc_mobile'])
   {
       $nm_saida->saida(" <meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;\" />\r\n");
   }

   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery.js\"></script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\">var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';</script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput.js\"></script>\r\n");
   $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
   if (($_SESSION['sc_session'][$this->Ini->sc_page]['notas']['det_print'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
   }
   else
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
   }
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "notas/notas_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['notas']['pdf_det'] && $_SESSION['sc_session'][$this->Ini->sc_page]['notas']['det_print'] != "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
   }
   $nm_saida->saida("</HEAD>\r\n");
   $nm_saida->saida("  <body class=\"scGridPage\">\r\n");
   $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
   $nm_saida->saida("<table border=0 align=\"center\" valign=\"top\" ><tr><td style=\"padding: 0px\"><div class=\"scGridBorder\"><table width='100%' cellspacing=0 cellpadding=0><tr><td>\r\n");
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd\">\r\n");
   $nm_saida->saida("<style>\r\n");
   $nm_saida->saida("#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 \r\n");
   $nm_saida->saida("#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}\r\n");
   $nm_saida->saida("</style>\r\n");
   $nm_saida->saida("<div style=\"width: 100%\">\r\n");
   $nm_saida->saida(" <div class=\"scGridHeader\" style=\"height:11px; display: block; border-width:0px; \"></div>\r\n");
   $nm_saida->saida(" <div style=\"height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block\">\r\n");
   $nm_saida->saida(" 	<table style=\"width:100%; border-collapse:collapse; padding:0;\">\r\n");
   $nm_saida->saida("    	<tr>\r\n");
   $nm_saida->saida("        	<td id=\"lin1_col1\" class=\"scGridHeaderFont\"><span>" . $this->Ini->Nm_lang['lang_othr_detl_titl'] . " - </span></td>\r\n");
   $nm_saida->saida("            <td id=\"lin1_col2\" class=\"scGridHeaderFont\"><span></span></td>\r\n");
   $nm_saida->saida("        </tr>\r\n");
   $nm_saida->saida("    </table>		 \r\n");
   $nm_saida->saida(" </div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['notas']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['notas']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbar\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "notas/notas_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=S&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "notas/notas_config_print.php?nm_opc=detalhe&nm_cor=AM&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F3.submit()", "document.F3.submit()", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
       $nm_saida->saida("     </td>\r\n");
       $nm_saida->saida("    </tr></table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
   } 
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd\">\r\n");
   $nm_saida->saida("<TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px;\"  align=\"center\" valign=\"top\" width=\"100%\">\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_asignaturas_asignatura'])) ? $this->New_label['t_asignaturas_asignatura'] : "Asignatura"; 
          $conteudo = trim(sc_strip_script($this->t_asignaturas_asignatura)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_asignaturas_asignatura_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_asignaturas_asignatura_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_id_estudiante'])) ? $this->New_label['t_evaluacion_id_estudiante'] : "Id Estudiante"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_id_estudiante))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_id_estudiante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_id_estudiante_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_primer_apellido'])) ? $this->New_label['t_evaluacion_primer_apellido'] : "Primer Apellido"; 
          $conteudo = trim(sc_strip_script($this->t_evaluacion_primer_apellido)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_primer_apellido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_primer_apellido_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_segundo_apellido'])) ? $this->New_label['t_evaluacion_segundo_apellido'] : "Segundo Apellido"; 
          $conteudo = trim(sc_strip_script($this->t_evaluacion_segundo_apellido)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_segundo_apellido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_segundo_apellido_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_primer_nombre'])) ? $this->New_label['t_evaluacion_primer_nombre'] : "Primer Nombre"; 
          $conteudo = trim(sc_strip_script($this->t_evaluacion_primer_nombre)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_primer_nombre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_primer_nombre_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_segundo_nombre'])) ? $this->New_label['t_evaluacion_segundo_nombre'] : "Segundo Nombre"; 
          $conteudo = trim(sc_strip_script($this->t_evaluacion_segundo_nombre)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_segundo_nombre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_segundo_nombre_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_id_grupo'])) ? $this->New_label['t_evaluacion_id_grupo'] : "Id Grupo"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_id_grupo))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_id_grupo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_id_grupo_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_id_area'])) ? $this->New_label['t_evaluacion_id_area'] : "Id Area"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_id_area))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_id_area_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_id_area_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_id_grado'])) ? $this->New_label['t_evaluacion_id_grado'] : "Id Grado"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_id_grado))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_id_grado_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_id_grado_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_eval_1_per'])) ? $this->New_label['t_evaluacion_eval_1_per'] : "Eval 1 Per"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_eval_1_per))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_eval_1_per_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_eval_1_per_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc1'])) ? $this->New_label['t_evaluacion_dc1'] : "Dc 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_dc1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc2'])) ? $this->New_label['t_evaluacion_dc2'] : "Dc 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_dc2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc3'])) ? $this->New_label['t_evaluacion_dc3'] : "Dc 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_dc3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc4'])) ? $this->New_label['t_evaluacion_dc4'] : "Dc 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_dc4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc5'])) ? $this->New_label['t_evaluacion_dc5'] : "Dc 5"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc5))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc5_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_dc5_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc6'])) ? $this->New_label['t_evaluacion_dc6'] : "Dc 6"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc6))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc6_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_dc6_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc7'])) ? $this->New_label['t_evaluacion_dc7'] : "Dc 7"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc7))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc7_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_dc7_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc8'])) ? $this->New_label['t_evaluacion_dc8'] : "Dc 8"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc8))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc8_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_dc8_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc9'])) ? $this->New_label['t_evaluacion_dc9'] : "Dc 9"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc9))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc9_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_dc9_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc10'])) ? $this->New_label['t_evaluacion_dc10'] : "Dc 10"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc10))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc10_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_dc10_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc11'])) ? $this->New_label['t_evaluacion_dc11'] : "Dc 11"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc11))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc11_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_dc11_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dc12'])) ? $this->New_label['t_evaluacion_dc12'] : "Dc 12"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dc12))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dc12_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_dc12_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_pcent_dc'])) ? $this->New_label['t_evaluacion_pcent_dc'] : "Pcent Dc"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_pcent_dc))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_pcent_dc_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_pcent_dc_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_ds1'])) ? $this->New_label['t_evaluacion_ds1'] : "Ds 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_ds1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_ds1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_ds1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_ds2'])) ? $this->New_label['t_evaluacion_ds2'] : "Ds 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_ds2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_ds2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_ds2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_ds3'])) ? $this->New_label['t_evaluacion_ds3'] : "Ds 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_ds3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_ds3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_ds3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_ds4'])) ? $this->New_label['t_evaluacion_ds4'] : "Ds 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_ds4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_ds4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_ds4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_letras_p1'])) ? $this->New_label['t_evaluacion_letras_p1'] : "Letras P 1"; 
          $conteudo = trim(sc_strip_script($this->t_evaluacion_letras_p1)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_letras_p1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_letras_p1_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_ds5'])) ? $this->New_label['t_evaluacion_ds5'] : "Ds 5"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_ds5))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_ds5_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_ds5_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_pcent_ds'])) ? $this->New_label['t_evaluacion_pcent_ds'] : "Pcent Ds"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_pcent_ds))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_pcent_ds_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_pcent_ds_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dp1'])) ? $this->New_label['t_evaluacion_dp1'] : "Dp 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dp1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dp1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_dp1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dp2'])) ? $this->New_label['t_evaluacion_dp2'] : "Dp 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dp2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dp2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_dp2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dp3'])) ? $this->New_label['t_evaluacion_dp3'] : "Dp 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dp3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dp3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_dp3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dp4'])) ? $this->New_label['t_evaluacion_dp4'] : "Dp 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dp4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dp4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_dp4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_dp5'])) ? $this->New_label['t_evaluacion_dp5'] : "Dp 5"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_dp5))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_dp5_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_dp5_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_pcent_dp'])) ? $this->New_label['t_evaluacion_pcent_dp'] : "Pcent Dp"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_pcent_dp))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_pcent_dp_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_pcent_dp_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_aeep1'])) ? $this->New_label['t_evaluacion_aeep1'] : "Aeep 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_aeep1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_aeep1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_aeep1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_porcent_aeep1'])) ? $this->New_label['t_evaluacion_porcent_aeep1'] : "Porcent Aeep 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_porcent_aeep1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_porcent_aeep1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_t_evaluacion_porcent_aeep1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['t_evaluacion_inasistencia_p1'])) ? $this->New_label['t_evaluacion_inasistencia_p1'] : "Inasistencia P 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->t_evaluacion_inasistencia_p1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_t_evaluacion_inasistencia_p1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_t_evaluacion_inasistencia_p1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("</TABLE>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['notas']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['notas']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbar\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
       $nm_saida->saida("     </td>\r\n");
       $nm_saida->saida("    </tr></table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
   } 
   $rs->Close(); 
   $nm_saida->saida("  </td>\r\n");
   $nm_saida->saida(" </tr>\r\n");
   $nm_saida->saida(" </table>\r\n");
   $nm_saida->saida(" </div>\r\n");
   $nm_saida->saida("  </td>\r\n");
   $nm_saida->saida(" </tr>\r\n");
   $nm_saida->saida(" </table>\r\n");
   $nm_saida->saida("  </td>\r\n");
   $nm_saida->saida(" </tr>\r\n");
   $nm_saida->saida(" </table>\r\n");
   $nm_saida->saida(" </div>\r\n");
   $nm_saida->saida("  </td>\r\n");
   $nm_saida->saida(" </tr>\r\n");
   $nm_saida->saida(" </table>\r\n");
//--- 
//--- 
   $nm_saida->saida("<form name=\"F3\" method=post\r\n");
   $nm_saida->saida("                  target=\"_self\"\r\n");
   $nm_saida->saida("                  action=\"./\">\r\n");
   $nm_saida->saida("<input type=hidden name=\"nmgp_opcao\" value=\"igual\"/>\r\n");
   $nm_saida->saida("<input type=hidden name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/>\r\n");
   $nm_saida->saida("<input type=hidden name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
   $nm_saida->saida("</form>\r\n");
   $nm_saida->saida("<script language=JavaScript>\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2, campo3)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (\"notas_doc.php?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&nm_cod_doc=\" + campo1 + \"&nm_nome_doc=\" + campo2 + \"&nm_cod_apl=\" + campo3, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g) \r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      window.location = \"" . $this->Ini->path_link . "notas/index.php?nmgp_opcao=pdf_det&nmgp_tipo_pdf=\" + z + \"&nmgp_parms_pdf=\" + p +  \"&nmgp_graf_pdf=\" + g + \"&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "\";\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       window.open('" . $this->Ini->path_link . "notas/notas_iframe_prt.php?path_botoes=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&opcao=det_print&cor_print=' + cor,'','location=no,menubar,resizable,scrollbars,status=no,toolbar');\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("</script>\r\n");
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</html>\r\n");
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
}
