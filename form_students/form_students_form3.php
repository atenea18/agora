<div id="form_students_form3" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_8"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['firstname']))
   {
       $this->nmgp_cmp_hidden['firstname'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['lastname']))
   {
       $this->nmgp_cmp_hidden['lastname'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['postalcode']))
   {
       $this->nmgp_cmp_hidden['postalcode'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_8" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="3" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf8\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Capacidades Discapacidades<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php $sStyleHidden_resguardo_dumb = ('' == $sStyleHidden_resguardo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_resguardo_dumb" style="<?php echo $sStyleHidden_resguardo_dumb; ?>"></TD>
<?php $sStyleHidden_negritudes_dumb = ('' == $sStyleHidden_negritudes) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_negritudes_dumb" style="<?php echo $sStyleHidden_negritudes_dumb; ?>"></TD>
<?php $sStyleHidden_etnia_dumb = ('' == $sStyleHidden_etnia) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_etnia_dumb" style="<?php echo $sStyleHidden_etnia_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['discapacidades']))
   {
       $this->nm_new_label['discapacidades'] = "Discapacidades";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $discapacidades = $this->discapacidades;
   $sStyleHidden_discapacidades = '';
   if (isset($this->nmgp_cmp_hidden['discapacidades']) && $this->nmgp_cmp_hidden['discapacidades'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['discapacidades']);
       $sStyleHidden_discapacidades = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_discapacidades = 'display: none;';
   $sStyleReadInp_discapacidades = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['discapacidades']) && $this->nmgp_cmp_readonly['discapacidades'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['discapacidades']);
       $sStyleReadLab_discapacidades = '';
       $sStyleReadInp_discapacidades = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['discapacidades']) && $this->nmgp_cmp_hidden['discapacidades'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="discapacidades" value="<?php echo $this->form_encode_input($this->discapacidades) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_discapacidades_line" id="hidden_field_data_discapacidades" style="<?php echo $sStyleHidden_discapacidades; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_discapacidades_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_discapacidades_label"><span id="id_label_discapacidades"><?php echo $this->nm_new_label['discapacidades']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["discapacidades"]) &&  $this->nmgp_cmp_readonly["discapacidades"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_discapacidad, discapacidad 
FROM discapacidades 
ORDER BY discapacidad";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $discapacidades_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->discapacidades_1))
          {
              foreach ($this->discapacidades_1 as $tmp_discapacidades)
              {
                  if (trim($tmp_discapacidades) === trim($cadaselect[1])) { $discapacidades_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->discapacidades) === trim($cadaselect[1])) { $discapacidades_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="discapacidades" value="<?php echo $this->form_encode_input($discapacidades) . "\">" . $discapacidades_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_discapacidad, discapacidad 
FROM discapacidades 
ORDER BY discapacidad";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $discapacidades_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->discapacidades_1))
          {
              foreach ($this->discapacidades_1 as $tmp_discapacidades)
              {
                  if (trim($tmp_discapacidades) === trim($cadaselect[1])) { $discapacidades_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->discapacidades) === trim($cadaselect[1])) { $discapacidades_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($discapacidades_look))
          {
              $discapacidades_look = $this->discapacidades;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_discapacidades\" class=\"css_discapacidades_line\" style=\"" .  $sStyleReadLab_discapacidades . "\">" . $this->form_encode_input($discapacidades_look) . "</span><span id=\"id_read_off_discapacidades\" style=\"" . $sStyleReadInp_discapacidades . "\">";
   echo " <span id=\"idAjaxSelect_discapacidades\"><select class=\"sc-js-input scFormObjectOdd css_discapacidades_obj\" style=\"\" id=\"id_sc_field_discapacidades\" name=\"discapacidades\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->discapacidades) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->discapacidades)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_discapacidades_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_discapacidades_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['capacidades']))
   {
       $this->nm_new_label['capacidades'] = "Capacidades";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $capacidades = $this->capacidades;
   $sStyleHidden_capacidades = '';
   if (isset($this->nmgp_cmp_hidden['capacidades']) && $this->nmgp_cmp_hidden['capacidades'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['capacidades']);
       $sStyleHidden_capacidades = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_capacidades = 'display: none;';
   $sStyleReadInp_capacidades = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['capacidades']) && $this->nmgp_cmp_readonly['capacidades'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['capacidades']);
       $sStyleReadLab_capacidades = '';
       $sStyleReadInp_capacidades = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['capacidades']) && $this->nmgp_cmp_hidden['capacidades'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="capacidades" value="<?php echo $this->form_encode_input($this->capacidades) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_capacidades_line" id="hidden_field_data_capacidades" style="<?php echo $sStyleHidden_capacidades; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_capacidades_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_capacidades_label"><span id="id_label_capacidades"><?php echo $this->nm_new_label['capacidades']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["capacidades"]) &&  $this->nmgp_cmp_readonly["capacidades"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_capacidad_excp, capacidad 
FROM capacidades 
ORDER BY capacidad";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $capacidades_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->capacidades_1))
          {
              foreach ($this->capacidades_1 as $tmp_capacidades)
              {
                  if (trim($tmp_capacidades) === trim($cadaselect[1])) { $capacidades_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->capacidades) === trim($cadaselect[1])) { $capacidades_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="capacidades" value="<?php echo $this->form_encode_input($capacidades) . "\">" . $capacidades_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_capacidad_excp, capacidad 
FROM capacidades 
ORDER BY capacidad";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $capacidades_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->capacidades_1))
          {
              foreach ($this->capacidades_1 as $tmp_capacidades)
              {
                  if (trim($tmp_capacidades) === trim($cadaselect[1])) { $capacidades_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->capacidades) === trim($cadaselect[1])) { $capacidades_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($capacidades_look))
          {
              $capacidades_look = $this->capacidades;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_capacidades\" class=\"css_capacidades_line\" style=\"" .  $sStyleReadLab_capacidades . "\">" . $this->form_encode_input($capacidades_look) . "</span><span id=\"id_read_off_capacidades\" style=\"" . $sStyleReadInp_capacidades . "\">";
   echo " <span id=\"idAjaxSelect_capacidades\"><select class=\"sc-js-input scFormObjectOdd css_capacidades_obj\" style=\"\" id=\"id_sc_field_capacidades\" name=\"capacidades\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->capacidades) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->capacidades)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_capacidades_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_capacidades_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
