<?php

class pdfreport_grado_matricula_rtf
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
   function pdfreport_grado_matricula_rtf()
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
      $this->Arquivo   .= "_pdfreport_grado_matricula";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_grado_matricula.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['rtf_name']);
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

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['idstudents'])) ? $this->New_label['idstudents'] : "Idstudents"; 
          if ($Cada_col == "idstudents" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_sede'])) ? $this->New_label['id_sede'] : "Id Sede"; 
          if ($Cada_col == "id_sede" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_jornada'])) ? $this->New_label['id_jornada'] : "Id Jornada"; 
          if ($Cada_col == "id_jornada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['semestre'])) ? $this->New_label['semestre'] : "Semestre"; 
          if ($Cada_col == "semestre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estatus'])) ? $this->New_label['estatus'] : "Estatus"; 
          if ($Cada_col == "estatus" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_matricula'])) ? $this->New_label['fecha_matricula'] : "Fecha Matricula"; 
          if ($Cada_col == "fecha_matricula" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipo_identificacion'])) ? $this->New_label['tipo_identificacion'] : "Tipo Identificacion"; 
          if ($Cada_col == "tipo_identificacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numero_documento'])) ? $this->New_label['numero_documento'] : "Numero Documento"; 
          if ($Cada_col == "numero_documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['departanebti_expedicion'])) ? $this->New_label['departanebti_expedicion'] : "Departanebti Expedicion"; 
          if ($Cada_col == "departanebti_expedicion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['municipio_expedicion'])) ? $this->New_label['municipio_expedicion'] : "Municipio Expedicion"; 
          if ($Cada_col == "municipio_expedicion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['primer_nombre'])) ? $this->New_label['primer_nombre'] : "Primer Nombre"; 
          if ($Cada_col == "primer_nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['segundo_nombre'])) ? $this->New_label['segundo_nombre'] : "Segundo Nombre"; 
          if ($Cada_col == "segundo_nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['primer_apellido'])) ? $this->New_label['primer_apellido'] : "Primer Apellido"; 
          if ($Cada_col == "primer_apellido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['segundo_apellido'])) ? $this->New_label['segundo_apellido'] : "Segundo Apellido"; 
          if ($Cada_col == "segundo_apellido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['firstname'])) ? $this->New_label['firstname'] : "Firstname"; 
          if ($Cada_col == "firstname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['lastname'])) ? $this->New_label['lastname'] : "Lastname"; 
          if ($Cada_col == "lastname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['genero'])) ? $this->New_label['genero'] : "Genero"; 
          if ($Cada_col == "genero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_nacimiento'])) ? $this->New_label['fecha_nacimiento'] : "Fecha Nacimiento"; 
          if ($Cada_col == "fecha_nacimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anos_cumplidos'])) ? $this->New_label['anos_cumplidos'] : "Anos Cumplidos"; 
          if ($Cada_col == "anos_cumplidos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dpto_nacimiento'])) ? $this->New_label['dpto_nacimiento'] : "Dpto Nacimiento"; 
          if ($Cada_col == "dpto_nacimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['municipio_nacimiento'])) ? $this->New_label['municipio_nacimiento'] : "Municipio Nacimiento"; 
          if ($Cada_col == "municipio_nacimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['address'])) ? $this->New_label['address'] : "Address"; 
          if ($Cada_col == "address" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['barrio'])) ? $this->New_label['barrio'] : "Barrio"; 
          if ($Cada_col == "barrio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zona'])) ? $this->New_label['zona'] : "Zona"; 
          if ($Cada_col == "zona" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['city'])) ? $this->New_label['city'] : "City"; 
          if ($Cada_col == "city" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['state'])) ? $this->New_label['state'] : "State"; 
          if ($Cada_col == "state" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : "Telefono"; 
          if ($Cada_col == "telefono" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['grado_anterior'])) ? $this->New_label['grado_anterior'] : "Grado Anterior"; 
          if ($Cada_col == "grado_anterior" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['last_year'])) ? $this->New_label['last_year'] : "Last Year"; 
          if ($Cada_col == "last_year" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre_ult_plantel'])) ? $this->New_label['nombre_ult_plantel'] : "Nombre Ult Plantel"; 
          if ($Cada_col == "nombre_ult_plantel" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['resultado'])) ? $this->New_label['resultado'] : "Resultado"; 
          if ($Cada_col == "resultado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['grado_igreso'])) ? $this->New_label['grado_igreso'] : "Grado Igreso"; 
          if ($Cada_col == "grado_igreso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_nivel'])) ? $this->New_label['id_nivel'] : "Id Nivel"; 
          if ($Cada_col == "id_nivel" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['subsidado'])) ? $this->New_label['subsidado'] : "Subsidado"; 
          if ($Cada_col == "subsidado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['interno'])) ? $this->New_label['interno'] : "Interno"; 
          if ($Cada_col == "interno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_grupo'])) ? $this->New_label['id_grupo'] : "Id Grupo"; 
          if ($Cada_col == "id_grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['otro_modelo'])) ? $this->New_label['otro_modelo'] : "Otro Modelo"; 
          if ($Cada_col == "otro_modelo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['caracter'])) ? $this->New_label['caracter'] : "Caracter"; 
          if ($Cada_col == "caracter" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['especialidad'])) ? $this->New_label['especialidad'] : "Especialidad"; 
          if ($Cada_col == "especialidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anyo_mat'])) ? $this->New_label['anyo_mat'] : "anyo_mat"; 
          if ($Cada_col == "anyo_mat" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anyo_nacimiento'])) ? $this->New_label['anyo_nacimiento'] : "anyo_nacimiento"; 
          if ($Cada_col == "anyo_nacimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['aprobado'])) ? $this->New_label['aprobado'] : "aprobado"; 
          if ($Cada_col == "aprobado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['caracter_acad'])) ? $this->New_label['caracter_acad'] : "caracter_acad"; 
          if ($Cada_col == "caracter_acad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['caracter_tec'])) ? $this->New_label['caracter_tec'] : "caracter_tec"; 
          if ($Cada_col == "caracter_tec" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cero'])) ? $this->New_label['cero'] : "cero"; 
          if ($Cada_col == "cero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cinco'])) ? $this->New_label['cinco'] : "cinco"; 
          if ($Cada_col == "cinco" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['continuidad'])) ? $this->New_label['continuidad'] : "continuidad"; 
          if ($Cada_col == "continuidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cuatro'])) ? $this->New_label['cuatro'] : "cuatro"; 
          if ($Cada_col == "cuatro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['desertor'])) ? $this->New_label['desertor'] : "desertor"; 
          if ($Cada_col == "desertor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dia_mat'])) ? $this->New_label['dia_mat'] : "dia_mat"; 
          if ($Cada_col == "dia_mat" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dia_nacimiento'])) ? $this->New_label['dia_nacimiento'] : "dia_nacimiento"; 
          if ($Cada_col == "dia_nacimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['diez'])) ? $this->New_label['diez'] : "diez"; 
          if ($Cada_col == "diez" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['directtor_grupo'])) ? $this->New_label['directtor_grupo'] : "directtor_grupo"; 
          if ($Cada_col == "directtor_grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['documento_docente_dg'])) ? $this->New_label['documento_docente_dg'] : "documento_docente_dg"; 
          if ($Cada_col == "documento_docente_dg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dos'])) ? $this->New_label['dos'] : "dos"; 
          if ($Cada_col == "dos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['esp_agropec'])) ? $this->New_label['esp_agropec'] : "esp_agropec"; 
          if ($Cada_col == "esp_agropec" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['esp_comercial'])) ? $this->New_label['esp_comercial'] : "esp_comercial"; 
          if ($Cada_col == "esp_comercial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['esp_normalista'])) ? $this->New_label['esp_normalista'] : "esp_normalista"; 
          if ($Cada_col == "esp_normalista" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['esp_turismo'])) ? $this->New_label['esp_turismo'] : "esp_turismo"; 
          if ($Cada_col == "esp_turismo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['est_educativo'])) ? $this->New_label['est_educativo'] : "est_educativo"; 
          if ($Cada_col == "est_educativo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['gen_femenino'])) ? $this->New_label['gen_femenino'] : "gen_femenino"; 
          if ($Cada_col == "gen_femenino" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['gen_masculino'])) ? $this->New_label['gen_masculino'] : "gen_masculino"; 
          if ($Cada_col == "gen_masculino" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idmunicipio'])) ? $this->New_label['idmunicipio'] : "idmunicipio"; 
          if ($Cada_col == "idmunicipio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['institucion_educ'])) ? $this->New_label['institucion_educ'] : "institucion_educ"; 
          if ($Cada_col == "institucion_educ" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['interno_no'])) ? $this->New_label['interno_no'] : "interno_no"; 
          if ($Cada_col == "interno_no" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['interno_si'])) ? $this->New_label['interno_si'] : "interno_si"; 
          if ($Cada_col == "interno_si" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['logo'])) ? $this->New_label['logo'] : "logo"; 
          if ($Cada_col == "logo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['mes_mat'])) ? $this->New_label['mes_mat'] : "mes_mat"; 
          if ($Cada_col == "mes_mat" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['mes_nacimiento'])) ? $this->New_label['mes_nacimiento'] : "mes_nacimiento"; 
          if ($Cada_col == "mes_nacimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['n_basica_prim'])) ? $this->New_label['n_basica_prim'] : "n_basica_prim"; 
          if ($Cada_col == "n_basica_prim" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['n_basica_secund'])) ? $this->New_label['n_basica_secund'] : "n_basica_secund"; 
          if ($Cada_col == "n_basica_secund" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['n_preescolar'])) ? $this->New_label['n_preescolar'] : "n_preescolar"; 
          if ($Cada_col == "n_preescolar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre_docente_dg'])) ? $this->New_label['nombre_docente_dg'] : "nombre_docente_dg"; 
          if ($Cada_col == "nombre_docente_dg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nueve'])) ? $this->New_label['nueve'] : "nueve"; 
          if ($Cada_col == "nueve" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nuevo'])) ? $this->New_label['nuevo'] : "nuevo"; 
          if ($Cada_col == "nuevo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ocho'])) ? $this->New_label['ocho'] : "ocho"; 
          if ($Cada_col == "ocho" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['once'])) ? $this->New_label['once'] : "once"; 
          if ($Cada_col == "once" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['otro_modelo_aceleracion'])) ? $this->New_label['otro_modelo_aceleracion'] : "otro_modelo_aceleracion"; 
          if ($Cada_col == "otro_modelo_aceleracion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['otro_modelo_n1'])) ? $this->New_label['otro_modelo_n1'] : "otro_modelo_n1"; 
          if ($Cada_col == "otro_modelo_n1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['otro_modelo_n2'])) ? $this->New_label['otro_modelo_n2'] : "otro_modelo_n2"; 
          if ($Cada_col == "otro_modelo_n2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['reprobado'])) ? $this->New_label['reprobado'] : "reprobado"; 
          if ($Cada_col == "reprobado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['seis'])) ? $this->New_label['seis'] : "seis"; 
          if ($Cada_col == "seis" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['siete'])) ? $this->New_label['siete'] : "siete"; 
          if ($Cada_col == "siete" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['subsidio_no'])) ? $this->New_label['subsidio_no'] : "subsidio_no"; 
          if ($Cada_col == "subsidio_no" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['subsidio_si'])) ? $this->New_label['subsidio_si'] : "subsidio_si"; 
          if ($Cada_col == "subsidio_si" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ti_cc'])) ? $this->New_label['ti_cc'] : "ti_cc"; 
          if ($Cada_col == "ti_cc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ti_ce'])) ? $this->New_label['ti_ce'] : "ti_ce"; 
          if ($Cada_col == "ti_ce" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ti_rc'])) ? $this->New_label['ti_rc'] : "ti_rc"; 
          if ($Cada_col == "ti_rc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ti_ti'])) ? $this->New_label['ti_ti'] : "ti_ti"; 
          if ($Cada_col == "ti_ti" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tres'])) ? $this->New_label['tres'] : "tres"; 
          if ($Cada_col == "tres" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['uno'])) ? $this->New_label['uno'] : "uno"; 
          if ($Cada_col == "uno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zona_rural'])) ? $this->New_label['zona_rural'] : "zona_rural"; 
          if ($Cada_col == "zona_rural" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zona_urbana'])) ? $this->New_label['zona_urbana'] : "zona_urbana"; 
          if ($Cada_col == "zona_urbana" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- idstudents
   function NM_export_idstudents()
   {
         nmgp_Form_Num_Val($this->idstudents, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->idstudents))
         {
             $this->idstudents = sc_convert_encoding($this->idstudents, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->idstudents = str_replace('<', '&lt;', $this->idstudents);
         $this->idstudents = str_replace('>', '&gt;', $this->idstudents);
         $this->Texto_tag .= "<td>" . $this->idstudents . "</td>\r\n";
   }
   //----- id_sede
   function NM_export_id_sede()
   {
         $this->look_id_sede = html_entity_decode($this->look_id_sede, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->look_id_sede))
         {
             $this->look_id_sede = sc_convert_encoding($this->look_id_sede, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_id_sede = str_replace('<', '&lt;', $this->look_id_sede);
         $this->look_id_sede = str_replace('>', '&gt;', $this->look_id_sede);
         $this->Texto_tag .= "<td>" . $this->look_id_sede . "</td>\r\n";
   }
   //----- id_jornada
   function NM_export_id_jornada()
   {
         nmgp_Form_Num_Val($this->look_id_jornada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_id_jornada))
         {
             $this->look_id_jornada = sc_convert_encoding($this->look_id_jornada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_id_jornada = str_replace('<', '&lt;', $this->look_id_jornada);
         $this->look_id_jornada = str_replace('>', '&gt;', $this->look_id_jornada);
         $this->Texto_tag .= "<td>" . $this->look_id_jornada . "</td>\r\n";
   }
   //----- semestre
   function NM_export_semestre()
   {
         nmgp_Form_Num_Val($this->semestre, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->semestre))
         {
             $this->semestre = sc_convert_encoding($this->semestre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->semestre = str_replace('<', '&lt;', $this->semestre);
         $this->semestre = str_replace('>', '&gt;', $this->semestre);
         $this->Texto_tag .= "<td>" . $this->semestre . "</td>\r\n";
   }
   //----- estatus
   function NM_export_estatus()
   {
         $this->estatus = html_entity_decode($this->estatus, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->estatus = strip_tags($this->estatus);
         if (!NM_is_utf8($this->estatus))
         {
             $this->estatus = sc_convert_encoding($this->estatus, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->estatus = str_replace('<', '&lt;', $this->estatus);
         $this->estatus = str_replace('>', '&gt;', $this->estatus);
         $this->Texto_tag .= "<td>" . $this->estatus . "</td>\r\n";
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
         if (!NM_is_utf8($this->fecha_matricula))
         {
             $this->fecha_matricula = sc_convert_encoding($this->fecha_matricula, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fecha_matricula = str_replace('<', '&lt;', $this->fecha_matricula);
         $this->fecha_matricula = str_replace('>', '&gt;', $this->fecha_matricula);
         $this->Texto_tag .= "<td>" . $this->fecha_matricula . "</td>\r\n";
   }
   //----- tipo_identificacion
   function NM_export_tipo_identificacion()
   {
         $this->tipo_identificacion = html_entity_decode($this->tipo_identificacion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo_identificacion = strip_tags($this->tipo_identificacion);
         if (!NM_is_utf8($this->tipo_identificacion))
         {
             $this->tipo_identificacion = sc_convert_encoding($this->tipo_identificacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tipo_identificacion = str_replace('<', '&lt;', $this->tipo_identificacion);
         $this->tipo_identificacion = str_replace('>', '&gt;', $this->tipo_identificacion);
         $this->Texto_tag .= "<td>" . $this->tipo_identificacion . "</td>\r\n";
   }
   //----- numero_documento
   function NM_export_numero_documento()
   {
         $this->numero_documento = html_entity_decode($this->numero_documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numero_documento = strip_tags($this->numero_documento);
         if (!NM_is_utf8($this->numero_documento))
         {
             $this->numero_documento = sc_convert_encoding($this->numero_documento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->numero_documento = str_replace('<', '&lt;', $this->numero_documento);
         $this->numero_documento = str_replace('>', '&gt;', $this->numero_documento);
         $this->Texto_tag .= "<td>" . $this->numero_documento . "</td>\r\n";
   }
   //----- departanebti_expedicion
   function NM_export_departanebti_expedicion()
   {
         nmgp_Form_Num_Val($this->look_departanebti_expedicion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_departanebti_expedicion))
         {
             $this->look_departanebti_expedicion = sc_convert_encoding($this->look_departanebti_expedicion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_departanebti_expedicion = str_replace('<', '&lt;', $this->look_departanebti_expedicion);
         $this->look_departanebti_expedicion = str_replace('>', '&gt;', $this->look_departanebti_expedicion);
         $this->Texto_tag .= "<td>" . $this->look_departanebti_expedicion . "</td>\r\n";
   }
   //----- municipio_expedicion
   function NM_export_municipio_expedicion()
   {
         nmgp_Form_Num_Val($this->look_municipio_expedicion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_municipio_expedicion))
         {
             $this->look_municipio_expedicion = sc_convert_encoding($this->look_municipio_expedicion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_municipio_expedicion = str_replace('<', '&lt;', $this->look_municipio_expedicion);
         $this->look_municipio_expedicion = str_replace('>', '&gt;', $this->look_municipio_expedicion);
         $this->Texto_tag .= "<td>" . $this->look_municipio_expedicion . "</td>\r\n";
   }
   //----- primer_nombre
   function NM_export_primer_nombre()
   {
         $this->primer_nombre = html_entity_decode($this->primer_nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->primer_nombre = strip_tags($this->primer_nombre);
         if (!NM_is_utf8($this->primer_nombre))
         {
             $this->primer_nombre = sc_convert_encoding($this->primer_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->primer_nombre = str_replace('<', '&lt;', $this->primer_nombre);
         $this->primer_nombre = str_replace('>', '&gt;', $this->primer_nombre);
         $this->Texto_tag .= "<td>" . $this->primer_nombre . "</td>\r\n";
   }
   //----- segundo_nombre
   function NM_export_segundo_nombre()
   {
         $this->segundo_nombre = html_entity_decode($this->segundo_nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->segundo_nombre = strip_tags($this->segundo_nombre);
         if (!NM_is_utf8($this->segundo_nombre))
         {
             $this->segundo_nombre = sc_convert_encoding($this->segundo_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->segundo_nombre = str_replace('<', '&lt;', $this->segundo_nombre);
         $this->segundo_nombre = str_replace('>', '&gt;', $this->segundo_nombre);
         $this->Texto_tag .= "<td>" . $this->segundo_nombre . "</td>\r\n";
   }
   //----- primer_apellido
   function NM_export_primer_apellido()
   {
         $this->primer_apellido = html_entity_decode($this->primer_apellido, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->primer_apellido = strip_tags($this->primer_apellido);
         if (!NM_is_utf8($this->primer_apellido))
         {
             $this->primer_apellido = sc_convert_encoding($this->primer_apellido, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->primer_apellido = str_replace('<', '&lt;', $this->primer_apellido);
         $this->primer_apellido = str_replace('>', '&gt;', $this->primer_apellido);
         $this->Texto_tag .= "<td>" . $this->primer_apellido . "</td>\r\n";
   }
   //----- segundo_apellido
   function NM_export_segundo_apellido()
   {
         $this->segundo_apellido = html_entity_decode($this->segundo_apellido, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->segundo_apellido = strip_tags($this->segundo_apellido);
         if (!NM_is_utf8($this->segundo_apellido))
         {
             $this->segundo_apellido = sc_convert_encoding($this->segundo_apellido, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->segundo_apellido = str_replace('<', '&lt;', $this->segundo_apellido);
         $this->segundo_apellido = str_replace('>', '&gt;', $this->segundo_apellido);
         $this->Texto_tag .= "<td>" . $this->segundo_apellido . "</td>\r\n";
   }
   //----- firstname
   function NM_export_firstname()
   {
         $this->firstname = html_entity_decode($this->firstname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->firstname = strip_tags($this->firstname);
         if (!NM_is_utf8($this->firstname))
         {
             $this->firstname = sc_convert_encoding($this->firstname, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->firstname = str_replace('<', '&lt;', $this->firstname);
         $this->firstname = str_replace('>', '&gt;', $this->firstname);
         $this->Texto_tag .= "<td>" . $this->firstname . "</td>\r\n";
   }
   //----- lastname
   function NM_export_lastname()
   {
         $this->lastname = html_entity_decode($this->lastname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->lastname = strip_tags($this->lastname);
         if (!NM_is_utf8($this->lastname))
         {
             $this->lastname = sc_convert_encoding($this->lastname, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->lastname = str_replace('<', '&lt;', $this->lastname);
         $this->lastname = str_replace('>', '&gt;', $this->lastname);
         $this->Texto_tag .= "<td>" . $this->lastname . "</td>\r\n";
   }
   //----- genero
   function NM_export_genero()
   {
         $this->genero = html_entity_decode($this->genero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->genero = strip_tags($this->genero);
         if (!NM_is_utf8($this->genero))
         {
             $this->genero = sc_convert_encoding($this->genero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->genero = str_replace('<', '&lt;', $this->genero);
         $this->genero = str_replace('>', '&gt;', $this->genero);
         $this->Texto_tag .= "<td>" . $this->genero . "</td>\r\n";
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
         if (!NM_is_utf8($this->fecha_nacimiento))
         {
             $this->fecha_nacimiento = sc_convert_encoding($this->fecha_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->fecha_nacimiento = str_replace('<', '&lt;', $this->fecha_nacimiento);
         $this->fecha_nacimiento = str_replace('>', '&gt;', $this->fecha_nacimiento);
         $this->Texto_tag .= "<td>" . $this->fecha_nacimiento . "</td>\r\n";
   }
   //----- anos_cumplidos
   function NM_export_anos_cumplidos()
   {
         nmgp_Form_Num_Val($this->anos_cumplidos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->anos_cumplidos))
         {
             $this->anos_cumplidos = sc_convert_encoding($this->anos_cumplidos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->anos_cumplidos = str_replace('<', '&lt;', $this->anos_cumplidos);
         $this->anos_cumplidos = str_replace('>', '&gt;', $this->anos_cumplidos);
         $this->Texto_tag .= "<td>" . $this->anos_cumplidos . "</td>\r\n";
   }
   //----- dpto_nacimiento
   function NM_export_dpto_nacimiento()
   {
         nmgp_Form_Num_Val($this->look_dpto_nacimiento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_dpto_nacimiento))
         {
             $this->look_dpto_nacimiento = sc_convert_encoding($this->look_dpto_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_dpto_nacimiento = str_replace('<', '&lt;', $this->look_dpto_nacimiento);
         $this->look_dpto_nacimiento = str_replace('>', '&gt;', $this->look_dpto_nacimiento);
         $this->Texto_tag .= "<td>" . $this->look_dpto_nacimiento . "</td>\r\n";
   }
   //----- municipio_nacimiento
   function NM_export_municipio_nacimiento()
   {
         nmgp_Form_Num_Val($this->look_municipio_nacimiento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_municipio_nacimiento))
         {
             $this->look_municipio_nacimiento = sc_convert_encoding($this->look_municipio_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_municipio_nacimiento = str_replace('<', '&lt;', $this->look_municipio_nacimiento);
         $this->look_municipio_nacimiento = str_replace('>', '&gt;', $this->look_municipio_nacimiento);
         $this->Texto_tag .= "<td>" . $this->look_municipio_nacimiento . "</td>\r\n";
   }
   //----- address
   function NM_export_address()
   {
         $this->address = html_entity_decode($this->address, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->address = strip_tags($this->address);
         if (!NM_is_utf8($this->address))
         {
             $this->address = sc_convert_encoding($this->address, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->address = str_replace('<', '&lt;', $this->address);
         $this->address = str_replace('>', '&gt;', $this->address);
         $this->Texto_tag .= "<td>" . $this->address . "</td>\r\n";
   }
   //----- barrio
   function NM_export_barrio()
   {
         $this->barrio = html_entity_decode($this->barrio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->barrio = strip_tags($this->barrio);
         if (!NM_is_utf8($this->barrio))
         {
             $this->barrio = sc_convert_encoding($this->barrio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->barrio = str_replace('<', '&lt;', $this->barrio);
         $this->barrio = str_replace('>', '&gt;', $this->barrio);
         $this->Texto_tag .= "<td>" . $this->barrio . "</td>\r\n";
   }
   //----- zona
   function NM_export_zona()
   {
         $this->zona = html_entity_decode($this->zona, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->zona = strip_tags($this->zona);
         if (!NM_is_utf8($this->zona))
         {
             $this->zona = sc_convert_encoding($this->zona, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->zona = str_replace('<', '&lt;', $this->zona);
         $this->zona = str_replace('>', '&gt;', $this->zona);
         $this->Texto_tag .= "<td>" . $this->zona . "</td>\r\n";
   }
   //----- city
   function NM_export_city()
   {
         nmgp_Form_Num_Val($this->look_city, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_city))
         {
             $this->look_city = sc_convert_encoding($this->look_city, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_city = str_replace('<', '&lt;', $this->look_city);
         $this->look_city = str_replace('>', '&gt;', $this->look_city);
         $this->Texto_tag .= "<td>" . $this->look_city . "</td>\r\n";
   }
   //----- state
   function NM_export_state()
   {
         nmgp_Form_Num_Val($this->look_state, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_state))
         {
             $this->look_state = sc_convert_encoding($this->look_state, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_state = str_replace('<', '&lt;', $this->look_state);
         $this->look_state = str_replace('>', '&gt;', $this->look_state);
         $this->Texto_tag .= "<td>" . $this->look_state . "</td>\r\n";
   }
   //----- telefono
   function NM_export_telefono()
   {
         $this->telefono = html_entity_decode($this->telefono, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->telefono = strip_tags($this->telefono);
         if (!NM_is_utf8($this->telefono))
         {
             $this->telefono = sc_convert_encoding($this->telefono, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->telefono = str_replace('<', '&lt;', $this->telefono);
         $this->telefono = str_replace('>', '&gt;', $this->telefono);
         $this->Texto_tag .= "<td>" . $this->telefono . "</td>\r\n";
   }
   //----- grado_anterior
   function NM_export_grado_anterior()
   {
         nmgp_Form_Num_Val($this->look_grado_anterior, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_grado_anterior))
         {
             $this->look_grado_anterior = sc_convert_encoding($this->look_grado_anterior, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_grado_anterior = str_replace('<', '&lt;', $this->look_grado_anterior);
         $this->look_grado_anterior = str_replace('>', '&gt;', $this->look_grado_anterior);
         $this->Texto_tag .= "<td>" . $this->look_grado_anterior . "</td>\r\n";
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
         if (!NM_is_utf8($this->last_year))
         {
             $this->last_year = sc_convert_encoding($this->last_year, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->last_year = str_replace('<', '&lt;', $this->last_year);
         $this->last_year = str_replace('>', '&gt;', $this->last_year);
         $this->Texto_tag .= "<td>" . $this->last_year . "</td>\r\n";
   }
   //----- nombre_ult_plantel
   function NM_export_nombre_ult_plantel()
   {
         $this->nombre_ult_plantel = html_entity_decode($this->nombre_ult_plantel, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre_ult_plantel = strip_tags($this->nombre_ult_plantel);
         if (!NM_is_utf8($this->nombre_ult_plantel))
         {
             $this->nombre_ult_plantel = sc_convert_encoding($this->nombre_ult_plantel, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nombre_ult_plantel = str_replace('<', '&lt;', $this->nombre_ult_plantel);
         $this->nombre_ult_plantel = str_replace('>', '&gt;', $this->nombre_ult_plantel);
         $this->Texto_tag .= "<td>" . $this->nombre_ult_plantel . "</td>\r\n";
   }
   //----- resultado
   function NM_export_resultado()
   {
         $this->resultado = html_entity_decode($this->resultado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->resultado = strip_tags($this->resultado);
         if (!NM_is_utf8($this->resultado))
         {
             $this->resultado = sc_convert_encoding($this->resultado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->resultado = str_replace('<', '&lt;', $this->resultado);
         $this->resultado = str_replace('>', '&gt;', $this->resultado);
         $this->Texto_tag .= "<td>" . $this->resultado . "</td>\r\n";
   }
   //----- grado_igreso
   function NM_export_grado_igreso()
   {
         nmgp_Form_Num_Val($this->grado_igreso, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->grado_igreso))
         {
             $this->grado_igreso = sc_convert_encoding($this->grado_igreso, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->grado_igreso = str_replace('<', '&lt;', $this->grado_igreso);
         $this->grado_igreso = str_replace('>', '&gt;', $this->grado_igreso);
         $this->Texto_tag .= "<td>" . $this->grado_igreso . "</td>\r\n";
   }
   //----- id_nivel
   function NM_export_id_nivel()
   {
         nmgp_Form_Num_Val($this->id_nivel, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_nivel))
         {
             $this->id_nivel = sc_convert_encoding($this->id_nivel, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_nivel = str_replace('<', '&lt;', $this->id_nivel);
         $this->id_nivel = str_replace('>', '&gt;', $this->id_nivel);
         $this->Texto_tag .= "<td>" . $this->id_nivel . "</td>\r\n";
   }
   //----- subsidado
   function NM_export_subsidado()
   {
         $this->subsidado = html_entity_decode($this->subsidado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->subsidado = strip_tags($this->subsidado);
         if (!NM_is_utf8($this->subsidado))
         {
             $this->subsidado = sc_convert_encoding($this->subsidado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->subsidado = str_replace('<', '&lt;', $this->subsidado);
         $this->subsidado = str_replace('>', '&gt;', $this->subsidado);
         $this->Texto_tag .= "<td>" . $this->subsidado . "</td>\r\n";
   }
   //----- interno
   function NM_export_interno()
   {
         $this->interno = html_entity_decode($this->interno, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->interno = strip_tags($this->interno);
         if (!NM_is_utf8($this->interno))
         {
             $this->interno = sc_convert_encoding($this->interno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->interno = str_replace('<', '&lt;', $this->interno);
         $this->interno = str_replace('>', '&gt;', $this->interno);
         $this->Texto_tag .= "<td>" . $this->interno . "</td>\r\n";
   }
   //----- id_grupo
   function NM_export_id_grupo()
   {
         nmgp_Form_Num_Val($this->look_id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_id_grupo))
         {
             $this->look_id_grupo = sc_convert_encoding($this->look_id_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_id_grupo = str_replace('<', '&lt;', $this->look_id_grupo);
         $this->look_id_grupo = str_replace('>', '&gt;', $this->look_id_grupo);
         $this->Texto_tag .= "<td>" . $this->look_id_grupo . "</td>\r\n";
   }
   //----- otro_modelo
   function NM_export_otro_modelo()
   {
         $this->otro_modelo = html_entity_decode($this->otro_modelo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->otro_modelo = strip_tags($this->otro_modelo);
         if (!NM_is_utf8($this->otro_modelo))
         {
             $this->otro_modelo = sc_convert_encoding($this->otro_modelo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->otro_modelo = str_replace('<', '&lt;', $this->otro_modelo);
         $this->otro_modelo = str_replace('>', '&gt;', $this->otro_modelo);
         $this->Texto_tag .= "<td>" . $this->otro_modelo . "</td>\r\n";
   }
   //----- caracter
   function NM_export_caracter()
   {
         $this->caracter = html_entity_decode($this->caracter, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->caracter = strip_tags($this->caracter);
         if (!NM_is_utf8($this->caracter))
         {
             $this->caracter = sc_convert_encoding($this->caracter, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->caracter = str_replace('<', '&lt;', $this->caracter);
         $this->caracter = str_replace('>', '&gt;', $this->caracter);
         $this->Texto_tag .= "<td>" . $this->caracter . "</td>\r\n";
   }
   //----- especialidad
   function NM_export_especialidad()
   {
         $this->especialidad = html_entity_decode($this->especialidad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->especialidad = strip_tags($this->especialidad);
         if (!NM_is_utf8($this->especialidad))
         {
             $this->especialidad = sc_convert_encoding($this->especialidad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->especialidad = str_replace('<', '&lt;', $this->especialidad);
         $this->especialidad = str_replace('>', '&gt;', $this->especialidad);
         $this->Texto_tag .= "<td>" . $this->especialidad . "</td>\r\n";
   }
   //----- anyo_mat
   function NM_export_anyo_mat()
   {
         $this->anyo_mat = html_entity_decode($this->anyo_mat, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->anyo_mat = strip_tags($this->anyo_mat);
         if (!NM_is_utf8($this->anyo_mat))
         {
             $this->anyo_mat = sc_convert_encoding($this->anyo_mat, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->anyo_mat = str_replace('<', '&lt;', $this->anyo_mat);
         $this->anyo_mat = str_replace('>', '&gt;', $this->anyo_mat);
         $this->Texto_tag .= "<td>" . $this->anyo_mat . "</td>\r\n";
   }
   //----- anyo_nacimiento
   function NM_export_anyo_nacimiento()
   {
         $this->anyo_nacimiento = html_entity_decode($this->anyo_nacimiento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->anyo_nacimiento = strip_tags($this->anyo_nacimiento);
         if (!NM_is_utf8($this->anyo_nacimiento))
         {
             $this->anyo_nacimiento = sc_convert_encoding($this->anyo_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->anyo_nacimiento = str_replace('<', '&lt;', $this->anyo_nacimiento);
         $this->anyo_nacimiento = str_replace('>', '&gt;', $this->anyo_nacimiento);
         $this->Texto_tag .= "<td>" . $this->anyo_nacimiento . "</td>\r\n";
   }
   //----- aprobado
   function NM_export_aprobado()
   {
         $this->aprobado = html_entity_decode($this->aprobado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->aprobado = strip_tags($this->aprobado);
         if (!NM_is_utf8($this->aprobado))
         {
             $this->aprobado = sc_convert_encoding($this->aprobado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->aprobado = str_replace('<', '&lt;', $this->aprobado);
         $this->aprobado = str_replace('>', '&gt;', $this->aprobado);
         $this->Texto_tag .= "<td>" . $this->aprobado . "</td>\r\n";
   }
   //----- caracter_acad
   function NM_export_caracter_acad()
   {
         $this->caracter_acad = html_entity_decode($this->caracter_acad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->caracter_acad = strip_tags($this->caracter_acad);
         if (!NM_is_utf8($this->caracter_acad))
         {
             $this->caracter_acad = sc_convert_encoding($this->caracter_acad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->caracter_acad = str_replace('<', '&lt;', $this->caracter_acad);
         $this->caracter_acad = str_replace('>', '&gt;', $this->caracter_acad);
         $this->Texto_tag .= "<td>" . $this->caracter_acad . "</td>\r\n";
   }
   //----- caracter_tec
   function NM_export_caracter_tec()
   {
         $this->caracter_tec = html_entity_decode($this->caracter_tec, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->caracter_tec = strip_tags($this->caracter_tec);
         if (!NM_is_utf8($this->caracter_tec))
         {
             $this->caracter_tec = sc_convert_encoding($this->caracter_tec, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->caracter_tec = str_replace('<', '&lt;', $this->caracter_tec);
         $this->caracter_tec = str_replace('>', '&gt;', $this->caracter_tec);
         $this->Texto_tag .= "<td>" . $this->caracter_tec . "</td>\r\n";
   }
   //----- cero
   function NM_export_cero()
   {
         $this->cero = html_entity_decode($this->cero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cero = strip_tags($this->cero);
         if (!NM_is_utf8($this->cero))
         {
             $this->cero = sc_convert_encoding($this->cero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cero = str_replace('<', '&lt;', $this->cero);
         $this->cero = str_replace('>', '&gt;', $this->cero);
         $this->Texto_tag .= "<td>" . $this->cero . "</td>\r\n";
   }
   //----- cinco
   function NM_export_cinco()
   {
         $this->cinco = html_entity_decode($this->cinco, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cinco = strip_tags($this->cinco);
         if (!NM_is_utf8($this->cinco))
         {
             $this->cinco = sc_convert_encoding($this->cinco, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cinco = str_replace('<', '&lt;', $this->cinco);
         $this->cinco = str_replace('>', '&gt;', $this->cinco);
         $this->Texto_tag .= "<td>" . $this->cinco . "</td>\r\n";
   }
   //----- continuidad
   function NM_export_continuidad()
   {
         $this->continuidad = html_entity_decode($this->continuidad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->continuidad = strip_tags($this->continuidad);
         if (!NM_is_utf8($this->continuidad))
         {
             $this->continuidad = sc_convert_encoding($this->continuidad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->continuidad = str_replace('<', '&lt;', $this->continuidad);
         $this->continuidad = str_replace('>', '&gt;', $this->continuidad);
         $this->Texto_tag .= "<td>" . $this->continuidad . "</td>\r\n";
   }
   //----- cuatro
   function NM_export_cuatro()
   {
         $this->cuatro = html_entity_decode($this->cuatro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cuatro = strip_tags($this->cuatro);
         if (!NM_is_utf8($this->cuatro))
         {
             $this->cuatro = sc_convert_encoding($this->cuatro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cuatro = str_replace('<', '&lt;', $this->cuatro);
         $this->cuatro = str_replace('>', '&gt;', $this->cuatro);
         $this->Texto_tag .= "<td>" . $this->cuatro . "</td>\r\n";
   }
   //----- desertor
   function NM_export_desertor()
   {
         $this->desertor = html_entity_decode($this->desertor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->desertor = strip_tags($this->desertor);
         if (!NM_is_utf8($this->desertor))
         {
             $this->desertor = sc_convert_encoding($this->desertor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->desertor = str_replace('<', '&lt;', $this->desertor);
         $this->desertor = str_replace('>', '&gt;', $this->desertor);
         $this->Texto_tag .= "<td>" . $this->desertor . "</td>\r\n";
   }
   //----- dia_mat
   function NM_export_dia_mat()
   {
         $this->dia_mat = html_entity_decode($this->dia_mat, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->dia_mat))
         {
             $this->dia_mat = sc_convert_encoding($this->dia_mat, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dia_mat = str_replace('<', '&lt;', $this->dia_mat);
         $this->dia_mat = str_replace('>', '&gt;', $this->dia_mat);
         $this->Texto_tag .= "<td>" . $this->dia_mat . "</td>\r\n";
   }
   //----- dia_nacimiento
   function NM_export_dia_nacimiento()
   {
         $this->dia_nacimiento = html_entity_decode($this->dia_nacimiento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dia_nacimiento = strip_tags($this->dia_nacimiento);
         if (!NM_is_utf8($this->dia_nacimiento))
         {
             $this->dia_nacimiento = sc_convert_encoding($this->dia_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dia_nacimiento = str_replace('<', '&lt;', $this->dia_nacimiento);
         $this->dia_nacimiento = str_replace('>', '&gt;', $this->dia_nacimiento);
         $this->Texto_tag .= "<td>" . $this->dia_nacimiento . "</td>\r\n";
   }
   //----- diez
   function NM_export_diez()
   {
         $this->diez = html_entity_decode($this->diez, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->diez = strip_tags($this->diez);
         if (!NM_is_utf8($this->diez))
         {
             $this->diez = sc_convert_encoding($this->diez, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->diez = str_replace('<', '&lt;', $this->diez);
         $this->diez = str_replace('>', '&gt;', $this->diez);
         $this->Texto_tag .= "<td>" . $this->diez . "</td>\r\n";
   }
   //----- directtor_grupo
   function NM_export_directtor_grupo()
   {
         $this->directtor_grupo = html_entity_decode($this->directtor_grupo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->directtor_grupo = strip_tags($this->directtor_grupo);
         if (!NM_is_utf8($this->directtor_grupo))
         {
             $this->directtor_grupo = sc_convert_encoding($this->directtor_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->directtor_grupo = str_replace('<', '&lt;', $this->directtor_grupo);
         $this->directtor_grupo = str_replace('>', '&gt;', $this->directtor_grupo);
         $this->Texto_tag .= "<td>" . $this->directtor_grupo . "</td>\r\n";
   }
   //----- documento_docente_dg
   function NM_export_documento_docente_dg()
   {
         $this->documento_docente_dg = html_entity_decode($this->documento_docente_dg, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->documento_docente_dg = strip_tags($this->documento_docente_dg);
         if (!NM_is_utf8($this->documento_docente_dg))
         {
             $this->documento_docente_dg = sc_convert_encoding($this->documento_docente_dg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->documento_docente_dg = str_replace('<', '&lt;', $this->documento_docente_dg);
         $this->documento_docente_dg = str_replace('>', '&gt;', $this->documento_docente_dg);
         $this->Texto_tag .= "<td>" . $this->documento_docente_dg . "</td>\r\n";
   }
   //----- dos
   function NM_export_dos()
   {
         $this->dos = html_entity_decode($this->dos, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dos = strip_tags($this->dos);
         if (!NM_is_utf8($this->dos))
         {
             $this->dos = sc_convert_encoding($this->dos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dos = str_replace('<', '&lt;', $this->dos);
         $this->dos = str_replace('>', '&gt;', $this->dos);
         $this->Texto_tag .= "<td>" . $this->dos . "</td>\r\n";
   }
   //----- esp_agropec
   function NM_export_esp_agropec()
   {
         $this->esp_agropec = html_entity_decode($this->esp_agropec, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->esp_agropec = strip_tags($this->esp_agropec);
         if (!NM_is_utf8($this->esp_agropec))
         {
             $this->esp_agropec = sc_convert_encoding($this->esp_agropec, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->esp_agropec = str_replace('<', '&lt;', $this->esp_agropec);
         $this->esp_agropec = str_replace('>', '&gt;', $this->esp_agropec);
         $this->Texto_tag .= "<td>" . $this->esp_agropec . "</td>\r\n";
   }
   //----- esp_comercial
   function NM_export_esp_comercial()
   {
         $this->esp_comercial = html_entity_decode($this->esp_comercial, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->esp_comercial = strip_tags($this->esp_comercial);
         if (!NM_is_utf8($this->esp_comercial))
         {
             $this->esp_comercial = sc_convert_encoding($this->esp_comercial, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->esp_comercial = str_replace('<', '&lt;', $this->esp_comercial);
         $this->esp_comercial = str_replace('>', '&gt;', $this->esp_comercial);
         $this->Texto_tag .= "<td>" . $this->esp_comercial . "</td>\r\n";
   }
   //----- esp_normalista
   function NM_export_esp_normalista()
   {
         $this->esp_normalista = html_entity_decode($this->esp_normalista, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->esp_normalista = strip_tags($this->esp_normalista);
         if (!NM_is_utf8($this->esp_normalista))
         {
             $this->esp_normalista = sc_convert_encoding($this->esp_normalista, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->esp_normalista = str_replace('<', '&lt;', $this->esp_normalista);
         $this->esp_normalista = str_replace('>', '&gt;', $this->esp_normalista);
         $this->Texto_tag .= "<td>" . $this->esp_normalista . "</td>\r\n";
   }
   //----- esp_turismo
   function NM_export_esp_turismo()
   {
         $this->esp_turismo = html_entity_decode($this->esp_turismo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->esp_turismo = strip_tags($this->esp_turismo);
         if (!NM_is_utf8($this->esp_turismo))
         {
             $this->esp_turismo = sc_convert_encoding($this->esp_turismo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->esp_turismo = str_replace('<', '&lt;', $this->esp_turismo);
         $this->esp_turismo = str_replace('>', '&gt;', $this->esp_turismo);
         $this->Texto_tag .= "<td>" . $this->esp_turismo . "</td>\r\n";
   }
   //----- est_educativo
   function NM_export_est_educativo()
   {
         $this->est_educativo = html_entity_decode($this->est_educativo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->est_educativo = strip_tags($this->est_educativo);
         if (!NM_is_utf8($this->est_educativo))
         {
             $this->est_educativo = sc_convert_encoding($this->est_educativo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->est_educativo = str_replace('<', '&lt;', $this->est_educativo);
         $this->est_educativo = str_replace('>', '&gt;', $this->est_educativo);
         $this->Texto_tag .= "<td>" . $this->est_educativo . "</td>\r\n";
   }
   //----- gen_femenino
   function NM_export_gen_femenino()
   {
         $this->gen_femenino = html_entity_decode($this->gen_femenino, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->gen_femenino = strip_tags($this->gen_femenino);
         if (!NM_is_utf8($this->gen_femenino))
         {
             $this->gen_femenino = sc_convert_encoding($this->gen_femenino, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->gen_femenino = str_replace('<', '&lt;', $this->gen_femenino);
         $this->gen_femenino = str_replace('>', '&gt;', $this->gen_femenino);
         $this->Texto_tag .= "<td>" . $this->gen_femenino . "</td>\r\n";
   }
   //----- gen_masculino
   function NM_export_gen_masculino()
   {
         $this->gen_masculino = html_entity_decode($this->gen_masculino, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->gen_masculino = strip_tags($this->gen_masculino);
         if (!NM_is_utf8($this->gen_masculino))
         {
             $this->gen_masculino = sc_convert_encoding($this->gen_masculino, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->gen_masculino = str_replace('<', '&lt;', $this->gen_masculino);
         $this->gen_masculino = str_replace('>', '&gt;', $this->gen_masculino);
         $this->Texto_tag .= "<td>" . $this->gen_masculino . "</td>\r\n";
   }
   //----- idmunicipio
   function NM_export_idmunicipio()
   {
         nmgp_Form_Num_Val($this->look_idmunicipio, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_idmunicipio))
         {
             $this->look_idmunicipio = sc_convert_encoding($this->look_idmunicipio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idmunicipio = str_replace('<', '&lt;', $this->look_idmunicipio);
         $this->look_idmunicipio = str_replace('>', '&gt;', $this->look_idmunicipio);
         $this->Texto_tag .= "<td>" . $this->look_idmunicipio . "</td>\r\n";
   }
   //----- institucion_educ
   function NM_export_institucion_educ()
   {
         $this->institucion_educ = html_entity_decode($this->institucion_educ, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->institucion_educ = strip_tags($this->institucion_educ);
         if (!NM_is_utf8($this->institucion_educ))
         {
             $this->institucion_educ = sc_convert_encoding($this->institucion_educ, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->institucion_educ = str_replace('<', '&lt;', $this->institucion_educ);
         $this->institucion_educ = str_replace('>', '&gt;', $this->institucion_educ);
         $this->Texto_tag .= "<td>" . $this->institucion_educ . "</td>\r\n";
   }
   //----- interno_no
   function NM_export_interno_no()
   {
         $this->interno_no = html_entity_decode($this->interno_no, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->interno_no))
         {
             $this->interno_no = sc_convert_encoding($this->interno_no, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->interno_no = str_replace('<', '&lt;', $this->interno_no);
         $this->interno_no = str_replace('>', '&gt;', $this->interno_no);
         $this->Texto_tag .= "<td>" . $this->interno_no . "</td>\r\n";
   }
   //----- interno_si
   function NM_export_interno_si()
   {
         $this->interno_si = html_entity_decode($this->interno_si, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->interno_si = strip_tags($this->interno_si);
         if (!NM_is_utf8($this->interno_si))
         {
             $this->interno_si = sc_convert_encoding($this->interno_si, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->interno_si = str_replace('<', '&lt;', $this->interno_si);
         $this->interno_si = str_replace('>', '&gt;', $this->interno_si);
         $this->Texto_tag .= "<td>" . $this->interno_si . "</td>\r\n";
   }
   //----- logo
   function NM_export_logo()
   {
         if (!NM_is_utf8($this->logo))
         {
             $this->logo = sc_convert_encoding($this->logo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->logo = str_replace('<', '&lt;', $this->logo);
         $this->logo = str_replace('>', '&gt;', $this->logo);
         $this->Texto_tag .= "<td>" . $this->logo . "</td>\r\n";
   }
   //----- mes_mat
   function NM_export_mes_mat()
   {
         $this->mes_mat = html_entity_decode($this->mes_mat, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->mes_mat = strip_tags($this->mes_mat);
         if (!NM_is_utf8($this->mes_mat))
         {
             $this->mes_mat = sc_convert_encoding($this->mes_mat, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->mes_mat = str_replace('<', '&lt;', $this->mes_mat);
         $this->mes_mat = str_replace('>', '&gt;', $this->mes_mat);
         $this->Texto_tag .= "<td>" . $this->mes_mat . "</td>\r\n";
   }
   //----- mes_nacimiento
   function NM_export_mes_nacimiento()
   {
         $this->mes_nacimiento = html_entity_decode($this->mes_nacimiento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->mes_nacimiento = strip_tags($this->mes_nacimiento);
         if (!NM_is_utf8($this->mes_nacimiento))
         {
             $this->mes_nacimiento = sc_convert_encoding($this->mes_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->mes_nacimiento = str_replace('<', '&lt;', $this->mes_nacimiento);
         $this->mes_nacimiento = str_replace('>', '&gt;', $this->mes_nacimiento);
         $this->Texto_tag .= "<td>" . $this->mes_nacimiento . "</td>\r\n";
   }
   //----- n_basica_prim
   function NM_export_n_basica_prim()
   {
         $this->n_basica_prim = html_entity_decode($this->n_basica_prim, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->n_basica_prim = strip_tags($this->n_basica_prim);
         if (!NM_is_utf8($this->n_basica_prim))
         {
             $this->n_basica_prim = sc_convert_encoding($this->n_basica_prim, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->n_basica_prim = str_replace('<', '&lt;', $this->n_basica_prim);
         $this->n_basica_prim = str_replace('>', '&gt;', $this->n_basica_prim);
         $this->Texto_tag .= "<td>" . $this->n_basica_prim . "</td>\r\n";
   }
   //----- n_basica_secund
   function NM_export_n_basica_secund()
   {
         $this->n_basica_secund = html_entity_decode($this->n_basica_secund, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->n_basica_secund = strip_tags($this->n_basica_secund);
         if (!NM_is_utf8($this->n_basica_secund))
         {
             $this->n_basica_secund = sc_convert_encoding($this->n_basica_secund, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->n_basica_secund = str_replace('<', '&lt;', $this->n_basica_secund);
         $this->n_basica_secund = str_replace('>', '&gt;', $this->n_basica_secund);
         $this->Texto_tag .= "<td>" . $this->n_basica_secund . "</td>\r\n";
   }
   //----- n_preescolar
   function NM_export_n_preescolar()
   {
         $this->n_preescolar = html_entity_decode($this->n_preescolar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->n_preescolar = strip_tags($this->n_preescolar);
         if (!NM_is_utf8($this->n_preescolar))
         {
             $this->n_preescolar = sc_convert_encoding($this->n_preescolar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->n_preescolar = str_replace('<', '&lt;', $this->n_preescolar);
         $this->n_preescolar = str_replace('>', '&gt;', $this->n_preescolar);
         $this->Texto_tag .= "<td>" . $this->n_preescolar . "</td>\r\n";
   }
   //----- nombre_docente_dg
   function NM_export_nombre_docente_dg()
   {
         $this->nombre_docente_dg = html_entity_decode($this->nombre_docente_dg, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre_docente_dg = strip_tags($this->nombre_docente_dg);
         if (!NM_is_utf8($this->nombre_docente_dg))
         {
             $this->nombre_docente_dg = sc_convert_encoding($this->nombre_docente_dg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nombre_docente_dg = str_replace('<', '&lt;', $this->nombre_docente_dg);
         $this->nombre_docente_dg = str_replace('>', '&gt;', $this->nombre_docente_dg);
         $this->Texto_tag .= "<td>" . $this->nombre_docente_dg . "</td>\r\n";
   }
   //----- nueve
   function NM_export_nueve()
   {
         $this->nueve = html_entity_decode($this->nueve, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nueve = strip_tags($this->nueve);
         if (!NM_is_utf8($this->nueve))
         {
             $this->nueve = sc_convert_encoding($this->nueve, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nueve = str_replace('<', '&lt;', $this->nueve);
         $this->nueve = str_replace('>', '&gt;', $this->nueve);
         $this->Texto_tag .= "<td>" . $this->nueve . "</td>\r\n";
   }
   //----- nuevo
   function NM_export_nuevo()
   {
         $this->nuevo = html_entity_decode($this->nuevo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nuevo = strip_tags($this->nuevo);
         if (!NM_is_utf8($this->nuevo))
         {
             $this->nuevo = sc_convert_encoding($this->nuevo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nuevo = str_replace('<', '&lt;', $this->nuevo);
         $this->nuevo = str_replace('>', '&gt;', $this->nuevo);
         $this->Texto_tag .= "<td>" . $this->nuevo . "</td>\r\n";
   }
   //----- ocho
   function NM_export_ocho()
   {
         $this->ocho = html_entity_decode($this->ocho, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ocho = strip_tags($this->ocho);
         if (!NM_is_utf8($this->ocho))
         {
             $this->ocho = sc_convert_encoding($this->ocho, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ocho = str_replace('<', '&lt;', $this->ocho);
         $this->ocho = str_replace('>', '&gt;', $this->ocho);
         $this->Texto_tag .= "<td>" . $this->ocho . "</td>\r\n";
   }
   //----- once
   function NM_export_once()
   {
         $this->once = html_entity_decode($this->once, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->once = strip_tags($this->once);
         if (!NM_is_utf8($this->once))
         {
             $this->once = sc_convert_encoding($this->once, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->once = str_replace('<', '&lt;', $this->once);
         $this->once = str_replace('>', '&gt;', $this->once);
         $this->Texto_tag .= "<td>" . $this->once . "</td>\r\n";
   }
   //----- otro_modelo_aceleracion
   function NM_export_otro_modelo_aceleracion()
   {
         $this->otro_modelo_aceleracion = html_entity_decode($this->otro_modelo_aceleracion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->otro_modelo_aceleracion = strip_tags($this->otro_modelo_aceleracion);
         if (!NM_is_utf8($this->otro_modelo_aceleracion))
         {
             $this->otro_modelo_aceleracion = sc_convert_encoding($this->otro_modelo_aceleracion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->otro_modelo_aceleracion = str_replace('<', '&lt;', $this->otro_modelo_aceleracion);
         $this->otro_modelo_aceleracion = str_replace('>', '&gt;', $this->otro_modelo_aceleracion);
         $this->Texto_tag .= "<td>" . $this->otro_modelo_aceleracion . "</td>\r\n";
   }
   //----- otro_modelo_n1
   function NM_export_otro_modelo_n1()
   {
         $this->otro_modelo_n1 = html_entity_decode($this->otro_modelo_n1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->otro_modelo_n1 = strip_tags($this->otro_modelo_n1);
         if (!NM_is_utf8($this->otro_modelo_n1))
         {
             $this->otro_modelo_n1 = sc_convert_encoding($this->otro_modelo_n1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->otro_modelo_n1 = str_replace('<', '&lt;', $this->otro_modelo_n1);
         $this->otro_modelo_n1 = str_replace('>', '&gt;', $this->otro_modelo_n1);
         $this->Texto_tag .= "<td>" . $this->otro_modelo_n1 . "</td>\r\n";
   }
   //----- otro_modelo_n2
   function NM_export_otro_modelo_n2()
   {
         $this->otro_modelo_n2 = html_entity_decode($this->otro_modelo_n2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->otro_modelo_n2 = strip_tags($this->otro_modelo_n2);
         if (!NM_is_utf8($this->otro_modelo_n2))
         {
             $this->otro_modelo_n2 = sc_convert_encoding($this->otro_modelo_n2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->otro_modelo_n2 = str_replace('<', '&lt;', $this->otro_modelo_n2);
         $this->otro_modelo_n2 = str_replace('>', '&gt;', $this->otro_modelo_n2);
         $this->Texto_tag .= "<td>" . $this->otro_modelo_n2 . "</td>\r\n";
   }
   //----- reprobado
   function NM_export_reprobado()
   {
         $this->reprobado = html_entity_decode($this->reprobado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->reprobado = strip_tags($this->reprobado);
         if (!NM_is_utf8($this->reprobado))
         {
             $this->reprobado = sc_convert_encoding($this->reprobado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->reprobado = str_replace('<', '&lt;', $this->reprobado);
         $this->reprobado = str_replace('>', '&gt;', $this->reprobado);
         $this->Texto_tag .= "<td>" . $this->reprobado . "</td>\r\n";
   }
   //----- seis
   function NM_export_seis()
   {
         $this->seis = html_entity_decode($this->seis, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->seis = strip_tags($this->seis);
         if (!NM_is_utf8($this->seis))
         {
             $this->seis = sc_convert_encoding($this->seis, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->seis = str_replace('<', '&lt;', $this->seis);
         $this->seis = str_replace('>', '&gt;', $this->seis);
         $this->Texto_tag .= "<td>" . $this->seis . "</td>\r\n";
   }
   //----- siete
   function NM_export_siete()
   {
         $this->siete = html_entity_decode($this->siete, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->siete = strip_tags($this->siete);
         if (!NM_is_utf8($this->siete))
         {
             $this->siete = sc_convert_encoding($this->siete, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->siete = str_replace('<', '&lt;', $this->siete);
         $this->siete = str_replace('>', '&gt;', $this->siete);
         $this->Texto_tag .= "<td>" . $this->siete . "</td>\r\n";
   }
   //----- subsidio_no
   function NM_export_subsidio_no()
   {
         $this->subsidio_no = html_entity_decode($this->subsidio_no, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->subsidio_no = strip_tags($this->subsidio_no);
         if (!NM_is_utf8($this->subsidio_no))
         {
             $this->subsidio_no = sc_convert_encoding($this->subsidio_no, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->subsidio_no = str_replace('<', '&lt;', $this->subsidio_no);
         $this->subsidio_no = str_replace('>', '&gt;', $this->subsidio_no);
         $this->Texto_tag .= "<td>" . $this->subsidio_no . "</td>\r\n";
   }
   //----- subsidio_si
   function NM_export_subsidio_si()
   {
         $this->subsidio_si = html_entity_decode($this->subsidio_si, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->subsidio_si = strip_tags($this->subsidio_si);
         if (!NM_is_utf8($this->subsidio_si))
         {
             $this->subsidio_si = sc_convert_encoding($this->subsidio_si, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->subsidio_si = str_replace('<', '&lt;', $this->subsidio_si);
         $this->subsidio_si = str_replace('>', '&gt;', $this->subsidio_si);
         $this->Texto_tag .= "<td>" . $this->subsidio_si . "</td>\r\n";
   }
   //----- ti_cc
   function NM_export_ti_cc()
   {
         $this->ti_cc = html_entity_decode($this->ti_cc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ti_cc = strip_tags($this->ti_cc);
         if (!NM_is_utf8($this->ti_cc))
         {
             $this->ti_cc = sc_convert_encoding($this->ti_cc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ti_cc = str_replace('<', '&lt;', $this->ti_cc);
         $this->ti_cc = str_replace('>', '&gt;', $this->ti_cc);
         $this->Texto_tag .= "<td>" . $this->ti_cc . "</td>\r\n";
   }
   //----- ti_ce
   function NM_export_ti_ce()
   {
         $this->ti_ce = html_entity_decode($this->ti_ce, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ti_ce = strip_tags($this->ti_ce);
         if (!NM_is_utf8($this->ti_ce))
         {
             $this->ti_ce = sc_convert_encoding($this->ti_ce, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ti_ce = str_replace('<', '&lt;', $this->ti_ce);
         $this->ti_ce = str_replace('>', '&gt;', $this->ti_ce);
         $this->Texto_tag .= "<td>" . $this->ti_ce . "</td>\r\n";
   }
   //----- ti_rc
   function NM_export_ti_rc()
   {
         $this->ti_rc = html_entity_decode($this->ti_rc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ti_rc = strip_tags($this->ti_rc);
         if (!NM_is_utf8($this->ti_rc))
         {
             $this->ti_rc = sc_convert_encoding($this->ti_rc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ti_rc = str_replace('<', '&lt;', $this->ti_rc);
         $this->ti_rc = str_replace('>', '&gt;', $this->ti_rc);
         $this->Texto_tag .= "<td>" . $this->ti_rc . "</td>\r\n";
   }
   //----- ti_ti
   function NM_export_ti_ti()
   {
         $this->ti_ti = html_entity_decode($this->ti_ti, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ti_ti = strip_tags($this->ti_ti);
         if (!NM_is_utf8($this->ti_ti))
         {
             $this->ti_ti = sc_convert_encoding($this->ti_ti, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ti_ti = str_replace('<', '&lt;', $this->ti_ti);
         $this->ti_ti = str_replace('>', '&gt;', $this->ti_ti);
         $this->Texto_tag .= "<td>" . $this->ti_ti . "</td>\r\n";
   }
   //----- tres
   function NM_export_tres()
   {
         $this->tres = html_entity_decode($this->tres, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tres = strip_tags($this->tres);
         if (!NM_is_utf8($this->tres))
         {
             $this->tres = sc_convert_encoding($this->tres, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tres = str_replace('<', '&lt;', $this->tres);
         $this->tres = str_replace('>', '&gt;', $this->tres);
         $this->Texto_tag .= "<td>" . $this->tres . "</td>\r\n";
   }
   //----- uno
   function NM_export_uno()
   {
         $this->uno = html_entity_decode($this->uno, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->uno = strip_tags($this->uno);
         if (!NM_is_utf8($this->uno))
         {
             $this->uno = sc_convert_encoding($this->uno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->uno = str_replace('<', '&lt;', $this->uno);
         $this->uno = str_replace('>', '&gt;', $this->uno);
         $this->Texto_tag .= "<td>" . $this->uno . "</td>\r\n";
   }
   //----- zona_rural
   function NM_export_zona_rural()
   {
         $this->zona_rural = html_entity_decode($this->zona_rural, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->zona_rural = strip_tags($this->zona_rural);
         if (!NM_is_utf8($this->zona_rural))
         {
             $this->zona_rural = sc_convert_encoding($this->zona_rural, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->zona_rural = str_replace('<', '&lt;', $this->zona_rural);
         $this->zona_rural = str_replace('>', '&gt;', $this->zona_rural);
         $this->Texto_tag .= "<td>" . $this->zona_rural . "</td>\r\n";
   }
   //----- zona_urbana
   function NM_export_zona_urbana()
   {
         $this->zona_urbana = html_entity_decode($this->zona_urbana, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->zona_urbana = strip_tags($this->zona_urbana);
         if (!NM_is_utf8($this->zona_urbana))
         {
             $this->zona_urbana = sc_convert_encoding($this->zona_urbana, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->zona_urbana = str_replace('<', '&lt;', $this->zona_urbana);
         $this->zona_urbana = str_replace('>', '&gt;', $this->zona_urbana);
         $this->Texto_tag .= "<td>" . $this->zona_urbana . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_grado_matricula'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - students :: RTF</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_grado_matricula_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_grado_matricula"> 
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
