
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
  scEventControl_data["modelo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["uno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tres" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cuatro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cinco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["seis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["siete" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ocho" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nueve" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["diez" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["once" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["doce" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["trece" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["catorce" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["quince" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["diez_y_seis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["diez_y_siete" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["diez_y_ocho" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["diez_y_nueve" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["veinte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["veintiuno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["veintidos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["veintitres" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["veinticuatro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["vinticinco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["modelo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tres" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tres" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cuatro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cuatro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cinco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cinco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["seis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["seis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["siete" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["siete" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ocho" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ocho" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nueve" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nueve" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diez" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diez" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["once" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["once" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["doce" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["doce" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trece" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trece" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["catorce" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["catorce" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["quince" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["quince" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diez_y_seis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diez_y_seis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diez_y_siete" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diez_y_siete" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diez_y_ocho" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diez_y_ocho" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diez_y_nueve" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diez_y_nueve" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["veinte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["veinte" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["veintiuno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["veintiuno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["veintidos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["veintidos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["veintitres" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["veintitres" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["veinticuatro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["veinticuatro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vinticinco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vinticinco" + iSeqRow]["change"]) {
    return true;
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
  $('#id_sc_field_modelo' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_modelo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_parametros_planilla_eval_modelo_onfocus(this, iSeqRow) });
  $('#id_sc_field_uno' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_uno_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_parametros_planilla_eval_uno_onfocus(this, iSeqRow) });
  $('#id_sc_field_dos' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_dos_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_parametros_planilla_eval_dos_onfocus(this, iSeqRow) });
  $('#id_sc_field_tres' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_tres_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_parametros_planilla_eval_tres_onfocus(this, iSeqRow) });
  $('#id_sc_field_cuatro' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_cuatro_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_parametros_planilla_eval_cuatro_onfocus(this, iSeqRow) });
  $('#id_sc_field_cinco' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_cinco_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_parametros_planilla_eval_cinco_onfocus(this, iSeqRow) });
  $('#id_sc_field_seis' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_seis_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_parametros_planilla_eval_seis_onfocus(this, iSeqRow) });
  $('#id_sc_field_siete' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_siete_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_parametros_planilla_eval_siete_onfocus(this, iSeqRow) });
  $('#id_sc_field_ocho' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_ocho_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_parametros_planilla_eval_ocho_onfocus(this, iSeqRow) });
  $('#id_sc_field_nueve' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_nueve_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_parametros_planilla_eval_nueve_onfocus(this, iSeqRow) });
  $('#id_sc_field_diez' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_diez_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_parametros_planilla_eval_diez_onfocus(this, iSeqRow) });
  $('#id_sc_field_once' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_once_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_parametros_planilla_eval_once_onfocus(this, iSeqRow) });
  $('#id_sc_field_doce' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_doce_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_parametros_planilla_eval_doce_onfocus(this, iSeqRow) });
  $('#id_sc_field_trece' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_trece_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_parametros_planilla_eval_trece_onfocus(this, iSeqRow) });
  $('#id_sc_field_catorce' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_catorce_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_parametros_planilla_eval_catorce_onfocus(this, iSeqRow) });
  $('#id_sc_field_quince' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_quince_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_parametros_planilla_eval_quince_onfocus(this, iSeqRow) });
  $('#id_sc_field_diez_y_seis' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_diez_y_seis_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_parametros_planilla_eval_diez_y_seis_onfocus(this, iSeqRow) });
  $('#id_sc_field_diez_y_siete' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_diez_y_siete_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_parametros_planilla_eval_diez_y_siete_onfocus(this, iSeqRow) });
  $('#id_sc_field_diez_y_ocho' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_diez_y_ocho_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_parametros_planilla_eval_diez_y_ocho_onfocus(this, iSeqRow) });
  $('#id_sc_field_diez_y_nueve' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_diez_y_nueve_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_parametros_planilla_eval_diez_y_nueve_onfocus(this, iSeqRow) });
  $('#id_sc_field_veinte' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_veinte_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_parametros_planilla_eval_veinte_onfocus(this, iSeqRow) });
  $('#id_sc_field_veintiuno' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_veintiuno_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_parametros_planilla_eval_veintiuno_onfocus(this, iSeqRow) });
  $('#id_sc_field_veintidos' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_veintidos_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_parametros_planilla_eval_veintidos_onfocus(this, iSeqRow) });
  $('#id_sc_field_veintitres' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_veintitres_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_parametros_planilla_eval_veintitres_onfocus(this, iSeqRow) });
  $('#id_sc_field_veinticuatro' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_veinticuatro_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_parametros_planilla_eval_veinticuatro_onfocus(this, iSeqRow) });
  $('#id_sc_field_vinticinco' + iSeqRow).bind('blur', function() { sc_form_parametros_planilla_eval_vinticinco_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_parametros_planilla_eval_vinticinco_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_parametros_planilla_eval_modelo_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_modelo();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_modelo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_uno_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_uno();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_uno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_dos_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_dos();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_dos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_tres_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_tres();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_tres_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_cuatro_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_cuatro();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_cuatro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_cinco_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_cinco();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_cinco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_seis_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_seis();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_seis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_siete_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_siete();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_siete_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_ocho_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_ocho();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_ocho_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_nueve_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_nueve();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_nueve_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_diez_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_diez();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_diez_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_once_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_once();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_once_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_doce_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_doce();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_doce_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_trece_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_trece();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_trece_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_catorce_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_catorce();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_catorce_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_quince_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_quince();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_quince_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_diez_y_seis_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_diez_y_seis();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_diez_y_seis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_diez_y_siete_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_diez_y_siete();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_diez_y_siete_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_diez_y_ocho_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_diez_y_ocho();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_diez_y_ocho_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_diez_y_nueve_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_diez_y_nueve();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_diez_y_nueve_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_veinte_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_veinte();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_veinte_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_veintiuno_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_veintiuno();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_veintiuno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_veintidos_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_veintidos();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_veintidos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_veintitres_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_veintitres();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_veintitres_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_veinticuatro_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_veinticuatro();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_veinticuatro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_parametros_planilla_eval_vinticinco_onblur(oThis, iSeqRow) {
  do_ajax_form_parametros_planilla_eval_mob_validate_vinticinco();
  scCssBlur(oThis);
}

function sc_form_parametros_planilla_eval_vinticinco_onfocus(oThis, iSeqRow) {
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
