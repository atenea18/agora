<?php
//--- 
class grid_t_evaluacion_3_det
{
   var $Ini;
   var $Erro;
   var $Db;
   var $nm_data;
   var $NM_raiz_img; 
   var $nmgp_botoes; 
   var $nm_location;
   var $id_asignatura;
   var $eval_1_per;
   var $eval_2_per;
   var $eval_3_per;
   var $eval_4_per;
   var $id_estudiante;
   var $primer_apellido;
   var $segundo_apellido;
   var $primer_nombre;
   var $segundo_nombre;
   var $id_grupo;
   var $id_area;
   var $id_grado;
   var $id_nivel;
   var $ihs;
   var $pfa;
   var $tipo_asig;
   var $novedad;
   var $estatus;
   var $inasistencia_p1;
   var $dc1;
   var $dc2;
   var $dc3;
   var $dc4;
   var $dc5;
   var $dc6;
   var $dc7;
   var $dc8;
   var $dc9;
   var $dc10;
   var $dc11;
   var $dc12;
   var $letras_p1;
   var $pcent_dc;
   var $ds1;
   var $ds2;
   var $ds3;
   var $ds4;
   var $ds5;
   var $pcent_ds;
   var $dp1;
   var $dp2;
   var $dp3;
   var $dp4;
   var $dp5;
   var $pcent_dp;
   var $aeep1;
   var $porcent_aeep1;
   var $inasistencia_p2;
   var $dc1_2p;
   var $dc2_2p;
   var $dc3_2p;
   var $dc4_2p;
   var $dc5_2p;
   var $pcent_dc2;
   var $ds1_2p;
   var $ds2_2p;
   var $ds3_2p;
   var $ds4_2p;
   var $ds5_2p;
   var $pcent_ds2;
   var $dp1_2p;
   var $dp2_2p;
   var $dp3_2p;
   var $dp4_2p;
   var $dp5_2p;
   var $pcent_dp2;
   var $aee_p2;
   var $letras_p2;
   var $porcet_aee_p2;
   var $inasistencia_p3;
   var $dc1_3p;
   var $dc2_3p;
   var $dc3_3p;
   var $dc4_3p;
   var $dc5_3p;
   var $pcent_dc3;
   var $ds1_p3;
   var $ds2_p3;
   var $ds3_p3;
   var $ds4_p3;
   var $ds5_p3;
   var $pcent_ds3;
   var $dp1_p3;
   var $dp2_p3;
   var $dp3_p3;
   var $dp4_p3;
   var $sc_field_0;
   var $pcent_dp3;
   var $aee_p3;
   var $letras_p3;
   var $porcent_aee_p3;
   var $inasistencia_p4;
   var $dc1_p4;
   var $dc2_p4;
   var $dc3_p4;
   var $dc4_p4;
   var $dc5_p4;
   var $pcent_dc4;
   var $ds1_p4;
   var $ds2_p4;
   var $ds3_p4;
   var $ds4_p4;
   var $ds5_p4;
   var $pcent_ds4;
   var $dp1_p4;
   var $dp2_p4;
   var $dp3_p4;
   var $dp4_p4;
   var $dp5_p4;
   var $aee_p4;
   var $letras_p4;
   var $porcent_aee_p4;
   var $pcent_dp4;
   var $eval_final;
   var $entorno;
 function monta_det()
 {
    global 
           $nm_saida, $nm_lang, $nmgp_cor_print, $nmgp_tipo_pdf;
    $this->nmgp_botoes['det_pdf'] = "on";
    $this->nmgp_botoes['det_print'] = "on";
    $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
    if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_3']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_3']['btn_display']))
    {
        foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_3']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
        {
            $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
        }
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['campos_busca']))
    { 
        $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['campos_busca'];
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
    $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['where_orig'];
    $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['where_pesq'];
    $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['where_pesq_filtro'];
    $this->nm_field_dinamico = array();
    $this->nm_order_dinamico = array();
    $this->nm_data = new nm_data("es_es");
    $this->NM_raiz_img  = ""; 
    $this->sc_proc_grid = false; 
    include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['seq_dir'] = 0; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['sub_dir'] = array(); 
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
       $nmgp_select = "SELECT id_estudiante, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, id_grupo, id_area, id_asignatura, id_grado, id_nivel, ihs, pfa, tipo_asig, novedad, estatus, inasistencia_p1, eval_1_per, dc1, dc2, dc3, dc4, dc5, dc6, dc7, dc8, dc9, dc10, dc11, dc12, letras_p1, pcent_dc, ds1, ds2, ds3, ds4, ds5, pcent_ds, dp1, dp2, dp3, dp4, dp5, pcent_dp, aeep1, porcent_aeep1, inasistencia_p2, eval_2_per, dc1_2p, dc2_2p, dc3_2p, dc4_2p, dc5_2p, pcent_dc2, ds1_2p, ds2_2p, ds3_2p, ds4_2p, ds5_2p, pcent_ds2, dp1_2p, dp2_2p, dp3_2p, dp4_2p, dp5_2p, pcent_dp2, aee_p2, letras_p2, porcet_aee_p2, inasistencia_p3, eval_3_per, dc1_3p, dc2_3p, dc3_3p, dc4_3p, dc5_3p, pcent_dc3, ds1_p3, ds2_p3, ds3_p3, ds4_p3, ds5_p3, pcent_ds3, dp1_p3, dp2_p3, dp3_p3, dp4_p3, `dp5-p3` as sc_field_0, pcent_dp3, aee_p3, letras_p3, porcent_aee_p3, inasistencia_p4, eval_4_per, dc1_p4, dc2_p4, dc3_p4, dc4_p4, dc5_p4, pcent_dc4, ds1_p4, ds2_p4, ds3_p4, ds4_p4, ds5_p4, pcent_ds4, dp1_p4, dp2_p4, dp3_p4, dp4_p4, dp5_p4, aee_p4, letras_p4, porcent_aee_p4, pcent_dp4, eval_final, entorno from " . $this->Ini->nm_tabela; 
   $parms_det = explode("*PDet*", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['chave_det']) ; 
   foreach ($parms_det as $key => $cada_par)
   {
       $parms_det[$key] = $this->Db->qstr($parms_det[$key]);
       $parms_det[$key] = substr($parms_det[$key], 1, strlen($parms_det[$key]) - 2);
   } 
   $nmgp_select .= " where  id_asignatura = $parms_det[0] and id_estudiante = $parms_det[1] and id_grupo = $parms_det[2]" ;  
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $rs = $this->Db->Execute($nmgp_select) ; 
   if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   $this->id_estudiante = $rs->fields[0] ;  
   $this->id_estudiante = (string)$this->id_estudiante;
   $this->primer_apellido = $rs->fields[1] ;  
   $this->segundo_apellido = $rs->fields[2] ;  
   $this->primer_nombre = $rs->fields[3] ;  
   $this->segundo_nombre = $rs->fields[4] ;  
   $this->id_grupo = $rs->fields[5] ;  
   $this->id_grupo = (string)$this->id_grupo;
   $this->id_area = $rs->fields[6] ;  
   $this->id_area = (string)$this->id_area;
   $this->id_asignatura = $rs->fields[7] ;  
   $this->id_asignatura = (string)$this->id_asignatura;
   $this->id_grado = $rs->fields[8] ;  
   $this->id_grado = (string)$this->id_grado;
   $this->id_nivel = $rs->fields[9] ;  
   $this->id_nivel = (string)$this->id_nivel;
   $this->ihs = $rs->fields[10] ;  
   $this->ihs = (string)$this->ihs;
   $this->pfa = $rs->fields[11] ;  
   $this->pfa = (string)$this->pfa;
   $this->tipo_asig = $rs->fields[12] ;  
   $this->novedad = $rs->fields[13] ;  
   $this->estatus = $rs->fields[14] ;  
   $this->inasistencia_p1 = $rs->fields[15] ;  
   $this->inasistencia_p1 = (string)$this->inasistencia_p1;
   $this->eval_1_per = $rs->fields[16] ;  
   $this->eval_1_per = (strpos(strtolower($this->eval_1_per), "e")) ? (float)$this->eval_1_per : $this->eval_1_per; 
   $this->eval_1_per = (string)$this->eval_1_per;
   $this->dc1 = $rs->fields[17] ;  
   $this->dc1 = (strpos(strtolower($this->dc1), "e")) ? (float)$this->dc1 : $this->dc1; 
   $this->dc1 = (string)$this->dc1;
   $this->dc2 = $rs->fields[18] ;  
   $this->dc2 = (strpos(strtolower($this->dc2), "e")) ? (float)$this->dc2 : $this->dc2; 
   $this->dc2 = (string)$this->dc2;
   $this->dc3 = $rs->fields[19] ;  
   $this->dc3 = (strpos(strtolower($this->dc3), "e")) ? (float)$this->dc3 : $this->dc3; 
   $this->dc3 = (string)$this->dc3;
   $this->dc4 = $rs->fields[20] ;  
   $this->dc4 = (strpos(strtolower($this->dc4), "e")) ? (float)$this->dc4 : $this->dc4; 
   $this->dc4 = (string)$this->dc4;
   $this->dc5 = $rs->fields[21] ;  
   $this->dc5 = (strpos(strtolower($this->dc5), "e")) ? (float)$this->dc5 : $this->dc5; 
   $this->dc5 = (string)$this->dc5;
   $this->dc6 = $rs->fields[22] ;  
   $this->dc6 = (strpos(strtolower($this->dc6), "e")) ? (float)$this->dc6 : $this->dc6; 
   $this->dc6 = (string)$this->dc6;
   $this->dc7 = $rs->fields[23] ;  
   $this->dc7 = (strpos(strtolower($this->dc7), "e")) ? (float)$this->dc7 : $this->dc7; 
   $this->dc7 = (string)$this->dc7;
   $this->dc8 = $rs->fields[24] ;  
   $this->dc8 = (strpos(strtolower($this->dc8), "e")) ? (float)$this->dc8 : $this->dc8; 
   $this->dc8 = (string)$this->dc8;
   $this->dc9 = $rs->fields[25] ;  
   $this->dc9 = (strpos(strtolower($this->dc9), "e")) ? (float)$this->dc9 : $this->dc9; 
   $this->dc9 = (string)$this->dc9;
   $this->dc10 = $rs->fields[26] ;  
   $this->dc10 = (strpos(strtolower($this->dc10), "e")) ? (float)$this->dc10 : $this->dc10; 
   $this->dc10 = (string)$this->dc10;
   $this->dc11 = $rs->fields[27] ;  
   $this->dc11 = (strpos(strtolower($this->dc11), "e")) ? (float)$this->dc11 : $this->dc11; 
   $this->dc11 = (string)$this->dc11;
   $this->dc12 = $rs->fields[28] ;  
   $this->dc12 = (strpos(strtolower($this->dc12), "e")) ? (float)$this->dc12 : $this->dc12; 
   $this->dc12 = (string)$this->dc12;
   $this->letras_p1 = $rs->fields[29] ;  
   $this->pcent_dc = $rs->fields[30] ;  
   $this->pcent_dc = (strpos(strtolower($this->pcent_dc), "e")) ? (float)$this->pcent_dc : $this->pcent_dc; 
   $this->pcent_dc = (string)$this->pcent_dc;
   $this->ds1 = $rs->fields[31] ;  
   $this->ds1 = (strpos(strtolower($this->ds1), "e")) ? (float)$this->ds1 : $this->ds1; 
   $this->ds1 = (string)$this->ds1;
   $this->ds2 = $rs->fields[32] ;  
   $this->ds2 = (strpos(strtolower($this->ds2), "e")) ? (float)$this->ds2 : $this->ds2; 
   $this->ds2 = (string)$this->ds2;
   $this->ds3 = $rs->fields[33] ;  
   $this->ds3 = (strpos(strtolower($this->ds3), "e")) ? (float)$this->ds3 : $this->ds3; 
   $this->ds3 = (string)$this->ds3;
   $this->ds4 = $rs->fields[34] ;  
   $this->ds4 = (strpos(strtolower($this->ds4), "e")) ? (float)$this->ds4 : $this->ds4; 
   $this->ds4 = (string)$this->ds4;
   $this->ds5 = $rs->fields[35] ;  
   $this->ds5 = (strpos(strtolower($this->ds5), "e")) ? (float)$this->ds5 : $this->ds5; 
   $this->ds5 = (string)$this->ds5;
   $this->pcent_ds = $rs->fields[36] ;  
   $this->pcent_ds = (strpos(strtolower($this->pcent_ds), "e")) ? (float)$this->pcent_ds : $this->pcent_ds; 
   $this->pcent_ds = (string)$this->pcent_ds;
   $this->dp1 = $rs->fields[37] ;  
   $this->dp1 = (strpos(strtolower($this->dp1), "e")) ? (float)$this->dp1 : $this->dp1; 
   $this->dp1 = (string)$this->dp1;
   $this->dp2 = $rs->fields[38] ;  
   $this->dp2 = (strpos(strtolower($this->dp2), "e")) ? (float)$this->dp2 : $this->dp2; 
   $this->dp2 = (string)$this->dp2;
   $this->dp3 = $rs->fields[39] ;  
   $this->dp3 = (strpos(strtolower($this->dp3), "e")) ? (float)$this->dp3 : $this->dp3; 
   $this->dp3 = (string)$this->dp3;
   $this->dp4 = $rs->fields[40] ;  
   $this->dp4 = (strpos(strtolower($this->dp4), "e")) ? (float)$this->dp4 : $this->dp4; 
   $this->dp4 = (string)$this->dp4;
   $this->dp5 = $rs->fields[41] ;  
   $this->dp5 = (strpos(strtolower($this->dp5), "e")) ? (float)$this->dp5 : $this->dp5; 
   $this->dp5 = (string)$this->dp5;
   $this->pcent_dp = $rs->fields[42] ;  
   $this->pcent_dp = (strpos(strtolower($this->pcent_dp), "e")) ? (float)$this->pcent_dp : $this->pcent_dp; 
   $this->pcent_dp = (string)$this->pcent_dp;
   $this->aeep1 = $rs->fields[43] ;  
   $this->aeep1 = (strpos(strtolower($this->aeep1), "e")) ? (float)$this->aeep1 : $this->aeep1; 
   $this->aeep1 = (string)$this->aeep1;
   $this->porcent_aeep1 = $rs->fields[44] ;  
   $this->porcent_aeep1 = (strpos(strtolower($this->porcent_aeep1), "e")) ? (float)$this->porcent_aeep1 : $this->porcent_aeep1; 
   $this->porcent_aeep1 = (string)$this->porcent_aeep1;
   $this->inasistencia_p2 = $rs->fields[45] ;  
   $this->inasistencia_p2 = (string)$this->inasistencia_p2;
   $this->eval_2_per = $rs->fields[46] ;  
   $this->eval_2_per = (strpos(strtolower($this->eval_2_per), "e")) ? (float)$this->eval_2_per : $this->eval_2_per; 
   $this->eval_2_per = (string)$this->eval_2_per;
   $this->dc1_2p = $rs->fields[47] ;  
   $this->dc1_2p = (strpos(strtolower($this->dc1_2p), "e")) ? (float)$this->dc1_2p : $this->dc1_2p; 
   $this->dc1_2p = (string)$this->dc1_2p;
   $this->dc2_2p = $rs->fields[48] ;  
   $this->dc2_2p = (strpos(strtolower($this->dc2_2p), "e")) ? (float)$this->dc2_2p : $this->dc2_2p; 
   $this->dc2_2p = (string)$this->dc2_2p;
   $this->dc3_2p = $rs->fields[49] ;  
   $this->dc3_2p = (strpos(strtolower($this->dc3_2p), "e")) ? (float)$this->dc3_2p : $this->dc3_2p; 
   $this->dc3_2p = (string)$this->dc3_2p;
   $this->dc4_2p = $rs->fields[50] ;  
   $this->dc4_2p = (strpos(strtolower($this->dc4_2p), "e")) ? (float)$this->dc4_2p : $this->dc4_2p; 
   $this->dc4_2p = (string)$this->dc4_2p;
   $this->dc5_2p = $rs->fields[51] ;  
   $this->dc5_2p = (strpos(strtolower($this->dc5_2p), "e")) ? (float)$this->dc5_2p : $this->dc5_2p; 
   $this->dc5_2p = (string)$this->dc5_2p;
   $this->pcent_dc2 = $rs->fields[52] ;  
   $this->pcent_dc2 = (strpos(strtolower($this->pcent_dc2), "e")) ? (float)$this->pcent_dc2 : $this->pcent_dc2; 
   $this->pcent_dc2 = (string)$this->pcent_dc2;
   $this->ds1_2p = $rs->fields[53] ;  
   $this->ds1_2p = (strpos(strtolower($this->ds1_2p), "e")) ? (float)$this->ds1_2p : $this->ds1_2p; 
   $this->ds1_2p = (string)$this->ds1_2p;
   $this->ds2_2p = $rs->fields[54] ;  
   $this->ds2_2p = (strpos(strtolower($this->ds2_2p), "e")) ? (float)$this->ds2_2p : $this->ds2_2p; 
   $this->ds2_2p = (string)$this->ds2_2p;
   $this->ds3_2p = $rs->fields[55] ;  
   $this->ds3_2p = (strpos(strtolower($this->ds3_2p), "e")) ? (float)$this->ds3_2p : $this->ds3_2p; 
   $this->ds3_2p = (string)$this->ds3_2p;
   $this->ds4_2p = $rs->fields[56] ;  
   $this->ds4_2p = (strpos(strtolower($this->ds4_2p), "e")) ? (float)$this->ds4_2p : $this->ds4_2p; 
   $this->ds4_2p = (string)$this->ds4_2p;
   $this->ds5_2p = $rs->fields[57] ;  
   $this->ds5_2p = (strpos(strtolower($this->ds5_2p), "e")) ? (float)$this->ds5_2p : $this->ds5_2p; 
   $this->ds5_2p = (string)$this->ds5_2p;
   $this->pcent_ds2 = $rs->fields[58] ;  
   $this->pcent_ds2 = (strpos(strtolower($this->pcent_ds2), "e")) ? (float)$this->pcent_ds2 : $this->pcent_ds2; 
   $this->pcent_ds2 = (string)$this->pcent_ds2;
   $this->dp1_2p = $rs->fields[59] ;  
   $this->dp1_2p = (strpos(strtolower($this->dp1_2p), "e")) ? (float)$this->dp1_2p : $this->dp1_2p; 
   $this->dp1_2p = (string)$this->dp1_2p;
   $this->dp2_2p = $rs->fields[60] ;  
   $this->dp2_2p = (strpos(strtolower($this->dp2_2p), "e")) ? (float)$this->dp2_2p : $this->dp2_2p; 
   $this->dp2_2p = (string)$this->dp2_2p;
   $this->dp3_2p = $rs->fields[61] ;  
   $this->dp3_2p = (strpos(strtolower($this->dp3_2p), "e")) ? (float)$this->dp3_2p : $this->dp3_2p; 
   $this->dp3_2p = (string)$this->dp3_2p;
   $this->dp4_2p = $rs->fields[62] ;  
   $this->dp4_2p = (strpos(strtolower($this->dp4_2p), "e")) ? (float)$this->dp4_2p : $this->dp4_2p; 
   $this->dp4_2p = (string)$this->dp4_2p;
   $this->dp5_2p = $rs->fields[63] ;  
   $this->dp5_2p = (strpos(strtolower($this->dp5_2p), "e")) ? (float)$this->dp5_2p : $this->dp5_2p; 
   $this->dp5_2p = (string)$this->dp5_2p;
   $this->pcent_dp2 = $rs->fields[64] ;  
   $this->pcent_dp2 = (strpos(strtolower($this->pcent_dp2), "e")) ? (float)$this->pcent_dp2 : $this->pcent_dp2; 
   $this->pcent_dp2 = (string)$this->pcent_dp2;
   $this->aee_p2 = $rs->fields[65] ;  
   $this->aee_p2 = (strpos(strtolower($this->aee_p2), "e")) ? (float)$this->aee_p2 : $this->aee_p2; 
   $this->aee_p2 = (string)$this->aee_p2;
   $this->letras_p2 = $rs->fields[66] ;  
   $this->porcet_aee_p2 = $rs->fields[67] ;  
   $this->porcet_aee_p2 = (strpos(strtolower($this->porcet_aee_p2), "e")) ? (float)$this->porcet_aee_p2 : $this->porcet_aee_p2; 
   $this->porcet_aee_p2 = (string)$this->porcet_aee_p2;
   $this->inasistencia_p3 = $rs->fields[68] ;  
   $this->inasistencia_p3 = (string)$this->inasistencia_p3;
   $this->eval_3_per = $rs->fields[69] ;  
   $this->eval_3_per = (strpos(strtolower($this->eval_3_per), "e")) ? (float)$this->eval_3_per : $this->eval_3_per; 
   $this->eval_3_per = (string)$this->eval_3_per;
   $this->dc1_3p = $rs->fields[70] ;  
   $this->dc1_3p = (strpos(strtolower($this->dc1_3p), "e")) ? (float)$this->dc1_3p : $this->dc1_3p; 
   $this->dc1_3p = (string)$this->dc1_3p;
   $this->dc2_3p = $rs->fields[71] ;  
   $this->dc2_3p = (strpos(strtolower($this->dc2_3p), "e")) ? (float)$this->dc2_3p : $this->dc2_3p; 
   $this->dc2_3p = (string)$this->dc2_3p;
   $this->dc3_3p = $rs->fields[72] ;  
   $this->dc3_3p = (strpos(strtolower($this->dc3_3p), "e")) ? (float)$this->dc3_3p : $this->dc3_3p; 
   $this->dc3_3p = (string)$this->dc3_3p;
   $this->dc4_3p = $rs->fields[73] ;  
   $this->dc4_3p = (strpos(strtolower($this->dc4_3p), "e")) ? (float)$this->dc4_3p : $this->dc4_3p; 
   $this->dc4_3p = (string)$this->dc4_3p;
   $this->dc5_3p = $rs->fields[74] ;  
   $this->dc5_3p = (strpos(strtolower($this->dc5_3p), "e")) ? (float)$this->dc5_3p : $this->dc5_3p; 
   $this->dc5_3p = (string)$this->dc5_3p;
   $this->pcent_dc3 = $rs->fields[75] ;  
   $this->pcent_dc3 = (strpos(strtolower($this->pcent_dc3), "e")) ? (float)$this->pcent_dc3 : $this->pcent_dc3; 
   $this->pcent_dc3 = (string)$this->pcent_dc3;
   $this->ds1_p3 = $rs->fields[76] ;  
   $this->ds1_p3 = (strpos(strtolower($this->ds1_p3), "e")) ? (float)$this->ds1_p3 : $this->ds1_p3; 
   $this->ds1_p3 = (string)$this->ds1_p3;
   $this->ds2_p3 = $rs->fields[77] ;  
   $this->ds2_p3 = (strpos(strtolower($this->ds2_p3), "e")) ? (float)$this->ds2_p3 : $this->ds2_p3; 
   $this->ds2_p3 = (string)$this->ds2_p3;
   $this->ds3_p3 = $rs->fields[78] ;  
   $this->ds3_p3 = (strpos(strtolower($this->ds3_p3), "e")) ? (float)$this->ds3_p3 : $this->ds3_p3; 
   $this->ds3_p3 = (string)$this->ds3_p3;
   $this->ds4_p3 = $rs->fields[79] ;  
   $this->ds4_p3 = (strpos(strtolower($this->ds4_p3), "e")) ? (float)$this->ds4_p3 : $this->ds4_p3; 
   $this->ds4_p3 = (string)$this->ds4_p3;
   $this->ds5_p3 = $rs->fields[80] ;  
   $this->ds5_p3 = (strpos(strtolower($this->ds5_p3), "e")) ? (float)$this->ds5_p3 : $this->ds5_p3; 
   $this->ds5_p3 = (string)$this->ds5_p3;
   $this->pcent_ds3 = $rs->fields[81] ;  
   $this->pcent_ds3 = (strpos(strtolower($this->pcent_ds3), "e")) ? (float)$this->pcent_ds3 : $this->pcent_ds3; 
   $this->pcent_ds3 = (string)$this->pcent_ds3;
   $this->dp1_p3 = $rs->fields[82] ;  
   $this->dp1_p3 = (strpos(strtolower($this->dp1_p3), "e")) ? (float)$this->dp1_p3 : $this->dp1_p3; 
   $this->dp1_p3 = (string)$this->dp1_p3;
   $this->dp2_p3 = $rs->fields[83] ;  
   $this->dp2_p3 = (strpos(strtolower($this->dp2_p3), "e")) ? (float)$this->dp2_p3 : $this->dp2_p3; 
   $this->dp2_p3 = (string)$this->dp2_p3;
   $this->dp3_p3 = $rs->fields[84] ;  
   $this->dp3_p3 = (strpos(strtolower($this->dp3_p3), "e")) ? (float)$this->dp3_p3 : $this->dp3_p3; 
   $this->dp3_p3 = (string)$this->dp3_p3;
   $this->dp4_p3 = $rs->fields[85] ;  
   $this->dp4_p3 = (strpos(strtolower($this->dp4_p3), "e")) ? (float)$this->dp4_p3 : $this->dp4_p3; 
   $this->dp4_p3 = (string)$this->dp4_p3;
   $this->sc_field_0 = $rs->fields[86] ;  
   $this->sc_field_0 = (strpos(strtolower($this->sc_field_0), "e")) ? (float)$this->sc_field_0 : $this->sc_field_0; 
   $this->sc_field_0 = (string)$this->sc_field_0;
   $this->pcent_dp3 = $rs->fields[87] ;  
   $this->pcent_dp3 = (strpos(strtolower($this->pcent_dp3), "e")) ? (float)$this->pcent_dp3 : $this->pcent_dp3; 
   $this->pcent_dp3 = (string)$this->pcent_dp3;
   $this->aee_p3 = $rs->fields[88] ;  
   $this->aee_p3 = (strpos(strtolower($this->aee_p3), "e")) ? (float)$this->aee_p3 : $this->aee_p3; 
   $this->aee_p3 = (string)$this->aee_p3;
   $this->letras_p3 = $rs->fields[89] ;  
   $this->porcent_aee_p3 = $rs->fields[90] ;  
   $this->porcent_aee_p3 = (strpos(strtolower($this->porcent_aee_p3), "e")) ? (float)$this->porcent_aee_p3 : $this->porcent_aee_p3; 
   $this->porcent_aee_p3 = (string)$this->porcent_aee_p3;
   $this->inasistencia_p4 = $rs->fields[91] ;  
   $this->inasistencia_p4 = (string)$this->inasistencia_p4;
   $this->eval_4_per = $rs->fields[92] ;  
   $this->eval_4_per = (strpos(strtolower($this->eval_4_per), "e")) ? (float)$this->eval_4_per : $this->eval_4_per; 
   $this->eval_4_per = (string)$this->eval_4_per;
   $this->dc1_p4 = $rs->fields[93] ;  
   $this->dc1_p4 = (strpos(strtolower($this->dc1_p4), "e")) ? (float)$this->dc1_p4 : $this->dc1_p4; 
   $this->dc1_p4 = (string)$this->dc1_p4;
   $this->dc2_p4 = $rs->fields[94] ;  
   $this->dc2_p4 = (strpos(strtolower($this->dc2_p4), "e")) ? (float)$this->dc2_p4 : $this->dc2_p4; 
   $this->dc2_p4 = (string)$this->dc2_p4;
   $this->dc3_p4 = $rs->fields[95] ;  
   $this->dc3_p4 = (strpos(strtolower($this->dc3_p4), "e")) ? (float)$this->dc3_p4 : $this->dc3_p4; 
   $this->dc3_p4 = (string)$this->dc3_p4;
   $this->dc4_p4 = $rs->fields[96] ;  
   $this->dc4_p4 = (strpos(strtolower($this->dc4_p4), "e")) ? (float)$this->dc4_p4 : $this->dc4_p4; 
   $this->dc4_p4 = (string)$this->dc4_p4;
   $this->dc5_p4 = $rs->fields[97] ;  
   $this->dc5_p4 = (strpos(strtolower($this->dc5_p4), "e")) ? (float)$this->dc5_p4 : $this->dc5_p4; 
   $this->dc5_p4 = (string)$this->dc5_p4;
   $this->pcent_dc4 = $rs->fields[98] ;  
   $this->pcent_dc4 = (strpos(strtolower($this->pcent_dc4), "e")) ? (float)$this->pcent_dc4 : $this->pcent_dc4; 
   $this->pcent_dc4 = (string)$this->pcent_dc4;
   $this->ds1_p4 = $rs->fields[99] ;  
   $this->ds1_p4 = (strpos(strtolower($this->ds1_p4), "e")) ? (float)$this->ds1_p4 : $this->ds1_p4; 
   $this->ds1_p4 = (string)$this->ds1_p4;
   $this->ds2_p4 = $rs->fields[100] ;  
   $this->ds2_p4 = (strpos(strtolower($this->ds2_p4), "e")) ? (float)$this->ds2_p4 : $this->ds2_p4; 
   $this->ds2_p4 = (string)$this->ds2_p4;
   $this->ds3_p4 = $rs->fields[101] ;  
   $this->ds3_p4 = (strpos(strtolower($this->ds3_p4), "e")) ? (float)$this->ds3_p4 : $this->ds3_p4; 
   $this->ds3_p4 = (string)$this->ds3_p4;
   $this->ds4_p4 = $rs->fields[102] ;  
   $this->ds4_p4 = (strpos(strtolower($this->ds4_p4), "e")) ? (float)$this->ds4_p4 : $this->ds4_p4; 
   $this->ds4_p4 = (string)$this->ds4_p4;
   $this->ds5_p4 = $rs->fields[103] ;  
   $this->ds5_p4 = (strpos(strtolower($this->ds5_p4), "e")) ? (float)$this->ds5_p4 : $this->ds5_p4; 
   $this->ds5_p4 = (string)$this->ds5_p4;
   $this->pcent_ds4 = $rs->fields[104] ;  
   $this->pcent_ds4 = (strpos(strtolower($this->pcent_ds4), "e")) ? (float)$this->pcent_ds4 : $this->pcent_ds4; 
   $this->pcent_ds4 = (string)$this->pcent_ds4;
   $this->dp1_p4 = $rs->fields[105] ;  
   $this->dp1_p4 = (strpos(strtolower($this->dp1_p4), "e")) ? (float)$this->dp1_p4 : $this->dp1_p4; 
   $this->dp1_p4 = (string)$this->dp1_p4;
   $this->dp2_p4 = $rs->fields[106] ;  
   $this->dp2_p4 = (strpos(strtolower($this->dp2_p4), "e")) ? (float)$this->dp2_p4 : $this->dp2_p4; 
   $this->dp2_p4 = (string)$this->dp2_p4;
   $this->dp3_p4 = $rs->fields[107] ;  
   $this->dp3_p4 = (strpos(strtolower($this->dp3_p4), "e")) ? (float)$this->dp3_p4 : $this->dp3_p4; 
   $this->dp3_p4 = (string)$this->dp3_p4;
   $this->dp4_p4 = $rs->fields[108] ;  
   $this->dp4_p4 = (strpos(strtolower($this->dp4_p4), "e")) ? (float)$this->dp4_p4 : $this->dp4_p4; 
   $this->dp4_p4 = (string)$this->dp4_p4;
   $this->dp5_p4 = $rs->fields[109] ;  
   $this->dp5_p4 = (strpos(strtolower($this->dp5_p4), "e")) ? (float)$this->dp5_p4 : $this->dp5_p4; 
   $this->dp5_p4 = (string)$this->dp5_p4;
   $this->aee_p4 = $rs->fields[110] ;  
   $this->aee_p4 = (strpos(strtolower($this->aee_p4), "e")) ? (float)$this->aee_p4 : $this->aee_p4; 
   $this->aee_p4 = (string)$this->aee_p4;
   $this->letras_p4 = $rs->fields[111] ;  
   $this->porcent_aee_p4 = $rs->fields[112] ;  
   $this->porcent_aee_p4 = (strpos(strtolower($this->porcent_aee_p4), "e")) ? (float)$this->porcent_aee_p4 : $this->porcent_aee_p4; 
   $this->porcent_aee_p4 = (string)$this->porcent_aee_p4;
   $this->pcent_dp4 = $rs->fields[113] ;  
   $this->pcent_dp4 = (strpos(strtolower($this->pcent_dp4), "e")) ? (float)$this->pcent_dp4 : $this->pcent_dp4; 
   $this->pcent_dp4 = (string)$this->pcent_dp4;
   $this->eval_final = $rs->fields[114] ;  
   $this->eval_final = (strpos(strtolower($this->eval_final), "e")) ? (float)$this->eval_final : $this->eval_final; 
   $this->eval_final = (string)$this->eval_final;
   $this->entorno = $rs->fields[115] ;  
   $this->entorno = (string)$this->entorno;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['cmp_acum']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['cmp_acum']))
   {
       $parms_acum = explode(";", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['cmp_acum']);
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
   $nm_saida->saida("   <TITLE>" . $this->Ini->Nm_lang['lang_othr_detl_titl'] . " - t_evaluacion</TITLE>\r\n");
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
   if (($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['det_print'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
   }
   else
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
   }
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_t_evaluacion_3/grid_t_evaluacion_3_det_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['pdf_det'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['det_print'] != "print")
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
   $nm_saida->saida("        	<td id=\"lin1_col1\" class=\"scGridHeaderFont\"><span>" . $this->Ini->Nm_lang['lang_othr_detl_titl'] . " - t_evaluacion</span></td>\r\n");
   $nm_saida->saida("            <td id=\"lin1_col2\" class=\"scGridHeaderFont\"><span></span></td>\r\n");
   $nm_saida->saida("        </tr>\r\n");
   $nm_saida->saida("    </table>		 \r\n");
   $nm_saida->saida(" </div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbar\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_t_evaluacion_3/grid_t_evaluacion_3_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=es&conf_socor=S&KeepThis=false&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_t_evaluacion_3/grid_t_evaluacion_3_config_print.php?nm_opc=detalhe&nm_cor=AM&language=es&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "");
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
          $SC_Label = (isset($this->New_label['id_estudiante'])) ? $this->New_label['id_estudiante'] : "Id Estudiante"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->id_estudiante))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_estudiante_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_estudiante_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['primer_apellido'])) ? $this->New_label['primer_apellido'] : "Primer Apellido"; 
          $conteudo = trim(sc_strip_script($this->primer_apellido)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_primer_apellido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_primer_apellido_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['segundo_apellido'])) ? $this->New_label['segundo_apellido'] : "Segundo Apellido"; 
          $conteudo = trim(sc_strip_script($this->segundo_apellido)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_segundo_apellido_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_segundo_apellido_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['primer_nombre'])) ? $this->New_label['primer_nombre'] : "Primer Nombre"; 
          $conteudo = trim(sc_strip_script($this->primer_nombre)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_primer_nombre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_primer_nombre_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['segundo_nombre'])) ? $this->New_label['segundo_nombre'] : "Segundo Nombre"; 
          $conteudo = trim(sc_strip_script($this->segundo_nombre)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_segundo_nombre_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_segundo_nombre_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['id_grupo'])) ? $this->New_label['id_grupo'] : "Id Grupo"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->id_grupo))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_grupo_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_grupo_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['id_area'])) ? $this->New_label['id_area'] : "Id Area"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->id_area))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $this->Lookup->lookup_id_area($conteudo , $this->id_area) ; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_area_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_area_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['id_asignatura'])) ? $this->New_label['id_asignatura'] : "Asignatura"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->id_asignatura))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          $this->Lookup->lookup_id_asignatura($conteudo , $this->id_asignatura) ; 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_asignatura_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_asignatura_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['id_grado'])) ? $this->New_label['id_grado'] : "Id Grado"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->id_grado))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_grado_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_id_grado_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['id_nivel'])) ? $this->New_label['id_nivel'] : "Id Nivel"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->id_nivel))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_id_nivel_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_id_nivel_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ihs'])) ? $this->New_label['ihs'] : "Ihs"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ihs))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ihs_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ihs_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pfa'])) ? $this->New_label['pfa'] : "Pfa"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pfa))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pfa_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_pfa_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['tipo_asig'])) ? $this->New_label['tipo_asig'] : "Tipo Asig"; 
          $conteudo = trim(sc_strip_script($this->tipo_asig)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_tipo_asig_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_tipo_asig_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['novedad'])) ? $this->New_label['novedad'] : "Novedad"; 
          $conteudo = trim(sc_strip_script($this->novedad)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_novedad_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_novedad_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['estatus'])) ? $this->New_label['estatus'] : "Estatus"; 
          $conteudo = trim(sc_strip_script($this->estatus)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_estatus_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_estatus_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['inasistencia_p1'])) ? $this->New_label['inasistencia_p1'] : "Inasistencia P 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->inasistencia_p1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_inasistencia_p1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_inasistencia_p1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['eval_1_per'])) ? $this->New_label['eval_1_per'] : "VAL"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->eval_1_per))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "1", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_eval_1_per_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_eval_1_per_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc1'])) ? $this->New_label['dc1'] : "Dc 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc2'])) ? $this->New_label['dc2'] : "Dc 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc3'])) ? $this->New_label['dc3'] : "Dc 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc4'])) ? $this->New_label['dc4'] : "Dc 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc5'])) ? $this->New_label['dc5'] : "Dc 5"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc5))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc5_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc5_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc6'])) ? $this->New_label['dc6'] : "Dc 6"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc6))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc6_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc6_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc7'])) ? $this->New_label['dc7'] : "Dc 7"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc7))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc7_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc7_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc8'])) ? $this->New_label['dc8'] : "Dc 8"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc8))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc8_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc8_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc9'])) ? $this->New_label['dc9'] : "Dc 9"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc9))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc9_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc9_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc10'])) ? $this->New_label['dc10'] : "Dc 10"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc10))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc10_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc10_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc11'])) ? $this->New_label['dc11'] : "Dc 11"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc11))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc11_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc11_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc12'])) ? $this->New_label['dc12'] : "Dc 12"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc12))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc12_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc12_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['letras_p1'])) ? $this->New_label['letras_p1'] : "Letras P 1"; 
          $conteudo = trim(sc_strip_script($this->letras_p1)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_letras_p1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_letras_p1_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_dc'])) ? $this->New_label['pcent_dc'] : "Pcent Dc"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_dc))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_dc_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pcent_dc_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds1'])) ? $this->New_label['ds1'] : "Ds 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds2'])) ? $this->New_label['ds2'] : "Ds 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ds2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds3'])) ? $this->New_label['ds3'] : "Ds 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds4'])) ? $this->New_label['ds4'] : "Ds 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ds4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds5'])) ? $this->New_label['ds5'] : "Ds 5"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds5))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds5_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds5_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_ds'])) ? $this->New_label['pcent_ds'] : "Pcent Ds"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_ds))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_ds_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pcent_ds_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp1'])) ? $this->New_label['dp1'] : "Dp 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp2'])) ? $this->New_label['dp2'] : "Dp 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dp2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp3'])) ? $this->New_label['dp3'] : "Dp 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp4'])) ? $this->New_label['dp4'] : "Dp 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dp4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp5'])) ? $this->New_label['dp5'] : "Dp 5"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp5))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp5_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp5_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_dp'])) ? $this->New_label['pcent_dp'] : "Pcent Dp"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_dp))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_dp_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pcent_dp_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['aeep1'])) ? $this->New_label['aeep1'] : "Aeep 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->aeep1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_aeep1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_aeep1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['porcent_aeep1'])) ? $this->New_label['porcent_aeep1'] : "Porcent Aeep 1"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->porcent_aeep1))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porcent_aeep1_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_porcent_aeep1_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['inasistencia_p2'])) ? $this->New_label['inasistencia_p2'] : "Inasistencia P 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->inasistencia_p2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_inasistencia_p2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_inasistencia_p2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['eval_2_per'])) ? $this->New_label['eval_2_per'] : "VAL"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->eval_2_per))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "1", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_eval_2_per_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_eval_2_per_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc1_2p'])) ? $this->New_label['dc1_2p'] : "Dc 1 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc1_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc1_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc1_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc2_2p'])) ? $this->New_label['dc2_2p'] : "Dc 2 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc2_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc2_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc2_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc3_2p'])) ? $this->New_label['dc3_2p'] : "Dc 3 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc3_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc3_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc3_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc4_2p'])) ? $this->New_label['dc4_2p'] : "Dc 4 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc4_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc4_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc4_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc5_2p'])) ? $this->New_label['dc5_2p'] : "Dc 5 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc5_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc5_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc5_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_dc2'])) ? $this->New_label['pcent_dc2'] : "Pcent Dc 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_dc2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_dc2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pcent_dc2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds1_2p'])) ? $this->New_label['ds1_2p'] : "Ds 1 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds1_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds1_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds1_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds2_2p'])) ? $this->New_label['ds2_2p'] : "Ds 2 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds2_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds2_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ds2_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds3_2p'])) ? $this->New_label['ds3_2p'] : "Ds 3 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds3_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds3_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds3_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds4_2p'])) ? $this->New_label['ds4_2p'] : "Ds 4 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds4_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds4_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ds4_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds5_2p'])) ? $this->New_label['ds5_2p'] : "Ds 5 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds5_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds5_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds5_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_ds2'])) ? $this->New_label['pcent_ds2'] : "Pcent Ds 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_ds2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_ds2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pcent_ds2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp1_2p'])) ? $this->New_label['dp1_2p'] : "Dp 1 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp1_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp1_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp1_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp2_2p'])) ? $this->New_label['dp2_2p'] : "Dp 2 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp2_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp2_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dp2_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp3_2p'])) ? $this->New_label['dp3_2p'] : "Dp 3 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp3_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp3_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp3_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp4_2p'])) ? $this->New_label['dp4_2p'] : "Dp 4 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp4_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp4_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dp4_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp5_2p'])) ? $this->New_label['dp5_2p'] : "Dp 5 2p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp5_2p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp5_2p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp5_2p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_dp2'])) ? $this->New_label['pcent_dp2'] : "Pcent Dp 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_dp2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_dp2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pcent_dp2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['aee_p2'])) ? $this->New_label['aee_p2'] : "Aee P 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->aee_p2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_aee_p2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_aee_p2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['letras_p2'])) ? $this->New_label['letras_p2'] : "Letras P 2"; 
          $conteudo = trim(sc_strip_script($this->letras_p2)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_letras_p2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_letras_p2_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['porcet_aee_p2'])) ? $this->New_label['porcet_aee_p2'] : "Porcet Aee P 2"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->porcet_aee_p2))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porcet_aee_p2_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_porcet_aee_p2_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['inasistencia_p3'])) ? $this->New_label['inasistencia_p3'] : "Inasistencia P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->inasistencia_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_inasistencia_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_inasistencia_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['eval_3_per'])) ? $this->New_label['eval_3_per'] : "VAL"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->eval_3_per))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "1", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_eval_3_per_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_eval_3_per_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc1_3p'])) ? $this->New_label['dc1_3p'] : "Dc 1 3p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc1_3p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc1_3p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc1_3p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc2_3p'])) ? $this->New_label['dc2_3p'] : "Dc 2 3p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc2_3p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc2_3p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc2_3p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc3_3p'])) ? $this->New_label['dc3_3p'] : "Dc 3 3p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc3_3p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc3_3p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc3_3p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc4_3p'])) ? $this->New_label['dc4_3p'] : "Dc 4 3p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc4_3p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc4_3p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc4_3p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc5_3p'])) ? $this->New_label['dc5_3p'] : "Dc 5 3p"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc5_3p))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc5_3p_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc5_3p_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_dc3'])) ? $this->New_label['pcent_dc3'] : "Pcent Dc 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_dc3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_dc3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_pcent_dc3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds1_p3'])) ? $this->New_label['ds1_p3'] : "Ds 1 P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds1_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds1_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ds1_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds2_p3'])) ? $this->New_label['ds2_p3'] : "Ds 2 P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds2_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds2_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds2_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds3_p3'])) ? $this->New_label['ds3_p3'] : "Ds 3 P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds3_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds3_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ds3_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds4_p3'])) ? $this->New_label['ds4_p3'] : "Ds 4 P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds4_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds4_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds4_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds5_p3'])) ? $this->New_label['ds5_p3'] : "Ds 5 P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds5_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds5_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ds5_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_ds3'])) ? $this->New_label['pcent_ds3'] : "Pcent Ds 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_ds3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_ds3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_pcent_ds3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp1_p3'])) ? $this->New_label['dp1_p3'] : "Dp 1 P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp1_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp1_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dp1_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp2_p3'])) ? $this->New_label['dp2_p3'] : "Dp 2 P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp2_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp2_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp2_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp3_p3'])) ? $this->New_label['dp3_p3'] : "Dp 3 P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp3_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp3_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dp3_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp4_p3'])) ? $this->New_label['dp4_p3'] : "Dp 4 P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp4_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp4_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp4_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Dp 5 P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->sc_field_0))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_sc_field_0_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_sc_field_0_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_dp3'])) ? $this->New_label['pcent_dp3'] : "Pcent Dp 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_dp3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_dp3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_pcent_dp3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['aee_p3'])) ? $this->New_label['aee_p3'] : "Aee P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->aee_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_aee_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_aee_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['letras_p3'])) ? $this->New_label['letras_p3'] : "Letras P 3"; 
          $conteudo = trim(sc_strip_script($this->letras_p3)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_letras_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_letras_p3_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['porcent_aee_p3'])) ? $this->New_label['porcent_aee_p3'] : "Porcent Aee P 3"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->porcent_aee_p3))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porcent_aee_p3_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_porcent_aee_p3_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['inasistencia_p4'])) ? $this->New_label['inasistencia_p4'] : "Inasistencia P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->inasistencia_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_inasistencia_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_inasistencia_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['eval_4_per'])) ? $this->New_label['eval_4_per'] : "VAL"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->eval_4_per))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "1", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_eval_4_per_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_eval_4_per_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc1_p4'])) ? $this->New_label['dc1_p4'] : "Dc 1 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc1_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc1_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc1_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc2_p4'])) ? $this->New_label['dc2_p4'] : "Dc 2 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc2_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc2_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc2_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc3_p4'])) ? $this->New_label['dc3_p4'] : "Dc 3 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc3_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc3_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc3_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc4_p4'])) ? $this->New_label['dc4_p4'] : "Dc 4 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc4_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc4_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dc4_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dc5_p4'])) ? $this->New_label['dc5_p4'] : "Dc 5 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dc5_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dc5_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dc5_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_dc4'])) ? $this->New_label['pcent_dc4'] : "Pcent Dc 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_dc4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_dc4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pcent_dc4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds1_p4'])) ? $this->New_label['ds1_p4'] : "Ds 1 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds1_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds1_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds1_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds2_p4'])) ? $this->New_label['ds2_p4'] : "Ds 2 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds2_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds2_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ds2_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds3_p4'])) ? $this->New_label['ds3_p4'] : "Ds 3 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds3_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds3_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds3_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds4_p4'])) ? $this->New_label['ds4_p4'] : "Ds 4 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds4_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds4_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_ds4_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['ds5_p4'])) ? $this->New_label['ds5_p4'] : "Ds 5 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->ds5_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_ds5_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_ds5_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_ds4'])) ? $this->New_label['pcent_ds4'] : "Pcent Ds 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_ds4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_ds4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_pcent_ds4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp1_p4'])) ? $this->New_label['dp1_p4'] : "Dp 1 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp1_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp1_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp1_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp2_p4'])) ? $this->New_label['dp2_p4'] : "Dp 2 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp2_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp2_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dp2_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp3_p4'])) ? $this->New_label['dp3_p4'] : "Dp 3 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp3_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp3_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp3_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp4_p4'])) ? $this->New_label['dp4_p4'] : "Dp 4 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp4_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp4_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_dp4_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['dp5_p4'])) ? $this->New_label['dp5_p4'] : "Dp 5 P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->dp5_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_dp5_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_dp5_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['aee_p4'])) ? $this->New_label['aee_p4'] : "Aee P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->aee_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_aee_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_aee_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['letras_p4'])) ? $this->New_label['letras_p4'] : "Letras P 4"; 
          $conteudo = trim(sc_strip_script($this->letras_p4)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_letras_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_letras_p4_det_line\"   ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['porcent_aee_p4'])) ? $this->New_label['porcent_aee_p4'] : "Porcent Aee P 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->porcent_aee_p4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_porcent_aee_p4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_porcent_aee_p4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['pcent_dp4'])) ? $this->New_label['pcent_dp4'] : "Pcent Dp 4"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->pcent_dp4))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_pcent_dp4_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_pcent_dp4_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['eval_final'])) ? $this->New_label['eval_final'] : "Eval Final"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->eval_final))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_eval_final_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert css_eval_final_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['entorno'])) ? $this->New_label['entorno'] : "Entorno"; 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->entorno))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont css_entorno_det_label\"  >" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert css_entorno_det_line\"  NOWRAP ALIGN=\"\" VALIGN=\"\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("</TABLE>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_3']['pdf_det']) 
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
   $nm_saida->saida("       NovaJanela = window.open (\"grid_t_evaluacion_3_doc.php?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&nm_cod_doc=\" + campo1 + \"&nm_nome_doc=\" + campo2 + \"&nm_cod_apl=\" + campo3, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g) \r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      window.location = \"" . $this->Ini->path_link . "grid_t_evaluacion_3/index.php?nmgp_opcao=pdf_det&nmgp_tipo_pdf=\" + z + \"&nmgp_parms_pdf=\" + p +  \"&nmgp_graf_pdf=\" + g + \"&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "\";\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       window.open('" . $this->Ini->path_link . "grid_t_evaluacion_3/grid_t_evaluacion_3_iframe_prt.php?path_botoes=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&opcao=det_print&cor_print=' + cor,'','location=no,menubar,resizable,scrollbars,status=no,toolbar');\r\n");
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
