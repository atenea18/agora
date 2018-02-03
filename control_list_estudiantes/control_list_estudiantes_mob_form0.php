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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("Escoja los Campos a Imprimir"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>control_list_estudiantes/control_list_estudiantes_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("control_list_estudiantes_mob_sajax_js.php");
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

include_once('control_list_estudiantes_mob_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
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
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>digita.js"> 
</script> 
<?php
 include_once("control_list_estudiantes_mob_js0.php");
?>
<script type="text/javascript"> 
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
               action="control_list_estudiantes_mob.php" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" /> 
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['control_list_estudiantes_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['control_list_estudiantes_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "Escoja los Campos a Imprimir"; } ?></span></td>
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['empty_filter'] = true;
       }
  }
  else
  {
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['estatus']))
   {
       $this->nm_new_label['estatus'] = "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estatus = $this->estatus;
   $sStyleHidden_estatus = '';
   if (isset($this->nmgp_cmp_hidden['estatus']) && $this->nmgp_cmp_hidden['estatus'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estatus']);
       $sStyleHidden_estatus = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estatus = 'display: none;';
   $sStyleReadInp_estatus = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estatus']) && $this->nmgp_cmp_readonly['estatus'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estatus']);
       $sStyleReadLab_estatus = '';
       $sStyleReadInp_estatus = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estatus']) && $this->nmgp_cmp_hidden['estatus'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="estatus" value="<?php echo $this->form_encode_input($this->estatus) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->estatus_1 = explode(";", trim($this->estatus));
  } 
  else
  {
      if (empty($this->estatus))
      {
          $this->estatus_1= array(); 
      } 
      else
      {
          $this->estatus_1= $this->estatus; 
          $this->estatus= ""; 
          foreach ($this->estatus_1 as $cada_estatus)
          {
             if (!empty($estatus))
             {
                 $this->estatus.= ";"; 
             } 
             $this->estatus.= $cada_estatus; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_estatus_line" id="hidden_field_data_estatus" style="<?php echo $sStyleHidden_estatus; ?>"> <span class="scFormLabelOddFormat css_estatus_label"><span id="id_label_estatus"><?php echo $this->nm_new_label['estatus']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatus"]) &&  $this->nmgp_cmp_readonly["estatus"] == "on") { 

$estatus_look = "";
 if (in_array("1", $this->estatus_1))  { $estatus_look .= "Estatus<br />";} 
?>
<input type="hidden" name="estatus" value="<?php echo $this->form_encode_input($estatus) . "\">" . $estatus_look . ""; ?>
<?php } else { ?>

<?php

$estatus_look = "";
 if (in_array("1", $this->estatus_1))  { $estatus_look .= "Estatus<br />";} 
?>
<span id="id_read_on_estatus" class="css_estatus_line" style="<?php echo $sStyleReadLab_estatus; ?>"><?php echo $this->form_encode_input($estatus_look); ?></span><span id="id_read_off_estatus" style="<?php echo $sStyleReadInp_estatus; ?>"><?php echo "<div id=\"idAjaxCheckbox_estatus\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_estatus_line"> <input type=checkbox class="sc-ui-checkbox-estatus sc-ui-checkbox-estatus" name="estatus[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_estatus'][] = '1'; ?>
<?php  if (in_array("1", $this->estatus_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Estatus</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
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
       $this->nm_new_label['semestre'] = "";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['semestre']) && $this->nmgp_cmp_hidden['semestre'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="semestre" value="<?php echo $this->form_encode_input($this->semestre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->semestre_1 = explode(";", trim($this->semestre));
  } 
  else
  {
      if (empty($this->semestre))
      {
          $this->semestre_1= array(); 
      } 
      else
      {
          $this->semestre_1= $this->semestre; 
          $this->semestre= ""; 
          foreach ($this->semestre_1 as $cada_semestre)
          {
             if (!empty($semestre))
             {
                 $this->semestre.= ";"; 
             } 
             $this->semestre.= $cada_semestre; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_semestre_line" id="hidden_field_data_semestre" style="<?php echo $sStyleHidden_semestre; ?>"> <span class="scFormLabelOddFormat css_semestre_label"><span id="id_label_semestre"><?php echo $this->nm_new_label['semestre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["semestre"]) &&  $this->nmgp_cmp_readonly["semestre"] == "on") { 

$semestre_look = "";
 if (in_array("1", $this->semestre_1))  { $semestre_look .= "Semestre<br />";} 
?>
<input type="hidden" name="semestre" value="<?php echo $this->form_encode_input($semestre) . "\">" . $semestre_look . ""; ?>
<?php } else { ?>

<?php

$semestre_look = "";
 if (in_array("1", $this->semestre_1))  { $semestre_look .= "Semestre<br />";} 
?>
<span id="id_read_on_semestre" class="css_semestre_line" style="<?php echo $sStyleReadLab_semestre; ?>"><?php echo $this->form_encode_input($semestre_look); ?></span><span id="id_read_off_semestre" style="<?php echo $sStyleReadInp_semestre; ?>"><?php echo "<div id=\"idAjaxCheckbox_semestre\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_semestre_line"> <input type=checkbox class="sc-ui-checkbox-semestre sc-ui-checkbox-semestre" name="semestre[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_semestre'][] = '1'; ?>
<?php  if (in_array("1", $this->semestre_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Semestre</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fecha_matricula']))
   {
       $this->nm_new_label['fecha_matricula'] = "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_matricula = $this->fecha_matricula;
   $sStyleHidden_fecha_matricula = '';
   if (isset($this->nmgp_cmp_hidden['fecha_matricula']) && $this->nmgp_cmp_hidden['fecha_matricula'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_matricula']);
       $sStyleHidden_fecha_matricula = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_matricula = 'display: none;';
   $sStyleReadInp_fecha_matricula = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_matricula']) && $this->nmgp_cmp_readonly['fecha_matricula'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_matricula']);
       $sStyleReadLab_fecha_matricula = '';
       $sStyleReadInp_fecha_matricula = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_matricula']) && $this->nmgp_cmp_hidden['fecha_matricula'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fecha_matricula" value="<?php echo $this->form_encode_input($this->fecha_matricula) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fecha_matricula_1 = explode(";", trim($this->fecha_matricula));
  } 
  else
  {
      if (empty($this->fecha_matricula))
      {
          $this->fecha_matricula_1= array(); 
      } 
      else
      {
          $this->fecha_matricula_1= $this->fecha_matricula; 
          $this->fecha_matricula= ""; 
          foreach ($this->fecha_matricula_1 as $cada_fecha_matricula)
          {
             if (!empty($fecha_matricula))
             {
                 $this->fecha_matricula.= ";"; 
             } 
             $this->fecha_matricula.= $cada_fecha_matricula; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fecha_matricula_line" id="hidden_field_data_fecha_matricula" style="<?php echo $sStyleHidden_fecha_matricula; ?>"> <span class="scFormLabelOddFormat css_fecha_matricula_label"><span id="id_label_fecha_matricula"><?php echo $this->nm_new_label['fecha_matricula']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_matricula"]) &&  $this->nmgp_cmp_readonly["fecha_matricula"] == "on") { 

$fecha_matricula_look = "";
 if (in_array("1", $this->fecha_matricula_1))  { $fecha_matricula_look .= "Fecha de Matrícula<br />";} 
?>
<input type="hidden" name="fecha_matricula" value="<?php echo $this->form_encode_input($fecha_matricula) . "\">" . $fecha_matricula_look . ""; ?>
<?php } else { ?>

<?php

$fecha_matricula_look = "";
 if (in_array("1", $this->fecha_matricula_1))  { $fecha_matricula_look .= "Fecha de Matrícula<br />";} 
?>
<span id="id_read_on_fecha_matricula" class="css_fecha_matricula_line" style="<?php echo $sStyleReadLab_fecha_matricula; ?>"><?php echo $this->form_encode_input($fecha_matricula_look); ?></span><span id="id_read_off_fecha_matricula" style="<?php echo $sStyleReadInp_fecha_matricula; ?>"><?php echo "<div id=\"idAjaxCheckbox_fecha_matricula\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_fecha_matricula_line"> <input type=checkbox class="sc-ui-checkbox-fecha_matricula sc-ui-checkbox-fecha_matricula" name="fecha_matricula[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_fecha_matricula'][] = '1'; ?>
<?php  if (in_array("1", $this->fecha_matricula_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Fecha de Matrícula</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_identificacion']))
   {
       $this->nm_new_label['tipo_identificacion'] = "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_identificacion = $this->tipo_identificacion;
   $sStyleHidden_tipo_identificacion = '';
   if (isset($this->nmgp_cmp_hidden['tipo_identificacion']) && $this->nmgp_cmp_hidden['tipo_identificacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_identificacion']);
       $sStyleHidden_tipo_identificacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_identificacion = 'display: none;';
   $sStyleReadInp_tipo_identificacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_identificacion']) && $this->nmgp_cmp_readonly['tipo_identificacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_identificacion']);
       $sStyleReadLab_tipo_identificacion = '';
       $sStyleReadInp_tipo_identificacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_identificacion']) && $this->nmgp_cmp_hidden['tipo_identificacion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_identificacion" value="<?php echo $this->form_encode_input($this->tipo_identificacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->tipo_identificacion_1 = explode(";", trim($this->tipo_identificacion));
  } 
  else
  {
      if (empty($this->tipo_identificacion))
      {
          $this->tipo_identificacion_1= array(); 
      } 
      else
      {
          $this->tipo_identificacion_1= $this->tipo_identificacion; 
          $this->tipo_identificacion= ""; 
          foreach ($this->tipo_identificacion_1 as $cada_tipo_identificacion)
          {
             if (!empty($tipo_identificacion))
             {
                 $this->tipo_identificacion.= ";"; 
             } 
             $this->tipo_identificacion.= $cada_tipo_identificacion; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_tipo_identificacion_line" id="hidden_field_data_tipo_identificacion" style="<?php echo $sStyleHidden_tipo_identificacion; ?>"> <span class="scFormLabelOddFormat css_tipo_identificacion_label"><span id="id_label_tipo_identificacion"><?php echo $this->nm_new_label['tipo_identificacion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_identificacion"]) &&  $this->nmgp_cmp_readonly["tipo_identificacion"] == "on") { 

$tipo_identificacion_look = "";
 if (in_array("1", $this->tipo_identificacion_1))  { $tipo_identificacion_look .= "Tipo de Identificación<br />";} 
?>
<input type="hidden" name="tipo_identificacion" value="<?php echo $this->form_encode_input($tipo_identificacion) . "\">" . $tipo_identificacion_look . ""; ?>
<?php } else { ?>

<?php

$tipo_identificacion_look = "";
 if (in_array("1", $this->tipo_identificacion_1))  { $tipo_identificacion_look .= "Tipo de Identificación<br />";} 
?>
<span id="id_read_on_tipo_identificacion" class="css_tipo_identificacion_line" style="<?php echo $sStyleReadLab_tipo_identificacion; ?>"><?php echo $this->form_encode_input($tipo_identificacion_look); ?></span><span id="id_read_off_tipo_identificacion" style="<?php echo $sStyleReadInp_tipo_identificacion; ?>"><?php echo "<div id=\"idAjaxCheckbox_tipo_identificacion\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_tipo_identificacion_line"> <input type=checkbox class="sc-ui-checkbox-tipo_identificacion sc-ui-checkbox-tipo_identificacion" name="tipo_identificacion[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_tipo_identificacion'][] = '1'; ?>
<?php  if (in_array("1", $this->tipo_identificacion_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Tipo de Identificación</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['numero_documento']))
   {
       $this->nm_new_label['numero_documento'] = "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_documento = $this->numero_documento;
   $sStyleHidden_numero_documento = '';
   if (isset($this->nmgp_cmp_hidden['numero_documento']) && $this->nmgp_cmp_hidden['numero_documento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_documento']);
       $sStyleHidden_numero_documento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_documento = 'display: none;';
   $sStyleReadInp_numero_documento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_documento']) && $this->nmgp_cmp_readonly['numero_documento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_documento']);
       $sStyleReadLab_numero_documento = '';
       $sStyleReadInp_numero_documento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_documento']) && $this->nmgp_cmp_hidden['numero_documento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="numero_documento" value="<?php echo $this->form_encode_input($this->numero_documento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->numero_documento_1 = explode(";", trim($this->numero_documento));
  } 
  else
  {
      if (empty($this->numero_documento))
      {
          $this->numero_documento_1= array(); 
      } 
      else
      {
          $this->numero_documento_1= $this->numero_documento; 
          $this->numero_documento= ""; 
          foreach ($this->numero_documento_1 as $cada_numero_documento)
          {
             if (!empty($numero_documento))
             {
                 $this->numero_documento.= ";"; 
             } 
             $this->numero_documento.= $cada_numero_documento; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_numero_documento_line" id="hidden_field_data_numero_documento" style="<?php echo $sStyleHidden_numero_documento; ?>"> <span class="scFormLabelOddFormat css_numero_documento_label"><span id="id_label_numero_documento"><?php echo $this->nm_new_label['numero_documento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_documento"]) &&  $this->nmgp_cmp_readonly["numero_documento"] == "on") { 

$numero_documento_look = "";
 if (in_array("1", $this->numero_documento_1))  { $numero_documento_look .= "Número de Documento<br />";} 
?>
<input type="hidden" name="numero_documento" value="<?php echo $this->form_encode_input($numero_documento) . "\">" . $numero_documento_look . ""; ?>
<?php } else { ?>

<?php

$numero_documento_look = "";
 if (in_array("1", $this->numero_documento_1))  { $numero_documento_look .= "Número de Documento<br />";} 
?>
<span id="id_read_on_numero_documento" class="css_numero_documento_line" style="<?php echo $sStyleReadLab_numero_documento; ?>"><?php echo $this->form_encode_input($numero_documento_look); ?></span><span id="id_read_off_numero_documento" style="<?php echo $sStyleReadInp_numero_documento; ?>"><?php echo "<div id=\"idAjaxCheckbox_numero_documento\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_numero_documento_line"> <input type=checkbox class="sc-ui-checkbox-numero_documento sc-ui-checkbox-numero_documento" name="numero_documento[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_numero_documento'][] = '1'; ?>
<?php  if (in_array("1", $this->numero_documento_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Número de Documento</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['genero']))
   {
       $this->nm_new_label['genero'] = "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $genero = $this->genero;
   $sStyleHidden_genero = '';
   if (isset($this->nmgp_cmp_hidden['genero']) && $this->nmgp_cmp_hidden['genero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['genero']);
       $sStyleHidden_genero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_genero = 'display: none;';
   $sStyleReadInp_genero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['genero']) && $this->nmgp_cmp_readonly['genero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['genero']);
       $sStyleReadLab_genero = '';
       $sStyleReadInp_genero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['genero']) && $this->nmgp_cmp_hidden['genero'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="genero" value="<?php echo $this->form_encode_input($this->genero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->genero_1 = explode(";", trim($this->genero));
  } 
  else
  {
      if (empty($this->genero))
      {
          $this->genero_1= array(); 
      } 
      else
      {
          $this->genero_1= $this->genero; 
          $this->genero= ""; 
          foreach ($this->genero_1 as $cada_genero)
          {
             if (!empty($genero))
             {
                 $this->genero.= ";"; 
             } 
             $this->genero.= $cada_genero; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_genero_line" id="hidden_field_data_genero" style="<?php echo $sStyleHidden_genero; ?>"> <span class="scFormLabelOddFormat css_genero_label"><span id="id_label_genero"><?php echo $this->nm_new_label['genero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["genero"]) &&  $this->nmgp_cmp_readonly["genero"] == "on") { 

$genero_look = "";
 if (in_array("1", $this->genero_1))  { $genero_look .= "Género<br />";} 
?>
<input type="hidden" name="genero" value="<?php echo $this->form_encode_input($genero) . "\">" . $genero_look . ""; ?>
<?php } else { ?>

<?php

$genero_look = "";
 if (in_array("1", $this->genero_1))  { $genero_look .= "Género<br />";} 
?>
<span id="id_read_on_genero" class="css_genero_line" style="<?php echo $sStyleReadLab_genero; ?>"><?php echo $this->form_encode_input($genero_look); ?></span><span id="id_read_off_genero" style="<?php echo $sStyleReadInp_genero; ?>"><?php echo "<div id=\"idAjaxCheckbox_genero\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_genero_line"> <input type=checkbox class="sc-ui-checkbox-genero sc-ui-checkbox-genero" name="genero[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_genero'][] = '1'; ?>
<?php  if (in_array("1", $this->genero_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Género</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fecha_nacimiento']))
   {
       $this->nm_new_label['fecha_nacimiento'] = "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_nacimiento = $this->fecha_nacimiento;
   $sStyleHidden_fecha_nacimiento = '';
   if (isset($this->nmgp_cmp_hidden['fecha_nacimiento']) && $this->nmgp_cmp_hidden['fecha_nacimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_nacimiento']);
       $sStyleHidden_fecha_nacimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_nacimiento = 'display: none;';
   $sStyleReadInp_fecha_nacimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_nacimiento']) && $this->nmgp_cmp_readonly['fecha_nacimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_nacimiento']);
       $sStyleReadLab_fecha_nacimiento = '';
       $sStyleReadInp_fecha_nacimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_nacimiento']) && $this->nmgp_cmp_hidden['fecha_nacimiento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fecha_nacimiento" value="<?php echo $this->form_encode_input($this->fecha_nacimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fecha_nacimiento_1 = explode(";", trim($this->fecha_nacimiento));
  } 
  else
  {
      if (empty($this->fecha_nacimiento))
      {
          $this->fecha_nacimiento_1= array(); 
      } 
      else
      {
          $this->fecha_nacimiento_1= $this->fecha_nacimiento; 
          $this->fecha_nacimiento= ""; 
          foreach ($this->fecha_nacimiento_1 as $cada_fecha_nacimiento)
          {
             if (!empty($fecha_nacimiento))
             {
                 $this->fecha_nacimiento.= ";"; 
             } 
             $this->fecha_nacimiento.= $cada_fecha_nacimiento; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fecha_nacimiento_line" id="hidden_field_data_fecha_nacimiento" style="<?php echo $sStyleHidden_fecha_nacimiento; ?>"> <span class="scFormLabelOddFormat css_fecha_nacimiento_label"><span id="id_label_fecha_nacimiento"><?php echo $this->nm_new_label['fecha_nacimiento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_nacimiento"]) &&  $this->nmgp_cmp_readonly["fecha_nacimiento"] == "on") { 

$fecha_nacimiento_look = "";
 if (in_array("1", $this->fecha_nacimiento_1))  { $fecha_nacimiento_look .= "Fecha de Nacimiento<br />";} 
?>
<input type="hidden" name="fecha_nacimiento" value="<?php echo $this->form_encode_input($fecha_nacimiento) . "\">" . $fecha_nacimiento_look . ""; ?>
<?php } else { ?>

<?php

$fecha_nacimiento_look = "";
 if (in_array("1", $this->fecha_nacimiento_1))  { $fecha_nacimiento_look .= "Fecha de Nacimiento<br />";} 
?>
<span id="id_read_on_fecha_nacimiento" class="css_fecha_nacimiento_line" style="<?php echo $sStyleReadLab_fecha_nacimiento; ?>"><?php echo $this->form_encode_input($fecha_nacimiento_look); ?></span><span id="id_read_off_fecha_nacimiento" style="<?php echo $sStyleReadInp_fecha_nacimiento; ?>"><?php echo "<div id=\"idAjaxCheckbox_fecha_nacimiento\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_fecha_nacimiento_line"> <input type=checkbox class="sc-ui-checkbox-fecha_nacimiento sc-ui-checkbox-fecha_nacimiento" name="fecha_nacimiento[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_fecha_nacimiento'][] = '1'; ?>
<?php  if (in_array("1", $this->fecha_nacimiento_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Fecha de Nacimiento</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['anos_cumplidos']))
   {
       $this->nm_new_label['anos_cumplidos'] = "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anos_cumplidos = $this->anos_cumplidos;
   $sStyleHidden_anos_cumplidos = '';
   if (isset($this->nmgp_cmp_hidden['anos_cumplidos']) && $this->nmgp_cmp_hidden['anos_cumplidos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anos_cumplidos']);
       $sStyleHidden_anos_cumplidos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anos_cumplidos = 'display: none;';
   $sStyleReadInp_anos_cumplidos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anos_cumplidos']) && $this->nmgp_cmp_readonly['anos_cumplidos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anos_cumplidos']);
       $sStyleReadLab_anos_cumplidos = '';
       $sStyleReadInp_anos_cumplidos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anos_cumplidos']) && $this->nmgp_cmp_hidden['anos_cumplidos'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="anos_cumplidos" value="<?php echo $this->form_encode_input($this->anos_cumplidos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->anos_cumplidos_1 = explode(";", trim($this->anos_cumplidos));
  } 
  else
  {
      if (empty($this->anos_cumplidos))
      {
          $this->anos_cumplidos_1= array(); 
      } 
      else
      {
          $this->anos_cumplidos_1= $this->anos_cumplidos; 
          $this->anos_cumplidos= ""; 
          foreach ($this->anos_cumplidos_1 as $cada_anos_cumplidos)
          {
             if (!empty($anos_cumplidos))
             {
                 $this->anos_cumplidos.= ";"; 
             } 
             $this->anos_cumplidos.= $cada_anos_cumplidos; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_anos_cumplidos_line" id="hidden_field_data_anos_cumplidos" style="<?php echo $sStyleHidden_anos_cumplidos; ?>"> <span class="scFormLabelOddFormat css_anos_cumplidos_label"><span id="id_label_anos_cumplidos"><?php echo $this->nm_new_label['anos_cumplidos']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anos_cumplidos"]) &&  $this->nmgp_cmp_readonly["anos_cumplidos"] == "on") { 

$anos_cumplidos_look = "";
 if (in_array("1", $this->anos_cumplidos_1))  { $anos_cumplidos_look .= "Años Cumplidos<br />";} 
?>
<input type="hidden" name="anos_cumplidos" value="<?php echo $this->form_encode_input($anos_cumplidos) . "\">" . $anos_cumplidos_look . ""; ?>
<?php } else { ?>

<?php

$anos_cumplidos_look = "";
 if (in_array("1", $this->anos_cumplidos_1))  { $anos_cumplidos_look .= "Años Cumplidos<br />";} 
?>
<span id="id_read_on_anos_cumplidos" class="css_anos_cumplidos_line" style="<?php echo $sStyleReadLab_anos_cumplidos; ?>"><?php echo $this->form_encode_input($anos_cumplidos_look); ?></span><span id="id_read_off_anos_cumplidos" style="<?php echo $sStyleReadInp_anos_cumplidos; ?>"><?php echo "<div id=\"idAjaxCheckbox_anos_cumplidos\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_anos_cumplidos_line"> <input type=checkbox class="sc-ui-checkbox-anos_cumplidos sc-ui-checkbox-anos_cumplidos" name="anos_cumplidos[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_anos_cumplidos'][] = '1'; ?>
<?php  if (in_array("1", $this->anos_cumplidos_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Años Cumplidos</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['telefono']))
   {
       $this->nm_new_label['telefono'] = "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefono = $this->telefono;
   $sStyleHidden_telefono = '';
   if (isset($this->nmgp_cmp_hidden['telefono']) && $this->nmgp_cmp_hidden['telefono'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefono']);
       $sStyleHidden_telefono = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefono = 'display: none;';
   $sStyleReadInp_telefono = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telefono']) && $this->nmgp_cmp_readonly['telefono'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefono']);
       $sStyleReadLab_telefono = '';
       $sStyleReadInp_telefono = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefono']) && $this->nmgp_cmp_hidden['telefono'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="telefono" value="<?php echo $this->form_encode_input($this->telefono) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->telefono_1 = explode(";", trim($this->telefono));
  } 
  else
  {
      if (empty($this->telefono))
      {
          $this->telefono_1= array(); 
      } 
      else
      {
          $this->telefono_1= $this->telefono; 
          $this->telefono= ""; 
          foreach ($this->telefono_1 as $cada_telefono)
          {
             if (!empty($telefono))
             {
                 $this->telefono.= ";"; 
             } 
             $this->telefono.= $cada_telefono; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_telefono_line" id="hidden_field_data_telefono" style="<?php echo $sStyleHidden_telefono; ?>"> <span class="scFormLabelOddFormat css_telefono_label"><span id="id_label_telefono"><?php echo $this->nm_new_label['telefono']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefono"]) &&  $this->nmgp_cmp_readonly["telefono"] == "on") { 

$telefono_look = "";
 if (in_array("1", $this->telefono_1))  { $telefono_look .= "Teléfono<br />";} 
?>
<input type="hidden" name="telefono" value="<?php echo $this->form_encode_input($telefono) . "\">" . $telefono_look . ""; ?>
<?php } else { ?>

<?php

$telefono_look = "";
 if (in_array("1", $this->telefono_1))  { $telefono_look .= "Teléfono<br />";} 
?>
<span id="id_read_on_telefono" class="css_telefono_line" style="<?php echo $sStyleReadLab_telefono; ?>"><?php echo $this->form_encode_input($telefono_look); ?></span><span id="id_read_off_telefono" style="<?php echo $sStyleReadInp_telefono; ?>"><?php echo "<div id=\"idAjaxCheckbox_telefono\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_telefono_line"> <input type=checkbox class="sc-ui-checkbox-telefono sc-ui-checkbox-telefono" name="telefono[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_telefono'][] = '1'; ?>
<?php  if (in_array("1", $this->telefono_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Teléfono</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
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
       $this->nm_new_label['etnia'] = "";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['etnia']) && $this->nmgp_cmp_hidden['etnia'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="etnia" value="<?php echo $this->form_encode_input($this->etnia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->etnia_1 = explode(";", trim($this->etnia));
  } 
  else
  {
      if (empty($this->etnia))
      {
          $this->etnia_1= array(); 
      } 
      else
      {
          $this->etnia_1= $this->etnia; 
          $this->etnia= ""; 
          foreach ($this->etnia_1 as $cada_etnia)
          {
             if (!empty($etnia))
             {
                 $this->etnia.= ";"; 
             } 
             $this->etnia.= $cada_etnia; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_etnia_line" id="hidden_field_data_etnia" style="<?php echo $sStyleHidden_etnia; ?>"> <span class="scFormLabelOddFormat css_etnia_label"><span id="id_label_etnia"><?php echo $this->nm_new_label['etnia']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["etnia"]) &&  $this->nmgp_cmp_readonly["etnia"] == "on") { 

$etnia_look = "";
 if (in_array("1", $this->etnia_1))  { $etnia_look .= "Etnia<br />";} 
?>
<input type="hidden" name="etnia" value="<?php echo $this->form_encode_input($etnia) . "\">" . $etnia_look . ""; ?>
<?php } else { ?>

<?php

$etnia_look = "";
 if (in_array("1", $this->etnia_1))  { $etnia_look .= "Etnia<br />";} 
?>
<span id="id_read_on_etnia" class="css_etnia_line" style="<?php echo $sStyleReadLab_etnia; ?>"><?php echo $this->form_encode_input($etnia_look); ?></span><span id="id_read_off_etnia" style="<?php echo $sStyleReadInp_etnia; ?>"><?php echo "<div id=\"idAjaxCheckbox_etnia\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_etnia_line"> <input type=checkbox class="sc-ui-checkbox-etnia sc-ui-checkbox-etnia" name="etnia[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_etnia'][] = '1'; ?>
<?php  if (in_array("1", $this->etnia_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Etnia</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['emai']))
   {
       $this->nm_new_label['emai'] = "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emai = $this->emai;
   $sStyleHidden_emai = '';
   if (isset($this->nmgp_cmp_hidden['emai']) && $this->nmgp_cmp_hidden['emai'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emai']);
       $sStyleHidden_emai = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emai = 'display: none;';
   $sStyleReadInp_emai = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emai']) && $this->nmgp_cmp_readonly['emai'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emai']);
       $sStyleReadLab_emai = '';
       $sStyleReadInp_emai = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emai']) && $this->nmgp_cmp_hidden['emai'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="emai" value="<?php echo $this->form_encode_input($this->emai) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->emai_1 = explode(";", trim($this->emai));
  } 
  else
  {
      if (empty($this->emai))
      {
          $this->emai_1= array(); 
      } 
      else
      {
          $this->emai_1= $this->emai; 
          $this->emai= ""; 
          foreach ($this->emai_1 as $cada_emai)
          {
             if (!empty($emai))
             {
                 $this->emai.= ";"; 
             } 
             $this->emai.= $cada_emai; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_emai_line" id="hidden_field_data_emai" style="<?php echo $sStyleHidden_emai; ?>"> <span class="scFormLabelOddFormat css_emai_label"><span id="id_label_emai"><?php echo $this->nm_new_label['emai']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emai"]) &&  $this->nmgp_cmp_readonly["emai"] == "on") { 

$emai_look = "";
 if (in_array("1", $this->emai_1))  { $emai_look .= "Email<br />";} 
?>
<input type="hidden" name="emai" value="<?php echo $this->form_encode_input($emai) . "\">" . $emai_look . ""; ?>
<?php } else { ?>

<?php

$emai_look = "";
 if (in_array("1", $this->emai_1))  { $emai_look .= "Email<br />";} 
?>
<span id="id_read_on_emai" class="css_emai_line" style="<?php echo $sStyleReadLab_emai; ?>"><?php echo $this->form_encode_input($emai_look); ?></span><span id="id_read_off_emai" style="<?php echo $sStyleReadInp_emai; ?>"><?php echo "<div id=\"idAjaxCheckbox_emai\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_emai_line"> <input type=checkbox class="sc-ui-checkbox-emai sc-ui-checkbox-emai" name="emai[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_emai'][] = '1'; ?>
<?php  if (in_array("1", $this->emai_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Email</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['zona']))
   {
       $this->nm_new_label['zona'] = "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zona = $this->zona;
   $sStyleHidden_zona = '';
   if (isset($this->nmgp_cmp_hidden['zona']) && $this->nmgp_cmp_hidden['zona'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zona']);
       $sStyleHidden_zona = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zona = 'display: none;';
   $sStyleReadInp_zona = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zona']) && $this->nmgp_cmp_readonly['zona'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zona']);
       $sStyleReadLab_zona = '';
       $sStyleReadInp_zona = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zona']) && $this->nmgp_cmp_hidden['zona'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="zona" value="<?php echo $this->form_encode_input($this->zona) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->zona_1 = explode(";", trim($this->zona));
  } 
  else
  {
      if (empty($this->zona))
      {
          $this->zona_1= array(); 
          $this->zona= "";
      } 
      else
      {
          $this->zona_1= $this->zona; 
          $this->zona= ""; 
          foreach ($this->zona_1 as $cada_zona)
          {
             if (!empty($zona))
             {
                 $this->zona.= ";"; 
             } 
             $this->zona.= $cada_zona; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_zona_line" id="hidden_field_data_zona" style="<?php echo $sStyleHidden_zona; ?>"> <span class="scFormLabelOddFormat css_zona_label"><span id="id_label_zona"><?php echo $this->nm_new_label['zona']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zona"]) &&  $this->nmgp_cmp_readonly["zona"] == "on") { 

$zona_look = "";
 if ($this->zona == "1") { $zona_look .= "Comuna" ;} 
 if (empty($zona_look)) { $zona_look = $this->zona; }
?>
<input type="hidden" name="zona" value="<?php echo $this->form_encode_input($zona) . "\">" . $zona_look . ""; ?>
<?php } else { ?>

<?php

$zona_look = "";
 if ($this->zona == "1") { $zona_look .= "Comuna" ;} 
 if (empty($zona_look)) { $zona_look = $this->zona; }
?>
<span id="id_read_on_zona" class="css_zona_line" style="<?php echo $sStyleReadLab_zona; ?>"><?php echo $this->form_encode_input($zona_look); ?></span><span id="id_read_off_zona" style="<?php echo $sStyleReadInp_zona; ?>"><?php echo "<div id=\"idAjaxCheckbox_zona\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_zona_line"> <input type=checkbox class="sc-ui-checkbox-zona sc-ui-checkbox-zona" name="zona[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_zona'][] = '1'; ?>
<?php  if (in_array("1", $this->zona_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">Comuna</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['celdas_vacias']))
   {
       $this->nm_new_label['celdas_vacias'] = "Número de Celdas Vacías a la Derecha";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $celdas_vacias = $this->celdas_vacias;
   $sStyleHidden_celdas_vacias = '';
   if (isset($this->nmgp_cmp_hidden['celdas_vacias']) && $this->nmgp_cmp_hidden['celdas_vacias'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['celdas_vacias']);
       $sStyleHidden_celdas_vacias = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_celdas_vacias = 'display: none;';
   $sStyleReadInp_celdas_vacias = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['celdas_vacias']) && $this->nmgp_cmp_readonly['celdas_vacias'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['celdas_vacias']);
       $sStyleReadLab_celdas_vacias = '';
       $sStyleReadInp_celdas_vacias = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['celdas_vacias']) && $this->nmgp_cmp_hidden['celdas_vacias'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="celdas_vacias" value="<?php echo $this->form_encode_input($this->celdas_vacias) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_celdas_vacias_line" id="hidden_field_data_celdas_vacias" style="<?php echo $sStyleHidden_celdas_vacias; ?>"> <span class="scFormLabelOddFormat css_celdas_vacias_label"><span id="id_label_celdas_vacias"><?php echo $this->nm_new_label['celdas_vacias']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["celdas_vacias"]) &&  $this->nmgp_cmp_readonly["celdas_vacias"] == "on") { 

$celdas_vacias_look = "";
 if ($this->celdas_vacias == "1") { $celdas_vacias_look .= "1" ;} 
 if ($this->celdas_vacias == "2") { $celdas_vacias_look .= "2" ;} 
 if ($this->celdas_vacias == "3") { $celdas_vacias_look .= "3" ;} 
 if ($this->celdas_vacias == "4") { $celdas_vacias_look .= "4" ;} 
 if ($this->celdas_vacias == "5") { $celdas_vacias_look .= "5" ;} 
 if ($this->celdas_vacias == "6") { $celdas_vacias_look .= "6" ;} 
 if ($this->celdas_vacias == "7") { $celdas_vacias_look .= "7" ;} 
 if ($this->celdas_vacias == "8") { $celdas_vacias_look .= "8" ;} 
 if ($this->celdas_vacias == "9") { $celdas_vacias_look .= "9" ;} 
 if ($this->celdas_vacias == "10") { $celdas_vacias_look .= "10" ;} 
 if (empty($celdas_vacias_look)) { $celdas_vacias_look = $this->celdas_vacias; }
?>
<input type="hidden" name="celdas_vacias" value="<?php echo $this->form_encode_input($celdas_vacias) . "\">" . $celdas_vacias_look . ""; ?>
<?php } else { ?>
<?php

$celdas_vacias_look = "";
 if ($this->celdas_vacias == "1") { $celdas_vacias_look .= "1" ;} 
 if ($this->celdas_vacias == "2") { $celdas_vacias_look .= "2" ;} 
 if ($this->celdas_vacias == "3") { $celdas_vacias_look .= "3" ;} 
 if ($this->celdas_vacias == "4") { $celdas_vacias_look .= "4" ;} 
 if ($this->celdas_vacias == "5") { $celdas_vacias_look .= "5" ;} 
 if ($this->celdas_vacias == "6") { $celdas_vacias_look .= "6" ;} 
 if ($this->celdas_vacias == "7") { $celdas_vacias_look .= "7" ;} 
 if ($this->celdas_vacias == "8") { $celdas_vacias_look .= "8" ;} 
 if ($this->celdas_vacias == "9") { $celdas_vacias_look .= "9" ;} 
 if ($this->celdas_vacias == "10") { $celdas_vacias_look .= "10" ;} 
 if (empty($celdas_vacias_look)) { $celdas_vacias_look = $this->celdas_vacias; }
?>
<span id="id_read_on_celdas_vacias" class="css_celdas_vacias_line"  style="<?php echo $sStyleReadLab_celdas_vacias; ?>"><?php echo $this->form_encode_input($celdas_vacias_look); ?></span><span id="id_read_off_celdas_vacias" style="<?php echo $sStyleReadInp_celdas_vacias; ?>">
 <span id="idAjaxSelect_celdas_vacias"><select class="sc-js-input scFormObjectOdd css_celdas_vacias_obj" style="" id="id_sc_field_celdas_vacias" name="celdas_vacias" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '0'; ?>
 <option value="0">Seleccione</option>
 <option value="1" <?php  if ($this->celdas_vacias == "1") { echo " selected" ;} ?>>1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '1'; ?>
 <option value="2" <?php  if ($this->celdas_vacias == "2") { echo " selected" ;} ?>>2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '2'; ?>
 <option value="3" <?php  if ($this->celdas_vacias == "3") { echo " selected" ;} ?>>3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '3'; ?>
 <option value="4" <?php  if ($this->celdas_vacias == "4") { echo " selected" ;} ?>>4</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '4'; ?>
 <option value="5" <?php  if ($this->celdas_vacias == "5") { echo " selected" ;} ?>>5</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '5'; ?>
 <option value="6" <?php  if ($this->celdas_vacias == "6") { echo " selected" ;} ?>>6</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '6'; ?>
 <option value="7" <?php  if ($this->celdas_vacias == "7") { echo " selected" ;} ?>>7</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '7'; ?>
 <option value="8" <?php  if ($this->celdas_vacias == "8") { echo " selected" ;} ?>>8</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '8'; ?>
 <option value="9" <?php  if ($this->celdas_vacias == "9") { echo " selected" ;} ?>>9</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '9'; ?>
 <option value="10" <?php  if ($this->celdas_vacias == "10") { echo " selected" ;} ?>>10</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['Lookup_celdas_vacias'][] = '10'; ?>
 </select></span>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
<?php
  }
?>
</td></tr> 
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bok", "nm_atualiza('alterar');", "nm_atualiza('alterar');", "sub_form_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
?>
       
<?php
           if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if ($nm_apl_dependente != 1) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "nm_saida_glo(); return false;", "nm_saida_glo(); return false;", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if ($nm_apl_dependente == 1) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "nm_saida_glo(); return false;", "nm_saida_glo(); return false;", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
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
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['masterValue']);
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
 parent.scAjaxDetailStatus("control_list_estudiantes_mob");
 parent.scAjaxDetailHeight("control_list_estudiantes_mob", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("control_list_estudiantes_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("control_list_estudiantes_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_list_estudiantes_mob']['sc_modal'])
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
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
</body> 
</html> 
