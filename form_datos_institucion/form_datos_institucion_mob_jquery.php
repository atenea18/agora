
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nombre_inst" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cod_dane" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["iddepartamento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idmunicipio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["telefonos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["rector" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["enunciado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["logo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["logo_byte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_inst" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_inst" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_dane" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_dane" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iddepartamento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iddepartamento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idmunicipio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idmunicipio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefonos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefonos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rector" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rector" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enunciado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enunciado" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("iddepartamento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idmunicipio" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_datos_institucion_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_inst' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_nombre_inst_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_datos_institucion_nombre_inst_onfocus(this, iSeqRow) });
  $('#id_sc_field_nit' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_nit_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_datos_institucion_nit_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_dane' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_cod_dane_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_datos_institucion_cod_dane_onfocus(this, iSeqRow) });
  $('#id_sc_field_iddepartamento' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_iddepartamento_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_datos_institucion_iddepartamento_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_datos_institucion_iddepartamento_onfocus(this, iSeqRow) });
  $('#id_sc_field_idmunicipio' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_idmunicipio_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_datos_institucion_idmunicipio_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_direccion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_datos_institucion_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefonos' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_telefonos_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_datos_institucion_telefonos_onfocus(this, iSeqRow) });
  $('#id_sc_field_rector' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_rector_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_datos_institucion_rector_onfocus(this, iSeqRow) });
  $('#id_sc_field_enunciado' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_enunciado_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_datos_institucion_enunciado_onfocus(this, iSeqRow) });
  $('#id_sc_field_logo' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_logo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_datos_institucion_logo_onfocus(this, iSeqRow) });
  $('#id_sc_field_logo_byte' + iSeqRow).bind('blur', function() { sc_form_datos_institucion_logo_byte_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_datos_institucion_logo_byte_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_datos_institucion_id_onblur(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_datos_institucion_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datos_institucion_nombre_inst_onblur(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_validate_nombre_inst();
  scCssBlur(oThis);
}

function sc_form_datos_institucion_nombre_inst_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datos_institucion_nit_onblur(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_validate_nit();
  scCssBlur(oThis);
}

function sc_form_datos_institucion_nit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datos_institucion_cod_dane_onblur(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_validate_cod_dane();
  scCssBlur(oThis);
}

function sc_form_datos_institucion_cod_dane_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datos_institucion_iddepartamento_onblur(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_validate_iddepartamento();
  scCssBlur(oThis);
}

function sc_form_datos_institucion_iddepartamento_onchange(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_refresh_iddepartamento();
}

function sc_form_datos_institucion_iddepartamento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datos_institucion_idmunicipio_onblur(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_validate_idmunicipio();
  scCssBlur(oThis);
}

function sc_form_datos_institucion_idmunicipio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datos_institucion_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_datos_institucion_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datos_institucion_telefonos_onblur(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_validate_telefonos();
  scCssBlur(oThis);
}

function sc_form_datos_institucion_telefonos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datos_institucion_rector_onblur(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_validate_rector();
  scCssBlur(oThis);
}

function sc_form_datos_institucion_rector_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datos_institucion_enunciado_onblur(oThis, iSeqRow) {
  do_ajax_form_datos_institucion_mob_validate_enunciado();
  scCssBlur(oThis);
}

function sc_form_datos_institucion_enunciado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_datos_institucion_logo_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_datos_institucion_logo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_datos_institucion_logo_byte_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_datos_institucion_logo_byte_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_logo" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_datos_institucion_mob_ul_save.php",
    dropZone: $("#hidden_field_data_logo" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'logo'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_logo" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_logo" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_logo" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_logo" + iSeqRow).hide();
      }
      if (fileData && fileData[0] && fileData[0].error && "acceptFileTypes" == fileData[0].error) {
        oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl']; ?>"};
        scAjaxShowDebug(oTemp);
        return;
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      $("#id_sc_field_logo" + iSeqRow).val("");
      $("#id_sc_field_logo_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_logo_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_logo = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_logo) ? "none" : "";
      $("#id_ajax_img_logo" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_logo" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_logo) {
        document.F1.temp_out_logo.value = var_ajax_img_thumb;
        document.F1.temp_out1_logo.value = var_ajax_img_logo;
      }
      else if (document.F1.temp_out_logo) {
        document.F1.temp_out_logo.value = var_ajax_img_logo;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_logo" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_logo" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_logo" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_logo" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_logo_byte" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_datos_institucion_mob_ul_save.php",
    dropZone: $("#hidden_field_data_logo_byte" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'logo_byte'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_logo_byte" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_logo_byte" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_logo_byte" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_logo_byte" + iSeqRow).hide();
      }
      if (fileData && fileData[0] && fileData[0].error && "acceptFileTypes" == fileData[0].error) {
        oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl']; ?>"};
        scAjaxShowDebug(oTemp);
        return;
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      $("#id_sc_field_logo_byte" + iSeqRow).val("");
      $("#id_sc_field_logo_byte_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_logo_byte_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_logo_byte = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_logo_byte) ? "none" : "";
      $("#id_ajax_img_logo_byte" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_logo_byte" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_logo_byte) {
        document.F1.temp_out_logo_byte.value = var_ajax_img_thumb;
        document.F1.temp_out1_logo_byte.value = var_ajax_img_logo_byte;
      }
      else if (document.F1.temp_out_logo_byte) {
        document.F1.temp_out_logo_byte.value = var_ajax_img_logo_byte;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_logo_byte" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_logo_byte" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_logo_byte" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_logo_byte" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
