
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
  scEventControl_data["id_grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_area" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_asign" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["periodo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cod_desemp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["gra" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["gru" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["are" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["asign" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["peri" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cod_de" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["posicion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
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
  if (scEventControl_data["id_area" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_area" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_asign" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_asign" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["periodo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["periodo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_desemp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_desemp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gra" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gra" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gru" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gru" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["are" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["are" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asign" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asign" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["peri" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["peri" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_de" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_de" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["posicion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posicion" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("gra" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("gru" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("are" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asign" + iSeq == fieldName) {
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
  $('#id_sc_field_id_grado' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_id_grado_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_rel_desemp_posicion_id_grado_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grupo' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_id_grupo_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_rel_desemp_posicion_id_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_area' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_id_area_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_rel_desemp_posicion_id_area_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_asign' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_id_asign_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_rel_desemp_posicion_id_asign_onfocus(this, iSeqRow) });
  $('#id_sc_field_periodo' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_periodo_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_rel_desemp_posicion_periodo_onfocus(this, iSeqRow) });
  $('#id_sc_field_posicion' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_posicion_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_rel_desemp_posicion_posicion_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_desemp' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_cod_desemp_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_rel_desemp_posicion_cod_desemp_onfocus(this, iSeqRow) });
  $('#id_sc_field_gra' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_gra_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_rel_desemp_posicion_gra_onfocus(this, iSeqRow) });
  $('#id_sc_field_gru' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_gru_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_rel_desemp_posicion_gru_onfocus(this, iSeqRow) });
  $('#id_sc_field_are' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_are_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_rel_desemp_posicion_are_onfocus(this, iSeqRow) });
  $('#id_sc_field_asign' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_asign_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_rel_desemp_posicion_asign_onfocus(this, iSeqRow) });
  $('#id_sc_field_peri' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_peri_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_rel_desemp_posicion_peri_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_de' + iSeqRow).bind('blur', function() { sc_form_rel_desemp_posicion_cod_de_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_rel_desemp_posicion_cod_de_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_rel_desemp_posicion_id_grado_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_id_grado();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_id_grado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_id_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_id_grupo();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_id_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_id_area_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_id_area();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_id_area_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_id_asign_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_id_asign();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_id_asign_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_periodo_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_periodo();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_periodo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_posicion_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_posicion();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_posicion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_cod_desemp_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_cod_desemp();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_cod_desemp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_gra_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_gra();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_gra_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_gru_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_gru();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_gru_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_are_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_are();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_are_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_asign_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_asign();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_asign_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_peri_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_peri();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_peri_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rel_desemp_posicion_cod_de_onblur(oThis, iSeqRow) {
  do_ajax_form_rel_desemp_posicion_mob_validate_cod_de();
  scCssBlur(oThis);
}

function sc_form_rel_desemp_posicion_cod_de_onfocus(oThis, iSeqRow) {
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
