
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
  scEventControl_data["id_area_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_asignatura_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["intensidad_horaria_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["peso_asig_fre_area_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_docente_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_asig_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_area_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_area_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_asignatura_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_asignatura_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["intensidad_horaria_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["intensidad_horaria_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["peso_asig_fre_area_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["peso_asig_fre_area_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_docente_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_docente_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_asig_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_asig_" + iSeqRow]["change"]) {
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
  if ("id_area_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_asignatura_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_docente_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_grupo_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_area_' + iSeqRow).bind('blur', function() { sc_form_grupo_x_asig_x_doce_id_area__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_grupo_x_asig_x_doce_id_area__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_grupo_x_asig_x_doce_id_area__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_asignatura_' + iSeqRow).bind('blur', function() { sc_form_grupo_x_asig_x_doce_id_asignatura__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_grupo_x_asig_x_doce_id_asignatura__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_grupo_x_asig_x_doce_id_asignatura__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_docente_' + iSeqRow).bind('blur', function() { sc_form_grupo_x_asig_x_doce_id_docente__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_grupo_x_asig_x_doce_id_docente__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_grupo_x_asig_x_doce_id_docente__onfocus(this, iSeqRow) });
  $('#id_sc_field_intensidad_horaria_' + iSeqRow).bind('blur', function() { sc_form_grupo_x_asig_x_doce_intensidad_horaria__onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_grupo_x_asig_x_doce_intensidad_horaria__onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_grupo_x_asig_x_doce_intensidad_horaria__onfocus(this, iSeqRow) });
  $('#id_sc_field_peso_asig_fre_area_' + iSeqRow).bind('blur', function() { sc_form_grupo_x_asig_x_doce_peso_asig_fre_area__onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_grupo_x_asig_x_doce_peso_asig_fre_area__onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_grupo_x_asig_x_doce_peso_asig_fre_area__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_asig_' + iSeqRow).bind('blur', function() { sc_form_grupo_x_asig_x_doce_tipo_asig__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_grupo_x_asig_x_doce_tipo_asig__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_grupo_x_asig_x_doce_tipo_asig__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_grupo_x_asig_x_doce_id_area__onblur(oThis, iSeqRow) {
  do_ajax_form_grupo_x_asig_x_doce_validate_id_area_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_id_area__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_id_area__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_id_asignatura__onblur(oThis, iSeqRow) {
  do_ajax_form_grupo_x_asig_x_doce_validate_id_asignatura_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_id_asignatura__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_id_asignatura__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_id_docente__onblur(oThis, iSeqRow) {
  do_ajax_form_grupo_x_asig_x_doce_validate_id_docente_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_id_docente__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_id_docente__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_intensidad_horaria__onblur(oThis, iSeqRow) {
  do_ajax_form_grupo_x_asig_x_doce_validate_intensidad_horaria_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_intensidad_horaria__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_intensidad_horaria__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_peso_asig_fre_area__onblur(oThis, iSeqRow) {
  do_ajax_form_grupo_x_asig_x_doce_validate_peso_asig_fre_area_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_peso_asig_fre_area__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_peso_asig_fre_area__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_tipo_asig__onblur(oThis, iSeqRow) {
  do_ajax_form_grupo_x_asig_x_doce_validate_tipo_asig_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_tipo_asig__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_grupo_x_asig_x_doce_tipo_asig__onfocus(oThis, iSeqRow) {
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

