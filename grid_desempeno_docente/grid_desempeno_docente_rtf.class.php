<?php

class grid_desempeno_docente_rtf
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
   function grid_desempeno_docente_rtf()
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
      $this->Arquivo   .= "_grid_desempeno_docente";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_desempeno_docente.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_desempeno_docente']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_desempeno_docente']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_desempeno_docente']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT desempeno.codigo as desempeno_codigo, desempeno.periodos as desempeno_periodos, desempeno.superior as desempeno_superior, desempeno.id_asignatura as desempeno_id_asignatura, rel_desemp_posicion.id_grupo as rel_desemp_posicion_id_grupo, rel_desemp_posicion.posicion as rel_desemp_posicion_posicion from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT desempeno.codigo as desempeno_codigo, desempeno.periodos as desempeno_periodos, desempeno.superior as desempeno_superior, desempeno.id_asignatura as desempeno_id_asignatura, rel_desemp_posicion.id_grupo as rel_desemp_posicion_id_grupo, rel_desemp_posicion.posicion as rel_desemp_posicion_posicion from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['desempeno_codigo'])) ? $this->New_label['desempeno_codigo'] : "CÓDIGO"; 
          if ($Cada_col == "desempeno_codigo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['desempeno_periodos'])) ? $this->New_label['desempeno_periodos'] : "PERÍODO"; 
          if ($Cada_col == "desempeno_periodos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['desempeno_superior'])) ? $this->New_label['desempeno_superior'] : "DESEMPEÑO"; 
          if ($Cada_col == "desempeno_superior" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['desempeno_id_asignatura'])) ? $this->New_label['desempeno_id_asignatura'] : "ASIGNATURA"; 
          if ($Cada_col == "desempeno_id_asignatura" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rel_desemp_posicion_id_grupo'])) ? $this->New_label['rel_desemp_posicion_id_grupo'] : "GRUPO"; 
          if ($Cada_col == "rel_desemp_posicion_id_grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rel_desemp_posicion_posicion'])) ? $this->New_label['rel_desemp_posicion_posicion'] : "POSICIÓN"; 
          if ($Cada_col == "rel_desemp_posicion_posicion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['actividades'])) ? $this->New_label['actividades'] : "CREAR ACTIVIDADES"; 
          if ($Cada_col == "actividades" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['evalua_actividades'])) ? $this->New_label['evalua_actividades'] : "Evaluar Actividades"; 
          if ($Cada_col == "evalua_actividades" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->desempeno_codigo = $rs->fields[0] ;  
         $this->desempeno_codigo = (string)$this->desempeno_codigo;
         $this->desempeno_periodos = $rs->fields[1] ;  
         $this->desempeno_superior = $rs->fields[2] ;  
         $this->desempeno_id_asignatura = $rs->fields[3] ;  
         $this->desempeno_id_asignatura = (string)$this->desempeno_id_asignatura;
         $this->rel_desemp_posicion_id_grupo = $rs->fields[4] ;  
         $this->rel_desemp_posicion_id_grupo = (string)$this->rel_desemp_posicion_id_grupo;
         $this->rel_desemp_posicion_posicion = $rs->fields[5] ;  
         //----- lookup - desempeno_id_asignatura
         $this->look_desempeno_id_asignatura = $this->desempeno_id_asignatura; 
         $this->Lookup->lookup_desempeno_id_asignatura($this->look_desempeno_id_asignatura, $this->desempeno_id_asignatura) ; 
         $this->look_desempeno_id_asignatura = ($this->look_desempeno_id_asignatura == "&nbsp;") ? "" : $this->look_desempeno_id_asignatura; 
         //----- lookup - rel_desemp_posicion_id_grupo
         $this->look_rel_desemp_posicion_id_grupo = $this->rel_desemp_posicion_id_grupo; 
         $this->Lookup->lookup_rel_desemp_posicion_id_grupo($this->look_rel_desemp_posicion_id_grupo, $this->rel_desemp_posicion_id_grupo) ; 
         $this->look_rel_desemp_posicion_id_grupo = ($this->look_rel_desemp_posicion_id_grupo == "&nbsp;") ? "" : $this->look_rel_desemp_posicion_id_grupo; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_desempeno_docente']['contr_erro'] = 'on';
if (!isset($_SESSION['par_des_superior'])) {$_SESSION['par_des_superior'] = "";}
if (!isset($this->sc_temp_par_des_superior)) {$this->sc_temp_par_des_superior = (isset($_SESSION['par_des_superior'])) ? $_SESSION['par_des_superior'] : "";}
if (!isset($_SESSION['par_codigo'])) {$_SESSION['par_codigo'] = "";}
if (!isset($this->sc_temp_par_codigo)) {$this->sc_temp_par_codigo = (isset($_SESSION['par_codigo'])) ? $_SESSION['par_codigo'] : "";}
if (!isset($_SESSION['ayuda'])) {$_SESSION['ayuda'] = "";}
if (!isset($this->sc_temp_ayuda)) {$this->sc_temp_ayuda = (isset($_SESSION['ayuda'])) ? $_SESSION['ayuda'] : "";}
  unset($_SESSION['ayuda']);
 unset($this->sc_temp_ayuda);
$check_sql = "SELECT superior"
   . " FROM desempeno"
   . " WHERE codigo = '" .$this->desempeno_codigo . "'";
 
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
    $this->sc_temp_ayuda = $this->rs[0][0];
 }  
		else     
{
		    $this->sc_temp_ayuda  = '';
   
}
$this->sc_temp_par_codigo=$this->desempeno_codigo ;
$this->sc_temp_par_des_superior=$this->desempeno_superior ;
if (isset($this->sc_temp_ayuda)) {$_SESSION['ayuda'] = $this->sc_temp_ayuda;}
if (isset($this->sc_temp_par_codigo)) {$_SESSION['par_codigo'] = $this->sc_temp_par_codigo;}
if (isset($this->sc_temp_par_des_superior)) {$_SESSION['par_des_superior'] = $this->sc_temp_par_des_superior;}
$_SESSION['scriptcase']['grid_desempeno_docente']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['field_order'] as $Cada_col)
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
   //----- desempeno_codigo
   function NM_export_desempeno_codigo()
   {
         nmgp_Form_Num_Val($this->desempeno_codigo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->desempeno_codigo))
         {
             $this->desempeno_codigo = sc_convert_encoding($this->desempeno_codigo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->desempeno_codigo = str_replace('<', '&lt;', $this->desempeno_codigo);
         $this->desempeno_codigo = str_replace('>', '&gt;', $this->desempeno_codigo);
         $this->Texto_tag .= "<td>" . $this->desempeno_codigo . "</td>\r\n";
   }
   //----- desempeno_periodos
   function NM_export_desempeno_periodos()
   {
         $this->desempeno_periodos = html_entity_decode($this->desempeno_periodos, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->desempeno_periodos = strip_tags($this->desempeno_periodos);
         if (!NM_is_utf8($this->desempeno_periodos))
         {
             $this->desempeno_periodos = sc_convert_encoding($this->desempeno_periodos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->desempeno_periodos = str_replace('<', '&lt;', $this->desempeno_periodos);
         $this->desempeno_periodos = str_replace('>', '&gt;', $this->desempeno_periodos);
         $this->Texto_tag .= "<td>" . $this->desempeno_periodos . "</td>\r\n";
   }
   //----- desempeno_superior
   function NM_export_desempeno_superior()
   {
         $this->desempeno_superior = html_entity_decode($this->desempeno_superior, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->desempeno_superior = strip_tags($this->desempeno_superior);
         if (!NM_is_utf8($this->desempeno_superior))
         {
             $this->desempeno_superior = sc_convert_encoding($this->desempeno_superior, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->desempeno_superior = str_replace('<', '&lt;', $this->desempeno_superior);
         $this->desempeno_superior = str_replace('>', '&gt;', $this->desempeno_superior);
         $this->Texto_tag .= "<td>" . $this->desempeno_superior . "</td>\r\n";
   }
   //----- desempeno_id_asignatura
   function NM_export_desempeno_id_asignatura()
   {
         nmgp_Form_Num_Val($this->look_desempeno_id_asignatura, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_desempeno_id_asignatura))
         {
             $this->look_desempeno_id_asignatura = sc_convert_encoding($this->look_desempeno_id_asignatura, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_desempeno_id_asignatura = str_replace('<', '&lt;', $this->look_desempeno_id_asignatura);
         $this->look_desempeno_id_asignatura = str_replace('>', '&gt;', $this->look_desempeno_id_asignatura);
         $this->Texto_tag .= "<td>" . $this->look_desempeno_id_asignatura . "</td>\r\n";
   }
   //----- rel_desemp_posicion_id_grupo
   function NM_export_rel_desemp_posicion_id_grupo()
   {
         nmgp_Form_Num_Val($this->look_rel_desemp_posicion_id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_rel_desemp_posicion_id_grupo))
         {
             $this->look_rel_desemp_posicion_id_grupo = sc_convert_encoding($this->look_rel_desemp_posicion_id_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_rel_desemp_posicion_id_grupo = str_replace('<', '&lt;', $this->look_rel_desemp_posicion_id_grupo);
         $this->look_rel_desemp_posicion_id_grupo = str_replace('>', '&gt;', $this->look_rel_desemp_posicion_id_grupo);
         $this->Texto_tag .= "<td>" . $this->look_rel_desemp_posicion_id_grupo . "</td>\r\n";
   }
   //----- rel_desemp_posicion_posicion
   function NM_export_rel_desemp_posicion_posicion()
   {
         $this->rel_desemp_posicion_posicion = html_entity_decode($this->rel_desemp_posicion_posicion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rel_desemp_posicion_posicion = strip_tags($this->rel_desemp_posicion_posicion);
         if (!NM_is_utf8($this->rel_desemp_posicion_posicion))
         {
             $this->rel_desemp_posicion_posicion = sc_convert_encoding($this->rel_desemp_posicion_posicion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->rel_desemp_posicion_posicion = str_replace('<', '&lt;', $this->rel_desemp_posicion_posicion);
         $this->rel_desemp_posicion_posicion = str_replace('>', '&gt;', $this->rel_desemp_posicion_posicion);
         $this->Texto_tag .= "<td>" . $this->rel_desemp_posicion_posicion . "</td>\r\n";
   }
   //----- actividades
   function NM_export_actividades()
   {
         if (!NM_is_utf8($this->actividades))
         {
             $this->actividades = sc_convert_encoding($this->actividades, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->actividades = str_replace('<', '&lt;', $this->actividades);
         $this->actividades = str_replace('>', '&gt;', $this->actividades);
         $this->Texto_tag .= "<td>" . $this->actividades . "</td>\r\n";
   }
   //----- evalua_actividades
   function NM_export_evalua_actividades()
   {
         if (!NM_is_utf8($this->evalua_actividades))
         {
             $this->evalua_actividades = sc_convert_encoding($this->evalua_actividades, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->evalua_actividades = str_replace('<', '&lt;', $this->evalua_actividades);
         $this->evalua_actividades = str_replace('>', '&gt;', $this->evalua_actividades);
         $this->Texto_tag .= "<td>" . $this->evalua_actividades . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_desempeno_docente'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Indicadores de  desempeño :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_desempeno_docente_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_desempeno_docente"> 
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