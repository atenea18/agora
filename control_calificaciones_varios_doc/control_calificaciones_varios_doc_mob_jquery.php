
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
  scEventControl_data["sede" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["grado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["docente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["asignatura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["sede" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sede" + iSeqRow]["change"]) {
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
  if (scEventControl_data["docente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["docente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asignatura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asignatura" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("sede" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grupo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("docente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asignatura" + iSeq == fieldName) {
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
  $('#id_sc_field_grado' + iSeqRow).bind('blur', function() { sc_control_calificaciones_varios_doc_grado_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_calificaciones_varios_doc_grado_onfocus(this, iSeqRow) });
  $('#id_sc_field_grupo' + iSeqRow).bind('blur', function() { sc_control_calificaciones_varios_doc_grupo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_calificaciones_varios_doc_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_sede' + iSeqRow).bind('blur', function() { sc_control_calificaciones_varios_doc_sede_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_control_calificaciones_varios_doc_sede_onfocus(this, iSeqRow) });
  $('#id_sc_field_docente' + iSeqRow).bind('blur', function() { sc_control_calificaciones_varios_doc_docente_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_control_calificaciones_varios_doc_docente_onfocus(this, iSeqRow) });
  $('#id_sc_field_asignatura' + iSeqRow).bind('blur', function() { sc_control_calificaciones_varios_doc_asignatura_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_calificaciones_varios_doc_asignatura_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_calificaciones_varios_doc_grado_onblur(oThis, iSeqRow) {
  do_ajax_control_calificaciones_varios_doc_mob_validate_grado();
  scCssBlur(oThis);
}

function sc_control_calificaciones_varios_doc_grado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_calificaciones_varios_doc_grupo_onblur(oThis, iSeqRow) {
  do_ajax_control_calificaciones_varios_doc_mob_validate_grupo();
  scCssBlur(oThis);
}

function sc_control_calificaciones_varios_doc_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_calificaciones_varios_doc_sede_onblur(oThis, iSeqRow) {
  do_ajax_control_calificaciones_varios_doc_mob_validate_sede();
  scCssBlur(oThis);
}

function sc_control_calificaciones_varios_doc_sede_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_calificaciones_varios_doc_docente_onblur(oThis, iSeqRow) {
  do_ajax_control_calificaciones_varios_doc_mob_validate_docente();
  scCssBlur(oThis);
}

function sc_control_calificaciones_varios_doc_docente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_calificaciones_varios_doc_asignatura_onblur(oThis, iSeqRow) {
  do_ajax_control_calificaciones_varios_doc_mob_validate_asignatura();
  scCssBlur(oThis);
}

function sc_control_calificaciones_varios_doc_asignatura_onfocus(oThis, iSeqRow) {
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

