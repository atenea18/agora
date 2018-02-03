<div id="form_students_mob_form2" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_6"><!-- bloco_c -->
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
<TABLE align="center" id="hidden_bloco_6" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf6\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Economía<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero_carne_sisben']))
    {
        $this->nm_new_label['numero_carne_sisben'] = "Numero Carne Sisben";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_carne_sisben = $this->numero_carne_sisben;
   $sStyleHidden_numero_carne_sisben = '';
   if (isset($this->nmgp_cmp_hidden['numero_carne_sisben']) && $this->nmgp_cmp_hidden['numero_carne_sisben'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_carne_sisben']);
       $sStyleHidden_numero_carne_sisben = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_carne_sisben = 'display: none;';
   $sStyleReadInp_numero_carne_sisben = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_carne_sisben']) && $this->nmgp_cmp_readonly['numero_carne_sisben'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_carne_sisben']);
       $sStyleReadLab_numero_carne_sisben = '';
       $sStyleReadInp_numero_carne_sisben = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_carne_sisben']) && $this->nmgp_cmp_hidden['numero_carne_sisben'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_carne_sisben" value="<?php echo $this->form_encode_input($numero_carne_sisben) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numero_carne_sisben_line" id="hidden_field_data_numero_carne_sisben" style="<?php echo $sStyleHidden_numero_carne_sisben; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_carne_sisben_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numero_carne_sisben_label"><span id="id_label_numero_carne_sisben"><?php echo $this->nm_new_label['numero_carne_sisben']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_carne_sisben"]) &&  $this->nmgp_cmp_readonly["numero_carne_sisben"] == "on") { 

 ?>
<input type="hidden" name="numero_carne_sisben" value="<?php echo $this->form_encode_input($numero_carne_sisben) . "\">" . $numero_carne_sisben . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_carne_sisben" class="sc-ui-readonly-numero_carne_sisben css_numero_carne_sisben_line" style="<?php echo $sStyleReadLab_numero_carne_sisben; ?>"><?php echo $this->form_encode_input($this->numero_carne_sisben); ?></span><span id="id_read_off_numero_carne_sisben" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_carne_sisben; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_carne_sisben_obj" style="" id="id_sc_field_numero_carne_sisben" type=text name="numero_carne_sisben" value="<?php echo $this->form_encode_input($numero_carne_sisben) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_carne_sisben_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_carne_sisben_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nivel_sisben']))
    {
        $this->nm_new_label['nivel_sisben'] = "Nivel Sisben";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nivel_sisben = $this->nivel_sisben;
   $sStyleHidden_nivel_sisben = '';
   if (isset($this->nmgp_cmp_hidden['nivel_sisben']) && $this->nmgp_cmp_hidden['nivel_sisben'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nivel_sisben']);
       $sStyleHidden_nivel_sisben = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nivel_sisben = 'display: none;';
   $sStyleReadInp_nivel_sisben = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nivel_sisben']) && $this->nmgp_cmp_readonly['nivel_sisben'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nivel_sisben']);
       $sStyleReadLab_nivel_sisben = '';
       $sStyleReadInp_nivel_sisben = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nivel_sisben']) && $this->nmgp_cmp_hidden['nivel_sisben'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nivel_sisben" value="<?php echo $this->form_encode_input($nivel_sisben) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nivel_sisben_line" id="hidden_field_data_nivel_sisben" style="<?php echo $sStyleHidden_nivel_sisben; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nivel_sisben_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nivel_sisben_label"><span id="id_label_nivel_sisben"><?php echo $this->nm_new_label['nivel_sisben']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nivel_sisben"]) &&  $this->nmgp_cmp_readonly["nivel_sisben"] == "on") { 

 ?>
<input type="hidden" name="nivel_sisben" value="<?php echo $this->form_encode_input($nivel_sisben) . "\">" . $nivel_sisben . ""; ?>
<?php } else { ?>
<span id="id_read_on_nivel_sisben" class="sc-ui-readonly-nivel_sisben css_nivel_sisben_line" style="<?php echo $sStyleReadLab_nivel_sisben; ?>"><?php echo $this->form_encode_input($this->nivel_sisben); ?></span><span id="id_read_off_nivel_sisben" style="white-space: nowrap;<?php echo $sStyleReadInp_nivel_sisben; ?>">
 <input class="sc-js-input scFormObjectOdd css_nivel_sisben_obj" style="" id="id_sc_field_nivel_sisben" type=text name="nivel_sisben" value="<?php echo $this->form_encode_input($nivel_sisben) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nivel_sisben_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nivel_sisben_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['estrato']))
   {
       $this->nm_new_label['estrato'] = "Estrato";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estrato = $this->estrato;
   $sStyleHidden_estrato = '';
   if (isset($this->nmgp_cmp_hidden['estrato']) && $this->nmgp_cmp_hidden['estrato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estrato']);
       $sStyleHidden_estrato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estrato = 'display: none;';
   $sStyleReadInp_estrato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estrato']) && $this->nmgp_cmp_readonly['estrato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estrato']);
       $sStyleReadLab_estrato = '';
       $sStyleReadInp_estrato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estrato']) && $this->nmgp_cmp_hidden['estrato'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="estrato" value="<?php echo $this->form_encode_input($this->estrato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estrato_line" id="hidden_field_data_estrato" style="<?php echo $sStyleHidden_estrato; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estrato_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estrato_label"><span id="id_label_estrato"><?php echo $this->nm_new_label['estrato']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estrato"]) &&  $this->nmgp_cmp_readonly["estrato"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'] = array(); 
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

   $nm_comando = "SELECT id_estrato, estrato 
FROM estrato 
ORDER BY estrato";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'][] = $rs->fields[0];
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
   $estrato_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->estrato_1))
          {
              foreach ($this->estrato_1 as $tmp_estrato)
              {
                  if (trim($tmp_estrato) === trim($cadaselect[1])) { $estrato_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->estrato) === trim($cadaselect[1])) { $estrato_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="estrato" value="<?php echo $this->form_encode_input($estrato) . "\">" . $estrato_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'] = array(); 
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

   $nm_comando = "SELECT id_estrato, estrato 
FROM estrato 
ORDER BY estrato";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'][] = $rs->fields[0];
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
   $estrato_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->estrato_1))
          {
              foreach ($this->estrato_1 as $tmp_estrato)
              {
                  if (trim($tmp_estrato) === trim($cadaselect[1])) { $estrato_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->estrato) === trim($cadaselect[1])) { $estrato_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($estrato_look))
          {
              $estrato_look = $this->estrato;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_estrato\" class=\"css_estrato_line\" style=\"" .  $sStyleReadLab_estrato . "\">" . $this->form_encode_input($estrato_look) . "</span><span id=\"id_read_off_estrato\" style=\"" . $sStyleReadInp_estrato . "\">";
   echo " <span id=\"idAjaxSelect_estrato\"><select class=\"sc-js-input scFormObjectOdd css_estrato_obj\" style=\"\" id=\"id_sc_field_estrato\" name=\"estrato\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estrato'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->estrato) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->estrato)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estrato_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estrato_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fuente_recurso']))
   {
       $this->nm_new_label['fuente_recurso'] = "Fuente Recurso";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fuente_recurso = $this->fuente_recurso;
   $sStyleHidden_fuente_recurso = '';
   if (isset($this->nmgp_cmp_hidden['fuente_recurso']) && $this->nmgp_cmp_hidden['fuente_recurso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fuente_recurso']);
       $sStyleHidden_fuente_recurso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fuente_recurso = 'display: none;';
   $sStyleReadInp_fuente_recurso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fuente_recurso']) && $this->nmgp_cmp_readonly['fuente_recurso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fuente_recurso']);
       $sStyleReadLab_fuente_recurso = '';
       $sStyleReadInp_fuente_recurso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fuente_recurso']) && $this->nmgp_cmp_hidden['fuente_recurso'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fuente_recurso" value="<?php echo $this->form_encode_input($this->fuente_recurso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fuente_recurso_line" id="hidden_field_data_fuente_recurso" style="<?php echo $sStyleHidden_fuente_recurso; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fuente_recurso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fuente_recurso_label"><span id="id_label_fuente_recurso"><?php echo $this->nm_new_label['fuente_recurso']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fuente_recurso"]) &&  $this->nmgp_cmp_readonly["fuente_recurso"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'] = array(); 
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

   $nm_comando = "SELECT id_fuente_recurso, fuente_recurso 
FROM fuente_recurso 
ORDER BY fuente_recurso";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'][] = $rs->fields[0];
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
   $fuente_recurso_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->fuente_recurso_1))
          {
              foreach ($this->fuente_recurso_1 as $tmp_fuente_recurso)
              {
                  if (trim($tmp_fuente_recurso) === trim($cadaselect[1])) { $fuente_recurso_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->fuente_recurso) === trim($cadaselect[1])) { $fuente_recurso_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="fuente_recurso" value="<?php echo $this->form_encode_input($fuente_recurso) . "\">" . $fuente_recurso_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'] = array(); 
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

   $nm_comando = "SELECT id_fuente_recurso, fuente_recurso 
FROM fuente_recurso 
ORDER BY fuente_recurso";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'][] = $rs->fields[0];
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
   $fuente_recurso_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->fuente_recurso_1))
          {
              foreach ($this->fuente_recurso_1 as $tmp_fuente_recurso)
              {
                  if (trim($tmp_fuente_recurso) === trim($cadaselect[1])) { $fuente_recurso_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->fuente_recurso) === trim($cadaselect[1])) { $fuente_recurso_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($fuente_recurso_look))
          {
              $fuente_recurso_look = $this->fuente_recurso;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_fuente_recurso\" class=\"css_fuente_recurso_line\" style=\"" .  $sStyleReadLab_fuente_recurso . "\">" . $this->form_encode_input($fuente_recurso_look) . "</span><span id=\"id_read_off_fuente_recurso\" style=\"" . $sStyleReadInp_fuente_recurso . "\">";
   echo " <span id=\"idAjaxSelect_fuente_recurso\"><select class=\"sc-js-input scFormObjectOdd css_fuente_recurso_obj\" style=\"\" id=\"id_sc_field_fuente_recurso\" name=\"fuente_recurso\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_fuente_recurso'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->fuente_recurso) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->fuente_recurso)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fuente_recurso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fuente_recurso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['opcion']))
   {
       $this->nm_new_label['opcion'] = "Opcion";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $opcion = $this->opcion;
   $sStyleHidden_opcion = '';
   if (isset($this->nmgp_cmp_hidden['opcion']) && $this->nmgp_cmp_hidden['opcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['opcion']);
       $sStyleHidden_opcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_opcion = 'display: none;';
   $sStyleReadInp_opcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['opcion']) && $this->nmgp_cmp_readonly['opcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['opcion']);
       $sStyleReadLab_opcion = '';
       $sStyleReadInp_opcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['opcion']) && $this->nmgp_cmp_hidden['opcion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="opcion" value="<?php echo $this->form_encode_input($this->opcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_opcion_line" id="hidden_field_data_opcion" style="<?php echo $sStyleHidden_opcion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_opcion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_opcion_label"><span id="id_label_opcion"><?php echo $this->nm_new_label['opcion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["opcion"]) &&  $this->nmgp_cmp_readonly["opcion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'] = array(); 
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

   $nm_comando = "SELECT id_opcion, opcion 
FROM opcion 
ORDER BY opcion";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'][] = $rs->fields[0];
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
   $opcion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->opcion_1))
          {
              foreach ($this->opcion_1 as $tmp_opcion)
              {
                  if (trim($tmp_opcion) === trim($cadaselect[1])) { $opcion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->opcion) === trim($cadaselect[1])) { $opcion_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="opcion" value="<?php echo $this->form_encode_input($opcion) . "\">" . $opcion_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'] = array(); 
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

   $nm_comando = "SELECT id_opcion, opcion 
FROM opcion 
ORDER BY opcion";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'][] = $rs->fields[0];
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
   $opcion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->opcion_1))
          {
              foreach ($this->opcion_1 as $tmp_opcion)
              {
                  if (trim($tmp_opcion) === trim($cadaselect[1])) { $opcion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->opcion) === trim($cadaselect[1])) { $opcion_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($opcion_look))
          {
              $opcion_look = $this->opcion;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_opcion\" class=\"css_opcion_line\" style=\"" .  $sStyleReadLab_opcion . "\">" . $this->form_encode_input($opcion_look) . "</span><span id=\"id_read_off_opcion\" style=\"" . $sStyleReadInp_opcion . "\">";
   echo " <span id=\"idAjaxSelect_opcion\"><select class=\"sc-js-input scFormObjectOdd css_opcion_obj\" style=\"\" id=\"id_sc_field_opcion\" name=\"opcion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_opcion'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->opcion) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->opcion)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_opcion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_opcion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_opcion_dumb = ('' == $sStyleHidden_opcion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_opcion_dumb" style="<?php echo $sStyleHidden_opcion_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_7"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_7"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_7" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf7\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Territorialidad<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['resguardo']))
    {
        $this->nm_new_label['resguardo'] = "Resguardo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resguardo = $this->resguardo;
   $sStyleHidden_resguardo = '';
   if (isset($this->nmgp_cmp_hidden['resguardo']) && $this->nmgp_cmp_hidden['resguardo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resguardo']);
       $sStyleHidden_resguardo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resguardo = 'display: none;';
   $sStyleReadInp_resguardo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resguardo']) && $this->nmgp_cmp_readonly['resguardo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resguardo']);
       $sStyleReadLab_resguardo = '';
       $sStyleReadInp_resguardo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resguardo']) && $this->nmgp_cmp_hidden['resguardo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="resguardo" value="<?php echo $this->form_encode_input($resguardo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_resguardo_line" id="hidden_field_data_resguardo" style="<?php echo $sStyleHidden_resguardo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resguardo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_resguardo_label"><span id="id_label_resguardo"><?php echo $this->nm_new_label['resguardo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resguardo"]) &&  $this->nmgp_cmp_readonly["resguardo"] == "on") { 

 ?>
<input type="hidden" name="resguardo" value="<?php echo $this->form_encode_input($resguardo) . "\">" . $resguardo . ""; ?>
<?php } else { ?>
<span id="id_read_on_resguardo" class="sc-ui-readonly-resguardo css_resguardo_line" style="<?php echo $sStyleReadLab_resguardo; ?>"><?php echo $this->form_encode_input($this->resguardo); ?></span><span id="id_read_off_resguardo" style="white-space: nowrap;<?php echo $sStyleReadInp_resguardo; ?>">
 <input class="sc-js-input scFormObjectOdd css_resguardo_obj" style="" id="id_sc_field_resguardo" type=text name="resguardo" value="<?php echo $this->form_encode_input($resguardo) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resguardo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resguardo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['negritudes']))
    {
        $this->nm_new_label['negritudes'] = "Negritudes";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $negritudes = $this->negritudes;
   $sStyleHidden_negritudes = '';
   if (isset($this->nmgp_cmp_hidden['negritudes']) && $this->nmgp_cmp_hidden['negritudes'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['negritudes']);
       $sStyleHidden_negritudes = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_negritudes = 'display: none;';
   $sStyleReadInp_negritudes = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['negritudes']) && $this->nmgp_cmp_readonly['negritudes'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['negritudes']);
       $sStyleReadLab_negritudes = '';
       $sStyleReadInp_negritudes = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['negritudes']) && $this->nmgp_cmp_hidden['negritudes'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="negritudes" value="<?php echo $this->form_encode_input($negritudes) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_negritudes_line" id="hidden_field_data_negritudes" style="<?php echo $sStyleHidden_negritudes; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_negritudes_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_negritudes_label"><span id="id_label_negritudes"><?php echo $this->nm_new_label['negritudes']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["negritudes"]) &&  $this->nmgp_cmp_readonly["negritudes"] == "on") { 

 if ("Y" == $this->negritudes) { $negritudes_look = "Sí";} 
 if ("N" == $this->negritudes) { $negritudes_look = "No";} 
?>
<input type="hidden" name="negritudes" value="<?php echo $this->form_encode_input($negritudes) . "\">" . $negritudes_look . ""; ?>
<?php } else { ?>

<?php

 if ("Y" == $this->negritudes) { $negritudes_look = "Sí";} 
 if ("N" == $this->negritudes) { $negritudes_look = "No";} 
?>
<span id="id_read_on_negritudes"  class="css_negritudes_line" style="<?php echo $sStyleReadLab_negritudes; ?>"><?php echo $this->form_encode_input($negritudes_look); ?></span><span id="id_read_off_negritudes" style="<?php echo $sStyleReadInp_negritudes; ?>"><div id="idAjaxRadio_negritudes" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_negritudes_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="negritudes" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_negritudes'][] = 'Y'; ?>
<?php  if ("Y" == $this->negritudes)  { echo " checked" ;} ?>  onClick="" >Sí</TD>
  <TD class="scFormDataFontOdd css_negritudes_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="negritudes" value="N"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_negritudes'][] = 'N'; ?>
<?php  if ("N" == $this->negritudes)  { echo " checked" ;} ?>  onClick="" >No</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_negritudes_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_negritudes_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['etnia']))
    {
        $this->nm_new_label['etnia'] = "Etnia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $etnia = $this->etnia;
   $sStyleHidden_etnia = '';
   if (isset($this->nmgp_cmp_hidden['etnia']) && $this->nmgp_cmp_hidden['etnia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['etnia']);
       $sStyleHidden_etnia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_etnia = 'display: none;';
   $sStyleReadInp_etnia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['etnia']) && $this->nmgp_cmp_readonly['etnia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['etnia']);
       $sStyleReadLab_etnia = '';
       $sStyleReadInp_etnia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['etnia']) && $this->nmgp_cmp_hidden['etnia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="etnia" value="<?php echo $this->form_encode_input($etnia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_etnia_line" id="hidden_field_data_etnia" style="<?php echo $sStyleHidden_etnia; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_etnia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_etnia_label"><span id="id_label_etnia"><?php echo $this->nm_new_label['etnia']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["etnia"]) &&  $this->nmgp_cmp_readonly["etnia"] == "on") { 

 ?>
<input type="hidden" name="etnia" value="<?php echo $this->form_encode_input($etnia) . "\">" . $etnia . ""; ?>
<?php } else { ?>
<span id="id_read_on_etnia" class="sc-ui-readonly-etnia css_etnia_line" style="<?php echo $sStyleReadLab_etnia; ?>"><?php echo $this->form_encode_input($this->etnia); ?></span><span id="id_read_off_etnia" style="white-space: nowrap;<?php echo $sStyleReadInp_etnia; ?>">
 <input class="sc-js-input scFormObjectOdd css_etnia_obj" style="" id="id_sc_field_etnia" type=text name="etnia" value="<?php echo $this->form_encode_input($etnia) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_etnia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_etnia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
