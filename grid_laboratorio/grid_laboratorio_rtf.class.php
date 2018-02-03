<?php

class grid_laboratorio_rtf
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
   function grid_laboratorio_rtf()
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
      $this->Arquivo   .= "_grid_laboratorio";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_laboratorio.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['rtf_name']);
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

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['nombre_completo'])) ? $this->New_label['nombre_completo'] : "Apellidos y Nombres del Estudian"; 
          if ($Cada_col == "nombre_completo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_semestre'])) ? $this->New_label['students_semestre'] : "Semestre"; 
          if ($Cada_col == "students_semestre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_estatus'])) ? $this->New_label['students_estatus'] : "Estatus"; 
          if ($Cada_col == "students_estatus" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_fecha_matricula'])) ? $this->New_label['students_fecha_matricula'] : "Fecha Matricula"; 
          if ($Cada_col == "students_fecha_matricula" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_tipo_identificacion'])) ? $this->New_label['students_tipo_identificacion'] : "Tipo Identificacion"; 
          if ($Cada_col == "students_tipo_identificacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_numero_documento'])) ? $this->New_label['students_numero_documento'] : "Numero Documento"; 
          if ($Cada_col == "students_numero_documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_genero'])) ? $this->New_label['students_genero'] : "Genero"; 
          if ($Cada_col == "students_genero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_fecha_nacimiento'])) ? $this->New_label['students_fecha_nacimiento'] : "Fecha Nacimiento"; 
          if ($Cada_col == "students_fecha_nacimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_anos_cumplidos'])) ? $this->New_label['students_anos_cumplidos'] : "Años Cumplidos"; 
          if ($Cada_col == "students_anos_cumplidos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_telefono'])) ? $this->New_label['students_telefono'] : "Telefono"; 
          if ($Cada_col == "students_telefono" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_etnia'])) ? $this->New_label['students_etnia'] : "Etnia"; 
          if ($Cada_col == "students_etnia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_email'])) ? $this->New_label['students_email'] : "Email"; 
          if ($Cada_col == "students_email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_zona'])) ? $this->New_label['students_zona'] : "Comuna"; 
          if ($Cada_col == "students_zona" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['campo_vac_1'])) ? $this->New_label['campo_vac_1'] : "<FONT COLOR=DADADA>___________</FONT>"; 
          if ($Cada_col == "campo_vac_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['campo_vac_2'])) ? $this->New_label['campo_vac_2'] : "<FONT COLOR=DADADA>___________</FONT>"; 
          if ($Cada_col == "campo_vac_2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['campo_vac_3'])) ? $this->New_label['campo_vac_3'] : "<FONT COLOR=DADADA>___________</FONT>"; 
          if ($Cada_col == "campo_vac_3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['campo_vac_4'])) ? $this->New_label['campo_vac_4'] : "<FONT COLOR=DADADA>___________</FONT>"; 
          if ($Cada_col == "campo_vac_4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['campo_vac_5'])) ? $this->New_label['campo_vac_5'] : "<FONT COLOR=DADADA>___________</FONT>"; 
          if ($Cada_col == "campo_vac_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['campo_vac_6'])) ? $this->New_label['campo_vac_6'] : "<FONT COLOR=DADADA>___________</FONT>"; 
          if ($Cada_col == "campo_vac_6" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['campo_vac_7'])) ? $this->New_label['campo_vac_7'] : "<FONT COLOR=DADADA>___________</FONT>"; 
          if ($Cada_col == "campo_vac_7" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['campo_vac_8'])) ? $this->New_label['campo_vac_8'] : "<FONT COLOR=DADADA>___________</FONT>"; 
          if ($Cada_col == "campo_vac_8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['campo_vac_9'])) ? $this->New_label['campo_vac_9'] : "<FONT COLOR=DADADA>___________</FONT>"; 
          if ($Cada_col == "campo_vac_9" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['campo_vac_10'])) ? $this->New_label['campo_vac_10'] : "<FONT COLOR=DADADA>___________</FONT>"; 
          if ($Cada_col == "campo_vac_10" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_id_sede'])) ? $this->New_label['students_id_sede'] : "Id Sede"; 
          if ($Cada_col == "students_id_sede" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_id_jornada'])) ? $this->New_label['students_id_jornada'] : "Id Jornada"; 
          if ($Cada_col == "students_id_jornada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_id_grupo'])) ? $this->New_label['students_id_grupo'] : "Id Grupo"; 
          if ($Cada_col == "students_id_grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- nombre_completo
   function NM_export_nombre_completo()
   {
         $this->nombre_completo = html_entity_decode($this->nombre_completo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre_completo = strip_tags($this->nombre_completo);
         if (!NM_is_utf8($this->nombre_completo))
         {
             $this->nombre_completo = sc_convert_encoding($this->nombre_completo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nombre_completo = str_replace('<', '&lt;', $this->nombre_completo);
         $this->nombre_completo = str_replace('>', '&gt;', $this->nombre_completo);
         $this->Texto_tag .= "<td>" . $this->nombre_completo . "</td>\r\n";
   }
   //----- students_semestre
   function NM_export_students_semestre()
   {
         nmgp_Form_Num_Val($this->students_semestre, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->students_semestre))
         {
             $this->students_semestre = sc_convert_encoding($this->students_semestre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_semestre = str_replace('<', '&lt;', $this->students_semestre);
         $this->students_semestre = str_replace('>', '&gt;', $this->students_semestre);
         $this->Texto_tag .= "<td>" . $this->students_semestre . "</td>\r\n";
   }
   //----- students_estatus
   function NM_export_students_estatus()
   {
         $this->students_estatus = html_entity_decode($this->students_estatus, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_estatus = strip_tags($this->students_estatus);
         if (!NM_is_utf8($this->students_estatus))
         {
             $this->students_estatus = sc_convert_encoding($this->students_estatus, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_estatus = str_replace('<', '&lt;', $this->students_estatus);
         $this->students_estatus = str_replace('>', '&gt;', $this->students_estatus);
         $this->Texto_tag .= "<td>" . $this->students_estatus . "</td>\r\n";
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
         if (!NM_is_utf8($this->students_fecha_matricula))
         {
             $this->students_fecha_matricula = sc_convert_encoding($this->students_fecha_matricula, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_fecha_matricula = str_replace('<', '&lt;', $this->students_fecha_matricula);
         $this->students_fecha_matricula = str_replace('>', '&gt;', $this->students_fecha_matricula);
         $this->Texto_tag .= "<td>" . $this->students_fecha_matricula . "</td>\r\n";
   }
   //----- students_tipo_identificacion
   function NM_export_students_tipo_identificacion()
   {
         $this->students_tipo_identificacion = html_entity_decode($this->students_tipo_identificacion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_tipo_identificacion = strip_tags($this->students_tipo_identificacion);
         if (!NM_is_utf8($this->students_tipo_identificacion))
         {
             $this->students_tipo_identificacion = sc_convert_encoding($this->students_tipo_identificacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_tipo_identificacion = str_replace('<', '&lt;', $this->students_tipo_identificacion);
         $this->students_tipo_identificacion = str_replace('>', '&gt;', $this->students_tipo_identificacion);
         $this->Texto_tag .= "<td>" . $this->students_tipo_identificacion . "</td>\r\n";
   }
   //----- students_numero_documento
   function NM_export_students_numero_documento()
   {
         $this->students_numero_documento = html_entity_decode($this->students_numero_documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_numero_documento = strip_tags($this->students_numero_documento);
         if (!NM_is_utf8($this->students_numero_documento))
         {
             $this->students_numero_documento = sc_convert_encoding($this->students_numero_documento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_numero_documento = str_replace('<', '&lt;', $this->students_numero_documento);
         $this->students_numero_documento = str_replace('>', '&gt;', $this->students_numero_documento);
         $this->Texto_tag .= "<td>" . $this->students_numero_documento . "</td>\r\n";
   }
   //----- students_genero
   function NM_export_students_genero()
   {
         $this->look_students_genero = html_entity_decode($this->look_students_genero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_students_genero = strip_tags($this->look_students_genero);
         if (!NM_is_utf8($this->look_students_genero))
         {
             $this->look_students_genero = sc_convert_encoding($this->look_students_genero, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_students_genero = str_replace('<', '&lt;', $this->look_students_genero);
         $this->look_students_genero = str_replace('>', '&gt;', $this->look_students_genero);
         $this->Texto_tag .= "<td>" . $this->look_students_genero . "</td>\r\n";
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
         if (!NM_is_utf8($this->students_fecha_nacimiento))
         {
             $this->students_fecha_nacimiento = sc_convert_encoding($this->students_fecha_nacimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_fecha_nacimiento = str_replace('<', '&lt;', $this->students_fecha_nacimiento);
         $this->students_fecha_nacimiento = str_replace('>', '&gt;', $this->students_fecha_nacimiento);
         $this->Texto_tag .= "<td>" . $this->students_fecha_nacimiento . "</td>\r\n";
   }
   //----- students_anos_cumplidos
   function NM_export_students_anos_cumplidos()
   {
         nmgp_Form_Num_Val($this->students_anos_cumplidos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->students_anos_cumplidos))
         {
             $this->students_anos_cumplidos = sc_convert_encoding($this->students_anos_cumplidos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_anos_cumplidos = str_replace('<', '&lt;', $this->students_anos_cumplidos);
         $this->students_anos_cumplidos = str_replace('>', '&gt;', $this->students_anos_cumplidos);
         $this->Texto_tag .= "<td>" . $this->students_anos_cumplidos . "</td>\r\n";
   }
   //----- students_telefono
   function NM_export_students_telefono()
   {
         $this->students_telefono = html_entity_decode($this->students_telefono, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_telefono = strip_tags($this->students_telefono);
         if (!NM_is_utf8($this->students_telefono))
         {
             $this->students_telefono = sc_convert_encoding($this->students_telefono, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_telefono = str_replace('<', '&lt;', $this->students_telefono);
         $this->students_telefono = str_replace('>', '&gt;', $this->students_telefono);
         $this->Texto_tag .= "<td>" . $this->students_telefono . "</td>\r\n";
   }
   //----- students_etnia
   function NM_export_students_etnia()
   {
         $this->students_etnia = html_entity_decode($this->students_etnia, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_etnia = strip_tags($this->students_etnia);
         if (!NM_is_utf8($this->students_etnia))
         {
             $this->students_etnia = sc_convert_encoding($this->students_etnia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_etnia = str_replace('<', '&lt;', $this->students_etnia);
         $this->students_etnia = str_replace('>', '&gt;', $this->students_etnia);
         $this->Texto_tag .= "<td>" . $this->students_etnia . "</td>\r\n";
   }
   //----- students_email
   function NM_export_students_email()
   {
         $this->students_email = html_entity_decode($this->students_email, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_email = strip_tags($this->students_email);
         if (!NM_is_utf8($this->students_email))
         {
             $this->students_email = sc_convert_encoding($this->students_email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_email = str_replace('<', '&lt;', $this->students_email);
         $this->students_email = str_replace('>', '&gt;', $this->students_email);
         $this->Texto_tag .= "<td>" . $this->students_email . "</td>\r\n";
   }
   //----- students_zona
   function NM_export_students_zona()
   {
         $this->students_zona = html_entity_decode($this->students_zona, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_zona = strip_tags($this->students_zona);
         if (!NM_is_utf8($this->students_zona))
         {
             $this->students_zona = sc_convert_encoding($this->students_zona, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_zona = str_replace('<', '&lt;', $this->students_zona);
         $this->students_zona = str_replace('>', '&gt;', $this->students_zona);
         $this->Texto_tag .= "<td>" . $this->students_zona . "</td>\r\n";
   }
   //----- campo_vac_1
   function NM_export_campo_vac_1()
   {
         $this->campo_vac_1 = html_entity_decode($this->campo_vac_1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->campo_vac_1 = strip_tags($this->campo_vac_1);
         if (!NM_is_utf8($this->campo_vac_1))
         {
             $this->campo_vac_1 = sc_convert_encoding($this->campo_vac_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->campo_vac_1 = str_replace('<', '&lt;', $this->campo_vac_1);
         $this->campo_vac_1 = str_replace('>', '&gt;', $this->campo_vac_1);
         $this->Texto_tag .= "<td>" . $this->campo_vac_1 . "</td>\r\n";
   }
   //----- campo_vac_2
   function NM_export_campo_vac_2()
   {
         $this->campo_vac_2 = html_entity_decode($this->campo_vac_2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->campo_vac_2 = strip_tags($this->campo_vac_2);
         if (!NM_is_utf8($this->campo_vac_2))
         {
             $this->campo_vac_2 = sc_convert_encoding($this->campo_vac_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->campo_vac_2 = str_replace('<', '&lt;', $this->campo_vac_2);
         $this->campo_vac_2 = str_replace('>', '&gt;', $this->campo_vac_2);
         $this->Texto_tag .= "<td>" . $this->campo_vac_2 . "</td>\r\n";
   }
   //----- campo_vac_3
   function NM_export_campo_vac_3()
   {
         $this->campo_vac_3 = html_entity_decode($this->campo_vac_3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->campo_vac_3 = strip_tags($this->campo_vac_3);
         if (!NM_is_utf8($this->campo_vac_3))
         {
             $this->campo_vac_3 = sc_convert_encoding($this->campo_vac_3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->campo_vac_3 = str_replace('<', '&lt;', $this->campo_vac_3);
         $this->campo_vac_3 = str_replace('>', '&gt;', $this->campo_vac_3);
         $this->Texto_tag .= "<td>" . $this->campo_vac_3 . "</td>\r\n";
   }
   //----- campo_vac_4
   function NM_export_campo_vac_4()
   {
         $this->campo_vac_4 = html_entity_decode($this->campo_vac_4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->campo_vac_4 = strip_tags($this->campo_vac_4);
         if (!NM_is_utf8($this->campo_vac_4))
         {
             $this->campo_vac_4 = sc_convert_encoding($this->campo_vac_4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->campo_vac_4 = str_replace('<', '&lt;', $this->campo_vac_4);
         $this->campo_vac_4 = str_replace('>', '&gt;', $this->campo_vac_4);
         $this->Texto_tag .= "<td>" . $this->campo_vac_4 . "</td>\r\n";
   }
   //----- campo_vac_5
   function NM_export_campo_vac_5()
   {
         $this->campo_vac_5 = html_entity_decode($this->campo_vac_5, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->campo_vac_5 = strip_tags($this->campo_vac_5);
         if (!NM_is_utf8($this->campo_vac_5))
         {
             $this->campo_vac_5 = sc_convert_encoding($this->campo_vac_5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->campo_vac_5 = str_replace('<', '&lt;', $this->campo_vac_5);
         $this->campo_vac_5 = str_replace('>', '&gt;', $this->campo_vac_5);
         $this->Texto_tag .= "<td>" . $this->campo_vac_5 . "</td>\r\n";
   }
   //----- campo_vac_6
   function NM_export_campo_vac_6()
   {
         $this->campo_vac_6 = html_entity_decode($this->campo_vac_6, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->campo_vac_6 = strip_tags($this->campo_vac_6);
         if (!NM_is_utf8($this->campo_vac_6))
         {
             $this->campo_vac_6 = sc_convert_encoding($this->campo_vac_6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->campo_vac_6 = str_replace('<', '&lt;', $this->campo_vac_6);
         $this->campo_vac_6 = str_replace('>', '&gt;', $this->campo_vac_6);
         $this->Texto_tag .= "<td>" . $this->campo_vac_6 . "</td>\r\n";
   }
   //----- campo_vac_7
   function NM_export_campo_vac_7()
   {
         $this->campo_vac_7 = html_entity_decode($this->campo_vac_7, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->campo_vac_7 = strip_tags($this->campo_vac_7);
         if (!NM_is_utf8($this->campo_vac_7))
         {
             $this->campo_vac_7 = sc_convert_encoding($this->campo_vac_7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->campo_vac_7 = str_replace('<', '&lt;', $this->campo_vac_7);
         $this->campo_vac_7 = str_replace('>', '&gt;', $this->campo_vac_7);
         $this->Texto_tag .= "<td>" . $this->campo_vac_7 . "</td>\r\n";
   }
   //----- campo_vac_8
   function NM_export_campo_vac_8()
   {
         $this->campo_vac_8 = html_entity_decode($this->campo_vac_8, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->campo_vac_8 = strip_tags($this->campo_vac_8);
         if (!NM_is_utf8($this->campo_vac_8))
         {
             $this->campo_vac_8 = sc_convert_encoding($this->campo_vac_8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->campo_vac_8 = str_replace('<', '&lt;', $this->campo_vac_8);
         $this->campo_vac_8 = str_replace('>', '&gt;', $this->campo_vac_8);
         $this->Texto_tag .= "<td>" . $this->campo_vac_8 . "</td>\r\n";
   }
   //----- campo_vac_9
   function NM_export_campo_vac_9()
   {
         $this->campo_vac_9 = html_entity_decode($this->campo_vac_9, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->campo_vac_9 = strip_tags($this->campo_vac_9);
         if (!NM_is_utf8($this->campo_vac_9))
         {
             $this->campo_vac_9 = sc_convert_encoding($this->campo_vac_9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->campo_vac_9 = str_replace('<', '&lt;', $this->campo_vac_9);
         $this->campo_vac_9 = str_replace('>', '&gt;', $this->campo_vac_9);
         $this->Texto_tag .= "<td>" . $this->campo_vac_9 . "</td>\r\n";
   }
   //----- campo_vac_10
   function NM_export_campo_vac_10()
   {
         $this->campo_vac_10 = html_entity_decode($this->campo_vac_10, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->campo_vac_10 = strip_tags($this->campo_vac_10);
         if (!NM_is_utf8($this->campo_vac_10))
         {
             $this->campo_vac_10 = sc_convert_encoding($this->campo_vac_10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->campo_vac_10 = str_replace('<', '&lt;', $this->campo_vac_10);
         $this->campo_vac_10 = str_replace('>', '&gt;', $this->campo_vac_10);
         $this->Texto_tag .= "<td>" . $this->campo_vac_10 . "</td>\r\n";
   }
   //----- students_id_sede
   function NM_export_students_id_sede()
   {
         $this->students_id_sede = html_entity_decode($this->students_id_sede, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_id_sede = strip_tags($this->students_id_sede);
         if (!NM_is_utf8($this->students_id_sede))
         {
             $this->students_id_sede = sc_convert_encoding($this->students_id_sede, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_id_sede = str_replace('<', '&lt;', $this->students_id_sede);
         $this->students_id_sede = str_replace('>', '&gt;', $this->students_id_sede);
         $this->Texto_tag .= "<td>" . $this->students_id_sede . "</td>\r\n";
   }
   //----- students_id_jornada
   function NM_export_students_id_jornada()
   {
         nmgp_Form_Num_Val($this->students_id_jornada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->students_id_jornada))
         {
             $this->students_id_jornada = sc_convert_encoding($this->students_id_jornada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_id_jornada = str_replace('<', '&lt;', $this->students_id_jornada);
         $this->students_id_jornada = str_replace('>', '&gt;', $this->students_id_jornada);
         $this->Texto_tag .= "<td>" . $this->students_id_jornada . "</td>\r\n";
   }
   //----- students_id_grupo
   function NM_export_students_id_grupo()
   {
         nmgp_Form_Num_Val($this->students_id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->students_id_grupo))
         {
             $this->students_id_grupo = sc_convert_encoding($this->students_id_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_id_grupo = str_replace('<', '&lt;', $this->students_id_grupo);
         $this->students_id_grupo = str_replace('>', '&gt;', $this->students_id_grupo);
         $this->Texto_tag .= "<td>" . $this->students_id_grupo . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_laboratorio'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - students :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_laboratorio_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_laboratorio"> 
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
