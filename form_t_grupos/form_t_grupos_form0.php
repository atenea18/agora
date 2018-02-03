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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Grupos"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Grupos"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_t_grupos/form_t_grupos_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_t_grupos_sajax_js.php");
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

include_once('form_t_grupos_jquery.php');

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
    if ("hidden_bloco_2" == block_id) {
      scAjaxDetailHeight("form_grupo_x_asig_x_doce", "500");
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['recarga'];
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
 include_once("form_t_grupos_js0.php");
?>
<script type="text/javascript"> 
 // Adiciona um elemento
 //----------------------
 function nm_add_sel(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  // Varre itens da origem
  for (i = 0; i < oOrig.length; i++)
  {
   // Item na origem selecionado e valido
   if (oOrig.options[i].selected && !oOrig.options[i].disabled)
   {
    // Recupera valores da origem
    sText  = oOrig.options[i].text;
    sValue = oOrig.options[i].value;
    // Cria item no destino
    oDest.options[oDest.length] = new Option(sText, sValue);
    // Desabilita item na origem
    oOrig.options[i].style.color = "#A0A0A0";
    oOrig.options[i].disabled    = true;
    oOrig.options[i].selected    = false;
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 // Adiciona todos os elementos
 //-----------------------------
 function nm_add_all(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  // Varre itens da origem
  for (i = 0; i < oOrig.length; i++)
  {
   // Item na origem valido
   if (!oOrig.options[i].disabled)
   {
    // Recupera valores da origem
    sText  = oOrig.options[i].text;
    sValue = oOrig.options[i].value;
    // Cria item no destino
    oDest.options[oDest.length] = new Option(sText, sValue);
    // Desabilita item na origem
    oOrig.options[i].style.color = "#A0A0A0";
    oOrig.options[i].disabled    = true;
    oOrig.options[i].selected    = false;
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 // Remove um elemento
 //--------------------
 function nm_del_sel(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  aSel  = new Array();
  atxt  = new Array();
  solt  = new Array();
  j     = 0;
  z     = 0;
  // Remove itens selecionados na origem
  for (i = oOrig.length - 1; i >= 0; i--)
  {
   // Item na origem selecionado
   if (oOrig.options[i].selected)
   {
    aSel[j] = oOrig.options[i].value;
    atxt[j] = oOrig.options[i].text;
    j++;
    oOrig.options[i] = null;
   }
  }
  // Habilita itens no destino
  for (i = 0; i < oDest.length; i++)
  {
   if (oDest.options[i].disabled && in_array(aSel, oDest.options[i].value))
   {
    oDest.options[i].disabled    = false;
    oDest.options[i].style.color = "";
    solt[z] = oDest.options[i].value;
    z++;
   }
  }
  for (i = 0; i < aSel.length; i++)
  {
   if (!in_array(solt, aSel[i]))
   {
    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 // Remove todos os elementos
 //---------------------------
 function nm_del_all(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  aSel  = new Array();
  atxt  = new Array();
  solt  = new Array();
  j     = 0;
  z     = 0;
  // Remove todos os itens na origem
  while (0 < oOrig.length)
  {
   i       = oOrig.length - 1;
   aSel[j] = oOrig.options[i].value;
   atxt[j] = oOrig.options[i].text;
   j++;
   oOrig.options[i] = null;
  }
  // Habilita itens no destino
  for (i = 0; i < oDest.length; i++)
  {
   if (oDest.options[i].disabled && in_array(aSel, oDest.options[i].value))
   {
    oDest.options[i].disabled    = false;
    oDest.options[i].style.color = "";
    solt[z] = oDest.options[i].value;
    z++;
   }
  }
  for (i = 0; i < aSel.length; i++)
  {
   if (!in_array(solt, aSel[i]))
   {
    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 function nm_sincroniza(sOrig, sDest)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  // Varre itens do destino
  for (i = 0; i < oDest.length; i++)
  {
     dValue = oDest.options[i].value;
     bFound = false;
     for (x = 0; x < oOrig.length && !bFound; x++)
     {
         oValue = oOrig.options[x].value;
         if (dValue == oValue)
         {
             // Desabilita item na origem
             oOrig.options[x].style.color = "#A0A0A0";
             oOrig.options[x].disabled    = true;
             oOrig.options[x].selected    = false;
             bFound = true;
         }
     }
  }
 }
 var nm_quant_pack;
 function nm_pack(sOrig, sDest)
 {
    if (!document.F1.elements[sOrig] || !document.F1.elements[sDest]) return;
    obj_sel = document.F1.elements[sOrig];
    str_val = "";
    nm_quant_pack = 0;
    for (i = 0; i < obj_sel.length; i++)
    {
         if ("" != str_val)
         {
             str_val += "@?@";
             nm_quant_pack++;
         }
         str_val += obj_sel.options[i].value;
    }
    document.F1.elements[sDest].value = str_val;
 }
 function nm_pack_sel(sOrig, sDest)
 {
    if (!document.F1.elements[sOrig] || !document.F1.elements[sDest]) return;
    obj_sel = document.F1.elements[sOrig];
    str_val = "";
    nm_quant_pack = 0;
    for (i = 0; i < obj_sel.length; i++)
    {
         if (obj_sel.options[i].selected)
         {
             if ("" != str_val)
             {
                 str_val += "@?@";
                 nm_quant_pack++;
             }
             str_val += obj_sel.options[i].value;
         }
    }
    document.F1.elements[sDest].value = str_val;
 }
 function nm_del_combo(sOcombo)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOcombo];
  aSel  = new Array();
  j     = 0;
  // Remove todos os itens na origem
  while (0 < oOrig.length)
  {
   i       = oOrig.length - 1;
   aSel[j] = oOrig.options[i].value;
   j++;
   oOrig.options[i] = null;
  }
 }
 function nm_add_item(sDest, sText, sValue, sSelected)
 {
  oDest = document.F1.elements[sDest];
  oDest.options[oDest.length] = new Option(sText, sValue);
  if (sSelected == 'selected')
  {
      oDest.options[oDest.length -1].selected = true;
  }
 }
 // Teste se elemento pertence ao array
 //-------------------------------------
 function in_array(aArray, sElem)
 {
  for (iCount = 0; iCount < aArray.length; iCount++)
  {
   if (sElem == aArray[iCount])
   {
    return true;
   }
  }
  return false;
 }
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_t_grupos'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_t_grupos'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Grupos"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Grupos"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['calendario']))
   {
       $this->nmgp_cmp_hidden['calendario'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['entorno']))
   {
       $this->nmgp_cmp_hidden['entorno'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_grupo']))
    {
        $this->nm_new_label['nombre_grupo'] = "Nombre Grupo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_grupo = $this->nombre_grupo;
   $sStyleHidden_nombre_grupo = '';
   if (isset($this->nmgp_cmp_hidden['nombre_grupo']) && $this->nmgp_cmp_hidden['nombre_grupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_grupo']);
       $sStyleHidden_nombre_grupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_grupo = 'display: none;';
   $sStyleReadInp_nombre_grupo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_grupo']) && $this->nmgp_cmp_readonly['nombre_grupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_grupo']);
       $sStyleReadLab_nombre_grupo = '';
       $sStyleReadInp_nombre_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_grupo']) && $this->nmgp_cmp_hidden['nombre_grupo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_grupo" value="<?php echo $this->form_encode_input($nombre_grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombre_grupo_label" id="hidden_field_label_nombre_grupo" style="<?php echo $sStyleHidden_nombre_grupo; ?>"><span id="id_label_nombre_grupo"><?php echo $this->nm_new_label['nombre_grupo']; ?></span></TD>
    <TD class="scFormDataOdd css_nombre_grupo_line" id="hidden_field_data_nombre_grupo" style="<?php echo $sStyleHidden_nombre_grupo; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_grupo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_grupo"]) &&  $this->nmgp_cmp_readonly["nombre_grupo"] == "on") { 

 ?>
<input type="hidden" name="nombre_grupo" value="<?php echo $this->form_encode_input($nombre_grupo) . "\">" . $nombre_grupo . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_grupo" class="sc-ui-readonly-nombre_grupo css_nombre_grupo_line" style="<?php echo $sStyleReadLab_nombre_grupo; ?>"><?php echo $this->form_encode_input($this->nombre_grupo); ?></span><span id="id_read_off_nombre_grupo" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_grupo; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_grupo_obj" style="" id="id_sc_field_nombre_grupo" type=text name="nombre_grupo" value="<?php echo $this->form_encode_input($nombre_grupo) ?>"
 size=20 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_grupo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_grupo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_jornada_label" id="hidden_field_label_jornada" style="<?php echo $sStyleHidden_jornada; ?>"><span id="id_label_jornada"><?php echo $this->nm_new_label['jornada']; ?></span></TD>
    <TD class="scFormDataOdd css_jornada_line" id="hidden_field_data_jornada" style="<?php echo $sStyleHidden_jornada; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jornada_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jornada"]) &&  $this->nmgp_cmp_readonly["jornada"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada'] = array(); 
    }
   $nm_comando = "SELECT id_jornada, jornada 
FROM jornadas 
ORDER BY id_jornada";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada'] = array(); 
    }
   $nm_comando = "SELECT id_jornada, jornada 
FROM jornadas 
ORDER BY id_jornada";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_jornada'][] = $rs->fields[0];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jornada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jornada_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_educ']))
   {
       $this->nm_new_label['tipo_educ'] = "Tipo de Educación";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_educ = $this->tipo_educ;
   $sStyleHidden_tipo_educ = '';
   if (isset($this->nmgp_cmp_hidden['tipo_educ']) && $this->nmgp_cmp_hidden['tipo_educ'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_educ']);
       $sStyleHidden_tipo_educ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_educ = 'display: none;';
   $sStyleReadInp_tipo_educ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_educ']) && $this->nmgp_cmp_readonly['tipo_educ'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_educ']);
       $sStyleReadLab_tipo_educ = '';
       $sStyleReadInp_tipo_educ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_educ']) && $this->nmgp_cmp_hidden['tipo_educ'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_educ" value="<?php echo $this->form_encode_input($this->tipo_educ) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_educ_label" id="hidden_field_label_tipo_educ" style="<?php echo $sStyleHidden_tipo_educ; ?>"><span id="id_label_tipo_educ"><?php echo $this->nm_new_label['tipo_educ']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo_educ_line" id="hidden_field_data_tipo_educ" style="<?php echo $sStyleHidden_tipo_educ; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_educ_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_educ"]) &&  $this->nmgp_cmp_readonly["tipo_educ"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'] = array(); 
    }
   $nm_comando = "SELECT id_nivel, nivel 
FROM niveles 
ORDER BY id_nivel";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'][] = $rs->fields[0];
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
   $tipo_educ_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_educ_1))
          {
              foreach ($this->tipo_educ_1 as $tmp_tipo_educ)
              {
                  if (trim($tmp_tipo_educ) === trim($cadaselect[1])) { $tipo_educ_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_educ) === trim($cadaselect[1])) { $tipo_educ_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tipo_educ" value="<?php echo $this->form_encode_input($tipo_educ) . "\">" . $tipo_educ_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'] = array(); 
    }
   $nm_comando = "SELECT id_nivel, nivel 
FROM niveles 
ORDER BY id_nivel";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'][] = $rs->fields[0];
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
   $tipo_educ_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_educ_1))
          {
              foreach ($this->tipo_educ_1 as $tmp_tipo_educ)
              {
                  if (trim($tmp_tipo_educ) === trim($cadaselect[1])) { $tipo_educ_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_educ) === trim($cadaselect[1])) { $tipo_educ_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tipo_educ_look))
          {
              $tipo_educ_look = $this->tipo_educ;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tipo_educ\" class=\"css_tipo_educ_line\" style=\"" .  $sStyleReadLab_tipo_educ . "\">" . $this->form_encode_input($tipo_educ_look) . "</span><span id=\"id_read_off_tipo_educ\" style=\"" . $sStyleReadInp_tipo_educ . "\">";
   echo " <span id=\"idAjaxSelect_tipo_educ\"><select class=\"sc-js-input scFormObjectOdd css_tipo_educ_obj\" style=\"\" id=\"id_sc_field_tipo_educ\" name=\"tipo_educ\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_tipo_educ'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tipo_educ) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tipo_educ)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_educ_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_educ_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_grado_label" id="hidden_field_label_id_grado" style="<?php echo $sStyleHidden_id_grado; ?>"><span id="id_label_id_grado"><?php echo $this->nm_new_label['id_grado']; ?></span></TD>
    <TD class="scFormDataOdd css_id_grado_line" id="hidden_field_data_id_grado" style="<?php echo $sStyleHidden_id_grado; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_grado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_grado"]) &&  $this->nmgp_cmp_readonly["id_grado"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado'] = array(); 
}
if ($this->tipo_educ != "")
{ 
   $this->nm_clear_val("tipo_educ");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado'] = array(); 
    }
   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
WHERE id_nivel = $this->tipo_educ
ORDER BY id_grado";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado'] = array(); 
}
if ($this->tipo_educ != "")
{ 
   $this->nm_clear_val("tipo_educ");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado'] = array(); 
    }
   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
WHERE id_nivel = $this->tipo_educ
ORDER BY id_grado";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_grado'][] = $rs->fields[0];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_grado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_grado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_director_grupo']))
   {
       $this->nm_new_label['id_director_grupo'] = "Director Grupo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_director_grupo = $this->id_director_grupo;
   $sStyleHidden_id_director_grupo = '';
   if (isset($this->nmgp_cmp_hidden['id_director_grupo']) && $this->nmgp_cmp_hidden['id_director_grupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_director_grupo']);
       $sStyleHidden_id_director_grupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_director_grupo = 'display: none;';
   $sStyleReadInp_id_director_grupo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_director_grupo']) && $this->nmgp_cmp_readonly['id_director_grupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_director_grupo']);
       $sStyleReadLab_id_director_grupo = '';
       $sStyleReadInp_id_director_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_director_grupo']) && $this->nmgp_cmp_hidden['id_director_grupo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_director_grupo" value="<?php echo $this->form_encode_input($this->id_director_grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_director_grupo_label" id="hidden_field_label_id_director_grupo" style="<?php echo $sStyleHidden_id_director_grupo; ?>"><span id="id_label_id_director_grupo"><?php echo $this->nm_new_label['id_director_grupo']; ?></span></TD>
    <TD class="scFormDataOdd css_id_director_grupo_line" id="hidden_field_data_id_director_grupo" style="<?php echo $sStyleHidden_id_director_grupo; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_director_grupo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_director_grupo"]) &&  $this->nmgp_cmp_readonly["id_director_grupo"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT id_docente, concat(primer_apellido,' ', segundo_apellido,' ',primer_nombre,' ', segundo_nombre)  FROM docentes  ORDER BY primer_apellido, segundo_apellido, primer_nombre, segundo_nombre";
   }
   else
   {
       $nm_comando = "SELECT id_docente, primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre  FROM docentes  ORDER BY primer_apellido, segundo_apellido, primer_nombre, segundo_nombre";
   }
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'][] = $rs->fields[0];
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
   $id_director_grupo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_director_grupo_1))
          {
              foreach ($this->id_director_grupo_1 as $tmp_id_director_grupo)
              {
                  if (trim($tmp_id_director_grupo) === trim($cadaselect[1])) { $id_director_grupo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_director_grupo) === trim($cadaselect[1])) { $id_director_grupo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_director_grupo" value="<?php echo $this->form_encode_input($id_director_grupo) . "\">" . $id_director_grupo_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT id_docente, concat(primer_apellido,' ', segundo_apellido,' ',primer_nombre,' ', segundo_nombre)  FROM docentes  ORDER BY primer_apellido, segundo_apellido, primer_nombre, segundo_nombre";
   }
   else
   {
       $nm_comando = "SELECT id_docente, primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre  FROM docentes  ORDER BY primer_apellido, segundo_apellido, primer_nombre, segundo_nombre";
   }
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'][] = $rs->fields[0];
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
   $id_director_grupo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_director_grupo_1))
          {
              foreach ($this->id_director_grupo_1 as $tmp_id_director_grupo)
              {
                  if (trim($tmp_id_director_grupo) === trim($cadaselect[1])) { $id_director_grupo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_director_grupo) === trim($cadaselect[1])) { $id_director_grupo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_director_grupo_look))
          {
              $id_director_grupo_look = $this->id_director_grupo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_director_grupo\" class=\"css_id_director_grupo_line\" style=\"" .  $sStyleReadLab_id_director_grupo . "\">" . $this->form_encode_input($id_director_grupo_look) . "</span><span id=\"id_read_off_id_director_grupo\" style=\"" . $sStyleReadInp_id_director_grupo . "\">";
   echo " <span id=\"idAjaxSelect_id_director_grupo\"><select class=\"sc-js-input scFormObjectOdd css_id_director_grupo_obj\" style=\"\" id=\"id_sc_field_id_director_grupo\" name=\"id_director_grupo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_director_grupo'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_director_grupo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_director_grupo)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_director_grupo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_director_grupo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_sede_label" id="hidden_field_label_id_sede" style="<?php echo $sStyleHidden_id_sede; ?>"><span id="id_label_id_sede"><?php echo $this->nm_new_label['id_sede']; ?></span></TD>
    <TD class="scFormDataOdd css_id_sede_line" id="hidden_field_data_id_sede" style="<?php echo $sStyleHidden_id_sede; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_sede_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_sede"]) &&  $this->nmgp_cmp_readonly["id_sede"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'] = array(); 
    }
   $nm_comando = "SELECT id_sede, sede 
FROM sedes 
ORDER BY id_sede";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'] = array(); 
    }
   $nm_comando = "SELECT id_sede, sede 
FROM sedes 
ORDER BY id_sede";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_id_sede'][] = 'null'; 
   echo "  <option value=\"null\">Seleccione</option>" ; 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_sede_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_sede_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['modalidad']))
   {
       $this->nm_new_label['modalidad'] = "Modalidad";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $modalidad = $this->modalidad;
   $sStyleHidden_modalidad = '';
   if (isset($this->nmgp_cmp_hidden['modalidad']) && $this->nmgp_cmp_hidden['modalidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['modalidad']);
       $sStyleHidden_modalidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_modalidad = 'display: none;';
   $sStyleReadInp_modalidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['modalidad']) && $this->nmgp_cmp_readonly['modalidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['modalidad']);
       $sStyleReadLab_modalidad = '';
       $sStyleReadInp_modalidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['modalidad']) && $this->nmgp_cmp_hidden['modalidad'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="modalidad" value="<?php echo $this->form_encode_input($this->modalidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_modalidad_label" id="hidden_field_label_modalidad" style="<?php echo $sStyleHidden_modalidad; ?>"><span id="id_label_modalidad"><?php echo $this->nm_new_label['modalidad']; ?></span></TD>
    <TD class="scFormDataOdd css_modalidad_line" id="hidden_field_data_modalidad" style="<?php echo $sStyleHidden_modalidad; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_modalidad_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["modalidad"]) &&  $this->nmgp_cmp_readonly["modalidad"] == "on") { 

$modalidad_look = "";
 if ($this->modalidad == "A") { $modalidad_look .= "Académico" ;} 
 if ($this->modalidad == "T") { $modalidad_look .= "Técnico" ;} 
 if (empty($modalidad_look)) { $modalidad_look = $this->modalidad; }
?>
<input type="hidden" name="modalidad" value="<?php echo $this->form_encode_input($modalidad) . "\">" . $modalidad_look . ""; ?>
<?php } else { ?>
<?php

$modalidad_look = "";
 if ($this->modalidad == "A") { $modalidad_look .= "Académico" ;} 
 if ($this->modalidad == "T") { $modalidad_look .= "Técnico" ;} 
 if (empty($modalidad_look)) { $modalidad_look = $this->modalidad; }
?>
<span id="id_read_on_modalidad" class="css_modalidad_line"  style="<?php echo $sStyleReadLab_modalidad; ?>"><?php echo $this->form_encode_input($modalidad_look); ?></span><span id="id_read_off_modalidad" style="<?php echo $sStyleReadInp_modalidad; ?>">
 <span id="idAjaxSelect_modalidad"><select class="sc-js-input scFormObjectOdd css_modalidad_obj" style="" id="id_sc_field_modalidad" name="modalidad" size="1" alt="{type: 'select', enterTab: false}">
 <option value="A" <?php  if ($this->modalidad == "A") { echo " selected" ;} ?>>Académico</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_modalidad'][] = 'A'; ?>
 <option value="T" <?php  if ($this->modalidad == "T") { echo " selected" ;} ?>>Técnico</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_modalidad'][] = 'T'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modalidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modalidad_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['calendario']))
   {
       $this->nm_new_label['calendario'] = "Calendario";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $calendario = $this->calendario;
   if (!isset($this->nmgp_cmp_hidden['calendario']))
   {
       $this->nmgp_cmp_hidden['calendario'] = 'off';
   }
   $sStyleHidden_calendario = '';
   if (isset($this->nmgp_cmp_hidden['calendario']) && $this->nmgp_cmp_hidden['calendario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['calendario']);
       $sStyleHidden_calendario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_calendario = 'display: none;';
   $sStyleReadInp_calendario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['calendario']) && $this->nmgp_cmp_readonly['calendario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['calendario']);
       $sStyleReadLab_calendario = '';
       $sStyleReadInp_calendario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['calendario']) && $this->nmgp_cmp_hidden['calendario'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="calendario" value="<?php echo $this->form_encode_input($this->calendario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_calendario_label" id="hidden_field_label_calendario" style="<?php echo $sStyleHidden_calendario; ?>"><span id="id_label_calendario"><?php echo $this->nm_new_label['calendario']; ?></span></TD>
    <TD class="scFormDataOdd css_calendario_line" id="hidden_field_data_calendario" style="<?php echo $sStyleHidden_calendario; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_calendario_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["calendario"]) &&  $this->nmgp_cmp_readonly["calendario"] == "on") { 

$calendario_look = "";
 if ($this->calendario == "A") { $calendario_look .= "A" ;} 
 if ($this->calendario == "B") { $calendario_look .= "B" ;} 
 if (empty($calendario_look)) { $calendario_look = $this->calendario; }
?>
<input type="hidden" name="calendario" value="<?php echo $this->form_encode_input($calendario) . "\">" . $calendario_look . ""; ?>
<?php } else { ?>
<?php

$calendario_look = "";
 if ($this->calendario == "A") { $calendario_look .= "A" ;} 
 if ($this->calendario == "B") { $calendario_look .= "B" ;} 
 if (empty($calendario_look)) { $calendario_look = $this->calendario; }
?>
<span id="id_read_on_calendario" class="css_calendario_line"  style="<?php echo $sStyleReadLab_calendario; ?>"><?php echo $this->form_encode_input($calendario_look); ?></span><span id="id_read_off_calendario" style="<?php echo $sStyleReadInp_calendario; ?>">
 <span id="idAjaxSelect_calendario"><select class="sc-js-input scFormObjectOdd css_calendario_obj" style="" id="id_sc_field_calendario" name="calendario" size="1" alt="{type: 'select', enterTab: false}">
 <option value="A" <?php  if ($this->calendario == "A") { echo " selected" ;} ?>>A</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_calendario'][] = 'A'; ?>
 <option value="B" <?php  if ($this->calendario == "B") { echo " selected" ;} ?>>B</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_calendario'][] = 'B'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_calendario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_calendario_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['entorno']))
    {
        $this->nm_new_label['entorno'] = "Entorno";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $entorno = $this->entorno;
   if (!isset($this->nmgp_cmp_hidden['entorno']))
   {
       $this->nmgp_cmp_hidden['entorno'] = 'off';
   }
   $sStyleHidden_entorno = '';
   if (isset($this->nmgp_cmp_hidden['entorno']) && $this->nmgp_cmp_hidden['entorno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['entorno']);
       $sStyleHidden_entorno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_entorno = 'display: none;';
   $sStyleReadInp_entorno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['entorno']) && $this->nmgp_cmp_readonly['entorno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['entorno']);
       $sStyleReadLab_entorno = '';
       $sStyleReadInp_entorno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['entorno']) && $this->nmgp_cmp_hidden['entorno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="entorno" value="<?php echo $this->form_encode_input($entorno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_entorno_label" id="hidden_field_label_entorno" style="<?php echo $sStyleHidden_entorno; ?>"><span id="id_label_entorno"><?php echo $this->nm_new_label['entorno']; ?></span></TD>
    <TD class="scFormDataOdd css_entorno_line" id="hidden_field_data_entorno" style="<?php echo $sStyleHidden_entorno; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_entorno_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["entorno"]) &&  $this->nmgp_cmp_readonly["entorno"] == "on") { 

 ?>
<input type="hidden" name="entorno" value="<?php echo $this->form_encode_input($entorno) . "\">" . $entorno . ""; ?>
<?php } else { ?>
<span id="id_read_on_entorno" class="sc-ui-readonly-entorno css_entorno_line" style="<?php echo $sStyleReadLab_entorno; ?>"><?php echo $this->form_encode_input($this->entorno); ?></span><span id="id_read_off_entorno" style="white-space: nowrap;<?php echo $sStyleReadInp_entorno; ?>">
 <input class="sc-js-input scFormObjectOdd css_entorno_obj" style="" id="id_sc_field_entorno" type=text name="entorno" value="<?php echo $this->form_encode_input($entorno) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_entorno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_entorno_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
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
   if (!isset($this->nm_new_label['estudiantes']))
   {
       $this->nm_new_label['estudiantes'] = "Estudiantes";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estudiantes = $this->estudiantes;
   $sStyleHidden_estudiantes = '';
   if (isset($this->nmgp_cmp_hidden['estudiantes']) && $this->nmgp_cmp_hidden['estudiantes'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estudiantes']);
       $sStyleHidden_estudiantes = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estudiantes = 'display: none;';
   $sStyleReadInp_estudiantes = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estudiantes']) && $this->nmgp_cmp_readonly['estudiantes'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estudiantes']);
       $sStyleReadLab_estudiantes = '';
       $sStyleReadInp_estudiantes = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estudiantes']) && $this->nmgp_cmp_hidden['estudiantes'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="estudiantes" value="<?php echo $this->form_encode_input($this->estudiantes_hidden) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php  $this->estudiantes_1 = explode("@?@", $this->estudiantes) ; ?>
    <TD class="scFormLabelOdd scUiLabelWidthFix css_estudiantes_label" id="hidden_field_label_estudiantes" style="<?php echo $sStyleHidden_estudiantes; ?>"><span id="id_label_estudiantes"><?php echo $this->nm_new_label['estudiantes']; ?></span></TD>
    <TD class="scFormDataOdd css_estudiantes_line" id="hidden_field_data_estudiantes" style="<?php echo $sStyleHidden_estudiantes; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estudiantes_line" style="vertical-align: top;padding: 0px"> 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_estudiantes']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_estudiantes'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_estudiantes']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_estudiantes'] = array(); 
}
if ($this->id_grado != "")
{ 
   $this->nm_clear_val("id_grado");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_estudiantes']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_estudiantes'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_estudiantes']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_estudiantes'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "select students.idstudents, concat(primer_apellido,' ',segundo_apellido,' ',primer_nombre,' ',segundo_nombre)  from students INNER JOIN matricula ON students.idstudents = matricula.idstudents  WHERE grado_igreso = $this->id_grado order by primer_apellido";
   }
   else
   {
       $nm_comando = "select students.idstudents, primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre  from students INNER JOIN matricula ON students.idstudents = matricula.idstudents  WHERE grado_igreso = $this->id_grado order by primer_apellido";
   }
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['Lookup_estudiantes'][] = $rs->fields[0];
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
   $estudiantes_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          foreach ($this->estudiantes_1 as $Dados)
          {
              if ($Dados === $cadaselect[1])
              {
                  $estudiantes_look .= $cadaselect[0] . "<br>";
                  break;
              }
          }
          $x++; 
   }
          if (empty($estudiantes_look))
          {
              $estudiantes_look = $this->estudiantes;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_estudiantes\" class=\"css_estudiantes_line\" style=\"" .  $sStyleReadLab_estudiantes . "\">" . $this->form_encode_input($estudiantes_look) . "</span><span id=\"id_read_off_estudiantes\" style=\"" . $sStyleReadInp_estudiantes . "\">";
   echo "<table style=\"display: inline-block\"><tr><td>" ; 
   echo " <span id=\"idAjaxSelect_estudiantes\"><select class=\"sc-js-input scFormObjectOdd css_estudiantes_obj\" style=\"\" id=\"id_sc_field_estudiantes\" name=\"estudiantes_orig\" size=\"7\" multiple onDblClick=\"nm_add_sel('estudiantes_orig', 'estudiantes_dest', null);  \" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          foreach ($this->estudiantes_1 as $Dados)
          {
              if ($Dados === $cadaselect[1])
              {
                  echo " disabled=\"disabled\" style=\"color: #A0A0A0\"";
                  break;
              }
          }
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "</td>";
   echo "<td align=\"center\">";
   echo "<div class='scBtnPassField' id='estudiantes_all_right'>";
   echo         $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpassfld_rightall", "nm_add_all('estudiantes_orig', 'estudiantes_dest', null);    return false;", "nm_add_all('estudiantes_orig', 'estudiantes_dest', null);    return false;", "Bbpassfld_rightall", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
;
   echo "</div>";
   echo "<div class='scBtnPassField'>";
   echo         $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpassfld_right", "nm_add_sel('estudiantes_orig', 'estudiantes_dest', null);    return false;", "nm_add_sel('estudiantes_orig', 'estudiantes_dest', null);    return false;", "Bbpassfld_righ", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
;
   echo "</div>";
   echo "<div class='scBtnPassField'>";
   echo         $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpassfld_left", "nm_del_sel('estudiantes_dest', 'estudiantes_orig', null);    return false;", "nm_del_sel('estudiantes_dest', 'estudiantes_orig', null);    return false;", "Bbpassfld_left", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
;
   echo "</div>";
   echo "<div class='scBtnPassField' id='estudiantes_all_left'>";
   echo         $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpassfld_leftall", "nm_del_all('estudiantes_dest', 'estudiantes_orig', null);    return false;", "nm_del_all('estudiantes_dest', 'estudiantes_orig', null);    return false;", "Bbpassfld_leftall", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
;
   echo "</div>";
   echo "</td>";
   echo "<td>";
   echo " <select class=\"sc-js-input scFormObjectOdd css_estudiantes_obj\" style=\"\" name=\"estudiantes_dest\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  size=7 multiple onDblClick=\"nm_del_sel('estudiantes_dest', 'estudiantes_orig', null);  \" alt=\"{type: 'select', enterTab: false}\">";
   $x = 0 ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          foreach ($this->estudiantes_1 as $Dados)
          {
              if ($Dados === $cadaselect[1])
              {
                  echo "  <option value=\"$cadaselect[1]\" selected>$cadaselect[0] </option>"; 
                  break;
              }
          }
          $x++ ; 
   }  ; 
   echo " </select>" ; 
   echo " <input type=\"hidden\" name=\"estudiantes\" value=\"\">" ; 
   echo "</td></tr></table>";
   echo " <script>document.F1.estudiantes_dest.selectedIndex = -1;</script>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estudiantes_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estudiantes_text"></span></td></tr></table></td></tr></table></TD>
   
<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


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
    if (!isset($this->nm_new_label['asig_academ']))
    {
        $this->nm_new_label['asig_academ'] = "Asignación Académica";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $asig_academ = $this->asig_academ;
   $sStyleHidden_asig_academ = '';
   if (isset($this->nmgp_cmp_hidden['asig_academ']) && $this->nmgp_cmp_hidden['asig_academ'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['asig_academ']);
       $sStyleHidden_asig_academ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_asig_academ = 'display: none;';
   $sStyleReadInp_asig_academ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['asig_academ']) && $this->nmgp_cmp_readonly['asig_academ'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['asig_academ']);
       $sStyleReadLab_asig_academ = '';
       $sStyleReadInp_asig_academ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['asig_academ']) && $this->nmgp_cmp_hidden['asig_academ'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="asig_academ" value="<?php echo $this->form_encode_input($asig_academ) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_asig_academ_label" id="hidden_field_label_asig_academ" style="<?php echo $sStyleHidden_asig_academ; ?>"><span id="id_label_asig_academ"><?php echo $this->nm_new_label['asig_academ']; ?></span></TD>
    <TD class="scFormDataOdd css_asig_academ_line" id="hidden_field_data_asig_academ" style="<?php echo $sStyleHidden_asig_academ; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_asig_academ_line" style="vertical-align: top;padding: 0px">
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['embutida_parms'] = "par_grupo?#?" . $this->nmgp_dados_form['id_grupo'] . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['foreign_key']['id_grupo'] = $this->nmgp_dados_form['id_grupo'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['where_filter'] = "id_grupo = " . $this->nmgp_dados_form['id_grupo'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['where_detal']  = "id_grupo = " . $this->nmgp_dados_form['id_grupo'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_grupo_x_asig_x_doce']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_t_grupos_empty.htm' : $this->Ini->link_form_grupo_x_asig_x_doce_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=500');
?>
<iframe border="0" id="nmsc_iframe_liga_form_grupo_x_asig_x_doce"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="850" name="nmsc_iframe_liga_form_grupo_x_asig_x_doce"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_asig_academ_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_asig_academ_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
<?php
  }
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['masterValue']);
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
 parent.scAjaxDetailStatus("form_t_grupos");
 parent.scAjaxDetailHeight("form_t_grupos", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_t_grupos", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_t_grupos", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_grupos']['sc_modal'])
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
