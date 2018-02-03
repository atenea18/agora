
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
  scEventControl_data["id_grupo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_area_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_asignatura_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_grado_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_nivel_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ihs_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pfa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_asig_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_1_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_2_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_3_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_4_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_final_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["entorno_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_estudiante_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_estudiante_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_grupo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grupo_" + iSeqRow]["change"]) {
    return true;
  }
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
  if (scEventControl_data["id_grado_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grado_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_nivel_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_nivel_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ihs_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ihs_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pfa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pfa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_asig_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_asig_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eval_1_per_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_1_per_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eval_2_per_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_2_per_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eval_3_per_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_3_per_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eval_4_per_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_4_per_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eval_final_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_final_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id_estudiante_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_id_estudiante__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_actividades_id_estudiante__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_actividades_id_estudiante__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grupo_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_id_grupo__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_t_evaluacion_actividades_id_grupo__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_evaluacion_actividades_id_grupo__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_area_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_id_area__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_evaluacion_actividades_id_area__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_evaluacion_actividades_id_area__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_asignatura_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_id_asignatura__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_actividades_id_asignatura__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_actividades_id_asignatura__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grado_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_id_grado__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_t_evaluacion_actividades_id_grado__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_evaluacion_actividades_id_grado__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_nivel_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_id_nivel__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_t_evaluacion_actividades_id_nivel__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_evaluacion_actividades_id_nivel__onfocus(this, iSeqRow) });
  $('#id_sc_field_ihs_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_ihs__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_actividades_ihs__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_actividades_ihs__onfocus(this, iSeqRow) });
  $('#id_sc_field_pfa_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_pfa__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_actividades_pfa__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_actividades_pfa__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_asig_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_tipo_asig__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_actividades_tipo_asig__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_actividades_tipo_asig__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_1_per_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_eval_1_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_actividades_eval_1_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_actividades_eval_1_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_2_per_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_eval_2_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_actividades_eval_2_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_actividades_eval_2_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_3_per_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_eval_3_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_actividades_eval_3_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_actividades_eval_3_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_4_per_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_eval_4_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_actividades_eval_4_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_actividades_eval_4_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_final_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_eval_final__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_actividades_eval_final__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_actividades_eval_final__onfocus(this, iSeqRow) });
  $('#id_sc_field_entorno_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_actividades_entorno__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_evaluacion_actividades_entorno__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_evaluacion_actividades_entorno__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_t_evaluacion_actividades_id_estudiante__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_id_estudiante_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_estudiante__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_estudiante__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_grupo__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_id_grupo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_grupo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_grupo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_area__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_id_area_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_area__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_area__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_asignatura__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_id_asignatura_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_asignatura__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_asignatura__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_grado__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_id_grado_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_grado__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_grado__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_nivel__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_id_nivel_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_nivel__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_id_nivel__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_ihs__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_ihs_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_ihs__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_ihs__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_pfa__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_pfa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_pfa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_pfa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_tipo_asig__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_tipo_asig_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_tipo_asig__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_tipo_asig__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_1_per__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_eval_1_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_1_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_1_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_2_per__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_eval_2_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_2_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_2_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_3_per__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_eval_3_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_3_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_3_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_4_per__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_eval_4_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_4_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_4_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_final__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_eval_final_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_final__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_eval_final__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_entorno__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_actividades_validate_entorno_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_actividades_entorno__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_actividades_entorno__onfocus(oThis, iSeqRow) {
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

