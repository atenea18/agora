
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
  scEventControl_data["id_sede" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_jornada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_grado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_estudent" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_sede" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_sede" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_jornada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_jornada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_grado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_estudent" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_estudent" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_estudent" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_sede" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_jornada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_grado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_grupo" + iSeq == fieldName) {
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
  $('#id_sc_field_id_sede' + iSeqRow).bind('blur', function() { sc_control_imp_boletines_id_sede_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_control_imp_boletines_id_sede_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_jornada' + iSeqRow).bind('blur', function() { sc_control_imp_boletines_id_jornada_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_imp_boletines_id_jornada_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grado' + iSeqRow).bind('blur', function() { sc_control_imp_boletines_id_grado_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_control_imp_boletines_id_grado_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grupo' + iSeqRow).bind('blur', function() { sc_control_imp_boletines_id_grupo_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_control_imp_boletines_id_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_estudent' + iSeqRow).bind('blur', function() { sc_control_imp_boletines_id_estudent_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_imp_boletines_id_estudent_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha' + iSeqRow).bind('blur', function() { sc_control_imp_boletines_fecha_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_imp_boletines_fecha_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_imp_boletines_id_sede_onblur(oThis, iSeqRow) {
  do_ajax_control_imp_boletines_mob_validate_id_sede();
  scCssBlur(oThis);
}

function sc_control_imp_boletines_id_sede_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_imp_boletines_id_jornada_onblur(oThis, iSeqRow) {
  do_ajax_control_imp_boletines_mob_validate_id_jornada();
  scCssBlur(oThis);
}

function sc_control_imp_boletines_id_jornada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_imp_boletines_id_grado_onblur(oThis, iSeqRow) {
  do_ajax_control_imp_boletines_mob_validate_id_grado();
  scCssBlur(oThis);
}

function sc_control_imp_boletines_id_grado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_imp_boletines_id_grupo_onblur(oThis, iSeqRow) {
  do_ajax_control_imp_boletines_mob_validate_id_grupo();
  scCssBlur(oThis);
}

function sc_control_imp_boletines_id_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_imp_boletines_id_estudent_onblur(oThis, iSeqRow) {
  do_ajax_control_imp_boletines_mob_validate_id_estudent();
  scCssBlur(oThis);
}

function sc_control_imp_boletines_id_estudent_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_control_imp_boletines_fecha_onblur(oThis, iSeqRow) {
  do_ajax_control_imp_boletines_mob_validate_fecha();
  scCssBlur(oThis);
}

function sc_control_imp_boletines_fecha_onfocus(oThis, iSeqRow) {
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

