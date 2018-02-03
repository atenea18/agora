
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
  scEventControl_data["id_estudiante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_periodo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["entorno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["evaluacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_estudiante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_estudiante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_periodo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_periodo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["entorno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["entorno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["evaluacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["evaluacion" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
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
  $('#id_sc_field_id_estudiante' + iSeqRow).bind('blur', function() { sc_form_disciplina_id_estudiante_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_disciplina_id_estudiante_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_periodo' + iSeqRow).bind('blur', function() { sc_form_disciplina_id_periodo_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_disciplina_id_periodo_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grupo' + iSeqRow).bind('blur', function() { sc_form_disciplina_id_grupo_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_disciplina_id_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_entorno' + iSeqRow).bind('blur', function() { sc_form_disciplina_entorno_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_disciplina_entorno_onfocus(this, iSeqRow) });
  $('#id_sc_field_evaluacion' + iSeqRow).bind('blur', function() { sc_form_disciplina_evaluacion_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_disciplina_evaluacion_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_disciplina_id_estudiante_onblur(oThis, iSeqRow) {
  do_ajax_form_disciplina_validate_id_estudiante();
  scCssBlur(oThis);
}

function sc_form_disciplina_id_estudiante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_disciplina_id_periodo_onblur(oThis, iSeqRow) {
  do_ajax_form_disciplina_validate_id_periodo();
  scCssBlur(oThis);
}

function sc_form_disciplina_id_periodo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_disciplina_id_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_disciplina_validate_id_grupo();
  scCssBlur(oThis);
}

function sc_form_disciplina_id_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_disciplina_entorno_onblur(oThis, iSeqRow) {
  do_ajax_form_disciplina_validate_entorno();
  scCssBlur(oThis);
}

function sc_form_disciplina_entorno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_disciplina_evaluacion_onblur(oThis, iSeqRow) {
  do_ajax_form_disciplina_validate_evaluacion();
  scCssBlur(oThis);
  do_ajax_form_disciplina_event_evaluacion_onblur();
}

function sc_form_disciplina_evaluacion_onfocus(oThis, iSeqRow) {
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

