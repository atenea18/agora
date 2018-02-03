
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
        if ("geral_form_students_mob" == sTestField)
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


  // ---------- Validate estatus
  function do_ajax_form_students_mob_validate_estatus()
  {
    var nomeCampo_estatus = "estatus";
    var var_estatus = scAjaxGetFieldRadio(nomeCampo_estatus);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_estatus(var_estatus, var_script_case_init, do_ajax_form_students_mob_validate_estatus_cb);
  } // do_ajax_form_students_mob_validate_estatus

  function do_ajax_form_students_mob_validate_estatus_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "estatus";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_estatus_cb

  // ---------- Validate fecha_matricula
  function do_ajax_form_students_mob_validate_fecha_matricula()
  {
    var nomeCampo_fecha_matricula = "fecha_matricula";
    var var_fecha_matricula = scAjaxGetFieldText(nomeCampo_fecha_matricula);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_fecha_matricula(var_fecha_matricula, var_script_case_init, do_ajax_form_students_mob_validate_fecha_matricula_cb);
  } // do_ajax_form_students_mob_validate_fecha_matricula

  function do_ajax_form_students_mob_validate_fecha_matricula_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "fecha_matricula";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_fecha_matricula_cb

  // ---------- Validate genero
  function do_ajax_form_students_mob_validate_genero()
  {
    var nomeCampo_genero = "genero";
    var var_genero = scAjaxGetFieldRadio(nomeCampo_genero);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_genero(var_genero, var_script_case_init, do_ajax_form_students_mob_validate_genero_cb);
  } // do_ajax_form_students_mob_validate_genero

  function do_ajax_form_students_mob_validate_genero_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "genero";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_genero_cb

  // ---------- Validate fecha_nacimiento
  function do_ajax_form_students_mob_validate_fecha_nacimiento()
  {
    var nomeCampo_fecha_nacimiento = "fecha_nacimiento";
    var var_fecha_nacimiento = scAjaxGetFieldText(nomeCampo_fecha_nacimiento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_fecha_nacimiento(var_fecha_nacimiento, var_script_case_init, do_ajax_form_students_mob_validate_fecha_nacimiento_cb);
  } // do_ajax_form_students_mob_validate_fecha_nacimiento

  function do_ajax_form_students_mob_validate_fecha_nacimiento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "fecha_nacimiento";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_fecha_nacimiento_cb

  // ---------- Validate primer_apellido
  function do_ajax_form_students_mob_validate_primer_apellido()
  {
    var nomeCampo_primer_apellido = "primer_apellido";
    var var_primer_apellido = scAjaxGetFieldText(nomeCampo_primer_apellido);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_primer_apellido(var_primer_apellido, var_script_case_init, do_ajax_form_students_mob_validate_primer_apellido_cb);
  } // do_ajax_form_students_mob_validate_primer_apellido

  function do_ajax_form_students_mob_validate_primer_apellido_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "primer_apellido";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_primer_apellido_cb

  // ---------- Validate segundo_apellido
  function do_ajax_form_students_mob_validate_segundo_apellido()
  {
    var nomeCampo_segundo_apellido = "segundo_apellido";
    var var_segundo_apellido = scAjaxGetFieldText(nomeCampo_segundo_apellido);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_segundo_apellido(var_segundo_apellido, var_script_case_init, do_ajax_form_students_mob_validate_segundo_apellido_cb);
  } // do_ajax_form_students_mob_validate_segundo_apellido

  function do_ajax_form_students_mob_validate_segundo_apellido_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "segundo_apellido";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_segundo_apellido_cb

  // ---------- Validate primer_nombre
  function do_ajax_form_students_mob_validate_primer_nombre()
  {
    var nomeCampo_primer_nombre = "primer_nombre";
    var var_primer_nombre = scAjaxGetFieldText(nomeCampo_primer_nombre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_primer_nombre(var_primer_nombre, var_script_case_init, do_ajax_form_students_mob_validate_primer_nombre_cb);
  } // do_ajax_form_students_mob_validate_primer_nombre

  function do_ajax_form_students_mob_validate_primer_nombre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "primer_nombre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_primer_nombre_cb

  // ---------- Validate segundo_nombre
  function do_ajax_form_students_mob_validate_segundo_nombre()
  {
    var nomeCampo_segundo_nombre = "segundo_nombre";
    var var_segundo_nombre = scAjaxGetFieldText(nomeCampo_segundo_nombre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_segundo_nombre(var_segundo_nombre, var_script_case_init, do_ajax_form_students_mob_validate_segundo_nombre_cb);
  } // do_ajax_form_students_mob_validate_segundo_nombre

  function do_ajax_form_students_mob_validate_segundo_nombre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "segundo_nombre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_segundo_nombre_cb

  // ---------- Validate tipo_identificacion
  function do_ajax_form_students_mob_validate_tipo_identificacion()
  {
    var nomeCampo_tipo_identificacion = "tipo_identificacion";
    var var_tipo_identificacion = scAjaxGetFieldSelect(nomeCampo_tipo_identificacion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_tipo_identificacion(var_tipo_identificacion, var_script_case_init, do_ajax_form_students_mob_validate_tipo_identificacion_cb);
  } // do_ajax_form_students_mob_validate_tipo_identificacion

  function do_ajax_form_students_mob_validate_tipo_identificacion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "tipo_identificacion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_tipo_identificacion_cb

  // ---------- Validate numero_documento
  function do_ajax_form_students_mob_validate_numero_documento()
  {
    var nomeCampo_numero_documento = "numero_documento";
    var var_numero_documento = scAjaxGetFieldText(nomeCampo_numero_documento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_numero_documento(var_numero_documento, var_script_case_init, do_ajax_form_students_mob_validate_numero_documento_cb);
  } // do_ajax_form_students_mob_validate_numero_documento

  function do_ajax_form_students_mob_validate_numero_documento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "numero_documento";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_numero_documento_cb

  // ---------- Validate departanebti_expedicion
  function do_ajax_form_students_mob_validate_departanebti_expedicion()
  {
    var nomeCampo_departanebti_expedicion = "departanebti_expedicion";
    var var_departanebti_expedicion = scAjaxGetFieldSelect(nomeCampo_departanebti_expedicion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_departanebti_expedicion(var_departanebti_expedicion, var_script_case_init, do_ajax_form_students_mob_validate_departanebti_expedicion_cb);
  } // do_ajax_form_students_mob_validate_departanebti_expedicion

  function do_ajax_form_students_mob_validate_departanebti_expedicion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "departanebti_expedicion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_departanebti_expedicion_cb

  // ---------- Validate municipio_expedicion
  function do_ajax_form_students_mob_validate_municipio_expedicion()
  {
    var nomeCampo_municipio_expedicion = "municipio_expedicion";
    var var_municipio_expedicion = scAjaxGetFieldSelect(nomeCampo_municipio_expedicion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_municipio_expedicion(var_municipio_expedicion, var_script_case_init, do_ajax_form_students_mob_validate_municipio_expedicion_cb);
  } // do_ajax_form_students_mob_validate_municipio_expedicion

  function do_ajax_form_students_mob_validate_municipio_expedicion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "municipio_expedicion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_municipio_expedicion_cb

  // ---------- Validate firstname
  function do_ajax_form_students_mob_validate_firstname()
  {
    var nomeCampo_firstname = "firstname";
    var var_firstname = scAjaxGetFieldText(nomeCampo_firstname);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_firstname(var_firstname, var_script_case_init, do_ajax_form_students_mob_validate_firstname_cb);
  } // do_ajax_form_students_mob_validate_firstname

  function do_ajax_form_students_mob_validate_firstname_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "firstname";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_firstname_cb

  // ---------- Validate lastname
  function do_ajax_form_students_mob_validate_lastname()
  {
    var nomeCampo_lastname = "lastname";
    var var_lastname = scAjaxGetFieldText(nomeCampo_lastname);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_lastname(var_lastname, var_script_case_init, do_ajax_form_students_mob_validate_lastname_cb);
  } // do_ajax_form_students_mob_validate_lastname

  function do_ajax_form_students_mob_validate_lastname_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "lastname";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_lastname_cb

  // ---------- Validate anos_cumplidos
  function do_ajax_form_students_mob_validate_anos_cumplidos()
  {
    var nomeCampo_anos_cumplidos = "anos_cumplidos";
    var var_anos_cumplidos = scAjaxGetFieldText(nomeCampo_anos_cumplidos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_anos_cumplidos(var_anos_cumplidos, var_script_case_init, do_ajax_form_students_mob_validate_anos_cumplidos_cb);
  } // do_ajax_form_students_mob_validate_anos_cumplidos

  function do_ajax_form_students_mob_validate_anos_cumplidos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "anos_cumplidos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_anos_cumplidos_cb

  // ---------- Validate dpto_nacimiento
  function do_ajax_form_students_mob_validate_dpto_nacimiento()
  {
    var nomeCampo_dpto_nacimiento = "dpto_nacimiento";
    var var_dpto_nacimiento = scAjaxGetFieldSelect(nomeCampo_dpto_nacimiento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_dpto_nacimiento(var_dpto_nacimiento, var_script_case_init, do_ajax_form_students_mob_validate_dpto_nacimiento_cb);
  } // do_ajax_form_students_mob_validate_dpto_nacimiento

  function do_ajax_form_students_mob_validate_dpto_nacimiento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "dpto_nacimiento";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_dpto_nacimiento_cb

  // ---------- Validate municipio_nacimiento
  function do_ajax_form_students_mob_validate_municipio_nacimiento()
  {
    var nomeCampo_municipio_nacimiento = "municipio_nacimiento";
    var var_municipio_nacimiento = scAjaxGetFieldSelect(nomeCampo_municipio_nacimiento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_municipio_nacimiento(var_municipio_nacimiento, var_script_case_init, do_ajax_form_students_mob_validate_municipio_nacimiento_cb);
  } // do_ajax_form_students_mob_validate_municipio_nacimiento

  function do_ajax_form_students_mob_validate_municipio_nacimiento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "municipio_nacimiento";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_municipio_nacimiento_cb

  // ---------- Validate observaciones
  function do_ajax_form_students_mob_validate_observaciones()
  {
    var nomeCampo_observaciones = "observaciones";
    var var_observaciones = scAjaxGetFieldText(nomeCampo_observaciones);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_observaciones(var_observaciones, var_script_case_init, do_ajax_form_students_mob_validate_observaciones_cb);
  } // do_ajax_form_students_mob_validate_observaciones

  function do_ajax_form_students_mob_validate_observaciones_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "observaciones";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_observaciones_cb

  // ---------- Validate login
  function do_ajax_form_students_mob_validate_login()
  {
    var nomeCampo_login = "login";
    var var_login = scAjaxGetFieldText(nomeCampo_login);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_login(var_login, var_script_case_init, do_ajax_form_students_mob_validate_login_cb);
  } // do_ajax_form_students_mob_validate_login

  function do_ajax_form_students_mob_validate_login_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "login";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_login_cb

  // ---------- Validate pswd
  function do_ajax_form_students_mob_validate_pswd()
  {
    var nomeCampo_pswd = "pswd";
    var var_pswd = scAjaxGetFieldText(nomeCampo_pswd);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_pswd(var_pswd, var_script_case_init, do_ajax_form_students_mob_validate_pswd_cb);
  } // do_ajax_form_students_mob_validate_pswd

  function do_ajax_form_students_mob_validate_pswd_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "pswd";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_pswd_cb

  // ---------- Validate confirm_pswd
  function do_ajax_form_students_mob_validate_confirm_pswd()
  {
    var nomeCampo_confirm_pswd = "confirm_pswd";
    var var_confirm_pswd = scAjaxGetFieldText(nomeCampo_confirm_pswd);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_confirm_pswd(var_confirm_pswd, var_script_case_init, do_ajax_form_students_mob_validate_confirm_pswd_cb);
  } // do_ajax_form_students_mob_validate_confirm_pswd

  function do_ajax_form_students_mob_validate_confirm_pswd_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "confirm_pswd";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_confirm_pswd_cb

  // ---------- Validate photo
  function do_ajax_form_students_mob_validate_photo()
  {
    var nomeCampo_photo = "photo";
    var var_photo = scAjaxGetFieldText(nomeCampo_photo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_photo(var_photo, var_script_case_init, do_ajax_form_students_mob_validate_photo_cb);
  } // do_ajax_form_students_mob_validate_photo

  function do_ajax_form_students_mob_validate_photo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "photo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_photo_cb

  // ---------- Validate state
  function do_ajax_form_students_mob_validate_state()
  {
    var nomeCampo_state = "state";
    var var_state = scAjaxGetFieldSelect(nomeCampo_state);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_state(var_state, var_script_case_init, do_ajax_form_students_mob_validate_state_cb);
  } // do_ajax_form_students_mob_validate_state

  function do_ajax_form_students_mob_validate_state_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "state";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_state_cb

  // ---------- Validate city
  function do_ajax_form_students_mob_validate_city()
  {
    var nomeCampo_city = "city";
    var var_city = scAjaxGetFieldSelect(nomeCampo_city);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_city(var_city, var_script_case_init, do_ajax_form_students_mob_validate_city_cb);
  } // do_ajax_form_students_mob_validate_city

  function do_ajax_form_students_mob_validate_city_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "city";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_city_cb

  // ---------- Validate address
  function do_ajax_form_students_mob_validate_address()
  {
    var nomeCampo_address = "address";
    var var_address = scAjaxGetFieldText(nomeCampo_address);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_address(var_address, var_script_case_init, do_ajax_form_students_mob_validate_address_cb);
  } // do_ajax_form_students_mob_validate_address

  function do_ajax_form_students_mob_validate_address_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "address";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_address_cb

  // ---------- Validate barrio
  function do_ajax_form_students_mob_validate_barrio()
  {
    var nomeCampo_barrio = "barrio";
    var var_barrio = scAjaxGetFieldText(nomeCampo_barrio);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_barrio(var_barrio, var_script_case_init, do_ajax_form_students_mob_validate_barrio_cb);
  } // do_ajax_form_students_mob_validate_barrio

  function do_ajax_form_students_mob_validate_barrio_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "barrio";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_barrio_cb

  // ---------- Validate postalcode
  function do_ajax_form_students_mob_validate_postalcode()
  {
    var nomeCampo_postalcode = "postalcode";
    var var_postalcode = scAjaxGetFieldText(nomeCampo_postalcode);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_postalcode(var_postalcode, var_script_case_init, do_ajax_form_students_mob_validate_postalcode_cb);
  } // do_ajax_form_students_mob_validate_postalcode

  function do_ajax_form_students_mob_validate_postalcode_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "postalcode";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_postalcode_cb

  // ---------- Validate zona
  function do_ajax_form_students_mob_validate_zona()
  {
    var nomeCampo_zona = "zona";
    var var_zona = scAjaxGetFieldRadio(nomeCampo_zona);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_zona(var_zona, var_script_case_init, do_ajax_form_students_mob_validate_zona_cb);
  } // do_ajax_form_students_mob_validate_zona

  function do_ajax_form_students_mob_validate_zona_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "zona";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_zona_cb

  // ---------- Validate telefono
  function do_ajax_form_students_mob_validate_telefono()
  {
    var nomeCampo_telefono = "telefono";
    var var_telefono = scAjaxGetFieldText(nomeCampo_telefono);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_telefono(var_telefono, var_script_case_init, do_ajax_form_students_mob_validate_telefono_cb);
  } // do_ajax_form_students_mob_validate_telefono

  function do_ajax_form_students_mob_validate_telefono_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "telefono";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_telefono_cb

  // ---------- Validate email
  function do_ajax_form_students_mob_validate_email()
  {
    var nomeCampo_email = "email";
    var var_email = scAjaxGetFieldText(nomeCampo_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_email(var_email, var_script_case_init, do_ajax_form_students_mob_validate_email_cb);
  } // do_ajax_form_students_mob_validate_email

  function do_ajax_form_students_mob_validate_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_email_cb

  // ---------- Validate id_sede
  function do_ajax_form_students_mob_validate_id_sede()
  {
    var nomeCampo_id_sede = "id_sede";
    var var_id_sede = scAjaxGetFieldSelect(nomeCampo_id_sede);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_id_sede(var_id_sede, var_script_case_init, do_ajax_form_students_mob_validate_id_sede_cb);
  } // do_ajax_form_students_mob_validate_id_sede

  function do_ajax_form_students_mob_validate_id_sede_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "id_sede";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_id_sede_cb

  // ---------- Validate id_jornada
  function do_ajax_form_students_mob_validate_id_jornada()
  {
    var nomeCampo_id_jornada = "id_jornada";
    var var_id_jornada = scAjaxGetFieldSelect(nomeCampo_id_jornada);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_id_jornada(var_id_jornada, var_script_case_init, do_ajax_form_students_mob_validate_id_jornada_cb);
  } // do_ajax_form_students_mob_validate_id_jornada

  function do_ajax_form_students_mob_validate_id_jornada_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "id_jornada";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_id_jornada_cb

  // ---------- Validate id_nivel
  function do_ajax_form_students_mob_validate_id_nivel()
  {
    var nomeCampo_id_nivel = "id_nivel";
    var var_id_nivel = scAjaxGetFieldSelect(nomeCampo_id_nivel);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_id_nivel(var_id_nivel, var_script_case_init, do_ajax_form_students_mob_validate_id_nivel_cb);
  } // do_ajax_form_students_mob_validate_id_nivel

  function do_ajax_form_students_mob_validate_id_nivel_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "id_nivel";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_id_nivel_cb

  // ---------- Validate grado_igreso
  function do_ajax_form_students_mob_validate_grado_igreso()
  {
    var nomeCampo_grado_igreso = "grado_igreso";
    var var_grado_igreso = scAjaxGetFieldSelect(nomeCampo_grado_igreso);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_grado_igreso(var_grado_igreso, var_script_case_init, do_ajax_form_students_mob_validate_grado_igreso_cb);
  } // do_ajax_form_students_mob_validate_grado_igreso

  function do_ajax_form_students_mob_validate_grado_igreso_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "grado_igreso";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_grado_igreso_cb

  // ---------- Validate id_grupo
  function do_ajax_form_students_mob_validate_id_grupo()
  {
    var nomeCampo_id_grupo = "id_grupo";
    var var_id_grupo = scAjaxGetFieldSelect(nomeCampo_id_grupo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_id_grupo(var_id_grupo, var_script_case_init, do_ajax_form_students_mob_validate_id_grupo_cb);
  } // do_ajax_form_students_mob_validate_id_grupo

  function do_ajax_form_students_mob_validate_id_grupo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "id_grupo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_id_grupo_cb

  // ---------- Validate grado_anterior
  function do_ajax_form_students_mob_validate_grado_anterior()
  {
    var nomeCampo_grado_anterior = "grado_anterior";
    var var_grado_anterior = scAjaxGetFieldSelect(nomeCampo_grado_anterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_grado_anterior(var_grado_anterior, var_script_case_init, do_ajax_form_students_mob_validate_grado_anterior_cb);
  } // do_ajax_form_students_mob_validate_grado_anterior

  function do_ajax_form_students_mob_validate_grado_anterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "grado_anterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_grado_anterior_cb

  // ---------- Validate last_year
  function do_ajax_form_students_mob_validate_last_year()
  {
    var nomeCampo_last_year = "last_year";
    var var_last_year = scAjaxGetFieldText(nomeCampo_last_year);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_last_year(var_last_year, var_script_case_init, do_ajax_form_students_mob_validate_last_year_cb);
  } // do_ajax_form_students_mob_validate_last_year

  function do_ajax_form_students_mob_validate_last_year_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "last_year";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_last_year_cb

  // ---------- Validate nombre_ult_plantel
  function do_ajax_form_students_mob_validate_nombre_ult_plantel()
  {
    var nomeCampo_nombre_ult_plantel = "nombre_ult_plantel";
    var var_nombre_ult_plantel = scAjaxGetFieldText(nomeCampo_nombre_ult_plantel);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_nombre_ult_plantel(var_nombre_ult_plantel, var_script_case_init, do_ajax_form_students_mob_validate_nombre_ult_plantel_cb);
  } // do_ajax_form_students_mob_validate_nombre_ult_plantel

  function do_ajax_form_students_mob_validate_nombre_ult_plantel_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "nombre_ult_plantel";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_nombre_ult_plantel_cb

  // ---------- Validate resultado
  function do_ajax_form_students_mob_validate_resultado()
  {
    var nomeCampo_resultado = "resultado";
    var var_resultado = scAjaxGetFieldSelect(nomeCampo_resultado);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_resultado(var_resultado, var_script_case_init, do_ajax_form_students_mob_validate_resultado_cb);
  } // do_ajax_form_students_mob_validate_resultado

  function do_ajax_form_students_mob_validate_resultado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "resultado";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_resultado_cb

  // ---------- Validate subsidado
  function do_ajax_form_students_mob_validate_subsidado()
  {
    var nomeCampo_subsidado = "subsidado";
    var var_subsidado = scAjaxGetFieldRadio(nomeCampo_subsidado);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_subsidado(var_subsidado, var_script_case_init, do_ajax_form_students_mob_validate_subsidado_cb);
  } // do_ajax_form_students_mob_validate_subsidado

  function do_ajax_form_students_mob_validate_subsidado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "subsidado";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_subsidado_cb

  // ---------- Validate interno
  function do_ajax_form_students_mob_validate_interno()
  {
    var nomeCampo_interno = "interno";
    var var_interno = scAjaxGetFieldRadio(nomeCampo_interno);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_interno(var_interno, var_script_case_init, do_ajax_form_students_mob_validate_interno_cb);
  } // do_ajax_form_students_mob_validate_interno

  function do_ajax_form_students_mob_validate_interno_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "interno";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_interno_cb

  // ---------- Validate otro_modelo
  function do_ajax_form_students_mob_validate_otro_modelo()
  {
    var nomeCampo_otro_modelo = "otro_modelo";
    var var_otro_modelo = scAjaxGetFieldSelect(nomeCampo_otro_modelo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_otro_modelo(var_otro_modelo, var_script_case_init, do_ajax_form_students_mob_validate_otro_modelo_cb);
  } // do_ajax_form_students_mob_validate_otro_modelo

  function do_ajax_form_students_mob_validate_otro_modelo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "otro_modelo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_otro_modelo_cb

  // ---------- Validate caracter
  function do_ajax_form_students_mob_validate_caracter()
  {
    var nomeCampo_caracter = "caracter";
    var var_caracter = scAjaxGetFieldRadio(nomeCampo_caracter);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_caracter(var_caracter, var_script_case_init, do_ajax_form_students_mob_validate_caracter_cb);
  } // do_ajax_form_students_mob_validate_caracter

  function do_ajax_form_students_mob_validate_caracter_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "caracter";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_caracter_cb

  // ---------- Validate especialidad
  function do_ajax_form_students_mob_validate_especialidad()
  {
    var nomeCampo_especialidad = "especialidad";
    var var_especialidad = scAjaxGetFieldSelect(nomeCampo_especialidad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_especialidad(var_especialidad, var_script_case_init, do_ajax_form_students_mob_validate_especialidad_cb);
  } // do_ajax_form_students_mob_validate_especialidad

  function do_ajax_form_students_mob_validate_especialidad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "especialidad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_especialidad_cb

  // ---------- Validate year_mat
  function do_ajax_form_students_mob_validate_year_mat()
  {
    var nomeCampo_year_mat = "year_mat";
    var var_year_mat = scAjaxGetFieldSelect(nomeCampo_year_mat);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_year_mat(var_year_mat, var_script_case_init, do_ajax_form_students_mob_validate_year_mat_cb);
  } // do_ajax_form_students_mob_validate_year_mat

  function do_ajax_form_students_mob_validate_year_mat_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "year_mat";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_year_mat_cb

  // ---------- Validate matricular
  function do_ajax_form_students_mob_validate_matricular()
  {
    var nomeCampo_matricular = "matricular";
    var var_matricular = scAjaxGetFieldSelect(nomeCampo_matricular);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_matricular(var_matricular, var_script_case_init, do_ajax_form_students_mob_validate_matricular_cb);
  } // do_ajax_form_students_mob_validate_matricular

  function do_ajax_form_students_mob_validate_matricular_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "matricular";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_matricular_cb

  // ---------- Validate eps
  function do_ajax_form_students_mob_validate_eps()
  {
    var nomeCampo_eps = "eps";
    var var_eps = scAjaxGetFieldSelect(nomeCampo_eps);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_eps(var_eps, var_script_case_init, do_ajax_form_students_mob_validate_eps_cb);
  } // do_ajax_form_students_mob_validate_eps

  function do_ajax_form_students_mob_validate_eps_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "eps";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_eps_cb

  // ---------- Validate ips
  function do_ajax_form_students_mob_validate_ips()
  {
    var nomeCampo_ips = "ips";
    var var_ips = scAjaxGetFieldText(nomeCampo_ips);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_ips(var_ips, var_script_case_init, do_ajax_form_students_mob_validate_ips_cb);
  } // do_ajax_form_students_mob_validate_ips

  function do_ajax_form_students_mob_validate_ips_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "ips";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_ips_cb

  // ---------- Validate ars
  function do_ajax_form_students_mob_validate_ars()
  {
    var nomeCampo_ars = "ars";
    var var_ars = scAjaxGetFieldText(nomeCampo_ars);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_ars(var_ars, var_script_case_init, do_ajax_form_students_mob_validate_ars_cb);
  } // do_ajax_form_students_mob_validate_ars

  function do_ajax_form_students_mob_validate_ars_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "ars";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_ars_cb

  // ---------- Validate tipo_sangre
  function do_ajax_form_students_mob_validate_tipo_sangre()
  {
    var nomeCampo_tipo_sangre = "tipo_sangre";
    var var_tipo_sangre = scAjaxGetFieldSelect(nomeCampo_tipo_sangre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_tipo_sangre(var_tipo_sangre, var_script_case_init, do_ajax_form_students_mob_validate_tipo_sangre_cb);
  } // do_ajax_form_students_mob_validate_tipo_sangre

  function do_ajax_form_students_mob_validate_tipo_sangre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "tipo_sangre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_tipo_sangre_cb

  // ---------- Validate victima_conflicto
  function do_ajax_form_students_mob_validate_victima_conflicto()
  {
    var nomeCampo_victima_conflicto = "victima_conflicto";
    var var_victima_conflicto = scAjaxGetFieldSelect(nomeCampo_victima_conflicto);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_victima_conflicto(var_victima_conflicto, var_script_case_init, do_ajax_form_students_mob_validate_victima_conflicto_cb);
  } // do_ajax_form_students_mob_validate_victima_conflicto

  function do_ajax_form_students_mob_validate_victima_conflicto_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "victima_conflicto";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_victima_conflicto_cb

  // ---------- Validate peso
  function do_ajax_form_students_mob_validate_peso()
  {
    var nomeCampo_peso = "peso";
    var var_peso = scAjaxGetFieldText(nomeCampo_peso);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_peso(var_peso, var_script_case_init, do_ajax_form_students_mob_validate_peso_cb);
  } // do_ajax_form_students_mob_validate_peso

  function do_ajax_form_students_mob_validate_peso_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "peso";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_peso_cb

  // ---------- Validate talla
  function do_ajax_form_students_mob_validate_talla()
  {
    var nomeCampo_talla = "talla";
    var var_talla = scAjaxGetFieldText(nomeCampo_talla);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_talla(var_talla, var_script_case_init, do_ajax_form_students_mob_validate_talla_cb);
  } // do_ajax_form_students_mob_validate_talla

  function do_ajax_form_students_mob_validate_talla_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "talla";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_talla_cb

  // ---------- Validate cobertura
  function do_ajax_form_students_mob_validate_cobertura()
  {
    var nomeCampo_cobertura = "cobertura";
    var var_cobertura = scAjaxGetFieldText(nomeCampo_cobertura);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_cobertura(var_cobertura, var_script_case_init, do_ajax_form_students_mob_validate_cobertura_cb);
  } // do_ajax_form_students_mob_validate_cobertura

  function do_ajax_form_students_mob_validate_cobertura_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "cobertura";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_cobertura_cb

  // ---------- Validate vive_con
  function do_ajax_form_students_mob_validate_vive_con()
  {
    var nomeCampo_vive_con = "vive_con";
    var var_vive_con = scAjaxGetFieldText(nomeCampo_vive_con);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_vive_con(var_vive_con, var_script_case_init, do_ajax_form_students_mob_validate_vive_con_cb);
  } // do_ajax_form_students_mob_validate_vive_con

  function do_ajax_form_students_mob_validate_vive_con_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "vive_con";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_vive_con_cb

  // ---------- Validate subsidio
  function do_ajax_form_students_mob_validate_subsidio()
  {
    var nomeCampo_subsidio = "subsidio";
    var var_subsidio = scAjaxGetFieldText(nomeCampo_subsidio);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_subsidio(var_subsidio, var_script_case_init, do_ajax_form_students_mob_validate_subsidio_cb);
  } // do_ajax_form_students_mob_validate_subsidio

  function do_ajax_form_students_mob_validate_subsidio_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "subsidio";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_subsidio_cb

  // ---------- Validate estatus_vca
  function do_ajax_form_students_mob_validate_estatus_vca()
  {
    var nomeCampo_estatus_vca = "estatus_vca";
    var var_estatus_vca = scAjaxGetFieldSelect(nomeCampo_estatus_vca);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_estatus_vca(var_estatus_vca, var_script_case_init, do_ajax_form_students_mob_validate_estatus_vca_cb);
  } // do_ajax_form_students_mob_validate_estatus_vca

  function do_ajax_form_students_mob_validate_estatus_vca_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "estatus_vca";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_estatus_vca_cb

  // ---------- Validate depto_expulsor
  function do_ajax_form_students_mob_validate_depto_expulsor()
  {
    var nomeCampo_depto_expulsor = "depto_expulsor";
    var var_depto_expulsor = scAjaxGetFieldSelect(nomeCampo_depto_expulsor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_depto_expulsor(var_depto_expulsor, var_script_case_init, do_ajax_form_students_mob_validate_depto_expulsor_cb);
  } // do_ajax_form_students_mob_validate_depto_expulsor

  function do_ajax_form_students_mob_validate_depto_expulsor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "depto_expulsor";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_depto_expulsor_cb

  // ---------- Validate municipio_expulsor
  function do_ajax_form_students_mob_validate_municipio_expulsor()
  {
    var nomeCampo_municipio_expulsor = "municipio_expulsor";
    var var_municipio_expulsor = scAjaxGetFieldSelect(nomeCampo_municipio_expulsor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_municipio_expulsor(var_municipio_expulsor, var_script_case_init, do_ajax_form_students_mob_validate_municipio_expulsor_cb);
  } // do_ajax_form_students_mob_validate_municipio_expulsor

  function do_ajax_form_students_mob_validate_municipio_expulsor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "municipio_expulsor";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_municipio_expulsor_cb

  // ---------- Validate fecha_expulsion
  function do_ajax_form_students_mob_validate_fecha_expulsion()
  {
    var nomeCampo_fecha_expulsion = "fecha_expulsion";
    var var_fecha_expulsion = scAjaxGetFieldText(nomeCampo_fecha_expulsion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_fecha_expulsion(var_fecha_expulsion, var_script_case_init, do_ajax_form_students_mob_validate_fecha_expulsion_cb);
  } // do_ajax_form_students_mob_validate_fecha_expulsion

  function do_ajax_form_students_mob_validate_fecha_expulsion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "fecha_expulsion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_fecha_expulsion_cb

  // ---------- Validate certificado
  function do_ajax_form_students_mob_validate_certificado()
  {
    var nomeCampo_certificado = "certificado";
    var var_certificado = scAjaxGetFieldRadio(nomeCampo_certificado);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_certificado(var_certificado, var_script_case_init, do_ajax_form_students_mob_validate_certificado_cb);
  } // do_ajax_form_students_mob_validate_certificado

  function do_ajax_form_students_mob_validate_certificado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "certificado";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_certificado_cb

  // ---------- Validate semestre
  function do_ajax_form_students_mob_validate_semestre()
  {
    var nomeCampo_semestre = "semestre";
    var var_semestre = scAjaxGetFieldText(nomeCampo_semestre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_semestre(var_semestre, var_script_case_init, do_ajax_form_students_mob_validate_semestre_cb);
  } // do_ajax_form_students_mob_validate_semestre

  function do_ajax_form_students_mob_validate_semestre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "semestre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_semestre_cb

  // ---------- Validate numero_carne_sisben
  function do_ajax_form_students_mob_validate_numero_carne_sisben()
  {
    var nomeCampo_numero_carne_sisben = "numero_carne_sisben";
    var var_numero_carne_sisben = scAjaxGetFieldText(nomeCampo_numero_carne_sisben);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_numero_carne_sisben(var_numero_carne_sisben, var_script_case_init, do_ajax_form_students_mob_validate_numero_carne_sisben_cb);
  } // do_ajax_form_students_mob_validate_numero_carne_sisben

  function do_ajax_form_students_mob_validate_numero_carne_sisben_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "numero_carne_sisben";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_numero_carne_sisben_cb

  // ---------- Validate nivel_sisben
  function do_ajax_form_students_mob_validate_nivel_sisben()
  {
    var nomeCampo_nivel_sisben = "nivel_sisben";
    var var_nivel_sisben = scAjaxGetFieldText(nomeCampo_nivel_sisben);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_nivel_sisben(var_nivel_sisben, var_script_case_init, do_ajax_form_students_mob_validate_nivel_sisben_cb);
  } // do_ajax_form_students_mob_validate_nivel_sisben

  function do_ajax_form_students_mob_validate_nivel_sisben_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "nivel_sisben";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_nivel_sisben_cb

  // ---------- Validate estrato
  function do_ajax_form_students_mob_validate_estrato()
  {
    var nomeCampo_estrato = "estrato";
    var var_estrato = scAjaxGetFieldSelect(nomeCampo_estrato);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_estrato(var_estrato, var_script_case_init, do_ajax_form_students_mob_validate_estrato_cb);
  } // do_ajax_form_students_mob_validate_estrato

  function do_ajax_form_students_mob_validate_estrato_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "estrato";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_estrato_cb

  // ---------- Validate fuente_recurso
  function do_ajax_form_students_mob_validate_fuente_recurso()
  {
    var nomeCampo_fuente_recurso = "fuente_recurso";
    var var_fuente_recurso = scAjaxGetFieldSelect(nomeCampo_fuente_recurso);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_fuente_recurso(var_fuente_recurso, var_script_case_init, do_ajax_form_students_mob_validate_fuente_recurso_cb);
  } // do_ajax_form_students_mob_validate_fuente_recurso

  function do_ajax_form_students_mob_validate_fuente_recurso_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "fuente_recurso";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_fuente_recurso_cb

  // ---------- Validate opcion
  function do_ajax_form_students_mob_validate_opcion()
  {
    var nomeCampo_opcion = "opcion";
    var var_opcion = scAjaxGetFieldSelect(nomeCampo_opcion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_opcion(var_opcion, var_script_case_init, do_ajax_form_students_mob_validate_opcion_cb);
  } // do_ajax_form_students_mob_validate_opcion

  function do_ajax_form_students_mob_validate_opcion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "opcion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_opcion_cb

  // ---------- Validate resguardo
  function do_ajax_form_students_mob_validate_resguardo()
  {
    var nomeCampo_resguardo = "resguardo";
    var var_resguardo = scAjaxGetFieldText(nomeCampo_resguardo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_resguardo(var_resguardo, var_script_case_init, do_ajax_form_students_mob_validate_resguardo_cb);
  } // do_ajax_form_students_mob_validate_resguardo

  function do_ajax_form_students_mob_validate_resguardo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "resguardo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_resguardo_cb

  // ---------- Validate negritudes
  function do_ajax_form_students_mob_validate_negritudes()
  {
    var nomeCampo_negritudes = "negritudes";
    var var_negritudes = scAjaxGetFieldRadio(nomeCampo_negritudes);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_negritudes(var_negritudes, var_script_case_init, do_ajax_form_students_mob_validate_negritudes_cb);
  } // do_ajax_form_students_mob_validate_negritudes

  function do_ajax_form_students_mob_validate_negritudes_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "negritudes";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_negritudes_cb

  // ---------- Validate etnia
  function do_ajax_form_students_mob_validate_etnia()
  {
    var nomeCampo_etnia = "etnia";
    var var_etnia = scAjaxGetFieldText(nomeCampo_etnia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_etnia(var_etnia, var_script_case_init, do_ajax_form_students_mob_validate_etnia_cb);
  } // do_ajax_form_students_mob_validate_etnia

  function do_ajax_form_students_mob_validate_etnia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "etnia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_etnia_cb

  // ---------- Validate discapacidades
  function do_ajax_form_students_mob_validate_discapacidades()
  {
    var nomeCampo_discapacidades = "discapacidades";
    var var_discapacidades = scAjaxGetFieldSelect(nomeCampo_discapacidades);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_discapacidades(var_discapacidades, var_script_case_init, do_ajax_form_students_mob_validate_discapacidades_cb);
  } // do_ajax_form_students_mob_validate_discapacidades

  function do_ajax_form_students_mob_validate_discapacidades_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "discapacidades";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_discapacidades_cb

  // ---------- Validate capacidades
  function do_ajax_form_students_mob_validate_capacidades()
  {
    var nomeCampo_capacidades = "capacidades";
    var var_capacidades = scAjaxGetFieldSelect(nomeCampo_capacidades);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_capacidades(var_capacidades, var_script_case_init, do_ajax_form_students_mob_validate_capacidades_cb);
  } // do_ajax_form_students_mob_validate_capacidades

  function do_ajax_form_students_mob_validate_capacidades_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "capacidades";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_capacidades_cb

  // ---------- Validate novedades
  function do_ajax_form_students_mob_validate_novedades()
  {
    var nomeCampo_novedades = "novedades";
    var var_novedades = scAjaxGetFieldText(nomeCampo_novedades);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_students_mob_validate_novedades(var_novedades, var_script_case_init, do_ajax_form_students_mob_validate_novedades_cb);
  } // do_ajax_form_students_mob_validate_novedades

  function do_ajax_form_students_mob_validate_novedades_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "novedades";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_validate_novedades_cb

  // ---------- Refresh departanebti_expedicion
  function do_ajax_form_students_mob_refresh_departanebti_expedicion()
  {
    var var_departanebti_expedicion = scAjaxGetFieldSelect("departanebti_expedicion");
    var var_nmgp_refresh_fields = "tipo_identificacion_#fld#_municipio_expedicion";
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_students_mob_refresh_departanebti_expedicion(var_departanebti_expedicion, var_nmgp_refresh_fields, var_script_case_init, do_ajax_form_students_mob_refresh_departanebti_expedicion_cb);
  } // do_ajax_form_students_mob_refresh_departanebti_expedicion

  function do_ajax_form_students_mob_refresh_departanebti_expedicion_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    scAjaxSetFields();
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_refresh_departanebti_expedicion_cb

  // ---------- Refresh dpto_nacimiento
  function do_ajax_form_students_mob_refresh_dpto_nacimiento()
  {
    var var_dpto_nacimiento = scAjaxGetFieldSelect("dpto_nacimiento");
    var var_nmgp_refresh_fields = "municipio_nacimiento";
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_students_mob_refresh_dpto_nacimiento(var_dpto_nacimiento, var_nmgp_refresh_fields, var_script_case_init, do_ajax_form_students_mob_refresh_dpto_nacimiento_cb);
  } // do_ajax_form_students_mob_refresh_dpto_nacimiento

  function do_ajax_form_students_mob_refresh_dpto_nacimiento_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    scAjaxSetFields();
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_refresh_dpto_nacimiento_cb

  // ---------- Refresh state
  function do_ajax_form_students_mob_refresh_state()
  {
    var var_state = scAjaxGetFieldSelect("state");
    var var_nmgp_refresh_fields = "city";
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_students_mob_refresh_state(var_state, var_nmgp_refresh_fields, var_script_case_init, do_ajax_form_students_mob_refresh_state_cb);
  } // do_ajax_form_students_mob_refresh_state

  function do_ajax_form_students_mob_refresh_state_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    scAjaxSetFields();
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_refresh_state_cb

  // ---------- Refresh id_nivel
  function do_ajax_form_students_mob_refresh_id_nivel()
  {
    var var_id_nivel = scAjaxGetFieldSelect("id_nivel");
    var var_nmgp_refresh_fields = "grado_igreso";
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_students_mob_refresh_id_nivel(var_id_nivel, var_nmgp_refresh_fields, var_script_case_init, do_ajax_form_students_mob_refresh_id_nivel_cb);
  } // do_ajax_form_students_mob_refresh_id_nivel

  function do_ajax_form_students_mob_refresh_id_nivel_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    scAjaxSetFields();
    do_ajax_form_students_mob_refresh_grado_igreso();
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_refresh_id_nivel_cb

  // ---------- Refresh grado_igreso
  function do_ajax_form_students_mob_refresh_grado_igreso()
  {
    var var_grado_igreso = scAjaxGetFieldSelect("grado_igreso");
    var var_nmgp_refresh_fields = "id_grupo";
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_students_mob_refresh_grado_igreso(var_grado_igreso, var_nmgp_refresh_fields, var_script_case_init, do_ajax_form_students_mob_refresh_grado_igreso_cb);
  } // do_ajax_form_students_mob_refresh_grado_igreso

  function do_ajax_form_students_mob_refresh_grado_igreso_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    scAjaxSetFields();
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_refresh_grado_igreso_cb

  // ---------- Refresh depto_expulsor
  function do_ajax_form_students_mob_refresh_depto_expulsor()
  {
    var var_depto_expulsor = scAjaxGetFieldSelect("depto_expulsor");
    var var_nmgp_refresh_fields = "tipo_sangre";
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_students_mob_refresh_depto_expulsor(var_depto_expulsor, var_nmgp_refresh_fields, var_script_case_init, do_ajax_form_students_mob_refresh_depto_expulsor_cb);
  } // do_ajax_form_students_mob_refresh_depto_expulsor

  function do_ajax_form_students_mob_refresh_depto_expulsor_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    scAjaxSetFields();
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_students_mob_refresh_depto_expulsor_cb

  // ---------- Event onchange fecha_nacimiento
  function do_ajax_form_students_mob_event_fecha_nacimiento_onchange()
  {
    var var_fecha_nacimiento = scAjaxGetFieldText("fecha_nacimiento");
    var var_anos_cumplidos = scAjaxGetFieldText("anos_cumplidos");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    scEventControl_onChange_call("fecha_nacimiento", "");
    x_ajax_form_students_mob_event_fecha_nacimiento_onchange(var_fecha_nacimiento, var_anos_cumplidos, var_script_case_init, do_ajax_form_students_mob_event_fecha_nacimiento_onchange_cb);
  } // do_ajax_form_students_mob_event_fecha_nacimiento_onchange

  function do_ajax_form_students_mob_event_fecha_nacimiento_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "fecha_nacimiento";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
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
  } // do_ajax_form_students_mob_event_fecha_nacimiento_onchange_cb

  // ---------- Event onchange victima_conflicto
  function do_ajax_form_students_mob_event_victima_conflicto_onchange()
  {
    var var_victima_conflicto = scAjaxGetFieldSelect("victima_conflicto");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    scEventControl_onChange_call("victima_conflicto", "");
    x_ajax_form_students_mob_event_victima_conflicto_onchange(var_victima_conflicto, var_script_case_init, do_ajax_form_students_mob_event_victima_conflicto_onchange_cb);
  } // do_ajax_form_students_mob_event_victima_conflicto_onchange

  function do_ajax_form_students_mob_event_victima_conflicto_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "victima_conflicto";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
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
  } // do_ajax_form_students_mob_event_victima_conflicto_onchange_cb
  // ---------- Form
  function do_ajax_form_students_mob_submit_form()
  {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_students_mob_submit_form(); }, 500);
      return;
    }
    scAjaxHideMessage();
    var var_estatus = scAjaxGetFieldRadio("estatus");
    var var_fecha_matricula = scAjaxGetFieldText("fecha_matricula");
    var var_genero = scAjaxGetFieldRadio("genero");
    var var_fecha_nacimiento = scAjaxGetFieldText("fecha_nacimiento");
    var var_primer_apellido = scAjaxGetFieldText("primer_apellido");
    var var_segundo_apellido = scAjaxGetFieldText("segundo_apellido");
    var var_primer_nombre = scAjaxGetFieldText("primer_nombre");
    var var_segundo_nombre = scAjaxGetFieldText("segundo_nombre");
    var var_tipo_identificacion = scAjaxGetFieldSelect("tipo_identificacion");
    var var_numero_documento = scAjaxGetFieldText("numero_documento");
    var var_departanebti_expedicion = scAjaxGetFieldSelect("departanebti_expedicion");
    var var_municipio_expedicion = scAjaxGetFieldSelect("municipio_expedicion");
    var var_firstname = scAjaxGetFieldText("firstname");
    var var_lastname = scAjaxGetFieldText("lastname");
    var var_anos_cumplidos = scAjaxGetFieldText("anos_cumplidos");
    var var_dpto_nacimiento = scAjaxGetFieldSelect("dpto_nacimiento");
    var var_municipio_nacimiento = scAjaxGetFieldSelect("municipio_nacimiento");
    var var_observaciones = scAjaxGetFieldText("observaciones");
    var var_login = scAjaxGetFieldText("login");
    var var_pswd = scAjaxGetFieldText("pswd");
    var var_confirm_pswd = scAjaxGetFieldText("confirm_pswd");
    var var_photo = scAjaxGetFieldText("photo");
    var var_state = scAjaxGetFieldSelect("state");
    var var_city = scAjaxGetFieldSelect("city");
    var var_address = scAjaxGetFieldText("address");
    var var_barrio = scAjaxGetFieldText("barrio");
    var var_postalcode = scAjaxGetFieldText("postalcode");
    var var_zona = scAjaxGetFieldRadio("zona");
    var var_telefono = scAjaxGetFieldText("telefono");
    var var_email = scAjaxGetFieldText("email");
    var var_id_sede = scAjaxGetFieldSelect("id_sede");
    var var_id_jornada = scAjaxGetFieldSelect("id_jornada");
    var var_id_nivel = scAjaxGetFieldSelect("id_nivel");
    var var_grado_igreso = scAjaxGetFieldSelect("grado_igreso");
    var var_id_grupo = scAjaxGetFieldSelect("id_grupo");
    var var_grado_anterior = scAjaxGetFieldSelect("grado_anterior");
    var var_last_year = scAjaxGetFieldText("last_year");
    var var_nombre_ult_plantel = scAjaxGetFieldText("nombre_ult_plantel");
    var var_resultado = scAjaxGetFieldSelect("resultado");
    var var_subsidado = scAjaxGetFieldRadio("subsidado");
    var var_interno = scAjaxGetFieldRadio("interno");
    var var_otro_modelo = scAjaxGetFieldSelect("otro_modelo");
    var var_caracter = scAjaxGetFieldRadio("caracter");
    var var_especialidad = scAjaxGetFieldSelect("especialidad");
    var var_year_mat = scAjaxGetFieldSelect("year_mat");
    var var_matricular = scAjaxGetFieldSelect("matricular");
    var var_eps = scAjaxGetFieldSelect("eps");
    var var_ips = scAjaxGetFieldText("ips");
    var var_ars = scAjaxGetFieldText("ars");
    var var_tipo_sangre = scAjaxGetFieldSelect("tipo_sangre");
    var var_victima_conflicto = scAjaxGetFieldSelect("victima_conflicto");
    var var_peso = scAjaxGetFieldText("peso");
    var var_talla = scAjaxGetFieldText("talla");
    var var_cobertura = scAjaxGetFieldText("cobertura");
    var var_vive_con = scAjaxGetFieldText("vive_con");
    var var_subsidio = scAjaxGetFieldText("subsidio");
    var var_estatus_vca = scAjaxGetFieldSelect("estatus_vca");
    var var_depto_expulsor = scAjaxGetFieldSelect("depto_expulsor");
    var var_municipio_expulsor = scAjaxGetFieldSelect("municipio_expulsor");
    var var_fecha_expulsion = scAjaxGetFieldText("fecha_expulsion");
    var var_certificado = scAjaxGetFieldRadio("certificado");
    var var_semestre = scAjaxGetFieldText("semestre");
    var var_numero_carne_sisben = scAjaxGetFieldText("numero_carne_sisben");
    var var_nivel_sisben = scAjaxGetFieldText("nivel_sisben");
    var var_estrato = scAjaxGetFieldSelect("estrato");
    var var_fuente_recurso = scAjaxGetFieldSelect("fuente_recurso");
    var var_opcion = scAjaxGetFieldSelect("opcion");
    var var_resguardo = scAjaxGetFieldText("resguardo");
    var var_negritudes = scAjaxGetFieldRadio("negritudes");
    var var_etnia = scAjaxGetFieldText("etnia");
    var var_discapacidades = scAjaxGetFieldSelect("discapacidades");
    var var_capacidades = scAjaxGetFieldSelect("capacidades");
    var var_idstudents = scAjaxGetFieldText("idstudents");
    var var_photo_ul_name = scAjaxSpecCharProtect(document.F1.photo_ul_name.value);//.replace(/[+]/g, "__NM_PLUS__");
    var var_photo_ul_type = document.F1.photo_ul_type.value;
    var var_photo_salva = scAjaxSpecCharProtect(document.F1.photo_salva.value);//.replace(/[+]/g, "__NM_PLUS__");
    var var_photo_limpa = document.F1.photo_limpa.checked ? "S" : "N";
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    scAjaxProcOn();
    x_ajax_form_students_mob_submit_form(var_estatus, var_fecha_matricula, var_genero, var_fecha_nacimiento, var_primer_apellido, var_segundo_apellido, var_primer_nombre, var_segundo_nombre, var_tipo_identificacion, var_numero_documento, var_departanebti_expedicion, var_municipio_expedicion, var_firstname, var_lastname, var_anos_cumplidos, var_dpto_nacimiento, var_municipio_nacimiento, var_observaciones, var_login, var_pswd, var_confirm_pswd, var_photo, var_state, var_city, var_address, var_barrio, var_postalcode, var_zona, var_telefono, var_email, var_id_sede, var_id_jornada, var_id_nivel, var_grado_igreso, var_id_grupo, var_grado_anterior, var_last_year, var_nombre_ult_plantel, var_resultado, var_subsidado, var_interno, var_otro_modelo, var_caracter, var_especialidad, var_year_mat, var_matricular, var_eps, var_ips, var_ars, var_tipo_sangre, var_victima_conflicto, var_peso, var_talla, var_cobertura, var_vive_con, var_subsidio, var_estatus_vca, var_depto_expulsor, var_municipio_expulsor, var_fecha_expulsion, var_certificado, var_semestre, var_numero_carne_sisben, var_nivel_sisben, var_estrato, var_fuente_recurso, var_opcion, var_resguardo, var_negritudes, var_etnia, var_discapacidades, var_capacidades, var_idstudents, var_photo_ul_name, var_photo_ul_type, var_photo_salva, var_photo_limpa, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_students_mob_submit_form_cb);
  } // do_ajax_form_students_mob_submit_form

  function do_ajax_form_students_mob_submit_form_cb(sResp)
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
    }
    else
    {
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk())
    {
      scAjaxShowMessage();
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("estatus");
      scAjaxHideErrorDisplay("fecha_matricula");
      scAjaxHideErrorDisplay("genero");
      scAjaxHideErrorDisplay("fecha_nacimiento");
      scAjaxHideErrorDisplay("primer_apellido");
      scAjaxHideErrorDisplay("segundo_apellido");
      scAjaxHideErrorDisplay("primer_nombre");
      scAjaxHideErrorDisplay("segundo_nombre");
      scAjaxHideErrorDisplay("tipo_identificacion");
      scAjaxHideErrorDisplay("numero_documento");
      scAjaxHideErrorDisplay("departanebti_expedicion");
      scAjaxHideErrorDisplay("municipio_expedicion");
      scAjaxHideErrorDisplay("firstname");
      scAjaxHideErrorDisplay("lastname");
      scAjaxHideErrorDisplay("anos_cumplidos");
      scAjaxHideErrorDisplay("dpto_nacimiento");
      scAjaxHideErrorDisplay("municipio_nacimiento");
      scAjaxHideErrorDisplay("observaciones");
      scAjaxHideErrorDisplay("login");
      scAjaxHideErrorDisplay("pswd");
      scAjaxHideErrorDisplay("confirm_pswd");
      scAjaxHideErrorDisplay("photo");
      scAjaxHideErrorDisplay("state");
      scAjaxHideErrorDisplay("city");
      scAjaxHideErrorDisplay("address");
      scAjaxHideErrorDisplay("barrio");
      scAjaxHideErrorDisplay("postalcode");
      scAjaxHideErrorDisplay("zona");
      scAjaxHideErrorDisplay("telefono");
      scAjaxHideErrorDisplay("email");
      scAjaxHideErrorDisplay("id_sede");
      scAjaxHideErrorDisplay("id_jornada");
      scAjaxHideErrorDisplay("id_nivel");
      scAjaxHideErrorDisplay("grado_igreso");
      scAjaxHideErrorDisplay("id_grupo");
      scAjaxHideErrorDisplay("grado_anterior");
      scAjaxHideErrorDisplay("last_year");
      scAjaxHideErrorDisplay("nombre_ult_plantel");
      scAjaxHideErrorDisplay("resultado");
      scAjaxHideErrorDisplay("subsidado");
      scAjaxHideErrorDisplay("interno");
      scAjaxHideErrorDisplay("otro_modelo");
      scAjaxHideErrorDisplay("caracter");
      scAjaxHideErrorDisplay("especialidad");
      scAjaxHideErrorDisplay("year_mat");
      scAjaxHideErrorDisplay("matricular");
      scAjaxHideErrorDisplay("eps");
      scAjaxHideErrorDisplay("ips");
      scAjaxHideErrorDisplay("ars");
      scAjaxHideErrorDisplay("tipo_sangre");
      scAjaxHideErrorDisplay("victima_conflicto");
      scAjaxHideErrorDisplay("peso");
      scAjaxHideErrorDisplay("talla");
      scAjaxHideErrorDisplay("cobertura");
      scAjaxHideErrorDisplay("vive_con");
      scAjaxHideErrorDisplay("subsidio");
      scAjaxHideErrorDisplay("estatus_vca");
      scAjaxHideErrorDisplay("depto_expulsor");
      scAjaxHideErrorDisplay("municipio_expulsor");
      scAjaxHideErrorDisplay("fecha_expulsion");
      scAjaxHideErrorDisplay("certificado");
      scAjaxHideErrorDisplay("semestre");
      scAjaxHideErrorDisplay("numero_carne_sisben");
      scAjaxHideErrorDisplay("nivel_sisben");
      scAjaxHideErrorDisplay("estrato");
      scAjaxHideErrorDisplay("fuente_recurso");
      scAjaxHideErrorDisplay("opcion");
      scAjaxHideErrorDisplay("resguardo");
      scAjaxHideErrorDisplay("negritudes");
      scAjaxHideErrorDisplay("etnia");
      scAjaxHideErrorDisplay("discapacidades");
      scAjaxHideErrorDisplay("capacidades");
      scAjaxHideErrorDisplay("novedades");
      scLigEditLookupCall();
    }
    Nm_Proc_Atualiz = false;
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetMaster();
      if (scInlineFormSend())
      {
        self.parent.tb_remove();
        return;
      }
      if (document.F1.photo_limpa && document.F1.photo_limpa.checked)
      {
        var oImgTemp = {0: {"value" : ""}};
        scAjaxSetFieldImage("photo", oImgTemp, "", "", "", "N");
      }
    document.F1.photo_ul_name.value = '';
    document.F1.photo_ul_type.value = '';
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_students_mob_submit_form_cb

  var scStatusDetail = {};
  scStatusDetail["form_novedades_x_estudiante_fecha"] = "off";

  function do_ajax_form_students_mob_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    scAjaxHideErrorDisplay("estatus");
    scAjaxHideErrorDisplay("fecha_matricula");
    scAjaxHideErrorDisplay("genero");
    scAjaxHideErrorDisplay("fecha_nacimiento");
    scAjaxHideErrorDisplay("primer_apellido");
    scAjaxHideErrorDisplay("segundo_apellido");
    scAjaxHideErrorDisplay("primer_nombre");
    scAjaxHideErrorDisplay("segundo_nombre");
    scAjaxHideErrorDisplay("tipo_identificacion");
    scAjaxHideErrorDisplay("numero_documento");
    scAjaxHideErrorDisplay("departanebti_expedicion");
    scAjaxHideErrorDisplay("municipio_expedicion");
    scAjaxHideErrorDisplay("firstname");
    scAjaxHideErrorDisplay("lastname");
    scAjaxHideErrorDisplay("anos_cumplidos");
    scAjaxHideErrorDisplay("dpto_nacimiento");
    scAjaxHideErrorDisplay("municipio_nacimiento");
    scAjaxHideErrorDisplay("observaciones");
    scAjaxHideErrorDisplay("login");
    scAjaxHideErrorDisplay("pswd");
    scAjaxHideErrorDisplay("confirm_pswd");
    scAjaxHideErrorDisplay("photo");
    scAjaxHideErrorDisplay("state");
    scAjaxHideErrorDisplay("city");
    scAjaxHideErrorDisplay("address");
    scAjaxHideErrorDisplay("barrio");
    scAjaxHideErrorDisplay("postalcode");
    scAjaxHideErrorDisplay("zona");
    scAjaxHideErrorDisplay("telefono");
    scAjaxHideErrorDisplay("email");
    scAjaxHideErrorDisplay("id_sede");
    scAjaxHideErrorDisplay("id_jornada");
    scAjaxHideErrorDisplay("id_nivel");
    scAjaxHideErrorDisplay("grado_igreso");
    scAjaxHideErrorDisplay("id_grupo");
    scAjaxHideErrorDisplay("grado_anterior");
    scAjaxHideErrorDisplay("last_year");
    scAjaxHideErrorDisplay("nombre_ult_plantel");
    scAjaxHideErrorDisplay("resultado");
    scAjaxHideErrorDisplay("subsidado");
    scAjaxHideErrorDisplay("interno");
    scAjaxHideErrorDisplay("otro_modelo");
    scAjaxHideErrorDisplay("caracter");
    scAjaxHideErrorDisplay("especialidad");
    scAjaxHideErrorDisplay("year_mat");
    scAjaxHideErrorDisplay("matricular");
    scAjaxHideErrorDisplay("eps");
    scAjaxHideErrorDisplay("ips");
    scAjaxHideErrorDisplay("ars");
    scAjaxHideErrorDisplay("tipo_sangre");
    scAjaxHideErrorDisplay("victima_conflicto");
    scAjaxHideErrorDisplay("peso");
    scAjaxHideErrorDisplay("talla");
    scAjaxHideErrorDisplay("cobertura");
    scAjaxHideErrorDisplay("vive_con");
    scAjaxHideErrorDisplay("subsidio");
    scAjaxHideErrorDisplay("estatus_vca");
    scAjaxHideErrorDisplay("depto_expulsor");
    scAjaxHideErrorDisplay("municipio_expulsor");
    scAjaxHideErrorDisplay("fecha_expulsion");
    scAjaxHideErrorDisplay("certificado");
    scAjaxHideErrorDisplay("semestre");
    scAjaxHideErrorDisplay("numero_carne_sisben");
    scAjaxHideErrorDisplay("nivel_sisben");
    scAjaxHideErrorDisplay("estrato");
    scAjaxHideErrorDisplay("fuente_recurso");
    scAjaxHideErrorDisplay("opcion");
    scAjaxHideErrorDisplay("resguardo");
    scAjaxHideErrorDisplay("negritudes");
    scAjaxHideErrorDisplay("etnia");
    scAjaxHideErrorDisplay("discapacidades");
    scAjaxHideErrorDisplay("capacidades");
    scAjaxHideErrorDisplay("novedades");
    var var_idstudents = document.F2.idstudents.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_fast_search = document.F2.nmgp_fast_search.value;
    var var_nmgp_cond_fast_search = document.F2.nmgp_cond_fast_search.value;
    var var_nmgp_arg_fast_search = document.F2.nmgp_arg_fast_search.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    scStatusDetail["form_novedades_x_estudiante_fecha"] = "on";
    x_ajax_form_students_mob_navigate_form(var_idstudents, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_fast_search,  var_nmgp_cond_fast_search,  var_nmgp_arg_fast_search, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_students_mob_navigate_form_cb);
  } // do_ajax_form_students_mob_navigate_form

  function do_ajax_form_students_mob_navigate_form_cb(sResp)
  {
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
    else if (oResp["navSummary"].reg_tot == 0)
    {
       $("#sc-ui-empty-form").show();
       sc_hide_form_students_mob_form();
    }
    sc_mupload_ok = true;
    scAjaxSetFields();
    document.F2.idstudents.value = scAjaxGetKeyValue("idstudents");
    scAjaxSetSummary();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    document.getElementById('nmsc_iframe_liga_form_novedades_x_estudiante_fecha').contentWindow.nm_move('apl_detalhe', true, '250');
    document.getElementById('nmsc_iframe_liga_form_novedades_x_estudiante_fecha').style.height = "250";
    document.getElementById('nmsc_iframe_liga_form_novedades_x_estudiante_fecha').style.display = "none";
    document.F1.photo_ul_name.value = '';
    document.F1.photo_ul_type.value = '';
    scAjaxSetBtnVars();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scQSInit = true;
    scQSInitVal = $("#SC_fast_search_t").val();
    scQuickSearchKeyUp('t', null);
    $('#SC_fast_search_t').blur();
    scQuickSearchInit(true, '');
    scQSInit = false;
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_students_mob_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
    SC_btn_grp_text();
  } // do_ajax_form_students_mob_navigate_form_cb
  function sc_hide_form_students_mob_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_students_mob_form


  function scAjaxDetailStatus(sDetailApp)
  {
    if (scStatusDetail[sDetailApp])
    {
      scStatusDetail[sDetailApp] = "off";
      document.getElementById("nmsc_iframe_liga_" + sDetailApp).style.display = "";
    }
    if (scAjaxDetailProc())
    {
      scAjaxProcOff();
    }
  } // scAjaxDetailStatus

  function scAjaxDetailHeight(sDetailApp, iDetailHeight)
  {
    $("#nmsc_iframe_liga_" + sDetailApp).css("height", iDetailHeight + "px");
  } // scAjaxDetailHeight

  function scAjaxDetailProc()
  {
    if ("off" == scStatusDetail["form_novedades_x_estudiante_fecha"])
    {
      return true;
    }
    return false;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "estatus";
  ajax_field_list[1] = "fecha_matricula";
  ajax_field_list[2] = "genero";
  ajax_field_list[3] = "fecha_nacimiento";
  ajax_field_list[4] = "primer_apellido";
  ajax_field_list[5] = "segundo_apellido";
  ajax_field_list[6] = "primer_nombre";
  ajax_field_list[7] = "segundo_nombre";
  ajax_field_list[8] = "tipo_identificacion";
  ajax_field_list[9] = "numero_documento";
  ajax_field_list[10] = "departanebti_expedicion";
  ajax_field_list[11] = "municipio_expedicion";
  ajax_field_list[12] = "firstname";
  ajax_field_list[13] = "lastname";
  ajax_field_list[14] = "anos_cumplidos";
  ajax_field_list[15] = "dpto_nacimiento";
  ajax_field_list[16] = "municipio_nacimiento";
  ajax_field_list[17] = "observaciones";
  ajax_field_list[18] = "login";
  ajax_field_list[19] = "pswd";
  ajax_field_list[20] = "confirm_pswd";
  ajax_field_list[21] = "photo";
  ajax_field_list[22] = "state";
  ajax_field_list[23] = "city";
  ajax_field_list[24] = "address";
  ajax_field_list[25] = "barrio";
  ajax_field_list[26] = "postalcode";
  ajax_field_list[27] = "zona";
  ajax_field_list[28] = "telefono";
  ajax_field_list[29] = "email";
  ajax_field_list[30] = "id_sede";
  ajax_field_list[31] = "id_jornada";
  ajax_field_list[32] = "id_nivel";
  ajax_field_list[33] = "grado_igreso";
  ajax_field_list[34] = "id_grupo";
  ajax_field_list[35] = "grado_anterior";
  ajax_field_list[36] = "last_year";
  ajax_field_list[37] = "nombre_ult_plantel";
  ajax_field_list[38] = "resultado";
  ajax_field_list[39] = "subsidado";
  ajax_field_list[40] = "interno";
  ajax_field_list[41] = "otro_modelo";
  ajax_field_list[42] = "caracter";
  ajax_field_list[43] = "especialidad";
  ajax_field_list[44] = "year_mat";
  ajax_field_list[45] = "matricular";
  ajax_field_list[46] = "eps";
  ajax_field_list[47] = "ips";
  ajax_field_list[48] = "ars";
  ajax_field_list[49] = "tipo_sangre";
  ajax_field_list[50] = "victima_conflicto";
  ajax_field_list[51] = "peso";
  ajax_field_list[52] = "talla";
  ajax_field_list[53] = "cobertura";
  ajax_field_list[54] = "vive_con";
  ajax_field_list[55] = "subsidio";
  ajax_field_list[56] = "estatus_vca";
  ajax_field_list[57] = "depto_expulsor";
  ajax_field_list[58] = "municipio_expulsor";
  ajax_field_list[59] = "fecha_expulsion";
  ajax_field_list[60] = "certificado";
  ajax_field_list[61] = "semestre";
  ajax_field_list[62] = "numero_carne_sisben";
  ajax_field_list[63] = "nivel_sisben";
  ajax_field_list[64] = "estrato";
  ajax_field_list[65] = "fuente_recurso";
  ajax_field_list[66] = "opcion";
  ajax_field_list[67] = "resguardo";
  ajax_field_list[68] = "negritudes";
  ajax_field_list[69] = "etnia";
  ajax_field_list[70] = "discapacidades";
  ajax_field_list[71] = "capacidades";
  ajax_field_list[72] = "novedades";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";
  ajax_block_list[1] = "1";
  ajax_block_list[2] = "2";
  ajax_block_list[3] = "3";
  ajax_block_list[4] = "4";
  ajax_block_list[5] = "5";
  ajax_block_list[6] = "6";
  ajax_block_list[7] = "7";
  ajax_block_list[8] = "8";
  ajax_block_list[9] = "9";

  var ajax_error_list = {
    "estatus": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_matricula": {"label": "Fecha Matricula", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "genero": {"label": "Genero", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_nacimiento": {"label": "Fecha Nacimiento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "primer_apellido": {"label": "Primer Apellido", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "segundo_apellido": {"label": "Segundo Apellido", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "primer_nombre": {"label": "Primer Nombre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "segundo_nombre": {"label": "Segundo Nombre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipo_identificacion": {"label": "Tipo Identificacion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "numero_documento": {"label": "Número Documento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "departanebti_expedicion": {"label": "Departamento Expedición", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "municipio_expedicion": {"label": "Municipio Expedición", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "firstname": {"label": "<?php echo $this->Ini->Nm_lang['lang_students_fld_firstname'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "lastname": {"label": "<?php echo $this->Ini->Nm_lang['lang_students_fld_lastname'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "anos_cumplidos": {"label": "Años Cumplidos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dpto_nacimiento": {"label": "Dpto Nacimiento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "municipio_nacimiento": {"label": "Municipio Nacimiento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "observaciones": {"label": "Observaciones", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "login": {"label": "<?php echo $this->Ini->Nm_lang['lang_students_fld_login'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pswd": {"label": "<?php echo $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "confirm_pswd": {"label": "<?php echo $this->Ini->Nm_lang['lang_sec_users_fild_pswd_confirm'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "photo": {"label": "<?php echo $this->Ini->Nm_lang['lang_students_fld_photo'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "state": {"label": "<?php echo $this->Ini->Nm_lang['lang_students_fld_state'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "city": {"label": "<?php echo $this->Ini->Nm_lang['lang_students_fld_city'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "address": {"label": "<?php echo $this->Ini->Nm_lang['lang_students_fld_address'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "barrio": {"label": "Barrio", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "postalcode": {"label": "<?php echo $this->Ini->Nm_lang['lang_students_fld_postalcode'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "zona": {"label": "Zona", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefono": {"label": "Telefono", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "email": {"label": "<?php echo $this->Ini->Nm_lang['lang_students_fld_email'] ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_sede": {"label": "Sede", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_jornada": {"label": "Jornada", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_nivel": {"label": "Nivel", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "grado_igreso": {"label": "Grado Ingreso", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_grupo": {"label": "Grupo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "grado_anterior": {"label": "Grado Anterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "last_year": {"label": "Ultimo Año", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_ult_plantel": {"label": "Nombre Ult Plantel", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "resultado": {"label": "Resultado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "subsidado": {"label": "Subsidiado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "interno": {"label": "Interno", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "otro_modelo": {"label": "Otro Modelo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "caracter": {"label": "Caracter", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "especialidad": {"label": "Especialidad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "year_mat": {"label": "Año a matricular", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "matricular": {"label": "Matricular", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "eps": {"label": "Eps", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ips": {"label": "Ips", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ars": {"label": "Ars", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipo_sangre": {"label": "Tipo Sangre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "victima_conflicto": {"label": "Victima Conflicto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "peso": {"label": "Peso", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "talla": {"label": "Talla", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cobertura": {"label": "Cobertura", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "vive_con": {"label": "Vive Con", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "subsidio": {"label": "Subsidio", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatus_vca": {"label": "Estatus Victima Conflicto Armado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "depto_expulsor": {"label": "Departamento Expulsor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "municipio_expulsor": {"label": "Municipio Expulsor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_expulsion": {"label": "Fecha Expulsion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "certificado": {"label": "Certificado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "semestre": {"label": "Semestre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "numero_carne_sisben": {"label": "Numero Carne Sisben", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nivel_sisben": {"label": "Nivel Sisben", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estrato": {"label": "Estrato", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fuente_recurso": {"label": "Fuente Recurso", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "opcion": {"label": "Opcion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "resguardo": {"label": "Resguardo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "negritudes": {"label": "Negritudes", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "etnia": {"label": "Etnia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "discapacidades": {"label": "Discapacidades", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "capacidades": {"label": "Capacidades", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "novedades": {"label": "Novedades", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5}
  };
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0",
    "1": "hidden_bloco_1",
    "2": "hidden_bloco_2",
    "3": "hidden_bloco_3",
    "4": "hidden_bloco_4",
    "5": "hidden_bloco_5",
    "6": "hidden_bloco_6",
    "7": "hidden_bloco_7",
    "8": "hidden_bloco_8",
    "9": "hidden_bloco_9"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": "",
    "hidden_bloco_1": "",
    "hidden_bloco_2": "",
    "hidden_bloco_3": "",
    "hidden_bloco_4": "",
    "hidden_bloco_5": "",
    "hidden_bloco_6": "",
    "hidden_bloco_7": "",
    "hidden_bloco_8": "",
    "hidden_bloco_9": ""
  };

  var ajax_field_mult = {
    "estatus": new Array(),
    "fecha_matricula": new Array(),
    "genero": new Array(),
    "fecha_nacimiento": new Array(),
    "primer_apellido": new Array(),
    "segundo_apellido": new Array(),
    "primer_nombre": new Array(),
    "segundo_nombre": new Array(),
    "tipo_identificacion": new Array(),
    "numero_documento": new Array(),
    "departanebti_expedicion": new Array(),
    "municipio_expedicion": new Array(),
    "firstname": new Array(),
    "lastname": new Array(),
    "anos_cumplidos": new Array(),
    "dpto_nacimiento": new Array(),
    "municipio_nacimiento": new Array(),
    "observaciones": new Array(),
    "login": new Array(),
    "pswd": new Array(),
    "confirm_pswd": new Array(),
    "photo": new Array(),
    "state": new Array(),
    "city": new Array(),
    "address": new Array(),
    "barrio": new Array(),
    "postalcode": new Array(),
    "zona": new Array(),
    "telefono": new Array(),
    "email": new Array(),
    "id_sede": new Array(),
    "id_jornada": new Array(),
    "id_nivel": new Array(),
    "grado_igreso": new Array(),
    "id_grupo": new Array(),
    "grado_anterior": new Array(),
    "last_year": new Array(),
    "nombre_ult_plantel": new Array(),
    "resultado": new Array(),
    "subsidado": new Array(),
    "interno": new Array(),
    "otro_modelo": new Array(),
    "caracter": new Array(),
    "especialidad": new Array(),
    "year_mat": new Array(),
    "matricular": new Array(),
    "eps": new Array(),
    "ips": new Array(),
    "ars": new Array(),
    "tipo_sangre": new Array(),
    "victima_conflicto": new Array(),
    "peso": new Array(),
    "talla": new Array(),
    "cobertura": new Array(),
    "vive_con": new Array(),
    "subsidio": new Array(),
    "estatus_vca": new Array(),
    "depto_expulsor": new Array(),
    "municipio_expulsor": new Array(),
    "fecha_expulsion": new Array(),
    "certificado": new Array(),
    "semestre": new Array(),
    "numero_carne_sisben": new Array(),
    "nivel_sisben": new Array(),
    "estrato": new Array(),
    "fuente_recurso": new Array(),
    "opcion": new Array(),
    "resguardo": new Array(),
    "negritudes": new Array(),
    "etnia": new Array(),
    "discapacidades": new Array(),
    "capacidades": new Array(),
    "novedades": new Array()
  };
  ajax_field_mult["estatus"][1] = "estatus";
  ajax_field_mult["fecha_matricula"][1] = "fecha_matricula";
  ajax_field_mult["genero"][1] = "genero";
  ajax_field_mult["fecha_nacimiento"][1] = "fecha_nacimiento";
  ajax_field_mult["primer_apellido"][1] = "primer_apellido";
  ajax_field_mult["segundo_apellido"][1] = "segundo_apellido";
  ajax_field_mult["primer_nombre"][1] = "primer_nombre";
  ajax_field_mult["segundo_nombre"][1] = "segundo_nombre";
  ajax_field_mult["tipo_identificacion"][1] = "tipo_identificacion";
  ajax_field_mult["numero_documento"][1] = "numero_documento";
  ajax_field_mult["departanebti_expedicion"][1] = "departanebti_expedicion";
  ajax_field_mult["municipio_expedicion"][1] = "municipio_expedicion";
  ajax_field_mult["firstname"][1] = "firstname";
  ajax_field_mult["lastname"][1] = "lastname";
  ajax_field_mult["anos_cumplidos"][1] = "anos_cumplidos";
  ajax_field_mult["dpto_nacimiento"][1] = "dpto_nacimiento";
  ajax_field_mult["municipio_nacimiento"][1] = "municipio_nacimiento";
  ajax_field_mult["observaciones"][1] = "observaciones";
  ajax_field_mult["login"][1] = "login";
  ajax_field_mult["pswd"][1] = "pswd";
  ajax_field_mult["confirm_pswd"][1] = "confirm_pswd";
  ajax_field_mult["photo"][1] = "photo";
  ajax_field_mult["state"][1] = "state";
  ajax_field_mult["city"][1] = "city";
  ajax_field_mult["address"][1] = "address";
  ajax_field_mult["barrio"][1] = "barrio";
  ajax_field_mult["postalcode"][1] = "postalcode";
  ajax_field_mult["zona"][1] = "zona";
  ajax_field_mult["telefono"][1] = "telefono";
  ajax_field_mult["email"][1] = "email";
  ajax_field_mult["id_sede"][1] = "id_sede";
  ajax_field_mult["id_jornada"][1] = "id_jornada";
  ajax_field_mult["id_nivel"][1] = "id_nivel";
  ajax_field_mult["grado_igreso"][1] = "grado_igreso";
  ajax_field_mult["id_grupo"][1] = "id_grupo";
  ajax_field_mult["grado_anterior"][1] = "grado_anterior";
  ajax_field_mult["last_year"][1] = "last_year";
  ajax_field_mult["nombre_ult_plantel"][1] = "nombre_ult_plantel";
  ajax_field_mult["resultado"][1] = "resultado";
  ajax_field_mult["subsidado"][1] = "subsidado";
  ajax_field_mult["interno"][1] = "interno";
  ajax_field_mult["otro_modelo"][1] = "otro_modelo";
  ajax_field_mult["caracter"][1] = "caracter";
  ajax_field_mult["especialidad"][1] = "especialidad";
  ajax_field_mult["year_mat"][1] = "year_mat";
  ajax_field_mult["matricular"][1] = "matricular";
  ajax_field_mult["eps"][1] = "eps";
  ajax_field_mult["ips"][1] = "ips";
  ajax_field_mult["ars"][1] = "ars";
  ajax_field_mult["tipo_sangre"][1] = "tipo_sangre";
  ajax_field_mult["victima_conflicto"][1] = "victima_conflicto";
  ajax_field_mult["peso"][1] = "peso";
  ajax_field_mult["talla"][1] = "talla";
  ajax_field_mult["cobertura"][1] = "cobertura";
  ajax_field_mult["vive_con"][1] = "vive_con";
  ajax_field_mult["subsidio"][1] = "subsidio";
  ajax_field_mult["estatus_vca"][1] = "estatus_vca";
  ajax_field_mult["depto_expulsor"][1] = "depto_expulsor";
  ajax_field_mult["municipio_expulsor"][1] = "municipio_expulsor";
  ajax_field_mult["fecha_expulsion"][1] = "fecha_expulsion";
  ajax_field_mult["certificado"][1] = "certificado";
  ajax_field_mult["semestre"][1] = "semestre";
  ajax_field_mult["numero_carne_sisben"][1] = "numero_carne_sisben";
  ajax_field_mult["nivel_sisben"][1] = "nivel_sisben";
  ajax_field_mult["estrato"][1] = "estrato";
  ajax_field_mult["fuente_recurso"][1] = "fuente_recurso";
  ajax_field_mult["opcion"][1] = "opcion";
  ajax_field_mult["resguardo"][1] = "resguardo";
  ajax_field_mult["negritudes"][1] = "negritudes";
  ajax_field_mult["etnia"][1] = "etnia";
  ajax_field_mult["discapacidades"][1] = "discapacidades";
  ajax_field_mult["capacidades"][1] = "capacidades";
  ajax_field_mult["novedades"][1] = "novedades";

  var ajax_field_id = {
    "estatus": new Array("hidden_field_label_estatus", "hidden_field_data_estatus"),
    "fecha_matricula": new Array("hidden_field_label_fecha_matricula", "hidden_field_data_fecha_matricula"),
    "genero": new Array("hidden_field_label_genero", "hidden_field_data_genero"),
    "fecha_nacimiento": new Array("hidden_field_label_fecha_nacimiento", "hidden_field_data_fecha_nacimiento"),
    "primer_apellido": new Array("hidden_field_label_primer_apellido", "hidden_field_data_primer_apellido"),
    "segundo_apellido": new Array("hidden_field_label_segundo_apellido", "hidden_field_data_segundo_apellido"),
    "primer_nombre": new Array("hidden_field_label_primer_nombre", "hidden_field_data_primer_nombre"),
    "segundo_nombre": new Array("hidden_field_label_segundo_nombre", "hidden_field_data_segundo_nombre"),
    "tipo_identificacion": new Array("hidden_field_label_tipo_identificacion", "hidden_field_data_tipo_identificacion"),
    "numero_documento": new Array("hidden_field_label_numero_documento", "hidden_field_data_numero_documento"),
    "departanebti_expedicion": new Array("hidden_field_label_departanebti_expedicion", "hidden_field_data_departanebti_expedicion"),
    "municipio_expedicion": new Array("hidden_field_label_municipio_expedicion", "hidden_field_data_municipio_expedicion"),
    "anos_cumplidos": new Array("hidden_field_label_anos_cumplidos", "hidden_field_data_anos_cumplidos"),
    "dpto_nacimiento": new Array("hidden_field_label_dpto_nacimiento", "hidden_field_data_dpto_nacimiento"),
    "municipio_nacimiento": new Array("hidden_field_label_municipio_nacimiento", "hidden_field_data_municipio_nacimiento"),
    "observaciones": new Array("hidden_field_label_observaciones", "hidden_field_data_observaciones"),
    "login": new Array("hidden_field_label_login", "hidden_field_data_login"),
    "pswd": new Array("hidden_field_label_pswd", "hidden_field_data_pswd"),
    "confirm_pswd": new Array("hidden_field_label_confirm_pswd", "hidden_field_data_confirm_pswd"),
    "photo": new Array("hidden_field_label_photo", "hidden_field_data_photo"),
    "state": new Array("hidden_field_label_state", "hidden_field_data_state"),
    "city": new Array("hidden_field_label_city", "hidden_field_data_city"),
    "address": new Array("hidden_field_label_address", "hidden_field_data_address"),
    "barrio": new Array("hidden_field_label_barrio", "hidden_field_data_barrio"),
    "zona": new Array("hidden_field_label_zona", "hidden_field_data_zona"),
    "telefono": new Array("hidden_field_label_telefono", "hidden_field_data_telefono"),
    "email": new Array("hidden_field_label_email", "hidden_field_data_email"),
    "id_sede": new Array("hidden_field_label_id_sede", "hidden_field_data_id_sede"),
    "id_jornada": new Array("hidden_field_label_id_jornada", "hidden_field_data_id_jornada"),
    "id_nivel": new Array("hidden_field_label_id_nivel", "hidden_field_data_id_nivel"),
    "grado_igreso": new Array("hidden_field_label_grado_igreso", "hidden_field_data_grado_igreso"),
    "id_grupo": new Array("hidden_field_label_id_grupo", "hidden_field_data_id_grupo"),
    "grado_anterior": new Array("hidden_field_label_grado_anterior", "hidden_field_data_grado_anterior"),
    "last_year": new Array("hidden_field_label_last_year", "hidden_field_data_last_year"),
    "nombre_ult_plantel": new Array("hidden_field_label_nombre_ult_plantel", "hidden_field_data_nombre_ult_plantel"),
    "resultado": new Array("hidden_field_label_resultado", "hidden_field_data_resultado"),
    "subsidado": new Array("hidden_field_label_subsidado", "hidden_field_data_subsidado"),
    "interno": new Array("hidden_field_label_interno", "hidden_field_data_interno"),
    "otro_modelo": new Array("hidden_field_label_otro_modelo", "hidden_field_data_otro_modelo"),
    "caracter": new Array("hidden_field_label_caracter", "hidden_field_data_caracter"),
    "especialidad": new Array("hidden_field_label_especialidad", "hidden_field_data_especialidad"),
    "year_mat": new Array("hidden_field_label_year_mat", "hidden_field_data_year_mat"),
    "matricular": new Array("hidden_field_label_matricular", "hidden_field_data_matricular"),
    "eps": new Array("hidden_field_label_eps", "hidden_field_data_eps"),
    "ips": new Array("hidden_field_label_ips", "hidden_field_data_ips"),
    "ars": new Array("hidden_field_label_ars", "hidden_field_data_ars"),
    "tipo_sangre": new Array("hidden_field_label_tipo_sangre", "hidden_field_data_tipo_sangre"),
    "victima_conflicto": new Array("hidden_field_label_victima_conflicto", "hidden_field_data_victima_conflicto"),
    "peso": new Array("hidden_field_label_peso", "hidden_field_data_peso"),
    "talla": new Array("hidden_field_label_talla", "hidden_field_data_talla"),
    "cobertura": new Array("hidden_field_label_cobertura", "hidden_field_data_cobertura"),
    "vive_con": new Array("hidden_field_label_vive_con", "hidden_field_data_vive_con"),
    "subsidio": new Array("hidden_field_label_subsidio", "hidden_field_data_subsidio"),
    "estatus_vca": new Array("hidden_field_label_estatus_vca", "hidden_field_data_estatus_vca"),
    "depto_expulsor": new Array("hidden_field_label_depto_expulsor", "hidden_field_data_depto_expulsor"),
    "municipio_expulsor": new Array("hidden_field_label_municipio_expulsor", "hidden_field_data_municipio_expulsor"),
    "fecha_expulsion": new Array("hidden_field_label_fecha_expulsion", "hidden_field_data_fecha_expulsion"),
    "certificado": new Array("hidden_field_label_certificado", "hidden_field_data_certificado"),
    "semestre": new Array("hidden_field_label_semestre", "hidden_field_data_semestre"),
    "numero_carne_sisben": new Array("hidden_field_label_numero_carne_sisben", "hidden_field_data_numero_carne_sisben"),
    "nivel_sisben": new Array("hidden_field_label_nivel_sisben", "hidden_field_data_nivel_sisben"),
    "estrato": new Array("hidden_field_label_estrato", "hidden_field_data_estrato"),
    "fuente_recurso": new Array("hidden_field_label_fuente_recurso", "hidden_field_data_fuente_recurso"),
    "opcion": new Array("hidden_field_label_opcion", "hidden_field_data_opcion"),
    "resguardo": new Array("hidden_field_label_resguardo", "hidden_field_data_resguardo"),
    "negritudes": new Array("hidden_field_label_negritudes", "hidden_field_data_negritudes"),
    "etnia": new Array("hidden_field_label_etnia", "hidden_field_data_etnia"),
    "discapacidades": new Array("hidden_field_label_discapacidades", "hidden_field_data_discapacidades"),
    "capacidades": new Array("hidden_field_label_capacidades", "hidden_field_data_capacidades"),
    "novedades": new Array("hidden_field_label_novedades", "hidden_field_data_novedades")
  };

  var ajax_read_only = {
    "estatus": "off",
    "fecha_matricula": "off",
    "genero": "off",
    "fecha_nacimiento": "off",
    "primer_apellido": "off",
    "segundo_apellido": "off",
    "primer_nombre": "off",
    "segundo_nombre": "off",
    "tipo_identificacion": "off",
    "numero_documento": "off",
    "departanebti_expedicion": "off",
    "municipio_expedicion": "off",
    "firstname": "off",
    "lastname": "off",
    "anos_cumplidos": "off",
    "dpto_nacimiento": "off",
    "municipio_nacimiento": "off",
    "observaciones": "off",
    "login": "off",
    "pswd": "off",
    "confirm_pswd": "off",
    "photo": "off",
    "state": "off",
    "city": "off",
    "address": "off",
    "barrio": "off",
    "postalcode": "off",
    "zona": "off",
    "telefono": "off",
    "email": "off",
    "id_sede": "off",
    "id_jornada": "off",
    "id_nivel": "off",
    "grado_igreso": "off",
    "id_grupo": "off",
    "grado_anterior": "off",
    "last_year": "off",
    "nombre_ult_plantel": "off",
    "resultado": "off",
    "subsidado": "off",
    "interno": "off",
    "otro_modelo": "off",
    "caracter": "off",
    "especialidad": "off",
    "year_mat": "off",
    "matricular": "off",
    "eps": "off",
    "ips": "off",
    "ars": "off",
    "tipo_sangre": "off",
    "victima_conflicto": "off",
    "peso": "off",
    "talla": "off",
    "cobertura": "off",
    "vive_con": "off",
    "subsidio": "off",
    "estatus_vca": "off",
    "depto_expulsor": "off",
    "municipio_expulsor": "off",
    "fecha_expulsion": "off",
    "certificado": "off",
    "semestre": "off",
    "numero_carne_sisben": "off",
    "nivel_sisben": "off",
    "estrato": "off",
    "fuente_recurso": "off",
    "opcion": "off",
    "resguardo": "off",
    "negritudes": "off",
    "etnia": "off",
    "discapacidades": "off",
    "capacidades": "off",
    "novedades": "off"
  };
  var bRefreshTable = false;
  function scRefreshTable()
  {
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("estatus" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("fecha_matricula" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("genero" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("fecha_nacimiento" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("primer_apellido" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("segundo_apellido" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("primer_nombre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("segundo_nombre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("tipo_identificacion" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("numero_documento" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("departanebti_expedicion" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("municipio_expedicion" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("firstname" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("lastname" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("anos_cumplidos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dpto_nacimiento" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("municipio_nacimiento" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("observaciones" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("login" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("pswd" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("confirm_pswd" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("photo" == sIndex)
    {
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("state" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("city" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("address" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("barrio" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("postalcode" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("zona" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("telefono" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("id_sede" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("id_jornada" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("id_nivel" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("grado_igreso" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("id_grupo" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("grado_anterior" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("last_year" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("nombre_ult_plantel" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("resultado" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("subsidado" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("interno" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("otro_modelo" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("caracter" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("especialidad" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("year_mat" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("matricular" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("eps" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("ips" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("ars" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("tipo_sangre" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("victima_conflicto" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("peso" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("talla" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("cobertura" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("vive_con" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("subsidio" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("estatus_vca" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("depto_expulsor" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("municipio_expulsor" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("fecha_expulsion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("certificado" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("semestre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("numero_carne_sisben" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("nivel_sisben" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("estrato" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("fuente_recurso" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("opcion" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("resguardo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("negritudes" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("etnia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("discapacidades" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("capacidades" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("novedades" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>
