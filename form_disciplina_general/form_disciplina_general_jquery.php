
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
  scEventControl_data["id_estudiante_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estatus_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["novedad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_1_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc12_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_estudiante_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_estudiante_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatus_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatus_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["novedad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["novedad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eval_1_per_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_1_per_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc12_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc12_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_estudiante_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_estudiante_' + iSeqRow).bind('blur', function() { sc_form_disciplina_general_id_estudiante__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_disciplina_general_id_estudiante__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_disciplina_general_id_estudiante__onfocus(this, iSeqRow) });
  $('#id_sc_field_novedad_' + iSeqRow).bind('blur', function() { sc_form_disciplina_general_novedad__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_disciplina_general_novedad__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_disciplina_general_novedad__onfocus(this, iSeqRow) });
  $('#id_sc_field_estatus_' + iSeqRow).bind('blur', function() { sc_form_disciplina_general_estatus__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_disciplina_general_estatus__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_disciplina_general_estatus__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_1_per_' + iSeqRow).bind('blur', function() { sc_form_disciplina_general_eval_1_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_disciplina_general_eval_1_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_disciplina_general_eval_1_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc12_' + iSeqRow).bind('blur', function() { sc_form_disciplina_general_dc12__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_disciplina_general_dc12__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_disciplina_general_dc12__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_disciplina_general_id_estudiante__onblur(oThis, iSeqRow) {
  do_ajax_form_disciplina_general_validate_id_estudiante_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_disciplina_general_id_estudiante__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_disciplina_general_id_estudiante__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_disciplina_general_novedad__onblur(oThis, iSeqRow) {
  do_ajax_form_disciplina_general_validate_novedad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_disciplina_general_novedad__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_disciplina_general_novedad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_disciplina_general_estatus__onblur(oThis, iSeqRow) {
  do_ajax_form_disciplina_general_validate_estatus_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_disciplina_general_estatus__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_disciplina_general_estatus__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_disciplina_general_eval_1_per__onblur(oThis, iSeqRow) {
  do_ajax_form_disciplina_general_validate_eval_1_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_disciplina_general_event_eval_1_per__onblur(iSeqRow);
}

function sc_form_disciplina_general_eval_1_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_disciplina_general_eval_1_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_disciplina_general_dc12__onblur(oThis, iSeqRow) {
  do_ajax_form_disciplina_general_validate_dc12_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_disciplina_general_dc12__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_disciplina_general_dc12__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

