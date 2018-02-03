
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
  scEventControl_data["anyo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sede" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["jornada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["grado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estudiante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["especialidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pri_firma" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cargo_pri_firm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["seg_firma" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cargo_seg_firm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["encabezado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pie_pagina" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["anyo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anyo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sede" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sede" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jornada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jornada" + iSeqRow]["change"]) {
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
  if (scEventControl_data["estudiante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estudiante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["especialidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["especialidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pri_firma" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pri_firma" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo_pri_firm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo_pri_firm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["seg_firma" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["seg_firma" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo_seg_firm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo_seg_firm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["encabezado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["encabezado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pie_pagina" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pie_pagina" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estudiante" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("anyo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sede" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("jornada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grupo" + iSeq == fieldName) {
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
  $('#id_sc_field_sede' + iSeqRow).bind('blur', function() { sc_control_constancias_sede_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_control_constancias_sede_onfocus(this, iSeqRow) });
  $('#id_sc_field_anyo' + iSeqRow).bind('blur', function() { sc_control_constancias_anyo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_control_constancias_anyo_onfocus(this, iSeqRow) });
  $('#id_sc_field_jornada' + iSeqRow).bind('blur', function() { sc_control_constancias_jornada_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_control_constancias_jornada_onfocus(this, iSeqRow) });
  $('#id_sc_field_grado' + iSeqRow).bind('blur', function() { sc_control_constancias_grado_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_constancias_grado_onfocus(this, iSeqRow) });
  $('#id_sc_field_grupo' + iSeqRow).bind('blur', function() { sc_control_constancias_grupo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_constancias_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_pri_firma' + iSeqRow).bind('blur', function() { sc_control_constancias_pri_firma_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_constancias_pri_firma_onfocus(this, iSeqRow) });
  $('#id_sc_field_cargo_pri_firm' + iSeqRow).bind('blur', function() { sc_control_constancias_cargo_pri_firm_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_control_constancias_cargo_pri_firm_onfocus(this, iSeqRow) });
  $('#id_sc_field_seg_firma' + iSeqRow).bind('blur', function() { sc_control_constancias_seg_firma_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_constancias_seg_firma_onfocus(this, iSeqRow) });
  $('#id_sc_field_cargo_seg_firm' + iSeqRow).bind('blur', function() { sc_control_constancias_cargo_seg_firm_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_control_constancias_cargo_seg_firm_onfocus(this, iSeqRow) });
  $('#id_sc_field_encabezado' + iSeqRow).bind('blur', function() { sc_control_constancias_encabezado_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_constancias_encabezado_onfocus(this, iSeqRow) });
  $('#id_sc_field_pie_pagina' + iSeqRow).bind('blur', function() { sc_control_constancias_pie_pagina_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_constancias_pie_pagina_onfocus(this, iSeqRow) });
  $('#id_sc_field_estudiante' + iSeqRow).bind('blur', function() { sc_control_constancias_estudiante_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_constancias_estudiante_onfocus(this, iSeqRow) });
  $('#id_sc_field_especialidad' + iSeqRow).bind('blur', function() { sc_control_constancias_especialidad_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_control_constancias_especialidad_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_constancias_sede_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_sede();
  scCssBlur(oThis);
}

function sc_control_constancias_sede_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_anyo_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_anyo();
  scCssBlur(oThis);
}

function sc_control_constancias_anyo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_jornada_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_jornada();
  scCssBlur(oThis);
}

function sc_control_constancias_jornada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_grado_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_grado();
  scCssBlur(oThis);
}

function sc_control_constancias_grado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_grupo_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_grupo();
  scCssBlur(oThis);
}

function sc_control_constancias_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_pri_firma_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_pri_firma();
  scCssBlur(oThis);
}

function sc_control_constancias_pri_firma_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_cargo_pri_firm_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_cargo_pri_firm();
  scCssBlur(oThis);
}

function sc_control_constancias_cargo_pri_firm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_seg_firma_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_seg_firma();
  scCssBlur(oThis);
}

function sc_control_constancias_seg_firma_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_cargo_seg_firm_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_cargo_seg_firm();
  scCssBlur(oThis);
}

function sc_control_constancias_cargo_seg_firm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_encabezado_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_encabezado();
  scCssBlur(oThis);
}

function sc_control_constancias_encabezado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_pie_pagina_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_pie_pagina();
  scCssBlur(oThis);
}

function sc_control_constancias_pie_pagina_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_constancias_estudiante_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_estudiante();
  scCssBlur(oThis);
}

function sc_control_constancias_estudiante_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_control_constancias_especialidad_onblur(oThis, iSeqRow) {
  do_ajax_control_constancias_validate_especialidad();
  scCssBlur(oThis);
}

function sc_control_constancias_especialidad_onfocus(oThis, iSeqRow) {
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

