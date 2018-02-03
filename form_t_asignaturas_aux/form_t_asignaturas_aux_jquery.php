
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
  scEventControl_data["id_asignatura_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["asignatura_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["n_simpl_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_asignatura_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_asignatura_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asignatura_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asignatura_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["n_simpl_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["n_simpl_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id_asignatura_' + iSeqRow).bind('blur', function() { sc_form_t_asignaturas_aux_id_asignatura__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_asignaturas_aux_id_asignatura__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_asignaturas_aux_id_asignatura__onfocus(this, iSeqRow) });
  $('#id_sc_field_asignatura_' + iSeqRow).bind('blur', function() { sc_form_t_asignaturas_aux_asignatura__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_asignaturas_aux_asignatura__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_asignaturas_aux_asignatura__onfocus(this, iSeqRow) });
  $('#id_sc_field_n_simpl_' + iSeqRow).bind('blur', function() { sc_form_t_asignaturas_aux_n_simpl__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_asignaturas_aux_n_simpl__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_asignaturas_aux_n_simpl__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_t_asignaturas_aux_id_asignatura__onblur(oThis, iSeqRow) {
  do_ajax_form_t_asignaturas_aux_validate_id_asignatura_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_asignaturas_aux_id_asignatura__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_asignaturas_aux_id_asignatura__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_asignaturas_aux_asignatura__onblur(oThis, iSeqRow) {
  do_ajax_form_t_asignaturas_aux_validate_asignatura_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_asignaturas_aux_asignatura__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_asignaturas_aux_asignatura__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_asignaturas_aux_n_simpl__onblur(oThis, iSeqRow) {
  do_ajax_form_t_asignaturas_aux_validate_n_simpl_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_asignaturas_aux_n_simpl__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_asignaturas_aux_n_simpl__onfocus(oThis, iSeqRow) {
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

