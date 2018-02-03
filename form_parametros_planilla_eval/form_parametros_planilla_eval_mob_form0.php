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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags(" - parametros_planilla_eval"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - parametros_planilla_eval"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_parametros_planilla_eval/form_parametros_planilla_eval_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_parametros_planilla_eval_mob_sajax_js.php");
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
<?php

include_once('form_parametros_planilla_eval_mob_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
  $(".scBtnGrpClick").find("a").click(function(e){
     e.preventDefault();
  });
  $(".scBtnGrpClick").click(function(){
     var aObj = $(this).find("a"), aHref = aObj.attr("href");
     if ("javascript:" == aHref.substr(0, 11)) {
        eval(aHref.substr(11));
     }
     else {
        aObj.trigger("click");
     }
   }).mouseover(function(){
     $(this).css("cursor", "pointer");
  });
  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
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
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['recarga'];
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
<?php
 include_once("form_parametros_planilla_eval_mob_js0.php");
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
               action="form_parametros_planilla_eval_mob.php" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_parametros_planilla_eval_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_parametros_planilla_eval_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo " - parametros_planilla_eval"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - parametros_planilla_eval"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['fast_search'][2] : "";
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
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
?>
<table style="border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000" id="sc_btgp_div_group_2_t">
 <tr><td class="scBtnGrpBackground">
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_sai_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "nm_move ('clone');", "nm_move ('clone');", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
?>
 </td></tr>
</table>
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['empty_filter'] = true;
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
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['modelo']))
           {
               $this->nmgp_cmp_readonly['modelo'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['modelo']))
    {
        $this->nm_new_label['modelo'] = "Modelo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $modelo = $this->modelo;
   $sStyleHidden_modelo = '';
   if (isset($this->nmgp_cmp_hidden['modelo']) && $this->nmgp_cmp_hidden['modelo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['modelo']);
       $sStyleHidden_modelo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_modelo = 'display: none;';
   $sStyleReadInp_modelo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["modelo"]) &&  $this->nmgp_cmp_readonly["modelo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['modelo']);
       $sStyleReadLab_modelo = '';
       $sStyleReadInp_modelo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['modelo']) && $this->nmgp_cmp_hidden['modelo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="modelo" value="<?php echo $this->form_encode_input($modelo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_modelo_line" id="hidden_field_data_modelo" style="<?php echo $sStyleHidden_modelo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_modelo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_modelo_label"><span id="id_label_modelo"><?php echo $this->nm_new_label['modelo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['php_cmp_required']['modelo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['php_cmp_required']['modelo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["modelo"]) &&  $this->nmgp_cmp_readonly["modelo"] == "on")) { 

 ?>
<input type="hidden" name="modelo" value="<?php echo $this->form_encode_input($modelo) . "\"><span id=\"id_ajax_label_modelo\">" . $modelo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_modelo" class="sc-ui-readonly-modelo css_modelo_line" style="<?php echo $sStyleReadLab_modelo; ?>"><?php echo $this->form_encode_input($this->modelo); ?></span><span id="id_read_off_modelo" style="white-space: nowrap;<?php echo $sStyleReadInp_modelo; ?>">
 <input class="sc-js-input scFormObjectOdd css_modelo_obj" style="" id="id_sc_field_modelo" type=text name="modelo" value="<?php echo $this->form_encode_input($modelo) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modelo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modelo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['uno']))
    {
        $this->nm_new_label['uno'] = "Uno";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $uno = $this->uno;
   $sStyleHidden_uno = '';
   if (isset($this->nmgp_cmp_hidden['uno']) && $this->nmgp_cmp_hidden['uno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['uno']);
       $sStyleHidden_uno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_uno = 'display: none;';
   $sStyleReadInp_uno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['uno']) && $this->nmgp_cmp_readonly['uno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['uno']);
       $sStyleReadLab_uno = '';
       $sStyleReadInp_uno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['uno']) && $this->nmgp_cmp_hidden['uno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="uno" value="<?php echo $this->form_encode_input($uno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_uno_line" id="hidden_field_data_uno" style="<?php echo $sStyleHidden_uno; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_uno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_uno_label"><span id="id_label_uno"><?php echo $this->nm_new_label['uno']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["uno"]) &&  $this->nmgp_cmp_readonly["uno"] == "on") { 

 ?>
<input type="hidden" name="uno" value="<?php echo $this->form_encode_input($uno) . "\">" . $uno . ""; ?>
<?php } else { ?>
<span id="id_read_on_uno" class="sc-ui-readonly-uno css_uno_line" style="<?php echo $sStyleReadLab_uno; ?>"><?php echo $this->form_encode_input($this->uno); ?></span><span id="id_read_off_uno" style="white-space: nowrap;<?php echo $sStyleReadInp_uno; ?>">
 <input class="sc-js-input scFormObjectOdd css_uno_obj" style="" id="id_sc_field_uno" type=text name="uno" value="<?php echo $this->form_encode_input($uno) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_uno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_uno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dos']))
    {
        $this->nm_new_label['dos'] = "Dos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dos = $this->dos;
   $sStyleHidden_dos = '';
   if (isset($this->nmgp_cmp_hidden['dos']) && $this->nmgp_cmp_hidden['dos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dos']);
       $sStyleHidden_dos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dos = 'display: none;';
   $sStyleReadInp_dos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dos']) && $this->nmgp_cmp_readonly['dos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dos']);
       $sStyleReadLab_dos = '';
       $sStyleReadInp_dos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dos']) && $this->nmgp_cmp_hidden['dos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dos" value="<?php echo $this->form_encode_input($dos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dos_line" id="hidden_field_data_dos" style="<?php echo $sStyleHidden_dos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dos_label"><span id="id_label_dos"><?php echo $this->nm_new_label['dos']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dos"]) &&  $this->nmgp_cmp_readonly["dos"] == "on") { 

 ?>
<input type="hidden" name="dos" value="<?php echo $this->form_encode_input($dos) . "\">" . $dos . ""; ?>
<?php } else { ?>
<span id="id_read_on_dos" class="sc-ui-readonly-dos css_dos_line" style="<?php echo $sStyleReadLab_dos; ?>"><?php echo $this->form_encode_input($this->dos); ?></span><span id="id_read_off_dos" style="white-space: nowrap;<?php echo $sStyleReadInp_dos; ?>">
 <input class="sc-js-input scFormObjectOdd css_dos_obj" style="" id="id_sc_field_dos" type=text name="dos" value="<?php echo $this->form_encode_input($dos) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tres']))
    {
        $this->nm_new_label['tres'] = "Tres";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tres = $this->tres;
   $sStyleHidden_tres = '';
   if (isset($this->nmgp_cmp_hidden['tres']) && $this->nmgp_cmp_hidden['tres'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tres']);
       $sStyleHidden_tres = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tres = 'display: none;';
   $sStyleReadInp_tres = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tres']) && $this->nmgp_cmp_readonly['tres'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tres']);
       $sStyleReadLab_tres = '';
       $sStyleReadInp_tres = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tres']) && $this->nmgp_cmp_hidden['tres'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tres" value="<?php echo $this->form_encode_input($tres) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tres_line" id="hidden_field_data_tres" style="<?php echo $sStyleHidden_tres; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tres_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tres_label"><span id="id_label_tres"><?php echo $this->nm_new_label['tres']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tres"]) &&  $this->nmgp_cmp_readonly["tres"] == "on") { 

 ?>
<input type="hidden" name="tres" value="<?php echo $this->form_encode_input($tres) . "\">" . $tres . ""; ?>
<?php } else { ?>
<span id="id_read_on_tres" class="sc-ui-readonly-tres css_tres_line" style="<?php echo $sStyleReadLab_tres; ?>"><?php echo $this->form_encode_input($this->tres); ?></span><span id="id_read_off_tres" style="white-space: nowrap;<?php echo $sStyleReadInp_tres; ?>">
 <input class="sc-js-input scFormObjectOdd css_tres_obj" style="" id="id_sc_field_tres" type=text name="tres" value="<?php echo $this->form_encode_input($tres) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tres_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tres_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cuatro']))
    {
        $this->nm_new_label['cuatro'] = "Cuatro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cuatro = $this->cuatro;
   $sStyleHidden_cuatro = '';
   if (isset($this->nmgp_cmp_hidden['cuatro']) && $this->nmgp_cmp_hidden['cuatro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cuatro']);
       $sStyleHidden_cuatro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cuatro = 'display: none;';
   $sStyleReadInp_cuatro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cuatro']) && $this->nmgp_cmp_readonly['cuatro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cuatro']);
       $sStyleReadLab_cuatro = '';
       $sStyleReadInp_cuatro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cuatro']) && $this->nmgp_cmp_hidden['cuatro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cuatro" value="<?php echo $this->form_encode_input($cuatro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cuatro_line" id="hidden_field_data_cuatro" style="<?php echo $sStyleHidden_cuatro; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cuatro_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cuatro_label"><span id="id_label_cuatro"><?php echo $this->nm_new_label['cuatro']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cuatro"]) &&  $this->nmgp_cmp_readonly["cuatro"] == "on") { 

 ?>
<input type="hidden" name="cuatro" value="<?php echo $this->form_encode_input($cuatro) . "\">" . $cuatro . ""; ?>
<?php } else { ?>
<span id="id_read_on_cuatro" class="sc-ui-readonly-cuatro css_cuatro_line" style="<?php echo $sStyleReadLab_cuatro; ?>"><?php echo $this->form_encode_input($this->cuatro); ?></span><span id="id_read_off_cuatro" style="white-space: nowrap;<?php echo $sStyleReadInp_cuatro; ?>">
 <input class="sc-js-input scFormObjectOdd css_cuatro_obj" style="" id="id_sc_field_cuatro" type=text name="cuatro" value="<?php echo $this->form_encode_input($cuatro) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cuatro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cuatro_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cinco']))
    {
        $this->nm_new_label['cinco'] = "Cinco";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cinco = $this->cinco;
   $sStyleHidden_cinco = '';
   if (isset($this->nmgp_cmp_hidden['cinco']) && $this->nmgp_cmp_hidden['cinco'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cinco']);
       $sStyleHidden_cinco = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cinco = 'display: none;';
   $sStyleReadInp_cinco = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cinco']) && $this->nmgp_cmp_readonly['cinco'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cinco']);
       $sStyleReadLab_cinco = '';
       $sStyleReadInp_cinco = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cinco']) && $this->nmgp_cmp_hidden['cinco'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cinco" value="<?php echo $this->form_encode_input($cinco) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cinco_line" id="hidden_field_data_cinco" style="<?php echo $sStyleHidden_cinco; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cinco_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cinco_label"><span id="id_label_cinco"><?php echo $this->nm_new_label['cinco']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cinco"]) &&  $this->nmgp_cmp_readonly["cinco"] == "on") { 

 ?>
<input type="hidden" name="cinco" value="<?php echo $this->form_encode_input($cinco) . "\">" . $cinco . ""; ?>
<?php } else { ?>
<span id="id_read_on_cinco" class="sc-ui-readonly-cinco css_cinco_line" style="<?php echo $sStyleReadLab_cinco; ?>"><?php echo $this->form_encode_input($this->cinco); ?></span><span id="id_read_off_cinco" style="white-space: nowrap;<?php echo $sStyleReadInp_cinco; ?>">
 <input class="sc-js-input scFormObjectOdd css_cinco_obj" style="" id="id_sc_field_cinco" type=text name="cinco" value="<?php echo $this->form_encode_input($cinco) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cinco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cinco_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['seis']))
    {
        $this->nm_new_label['seis'] = "Seis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $seis = $this->seis;
   $sStyleHidden_seis = '';
   if (isset($this->nmgp_cmp_hidden['seis']) && $this->nmgp_cmp_hidden['seis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['seis']);
       $sStyleHidden_seis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_seis = 'display: none;';
   $sStyleReadInp_seis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['seis']) && $this->nmgp_cmp_readonly['seis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['seis']);
       $sStyleReadLab_seis = '';
       $sStyleReadInp_seis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['seis']) && $this->nmgp_cmp_hidden['seis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="seis" value="<?php echo $this->form_encode_input($seis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_seis_line" id="hidden_field_data_seis" style="<?php echo $sStyleHidden_seis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_seis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_seis_label"><span id="id_label_seis"><?php echo $this->nm_new_label['seis']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["seis"]) &&  $this->nmgp_cmp_readonly["seis"] == "on") { 

 ?>
<input type="hidden" name="seis" value="<?php echo $this->form_encode_input($seis) . "\">" . $seis . ""; ?>
<?php } else { ?>
<span id="id_read_on_seis" class="sc-ui-readonly-seis css_seis_line" style="<?php echo $sStyleReadLab_seis; ?>"><?php echo $this->form_encode_input($this->seis); ?></span><span id="id_read_off_seis" style="white-space: nowrap;<?php echo $sStyleReadInp_seis; ?>">
 <input class="sc-js-input scFormObjectOdd css_seis_obj" style="" id="id_sc_field_seis" type=text name="seis" value="<?php echo $this->form_encode_input($seis) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_seis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_seis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['siete']))
    {
        $this->nm_new_label['siete'] = "Siete";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $siete = $this->siete;
   $sStyleHidden_siete = '';
   if (isset($this->nmgp_cmp_hidden['siete']) && $this->nmgp_cmp_hidden['siete'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['siete']);
       $sStyleHidden_siete = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_siete = 'display: none;';
   $sStyleReadInp_siete = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['siete']) && $this->nmgp_cmp_readonly['siete'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['siete']);
       $sStyleReadLab_siete = '';
       $sStyleReadInp_siete = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['siete']) && $this->nmgp_cmp_hidden['siete'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="siete" value="<?php echo $this->form_encode_input($siete) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_siete_line" id="hidden_field_data_siete" style="<?php echo $sStyleHidden_siete; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_siete_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_siete_label"><span id="id_label_siete"><?php echo $this->nm_new_label['siete']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["siete"]) &&  $this->nmgp_cmp_readonly["siete"] == "on") { 

 ?>
<input type="hidden" name="siete" value="<?php echo $this->form_encode_input($siete) . "\">" . $siete . ""; ?>
<?php } else { ?>
<span id="id_read_on_siete" class="sc-ui-readonly-siete css_siete_line" style="<?php echo $sStyleReadLab_siete; ?>"><?php echo $this->form_encode_input($this->siete); ?></span><span id="id_read_off_siete" style="white-space: nowrap;<?php echo $sStyleReadInp_siete; ?>">
 <input class="sc-js-input scFormObjectOdd css_siete_obj" style="" id="id_sc_field_siete" type=text name="siete" value="<?php echo $this->form_encode_input($siete) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_siete_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_siete_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ocho']))
    {
        $this->nm_new_label['ocho'] = "Ocho";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ocho = $this->ocho;
   $sStyleHidden_ocho = '';
   if (isset($this->nmgp_cmp_hidden['ocho']) && $this->nmgp_cmp_hidden['ocho'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ocho']);
       $sStyleHidden_ocho = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ocho = 'display: none;';
   $sStyleReadInp_ocho = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ocho']) && $this->nmgp_cmp_readonly['ocho'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ocho']);
       $sStyleReadLab_ocho = '';
       $sStyleReadInp_ocho = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ocho']) && $this->nmgp_cmp_hidden['ocho'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ocho" value="<?php echo $this->form_encode_input($ocho) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ocho_line" id="hidden_field_data_ocho" style="<?php echo $sStyleHidden_ocho; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ocho_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ocho_label"><span id="id_label_ocho"><?php echo $this->nm_new_label['ocho']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ocho"]) &&  $this->nmgp_cmp_readonly["ocho"] == "on") { 

 ?>
<input type="hidden" name="ocho" value="<?php echo $this->form_encode_input($ocho) . "\">" . $ocho . ""; ?>
<?php } else { ?>
<span id="id_read_on_ocho" class="sc-ui-readonly-ocho css_ocho_line" style="<?php echo $sStyleReadLab_ocho; ?>"><?php echo $this->form_encode_input($this->ocho); ?></span><span id="id_read_off_ocho" style="white-space: nowrap;<?php echo $sStyleReadInp_ocho; ?>">
 <input class="sc-js-input scFormObjectOdd css_ocho_obj" style="" id="id_sc_field_ocho" type=text name="ocho" value="<?php echo $this->form_encode_input($ocho) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ocho_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ocho_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nueve']))
    {
        $this->nm_new_label['nueve'] = "Nueve";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nueve = $this->nueve;
   $sStyleHidden_nueve = '';
   if (isset($this->nmgp_cmp_hidden['nueve']) && $this->nmgp_cmp_hidden['nueve'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nueve']);
       $sStyleHidden_nueve = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nueve = 'display: none;';
   $sStyleReadInp_nueve = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nueve']) && $this->nmgp_cmp_readonly['nueve'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nueve']);
       $sStyleReadLab_nueve = '';
       $sStyleReadInp_nueve = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nueve']) && $this->nmgp_cmp_hidden['nueve'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nueve" value="<?php echo $this->form_encode_input($nueve) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nueve_line" id="hidden_field_data_nueve" style="<?php echo $sStyleHidden_nueve; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nueve_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nueve_label"><span id="id_label_nueve"><?php echo $this->nm_new_label['nueve']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nueve"]) &&  $this->nmgp_cmp_readonly["nueve"] == "on") { 

 ?>
<input type="hidden" name="nueve" value="<?php echo $this->form_encode_input($nueve) . "\">" . $nueve . ""; ?>
<?php } else { ?>
<span id="id_read_on_nueve" class="sc-ui-readonly-nueve css_nueve_line" style="<?php echo $sStyleReadLab_nueve; ?>"><?php echo $this->form_encode_input($this->nueve); ?></span><span id="id_read_off_nueve" style="white-space: nowrap;<?php echo $sStyleReadInp_nueve; ?>">
 <input class="sc-js-input scFormObjectOdd css_nueve_obj" style="" id="id_sc_field_nueve" type=text name="nueve" value="<?php echo $this->form_encode_input($nueve) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nueve_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nueve_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diez']))
    {
        $this->nm_new_label['diez'] = "Diez";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diez = $this->diez;
   $sStyleHidden_diez = '';
   if (isset($this->nmgp_cmp_hidden['diez']) && $this->nmgp_cmp_hidden['diez'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diez']);
       $sStyleHidden_diez = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diez = 'display: none;';
   $sStyleReadInp_diez = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diez']) && $this->nmgp_cmp_readonly['diez'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diez']);
       $sStyleReadLab_diez = '';
       $sStyleReadInp_diez = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diez']) && $this->nmgp_cmp_hidden['diez'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diez" value="<?php echo $this->form_encode_input($diez) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_diez_line" id="hidden_field_data_diez" style="<?php echo $sStyleHidden_diez; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diez_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_diez_label"><span id="id_label_diez"><?php echo $this->nm_new_label['diez']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diez"]) &&  $this->nmgp_cmp_readonly["diez"] == "on") { 

 ?>
<input type="hidden" name="diez" value="<?php echo $this->form_encode_input($diez) . "\">" . $diez . ""; ?>
<?php } else { ?>
<span id="id_read_on_diez" class="sc-ui-readonly-diez css_diez_line" style="<?php echo $sStyleReadLab_diez; ?>"><?php echo $this->form_encode_input($this->diez); ?></span><span id="id_read_off_diez" style="white-space: nowrap;<?php echo $sStyleReadInp_diez; ?>">
 <input class="sc-js-input scFormObjectOdd css_diez_obj" style="" id="id_sc_field_diez" type=text name="diez" value="<?php echo $this->form_encode_input($diez) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diez_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diez_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['once']))
    {
        $this->nm_new_label['once'] = "Once";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $once = $this->once;
   $sStyleHidden_once = '';
   if (isset($this->nmgp_cmp_hidden['once']) && $this->nmgp_cmp_hidden['once'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['once']);
       $sStyleHidden_once = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_once = 'display: none;';
   $sStyleReadInp_once = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['once']) && $this->nmgp_cmp_readonly['once'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['once']);
       $sStyleReadLab_once = '';
       $sStyleReadInp_once = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['once']) && $this->nmgp_cmp_hidden['once'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="once" value="<?php echo $this->form_encode_input($once) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_once_line" id="hidden_field_data_once" style="<?php echo $sStyleHidden_once; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_once_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_once_label"><span id="id_label_once"><?php echo $this->nm_new_label['once']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["once"]) &&  $this->nmgp_cmp_readonly["once"] == "on") { 

 ?>
<input type="hidden" name="once" value="<?php echo $this->form_encode_input($once) . "\">" . $once . ""; ?>
<?php } else { ?>
<span id="id_read_on_once" class="sc-ui-readonly-once css_once_line" style="<?php echo $sStyleReadLab_once; ?>"><?php echo $this->form_encode_input($this->once); ?></span><span id="id_read_off_once" style="white-space: nowrap;<?php echo $sStyleReadInp_once; ?>">
 <input class="sc-js-input scFormObjectOdd css_once_obj" style="" id="id_sc_field_once" type=text name="once" value="<?php echo $this->form_encode_input($once) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_once_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_once_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['doce']))
    {
        $this->nm_new_label['doce'] = "Doce";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doce = $this->doce;
   $sStyleHidden_doce = '';
   if (isset($this->nmgp_cmp_hidden['doce']) && $this->nmgp_cmp_hidden['doce'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doce']);
       $sStyleHidden_doce = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doce = 'display: none;';
   $sStyleReadInp_doce = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doce']) && $this->nmgp_cmp_readonly['doce'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doce']);
       $sStyleReadLab_doce = '';
       $sStyleReadInp_doce = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doce']) && $this->nmgp_cmp_hidden['doce'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="doce" value="<?php echo $this->form_encode_input($doce) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_doce_line" id="hidden_field_data_doce" style="<?php echo $sStyleHidden_doce; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doce_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_doce_label"><span id="id_label_doce"><?php echo $this->nm_new_label['doce']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doce"]) &&  $this->nmgp_cmp_readonly["doce"] == "on") { 

 ?>
<input type="hidden" name="doce" value="<?php echo $this->form_encode_input($doce) . "\">" . $doce . ""; ?>
<?php } else { ?>
<span id="id_read_on_doce" class="sc-ui-readonly-doce css_doce_line" style="<?php echo $sStyleReadLab_doce; ?>"><?php echo $this->form_encode_input($this->doce); ?></span><span id="id_read_off_doce" style="white-space: nowrap;<?php echo $sStyleReadInp_doce; ?>">
 <input class="sc-js-input scFormObjectOdd css_doce_obj" style="" id="id_sc_field_doce" type=text name="doce" value="<?php echo $this->form_encode_input($doce) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doce_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doce_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['trece']))
    {
        $this->nm_new_label['trece'] = "Trece";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $trece = $this->trece;
   $sStyleHidden_trece = '';
   if (isset($this->nmgp_cmp_hidden['trece']) && $this->nmgp_cmp_hidden['trece'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['trece']);
       $sStyleHidden_trece = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_trece = 'display: none;';
   $sStyleReadInp_trece = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['trece']) && $this->nmgp_cmp_readonly['trece'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['trece']);
       $sStyleReadLab_trece = '';
       $sStyleReadInp_trece = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['trece']) && $this->nmgp_cmp_hidden['trece'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="trece" value="<?php echo $this->form_encode_input($trece) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_trece_line" id="hidden_field_data_trece" style="<?php echo $sStyleHidden_trece; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_trece_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_trece_label"><span id="id_label_trece"><?php echo $this->nm_new_label['trece']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trece"]) &&  $this->nmgp_cmp_readonly["trece"] == "on") { 

 ?>
<input type="hidden" name="trece" value="<?php echo $this->form_encode_input($trece) . "\">" . $trece . ""; ?>
<?php } else { ?>
<span id="id_read_on_trece" class="sc-ui-readonly-trece css_trece_line" style="<?php echo $sStyleReadLab_trece; ?>"><?php echo $this->form_encode_input($this->trece); ?></span><span id="id_read_off_trece" style="white-space: nowrap;<?php echo $sStyleReadInp_trece; ?>">
 <input class="sc-js-input scFormObjectOdd css_trece_obj" style="" id="id_sc_field_trece" type=text name="trece" value="<?php echo $this->form_encode_input($trece) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trece_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trece_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['catorce']))
    {
        $this->nm_new_label['catorce'] = "Catorce";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $catorce = $this->catorce;
   $sStyleHidden_catorce = '';
   if (isset($this->nmgp_cmp_hidden['catorce']) && $this->nmgp_cmp_hidden['catorce'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['catorce']);
       $sStyleHidden_catorce = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_catorce = 'display: none;';
   $sStyleReadInp_catorce = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['catorce']) && $this->nmgp_cmp_readonly['catorce'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['catorce']);
       $sStyleReadLab_catorce = '';
       $sStyleReadInp_catorce = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['catorce']) && $this->nmgp_cmp_hidden['catorce'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="catorce" value="<?php echo $this->form_encode_input($catorce) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_catorce_line" id="hidden_field_data_catorce" style="<?php echo $sStyleHidden_catorce; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_catorce_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_catorce_label"><span id="id_label_catorce"><?php echo $this->nm_new_label['catorce']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["catorce"]) &&  $this->nmgp_cmp_readonly["catorce"] == "on") { 

 ?>
<input type="hidden" name="catorce" value="<?php echo $this->form_encode_input($catorce) . "\">" . $catorce . ""; ?>
<?php } else { ?>
<span id="id_read_on_catorce" class="sc-ui-readonly-catorce css_catorce_line" style="<?php echo $sStyleReadLab_catorce; ?>"><?php echo $this->form_encode_input($this->catorce); ?></span><span id="id_read_off_catorce" style="white-space: nowrap;<?php echo $sStyleReadInp_catorce; ?>">
 <input class="sc-js-input scFormObjectOdd css_catorce_obj" style="" id="id_sc_field_catorce" type=text name="catorce" value="<?php echo $this->form_encode_input($catorce) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_catorce_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_catorce_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['quince']))
    {
        $this->nm_new_label['quince'] = "Quince";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $quince = $this->quince;
   $sStyleHidden_quince = '';
   if (isset($this->nmgp_cmp_hidden['quince']) && $this->nmgp_cmp_hidden['quince'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['quince']);
       $sStyleHidden_quince = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_quince = 'display: none;';
   $sStyleReadInp_quince = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['quince']) && $this->nmgp_cmp_readonly['quince'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['quince']);
       $sStyleReadLab_quince = '';
       $sStyleReadInp_quince = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['quince']) && $this->nmgp_cmp_hidden['quince'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="quince" value="<?php echo $this->form_encode_input($quince) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_quince_line" id="hidden_field_data_quince" style="<?php echo $sStyleHidden_quince; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_quince_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_quince_label"><span id="id_label_quince"><?php echo $this->nm_new_label['quince']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["quince"]) &&  $this->nmgp_cmp_readonly["quince"] == "on") { 

 ?>
<input type="hidden" name="quince" value="<?php echo $this->form_encode_input($quince) . "\">" . $quince . ""; ?>
<?php } else { ?>
<span id="id_read_on_quince" class="sc-ui-readonly-quince css_quince_line" style="<?php echo $sStyleReadLab_quince; ?>"><?php echo $this->form_encode_input($this->quince); ?></span><span id="id_read_off_quince" style="white-space: nowrap;<?php echo $sStyleReadInp_quince; ?>">
 <input class="sc-js-input scFormObjectOdd css_quince_obj" style="" id="id_sc_field_quince" type=text name="quince" value="<?php echo $this->form_encode_input($quince) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_quince_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_quince_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diez_y_seis']))
    {
        $this->nm_new_label['diez_y_seis'] = "Diez Y Seis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diez_y_seis = $this->diez_y_seis;
   $sStyleHidden_diez_y_seis = '';
   if (isset($this->nmgp_cmp_hidden['diez_y_seis']) && $this->nmgp_cmp_hidden['diez_y_seis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diez_y_seis']);
       $sStyleHidden_diez_y_seis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diez_y_seis = 'display: none;';
   $sStyleReadInp_diez_y_seis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diez_y_seis']) && $this->nmgp_cmp_readonly['diez_y_seis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diez_y_seis']);
       $sStyleReadLab_diez_y_seis = '';
       $sStyleReadInp_diez_y_seis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diez_y_seis']) && $this->nmgp_cmp_hidden['diez_y_seis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diez_y_seis" value="<?php echo $this->form_encode_input($diez_y_seis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_diez_y_seis_line" id="hidden_field_data_diez_y_seis" style="<?php echo $sStyleHidden_diez_y_seis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diez_y_seis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_diez_y_seis_label"><span id="id_label_diez_y_seis"><?php echo $this->nm_new_label['diez_y_seis']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diez_y_seis"]) &&  $this->nmgp_cmp_readonly["diez_y_seis"] == "on") { 

 ?>
<input type="hidden" name="diez_y_seis" value="<?php echo $this->form_encode_input($diez_y_seis) . "\">" . $diez_y_seis . ""; ?>
<?php } else { ?>
<span id="id_read_on_diez_y_seis" class="sc-ui-readonly-diez_y_seis css_diez_y_seis_line" style="<?php echo $sStyleReadLab_diez_y_seis; ?>"><?php echo $this->form_encode_input($this->diez_y_seis); ?></span><span id="id_read_off_diez_y_seis" style="white-space: nowrap;<?php echo $sStyleReadInp_diez_y_seis; ?>">
 <input class="sc-js-input scFormObjectOdd css_diez_y_seis_obj" style="" id="id_sc_field_diez_y_seis" type=text name="diez_y_seis" value="<?php echo $this->form_encode_input($diez_y_seis) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diez_y_seis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diez_y_seis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diez_y_siete']))
    {
        $this->nm_new_label['diez_y_siete'] = "Diez Y Siete";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diez_y_siete = $this->diez_y_siete;
   $sStyleHidden_diez_y_siete = '';
   if (isset($this->nmgp_cmp_hidden['diez_y_siete']) && $this->nmgp_cmp_hidden['diez_y_siete'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diez_y_siete']);
       $sStyleHidden_diez_y_siete = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diez_y_siete = 'display: none;';
   $sStyleReadInp_diez_y_siete = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diez_y_siete']) && $this->nmgp_cmp_readonly['diez_y_siete'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diez_y_siete']);
       $sStyleReadLab_diez_y_siete = '';
       $sStyleReadInp_diez_y_siete = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diez_y_siete']) && $this->nmgp_cmp_hidden['diez_y_siete'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diez_y_siete" value="<?php echo $this->form_encode_input($diez_y_siete) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_diez_y_siete_line" id="hidden_field_data_diez_y_siete" style="<?php echo $sStyleHidden_diez_y_siete; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diez_y_siete_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_diez_y_siete_label"><span id="id_label_diez_y_siete"><?php echo $this->nm_new_label['diez_y_siete']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diez_y_siete"]) &&  $this->nmgp_cmp_readonly["diez_y_siete"] == "on") { 

 ?>
<input type="hidden" name="diez_y_siete" value="<?php echo $this->form_encode_input($diez_y_siete) . "\">" . $diez_y_siete . ""; ?>
<?php } else { ?>
<span id="id_read_on_diez_y_siete" class="sc-ui-readonly-diez_y_siete css_diez_y_siete_line" style="<?php echo $sStyleReadLab_diez_y_siete; ?>"><?php echo $this->form_encode_input($this->diez_y_siete); ?></span><span id="id_read_off_diez_y_siete" style="white-space: nowrap;<?php echo $sStyleReadInp_diez_y_siete; ?>">
 <input class="sc-js-input scFormObjectOdd css_diez_y_siete_obj" style="" id="id_sc_field_diez_y_siete" type=text name="diez_y_siete" value="<?php echo $this->form_encode_input($diez_y_siete) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diez_y_siete_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diez_y_siete_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diez_y_ocho']))
    {
        $this->nm_new_label['diez_y_ocho'] = "Diez Y Ocho";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diez_y_ocho = $this->diez_y_ocho;
   $sStyleHidden_diez_y_ocho = '';
   if (isset($this->nmgp_cmp_hidden['diez_y_ocho']) && $this->nmgp_cmp_hidden['diez_y_ocho'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diez_y_ocho']);
       $sStyleHidden_diez_y_ocho = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diez_y_ocho = 'display: none;';
   $sStyleReadInp_diez_y_ocho = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diez_y_ocho']) && $this->nmgp_cmp_readonly['diez_y_ocho'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diez_y_ocho']);
       $sStyleReadLab_diez_y_ocho = '';
       $sStyleReadInp_diez_y_ocho = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diez_y_ocho']) && $this->nmgp_cmp_hidden['diez_y_ocho'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diez_y_ocho" value="<?php echo $this->form_encode_input($diez_y_ocho) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_diez_y_ocho_line" id="hidden_field_data_diez_y_ocho" style="<?php echo $sStyleHidden_diez_y_ocho; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diez_y_ocho_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_diez_y_ocho_label"><span id="id_label_diez_y_ocho"><?php echo $this->nm_new_label['diez_y_ocho']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diez_y_ocho"]) &&  $this->nmgp_cmp_readonly["diez_y_ocho"] == "on") { 

 ?>
<input type="hidden" name="diez_y_ocho" value="<?php echo $this->form_encode_input($diez_y_ocho) . "\">" . $diez_y_ocho . ""; ?>
<?php } else { ?>
<span id="id_read_on_diez_y_ocho" class="sc-ui-readonly-diez_y_ocho css_diez_y_ocho_line" style="<?php echo $sStyleReadLab_diez_y_ocho; ?>"><?php echo $this->form_encode_input($this->diez_y_ocho); ?></span><span id="id_read_off_diez_y_ocho" style="white-space: nowrap;<?php echo $sStyleReadInp_diez_y_ocho; ?>">
 <input class="sc-js-input scFormObjectOdd css_diez_y_ocho_obj" style="" id="id_sc_field_diez_y_ocho" type=text name="diez_y_ocho" value="<?php echo $this->form_encode_input($diez_y_ocho) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diez_y_ocho_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diez_y_ocho_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diez_y_nueve']))
    {
        $this->nm_new_label['diez_y_nueve'] = "Diez Y Nueve";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diez_y_nueve = $this->diez_y_nueve;
   $sStyleHidden_diez_y_nueve = '';
   if (isset($this->nmgp_cmp_hidden['diez_y_nueve']) && $this->nmgp_cmp_hidden['diez_y_nueve'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diez_y_nueve']);
       $sStyleHidden_diez_y_nueve = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diez_y_nueve = 'display: none;';
   $sStyleReadInp_diez_y_nueve = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diez_y_nueve']) && $this->nmgp_cmp_readonly['diez_y_nueve'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diez_y_nueve']);
       $sStyleReadLab_diez_y_nueve = '';
       $sStyleReadInp_diez_y_nueve = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diez_y_nueve']) && $this->nmgp_cmp_hidden['diez_y_nueve'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diez_y_nueve" value="<?php echo $this->form_encode_input($diez_y_nueve) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_diez_y_nueve_line" id="hidden_field_data_diez_y_nueve" style="<?php echo $sStyleHidden_diez_y_nueve; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diez_y_nueve_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_diez_y_nueve_label"><span id="id_label_diez_y_nueve"><?php echo $this->nm_new_label['diez_y_nueve']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diez_y_nueve"]) &&  $this->nmgp_cmp_readonly["diez_y_nueve"] == "on") { 

 ?>
<input type="hidden" name="diez_y_nueve" value="<?php echo $this->form_encode_input($diez_y_nueve) . "\">" . $diez_y_nueve . ""; ?>
<?php } else { ?>
<span id="id_read_on_diez_y_nueve" class="sc-ui-readonly-diez_y_nueve css_diez_y_nueve_line" style="<?php echo $sStyleReadLab_diez_y_nueve; ?>"><?php echo $this->form_encode_input($this->diez_y_nueve); ?></span><span id="id_read_off_diez_y_nueve" style="white-space: nowrap;<?php echo $sStyleReadInp_diez_y_nueve; ?>">
 <input class="sc-js-input scFormObjectOdd css_diez_y_nueve_obj" style="" id="id_sc_field_diez_y_nueve" type=text name="diez_y_nueve" value="<?php echo $this->form_encode_input($diez_y_nueve) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diez_y_nueve_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diez_y_nueve_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['veinte']))
    {
        $this->nm_new_label['veinte'] = "Veinte";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $veinte = $this->veinte;
   $sStyleHidden_veinte = '';
   if (isset($this->nmgp_cmp_hidden['veinte']) && $this->nmgp_cmp_hidden['veinte'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['veinte']);
       $sStyleHidden_veinte = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_veinte = 'display: none;';
   $sStyleReadInp_veinte = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['veinte']) && $this->nmgp_cmp_readonly['veinte'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['veinte']);
       $sStyleReadLab_veinte = '';
       $sStyleReadInp_veinte = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['veinte']) && $this->nmgp_cmp_hidden['veinte'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="veinte" value="<?php echo $this->form_encode_input($veinte) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_veinte_line" id="hidden_field_data_veinte" style="<?php echo $sStyleHidden_veinte; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_veinte_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_veinte_label"><span id="id_label_veinte"><?php echo $this->nm_new_label['veinte']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["veinte"]) &&  $this->nmgp_cmp_readonly["veinte"] == "on") { 

 ?>
<input type="hidden" name="veinte" value="<?php echo $this->form_encode_input($veinte) . "\">" . $veinte . ""; ?>
<?php } else { ?>
<span id="id_read_on_veinte" class="sc-ui-readonly-veinte css_veinte_line" style="<?php echo $sStyleReadLab_veinte; ?>"><?php echo $this->form_encode_input($this->veinte); ?></span><span id="id_read_off_veinte" style="white-space: nowrap;<?php echo $sStyleReadInp_veinte; ?>">
 <input class="sc-js-input scFormObjectOdd css_veinte_obj" style="" id="id_sc_field_veinte" type=text name="veinte" value="<?php echo $this->form_encode_input($veinte) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_veinte_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_veinte_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['veintiuno']))
    {
        $this->nm_new_label['veintiuno'] = "Veintiuno";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $veintiuno = $this->veintiuno;
   $sStyleHidden_veintiuno = '';
   if (isset($this->nmgp_cmp_hidden['veintiuno']) && $this->nmgp_cmp_hidden['veintiuno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['veintiuno']);
       $sStyleHidden_veintiuno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_veintiuno = 'display: none;';
   $sStyleReadInp_veintiuno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['veintiuno']) && $this->nmgp_cmp_readonly['veintiuno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['veintiuno']);
       $sStyleReadLab_veintiuno = '';
       $sStyleReadInp_veintiuno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['veintiuno']) && $this->nmgp_cmp_hidden['veintiuno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="veintiuno" value="<?php echo $this->form_encode_input($veintiuno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_veintiuno_line" id="hidden_field_data_veintiuno" style="<?php echo $sStyleHidden_veintiuno; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_veintiuno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_veintiuno_label"><span id="id_label_veintiuno"><?php echo $this->nm_new_label['veintiuno']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["veintiuno"]) &&  $this->nmgp_cmp_readonly["veintiuno"] == "on") { 

 ?>
<input type="hidden" name="veintiuno" value="<?php echo $this->form_encode_input($veintiuno) . "\">" . $veintiuno . ""; ?>
<?php } else { ?>
<span id="id_read_on_veintiuno" class="sc-ui-readonly-veintiuno css_veintiuno_line" style="<?php echo $sStyleReadLab_veintiuno; ?>"><?php echo $this->form_encode_input($this->veintiuno); ?></span><span id="id_read_off_veintiuno" style="white-space: nowrap;<?php echo $sStyleReadInp_veintiuno; ?>">
 <input class="sc-js-input scFormObjectOdd css_veintiuno_obj" style="" id="id_sc_field_veintiuno" type=text name="veintiuno" value="<?php echo $this->form_encode_input($veintiuno) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_veintiuno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_veintiuno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['veintidos']))
    {
        $this->nm_new_label['veintidos'] = "Veintidos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $veintidos = $this->veintidos;
   $sStyleHidden_veintidos = '';
   if (isset($this->nmgp_cmp_hidden['veintidos']) && $this->nmgp_cmp_hidden['veintidos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['veintidos']);
       $sStyleHidden_veintidos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_veintidos = 'display: none;';
   $sStyleReadInp_veintidos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['veintidos']) && $this->nmgp_cmp_readonly['veintidos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['veintidos']);
       $sStyleReadLab_veintidos = '';
       $sStyleReadInp_veintidos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['veintidos']) && $this->nmgp_cmp_hidden['veintidos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="veintidos" value="<?php echo $this->form_encode_input($veintidos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_veintidos_line" id="hidden_field_data_veintidos" style="<?php echo $sStyleHidden_veintidos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_veintidos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_veintidos_label"><span id="id_label_veintidos"><?php echo $this->nm_new_label['veintidos']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["veintidos"]) &&  $this->nmgp_cmp_readonly["veintidos"] == "on") { 

 ?>
<input type="hidden" name="veintidos" value="<?php echo $this->form_encode_input($veintidos) . "\">" . $veintidos . ""; ?>
<?php } else { ?>
<span id="id_read_on_veintidos" class="sc-ui-readonly-veintidos css_veintidos_line" style="<?php echo $sStyleReadLab_veintidos; ?>"><?php echo $this->form_encode_input($this->veintidos); ?></span><span id="id_read_off_veintidos" style="white-space: nowrap;<?php echo $sStyleReadInp_veintidos; ?>">
 <input class="sc-js-input scFormObjectOdd css_veintidos_obj" style="" id="id_sc_field_veintidos" type=text name="veintidos" value="<?php echo $this->form_encode_input($veintidos) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_veintidos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_veintidos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['veintitres']))
    {
        $this->nm_new_label['veintitres'] = "Veintitres";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $veintitres = $this->veintitres;
   $sStyleHidden_veintitres = '';
   if (isset($this->nmgp_cmp_hidden['veintitres']) && $this->nmgp_cmp_hidden['veintitres'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['veintitres']);
       $sStyleHidden_veintitres = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_veintitres = 'display: none;';
   $sStyleReadInp_veintitres = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['veintitres']) && $this->nmgp_cmp_readonly['veintitres'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['veintitres']);
       $sStyleReadLab_veintitres = '';
       $sStyleReadInp_veintitres = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['veintitres']) && $this->nmgp_cmp_hidden['veintitres'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="veintitres" value="<?php echo $this->form_encode_input($veintitres) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_veintitres_line" id="hidden_field_data_veintitres" style="<?php echo $sStyleHidden_veintitres; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_veintitres_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_veintitres_label"><span id="id_label_veintitres"><?php echo $this->nm_new_label['veintitres']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["veintitres"]) &&  $this->nmgp_cmp_readonly["veintitres"] == "on") { 

 ?>
<input type="hidden" name="veintitres" value="<?php echo $this->form_encode_input($veintitres) . "\">" . $veintitres . ""; ?>
<?php } else { ?>
<span id="id_read_on_veintitres" class="sc-ui-readonly-veintitres css_veintitres_line" style="<?php echo $sStyleReadLab_veintitres; ?>"><?php echo $this->form_encode_input($this->veintitres); ?></span><span id="id_read_off_veintitres" style="white-space: nowrap;<?php echo $sStyleReadInp_veintitres; ?>">
 <input class="sc-js-input scFormObjectOdd css_veintitres_obj" style="" id="id_sc_field_veintitres" type=text name="veintitres" value="<?php echo $this->form_encode_input($veintitres) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_veintitres_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_veintitres_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['veinticuatro']))
    {
        $this->nm_new_label['veinticuatro'] = "Veinticuatro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $veinticuatro = $this->veinticuatro;
   $sStyleHidden_veinticuatro = '';
   if (isset($this->nmgp_cmp_hidden['veinticuatro']) && $this->nmgp_cmp_hidden['veinticuatro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['veinticuatro']);
       $sStyleHidden_veinticuatro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_veinticuatro = 'display: none;';
   $sStyleReadInp_veinticuatro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['veinticuatro']) && $this->nmgp_cmp_readonly['veinticuatro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['veinticuatro']);
       $sStyleReadLab_veinticuatro = '';
       $sStyleReadInp_veinticuatro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['veinticuatro']) && $this->nmgp_cmp_hidden['veinticuatro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="veinticuatro" value="<?php echo $this->form_encode_input($veinticuatro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_veinticuatro_line" id="hidden_field_data_veinticuatro" style="<?php echo $sStyleHidden_veinticuatro; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_veinticuatro_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_veinticuatro_label"><span id="id_label_veinticuatro"><?php echo $this->nm_new_label['veinticuatro']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["veinticuatro"]) &&  $this->nmgp_cmp_readonly["veinticuatro"] == "on") { 

 ?>
<input type="hidden" name="veinticuatro" value="<?php echo $this->form_encode_input($veinticuatro) . "\">" . $veinticuatro . ""; ?>
<?php } else { ?>
<span id="id_read_on_veinticuatro" class="sc-ui-readonly-veinticuatro css_veinticuatro_line" style="<?php echo $sStyleReadLab_veinticuatro; ?>"><?php echo $this->form_encode_input($this->veinticuatro); ?></span><span id="id_read_off_veinticuatro" style="white-space: nowrap;<?php echo $sStyleReadInp_veinticuatro; ?>">
 <input class="sc-js-input scFormObjectOdd css_veinticuatro_obj" style="" id="id_sc_field_veinticuatro" type=text name="veinticuatro" value="<?php echo $this->form_encode_input($veinticuatro) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_veinticuatro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_veinticuatro_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vinticinco']))
    {
        $this->nm_new_label['vinticinco'] = "Vinticinco";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vinticinco = $this->vinticinco;
   $sStyleHidden_vinticinco = '';
   if (isset($this->nmgp_cmp_hidden['vinticinco']) && $this->nmgp_cmp_hidden['vinticinco'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vinticinco']);
       $sStyleHidden_vinticinco = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vinticinco = 'display: none;';
   $sStyleReadInp_vinticinco = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vinticinco']) && $this->nmgp_cmp_readonly['vinticinco'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vinticinco']);
       $sStyleReadLab_vinticinco = '';
       $sStyleReadInp_vinticinco = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vinticinco']) && $this->nmgp_cmp_hidden['vinticinco'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vinticinco" value="<?php echo $this->form_encode_input($vinticinco) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_vinticinco_line" id="hidden_field_data_vinticinco" style="<?php echo $sStyleHidden_vinticinco; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vinticinco_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_vinticinco_label"><span id="id_label_vinticinco"><?php echo $this->nm_new_label['vinticinco']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vinticinco"]) &&  $this->nmgp_cmp_readonly["vinticinco"] == "on") { 

 ?>
<input type="hidden" name="vinticinco" value="<?php echo $this->form_encode_input($vinticinco) . "\">" . $vinticinco . ""; ?>
<?php } else { ?>
<span id="id_read_on_vinticinco" class="sc-ui-readonly-vinticinco css_vinticinco_line" style="<?php echo $sStyleReadLab_vinticinco; ?>"><?php echo $this->form_encode_input($this->vinticinco); ?></span><span id="id_read_off_vinticinco" style="white-space: nowrap;<?php echo $sStyleReadInp_vinticinco; ?>">
 <input class="sc-js-input scFormObjectOdd css_vinticinco_obj" style="" id="id_sc_field_vinticinco" type=text name="vinticinco" value="<?php echo $this->form_encode_input($vinticinco) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vinticinco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vinticinco_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
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
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
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
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['masterValue']);
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
 parent.scAjaxDetailStatus("form_parametros_planilla_eval_mob");
 parent.scAjaxDetailHeight("form_parametros_planilla_eval_mob", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_parametros_planilla_eval_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_parametros_planilla_eval_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_parametros_planilla_eval_mob']['sc_modal'])
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
