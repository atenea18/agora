
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
  scEventControl_data["estatus" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["semestre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fecha_matricula" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_identificacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["numero_documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["genero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fecha_nacimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["anos_cumplidos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["telefono" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["etnia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["emai" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zona" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["celdas_vacias" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["estatus" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatus" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["semestre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["semestre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_matricula" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_matricula" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_identificacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_identificacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["genero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["genero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_nacimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_nacimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anos_cumplidos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anos_cumplidos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["etnia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["etnia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emai" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emai" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zona" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zona" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celdas_vacias" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celdas_vacias" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("celdas_vacias" + iSeq == fieldName) {
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
  $('#id_sc_field_estatus' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_estatus_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_control_list_estudiantes_estatus_onfocus(this, iSeqRow) });
  $('#id_sc_field_semestre' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_semestre_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_control_list_estudiantes_semestre_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_matricula' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_fecha_matricula_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_control_list_estudiantes_fecha_matricula_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_identificacion' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_tipo_identificacion_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_control_list_estudiantes_tipo_identificacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_documento' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_numero_documento_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_control_list_estudiantes_numero_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_genero' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_genero_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_control_list_estudiantes_genero_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_nacimiento' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_fecha_nacimiento_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_control_list_estudiantes_fecha_nacimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_anos_cumplidos' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_anos_cumplidos_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_control_list_estudiantes_anos_cumplidos_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_telefono_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_control_list_estudiantes_telefono_onfocus(this, iSeqRow) });
  $('#id_sc_field_etnia' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_etnia_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_list_estudiantes_etnia_onfocus(this, iSeqRow) });
  $('#id_sc_field_emai' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_emai_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_control_list_estudiantes_emai_onfocus(this, iSeqRow) });
  $('#id_sc_field_zona' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_zona_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_control_list_estudiantes_zona_onfocus(this, iSeqRow) });
  $('#id_sc_field_celdas_vacias' + iSeqRow).bind('blur', function() { sc_control_list_estudiantes_celdas_vacias_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_control_list_estudiantes_celdas_vacias_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_list_estudiantes_estatus_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_estatus();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_estatus_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_semestre_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_semestre();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_semestre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_fecha_matricula_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_fecha_matricula();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_fecha_matricula_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_tipo_identificacion_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_tipo_identificacion();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_tipo_identificacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_numero_documento_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_numero_documento();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_numero_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_genero_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_genero();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_genero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_fecha_nacimiento_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_fecha_nacimiento();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_fecha_nacimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_anos_cumplidos_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_anos_cumplidos();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_anos_cumplidos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_telefono_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_telefono();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_telefono_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_etnia_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_etnia();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_etnia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_emai_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_emai();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_emai_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_zona_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_zona();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_zona_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_list_estudiantes_celdas_vacias_onblur(oThis, iSeqRow) {
  do_ajax_control_list_estudiantes_validate_celdas_vacias();
  scCssBlur(oThis);
}

function sc_control_list_estudiantes_celdas_vacias_onfocus(oThis, iSeqRow) {
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

