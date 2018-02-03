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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_tbl_students'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_tbl_students'] . ""); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_students/form_students_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_students_sajax_js.php");
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

include_once('form_students_jquery.php');

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

  $("#hidden_bloco_1,#hidden_bloco_2,#hidden_bloco_3,#hidden_bloco_4,#hidden_bloco_5,#hidden_bloco_6,#hidden_bloco_7,#hidden_bloco_8").each(function() {
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
    "hidden_bloco_1": true,
    "hidden_bloco_2": true,
    "hidden_bloco_3": true,
    "hidden_bloco_4": true,
    "hidden_bloco_5": true,
    "hidden_bloco_6": true,
    "hidden_bloco_7": true,
    "hidden_bloco_8": true
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
    if ("hidden_bloco_9" == block_id) {
      scAjaxDetailHeight("form_novedades_x_estudiante_fecha", "250");
    }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['recarga'];
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
 include_once("form_students_js0.php");
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
<form name="F1" method="post" enctype="multipart/form-data" 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['insert_validation']; ?>">
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="photo_salva" value="<?php  echo $this->form_encode_input($this->photo) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_students'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_students'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_tbl_students'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_tbl_students'] . ""; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['fast_search'][2] : "";
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
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_0'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_0", "sc_btn_sc_btn_0()", "sc_btn_sc_btn_0()", "sc_sc_btn_0_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['empty_filter'] = true;
       }
  }
  else
  {
?>
<script type="text/javascript">
var pag_ativa = "form_students_form0";
</script>
<ul class="scTabLine">
<?php
    if (empty($nmgp_num_form) || $nmgp_num_form == "form_students_form0")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_students_form0" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_students_form0')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__user2_24.png" align="absmiddle">
     Identificación
    </a>
   </li>
<?php
    if ($nmgp_num_form == "form_students_form1")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_students_form1" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_students_form1')">
     Salud y Programas Especiales
    </a>
   </li>
<?php
    if ($nmgp_num_form == "form_students_form2")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_students_form2" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_students_form2')">
     Economía y Territorialidad
    </a>
   </li>
<?php
    if ($nmgp_num_form == "form_students_form3")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_students_form3" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_students_form3')">
     Capacidades Discapacidades
    </a>
   </li>
<?php
    if ($nmgp_num_form == "form_students_form4")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_students_form4" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_students_form4')">
     Novedades
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_students_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="80%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['firstname']))
   {
       $this->nmgp_cmp_hidden['firstname'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['lastname']))
   {
       $this->nmgp_cmp_hidden['lastname'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['postalcode']))
   {
       $this->nmgp_cmp_hidden['postalcode'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><input type="hidden" name="photo_ul_name" id="id_sc_field_photo_ul_name" value="<?php echo $this->form_encode_input($this->photo_ul_name);?>">
<input type="hidden" name="photo_ul_type" id="id_sc_field_photo_ul_type" value="<?php echo $this->form_encode_input($this->photo_ul_type);?>">
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estatus']))
    {
        $this->nm_new_label['estatus'] = "Estatus";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['estatus']) && $this->nmgp_cmp_hidden['estatus'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estatus" value="<?php echo $this->form_encode_input($estatus) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estatus_line" id="hidden_field_data_estatus" style="<?php echo $sStyleHidden_estatus; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estatus_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estatus_label"><span id="id_label_estatus"><?php echo $this->nm_new_label['estatus']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estatus"]) &&  $this->nmgp_cmp_readonly["estatus"] == "on") { 

 if ("N" == $this->estatus) { $estatus_look = "Nuevo";} 
 if ("C" == $this->estatus) { $estatus_look = "Continuidad";} 
?>
<input type="hidden" name="estatus" value="<?php echo $this->form_encode_input($estatus) . "\">" . $estatus_look . ""; ?>
<?php } else { ?>

<?php

 if ("N" == $this->estatus) { $estatus_look = "Nuevo";} 
 if ("C" == $this->estatus) { $estatus_look = "Continuidad";} 
?>
<span id="id_read_on_estatus"  class="css_estatus_line" style="<?php echo $sStyleReadLab_estatus; ?>"><?php echo $this->form_encode_input($estatus_look); ?></span><span id="id_read_off_estatus" style="<?php echo $sStyleReadInp_estatus; ?>"><div id="idAjaxRadio_estatus" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_estatus_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="estatus" value="N"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus'][] = 'N'; ?>
<?php  if ("N" == $this->estatus)  { echo " checked" ;} ?>  onClick="" >Nuevo</TD>
  <TD class="scFormDataFontOdd css_estatus_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="estatus" value="C"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus'][] = 'C'; ?>
<?php  if ("C" == $this->estatus)  { echo " checked" ;} ?>  onClick="" >Continuidad</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estatus_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estatus_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha_matricula']))
    {
        $this->nm_new_label['fecha_matricula'] = "Fecha Matricula";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['fecha_matricula']) && $this->nmgp_cmp_hidden['fecha_matricula'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_matricula" value="<?php echo $this->form_encode_input($fecha_matricula) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_matricula_line" id="hidden_field_data_fecha_matricula" style="<?php echo $sStyleHidden_fecha_matricula; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_matricula_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_matricula_label"><span id="id_label_fecha_matricula"><?php echo $this->nm_new_label['fecha_matricula']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_matricula"]) &&  $this->nmgp_cmp_readonly["fecha_matricula"] == "on") { 

 ?>
<input type="hidden" name="fecha_matricula" value="<?php echo $this->form_encode_input($fecha_matricula) . "\">" . $fecha_matricula . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_matricula" class="sc-ui-readonly-fecha_matricula css_fecha_matricula_line" style="<?php echo $sStyleReadLab_fecha_matricula; ?>"><?php echo $this->form_encode_input($fecha_matricula); ?></span><span id="id_read_off_fecha_matricula" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_matricula; ?>">
 <input class="sc-js-input scFormObjectOdd css_fecha_matricula_obj" style="" id="id_sc_field_fecha_matricula" type=text name="fecha_matricula" value="<?php echo $this->form_encode_input($fecha_matricula) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_matricula']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_matricula']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['fecha_matricula']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_matricula_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_matricula_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['genero']))
    {
        $this->nm_new_label['genero'] = "Genero";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['genero']) && $this->nmgp_cmp_hidden['genero'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="genero" value="<?php echo $this->form_encode_input($genero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_genero_line" id="hidden_field_data_genero" style="<?php echo $sStyleHidden_genero; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_genero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_genero_label"><span id="id_label_genero"><?php echo $this->nm_new_label['genero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["genero"]) &&  $this->nmgp_cmp_readonly["genero"] == "on") { 

 if ("M" == $this->genero) { $genero_look = "Masculino";} 
 if ("F" == $this->genero) { $genero_look = "Femenino";} 
?>
<input type="hidden" name="genero" value="<?php echo $this->form_encode_input($genero) . "\">" . $genero_look . ""; ?>
<?php } else { ?>

<?php

 if ("M" == $this->genero) { $genero_look = "Masculino";} 
 if ("F" == $this->genero) { $genero_look = "Femenino";} 
?>
<span id="id_read_on_genero"  class="css_genero_line" style="<?php echo $sStyleReadLab_genero; ?>"><?php echo $this->form_encode_input($genero_look); ?></span><span id="id_read_off_genero" style="<?php echo $sStyleReadInp_genero; ?>"><div id="idAjaxRadio_genero" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_genero_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="genero" value="M"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_genero'][] = 'M'; ?>
<?php  if ("M" == $this->genero)  { echo " checked" ;} ?>  onClick="" >Masculino</TD>
  <TD class="scFormDataFontOdd css_genero_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="genero" value="F"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_genero'][] = 'F'; ?>
<?php  if ("F" == $this->genero)  { echo " checked" ;} ?>  onClick="" >Femenino</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_genero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_genero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha_nacimiento']))
    {
        $this->nm_new_label['fecha_nacimiento'] = "Fecha Nacimiento";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['fecha_nacimiento']) && $this->nmgp_cmp_hidden['fecha_nacimiento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_nacimiento" value="<?php echo $this->form_encode_input($fecha_nacimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_nacimiento_line" id="hidden_field_data_fecha_nacimiento" style="<?php echo $sStyleHidden_fecha_nacimiento; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_nacimiento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_nacimiento_label"><span id="id_label_fecha_nacimiento"><?php echo $this->nm_new_label['fecha_nacimiento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_nacimiento"]) &&  $this->nmgp_cmp_readonly["fecha_nacimiento"] == "on") { 

 ?>
<input type="hidden" name="fecha_nacimiento" value="<?php echo $this->form_encode_input($fecha_nacimiento) . "\">" . $fecha_nacimiento . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_nacimiento" class="sc-ui-readonly-fecha_nacimiento css_fecha_nacimiento_line" style="<?php echo $sStyleReadLab_fecha_nacimiento; ?>"><?php echo $this->form_encode_input($fecha_nacimiento); ?></span><span id="id_read_off_fecha_nacimiento" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_nacimiento; ?>">
 <input class="sc-js-input scFormObjectOdd css_fecha_nacimiento_obj" style="" id="id_sc_field_fecha_nacimiento" type=text name="fecha_nacimiento" value="<?php echo $this->form_encode_input($fecha_nacimiento) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_nacimiento']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_nacimiento']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['fecha_nacimiento']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_nacimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_nacimiento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_estatus_dumb = ('' == $sStyleHidden_estatus) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_estatus_dumb" style="<?php echo $sStyleHidden_estatus_dumb; ?>"></TD>
<?php $sStyleHidden_fecha_matricula_dumb = ('' == $sStyleHidden_fecha_matricula) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_matricula_dumb" style="<?php echo $sStyleHidden_fecha_matricula_dumb; ?>"></TD>
<?php $sStyleHidden_genero_dumb = ('' == $sStyleHidden_genero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_genero_dumb" style="<?php echo $sStyleHidden_genero_dumb; ?>"></TD>
<?php $sStyleHidden_fecha_nacimiento_dumb = ('' == $sStyleHidden_fecha_nacimiento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_nacimiento_dumb" style="<?php echo $sStyleHidden_fecha_nacimiento_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['primer_apellido']))
    {
        $this->nm_new_label['primer_apellido'] = "Primer Apellido";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $primer_apellido = $this->primer_apellido;
   $sStyleHidden_primer_apellido = '';
   if (isset($this->nmgp_cmp_hidden['primer_apellido']) && $this->nmgp_cmp_hidden['primer_apellido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['primer_apellido']);
       $sStyleHidden_primer_apellido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_primer_apellido = 'display: none;';
   $sStyleReadInp_primer_apellido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['primer_apellido']) && $this->nmgp_cmp_readonly['primer_apellido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['primer_apellido']);
       $sStyleReadLab_primer_apellido = '';
       $sStyleReadInp_primer_apellido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['primer_apellido']) && $this->nmgp_cmp_hidden['primer_apellido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="primer_apellido" value="<?php echo $this->form_encode_input($primer_apellido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_primer_apellido_line" id="hidden_field_data_primer_apellido" style="<?php echo $sStyleHidden_primer_apellido; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_primer_apellido_line" style="padding: 0px"><span class="scFormLabelOddFormat css_primer_apellido_label"><span id="id_label_primer_apellido"><?php echo $this->nm_new_label['primer_apellido']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["primer_apellido"]) &&  $this->nmgp_cmp_readonly["primer_apellido"] == "on") { 

 ?>
<input type="hidden" name="primer_apellido" value="<?php echo $this->form_encode_input($primer_apellido) . "\">" . $primer_apellido . ""; ?>
<?php } else { ?>
<span id="id_read_on_primer_apellido" class="sc-ui-readonly-primer_apellido css_primer_apellido_line" style="<?php echo $sStyleReadLab_primer_apellido; ?>"><?php echo $this->form_encode_input($this->primer_apellido); ?></span><span id="id_read_off_primer_apellido" style="white-space: nowrap;<?php echo $sStyleReadInp_primer_apellido; ?>">
 <input class="sc-js-input scFormObjectOdd css_primer_apellido_obj" style="" id="id_sc_field_primer_apellido" type=text name="primer_apellido" value="<?php echo $this->form_encode_input($primer_apellido) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_primer_apellido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_primer_apellido_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['segundo_apellido']))
    {
        $this->nm_new_label['segundo_apellido'] = "Segundo Apellido";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $segundo_apellido = $this->segundo_apellido;
   $sStyleHidden_segundo_apellido = '';
   if (isset($this->nmgp_cmp_hidden['segundo_apellido']) && $this->nmgp_cmp_hidden['segundo_apellido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['segundo_apellido']);
       $sStyleHidden_segundo_apellido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_segundo_apellido = 'display: none;';
   $sStyleReadInp_segundo_apellido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['segundo_apellido']) && $this->nmgp_cmp_readonly['segundo_apellido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['segundo_apellido']);
       $sStyleReadLab_segundo_apellido = '';
       $sStyleReadInp_segundo_apellido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['segundo_apellido']) && $this->nmgp_cmp_hidden['segundo_apellido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="segundo_apellido" value="<?php echo $this->form_encode_input($segundo_apellido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_segundo_apellido_line" id="hidden_field_data_segundo_apellido" style="<?php echo $sStyleHidden_segundo_apellido; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_segundo_apellido_line" style="padding: 0px"><span class="scFormLabelOddFormat css_segundo_apellido_label"><span id="id_label_segundo_apellido"><?php echo $this->nm_new_label['segundo_apellido']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["segundo_apellido"]) &&  $this->nmgp_cmp_readonly["segundo_apellido"] == "on") { 

 ?>
<input type="hidden" name="segundo_apellido" value="<?php echo $this->form_encode_input($segundo_apellido) . "\">" . $segundo_apellido . ""; ?>
<?php } else { ?>
<span id="id_read_on_segundo_apellido" class="sc-ui-readonly-segundo_apellido css_segundo_apellido_line" style="<?php echo $sStyleReadLab_segundo_apellido; ?>"><?php echo $this->form_encode_input($this->segundo_apellido); ?></span><span id="id_read_off_segundo_apellido" style="white-space: nowrap;<?php echo $sStyleReadInp_segundo_apellido; ?>">
 <input class="sc-js-input scFormObjectOdd css_segundo_apellido_obj" style="" id="id_sc_field_segundo_apellido" type=text name="segundo_apellido" value="<?php echo $this->form_encode_input($segundo_apellido) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_segundo_apellido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_segundo_apellido_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['primer_nombre']))
    {
        $this->nm_new_label['primer_nombre'] = "Primer Nombre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $primer_nombre = $this->primer_nombre;
   $sStyleHidden_primer_nombre = '';
   if (isset($this->nmgp_cmp_hidden['primer_nombre']) && $this->nmgp_cmp_hidden['primer_nombre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['primer_nombre']);
       $sStyleHidden_primer_nombre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_primer_nombre = 'display: none;';
   $sStyleReadInp_primer_nombre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['primer_nombre']) && $this->nmgp_cmp_readonly['primer_nombre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['primer_nombre']);
       $sStyleReadLab_primer_nombre = '';
       $sStyleReadInp_primer_nombre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['primer_nombre']) && $this->nmgp_cmp_hidden['primer_nombre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="primer_nombre" value="<?php echo $this->form_encode_input($primer_nombre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_primer_nombre_line" id="hidden_field_data_primer_nombre" style="<?php echo $sStyleHidden_primer_nombre; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_primer_nombre_line" style="padding: 0px"><span class="scFormLabelOddFormat css_primer_nombre_label"><span id="id_label_primer_nombre"><?php echo $this->nm_new_label['primer_nombre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["primer_nombre"]) &&  $this->nmgp_cmp_readonly["primer_nombre"] == "on") { 

 ?>
<input type="hidden" name="primer_nombre" value="<?php echo $this->form_encode_input($primer_nombre) . "\">" . $primer_nombre . ""; ?>
<?php } else { ?>
<span id="id_read_on_primer_nombre" class="sc-ui-readonly-primer_nombre css_primer_nombre_line" style="<?php echo $sStyleReadLab_primer_nombre; ?>"><?php echo $this->form_encode_input($this->primer_nombre); ?></span><span id="id_read_off_primer_nombre" style="white-space: nowrap;<?php echo $sStyleReadInp_primer_nombre; ?>">
 <input class="sc-js-input scFormObjectOdd css_primer_nombre_obj" style="" id="id_sc_field_primer_nombre" type=text name="primer_nombre" value="<?php echo $this->form_encode_input($primer_nombre) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_primer_nombre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_primer_nombre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['segundo_nombre']))
    {
        $this->nm_new_label['segundo_nombre'] = "Segundo Nombre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $segundo_nombre = $this->segundo_nombre;
   $sStyleHidden_segundo_nombre = '';
   if (isset($this->nmgp_cmp_hidden['segundo_nombre']) && $this->nmgp_cmp_hidden['segundo_nombre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['segundo_nombre']);
       $sStyleHidden_segundo_nombre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_segundo_nombre = 'display: none;';
   $sStyleReadInp_segundo_nombre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['segundo_nombre']) && $this->nmgp_cmp_readonly['segundo_nombre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['segundo_nombre']);
       $sStyleReadLab_segundo_nombre = '';
       $sStyleReadInp_segundo_nombre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['segundo_nombre']) && $this->nmgp_cmp_hidden['segundo_nombre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="segundo_nombre" value="<?php echo $this->form_encode_input($segundo_nombre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_segundo_nombre_line" id="hidden_field_data_segundo_nombre" style="<?php echo $sStyleHidden_segundo_nombre; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_segundo_nombre_line" style="padding: 0px"><span class="scFormLabelOddFormat css_segundo_nombre_label"><span id="id_label_segundo_nombre"><?php echo $this->nm_new_label['segundo_nombre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["segundo_nombre"]) &&  $this->nmgp_cmp_readonly["segundo_nombre"] == "on") { 

 ?>
<input type="hidden" name="segundo_nombre" value="<?php echo $this->form_encode_input($segundo_nombre) . "\">" . $segundo_nombre . ""; ?>
<?php } else { ?>
<span id="id_read_on_segundo_nombre" class="sc-ui-readonly-segundo_nombre css_segundo_nombre_line" style="<?php echo $sStyleReadLab_segundo_nombre; ?>"><?php echo $this->form_encode_input($this->segundo_nombre); ?></span><span id="id_read_off_segundo_nombre" style="white-space: nowrap;<?php echo $sStyleReadInp_segundo_nombre; ?>">
 <input class="sc-js-input scFormObjectOdd css_segundo_nombre_obj" style="" id="id_sc_field_segundo_nombre" type=text name="segundo_nombre" value="<?php echo $this->form_encode_input($segundo_nombre) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_segundo_nombre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_segundo_nombre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_primer_apellido_dumb = ('' == $sStyleHidden_primer_apellido) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_primer_apellido_dumb" style="<?php echo $sStyleHidden_primer_apellido_dumb; ?>"></TD>
<?php $sStyleHidden_segundo_apellido_dumb = ('' == $sStyleHidden_segundo_apellido) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_segundo_apellido_dumb" style="<?php echo $sStyleHidden_segundo_apellido_dumb; ?>"></TD>
<?php $sStyleHidden_primer_nombre_dumb = ('' == $sStyleHidden_primer_nombre) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_primer_nombre_dumb" style="<?php echo $sStyleHidden_primer_nombre_dumb; ?>"></TD>
<?php $sStyleHidden_segundo_nombre_dumb = ('' == $sStyleHidden_segundo_nombre) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_segundo_nombre_dumb" style="<?php echo $sStyleHidden_segundo_nombre_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_identificacion']))
   {
       $this->nm_new_label['tipo_identificacion'] = "Tipo Identificacion";
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

    <TD class="scFormDataOdd css_tipo_identificacion_line" id="hidden_field_data_tipo_identificacion" style="<?php echo $sStyleHidden_tipo_identificacion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_identificacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_identificacion_label"><span id="id_label_tipo_identificacion"><?php echo $this->nm_new_label['tipo_identificacion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_identificacion"]) &&  $this->nmgp_cmp_readonly["tipo_identificacion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT Id_tipo_identificacion, tipo 
FROM tipo_identificacion 
ORDER BY tipo";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'][] = $rs->fields[0];
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
   $tipo_identificacion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_identificacion_1))
          {
              foreach ($this->tipo_identificacion_1 as $tmp_tipo_identificacion)
              {
                  if (trim($tmp_tipo_identificacion) === trim($cadaselect[1])) { $tipo_identificacion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_identificacion) === trim($cadaselect[1])) { $tipo_identificacion_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tipo_identificacion" value="<?php echo $this->form_encode_input($tipo_identificacion) . "\">" . $tipo_identificacion_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT Id_tipo_identificacion, tipo 
FROM tipo_identificacion 
ORDER BY tipo";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'][] = $rs->fields[0];
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
   $tipo_identificacion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_identificacion_1))
          {
              foreach ($this->tipo_identificacion_1 as $tmp_tipo_identificacion)
              {
                  if (trim($tmp_tipo_identificacion) === trim($cadaselect[1])) { $tipo_identificacion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_identificacion) === trim($cadaselect[1])) { $tipo_identificacion_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tipo_identificacion_look))
          {
              $tipo_identificacion_look = $this->tipo_identificacion;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tipo_identificacion\" class=\"css_tipo_identificacion_line\" style=\"" .  $sStyleReadLab_tipo_identificacion . "\">" . $this->form_encode_input($tipo_identificacion_look) . "</span><span id=\"id_read_off_tipo_identificacion\" style=\"" . $sStyleReadInp_tipo_identificacion . "\">";
   echo " <span id=\"idAjaxSelect_tipo_identificacion\"><select class=\"sc-js-input scFormObjectOdd css_tipo_identificacion_obj\" style=\"\" id=\"id_sc_field_tipo_identificacion\" name=\"tipo_identificacion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tipo_identificacion) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tipo_identificacion)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_identificacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_identificacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['numero_documento']))
    {
        $this->nm_new_label['numero_documento'] = "Número Documento";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['numero_documento']) && $this->nmgp_cmp_hidden['numero_documento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_documento" value="<?php echo $this->form_encode_input($numero_documento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numero_documento_line" id="hidden_field_data_numero_documento" style="<?php echo $sStyleHidden_numero_documento; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_documento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numero_documento_label"><span id="id_label_numero_documento"><?php echo $this->nm_new_label['numero_documento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_documento"]) &&  $this->nmgp_cmp_readonly["numero_documento"] == "on") { 

 ?>
<input type="hidden" name="numero_documento" value="<?php echo $this->form_encode_input($numero_documento) . "\">" . $numero_documento . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_documento" class="sc-ui-readonly-numero_documento css_numero_documento_line" style="<?php echo $sStyleReadLab_numero_documento; ?>"><?php echo $this->form_encode_input($this->numero_documento); ?></span><span id="id_read_off_numero_documento" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_documento; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_documento_obj" style="" id="id_sc_field_numero_documento" type=text name="numero_documento" value="<?php echo $this->form_encode_input($numero_documento) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_documento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_documento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['departanebti_expedicion']))
   {
       $this->nm_new_label['departanebti_expedicion'] = "Departamento Expedición";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $departanebti_expedicion = $this->departanebti_expedicion;
   $sStyleHidden_departanebti_expedicion = '';
   if (isset($this->nmgp_cmp_hidden['departanebti_expedicion']) && $this->nmgp_cmp_hidden['departanebti_expedicion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['departanebti_expedicion']);
       $sStyleHidden_departanebti_expedicion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_departanebti_expedicion = 'display: none;';
   $sStyleReadInp_departanebti_expedicion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['departanebti_expedicion']) && $this->nmgp_cmp_readonly['departanebti_expedicion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['departanebti_expedicion']);
       $sStyleReadLab_departanebti_expedicion = '';
       $sStyleReadInp_departanebti_expedicion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['departanebti_expedicion']) && $this->nmgp_cmp_hidden['departanebti_expedicion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="departanebti_expedicion" value="<?php echo $this->form_encode_input($this->departanebti_expedicion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_departanebti_expedicion_line" id="hidden_field_data_departanebti_expedicion" style="<?php echo $sStyleHidden_departanebti_expedicion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_departanebti_expedicion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_departanebti_expedicion_label"><span id="id_label_departanebti_expedicion"><?php echo $this->nm_new_label['departanebti_expedicion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["departanebti_expedicion"]) &&  $this->nmgp_cmp_readonly["departanebti_expedicion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'][] = $rs->fields[0];
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
   $departanebti_expedicion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->departanebti_expedicion_1))
          {
              foreach ($this->departanebti_expedicion_1 as $tmp_departanebti_expedicion)
              {
                  if (trim($tmp_departanebti_expedicion) === trim($cadaselect[1])) { $departanebti_expedicion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->departanebti_expedicion) === trim($cadaselect[1])) { $departanebti_expedicion_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="departanebti_expedicion" value="<?php echo $this->form_encode_input($departanebti_expedicion) . "\">" . $departanebti_expedicion_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'][] = $rs->fields[0];
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
   $departanebti_expedicion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->departanebti_expedicion_1))
          {
              foreach ($this->departanebti_expedicion_1 as $tmp_departanebti_expedicion)
              {
                  if (trim($tmp_departanebti_expedicion) === trim($cadaselect[1])) { $departanebti_expedicion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->departanebti_expedicion) === trim($cadaselect[1])) { $departanebti_expedicion_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($departanebti_expedicion_look))
          {
              $departanebti_expedicion_look = $this->departanebti_expedicion;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_departanebti_expedicion\" class=\"css_departanebti_expedicion_line\" style=\"" .  $sStyleReadLab_departanebti_expedicion . "\">" . $this->form_encode_input($departanebti_expedicion_look) . "</span><span id=\"id_read_off_departanebti_expedicion\" style=\"" . $sStyleReadInp_departanebti_expedicion . "\">";
   echo " <span id=\"idAjaxSelect_departanebti_expedicion\"><select class=\"sc-js-input scFormObjectOdd css_departanebti_expedicion_obj\" style=\"\" id=\"id_sc_field_departanebti_expedicion\" name=\"departanebti_expedicion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->departanebti_expedicion) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->departanebti_expedicion)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_departanebti_expedicion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_departanebti_expedicion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['municipio_expedicion']))
   {
       $this->nm_new_label['municipio_expedicion'] = "Municipio Expedición";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $municipio_expedicion = $this->municipio_expedicion;
   $sStyleHidden_municipio_expedicion = '';
   if (isset($this->nmgp_cmp_hidden['municipio_expedicion']) && $this->nmgp_cmp_hidden['municipio_expedicion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['municipio_expedicion']);
       $sStyleHidden_municipio_expedicion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_municipio_expedicion = 'display: none;';
   $sStyleReadInp_municipio_expedicion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['municipio_expedicion']) && $this->nmgp_cmp_readonly['municipio_expedicion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['municipio_expedicion']);
       $sStyleReadLab_municipio_expedicion = '';
       $sStyleReadInp_municipio_expedicion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['municipio_expedicion']) && $this->nmgp_cmp_hidden['municipio_expedicion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="municipio_expedicion" value="<?php echo $this->form_encode_input($this->municipio_expedicion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_municipio_expedicion_line" id="hidden_field_data_municipio_expedicion" style="<?php echo $sStyleHidden_municipio_expedicion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_municipio_expedicion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_municipio_expedicion_label"><span id="id_label_municipio_expedicion"><?php echo $this->nm_new_label['municipio_expedicion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["municipio_expedicion"]) &&  $this->nmgp_cmp_readonly["municipio_expedicion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'] = array(); 
}
if ($this->departanebti_expedicion != "")
{ 
   $this->nm_clear_val("departanebti_expedicion");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
WHERE iddepartamento = $this->departanebti_expedicion
ORDER BY nombreMunicipio";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'][] = $rs->fields[0];
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
   $municipio_expedicion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->municipio_expedicion_1))
          {
              foreach ($this->municipio_expedicion_1 as $tmp_municipio_expedicion)
              {
                  if (trim($tmp_municipio_expedicion) === trim($cadaselect[1])) { $municipio_expedicion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->municipio_expedicion) === trim($cadaselect[1])) { $municipio_expedicion_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="municipio_expedicion" value="<?php echo $this->form_encode_input($municipio_expedicion) . "\">" . $municipio_expedicion_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'] = array(); 
}
if ($this->departanebti_expedicion != "")
{ 
   $this->nm_clear_val("departanebti_expedicion");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
WHERE iddepartamento = $this->departanebti_expedicion
ORDER BY nombreMunicipio";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'][] = $rs->fields[0];
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
   $municipio_expedicion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->municipio_expedicion_1))
          {
              foreach ($this->municipio_expedicion_1 as $tmp_municipio_expedicion)
              {
                  if (trim($tmp_municipio_expedicion) === trim($cadaselect[1])) { $municipio_expedicion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->municipio_expedicion) === trim($cadaselect[1])) { $municipio_expedicion_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($municipio_expedicion_look))
          {
              $municipio_expedicion_look = $this->municipio_expedicion;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_municipio_expedicion\" class=\"css_municipio_expedicion_line\" style=\"" .  $sStyleReadLab_municipio_expedicion . "\">" . $this->form_encode_input($municipio_expedicion_look) . "</span><span id=\"id_read_off_municipio_expedicion\" style=\"" . $sStyleReadInp_municipio_expedicion . "\">";
   echo " <span id=\"idAjaxSelect_municipio_expedicion\"><select class=\"sc-js-input scFormObjectOdd css_municipio_expedicion_obj\" style=\"\" id=\"id_sc_field_municipio_expedicion\" name=\"municipio_expedicion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->municipio_expedicion) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->municipio_expedicion)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_municipio_expedicion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_municipio_expedicion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_tipo_identificacion_dumb = ('' == $sStyleHidden_tipo_identificacion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tipo_identificacion_dumb" style="<?php echo $sStyleHidden_tipo_identificacion_dumb; ?>"></TD>
<?php $sStyleHidden_numero_documento_dumb = ('' == $sStyleHidden_numero_documento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_numero_documento_dumb" style="<?php echo $sStyleHidden_numero_documento_dumb; ?>"></TD>
<?php $sStyleHidden_departanebti_expedicion_dumb = ('' == $sStyleHidden_departanebti_expedicion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_departanebti_expedicion_dumb" style="<?php echo $sStyleHidden_departanebti_expedicion_dumb; ?>"></TD>
<?php $sStyleHidden_municipio_expedicion_dumb = ('' == $sStyleHidden_municipio_expedicion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_municipio_expedicion_dumb" style="<?php echo $sStyleHidden_municipio_expedicion_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['firstname']))
    {
        $this->nm_new_label['firstname'] = "" . $this->Ini->Nm_lang['lang_students_fld_firstname'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $firstname = $this->firstname;
   if (!isset($this->nmgp_cmp_hidden['firstname']))
   {
       $this->nmgp_cmp_hidden['firstname'] = 'off';
   }
   $sStyleHidden_firstname = '';
   if (isset($this->nmgp_cmp_hidden['firstname']) && $this->nmgp_cmp_hidden['firstname'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['firstname']);
       $sStyleHidden_firstname = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_firstname = 'display: none;';
   $sStyleReadInp_firstname = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['firstname']) && $this->nmgp_cmp_readonly['firstname'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['firstname']);
       $sStyleReadLab_firstname = '';
       $sStyleReadInp_firstname = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['firstname']) && $this->nmgp_cmp_hidden['firstname'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="firstname" value="<?php echo $this->form_encode_input($firstname) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_firstname_line" id="hidden_field_data_firstname" style="<?php echo $sStyleHidden_firstname; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_firstname_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_firstname_label"><span id="id_label_firstname"><?php echo $this->nm_new_label['firstname']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["firstname"]) &&  $this->nmgp_cmp_readonly["firstname"] == "on") { 

 ?>
<input type="hidden" name="firstname" value="<?php echo $this->form_encode_input($firstname) . "\">" . $firstname . ""; ?>
<?php } else { ?>
<span id="id_read_on_firstname" class="sc-ui-readonly-firstname css_firstname_line" style="<?php echo $sStyleReadLab_firstname; ?>"><?php echo $this->form_encode_input($this->firstname); ?></span><span id="id_read_off_firstname" style="white-space: nowrap;<?php echo $sStyleReadInp_firstname; ?>">
 <input class="sc-js-input scFormObjectOdd css_firstname_obj" style="" id="id_sc_field_firstname" type=text name="firstname" value="<?php echo $this->form_encode_input($firstname) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_firstname_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_firstname_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['lastname']))
    {
        $this->nm_new_label['lastname'] = "" . $this->Ini->Nm_lang['lang_students_fld_lastname'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lastname = $this->lastname;
   if (!isset($this->nmgp_cmp_hidden['lastname']))
   {
       $this->nmgp_cmp_hidden['lastname'] = 'off';
   }
   $sStyleHidden_lastname = '';
   if (isset($this->nmgp_cmp_hidden['lastname']) && $this->nmgp_cmp_hidden['lastname'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lastname']);
       $sStyleHidden_lastname = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lastname = 'display: none;';
   $sStyleReadInp_lastname = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lastname']) && $this->nmgp_cmp_readonly['lastname'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lastname']);
       $sStyleReadLab_lastname = '';
       $sStyleReadInp_lastname = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lastname']) && $this->nmgp_cmp_hidden['lastname'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lastname" value="<?php echo $this->form_encode_input($lastname) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_lastname_line" id="hidden_field_data_lastname" style="<?php echo $sStyleHidden_lastname; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lastname_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lastname_label"><span id="id_label_lastname"><?php echo $this->nm_new_label['lastname']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lastname"]) &&  $this->nmgp_cmp_readonly["lastname"] == "on") { 

 ?>
<input type="hidden" name="lastname" value="<?php echo $this->form_encode_input($lastname) . "\">" . $lastname . ""; ?>
<?php } else { ?>
<span id="id_read_on_lastname" class="sc-ui-readonly-lastname css_lastname_line" style="<?php echo $sStyleReadLab_lastname; ?>"><?php echo $this->form_encode_input($this->lastname); ?></span><span id="id_read_off_lastname" style="white-space: nowrap;<?php echo $sStyleReadInp_lastname; ?>">
 <input class="sc-js-input scFormObjectOdd css_lastname_obj" style="" id="id_sc_field_lastname" type=text name="lastname" value="<?php echo $this->form_encode_input($lastname) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lastname_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lastname_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['anos_cumplidos']))
    {
        $this->nm_new_label['anos_cumplidos'] = "Años Cumplidos";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['anos_cumplidos']) && $this->nmgp_cmp_hidden['anos_cumplidos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anos_cumplidos" value="<?php echo $this->form_encode_input($anos_cumplidos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anos_cumplidos_line" id="hidden_field_data_anos_cumplidos" style="<?php echo $sStyleHidden_anos_cumplidos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anos_cumplidos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anos_cumplidos_label"><span id="id_label_anos_cumplidos"><?php echo $this->nm_new_label['anos_cumplidos']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anos_cumplidos"]) &&  $this->nmgp_cmp_readonly["anos_cumplidos"] == "on") { 

 ?>
<input type="hidden" name="anos_cumplidos" value="<?php echo $this->form_encode_input($anos_cumplidos) . "\">" . $anos_cumplidos . ""; ?>
<?php } else { ?>
<span id="id_read_on_anos_cumplidos" class="sc-ui-readonly-anos_cumplidos css_anos_cumplidos_line" style="<?php echo $sStyleReadLab_anos_cumplidos; ?>"><?php echo $this->form_encode_input($this->anos_cumplidos); ?></span><span id="id_read_off_anos_cumplidos" style="white-space: nowrap;<?php echo $sStyleReadInp_anos_cumplidos; ?>">
 <input class="sc-js-input scFormObjectOdd css_anos_cumplidos_obj" style="" id="id_sc_field_anos_cumplidos" type=text name="anos_cumplidos" value="<?php echo $this->form_encode_input($anos_cumplidos) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['anos_cumplidos']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['anos_cumplidos']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anos_cumplidos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anos_cumplidos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['dpto_nacimiento']))
   {
       $this->nm_new_label['dpto_nacimiento'] = "Dpto Nacimiento";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dpto_nacimiento = $this->dpto_nacimiento;
   $sStyleHidden_dpto_nacimiento = '';
   if (isset($this->nmgp_cmp_hidden['dpto_nacimiento']) && $this->nmgp_cmp_hidden['dpto_nacimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dpto_nacimiento']);
       $sStyleHidden_dpto_nacimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dpto_nacimiento = 'display: none;';
   $sStyleReadInp_dpto_nacimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dpto_nacimiento']) && $this->nmgp_cmp_readonly['dpto_nacimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dpto_nacimiento']);
       $sStyleReadLab_dpto_nacimiento = '';
       $sStyleReadInp_dpto_nacimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dpto_nacimiento']) && $this->nmgp_cmp_hidden['dpto_nacimiento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="dpto_nacimiento" value="<?php echo $this->form_encode_input($this->dpto_nacimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dpto_nacimiento_line" id="hidden_field_data_dpto_nacimiento" style="<?php echo $sStyleHidden_dpto_nacimiento; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dpto_nacimiento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dpto_nacimiento_label"><span id="id_label_dpto_nacimiento"><?php echo $this->nm_new_label['dpto_nacimiento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dpto_nacimiento"]) &&  $this->nmgp_cmp_readonly["dpto_nacimiento"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'][] = $rs->fields[0];
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
   $dpto_nacimiento_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->dpto_nacimiento_1))
          {
              foreach ($this->dpto_nacimiento_1 as $tmp_dpto_nacimiento)
              {
                  if (trim($tmp_dpto_nacimiento) === trim($cadaselect[1])) { $dpto_nacimiento_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->dpto_nacimiento) === trim($cadaselect[1])) { $dpto_nacimiento_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="dpto_nacimiento" value="<?php echo $this->form_encode_input($dpto_nacimiento) . "\">" . $dpto_nacimiento_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'][] = $rs->fields[0];
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
   $dpto_nacimiento_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->dpto_nacimiento_1))
          {
              foreach ($this->dpto_nacimiento_1 as $tmp_dpto_nacimiento)
              {
                  if (trim($tmp_dpto_nacimiento) === trim($cadaselect[1])) { $dpto_nacimiento_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->dpto_nacimiento) === trim($cadaselect[1])) { $dpto_nacimiento_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($dpto_nacimiento_look))
          {
              $dpto_nacimiento_look = $this->dpto_nacimiento;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_dpto_nacimiento\" class=\"css_dpto_nacimiento_line\" style=\"" .  $sStyleReadLab_dpto_nacimiento . "\">" . $this->form_encode_input($dpto_nacimiento_look) . "</span><span id=\"id_read_off_dpto_nacimiento\" style=\"" . $sStyleReadInp_dpto_nacimiento . "\">";
   echo " <span id=\"idAjaxSelect_dpto_nacimiento\"><select class=\"sc-js-input scFormObjectOdd css_dpto_nacimiento_obj\" style=\"\" id=\"id_sc_field_dpto_nacimiento\" name=\"dpto_nacimiento\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->dpto_nacimiento) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->dpto_nacimiento)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dpto_nacimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dpto_nacimiento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_firstname_dumb = ('' == $sStyleHidden_firstname) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_firstname_dumb" style="<?php echo $sStyleHidden_firstname_dumb; ?>"></TD>
<?php $sStyleHidden_lastname_dumb = ('' == $sStyleHidden_lastname) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_lastname_dumb" style="<?php echo $sStyleHidden_lastname_dumb; ?>"></TD>
<?php $sStyleHidden_anos_cumplidos_dumb = ('' == $sStyleHidden_anos_cumplidos) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_anos_cumplidos_dumb" style="<?php echo $sStyleHidden_anos_cumplidos_dumb; ?>"></TD>
<?php $sStyleHidden_dpto_nacimiento_dumb = ('' == $sStyleHidden_dpto_nacimiento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dpto_nacimiento_dumb" style="<?php echo $sStyleHidden_dpto_nacimiento_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['municipio_nacimiento']))
   {
       $this->nm_new_label['municipio_nacimiento'] = "Municipio Nacimiento";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $municipio_nacimiento = $this->municipio_nacimiento;
   $sStyleHidden_municipio_nacimiento = '';
   if (isset($this->nmgp_cmp_hidden['municipio_nacimiento']) && $this->nmgp_cmp_hidden['municipio_nacimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['municipio_nacimiento']);
       $sStyleHidden_municipio_nacimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_municipio_nacimiento = 'display: none;';
   $sStyleReadInp_municipio_nacimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['municipio_nacimiento']) && $this->nmgp_cmp_readonly['municipio_nacimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['municipio_nacimiento']);
       $sStyleReadLab_municipio_nacimiento = '';
       $sStyleReadInp_municipio_nacimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['municipio_nacimiento']) && $this->nmgp_cmp_hidden['municipio_nacimiento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="municipio_nacimiento" value="<?php echo $this->form_encode_input($this->municipio_nacimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_municipio_nacimiento_line" id="hidden_field_data_municipio_nacimiento" style="<?php echo $sStyleHidden_municipio_nacimiento; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_municipio_nacimiento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_municipio_nacimiento_label"><span id="id_label_municipio_nacimiento"><?php echo $this->nm_new_label['municipio_nacimiento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["municipio_nacimiento"]) &&  $this->nmgp_cmp_readonly["municipio_nacimiento"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'] = array(); 
}
if ($this->dpto_nacimiento != "")
{ 
   $this->nm_clear_val("dpto_nacimiento");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
where iddepartamento = $this->dpto_nacimiento
ORDER BY nombreMunicipio";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'][] = $rs->fields[0];
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
   $municipio_nacimiento_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->municipio_nacimiento_1))
          {
              foreach ($this->municipio_nacimiento_1 as $tmp_municipio_nacimiento)
              {
                  if (trim($tmp_municipio_nacimiento) === trim($cadaselect[1])) { $municipio_nacimiento_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->municipio_nacimiento) === trim($cadaselect[1])) { $municipio_nacimiento_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="municipio_nacimiento" value="<?php echo $this->form_encode_input($municipio_nacimiento) . "\">" . $municipio_nacimiento_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'] = array(); 
}
if ($this->dpto_nacimiento != "")
{ 
   $this->nm_clear_val("dpto_nacimiento");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
where iddepartamento = $this->dpto_nacimiento
ORDER BY nombreMunicipio";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'][] = $rs->fields[0];
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
   $municipio_nacimiento_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->municipio_nacimiento_1))
          {
              foreach ($this->municipio_nacimiento_1 as $tmp_municipio_nacimiento)
              {
                  if (trim($tmp_municipio_nacimiento) === trim($cadaselect[1])) { $municipio_nacimiento_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->municipio_nacimiento) === trim($cadaselect[1])) { $municipio_nacimiento_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($municipio_nacimiento_look))
          {
              $municipio_nacimiento_look = $this->municipio_nacimiento;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_municipio_nacimiento\" class=\"css_municipio_nacimiento_line\" style=\"" .  $sStyleReadLab_municipio_nacimiento . "\">" . $this->form_encode_input($municipio_nacimiento_look) . "</span><span id=\"id_read_off_municipio_nacimiento\" style=\"" . $sStyleReadInp_municipio_nacimiento . "\">";
   echo " <span id=\"idAjaxSelect_municipio_nacimiento\"><select class=\"sc-js-input scFormObjectOdd css_municipio_nacimiento_obj\" style=\"\" id=\"id_sc_field_municipio_nacimiento\" name=\"municipio_nacimiento\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->municipio_nacimiento) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->municipio_nacimiento)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_municipio_nacimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_municipio_nacimiento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['observaciones']))
    {
        $this->nm_new_label['observaciones'] = "Observaciones";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $observaciones = $this->observaciones;
   $sStyleHidden_observaciones = '';
   if (isset($this->nmgp_cmp_hidden['observaciones']) && $this->nmgp_cmp_hidden['observaciones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['observaciones']);
       $sStyleHidden_observaciones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_observaciones = 'display: none;';
   $sStyleReadInp_observaciones = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['observaciones']) && $this->nmgp_cmp_readonly['observaciones'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['observaciones']);
       $sStyleReadLab_observaciones = '';
       $sStyleReadInp_observaciones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['observaciones']) && $this->nmgp_cmp_hidden['observaciones'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_observaciones_label"><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></span><br>
<?php
$observaciones_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observaciones));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->form_encode_input($observaciones_val); ?></span><span id="id_read_off_observaciones" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_observaciones_obj" style="white-space: pre-wrap;" name="observaciones" id="id_sc_field_observaciones" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $observaciones; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['login']))
    {
        $this->nm_new_label['login'] = "" . $this->Ini->Nm_lang['lang_students_fld_login'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $login = $this->login;
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

    <TD class="scFormDataOdd css_login_line" id="hidden_field_data_login" style="<?php echo $sStyleHidden_login; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_login_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_login_label"><span id="id_label_login"><?php echo $this->nm_new_label['login']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["login"]) &&  $this->nmgp_cmp_readonly["login"] == "on") { 

 ?>
<input type="hidden" name="login" value="<?php echo $this->form_encode_input($login) . "\">" . $login . ""; ?>
<?php } else { ?>
<span id="id_read_on_login" class="sc-ui-readonly-login css_login_line" style="<?php echo $sStyleReadLab_login; ?>"><?php echo $this->form_encode_input($this->login); ?></span><span id="id_read_off_login" style="white-space: nowrap;<?php echo $sStyleReadInp_login; ?>">
 <input class="sc-js-input scFormObjectOdd css_login_obj" style="" id="id_sc_field_login" type=text name="login" value="<?php echo $this->form_encode_input($login) ?>"
 size=15 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_login_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_login_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['pswd']))
    {
        $this->nm_new_label['pswd'] = "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pswd = $this->pswd;
   $sStyleHidden_pswd = '';
   if (isset($this->nmgp_cmp_hidden['pswd']) && $this->nmgp_cmp_hidden['pswd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pswd']);
       $sStyleHidden_pswd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pswd = 'display: none;';
   $sStyleReadInp_pswd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pswd']) && $this->nmgp_cmp_readonly['pswd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pswd']);
       $sStyleReadLab_pswd = '';
       $sStyleReadInp_pswd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pswd']) && $this->nmgp_cmp_hidden['pswd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pswd" value="<?php echo $this->form_encode_input($pswd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pswd_line" id="hidden_field_data_pswd" style="<?php echo $sStyleHidden_pswd; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pswd_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pswd_label"><span id="id_label_pswd"><?php echo $this->nm_new_label['pswd']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pswd"]) &&  $this->nmgp_cmp_readonly["pswd"] == "on") { ?>
<input type="hidden" name="pswd" value="">
<?php } else { ?>
<span id="id_read_on_pswd" class="sc-ui-readonly-pswd css_pswd_line" style="<?php echo $sStyleReadLab_pswd; ?>"><?php echo $this->form_encode_input($this->pswd); ?></span><span id="id_read_off_pswd" style="white-space: nowrap;<?php echo $sStyleReadInp_pswd; ?>"><input class="sc-js-input scFormObjectOdd css_pswd_obj" style="" id="id_sc_field_pswd" type=password name="pswd" value="" 
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pswd_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pswd_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_municipio_nacimiento_dumb = ('' == $sStyleHidden_municipio_nacimiento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_municipio_nacimiento_dumb" style="<?php echo $sStyleHidden_municipio_nacimiento_dumb; ?>"></TD>
<?php $sStyleHidden_observaciones_dumb = ('' == $sStyleHidden_observaciones) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_observaciones_dumb" style="<?php echo $sStyleHidden_observaciones_dumb; ?>"></TD>
<?php $sStyleHidden_login_dumb = ('' == $sStyleHidden_login) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_login_dumb" style="<?php echo $sStyleHidden_login_dumb; ?>"></TD>
<?php $sStyleHidden_pswd_dumb = ('' == $sStyleHidden_pswd) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_pswd_dumb" style="<?php echo $sStyleHidden_pswd_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['confirm_pswd']))
    {
        $this->nm_new_label['confirm_pswd'] = "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd_confirm'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $confirm_pswd = $this->confirm_pswd;
   $sStyleHidden_confirm_pswd = '';
   if (isset($this->nmgp_cmp_hidden['confirm_pswd']) && $this->nmgp_cmp_hidden['confirm_pswd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['confirm_pswd']);
       $sStyleHidden_confirm_pswd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_confirm_pswd = 'display: none;';
   $sStyleReadInp_confirm_pswd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['confirm_pswd']) && $this->nmgp_cmp_readonly['confirm_pswd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['confirm_pswd']);
       $sStyleReadLab_confirm_pswd = '';
       $sStyleReadInp_confirm_pswd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['confirm_pswd']) && $this->nmgp_cmp_hidden['confirm_pswd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="confirm_pswd" value="<?php echo $this->form_encode_input($confirm_pswd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_confirm_pswd_line" id="hidden_field_data_confirm_pswd" style="<?php echo $sStyleHidden_confirm_pswd; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_confirm_pswd_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_confirm_pswd_label"><span id="id_label_confirm_pswd"><?php echo $this->nm_new_label['confirm_pswd']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["confirm_pswd"]) &&  $this->nmgp_cmp_readonly["confirm_pswd"] == "on") { ?>
<input type="hidden" name="confirm_pswd" value="">
<?php } else { ?>
<span id="id_read_on_confirm_pswd" class="sc-ui-readonly-confirm_pswd css_confirm_pswd_line" style="<?php echo $sStyleReadLab_confirm_pswd; ?>"><?php echo $this->form_encode_input($this->confirm_pswd); ?></span><span id="id_read_off_confirm_pswd" style="white-space: nowrap;<?php echo $sStyleReadInp_confirm_pswd; ?>"><input class="sc-js-input scFormObjectOdd css_confirm_pswd_obj" style="" id="id_sc_field_confirm_pswd" type=password name="confirm_pswd" value="" 
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_confirm_pswd_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_confirm_pswd_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="3" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_confirm_pswd_dumb = ('' == $sStyleHidden_confirm_pswd) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_confirm_pswd_dumb" style="<?php echo $sStyleHidden_confirm_pswd_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="20%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>foto<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['photo']))
    {
        $this->nm_new_label['photo'] = "" . $this->Ini->Nm_lang['lang_students_fld_photo'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $photo = $this->photo;
   $sStyleHidden_photo = '';
   if (isset($this->nmgp_cmp_hidden['photo']) && $this->nmgp_cmp_hidden['photo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['photo']);
       $sStyleHidden_photo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_photo = 'display: none;';
   $sStyleReadInp_photo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['photo']) && $this->nmgp_cmp_readonly['photo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['photo']);
       $sStyleReadLab_photo = '';
       $sStyleReadInp_photo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['photo']) && $this->nmgp_cmp_hidden['photo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="photo" value="<?php echo $this->form_encode_input($photo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_photo_line" id="hidden_field_data_photo" style="<?php echo $sStyleHidden_photo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_photo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_photo_label"><span id="id_label_photo"><?php echo $this->nm_new_label['photo']; ?></span></span><br>
 <script>var var_ajax_img_photo = '<?php echo $out1_photo; ?>';</script><?php if (!empty($out_photo)){ echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_photo, '" . $this->nmgp_return_img['photo'][0] . "', '" . $this->nmgp_return_img['photo'][1] . "')\"><img id=\"id_ajax_img_photo\" border=\"0\" src=\"$out_photo\"></a> &nbsp;" . "<span id=\"txt_ajax_img_photo\" style=\"display: none\">" . $photo . "</span>"; if (!empty($photo)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_photo\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_photo\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["photo"]) &&  $this->nmgp_cmp_readonly["photo"] == "on") { 

 ?>
<img id=\"photo_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="photo" value="<?php echo $this->form_encode_input($photo) . "\">" . $photo . ""; ?>
<?php } else { ?>
<span id="id_read_off_photo" style="white-space: nowrap;<?php echo $sStyleReadInp_photo; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-photo" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_photo_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="photo[]" id="id_sc_field_photo" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<span id="chk_ajax_img_photo"<?php if ($this->nmgp_opcao == "novo" || empty($photo)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="photo_limpa" value="<?php echo $photo_limpa . '" '; if ($photo_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="photo_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_photo" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_photo" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_photo" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_photo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_photo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_photo_dumb = ('' == $sStyleHidden_photo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_photo_dumb" style="<?php echo $sStyleHidden_photo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="3" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Ubicación<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['state']))
   {
       $this->nm_new_label['state'] = "" . $this->Ini->Nm_lang['lang_students_fld_state'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $state = $this->state;
   $sStyleHidden_state = '';
   if (isset($this->nmgp_cmp_hidden['state']) && $this->nmgp_cmp_hidden['state'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['state']);
       $sStyleHidden_state = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_state = 'display: none;';
   $sStyleReadInp_state = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['state']) && $this->nmgp_cmp_readonly['state'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['state']);
       $sStyleReadLab_state = '';
       $sStyleReadInp_state = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['state']) && $this->nmgp_cmp_hidden['state'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="state" value="<?php echo $this->form_encode_input($this->state) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_state_line" id="hidden_field_data_state" style="<?php echo $sStyleHidden_state; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_state_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_state_label"><span id="id_label_state"><?php echo $this->nm_new_label['state']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["state"]) &&  $this->nmgp_cmp_readonly["state"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'][] = $rs->fields[0];
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
   $state_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->state_1))
          {
              foreach ($this->state_1 as $tmp_state)
              {
                  if (trim($tmp_state) === trim($cadaselect[1])) { $state_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->state) === trim($cadaselect[1])) { $state_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="state" value="<?php echo $this->form_encode_input($state) . "\">" . $state_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'][] = $rs->fields[0];
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
   $state_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->state_1))
          {
              foreach ($this->state_1 as $tmp_state)
              {
                  if (trim($tmp_state) === trim($cadaselect[1])) { $state_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->state) === trim($cadaselect[1])) { $state_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($state_look))
          {
              $state_look = $this->state;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_state\" class=\"css_state_line\" style=\"" .  $sStyleReadLab_state . "\">" . $this->form_encode_input($state_look) . "</span><span id=\"id_read_off_state\" style=\"" . $sStyleReadInp_state . "\">";
   echo " <span id=\"idAjaxSelect_state\"><select class=\"sc-js-input scFormObjectOdd css_state_obj\" style=\"\" id=\"id_sc_field_state\" name=\"state\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->state) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->state)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_state_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_state_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['city']))
   {
       $this->nm_new_label['city'] = "" . $this->Ini->Nm_lang['lang_students_fld_city'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $city = $this->city;
   $sStyleHidden_city = '';
   if (isset($this->nmgp_cmp_hidden['city']) && $this->nmgp_cmp_hidden['city'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['city']);
       $sStyleHidden_city = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_city = 'display: none;';
   $sStyleReadInp_city = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['city']) && $this->nmgp_cmp_readonly['city'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['city']);
       $sStyleReadLab_city = '';
       $sStyleReadInp_city = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['city']) && $this->nmgp_cmp_hidden['city'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="city" value="<?php echo $this->form_encode_input($this->city) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_city_line" id="hidden_field_data_city" style="<?php echo $sStyleHidden_city; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_city_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_city_label"><span id="id_label_city"><?php echo $this->nm_new_label['city']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["city"]) &&  $this->nmgp_cmp_readonly["city"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'] = array(); 
}
if ($this->state != "")
{ 
   $this->nm_clear_val("state");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
WHERE iddepartamento = $this->state
ORDER BY nombreMunicipio";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'][] = $rs->fields[0];
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
   $city_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->city_1))
          {
              foreach ($this->city_1 as $tmp_city)
              {
                  if (trim($tmp_city) === trim($cadaselect[1])) { $city_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->city) === trim($cadaselect[1])) { $city_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="city" value="<?php echo $this->form_encode_input($city) . "\">" . $city_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'] = array(); 
}
if ($this->state != "")
{ 
   $this->nm_clear_val("state");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
WHERE iddepartamento = $this->state
ORDER BY nombreMunicipio";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'][] = $rs->fields[0];
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
   $city_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->city_1))
          {
              foreach ($this->city_1 as $tmp_city)
              {
                  if (trim($tmp_city) === trim($cadaselect[1])) { $city_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->city) === trim($cadaselect[1])) { $city_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($city_look))
          {
              $city_look = $this->city;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_city\" class=\"css_city_line\" style=\"" .  $sStyleReadLab_city . "\">" . $this->form_encode_input($city_look) . "</span><span id=\"id_read_off_city\" style=\"" . $sStyleReadInp_city . "\">";
   echo " <span id=\"idAjaxSelect_city\"><select class=\"sc-js-input scFormObjectOdd css_city_obj\" style=\"\" id=\"id_sc_field_city\" name=\"city\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->city) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->city)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_city_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_city_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['address']))
    {
        $this->nm_new_label['address'] = "" . $this->Ini->Nm_lang['lang_students_fld_address'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $address = $this->address;
   $sStyleHidden_address = '';
   if (isset($this->nmgp_cmp_hidden['address']) && $this->nmgp_cmp_hidden['address'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['address']);
       $sStyleHidden_address = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_address = 'display: none;';
   $sStyleReadInp_address = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['address']) && $this->nmgp_cmp_readonly['address'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['address']);
       $sStyleReadLab_address = '';
       $sStyleReadInp_address = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['address']) && $this->nmgp_cmp_hidden['address'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="address" value="<?php echo $this->form_encode_input($address) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_address_line" id="hidden_field_data_address" style="<?php echo $sStyleHidden_address; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_address_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_address_label"><span id="id_label_address"><?php echo $this->nm_new_label['address']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["address"]) &&  $this->nmgp_cmp_readonly["address"] == "on") { 

 ?>
<input type="hidden" name="address" value="<?php echo $this->form_encode_input($address) . "\">" . $address . ""; ?>
<?php } else { ?>
<span id="id_read_on_address" class="sc-ui-readonly-address css_address_line" style="<?php echo $sStyleReadLab_address; ?>"><?php echo $this->form_encode_input($this->address); ?></span><span id="id_read_off_address" style="white-space: nowrap;<?php echo $sStyleReadInp_address; ?>">
 <input class="sc-js-input scFormObjectOdd css_address_obj" style="" id="id_sc_field_address" type=text name="address" value="<?php echo $this->form_encode_input($address) ?>"
 size=45 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_address_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_address_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_state_dumb = ('' == $sStyleHidden_state) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_state_dumb" style="<?php echo $sStyleHidden_state_dumb; ?>"></TD>
<?php $sStyleHidden_city_dumb = ('' == $sStyleHidden_city) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_city_dumb" style="<?php echo $sStyleHidden_city_dumb; ?>"></TD>
<?php $sStyleHidden_address_dumb = ('' == $sStyleHidden_address) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_address_dumb" style="<?php echo $sStyleHidden_address_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['barrio']))
    {
        $this->nm_new_label['barrio'] = "Barrio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $barrio = $this->barrio;
   $sStyleHidden_barrio = '';
   if (isset($this->nmgp_cmp_hidden['barrio']) && $this->nmgp_cmp_hidden['barrio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['barrio']);
       $sStyleHidden_barrio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_barrio = 'display: none;';
   $sStyleReadInp_barrio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['barrio']) && $this->nmgp_cmp_readonly['barrio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['barrio']);
       $sStyleReadLab_barrio = '';
       $sStyleReadInp_barrio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['barrio']) && $this->nmgp_cmp_hidden['barrio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="barrio" value="<?php echo $this->form_encode_input($barrio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_barrio_line" id="hidden_field_data_barrio" style="<?php echo $sStyleHidden_barrio; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_barrio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_barrio_label"><span id="id_label_barrio"><?php echo $this->nm_new_label['barrio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["barrio"]) &&  $this->nmgp_cmp_readonly["barrio"] == "on") { 

 ?>
<input type="hidden" name="barrio" value="<?php echo $this->form_encode_input($barrio) . "\">" . $barrio . ""; ?>
<?php } else { ?>
<span id="id_read_on_barrio" class="sc-ui-readonly-barrio css_barrio_line" style="<?php echo $sStyleReadLab_barrio; ?>"><?php echo $this->form_encode_input($this->barrio); ?></span><span id="id_read_off_barrio" style="white-space: nowrap;<?php echo $sStyleReadInp_barrio; ?>">
 <input class="sc-js-input scFormObjectOdd css_barrio_obj" style="" id="id_sc_field_barrio" type=text name="barrio" value="<?php echo $this->form_encode_input($barrio) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_barrio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_barrio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['postalcode']))
    {
        $this->nm_new_label['postalcode'] = "" . $this->Ini->Nm_lang['lang_students_fld_postalcode'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $postalcode = $this->postalcode;
   if (!isset($this->nmgp_cmp_hidden['postalcode']))
   {
       $this->nmgp_cmp_hidden['postalcode'] = 'off';
   }
   $sStyleHidden_postalcode = '';
   if (isset($this->nmgp_cmp_hidden['postalcode']) && $this->nmgp_cmp_hidden['postalcode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['postalcode']);
       $sStyleHidden_postalcode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_postalcode = 'display: none;';
   $sStyleReadInp_postalcode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['postalcode']) && $this->nmgp_cmp_readonly['postalcode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['postalcode']);
       $sStyleReadLab_postalcode = '';
       $sStyleReadInp_postalcode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['postalcode']) && $this->nmgp_cmp_hidden['postalcode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="postalcode" value="<?php echo $this->form_encode_input($postalcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_postalcode_line" id="hidden_field_data_postalcode" style="<?php echo $sStyleHidden_postalcode; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_postalcode_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_postalcode_label"><span id="id_label_postalcode"><?php echo $this->nm_new_label['postalcode']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["postalcode"]) &&  $this->nmgp_cmp_readonly["postalcode"] == "on") { 

 ?>
<input type="hidden" name="postalcode" value="<?php echo $this->form_encode_input($postalcode) . "\">" . $postalcode . ""; ?>
<?php } else { ?>
<span id="id_read_on_postalcode" class="sc-ui-readonly-postalcode css_postalcode_line" style="<?php echo $sStyleReadLab_postalcode; ?>"><?php echo $this->form_encode_input($this->postalcode); ?></span><span id="id_read_off_postalcode" style="white-space: nowrap;<?php echo $sStyleReadInp_postalcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_postalcode_obj" style="" id="id_sc_field_postalcode" type=text name="postalcode" value="<?php echo $this->form_encode_input($postalcode) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_postalcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_postalcode_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['zona']))
    {
        $this->nm_new_label['zona'] = "Zona";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['zona']) && $this->nmgp_cmp_hidden['zona'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="zona" value="<?php echo $this->form_encode_input($zona) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_zona_line" id="hidden_field_data_zona" style="<?php echo $sStyleHidden_zona; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zona_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_zona_label"><span id="id_label_zona"><?php echo $this->nm_new_label['zona']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zona"]) &&  $this->nmgp_cmp_readonly["zona"] == "on") { 

 if ("Rural" == $this->zona) { $zona_look = "Rural";} 
 if ("Urbana" == $this->zona) { $zona_look = "Urbana";} 
?>
<input type="hidden" name="zona" value="<?php echo $this->form_encode_input($zona) . "\">" . $zona_look . ""; ?>
<?php } else { ?>

<?php

 if ("Rural" == $this->zona) { $zona_look = "Rural";} 
 if ("Urbana" == $this->zona) { $zona_look = "Urbana";} 
?>
<span id="id_read_on_zona"  class="css_zona_line" style="<?php echo $sStyleReadLab_zona; ?>"><?php echo $this->form_encode_input($zona_look); ?></span><span id="id_read_off_zona" style="<?php echo $sStyleReadInp_zona; ?>"><div id="idAjaxRadio_zona" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_zona_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="zona" value="Rural"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_zona'][] = 'Rural'; ?>
<?php  if ("Rural" == $this->zona)  { echo " checked" ;} ?>  onClick="" >Rural</TD>
  <TD class="scFormDataFontOdd css_zona_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="zona" value="Urbana"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_zona'][] = 'Urbana'; ?>
<?php  if ("Urbana" == $this->zona)  { echo " checked" ;} ?>  onClick="" >Urbana</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zona_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zona_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_barrio_dumb = ('' == $sStyleHidden_barrio) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_barrio_dumb" style="<?php echo $sStyleHidden_barrio_dumb; ?>"></TD>
<?php $sStyleHidden_postalcode_dumb = ('' == $sStyleHidden_postalcode) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_postalcode_dumb" style="<?php echo $sStyleHidden_postalcode_dumb; ?>"></TD>
<?php $sStyleHidden_zona_dumb = ('' == $sStyleHidden_zona) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_zona_dumb" style="<?php echo $sStyleHidden_zona_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telefono']))
    {
        $this->nm_new_label['telefono'] = "Telefono";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['telefono']) && $this->nmgp_cmp_hidden['telefono'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefono" value="<?php echo $this->form_encode_input($telefono) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_telefono_line" id="hidden_field_data_telefono" style="<?php echo $sStyleHidden_telefono; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telefono_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_telefono_label"><span id="id_label_telefono"><?php echo $this->nm_new_label['telefono']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefono"]) &&  $this->nmgp_cmp_readonly["telefono"] == "on") { 

 ?>
<input type="hidden" name="telefono" value="<?php echo $this->form_encode_input($telefono) . "\">" . $telefono . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefono" class="sc-ui-readonly-telefono css_telefono_line" style="<?php echo $sStyleReadLab_telefono; ?>"><?php echo $this->form_encode_input($this->telefono); ?></span><span id="id_read_off_telefono" style="white-space: nowrap;<?php echo $sStyleReadInp_telefono; ?>">
 <input class="sc-js-input scFormObjectOdd css_telefono_obj" style="" id="id_sc_field_telefono" type=text name="telefono" value="<?php echo $this->form_encode_input($telefono) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefono_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefono_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = "" . $this->Ini->Nm_lang['lang_students_fld_email'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email = $this->email;
   $sStyleHidden_email = '';
   if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email']);
       $sStyleHidden_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email = 'display: none;';
   $sStyleReadInp_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email']) && $this->nmgp_cmp_readonly['email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email']);
       $sStyleReadLab_email = '';
       $sStyleReadInp_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_email_line" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_email_label"><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email"]) &&  $this->nmgp_cmp_readonly["email"] == "on") { 

 ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">" . $email . ""; ?>
<?php } else { ?>
<span id="id_read_on_email" class="sc-ui-readonly-email css_email_line" style="<?php echo $sStyleReadLab_email; ?>"><?php echo $this->form_encode_input($this->email); ?></span><span id="id_read_off_email" style="white-space: nowrap;<?php echo $sStyleReadInp_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_email_obj" style="" id="id_sc_field_email" type=text name="email" value="<?php echo $this->form_encode_input($email) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_telefono_dumb = ('' == $sStyleHidden_telefono) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_telefono_dumb" style="<?php echo $sStyleHidden_telefono_dumb; ?>"></TD>
<?php $sStyleHidden_email_dumb = ('' == $sStyleHidden_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_email_dumb" style="<?php echo $sStyleHidden_email_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf3\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Información Académica<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_sede']))
   {
       $this->nm_new_label['id_sede'] = "Sede";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_sede = $this->id_sede;
   $sStyleHidden_id_sede = '';
   if (isset($this->nmgp_cmp_hidden['id_sede']) && $this->nmgp_cmp_hidden['id_sede'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_sede']);
       $sStyleHidden_id_sede = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_sede = 'display: none;';
   $sStyleReadInp_id_sede = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_sede']) && $this->nmgp_cmp_readonly['id_sede'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_sede']);
       $sStyleReadLab_id_sede = '';
       $sStyleReadInp_id_sede = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_sede']) && $this->nmgp_cmp_hidden['id_sede'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_sede" value="<?php echo $this->form_encode_input($this->id_sede) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_sede_line" id="hidden_field_data_id_sede" style="<?php echo $sStyleHidden_id_sede; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_sede_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_sede_label"><span id="id_label_id_sede"><?php echo $this->nm_new_label['id_sede']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_sede"]) &&  $this->nmgp_cmp_readonly["id_sede"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_sede, sede 
FROM sedes 
ORDER BY id_sede";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'][] = $rs->fields[0];
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
   $id_sede_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_sede_1))
          {
              foreach ($this->id_sede_1 as $tmp_id_sede)
              {
                  if (trim($tmp_id_sede) === trim($cadaselect[1])) { $id_sede_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_sede) === trim($cadaselect[1])) { $id_sede_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_sede" value="<?php echo $this->form_encode_input($id_sede) . "\">" . $id_sede_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_sede, sede 
FROM sedes 
ORDER BY id_sede";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'][] = $rs->fields[0];
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
   $id_sede_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_sede_1))
          {
              foreach ($this->id_sede_1 as $tmp_id_sede)
              {
                  if (trim($tmp_id_sede) === trim($cadaselect[1])) { $id_sede_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_sede) === trim($cadaselect[1])) { $id_sede_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_sede_look))
          {
              $id_sede_look = $this->id_sede;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_sede\" class=\"css_id_sede_line\" style=\"" .  $sStyleReadLab_id_sede . "\">" . $this->form_encode_input($id_sede_look) . "</span><span id=\"id_read_off_id_sede\" style=\"" . $sStyleReadInp_id_sede . "\">";
   echo " <span id=\"idAjaxSelect_id_sede\"><select class=\"sc-js-input scFormObjectOdd css_id_sede_obj\" style=\"\" id=\"id_sc_field_id_sede\" name=\"id_sede\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_sede) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_sede)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_sede_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_sede_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['id_jornada']))
   {
       $this->nm_new_label['id_jornada'] = "Jornada";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_jornada = $this->id_jornada;
   $sStyleHidden_id_jornada = '';
   if (isset($this->nmgp_cmp_hidden['id_jornada']) && $this->nmgp_cmp_hidden['id_jornada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_jornada']);
       $sStyleHidden_id_jornada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_jornada = 'display: none;';
   $sStyleReadInp_id_jornada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_jornada']) && $this->nmgp_cmp_readonly['id_jornada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_jornada']);
       $sStyleReadLab_id_jornada = '';
       $sStyleReadInp_id_jornada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_jornada']) && $this->nmgp_cmp_hidden['id_jornada'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_jornada" value="<?php echo $this->form_encode_input($this->id_jornada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_jornada_line" id="hidden_field_data_id_jornada" style="<?php echo $sStyleHidden_id_jornada; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_jornada_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_jornada_label"><span id="id_label_id_jornada"><?php echo $this->nm_new_label['id_jornada']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_jornada"]) &&  $this->nmgp_cmp_readonly["id_jornada"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_jornada, jornada 
FROM jornadas 
ORDER BY id_jornada";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'][] = $rs->fields[0];
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
   $id_jornada_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_jornada_1))
          {
              foreach ($this->id_jornada_1 as $tmp_id_jornada)
              {
                  if (trim($tmp_id_jornada) === trim($cadaselect[1])) { $id_jornada_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_jornada) === trim($cadaselect[1])) { $id_jornada_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_jornada" value="<?php echo $this->form_encode_input($id_jornada) . "\">" . $id_jornada_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_jornada, jornada 
FROM jornadas 
ORDER BY id_jornada";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'][] = $rs->fields[0];
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
   $id_jornada_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_jornada_1))
          {
              foreach ($this->id_jornada_1 as $tmp_id_jornada)
              {
                  if (trim($tmp_id_jornada) === trim($cadaselect[1])) { $id_jornada_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_jornada) === trim($cadaselect[1])) { $id_jornada_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_jornada_look))
          {
              $id_jornada_look = $this->id_jornada;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_jornada\" class=\"css_id_jornada_line\" style=\"" .  $sStyleReadLab_id_jornada . "\">" . $this->form_encode_input($id_jornada_look) . "</span><span id=\"id_read_off_id_jornada\" style=\"" . $sStyleReadInp_id_jornada . "\">";
   echo " <span id=\"idAjaxSelect_id_jornada\"><select class=\"sc-js-input scFormObjectOdd css_id_jornada_obj\" style=\"\" id=\"id_sc_field_id_jornada\" name=\"id_jornada\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_jornada) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_jornada)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_jornada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_jornada_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['id_nivel']))
   {
       $this->nm_new_label['id_nivel'] = "Nivel";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_nivel = $this->id_nivel;
   $sStyleHidden_id_nivel = '';
   if (isset($this->nmgp_cmp_hidden['id_nivel']) && $this->nmgp_cmp_hidden['id_nivel'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_nivel']);
       $sStyleHidden_id_nivel = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_nivel = 'display: none;';
   $sStyleReadInp_id_nivel = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_nivel']) && $this->nmgp_cmp_readonly['id_nivel'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_nivel']);
       $sStyleReadLab_id_nivel = '';
       $sStyleReadInp_id_nivel = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_nivel']) && $this->nmgp_cmp_hidden['id_nivel'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_nivel" value="<?php echo $this->form_encode_input($this->id_nivel) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_nivel_line" id="hidden_field_data_id_nivel" style="<?php echo $sStyleHidden_id_nivel; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_nivel_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_nivel_label"><span id="id_label_id_nivel"><?php echo $this->nm_new_label['id_nivel']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_nivel"]) &&  $this->nmgp_cmp_readonly["id_nivel"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_nivel, nivel 
FROM niveles 
ORDER BY id_nivel";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'][] = $rs->fields[0];
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
   $id_nivel_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_nivel_1))
          {
              foreach ($this->id_nivel_1 as $tmp_id_nivel)
              {
                  if (trim($tmp_id_nivel) === trim($cadaselect[1])) { $id_nivel_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_nivel) === trim($cadaselect[1])) { $id_nivel_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_nivel" value="<?php echo $this->form_encode_input($id_nivel) . "\">" . $id_nivel_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_nivel, nivel 
FROM niveles 
ORDER BY id_nivel";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'][] = $rs->fields[0];
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
   $id_nivel_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_nivel_1))
          {
              foreach ($this->id_nivel_1 as $tmp_id_nivel)
              {
                  if (trim($tmp_id_nivel) === trim($cadaselect[1])) { $id_nivel_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_nivel) === trim($cadaselect[1])) { $id_nivel_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_nivel_look))
          {
              $id_nivel_look = $this->id_nivel;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_nivel\" class=\"css_id_nivel_line\" style=\"" .  $sStyleReadLab_id_nivel . "\">" . $this->form_encode_input($id_nivel_look) . "</span><span id=\"id_read_off_id_nivel\" style=\"" . $sStyleReadInp_id_nivel . "\">";
   echo " <span id=\"idAjaxSelect_id_nivel\"><select class=\"sc-js-input scFormObjectOdd css_id_nivel_obj\" style=\"\" id=\"id_sc_field_id_nivel\" name=\"id_nivel\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_nivel) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_nivel)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_nivel_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_nivel_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['grado_igreso']))
   {
       $this->nm_new_label['grado_igreso'] = "Grado Ingreso";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $grado_igreso = $this->grado_igreso;
   $sStyleHidden_grado_igreso = '';
   if (isset($this->nmgp_cmp_hidden['grado_igreso']) && $this->nmgp_cmp_hidden['grado_igreso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['grado_igreso']);
       $sStyleHidden_grado_igreso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_grado_igreso = 'display: none;';
   $sStyleReadInp_grado_igreso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['grado_igreso']) && $this->nmgp_cmp_readonly['grado_igreso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['grado_igreso']);
       $sStyleReadLab_grado_igreso = '';
       $sStyleReadInp_grado_igreso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['grado_igreso']) && $this->nmgp_cmp_hidden['grado_igreso'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="grado_igreso" value="<?php echo $this->form_encode_input($this->grado_igreso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_grado_igreso_line" id="hidden_field_data_grado_igreso" style="<?php echo $sStyleHidden_grado_igreso; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_grado_igreso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_grado_igreso_label"><span id="id_label_grado_igreso"><?php echo $this->nm_new_label['grado_igreso']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["grado_igreso"]) &&  $this->nmgp_cmp_readonly["grado_igreso"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'] = array(); 
}
if ($this->id_nivel != "")
{ 
   $this->nm_clear_val("id_nivel");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
WHERE id_nivel = $this->id_nivel
ORDER BY  id_grado";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'][] = $rs->fields[0];
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
   $grado_igreso_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grado_igreso_1))
          {
              foreach ($this->grado_igreso_1 as $tmp_grado_igreso)
              {
                  if (trim($tmp_grado_igreso) === trim($cadaselect[1])) { $grado_igreso_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grado_igreso) === trim($cadaselect[1])) { $grado_igreso_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="grado_igreso" value="<?php echo $this->form_encode_input($grado_igreso) . "\">" . $grado_igreso_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'] = array(); 
}
if ($this->id_nivel != "")
{ 
   $this->nm_clear_val("id_nivel");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
WHERE id_nivel = $this->id_nivel
ORDER BY  id_grado";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'][] = $rs->fields[0];
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
   $grado_igreso_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grado_igreso_1))
          {
              foreach ($this->grado_igreso_1 as $tmp_grado_igreso)
              {
                  if (trim($tmp_grado_igreso) === trim($cadaselect[1])) { $grado_igreso_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grado_igreso) === trim($cadaselect[1])) { $grado_igreso_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($grado_igreso_look))
          {
              $grado_igreso_look = $this->grado_igreso;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_grado_igreso\" class=\"css_grado_igreso_line\" style=\"" .  $sStyleReadLab_grado_igreso . "\">" . $this->form_encode_input($grado_igreso_look) . "</span><span id=\"id_read_off_grado_igreso\" style=\"" . $sStyleReadInp_grado_igreso . "\">";
   echo " <span id=\"idAjaxSelect_grado_igreso\"><select class=\"sc-js-input scFormObjectOdd css_grado_igreso_obj\" style=\"\" id=\"id_sc_field_grado_igreso\" name=\"grado_igreso\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->grado_igreso) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->grado_igreso)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_grado_igreso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_grado_igreso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_id_sede_dumb = ('' == $sStyleHidden_id_sede) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_id_sede_dumb" style="<?php echo $sStyleHidden_id_sede_dumb; ?>"></TD>
<?php $sStyleHidden_id_jornada_dumb = ('' == $sStyleHidden_id_jornada) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_id_jornada_dumb" style="<?php echo $sStyleHidden_id_jornada_dumb; ?>"></TD>
<?php $sStyleHidden_id_nivel_dumb = ('' == $sStyleHidden_id_nivel) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_id_nivel_dumb" style="<?php echo $sStyleHidden_id_nivel_dumb; ?>"></TD>
<?php $sStyleHidden_grado_igreso_dumb = ('' == $sStyleHidden_grado_igreso) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_grado_igreso_dumb" style="<?php echo $sStyleHidden_grado_igreso_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_grupo']))
   {
       $this->nm_new_label['id_grupo'] = "Grupo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_grupo = $this->id_grupo;
   $sStyleHidden_id_grupo = '';
   if (isset($this->nmgp_cmp_hidden['id_grupo']) && $this->nmgp_cmp_hidden['id_grupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_grupo']);
       $sStyleHidden_id_grupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_grupo = 'display: none;';
   $sStyleReadInp_id_grupo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_grupo']) && $this->nmgp_cmp_readonly['id_grupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_grupo']);
       $sStyleReadLab_id_grupo = '';
       $sStyleReadInp_id_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_grupo']) && $this->nmgp_cmp_hidden['id_grupo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_grupo" value="<?php echo $this->form_encode_input($this->id_grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_grupo_line" id="hidden_field_data_id_grupo" style="<?php echo $sStyleHidden_id_grupo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_grupo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_grupo_label"><span id="id_label_id_grupo"><?php echo $this->nm_new_label['id_grupo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_grupo"]) &&  $this->nmgp_cmp_readonly["id_grupo"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'] = array(); 
}
if ($this->grado_igreso != "")
{ 
   $this->nm_clear_val("grado_igreso");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_grupo, nombre_grupo 
FROM t_grupos 
WHERE id_grado = $this->grado_igreso AND entorno = '" . $_SESSION['entorno'] . "'
ORDER BY nombre_grupo";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'][] = $rs->fields[0];
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
   $id_grupo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_grupo_1))
          {
              foreach ($this->id_grupo_1 as $tmp_id_grupo)
              {
                  if (trim($tmp_id_grupo) === trim($cadaselect[1])) { $id_grupo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_grupo) === trim($cadaselect[1])) { $id_grupo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_grupo" value="<?php echo $this->form_encode_input($id_grupo) . "\">" . $id_grupo_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'] = array(); 
}
if ($this->grado_igreso != "")
{ 
   $this->nm_clear_val("grado_igreso");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_grupo, nombre_grupo 
FROM t_grupos 
WHERE id_grado = $this->grado_igreso AND entorno = '" . $_SESSION['entorno'] . "'
ORDER BY nombre_grupo";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'][] = $rs->fields[0];
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
   $id_grupo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_grupo_1))
          {
              foreach ($this->id_grupo_1 as $tmp_id_grupo)
              {
                  if (trim($tmp_id_grupo) === trim($cadaselect[1])) { $id_grupo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_grupo) === trim($cadaselect[1])) { $id_grupo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_grupo_look))
          {
              $id_grupo_look = $this->id_grupo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_grupo\" class=\"css_id_grupo_line\" style=\"" .  $sStyleReadLab_id_grupo . "\">" . $this->form_encode_input($id_grupo_look) . "</span><span id=\"id_read_off_id_grupo\" style=\"" . $sStyleReadInp_id_grupo . "\">";
   echo " <span id=\"idAjaxSelect_id_grupo\"><select class=\"sc-js-input scFormObjectOdd css_id_grupo_obj\" style=\"\" id=\"id_sc_field_id_grupo\" name=\"id_grupo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_grupo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_grupo)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_grupo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_grupo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['grado_anterior']))
   {
       $this->nm_new_label['grado_anterior'] = "Grado Anterior";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $grado_anterior = $this->grado_anterior;
   $sStyleHidden_grado_anterior = '';
   if (isset($this->nmgp_cmp_hidden['grado_anterior']) && $this->nmgp_cmp_hidden['grado_anterior'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['grado_anterior']);
       $sStyleHidden_grado_anterior = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_grado_anterior = 'display: none;';
   $sStyleReadInp_grado_anterior = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['grado_anterior']) && $this->nmgp_cmp_readonly['grado_anterior'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['grado_anterior']);
       $sStyleReadLab_grado_anterior = '';
       $sStyleReadInp_grado_anterior = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['grado_anterior']) && $this->nmgp_cmp_hidden['grado_anterior'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="grado_anterior" value="<?php echo $this->form_encode_input($this->grado_anterior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_grado_anterior_line" id="hidden_field_data_grado_anterior" style="<?php echo $sStyleHidden_grado_anterior; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_grado_anterior_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_grado_anterior_label"><span id="id_label_grado_anterior"><?php echo $this->nm_new_label['grado_anterior']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["grado_anterior"]) &&  $this->nmgp_cmp_readonly["grado_anterior"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
ORDER BY  id_grado";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'][] = $rs->fields[0];
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
   $grado_anterior_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grado_anterior_1))
          {
              foreach ($this->grado_anterior_1 as $tmp_grado_anterior)
              {
                  if (trim($tmp_grado_anterior) === trim($cadaselect[1])) { $grado_anterior_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grado_anterior) === trim($cadaselect[1])) { $grado_anterior_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="grado_anterior" value="<?php echo $this->form_encode_input($grado_anterior) . "\">" . $grado_anterior_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'] = array(); 
    }

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
ORDER BY  id_grado";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'][] = $rs->fields[0];
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
   $grado_anterior_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grado_anterior_1))
          {
              foreach ($this->grado_anterior_1 as $tmp_grado_anterior)
              {
                  if (trim($tmp_grado_anterior) === trim($cadaselect[1])) { $grado_anterior_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grado_anterior) === trim($cadaselect[1])) { $grado_anterior_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($grado_anterior_look))
          {
              $grado_anterior_look = $this->grado_anterior;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_grado_anterior\" class=\"css_grado_anterior_line\" style=\"" .  $sStyleReadLab_grado_anterior . "\">" . $this->form_encode_input($grado_anterior_look) . "</span><span id=\"id_read_off_grado_anterior\" style=\"" . $sStyleReadInp_grado_anterior . "\">";
   echo " <span id=\"idAjaxSelect_grado_anterior\"><select class=\"sc-js-input scFormObjectOdd css_grado_anterior_obj\" style=\"\" id=\"id_sc_field_grado_anterior\" name=\"grado_anterior\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->grado_anterior) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->grado_anterior)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_grado_anterior_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_grado_anterior_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['last_year']))
    {
        $this->nm_new_label['last_year'] = "Ultimo Año";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $last_year = $this->last_year;
   $sStyleHidden_last_year = '';
   if (isset($this->nmgp_cmp_hidden['last_year']) && $this->nmgp_cmp_hidden['last_year'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['last_year']);
       $sStyleHidden_last_year = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_last_year = 'display: none;';
   $sStyleReadInp_last_year = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['last_year']) && $this->nmgp_cmp_readonly['last_year'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['last_year']);
       $sStyleReadLab_last_year = '';
       $sStyleReadInp_last_year = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['last_year']) && $this->nmgp_cmp_hidden['last_year'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="last_year" value="<?php echo $this->form_encode_input($last_year) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_last_year_line" id="hidden_field_data_last_year" style="<?php echo $sStyleHidden_last_year; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_last_year_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_last_year_label"><span id="id_label_last_year"><?php echo $this->nm_new_label['last_year']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["last_year"]) &&  $this->nmgp_cmp_readonly["last_year"] == "on") { 

 ?>
<input type="hidden" name="last_year" value="<?php echo $this->form_encode_input($last_year) . "\">" . $last_year . ""; ?>
<?php } else { ?>
<span id="id_read_on_last_year" class="sc-ui-readonly-last_year css_last_year_line" style="<?php echo $sStyleReadLab_last_year; ?>"><?php echo $this->form_encode_input($last_year); ?></span><span id="id_read_off_last_year" style="white-space: nowrap;<?php echo $sStyleReadInp_last_year; ?>">
 <input class="sc-js-input scFormObjectOdd css_last_year_obj" style="" id="id_sc_field_last_year" type=text name="last_year" value="<?php echo $this->form_encode_input($last_year) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['last_year']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['last_year']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['last_year']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_last_year_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_last_year_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['nombre_ult_plantel']))
    {
        $this->nm_new_label['nombre_ult_plantel'] = "Nombre Ult Plantel";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_ult_plantel = $this->nombre_ult_plantel;
   $sStyleHidden_nombre_ult_plantel = '';
   if (isset($this->nmgp_cmp_hidden['nombre_ult_plantel']) && $this->nmgp_cmp_hidden['nombre_ult_plantel'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_ult_plantel']);
       $sStyleHidden_nombre_ult_plantel = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_ult_plantel = 'display: none;';
   $sStyleReadInp_nombre_ult_plantel = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_ult_plantel']) && $this->nmgp_cmp_readonly['nombre_ult_plantel'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_ult_plantel']);
       $sStyleReadLab_nombre_ult_plantel = '';
       $sStyleReadInp_nombre_ult_plantel = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_ult_plantel']) && $this->nmgp_cmp_hidden['nombre_ult_plantel'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_ult_plantel" value="<?php echo $this->form_encode_input($nombre_ult_plantel) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_ult_plantel_line" id="hidden_field_data_nombre_ult_plantel" style="<?php echo $sStyleHidden_nombre_ult_plantel; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_ult_plantel_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre_ult_plantel_label"><span id="id_label_nombre_ult_plantel"><?php echo $this->nm_new_label['nombre_ult_plantel']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_ult_plantel"]) &&  $this->nmgp_cmp_readonly["nombre_ult_plantel"] == "on") { 

 ?>
<input type="hidden" name="nombre_ult_plantel" value="<?php echo $this->form_encode_input($nombre_ult_plantel) . "\">" . $nombre_ult_plantel . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_ult_plantel" class="sc-ui-readonly-nombre_ult_plantel css_nombre_ult_plantel_line" style="<?php echo $sStyleReadLab_nombre_ult_plantel; ?>"><?php echo $this->form_encode_input($this->nombre_ult_plantel); ?></span><span id="id_read_off_nombre_ult_plantel" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_ult_plantel; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_ult_plantel_obj" style="" id="id_sc_field_nombre_ult_plantel" type=text name="nombre_ult_plantel" value="<?php echo $this->form_encode_input($nombre_ult_plantel) ?>"
 size=50 maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_ult_plantel_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_ult_plantel_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_id_grupo_dumb = ('' == $sStyleHidden_id_grupo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_id_grupo_dumb" style="<?php echo $sStyleHidden_id_grupo_dumb; ?>"></TD>
<?php $sStyleHidden_grado_anterior_dumb = ('' == $sStyleHidden_grado_anterior) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_grado_anterior_dumb" style="<?php echo $sStyleHidden_grado_anterior_dumb; ?>"></TD>
<?php $sStyleHidden_last_year_dumb = ('' == $sStyleHidden_last_year) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_last_year_dumb" style="<?php echo $sStyleHidden_last_year_dumb; ?>"></TD>
<?php $sStyleHidden_nombre_ult_plantel_dumb = ('' == $sStyleHidden_nombre_ult_plantel) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_nombre_ult_plantel_dumb" style="<?php echo $sStyleHidden_nombre_ult_plantel_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['resultado']))
   {
       $this->nm_new_label['resultado'] = "Resultado";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resultado = $this->resultado;
   $sStyleHidden_resultado = '';
   if (isset($this->nmgp_cmp_hidden['resultado']) && $this->nmgp_cmp_hidden['resultado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resultado']);
       $sStyleHidden_resultado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resultado = 'display: none;';
   $sStyleReadInp_resultado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resultado']) && $this->nmgp_cmp_readonly['resultado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resultado']);
       $sStyleReadLab_resultado = '';
       $sStyleReadInp_resultado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resultado']) && $this->nmgp_cmp_hidden['resultado'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="resultado" value="<?php echo $this->form_encode_input($this->resultado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_resultado_line" id="hidden_field_data_resultado" style="<?php echo $sStyleHidden_resultado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resultado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_resultado_label"><span id="id_label_resultado"><?php echo $this->nm_new_label['resultado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resultado"]) &&  $this->nmgp_cmp_readonly["resultado"] == "on") { 

$resultado_look = "";
 if ($this->resultado == "A") { $resultado_look .= "Aprobado" ;} 
 if ($this->resultado == "R") { $resultado_look .= "Reprobado" ;} 
 if ($this->resultado == "D") { $resultado_look .= "Desertó" ;} 
 if (empty($resultado_look)) { $resultado_look = $this->resultado; }
?>
<input type="hidden" name="resultado" value="<?php echo $this->form_encode_input($resultado) . "\">" . $resultado_look . ""; ?>
<?php } else { ?>
<?php

$resultado_look = "";
 if ($this->resultado == "A") { $resultado_look .= "Aprobado" ;} 
 if ($this->resultado == "R") { $resultado_look .= "Reprobado" ;} 
 if ($this->resultado == "D") { $resultado_look .= "Desertó" ;} 
 if (empty($resultado_look)) { $resultado_look = $this->resultado; }
?>
<span id="id_read_on_resultado" class="css_resultado_line"  style="<?php echo $sStyleReadLab_resultado; ?>"><?php echo $this->form_encode_input($resultado_look); ?></span><span id="id_read_off_resultado" style="<?php echo $sStyleReadInp_resultado; ?>">
 <span id="idAjaxSelect_resultado"><select class="sc-js-input scFormObjectOdd css_resultado_obj" style="" id="id_sc_field_resultado" name="resultado" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_resultado'][] = 'null'; ?>
 <option value="null">Seleccione</option>
 <option value="A" <?php  if ($this->resultado == "A") { echo " selected" ;} ?>>Aprobado</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_resultado'][] = 'A'; ?>
 <option value="R" <?php  if ($this->resultado == "R") { echo " selected" ;} ?>>Reprobado</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_resultado'][] = 'R'; ?>
 <option value="D" <?php  if ($this->resultado == "D") { echo " selected" ;} ?>>Desertó</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_resultado'][] = 'D'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resultado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resultado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['subsidado']))
    {
        $this->nm_new_label['subsidado'] = "Subsidiado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $subsidado = $this->subsidado;
   $sStyleHidden_subsidado = '';
   if (isset($this->nmgp_cmp_hidden['subsidado']) && $this->nmgp_cmp_hidden['subsidado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['subsidado']);
       $sStyleHidden_subsidado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_subsidado = 'display: none;';
   $sStyleReadInp_subsidado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['subsidado']) && $this->nmgp_cmp_readonly['subsidado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['subsidado']);
       $sStyleReadLab_subsidado = '';
       $sStyleReadInp_subsidado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['subsidado']) && $this->nmgp_cmp_hidden['subsidado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="subsidado" value="<?php echo $this->form_encode_input($subsidado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_subsidado_line" id="hidden_field_data_subsidado" style="<?php echo $sStyleHidden_subsidado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_subsidado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_subsidado_label"><span id="id_label_subsidado"><?php echo $this->nm_new_label['subsidado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["subsidado"]) &&  $this->nmgp_cmp_readonly["subsidado"] == "on") { 

 if ("Y" == $this->subsidado) { $subsidado_look = "Si";} 
 if ("N" == $this->subsidado) { $subsidado_look = "No";} 
?>
<input type="hidden" name="subsidado" value="<?php echo $this->form_encode_input($subsidado) . "\">" . $subsidado_look . ""; ?>
<?php } else { ?>

<?php

 if ("Y" == $this->subsidado) { $subsidado_look = "Si";} 
 if ("N" == $this->subsidado) { $subsidado_look = "No";} 
?>
<span id="id_read_on_subsidado"  class="css_subsidado_line" style="<?php echo $sStyleReadLab_subsidado; ?>"><?php echo $this->form_encode_input($subsidado_look); ?></span><span id="id_read_off_subsidado" style="<?php echo $sStyleReadInp_subsidado; ?>"><div id="idAjaxRadio_subsidado" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_subsidado_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="subsidado" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_subsidado'][] = 'Y'; ?>
<?php  if ("Y" == $this->subsidado)  { echo " checked" ;} ?>  onClick="" >Si</TD>
  <TD class="scFormDataFontOdd css_subsidado_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="subsidado" value="N"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_subsidado'][] = 'N'; ?>
<?php  if ("N" == $this->subsidado)  { echo " checked" ;} ?>  onClick="" >No</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_subsidado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_subsidado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['interno']))
    {
        $this->nm_new_label['interno'] = "Interno";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $interno = $this->interno;
   $sStyleHidden_interno = '';
   if (isset($this->nmgp_cmp_hidden['interno']) && $this->nmgp_cmp_hidden['interno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['interno']);
       $sStyleHidden_interno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_interno = 'display: none;';
   $sStyleReadInp_interno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['interno']) && $this->nmgp_cmp_readonly['interno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['interno']);
       $sStyleReadLab_interno = '';
       $sStyleReadInp_interno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['interno']) && $this->nmgp_cmp_hidden['interno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="interno" value="<?php echo $this->form_encode_input($interno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_interno_line" id="hidden_field_data_interno" style="<?php echo $sStyleHidden_interno; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_interno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_interno_label"><span id="id_label_interno"><?php echo $this->nm_new_label['interno']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["interno"]) &&  $this->nmgp_cmp_readonly["interno"] == "on") { 

 if ("Y" == $this->interno) { $interno_look = "Sí";} 
 if ("N" == $this->interno) { $interno_look = "No";} 
?>
<input type="hidden" name="interno" value="<?php echo $this->form_encode_input($interno) . "\">" . $interno_look . ""; ?>
<?php } else { ?>

<?php

 if ("Y" == $this->interno) { $interno_look = "Sí";} 
 if ("N" == $this->interno) { $interno_look = "No";} 
?>
<span id="id_read_on_interno"  class="css_interno_line" style="<?php echo $sStyleReadLab_interno; ?>"><?php echo $this->form_encode_input($interno_look); ?></span><span id="id_read_off_interno" style="<?php echo $sStyleReadInp_interno; ?>"><div id="idAjaxRadio_interno" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_interno_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="interno" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_interno'][] = 'Y'; ?>
<?php  if ("Y" == $this->interno)  { echo " checked" ;} ?>  onClick="" >Sí</TD>
  <TD class="scFormDataFontOdd css_interno_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="interno" value="N"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_interno'][] = 'N'; ?>
<?php  if ("N" == $this->interno)  { echo " checked" ;} ?>  onClick="" >No</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_interno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_interno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['otro_modelo']))
   {
       $this->nm_new_label['otro_modelo'] = "Otro Modelo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $otro_modelo = $this->otro_modelo;
   $sStyleHidden_otro_modelo = '';
   if (isset($this->nmgp_cmp_hidden['otro_modelo']) && $this->nmgp_cmp_hidden['otro_modelo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['otro_modelo']);
       $sStyleHidden_otro_modelo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_otro_modelo = 'display: none;';
   $sStyleReadInp_otro_modelo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['otro_modelo']) && $this->nmgp_cmp_readonly['otro_modelo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['otro_modelo']);
       $sStyleReadLab_otro_modelo = '';
       $sStyleReadInp_otro_modelo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['otro_modelo']) && $this->nmgp_cmp_hidden['otro_modelo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="otro_modelo" value="<?php echo $this->form_encode_input($this->otro_modelo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_otro_modelo_line" id="hidden_field_data_otro_modelo" style="<?php echo $sStyleHidden_otro_modelo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_otro_modelo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_otro_modelo_label"><span id="id_label_otro_modelo"><?php echo $this->nm_new_label['otro_modelo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["otro_modelo"]) &&  $this->nmgp_cmp_readonly["otro_modelo"] == "on") { 

$otro_modelo_look = "";
 if ($this->otro_modelo == "N1") { $otro_modelo_look .= "Nivel I" ;} 
 if ($this->otro_modelo == "N2") { $otro_modelo_look .= "Nivel II" ;} 
 if ($this->otro_modelo == "OM") { $otro_modelo_look .= "Otro Modelo" ;} 
 if (empty($otro_modelo_look)) { $otro_modelo_look = $this->otro_modelo; }
?>
<input type="hidden" name="otro_modelo" value="<?php echo $this->form_encode_input($otro_modelo) . "\">" . $otro_modelo_look . ""; ?>
<?php } else { ?>
<?php

$otro_modelo_look = "";
 if ($this->otro_modelo == "N1") { $otro_modelo_look .= "Nivel I" ;} 
 if ($this->otro_modelo == "N2") { $otro_modelo_look .= "Nivel II" ;} 
 if ($this->otro_modelo == "OM") { $otro_modelo_look .= "Otro Modelo" ;} 
 if (empty($otro_modelo_look)) { $otro_modelo_look = $this->otro_modelo; }
?>
<span id="id_read_on_otro_modelo" class="css_otro_modelo_line"  style="<?php echo $sStyleReadLab_otro_modelo; ?>"><?php echo $this->form_encode_input($otro_modelo_look); ?></span><span id="id_read_off_otro_modelo" style="<?php echo $sStyleReadInp_otro_modelo; ?>">
 <span id="idAjaxSelect_otro_modelo"><select class="sc-js-input scFormObjectOdd css_otro_modelo_obj" style="" id="id_sc_field_otro_modelo" name="otro_modelo" size="1" alt="{type: 'select', enterTab: false}">
 <option value="N1" <?php  if ($this->otro_modelo == "N1") { echo " selected" ;} ?>>Nivel I</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_otro_modelo'][] = 'N1'; ?>
 <option value="N2" <?php  if ($this->otro_modelo == "N2") { echo " selected" ;} ?>>Nivel II</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_otro_modelo'][] = 'N2'; ?>
 <option value="OM" <?php  if ($this->otro_modelo == "OM") { echo " selected" ;} ?>>Otro Modelo</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_otro_modelo'][] = 'OM'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_otro_modelo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_otro_modelo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_resultado_dumb = ('' == $sStyleHidden_resultado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_resultado_dumb" style="<?php echo $sStyleHidden_resultado_dumb; ?>"></TD>
<?php $sStyleHidden_subsidado_dumb = ('' == $sStyleHidden_subsidado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_subsidado_dumb" style="<?php echo $sStyleHidden_subsidado_dumb; ?>"></TD>
<?php $sStyleHidden_interno_dumb = ('' == $sStyleHidden_interno) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_interno_dumb" style="<?php echo $sStyleHidden_interno_dumb; ?>"></TD>
<?php $sStyleHidden_otro_modelo_dumb = ('' == $sStyleHidden_otro_modelo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_otro_modelo_dumb" style="<?php echo $sStyleHidden_otro_modelo_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['caracter']))
    {
        $this->nm_new_label['caracter'] = "Caracter";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $caracter = $this->caracter;
   $sStyleHidden_caracter = '';
   if (isset($this->nmgp_cmp_hidden['caracter']) && $this->nmgp_cmp_hidden['caracter'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['caracter']);
       $sStyleHidden_caracter = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_caracter = 'display: none;';
   $sStyleReadInp_caracter = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['caracter']) && $this->nmgp_cmp_readonly['caracter'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['caracter']);
       $sStyleReadLab_caracter = '';
       $sStyleReadInp_caracter = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['caracter']) && $this->nmgp_cmp_hidden['caracter'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="caracter" value="<?php echo $this->form_encode_input($caracter) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_caracter_line" id="hidden_field_data_caracter" style="<?php echo $sStyleHidden_caracter; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_caracter_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_caracter_label"><span id="id_label_caracter"><?php echo $this->nm_new_label['caracter']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["caracter"]) &&  $this->nmgp_cmp_readonly["caracter"] == "on") { 

 if ("A" == $this->caracter) { $caracter_look = "Académico";} 
 if ("T" == $this->caracter) { $caracter_look = "Técnico";} 
?>
<input type="hidden" name="caracter" value="<?php echo $this->form_encode_input($caracter) . "\">" . $caracter_look . ""; ?>
<?php } else { ?>

<?php

 if ("A" == $this->caracter) { $caracter_look = "Académico";} 
 if ("T" == $this->caracter) { $caracter_look = "Técnico";} 
?>
<span id="id_read_on_caracter"  class="css_caracter_line" style="<?php echo $sStyleReadLab_caracter; ?>"><?php echo $this->form_encode_input($caracter_look); ?></span><span id="id_read_off_caracter" style="<?php echo $sStyleReadInp_caracter; ?>"><div id="idAjaxRadio_caracter" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_caracter_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="caracter" value="A"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_caracter'][] = 'A'; ?>
<?php  if ("A" == $this->caracter)  { echo " checked" ;} ?>  onClick="" >Académico</TD>
  <TD class="scFormDataFontOdd css_caracter_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="caracter" value="T"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_caracter'][] = 'T'; ?>
<?php  if ("T" == $this->caracter)  { echo " checked" ;} ?>  onClick="" >Técnico</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_caracter_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_caracter_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['especialidad']))
   {
       $this->nm_new_label['especialidad'] = "Especialidad";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['especialidad']) && $this->nmgp_cmp_hidden['especialidad'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="especialidad" value="<?php echo $this->form_encode_input($this->especialidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_especialidad_line" id="hidden_field_data_especialidad" style="<?php echo $sStyleHidden_especialidad; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_especialidad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_especialidad_label"><span id="id_label_especialidad"><?php echo $this->nm_new_label['especialidad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["especialidad"]) &&  $this->nmgp_cmp_readonly["especialidad"] == "on") { 

$especialidad_look = "";
 if ($this->especialidad == "NULL") { $especialidad_look .= "Seleccione" ;} 
 if ($this->especialidad == "C") { $especialidad_look .= "Comercial" ;} 
 if ($this->especialidad == "A") { $especialidad_look .= "Agropecuario" ;} 
 if ($this->especialidad == "T") { $especialidad_look .= "Turismo" ;} 
 if ($this->especialidad == "N") { $especialidad_look .= "Normalista" ;} 
 if ($this->especialidad == "I") { $especialidad_look .= "Industrial" ;} 
 if (empty($especialidad_look)) { $especialidad_look = $this->especialidad; }
?>
<input type="hidden" name="especialidad" value="<?php echo $this->form_encode_input($especialidad) . "\">" . $especialidad_look . ""; ?>
<?php } else { ?>
<?php

$especialidad_look = "";
 if ($this->especialidad == "NULL") { $especialidad_look .= "Seleccione" ;} 
 if ($this->especialidad == "C") { $especialidad_look .= "Comercial" ;} 
 if ($this->especialidad == "A") { $especialidad_look .= "Agropecuario" ;} 
 if ($this->especialidad == "T") { $especialidad_look .= "Turismo" ;} 
 if ($this->especialidad == "N") { $especialidad_look .= "Normalista" ;} 
 if ($this->especialidad == "I") { $especialidad_look .= "Industrial" ;} 
 if (empty($especialidad_look)) { $especialidad_look = $this->especialidad; }
?>
<span id="id_read_on_especialidad" class="css_especialidad_line"  style="<?php echo $sStyleReadLab_especialidad; ?>"><?php echo $this->form_encode_input($especialidad_look); ?></span><span id="id_read_off_especialidad" style="<?php echo $sStyleReadInp_especialidad; ?>">
 <span id="idAjaxSelect_especialidad"><select class="sc-js-input scFormObjectOdd css_especialidad_obj" style="" id="id_sc_field_especialidad" name="especialidad" size="1" alt="{type: 'select', enterTab: false}">
 <option value="NULL" <?php  if ($this->especialidad == "NULL") { echo " selected" ;} ?>>Seleccione</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'NULL'; ?>
 <option value="C" <?php  if ($this->especialidad == "C") { echo " selected" ;} ?>>Comercial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'C'; ?>
 <option value="A" <?php  if ($this->especialidad == "A") { echo " selected" ;} ?>>Agropecuario</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'A'; ?>
 <option value="T" <?php  if ($this->especialidad == "T") { echo " selected" ;} ?>>Turismo</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'T'; ?>
 <option value="N" <?php  if ($this->especialidad == "N") { echo " selected" ;} ?>>Normalista</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'N'; ?>
 <option value="I" <?php  if ($this->especialidad == "I") { echo " selected" ;} ?>>Industrial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'I'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_especialidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_especialidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['year_mat']))
   {
       $this->nm_new_label['year_mat'] = "Año a matricular";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $year_mat = $this->year_mat;
   $sStyleHidden_year_mat = '';
   if (isset($this->nmgp_cmp_hidden['year_mat']) && $this->nmgp_cmp_hidden['year_mat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['year_mat']);
       $sStyleHidden_year_mat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_year_mat = 'display: none;';
   $sStyleReadInp_year_mat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['year_mat']) && $this->nmgp_cmp_readonly['year_mat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['year_mat']);
       $sStyleReadLab_year_mat = '';
       $sStyleReadInp_year_mat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['year_mat']) && $this->nmgp_cmp_hidden['year_mat'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="year_mat" value="<?php echo $this->form_encode_input($this->year_mat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_year_mat_line" id="hidden_field_data_year_mat" style="<?php echo $sStyleHidden_year_mat; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_year_mat_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_year_mat_label"><span id="id_label_year_mat"><?php echo $this->nm_new_label['year_mat']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["year_mat"]) &&  $this->nmgp_cmp_readonly["year_mat"] == "on") { 

$year_mat_look = "";
 if ($this->year_mat == "2017") { $year_mat_look .= "2017" ;} 
 if (empty($year_mat_look)) { $year_mat_look = $this->year_mat; }
?>
<input type="hidden" name="year_mat" value="<?php echo $this->form_encode_input($year_mat) . "\">" . $year_mat_look . ""; ?>
<?php } else { ?>
<?php

$year_mat_look = "";
 if ($this->year_mat == "2017") { $year_mat_look .= "2017" ;} 
 if (empty($year_mat_look)) { $year_mat_look = $this->year_mat; }
?>
<span id="id_read_on_year_mat" class="css_year_mat_line"  style="<?php echo $sStyleReadLab_year_mat; ?>"><?php echo $this->form_encode_input($year_mat_look); ?></span><span id="id_read_off_year_mat" style="<?php echo $sStyleReadInp_year_mat; ?>">
 <span id="idAjaxSelect_year_mat"><select class="sc-js-input scFormObjectOdd css_year_mat_obj" style="" id="id_sc_field_year_mat" name="year_mat" size="1" alt="{type: 'select', enterTab: false}">
 <option value="2017" <?php  if ($this->year_mat == "2017") { echo " selected" ;} ?>>2017</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_year_mat'][] = '2017'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_year_mat_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_year_mat_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['matricular']))
   {
       $this->nm_new_label['matricular'] = "Matricular";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $matricular = $this->matricular;
   $sStyleHidden_matricular = '';
   if (isset($this->nmgp_cmp_hidden['matricular']) && $this->nmgp_cmp_hidden['matricular'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['matricular']);
       $sStyleHidden_matricular = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_matricular = 'display: none;';
   $sStyleReadInp_matricular = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['matricular']) && $this->nmgp_cmp_readonly['matricular'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['matricular']);
       $sStyleReadLab_matricular = '';
       $sStyleReadInp_matricular = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['matricular']) && $this->nmgp_cmp_hidden['matricular'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="matricular" value="<?php echo $this->form_encode_input($this->matricular) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_matricular_line" id="hidden_field_data_matricular" style="<?php echo $sStyleHidden_matricular; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_matricular_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_matricular_label"><span id="id_label_matricular"><?php echo $this->nm_new_label['matricular']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["matricular"]) &&  $this->nmgp_cmp_readonly["matricular"] == "on") { 

$matricular_look = "";
 if ($this->matricular == "1") { $matricular_look .= "Si" ;} 
 if ($this->matricular == "2") { $matricular_look .= "No" ;} 
 if (empty($matricular_look)) { $matricular_look = $this->matricular; }
?>
<input type="hidden" name="matricular" value="<?php echo $this->form_encode_input($matricular) . "\">" . $matricular_look . ""; ?>
<?php } else { ?>
<?php

$matricular_look = "";
 if ($this->matricular == "1") { $matricular_look .= "Si" ;} 
 if ($this->matricular == "2") { $matricular_look .= "No" ;} 
 if (empty($matricular_look)) { $matricular_look = $this->matricular; }
?>
<span id="id_read_on_matricular" class="css_matricular_line"  style="<?php echo $sStyleReadLab_matricular; ?>"><?php echo $this->form_encode_input($matricular_look); ?></span><span id="id_read_off_matricular" style="<?php echo $sStyleReadInp_matricular; ?>">
 <span id="idAjaxSelect_matricular"><select class="sc-js-input scFormObjectOdd css_matricular_obj" style="" id="id_sc_field_matricular" name="matricular" size="1" alt="{type: 'select', enterTab: false}">
 <option value="1" <?php  if ($this->matricular == "1") { echo " selected" ;} ?>>Si</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_matricular'][] = '1'; ?>
 <option value="2" <?php  if ($this->matricular == "2") { echo " selected" ;} ?>>No</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_matricular'][] = '2'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_matricular_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_matricular_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php } ?>
   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
