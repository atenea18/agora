<?php

class grid_evaluacion_asignaturas_cg_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_evaluacion_asignaturas_cg_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_evaluacion_asignaturas_cg']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_evaluacion_asignaturas_cg']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evaluacion_asignaturas_cg']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->id_estudiante = $Busca_temp['id_estudiante']; 
          $tmp_pos = strpos($this->id_estudiante, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_estudiante = substr($this->id_estudiante, 0, $tmp_pos);
          }
          $id_estudiante_2 = $Busca_temp['id_estudiante_input_2']; 
          $this->id_estudiante_2 = $Busca_temp['id_estudiante_input_2']; 
          $this->primer_apellido = $Busca_temp['primer_apellido']; 
          $tmp_pos = strpos($this->primer_apellido, "##@@");
          if ($tmp_pos !== false)
          {
              $this->primer_apellido = substr($this->primer_apellido, 0, $tmp_pos);
          }
          $this->segundo_apellido = $Busca_temp['segundo_apellido']; 
          $tmp_pos = strpos($this->segundo_apellido, "##@@");
          if ($tmp_pos !== false)
          {
              $this->segundo_apellido = substr($this->segundo_apellido, 0, $tmp_pos);
          }
          $this->primer_nombre = $Busca_temp['primer_nombre']; 
          $tmp_pos = strpos($this->primer_nombre, "##@@");
          if ($tmp_pos !== false)
          {
              $this->primer_nombre = substr($this->primer_nombre, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang , $id_asignatura;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_evaluacion_asignaturas_cg']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evaluacion_asignaturas_cg']['tot_geral'] = array() ;  
      $nm_comando = "select count(*) from (SELECT      id_estudiante,     primer_apellido,     segundo_apellido,     primer_nombre,     segundo_nombre,     id_grupo,     id_area,     id_asignatura,     id_grado,     id_nivel,     ihs,     pfa,     tipo_asig,     novedad,     estatus,     inasistencia_p1,     eval_1_per,     dc1,     dc2,     dc3,     dc4,     dc5,     dp1,     dp2,     dp3,     dp4,     dp5,       ds1,     ds2,     ds3,     ds4,     ds5,     letras_p1,        entorno FROM      t_evaluacion WHERE  id_estudiante = " . $_SESSION['par_id_estudiante'] . " and  id_asignatura =" . $_SESSION['id_asignatura'] . " AND eval_1_per >= (SELECT minimo FROM valoracion WHERE valoracion = 'Bajo')) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evaluacion_asignaturas_cg']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evaluacion_asignaturas_cg']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evaluacion_asignaturas_cg']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_evaluacion_asignaturas_cg']['contr_total_geral'] = "OK";
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
