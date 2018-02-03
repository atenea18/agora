
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
  scEventControl_data["eval_3_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc1_3p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc2_3p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc3_3p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc4_3p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc5_3p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_dc3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp1_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp2_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp3_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp4_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_0_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_dp3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds1_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds2_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds3_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds4_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds5_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_ds3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["val_acumulada_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["val_requerida_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
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
  if (scEventControl_data["eval_3_per_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_3_per_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc1_3p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc1_3p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc2_3p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc2_3p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc3_3p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc3_3p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc4_3p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc4_3p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc5_3p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc5_3p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_dc3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_dc3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp1_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp1_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp2_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp2_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp3_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp3_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp4_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp4_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_dp3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_dp3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds1_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds1_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds2_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds2_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds3_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds3_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds4_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds4_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds5_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds5_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_ds3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_ds3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["val_acumulada_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["val_acumulada_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["val_requerida_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["val_requerida_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id_estudiante_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_id_estudiante__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_p3_id_estudiante__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_p3_id_estudiante__onfocus(this, iSeqRow) });
  $('#id_sc_field_novedad_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_novedad__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_evaluacion_p3_novedad__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_evaluacion_p3_novedad__onfocus(this, iSeqRow) });
  $('#id_sc_field_estatus_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_estatus__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_evaluacion_p3_estatus__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_evaluacion_p3_estatus__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_3_per_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_eval_3_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_p3_eval_3_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_p3_eval_3_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc1_3p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_dc1_3p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_dc1_3p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_dc1_3p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc2_3p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_dc2_3p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_dc2_3p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_dc2_3p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc3_3p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_dc3_3p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_dc3_3p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_dc3_3p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc4_3p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_dc4_3p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_dc4_3p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_dc4_3p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc5_3p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_dc5_3p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_dc5_3p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_dc5_3p__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_dc3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_pcent_dc3__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_p3_pcent_dc3__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_p3_pcent_dc3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds1_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_ds1_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_ds1_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_ds1_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds2_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_ds2_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_ds2_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_ds2_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds3_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_ds3_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_ds3_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_ds3_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds4_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_ds4_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_ds4_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_ds4_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds5_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_ds5_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_ds5_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_ds5_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_ds3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_pcent_ds3__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_p3_pcent_ds3__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_p3_pcent_ds3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp1_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_dp1_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_dp1_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_dp1_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp2_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_dp2_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_dp2_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_dp2_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp3_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_dp3_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_dp3_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_dp3_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp4_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_dp4_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_p3_dp4_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_p3_dp4_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_sc_field_0__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_p3_sc_field_0__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_p3_sc_field_0__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_dp3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_pcent_dp3__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_p3_pcent_dp3__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_p3_pcent_dp3__onfocus(this, iSeqRow) });
  $('#id_sc_field_val_acumulada_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_val_acumulada__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_p3_val_acumulada__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_p3_val_acumulada__onfocus(this, iSeqRow) });
  $('#id_sc_field_val_requerida_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p3_val_requerida__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_p3_val_requerida__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_p3_val_requerida__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_t_evaluacion_p3_id_estudiante__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_id_estudiante_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_id_estudiante__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_id_estudiante__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_novedad__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_novedad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_novedad__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_novedad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_estatus__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_estatus_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_estatus__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_estatus__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_eval_3_per__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_eval_3_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_eval_3_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_eval_3_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dc1_3p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_dc1_3p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dc1_3p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_dc1_3p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dc2_3p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_dc2_3p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dc2_3p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_dc2_3p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dc3_3p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_dc3_3p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dc3_3p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_dc3_3p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dc4_3p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_dc4_3p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dc4_3p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_dc4_3p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dc5_3p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_dc5_3p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dc5_3p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_dc5_3p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_pcent_dc3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_pcent_dc3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_pcent_dc3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_pcent_dc3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_ds1_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_ds1_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_ds1_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_ds1_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_ds2_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_ds2_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_ds2_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_ds2_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_ds3_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_ds3_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_ds3_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_ds3_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_ds4_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_ds4_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_ds4_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_ds4_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_ds5_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_ds5_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_ds5_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_ds5_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_pcent_ds3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_pcent_ds3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_pcent_ds3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_pcent_ds3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dp1_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_dp1_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dp1_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_dp1_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dp2_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_dp2_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dp2_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_dp2_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dp3_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_dp3_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dp3_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_dp3_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dp4_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_dp4_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_dp4_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_dp4_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_sc_field_0__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_sc_field_0_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_sc_field_0__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_sc_field_0__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_pcent_dp3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_pcent_dp3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_pcent_dp3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_pcent_dp3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_val_acumulada__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_val_acumulada_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_val_acumulada__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_val_acumulada__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_val_requerida__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p3_validate_val_requerida_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p3_val_requerida__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p3_val_requerida__onfocus(oThis, iSeqRow) {
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

