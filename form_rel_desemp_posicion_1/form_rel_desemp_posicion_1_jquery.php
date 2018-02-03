
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
  scEventControl_data["id_grado_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_grupo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_asign_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["periodo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["posicion_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cod_desemp_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["entorno_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_grado_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grado_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_grupo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grupo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_asign_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_asign_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["periodo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["periodo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["posicion_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posicion_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_desemp_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_desemp_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["entorno_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["entorno_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id_grado_' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_1_id_grado__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_rel_desemp_posicion_1_id_grado__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_rel_desemp_posicion_1_id_grado__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grupo_' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_1_id_grupo__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_rel_desemp_posicion_1_id_grupo__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_rel_desemp_posicion_1_id_grupo__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_asign_' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_1_id_asign__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_rel_desemp_posicion_1_id_asign__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_rel_desemp_posicion_1_id_asign__onfocus(this, iSeqRow) });
  $('#id_sc_field_periodo_' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_1_periodo__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_rel_desemp_posicion_1_periodo__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_rel_desemp_posicion_1_periodo__onfocus(this, iSeqRow) });
  $('#id_sc_field_posicion_' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_1_posicion__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_rel_desemp_posicion_1_posicion__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_rel_desemp_posicion_1_posicion__onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_desemp_' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_1_cod_desemp__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_rel_desemp_posicion_1_cod_desemp__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_rel_desemp_posicion_1_cod_desemp__onfocus(this, iSeqRow) });
  $('#id_sc_field_entorno_' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_1_entorno__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_rel_desemp_posicion_1_entorno__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_rel_desemp_posicion_1_entorno__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_rel_desemp_posicion_1_id_grado__onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_1_validate_id_grado_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_id_grado__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_rel_desemp_posicion_1_id_grado__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_id_grupo__onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_1_validate_id_grupo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_id_grupo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_rel_desemp_posicion_1_id_grupo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_id_asign__onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_1_validate_id_asign_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_id_asign__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_rel_desemp_posicion_1_id_asign__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_periodo__onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_1_validate_periodo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_periodo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_rel_desemp_posicion_1_periodo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_posicion__onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_1_validate_posicion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_posicion__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_rel_desemp_posicion_1_posicion__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_cod_desemp__onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_1_validate_cod_desemp_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_cod_desemp__onchange(oThis, iSeqRow) {
  lookup_cod_desemp_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_rel_desemp_posicion_1_cod_desemp__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_entorno__onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_1_validate_entorno_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_rel_desemp_posicion_1_entorno__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_rel_desemp_posicion_1_entorno__onfocus(oThis, iSeqRow) {
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

