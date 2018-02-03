<?php

class grid_t_evaluacion_r_cg_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_t_evaluacion_r_cg_rtf()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_t_evaluacion_r_cg";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_t_evaluacion_r_cg.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_r_cg']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_r_cg']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_r_cg']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_asignatura, eval_1_per, ihs, id_estudiante, id_grupo from (SELECT      id_estudiante,     primer_apellido,     segundo_apellido,     primer_nombre,     segundo_nombre,     id_grupo,     id_area,     id_asignatura,     id_grado,     id_nivel,     ihs,     pfa,     tipo_asig,     novedad,     estatus,     inasistencia_p1,     eval_1_per,     dc1,     dc2,     dc3,     dc4,     dc5,     dc6,     dc7,     dc8,     dc9,     dc10,     dc11,     dc12,     letras_p1,     pcent_dc,     ds1,     ds2,     ds3,     ds4,     ds5,     pcent_ds,     dp1,     dp2,     dp3,     dp4,     dp5,     pcent_dp,     aeep1,     porcent_aeep1,     inasistencia_p2,     eval_2_per,     dc1_2p,     dc2_2p,     dc3_2p,     dc4_2p,     dc5_2p,     pcent_dc2,     ds1_2p,     ds2_2p,     ds3_2p,     ds4_2p,     ds5_2p,     pcent_ds2,     dp1_2p,     dp2_2p,     dp3_2p,     dp4_2p,     dp5_2p,     pcent_dp2,     aee_p2,     letras_p2,     porcet_aee_p2,     inasistencia_p3,     eval_3_per,     dc1_3p,     dc2_3p,     dc3_3p,     dc4_3p,     dc5_3p,     pcent_dc3,     ds1_p3,     ds2_p3,     ds3_p3,     ds4_p3,     ds5_p3,     pcent_ds3,     dp1_p3,     dp2_p3,     dp3_p3,     dp4_p3,     `dp5-p3`,     pcent_dp3,     aee_p3,     letras_p3,     porcent_aee_p3,     inasistencia_p4,     eval_4_per,     dc1_p4,     dc2_p4,     dc3_p4,     dc4_p4,     dc5_p4,     pcent_dc4,     ds1_p4,     ds2_p4,     ds3_p4,     ds4_p4,     ds5_p4,     pcent_ds4,     dp1_p4,     dp2_p4,     dp3_p4,     dp4_p4,     dp5_p4,     aee_p4,     letras_p4,     porcent_aee_p4,     pcent_dp4,     eval_final,     entorno FROM      t_evaluacion WHERE id_estudiante = " . $_SESSION['par_id_estudiante'] . " AND eval_1_per >= (SELECT minimo FROM valoracion WHERE valoracion = 'Bajo')) nm_sel_esp"; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_asignatura, eval_1_per, ihs, id_estudiante, id_grupo from (SELECT      id_estudiante,     primer_apellido,     segundo_apellido,     primer_nombre,     segundo_nombre,     id_grupo,     id_area,     id_asignatura,     id_grado,     id_nivel,     ihs,     pfa,     tipo_asig,     novedad,     estatus,     inasistencia_p1,     eval_1_per,     dc1,     dc2,     dc3,     dc4,     dc5,     dc6,     dc7,     dc8,     dc9,     dc10,     dc11,     dc12,     letras_p1,     pcent_dc,     ds1,     ds2,     ds3,     ds4,     ds5,     pcent_ds,     dp1,     dp2,     dp3,     dp4,     dp5,     pcent_dp,     aeep1,     porcent_aeep1,     inasistencia_p2,     eval_2_per,     dc1_2p,     dc2_2p,     dc3_2p,     dc4_2p,     dc5_2p,     pcent_dc2,     ds1_2p,     ds2_2p,     ds3_2p,     ds4_2p,     ds5_2p,     pcent_ds2,     dp1_2p,     dp2_2p,     dp3_2p,     dp4_2p,     dp5_2p,     pcent_dp2,     aee_p2,     letras_p2,     porcet_aee_p2,     inasistencia_p3,     eval_3_per,     dc1_3p,     dc2_3p,     dc3_3p,     dc4_3p,     dc5_3p,     pcent_dc3,     ds1_p3,     ds2_p3,     ds3_p3,     ds4_p3,     ds5_p3,     pcent_ds3,     dp1_p3,     dp2_p3,     dp3_p3,     dp4_p3,     `dp5-p3`,     pcent_dp3,     aee_p3,     letras_p3,     porcent_aee_p3,     inasistencia_p4,     eval_4_per,     dc1_p4,     dc2_p4,     dc3_p4,     dc4_p4,     dc5_p4,     pcent_dc4,     ds1_p4,     ds2_p4,     ds3_p4,     ds4_p4,     ds5_p4,     pcent_ds4,     dp1_p4,     dp2_p4,     dp3_p4,     dp4_p4,     dp5_p4,     aee_p4,     letras_p4,     porcent_aee_p4,     pcent_dp4,     eval_final,     entorno FROM      t_evaluacion WHERE id_estudiante = " . $_SESSION['par_id_estudiante'] . " AND eval_1_per >= (SELECT minimo FROM valoracion WHERE valoracion = 'Bajo')) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['id_asignatura'])) ? $this->New_label['id_asignatura'] : "Asignatura"; 
          if ($Cada_col == "id_asignatura" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ihs_vac'])) ? $this->New_label['ihs_vac'] : "IHS"; 
          if ($Cada_col == "ihs_vac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['eval_1_per'])) ? $this->New_label['eval_1_per'] : "Eval 1 Per"; 
          if ($Cada_col == "eval_1_per" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sup_p1'])) ? $this->New_label['sup_p1'] : "SUP"; 
          if ($Cada_col == "sup_p1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sup_p2'])) ? $this->New_label['sup_p2'] : "SUP"; 
          if ($Cada_col == "sup_p2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sup_p3'])) ? $this->New_label['sup_p3'] : "SUP"; 
          if ($Cada_col == "sup_p3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fea_re_ac'])) ? $this->New_label['fea_re_ac'] : "Fa/Re Ac"; 
          if ($Cada_col == "fea_re_ac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['definitiva'])) ? $this->New_label['definitiva'] : "DEF"; 
          if ($Cada_col == "definitiva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vac'])) ? $this->New_label['vac'] : "VAc"; 
          if ($Cada_col == "vac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vra'])) ? $this->New_label['vra'] : "VRA"; 
          if ($Cada_col == "vra" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->Texto_tag .= "<tr>\r\n";
         $this->id_asignatura = $rs->fields[0] ;  
         $this->id_asignatura = (string)$this->id_asignatura;
         $this->eval_1_per = $rs->fields[1] ;  
         $this->eval_1_per = (strpos(strtolower($this->eval_1_per), "e")) ? (float)$this->eval_1_per : $this->eval_1_per; 
         $this->eval_1_per = (string)$this->eval_1_per;
         $this->ihs = $rs->fields[2] ;  
         $this->ihs = (string)$this->ihs;
         $this->id_estudiante = $rs->fields[3] ;  
         $this->id_estudiante = (string)$this->id_estudiante;
         $this->id_grupo = $rs->fields[4] ;  
         $this->id_grupo = (string)$this->id_grupo;
         //----- lookup - id_asignatura
         $this->look_id_asignatura = $this->id_asignatura; 
         $this->Lookup->lookup_id_asignatura($this->look_id_asignatura, $this->id_asignatura) ; 
         $this->look_id_asignatura = ($this->look_id_asignatura == "&nbsp;") ? "" : $this->look_id_asignatura; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_t_evaluacion_r_cg']['contr_erro'] = 'on';
 $check_sql = "SELECT maximo"
   . " FROM valoracion"
   . " WHERE orden = '" . 1 . "'";
 
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
    $nota_maxima = $this->rs[0][0];
   
}
		else     
{
		   $nota_maxima = '';
   
}


if($this->eval_1_per  > $nota_maxima ){
$this->eval_1_per  = $nota_maxima;
}
$this->ihs_vac  =$this->ihs ;
$_SESSION['scriptcase']['grid_t_evaluacion_r_cg']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- id_asignatura
   function NM_export_id_asignatura()
   {
         nmgp_Form_Num_Val($this->look_id_asignatura, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_id_asignatura))
         {
             $this->look_id_asignatura = sc_convert_encoding($this->look_id_asignatura, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_id_asignatura = str_replace('<', '&lt;', $this->look_id_asignatura);
         $this->look_id_asignatura = str_replace('>', '&gt;', $this->look_id_asignatura);
         $this->Texto_tag .= "<td>" . $this->look_id_asignatura . "</td>\r\n";
   }
   //----- ihs_vac
   function NM_export_ihs_vac()
   {
         nmgp_Form_Num_Val($this->ihs_vac, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->ihs_vac))
         {
             $this->ihs_vac = sc_convert_encoding($this->ihs_vac, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ihs_vac = str_replace('<', '&lt;', $this->ihs_vac);
         $this->ihs_vac = str_replace('>', '&gt;', $this->ihs_vac);
         $this->Texto_tag .= "<td>" . $this->ihs_vac . "</td>\r\n";
   }
   //----- eval_1_per
   function NM_export_eval_1_per()
   {
         nmgp_Form_Num_Val($this->eval_1_per, ".", ",", "1", "S", "2", "", "N:2", "-") ; 
         if (!NM_is_utf8($this->eval_1_per))
         {
             $this->eval_1_per = sc_convert_encoding($this->eval_1_per, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->eval_1_per = str_replace('<', '&lt;', $this->eval_1_per);
         $this->eval_1_per = str_replace('>', '&gt;', $this->eval_1_per);
         $this->Texto_tag .= "<td>" . $this->eval_1_per . "</td>\r\n";
   }
   //----- sup_p1
   function NM_export_sup_p1()
   {
         nmgp_Form_Num_Val($this->sup_p1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->sup_p1))
         {
             $this->sup_p1 = sc_convert_encoding($this->sup_p1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sup_p1 = str_replace('<', '&lt;', $this->sup_p1);
         $this->sup_p1 = str_replace('>', '&gt;', $this->sup_p1);
         $this->Texto_tag .= "<td>" . $this->sup_p1 . "</td>\r\n";
   }
   //----- sup_p2
   function NM_export_sup_p2()
   {
         nmgp_Form_Num_Val($this->sup_p2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->sup_p2))
         {
             $this->sup_p2 = sc_convert_encoding($this->sup_p2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sup_p2 = str_replace('<', '&lt;', $this->sup_p2);
         $this->sup_p2 = str_replace('>', '&gt;', $this->sup_p2);
         $this->Texto_tag .= "<td>" . $this->sup_p2 . "</td>\r\n";
   }
   //----- sup_p3
   function NM_export_sup_p3()
   {
         nmgp_Form_Num_Val($this->sup_p3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->sup_p3))
         {
             $this->sup_p3 = sc_convert_encoding($this->sup_p3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sup_p3 = str_replace('<', '&lt;', $this->sup_p3);
         $this->sup_p3 = str_replace('>', '&gt;', $this->sup_p3);
         $this->Texto_tag .= "<td>" . $this->sup_p3 . "</td>\r\n";
   }
   //----- fea_re_ac
   function NM_export_fea_re_ac()
   {
         $this->fea_re_ac = html_entity_decode($this->fea_re_ac, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fea_re_ac = strip_tags($this->fea_re_ac);
         if (!NM_is_utf8($this->fea_re_ac))
         {
             $this->fea_re_ac = sc_convert_encoding($this->fea_re_ac, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fea_re_ac = str_replace('<', '&lt;', $this->fea_re_ac);
         $this->fea_re_ac = str_replace('>', '&gt;', $this->fea_re_ac);
         $this->Texto_tag .= "<td>" . $this->fea_re_ac . "</td>\r\n";
   }
   //----- definitiva
   function NM_export_definitiva()
   {
         nmgp_Form_Num_Val($this->definitiva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->definitiva))
         {
             $this->definitiva = sc_convert_encoding($this->definitiva, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->definitiva = str_replace('<', '&lt;', $this->definitiva);
         $this->definitiva = str_replace('>', '&gt;', $this->definitiva);
         $this->Texto_tag .= "<td>" . $this->definitiva . "</td>\r\n";
   }
   //----- vac
   function NM_export_vac()
   {
         nmgp_Form_Num_Val($this->vac, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->vac))
         {
             $this->vac = sc_convert_encoding($this->vac, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->vac = str_replace('<', '&lt;', $this->vac);
         $this->vac = str_replace('>', '&gt;', $this->vac);
         $this->Texto_tag .= "<td>" . $this->vac . "</td>\r\n";
   }
   //----- vra
   function NM_export_vra()
   {
         nmgp_Form_Num_Val($this->vra, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->vra))
         {
             $this->vra = sc_convert_encoding($this->vra, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->vra = str_replace('<', '&lt;', $this->vra);
         $this->vra = str_replace('>', '&gt;', $this->vra);
         $this->Texto_tag .= "<td>" . $this->vra . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - t_evaluacion :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fdown" method="get" action="grid_t_evaluacion_r_cg_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_t_evaluacion_r_cg"> 
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
