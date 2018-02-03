<?php

class grid_matricula_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_matricula_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_matricula']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_matricula']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['campos_busca'];
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
          $idstudents_2 = $Busca_temp['idstudents_input_2']; 
          $this->idstudents_2 = $Busca_temp['idstudents_input_2']; 
          $this->year_matricula = $Busca_temp['year_matricula']; 
          $tmp_pos = strpos($this->year_matricula, "##@@");
          if ($tmp_pos !== false)
          {
              $this->year_matricula = substr($this->year_matricula, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false)
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->id_grado = $Busca_temp['id_grado']; 
          $tmp_pos = strpos($this->id_grado, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_grado = substr($this->id_grado, 0, $tmp_pos);
          }
          $id_grado_2 = $Busca_temp['id_grado_input_2']; 
          $this->id_grado_2 = $Busca_temp['id_grado_input_2']; 
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang , $idstudents, $id_grado, $id_sede, $id_jornada;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['tot_geral'] = array() ;  
      $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['contr_total_geral'] = "OK";
   } 

   //-----  id_grado
   function quebra_id_grado_sc_free_group_by($id_grado, $Where_qb) 
   {
      global $tot_id_grado , $idstudents, $id_grado, $id_sede, $id_jornada;  
      $tot_id_grado = array() ;  
      $tot_id_grado[0] = $id_grado ; 
   }
   //-----  id_sede
   function quebra_id_sede_sc_free_group_by($id_sede, $Where_qb) 
   {
      global $tot_id_sede , $idstudents, $id_grado, $id_sede, $id_jornada;  
      $tot_id_sede = array() ;  
      $tot_id_sede[0] = $id_sede ; 
   }
   //-----  id_jornada
   function quebra_id_jornada_sc_free_group_by($id_jornada, $Where_qb) 
   {
      global $tot_id_jornada , $idstudents, $id_grado, $id_sede, $id_jornada;  
      $tot_id_jornada = array() ;  
      $tot_id_jornada[0] = $id_jornada ; 
   }

   //----- 
   function resumo_sc_free_group_by($destino_resumo, &$array_total_id_grado, &$array_total_id_sede, &$array_total_id_jornada)
   {
      global $nada, $nm_lang, $idstudents, $id_grado, $id_sede, $id_jornada;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['campos_busca'];
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
       $this->year_matricula = $Busca_temp['year_matricula']; 
       $tmp_pos = strpos($this->year_matricula, "##@@");
       if ($tmp_pos !== false)
       {
           $this->year_matricula = substr($this->year_matricula, 0, $tmp_pos);
       }
       $this->fecha = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha, "##@@");
       if ($tmp_pos !== false)
       {
           $this->fecha = substr($this->fecha, 0, $tmp_pos);
       }
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->id_grado = $Busca_temp['id_grado']; 
       $tmp_pos = strpos($this->id_grado, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_grado = substr($this->id_grado, 0, $tmp_pos);
       }
       $this->id_grado_2 = $Busca_temp['id_grado_input_2']; 
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['where_pesq_filtro'];
   $temp = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['SC_Gb_Free_sql'] as $cmp_gb => $ord)
   {
       $temp .= (empty($temp)) ? $cmp_gb . " " . $ord : ", " . $cmp_gb . " " . $ord;
   }
   $nmgp_order_by = (!empty($temp)) ? " order by " . $temp : "";
   $free_group_by = "";
   $all_sql_free  = array();
   $all_sql_free[] = "id_grado";
   $all_sql_free[] = "id_sede";
   $all_sql_free[] = "id_jornada";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['SC_Gb_Free_sql'] as $cmp_gb => $ord)
   {
       $free_group_by .= (empty($free_group_by)) ? $cmp_gb : ", " . $cmp_gb;
   }
   foreach ($all_sql_free as $cmp_gb)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['SC_Gb_Free_sql'][$cmp_gb]))
       {
           $free_group_by .= (empty($free_group_by)) ? $cmp_gb : ", " . $cmp_gb;
       }
   }
     $comando  = "select count(*), id_grado, id_sede, id_jornada from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by " . $free_group_by . "  " . $nmgp_order_by;
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $id_grado      = $registro[1];
         $id_grado_orig = $registro[1];
         $conteudo = $registro[1];
         $this->Lookup->lookup_id_grado($conteudo , $id_grado_orig) ; 
         $id_grado = $conteudo;
         if (null === $id_grado)
         {
             $id_grado = '';
         }
         if (null === $id_grado_orig)
         {
             $id_grado_orig = '';
         }
         $val_grafico_id_grado = $id_grado;
         $id_sede      = $registro[2];
         $id_sede_orig = $registro[2];
         $conteudo = $registro[2];
         $this->Lookup->lookup_id_sede($conteudo , $id_sede_orig) ; 
         $id_sede = $conteudo;
         if (null === $id_sede)
         {
             $id_sede = '';
         }
         if (null === $id_sede_orig)
         {
             $id_sede_orig = '';
         }
         $val_grafico_id_sede = $id_sede;
         $id_jornada      = $registro[3];
         $id_jornada_orig = $registro[3];
         $conteudo = $registro[3];
         $this->Lookup->lookup_id_jornada($conteudo , $id_jornada_orig) ; 
         $id_jornada = $conteudo;
         if (null === $id_jornada)
         {
             $id_jornada = '';
         }
         if (null === $id_jornada_orig)
         {
             $id_jornada_orig = '';
         }
         $val_grafico_id_jornada = $id_jornada;
         $id_grado_orig        = NM_encode_input(sc_strip_script($id_grado_orig));
         $val_grafico_id_grado = NM_encode_input(sc_strip_script($val_grafico_id_grado));
         $id_sede_orig        = NM_encode_input(sc_strip_script($id_sede_orig));
         $val_grafico_id_sede = NM_encode_input(sc_strip_script($val_grafico_id_sede));
         $id_jornada_orig        = NM_encode_input(sc_strip_script($id_jornada_orig));
         $val_grafico_id_jornada = NM_encode_input(sc_strip_script($val_grafico_id_jornada));
         $contr_arr = "";
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_matricula']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
         {
             $temp       = $cmp_gb . "_orig";
             $contr_arr .= "[\"" . str_replace('"', '\"', $$temp) . "\"]";
             $arr_name   = "array_total_" . $cmp_gb . $contr_arr;
            eval ('
             if (!isset($' . $arr_name . '))
             {
                 $' . $arr_name . '[0] = ' . $registro[0] . ';
                 $' . $arr_name . '[1] = $val_grafico_' . $cmp_gb . ';
                 $' . $arr_name . '[2] = "' . str_replace('"', '\"', $$temp) . '";
             }
             else
             {
                 $' . $arr_name . '[0] += ' . $registro[0] . ';
             }
            ');
         }
      }
   }
   //-----
   function get_array($rs)
   {
       if ('ado_mssql' != $this->Ini->nm_tpbanco)
       {
           return $rs->GetArray();
       }

       $array_db_total = array();
       while (!$rs->EOF)
       {
           $arr_row = array();
           foreach ($rs->fields as $k => $v)
           {
               $arr_row[$k] = $v . '';
           }
           $array_db_total[] = $arr_row;
           $rs->MoveNext();
       }
       return $array_db_total;
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
