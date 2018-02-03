<?php
class form_valoracion_form extends form_valoracion_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - valoracion"); } else { echo strip_tags("Valoración Alfanumerica"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_valoracion/form_valoracion_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_valoracion_sajax_js.php");
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

 function nm_field_disabled(Fields, Opt, Seq, Opcao) {
  if (Opcao != null) {
      opcao = Opcao;
  }
  else {
      opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  }
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
     ini = 1;
     xx = document.F1.sc_contr_vert.value;
     if (Seq != null) 
     {
         ini = parseInt(Seq);
         xx  = ini + 1;
     }
     if (F_name == "minimo_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "minimo_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "maximo_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "maximo_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "letra_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "letra_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("minimo_=enabled", "", i);
    nm_field_disabled("maximo_=enabled", "", i);
    nm_field_disabled("letra_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_valoracion_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  sc_form_onload();

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

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['recarga'];
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
 include_once("form_valoracion_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_valoracion'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_valoracion'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - valoracion"; } else { echo "Valoración Alfanumerica"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterarsel", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['orden_']))
   {
       $this->nmgp_cmp_hidden['orden_'] = 'off';
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


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['valoracion_']) && $this->nmgp_cmp_hidden['valoracion_'] == 'off') { $sStyleHidden_valoracion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['valoracion_']) || $this->nmgp_cmp_hidden['valoracion_'] == 'on') {
      if (!isset($this->nm_new_label['valoracion_'])) {
          $this->nm_new_label['valoracion_'] = "Valoracion"; } ?>

    <TD class="scFormLabelOddMult css_valoracion__label" id="hidden_field_label_valoracion_" style="<?php echo $sStyleHidden_valoracion_; ?>" > <?php echo $this->nm_new_label['valoracion_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['minimo_']) && $this->nmgp_cmp_hidden['minimo_'] == 'off') { $sStyleHidden_minimo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['minimo_']) || $this->nmgp_cmp_hidden['minimo_'] == 'on') {
      if (!isset($this->nm_new_label['minimo_'])) {
          $this->nm_new_label['minimo_'] = "Minimo"; } ?>

    <TD class="scFormLabelOddMult css_minimo__label" id="hidden_field_label_minimo_" style="<?php echo $sStyleHidden_minimo_; ?>" > <?php echo $this->nm_new_label['minimo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['maximo_']) && $this->nmgp_cmp_hidden['maximo_'] == 'off') { $sStyleHidden_maximo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['maximo_']) || $this->nmgp_cmp_hidden['maximo_'] == 'on') {
      if (!isset($this->nm_new_label['maximo_'])) {
          $this->nm_new_label['maximo_'] = "Maximo"; } ?>

    <TD class="scFormLabelOddMult css_maximo__label" id="hidden_field_label_maximo_" style="<?php echo $sStyleHidden_maximo_; ?>" > <?php echo $this->nm_new_label['maximo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['letra_']) && $this->nmgp_cmp_hidden['letra_'] == 'off') { $sStyleHidden_letra_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['letra_']) || $this->nmgp_cmp_hidden['letra_'] == 'on') {
      if (!isset($this->nm_new_label['letra_'])) {
          $this->nm_new_label['letra_'] = "Letra"; } ?>

    <TD class="scFormLabelOddMult css_letra__label" id="hidden_field_label_letra_" style="<?php echo $sStyleHidden_letra_; ?>" > <?php echo $this->nm_new_label['letra_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['orden_']) && $this->nmgp_cmp_hidden['orden_'] == 'off') { $sStyleHidden_orden_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['orden_']) || $this->nmgp_cmp_hidden['orden_'] == 'on') {
      if (!isset($this->nm_new_label['orden_'])) {
          $this->nm_new_label['orden_'] = "Orden"; } ?>

    <TD class="scFormLabelOddMult css_orden__label" id="hidden_field_label_orden_" style="<?php echo $sStyleHidden_orden_; ?>" > <?php echo $this->nm_new_label['orden_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_valoracion);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_valoracion = $this->form_vert_form_valoracion;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_valoracion))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoracion_']))
           {
               $this->nmgp_cmp_readonly['valoracion_'] = 'on';
           }
   foreach ($this->form_vert_form_valoracion as $sc_seq_vert => $sc_lixo)
   {
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['valoracion_'] = true;
           $this->nmgp_cmp_readonly['minimo_'] = true;
           $this->nmgp_cmp_readonly['maximo_'] = true;
           $this->nmgp_cmp_readonly['letra_'] = true;
           $this->nmgp_cmp_readonly['orden_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['valoracion_']) || $this->nmgp_cmp_readonly['valoracion_'] != "on") {$this->nmgp_cmp_readonly['valoracion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['minimo_']) || $this->nmgp_cmp_readonly['minimo_'] != "on") {$this->nmgp_cmp_readonly['minimo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['maximo_']) || $this->nmgp_cmp_readonly['maximo_'] != "on") {$this->nmgp_cmp_readonly['maximo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['letra_']) || $this->nmgp_cmp_readonly['letra_'] != "on") {$this->nmgp_cmp_readonly['letra_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['orden_']) || $this->nmgp_cmp_readonly['orden_'] != "on") {$this->nmgp_cmp_readonly['orden_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->valoracion_ = $this->form_vert_form_valoracion[$sc_seq_vert]['valoracion_']; 
       $valoracion_ = $this->valoracion_; 
       $sStyleHidden_valoracion_ = '';
       if (isset($sCheckRead_valoracion_))
       {
           unset($sCheckRead_valoracion_);
       }
       if (isset($this->nmgp_cmp_readonly['valoracion_']))
       {
           $sCheckRead_valoracion_ = $this->nmgp_cmp_readonly['valoracion_'];
       }
       if (isset($this->nmgp_cmp_hidden['valoracion_']) && $this->nmgp_cmp_hidden['valoracion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['valoracion_']);
           $sStyleHidden_valoracion_ = 'display: none;';
       }
       $bTestReadOnly_valoracion_ = true;
       $sStyleReadLab_valoracion_ = 'display: none;';
       $sStyleReadInp_valoracion_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoracion_"]) &&  $this->nmgp_cmp_readonly["valoracion_"] == "on"))
       {
           $bTestReadOnly_valoracion_ = false;
           unset($this->nmgp_cmp_readonly['valoracion_']);
           $sStyleReadLab_valoracion_ = '';
           $sStyleReadInp_valoracion_ = 'display: none;';
       }
       $this->minimo_ = $this->form_vert_form_valoracion[$sc_seq_vert]['minimo_']; 
       $minimo_ = $this->minimo_; 
       $sStyleHidden_minimo_ = '';
       if (isset($sCheckRead_minimo_))
       {
           unset($sCheckRead_minimo_);
       }
       if (isset($this->nmgp_cmp_readonly['minimo_']))
       {
           $sCheckRead_minimo_ = $this->nmgp_cmp_readonly['minimo_'];
       }
       if (isset($this->nmgp_cmp_hidden['minimo_']) && $this->nmgp_cmp_hidden['minimo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['minimo_']);
           $sStyleHidden_minimo_ = 'display: none;';
       }
       $bTestReadOnly_minimo_ = true;
       $sStyleReadLab_minimo_ = 'display: none;';
       $sStyleReadInp_minimo_ = '';
       if (isset($this->nmgp_cmp_readonly['minimo_']) && $this->nmgp_cmp_readonly['minimo_'] == 'on')
       {
           $bTestReadOnly_minimo_ = false;
           unset($this->nmgp_cmp_readonly['minimo_']);
           $sStyleReadLab_minimo_ = '';
           $sStyleReadInp_minimo_ = 'display: none;';
       }
       $this->maximo_ = $this->form_vert_form_valoracion[$sc_seq_vert]['maximo_']; 
       $maximo_ = $this->maximo_; 
       $sStyleHidden_maximo_ = '';
       if (isset($sCheckRead_maximo_))
       {
           unset($sCheckRead_maximo_);
       }
       if (isset($this->nmgp_cmp_readonly['maximo_']))
       {
           $sCheckRead_maximo_ = $this->nmgp_cmp_readonly['maximo_'];
       }
       if (isset($this->nmgp_cmp_hidden['maximo_']) && $this->nmgp_cmp_hidden['maximo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['maximo_']);
           $sStyleHidden_maximo_ = 'display: none;';
       }
       $bTestReadOnly_maximo_ = true;
       $sStyleReadLab_maximo_ = 'display: none;';
       $sStyleReadInp_maximo_ = '';
       if (isset($this->nmgp_cmp_readonly['maximo_']) && $this->nmgp_cmp_readonly['maximo_'] == 'on')
       {
           $bTestReadOnly_maximo_ = false;
           unset($this->nmgp_cmp_readonly['maximo_']);
           $sStyleReadLab_maximo_ = '';
           $sStyleReadInp_maximo_ = 'display: none;';
       }
       $this->letra_ = $this->form_vert_form_valoracion[$sc_seq_vert]['letra_']; 
       $letra_ = $this->letra_; 
       $sStyleHidden_letra_ = '';
       if (isset($sCheckRead_letra_))
       {
           unset($sCheckRead_letra_);
       }
       if (isset($this->nmgp_cmp_readonly['letra_']))
       {
           $sCheckRead_letra_ = $this->nmgp_cmp_readonly['letra_'];
       }
       if (isset($this->nmgp_cmp_hidden['letra_']) && $this->nmgp_cmp_hidden['letra_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['letra_']);
           $sStyleHidden_letra_ = 'display: none;';
       }
       $bTestReadOnly_letra_ = true;
       $sStyleReadLab_letra_ = 'display: none;';
       $sStyleReadInp_letra_ = '';
       if (isset($this->nmgp_cmp_readonly['letra_']) && $this->nmgp_cmp_readonly['letra_'] == 'on')
       {
           $bTestReadOnly_letra_ = false;
           unset($this->nmgp_cmp_readonly['letra_']);
           $sStyleReadLab_letra_ = '';
           $sStyleReadInp_letra_ = 'display: none;';
       }
       $this->orden_ = $this->form_vert_form_valoracion[$sc_seq_vert]['orden_']; 
       $orden_ = $this->orden_; 
       if (!isset($this->nmgp_cmp_hidden['orden_']))
       {
           $this->nmgp_cmp_hidden['orden_'] = 'off';
       }
       $sStyleHidden_orden_ = '';
       if (isset($sCheckRead_orden_))
       {
           unset($sCheckRead_orden_);
       }
       if (isset($this->nmgp_cmp_readonly['orden_']))
       {
           $sCheckRead_orden_ = $this->nmgp_cmp_readonly['orden_'];
       }
       if (isset($this->nmgp_cmp_hidden['orden_']) && $this->nmgp_cmp_hidden['orden_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['orden_']);
           $sStyleHidden_orden_ = 'display: none;';
       }
       $bTestReadOnly_orden_ = true;
       $sStyleReadLab_orden_ = 'display: none;';
       $sStyleReadInp_orden_ = '';
       if (isset($this->nmgp_cmp_readonly['orden_']) && $this->nmgp_cmp_readonly['orden_'] == 'on')
       {
           $bTestReadOnly_orden_ = false;
           unset($this->nmgp_cmp_readonly['orden_']);
           $sStyleReadLab_orden_ = '';
           $sStyleReadInp_orden_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_valoracion_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_valoracion_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_valoracion_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_valoracion_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_valoracion_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_valoracion_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['valoracion_']) && $this->nmgp_cmp_hidden['valoracion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoracion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valoracion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_valoracion__line" id="hidden_field_data_valoracion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_valoracion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_valoracion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_valoracion_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoracion_"]) &&  $this->nmgp_cmp_readonly["valoracion_"] == "on")) { 

 ?>
<input type="hidden" name="valoracion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valoracion_) . "\"><span id=\"id_ajax_label_valoracion_" . $sc_seq_vert . "\">" . $valoracion_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoracion_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-valoracion_<?php echo $sc_seq_vert ?> css_valoracion__line" style="<?php echo $sStyleReadLab_valoracion_; ?>"><?php echo $this->form_encode_input($this->valoracion_); ?></span><span id="id_read_off_valoracion_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valoracion_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_valoracion__obj" style="" id="id_sc_field_valoracion_<?php echo $sc_seq_vert ?>" type=text name="valoracion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valoracion_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoracion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoracion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['minimo_']) && $this->nmgp_cmp_hidden['minimo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="minimo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($minimo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_minimo__line" id="hidden_field_data_minimo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_minimo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_minimo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_minimo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["minimo_"]) &&  $this->nmgp_cmp_readonly["minimo_"] == "on") { 

 ?>
<input type="hidden" name="minimo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($minimo_) . "\">" . $minimo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_minimo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-minimo_<?php echo $sc_seq_vert ?> css_minimo__line" style="<?php echo $sStyleReadLab_minimo_; ?>"><?php echo $this->form_encode_input($this->minimo_); ?></span><span id="id_read_off_minimo_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_minimo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_minimo__obj" style="" id="id_sc_field_minimo_<?php echo $sc_seq_vert ?>" type=text name="minimo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($minimo_) ?>"
 size=4 alt="{datatype: 'decimal', maxLength: 4, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['minimo_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['minimo_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['minimo_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_minimo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_minimo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['maximo_']) && $this->nmgp_cmp_hidden['maximo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="maximo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($maximo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_maximo__line" id="hidden_field_data_maximo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_maximo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_maximo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_maximo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["maximo_"]) &&  $this->nmgp_cmp_readonly["maximo_"] == "on") { 

 ?>
<input type="hidden" name="maximo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($maximo_) . "\">" . $maximo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_maximo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-maximo_<?php echo $sc_seq_vert ?> css_maximo__line" style="<?php echo $sStyleReadLab_maximo_; ?>"><?php echo $this->form_encode_input($this->maximo_); ?></span><span id="id_read_off_maximo_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_maximo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_maximo__obj" style="" id="id_sc_field_maximo_<?php echo $sc_seq_vert ?>" type=text name="maximo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($maximo_) ?>"
 size=4 alt="{datatype: 'decimal', maxLength: 4, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['maximo_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['maximo_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['maximo_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_maximo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_maximo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['letra_']) && $this->nmgp_cmp_hidden['letra_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="letra_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($letra_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_letra__line" id="hidden_field_data_letra_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_letra_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_letra__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_letra_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["letra_"]) &&  $this->nmgp_cmp_readonly["letra_"] == "on") { 

 ?>
<input type="hidden" name="letra_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($letra_) . "\">" . $letra_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_letra_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-letra_<?php echo $sc_seq_vert ?> css_letra__line" style="<?php echo $sStyleReadLab_letra_; ?>"><?php echo $this->form_encode_input($this->letra_); ?></span><span id="id_read_off_letra_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_letra_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_letra__obj" style="" id="id_sc_field_letra_<?php echo $sc_seq_vert ?>" type=text name="letra_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($letra_) ?>"
 size=2 maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_letra_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_letra_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['orden_']) && $this->nmgp_cmp_hidden['orden_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="orden_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($orden_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_orden__line" id="hidden_field_data_orden_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_orden_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_orden__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_orden_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["orden_"]) &&  $this->nmgp_cmp_readonly["orden_"] == "on") { 

 ?>
<input type="hidden" name="orden_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($orden_) . "\">" . $orden_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_orden_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-orden_<?php echo $sc_seq_vert ?> css_orden__line" style="<?php echo $sStyleReadLab_orden_; ?>"><?php echo $this->form_encode_input($this->orden_); ?></span><span id="id_read_off_orden_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_orden_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_orden__obj" style="" id="id_sc_field_orden_<?php echo $sc_seq_vert ?>" type=text name="orden_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($orden_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['orden_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['orden_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_orden_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_orden_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_valoracion_))
       {
           $this->nmgp_cmp_readonly['valoracion_'] = $sCheckRead_valoracion_;
       }
       if ('display: none;' == $sStyleHidden_valoracion_)
       {
           $this->nmgp_cmp_hidden['valoracion_'] = 'off';
       }
       if (isset($sCheckRead_minimo_))
       {
           $this->nmgp_cmp_readonly['minimo_'] = $sCheckRead_minimo_;
       }
       if ('display: none;' == $sStyleHidden_minimo_)
       {
           $this->nmgp_cmp_hidden['minimo_'] = 'off';
       }
       if (isset($sCheckRead_maximo_))
       {
           $this->nmgp_cmp_readonly['maximo_'] = $sCheckRead_maximo_;
       }
       if ('display: none;' == $sStyleHidden_maximo_)
       {
           $this->nmgp_cmp_hidden['maximo_'] = 'off';
       }
       if (isset($sCheckRead_letra_))
       {
           $this->nmgp_cmp_readonly['letra_'] = $sCheckRead_letra_;
       }
       if ('display: none;' == $sStyleHidden_letra_)
       {
           $this->nmgp_cmp_hidden['letra_'] = 'off';
       }
       if (isset($sCheckRead_orden_))
       {
           $this->nmgp_cmp_readonly['orden_'] = $sCheckRead_orden_;
       }
       if ('display: none;' == $sStyleHidden_orden_)
       {
           $this->nmgp_cmp_hidden['orden_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_valoracion = $guarda_form_vert_form_valoracion;
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['masterValue']);
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
 parent.scAjaxDetailStatus("form_valoracion");
 parent.scAjaxDetailHeight("form_valoracion", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_valoracion", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_valoracion", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_valoracion']['sc_modal'])
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
