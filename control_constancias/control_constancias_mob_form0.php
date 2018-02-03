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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . ""); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>control_constancias/control_constancias_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("control_constancias_mob_sajax_js.php");
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

include_once('control_constancias_mob_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  addAutocomplete(this);

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

 function addAutocomplete(elem) {


  $(".sc-ui-autocomp-estudiante", elem).focus(function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).blur(function() {
   var sId = $(this).attr("id").substr(6), sRow = "estudiante" != sId ? sId.substr(10) : "";
   if ("" == $(this).val()) {
    $("#id_sc_field_" + sId).val("");
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).autocomplete({
   source: function (request, response) {
    $.ajax({
     url: "control_constancias_mob.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_parms: "NM_ajax_opcao?#?autocomp_estudiante",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      response(data);
     }
    });
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'estudiante' != sId ? sId.substr(10) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   }
  });
  $.ui.autocomplete.prototype._renderItem = function (ul, item) {
   return $("<li></li>")
    .data("item.autocomplete", item)
    .append("<a>" + item.label + " (" + item.value + ")</a>")
    .appendTo(ul);
  };
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['recarga'];
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
 include_once("control_constancias_mob_js0.php");
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
               action="control_constancias_mob.php" 
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
$_SESSION['scriptcase']['error_span_title']['control_constancias_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['control_constancias_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="50%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . ""; } ?></span></td>
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['empty_filter'] = true;
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
   if (!isset($this->nm_new_label['anyo']))
   {
       $this->nm_new_label['anyo'] = "Año";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anyo = $this->anyo;
   $sStyleHidden_anyo = '';
   if (isset($this->nmgp_cmp_hidden['anyo']) && $this->nmgp_cmp_hidden['anyo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anyo']);
       $sStyleHidden_anyo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anyo = 'display: none;';
   $sStyleReadInp_anyo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anyo']) && $this->nmgp_cmp_readonly['anyo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anyo']);
       $sStyleReadLab_anyo = '';
       $sStyleReadInp_anyo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anyo']) && $this->nmgp_cmp_hidden['anyo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="anyo" value="<?php echo $this->form_encode_input($this->anyo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anyo_line" id="hidden_field_data_anyo" style="<?php echo $sStyleHidden_anyo; ?>"> <span class="scFormLabelOddFormat css_anyo_label"><span id="id_label_anyo"><?php echo $this->nm_new_label['anyo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anyo"]) &&  $this->nmgp_cmp_readonly["anyo"] == "on") { 

$anyo_look = "";
 if ($this->anyo == "2009") { $anyo_look .= "2009" ;} 
 if ($this->anyo == "2010") { $anyo_look .= "2010" ;} 
 if ($this->anyo == "2011") { $anyo_look .= "2011" ;} 
 if ($this->anyo == "2012") { $anyo_look .= "2012" ;} 
 if ($this->anyo == "2013") { $anyo_look .= "2013" ;} 
 if ($this->anyo == "2014") { $anyo_look .= "2014" ;} 
 if ($this->anyo == "2015") { $anyo_look .= "2015" ;} 
 if ($this->anyo == "2016") { $anyo_look .= "2016" ;} 
 if ($this->anyo == "2017") { $anyo_look .= "2017" ;} 
 if ($this->anyo == "2018") { $anyo_look .= "2018" ;} 
 if ($this->anyo == "2019") { $anyo_look .= "2019" ;} 
 if ($this->anyo == "2020") { $anyo_look .= "2020" ;} 
 if (empty($anyo_look)) { $anyo_look = $this->anyo; }
?>
<input type="hidden" name="anyo" value="<?php echo $this->form_encode_input($anyo) . "\">" . $anyo_look . ""; ?>
<?php } else { ?>
<?php

$anyo_look = "";
 if ($this->anyo == "2009") { $anyo_look .= "2009" ;} 
 if ($this->anyo == "2010") { $anyo_look .= "2010" ;} 
 if ($this->anyo == "2011") { $anyo_look .= "2011" ;} 
 if ($this->anyo == "2012") { $anyo_look .= "2012" ;} 
 if ($this->anyo == "2013") { $anyo_look .= "2013" ;} 
 if ($this->anyo == "2014") { $anyo_look .= "2014" ;} 
 if ($this->anyo == "2015") { $anyo_look .= "2015" ;} 
 if ($this->anyo == "2016") { $anyo_look .= "2016" ;} 
 if ($this->anyo == "2017") { $anyo_look .= "2017" ;} 
 if ($this->anyo == "2018") { $anyo_look .= "2018" ;} 
 if ($this->anyo == "2019") { $anyo_look .= "2019" ;} 
 if ($this->anyo == "2020") { $anyo_look .= "2020" ;} 
 if (empty($anyo_look)) { $anyo_look = $this->anyo; }
?>
<span id="id_read_on_anyo" class="css_anyo_line"  style="<?php echo $sStyleReadLab_anyo; ?>"><?php echo $this->form_encode_input($anyo_look); ?></span><span id="id_read_off_anyo" style="<?php echo $sStyleReadInp_anyo; ?>">
 <span id="idAjaxSelect_anyo"><select class="sc-js-input scFormObjectOdd css_anyo_obj" style="" id="id_sc_field_anyo" name="anyo" size="1" alt="{type: 'select', enterTab: false}">
 <option value="2009" <?php  if ($this->anyo == "2009") { echo " selected" ;} ?>>2009</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2009'; ?>
 <option value="2010" <?php  if ($this->anyo == "2010") { echo " selected" ;} ?>>2010</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2010'; ?>
 <option value="2011" <?php  if ($this->anyo == "2011") { echo " selected" ;} ?>>2011</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2011'; ?>
 <option value="2012" <?php  if ($this->anyo == "2012") { echo " selected" ;} ?>>2012</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2012'; ?>
 <option value="2013" <?php  if ($this->anyo == "2013") { echo " selected" ;} ?>>2013</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2013'; ?>
 <option value="2014" <?php  if ($this->anyo == "2014") { echo " selected" ;} ?>>2014</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2014'; ?>
 <option value="2015" <?php  if ($this->anyo == "2015") { echo " selected" ;} ?>>2015</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2015'; ?>
 <option value="2016" <?php  if ($this->anyo == "2016") { echo " selected" ;} ?>>2016</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2016'; ?>
 <option value="2017" <?php  if ($this->anyo == "2017") { echo " selected" ;} ?>>2017</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2017'; ?>
 <option value="2018" <?php  if ($this->anyo == "2018") { echo " selected" ;} ?>>2018</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2018'; ?>
 <option value="2019" <?php  if ($this->anyo == "2019") { echo " selected" ;} ?>>2019</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2019'; ?>
 <option value="2020" <?php  if ($this->anyo == "2020") { echo " selected" ;} ?>>2020</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_anyo'][] = '2020'; ?>
 </select></span>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sede']))
   {
       $this->nm_new_label['sede'] = "Sede";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sede = $this->sede;
   $sStyleHidden_sede = '';
   if (isset($this->nmgp_cmp_hidden['sede']) && $this->nmgp_cmp_hidden['sede'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sede']);
       $sStyleHidden_sede = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sede = 'display: none;';
   $sStyleReadInp_sede = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sede']) && $this->nmgp_cmp_readonly['sede'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sede']);
       $sStyleReadLab_sede = '';
       $sStyleReadInp_sede = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sede']) && $this->nmgp_cmp_hidden['sede'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sede" value="<?php echo $this->form_encode_input($this->sede) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sede_line" id="hidden_field_data_sede" style="<?php echo $sStyleHidden_sede; ?>"> <span class="scFormLabelOddFormat css_sede_label"><span id="id_label_sede"><?php echo $this->nm_new_label['sede']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sede"]) &&  $this->nmgp_cmp_readonly["sede"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'] = array(); 
    }

   $old_value_estudiante = $this->estudiante;
   $this->nm_tira_formatacao();


   $unformatted_value_estudiante = $this->estudiante;

   $nm_comando = "SELECT id_sede, sede 
FROM sedes 
ORDER BY sede";

   $this->estudiante = $old_value_estudiante;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'][] = $rs->fields[0];
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
   $sede_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sede_1))
          {
              foreach ($this->sede_1 as $tmp_sede)
              {
                  if (trim($tmp_sede) === trim($cadaselect[1])) { $sede_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sede) === trim($cadaselect[1])) { $sede_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="sede" value="<?php echo $this->form_encode_input($sede) . "\">" . $sede_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'] = array(); 
    }

   $old_value_estudiante = $this->estudiante;
   $this->nm_tira_formatacao();


   $unformatted_value_estudiante = $this->estudiante;

   $nm_comando = "SELECT id_sede, sede 
FROM sedes 
ORDER BY sede";

   $this->estudiante = $old_value_estudiante;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'][] = $rs->fields[0];
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
   $sede_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sede_1))
          {
              foreach ($this->sede_1 as $tmp_sede)
              {
                  if (trim($tmp_sede) === trim($cadaselect[1])) { $sede_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sede) === trim($cadaselect[1])) { $sede_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($sede_look))
          {
              $sede_look = $this->sede;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_sede\" class=\"css_sede_line\" style=\"" .  $sStyleReadLab_sede . "\">" . $this->form_encode_input($sede_look) . "</span><span id=\"id_read_off_sede\" style=\"" . $sStyleReadInp_sede . "\">";
   echo " <span id=\"idAjaxSelect_sede\"><select class=\"sc-js-input scFormObjectOdd css_sede_obj\" style=\"\" id=\"id_sc_field_sede\" name=\"sede\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_sede'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sede) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sede)) 
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
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['jornada']))
   {
       $this->nm_new_label['jornada'] = "Jornada";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jornada = $this->jornada;
   $sStyleHidden_jornada = '';
   if (isset($this->nmgp_cmp_hidden['jornada']) && $this->nmgp_cmp_hidden['jornada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jornada']);
       $sStyleHidden_jornada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jornada = 'display: none;';
   $sStyleReadInp_jornada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jornada']) && $this->nmgp_cmp_readonly['jornada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jornada']);
       $sStyleReadLab_jornada = '';
       $sStyleReadInp_jornada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jornada']) && $this->nmgp_cmp_hidden['jornada'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="jornada" value="<?php echo $this->form_encode_input($this->jornada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jornada_line" id="hidden_field_data_jornada" style="<?php echo $sStyleHidden_jornada; ?>"> <span class="scFormLabelOddFormat css_jornada_label"><span id="id_label_jornada"><?php echo $this->nm_new_label['jornada']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jornada"]) &&  $this->nmgp_cmp_readonly["jornada"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'] = array(); 
    }

   $old_value_estudiante = $this->estudiante;
   $this->nm_tira_formatacao();


   $unformatted_value_estudiante = $this->estudiante;

   $nm_comando = "SELECT id_jornada, jornada 
FROM jornadas 
ORDER BY jornada";

   $this->estudiante = $old_value_estudiante;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'][] = $rs->fields[0];
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
   $jornada_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->jornada_1))
          {
              foreach ($this->jornada_1 as $tmp_jornada)
              {
                  if (trim($tmp_jornada) === trim($cadaselect[1])) { $jornada_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->jornada) === trim($cadaselect[1])) { $jornada_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="jornada" value="<?php echo $this->form_encode_input($jornada) . "\">" . $jornada_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'] = array(); 
    }

   $old_value_estudiante = $this->estudiante;
   $this->nm_tira_formatacao();


   $unformatted_value_estudiante = $this->estudiante;

   $nm_comando = "SELECT id_jornada, jornada 
FROM jornadas 
ORDER BY jornada";

   $this->estudiante = $old_value_estudiante;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'][] = $rs->fields[0];
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
   $jornada_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->jornada_1))
          {
              foreach ($this->jornada_1 as $tmp_jornada)
              {
                  if (trim($tmp_jornada) === trim($cadaselect[1])) { $jornada_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->jornada) === trim($cadaselect[1])) { $jornada_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($jornada_look))
          {
              $jornada_look = $this->jornada;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_jornada\" class=\"css_jornada_line\" style=\"" .  $sStyleReadLab_jornada . "\">" . $this->form_encode_input($jornada_look) . "</span><span id=\"id_read_off_jornada\" style=\"" . $sStyleReadInp_jornada . "\">";
   echo " <span id=\"idAjaxSelect_jornada\"><select class=\"sc-js-input scFormObjectOdd css_jornada_obj\" style=\"\" id=\"id_sc_field_jornada\" name=\"jornada\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_jornada'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->jornada) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->jornada)) 
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
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['grado']))
   {
       $this->nm_new_label['grado'] = "Grado";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $grado = $this->grado;
   $sStyleHidden_grado = '';
   if (isset($this->nmgp_cmp_hidden['grado']) && $this->nmgp_cmp_hidden['grado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['grado']);
       $sStyleHidden_grado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_grado = 'display: none;';
   $sStyleReadInp_grado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['grado']) && $this->nmgp_cmp_readonly['grado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['grado']);
       $sStyleReadLab_grado = '';
       $sStyleReadInp_grado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['grado']) && $this->nmgp_cmp_hidden['grado'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="grado" value="<?php echo $this->form_encode_input($this->grado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_grado_line" id="hidden_field_data_grado" style="<?php echo $sStyleHidden_grado; ?>"> <span class="scFormLabelOddFormat css_grado_label"><span id="id_label_grado"><?php echo $this->nm_new_label['grado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["grado"]) &&  $this->nmgp_cmp_readonly["grado"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'] = array(); 
    }

   $old_value_estudiante = $this->estudiante;
   $this->nm_tira_formatacao();


   $unformatted_value_estudiante = $this->estudiante;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
ORDER BY grado";

   $this->estudiante = $old_value_estudiante;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'][] = $rs->fields[0];
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
   $grado_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grado_1))
          {
              foreach ($this->grado_1 as $tmp_grado)
              {
                  if (trim($tmp_grado) === trim($cadaselect[1])) { $grado_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grado) === trim($cadaselect[1])) { $grado_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="grado" value="<?php echo $this->form_encode_input($grado) . "\">" . $grado_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'] = array(); 
    }

   $old_value_estudiante = $this->estudiante;
   $this->nm_tira_formatacao();


   $unformatted_value_estudiante = $this->estudiante;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
ORDER BY grado";

   $this->estudiante = $old_value_estudiante;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'][] = $rs->fields[0];
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
   $grado_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grado_1))
          {
              foreach ($this->grado_1 as $tmp_grado)
              {
                  if (trim($tmp_grado) === trim($cadaselect[1])) { $grado_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grado) === trim($cadaselect[1])) { $grado_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($grado_look))
          {
              $grado_look = $this->grado;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_grado\" class=\"css_grado_line\" style=\"" .  $sStyleReadLab_grado . "\">" . $this->form_encode_input($grado_look) . "</span><span id=\"id_read_off_grado\" style=\"" . $sStyleReadInp_grado . "\">";
   echo " <span id=\"idAjaxSelect_grado\"><select class=\"sc-js-input scFormObjectOdd css_grado_obj\" style=\"\" id=\"id_sc_field_grado\" name=\"grado\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grado'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->grado) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->grado)) 
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
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['grupo']))
   {
       $this->nm_new_label['grupo'] = "Grupo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $grupo = $this->grupo;
   $sStyleHidden_grupo = '';
   if (isset($this->nmgp_cmp_hidden['grupo']) && $this->nmgp_cmp_hidden['grupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['grupo']);
       $sStyleHidden_grupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_grupo = 'display: none;';
   $sStyleReadInp_grupo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['grupo']) && $this->nmgp_cmp_readonly['grupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['grupo']);
       $sStyleReadLab_grupo = '';
       $sStyleReadInp_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['grupo']) && $this->nmgp_cmp_hidden['grupo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="grupo" value="<?php echo $this->form_encode_input($this->grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_grupo_line" id="hidden_field_data_grupo" style="<?php echo $sStyleHidden_grupo; ?>"> <span class="scFormLabelOddFormat css_grupo_label"><span id="id_label_grupo"><?php echo $this->nm_new_label['grupo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["grupo"]) &&  $this->nmgp_cmp_readonly["grupo"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'] = array(); 
    }

   $old_value_estudiante = $this->estudiante;
   $this->nm_tira_formatacao();


   $unformatted_value_estudiante = $this->estudiante;

   $nm_comando = "SELECT id_grupo, nombre_grupo 
FROM t_grupos 
ORDER BY nombre_grupo";

   $this->estudiante = $old_value_estudiante;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'][] = $rs->fields[0];
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
   $grupo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grupo_1))
          {
              foreach ($this->grupo_1 as $tmp_grupo)
              {
                  if (trim($tmp_grupo) === trim($cadaselect[1])) { $grupo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grupo) === trim($cadaselect[1])) { $grupo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="grupo" value="<?php echo $this->form_encode_input($grupo) . "\">" . $grupo_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'] = array(); 
    }

   $old_value_estudiante = $this->estudiante;
   $this->nm_tira_formatacao();


   $unformatted_value_estudiante = $this->estudiante;

   $nm_comando = "SELECT id_grupo, nombre_grupo 
FROM t_grupos 
ORDER BY nombre_grupo";

   $this->estudiante = $old_value_estudiante;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'][] = $rs->fields[0];
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
   $grupo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grupo_1))
          {
              foreach ($this->grupo_1 as $tmp_grupo)
              {
                  if (trim($tmp_grupo) === trim($cadaselect[1])) { $grupo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grupo) === trim($cadaselect[1])) { $grupo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($grupo_look))
          {
              $grupo_look = $this->grupo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_grupo\" class=\"css_grupo_line\" style=\"" .  $sStyleReadLab_grupo . "\">" . $this->form_encode_input($grupo_look) . "</span><span id=\"id_read_off_grupo\" style=\"" . $sStyleReadInp_grupo . "\">";
   echo " <span id=\"idAjaxSelect_grupo\"><select class=\"sc-js-input scFormObjectOdd css_grupo_obj\" style=\"\" id=\"id_sc_field_grupo\" name=\"grupo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_grupo'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->grupo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->grupo)) 
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
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estudiante']))
    {
        $this->nm_new_label['estudiante'] = "Estudiante";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estudiante = $this->estudiante;
   $sStyleHidden_estudiante = '';
   if (isset($this->nmgp_cmp_hidden['estudiante']) && $this->nmgp_cmp_hidden['estudiante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estudiante']);
       $sStyleHidden_estudiante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estudiante = 'display: none;';
   $sStyleReadInp_estudiante = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estudiante']) && $this->nmgp_cmp_readonly['estudiante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estudiante']);
       $sStyleReadLab_estudiante = '';
       $sStyleReadInp_estudiante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estudiante']) && $this->nmgp_cmp_hidden['estudiante'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estudiante" value="<?php echo $this->form_encode_input($estudiante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estudiante_line" id="hidden_field_data_estudiante" style="<?php echo $sStyleHidden_estudiante; ?>"> <span class="scFormLabelOddFormat css_estudiante_label"><span id="id_label_estudiante"><?php echo $this->nm_new_label['estudiante']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estudiante"]) &&  $this->nmgp_cmp_readonly["estudiante"] == "on") { 

 ?>
<input type="hidden" name="estudiante" value="<?php echo $this->form_encode_input($estudiante) . "\">" . $estudiante . ""; ?>
<?php } else { ?>

<?php
$aRecData['estudiante'] = $this->estudiante;
$aLookup = array();
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_estudiante']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_estudiante'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_estudiante']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_estudiante'] = array(); 
    }

   $old_value_estudiante = $this->estudiante;
   $this->nm_tira_formatacao();

   $this->nm_clear_val("estudiante");

   $unformatted_value_estudiante = $this->estudiante;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idstudents, concat(primer_apellido,' ', segundo_apellido,' ', primer_nombre,' ', segundo_nombre) FROM students WHERE idstudents = " . substr($this->Db->qstr($this->estudiante), 1, -1) . " ORDER BY primer_apellido, segundo_apellido, primer_nombre, segundo_nombre";
   }
   else
   {
       $nm_comando = "SELECT idstudents, primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre FROM students WHERE idstudents = " . substr($this->Db->qstr($this->estudiante), 1, -1) . " ORDER BY primer_apellido, segundo_apellido, primer_nombre, segundo_nombre";
   }

   $this->estudiante = $old_value_estudiante;

   if ('' != $this->estudiante && '' != $this->estudiante)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[0] . "" . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_estudiante'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$estudiante_look = (isset($aLookup[0][$unformatted_value_estudiante])) ? $aLookup[0][$unformatted_value_estudiante] : $this->estudiante;
?>
<span id="id_read_on_estudiante" class="sc-ui-readonly-estudiante css_estudiante_line" style="<?php echo $sStyleReadLab_estudiante; ?>"><?php echo $estudiante_look; ?></span><span id="id_read_off_estudiante" style="white-space: nowrap;<?php echo $sStyleReadInp_estudiante; ?>">
 <input class="sc-js-input scFormObjectOdd css_estudiante_obj" style="display: none;" id="id_sc_field_estudiante" type=text name="estudiante" value="<?php echo $this->form_encode_input($estudiante) ?>"
 size=10 style="display: none" alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['estudiante']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['estudiante']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php
$aRecData['estudiante'] = $this->estudiante;
$aLookup = array();
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_estudiante']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_estudiante'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_estudiante']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_estudiante'] = array(); 
    }

   $old_value_estudiante = $this->estudiante;
   $this->nm_tira_formatacao();

   $this->nm_clear_val("estudiante");

   $unformatted_value_estudiante = $this->estudiante;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idstudents, concat(primer_apellido,' ', segundo_apellido,' ', primer_nombre,' ', segundo_nombre) FROM students WHERE idstudents = " . substr($this->Db->qstr($this->estudiante), 1, -1) . " ORDER BY primer_apellido, segundo_apellido, primer_nombre, segundo_nombre";
   }
   else
   {
       $nm_comando = "SELECT idstudents, primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre FROM students WHERE idstudents = " . substr($this->Db->qstr($this->estudiante), 1, -1) . " ORDER BY primer_apellido, segundo_apellido, primer_nombre, segundo_nombre";
   }

   $this->estudiante = $old_value_estudiante;

   if ('' != $this->estudiante && '' != $this->estudiante)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[0] . "" . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['Lookup_estudiante'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$unformatted_value_estudiante])) ? $aLookup[0][$unformatted_value_estudiante] : '';
?>
<input type="text" id="id_ac_estudiante" name="estudiante_autocomp" class="scFormObjectOdd sc-ui-autocomp-estudiante css_estudiante_obj" size="40" value="<?php echo $sAutocompValue; ?>" /></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['especialidad']))
    {
        $this->nm_new_label['especialidad'] = "Especialidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $especialidad = $this->especialidad;
   $sStyleHidden_especialidad = '';
   if (isset($this->nmgp_cmp_hidden['especialidad']) && $this->nmgp_cmp_hidden['especialidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['especialidad']);
       $sStyleHidden_especialidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_especialidad = 'display: none;';
   $sStyleReadInp_especialidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['especialidad']) && $this->nmgp_cmp_readonly['especialidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['especialidad']);
       $sStyleReadLab_especialidad = '';
       $sStyleReadInp_especialidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['especialidad']) && $this->nmgp_cmp_hidden['especialidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="especialidad" value="<?php echo $this->form_encode_input($especialidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_especialidad_line" id="hidden_field_data_especialidad" style="<?php echo $sStyleHidden_especialidad; ?>"> <span class="scFormLabelOddFormat css_especialidad_label"><span id="id_label_especialidad"><?php echo $this->nm_new_label['especialidad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["especialidad"]) &&  $this->nmgp_cmp_readonly["especialidad"] == "on") { 

 ?>
<input type="hidden" name="especialidad" value="<?php echo $this->form_encode_input($especialidad) . "\">" . $especialidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_especialidad" class="sc-ui-readonly-especialidad css_especialidad_line" style="<?php echo $sStyleReadLab_especialidad; ?>"><?php echo $this->form_encode_input($this->especialidad); ?></span><span id="id_read_off_especialidad" style="white-space: nowrap;<?php echo $sStyleReadInp_especialidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_especialidad_obj" style="" id="id_sc_field_especialidad" type=text name="especialidad" value="<?php echo $this->form_encode_input($especialidad) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pri_firma']))
    {
        $this->nm_new_label['pri_firma'] = "Primera Firma";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pri_firma = $this->pri_firma;
   $sStyleHidden_pri_firma = '';
   if (isset($this->nmgp_cmp_hidden['pri_firma']) && $this->nmgp_cmp_hidden['pri_firma'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pri_firma']);
       $sStyleHidden_pri_firma = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pri_firma = 'display: none;';
   $sStyleReadInp_pri_firma = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pri_firma']) && $this->nmgp_cmp_readonly['pri_firma'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pri_firma']);
       $sStyleReadLab_pri_firma = '';
       $sStyleReadInp_pri_firma = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pri_firma']) && $this->nmgp_cmp_hidden['pri_firma'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pri_firma" value="<?php echo $this->form_encode_input($pri_firma) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pri_firma_line" id="hidden_field_data_pri_firma" style="<?php echo $sStyleHidden_pri_firma; ?>"> <span class="scFormLabelOddFormat css_pri_firma_label"><span id="id_label_pri_firma"><?php echo $this->nm_new_label['pri_firma']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pri_firma"]) &&  $this->nmgp_cmp_readonly["pri_firma"] == "on") { 

 ?>
<input type="hidden" name="pri_firma" value="<?php echo $this->form_encode_input($pri_firma) . "\">" . $pri_firma . ""; ?>
<?php } else { ?>
<span id="id_read_on_pri_firma" class="sc-ui-readonly-pri_firma css_pri_firma_line" style="<?php echo $sStyleReadLab_pri_firma; ?>"><?php echo $this->form_encode_input($this->pri_firma); ?></span><span id="id_read_off_pri_firma" style="white-space: nowrap;<?php echo $sStyleReadInp_pri_firma; ?>">
 <input class="sc-js-input scFormObjectOdd css_pri_firma_obj" style="" id="id_sc_field_pri_firma" type=text name="pri_firma" value="<?php echo $this->form_encode_input($pri_firma) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cargo_pri_firm']))
    {
        $this->nm_new_label['cargo_pri_firm'] = "Cargo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cargo_pri_firm = $this->cargo_pri_firm;
   $sStyleHidden_cargo_pri_firm = '';
   if (isset($this->nmgp_cmp_hidden['cargo_pri_firm']) && $this->nmgp_cmp_hidden['cargo_pri_firm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cargo_pri_firm']);
       $sStyleHidden_cargo_pri_firm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cargo_pri_firm = 'display: none;';
   $sStyleReadInp_cargo_pri_firm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cargo_pri_firm']) && $this->nmgp_cmp_readonly['cargo_pri_firm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cargo_pri_firm']);
       $sStyleReadLab_cargo_pri_firm = '';
       $sStyleReadInp_cargo_pri_firm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cargo_pri_firm']) && $this->nmgp_cmp_hidden['cargo_pri_firm'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cargo_pri_firm" value="<?php echo $this->form_encode_input($cargo_pri_firm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cargo_pri_firm_line" id="hidden_field_data_cargo_pri_firm" style="<?php echo $sStyleHidden_cargo_pri_firm; ?>"> <span class="scFormLabelOddFormat css_cargo_pri_firm_label"><span id="id_label_cargo_pri_firm"><?php echo $this->nm_new_label['cargo_pri_firm']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cargo_pri_firm"]) &&  $this->nmgp_cmp_readonly["cargo_pri_firm"] == "on") { 

 ?>
<input type="hidden" name="cargo_pri_firm" value="<?php echo $this->form_encode_input($cargo_pri_firm) . "\">" . $cargo_pri_firm . ""; ?>
<?php } else { ?>
<span id="id_read_on_cargo_pri_firm" class="sc-ui-readonly-cargo_pri_firm css_cargo_pri_firm_line" style="<?php echo $sStyleReadLab_cargo_pri_firm; ?>"><?php echo $this->form_encode_input($this->cargo_pri_firm); ?></span><span id="id_read_off_cargo_pri_firm" style="white-space: nowrap;<?php echo $sStyleReadInp_cargo_pri_firm; ?>">
 <input class="sc-js-input scFormObjectOdd css_cargo_pri_firm_obj" style="" id="id_sc_field_cargo_pri_firm" type=text name="cargo_pri_firm" value="<?php echo $this->form_encode_input($cargo_pri_firm) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['seg_firma']))
    {
        $this->nm_new_label['seg_firma'] = "Segunda Firma";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $seg_firma = $this->seg_firma;
   $sStyleHidden_seg_firma = '';
   if (isset($this->nmgp_cmp_hidden['seg_firma']) && $this->nmgp_cmp_hidden['seg_firma'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['seg_firma']);
       $sStyleHidden_seg_firma = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_seg_firma = 'display: none;';
   $sStyleReadInp_seg_firma = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['seg_firma']) && $this->nmgp_cmp_readonly['seg_firma'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['seg_firma']);
       $sStyleReadLab_seg_firma = '';
       $sStyleReadInp_seg_firma = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['seg_firma']) && $this->nmgp_cmp_hidden['seg_firma'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="seg_firma" value="<?php echo $this->form_encode_input($seg_firma) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_seg_firma_line" id="hidden_field_data_seg_firma" style="<?php echo $sStyleHidden_seg_firma; ?>"> <span class="scFormLabelOddFormat css_seg_firma_label"><span id="id_label_seg_firma"><?php echo $this->nm_new_label['seg_firma']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["seg_firma"]) &&  $this->nmgp_cmp_readonly["seg_firma"] == "on") { 

 ?>
<input type="hidden" name="seg_firma" value="<?php echo $this->form_encode_input($seg_firma) . "\">" . $seg_firma . ""; ?>
<?php } else { ?>
<span id="id_read_on_seg_firma" class="sc-ui-readonly-seg_firma css_seg_firma_line" style="<?php echo $sStyleReadLab_seg_firma; ?>"><?php echo $this->form_encode_input($this->seg_firma); ?></span><span id="id_read_off_seg_firma" style="white-space: nowrap;<?php echo $sStyleReadInp_seg_firma; ?>">
 <input class="sc-js-input scFormObjectOdd css_seg_firma_obj" style="" id="id_sc_field_seg_firma" type=text name="seg_firma" value="<?php echo $this->form_encode_input($seg_firma) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cargo_seg_firm']))
    {
        $this->nm_new_label['cargo_seg_firm'] = "Cargo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cargo_seg_firm = $this->cargo_seg_firm;
   $sStyleHidden_cargo_seg_firm = '';
   if (isset($this->nmgp_cmp_hidden['cargo_seg_firm']) && $this->nmgp_cmp_hidden['cargo_seg_firm'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cargo_seg_firm']);
       $sStyleHidden_cargo_seg_firm = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cargo_seg_firm = 'display: none;';
   $sStyleReadInp_cargo_seg_firm = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cargo_seg_firm']) && $this->nmgp_cmp_readonly['cargo_seg_firm'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cargo_seg_firm']);
       $sStyleReadLab_cargo_seg_firm = '';
       $sStyleReadInp_cargo_seg_firm = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cargo_seg_firm']) && $this->nmgp_cmp_hidden['cargo_seg_firm'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cargo_seg_firm" value="<?php echo $this->form_encode_input($cargo_seg_firm) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cargo_seg_firm_line" id="hidden_field_data_cargo_seg_firm" style="<?php echo $sStyleHidden_cargo_seg_firm; ?>"> <span class="scFormLabelOddFormat css_cargo_seg_firm_label"><span id="id_label_cargo_seg_firm"><?php echo $this->nm_new_label['cargo_seg_firm']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cargo_seg_firm"]) &&  $this->nmgp_cmp_readonly["cargo_seg_firm"] == "on") { 

 ?>
<input type="hidden" name="cargo_seg_firm" value="<?php echo $this->form_encode_input($cargo_seg_firm) . "\">" . $cargo_seg_firm . ""; ?>
<?php } else { ?>
<span id="id_read_on_cargo_seg_firm" class="sc-ui-readonly-cargo_seg_firm css_cargo_seg_firm_line" style="<?php echo $sStyleReadLab_cargo_seg_firm; ?>"><?php echo $this->form_encode_input($this->cargo_seg_firm); ?></span><span id="id_read_off_cargo_seg_firm" style="white-space: nowrap;<?php echo $sStyleReadInp_cargo_seg_firm; ?>">
 <input class="sc-js-input scFormObjectOdd css_cargo_seg_firm_obj" style="" id="id_sc_field_cargo_seg_firm" type=text name="cargo_seg_firm" value="<?php echo $this->form_encode_input($cargo_seg_firm) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_cargo_seg_firm_dumb = ('' == $sStyleHidden_cargo_seg_firm) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cargo_seg_firm_dumb" style="<?php echo $sStyleHidden_cargo_seg_firm_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['encabezado']))
    {
        $this->nm_new_label['encabezado'] = "Encabezado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $encabezado = $this->encabezado;
   $sStyleHidden_encabezado = '';
   if (isset($this->nmgp_cmp_hidden['encabezado']) && $this->nmgp_cmp_hidden['encabezado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['encabezado']);
       $sStyleHidden_encabezado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_encabezado = 'display: none;';
   $sStyleReadInp_encabezado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['encabezado']) && $this->nmgp_cmp_readonly['encabezado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['encabezado']);
       $sStyleReadLab_encabezado = '';
       $sStyleReadInp_encabezado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['encabezado']) && $this->nmgp_cmp_hidden['encabezado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="encabezado" value="<?php echo $this->form_encode_input($encabezado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_encabezado_line" id="hidden_field_data_encabezado" style="<?php echo $sStyleHidden_encabezado; ?>"> <span class="scFormLabelOddFormat css_encabezado_label"><span id="id_label_encabezado"><?php echo $this->nm_new_label['encabezado']; ?></span></span><br>
<?php
$encabezado_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($encabezado));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["encabezado"]) &&  $this->nmgp_cmp_readonly["encabezado"] == "on") { 

 ?>
<input type="hidden" name="encabezado" value="<?php echo $this->form_encode_input($encabezado) . "\">" . $encabezado_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_encabezado" class="sc-ui-readonly-encabezado css_encabezado_line" style="<?php echo $sStyleReadLab_encabezado; ?>"><?php echo $this->form_encode_input($encabezado_val); ?></span><span id="id_read_off_encabezado" style="white-space: nowrap;<?php echo $sStyleReadInp_encabezado; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_encabezado_obj" style="white-space: pre-wrap;" name="encabezado" id="id_sc_field_encabezado" rows="2" cols="10"
 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $encabezado; ?>
</textarea>
</span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_encabezado_dumb = ('' == $sStyleHidden_encabezado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_encabezado_dumb" style="<?php echo $sStyleHidden_encabezado_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pie_pagina']))
    {
        $this->nm_new_label['pie_pagina'] = "Pie de Página";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pie_pagina = $this->pie_pagina;
   $sStyleHidden_pie_pagina = '';
   if (isset($this->nmgp_cmp_hidden['pie_pagina']) && $this->nmgp_cmp_hidden['pie_pagina'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pie_pagina']);
       $sStyleHidden_pie_pagina = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pie_pagina = 'display: none;';
   $sStyleReadInp_pie_pagina = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pie_pagina']) && $this->nmgp_cmp_readonly['pie_pagina'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pie_pagina']);
       $sStyleReadLab_pie_pagina = '';
       $sStyleReadInp_pie_pagina = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pie_pagina']) && $this->nmgp_cmp_hidden['pie_pagina'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pie_pagina" value="<?php echo $this->form_encode_input($pie_pagina) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pie_pagina_line" id="hidden_field_data_pie_pagina" style="<?php echo $sStyleHidden_pie_pagina; ?>"> <span class="scFormLabelOddFormat css_pie_pagina_label"><span id="id_label_pie_pagina"><?php echo $this->nm_new_label['pie_pagina']; ?></span></span><br>
<?php
$pie_pagina_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($pie_pagina));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pie_pagina"]) &&  $this->nmgp_cmp_readonly["pie_pagina"] == "on") { 

 ?>
<input type="hidden" name="pie_pagina" value="<?php echo $this->form_encode_input($pie_pagina) . "\">" . $pie_pagina_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_pie_pagina" class="sc-ui-readonly-pie_pagina css_pie_pagina_line" style="<?php echo $sStyleReadLab_pie_pagina; ?>"><?php echo $this->form_encode_input($pie_pagina_val); ?></span><span id="id_read_off_pie_pagina" style="white-space: nowrap;<?php echo $sStyleReadInp_pie_pagina; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_pie_pagina_obj" style="white-space: pre-wrap;" name="pie_pagina" id="id_sc_field_pie_pagina" rows="2" cols="10"
 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $pie_pagina; ?>
</textarea>
</span><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['masterValue']);
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
 parent.scAjaxDetailStatus("control_constancias_mob");
 parent.scAjaxDetailHeight("control_constancias_mob", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("control_constancias_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("control_constancias_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_constancias_mob']['sc_modal'])
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
