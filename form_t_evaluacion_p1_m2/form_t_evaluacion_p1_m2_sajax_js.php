
 <form name="form_ajax_redir_1" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_outra_jan">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>
 <form name="form_ajax_redir_2" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_url_saida">
  <input type="hidden" name="script_case_init">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>

 <SCRIPT>
<?php
sajax_show_javascript();
?>

  function scCenterElement(oElem)
  {
    var $oElem    = $(oElem),
        $oWindow  = $(this),
        iElemTop  = Math.round(($oWindow.height() - $oElem.height()) / 2),
        iElemLeft = Math.round(($oWindow.width()  - $oElem.width())  / 2);

    $oElem.offset({top: iElemTop, left: iElemLeft});
  } // scCenterElement

  function scAjaxHideAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "none";
    }
  } // scAjaxHideAutocomp

  function scAjaxShowAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "";
      document.getElementById("id_ac_" + sFrameId).focus();
    }
  } // scAjaxShowAutocomp

  function scAjaxHideDebug()
  {
    if (document.getElementById("id_debug_window"))
    {
      document.getElementById("id_debug_window").style.display = "none";
      document.getElementById("id_debug_text").innerHTML = "";
    }
  } // scAjaxHideDebug

  function scAjaxShowDebug(oTemp)
  {
    if (!document.getElementById("id_debug_window"))
    {
      return;
    }
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["htmOutput"] && "" != oResp["htmOutput"])
    {
      document.getElementById("id_debug_window").style.display = "";
      document.getElementById("id_debug_text").innerHTML = scAjaxFormatDebug(oResp["htmOutput"]) + document.getElementById("id_debug_text").innerHTML;
      scCenterElement(document.getElementById("id_debug_window"));
    }
  } // scAjaxShowDebug

  function scAjaxFormatDebug(sDebugMsg)
  {
    return "<table class=\"scFormMessageTable\" style=\"margin: 1px; width: 100%\"><tr><td class=\"scFormMessageMessage\">" + scAjaxSpecCharParser(sDebugMsg) + "</td></tr></table>";
  } // scAjaxFormatDebug

  function scAjaxHideErrorDisplay(sErrorId, bForce)
  {
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "none";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = "";
      if (null == bForce)
      {
          bForce = true;
      }
      if (bForce)
      {
          var $oField = $('#id_sc_field_' + sErrorId);
          if (0 < $oField.length)
          {
              $oField.removeClass(sc_css_status);
          }
      }
    }
    if (document.getElementById("id_error_display_fixed"))
    {
      document.getElementById("id_error_display_fixed").style.display = "none";
    }
  } // scAjaxHideErrorDisplay

  function scAjaxShowErrorDisplay(sErrorId, sErrorMsg)
  {
    if (oResp && oResp['redirExitInfo'])
    {
      sErrorMsg += "<br /><input type=\"button\" onClick=\"window.location='" + oResp['redirExitInfo']['action'] + "'\" value=\"Ok\">";
    }
    sErrorMsg = scAjaxErrorSql(sErrorMsg);
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = sErrorMsg;
      if ("table" == sErrorId)
      {
        scCenterElement(document.getElementById("id_error_display_" + sErrorId + "_frame"));
      }
      var $oField = $('#id_sc_field_' + sErrorId);
      if (0 < $oField.length)
      {
        $oField.addClass(sc_css_status);
      }
    }
    if (ajax_error_list && ajax_error_list[sErrorId] && ajax_error_list[sErrorId]["timeout"] && 0 < ajax_error_list[sErrorId]["timeout"])
    {
      setTimeout("scAjaxHideErrorDisplay('" + sErrorId + "', false)", ajax_error_list[sErrorId]["timeout"] * 1000);
    }
    /*else if ("table" == sErrorId)
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.left = posDispLeft + "px";
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.top = posDispTop + "px";
    }*/
  } // scAjaxShowErrorDisplay

  var iErrorSqlId = 1;

  function scAjaxErrorSql(sErrorMsg)
  {
    var iTmpPos = sErrorMsg.indexOf("{SC_DB_ERROR_INI}"),
        sTmpId;
    while (-1 < iTmpPos)
    {
      sTmpId    = "sc_id_error_sql_" + iErrorSqlId;
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><span style=\"text-decoration: underline\" onClick=\"$('#" + sTmpId + "').show(); scCenterElement(document.getElementById('" + sTmpId + "'))\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_MID}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span><table class=\"scFormErrorTable\" id=\"" + sTmpId + "\" style=\"display: none; position: absolute\"><tr><td>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_CLS}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><br /><span onClick=\"$('#" + sTmpId + "').hide()\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_END}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span></td></tr></table>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_INI}");
      iErrorSqlId++;
    }
    return sErrorMsg;
  } // scAjaxErrorSql

  function scAjaxHideMessage()
  {
    if (document.getElementById("id_message_display_frame"))
    {
      document.getElementById("id_message_display_frame").style.display = "none";
      document.getElementById("id_message_display_text").innerHTML = "";
    }
  } // scAjaxHideMessage

  function scAjaxShowMessage()
  {
    if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"])
    {
      return;
    }
    _scAjaxShowMessage(scMsgDefTitle, oResp["msgDisplay"]["msgText"], false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
  } // scAjaxShowMessage

  var scMsgDefClose = "";

  function _scAjaxShowMessage(sTitle, sMessage, bModal, iTimeout, bButton, sButton, iTop, iLeft, iWidth, iHeight, sRedir, sTarget, sParam, bClose, bBodyIcon) {
    if ("" == sMessage) {
      if (bModal) {
        scMsgDefClick = "close_modal";
      }
      else {
        scMsgDefClick = "close";
      }
      _scAjaxMessageBtnClick();
      document.getElementById("id_message_display_title").innerHTML = scMsgDefTitle;
      document.getElementById("id_message_display_text").innerHTML = "";
      document.getElementById("id_message_display_buttone").value = scMsgDefButton;
      document.getElementById("id_message_display_buttond").style.display = "none";
    }
    else {
      document.getElementById("id_message_display_title").innerHTML = scAjaxSpecCharParser(sTitle);
      document.getElementById("id_message_display_text").innerHTML = scAjaxSpecCharParser(sMessage);
      document.getElementById("id_message_display_buttone").value = sButton;
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_title_line").style.display = (bClose || "" != sTitle) ? "" : "none";
      document.getElementById("id_message_display_close_icon").style.display = bClose ? "" : "none";
      if (document.getElementById("id_message_display_body_icon")) {
        document.getElementById("id_message_display_body_icon").style.display = bBodyIcon ? "" : "none";
      }
      $("#id_message_display_content").css('width', (0 < iWidth ? iWidth + 'px' : ''));
      $("#id_message_display_content").css('height', (0 < iHeight ? iHeight + 'px' : ''));
      if (bModal) {
        iWidth = iWidth || 250;
        iHeight = iHeight || 200;
        scMsgDefClose = "close_modal";
        tb_show('', '#TB_inline?height=' + (iHeight + 6) + '&width=' + (iWidth + 4) + '&inlineId=id_message_display_frame&modal=true', '');
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2_modal";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close_modal";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close_modal";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
      else
      {
        scMsgDefClose = "close";
        $("#id_message_display_frame").css('top', (0 < iTop ? iTop + 'px' : ''));
        $("#id_message_display_frame").css('left', (0 < iLeft ? iLeft + 'px' : ''));
        document.getElementById("id_message_display_frame").style.display = "";
        if (0 == iTop && 0 == iLeft) {
          scCenterElement(document.getElementById("id_message_display_frame"));
        }
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
    }
  } // _scAjaxShowMessage

  function _scAjaxMessageBtnClose() {
    switch (scMsgDefClose) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function _scAjaxMessageBtnClick() {
    switch (scMsgDefClick) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
      case "redir1":
        document.form_ajax_redir_1.submit();
        break;
      case "redir2":
        document.form_ajax_redir_2.submit();
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "redir2_modal":
        document.form_ajax_redir_2.submit();
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function scAjaxHasError()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "ERROR" == oResp["result"];
  } // scAjaxHasError

  function scAjaxIsOk()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "OK" == oResp["result"] || "SET" == oResp["result"];
  } // scAjaxIsOk

  function scAjaxIsSet()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "SET" == oResp["result"];
  } // scAjaxIsSet

  function scAjaxCalendarReload()
  {
    if (oResp["calendarReload"] && "OK" == oResp["calendarReload"])
    {
      self.parent.calendar_reload();
      self.parent.tb_remove();
    }
  } // scCalendarReload

  function scAjaxUpdateErrors(sType)
  {
    ajax_error_geral = "";
    oFieldErrors     = {};
    if (oResp["errList"])
    {
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if ("geral_form_t_evaluacion_p1_m2" == sTestField)
        {
          if (ajax_error_geral != '') { ajax_error_geral += '<br>';}
          ajax_error_geral += scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
        else
        {
          if (scFocusFirstErrorField && '' == scFocusFirstErrorName)
          {
            scFocusFirstErrorName = sTestField;
          }
          if (oResp["errList"][iFieldErrors]["numLinha"])
          {
            sTestField += oResp["errList"][iFieldErrors]["numLinha"];
          }
          if (!oFieldErrors[sTestField])
          {
            oFieldErrors[sTestField] = new Array();
          }
          oFieldErrors[sTestField][oFieldErrors[sTestField].length] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
      }
    }
    for (iUpdateErrors = 0; iUpdateErrors < ajax_field_list.length; iUpdateErrors++)
    {
      sTestField = ajax_field_list[iUpdateErrors];
      if (oFieldErrors[sTestField])
      {
        ajax_error_list[sTestField][sType] = oFieldErrors[sTestField];
      }
    }
  } // scAjaxUpdateErrors

  function scAjaxUpdateFieldErrors(sField, sType)
  {
    aFieldErrors = new Array();
    if (oResp["errList"])
    {
      iErrorPos  = 0;
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if (oResp["errList"][iFieldErrors]["numLinha"])
        {
          sTestField += oResp["errList"][iFieldErrors]["numLinha"];
        }
        if (sField == sTestField)
        {
          aFieldErrors[iErrorPos] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
          iErrorPos++;
        }
      }
    }
        if (ajax_error_list[sField])
        {
        ajax_error_list[sField][sType] = aFieldErrors;
        }
  } // scAjaxUpdateFieldErrors

  function scAjaxListErrors(bLabel)
  {
    bFirst        = false;
    sAppErrorText = "";
    if ("" != ajax_error_geral)
    {
      bFirst         = true;
      sAppErrorText += ajax_error_geral;
    }
    for (iFieldList = 0; iFieldList < ajax_field_list.length; iFieldList++)
    {
      sFieldError = scAjaxListFieldErrors(ajax_field_list[iFieldList], bLabel);
      if ("" != sFieldError)
      {
        if (bFirst)
        {
          bFirst         = false
          sAppErrorText += "<hr size=\"1\" width=\"80%\" />";
        }
        sAppErrorText += sFieldError;
      }
    }
    return sAppErrorText;
  } // scAjaxListErrors

  function scAjaxListFieldErrors(sField, bLabel)
  {
    sErrorText = "";
    for (iErrorType = 0; iErrorType < ajax_error_type.length; iErrorType++)
    {
      if (ajax_error_list[sField])
      {
        for (iListErrors = 0; iListErrors < ajax_error_list[sField][ajax_error_type[iErrorType]].length; iListErrors++)
        {
          if (bLabel)
          {
            sErrorText += ajax_error_list[sField]["label"] + ": ";
          }
          sErrorText += ajax_error_list[sField][ajax_error_type[iErrorType]][iListErrors] + "<br />";
        }
      }
    }
    return sErrorText;
  } // scAjaxListFieldErrors

  function scAjaxSetFields()
  {
    if (!oResp["fldList"])
    {
      return true;
    }
    for (iSetFields = 0; iSetFields < oResp["fldList"].length; iSetFields++)
    {
      var sFieldName = oResp["fldList"][iSetFields]["fldName"];
      var sFieldType = oResp["fldList"][iSetFields]["fldType"];
      if ("selectdd" == sFieldType)
      {
        var bSelectDD = true;
        sFieldType = "select";
      }
      else
      {
        var bSelectDD = false;
      }
      if (oResp["fldList"][iSetFields]["valList"])
      {
        var oFieldValues = oResp["fldList"][iSetFields]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (oResp["fldList"][iSetFields]["optList"])
      {
        var oFieldOptions = oResp["fldList"][iSetFields]["optList"];
      }
      else
      {
        var oFieldOptions = null;
      }
/*
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)) &&
          oFieldValues[0]['value'])
      {
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = oFieldValues[0]['value'];
      }
*/
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)))
      {
          sLabel_auto_Comp = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = sLabel_auto_Comp;
      }


      if (oResp["fldList"][iSetFields]["colNum"])
      {
        var iColNum = oResp["fldList"][iSetFields]["colNum"];
      }
      else
      {
        var iColNum = 1;
      }
      if (oResp["fldList"][iSetFields]["row"])
      {
        var iRow = oResp["fldList"][iSetFields]["row"];
      }
      else
      {
        var iRow = 1;
      }
      if (oResp["fldList"][iSetFields]["htmComp"])
      {
        var sHtmComp = oResp["fldList"][iSetFields]["htmComp"];
        sHtmComp     = sHtmComp.replace(/__AD__/gi, '"');
        sHtmComp     = sHtmComp.replace(/__AS__/gi, "'");
      }
      else
      {
        var sHtmComp = null;
      }
      if (oResp["fldList"][iSetFields]["imgFile"])
      {
        var sImgFile = oResp["fldList"][iSetFields]["imgFile"];
      }
      else
      {
        var sImgFile = "";
      }
      if (oResp["fldList"][iSetFields]["imgOrig"])
      {
        var sImgOrig = oResp["fldList"][iSetFields]["imgOrig"];
      }
      else
      {
        var sImgOrig = "";
      }
      if (oResp["fldList"][iSetFields]["keepImg"])
      {
        var sKeepImg = oResp["fldList"][iSetFields]["keepImg"];
      }
      else
      {
        var sKeepImg = "N";
      }
      if (oResp["fldList"][iSetFields]["hideName"])
      {
        var sHideName = oResp["fldList"][iSetFields]["hideName"];
      }
      else
      {
        var sHideName = "N";
      }
      if (oResp["fldList"][iSetFields]["imgLink"])
      {
        var sImgLink = oResp["fldList"][iSetFields]["imgLink"];
      }
      else
      {
        var sImgLink = null;
      }
      if (oResp["fldList"][iSetFields]["docLink"])
      {
        var sDocLink = oResp["fldList"][iSetFields]["docLink"];
      }
      else
      {
        var sDocLink = "";
      }
      if (oResp["fldList"][iSetFields]["docIcon"])
      {
        var sDocIcon = oResp["fldList"][iSetFields]["docIcon"];
      }
      else
      {
        var sDocIcon = "";
      }
      if (oResp["fldList"][iSetFields]["optComp"])
      {
        var sOptComp = oResp["fldList"][iSetFields]["optComp"];
      }
      else
      {
        var sOptComp = "";
      }
      if (oResp["fldList"][iSetFields]["optClass"])
      {
        var sOptClass = oResp["fldList"][iSetFields]["optClass"];
      }
      else
      {
        var sOptClass = "";
      }
      if (oResp["fldList"][iSetFields]["optMulti"])
      {
        var sOptMulti = oResp["fldList"][iSetFields]["optMulti"];
      }
      else
      {
        var sOptMulti = "";
      }
      if (oResp["fldList"][iSetFields]["imgHtml"])
      {
        var sImgHtml = oResp["fldList"][iSetFields]["imgHtml"];
      }
      else
      {
        var sImgHtml = "";
      }
      if (oResp["fldList"][iSetFields]["mulHtml"])
      {
        var sMULHtml = oResp["fldList"][iSetFields]["mulHtml"];
      }
      else
      {
        var sMULHtml = "";
      }
      if (oResp["fldList"][iSetFields]["updInnerHtml"])
      {
        var sInnerHtml = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["updInnerHtml"]);
      }
      else
      {
        var sInnerHtml = null;
      }
      if (oResp["fldList"][iSetFields]["lookupCons"])
      {
        var sLookupCons = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["lookupCons"]);
      }
      else
      {
        var sLookupCons = "";
      }
      if (oResp["clearUpload"])
      {
        var sClearUpload = scAjaxSpecCharParser(oResp["clearUpload"]);
      }
      else
      {
        var sClearUpload = "N";
      }
      if ("checkbox" == sFieldType)
      {
        scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti);
      }
      else if ("duplosel" == sFieldType)
      {
        scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions);
      }
      else if ("imagem" == sFieldType)
      {
        scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName);
      }
      else if ("documento" == sFieldType)
      {
        scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload);
      }
      else if ("label" == sFieldType)
      {
        scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons);
      }
      else if ("radio" == sFieldType)
      {
        scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp);
      }
      else if ("select" == sFieldType)
      {
        scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, iRow);
      }
      else if ("text" == sFieldType)
      {
        scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons);
      }
      else if ("editor_html" == sFieldType)
      {
        scAjaxSetFieldEditorHtml(sFieldName, oFieldValues);
      }
      else if ("imagehtml" == sFieldType)
      {
        scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml);
      }
      else if ("innerhtml" == sFieldType)
      {
        scAjaxSetFieldInnerHtml(sFieldName, oFieldValues);
      }
      else if ("multi_upload" == sFieldType)
      {
        scAjaxSetFieldMultiUpload(sFieldName, sMULHtml);
      }
      scAjaxUpdateHeaderFooter(sFieldName, oFieldValues);
    }
  } // scAjaxSetFields

  function scAjaxUpdateHeaderFooter(sFieldName, oFieldValues)
  {
    if (self.updateHeaderFooter)
    {
      if (null == oFieldValues)
      {
        sNewValue = '';
      }
      else if (oFieldValues[0]["label"])
      {
        sNewValue = oFieldValues[0]["label"];
      }
      else
      {
        sNewValue = oFieldValues[0]["value"];
      }
      updateHeaderFooter(sFieldName, scAjaxSpecCharParser(sNewValue));
    }
  } // scAjaxUpdateHeaderFooter

  function scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons)
  {
    if (document.F1.elements[sFieldName])
    {
        var Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
        eval ("document.F1." + sFieldName + ".value = Temp_text");
    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      scAjaxSetReadonlyValue(sFieldName, scAjaxBreakLine(oFieldValues[0]['value']));
    }
  } // scAjaxSetFieldText

  function scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, iRow)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if (bSelectDD)
    {
        $("#id_sc_field_" + sFieldName).dropdownchecklist("destroy");
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      scAjaxSetFieldText(sFieldNameHtml, oFieldValues);
      return;
    }

    if (null != oFieldOptions)
    {
      $("#id_sc_field_" + sFieldName).children().remove()
      if ("<select" != oFieldOptions.substr(0, 7))
      {
        var $oField = $("#id_sc_field_" + sFieldName);
        if (0 < $oField.length)
        {
          $oField.html(oFieldOptions);
        }
        else
        {
          document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
        }
      }
      else
      {
        document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
      }
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    var oFormField = $("#id_sc_field_" + sFieldName);
    for (iFieldSelect = 0; iFieldSelect < oFormField[0].length; iFieldSelect++)
    {
      if (scAjaxInArray(oFormField[0].options[iFieldSelect].value, aValues))
      {
        oFormField[0].options[iFieldSelect].selected = true;
      }
      else
      {
        oFormField[0].options[iFieldSelect].selected = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
    if (bSelectDD)
    {
        scJQDDCheckBoxAdd(iRow);
    }
  } // scAjaxSetFieldSelect

  function scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions)
  {
    var sFieldNameOrig = sFieldName + "_orig";
    var sFieldNameDest = sFieldName + "_dest";
    var oFormFieldOrig = document.F1.elements[sFieldNameOrig];
    var oFormFieldDest = document.F1.elements[sFieldNameDest];

    if (null != oFieldOptions)
    {
      scAjaxClearSelect(sFieldNameOrig);
      for (iFieldSelect = 0; iFieldSelect < oFieldOptions.length; iFieldSelect++)
      {
        oFormFieldOrig.options[iFieldSelect] = new Option(scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["label"]), scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["value"]));
      }
    }
    while (oFormFieldDest.length > 0)
    {
      oFormFieldDest.options[0] = null;
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        sNewOptionLabel = oFieldValues[iFieldSelect]["label"] ? scAjaxSpecCharParser(oFieldValues[iFieldSelect]["label"]) : scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        sNewOptionValue = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        if (sNewOptionValue.substr(0, 8) == "@NMorder")
        {
           sNewOptionValue                      = sNewOptionValue.substr(8);
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
           sNewOptionValue                      = sNewOptionValue.substr(1);
           aValues[iFieldSelect]                = sNewOptionValue;
        }
        else
        {
           aValues[iFieldSelect]                = sNewOptionValue;
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
        }
      }
    }
    for (iFieldSelect = 0; iFieldSelect < oFormFieldOrig.length; iFieldSelect++)
    {
      oFormFieldOrig.options[iFieldSelect].selected = false;
      if (scAjaxInArray(oFormFieldOrig.options[iFieldSelect].value, aValues))
      {
        oFormFieldOrig.options[iFieldSelect].disabled    = true;
        oFormFieldOrig.options[iFieldSelect].style.color = "#A0A0A0";
      }
      else
      {
        oFormFieldOrig.options[iFieldSelect].disabled = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldDuplosel

  function scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti)
  {
    if (document.getElementById("idAjaxCheckbox_" + sFieldName) && null != sInnerHtml)
    {
      document.getElementById("idAjaxCheckbox_" + sFieldName).innerHTML = sInnerHtml;
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearCheckbox(sFieldName);
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues);
      return;
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearCheckbox(sFieldName); */
      scAjaxRecreateOptions("Checkbox", "checkbox", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti);
    }
    else
    {
      scAjaxSetCheckboxOptions(sFieldName, oFieldValues);
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldCheckbox

  function scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp)
  {
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues);
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearRadio(sFieldName);
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearRadio(sFieldName); */
      scAjaxRecreateOptions("Radio", "radio", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, "", "");
    }
    else
    {
      scAjaxSetRadioOptions(sFieldName, oFieldValues);
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldRadio

  function scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons)
  {
    sFieldValue = oFieldValues[0]["value"];
    sFieldLabel = oFieldValues[0]["value"];
    sFieldLabel = scAjaxBreakLine(sFieldLabel);
    if (null != oFieldOptions)
    {
      for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
      {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        if (sFieldValue == sOptText)
        {
          sFieldLabel = sOptValue;
        }
      }
    }
    if (document.getElementById("id_ajax_label_" + sFieldName))
    {
      document.getElementById("id_ajax_label_" + sFieldName).innerHTML = scAjaxSpecCharParser(sFieldLabel);
    }
    if (document.F1.elements[sFieldName])
    {
//      document.F1.elements[sFieldName].value = scAjaxSpecCharParser(sFieldValue);
        Temp_text = scAjaxProtectBreakLine(sFieldValue);
        Temp_text = scAjaxSpecCharParser(Temp_text);
        document.F1.elements[sFieldName].value = scAjaxReturnBreakLine(Temp_text);

    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(sFieldLabel));
  } // scAjaxSetFieldLabel

  function scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if ("N" == sKeepImg && document.getElementById("id_ajax_img_"  + sFieldName))
    {
      document.getElementById("id_ajax_img_"  + sFieldName).src           = scAjaxSpecCharParser(sImgFile);
      document.getElementById("id_ajax_img_"  + sFieldName).style.display = ("" == sImgFile) ? "none" : "";
    }
    if (document.getElementById("id_ajax_link_" + sFieldName) && null != sImgLink)
    {
      document.getElementById("id_ajax_link_" + sFieldName).innerHTML = oFieldValues[0]["value"];
      document.getElementById("id_ajax_link_" + sFieldName).href      = scAjaxSpecCharParser(sImgLink);
    }
    if (document.getElementById("chk_ajax_img_" + sFieldName))
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("N" == sKeepImg && document.getElementById("txt_ajax_img_" + sFieldName))
    {
      document.getElementById("txt_ajax_img_" + sFieldName).innerHTML     = oFieldValues[0]["value"];
      document.getElementById("txt_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"] || "S" == sHideName) ? "none" : "";
    }
    if ("" != sImgOrig)
    {
      eval("if (var_ajax_img_" + sFieldName + ") var_ajax_img_" + sFieldName + " = '" + sImgOrig + "';");
      if (document.F1.elements["temp_out1_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgFile;
        document.F1.elements["temp_out1_" + sFieldName].value = sImgOrig;
      }
      else if (document.F1.elements["temp_out_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgOrig;
      }
    }
    if ("" != oFieldValues[0]["value"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = oFieldValues[0]["value"];
    }
    else if (oResp && oResp["ajaxRequest"] && "navigate_form" == oResp["ajaxRequest"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = "";
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldImage

  function scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    document.getElementById("id_ajax_doc_"  + sFieldName).innerHTML = scAjaxSpecCharParser(sDocLink);
    if (document.getElementById("id_ajax_doc_icon_"  + sFieldName))
    {
      document.getElementById("id_ajax_doc_icon_"  + sFieldName).src = scAjaxSpecCharParser(sDocIcon);
    }
    if ("" == oFieldValues[0]["value"])
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "none";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "none";
    }
    else
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("S" == sClearUpload && document.F1.elements[sFieldName + "_ul_name"])
    {
      document.F1.elements[sFieldName + "_ul_name"].value = "";
    }
    if ("" != sDocLink)
    {
      scAjaxSetReadonlyValue(sFieldName, sDocLink);
    }
    else
    {
      scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
    }
  } // scAjaxSetFieldDocument

  function scAjaxSetFieldInnerHtml(sFieldName, oFieldValues)
  {
    if (document.getElementById(sFieldName))
    {
      document.getElementById(sFieldName).innerHTML = scAjaxSpecCharParser(oFieldValues[0]["value"]);
    }
  } // scAjaxSetFieldInnerHtml

  function scAjaxSetFieldMultiUpload(sFieldName, sMULHtml)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    $("#id_sc_loaded_" + sFieldName).html(scAjaxSpecCharParser(sMULHtml));
  } // scAjaxSetFieldMultiUpload

  function scAjaxExecFieldEditorHtml(strOption, bolUI, oField)
  {
	  	if(tinymce.majorVersion > 3)
		{
			if(strOption == 'mceAddControl')
			{
				tinymce.execCommand('mceAddEditor', bolUI, oField);
			}else
			if(strOption == 'mceRemoveControl')
			{
				tinymce.execCommand('mceRemoveEditor', bolUI, oField);
			}
		}
		else
		{
			tinyMCE.execCommand(strOption, bolUI, oField);
		}
  }

  function scAjaxSetFieldEditorHtml(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
	if(tinymce.majorVersion > 3)
	{
		var oFormField = tinyMCE.get(sFieldName);
	}
	else
	{
		var oFormField = tinyMCE.getInstanceById(sFieldName);
	}
    oFormField.setContent(scAjaxSpecCharParser(oFieldValues[0]["value"]));
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml)
  {
    if (document.getElementById("id_imghtml_" + sFieldName))
    {
      document.getElementById("id_imghtml_" + sFieldName).innerHTML = scAjaxSpecCharParser(sImgHtml);
    }
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetCheckboxOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return;
    }
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheckbox = 0; iFieldCheckbox < oFormField.length; iFieldCheckbox++)
        {
          if (scAjaxInArray(oFormField[iFieldCheckbox].value, aValues))
          {
            oFormField[iFieldCheckbox].checked = true;
          }
          else
          {
            oFormField[iFieldCheckbox].checked = false;
          }
        }
      }
      else
      {
        if (scAjaxInArray(oFormField.value, aValues))
        {
          oFormField.checked = true;
        }
        else
        {
          oFormField.checked = false;
        }
      }
    }
    else if (document.F1.elements[sFieldName + "[0]"])
    {
      for (iFieldCheckbox = 0; iFieldCheckbox < document.F1.elements.length; iFieldCheckbox++)
      {
        oFormElement = document.F1.elements[iFieldCheckbox];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && scAjaxInArray(oFormElement.value, aValues))
        {
          oFormElement.checked = true;
        }
        else if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1))
        {
          oFormElement.checked = false;
        }
      }
    }
    else
    {
      oFormElement = document.F1.elements[sFieldName];
      if (scAjaxInArray(oFormElement.value, aValues))
      {
        oFormElement.checked = true;
      }
      else
      {
        oFormElement.checked = false;
      }
    }
  } // scAjaxSetCheckboxOptions

  function scAjaxSetRadioOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    var oFormField = document.F1.elements[sFieldName];
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      if (scAjaxInArray(oFormField[iFieldRadio].value, aValues))
      {
        oFormField[iFieldRadio].checked = true;
      }
    }
  } // scAjaxSetRadioOptions

  function scAjaxSetReadonlyValue(sFieldName, sFieldValue)
  {
    if (document.getElementById("id_read_on_" + sFieldName))
    {
      document.getElementById("id_read_on_" + sFieldName).innerHTML = sFieldValue;
    }
  } // scAjaxSetReadonlyValue

  function scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, sDelim)
  {
    if (null == oFieldValues)
    {
      return;
    }
    if (null == sDelim)
    {
      sDelim = " ";
    }
    sReadLabel = "";
    for (iReadArray = 0; iReadArray < oFieldValues.length; iReadArray++)
    {
      if (oFieldValues[iReadArray]["label"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["label"];
      }
      else if (oFieldValues[iReadArray]["value"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["value"];
      }
    }
    scAjaxSetReadonlyValue(sFieldName, sReadLabel);
  } // scAjaxSetReadonlyArrayValue

  function scAjaxGetFieldValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        if (1 == oFieldValues.length)
        {
          sValue = scAjaxSpecCharParser(oFieldValues[0]["value"]);
        }
        else
        {
          sValue = new Array();
          for (jFieldValue = 0; jFieldValue < oFieldValues.length; jFieldValue++)
          {
            sValue[jFieldValue] = scAjaxSpecCharParser(oFieldValues[jFieldValue]["value"]);
          }
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldValue

  function scAjaxGetKeyValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iKeyValue = 0; iKeyValue < oResp["fldList"].length; iKeyValue++)
    {
      var sFieldName = oResp["fldList"][iKeyValue]["fldName"];
      if (sFieldGet == sFieldName)
      {
        if (oResp["fldList"][iKeyValue]["keyVal"])
        {
          return scAjaxSpecCharParser(oResp["fldList"][iKeyValue]["keyVal"]);
        }
        else
        {
          return scAjaxGetFieldValue(sFieldGet);
        }
      }
    }
    return sValue;
  } // scAjaxGetKeyValue

  function scAjaxGetLineNumber()
  {
    sLineNumber = "";
    if (oResp["errList"])
    {
      for (iLineNumber = 0; iLineNumber < oResp["errList"].length; iLineNumber++)
      {
        if (oResp["errList"][iLineNumber]["numLinha"])
        {
          sLineNumber = oResp["errList"][iLineNumber]["numLinha"];
        }
      }
      return sLineNumber;
    }
    if (oResp["fldList"])
    {
      return oResp["fldList"][0]["numLinha"];
    }
    if (oResp["msgDisplay"])
    {
      return oResp["msgDisplay"]["numLinha"];
    }
    return sLineNumber;
  } // scAjaxGetLineNumber

  function scAjaxFieldExists(sFieldGet)
  {
    bExists = false;
    if (!oResp["fldList"])
    {
      return bExists;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        bExists = true;
      }
    }
    return bExists;
  } // scAjaxFieldExists

  function scAjaxGetFieldText(sFieldName)
  {
    $oHidden = $("input[name=" + sFieldName + "]");
    if ($oHidden.length)
    {
      for (var i = 0; i < $oHidden.length; i++)
      {
        if ("hidden" == $oHidden[i].type && $oHidden[i].form && $oHidden[i].form.name && "F1" == $oHidden[i].form.name)
        {
          return scAjaxSpecCharProtect($oHidden[i].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    $oField = $("#id_sc_field_" + sFieldName);
    if ($oField.length && "select" != $oField[0].type.substr(0, 6))
    {
      return scAjaxSpecCharProtect($oField.val());//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return '';
    }
  } // scAjaxGetFieldText

  function scAjaxGetFieldHidden(sFieldName)
  {
    for( i= 0; i < document.F1.elements.length; i++)
    {
       if (document.F1.elements[i].name == sFieldName)
       {
          return scAjaxSpecCharProtect(document.F1.elements[i].value);//.replace(/[+]/g, "__NM_PLUS__");
       }
    }
//    return document.F1.elements[sFieldName].value.replace(/[+]/g, "__NM_PLUS__");
  } // scAjaxGetFieldHidden

  function scAjaxGetFieldSelect(sFieldName)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return "";
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var iSelected  = oFormField.selectedIndex;
    if (-1 < iSelected)
    {
      return scAjaxSpecCharProtect(oFormField.options[iSelected].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return "";
    }
  } // scAjaxGetFieldSelect

  function scAjaxGetFieldSelectMult(sFieldName, sFieldDelim)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var sFieldVals = "";
    for (iFieldSelect = 0; iFieldSelect < oFormField.length; iFieldSelect++)
    {
      if (oFormField[iFieldSelect].selected)
      {
        if ("" != sFieldVals)
        {
          sFieldVals += sFieldDelim;
        }
        sFieldVals += scAjaxSpecCharProtect(oFormField[iFieldSelect].value);//.replace(/[+]/g, "__NM_PLUS__");
      }
    }
    return sFieldVals;
  } // scAjaxGetFieldSelectMult

  function scAjaxGetFieldCheckbox(sFieldName, sDelim)
  {
    var aValues = new Array();
    var sValue  = "";
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return sValue;
    }
    if (document.F1.elements[sFieldName + "[]"] && "hidden" == document.F1.elements[sFieldName + "[]"].type)
    {
      return scAjaxGetFieldHidden(sFieldName + "[]");
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheck = 0; iFieldCheck < oFormField.length; iFieldCheck++)
        {
          if (oFormField[iFieldCheck].checked)
          {
            aValues[aValues.length] = oFormField[iFieldCheck].value;
          }
        }
      }
      else
      {
        if (oFormField.checked)
        {
          aValues[aValues.length] = oFormField.value;
        }
      }
    }
    else
    {
      for (iFieldCheck = 0; iFieldCheck < document.F1.elements.length; iFieldCheck++)
      {
        oFormElement = document.F1.elements[iFieldCheck];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
        else if (sFieldName == oFormElement.name && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
      }
    }
    for (iFieldCheck = 0; iFieldCheck < aValues.length; iFieldCheck++)
    {
      sValue += scAjaxSpecCharProtect(aValues[iFieldCheck]);//.replace(/[+]/g, "__NM_PLUS__");
      if (iFieldCheck + 1 != aValues.length)
      {
        sValue += sDelim;
      }
    }
    return sValue;
  } // scAjaxGetFieldCheckbox

  function scAjaxGetFieldRadio(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }
    var oFormField = document.F1.elements[sFieldName];
    if (!oFormField.length)
    {
        var sc_cmp_radio = eval("document.F1." + sFieldName);
        if (sc_cmp_radio.checked)
        {
           sValue = scAjaxSpecCharProtect(sc_cmp_radio.value);//.replace(/[+]/g, "__NM_PLUS__");
        }
    }
    else
    {
      for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
      {
        if (oFormField[iFieldRadio].checked)
        {
          sValue = scAjaxSpecCharProtect(oFormField[iFieldRadio].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldRadio

  function scAjaxGetFieldEditorHtml(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }

        if(tinymce.majorVersion > 3)
        {
			var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
			var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    return scAjaxSpecCharParser(scAjaxSpecCharProtect(oFormField.getContent()));//.replace(/[+]/g, "__NM_PLUS__"));
  } // scAjaxGetFieldEditorHtml

  function scAjaxDoNothing(e)
  {
  } // scAjaxDoNothing

  function scAjaxInArray(mVal, aList)
  {
    for (iInArray = 0; iInArray < aList.length; iInArray++)
    {
      if (aList[iInArray] == mVal)
      {
        return true;
      }
    }
    return false;
  } // scAjaxInArray

  function scAjaxSpecCharParser(sParseString)
  {
    if (null == sParseString) {
      return "";
    }
    var ta = document.createElement("textarea");
    ta.innerHTML = sParseString.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    return ta.value;
  } // scAjaxSpecCharParser

  function scAjaxSpecCharProtect(sOriginal)
  {
        var sProtected;
        sProtected = sOriginal.replace(/[+]/g, "__NM_PLUS__");
        sProtected = sProtected.replace(/[%]/g, "__NM_PERC__");
        return sProtected;
  } // scAjaxSpecCharProtect

  function scAjaxRecreateOptions(sFieldType, sHtmlType, sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti)
  {
    var sSuffix  = ("checkbox" == sHtmlType) ? "[]" : "";
    var sDivName = "idAjax" + sFieldType + "_" + sFieldName;
    var sDivText = "";
    var iCntLine = 0;
    var aValues  = new Array();
    var sClass;
    if (null != oFieldValues)
    {
      for (iRecreate = 0; iRecreate < oFieldValues.length; iRecreate++)
      {
        aValues[iRecreate] = scAjaxSpecCharParser(oFieldValues[iRecreate]["value"]);
      }
    }
    sDivText += "<table border=0>";
    for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
    {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        if (0 == iCntLine)
        {
            sDivText += "<tr>";
        }
        iCntLine++;
        if ("" != sOptClass)
        {
            sClass = " class=\"" + sOptClass;
            if ("" != sOptMulti)
            {
                sClass += " " + sOptClass + sOptMulti;
            }
            sClass += "\"";
        }
        if (sHtmComp == null)
        {
            sHtmComp = "";
        }
        sChecked  = (scAjaxInArray(sOptValue, aValues)) ? " checked" : "";
        sDivText += "<td class=\"scFormDataFontOdd\">";
        sDivText += "<input type=\"" + sHtmlType + "\" name=\"" + sFieldName + sSuffix + "\" value=\"" + sOptValue + "\"" + sChecked + " " + sHtmComp + " " + sOptComp + sClass + ">";
        sDivText += sOptText;
        sDivText += "</td>";
        if (iColNum == iCntLine)
        {
            sDivText += "</tr>";
            iCntLine  = 0;
        }
    }
    sDivText += "</table>";
    document.getElementById(sDivName).innerHTML = sDivText;
  } // scAjaxRecreateOptions

  function scAjaxProcOn(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.blockUI && !bForce)
      {
        $.blockUI({
          message: $("#id_div_process_block"),
          overlayCSS: { backgroundColor: sc_ajaxBg },
          css: {
            borderColor: sc_ajaxBordC,
            borderStyle: sc_ajaxBordS,
            borderWidth: sc_ajaxBordW
          }
        });
      }
      else
      {
        document.getElementById("id_div_process").style.display = "";
        document.getElementById("id_fatal_error").style.display = "none";
        if (null != scCenterElement)
        {
          scCenterElement(document.getElementById("id_div_process"));
        }
      }
    }
  } // scAjaxProcOn

  function scAjaxProcOff(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.unblockUI && !bForce)
      {
        $.unblockUI();
      }
      else
      {
        document.getElementById("id_div_process").style.display = "none";
      }
    }
  } // scAjaxProcOff

  function scAjaxSetMaster()
  {
    if (!oResp["masterValue"])
    {
      return;
    }
    if (!parent || !parent.scAjaxDetailValue)
    {
      return;
    }
    for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
    {
      parent.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
    }
  } // scAjaxSetMaster

  function scAjaxSetFocus()
  {
    if (!oResp["setFocus"] && '' == scFocusFirstErrorName)
    {
      return;
    }
    sFieldName = oResp["setFocus"];
    if (document.F1.elements[sFieldName])
    {
        scFocusField(sFieldName);
    }
    scAjaxFocusError();
  } // scAjaxSetFocus

  function scAjaxFocusError()
  {
    if ('' != scFocusFirstErrorName)
    {
      scFocusField(scFocusFirstErrorName);
      scFocusFirstErrorName = '';
    }
  } // scAjaxFocusError

  function scAjaxSetNavStatus(sBarPos)
  {
    if (!oResp["navStatus"])
    {
      return;
    }
    sNavRet = "S";
    sNavAva = "S";
    if (oResp["navStatus"]["ret"])
    {
      sNavRet = oResp["navStatus"]["ret"];
    }
    if (oResp["navStatus"]["ava"])
    {
      sNavAva = oResp["navStatus"]["ava"];
    }
    if ("S" != sNavRet && "N" != sNavRet)
    {
      sNavRet = "S";
    }
    if ("S" != sNavAva && "N" != sNavAva)
    {
      sNavAva = "S";
    }
    Nav_permite_ret = sNavRet;
    Nav_permite_ava = sNavAva;
    nav_atualiza(Nav_permite_ret, Nav_permite_ava, sBarPos);
  } // scAjaxSetNavStatus

  function scAjaxSetSummary()
  {
    if (!oResp["navSummary"])
    {
      return;
    }
    sreg_ini = oResp["navSummary"].reg_ini;
    sreg_qtd = oResp["navSummary"].reg_qtd;
    sreg_tot = oResp["navSummary"].reg_tot;
    summary_atualiza(sreg_ini, sreg_qtd, sreg_tot);
  } // scAjaxSetSummary

  function scAjaxSetNavpage()
  {
    navpage_atualiza(oResp["navPage"]);
  } // scAjaxSetNavpage


  function scAjaxRedir(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (!oResp["redirInfo"])
    {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo)
    {
      if ("parent.parent" == oResp["redirInfo"]["target"])
      {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"])
      {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"])
      {
        window.open(sAction, "_blank");
      }
      else
      {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo)
    {
        document.write(scAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else
    {
      if (oResp["redirInfo"]["target"] == "modal")
      {
          tb_show('', sAction + '?script_case_init=' +  oResp["redirInfo"]["script_case_init"] + '&script_case_session=<?php echo session_id() ?>&nmgp_parms=' + oResp["redirInfo"]["nmgp_parms"] + '&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&TB_iframe=true&modal=true&height=' +  oResp["redirInfo"]["h_modal"] + '&width=' + oResp["redirInfo"]["w_modal"], '');
          return;
      }
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir)
      {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else
      {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].script_case_init.value = oResp["redirInfo"]["script_case_init"];
      }
      document.forms[sFormRedir].submit();
    }
  } // scAjaxRedir

  function scAjaxSetDisplay(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    var aDispData = new Array();
    var aDispCont = {};
    if (bReset)
    {
      for (iDisplay = 0; iDisplay < ajax_block_list.length; iDisplay++)
      {
        aDispCont[ajax_block_list[iDisplay]] = aDispData.length;
        aDispData[aDispData.length] = new Array(ajax_block_id[ajax_block_list[iDisplay]], "on");
      }
      for (iDisplay = 0; iDisplay < ajax_field_list.length; iDisplay++)
      {
        if (ajax_field_id[ajax_field_list[iDisplay]])
        {
          aFieldIds = ajax_field_id[ajax_field_list[iDisplay]];
          for (iDisplay2 = 0; iDisplay2 < aFieldIds.length; iDisplay2++)
          {
            aDispCont[aFieldIds[iDisplay2]] = aDispData.length;
            aDispData[aDispData.length] = new Array(aFieldIds[iDisplay2], "on");
          }
        }
      }
    }
    if (oResp["blockDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["blockDisplay"].length; iDisplay++)
      {
        if (bReset)
        {
          aDispData[ aDispCont[ oResp["blockDisplay"][iDisplay][0] ] ][1] = oResp["blockDisplay"][iDisplay][1];
        }
        else
        {
          aDispData[aDispData.length] = new Array(ajax_block_id[ oResp["blockDisplay"][iDisplay][0] ], oResp["blockDisplay"][iDisplay][1]);
        }
      }
    }
    if (oResp["fieldDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["fieldDisplay"].length; iDisplay++)
      {
        for (iDisplay2 = 1; iDisplay2 < ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ].length; iDisplay2++)
        {
          aFieldIds = ajax_field_id[ ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ][iDisplay2] ];
          for (iDisplay3 = 0; iDisplay3 < aFieldIds.length; iDisplay3++)
          {
            if (bReset)
            {
              aDispData[ aDispCont[ aFieldIds[iDisplay3] ] ][1] = oResp["fieldDisplay"][iDisplay][1];
            }
            else
            {
              aDispData[aDispData.length] = new Array(aFieldIds[iDisplay3], oResp["fieldDisplay"][iDisplay][1]);
            }
          }
        }
      }
    }
    if (oResp["buttonDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplay"].length; iDisplay++)
      {
        var sBtnName2 = "";
        switch (oResp["buttonDisplay"][iDisplay][0])
        {
          case "first": var sBtnName = "sc_b_ini"; break;
          case "back": var sBtnName = "sc_b_ret"; break;
          case "forward": var sBtnName = "sc_b_avc"; break;
          case "last": var sBtnName = "sc_b_fim"; break;
          case "insert": var sBtnName = "sc_b_ins"; break;
          case "update": var sBtnName = "sc_b_upd"; break;
          case "delete": var sBtnName = "sc_b_del"; break;
          default: var sBtnName = "sc_b_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName2 = "sc_" + oResp["buttonDisplay"][iDisplay][0]; break;
        }
        if ("sc_b_ini" == sBtnName || "sc_b_ret" == sBtnName || "sc_b_avc" == sBtnName || "sc_b_fim" == sBtnName)
        {
          scAjaxNavigateButtonDisplay(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
        }
        else
        {
          aDispData[aDispData.length] = new Array(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName + "_t", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName + "_b", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName2)
        {
          aDispData[aDispData.length] = new Array(sBtnName2, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
      }
    }
    for (iDisplay = 0; iDisplay < aDispData.length; iDisplay++)
    {
      scAjaxElementDisplay(aDispData[iDisplay][0], aDispData[iDisplay][1]);
    }
  } // scAjaxSetDisplay

  function scAjaxNavigateButtonDisplay(sButton, sStatus)
  {
    sButton2 = sButton + "_off";

    if ("off" == sStatus)
    {
      sStatus2 = "off";
    }
    else
    {
      if ("sc_b_ini" == sButton || "sc_b_ret" == sButton)
      {
        if ("S" == Nav_permite_ret)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
      else
      {
        if ("S" == Nav_permite_ava)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
    }

    scAjaxElementDisplay(sButton        , sStatus);
    scAjaxElementDisplay(sButton + "_t" , sStatus);
    scAjaxElementDisplay(sButton + "_b" , sStatus);
    scAjaxElementDisplay(sButton2       , sStatus2);
    scAjaxElementDisplay(sButton2 + "_t", sStatus2);
    scAjaxElementDisplay(sButton2 + "_b", sStatus2);
  } // scAjaxNavigateButtonDisplay

  function scAjaxElementDisplay(sElement, sAction)
  {
    sStyle = ("off" == sAction) ? "none" : "";
    if (ajax_block_tab && ajax_block_tab[sElement] && "" != ajax_block_tab[sElement])
    {
      scAjaxElementDisplay(ajax_block_tab[sElement], sAction);
    }
    if (document.getElementById(sElement))
    {
      document.getElementById(sElement).style.display = sStyle;
      if (document.getElementById(sElement + "_dumb"))
      {
        document.getElementById(sElement + "_dumb").style.display = ("off" == sAction) ? "" : "none";
      }
    }
  } // scAjaxElementDisplay

  function scAjaxSetLabel(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iLabel = 0; iLabel < ajax_field_list.length; iLabel++)
      {
        if (ajax_field_list[iLabel] && ajax_error_list[ajax_field_list[iLabel]])
        {
          scAjaxFieldLabel(ajax_field_list[iLabel], ajax_error_list[ajax_field_list[iLabel]]["label"]);
        }
      }
    }
    if (oResp["fieldLabel"])
    {
      for (iLabel = 0; iLabel < oResp["fieldLabel"].length; iLabel++)
      {
        scAjaxFieldLabel(oResp["fieldLabel"][iLabel][0], scAjaxSpecCharParser(oResp["fieldLabel"][iLabel][1]));
      }
    }
  } // scAjaxSetLabel

  function scAjaxFieldLabel(sField, sLabel)
  {
    if (document.getElementById("id_label_" + sField) && document.getElementById("id_label_" + sField).innerHTML != sLabel)
    {
      document.getElementById("id_label_" + sField).innerHTML = sLabel;
    }
  } // scAjaxFieldLabel

  function scAjaxSetReadonly(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iRead = 0; iRead < ajax_field_list.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_list[iRead], ajax_read_only[ajax_field_list[iRead]]);
      }
      for (iRead = 0; iRead < ajax_field_Dt_Hr.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_Dt_Hr[iRead], ajax_read_only[ajax_field_Dt_Hr[iRead]]);
      }
    }
    if (oResp["readOnly"])
    {
      for (iRead = 0; iRead < oResp["readOnly"].length; iRead++)
      {
        if (ajax_read_only[ oResp["readOnly"][iRead][0] ])
        {
          scAjaxFieldRead(oResp["readOnly"][iRead][0], oResp["readOnly"][iRead][1]);
        }
        else if (oResp["rsSize"])
        {
          for (var i = 0; i <= oResp["rsSize"]; i++)
          {
            if (ajax_read_only[ oResp["readOnly"][iRead][0] + i ])
            {
              scAjaxFieldRead(oResp["readOnly"][iRead][0] + i, oResp["readOnly"][iRead][1]);
            }
          }
        }
      }
    }
  } // scAjaxSetReadonly

  function scAjaxFieldRead(sField, sStatus)
  {
    if ("on" == sStatus)
    {
      var sDisplayOff = "none";
      var sDisplayOn  = "";
    }
    else
    {
      var sDisplayOff = "";
      var sDisplayOn  = "none";
    }
    if (document.getElementById("id_read_off_" + sField))
    {
      document.getElementById("id_read_off_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_read_on_" + sField))
    {
      document.getElementById("id_read_on_" + sField).style.display = sDisplayOn;
    }
  } // scAjaxFieldRead

  function scAjaxSetBtnVars()
  {
    if (oResp["btnVars"])
    {
      for (iBtn = 0; iBtn < oResp["btnVars"].length; iBtn++)
      {
        eval(oResp["btnVars"][iBtn][0] + " = scAjaxSpecCharParser('" + oResp["btnVars"][iBtn][1] + "');");
      }
    }
  } // scAjaxSetBtnVars

  function scAjaxClearText(sFormField)
  {
    document.F1.elements[sFormField].value = "";
  } // scAjaxClearText

  function scAjaxClearLabel(sFormField)
  {
    document.getElementById("id_ajax_label_" + sFormField).innerHTML = "";
  } // scAjaxClearLabel

  function scAjaxClearSelect(sFormField)
  {
    document.F1.elements[sFormField].length = 0;
  } // scAjaxClearSelect

  function scAjaxClearCheckbox(sFormField)
  {
    document.getElementById("idAjaxCheckbox_" + sFormField).innerHTML = "";
  } // scAjaxClearCheckbox

  function scAjaxClearRadio(sFormField)
  {
    document.getElementById("idAjaxRadio_" + sFormField).innerHTML = "";
  } // scAjaxClearRadio

  function scAjaxClearEditorHtml(sFormField)
  {
    if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    oFormField.setContent("");
  } // scAjaxClearEditorHtml

  function scAjaxJavascript()
  {
    if (oResp["ajaxJavascript"])
    {
      var sJsFunc = "";
      for (var i = 0; i < oResp["ajaxJavascript"].length; i++)
      {
        sJsFunc = scAjaxSpecCharParser(oResp["ajaxJavascript"][i][0]);
        if ("" != sJsFunc)
        {
          var aParam = new Array();
          if (oResp["ajaxJavascript"][i][1] && 0 < oResp["ajaxJavascript"][i][1].length)
          {
            for (var j = 0; j < oResp["ajaxJavascript"][i][1].length; j++)
            {
              aParam.push("'" + oResp["ajaxJavascript"][i][1][j] + "'");
            }
          }
          eval("if (" + sJsFunc + ") { " + sJsFunc + "(" + aParam.join(", ") + ") }");
        }
      }
    }
  } // scAjaxJavascript

  function scAjaxAlert()
  {
    if (oResp["ajaxAlert"] && oResp["ajaxAlert"]["message"] && "" != oResp["ajaxAlert"]["message"])
    {
      alert(oResp["ajaxAlert"]["message"]);
    }
  } // scAjaxAlert

  function scAjaxMessage(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["ajaxMessage"] && oResp["ajaxMessage"]["message"] && "" != oResp["ajaxMessage"]["message"])
    {
      var sTitle    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["title"])        ? oResp["ajaxMessage"]["title"]               : scMsgDefTitle,
          bModal    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["modal"])        ? ("Y" == oResp["ajaxMessage"]["modal"])      : false,
          iTimeout  = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["timeout"])      ? parseInt(oResp["ajaxMessage"]["timeout"])   : 0,
          bButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button"])       ? ("Y" == oResp["ajaxMessage"]["button"])     : false,
          sButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button_label"]) ? oResp["ajaxMessage"]["button_label"]        : "Ok",
          iTop      = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["top"])          ? parseInt(oResp["ajaxMessage"]["top"])       : 0,
          iLeft     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["left"])         ? parseInt(oResp["ajaxMessage"]["left"])      : 0,
          iWidth    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["width"])        ? parseInt(oResp["ajaxMessage"]["width"])     : 0,
          iHeight   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["height"])       ? parseInt(oResp["ajaxMessage"]["height"])    : 0,
          bClose    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["show_close"])   ? ("Y" == oResp["ajaxMessage"]["show_close"]) : true,
          bBodyIcon = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["body_icon"])    ? ("Y" == oResp["ajaxMessage"]["body_icon"])  : true,
          sRedir    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir"])        ? oResp["ajaxMessage"]["redir"]               : "",
          sTarget   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_target"]) ? oResp["ajaxMessage"]["redir_target"]        : "",
          sParam    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_par"])    ? oResp["ajaxMessage"]["redir_par"]           : "";
      _scAjaxShowMessage(sTitle, oResp["ajaxMessage"]["message"], bModal, iTimeout, bButton, sButton, iTop, iLeft, iWidth, iHeight, sRedir, sTarget, sParam, bClose, bBodyIcon);
    }
  } // scAjaxAlert

  function scAjaxResponse(sResp)
  {
    eval("var oResp = " + sResp);
    return oResp;
  } // scAjaxResponse

  function scAjaxBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      input += "";
      while (input.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input = input.replace(String.fromCharCode(10), '<br>');
      }
      return input;
  } // scAjaxBreakLine

  function scAjaxProtectBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      var input1 = input + "";
      while (input1.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input1 = input1.replace(String.fromCharCode(10), '#@NM#@');
      }
      return input1;
  } // scAjaxProtectBreakLine

  function scAjaxReturnBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      while (input.lastIndexOf('#@NM#@') > -1)
      {
         input = input.replace('#@NM#@', String.fromCharCode(10));
      }
      return input;
  } // scAjaxReturnBreakLine


  // ---------- Validate id_estudiante_
  function do_ajax_form_t_evaluacion_p1_m2_validate_id_estudiante_(iNumLinha)
  {
    var nomeCampo_id_estudiante_ = "id_estudiante_" + iNumLinha;
    var var_id_estudiante_ = scAjaxGetFieldSelect(nomeCampo_id_estudiante_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_id_estudiante_(var_id_estudiante_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_id_estudiante__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_id_estudiante_

  function do_ajax_form_t_evaluacion_p1_m2_validate_id_estudiante__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "id_estudiante_" + iLineNumber;
    }
    else
    {
      sFieldValid = "id_estudiante_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "id_estudiante_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "id_estudiante_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_id_estudiante__cb

  // ---------- Validate estatus_
  function do_ajax_form_t_evaluacion_p1_m2_validate_estatus_(iNumLinha)
  {
    var nomeCampo_estatus_ = "estatus_" + iNumLinha;
    var var_estatus_ = scAjaxGetFieldHidden(nomeCampo_estatus_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_estatus_(var_estatus_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_estatus__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_estatus_

  function do_ajax_form_t_evaluacion_p1_m2_validate_estatus__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "estatus_" + iLineNumber;
    }
    else
    {
      sFieldValid = "estatus_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "estatus_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "estatus_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_estatus__cb

  // ---------- Validate novedad_
  function do_ajax_form_t_evaluacion_p1_m2_validate_novedad_(iNumLinha)
  {
    var nomeCampo_novedad_ = "novedad_" + iNumLinha;
    var var_novedad_ = scAjaxGetFieldHidden(nomeCampo_novedad_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_novedad_(var_novedad_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_novedad__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_novedad_

  function do_ajax_form_t_evaluacion_p1_m2_validate_novedad__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "novedad_" + iLineNumber;
    }
    else
    {
      sFieldValid = "novedad_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "novedad_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "novedad_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_novedad__cb

  // ---------- Validate asienta_inasistencias_
  function do_ajax_form_t_evaluacion_p1_m2_validate_asienta_inasistencias_(iNumLinha)
  {
    var nomeCampo_asienta_inasistencias_ = "asienta_inasistencias_" + iNumLinha;
    var var_asienta_inasistencias_ = scAjaxGetFieldText(nomeCampo_asienta_inasistencias_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_asienta_inasistencias_(var_asienta_inasistencias_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_asienta_inasistencias__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_asienta_inasistencias_

  function do_ajax_form_t_evaluacion_p1_m2_validate_asienta_inasistencias__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "asienta_inasistencias_" + iLineNumber;
    }
    else
    {
      sFieldValid = "asienta_inasistencias_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "asienta_inasistencias_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "asienta_inasistencias_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_asienta_inasistencias__cb

  // ---------- Validate inasistencia_p1_
  function do_ajax_form_t_evaluacion_p1_m2_validate_inasistencia_p1_(iNumLinha)
  {
    var nomeCampo_inasistencia_p1_ = "inasistencia_p1_" + iNumLinha;
    var var_inasistencia_p1_ = scAjaxGetFieldHidden(nomeCampo_inasistencia_p1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_inasistencia_p1_(var_inasistencia_p1_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_inasistencia_p1__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_inasistencia_p1_

  function do_ajax_form_t_evaluacion_p1_m2_validate_inasistencia_p1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "inasistencia_p1_" + iLineNumber;
    }
    else
    {
      sFieldValid = "inasistencia_p1_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "inasistencia_p1_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "inasistencia_p1_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_inasistencia_p1__cb

  // ---------- Validate eval_1_per_
  function do_ajax_form_t_evaluacion_p1_m2_validate_eval_1_per_(iNumLinha)
  {
    var nomeCampo_eval_1_per_ = "eval_1_per_" + iNumLinha;
    var var_eval_1_per_ = scAjaxGetFieldHidden(nomeCampo_eval_1_per_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_eval_1_per_(var_eval_1_per_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_eval_1_per__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_eval_1_per_

  function do_ajax_form_t_evaluacion_p1_m2_validate_eval_1_per__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "eval_1_per_" + iLineNumber;
    }
    else
    {
      sFieldValid = "eval_1_per_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "eval_1_per_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "eval_1_per_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_eval_1_per__cb

  // ---------- Validate dc1_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc1_(iNumLinha)
  {
    var nomeCampo_dc1_ = "dc1_" + iNumLinha;
    var var_dc1_ = scAjaxGetFieldText(nomeCampo_dc1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc1_(var_dc1_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc1__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc1_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc1_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc1_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc1_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc1_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc1__cb

  // ---------- Validate dc2_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc2_(iNumLinha)
  {
    var nomeCampo_dc2_ = "dc2_" + iNumLinha;
    var var_dc2_ = scAjaxGetFieldText(nomeCampo_dc2_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc2_(var_dc2_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc2__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc2_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc2__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc2_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc2_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc2_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc2_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc2__cb

  // ---------- Validate dc3_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc3_(iNumLinha)
  {
    var nomeCampo_dc3_ = "dc3_" + iNumLinha;
    var var_dc3_ = scAjaxGetFieldText(nomeCampo_dc3_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc3_(var_dc3_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc3__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc3_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc3__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc3_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc3_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc3_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc3_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc3__cb

  // ---------- Validate dc4_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc4_(iNumLinha)
  {
    var nomeCampo_dc4_ = "dc4_" + iNumLinha;
    var var_dc4_ = scAjaxGetFieldText(nomeCampo_dc4_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc4_(var_dc4_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc4__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc4_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc4__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc4_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc4_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc4_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc4_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc4__cb

  // ---------- Validate pcent_dc_
  function do_ajax_form_t_evaluacion_p1_m2_validate_pcent_dc_(iNumLinha)
  {
    var nomeCampo_pcent_dc_ = "pcent_dc_" + iNumLinha;
    var var_pcent_dc_ = scAjaxGetFieldHidden(nomeCampo_pcent_dc_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_pcent_dc_(var_pcent_dc_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_pcent_dc__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_pcent_dc_

  function do_ajax_form_t_evaluacion_p1_m2_validate_pcent_dc__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "pcent_dc_" + iLineNumber;
    }
    else
    {
      sFieldValid = "pcent_dc_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "pcent_dc_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "pcent_dc_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_pcent_dc__cb

  // ---------- Validate dc5_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc5_(iNumLinha)
  {
    var nomeCampo_dc5_ = "dc5_" + iNumLinha;
    var var_dc5_ = scAjaxGetFieldText(nomeCampo_dc5_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc5_(var_dc5_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc5__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc5_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc5__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc5_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc5_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc5_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc5_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc5__cb

  // ---------- Validate dc6_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc6_(iNumLinha)
  {
    var nomeCampo_dc6_ = "dc6_" + iNumLinha;
    var var_dc6_ = scAjaxGetFieldText(nomeCampo_dc6_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc6_(var_dc6_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc6__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc6_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc6__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc6_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc6_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc6_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc6_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc6__cb

  // ---------- Validate dc7_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc7_(iNumLinha)
  {
    var nomeCampo_dc7_ = "dc7_" + iNumLinha;
    var var_dc7_ = scAjaxGetFieldText(nomeCampo_dc7_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc7_(var_dc7_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc7__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc7_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc7__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc7_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc7_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc7_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc7_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc7__cb

  // ---------- Validate dc8_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc8_(iNumLinha)
  {
    var nomeCampo_dc8_ = "dc8_" + iNumLinha;
    var var_dc8_ = scAjaxGetFieldText(nomeCampo_dc8_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc8_(var_dc8_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc8__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc8_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc8__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc8_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc8_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc8_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc8_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc8__cb

  // ---------- Validate pcent_dp_
  function do_ajax_form_t_evaluacion_p1_m2_validate_pcent_dp_(iNumLinha)
  {
    var nomeCampo_pcent_dp_ = "pcent_dp_" + iNumLinha;
    var var_pcent_dp_ = scAjaxGetFieldHidden(nomeCampo_pcent_dp_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_pcent_dp_(var_pcent_dp_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_pcent_dp__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_pcent_dp_

  function do_ajax_form_t_evaluacion_p1_m2_validate_pcent_dp__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "pcent_dp_" + iLineNumber;
    }
    else
    {
      sFieldValid = "pcent_dp_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "pcent_dp_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "pcent_dp_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_pcent_dp__cb

  // ---------- Validate dc9_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc9_(iNumLinha)
  {
    var nomeCampo_dc9_ = "dc9_" + iNumLinha;
    var var_dc9_ = scAjaxGetFieldText(nomeCampo_dc9_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc9_(var_dc9_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc9__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc9_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc9__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc9_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc9_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc9_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc9_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc9__cb

  // ---------- Validate dc10_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc10_(iNumLinha)
  {
    var nomeCampo_dc10_ = "dc10_" + iNumLinha;
    var var_dc10_ = scAjaxGetFieldText(nomeCampo_dc10_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc10_(var_dc10_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc10__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc10_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc10__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc10_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc10_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc10_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc10_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc10__cb

  // ---------- Validate dc11_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc11_(iNumLinha)
  {
    var nomeCampo_dc11_ = "dc11_" + iNumLinha;
    var var_dc11_ = scAjaxGetFieldText(nomeCampo_dc11_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc11_(var_dc11_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc11__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc11_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc11__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc11_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc11_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc11_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc11_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc11__cb

  // ---------- Validate dc12_
  function do_ajax_form_t_evaluacion_p1_m2_validate_dc12_(iNumLinha)
  {
    var nomeCampo_dc12_ = "dc12_" + iNumLinha;
    var var_dc12_ = scAjaxGetFieldText(nomeCampo_dc12_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_dc12_(var_dc12_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_dc12__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc12_

  function do_ajax_form_t_evaluacion_p1_m2_validate_dc12__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc12_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc12_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc12_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc12_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_dc12__cb

  // ---------- Validate pcent_ds_
  function do_ajax_form_t_evaluacion_p1_m2_validate_pcent_ds_(iNumLinha)
  {
    var nomeCampo_pcent_ds_ = "pcent_ds_" + iNumLinha;
    var var_pcent_ds_ = scAjaxGetFieldHidden(nomeCampo_pcent_ds_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_validate_pcent_ds_(var_pcent_ds_, iNumLinha, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_validate_pcent_ds__cb);
  } // do_ajax_form_t_evaluacion_p1_m2_validate_pcent_ds_

  function do_ajax_form_t_evaluacion_p1_m2_validate_pcent_ds__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "pcent_ds_" + iLineNumber;
    }
    else
    {
      sFieldValid = "pcent_ds_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "pcent_ds_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "pcent_ds_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_t_evaluacion_p1_m2_validate_pcent_ds__cb

  // ---------- Event onblur dc10_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc10__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc10__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc10__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc10__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc10__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc10_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc10_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc10_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc10_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc10__onblur_cb

  // ---------- Event onblur dc11_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc11__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc11__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc11__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc11__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc11__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc11_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc11_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc11_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc11_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc11__onblur_cb

  // ---------- Event onblur dc12_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc12__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc12__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc12__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc12__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc12__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc12_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc12_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc12_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc12_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc12__onblur_cb

  // ---------- Event onblur dc1_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc1__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc1__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc1__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc1__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc1__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc1_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc1_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc1_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc1_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc1__onblur_cb

  // ---------- Event onblur dc2_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc2__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc2__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc2__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc2__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc2__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc2_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc2_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc2_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc2_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc2__onblur_cb

  // ---------- Event onblur dc3_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc3__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc3__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc3__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc3__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc3__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc3_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc3_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc3_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc3_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc3__onblur_cb

  // ---------- Event onblur dc4_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc4__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc4__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc4__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc4__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc4__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc4_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc4_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc4_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc4_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc4__onblur_cb

  // ---------- Event onblur dc5_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc5__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc5__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc5__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc5__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc5__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc5_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc5_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc5_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc5_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc5__onblur_cb

  // ---------- Event onblur dc6_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc6__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc6__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc6__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc6__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc6__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc6_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc6_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc6_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc6_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc6__onblur_cb

  // ---------- Event onblur dc7_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc7__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc7__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc7__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc7__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc7__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc7_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc7_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc7_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc7_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc7__onblur_cb

  // ---------- Event onblur dc8_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc8__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc8__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc8__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc8__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc8__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc8_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc8_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc8_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc8_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc8__onblur_cb

  // ---------- Event onblur dc9_
  function do_ajax_form_t_evaluacion_p1_m2_event_dc9__onblur(iSeqForm)
  {
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iSeqForm);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iSeqForm);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iSeqForm);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iSeqForm);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iSeqForm);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iSeqForm);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iSeqForm);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iSeqForm);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iSeqForm);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iSeqForm);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iSeqForm);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iSeqForm);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iSeqForm);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iSeqForm);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iSeqForm);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iSeqForm);
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_event_dc9__onblur(var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_dc_, var_pcent_dp_, var_pcent_ds_, var_eval_1_per_, var_script_case_init, var_nmgp_refresh_row, do_ajax_form_t_evaluacion_p1_m2_event_dc9__onblur_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc9__onblur

  function do_ajax_form_t_evaluacion_p1_m2_event_dc9__onblur_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dc9_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dc9_";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onblur");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dc9_");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dc9_");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_t_evaluacion_p1_m2_event_dc9__onblur_cb

  var sc_num_ult_line = "";
  var sc_insert_open  = false;

  // ---------- add_new_line
  function do_ajax_form_t_evaluacion_p1_m2_add_new_line(sc_clone, sc_seq_clone)
  {
    if (sc_insert_open)
    {
        if (sc_clone == 'S' && sc_seq_clone != iAjaxNewLine)
        {
          do_ajax_form_t_evaluacion_p1_m2_cancel_insert(iAjaxNewLine);
        }
        else
        {
          return;
        }
    }
    sc_insert_open = true;
    scDisableNavigation();
    sc_num_ult_line = iAjaxNewLine + 1;
    if (sc_clone == 'S')
    {
      var var_sc_clone     = sc_clone;
      var var_sc_seq_clone = sc_seq_clone;
    }
    else
    {
      var var_sc_clone     = 'N';
      var var_sc_seq_clone = '';
    }
    var var_sc_seq_vert = document.F1.sc_contr_vert.value;
    var var_script_case_init = document.F1.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_t_evaluacion_p1_m2_add_new_line(var_sc_clone, var_sc_seq_clone, var_sc_seq_vert, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_add_new_line_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_add_new_line

  function do_ajax_form_t_evaluacion_p1_m2_add_new_line_cb(sResp)
  {
    scAjaxProcOff(true);
    var sv_quot = sResp.replace(/&quot;/g, "_nm__asp_");
    sv_quot = scAjaxSpecCharParser(sv_quot);
    document.getElementById("new_line_dummy").innerHTML = "<table id=\"new_line_table\">" + sv_quot.replace(/_nm__asp_/g, "&quot;") + "</table>";
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    var oTBodyNew = document.getElementById("new_line_table").tBodies[0];
    var oTRNewLine = oTBodyNew.rows[0];
    oTBodyOld.appendChild(oTRNewLine);
    ajax_create_tables(document.F1.sc_contr_vert.value);
    iAjaxNewLine = document.F1.sc_contr_vert.value;
    document.F1.sc_contr_vert.value++;
    scJQElementsAdd(iAjaxNewLine);
    if (document.getElementById("sc_clone_line_" + iAjaxNewLine))
        document.getElementById("sc_clone_line_" + iAjaxNewLine).style.display = "none";
    $('#idVertRow' + iAjaxNewLine + ' input:text.sc-js-input').listen();
    $('#idVertRow' + iAjaxNewLine + ' input:password.sc-js-input').listen();
    $('#idVertRow' + iAjaxNewLine + ' input:checkbox.sc-js-input').listen();
    $('#idVertRow' + iAjaxNewLine + ' input:radio.sc-js-input').listen();
    $('#idVertRow' + iAjaxNewLine + ' select.sc-js-input').listen();
    $('#idVertRow' + iAjaxNewLine + ' textarea.sc-js-input').listen();
    scFocusField('' + iAjaxNewLine);

  } // do_ajax_form_t_evaluacion_p1_m2_add_new_line_cb

  // ---------- backup_line
  function do_ajax_form_t_evaluacion_p1_m2_backup_line(iNumLinha)
  {
    var var_id_estudiante_ = scAjaxGetFieldSelect("id_estudiante_" + iNumLinha);
    var var_id_grupo_ = scAjaxGetFieldText("id_grupo_" + iNumLinha);
    var var_id_asignatura_ = scAjaxGetFieldText("id_asignatura_" + iNumLinha);
    var var_nmgp_refresh_row = iNumLinha;
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_t_evaluacion_p1_m2_backup_line(var_id_estudiante_, var_id_grupo_, var_id_asignatura_, var_nmgp_refresh_row, var_nm_form_submit, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_backup_line_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_backup_line

  function do_ajax_form_t_evaluacion_p1_m2_backup_line_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
  } // do_ajax_form_t_evaluacion_p1_m2_backup_line_cb

  function do_ajax_form_t_evaluacion_p1_m2_cancel_insert(iSeqVert)
  {
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    var oTROldLine = oTBodyOld.rows[oTBodyOld.rows.length - 1];
    oTBodyOld.removeChild(oTROldLine);
    ajax_destroy_tables(iSeqVert);
    scEnableNavigation();
    sc_insert_open = false;
    scAjaxHideErrorDisplay("table");
  } // do_ajax_form_t_evaluacion_p1_m2_cancel_insert

  function do_ajax_form_t_evaluacion_p1_m2_cancel_update(iSeqVert)
  {
    do_ajax_form_t_evaluacion_p1_m2_backup_line(iSeqVert);
    scErrorLineOff(iSeqVert, "__sc_all__");
    scAjaxHideErrorDisplay("table");
<?php
    if ($this->Embutida_ronly)
    {
?>
    mdCloseObjects(iSeqVert);
    if (document.getElementById("sc_exc_line_" + iSeqVert))
      document.getElementById("sc_exc_line_" + iSeqVert).style.display = "";
    if (document.getElementById("sc_open_line_" + iSeqVert))
      document.getElementById("sc_open_line_" + iSeqVert).style.display = "";
    if (document.getElementById("sc_upd_line_" + iSeqVert))
      document.getElementById("sc_upd_line_" + iSeqVert).style.display = "none";
    if (document.getElementById("sc_cancelu_line_" + iSeqVert))
      document.getElementById("sc_cancelu_line_" + iSeqVert).style.display = "none";
<?php
    }
?>
  } // do_ajax_form_t_evaluacion_p1_m2_cancel_update

  function do_ajax_form_t_evaluacion_p1_m2_restore_buttons()
  {
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
    {
?>
    for (iSeqVert = 1; iSeqVert <= <?php echo $this->sc_max_reg; ?>; iSeqVert++)
    {
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
      if (document.getElementById("sc_exc_line_" + iSeqVert))
        document.getElementById("sc_exc_line_" + iSeqVert).style.display = "";
<?php
    }
?>
      if (document.getElementById("sc_open_line_" + iSeqVert))
        document.getElementById("sc_open_line_" + iSeqVert).style.display = "";
      if (document.getElementById("sc_ins_line_" + iSeqVert))
        document.getElementById("sc_ins_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_upd_line_" + iSeqVert))
        document.getElementById("sc_upd_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_new_line_" + iSeqVert))
        document.getElementById("sc_new_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_canceli_line_" + iSeqVert))
        document.getElementById("sc_canceli_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_cancelu_line_" + iSeqVert))
        document.getElementById("sc_cancelu_line_" + iSeqVert).style.display = "none";
    }
<?php
    }
?>
  } // do_ajax_form_t_evaluacion_p1_m2_restore_buttons

  // ---------- table_refresh
  function do_ajax_form_t_evaluacion_p1_m2_table_refresh()
  {
    var var_id_estudiante_ = document.F2.id_estudiante_.value;
    var var_id_grupo_ = document.F2.id_grupo_.value;
    var var_id_asignatura_ = document.F2.id_asignatura_.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_fast_search = document.F2.nmgp_fast_search.value;
    var var_nmgp_cond_fast_search = document.F2.nmgp_cond_fast_search.value;
    var var_nmgp_arg_fast_search = document.F2.nmgp_arg_fast_search.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_t_evaluacion_p1_m2_table_refresh(var_id_estudiante_, var_id_grupo_, var_id_asignatura_, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_fast_search, var_nmgp_cond_fast_search, var_nmgp_arg_fast_search, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_table_refresh_cb);
  } //  do_ajax_form_t_evaluacion_p1_m2_table_refresh

  function do_ajax_form_t_evaluacion_p1_m2_table_refresh_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    if ("ERROR" == oResp.result)
    {
        scAjaxShowErrorDisplay("table", oResp.errList[0].msgText);
        scAjaxProcOff();
        return;
    }
    if (oResp["rsSize"] < <?php echo $this->sc_max_reg; ?>)
    {
       bRefreshTable = true;
    }
    if (oResp["navSummary"].reg_tot == 0)
    {
       $("#sc-ui-empty-form").show();
    }
    else
    {
       $("#sc-ui-empty-form").hide();
    }
    document.F2.id_estudiante_.value = scAjaxGetKeyValue("id_estudiante_");
    document.F2.id_grupo_.value = scAjaxGetKeyValue("id_grupo_");
    document.F2.id_asignatura_.value = scAjaxGetKeyValue("id_asignatura_");
    for (i = 1; i < <?php echo $this->sc_max_reg + 1; ?> ; i++)
    {
    }
    var sv_quot = oResp["tableRefresh"].replace(/&quot;/g, "_nm__asp_");
    sv_quot = scAjaxSpecCharParser(sv_quot);
    document.getElementById("SC_tab_mult_reg").innerHTML = sv_quot.replace(/_nm__asp_/g, "&quot;");
    for (i = 1; i < <?php echo $this->sc_max_reg + 1; ?> ; i++)
    {
    }
    document.F1.sc_contr_vert.value = parseInt(oResp["rsSize"]) + 1;
    iAjaxNewLine = oResp["rsSize"];
    var iAjaxNewLine = <?php echo $this->sc_max_reg + 1; ?>;
    for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
         scJQElementsAdd(iLine);
    }
    scJQGeneralAdd();
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scQSInit = true;
    scQSInitVal = $("#SC_fast_search_t").val();
    scQuickSearchKeyUp('t', null);
    $('#SC_fast_search_t').blur();
    scQuickSearchInit(true, '');
    scQSInit = false;
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    sc_insert_open = false;
  } // do_ajax_form_t_evaluacion_p1_m2_table_refresh_cb

  // ---------- Form
  var sc_num_ult_line = "";
  var sc_num_ult_opc  = "";
  var sc_num_ult_tr   = "";
  function do_ajax_form_t_evaluacion_p1_m2_submit_form(iNumLinha, indexTR)
  {
    if (scEventControl_active(iNumLinha)) {
      setTimeout(function() { do_ajax_form_t_evaluacion_p1_m2_submit_form(iNumLinha, indexTR); }, 500);
      return;
    }
    sc_num_ult_line = iNumLinha;
    sc_num_ult_tr   = indexTR;
    scAjaxHideMessage();
    var var_id_estudiante_ = scAjaxGetFieldSelect("id_estudiante_" + iNumLinha);
    var var_estatus_ = scAjaxGetFieldHidden("estatus_" + iNumLinha);
    var var_novedad_ = scAjaxGetFieldHidden("novedad_" + iNumLinha);
    var var_asienta_inasistencias_ = "";
    var var_inasistencia_p1_ = scAjaxGetFieldHidden("inasistencia_p1_" + iNumLinha);
    var var_eval_1_per_ = scAjaxGetFieldHidden("eval_1_per_" + iNumLinha);
    var var_dc1_ = scAjaxGetFieldText("dc1_" + iNumLinha);
    var var_dc2_ = scAjaxGetFieldText("dc2_" + iNumLinha);
    var var_dc3_ = scAjaxGetFieldText("dc3_" + iNumLinha);
    var var_dc4_ = scAjaxGetFieldText("dc4_" + iNumLinha);
    var var_pcent_dc_ = scAjaxGetFieldHidden("pcent_dc_" + iNumLinha);
    var var_dc5_ = scAjaxGetFieldText("dc5_" + iNumLinha);
    var var_dc6_ = scAjaxGetFieldText("dc6_" + iNumLinha);
    var var_dc7_ = scAjaxGetFieldText("dc7_" + iNumLinha);
    var var_dc8_ = scAjaxGetFieldText("dc8_" + iNumLinha);
    var var_pcent_dp_ = scAjaxGetFieldHidden("pcent_dp_" + iNumLinha);
    var var_dc9_ = scAjaxGetFieldText("dc9_" + iNumLinha);
    var var_dc10_ = scAjaxGetFieldText("dc10_" + iNumLinha);
    var var_dc11_ = scAjaxGetFieldText("dc11_" + iNumLinha);
    var var_dc12_ = scAjaxGetFieldText("dc12_" + iNumLinha);
    var var_pcent_ds_ = scAjaxGetFieldHidden("pcent_ds_" + iNumLinha);
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = "Sc_num_lin_alt?#?" + iNumLinha + "?@?" +  document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
    var var_nmgp_refresh_row = iNumLinha;
<?php
    }
    else
    {
?>
    var var_nmgp_refresh_row = "";
<?php
    }
?>
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    sc_num_ult_opc = var_nmgp_opcao;
    scAjaxProcOn();
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
    scRemoveErrors();
<?php
    }
?>
    x_ajax_form_t_evaluacion_p1_m2_submit_form(var_id_estudiante_, var_estatus_, var_novedad_, var_asienta_inasistencias_, var_inasistencia_p1_, var_eval_1_per_, var_dc1_, var_dc2_, var_dc3_, var_dc4_, var_pcent_dc_, var_dc5_, var_dc6_, var_dc7_, var_dc8_, var_pcent_dp_, var_dc9_, var_dc10_, var_dc11_, var_dc12_, var_pcent_ds_, var_nmgp_refresh_row, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_t_evaluacion_p1_m2_submit_form_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_submit_form

  function do_ajax_form_t_evaluacion_p1_m2_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxCalendarReload();
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
      scErrorLineOff(sc_num_ult_line, "__sc_all__");
    }
    else
    {
      scAjaxShowErrorDisplay("table", sAppErrors);
      scErrorLineOn(sc_num_ult_line, "__sc_all__");
    }
    if (!scAjaxHasError())
    {
      if (sc_num_ult_opc == 'incluir')
      {
         bRefreshTable = true;
         if (document.getElementById("sc_ins_line_" + sc_num_ult_line))
           document.getElementById("sc_ins_line_" + sc_num_ult_line).style.display = "none";
         if (document.getElementById("sc_upd_line_" + sc_num_ult_line))
           document.getElementById("sc_upd_line_" + sc_num_ult_line).style.display = "";
         if (document.getElementById("sc_clone_line_" + sc_num_ult_line))
           document.getElementById("sc_clone_line_" + sc_num_ult_line).style.display = "";
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
         if (document.getElementById("sc_exc_line_" + sc_num_ult_line))
           document.getElementById("sc_exc_line_" + sc_num_ult_line).style.display = "";
<?php
    }
?>
         if (document.getElementById("sc_new_line_" + sc_num_ult_line))
           document.getElementById("sc_new_line_" + sc_num_ult_line).style.display = "none";
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
         if (document.getElementById("sc_canceli_line_" + sc_num_ult_line))
           document.getElementById("sc_canceli_line_" + sc_num_ult_line).style.display = "none";
<?php
    }
?>
         sc_insert_open = false;
         scEnableNavigation();
         do_ajax_form_t_evaluacion_p1_m2_add_new_line();
         $("#sc-ui-empty-form").hide();
      }
      if (sc_num_ult_opc == 'alterar')
      {
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
    {
       if ($this->nmgp_botoes['delete'] == 'on')
       {
?>
         if (document.getElementById("sc_exc_line_" + sc_num_ult_line))
           document.getElementById("sc_exc_line_" + sc_num_ult_line).style.display = "";
<?php
       }
?>
         if (document.getElementById("sc_cancelu_line_" + sc_num_ult_line))
           document.getElementById("sc_cancelu_line_" + sc_num_ult_line).style.display = "none";
<?php
    }
?>
      }
      if (sc_num_ult_opc == 'excluir')
      {
         bRefreshTable = true;
         sc_name_table = document.getElementById("hidden_bloco_0");
         sc_name_table.deleteRow(sc_num_ult_tr);
         sc_num_ult_line = sc_name_table.rows.length - 1;
         if (0 == sc_num_ult_line || (1 == sc_num_ult_line && sc_insert_open))
         {
            $("#sc-ui-empty-form").show();
         }
      }
      scAjaxShowMessage();
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("id_estudiante_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("estatus_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("novedad_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("asienta_inasistencias_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("inasistencia_p1_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("eval_1_per_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc1_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc2_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc3_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc4_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("pcent_dc_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc5_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc6_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc7_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc8_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("pcent_dp_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc9_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc10_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc11_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dc12_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("pcent_ds_" + sc_num_ult_line);
<?php
if (isset($this->Embutida_form) && $this->Embutida_form) {
?>
      scAjaxSetFields();
      scAjaxSetReadonly();
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly) {
?>
      mdCloseLine();
<?php
    }
} else {
?>
      scAjaxSetReadonly(true);
<?php
}
?>
      scLigEditLookupCall();
    }
    Nm_Proc_Atualiz = false;
    if (!scAjaxHasError())
    {
      if (sc_closeChange && self.parent && self.parent.tb_remove)
      {
        self.parent.tb_remove();
      }
      scAjaxSetFields();
      if (sc_num_ult_opc == 'alterar' || sc_num_ult_opc == 'incluir')
      {
<?php
        if (isset($this->Embutida_form) && $this->Embutida_form)
        {
?>
<?php
        }
?>
      }
    }
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetDisplay(true);
    scAjaxSetLabel(true);
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_t_evaluacion_p1_m2_submit_form_cb

  var scStatusDetail = {};

  function do_ajax_form_t_evaluacion_p1_m2_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    if (sc_insert_open)
    {
        do_ajax_form_t_evaluacion_p1_m2_cancel_insert(sc_num_ult_line);
    }
    nm_uncheck_delete();
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    for (iNavForm = 1; iNavForm < <?php echo $this->sc_max_reg; ?> + 1; iNavForm++)
    {
      scAjaxHideErrorDisplay("id_estudiante_" + iNavForm);
      scAjaxHideErrorDisplay("estatus_" + iNavForm);
      scAjaxHideErrorDisplay("novedad_" + iNavForm);
      scAjaxHideErrorDisplay("asienta_inasistencias_" + iNavForm);
      scAjaxHideErrorDisplay("inasistencia_p1_" + iNavForm);
      scAjaxHideErrorDisplay("eval_1_per_" + iNavForm);
      scAjaxHideErrorDisplay("dc1_" + iNavForm);
      scAjaxHideErrorDisplay("dc2_" + iNavForm);
      scAjaxHideErrorDisplay("dc3_" + iNavForm);
      scAjaxHideErrorDisplay("dc4_" + iNavForm);
      scAjaxHideErrorDisplay("pcent_dc_" + iNavForm);
      scAjaxHideErrorDisplay("dc5_" + iNavForm);
      scAjaxHideErrorDisplay("dc6_" + iNavForm);
      scAjaxHideErrorDisplay("dc7_" + iNavForm);
      scAjaxHideErrorDisplay("dc8_" + iNavForm);
      scAjaxHideErrorDisplay("pcent_dp_" + iNavForm);
      scAjaxHideErrorDisplay("dc9_" + iNavForm);
      scAjaxHideErrorDisplay("dc10_" + iNavForm);
      scAjaxHideErrorDisplay("dc11_" + iNavForm);
      scAjaxHideErrorDisplay("dc12_" + iNavForm);
      scAjaxHideErrorDisplay("pcent_ds_" + iNavForm);
    }
    var var_id_estudiante_ = document.F2.id_estudiante_.value;
    var var_id_grupo_ = document.F2.id_grupo_.value;
    var var_id_asignatura_ = document.F2.id_asignatura_.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_t_evaluacion_p1_m2_navigate_form(var_id_estudiante_, var_id_grupo_, var_id_asignatura_, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_t_evaluacion_p1_m2_navigate_form_cb);
  } // do_ajax_form_t_evaluacion_p1_m2_navigate_form

  function do_ajax_form_t_evaluacion_p1_m2_navigate_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    var var_last_index = oResp["rsSize"];
    sc_mupload_ok = true;
    scAjaxSetFields();
    document.F2.id_estudiante_.value = scAjaxGetKeyValue("id_estudiante_" + var_last_index);
    document.F2.id_grupo_.value = scAjaxGetKeyValue("id_grupo_" + var_last_index);
    document.F2.id_asignatura_.value = scAjaxGetKeyValue("id_asignatura_" + var_last_index);
    var_last_index = parseInt(var_last_index) + 1;
    for (iNavigateForm = 1; iNavigateForm < var_last_index; iNavigateForm++)
    {
      if (document.getElementById("idVertRow" + iNavigateForm))
      {
        document.getElementById("idVertRow" + iNavigateForm).style.display = "";
      }
    }
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    for (iNavigatedel = <?php echo $this->sc_max_reg; ?>; iNavigatedel >= iNavigateForm; iNavigatedel--)
    {
        oTBodyOld.deleteRow(iNavigatedel);
        bRefreshTable = true;
    }
    document.F1.sc_contr_vert.value = var_last_index;
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    for (var iImg = 0; iImg < var_last_index; iImg++)
    {
    }
    scAjaxSetBtnVars();
    scErrorLineReset();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scFocusField('dc1_1');

    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_t_evaluacion_p1_m2_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_t_evaluacion_p1_m2_navigate_form_cb
  function sc_hide_form_t_evaluacion_p1_m2_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_t_evaluacion_p1_m2_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc

<?php
$sLineInfo = $this->Embutida_form ? '' : ' (linha " + iNumLinha + ")';
?>
  function ajax_create_tables(iNumLinha)
  {
    ajax_field_list[iTotCampos] = "id_estudiante_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "estatus_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "novedad_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "asienta_inasistencias_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "inasistencia_p1_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "eval_1_per_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc1_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc2_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc3_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc4_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "pcent_dc_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc5_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc6_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc7_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc8_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "pcent_dp_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc9_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc10_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc11_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dc12_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "pcent_ds_" + iNumLinha;
    iTotCampos++;
    ajax_error_list["id_estudiante_" + iNumLinha] = {"label": "Id Estudiante<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["estatus_" + iNumLinha] = {"label": "Est<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["novedad_" + iNumLinha] = {"label": "Nov<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["asienta_inasistencias_" + iNumLinha] = {"label": "AFA<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["inasistencia_p1_" + iNumLinha] = {"label": "FAA<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["eval_1_per_" + iNumLinha] = {"label": "1Per<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc1_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc2_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp2'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc3_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp3'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc4_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp4'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["pcent_dc_" + iNumLinha] = {"label": "Val<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc5_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp5'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc6_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp6'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc7_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp7'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc8_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp8'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["pcent_dp_" + iNumLinha] = {"label": "Val<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc9_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp9'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc10_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp10'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc11_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp11'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dc12_" + iNumLinha] = {"label": "<?php echo $_SESSION['par_cod_desemp12'] ?><?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["pcent_ds_" + iNumLinha] = {"label": "Val<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_field_mult["id_estudiante_"][iNumLinha] = "id_estudiante_" + iNumLinha;
    ajax_field_mult["estatus_"][iNumLinha] = "estatus_" + iNumLinha;
    ajax_field_mult["novedad_"][iNumLinha] = "novedad_" + iNumLinha;
    ajax_field_mult["asienta_inasistencias_"][iNumLinha] = "asienta_inasistencias_" + iNumLinha;
    ajax_field_mult["inasistencia_p1_"][iNumLinha] = "inasistencia_p1_" + iNumLinha;
    ajax_field_mult["eval_1_per_"][iNumLinha] = "eval_1_per_" + iNumLinha;
    ajax_field_mult["dc1_"][iNumLinha] = "dc1_" + iNumLinha;
    ajax_field_mult["dc2_"][iNumLinha] = "dc2_" + iNumLinha;
    ajax_field_mult["dc3_"][iNumLinha] = "dc3_" + iNumLinha;
    ajax_field_mult["dc4_"][iNumLinha] = "dc4_" + iNumLinha;
    ajax_field_mult["pcent_dc_"][iNumLinha] = "pcent_dc_" + iNumLinha;
    ajax_field_mult["dc5_"][iNumLinha] = "dc5_" + iNumLinha;
    ajax_field_mult["dc6_"][iNumLinha] = "dc6_" + iNumLinha;
    ajax_field_mult["dc7_"][iNumLinha] = "dc7_" + iNumLinha;
    ajax_field_mult["dc8_"][iNumLinha] = "dc8_" + iNumLinha;
    ajax_field_mult["pcent_dp_"][iNumLinha] = "pcent_dp_" + iNumLinha;
    ajax_field_mult["dc9_"][iNumLinha] = "dc9_" + iNumLinha;
    ajax_field_mult["dc10_"][iNumLinha] = "dc10_" + iNumLinha;
    ajax_field_mult["dc11_"][iNumLinha] = "dc11_" + iNumLinha;
    ajax_field_mult["dc12_"][iNumLinha] = "dc12_" + iNumLinha;
    ajax_field_mult["pcent_ds_"][iNumLinha] = "pcent_ds_" + iNumLinha;
    ajax_field_id["id_estudiante_" + iNumLinha] = new Array("hidden_field_label_id_estudiante_", "hidden_field_data_id_estudiante_" + iNumLinha);
    ajax_field_id["estatus_" + iNumLinha] = new Array("hidden_field_label_estatus_", "hidden_field_data_estatus_" + iNumLinha);
    ajax_field_id["novedad_" + iNumLinha] = new Array("hidden_field_label_novedad_", "hidden_field_data_novedad_" + iNumLinha);
    ajax_field_id["asienta_inasistencias_" + iNumLinha] = new Array("hidden_field_label_asienta_inasistencias_", "hidden_field_data_asienta_inasistencias_" + iNumLinha);
    ajax_field_id["inasistencia_p1_" + iNumLinha] = new Array("hidden_field_label_inasistencia_p1_", "hidden_field_data_inasistencia_p1_" + iNumLinha);
    ajax_field_id["eval_1_per_" + iNumLinha] = new Array("hidden_field_label_eval_1_per_", "hidden_field_data_eval_1_per_" + iNumLinha);
    ajax_field_id["dc1_" + iNumLinha] = new Array("hidden_field_label_dc1_", "hidden_field_data_dc1_" + iNumLinha);
    ajax_field_id["dc2_" + iNumLinha] = new Array("hidden_field_label_dc2_", "hidden_field_data_dc2_" + iNumLinha);
    ajax_field_id["dc3_" + iNumLinha] = new Array("hidden_field_label_dc3_", "hidden_field_data_dc3_" + iNumLinha);
    ajax_field_id["dc4_" + iNumLinha] = new Array("hidden_field_label_dc4_", "hidden_field_data_dc4_" + iNumLinha);
    ajax_field_id["pcent_dc_" + iNumLinha] = new Array("hidden_field_label_pcent_dc_", "hidden_field_data_pcent_dc_" + iNumLinha);
    ajax_field_id["dc5_" + iNumLinha] = new Array("hidden_field_label_dc5_", "hidden_field_data_dc5_" + iNumLinha);
    ajax_field_id["dc6_" + iNumLinha] = new Array("hidden_field_label_dc6_", "hidden_field_data_dc6_" + iNumLinha);
    ajax_field_id["dc7_" + iNumLinha] = new Array("hidden_field_label_dc7_", "hidden_field_data_dc7_" + iNumLinha);
    ajax_field_id["dc8_" + iNumLinha] = new Array("hidden_field_label_dc8_", "hidden_field_data_dc8_" + iNumLinha);
    ajax_field_id["pcent_dp_" + iNumLinha] = new Array("hidden_field_label_pcent_dp_", "hidden_field_data_pcent_dp_" + iNumLinha);
    ajax_field_id["dc9_" + iNumLinha] = new Array("hidden_field_label_dc9_", "hidden_field_data_dc9_" + iNumLinha);
    ajax_field_id["dc10_" + iNumLinha] = new Array("hidden_field_label_dc10_", "hidden_field_data_dc10_" + iNumLinha);
    ajax_field_id["dc11_" + iNumLinha] = new Array("hidden_field_label_dc11_", "hidden_field_data_dc11_" + iNumLinha);
    ajax_field_id["dc12_" + iNumLinha] = new Array("hidden_field_label_dc12_", "hidden_field_data_dc12_" + iNumLinha);
    ajax_field_id["pcent_ds_" + iNumLinha] = new Array("hidden_field_label_pcent_ds_", "hidden_field_data_pcent_ds_" + iNumLinha);
    ajax_error_count["id_estudiante_" + iNumLinha] = "off";
    ajax_error_count["estatus_" + iNumLinha] = "off";
    ajax_error_count["novedad_" + iNumLinha] = "off";
    ajax_error_count["asienta_inasistencias_" + iNumLinha] = "off";
    ajax_error_count["inasistencia_p1_" + iNumLinha] = "off";
    ajax_error_count["eval_1_per_" + iNumLinha] = "off";
    ajax_error_count["dc1_" + iNumLinha] = "off";
    ajax_error_count["dc2_" + iNumLinha] = "off";
    ajax_error_count["dc3_" + iNumLinha] = "off";
    ajax_error_count["dc4_" + iNumLinha] = "off";
    ajax_error_count["pcent_dc_" + iNumLinha] = "off";
    ajax_error_count["dc5_" + iNumLinha] = "off";
    ajax_error_count["dc6_" + iNumLinha] = "off";
    ajax_error_count["dc7_" + iNumLinha] = "off";
    ajax_error_count["dc8_" + iNumLinha] = "off";
    ajax_error_count["pcent_dp_" + iNumLinha] = "off";
    ajax_error_count["dc9_" + iNumLinha] = "off";
    ajax_error_count["dc10_" + iNumLinha] = "off";
    ajax_error_count["dc11_" + iNumLinha] = "off";
    ajax_error_count["dc12_" + iNumLinha] = "off";
    ajax_error_count["pcent_ds_" + iNumLinha] = "off";
<?php
if (!$this->Grid_editavel)
{
?>
    ajax_read_only["id_estudiante_" + iNumLinha] = "on";
    ajax_read_only["estatus_" + iNumLinha] = "off";
    ajax_read_only["novedad_" + iNumLinha] = "off";
    ajax_read_only["asienta_inasistencias_" + iNumLinha] = "off";
    ajax_read_only["inasistencia_p1_" + iNumLinha] = "off";
    ajax_read_only["eval_1_per_" + iNumLinha] = "off";
    ajax_read_only["dc1_" + iNumLinha] = "off";
    ajax_read_only["dc2_" + iNumLinha] = "off";
    ajax_read_only["dc3_" + iNumLinha] = "off";
    ajax_read_only["dc4_" + iNumLinha] = "off";
    ajax_read_only["pcent_dc_" + iNumLinha] = "off";
    ajax_read_only["dc5_" + iNumLinha] = "off";
    ajax_read_only["dc6_" + iNumLinha] = "off";
    ajax_read_only["dc7_" + iNumLinha] = "off";
    ajax_read_only["dc8_" + iNumLinha] = "off";
    ajax_read_only["pcent_dp_" + iNumLinha] = "off";
    ajax_read_only["dc9_" + iNumLinha] = "off";
    ajax_read_only["dc10_" + iNumLinha] = "off";
    ajax_read_only["dc11_" + iNumLinha] = "off";
    ajax_read_only["dc12_" + iNumLinha] = "off";
    ajax_read_only["pcent_ds_" + iNumLinha] = "off";
<?php
}
else
{
?>
    ajax_read_only["id_estudiante_" + iNumLinha] = "on";
    ajax_read_only["estatus_" + iNumLinha] = "on";
    ajax_read_only["novedad_" + iNumLinha] = "on";
    ajax_read_only["asienta_inasistencias_" + iNumLinha] = "on";
    ajax_read_only["inasistencia_p1_" + iNumLinha] = "on";
    ajax_read_only["eval_1_per_" + iNumLinha] = "on";
    ajax_read_only["dc1_" + iNumLinha] = "on";
    ajax_read_only["dc2_" + iNumLinha] = "on";
    ajax_read_only["dc3_" + iNumLinha] = "on";
    ajax_read_only["dc4_" + iNumLinha] = "on";
    ajax_read_only["pcent_dc_" + iNumLinha] = "on";
    ajax_read_only["dc5_" + iNumLinha] = "on";
    ajax_read_only["dc6_" + iNumLinha] = "on";
    ajax_read_only["dc7_" + iNumLinha] = "on";
    ajax_read_only["dc8_" + iNumLinha] = "on";
    ajax_read_only["pcent_dp_" + iNumLinha] = "on";
    ajax_read_only["dc9_" + iNumLinha] = "on";
    ajax_read_only["dc10_" + iNumLinha] = "on";
    ajax_read_only["dc11_" + iNumLinha] = "on";
    ajax_read_only["dc12_" + iNumLinha] = "on";
    ajax_read_only["pcent_ds_" + iNumLinha] = "on";
<?php
}
?>
  }
  function ajax_destroy_tables(iNumLinha)
  {
    ajax_error_list["id_estudiante_" + iNumLinha] = null;
    ajax_error_list["estatus_" + iNumLinha] = null;
    ajax_error_list["novedad_" + iNumLinha] = null;
    ajax_error_list["asienta_inasistencias_" + iNumLinha] = null;
    ajax_error_list["inasistencia_p1_" + iNumLinha] = null;
    ajax_error_list["eval_1_per_" + iNumLinha] = null;
    ajax_error_list["dc1_" + iNumLinha] = null;
    ajax_error_list["dc2_" + iNumLinha] = null;
    ajax_error_list["dc3_" + iNumLinha] = null;
    ajax_error_list["dc4_" + iNumLinha] = null;
    ajax_error_list["pcent_dc_" + iNumLinha] = null;
    ajax_error_list["dc5_" + iNumLinha] = null;
    ajax_error_list["dc6_" + iNumLinha] = null;
    ajax_error_list["dc7_" + iNumLinha] = null;
    ajax_error_list["dc8_" + iNumLinha] = null;
    ajax_error_list["pcent_dp_" + iNumLinha] = null;
    ajax_error_list["dc9_" + iNumLinha] = null;
    ajax_error_list["dc10_" + iNumLinha] = null;
    ajax_error_list["dc11_" + iNumLinha] = null;
    ajax_error_list["dc12_" + iNumLinha] = null;
    ajax_error_list["pcent_ds_" + iNumLinha] = null;
  }

  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  iTotCampos = 0;
  iTotDt_Hr  = 0;

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {};
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": ""
  };

  var ajax_field_mult = {
    "id_estudiante_": new Array(),
    "estatus_": new Array(),
    "novedad_": new Array(),
    "asienta_inasistencias_": new Array(),
    "inasistencia_p1_": new Array(),
    "eval_1_per_": new Array(),
    "dc1_": new Array(),
    "dc2_": new Array(),
    "dc3_": new Array(),
    "dc4_": new Array(),
    "pcent_dc_": new Array(),
    "dc5_": new Array(),
    "dc6_": new Array(),
    "dc7_": new Array(),
    "dc8_": new Array(),
    "pcent_dp_": new Array(),
    "dc9_": new Array(),
    "dc10_": new Array(),
    "dc11_": new Array(),
    "dc12_": new Array(),
    "pcent_ds_": new Array()
  };

  var ajax_field_id = {};

  var ajax_read_only = {};

  var ajax_error_count = {};

  var Lim_linhas = <?php echo $sc_seq_vert ?>;
  for (iNumLinha = 1; iNumLinha < Lim_linhas; iNumLinha++)
  {
     ajax_create_tables(iNumLinha);
  }

  function scRemoveErrors()
  {
    for (iNumLinha = 1; iNumLinha < Lim_linhas; iNumLinha++)
    {
      ajax_error_list["id_estudiante_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["id_estudiante_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["id_estudiante_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["id_estudiante_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["id_estudiante_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["estatus_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["estatus_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["estatus_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["estatus_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["estatus_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["novedad_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["novedad_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["novedad_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["novedad_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["novedad_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["asienta_inasistencias_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["asienta_inasistencias_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["asienta_inasistencias_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["asienta_inasistencias_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["asienta_inasistencias_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["inasistencia_p1_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["inasistencia_p1_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["inasistencia_p1_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["inasistencia_p1_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["inasistencia_p1_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["eval_1_per_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["eval_1_per_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["eval_1_per_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["eval_1_per_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["eval_1_per_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc1_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc1_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc1_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc1_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc1_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc2_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc2_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc2_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc2_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc2_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc3_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc3_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc3_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc3_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc3_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc4_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc4_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc4_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc4_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc4_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["pcent_dc_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["pcent_dc_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["pcent_dc_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["pcent_dc_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["pcent_dc_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc5_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc5_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc5_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc5_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc5_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc6_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc6_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc6_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc6_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc6_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc7_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc7_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc7_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc7_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc7_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc8_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc8_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc8_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc8_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc8_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["pcent_dp_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["pcent_dp_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["pcent_dp_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["pcent_dp_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["pcent_dp_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc9_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc9_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc9_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc9_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc9_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc10_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc10_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc10_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc10_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc10_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc11_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc11_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc11_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc11_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc11_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dc12_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dc12_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dc12_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dc12_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dc12_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["pcent_ds_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["pcent_ds_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["pcent_ds_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["pcent_ds_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["pcent_ds_" + iNumLinha]["onfocus"] = new Array();
    }
  }

  function mdOpenLine(iSeq)
  {
    if (document.getElementById("sc_open_line_" + iSeq))
    {
      document.getElementById("sc_open_line_" + iSeq).style.display = "none";
    }
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
    if (document.getElementById("sc_exc_line_" + iSeq))
    {
      document.getElementById("sc_exc_line_" + iSeq).style.display = "none";
    }
<?php
    }
?>
    if (document.getElementById("sc_upd_line_" + iSeq))
    {
      document.getElementById("sc_upd_line_" + iSeq).style.display = "";
    }
    if (document.getElementById("sc_cancelu_line_" + iSeq))
    {
      document.getElementById("sc_cancelu_line_" + iSeq).style.display = "";
    }
    mdOpenObjects(iSeq);
  }

  function mdOpenObjects(iSeq)
  {
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['id_estudiante_'])) ? $this->nmgp_cmp_readonly['id_estudiante_'] : 'on';
?>
    scAjaxFieldRead("id_estudiante_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['estatus_'])) ? $this->nmgp_cmp_readonly['estatus_'] : 'off';
?>
    scAjaxFieldRead("estatus_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['novedad_'])) ? $this->nmgp_cmp_readonly['novedad_'] : 'off';
?>
    scAjaxFieldRead("novedad_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['asienta_inasistencias_'])) ? $this->nmgp_cmp_readonly['asienta_inasistencias_'] : 'off';
?>
    scAjaxFieldRead("asienta_inasistencias_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['inasistencia_p1_'])) ? $this->nmgp_cmp_readonly['inasistencia_p1_'] : 'off';
?>
    scAjaxFieldRead("inasistencia_p1_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['eval_1_per_'])) ? $this->nmgp_cmp_readonly['eval_1_per_'] : 'off';
?>
    scAjaxFieldRead("eval_1_per_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc1_'])) ? $this->nmgp_cmp_readonly['dc1_'] : 'off';
?>
    scAjaxFieldRead("dc1_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc2_'])) ? $this->nmgp_cmp_readonly['dc2_'] : 'off';
?>
    scAjaxFieldRead("dc2_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc3_'])) ? $this->nmgp_cmp_readonly['dc3_'] : 'off';
?>
    scAjaxFieldRead("dc3_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc4_'])) ? $this->nmgp_cmp_readonly['dc4_'] : 'off';
?>
    scAjaxFieldRead("dc4_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['pcent_dc_'])) ? $this->nmgp_cmp_readonly['pcent_dc_'] : 'off';
?>
    scAjaxFieldRead("pcent_dc_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc5_'])) ? $this->nmgp_cmp_readonly['dc5_'] : 'off';
?>
    scAjaxFieldRead("dc5_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc6_'])) ? $this->nmgp_cmp_readonly['dc6_'] : 'off';
?>
    scAjaxFieldRead("dc6_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc7_'])) ? $this->nmgp_cmp_readonly['dc7_'] : 'off';
?>
    scAjaxFieldRead("dc7_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc8_'])) ? $this->nmgp_cmp_readonly['dc8_'] : 'off';
?>
    scAjaxFieldRead("dc8_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['pcent_dp_'])) ? $this->nmgp_cmp_readonly['pcent_dp_'] : 'off';
?>
    scAjaxFieldRead("pcent_dp_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc9_'])) ? $this->nmgp_cmp_readonly['dc9_'] : 'off';
?>
    scAjaxFieldRead("dc9_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc10_'])) ? $this->nmgp_cmp_readonly['dc10_'] : 'off';
?>
    scAjaxFieldRead("dc10_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc11_'])) ? $this->nmgp_cmp_readonly['dc11_'] : 'off';
?>
    scAjaxFieldRead("dc11_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dc12_'])) ? $this->nmgp_cmp_readonly['dc12_'] : 'off';
?>
    scAjaxFieldRead("dc12_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['pcent_ds_'])) ? $this->nmgp_cmp_readonly['pcent_ds_'] : 'off';
?>
    scAjaxFieldRead("pcent_ds_" + iSeq, "<?php echo $NM_contr_readonly ?>");
  }

  function mdCloseObjects(iSeq)
  {
    scAjaxFieldRead("id_estudiante_" + iSeq, "on");
    scAjaxFieldRead("estatus_" + iSeq, "on");
    scAjaxFieldRead("novedad_" + iSeq, "on");
    scAjaxFieldRead("asienta_inasistencias_" + iSeq, "on");
    scAjaxFieldRead("inasistencia_p1_" + iSeq, "on");
    scAjaxFieldRead("eval_1_per_" + iSeq, "on");
    scAjaxFieldRead("dc1_" + iSeq, "on");
    scAjaxFieldRead("dc2_" + iSeq, "on");
    scAjaxFieldRead("dc3_" + iSeq, "on");
    scAjaxFieldRead("dc4_" + iSeq, "on");
    scAjaxFieldRead("pcent_dc_" + iSeq, "on");
    scAjaxFieldRead("dc5_" + iSeq, "on");
    scAjaxFieldRead("dc6_" + iSeq, "on");
    scAjaxFieldRead("dc7_" + iSeq, "on");
    scAjaxFieldRead("dc8_" + iSeq, "on");
    scAjaxFieldRead("pcent_dp_" + iSeq, "on");
    scAjaxFieldRead("dc9_" + iSeq, "on");
    scAjaxFieldRead("dc10_" + iSeq, "on");
    scAjaxFieldRead("dc11_" + iSeq, "on");
    scAjaxFieldRead("dc12_" + iSeq, "on");
    scAjaxFieldRead("pcent_ds_" + iSeq, "on");
  }

  function mdCloseLine()
  {
    if (!oResp["closeLine"] || "" == oResp["closeLine"])
    {
      return;
    }
<?php
    if ($this->nmgp_botoes['update'] == 'on')
    {
?>
    if (document.getElementById("sc_open_line_" + oResp["closeLine"]))
    {
      document.getElementById("sc_open_line_" + oResp["closeLine"]).style.display = "";
    }
<?php
    }
?>
    if (document.getElementById("sc_upd_line_" + oResp["closeLine"]))
    {
      document.getElementById("sc_upd_line_" + oResp["closeLine"]).style.display = "none";
    }
  }

  var sc_open_lines = 0;
  var orig_Nav_permite_ret = "";
  var orig_Nav_permite_ava = "";
  function scDisableNavigation()
  {
    if (0 == sc_open_lines)
    {
      orig_Nav_permite_ret = Nav_permite_ret;
      orig_Nav_permite_ava = Nav_permite_ava;
      Nav_permite_ret = "N";
      Nav_permite_ava = "N";
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
    sc_open_lines++;
  }

  function scEnableNavigation()
  {
    sc_open_lines--;
    if (0 == sc_open_lines)
    {
      Nav_permite_ret = orig_Nav_permite_ret;
      Nav_permite_ava = orig_Nav_permite_ava;
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
  }

  function scErrorLineOn(iRow, sIdError)
  {
    var bErrorRow = false;
    if ("__sc_all__" == sIdError)
    {
      bErrorRow = true;
    }
    else if (ajax_error_count[sIdError + iRow])
    {
      ajax_error_count[sIdError + iRow] = "on";
    }
    if (bErrorRow || ("on" == ajax_error_count["id_estudiante_" + iRow] || "on" == ajax_error_count["estatus_" + iRow] || "on" == ajax_error_count["novedad_" + iRow] || "on" == ajax_error_count["asienta_inasistencias_" + iRow] || "on" == ajax_error_count["inasistencia_p1_" + iRow] || "on" == ajax_error_count["eval_1_per_" + iRow] || "on" == ajax_error_count["dc1_" + iRow] || "on" == ajax_error_count["dc2_" + iRow] || "on" == ajax_error_count["dc3_" + iRow] || "on" == ajax_error_count["dc4_" + iRow] || "on" == ajax_error_count["pcent_dc_" + iRow] || "on" == ajax_error_count["dc5_" + iRow] || "on" == ajax_error_count["dc6_" + iRow] || "on" == ajax_error_count["dc7_" + iRow] || "on" == ajax_error_count["dc8_" + iRow] || "on" == ajax_error_count["pcent_dp_" + iRow] || "on" == ajax_error_count["dc9_" + iRow] || "on" == ajax_error_count["dc10_" + iRow] || "on" == ajax_error_count["dc11_" + iRow] || "on" == ajax_error_count["dc12_" + iRow] || "on" == ajax_error_count["pcent_ds_" + iRow]))
    {
      if (document.getElementById("hidden_field_data_sc_seq" + iRow))
        document.getElementById("hidden_field_data_sc_seq" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_actions" + iRow))
        document.getElementById("hidden_field_data_sc_actions" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_id_estudiante_" + iRow))
        document.getElementById("hidden_field_data_id_estudiante_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_estatus_" + iRow))
        document.getElementById("hidden_field_data_estatus_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_novedad_" + iRow))
        document.getElementById("hidden_field_data_novedad_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_asienta_inasistencias_" + iRow))
        document.getElementById("hidden_field_data_asienta_inasistencias_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_inasistencia_p1_" + iRow))
        document.getElementById("hidden_field_data_inasistencia_p1_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_eval_1_per_" + iRow))
        document.getElementById("hidden_field_data_eval_1_per_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc1_" + iRow))
        document.getElementById("hidden_field_data_dc1_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc2_" + iRow))
        document.getElementById("hidden_field_data_dc2_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc3_" + iRow))
        document.getElementById("hidden_field_data_dc3_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc4_" + iRow))
        document.getElementById("hidden_field_data_dc4_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_pcent_dc_" + iRow))
        document.getElementById("hidden_field_data_pcent_dc_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc5_" + iRow))
        document.getElementById("hidden_field_data_dc5_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc6_" + iRow))
        document.getElementById("hidden_field_data_dc6_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc7_" + iRow))
        document.getElementById("hidden_field_data_dc7_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc8_" + iRow))
        document.getElementById("hidden_field_data_dc8_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_pcent_dp_" + iRow))
        document.getElementById("hidden_field_data_pcent_dp_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc9_" + iRow))
        document.getElementById("hidden_field_data_dc9_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc10_" + iRow))
        document.getElementById("hidden_field_data_dc10_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc11_" + iRow))
        document.getElementById("hidden_field_data_dc11_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dc12_" + iRow))
        document.getElementById("hidden_field_data_dc12_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_pcent_ds_" + iRow))
        document.getElementById("hidden_field_data_pcent_ds_" + iRow).className = "scFormErrorLine";
    }
  }

  function scErrorLineOff(iRow, sIdError)
  {
    var bErrorRow = false;
    if ("__sc_all__" == sIdError)
    {
      bErrorRow = true;
    }
    else if (ajax_error_count[sIdError + iRow])
    {
      ajax_error_count[sIdError + iRow] = "off";
    }
    if (bErrorRow || ("off" == ajax_error_count["id_estudiante_" + iRow] && "off" == ajax_error_count["estatus_" + iRow] && "off" == ajax_error_count["novedad_" + iRow] && "off" == ajax_error_count["asienta_inasistencias_" + iRow] && "off" == ajax_error_count["inasistencia_p1_" + iRow] && "off" == ajax_error_count["eval_1_per_" + iRow] && "off" == ajax_error_count["dc1_" + iRow] && "off" == ajax_error_count["dc2_" + iRow] && "off" == ajax_error_count["dc3_" + iRow] && "off" == ajax_error_count["dc4_" + iRow] && "off" == ajax_error_count["pcent_dc_" + iRow] && "off" == ajax_error_count["dc5_" + iRow] && "off" == ajax_error_count["dc6_" + iRow] && "off" == ajax_error_count["dc7_" + iRow] && "off" == ajax_error_count["dc8_" + iRow] && "off" == ajax_error_count["pcent_dp_" + iRow] && "off" == ajax_error_count["dc9_" + iRow] && "off" == ajax_error_count["dc10_" + iRow] && "off" == ajax_error_count["dc11_" + iRow] && "off" == ajax_error_count["dc12_" + iRow] && "off" == ajax_error_count["pcent_ds_" + iRow]))
    {
      if (bErrorRow)
      {
        ajax_error_count["id_estudiante_" + iRow] = "off";
        ajax_error_count["estatus_" + iRow] = "off";
        ajax_error_count["novedad_" + iRow] = "off";
        ajax_error_count["asienta_inasistencias_" + iRow] = "off";
        ajax_error_count["inasistencia_p1_" + iRow] = "off";
        ajax_error_count["eval_1_per_" + iRow] = "off";
        ajax_error_count["dc1_" + iRow] = "off";
        ajax_error_count["dc2_" + iRow] = "off";
        ajax_error_count["dc3_" + iRow] = "off";
        ajax_error_count["dc4_" + iRow] = "off";
        ajax_error_count["pcent_dc_" + iRow] = "off";
        ajax_error_count["dc5_" + iRow] = "off";
        ajax_error_count["dc6_" + iRow] = "off";
        ajax_error_count["dc7_" + iRow] = "off";
        ajax_error_count["dc8_" + iRow] = "off";
        ajax_error_count["pcent_dp_" + iRow] = "off";
        ajax_error_count["dc9_" + iRow] = "off";
        ajax_error_count["dc10_" + iRow] = "off";
        ajax_error_count["dc11_" + iRow] = "off";
        ajax_error_count["dc12_" + iRow] = "off";
        ajax_error_count["pcent_ds_" + iRow] = "off";
      }
      var sCssLine = scErrorLineCss(iRow);
      if (document.getElementById("hidden_field_data_sc_seq" + iRow))
        document.getElementById("hidden_field_data_sc_seq" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_actions" + iRow))
        document.getElementById("hidden_field_data_sc_actions" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_id_estudiante_" + iRow))
        document.getElementById("hidden_field_data_id_estudiante_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_estatus_" + iRow))
        document.getElementById("hidden_field_data_estatus_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_novedad_" + iRow))
        document.getElementById("hidden_field_data_novedad_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_asienta_inasistencias_" + iRow))
        document.getElementById("hidden_field_data_asienta_inasistencias_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_inasistencia_p1_" + iRow))
        document.getElementById("hidden_field_data_inasistencia_p1_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_eval_1_per_" + iRow))
        document.getElementById("hidden_field_data_eval_1_per_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc1_" + iRow))
        document.getElementById("hidden_field_data_dc1_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc2_" + iRow))
        document.getElementById("hidden_field_data_dc2_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc3_" + iRow))
        document.getElementById("hidden_field_data_dc3_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc4_" + iRow))
        document.getElementById("hidden_field_data_dc4_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_pcent_dc_" + iRow))
        document.getElementById("hidden_field_data_pcent_dc_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc5_" + iRow))
        document.getElementById("hidden_field_data_dc5_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc6_" + iRow))
        document.getElementById("hidden_field_data_dc6_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc7_" + iRow))
        document.getElementById("hidden_field_data_dc7_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc8_" + iRow))
        document.getElementById("hidden_field_data_dc8_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_pcent_dp_" + iRow))
        document.getElementById("hidden_field_data_pcent_dp_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc9_" + iRow))
        document.getElementById("hidden_field_data_dc9_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc10_" + iRow))
        document.getElementById("hidden_field_data_dc10_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc11_" + iRow))
        document.getElementById("hidden_field_data_dc11_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dc12_" + iRow))
        document.getElementById("hidden_field_data_dc12_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_pcent_ds_" + iRow))
        document.getElementById("hidden_field_data_pcent_ds_" + iRow).className = sCssLine;
    }
  }

  function scErrorLineReset()
  {
    for (iLineReset = 0; iLineReset < iAjaxNewLine; iLineReset++)
    {
      scErrorLineOff(iLineReset, "__sc_all__");
    }
  }

  function scErrorLineCss(iRow)
  {
    return "scFormDataOddMult";
  }
  var bRefreshTable = false;
  function scRefreshTable()
  {
    if (bRefreshTable || document.F2.nmgp_opcao.value == "fast_search")
    {
      do_ajax_form_t_evaluacion_p1_m2_table_refresh();
      bRefreshTable = false;
      return true;
    }
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("id_estudiante_" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("estatus_" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("novedad_" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("asienta_inasistencias_" == sIndex)
    {
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("inasistencia_p1_" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("eval_1_per_" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc1_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc2_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc3_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc4_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("pcent_dc_" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc5_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc6_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc7_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc8_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("pcent_dp_" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc9_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc10_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc11_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dc12_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("pcent_ds_" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>
