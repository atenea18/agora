<?php

class grid_t_evaluacion_r_cg_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_t_evaluacion_r_cg_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_t_evaluacion_r_cg']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_t_evaluacion_r_cg']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang , $id_asignatura;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['tot_geral'] = array() ;  
      $nm_comando = "select count(*) from (SELECT      id_estudiante,     primer_apellido,     segundo_apellido,     primer_nombre,     segundo_nombre,     id_grupo,     id_area,     id_asignatura,     id_grado,     id_nivel,     ihs,     pfa,     tipo_asig,     novedad,     estatus,     inasistencia_p1,     eval_1_per,     dc1,     dc2,     dc3,     dc4,     dc5,     dc6,     dc7,     dc8,     dc9,     dc10,     dc11,     dc12,     letras_p1,     pcent_dc,     ds1,     ds2,     ds3,     ds4,     ds5,     pcent_ds,     dp1,     dp2,     dp3,     dp4,     dp5,     pcent_dp,     aeep1,     porcent_aeep1,     inasistencia_p2,     eval_2_per,     dc1_2p,     dc2_2p,     dc3_2p,     dc4_2p,     dc5_2p,     pcent_dc2,     ds1_2p,     ds2_2p,     ds3_2p,     ds4_2p,     ds5_2p,     pcent_ds2,     dp1_2p,     dp2_2p,     dp3_2p,     dp4_2p,     dp5_2p,     pcent_dp2,     aee_p2,     letras_p2,     porcet_aee_p2,     inasistencia_p3,     eval_3_per,     dc1_3p,     dc2_3p,     dc3_3p,     dc4_3p,     dc5_3p,     pcent_dc3,     ds1_p3,     ds2_p3,     ds3_p3,     ds4_p3,     ds5_p3,     pcent_ds3,     dp1_p3,     dp2_p3,     dp3_p3,     dp4_p3,     `dp5-p3`,     pcent_dp3,     aee_p3,     letras_p3,     porcent_aee_p3,     inasistencia_p4,     eval_4_per,     dc1_p4,     dc2_p4,     dc3_p4,     dc4_p4,     dc5_p4,     pcent_dc4,     ds1_p4,     ds2_p4,     ds3_p4,     ds4_p4,     ds5_p4,     pcent_ds4,     dp1_p4,     dp2_p4,     dp3_p4,     dp4_p4,     dp5_p4,     aee_p4,     letras_p4,     porcent_aee_p4,     pcent_dp4,     eval_final,     entorno FROM      t_evaluacion WHERE id_estudiante = " . $_SESSION['par_id_estudiante'] . " AND eval_1_per >= (SELECT minimo FROM valoracion WHERE valoracion = 'Bajo')) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_t_evaluacion_r_cg']['contr_total_geral'] = "OK";
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
