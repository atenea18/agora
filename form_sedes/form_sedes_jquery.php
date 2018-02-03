
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
  scEventControl_data["id_sede" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sede" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["capacidad_fisica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cod_dane" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["telefonos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["coordinador_manana" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["coordinador_tarde" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["coordinador_nocturno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["coordinador_sabado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_sede" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_sede" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sede" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sede" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["capacidad_fisica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["capacidad_fisica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_dane" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_dane" + iSeqRow]["change"]) {
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
  if (scEventControl_data["coordinador_manana" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coordinador_manana" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coordinador_tarde" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coordinador_tarde" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coordinador_nocturno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coordinador_nocturno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coordinador_sabado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coordinador_sabado" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("coordinador_manana" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("coordinador_tarde" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("coordinador_nocturno" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("coordinador_sabado" + iSeq == fieldName) {
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
  $('#id_sc_field_id_sede' + iSeqRow).bind('blur', function() { sc_form_sedes_id_sede_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_sedes_id_sede_onfocus(this, iSeqRow) });
  $('#id_sc_field_sede' + iSeqRow).bind('blur', function() { sc_form_sedes_sede_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_sedes_sede_onfocus(this, iSeqRow) });
  $('#id_sc_field_nit' + iSeqRow).bind('blur', function() { sc_form_sedes_nit_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_sedes_nit_onfocus(this, iSeqRow) });
  $('#id_sc_field_capacidad_fisica' + iSeqRow).bind('blur', function() { sc_form_sedes_capacidad_fisica_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_sedes_capacidad_fisica_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_dane' + iSeqRow).bind('blur', function() { sc_form_sedes_cod_dane_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_sedes_cod_dane_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_sedes_direccion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_sedes_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefonos' + iSeqRow).bind('blur', function() { sc_form_sedes_telefonos_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_sedes_telefonos_onfocus(this, iSeqRow) });
  $('#id_sc_field_coordinador_manana' + iSeqRow).bind('blur', function() { sc_form_sedes_coordinador_manana_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_sedes_coordinador_manana_onfocus(this, iSeqRow) });
  $('#id_sc_field_coordinador_tarde' + iSeqRow).bind('blur', function() { sc_form_sedes_coordinador_tarde_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_sedes_coordinador_tarde_onfocus(this, iSeqRow) });
  $('#id_sc_field_coordinador_nocturno' + iSeqRow).bind('blur', function() { sc_form_sedes_coordinador_nocturno_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_sedes_coordinador_nocturno_onfocus(this, iSeqRow) });
  $('#id_sc_field_coordinador_sabado' + iSeqRow).bind('blur', function() { sc_form_sedes_coordinador_sabado_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_sedes_coordinador_sabado_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_sedes_id_sede_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_id_sede();
  scCssBlur(oThis);
}

function sc_form_sedes_id_sede_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sedes_sede_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_sede();
  scCssBlur(oThis);
}

function sc_form_sedes_sede_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sedes_nit_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_nit();
  scCssBlur(oThis);
}

function sc_form_sedes_nit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sedes_capacidad_fisica_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_capacidad_fisica();
  scCssBlur(oThis);
}

function sc_form_sedes_capacidad_fisica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sedes_cod_dane_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_cod_dane();
  scCssBlur(oThis);
}

function sc_form_sedes_cod_dane_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sedes_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_sedes_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sedes_telefonos_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_telefonos();
  scCssBlur(oThis);
}

function sc_form_sedes_telefonos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sedes_coordinador_manana_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_coordinador_manana();
  scCssBlur(oThis);
}

function sc_form_sedes_coordinador_manana_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sedes_coordinador_tarde_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_coordinador_tarde();
  scCssBlur(oThis);
}

function sc_form_sedes_coordinador_tarde_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sedes_coordinador_nocturno_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_coordinador_nocturno();
  scCssBlur(oThis);
}

function sc_form_sedes_coordinador_nocturno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_sedes_coordinador_sabado_onblur(oThis, iSeqRow) {
  do_ajax_form_sedes_validate_coordinador_sabado();
  scCssBlur(oThis);
}

function sc_form_sedes_coordinador_sabado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

