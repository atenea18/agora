
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'id_sede':
      case 'tipo_educ':
      case 'id_grado':
      case 'nombre_grupo':
      case 'jornada':
      case 'modalidad':
      case 'id_director_grupo':
      case 'calendario':
      case 'entorno':
      case 'relleno':
      case 'num_estudiantes_grupo':
      case 'estudiante':
        sc_exib_ocult_pag('form_t_grupos_taller_mob_form0');
        break;
      case 'asig_academ':
        sc_exib_ocult_pag('form_t_grupos_taller_mob_form1');
        break;
    }
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
  scEventControl_data["tipo_educ" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_grado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nombre_grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["jornada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["modalidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_director_grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["calendario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["entorno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["relleno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["num_estudiantes_grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estudiante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["asig_academ" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_sede" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_sede" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_educ" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_educ" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_grado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_grupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jornada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jornada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modalidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modalidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_director_grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_director_grupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["calendario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["calendario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["entorno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["entorno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["relleno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["relleno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["num_estudiantes_grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["num_estudiantes_grupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estudiante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estudiante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asig_academ" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asig_academ" + iSeqRow]["change"]) {
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
  if ("tipo_educ" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_grado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("jornada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("modalidad" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_director_grupo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("calendario" + iSeq == fieldName) {
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
  $('#id_sc_field_id_grado' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_id_grado_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_grupos_taller_id_grado_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_sede' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_id_sede_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_grupos_taller_id_sede_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_director_grupo' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_id_director_grupo_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_t_grupos_taller_id_director_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_grupo' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_nombre_grupo_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_t_grupos_taller_nombre_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_jornada' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_jornada_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_grupos_taller_jornada_onfocus(this, iSeqRow) });
  $('#id_sc_field_modalidad' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_modalidad_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_grupos_taller_modalidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_calendario' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_calendario_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_grupos_taller_calendario_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_educ' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_tipo_educ_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_t_grupos_taller_tipo_educ_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_grupos_taller_tipo_educ_onfocus(this, iSeqRow) });
  $('#id_sc_field_entorno' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_entorno_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_grupos_taller_entorno_onfocus(this, iSeqRow) });
  $('#id_sc_field_asig_academ' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_asig_academ_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_grupos_taller_asig_academ_onfocus(this, iSeqRow) });
  $('#id_sc_field_estudiante' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_estudiante_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_grupos_taller_estudiante_onfocus(this, iSeqRow) });
  $('#id_sc_field_num_estudiantes_grupo' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_num_estudiantes_grupo_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_t_grupos_taller_num_estudiantes_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_relleno' + iSeqRow).bind('blur', function() { sc_form_t_grupos_taller_relleno_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_grupos_taller_relleno_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_t_grupos_taller_id_grado_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_id_grado();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_id_grado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_id_sede_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_id_sede();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_id_sede_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_id_director_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_id_director_grupo();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_id_director_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_nombre_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_nombre_grupo();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_nombre_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_jornada_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_jornada();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_jornada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_modalidad_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_modalidad();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_modalidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_calendario_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_calendario();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_calendario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_tipo_educ_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_tipo_educ();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_tipo_educ_onchange(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_refresh_tipo_educ();
}

function sc_form_t_grupos_taller_tipo_educ_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_entorno_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_entorno();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_entorno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_asig_academ_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_asig_academ();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_asig_academ_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_estudiante_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_estudiante();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_estudiante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_num_estudiantes_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_num_estudiantes_grupo();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_num_estudiantes_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_t_grupos_taller_relleno_onblur(oThis, iSeqRow) {
  do_ajax_form_t_grupos_taller_mob_validate_relleno();
  scCssBlur(oThis);
}

function sc_form_t_grupos_taller_relleno_onfocus(oThis, iSeqRow) {
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
