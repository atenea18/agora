<?php

class grid_docentes_rtf
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
   function grid_docentes_rtf()
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
      $this->Arquivo   .= "_grid_docentes";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_docentes.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_docentes']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_docentes']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_docentes']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->segundo_apellido = $Busca_temp['segundo_apellido']; 
          $tmp_pos = strpos($this->segundo_apellido, "##@@");
          if ($tmp_pos !== false)
          {
              $this->segundo_apellido = substr($this->segundo_apellido, 0, $tmp_pos);
          }
          $this->id_docente = $Busca_temp['id_docente']; 
          $tmp_pos = strpos($this->id_docente, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_docente = substr($this->id_docente, 0, $tmp_pos);
          }
          $this->id_docente_2 = $Busca_temp['id_docente_input_2']; 
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false)
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->primer_apellido = $Busca_temp['primer_apellido']; 
          $tmp_pos = strpos($this->primer_apellido, "##@@");
          if ($tmp_pos !== false)
          {
              $this->primer_apellido = substr($this->primer_apellido, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT documento, tel_fijo, tel_celular, email, direccion, id_area, foto, id_docente, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT documento, tel_fijo, tel_celular, email, direccion, id_area, foto, id_docente, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Documento"; 
          if ($Cada_col == "documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nom_completo'])) ? $this->New_label['nom_completo'] : "Nombre"; 
          if ($Cada_col == "nom_completo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tel_fijo'])) ? $this->New_label['tel_fijo'] : "Tel Fijo"; 
          if ($Cada_col == "tel_fijo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tel_celular'])) ? $this->New_label['tel_celular'] : "Tel Celular"; 
          if ($Cada_col == "tel_celular" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['email'])) ? $this->New_label['email'] : "Email"; 
          if ($Cada_col == "email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "Direccion"; 
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
          $SC_Label = (isset($this->New_label['id_area'])) ? $this->New_label['id_area'] : "Area"; 
          if ($Cada_col == "id_area" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['foto'])) ? $this->New_label['foto'] : "Foto"; 
          if ($Cada_col == "foto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_docente'])) ? $this->New_label['id_docente'] : "Id Docente"; 
          if ($Cada_col == "id_docente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      } 
      $this->Texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->Texto_tag .= "<tr>\r\n";
         $this->documento = $rs->fields[0] ;  
         $this->tel_fijo = $rs->fields[1] ;  
         $this->tel_celular = $rs->fields[2] ;  
         $this->email = $rs->fields[3] ;  
         $this->direccion = $rs->fields[4] ;  
         $this->id_area = $rs->fields[5] ;  
         $this->id_area = (string)$this->id_area;
         $this->foto = $rs->fields[6] ;  
         $this->id_docente = $rs->fields[7] ;  
         $this->id_docente = (string)$this->id_docente;
         $this->primer_apellido = $rs->fields[8] ;  
         $this->segundo_apellido = $rs->fields[9] ;  
         $this->primer_nombre = $rs->fields[10] ;  
         $this->segundo_nombre = $rs->fields[11] ;  
         //----- lookup - id_area
         $this->look_id_area = $this->id_area; 
         $this->Lookup->lookup_id_area($this->look_id_area, $this->id_area) ; 
         $this->look_id_area = ($this->look_id_area == "&nbsp;") ? "" : $this->look_id_area; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_docentes']['contr_erro'] = 'on';
 $this->nom_completo  =$this->primer_nombre ." ".$this->segundo_nombre ." ".$this->primer_apellido ." ".$this->segundo_apellido ;
$_SESSION['scriptcase']['grid_docentes']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['field_order'] as $Cada_col)
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
   //----- documento
   function NM_export_documento()
   {
         $this->documento = html_entity_decode($this->documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->documento = strip_tags($this->documento);
         if (!NM_is_utf8($this->documento))
         {
             $this->documento = sc_convert_encoding($this->documento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->documento = str_replace('<', '&lt;', $this->documento);
         $this->documento = str_replace('>', '&gt;', $this->documento);
         $this->Texto_tag .= "<td>" . $this->documento . "</td>\r\n";
   }
   //----- nom_completo
   function NM_export_nom_completo()
   {
         $this->nom_completo = html_entity_decode($this->nom_completo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nom_completo = strip_tags($this->nom_completo);
         if (!NM_is_utf8($this->nom_completo))
         {
             $this->nom_completo = sc_convert_encoding($this->nom_completo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nom_completo = str_replace('<', '&lt;', $this->nom_completo);
         $this->nom_completo = str_replace('>', '&gt;', $this->nom_completo);
         $this->Texto_tag .= "<td>" . $this->nom_completo . "</td>\r\n";
   }
   //----- tel_fijo
   function NM_export_tel_fijo()
   {
         $this->tel_fijo = html_entity_decode($this->tel_fijo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tel_fijo = strip_tags($this->tel_fijo);
         if (!NM_is_utf8($this->tel_fijo))
         {
             $this->tel_fijo = sc_convert_encoding($this->tel_fijo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tel_fijo = str_replace('<', '&lt;', $this->tel_fijo);
         $this->tel_fijo = str_replace('>', '&gt;', $this->tel_fijo);
         $this->Texto_tag .= "<td>" . $this->tel_fijo . "</td>\r\n";
   }
   //----- tel_celular
   function NM_export_tel_celular()
   {
         $this->tel_celular = html_entity_decode($this->tel_celular, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tel_celular = strip_tags($this->tel_celular);
         if (!NM_is_utf8($this->tel_celular))
         {
             $this->tel_celular = sc_convert_encoding($this->tel_celular, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tel_celular = str_replace('<', '&lt;', $this->tel_celular);
         $this->tel_celular = str_replace('>', '&gt;', $this->tel_celular);
         $this->Texto_tag .= "<td>" . $this->tel_celular . "</td>\r\n";
   }
   //----- email
   function NM_export_email()
   {
         $this->email = html_entity_decode($this->email, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->email = strip_tags($this->email);
         if (!NM_is_utf8($this->email))
         {
             $this->email = sc_convert_encoding($this->email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->email = str_replace('<', '&lt;', $this->email);
         $this->email = str_replace('>', '&gt;', $this->email);
         $this->Texto_tag .= "<td>" . $this->email . "</td>\r\n";
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
   //----- id_area
   function NM_export_id_area()
   {
         nmgp_Form_Num_Val($this->look_id_area, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_id_area))
         {
             $this->look_id_area = sc_convert_encoding($this->look_id_area, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_id_area = str_replace('<', '&lt;', $this->look_id_area);
         $this->look_id_area = str_replace('>', '&gt;', $this->look_id_area);
         $this->Texto_tag .= "<td>" . $this->look_id_area . "</td>\r\n";
   }
   //----- foto
   function NM_export_foto()
   {
         if (!NM_is_utf8($this->foto))
         {
             $this->foto = sc_convert_encoding($this->foto, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->foto = str_replace('<', '&lt;', $this->foto);
         $this->foto = str_replace('>', '&gt;', $this->foto);
         $this->Texto_tag .= "<td>" . $this->foto . "</td>\r\n";
   }
   //----- id_docente
   function NM_export_id_docente()
   {
         nmgp_Form_Num_Val($this->id_docente, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_docente))
         {
             $this->id_docente = sc_convert_encoding($this->id_docente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_docente = str_replace('<', '&lt;', $this->id_docente);
         $this->id_docente = str_replace('>', '&gt;', $this->id_docente);
         $this->Texto_tag .= "<td>" . $this->id_docente . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_docentes'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - docentes :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_docentes_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_docentes"> 
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
