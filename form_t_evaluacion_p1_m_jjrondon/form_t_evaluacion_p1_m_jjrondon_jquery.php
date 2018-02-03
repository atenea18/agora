
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
  scEventControl_data["asienta_inasistencias_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["inasistencia_p1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_1_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc5_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
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
  if (scEventControl_data["asienta_inasistencias_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asienta_inasistencias_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inasistencia_p1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inasistencia_p1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eval_1_per_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_1_per_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc5_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc5_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id_estudiante_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_id_estudiante__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_id_estudiante__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_id_estudiante__onfocus(this, iSeqRow) });
  $('#id_sc_field_novedad_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_novedad__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_novedad__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_novedad__onfocus(this, iSeqRow) });
  $('#id_sc_field_estatus_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_estatus__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_estatus__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_estatus__onfocus(this, iSeqRow) });
  $('#id_sc_field_inasistencia_p1_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_inasistencia_p1__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_inasistencia_p1__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_inasistencia_p1__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_1_per_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_eval_1_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_eval_1_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_eval_1_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc1_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc1__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc1__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc1__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc2_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc2__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc2__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc2__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc3__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc3__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc4__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc4__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc5_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc5__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc5__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_dc5__onfocus(this, iSeqRow) });
  $('#id_sc_field_asienta_inasistencias_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_p1_m_jjrondon_asienta_inasistencias__onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_form_t_evaluacion_p1_m_jjrondon_asienta_inasistencias__onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_t_evaluacion_p1_m_jjrondon_asienta_inasistencias__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_t_evaluacion_p1_m_jjrondon_id_estudiante__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_id_estudiante_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_id_estudiante__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_id_estudiante__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_novedad__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_novedad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_novedad__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_novedad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_estatus__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_estatus_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_estatus__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_estatus__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_inasistencia_p1__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_inasistencia_p1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_inasistencia_p1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_inasistencia_p1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_eval_1_per__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_eval_1_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_eval_1_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_eval_1_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc1__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_dc1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_t_evaluacion_p1_m_jjrondon_event_dc1__onblur(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc2__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_dc2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_t_evaluacion_p1_m_jjrondon_event_dc2__onblur(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_dc3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_t_evaluacion_p1_m_jjrondon_event_dc3__onblur(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_dc4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_t_evaluacion_p1_m_jjrondon_event_dc4__onblur(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc5__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_dc5_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc5__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_dc5__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_asienta_inasistencias__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_p1_m_jjrondon_validate_asienta_inasistencias_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_asienta_inasistencias__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_p1_m_jjrondon_asienta_inasistencias__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function scJQPopupAdd(iSeqRow) {
  $('.scFormPopupBubble' + iSeqRow).each(function() {
    var distance = 10;
    var time = 250;
    var hideDelay = 500;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('.scFormPopupTrigger', this);
    var info = $('.scFormPopup', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      if (beingShown || shown) {
        // don't trigger the animation again
        return;
      } else {
        // reset position of info box
        beingShown = true;
        info.css({
          top: trigger.position().top - (info.height() - trigger.height()),
          left: trigger.position().left - ((info.width() - trigger.width()) / 2),
          display: 'block'
        }).animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          beingShown = false;
          shown = true;
        });
      }
      return false;
      }).mouseout(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      hideDelayTimer = setTimeout(function() {
        hideDelayTimer = null;
        info.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function() {
          shown = false;
          info.css('display', 'none');
        });
      }, hideDelay);
      return false;
    });
  });
} // scJQPopupAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

