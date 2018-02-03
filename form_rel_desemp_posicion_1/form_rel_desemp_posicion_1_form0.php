<?php
class form_rel_desemp_posicion_1_form extends form_rel_desemp_posicion_1_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Posición de Indicadores de desempeño"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " -  Posición de Indicadores de desempeño"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_rel_desemp_posicion_1/form_rel_desemp_posicion_1_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_rel_desemp_posicion_1_sajax_js.php");
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
<?php

include_once('form_rel_desemp_posicion_1_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['recarga'];
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
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
 include_once("form_rel_desemp_posicion_1_js0.php");
?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
$_SESSION['scriptcase']['error_span_title']['form_rel_desemp_posicion_1'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_rel_desemp_posicion_1'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="600">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Posición de Indicadores de desempeño"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " -  Posición de Indicadores de desempeño"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo date($this->dateDefaultFormat()); ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "do_ajax_form_rel_desemp_posicion_1_add_new_line(); return false;", "do_ajax_form_rel_desemp_posicion_1_add_new_line(); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['id_grado_']))
   {
       $this->nmgp_cmp_hidden['id_grado_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_grupo_']))
   {
       $this->nmgp_cmp_hidden['id_grupo_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_asign_']))
   {
       $this->nmgp_cmp_hidden['id_asign_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['periodo_']))
   {
       $this->nmgp_cmp_hidden['periodo_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['entorno_']))
   {
       $this->nmgp_cmp_hidden['entorno_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>
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


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_grado_']) && $this->nmgp_cmp_hidden['id_grado_'] == 'off') { $sStyleHidden_id_grado_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_grado_']) || $this->nmgp_cmp_hidden['id_grado_'] == 'on') {
      if (!isset($this->nm_new_label['id_grado_'])) {
          $this->nm_new_label['id_grado_'] = "Grado"; } ?>

    <TD class="scFormLabelOddMult css_id_grado__label" id="hidden_field_label_id_grado_" style="<?php echo $sStyleHidden_id_grado_; ?>" > <?php echo $this->nm_new_label['id_grado_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_grupo_']) && $this->nmgp_cmp_hidden['id_grupo_'] == 'off') { $sStyleHidden_id_grupo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_grupo_']) || $this->nmgp_cmp_hidden['id_grupo_'] == 'on') {
      if (!isset($this->nm_new_label['id_grupo_'])) {
          $this->nm_new_label['id_grupo_'] = "Id Grupo"; } ?>

    <TD class="scFormLabelOddMult css_id_grupo__label" id="hidden_field_label_id_grupo_" style="<?php echo $sStyleHidden_id_grupo_; ?>" > <?php echo $this->nm_new_label['id_grupo_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_asign_']) && $this->nmgp_cmp_hidden['id_asign_'] == 'off') { $sStyleHidden_id_asign_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_asign_']) || $this->nmgp_cmp_hidden['id_asign_'] == 'on') {
      if (!isset($this->nm_new_label['id_asign_'])) {
          $this->nm_new_label['id_asign_'] = "Id Asign"; } ?>

    <TD class="scFormLabelOddMult css_id_asign__label" id="hidden_field_label_id_asign_" style="<?php echo $sStyleHidden_id_asign_; ?>" > <?php echo $this->nm_new_label['id_asign_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['periodo_']) && $this->nmgp_cmp_hidden['periodo_'] == 'off') { $sStyleHidden_periodo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['periodo_']) || $this->nmgp_cmp_hidden['periodo_'] == 'on') {
      if (!isset($this->nm_new_label['periodo_'])) {
          $this->nm_new_label['periodo_'] = "Periodo"; } ?>

    <TD class="scFormLabelOddMult css_periodo__label" id="hidden_field_label_periodo_" style="<?php echo $sStyleHidden_periodo_; ?>" > <?php echo $this->nm_new_label['periodo_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['posicion_']) && $this->nmgp_cmp_hidden['posicion_'] == 'off') { $sStyleHidden_posicion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['posicion_']) || $this->nmgp_cmp_hidden['posicion_'] == 'on') {
      if (!isset($this->nm_new_label['posicion_'])) {
          $this->nm_new_label['posicion_'] = "Posicion"; } ?>

    <TD class="scFormLabelOddMult css_posicion__label" id="hidden_field_label_posicion_" style="<?php echo $sStyleHidden_posicion_; ?>" > <?php echo $this->nm_new_label['posicion_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cod_desemp_']) && $this->nmgp_cmp_hidden['cod_desemp_'] == 'off') { $sStyleHidden_cod_desemp_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cod_desemp_']) || $this->nmgp_cmp_hidden['cod_desemp_'] == 'on') {
      if (!isset($this->nm_new_label['cod_desemp_'])) {
          $this->nm_new_label['cod_desemp_'] = "Cod Desemp"; } ?>

    <TD class="scFormLabelOddMult css_cod_desemp__label" id="hidden_field_label_cod_desemp_" style="<?php echo $sStyleHidden_cod_desemp_; ?>" > <?php echo $this->nm_new_label['cod_desemp_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['entorno_']) && $this->nmgp_cmp_hidden['entorno_'] == 'off') { $sStyleHidden_entorno_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['entorno_']) || $this->nmgp_cmp_hidden['entorno_'] == 'on') {
      if (!isset($this->nm_new_label['entorno_'])) {
          $this->nm_new_label['entorno_'] = "Entorno"; } ?>

    <TD class="scFormLabelOddMult css_entorno__label" id="hidden_field_label_entorno_" style="<?php echo $sStyleHidden_entorno_; ?>" > <?php echo $this->nm_new_label['entorno_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_rel_desemp_posicion_1);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_rel_desemp_posicion_1 = $this->form_vert_form_rel_desemp_posicion_1;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_rel_desemp_posicion_1))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_grado_']))
           {
               $this->nmgp_cmp_readonly['id_grado_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_grupo_']))
           {
               $this->nmgp_cmp_readonly['id_grupo_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_asign_']))
           {
               $this->nmgp_cmp_readonly['id_asign_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['periodo_']))
           {
               $this->nmgp_cmp_readonly['periodo_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['posicion_']))
           {
               $this->nmgp_cmp_readonly['posicion_'] = 'on';
           }
   foreach ($this->form_vert_form_rel_desemp_posicion_1 as $sc_seq_vert => $sc_lixo)
   {
       $this->id_area_ = $this->form_vert_form_rel_desemp_posicion_1[$sc_seq_vert]['id_area_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_grado_'] = true;
           $this->nmgp_cmp_readonly['id_grupo_'] = true;
           $this->nmgp_cmp_readonly['id_asign_'] = true;
           $this->nmgp_cmp_readonly['periodo_'] = true;
           $this->nmgp_cmp_readonly['posicion_'] = true;
           $this->nmgp_cmp_readonly['cod_desemp_'] = true;
           $this->nmgp_cmp_readonly['entorno_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_grado_']) || $this->nmgp_cmp_readonly['id_grado_'] != "on") {$this->nmgp_cmp_readonly['id_grado_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_grupo_']) || $this->nmgp_cmp_readonly['id_grupo_'] != "on") {$this->nmgp_cmp_readonly['id_grupo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_asign_']) || $this->nmgp_cmp_readonly['id_asign_'] != "on") {$this->nmgp_cmp_readonly['id_asign_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['periodo_']) || $this->nmgp_cmp_readonly['periodo_'] != "on") {$this->nmgp_cmp_readonly['periodo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['posicion_']) || $this->nmgp_cmp_readonly['posicion_'] != "on") {$this->nmgp_cmp_readonly['posicion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cod_desemp_']) || $this->nmgp_cmp_readonly['cod_desemp_'] != "on") {$this->nmgp_cmp_readonly['cod_desemp_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['entorno_']) || $this->nmgp_cmp_readonly['entorno_'] != "on") {$this->nmgp_cmp_readonly['entorno_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_grado_ = $this->form_vert_form_rel_desemp_posicion_1[$sc_seq_vert]['id_grado_']; 
       $id_grado_ = $this->id_grado_; 
       if (!isset($this->nmgp_cmp_hidden['id_grado_']))
       {
           $this->nmgp_cmp_hidden['id_grado_'] = 'off';
       }
       $sStyleHidden_id_grado_ = '';
       if (isset($sCheckRead_id_grado_))
       {
           unset($sCheckRead_id_grado_);
       }
       if (isset($this->nmgp_cmp_readonly['id_grado_']))
       {
           $sCheckRead_id_grado_ = $this->nmgp_cmp_readonly['id_grado_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_grado_']) && $this->nmgp_cmp_hidden['id_grado_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_grado_']);
           $sStyleHidden_id_grado_ = 'display: none;';
       }
       $bTestReadOnly_id_grado_ = true;
       $sStyleReadLab_id_grado_ = 'display: none;';
       $sStyleReadInp_id_grado_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_grado_"]) &&  $this->nmgp_cmp_readonly["id_grado_"] == "on"))
       {
           $bTestReadOnly_id_grado_ = false;
           unset($this->nmgp_cmp_readonly['id_grado_']);
           $sStyleReadLab_id_grado_ = '';
           $sStyleReadInp_id_grado_ = 'display: none;';
       }
       $this->id_grupo_ = $this->form_vert_form_rel_desemp_posicion_1[$sc_seq_vert]['id_grupo_']; 
       $id_grupo_ = $this->id_grupo_; 
       if (!isset($this->nmgp_cmp_hidden['id_grupo_']))
       {
           $this->nmgp_cmp_hidden['id_grupo_'] = 'off';
       }
       $sStyleHidden_id_grupo_ = '';
       if (isset($sCheckRead_id_grupo_))
       {
           unset($sCheckRead_id_grupo_);
       }
       if (isset($this->nmgp_cmp_readonly['id_grupo_']))
       {
           $sCheckRead_id_grupo_ = $this->nmgp_cmp_readonly['id_grupo_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_grupo_']) && $this->nmgp_cmp_hidden['id_grupo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_grupo_']);
           $sStyleHidden_id_grupo_ = 'display: none;';
       }
       $bTestReadOnly_id_grupo_ = true;
       $sStyleReadLab_id_grupo_ = 'display: none;';
       $sStyleReadInp_id_grupo_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_grupo_"]) &&  $this->nmgp_cmp_readonly["id_grupo_"] == "on"))
       {
           $bTestReadOnly_id_grupo_ = false;
           unset($this->nmgp_cmp_readonly['id_grupo_']);
           $sStyleReadLab_id_grupo_ = '';
           $sStyleReadInp_id_grupo_ = 'display: none;';
       }
       $this->id_asign_ = $this->form_vert_form_rel_desemp_posicion_1[$sc_seq_vert]['id_asign_']; 
       $id_asign_ = $this->id_asign_; 
       if (!isset($this->nmgp_cmp_hidden['id_asign_']))
       {
           $this->nmgp_cmp_hidden['id_asign_'] = 'off';
       }
       $sStyleHidden_id_asign_ = '';
       if (isset($sCheckRead_id_asign_))
       {
           unset($sCheckRead_id_asign_);
       }
       if (isset($this->nmgp_cmp_readonly['id_asign_']))
       {
           $sCheckRead_id_asign_ = $this->nmgp_cmp_readonly['id_asign_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_asign_']) && $this->nmgp_cmp_hidden['id_asign_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_asign_']);
           $sStyleHidden_id_asign_ = 'display: none;';
       }
       $bTestReadOnly_id_asign_ = true;
       $sStyleReadLab_id_asign_ = 'display: none;';
       $sStyleReadInp_id_asign_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_asign_"]) &&  $this->nmgp_cmp_readonly["id_asign_"] == "on"))
       {
           $bTestReadOnly_id_asign_ = false;
           unset($this->nmgp_cmp_readonly['id_asign_']);
           $sStyleReadLab_id_asign_ = '';
           $sStyleReadInp_id_asign_ = 'display: none;';
       }
       $this->periodo_ = $this->form_vert_form_rel_desemp_posicion_1[$sc_seq_vert]['periodo_']; 
       $periodo_ = $this->periodo_; 
       if (!isset($this->nmgp_cmp_hidden['periodo_']))
       {
           $this->nmgp_cmp_hidden['periodo_'] = 'off';
       }
       $sStyleHidden_periodo_ = '';
       if (isset($sCheckRead_periodo_))
       {
           unset($sCheckRead_periodo_);
       }
       if (isset($this->nmgp_cmp_readonly['periodo_']))
       {
           $sCheckRead_periodo_ = $this->nmgp_cmp_readonly['periodo_'];
       }
       if (isset($this->nmgp_cmp_hidden['periodo_']) && $this->nmgp_cmp_hidden['periodo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['periodo_']);
           $sStyleHidden_periodo_ = 'display: none;';
       }
       $bTestReadOnly_periodo_ = true;
       $sStyleReadLab_periodo_ = 'display: none;';
       $sStyleReadInp_periodo_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["periodo_"]) &&  $this->nmgp_cmp_readonly["periodo_"] == "on"))
       {
           $bTestReadOnly_periodo_ = false;
           unset($this->nmgp_cmp_readonly['periodo_']);
           $sStyleReadLab_periodo_ = '';
           $sStyleReadInp_periodo_ = 'display: none;';
       }
       $this->posicion_ = $this->form_vert_form_rel_desemp_posicion_1[$sc_seq_vert]['posicion_']; 
       $posicion_ = $this->posicion_; 
       $sStyleHidden_posicion_ = '';
       if (isset($sCheckRead_posicion_))
       {
           unset($sCheckRead_posicion_);
       }
       if (isset($this->nmgp_cmp_readonly['posicion_']))
       {
           $sCheckRead_posicion_ = $this->nmgp_cmp_readonly['posicion_'];
       }
       if (isset($this->nmgp_cmp_hidden['posicion_']) && $this->nmgp_cmp_hidden['posicion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['posicion_']);
           $sStyleHidden_posicion_ = 'display: none;';
       }
       $bTestReadOnly_posicion_ = true;
       $sStyleReadLab_posicion_ = 'display: none;';
       $sStyleReadInp_posicion_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["posicion_"]) &&  $this->nmgp_cmp_readonly["posicion_"] == "on"))
       {
           $bTestReadOnly_posicion_ = false;
           unset($this->nmgp_cmp_readonly['posicion_']);
           $sStyleReadLab_posicion_ = '';
           $sStyleReadInp_posicion_ = 'display: none;';
       }
       $this->cod_desemp_ = $this->form_vert_form_rel_desemp_posicion_1[$sc_seq_vert]['cod_desemp_']; 
       $cod_desemp_ = $this->cod_desemp_; 
       $sStyleHidden_cod_desemp_ = '';
       if (isset($sCheckRead_cod_desemp_))
       {
           unset($sCheckRead_cod_desemp_);
       }
       if (isset($this->nmgp_cmp_readonly['cod_desemp_']))
       {
           $sCheckRead_cod_desemp_ = $this->nmgp_cmp_readonly['cod_desemp_'];
       }
       if (isset($this->nmgp_cmp_hidden['cod_desemp_']) && $this->nmgp_cmp_hidden['cod_desemp_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cod_desemp_']);
           $sStyleHidden_cod_desemp_ = 'display: none;';
       }
       $bTestReadOnly_cod_desemp_ = true;
       $sStyleReadLab_cod_desemp_ = 'display: none;';
       $sStyleReadInp_cod_desemp_ = '';
       if (isset($this->nmgp_cmp_readonly['cod_desemp_']) && $this->nmgp_cmp_readonly['cod_desemp_'] == 'on')
       {
           $bTestReadOnly_cod_desemp_ = false;
           unset($this->nmgp_cmp_readonly['cod_desemp_']);
           $sStyleReadLab_cod_desemp_ = '';
           $sStyleReadInp_cod_desemp_ = 'display: none;';
       }
       $this->entorno_ = $this->form_vert_form_rel_desemp_posicion_1[$sc_seq_vert]['entorno_']; 
       $entorno_ = $this->entorno_; 
       if (!isset($this->nmgp_cmp_hidden['entorno_']))
       {
           $this->nmgp_cmp_hidden['entorno_'] = 'off';
       }
       $sStyleHidden_entorno_ = '';
       if (isset($sCheckRead_entorno_))
       {
           unset($sCheckRead_entorno_);
       }
       if (isset($this->nmgp_cmp_readonly['entorno_']))
       {
           $sCheckRead_entorno_ = $this->nmgp_cmp_readonly['entorno_'];
       }
       if (isset($this->nmgp_cmp_hidden['entorno_']) && $this->nmgp_cmp_hidden['entorno_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['entorno_']);
           $sStyleHidden_entorno_ = 'display: none;';
       }
       $bTestReadOnly_entorno_ = true;
       $sStyleReadLab_entorno_ = 'display: none;';
       $sStyleReadInp_entorno_ = '';
       if (isset($this->nmgp_cmp_readonly['entorno_']) && $this->nmgp_cmp_readonly['entorno_'] == 'on')
       {
           $bTestReadOnly_entorno_ = false;
           unset($this->nmgp_cmp_readonly['entorno_']);
           $sStyleReadLab_entorno_ = '';
           $sStyleReadInp_entorno_ = 'display: none;';
       }

       $this->lookup_cod_desemp_($look_rpc_cod_desemp_);
       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl)) { echo " checked";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_rel_desemp_posicion_1_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_rel_desemp_posicion_1_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_rel_desemp_posicion_1_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_rel_desemp_posicion_1_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_rel_desemp_posicion_1_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_rel_desemp_posicion_1_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_grado_']) && $this->nmgp_cmp_hidden['id_grado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_grado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_grado__line" id="hidden_field_data_id_grado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_grado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_grado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_grado_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id_grado_"]) &&  $this->nmgp_cmp_readonly["id_grado_"] == "on")) { 

 ?>
<input type="hidden" name="id_grado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grado_) . "\"><span id=\"id_ajax_label_id_grado_" . $sc_seq_vert . "\">" . $id_grado_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_id_grado_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_grado_<?php echo $sc_seq_vert ?> css_id_grado__line" style="<?php echo $sStyleReadLab_id_grado_; ?>"><?php echo $this->form_encode_input($this->id_grado_); ?></span><span id="id_read_off_id_grado_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_grado_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_grado__obj" style="" id="id_sc_field_id_grado_<?php echo $sc_seq_vert ?>" type=text name="id_grado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grado_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_grado_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_grado_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_grado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_grado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_grupo_']) && $this->nmgp_cmp_hidden['id_grupo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_grupo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grupo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_grupo__line" id="hidden_field_data_id_grupo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_grupo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_grupo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_grupo_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id_grupo_"]) &&  $this->nmgp_cmp_readonly["id_grupo_"] == "on")) { 

 ?>
<input type="hidden" name="id_grupo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grupo_) . "\"><span id=\"id_ajax_label_id_grupo_" . $sc_seq_vert . "\">" . $id_grupo_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_id_grupo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_grupo_<?php echo $sc_seq_vert ?> css_id_grupo__line" style="<?php echo $sStyleReadLab_id_grupo_; ?>"><?php echo $this->form_encode_input($this->id_grupo_); ?></span><span id="id_read_off_id_grupo_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_grupo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_grupo__obj" style="" id="id_sc_field_id_grupo_<?php echo $sc_seq_vert ?>" type=text name="id_grupo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grupo_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_grupo_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_grupo_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_grupo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_grupo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_asign_']) && $this->nmgp_cmp_hidden['id_asign_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_asign_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_asign_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_asign__line" id="hidden_field_data_id_asign_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_asign_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_asign__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_asign_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id_asign_"]) &&  $this->nmgp_cmp_readonly["id_asign_"] == "on")) { 

 ?>
<input type="hidden" name="id_asign_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_asign_) . "\"><span id=\"id_ajax_label_id_asign_" . $sc_seq_vert . "\">" . $id_asign_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_id_asign_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_asign_<?php echo $sc_seq_vert ?> css_id_asign__line" style="<?php echo $sStyleReadLab_id_asign_; ?>"><?php echo $this->form_encode_input($this->id_asign_); ?></span><span id="id_read_off_id_asign_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_asign_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_asign__obj" style="" id="id_sc_field_id_asign_<?php echo $sc_seq_vert ?>" type=text name="id_asign_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_asign_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_asign_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_asign_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_asign_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_asign_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['periodo_']) && $this->nmgp_cmp_hidden['periodo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="periodo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($periodo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_periodo__line" id="hidden_field_data_periodo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_periodo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_periodo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_periodo_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["periodo_"]) &&  $this->nmgp_cmp_readonly["periodo_"] == "on")) { 

 ?>
<input type="hidden" name="periodo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($periodo_) . "\"><span id=\"id_ajax_label_periodo_" . $sc_seq_vert . "\">" . $periodo_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_periodo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-periodo_<?php echo $sc_seq_vert ?> css_periodo__line" style="<?php echo $sStyleReadLab_periodo_; ?>"><?php echo $this->form_encode_input($this->periodo_); ?></span><span id="id_read_off_periodo_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_periodo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_periodo__obj" style="" id="id_sc_field_periodo_<?php echo $sc_seq_vert ?>" type=text name="periodo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($periodo_) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_periodo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_periodo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['posicion_']) && $this->nmgp_cmp_hidden['posicion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="posicion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($posicion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_posicion__line" id="hidden_field_data_posicion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_posicion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_posicion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_posicion_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["posicion_"]) &&  $this->nmgp_cmp_readonly["posicion_"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_'] = array(); 
    }

   $old_value_id_grado_ = $this->id_grado_;
   $old_value_id_grupo_ = $this->id_grupo_;
   $old_value_id_asign_ = $this->id_asign_;
   $old_value_cod_desemp_ = $this->cod_desemp_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado_ = $this->id_grado_;
   $unformatted_value_id_grupo_ = $this->id_grupo_;
   $unformatted_value_id_asign_ = $this->id_asign_;
   $unformatted_value_cod_desemp_ = $this->cod_desemp_;

   $nm_comando = "SELECT posicion, nomp 
FROM posiciones 
WHERE periodo = 1 AND nomp <> ''
ORDER BY orden";

   $this->id_grado_ = $old_value_id_grado_;
   $this->id_grupo_ = $old_value_id_grupo_;
   $this->id_asign_ = $old_value_id_asign_;
   $this->cod_desemp_ = $old_value_cod_desemp_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_'][] = $rs->fields[0];
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
   $posicion__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->posicion__1))
          {
              foreach ($this->posicion__1 as $tmp_posicion_)
              {
                  if (trim($tmp_posicion_) === trim($cadaselect[1])) { $posicion__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->posicion_) === trim($cadaselect[1])) { $posicion__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="posicion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($posicion_) . "\"><span id=\"id_ajax_label_posicion_" . $sc_seq_vert . "\">" . $posicion__look . "</span>"; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_'] = array(); 
    }

   $old_value_id_grado_ = $this->id_grado_;
   $old_value_id_grupo_ = $this->id_grupo_;
   $old_value_id_asign_ = $this->id_asign_;
   $old_value_cod_desemp_ = $this->cod_desemp_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado_ = $this->id_grado_;
   $unformatted_value_id_grupo_ = $this->id_grupo_;
   $unformatted_value_id_asign_ = $this->id_asign_;
   $unformatted_value_cod_desemp_ = $this->cod_desemp_;

   $nm_comando = "SELECT posicion, nomp 
FROM posiciones 
WHERE periodo = 1 AND nomp <> ''
ORDER BY orden";

   $this->id_grado_ = $old_value_id_grado_;
   $this->id_grupo_ = $old_value_id_grupo_;
   $this->id_asign_ = $old_value_id_asign_;
   $this->cod_desemp_ = $old_value_cod_desemp_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lookup_posicion_'][] = $rs->fields[0];
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
   $x = 0; 
   $posicion__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->posicion__1))
          {
              foreach ($this->posicion__1 as $tmp_posicion_)
              {
                  if (trim($tmp_posicion_) === trim($cadaselect[1])) { $posicion__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->posicion_) === trim($cadaselect[1])) { $posicion__look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_posicion_" . $sc_seq_vert . "\" class=\"css_posicion__line\" style=\"" .  $sStyleReadLab_posicion_ . "\">" . $this->form_encode_input($posicion__look) . "</span><span id=\"id_read_off_posicion_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_posicion_ . "\">";
   $sCheckInsert = "";
   if ('novo' == $this->nmgp_opcao)
   {
      $sCheckInsert = "nm_check_insert(" . $sc_seq_vert . ");";
   }
   echo "<div id=\"idAjaxRadio_posicion_" . $sc_seq_vert . "\" style=\"display: inline-block\">\r\n";
   $y = 0 ; 
   echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n";
   echo " <tr>\r\n";
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaradio = explode("?#?", $todo[$x]) ; 
          if ($cadaradio[1] == "@ ") {$cadaradio[1]= trim($cadaradio[1]); } ; 
          if ($y == 4)
          {
              echo " </tr>\r\n";
              echo " <tr>\r\n";
              $y = 0;
          }
          echo "  <td class=\"scFormDataFontOddMult css_posicion__line\">\r\n";
          echo "    <input type=radio style=\"float:left; position:relative; top: -3px;\" name=\"posicion_" . $sc_seq_vert . "\" value=\"$cadaradio[1]\"";
          if (trim($this->posicion_) === trim($cadaradio[1])) 
          { 
              echo " checked" ; 
          } 
          if (strtoupper($cadaradio[2]) == "S") 
          { 
              if (empty($this->posicion_)) 
              { 
                  echo " checked" ; 
              } 
          } 
          echo "  onClick=\"" . $sCheckInsert . "\" >" ; 
          echo "" . $cadaradio[0] . "";
          $x++ ; 
          $y++ ; 
          echo "  </font></td>\r\n";
   } 
   echo " </tr>\r\n";
   echo "</table>";
   echo "</div>\r\n";
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cod_desemp_']) && $this->nmgp_cmp_hidden['cod_desemp_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_desemp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_desemp_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cod_desemp__line" id="hidden_field_data_cod_desemp_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cod_desemp_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cod_desemp__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cod_desemp_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_desemp_"]) &&  $this->nmgp_cmp_readonly["cod_desemp_"] == "on") { 

 ?>
<input type="hidden" name="cod_desemp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_desemp_) . "\">" . $cod_desemp_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_desemp_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cod_desemp_<?php echo $sc_seq_vert ?> css_cod_desemp__line" style="<?php echo $sStyleReadLab_cod_desemp_; ?>"><?php echo $this->form_encode_input($this->cod_desemp_); ?></span><span id="id_read_off_cod_desemp_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_desemp_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cod_desemp__obj" style="" id="id_sc_field_cod_desemp_<?php echo $sc_seq_vert ?>" type=text name="cod_desemp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_desemp_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cod_desemp_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cod_desemp_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php
   $Sc_iframe_master = ($this->Embutida_form) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_rel_desemp_posicion_1*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_desempeno_1"]) && $this->Ini->sc_lig_md5["grid_desempeno_1"] == "S") {
       $Parms_Lig  = "par_id_area*scin" . $_SESSION['par_id_area'] . "*scoutSC_glo_par_par_id_area*scinpar_id_area*scoutnmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,cod_desemp_" . $sc_seq_vert . ",codigo*scoutnm_evt_ret_busca*scinsc_form_rel_desemp_posicion_1_cod_desemp__onchange(this," . $sc_seq_vert . ")*scoutjs_lookup*scinlookup_cod_desemp_*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_rel_desemp_posicion_1@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "par_id_area*scin" . $_SESSION['par_id_area'] . "*scoutSC_glo_par_par_id_area*scinpar_id_area*scoutnmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,cod_desemp_" . $sc_seq_vert . ",codigo*scoutnm_evt_ret_busca*scinsc_form_rel_desemp_posicion_1_cod_desemp__onchange(this," . $sc_seq_vert . ")*scoutjs_lookup*scinlookup_cod_desemp_*scout" . $Sc_iframe_master;
   }
?>

&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_desempeno_1_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_desempeno_1_cons_psq. "', '" . $Md5_Lig . "')", "cap_cod_desemp_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

<?php } ?>
 <SPAN id="id_lookup_cod_desemp_<?php echo $sc_seq_vert ?>" style="font-size: 9px"><?php echo $look_rpc_cod_desemp_; ?></SPAN></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_desemp_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_desemp_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['entorno_']) && $this->nmgp_cmp_hidden['entorno_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="entorno_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($entorno_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_entorno__line" id="hidden_field_data_entorno_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_entorno_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_entorno__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_entorno_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["entorno_"]) &&  $this->nmgp_cmp_readonly["entorno_"] == "on") { 

 ?>
<input type="hidden" name="entorno_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($entorno_) . "\">" . $entorno_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_entorno_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-entorno_<?php echo $sc_seq_vert ?> css_entorno__line" style="<?php echo $sStyleReadLab_entorno_; ?>"><?php echo $this->form_encode_input($this->entorno_); ?></span><span id="id_read_off_entorno_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_entorno_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_entorno__obj" style="" id="id_sc_field_entorno_<?php echo $sc_seq_vert ?>" type=text name="entorno_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($entorno_) ?>"
 size=4 maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '[entorno]', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_entorno_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_entorno_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_grado_))
       {
           $this->nmgp_cmp_readonly['id_grado_'] = $sCheckRead_id_grado_;
       }
       if ('display: none;' == $sStyleHidden_id_grado_)
       {
           $this->nmgp_cmp_hidden['id_grado_'] = 'off';
       }
       if (isset($sCheckRead_id_grupo_))
       {
           $this->nmgp_cmp_readonly['id_grupo_'] = $sCheckRead_id_grupo_;
       }
       if ('display: none;' == $sStyleHidden_id_grupo_)
       {
           $this->nmgp_cmp_hidden['id_grupo_'] = 'off';
       }
       if (isset($sCheckRead_id_asign_))
       {
           $this->nmgp_cmp_readonly['id_asign_'] = $sCheckRead_id_asign_;
       }
       if ('display: none;' == $sStyleHidden_id_asign_)
       {
           $this->nmgp_cmp_hidden['id_asign_'] = 'off';
       }
       if (isset($sCheckRead_periodo_))
       {
           $this->nmgp_cmp_readonly['periodo_'] = $sCheckRead_periodo_;
       }
       if ('display: none;' == $sStyleHidden_periodo_)
       {
           $this->nmgp_cmp_hidden['periodo_'] = 'off';
       }
       if (isset($sCheckRead_posicion_))
       {
           $this->nmgp_cmp_readonly['posicion_'] = $sCheckRead_posicion_;
       }
       if ('display: none;' == $sStyleHidden_posicion_)
       {
           $this->nmgp_cmp_hidden['posicion_'] = 'off';
       }
       if (isset($sCheckRead_cod_desemp_))
       {
           $this->nmgp_cmp_readonly['cod_desemp_'] = $sCheckRead_cod_desemp_;
       }
       if ('display: none;' == $sStyleHidden_cod_desemp_)
       {
           $this->nmgp_cmp_hidden['cod_desemp_'] = 'off';
       }
       if (isset($sCheckRead_entorno_))
       {
           $this->nmgp_cmp_readonly['entorno_'] = $sCheckRead_entorno_;
       }
       if ('display: none;' == $sStyleHidden_entorno_)
       {
           $this->nmgp_cmp_hidden['entorno_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_rel_desemp_posicion_1 = $guarda_form_vert_form_rel_desemp_posicion_1;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['masterValue']);
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
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_rel_desemp_posicion_1");
 parent.scAjaxDetailHeight("form_rel_desemp_posicion_1", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_rel_desemp_posicion_1", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_rel_desemp_posicion_1", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_1']['sc_modal'])
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
