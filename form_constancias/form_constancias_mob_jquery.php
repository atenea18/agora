
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
  scEventControl_data["tipo_impresion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["grado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estudiante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["primera_firma" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["segunda_firma" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cargo_pri_firma" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cargo_seg_firma" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["encabezado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pie_pagina" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tipo_impresion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_impresion" + iSeqRow]["change"]) {
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
  if (scEventControl_data["primera_firma" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["primera_firma" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["segunda_firma" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["segunda_firma" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo_pri_firma" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo_pri_firma" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cargo_seg_firma" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cargo_seg_firma" + iSeqRow]["change"]) {
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
  if ("tipo_impresion" + iSeq == fieldName) {
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
  if ("tipo_impresion" + iFieldSeq == fieldName) {
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
  $('#id_sc_field_primera_firma' + iSeqRow).bind('blur', function() { sc_form_constancias_primera_firma_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_constancias_primera_firma_onfocus(this, iSeqRow) });
  $('#id_sc_field_cargo_pri_firma' + iSeqRow).bind('blur', function() { sc_form_constancias_cargo_pri_firma_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_constancias_cargo_pri_firma_onfocus(this, iSeqRow) });
  $('#id_sc_field_segunda_firma' + iSeqRow).bind('blur', function() { sc_form_constancias_segunda_firma_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_constancias_segunda_firma_onfocus(this, iSeqRow) });
  $('#id_sc_field_cargo_seg_firma' + iSeqRow).bind('blur', function() { sc_form_constancias_cargo_seg_firma_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_constancias_cargo_seg_firma_onfocus(this, iSeqRow) });
  $('#id_sc_field_encabezado' + iSeqRow).bind('blur', function() { sc_form_constancias_encabezado_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_constancias_encabezado_onfocus(this, iSeqRow) });
  $('#id_sc_field_pie_pagina' + iSeqRow).bind('blur', function() { sc_form_constancias_pie_pagina_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_constancias_pie_pagina_onfocus(this, iSeqRow) });
  $('#id_sc_field_grado' + iSeqRow).bind('blur', function() { sc_form_constancias_grado_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_constancias_grado_onfocus(this, iSeqRow) });
  $('#id_sc_field_grupo' + iSeqRow).bind('blur', function() { sc_form_constancias_grupo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_constancias_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_estudiante' + iSeqRow).bind('blur', function() { sc_form_constancias_estudiante_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_constancias_estudiante_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_impresion' + iSeqRow).bind('blur', function() { sc_form_constancias_tipo_impresion_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_constancias_tipo_impresion_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_constancias_tipo_impresion_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_constancias_primera_firma_onblur(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_validate_primera_firma();
  scCssBlur(oThis);
}

function sc_form_constancias_primera_firma_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_constancias_cargo_pri_firma_onblur(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_validate_cargo_pri_firma();
  scCssBlur(oThis);
}

function sc_form_constancias_cargo_pri_firma_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_constancias_segunda_firma_onblur(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_validate_segunda_firma();
  scCssBlur(oThis);
}

function sc_form_constancias_segunda_firma_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_constancias_cargo_seg_firma_onblur(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_validate_cargo_seg_firma();
  scCssBlur(oThis);
}

function sc_form_constancias_cargo_seg_firma_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_constancias_encabezado_onblur(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_validate_encabezado();
  scCssBlur(oThis);
}

function sc_form_constancias_encabezado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_constancias_pie_pagina_onblur(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_validate_pie_pagina();
  scCssBlur(oThis);
}

function sc_form_constancias_pie_pagina_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_constancias_grado_onblur(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_validate_grado();
  scCssBlur(oThis);
}

function sc_form_constancias_grado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_constancias_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_validate_grupo();
  scCssBlur(oThis);
}

function sc_form_constancias_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_constancias_estudiante_onblur(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_validate_estudiante();
  scCssBlur(oThis);
}

function sc_form_constancias_estudiante_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_constancias_tipo_impresion_onblur(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_validate_tipo_impresion();
  scCssBlur(oThis);
}

function sc_form_constancias_tipo_impresion_onchange(oThis, iSeqRow) {
  do_ajax_form_constancias_mob_event_tipo_impresion_onchange();
}

function sc_form_constancias_tipo_impresion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
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
