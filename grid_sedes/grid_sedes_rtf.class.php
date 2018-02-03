<?php

class grid_sedes_rtf
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
   function grid_sedes_rtf()
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
      $this->Arquivo   .= "_grid_sedes";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_sedes.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_sedes']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_sedes']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_sedes']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->capacidad_fisica = $Busca_temp['capacidad_fisica']; 
          $tmp_pos = strpos($this->capacidad_fisica, "##@@");
          if ($tmp_pos !== false)
          {
              $this->capacidad_fisica = substr($this->capacidad_fisica, 0, $tmp_pos);
          }
          $this->capacidad_fisica_2 = $Busca_temp['capacidad_fisica_input_2']; 
          $this->id_sede = $Busca_temp['id_sede']; 
          $tmp_pos = strpos($this->id_sede, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_sede = substr($this->id_sede, 0, $tmp_pos);
          }
          $this->id_sede_2 = $Busca_temp['id_sede_input_2']; 
          $this->sede = $Busca_temp['sede']; 
          $tmp_pos = strpos($this->sede, "##@@");
          if ($tmp_pos !== false)
          {
              $this->sede = substr($this->sede, 0, $tmp_pos);
          }
          $this->nit = $Busca_temp['nit']; 
          $tmp_pos = strpos($this->nit, "##@@");
          if ($tmp_pos !== false)
          {
              $this->nit = substr($this->nit, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT sede, direccion, telefonos, coordinador_manana, coordinador_tarde, coordinador_nocturno, coordinador_sabado, id_sede, nit, capacidad_fisica, cod_dane from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT sede, direccion, telefonos, coordinador_manana, coordinador_tarde, coordinador_nocturno, coordinador_sabado, id_sede, nit, capacidad_fisica, cod_dane from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['sede'])) ? $this->New_label['sede'] : "Sede"; 
          if ($Cada_col == "sede" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['telefonos'])) ? $this->New_label['telefonos'] : "Telefonos"; 
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
          $SC_Label = (isset($this->New_label['coordinador_manana'])) ? $this->New_label['coordinador_manana'] : "Coordinador Mañana"; 
          if ($Cada_col == "coordinador_manana" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['coordinador_tarde'])) ? $this->New_label['coordinador_tarde'] : "Coordinador Tarde"; 
          if ($Cada_col == "coordinador_tarde" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['coordinador_nocturno'])) ? $this->New_label['coordinador_nocturno'] : "Coordinador Nocturno"; 
          if ($Cada_col == "coordinador_nocturno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['coordinador_sabado'])) ? $this->New_label['coordinador_sabado'] : "Coordinador Sabado"; 
          if ($Cada_col == "coordinador_sabado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['nit'])) ? $this->New_label['nit'] : "Nit"; 
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
          $SC_Label = (isset($this->New_label['capacidad_fisica'])) ? $this->New_label['capacidad_fisica'] : "Capacidad Fisica"; 
          if ($Cada_col == "capacidad_fisica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cod_dane'])) ? $this->New_label['cod_dane'] : "Cod Dane"; 
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
      } 
      $this->Texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->Texto_tag .= "<tr>\r\n";
         $this->sede = $rs->fields[0] ;  
         $this->direccion = $rs->fields[1] ;  
         $this->telefonos = $rs->fields[2] ;  
         $this->coordinador_manana = $rs->fields[3] ;  
         $this->coordinador_manana = (string)$this->coordinador_manana;
         $this->coordinador_tarde = $rs->fields[4] ;  
         $this->coordinador_tarde = (string)$this->coordinador_tarde;
         $this->coordinador_nocturno = $rs->fields[5] ;  
         $this->coordinador_nocturno = (string)$this->coordinador_nocturno;
         $this->coordinador_sabado = $rs->fields[6] ;  
         $this->coordinador_sabado = (string)$this->coordinador_sabado;
         $this->id_sede = $rs->fields[7] ;  
         $this->id_sede = (string)$this->id_sede;
         $this->nit = $rs->fields[8] ;  
         $this->capacidad_fisica = $rs->fields[9] ;  
         $this->capacidad_fisica = (string)$this->capacidad_fisica;
         $this->cod_dane = $rs->fields[10] ;  
         //----- lookup - coordinador_manana
         $this->look_coordinador_manana = $this->coordinador_manana; 
         $this->Lookup->lookup_coordinador_manana($this->look_coordinador_manana, $this->coordinador_manana) ; 
         $this->look_coordinador_manana = ($this->look_coordinador_manana == "&nbsp;") ? "" : $this->look_coordinador_manana; 
         //----- lookup - coordinador_tarde
         $this->look_coordinador_tarde = $this->coordinador_tarde; 
         $this->Lookup->lookup_coordinador_tarde($this->look_coordinador_tarde, $this->coordinador_tarde) ; 
         $this->look_coordinador_tarde = ($this->look_coordinador_tarde == "&nbsp;") ? "" : $this->look_coordinador_tarde; 
         //----- lookup - coordinador_nocturno
         $this->look_coordinador_nocturno = $this->coordinador_nocturno; 
         $this->Lookup->lookup_coordinador_nocturno($this->look_coordinador_nocturno, $this->coordinador_nocturno) ; 
         $this->look_coordinador_nocturno = ($this->look_coordinador_nocturno == "&nbsp;") ? "" : $this->look_coordinador_nocturno; 
         //----- lookup - coordinador_sabado
         $this->look_coordinador_sabado = $this->coordinador_sabado; 
         $this->Lookup->lookup_coordinador_sabado($this->look_coordinador_sabado, $this->coordinador_sabado) ; 
         $this->look_coordinador_sabado = ($this->look_coordinador_sabado == "&nbsp;") ? "" : $this->look_coordinador_sabado; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['field_order'] as $Cada_col)
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
   //----- sede
   function NM_export_sede()
   {
         $this->sede = html_entity_decode($this->sede, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sede = strip_tags($this->sede);
         if (!NM_is_utf8($this->sede))
         {
             $this->sede = sc_convert_encoding($this->sede, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sede = str_replace('<', '&lt;', $this->sede);
         $this->sede = str_replace('>', '&gt;', $this->sede);
         $this->Texto_tag .= "<td>" . $this->sede . "</td>\r\n";
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
   //----- coordinador_manana
   function NM_export_coordinador_manana()
   {
         nmgp_Form_Num_Val($this->look_coordinador_manana, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_coordinador_manana))
         {
             $this->look_coordinador_manana = sc_convert_encoding($this->look_coordinador_manana, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_coordinador_manana = str_replace('<', '&lt;', $this->look_coordinador_manana);
         $this->look_coordinador_manana = str_replace('>', '&gt;', $this->look_coordinador_manana);
         $this->Texto_tag .= "<td>" . $this->look_coordinador_manana . "</td>\r\n";
   }
   //----- coordinador_tarde
   function NM_export_coordinador_tarde()
   {
         nmgp_Form_Num_Val($this->look_coordinador_tarde, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_coordinador_tarde))
         {
             $this->look_coordinador_tarde = sc_convert_encoding($this->look_coordinador_tarde, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_coordinador_tarde = str_replace('<', '&lt;', $this->look_coordinador_tarde);
         $this->look_coordinador_tarde = str_replace('>', '&gt;', $this->look_coordinador_tarde);
         $this->Texto_tag .= "<td>" . $this->look_coordinador_tarde . "</td>\r\n";
   }
   //----- coordinador_nocturno
   function NM_export_coordinador_nocturno()
   {
         nmgp_Form_Num_Val($this->look_coordinador_nocturno, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_coordinador_nocturno))
         {
             $this->look_coordinador_nocturno = sc_convert_encoding($this->look_coordinador_nocturno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_coordinador_nocturno = str_replace('<', '&lt;', $this->look_coordinador_nocturno);
         $this->look_coordinador_nocturno = str_replace('>', '&gt;', $this->look_coordinador_nocturno);
         $this->Texto_tag .= "<td>" . $this->look_coordinador_nocturno . "</td>\r\n";
   }
   //----- coordinador_sabado
   function NM_export_coordinador_sabado()
   {
         nmgp_Form_Num_Val($this->look_coordinador_sabado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_coordinador_sabado))
         {
             $this->look_coordinador_sabado = sc_convert_encoding($this->look_coordinador_sabado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_coordinador_sabado = str_replace('<', '&lt;', $this->look_coordinador_sabado);
         $this->look_coordinador_sabado = str_replace('>', '&gt;', $this->look_coordinador_sabado);
         $this->Texto_tag .= "<td>" . $this->look_coordinador_sabado . "</td>\r\n";
   }
   //----- id_sede
   function NM_export_id_sede()
   {
         nmgp_Form_Num_Val($this->id_sede, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_sede))
         {
             $this->id_sede = sc_convert_encoding($this->id_sede, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_sede = str_replace('<', '&lt;', $this->id_sede);
         $this->id_sede = str_replace('>', '&gt;', $this->id_sede);
         $this->Texto_tag .= "<td>" . $this->id_sede . "</td>\r\n";
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
   //----- capacidad_fisica
   function NM_export_capacidad_fisica()
   {
         nmgp_Form_Num_Val($this->capacidad_fisica, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->capacidad_fisica))
         {
             $this->capacidad_fisica = sc_convert_encoding($this->capacidad_fisica, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->capacidad_fisica = str_replace('<', '&lt;', $this->capacidad_fisica);
         $this->capacidad_fisica = str_replace('>', '&gt;', $this->capacidad_fisica);
         $this->Texto_tag .= "<td>" . $this->capacidad_fisica . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_sedes'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - sedes :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_sedes_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_sedes"> 
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
