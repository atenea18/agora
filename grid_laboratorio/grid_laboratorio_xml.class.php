<?php

class grid_laboratorio_xml
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
   function grid_laboratorio_xml()
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
      $this->Arquivo     .= "_grid_laboratorio";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_laboratorio.xml";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_laboratorio']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_laboratorio']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_laboratorio']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT students.semestre as students_semestre, students.estatus as students_estatus, students.fecha_matricula as students_fecha_matricula, students.tipo_identificacion as students_tipo_identificacion, students.numero_documento as students_numero_documento, students.genero as students_genero, students.fecha_nacimiento as students_fecha_nacimiento, students.anos_cumplidos as students_anos_cumplidos, students.telefono as students_telefono, students.etnia as students_etnia, students.email as students_email, students.zona as students_zona, students.id_sede as students_id_sede, students.id_jornada as students_id_jornada, students.id_grupo as students_id_grupo, students.primer_nombre as students_primer_nombre, students.segundo_nombre as students_segundo_nombre, students.primer_apellido as students_primer_apellido, students.segundo_apellido as students_segundo_apellido, t_grupos.nombre_grupo as t_grupos_nombre_grupo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT students.semestre as students_semestre, students.estatus as students_estatus, students.fecha_matricula as students_fecha_matricula, students.tipo_identificacion as students_tipo_identificacion, students.numero_documento as students_numero_documento, students.genero as students_genero, students.fecha_nacimiento as students_fecha_nacimiento, students.anos_cumplidos as students_anos_cumplidos, students.telefono as students_telefono, students.etnia as students_etnia, students.email as students_email, students.zona as students_zona, students.id_sede as students_id_sede, students.id_jornada as students_id_jornada, students.id_grupo as students_id_grupo, students.primer_nombre as students_primer_nombre, students.segundo_nombre as students_segundo_nombre, students.primer_apellido as students_primer_apellido, students.segundo_apellido as students_segundo_apellido, t_grupos.nombre_grupo as t_grupos_nombre_grupo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['order_grid'];
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
         $this->xml_registro = "<grid_laboratorio";
         $this->students_semestre = $rs->fields[0] ;  
         $this->students_semestre = (string)$this->students_semestre;
         $this->students_estatus = $rs->fields[1] ;  
         $this->students_fecha_matricula = $rs->fields[2] ;  
         $this->students_tipo_identificacion = $rs->fields[3] ;  
         $this->students_numero_documento = $rs->fields[4] ;  
         $this->students_genero = $rs->fields[5] ;  
         $this->students_fecha_nacimiento = $rs->fields[6] ;  
         $this->students_anos_cumplidos = $rs->fields[7] ;  
         $this->students_anos_cumplidos = (string)$this->students_anos_cumplidos;
         $this->students_telefono = $rs->fields[8] ;  
         $this->students_etnia = $rs->fields[9] ;  
         $this->students_email = $rs->fields[10] ;  
         $this->students_zona = $rs->fields[11] ;  
         $this->students_id_sede = $rs->fields[12] ;  
         $this->students_id_jornada = $rs->fields[13] ;  
         $this->students_id_jornada = (string)$this->students_id_jornada;
         $this->students_id_grupo = $rs->fields[14] ;  
         $this->students_id_grupo = (string)$this->students_id_grupo;
         $this->students_primer_nombre = $rs->fields[15] ;  
         $this->students_segundo_nombre = $rs->fields[16] ;  
         $this->students_primer_apellido = $rs->fields[17] ;  
         $this->students_segundo_apellido = $rs->fields[18] ;  
         $this->t_grupos_nombre_grupo = $rs->fields[19] ;  
         //----- lookup - students_genero
         $this->look_students_genero = $this->students_genero; 
         $this->Lookup->lookup_students_genero($this->look_students_genero); 
         $this->look_students_genero = ($this->look_students_genero == "&nbsp;") ? "" : $this->look_students_genero; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_laboratorio']['contr_erro'] = 'on';
 $this->nombre_completo =$this->students_primer_apellido .' '.$this->students_segundo_apellido .' '.$this->students_primer_nombre .' '.$this->students_segundo_nombre ;

$variable = 2;
if ($variable == 1)
{	

}

$_SESSION['scriptcase']['grid_laboratorio']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['field_order'] as $Cada_col)
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
   //----- nombre_completo
   function NM_export_nombre_completo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre_completo))
         {
             $this->nombre_completo = sc_convert_encoding($this->nombre_completo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nombre_completo =\"" . $this->trata_dados($this->nombre_completo) . "\"";
   }
   //----- students_semestre
   function NM_export_students_semestre()
   {
         nmgp_Form_Num_Val($this->students_semestre, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_semestre))
         {
             $this->students_semestre = sc_convert_encoding($this->students_semestre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_semestre =\"" . $this->trata_dados($this->students_semestre) . "\"";
   }
   //----- students_estatus
   function NM_export_students_estatus()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_estatus))
         {
             $this->students_estatus = sc_convert_encoding($this->students_estatus, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_estatus =\"" . $this->trata_dados($this->students_estatus) . "\"";
   }
   //----- students_fecha_matricula
   function NM_export_students_fecha_matricula()
   {
         $conteudo_x = $this->students_fecha_matricula;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->students_fecha_matricula, "YYYY-MM-DD");
             $this->students_fecha_matricula = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_fecha_matricula))
         {
             $this->students_fecha_matricula = sc_convert_encoding($this->students_fecha_matricula, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_fecha_matricula =\"" . $this->trata_dados($this->students_fecha_matricula) . "\"";
   }
   //----- students_tipo_identificacion
   function NM_export_students_tipo_identificacion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_tipo_identificacion))
         {
             $this->students_tipo_identificacion = sc_convert_encoding($this->students_tipo_identificacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_tipo_identificacion =\"" . $this->trata_dados($this->students_tipo_identificacion) . "\"";
   }
   //----- students_numero_documento
   function NM_export_students_numero_documento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_numero_documento))
         {
             $this->students_numero_documento = sc_convert_encoding($this->students_numero_documento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_numero_documento =\"" . $this->trata_dados($this->students_numero_documento) . "\"";
   }
   //----- students_genero
   function NM_export_students_genero()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_students_genero))
         {
             $this->look_students_genero = sc_convert_encoding($this->look_students_genero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_genero =\"" . $this->trata_dados($this->look_students_genero) . "\"";
   }
   //----- students_fecha_nacimiento
   function NM_export_students_fecha_nacimiento()
   {
         $conteudo_x = $this->students_fecha_nacimiento;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->students_fecha_nacimiento, "YYYY-MM-DD");
             $this->students_fecha_nacimiento = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_fecha_nacimiento))
         {
             $this->students_fecha_nacimiento = sc_convert_encoding($this->students_fecha_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_fecha_nacimiento =\"" . $this->trata_dados($this->students_fecha_nacimiento) . "\"";
   }
   //----- students_anos_cumplidos
   function NM_export_students_anos_cumplidos()
   {
         nmgp_Form_Num_Val($this->students_anos_cumplidos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_anos_cumplidos))
         {
             $this->students_anos_cumplidos = sc_convert_encoding($this->students_anos_cumplidos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_anos_cumplidos =\"" . $this->trata_dados($this->students_anos_cumplidos) . "\"";
   }
   //----- students_telefono
   function NM_export_students_telefono()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_telefono))
         {
             $this->students_telefono = sc_convert_encoding($this->students_telefono, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_telefono =\"" . $this->trata_dados($this->students_telefono) . "\"";
   }
   //----- students_etnia
   function NM_export_students_etnia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_etnia))
         {
             $this->students_etnia = sc_convert_encoding($this->students_etnia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_etnia =\"" . $this->trata_dados($this->students_etnia) . "\"";
   }
   //----- students_email
   function NM_export_students_email()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_email))
         {
             $this->students_email = sc_convert_encoding($this->students_email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_email =\"" . $this->trata_dados($this->students_email) . "\"";
   }
   //----- students_zona
   function NM_export_students_zona()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_zona))
         {
             $this->students_zona = sc_convert_encoding($this->students_zona, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_zona =\"" . $this->trata_dados($this->students_zona) . "\"";
   }
   //----- campo_vac_1
   function NM_export_campo_vac_1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_vac_1))
         {
             $this->campo_vac_1 = sc_convert_encoding($this->campo_vac_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " campo_vac_1 =\"" . $this->trata_dados($this->campo_vac_1) . "\"";
   }
   //----- campo_vac_2
   function NM_export_campo_vac_2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_vac_2))
         {
             $this->campo_vac_2 = sc_convert_encoding($this->campo_vac_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " campo_vac_2 =\"" . $this->trata_dados($this->campo_vac_2) . "\"";
   }
   //----- campo_vac_3
   function NM_export_campo_vac_3()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_vac_3))
         {
             $this->campo_vac_3 = sc_convert_encoding($this->campo_vac_3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " campo_vac_3 =\"" . $this->trata_dados($this->campo_vac_3) . "\"";
   }
   //----- campo_vac_4
   function NM_export_campo_vac_4()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_vac_4))
         {
             $this->campo_vac_4 = sc_convert_encoding($this->campo_vac_4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " campo_vac_4 =\"" . $this->trata_dados($this->campo_vac_4) . "\"";
   }
   //----- campo_vac_5
   function NM_export_campo_vac_5()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_vac_5))
         {
             $this->campo_vac_5 = sc_convert_encoding($this->campo_vac_5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " campo_vac_5 =\"" . $this->trata_dados($this->campo_vac_5) . "\"";
   }
   //----- campo_vac_6
   function NM_export_campo_vac_6()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_vac_6))
         {
             $this->campo_vac_6 = sc_convert_encoding($this->campo_vac_6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " campo_vac_6 =\"" . $this->trata_dados($this->campo_vac_6) . "\"";
   }
   //----- campo_vac_7
   function NM_export_campo_vac_7()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_vac_7))
         {
             $this->campo_vac_7 = sc_convert_encoding($this->campo_vac_7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " campo_vac_7 =\"" . $this->trata_dados($this->campo_vac_7) . "\"";
   }
   //----- campo_vac_8
   function NM_export_campo_vac_8()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_vac_8))
         {
             $this->campo_vac_8 = sc_convert_encoding($this->campo_vac_8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " campo_vac_8 =\"" . $this->trata_dados($this->campo_vac_8) . "\"";
   }
   //----- campo_vac_9
   function NM_export_campo_vac_9()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_vac_9))
         {
             $this->campo_vac_9 = sc_convert_encoding($this->campo_vac_9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " campo_vac_9 =\"" . $this->trata_dados($this->campo_vac_9) . "\"";
   }
   //----- campo_vac_10
   function NM_export_campo_vac_10()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_vac_10))
         {
             $this->campo_vac_10 = sc_convert_encoding($this->campo_vac_10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " campo_vac_10 =\"" . $this->trata_dados($this->campo_vac_10) . "\"";
   }
   //----- students_id_sede
   function NM_export_students_id_sede()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_id_sede))
         {
             $this->students_id_sede = sc_convert_encoding($this->students_id_sede, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_id_sede =\"" . $this->trata_dados($this->students_id_sede) . "\"";
   }
   //----- students_id_jornada
   function NM_export_students_id_jornada()
   {
         nmgp_Form_Num_Val($this->students_id_jornada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_id_jornada))
         {
             $this->students_id_jornada = sc_convert_encoding($this->students_id_jornada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_id_jornada =\"" . $this->trata_dados($this->students_id_jornada) . "\"";
   }
   //----- students_id_grupo
   function NM_export_students_id_grupo()
   {
         nmgp_Form_Num_Val($this->students_id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_id_grupo))
         {
             $this->students_id_grupo = sc_convert_encoding($this->students_id_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_id_grupo =\"" . $this->trata_dados($this->students_id_grupo) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - students :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_laboratorio_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_laboratorio"> 
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
}

?>
