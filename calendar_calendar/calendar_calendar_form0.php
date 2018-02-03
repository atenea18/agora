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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - calendar"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - calendar"); } ?></TITLE>
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/timepicker/jquery.ui.timepicker.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/timepicker/jquery.ui.timepicker.css" type="text/css" media="screen" />
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>calendar_calendar/calendar_calendar_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("calendar_calendar_sajax_js.php");
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

 function sc_calendar_all_day_click() {
  if (document.F1.__calend_all_day__) {
     if (document.F1.__calend_all_day__.checked) {
      scAjaxElementDisplay('hidden_field_label_start_time', 'off');
      scAjaxElementDisplay('hidden_field_data_start_time', 'off');
      scAjaxElementDisplay('hidden_field_label_end_time', 'off');
      scAjaxElementDisplay('hidden_field_data_end_time', 'off');
     }
     else {
      scAjaxElementDisplay('hidden_field_label_start_time', 'on');
      scAjaxElementDisplay('hidden_field_data_start_time', 'on');
      scAjaxElementDisplay('hidden_field_label_end_time', 'on');
      scAjaxElementDisplay('hidden_field_data_end_time', 'on');
     }
    }
 } // sc_calendar_all_day_click
<?php

include_once('calendar_calendar_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  mainForm = document.getElementById('main_table_form');
  formResize();

  sc_calendar_all_day_click();

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
 function formResize()
 {
    var formWidth = mainForm.clientWidth,
        formHeight = mainForm.clientHeight,
        windowHeight = $(window.parent).height();
    if (0 == formWidth || 0 == formHeight)
    {
        setTimeout("formResize()", 50);
    }
    else
    {
        if (formHeight > windowHeight - 100)
        {
            formHeight = windowHeight - 100;
        }
        self.parent.tb_resize(formHeight + 50, formWidth + 50);
    }
 }

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['recarga'];
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
 include_once("calendar_calendar_js0.php");
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
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['insert_validation']; ?>">
<?php
}
?>
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
$_SESSION['scriptcase']['error_span_title']['calendar_calendar'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['calendar_calendar'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - calendar"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - calendar"; } ?></span></td>
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['login']))
   {
       $this->nmgp_cmp_hidden['login'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id']))
           {
               $this->nmgp_cmp_readonly['id'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id']))
    {
        $this->nm_new_label['id'] = "Id";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id = $this->id;
   $sStyleHidden_id = '';
   if (isset($this->nmgp_cmp_hidden['id']) && $this->nmgp_cmp_hidden['id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id']);
       $sStyleHidden_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id = 'display: none;';
   $sStyleReadInp_id = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id"]) &&  $this->nmgp_cmp_readonly["id"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id']);
       $sStyleReadLab_id = '';
       $sStyleReadInp_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id']) && $this->nmgp_cmp_hidden['id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id" value="<?php echo $this->form_encode_input($id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_label" id="hidden_field_label_id" style="<?php echo $sStyleHidden_id; ?>"><span id="id_label_id"><?php echo $this->nm_new_label['id']; ?></span></TD>
    <TD class="scFormDataOdd css_id_line" id="hidden_field_data_id" style="<?php echo $sStyleHidden_id; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id" class="css_id_line" style="<?php echo $sStyleReadLab_id; ?>"><?php echo $this->form_encode_input($this->id); ?></span><span id="id_read_off_id" style="<?php echo $sStyleReadInp_id; ?>"><input type="hidden" name="id" value="<?php echo $this->form_encode_input($id) . "\">"?><span id="id_ajax_label_id"><?php echo nl2br($id); ?></span>
</span></span></td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['title']))
    {
        $this->nm_new_label['title'] = "Titulo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $title = $this->title;
   $sStyleHidden_title = '';
   if (isset($this->nmgp_cmp_hidden['title']) && $this->nmgp_cmp_hidden['title'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['title']);
       $sStyleHidden_title = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_title = 'display: none;';
   $sStyleReadInp_title = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['title']) && $this->nmgp_cmp_readonly['title'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['title']);
       $sStyleReadLab_title = '';
       $sStyleReadInp_title = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['title']) && $this->nmgp_cmp_hidden['title'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="title" value="<?php echo $this->form_encode_input($title) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_title_label" id="hidden_field_label_title" style="<?php echo $sStyleHidden_title; ?>"><span id="id_label_title"><?php echo $this->nm_new_label['title']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['php_cmp_required']['title']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['php_cmp_required']['title'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_title_line" id="hidden_field_data_title" style="<?php echo $sStyleHidden_title; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_title_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["title"]) &&  $this->nmgp_cmp_readonly["title"] == "on") { 

 ?>
<input type="hidden" name="title" value="<?php echo $this->form_encode_input($title) . "\">" . $title . ""; ?>
<?php } else { ?>
<span id="id_read_on_title" class="sc-ui-readonly-title css_title_line" style="<?php echo $sStyleReadLab_title; ?>"><?php echo $this->form_encode_input($this->title); ?></span><span id="id_read_off_title" style="white-space: nowrap;<?php echo $sStyleReadInp_title; ?>">
 <input class="sc-js-input scFormObjectOdd css_title_obj" style="" id="id_sc_field_title" type=text name="title" value="<?php echo $this->form_encode_input($title) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_title_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_title_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['description']))
    {
        $this->nm_new_label['description'] = "Descripción";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $description = $this->description;
   $sStyleHidden_description = '';
   if (isset($this->nmgp_cmp_hidden['description']) && $this->nmgp_cmp_hidden['description'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['description']);
       $sStyleHidden_description = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_description = 'display: none;';
   $sStyleReadInp_description = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['description']) && $this->nmgp_cmp_readonly['description'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['description']);
       $sStyleReadLab_description = '';
       $sStyleReadInp_description = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['description']) && $this->nmgp_cmp_hidden['description'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="description" value="<?php echo $this->form_encode_input($description) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_description_label" id="hidden_field_label_description" style="<?php echo $sStyleHidden_description; ?>"><span id="id_label_description"><?php echo $this->nm_new_label['description']; ?></span></TD>
    <TD class="scFormDataOdd css_description_line" id="hidden_field_data_description" style="<?php echo $sStyleHidden_description; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_description_line" style="vertical-align: top;padding: 0px">
<?php
$description_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($description));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["description"]) &&  $this->nmgp_cmp_readonly["description"] == "on") { 

 ?>
<input type="hidden" name="description" value="<?php echo $this->form_encode_input($description) . "\">" . $description_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_description" class="sc-ui-readonly-description css_description_line" style="<?php echo $sStyleReadLab_description; ?>"><?php echo $this->form_encode_input($description_val); ?></span><span id="id_read_off_description" style="white-space: nowrap;<?php echo $sStyleReadInp_description; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_description_obj" style="white-space: pre-wrap;" name="description" id="id_sc_field_description" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $description; ?>
</textarea>
</span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_description_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_description_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['start_date']))
    {
        $this->nm_new_label['start_date'] = "Fecha Inicio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $start_date = $this->start_date;
   $sStyleHidden_start_date = '';
   if (isset($this->nmgp_cmp_hidden['start_date']) && $this->nmgp_cmp_hidden['start_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['start_date']);
       $sStyleHidden_start_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_start_date = 'display: none;';
   $sStyleReadInp_start_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['start_date']) && $this->nmgp_cmp_readonly['start_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['start_date']);
       $sStyleReadLab_start_date = '';
       $sStyleReadInp_start_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['start_date']) && $this->nmgp_cmp_hidden['start_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="start_date" value="<?php echo $this->form_encode_input($start_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_start_date_label" id="hidden_field_label_start_date" style="<?php echo $sStyleHidden_start_date; ?>"><span id="id_label_start_date"><?php echo $this->nm_new_label['start_date']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['php_cmp_required']['start_date']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['php_cmp_required']['start_date'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_start_date_line" id="hidden_field_data_start_date" style="<?php echo $sStyleHidden_start_date; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_start_date_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["start_date"]) &&  $this->nmgp_cmp_readonly["start_date"] == "on") { 

 ?>
<input type="hidden" name="start_date" value="<?php echo $this->form_encode_input($start_date) . "\">" . $start_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_start_date" class="sc-ui-readonly-start_date css_start_date_line" style="<?php echo $sStyleReadLab_start_date; ?>"><?php echo $this->form_encode_input($start_date); ?></span><span id="id_read_off_start_date" style="white-space: nowrap;<?php echo $sStyleReadInp_start_date; ?>">
 <input class="sc-js-input scFormObjectOdd css_start_date_obj" style="" id="id_sc_field_start_date" type=text name="start_date" value="<?php echo $this->form_encode_input($start_date) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['start_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['start_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['start_date']['date_format'];
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_start_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_start_date_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['start_time']))
    {
        $this->nm_new_label['start_time'] = "Hora Inicio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $start_time = $this->start_time;
   $sStyleHidden_start_time = '';
   if (isset($this->nmgp_cmp_hidden['start_time']) && $this->nmgp_cmp_hidden['start_time'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['start_time']);
       $sStyleHidden_start_time = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_start_time = 'display: none;';
   $sStyleReadInp_start_time = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['start_time']) && $this->nmgp_cmp_readonly['start_time'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['start_time']);
       $sStyleReadLab_start_time = '';
       $sStyleReadInp_start_time = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['start_time']) && $this->nmgp_cmp_hidden['start_time'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="start_time" value="<?php echo $this->form_encode_input($start_time) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_start_time_label" id="hidden_field_label_start_time" style="<?php echo $sStyleHidden_start_time; ?>"><span id="id_label_start_time"><?php echo $this->nm_new_label['start_time']; ?></span></TD>
    <TD class="scFormDataOdd css_start_time_line" id="hidden_field_data_start_time" style="<?php echo $sStyleHidden_start_time; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_start_time_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["start_time"]) &&  $this->nmgp_cmp_readonly["start_time"] == "on") { 

 ?>
<input type="hidden" name="start_time" value="<?php echo $this->form_encode_input($start_time) . "\">" . $start_time . ""; ?>
<?php } else { ?>
<span id="id_read_on_start_time" class="sc-ui-readonly-start_time css_start_time_line" style="<?php echo $sStyleReadLab_start_time; ?>"><?php echo $this->form_encode_input($start_time); ?></span><span id="id_read_off_start_time" style="white-space: nowrap;<?php echo $sStyleReadInp_start_time; ?>">
 <input class="sc-js-input scFormObjectOdd css_start_time_obj" style="" id="id_sc_field_start_time" type=text name="start_time" value="<?php echo $this->form_encode_input($start_time) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['start_time']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['start_time']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['start_time']['date_format'];
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_start_time_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_start_time_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['end_date']))
    {
        $this->nm_new_label['end_date'] = "Fecha Final";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $end_date = $this->end_date;
   $sStyleHidden_end_date = '';
   if (isset($this->nmgp_cmp_hidden['end_date']) && $this->nmgp_cmp_hidden['end_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['end_date']);
       $sStyleHidden_end_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_end_date = 'display: none;';
   $sStyleReadInp_end_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['end_date']) && $this->nmgp_cmp_readonly['end_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['end_date']);
       $sStyleReadLab_end_date = '';
       $sStyleReadInp_end_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['end_date']) && $this->nmgp_cmp_hidden['end_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="end_date" value="<?php echo $this->form_encode_input($end_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_end_date_label" id="hidden_field_label_end_date" style="<?php echo $sStyleHidden_end_date; ?>"><span id="id_label_end_date"><?php echo $this->nm_new_label['end_date']; ?></span></TD>
    <TD class="scFormDataOdd css_end_date_line" id="hidden_field_data_end_date" style="<?php echo $sStyleHidden_end_date; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_end_date_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["end_date"]) &&  $this->nmgp_cmp_readonly["end_date"] == "on") { 

 ?>
<input type="hidden" name="end_date" value="<?php echo $this->form_encode_input($end_date) . "\">" . $end_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_end_date" class="sc-ui-readonly-end_date css_end_date_line" style="<?php echo $sStyleReadLab_end_date; ?>"><?php echo $this->form_encode_input($end_date); ?></span><span id="id_read_off_end_date" style="white-space: nowrap;<?php echo $sStyleReadInp_end_date; ?>">
 <input class="sc-js-input scFormObjectOdd css_end_date_obj" style="" id="id_sc_field_end_date" type=text name="end_date" value="<?php echo $this->form_encode_input($end_date) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['end_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['end_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['end_date']['date_format'];
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_end_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_end_date_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['end_time']))
    {
        $this->nm_new_label['end_time'] = "Hora Final";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $end_time = $this->end_time;
   $sStyleHidden_end_time = '';
   if (isset($this->nmgp_cmp_hidden['end_time']) && $this->nmgp_cmp_hidden['end_time'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['end_time']);
       $sStyleHidden_end_time = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_end_time = 'display: none;';
   $sStyleReadInp_end_time = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['end_time']) && $this->nmgp_cmp_readonly['end_time'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['end_time']);
       $sStyleReadLab_end_time = '';
       $sStyleReadInp_end_time = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['end_time']) && $this->nmgp_cmp_hidden['end_time'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="end_time" value="<?php echo $this->form_encode_input($end_time) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_end_time_label" id="hidden_field_label_end_time" style="<?php echo $sStyleHidden_end_time; ?>"><span id="id_label_end_time"><?php echo $this->nm_new_label['end_time']; ?></span></TD>
    <TD class="scFormDataOdd css_end_time_line" id="hidden_field_data_end_time" style="<?php echo $sStyleHidden_end_time; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_end_time_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["end_time"]) &&  $this->nmgp_cmp_readonly["end_time"] == "on") { 

 ?>
<input type="hidden" name="end_time" value="<?php echo $this->form_encode_input($end_time) . "\">" . $end_time . ""; ?>
<?php } else { ?>
<span id="id_read_on_end_time" class="sc-ui-readonly-end_time css_end_time_line" style="<?php echo $sStyleReadLab_end_time; ?>"><?php echo $this->form_encode_input($end_time); ?></span><span id="id_read_off_end_time" style="white-space: nowrap;<?php echo $sStyleReadInp_end_time; ?>">
 <input class="sc-js-input scFormObjectOdd css_end_time_obj" style="" id="id_sc_field_end_time" type=text name="end_time" value="<?php echo $this->form_encode_input($end_time) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['end_time']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['end_time']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['end_time']['date_format'];
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_end_time_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_end_time_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['recurrence']))
   {
       $this->nm_new_label['recurrence'] = "Recurrencia";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $recurrence = $this->recurrence;
   $sStyleHidden_recurrence = '';
   if (isset($this->nmgp_cmp_hidden['recurrence']) && $this->nmgp_cmp_hidden['recurrence'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['recurrence']);
       $sStyleHidden_recurrence = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_recurrence = 'display: none;';
   $sStyleReadInp_recurrence = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['recurrence']) && $this->nmgp_cmp_readonly['recurrence'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['recurrence']);
       $sStyleReadLab_recurrence = '';
       $sStyleReadInp_recurrence = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['recurrence']) && $this->nmgp_cmp_hidden['recurrence'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="recurrence" value="<?php echo $this->form_encode_input($this->recurrence) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_recurrence_label" id="hidden_field_label_recurrence" style="<?php echo $sStyleHidden_recurrence; ?>"><span id="id_label_recurrence"><?php echo $this->nm_new_label['recurrence']; ?></span></TD>
    <TD class="scFormDataOdd css_recurrence_line" id="hidden_field_data_recurrence" style="<?php echo $sStyleHidden_recurrence; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_recurrence_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["recurrence"]) &&  $this->nmgp_cmp_readonly["recurrence"] == "on") { 

$recurrence_look = "";
 if ($this->recurrence == "Y") { $recurrence_look .= "" . $this->Ini->Nm_lang['lang_peri_yes'] . "" ;} 
 if ($this->recurrence == "N") { $recurrence_look .= "" . $this->Ini->Nm_lang['lang_peri_no'] . "" ;} 
 if (empty($recurrence_look)) { $recurrence_look = $this->recurrence; }
?>
<input type="hidden" name="recurrence" value="<?php echo $this->form_encode_input($recurrence) . "\">" . $recurrence_look . ""; ?>
<?php } else { ?>
<?php

$recurrence_look = "";
 if ($this->recurrence == "Y") { $recurrence_look .= "" . $this->Ini->Nm_lang['lang_peri_yes'] . "" ;} 
 if ($this->recurrence == "N") { $recurrence_look .= "" . $this->Ini->Nm_lang['lang_peri_no'] . "" ;} 
 if (empty($recurrence_look)) { $recurrence_look = $this->recurrence; }
?>
<span id="id_read_on_recurrence" class="css_recurrence_line"  style="<?php echo $sStyleReadLab_recurrence; ?>"><?php echo $this->form_encode_input($recurrence_look); ?></span><span id="id_read_off_recurrence" style="<?php echo $sStyleReadInp_recurrence; ?>">
 <span id="idAjaxSelect_recurrence"><select class="sc-js-input scFormObjectOdd css_recurrence_obj" style="" id="id_sc_field_recurrence" name="recurrence" size="1" alt="{type: 'select', enterTab: false}">
 <option value="Y" <?php  if ($this->recurrence == "Y") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_peri_yes']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup_recurrence'][] = 'Y'; ?>
 <option value="N" <?php  if ($this->recurrence == "N") { echo " selected" ;} ?><?php  if (empty($this->recurrence)) { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_peri_no']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup_recurrence'][] = 'N'; ?>
 </select></span>
</span><?php  }?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_recurrence_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_recurrence_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['period']))
   {
       $this->nm_new_label['period'] = "Período";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $period = $this->period;
   $sStyleHidden_period = '';
   if (isset($this->nmgp_cmp_hidden['period']) && $this->nmgp_cmp_hidden['period'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['period']);
       $sStyleHidden_period = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_period = 'display: none;';
   $sStyleReadInp_period = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['period']) && $this->nmgp_cmp_readonly['period'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['period']);
       $sStyleReadLab_period = '';
       $sStyleReadInp_period = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['period']) && $this->nmgp_cmp_hidden['period'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="period" value="<?php echo $this->form_encode_input($this->period) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_period_label" id="hidden_field_label_period" style="<?php echo $sStyleHidden_period; ?>"><span id="id_label_period"><?php echo $this->nm_new_label['period']; ?></span></TD>
    <TD class="scFormDataOdd css_period_line" id="hidden_field_data_period" style="<?php echo $sStyleHidden_period; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_period_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["period"]) &&  $this->nmgp_cmp_readonly["period"] == "on") { 

$period_look = "";
 if ($this->period == "D") { $period_look .= "" . $this->Ini->Nm_lang['lang_recu_daily'] . "" ;} 
 if ($this->period == "W") { $period_look .= "" . $this->Ini->Nm_lang['lang_recu_weekly'] . "" ;} 
 if ($this->period == "A") { $period_look .= "" . $this->Ini->Nm_lang['lang_recu_annual'] . "" ;} 
 if (empty($period_look)) { $period_look = $this->period; }
?>
<input type="hidden" name="period" value="<?php echo $this->form_encode_input($period) . "\">" . $period_look . ""; ?>
<?php } else { ?>
<?php

$period_look = "";
 if ($this->period == "D") { $period_look .= "" . $this->Ini->Nm_lang['lang_recu_daily'] . "" ;} 
 if ($this->period == "W") { $period_look .= "" . $this->Ini->Nm_lang['lang_recu_weekly'] . "" ;} 
 if ($this->period == "A") { $period_look .= "" . $this->Ini->Nm_lang['lang_recu_annual'] . "" ;} 
 if (empty($period_look)) { $period_look = $this->period; }
?>
<span id="id_read_on_period" class="css_period_line"  style="<?php echo $sStyleReadLab_period; ?>"><?php echo $this->form_encode_input($period_look); ?></span><span id="id_read_off_period" style="<?php echo $sStyleReadInp_period; ?>">
 <span id="idAjaxSelect_period"><select class="sc-js-input scFormObjectOdd css_period_obj" style="" id="id_sc_field_period" name="period" size="1" alt="{type: 'select', enterTab: false}">
 <option value="D" <?php  if ($this->period == "D") { echo " selected" ;} ?><?php  if (empty($this->period)) { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_recu_daily']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup_period'][] = 'D'; ?>
 <option value="W" <?php  if ($this->period == "W") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_recu_weekly']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup_period'][] = 'W'; ?>
 <option value="A" <?php  if ($this->period == "A") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_recu_annual']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup_period'][] = 'A'; ?>
 </select></span>
</span><?php  }?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_period_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_period_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['__calend_all_day__']))
   {
       $this->nm_new_label['__calend_all_day__'] = "" . $this->Ini->Nm_lang['lang_per_allday'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $__calend_all_day__ = $this->__calend_all_day__;
   $sStyleHidden___calend_all_day__ = '';
   if (isset($this->nmgp_cmp_hidden['__calend_all_day__']) && $this->nmgp_cmp_hidden['__calend_all_day__'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['__calend_all_day__']);
       $sStyleHidden___calend_all_day__ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab___calend_all_day__ = 'display: none;';
   $sStyleReadInp___calend_all_day__ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['__calend_all_day__']) && $this->nmgp_cmp_readonly['__calend_all_day__'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['__calend_all_day__']);
       $sStyleReadLab___calend_all_day__ = '';
       $sStyleReadInp___calend_all_day__ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['__calend_all_day__']) && $this->nmgp_cmp_hidden['__calend_all_day__'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="__calend_all_day__" value="<?php echo $this->form_encode_input($this->__calend_all_day__) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->__calend_all_day___1 = explode(";", trim($this->__calend_all_day__));
  } 
  else
  {
      if (empty($this->__calend_all_day__))
      {
          $this->__calend_all_day___1= array(); 
          $this->__calend_all_day__= "";
      } 
      else
      {
          $this->__calend_all_day___1= $this->__calend_all_day__; 
          $this->__calend_all_day__= ""; 
          foreach ($this->__calend_all_day___1 as $cada___calend_all_day__)
          {
             if (!empty($__calend_all_day__))
             {
                 $this->__calend_all_day__.= ";"; 
             } 
             $this->__calend_all_day__.= $cada___calend_all_day__; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css___calend_all_day___label" id="hidden_field_label___calend_all_day__" style="<?php echo $sStyleHidden___calend_all_day__; ?>"><span id="id_label___calend_all_day__"><?php echo $this->nm_new_label['__calend_all_day__']; ?></span></TD>
    <TD class="scFormDataOdd css___calend_all_day___line" id="hidden_field_data___calend_all_day__" style="<?php echo $sStyleHidden___calend_all_day__; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css___calend_all_day___line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["__calend_all_day__"]) &&  $this->nmgp_cmp_readonly["__calend_all_day__"] == "on") { 

$__calend_all_day___look = "";
 if ($this->__calend_all_day__ == "Y") { $__calend_all_day___look .= "" . $this->Ini->Nm_lang['lang_per_allday'] . "" ;} 
 if (empty($__calend_all_day___look)) { $__calend_all_day___look = $this->__calend_all_day__; }
?>
<input type="hidden" name="__calend_all_day__" value="<?php echo $this->form_encode_input($__calend_all_day__) . "\">" . $__calend_all_day___look . ""; ?>
<?php } else { ?>

<?php

$__calend_all_day___look = "";
 if ($this->__calend_all_day__ == "Y") { $__calend_all_day___look .= "" . $this->Ini->Nm_lang['lang_per_allday'] . "" ;} 
 if (empty($__calend_all_day___look)) { $__calend_all_day___look = $this->__calend_all_day__; }
?>
<span id="id_read_on___calend_all_day__" class="css___calend_all_day___line" style="<?php echo $sStyleReadLab___calend_all_day__; ?>"><?php echo $this->form_encode_input($__calend_all_day___look); ?></span><span id="id_read_off___calend_all_day__" style="<?php echo $sStyleReadInp___calend_all_day__; ?>"><?php echo "<div id=\"idAjaxCheckbox___calend_all_day__\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css___calend_all_day___line"> <input type=checkbox class="sc-ui-checkbox-__calend_all_day__ sc-ui-checkbox-__calend_all_day__" name="__calend_all_day__[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['Lookup___calend_all_day__'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->__calend_all_day___1))  { echo " checked" ;} ?> onClick="sc___calend_all_day___onclick()" style="float:left; position:relative; top: -3px;"><?php echo $this->Ini->Nm_lang['lang_per_allday']; ?></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display___calend_all_day___frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display___calend_all_day___text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['login']))
    {
        $this->nm_new_label['login'] = "Login";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $login = $this->login;
   if (!isset($this->nmgp_cmp_hidden['login']))
   {
       $this->nmgp_cmp_hidden['login'] = 'off';
   }
   $sStyleHidden_login = '';
   if (isset($this->nmgp_cmp_hidden['login']) && $this->nmgp_cmp_hidden['login'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['login']);
       $sStyleHidden_login = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_login = 'display: none;';
   $sStyleReadInp_login = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['login']) && $this->nmgp_cmp_readonly['login'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['login']);
       $sStyleReadLab_login = '';
       $sStyleReadInp_login = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['login']) && $this->nmgp_cmp_hidden['login'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="login" value="<?php echo $this->form_encode_input($login) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_login_label" id="hidden_field_label_login" style="<?php echo $sStyleHidden_login; ?>"><span id="id_label_login"><?php echo $this->nm_new_label['login']; ?></span></TD>
    <TD class="scFormDataOdd css_login_line" id="hidden_field_data_login" style="<?php echo $sStyleHidden_login; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_login_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["login"]) &&  $this->nmgp_cmp_readonly["login"] == "on") { 

 ?>
<input type="hidden" name="login" value="<?php echo $this->form_encode_input($login) . "\">" . $login . ""; ?>
<?php } else { ?>
<span id="id_read_on_login" class="sc-ui-readonly-login css_login_line" style="<?php echo $sStyleReadLab_login; ?>"><?php echo $this->form_encode_input($this->login); ?></span><span id="id_read_off_login" style="white-space: nowrap;<?php echo $sStyleReadInp_login; ?>">
 <input class="sc-js-input scFormObjectOdd css_login_obj" style="" id="id_sc_field_login" type=text name="login" value="<?php echo $this->form_encode_input($login) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_login_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_login_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
<?php
  }
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
       <?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if ($NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_1";
        echo "<img id=\"NM_sep_1\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
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
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['run_iframe'] != "R")
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['masterValue']);
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
 parent.scAjaxDetailStatus("calendar_calendar");
 parent.scAjaxDetailHeight("calendar_calendar", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("calendar_calendar", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("calendar_calendar", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_calendar']['sc_modal'])
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
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
</body> 
</html> 
