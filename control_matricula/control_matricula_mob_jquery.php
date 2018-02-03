
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
  scEventControl_data["tipo_impresion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["grado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estudiante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tipo_impresion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_impresion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estudiante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estudiante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estudiante" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo_impresion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grupo" + iSeq == fieldName) {
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
  if ("tipo_impresion" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_tipo_impresion' + iSeqRow).bind('blur', function() { sc_control_matricula_tipo_impresion_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_control_matricula_tipo_impresion_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_control_matricula_tipo_impresion_onfocus(this, iSeqRow) });
  $('#id_sc_field_grado' + iSeqRow).bind('blur', function() { sc_control_matricula_grado_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_matricula_grado_onfocus(this, iSeqRow) });
  $('#id_sc_field_grupo' + iSeqRow).bind('blur', function() { sc_control_matricula_grupo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_matricula_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_estudiante' + iSeqRow).bind('blur', function() { sc_control_matricula_estudiante_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_matricula_estudiante_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_matricula_tipo_impresion_onblur(oThis, iSeqRow) {
  do_ajax_control_matricula_mob_validate_tipo_impresion();
  scCssBlur(oThis);
}

function sc_control_matricula_tipo_impresion_onchange(oThis, iSeqRow) {
  do_ajax_control_matricula_mob_event_tipo_impresion_onchange();
}

function sc_control_matricula_tipo_impresion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_matricula_grado_onblur(oThis, iSeqRow) {
  do_ajax_control_matricula_mob_validate_grado();
  scCssBlur(oThis);
}

function sc_control_matricula_grado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_matricula_grupo_onblur(oThis, iSeqRow) {
  do_ajax_control_matricula_mob_validate_grupo();
  scCssBlur(oThis);
}

function sc_control_matricula_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_matricula_estudiante_onblur(oThis, iSeqRow) {
  do_ajax_control_matricula_mob_validate_estudiante();
  scCssBlur(oThis);
}

function sc_control_matricula_estudiante_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

