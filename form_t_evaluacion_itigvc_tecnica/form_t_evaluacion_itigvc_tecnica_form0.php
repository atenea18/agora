<?php
class form_t_evaluacion_itigvc_tecnica_form extends form_t_evaluacion_itigvc_tecnica_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("<FONT SIZE=4>ASIGNATURA: " . $_SESSION['par_nombre_asignatura'] . "</font>"); } else { echo strip_tags("<FONT SIZE=4>ASIGNATURA: " . $_SESSION['par_nombre_asignatura'] . "</font>"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_t_evaluacion_itigvc_tecnica/form_t_evaluacion_itigvc_tecnica_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_t_evaluacion_itigvc_tecnica_sajax_js.php");
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

include_once('form_t_evaluacion_itigvc_tecnica_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['recarga'];
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
 include_once("form_t_evaluacion_itigvc_tecnica_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_t_evaluacion_itigvc_tecnica'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_t_evaluacion_itigvc_tecnica'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['mostra_cab'] != "N"))
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
          <?php echo "<FONT SIZE=4>Periodo 1</font>" ?>
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
          <?php if ($this->nmgp_opcao == "novo") { echo "<FONT SIZE=4>ASIGNATURA: " . $_SESSION['par_nombre_asignatura'] . "</font>"; } else { echo "<FONT SIZE=4>ASIGNATURA: " . $_SESSION['par_nombre_asignatura'] . "</font>"; } ?>
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="center" class="scFormHeaderFont">
          <?php echo "<FONT SIZE=4>GRUPO: $this->nom_grupo</font>" ?>
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="right" class="scFormHeaderFont">
          
<?php
$this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS");
echo $this->nm_data->FormataSaida("l, d  F  Y");
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['fast_search'][2] : "";
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_0'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_0", "sc_btn_sc_btn_0()", "sc_btn_sc_btn_0()", "sc_sc_btn_0_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_1'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_1", "sc_btn_sc_btn_1()", "sc_btn_sc_btn_1()", "sc_sc_btn_1_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['empty_filter'] = true;
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
     if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Span = 2; }
     $Col_span = ($Span == 0) ? "" : " colspan=$Span";
 ?>
    <TR>
<?php
     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['pdf_view'])
     { 
 ?>
     <TD class="scFormLabelOddMult" <?php echo $Col_span ?>>&nbsp;</TD>
<?php
     } 
 ?>
     <TD class="scFormLabelOddMult" colspan=11 style="text-align:left;vertical-align:middle;font-size:15px;color:#000000;">INDICADORES DE DESEMPEÑO:  <?php echo $_SESSION['par_cod_desemp'] ?>,  <?php echo $_SESSION['par_cod_desemp2'] ?>,  <?php echo $_SESSION['par_cod_desemp3'] ?>,  <?php echo $_SESSION['par_cod_desemp4'] ?>,  <?php echo $_SESSION['par_cod_desemp5'] ?>    </TD>
    </TR>
    <TR>
<?php
     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['pdf_view'])
     { 
 ?>
     <TD class="scFormLabelOddMult" <?php echo $Col_span ?>>&nbsp;</TD>
<?php
     } 
 ?>
     <TD class="scFormLabelOddMult" style="text-align:center;vertical-align:middle;color:#990000;"><--Guardar botones izquierda</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult" style="text-align:center;vertical-align:middle;">Epr</TD>
     <TD class="scFormLabelOddMult" style="text-align:center;vertical-align:middle;">TTPA</TD>
     <TD class="scFormLabelOddMult" style="text-align:center;vertical-align:middle;">Val</TD>
     <TD class="scFormLabelOddMult" style="text-align:center;vertical-align:middle;">AEE</TD>
     <TD class="scFormLabelOddMult" style="text-align:center;vertical-align:middle;">VAL</TD>
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


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
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

   <?php if (isset($this->nmgp_cmp_hidden['asienta_inasistencias_']) && $this->nmgp_cmp_hidden['asienta_inasistencias_'] == 'off') { $sStyleHidden_asienta_inasistencias_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['asienta_inasistencias_']) || $this->nmgp_cmp_hidden['asienta_inasistencias_'] == 'on') {
      if (!isset($this->nm_new_label['asienta_inasistencias_'])) {
          $this->nm_new_label['asienta_inasistencias_'] = "AFA"; } ?>

    <TD class="scFormLabelOddMult css_asienta_inasistencias__label" id="hidden_field_label_asienta_inasistencias_" style="<?php echo $sStyleHidden_asienta_inasistencias_; ?>" > <?php echo $this->nm_new_label['asienta_inasistencias_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['inasistencia_p1_']) && $this->nmgp_cmp_hidden['inasistencia_p1_'] == 'off') { $sStyleHidden_inasistencia_p1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['inasistencia_p1_']) || $this->nmgp_cmp_hidden['inasistencia_p1_'] == 'on') {
      if (!isset($this->nm_new_label['inasistencia_p1_'])) {
          $this->nm_new_label['inasistencia_p1_'] = "FAA"; } ?>

    <TD class="scFormLabelOddMult css_inasistencia_p1__label" id="hidden_field_label_inasistencia_p1_" style="<?php echo $sStyleHidden_inasistencia_p1_; ?>" > <?php echo $this->nm_new_label['inasistencia_p1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_1_per_']) && $this->nmgp_cmp_hidden['eval_1_per_'] == 'off') { $sStyleHidden_eval_1_per_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['eval_1_per_']) || $this->nmgp_cmp_hidden['eval_1_per_'] == 'on') {
      if (!isset($this->nm_new_label['eval_1_per_'])) {
          $this->nm_new_label['eval_1_per_'] = "1 Per"; } ?>

    <TD class="scFormLabelOddMult css_eval_1_per__label" id="hidden_field_label_eval_1_per_" style="<?php echo $sStyleHidden_eval_1_per_; ?>" > <?php echo $this->nm_new_label['eval_1_per_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc1_']) && $this->nmgp_cmp_hidden['dc1_'] == 'off') { $sStyleHidden_dc1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc1_']) || $this->nmgp_cmp_hidden['dc1_'] == 'on') {
      if (!isset($this->nm_new_label['dc1_'])) {
          $this->nm_new_label['dc1_'] = "30 %"; } ?>

    <TD class="scFormLabelOddMult css_dc1__label" id="hidden_field_label_dc1_" style="<?php echo $sStyleHidden_dc1_; ?>" > <?php echo $this->nm_new_label['dc1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dc2_']) && $this->nmgp_cmp_hidden['dc2_'] == 'off') { $sStyleHidden_dc2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dc2_']) || $this->nmgp_cmp_hidden['dc2_'] == 'on') {
      if (!isset($this->nm_new_label['dc2_'])) {
          $this->nm_new_label['dc2_'] = "60% "; } ?>

    <TD class="scFormLabelOddMult css_dc2__label" id="hidden_field_label_dc2_" style="<?php echo $sStyleHidden_dc2_; ?>" > <?php echo $this->nm_new_label['dc2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pcent_dc_']) && $this->nmgp_cmp_hidden['pcent_dc_'] == 'off') { $sStyleHidden_pcent_dc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pcent_dc_']) || $this->nmgp_cmp_hidden['pcent_dc_'] == 'on') {
      if (!isset($this->nm_new_label['pcent_dc_'])) {
          $this->nm_new_label['pcent_dc_'] = "90 %"; } ?>

    <TD class="scFormLabelOddMult css_pcent_dc__label" id="hidden_field_label_pcent_dc_" style="<?php echo $sStyleHidden_pcent_dc_; ?>" > <?php echo $this->nm_new_label['pcent_dc_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['aeep1_']) && $this->nmgp_cmp_hidden['aeep1_'] == 'off') { $sStyleHidden_aeep1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['aeep1_']) || $this->nmgp_cmp_hidden['aeep1_'] == 'on') {
      if (!isset($this->nm_new_label['aeep1_'])) {
          $this->nm_new_label['aeep1_'] = "Aee"; } ?>

    <TD class="scFormLabelOddMult css_aeep1__label" id="hidden_field_label_aeep1_" style="<?php echo $sStyleHidden_aeep1_; ?>" > <?php echo $this->nm_new_label['aeep1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['porcent_aeep1_']) && $this->nmgp_cmp_hidden['porcent_aeep1_'] == 'off') { $sStyleHidden_porcent_aeep1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['porcent_aeep1_']) || $this->nmgp_cmp_hidden['porcent_aeep1_'] == 'on') {
      if (!isset($this->nm_new_label['porcent_aeep1_'])) {
          $this->nm_new_label['porcent_aeep1_'] = "10 %"; } ?>

    <TD class="scFormLabelOddMult css_porcent_aeep1__label" id="hidden_field_label_porcent_aeep1_" style="<?php echo $sStyleHidden_porcent_aeep1_; ?>" > <?php echo $this->nm_new_label['porcent_aeep1_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_t_evaluacion_itigvc_tecnica);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_t_evaluacion_itigvc_tecnica = $this->form_vert_form_t_evaluacion_itigvc_tecnica;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_t_evaluacion_itigvc_tecnica))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_estudiante_']))
           {
               $this->nmgp_cmp_readonly['id_estudiante_'] = 'on';
           }
   foreach ($this->form_vert_form_t_evaluacion_itigvc_tecnica as $sc_seq_vert => $sc_lixo)
   {
       $this->primer_apellido_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['primer_apellido_'];
       $this->segundo_apellido_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['segundo_apellido_'];
       $this->primer_nombre_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['primer_nombre_'];
       $this->segundo_nombre_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['segundo_nombre_'];
       $this->id_grupo_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['id_grupo_'];
       $this->id_subgrupo_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['id_subgrupo_'];
       $this->id_area_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['id_area_'];
       $this->id_asignatura_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['id_asignatura_'];
       $this->id_grado_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['id_grado_'];
       $this->id_nivel_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['id_nivel_'];
       $this->ihs_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ihs_'];
       $this->pfa_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pfa_'];
       $this->tipo_asig_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['tipo_asig_'];
       $this->dc3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc3_'];
       $this->dc4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc4_'];
       $this->dc5_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc5_'];
       $this->dc6_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc6_'];
       $this->dc7_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc7_'];
       $this->dc8_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc8_'];
       $this->dc9_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc9_'];
       $this->dc10_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc10_'];
       $this->dc11_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc11_'];
       $this->dc12_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc12_'];
       $this->letras_p1_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['letras_p1_'];
       $this->ds1_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds1_'];
       $this->ds2_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds2_'];
       $this->ds3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds3_'];
       $this->ds4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds4_'];
       $this->ds5_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds5_'];
       $this->pcent_ds_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_ds_'];
       $this->dp1_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp1_'];
       $this->dp2_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp2_'];
       $this->dp3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp3_'];
       $this->dp4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp4_'];
       $this->dp5_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp5_'];
       $this->pcent_dp_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_dp_'];
       $this->inasistencia_p2_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['inasistencia_p2_'];
       $this->eval_2_per_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['eval_2_per_'];
       $this->dc1_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc1_2p_'];
       $this->dc2_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc2_2p_'];
       $this->dc3_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc3_2p_'];
       $this->dc4_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc4_2p_'];
       $this->dc5_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc5_2p_'];
       $this->pcent_dc2_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_dc2_'];
       $this->ds1_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds1_2p_'];
       $this->ds2_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds2_2p_'];
       $this->ds3_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds3_2p_'];
       $this->ds4_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds4_2p_'];
       $this->ds5_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds5_2p_'];
       $this->pcent_ds2_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_ds2_'];
       $this->dp1_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp1_2p_'];
       $this->dp2_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp2_2p_'];
       $this->dp3_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp3_2p_'];
       $this->dp4_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp4_2p_'];
       $this->dp5_2p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp5_2p_'];
       $this->pcent_dp2_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_dp2_'];
       $this->aee_p2_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['aee_p2_'];
       $this->letras_p2_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['letras_p2_'];
       $this->porcet_aee_p2_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['porcet_aee_p2_'];
       $this->inasistencia_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['inasistencia_p3_'];
       $this->eval_3_per_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['eval_3_per_'];
       $this->dc1_3p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc1_3p_'];
       $this->dc2_3p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc2_3p_'];
       $this->dc3_3p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc3_3p_'];
       $this->dc4_3p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc4_3p_'];
       $this->dc5_3p_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc5_3p_'];
       $this->pcent_dc3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_dc3_'];
       $this->ds1_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds1_p3_'];
       $this->ds2_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds2_p3_'];
       $this->ds3_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds3_p3_'];
       $this->ds4_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds4_p3_'];
       $this->ds5_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds5_p3_'];
       $this->pcent_ds3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_ds3_'];
       $this->dp1_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp1_p3_'];
       $this->dp2_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp2_p3_'];
       $this->dp3_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp3_p3_'];
       $this->dp4_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp4_p3_'];
       $this->sc_field_0_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['sc_field_0_'];
       $this->pcent_dp3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_dp3_'];
       $this->aee_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['aee_p3_'];
       $this->letras_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['letras_p3_'];
       $this->porcent_aee_p3_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['porcent_aee_p3_'];
       $this->inasistencia_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['inasistencia_p4_'];
       $this->eval_4_per_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['eval_4_per_'];
       $this->dc1_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc1_p4_'];
       $this->dc2_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc2_p4_'];
       $this->dc3_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc3_p4_'];
       $this->dc4_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc4_p4_'];
       $this->dc5_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc5_p4_'];
       $this->pcent_dc4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_dc4_'];
       $this->ds1_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds1_p4_'];
       $this->ds2_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds2_p4_'];
       $this->ds3_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds3_p4_'];
       $this->ds4_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds4_p4_'];
       $this->ds5_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['ds5_p4_'];
       $this->pcent_ds4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_ds4_'];
       $this->dp1_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp1_p4_'];
       $this->dp2_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp2_p4_'];
       $this->dp3_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp3_p4_'];
       $this->dp4_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp4_p4_'];
       $this->dp5_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dp5_p4_'];
       $this->aee_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['aee_p4_'];
       $this->letras_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['letras_p4_'];
       $this->porcent_aee_p4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['porcent_aee_p4_'];
       $this->pcent_dp4_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_dp4_'];
       $this->eval_final_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['eval_final_'];
       $this->entorno_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['entorno_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_estudiante_'] = true;
           $this->nmgp_cmp_readonly['estatus_'] = true;
           $this->nmgp_cmp_readonly['novedad_'] = true;
           $this->nmgp_cmp_readonly['asienta_inasistencias_'] = true;
           $this->nmgp_cmp_readonly['inasistencia_p1_'] = true;
           $this->nmgp_cmp_readonly['eval_1_per_'] = true;
           $this->nmgp_cmp_readonly['dc1_'] = true;
           $this->nmgp_cmp_readonly['dc2_'] = true;
           $this->nmgp_cmp_readonly['pcent_dc_'] = true;
           $this->nmgp_cmp_readonly['aeep1_'] = true;
           $this->nmgp_cmp_readonly['porcent_aeep1_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_estudiante_']) || $this->nmgp_cmp_readonly['id_estudiante_'] != "on") {$this->nmgp_cmp_readonly['id_estudiante_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['estatus_']) || $this->nmgp_cmp_readonly['estatus_'] != "on") {$this->nmgp_cmp_readonly['estatus_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['novedad_']) || $this->nmgp_cmp_readonly['novedad_'] != "on") {$this->nmgp_cmp_readonly['novedad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['asienta_inasistencias_']) || $this->nmgp_cmp_readonly['asienta_inasistencias_'] != "on") {$this->nmgp_cmp_readonly['asienta_inasistencias_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['inasistencia_p1_']) || $this->nmgp_cmp_readonly['inasistencia_p1_'] != "on") {$this->nmgp_cmp_readonly['inasistencia_p1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['eval_1_per_']) || $this->nmgp_cmp_readonly['eval_1_per_'] != "on") {$this->nmgp_cmp_readonly['eval_1_per_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc1_']) || $this->nmgp_cmp_readonly['dc1_'] != "on") {$this->nmgp_cmp_readonly['dc1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dc2_']) || $this->nmgp_cmp_readonly['dc2_'] != "on") {$this->nmgp_cmp_readonly['dc2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pcent_dc_']) || $this->nmgp_cmp_readonly['pcent_dc_'] != "on") {$this->nmgp_cmp_readonly['pcent_dc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['aeep1_']) || $this->nmgp_cmp_readonly['aeep1_'] != "on") {$this->nmgp_cmp_readonly['aeep1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['porcent_aeep1_']) || $this->nmgp_cmp_readonly['porcent_aeep1_'] != "on") {$this->nmgp_cmp_readonly['porcent_aeep1_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_estudiante_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['id_estudiante_']; 
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
       $this->estatus_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['estatus_']; 
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
       $this->novedad_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['novedad_']; 
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
       $this->asienta_inasistencias_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['asienta_inasistencias_']; 
       $asienta_inasistencias_ = $this->asienta_inasistencias_; 
       $sStyleHidden_asienta_inasistencias_ = '';
       if (isset($sCheckRead_asienta_inasistencias_))
       {
           unset($sCheckRead_asienta_inasistencias_);
       }
       if (isset($this->nmgp_cmp_readonly['asienta_inasistencias_']))
       {
           $sCheckRead_asienta_inasistencias_ = $this->nmgp_cmp_readonly['asienta_inasistencias_'];
       }
       if (isset($this->nmgp_cmp_hidden['asienta_inasistencias_']) && $this->nmgp_cmp_hidden['asienta_inasistencias_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['asienta_inasistencias_']);
           $sStyleHidden_asienta_inasistencias_ = 'display: none;';
       }
       $bTestReadOnly_asienta_inasistencias_ = true;
       $sStyleReadLab_asienta_inasistencias_ = 'display: none;';
       $sStyleReadInp_asienta_inasistencias_ = '';
       if (isset($this->nmgp_cmp_readonly['asienta_inasistencias_']) && $this->nmgp_cmp_readonly['asienta_inasistencias_'] == 'on')
       {
           $bTestReadOnly_asienta_inasistencias_ = false;
           unset($this->nmgp_cmp_readonly['asienta_inasistencias_']);
           $sStyleReadLab_asienta_inasistencias_ = '';
           $sStyleReadInp_asienta_inasistencias_ = 'display: none;';
       }
       $this->inasistencia_p1_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['inasistencia_p1_']; 
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
       $this->eval_1_per_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['eval_1_per_']; 
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
       $this->dc1_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc1_']; 
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
       $this->dc2_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['dc2_']; 
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
       $this->pcent_dc_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['pcent_dc_']; 
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
       $this->aeep1_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['aeep1_']; 
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
       $this->porcent_aeep1_ = $this->form_vert_form_t_evaluacion_itigvc_tecnica[$sc_seq_vert]['porcent_aeep1_']; 
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_t_evaluacion_itigvc_tecnica_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_t_evaluacion_itigvc_tecnica_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_t_evaluacion_itigvc_tecnica_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_t_evaluacion_itigvc_tecnica_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_t_evaluacion_itigvc_tecnica_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_t_evaluacion_itigvc_tecnica_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_estudiante_']) && $this->nmgp_cmp_hidden['id_estudiante_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_estudiante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_estudiante_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_estudiante__line" id="hidden_field_data_id_estudiante_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_estudiante_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_estudiante__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_estudiante_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id_estudiante_"]) &&  $this->nmgp_cmp_readonly["id_estudiante_"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_'] = array(); 
    }

   $old_value_inasistencia_p1_ = $this->inasistencia_p1_;
   $old_value_eval_1_per_ = $this->eval_1_per_;
   $old_value_dc1_ = $this->dc1_;
   $old_value_dc2_ = $this->dc2_;
   $old_value_pcent_dc_ = $this->pcent_dc_;
   $old_value_aeep1_ = $this->aeep1_;
   $old_value_porcent_aeep1_ = $this->porcent_aeep1_;
   $this->nm_tira_formatacao();


   $unformatted_value_inasistencia_p1_ = $this->inasistencia_p1_;
   $unformatted_value_eval_1_per_ = $this->eval_1_per_;
   $unformatted_value_dc1_ = $this->dc1_;
   $unformatted_value_dc2_ = $this->dc2_;
   $unformatted_value_pcent_dc_ = $this->pcent_dc_;
   $unformatted_value_aeep1_ = $this->aeep1_;
   $unformatted_value_porcent_aeep1_ = $this->porcent_aeep1_;

   $nm_comando = "SELECT idstudents, concat_ws(' ',primer_apellido, segundo_apellido,primer_nombre, segundo_nombre) as nombre
FROM students 
ORDER BY nombre";

   $this->inasistencia_p1_ = $old_value_inasistencia_p1_;
   $this->eval_1_per_ = $old_value_eval_1_per_;
   $this->dc1_ = $old_value_dc1_;
   $this->dc2_ = $old_value_dc2_;
   $this->pcent_dc_ = $old_value_pcent_dc_;
   $this->aeep1_ = $old_value_aeep1_;
   $this->porcent_aeep1_ = $old_value_porcent_aeep1_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_'] = array(); 
    }

   $old_value_inasistencia_p1_ = $this->inasistencia_p1_;
   $old_value_eval_1_per_ = $this->eval_1_per_;
   $old_value_dc1_ = $this->dc1_;
   $old_value_dc2_ = $this->dc2_;
   $old_value_pcent_dc_ = $this->pcent_dc_;
   $old_value_aeep1_ = $this->aeep1_;
   $old_value_porcent_aeep1_ = $this->porcent_aeep1_;
   $this->nm_tira_formatacao();


   $unformatted_value_inasistencia_p1_ = $this->inasistencia_p1_;
   $unformatted_value_eval_1_per_ = $this->eval_1_per_;
   $unformatted_value_dc1_ = $this->dc1_;
   $unformatted_value_dc2_ = $this->dc2_;
   $unformatted_value_pcent_dc_ = $this->pcent_dc_;
   $unformatted_value_aeep1_ = $this->aeep1_;
   $unformatted_value_porcent_aeep1_ = $this->porcent_aeep1_;

   $nm_comando = "SELECT idstudents, concat_ws(' ',primer_apellido, segundo_apellido,primer_nombre, segundo_nombre) as nombre
FROM students 
ORDER BY nombre";

   $this->inasistencia_p1_ = $old_value_inasistencia_p1_;
   $this->eval_1_per_ = $old_value_eval_1_per_;
   $this->dc1_ = $old_value_dc1_;
   $this->dc2_ = $old_value_dc2_;
   $this->pcent_dc_ = $old_value_pcent_dc_;
   $this->aeep1_ = $old_value_aeep1_;
   $this->porcent_aeep1_ = $old_value_porcent_aeep1_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['Lookup_id_estudiante_'][] = $rs->fields[0];
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

   <?php if (isset($this->nmgp_cmp_hidden['asienta_inasistencias_']) && $this->nmgp_cmp_hidden['asienta_inasistencias_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="asienta_inasistencias_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($asienta_inasistencias_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_asienta_inasistencias__line" id="hidden_field_data_asienta_inasistencias_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_asienta_inasistencias_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_asienta_inasistencias__line" style="vertical-align: top;padding: 0px"><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__inasico.png"))
          { 
              $asienta_inasistencias_ = "&nbsp;" ;  
          } 
          else 
          { 
              $asienta_inasistencias_ = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__inasico.png\"/>" ; 
          } 
?>
<span id="id_imghtml_asienta_inasistencias_<?php echo $sc_seq_vert; ?>"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_form_inasistencias_edit . "', '$this->nm_location', 'par_idstudents*scin" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['dados_form'][$sc_seq_vert]['id_estudiante_'] . "*scoutpar_id_grupo*scin" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['dados_form'][$sc_seq_vert]['id_subgrupo_'] . "*scoutpar_id_asignatura*scin" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['dados_form'][$sc_seq_vert]['id_asignatura_'] . "*scoutpar_id_grado*scin" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['dados_form'][$sc_seq_vert]['id_grado_'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinS*scoutNMSC_modal*scinok*scoutsc_redir_insert*scinok*scout', '', 'modal', '450', '550', 'form_inasistencias')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $asienta_inasistencias_ ; ?></font></a></span>
<?php if ($bTestReadOnly_asienta_inasistencias_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["asienta_inasistencias_"]) &&  $this->nmgp_cmp_readonly["asienta_inasistencias_"] == "on") { 

 ?>
<input type="hidden" name="asienta_inasistencias_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($asienta_inasistencias_) . "\">" . $asienta_inasistencias_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_asienta_inasistencias_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-asienta_inasistencias_<?php echo $sc_seq_vert ?> css_asienta_inasistencias__line" style="<?php echo $sStyleReadLab_asienta_inasistencias_; ?>"><?php echo $this->form_encode_input($this->asienta_inasistencias_); ?></span><span id="id_read_off_asienta_inasistencias_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_asienta_inasistencias_; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_asienta_inasistencias_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_asienta_inasistencias_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['inasistencia_p1_']) && $this->nmgp_cmp_hidden['inasistencia_p1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inasistencia_p1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_inasistencia_p1__line" id="hidden_field_data_inasistencia_p1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_inasistencia_p1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_inasistencia_p1__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="inasistencia_p1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inasistencia_p1_); ?>"><span id="id_ajax_label_inasistencia_p1_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($inasistencia_p1_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inasistencia_p1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inasistencia_p1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['eval_1_per_']) && $this->nmgp_cmp_hidden['eval_1_per_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="eval_1_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_1_per_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_eval_1_per__line" id="hidden_field_data_eval_1_per_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_eval_1_per_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_eval_1_per__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="eval_1_per_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($eval_1_per_); ?>"><span id="id_ajax_label_eval_1_per_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($eval_1_per_); ?></span>
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
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dc1_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dc1_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
<span class="scFormPopupBubble<?php echo $sc_seq_vert; ?>" style="vertical-align: top; display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Evaluación Período 30 %</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Evaluación Período 30 %</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dc2_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dc2_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
<span class="scFormPopupBubble<?php echo $sc_seq_vert; ?>" style="vertical-align: top; display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Desarrollo Técnico 60 %</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Desarrollo Técnico 60 %</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dc2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dc2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['pcent_dc_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['pcent_dc_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pcent_dc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pcent_dc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['aeep1_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['aeep1_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
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
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porcent_aeep1_']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['porcent_aeep1_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcent_aeep1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcent_aeep1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
       if (isset($sCheckRead_asienta_inasistencias_))
       {
           $this->nmgp_cmp_readonly['asienta_inasistencias_'] = $sCheckRead_asienta_inasistencias_;
       }
       if ('display: none;' == $sStyleHidden_asienta_inasistencias_)
       {
           $this->nmgp_cmp_hidden['asienta_inasistencias_'] = 'off';
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
       if (isset($sCheckRead_pcent_dc_))
       {
           $this->nmgp_cmp_readonly['pcent_dc_'] = $sCheckRead_pcent_dc_;
       }
       if ('display: none;' == $sStyleHidden_pcent_dc_)
       {
           $this->nmgp_cmp_hidden['pcent_dc_'] = 'off';
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

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_t_evaluacion_itigvc_tecnica = $guarda_form_vert_form_t_evaluacion_itigvc_tecnica;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['masterValue']);
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
 parent.scAjaxDetailStatus("form_t_evaluacion_itigvc_tecnica");
 parent.scAjaxDetailHeight("form_t_evaluacion_itigvc_tecnica", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_t_evaluacion_itigvc_tecnica", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_t_evaluacion_itigvc_tecnica", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_itigvc_tecnica']['sc_modal'])
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