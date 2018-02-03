<?php
class form_t_evaluacion_pruebas_form extends form_t_evaluacion_pruebas_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - t_evaluacion"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - t_evaluacion"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_t_evaluacion_pruebas/form_t_evaluacion_pruebas_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_t_evaluacion_pruebas_sajax_js.php");
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
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_t_evaluacion_pruebas_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['recarga'];
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
 include_once("form_t_evaluacion_pruebas_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_t_evaluacion_pruebas'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_t_evaluacion_pruebas'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - t_evaluacion"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - t_evaluacion"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['fast_search'][2] : "";
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
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['empty_filter'] = true;
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


    ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_estudiante_']) && $this->nmgp_cmp_hidden['id_estudiante_'] == 'off') { $sStyleHidden_id_estudiante_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_estudiante_']) || $this->nmgp_cmp_hidden['id_estudiante_'] == 'on') {
      if (!isset($this->nm_new_label['id_estudiante_'])) {
          $this->nm_new_label['id_estudiante_'] = "Id Estudiante"; } ?>

    <TD class="scFormLabelOddMult css_id_estudiante__label" id="hidden_field_label_id_estudiante_" style="<?php echo $sStyleHidden_id_estudiante_; ?>" > <?php echo $this->nm_new_label['id_estudiante_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['primer_apellido_']) && $this->nmgp_cmp_hidden['primer_apellido_'] == 'off') { $sStyleHidden_primer_apellido_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['primer_apellido_']) || $this->nmgp_cmp_hidden['primer_apellido_'] == 'on') {
      if (!isset($this->nm_new_label['primer_apellido_'])) {
          $this->nm_new_label['primer_apellido_'] = "Primer Apellido"; } ?>

    <TD class="scFormLabelOddMult css_primer_apellido__label" id="hidden_field_label_primer_apellido_" style="<?php echo $sStyleHidden_primer_apellido_; ?>" > <?php echo $this->nm_new_label['primer_apellido_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['segundo_apellido_']) && $this->nmgp_cmp_hidden['segundo_apellido_'] == 'off') { $sStyleHidden_segundo_apellido_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['segundo_apellido_']) || $this->nmgp_cmp_hidden['segundo_apellido_'] == 'on') {
      if (!isset($this->nm_new_label['segundo_apellido_'])) {
          $this->nm_new_label['segundo_apellido_'] = "Segundo Apellido"; } ?>

    <TD class="scFormLabelOddMult css_segundo_apellido__label" id="hidden_field_label_segundo_apellido_" style="<?php echo $sStyleHidden_segundo_apellido_; ?>" > <?php echo $this->nm_new_label['segundo_apellido_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['primer_nombre_']) && $this->nmgp_cmp_hidden['primer_nombre_'] == 'off') { $sStyleHidden_primer_nombre_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['primer_nombre_']) || $this->nmgp_cmp_hidden['primer_nombre_'] == 'on') {
      if (!isset($this->nm_new_label['primer_nombre_'])) {
          $this->nm_new_label['primer_nombre_'] = "Primer Nombre"; } ?>

    <TD class="scFormLabelOddMult css_primer_nombre__label" id="hidden_field_label_primer_nombre_" style="<?php echo $sStyleHidden_primer_nombre_; ?>" > <?php echo $this->nm_new_label['primer_nombre_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['segundo_nombre_']) && $this->nmgp_cmp_hidden['segundo_nombre_'] == 'off') { $sStyleHidden_segundo_nombre_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['segundo_nombre_']) || $this->nmgp_cmp_hidden['segundo_nombre_'] == 'on') {
      if (!isset($this->nm_new_label['segundo_nombre_'])) {
          $this->nm_new_label['segundo_nombre_'] = "Segundo Nombre"; } ?>

    <TD class="scFormLabelOddMult css_segundo_nombre__label" id="hidden_field_label_segundo_nombre_" style="<?php echo $sStyleHidden_segundo_nombre_; ?>" > <?php echo $this->nm_new_label['segundo_nombre_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_grupo_']) && $this->nmgp_cmp_hidden['id_grupo_'] == 'off') { $sStyleHidden_id_grupo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_grupo_']) || $this->nmgp_cmp_hidden['id_grupo_'] == 'on') {
      if (!isset($this->nm_new_label['id_grupo_'])) {
          $this->nm_new_label['id_grupo_'] = "Id Grupo"; } ?>

    <TD class="scFormLabelOddMult css_id_grupo__label" id="hidden_field_label_id_grupo_" style="<?php echo $sStyleHidden_id_grupo_; ?>" > <?php echo $this->nm_new_label['id_grupo_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_area_']) && $this->nmgp_cmp_hidden['id_area_'] == 'off') { $sStyleHidden_id_area_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_area_']) || $this->nmgp_cmp_hidden['id_area_'] == 'on') {
      if (!isset($this->nm_new_label['id_area_'])) {
          $this->nm_new_label['id_area_'] = "Id Area"; } ?>

    <TD class="scFormLabelOddMult css_id_area__label" id="hidden_field_label_id_area_" style="<?php echo $sStyleHidden_id_area_; ?>" > <?php echo $this->nm_new_label['id_area_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_asignatura_']) && $this->nmgp_cmp_hidden['id_asignatura_'] == 'off') { $sStyleHidden_id_asignatura_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_asignatura_']) || $this->nmgp_cmp_hidden['id_asignatura_'] == 'on') {
      if (!isset($this->nm_new_label['id_asignatura_'])) {
          $this->nm_new_label['id_asignatura_'] = "Id Asignatura"; } ?>

    <TD class="scFormLabelOddMult css_id_asignatura__label" id="hidden_field_label_id_asignatura_" style="<?php echo $sStyleHidden_id_asignatura_; ?>" > <?php echo $this->nm_new_label['id_asignatura_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_grado_']) && $this->nmgp_cmp_hidden['id_grado_'] == 'off') { $sStyleHidden_id_grado_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_grado_']) || $this->nmgp_cmp_hidden['id_grado_'] == 'on') {
      if (!isset($this->nm_new_label['id_grado_'])) {
          $this->nm_new_label['id_grado_'] = "Id Grado"; } ?>

    <TD class="scFormLabelOddMult css_id_grado__label" id="hidden_field_label_id_grado_" style="<?php echo $sStyleHidden_id_grado_; ?>" > <?php echo $this->nm_new_label['id_grado_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_nivel_']) && $this->nmgp_cmp_hidden['id_nivel_'] == 'off') { $sStyleHidden_id_nivel_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_nivel_']) || $this->nmgp_cmp_hidden['id_nivel_'] == 'on') {
      if (!isset($this->nm_new_label['id_nivel_'])) {
          $this->nm_new_label['id_nivel_'] = "Id Nivel"; } ?>

    <TD class="scFormLabelOddMult css_id_nivel__label" id="hidden_field_label_id_nivel_" style="<?php echo $sStyleHidden_id_nivel_; ?>" > <?php echo $this->nm_new_label['id_nivel_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ihs_']) && $this->nmgp_cmp_hidden['ihs_'] == 'off') { $sStyleHidden_ihs_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ihs_']) || $this->nmgp_cmp_hidden['ihs_'] == 'on') {
      if (!isset($this->nm_new_label['ihs_'])) {
          $this->nm_new_label['ihs_'] = "Ihs"; } ?>

    <TD class="scFormLabelOddMult css_ihs__label" id="hidden_field_label_ihs_" style="<?php echo $sStyleHidden_ihs_; ?>" > <?php echo $this->nm_new_label['ihs_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pfa_']) && $this->nmgp_cmp_hidden['pfa_'] == 'off') { $sStyleHidden_pfa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pfa_']) || $this->nmgp_cmp_hidden['pfa_'] == 'on') {
      if (!isset($this->nm_new_label['pfa_'])) {
          $this->nm_new_label['pfa_'] = "Pfa"; } ?>

    <TD class="scFormLabelOddMult css_pfa__label" id="hidden_field_label_pfa_" style="<?php echo $sStyleHidden_pfa_; ?>" > <?php echo $this->nm_new_label['pfa_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_asig_']) && $this->nmgp_cmp_hidden['tipo_asig_'] == 'off') { $sStyleHidden_tipo_asig_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tipo_asig_']) || $this->nmgp_cmp_hidden['tipo_asig_'] == 'on') {
      if (!isset($this->nm_new_label['tipo_asig_'])) {
          $this->nm_new_label['tipo_asig_'] = "Tipo Asig"; } ?>

    <TD class="scFormLabelOddMult css_tipo_asig__label" id="hidden_field_label_tipo_asig_" style="<?php echo $sStyleHidden_tipo_asig_; ?>" > <?php echo $this->nm_new_label['tipo_asig_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['novedad_']) && $this->nmgp_cmp_hidden['novedad_'] == 'off') { $sStyleHidden_novedad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['novedad_']) || $this->nmgp_cmp_hidden['novedad_'] == 'on') {
      if (!isset($this->nm_new_label['novedad_'])) {
          $this->nm_new_label['novedad_'] = "Novedad"; } ?>

    <TD class="scFormLabelOddMult css_novedad__label" id="hidden_field_label_novedad_" style="<?php echo $sStyleHidden_novedad_; ?>" > <?php echo $this->nm_new_label['novedad_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['estatus_']) && $this->nmgp_cmp_hidden['estatus_'] == 'off') { $sStyleHidden_estatus_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['estatus_']) || $this->nmgp_cmp_hidden['estatus_'] == 'on') {
      if (!isset($this->nm_new_label['estatus_'])) {
          $this->nm_new_label['estatus_'] = "Estatus"; } ?>

    <TD class="scFormLabelOddMult css_estatus__label" id="hidden_field_label_estatus_" style="<?php echo $sStyleHidden_estatus_; ?>" > <?php echo $this->nm_new_label['estatus_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['inasistencia_p1_']) && $this->nmgp_cmp_hidden['inasistencia_p1_'] == 'off') { $sStyleHidden_inasistencia_p1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['inasistencia_p1_']) || $this->nmgp_cmp_hidden['inasistencia_p1_'] == 'on') {
      if (!isset($this->nm_new_label['inasistencia_p1_'])) {
          $this->nm_new_label['inasistencia_p1_'] = "Inasistencia P 1"; } ?>

    <TD class="scFormLabelOddMult css_inasistencia_p1__label" id="hidden_field_label_inasistencia_p1_" style="<?php echo $sStyleHidden_inasistencia_p1_; ?>" > <?php echo $this->nm_new_label['inasistencia_p1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_1_per_']) && $this->nmgp_cmp_hidden['eval_1_per_'] == 'off') { $sStyleHidden_eval_1_per_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['eval_1_per_']) || $this->nmgp_cmp_hidden['eval_1_per_'] == 'on') {
      if (!isset($this->nm_new_label['eval_1_per_'])) {
          $this->nm_new_label['eval_1_per_'] = "Eval 1 Per"; } ?>

    <TD class="scFormLabelOddMult css_eval_1_per__label" id="hidden_field_label_eval_1_per_" style="<?php echo $sStyleHidden_eval_1_per_; ?>" > <?php echo $this->nm_new_label['eval_1_per_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc1_']) && $this->nmgp_cmp_hidden['dc1_'] == 'off') { $sStyleHidden_dc1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc1_']) || $this->nmgp_cmp_hidden['dc1_'] == 'on') {
      if (!isset($this->nm_new_label['dc1_'])) {
          $this->nm_new_label['dc1_'] = "Dc 1"; } ?>

    <TD class="scFormLabelOddMult css_dc1__label" id="hidden_field_label_dc1_" style="<?php echo $sStyleHidden_dc1_; ?>" > <?php echo $this->nm_new_label['dc1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc2_']) && $this->nmgp_cmp_hidden['dc2_'] == 'off') { $sStyleHidden_dc2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc2_']) || $this->nmgp_cmp_hidden['dc2_'] == 'on') {
      if (!isset($this->nm_new_label['dc2_'])) {
          $this->nm_new_label['dc2_'] = "Dc 2"; } ?>

    <TD class="scFormLabelOddMult css_dc2__label" id="hidden_field_label_dc2_" style="<?php echo $sStyleHidden_dc2_; ?>" > <?php echo $this->nm_new_label['dc2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc3_']) && $this->nmgp_cmp_hidden['dc3_'] == 'off') { $sStyleHidden_dc3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc3_']) || $this->nmgp_cmp_hidden['dc3_'] == 'on') {
      if (!isset($this->nm_new_label['dc3_'])) {
          $this->nm_new_label['dc3_'] = "Dc 3"; } ?>

    <TD class="scFormLabelOddMult css_dc3__label" id="hidden_field_label_dc3_" style="<?php echo $sStyleHidden_dc3_; ?>" > <?php echo $this->nm_new_label['dc3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc4_']) && $this->nmgp_cmp_hidden['dc4_'] == 'off') { $sStyleHidden_dc4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc4_']) || $this->nmgp_cmp_hidden['dc4_'] == 'on') {
      if (!isset($this->nm_new_label['dc4_'])) {
          $this->nm_new_label['dc4_'] = "Dc 4"; } ?>

    <TD class="scFormLabelOddMult css_dc4__label" id="hidden_field_label_dc4_" style="<?php echo $sStyleHidden_dc4_; ?>" > <?php echo $this->nm_new_label['dc4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc5_']) && $this->nmgp_cmp_hidden['dc5_'] == 'off') { $sStyleHidden_dc5_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc5_']) || $this->nmgp_cmp_hidden['dc5_'] == 'on') {
      if (!isset($this->nm_new_label['dc5_'])) {
          $this->nm_new_label['dc5_'] = "Dc 5"; } ?>

    <TD class="scFormLabelOddMult css_dc5__label" id="hidden_field_label_dc5_" style="<?php echo $sStyleHidden_dc5_; ?>" > <?php echo $this->nm_new_label['dc5_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc6_']) && $this->nmgp_cmp_hidden['dc6_'] == 'off') { $sStyleHidden_dc6_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc6_']) || $this->nmgp_cmp_hidden['dc6_'] == 'on') {
      if (!isset($this->nm_new_label['dc6_'])) {
          $this->nm_new_label['dc6_'] = "Dc 6"; } ?>

    <TD class="scFormLabelOddMult css_dc6__label" id="hidden_field_label_dc6_" style="<?php echo $sStyleHidden_dc6_; ?>" > <?php echo $this->nm_new_label['dc6_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc7_']) && $this->nmgp_cmp_hidden['dc7_'] == 'off') { $sStyleHidden_dc7_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc7_']) || $this->nmgp_cmp_hidden['dc7_'] == 'on') {
      if (!isset($this->nm_new_label['dc7_'])) {
          $this->nm_new_label['dc7_'] = "Dc 7"; } ?>

    <TD class="scFormLabelOddMult css_dc7__label" id="hidden_field_label_dc7_" style="<?php echo $sStyleHidden_dc7_; ?>" > <?php echo $this->nm_new_label['dc7_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc8_']) && $this->nmgp_cmp_hidden['dc8_'] == 'off') { $sStyleHidden_dc8_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc8_']) || $this->nmgp_cmp_hidden['dc8_'] == 'on') {
      if (!isset($this->nm_new_label['dc8_'])) {
          $this->nm_new_label['dc8_'] = "Dc 8"; } ?>

    <TD class="scFormLabelOddMult css_dc8__label" id="hidden_field_label_dc8_" style="<?php echo $sStyleHidden_dc8_; ?>" > <?php echo $this->nm_new_label['dc8_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc9_']) && $this->nmgp_cmp_hidden['dc9_'] == 'off') { $sStyleHidden_dc9_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc9_']) || $this->nmgp_cmp_hidden['dc9_'] == 'on') {
      if (!isset($this->nm_new_label['dc9_'])) {
          $this->nm_new_label['dc9_'] = "Dc 9"; } ?>

    <TD class="scFormLabelOddMult css_dc9__label" id="hidden_field_label_dc9_" style="<?php echo $sStyleHidden_dc9_; ?>" > <?php echo $this->nm_new_label['dc9_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dc_']) && $this->nmgp_cmp_hidden['pcent_dc_'] == 'off') { $sStyleHidden_pcent_dc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_dc_']) || $this->nmgp_cmp_hidden['pcent_dc_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_dc_'])) {
          $this->nm_new_label['pcent_dc_'] = "Pcent Dc"; } ?>

    <TD class="scFormLabelOddMult css_pcent_dc__label" id="hidden_field_label_pcent_dc_" style="<?php echo $sStyleHidden_pcent_dc_; ?>" > <?php echo $this->nm_new_label['pcent_dc_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds1_']) && $this->nmgp_cmp_hidden['ds1_'] == 'off') { $sStyleHidden_ds1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds1_']) || $this->nmgp_cmp_hidden['ds1_'] == 'on') {
      if (!isset($this->nm_new_label['ds1_'])) {
          $this->nm_new_label['ds1_'] = "Ds 1"; } ?>

    <TD class="scFormLabelOddMult css_ds1__label" id="hidden_field_label_ds1_" style="<?php echo $sStyleHidden_ds1_; ?>" > <?php echo $this->nm_new_label['ds1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds2_']) && $this->nmgp_cmp_hidden['ds2_'] == 'off') { $sStyleHidden_ds2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds2_']) || $this->nmgp_cmp_hidden['ds2_'] == 'on') {
      if (!isset($this->nm_new_label['ds2_'])) {
          $this->nm_new_label['ds2_'] = "Ds 2"; } ?>

    <TD class="scFormLabelOddMult css_ds2__label" id="hidden_field_label_ds2_" style="<?php echo $sStyleHidden_ds2_; ?>" > <?php echo $this->nm_new_label['ds2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds3_']) && $this->nmgp_cmp_hidden['ds3_'] == 'off') { $sStyleHidden_ds3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds3_']) || $this->nmgp_cmp_hidden['ds3_'] == 'on') {
      if (!isset($this->nm_new_label['ds3_'])) {
          $this->nm_new_label['ds3_'] = "Ds 3"; } ?>

    <TD class="scFormLabelOddMult css_ds3__label" id="hidden_field_label_ds3_" style="<?php echo $sStyleHidden_ds3_; ?>" > <?php echo $this->nm_new_label['ds3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds4_']) && $this->nmgp_cmp_hidden['ds4_'] == 'off') { $sStyleHidden_ds4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds4_']) || $this->nmgp_cmp_hidden['ds4_'] == 'on') {
      if (!isset($this->nm_new_label['ds4_'])) {
          $this->nm_new_label['ds4_'] = "Ds 4"; } ?>

    <TD class="scFormLabelOddMult css_ds4__label" id="hidden_field_label_ds4_" style="<?php echo $sStyleHidden_ds4_; ?>" > <?php echo $this->nm_new_label['ds4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds5_']) && $this->nmgp_cmp_hidden['ds5_'] == 'off') { $sStyleHidden_ds5_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds5_']) || $this->nmgp_cmp_hidden['ds5_'] == 'on') {
      if (!isset($this->nm_new_label['ds5_'])) {
          $this->nm_new_label['ds5_'] = "Ds 5"; } ?>

    <TD class="scFormLabelOddMult css_ds5__label" id="hidden_field_label_ds5_" style="<?php echo $sStyleHidden_ds5_; ?>" > <?php echo $this->nm_new_label['ds5_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_ds_']) && $this->nmgp_cmp_hidden['pcent_ds_'] == 'off') { $sStyleHidden_pcent_ds_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_ds_']) || $this->nmgp_cmp_hidden['pcent_ds_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_ds_'])) {
          $this->nm_new_label['pcent_ds_'] = "Pcent Ds"; } ?>

    <TD class="scFormLabelOddMult css_pcent_ds__label" id="hidden_field_label_pcent_ds_" style="<?php echo $sStyleHidden_pcent_ds_; ?>" > <?php echo $this->nm_new_label['pcent_ds_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp1_']) && $this->nmgp_cmp_hidden['dp1_'] == 'off') { $sStyleHidden_dp1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp1_']) || $this->nmgp_cmp_hidden['dp1_'] == 'on') {
      if (!isset($this->nm_new_label['dp1_'])) {
          $this->nm_new_label['dp1_'] = "Dp 1"; } ?>

    <TD class="scFormLabelOddMult css_dp1__label" id="hidden_field_label_dp1_" style="<?php echo $sStyleHidden_dp1_; ?>" > <?php echo $this->nm_new_label['dp1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp2_']) && $this->nmgp_cmp_hidden['dp2_'] == 'off') { $sStyleHidden_dp2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp2_']) || $this->nmgp_cmp_hidden['dp2_'] == 'on') {
      if (!isset($this->nm_new_label['dp2_'])) {
          $this->nm_new_label['dp2_'] = "Dp 2"; } ?>

    <TD class="scFormLabelOddMult css_dp2__label" id="hidden_field_label_dp2_" style="<?php echo $sStyleHidden_dp2_; ?>" > <?php echo $this->nm_new_label['dp2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp3_']) && $this->nmgp_cmp_hidden['dp3_'] == 'off') { $sStyleHidden_dp3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp3_']) || $this->nmgp_cmp_hidden['dp3_'] == 'on') {
      if (!isset($this->nm_new_label['dp3_'])) {
          $this->nm_new_label['dp3_'] = "Dp 3"; } ?>

    <TD class="scFormLabelOddMult css_dp3__label" id="hidden_field_label_dp3_" style="<?php echo $sStyleHidden_dp3_; ?>" > <?php echo $this->nm_new_label['dp3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp4_']) && $this->nmgp_cmp_hidden['dp4_'] == 'off') { $sStyleHidden_dp4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp4_']) || $this->nmgp_cmp_hidden['dp4_'] == 'on') {
      if (!isset($this->nm_new_label['dp4_'])) {
          $this->nm_new_label['dp4_'] = "Dp 4"; } ?>

    <TD class="scFormLabelOddMult css_dp4__label" id="hidden_field_label_dp4_" style="<?php echo $sStyleHidden_dp4_; ?>" > <?php echo $this->nm_new_label['dp4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp5_']) && $this->nmgp_cmp_hidden['dp5_'] == 'off') { $sStyleHidden_dp5_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp5_']) || $this->nmgp_cmp_hidden['dp5_'] == 'on') {
      if (!isset($this->nm_new_label['dp5_'])) {
          $this->nm_new_label['dp5_'] = "Dp 5"; } ?>

    <TD class="scFormLabelOddMult css_dp5__label" id="hidden_field_label_dp5_" style="<?php echo $sStyleHidden_dp5_; ?>" > <?php echo $this->nm_new_label['dp5_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dp_']) && $this->nmgp_cmp_hidden['pcent_dp_'] == 'off') { $sStyleHidden_pcent_dp_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_dp_']) || $this->nmgp_cmp_hidden['pcent_dp_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_dp_'])) {
          $this->nm_new_label['pcent_dp_'] = "Pcent Dp"; } ?>

    <TD class="scFormLabelOddMult css_pcent_dp__label" id="hidden_field_label_pcent_dp_" style="<?php echo $sStyleHidden_pcent_dp_; ?>" > <?php echo $this->nm_new_label['pcent_dp_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['aeep1_']) && $this->nmgp_cmp_hidden['aeep1_'] == 'off') { $sStyleHidden_aeep1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['aeep1_']) || $this->nmgp_cmp_hidden['aeep1_'] == 'on') {
      if (!isset($this->nm_new_label['aeep1_'])) {
          $this->nm_new_label['aeep1_'] = "Aeep 1"; } ?>

    <TD class="scFormLabelOddMult css_aeep1__label" id="hidden_field_label_aeep1_" style="<?php echo $sStyleHidden_aeep1_; ?>" > <?php echo $this->nm_new_label['aeep1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['porcent_aeep1_']) && $this->nmgp_cmp_hidden['porcent_aeep1_'] == 'off') { $sStyleHidden_porcent_aeep1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['porcent_aeep1_']) || $this->nmgp_cmp_hidden['porcent_aeep1_'] == 'on') {
      if (!isset($this->nm_new_label['porcent_aeep1_'])) {
          $this->nm_new_label['porcent_aeep1_'] = "Porcent Aeep 1"; } ?>

    <TD class="scFormLabelOddMult css_porcent_aeep1__label" id="hidden_field_label_porcent_aeep1_" style="<?php echo $sStyleHidden_porcent_aeep1_; ?>" > <?php echo $this->nm_new_label['porcent_aeep1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['inasistencia_p2_']) && $this->nmgp_cmp_hidden['inasistencia_p2_'] == 'off') { $sStyleHidden_inasistencia_p2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['inasistencia_p2_']) || $this->nmgp_cmp_hidden['inasistencia_p2_'] == 'on') {
      if (!isset($this->nm_new_label['inasistencia_p2_'])) {
          $this->nm_new_label['inasistencia_p2_'] = "Inasistencia P 2"; } ?>

    <TD class="scFormLabelOddMult css_inasistencia_p2__label" id="hidden_field_label_inasistencia_p2_" style="<?php echo $sStyleHidden_inasistencia_p2_; ?>" > <?php echo $this->nm_new_label['inasistencia_p2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_2_per_']) && $this->nmgp_cmp_hidden['eval_2_per_'] == 'off') { $sStyleHidden_eval_2_per_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['eval_2_per_']) || $this->nmgp_cmp_hidden['eval_2_per_'] == 'on') {
      if (!isset($this->nm_new_label['eval_2_per_'])) {
          $this->nm_new_label['eval_2_per_'] = "Eval 2 Per"; } ?>

    <TD class="scFormLabelOddMult css_eval_2_per__label" id="hidden_field_label_eval_2_per_" style="<?php echo $sStyleHidden_eval_2_per_; ?>" > <?php echo $this->nm_new_label['eval_2_per_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc1_2p_']) && $this->nmgp_cmp_hidden['dc1_2p_'] == 'off') { $sStyleHidden_dc1_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc1_2p_']) || $this->nmgp_cmp_hidden['dc1_2p_'] == 'on') {
      if (!isset($this->nm_new_label['dc1_2p_'])) {
          $this->nm_new_label['dc1_2p_'] = "Dc 1 2p"; } ?>

    <TD class="scFormLabelOddMult css_dc1_2p__label" id="hidden_field_label_dc1_2p_" style="<?php echo $sStyleHidden_dc1_2p_; ?>" > <?php echo $this->nm_new_label['dc1_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc2_2p_']) && $this->nmgp_cmp_hidden['dc2_2p_'] == 'off') { $sStyleHidden_dc2_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc2_2p_']) || $this->nmgp_cmp_hidden['dc2_2p_'] == 'on') {
      if (!isset($this->nm_new_label['dc2_2p_'])) {
          $this->nm_new_label['dc2_2p_'] = "Dc 2 2p"; } ?>

    <TD class="scFormLabelOddMult css_dc2_2p__label" id="hidden_field_label_dc2_2p_" style="<?php echo $sStyleHidden_dc2_2p_; ?>" > <?php echo $this->nm_new_label['dc2_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc3_2p_']) && $this->nmgp_cmp_hidden['dc3_2p_'] == 'off') { $sStyleHidden_dc3_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc3_2p_']) || $this->nmgp_cmp_hidden['dc3_2p_'] == 'on') {
      if (!isset($this->nm_new_label['dc3_2p_'])) {
          $this->nm_new_label['dc3_2p_'] = "Dc 3 2p"; } ?>

    <TD class="scFormLabelOddMult css_dc3_2p__label" id="hidden_field_label_dc3_2p_" style="<?php echo $sStyleHidden_dc3_2p_; ?>" > <?php echo $this->nm_new_label['dc3_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc4_2p_']) && $this->nmgp_cmp_hidden['dc4_2p_'] == 'off') { $sStyleHidden_dc4_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc4_2p_']) || $this->nmgp_cmp_hidden['dc4_2p_'] == 'on') {
      if (!isset($this->nm_new_label['dc4_2p_'])) {
          $this->nm_new_label['dc4_2p_'] = "Dc 4 2p"; } ?>

    <TD class="scFormLabelOddMult css_dc4_2p__label" id="hidden_field_label_dc4_2p_" style="<?php echo $sStyleHidden_dc4_2p_; ?>" > <?php echo $this->nm_new_label['dc4_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc5_2p_']) && $this->nmgp_cmp_hidden['dc5_2p_'] == 'off') { $sStyleHidden_dc5_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc5_2p_']) || $this->nmgp_cmp_hidden['dc5_2p_'] == 'on') {
      if (!isset($this->nm_new_label['dc5_2p_'])) {
          $this->nm_new_label['dc5_2p_'] = "Dc 5 2p"; } ?>

    <TD class="scFormLabelOddMult css_dc5_2p__label" id="hidden_field_label_dc5_2p_" style="<?php echo $sStyleHidden_dc5_2p_; ?>" > <?php echo $this->nm_new_label['dc5_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dc2_']) && $this->nmgp_cmp_hidden['pcent_dc2_'] == 'off') { $sStyleHidden_pcent_dc2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_dc2_']) || $this->nmgp_cmp_hidden['pcent_dc2_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_dc2_'])) {
          $this->nm_new_label['pcent_dc2_'] = "Pcent Dc 2"; } ?>

    <TD class="scFormLabelOddMult css_pcent_dc2__label" id="hidden_field_label_pcent_dc2_" style="<?php echo $sStyleHidden_pcent_dc2_; ?>" > <?php echo $this->nm_new_label['pcent_dc2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds1_2p_']) && $this->nmgp_cmp_hidden['ds1_2p_'] == 'off') { $sStyleHidden_ds1_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds1_2p_']) || $this->nmgp_cmp_hidden['ds1_2p_'] == 'on') {
      if (!isset($this->nm_new_label['ds1_2p_'])) {
          $this->nm_new_label['ds1_2p_'] = "Ds 1 2p"; } ?>

    <TD class="scFormLabelOddMult css_ds1_2p__label" id="hidden_field_label_ds1_2p_" style="<?php echo $sStyleHidden_ds1_2p_; ?>" > <?php echo $this->nm_new_label['ds1_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds2_2p_']) && $this->nmgp_cmp_hidden['ds2_2p_'] == 'off') { $sStyleHidden_ds2_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds2_2p_']) || $this->nmgp_cmp_hidden['ds2_2p_'] == 'on') {
      if (!isset($this->nm_new_label['ds2_2p_'])) {
          $this->nm_new_label['ds2_2p_'] = "Ds 2 2p"; } ?>

    <TD class="scFormLabelOddMult css_ds2_2p__label" id="hidden_field_label_ds2_2p_" style="<?php echo $sStyleHidden_ds2_2p_; ?>" > <?php echo $this->nm_new_label['ds2_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds3_2p_']) && $this->nmgp_cmp_hidden['ds3_2p_'] == 'off') { $sStyleHidden_ds3_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds3_2p_']) || $this->nmgp_cmp_hidden['ds3_2p_'] == 'on') {
      if (!isset($this->nm_new_label['ds3_2p_'])) {
          $this->nm_new_label['ds3_2p_'] = "Ds 3 2p"; } ?>

    <TD class="scFormLabelOddMult css_ds3_2p__label" id="hidden_field_label_ds3_2p_" style="<?php echo $sStyleHidden_ds3_2p_; ?>" > <?php echo $this->nm_new_label['ds3_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds4_2p_']) && $this->nmgp_cmp_hidden['ds4_2p_'] == 'off') { $sStyleHidden_ds4_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds4_2p_']) || $this->nmgp_cmp_hidden['ds4_2p_'] == 'on') {
      if (!isset($this->nm_new_label['ds4_2p_'])) {
          $this->nm_new_label['ds4_2p_'] = "Ds 4 2p"; } ?>

    <TD class="scFormLabelOddMult css_ds4_2p__label" id="hidden_field_label_ds4_2p_" style="<?php echo $sStyleHidden_ds4_2p_; ?>" > <?php echo $this->nm_new_label['ds4_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds5_2p_']) && $this->nmgp_cmp_hidden['ds5_2p_'] == 'off') { $sStyleHidden_ds5_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds5_2p_']) || $this->nmgp_cmp_hidden['ds5_2p_'] == 'on') {
      if (!isset($this->nm_new_label['ds5_2p_'])) {
          $this->nm_new_label['ds5_2p_'] = "Ds 5 2p"; } ?>

    <TD class="scFormLabelOddMult css_ds5_2p__label" id="hidden_field_label_ds5_2p_" style="<?php echo $sStyleHidden_ds5_2p_; ?>" > <?php echo $this->nm_new_label['ds5_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_ds2_']) && $this->nmgp_cmp_hidden['pcent_ds2_'] == 'off') { $sStyleHidden_pcent_ds2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_ds2_']) || $this->nmgp_cmp_hidden['pcent_ds2_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_ds2_'])) {
          $this->nm_new_label['pcent_ds2_'] = "Pcent Ds 2"; } ?>

    <TD class="scFormLabelOddMult css_pcent_ds2__label" id="hidden_field_label_pcent_ds2_" style="<?php echo $sStyleHidden_pcent_ds2_; ?>" > <?php echo $this->nm_new_label['pcent_ds2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp1_2p_']) && $this->nmgp_cmp_hidden['dp1_2p_'] == 'off') { $sStyleHidden_dp1_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp1_2p_']) || $this->nmgp_cmp_hidden['dp1_2p_'] == 'on') {
      if (!isset($this->nm_new_label['dp1_2p_'])) {
          $this->nm_new_label['dp1_2p_'] = "Dp 1 2p"; } ?>

    <TD class="scFormLabelOddMult css_dp1_2p__label" id="hidden_field_label_dp1_2p_" style="<?php echo $sStyleHidden_dp1_2p_; ?>" > <?php echo $this->nm_new_label['dp1_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp2_2p_']) && $this->nmgp_cmp_hidden['dp2_2p_'] == 'off') { $sStyleHidden_dp2_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp2_2p_']) || $this->nmgp_cmp_hidden['dp2_2p_'] == 'on') {
      if (!isset($this->nm_new_label['dp2_2p_'])) {
          $this->nm_new_label['dp2_2p_'] = "Dp 2 2p"; } ?>

    <TD class="scFormLabelOddMult css_dp2_2p__label" id="hidden_field_label_dp2_2p_" style="<?php echo $sStyleHidden_dp2_2p_; ?>" > <?php echo $this->nm_new_label['dp2_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp3_2p_']) && $this->nmgp_cmp_hidden['dp3_2p_'] == 'off') { $sStyleHidden_dp3_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp3_2p_']) || $this->nmgp_cmp_hidden['dp3_2p_'] == 'on') {
      if (!isset($this->nm_new_label['dp3_2p_'])) {
          $this->nm_new_label['dp3_2p_'] = "Dp 3 2p"; } ?>

    <TD class="scFormLabelOddMult css_dp3_2p__label" id="hidden_field_label_dp3_2p_" style="<?php echo $sStyleHidden_dp3_2p_; ?>" > <?php echo $this->nm_new_label['dp3_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp4_2p_']) && $this->nmgp_cmp_hidden['dp4_2p_'] == 'off') { $sStyleHidden_dp4_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp4_2p_']) || $this->nmgp_cmp_hidden['dp4_2p_'] == 'on') {
      if (!isset($this->nm_new_label['dp4_2p_'])) {
          $this->nm_new_label['dp4_2p_'] = "Dp 4 2p"; } ?>

    <TD class="scFormLabelOddMult css_dp4_2p__label" id="hidden_field_label_dp4_2p_" style="<?php echo $sStyleHidden_dp4_2p_; ?>" > <?php echo $this->nm_new_label['dp4_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp5_2p_']) && $this->nmgp_cmp_hidden['dp5_2p_'] == 'off') { $sStyleHidden_dp5_2p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp5_2p_']) || $this->nmgp_cmp_hidden['dp5_2p_'] == 'on') {
      if (!isset($this->nm_new_label['dp5_2p_'])) {
          $this->nm_new_label['dp5_2p_'] = "Dp 5 2p"; } ?>

    <TD class="scFormLabelOddMult css_dp5_2p__label" id="hidden_field_label_dp5_2p_" style="<?php echo $sStyleHidden_dp5_2p_; ?>" > <?php echo $this->nm_new_label['dp5_2p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dp2_']) && $this->nmgp_cmp_hidden['pcent_dp2_'] == 'off') { $sStyleHidden_pcent_dp2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_dp2_']) || $this->nmgp_cmp_hidden['pcent_dp2_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_dp2_'])) {
          $this->nm_new_label['pcent_dp2_'] = "Pcent Dp 2"; } ?>

    <TD class="scFormLabelOddMult css_pcent_dp2__label" id="hidden_field_label_pcent_dp2_" style="<?php echo $sStyleHidden_pcent_dp2_; ?>" > <?php echo $this->nm_new_label['pcent_dp2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['aee_p2_']) && $this->nmgp_cmp_hidden['aee_p2_'] == 'off') { $sStyleHidden_aee_p2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['aee_p2_']) || $this->nmgp_cmp_hidden['aee_p2_'] == 'on') {
      if (!isset($this->nm_new_label['aee_p2_'])) {
          $this->nm_new_label['aee_p2_'] = "Aee P 2"; } ?>

    <TD class="scFormLabelOddMult css_aee_p2__label" id="hidden_field_label_aee_p2_" style="<?php echo $sStyleHidden_aee_p2_; ?>" > <?php echo $this->nm_new_label['aee_p2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['porcet_aee_p2_']) && $this->nmgp_cmp_hidden['porcet_aee_p2_'] == 'off') { $sStyleHidden_porcet_aee_p2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['porcet_aee_p2_']) || $this->nmgp_cmp_hidden['porcet_aee_p2_'] == 'on') {
      if (!isset($this->nm_new_label['porcet_aee_p2_'])) {
          $this->nm_new_label['porcet_aee_p2_'] = "Porcet Aee P 2"; } ?>

    <TD class="scFormLabelOddMult css_porcet_aee_p2__label" id="hidden_field_label_porcet_aee_p2_" style="<?php echo $sStyleHidden_porcet_aee_p2_; ?>" > <?php echo $this->nm_new_label['porcet_aee_p2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['inasistencia_p3_']) && $this->nmgp_cmp_hidden['inasistencia_p3_'] == 'off') { $sStyleHidden_inasistencia_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['inasistencia_p3_']) || $this->nmgp_cmp_hidden['inasistencia_p3_'] == 'on') {
      if (!isset($this->nm_new_label['inasistencia_p3_'])) {
          $this->nm_new_label['inasistencia_p3_'] = "Inasistencia P 3"; } ?>

    <TD class="scFormLabelOddMult css_inasistencia_p3__label" id="hidden_field_label_inasistencia_p3_" style="<?php echo $sStyleHidden_inasistencia_p3_; ?>" > <?php echo $this->nm_new_label['inasistencia_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_3_per_']) && $this->nmgp_cmp_hidden['eval_3_per_'] == 'off') { $sStyleHidden_eval_3_per_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['eval_3_per_']) || $this->nmgp_cmp_hidden['eval_3_per_'] == 'on') {
      if (!isset($this->nm_new_label['eval_3_per_'])) {
          $this->nm_new_label['eval_3_per_'] = "Eval 3 Per"; } ?>

    <TD class="scFormLabelOddMult css_eval_3_per__label" id="hidden_field_label_eval_3_per_" style="<?php echo $sStyleHidden_eval_3_per_; ?>" > <?php echo $this->nm_new_label['eval_3_per_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc1_3p_']) && $this->nmgp_cmp_hidden['dc1_3p_'] == 'off') { $sStyleHidden_dc1_3p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc1_3p_']) || $this->nmgp_cmp_hidden['dc1_3p_'] == 'on') {
      if (!isset($this->nm_new_label['dc1_3p_'])) {
          $this->nm_new_label['dc1_3p_'] = "Dc 1 3p"; } ?>

    <TD class="scFormLabelOddMult css_dc1_3p__label" id="hidden_field_label_dc1_3p_" style="<?php echo $sStyleHidden_dc1_3p_; ?>" > <?php echo $this->nm_new_label['dc1_3p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc2_3p_']) && $this->nmgp_cmp_hidden['dc2_3p_'] == 'off') { $sStyleHidden_dc2_3p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc2_3p_']) || $this->nmgp_cmp_hidden['dc2_3p_'] == 'on') {
      if (!isset($this->nm_new_label['dc2_3p_'])) {
          $this->nm_new_label['dc2_3p_'] = "Dc 2 3p"; } ?>

    <TD class="scFormLabelOddMult css_dc2_3p__label" id="hidden_field_label_dc2_3p_" style="<?php echo $sStyleHidden_dc2_3p_; ?>" > <?php echo $this->nm_new_label['dc2_3p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc3_3p_']) && $this->nmgp_cmp_hidden['dc3_3p_'] == 'off') { $sStyleHidden_dc3_3p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc3_3p_']) || $this->nmgp_cmp_hidden['dc3_3p_'] == 'on') {
      if (!isset($this->nm_new_label['dc3_3p_'])) {
          $this->nm_new_label['dc3_3p_'] = "Dc 3 3p"; } ?>

    <TD class="scFormLabelOddMult css_dc3_3p__label" id="hidden_field_label_dc3_3p_" style="<?php echo $sStyleHidden_dc3_3p_; ?>" > <?php echo $this->nm_new_label['dc3_3p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc4_3p_']) && $this->nmgp_cmp_hidden['dc4_3p_'] == 'off') { $sStyleHidden_dc4_3p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc4_3p_']) || $this->nmgp_cmp_hidden['dc4_3p_'] == 'on') {
      if (!isset($this->nm_new_label['dc4_3p_'])) {
          $this->nm_new_label['dc4_3p_'] = "Dc 4 3p"; } ?>

    <TD class="scFormLabelOddMult css_dc4_3p__label" id="hidden_field_label_dc4_3p_" style="<?php echo $sStyleHidden_dc4_3p_; ?>" > <?php echo $this->nm_new_label['dc4_3p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc5_3p_']) && $this->nmgp_cmp_hidden['dc5_3p_'] == 'off') { $sStyleHidden_dc5_3p_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc5_3p_']) || $this->nmgp_cmp_hidden['dc5_3p_'] == 'on') {
      if (!isset($this->nm_new_label['dc5_3p_'])) {
          $this->nm_new_label['dc5_3p_'] = "Dc 5 3p"; } ?>

    <TD class="scFormLabelOddMult css_dc5_3p__label" id="hidden_field_label_dc5_3p_" style="<?php echo $sStyleHidden_dc5_3p_; ?>" > <?php echo $this->nm_new_label['dc5_3p_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dc3_']) && $this->nmgp_cmp_hidden['pcent_dc3_'] == 'off') { $sStyleHidden_pcent_dc3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_dc3_']) || $this->nmgp_cmp_hidden['pcent_dc3_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_dc3_'])) {
          $this->nm_new_label['pcent_dc3_'] = "Pcent Dc 3"; } ?>

    <TD class="scFormLabelOddMult css_pcent_dc3__label" id="hidden_field_label_pcent_dc3_" style="<?php echo $sStyleHidden_pcent_dc3_; ?>" > <?php echo $this->nm_new_label['pcent_dc3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds1_p3_']) && $this->nmgp_cmp_hidden['ds1_p3_'] == 'off') { $sStyleHidden_ds1_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds1_p3_']) || $this->nmgp_cmp_hidden['ds1_p3_'] == 'on') {
      if (!isset($this->nm_new_label['ds1_p3_'])) {
          $this->nm_new_label['ds1_p3_'] = "Ds 1 P 3"; } ?>

    <TD class="scFormLabelOddMult css_ds1_p3__label" id="hidden_field_label_ds1_p3_" style="<?php echo $sStyleHidden_ds1_p3_; ?>" > <?php echo $this->nm_new_label['ds1_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds2_p3_']) && $this->nmgp_cmp_hidden['ds2_p3_'] == 'off') { $sStyleHidden_ds2_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds2_p3_']) || $this->nmgp_cmp_hidden['ds2_p3_'] == 'on') {
      if (!isset($this->nm_new_label['ds2_p3_'])) {
          $this->nm_new_label['ds2_p3_'] = "Ds 2 P 3"; } ?>

    <TD class="scFormLabelOddMult css_ds2_p3__label" id="hidden_field_label_ds2_p3_" style="<?php echo $sStyleHidden_ds2_p3_; ?>" > <?php echo $this->nm_new_label['ds2_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds3_p3_']) && $this->nmgp_cmp_hidden['ds3_p3_'] == 'off') { $sStyleHidden_ds3_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds3_p3_']) || $this->nmgp_cmp_hidden['ds3_p3_'] == 'on') {
      if (!isset($this->nm_new_label['ds3_p3_'])) {
          $this->nm_new_label['ds3_p3_'] = "Ds 3 P 3"; } ?>

    <TD class="scFormLabelOddMult css_ds3_p3__label" id="hidden_field_label_ds3_p3_" style="<?php echo $sStyleHidden_ds3_p3_; ?>" > <?php echo $this->nm_new_label['ds3_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds4_p3_']) && $this->nmgp_cmp_hidden['ds4_p3_'] == 'off') { $sStyleHidden_ds4_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds4_p3_']) || $this->nmgp_cmp_hidden['ds4_p3_'] == 'on') {
      if (!isset($this->nm_new_label['ds4_p3_'])) {
          $this->nm_new_label['ds4_p3_'] = "Ds 4 P 3"; } ?>

    <TD class="scFormLabelOddMult css_ds4_p3__label" id="hidden_field_label_ds4_p3_" style="<?php echo $sStyleHidden_ds4_p3_; ?>" > <?php echo $this->nm_new_label['ds4_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ds5_p3_']) && $this->nmgp_cmp_hidden['ds5_p3_'] == 'off') { $sStyleHidden_ds5_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ds5_p3_']) || $this->nmgp_cmp_hidden['ds5_p3_'] == 'on') {
      if (!isset($this->nm_new_label['ds5_p3_'])) {
          $this->nm_new_label['ds5_p3_'] = "Ds 5 P 3"; } ?>

    <TD class="scFormLabelOddMult css_ds5_p3__label" id="hidden_field_label_ds5_p3_" style="<?php echo $sStyleHidden_ds5_p3_; ?>" > <?php echo $this->nm_new_label['ds5_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_ds3_']) && $this->nmgp_cmp_hidden['pcent_ds3_'] == 'off') { $sStyleHidden_pcent_ds3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_ds3_']) || $this->nmgp_cmp_hidden['pcent_ds3_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_ds3_'])) {
          $this->nm_new_label['pcent_ds3_'] = "Pcent Ds 3"; } ?>

    <TD class="scFormLabelOddMult css_pcent_ds3__label" id="hidden_field_label_pcent_ds3_" style="<?php echo $sStyleHidden_pcent_ds3_; ?>" > <?php echo $this->nm_new_label['pcent_ds3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp1_p3_']) && $this->nmgp_cmp_hidden['dp1_p3_'] == 'off') { $sStyleHidden_dp1_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp1_p3_']) || $this->nmgp_cmp_hidden['dp1_p3_'] == 'on') {
      if (!isset($this->nm_new_label['dp1_p3_'])) {
          $this->nm_new_label['dp1_p3_'] = "Dp 1 P 3"; } ?>

    <TD class="scFormLabelOddMult css_dp1_p3__label" id="hidden_field_label_dp1_p3_" style="<?php echo $sStyleHidden_dp1_p3_; ?>" > <?php echo $this->nm_new_label['dp1_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp2_p3_']) && $this->nmgp_cmp_hidden['dp2_p3_'] == 'off') { $sStyleHidden_dp2_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp2_p3_']) || $this->nmgp_cmp_hidden['dp2_p3_'] == 'on') {
      if (!isset($this->nm_new_label['dp2_p3_'])) {
          $this->nm_new_label['dp2_p3_'] = "Dp 2 P 3"; } ?>

    <TD class="scFormLabelOddMult css_dp2_p3__label" id="hidden_field_label_dp2_p3_" style="<?php echo $sStyleHidden_dp2_p3_; ?>" > <?php echo $this->nm_new_label['dp2_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp3_p3_']) && $this->nmgp_cmp_hidden['dp3_p3_'] == 'off') { $sStyleHidden_dp3_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp3_p3_']) || $this->nmgp_cmp_hidden['dp3_p3_'] == 'on') {
      if (!isset($this->nm_new_label['dp3_p3_'])) {
          $this->nm_new_label['dp3_p3_'] = "Dp 3 P 3"; } ?>

    <TD class="scFormLabelOddMult css_dp3_p3__label" id="hidden_field_label_dp3_p3_" style="<?php echo $sStyleHidden_dp3_p3_; ?>" > <?php echo $this->nm_new_label['dp3_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dp4_p3_']) && $this->nmgp_cmp_hidden['dp4_p3_'] == 'off') { $sStyleHidden_dp4_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dp4_p3_']) || $this->nmgp_cmp_hidden['dp4_p3_'] == 'on') {
      if (!isset($this->nm_new_label['dp4_p3_'])) {
          $this->nm_new_label['dp4_p3_'] = "Dp 4 P 3"; } ?>

    <TD class="scFormLabelOddMult css_dp4_p3__label" id="hidden_field_label_dp4_p3_" style="<?php echo $sStyleHidden_dp4_p3_; ?>" > <?php echo $this->nm_new_label['dp4_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off') { $sStyleHidden_sc_field_0_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_0_']) || $this->nmgp_cmp_hidden['sc_field_0_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_0_'])) {
          $this->nm_new_label['sc_field_0_'] = "Dp 5 P 3"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_0__label" id="hidden_field_label_sc_field_0_" style="<?php echo $sStyleHidden_sc_field_0_; ?>" > <?php echo $this->nm_new_label['sc_field_0_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dp3_']) && $this->nmgp_cmp_hidden['pcent_dp3_'] == 'off') { $sStyleHidden_pcent_dp3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_dp3_']) || $this->nmgp_cmp_hidden['pcent_dp3_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_dp3_'])) {
          $this->nm_new_label['pcent_dp3_'] = "Pcent Dp 3"; } ?>

    <TD class="scFormLabelOddMult css_pcent_dp3__label" id="hidden_field_label_pcent_dp3_" style="<?php echo $sStyleHidden_pcent_dp3_; ?>" > <?php echo $this->nm_new_label['pcent_dp3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['aee_p3_']) && $this->nmgp_cmp_hidden['aee_p3_'] == 'off') { $sStyleHidden_aee_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['aee_p3_']) || $this->nmgp_cmp_hidden['aee_p3_'] == 'on') {
      if (!isset($this->nm_new_label['aee_p3_'])) {
          $this->nm_new_label['aee_p3_'] = "Aee P 3"; } ?>

    <TD class="scFormLabelOddMult css_aee_p3__label" id="hidden_field_label_aee_p3_" style="<?php echo $sStyleHidden_aee_p3_; ?>" > <?php echo $this->nm_new_label['aee_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['porcent_aee_p3_']) && $this->nmgp_cmp_hidden['porcent_aee_p3_'] == 'off') { $sStyleHidden_porcent_aee_p3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['porcent_aee_p3_']) || $this->nmgp_cmp_hidden['porcent_aee_p3_'] == 'on') {
      if (!isset($this->nm_new_label['porcent_aee_p3_'])) {
          $this->nm_new_label['porcent_aee_p3_'] = "Porcent Aee P 3"; } ?>

    <TD class="scFormLabelOddMult css_porcent_aee_p3__label" id="hidden_field_label_porcent_aee_p3_" style="<?php echo $sStyleHidden_porcent_aee_p3_; ?>" > <?php echo $this->nm_new_label['porcent_aee_p3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['inasistencia_p4_']) && $this->nmgp_cmp_hidden['inasistencia_p4_'] == 'off') { $sStyleHidden_inasistencia_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['inasistencia_p4_']) || $this->nmgp_cmp_hidden['inasistencia_p4_'] == 'on') {
      if (!isset($this->nm_new_label['inasistencia_p4_'])) {
          $this->nm_new_label['inasistencia_p4_'] = "Inasistencia P 4"; } ?>

    <TD class="scFormLabelOddMult css_inasistencia_p4__label" id="hidden_field_label_inasistencia_p4_" style="<?php echo $sStyleHidden_inasistencia_p4_; ?>" > <?php echo $this->nm_new_label['inasistencia_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_4_per_']) && $this->nmgp_cmp_hidden['eval_4_per_'] == 'off') { $sStyleHidden_eval_4_per_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['eval_4_per_']) || $this->nmgp_cmp_hidden['eval_4_per_'] == 'on') {
      if (!isset($this->nm_new_label['eval_4_per_'])) {
          $this->nm_new_label['eval_4_per_'] = "Eval 4 Per"; } ?>

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

   <?php if (isset($this->nmgp_cmp_hidden['aee_p4_']) && $this->nmgp_cmp_hidden['aee_p4_'] == 'off') { $sStyleHidden_aee_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['aee_p4_']) || $this->nmgp_cmp_hidden['aee_p4_'] == 'on') {
      if (!isset($this->nm_new_label['aee_p4_'])) {
          $this->nm_new_label['aee_p4_'] = "Aee P 4"; } ?>

    <TD class="scFormLabelOddMult css_aee_p4__label" id="hidden_field_label_aee_p4_" style="<?php echo $sStyleHidden_aee_p4_; ?>" > <?php echo $this->nm_new_label['aee_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['porcent_aee_p4_']) && $this->nmgp_cmp_hidden['porcent_aee_p4_'] == 'off') { $sStyleHidden_porcent_aee_p4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['porcent_aee_p4_']) || $this->nmgp_cmp_hidden['porcent_aee_p4_'] == 'on') {
      if (!isset($this->nm_new_label['porcent_aee_p4_'])) {
          $this->nm_new_label['porcent_aee_p4_'] = "Porcent Aee P 4"; } ?>

    <TD class="scFormLabelOddMult css_porcent_aee_p4__label" id="hidden_field_label_porcent_aee_p4_" style="<?php echo $sStyleHidden_porcent_aee_p4_; ?>" > <?php echo $this->nm_new_label['porcent_aee_p4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dp4_']) && $this->nmgp_cmp_hidden['pcent_dp4_'] == 'off') { $sStyleHidden_pcent_dp4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_dp4_']) || $this->nmgp_cmp_hidden['pcent_dp4_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_dp4_'])) {
          $this->nm_new_label['pcent_dp4_'] = "Pcent Dp 4"; } ?>

    <TD class="scFormLabelOddMult css_pcent_dp4__label" id="hidden_field_label_pcent_dp4_" style="<?php echo $sStyleHidden_pcent_dp4_; ?>" > <?php echo $this->nm_new_label['pcent_dp4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_final_']) && $this->nmgp_cmp_hidden['eval_final_'] == 'off') { $sStyleHidden_eval_final_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['eval_final_']) || $this->nmgp_cmp_hidden['eval_final_'] == 'on') {
      if (!isset($this->nm_new_label['eval_final_'])) {
          $this->nm_new_label['eval_final_'] = "Eval Final"; } ?>

    <TD class="scFormLabelOddMult css_eval_final__label" id="hidden_field_label_eval_final_" style="<?php echo $sStyleHidden_eval_final_; ?>" > <?php echo $this->nm_new_label['eval_final_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_t_evaluacion_pruebas);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_t_evaluacion_pruebas = $this->form_vert_form_t_evaluacion_pruebas;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_t_evaluacion_pruebas))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_estudiante_']))
           {
               $this->nmgp_cmp_readonly['id_estudiante_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_grupo_']))
           {
               $this->nmgp_cmp_readonly['id_grupo_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_asignatura_']))
           {
               $this->nmgp_cmp_readonly['id_asignatura_'] = 'on';
           }
   foreach ($this->form_vert_form_t_evaluacion_pruebas as $sc_seq_vert => $sc_lixo)
   {
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_estudiante_'] = true;
           $this->nmgp_cmp_readonly['primer_apellido_'] = true;
           $this->nmgp_cmp_readonly['segundo_apellido_'] = true;
           $this->nmgp_cmp_readonly['primer_nombre_'] = true;
           $this->nmgp_cmp_readonly['segundo_nombre_'] = true;
           $this->nmgp_cmp_readonly['id_grupo_'] = true;
           $this->nmgp_cmp_readonly['id_area_'] = true;
           $this->nmgp_cmp_readonly['id_asignatura_'] = true;
           $this->nmgp_cmp_readonly['id_grado_'] = true;
           $this->nmgp_cmp_readonly['id_nivel_'] = true;
           $this->nmgp_cmp_readonly['ihs_'] = true;
           $this->nmgp_cmp_readonly['pfa_'] = true;
           $this->nmgp_cmp_readonly['tipo_asig_'] = true;
           $this->nmgp_cmp_readonly['novedad_'] = true;
           $this->nmgp_cmp_readonly['estatus_'] = true;
           $this->nmgp_cmp_readonly['inasistencia_p1_'] = true;
           $this->nmgp_cmp_readonly['eval_1_per_'] = true;
           $this->nmgp_cmp_readonly['dc1_'] = true;
           $this->nmgp_cmp_readonly['dc2_'] = true;
           $this->nmgp_cmp_readonly['dc3_'] = true;
           $this->nmgp_cmp_readonly['dc4_'] = true;
           $this->nmgp_cmp_readonly['dc5_'] = true;
           $this->nmgp_cmp_readonly['dc6_'] = true;
           $this->nmgp_cmp_readonly['dc7_'] = true;
           $this->nmgp_cmp_readonly['dc8_'] = true;
           $this->nmgp_cmp_readonly['dc9_'] = true;
           $this->nmgp_cmp_readonly['pcent_dc_'] = true;
           $this->nmgp_cmp_readonly['ds1_'] = true;
           $this->nmgp_cmp_readonly['ds2_'] = true;
           $this->nmgp_cmp_readonly['ds3_'] = true;
           $this->nmgp_cmp_readonly['ds4_'] = true;
           $this->nmgp_cmp_readonly['ds5_'] = true;
           $this->nmgp_cmp_readonly['pcent_ds_'] = true;
           $this->nmgp_cmp_readonly['dp1_'] = true;
           $this->nmgp_cmp_readonly['dp2_'] = true;
           $this->nmgp_cmp_readonly['dp3_'] = true;
           $this->nmgp_cmp_readonly['dp4_'] = true;
           $this->nmgp_cmp_readonly['dp5_'] = true;
           $this->nmgp_cmp_readonly['pcent_dp_'] = true;
           $this->nmgp_cmp_readonly['aeep1_'] = true;
           $this->nmgp_cmp_readonly['porcent_aeep1_'] = true;
           $this->nmgp_cmp_readonly['inasistencia_p2_'] = true;
           $this->nmgp_cmp_readonly['eval_2_per_'] = true;
           $this->nmgp_cmp_readonly['dc1_2p_'] = true;
           $this->nmgp_cmp_readonly['dc2_2p_'] = true;
           $this->nmgp_cmp_readonly['dc3_2p_'] = true;
           $this->nmgp_cmp_readonly['dc4_2p_'] = true;
           $this->nmgp_cmp_readonly['dc5_2p_'] = true;
           $this->nmgp_cmp_readonly['pcent_dc2_'] = true;
           $this->nmgp_cmp_readonly['ds1_2p_'] = true;
           $this->nmgp_cmp_readonly['ds2_2p_'] = true;
           $this->nmgp_cmp_readonly['ds3_2p_'] = true;
           $this->nmgp_cmp_readonly['ds4_2p_'] = true;
           $this->nmgp_cmp_readonly['ds5_2p_'] = true;
           $this->nmgp_cmp_readonly['pcent_ds2_'] = true;
           $this->nmgp_cmp_readonly['dp1_2p_'] = true;
           $this->nmgp_cmp_readonly['dp2_2p_'] = true;
           $this->nmgp_cmp_readonly['dp3_2p_'] = true;
           $this->nmgp_cmp_readonly['dp4_2p_'] = true;
           $this->nmgp_cmp_readonly['dp5_2p_'] = true;
           $this->nmgp_cmp_readonly['pcent_dp2_'] = true;
           $this->nmgp_cmp_readonly['aee_p2_'] = true;
           $this->nmgp_cmp_readonly['porcet_aee_p2_'] = true;
           $this->nmgp_cmp_readonly['inasistencia_p3_'] = true;
           $this->nmgp_cmp_readonly['eval_3_per_'] = true;
           $this->nmgp_cmp_readonly['dc1_3p_'] = true;
           $this->nmgp_cmp_readonly['dc2_3p_'] = true;
           $this->nmgp_cmp_readonly['dc3_3p_'] = true;
           $this->nmgp_cmp_readonly['dc4_3p_'] = true;
           $this->nmgp_cmp_readonly['dc5_3p_'] = true;
           $this->nmgp_cmp_readonly['pcent_dc3_'] = true;
           $this->nmgp_cmp_readonly['ds1_p3_'] = true;
           $this->nmgp_cmp_readonly['ds2_p3_'] = true;
           $this->nmgp_cmp_readonly['ds3_p3_'] = true;
           $this->nmgp_cmp_readonly['ds4_p3_'] = true;
           $this->nmgp_cmp_readonly['ds5_p3_'] = true;
           $this->nmgp_cmp_readonly['pcent_ds3_'] = true;
           $this->nmgp_cmp_readonly['dp1_p3_'] = true;
           $this->nmgp_cmp_readonly['dp2_p3_'] = true;
           $this->nmgp_cmp_readonly['dp3_p3_'] = true;
           $this->nmgp_cmp_readonly['dp4_p3_'] = true;
           $this->nmgp_cmp_readonly['sc_field_0_'] = true;
           $this->nmgp_cmp_readonly['pcent_dp3_'] = true;
           $this->nmgp_cmp_readonly['aee_p3_'] = true;
           $this->nmgp_cmp_readonly['porcent_aee_p3_'] = true;
           $this->nmgp_cmp_readonly['inasistencia_p4_'] = true;
           $this->nmgp_cmp_readonly['eval_4_per_'] = true;
           $this->nmgp_cmp_readonly['dc1_p4_'] = true;
           $this->nmgp_cmp_readonly['dc2_p4_'] = true;
           $this->nmgp_cmp_readonly['dc3_p4_'] = true;
           $this->nmgp_cmp_readonly['dc4_p4_'] = true;
           $this->nmgp_cmp_readonly['dc5_p4_'] = true;
           $this->nmgp_cmp_readonly['pcent_dc4_'] = true;
           $this->nmgp_cmp_readonly['ds1_p4_'] = true;
           $this->nmgp_cmp_readonly['ds2_p4_'] = true;
           $this->nmgp_cmp_readonly['ds3_p4_'] = true;
           $this->nmgp_cmp_readonly['ds4_p4_'] = true;
           $this->nmgp_cmp_readonly['ds5_p4_'] = true;
           $this->nmgp_cmp_readonly['pcent_ds4_'] = true;
           $this->nmgp_cmp_readonly['dp1_p4_'] = true;
           $this->nmgp_cmp_readonly['dp2_p4_'] = true;
           $this->nmgp_cmp_readonly['dp3_p4_'] = true;
           $this->nmgp_cmp_readonly['dp4_p4_'] = true;
           $this->nmgp_cmp_readonly['dp5_p4_'] = true;
           $this->nmgp_cmp_readonly['aee_p4_'] = true;
           $this->nmgp_cmp_readonly['porcent_aee_p4_'] = true;
           $this->nmgp_cmp_readonly['pcent_dp4_'] = true;
           $this->nmgp_cmp_readonly['eval_final_'] = true;
           $this->nmgp_cmp_readonly['entorno_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_estudiante_']) || $this->nmgp_cmp_readonly['id_estudiante_'] != "on") {$this->nmgp_cmp_readonly['id_estudiante_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['primer_apellido_']) || $this->nmgp_cmp_readonly['primer_apellido_'] != "on") {$this->nmgp_cmp_readonly['primer_apellido_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['segundo_apellido_']) || $this->nmgp_cmp_readonly['segundo_apellido_'] != "on") {$this->nmgp_cmp_readonly['segundo_apellido_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['primer_nombre_']) || $this->nmgp_cmp_readonly['primer_nombre_'] != "on") {$this->nmgp_cmp_readonly['primer_nombre_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['segundo_nombre_']) || $this->nmgp_cmp_readonly['segundo_nombre_'] != "on") {$this->nmgp_cmp_readonly['segundo_nombre_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_grupo_']) || $this->nmgp_cmp_readonly['id_grupo_'] != "on") {$this->nmgp_cmp_readonly['id_grupo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_area_']) || $this->nmgp_cmp_readonly['id_area_'] != "on") {$this->nmgp_cmp_readonly['id_area_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_asignatura_']) || $this->nmgp_cmp_readonly['id_asignatura_'] != "on") {$this->nmgp_cmp_readonly['id_asignatura_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_grado_']) || $this->nmgp_cmp_readonly['id_grado_'] != "on") {$this->nmgp_cmp_readonly['id_grado_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_nivel_']) || $this->nmgp_cmp_readonly['id_nivel_'] != "on") {$this->nmgp_cmp_readonly['id_nivel_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ihs_']) || $this->nmgp_cmp_readonly['ihs_'] != "on") {$this->nmgp_cmp_readonly['ihs_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pfa_']) || $this->nmgp_cmp_readonly['pfa_'] != "on") {$this->nmgp_cmp_readonly['pfa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipo_asig_']) || $this->nmgp_cmp_readonly['tipo_asig_'] != "on") {$this->nmgp_cmp_readonly['tipo_asig_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['novedad_']) || $this->nmgp_cmp_readonly['novedad_'] != "on") {$this->nmgp_cmp_readonly['novedad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['estatus_']) || $this->nmgp_cmp_readonly['estatus_'] != "on") {$this->nmgp_cmp_readonly['estatus_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['inasistencia_p1_']) || $this->nmgp_cmp_readonly['inasistencia_p1_'] != "on") {$this->nmgp_cmp_readonly['inasistencia_p1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['eval_1_per_']) || $this->nmgp_cmp_readonly['eval_1_per_'] != "on") {$this->nmgp_cmp_readonly['eval_1_per_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc1_']) || $this->nmgp_cmp_readonly['dc1_'] != "on") {$this->nmgp_cmp_readonly['dc1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc2_']) || $this->nmgp_cmp_readonly['dc2_'] != "on") {$this->nmgp_cmp_readonly['dc2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc3_']) || $this->nmgp_cmp_readonly['dc3_'] != "on") {$this->nmgp_cmp_readonly['dc3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc4_']) || $this->nmgp_cmp_readonly['dc4_'] != "on") {$this->nmgp_cmp_readonly['dc4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc5_']) || $this->nmgp_cmp_readonly['dc5_'] != "on") {$this->nmgp_cmp_readonly['dc5_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc6_']) || $this->nmgp_cmp_readonly['dc6_'] != "on") {$this->nmgp_cmp_readonly['dc6_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc7_']) || $this->nmgp_cmp_readonly['dc7_'] != "on") {$this->nmgp_cmp_readonly['dc7_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc8_']) || $this->nmgp_cmp_readonly['dc8_'] != "on") {$this->nmgp_cmp_readonly['dc8_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc9_']) || $this->nmgp_cmp_readonly['dc9_'] != "on") {$this->nmgp_cmp_readonly['dc9_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dc_']) || $this->nmgp_cmp_readonly['pcent_dc_'] != "on") {$this->nmgp_cmp_readonly['pcent_dc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds1_']) || $this->nmgp_cmp_readonly['ds1_'] != "on") {$this->nmgp_cmp_readonly['ds1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds2_']) || $this->nmgp_cmp_readonly['ds2_'] != "on") {$this->nmgp_cmp_readonly['ds2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds3_']) || $this->nmgp_cmp_readonly['ds3_'] != "on") {$this->nmgp_cmp_readonly['ds3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds4_']) || $this->nmgp_cmp_readonly['ds4_'] != "on") {$this->nmgp_cmp_readonly['ds4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds5_']) || $this->nmgp_cmp_readonly['ds5_'] != "on") {$this->nmgp_cmp_readonly['ds5_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_ds_']) || $this->nmgp_cmp_readonly['pcent_ds_'] != "on") {$this->nmgp_cmp_readonly['pcent_ds_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp1_']) || $this->nmgp_cmp_readonly['dp1_'] != "on") {$this->nmgp_cmp_readonly['dp1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp2_']) || $this->nmgp_cmp_readonly['dp2_'] != "on") {$this->nmgp_cmp_readonly['dp2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp3_']) || $this->nmgp_cmp_readonly['dp3_'] != "on") {$this->nmgp_cmp_readonly['dp3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp4_']) || $this->nmgp_cmp_readonly['dp4_'] != "on") {$this->nmgp_cmp_readonly['dp4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp5_']) || $this->nmgp_cmp_readonly['dp5_'] != "on") {$this->nmgp_cmp_readonly['dp5_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dp_']) || $this->nmgp_cmp_readonly['pcent_dp_'] != "on") {$this->nmgp_cmp_readonly['pcent_dp_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['aeep1_']) || $this->nmgp_cmp_readonly['aeep1_'] != "on") {$this->nmgp_cmp_readonly['aeep1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['porcent_aeep1_']) || $this->nmgp_cmp_readonly['porcent_aeep1_'] != "on") {$this->nmgp_cmp_readonly['porcent_aeep1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['inasistencia_p2_']) || $this->nmgp_cmp_readonly['inasistencia_p2_'] != "on") {$this->nmgp_cmp_readonly['inasistencia_p2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['eval_2_per_']) || $this->nmgp_cmp_readonly['eval_2_per_'] != "on") {$this->nmgp_cmp_readonly['eval_2_per_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc1_2p_']) || $this->nmgp_cmp_readonly['dc1_2p_'] != "on") {$this->nmgp_cmp_readonly['dc1_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc2_2p_']) || $this->nmgp_cmp_readonly['dc2_2p_'] != "on") {$this->nmgp_cmp_readonly['dc2_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc3_2p_']) || $this->nmgp_cmp_readonly['dc3_2p_'] != "on") {$this->nmgp_cmp_readonly['dc3_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc4_2p_']) || $this->nmgp_cmp_readonly['dc4_2p_'] != "on") {$this->nmgp_cmp_readonly['dc4_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc5_2p_']) || $this->nmgp_cmp_readonly['dc5_2p_'] != "on") {$this->nmgp_cmp_readonly['dc5_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dc2_']) || $this->nmgp_cmp_readonly['pcent_dc2_'] != "on") {$this->nmgp_cmp_readonly['pcent_dc2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds1_2p_']) || $this->nmgp_cmp_readonly['ds1_2p_'] != "on") {$this->nmgp_cmp_readonly['ds1_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds2_2p_']) || $this->nmgp_cmp_readonly['ds2_2p_'] != "on") {$this->nmgp_cmp_readonly['ds2_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds3_2p_']) || $this->nmgp_cmp_readonly['ds3_2p_'] != "on") {$this->nmgp_cmp_readonly['ds3_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds4_2p_']) || $this->nmgp_cmp_readonly['ds4_2p_'] != "on") {$this->nmgp_cmp_readonly['ds4_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds5_2p_']) || $this->nmgp_cmp_readonly['ds5_2p_'] != "on") {$this->nmgp_cmp_readonly['ds5_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_ds2_']) || $this->nmgp_cmp_readonly['pcent_ds2_'] != "on") {$this->nmgp_cmp_readonly['pcent_ds2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp1_2p_']) || $this->nmgp_cmp_readonly['dp1_2p_'] != "on") {$this->nmgp_cmp_readonly['dp1_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp2_2p_']) || $this->nmgp_cmp_readonly['dp2_2p_'] != "on") {$this->nmgp_cmp_readonly['dp2_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp3_2p_']) || $this->nmgp_cmp_readonly['dp3_2p_'] != "on") {$this->nmgp_cmp_readonly['dp3_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp4_2p_']) || $this->nmgp_cmp_readonly['dp4_2p_'] != "on") {$this->nmgp_cmp_readonly['dp4_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp5_2p_']) || $this->nmgp_cmp_readonly['dp5_2p_'] != "on") {$this->nmgp_cmp_readonly['dp5_2p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dp2_']) || $this->nmgp_cmp_readonly['pcent_dp2_'] != "on") {$this->nmgp_cmp_readonly['pcent_dp2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['aee_p2_']) || $this->nmgp_cmp_readonly['aee_p2_'] != "on") {$this->nmgp_cmp_readonly['aee_p2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['porcet_aee_p2_']) || $this->nmgp_cmp_readonly['porcet_aee_p2_'] != "on") {$this->nmgp_cmp_readonly['porcet_aee_p2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['inasistencia_p3_']) || $this->nmgp_cmp_readonly['inasistencia_p3_'] != "on") {$this->nmgp_cmp_readonly['inasistencia_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['eval_3_per_']) || $this->nmgp_cmp_readonly['eval_3_per_'] != "on") {$this->nmgp_cmp_readonly['eval_3_per_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc1_3p_']) || $this->nmgp_cmp_readonly['dc1_3p_'] != "on") {$this->nmgp_cmp_readonly['dc1_3p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc2_3p_']) || $this->nmgp_cmp_readonly['dc2_3p_'] != "on") {$this->nmgp_cmp_readonly['dc2_3p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc3_3p_']) || $this->nmgp_cmp_readonly['dc3_3p_'] != "on") {$this->nmgp_cmp_readonly['dc3_3p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc4_3p_']) || $this->nmgp_cmp_readonly['dc4_3p_'] != "on") {$this->nmgp_cmp_readonly['dc4_3p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc5_3p_']) || $this->nmgp_cmp_readonly['dc5_3p_'] != "on") {$this->nmgp_cmp_readonly['dc5_3p_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dc3_']) || $this->nmgp_cmp_readonly['pcent_dc3_'] != "on") {$this->nmgp_cmp_readonly['pcent_dc3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds1_p3_']) || $this->nmgp_cmp_readonly['ds1_p3_'] != "on") {$this->nmgp_cmp_readonly['ds1_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds2_p3_']) || $this->nmgp_cmp_readonly['ds2_p3_'] != "on") {$this->nmgp_cmp_readonly['ds2_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds3_p3_']) || $this->nmgp_cmp_readonly['ds3_p3_'] != "on") {$this->nmgp_cmp_readonly['ds3_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds4_p3_']) || $this->nmgp_cmp_readonly['ds4_p3_'] != "on") {$this->nmgp_cmp_readonly['ds4_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds5_p3_']) || $this->nmgp_cmp_readonly['ds5_p3_'] != "on") {$this->nmgp_cmp_readonly['ds5_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_ds3_']) || $this->nmgp_cmp_readonly['pcent_ds3_'] != "on") {$this->nmgp_cmp_readonly['pcent_ds3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp1_p3_']) || $this->nmgp_cmp_readonly['dp1_p3_'] != "on") {$this->nmgp_cmp_readonly['dp1_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp2_p3_']) || $this->nmgp_cmp_readonly['dp2_p3_'] != "on") {$this->nmgp_cmp_readonly['dp2_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp3_p3_']) || $this->nmgp_cmp_readonly['dp3_p3_'] != "on") {$this->nmgp_cmp_readonly['dp3_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp4_p3_']) || $this->nmgp_cmp_readonly['dp4_p3_'] != "on") {$this->nmgp_cmp_readonly['dp4_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_0_']) || $this->nmgp_cmp_readonly['sc_field_0_'] != "on") {$this->nmgp_cmp_readonly['sc_field_0_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dp3_']) || $this->nmgp_cmp_readonly['pcent_dp3_'] != "on") {$this->nmgp_cmp_readonly['pcent_dp3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['aee_p3_']) || $this->nmgp_cmp_readonly['aee_p3_'] != "on") {$this->nmgp_cmp_readonly['aee_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['porcent_aee_p3_']) || $this->nmgp_cmp_readonly['porcent_aee_p3_'] != "on") {$this->nmgp_cmp_readonly['porcent_aee_p3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['inasistencia_p4_']) || $this->nmgp_cmp_readonly['inasistencia_p4_'] != "on") {$this->nmgp_cmp_readonly['inasistencia_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['eval_4_per_']) || $this->nmgp_cmp_readonly['eval_4_per_'] != "on") {$this->nmgp_cmp_readonly['eval_4_per_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc1_p4_']) || $this->nmgp_cmp_readonly['dc1_p4_'] != "on") {$this->nmgp_cmp_readonly['dc1_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc2_p4_']) || $this->nmgp_cmp_readonly['dc2_p4_'] != "on") {$this->nmgp_cmp_readonly['dc2_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc3_p4_']) || $this->nmgp_cmp_readonly['dc3_p4_'] != "on") {$this->nmgp_cmp_readonly['dc3_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc4_p4_']) || $this->nmgp_cmp_readonly['dc4_p4_'] != "on") {$this->nmgp_cmp_readonly['dc4_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc5_p4_']) || $this->nmgp_cmp_readonly['dc5_p4_'] != "on") {$this->nmgp_cmp_readonly['dc5_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dc4_']) || $this->nmgp_cmp_readonly['pcent_dc4_'] != "on") {$this->nmgp_cmp_readonly['pcent_dc4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds1_p4_']) || $this->nmgp_cmp_readonly['ds1_p4_'] != "on") {$this->nmgp_cmp_readonly['ds1_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds2_p4_']) || $this->nmgp_cmp_readonly['ds2_p4_'] != "on") {$this->nmgp_cmp_readonly['ds2_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds3_p4_']) || $this->nmgp_cmp_readonly['ds3_p4_'] != "on") {$this->nmgp_cmp_readonly['ds3_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds4_p4_']) || $this->nmgp_cmp_readonly['ds4_p4_'] != "on") {$this->nmgp_cmp_readonly['ds4_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ds5_p4_']) || $this->nmgp_cmp_readonly['ds5_p4_'] != "on") {$this->nmgp_cmp_readonly['ds5_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_ds4_']) || $this->nmgp_cmp_readonly['pcent_ds4_'] != "on") {$this->nmgp_cmp_readonly['pcent_ds4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp1_p4_']) || $this->nmgp_cmp_readonly['dp1_p4_'] != "on") {$this->nmgp_cmp_readonly['dp1_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp2_p4_']) || $this->nmgp_cmp_readonly['dp2_p4_'] != "on") {$this->nmgp_cmp_readonly['dp2_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp3_p4_']) || $this->nmgp_cmp_readonly['dp3_p4_'] != "on") {$this->nmgp_cmp_readonly['dp3_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp4_p4_']) || $this->nmgp_cmp_readonly['dp4_p4_'] != "on") {$this->nmgp_cmp_readonly['dp4_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dp5_p4_']) || $this->nmgp_cmp_readonly['dp5_p4_'] != "on") {$this->nmgp_cmp_readonly['dp5_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['aee_p4_']) || $this->nmgp_cmp_readonly['aee_p4_'] != "on") {$this->nmgp_cmp_readonly['aee_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['porcent_aee_p4_']) || $this->nmgp_cmp_readonly['porcent_aee_p4_'] != "on") {$this->nmgp_cmp_readonly['porcent_aee_p4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dp4_']) || $this->nmgp_cmp_readonly['pcent_dp4_'] != "on") {$this->nmgp_cmp_readonly['pcent_dp4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['eval_final_']) || $this->nmgp_cmp_readonly['eval_final_'] != "on") {$this->nmgp_cmp_readonly['eval_final_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['entorno_']) || $this->nmgp_cmp_readonly['entorno_'] != "on") {$this->nmgp_cmp_readonly['entorno_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_estudiante_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['id_estudiante_']; 
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
       $this->primer_apellido_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['primer_apellido_']; 
       $primer_apellido_ = $this->primer_apellido_; 
       $sStyleHidden_primer_apellido_ = '';
       if (isset($sCheckRead_primer_apellido_))
       {
           unset($sCheckRead_primer_apellido_);
       }
       if (isset($this->nmgp_cmp_readonly['primer_apellido_']))
       {
           $sCheckRead_primer_apellido_ = $this->nmgp_cmp_readonly['primer_apellido_'];
       }
       if (isset($this->nmgp_cmp_hidden['primer_apellido_']) && $this->nmgp_cmp_hidden['primer_apellido_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['primer_apellido_']);
           $sStyleHidden_primer_apellido_ = 'display: none;';
       }
       $bTestReadOnly_primer_apellido_ = true;
       $sStyleReadLab_primer_apellido_ = 'display: none;';
       $sStyleReadInp_primer_apellido_ = '';
       if (isset($this->nmgp_cmp_readonly['primer_apellido_']) && $this->nmgp_cmp_readonly['primer_apellido_'] == 'on')
       {
           $bTestReadOnly_primer_apellido_ = false;
           unset($this->nmgp_cmp_readonly['primer_apellido_']);
           $sStyleReadLab_primer_apellido_ = '';
           $sStyleReadInp_primer_apellido_ = 'display: none;';
       }
       $this->segundo_apellido_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['segundo_apellido_']; 
       $segundo_apellido_ = $this->segundo_apellido_; 
       $sStyleHidden_segundo_apellido_ = '';
       if (isset($sCheckRead_segundo_apellido_))
       {
           unset($sCheckRead_segundo_apellido_);
       }
       if (isset($this->nmgp_cmp_readonly['segundo_apellido_']))
       {
           $sCheckRead_segundo_apellido_ = $this->nmgp_cmp_readonly['segundo_apellido_'];
       }
       if (isset($this->nmgp_cmp_hidden['segundo_apellido_']) && $this->nmgp_cmp_hidden['segundo_apellido_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['segundo_apellido_']);
           $sStyleHidden_segundo_apellido_ = 'display: none;';
       }
       $bTestReadOnly_segundo_apellido_ = true;
       $sStyleReadLab_segundo_apellido_ = 'display: none;';
       $sStyleReadInp_segundo_apellido_ = '';
       if (isset($this->nmgp_cmp_readonly['segundo_apellido_']) && $this->nmgp_cmp_readonly['segundo_apellido_'] == 'on')
       {
           $bTestReadOnly_segundo_apellido_ = false;
           unset($this->nmgp_cmp_readonly['segundo_apellido_']);
           $sStyleReadLab_segundo_apellido_ = '';
           $sStyleReadInp_segundo_apellido_ = 'display: none;';
       }
       $this->primer_nombre_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['primer_nombre_']; 
       $primer_nombre_ = $this->primer_nombre_; 
       $sStyleHidden_primer_nombre_ = '';
       if (isset($sCheckRead_primer_nombre_))
       {
           unset($sCheckRead_primer_nombre_);
       }
       if (isset($this->nmgp_cmp_readonly['primer_nombre_']))
       {
           $sCheckRead_primer_nombre_ = $this->nmgp_cmp_readonly['primer_nombre_'];
       }
       if (isset($this->nmgp_cmp_hidden['primer_nombre_']) && $this->nmgp_cmp_hidden['primer_nombre_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['primer_nombre_']);
           $sStyleHidden_primer_nombre_ = 'display: none;';
       }
       $bTestReadOnly_primer_nombre_ = true;
       $sStyleReadLab_primer_nombre_ = 'display: none;';
       $sStyleReadInp_primer_nombre_ = '';
       if (isset($this->nmgp_cmp_readonly['primer_nombre_']) && $this->nmgp_cmp_readonly['primer_nombre_'] == 'on')
       {
           $bTestReadOnly_primer_nombre_ = false;
           unset($this->nmgp_cmp_readonly['primer_nombre_']);
           $sStyleReadLab_primer_nombre_ = '';
           $sStyleReadInp_primer_nombre_ = 'display: none;';
       }
       $this->segundo_nombre_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['segundo_nombre_']; 
       $segundo_nombre_ = $this->segundo_nombre_; 
       $sStyleHidden_segundo_nombre_ = '';
       if (isset($sCheckRead_segundo_nombre_))
       {
           unset($sCheckRead_segundo_nombre_);
       }
       if (isset($this->nmgp_cmp_readonly['segundo_nombre_']))
       {
           $sCheckRead_segundo_nombre_ = $this->nmgp_cmp_readonly['segundo_nombre_'];
       }
       if (isset($this->nmgp_cmp_hidden['segundo_nombre_']) && $this->nmgp_cmp_hidden['segundo_nombre_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['segundo_nombre_']);
           $sStyleHidden_segundo_nombre_ = 'display: none;';
       }
       $bTestReadOnly_segundo_nombre_ = true;
       $sStyleReadLab_segundo_nombre_ = 'display: none;';
       $sStyleReadInp_segundo_nombre_ = '';
       if (isset($this->nmgp_cmp_readonly['segundo_nombre_']) && $this->nmgp_cmp_readonly['segundo_nombre_'] == 'on')
       {
           $bTestReadOnly_segundo_nombre_ = false;
           unset($this->nmgp_cmp_readonly['segundo_nombre_']);
           $sStyleReadLab_segundo_nombre_ = '';
           $sStyleReadInp_segundo_nombre_ = 'display: none;';
       }
       $this->id_grupo_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['id_grupo_']; 
       $id_grupo_ = $this->id_grupo_; 
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
       $this->id_area_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['id_area_']; 
       $id_area_ = $this->id_area_; 
       $sStyleHidden_id_area_ = '';
       if (isset($sCheckRead_id_area_))
       {
           unset($sCheckRead_id_area_);
       }
       if (isset($this->nmgp_cmp_readonly['id_area_']))
       {
           $sCheckRead_id_area_ = $this->nmgp_cmp_readonly['id_area_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_area_']) && $this->nmgp_cmp_hidden['id_area_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_area_']);
           $sStyleHidden_id_area_ = 'display: none;';
       }
       $bTestReadOnly_id_area_ = true;
       $sStyleReadLab_id_area_ = 'display: none;';
       $sStyleReadInp_id_area_ = '';
       if (isset($this->nmgp_cmp_readonly['id_area_']) && $this->nmgp_cmp_readonly['id_area_'] == 'on')
       {
           $bTestReadOnly_id_area_ = false;
           unset($this->nmgp_cmp_readonly['id_area_']);
           $sStyleReadLab_id_area_ = '';
           $sStyleReadInp_id_area_ = 'display: none;';
       }
       $this->id_asignatura_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['id_asignatura_']; 
       $id_asignatura_ = $this->id_asignatura_; 
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
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_asignatura_"]) &&  $this->nmgp_cmp_readonly["id_asignatura_"] == "on"))
       {
           $bTestReadOnly_id_asignatura_ = false;
           unset($this->nmgp_cmp_readonly['id_asignatura_']);
           $sStyleReadLab_id_asignatura_ = '';
           $sStyleReadInp_id_asignatura_ = 'display: none;';
       }
       $this->id_grado_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['id_grado_']; 
       $id_grado_ = $this->id_grado_; 
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
       if (isset($this->nmgp_cmp_readonly['id_grado_']) && $this->nmgp_cmp_readonly['id_grado_'] == 'on')
       {
           $bTestReadOnly_id_grado_ = false;
           unset($this->nmgp_cmp_readonly['id_grado_']);
           $sStyleReadLab_id_grado_ = '';
           $sStyleReadInp_id_grado_ = 'display: none;';
       }
       $this->id_nivel_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['id_nivel_']; 
       $id_nivel_ = $this->id_nivel_; 
       $sStyleHidden_id_nivel_ = '';
       if (isset($sCheckRead_id_nivel_))
       {
           unset($sCheckRead_id_nivel_);
       }
       if (isset($this->nmgp_cmp_readonly['id_nivel_']))
       {
           $sCheckRead_id_nivel_ = $this->nmgp_cmp_readonly['id_nivel_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_nivel_']) && $this->nmgp_cmp_hidden['id_nivel_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_nivel_']);
           $sStyleHidden_id_nivel_ = 'display: none;';
       }
       $bTestReadOnly_id_nivel_ = true;
       $sStyleReadLab_id_nivel_ = 'display: none;';
       $sStyleReadInp_id_nivel_ = '';
       if (isset($this->nmgp_cmp_readonly['id_nivel_']) && $this->nmgp_cmp_readonly['id_nivel_'] == 'on')
       {
           $bTestReadOnly_id_nivel_ = false;
           unset($this->nmgp_cmp_readonly['id_nivel_']);
           $sStyleReadLab_id_nivel_ = '';
           $sStyleReadInp_id_nivel_ = 'display: none;';
       }
       $this->ihs_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ihs_']; 
       $ihs_ = $this->ihs_; 
       $sStyleHidden_ihs_ = '';
       if (isset($sCheckRead_ihs_))
       {
           unset($sCheckRead_ihs_);
       }
       if (isset($this->nmgp_cmp_readonly['ihs_']))
       {
           $sCheckRead_ihs_ = $this->nmgp_cmp_readonly['ihs_'];
       }
       if (isset($this->nmgp_cmp_hidden['ihs_']) && $this->nmgp_cmp_hidden['ihs_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ihs_']);
           $sStyleHidden_ihs_ = 'display: none;';
       }
       $bTestReadOnly_ihs_ = true;
       $sStyleReadLab_ihs_ = 'display: none;';
       $sStyleReadInp_ihs_ = '';
       if (isset($this->nmgp_cmp_readonly['ihs_']) && $this->nmgp_cmp_readonly['ihs_'] == 'on')
       {
           $bTestReadOnly_ihs_ = false;
           unset($this->nmgp_cmp_readonly['ihs_']);
           $sStyleReadLab_ihs_ = '';
           $sStyleReadInp_ihs_ = 'display: none;';
       }
       $this->pfa_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pfa_']; 
       $pfa_ = $this->pfa_; 
       $sStyleHidden_pfa_ = '';
       if (isset($sCheckRead_pfa_))
       {
           unset($sCheckRead_pfa_);
       }
       if (isset($this->nmgp_cmp_readonly['pfa_']))
       {
           $sCheckRead_pfa_ = $this->nmgp_cmp_readonly['pfa_'];
       }
       if (isset($this->nmgp_cmp_hidden['pfa_']) && $this->nmgp_cmp_hidden['pfa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pfa_']);
           $sStyleHidden_pfa_ = 'display: none;';
       }
       $bTestReadOnly_pfa_ = true;
       $sStyleReadLab_pfa_ = 'display: none;';
       $sStyleReadInp_pfa_ = '';
       if (isset($this->nmgp_cmp_readonly['pfa_']) && $this->nmgp_cmp_readonly['pfa_'] == 'on')
       {
           $bTestReadOnly_pfa_ = false;
           unset($this->nmgp_cmp_readonly['pfa_']);
           $sStyleReadLab_pfa_ = '';
           $sStyleReadInp_pfa_ = 'display: none;';
       }
       $this->tipo_asig_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['tipo_asig_']; 
       $tipo_asig_ = $this->tipo_asig_; 
       $sStyleHidden_tipo_asig_ = '';
       if (isset($sCheckRead_tipo_asig_))
       {
           unset($sCheckRead_tipo_asig_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_asig_']))
       {
           $sCheckRead_tipo_asig_ = $this->nmgp_cmp_readonly['tipo_asig_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_asig_']) && $this->nmgp_cmp_hidden['tipo_asig_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_asig_']);
           $sStyleHidden_tipo_asig_ = 'display: none;';
       }
       $bTestReadOnly_tipo_asig_ = true;
       $sStyleReadLab_tipo_asig_ = 'display: none;';
       $sStyleReadInp_tipo_asig_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_asig_']) && $this->nmgp_cmp_readonly['tipo_asig_'] == 'on')
       {
           $bTestReadOnly_tipo_asig_ = false;
           unset($this->nmgp_cmp_readonly['tipo_asig_']);
           $sStyleReadLab_tipo_asig_ = '';
           $sStyleReadInp_tipo_asig_ = 'display: none;';
       }
       $this->novedad_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['novedad_']; 
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
       $this->estatus_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['estatus_']; 
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
       $this->inasistencia_p1_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['inasistencia_p1_']; 
       $inasistencia_p1_ = $this->inasistencia_p1_; 
       $sStyleHidden_inasistencia_p1_ = '';
       if (isset($sCheckRead_inasistencia_p1_))
       {
           unset($sCheckRead_inasistencia_p1_);
       }
       if (isset($this->nmgp_cmp_readonly['inasistencia_p1_']))
       {
           $sCheckRead_inasistencia_p1_ = $this->nmgp_cmp_readonly['inasistencia_p1_'];
       }
       if (isset($this->nmgp_cmp_hidden['inasistencia_p1_']) && $this->nmgp_cmp_hidden['inasistencia_p1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['inasistencia_p1_']);
           $sStyleHidden_inasistencia_p1_ = 'display: none;';
       }
       $bTestReadOnly_inasistencia_p1_ = true;
       $sStyleReadLab_inasistencia_p1_ = 'display: none;';
       $sStyleReadInp_inasistencia_p1_ = '';
       if (isset($this->nmgp_cmp_readonly['inasistencia_p1_']) && $this->nmgp_cmp_readonly['inasistencia_p1_'] == 'on')
       {
           $bTestReadOnly_inasistencia_p1_ = false;
           unset($this->nmgp_cmp_readonly['inasistencia_p1_']);
           $sStyleReadLab_inasistencia_p1_ = '';
           $sStyleReadInp_inasistencia_p1_ = 'display: none;';
       }
       $this->eval_1_per_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['eval_1_per_']; 
       $eval_1_per_ = $this->eval_1_per_; 
       $sStyleHidden_eval_1_per_ = '';
       if (isset($sCheckRead_eval_1_per_))
       {
           unset($sCheckRead_eval_1_per_);
       }
       if (isset($this->nmgp_cmp_readonly['eval_1_per_']))
       {
           $sCheckRead_eval_1_per_ = $this->nmgp_cmp_readonly['eval_1_per_'];
       }
       if (isset($this->nmgp_cmp_hidden['eval_1_per_']) && $this->nmgp_cmp_hidden['eval_1_per_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['eval_1_per_']);
           $sStyleHidden_eval_1_per_ = 'display: none;';
       }
       $bTestReadOnly_eval_1_per_ = true;
       $sStyleReadLab_eval_1_per_ = 'display: none;';
       $sStyleReadInp_eval_1_per_ = '';
       if (isset($this->nmgp_cmp_readonly['eval_1_per_']) && $this->nmgp_cmp_readonly['eval_1_per_'] == 'on')
       {
           $bTestReadOnly_eval_1_per_ = false;
           unset($this->nmgp_cmp_readonly['eval_1_per_']);
           $sStyleReadLab_eval_1_per_ = '';
           $sStyleReadInp_eval_1_per_ = 'display: none;';
       }
       $this->dc1_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc1_']; 
       $dc1_ = $this->dc1_; 
       $sStyleHidden_dc1_ = '';
       if (isset($sCheckRead_dc1_))
       {
           unset($sCheckRead_dc1_);
       }
       if (isset($this->nmgp_cmp_readonly['dc1_']))
       {
           $sCheckRead_dc1_ = $this->nmgp_cmp_readonly['dc1_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc1_']) && $this->nmgp_cmp_hidden['dc1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc1_']);
           $sStyleHidden_dc1_ = 'display: none;';
       }
       $bTestReadOnly_dc1_ = true;
       $sStyleReadLab_dc1_ = 'display: none;';
       $sStyleReadInp_dc1_ = '';
       if (isset($this->nmgp_cmp_readonly['dc1_']) && $this->nmgp_cmp_readonly['dc1_'] == 'on')
       {
           $bTestReadOnly_dc1_ = false;
           unset($this->nmgp_cmp_readonly['dc1_']);
           $sStyleReadLab_dc1_ = '';
           $sStyleReadInp_dc1_ = 'display: none;';
       }
       $this->dc2_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc2_']; 
       $dc2_ = $this->dc2_; 
       $sStyleHidden_dc2_ = '';
       if (isset($sCheckRead_dc2_))
       {
           unset($sCheckRead_dc2_);
       }
       if (isset($this->nmgp_cmp_readonly['dc2_']))
       {
           $sCheckRead_dc2_ = $this->nmgp_cmp_readonly['dc2_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc2_']) && $this->nmgp_cmp_hidden['dc2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc2_']);
           $sStyleHidden_dc2_ = 'display: none;';
       }
       $bTestReadOnly_dc2_ = true;
       $sStyleReadLab_dc2_ = 'display: none;';
       $sStyleReadInp_dc2_ = '';
       if (isset($this->nmgp_cmp_readonly['dc2_']) && $this->nmgp_cmp_readonly['dc2_'] == 'on')
       {
           $bTestReadOnly_dc2_ = false;
           unset($this->nmgp_cmp_readonly['dc2_']);
           $sStyleReadLab_dc2_ = '';
           $sStyleReadInp_dc2_ = 'display: none;';
       }
       $this->dc3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc3_']; 
       $dc3_ = $this->dc3_; 
       $sStyleHidden_dc3_ = '';
       if (isset($sCheckRead_dc3_))
       {
           unset($sCheckRead_dc3_);
       }
       if (isset($this->nmgp_cmp_readonly['dc3_']))
       {
           $sCheckRead_dc3_ = $this->nmgp_cmp_readonly['dc3_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc3_']) && $this->nmgp_cmp_hidden['dc3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc3_']);
           $sStyleHidden_dc3_ = 'display: none;';
       }
       $bTestReadOnly_dc3_ = true;
       $sStyleReadLab_dc3_ = 'display: none;';
       $sStyleReadInp_dc3_ = '';
       if (isset($this->nmgp_cmp_readonly['dc3_']) && $this->nmgp_cmp_readonly['dc3_'] == 'on')
       {
           $bTestReadOnly_dc3_ = false;
           unset($this->nmgp_cmp_readonly['dc3_']);
           $sStyleReadLab_dc3_ = '';
           $sStyleReadInp_dc3_ = 'display: none;';
       }
       $this->dc4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc4_']; 
       $dc4_ = $this->dc4_; 
       $sStyleHidden_dc4_ = '';
       if (isset($sCheckRead_dc4_))
       {
           unset($sCheckRead_dc4_);
       }
       if (isset($this->nmgp_cmp_readonly['dc4_']))
       {
           $sCheckRead_dc4_ = $this->nmgp_cmp_readonly['dc4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc4_']) && $this->nmgp_cmp_hidden['dc4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc4_']);
           $sStyleHidden_dc4_ = 'display: none;';
       }
       $bTestReadOnly_dc4_ = true;
       $sStyleReadLab_dc4_ = 'display: none;';
       $sStyleReadInp_dc4_ = '';
       if (isset($this->nmgp_cmp_readonly['dc4_']) && $this->nmgp_cmp_readonly['dc4_'] == 'on')
       {
           $bTestReadOnly_dc4_ = false;
           unset($this->nmgp_cmp_readonly['dc4_']);
           $sStyleReadLab_dc4_ = '';
           $sStyleReadInp_dc4_ = 'display: none;';
       }
       $this->dc5_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc5_']; 
       $dc5_ = $this->dc5_; 
       $sStyleHidden_dc5_ = '';
       if (isset($sCheckRead_dc5_))
       {
           unset($sCheckRead_dc5_);
       }
       if (isset($this->nmgp_cmp_readonly['dc5_']))
       {
           $sCheckRead_dc5_ = $this->nmgp_cmp_readonly['dc5_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc5_']) && $this->nmgp_cmp_hidden['dc5_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc5_']);
           $sStyleHidden_dc5_ = 'display: none;';
       }
       $bTestReadOnly_dc5_ = true;
       $sStyleReadLab_dc5_ = 'display: none;';
       $sStyleReadInp_dc5_ = '';
       if (isset($this->nmgp_cmp_readonly['dc5_']) && $this->nmgp_cmp_readonly['dc5_'] == 'on')
       {
           $bTestReadOnly_dc5_ = false;
           unset($this->nmgp_cmp_readonly['dc5_']);
           $sStyleReadLab_dc5_ = '';
           $sStyleReadInp_dc5_ = 'display: none;';
       }
       $this->dc6_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc6_']; 
       $dc6_ = $this->dc6_; 
       $sStyleHidden_dc6_ = '';
       if (isset($sCheckRead_dc6_))
       {
           unset($sCheckRead_dc6_);
       }
       if (isset($this->nmgp_cmp_readonly['dc6_']))
       {
           $sCheckRead_dc6_ = $this->nmgp_cmp_readonly['dc6_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc6_']) && $this->nmgp_cmp_hidden['dc6_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc6_']);
           $sStyleHidden_dc6_ = 'display: none;';
       }
       $bTestReadOnly_dc6_ = true;
       $sStyleReadLab_dc6_ = 'display: none;';
       $sStyleReadInp_dc6_ = '';
       if (isset($this->nmgp_cmp_readonly['dc6_']) && $this->nmgp_cmp_readonly['dc6_'] == 'on')
       {
           $bTestReadOnly_dc6_ = false;
           unset($this->nmgp_cmp_readonly['dc6_']);
           $sStyleReadLab_dc6_ = '';
           $sStyleReadInp_dc6_ = 'display: none;';
       }
       $this->dc7_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc7_']; 
       $dc7_ = $this->dc7_; 
       $sStyleHidden_dc7_ = '';
       if (isset($sCheckRead_dc7_))
       {
           unset($sCheckRead_dc7_);
       }
       if (isset($this->nmgp_cmp_readonly['dc7_']))
       {
           $sCheckRead_dc7_ = $this->nmgp_cmp_readonly['dc7_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc7_']) && $this->nmgp_cmp_hidden['dc7_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc7_']);
           $sStyleHidden_dc7_ = 'display: none;';
       }
       $bTestReadOnly_dc7_ = true;
       $sStyleReadLab_dc7_ = 'display: none;';
       $sStyleReadInp_dc7_ = '';
       if (isset($this->nmgp_cmp_readonly['dc7_']) && $this->nmgp_cmp_readonly['dc7_'] == 'on')
       {
           $bTestReadOnly_dc7_ = false;
           unset($this->nmgp_cmp_readonly['dc7_']);
           $sStyleReadLab_dc7_ = '';
           $sStyleReadInp_dc7_ = 'display: none;';
       }
       $this->dc8_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc8_']; 
       $dc8_ = $this->dc8_; 
       $sStyleHidden_dc8_ = '';
       if (isset($sCheckRead_dc8_))
       {
           unset($sCheckRead_dc8_);
       }
       if (isset($this->nmgp_cmp_readonly['dc8_']))
       {
           $sCheckRead_dc8_ = $this->nmgp_cmp_readonly['dc8_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc8_']) && $this->nmgp_cmp_hidden['dc8_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc8_']);
           $sStyleHidden_dc8_ = 'display: none;';
       }
       $bTestReadOnly_dc8_ = true;
       $sStyleReadLab_dc8_ = 'display: none;';
       $sStyleReadInp_dc8_ = '';
       if (isset($this->nmgp_cmp_readonly['dc8_']) && $this->nmgp_cmp_readonly['dc8_'] == 'on')
       {
           $bTestReadOnly_dc8_ = false;
           unset($this->nmgp_cmp_readonly['dc8_']);
           $sStyleReadLab_dc8_ = '';
           $sStyleReadInp_dc8_ = 'display: none;';
       }
       $this->dc9_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc9_']; 
       $dc9_ = $this->dc9_; 
       $sStyleHidden_dc9_ = '';
       if (isset($sCheckRead_dc9_))
       {
           unset($sCheckRead_dc9_);
       }
       if (isset($this->nmgp_cmp_readonly['dc9_']))
       {
           $sCheckRead_dc9_ = $this->nmgp_cmp_readonly['dc9_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc9_']) && $this->nmgp_cmp_hidden['dc9_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc9_']);
           $sStyleHidden_dc9_ = 'display: none;';
       }
       $bTestReadOnly_dc9_ = true;
       $sStyleReadLab_dc9_ = 'display: none;';
       $sStyleReadInp_dc9_ = '';
       if (isset($this->nmgp_cmp_readonly['dc9_']) && $this->nmgp_cmp_readonly['dc9_'] == 'on')
       {
           $bTestReadOnly_dc9_ = false;
           unset($this->nmgp_cmp_readonly['dc9_']);
           $sStyleReadLab_dc9_ = '';
           $sStyleReadInp_dc9_ = 'display: none;';
       }
       $this->pcent_dc_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_dc_']; 
       $pcent_dc_ = $this->pcent_dc_; 
       $sStyleHidden_pcent_dc_ = '';
       if (isset($sCheckRead_pcent_dc_))
       {
           unset($sCheckRead_pcent_dc_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_dc_']))
       {
           $sCheckRead_pcent_dc_ = $this->nmgp_cmp_readonly['pcent_dc_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_dc_']) && $this->nmgp_cmp_hidden['pcent_dc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_dc_']);
           $sStyleHidden_pcent_dc_ = 'display: none;';
       }
       $bTestReadOnly_pcent_dc_ = true;
       $sStyleReadLab_pcent_dc_ = 'display: none;';
       $sStyleReadInp_pcent_dc_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_dc_']) && $this->nmgp_cmp_readonly['pcent_dc_'] == 'on')
       {
           $bTestReadOnly_pcent_dc_ = false;
           unset($this->nmgp_cmp_readonly['pcent_dc_']);
           $sStyleReadLab_pcent_dc_ = '';
           $sStyleReadInp_pcent_dc_ = 'display: none;';
       }
       $this->ds1_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds1_']; 
       $ds1_ = $this->ds1_; 
       $sStyleHidden_ds1_ = '';
       if (isset($sCheckRead_ds1_))
       {
           unset($sCheckRead_ds1_);
       }
       if (isset($this->nmgp_cmp_readonly['ds1_']))
       {
           $sCheckRead_ds1_ = $this->nmgp_cmp_readonly['ds1_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds1_']) && $this->nmgp_cmp_hidden['ds1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds1_']);
           $sStyleHidden_ds1_ = 'display: none;';
       }
       $bTestReadOnly_ds1_ = true;
       $sStyleReadLab_ds1_ = 'display: none;';
       $sStyleReadInp_ds1_ = '';
       if (isset($this->nmgp_cmp_readonly['ds1_']) && $this->nmgp_cmp_readonly['ds1_'] == 'on')
       {
           $bTestReadOnly_ds1_ = false;
           unset($this->nmgp_cmp_readonly['ds1_']);
           $sStyleReadLab_ds1_ = '';
           $sStyleReadInp_ds1_ = 'display: none;';
       }
       $this->ds2_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds2_']; 
       $ds2_ = $this->ds2_; 
       $sStyleHidden_ds2_ = '';
       if (isset($sCheckRead_ds2_))
       {
           unset($sCheckRead_ds2_);
       }
       if (isset($this->nmgp_cmp_readonly['ds2_']))
       {
           $sCheckRead_ds2_ = $this->nmgp_cmp_readonly['ds2_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds2_']) && $this->nmgp_cmp_hidden['ds2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds2_']);
           $sStyleHidden_ds2_ = 'display: none;';
       }
       $bTestReadOnly_ds2_ = true;
       $sStyleReadLab_ds2_ = 'display: none;';
       $sStyleReadInp_ds2_ = '';
       if (isset($this->nmgp_cmp_readonly['ds2_']) && $this->nmgp_cmp_readonly['ds2_'] == 'on')
       {
           $bTestReadOnly_ds2_ = false;
           unset($this->nmgp_cmp_readonly['ds2_']);
           $sStyleReadLab_ds2_ = '';
           $sStyleReadInp_ds2_ = 'display: none;';
       }
       $this->ds3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds3_']; 
       $ds3_ = $this->ds3_; 
       $sStyleHidden_ds3_ = '';
       if (isset($sCheckRead_ds3_))
       {
           unset($sCheckRead_ds3_);
       }
       if (isset($this->nmgp_cmp_readonly['ds3_']))
       {
           $sCheckRead_ds3_ = $this->nmgp_cmp_readonly['ds3_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds3_']) && $this->nmgp_cmp_hidden['ds3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds3_']);
           $sStyleHidden_ds3_ = 'display: none;';
       }
       $bTestReadOnly_ds3_ = true;
       $sStyleReadLab_ds3_ = 'display: none;';
       $sStyleReadInp_ds3_ = '';
       if (isset($this->nmgp_cmp_readonly['ds3_']) && $this->nmgp_cmp_readonly['ds3_'] == 'on')
       {
           $bTestReadOnly_ds3_ = false;
           unset($this->nmgp_cmp_readonly['ds3_']);
           $sStyleReadLab_ds3_ = '';
           $sStyleReadInp_ds3_ = 'display: none;';
       }
       $this->ds4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds4_']; 
       $ds4_ = $this->ds4_; 
       $sStyleHidden_ds4_ = '';
       if (isset($sCheckRead_ds4_))
       {
           unset($sCheckRead_ds4_);
       }
       if (isset($this->nmgp_cmp_readonly['ds4_']))
       {
           $sCheckRead_ds4_ = $this->nmgp_cmp_readonly['ds4_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds4_']) && $this->nmgp_cmp_hidden['ds4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds4_']);
           $sStyleHidden_ds4_ = 'display: none;';
       }
       $bTestReadOnly_ds4_ = true;
       $sStyleReadLab_ds4_ = 'display: none;';
       $sStyleReadInp_ds4_ = '';
       if (isset($this->nmgp_cmp_readonly['ds4_']) && $this->nmgp_cmp_readonly['ds4_'] == 'on')
       {
           $bTestReadOnly_ds4_ = false;
           unset($this->nmgp_cmp_readonly['ds4_']);
           $sStyleReadLab_ds4_ = '';
           $sStyleReadInp_ds4_ = 'display: none;';
       }
       $this->ds5_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds5_']; 
       $ds5_ = $this->ds5_; 
       $sStyleHidden_ds5_ = '';
       if (isset($sCheckRead_ds5_))
       {
           unset($sCheckRead_ds5_);
       }
       if (isset($this->nmgp_cmp_readonly['ds5_']))
       {
           $sCheckRead_ds5_ = $this->nmgp_cmp_readonly['ds5_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds5_']) && $this->nmgp_cmp_hidden['ds5_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds5_']);
           $sStyleHidden_ds5_ = 'display: none;';
       }
       $bTestReadOnly_ds5_ = true;
       $sStyleReadLab_ds5_ = 'display: none;';
       $sStyleReadInp_ds5_ = '';
       if (isset($this->nmgp_cmp_readonly['ds5_']) && $this->nmgp_cmp_readonly['ds5_'] == 'on')
       {
           $bTestReadOnly_ds5_ = false;
           unset($this->nmgp_cmp_readonly['ds5_']);
           $sStyleReadLab_ds5_ = '';
           $sStyleReadInp_ds5_ = 'display: none;';
       }
       $this->pcent_ds_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_ds_']; 
       $pcent_ds_ = $this->pcent_ds_; 
       $sStyleHidden_pcent_ds_ = '';
       if (isset($sCheckRead_pcent_ds_))
       {
           unset($sCheckRead_pcent_ds_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_ds_']))
       {
           $sCheckRead_pcent_ds_ = $this->nmgp_cmp_readonly['pcent_ds_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_ds_']) && $this->nmgp_cmp_hidden['pcent_ds_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_ds_']);
           $sStyleHidden_pcent_ds_ = 'display: none;';
       }
       $bTestReadOnly_pcent_ds_ = true;
       $sStyleReadLab_pcent_ds_ = 'display: none;';
       $sStyleReadInp_pcent_ds_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_ds_']) && $this->nmgp_cmp_readonly['pcent_ds_'] == 'on')
       {
           $bTestReadOnly_pcent_ds_ = false;
           unset($this->nmgp_cmp_readonly['pcent_ds_']);
           $sStyleReadLab_pcent_ds_ = '';
           $sStyleReadInp_pcent_ds_ = 'display: none;';
       }
       $this->dp1_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp1_']; 
       $dp1_ = $this->dp1_; 
       $sStyleHidden_dp1_ = '';
       if (isset($sCheckRead_dp1_))
       {
           unset($sCheckRead_dp1_);
       }
       if (isset($this->nmgp_cmp_readonly['dp1_']))
       {
           $sCheckRead_dp1_ = $this->nmgp_cmp_readonly['dp1_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp1_']) && $this->nmgp_cmp_hidden['dp1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp1_']);
           $sStyleHidden_dp1_ = 'display: none;';
       }
       $bTestReadOnly_dp1_ = true;
       $sStyleReadLab_dp1_ = 'display: none;';
       $sStyleReadInp_dp1_ = '';
       if (isset($this->nmgp_cmp_readonly['dp1_']) && $this->nmgp_cmp_readonly['dp1_'] == 'on')
       {
           $bTestReadOnly_dp1_ = false;
           unset($this->nmgp_cmp_readonly['dp1_']);
           $sStyleReadLab_dp1_ = '';
           $sStyleReadInp_dp1_ = 'display: none;';
       }
       $this->dp2_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp2_']; 
       $dp2_ = $this->dp2_; 
       $sStyleHidden_dp2_ = '';
       if (isset($sCheckRead_dp2_))
       {
           unset($sCheckRead_dp2_);
       }
       if (isset($this->nmgp_cmp_readonly['dp2_']))
       {
           $sCheckRead_dp2_ = $this->nmgp_cmp_readonly['dp2_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp2_']) && $this->nmgp_cmp_hidden['dp2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp2_']);
           $sStyleHidden_dp2_ = 'display: none;';
       }
       $bTestReadOnly_dp2_ = true;
       $sStyleReadLab_dp2_ = 'display: none;';
       $sStyleReadInp_dp2_ = '';
       if (isset($this->nmgp_cmp_readonly['dp2_']) && $this->nmgp_cmp_readonly['dp2_'] == 'on')
       {
           $bTestReadOnly_dp2_ = false;
           unset($this->nmgp_cmp_readonly['dp2_']);
           $sStyleReadLab_dp2_ = '';
           $sStyleReadInp_dp2_ = 'display: none;';
       }
       $this->dp3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp3_']; 
       $dp3_ = $this->dp3_; 
       $sStyleHidden_dp3_ = '';
       if (isset($sCheckRead_dp3_))
       {
           unset($sCheckRead_dp3_);
       }
       if (isset($this->nmgp_cmp_readonly['dp3_']))
       {
           $sCheckRead_dp3_ = $this->nmgp_cmp_readonly['dp3_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp3_']) && $this->nmgp_cmp_hidden['dp3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp3_']);
           $sStyleHidden_dp3_ = 'display: none;';
       }
       $bTestReadOnly_dp3_ = true;
       $sStyleReadLab_dp3_ = 'display: none;';
       $sStyleReadInp_dp3_ = '';
       if (isset($this->nmgp_cmp_readonly['dp3_']) && $this->nmgp_cmp_readonly['dp3_'] == 'on')
       {
           $bTestReadOnly_dp3_ = false;
           unset($this->nmgp_cmp_readonly['dp3_']);
           $sStyleReadLab_dp3_ = '';
           $sStyleReadInp_dp3_ = 'display: none;';
       }
       $this->dp4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp4_']; 
       $dp4_ = $this->dp4_; 
       $sStyleHidden_dp4_ = '';
       if (isset($sCheckRead_dp4_))
       {
           unset($sCheckRead_dp4_);
       }
       if (isset($this->nmgp_cmp_readonly['dp4_']))
       {
           $sCheckRead_dp4_ = $this->nmgp_cmp_readonly['dp4_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp4_']) && $this->nmgp_cmp_hidden['dp4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp4_']);
           $sStyleHidden_dp4_ = 'display: none;';
       }
       $bTestReadOnly_dp4_ = true;
       $sStyleReadLab_dp4_ = 'display: none;';
       $sStyleReadInp_dp4_ = '';
       if (isset($this->nmgp_cmp_readonly['dp4_']) && $this->nmgp_cmp_readonly['dp4_'] == 'on')
       {
           $bTestReadOnly_dp4_ = false;
           unset($this->nmgp_cmp_readonly['dp4_']);
           $sStyleReadLab_dp4_ = '';
           $sStyleReadInp_dp4_ = 'display: none;';
       }
       $this->dp5_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp5_']; 
       $dp5_ = $this->dp5_; 
       $sStyleHidden_dp5_ = '';
       if (isset($sCheckRead_dp5_))
       {
           unset($sCheckRead_dp5_);
       }
       if (isset($this->nmgp_cmp_readonly['dp5_']))
       {
           $sCheckRead_dp5_ = $this->nmgp_cmp_readonly['dp5_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp5_']) && $this->nmgp_cmp_hidden['dp5_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp5_']);
           $sStyleHidden_dp5_ = 'display: none;';
       }
       $bTestReadOnly_dp5_ = true;
       $sStyleReadLab_dp5_ = 'display: none;';
       $sStyleReadInp_dp5_ = '';
       if (isset($this->nmgp_cmp_readonly['dp5_']) && $this->nmgp_cmp_readonly['dp5_'] == 'on')
       {
           $bTestReadOnly_dp5_ = false;
           unset($this->nmgp_cmp_readonly['dp5_']);
           $sStyleReadLab_dp5_ = '';
           $sStyleReadInp_dp5_ = 'display: none;';
       }
       $this->pcent_dp_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_dp_']; 
       $pcent_dp_ = $this->pcent_dp_; 
       $sStyleHidden_pcent_dp_ = '';
       if (isset($sCheckRead_pcent_dp_))
       {
           unset($sCheckRead_pcent_dp_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_dp_']))
       {
           $sCheckRead_pcent_dp_ = $this->nmgp_cmp_readonly['pcent_dp_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_dp_']) && $this->nmgp_cmp_hidden['pcent_dp_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_dp_']);
           $sStyleHidden_pcent_dp_ = 'display: none;';
       }
       $bTestReadOnly_pcent_dp_ = true;
       $sStyleReadLab_pcent_dp_ = 'display: none;';
       $sStyleReadInp_pcent_dp_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_dp_']) && $this->nmgp_cmp_readonly['pcent_dp_'] == 'on')
       {
           $bTestReadOnly_pcent_dp_ = false;
           unset($this->nmgp_cmp_readonly['pcent_dp_']);
           $sStyleReadLab_pcent_dp_ = '';
           $sStyleReadInp_pcent_dp_ = 'display: none;';
       }
       $this->aeep1_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['aeep1_']; 
       $aeep1_ = $this->aeep1_; 
       $sStyleHidden_aeep1_ = '';
       if (isset($sCheckRead_aeep1_))
       {
           unset($sCheckRead_aeep1_);
       }
       if (isset($this->nmgp_cmp_readonly['aeep1_']))
       {
           $sCheckRead_aeep1_ = $this->nmgp_cmp_readonly['aeep1_'];
       }
       if (isset($this->nmgp_cmp_hidden['aeep1_']) && $this->nmgp_cmp_hidden['aeep1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['aeep1_']);
           $sStyleHidden_aeep1_ = 'display: none;';
       }
       $bTestReadOnly_aeep1_ = true;
       $sStyleReadLab_aeep1_ = 'display: none;';
       $sStyleReadInp_aeep1_ = '';
       if (isset($this->nmgp_cmp_readonly['aeep1_']) && $this->nmgp_cmp_readonly['aeep1_'] == 'on')
       {
           $bTestReadOnly_aeep1_ = false;
           unset($this->nmgp_cmp_readonly['aeep1_']);
           $sStyleReadLab_aeep1_ = '';
           $sStyleReadInp_aeep1_ = 'display: none;';
       }
       $this->porcent_aeep1_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['porcent_aeep1_']; 
       $porcent_aeep1_ = $this->porcent_aeep1_; 
       $sStyleHidden_porcent_aeep1_ = '';
       if (isset($sCheckRead_porcent_aeep1_))
       {
           unset($sCheckRead_porcent_aeep1_);
       }
       if (isset($this->nmgp_cmp_readonly['porcent_aeep1_']))
       {
           $sCheckRead_porcent_aeep1_ = $this->nmgp_cmp_readonly['porcent_aeep1_'];
       }
       if (isset($this->nmgp_cmp_hidden['porcent_aeep1_']) && $this->nmgp_cmp_hidden['porcent_aeep1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['porcent_aeep1_']);
           $sStyleHidden_porcent_aeep1_ = 'display: none;';
       }
       $bTestReadOnly_porcent_aeep1_ = true;
       $sStyleReadLab_porcent_aeep1_ = 'display: none;';
       $sStyleReadInp_porcent_aeep1_ = '';
       if (isset($this->nmgp_cmp_readonly['porcent_aeep1_']) && $this->nmgp_cmp_readonly['porcent_aeep1_'] == 'on')
       {
           $bTestReadOnly_porcent_aeep1_ = false;
           unset($this->nmgp_cmp_readonly['porcent_aeep1_']);
           $sStyleReadLab_porcent_aeep1_ = '';
           $sStyleReadInp_porcent_aeep1_ = 'display: none;';
       }
       $this->inasistencia_p2_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['inasistencia_p2_']; 
       $inasistencia_p2_ = $this->inasistencia_p2_; 
       $sStyleHidden_inasistencia_p2_ = '';
       if (isset($sCheckRead_inasistencia_p2_))
       {
           unset($sCheckRead_inasistencia_p2_);
       }
       if (isset($this->nmgp_cmp_readonly['inasistencia_p2_']))
       {
           $sCheckRead_inasistencia_p2_ = $this->nmgp_cmp_readonly['inasistencia_p2_'];
       }
       if (isset($this->nmgp_cmp_hidden['inasistencia_p2_']) && $this->nmgp_cmp_hidden['inasistencia_p2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['inasistencia_p2_']);
           $sStyleHidden_inasistencia_p2_ = 'display: none;';
       }
       $bTestReadOnly_inasistencia_p2_ = true;
       $sStyleReadLab_inasistencia_p2_ = 'display: none;';
       $sStyleReadInp_inasistencia_p2_ = '';
       if (isset($this->nmgp_cmp_readonly['inasistencia_p2_']) && $this->nmgp_cmp_readonly['inasistencia_p2_'] == 'on')
       {
           $bTestReadOnly_inasistencia_p2_ = false;
           unset($this->nmgp_cmp_readonly['inasistencia_p2_']);
           $sStyleReadLab_inasistencia_p2_ = '';
           $sStyleReadInp_inasistencia_p2_ = 'display: none;';
       }
       $this->eval_2_per_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['eval_2_per_']; 
       $eval_2_per_ = $this->eval_2_per_; 
       $sStyleHidden_eval_2_per_ = '';
       if (isset($sCheckRead_eval_2_per_))
       {
           unset($sCheckRead_eval_2_per_);
       }
       if (isset($this->nmgp_cmp_readonly['eval_2_per_']))
       {
           $sCheckRead_eval_2_per_ = $this->nmgp_cmp_readonly['eval_2_per_'];
       }
       if (isset($this->nmgp_cmp_hidden['eval_2_per_']) && $this->nmgp_cmp_hidden['eval_2_per_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['eval_2_per_']);
           $sStyleHidden_eval_2_per_ = 'display: none;';
       }
       $bTestReadOnly_eval_2_per_ = true;
       $sStyleReadLab_eval_2_per_ = 'display: none;';
       $sStyleReadInp_eval_2_per_ = '';
       if (isset($this->nmgp_cmp_readonly['eval_2_per_']) && $this->nmgp_cmp_readonly['eval_2_per_'] == 'on')
       {
           $bTestReadOnly_eval_2_per_ = false;
           unset($this->nmgp_cmp_readonly['eval_2_per_']);
           $sStyleReadLab_eval_2_per_ = '';
           $sStyleReadInp_eval_2_per_ = 'display: none;';
       }
       $this->dc1_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc1_2p_']; 
       $dc1_2p_ = $this->dc1_2p_; 
       $sStyleHidden_dc1_2p_ = '';
       if (isset($sCheckRead_dc1_2p_))
       {
           unset($sCheckRead_dc1_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['dc1_2p_']))
       {
           $sCheckRead_dc1_2p_ = $this->nmgp_cmp_readonly['dc1_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc1_2p_']) && $this->nmgp_cmp_hidden['dc1_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc1_2p_']);
           $sStyleHidden_dc1_2p_ = 'display: none;';
       }
       $bTestReadOnly_dc1_2p_ = true;
       $sStyleReadLab_dc1_2p_ = 'display: none;';
       $sStyleReadInp_dc1_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['dc1_2p_']) && $this->nmgp_cmp_readonly['dc1_2p_'] == 'on')
       {
           $bTestReadOnly_dc1_2p_ = false;
           unset($this->nmgp_cmp_readonly['dc1_2p_']);
           $sStyleReadLab_dc1_2p_ = '';
           $sStyleReadInp_dc1_2p_ = 'display: none;';
       }
       $this->dc2_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc2_2p_']; 
       $dc2_2p_ = $this->dc2_2p_; 
       $sStyleHidden_dc2_2p_ = '';
       if (isset($sCheckRead_dc2_2p_))
       {
           unset($sCheckRead_dc2_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['dc2_2p_']))
       {
           $sCheckRead_dc2_2p_ = $this->nmgp_cmp_readonly['dc2_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc2_2p_']) && $this->nmgp_cmp_hidden['dc2_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc2_2p_']);
           $sStyleHidden_dc2_2p_ = 'display: none;';
       }
       $bTestReadOnly_dc2_2p_ = true;
       $sStyleReadLab_dc2_2p_ = 'display: none;';
       $sStyleReadInp_dc2_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['dc2_2p_']) && $this->nmgp_cmp_readonly['dc2_2p_'] == 'on')
       {
           $bTestReadOnly_dc2_2p_ = false;
           unset($this->nmgp_cmp_readonly['dc2_2p_']);
           $sStyleReadLab_dc2_2p_ = '';
           $sStyleReadInp_dc2_2p_ = 'display: none;';
       }
       $this->dc3_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc3_2p_']; 
       $dc3_2p_ = $this->dc3_2p_; 
       $sStyleHidden_dc3_2p_ = '';
       if (isset($sCheckRead_dc3_2p_))
       {
           unset($sCheckRead_dc3_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['dc3_2p_']))
       {
           $sCheckRead_dc3_2p_ = $this->nmgp_cmp_readonly['dc3_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc3_2p_']) && $this->nmgp_cmp_hidden['dc3_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc3_2p_']);
           $sStyleHidden_dc3_2p_ = 'display: none;';
       }
       $bTestReadOnly_dc3_2p_ = true;
       $sStyleReadLab_dc3_2p_ = 'display: none;';
       $sStyleReadInp_dc3_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['dc3_2p_']) && $this->nmgp_cmp_readonly['dc3_2p_'] == 'on')
       {
           $bTestReadOnly_dc3_2p_ = false;
           unset($this->nmgp_cmp_readonly['dc3_2p_']);
           $sStyleReadLab_dc3_2p_ = '';
           $sStyleReadInp_dc3_2p_ = 'display: none;';
       }
       $this->dc4_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc4_2p_']; 
       $dc4_2p_ = $this->dc4_2p_; 
       $sStyleHidden_dc4_2p_ = '';
       if (isset($sCheckRead_dc4_2p_))
       {
           unset($sCheckRead_dc4_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['dc4_2p_']))
       {
           $sCheckRead_dc4_2p_ = $this->nmgp_cmp_readonly['dc4_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc4_2p_']) && $this->nmgp_cmp_hidden['dc4_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc4_2p_']);
           $sStyleHidden_dc4_2p_ = 'display: none;';
       }
       $bTestReadOnly_dc4_2p_ = true;
       $sStyleReadLab_dc4_2p_ = 'display: none;';
       $sStyleReadInp_dc4_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['dc4_2p_']) && $this->nmgp_cmp_readonly['dc4_2p_'] == 'on')
       {
           $bTestReadOnly_dc4_2p_ = false;
           unset($this->nmgp_cmp_readonly['dc4_2p_']);
           $sStyleReadLab_dc4_2p_ = '';
           $sStyleReadInp_dc4_2p_ = 'display: none;';
       }
       $this->dc5_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc5_2p_']; 
       $dc5_2p_ = $this->dc5_2p_; 
       $sStyleHidden_dc5_2p_ = '';
       if (isset($sCheckRead_dc5_2p_))
       {
           unset($sCheckRead_dc5_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['dc5_2p_']))
       {
           $sCheckRead_dc5_2p_ = $this->nmgp_cmp_readonly['dc5_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc5_2p_']) && $this->nmgp_cmp_hidden['dc5_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc5_2p_']);
           $sStyleHidden_dc5_2p_ = 'display: none;';
       }
       $bTestReadOnly_dc5_2p_ = true;
       $sStyleReadLab_dc5_2p_ = 'display: none;';
       $sStyleReadInp_dc5_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['dc5_2p_']) && $this->nmgp_cmp_readonly['dc5_2p_'] == 'on')
       {
           $bTestReadOnly_dc5_2p_ = false;
           unset($this->nmgp_cmp_readonly['dc5_2p_']);
           $sStyleReadLab_dc5_2p_ = '';
           $sStyleReadInp_dc5_2p_ = 'display: none;';
       }
       $this->pcent_dc2_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_dc2_']; 
       $pcent_dc2_ = $this->pcent_dc2_; 
       $sStyleHidden_pcent_dc2_ = '';
       if (isset($sCheckRead_pcent_dc2_))
       {
           unset($sCheckRead_pcent_dc2_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_dc2_']))
       {
           $sCheckRead_pcent_dc2_ = $this->nmgp_cmp_readonly['pcent_dc2_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_dc2_']) && $this->nmgp_cmp_hidden['pcent_dc2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_dc2_']);
           $sStyleHidden_pcent_dc2_ = 'display: none;';
       }
       $bTestReadOnly_pcent_dc2_ = true;
       $sStyleReadLab_pcent_dc2_ = 'display: none;';
       $sStyleReadInp_pcent_dc2_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_dc2_']) && $this->nmgp_cmp_readonly['pcent_dc2_'] == 'on')
       {
           $bTestReadOnly_pcent_dc2_ = false;
           unset($this->nmgp_cmp_readonly['pcent_dc2_']);
           $sStyleReadLab_pcent_dc2_ = '';
           $sStyleReadInp_pcent_dc2_ = 'display: none;';
       }
       $this->ds1_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds1_2p_']; 
       $ds1_2p_ = $this->ds1_2p_; 
       $sStyleHidden_ds1_2p_ = '';
       if (isset($sCheckRead_ds1_2p_))
       {
           unset($sCheckRead_ds1_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['ds1_2p_']))
       {
           $sCheckRead_ds1_2p_ = $this->nmgp_cmp_readonly['ds1_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds1_2p_']) && $this->nmgp_cmp_hidden['ds1_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds1_2p_']);
           $sStyleHidden_ds1_2p_ = 'display: none;';
       }
       $bTestReadOnly_ds1_2p_ = true;
       $sStyleReadLab_ds1_2p_ = 'display: none;';
       $sStyleReadInp_ds1_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['ds1_2p_']) && $this->nmgp_cmp_readonly['ds1_2p_'] == 'on')
       {
           $bTestReadOnly_ds1_2p_ = false;
           unset($this->nmgp_cmp_readonly['ds1_2p_']);
           $sStyleReadLab_ds1_2p_ = '';
           $sStyleReadInp_ds1_2p_ = 'display: none;';
       }
       $this->ds2_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds2_2p_']; 
       $ds2_2p_ = $this->ds2_2p_; 
       $sStyleHidden_ds2_2p_ = '';
       if (isset($sCheckRead_ds2_2p_))
       {
           unset($sCheckRead_ds2_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['ds2_2p_']))
       {
           $sCheckRead_ds2_2p_ = $this->nmgp_cmp_readonly['ds2_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds2_2p_']) && $this->nmgp_cmp_hidden['ds2_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds2_2p_']);
           $sStyleHidden_ds2_2p_ = 'display: none;';
       }
       $bTestReadOnly_ds2_2p_ = true;
       $sStyleReadLab_ds2_2p_ = 'display: none;';
       $sStyleReadInp_ds2_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['ds2_2p_']) && $this->nmgp_cmp_readonly['ds2_2p_'] == 'on')
       {
           $bTestReadOnly_ds2_2p_ = false;
           unset($this->nmgp_cmp_readonly['ds2_2p_']);
           $sStyleReadLab_ds2_2p_ = '';
           $sStyleReadInp_ds2_2p_ = 'display: none;';
       }
       $this->ds3_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds3_2p_']; 
       $ds3_2p_ = $this->ds3_2p_; 
       $sStyleHidden_ds3_2p_ = '';
       if (isset($sCheckRead_ds3_2p_))
       {
           unset($sCheckRead_ds3_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['ds3_2p_']))
       {
           $sCheckRead_ds3_2p_ = $this->nmgp_cmp_readonly['ds3_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds3_2p_']) && $this->nmgp_cmp_hidden['ds3_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds3_2p_']);
           $sStyleHidden_ds3_2p_ = 'display: none;';
       }
       $bTestReadOnly_ds3_2p_ = true;
       $sStyleReadLab_ds3_2p_ = 'display: none;';
       $sStyleReadInp_ds3_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['ds3_2p_']) && $this->nmgp_cmp_readonly['ds3_2p_'] == 'on')
       {
           $bTestReadOnly_ds3_2p_ = false;
           unset($this->nmgp_cmp_readonly['ds3_2p_']);
           $sStyleReadLab_ds3_2p_ = '';
           $sStyleReadInp_ds3_2p_ = 'display: none;';
       }
       $this->ds4_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds4_2p_']; 
       $ds4_2p_ = $this->ds4_2p_; 
       $sStyleHidden_ds4_2p_ = '';
       if (isset($sCheckRead_ds4_2p_))
       {
           unset($sCheckRead_ds4_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['ds4_2p_']))
       {
           $sCheckRead_ds4_2p_ = $this->nmgp_cmp_readonly['ds4_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds4_2p_']) && $this->nmgp_cmp_hidden['ds4_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds4_2p_']);
           $sStyleHidden_ds4_2p_ = 'display: none;';
       }
       $bTestReadOnly_ds4_2p_ = true;
       $sStyleReadLab_ds4_2p_ = 'display: none;';
       $sStyleReadInp_ds4_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['ds4_2p_']) && $this->nmgp_cmp_readonly['ds4_2p_'] == 'on')
       {
           $bTestReadOnly_ds4_2p_ = false;
           unset($this->nmgp_cmp_readonly['ds4_2p_']);
           $sStyleReadLab_ds4_2p_ = '';
           $sStyleReadInp_ds4_2p_ = 'display: none;';
       }
       $this->ds5_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds5_2p_']; 
       $ds5_2p_ = $this->ds5_2p_; 
       $sStyleHidden_ds5_2p_ = '';
       if (isset($sCheckRead_ds5_2p_))
       {
           unset($sCheckRead_ds5_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['ds5_2p_']))
       {
           $sCheckRead_ds5_2p_ = $this->nmgp_cmp_readonly['ds5_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds5_2p_']) && $this->nmgp_cmp_hidden['ds5_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds5_2p_']);
           $sStyleHidden_ds5_2p_ = 'display: none;';
       }
       $bTestReadOnly_ds5_2p_ = true;
       $sStyleReadLab_ds5_2p_ = 'display: none;';
       $sStyleReadInp_ds5_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['ds5_2p_']) && $this->nmgp_cmp_readonly['ds5_2p_'] == 'on')
       {
           $bTestReadOnly_ds5_2p_ = false;
           unset($this->nmgp_cmp_readonly['ds5_2p_']);
           $sStyleReadLab_ds5_2p_ = '';
           $sStyleReadInp_ds5_2p_ = 'display: none;';
       }
       $this->pcent_ds2_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_ds2_']; 
       $pcent_ds2_ = $this->pcent_ds2_; 
       $sStyleHidden_pcent_ds2_ = '';
       if (isset($sCheckRead_pcent_ds2_))
       {
           unset($sCheckRead_pcent_ds2_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_ds2_']))
       {
           $sCheckRead_pcent_ds2_ = $this->nmgp_cmp_readonly['pcent_ds2_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_ds2_']) && $this->nmgp_cmp_hidden['pcent_ds2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_ds2_']);
           $sStyleHidden_pcent_ds2_ = 'display: none;';
       }
       $bTestReadOnly_pcent_ds2_ = true;
       $sStyleReadLab_pcent_ds2_ = 'display: none;';
       $sStyleReadInp_pcent_ds2_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_ds2_']) && $this->nmgp_cmp_readonly['pcent_ds2_'] == 'on')
       {
           $bTestReadOnly_pcent_ds2_ = false;
           unset($this->nmgp_cmp_readonly['pcent_ds2_']);
           $sStyleReadLab_pcent_ds2_ = '';
           $sStyleReadInp_pcent_ds2_ = 'display: none;';
       }
       $this->dp1_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp1_2p_']; 
       $dp1_2p_ = $this->dp1_2p_; 
       $sStyleHidden_dp1_2p_ = '';
       if (isset($sCheckRead_dp1_2p_))
       {
           unset($sCheckRead_dp1_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['dp1_2p_']))
       {
           $sCheckRead_dp1_2p_ = $this->nmgp_cmp_readonly['dp1_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp1_2p_']) && $this->nmgp_cmp_hidden['dp1_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp1_2p_']);
           $sStyleHidden_dp1_2p_ = 'display: none;';
       }
       $bTestReadOnly_dp1_2p_ = true;
       $sStyleReadLab_dp1_2p_ = 'display: none;';
       $sStyleReadInp_dp1_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['dp1_2p_']) && $this->nmgp_cmp_readonly['dp1_2p_'] == 'on')
       {
           $bTestReadOnly_dp1_2p_ = false;
           unset($this->nmgp_cmp_readonly['dp1_2p_']);
           $sStyleReadLab_dp1_2p_ = '';
           $sStyleReadInp_dp1_2p_ = 'display: none;';
       }
       $this->dp2_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp2_2p_']; 
       $dp2_2p_ = $this->dp2_2p_; 
       $sStyleHidden_dp2_2p_ = '';
       if (isset($sCheckRead_dp2_2p_))
       {
           unset($sCheckRead_dp2_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['dp2_2p_']))
       {
           $sCheckRead_dp2_2p_ = $this->nmgp_cmp_readonly['dp2_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp2_2p_']) && $this->nmgp_cmp_hidden['dp2_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp2_2p_']);
           $sStyleHidden_dp2_2p_ = 'display: none;';
       }
       $bTestReadOnly_dp2_2p_ = true;
       $sStyleReadLab_dp2_2p_ = 'display: none;';
       $sStyleReadInp_dp2_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['dp2_2p_']) && $this->nmgp_cmp_readonly['dp2_2p_'] == 'on')
       {
           $bTestReadOnly_dp2_2p_ = false;
           unset($this->nmgp_cmp_readonly['dp2_2p_']);
           $sStyleReadLab_dp2_2p_ = '';
           $sStyleReadInp_dp2_2p_ = 'display: none;';
       }
       $this->dp3_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp3_2p_']; 
       $dp3_2p_ = $this->dp3_2p_; 
       $sStyleHidden_dp3_2p_ = '';
       if (isset($sCheckRead_dp3_2p_))
       {
           unset($sCheckRead_dp3_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['dp3_2p_']))
       {
           $sCheckRead_dp3_2p_ = $this->nmgp_cmp_readonly['dp3_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp3_2p_']) && $this->nmgp_cmp_hidden['dp3_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp3_2p_']);
           $sStyleHidden_dp3_2p_ = 'display: none;';
       }
       $bTestReadOnly_dp3_2p_ = true;
       $sStyleReadLab_dp3_2p_ = 'display: none;';
       $sStyleReadInp_dp3_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['dp3_2p_']) && $this->nmgp_cmp_readonly['dp3_2p_'] == 'on')
       {
           $bTestReadOnly_dp3_2p_ = false;
           unset($this->nmgp_cmp_readonly['dp3_2p_']);
           $sStyleReadLab_dp3_2p_ = '';
           $sStyleReadInp_dp3_2p_ = 'display: none;';
       }
       $this->dp4_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp4_2p_']; 
       $dp4_2p_ = $this->dp4_2p_; 
       $sStyleHidden_dp4_2p_ = '';
       if (isset($sCheckRead_dp4_2p_))
       {
           unset($sCheckRead_dp4_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['dp4_2p_']))
       {
           $sCheckRead_dp4_2p_ = $this->nmgp_cmp_readonly['dp4_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp4_2p_']) && $this->nmgp_cmp_hidden['dp4_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp4_2p_']);
           $sStyleHidden_dp4_2p_ = 'display: none;';
       }
       $bTestReadOnly_dp4_2p_ = true;
       $sStyleReadLab_dp4_2p_ = 'display: none;';
       $sStyleReadInp_dp4_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['dp4_2p_']) && $this->nmgp_cmp_readonly['dp4_2p_'] == 'on')
       {
           $bTestReadOnly_dp4_2p_ = false;
           unset($this->nmgp_cmp_readonly['dp4_2p_']);
           $sStyleReadLab_dp4_2p_ = '';
           $sStyleReadInp_dp4_2p_ = 'display: none;';
       }
       $this->dp5_2p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp5_2p_']; 
       $dp5_2p_ = $this->dp5_2p_; 
       $sStyleHidden_dp5_2p_ = '';
       if (isset($sCheckRead_dp5_2p_))
       {
           unset($sCheckRead_dp5_2p_);
       }
       if (isset($this->nmgp_cmp_readonly['dp5_2p_']))
       {
           $sCheckRead_dp5_2p_ = $this->nmgp_cmp_readonly['dp5_2p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp5_2p_']) && $this->nmgp_cmp_hidden['dp5_2p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp5_2p_']);
           $sStyleHidden_dp5_2p_ = 'display: none;';
       }
       $bTestReadOnly_dp5_2p_ = true;
       $sStyleReadLab_dp5_2p_ = 'display: none;';
       $sStyleReadInp_dp5_2p_ = '';
       if (isset($this->nmgp_cmp_readonly['dp5_2p_']) && $this->nmgp_cmp_readonly['dp5_2p_'] == 'on')
       {
           $bTestReadOnly_dp5_2p_ = false;
           unset($this->nmgp_cmp_readonly['dp5_2p_']);
           $sStyleReadLab_dp5_2p_ = '';
           $sStyleReadInp_dp5_2p_ = 'display: none;';
       }
       $this->pcent_dp2_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_dp2_']; 
       $pcent_dp2_ = $this->pcent_dp2_; 
       $sStyleHidden_pcent_dp2_ = '';
       if (isset($sCheckRead_pcent_dp2_))
       {
           unset($sCheckRead_pcent_dp2_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_dp2_']))
       {
           $sCheckRead_pcent_dp2_ = $this->nmgp_cmp_readonly['pcent_dp2_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_dp2_']) && $this->nmgp_cmp_hidden['pcent_dp2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_dp2_']);
           $sStyleHidden_pcent_dp2_ = 'display: none;';
       }
       $bTestReadOnly_pcent_dp2_ = true;
       $sStyleReadLab_pcent_dp2_ = 'display: none;';
       $sStyleReadInp_pcent_dp2_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_dp2_']) && $this->nmgp_cmp_readonly['pcent_dp2_'] == 'on')
       {
           $bTestReadOnly_pcent_dp2_ = false;
           unset($this->nmgp_cmp_readonly['pcent_dp2_']);
           $sStyleReadLab_pcent_dp2_ = '';
           $sStyleReadInp_pcent_dp2_ = 'display: none;';
       }
       $this->aee_p2_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['aee_p2_']; 
       $aee_p2_ = $this->aee_p2_; 
       $sStyleHidden_aee_p2_ = '';
       if (isset($sCheckRead_aee_p2_))
       {
           unset($sCheckRead_aee_p2_);
       }
       if (isset($this->nmgp_cmp_readonly['aee_p2_']))
       {
           $sCheckRead_aee_p2_ = $this->nmgp_cmp_readonly['aee_p2_'];
       }
       if (isset($this->nmgp_cmp_hidden['aee_p2_']) && $this->nmgp_cmp_hidden['aee_p2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['aee_p2_']);
           $sStyleHidden_aee_p2_ = 'display: none;';
       }
       $bTestReadOnly_aee_p2_ = true;
       $sStyleReadLab_aee_p2_ = 'display: none;';
       $sStyleReadInp_aee_p2_ = '';
       if (isset($this->nmgp_cmp_readonly['aee_p2_']) && $this->nmgp_cmp_readonly['aee_p2_'] == 'on')
       {
           $bTestReadOnly_aee_p2_ = false;
           unset($this->nmgp_cmp_readonly['aee_p2_']);
           $sStyleReadLab_aee_p2_ = '';
           $sStyleReadInp_aee_p2_ = 'display: none;';
       }
       $this->porcet_aee_p2_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['porcet_aee_p2_']; 
       $porcet_aee_p2_ = $this->porcet_aee_p2_; 
       $sStyleHidden_porcet_aee_p2_ = '';
       if (isset($sCheckRead_porcet_aee_p2_))
       {
           unset($sCheckRead_porcet_aee_p2_);
       }
       if (isset($this->nmgp_cmp_readonly['porcet_aee_p2_']))
       {
           $sCheckRead_porcet_aee_p2_ = $this->nmgp_cmp_readonly['porcet_aee_p2_'];
       }
       if (isset($this->nmgp_cmp_hidden['porcet_aee_p2_']) && $this->nmgp_cmp_hidden['porcet_aee_p2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['porcet_aee_p2_']);
           $sStyleHidden_porcet_aee_p2_ = 'display: none;';
       }
       $bTestReadOnly_porcet_aee_p2_ = true;
       $sStyleReadLab_porcet_aee_p2_ = 'display: none;';
       $sStyleReadInp_porcet_aee_p2_ = '';
       if (isset($this->nmgp_cmp_readonly['porcet_aee_p2_']) && $this->nmgp_cmp_readonly['porcet_aee_p2_'] == 'on')
       {
           $bTestReadOnly_porcet_aee_p2_ = false;
           unset($this->nmgp_cmp_readonly['porcet_aee_p2_']);
           $sStyleReadLab_porcet_aee_p2_ = '';
           $sStyleReadInp_porcet_aee_p2_ = 'display: none;';
       }
       $this->inasistencia_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['inasistencia_p3_']; 
       $inasistencia_p3_ = $this->inasistencia_p3_; 
       $sStyleHidden_inasistencia_p3_ = '';
       if (isset($sCheckRead_inasistencia_p3_))
       {
           unset($sCheckRead_inasistencia_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['inasistencia_p3_']))
       {
           $sCheckRead_inasistencia_p3_ = $this->nmgp_cmp_readonly['inasistencia_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['inasistencia_p3_']) && $this->nmgp_cmp_hidden['inasistencia_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['inasistencia_p3_']);
           $sStyleHidden_inasistencia_p3_ = 'display: none;';
       }
       $bTestReadOnly_inasistencia_p3_ = true;
       $sStyleReadLab_inasistencia_p3_ = 'display: none;';
       $sStyleReadInp_inasistencia_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['inasistencia_p3_']) && $this->nmgp_cmp_readonly['inasistencia_p3_'] == 'on')
       {
           $bTestReadOnly_inasistencia_p3_ = false;
           unset($this->nmgp_cmp_readonly['inasistencia_p3_']);
           $sStyleReadLab_inasistencia_p3_ = '';
           $sStyleReadInp_inasistencia_p3_ = 'display: none;';
       }
       $this->eval_3_per_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['eval_3_per_']; 
       $eval_3_per_ = $this->eval_3_per_; 
       $sStyleHidden_eval_3_per_ = '';
       if (isset($sCheckRead_eval_3_per_))
       {
           unset($sCheckRead_eval_3_per_);
       }
       if (isset($this->nmgp_cmp_readonly['eval_3_per_']))
       {
           $sCheckRead_eval_3_per_ = $this->nmgp_cmp_readonly['eval_3_per_'];
       }
       if (isset($this->nmgp_cmp_hidden['eval_3_per_']) && $this->nmgp_cmp_hidden['eval_3_per_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['eval_3_per_']);
           $sStyleHidden_eval_3_per_ = 'display: none;';
       }
       $bTestReadOnly_eval_3_per_ = true;
       $sStyleReadLab_eval_3_per_ = 'display: none;';
       $sStyleReadInp_eval_3_per_ = '';
       if (isset($this->nmgp_cmp_readonly['eval_3_per_']) && $this->nmgp_cmp_readonly['eval_3_per_'] == 'on')
       {
           $bTestReadOnly_eval_3_per_ = false;
           unset($this->nmgp_cmp_readonly['eval_3_per_']);
           $sStyleReadLab_eval_3_per_ = '';
           $sStyleReadInp_eval_3_per_ = 'display: none;';
       }
       $this->dc1_3p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc1_3p_']; 
       $dc1_3p_ = $this->dc1_3p_; 
       $sStyleHidden_dc1_3p_ = '';
       if (isset($sCheckRead_dc1_3p_))
       {
           unset($sCheckRead_dc1_3p_);
       }
       if (isset($this->nmgp_cmp_readonly['dc1_3p_']))
       {
           $sCheckRead_dc1_3p_ = $this->nmgp_cmp_readonly['dc1_3p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc1_3p_']) && $this->nmgp_cmp_hidden['dc1_3p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc1_3p_']);
           $sStyleHidden_dc1_3p_ = 'display: none;';
       }
       $bTestReadOnly_dc1_3p_ = true;
       $sStyleReadLab_dc1_3p_ = 'display: none;';
       $sStyleReadInp_dc1_3p_ = '';
       if (isset($this->nmgp_cmp_readonly['dc1_3p_']) && $this->nmgp_cmp_readonly['dc1_3p_'] == 'on')
       {
           $bTestReadOnly_dc1_3p_ = false;
           unset($this->nmgp_cmp_readonly['dc1_3p_']);
           $sStyleReadLab_dc1_3p_ = '';
           $sStyleReadInp_dc1_3p_ = 'display: none;';
       }
       $this->dc2_3p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc2_3p_']; 
       $dc2_3p_ = $this->dc2_3p_; 
       $sStyleHidden_dc2_3p_ = '';
       if (isset($sCheckRead_dc2_3p_))
       {
           unset($sCheckRead_dc2_3p_);
       }
       if (isset($this->nmgp_cmp_readonly['dc2_3p_']))
       {
           $sCheckRead_dc2_3p_ = $this->nmgp_cmp_readonly['dc2_3p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc2_3p_']) && $this->nmgp_cmp_hidden['dc2_3p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc2_3p_']);
           $sStyleHidden_dc2_3p_ = 'display: none;';
       }
       $bTestReadOnly_dc2_3p_ = true;
       $sStyleReadLab_dc2_3p_ = 'display: none;';
       $sStyleReadInp_dc2_3p_ = '';
       if (isset($this->nmgp_cmp_readonly['dc2_3p_']) && $this->nmgp_cmp_readonly['dc2_3p_'] == 'on')
       {
           $bTestReadOnly_dc2_3p_ = false;
           unset($this->nmgp_cmp_readonly['dc2_3p_']);
           $sStyleReadLab_dc2_3p_ = '';
           $sStyleReadInp_dc2_3p_ = 'display: none;';
       }
       $this->dc3_3p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc3_3p_']; 
       $dc3_3p_ = $this->dc3_3p_; 
       $sStyleHidden_dc3_3p_ = '';
       if (isset($sCheckRead_dc3_3p_))
       {
           unset($sCheckRead_dc3_3p_);
       }
       if (isset($this->nmgp_cmp_readonly['dc3_3p_']))
       {
           $sCheckRead_dc3_3p_ = $this->nmgp_cmp_readonly['dc3_3p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc3_3p_']) && $this->nmgp_cmp_hidden['dc3_3p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc3_3p_']);
           $sStyleHidden_dc3_3p_ = 'display: none;';
       }
       $bTestReadOnly_dc3_3p_ = true;
       $sStyleReadLab_dc3_3p_ = 'display: none;';
       $sStyleReadInp_dc3_3p_ = '';
       if (isset($this->nmgp_cmp_readonly['dc3_3p_']) && $this->nmgp_cmp_readonly['dc3_3p_'] == 'on')
       {
           $bTestReadOnly_dc3_3p_ = false;
           unset($this->nmgp_cmp_readonly['dc3_3p_']);
           $sStyleReadLab_dc3_3p_ = '';
           $sStyleReadInp_dc3_3p_ = 'display: none;';
       }
       $this->dc4_3p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc4_3p_']; 
       $dc4_3p_ = $this->dc4_3p_; 
       $sStyleHidden_dc4_3p_ = '';
       if (isset($sCheckRead_dc4_3p_))
       {
           unset($sCheckRead_dc4_3p_);
       }
       if (isset($this->nmgp_cmp_readonly['dc4_3p_']))
       {
           $sCheckRead_dc4_3p_ = $this->nmgp_cmp_readonly['dc4_3p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc4_3p_']) && $this->nmgp_cmp_hidden['dc4_3p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc4_3p_']);
           $sStyleHidden_dc4_3p_ = 'display: none;';
       }
       $bTestReadOnly_dc4_3p_ = true;
       $sStyleReadLab_dc4_3p_ = 'display: none;';
       $sStyleReadInp_dc4_3p_ = '';
       if (isset($this->nmgp_cmp_readonly['dc4_3p_']) && $this->nmgp_cmp_readonly['dc4_3p_'] == 'on')
       {
           $bTestReadOnly_dc4_3p_ = false;
           unset($this->nmgp_cmp_readonly['dc4_3p_']);
           $sStyleReadLab_dc4_3p_ = '';
           $sStyleReadInp_dc4_3p_ = 'display: none;';
       }
       $this->dc5_3p_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc5_3p_']; 
       $dc5_3p_ = $this->dc5_3p_; 
       $sStyleHidden_dc5_3p_ = '';
       if (isset($sCheckRead_dc5_3p_))
       {
           unset($sCheckRead_dc5_3p_);
       }
       if (isset($this->nmgp_cmp_readonly['dc5_3p_']))
       {
           $sCheckRead_dc5_3p_ = $this->nmgp_cmp_readonly['dc5_3p_'];
       }
       if (isset($this->nmgp_cmp_hidden['dc5_3p_']) && $this->nmgp_cmp_hidden['dc5_3p_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dc5_3p_']);
           $sStyleHidden_dc5_3p_ = 'display: none;';
       }
       $bTestReadOnly_dc5_3p_ = true;
       $sStyleReadLab_dc5_3p_ = 'display: none;';
       $sStyleReadInp_dc5_3p_ = '';
       if (isset($this->nmgp_cmp_readonly['dc5_3p_']) && $this->nmgp_cmp_readonly['dc5_3p_'] == 'on')
       {
           $bTestReadOnly_dc5_3p_ = false;
           unset($this->nmgp_cmp_readonly['dc5_3p_']);
           $sStyleReadLab_dc5_3p_ = '';
           $sStyleReadInp_dc5_3p_ = 'display: none;';
       }
       $this->pcent_dc3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_dc3_']; 
       $pcent_dc3_ = $this->pcent_dc3_; 
       $sStyleHidden_pcent_dc3_ = '';
       if (isset($sCheckRead_pcent_dc3_))
       {
           unset($sCheckRead_pcent_dc3_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_dc3_']))
       {
           $sCheckRead_pcent_dc3_ = $this->nmgp_cmp_readonly['pcent_dc3_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_dc3_']) && $this->nmgp_cmp_hidden['pcent_dc3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_dc3_']);
           $sStyleHidden_pcent_dc3_ = 'display: none;';
       }
       $bTestReadOnly_pcent_dc3_ = true;
       $sStyleReadLab_pcent_dc3_ = 'display: none;';
       $sStyleReadInp_pcent_dc3_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_dc3_']) && $this->nmgp_cmp_readonly['pcent_dc3_'] == 'on')
       {
           $bTestReadOnly_pcent_dc3_ = false;
           unset($this->nmgp_cmp_readonly['pcent_dc3_']);
           $sStyleReadLab_pcent_dc3_ = '';
           $sStyleReadInp_pcent_dc3_ = 'display: none;';
       }
       $this->ds1_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds1_p3_']; 
       $ds1_p3_ = $this->ds1_p3_; 
       $sStyleHidden_ds1_p3_ = '';
       if (isset($sCheckRead_ds1_p3_))
       {
           unset($sCheckRead_ds1_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['ds1_p3_']))
       {
           $sCheckRead_ds1_p3_ = $this->nmgp_cmp_readonly['ds1_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds1_p3_']) && $this->nmgp_cmp_hidden['ds1_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds1_p3_']);
           $sStyleHidden_ds1_p3_ = 'display: none;';
       }
       $bTestReadOnly_ds1_p3_ = true;
       $sStyleReadLab_ds1_p3_ = 'display: none;';
       $sStyleReadInp_ds1_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['ds1_p3_']) && $this->nmgp_cmp_readonly['ds1_p3_'] == 'on')
       {
           $bTestReadOnly_ds1_p3_ = false;
           unset($this->nmgp_cmp_readonly['ds1_p3_']);
           $sStyleReadLab_ds1_p3_ = '';
           $sStyleReadInp_ds1_p3_ = 'display: none;';
       }
       $this->ds2_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds2_p3_']; 
       $ds2_p3_ = $this->ds2_p3_; 
       $sStyleHidden_ds2_p3_ = '';
       if (isset($sCheckRead_ds2_p3_))
       {
           unset($sCheckRead_ds2_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['ds2_p3_']))
       {
           $sCheckRead_ds2_p3_ = $this->nmgp_cmp_readonly['ds2_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds2_p3_']) && $this->nmgp_cmp_hidden['ds2_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds2_p3_']);
           $sStyleHidden_ds2_p3_ = 'display: none;';
       }
       $bTestReadOnly_ds2_p3_ = true;
       $sStyleReadLab_ds2_p3_ = 'display: none;';
       $sStyleReadInp_ds2_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['ds2_p3_']) && $this->nmgp_cmp_readonly['ds2_p3_'] == 'on')
       {
           $bTestReadOnly_ds2_p3_ = false;
           unset($this->nmgp_cmp_readonly['ds2_p3_']);
           $sStyleReadLab_ds2_p3_ = '';
           $sStyleReadInp_ds2_p3_ = 'display: none;';
       }
       $this->ds3_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds3_p3_']; 
       $ds3_p3_ = $this->ds3_p3_; 
       $sStyleHidden_ds3_p3_ = '';
       if (isset($sCheckRead_ds3_p3_))
       {
           unset($sCheckRead_ds3_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['ds3_p3_']))
       {
           $sCheckRead_ds3_p3_ = $this->nmgp_cmp_readonly['ds3_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds3_p3_']) && $this->nmgp_cmp_hidden['ds3_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds3_p3_']);
           $sStyleHidden_ds3_p3_ = 'display: none;';
       }
       $bTestReadOnly_ds3_p3_ = true;
       $sStyleReadLab_ds3_p3_ = 'display: none;';
       $sStyleReadInp_ds3_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['ds3_p3_']) && $this->nmgp_cmp_readonly['ds3_p3_'] == 'on')
       {
           $bTestReadOnly_ds3_p3_ = false;
           unset($this->nmgp_cmp_readonly['ds3_p3_']);
           $sStyleReadLab_ds3_p3_ = '';
           $sStyleReadInp_ds3_p3_ = 'display: none;';
       }
       $this->ds4_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds4_p3_']; 
       $ds4_p3_ = $this->ds4_p3_; 
       $sStyleHidden_ds4_p3_ = '';
       if (isset($sCheckRead_ds4_p3_))
       {
           unset($sCheckRead_ds4_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['ds4_p3_']))
       {
           $sCheckRead_ds4_p3_ = $this->nmgp_cmp_readonly['ds4_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds4_p3_']) && $this->nmgp_cmp_hidden['ds4_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds4_p3_']);
           $sStyleHidden_ds4_p3_ = 'display: none;';
       }
       $bTestReadOnly_ds4_p3_ = true;
       $sStyleReadLab_ds4_p3_ = 'display: none;';
       $sStyleReadInp_ds4_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['ds4_p3_']) && $this->nmgp_cmp_readonly['ds4_p3_'] == 'on')
       {
           $bTestReadOnly_ds4_p3_ = false;
           unset($this->nmgp_cmp_readonly['ds4_p3_']);
           $sStyleReadLab_ds4_p3_ = '';
           $sStyleReadInp_ds4_p3_ = 'display: none;';
       }
       $this->ds5_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds5_p3_']; 
       $ds5_p3_ = $this->ds5_p3_; 
       $sStyleHidden_ds5_p3_ = '';
       if (isset($sCheckRead_ds5_p3_))
       {
           unset($sCheckRead_ds5_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['ds5_p3_']))
       {
           $sCheckRead_ds5_p3_ = $this->nmgp_cmp_readonly['ds5_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['ds5_p3_']) && $this->nmgp_cmp_hidden['ds5_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ds5_p3_']);
           $sStyleHidden_ds5_p3_ = 'display: none;';
       }
       $bTestReadOnly_ds5_p3_ = true;
       $sStyleReadLab_ds5_p3_ = 'display: none;';
       $sStyleReadInp_ds5_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['ds5_p3_']) && $this->nmgp_cmp_readonly['ds5_p3_'] == 'on')
       {
           $bTestReadOnly_ds5_p3_ = false;
           unset($this->nmgp_cmp_readonly['ds5_p3_']);
           $sStyleReadLab_ds5_p3_ = '';
           $sStyleReadInp_ds5_p3_ = 'display: none;';
       }
       $this->pcent_ds3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_ds3_']; 
       $pcent_ds3_ = $this->pcent_ds3_; 
       $sStyleHidden_pcent_ds3_ = '';
       if (isset($sCheckRead_pcent_ds3_))
       {
           unset($sCheckRead_pcent_ds3_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_ds3_']))
       {
           $sCheckRead_pcent_ds3_ = $this->nmgp_cmp_readonly['pcent_ds3_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_ds3_']) && $this->nmgp_cmp_hidden['pcent_ds3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_ds3_']);
           $sStyleHidden_pcent_ds3_ = 'display: none;';
       }
       $bTestReadOnly_pcent_ds3_ = true;
       $sStyleReadLab_pcent_ds3_ = 'display: none;';
       $sStyleReadInp_pcent_ds3_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_ds3_']) && $this->nmgp_cmp_readonly['pcent_ds3_'] == 'on')
       {
           $bTestReadOnly_pcent_ds3_ = false;
           unset($this->nmgp_cmp_readonly['pcent_ds3_']);
           $sStyleReadLab_pcent_ds3_ = '';
           $sStyleReadInp_pcent_ds3_ = 'display: none;';
       }
       $this->dp1_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp1_p3_']; 
       $dp1_p3_ = $this->dp1_p3_; 
       $sStyleHidden_dp1_p3_ = '';
       if (isset($sCheckRead_dp1_p3_))
       {
           unset($sCheckRead_dp1_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['dp1_p3_']))
       {
           $sCheckRead_dp1_p3_ = $this->nmgp_cmp_readonly['dp1_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp1_p3_']) && $this->nmgp_cmp_hidden['dp1_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp1_p3_']);
           $sStyleHidden_dp1_p3_ = 'display: none;';
       }
       $bTestReadOnly_dp1_p3_ = true;
       $sStyleReadLab_dp1_p3_ = 'display: none;';
       $sStyleReadInp_dp1_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['dp1_p3_']) && $this->nmgp_cmp_readonly['dp1_p3_'] == 'on')
       {
           $bTestReadOnly_dp1_p3_ = false;
           unset($this->nmgp_cmp_readonly['dp1_p3_']);
           $sStyleReadLab_dp1_p3_ = '';
           $sStyleReadInp_dp1_p3_ = 'display: none;';
       }
       $this->dp2_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp2_p3_']; 
       $dp2_p3_ = $this->dp2_p3_; 
       $sStyleHidden_dp2_p3_ = '';
       if (isset($sCheckRead_dp2_p3_))
       {
           unset($sCheckRead_dp2_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['dp2_p3_']))
       {
           $sCheckRead_dp2_p3_ = $this->nmgp_cmp_readonly['dp2_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp2_p3_']) && $this->nmgp_cmp_hidden['dp2_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp2_p3_']);
           $sStyleHidden_dp2_p3_ = 'display: none;';
       }
       $bTestReadOnly_dp2_p3_ = true;
       $sStyleReadLab_dp2_p3_ = 'display: none;';
       $sStyleReadInp_dp2_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['dp2_p3_']) && $this->nmgp_cmp_readonly['dp2_p3_'] == 'on')
       {
           $bTestReadOnly_dp2_p3_ = false;
           unset($this->nmgp_cmp_readonly['dp2_p3_']);
           $sStyleReadLab_dp2_p3_ = '';
           $sStyleReadInp_dp2_p3_ = 'display: none;';
       }
       $this->dp3_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp3_p3_']; 
       $dp3_p3_ = $this->dp3_p3_; 
       $sStyleHidden_dp3_p3_ = '';
       if (isset($sCheckRead_dp3_p3_))
       {
           unset($sCheckRead_dp3_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['dp3_p3_']))
       {
           $sCheckRead_dp3_p3_ = $this->nmgp_cmp_readonly['dp3_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp3_p3_']) && $this->nmgp_cmp_hidden['dp3_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp3_p3_']);
           $sStyleHidden_dp3_p3_ = 'display: none;';
       }
       $bTestReadOnly_dp3_p3_ = true;
       $sStyleReadLab_dp3_p3_ = 'display: none;';
       $sStyleReadInp_dp3_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['dp3_p3_']) && $this->nmgp_cmp_readonly['dp3_p3_'] == 'on')
       {
           $bTestReadOnly_dp3_p3_ = false;
           unset($this->nmgp_cmp_readonly['dp3_p3_']);
           $sStyleReadLab_dp3_p3_ = '';
           $sStyleReadInp_dp3_p3_ = 'display: none;';
       }
       $this->dp4_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp4_p3_']; 
       $dp4_p3_ = $this->dp4_p3_; 
       $sStyleHidden_dp4_p3_ = '';
       if (isset($sCheckRead_dp4_p3_))
       {
           unset($sCheckRead_dp4_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['dp4_p3_']))
       {
           $sCheckRead_dp4_p3_ = $this->nmgp_cmp_readonly['dp4_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['dp4_p3_']) && $this->nmgp_cmp_hidden['dp4_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dp4_p3_']);
           $sStyleHidden_dp4_p3_ = 'display: none;';
       }
       $bTestReadOnly_dp4_p3_ = true;
       $sStyleReadLab_dp4_p3_ = 'display: none;';
       $sStyleReadInp_dp4_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['dp4_p3_']) && $this->nmgp_cmp_readonly['dp4_p3_'] == 'on')
       {
           $bTestReadOnly_dp4_p3_ = false;
           unset($this->nmgp_cmp_readonly['dp4_p3_']);
           $sStyleReadLab_dp4_p3_ = '';
           $sStyleReadInp_dp4_p3_ = 'display: none;';
       }
       $this->sc_field_0_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['sc_field_0_']; 
       $sc_field_0_ = $this->sc_field_0_; 
       $sStyleHidden_sc_field_0_ = '';
       if (isset($sCheckRead_sc_field_0_))
       {
           unset($sCheckRead_sc_field_0_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_0_']))
       {
           $sCheckRead_sc_field_0_ = $this->nmgp_cmp_readonly['sc_field_0_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_0_']);
           $sStyleHidden_sc_field_0_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_0_ = true;
       $sStyleReadLab_sc_field_0_ = 'display: none;';
       $sStyleReadInp_sc_field_0_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_0_']) && $this->nmgp_cmp_readonly['sc_field_0_'] == 'on')
       {
           $bTestReadOnly_sc_field_0_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_0_']);
           $sStyleReadLab_sc_field_0_ = '';
           $sStyleReadInp_sc_field_0_ = 'display: none;';
       }
       $this->pcent_dp3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_dp3_']; 
       $pcent_dp3_ = $this->pcent_dp3_; 
       $sStyleHidden_pcent_dp3_ = '';
       if (isset($sCheckRead_pcent_dp3_))
       {
           unset($sCheckRead_pcent_dp3_);
       }
       if (isset($this->nmgp_cmp_readonly['pcent_dp3_']))
       {
           $sCheckRead_pcent_dp3_ = $this->nmgp_cmp_readonly['pcent_dp3_'];
       }
       if (isset($this->nmgp_cmp_hidden['pcent_dp3_']) && $this->nmgp_cmp_hidden['pcent_dp3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pcent_dp3_']);
           $sStyleHidden_pcent_dp3_ = 'display: none;';
       }
       $bTestReadOnly_pcent_dp3_ = true;
       $sStyleReadLab_pcent_dp3_ = 'display: none;';
       $sStyleReadInp_pcent_dp3_ = '';
       if (isset($this->nmgp_cmp_readonly['pcent_dp3_']) && $this->nmgp_cmp_readonly['pcent_dp3_'] == 'on')
       {
           $bTestReadOnly_pcent_dp3_ = false;
           unset($this->nmgp_cmp_readonly['pcent_dp3_']);
           $sStyleReadLab_pcent_dp3_ = '';
           $sStyleReadInp_pcent_dp3_ = 'display: none;';
       }
       $this->aee_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['aee_p3_']; 
       $aee_p3_ = $this->aee_p3_; 
       $sStyleHidden_aee_p3_ = '';
       if (isset($sCheckRead_aee_p3_))
       {
           unset($sCheckRead_aee_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['aee_p3_']))
       {
           $sCheckRead_aee_p3_ = $this->nmgp_cmp_readonly['aee_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['aee_p3_']) && $this->nmgp_cmp_hidden['aee_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['aee_p3_']);
           $sStyleHidden_aee_p3_ = 'display: none;';
       }
       $bTestReadOnly_aee_p3_ = true;
       $sStyleReadLab_aee_p3_ = 'display: none;';
       $sStyleReadInp_aee_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['aee_p3_']) && $this->nmgp_cmp_readonly['aee_p3_'] == 'on')
       {
           $bTestReadOnly_aee_p3_ = false;
           unset($this->nmgp_cmp_readonly['aee_p3_']);
           $sStyleReadLab_aee_p3_ = '';
           $sStyleReadInp_aee_p3_ = 'display: none;';
       }
       $this->porcent_aee_p3_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['porcent_aee_p3_']; 
       $porcent_aee_p3_ = $this->porcent_aee_p3_; 
       $sStyleHidden_porcent_aee_p3_ = '';
       if (isset($sCheckRead_porcent_aee_p3_))
       {
           unset($sCheckRead_porcent_aee_p3_);
       }
       if (isset($this->nmgp_cmp_readonly['porcent_aee_p3_']))
       {
           $sCheckRead_porcent_aee_p3_ = $this->nmgp_cmp_readonly['porcent_aee_p3_'];
       }
       if (isset($this->nmgp_cmp_hidden['porcent_aee_p3_']) && $this->nmgp_cmp_hidden['porcent_aee_p3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['porcent_aee_p3_']);
           $sStyleHidden_porcent_aee_p3_ = 'display: none;';
       }
       $bTestReadOnly_porcent_aee_p3_ = true;
       $sStyleReadLab_porcent_aee_p3_ = 'display: none;';
       $sStyleReadInp_porcent_aee_p3_ = '';
       if (isset($this->nmgp_cmp_readonly['porcent_aee_p3_']) && $this->nmgp_cmp_readonly['porcent_aee_p3_'] == 'on')
       {
           $bTestReadOnly_porcent_aee_p3_ = false;
           unset($this->nmgp_cmp_readonly['porcent_aee_p3_']);
           $sStyleReadLab_porcent_aee_p3_ = '';
           $sStyleReadInp_porcent_aee_p3_ = 'display: none;';
       }
       $this->inasistencia_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['inasistencia_p4_']; 
       $inasistencia_p4_ = $this->inasistencia_p4_; 
       $sStyleHidden_inasistencia_p4_ = '';
       if (isset($sCheckRead_inasistencia_p4_))
       {
           unset($sCheckRead_inasistencia_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['inasistencia_p4_']))
       {
           $sCheckRead_inasistencia_p4_ = $this->nmgp_cmp_readonly['inasistencia_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['inasistencia_p4_']) && $this->nmgp_cmp_hidden['inasistencia_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['inasistencia_p4_']);
           $sStyleHidden_inasistencia_p4_ = 'display: none;';
       }
       $bTestReadOnly_inasistencia_p4_ = true;
       $sStyleReadLab_inasistencia_p4_ = 'display: none;';
       $sStyleReadInp_inasistencia_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['inasistencia_p4_']) && $this->nmgp_cmp_readonly['inasistencia_p4_'] == 'on')
       {
           $bTestReadOnly_inasistencia_p4_ = false;
           unset($this->nmgp_cmp_readonly['inasistencia_p4_']);
           $sStyleReadLab_inasistencia_p4_ = '';
           $sStyleReadInp_inasistencia_p4_ = 'display: none;';
       }
       $this->eval_4_per_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['eval_4_per_']; 
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
       $this->dc1_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc1_p4_']; 
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
       $this->dc2_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc2_p4_']; 
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
       $this->dc3_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc3_p4_']; 
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
       $this->dc4_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc4_p4_']; 
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
       $this->dc5_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dc5_p4_']; 
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
       $this->pcent_dc4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_dc4_']; 
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
       $this->ds1_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds1_p4_']; 
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
       $this->ds2_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds2_p4_']; 
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
       $this->ds3_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds3_p4_']; 
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
       $this->ds4_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds4_p4_']; 
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
       $this->ds5_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['ds5_p4_']; 
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
       $this->pcent_ds4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_ds4_']; 
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
       $this->dp1_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp1_p4_']; 
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
       $this->dp2_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp2_p4_']; 
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
       $this->dp3_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp3_p4_']; 
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
       $this->dp4_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp4_p4_']; 
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
       $this->dp5_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['dp5_p4_']; 
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
       $this->aee_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['aee_p4_']; 
       $aee_p4_ = $this->aee_p4_; 
       $sStyleHidden_aee_p4_ = '';
       if (isset($sCheckRead_aee_p4_))
       {
           unset($sCheckRead_aee_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['aee_p4_']))
       {
           $sCheckRead_aee_p4_ = $this->nmgp_cmp_readonly['aee_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['aee_p4_']) && $this->nmgp_cmp_hidden['aee_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['aee_p4_']);
           $sStyleHidden_aee_p4_ = 'display: none;';
       }
       $bTestReadOnly_aee_p4_ = true;
       $sStyleReadLab_aee_p4_ = 'display: none;';
       $sStyleReadInp_aee_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['aee_p4_']) && $this->nmgp_cmp_readonly['aee_p4_'] == 'on')
       {
           $bTestReadOnly_aee_p4_ = false;
           unset($this->nmgp_cmp_readonly['aee_p4_']);
           $sStyleReadLab_aee_p4_ = '';
           $sStyleReadInp_aee_p4_ = 'display: none;';
       }
       $this->porcent_aee_p4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['porcent_aee_p4_']; 
       $porcent_aee_p4_ = $this->porcent_aee_p4_; 
       $sStyleHidden_porcent_aee_p4_ = '';
       if (isset($sCheckRead_porcent_aee_p4_))
       {
           unset($sCheckRead_porcent_aee_p4_);
       }
       if (isset($this->nmgp_cmp_readonly['porcent_aee_p4_']))
       {
           $sCheckRead_porcent_aee_p4_ = $this->nmgp_cmp_readonly['porcent_aee_p4_'];
       }
       if (isset($this->nmgp_cmp_hidden['porcent_aee_p4_']) && $this->nmgp_cmp_hidden['porcent_aee_p4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['porcent_aee_p4_']);
           $sStyleHidden_porcent_aee_p4_ = 'display: none;';
       }
       $bTestReadOnly_porcent_aee_p4_ = true;
       $sStyleReadLab_porcent_aee_p4_ = 'display: none;';
       $sStyleReadInp_porcent_aee_p4_ = '';
       if (isset($this->nmgp_cmp_readonly['porcent_aee_p4_']) && $this->nmgp_cmp_readonly['porcent_aee_p4_'] == 'on')
       {
           $bTestReadOnly_porcent_aee_p4_ = false;
           unset($this->nmgp_cmp_readonly['porcent_aee_p4_']);
           $sStyleReadLab_porcent_aee_p4_ = '';
           $sStyleReadInp_porcent_aee_p4_ = 'display: none;';
       }
       $this->pcent_dp4_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['pcent_dp4_']; 
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
       $this->eval_final_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['eval_final_']; 
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
       $this->entorno_ = $this->form_vert_form_t_evaluacion_pruebas[$sc_seq_vert]['entorno_']; 
       $entorno_ = $this->entorno_; 
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_t_evaluacion_pruebas_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_t_evaluacion_pruebas_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_t_evaluacion_pruebas_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_t_evaluacion_pruebas_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_t_evaluacion_pruebas_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_t_evaluacion_pruebas_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_estudiante_']) && $this->nmgp_cmp_hidden['id_estudiante_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_estudiante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_estudiante_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_estudiante__line" id="hidden_field_data_id_estudiante_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_estudiante_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_estudiante__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_estudiante_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id_estudiante_"]) &&  $this->nmgp_cmp_readonly["id_estudiante_"] == "on")) { 

 ?>
<input type="hidden" name="id_estudiante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_estudiante_) . "\"><span id=\"id_ajax_label_id_estudiante_" . $sc_seq_vert . "\">" . $id_estudiante_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_id_estudiante_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_estudiante_<?php echo $sc_seq_vert ?> css_id_estudiante__line" style="<?php echo $sStyleReadLab_id_estudiante_; ?>"><?php echo $this->form_encode_input($this->id_estudiante_); ?></span><span id="id_read_off_id_estudiante_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_estudiante_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_estudiante__obj" style="" id="id_sc_field_id_estudiante_<?php echo $sc_seq_vert ?>" type=text name="id_estudiante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_estudiante_) ?>"
 size=19 alt="{datatype: 'integer', maxLength: 19, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_estudiante_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_estudiante_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_estudiante_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_estudiante_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['primer_apellido_']) && $this->nmgp_cmp_hidden['primer_apellido_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="primer_apellido_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($primer_apellido_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_primer_apellido__line" id="hidden_field_data_primer_apellido_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_primer_apellido_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_primer_apellido__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_primer_apellido_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["primer_apellido_"]) &&  $this->nmgp_cmp_readonly["primer_apellido_"] == "on") { 

 ?>
<input type="hidden" name="primer_apellido_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($primer_apellido_) . "\">" . $primer_apellido_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_primer_apellido_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-primer_apellido_<?php echo $sc_seq_vert ?> css_primer_apellido__line" style="<?php echo $sStyleReadLab_primer_apellido_; ?>"><?php echo $this->form_encode_input($this->primer_apellido_); ?></span><span id="id_read_off_primer_apellido_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_primer_apellido_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_primer_apellido__obj" style="" id="id_sc_field_primer_apellido_<?php echo $sc_seq_vert ?>" type=text name="primer_apellido_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($primer_apellido_) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_primer_apellido_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_primer_apellido_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['segundo_apellido_']) && $this->nmgp_cmp_hidden['segundo_apellido_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="segundo_apellido_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($segundo_apellido_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_segundo_apellido__line" id="hidden_field_data_segundo_apellido_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_segundo_apellido_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_segundo_apellido__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_segundo_apellido_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["segundo_apellido_"]) &&  $this->nmgp_cmp_readonly["segundo_apellido_"] == "on") { 

 ?>
<input type="hidden" name="segundo_apellido_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($segundo_apellido_) . "\">" . $segundo_apellido_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_segundo_apellido_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-segundo_apellido_<?php echo $sc_seq_vert ?> css_segundo_apellido__line" style="<?php echo $sStyleReadLab_segundo_apellido_; ?>"><?php echo $this->form_encode_input($this->segundo_apellido_); ?></span><span id="id_read_off_segundo_apellido_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_segundo_apellido_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_segundo_apellido__obj" style="" id="id_sc_field_segundo_apellido_<?php echo $sc_seq_vert ?>" type=text name="segundo_apellido_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($segundo_apellido_) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_segundo_apellido_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_segundo_apellido_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['primer_nombre_']) && $this->nmgp_cmp_hidden['primer_nombre_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="primer_nombre_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($primer_nombre_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_primer_nombre__line" id="hidden_field_data_primer_nombre_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_primer_nombre_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_primer_nombre__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_primer_nombre_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["primer_nombre_"]) &&  $this->nmgp_cmp_readonly["primer_nombre_"] == "on") { 

 ?>
<input type="hidden" name="primer_nombre_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($primer_nombre_) . "\">" . $primer_nombre_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_primer_nombre_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-primer_nombre_<?php echo $sc_seq_vert ?> css_primer_nombre__line" style="<?php echo $sStyleReadLab_primer_nombre_; ?>"><?php echo $this->form_encode_input($this->primer_nombre_); ?></span><span id="id_read_off_primer_nombre_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_primer_nombre_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_primer_nombre__obj" style="" id="id_sc_field_primer_nombre_<?php echo $sc_seq_vert ?>" type=text name="primer_nombre_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($primer_nombre_) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_primer_nombre_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_primer_nombre_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['segundo_nombre_']) && $this->nmgp_cmp_hidden['segundo_nombre_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="segundo_nombre_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($segundo_nombre_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_segundo_nombre__line" id="hidden_field_data_segundo_nombre_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_segundo_nombre_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_segundo_nombre__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_segundo_nombre_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["segundo_nombre_"]) &&  $this->nmgp_cmp_readonly["segundo_nombre_"] == "on") { 

 ?>
<input type="hidden" name="segundo_nombre_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($segundo_nombre_) . "\">" . $segundo_nombre_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_segundo_nombre_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-segundo_nombre_<?php echo $sc_seq_vert ?> css_segundo_nombre__line" style="<?php echo $sStyleReadLab_segundo_nombre_; ?>"><?php echo $this->form_encode_input($this->segundo_nombre_); ?></span><span id="id_read_off_segundo_nombre_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_segundo_nombre_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_segundo_nombre__obj" style="" id="id_sc_field_segundo_nombre_<?php echo $sc_seq_vert ?>" type=text name="segundo_nombre_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($segundo_nombre_) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_segundo_nombre_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_segundo_nombre_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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

   <?php if (isset($this->nmgp_cmp_hidden['id_area_']) && $this->nmgp_cmp_hidden['id_area_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_area_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_area_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_area__line" id="hidden_field_data_id_area_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_area_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_area__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_area_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_area_"]) &&  $this->nmgp_cmp_readonly["id_area_"] == "on") { 

 ?>
<input type="hidden" name="id_area_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_area_) . "\">" . $id_area_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_area_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_area_<?php echo $sc_seq_vert ?> css_id_area__line" style="<?php echo $sStyleReadLab_id_area_; ?>"><?php echo $this->form_encode_input($this->id_area_); ?></span><span id="id_read_off_id_area_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_area_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_area__obj" style="" id="id_sc_field_id_area_<?php echo $sc_seq_vert ?>" type=text name="id_area_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_area_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_area_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_area_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_area_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_area_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_asignatura_']) && $this->nmgp_cmp_hidden['id_asignatura_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_asignatura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_asignatura_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_asignatura__line" id="hidden_field_data_id_asignatura_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_asignatura_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_asignatura__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_asignatura_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id_asignatura_"]) &&  $this->nmgp_cmp_readonly["id_asignatura_"] == "on")) { 

 ?>
<input type="hidden" name="id_asignatura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_asignatura_) . "\"><span id=\"id_ajax_label_id_asignatura_" . $sc_seq_vert . "\">" . $id_asignatura_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_id_asignatura_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_asignatura_<?php echo $sc_seq_vert ?> css_id_asignatura__line" style="<?php echo $sStyleReadLab_id_asignatura_; ?>"><?php echo $this->form_encode_input($this->id_asignatura_); ?></span><span id="id_read_off_id_asignatura_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_asignatura_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_asignatura__obj" style="" id="id_sc_field_id_asignatura_<?php echo $sc_seq_vert ?>" type=text name="id_asignatura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_asignatura_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_asignatura_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_asignatura_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_asignatura_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_asignatura_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_grado_']) && $this->nmgp_cmp_hidden['id_grado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_grado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_grado__line" id="hidden_field_data_id_grado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_grado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_grado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_grado_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_grado_"]) &&  $this->nmgp_cmp_readonly["id_grado_"] == "on") { 

 ?>
<input type="hidden" name="id_grado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grado_) . "\">" . $id_grado_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_grado_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_grado_<?php echo $sc_seq_vert ?> css_id_grado__line" style="<?php echo $sStyleReadLab_id_grado_; ?>"><?php echo $this->form_encode_input($this->id_grado_); ?></span><span id="id_read_off_id_grado_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_grado_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_grado__obj" style="" id="id_sc_field_id_grado_<?php echo $sc_seq_vert ?>" type=text name="id_grado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_grado_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_grado_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_grado_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_grado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_grado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_nivel_']) && $this->nmgp_cmp_hidden['id_nivel_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_nivel_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_nivel_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_nivel__line" id="hidden_field_data_id_nivel_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_nivel_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_nivel__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_nivel_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_nivel_"]) &&  $this->nmgp_cmp_readonly["id_nivel_"] == "on") { 

 ?>
<input type="hidden" name="id_nivel_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_nivel_) . "\">" . $id_nivel_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_nivel_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_nivel_<?php echo $sc_seq_vert ?> css_id_nivel__line" style="<?php echo $sStyleReadLab_id_nivel_; ?>"><?php echo $this->form_encode_input($this->id_nivel_); ?></span><span id="id_read_off_id_nivel_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_nivel_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_nivel__obj" style="" id="id_sc_field_id_nivel_<?php echo $sc_seq_vert ?>" type=text name="id_nivel_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_nivel_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_nivel_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_nivel_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_nivel_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_nivel_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ihs_']) && $this->nmgp_cmp_hidden['ihs_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ihs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ihs_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ihs__line" id="hidden_field_data_ihs_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ihs_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ihs__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ihs_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ihs_"]) &&  $this->nmgp_cmp_readonly["ihs_"] == "on") { 

 ?>
<input type="hidden" name="ihs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ihs_) . "\">" . $ihs_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ihs_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ihs_<?php echo $sc_seq_vert ?> css_ihs__line" style="<?php echo $sStyleReadLab_ihs_; ?>"><?php echo $this->form_encode_input($this->ihs_); ?></span><span id="id_read_off_ihs_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ihs_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ihs__obj" style="" id="id_sc_field_ihs_<?php echo $sc_seq_vert ?>" type=text name="ihs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ihs_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ihs_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ihs_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ihs_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ihs_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pfa_']) && $this->nmgp_cmp_hidden['pfa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pfa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pfa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pfa__line" id="hidden_field_data_pfa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pfa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pfa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pfa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pfa_"]) &&  $this->nmgp_cmp_readonly["pfa_"] == "on") { 

 ?>
<input type="hidden" name="pfa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pfa_) . "\">" . $pfa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pfa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pfa_<?php echo $sc_seq_vert ?> css_pfa__line" style="<?php echo $sStyleReadLab_pfa_; ?>"><?php echo $this->form_encode_input($this->pfa_); ?></span><span id="id_read_off_pfa_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pfa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pfa__obj" style="" id="id_sc_field_pfa_<?php echo $sc_seq_vert ?>" type=text name="pfa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pfa_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pfa_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pfa_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pfa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pfa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_asig_']) && $this->nmgp_cmp_hidden['tipo_asig_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo_asig_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_asig_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipo_asig__line" id="hidden_field_data_tipo_asig_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_asig_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo_asig__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_asig_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_asig_"]) &&  $this->nmgp_cmp_readonly["tipo_asig_"] == "on") { 

 ?>
<input type="hidden" name="tipo_asig_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_asig_) . "\">" . $tipo_asig_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipo_asig_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tipo_asig_<?php echo $sc_seq_vert ?> css_tipo_asig__line" style="<?php echo $sStyleReadLab_tipo_asig_; ?>"><?php echo $this->form_encode_input($this->tipo_asig_); ?></span><span id="id_read_off_tipo_asig_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipo_asig_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tipo_asig__obj" style="" id="id_sc_field_tipo_asig_<?php echo $sc_seq_vert ?>" type=text name="tipo_asig_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_asig_) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_asig_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_asig_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['novedad_']) && $this->nmgp_cmp_hidden['novedad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="novedad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($novedad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_novedad__line" id="hidden_field_data_novedad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_novedad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_novedad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_novedad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["novedad_"]) &&  $this->nmgp_cmp_readonly["novedad_"] == "on") { 

 ?>
<input type="hidden" name="novedad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($novedad_) . "\">" . $novedad_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_novedad_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-novedad_<?php echo $sc_seq_vert ?> css_novedad__line" style="<?php echo $sStyleReadLab_novedad_; ?>"><?php echo $this->form_encode_input($this->novedad_); ?></span><span id="id_read_off_novedad_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_novedad_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_novedad__obj" style="" id="id_sc_field_novedad_<?php echo $sc_seq_vert ?>" type=text name="novedad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($novedad_) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_novedad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_novedad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['estatus_']) && $this->nmgp_cmp_hidden['estatus_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatus_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estatus_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_estatus__line" id="hidden_field_data_estatus_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_estatus_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_estatus__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_estatus_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatus_"]) &&  $this->nmgp_cmp_readonly["estatus_"] == "on") { 

 ?>
<input type="hidden" name="estatus_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estatus_) . "\">" . $estatus_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_estatus_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-estatus_<?php echo $sc_seq_vert ?> css_estatus__line" style="<?php echo $sStyleReadLab_estatus_; ?>"><?php echo $this->form_encode_input($this->estatus_); ?></span><span id="id_read_off_estatus_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estatus_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_estatus__obj" style="" id="id_sc_field_estatus_<?php echo $sc_seq_vert ?>" type=text name="estatus_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estatus_) ?>"
 size=2 maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estatus_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estatus_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['inasistencia_p1_']) && $this->nmgp_cmp_hidden['inasistencia_p1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inasistencia_p1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_inasistencia_p1__line" id="hidden_field_data_inasistencia_p1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_inasistencia_p1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_inasistencia_p1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_inasistencia_p1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inasistencia_p1_"]) &&  $this->nmgp_cmp_readonly["inasistencia_p1_"] == "on") { 

 ?>
<input type="hidden" name="inasistencia_p1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p1_) . "\">" . $inasistencia_p1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_inasistencia_p1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-inasistencia_p1_<?php echo $sc_seq_vert ?> css_inasistencia_p1__line" style="<?php echo $sStyleReadLab_inasistencia_p1_; ?>"><?php echo $this->form_encode_input($this->inasistencia_p1_); ?></span><span id="id_read_off_inasistencia_p1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inasistencia_p1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_inasistencia_p1__obj" style="" id="id_sc_field_inasistencia_p1_<?php echo $sc_seq_vert ?>" type=text name="inasistencia_p1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p1_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['inasistencia_p1_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['inasistencia_p1_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inasistencia_p1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inasistencia_p1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_1_per_']) && $this->nmgp_cmp_hidden['eval_1_per_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="eval_1_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_1_per_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_eval_1_per__line" id="hidden_field_data_eval_1_per_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_eval_1_per_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_eval_1_per__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_eval_1_per_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["eval_1_per_"]) &&  $this->nmgp_cmp_readonly["eval_1_per_"] == "on") { 

 ?>
<input type="hidden" name="eval_1_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_1_per_) . "\">" . $eval_1_per_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_eval_1_per_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-eval_1_per_<?php echo $sc_seq_vert ?> css_eval_1_per__line" style="<?php echo $sStyleReadLab_eval_1_per_; ?>"><?php echo $this->form_encode_input($this->eval_1_per_); ?></span><span id="id_read_off_eval_1_per_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_eval_1_per_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_eval_1_per__obj" style="" id="id_sc_field_eval_1_per_<?php echo $sc_seq_vert ?>" type=text name="eval_1_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_1_per_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['eval_1_per_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['eval_1_per_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_eval_1_per_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_eval_1_per_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc1_']) && $this->nmgp_cmp_hidden['dc1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc1__line" id="hidden_field_data_dc1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc1_"]) &&  $this->nmgp_cmp_readonly["dc1_"] == "on") { 

 ?>
<input type="hidden" name="dc1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_) . "\">" . $dc1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc1_<?php echo $sc_seq_vert ?> css_dc1__line" style="<?php echo $sStyleReadLab_dc1_; ?>"><?php echo $this->form_encode_input($this->dc1_); ?></span><span id="id_read_off_dc1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc1__obj" style="" id="id_sc_field_dc1_<?php echo $sc_seq_vert ?>" type=text name="dc1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc1_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc1_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc2_']) && $this->nmgp_cmp_hidden['dc2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc2__line" id="hidden_field_data_dc2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc2_"]) &&  $this->nmgp_cmp_readonly["dc2_"] == "on") { 

 ?>
<input type="hidden" name="dc2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_) . "\">" . $dc2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc2_<?php echo $sc_seq_vert ?> css_dc2__line" style="<?php echo $sStyleReadLab_dc2_; ?>"><?php echo $this->form_encode_input($this->dc2_); ?></span><span id="id_read_off_dc2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc2__obj" style="" id="id_sc_field_dc2_<?php echo $sc_seq_vert ?>" type=text name="dc2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc3_']) && $this->nmgp_cmp_hidden['dc3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc3__line" id="hidden_field_data_dc3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc3_"]) &&  $this->nmgp_cmp_readonly["dc3_"] == "on") { 

 ?>
<input type="hidden" name="dc3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_) . "\">" . $dc3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc3_<?php echo $sc_seq_vert ?> css_dc3__line" style="<?php echo $sStyleReadLab_dc3_; ?>"><?php echo $this->form_encode_input($this->dc3_); ?></span><span id="id_read_off_dc3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc3__obj" style="" id="id_sc_field_dc3_<?php echo $sc_seq_vert ?>" type=text name="dc3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc4_']) && $this->nmgp_cmp_hidden['dc4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc4__line" id="hidden_field_data_dc4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc4_"]) &&  $this->nmgp_cmp_readonly["dc4_"] == "on") { 

 ?>
<input type="hidden" name="dc4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_) . "\">" . $dc4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc4_<?php echo $sc_seq_vert ?> css_dc4__line" style="<?php echo $sStyleReadLab_dc4_; ?>"><?php echo $this->form_encode_input($this->dc4_); ?></span><span id="id_read_off_dc4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc4__obj" style="" id="id_sc_field_dc4_<?php echo $sc_seq_vert ?>" type=text name="dc4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc5_']) && $this->nmgp_cmp_hidden['dc5_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc5__line" id="hidden_field_data_dc5_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc5_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc5__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc5_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc5_"]) &&  $this->nmgp_cmp_readonly["dc5_"] == "on") { 

 ?>
<input type="hidden" name="dc5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_) . "\">" . $dc5_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc5_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc5_<?php echo $sc_seq_vert ?> css_dc5__line" style="<?php echo $sStyleReadLab_dc5_; ?>"><?php echo $this->form_encode_input($this->dc5_); ?></span><span id="id_read_off_dc5_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc5_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc5__obj" style="" id="id_sc_field_dc5_<?php echo $sc_seq_vert ?>" type=text name="dc5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc5_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc5_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc5_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc5_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc6_']) && $this->nmgp_cmp_hidden['dc6_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc6_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc6_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc6__line" id="hidden_field_data_dc6_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc6_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc6__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc6_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc6_"]) &&  $this->nmgp_cmp_readonly["dc6_"] == "on") { 

 ?>
<input type="hidden" name="dc6_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc6_) . "\">" . $dc6_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc6_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc6_<?php echo $sc_seq_vert ?> css_dc6__line" style="<?php echo $sStyleReadLab_dc6_; ?>"><?php echo $this->form_encode_input($this->dc6_); ?></span><span id="id_read_off_dc6_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc6_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc6__obj" style="" id="id_sc_field_dc6_<?php echo $sc_seq_vert ?>" type=text name="dc6_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc6_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc6_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc6_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc6_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc6_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc7_']) && $this->nmgp_cmp_hidden['dc7_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc7_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc7_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc7__line" id="hidden_field_data_dc7_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc7_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc7__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc7_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc7_"]) &&  $this->nmgp_cmp_readonly["dc7_"] == "on") { 

 ?>
<input type="hidden" name="dc7_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc7_) . "\">" . $dc7_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc7_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc7_<?php echo $sc_seq_vert ?> css_dc7__line" style="<?php echo $sStyleReadLab_dc7_; ?>"><?php echo $this->form_encode_input($this->dc7_); ?></span><span id="id_read_off_dc7_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc7_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc7__obj" style="" id="id_sc_field_dc7_<?php echo $sc_seq_vert ?>" type=text name="dc7_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc7_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc7_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc7_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc7_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc7_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc8_']) && $this->nmgp_cmp_hidden['dc8_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc8_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc8_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc8__line" id="hidden_field_data_dc8_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc8_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc8__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc8_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc8_"]) &&  $this->nmgp_cmp_readonly["dc8_"] == "on") { 

 ?>
<input type="hidden" name="dc8_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc8_) . "\">" . $dc8_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc8_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc8_<?php echo $sc_seq_vert ?> css_dc8__line" style="<?php echo $sStyleReadLab_dc8_; ?>"><?php echo $this->form_encode_input($this->dc8_); ?></span><span id="id_read_off_dc8_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc8_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc8__obj" style="" id="id_sc_field_dc8_<?php echo $sc_seq_vert ?>" type=text name="dc8_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc8_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc8_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc8_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc8_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc8_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc9_']) && $this->nmgp_cmp_hidden['dc9_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc9_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc9_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc9__line" id="hidden_field_data_dc9_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc9_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc9__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc9_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc9_"]) &&  $this->nmgp_cmp_readonly["dc9_"] == "on") { 

 ?>
<input type="hidden" name="dc9_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc9_) . "\">" . $dc9_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc9_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc9_<?php echo $sc_seq_vert ?> css_dc9__line" style="<?php echo $sStyleReadLab_dc9_; ?>"><?php echo $this->form_encode_input($this->dc9_); ?></span><span id="id_read_off_dc9_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc9_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc9__obj" style="" id="id_sc_field_dc9_<?php echo $sc_seq_vert ?>" type=text name="dc9_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc9_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc9_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc9_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc9_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc9_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dc_']) && $this->nmgp_cmp_hidden['pcent_dc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_dc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_dc__line" id="hidden_field_data_pcent_dc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_dc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_dc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_dc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_dc_"]) &&  $this->nmgp_cmp_readonly["pcent_dc_"] == "on") { 

 ?>
<input type="hidden" name="pcent_dc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc_) . "\">" . $pcent_dc_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_dc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_dc_<?php echo $sc_seq_vert ?> css_pcent_dc__line" style="<?php echo $sStyleReadLab_pcent_dc_; ?>"><?php echo $this->form_encode_input($this->pcent_dc_); ?></span><span id="id_read_off_pcent_dc_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_dc_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_dc__obj" style="" id="id_sc_field_pcent_dc_<?php echo $sc_seq_vert ?>" type=text name="pcent_dc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dc_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_dc_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds1_']) && $this->nmgp_cmp_hidden['ds1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds1__line" id="hidden_field_data_ds1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds1_"]) &&  $this->nmgp_cmp_readonly["ds1_"] == "on") { 

 ?>
<input type="hidden" name="ds1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_) . "\">" . $ds1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds1_<?php echo $sc_seq_vert ?> css_ds1__line" style="<?php echo $sStyleReadLab_ds1_; ?>"><?php echo $this->form_encode_input($this->ds1_); ?></span><span id="id_read_off_ds1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds1__obj" style="" id="id_sc_field_ds1_<?php echo $sc_seq_vert ?>" type=text name="ds1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds1_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds1_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds2_']) && $this->nmgp_cmp_hidden['ds2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds2__line" id="hidden_field_data_ds2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds2_"]) &&  $this->nmgp_cmp_readonly["ds2_"] == "on") { 

 ?>
<input type="hidden" name="ds2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_) . "\">" . $ds2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds2_<?php echo $sc_seq_vert ?> css_ds2__line" style="<?php echo $sStyleReadLab_ds2_; ?>"><?php echo $this->form_encode_input($this->ds2_); ?></span><span id="id_read_off_ds2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds2__obj" style="" id="id_sc_field_ds2_<?php echo $sc_seq_vert ?>" type=text name="ds2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds3_']) && $this->nmgp_cmp_hidden['ds3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds3__line" id="hidden_field_data_ds3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds3_"]) &&  $this->nmgp_cmp_readonly["ds3_"] == "on") { 

 ?>
<input type="hidden" name="ds3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_) . "\">" . $ds3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds3_<?php echo $sc_seq_vert ?> css_ds3__line" style="<?php echo $sStyleReadLab_ds3_; ?>"><?php echo $this->form_encode_input($this->ds3_); ?></span><span id="id_read_off_ds3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds3__obj" style="" id="id_sc_field_ds3_<?php echo $sc_seq_vert ?>" type=text name="ds3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds4_']) && $this->nmgp_cmp_hidden['ds4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds4__line" id="hidden_field_data_ds4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds4_"]) &&  $this->nmgp_cmp_readonly["ds4_"] == "on") { 

 ?>
<input type="hidden" name="ds4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_) . "\">" . $ds4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds4_<?php echo $sc_seq_vert ?> css_ds4__line" style="<?php echo $sStyleReadLab_ds4_; ?>"><?php echo $this->form_encode_input($this->ds4_); ?></span><span id="id_read_off_ds4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds4__obj" style="" id="id_sc_field_ds4_<?php echo $sc_seq_vert ?>" type=text name="ds4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds5_']) && $this->nmgp_cmp_hidden['ds5_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds5__line" id="hidden_field_data_ds5_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds5_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds5__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds5_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds5_"]) &&  $this->nmgp_cmp_readonly["ds5_"] == "on") { 

 ?>
<input type="hidden" name="ds5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_) . "\">" . $ds5_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds5_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds5_<?php echo $sc_seq_vert ?> css_ds5__line" style="<?php echo $sStyleReadLab_ds5_; ?>"><?php echo $this->form_encode_input($this->ds5_); ?></span><span id="id_read_off_ds5_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds5_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds5__obj" style="" id="id_sc_field_ds5_<?php echo $sc_seq_vert ?>" type=text name="ds5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds5_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds5_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds5_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds5_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_ds_']) && $this->nmgp_cmp_hidden['pcent_ds_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_ds_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_ds__line" id="hidden_field_data_pcent_ds_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_ds_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_ds__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_ds_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_ds_"]) &&  $this->nmgp_cmp_readonly["pcent_ds_"] == "on") { 

 ?>
<input type="hidden" name="pcent_ds_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds_) . "\">" . $pcent_ds_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_ds_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_ds_<?php echo $sc_seq_vert ?> css_pcent_ds__line" style="<?php echo $sStyleReadLab_pcent_ds_; ?>"><?php echo $this->form_encode_input($this->pcent_ds_); ?></span><span id="id_read_off_pcent_ds_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_ds_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_ds__obj" style="" id="id_sc_field_pcent_ds_<?php echo $sc_seq_vert ?>" type=text name="pcent_ds_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_ds_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_ds_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_ds_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_ds_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp1_']) && $this->nmgp_cmp_hidden['dp1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp1__line" id="hidden_field_data_dp1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp1_"]) &&  $this->nmgp_cmp_readonly["dp1_"] == "on") { 

 ?>
<input type="hidden" name="dp1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_) . "\">" . $dp1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp1_<?php echo $sc_seq_vert ?> css_dp1__line" style="<?php echo $sStyleReadLab_dp1_; ?>"><?php echo $this->form_encode_input($this->dp1_); ?></span><span id="id_read_off_dp1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp1__obj" style="" id="id_sc_field_dp1_<?php echo $sc_seq_vert ?>" type=text name="dp1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp1_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp1_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp2_']) && $this->nmgp_cmp_hidden['dp2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp2__line" id="hidden_field_data_dp2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp2_"]) &&  $this->nmgp_cmp_readonly["dp2_"] == "on") { 

 ?>
<input type="hidden" name="dp2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_) . "\">" . $dp2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp2_<?php echo $sc_seq_vert ?> css_dp2__line" style="<?php echo $sStyleReadLab_dp2_; ?>"><?php echo $this->form_encode_input($this->dp2_); ?></span><span id="id_read_off_dp2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp2__obj" style="" id="id_sc_field_dp2_<?php echo $sc_seq_vert ?>" type=text name="dp2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp3_']) && $this->nmgp_cmp_hidden['dp3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp3__line" id="hidden_field_data_dp3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp3_"]) &&  $this->nmgp_cmp_readonly["dp3_"] == "on") { 

 ?>
<input type="hidden" name="dp3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_) . "\">" . $dp3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp3_<?php echo $sc_seq_vert ?> css_dp3__line" style="<?php echo $sStyleReadLab_dp3_; ?>"><?php echo $this->form_encode_input($this->dp3_); ?></span><span id="id_read_off_dp3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp3__obj" style="" id="id_sc_field_dp3_<?php echo $sc_seq_vert ?>" type=text name="dp3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp4_']) && $this->nmgp_cmp_hidden['dp4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp4__line" id="hidden_field_data_dp4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp4_"]) &&  $this->nmgp_cmp_readonly["dp4_"] == "on") { 

 ?>
<input type="hidden" name="dp4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_) . "\">" . $dp4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp4_<?php echo $sc_seq_vert ?> css_dp4__line" style="<?php echo $sStyleReadLab_dp4_; ?>"><?php echo $this->form_encode_input($this->dp4_); ?></span><span id="id_read_off_dp4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp4__obj" style="" id="id_sc_field_dp4_<?php echo $sc_seq_vert ?>" type=text name="dp4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp5_']) && $this->nmgp_cmp_hidden['dp5_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp5_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp5__line" id="hidden_field_data_dp5_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp5_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp5__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp5_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp5_"]) &&  $this->nmgp_cmp_readonly["dp5_"] == "on") { 

 ?>
<input type="hidden" name="dp5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp5_) . "\">" . $dp5_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp5_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp5_<?php echo $sc_seq_vert ?> css_dp5__line" style="<?php echo $sStyleReadLab_dp5_; ?>"><?php echo $this->form_encode_input($this->dp5_); ?></span><span id="id_read_off_dp5_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp5_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp5__obj" style="" id="id_sc_field_dp5_<?php echo $sc_seq_vert ?>" type=text name="dp5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp5_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp5_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp5_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp5_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp5_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dp_']) && $this->nmgp_cmp_hidden['pcent_dp_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_dp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_dp__line" id="hidden_field_data_pcent_dp_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_dp_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_dp__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_dp_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_dp_"]) &&  $this->nmgp_cmp_readonly["pcent_dp_"] == "on") { 

 ?>
<input type="hidden" name="pcent_dp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp_) . "\">" . $pcent_dp_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_dp_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_dp_<?php echo $sc_seq_vert ?> css_pcent_dp__line" style="<?php echo $sStyleReadLab_pcent_dp_; ?>"><?php echo $this->form_encode_input($this->pcent_dp_); ?></span><span id="id_read_off_pcent_dp_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_dp_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_dp__obj" style="" id="id_sc_field_pcent_dp_<?php echo $sc_seq_vert ?>" type=text name="pcent_dp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dp_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_dp_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dp_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dp_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['aeep1_']) && $this->nmgp_cmp_hidden['aeep1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aeep1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aeep1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_aeep1__line" id="hidden_field_data_aeep1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_aeep1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_aeep1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_aeep1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["aeep1_"]) &&  $this->nmgp_cmp_readonly["aeep1_"] == "on") { 

 ?>
<input type="hidden" name="aeep1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aeep1_) . "\">" . $aeep1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_aeep1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-aeep1_<?php echo $sc_seq_vert ?> css_aeep1__line" style="<?php echo $sStyleReadLab_aeep1_; ?>"><?php echo $this->form_encode_input($this->aeep1_); ?></span><span id="id_read_off_aeep1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_aeep1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_aeep1__obj" style="" id="id_sc_field_aeep1_<?php echo $sc_seq_vert ?>" type=text name="aeep1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aeep1_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['aeep1_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['aeep1_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aeep1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aeep1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['porcent_aeep1_']) && $this->nmgp_cmp_hidden['porcent_aeep1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcent_aeep1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcent_aeep1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_porcent_aeep1__line" id="hidden_field_data_porcent_aeep1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_porcent_aeep1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_porcent_aeep1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_porcent_aeep1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcent_aeep1_"]) &&  $this->nmgp_cmp_readonly["porcent_aeep1_"] == "on") { 

 ?>
<input type="hidden" name="porcent_aeep1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcent_aeep1_) . "\">" . $porcent_aeep1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcent_aeep1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-porcent_aeep1_<?php echo $sc_seq_vert ?> css_porcent_aeep1__line" style="<?php echo $sStyleReadLab_porcent_aeep1_; ?>"><?php echo $this->form_encode_input($this->porcent_aeep1_); ?></span><span id="id_read_off_porcent_aeep1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcent_aeep1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_porcent_aeep1__obj" style="" id="id_sc_field_porcent_aeep1_<?php echo $sc_seq_vert ?>" type=text name="porcent_aeep1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcent_aeep1_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcent_aeep1_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcent_aeep1_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcent_aeep1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcent_aeep1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['inasistencia_p2_']) && $this->nmgp_cmp_hidden['inasistencia_p2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inasistencia_p2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_inasistencia_p2__line" id="hidden_field_data_inasistencia_p2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_inasistencia_p2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_inasistencia_p2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_inasistencia_p2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inasistencia_p2_"]) &&  $this->nmgp_cmp_readonly["inasistencia_p2_"] == "on") { 

 ?>
<input type="hidden" name="inasistencia_p2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p2_) . "\">" . $inasistencia_p2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_inasistencia_p2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-inasistencia_p2_<?php echo $sc_seq_vert ?> css_inasistencia_p2__line" style="<?php echo $sStyleReadLab_inasistencia_p2_; ?>"><?php echo $this->form_encode_input($this->inasistencia_p2_); ?></span><span id="id_read_off_inasistencia_p2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inasistencia_p2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_inasistencia_p2__obj" style="" id="id_sc_field_inasistencia_p2_<?php echo $sc_seq_vert ?>" type=text name="inasistencia_p2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p2_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['inasistencia_p2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['inasistencia_p2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inasistencia_p2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inasistencia_p2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_2_per_']) && $this->nmgp_cmp_hidden['eval_2_per_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="eval_2_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_2_per_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_eval_2_per__line" id="hidden_field_data_eval_2_per_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_eval_2_per_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_eval_2_per__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_eval_2_per_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["eval_2_per_"]) &&  $this->nmgp_cmp_readonly["eval_2_per_"] == "on") { 

 ?>
<input type="hidden" name="eval_2_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_2_per_) . "\">" . $eval_2_per_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_eval_2_per_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-eval_2_per_<?php echo $sc_seq_vert ?> css_eval_2_per__line" style="<?php echo $sStyleReadLab_eval_2_per_; ?>"><?php echo $this->form_encode_input($this->eval_2_per_); ?></span><span id="id_read_off_eval_2_per_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_eval_2_per_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_eval_2_per__obj" style="" id="id_sc_field_eval_2_per_<?php echo $sc_seq_vert ?>" type=text name="eval_2_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_2_per_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['eval_2_per_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['eval_2_per_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_eval_2_per_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_eval_2_per_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc1_2p_']) && $this->nmgp_cmp_hidden['dc1_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc1_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc1_2p__line" id="hidden_field_data_dc1_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc1_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc1_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc1_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc1_2p_"]) &&  $this->nmgp_cmp_readonly["dc1_2p_"] == "on") { 

 ?>
<input type="hidden" name="dc1_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_2p_) . "\">" . $dc1_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc1_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc1_2p_<?php echo $sc_seq_vert ?> css_dc1_2p__line" style="<?php echo $sStyleReadLab_dc1_2p_; ?>"><?php echo $this->form_encode_input($this->dc1_2p_); ?></span><span id="id_read_off_dc1_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc1_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc1_2p__obj" style="" id="id_sc_field_dc1_2p_<?php echo $sc_seq_vert ?>" type=text name="dc1_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc1_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc1_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc1_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc1_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc2_2p_']) && $this->nmgp_cmp_hidden['dc2_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc2_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc2_2p__line" id="hidden_field_data_dc2_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc2_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc2_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc2_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc2_2p_"]) &&  $this->nmgp_cmp_readonly["dc2_2p_"] == "on") { 

 ?>
<input type="hidden" name="dc2_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_2p_) . "\">" . $dc2_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc2_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc2_2p_<?php echo $sc_seq_vert ?> css_dc2_2p__line" style="<?php echo $sStyleReadLab_dc2_2p_; ?>"><?php echo $this->form_encode_input($this->dc2_2p_); ?></span><span id="id_read_off_dc2_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc2_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc2_2p__obj" style="" id="id_sc_field_dc2_2p_<?php echo $sc_seq_vert ?>" type=text name="dc2_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc2_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc2_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc2_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc2_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc3_2p_']) && $this->nmgp_cmp_hidden['dc3_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc3_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc3_2p__line" id="hidden_field_data_dc3_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc3_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc3_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc3_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc3_2p_"]) &&  $this->nmgp_cmp_readonly["dc3_2p_"] == "on") { 

 ?>
<input type="hidden" name="dc3_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_2p_) . "\">" . $dc3_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc3_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc3_2p_<?php echo $sc_seq_vert ?> css_dc3_2p__line" style="<?php echo $sStyleReadLab_dc3_2p_; ?>"><?php echo $this->form_encode_input($this->dc3_2p_); ?></span><span id="id_read_off_dc3_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc3_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc3_2p__obj" style="" id="id_sc_field_dc3_2p_<?php echo $sc_seq_vert ?>" type=text name="dc3_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc3_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc3_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc3_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc3_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc4_2p_']) && $this->nmgp_cmp_hidden['dc4_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc4_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc4_2p__line" id="hidden_field_data_dc4_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc4_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc4_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc4_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc4_2p_"]) &&  $this->nmgp_cmp_readonly["dc4_2p_"] == "on") { 

 ?>
<input type="hidden" name="dc4_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_2p_) . "\">" . $dc4_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc4_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc4_2p_<?php echo $sc_seq_vert ?> css_dc4_2p__line" style="<?php echo $sStyleReadLab_dc4_2p_; ?>"><?php echo $this->form_encode_input($this->dc4_2p_); ?></span><span id="id_read_off_dc4_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc4_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc4_2p__obj" style="" id="id_sc_field_dc4_2p_<?php echo $sc_seq_vert ?>" type=text name="dc4_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc4_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc4_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc4_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc4_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc5_2p_']) && $this->nmgp_cmp_hidden['dc5_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc5_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc5_2p__line" id="hidden_field_data_dc5_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc5_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc5_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc5_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc5_2p_"]) &&  $this->nmgp_cmp_readonly["dc5_2p_"] == "on") { 

 ?>
<input type="hidden" name="dc5_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_2p_) . "\">" . $dc5_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc5_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc5_2p_<?php echo $sc_seq_vert ?> css_dc5_2p__line" style="<?php echo $sStyleReadLab_dc5_2p_; ?>"><?php echo $this->form_encode_input($this->dc5_2p_); ?></span><span id="id_read_off_dc5_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc5_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc5_2p__obj" style="" id="id_sc_field_dc5_2p_<?php echo $sc_seq_vert ?>" type=text name="dc5_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc5_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc5_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc5_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc5_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dc2_']) && $this->nmgp_cmp_hidden['pcent_dc2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_dc2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_dc2__line" id="hidden_field_data_pcent_dc2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_dc2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_dc2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_dc2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_dc2_"]) &&  $this->nmgp_cmp_readonly["pcent_dc2_"] == "on") { 

 ?>
<input type="hidden" name="pcent_dc2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc2_) . "\">" . $pcent_dc2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_dc2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_dc2_<?php echo $sc_seq_vert ?> css_pcent_dc2__line" style="<?php echo $sStyleReadLab_pcent_dc2_; ?>"><?php echo $this->form_encode_input($this->pcent_dc2_); ?></span><span id="id_read_off_pcent_dc2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_dc2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_dc2__obj" style="" id="id_sc_field_pcent_dc2_<?php echo $sc_seq_vert ?>" type=text name="pcent_dc2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc2_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dc2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_dc2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dc2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dc2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds1_2p_']) && $this->nmgp_cmp_hidden['ds1_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds1_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds1_2p__line" id="hidden_field_data_ds1_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds1_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds1_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds1_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds1_2p_"]) &&  $this->nmgp_cmp_readonly["ds1_2p_"] == "on") { 

 ?>
<input type="hidden" name="ds1_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_2p_) . "\">" . $ds1_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds1_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds1_2p_<?php echo $sc_seq_vert ?> css_ds1_2p__line" style="<?php echo $sStyleReadLab_ds1_2p_; ?>"><?php echo $this->form_encode_input($this->ds1_2p_); ?></span><span id="id_read_off_ds1_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds1_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds1_2p__obj" style="" id="id_sc_field_ds1_2p_<?php echo $sc_seq_vert ?>" type=text name="ds1_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds1_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds1_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds1_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds1_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds2_2p_']) && $this->nmgp_cmp_hidden['ds2_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds2_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds2_2p__line" id="hidden_field_data_ds2_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds2_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds2_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds2_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds2_2p_"]) &&  $this->nmgp_cmp_readonly["ds2_2p_"] == "on") { 

 ?>
<input type="hidden" name="ds2_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_2p_) . "\">" . $ds2_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds2_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds2_2p_<?php echo $sc_seq_vert ?> css_ds2_2p__line" style="<?php echo $sStyleReadLab_ds2_2p_; ?>"><?php echo $this->form_encode_input($this->ds2_2p_); ?></span><span id="id_read_off_ds2_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds2_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds2_2p__obj" style="" id="id_sc_field_ds2_2p_<?php echo $sc_seq_vert ?>" type=text name="ds2_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds2_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds2_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds2_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds2_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds3_2p_']) && $this->nmgp_cmp_hidden['ds3_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds3_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds3_2p__line" id="hidden_field_data_ds3_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds3_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds3_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds3_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds3_2p_"]) &&  $this->nmgp_cmp_readonly["ds3_2p_"] == "on") { 

 ?>
<input type="hidden" name="ds3_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_2p_) . "\">" . $ds3_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds3_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds3_2p_<?php echo $sc_seq_vert ?> css_ds3_2p__line" style="<?php echo $sStyleReadLab_ds3_2p_; ?>"><?php echo $this->form_encode_input($this->ds3_2p_); ?></span><span id="id_read_off_ds3_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds3_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds3_2p__obj" style="" id="id_sc_field_ds3_2p_<?php echo $sc_seq_vert ?>" type=text name="ds3_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds3_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds3_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds3_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds3_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds4_2p_']) && $this->nmgp_cmp_hidden['ds4_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds4_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds4_2p__line" id="hidden_field_data_ds4_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds4_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds4_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds4_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds4_2p_"]) &&  $this->nmgp_cmp_readonly["ds4_2p_"] == "on") { 

 ?>
<input type="hidden" name="ds4_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_2p_) . "\">" . $ds4_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds4_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds4_2p_<?php echo $sc_seq_vert ?> css_ds4_2p__line" style="<?php echo $sStyleReadLab_ds4_2p_; ?>"><?php echo $this->form_encode_input($this->ds4_2p_); ?></span><span id="id_read_off_ds4_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds4_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds4_2p__obj" style="" id="id_sc_field_ds4_2p_<?php echo $sc_seq_vert ?>" type=text name="ds4_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds4_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds4_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds4_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds4_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds5_2p_']) && $this->nmgp_cmp_hidden['ds5_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds5_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds5_2p__line" id="hidden_field_data_ds5_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds5_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds5_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds5_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds5_2p_"]) &&  $this->nmgp_cmp_readonly["ds5_2p_"] == "on") { 

 ?>
<input type="hidden" name="ds5_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_2p_) . "\">" . $ds5_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds5_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds5_2p_<?php echo $sc_seq_vert ?> css_ds5_2p__line" style="<?php echo $sStyleReadLab_ds5_2p_; ?>"><?php echo $this->form_encode_input($this->ds5_2p_); ?></span><span id="id_read_off_ds5_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds5_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds5_2p__obj" style="" id="id_sc_field_ds5_2p_<?php echo $sc_seq_vert ?>" type=text name="ds5_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds5_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds5_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds5_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds5_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_ds2_']) && $this->nmgp_cmp_hidden['pcent_ds2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_ds2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_ds2__line" id="hidden_field_data_pcent_ds2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_ds2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_ds2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_ds2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_ds2_"]) &&  $this->nmgp_cmp_readonly["pcent_ds2_"] == "on") { 

 ?>
<input type="hidden" name="pcent_ds2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds2_) . "\">" . $pcent_ds2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_ds2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_ds2_<?php echo $sc_seq_vert ?> css_pcent_ds2__line" style="<?php echo $sStyleReadLab_pcent_ds2_; ?>"><?php echo $this->form_encode_input($this->pcent_ds2_); ?></span><span id="id_read_off_pcent_ds2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_ds2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_ds2__obj" style="" id="id_sc_field_pcent_ds2_<?php echo $sc_seq_vert ?>" type=text name="pcent_ds2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds2_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_ds2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_ds2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_ds2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_ds2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp1_2p_']) && $this->nmgp_cmp_hidden['dp1_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp1_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp1_2p__line" id="hidden_field_data_dp1_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp1_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp1_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp1_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp1_2p_"]) &&  $this->nmgp_cmp_readonly["dp1_2p_"] == "on") { 

 ?>
<input type="hidden" name="dp1_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_2p_) . "\">" . $dp1_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp1_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp1_2p_<?php echo $sc_seq_vert ?> css_dp1_2p__line" style="<?php echo $sStyleReadLab_dp1_2p_; ?>"><?php echo $this->form_encode_input($this->dp1_2p_); ?></span><span id="id_read_off_dp1_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp1_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp1_2p__obj" style="" id="id_sc_field_dp1_2p_<?php echo $sc_seq_vert ?>" type=text name="dp1_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp1_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp1_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp1_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp1_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp2_2p_']) && $this->nmgp_cmp_hidden['dp2_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp2_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp2_2p__line" id="hidden_field_data_dp2_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp2_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp2_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp2_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp2_2p_"]) &&  $this->nmgp_cmp_readonly["dp2_2p_"] == "on") { 

 ?>
<input type="hidden" name="dp2_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_2p_) . "\">" . $dp2_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp2_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp2_2p_<?php echo $sc_seq_vert ?> css_dp2_2p__line" style="<?php echo $sStyleReadLab_dp2_2p_; ?>"><?php echo $this->form_encode_input($this->dp2_2p_); ?></span><span id="id_read_off_dp2_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp2_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp2_2p__obj" style="" id="id_sc_field_dp2_2p_<?php echo $sc_seq_vert ?>" type=text name="dp2_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp2_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp2_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp2_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp2_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp3_2p_']) && $this->nmgp_cmp_hidden['dp3_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp3_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp3_2p__line" id="hidden_field_data_dp3_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp3_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp3_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp3_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp3_2p_"]) &&  $this->nmgp_cmp_readonly["dp3_2p_"] == "on") { 

 ?>
<input type="hidden" name="dp3_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_2p_) . "\">" . $dp3_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp3_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp3_2p_<?php echo $sc_seq_vert ?> css_dp3_2p__line" style="<?php echo $sStyleReadLab_dp3_2p_; ?>"><?php echo $this->form_encode_input($this->dp3_2p_); ?></span><span id="id_read_off_dp3_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp3_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp3_2p__obj" style="" id="id_sc_field_dp3_2p_<?php echo $sc_seq_vert ?>" type=text name="dp3_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp3_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp3_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp3_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp3_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp4_2p_']) && $this->nmgp_cmp_hidden['dp4_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp4_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp4_2p__line" id="hidden_field_data_dp4_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp4_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp4_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp4_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp4_2p_"]) &&  $this->nmgp_cmp_readonly["dp4_2p_"] == "on") { 

 ?>
<input type="hidden" name="dp4_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_2p_) . "\">" . $dp4_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp4_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp4_2p_<?php echo $sc_seq_vert ?> css_dp4_2p__line" style="<?php echo $sStyleReadLab_dp4_2p_; ?>"><?php echo $this->form_encode_input($this->dp4_2p_); ?></span><span id="id_read_off_dp4_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp4_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp4_2p__obj" style="" id="id_sc_field_dp4_2p_<?php echo $sc_seq_vert ?>" type=text name="dp4_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp4_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp4_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp4_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp4_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp5_2p_']) && $this->nmgp_cmp_hidden['dp5_2p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp5_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp5_2p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp5_2p__line" id="hidden_field_data_dp5_2p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp5_2p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp5_2p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp5_2p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp5_2p_"]) &&  $this->nmgp_cmp_readonly["dp5_2p_"] == "on") { 

 ?>
<input type="hidden" name="dp5_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp5_2p_) . "\">" . $dp5_2p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp5_2p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp5_2p_<?php echo $sc_seq_vert ?> css_dp5_2p__line" style="<?php echo $sStyleReadLab_dp5_2p_; ?>"><?php echo $this->form_encode_input($this->dp5_2p_); ?></span><span id="id_read_off_dp5_2p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp5_2p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp5_2p__obj" style="" id="id_sc_field_dp5_2p_<?php echo $sc_seq_vert ?>" type=text name="dp5_2p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp5_2p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp5_2p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp5_2p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp5_2p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp5_2p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dp2_']) && $this->nmgp_cmp_hidden['pcent_dp2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_dp2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_dp2__line" id="hidden_field_data_pcent_dp2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_dp2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_dp2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_dp2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_dp2_"]) &&  $this->nmgp_cmp_readonly["pcent_dp2_"] == "on") { 

 ?>
<input type="hidden" name="pcent_dp2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp2_) . "\">" . $pcent_dp2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_dp2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_dp2_<?php echo $sc_seq_vert ?> css_pcent_dp2__line" style="<?php echo $sStyleReadLab_pcent_dp2_; ?>"><?php echo $this->form_encode_input($this->pcent_dp2_); ?></span><span id="id_read_off_pcent_dp2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_dp2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_dp2__obj" style="" id="id_sc_field_pcent_dp2_<?php echo $sc_seq_vert ?>" type=text name="pcent_dp2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp2_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dp2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_dp2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dp2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dp2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['aee_p2_']) && $this->nmgp_cmp_hidden['aee_p2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aee_p2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aee_p2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_aee_p2__line" id="hidden_field_data_aee_p2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_aee_p2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_aee_p2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_aee_p2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["aee_p2_"]) &&  $this->nmgp_cmp_readonly["aee_p2_"] == "on") { 

 ?>
<input type="hidden" name="aee_p2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aee_p2_) . "\">" . $aee_p2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_aee_p2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-aee_p2_<?php echo $sc_seq_vert ?> css_aee_p2__line" style="<?php echo $sStyleReadLab_aee_p2_; ?>"><?php echo $this->form_encode_input($this->aee_p2_); ?></span><span id="id_read_off_aee_p2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_aee_p2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_aee_p2__obj" style="" id="id_sc_field_aee_p2_<?php echo $sc_seq_vert ?>" type=text name="aee_p2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aee_p2_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['aee_p2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['aee_p2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aee_p2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aee_p2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['porcet_aee_p2_']) && $this->nmgp_cmp_hidden['porcet_aee_p2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcet_aee_p2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcet_aee_p2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_porcet_aee_p2__line" id="hidden_field_data_porcet_aee_p2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_porcet_aee_p2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_porcet_aee_p2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_porcet_aee_p2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcet_aee_p2_"]) &&  $this->nmgp_cmp_readonly["porcet_aee_p2_"] == "on") { 

 ?>
<input type="hidden" name="porcet_aee_p2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcet_aee_p2_) . "\">" . $porcet_aee_p2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcet_aee_p2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-porcet_aee_p2_<?php echo $sc_seq_vert ?> css_porcet_aee_p2__line" style="<?php echo $sStyleReadLab_porcet_aee_p2_; ?>"><?php echo $this->form_encode_input($this->porcet_aee_p2_); ?></span><span id="id_read_off_porcet_aee_p2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcet_aee_p2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_porcet_aee_p2__obj" style="" id="id_sc_field_porcet_aee_p2_<?php echo $sc_seq_vert ?>" type=text name="porcet_aee_p2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcet_aee_p2_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcet_aee_p2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcet_aee_p2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcet_aee_p2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcet_aee_p2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['inasistencia_p3_']) && $this->nmgp_cmp_hidden['inasistencia_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inasistencia_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_inasistencia_p3__line" id="hidden_field_data_inasistencia_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_inasistencia_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_inasistencia_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_inasistencia_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inasistencia_p3_"]) &&  $this->nmgp_cmp_readonly["inasistencia_p3_"] == "on") { 

 ?>
<input type="hidden" name="inasistencia_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p3_) . "\">" . $inasistencia_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_inasistencia_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-inasistencia_p3_<?php echo $sc_seq_vert ?> css_inasistencia_p3__line" style="<?php echo $sStyleReadLab_inasistencia_p3_; ?>"><?php echo $this->form_encode_input($this->inasistencia_p3_); ?></span><span id="id_read_off_inasistencia_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inasistencia_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_inasistencia_p3__obj" style="" id="id_sc_field_inasistencia_p3_<?php echo $sc_seq_vert ?>" type=text name="inasistencia_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p3_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['inasistencia_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['inasistencia_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inasistencia_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inasistencia_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_3_per_']) && $this->nmgp_cmp_hidden['eval_3_per_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="eval_3_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_3_per_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_eval_3_per__line" id="hidden_field_data_eval_3_per_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_eval_3_per_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_eval_3_per__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_eval_3_per_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["eval_3_per_"]) &&  $this->nmgp_cmp_readonly["eval_3_per_"] == "on") { 

 ?>
<input type="hidden" name="eval_3_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_3_per_) . "\">" . $eval_3_per_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_eval_3_per_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-eval_3_per_<?php echo $sc_seq_vert ?> css_eval_3_per__line" style="<?php echo $sStyleReadLab_eval_3_per_; ?>"><?php echo $this->form_encode_input($this->eval_3_per_); ?></span><span id="id_read_off_eval_3_per_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_eval_3_per_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_eval_3_per__obj" style="" id="id_sc_field_eval_3_per_<?php echo $sc_seq_vert ?>" type=text name="eval_3_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_3_per_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['eval_3_per_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['eval_3_per_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_eval_3_per_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_eval_3_per_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc1_3p_']) && $this->nmgp_cmp_hidden['dc1_3p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc1_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_3p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc1_3p__line" id="hidden_field_data_dc1_3p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc1_3p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc1_3p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc1_3p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc1_3p_"]) &&  $this->nmgp_cmp_readonly["dc1_3p_"] == "on") { 

 ?>
<input type="hidden" name="dc1_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_3p_) . "\">" . $dc1_3p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc1_3p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc1_3p_<?php echo $sc_seq_vert ?> css_dc1_3p__line" style="<?php echo $sStyleReadLab_dc1_3p_; ?>"><?php echo $this->form_encode_input($this->dc1_3p_); ?></span><span id="id_read_off_dc1_3p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc1_3p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc1_3p__obj" style="" id="id_sc_field_dc1_3p_<?php echo $sc_seq_vert ?>" type=text name="dc1_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc1_3p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc1_3p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc1_3p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc1_3p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc1_3p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc2_3p_']) && $this->nmgp_cmp_hidden['dc2_3p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc2_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_3p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc2_3p__line" id="hidden_field_data_dc2_3p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc2_3p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc2_3p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc2_3p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc2_3p_"]) &&  $this->nmgp_cmp_readonly["dc2_3p_"] == "on") { 

 ?>
<input type="hidden" name="dc2_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_3p_) . "\">" . $dc2_3p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc2_3p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc2_3p_<?php echo $sc_seq_vert ?> css_dc2_3p__line" style="<?php echo $sStyleReadLab_dc2_3p_; ?>"><?php echo $this->form_encode_input($this->dc2_3p_); ?></span><span id="id_read_off_dc2_3p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc2_3p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc2_3p__obj" style="" id="id_sc_field_dc2_3p_<?php echo $sc_seq_vert ?>" type=text name="dc2_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc2_3p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc2_3p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc2_3p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc2_3p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc2_3p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc3_3p_']) && $this->nmgp_cmp_hidden['dc3_3p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc3_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_3p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc3_3p__line" id="hidden_field_data_dc3_3p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc3_3p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc3_3p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc3_3p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc3_3p_"]) &&  $this->nmgp_cmp_readonly["dc3_3p_"] == "on") { 

 ?>
<input type="hidden" name="dc3_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_3p_) . "\">" . $dc3_3p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc3_3p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc3_3p_<?php echo $sc_seq_vert ?> css_dc3_3p__line" style="<?php echo $sStyleReadLab_dc3_3p_; ?>"><?php echo $this->form_encode_input($this->dc3_3p_); ?></span><span id="id_read_off_dc3_3p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc3_3p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc3_3p__obj" style="" id="id_sc_field_dc3_3p_<?php echo $sc_seq_vert ?>" type=text name="dc3_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc3_3p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc3_3p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc3_3p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc3_3p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc3_3p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc4_3p_']) && $this->nmgp_cmp_hidden['dc4_3p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc4_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_3p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc4_3p__line" id="hidden_field_data_dc4_3p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc4_3p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc4_3p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc4_3p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc4_3p_"]) &&  $this->nmgp_cmp_readonly["dc4_3p_"] == "on") { 

 ?>
<input type="hidden" name="dc4_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_3p_) . "\">" . $dc4_3p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc4_3p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc4_3p_<?php echo $sc_seq_vert ?> css_dc4_3p__line" style="<?php echo $sStyleReadLab_dc4_3p_; ?>"><?php echo $this->form_encode_input($this->dc4_3p_); ?></span><span id="id_read_off_dc4_3p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc4_3p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc4_3p__obj" style="" id="id_sc_field_dc4_3p_<?php echo $sc_seq_vert ?>" type=text name="dc4_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc4_3p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc4_3p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc4_3p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc4_3p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc4_3p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dc5_3p_']) && $this->nmgp_cmp_hidden['dc5_3p_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dc5_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_3p_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dc5_3p__line" id="hidden_field_data_dc5_3p_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dc5_3p_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dc5_3p__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dc5_3p_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dc5_3p_"]) &&  $this->nmgp_cmp_readonly["dc5_3p_"] == "on") { 

 ?>
<input type="hidden" name="dc5_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_3p_) . "\">" . $dc5_3p_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dc5_3p_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dc5_3p_<?php echo $sc_seq_vert ?> css_dc5_3p__line" style="<?php echo $sStyleReadLab_dc5_3p_; ?>"><?php echo $this->form_encode_input($this->dc5_3p_); ?></span><span id="id_read_off_dc5_3p_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dc5_3p_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dc5_3p__obj" style="" id="id_sc_field_dc5_3p_<?php echo $sc_seq_vert ?>" type=text name="dc5_3p_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dc5_3p_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc5_3p_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc5_3p_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc5_3p_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc5_3p_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dc3_']) && $this->nmgp_cmp_hidden['pcent_dc3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_dc3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_dc3__line" id="hidden_field_data_pcent_dc3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_dc3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_dc3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_dc3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_dc3_"]) &&  $this->nmgp_cmp_readonly["pcent_dc3_"] == "on") { 

 ?>
<input type="hidden" name="pcent_dc3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc3_) . "\">" . $pcent_dc3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_dc3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_dc3_<?php echo $sc_seq_vert ?> css_pcent_dc3__line" style="<?php echo $sStyleReadLab_pcent_dc3_; ?>"><?php echo $this->form_encode_input($this->pcent_dc3_); ?></span><span id="id_read_off_pcent_dc3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_dc3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_dc3__obj" style="" id="id_sc_field_pcent_dc3_<?php echo $sc_seq_vert ?>" type=text name="pcent_dc3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dc3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dc3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_dc3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dc3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dc3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds1_p3_']) && $this->nmgp_cmp_hidden['ds1_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds1_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds1_p3__line" id="hidden_field_data_ds1_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds1_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds1_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds1_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds1_p3_"]) &&  $this->nmgp_cmp_readonly["ds1_p3_"] == "on") { 

 ?>
<input type="hidden" name="ds1_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_p3_) . "\">" . $ds1_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds1_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds1_p3_<?php echo $sc_seq_vert ?> css_ds1_p3__line" style="<?php echo $sStyleReadLab_ds1_p3_; ?>"><?php echo $this->form_encode_input($this->ds1_p3_); ?></span><span id="id_read_off_ds1_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds1_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds1_p3__obj" style="" id="id_sc_field_ds1_p3_<?php echo $sc_seq_vert ?>" type=text name="ds1_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds1_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds1_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds1_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds1_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds1_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds2_p3_']) && $this->nmgp_cmp_hidden['ds2_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds2_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds2_p3__line" id="hidden_field_data_ds2_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds2_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds2_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds2_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds2_p3_"]) &&  $this->nmgp_cmp_readonly["ds2_p3_"] == "on") { 

 ?>
<input type="hidden" name="ds2_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_p3_) . "\">" . $ds2_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds2_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds2_p3_<?php echo $sc_seq_vert ?> css_ds2_p3__line" style="<?php echo $sStyleReadLab_ds2_p3_; ?>"><?php echo $this->form_encode_input($this->ds2_p3_); ?></span><span id="id_read_off_ds2_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds2_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds2_p3__obj" style="" id="id_sc_field_ds2_p3_<?php echo $sc_seq_vert ?>" type=text name="ds2_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds2_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds2_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds2_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds2_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds2_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds3_p3_']) && $this->nmgp_cmp_hidden['ds3_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds3_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds3_p3__line" id="hidden_field_data_ds3_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds3_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds3_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds3_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds3_p3_"]) &&  $this->nmgp_cmp_readonly["ds3_p3_"] == "on") { 

 ?>
<input type="hidden" name="ds3_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_p3_) . "\">" . $ds3_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds3_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds3_p3_<?php echo $sc_seq_vert ?> css_ds3_p3__line" style="<?php echo $sStyleReadLab_ds3_p3_; ?>"><?php echo $this->form_encode_input($this->ds3_p3_); ?></span><span id="id_read_off_ds3_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds3_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds3_p3__obj" style="" id="id_sc_field_ds3_p3_<?php echo $sc_seq_vert ?>" type=text name="ds3_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds3_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds3_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds3_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds3_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds3_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds4_p3_']) && $this->nmgp_cmp_hidden['ds4_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds4_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds4_p3__line" id="hidden_field_data_ds4_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds4_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds4_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds4_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds4_p3_"]) &&  $this->nmgp_cmp_readonly["ds4_p3_"] == "on") { 

 ?>
<input type="hidden" name="ds4_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_p3_) . "\">" . $ds4_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds4_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds4_p3_<?php echo $sc_seq_vert ?> css_ds4_p3__line" style="<?php echo $sStyleReadLab_ds4_p3_; ?>"><?php echo $this->form_encode_input($this->ds4_p3_); ?></span><span id="id_read_off_ds4_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds4_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds4_p3__obj" style="" id="id_sc_field_ds4_p3_<?php echo $sc_seq_vert ?>" type=text name="ds4_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds4_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds4_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds4_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds4_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds4_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ds5_p3_']) && $this->nmgp_cmp_hidden['ds5_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ds5_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ds5_p3__line" id="hidden_field_data_ds5_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ds5_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ds5_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ds5_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ds5_p3_"]) &&  $this->nmgp_cmp_readonly["ds5_p3_"] == "on") { 

 ?>
<input type="hidden" name="ds5_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_p3_) . "\">" . $ds5_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ds5_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ds5_p3_<?php echo $sc_seq_vert ?> css_ds5_p3__line" style="<?php echo $sStyleReadLab_ds5_p3_; ?>"><?php echo $this->form_encode_input($this->ds5_p3_); ?></span><span id="id_read_off_ds5_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ds5_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ds5_p3__obj" style="" id="id_sc_field_ds5_p3_<?php echo $sc_seq_vert ?>" type=text name="ds5_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ds5_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds5_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds5_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ds5_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ds5_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_ds3_']) && $this->nmgp_cmp_hidden['pcent_ds3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_ds3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_ds3__line" id="hidden_field_data_pcent_ds3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_ds3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_ds3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_ds3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_ds3_"]) &&  $this->nmgp_cmp_readonly["pcent_ds3_"] == "on") { 

 ?>
<input type="hidden" name="pcent_ds3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds3_) . "\">" . $pcent_ds3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_ds3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_ds3_<?php echo $sc_seq_vert ?> css_pcent_ds3__line" style="<?php echo $sStyleReadLab_pcent_ds3_; ?>"><?php echo $this->form_encode_input($this->pcent_ds3_); ?></span><span id="id_read_off_pcent_ds3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_ds3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_ds3__obj" style="" id="id_sc_field_pcent_ds3_<?php echo $sc_seq_vert ?>" type=text name="pcent_ds3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_ds3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_ds3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_ds3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_ds3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_ds3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp1_p3_']) && $this->nmgp_cmp_hidden['dp1_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp1_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp1_p3__line" id="hidden_field_data_dp1_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp1_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp1_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp1_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp1_p3_"]) &&  $this->nmgp_cmp_readonly["dp1_p3_"] == "on") { 

 ?>
<input type="hidden" name="dp1_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_p3_) . "\">" . $dp1_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp1_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp1_p3_<?php echo $sc_seq_vert ?> css_dp1_p3__line" style="<?php echo $sStyleReadLab_dp1_p3_; ?>"><?php echo $this->form_encode_input($this->dp1_p3_); ?></span><span id="id_read_off_dp1_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp1_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp1_p3__obj" style="" id="id_sc_field_dp1_p3_<?php echo $sc_seq_vert ?>" type=text name="dp1_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp1_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp1_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp1_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp1_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp1_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp2_p3_']) && $this->nmgp_cmp_hidden['dp2_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp2_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp2_p3__line" id="hidden_field_data_dp2_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp2_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp2_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp2_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp2_p3_"]) &&  $this->nmgp_cmp_readonly["dp2_p3_"] == "on") { 

 ?>
<input type="hidden" name="dp2_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_p3_) . "\">" . $dp2_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp2_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp2_p3_<?php echo $sc_seq_vert ?> css_dp2_p3__line" style="<?php echo $sStyleReadLab_dp2_p3_; ?>"><?php echo $this->form_encode_input($this->dp2_p3_); ?></span><span id="id_read_off_dp2_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp2_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp2_p3__obj" style="" id="id_sc_field_dp2_p3_<?php echo $sc_seq_vert ?>" type=text name="dp2_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp2_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp2_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp2_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp2_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp2_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp3_p3_']) && $this->nmgp_cmp_hidden['dp3_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp3_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp3_p3__line" id="hidden_field_data_dp3_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp3_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp3_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp3_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp3_p3_"]) &&  $this->nmgp_cmp_readonly["dp3_p3_"] == "on") { 

 ?>
<input type="hidden" name="dp3_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_p3_) . "\">" . $dp3_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp3_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp3_p3_<?php echo $sc_seq_vert ?> css_dp3_p3__line" style="<?php echo $sStyleReadLab_dp3_p3_; ?>"><?php echo $this->form_encode_input($this->dp3_p3_); ?></span><span id="id_read_off_dp3_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp3_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp3_p3__obj" style="" id="id_sc_field_dp3_p3_<?php echo $sc_seq_vert ?>" type=text name="dp3_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp3_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp3_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp3_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp3_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp3_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dp4_p3_']) && $this->nmgp_cmp_hidden['dp4_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dp4_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dp4_p3__line" id="hidden_field_data_dp4_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dp4_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dp4_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dp4_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dp4_p3_"]) &&  $this->nmgp_cmp_readonly["dp4_p3_"] == "on") { 

 ?>
<input type="hidden" name="dp4_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_p3_) . "\">" . $dp4_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dp4_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dp4_p3_<?php echo $sc_seq_vert ?> css_dp4_p3__line" style="<?php echo $sStyleReadLab_dp4_p3_; ?>"><?php echo $this->form_encode_input($this->dp4_p3_); ?></span><span id="id_read_off_dp4_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dp4_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dp4_p3__obj" style="" id="id_sc_field_dp4_p3_<?php echo $sc_seq_vert ?>" type=text name="dp4_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dp4_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp4_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp4_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp4_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp4_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_0_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_0__line" id="hidden_field_data_sc_field_0_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_0_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_0__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_0_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_0_"]) &&  $this->nmgp_cmp_readonly["sc_field_0_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_0_) . "\">" . $sc_field_0_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_0_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_0_<?php echo $sc_seq_vert ?> css_sc_field_0__line" style="<?php echo $sStyleReadLab_sc_field_0_; ?>"><?php echo $this->form_encode_input($this->sc_field_0_); ?></span><span id="id_read_off_sc_field_0_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_0_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_0__obj" style="" id="id_sc_field_sc_field_0_<?php echo $sc_seq_vert ?>" type=text name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_0_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['sc_field_0_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['sc_field_0_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dp3_']) && $this->nmgp_cmp_hidden['pcent_dp3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pcent_dp3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pcent_dp3__line" id="hidden_field_data_pcent_dp3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pcent_dp3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pcent_dp3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pcent_dp3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pcent_dp3_"]) &&  $this->nmgp_cmp_readonly["pcent_dp3_"] == "on") { 

 ?>
<input type="hidden" name="pcent_dp3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp3_) . "\">" . $pcent_dp3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pcent_dp3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pcent_dp3_<?php echo $sc_seq_vert ?> css_pcent_dp3__line" style="<?php echo $sStyleReadLab_pcent_dp3_; ?>"><?php echo $this->form_encode_input($this->pcent_dp3_); ?></span><span id="id_read_off_pcent_dp3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pcent_dp3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pcent_dp3__obj" style="" id="id_sc_field_pcent_dp3_<?php echo $sc_seq_vert ?>" type=text name="pcent_dp3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pcent_dp3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dp3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_dp3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dp3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dp3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['aee_p3_']) && $this->nmgp_cmp_hidden['aee_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aee_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aee_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_aee_p3__line" id="hidden_field_data_aee_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_aee_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_aee_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_aee_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["aee_p3_"]) &&  $this->nmgp_cmp_readonly["aee_p3_"] == "on") { 

 ?>
<input type="hidden" name="aee_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aee_p3_) . "\">" . $aee_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_aee_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-aee_p3_<?php echo $sc_seq_vert ?> css_aee_p3__line" style="<?php echo $sStyleReadLab_aee_p3_; ?>"><?php echo $this->form_encode_input($this->aee_p3_); ?></span><span id="id_read_off_aee_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_aee_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_aee_p3__obj" style="" id="id_sc_field_aee_p3_<?php echo $sc_seq_vert ?>" type=text name="aee_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aee_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['aee_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['aee_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aee_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aee_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['porcent_aee_p3_']) && $this->nmgp_cmp_hidden['porcent_aee_p3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcent_aee_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcent_aee_p3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_porcent_aee_p3__line" id="hidden_field_data_porcent_aee_p3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_porcent_aee_p3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_porcent_aee_p3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_porcent_aee_p3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcent_aee_p3_"]) &&  $this->nmgp_cmp_readonly["porcent_aee_p3_"] == "on") { 

 ?>
<input type="hidden" name="porcent_aee_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcent_aee_p3_) . "\">" . $porcent_aee_p3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcent_aee_p3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-porcent_aee_p3_<?php echo $sc_seq_vert ?> css_porcent_aee_p3__line" style="<?php echo $sStyleReadLab_porcent_aee_p3_; ?>"><?php echo $this->form_encode_input($this->porcent_aee_p3_); ?></span><span id="id_read_off_porcent_aee_p3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcent_aee_p3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_porcent_aee_p3__obj" style="" id="id_sc_field_porcent_aee_p3_<?php echo $sc_seq_vert ?>" type=text name="porcent_aee_p3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcent_aee_p3_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcent_aee_p3_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcent_aee_p3_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcent_aee_p3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcent_aee_p3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['inasistencia_p4_']) && $this->nmgp_cmp_hidden['inasistencia_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inasistencia_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_inasistencia_p4__line" id="hidden_field_data_inasistencia_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_inasistencia_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_inasistencia_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_inasistencia_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inasistencia_p4_"]) &&  $this->nmgp_cmp_readonly["inasistencia_p4_"] == "on") { 

 ?>
<input type="hidden" name="inasistencia_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p4_) . "\">" . $inasistencia_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_inasistencia_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-inasistencia_p4_<?php echo $sc_seq_vert ?> css_inasistencia_p4__line" style="<?php echo $sStyleReadLab_inasistencia_p4_; ?>"><?php echo $this->form_encode_input($this->inasistencia_p4_); ?></span><span id="id_read_off_inasistencia_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inasistencia_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_inasistencia_p4__obj" style="" id="id_sc_field_inasistencia_p4_<?php echo $sc_seq_vert ?>" type=text name="inasistencia_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p4_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['inasistencia_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['inasistencia_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inasistencia_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inasistencia_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['eval_4_per_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['eval_4_per_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc1_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc1_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc2_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc2_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc3_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc3_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc4_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc4_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dc5_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dc5_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dc4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_dc4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dc4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dc4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds1_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds1_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds2_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds2_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds3_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds3_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds4_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds4_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ds5_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ds5_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_ds4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_ds4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_ds4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_ds4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp1_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp1_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp2_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp2_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp3_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp3_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp4_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp4_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dp5_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dp5_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dp5_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dp5_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['aee_p4_']) && $this->nmgp_cmp_hidden['aee_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aee_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aee_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_aee_p4__line" id="hidden_field_data_aee_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_aee_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_aee_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_aee_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["aee_p4_"]) &&  $this->nmgp_cmp_readonly["aee_p4_"] == "on") { 

 ?>
<input type="hidden" name="aee_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aee_p4_) . "\">" . $aee_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_aee_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-aee_p4_<?php echo $sc_seq_vert ?> css_aee_p4__line" style="<?php echo $sStyleReadLab_aee_p4_; ?>"><?php echo $this->form_encode_input($this->aee_p4_); ?></span><span id="id_read_off_aee_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_aee_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_aee_p4__obj" style="" id="id_sc_field_aee_p4_<?php echo $sc_seq_vert ?>" type=text name="aee_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aee_p4_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['aee_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['aee_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aee_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aee_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['porcent_aee_p4_']) && $this->nmgp_cmp_hidden['porcent_aee_p4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcent_aee_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcent_aee_p4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_porcent_aee_p4__line" id="hidden_field_data_porcent_aee_p4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_porcent_aee_p4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_porcent_aee_p4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_porcent_aee_p4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcent_aee_p4_"]) &&  $this->nmgp_cmp_readonly["porcent_aee_p4_"] == "on") { 

 ?>
<input type="hidden" name="porcent_aee_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcent_aee_p4_) . "\">" . $porcent_aee_p4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcent_aee_p4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-porcent_aee_p4_<?php echo $sc_seq_vert ?> css_porcent_aee_p4__line" style="<?php echo $sStyleReadLab_porcent_aee_p4_; ?>"><?php echo $this->form_encode_input($this->porcent_aee_p4_); ?></span><span id="id_read_off_porcent_aee_p4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcent_aee_p4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_porcent_aee_p4__obj" style="" id="id_sc_field_porcent_aee_p4_<?php echo $sc_seq_vert ?>" type=text name="porcent_aee_p4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porcent_aee_p4_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcent_aee_p4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcent_aee_p4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcent_aee_p4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcent_aee_p4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dp4_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pcent_dp4_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dp4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dp4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['eval_final_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['eval_final_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_eval_final_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_eval_final_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=4 alt="{datatype: 'integer', maxLength: 4, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['entorno_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['entorno_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_entorno_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_entorno_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
       if (isset($sCheckRead_primer_apellido_))
       {
           $this->nmgp_cmp_readonly['primer_apellido_'] = $sCheckRead_primer_apellido_;
       }
       if ('display: none;' == $sStyleHidden_primer_apellido_)
       {
           $this->nmgp_cmp_hidden['primer_apellido_'] = 'off';
       }
       if (isset($sCheckRead_segundo_apellido_))
       {
           $this->nmgp_cmp_readonly['segundo_apellido_'] = $sCheckRead_segundo_apellido_;
       }
       if ('display: none;' == $sStyleHidden_segundo_apellido_)
       {
           $this->nmgp_cmp_hidden['segundo_apellido_'] = 'off';
       }
       if (isset($sCheckRead_primer_nombre_))
       {
           $this->nmgp_cmp_readonly['primer_nombre_'] = $sCheckRead_primer_nombre_;
       }
       if ('display: none;' == $sStyleHidden_primer_nombre_)
       {
           $this->nmgp_cmp_hidden['primer_nombre_'] = 'off';
       }
       if (isset($sCheckRead_segundo_nombre_))
       {
           $this->nmgp_cmp_readonly['segundo_nombre_'] = $sCheckRead_segundo_nombre_;
       }
       if ('display: none;' == $sStyleHidden_segundo_nombre_)
       {
           $this->nmgp_cmp_hidden['segundo_nombre_'] = 'off';
       }
       if (isset($sCheckRead_id_grupo_))
       {
           $this->nmgp_cmp_readonly['id_grupo_'] = $sCheckRead_id_grupo_;
       }
       if ('display: none;' == $sStyleHidden_id_grupo_)
       {
           $this->nmgp_cmp_hidden['id_grupo_'] = 'off';
       }
       if (isset($sCheckRead_id_area_))
       {
           $this->nmgp_cmp_readonly['id_area_'] = $sCheckRead_id_area_;
       }
       if ('display: none;' == $sStyleHidden_id_area_)
       {
           $this->nmgp_cmp_hidden['id_area_'] = 'off';
       }
       if (isset($sCheckRead_id_asignatura_))
       {
           $this->nmgp_cmp_readonly['id_asignatura_'] = $sCheckRead_id_asignatura_;
       }
       if ('display: none;' == $sStyleHidden_id_asignatura_)
       {
           $this->nmgp_cmp_hidden['id_asignatura_'] = 'off';
       }
       if (isset($sCheckRead_id_grado_))
       {
           $this->nmgp_cmp_readonly['id_grado_'] = $sCheckRead_id_grado_;
       }
       if ('display: none;' == $sStyleHidden_id_grado_)
       {
           $this->nmgp_cmp_hidden['id_grado_'] = 'off';
       }
       if (isset($sCheckRead_id_nivel_))
       {
           $this->nmgp_cmp_readonly['id_nivel_'] = $sCheckRead_id_nivel_;
       }
       if ('display: none;' == $sStyleHidden_id_nivel_)
       {
           $this->nmgp_cmp_hidden['id_nivel_'] = 'off';
       }
       if (isset($sCheckRead_ihs_))
       {
           $this->nmgp_cmp_readonly['ihs_'] = $sCheckRead_ihs_;
       }
       if ('display: none;' == $sStyleHidden_ihs_)
       {
           $this->nmgp_cmp_hidden['ihs_'] = 'off';
       }
       if (isset($sCheckRead_pfa_))
       {
           $this->nmgp_cmp_readonly['pfa_'] = $sCheckRead_pfa_;
       }
       if ('display: none;' == $sStyleHidden_pfa_)
       {
           $this->nmgp_cmp_hidden['pfa_'] = 'off';
       }
       if (isset($sCheckRead_tipo_asig_))
       {
           $this->nmgp_cmp_readonly['tipo_asig_'] = $sCheckRead_tipo_asig_;
       }
       if ('display: none;' == $sStyleHidden_tipo_asig_)
       {
           $this->nmgp_cmp_hidden['tipo_asig_'] = 'off';
       }
       if (isset($sCheckRead_novedad_))
       {
           $this->nmgp_cmp_readonly['novedad_'] = $sCheckRead_novedad_;
       }
       if ('display: none;' == $sStyleHidden_novedad_)
       {
           $this->nmgp_cmp_hidden['novedad_'] = 'off';
       }
       if (isset($sCheckRead_estatus_))
       {
           $this->nmgp_cmp_readonly['estatus_'] = $sCheckRead_estatus_;
       }
       if ('display: none;' == $sStyleHidden_estatus_)
       {
           $this->nmgp_cmp_hidden['estatus_'] = 'off';
       }
       if (isset($sCheckRead_inasistencia_p1_))
       {
           $this->nmgp_cmp_readonly['inasistencia_p1_'] = $sCheckRead_inasistencia_p1_;
       }
       if ('display: none;' == $sStyleHidden_inasistencia_p1_)
       {
           $this->nmgp_cmp_hidden['inasistencia_p1_'] = 'off';
       }
       if (isset($sCheckRead_eval_1_per_))
       {
           $this->nmgp_cmp_readonly['eval_1_per_'] = $sCheckRead_eval_1_per_;
       }
       if ('display: none;' == $sStyleHidden_eval_1_per_)
       {
           $this->nmgp_cmp_hidden['eval_1_per_'] = 'off';
       }
       if (isset($sCheckRead_dc1_))
       {
           $this->nmgp_cmp_readonly['dc1_'] = $sCheckRead_dc1_;
       }
       if ('display: none;' == $sStyleHidden_dc1_)
       {
           $this->nmgp_cmp_hidden['dc1_'] = 'off';
       }
       if (isset($sCheckRead_dc2_))
       {
           $this->nmgp_cmp_readonly['dc2_'] = $sCheckRead_dc2_;
       }
       if ('display: none;' == $sStyleHidden_dc2_)
       {
           $this->nmgp_cmp_hidden['dc2_'] = 'off';
       }
       if (isset($sCheckRead_dc3_))
       {
           $this->nmgp_cmp_readonly['dc3_'] = $sCheckRead_dc3_;
       }
       if ('display: none;' == $sStyleHidden_dc3_)
       {
           $this->nmgp_cmp_hidden['dc3_'] = 'off';
       }
       if (isset($sCheckRead_dc4_))
       {
           $this->nmgp_cmp_readonly['dc4_'] = $sCheckRead_dc4_;
       }
       if ('display: none;' == $sStyleHidden_dc4_)
       {
           $this->nmgp_cmp_hidden['dc4_'] = 'off';
       }
       if (isset($sCheckRead_dc5_))
       {
           $this->nmgp_cmp_readonly['dc5_'] = $sCheckRead_dc5_;
       }
       if ('display: none;' == $sStyleHidden_dc5_)
       {
           $this->nmgp_cmp_hidden['dc5_'] = 'off';
       }
       if (isset($sCheckRead_dc6_))
       {
           $this->nmgp_cmp_readonly['dc6_'] = $sCheckRead_dc6_;
       }
       if ('display: none;' == $sStyleHidden_dc6_)
       {
           $this->nmgp_cmp_hidden['dc6_'] = 'off';
       }
       if (isset($sCheckRead_dc7_))
       {
           $this->nmgp_cmp_readonly['dc7_'] = $sCheckRead_dc7_;
       }
       if ('display: none;' == $sStyleHidden_dc7_)
       {
           $this->nmgp_cmp_hidden['dc7_'] = 'off';
       }
       if (isset($sCheckRead_dc8_))
       {
           $this->nmgp_cmp_readonly['dc8_'] = $sCheckRead_dc8_;
       }
       if ('display: none;' == $sStyleHidden_dc8_)
       {
           $this->nmgp_cmp_hidden['dc8_'] = 'off';
       }
       if (isset($sCheckRead_dc9_))
       {
           $this->nmgp_cmp_readonly['dc9_'] = $sCheckRead_dc9_;
       }
       if ('display: none;' == $sStyleHidden_dc9_)
       {
           $this->nmgp_cmp_hidden['dc9_'] = 'off';
       }
       if (isset($sCheckRead_pcent_dc_))
       {
           $this->nmgp_cmp_readonly['pcent_dc_'] = $sCheckRead_pcent_dc_;
       }
       if ('display: none;' == $sStyleHidden_pcent_dc_)
       {
           $this->nmgp_cmp_hidden['pcent_dc_'] = 'off';
       }
       if (isset($sCheckRead_ds1_))
       {
           $this->nmgp_cmp_readonly['ds1_'] = $sCheckRead_ds1_;
       }
       if ('display: none;' == $sStyleHidden_ds1_)
       {
           $this->nmgp_cmp_hidden['ds1_'] = 'off';
       }
       if (isset($sCheckRead_ds2_))
       {
           $this->nmgp_cmp_readonly['ds2_'] = $sCheckRead_ds2_;
       }
       if ('display: none;' == $sStyleHidden_ds2_)
       {
           $this->nmgp_cmp_hidden['ds2_'] = 'off';
       }
       if (isset($sCheckRead_ds3_))
       {
           $this->nmgp_cmp_readonly['ds3_'] = $sCheckRead_ds3_;
       }
       if ('display: none;' == $sStyleHidden_ds3_)
       {
           $this->nmgp_cmp_hidden['ds3_'] = 'off';
       }
       if (isset($sCheckRead_ds4_))
       {
           $this->nmgp_cmp_readonly['ds4_'] = $sCheckRead_ds4_;
       }
       if ('display: none;' == $sStyleHidden_ds4_)
       {
           $this->nmgp_cmp_hidden['ds4_'] = 'off';
       }
       if (isset($sCheckRead_ds5_))
       {
           $this->nmgp_cmp_readonly['ds5_'] = $sCheckRead_ds5_;
       }
       if ('display: none;' == $sStyleHidden_ds5_)
       {
           $this->nmgp_cmp_hidden['ds5_'] = 'off';
       }
       if (isset($sCheckRead_pcent_ds_))
       {
           $this->nmgp_cmp_readonly['pcent_ds_'] = $sCheckRead_pcent_ds_;
       }
       if ('display: none;' == $sStyleHidden_pcent_ds_)
       {
           $this->nmgp_cmp_hidden['pcent_ds_'] = 'off';
       }
       if (isset($sCheckRead_dp1_))
       {
           $this->nmgp_cmp_readonly['dp1_'] = $sCheckRead_dp1_;
       }
       if ('display: none;' == $sStyleHidden_dp1_)
       {
           $this->nmgp_cmp_hidden['dp1_'] = 'off';
       }
       if (isset($sCheckRead_dp2_))
       {
           $this->nmgp_cmp_readonly['dp2_'] = $sCheckRead_dp2_;
       }
       if ('display: none;' == $sStyleHidden_dp2_)
       {
           $this->nmgp_cmp_hidden['dp2_'] = 'off';
       }
       if (isset($sCheckRead_dp3_))
       {
           $this->nmgp_cmp_readonly['dp3_'] = $sCheckRead_dp3_;
       }
       if ('display: none;' == $sStyleHidden_dp3_)
       {
           $this->nmgp_cmp_hidden['dp3_'] = 'off';
       }
       if (isset($sCheckRead_dp4_))
       {
           $this->nmgp_cmp_readonly['dp4_'] = $sCheckRead_dp4_;
       }
       if ('display: none;' == $sStyleHidden_dp4_)
       {
           $this->nmgp_cmp_hidden['dp4_'] = 'off';
       }
       if (isset($sCheckRead_dp5_))
       {
           $this->nmgp_cmp_readonly['dp5_'] = $sCheckRead_dp5_;
       }
       if ('display: none;' == $sStyleHidden_dp5_)
       {
           $this->nmgp_cmp_hidden['dp5_'] = 'off';
       }
       if (isset($sCheckRead_pcent_dp_))
       {
           $this->nmgp_cmp_readonly['pcent_dp_'] = $sCheckRead_pcent_dp_;
       }
       if ('display: none;' == $sStyleHidden_pcent_dp_)
       {
           $this->nmgp_cmp_hidden['pcent_dp_'] = 'off';
       }
       if (isset($sCheckRead_aeep1_))
       {
           $this->nmgp_cmp_readonly['aeep1_'] = $sCheckRead_aeep1_;
       }
       if ('display: none;' == $sStyleHidden_aeep1_)
       {
           $this->nmgp_cmp_hidden['aeep1_'] = 'off';
       }
       if (isset($sCheckRead_porcent_aeep1_))
       {
           $this->nmgp_cmp_readonly['porcent_aeep1_'] = $sCheckRead_porcent_aeep1_;
       }
       if ('display: none;' == $sStyleHidden_porcent_aeep1_)
       {
           $this->nmgp_cmp_hidden['porcent_aeep1_'] = 'off';
       }
       if (isset($sCheckRead_inasistencia_p2_))
       {
           $this->nmgp_cmp_readonly['inasistencia_p2_'] = $sCheckRead_inasistencia_p2_;
       }
       if ('display: none;' == $sStyleHidden_inasistencia_p2_)
       {
           $this->nmgp_cmp_hidden['inasistencia_p2_'] = 'off';
       }
       if (isset($sCheckRead_eval_2_per_))
       {
           $this->nmgp_cmp_readonly['eval_2_per_'] = $sCheckRead_eval_2_per_;
       }
       if ('display: none;' == $sStyleHidden_eval_2_per_)
       {
           $this->nmgp_cmp_hidden['eval_2_per_'] = 'off';
       }
       if (isset($sCheckRead_dc1_2p_))
       {
           $this->nmgp_cmp_readonly['dc1_2p_'] = $sCheckRead_dc1_2p_;
       }
       if ('display: none;' == $sStyleHidden_dc1_2p_)
       {
           $this->nmgp_cmp_hidden['dc1_2p_'] = 'off';
       }
       if (isset($sCheckRead_dc2_2p_))
       {
           $this->nmgp_cmp_readonly['dc2_2p_'] = $sCheckRead_dc2_2p_;
       }
       if ('display: none;' == $sStyleHidden_dc2_2p_)
       {
           $this->nmgp_cmp_hidden['dc2_2p_'] = 'off';
       }
       if (isset($sCheckRead_dc3_2p_))
       {
           $this->nmgp_cmp_readonly['dc3_2p_'] = $sCheckRead_dc3_2p_;
       }
       if ('display: none;' == $sStyleHidden_dc3_2p_)
       {
           $this->nmgp_cmp_hidden['dc3_2p_'] = 'off';
       }
       if (isset($sCheckRead_dc4_2p_))
       {
           $this->nmgp_cmp_readonly['dc4_2p_'] = $sCheckRead_dc4_2p_;
       }
       if ('display: none;' == $sStyleHidden_dc4_2p_)
       {
           $this->nmgp_cmp_hidden['dc4_2p_'] = 'off';
       }
       if (isset($sCheckRead_dc5_2p_))
       {
           $this->nmgp_cmp_readonly['dc5_2p_'] = $sCheckRead_dc5_2p_;
       }
       if ('display: none;' == $sStyleHidden_dc5_2p_)
       {
           $this->nmgp_cmp_hidden['dc5_2p_'] = 'off';
       }
       if (isset($sCheckRead_pcent_dc2_))
       {
           $this->nmgp_cmp_readonly['pcent_dc2_'] = $sCheckRead_pcent_dc2_;
       }
       if ('display: none;' == $sStyleHidden_pcent_dc2_)
       {
           $this->nmgp_cmp_hidden['pcent_dc2_'] = 'off';
       }
       if (isset($sCheckRead_ds1_2p_))
       {
           $this->nmgp_cmp_readonly['ds1_2p_'] = $sCheckRead_ds1_2p_;
       }
       if ('display: none;' == $sStyleHidden_ds1_2p_)
       {
           $this->nmgp_cmp_hidden['ds1_2p_'] = 'off';
       }
       if (isset($sCheckRead_ds2_2p_))
       {
           $this->nmgp_cmp_readonly['ds2_2p_'] = $sCheckRead_ds2_2p_;
       }
       if ('display: none;' == $sStyleHidden_ds2_2p_)
       {
           $this->nmgp_cmp_hidden['ds2_2p_'] = 'off';
       }
       if (isset($sCheckRead_ds3_2p_))
       {
           $this->nmgp_cmp_readonly['ds3_2p_'] = $sCheckRead_ds3_2p_;
       }
       if ('display: none;' == $sStyleHidden_ds3_2p_)
       {
           $this->nmgp_cmp_hidden['ds3_2p_'] = 'off';
       }
       if (isset($sCheckRead_ds4_2p_))
       {
           $this->nmgp_cmp_readonly['ds4_2p_'] = $sCheckRead_ds4_2p_;
       }
       if ('display: none;' == $sStyleHidden_ds4_2p_)
       {
           $this->nmgp_cmp_hidden['ds4_2p_'] = 'off';
       }
       if (isset($sCheckRead_ds5_2p_))
       {
           $this->nmgp_cmp_readonly['ds5_2p_'] = $sCheckRead_ds5_2p_;
       }
       if ('display: none;' == $sStyleHidden_ds5_2p_)
       {
           $this->nmgp_cmp_hidden['ds5_2p_'] = 'off';
       }
       if (isset($sCheckRead_pcent_ds2_))
       {
           $this->nmgp_cmp_readonly['pcent_ds2_'] = $sCheckRead_pcent_ds2_;
       }
       if ('display: none;' == $sStyleHidden_pcent_ds2_)
       {
           $this->nmgp_cmp_hidden['pcent_ds2_'] = 'off';
       }
       if (isset($sCheckRead_dp1_2p_))
       {
           $this->nmgp_cmp_readonly['dp1_2p_'] = $sCheckRead_dp1_2p_;
       }
       if ('display: none;' == $sStyleHidden_dp1_2p_)
       {
           $this->nmgp_cmp_hidden['dp1_2p_'] = 'off';
       }
       if (isset($sCheckRead_dp2_2p_))
       {
           $this->nmgp_cmp_readonly['dp2_2p_'] = $sCheckRead_dp2_2p_;
       }
       if ('display: none;' == $sStyleHidden_dp2_2p_)
       {
           $this->nmgp_cmp_hidden['dp2_2p_'] = 'off';
       }
       if (isset($sCheckRead_dp3_2p_))
       {
           $this->nmgp_cmp_readonly['dp3_2p_'] = $sCheckRead_dp3_2p_;
       }
       if ('display: none;' == $sStyleHidden_dp3_2p_)
       {
           $this->nmgp_cmp_hidden['dp3_2p_'] = 'off';
       }
       if (isset($sCheckRead_dp4_2p_))
       {
           $this->nmgp_cmp_readonly['dp4_2p_'] = $sCheckRead_dp4_2p_;
       }
       if ('display: none;' == $sStyleHidden_dp4_2p_)
       {
           $this->nmgp_cmp_hidden['dp4_2p_'] = 'off';
       }
       if (isset($sCheckRead_dp5_2p_))
       {
           $this->nmgp_cmp_readonly['dp5_2p_'] = $sCheckRead_dp5_2p_;
       }
       if ('display: none;' == $sStyleHidden_dp5_2p_)
       {
           $this->nmgp_cmp_hidden['dp5_2p_'] = 'off';
       }
       if (isset($sCheckRead_pcent_dp2_))
       {
           $this->nmgp_cmp_readonly['pcent_dp2_'] = $sCheckRead_pcent_dp2_;
       }
       if ('display: none;' == $sStyleHidden_pcent_dp2_)
       {
           $this->nmgp_cmp_hidden['pcent_dp2_'] = 'off';
       }
       if (isset($sCheckRead_aee_p2_))
       {
           $this->nmgp_cmp_readonly['aee_p2_'] = $sCheckRead_aee_p2_;
       }
       if ('display: none;' == $sStyleHidden_aee_p2_)
       {
           $this->nmgp_cmp_hidden['aee_p2_'] = 'off';
       }
       if (isset($sCheckRead_porcet_aee_p2_))
       {
           $this->nmgp_cmp_readonly['porcet_aee_p2_'] = $sCheckRead_porcet_aee_p2_;
       }
       if ('display: none;' == $sStyleHidden_porcet_aee_p2_)
       {
           $this->nmgp_cmp_hidden['porcet_aee_p2_'] = 'off';
       }
       if (isset($sCheckRead_inasistencia_p3_))
       {
           $this->nmgp_cmp_readonly['inasistencia_p3_'] = $sCheckRead_inasistencia_p3_;
       }
       if ('display: none;' == $sStyleHidden_inasistencia_p3_)
       {
           $this->nmgp_cmp_hidden['inasistencia_p3_'] = 'off';
       }
       if (isset($sCheckRead_eval_3_per_))
       {
           $this->nmgp_cmp_readonly['eval_3_per_'] = $sCheckRead_eval_3_per_;
       }
       if ('display: none;' == $sStyleHidden_eval_3_per_)
       {
           $this->nmgp_cmp_hidden['eval_3_per_'] = 'off';
       }
       if (isset($sCheckRead_dc1_3p_))
       {
           $this->nmgp_cmp_readonly['dc1_3p_'] = $sCheckRead_dc1_3p_;
       }
       if ('display: none;' == $sStyleHidden_dc1_3p_)
       {
           $this->nmgp_cmp_hidden['dc1_3p_'] = 'off';
       }
       if (isset($sCheckRead_dc2_3p_))
       {
           $this->nmgp_cmp_readonly['dc2_3p_'] = $sCheckRead_dc2_3p_;
       }
       if ('display: none;' == $sStyleHidden_dc2_3p_)
       {
           $this->nmgp_cmp_hidden['dc2_3p_'] = 'off';
       }
       if (isset($sCheckRead_dc3_3p_))
       {
           $this->nmgp_cmp_readonly['dc3_3p_'] = $sCheckRead_dc3_3p_;
       }
       if ('display: none;' == $sStyleHidden_dc3_3p_)
       {
           $this->nmgp_cmp_hidden['dc3_3p_'] = 'off';
       }
       if (isset($sCheckRead_dc4_3p_))
       {
           $this->nmgp_cmp_readonly['dc4_3p_'] = $sCheckRead_dc4_3p_;
       }
       if ('display: none;' == $sStyleHidden_dc4_3p_)
       {
           $this->nmgp_cmp_hidden['dc4_3p_'] = 'off';
       }
       if (isset($sCheckRead_dc5_3p_))
       {
           $this->nmgp_cmp_readonly['dc5_3p_'] = $sCheckRead_dc5_3p_;
       }
       if ('display: none;' == $sStyleHidden_dc5_3p_)
       {
           $this->nmgp_cmp_hidden['dc5_3p_'] = 'off';
       }
       if (isset($sCheckRead_pcent_dc3_))
       {
           $this->nmgp_cmp_readonly['pcent_dc3_'] = $sCheckRead_pcent_dc3_;
       }
       if ('display: none;' == $sStyleHidden_pcent_dc3_)
       {
           $this->nmgp_cmp_hidden['pcent_dc3_'] = 'off';
       }
       if (isset($sCheckRead_ds1_p3_))
       {
           $this->nmgp_cmp_readonly['ds1_p3_'] = $sCheckRead_ds1_p3_;
       }
       if ('display: none;' == $sStyleHidden_ds1_p3_)
       {
           $this->nmgp_cmp_hidden['ds1_p3_'] = 'off';
       }
       if (isset($sCheckRead_ds2_p3_))
       {
           $this->nmgp_cmp_readonly['ds2_p3_'] = $sCheckRead_ds2_p3_;
       }
       if ('display: none;' == $sStyleHidden_ds2_p3_)
       {
           $this->nmgp_cmp_hidden['ds2_p3_'] = 'off';
       }
       if (isset($sCheckRead_ds3_p3_))
       {
           $this->nmgp_cmp_readonly['ds3_p3_'] = $sCheckRead_ds3_p3_;
       }
       if ('display: none;' == $sStyleHidden_ds3_p3_)
       {
           $this->nmgp_cmp_hidden['ds3_p3_'] = 'off';
       }
       if (isset($sCheckRead_ds4_p3_))
       {
           $this->nmgp_cmp_readonly['ds4_p3_'] = $sCheckRead_ds4_p3_;
       }
       if ('display: none;' == $sStyleHidden_ds4_p3_)
       {
           $this->nmgp_cmp_hidden['ds4_p3_'] = 'off';
       }
       if (isset($sCheckRead_ds5_p3_))
       {
           $this->nmgp_cmp_readonly['ds5_p3_'] = $sCheckRead_ds5_p3_;
       }
       if ('display: none;' == $sStyleHidden_ds5_p3_)
       {
           $this->nmgp_cmp_hidden['ds5_p3_'] = 'off';
       }
       if (isset($sCheckRead_pcent_ds3_))
       {
           $this->nmgp_cmp_readonly['pcent_ds3_'] = $sCheckRead_pcent_ds3_;
       }
       if ('display: none;' == $sStyleHidden_pcent_ds3_)
       {
           $this->nmgp_cmp_hidden['pcent_ds3_'] = 'off';
       }
       if (isset($sCheckRead_dp1_p3_))
       {
           $this->nmgp_cmp_readonly['dp1_p3_'] = $sCheckRead_dp1_p3_;
       }
       if ('display: none;' == $sStyleHidden_dp1_p3_)
       {
           $this->nmgp_cmp_hidden['dp1_p3_'] = 'off';
       }
       if (isset($sCheckRead_dp2_p3_))
       {
           $this->nmgp_cmp_readonly['dp2_p3_'] = $sCheckRead_dp2_p3_;
       }
       if ('display: none;' == $sStyleHidden_dp2_p3_)
       {
           $this->nmgp_cmp_hidden['dp2_p3_'] = 'off';
       }
       if (isset($sCheckRead_dp3_p3_))
       {
           $this->nmgp_cmp_readonly['dp3_p3_'] = $sCheckRead_dp3_p3_;
       }
       if ('display: none;' == $sStyleHidden_dp3_p3_)
       {
           $this->nmgp_cmp_hidden['dp3_p3_'] = 'off';
       }
       if (isset($sCheckRead_dp4_p3_))
       {
           $this->nmgp_cmp_readonly['dp4_p3_'] = $sCheckRead_dp4_p3_;
       }
       if ('display: none;' == $sStyleHidden_dp4_p3_)
       {
           $this->nmgp_cmp_hidden['dp4_p3_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_0_))
       {
           $this->nmgp_cmp_readonly['sc_field_0_'] = $sCheckRead_sc_field_0_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_0_)
       {
           $this->nmgp_cmp_hidden['sc_field_0_'] = 'off';
       }
       if (isset($sCheckRead_pcent_dp3_))
       {
           $this->nmgp_cmp_readonly['pcent_dp3_'] = $sCheckRead_pcent_dp3_;
       }
       if ('display: none;' == $sStyleHidden_pcent_dp3_)
       {
           $this->nmgp_cmp_hidden['pcent_dp3_'] = 'off';
       }
       if (isset($sCheckRead_aee_p3_))
       {
           $this->nmgp_cmp_readonly['aee_p3_'] = $sCheckRead_aee_p3_;
       }
       if ('display: none;' == $sStyleHidden_aee_p3_)
       {
           $this->nmgp_cmp_hidden['aee_p3_'] = 'off';
       }
       if (isset($sCheckRead_porcent_aee_p3_))
       {
           $this->nmgp_cmp_readonly['porcent_aee_p3_'] = $sCheckRead_porcent_aee_p3_;
       }
       if ('display: none;' == $sStyleHidden_porcent_aee_p3_)
       {
           $this->nmgp_cmp_hidden['porcent_aee_p3_'] = 'off';
       }
       if (isset($sCheckRead_inasistencia_p4_))
       {
           $this->nmgp_cmp_readonly['inasistencia_p4_'] = $sCheckRead_inasistencia_p4_;
       }
       if ('display: none;' == $sStyleHidden_inasistencia_p4_)
       {
           $this->nmgp_cmp_hidden['inasistencia_p4_'] = 'off';
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
       if (isset($sCheckRead_aee_p4_))
       {
           $this->nmgp_cmp_readonly['aee_p4_'] = $sCheckRead_aee_p4_;
       }
       if ('display: none;' == $sStyleHidden_aee_p4_)
       {
           $this->nmgp_cmp_hidden['aee_p4_'] = 'off';
       }
       if (isset($sCheckRead_porcent_aee_p4_))
       {
           $this->nmgp_cmp_readonly['porcent_aee_p4_'] = $sCheckRead_porcent_aee_p4_;
       }
       if ('display: none;' == $sStyleHidden_porcent_aee_p4_)
       {
           $this->nmgp_cmp_hidden['porcent_aee_p4_'] = 'off';
       }
       if (isset($sCheckRead_pcent_dp4_))
       {
           $this->nmgp_cmp_readonly['pcent_dp4_'] = $sCheckRead_pcent_dp4_;
       }
       if ('display: none;' == $sStyleHidden_pcent_dp4_)
       {
           $this->nmgp_cmp_hidden['pcent_dp4_'] = 'off';
       }
       if (isset($sCheckRead_eval_final_))
       {
           $this->nmgp_cmp_readonly['eval_final_'] = $sCheckRead_eval_final_;
       }
       if ('display: none;' == $sStyleHidden_eval_final_)
       {
           $this->nmgp_cmp_hidden['eval_final_'] = 'off';
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
       $this->form_vert_form_t_evaluacion_pruebas = $guarda_form_vert_form_t_evaluacion_pruebas;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R")
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
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
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
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
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
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['masterValue']);
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
 parent.scAjaxDetailStatus("form_t_evaluacion_pruebas");
 parent.scAjaxDetailHeight("form_t_evaluacion_pruebas", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_t_evaluacion_pruebas", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_t_evaluacion_pruebas", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['sc_modal'])
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
