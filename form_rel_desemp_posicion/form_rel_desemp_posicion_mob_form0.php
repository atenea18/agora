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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - rel_desemp_posicion"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - rel_desemp_posicion"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_rel_desemp_posicion/form_rel_desemp_posicion_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_rel_desemp_posicion_mob_sajax_js.php");
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

 function nm_field_disabled(Fields, Opt) {
  opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     if (F_name == "gra")
     {
        $('select[name="gra"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="gra"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="gra"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "gru")
     {
        $('select[name="gru"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="gru"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="gru"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "are")
     {
        $('select[name="are"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="are"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="are"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "asign")
     {
        $('select[name="asign"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="asign"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="asign"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "peri")
     {
        $('input[name="peri"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="peri"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="peri"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "cod_de")
     {
        $('input[name="cod_de"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="cod_de"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="cod_de"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_rel_desemp_posicion_mob_jquery.php');

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

  sc_form_onload();

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['recarga'];
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
 include_once("form_rel_desemp_posicion_mob_js0.php");
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
               action="form_rel_desemp_posicion_mob.php" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_rel_desemp_posicion_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_rel_desemp_posicion_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - rel_desemp_posicion"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - rel_desemp_posicion"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['id_grado']))
   {
       $this->nmgp_cmp_hidden['id_grado'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_area']))
   {
       $this->nmgp_cmp_hidden['id_area'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_asign']))
   {
       $this->nmgp_cmp_hidden['id_asign'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['periodo']))
   {
       $this->nmgp_cmp_hidden['periodo'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['cod_desemp']))
   {
       $this->nmgp_cmp_hidden['cod_desemp'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_grupo']))
           {
               $this->nmgp_cmp_readonly['id_grupo'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['id_grado']))
    {
        $this->nm_new_label['id_grado'] = "Id Grado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_grado = $this->id_grado;
   if (!isset($this->nmgp_cmp_hidden['id_grado']))
   {
       $this->nmgp_cmp_hidden['id_grado'] = 'off';
   }
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
<?php if (isset($this->nmgp_cmp_hidden['id_grado']) && $this->nmgp_cmp_hidden['id_grado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_grado" value="<?php echo $this->form_encode_input($id_grado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_grado_line" id="hidden_field_data_id_grado" style="<?php echo $sStyleHidden_id_grado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_grado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_grado_label"><span id="id_label_id_grado"><?php echo $this->nm_new_label['id_grado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_grado"]) &&  $this->nmgp_cmp_readonly["id_grado"] == "on") { 

 ?>
<input type="hidden" name="id_grado" value="<?php echo $this->form_encode_input($id_grado) . "\">" . $id_grado . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_grado" class="sc-ui-readonly-id_grado css_id_grado_line" style="<?php echo $sStyleReadLab_id_grado; ?>"><?php echo $this->form_encode_input($this->id_grado); ?></span><span id="id_read_off_id_grado" style="white-space: nowrap;<?php echo $sStyleReadInp_id_grado; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_grado_obj" style="" id="id_sc_field_id_grado" type=text name="id_grado" value="<?php echo $this->form_encode_input($id_grado) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_grado']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_grado']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_grado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_grado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_grupo']))
    {
        $this->nm_new_label['id_grupo'] = "Id Grupo";
    }
?>
<?php
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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_grupo"]) &&  $this->nmgp_cmp_readonly["id_grupo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_grupo']);
       $sStyleReadLab_id_grupo = '';
       $sStyleReadInp_id_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_grupo']) && $this->nmgp_cmp_hidden['id_grupo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_grupo" value="<?php echo $this->form_encode_input($id_grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_grupo_line" id="hidden_field_data_id_grupo" style="<?php echo $sStyleHidden_id_grupo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_grupo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_grupo_label"><span id="id_label_id_grupo"><?php echo $this->nm_new_label['id_grupo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['php_cmp_required']['id_grupo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['php_cmp_required']['id_grupo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id_grupo"]) &&  $this->nmgp_cmp_readonly["id_grupo"] == "on")) { 

 ?>
<input type="hidden" name="id_grupo" value="<?php echo $this->form_encode_input($id_grupo) . "\"><span id=\"id_ajax_label_id_grupo\">" . $id_grupo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_id_grupo" class="sc-ui-readonly-id_grupo css_id_grupo_line" style="<?php echo $sStyleReadLab_id_grupo; ?>"><?php echo $this->form_encode_input($this->id_grupo); ?></span><span id="id_read_off_id_grupo" style="white-space: nowrap;<?php echo $sStyleReadInp_id_grupo; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_grupo_obj" style="" id="id_sc_field_id_grupo" type=text name="id_grupo" value="<?php echo $this->form_encode_input($id_grupo) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_grupo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_grupo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_grupo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_grupo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_asign']))
           {
               $this->nmgp_cmp_readonly['id_asign'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['id_area']))
    {
        $this->nm_new_label['id_area'] = "Id Area";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_area = $this->id_area;
   if (!isset($this->nmgp_cmp_hidden['id_area']))
   {
       $this->nmgp_cmp_hidden['id_area'] = 'off';
   }
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
<?php if (isset($this->nmgp_cmp_hidden['id_area']) && $this->nmgp_cmp_hidden['id_area'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_area" value="<?php echo $this->form_encode_input($id_area) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_area_line" id="hidden_field_data_id_area" style="<?php echo $sStyleHidden_id_area; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_area_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_area_label"><span id="id_label_id_area"><?php echo $this->nm_new_label['id_area']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_area"]) &&  $this->nmgp_cmp_readonly["id_area"] == "on") { 

 ?>
<input type="hidden" name="id_area" value="<?php echo $this->form_encode_input($id_area) . "\">" . $id_area . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_area" class="sc-ui-readonly-id_area css_id_area_line" style="<?php echo $sStyleReadLab_id_area; ?>"><?php echo $this->form_encode_input($this->id_area); ?></span><span id="id_read_off_id_area" style="white-space: nowrap;<?php echo $sStyleReadInp_id_area; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_area_obj" style="" id="id_sc_field_id_area" type=text name="id_area" value="<?php echo $this->form_encode_input($id_area) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_area']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_area']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_area_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_area_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_asign']))
    {
        $this->nm_new_label['id_asign'] = "Id Asign";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_asign = $this->id_asign;
   if (!isset($this->nmgp_cmp_hidden['id_asign']))
   {
       $this->nmgp_cmp_hidden['id_asign'] = 'off';
   }
   $sStyleHidden_id_asign = '';
   if (isset($this->nmgp_cmp_hidden['id_asign']) && $this->nmgp_cmp_hidden['id_asign'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_asign']);
       $sStyleHidden_id_asign = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_asign = 'display: none;';
   $sStyleReadInp_id_asign = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_asign"]) &&  $this->nmgp_cmp_readonly["id_asign"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_asign']);
       $sStyleReadLab_id_asign = '';
       $sStyleReadInp_id_asign = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_asign']) && $this->nmgp_cmp_hidden['id_asign'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_asign" value="<?php echo $this->form_encode_input($id_asign) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_asign_line" id="hidden_field_data_id_asign" style="<?php echo $sStyleHidden_id_asign; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_asign_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_asign_label"><span id="id_label_id_asign"><?php echo $this->nm_new_label['id_asign']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['php_cmp_required']['id_asign']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['php_cmp_required']['id_asign'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id_asign"]) &&  $this->nmgp_cmp_readonly["id_asign"] == "on")) { 

 ?>
<input type="hidden" name="id_asign" value="<?php echo $this->form_encode_input($id_asign) . "\"><span id=\"id_ajax_label_id_asign\">" . $id_asign . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_id_asign" class="sc-ui-readonly-id_asign css_id_asign_line" style="<?php echo $sStyleReadLab_id_asign; ?>"><?php echo $this->form_encode_input($this->id_asign); ?></span><span id="id_read_off_id_asign" style="white-space: nowrap;<?php echo $sStyleReadInp_id_asign; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_asign_obj" style="" id="id_sc_field_id_asign" type=text name="id_asign" value="<?php echo $this->form_encode_input($id_asign) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_asign']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_asign']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_asign_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_asign_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cod_desemp']))
           {
               $this->nmgp_cmp_readonly['cod_desemp'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['periodo']))
    {
        $this->nm_new_label['periodo'] = "Periodo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $periodo = $this->periodo;
   if (!isset($this->nmgp_cmp_hidden['periodo']))
   {
       $this->nmgp_cmp_hidden['periodo'] = 'off';
   }
   $sStyleHidden_periodo = '';
   if (isset($this->nmgp_cmp_hidden['periodo']) && $this->nmgp_cmp_hidden['periodo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['periodo']);
       $sStyleHidden_periodo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_periodo = 'display: none;';
   $sStyleReadInp_periodo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['periodo']) && $this->nmgp_cmp_readonly['periodo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['periodo']);
       $sStyleReadLab_periodo = '';
       $sStyleReadInp_periodo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['periodo']) && $this->nmgp_cmp_hidden['periodo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="periodo" value="<?php echo $this->form_encode_input($periodo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_periodo_line" id="hidden_field_data_periodo" style="<?php echo $sStyleHidden_periodo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_periodo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_periodo_label"><span id="id_label_periodo"><?php echo $this->nm_new_label['periodo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["periodo"]) &&  $this->nmgp_cmp_readonly["periodo"] == "on") { 

 ?>
<input type="hidden" name="periodo" value="<?php echo $this->form_encode_input($periodo) . "\">" . $periodo . ""; ?>
<?php } else { ?>
<span id="id_read_on_periodo" class="sc-ui-readonly-periodo css_periodo_line" style="<?php echo $sStyleReadLab_periodo; ?>"><?php echo $this->form_encode_input($this->periodo); ?></span><span id="id_read_off_periodo" style="white-space: nowrap;<?php echo $sStyleReadInp_periodo; ?>">
 <input class="sc-js-input scFormObjectOdd css_periodo_obj" style="" id="id_sc_field_periodo" type=text name="periodo" value="<?php echo $this->form_encode_input($periodo) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_periodo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_periodo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_desemp']))
    {
        $this->nm_new_label['cod_desemp'] = "Cod Desemp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_desemp = $this->cod_desemp;
   if (!isset($this->nmgp_cmp_hidden['cod_desemp']))
   {
       $this->nmgp_cmp_hidden['cod_desemp'] = 'off';
   }
   $sStyleHidden_cod_desemp = '';
   if (isset($this->nmgp_cmp_hidden['cod_desemp']) && $this->nmgp_cmp_hidden['cod_desemp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_desemp']);
       $sStyleHidden_cod_desemp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_desemp = 'display: none;';
   $sStyleReadInp_cod_desemp = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cod_desemp"]) &&  $this->nmgp_cmp_readonly["cod_desemp"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_desemp']);
       $sStyleReadLab_cod_desemp = '';
       $sStyleReadInp_cod_desemp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_desemp']) && $this->nmgp_cmp_hidden['cod_desemp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_desemp" value="<?php echo $this->form_encode_input($cod_desemp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cod_desemp_line" id="hidden_field_data_cod_desemp" style="<?php echo $sStyleHidden_cod_desemp; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_desemp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cod_desemp_label"><span id="id_label_cod_desemp"><?php echo $this->nm_new_label['cod_desemp']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['php_cmp_required']['cod_desemp']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['php_cmp_required']['cod_desemp'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cod_desemp"]) &&  $this->nmgp_cmp_readonly["cod_desemp"] == "on")) { 

 ?>
<input type="hidden" name="cod_desemp" value="<?php echo $this->form_encode_input($cod_desemp) . "\"><span id=\"id_ajax_label_cod_desemp\">" . $cod_desemp . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cod_desemp" class="sc-ui-readonly-cod_desemp css_cod_desemp_line" style="<?php echo $sStyleReadLab_cod_desemp; ?>"><?php echo $this->form_encode_input($this->cod_desemp); ?></span><span id="id_read_off_cod_desemp" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_desemp; ?>">
 <input class="sc-js-input scFormObjectOdd css_cod_desemp_obj" style="" id="id_sc_field_cod_desemp" type=text name="cod_desemp" value="<?php echo $this->form_encode_input($cod_desemp) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cod_desemp']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cod_desemp']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_desemp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_desemp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['gra']))
   {
       $this->nm_new_label['gra'] = "Grado";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $gra = $this->gra;
   $sStyleHidden_gra = '';
   if (isset($this->nmgp_cmp_hidden['gra']) && $this->nmgp_cmp_hidden['gra'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['gra']);
       $sStyleHidden_gra = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_gra = 'display: none;';
   $sStyleReadInp_gra = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['gra']) && $this->nmgp_cmp_readonly['gra'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['gra']);
       $sStyleReadLab_gra = '';
       $sStyleReadInp_gra = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['gra']) && $this->nmgp_cmp_hidden['gra'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="gra" value="<?php echo $this->form_encode_input($this->gra) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_gra_line" id="hidden_field_data_gra" style="<?php echo $sStyleHidden_gra; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_gra_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_gra_label"><span id="id_label_gra"><?php echo $this->nm_new_label['gra']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["gra"]) &&  $this->nmgp_cmp_readonly["gra"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra'] = array(); 
    }

   $old_value_id_grado = $this->id_grado;
   $old_value_id_grupo = $this->id_grupo;
   $old_value_id_area = $this->id_area;
   $old_value_id_asign = $this->id_asign;
   $old_value_cod_desemp = $this->cod_desemp;
   $old_value_peri = $this->peri;
   $old_value_cod_de = $this->cod_de;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado = $this->id_grado;
   $unformatted_value_id_grupo = $this->id_grupo;
   $unformatted_value_id_area = $this->id_area;
   $unformatted_value_id_asign = $this->id_asign;
   $unformatted_value_cod_desemp = $this->cod_desemp;
   $unformatted_value_peri = $this->peri;
   $unformatted_value_cod_de = $this->cod_de;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
ORDER BY grado";

   $this->id_grado = $old_value_id_grado;
   $this->id_grupo = $old_value_id_grupo;
   $this->id_area = $old_value_id_area;
   $this->id_asign = $old_value_id_asign;
   $this->cod_desemp = $old_value_cod_desemp;
   $this->peri = $old_value_peri;
   $this->cod_de = $old_value_cod_de;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra'][] = $rs->fields[0];
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
   $gra_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->gra_1))
          {
              foreach ($this->gra_1 as $tmp_gra)
              {
                  if (trim($tmp_gra) === trim($cadaselect[1])) { $gra_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->gra) === trim($cadaselect[1])) { $gra_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="gra" value="<?php echo $this->form_encode_input($gra) . "\">" . $gra_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra'] = array(); 
    }

   $old_value_id_grado = $this->id_grado;
   $old_value_id_grupo = $this->id_grupo;
   $old_value_id_area = $this->id_area;
   $old_value_id_asign = $this->id_asign;
   $old_value_cod_desemp = $this->cod_desemp;
   $old_value_peri = $this->peri;
   $old_value_cod_de = $this->cod_de;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado = $this->id_grado;
   $unformatted_value_id_grupo = $this->id_grupo;
   $unformatted_value_id_area = $this->id_area;
   $unformatted_value_id_asign = $this->id_asign;
   $unformatted_value_cod_desemp = $this->cod_desemp;
   $unformatted_value_peri = $this->peri;
   $unformatted_value_cod_de = $this->cod_de;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
ORDER BY grado";

   $this->id_grado = $old_value_id_grado;
   $this->id_grupo = $old_value_id_grupo;
   $this->id_area = $old_value_id_area;
   $this->id_asign = $old_value_id_asign;
   $this->cod_desemp = $old_value_cod_desemp;
   $this->peri = $old_value_peri;
   $this->cod_de = $old_value_cod_de;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gra'][] = $rs->fields[0];
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
   $gra_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->gra_1))
          {
              foreach ($this->gra_1 as $tmp_gra)
              {
                  if (trim($tmp_gra) === trim($cadaselect[1])) { $gra_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->gra) === trim($cadaselect[1])) { $gra_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($gra_look))
          {
              $gra_look = $this->gra;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_gra\" class=\"css_gra_line\" style=\"" .  $sStyleReadLab_gra . "\">" . $this->form_encode_input($gra_look) . "</span><span id=\"id_read_off_gra\" style=\"" . $sStyleReadInp_gra . "\">";
   echo " <span id=\"idAjaxSelect_gra\"><select class=\"sc-js-input scFormObjectOdd css_gra_obj\" style=\"\" id=\"id_sc_field_gra\" name=\"gra\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->gra) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->gra)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_gra_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_gra_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['gru']))
   {
       $this->nm_new_label['gru'] = "Grupo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $gru = $this->gru;
   $sStyleHidden_gru = '';
   if (isset($this->nmgp_cmp_hidden['gru']) && $this->nmgp_cmp_hidden['gru'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['gru']);
       $sStyleHidden_gru = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_gru = 'display: none;';
   $sStyleReadInp_gru = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['gru']) && $this->nmgp_cmp_readonly['gru'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['gru']);
       $sStyleReadLab_gru = '';
       $sStyleReadInp_gru = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['gru']) && $this->nmgp_cmp_hidden['gru'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="gru" value="<?php echo $this->form_encode_input($this->gru) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_gru_line" id="hidden_field_data_gru" style="<?php echo $sStyleHidden_gru; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_gru_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_gru_label"><span id="id_label_gru"><?php echo $this->nm_new_label['gru']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["gru"]) &&  $this->nmgp_cmp_readonly["gru"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru'] = array(); 
    }

   $old_value_id_grado = $this->id_grado;
   $old_value_id_grupo = $this->id_grupo;
   $old_value_id_area = $this->id_area;
   $old_value_id_asign = $this->id_asign;
   $old_value_cod_desemp = $this->cod_desemp;
   $old_value_peri = $this->peri;
   $old_value_cod_de = $this->cod_de;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado = $this->id_grado;
   $unformatted_value_id_grupo = $this->id_grupo;
   $unformatted_value_id_area = $this->id_area;
   $unformatted_value_id_asign = $this->id_asign;
   $unformatted_value_cod_desemp = $this->cod_desemp;
   $unformatted_value_peri = $this->peri;
   $unformatted_value_cod_de = $this->cod_de;

   $nm_comando = "SELECT id_grupo, nombre_grupo 
FROM t_grupos 
ORDER BY nombre_grupo";

   $this->id_grado = $old_value_id_grado;
   $this->id_grupo = $old_value_id_grupo;
   $this->id_area = $old_value_id_area;
   $this->id_asign = $old_value_id_asign;
   $this->cod_desemp = $old_value_cod_desemp;
   $this->peri = $old_value_peri;
   $this->cod_de = $old_value_cod_de;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru'][] = $rs->fields[0];
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
   $gru_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->gru_1))
          {
              foreach ($this->gru_1 as $tmp_gru)
              {
                  if (trim($tmp_gru) === trim($cadaselect[1])) { $gru_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->gru) === trim($cadaselect[1])) { $gru_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="gru" value="<?php echo $this->form_encode_input($gru) . "\">" . $gru_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru'] = array(); 
    }

   $old_value_id_grado = $this->id_grado;
   $old_value_id_grupo = $this->id_grupo;
   $old_value_id_area = $this->id_area;
   $old_value_id_asign = $this->id_asign;
   $old_value_cod_desemp = $this->cod_desemp;
   $old_value_peri = $this->peri;
   $old_value_cod_de = $this->cod_de;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado = $this->id_grado;
   $unformatted_value_id_grupo = $this->id_grupo;
   $unformatted_value_id_area = $this->id_area;
   $unformatted_value_id_asign = $this->id_asign;
   $unformatted_value_cod_desemp = $this->cod_desemp;
   $unformatted_value_peri = $this->peri;
   $unformatted_value_cod_de = $this->cod_de;

   $nm_comando = "SELECT id_grupo, nombre_grupo 
FROM t_grupos 
ORDER BY nombre_grupo";

   $this->id_grado = $old_value_id_grado;
   $this->id_grupo = $old_value_id_grupo;
   $this->id_area = $old_value_id_area;
   $this->id_asign = $old_value_id_asign;
   $this->cod_desemp = $old_value_cod_desemp;
   $this->peri = $old_value_peri;
   $this->cod_de = $old_value_cod_de;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_gru'][] = $rs->fields[0];
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
   $gru_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->gru_1))
          {
              foreach ($this->gru_1 as $tmp_gru)
              {
                  if (trim($tmp_gru) === trim($cadaselect[1])) { $gru_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->gru) === trim($cadaselect[1])) { $gru_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($gru_look))
          {
              $gru_look = $this->gru;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_gru\" class=\"css_gru_line\" style=\"" .  $sStyleReadLab_gru . "\">" . $this->form_encode_input($gru_look) . "</span><span id=\"id_read_off_gru\" style=\"" . $sStyleReadInp_gru . "\">";
   echo " <span id=\"idAjaxSelect_gru\"><select class=\"sc-js-input scFormObjectOdd css_gru_obj\" style=\"\" id=\"id_sc_field_gru\" name=\"gru\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->gru) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->gru)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_gru_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_gru_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['are']))
   {
       $this->nm_new_label['are'] = "Area";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $are = $this->are;
   $sStyleHidden_are = '';
   if (isset($this->nmgp_cmp_hidden['are']) && $this->nmgp_cmp_hidden['are'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['are']);
       $sStyleHidden_are = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_are = 'display: none;';
   $sStyleReadInp_are = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['are']) && $this->nmgp_cmp_readonly['are'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['are']);
       $sStyleReadLab_are = '';
       $sStyleReadInp_are = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['are']) && $this->nmgp_cmp_hidden['are'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="are" value="<?php echo $this->form_encode_input($this->are) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_are_line" id="hidden_field_data_are" style="<?php echo $sStyleHidden_are; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_are_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_are_label"><span id="id_label_are"><?php echo $this->nm_new_label['are']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["are"]) &&  $this->nmgp_cmp_readonly["are"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are'] = array(); 
    }

   $old_value_id_grado = $this->id_grado;
   $old_value_id_grupo = $this->id_grupo;
   $old_value_id_area = $this->id_area;
   $old_value_id_asign = $this->id_asign;
   $old_value_cod_desemp = $this->cod_desemp;
   $old_value_peri = $this->peri;
   $old_value_cod_de = $this->cod_de;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado = $this->id_grado;
   $unformatted_value_id_grupo = $this->id_grupo;
   $unformatted_value_id_area = $this->id_area;
   $unformatted_value_id_asign = $this->id_asign;
   $unformatted_value_cod_desemp = $this->cod_desemp;
   $unformatted_value_peri = $this->peri;
   $unformatted_value_cod_de = $this->cod_de;

   $nm_comando = "SELECT id_area, area 
FROM t_area 
ORDER BY area";

   $this->id_grado = $old_value_id_grado;
   $this->id_grupo = $old_value_id_grupo;
   $this->id_area = $old_value_id_area;
   $this->id_asign = $old_value_id_asign;
   $this->cod_desemp = $old_value_cod_desemp;
   $this->peri = $old_value_peri;
   $this->cod_de = $old_value_cod_de;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are'][] = $rs->fields[0];
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
   $are_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->are_1))
          {
              foreach ($this->are_1 as $tmp_are)
              {
                  if (trim($tmp_are) === trim($cadaselect[1])) { $are_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->are) === trim($cadaselect[1])) { $are_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="are" value="<?php echo $this->form_encode_input($are) . "\">" . $are_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are'] = array(); 
    }

   $old_value_id_grado = $this->id_grado;
   $old_value_id_grupo = $this->id_grupo;
   $old_value_id_area = $this->id_area;
   $old_value_id_asign = $this->id_asign;
   $old_value_cod_desemp = $this->cod_desemp;
   $old_value_peri = $this->peri;
   $old_value_cod_de = $this->cod_de;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado = $this->id_grado;
   $unformatted_value_id_grupo = $this->id_grupo;
   $unformatted_value_id_area = $this->id_area;
   $unformatted_value_id_asign = $this->id_asign;
   $unformatted_value_cod_desemp = $this->cod_desemp;
   $unformatted_value_peri = $this->peri;
   $unformatted_value_cod_de = $this->cod_de;

   $nm_comando = "SELECT id_area, area 
FROM t_area 
ORDER BY area";

   $this->id_grado = $old_value_id_grado;
   $this->id_grupo = $old_value_id_grupo;
   $this->id_area = $old_value_id_area;
   $this->id_asign = $old_value_id_asign;
   $this->cod_desemp = $old_value_cod_desemp;
   $this->peri = $old_value_peri;
   $this->cod_de = $old_value_cod_de;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_are'][] = $rs->fields[0];
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
   $are_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->are_1))
          {
              foreach ($this->are_1 as $tmp_are)
              {
                  if (trim($tmp_are) === trim($cadaselect[1])) { $are_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->are) === trim($cadaselect[1])) { $are_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($are_look))
          {
              $are_look = $this->are;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_are\" class=\"css_are_line\" style=\"" .  $sStyleReadLab_are . "\">" . $this->form_encode_input($are_look) . "</span><span id=\"id_read_off_are\" style=\"" . $sStyleReadInp_are . "\">";
   echo " <span id=\"idAjaxSelect_are\"><select class=\"sc-js-input scFormObjectOdd css_are_obj\" style=\"\" id=\"id_sc_field_are\" name=\"are\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->are) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->are)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_are_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_are_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['asign']))
   {
       $this->nm_new_label['asign'] = "Asignatura";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $asign = $this->asign;
   $sStyleHidden_asign = '';
   if (isset($this->nmgp_cmp_hidden['asign']) && $this->nmgp_cmp_hidden['asign'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['asign']);
       $sStyleHidden_asign = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_asign = 'display: none;';
   $sStyleReadInp_asign = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['asign']) && $this->nmgp_cmp_readonly['asign'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['asign']);
       $sStyleReadLab_asign = '';
       $sStyleReadInp_asign = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['asign']) && $this->nmgp_cmp_hidden['asign'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="asign" value="<?php echo $this->form_encode_input($this->asign) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_asign_line" id="hidden_field_data_asign" style="<?php echo $sStyleHidden_asign; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_asign_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_asign_label"><span id="id_label_asign"><?php echo $this->nm_new_label['asign']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["asign"]) &&  $this->nmgp_cmp_readonly["asign"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign'] = array(); 
    }

   $old_value_id_grado = $this->id_grado;
   $old_value_id_grupo = $this->id_grupo;
   $old_value_id_area = $this->id_area;
   $old_value_id_asign = $this->id_asign;
   $old_value_cod_desemp = $this->cod_desemp;
   $old_value_peri = $this->peri;
   $old_value_cod_de = $this->cod_de;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado = $this->id_grado;
   $unformatted_value_id_grupo = $this->id_grupo;
   $unformatted_value_id_area = $this->id_area;
   $unformatted_value_id_asign = $this->id_asign;
   $unformatted_value_cod_desemp = $this->cod_desemp;
   $unformatted_value_peri = $this->peri;
   $unformatted_value_cod_de = $this->cod_de;

   $nm_comando = "SELECT id_asignatura, asignatura 
FROM t_asignaturas 
ORDER BY asignatura";

   $this->id_grado = $old_value_id_grado;
   $this->id_grupo = $old_value_id_grupo;
   $this->id_area = $old_value_id_area;
   $this->id_asign = $old_value_id_asign;
   $this->cod_desemp = $old_value_cod_desemp;
   $this->peri = $old_value_peri;
   $this->cod_de = $old_value_cod_de;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign'][] = $rs->fields[0];
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
   $asign_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->asign_1))
          {
              foreach ($this->asign_1 as $tmp_asign)
              {
                  if (trim($tmp_asign) === trim($cadaselect[1])) { $asign_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->asign) === trim($cadaselect[1])) { $asign_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="asign" value="<?php echo $this->form_encode_input($asign) . "\">" . $asign_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign'] = array(); 
    }

   $old_value_id_grado = $this->id_grado;
   $old_value_id_grupo = $this->id_grupo;
   $old_value_id_area = $this->id_area;
   $old_value_id_asign = $this->id_asign;
   $old_value_cod_desemp = $this->cod_desemp;
   $old_value_peri = $this->peri;
   $old_value_cod_de = $this->cod_de;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado = $this->id_grado;
   $unformatted_value_id_grupo = $this->id_grupo;
   $unformatted_value_id_area = $this->id_area;
   $unformatted_value_id_asign = $this->id_asign;
   $unformatted_value_cod_desemp = $this->cod_desemp;
   $unformatted_value_peri = $this->peri;
   $unformatted_value_cod_de = $this->cod_de;

   $nm_comando = "SELECT id_asignatura, asignatura 
FROM t_asignaturas 
ORDER BY asignatura";

   $this->id_grado = $old_value_id_grado;
   $this->id_grupo = $old_value_id_grupo;
   $this->id_area = $old_value_id_area;
   $this->id_asign = $old_value_id_asign;
   $this->cod_desemp = $old_value_cod_desemp;
   $this->peri = $old_value_peri;
   $this->cod_de = $old_value_cod_de;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_asign'][] = $rs->fields[0];
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
   $asign_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->asign_1))
          {
              foreach ($this->asign_1 as $tmp_asign)
              {
                  if (trim($tmp_asign) === trim($cadaselect[1])) { $asign_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->asign) === trim($cadaselect[1])) { $asign_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($asign_look))
          {
              $asign_look = $this->asign;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_asign\" class=\"css_asign_line\" style=\"" .  $sStyleReadLab_asign . "\">" . $this->form_encode_input($asign_look) . "</span><span id=\"id_read_off_asign\" style=\"" . $sStyleReadInp_asign . "\">";
   echo " <span id=\"idAjaxSelect_asign\"><select class=\"sc-js-input scFormObjectOdd css_asign_obj\" style=\"\" id=\"id_sc_field_asign\" name=\"asign\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->asign) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->asign)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_asign_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_asign_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['peri']))
    {
        $this->nm_new_label['peri'] = "Período";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $peri = $this->peri;
   $sStyleHidden_peri = '';
   if (isset($this->nmgp_cmp_hidden['peri']) && $this->nmgp_cmp_hidden['peri'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['peri']);
       $sStyleHidden_peri = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_peri = 'display: none;';
   $sStyleReadInp_peri = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['peri']) && $this->nmgp_cmp_readonly['peri'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['peri']);
       $sStyleReadLab_peri = '';
       $sStyleReadInp_peri = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['peri']) && $this->nmgp_cmp_hidden['peri'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="peri" value="<?php echo $this->form_encode_input($peri) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_peri_line" id="hidden_field_data_peri" style="<?php echo $sStyleHidden_peri; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_peri_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_peri_label"><span id="id_label_peri"><?php echo $this->nm_new_label['peri']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["peri"]) &&  $this->nmgp_cmp_readonly["peri"] == "on") { 

 ?>
<input type="hidden" name="peri" value="<?php echo $this->form_encode_input($peri) . "\">" . $peri . ""; ?>
<?php } else { ?>
<span id="id_read_on_peri" class="sc-ui-readonly-peri css_peri_line" style="<?php echo $sStyleReadLab_peri; ?>"><?php echo $this->form_encode_input($this->peri); ?></span><span id="id_read_off_peri" style="white-space: nowrap;<?php echo $sStyleReadInp_peri; ?>">
 <input class="sc-js-input scFormObjectOdd css_peri_obj" style="" id="id_sc_field_peri" type=text name="peri" value="<?php echo $this->form_encode_input($peri) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['peri']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['peri']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_peri_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_peri_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['posicion']))
           {
               $this->nmgp_cmp_readonly['posicion'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['cod_de']))
    {
        $this->nm_new_label['cod_de'] = "Código de Desempeño";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_de = $this->cod_de;
   $sStyleHidden_cod_de = '';
   if (isset($this->nmgp_cmp_hidden['cod_de']) && $this->nmgp_cmp_hidden['cod_de'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_de']);
       $sStyleHidden_cod_de = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_de = 'display: none;';
   $sStyleReadInp_cod_de = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cod_de']) && $this->nmgp_cmp_readonly['cod_de'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_de']);
       $sStyleReadLab_cod_de = '';
       $sStyleReadInp_cod_de = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_de']) && $this->nmgp_cmp_hidden['cod_de'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_de" value="<?php echo $this->form_encode_input($cod_de) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cod_de_line" id="hidden_field_data_cod_de" style="<?php echo $sStyleHidden_cod_de; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_de_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cod_de_label"><span id="id_label_cod_de"><?php echo $this->nm_new_label['cod_de']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_de"]) &&  $this->nmgp_cmp_readonly["cod_de"] == "on") { 

 ?>
<input type="hidden" name="cod_de" value="<?php echo $this->form_encode_input($cod_de) . "\">" . $cod_de . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_de" class="sc-ui-readonly-cod_de css_cod_de_line" style="<?php echo $sStyleReadLab_cod_de; ?>"><?php echo $this->form_encode_input($this->cod_de); ?></span><span id="id_read_off_cod_de" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_de; ?>">
 <input class="sc-js-input scFormObjectOdd css_cod_de_obj" style="" id="id_sc_field_cod_de" type=text name="cod_de" value="<?php echo $this->form_encode_input($cod_de) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cod_de']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cod_de']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
<span class="scFormPopupBubble" style="vertical-align: top; display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent"><?php echo $_SESSION['ayuda'] ?></td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent"><?php echo $_SESSION['ayuda'] ?></td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_de_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_de_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['posicion']))
    {
        $this->nm_new_label['posicion'] = "Posicion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $posicion = $this->posicion;
   $sStyleHidden_posicion = '';
   if (isset($this->nmgp_cmp_hidden['posicion']) && $this->nmgp_cmp_hidden['posicion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['posicion']);
       $sStyleHidden_posicion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_posicion = 'display: none;';
   $sStyleReadInp_posicion = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["posicion"]) &&  $this->nmgp_cmp_readonly["posicion"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['posicion']);
       $sStyleReadLab_posicion = '';
       $sStyleReadInp_posicion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['posicion']) && $this->nmgp_cmp_hidden['posicion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="posicion" value="<?php echo $this->form_encode_input($posicion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_posicion_line" id="hidden_field_data_posicion" style="<?php echo $sStyleHidden_posicion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_posicion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_posicion_label"><span id="id_label_posicion"><?php echo $this->nm_new_label['posicion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['php_cmp_required']['posicion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['php_cmp_required']['posicion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["posicion"]) &&  $this->nmgp_cmp_readonly["posicion"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion'] = array(); 
    }

   $old_value_id_grado = $this->id_grado;
   $old_value_id_grupo = $this->id_grupo;
   $old_value_id_area = $this->id_area;
   $old_value_id_asign = $this->id_asign;
   $old_value_cod_desemp = $this->cod_desemp;
   $old_value_peri = $this->peri;
   $old_value_cod_de = $this->cod_de;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado = $this->id_grado;
   $unformatted_value_id_grupo = $this->id_grupo;
   $unformatted_value_id_area = $this->id_area;
   $unformatted_value_id_asign = $this->id_asign;
   $unformatted_value_cod_desemp = $this->cod_desemp;
   $unformatted_value_peri = $this->peri;
   $unformatted_value_cod_de = $this->cod_de;

   $nm_comando = "SELECT posicion, posicion 
FROM posiciones 
WHERE periodo = '$this->periodo'
ORDER BY posicion";

   $this->id_grado = $old_value_id_grado;
   $this->id_grupo = $old_value_id_grupo;
   $this->id_area = $old_value_id_area;
   $this->id_asign = $old_value_id_asign;
   $this->cod_desemp = $old_value_cod_desemp;
   $this->peri = $old_value_peri;
   $this->cod_de = $old_value_cod_de;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion'][] = $rs->fields[0];
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
   $posicion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->posicion_1))
          {
              foreach ($this->posicion_1 as $tmp_posicion)
              {
                  if (trim($tmp_posicion) === trim($cadaselect[1])) { $posicion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->posicion) === trim($cadaselect[1])) { $posicion_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="posicion" value="<?php echo $this->form_encode_input($posicion) . "\"><span id=\"id_ajax_label_posicion\">" . $posicion_look . "</span>"; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion'] = array(); 
    }

   $old_value_id_grado = $this->id_grado;
   $old_value_id_grupo = $this->id_grupo;
   $old_value_id_area = $this->id_area;
   $old_value_id_asign = $this->id_asign;
   $old_value_cod_desemp = $this->cod_desemp;
   $old_value_peri = $this->peri;
   $old_value_cod_de = $this->cod_de;
   $this->nm_tira_formatacao();


   $unformatted_value_id_grado = $this->id_grado;
   $unformatted_value_id_grupo = $this->id_grupo;
   $unformatted_value_id_area = $this->id_area;
   $unformatted_value_id_asign = $this->id_asign;
   $unformatted_value_cod_desemp = $this->cod_desemp;
   $unformatted_value_peri = $this->peri;
   $unformatted_value_cod_de = $this->cod_de;

   $nm_comando = "SELECT posicion, posicion 
FROM posiciones 
WHERE periodo = '$this->periodo'
ORDER BY posicion";

   $this->id_grado = $old_value_id_grado;
   $this->id_grupo = $old_value_id_grupo;
   $this->id_area = $old_value_id_area;
   $this->id_asign = $old_value_id_asign;
   $this->cod_desemp = $old_value_cod_desemp;
   $this->peri = $old_value_peri;
   $this->cod_de = $old_value_cod_de;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['Lookup_posicion'][] = $rs->fields[0];
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
   $posicion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->posicion_1))
          {
              foreach ($this->posicion_1 as $tmp_posicion)
              {
                  if (trim($tmp_posicion) === trim($cadaselect[1])) { $posicion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->posicion) === trim($cadaselect[1])) { $posicion_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_posicion\" class=\"css_posicion_line\" style=\"" .  $sStyleReadLab_posicion . "\">" . $this->form_encode_input($posicion_look) . "</span><span id=\"id_read_off_posicion\" style=\"" . $sStyleReadInp_posicion . "\">";
   echo "<div id=\"idAjaxRadio_posicion\" style=\"display: inline-block\">\r\n";
   $y = 0 ; 
   echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n";
   echo " <tr>\r\n";
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaradio = explode("?#?", $todo[$x]) ; 
          if ($cadaradio[1] == "@ ") {$cadaradio[1]= trim($cadaradio[1]); } ; 
          if ($y == 5)
          {
              echo " </tr>\r\n";
              echo " <tr>\r\n";
              $y = 0;
          }
          echo "  <td class=\"scFormDataFontOdd css_posicion_line\">\r\n";
          echo "    <input type=radio style=\"float:left; position:relative; top: -3px;\" name=\"posicion\" value=\"$cadaradio[1]\"";
          if (trim($this->posicion) === trim($cadaradio[1])) 
          { 
              echo " checked" ; 
          } 
          if (strtoupper($cadaradio[2]) == "S") 
          { 
              if (empty($this->posicion)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['masterValue']);
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
 parent.scAjaxDetailStatus("form_rel_desemp_posicion_mob");
 parent.scAjaxDetailHeight("form_rel_desemp_posicion_mob", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_rel_desemp_posicion_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_rel_desemp_posicion_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_rel_desemp_posicion_mob']['sc_modal'])
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
