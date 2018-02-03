<?php
class form_det_evalua_actividad_dc5_form extends form_det_evalua_actividad_dc5_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Desempeño Actividades"); } else { echo strip_tags("Desempeño Actividades"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_det_evalua_actividad_dc5/form_det_evalua_actividad_dc5_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_det_evalua_actividad_dc5_sajax_js.php");
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

include_once('form_det_evalua_actividad_dc5_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['recarga'];
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
 include_once("form_det_evalua_actividad_dc5_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_det_evalua_actividad_dc5'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_det_evalua_actividad_dc5'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Desempeño Actividades"; } else { echo "Desempeño Actividades"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['fast_search'][2] : "";
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
    if (!$this->Embutida_call) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['id_rel_act_est_per_']))
   {
       $this->nmgp_cmp_hidden['id_rel_act_est_per_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_estudent_']))
   {
       $this->nmgp_cmp_hidden['id_estudent_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['codigo_desemp_']))
   {
       $this->nmgp_cmp_hidden['codigo_desemp_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['posicion_']))
   {
       $this->nmgp_cmp_hidden['posicion_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_asignatura_']))
   {
       $this->nmgp_cmp_hidden['id_asignatura_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_grupo_']))
   {
       $this->nmgp_cmp_hidden['id_grupo_'] = 'off';
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
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ((!isset($this->nmgp_cmp_hidden['id_rel_act_est_per_']) || $this->nmgp_cmp_hidden['id_rel_act_est_per_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_rel_act_est_per_'])) {
          $this->nm_new_label['id_rel_act_est_per_'] = "Id Rel Act Est Per"; } ?>

    <TD class="scFormLabelOddMult css_id_rel_act_est_per__label" id="hidden_field_label_id_rel_act_est_per_" style="<?php echo $sStyleHidden_id_rel_act_est_per_; ?>" > <?php echo $this->nm_new_label['id_rel_act_est_per_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_estudent_']) && $this->nmgp_cmp_hidden['id_estudent_'] == 'off') { $sStyleHidden_id_estudent_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_estudent_']) || $this->nmgp_cmp_hidden['id_estudent_'] == 'on') {
      if (!isset($this->nm_new_label['id_estudent_'])) {
          $this->nm_new_label['id_estudent_'] = "Id Estudent"; } ?>

    <TD class="scFormLabelOddMult css_id_estudent__label" id="hidden_field_label_id_estudent_" style="<?php echo $sStyleHidden_id_estudent_; ?>" > <?php echo $this->nm_new_label['id_estudent_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['actividad_']) && $this->nmgp_cmp_hidden['actividad_'] == 'off') { $sStyleHidden_actividad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['actividad_']) || $this->nmgp_cmp_hidden['actividad_'] == 'on') {
      if (!isset($this->nm_new_label['actividad_'])) {
          $this->nm_new_label['actividad_'] = "Actividad"; } ?>

    <TD class="scFormLabelOddMult css_actividad__label" id="hidden_field_label_actividad_" style="<?php echo $sStyleHidden_actividad_; ?>" > <?php echo $this->nm_new_label['actividad_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['codigo_desemp_']) && $this->nmgp_cmp_hidden['codigo_desemp_'] == 'off') { $sStyleHidden_codigo_desemp_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['codigo_desemp_']) || $this->nmgp_cmp_hidden['codigo_desemp_'] == 'on') {
      if (!isset($this->nm_new_label['codigo_desemp_'])) {
          $this->nm_new_label['codigo_desemp_'] = "Codigo Desemp"; } ?>

    <TD class="scFormLabelOddMult css_codigo_desemp__label" id="hidden_field_label_codigo_desemp_" style="<?php echo $sStyleHidden_codigo_desemp_; ?>" > <?php echo $this->nm_new_label['codigo_desemp_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['posicion_']) && $this->nmgp_cmp_hidden['posicion_'] == 'off') { $sStyleHidden_posicion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['posicion_']) || $this->nmgp_cmp_hidden['posicion_'] == 'on') {
      if (!isset($this->nm_new_label['posicion_'])) {
          $this->nm_new_label['posicion_'] = "Posicion"; } ?>

    <TD class="scFormLabelOddMult css_posicion__label" id="hidden_field_label_posicion_" style="<?php echo $sStyleHidden_posicion_; ?>" > <?php echo $this->nm_new_label['posicion_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_asignatura_']) && $this->nmgp_cmp_hidden['id_asignatura_'] == 'off') { $sStyleHidden_id_asignatura_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_asignatura_']) || $this->nmgp_cmp_hidden['id_asignatura_'] == 'on') {
      if (!isset($this->nm_new_label['id_asignatura_'])) {
          $this->nm_new_label['id_asignatura_'] = "Id Asignatura"; } ?>

    <TD class="scFormLabelOddMult css_id_asignatura__label" id="hidden_field_label_id_asignatura_" style="<?php echo $sStyleHidden_id_asignatura_; ?>" > <?php echo $this->nm_new_label['id_asignatura_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_grupo_']) && $this->nmgp_cmp_hidden['id_grupo_'] == 'off') { $sStyleHidden_id_grupo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_grupo_']) || $this->nmgp_cmp_hidden['id_grupo_'] == 'on') {
      if (!isset($this->nm_new_label['id_grupo_'])) {
          $this->nm_new_label['id_grupo_'] = "Id Grupo"; } ?>

    <TD class="scFormLabelOddMult css_id_grupo__label" id="hidden_field_label_id_grupo_" style="<?php echo $sStyleHidden_id_grupo_; ?>" > <?php echo $this->nm_new_label['id_grupo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_']) && $this->nmgp_cmp_hidden['eval_'] == 'off') { $sStyleHidden_eval_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['eval_']) || $this->nmgp_cmp_hidden['eval_'] == 'on') {
      if (!isset($this->nm_new_label['eval_'])) {
          $this->nm_new_label['eval_'] = "Eval"; } ?>

    <TD class="scFormLabelOddMult css_eval__label" id="hidden_field_label_eval_" style="<?php echo $sStyleHidden_eval_; ?>" > <?php echo $this->nm_new_label['eval_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['porcentaje_']) && $this->nmgp_cmp_hidden['porcentaje_'] == 'off') { $sStyleHidden_porcentaje_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['porcentaje_']) || $this->nmgp_cmp_hidden['porcentaje_'] == 'on') {
      if (!isset($this->nm_new_label['porcentaje_'])) {
          $this->nm_new_label['porcentaje_'] = "Porcentaje"; } ?>

    <TD class="scFormLabelOddMult css_porcentaje__label" id="hidden_field_label_porcentaje_" style="<?php echo $sStyleHidden_porcentaje_; ?>" > <?php echo $this->nm_new_label['porcentaje_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_det_evalua_actividad_dc5);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_det_evalua_actividad_dc5 = $this->form_vert_form_det_evalua_actividad_dc5;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_det_evalua_actividad_dc5))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_rel_act_est_per_']))
           {
               $this->nmgp_cmp_readonly['id_rel_act_est_per_'] = 'on';
           }
   foreach ($this->form_vert_form_det_evalua_actividad_dc5 as $sc_seq_vert => $sc_lixo)
   {
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_rel_act_est_per_'] = true;
           $this->nmgp_cmp_readonly['id_estudent_'] = true;
           $this->nmgp_cmp_readonly['actividad_'] = true;
           $this->nmgp_cmp_readonly['codigo_desemp_'] = true;
           $this->nmgp_cmp_readonly['posicion_'] = true;
           $this->nmgp_cmp_readonly['id_asignatura_'] = true;
           $this->nmgp_cmp_readonly['id_grupo_'] = true;
           $this->nmgp_cmp_readonly['eval_'] = true;
           $this->nmgp_cmp_readonly['porcentaje_'] = true;
           $this->nmgp_cmp_readonly['entorno_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_rel_act_est_per_']) || $this->nmgp_cmp_readonly['id_rel_act_est_per_'] != "on") {$this->nmgp_cmp_readonly['id_rel_act_est_per_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_estudent_']) || $this->nmgp_cmp_readonly['id_estudent_'] != "on") {$this->nmgp_cmp_readonly['id_estudent_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['actividad_']) || $this->nmgp_cmp_readonly['actividad_'] != "on") {$this->nmgp_cmp_readonly['actividad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['codigo_desemp_']) || $this->nmgp_cmp_readonly['codigo_desemp_'] != "on") {$this->nmgp_cmp_readonly['codigo_desemp_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['posicion_']) || $this->nmgp_cmp_readonly['posicion_'] != "on") {$this->nmgp_cmp_readonly['posicion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_asignatura_']) || $this->nmgp_cmp_readonly['id_asignatura_'] != "on") {$this->nmgp_cmp_readonly['id_asignatura_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_grupo_']) || $this->nmgp_cmp_readonly['id_grupo_'] != "on") {$this->nmgp_cmp_readonly['id_grupo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['eval_']) || $this->nmgp_cmp_readonly['eval_'] != "on") {$this->nmgp_cmp_readonly['eval_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['porcentaje_']) || $this->nmgp_cmp_readonly['porcentaje_'] != "on") {$this->nmgp_cmp_readonly['porcentaje_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['entorno_']) || $this->nmgp_cmp_readonly['entorno_'] != "on") {$this->nmgp_cmp_readonly['entorno_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_rel_act_est_per_ = $this->form_vert_form_det_evalua_actividad_dc5[$sc_seq_vert]['id_rel_act_est_per_']; 
       $id_rel_act_est_per_ = $this->id_rel_act_est_per_; 
       if (!isset($this->nmgp_cmp_hidden['id_rel_act_est_per_']))
       {
           $this->nmgp_cmp_hidden['id_rel_act_est_per_'] = 'off';
       }
       $sStyleHidden_id_rel_act_est_per_ = '';
       if (isset($sCheckRead_id_rel_act_est_per_))
       {
           unset($sCheckRead_id_rel_act_est_per_);
       }
       if (isset($this->nmgp_cmp_readonly['id_rel_act_est_per_']))
       {
           $sCheckRead_id_rel_act_est_per_ = $this->nmgp_cmp_readonly['id_rel_act_est_per_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_rel_act_est_per_']) && $this->nmgp_cmp_hidden['id_rel_act_est_per_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_rel_act_est_per_']);
           $sStyleHidden_id_rel_act_est_per_ = 'display: none;';
       }
       $bTestReadOnly_id_rel_act_est_per_ = true;
       $sStyleReadLab_id_rel_act_est_per_ = 'display: none;';
       $sStyleReadInp_id_rel_act_est_per_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_rel_act_est_per_"]) &&  $this->nmgp_cmp_readonly["id_rel_act_est_per_"] == "on"))
       {
           $bTestReadOnly_id_rel_act_est_per_ = false;
           unset($this->nmgp_cmp_readonly['id_rel_act_est_per_']);
           $sStyleReadLab_id_rel_act_est_per_ = '';
           $sStyleReadInp_id_rel_act_est_per_ = 'display: none;';
       }
       $this->id_estudent_ = $this->form_vert_form_det_evalua_actividad_dc5[$sc_seq_vert]['id_estudent_']; 
       $id_estudent_ = $this->id_estudent_; 
       if (!isset($this->nmgp_cmp_hidden['id_estudent_']))
       {
           $this->nmgp_cmp_hidden['id_estudent_'] = 'off';
       }
       $sStyleHidden_id_estudent_ = '';
       if (isset($sCheckRead_id_estudent_))
       {
           unset($sCheckRead_id_estudent_);
       }
       if (isset($this->nmgp_cmp_readonly['id_estudent_']))
       {
           $sCheckRead_id_estudent_ = $this->nmgp_cmp_readonly['id_estudent_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_estudent_']) && $this->nmgp_cmp_hidden['id_estudent_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_estudent_']);
           $sStyleHidden_id_estudent_ = 'display: none;';
       }
       $bTestReadOnly_id_estudent_ = true;
       $sStyleReadLab_id_estudent_ = 'display: none;';
       $sStyleReadInp_id_estudent_ = '';
       if (isset($this->nmgp_cmp_readonly['id_estudent_']) && $this->nmgp_cmp_readonly['id_estudent_'] == 'on')
       {
           $bTestReadOnly_id_estudent_ = false;
           unset($this->nmgp_cmp_readonly['id_estudent_']);
           $sStyleReadLab_id_estudent_ = '';
           $sStyleReadInp_id_estudent_ = 'display: none;';
       }
       $this->actividad_ = $this->form_vert_form_det_evalua_actividad_dc5[$sc_seq_vert]['actividad_']; 
       $actividad_ = $this->actividad_; 
       $sStyleHidden_actividad_ = '';
       if (isset($sCheckRead_actividad_))
       {
           unset($sCheckRead_actividad_);
       }
       if (isset($this->nmgp_cmp_readonly['actividad_']))
       {
           $sCheckRead_actividad_ = $this->nmgp_cmp_readonly['actividad_'];
       }
       if (isset($this->nmgp_cmp_hidden['actividad_']) && $this->nmgp_cmp_hidden['actividad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['actividad_']);
           $sStyleHidden_actividad_ = 'display: none;';
       }
       $bTestReadOnly_actividad_ = true;
       $sStyleReadLab_actividad_ = 'display: none;';
       $sStyleReadInp_actividad_ = '';
       if (isset($this->nmgp_cmp_readonly['actividad_']) && $this->nmgp_cmp_readonly['actividad_'] == 'on')
       {
           $bTestReadOnly_actividad_ = false;
           unset($this->nmgp_cmp_readonly['actividad_']);
           $sStyleReadLab_actividad_ = '';
           $sStyleReadInp_actividad_ = 'display: none;';
       }
       $this->codigo_desemp_ = $this->form_vert_form_det_evalua_actividad_dc5[$sc_seq_vert]['codigo_desemp_']; 
       $codigo_desemp_ = $this->codigo_desemp_; 
       if (!isset($this->nmgp_cmp_hidden['codigo_desemp_']))
       {
           $this->nmgp_cmp_hidden['codigo_desemp_'] = 'off';
       }
       $sStyleHidden_codigo_desemp_ = '';
       if (isset($sCheckRead_codigo_desemp_))
       {
           unset($sCheckRead_codigo_desemp_);
       }
       if (isset($this->nmgp_cmp_readonly['codigo_desemp_']))
       {
           $sCheckRead_codigo_desemp_ = $this->nmgp_cmp_readonly['codigo_desemp_'];
       }
       if (isset($this->nmgp_cmp_hidden['codigo_desemp_']) && $this->nmgp_cmp_hidden['codigo_desemp_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['codigo_desemp_']);
           $sStyleHidden_codigo_desemp_ = 'display: none;';
       }
       $bTestReadOnly_codigo_desemp_ = true;
       $sStyleReadLab_codigo_desemp_ = 'display: none;';
       $sStyleReadInp_codigo_desemp_ = '';
       if (isset($this->nmgp_cmp_readonly['codigo_desemp_']) && $this->nmgp_cmp_readonly['codigo_desemp_'] == 'on')
       {
           $bTestReadOnly_codigo_desemp_ = false;
           unset($this->nmgp_cmp_readonly['codigo_desemp_']);
           $sStyleReadLab_codigo_desemp_ = '';
           $sStyleReadInp_codigo_desemp_ = 'display: none;';
       }
       $this->posicion_ = $this->form_vert_form_det_evalua_actividad_dc5[$sc_seq_vert]['posicion_']; 
       $posicion_ = $this->posicion_; 
       if (!isset($this->nmgp_cmp_hidden['posicion_']))
       {
           $this->nmgp_cmp_hidden['posicion_'] = 'off';
       }
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
       if (isset($this->nmgp_cmp_readonly['posicion_']) && $this->nmgp_cmp_readonly['posicion_'] == 'on')
       {
           $bTestReadOnly_posicion_ = false;
           unset($this->nmgp_cmp_readonly['posicion_']);
           $sStyleReadLab_posicion_ = '';
           $sStyleReadInp_posicion_ = 'display: none;';
       }
       $this->id_asignatura_ = $this->form_vert_form_det_evalua_actividad_dc5[$sc_seq_vert]['id_asignatura_']; 
       $id_asignatura_ = $this->id_asignatura_; 
       if (!isset($this->nmgp_cmp_hidden['id_asignatura_']))
       {
           $this->nmgp_cmp_hidden['id_asignatura_'] = 'off';
       }
       $sStyleHidden_id_asignatura_ = '';
       if (isset($sCheckRead_id_asignatura_))
       {
           unset($sCheckRead_id_asignatura_);
       }
       if (isset($this->nmgp_cmp_readonly['id_asignatura_']))
       {
           $sCheckRead_id_asignatura_ = $this->nmgp_cmp_readonly['id_asignatura_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_asignatura_']) && $this->nmgp_cmp_hidden['id_asignatura_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_asignatura_']);
           $sStyleHidden_id_asignatura_ = 'display: none;';
       }
       $bTestReadOnly_id_asignatura_ = true;
       $sStyleReadLab_id_asignatura_ = 'display: none;';
       $sStyleReadInp_id_asignatura_ = '';
       if (isset($this->nmgp_cmp_readonly['id_asignatura_']) && $this->nmgp_cmp_readonly['id_asignatura_'] == 'on')
       {
           $bTestReadOnly_id_asignatura_ = false;
           unset($this->nmgp_cmp_readonly['id_asignatura_']);
           $sStyleReadLab_id_asignatura_ = '';
           $sStyleReadInp_id_asignatura_ = 'display: none;';
       }
       $this->id_grupo_ = $this->form_vert_form_det_evalua_actividad_dc5[$sc_seq_vert]['id_grupo_']; 
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
       if (isset($this->nmgp_cmp_readonly['id_grupo_']) && $this->nmgp_cmp_readonly['id_grupo_'] == 'on')
       {
           $bTestReadOnly_id_grupo_ = false;
           unset($this->nmgp_cmp_readonly['id_grupo_']);
           $sStyleReadLab_id_grupo_ = '';
           $sStyleReadInp_id_grupo_ = 'display: none;';
       }
       $this->eval_ = $this->form_vert_form_det_evalua_actividad_dc5[$sc_seq_vert]['eval_']; 
       $eval_ = $this->eval_; 
       $sStyleHidden_eval_ = '';
       if (isset($sCheckRead_eval_))
       {
           unset($sCheckRead_eval_);
       }
       if (isset($this->nmgp_cmp_readonly['eval_']))
       {
           $sCheckRead_eval_ = $this->nmgp_cmp_readonly['eval_'];
       }
       if (isset($this->nmgp_cmp_hidden['eval_']) && $this->nmgp_cmp_hidden['eval_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['eval_']);
           $sStyleHidden_eval_ = 'display: none;';
       }
       $bTestReadOnly_eval_ = true;
       $sStyleReadLab_eval_ = 'display: none;';
       $sStyleReadInp_eval_ = '';
       if (isset($this->nmgp_cmp_readonly['eval_']) && $this->nmgp_cmp_readonly['eval_'] == 'on')
       {
           $bTestReadOnly_eval_ = false;
           unset($this->nmgp_cmp_readonly['eval_']);
           $sStyleReadLab_eval_ = '';
           $sStyleReadInp_eval_ = 'display: none;';
       }
       $this->porcentaje_ = $this->form_vert_form_det_evalua_actividad_dc5[$sc_seq_vert]['porcentaje_']; 
       $porcentaje_ = $this->porcentaje_; 
       $sStyleHidden_porcentaje_ = '';
       if (isset($sCheckRead_porcentaje_))
       {
           unset($sCheckRead_porcentaje_);
       }
       if (isset($this->nmgp_cmp_readonly['porcentaje_']))
       {
           $sCheckRead_porcentaje_ = $this->nmgp_cmp_readonly['porcentaje_'];
       }
       if (isset($this->nmgp_cmp_hidden['porcentaje_']) && $this->nmgp_cmp_hidden['porcentaje_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['porcentaje_']);
           $sStyleHidden_porcentaje_ = 'display: none;';
       }
       $bTestReadOnly_porcentaje_ = true;
       $sStyleReadLab_porcentaje_ = 'display: none;';
       $sStyleReadInp_porcentaje_ = '';
       if (isset($this->nmgp_cmp_readonly['porcentaje_']) && $this->nmgp_cmp_readonly['porcentaje_'] == 'on')
       {
           $bTestReadOnly_porcentaje_ = false;
           unset($this->nmgp_cmp_readonly['porcentaje_']);
           $sStyleReadLab_porcentaje_ = '';
           $sStyleReadInp_porcentaje_ = 'display: none;';
       }
       $this->entorno_ = $this->form_vert_form_det_evalua_actividad_dc5[$sc_seq_vert]['entorno_']; 
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_det_evalua_actividad_dc5_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_det_evalua_actividad_dc5_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_det_evalua_actividad_dc5_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_det_evalua_actividad_dc5_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_det_evalua_actividad_dc5_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_det_evalua_actividad_dc5_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_rel_act_est_per_']) && $this->nmgp_cmp_hidden['id_rel_act_est_per_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_rel_act_est_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_rel_act_est_per_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_id_rel_act_est_per__line" id="hidden_field_data_id_rel_act_est_per_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_rel_act_est_per_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_rel_act_est_per__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_rel_act_est_per_<?php echo $sc_seq_vert ?>" class="css_id_rel_act_est_per__line" style="<?php echo $sStyleReadLab_id_rel_act_est_per_; ?>"><?php echo $this->form_encode_input($this->id_rel_act_est_per_); ?></span><span id="id_read_off_id_rel_act_est_per_<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_rel_act_est_per_; ?>"><input type="hidden" id="id_sc_field_id_rel_act_est_per_<?php echo $sc_seq_vert ?>" name="id_rel_act_est_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_rel_act_est_per_) . "\">"?><span id="id_ajax_label_id_rel_act_est_per_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_rel_act_est_per_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_rel_act_est_per_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_rel_act_est_per_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_estudent_']) && $this->nmgp_cmp_hidden['id_estudent_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_estudent_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_estudent_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_estudent__line" id="hidden_field_data_id_estudent_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_estudent_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_estudent__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_estudent_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_estudent_"]) &&  $this->nmgp_cmp_readonly["id_estudent_"] == "on") { 

 ?>
<input type="hidden" name="id_estudent_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_estudent_) . "\">" . $id_estudent_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_estudent_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_estudent_<?php echo $sc_seq_vert ?> css_id_estudent__line" style="<?php echo $sStyleReadLab_id_estudent_; ?>"><?php echo $this->form_encode_input($this->id_estudent_); ?></span><span id="id_read_off_id_estudent_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_estudent_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_estudent__obj" style="" id="id_sc_field_id_estudent_<?php echo $sc_seq_vert ?>" type=text name="id_estudent_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_estudent_) ?>"
 size=19 alt="{datatype: 'integer', maxLength: 19, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_estudent_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_estudent_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_estudent_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_estudent_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['actividad_']) && $this->nmgp_cmp_hidden['actividad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="actividad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($actividad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_actividad__line" id="hidden_field_data_actividad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_actividad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_actividad__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="actividad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($actividad_); ?>"><span id="id_ajax_label_actividad_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($actividad_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_actividad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_actividad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['codigo_desemp_']) && $this->nmgp_cmp_hidden['codigo_desemp_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_desemp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigo_desemp_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_codigo_desemp__line" id="hidden_field_data_codigo_desemp_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_codigo_desemp_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_codigo_desemp__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_codigo_desemp_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_desemp_"]) &&  $this->nmgp_cmp_readonly["codigo_desemp_"] == "on") { 

 ?>
<input type="hidden" name="codigo_desemp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigo_desemp_) . "\">" . $codigo_desemp_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_desemp_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-codigo_desemp_<?php echo $sc_seq_vert ?> css_codigo_desemp__line" style="<?php echo $sStyleReadLab_codigo_desemp_; ?>"><?php echo $this->form_encode_input($this->codigo_desemp_); ?></span><span id="id_read_off_codigo_desemp_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_desemp_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_codigo_desemp__obj" style="" id="id_sc_field_codigo_desemp_<?php echo $sc_seq_vert ?>" type=text name="codigo_desemp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigo_desemp_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['codigo_desemp_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['codigo_desemp_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_desemp_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_desemp_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['posicion_']) && $this->nmgp_cmp_hidden['posicion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="posicion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($posicion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_posicion__line" id="hidden_field_data_posicion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_posicion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_posicion__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="posicion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($posicion_); ?>"><span id="id_ajax_label_posicion_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($posicion_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_asignatura_']) && $this->nmgp_cmp_hidden['id_asignatura_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_asignatura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_asignatura_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_asignatura__line" id="hidden_field_data_id_asignatura_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_asignatura_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_asignatura__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_asignatura_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_asignatura_"]) &&  $this->nmgp_cmp_readonly["id_asignatura_"] == "on") { 

 ?>
<input type="hidden" name="id_asignatura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_asignatura_) . "\">" . $id_asignatura_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_asignatura_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_asignatura_<?php echo $sc_seq_vert ?> css_id_asignatura__line" style="<?php echo $sStyleReadLab_id_asignatura_; ?>"><?php echo $this->form_encode_input($this->id_asignatura_); ?></span><span id="id_read_off_id_asignatura_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_asignatura_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_asignatura__obj" style="" id="id_sc_field_id_asignatura_<?php echo $sc_seq_vert ?>" type=text name="id_asignatura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_asignatura_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_asignatura_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_asignatura_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_asignatura_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_asignatura_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_grupo_']) && $this->nmgp_cmp_hidden['id_grupo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_grupo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grupo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_grupo__line" id="hidden_field_data_id_grupo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_grupo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_grupo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_grupo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_grupo_"]) &&  $this->nmgp_cmp_readonly["id_grupo_"] == "on") { 

 ?>
<input type="hidden" name="id_grupo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grupo_) . "\">" . $id_grupo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_grupo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_grupo_<?php echo $sc_seq_vert ?> css_id_grupo__line" style="<?php echo $sStyleReadLab_id_grupo_; ?>"><?php echo $this->form_encode_input($this->id_grupo_); ?></span><span id="id_read_off_id_grupo_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_grupo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_grupo__obj" style="" id="id_sc_field_id_grupo_<?php echo $sc_seq_vert ?>" type=text name="id_grupo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grupo_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_grupo_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_grupo_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_grupo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_grupo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_']) && $this->nmgp_cmp_hidden['eval_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="eval_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_eval__line" id="hidden_field_data_eval_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_eval_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_eval__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_eval_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["eval_"]) &&  $this->nmgp_cmp_readonly["eval_"] == "on") { 

 ?>
<input type="hidden" name="eval_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_) . "\">" . $eval_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_eval_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-eval_<?php echo $sc_seq_vert ?> css_eval__line" style="<?php echo $sStyleReadLab_eval_; ?>"><?php echo $this->form_encode_input($this->eval_); ?></span><span id="id_read_off_eval_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_eval_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_eval__obj" style="" id="id_sc_field_eval_<?php echo $sc_seq_vert ?>" type=text name="eval_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_) ?>"
 size=4 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['eval_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['eval_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['eval_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_eval_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_eval_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['porcentaje_']) && $this->nmgp_cmp_hidden['porcentaje_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcentaje_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcentaje_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_porcentaje__line" id="hidden_field_data_porcentaje_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_porcentaje_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_porcentaje__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_porcentaje_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcentaje_"]) &&  $this->nmgp_cmp_readonly["porcentaje_"] == "on") { 

 ?>
<input type="hidden" name="porcentaje_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcentaje_) . "\">" . $porcentaje_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcentaje_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-porcentaje_<?php echo $sc_seq_vert ?> css_porcentaje__line" style="<?php echo $sStyleReadLab_porcentaje_; ?>"><?php echo $this->form_encode_input($this->porcentaje_); ?></span><span id="id_read_off_porcentaje_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcentaje_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_porcentaje__obj" style="" id="id_sc_field_porcentaje_<?php echo $sc_seq_vert ?>" type=text name="porcentaje_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcentaje_) ?>"
 size=4 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcentaje_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcentaje_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcentaje_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcentaje_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=4 maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_entorno_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_entorno_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_rel_act_est_per_))
       {
           $this->nmgp_cmp_readonly['id_rel_act_est_per_'] = $sCheckRead_id_rel_act_est_per_;
       }
       if ('display: none;' == $sStyleHidden_id_rel_act_est_per_)
       {
           $this->nmgp_cmp_hidden['id_rel_act_est_per_'] = 'off';
       }
       if (isset($sCheckRead_id_estudent_))
       {
           $this->nmgp_cmp_readonly['id_estudent_'] = $sCheckRead_id_estudent_;
       }
       if ('display: none;' == $sStyleHidden_id_estudent_)
       {
           $this->nmgp_cmp_hidden['id_estudent_'] = 'off';
       }
       if (isset($sCheckRead_actividad_))
       {
           $this->nmgp_cmp_readonly['actividad_'] = $sCheckRead_actividad_;
       }
       if ('display: none;' == $sStyleHidden_actividad_)
       {
           $this->nmgp_cmp_hidden['actividad_'] = 'off';
       }
       if (isset($sCheckRead_codigo_desemp_))
       {
           $this->nmgp_cmp_readonly['codigo_desemp_'] = $sCheckRead_codigo_desemp_;
       }
       if ('display: none;' == $sStyleHidden_codigo_desemp_)
       {
           $this->nmgp_cmp_hidden['codigo_desemp_'] = 'off';
       }
       if (isset($sCheckRead_posicion_))
       {
           $this->nmgp_cmp_readonly['posicion_'] = $sCheckRead_posicion_;
       }
       if ('display: none;' == $sStyleHidden_posicion_)
       {
           $this->nmgp_cmp_hidden['posicion_'] = 'off';
       }
       if (isset($sCheckRead_id_asignatura_))
       {
           $this->nmgp_cmp_readonly['id_asignatura_'] = $sCheckRead_id_asignatura_;
       }
       if ('display: none;' == $sStyleHidden_id_asignatura_)
       {
           $this->nmgp_cmp_hidden['id_asignatura_'] = 'off';
       }
       if (isset($sCheckRead_id_grupo_))
       {
           $this->nmgp_cmp_readonly['id_grupo_'] = $sCheckRead_id_grupo_;
       }
       if ('display: none;' == $sStyleHidden_id_grupo_)
       {
           $this->nmgp_cmp_hidden['id_grupo_'] = 'off';
       }
       if (isset($sCheckRead_eval_))
       {
           $this->nmgp_cmp_readonly['eval_'] = $sCheckRead_eval_;
       }
       if ('display: none;' == $sStyleHidden_eval_)
       {
           $this->nmgp_cmp_hidden['eval_'] = 'off';
       }
       if (isset($sCheckRead_porcentaje_))
       {
           $this->nmgp_cmp_readonly['porcentaje_'] = $sCheckRead_porcentaje_;
       }
       if ('display: none;' == $sStyleHidden_porcentaje_)
       {
           $this->nmgp_cmp_hidden['porcentaje_'] = 'off';
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
       $this->form_vert_form_det_evalua_actividad_dc5 = $guarda_form_vert_form_det_evalua_actividad_dc5;
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R")
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
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['masterValue']);
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
 parent.scAjaxDetailStatus("form_det_evalua_actividad_dc5");
 parent.scAjaxDetailHeight("form_det_evalua_actividad_dc5", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_det_evalua_actividad_dc5", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_det_evalua_actividad_dc5", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_det_evalua_actividad_dc5']['sc_modal'])
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
