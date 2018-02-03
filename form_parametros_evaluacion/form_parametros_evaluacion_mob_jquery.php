
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
  scEventControl_data["id_modelo_eval" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["etiqueta_grupo_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["porcentaje_grupo1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["etiqueta_grupo_2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["criterio_1_grupo2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["criterio_2_grupo2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["criterio_3_grupo2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["criterio_4_grupo2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["criterio_5_grupo2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["porcentaje_grupo2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["etiqueta_grupo_3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["criterio_1_grupo3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["criterio_2_grupo3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["criterio_3_grupo3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["criterio_4_grupo3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["criterio_5_grupo3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["porcentaje_grupo3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["porcentaje_autoevaluacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["etiqtiqueta_autoevaluacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_modelo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_modelo_eval" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_modelo_eval" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["etiqueta_grupo_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["etiqueta_grupo_1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcentaje_grupo1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcentaje_grupo1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["etiqueta_grupo_2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["etiqueta_grupo_2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["criterio_1_grupo2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["criterio_1_grupo2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["criterio_2_grupo2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["criterio_2_grupo2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["criterio_3_grupo2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["criterio_3_grupo2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["criterio_4_grupo2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["criterio_4_grupo2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["criterio_5_grupo2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["criterio_5_grupo2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcentaje_grupo2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcentaje_grupo2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["etiqueta_grupo_3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["etiqueta_grupo_3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["criterio_1_grupo3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["criterio_1_grupo3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["criterio_2_grupo3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["criterio_2_grupo3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["criterio_3_grupo3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["criterio_3_grupo3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["criterio_4_grupo3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["criterio_4_grupo3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["criterio_5_grupo3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["criterio_5_grupo3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcentaje_grupo3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcentaje_grupo3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcentaje_autoevaluacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcentaje_autoevaluacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["etiqtiqueta_autoevaluacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["etiqtiqueta_autoevaluacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_modelo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_modelo" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_modelo" + iSeq == fieldName) {
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
  $('#id_sc_field_id_modelo_eval' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_id_modelo_eval_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_parametros_evaluacion_id_modelo_eval_onfocus(this, iSeqRow) });
  $('#id_sc_field_etiqueta_grupo_1' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_etiqueta_grupo_1_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_parametros_evaluacion_etiqueta_grupo_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcentaje_grupo1' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_porcentaje_grupo1_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_porcentaje_grupo1_onfocus(this, iSeqRow) });
  $('#id_sc_field_etiqueta_grupo_2' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_etiqueta_grupo_2_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_parametros_evaluacion_etiqueta_grupo_2_onfocus(this, iSeqRow) });
  $('#id_sc_field_criterio_1_grupo2' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_criterio_1_grupo2_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_criterio_1_grupo2_onfocus(this, iSeqRow) });
  $('#id_sc_field_criterio_2_grupo2' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_criterio_2_grupo2_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_criterio_2_grupo2_onfocus(this, iSeqRow) });
  $('#id_sc_field_criterio_3_grupo2' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_criterio_3_grupo2_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_criterio_3_grupo2_onfocus(this, iSeqRow) });
  $('#id_sc_field_criterio_4_grupo2' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_criterio_4_grupo2_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_criterio_4_grupo2_onfocus(this, iSeqRow) });
  $('#id_sc_field_criterio_5_grupo2' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_criterio_5_grupo2_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_criterio_5_grupo2_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcentaje_grupo2' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_porcentaje_grupo2_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_porcentaje_grupo2_onfocus(this, iSeqRow) });
  $('#id_sc_field_etiqueta_grupo_3' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_etiqueta_grupo_3_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_parametros_evaluacion_etiqueta_grupo_3_onfocus(this, iSeqRow) });
  $('#id_sc_field_criterio_1_grupo3' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_criterio_1_grupo3_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_criterio_1_grupo3_onfocus(this, iSeqRow) });
  $('#id_sc_field_criterio_2_grupo3' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_criterio_2_grupo3_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_criterio_2_grupo3_onfocus(this, iSeqRow) });
  $('#id_sc_field_criterio_3_grupo3' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_criterio_3_grupo3_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_criterio_3_grupo3_onfocus(this, iSeqRow) });
  $('#id_sc_field_criterio_4_grupo3' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_criterio_4_grupo3_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_criterio_4_grupo3_onfocus(this, iSeqRow) });
  $('#id_sc_field_criterio_5_grupo3' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_criterio_5_grupo3_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_criterio_5_grupo3_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcentaje_grupo3' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_porcentaje_grupo3_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_parametros_evaluacion_porcentaje_grupo3_onfocus(this, iSeqRow) });
  $('#id_sc_field_etiqtiqueta_autoevaluacion' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_etiqtiqueta_autoevaluacion_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_parametros_evaluacion_etiqtiqueta_autoevaluacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcentaje_autoevaluacion' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_porcentaje_autoevaluacion_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_parametros_evaluacion_porcentaje_autoevaluacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_modelo' + iSeqRow).bind('blur', function() { sc_form_parametros_evaluacion_id_modelo_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_parametros_evaluacion_id_modelo_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_parametros_evaluacion_id_modelo_eval_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_id_modelo_eval();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_id_modelo_eval_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_etiqueta_grupo_1_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_etiqueta_grupo_1();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_etiqueta_grupo_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_porcentaje_grupo1_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_porcentaje_grupo1();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_porcentaje_grupo1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_etiqueta_grupo_2_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_etiqueta_grupo_2();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_etiqueta_grupo_2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_criterio_1_grupo2_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_criterio_1_grupo2();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_criterio_1_grupo2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_criterio_2_grupo2_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_criterio_2_grupo2();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_criterio_2_grupo2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_criterio_3_grupo2_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_criterio_3_grupo2();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_criterio_3_grupo2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_criterio_4_grupo2_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_criterio_4_grupo2();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_criterio_4_grupo2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_criterio_5_grupo2_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_criterio_5_grupo2();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_criterio_5_grupo2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_porcentaje_grupo2_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_porcentaje_grupo2();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_porcentaje_grupo2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_etiqueta_grupo_3_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_etiqueta_grupo_3();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_etiqueta_grupo_3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_criterio_1_grupo3_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_criterio_1_grupo3();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_criterio_1_grupo3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_criterio_2_grupo3_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_criterio_2_grupo3();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_criterio_2_grupo3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_criterio_3_grupo3_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_criterio_3_grupo3();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_criterio_3_grupo3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_criterio_4_grupo3_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_criterio_4_grupo3();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_criterio_4_grupo3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_criterio_5_grupo3_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_criterio_5_grupo3();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_criterio_5_grupo3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_porcentaje_grupo3_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_porcentaje_grupo3();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_porcentaje_grupo3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_etiqtiqueta_autoevaluacion_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_etiqtiqueta_autoevaluacion();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_etiqtiqueta_autoevaluacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_porcentaje_autoevaluacion_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_porcentaje_autoevaluacion();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_porcentaje_autoevaluacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_evaluacion_id_modelo_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_evaluacion_mob_validate_id_modelo();
  scCssBlur(oThis);
}

function sc_form_parametros_evaluacion_id_modelo_onfocus(oThis, iSeqRow) {
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

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
