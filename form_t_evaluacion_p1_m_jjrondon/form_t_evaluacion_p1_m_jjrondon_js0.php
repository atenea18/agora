<form name="F2" method=post 
               action="./" 
               target="_self"> 
<input type="hidden" name="id_estudiante_" value="<?php echo $this->form_encode_input($this->nmgp_dados_form['id_estudiante_']); ?>">
<input type="hidden" name="id_grupo_" value="<?php echo $this->form_encode_input($this->nmgp_dados_form['id_grupo_']); ?>">
<input type="hidden" name="id_asignatura_" value="<?php echo $this->form_encode_input($this->nmgp_dados_form['id_asignatura_']); ?>">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="master_nav" value="off">
<input type="hidden" name="sc_ifr_height" value="">
<input type="hidden" name="nmgp_parms" value=""/>
<input type="hidden" name="nmgp_ordem" value=""/>
<input type="hidden" name="nmgp_clone" value=""/>
<input type="hidden" name="nmgp_arg_dyn_search" value=""/>
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<form name="F3" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_chave" value=""/>
  <input type="hidden" name="nmgp_opcao" value=""/>
  <input type="hidden" name="nmgp_ordem" value=""/>
  <input type="hidden" name="nmgp_chave_det" value=""/>
  <input type="hidden" name="nmgp_quant_linhas" value=""/>
  <input type="hidden" name="nmgp_url_saida" value=""/>
  <input type="hidden" name="nmgp_parms" value=""/>
  <input type="hidden" name="nmgp_outra_jan" value=""/>
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<form name="F5" method="post" 
                  action="./" 
                  target="_self"> 
  <input type="hidden" name="nmgp_opcao" value="<?php if ($this->nm_Start_new) {echo "ini";} else {echo "igual";}?>"/>
  <input type="hidden" name="nmgp_parms" value=""/>
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<form name="F6" method="post" 
                  action="./" 
                  target="_self"> 
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<form name="F8" method="post" 
                  action="./" 
                  target="_self"> 
  <input type="hidden" name="nmgp_opcao" value=""/>
  <input type="hidden" name="nmgp_tipo_pdf" value=""/>
  <input type="hidden" name="nmgp_parms_pdf" value=""/>
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<form name="FCAP" action="" method="post" target="_blank"> 
  <input type="hidden" name="SC_lig_apl_orig" value="form_t_evaluacion_p1_m_jjrondon"/>
  <input type="hidden" name="nmgp_parms" value=""> 
  <input type="hidden" name="nmgp_outra_jan" value="true"> 
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
</form> 
<div id="id_div_process" style="display: none; margin: 10px; whitespace: nowrap" class="scFormProcessFixed"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</span></div>
<div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</span></div>
<div id="id_fatal_error" class="" style="display: none; position: absolute"></div>
<script type="text/javascript"> 
<?php
  $JsonVarLiga = new Services_JSON();
?> 
var var_btn_sc_btn_0_id_grado = <?php echo $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m_jjrondon']['dados_form'][$sc_seq_vert]['id_grado_'])?>;
var var_btn_sc_btn_0_id_grupo = <?php echo $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m_jjrondon']['dados_form'][$sc_seq_vert]['id_grupo_'])?>;
var var_btn_sc_btn_0_id_asign = <?php echo $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m_jjrondon']['dados_form'][$sc_seq_vert]['id_asignatura_'])?>;
var var_btn_sc_btn_0_par_idgrupo = <?php echo $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m_jjrondon']['dados_form'][$sc_seq_vert]['id_grupo_'])?>;
var var_btn_sc_btn_0_par_asign = <?php echo $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m_jjrondon']['dados_form'][$sc_seq_vert]['id_asignatura_'])?>;
var var_btn_sc_btn_0_par_idgrado = <?php echo $this->form_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m_jjrondon']['dados_form'][$sc_seq_vert]['id_grado_'])?>;
function sc_btn_sc_btn_0()
{
    if (scEventControl_active_all()) {
      setTimeout(function() { sc_btn_sc_btn_0(); }, 500);
      return;
    }
  tb_show('', '<?php echo $this->Ini->link_form_rel_desemp_posicion_1_edit; ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&script_case_session=<?php echo session_id() ?>&nmgp_url_saida=modal&nmgp_parms=<?php echo "id_grado*scin' + var_btn_sc_btn_0_id_grado + '*scoutid_grupo*scin' + var_btn_sc_btn_0_id_grupo + '*scoutid_asign*scin' + var_btn_sc_btn_0_id_asign + '*scoutperiodo*scin" . str_replace("'", "@aspass@", $_SESSION['par_periodo']) . "*scoutSC_glo_par_periodo*scinpar_periodo*scoutpar_idgrupo*scin' + var_btn_sc_btn_0_par_idgrupo + '*scoutpar_periodo*scin" . str_replace("'", "@aspass@", $_SESSION['par_periodo']) . "*scoutSC_glo_par_par_periodo*scinpar_periodo*scoutpar_asign*scin' + var_btn_sc_btn_0_par_asign + '*scoutpar_idgrado*scin' + var_btn_sc_btn_0_par_idgrado + '*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout"; ?>&nmgp_outra_jan=true&TB_iframe=true&height=550&width=600&modal=true', '');
}
 NM_tp_critica(1);
function nm_gp_submit(apl_lig, apl_saida, parms, opc, target, modal_h, modal_w, apl_name) 
{ 
   if (target == 'modal') 
   {
       par_modal = '?script_case_init=<?php echo $this->form_encode_input($this->Ini->sc_page) ?>&script_case_session=<?php echo $this->form_encode_input(session_id()) ?>&nmgp_outra_jan=true&nmgp_url_saida=modal';
       if (opc != null && opc != '') 
       {
           par_modal += '&nmgp_opcao=grid';
       }
       if (parms != null && parms != '') 
       {
           par_modal += '&nmgp_parms=' + parms;
       }
<?php
  if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m_jjrondon']['where_detal']))
  {
?>  
       parent.tb_show('', apl_lig + par_modal + '&TB_iframe=true&modal=true&height=' + modal_h + '&width=' + modal_w, '');
<?php
  }
  else
  {
?>  
       tb_show('', apl_lig + par_modal + '&TB_iframe=true&modal=true&height=' + modal_h + '&width=' + modal_w, '');
<?php
  }
?>  
       return;
   }
   document.F3.target               = "_self"; 
   document.F3.action               = apl_lig  ;
   if (opc != null && opc != "") 
   {
       document.F3.nmgp_opcao.value = "grid" ;
   }
   else
   {
       document.F3.nmgp_opcao.value = "" ;
   }
   if (target != null && target == '_blank') 
   {
       document.F3.nmgp_outra_jan.value = "true" ;
       document.F3.target           = target; 
   }
   document.F3.nmgp_url_saida.value = apl_saida ;
   document.F3.nmgp_parms.value     = parms ;
   document.F3.submit() ;
} 

function scInlineFormSend()
{
  return false;
}

function nm_navpage(x, op) 
{ 
    if (op == "P") 
    { 
        x = ((x * <?php echo $this->sc_max_reg . ") - ". $this->sc_max_reg?>) + 1; 
    } 
    nm_move('navpage', x);
} 
function nm_gp_export(x, y, z, p, g) 
{ 
    document.F8.nmgp_opcao.value  = x;
    document.F8.nmgp_tipo_pdf.value  = z;
    document.F8.nmgp_parms_pdf.value = p;
    if (y == 1) 
    {
        document.F8.target = "_blank"; 
    }
    document.F8.submit();
}
function nm_move(x, y, z) 
{ 
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    if (("inicio" == x || "retorna" == x) && "S" != Nav_permite_ret)
    {
        return;
    }
    if (("avanca" == x || "final" == x) && "S" != Nav_permite_ava)
    {
        return;
    }
    document.F2.nmgp_opcao.value = x; 
    document.F2.nmgp_ordem.value = y; 
    document.F2.nmgp_clone.value = "";
    if ("apl_detalhe" == x)
    {
        document.F2.nmgp_opcao.value = 'igual'; 
        document.F2.master_nav.value = 'on'; 
        if (z)
        {
            document.F2.sc_ifr_height.value = z;
        }
        document.F2.submit();
        return;
    }
    if ("clone" == x)
    {
        x = "novo";
        document.F2.nmgp_clone.value = "S";
        document.F2.nmgp_opcao.value = x; 
    }
    if ("novo" == x || "edit_novo" == x)
    {
<?php
       $NM_parm_ifr = ($NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
        document.F2.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
        document.F2.submit();
    }
    else
    {
        do_ajax_form_t_evaluacion_p1_m_jjrondon_navigate_form();
    }
    if ("ordem" == x)
    {
        scSetOrderColumn(y);
    }
} 
var sc_mupload_ok = true;
function nm_atualiza(x, y) 
{ 
<?php 
    if (isset($this->Refresh_aba_menu)) 
    {
?>
        parent.Tab_refresh['<?php echo $this->Refresh_aba_menu ?>'] = "S";
<?php 
    }
?>
    if (!sc_mupload_ok)
    {
        if (!confirm("<?php echo $this->Ini->Nm_lang['lang_errm_muok'] ?>"))
        {
            return;
        }
        sc_mupload_ok = true;
    }
    var Nm_submit_ok = true; 
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    if (!scAjaxDetailProc())
    {
        return;
    }
<?php
    $NM_parm_ifr = ($NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
    document.F1.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
    document.F1.target = "_self";
    if (x == "muda_form") 
    { 
       document.F1.nmgp_num_form.value = y; 
    } 
    if (x == "excluir" && sc_quant_excl > 0) 
    { 
       if (confirm ("<?php echo html_entity_decode($this->Ini->Nm_lang['lang_errm_cfrm_remv'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"))  
       { 
           document.F1.nmgp_opcao.value = x; 
           document.F1.submit(); 
       } 
       else 
       { 
          return; 
       } 
    } 
    else 
    { 
       document.F1.nmgp_opcao.value = x; 
       document.F1.submit(); 
    } 
    if (Nm_submit_ok)
    { 
        Nm_Proc_Atualiz = true;
    } 
} 
<?php
if ($this->Embutida_form)
{
?>
function nm_atualiza_line(x, y) 
{ 
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    z = document.getElementById("idVertRow" + y).rowIndex;
    document.F1.nmgp_parms.value = "";
    document.F1.target = "_self";
    document.F1.nmgp_opcao.value = x; 
    if (x == "excluir") 
    { 
       if (confirm ("<?php echo html_entity_decode($this->Ini->Nm_lang['lang_errm_remv'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"))  
       { }
       else 
       { 
          return; 
       } 
    } 
    Nm_Proc_Atualiz = true;
    do_ajax_form_t_evaluacion_p1_m_jjrondon_submit_form(y, z); 
} 
<?php
}
?>
function nm_mostra_img(imagem, altura, largura)
{
    tb_show('', imagem, '');
}
function nm_recarga_form(nm_ult_ancora, nm_ult_page) 
{ 
    document.F1.target = "_self";
    document.F1.nmgp_parms.value = "";
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_opcao.value= "recarga"; 
    document.F1.action += "#" +  nm_ult_ancora;
    document.F1.submit(); 
} 
function nm_link_url(Sc_url)
{
    if (Sc_url.substr(0, 7) != 'http://' && Sc_url.substr(0, 8) != 'https://')
    {
        Sc_url = 'http://' + Sc_url;
    }
    return Sc_url;
}
function sc_trim(str, chars) {
        return sc_ltrim(sc_rtrim(str, chars), chars);
}
function sc_ltrim(str, chars) {
        chars = chars || "\\s";
        return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}
function sc_rtrim(str, chars) {
        chars = chars || "\\s";
        return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}
function nm_check_insert(iLine)
{
   if (document.F1.elements['sc_check_vert[' + iLine + ']'])
      document.F1.elements['sc_check_vert[' + iLine + ']'].checked = true;
}
function nm_uncheck_delete()
{
   if (!document.F1.sc_contr_vert)
      return;
   for (iLine = 1; iLine < document.F1.sc_contr_vert.value; iLine++)
      if (document.F1.elements['sc_check_vert[' + iLine + ']'])
         document.F1.elements['sc_check_vert[' + iLine + ']'].checked = false;
}
var hasJsFormOnload = false;

function scCssFocus(oHtmlObj, iSeqVert)
{
  if (navigator.userAgent && 0 < navigator.userAgent.indexOf("MSIE") && "select" == oHtmlObj.type.substr(0, 6))
    return;
  $(oHtmlObj).addClass('scFormObjectFocusOddMult')
             .removeClass('scFormObjectOddMult');
}

function scCssBlur(oHtmlObj, iSeqVert)
{
  if (navigator.userAgent && 0 < navigator.userAgent.indexOf("MSIE") && "select" == oHtmlObj.type.substr(0, 6))
    return;
  $(oHtmlObj).addClass('scFormObjectOddMult')
             .removeClass('scFormObjectFocusOddMult');
}

 function nm_submit_cap(apl_dest, parms)
 {
    document.FCAP.action = apl_dest;
    document.FCAP.nmgp_parms.value = parms;
    window.open('','jan_cap','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');
    document.FCAP.target = "jan_cap"; 
    document.FCAP.submit();
 }
</script> 
