<?php

class pdfreport_constacia_est_xml
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
   function pdfreport_constacia_est_xml()
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
      $this->Arquivo     .= "_pdfreport_constacia_est";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "pdfreport_constacia_est.xml";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['campos_busca'];
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
          $this->idstudents_2 = $Busca_temp['idstudents_input_2']; 
          $this->id_sede = $Busca_temp['id_sede']; 
          $tmp_pos = strpos($this->id_sede, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_sede = substr($this->id_sede, 0, $tmp_pos);
          }
          $this->id_jornada = $Busca_temp['id_jornada']; 
          $tmp_pos = strpos($this->id_jornada, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_jornada = substr($this->id_jornada, 0, $tmp_pos);
          }
          $this->id_jornada_2 = $Busca_temp['id_jornada_input_2']; 
          $this->semestre = $Busca_temp['semestre']; 
          $tmp_pos = strpos($this->semestre, "##@@");
          if ($tmp_pos !== false)
          {
              $this->semestre = substr($this->semestre, 0, $tmp_pos);
          }
          $this->semestre_2 = $Busca_temp['semestre_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idstudents, id_sede, id_jornada, semestre, tipo_identificacion, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, grado_igreso, id_grupo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idstudents, id_sede, id_jornada, semestre, tipo_identificacion, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, grado_igreso, id_grupo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['order_grid'];
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
         $this->xml_registro = "<pdfreport_constacia_est";
         $this->idstudents = $rs->fields[0] ;  
         $this->idstudents = (string)$this->idstudents;
         $this->id_sede = $rs->fields[1] ;  
         $this->id_jornada = $rs->fields[2] ;  
         $this->id_jornada = (string)$this->id_jornada;
         $this->semestre = $rs->fields[3] ;  
         $this->semestre = (string)$this->semestre;
         $this->tipo_identificacion = $rs->fields[4] ;  
         $this->numero_documento = $rs->fields[5] ;  
         $this->primer_nombre = $rs->fields[6] ;  
         $this->segundo_nombre = $rs->fields[7] ;  
         $this->primer_apellido = $rs->fields[8] ;  
         $this->segundo_apellido = $rs->fields[9] ;  
         $this->grado_igreso = $rs->fields[10] ;  
         $this->grado_igreso = (string)$this->grado_igreso;
         $this->id_grupo = $rs->fields[11] ;  
         $this->id_grupo = (string)$this->id_grupo;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['pdfreport_constacia_est']['contr_erro'] = 'on';
if (!isset($_SESSION['entorno'])) {$_SESSION['entorno'] = "";}
if (!isset($this->sc_temp_entorno)) {$this->sc_temp_entorno = (isset($_SESSION['entorno'])) ? $_SESSION['entorno'] : "";}
  

$check_sql = "SELECT logo, iddepartamento, idmunicipio, nombre_inst, nit, direccion, telefonos, cod_dane  "
   . " FROM datos_institucion"
   . " WHERE id = 1 ";
 
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
    $this->logo  = $this->rs[0][0];
	$id_departamento =$this->rs[0][1];
    $id_municipio =$this->rs[0][2];
	$this->nombre_institucion =$this->rs[0][3];
	$this->nit =$this->rs[0][4];
	$this->direccion =$this->rs[0][5];
	$this->telefonos =$this->rs[0][6]; 
	$codigo_dane =$this->rs[0][7]; 
}
		else     
{
		     $this->logo  = '';
  }        


switch ($this->grado_igreso ) {
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
   . " WHERE id_grupo = '" .$this->id_grupo . "'";
 
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
   $nombre_grupo = $this->rs[0][0];
   
}
		else     
{
		    $nombre_grupo = '';
   
}



$check_sql = "SELECT jornada"
   . " FROM jornadas"
   . " WHERE id_jornada = '" .$this->id_jornada . "'";
 
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
    $nombre_jornada = $this->rs[0][0];
   
}
		else     
{
		   $nombre_jornada = '';
   
}











$this->cadena_principal  = "Que ".$this->primer_apellido . " ".$this->segundo_apellido ." ".$this->primer_nombre ." ".$this->segundo_nombre ." identificado con ".$this->tipo_identificacion ." ".$this->numero_documento ." se encuentra matriculado en el grado ". $nombre_grado."y asiste a clases en el grupo ". $nombre_grupo . " en el calendario escolar A, año lectivo ". $this->sc_temp_entorno." , Jornada de la ".  $nombre_jornada;




$check_sql = "SELECT nombre"
   . " FROM departamento"
   . " WHERE iddepartamento = '" . $id_departamento . "'";
 
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
    $nombre_departamento = $this->rs[0][0];
   
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
    $nombre_municipio = $this->rs[0][0];
   
}
		else     
{
		    $nombre_municipio = '';
   
}

$nombre_municipio = ucwords(strtolower($nombre_municipio));
$nombre_departamento = ucwords(strtolower($nombre_departamento));


$this->cadena_secundaria  = "Para constancia se firma en ". $nombre_municipio. " (".$nombre_departamento."), el ". date('d-m-Y') ;


$this->nombre_institucion  =	$this->nombre_institucion ;
$this->nit  = "Nit: ".$this->nit ;
$this->direccion  = "Direccion: ".$this->direccion; 
$this->telefonos  ="Teléfono: ". $this->telefonos;
$this->municipio  = "Municipio: ".  $nombre_municipio;
$this->cod_dane  = "Código DANE: ". $codigo_dane;	
	
	
	
	


$check_sql = "SELECT especialidad, primera_firma, cargo_pri_firma, segunda_firma, cargo_seg_firma, encabezado, pie_pagina"
   . " FROM constancias"
   . " WHERE id_constancia = '1'";
 
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
$this->especialidad = $this->rs[0][0];
$this->primera_firma = $this->rs[0][1];
$this->cargo_pri_firma = $this->rs[0][2];
$this->segunda_firma = $this->rs[0][3];
$this->cargo_seg_firma = $this->rs[0][4];
$this->encabezado = $this->rs[0][5];
$this->pie_pagina = $this->rs[0][6];
}
		else     
{
		    $this->especialidad  = '';
            $this->primera_firma  = '';
			 $this->cargo_pri_firma  = '';
            $this->segunda_firma  = '';
			 $this->cargo_seg_firma  = '';
            $this->encabezado  = '';
			$this->pie_pagina  = '';
}
if (isset($this->sc_temp_entorno)) {$_SESSION['entorno'] = $this->sc_temp_entorno;}
$_SESSION['scriptcase']['pdfreport_constacia_est']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['field_order'] as $Cada_col)
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
   //----- idstudents
   function NM_export_idstudents()
   {
         nmgp_Form_Num_Val($this->idstudents, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->idstudents))
         {
             $this->idstudents = sc_convert_encoding($this->idstudents, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " idstudents =\"" . $this->trata_dados($this->idstudents) . "\"";
   }
   //----- id_sede
   function NM_export_id_sede()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->id_sede))
         {
             $this->id_sede = sc_convert_encoding($this->id_sede, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_sede =\"" . $this->trata_dados($this->id_sede) . "\"";
   }
   //----- id_jornada
   function NM_export_id_jornada()
   {
         nmgp_Form_Num_Val($this->id_jornada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->id_jornada))
         {
             $this->id_jornada = sc_convert_encoding($this->id_jornada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_jornada =\"" . $this->trata_dados($this->id_jornada) . "\"";
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
   //----- grado_igreso
   function NM_export_grado_igreso()
   {
         nmgp_Form_Num_Val($this->grado_igreso, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->grado_igreso))
         {
             $this->grado_igreso = sc_convert_encoding($this->grado_igreso, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " grado_igreso =\"" . $this->trata_dados($this->grado_igreso) . "\"";
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
   //----- cadena_principal
   function NM_export_cadena_principal()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cadena_principal))
         {
             $this->cadena_principal = sc_convert_encoding($this->cadena_principal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cadena_principal =\"" . $this->trata_dados($this->cadena_principal) . "\"";
   }
   //----- cadena_principal_1
   function NM_export_cadena_principal_1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cadena_principal_1))
         {
             $this->cadena_principal_1 = sc_convert_encoding($this->cadena_principal_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cadena_principal_1 =\"" . $this->trata_dados($this->cadena_principal_1) . "\"";
   }
   //----- cadena_secundaria
   function NM_export_cadena_secundaria()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cadena_secundaria))
         {
             $this->cadena_secundaria = sc_convert_encoding($this->cadena_secundaria, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cadena_secundaria =\"" . $this->trata_dados($this->cadena_secundaria) . "\"";
   }
   //----- cargo_pri_firma
   function NM_export_cargo_pri_firma()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cargo_pri_firma))
         {
             $this->cargo_pri_firma = sc_convert_encoding($this->cargo_pri_firma, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cargo_pri_firma =\"" . $this->trata_dados($this->cargo_pri_firma) . "\"";
   }
   //----- cargo_seg_firma
   function NM_export_cargo_seg_firma()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cargo_seg_firma))
         {
             $this->cargo_seg_firma = sc_convert_encoding($this->cargo_seg_firma, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cargo_seg_firma =\"" . $this->trata_dados($this->cargo_seg_firma) . "\"";
   }
   //----- cod_dane
   function NM_export_cod_dane()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cod_dane))
         {
             $this->cod_dane = sc_convert_encoding($this->cod_dane, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cod_dane =\"" . $this->trata_dados($this->cod_dane) . "\"";
   }
   //----- direccion
   function NM_export_direccion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->direccion))
         {
             $this->direccion = sc_convert_encoding($this->direccion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " direccion =\"" . $this->trata_dados($this->direccion) . "\"";
   }
   //----- encabezado
   function NM_export_encabezado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->encabezado))
         {
             $this->encabezado = sc_convert_encoding($this->encabezado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " encabezado =\"" . $this->trata_dados($this->encabezado) . "\"";
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
   //----- logo
   function NM_export_logo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->logo))
         {
             $this->logo = sc_convert_encoding($this->logo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " logo =\"" . $this->trata_dados($this->logo) . "\"";
   }
   //----- municipio
   function NM_export_municipio()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->municipio))
         {
             $this->municipio = sc_convert_encoding($this->municipio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " municipio =\"" . $this->trata_dados($this->municipio) . "\"";
   }
   //----- nit
   function NM_export_nit()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nit))
         {
             $this->nit = sc_convert_encoding($this->nit, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nit =\"" . $this->trata_dados($this->nit) . "\"";
   }
   //----- nombre_institucion
   function NM_export_nombre_institucion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre_institucion))
         {
             $this->nombre_institucion = sc_convert_encoding($this->nombre_institucion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nombre_institucion =\"" . $this->trata_dados($this->nombre_institucion) . "\"";
   }
   //----- pie_pagina
   function NM_export_pie_pagina()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->pie_pagina))
         {
             $this->pie_pagina = sc_convert_encoding($this->pie_pagina, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " pie_pagina =\"" . $this->trata_dados($this->pie_pagina) . "\"";
   }
   //----- primera_firma
   function NM_export_primera_firma()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->primera_firma))
         {
             $this->primera_firma = sc_convert_encoding($this->primera_firma, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " primera_firma =\"" . $this->trata_dados($this->primera_firma) . "\"";
   }
   //----- segunda_firma
   function NM_export_segunda_firma()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->segunda_firma))
         {
             $this->segunda_firma = sc_convert_encoding($this->segunda_firma, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " segunda_firma =\"" . $this->trata_dados($this->segunda_firma) . "\"";
   }
   //----- telefonos
   function NM_export_telefonos()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->telefonos))
         {
             $this->telefonos = sc_convert_encoding($this->telefonos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " telefonos =\"" . $this->trata_dados($this->telefonos) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - students :: XML</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_constacia_est_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_constacia_est"> 
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
