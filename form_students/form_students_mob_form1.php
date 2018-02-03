<div id="form_students_mob_form1" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
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
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf4\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Salud<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['eps']))
   {
       $this->nm_new_label['eps'] = "Eps";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $eps = $this->eps;
   $sStyleHidden_eps = '';
   if (isset($this->nmgp_cmp_hidden['eps']) && $this->nmgp_cmp_hidden['eps'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['eps']);
       $sStyleHidden_eps = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_eps = 'display: none;';
   $sStyleReadInp_eps = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['eps']) && $this->nmgp_cmp_readonly['eps'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['eps']);
       $sStyleReadLab_eps = '';
       $sStyleReadInp_eps = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['eps']) && $this->nmgp_cmp_hidden['eps'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="eps" value="<?php echo $this->form_encode_input($this->eps) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_eps_line" id="hidden_field_data_eps" style="<?php echo $sStyleHidden_eps; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_eps_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_eps_label"><span id="id_label_eps"><?php echo $this->nm_new_label['eps']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["eps"]) &&  $this->nmgp_cmp_readonly["eps"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps'] = array(); 
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

   $nm_comando = "SELECT id_eps, eps_nombre 
FROM eps 
ORDER BY eps_nombre";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps'][] = $rs->fields[0];
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
   $eps_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->eps_1))
          {
              foreach ($this->eps_1 as $tmp_eps)
              {
                  if (trim($tmp_eps) === trim($cadaselect[1])) { $eps_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->eps) === trim($cadaselect[1])) { $eps_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="eps" value="<?php echo $this->form_encode_input($eps) . "\">" . $eps_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps'] = array(); 
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

   $nm_comando = "SELECT id_eps, eps_nombre 
FROM eps 
ORDER BY eps_nombre";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_eps'][] = $rs->fields[0];
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
   $eps_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->eps_1))
          {
              foreach ($this->eps_1 as $tmp_eps)
              {
                  if (trim($tmp_eps) === trim($cadaselect[1])) { $eps_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->eps) === trim($cadaselect[1])) { $eps_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($eps_look))
          {
              $eps_look = $this->eps;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_eps\" class=\"css_eps_line\" style=\"" .  $sStyleReadLab_eps . "\">" . $this->form_encode_input($eps_look) . "</span><span id=\"id_read_off_eps\" style=\"" . $sStyleReadInp_eps . "\">";
   echo " <span id=\"idAjaxSelect_eps\"><select class=\"sc-js-input scFormObjectOdd css_eps_obj\" style=\"\" id=\"id_sc_field_eps\" name=\"eps\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->eps) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->eps)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_eps_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_eps_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ips']))
    {
        $this->nm_new_label['ips'] = "Ips";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ips = $this->ips;
   $sStyleHidden_ips = '';
   if (isset($this->nmgp_cmp_hidden['ips']) && $this->nmgp_cmp_hidden['ips'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ips']);
       $sStyleHidden_ips = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ips = 'display: none;';
   $sStyleReadInp_ips = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ips']) && $this->nmgp_cmp_readonly['ips'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ips']);
       $sStyleReadLab_ips = '';
       $sStyleReadInp_ips = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ips']) && $this->nmgp_cmp_hidden['ips'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ips" value="<?php echo $this->form_encode_input($ips) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ips_line" id="hidden_field_data_ips" style="<?php echo $sStyleHidden_ips; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ips_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ips_label"><span id="id_label_ips"><?php echo $this->nm_new_label['ips']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ips"]) &&  $this->nmgp_cmp_readonly["ips"] == "on") { 

 ?>
<input type="hidden" name="ips" value="<?php echo $this->form_encode_input($ips) . "\">" . $ips . ""; ?>
<?php } else { ?>
<span id="id_read_on_ips" class="sc-ui-readonly-ips css_ips_line" style="<?php echo $sStyleReadLab_ips; ?>"><?php echo $this->form_encode_input($this->ips); ?></span><span id="id_read_off_ips" style="white-space: nowrap;<?php echo $sStyleReadInp_ips; ?>">
 <input class="sc-js-input scFormObjectOdd css_ips_obj" style="" id="id_sc_field_ips" type=text name="ips" value="<?php echo $this->form_encode_input($ips) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ips_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ips_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ars']))
    {
        $this->nm_new_label['ars'] = "Ars";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ars = $this->ars;
   $sStyleHidden_ars = '';
   if (isset($this->nmgp_cmp_hidden['ars']) && $this->nmgp_cmp_hidden['ars'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ars']);
       $sStyleHidden_ars = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ars = 'display: none;';
   $sStyleReadInp_ars = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ars']) && $this->nmgp_cmp_readonly['ars'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ars']);
       $sStyleReadLab_ars = '';
       $sStyleReadInp_ars = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ars']) && $this->nmgp_cmp_hidden['ars'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ars" value="<?php echo $this->form_encode_input($ars) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ars_line" id="hidden_field_data_ars" style="<?php echo $sStyleHidden_ars; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ars_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ars_label"><span id="id_label_ars"><?php echo $this->nm_new_label['ars']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ars"]) &&  $this->nmgp_cmp_readonly["ars"] == "on") { 

 ?>
<input type="hidden" name="ars" value="<?php echo $this->form_encode_input($ars) . "\">" . $ars . ""; ?>
<?php } else { ?>
<span id="id_read_on_ars" class="sc-ui-readonly-ars css_ars_line" style="<?php echo $sStyleReadLab_ars; ?>"><?php echo $this->form_encode_input($this->ars); ?></span><span id="id_read_off_ars" style="white-space: nowrap;<?php echo $sStyleReadInp_ars; ?>">
 <input class="sc-js-input scFormObjectOdd css_ars_obj" style="" id="id_sc_field_ars" type=text name="ars" value="<?php echo $this->form_encode_input($ars) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ars_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ars_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_sangre']))
   {
       $this->nm_new_label['tipo_sangre'] = "Tipo Sangre";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_sangre = $this->tipo_sangre;
   $sStyleHidden_tipo_sangre = '';
   if (isset($this->nmgp_cmp_hidden['tipo_sangre']) && $this->nmgp_cmp_hidden['tipo_sangre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_sangre']);
       $sStyleHidden_tipo_sangre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_sangre = 'display: none;';
   $sStyleReadInp_tipo_sangre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_sangre']) && $this->nmgp_cmp_readonly['tipo_sangre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_sangre']);
       $sStyleReadLab_tipo_sangre = '';
       $sStyleReadInp_tipo_sangre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_sangre']) && $this->nmgp_cmp_hidden['tipo_sangre'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_sangre" value="<?php echo $this->form_encode_input($this->tipo_sangre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_sangre_line" id="hidden_field_data_tipo_sangre" style="<?php echo $sStyleHidden_tipo_sangre; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_sangre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_sangre_label"><span id="id_label_tipo_sangre"><?php echo $this->nm_new_label['tipo_sangre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_sangre"]) &&  $this->nmgp_cmp_readonly["tipo_sangre"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre'] = array(); 
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

   $nm_comando = "SELECT tipo_sangre, tipo_sangre 
FROM tipo_sangre 
ORDER BY tipo_sangre";

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
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre'][] = $rs->fields[0];
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
   $tipo_sangre_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_sangre_1))
          {
              foreach ($this->tipo_sangre_1 as $tmp_tipo_sangre)
              {
                  if (trim($tmp_tipo_sangre) === trim($cadaselect[1])) { $tipo_sangre_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_sangre) === trim($cadaselect[1])) { $tipo_sangre_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tipo_sangre" value="<?php echo $this->form_encode_input($tipo_sangre) . "\">" . $tipo_sangre_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre'] = array(); 
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

   $nm_comando = "SELECT tipo_sangre, tipo_sangre 
FROM tipo_sangre 
ORDER BY tipo_sangre";

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
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_tipo_sangre'][] = $rs->fields[0];
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
   $tipo_sangre_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_sangre_1))
          {
              foreach ($this->tipo_sangre_1 as $tmp_tipo_sangre)
              {
                  if (trim($tmp_tipo_sangre) === trim($cadaselect[1])) { $tipo_sangre_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_sangre) === trim($cadaselect[1])) { $tipo_sangre_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tipo_sangre_look))
          {
              $tipo_sangre_look = $this->tipo_sangre;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tipo_sangre\" class=\"css_tipo_sangre_line\" style=\"" .  $sStyleReadLab_tipo_sangre . "\">" . $this->form_encode_input($tipo_sangre_look) . "</span><span id=\"id_read_off_tipo_sangre\" style=\"" . $sStyleReadInp_tipo_sangre . "\">";
   echo " <span id=\"idAjaxSelect_tipo_sangre\"><select class=\"sc-js-input scFormObjectOdd css_tipo_sangre_obj\" style=\"\" id=\"id_sc_field_tipo_sangre\" name=\"tipo_sangre\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tipo_sangre) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tipo_sangre)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_sangre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_sangre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['victima_conflicto']))
   {
       $this->nm_new_label['victima_conflicto'] = "Victima Conflicto";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $victima_conflicto = $this->victima_conflicto;
   $sStyleHidden_victima_conflicto = '';
   if (isset($this->nmgp_cmp_hidden['victima_conflicto']) && $this->nmgp_cmp_hidden['victima_conflicto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['victima_conflicto']);
       $sStyleHidden_victima_conflicto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_victima_conflicto = 'display: none;';
   $sStyleReadInp_victima_conflicto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['victima_conflicto']) && $this->nmgp_cmp_readonly['victima_conflicto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['victima_conflicto']);
       $sStyleReadLab_victima_conflicto = '';
       $sStyleReadInp_victima_conflicto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['victima_conflicto']) && $this->nmgp_cmp_hidden['victima_conflicto'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="victima_conflicto" value="<?php echo $this->form_encode_input($this->victima_conflicto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_victima_conflicto_line" id="hidden_field_data_victima_conflicto" style="<?php echo $sStyleHidden_victima_conflicto; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_victima_conflicto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_victima_conflicto_label"><span id="id_label_victima_conflicto"><?php echo $this->nm_new_label['victima_conflicto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["victima_conflicto"]) &&  $this->nmgp_cmp_readonly["victima_conflicto"] == "on") { 

$victima_conflicto_look = "";
 if ($this->victima_conflicto == "1") { $victima_conflicto_look .= "Si" ;} 
 if ($this->victima_conflicto == "2") { $victima_conflicto_look .= "No" ;} 
 if (empty($victima_conflicto_look)) { $victima_conflicto_look = $this->victima_conflicto; }
?>
<input type="hidden" name="victima_conflicto" value="<?php echo $this->form_encode_input($victima_conflicto) . "\">" . $victima_conflicto_look . ""; ?>
<?php } else { ?>
<?php

$victima_conflicto_look = "";
 if ($this->victima_conflicto == "1") { $victima_conflicto_look .= "Si" ;} 
 if ($this->victima_conflicto == "2") { $victima_conflicto_look .= "No" ;} 
 if (empty($victima_conflicto_look)) { $victima_conflicto_look = $this->victima_conflicto; }
?>
<span id="id_read_on_victima_conflicto" class="css_victima_conflicto_line"  style="<?php echo $sStyleReadLab_victima_conflicto; ?>"><?php echo $this->form_encode_input($victima_conflicto_look); ?></span><span id="id_read_off_victima_conflicto" style="<?php echo $sStyleReadInp_victima_conflicto; ?>">
 <span id="idAjaxSelect_victima_conflicto"><select class="sc-js-input scFormObjectOdd css_victima_conflicto_obj" style="" id="id_sc_field_victima_conflicto" name="victima_conflicto" size="1" alt="{type: 'select', enterTab: false}">
 <option value="1" <?php  if ($this->victima_conflicto == "1") { echo " selected" ;} ?>>Si</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_victima_conflicto'][] = '1'; ?>
 <option value="2" <?php  if ($this->victima_conflicto == "2") { echo " selected" ;} ?><?php  if (empty($this->victima_conflicto)) { echo " selected" ;} ?>>No</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_victima_conflicto'][] = '2'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_victima_conflicto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_victima_conflicto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['peso']))
    {
        $this->nm_new_label['peso'] = "Peso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $peso = $this->peso;
   $sStyleHidden_peso = '';
   if (isset($this->nmgp_cmp_hidden['peso']) && $this->nmgp_cmp_hidden['peso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['peso']);
       $sStyleHidden_peso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_peso = 'display: none;';
   $sStyleReadInp_peso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['peso']) && $this->nmgp_cmp_readonly['peso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['peso']);
       $sStyleReadLab_peso = '';
       $sStyleReadInp_peso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['peso']) && $this->nmgp_cmp_hidden['peso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="peso" value="<?php echo $this->form_encode_input($peso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_peso_line" id="hidden_field_data_peso" style="<?php echo $sStyleHidden_peso; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_peso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_peso_label"><span id="id_label_peso"><?php echo $this->nm_new_label['peso']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["peso"]) &&  $this->nmgp_cmp_readonly["peso"] == "on") { 

 ?>
<input type="hidden" name="peso" value="<?php echo $this->form_encode_input($peso) . "\">" . $peso . ""; ?>
<?php } else { ?>
<span id="id_read_on_peso" class="sc-ui-readonly-peso css_peso_line" style="<?php echo $sStyleReadLab_peso; ?>"><?php echo $this->form_encode_input($this->peso); ?></span><span id="id_read_off_peso" style="white-space: nowrap;<?php echo $sStyleReadInp_peso; ?>">
 <input class="sc-js-input scFormObjectOdd css_peso_obj" style="" id="id_sc_field_peso" type=text name="peso" value="<?php echo $this->form_encode_input($peso) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['peso']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['peso']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_peso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_peso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['talla']))
    {
        $this->nm_new_label['talla'] = "Talla";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $talla = $this->talla;
   $sStyleHidden_talla = '';
   if (isset($this->nmgp_cmp_hidden['talla']) && $this->nmgp_cmp_hidden['talla'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['talla']);
       $sStyleHidden_talla = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_talla = 'display: none;';
   $sStyleReadInp_talla = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['talla']) && $this->nmgp_cmp_readonly['talla'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['talla']);
       $sStyleReadLab_talla = '';
       $sStyleReadInp_talla = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['talla']) && $this->nmgp_cmp_hidden['talla'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="talla" value="<?php echo $this->form_encode_input($talla) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_talla_line" id="hidden_field_data_talla" style="<?php echo $sStyleHidden_talla; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_talla_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_talla_label"><span id="id_label_talla"><?php echo $this->nm_new_label['talla']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["talla"]) &&  $this->nmgp_cmp_readonly["talla"] == "on") { 

 ?>
<input type="hidden" name="talla" value="<?php echo $this->form_encode_input($talla) . "\">" . $talla . ""; ?>
<?php } else { ?>
<span id="id_read_on_talla" class="sc-ui-readonly-talla css_talla_line" style="<?php echo $sStyleReadLab_talla; ?>"><?php echo $this->form_encode_input($this->talla); ?></span><span id="id_read_off_talla" style="white-space: nowrap;<?php echo $sStyleReadInp_talla; ?>">
 <input class="sc-js-input scFormObjectOdd css_talla_obj" style="" id="id_sc_field_talla" type=text name="talla" value="<?php echo $this->form_encode_input($talla) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['talla']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['talla']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_talla_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_talla_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cobertura']))
    {
        $this->nm_new_label['cobertura'] = "Cobertura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobertura = $this->cobertura;
   $sStyleHidden_cobertura = '';
   if (isset($this->nmgp_cmp_hidden['cobertura']) && $this->nmgp_cmp_hidden['cobertura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobertura']);
       $sStyleHidden_cobertura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobertura = 'display: none;';
   $sStyleReadInp_cobertura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cobertura']) && $this->nmgp_cmp_readonly['cobertura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobertura']);
       $sStyleReadLab_cobertura = '';
       $sStyleReadInp_cobertura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobertura']) && $this->nmgp_cmp_hidden['cobertura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobertura" value="<?php echo $this->form_encode_input($cobertura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobertura_line" id="hidden_field_data_cobertura" style="<?php echo $sStyleHidden_cobertura; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobertura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobertura_label"><span id="id_label_cobertura"><?php echo $this->nm_new_label['cobertura']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cobertura"]) &&  $this->nmgp_cmp_readonly["cobertura"] == "on") { 

 ?>
<input type="hidden" name="cobertura" value="<?php echo $this->form_encode_input($cobertura) . "\">" . $cobertura . ""; ?>
<?php } else { ?>
<span id="id_read_on_cobertura" class="sc-ui-readonly-cobertura css_cobertura_line" style="<?php echo $sStyleReadLab_cobertura; ?>"><?php echo $this->form_encode_input($this->cobertura); ?></span><span id="id_read_off_cobertura" style="white-space: nowrap;<?php echo $sStyleReadInp_cobertura; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobertura_obj" style="" id="id_sc_field_cobertura" type=text name="cobertura" value="<?php echo $this->form_encode_input($cobertura) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobertura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobertura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vive_con']))
    {
        $this->nm_new_label['vive_con'] = "Vive Con";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vive_con = $this->vive_con;
   $sStyleHidden_vive_con = '';
   if (isset($this->nmgp_cmp_hidden['vive_con']) && $this->nmgp_cmp_hidden['vive_con'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vive_con']);
       $sStyleHidden_vive_con = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vive_con = 'display: none;';
   $sStyleReadInp_vive_con = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vive_con']) && $this->nmgp_cmp_readonly['vive_con'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vive_con']);
       $sStyleReadLab_vive_con = '';
       $sStyleReadInp_vive_con = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vive_con']) && $this->nmgp_cmp_hidden['vive_con'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vive_con" value="<?php echo $this->form_encode_input($vive_con) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_vive_con_line" id="hidden_field_data_vive_con" style="<?php echo $sStyleHidden_vive_con; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vive_con_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_vive_con_label"><span id="id_label_vive_con"><?php echo $this->nm_new_label['vive_con']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vive_con"]) &&  $this->nmgp_cmp_readonly["vive_con"] == "on") { 

 ?>
<input type="hidden" name="vive_con" value="<?php echo $this->form_encode_input($vive_con) . "\">" . $vive_con . ""; ?>
<?php } else { ?>
<span id="id_read_on_vive_con" class="sc-ui-readonly-vive_con css_vive_con_line" style="<?php echo $sStyleReadLab_vive_con; ?>"><?php echo $this->form_encode_input($this->vive_con); ?></span><span id="id_read_off_vive_con" style="white-space: nowrap;<?php echo $sStyleReadInp_vive_con; ?>">
 <input class="sc-js-input scFormObjectOdd css_vive_con_obj" style="" id="id_sc_field_vive_con" type=text name="vive_con" value="<?php echo $this->form_encode_input($vive_con) ?>"
 size=50 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vive_con_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vive_con_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['subsidio']))
    {
        $this->nm_new_label['subsidio'] = "Subsidio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $subsidio = $this->subsidio;
   $sStyleHidden_subsidio = '';
   if (isset($this->nmgp_cmp_hidden['subsidio']) && $this->nmgp_cmp_hidden['subsidio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['subsidio']);
       $sStyleHidden_subsidio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_subsidio = 'display: none;';
   $sStyleReadInp_subsidio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['subsidio']) && $this->nmgp_cmp_readonly['subsidio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['subsidio']);
       $sStyleReadLab_subsidio = '';
       $sStyleReadInp_subsidio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['subsidio']) && $this->nmgp_cmp_hidden['subsidio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="subsidio" value="<?php echo $this->form_encode_input($subsidio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_subsidio_line" id="hidden_field_data_subsidio" style="<?php echo $sStyleHidden_subsidio; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_subsidio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_subsidio_label"><span id="id_label_subsidio"><?php echo $this->nm_new_label['subsidio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["subsidio"]) &&  $this->nmgp_cmp_readonly["subsidio"] == "on") { 

 ?>
<input type="hidden" name="subsidio" value="<?php echo $this->form_encode_input($subsidio) . "\">" . $subsidio . ""; ?>
<?php } else { ?>
<span id="id_read_on_subsidio" class="sc-ui-readonly-subsidio css_subsidio_line" style="<?php echo $sStyleReadLab_subsidio; ?>"><?php echo $this->form_encode_input($this->subsidio); ?></span><span id="id_read_off_subsidio" style="white-space: nowrap;<?php echo $sStyleReadInp_subsidio; ?>">
 <input class="sc-js-input scFormObjectOdd css_subsidio_obj" style="" id="id_sc_field_subsidio" type=text name="subsidio" value="<?php echo $this->form_encode_input($subsidio) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_subsidio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_subsidio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_subsidio_dumb = ('' == $sStyleHidden_subsidio) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_subsidio_dumb" style="<?php echo $sStyleHidden_subsidio_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf5\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Victima del Conflicto<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['estatus_vca']))
   {
       $this->nm_new_label['estatus_vca'] = "Estatus Victima Conflicto Armado";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatus_vca = $this->estatus_vca;
   $sStyleHidden_estatus_vca = '';
   if (isset($this->nmgp_cmp_hidden['estatus_vca']) && $this->nmgp_cmp_hidden['estatus_vca'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatus_vca']);
       $sStyleHidden_estatus_vca = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatus_vca = 'display: none;';
   $sStyleReadInp_estatus_vca = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatus_vca']) && $this->nmgp_cmp_readonly['estatus_vca'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatus_vca']);
       $sStyleReadLab_estatus_vca = '';
       $sStyleReadInp_estatus_vca = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatus_vca']) && $this->nmgp_cmp_hidden['estatus_vca'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="estatus_vca" value="<?php echo $this->form_encode_input($this->estatus_vca) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatus_vca_line" id="hidden_field_data_estatus_vca" style="<?php echo $sStyleHidden_estatus_vca; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estatus_vca_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estatus_vca_label"><span id="id_label_estatus_vca"><?php echo $this->nm_new_label['estatus_vca']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatus_vca"]) &&  $this->nmgp_cmp_readonly["estatus_vca"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca'] = array(); 
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

   $nm_comando = "SELECT id_victima_conflicto, tipo 
FROM victima_conflicto 
ORDER BY tipo";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca'][] = $rs->fields[0];
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
   $estatus_vca_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->estatus_vca_1))
          {
              foreach ($this->estatus_vca_1 as $tmp_estatus_vca)
              {
                  if (trim($tmp_estatus_vca) === trim($cadaselect[1])) { $estatus_vca_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->estatus_vca) === trim($cadaselect[1])) { $estatus_vca_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="estatus_vca" value="<?php echo $this->form_encode_input($estatus_vca) . "\">" . $estatus_vca_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca'] = array(); 
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

   $nm_comando = "SELECT id_victima_conflicto, tipo 
FROM victima_conflicto 
ORDER BY tipo";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_estatus_vca'][] = $rs->fields[0];
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
   $estatus_vca_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->estatus_vca_1))
          {
              foreach ($this->estatus_vca_1 as $tmp_estatus_vca)
              {
                  if (trim($tmp_estatus_vca) === trim($cadaselect[1])) { $estatus_vca_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->estatus_vca) === trim($cadaselect[1])) { $estatus_vca_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($estatus_vca_look))
          {
              $estatus_vca_look = $this->estatus_vca;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_estatus_vca\" class=\"css_estatus_vca_line\" style=\"" .  $sStyleReadLab_estatus_vca . "\">" . $this->form_encode_input($estatus_vca_look) . "</span><span id=\"id_read_off_estatus_vca\" style=\"" . $sStyleReadInp_estatus_vca . "\">";
   echo " <span id=\"idAjaxSelect_estatus_vca\"><select class=\"sc-js-input scFormObjectOdd css_estatus_vca_obj\" style=\"\" id=\"id_sc_field_estatus_vca\" name=\"estatus_vca\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->estatus_vca) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->estatus_vca)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estatus_vca_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estatus_vca_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['depto_expulsor']))
   {
       $this->nm_new_label['depto_expulsor'] = "Departamento Expulsor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $depto_expulsor = $this->depto_expulsor;
   $sStyleHidden_depto_expulsor = '';
   if (isset($this->nmgp_cmp_hidden['depto_expulsor']) && $this->nmgp_cmp_hidden['depto_expulsor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['depto_expulsor']);
       $sStyleHidden_depto_expulsor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_depto_expulsor = 'display: none;';
   $sStyleReadInp_depto_expulsor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['depto_expulsor']) && $this->nmgp_cmp_readonly['depto_expulsor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['depto_expulsor']);
       $sStyleReadLab_depto_expulsor = '';
       $sStyleReadInp_depto_expulsor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['depto_expulsor']) && $this->nmgp_cmp_hidden['depto_expulsor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="depto_expulsor" value="<?php echo $this->form_encode_input($this->depto_expulsor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_depto_expulsor_line" id="hidden_field_data_depto_expulsor" style="<?php echo $sStyleHidden_depto_expulsor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_depto_expulsor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_depto_expulsor_label"><span id="id_label_depto_expulsor"><?php echo $this->nm_new_label['depto_expulsor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["depto_expulsor"]) &&  $this->nmgp_cmp_readonly["depto_expulsor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'] = array(); 
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

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'][] = $rs->fields[0];
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
   $depto_expulsor_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->depto_expulsor_1))
          {
              foreach ($this->depto_expulsor_1 as $tmp_depto_expulsor)
              {
                  if (trim($tmp_depto_expulsor) === trim($cadaselect[1])) { $depto_expulsor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->depto_expulsor) === trim($cadaselect[1])) { $depto_expulsor_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="depto_expulsor" value="<?php echo $this->form_encode_input($depto_expulsor) . "\">" . $depto_expulsor_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'] = array(); 
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

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'][] = $rs->fields[0];
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
   $depto_expulsor_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->depto_expulsor_1))
          {
              foreach ($this->depto_expulsor_1 as $tmp_depto_expulsor)
              {
                  if (trim($tmp_depto_expulsor) === trim($cadaselect[1])) { $depto_expulsor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->depto_expulsor) === trim($cadaselect[1])) { $depto_expulsor_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($depto_expulsor_look))
          {
              $depto_expulsor_look = $this->depto_expulsor;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_depto_expulsor\" class=\"css_depto_expulsor_line\" style=\"" .  $sStyleReadLab_depto_expulsor . "\">" . $this->form_encode_input($depto_expulsor_look) . "</span><span id=\"id_read_off_depto_expulsor\" style=\"" . $sStyleReadInp_depto_expulsor . "\">";
   echo " <span id=\"idAjaxSelect_depto_expulsor\"><select class=\"sc-js-input scFormObjectOdd css_depto_expulsor_obj\" style=\"\" id=\"id_sc_field_depto_expulsor\" name=\"depto_expulsor\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_depto_expulsor'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->depto_expulsor) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->depto_expulsor)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_depto_expulsor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_depto_expulsor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['municipio_expulsor']))
   {
       $this->nm_new_label['municipio_expulsor'] = "Municipio Expulsor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $municipio_expulsor = $this->municipio_expulsor;
   $sStyleHidden_municipio_expulsor = '';
   if (isset($this->nmgp_cmp_hidden['municipio_expulsor']) && $this->nmgp_cmp_hidden['municipio_expulsor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['municipio_expulsor']);
       $sStyleHidden_municipio_expulsor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_municipio_expulsor = 'display: none;';
   $sStyleReadInp_municipio_expulsor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['municipio_expulsor']) && $this->nmgp_cmp_readonly['municipio_expulsor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['municipio_expulsor']);
       $sStyleReadLab_municipio_expulsor = '';
       $sStyleReadInp_municipio_expulsor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['municipio_expulsor']) && $this->nmgp_cmp_hidden['municipio_expulsor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="municipio_expulsor" value="<?php echo $this->form_encode_input($this->municipio_expulsor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_municipio_expulsor_line" id="hidden_field_data_municipio_expulsor" style="<?php echo $sStyleHidden_municipio_expulsor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_municipio_expulsor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_municipio_expulsor_label"><span id="id_label_municipio_expulsor"><?php echo $this->nm_new_label['municipio_expulsor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["municipio_expulsor"]) &&  $this->nmgp_cmp_readonly["municipio_expulsor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor'] = array(); 
}
if ($this->depto_expulsor != "")
{ 
   $this->nm_clear_val("depto_expulsor");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor'] = array(); 
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

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
WHERE iddepartamento = $this->depto_expulsor
ORDER BY nombreMunicipio";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor'][] = $rs->fields[0];
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
} 
   $x = 0; 
   $municipio_expulsor_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->municipio_expulsor_1))
          {
              foreach ($this->municipio_expulsor_1 as $tmp_municipio_expulsor)
              {
                  if (trim($tmp_municipio_expulsor) === trim($cadaselect[1])) { $municipio_expulsor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->municipio_expulsor) === trim($cadaselect[1])) { $municipio_expulsor_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="municipio_expulsor" value="<?php echo $this->form_encode_input($municipio_expulsor) . "\">" . $municipio_expulsor_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor'] = array(); 
}
if ($this->depto_expulsor != "")
{ 
   $this->nm_clear_val("depto_expulsor");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor'] = array(); 
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

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
WHERE iddepartamento = $this->depto_expulsor
ORDER BY nombreMunicipio";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_municipio_expulsor'][] = $rs->fields[0];
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
} 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $municipio_expulsor_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->municipio_expulsor_1))
          {
              foreach ($this->municipio_expulsor_1 as $tmp_municipio_expulsor)
              {
                  if (trim($tmp_municipio_expulsor) === trim($cadaselect[1])) { $municipio_expulsor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->municipio_expulsor) === trim($cadaselect[1])) { $municipio_expulsor_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($municipio_expulsor_look))
          {
              $municipio_expulsor_look = $this->municipio_expulsor;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_municipio_expulsor\" class=\"css_municipio_expulsor_line\" style=\"" .  $sStyleReadLab_municipio_expulsor . "\">" . $this->form_encode_input($municipio_expulsor_look) . "</span><span id=\"id_read_off_municipio_expulsor\" style=\"" . $sStyleReadInp_municipio_expulsor . "\">";
   echo " <span id=\"idAjaxSelect_municipio_expulsor\"><select class=\"sc-js-input scFormObjectOdd css_municipio_expulsor_obj\" style=\"\" id=\"id_sc_field_municipio_expulsor\" name=\"municipio_expulsor\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->municipio_expulsor) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->municipio_expulsor)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_municipio_expulsor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_municipio_expulsor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha_expulsion']))
    {
        $this->nm_new_label['fecha_expulsion'] = "Fecha Expulsion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_expulsion = $this->fecha_expulsion;
   $sStyleHidden_fecha_expulsion = '';
   if (isset($this->nmgp_cmp_hidden['fecha_expulsion']) && $this->nmgp_cmp_hidden['fecha_expulsion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_expulsion']);
       $sStyleHidden_fecha_expulsion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_expulsion = 'display: none;';
   $sStyleReadInp_fecha_expulsion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_expulsion']) && $this->nmgp_cmp_readonly['fecha_expulsion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_expulsion']);
       $sStyleReadLab_fecha_expulsion = '';
       $sStyleReadInp_fecha_expulsion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_expulsion']) && $this->nmgp_cmp_hidden['fecha_expulsion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_expulsion" value="<?php echo $this->form_encode_input($fecha_expulsion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_expulsion_line" id="hidden_field_data_fecha_expulsion" style="<?php echo $sStyleHidden_fecha_expulsion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_expulsion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_expulsion_label"><span id="id_label_fecha_expulsion"><?php echo $this->nm_new_label['fecha_expulsion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_expulsion"]) &&  $this->nmgp_cmp_readonly["fecha_expulsion"] == "on") { 

 ?>
<input type="hidden" name="fecha_expulsion" value="<?php echo $this->form_encode_input($fecha_expulsion) . "\">" . $fecha_expulsion . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_expulsion" class="sc-ui-readonly-fecha_expulsion css_fecha_expulsion_line" style="<?php echo $sStyleReadLab_fecha_expulsion; ?>"><?php echo $this->form_encode_input($fecha_expulsion); ?></span><span id="id_read_off_fecha_expulsion" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_expulsion; ?>">
 <input class="sc-js-input scFormObjectOdd css_fecha_expulsion_obj" style="" id="id_sc_field_fecha_expulsion" type=text name="fecha_expulsion" value="<?php echo $this->form_encode_input($fecha_expulsion) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_expulsion']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_expulsion']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['fecha_expulsion']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<?php echo $tmp_form_data; ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_expulsion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_expulsion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['certificado']))
    {
        $this->nm_new_label['certificado'] = "Certificado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $certificado = $this->certificado;
   $sStyleHidden_certificado = '';
   if (isset($this->nmgp_cmp_hidden['certificado']) && $this->nmgp_cmp_hidden['certificado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['certificado']);
       $sStyleHidden_certificado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_certificado = 'display: none;';
   $sStyleReadInp_certificado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['certificado']) && $this->nmgp_cmp_readonly['certificado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['certificado']);
       $sStyleReadLab_certificado = '';
       $sStyleReadInp_certificado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['certificado']) && $this->nmgp_cmp_hidden['certificado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="certificado" value="<?php echo $this->form_encode_input($certificado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_certificado_line" id="hidden_field_data_certificado" style="<?php echo $sStyleHidden_certificado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_certificado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_certificado_label"><span id="id_label_certificado"><?php echo $this->nm_new_label['certificado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["certificado"]) &&  $this->nmgp_cmp_readonly["certificado"] == "on") { 

 if ("Y" == $this->certificado) { $certificado_look = "Sí";} 
 if ("N" == $this->certificado) { $certificado_look = "No";} 
?>
<input type="hidden" name="certificado" value="<?php echo $this->form_encode_input($certificado) . "\">" . $certificado_look . ""; ?>
<?php } else { ?>

<?php

 if ("Y" == $this->certificado) { $certificado_look = "Sí";} 
 if ("N" == $this->certificado) { $certificado_look = "No";} 
?>
<span id="id_read_on_certificado"  class="css_certificado_line" style="<?php echo $sStyleReadLab_certificado; ?>"><?php echo $this->form_encode_input($certificado_look); ?></span><span id="id_read_off_certificado" style="<?php echo $sStyleReadInp_certificado; ?>"><div id="idAjaxRadio_certificado" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_certificado_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="certificado" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_certificado'][] = 'Y'; ?>
<?php  if ("Y" == $this->certificado)  { echo " checked" ;} ?>  onClick="" >Sí</TD>
  <TD class="scFormDataFontOdd css_certificado_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="certificado" value="N"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students_mob']['Lookup_certificado'][] = 'N'; ?>
<?php  if ("N" == $this->certificado)  { echo " checked" ;} ?>  onClick="" >No</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_certificado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_certificado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['semestre']))
    {
        $this->nm_new_label['semestre'] = "Semestre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $semestre = $this->semestre;
   $sStyleHidden_semestre = '';
   if (isset($this->nmgp_cmp_hidden['semestre']) && $this->nmgp_cmp_hidden['semestre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['semestre']);
       $sStyleHidden_semestre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_semestre = 'display: none;';
   $sStyleReadInp_semestre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['semestre']) && $this->nmgp_cmp_readonly['semestre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['semestre']);
       $sStyleReadLab_semestre = '';
       $sStyleReadInp_semestre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['semestre']) && $this->nmgp_cmp_hidden['semestre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="semestre" value="<?php echo $this->form_encode_input($semestre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_semestre_line" id="hidden_field_data_semestre" style="<?php echo $sStyleHidden_semestre; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_semestre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_semestre_label"><span id="id_label_semestre"><?php echo $this->nm_new_label['semestre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["semestre"]) &&  $this->nmgp_cmp_readonly["semestre"] == "on") { 

 ?>
<input type="hidden" name="semestre" value="<?php echo $this->form_encode_input($semestre) . "\">" . $semestre . ""; ?>
<?php } else { ?>
<span id="id_read_on_semestre" class="sc-ui-readonly-semestre css_semestre_line" style="<?php echo $sStyleReadLab_semestre; ?>"><?php echo $this->form_encode_input($this->semestre); ?></span><span id="id_read_off_semestre" style="white-space: nowrap;<?php echo $sStyleReadInp_semestre; ?>">
 <input class="sc-js-input scFormObjectOdd css_semestre_obj" style="" id="id_sc_field_semestre" type=text name="semestre" value="<?php echo $this->form_encode_input($semestre) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['semestre']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['semestre']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_semestre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_semestre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
