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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Niveles de Desempeño"); } else { echo strip_tags("Niveles de Desempeño"); } ?></TITLE>
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
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_desempeno/form_desempeno_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_desempeno_sajax_js.php");
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
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_desempeno_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $("#hidden_bloco_1").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

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
     scQuickSearchInit(false, '');
     if (document.getElementById('SC_fast_search_t')) {
         $('#SC_fast_search_t').listen();
     }
     if (document.getElementById('SC_fast_search_t')) {
         scQuickSearchKeyUp('t', null);
     }
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if (document.getElementById('SC_fast_search_t')) {
           if ('' == sPos || 't' == sPos) {
               scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
           }
       }
     }
   }
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'height': Math.max(oInput.height(), 16) + 'px',
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
    "hidden_bloco_1": true
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['recarga'];
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
 include_once("form_desempeno_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_desempeno'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_desempeno'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="60%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Niveles de Desempeño"; } else { echo "Niveles de Desempeño"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{watermark:'<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>', watermarkClass: 'scFormToolbarInputWm', maxLength: 255}">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = ''; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_0'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_0", "sc_btn_sc_btn_0()", "sc_btn_sc_btn_0()", "sc_sc_btn_0_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes == "novo") {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_0'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_0", "sc_btn_sc_btn_0()", "sc_btn_sc_btn_0()", "sc_sc_btn_0_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R")
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['empty_filter'] = true;
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
   if (!isset($this->nm_new_label['id_grado']))
   {
       $this->nm_new_label['id_grado'] = "Grado";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_grado = $this->id_grado;
   $sStyleHidden_id_grado = '';
   if (isset($this->nmgp_cmp_hidden['id_grado']) && $this->nmgp_cmp_hidden['id_grado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_grado']);
       $sStyleHidden_id_grado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_grado = 'display: none;';
   $sStyleReadInp_id_grado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_grado']) && $this->nmgp_cmp_readonly['id_grado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_grado']);
       $sStyleReadLab_id_grado = '';
       $sStyleReadInp_id_grado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_grado']) && $this->nmgp_cmp_hidden['id_grado'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_grado" value="<?php echo $this->form_encode_input($this->id_grado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_grado_line" id="hidden_field_data_id_grado" style="<?php echo $sStyleHidden_id_grado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_grado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_grado_label"><span id="id_label_id_grado"><?php echo $this->nm_new_label['id_grado']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['id_grado']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['id_grado'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_grado"]) &&  $this->nmgp_cmp_readonly["id_grado"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'] = array(); 
    }

   $old_value_codigo = $this->codigo;
   $this->nm_tira_formatacao();


   $unformatted_value_codigo = $this->codigo;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
ORDER BY id_grado";

   $this->codigo = $old_value_codigo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'][] = $rs->fields[0];
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
   $id_grado_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_grado_1))
          {
              foreach ($this->id_grado_1 as $tmp_id_grado)
              {
                  if (trim($tmp_id_grado) === trim($cadaselect[1])) { $id_grado_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_grado) === trim($cadaselect[1])) { $id_grado_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_grado" value="<?php echo $this->form_encode_input($id_grado) . "\">" . $id_grado_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'] = array(); 
    }

   $old_value_codigo = $this->codigo;
   $this->nm_tira_formatacao();


   $unformatted_value_codigo = $this->codigo;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
ORDER BY id_grado";

   $this->codigo = $old_value_codigo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'][] = $rs->fields[0];
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
   $id_grado_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_grado_1))
          {
              foreach ($this->id_grado_1 as $tmp_id_grado)
              {
                  if (trim($tmp_id_grado) === trim($cadaselect[1])) { $id_grado_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_grado) === trim($cadaselect[1])) { $id_grado_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_grado_look))
          {
              $id_grado_look = $this->id_grado;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_grado\" class=\"css_id_grado_line\" style=\"" .  $sStyleReadLab_id_grado . "\">" . $this->form_encode_input($id_grado_look) . "</span><span id=\"id_read_off_id_grado\" style=\"" . $sStyleReadInp_id_grado . "\">";
   echo " <span id=\"idAjaxSelect_id_grado\"><select class=\"sc-js-input scFormObjectOdd css_id_grado_obj\" style=\"\" id=\"id_sc_field_id_grado\" name=\"id_grado\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_grado'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_grado) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_grado)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_grado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_grado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['periodos']))
   {
       $this->nm_new_label['periodos'] = "Periodos";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $periodos = $this->periodos;
   $sStyleHidden_periodos = '';
   if (isset($this->nmgp_cmp_hidden['periodos']) && $this->nmgp_cmp_hidden['periodos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['periodos']);
       $sStyleHidden_periodos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_periodos = 'display: none;';
   $sStyleReadInp_periodos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['periodos']) && $this->nmgp_cmp_readonly['periodos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['periodos']);
       $sStyleReadLab_periodos = '';
       $sStyleReadInp_periodos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['periodos']) && $this->nmgp_cmp_hidden['periodos'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="periodos" value="<?php echo $this->form_encode_input($this->periodos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_periodos_line" id="hidden_field_data_periodos" style="<?php echo $sStyleHidden_periodos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_periodos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_periodos_label"><span id="id_label_periodos"><?php echo $this->nm_new_label['periodos']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['periodos']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['periodos'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["periodos"]) &&  $this->nmgp_cmp_readonly["periodos"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos'] = array(); 
    }

   $old_value_codigo = $this->codigo;
   $this->nm_tira_formatacao();


   $unformatted_value_codigo = $this->codigo;

   $nm_comando = "SELECT periodos, periodos 
FROM periodos 
ORDER BY periodos";

   $this->codigo = $old_value_codigo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos'][] = $rs->fields[0];
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
   $periodos_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->periodos_1))
          {
              foreach ($this->periodos_1 as $tmp_periodos)
              {
                  if (trim($tmp_periodos) === trim($cadaselect[1])) { $periodos_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->periodos) === trim($cadaselect[1])) { $periodos_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="periodos" value="<?php echo $this->form_encode_input($periodos) . "\">" . $periodos_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos'] = array(); 
    }

   $old_value_codigo = $this->codigo;
   $this->nm_tira_formatacao();


   $unformatted_value_codigo = $this->codigo;

   $nm_comando = "SELECT periodos, periodos 
FROM periodos 
ORDER BY periodos";

   $this->codigo = $old_value_codigo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_periodos'][] = $rs->fields[0];
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
   $periodos_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->periodos_1))
          {
              foreach ($this->periodos_1 as $tmp_periodos)
              {
                  if (trim($tmp_periodos) === trim($cadaselect[1])) { $periodos_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->periodos) === trim($cadaselect[1])) { $periodos_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($periodos_look))
          {
              $periodos_look = $this->periodos;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_periodos\" class=\"css_periodos_line\" style=\"" .  $sStyleReadLab_periodos . "\">" . $this->form_encode_input($periodos_look) . "</span><span id=\"id_read_off_periodos\" style=\"" . $sStyleReadInp_periodos . "\">";
   echo " <span id=\"idAjaxSelect_periodos\"><select class=\"sc-js-input scFormObjectOdd css_periodos_obj\" style=\"\" id=\"id_sc_field_periodos\" name=\"periodos\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->periodos) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->periodos)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_periodos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_periodos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_id_grado_dumb = ('' == $sStyleHidden_id_grado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_id_grado_dumb" style="<?php echo $sStyleHidden_id_grado_dumb; ?>"></TD>
<?php $sStyleHidden_periodos_dumb = ('' == $sStyleHidden_periodos) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_periodos_dumb" style="<?php echo $sStyleHidden_periodos_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_area']))
   {
       $this->nm_new_label['id_area'] = "Area";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_area = $this->id_area;
   $sStyleHidden_id_area = '';
   if (isset($this->nmgp_cmp_hidden['id_area']) && $this->nmgp_cmp_hidden['id_area'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_area']);
       $sStyleHidden_id_area = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_area = 'display: none;';
   $sStyleReadInp_id_area = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_area']) && $this->nmgp_cmp_readonly['id_area'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_area']);
       $sStyleReadLab_id_area = '';
       $sStyleReadInp_id_area = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_area']) && $this->nmgp_cmp_hidden['id_area'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_area" value="<?php echo $this->form_encode_input($this->id_area) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_area_line" id="hidden_field_data_id_area" style="<?php echo $sStyleHidden_id_area; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_area_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_area_label"><span id="id_label_id_area"><?php echo $this->nm_new_label['id_area']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['id_area']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['id_area'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_area"]) &&  $this->nmgp_cmp_readonly["id_area"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area'] = array(); 
}
if ($this->id_grado != "")
{ 
   $this->nm_clear_val("id_grado");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area'] = array(); 
    }

   $old_value_codigo = $this->codigo;
   $this->nm_tira_formatacao();


   $unformatted_value_codigo = $this->codigo;

   $nm_comando = "SELECT
t_area.id_area,
t_area.area
FROM
t_asignatura_x_area
INNER JOIN t_area ON t_asignatura_x_area.id_area = t_area.id_area
INNER JOIN t_grados ON t_asignatura_x_area.id_grado = t_grados.id_grado
WHERE t_grados.id_grado = $this->id_grado
GROUP BY t_asignatura_x_area.id_area";

   $this->codigo = $old_value_codigo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area'][] = $rs->fields[0];
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
   $id_area_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_area_1))
          {
              foreach ($this->id_area_1 as $tmp_id_area)
              {
                  if (trim($tmp_id_area) === trim($cadaselect[1])) { $id_area_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_area) === trim($cadaselect[1])) { $id_area_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_area" value="<?php echo $this->form_encode_input($id_area) . "\">" . $id_area_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area'] = array(); 
}
if ($this->id_grado != "")
{ 
   $this->nm_clear_val("id_grado");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area'] = array(); 
    }

   $old_value_codigo = $this->codigo;
   $this->nm_tira_formatacao();


   $unformatted_value_codigo = $this->codigo;

   $nm_comando = "SELECT
t_area.id_area,
t_area.area
FROM
t_asignatura_x_area
INNER JOIN t_area ON t_asignatura_x_area.id_area = t_area.id_area
INNER JOIN t_grados ON t_asignatura_x_area.id_grado = t_grados.id_grado
WHERE t_grados.id_grado = $this->id_grado
GROUP BY t_asignatura_x_area.id_area";

   $this->codigo = $old_value_codigo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_area'][] = $rs->fields[0];
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
   $id_area_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_area_1))
          {
              foreach ($this->id_area_1 as $tmp_id_area)
              {
                  if (trim($tmp_id_area) === trim($cadaselect[1])) { $id_area_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_area) === trim($cadaselect[1])) { $id_area_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_area_look))
          {
              $id_area_look = $this->id_area;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_area\" class=\"css_id_area_line\" style=\"" .  $sStyleReadLab_id_area . "\">" . $this->form_encode_input($id_area_look) . "</span><span id=\"id_read_off_id_area\" style=\"" . $sStyleReadInp_id_area . "\">";
   echo " <span id=\"idAjaxSelect_id_area\"><select class=\"sc-js-input scFormObjectOdd css_id_area_obj\" style=\"\" id=\"id_sc_field_id_area\" name=\"id_area\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_area) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_area)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_area_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_area_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['id_asignatura']))
   {
       $this->nm_new_label['id_asignatura'] = "Asignatura";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_asignatura = $this->id_asignatura;
   $sStyleHidden_id_asignatura = '';
   if (isset($this->nmgp_cmp_hidden['id_asignatura']) && $this->nmgp_cmp_hidden['id_asignatura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_asignatura']);
       $sStyleHidden_id_asignatura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_asignatura = 'display: none;';
   $sStyleReadInp_id_asignatura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_asignatura']) && $this->nmgp_cmp_readonly['id_asignatura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_asignatura']);
       $sStyleReadLab_id_asignatura = '';
       $sStyleReadInp_id_asignatura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_asignatura']) && $this->nmgp_cmp_hidden['id_asignatura'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_asignatura" value="<?php echo $this->form_encode_input($this->id_asignatura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_asignatura_line" id="hidden_field_data_id_asignatura" style="<?php echo $sStyleHidden_id_asignatura; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_asignatura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_asignatura_label"><span id="id_label_id_asignatura"><?php echo $this->nm_new_label['id_asignatura']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['id_asignatura']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['id_asignatura'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_asignatura"]) &&  $this->nmgp_cmp_readonly["id_asignatura"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura'] = array(); 
}
if ($this->id_area != "")
{ 
   $this->nm_clear_val("id_area");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura'] = array(); 
    }

   $old_value_codigo = $this->codigo;
   $this->nm_tira_formatacao();


   $unformatted_value_codigo = $this->codigo;

   $nm_comando = "SELECT t_asignaturas.id_asignatura, t_asignaturas.asignatura 
FROM t_asignatura_x_area
INNER JOIN t_asignaturas ON t_asignatura_x_area.id_asignatura = t_asignaturas.id_asignatura
INNER JOIN t_area ON t_asignatura_x_area.id_area = t_area.id_area
WHERE t_area.id_area = $this->id_area
GROUP BY t_asignaturas.id_asignatura 
ORDER BY asignatura";

   $this->codigo = $old_value_codigo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura'][] = $rs->fields[0];
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
   $id_asignatura_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_asignatura_1))
          {
              foreach ($this->id_asignatura_1 as $tmp_id_asignatura)
              {
                  if (trim($tmp_id_asignatura) === trim($cadaselect[1])) { $id_asignatura_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_asignatura) === trim($cadaselect[1])) { $id_asignatura_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_asignatura" value="<?php echo $this->form_encode_input($id_asignatura) . "\">" . $id_asignatura_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura'] = array(); 
}
if ($this->id_area != "")
{ 
   $this->nm_clear_val("id_area");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura'] = array(); 
    }

   $old_value_codigo = $this->codigo;
   $this->nm_tira_formatacao();


   $unformatted_value_codigo = $this->codigo;

   $nm_comando = "SELECT t_asignaturas.id_asignatura, t_asignaturas.asignatura 
FROM t_asignatura_x_area
INNER JOIN t_asignaturas ON t_asignatura_x_area.id_asignatura = t_asignaturas.id_asignatura
INNER JOIN t_area ON t_asignatura_x_area.id_area = t_area.id_area
WHERE t_area.id_area = $this->id_area
GROUP BY t_asignaturas.id_asignatura 
ORDER BY asignatura";

   $this->codigo = $old_value_codigo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_asignatura'][] = $rs->fields[0];
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
   $id_asignatura_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_asignatura_1))
          {
              foreach ($this->id_asignatura_1 as $tmp_id_asignatura)
              {
                  if (trim($tmp_id_asignatura) === trim($cadaselect[1])) { $id_asignatura_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_asignatura) === trim($cadaselect[1])) { $id_asignatura_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_asignatura_look))
          {
              $id_asignatura_look = $this->id_asignatura;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_asignatura\" class=\"css_id_asignatura_line\" style=\"" .  $sStyleReadLab_id_asignatura . "\">" . $this->form_encode_input($id_asignatura_look) . "</span><span id=\"id_read_off_id_asignatura\" style=\"" . $sStyleReadInp_id_asignatura . "\">";
   echo " <span id=\"idAjaxSelect_id_asignatura\"><select class=\"sc-js-input scFormObjectOdd css_id_asignatura_obj\" style=\"\" id=\"id_sc_field_id_asignatura\" name=\"id_asignatura\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_asignatura) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_asignatura)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_asignatura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_asignatura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_id_area_dumb = ('' == $sStyleHidden_id_area) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_id_area_dumb" style="<?php echo $sStyleHidden_id_area_dumb; ?>"></TD>
<?php $sStyleHidden_id_asignatura_dumb = ('' == $sStyleHidden_id_asignatura) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_id_asignatura_dumb" style="<?php echo $sStyleHidden_id_asignatura_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['codigo']))
           {
               $this->nmgp_cmp_readonly['codigo'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['id_clas_chs']))
   {
       $this->nm_new_label['id_clas_chs'] = "Clasificación del Desempeño";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_clas_chs = $this->id_clas_chs;
   $sStyleHidden_id_clas_chs = '';
   if (isset($this->nmgp_cmp_hidden['id_clas_chs']) && $this->nmgp_cmp_hidden['id_clas_chs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_clas_chs']);
       $sStyleHidden_id_clas_chs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_clas_chs = 'display: none;';
   $sStyleReadInp_id_clas_chs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_clas_chs']) && $this->nmgp_cmp_readonly['id_clas_chs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_clas_chs']);
       $sStyleReadLab_id_clas_chs = '';
       $sStyleReadInp_id_clas_chs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_clas_chs']) && $this->nmgp_cmp_hidden['id_clas_chs'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_clas_chs" value="<?php echo $this->form_encode_input($this->id_clas_chs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_clas_chs_line" id="hidden_field_data_id_clas_chs" style="<?php echo $sStyleHidden_id_clas_chs; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_clas_chs_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_clas_chs_label"><span id="id_label_id_clas_chs"><?php echo $this->nm_new_label['id_clas_chs']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_clas_chs"]) &&  $this->nmgp_cmp_readonly["id_clas_chs"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs'] = array(); 
    }

   $old_value_codigo = $this->codigo;
   $this->nm_tira_formatacao();


   $unformatted_value_codigo = $this->codigo;

   $nm_comando = "SELECT id_saber_chs, saber 
FROM saber_chs 
ORDER BY saber";

   $this->codigo = $old_value_codigo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs'][] = $rs->fields[0];
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
   $id_clas_chs_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_clas_chs_1))
          {
              foreach ($this->id_clas_chs_1 as $tmp_id_clas_chs)
              {
                  if (trim($tmp_id_clas_chs) === trim($cadaselect[1])) { $id_clas_chs_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_clas_chs) === trim($cadaselect[1])) { $id_clas_chs_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_clas_chs" value="<?php echo $this->form_encode_input($id_clas_chs) . "\">" . $id_clas_chs_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs'] = array(); 
    }

   $old_value_codigo = $this->codigo;
   $this->nm_tira_formatacao();


   $unformatted_value_codigo = $this->codigo;

   $nm_comando = "SELECT id_saber_chs, saber 
FROM saber_chs 
ORDER BY saber";

   $this->codigo = $old_value_codigo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_id_clas_chs'][] = $rs->fields[0];
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
   $id_clas_chs_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_clas_chs_1))
          {
              foreach ($this->id_clas_chs_1 as $tmp_id_clas_chs)
              {
                  if (trim($tmp_id_clas_chs) === trim($cadaselect[1])) { $id_clas_chs_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_clas_chs) === trim($cadaselect[1])) { $id_clas_chs_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_clas_chs_look))
          {
              $id_clas_chs_look = $this->id_clas_chs;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_clas_chs\" class=\"css_id_clas_chs_line\" style=\"" .  $sStyleReadLab_id_clas_chs . "\">" . $this->form_encode_input($id_clas_chs_look) . "</span><span id=\"id_read_off_id_clas_chs\" style=\"" . $sStyleReadInp_id_clas_chs . "\">";
   echo " <span id=\"idAjaxSelect_id_clas_chs\"><select class=\"sc-js-input scFormObjectOdd css_id_clas_chs_obj\" style=\"\" id=\"id_sc_field_id_clas_chs\" name=\"id_clas_chs\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_clas_chs) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_clas_chs)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_clas_chs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_clas_chs_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['codigo']))
    {
        $this->nm_new_label['codigo'] = "Codigo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo = $this->codigo;
   $sStyleHidden_codigo = '';
   if (isset($this->nmgp_cmp_hidden['codigo']) && $this->nmgp_cmp_hidden['codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo']);
       $sStyleHidden_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo = 'display: none;';
   $sStyleReadInp_codigo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["codigo"]) &&  $this->nmgp_cmp_readonly["codigo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo']);
       $sStyleReadLab_codigo = '';
       $sStyleReadInp_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo']) && $this->nmgp_cmp_hidden['codigo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_line" id="hidden_field_data_codigo" style="<?php echo $sStyleHidden_codigo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_label"><span id="id_label_codigo"><?php echo $this->nm_new_label['codigo']; ?></span></span><br>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_codigo" css_codigo_line" style="<?php echo $sStyleReadLab_codigo; ?>"><?php echo $this->form_encode_input($this->codigo); ?></span><span id="id_read_off_codigo" style="<?php echo $sStyleReadInp_codigo; ?>"><input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">"?><span id="id_ajax_label_codigo"><?php echo nl2br($codigo); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_id_clas_chs_dumb = ('' == $sStyleHidden_id_clas_chs) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_id_clas_chs_dumb" style="<?php echo $sStyleHidden_id_clas_chs_dumb; ?>"></TD>
<?php $sStyleHidden_codigo_dumb = ('' == $sStyleHidden_codigo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_codigo_dumb" style="<?php echo $sStyleHidden_codigo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Tipos de Desempeños<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['superior']))
    {
        $this->nm_new_label['superior'] = "Indicadores de Desempeño";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $superior = $this->superior;
   $sStyleHidden_superior = '';
   if (isset($this->nmgp_cmp_hidden['superior']) && $this->nmgp_cmp_hidden['superior'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['superior']);
       $sStyleHidden_superior = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_superior = 'display: none;';
   $sStyleReadInp_superior = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['superior']) && $this->nmgp_cmp_readonly['superior'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['superior']);
       $sStyleReadLab_superior = '';
       $sStyleReadInp_superior = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['superior']) && $this->nmgp_cmp_hidden['superior'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="superior" value="<?php echo $this->form_encode_input($superior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_superior_line" id="hidden_field_data_superior" style="<?php echo $sStyleHidden_superior; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_superior_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_superior_label"><span id="id_label_superior"><?php echo $this->nm_new_label['superior']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['superior']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['superior'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$superior_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($superior));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["superior"]) &&  $this->nmgp_cmp_readonly["superior"] == "on") { 

 ?>
<input type="hidden" name="superior" value="<?php echo $this->form_encode_input($superior) . "\">" . $superior_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_superior" class="sc-ui-readonly-superior css_superior_line" style="<?php echo $sStyleReadLab_superior; ?>"><?php echo $this->form_encode_input($superior_val); ?></span><span id="id_read_off_superior" style="white-space: nowrap;<?php echo $sStyleReadInp_superior; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_superior_obj" style="white-space: pre-wrap;" name="superior" id="id_sc_field_superior" rows="2" cols="150"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $superior; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_superior_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_superior_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['copia_desem']))
   {
       $this->nm_new_label['copia_desem'] = "Copiar Desempeño";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $copia_desem = $this->copia_desem;
   $sStyleHidden_copia_desem = '';
   if (isset($this->nmgp_cmp_hidden['copia_desem']) && $this->nmgp_cmp_hidden['copia_desem'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['copia_desem']);
       $sStyleHidden_copia_desem = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_copia_desem = 'display: none;';
   $sStyleReadInp_copia_desem = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['copia_desem']) && $this->nmgp_cmp_readonly['copia_desem'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['copia_desem']);
       $sStyleReadLab_copia_desem = '';
       $sStyleReadInp_copia_desem = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['copia_desem']) && $this->nmgp_cmp_hidden['copia_desem'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="copia_desem" value="<?php echo $this->form_encode_input($this->copia_desem) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_copia_desem_line" id="hidden_field_data_copia_desem" style="<?php echo $sStyleHidden_copia_desem; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_copia_desem_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_copia_desem_label"><span id="id_label_copia_desem"><?php echo $this->nm_new_label['copia_desem']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["copia_desem"]) &&  $this->nmgp_cmp_readonly["copia_desem"] == "on") { 

$copia_desem_look = "";
 if ($this->copia_desem == "1") { $copia_desem_look .= "Copiar Desempeño" ;} 
 if ($this->copia_desem == "2") { $copia_desem_look .= "No Copiar Desempeño" ;} 
 if (empty($copia_desem_look)) { $copia_desem_look = $this->copia_desem; }
?>
<input type="hidden" name="copia_desem" value="<?php echo $this->form_encode_input($copia_desem) . "\">" . $copia_desem_look . ""; ?>
<?php } else { ?>
<?php

$copia_desem_look = "";
 if ($this->copia_desem == "1") { $copia_desem_look .= "Copiar Desempeño" ;} 
 if ($this->copia_desem == "2") { $copia_desem_look .= "No Copiar Desempeño" ;} 
 if (empty($copia_desem_look)) { $copia_desem_look = $this->copia_desem; }
?>
<span id="id_read_on_copia_desem" class="css_copia_desem_line"  style="<?php echo $sStyleReadLab_copia_desem; ?>"><?php echo $this->form_encode_input($copia_desem_look); ?></span><span id="id_read_off_copia_desem" style="<?php echo $sStyleReadInp_copia_desem; ?>">
 <span id="idAjaxSelect_copia_desem"><select class="sc-js-input scFormObjectOdd css_copia_desem_obj" style="" id="id_sc_field_copia_desem" name="copia_desem" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_copia_desem'][] = 'null'; ?>
 <option value="null">Seleccione</option>
 <option value="1" <?php  if ($this->copia_desem == "1") { echo " selected" ;} ?>>Copiar Desempeño</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_copia_desem'][] = '1'; ?>
 <option value="2" <?php  if ($this->copia_desem == "2") { echo " selected" ;} ?>>No Copiar Desempeño</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['Lookup_copia_desem'][] = '2'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_copia_desem_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_copia_desem_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['alto']))
    {
        $this->nm_new_label['alto'] = "Alto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $alto = $this->alto;
   $sStyleHidden_alto = '';
   if (isset($this->nmgp_cmp_hidden['alto']) && $this->nmgp_cmp_hidden['alto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['alto']);
       $sStyleHidden_alto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_alto = 'display: none;';
   $sStyleReadInp_alto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['alto']) && $this->nmgp_cmp_readonly['alto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['alto']);
       $sStyleReadLab_alto = '';
       $sStyleReadInp_alto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['alto']) && $this->nmgp_cmp_hidden['alto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="alto" value="<?php echo $this->form_encode_input($alto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_alto_line" id="hidden_field_data_alto" style="<?php echo $sStyleHidden_alto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_alto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_alto_label"><span id="id_label_alto"><?php echo $this->nm_new_label['alto']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['alto']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['alto'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$alto_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($alto));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["alto"]) &&  $this->nmgp_cmp_readonly["alto"] == "on") { 

 ?>
<input type="hidden" name="alto" value="<?php echo $this->form_encode_input($alto) . "\">" . $alto_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_alto" class="sc-ui-readonly-alto css_alto_line" style="<?php echo $sStyleReadLab_alto; ?>"><?php echo $this->form_encode_input($alto_val); ?></span><span id="id_read_off_alto" style="white-space: nowrap;<?php echo $sStyleReadInp_alto; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_alto_obj" style="white-space: pre-wrap;" name="alto" id="id_sc_field_alto" rows="2" cols="150"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $alto; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['basico']))
    {
        $this->nm_new_label['basico'] = "Basico";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $basico = $this->basico;
   $sStyleHidden_basico = '';
   if (isset($this->nmgp_cmp_hidden['basico']) && $this->nmgp_cmp_hidden['basico'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['basico']);
       $sStyleHidden_basico = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_basico = 'display: none;';
   $sStyleReadInp_basico = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['basico']) && $this->nmgp_cmp_readonly['basico'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['basico']);
       $sStyleReadLab_basico = '';
       $sStyleReadInp_basico = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['basico']) && $this->nmgp_cmp_hidden['basico'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="basico" value="<?php echo $this->form_encode_input($basico) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_basico_line" id="hidden_field_data_basico" style="<?php echo $sStyleHidden_basico; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_basico_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_basico_label"><span id="id_label_basico"><?php echo $this->nm_new_label['basico']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['basico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['basico'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$basico_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($basico));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["basico"]) &&  $this->nmgp_cmp_readonly["basico"] == "on") { 

 ?>
<input type="hidden" name="basico" value="<?php echo $this->form_encode_input($basico) . "\">" . $basico_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_basico" class="sc-ui-readonly-basico css_basico_line" style="<?php echo $sStyleReadLab_basico; ?>"><?php echo $this->form_encode_input($basico_val); ?></span><span id="id_read_off_basico" style="white-space: nowrap;<?php echo $sStyleReadInp_basico; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_basico_obj" style="white-space: pre-wrap;" name="basico" id="id_sc_field_basico" rows="2" cols="150"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $basico; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_basico_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_basico_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['refuerzo_academino']))
    {
        $this->nm_new_label['refuerzo_academino'] = "Refuerzo Academino";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $refuerzo_academino = $this->refuerzo_academino;
   $sStyleHidden_refuerzo_academino = '';
   if (isset($this->nmgp_cmp_hidden['refuerzo_academino']) && $this->nmgp_cmp_hidden['refuerzo_academino'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['refuerzo_academino']);
       $sStyleHidden_refuerzo_academino = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_refuerzo_academino = 'display: none;';
   $sStyleReadInp_refuerzo_academino = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['refuerzo_academino']) && $this->nmgp_cmp_readonly['refuerzo_academino'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['refuerzo_academino']);
       $sStyleReadLab_refuerzo_academino = '';
       $sStyleReadInp_refuerzo_academino = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['refuerzo_academino']) && $this->nmgp_cmp_hidden['refuerzo_academino'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="refuerzo_academino" value="<?php echo $this->form_encode_input($refuerzo_academino) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_refuerzo_academino_line" id="hidden_field_data_refuerzo_academino" style="<?php echo $sStyleHidden_refuerzo_academino; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_refuerzo_academino_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_refuerzo_academino_label"><span id="id_label_refuerzo_academino"><?php echo $this->nm_new_label['refuerzo_academino']; ?></span></span><br>
<?php
$refuerzo_academino_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($refuerzo_academino));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["refuerzo_academino"]) &&  $this->nmgp_cmp_readonly["refuerzo_academino"] == "on") { 

 ?>
<input type="hidden" name="refuerzo_academino" value="<?php echo $this->form_encode_input($refuerzo_academino) . "\">" . $refuerzo_academino_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_refuerzo_academino" class="sc-ui-readonly-refuerzo_academino css_refuerzo_academino_line" style="<?php echo $sStyleReadLab_refuerzo_academino; ?>"><?php echo $this->form_encode_input($refuerzo_academino_val); ?></span><span id="id_read_off_refuerzo_academino" style="white-space: nowrap;<?php echo $sStyleReadInp_refuerzo_academino; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_refuerzo_academino_obj" style="white-space: pre-wrap;" name="refuerzo_academino" id="id_sc_field_refuerzo_academino" rows="2" cols="150"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $refuerzo_academino; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_refuerzo_academino_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_refuerzo_academino_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bajo']))
    {
        $this->nm_new_label['bajo'] = "Bajo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bajo = $this->bajo;
   $sStyleHidden_bajo = '';
   if (isset($this->nmgp_cmp_hidden['bajo']) && $this->nmgp_cmp_hidden['bajo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bajo']);
       $sStyleHidden_bajo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bajo = 'display: none;';
   $sStyleReadInp_bajo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bajo']) && $this->nmgp_cmp_readonly['bajo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bajo']);
       $sStyleReadLab_bajo = '';
       $sStyleReadInp_bajo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bajo']) && $this->nmgp_cmp_hidden['bajo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bajo" value="<?php echo $this->form_encode_input($bajo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bajo_line" id="hidden_field_data_bajo" style="<?php echo $sStyleHidden_bajo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bajo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bajo_label"><span id="id_label_bajo"><?php echo $this->nm_new_label['bajo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['bajo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['php_cmp_required']['bajo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$bajo_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($bajo));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bajo"]) &&  $this->nmgp_cmp_readonly["bajo"] == "on") { 

 ?>
<input type="hidden" name="bajo" value="<?php echo $this->form_encode_input($bajo) . "\">" . $bajo_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_bajo" class="sc-ui-readonly-bajo css_bajo_line" style="<?php echo $sStyleReadLab_bajo; ?>"><?php echo $this->form_encode_input($bajo_val); ?></span><span id="id_read_off_bajo" style="white-space: nowrap;<?php echo $sStyleReadInp_bajo; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_bajo_obj" style="white-space: pre-wrap;" name="bajo" id="id_sc_field_bajo" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $bajo; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bajo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bajo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['recomendacion']))
    {
        $this->nm_new_label['recomendacion'] = "Recomendacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $recomendacion = $this->recomendacion;
   $sStyleHidden_recomendacion = '';
   if (isset($this->nmgp_cmp_hidden['recomendacion']) && $this->nmgp_cmp_hidden['recomendacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['recomendacion']);
       $sStyleHidden_recomendacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_recomendacion = 'display: none;';
   $sStyleReadInp_recomendacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['recomendacion']) && $this->nmgp_cmp_readonly['recomendacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['recomendacion']);
       $sStyleReadLab_recomendacion = '';
       $sStyleReadInp_recomendacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['recomendacion']) && $this->nmgp_cmp_hidden['recomendacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="recomendacion" value="<?php echo $this->form_encode_input($recomendacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_recomendacion_line" id="hidden_field_data_recomendacion" style="<?php echo $sStyleHidden_recomendacion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_recomendacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_recomendacion_label"><span id="id_label_recomendacion"><?php echo $this->nm_new_label['recomendacion']; ?></span></span><br>
<?php
$recomendacion_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($recomendacion));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["recomendacion"]) &&  $this->nmgp_cmp_readonly["recomendacion"] == "on") { 

 ?>
<input type="hidden" name="recomendacion" value="<?php echo $this->form_encode_input($recomendacion) . "\">" . $recomendacion_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_recomendacion" class="sc-ui-readonly-recomendacion css_recomendacion_line" style="<?php echo $sStyleReadLab_recomendacion; ?>"><?php echo $this->form_encode_input($recomendacion_val); ?></span><span id="id_read_off_recomendacion" style="white-space: nowrap;<?php echo $sStyleReadInp_recomendacion; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_recomendacion_obj" style="white-space: pre-wrap;" name="recomendacion" id="id_sc_field_recomendacion" rows="2" cols="150"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $recomendacion; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_recomendacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_recomendacion_text"></span></td></tr></table></td></tr></table> </TD>
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
<tr><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
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
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['masterValue']);
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
 parent.scAjaxDetailStatus("form_desempeno");
 parent.scAjaxDetailHeight("form_desempeno", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_desempeno", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_desempeno", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_desempeno']['sc_modal'])
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
