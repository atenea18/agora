<?php

class pdfreport_constacia_est_rtf
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
   function pdfreport_constacia_est_rtf()
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
      $this->Arquivo   .= "_pdfreport_constacia_est";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_constacia_est.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['rtf_name']);
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

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['field_order'] as $Cada_col)
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
          $SC_Label = (isset($this->New_label['cadena_principal'])) ? $this->New_label['cadena_principal'] : "cadena_principal"; 
          if ($Cada_col == "cadena_principal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cadena_principal_1'])) ? $this->New_label['cadena_principal_1'] : "cadena_principal_1"; 
          if ($Cada_col == "cadena_principal_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cadena_secundaria'])) ? $this->New_label['cadena_secundaria'] : "cadena_secundaria"; 
          if ($Cada_col == "cadena_secundaria" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cargo_pri_firma'])) ? $this->New_label['cargo_pri_firma'] : "cargo_pri_firma"; 
          if ($Cada_col == "cargo_pri_firma" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cargo_seg_firma'])) ? $this->New_label['cargo_seg_firma'] : "cargo_seg_firma"; 
          if ($Cada_col == "cargo_seg_firma" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cod_dane'])) ? $this->New_label['cod_dane'] : "cod_dane"; 
          if ($Cada_col == "cod_dane" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "direccion"; 
          if ($Cada_col == "direccion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['encabezado'])) ? $this->New_label['encabezado'] : "encabezado"; 
          if ($Cada_col == "encabezado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['especialidad'])) ? $this->New_label['especialidad'] : "especialidad"; 
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
          $SC_Label = (isset($this->New_label['municipio'])) ? $this->New_label['municipio'] : "municipio"; 
          if ($Cada_col == "municipio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nit'])) ? $this->New_label['nit'] : "nit"; 
          if ($Cada_col == "nit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre_institucion'])) ? $this->New_label['nombre_institucion'] : "nombre_institucion"; 
          if ($Cada_col == "nombre_institucion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pie_pagina'])) ? $this->New_label['pie_pagina'] : "pie_pagina"; 
          if ($Cada_col == "pie_pagina" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['primera_firma'])) ? $this->New_label['primera_firma'] : "primera_firma"; 
          if ($Cada_col == "primera_firma" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['segunda_firma'])) ? $this->New_label['segunda_firma'] : "segunda_firma"; 
          if ($Cada_col == "segunda_firma" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['telefonos'])) ? $this->New_label['telefonos'] : "telefonos"; 
          if ($Cada_col == "telefonos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->id_sede = html_entity_decode($this->id_sede, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->id_sede = strip_tags($this->id_sede);
         if (!NM_is_utf8($this->id_sede))
         {
             $this->id_sede = sc_convert_encoding($this->id_sede, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_sede = str_replace('<', '&lt;', $this->id_sede);
         $this->id_sede = str_replace('>', '&gt;', $this->id_sede);
         $this->Texto_tag .= "<td>" . $this->id_sede . "</td>\r\n";
   }
   //----- id_jornada
   function NM_export_id_jornada()
   {
         nmgp_Form_Num_Val($this->id_jornada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_jornada))
         {
             $this->id_jornada = sc_convert_encoding($this->id_jornada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_jornada = str_replace('<', '&lt;', $this->id_jornada);
         $this->id_jornada = str_replace('>', '&gt;', $this->id_jornada);
         $this->Texto_tag .= "<td>" . $this->id_jornada . "</td>\r\n";
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
   //----- id_grupo
   function NM_export_id_grupo()
   {
         nmgp_Form_Num_Val($this->id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_grupo))
         {
             $this->id_grupo = sc_convert_encoding($this->id_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_grupo = str_replace('<', '&lt;', $this->id_grupo);
         $this->id_grupo = str_replace('>', '&gt;', $this->id_grupo);
         $this->Texto_tag .= "<td>" . $this->id_grupo . "</td>\r\n";
   }
   //----- cadena_principal
   function NM_export_cadena_principal()
   {
         $this->cadena_principal = html_entity_decode($this->cadena_principal, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cadena_principal = strip_tags($this->cadena_principal);
         if (!NM_is_utf8($this->cadena_principal))
         {
             $this->cadena_principal = sc_convert_encoding($this->cadena_principal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cadena_principal = str_replace('<', '&lt;', $this->cadena_principal);
         $this->cadena_principal = str_replace('>', '&gt;', $this->cadena_principal);
         $this->Texto_tag .= "<td>" . $this->cadena_principal . "</td>\r\n";
   }
   //----- cadena_principal_1
   function NM_export_cadena_principal_1()
   {
         $this->cadena_principal_1 = html_entity_decode($this->cadena_principal_1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cadena_principal_1 = strip_tags($this->cadena_principal_1);
         if (!NM_is_utf8($this->cadena_principal_1))
         {
             $this->cadena_principal_1 = sc_convert_encoding($this->cadena_principal_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cadena_principal_1 = str_replace('<', '&lt;', $this->cadena_principal_1);
         $this->cadena_principal_1 = str_replace('>', '&gt;', $this->cadena_principal_1);
         $this->Texto_tag .= "<td>" . $this->cadena_principal_1 . "</td>\r\n";
   }
   //----- cadena_secundaria
   function NM_export_cadena_secundaria()
   {
         $this->cadena_secundaria = html_entity_decode($this->cadena_secundaria, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cadena_secundaria = strip_tags($this->cadena_secundaria);
         if (!NM_is_utf8($this->cadena_secundaria))
         {
             $this->cadena_secundaria = sc_convert_encoding($this->cadena_secundaria, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cadena_secundaria = str_replace('<', '&lt;', $this->cadena_secundaria);
         $this->cadena_secundaria = str_replace('>', '&gt;', $this->cadena_secundaria);
         $this->Texto_tag .= "<td>" . $this->cadena_secundaria . "</td>\r\n";
   }
   //----- cargo_pri_firma
   function NM_export_cargo_pri_firma()
   {
         $this->cargo_pri_firma = html_entity_decode($this->cargo_pri_firma, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cargo_pri_firma = strip_tags($this->cargo_pri_firma);
         if (!NM_is_utf8($this->cargo_pri_firma))
         {
             $this->cargo_pri_firma = sc_convert_encoding($this->cargo_pri_firma, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cargo_pri_firma = str_replace('<', '&lt;', $this->cargo_pri_firma);
         $this->cargo_pri_firma = str_replace('>', '&gt;', $this->cargo_pri_firma);
         $this->Texto_tag .= "<td>" . $this->cargo_pri_firma . "</td>\r\n";
   }
   //----- cargo_seg_firma
   function NM_export_cargo_seg_firma()
   {
         $this->cargo_seg_firma = html_entity_decode($this->cargo_seg_firma, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cargo_seg_firma = strip_tags($this->cargo_seg_firma);
         if (!NM_is_utf8($this->cargo_seg_firma))
         {
             $this->cargo_seg_firma = sc_convert_encoding($this->cargo_seg_firma, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cargo_seg_firma = str_replace('<', '&lt;', $this->cargo_seg_firma);
         $this->cargo_seg_firma = str_replace('>', '&gt;', $this->cargo_seg_firma);
         $this->Texto_tag .= "<td>" . $this->cargo_seg_firma . "</td>\r\n";
   }
   //----- cod_dane
   function NM_export_cod_dane()
   {
         $this->cod_dane = html_entity_decode($this->cod_dane, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cod_dane = strip_tags($this->cod_dane);
         if (!NM_is_utf8($this->cod_dane))
         {
             $this->cod_dane = sc_convert_encoding($this->cod_dane, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cod_dane = str_replace('<', '&lt;', $this->cod_dane);
         $this->cod_dane = str_replace('>', '&gt;', $this->cod_dane);
         $this->Texto_tag .= "<td>" . $this->cod_dane . "</td>\r\n";
   }
   //----- direccion
   function NM_export_direccion()
   {
         $this->direccion = html_entity_decode($this->direccion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->direccion = strip_tags($this->direccion);
         if (!NM_is_utf8($this->direccion))
         {
             $this->direccion = sc_convert_encoding($this->direccion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->direccion = str_replace('<', '&lt;', $this->direccion);
         $this->direccion = str_replace('>', '&gt;', $this->direccion);
         $this->Texto_tag .= "<td>" . $this->direccion . "</td>\r\n";
   }
   //----- encabezado
   function NM_export_encabezado()
   {
         $this->encabezado = html_entity_decode($this->encabezado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->encabezado = strip_tags($this->encabezado);
         if (!NM_is_utf8($this->encabezado))
         {
             $this->encabezado = sc_convert_encoding($this->encabezado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->encabezado = str_replace('<', '&lt;', $this->encabezado);
         $this->encabezado = str_replace('>', '&gt;', $this->encabezado);
         $this->Texto_tag .= "<td>" . $this->encabezado . "</td>\r\n";
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
   //----- municipio
   function NM_export_municipio()
   {
         $this->municipio = html_entity_decode($this->municipio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->municipio = strip_tags($this->municipio);
         if (!NM_is_utf8($this->municipio))
         {
             $this->municipio = sc_convert_encoding($this->municipio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->municipio = str_replace('<', '&lt;', $this->municipio);
         $this->municipio = str_replace('>', '&gt;', $this->municipio);
         $this->Texto_tag .= "<td>" . $this->municipio . "</td>\r\n";
   }
   //----- nit
   function NM_export_nit()
   {
         $this->nit = html_entity_decode($this->nit, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nit = strip_tags($this->nit);
         if (!NM_is_utf8($this->nit))
         {
             $this->nit = sc_convert_encoding($this->nit, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nit = str_replace('<', '&lt;', $this->nit);
         $this->nit = str_replace('>', '&gt;', $this->nit);
         $this->Texto_tag .= "<td>" . $this->nit . "</td>\r\n";
   }
   //----- nombre_institucion
   function NM_export_nombre_institucion()
   {
         $this->nombre_institucion = html_entity_decode($this->nombre_institucion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre_institucion = strip_tags($this->nombre_institucion);
         if (!NM_is_utf8($this->nombre_institucion))
         {
             $this->nombre_institucion = sc_convert_encoding($this->nombre_institucion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nombre_institucion = str_replace('<', '&lt;', $this->nombre_institucion);
         $this->nombre_institucion = str_replace('>', '&gt;', $this->nombre_institucion);
         $this->Texto_tag .= "<td>" . $this->nombre_institucion . "</td>\r\n";
   }
   //----- pie_pagina
   function NM_export_pie_pagina()
   {
         $this->pie_pagina = html_entity_decode($this->pie_pagina, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pie_pagina = strip_tags($this->pie_pagina);
         if (!NM_is_utf8($this->pie_pagina))
         {
             $this->pie_pagina = sc_convert_encoding($this->pie_pagina, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->pie_pagina = str_replace('<', '&lt;', $this->pie_pagina);
         $this->pie_pagina = str_replace('>', '&gt;', $this->pie_pagina);
         $this->Texto_tag .= "<td>" . $this->pie_pagina . "</td>\r\n";
   }
   //----- primera_firma
   function NM_export_primera_firma()
   {
         $this->primera_firma = html_entity_decode($this->primera_firma, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->primera_firma = strip_tags($this->primera_firma);
         if (!NM_is_utf8($this->primera_firma))
         {
             $this->primera_firma = sc_convert_encoding($this->primera_firma, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->primera_firma = str_replace('<', '&lt;', $this->primera_firma);
         $this->primera_firma = str_replace('>', '&gt;', $this->primera_firma);
         $this->Texto_tag .= "<td>" . $this->primera_firma . "</td>\r\n";
   }
   //----- segunda_firma
   function NM_export_segunda_firma()
   {
         $this->segunda_firma = html_entity_decode($this->segunda_firma, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->segunda_firma = strip_tags($this->segunda_firma);
         if (!NM_is_utf8($this->segunda_firma))
         {
             $this->segunda_firma = sc_convert_encoding($this->segunda_firma, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->segunda_firma = str_replace('<', '&lt;', $this->segunda_firma);
         $this->segunda_firma = str_replace('>', '&gt;', $this->segunda_firma);
         $this->Texto_tag .= "<td>" . $this->segunda_firma . "</td>\r\n";
   }
   //----- telefonos
   function NM_export_telefonos()
   {
         $this->telefonos = html_entity_decode($this->telefonos, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->telefonos = strip_tags($this->telefonos);
         if (!NM_is_utf8($this->telefonos))
         {
             $this->telefonos = sc_convert_encoding($this->telefonos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->telefonos = str_replace('<', '&lt;', $this->telefonos);
         $this->telefonos = str_replace('>', '&gt;', $this->telefonos);
         $this->Texto_tag .= "<td>" . $this->telefonos . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_constacia_est'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="pdfreport_constacia_est_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_constacia_est"> 
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
