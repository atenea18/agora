<?php
class form_t_evaluacion_p4_form extends form_t_evaluacion_p4_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("<FONT SIZE=4>ASIGNATURA: " . $_SESSION['nombre_asignatura'] . "</font>"); } else { echo strip_tags("<FONT SIZE=4>ASIGNATURA: " . $_SESSION['nombre_asignatura'] . "</font>"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['embutida_pdf']))
 {
 ?>
<?php
    if ((isset($this->nmgp_tipo_pdf) && $this->nmgp_tipo_pdf == "pb") || (isset($this->nmgp_cor_print) && $this->nmgp_cor_print == "PB"))
    {
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form_bw.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form_bw<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
    }
    else
    {
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
    }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_t_evaluacion_p4/form_t_evaluacion_p4_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_t_evaluacion_p4_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
<?php

include_once('form_t_evaluacion_p4_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_t_evaluacion_p4_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method="post" 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" /> 
<?php
$_SESSION['scriptcase']['error_span_title']['form_t_evaluacion_p4'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_t_evaluacion_p4'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['mostra_cab'] != "N"))
  {
?>
<tr><td>
   <TABLE width="100%" class="scFormHeader">
    <TR align="center">
     <TD style="padding: 0px">
      <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <TR valign="middle">
        <TD align="left" rowspan="3" class="scFormHeaderFont">
          
        </TD>
        <TD align="left" class="scFormHeaderFont">
          <?php echo "<FONT SIZE=4>Periodo 4</font>" ?>
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="center" class="scFormHeaderFont">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="right" class="scFormHeaderFont">
          
        </TD>
       </TR>
       <TR valign="middle">
        <TD align="left" class="scFormHeaderFont">
          <?php if ($this->nmgp_opcao == "novo") { echo "<FONT SIZE=4>ASIGNATURA: " . $_SESSION['nombre_asignatura'] . "</font>"; } else { echo "<FONT SIZE=4>ASIGNATURA: " . $_SESSION['nombre_asignatura'] . "</font>"; } ?>
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="center" class="scFormHeaderFont">
          <?php echo "<FONT SIZE=4>GRUPO: $this->nom_grupo_</font>" ?>
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="right" class="scFormHeaderFont">
          
<?php
$this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS");
echo $this->nm_data->FormataSaida("l, d  F  Y");
?>

        </TD>
       </TR>
       <TR valign="middle">
        <TD align="left" class="scFormHeaderFont">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="center" class="scFormHeaderFont">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="right" class="scFormHeaderFont">
          
        </TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['pdf_view'])
{
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterarsel", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = ($this->nmgp_botoes['pdf'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpdf", "", "", "sc_b_pdf_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . SC_dir_app_name('form_t_evaluacion_p4') . "/form_t_evaluacion_p4_config_pdf.php?nm_opc=pdf&nm_target=2&nm_cor=cor&papel=8&lpapel=0&apapel=0&orientacao=2&bookmarks=XX&largura=800&conf_larg=10&conf_fonte=N&grafico=XX&language=es&conf_socor=S&KeepThis=true&TB_iframe=true&modal=true", "");?>
 
<?php
        $NM_btn = true;
        $sCondStyle = ($this->nmgp_botoes['print'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bprint", "", "", "sc_b_prt_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . SC_dir_app_name('form_t_evaluacion_p4') . "/form_t_evaluacion_p4_config_print.php?nm_opc=print&nm_cor=AM&language=es&KeepThis=true&TB_iframe=true&modal=true", "");?>
 
<?php
        $NM_btn = true;
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
     $Span = 0;
     if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) { $Span = 2; }
     $Col_span = ($Span == 0) ? "" : " colspan=$Span";
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['pdf_view'])
     { 
         $Col_span = "";
     } 
 ?>
    <TR>
     <TD class="scFormLabelOddMult" <?php echo $Col_span ?>>&nbsp;</TD>
     <TD class="scFormLabelOddMult" colspan=3>&nbsp;</TD>
     <TD class="scFormLabelOddMult" style="text-align:center;vertical-align:middle;font-size:15px;color:#000000;">&nbsp;</TD>
     <TD class="scFormLabelOddMult" colspan=5 style="text-align:center;vertical-align:middle;font-size:15px;color:#000000;">Desempeño Cognitivo</TD>
     <TD class="scFormLabelOddMult" style="text-align:center;vertical-align:middle;font-size:15px;color:#000000;">&nbsp;</TD>
     <TD class="scFormLabelOddMult" colspan=5 style="text-align:center;vertical-align:middle;font-size:15px;color:#000000;">Desempeño Personal</TD>
     <TD class="scFormLabelOddMult" style="text-align:center;vertical-align:middle;font-size:15px;color:#000000;">&nbsp;</TD>
     <TD class="scFormLabelOddMult" colspan=5 style="text-align:center;vertical-align:middle;font-size:15px;color:#000000;">Desempeño Social</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
    </TR>
   <tr>
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) { $Col_span = " colspan=2"; if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['pdf_view']) { $Col_span = 1;} }
 ?>

    <TD class="scFormLabelOddMult" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['pdf_view'] && $this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['pdf_view'] && $this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_estudiante_']) && $this->nmgp_cmp_hidden['id_estudiante_'] == 'off') { $sStyleHidden_id_estudiante_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_estudiante_']) || $this->nmgp_cmp_hidden['id_estudiante_'] == 'on') {
      if (!isset($this->nm_new_label['id_estudiante_'])) {
          $this->nm_new_label['id_estudiante_'] = "Id Estudiante"; } ?>

    <TD class="scFormLabelOddMult css_id_estudiante__label" id="hidden_field_label_id_estudiante_" style="<?php echo $sStyleHidden_id_estudiante_; ?>" > <?php echo $this->nm_new_label['id_estudiante_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['estatus_']) && $this->nmgp_cmp_hidden['estatus_'] == 'off') { $sStyleHidden_estatus_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['estatus_']) || $this->nmgp_cmp_hidden['estatus_'] == 'on') {
      if (!isset($this->nm_new_label['estatus_'])) {
          $this->nm_new_label['estatus_'] = "Est"; } ?>

    <TD class="scFormLabelOddMult css_estatus__label" id="hidden_field_label_estatus_" style="<?php echo $sStyleHidden_estatus_; ?>" > <?php echo $this->nm_new_label['estatus_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['novedad_']) && $this->nmgp_cmp_hidden['novedad_'] == 'off') { $sStyleHidden_novedad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['novedad_']) || $this->nmgp_cmp_hidden['novedad_'] == 'on') {
      if (!isset($this->nm_new_label['novedad_'])) {
          $this->nm_new_label['novedad_'] = "Nov"; } ?>

    <TD class="scFormLabelOddMult css_novedad__label" id="hidden_field_label_novedad_" style="<?php echo $sStyleHidden_novedad_; ?>" > <?php echo $this->nm_new_label['novedad_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_4_per_']) && $this->nmgp_cmp_hidden['eval_4_per_'] == 'off') { $sStyleHidden_eval_4_per_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['eval_4_per_']) || $this->nmgp_cmp_hidden['eval_4_per_'] == 'on') {
      if (!isset($this->nm_new_label['eval_4_per_'])) {
          $this->nm_new_label['eval_4_per_'] = "4 Per"; } ?>

    <TD class="scFormLabelOddMult css_eval_4_per__label" id="hidden_field_label_eval_4_per_" style="<?php echo $sStyleHidden_eval_4_per_; ?>" > <?php echo $this->nm_new_label['eval_4_per_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc1_p4_']) && $this->nmgp_cmp_hidden['dc1_p4_'] == 'off') { $sStyleHidden_dc1_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc1_p4_']) || $this->nmgp_cmp_hidden['dc1_p4_'] == 'on') {
      if (!isset($this->nm_new_label['dc1_p4_'])) {
          $this->nm_new_label['dc1_p4_'] = "Dc 1 P 4"; } ?>

    <TD class="scFormLabelOddMult css_dc1_p4__label" id="hidden_field_label_dc1_p4_" style="<?php echo $sStyleHidden_dc1_p4_; ?>" > <?php echo $this->nm_new_label['dc1_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc2_p4_']) && $this->nmgp_cmp_hidden['dc2_p4_'] == 'off') { $sStyleHidden_dc2_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc2_p4_']) || $this->nmgp_cmp_hidden['dc2_p4_'] == 'on') {
      if (!isset($this->nm_new_label['dc2_p4_'])) {
          $this->nm_new_label['dc2_p4_'] = "Dc 2 P 4"; } ?>

    <TD class="scFormLabelOddMult css_dc2_p4__label" id="hidden_field_label_dc2_p4_" style="<?php echo $sStyleHidden_dc2_p4_; ?>" > <?php echo $this->nm_new_label['dc2_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc3_p4_']) && $this->nmgp_cmp_hidden['dc3_p4_'] == 'off') { $sStyleHidden_dc3_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc3_p4_']) || $this->nmgp_cmp_hidden['dc3_p4_'] == 'on') {
      if (!isset($this->nm_new_label['dc3_p4_'])) {
          $this->nm_new_label['dc3_p4_'] = "Dc 3 P 4"; } ?>

    <TD class="scFormLabelOddMult css_dc3_p4__label" id="hidden_field_label_dc3_p4_" style="<?php echo $sStyleHidden_dc3_p4_; ?>" > <?php echo $this->nm_new_label['dc3_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc4_p4_']) && $this->nmgp_cmp_hidden['dc4_p4_'] == 'off') { $sStyleHidden_dc4_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc4_p4_']) || $this->nmgp_cmp_hidden['dc4_p4_'] == 'on') {
      if (!isset($this->nm_new_label['dc4_p4_'])) {
          $this->nm_new_label['dc4_p4_'] = "Dc 4 P 4"; } ?>

    <TD class="scFormLabelOddMult css_dc4_p4__label" id="hidden_field_label_dc4_p4_" style="<?php echo $sStyleHidden_dc4_p4_; ?>" > <?php echo $this->nm_new_label['dc4_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc5_p4_']) && $this->nmgp_cmp_hidden['dc5_p4_'] == 'off') { $sStyleHidden_dc5_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc5_p4_']) || $this->nmgp_cmp_hidden['dc5_p4_'] == 'on') {
      if (!isset($this->nm_new_label['dc5_p4_'])) {
          $this->nm_new_label['dc5_p4_'] = "Dc 5 P 4"; } ?>

    <TD class="scFormLabelOddMult css_dc5_p4__label" id="hidden_field_label_dc5_p4_" style="<?php echo $sStyleHidden_dc5_p4_; ?>" > <?php echo $this->nm_new_label['dc5_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dc4_']) && $this->nmgp_cmp_hidden['pcent_dc4_'] == 'off') { $sStyleHidden_pcent_dc4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_dc4_']) || $this->nmgp_cmp_hidden['pcent_dc4_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_dc4_'])) {
          $this->nm_new_label['pcent_dc4_'] = "Pcent Dc 4"; } ?>

    <TD class="scFormLabelOddMult css_pcent_dc4__label" id="hidden_field_label_pcent_dc4_" style="<?php echo $sStyleHidden_pcent_dc4_; ?>" > <?php echo $this->nm_new_label['pcent_dc4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp1_p4_']) && $this->nmgp_cmp_hidden['dp1_p4_'] == 'off') { $sStyleHidden_dp1_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp1_p4_']) || $this->nmgp_cmp_hidden['dp1_p4_'] == 'on') {
      if (!isset($this->nm_new_label['dp1_p4_'])) {
          $this->nm_new_label['dp1_p4_'] = "Dp 1 P 4"; } ?>

    <TD class="scFormLabelOddMult css_dp1_p4__label" id="hidden_field_label_dp1_p4_" style="<?php echo $sStyleHidden_dp1_p4_; ?>" > <?php echo $this->nm_new_label['dp1_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp2_p4_']) && $this->nmgp_cmp_hidden['dp2_p4_'] == 'off') { $sStyleHidden_dp2_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp2_p4_']) || $this->nmgp_cmp_hidden['dp2_p4_'] == 'on') {
      if (!isset($this->nm_new_label['dp2_p4_'])) {
          $this->nm_new_label['dp2_p4_'] = "Dp 2 P 4"; } ?>

    <TD class="scFormLabelOddMult css_dp2_p4__label" id="hidden_field_label_dp2_p4_" style="<?php echo $sStyleHidden_dp2_p4_; ?>" > <?php echo $this->nm_new_label['dp2_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp3_p4_']) && $this->nmgp_cmp_hidden['dp3_p4_'] == 'off') { $sStyleHidden_dp3_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp3_p4_']) || $this->nmgp_cmp_hidden['dp3_p4_'] == 'on') {
      if (!isset($this->nm_new_label['dp3_p4_'])) {
          $this->nm_new_label['dp3_p4_'] = "Dp 3 P 4"; } ?>

    <TD class="scFormLabelOddMult css_dp3_p4__label" id="hidden_field_label_dp3_p4_" style="<?php echo $sStyleHidden_dp3_p4_; ?>" > <?php echo $this->nm_new_label['dp3_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp4_p4_']) && $this->nmgp_cmp_hidden['dp4_p4_'] == 'off') { $sStyleHidden_dp4_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp4_p4_']) || $this->nmgp_cmp_hidden['dp4_p4_'] == 'on') {
      if (!isset($this->nm_new_label['dp4_p4_'])) {
          $this->nm_new_label['dp4_p4_'] = "Dp 4 P 4"; } ?>

    <TD class="scFormLabelOddMult css_dp4_p4__label" id="hidden_field_label_dp4_p4_" style="<?php echo $sStyleHidden_dp4_p4_; ?>" > <?php echo $this->nm_new_label['dp4_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp5_p4_']) && $this->nmgp_cmp_hidden['dp5_p4_'] == 'off') { $sStyleHidden_dp5_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp5_p4_']) || $this->nmgp_cmp_hidden['dp5_p4_'] == 'on') {
      if (!isset($this->nm_new_label['dp5_p4_'])) {
          $this->nm_new_label['dp5_p4_'] = "Dp 5 P 4"; } ?>

    <TD class="scFormLabelOddMult css_dp5_p4__label" id="hidden_field_label_dp5_p4_" style="<?php echo $sStyleHidden_dp5_p4_; ?>" > <?php echo $this->nm_new_label['dp5_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dp4_']) && $this->nmgp_cmp_hidden['pcent_dp4_'] == 'off') { $sStyleHidden_pcent_dp4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_dp4_']) || $this->nmgp_cmp_hidden['pcent_dp4_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_dp4_'])) {
          $this->nm_new_label['pcent_dp4_'] = "Pcent Dp 4"; } ?>

    <TD class="scFormLabelOddMult css_pcent_dp4__label" id="hidden_field_label_pcent_dp4_" style="<?php echo $sStyleHidden_pcent_dp4_; ?>" > <?php echo $this->nm_new_label['pcent_dp4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds1_p4_']) && $this->nmgp_cmp_hidden['ds1_p4_'] == 'off') { $sStyleHidden_ds1_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds1_p4_']) || $this->nmgp_cmp_hidden['ds1_p4_'] == 'on') {
      if (!isset($this->nm_new_label['ds1_p4_'])) {
          $this->nm_new_label['ds1_p4_'] = "Ds 1 P 4"; } ?>

    <TD class="scFormLabelOddMult css_ds1_p4__label" id="hidden_field_label_ds1_p4_" style="<?php echo $sStyleHidden_ds1_p4_; ?>" > <?php echo $this->nm_new_label['ds1_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds2_p4_']) && $this->nmgp_cmp_hidden['ds2_p4_'] == 'off') { $sStyleHidden_ds2_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds2_p4_']) || $this->nmgp_cmp_hidden['ds2_p4_'] == 'on') {
      if (!isset($this->nm_new_label['ds2_p4_'])) {
          $this->nm_new_label['ds2_p4_'] = "Ds 2 P 4"; } ?>

    <TD class="scFormLabelOddMult css_ds2_p4__label" id="hidden_field_label_ds2_p4_" style="<?php echo $sStyleHidden_ds2_p4_; ?>" > <?php echo $this->nm_new_label['ds2_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds3_p4_']) && $this->nmgp_cmp_hidden['ds3_p4_'] == 'off') { $sStyleHidden_ds3_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds3_p4_']) || $this->nmgp_cmp_hidden['ds3_p4_'] == 'on') {
      if (!isset($this->nm_new_label['ds3_p4_'])) {
          $this->nm_new_label['ds3_p4_'] = "Ds 3 P 4"; } ?>

    <TD class="scFormLabelOddMult css_ds3_p4__label" id="hidden_field_label_ds3_p4_" style="<?php echo $sStyleHidden_ds3_p4_; ?>" > <?php echo $this->nm_new_label['ds3_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds4_p4_']) && $this->nmgp_cmp_hidden['ds4_p4_'] == 'off') { $sStyleHidden_ds4_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds4_p4_']) || $this->nmgp_cmp_hidden['ds4_p4_'] == 'on') {
      if (!isset($this->nm_new_label['ds4_p4_'])) {
          $this->nm_new_label['ds4_p4_'] = "Ds 4 P 4"; } ?>

    <TD class="scFormLabelOddMult css_ds4_p4__label" id="hidden_field_label_ds4_p4_" style="<?php echo $sStyleHidden_ds4_p4_; ?>" > <?php echo $this->nm_new_label['ds4_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds5_p4_']) && $this->nmgp_cmp_hidden['ds5_p4_'] == 'off') { $sStyleHidden_ds5_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds5_p4_']) || $this->nmgp_cmp_hidden['ds5_p4_'] == 'on') {
      if (!isset($this->nm_new_label['ds5_p4_'])) {
          $this->nm_new_label['ds5_p4_'] = "Ds 5 P 4"; } ?>

    <TD class="scFormLabelOddMult css_ds5_p4__label" id="hidden_field_label_ds5_p4_" style="<?php echo $sStyleHidden_ds5_p4_; ?>" > <?php echo $this->nm_new_label['ds5_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_ds4_']) && $this->nmgp_cmp_hidden['pcent_ds4_'] == 'off') { $sStyleHidden_pcent_ds4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_ds4_']) || $this->nmgp_cmp_hidden['pcent_ds4_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_ds4_'])) {
          $this->nm_new_label['pcent_ds4_'] = "Pcent Ds 4"; } ?>

    <TD class="scFormLabelOddMult css_pcent_ds4__label" id="hidden_field_label_pcent_ds4_" style="<?php echo $sStyleHidden_pcent_ds4_; ?>" > <?php echo $this->nm_new_label['pcent_ds4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['val_acumulada_']) && $this->nmgp_cmp_hidden['val_acumulada_'] == 'off') { $sStyleHidden_val_acumulada_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['val_acumulada_']) || $this->nmgp_cmp_hidden['val_acumulada_'] == 'on') {
      if (!isset($this->nm_new_label['val_acumulada_'])) {
          $this->nm_new_label['val_acumulada_'] = "VaA"; } ?>

    <TD class="scFormLabelOddMult css_val_acumulada__label" id="hidden_field_label_val_acumulada_" style="<?php echo $sStyleHidden_val_acumulada_; ?>" > <?php echo $this->nm_new_label['val_acumulada_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['val_requerida_']) && $this->nmgp_cmp_hidden['val_requerida_'] == 'off') { $sStyleHidden_val_requerida_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['val_requerida_']) || $this->nmgp_cmp_hidden['val_requerida_'] == 'on') {
      if (!isset($this->nm_new_label['val_requerida_'])) {
          $this->nm_new_label['val_requerida_'] = "VaR"; } ?>

    <TD class="scFormLabelOddMult css_val_requerida__label" id="hidden_field_label_val_requerida_" style="<?php echo $sStyleHidden_val_requerida_; ?>" > <?php echo $this->nm_new_label['val_requerida_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_final_']) && $this->nmgp_cmp_hidden['eval_final_'] == 'off') { $sStyleHidden_eval_final_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['eval_final_']) || $this->nmgp_cmp_hidden['eval_final_'] == 'on') {
      if (!isset($this->nm_new_label['eval_final_'])) {
          $this->nm_new_label['eval_final_'] = "Eval Final"; } ?>

    <TD class="scFormLabelOddMult css_eval_final__label" id="hidden_field_label_eval_final_" style="<?php echo $sStyleHidden_eval_final_; ?>" > <?php echo $this->nm_new_label['eval_final_'] ?> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_t_evaluacion_p4);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_t_evaluacion_p4 = $this->form_vert_form_t_evaluacion_p4;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_t_evaluacion_p4))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_estudiante_']))
           {
               $this->nmgp_cmp_readonly['id_estudiante_'] = 'on';
           }
   foreach ($this->form_vert_form_t_evaluacion_p4 as $sc_seq_vert => $sc_lixo)
   {
       $this->primer_apellido_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['primer_apellido_'];
       $this->segundo_apellido_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['segundo_apellido_'];
       $this->primer_nombre_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['primer_nombre_'];
       $this->segundo_nombre_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['segundo_nombre_'];
       $this->id_grupo_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['id_grupo_'];
       $this->id_area_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['id_area_'];
       $this->id_asignatura_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['id_asignatura_'];
       $this->id_grado_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['id_grado_'];
       $this->id_nivel_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['id_nivel_'];
       $this->ihs_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ihs_'];
       $this->pfa_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pfa_'];
       $this->tipo_asig_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['tipo_asig_'];
       $this->eval_1_per_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['eval_1_per_'];
       $this->dc1_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc1_'];
       $this->dc2_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc2_'];
       $this->dc3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc3_'];
       $this->dc4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc4_'];
       $this->dc5_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc5_'];
       $this->pcent_dc_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_dc_'];
       $this->ds1_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds1_'];
       $this->ds2_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds2_'];
       $this->ds3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds3_'];
       $this->ds4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds4_'];
       $this->ds5_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds5_'];
       $this->pcent_ds_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_ds_'];
       $this->dp1_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp1_'];
       $this->dp2_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp2_'];
       $this->dp3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp3_'];
       $this->dp4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp4_'];
       $this->dp5_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp5_'];
       $this->pcent_dp_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_dp_'];
       $this->eval_2_per_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['eval_2_per_'];
       $this->dc1_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc1_2p_'];
       $this->dc2_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc2_2p_'];
       $this->dc3_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc3_2p_'];
       $this->dc4_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc4_2p_'];
       $this->dc5_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc5_2p_'];
       $this->pcent_dc2_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_dc2_'];
       $this->ds1_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds1_2p_'];
       $this->ds2_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds2_2p_'];
       $this->ds3_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds3_2p_'];
       $this->ds4_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds4_2p_'];
       $this->ds5_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds5_2p_'];
       $this->pcent_ds2_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_ds2_'];
       $this->dp1_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp1_2p_'];
       $this->dp2_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp2_2p_'];
       $this->dp3_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp3_2p_'];
       $this->dp4_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp4_2p_'];
       $this->dp5_2p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp5_2p_'];
       $this->pcent_dp2_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_dp2_'];
       $this->eval_3_per_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['eval_3_per_'];
       $this->dc1_3p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc1_3p_'];
       $this->dc2_3p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc2_3p_'];
       $this->dc3_3p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc3_3p_'];
       $this->dc4_3p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc4_3p_'];
       $this->dc5_3p_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc5_3p_'];
       $this->pcent_dc3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_dc3_'];
       $this->ds1_p3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds1_p3_'];
       $this->ds2_p3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds2_p3_'];
       $this->ds3_p3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds3_p3_'];
       $this->ds4_p3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds4_p3_'];
       $this->ds5_p3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds5_p3_'];
       $this->pcent_ds3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_ds3_'];
       $this->dp1_p3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp1_p3_'];
       $this->dp2_p3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp2_p3_'];
       $this->dp3_p3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp3_p3_'];
       $this->dp4_p3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp4_p3_'];
       $this->sc_field_0_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['sc_field_0_'];
       $this->pcent_dp3_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_dp3_'];
       $this->entorno_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['entorno_'];
       $this->estudiantes_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['estudiantes_'];
       $this->id_novedad_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['id_novedad_'];
       $this->nom_grupo_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['nom_grupo_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_estudiante_'] = true;
           $this->nmgp_cmp_readonly['estatus_'] = true;
           $this->nmgp_cmp_readonly['novedad_'] = true;
           $this->nmgp_cmp_readonly['eval_4_per_'] = true;
           $this->nmgp_cmp_readonly['dc1_p4_'] = true;
           $this->nmgp_cmp_readonly['dc2_p4_'] = true;
           $this->nmgp_cmp_readonly['dc3_p4_'] = true;
           $this->nmgp_cmp_readonly['dc4_p4_'] = true;
           $this->nmgp_cmp_readonly['dc5_p4_'] = true;
           $this->nmgp_cmp_readonly['pcent_dc4_'] = true;
           $this->nmgp_cmp_readonly['dp1_p4_'] = true;
           $this->nmgp_cmp_readonly['dp2_p4_'] = true;
           $this->nmgp_cmp_readonly['dp3_p4_'] = true;
           $this->nmgp_cmp_readonly['dp4_p4_'] = true;
           $this->nmgp_cmp_readonly['dp5_p4_'] = true;
           $this->nmgp_cmp_readonly['pcent_dp4_'] = true;
           $this->nmgp_cmp_readonly['ds1_p4_'] = true;
           $this->nmgp_cmp_readonly['ds2_p4_'] = true;
           $this->nmgp_cmp_readonly['ds3_p4_'] = true;
           $this->nmgp_cmp_readonly['ds4_p4_'] = true;
           $this->nmgp_cmp_readonly['ds5_p4_'] = true;
           $this->nmgp_cmp_readonly['pcent_ds4_'] = true;
           $this->nmgp_cmp_readonly['val_acumulada_'] = true;
           $this->nmgp_cmp_readonly['val_requerida_'] = true;
           $this->nmgp_cmp_readonly['eval_final_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_estudiante_']) || $this->nmgp_cmp_readonly['id_estudiante_'] != "on") {$this->nmgp_cmp_readonly['id_estudiante_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['estatus_']) || $this->nmgp_cmp_readonly['estatus_'] != "on") {$this->nmgp_cmp_readonly['estatus_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['novedad_']) || $this->nmgp_cmp_readonly['novedad_'] != "on") {$this->nmgp_cmp_readonly['novedad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['eval_4_per_']) || $this->nmgp_cmp_readonly['eval_4_per_'] != "on") {$this->nmgp_cmp_readonly['eval_4_per_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc1_p4_']) || $this->nmgp_cmp_readonly['dc1_p4_'] != "on") {$this->nmgp_cmp_readonly['dc1_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc2_p4_']) || $this->nmgp_cmp_readonly['dc2_p4_'] != "on") {$this->nmgp_cmp_readonly['dc2_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc3_p4_']) || $this->nmgp_cmp_readonly['dc3_p4_'] != "on") {$this->nmgp_cmp_readonly['dc3_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc4_p4_']) || $this->nmgp_cmp_readonly['dc4_p4_'] != "on") {$this->nmgp_cmp_readonly['dc4_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc5_p4_']) || $this->nmgp_cmp_readonly['dc5_p4_'] != "on") {$this->nmgp_cmp_readonly['dc5_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dc4_']) || $this->nmgp_cmp_readonly['pcent_dc4_'] != "on") {$this->nmgp_cmp_readonly['pcent_dc4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp1_p4_']) || $this->nmgp_cmp_readonly['dp1_p4_'] != "on") {$this->nmgp_cmp_readonly['dp1_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp2_p4_']) || $this->nmgp_cmp_readonly['dp2_p4_'] != "on") {$this->nmgp_cmp_readonly['dp2_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp3_p4_']) || $this->nmgp_cmp_readonly['dp3_p4_'] != "on") {$this->nmgp_cmp_readonly['dp3_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp4_p4_']) || $this->nmgp_cmp_readonly['dp4_p4_'] != "on") {$this->nmgp_cmp_readonly['dp4_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp5_p4_']) || $this->nmgp_cmp_readonly['dp5_p4_'] != "on") {$this->nmgp_cmp_readonly['dp5_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dp4_']) || $this->nmgp_cmp_readonly['pcent_dp4_'] != "on") {$this->nmgp_cmp_readonly['pcent_dp4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds1_p4_']) || $this->nmgp_cmp_readonly['ds1_p4_'] != "on") {$this->nmgp_cmp_readonly['ds1_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds2_p4_']) || $this->nmgp_cmp_readonly['ds2_p4_'] != "on") {$this->nmgp_cmp_readonly['ds2_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds3_p4_']) || $this->nmgp_cmp_readonly['ds3_p4_'] != "on") {$this->nmgp_cmp_readonly['ds3_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds4_p4_']) || $this->nmgp_cmp_readonly['ds4_p4_'] != "on") {$this->nmgp_cmp_readonly['ds4_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds5_p4_']) || $this->nmgp_cmp_readonly['ds5_p4_'] != "on") {$this->nmgp_cmp_readonly['ds5_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_ds4_']) || $this->nmgp_cmp_readonly['pcent_ds4_'] != "on") {$this->nmgp_cmp_readonly['pcent_ds4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['val_acumulada_']) || $this->nmgp_cmp_readonly['val_acumulada_'] != "on") {$this->nmgp_cmp_readonly['val_acumulada_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['val_requerida_']) || $this->nmgp_cmp_readonly['val_requerida_'] != "on") {$this->nmgp_cmp_readonly['val_requerida_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['eval_final_']) || $this->nmgp_cmp_readonly['eval_final_'] != "on") {$this->nmgp_cmp_readonly['eval_final_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_estudiante_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['id_estudiante_']; 
       $id_estudiante_ = $this->id_estudiante_; 
       $sStyleHidden_id_estudiante_ = '';
       if (isset($sCheckRead_id_estudiante_))
       {
           unset($sCheckRead_id_estudiante_);
       }
       if (isset($this->nmgp_cmp_readonly['id_estudiante_']))
       {
           $sCheckRead_id_estudiante_ = $this->nmgp_cmp_readonly['id_estudiante_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_estudiante_']) && $this->nmgp_cmp_hidden['id_estudiante_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_estudiante_']);
           $sStyleHidden_id_estudiante_ = 'display: none;';
       }
       $bTestReadOnly_id_estudiante_ = true;
       $sStyleReadLab_id_estudiante_ = 'display: none;';
       $sStyleReadInp_id_estudiante_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_estudiante_"]) &&  $this->nmgp_cmp_readonly["id_estudiante_"] == "on"))
       {
           $bTestReadOnly_id_estudiante_ = false;
           unset($this->nmgp_cmp_readonly['id_estudiante_']);
           $sStyleReadLab_id_estudiante_ = '';
           $sStyleReadInp_id_estudiante_ = 'display: none;';
       }
       $this->estatus_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['estatus_']; 
       $estatus_ = $this->estatus_; 
       $sStyleHidden_estatus_ = '';
       if (isset($sCheckRead_estatus_))
       {
           unset($sCheckRead_estatus_);
       }
       if (isset($this->nmgp_cmp_readonly['estatus_']))
       {
           $sCheckRead_estatus_ = $this->nmgp_cmp_readonly['estatus_'];
       }
       if (isset($this->nmgp_cmp_hidden['estatus_']) && $this->nmgp_cmp_hidden['estatus_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['estatus_']);
           $sStyleHidden_estatus_ = 'display: none;';
       }
       $bTestReadOnly_estatus_ = true;
       $sStyleReadLab_estatus_ = 'display: none;';
       $sStyleReadInp_estatus_ = '';
       if (isset($this->nmgp_cmp_readonly['estatus_']) && $this->nmgp_cmp_readonly['estatus_'] == 'on')
       {
           $bTestReadOnly_estatus_ = false;
           unset($this->nmgp_cmp_readonly['estatus_']);
           $sStyleReadLab_estatus_ = '';
           $sStyleReadInp_estatus_ = 'display: none;';
       }
       $this->novedad_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['novedad_']; 
       $novedad_ = $this->novedad_; 
       $sStyleHidden_novedad_ = '';
       if (isset($sCheckRead_novedad_))
       {
           unset($sCheckRead_novedad_);
       }
       if (isset($this->nmgp_cmp_readonly['novedad_']))
       {
           $sCheckRead_novedad_ = $this->nmgp_cmp_readonly['novedad_'];
       }
       if (isset($this->nmgp_cmp_hidden['novedad_']) && $this->nmgp_cmp_hidden['novedad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['novedad_']);
           $sStyleHidden_novedad_ = 'display: none;';
       }
       $bTestReadOnly_novedad_ = true;
       $sStyleReadLab_novedad_ = 'display: none;';
       $sStyleReadInp_novedad_ = '';
       if (isset($this->nmgp_cmp_readonly['novedad_']) && $this->nmgp_cmp_readonly['novedad_'] == 'on')
       {
           $bTestReadOnly_novedad_ = false;
           unset($this->nmgp_cmp_readonly['novedad_']);
           $sStyleReadLab_novedad_ = '';
           $sStyleReadInp_novedad_ = 'display: none;';
       }
       $this->eval_4_per_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['eval_4_per_']; 
       $eval_4_per_ = $this->eval_4_per_; 
       $sStyleHidden_eval_4_per_ = '';
       if (isset($sCheckRead_eval_4_per_))
       {
           unset($sCheckRead_eval_4_per_);
       }
       if (isset($this->nmgp_cmp_readonly['eval_4_per_']))
       {
           $sCheckRead_eval_4_per_ = $this->nmgp_cmp_readonly['eval_4_per_'];
       }
       if (isset($this->nmgp_cmp_hidden['eval_4_per_']) && $this->nmgp_cmp_hidden['eval_4_per_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['eval_4_per_']);
           $sStyleHidden_eval_4_per_ = 'display: none;';
       }
       $bTestReadOnly_eval_4_per_ = true;
       $sStyleReadLab_eval_4_per_ = 'display: none;';
       $sStyleReadInp_eval_4_per_ = '';
       if (isset($this->nmgp_cmp_readonly['eval_4_per_']) && $this->nmgp_cmp_readonly['eval_4_per_'] == 'on')
       {
           $bTestReadOnly_eval_4_per_ = false;
           unset($this->nmgp_cmp_readonly['eval_4_per_']);
           $sStyleReadLab_eval_4_per_ = '';
           $sStyleReadInp_eval_4_per_ = 'display: none;';
       }
       $this->dc1_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc1_p4_']; 
       $dc1_p4_ = $this->dc1_p4_; 
       $sStyleHidden_dc1_p4_ = '';
       if (isset($sCheckRead_dc1_p4_))
       {
           unset($sCheckRead_dc1_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['dc1_p4_']))
       {
           $sCheckRead_dc1_p4_ = $this->nmgp_cmp_readonly['dc1_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc1_p4_']) && $this->nmgp_cmp_hidden['dc1_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc1_p4_']);
           $sStyleHidden_dc1_p4_ = 'display: none;';
       }
       $bTestReadOnly_dc1_p4_ = true;
       $sStyleReadLab_dc1_p4_ = 'display: none;';
       $sStyleReadInp_dc1_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['dc1_p4_']) && $this->nmgp_cmp_readonly['dc1_p4_'] == 'on')
       {
           $bTestReadOnly_dc1_p4_ = false;
           unset($this->nmgp_cmp_readonly['dc1_p4_']);
           $sStyleReadLab_dc1_p4_ = '';
           $sStyleReadInp_dc1_p4_ = 'display: none;';
       }
       $this->dc2_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc2_p4_']; 
       $dc2_p4_ = $this->dc2_p4_; 
       $sStyleHidden_dc2_p4_ = '';
       if (isset($sCheckRead_dc2_p4_))
       {
           unset($sCheckRead_dc2_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['dc2_p4_']))
       {
           $sCheckRead_dc2_p4_ = $this->nmgp_cmp_readonly['dc2_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc2_p4_']) && $this->nmgp_cmp_hidden['dc2_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc2_p4_']);
           $sStyleHidden_dc2_p4_ = 'display: none;';
       }
       $bTestReadOnly_dc2_p4_ = true;
       $sStyleReadLab_dc2_p4_ = 'display: none;';
       $sStyleReadInp_dc2_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['dc2_p4_']) && $this->nmgp_cmp_readonly['dc2_p4_'] == 'on')
       {
           $bTestReadOnly_dc2_p4_ = false;
           unset($this->nmgp_cmp_readonly['dc2_p4_']);
           $sStyleReadLab_dc2_p4_ = '';
           $sStyleReadInp_dc2_p4_ = 'display: none;';
       }
       $this->dc3_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc3_p4_']; 
       $dc3_p4_ = $this->dc3_p4_; 
       $sStyleHidden_dc3_p4_ = '';
       if (isset($sCheckRead_dc3_p4_))
       {
           unset($sCheckRead_dc3_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['dc3_p4_']))
       {
           $sCheckRead_dc3_p4_ = $this->nmgp_cmp_readonly['dc3_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc3_p4_']) && $this->nmgp_cmp_hidden['dc3_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc3_p4_']);
           $sStyleHidden_dc3_p4_ = 'display: none;';
       }
       $bTestReadOnly_dc3_p4_ = true;
       $sStyleReadLab_dc3_p4_ = 'display: none;';
       $sStyleReadInp_dc3_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['dc3_p4_']) && $this->nmgp_cmp_readonly['dc3_p4_'] == 'on')
       {
           $bTestReadOnly_dc3_p4_ = false;
           unset($this->nmgp_cmp_readonly['dc3_p4_']);
           $sStyleReadLab_dc3_p4_ = '';
           $sStyleReadInp_dc3_p4_ = 'display: none;';
       }
       $this->dc4_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc4_p4_']; 
       $dc4_p4_ = $this->dc4_p4_; 
       $sStyleHidden_dc4_p4_ = '';
       if (isset($sCheckRead_dc4_p4_))
       {
           unset($sCheckRead_dc4_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['dc4_p4_']))
       {
           $sCheckRead_dc4_p4_ = $this->nmgp_cmp_readonly['dc4_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc4_p4_']) && $this->nmgp_cmp_hidden['dc4_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc4_p4_']);
           $sStyleHidden_dc4_p4_ = 'display: none;';
       }
       $bTestReadOnly_dc4_p4_ = true;
       $sStyleReadLab_dc4_p4_ = 'display: none;';
       $sStyleReadInp_dc4_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['dc4_p4_']) && $this->nmgp_cmp_readonly['dc4_p4_'] == 'on')
       {
           $bTestReadOnly_dc4_p4_ = false;
           unset($this->nmgp_cmp_readonly['dc4_p4_']);
           $sStyleReadLab_dc4_p4_ = '';
           $sStyleReadInp_dc4_p4_ = 'display: none;';
       }
       $this->dc5_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dc5_p4_']; 
       $dc5_p4_ = $this->dc5_p4_; 
       $sStyleHidden_dc5_p4_ = '';
       if (isset($sCheckRead_dc5_p4_))
       {
           unset($sCheckRead_dc5_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['dc5_p4_']))
       {
           $sCheckRead_dc5_p4_ = $this->nmgp_cmp_readonly['dc5_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc5_p4_']) && $this->nmgp_cmp_hidden['dc5_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc5_p4_']);
           $sStyleHidden_dc5_p4_ = 'display: none;';
       }
       $bTestReadOnly_dc5_p4_ = true;
       $sStyleReadLab_dc5_p4_ = 'display: none;';
       $sStyleReadInp_dc5_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['dc5_p4_']) && $this->nmgp_cmp_readonly['dc5_p4_'] == 'on')
       {
           $bTestReadOnly_dc5_p4_ = false;
           unset($this->nmgp_cmp_readonly['dc5_p4_']);
           $sStyleReadLab_dc5_p4_ = '';
           $sStyleReadInp_dc5_p4_ = 'display: none;';
       }
       $this->pcent_dc4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_dc4_']; 
       $pcent_dc4_ = $this->pcent_dc4_; 
       $sStyleHidden_pcent_dc4_ = '';
       if (isset($sCheckRead_pcent_dc4_))
       {
           unset($sCheckRead_pcent_dc4_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_dc4_']))
       {
           $sCheckRead_pcent_dc4_ = $this->nmgp_cmp_readonly['pcent_dc4_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_dc4_']) && $this->nmgp_cmp_hidden['pcent_dc4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_dc4_']);
           $sStyleHidden_pcent_dc4_ = 'display: none;';
       }
       $bTestReadOnly_pcent_dc4_ = true;
       $sStyleReadLab_pcent_dc4_ = 'display: none;';
       $sStyleReadInp_pcent_dc4_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_dc4_']) && $this->nmgp_cmp_readonly['pcent_dc4_'] == 'on')
       {
           $bTestReadOnly_pcent_dc4_ = false;
           unset($this->nmgp_cmp_readonly['pcent_dc4_']);
           $sStyleReadLab_pcent_dc4_ = '';
           $sStyleReadInp_pcent_dc4_ = 'display: none;';
       }
       $this->dp1_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp1_p4_']; 
       $dp1_p4_ = $this->dp1_p4_; 
       $sStyleHidden_dp1_p4_ = '';
       if (isset($sCheckRead_dp1_p4_))
       {
           unset($sCheckRead_dp1_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['dp1_p4_']))
       {
           $sCheckRead_dp1_p4_ = $this->nmgp_cmp_readonly['dp1_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp1_p4_']) && $this->nmgp_cmp_hidden['dp1_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp1_p4_']);
           $sStyleHidden_dp1_p4_ = 'display: none;';
       }
       $bTestReadOnly_dp1_p4_ = true;
       $sStyleReadLab_dp1_p4_ = 'display: none;';
       $sStyleReadInp_dp1_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['dp1_p4_']) && $this->nmgp_cmp_readonly['dp1_p4_'] == 'on')
       {
           $bTestReadOnly_dp1_p4_ = false;
           unset($this->nmgp_cmp_readonly['dp1_p4_']);
           $sStyleReadLab_dp1_p4_ = '';
           $sStyleReadInp_dp1_p4_ = 'display: none;';
       }
       $this->dp2_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp2_p4_']; 
       $dp2_p4_ = $this->dp2_p4_; 
       $sStyleHidden_dp2_p4_ = '';
       if (isset($sCheckRead_dp2_p4_))
       {
           unset($sCheckRead_dp2_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['dp2_p4_']))
       {
           $sCheckRead_dp2_p4_ = $this->nmgp_cmp_readonly['dp2_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp2_p4_']) && $this->nmgp_cmp_hidden['dp2_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp2_p4_']);
           $sStyleHidden_dp2_p4_ = 'display: none;';
       }
       $bTestReadOnly_dp2_p4_ = true;
       $sStyleReadLab_dp2_p4_ = 'display: none;';
       $sStyleReadInp_dp2_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['dp2_p4_']) && $this->nmgp_cmp_readonly['dp2_p4_'] == 'on')
       {
           $bTestReadOnly_dp2_p4_ = false;
           unset($this->nmgp_cmp_readonly['dp2_p4_']);
           $sStyleReadLab_dp2_p4_ = '';
           $sStyleReadInp_dp2_p4_ = 'display: none;';
       }
       $this->dp3_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp3_p4_']; 
       $dp3_p4_ = $this->dp3_p4_; 
       $sStyleHidden_dp3_p4_ = '';
       if (isset($sCheckRead_dp3_p4_))
       {
           unset($sCheckRead_dp3_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['dp3_p4_']))
       {
           $sCheckRead_dp3_p4_ = $this->nmgp_cmp_readonly['dp3_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp3_p4_']) && $this->nmgp_cmp_hidden['dp3_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp3_p4_']);
           $sStyleHidden_dp3_p4_ = 'display: none;';
       }
       $bTestReadOnly_dp3_p4_ = true;
       $sStyleReadLab_dp3_p4_ = 'display: none;';
       $sStyleReadInp_dp3_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['dp3_p4_']) && $this->nmgp_cmp_readonly['dp3_p4_'] == 'on')
       {
           $bTestReadOnly_dp3_p4_ = false;
           unset($this->nmgp_cmp_readonly['dp3_p4_']);
           $sStyleReadLab_dp3_p4_ = '';
           $sStyleReadInp_dp3_p4_ = 'display: none;';
       }
       $this->dp4_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp4_p4_']; 
       $dp4_p4_ = $this->dp4_p4_; 
       $sStyleHidden_dp4_p4_ = '';
       if (isset($sCheckRead_dp4_p4_))
       {
           unset($sCheckRead_dp4_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['dp4_p4_']))
       {
           $sCheckRead_dp4_p4_ = $this->nmgp_cmp_readonly['dp4_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp4_p4_']) && $this->nmgp_cmp_hidden['dp4_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp4_p4_']);
           $sStyleHidden_dp4_p4_ = 'display: none;';
       }
       $bTestReadOnly_dp4_p4_ = true;
       $sStyleReadLab_dp4_p4_ = 'display: none;';
       $sStyleReadInp_dp4_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['dp4_p4_']) && $this->nmgp_cmp_readonly['dp4_p4_'] == 'on')
       {
           $bTestReadOnly_dp4_p4_ = false;
           unset($this->nmgp_cmp_readonly['dp4_p4_']);
           $sStyleReadLab_dp4_p4_ = '';
           $sStyleReadInp_dp4_p4_ = 'display: none;';
       }
       $this->dp5_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['dp5_p4_']; 
       $dp5_p4_ = $this->dp5_p4_; 
       $sStyleHidden_dp5_p4_ = '';
       if (isset($sCheckRead_dp5_p4_))
       {
           unset($sCheckRead_dp5_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['dp5_p4_']))
       {
           $sCheckRead_dp5_p4_ = $this->nmgp_cmp_readonly['dp5_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp5_p4_']) && $this->nmgp_cmp_hidden['dp5_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp5_p4_']);
           $sStyleHidden_dp5_p4_ = 'display: none;';
       }
       $bTestReadOnly_dp5_p4_ = true;
       $sStyleReadLab_dp5_p4_ = 'display: none;';
       $sStyleReadInp_dp5_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['dp5_p4_']) && $this->nmgp_cmp_readonly['dp5_p4_'] == 'on')
       {
           $bTestReadOnly_dp5_p4_ = false;
           unset($this->nmgp_cmp_readonly['dp5_p4_']);
           $sStyleReadLab_dp5_p4_ = '';
           $sStyleReadInp_dp5_p4_ = 'display: none;';
       }
       $this->pcent_dp4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_dp4_']; 
       $pcent_dp4_ = $this->pcent_dp4_; 
       $sStyleHidden_pcent_dp4_ = '';
       if (isset($sCheckRead_pcent_dp4_))
       {
           unset($sCheckRead_pcent_dp4_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_dp4_']))
       {
           $sCheckRead_pcent_dp4_ = $this->nmgp_cmp_readonly['pcent_dp4_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_dp4_']) && $this->nmgp_cmp_hidden['pcent_dp4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_dp4_']);
           $sStyleHidden_pcent_dp4_ = 'display: none;';
       }
       $bTestReadOnly_pcent_dp4_ = true;
       $sStyleReadLab_pcent_dp4_ = 'display: none;';
       $sStyleReadInp_pcent_dp4_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_dp4_']) && $this->nmgp_cmp_readonly['pcent_dp4_'] == 'on')
       {
           $bTestReadOnly_pcent_dp4_ = false;
           unset($this->nmgp_cmp_readonly['pcent_dp4_']);
           $sStyleReadLab_pcent_dp4_ = '';
           $sStyleReadInp_pcent_dp4_ = 'display: none;';
       }
       $this->ds1_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds1_p4_']; 
       $ds1_p4_ = $this->ds1_p4_; 
       $sStyleHidden_ds1_p4_ = '';
       if (isset($sCheckRead_ds1_p4_))
       {
           unset($sCheckRead_ds1_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['ds1_p4_']))
       {
           $sCheckRead_ds1_p4_ = $this->nmgp_cmp_readonly['ds1_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds1_p4_']) && $this->nmgp_cmp_hidden['ds1_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds1_p4_']);
           $sStyleHidden_ds1_p4_ = 'display: none;';
       }
       $bTestReadOnly_ds1_p4_ = true;
       $sStyleReadLab_ds1_p4_ = 'display: none;';
       $sStyleReadInp_ds1_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['ds1_p4_']) && $this->nmgp_cmp_readonly['ds1_p4_'] == 'on')
       {
           $bTestReadOnly_ds1_p4_ = false;
           unset($this->nmgp_cmp_readonly['ds1_p4_']);
           $sStyleReadLab_ds1_p4_ = '';
           $sStyleReadInp_ds1_p4_ = 'display: none;';
       }
       $this->ds2_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds2_p4_']; 
       $ds2_p4_ = $this->ds2_p4_; 
       $sStyleHidden_ds2_p4_ = '';
       if (isset($sCheckRead_ds2_p4_))
       {
           unset($sCheckRead_ds2_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['ds2_p4_']))
       {
           $sCheckRead_ds2_p4_ = $this->nmgp_cmp_readonly['ds2_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds2_p4_']) && $this->nmgp_cmp_hidden['ds2_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds2_p4_']);
           $sStyleHidden_ds2_p4_ = 'display: none;';
       }
       $bTestReadOnly_ds2_p4_ = true;
       $sStyleReadLab_ds2_p4_ = 'display: none;';
       $sStyleReadInp_ds2_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['ds2_p4_']) && $this->nmgp_cmp_readonly['ds2_p4_'] == 'on')
       {
           $bTestReadOnly_ds2_p4_ = false;
           unset($this->nmgp_cmp_readonly['ds2_p4_']);
           $sStyleReadLab_ds2_p4_ = '';
           $sStyleReadInp_ds2_p4_ = 'display: none;';
       }
       $this->ds3_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds3_p4_']; 
       $ds3_p4_ = $this->ds3_p4_; 
       $sStyleHidden_ds3_p4_ = '';
       if (isset($sCheckRead_ds3_p4_))
       {
           unset($sCheckRead_ds3_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['ds3_p4_']))
       {
           $sCheckRead_ds3_p4_ = $this->nmgp_cmp_readonly['ds3_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds3_p4_']) && $this->nmgp_cmp_hidden['ds3_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds3_p4_']);
           $sStyleHidden_ds3_p4_ = 'display: none;';
       }
       $bTestReadOnly_ds3_p4_ = true;
       $sStyleReadLab_ds3_p4_ = 'display: none;';
       $sStyleReadInp_ds3_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['ds3_p4_']) && $this->nmgp_cmp_readonly['ds3_p4_'] == 'on')
       {
           $bTestReadOnly_ds3_p4_ = false;
           unset($this->nmgp_cmp_readonly['ds3_p4_']);
           $sStyleReadLab_ds3_p4_ = '';
           $sStyleReadInp_ds3_p4_ = 'display: none;';
       }
       $this->ds4_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds4_p4_']; 
       $ds4_p4_ = $this->ds4_p4_; 
       $sStyleHidden_ds4_p4_ = '';
       if (isset($sCheckRead_ds4_p4_))
       {
           unset($sCheckRead_ds4_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['ds4_p4_']))
       {
           $sCheckRead_ds4_p4_ = $this->nmgp_cmp_readonly['ds4_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds4_p4_']) && $this->nmgp_cmp_hidden['ds4_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds4_p4_']);
           $sStyleHidden_ds4_p4_ = 'display: none;';
       }
       $bTestReadOnly_ds4_p4_ = true;
       $sStyleReadLab_ds4_p4_ = 'display: none;';
       $sStyleReadInp_ds4_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['ds4_p4_']) && $this->nmgp_cmp_readonly['ds4_p4_'] == 'on')
       {
           $bTestReadOnly_ds4_p4_ = false;
           unset($this->nmgp_cmp_readonly['ds4_p4_']);
           $sStyleReadLab_ds4_p4_ = '';
           $sStyleReadInp_ds4_p4_ = 'display: none;';
       }
       $this->ds5_p4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['ds5_p4_']; 
       $ds5_p4_ = $this->ds5_p4_; 
       $sStyleHidden_ds5_p4_ = '';
       if (isset($sCheckRead_ds5_p4_))
       {
           unset($sCheckRead_ds5_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['ds5_p4_']))
       {
           $sCheckRead_ds5_p4_ = $this->nmgp_cmp_readonly['ds5_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds5_p4_']) && $this->nmgp_cmp_hidden['ds5_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds5_p4_']);
           $sStyleHidden_ds5_p4_ = 'display: none;';
       }
       $bTestReadOnly_ds5_p4_ = true;
       $sStyleReadLab_ds5_p4_ = 'display: none;';
       $sStyleReadInp_ds5_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['ds5_p4_']) && $this->nmgp_cmp_readonly['ds5_p4_'] == 'on')
       {
           $bTestReadOnly_ds5_p4_ = false;
           unset($this->nmgp_cmp_readonly['ds5_p4_']);
           $sStyleReadLab_ds5_p4_ = '';
           $sStyleReadInp_ds5_p4_ = 'display: none;';
       }
       $this->pcent_ds4_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['pcent_ds4_']; 
       $pcent_ds4_ = $this->pcent_ds4_; 
       $sStyleHidden_pcent_ds4_ = '';
       if (isset($sCheckRead_pcent_ds4_))
       {
           unset($sCheckRead_pcent_ds4_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_ds4_']))
       {
           $sCheckRead_pcent_ds4_ = $this->nmgp_cmp_readonly['pcent_ds4_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_ds4_']) && $this->nmgp_cmp_hidden['pcent_ds4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_ds4_']);
           $sStyleHidden_pcent_ds4_ = 'display: none;';
       }
       $bTestReadOnly_pcent_ds4_ = true;
       $sStyleReadLab_pcent_ds4_ = 'display: none;';
       $sStyleReadInp_pcent_ds4_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_ds4_']) && $this->nmgp_cmp_readonly['pcent_ds4_'] == 'on')
       {
           $bTestReadOnly_pcent_ds4_ = false;
           unset($this->nmgp_cmp_readonly['pcent_ds4_']);
           $sStyleReadLab_pcent_ds4_ = '';
           $sStyleReadInp_pcent_ds4_ = 'display: none;';
       }
       $this->val_acumulada_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['val_acumulada_']; 
       $val_acumulada_ = $this->val_acumulada_; 
       $sStyleHidden_val_acumulada_ = '';
       if (isset($sCheckRead_val_acumulada_))
       {
           unset($sCheckRead_val_acumulada_);
       }
       if (isset($this->nmgp_cmp_readonly['val_acumulada_']))
       {
           $sCheckRead_val_acumulada_ = $this->nmgp_cmp_readonly['val_acumulada_'];
       }
       if (isset($this->nmgp_cmp_hidden['val_acumulada_']) && $this->nmgp_cmp_hidden['val_acumulada_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['val_acumulada_']);
           $sStyleHidden_val_acumulada_ = 'display: none;';
       }
       $bTestReadOnly_val_acumulada_ = true;
       $sStyleReadLab_val_acumulada_ = 'display: none;';
       $sStyleReadInp_val_acumulada_ = '';
       if (isset($this->nmgp_cmp_readonly['val_acumulada_']) && $this->nmgp_cmp_readonly['val_acumulada_'] == 'on')
       {
           $bTestReadOnly_val_acumulada_ = false;
           unset($this->nmgp_cmp_readonly['val_acumulada_']);
           $sStyleReadLab_val_acumulada_ = '';
           $sStyleReadInp_val_acumulada_ = 'display: none;';
       }
       $this->val_requerida_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['val_requerida_']; 
       $val_requerida_ = $this->val_requerida_; 
       $sStyleHidden_val_requerida_ = '';
       if (isset($sCheckRead_val_requerida_))
       {
           unset($sCheckRead_val_requerida_);
       }
       if (isset($this->nmgp_cmp_readonly['val_requerida_']))
       {
           $sCheckRead_val_requerida_ = $this->nmgp_cmp_readonly['val_requerida_'];
       }
       if (isset($this->nmgp_cmp_hidden['val_requerida_']) && $this->nmgp_cmp_hidden['val_requerida_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['val_requerida_']);
           $sStyleHidden_val_requerida_ = 'display: none;';
       }
       $bTestReadOnly_val_requerida_ = true;
       $sStyleReadLab_val_requerida_ = 'display: none;';
       $sStyleReadInp_val_requerida_ = '';
       if (isset($this->nmgp_cmp_readonly['val_requerida_']) && $this->nmgp_cmp_readonly['val_requerida_'] == 'on')
       {
           $bTestReadOnly_val_requerida_ = false;
           unset($this->nmgp_cmp_readonly['val_requerida_']);
           $sStyleReadLab_val_requerida_ = '';
           $sStyleReadInp_val_requerida_ = 'display: none;';
       }
       $this->eval_final_ = $this->form_vert_form_t_evaluacion_p4[$sc_seq_vert]['eval_final_']; 
       $eval_final_ = $this->eval_final_; 
       $sStyleHidden_eval_final_ = '';
       if (isset($sCheckRead_eval_final_))
       {
           unset($sCheckRead_eval_final_);
       }
       if (isset($this->nmgp_cmp_readonly['eval_final_']))
       {
           $sCheckRead_eval_final_ = $this->nmgp_cmp_readonly['eval_final_'];
       }
       if (isset($this->nmgp_cmp_hidden['eval_final_']) && $this->nmgp_cmp_hidden['eval_final_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['eval_final_']);
           $sStyleHidden_eval_final_ = 'display: none;';
       }
       $bTestReadOnly_eval_final_ = true;
       $sStyleReadLab_eval_final_ = 'display: none;';
       $sStyleReadInp_eval_final_ = '';
       if (isset($this->nmgp_cmp_readonly['eval_final_']) && $this->nmgp_cmp_readonly['eval_final_'] == 'on')
       {
           $bTestReadOnly_eval_final_ = false;
           unset($this->nmgp_cmp_readonly['eval_final_']);
           $sStyleReadLab_eval_final_ = '';
           $sStyleReadInp_eval_final_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['pdf_view'] && !$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['pdf_view']) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_botoes['delete'] == "on" && $this->nmgp_opcao != "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_botoes['update'] == "on" && $this->nmgp_opcao != "novo") {
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_t_evaluacion_p4_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_t_evaluacion_p4_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_t_evaluacion_p4_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_t_evaluacion_p4_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_t_evaluacion_p4_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_t_evaluacion_p4_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_estudiante_']) && $this->nmgp_cmp_hidden['id_estudiante_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_estudiante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_estudiante_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_estudiante__line" id="hidden_field_data_id_estudiante_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_estudiante_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_estudiante__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_estudiante_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id_estudiante_"]) &&  $this->nmgp_cmp_readonly["id_estudiante_"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_'] = array(); 
    }

   $old_value_eval_4_per_ = $this->eval_4_per_;
   $old_value_dc1_p4_ = $this->dc1_p4_;
   $old_value_dc2_p4_ = $this->dc2_p4_;
   $old_value_dc3_p4_ = $this->dc3_p4_;
   $old_value_dc4_p4_ = $this->dc4_p4_;
   $old_value_dc5_p4_ = $this->dc5_p4_;
   $old_value_pcent_dc4_ = $this->pcent_dc4_;
   $old_value_dp1_p4_ = $this->dp1_p4_;
   $old_value_dp2_p4_ = $this->dp2_p4_;
   $old_value_dp3_p4_ = $this->dp3_p4_;
   $old_value_dp4_p4_ = $this->dp4_p4_;
   $old_value_dp5_p4_ = $this->dp5_p4_;
   $old_value_pcent_dp4_ = $this->pcent_dp4_;
   $old_value_ds1_p4_ = $this->ds1_p4_;
   $old_value_ds2_p4_ = $this->ds2_p4_;
   $old_value_ds3_p4_ = $this->ds3_p4_;
   $old_value_ds4_p4_ = $this->ds4_p4_;
   $old_value_ds5_p4_ = $this->ds5_p4_;
   $old_value_pcent_ds4_ = $this->pcent_ds4_;
   $old_value_val_acumulada_ = $this->val_acumulada_;
   $old_value_val_requerida_ = $this->val_requerida_;
   $old_value_eval_final_ = $this->eval_final_;
   $this->nm_tira_formatacao();


   $unformatted_value_eval_4_per_ = $this->eval_4_per_;
   $unformatted_value_dc1_p4_ = $this->dc1_p4_;
   $unformatted_value_dc2_p4_ = $this->dc2_p4_;
   $unformatted_value_dc3_p4_ = $this->dc3_p4_;
   $unformatted_value_dc4_p4_ = $this->dc4_p4_;
   $unformatted_value_dc5_p4_ = $this->dc5_p4_;
   $unformatted_value_pcent_dc4_ = $this->pcent_dc4_;
   $unformatted_value_dp1_p4_ = $this->dp1_p4_;
   $unformatted_value_dp2_p4_ = $this->dp2_p4_;
   $unformatted_value_dp3_p4_ = $this->dp3_p4_;
   $unformatted_value_dp4_p4_ = $this->dp4_p4_;
   $unformatted_value_dp5_p4_ = $this->dp5_p4_;
   $unformatted_value_pcent_dp4_ = $this->pcent_dp4_;
   $unformatted_value_ds1_p4_ = $this->ds1_p4_;
   $unformatted_value_ds2_p4_ = $this->ds2_p4_;
   $unformatted_value_ds3_p4_ = $this->ds3_p4_;
   $unformatted_value_ds4_p4_ = $this->ds4_p4_;
   $unformatted_value_ds5_p4_ = $this->ds5_p4_;
   $unformatted_value_pcent_ds4_ = $this->pcent_ds4_;
   $unformatted_value_val_acumulada_ = $this->val_acumulada_;
   $unformatted_value_val_requerida_ = $this->val_requerida_;
   $unformatted_value_eval_final_ = $this->eval_final_;

   $nm_comando = "SELECT idstudents, concat_ws(' ',primer_apellido, segundo_apellido,primer_nombre, segundo_nombre) as nombre
FROM students 
ORDER BY nombre";

   $this->eval_4_per_ = $old_value_eval_4_per_;
   $this->dc1_p4_ = $old_value_dc1_p4_;
   $this->dc2_p4_ = $old_value_dc2_p4_;
   $this->dc3_p4_ = $old_value_dc3_p4_;
   $this->dc4_p4_ = $old_value_dc4_p4_;
   $this->dc5_p4_ = $old_value_dc5_p4_;
   $this->pcent_dc4_ = $old_value_pcent_dc4_;
   $this->dp1_p4_ = $old_value_dp1_p4_;
   $this->dp2_p4_ = $old_value_dp2_p4_;
   $this->dp3_p4_ = $old_value_dp3_p4_;
   $this->dp4_p4_ = $old_value_dp4_p4_;
   $this->dp5_p4_ = $old_value_dp5_p4_;
   $this->pcent_dp4_ = $old_value_pcent_dp4_;
   $this->ds1_p4_ = $old_value_ds1_p4_;
   $this->ds2_p4_ = $old_value_ds2_p4_;
   $this->ds3_p4_ = $old_value_ds3_p4_;
   $this->ds4_p4_ = $old_value_ds4_p4_;
   $this->ds5_p4_ = $old_value_ds5_p4_;
   $this->pcent_ds4_ = $old_value_pcent_ds4_;
   $this->val_acumulada_ = $old_value_val_acumulada_;
   $this->val_requerida_ = $old_value_val_requerida_;
   $this->eval_final_ = $old_value_eval_final_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_'][] = $rs->fields[0];
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
   $id_estudiante__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_estudiante__1))
          {
              foreach ($this->id_estudiante__1 as $tmp_id_estudiante_)
              {
                  if (trim($tmp_id_estudiante_) === trim($cadaselect[1])) { $id_estudiante__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_estudiante_) === trim($cadaselect[1])) { $id_estudiante__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_estudiante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_estudiante_) . "\"><span id=\"id_ajax_label_id_estudiante_" . $sc_seq_vert . "\">" . $id_estudiante__look . "</span>"; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_'] = array(); 
    }

   $old_value_eval_4_per_ = $this->eval_4_per_;
   $old_value_dc1_p4_ = $this->dc1_p4_;
   $old_value_dc2_p4_ = $this->dc2_p4_;
   $old_value_dc3_p4_ = $this->dc3_p4_;
   $old_value_dc4_p4_ = $this->dc4_p4_;
   $old_value_dc5_p4_ = $this->dc5_p4_;
   $old_value_pcent_dc4_ = $this->pcent_dc4_;
   $old_value_dp1_p4_ = $this->dp1_p4_;
   $old_value_dp2_p4_ = $this->dp2_p4_;
   $old_value_dp3_p4_ = $this->dp3_p4_;
   $old_value_dp4_p4_ = $this->dp4_p4_;
   $old_value_dp5_p4_ = $this->dp5_p4_;
   $old_value_pcent_dp4_ = $this->pcent_dp4_;
   $old_value_ds1_p4_ = $this->ds1_p4_;
   $old_value_ds2_p4_ = $this->ds2_p4_;
   $old_value_ds3_p4_ = $this->ds3_p4_;
   $old_value_ds4_p4_ = $this->ds4_p4_;
   $old_value_ds5_p4_ = $this->ds5_p4_;
   $old_value_pcent_ds4_ = $this->pcent_ds4_;
   $old_value_val_acumulada_ = $this->val_acumulada_;
   $old_value_val_requerida_ = $this->val_requerida_;
   $old_value_eval_final_ = $this->eval_final_;
   $this->nm_tira_formatacao();


   $unformatted_value_eval_4_per_ = $this->eval_4_per_;
   $unformatted_value_dc1_p4_ = $this->dc1_p4_;
   $unformatted_value_dc2_p4_ = $this->dc2_p4_;
   $unformatted_value_dc3_p4_ = $this->dc3_p4_;
   $unformatted_value_dc4_p4_ = $this->dc4_p4_;
   $unformatted_value_dc5_p4_ = $this->dc5_p4_;
   $unformatted_value_pcent_dc4_ = $this->pcent_dc4_;
   $unformatted_value_dp1_p4_ = $this->dp1_p4_;
   $unformatted_value_dp2_p4_ = $this->dp2_p4_;
   $unformatted_value_dp3_p4_ = $this->dp3_p4_;
   $unformatted_value_dp4_p4_ = $this->dp4_p4_;
   $unformatted_value_dp5_p4_ = $this->dp5_p4_;
   $unformatted_value_pcent_dp4_ = $this->pcent_dp4_;
   $unformatted_value_ds1_p4_ = $this->ds1_p4_;
   $unformatted_value_ds2_p4_ = $this->ds2_p4_;
   $unformatted_value_ds3_p4_ = $this->ds3_p4_;
   $unformatted_value_ds4_p4_ = $this->ds4_p4_;
   $unformatted_value_ds5_p4_ = $this->ds5_p4_;
   $unformatted_value_pcent_ds4_ = $this->pcent_ds4_;
   $unformatted_value_val_acumulada_ = $this->val_acumulada_;
   $unformatted_value_val_requerida_ = $this->val_requerida_;
   $unformatted_value_eval_final_ = $this->eval_final_;

   $nm_comando = "SELECT idstudents, concat_ws(' ',primer_apellido, segundo_apellido,primer_nombre, segundo_nombre) as nombre
FROM students 
ORDER BY nombre";

   $this->eval_4_per_ = $old_value_eval_4_per_;
   $this->dc1_p4_ = $old_value_dc1_p4_;
   $this->dc2_p4_ = $old_value_dc2_p4_;
   $this->dc3_p4_ = $old_value_dc3_p4_;
   $this->dc4_p4_ = $old_value_dc4_p4_;
   $this->dc5_p4_ = $old_value_dc5_p4_;
   $this->pcent_dc4_ = $old_value_pcent_dc4_;
   $this->dp1_p4_ = $old_value_dp1_p4_;
   $this->dp2_p4_ = $old_value_dp2_p4_;
   $this->dp3_p4_ = $old_value_dp3_p4_;
   $this->dp4_p4_ = $old_value_dp4_p4_;
   $this->dp5_p4_ = $old_value_dp5_p4_;
   $this->pcent_dp4_ = $old_value_pcent_dp4_;
   $this->ds1_p4_ = $old_value_ds1_p4_;
   $this->ds2_p4_ = $old_value_ds2_p4_;
   $this->ds3_p4_ = $old_value_ds3_p4_;
   $this->ds4_p4_ = $old_value_ds4_p4_;
   $this->ds5_p4_ = $old_value_ds5_p4_;
   $this->pcent_ds4_ = $old_value_pcent_ds4_;
   $this->val_acumulada_ = $old_value_val_acumulada_;
   $this->val_requerida_ = $old_value_val_requerida_;
   $this->eval_final_ = $old_value_eval_final_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['Lookup_id_estudiante_'][] = $rs->fields[0];
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
   $id_estudiante__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_estudiante__1))
          {
              foreach ($this->id_estudiante__1 as $tmp_id_estudiante_)
              {
                  if (trim($tmp_id_estudiante_) === trim($cadaselect[1])) { $id_estudiante__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_estudiante_) === trim($cadaselect[1])) { $id_estudiante__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_estudiante__look))
          {
              $id_estudiante__look = $this->id_estudiante_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_estudiante_" . $sc_seq_vert . "\" class=\"css_id_estudiante__line\" style=\"" .  $sStyleReadLab_id_estudiante_ . "\">" . $this->form_encode_input($id_estudiante__look) . "</span><span id=\"id_read_off_id_estudiante_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_id_estudiante_ . "\">";
   echo " <span id=\"idAjaxSelect_id_estudiante_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_estudiante__obj\" style=\"\" id=\"id_sc_field_id_estudiante_" . $sc_seq_vert . "\" name=\"id_estudiante_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_estudiante_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_estudiante_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_estudiante_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_estudiante_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['estatus_']) && $this->nmgp_cmp_hidden['estatus_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatus_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estatus_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_estatus__line" id="hidden_field_data_estatus_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_estatus_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_estatus__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="estatus_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estatus_); ?>"><span id="id_ajax_label_estatus_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($estatus_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estatus_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estatus_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['novedad_']) && $this->nmgp_cmp_hidden['novedad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="novedad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($novedad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_novedad__line" id="hidden_field_data_novedad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_novedad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_novedad__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="novedad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($novedad_); ?>"><span id="id_ajax_label_novedad_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($novedad_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_novedad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_novedad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_4_per_']) && $this->nmgp_cmp_hidden['eval_4_per_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="eval_4_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_4_per_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_eval_4_per__line" id="hidden_field_data_eval_4_per_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_eval_4_per_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_eval_4_per__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_eval_4_per_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["eval_4_per_"]) &&  $this->nmgp_cmp_readonly["eval_4_per_"] == "on") { 

 ?>
<input type="hidden" name="eval_4_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_4_per_) . "\">" . $eval_4_per_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_eval_4_per_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-eval_4_per_<?php echo $sc_seq_vert ?> css_eval_4_per__line" style="<?php echo $sStyleReadLab_eval_4_per_; ?>"><?php echo $this->form_encode_input($this->eval_4_per_); ?></span><span id="id_read_off_eval_4_per_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_eval_4_per_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_eval_4_per__obj" style="" id="id_sc_field_eval_4_per_<?php echo $sc_seq_vert ?>" type=text name="eval_4_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_4_per_) ?>"
 size=5 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['eval_4_per_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['eval_4_per_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_eval_4_per_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_eval_4_per_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc1_p4_']) && $this->nmgp_cmp_hidden['dc1_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc1_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc1_p4__line" id="hidden_field_data_dc1_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc1_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc1_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc1_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc1_p4_"]) &&  $this->nmgp_cmp_readonly["dc1_p4_"] == "on") { 

 ?>
<input type="hidden" name="dc1_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_p4_) . "\">" . $dc1_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc1_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc1_p4_<?php echo $sc_seq_vert ?> css_dc1_p4__line" style="<?php echo $sStyleReadLab_dc1_p4_; ?>"><?php echo $this->form_encode_input($this->dc1_p4_); ?></span><span id="id_read_off_dc1_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc1_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc1_p4__obj" style="" id="id_sc_field_dc1_p4_<?php echo $sc_seq_vert ?>" type=text name="dc1_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dc1_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dc1_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc1_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc1_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc2_p4_']) && $this->nmgp_cmp_hidden['dc2_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc2_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc2_p4__line" id="hidden_field_data_dc2_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc2_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc2_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc2_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc2_p4_"]) &&  $this->nmgp_cmp_readonly["dc2_p4_"] == "on") { 

 ?>
<input type="hidden" name="dc2_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_p4_) . "\">" . $dc2_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc2_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc2_p4_<?php echo $sc_seq_vert ?> css_dc2_p4__line" style="<?php echo $sStyleReadLab_dc2_p4_; ?>"><?php echo $this->form_encode_input($this->dc2_p4_); ?></span><span id="id_read_off_dc2_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc2_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc2_p4__obj" style="" id="id_sc_field_dc2_p4_<?php echo $sc_seq_vert ?>" type=text name="dc2_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dc2_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dc2_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc2_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc2_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc3_p4_']) && $this->nmgp_cmp_hidden['dc3_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc3_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc3_p4__line" id="hidden_field_data_dc3_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc3_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc3_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc3_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc3_p4_"]) &&  $this->nmgp_cmp_readonly["dc3_p4_"] == "on") { 

 ?>
<input type="hidden" name="dc3_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_p4_) . "\">" . $dc3_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc3_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc3_p4_<?php echo $sc_seq_vert ?> css_dc3_p4__line" style="<?php echo $sStyleReadLab_dc3_p4_; ?>"><?php echo $this->form_encode_input($this->dc3_p4_); ?></span><span id="id_read_off_dc3_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc3_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc3_p4__obj" style="" id="id_sc_field_dc3_p4_<?php echo $sc_seq_vert ?>" type=text name="dc3_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dc3_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dc3_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc3_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc3_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc4_p4_']) && $this->nmgp_cmp_hidden['dc4_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc4_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc4_p4__line" id="hidden_field_data_dc4_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc4_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc4_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc4_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc4_p4_"]) &&  $this->nmgp_cmp_readonly["dc4_p4_"] == "on") { 

 ?>
<input type="hidden" name="dc4_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_p4_) . "\">" . $dc4_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc4_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc4_p4_<?php echo $sc_seq_vert ?> css_dc4_p4__line" style="<?php echo $sStyleReadLab_dc4_p4_; ?>"><?php echo $this->form_encode_input($this->dc4_p4_); ?></span><span id="id_read_off_dc4_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc4_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc4_p4__obj" style="" id="id_sc_field_dc4_p4_<?php echo $sc_seq_vert ?>" type=text name="dc4_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dc4_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dc4_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc4_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc4_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc5_p4_']) && $this->nmgp_cmp_hidden['dc5_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc5_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc5_p4__line" id="hidden_field_data_dc5_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc5_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc5_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc5_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc5_p4_"]) &&  $this->nmgp_cmp_readonly["dc5_p4_"] == "on") { 

 ?>
<input type="hidden" name="dc5_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_p4_) . "\">" . $dc5_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc5_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc5_p4_<?php echo $sc_seq_vert ?> css_dc5_p4__line" style="<?php echo $sStyleReadLab_dc5_p4_; ?>"><?php echo $this->form_encode_input($this->dc5_p4_); ?></span><span id="id_read_off_dc5_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc5_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc5_p4__obj" style="" id="id_sc_field_dc5_p4_<?php echo $sc_seq_vert ?>" type=text name="dc5_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dc5_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dc5_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc5_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc5_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dc4_']) && $this->nmgp_cmp_hidden['pcent_dc4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_dc4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_dc4__line" id="hidden_field_data_pcent_dc4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_dc4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_dc4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_dc4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_dc4_"]) &&  $this->nmgp_cmp_readonly["pcent_dc4_"] == "on") { 

 ?>
<input type="hidden" name="pcent_dc4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc4_) . "\">" . $pcent_dc4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_dc4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_dc4_<?php echo $sc_seq_vert ?> css_pcent_dc4__line" style="<?php echo $sStyleReadLab_pcent_dc4_; ?>"><?php echo $this->form_encode_input($this->pcent_dc4_); ?></span><span id="id_read_off_pcent_dc4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_dc4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_dc4__obj" style="" id="id_sc_field_pcent_dc4_<?php echo $sc_seq_vert ?>" type=text name="pcent_dc4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dc4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['pcent_dc4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dc4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dc4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp1_p4_']) && $this->nmgp_cmp_hidden['dp1_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp1_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp1_p4__line" id="hidden_field_data_dp1_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp1_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp1_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp1_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp1_p4_"]) &&  $this->nmgp_cmp_readonly["dp1_p4_"] == "on") { 

 ?>
<input type="hidden" name="dp1_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_p4_) . "\">" . $dp1_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp1_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp1_p4_<?php echo $sc_seq_vert ?> css_dp1_p4__line" style="<?php echo $sStyleReadLab_dp1_p4_; ?>"><?php echo $this->form_encode_input($this->dp1_p4_); ?></span><span id="id_read_off_dp1_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp1_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp1_p4__obj" style="" id="id_sc_field_dp1_p4_<?php echo $sc_seq_vert ?>" type=text name="dp1_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dp1_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dp1_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp1_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp1_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp2_p4_']) && $this->nmgp_cmp_hidden['dp2_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp2_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp2_p4__line" id="hidden_field_data_dp2_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp2_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp2_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp2_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp2_p4_"]) &&  $this->nmgp_cmp_readonly["dp2_p4_"] == "on") { 

 ?>
<input type="hidden" name="dp2_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_p4_) . "\">" . $dp2_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp2_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp2_p4_<?php echo $sc_seq_vert ?> css_dp2_p4__line" style="<?php echo $sStyleReadLab_dp2_p4_; ?>"><?php echo $this->form_encode_input($this->dp2_p4_); ?></span><span id="id_read_off_dp2_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp2_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp2_p4__obj" style="" id="id_sc_field_dp2_p4_<?php echo $sc_seq_vert ?>" type=text name="dp2_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dp2_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dp2_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp2_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp2_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp3_p4_']) && $this->nmgp_cmp_hidden['dp3_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp3_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp3_p4__line" id="hidden_field_data_dp3_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp3_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp3_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp3_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp3_p4_"]) &&  $this->nmgp_cmp_readonly["dp3_p4_"] == "on") { 

 ?>
<input type="hidden" name="dp3_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_p4_) . "\">" . $dp3_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp3_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp3_p4_<?php echo $sc_seq_vert ?> css_dp3_p4__line" style="<?php echo $sStyleReadLab_dp3_p4_; ?>"><?php echo $this->form_encode_input($this->dp3_p4_); ?></span><span id="id_read_off_dp3_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp3_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp3_p4__obj" style="" id="id_sc_field_dp3_p4_<?php echo $sc_seq_vert ?>" type=text name="dp3_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dp3_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dp3_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp3_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp3_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp4_p4_']) && $this->nmgp_cmp_hidden['dp4_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp4_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp4_p4__line" id="hidden_field_data_dp4_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp4_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp4_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp4_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp4_p4_"]) &&  $this->nmgp_cmp_readonly["dp4_p4_"] == "on") { 

 ?>
<input type="hidden" name="dp4_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_p4_) . "\">" . $dp4_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp4_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp4_p4_<?php echo $sc_seq_vert ?> css_dp4_p4__line" style="<?php echo $sStyleReadLab_dp4_p4_; ?>"><?php echo $this->form_encode_input($this->dp4_p4_); ?></span><span id="id_read_off_dp4_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp4_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp4_p4__obj" style="" id="id_sc_field_dp4_p4_<?php echo $sc_seq_vert ?>" type=text name="dp4_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dp4_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dp4_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp4_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp4_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp5_p4_']) && $this->nmgp_cmp_hidden['dp5_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp5_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp5_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp5_p4__line" id="hidden_field_data_dp5_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp5_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp5_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp5_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp5_p4_"]) &&  $this->nmgp_cmp_readonly["dp5_p4_"] == "on") { 

 ?>
<input type="hidden" name="dp5_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp5_p4_) . "\">" . $dp5_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp5_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp5_p4_<?php echo $sc_seq_vert ?> css_dp5_p4__line" style="<?php echo $sStyleReadLab_dp5_p4_; ?>"><?php echo $this->form_encode_input($this->dp5_p4_); ?></span><span id="id_read_off_dp5_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp5_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp5_p4__obj" style="" id="id_sc_field_dp5_p4_<?php echo $sc_seq_vert ?>" type=text name="dp5_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp5_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dp5_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dp5_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp5_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp5_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dp4_']) && $this->nmgp_cmp_hidden['pcent_dp4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_dp4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_dp4__line" id="hidden_field_data_pcent_dp4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_dp4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_dp4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_dp4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_dp4_"]) &&  $this->nmgp_cmp_readonly["pcent_dp4_"] == "on") { 

 ?>
<input type="hidden" name="pcent_dp4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp4_) . "\">" . $pcent_dp4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_dp4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_dp4_<?php echo $sc_seq_vert ?> css_pcent_dp4__line" style="<?php echo $sStyleReadLab_pcent_dp4_; ?>"><?php echo $this->form_encode_input($this->pcent_dp4_); ?></span><span id="id_read_off_pcent_dp4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_dp4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_dp4__obj" style="" id="id_sc_field_pcent_dp4_<?php echo $sc_seq_vert ?>" type=text name="pcent_dp4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dp4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['pcent_dp4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dp4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dp4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds1_p4_']) && $this->nmgp_cmp_hidden['ds1_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds1_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds1_p4__line" id="hidden_field_data_ds1_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds1_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds1_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds1_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds1_p4_"]) &&  $this->nmgp_cmp_readonly["ds1_p4_"] == "on") { 

 ?>
<input type="hidden" name="ds1_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_p4_) . "\">" . $ds1_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds1_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds1_p4_<?php echo $sc_seq_vert ?> css_ds1_p4__line" style="<?php echo $sStyleReadLab_ds1_p4_; ?>"><?php echo $this->form_encode_input($this->ds1_p4_); ?></span><span id="id_read_off_ds1_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds1_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds1_p4__obj" style="" id="id_sc_field_ds1_p4_<?php echo $sc_seq_vert ?>" type=text name="ds1_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['ds1_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['ds1_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds1_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds1_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds2_p4_']) && $this->nmgp_cmp_hidden['ds2_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds2_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds2_p4__line" id="hidden_field_data_ds2_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds2_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds2_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds2_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds2_p4_"]) &&  $this->nmgp_cmp_readonly["ds2_p4_"] == "on") { 

 ?>
<input type="hidden" name="ds2_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_p4_) . "\">" . $ds2_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds2_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds2_p4_<?php echo $sc_seq_vert ?> css_ds2_p4__line" style="<?php echo $sStyleReadLab_ds2_p4_; ?>"><?php echo $this->form_encode_input($this->ds2_p4_); ?></span><span id="id_read_off_ds2_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds2_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds2_p4__obj" style="" id="id_sc_field_ds2_p4_<?php echo $sc_seq_vert ?>" type=text name="ds2_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['ds2_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['ds2_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds2_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds2_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds3_p4_']) && $this->nmgp_cmp_hidden['ds3_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds3_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds3_p4__line" id="hidden_field_data_ds3_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds3_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds3_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds3_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds3_p4_"]) &&  $this->nmgp_cmp_readonly["ds3_p4_"] == "on") { 

 ?>
<input type="hidden" name="ds3_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_p4_) . "\">" . $ds3_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds3_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds3_p4_<?php echo $sc_seq_vert ?> css_ds3_p4__line" style="<?php echo $sStyleReadLab_ds3_p4_; ?>"><?php echo $this->form_encode_input($this->ds3_p4_); ?></span><span id="id_read_off_ds3_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds3_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds3_p4__obj" style="" id="id_sc_field_ds3_p4_<?php echo $sc_seq_vert ?>" type=text name="ds3_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['ds3_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['ds3_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds3_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds3_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds4_p4_']) && $this->nmgp_cmp_hidden['ds4_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds4_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds4_p4__line" id="hidden_field_data_ds4_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds4_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds4_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds4_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds4_p4_"]) &&  $this->nmgp_cmp_readonly["ds4_p4_"] == "on") { 

 ?>
<input type="hidden" name="ds4_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_p4_) . "\">" . $ds4_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds4_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds4_p4_<?php echo $sc_seq_vert ?> css_ds4_p4__line" style="<?php echo $sStyleReadLab_ds4_p4_; ?>"><?php echo $this->form_encode_input($this->ds4_p4_); ?></span><span id="id_read_off_ds4_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds4_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds4_p4__obj" style="" id="id_sc_field_ds4_p4_<?php echo $sc_seq_vert ?>" type=text name="ds4_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['ds4_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['ds4_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds4_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds4_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds5_p4_']) && $this->nmgp_cmp_hidden['ds5_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds5_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds5_p4__line" id="hidden_field_data_ds5_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds5_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds5_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds5_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds5_p4_"]) &&  $this->nmgp_cmp_readonly["ds5_p4_"] == "on") { 

 ?>
<input type="hidden" name="ds5_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_p4_) . "\">" . $ds5_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds5_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds5_p4_<?php echo $sc_seq_vert ?> css_ds5_p4__line" style="<?php echo $sStyleReadLab_ds5_p4_; ?>"><?php echo $this->form_encode_input($this->ds5_p4_); ?></span><span id="id_read_off_ds5_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds5_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds5_p4__obj" style="" id="id_sc_field_ds5_p4_<?php echo $sc_seq_vert ?>" type=text name="ds5_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_p4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['ds5_p4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['ds5_p4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds5_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds5_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_ds4_']) && $this->nmgp_cmp_hidden['pcent_ds4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_ds4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_ds4__line" id="hidden_field_data_pcent_ds4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_ds4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_ds4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_ds4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_ds4_"]) &&  $this->nmgp_cmp_readonly["pcent_ds4_"] == "on") { 

 ?>
<input type="hidden" name="pcent_ds4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds4_) . "\">" . $pcent_ds4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_ds4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_ds4_<?php echo $sc_seq_vert ?> css_pcent_ds4__line" style="<?php echo $sStyleReadLab_pcent_ds4_; ?>"><?php echo $this->form_encode_input($this->pcent_ds4_); ?></span><span id="id_read_off_pcent_ds4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_ds4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_ds4__obj" style="" id="id_sc_field_pcent_ds4_<?php echo $sc_seq_vert ?>" type=text name="pcent_ds4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds4_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_ds4_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['pcent_ds4_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_ds4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_ds4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['val_acumulada_']) && $this->nmgp_cmp_hidden['val_acumulada_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="val_acumulada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_acumulada_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_val_acumulada__line" id="hidden_field_data_val_acumulada_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_val_acumulada_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_val_acumulada__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_val_acumulada_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["val_acumulada_"]) &&  $this->nmgp_cmp_readonly["val_acumulada_"] == "on") { 

 ?>
<input type="hidden" name="val_acumulada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_acumulada_) . "\">" . $val_acumulada_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_val_acumulada_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-val_acumulada_<?php echo $sc_seq_vert ?> css_val_acumulada__line" style="<?php echo $sStyleReadLab_val_acumulada_; ?>"><?php echo $this->form_encode_input($this->val_acumulada_); ?></span><span id="id_read_off_val_acumulada_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_val_acumulada_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_val_acumulada__obj" style="" id="id_sc_field_val_acumulada_<?php echo $sc_seq_vert ?>" type=text name="val_acumulada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_acumulada_) ?>"
 size=10 alt="{datatype: 'decimal', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['val_acumulada_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['val_acumulada_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['val_acumulada_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_val_acumulada_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_val_acumulada_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['val_requerida_']) && $this->nmgp_cmp_hidden['val_requerida_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="val_requerida_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_requerida_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_val_requerida__line" id="hidden_field_data_val_requerida_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_val_requerida_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_val_requerida__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_val_requerida_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["val_requerida_"]) &&  $this->nmgp_cmp_readonly["val_requerida_"] == "on") { 

 ?>
<input type="hidden" name="val_requerida_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_requerida_) . "\">" . $val_requerida_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_val_requerida_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-val_requerida_<?php echo $sc_seq_vert ?> css_val_requerida__line" style="<?php echo $sStyleReadLab_val_requerida_; ?>"><?php echo $this->form_encode_input($this->val_requerida_); ?></span><span id="id_read_off_val_requerida_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_val_requerida_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_val_requerida__obj" style="" id="id_sc_field_val_requerida_<?php echo $sc_seq_vert ?>" type=text name="val_requerida_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_requerida_) ?>"
 size=10 alt="{datatype: 'decimal', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['val_requerida_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['val_requerida_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['val_requerida_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_val_requerida_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_val_requerida_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_final_']) && $this->nmgp_cmp_hidden['eval_final_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="eval_final_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_final_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_eval_final__line" id="hidden_field_data_eval_final_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_eval_final_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_eval_final__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_eval_final_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["eval_final_"]) &&  $this->nmgp_cmp_readonly["eval_final_"] == "on") { 

 ?>
<input type="hidden" name="eval_final_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_final_) . "\">" . $eval_final_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_eval_final_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-eval_final_<?php echo $sc_seq_vert ?> css_eval_final__line" style="<?php echo $sStyleReadLab_eval_final_; ?>"><?php echo $this->form_encode_input($this->eval_final_); ?></span><span id="id_read_off_eval_final_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_eval_final_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_eval_final__obj" style="" id="id_sc_field_eval_final_<?php echo $sc_seq_vert ?>" type=text name="eval_final_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_final_) ?>"
 size=5 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['eval_final_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['eval_final_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_eval_final_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_eval_final_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_estudiante_))
       {
           $this->nmgp_cmp_readonly['id_estudiante_'] = $sCheckRead_id_estudiante_;
       }
       if ('display: none;' == $sStyleHidden_id_estudiante_)
       {
           $this->nmgp_cmp_hidden['id_estudiante_'] = 'off';
       }
       if (isset($sCheckRead_estatus_))
       {
           $this->nmgp_cmp_readonly['estatus_'] = $sCheckRead_estatus_;
       }
       if ('display: none;' == $sStyleHidden_estatus_)
       {
           $this->nmgp_cmp_hidden['estatus_'] = 'off';
       }
       if (isset($sCheckRead_novedad_))
       {
           $this->nmgp_cmp_readonly['novedad_'] = $sCheckRead_novedad_;
       }
       if ('display: none;' == $sStyleHidden_novedad_)
       {
           $this->nmgp_cmp_hidden['novedad_'] = 'off';
       }
       if (isset($sCheckRead_eval_4_per_))
       {
           $this->nmgp_cmp_readonly['eval_4_per_'] = $sCheckRead_eval_4_per_;
       }
       if ('display: none;' == $sStyleHidden_eval_4_per_)
       {
           $this->nmgp_cmp_hidden['eval_4_per_'] = 'off';
       }
       if (isset($sCheckRead_dc1_p4_))
       {
           $this->nmgp_cmp_readonly['dc1_p4_'] = $sCheckRead_dc1_p4_;
       }
       if ('display: none;' == $sStyleHidden_dc1_p4_)
       {
           $this->nmgp_cmp_hidden['dc1_p4_'] = 'off';
       }
       if (isset($sCheckRead_dc2_p4_))
       {
           $this->nmgp_cmp_readonly['dc2_p4_'] = $sCheckRead_dc2_p4_;
       }
       if ('display: none;' == $sStyleHidden_dc2_p4_)
       {
           $this->nmgp_cmp_hidden['dc2_p4_'] = 'off';
       }
       if (isset($sCheckRead_dc3_p4_))
       {
           $this->nmgp_cmp_readonly['dc3_p4_'] = $sCheckRead_dc3_p4_;
       }
       if ('display: none;' == $sStyleHidden_dc3_p4_)
       {
           $this->nmgp_cmp_hidden['dc3_p4_'] = 'off';
       }
       if (isset($sCheckRead_dc4_p4_))
       {
           $this->nmgp_cmp_readonly['dc4_p4_'] = $sCheckRead_dc4_p4_;
       }
       if ('display: none;' == $sStyleHidden_dc4_p4_)
       {
           $this->nmgp_cmp_hidden['dc4_p4_'] = 'off';
       }
       if (isset($sCheckRead_dc5_p4_))
       {
           $this->nmgp_cmp_readonly['dc5_p4_'] = $sCheckRead_dc5_p4_;
       }
       if ('display: none;' == $sStyleHidden_dc5_p4_)
       {
           $this->nmgp_cmp_hidden['dc5_p4_'] = 'off';
       }
       if (isset($sCheckRead_pcent_dc4_))
       {
           $this->nmgp_cmp_readonly['pcent_dc4_'] = $sCheckRead_pcent_dc4_;
       }
       if ('display: none;' == $sStyleHidden_pcent_dc4_)
       {
           $this->nmgp_cmp_hidden['pcent_dc4_'] = 'off';
       }
       if (isset($sCheckRead_dp1_p4_))
       {
           $this->nmgp_cmp_readonly['dp1_p4_'] = $sCheckRead_dp1_p4_;
       }
       if ('display: none;' == $sStyleHidden_dp1_p4_)
       {
           $this->nmgp_cmp_hidden['dp1_p4_'] = 'off';
       }
       if (isset($sCheckRead_dp2_p4_))
       {
           $this->nmgp_cmp_readonly['dp2_p4_'] = $sCheckRead_dp2_p4_;
       }
       if ('display: none;' == $sStyleHidden_dp2_p4_)
       {
           $this->nmgp_cmp_hidden['dp2_p4_'] = 'off';
       }
       if (isset($sCheckRead_dp3_p4_))
       {
           $this->nmgp_cmp_readonly['dp3_p4_'] = $sCheckRead_dp3_p4_;
       }
       if ('display: none;' == $sStyleHidden_dp3_p4_)
       {
           $this->nmgp_cmp_hidden['dp3_p4_'] = 'off';
       }
       if (isset($sCheckRead_dp4_p4_))
       {
           $this->nmgp_cmp_readonly['dp4_p4_'] = $sCheckRead_dp4_p4_;
       }
       if ('display: none;' == $sStyleHidden_dp4_p4_)
       {
           $this->nmgp_cmp_hidden['dp4_p4_'] = 'off';
       }
       if (isset($sCheckRead_dp5_p4_))
       {
           $this->nmgp_cmp_readonly['dp5_p4_'] = $sCheckRead_dp5_p4_;
       }
       if ('display: none;' == $sStyleHidden_dp5_p4_)
       {
           $this->nmgp_cmp_hidden['dp5_p4_'] = 'off';
       }
       if (isset($sCheckRead_pcent_dp4_))
       {
           $this->nmgp_cmp_readonly['pcent_dp4_'] = $sCheckRead_pcent_dp4_;
       }
       if ('display: none;' == $sStyleHidden_pcent_dp4_)
       {
           $this->nmgp_cmp_hidden['pcent_dp4_'] = 'off';
       }
       if (isset($sCheckRead_ds1_p4_))
       {
           $this->nmgp_cmp_readonly['ds1_p4_'] = $sCheckRead_ds1_p4_;
       }
       if ('display: none;' == $sStyleHidden_ds1_p4_)
       {
           $this->nmgp_cmp_hidden['ds1_p4_'] = 'off';
       }
       if (isset($sCheckRead_ds2_p4_))
       {
           $this->nmgp_cmp_readonly['ds2_p4_'] = $sCheckRead_ds2_p4_;
       }
       if ('display: none;' == $sStyleHidden_ds2_p4_)
       {
           $this->nmgp_cmp_hidden['ds2_p4_'] = 'off';
       }
       if (isset($sCheckRead_ds3_p4_))
       {
           $this->nmgp_cmp_readonly['ds3_p4_'] = $sCheckRead_ds3_p4_;
       }
       if ('display: none;' == $sStyleHidden_ds3_p4_)
       {
           $this->nmgp_cmp_hidden['ds3_p4_'] = 'off';
       }
       if (isset($sCheckRead_ds4_p4_))
       {
           $this->nmgp_cmp_readonly['ds4_p4_'] = $sCheckRead_ds4_p4_;
       }
       if ('display: none;' == $sStyleHidden_ds4_p4_)
       {
           $this->nmgp_cmp_hidden['ds4_p4_'] = 'off';
       }
       if (isset($sCheckRead_ds5_p4_))
       {
           $this->nmgp_cmp_readonly['ds5_p4_'] = $sCheckRead_ds5_p4_;
       }
       if ('display: none;' == $sStyleHidden_ds5_p4_)
       {
           $this->nmgp_cmp_hidden['ds5_p4_'] = 'off';
       }
       if (isset($sCheckRead_pcent_ds4_))
       {
           $this->nmgp_cmp_readonly['pcent_ds4_'] = $sCheckRead_pcent_ds4_;
       }
       if ('display: none;' == $sStyleHidden_pcent_ds4_)
       {
           $this->nmgp_cmp_hidden['pcent_ds4_'] = 'off';
       }
       if (isset($sCheckRead_val_acumulada_))
       {
           $this->nmgp_cmp_readonly['val_acumulada_'] = $sCheckRead_val_acumulada_;
       }
       if ('display: none;' == $sStyleHidden_val_acumulada_)
       {
           $this->nmgp_cmp_hidden['val_acumulada_'] = 'off';
       }
       if (isset($sCheckRead_val_requerida_))
       {
           $this->nmgp_cmp_readonly['val_requerida_'] = $sCheckRead_val_requerida_;
       }
       if ('display: none;' == $sStyleHidden_val_requerida_)
       {
           $this->nmgp_cmp_hidden['val_requerida_'] = 'off';
       }
       if (isset($sCheckRead_eval_final_))
       {
           $this->nmgp_cmp_readonly['eval_final_'] = $sCheckRead_eval_final_;
       }
       if ('display: none;' == $sStyleHidden_eval_final_)
       {
           $this->nmgp_cmp_hidden['eval_final_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_t_evaluacion_p4 = $guarda_form_vert_form_t_evaluacion_p4;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div> 
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['pdf_view'])
{
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['masterValue']);
?>
}
<?php
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
<?php
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['pdf_view']) {
?>
 $(document).ready(function() {
});
<?php
}
?>
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_t_evaluacion_p4");
 parent.scAjaxDetailHeight("form_t_evaluacion_p4", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_t_evaluacion_p4", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_t_evaluacion_p4", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p4']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
