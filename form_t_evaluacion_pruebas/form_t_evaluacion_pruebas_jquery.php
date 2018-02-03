
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
  scEventControl_data["primer_apellido_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["segundo_apellido_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["primer_nombre_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["segundo_nombre_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_grupo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_area_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_asignatura_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_grado_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_nivel_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ihs_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pfa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_asig_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["novedad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estatus_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["inasistencia_p1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_1_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc5_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc6_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc7_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc8_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc9_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_dc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds5_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_ds_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp5_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_dp_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["aeep1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["porcent_aeep1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["inasistencia_p2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_2_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc1_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc2_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc3_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc4_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc5_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_dc2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds1_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds2_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds3_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds4_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds5_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_ds2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp1_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp2_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp3_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp4_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp5_2p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_dp2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["aee_p2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["porcet_aee_p2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["inasistencia_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_3_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc1_3p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc2_3p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc3_3p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc4_3p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc5_3p_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_dc3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds1_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds2_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds3_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds4_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds5_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_ds3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp1_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp2_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp3_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp4_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_0_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_dp3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["aee_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["porcent_aee_p3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["inasistencia_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_4_per_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc1_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc2_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc3_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc4_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dc5_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_dc4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds1_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds2_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds3_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds4_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ds5_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_ds4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp1_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp2_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp3_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp4_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dp5_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["aee_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["porcent_aee_p4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pcent_dp4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eval_final_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["entorno_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_estudiante_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_estudiante_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["primer_apellido_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["primer_apellido_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["segundo_apellido_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["segundo_apellido_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["primer_nombre_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["primer_nombre_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["segundo_nombre_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["segundo_nombre_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_grupo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grupo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_area_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_area_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_asignatura_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_asignatura_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_grado_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grado_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_nivel_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_nivel_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ihs_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ihs_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pfa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pfa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_asig_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_asig_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["novedad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["novedad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatus_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatus_" + iSeqRow]["change"]) {
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
  if (scEventControl_data["dc6_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc6_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc7_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc7_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc8_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc8_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc9_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc9_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_dc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_dc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds5_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds5_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_ds_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_ds_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp5_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp5_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_dp_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_dp_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aeep1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aeep1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcent_aeep1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcent_aeep1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inasistencia_p2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inasistencia_p2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eval_2_per_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_2_per_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc1_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc1_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc2_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc2_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc3_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc3_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc4_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc4_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc5_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc5_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_dc2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_dc2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds1_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds1_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds2_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds2_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds3_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds3_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds4_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds4_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds5_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds5_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_ds2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_ds2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp1_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp1_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp2_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp2_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp3_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp3_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp4_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp4_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp5_2p_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp5_2p_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_dp2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_dp2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aee_p2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aee_p2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcet_aee_p2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcet_aee_p2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inasistencia_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inasistencia_p3_" + iSeqRow]["change"]) {
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
  if (scEventControl_data["aee_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aee_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcent_aee_p3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcent_aee_p3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inasistencia_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inasistencia_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eval_4_per_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_4_per_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc1_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc1_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc2_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc2_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc3_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc3_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc4_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc4_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dc5_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dc5_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_dc4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_dc4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds1_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds1_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds2_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds2_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds3_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds3_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds4_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds4_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ds5_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ds5_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_ds4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_ds4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp1_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp1_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp2_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp2_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp3_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp3_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp4_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp4_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dp5_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dp5_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aee_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aee_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcent_aee_p4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcent_aee_p4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pcent_dp4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pcent_dp4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eval_final_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eval_final_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["entorno_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["entorno_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id_estudiante_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_id_estudiante__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_pruebas_id_estudiante__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_pruebas_id_estudiante__onfocus(this, iSeqRow) });
  $('#id_sc_field_primer_apellido_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_primer_apellido__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_t_evaluacion_pruebas_primer_apellido__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_t_evaluacion_pruebas_primer_apellido__onfocus(this, iSeqRow) });
  $('#id_sc_field_segundo_apellido_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_segundo_apellido__onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_t_evaluacion_pruebas_segundo_apellido__onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_t_evaluacion_pruebas_segundo_apellido__onfocus(this, iSeqRow) });
  $('#id_sc_field_primer_nombre_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_primer_nombre__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_pruebas_primer_nombre__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_pruebas_primer_nombre__onfocus(this, iSeqRow) });
  $('#id_sc_field_segundo_nombre_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_segundo_nombre__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_t_evaluacion_pruebas_segundo_nombre__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_t_evaluacion_pruebas_segundo_nombre__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grupo_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_id_grupo__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_t_evaluacion_pruebas_id_grupo__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_evaluacion_pruebas_id_grupo__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_area_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_id_area__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_evaluacion_pruebas_id_area__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_evaluacion_pruebas_id_area__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_asignatura_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_id_asignatura__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_pruebas_id_asignatura__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_pruebas_id_asignatura__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grado_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_id_grado__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_t_evaluacion_pruebas_id_grado__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_evaluacion_pruebas_id_grado__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_nivel_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_id_nivel__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_t_evaluacion_pruebas_id_nivel__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_evaluacion_pruebas_id_nivel__onfocus(this, iSeqRow) });
  $('#id_sc_field_ihs_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ihs__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_ihs__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_ihs__onfocus(this, iSeqRow) });
  $('#id_sc_field_pfa_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pfa__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_pfa__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_pfa__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_asig_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_tipo_asig__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_pruebas_tipo_asig__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_pruebas_tipo_asig__onfocus(this, iSeqRow) });
  $('#id_sc_field_novedad_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_novedad__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_evaluacion_pruebas_novedad__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_evaluacion_pruebas_novedad__onfocus(this, iSeqRow) });
  $('#id_sc_field_estatus_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_estatus__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_evaluacion_pruebas_estatus__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_evaluacion_pruebas_estatus__onfocus(this, iSeqRow) });
  $('#id_sc_field_inasistencia_p1_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_inasistencia_p1__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_t_evaluacion_pruebas_inasistencia_p1__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_t_evaluacion_pruebas_inasistencia_p1__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_1_per_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_eval_1_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_pruebas_eval_1_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_pruebas_eval_1_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc1_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc1__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dc1__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc1__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc2_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc2__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dc2__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc2__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc3__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dc3__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc4__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dc4__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc5_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc5__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dc5__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc5__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc6_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc6__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dc6__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc6__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc7_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc7__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dc7__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc7__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc8_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc8__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dc8__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc8__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc9_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc9__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dc9__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc9__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_dc_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_dc__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_dc__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_dc__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds1_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds1__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_ds1__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds1__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds2_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds2__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_ds2__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds2__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds3__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_ds3__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds4__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_ds4__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds4__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds5_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds5__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_ds5__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds5__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_ds_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_ds__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_ds__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_ds__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp1_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp1__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dp1__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp1__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp2_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp2__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dp2__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp2__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp3__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dp3__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp4__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dp4__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp5_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp5__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_t_evaluacion_pruebas_dp5__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp5__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_dp_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_dp__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_dp__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_dp__onfocus(this, iSeqRow) });
  $('#id_sc_field_aeep1_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_aeep1__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_t_evaluacion_pruebas_aeep1__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_t_evaluacion_pruebas_aeep1__onfocus(this, iSeqRow) });
  $('#id_sc_field_porcent_aeep1_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_porcent_aeep1__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_pruebas_porcent_aeep1__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_pruebas_porcent_aeep1__onfocus(this, iSeqRow) });
  $('#id_sc_field_inasistencia_p2_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_inasistencia_p2__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_t_evaluacion_pruebas_inasistencia_p2__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_t_evaluacion_pruebas_inasistencia_p2__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_2_per_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_eval_2_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_pruebas_eval_2_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_pruebas_eval_2_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc1_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc1_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc1_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc1_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc2_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc2_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc2_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc2_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc3_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc3_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc3_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc3_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc4_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc4_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc4_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc4_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc5_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc5_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc5_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc5_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_dc2_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_dc2__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_dc2__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_dc2__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds1_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds1_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds1_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds1_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds2_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds2_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds2_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds2_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds3_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds3_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds3_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds3_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds4_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds4_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds4_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds4_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds5_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds5_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds5_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds5_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_ds2_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_ds2__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_ds2__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_ds2__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp1_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp1_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp1_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp1_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp2_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp2_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp2_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp2_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp3_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp3_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp3_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp3_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp4_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp4_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp4_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp4_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp5_2p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp5_2p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp5_2p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp5_2p__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_dp2_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_dp2__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_dp2__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_dp2__onfocus(this, iSeqRow) });
  $('#id_sc_field_aee_p2_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_aee_p2__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_aee_p2__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_aee_p2__onfocus(this, iSeqRow) });
  $('#id_sc_field_porcet_aee_p2_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_porcet_aee_p2__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_t_evaluacion_pruebas_porcet_aee_p2__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_t_evaluacion_pruebas_porcet_aee_p2__onfocus(this, iSeqRow) });
  $('#id_sc_field_inasistencia_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_inasistencia_p3__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_t_evaluacion_pruebas_inasistencia_p3__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_t_evaluacion_pruebas_inasistencia_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_3_per_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_eval_3_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_pruebas_eval_3_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_pruebas_eval_3_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc1_3p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc1_3p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc1_3p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc1_3p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc2_3p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc2_3p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc2_3p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc2_3p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc3_3p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc3_3p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc3_3p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc3_3p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc4_3p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc4_3p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc4_3p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc4_3p__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc5_3p_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc5_3p__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc5_3p__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc5_3p__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_dc3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_dc3__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_dc3__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_dc3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds1_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds1_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds1_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds1_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds2_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds2_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds2_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds2_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds3_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds3_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds3_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds3_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds4_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds4_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds4_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds4_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds5_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds5_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds5_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds5_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_ds3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_ds3__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_ds3__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_ds3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp1_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp1_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp1_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp1_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp2_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp2_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp2_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp2_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp3_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp3_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp3_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp3_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp4_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp4_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp4_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp4_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_sc_field_0__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_pruebas_sc_field_0__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_pruebas_sc_field_0__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_dp3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_dp3__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_dp3__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_dp3__onfocus(this, iSeqRow) });
  $('#id_sc_field_aee_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_aee_p3__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_aee_p3__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_aee_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_porcent_aee_p3_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_porcent_aee_p3__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_t_evaluacion_pruebas_porcent_aee_p3__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_t_evaluacion_pruebas_porcent_aee_p3__onfocus(this, iSeqRow) });
  $('#id_sc_field_inasistencia_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_inasistencia_p4__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_t_evaluacion_pruebas_inasistencia_p4__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_t_evaluacion_pruebas_inasistencia_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_4_per_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_eval_4_per__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_pruebas_eval_4_per__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_pruebas_eval_4_per__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc1_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc1_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc1_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc1_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc2_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc2_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc2_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc2_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc3_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc3_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc3_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc3_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc4_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc4_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc4_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc4_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dc5_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dc5_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dc5_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dc5_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_dc4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_dc4__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_dc4__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_dc4__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds1_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds1_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds1_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds1_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds2_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds2_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds2_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds2_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds3_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds3_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds3_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds3_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds4_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds4_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds4_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds4_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_ds5_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_ds5_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_ds5_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_ds5_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_ds4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_ds4__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_ds4__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_ds4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp1_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp1_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp1_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp1_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp2_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp2_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp2_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp2_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp3_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp3_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp3_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp3_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp4_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp4_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp4_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp4_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_dp5_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_dp5_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_dp5_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_dp5_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_aee_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_aee_p4__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_t_evaluacion_pruebas_aee_p4__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_t_evaluacion_pruebas_aee_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_porcent_aee_p4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_porcent_aee_p4__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_t_evaluacion_pruebas_porcent_aee_p4__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_t_evaluacion_pruebas_porcent_aee_p4__onfocus(this, iSeqRow) });
  $('#id_sc_field_pcent_dp4_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_pcent_dp4__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_t_evaluacion_pruebas_pcent_dp4__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_t_evaluacion_pruebas_pcent_dp4__onfocus(this, iSeqRow) });
  $('#id_sc_field_eval_final_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_eval_final__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_t_evaluacion_pruebas_eval_final__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_t_evaluacion_pruebas_eval_final__onfocus(this, iSeqRow) });
  $('#id_sc_field_entorno_' + iSeqRow).bind('blur', function() { sc_form_t_evaluacion_pruebas_entorno__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_t_evaluacion_pruebas_entorno__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_t_evaluacion_pruebas_entorno__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_t_evaluacion_pruebas_id_estudiante__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_id_estudiante_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_estudiante__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_estudiante__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_primer_apellido__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_primer_apellido_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_primer_apellido__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_primer_apellido__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_segundo_apellido__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_segundo_apellido_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_segundo_apellido__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_segundo_apellido__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_primer_nombre__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_primer_nombre_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_primer_nombre__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_primer_nombre__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_segundo_nombre__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_segundo_nombre_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_segundo_nombre__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_segundo_nombre__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_grupo__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_id_grupo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_grupo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_grupo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_area__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_id_area_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_area__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_area__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_asignatura__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_id_asignatura_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_asignatura__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_asignatura__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_grado__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_id_grado_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_grado__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_grado__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_nivel__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_id_nivel_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_nivel__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_id_nivel__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ihs__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ihs_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ihs__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ihs__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pfa__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pfa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pfa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pfa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_tipo_asig__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_tipo_asig_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_tipo_asig__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_tipo_asig__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_novedad__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_novedad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_novedad__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_novedad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_estatus__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_estatus_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_estatus__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_estatus__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p1__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_inasistencia_p1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_1_per__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_eval_1_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_1_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_1_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc5_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc6__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc6_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc6__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc6__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc7__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc7_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc7__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc7__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc8__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc8_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc8__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc8__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc9__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc9_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc9__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc9__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_dc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds5_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_ds_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp5__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp5_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp5__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp5__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_dp_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aeep1__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_aeep1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aeep1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aeep1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcent_aeep1__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_porcent_aeep1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcent_aeep1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcent_aeep1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p2__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_inasistencia_p2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_2_per__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_eval_2_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_2_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_2_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc1_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc2_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc3_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc4_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc5_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc2__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_dc2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds1_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds2_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds3_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds4_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds5_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds2__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_ds2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp1_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp2_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp3_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp4_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp5_2p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp5_2p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp5_2p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp5_2p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp2__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_dp2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aee_p2__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_aee_p2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aee_p2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aee_p2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcet_aee_p2__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_porcet_aee_p2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcet_aee_p2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcet_aee_p2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_inasistencia_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_3_per__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_eval_3_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_3_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_3_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1_3p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc1_3p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1_3p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1_3p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2_3p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc2_3p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2_3p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2_3p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3_3p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc3_3p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3_3p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3_3p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4_3p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc4_3p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4_3p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4_3p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5_3p__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc5_3p_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5_3p__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5_3p__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_dc3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds1_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds2_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds3_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds4_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds5_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_ds3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp1_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp2_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp3_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp4_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_sc_field_0__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_sc_field_0_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_sc_field_0__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_sc_field_0__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_dp3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aee_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_aee_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aee_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aee_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcent_aee_p3__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_porcent_aee_p3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcent_aee_p3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcent_aee_p3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_inasistencia_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_inasistencia_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_4_per__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_eval_4_per_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_4_per__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_4_per__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc1_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc1_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc2_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc2_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc3_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc3_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc4_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc4_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dc5_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dc5_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_dc4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dc4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds1_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds1_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds2_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds2_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds3_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds3_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds4_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds4_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_ds5_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_ds5_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_ds4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_ds4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp1_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp1_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp2_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp2_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp3_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp3_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp4_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp4_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp5_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_dp5_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp5_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_dp5_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aee_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_aee_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aee_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_aee_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcent_aee_p4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_porcent_aee_p4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcent_aee_p4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_porcent_aee_p4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp4__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_pcent_dp4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_pcent_dp4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_final__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_eval_final_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_final__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_eval_final__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_entorno__onblur(oThis, iSeqRow) {
  do_ajax_form_t_evaluacion_pruebas_validate_entorno_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_t_evaluacion_pruebas_entorno__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_t_evaluacion_pruebas_entorno__onfocus(oThis, iSeqRow) {
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

