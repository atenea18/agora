<?php

class grid_estudiantes_n_xml
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
   function grid_estudiantes_n_xml()
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
      $this->Arquivo     .= "_grid_estudiantes_n";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_estudiantes_n.xml";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->students_idstudents = $Busca_temp['students_idstudents']; 
          $tmp_pos = strpos($this->students_idstudents, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_idstudents = substr($this->students_idstudents, 0, $tmp_pos);
          }
          $this->students_idstudents_2 = $Busca_temp['students_idstudents_input_2']; 
          $this->students_id_sede = $Busca_temp['students_id_sede']; 
          $tmp_pos = strpos($this->students_id_sede, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_id_sede = substr($this->students_id_sede, 0, $tmp_pos);
          }
          $this->students_id_jornada = $Busca_temp['students_id_jornada']; 
          $tmp_pos = strpos($this->students_id_jornada, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_id_jornada = substr($this->students_id_jornada, 0, $tmp_pos);
          }
          $this->students_id_jornada_2 = $Busca_temp['students_id_jornada_input_2']; 
          $this->students_numero_documento = $Busca_temp['students_numero_documento']; 
          $tmp_pos = strpos($this->students_numero_documento, "##@@");
          if ($tmp_pos !== false)
          {
              $this->students_numero_documento = substr($this->students_numero_documento, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT students.idstudents as students_idstudents, students.id_sede as students_id_sede, students.id_jornada as students_id_jornada, students.numero_documento as students_numero_documento, students.primer_nombre as students_primer_nombre, students.segundo_nombre as students_segundo_nombre, students.primer_apellido as students_primer_apellido, students.segundo_apellido as students_segundo_apellido, students.grado_igreso as students_grado_igreso, students.id_grupo as students_id_grupo, t_estudiante_grupo.entorno as t_estudiante_grupo_entorno from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT students.idstudents as students_idstudents, students.id_sede as students_id_sede, students.id_jornada as students_id_jornada, students.numero_documento as students_numero_documento, students.primer_nombre as students_primer_nombre, students.segundo_nombre as students_segundo_nombre, students.primer_apellido as students_primer_apellido, students.segundo_apellido as students_segundo_apellido, students.grado_igreso as students_grado_igreso, students.id_grupo as students_id_grupo, t_estudiante_grupo.entorno as t_estudiante_grupo_entorno from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['order_grid'];
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
         $this->xml_registro = "<grid_estudiantes_n";
         $this->students_idstudents = $rs->fields[0] ;  
         $this->students_idstudents = (string)$this->students_idstudents;
         $this->students_id_sede = $rs->fields[1] ;  
         $this->students_id_jornada = $rs->fields[2] ;  
         $this->students_id_jornada = (string)$this->students_id_jornada;
         $this->students_numero_documento = $rs->fields[3] ;  
         $this->students_primer_nombre = $rs->fields[4] ;  
         $this->students_segundo_nombre = $rs->fields[5] ;  
         $this->students_primer_apellido = $rs->fields[6] ;  
         $this->students_segundo_apellido = $rs->fields[7] ;  
         $this->students_grado_igreso = $rs->fields[8] ;  
         $this->students_grado_igreso = (string)$this->students_grado_igreso;
         $this->students_id_grupo = $rs->fields[9] ;  
         $this->students_id_grupo = (string)$this->students_id_grupo;
         $this->t_estudiante_grupo_entorno = $rs->fields[10] ;  
         $this->t_estudiante_grupo_entorno = (string)$this->t_estudiante_grupo_entorno;
         //----- lookup - students_idstudents
         $this->look_students_idstudents = $this->students_idstudents; 
         $this->Lookup->lookup_students_idstudents($this->look_students_idstudents) ; 
         $this->look_students_idstudents = ($this->look_students_idstudents == "&nbsp;") ? "" : $this->look_students_idstudents; 
         //----- lookup - students_id_sede
         $this->look_students_id_sede = $this->students_id_sede; 
         $this->Lookup->lookup_students_id_sede($this->look_students_id_sede, $this->students_id_sede) ; 
         $this->look_students_id_sede = ($this->look_students_id_sede == "&nbsp;") ? "" : $this->look_students_id_sede; 
         //----- lookup - students_id_jornada
         $this->look_students_id_jornada = $this->students_id_jornada; 
         $this->Lookup->lookup_students_id_jornada($this->look_students_id_jornada, $this->students_id_jornada) ; 
         $this->look_students_id_jornada = ($this->look_students_id_jornada == "&nbsp;") ? "" : $this->look_students_id_jornada; 
         //----- lookup - students_grado_igreso
         $this->look_students_grado_igreso = $this->students_grado_igreso; 
         $this->Lookup->lookup_students_grado_igreso($this->look_students_grado_igreso, $this->students_grado_igreso) ; 
         $this->look_students_grado_igreso = ($this->look_students_grado_igreso == "&nbsp;") ? "" : $this->look_students_grado_igreso; 
         //----- lookup - students_id_grupo
         $this->look_students_id_grupo = $this->students_id_grupo; 
         $this->Lookup->lookup_students_id_grupo($this->look_students_id_grupo, $this->students_id_grupo) ; 
         $this->look_students_id_grupo = ($this->look_students_id_grupo == "&nbsp;") ? "" : $this->look_students_id_grupo; 
         $this->sc_proc_grid = true; 
         //----- lookup - dir_grupo
         $this->Lookup->lookup_dir_grupo($this->dir_grupo, $this->students_idstudents, $this->array_dir_grupo); 
         $this->dir_grupo = str_replace("<br>", " ", $this->dir_grupo); 
         $this->dir_grupo = ($this->dir_grupo == "&nbsp;") ? "" : $this->dir_grupo; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['field_order'] as $Cada_col)
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
   //----- students_idstudents
   function NM_export_students_idstudents()
   {
         nmgp_Form_Num_Val($this->look_students_idstudents, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_students_idstudents))
         {
             $this->look_students_idstudents = sc_convert_encoding($this->look_students_idstudents, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_idstudents =\"" . $this->trata_dados($this->look_students_idstudents) . "\"";
   }
   //----- students_id_sede
   function NM_export_students_id_sede()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_students_id_sede))
         {
             $this->look_students_id_sede = sc_convert_encoding($this->look_students_id_sede, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_id_sede =\"" . $this->trata_dados($this->look_students_id_sede) . "\"";
   }
   //----- students_id_jornada
   function NM_export_students_id_jornada()
   {
         nmgp_Form_Num_Val($this->look_students_id_jornada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_students_id_jornada))
         {
             $this->look_students_id_jornada = sc_convert_encoding($this->look_students_id_jornada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_id_jornada =\"" . $this->trata_dados($this->look_students_id_jornada) . "\"";
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
   //----- students_primer_nombre
   function NM_export_students_primer_nombre()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_primer_nombre))
         {
             $this->students_primer_nombre = sc_convert_encoding($this->students_primer_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_primer_nombre =\"" . $this->trata_dados($this->students_primer_nombre) . "\"";
   }
   //----- students_segundo_nombre
   function NM_export_students_segundo_nombre()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_segundo_nombre))
         {
             $this->students_segundo_nombre = sc_convert_encoding($this->students_segundo_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_segundo_nombre =\"" . $this->trata_dados($this->students_segundo_nombre) . "\"";
   }
   //----- students_primer_apellido
   function NM_export_students_primer_apellido()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_primer_apellido))
         {
             $this->students_primer_apellido = sc_convert_encoding($this->students_primer_apellido, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_primer_apellido =\"" . $this->trata_dados($this->students_primer_apellido) . "\"";
   }
   //----- students_segundo_apellido
   function NM_export_students_segundo_apellido()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->students_segundo_apellido))
         {
             $this->students_segundo_apellido = sc_convert_encoding($this->students_segundo_apellido, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_segundo_apellido =\"" . $this->trata_dados($this->students_segundo_apellido) . "\"";
   }
   //----- students_grado_igreso
   function NM_export_students_grado_igreso()
   {
         nmgp_Form_Num_Val($this->look_students_grado_igreso, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_students_grado_igreso))
         {
             $this->look_students_grado_igreso = sc_convert_encoding($this->look_students_grado_igreso, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_grado_igreso =\"" . $this->trata_dados($this->look_students_grado_igreso) . "\"";
   }
   //----- students_id_grupo
   function NM_export_students_id_grupo()
   {
         nmgp_Form_Num_Val($this->look_students_id_grupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_students_id_grupo))
         {
             $this->look_students_id_grupo = sc_convert_encoding($this->look_students_id_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " students_id_grupo =\"" . $this->trata_dados($this->look_students_id_grupo) . "\"";
   }
   //----- t_estudiante_grupo_entorno
   function NM_export_t_estudiante_grupo_entorno()
   {
         nmgp_Form_Num_Val($this->t_estudiante_grupo_entorno, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->t_estudiante_grupo_entorno))
         {
             $this->t_estudiante_grupo_entorno = sc_convert_encoding($this->t_estudiante_grupo_entorno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " t_estudiante_grupo_entorno =\"" . $this->trata_dados($this->t_estudiante_grupo_entorno) . "\"";
   }
   //----- dias_inasiste
   function NM_export_dias_inasiste()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dias_inasiste))
         {
             $this->dias_inasiste = sc_convert_encoding($this->dias_inasiste, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dias_inasiste =\"" . $this->trata_dados($this->dias_inasiste) . "\"";
   }
   //----- dir_grupo
   function NM_export_dir_grupo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dir_grupo))
         {
             $this->dir_grupo = sc_convert_encoding($this->dir_grupo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dir_grupo =\"" . $this->trata_dados($this->dir_grupo) . "\"";
   }
   //----- linea_1
   function NM_export_linea_1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->linea_1))
         {
             $this->linea_1 = sc_convert_encoding($this->linea_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " linea_1 =\"" . $this->trata_dados($this->linea_1) . "\"";
   }
   //----- obs
   function NM_export_obs()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->obs))
         {
             $this->obs = sc_convert_encoding($this->obs, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " obs =\"" . $this->trata_dados($this->obs) . "\"";
   }
   //----- titulo
   function NM_export_titulo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->titulo))
         {
             $this->titulo = sc_convert_encoding($this->titulo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " titulo =\"" . $this->trata_dados($this->titulo) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_estudiantes_n'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE> <?php echo $_SESSION['par_nombre_institucion'] ?> :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_estudiantes_n_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_estudiantes_n"> 
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
