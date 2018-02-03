<?php

class grid_evalua_disciplina_rtf
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
   function grid_evalua_disciplina_rtf()
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
      $this->Arquivo   .= "_grid_evalua_disciplina";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_evalua_disciplina.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_evalua_disciplina']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_evalua_disciplina']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_evalua_disciplina']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->students_primer_apellido = $Busca_temp['students_primer_apellido']; 
          $tmp_pos = strpos($this->students_primer_apellido, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_primer_apellido = substr($this->students_primer_apellido, 0, $tmp_pos);
          }
          $this->students_segundo_apellido = $Busca_temp['students_segundo_apellido']; 
          $tmp_pos = strpos($this->students_segundo_apellido, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_segundo_apellido = substr($this->students_segundo_apellido, 0, $tmp_pos);
          }
          $this->students_primer_nombre = $Busca_temp['students_primer_nombre']; 
          $tmp_pos = strpos($this->students_primer_nombre, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_primer_nombre = substr($this->students_primer_nombre, 0, $tmp_pos);
          }
          $this->students_segundo_nombre = $Busca_temp['students_segundo_nombre']; 
          $tmp_pos = strpos($this->students_segundo_nombre, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_segundo_nombre = substr($this->students_segundo_nombre, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT students.idstudents as students_idstudents, t_estudiante_grupo.id_grupo as t_estudiante_grupo_id_grupo, disciplina.entorno as disciplina_entorno, disciplina.id_periodo as disciplina_id_periodo, disciplina.evaluacion as disciplina_evaluacion, students.primer_apellido as students_primer_apellido, students.segundo_apellido as students_segundo_apellido, students.primer_nombre as students_primer_nombre, students.segundo_nombre as students_segundo_nombre from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT students.idstudents as students_idstudents, t_estudiante_grupo.id_grupo as t_estudiante_grupo_id_grupo, disciplina.entorno as disciplina_entorno, disciplina.id_periodo as disciplina_id_periodo, disciplina.evaluacion as disciplina_evaluacion, students.primer_apellido as students_primer_apellido, students.segundo_apellido as students_segundo_apellido, students.primer_nombre as students_primer_nombre, students.segundo_nombre as students_segundo_nombre from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['where_pesq'];
      $nmgp_select .= " group by students.idstudents"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['students_idstudents'])) ? $this->New_label['students_idstudents'] : "Codigo Estudiante"; 
          if ($Cada_col == "students_idstudents" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estudiantes'])) ? $this->New_label['estudiantes'] : "Estudiantes"; 
          if ($Cada_col == "estudiantes" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['t_estudiante_grupo_id_grupo'])) ? $this->New_label['t_estudiante_grupo_id_grupo'] : "Grupo"; 
          if ($Cada_col == "t_estudiante_grupo_id_grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['disciplina_entorno'])) ? $this->New_label['disciplina_entorno'] : "Entorno"; 
          if ($Cada_col == "disciplina_entorno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['disciplina_id_periodo'])) ? $this->New_label['disciplina_id_periodo'] : "Período"; 
          if ($Cada_col == "disciplina_id_periodo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['eval'])) ? $this->New_label['eval'] : "eval"; 
          if ($Cada_col == "eval" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['disciplina_evaluacion'])) ? $this->New_label['disciplina_evaluacion'] : "Evaluación"; 
          if ($Cada_col == "disciplina_evaluacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_primer_apellido'])) ? $this->New_label['students_primer_apellido'] : "Primer Apellido"; 
          if ($Cada_col == "students_primer_apellido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_segundo_apellido'])) ? $this->New_label['students_segundo_apellido'] : "Segundo Apellido"; 
          if ($Cada_col == "students_segundo_apellido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_primer_nombre'])) ? $this->New_label['students_primer_nombre'] : "Primer Nombre"; 
          if ($Cada_col == "students_primer_nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['students_segundo_nombre'])) ? $this->New_label['students_segundo_nombre'] : "Segundo Nombre"; 
          if ($Cada_col == "students_segundo_nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->students_idstudents = $rs->fields[0] ;  
         $this->students_idstudents = (string)$this->students_idstudents;
         $this->t_estudiante_grupo_id_grupo = $rs->fields[1] ;  
         $this->t_estudiante_grupo_id_grupo = (string)$this->t_estudiante_grupo_id_grupo;
         $this->disciplina_entorno = $rs->fields[2] ;  
         $this->disciplina_entorno = (string)$this->disciplina_entorno;
         $this->disciplina_id_periodo = $rs->fields[3] ;  
         $this->disciplina_id_periodo = (string)$this->disciplina_id_periodo;
         $this->disciplina_evaluacion = $rs->fields[4] ;  
         $this->disciplina_evaluacion = (strpos(strtolower($this->disciplina_evaluacion), "e")) ? (float)$this->disciplina_evaluacion : $this->disciplina_evaluacion; 
         $this->disciplina_evaluacion = (string)$this->disciplina_evaluacion;
         $this->students_primer_apellido = $rs->fields[5] ;  
         $this->students_segundo_apellido = $rs->fields[6] ;  
         $this->students_primer_nombre = $rs->fields[7] ;  
         $this->students_segundo_nombre = $rs->fields[8] ;  
         //----- lookup - t_estudiante_grupo_id_grupo
         $this->look_t_estudiante_grupo_id_grupo = $this->t_estudiante_grupo_id_grupo; 
         $this->Lookup->lookup_t_estudiante_grupo_id_grupo($this->look_t_estudiante_grupo_id_grupo, $this->t_estudiante_grupo_id_grupo) ; 
         $this->look_t_estudiante_grupo_id_grupo = ($this->look_t_estudiante_grupo_id_grupo == "&nbsp;") ? "" : $this->look_t_estudiante_grupo_id_grupo; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_evalua_disciplina']['contr_erro'] = 'on';
 $this->estudiantes =$this->students_primer_apellido .' '.$this->students_segundo_apellido .' '.$this->students_primer_nombre .' '.$this->students_segundo_nombre ;


$_SESSION['scriptcase']['grid_evalua_disciplina']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['field_order'] as $Cada_col)
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
   //----- students_idstudents
   function NM_export_students_idstudents()
   {
         nmgp_Form_Num_Val($this->students_idstudents, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->students_idstudents))
         {
             $this->students_idstudents = sc_convert_encoding($this->students_idstudents, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_idstudents = str_replace('<', '&lt;', $this->students_idstudents);
         $this->students_idstudents = str_replace('>', '&gt;', $this->students_idstudents);
         $this->Texto_tag .= "<td>" . $this->students_idstudents . "</td>\r\n";
   }
   //----- estudiantes
   function NM_export_estudiantes()
   {
         $this->estudiantes = html_entity_decode($this->estudiantes, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->estudiantes = strip_tags($this->estudiantes);
         if (!NM_is_utf8($this->estudiantes))
         {
             $this->estudiantes = sc_convert_encoding($this->estudiantes, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->estudiantes = str_replace('<', '&lt;', $this->estudiantes);
         $this->estudiantes = str_replace('>', '&gt;', $this->estudiantes);
         $this->Texto_tag .= "<td>" . $this->estudiantes . "</td>\r\n";
   }
   //----- t_estudiante_grupo_id_grupo
   function NM_export_t_estudiante_grupo_id_grupo()
   {
         nmgp_Form_Num_Val($this->look_t_estudiante_grupo_id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_t_estudiante_grupo_id_grupo))
         {
             $this->look_t_estudiante_grupo_id_grupo = sc_convert_encoding($this->look_t_estudiante_grupo_id_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_t_estudiante_grupo_id_grupo = str_replace('<', '&lt;', $this->look_t_estudiante_grupo_id_grupo);
         $this->look_t_estudiante_grupo_id_grupo = str_replace('>', '&gt;', $this->look_t_estudiante_grupo_id_grupo);
         $this->Texto_tag .= "<td>" . $this->look_t_estudiante_grupo_id_grupo . "</td>\r\n";
   }
   //----- disciplina_entorno
   function NM_export_disciplina_entorno()
   {
         nmgp_Form_Num_Val($this->disciplina_entorno, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->disciplina_entorno))
         {
             $this->disciplina_entorno = sc_convert_encoding($this->disciplina_entorno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->disciplina_entorno = str_replace('<', '&lt;', $this->disciplina_entorno);
         $this->disciplina_entorno = str_replace('>', '&gt;', $this->disciplina_entorno);
         $this->Texto_tag .= "<td>" . $this->disciplina_entorno . "</td>\r\n";
   }
   //----- disciplina_id_periodo
   function NM_export_disciplina_id_periodo()
   {
         nmgp_Form_Num_Val($this->disciplina_id_periodo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->disciplina_id_periodo))
         {
             $this->disciplina_id_periodo = sc_convert_encoding($this->disciplina_id_periodo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->disciplina_id_periodo = str_replace('<', '&lt;', $this->disciplina_id_periodo);
         $this->disciplina_id_periodo = str_replace('>', '&gt;', $this->disciplina_id_periodo);
         $this->Texto_tag .= "<td>" . $this->disciplina_id_periodo . "</td>\r\n";
   }
   //----- eval
   function NM_export_eval()
   {
         if (!NM_is_utf8($this->eval))
         {
             $this->eval = sc_convert_encoding($this->eval, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->eval = str_replace('<', '&lt;', $this->eval);
         $this->eval = str_replace('>', '&gt;', $this->eval);
         $this->Texto_tag .= "<td>" . $this->eval . "</td>\r\n";
   }
   //----- disciplina_evaluacion
   function NM_export_disciplina_evaluacion()
   {
         nmgp_Form_Num_Val($this->disciplina_evaluacion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "1", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->disciplina_evaluacion))
         {
             $this->disciplina_evaluacion = sc_convert_encoding($this->disciplina_evaluacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->disciplina_evaluacion = str_replace('<', '&lt;', $this->disciplina_evaluacion);
         $this->disciplina_evaluacion = str_replace('>', '&gt;', $this->disciplina_evaluacion);
         $this->Texto_tag .= "<td>" . $this->disciplina_evaluacion . "</td>\r\n";
   }
   //----- students_primer_apellido
   function NM_export_students_primer_apellido()
   {
         $this->students_primer_apellido = html_entity_decode($this->students_primer_apellido, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_primer_apellido = strip_tags($this->students_primer_apellido);
         if (!NM_is_utf8($this->students_primer_apellido))
         {
             $this->students_primer_apellido = sc_convert_encoding($this->students_primer_apellido, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_primer_apellido = str_replace('<', '&lt;', $this->students_primer_apellido);
         $this->students_primer_apellido = str_replace('>', '&gt;', $this->students_primer_apellido);
         $this->Texto_tag .= "<td>" . $this->students_primer_apellido . "</td>\r\n";
   }
   //----- students_segundo_apellido
   function NM_export_students_segundo_apellido()
   {
         $this->students_segundo_apellido = html_entity_decode($this->students_segundo_apellido, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_segundo_apellido = strip_tags($this->students_segundo_apellido);
         if (!NM_is_utf8($this->students_segundo_apellido))
         {
             $this->students_segundo_apellido = sc_convert_encoding($this->students_segundo_apellido, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_segundo_apellido = str_replace('<', '&lt;', $this->students_segundo_apellido);
         $this->students_segundo_apellido = str_replace('>', '&gt;', $this->students_segundo_apellido);
         $this->Texto_tag .= "<td>" . $this->students_segundo_apellido . "</td>\r\n";
   }
   //----- students_primer_nombre
   function NM_export_students_primer_nombre()
   {
         $this->students_primer_nombre = html_entity_decode($this->students_primer_nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_primer_nombre = strip_tags($this->students_primer_nombre);
         if (!NM_is_utf8($this->students_primer_nombre))
         {
             $this->students_primer_nombre = sc_convert_encoding($this->students_primer_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_primer_nombre = str_replace('<', '&lt;', $this->students_primer_nombre);
         $this->students_primer_nombre = str_replace('>', '&gt;', $this->students_primer_nombre);
         $this->Texto_tag .= "<td>" . $this->students_primer_nombre . "</td>\r\n";
   }
   //----- students_segundo_nombre
   function NM_export_students_segundo_nombre()
   {
         $this->students_segundo_nombre = html_entity_decode($this->students_segundo_nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->students_segundo_nombre = strip_tags($this->students_segundo_nombre);
         if (!NM_is_utf8($this->students_segundo_nombre))
         {
             $this->students_segundo_nombre = sc_convert_encoding($this->students_segundo_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->students_segundo_nombre = str_replace('<', '&lt;', $this->students_segundo_nombre);
         $this->students_segundo_nombre = str_replace('>', '&gt;', $this->students_segundo_nombre);
         $this->Texto_tag .= "<td>" . $this->students_segundo_nombre . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evalua_disciplina'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -  :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_evalua_disciplina_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_evalua_disciplina"> 
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
