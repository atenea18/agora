<?php

class grid_estudiantes_xml
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
   function grid_estudiantes_xml()
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
      $this->Arquivo     .= "_grid_estudiantes";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_estudiantes.xml";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_estudiantes']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_estudiantes']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_estudiantes']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idstudents = $Busca_temp['idstudents']; 
          $tmp_pos = strpos($this->idstudents, "##@@");
          if ($tmp_pos !== false)
          {
              $this->idstudents = substr($this->idstudents, 0, $tmp_pos);
          }
          $this->id_sede = $Busca_temp['id_sede']; 
          $tmp_pos = strpos($this->id_sede, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_sede = substr($this->id_sede, 0, $tmp_pos);
          }
          $this->id_sede_2 = $Busca_temp['id_sede_input_2']; 
          $this->id_jornada = $Busca_temp['id_jornada']; 
          $tmp_pos = strpos($this->id_jornada, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_jornada = substr($this->id_jornada, 0, $tmp_pos);
          }
          $this->id_jornada_2 = $Busca_temp['id_jornada_input_2']; 
          $this->grado_igreso = $Busca_temp['grado_igreso']; 
          $tmp_pos = strpos($this->grado_igreso, "##@@");
          if ($tmp_pos !== false)
          {
              $this->grado_igreso = substr($this->grado_igreso, 0, $tmp_pos);
          }
          $this->grado_igreso_2 = $Busca_temp['grado_igreso_input_2']; 
          $this->id_grupo = $Busca_temp['id_grupo']; 
          $tmp_pos = strpos($this->id_grupo, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_grupo = substr($this->id_grupo, 0, $tmp_pos);
          }
          $this->id_grupo_2 = $Busca_temp['id_grupo_input_2']; 
          $this->primer_nombre = $Busca_temp['primer_nombre']; 
          $tmp_pos = strpos($this->primer_nombre, "##@@");
          if ($tmp_pos !== false)
          {
              $this->primer_nombre = substr($this->primer_nombre, 0, $tmp_pos);
          }
          $this->segundo_nombre = $Busca_temp['segundo_nombre']; 
          $tmp_pos = strpos($this->segundo_nombre, "##@@");
          if ($tmp_pos !== false)
          {
              $this->segundo_nombre = substr($this->segundo_nombre, 0, $tmp_pos);
          }
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
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_sede, id_jornada, grado_igreso, id_grupo, idstudents, semestre, estatus, fecha_matricula, tipo_identificacion, numero_documento, genero, fecha_nacimiento, address, barrio, zona, telefono, grado_anterior, subsidado, especialidad, eps, tipo_sangre, nivel_sisben, estrato, etnia, email, subsidio, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_sede, id_jornada, grado_igreso, id_grupo, idstudents, semestre, estatus, fecha_matricula, tipo_identificacion, numero_documento, genero, fecha_nacimiento, address, barrio, zona, telefono, grado_anterior, subsidado, especialidad, eps, tipo_sangre, nivel_sisben, estrato, etnia, email, subsidio, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['order_grid'];
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
         $this->xml_registro = "<grid_estudiantes";
         $this->id_sede = $rs->fields[0] ;  
         $this->id_jornada = $rs->fields[1] ;  
         $this->id_jornada = (string)$this->id_jornada;
         $this->grado_igreso = $rs->fields[2] ;  
         $this->grado_igreso = (string)$this->grado_igreso;
         $this->id_grupo = $rs->fields[3] ;  
         $this->id_grupo = (string)$this->id_grupo;
         $this->idstudents = $rs->fields[4] ;  
         $this->idstudents = (string)$this->idstudents;
         $this->semestre = $rs->fields[5] ;  
         $this->semestre = (string)$this->semestre;
         $this->estatus = $rs->fields[6] ;  
         $this->fecha_matricula = $rs->fields[7] ;  
         $this->tipo_identificacion = $rs->fields[8] ;  
         $this->numero_documento = $rs->fields[9] ;  
         $this->genero = $rs->fields[10] ;  
         $this->fecha_nacimiento = $rs->fields[11] ;  
         $this->address = $rs->fields[12] ;  
         $this->barrio = $rs->fields[13] ;  
         $this->zona = $rs->fields[14] ;  
         $this->telefono = $rs->fields[15] ;  
         $this->grado_anterior = $rs->fields[16] ;  
         $this->grado_anterior = (string)$this->grado_anterior;
         $this->subsidado = $rs->fields[17] ;  
         $this->especialidad = $rs->fields[18] ;  
         $this->eps = $rs->fields[19] ;  
         $this->eps = (string)$this->eps;
         $this->tipo_sangre = $rs->fields[20] ;  
         $this->nivel_sisben = $rs->fields[21] ;  
         $this->estrato = $rs->fields[22] ;  
         $this->estrato = (string)$this->estrato;
         $this->etnia = $rs->fields[23] ;  
         $this->email = $rs->fields[24] ;  
         $this->subsidio = $rs->fields[25] ;  
         $this->primer_nombre = $rs->fields[26] ;  
         $this->segundo_nombre = $rs->fields[27] ;  
         $this->primer_apellido = $rs->fields[28] ;  
         $this->segundo_apellido = $rs->fields[29] ;  
         //----- lookup - id_sede
         $this->look_id_sede = $this->id_sede; 
         $this->Lookup->lookup_id_sede($this->look_id_sede, $this->id_sede) ; 
         $this->look_id_sede = ($this->look_id_sede == "&nbsp;") ? "" : $this->look_id_sede; 
         //----- lookup - id_jornada
         $this->look_id_jornada = $this->id_jornada; 
         $this->Lookup->lookup_id_jornada($this->look_id_jornada, $this->id_jornada) ; 
         $this->look_id_jornada = ($this->look_id_jornada == "&nbsp;") ? "" : $this->look_id_jornada; 
         //----- lookup - grado_igreso
         $this->look_grado_igreso = $this->grado_igreso; 
         $this->Lookup->lookup_grado_igreso($this->look_grado_igreso, $this->grado_igreso) ; 
         $this->look_grado_igreso = ($this->look_grado_igreso == "&nbsp;") ? "" : $this->look_grado_igreso; 
         //----- lookup - id_grupo
         $this->look_id_grupo = $this->id_grupo; 
         $this->Lookup->lookup_id_grupo($this->look_id_grupo, $this->id_grupo) ; 
         $this->look_id_grupo = ($this->look_id_grupo == "&nbsp;") ? "" : $this->look_id_grupo; 
         //----- lookup - grado_anterior
         $this->look_grado_anterior = $this->grado_anterior; 
         $this->Lookup->lookup_grado_anterior($this->look_grado_anterior, $this->grado_anterior) ; 
         $this->look_grado_anterior = ($this->look_grado_anterior == "&nbsp;") ? "" : $this->look_grado_anterior; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_estudiantes']['contr_erro'] = 'on';
   $this->nombre  =$this->primer_apellido .' '.$this->segundo_apellido .' '.$this->primer_nombre .' '.$this->segundo_nombre ;

$check_sql = "SELECT idstudents"
   . " FROM matricula"
   . " WHERE idstudents = '" .$this->idstudents . "'";
 
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

  $this->NM_cmp_hidden["matricula"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['php_cmp_sel']["matricula"] = "on"; }	
}
		else     
{
		$this->NM_cmp_hidden["matricula"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['php_cmp_sel']["matricula"] = "off"; }
}
$this->calculaEdad();
$_SESSION['scriptcase']['grid_estudiantes']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['field_order'] as $Cada_col)
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
   //----- nombre
   function NM_export_nombre()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre))
         {
             $this->nombre = sc_convert_encoding($this->nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nombre =\"" . $this->trata_dados($this->nombre) . "\"";
   }
   //----- id_sede
   function NM_export_id_sede()
   {
         nmgp_Form_Num_Val($this->look_id_sede, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_id_sede))
         {
             $this->look_id_sede = sc_convert_encoding($this->look_id_sede, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_sede =\"" . $this->trata_dados($this->look_id_sede) . "\"";
   }
   //----- id_jornada
   function NM_export_id_jornada()
   {
         nmgp_Form_Num_Val($this->look_id_jornada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_id_jornada))
         {
             $this->look_id_jornada = sc_convert_encoding($this->look_id_jornada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_jornada =\"" . $this->trata_dados($this->look_id_jornada) . "\"";
   }
   //----- grado_igreso
   function NM_export_grado_igreso()
   {
         nmgp_Form_Num_Val($this->look_grado_igreso, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_grado_igreso))
         {
             $this->look_grado_igreso = sc_convert_encoding($this->look_grado_igreso, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " grado_igreso =\"" . $this->trata_dados($this->look_grado_igreso) . "\"";
   }
   //----- id_grupo
   function NM_export_id_grupo()
   {
         nmgp_Form_Num_Val($this->look_id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_id_grupo))
         {
             $this->look_id_grupo = sc_convert_encoding($this->look_id_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_grupo =\"" . $this->trata_dados($this->look_id_grupo) . "\"";
   }
   //----- matricula
   function NM_export_matricula()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->matricula))
         {
             $this->matricula = sc_convert_encoding($this->matricula, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " matricula =\"" . $this->trata_dados($this->matricula) . "\"";
   }
   //----- idstudents
   function NM_export_idstudents()
   {
         nmgp_Form_Num_Val($this->idstudents, "", "", "0", "S", "2", "", "N:4", "-") ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->idstudents))
         {
             $this->idstudents = sc_convert_encoding($this->idstudents, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " idstudents =\"" . $this->trata_dados($this->idstudents) . "\"";
   }
   //----- semestre
   function NM_export_semestre()
   {
         nmgp_Form_Num_Val($this->semestre, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->semestre))
         {
             $this->semestre = sc_convert_encoding($this->semestre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " semestre =\"" . $this->trata_dados($this->semestre) . "\"";
   }
   //----- estatus
   function NM_export_estatus()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->estatus))
         {
             $this->estatus = sc_convert_encoding($this->estatus, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " estatus =\"" . $this->trata_dados($this->estatus) . "\"";
   }
   //----- fecha_matricula
   function NM_export_fecha_matricula()
   {
         $conteudo_x = $this->fecha_matricula;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->fecha_matricula, "YYYY-MM-DD");
             $this->fecha_matricula = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fecha_matricula))
         {
             $this->fecha_matricula = sc_convert_encoding($this->fecha_matricula, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " fecha_matricula =\"" . $this->trata_dados($this->fecha_matricula) . "\"";
   }
   //----- tipo_identificacion
   function NM_export_tipo_identificacion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tipo_identificacion))
         {
             $this->tipo_identificacion = sc_convert_encoding($this->tipo_identificacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tipo_identificacion =\"" . $this->trata_dados($this->tipo_identificacion) . "\"";
   }
   //----- numero_documento
   function NM_export_numero_documento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->numero_documento))
         {
             $this->numero_documento = sc_convert_encoding($this->numero_documento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " numero_documento =\"" . $this->trata_dados($this->numero_documento) . "\"";
   }
   //----- genero
   function NM_export_genero()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->genero))
         {
             $this->genero = sc_convert_encoding($this->genero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " genero =\"" . $this->trata_dados($this->genero) . "\"";
   }
   //----- fecha_nacimiento
   function NM_export_fecha_nacimiento()
   {
         $conteudo_x = $this->fecha_nacimiento;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->fecha_nacimiento, "YYYY-MM-DD");
             $this->fecha_nacimiento = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fecha_nacimiento))
         {
             $this->fecha_nacimiento = sc_convert_encoding($this->fecha_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " fecha_nacimiento =\"" . $this->trata_dados($this->fecha_nacimiento) . "\"";
   }
   //----- address
   function NM_export_address()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->address))
         {
             $this->address = sc_convert_encoding($this->address, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " address =\"" . $this->trata_dados($this->address) . "\"";
   }
   //----- barrio
   function NM_export_barrio()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->barrio))
         {
             $this->barrio = sc_convert_encoding($this->barrio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " barrio =\"" . $this->trata_dados($this->barrio) . "\"";
   }
   //----- zona
   function NM_export_zona()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zona))
         {
             $this->zona = sc_convert_encoding($this->zona, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " zona =\"" . $this->trata_dados($this->zona) . "\"";
   }
   //----- telefono
   function NM_export_telefono()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->telefono))
         {
             $this->telefono = sc_convert_encoding($this->telefono, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " telefono =\"" . $this->trata_dados($this->telefono) . "\"";
   }
   //----- grado_anterior
   function NM_export_grado_anterior()
   {
         nmgp_Form_Num_Val($this->look_grado_anterior, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_grado_anterior))
         {
             $this->look_grado_anterior = sc_convert_encoding($this->look_grado_anterior, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " grado_anterior =\"" . $this->trata_dados($this->look_grado_anterior) . "\"";
   }
   //----- subsidado
   function NM_export_subsidado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->subsidado))
         {
             $this->subsidado = sc_convert_encoding($this->subsidado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " subsidado =\"" . $this->trata_dados($this->subsidado) . "\"";
   }
   //----- especialidad
   function NM_export_especialidad()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->especialidad))
         {
             $this->especialidad = sc_convert_encoding($this->especialidad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " especialidad =\"" . $this->trata_dados($this->especialidad) . "\"";
   }
   //----- eps
   function NM_export_eps()
   {
         nmgp_Form_Num_Val($this->eps, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->eps))
         {
             $this->eps = sc_convert_encoding($this->eps, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " eps =\"" . $this->trata_dados($this->eps) . "\"";
   }
   //----- tipo_sangre
   function NM_export_tipo_sangre()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tipo_sangre))
         {
             $this->tipo_sangre = sc_convert_encoding($this->tipo_sangre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tipo_sangre =\"" . $this->trata_dados($this->tipo_sangre) . "\"";
   }
   //----- nivel_sisben
   function NM_export_nivel_sisben()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nivel_sisben))
         {
             $this->nivel_sisben = sc_convert_encoding($this->nivel_sisben, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nivel_sisben =\"" . $this->trata_dados($this->nivel_sisben) . "\"";
   }
   //----- estrato
   function NM_export_estrato()
   {
         nmgp_Form_Num_Val($this->estrato, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->estrato))
         {
             $this->estrato = sc_convert_encoding($this->estrato, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " estrato =\"" . $this->trata_dados($this->estrato) . "\"";
   }
   //----- etnia
   function NM_export_etnia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->etnia))
         {
             $this->etnia = sc_convert_encoding($this->etnia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " etnia =\"" . $this->trata_dados($this->etnia) . "\"";
   }
   //----- email
   function NM_export_email()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->email))
         {
             $this->email = sc_convert_encoding($this->email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " email =\"" . $this->trata_dados($this->email) . "\"";
   }
   //----- subsidio
   function NM_export_subsidio()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->subsidio))
         {
             $this->subsidio = sc_convert_encoding($this->subsidio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " subsidio =\"" . $this->trata_dados($this->subsidio) . "\"";
   }
   //----- edad
   function NM_export_edad()
   {
         nmgp_Form_Num_Val($this->edad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->edad))
         {
             $this->edad = sc_convert_encoding($this->edad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " edad =\"" . $this->trata_dados($this->edad) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - Estudiantes :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_estudiantes_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_estudiantes"> 
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
function calculaEdad()
{
$_SESSION['scriptcase']['grid_estudiantes']['contr_erro'] = 'on';
   
$fecha_nacimiento2  = $this->fecha_nacimiento ; 
$current_date = date('Y'); 
$Edad2 = $this->nm_data->Dif_Datas($current_date, 'aaaa', $fecha_nacimiento2 , 'aaaa'); 
$this->edad  = round($Edad2 / 365) ;


$_SESSION['scriptcase']['grid_estudiantes']['contr_erro'] = 'off';
}
}

?>
