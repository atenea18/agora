
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
  scEventControl_data["documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["foto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["primer_apellido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["segundo_apellido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["primer_nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["segundo_nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["iddepartamento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idmunicipio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tel_fijo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tel_celular" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_area" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["login" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["password" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["confirm_pswd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["perfil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["primer_apellido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["primer_apellido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["segundo_apellido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["segundo_apellido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["primer_nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["primer_nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["segundo_nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["segundo_nombre" + iSeqRow]["change"]) {
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
  if (scEventControl_data["tel_fijo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tel_fijo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tel_celular" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tel_celular" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_area" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_area" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["login" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["login" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["password" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["password" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["confirm_pswd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["confirm_pswd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["perfil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["perfil" + iSeqRow]["change"]) {
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
  if ("id_area" + iSeq == fieldName) {
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
  $('#id_sc_field_documento' + iSeqRow).bind('blur', function() { sc_form_docentes_documento_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_docentes_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_primer_apellido' + iSeqRow).bind('blur', function() { sc_form_docentes_primer_apellido_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_docentes_primer_apellido_onfocus(this, iSeqRow) });
  $('#id_sc_field_segundo_apellido' + iSeqRow).bind('blur', function() { sc_form_docentes_segundo_apellido_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_docentes_segundo_apellido_onfocus(this, iSeqRow) });
  $('#id_sc_field_primer_nombre' + iSeqRow).bind('blur', function() { sc_form_docentes_primer_nombre_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_docentes_primer_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_segundo_nombre' + iSeqRow).bind('blur', function() { sc_form_docentes_segundo_nombre_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_docentes_segundo_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_iddepartamento' + iSeqRow).bind('blur', function() { sc_form_docentes_iddepartamento_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_docentes_iddepartamento_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_docentes_iddepartamento_onfocus(this, iSeqRow) });
  $('#id_sc_field_idmunicipio' + iSeqRow).bind('blur', function() { sc_form_docentes_idmunicipio_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_docentes_idmunicipio_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_docentes_direccion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_docentes_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_tel_fijo' + iSeqRow).bind('blur', function() { sc_form_docentes_tel_fijo_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_docentes_tel_fijo_onfocus(this, iSeqRow) });
  $('#id_sc_field_tel_celular' + iSeqRow).bind('blur', function() { sc_form_docentes_tel_celular_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_docentes_tel_celular_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_docentes_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_docentes_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_area' + iSeqRow).bind('blur', function() { sc_form_docentes_id_area_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_docentes_id_area_onfocus(this, iSeqRow) });
  $('#id_sc_field_login' + iSeqRow).bind('blur', function() { sc_form_docentes_login_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_docentes_login_onfocus(this, iSeqRow) });
  $('#id_sc_field_foto' + iSeqRow).bind('blur', function() { sc_form_docentes_foto_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_docentes_foto_onfocus(this, iSeqRow) });
  $('#id_sc_field_perfil' + iSeqRow).bind('blur', function() { sc_form_docentes_perfil_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_docentes_perfil_onfocus(this, iSeqRow) });
  $('#id_sc_field_password' + iSeqRow).bind('blur', function() { sc_form_docentes_password_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_docentes_password_onfocus(this, iSeqRow) });
  $('#id_sc_field_confirm_pswd' + iSeqRow).bind('blur', function() { sc_form_docentes_confirm_pswd_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_docentes_confirm_pswd_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_docentes_documento_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_documento();
  scCssBlur(oThis);
}

function sc_form_docentes_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_primer_apellido_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_primer_apellido();
  scCssBlur(oThis);
}

function sc_form_docentes_primer_apellido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_segundo_apellido_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_segundo_apellido();
  scCssBlur(oThis);
}

function sc_form_docentes_segundo_apellido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_primer_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_primer_nombre();
  scCssBlur(oThis);
}

function sc_form_docentes_primer_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_segundo_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_segundo_nombre();
  scCssBlur(oThis);
}

function sc_form_docentes_segundo_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_iddepartamento_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_iddepartamento();
  scCssBlur(oThis);
}

function sc_form_docentes_iddepartamento_onchange(oThis, iSeqRow) {
  do_ajax_form_docentes_refresh_iddepartamento();
}

function sc_form_docentes_iddepartamento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_idmunicipio_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_idmunicipio();
  scCssBlur(oThis);
}

function sc_form_docentes_idmunicipio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_docentes_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_tel_fijo_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_tel_fijo();
  scCssBlur(oThis);
}

function sc_form_docentes_tel_fijo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_tel_celular_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_tel_celular();
  scCssBlur(oThis);
}

function sc_form_docentes_tel_celular_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_email_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_email();
  scCssBlur(oThis);
}

function sc_form_docentes_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_id_area_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_id_area();
  scCssBlur(oThis);
}

function sc_form_docentes_id_area_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_login_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_login();
  scCssBlur(oThis);
}

function sc_form_docentes_login_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_foto_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_docentes_foto_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_docentes_perfil_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_perfil();
  scCssBlur(oThis);
}

function sc_form_docentes_perfil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_password_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_password();
  scCssBlur(oThis);
}

function sc_form_docentes_password_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_docentes_confirm_pswd_onblur(oThis, iSeqRow) {
  do_ajax_form_docentes_validate_confirm_pswd();
  scCssBlur(oThis);
}

function sc_form_docentes_confirm_pswd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_foto" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_docentes_ul_save.php",
    dropZone: $("#hidden_field_data_foto" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'foto'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_foto" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_foto" + iSeqRow);
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
        $("#id_img_loader_foto" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_foto" + iSeqRow).hide();
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
      $("#id_sc_field_foto" + iSeqRow).val("");
      $("#id_sc_field_foto_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_foto_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_foto = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_foto) ? "none" : "";
      $("#id_ajax_img_foto" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_foto" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_foto) {
        document.F1.temp_out_foto.value = var_ajax_img_thumb;
        document.F1.temp_out1_foto.value = var_ajax_img_foto;
      }
      else if (document.F1.temp_out_foto) {
        document.F1.temp_out_foto.value = var_ajax_img_foto;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_foto" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_foto" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_foto" + iSeqRow).css("display", "none");
      $("#id_ajax_link_foto" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

