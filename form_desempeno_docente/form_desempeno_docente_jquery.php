
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
  scEventControl_data["id_grado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["periodos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_area" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_asignatura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_clas_chs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["superior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["copia_desem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["alto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["basico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["refuerzo_academino" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["bajo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["recomendacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_grado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["periodos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["periodos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_area" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_area" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_asignatura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_asignatura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_clas_chs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_clas_chs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["superior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["superior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["copia_desem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["copia_desem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["alto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["alto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["basico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["basico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["refuerzo_academino" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["refuerzo_academino" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bajo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bajo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["recomendacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["recomendacion" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_grado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("periodos" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_area" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_asignatura" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_clas_chs" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("copia_desem" + iSeq == fieldName) {
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
  if ("copia_desem" + iFieldSeq == fieldName) {
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
  $('#id_sc_field_codigo' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_codigo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_desempeno_docente_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grado' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_id_grado_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_desempeno_docente_id_grado_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_desempeno_docente_id_grado_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_area' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_id_area_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_desempeno_docente_id_area_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_asignatura' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_id_asignatura_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_desempeno_docente_id_asignatura_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_clas_chs' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_id_clas_chs_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_desempeno_docente_id_clas_chs_onfocus(this, iSeqRow) });
  $('#id_sc_field_periodos' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_periodos_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_desempeno_docente_periodos_onfocus(this, iSeqRow) });
  $('#id_sc_field_superior' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_superior_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_desempeno_docente_superior_onfocus(this, iSeqRow) });
  $('#id_sc_field_alto' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_alto_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_desempeno_docente_alto_onfocus(this, iSeqRow) });
  $('#id_sc_field_basico' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_basico_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_desempeno_docente_basico_onfocus(this, iSeqRow) });
  $('#id_sc_field_refuerzo_academino' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_refuerzo_academino_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_desempeno_docente_refuerzo_academino_onfocus(this, iSeqRow) });
  $('#id_sc_field_bajo' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_bajo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_desempeno_docente_bajo_onfocus(this, iSeqRow) });
  $('#id_sc_field_recomendacion' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_recomendacion_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_desempeno_docente_recomendacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_copia_desem' + iSeqRow).bind('blur', function() { sc_form_desempeno_docente_copia_desem_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_desempeno_docente_copia_desem_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_desempeno_docente_copia_desem_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_desempeno_docente_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_codigo();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_id_grado_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_id_grado();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_id_grado_onchange(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_refresh_id_grado();
}

function sc_form_desempeno_docente_id_grado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_id_area_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_id_area();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_id_area_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_id_asignatura_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_id_asignatura();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_id_asignatura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_id_clas_chs_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_id_clas_chs();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_id_clas_chs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_periodos_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_periodos();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_periodos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_superior_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_superior();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_superior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_alto_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_alto();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_alto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_basico_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_basico();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_basico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_refuerzo_academino_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_refuerzo_academino();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_refuerzo_academino_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_bajo_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_bajo();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_bajo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_recomendacion_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_recomendacion();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_recomendacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_desempeno_docente_copia_desem_onblur(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_validate_copia_desem();
  scCssBlur(oThis);
}

function sc_form_desempeno_docente_copia_desem_onchange(oThis, iSeqRow) {
  do_ajax_form_desempeno_docente_event_copia_desem_onchange();
}

function sc_form_desempeno_docente_copia_desem_onfocus(oThis, iSeqRow) {
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

