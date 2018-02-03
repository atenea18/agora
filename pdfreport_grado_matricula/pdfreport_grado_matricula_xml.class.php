<?php

class pdfreport_grado_matricula_xml
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
   function pdfreport_grado_matricula_xml()
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
      $this->Arquivo     .= "_pdfreport_grado_matricula";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "pdfreport_grado_matricula.xml";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->mes_nacimiento = $Busca_temp['mes_nacimiento']; 
          $tmp_pos = strpos($this->mes_nacimiento, "##@@");
          if ($tmp_pos !== false)
          {
              $this->mes_nacimiento = substr($this->mes_nacimiento, 0, $tmp_pos);
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idstudents, id_sede, id_jornada, semestre, estatus, fecha_matricula, tipo_identificacion, numero_documento, departanebti_expedicion, municipio_expedicion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, firstname, lastname, genero, fecha_nacimiento, anos_cumplidos, dpto_nacimiento, municipio_nacimiento, address, barrio, zona, city, state, telefono, grado_anterior, last_year, nombre_ult_plantel, resultado, grado_igreso, id_nivel, subsidado, interno, id_grupo, otro_modelo, caracter, especialidad from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idstudents, id_sede, id_jornada, semestre, estatus, fecha_matricula, tipo_identificacion, numero_documento, departanebti_expedicion, municipio_expedicion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, firstname, lastname, genero, fecha_nacimiento, anos_cumplidos, dpto_nacimiento, municipio_nacimiento, address, barrio, zona, city, state, telefono, grado_anterior, last_year, nombre_ult_plantel, resultado, grado_igreso, id_nivel, subsidado, interno, id_grupo, otro_modelo, caracter, especialidad from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['order_grid'];
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
         $this->xml_registro = "<pdfreport_grado_matricula";
         $this->idstudents = $rs->fields[0] ;  
         $this->idstudents = (string)$this->idstudents;
         $this->id_sede = $rs->fields[1] ;  
         $this->id_jornada = $rs->fields[2] ;  
         $this->id_jornada = (string)$this->id_jornada;
         $this->semestre = $rs->fields[3] ;  
         $this->semestre = (string)$this->semestre;
         $this->estatus = $rs->fields[4] ;  
         $this->fecha_matricula = $rs->fields[5] ;  
         $this->tipo_identificacion = $rs->fields[6] ;  
         $this->numero_documento = $rs->fields[7] ;  
         $this->departanebti_expedicion = $rs->fields[8] ;  
         $this->departanebti_expedicion = (string)$this->departanebti_expedicion;
         $this->municipio_expedicion = $rs->fields[9] ;  
         $this->municipio_expedicion = (string)$this->municipio_expedicion;
         $this->primer_nombre = $rs->fields[10] ;  
         $this->segundo_nombre = $rs->fields[11] ;  
         $this->primer_apellido = $rs->fields[12] ;  
         $this->segundo_apellido = $rs->fields[13] ;  
         $this->firstname = $rs->fields[14] ;  
         $this->lastname = $rs->fields[15] ;  
         $this->genero = $rs->fields[16] ;  
         $this->fecha_nacimiento = $rs->fields[17] ;  
         $this->anos_cumplidos = $rs->fields[18] ;  
         $this->anos_cumplidos = (string)$this->anos_cumplidos;
         $this->dpto_nacimiento = $rs->fields[19] ;  
         $this->dpto_nacimiento = (string)$this->dpto_nacimiento;
         $this->municipio_nacimiento = $rs->fields[20] ;  
         $this->municipio_nacimiento = (string)$this->municipio_nacimiento;
         $this->address = $rs->fields[21] ;  
         $this->barrio = $rs->fields[22] ;  
         $this->zona = $rs->fields[23] ;  
         $this->city = $rs->fields[24] ;  
         $this->city = (string)$this->city;
         $this->state = $rs->fields[25] ;  
         $this->state = (string)$this->state;
         $this->telefono = $rs->fields[26] ;  
         $this->grado_anterior = $rs->fields[27] ;  
         $this->grado_anterior = (string)$this->grado_anterior;
         $this->last_year = $rs->fields[28] ;  
         $this->nombre_ult_plantel = $rs->fields[29] ;  
         $this->resultado = $rs->fields[30] ;  
         $this->grado_igreso = $rs->fields[31] ;  
         $this->grado_igreso = (string)$this->grado_igreso;
         $this->id_nivel = $rs->fields[32] ;  
         $this->id_nivel = (string)$this->id_nivel;
         $this->subsidado = $rs->fields[33] ;  
         $this->interno = $rs->fields[34] ;  
         $this->id_grupo = $rs->fields[35] ;  
         $this->id_grupo = (string)$this->id_grupo;
         $this->otro_modelo = $rs->fields[36] ;  
         $this->caracter = $rs->fields[37] ;  
         $this->especialidad = $rs->fields[38] ;  
         //----- lookup - id_sede
         $this->look_id_sede = $this->id_sede; 
         $this->Lookup->lookup_id_sede($this->look_id_sede, $this->id_sede) ; 
         $this->look_id_sede = ($this->look_id_sede == "&nbsp;") ? "" : $this->look_id_sede; 
         //----- lookup - id_jornada
         $this->look_id_jornada = $this->id_jornada; 
         $this->Lookup->lookup_id_jornada($this->look_id_jornada, $this->id_jornada) ; 
         $this->look_id_jornada = ($this->look_id_jornada == "&nbsp;") ? "" : $this->look_id_jornada; 
         //----- lookup - departanebti_expedicion
         $this->look_departanebti_expedicion = $this->departanebti_expedicion; 
         $this->Lookup->lookup_departanebti_expedicion($this->look_departanebti_expedicion, $this->departanebti_expedicion) ; 
         $this->look_departanebti_expedicion = ($this->look_departanebti_expedicion == "&nbsp;") ? "" : $this->look_departanebti_expedicion; 
         //----- lookup - municipio_expedicion
         $this->look_municipio_expedicion = $this->municipio_expedicion; 
         $this->Lookup->lookup_municipio_expedicion($this->look_municipio_expedicion, $this->municipio_expedicion) ; 
         $this->look_municipio_expedicion = ($this->look_municipio_expedicion == "&nbsp;") ? "" : $this->look_municipio_expedicion; 
         //----- lookup - dpto_nacimiento
         $this->look_dpto_nacimiento = $this->dpto_nacimiento; 
         $this->Lookup->lookup_dpto_nacimiento($this->look_dpto_nacimiento, $this->dpto_nacimiento) ; 
         $this->look_dpto_nacimiento = ($this->look_dpto_nacimiento == "&nbsp;") ? "" : $this->look_dpto_nacimiento; 
         //----- lookup - municipio_nacimiento
         $this->look_municipio_nacimiento = $this->municipio_nacimiento; 
         $this->Lookup->lookup_municipio_nacimiento($this->look_municipio_nacimiento, $this->municipio_nacimiento) ; 
         $this->look_municipio_nacimiento = ($this->look_municipio_nacimiento == "&nbsp;") ? "" : $this->look_municipio_nacimiento; 
         //----- lookup - city
         $this->look_city = $this->city; 
         $this->Lookup->lookup_city($this->look_city, $this->city) ; 
         $this->look_city = ($this->look_city == "&nbsp;") ? "" : $this->look_city; 
         //----- lookup - state
         $this->look_state = $this->state; 
         $this->Lookup->lookup_state($this->look_state, $this->state) ; 
         $this->look_state = ($this->look_state == "&nbsp;") ? "" : $this->look_state; 
         //----- lookup - grado_anterior
         $this->look_grado_anterior = $this->grado_anterior; 
         $this->Lookup->lookup_grado_anterior($this->look_grado_anterior, $this->grado_anterior) ; 
         $this->look_grado_anterior = ($this->look_grado_anterior == "&nbsp;") ? "" : $this->look_grado_anterior; 
         //----- lookup - id_grupo
         $this->look_id_grupo = $this->id_grupo; 
         $this->Lookup->lookup_id_grupo($this->look_id_grupo, $this->id_grupo) ; 
         $this->look_id_grupo = ($this->look_id_grupo == "&nbsp;") ? "" : $this->look_id_grupo; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['pdfreport_grado_matricula']['contr_erro'] = 'on';
if (!isset($_SESSION['par_nombre_institucion'])) {$_SESSION['par_nombre_institucion'] = "";}
if (!isset($this->sc_temp_par_nombre_institucion)) {$this->sc_temp_par_nombre_institucion = (isset($_SESSION['par_nombre_institucion'])) ? $_SESSION['par_nombre_institucion'] : "";}
 $this->est_educativo  =  $this->sc_temp_par_nombre_institucion;
$this->institucion_educ  = $this->sc_temp_par_nombre_institucion;

$this->dia_mat  = $this->nm_conv_data_db($this->fecha_matricula , "aaaa/mm/dd", "dd");
$this->mes_mat  = $this->nm_conv_data_db($this->fecha_matricula , "aaaa/mm/dd", "mm");
$this->anyo_mat  = $this->nm_conv_data_db($this->fecha_matricula , "aaaa/mm/dd", "aaaa");
if($this->estatus  == "C"){
$this->continuidad  = "X";
$this->nuevo  = " ";	
}elseif($this->estatus  == "N"){
$this->continuidad  = " ";
$this->nuevo  = "X";	
}

	 

$check_sql = "SELECT logo, idmunicipio "
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
    $this->idmunicipio = $this->rs[0][1];
   
}
		else     
{
		     $this->logo  = '';
             $this->idmunicipio = '';
}



$check_sql = "SELECT docentes.documento, docentes.primer_apellido, docentes.segundo_apellido, docentes.primer_nombre, docentes.segundo_nombre"
   . " FROM students
INNER JOIN t_grupos ON students.id_grupo = t_grupos.id_grupo
INNER JOIN docentes ON docentes.id_docente = t_grupos.id_director_grupo"
   . " WHERE students.id_grupo = '" . $this->id_grupo  . "'GROUP BY t_grupos.id_grupo";
 
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
$this->documento_docente_dg = $this->rs[0][0];
	
$this->nombre_docente_dg  = $this->rs[0][1].' '.$this->rs[0][2].' '.$this->rs[0][3].' '.$this->rs[0][4];
    
	
}
		else     
{
		    $this->nombre_docente_dg  = '';
          
}

switch ($this->tipo_identificacion ) {
    case "CC":
    $this->ti_cc  = "X";
    $this->ti_rc  = " ";
    $this->ti_ti  = " ";
    $this->ti_ce  = " ";
        break;
    case "CE":
    $this->ti_cc  = " ";
    $this->ti_rc  = " ";
    $this->ti_ti  = " ";
    $this->ti_ce  = "X";
        break;
    case "RC":
    $this->ti_cc  = " ";
    $this->ti_rc  = "X";
    $this->ti_ti  = " ";
    $this->ti_ce  = " ";
        break;
	case "TI":
    $this->ti_cc  = " ";
    $this->ti_rc  = " ";
    $this->ti_ti  = "X";
    $this->ti_ce  = " ";
        break;
}

switch ($this->genero ) {
    case "M":
$this->gen_masculino  = "X";
$this->gen_femenino  =" ";
        break;
    case "F":
$this->gen_masculino  = " ";
$this->gen_femenino  ="X";
        break;
   
}
$this->dia_nacimiento  = $this->nm_conv_data_db($this->fecha_nacimiento , "aaaa/mm/dd", "dd");
$this->mes_nacimiento  = $this->nm_conv_data_db($this->fecha_nacimiento , "aaaa/mm/dd", "mm");
$this->anyo_nacimiento  = $this->nm_conv_data_db($this->fecha_nacimiento , "aaaa/mm/dd", "aaaa");


switch ($this->zona ) {
    case "Rural":
$this->zona_rural  = "X";
$this->zona_urbana  =" ";
        break;
    case "Urbana":
$this->zona_rural  = " ";
$this->zona_urbana  ="X";
        break;
}

$this->nombre_ult_plantel  = str_replace("Institución Educativa", "", $this->nombre_ult_plantel );

$this->resultado ;

switch ($this->resultado ) {
    case "A":
$this->aprobado  = "X";
$this->reprobado  =" ";
$this->desertor  =" ";
        break;
    case "R":
$this->aprobado  = " ";
$this->reprobado  ="X";
$this->desertor  =" ";
        break;
	 case "D":
$this->aprobado  = " ";
$this->reprobado  =" ";
$this->desertor  ="X";
        break;
}
switch ($this->grado_igreso ) {
    case 1 :
$this->cero  = "X";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";	
        break;
	  case 2 :
$this->cero  = "X";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
	  case 3 :
$this->cero  = "X";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
	  case 4 :
$this->cero  = "X";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
    case 5:
 
$this->cero  = " ";
$this->uno  = "X";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
	 
 case 6:
$this->cero  = " ";
$this->uno  = " ";
$this->dos  ="X";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
	 
 case 7:
$this->cero  = " ";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  ="X";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
	 
 case 8:
$this->cero  = " ";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  ="X";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
	
 case 9:
$this->cero  = " ";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  ="X";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
	 
 case 10:
$this->cero  = " ";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  ="X";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
	 
 case 11:
$this->cero  = " ";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  ="X";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
	
 case 12: 
$this->cero  = " ";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  ="X";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   =" ";
        break;
	
 case 13:
$this->cero  = "";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  ="X";
$this->diez 	=" ";
$this->once   =" ";
        break;
case 14:
$this->cero  = "";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	="X";
$this->once   =" ";
        break;
case 15:
$this->cero  = "";
$this->uno  = " ";
$this->dos  =" ";
$this->tres  =" ";
$this->cuatro  =" ";
$this->cinco  =" ";
$this->seis  =" ";
$this->siete  =" ";
$this->ocho  =" ";
$this->nueve  =" ";
$this->diez 	=" ";
$this->once   ="X";
        break;
	
}


switch ($this->id_nivel ) {
    case "1":
$this->n_preescolar  = "X";
$this->n_basica_prim  =" ";
$this->n_basica_secund  =" ";	
        break;
 case "2":
$this->n_preescolar  = " ";
$this->n_basica_prim  ="X";
$this->n_basica_secund  =" ";	
        break;
 case "3":
$this->n_preescolar  = " ";
$this->n_basica_prim  =" ";
$this->n_basica_secund  ="X";	
        break;
}


switch ($this->subsidado ) {
    case "Y":
$this->subsidio_si  = "X";
$this->subsidio_no  =" ";
        break;
 case "N":
$this->subsidio_si  = " ";
$this->subsidio_no  ="X";
        break;

}


switch ($this->interno ) {
    case "Y":
$this->interno_si  = "X";
$this->interno_no  =" ";
        break;
 case "N":
$this->interno_si  = " ";
$this->interno_no  ="X";
        break;

}
switch ($this->otro_modelo ) {
    case "N1":
$this->otro_modelo_n1  = "X";
$this->otro_modelo_n2  =" ";
$this->otro_modelo_aceleracion  =" ";	
        break;
 case "N2":
$this->otro_modelo_n1  = "";
$this->otro_modelo_n2  ="X";
$this->otro_modelo_aceleracion  =" ";	
        break;
 case "AC":
$this->otro_modelo_n1  = " ";
$this->otro_modelo_n2  =" ";
$this->otro_modelo_aceleracion  ="X";	
        break;
}

switch ($this->caracter ) {
    case "A":
$this->caracter_acad  = "X";
$this->caracter_tec  =" ";
        break;
 case "T":
$this->caracter_acad  = " ";
$this->caracter_tec  ="X";
        break;
}	

switch ($this->especialidad ) {
    case "C":
$this->esp_comercial = "X";
$this->esp_agropec  = " ";
$this->esp_turismo  = " ";
$this->esp_normalista  = " ";
        break;
    case "A":
$this->esp_comercial = " ";
$this->esp_agropec  = "X";
$this->esp_turismo  = " ";
$this->esp_normalista  = " ";
        break;
    case "T":
$this->esp_comercial = " ";
$this->esp_agropec  = " ";
$this->esp_turismo  = "X";
$this->esp_normalista  = " ";
        break;
	case "N":
$this->esp_comercial = " ";
$this->esp_agropec  = " ";
$this->esp_turismo  = " ";
$this->esp_normalista  = "X";
        break;
}
if (isset($this->sc_temp_par_nombre_institucion)) {$_SESSION['par_nombre_institucion'] = $this->sc_temp_par_nombre_institucion;}
$_SESSION['scriptcase']['pdfreport_grado_matricula']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['field_order'] as $Cada_col)
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
   //----- departanebti_expedicion
   function NM_export_departanebti_expedicion()
   {
         nmgp_Form_Num_Val($this->look_departanebti_expedicion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_departanebti_expedicion))
         {
             $this->look_departanebti_expedicion = sc_convert_encoding($this->look_departanebti_expedicion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " departanebti_expedicion =\"" . $this->trata_dados($this->look_departanebti_expedicion) . "\"";
   }
   //----- municipio_expedicion
   function NM_export_municipio_expedicion()
   {
         nmgp_Form_Num_Val($this->look_municipio_expedicion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_municipio_expedicion))
         {
             $this->look_municipio_expedicion = sc_convert_encoding($this->look_municipio_expedicion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " municipio_expedicion =\"" . $this->trata_dados($this->look_municipio_expedicion) . "\"";
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
   //----- firstname
   function NM_export_firstname()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->firstname))
         {
             $this->firstname = sc_convert_encoding($this->firstname, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " firstname =\"" . $this->trata_dados($this->firstname) . "\"";
   }
   //----- lastname
   function NM_export_lastname()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->lastname))
         {
             $this->lastname = sc_convert_encoding($this->lastname, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " lastname =\"" . $this->trata_dados($this->lastname) . "\"";
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
   //----- anos_cumplidos
   function NM_export_anos_cumplidos()
   {
         nmgp_Form_Num_Val($this->anos_cumplidos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->anos_cumplidos))
         {
             $this->anos_cumplidos = sc_convert_encoding($this->anos_cumplidos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " anos_cumplidos =\"" . $this->trata_dados($this->anos_cumplidos) . "\"";
   }
   //----- dpto_nacimiento
   function NM_export_dpto_nacimiento()
   {
         nmgp_Form_Num_Val($this->look_dpto_nacimiento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_dpto_nacimiento))
         {
             $this->look_dpto_nacimiento = sc_convert_encoding($this->look_dpto_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dpto_nacimiento =\"" . $this->trata_dados($this->look_dpto_nacimiento) . "\"";
   }
   //----- municipio_nacimiento
   function NM_export_municipio_nacimiento()
   {
         nmgp_Form_Num_Val($this->look_municipio_nacimiento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_municipio_nacimiento))
         {
             $this->look_municipio_nacimiento = sc_convert_encoding($this->look_municipio_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " municipio_nacimiento =\"" . $this->trata_dados($this->look_municipio_nacimiento) . "\"";
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
   //----- city
   function NM_export_city()
   {
         nmgp_Form_Num_Val($this->look_city, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_city))
         {
             $this->look_city = sc_convert_encoding($this->look_city, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " city =\"" . $this->trata_dados($this->look_city) . "\"";
   }
   //----- state
   function NM_export_state()
   {
         nmgp_Form_Num_Val($this->look_state, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_state))
         {
             $this->look_state = sc_convert_encoding($this->look_state, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " state =\"" . $this->trata_dados($this->look_state) . "\"";
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
   //----- last_year
   function NM_export_last_year()
   {
         $conteudo_x = $this->last_year;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->last_year, "YYYY-MM-DD");
             $this->last_year = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "aaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->last_year))
         {
             $this->last_year = sc_convert_encoding($this->last_year, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " last_year =\"" . $this->trata_dados($this->last_year) . "\"";
   }
   //----- nombre_ult_plantel
   function NM_export_nombre_ult_plantel()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre_ult_plantel))
         {
             $this->nombre_ult_plantel = sc_convert_encoding($this->nombre_ult_plantel, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nombre_ult_plantel =\"" . $this->trata_dados($this->nombre_ult_plantel) . "\"";
   }
   //----- resultado
   function NM_export_resultado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->resultado))
         {
             $this->resultado = sc_convert_encoding($this->resultado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " resultado =\"" . $this->trata_dados($this->resultado) . "\"";
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
   //----- id_nivel
   function NM_export_id_nivel()
   {
         nmgp_Form_Num_Val($this->id_nivel, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->id_nivel))
         {
             $this->id_nivel = sc_convert_encoding($this->id_nivel, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_nivel =\"" . $this->trata_dados($this->id_nivel) . "\"";
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
   //----- interno
   function NM_export_interno()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->interno))
         {
             $this->interno = sc_convert_encoding($this->interno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " interno =\"" . $this->trata_dados($this->interno) . "\"";
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
   //----- otro_modelo
   function NM_export_otro_modelo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->otro_modelo))
         {
             $this->otro_modelo = sc_convert_encoding($this->otro_modelo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " otro_modelo =\"" . $this->trata_dados($this->otro_modelo) . "\"";
   }
   //----- caracter
   function NM_export_caracter()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->caracter))
         {
             $this->caracter = sc_convert_encoding($this->caracter, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " caracter =\"" . $this->trata_dados($this->caracter) . "\"";
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
   //----- anyo_mat
   function NM_export_anyo_mat()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->anyo_mat))
         {
             $this->anyo_mat = sc_convert_encoding($this->anyo_mat, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " anyo_mat =\"" . $this->trata_dados($this->anyo_mat) . "\"";
   }
   //----- anyo_nacimiento
   function NM_export_anyo_nacimiento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->anyo_nacimiento))
         {
             $this->anyo_nacimiento = sc_convert_encoding($this->anyo_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " anyo_nacimiento =\"" . $this->trata_dados($this->anyo_nacimiento) . "\"";
   }
   //----- aprobado
   function NM_export_aprobado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->aprobado))
         {
             $this->aprobado = sc_convert_encoding($this->aprobado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " aprobado =\"" . $this->trata_dados($this->aprobado) . "\"";
   }
   //----- caracter_acad
   function NM_export_caracter_acad()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->caracter_acad))
         {
             $this->caracter_acad = sc_convert_encoding($this->caracter_acad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " caracter_acad =\"" . $this->trata_dados($this->caracter_acad) . "\"";
   }
   //----- caracter_tec
   function NM_export_caracter_tec()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->caracter_tec))
         {
             $this->caracter_tec = sc_convert_encoding($this->caracter_tec, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " caracter_tec =\"" . $this->trata_dados($this->caracter_tec) . "\"";
   }
   //----- cero
   function NM_export_cero()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cero))
         {
             $this->cero = sc_convert_encoding($this->cero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cero =\"" . $this->trata_dados($this->cero) . "\"";
   }
   //----- cinco
   function NM_export_cinco()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cinco))
         {
             $this->cinco = sc_convert_encoding($this->cinco, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cinco =\"" . $this->trata_dados($this->cinco) . "\"";
   }
   //----- continuidad
   function NM_export_continuidad()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->continuidad))
         {
             $this->continuidad = sc_convert_encoding($this->continuidad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " continuidad =\"" . $this->trata_dados($this->continuidad) . "\"";
   }
   //----- cuatro
   function NM_export_cuatro()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cuatro))
         {
             $this->cuatro = sc_convert_encoding($this->cuatro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cuatro =\"" . $this->trata_dados($this->cuatro) . "\"";
   }
   //----- desertor
   function NM_export_desertor()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->desertor))
         {
             $this->desertor = sc_convert_encoding($this->desertor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " desertor =\"" . $this->trata_dados($this->desertor) . "\"";
   }
   //----- dia_mat
   function NM_export_dia_mat()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dia_mat))
         {
             $this->dia_mat = sc_convert_encoding($this->dia_mat, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dia_mat =\"" . $this->trata_dados($this->dia_mat) . "\"";
   }
   //----- dia_nacimiento
   function NM_export_dia_nacimiento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dia_nacimiento))
         {
             $this->dia_nacimiento = sc_convert_encoding($this->dia_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dia_nacimiento =\"" . $this->trata_dados($this->dia_nacimiento) . "\"";
   }
   //----- diez
   function NM_export_diez()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->diez))
         {
             $this->diez = sc_convert_encoding($this->diez, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " diez =\"" . $this->trata_dados($this->diez) . "\"";
   }
   //----- directtor_grupo
   function NM_export_directtor_grupo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->directtor_grupo))
         {
             $this->directtor_grupo = sc_convert_encoding($this->directtor_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " directtor_grupo =\"" . $this->trata_dados($this->directtor_grupo) . "\"";
   }
   //----- documento_docente_dg
   function NM_export_documento_docente_dg()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->documento_docente_dg))
         {
             $this->documento_docente_dg = sc_convert_encoding($this->documento_docente_dg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " documento_docente_dg =\"" . $this->trata_dados($this->documento_docente_dg) . "\"";
   }
   //----- dos
   function NM_export_dos()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dos))
         {
             $this->dos = sc_convert_encoding($this->dos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dos =\"" . $this->trata_dados($this->dos) . "\"";
   }
   //----- esp_agropec
   function NM_export_esp_agropec()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->esp_agropec))
         {
             $this->esp_agropec = sc_convert_encoding($this->esp_agropec, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " esp_agropec =\"" . $this->trata_dados($this->esp_agropec) . "\"";
   }
   //----- esp_comercial
   function NM_export_esp_comercial()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->esp_comercial))
         {
             $this->esp_comercial = sc_convert_encoding($this->esp_comercial, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " esp_comercial =\"" . $this->trata_dados($this->esp_comercial) . "\"";
   }
   //----- esp_normalista
   function NM_export_esp_normalista()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->esp_normalista))
         {
             $this->esp_normalista = sc_convert_encoding($this->esp_normalista, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " esp_normalista =\"" . $this->trata_dados($this->esp_normalista) . "\"";
   }
   //----- esp_turismo
   function NM_export_esp_turismo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->esp_turismo))
         {
             $this->esp_turismo = sc_convert_encoding($this->esp_turismo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " esp_turismo =\"" . $this->trata_dados($this->esp_turismo) . "\"";
   }
   //----- est_educativo
   function NM_export_est_educativo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->est_educativo))
         {
             $this->est_educativo = sc_convert_encoding($this->est_educativo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " est_educativo =\"" . $this->trata_dados($this->est_educativo) . "\"";
   }
   //----- gen_femenino
   function NM_export_gen_femenino()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->gen_femenino))
         {
             $this->gen_femenino = sc_convert_encoding($this->gen_femenino, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " gen_femenino =\"" . $this->trata_dados($this->gen_femenino) . "\"";
   }
   //----- gen_masculino
   function NM_export_gen_masculino()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->gen_masculino))
         {
             $this->gen_masculino = sc_convert_encoding($this->gen_masculino, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " gen_masculino =\"" . $this->trata_dados($this->gen_masculino) . "\"";
   }
   //----- idmunicipio
   function NM_export_idmunicipio()
   {
         nmgp_Form_Num_Val($this->look_idmunicipio, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_idmunicipio))
         {
             $this->look_idmunicipio = sc_convert_encoding($this->look_idmunicipio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " idmunicipio =\"" . $this->trata_dados($this->look_idmunicipio) . "\"";
   }
   //----- institucion_educ
   function NM_export_institucion_educ()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->institucion_educ))
         {
             $this->institucion_educ = sc_convert_encoding($this->institucion_educ, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " institucion_educ =\"" . $this->trata_dados($this->institucion_educ) . "\"";
   }
   //----- interno_no
   function NM_export_interno_no()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->interno_no))
         {
             $this->interno_no = sc_convert_encoding($this->interno_no, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " interno_no =\"" . $this->trata_dados($this->interno_no) . "\"";
   }
   //----- interno_si
   function NM_export_interno_si()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->interno_si))
         {
             $this->interno_si = sc_convert_encoding($this->interno_si, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " interno_si =\"" . $this->trata_dados($this->interno_si) . "\"";
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
   //----- mes_mat
   function NM_export_mes_mat()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->mes_mat))
         {
             $this->mes_mat = sc_convert_encoding($this->mes_mat, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " mes_mat =\"" . $this->trata_dados($this->mes_mat) . "\"";
   }
   //----- mes_nacimiento
   function NM_export_mes_nacimiento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->mes_nacimiento))
         {
             $this->mes_nacimiento = sc_convert_encoding($this->mes_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " mes_nacimiento =\"" . $this->trata_dados($this->mes_nacimiento) . "\"";
   }
   //----- n_basica_prim
   function NM_export_n_basica_prim()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->n_basica_prim))
         {
             $this->n_basica_prim = sc_convert_encoding($this->n_basica_prim, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " n_basica_prim =\"" . $this->trata_dados($this->n_basica_prim) . "\"";
   }
   //----- n_basica_secund
   function NM_export_n_basica_secund()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->n_basica_secund))
         {
             $this->n_basica_secund = sc_convert_encoding($this->n_basica_secund, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " n_basica_secund =\"" . $this->trata_dados($this->n_basica_secund) . "\"";
   }
   //----- n_preescolar
   function NM_export_n_preescolar()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->n_preescolar))
         {
             $this->n_preescolar = sc_convert_encoding($this->n_preescolar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " n_preescolar =\"" . $this->trata_dados($this->n_preescolar) . "\"";
   }
   //----- nombre_docente_dg
   function NM_export_nombre_docente_dg()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre_docente_dg))
         {
             $this->nombre_docente_dg = sc_convert_encoding($this->nombre_docente_dg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nombre_docente_dg =\"" . $this->trata_dados($this->nombre_docente_dg) . "\"";
   }
   //----- nueve
   function NM_export_nueve()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nueve))
         {
             $this->nueve = sc_convert_encoding($this->nueve, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nueve =\"" . $this->trata_dados($this->nueve) . "\"";
   }
   //----- nuevo
   function NM_export_nuevo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nuevo))
         {
             $this->nuevo = sc_convert_encoding($this->nuevo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nuevo =\"" . $this->trata_dados($this->nuevo) . "\"";
   }
   //----- ocho
   function NM_export_ocho()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ocho))
         {
             $this->ocho = sc_convert_encoding($this->ocho, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ocho =\"" . $this->trata_dados($this->ocho) . "\"";
   }
   //----- once
   function NM_export_once()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->once))
         {
             $this->once = sc_convert_encoding($this->once, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " once =\"" . $this->trata_dados($this->once) . "\"";
   }
   //----- otro_modelo_aceleracion
   function NM_export_otro_modelo_aceleracion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->otro_modelo_aceleracion))
         {
             $this->otro_modelo_aceleracion = sc_convert_encoding($this->otro_modelo_aceleracion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " otro_modelo_aceleracion =\"" . $this->trata_dados($this->otro_modelo_aceleracion) . "\"";
   }
   //----- otro_modelo_n1
   function NM_export_otro_modelo_n1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->otro_modelo_n1))
         {
             $this->otro_modelo_n1 = sc_convert_encoding($this->otro_modelo_n1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " otro_modelo_n1 =\"" . $this->trata_dados($this->otro_modelo_n1) . "\"";
   }
   //----- otro_modelo_n2
   function NM_export_otro_modelo_n2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->otro_modelo_n2))
         {
             $this->otro_modelo_n2 = sc_convert_encoding($this->otro_modelo_n2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " otro_modelo_n2 =\"" . $this->trata_dados($this->otro_modelo_n2) . "\"";
   }
   //----- reprobado
   function NM_export_reprobado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->reprobado))
         {
             $this->reprobado = sc_convert_encoding($this->reprobado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " reprobado =\"" . $this->trata_dados($this->reprobado) . "\"";
   }
   //----- seis
   function NM_export_seis()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->seis))
         {
             $this->seis = sc_convert_encoding($this->seis, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " seis =\"" . $this->trata_dados($this->seis) . "\"";
   }
   //----- siete
   function NM_export_siete()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->siete))
         {
             $this->siete = sc_convert_encoding($this->siete, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " siete =\"" . $this->trata_dados($this->siete) . "\"";
   }
   //----- subsidio_no
   function NM_export_subsidio_no()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->subsidio_no))
         {
             $this->subsidio_no = sc_convert_encoding($this->subsidio_no, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " subsidio_no =\"" . $this->trata_dados($this->subsidio_no) . "\"";
   }
   //----- subsidio_si
   function NM_export_subsidio_si()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->subsidio_si))
         {
             $this->subsidio_si = sc_convert_encoding($this->subsidio_si, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " subsidio_si =\"" . $this->trata_dados($this->subsidio_si) . "\"";
   }
   //----- ti_cc
   function NM_export_ti_cc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ti_cc))
         {
             $this->ti_cc = sc_convert_encoding($this->ti_cc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ti_cc =\"" . $this->trata_dados($this->ti_cc) . "\"";
   }
   //----- ti_ce
   function NM_export_ti_ce()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ti_ce))
         {
             $this->ti_ce = sc_convert_encoding($this->ti_ce, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ti_ce =\"" . $this->trata_dados($this->ti_ce) . "\"";
   }
   //----- ti_rc
   function NM_export_ti_rc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ti_rc))
         {
             $this->ti_rc = sc_convert_encoding($this->ti_rc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ti_rc =\"" . $this->trata_dados($this->ti_rc) . "\"";
   }
   //----- ti_ti
   function NM_export_ti_ti()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ti_ti))
         {
             $this->ti_ti = sc_convert_encoding($this->ti_ti, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ti_ti =\"" . $this->trata_dados($this->ti_ti) . "\"";
   }
   //----- tres
   function NM_export_tres()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tres))
         {
             $this->tres = sc_convert_encoding($this->tres, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tres =\"" . $this->trata_dados($this->tres) . "\"";
   }
   //----- uno
   function NM_export_uno()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->uno))
         {
             $this->uno = sc_convert_encoding($this->uno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " uno =\"" . $this->trata_dados($this->uno) . "\"";
   }
   //----- zona_rural
   function NM_export_zona_rural()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zona_rural))
         {
             $this->zona_rural = sc_convert_encoding($this->zona_rural, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " zona_rural =\"" . $this->trata_dados($this->zona_rural) . "\"";
   }
   //----- zona_urbana
   function NM_export_zona_urbana()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zona_urbana))
         {
             $this->zona_urbana = sc_convert_encoding($this->zona_urbana, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " zona_urbana =\"" . $this->trata_dados($this->zona_urbana) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="pdfreport_grado_matricula_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_grado_matricula"> 
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
