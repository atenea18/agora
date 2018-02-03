
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
      case 'estatus':
      case 'fecha_matricula':
      case 'genero':
      case 'fecha_nacimiento':
      case 'primer_apellido':
      case 'segundo_apellido':
      case 'primer_nombre':
      case 'segundo_nombre':
      case 'tipo_identificacion':
      case 'numero_documento':
      case 'departanebti_expedicion':
      case 'municipio_expedicion':
      case 'firstname':
      case 'lastname':
      case 'anos_cumplidos':
      case 'dpto_nacimiento':
      case 'municipio_nacimiento':
      case 'observaciones':
      case 'login':
      case 'pswd':
      case 'confirm_pswd':
      case 'photo':
      case 'state':
      case 'city':
      case 'address':
      case 'barrio':
      case 'postalcode':
      case 'zona':
      case 'telefono':
      case 'email':
      case 'id_sede':
      case 'id_jornada':
      case 'id_nivel':
      case 'grado_igreso':
      case 'id_grupo':
      case 'grado_anterior':
      case 'last_year':
      case 'nombre_ult_plantel':
      case 'resultado':
      case 'subsidado':
      case 'interno':
      case 'otro_modelo':
      case 'caracter':
      case 'especialidad':
      case 'year_mat':
      case 'matricular':
        sc_exib_ocult_pag('form_students_mob_form0');
        break;
      case 'eps':
      case 'ips':
      case 'ars':
      case 'tipo_sangre':
      case 'victima_conflicto':
      case 'peso':
      case 'talla':
      case 'cobertura':
      case 'vive_con':
      case 'subsidio':
      case 'estatus_vca':
      case 'depto_expulsor':
      case 'municipio_expulsor':
      case 'fecha_expulsion':
      case 'certificado':
      case 'semestre':
        sc_exib_ocult_pag('form_students_mob_form1');
        break;
      case 'numero_carne_sisben':
      case 'nivel_sisben':
      case 'estrato':
      case 'fuente_recurso':
      case 'opcion':
      case 'resguardo':
      case 'negritudes':
      case 'etnia':
        sc_exib_ocult_pag('form_students_mob_form2');
        break;
      case 'discapacidades':
      case 'capacidades':
        sc_exib_ocult_pag('form_students_mob_form3');
        break;
      case 'novedades':
        sc_exib_ocult_pag('form_students_mob_form4');
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
  scEventControl_data["estatus" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fecha_matricula" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["genero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fecha_nacimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["primer_apellido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["segundo_apellido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["primer_nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["segundo_nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_identificacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["numero_documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["departanebti_expedicion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["municipio_expedicion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["firstname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["lastname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["anos_cumplidos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dpto_nacimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["municipio_nacimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["login" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pswd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["confirm_pswd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["photo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["state" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["city" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["address" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["barrio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["postalcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["zona" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["telefono" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_sede" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_jornada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_nivel" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["grado_igreso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["grado_anterior" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["last_year" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nombre_ult_plantel" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["resultado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["subsidado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["interno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["otro_modelo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["caracter" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["especialidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["year_mat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["matricular" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["eps" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ips" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ars" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_sangre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["victima_conflicto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["peso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["talla" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cobertura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["vive_con" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["subsidio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estatus_vca" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["depto_expulsor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["municipio_expulsor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fecha_expulsion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["certificado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["semestre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["numero_carne_sisben" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nivel_sisben" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estrato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fuente_recurso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["opcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["resguardo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["negritudes" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["etnia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["discapacidades" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["capacidades" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["novedades" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["estatus" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatus" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_matricula" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_matricula" + iSeqRow]["change"]) {
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
  if (scEventControl_data["primer_apellido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["primer_apellido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["segundo_apellido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["segundo_apellido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["primer_nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["primer_nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["segundo_nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["segundo_nombre" + iSeqRow]["change"]) {
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
  if (scEventControl_data["departanebti_expedicion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["departanebti_expedicion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["municipio_expedicion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["municipio_expedicion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["firstname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["firstname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lastname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lastname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anos_cumplidos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anos_cumplidos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dpto_nacimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dpto_nacimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["municipio_nacimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["municipio_nacimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["login" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["login" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pswd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pswd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["confirm_pswd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["confirm_pswd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["state" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["state" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["address" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["address" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["barrio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["barrio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["postalcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["postalcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zona" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zona" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefono" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
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
  if (scEventControl_data["id_nivel" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_nivel" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grado_igreso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grado_igreso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_grupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grado_anterior" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grado_anterior" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["last_year" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["last_year" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_ult_plantel" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_ult_plantel" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["resultado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resultado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["subsidado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subsidado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["interno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["interno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["otro_modelo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["otro_modelo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["caracter" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["caracter" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["especialidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["especialidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["year_mat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["year_mat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["matricular" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["matricular" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["eps" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["eps" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ips" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ips" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ars" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ars" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_sangre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_sangre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["victima_conflicto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["victima_conflicto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["peso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["peso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["talla" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["talla" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobertura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobertura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vive_con" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vive_con" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["subsidio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subsidio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatus_vca" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatus_vca" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["depto_expulsor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["depto_expulsor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["municipio_expulsor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["municipio_expulsor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_expulsion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_expulsion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["certificado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["certificado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["semestre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["semestre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_carne_sisben" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_carne_sisben" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nivel_sisben" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nivel_sisben" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estrato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estrato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fuente_recurso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fuente_recurso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["opcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["opcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["resguardo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resguardo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["negritudes" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["negritudes" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["etnia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["etnia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["discapacidades" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["discapacidades" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["capacidades" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["capacidades" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["novedades" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["novedades" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo_identificacion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("departanebti_expedicion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("municipio_expedicion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("dpto_nacimiento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("municipio_nacimiento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("state" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("city" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_sede" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_jornada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_nivel" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grado_igreso" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_grupo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("grado_anterior" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("resultado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("otro_modelo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("especialidad" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("year_mat" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("matricular" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("eps" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_sangre" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("victima_conflicto" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("estatus_vca" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("depto_expulsor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("municipio_expulsor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("estrato" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("fuente_recurso" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("opcion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("discapacidades" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("capacidades" + iSeq == fieldName) {
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
  if ("fecha_nacimiento" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("victima_conflicto" + iFieldSeq == fieldName) {
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
  $('#id_sc_field_id_sede' + iSeqRow).bind('blur', function() { sc_form_students_id_sede_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_students_id_sede_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_jornada' + iSeqRow).bind('blur', function() { sc_form_students_id_jornada_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_students_id_jornada_onfocus(this, iSeqRow) });
  $('#id_sc_field_semestre' + iSeqRow).bind('blur', function() { sc_form_students_semestre_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_students_semestre_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatus' + iSeqRow).bind('blur', function() { sc_form_students_estatus_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_students_estatus_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_matricula' + iSeqRow).bind('blur', function() { sc_form_students_fecha_matricula_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_students_fecha_matricula_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_identificacion' + iSeqRow).bind('blur', function() { sc_form_students_tipo_identificacion_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_students_tipo_identificacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_documento' + iSeqRow).bind('blur', function() { sc_form_students_numero_documento_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_students_numero_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_departanebti_expedicion' + iSeqRow).bind('blur', function() { sc_form_students_departanebti_expedicion_onblur(this, iSeqRow) })
                                                     .bind('change', function() { sc_form_students_departanebti_expedicion_onchange(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_students_departanebti_expedicion_onfocus(this, iSeqRow) });
  $('#id_sc_field_municipio_expedicion' + iSeqRow).bind('blur', function() { sc_form_students_municipio_expedicion_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_students_municipio_expedicion_onfocus(this, iSeqRow) });
  $('#id_sc_field_primer_nombre' + iSeqRow).bind('blur', function() { sc_form_students_primer_nombre_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_students_primer_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_segundo_nombre' + iSeqRow).bind('blur', function() { sc_form_students_segundo_nombre_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_students_segundo_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_primer_apellido' + iSeqRow).bind('blur', function() { sc_form_students_primer_apellido_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_students_primer_apellido_onfocus(this, iSeqRow) });
  $('#id_sc_field_segundo_apellido' + iSeqRow).bind('blur', function() { sc_form_students_segundo_apellido_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_students_segundo_apellido_onfocus(this, iSeqRow) });
  $('#id_sc_field_firstname' + iSeqRow).bind('blur', function() { sc_form_students_firstname_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_students_firstname_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastname' + iSeqRow).bind('blur', function() { sc_form_students_lastname_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_students_lastname_onfocus(this, iSeqRow) });
  $('#id_sc_field_genero' + iSeqRow).bind('blur', function() { sc_form_students_genero_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_students_genero_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_nacimiento' + iSeqRow).bind('blur', function() { sc_form_students_fecha_nacimiento_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_students_fecha_nacimiento_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_students_fecha_nacimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_anos_cumplidos' + iSeqRow).bind('blur', function() { sc_form_students_anos_cumplidos_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_students_anos_cumplidos_onfocus(this, iSeqRow) });
  $('#id_sc_field_dpto_nacimiento' + iSeqRow).bind('blur', function() { sc_form_students_dpto_nacimiento_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_students_dpto_nacimiento_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_students_dpto_nacimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_municipio_nacimiento' + iSeqRow).bind('blur', function() { sc_form_students_municipio_nacimiento_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_students_municipio_nacimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_address' + iSeqRow).bind('blur', function() { sc_form_students_address_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_students_address_onfocus(this, iSeqRow) });
  $('#id_sc_field_barrio' + iSeqRow).bind('blur', function() { sc_form_students_barrio_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_students_barrio_onfocus(this, iSeqRow) });
  $('#id_sc_field_zona' + iSeqRow).bind('blur', function() { sc_form_students_zona_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_students_zona_onfocus(this, iSeqRow) });
  $('#id_sc_field_city' + iSeqRow).bind('blur', function() { sc_form_students_city_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_students_city_onfocus(this, iSeqRow) });
  $('#id_sc_field_state' + iSeqRow).bind('blur', function() { sc_form_students_state_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_students_state_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_students_state_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefono' + iSeqRow).bind('blur', function() { sc_form_students_telefono_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_students_telefono_onfocus(this, iSeqRow) });
  $('#id_sc_field_grado_anterior' + iSeqRow).bind('blur', function() { sc_form_students_grado_anterior_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_students_grado_anterior_onfocus(this, iSeqRow) });
  $('#id_sc_field_last_year' + iSeqRow).bind('blur', function() { sc_form_students_last_year_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_students_last_year_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_ult_plantel' + iSeqRow).bind('blur', function() { sc_form_students_nombre_ult_plantel_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_students_nombre_ult_plantel_onfocus(this, iSeqRow) });
  $('#id_sc_field_resultado' + iSeqRow).bind('blur', function() { sc_form_students_resultado_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_students_resultado_onfocus(this, iSeqRow) });
  $('#id_sc_field_grado_igreso' + iSeqRow).bind('blur', function() { sc_form_students_grado_igreso_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_students_grado_igreso_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_students_grado_igreso_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_nivel' + iSeqRow).bind('blur', function() { sc_form_students_id_nivel_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_students_id_nivel_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_students_id_nivel_onfocus(this, iSeqRow) });
  $('#id_sc_field_subsidado' + iSeqRow).bind('blur', function() { sc_form_students_subsidado_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_students_subsidado_onfocus(this, iSeqRow) });
  $('#id_sc_field_interno' + iSeqRow).bind('blur', function() { sc_form_students_interno_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_students_interno_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_grupo' + iSeqRow).bind('blur', function() { sc_form_students_id_grupo_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_students_id_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_otro_modelo' + iSeqRow).bind('blur', function() { sc_form_students_otro_modelo_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_students_otro_modelo_onfocus(this, iSeqRow) });
  $('#id_sc_field_caracter' + iSeqRow).bind('blur', function() { sc_form_students_caracter_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_students_caracter_onfocus(this, iSeqRow) });
  $('#id_sc_field_especialidad' + iSeqRow).bind('blur', function() { sc_form_students_especialidad_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_students_especialidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_eps' + iSeqRow).bind('blur', function() { sc_form_students_eps_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_students_eps_onfocus(this, iSeqRow) });
  $('#id_sc_field_ips' + iSeqRow).bind('blur', function() { sc_form_students_ips_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_students_ips_onfocus(this, iSeqRow) });
  $('#id_sc_field_ars' + iSeqRow).bind('blur', function() { sc_form_students_ars_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_students_ars_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_sangre' + iSeqRow).bind('blur', function() { sc_form_students_tipo_sangre_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_students_tipo_sangre_onfocus(this, iSeqRow) });
  $('#id_sc_field_victima_conflicto' + iSeqRow).bind('blur', function() { sc_form_students_victima_conflicto_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_students_victima_conflicto_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_students_victima_conflicto_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatus_vca' + iSeqRow).bind('blur', function() { sc_form_students_estatus_vca_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_students_estatus_vca_onfocus(this, iSeqRow) });
  $('#id_sc_field_depto_expulsor' + iSeqRow).bind('blur', function() { sc_form_students_depto_expulsor_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_students_depto_expulsor_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_students_depto_expulsor_onfocus(this, iSeqRow) });
  $('#id_sc_field_municipio_expulsor' + iSeqRow).bind('blur', function() { sc_form_students_municipio_expulsor_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_students_municipio_expulsor_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_expulsion' + iSeqRow).bind('blur', function() { sc_form_students_fecha_expulsion_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_students_fecha_expulsion_onfocus(this, iSeqRow) });
  $('#id_sc_field_certificado' + iSeqRow).bind('blur', function() { sc_form_students_certificado_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_students_certificado_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_carne_sisben' + iSeqRow).bind('blur', function() { sc_form_students_numero_carne_sisben_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_students_numero_carne_sisben_onfocus(this, iSeqRow) });
  $('#id_sc_field_nivel_sisben' + iSeqRow).bind('blur', function() { sc_form_students_nivel_sisben_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_students_nivel_sisben_onfocus(this, iSeqRow) });
  $('#id_sc_field_estrato' + iSeqRow).bind('blur', function() { sc_form_students_estrato_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_students_estrato_onfocus(this, iSeqRow) });
  $('#id_sc_field_fuente_recurso' + iSeqRow).bind('blur', function() { sc_form_students_fuente_recurso_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_students_fuente_recurso_onfocus(this, iSeqRow) });
  $('#id_sc_field_opcion' + iSeqRow).bind('blur', function() { sc_form_students_opcion_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_students_opcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_resguardo' + iSeqRow).bind('blur', function() { sc_form_students_resguardo_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_students_resguardo_onfocus(this, iSeqRow) });
  $('#id_sc_field_negritudes' + iSeqRow).bind('blur', function() { sc_form_students_negritudes_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_students_negritudes_onfocus(this, iSeqRow) });
  $('#id_sc_field_etnia' + iSeqRow).bind('blur', function() { sc_form_students_etnia_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_students_etnia_onfocus(this, iSeqRow) });
  $('#id_sc_field_discapacidades' + iSeqRow).bind('blur', function() { sc_form_students_discapacidades_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_students_discapacidades_onfocus(this, iSeqRow) });
  $('#id_sc_field_capacidades' + iSeqRow).bind('blur', function() { sc_form_students_capacidades_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_students_capacidades_onfocus(this, iSeqRow) });
  $('#id_sc_field_postalcode' + iSeqRow).bind('blur', function() { sc_form_students_postalcode_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_students_postalcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_students_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_students_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_login' + iSeqRow).bind('blur', function() { sc_form_students_login_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_students_login_onfocus(this, iSeqRow) });
  $('#id_sc_field_photo' + iSeqRow).bind('blur', function() { sc_form_students_photo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_students_photo_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_students_observaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_students_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_peso' + iSeqRow).bind('blur', function() { sc_form_students_peso_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_students_peso_onfocus(this, iSeqRow) });
  $('#id_sc_field_talla' + iSeqRow).bind('blur', function() { sc_form_students_talla_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_students_talla_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobertura' + iSeqRow).bind('blur', function() { sc_form_students_cobertura_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_students_cobertura_onfocus(this, iSeqRow) });
  $('#id_sc_field_vive_con' + iSeqRow).bind('blur', function() { sc_form_students_vive_con_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_students_vive_con_onfocus(this, iSeqRow) });
  $('#id_sc_field_subsidio' + iSeqRow).bind('blur', function() { sc_form_students_subsidio_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_students_subsidio_onfocus(this, iSeqRow) });
  $('#id_sc_field_confirm_pswd' + iSeqRow).bind('blur', function() { sc_form_students_confirm_pswd_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_students_confirm_pswd_onfocus(this, iSeqRow) });
  $('#id_sc_field_matricular' + iSeqRow).bind('blur', function() { sc_form_students_matricular_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_students_matricular_onfocus(this, iSeqRow) });
  $('#id_sc_field_novedades' + iSeqRow).bind('blur', function() { sc_form_students_novedades_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_students_novedades_onfocus(this, iSeqRow) });
  $('#id_sc_field_pswd' + iSeqRow).bind('blur', function() { sc_form_students_pswd_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_students_pswd_onfocus(this, iSeqRow) });
  $('#id_sc_field_year_mat' + iSeqRow).bind('blur', function() { sc_form_students_year_mat_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_students_year_mat_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_students_id_sede_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_id_sede();
  scCssBlur(oThis);
}

function sc_form_students_id_sede_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_id_jornada_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_id_jornada();
  scCssBlur(oThis);
}

function sc_form_students_id_jornada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_semestre_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_semestre();
  scCssBlur(oThis);
}

function sc_form_students_semestre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_estatus_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_estatus();
  scCssBlur(oThis);
}

function sc_form_students_estatus_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_fecha_matricula_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_fecha_matricula();
  scCssBlur(oThis);
}

function sc_form_students_fecha_matricula_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_tipo_identificacion_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_tipo_identificacion();
  scCssBlur(oThis);
}

function sc_form_students_tipo_identificacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_numero_documento_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_numero_documento();
  scCssBlur(oThis);
}

function sc_form_students_numero_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_departanebti_expedicion_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_departanebti_expedicion();
  scCssBlur(oThis);
}

function sc_form_students_departanebti_expedicion_onchange(oThis, iSeqRow) {
  do_ajax_form_students_mob_refresh_departanebti_expedicion();
}

function sc_form_students_departanebti_expedicion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_municipio_expedicion_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_municipio_expedicion();
  scCssBlur(oThis);
}

function sc_form_students_municipio_expedicion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_primer_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_primer_nombre();
  scCssBlur(oThis);
}

function sc_form_students_primer_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_segundo_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_segundo_nombre();
  scCssBlur(oThis);
}

function sc_form_students_segundo_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_primer_apellido_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_primer_apellido();
  scCssBlur(oThis);
}

function sc_form_students_primer_apellido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_segundo_apellido_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_segundo_apellido();
  scCssBlur(oThis);
}

function sc_form_students_segundo_apellido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_firstname_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_firstname();
  scCssBlur(oThis);
}

function sc_form_students_firstname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_lastname_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_lastname();
  scCssBlur(oThis);
}

function sc_form_students_lastname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_genero_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_genero();
  scCssBlur(oThis);
}

function sc_form_students_genero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_fecha_nacimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_fecha_nacimiento();
  scCssBlur(oThis);
}

function sc_form_students_fecha_nacimiento_onchange(oThis, iSeqRow) {
  do_ajax_form_students_mob_event_fecha_nacimiento_onchange();
}

function sc_form_students_fecha_nacimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_anos_cumplidos_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_anos_cumplidos();
  scCssBlur(oThis);
}

function sc_form_students_anos_cumplidos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_dpto_nacimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_dpto_nacimiento();
  scCssBlur(oThis);
}

function sc_form_students_dpto_nacimiento_onchange(oThis, iSeqRow) {
  do_ajax_form_students_mob_refresh_dpto_nacimiento();
}

function sc_form_students_dpto_nacimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_municipio_nacimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_municipio_nacimiento();
  scCssBlur(oThis);
}

function sc_form_students_municipio_nacimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_address_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_address();
  scCssBlur(oThis);
}

function sc_form_students_address_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_barrio_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_barrio();
  scCssBlur(oThis);
}

function sc_form_students_barrio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_zona_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_zona();
  scCssBlur(oThis);
}

function sc_form_students_zona_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_city_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_city();
  scCssBlur(oThis);
}

function sc_form_students_city_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_state_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_state();
  scCssBlur(oThis);
}

function sc_form_students_state_onchange(oThis, iSeqRow) {
  do_ajax_form_students_mob_refresh_state();
}

function sc_form_students_state_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_telefono_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_telefono();
  scCssBlur(oThis);
}

function sc_form_students_telefono_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_grado_anterior_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_grado_anterior();
  scCssBlur(oThis);
}

function sc_form_students_grado_anterior_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_last_year_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_last_year();
  scCssBlur(oThis);
}

function sc_form_students_last_year_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_nombre_ult_plantel_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_nombre_ult_plantel();
  scCssBlur(oThis);
}

function sc_form_students_nombre_ult_plantel_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_resultado_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_resultado();
  scCssBlur(oThis);
}

function sc_form_students_resultado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_grado_igreso_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_grado_igreso();
  scCssBlur(oThis);
}

function sc_form_students_grado_igreso_onchange(oThis, iSeqRow) {
  do_ajax_form_students_mob_refresh_grado_igreso();
}

function sc_form_students_grado_igreso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_id_nivel_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_id_nivel();
  scCssBlur(oThis);
}

function sc_form_students_id_nivel_onchange(oThis, iSeqRow) {
  do_ajax_form_students_mob_refresh_id_nivel();
}

function sc_form_students_id_nivel_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_subsidado_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_subsidado();
  scCssBlur(oThis);
}

function sc_form_students_subsidado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_interno_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_interno();
  scCssBlur(oThis);
}

function sc_form_students_interno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_id_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_id_grupo();
  scCssBlur(oThis);
}

function sc_form_students_id_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_otro_modelo_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_otro_modelo();
  scCssBlur(oThis);
}

function sc_form_students_otro_modelo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_caracter_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_caracter();
  scCssBlur(oThis);
}

function sc_form_students_caracter_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_especialidad_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_especialidad();
  scCssBlur(oThis);
}

function sc_form_students_especialidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_eps_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_eps();
  scCssBlur(oThis);
}

function sc_form_students_eps_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_ips_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_ips();
  scCssBlur(oThis);
}

function sc_form_students_ips_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_ars_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_ars();
  scCssBlur(oThis);
}

function sc_form_students_ars_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_tipo_sangre_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_tipo_sangre();
  scCssBlur(oThis);
}

function sc_form_students_tipo_sangre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_victima_conflicto_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_victima_conflicto();
  scCssBlur(oThis);
}

function sc_form_students_victima_conflicto_onchange(oThis, iSeqRow) {
  do_ajax_form_students_mob_event_victima_conflicto_onchange();
}

function sc_form_students_victima_conflicto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_estatus_vca_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_estatus_vca();
  scCssBlur(oThis);
}

function sc_form_students_estatus_vca_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_depto_expulsor_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_depto_expulsor();
  scCssBlur(oThis);
}

function sc_form_students_depto_expulsor_onchange(oThis, iSeqRow) {
  do_ajax_form_students_mob_refresh_depto_expulsor();
}

function sc_form_students_depto_expulsor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_municipio_expulsor_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_municipio_expulsor();
  scCssBlur(oThis);
}

function sc_form_students_municipio_expulsor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_fecha_expulsion_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_fecha_expulsion();
  scCssBlur(oThis);
}

function sc_form_students_fecha_expulsion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_certificado_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_certificado();
  scCssBlur(oThis);
}

function sc_form_students_certificado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_numero_carne_sisben_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_numero_carne_sisben();
  scCssBlur(oThis);
}

function sc_form_students_numero_carne_sisben_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_nivel_sisben_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_nivel_sisben();
  scCssBlur(oThis);
}

function sc_form_students_nivel_sisben_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_estrato_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_estrato();
  scCssBlur(oThis);
}

function sc_form_students_estrato_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_fuente_recurso_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_fuente_recurso();
  scCssBlur(oThis);
}

function sc_form_students_fuente_recurso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_opcion_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_opcion();
  scCssBlur(oThis);
}

function sc_form_students_opcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_resguardo_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_resguardo();
  scCssBlur(oThis);
}

function sc_form_students_resguardo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_negritudes_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_negritudes();
  scCssBlur(oThis);
}

function sc_form_students_negritudes_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_etnia_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_etnia();
  scCssBlur(oThis);
}

function sc_form_students_etnia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_discapacidades_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_discapacidades();
  scCssBlur(oThis);
}

function sc_form_students_discapacidades_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_capacidades_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_capacidades();
  scCssBlur(oThis);
}

function sc_form_students_capacidades_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_postalcode_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_postalcode();
  scCssBlur(oThis);
}

function sc_form_students_postalcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_email_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_email();
  scCssBlur(oThis);
}

function sc_form_students_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_login_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_login();
  scCssBlur(oThis);
}

function sc_form_students_login_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_photo_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_students_photo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_students_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_students_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_peso_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_peso();
  scCssBlur(oThis);
}

function sc_form_students_peso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_talla_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_talla();
  scCssBlur(oThis);
}

function sc_form_students_talla_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_cobertura_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_cobertura();
  scCssBlur(oThis);
}

function sc_form_students_cobertura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_vive_con_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_vive_con();
  scCssBlur(oThis);
}

function sc_form_students_vive_con_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_subsidio_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_subsidio();
  scCssBlur(oThis);
}

function sc_form_students_subsidio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_confirm_pswd_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_confirm_pswd();
  scCssBlur(oThis);
}

function sc_form_students_confirm_pswd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_matricular_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_matricular();
  scCssBlur(oThis);
}

function sc_form_students_matricular_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_novedades_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_novedades();
  scCssBlur(oThis);
}

function sc_form_students_novedades_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_pswd_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_pswd();
  scCssBlur(oThis);
}

function sc_form_students_pswd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_students_year_mat_onblur(oThis, iSeqRow) {
  do_ajax_form_students_mob_validate_year_mat();
  scCssBlur(oThis);
}

function sc_form_students_year_mat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha_matricula" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_matricula" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_matricula']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

  $("#id_sc_field_fecha_nacimiento" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_nacimiento" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-10:c+10',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_nacimiento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

  $("#id_sc_field_fecha_expulsion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_expulsion" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_expulsion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_photo" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_students_mob_ul_save.php",
    dropZone: $("#hidden_field_data_photo" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'photo'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_photo" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_photo" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_photo" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_photo" + iSeqRow).hide();
      }
      if (fileData && fileData[0] && fileData[0].error && "acceptFileTypes" == fileData[0].error) {
        oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl']; ?>"};
        scAjaxShowDebug(oTemp);
        return;
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      $("#id_sc_field_photo" + iSeqRow).val("");
      $("#id_sc_field_photo_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_photo_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_photo = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_photo) ? "none" : "";
      $("#id_ajax_img_photo" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_photo" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_photo) {
        document.F1.temp_out_photo.value = var_ajax_img_thumb;
        document.F1.temp_out1_photo.value = var_ajax_img_photo;
      }
      else if (document.F1.temp_out_photo) {
        document.F1.temp_out_photo.value = var_ajax_img_photo;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_photo" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_photo" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_photo" + iSeqRow).css("display", "none");
      $("#id_ajax_link_photo" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
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
