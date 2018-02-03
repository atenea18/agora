<?php
//
class form_students_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'navSummary'     => array(),
                                'navPage'        => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $idstudents;
   var $id_sede;
   var $id_sede_1;
   var $id_jornada;
   var $id_jornada_1;
   var $semestre;
   var $estatus;
   var $fecha_matricula;
   var $tipo_identificacion;
   var $tipo_identificacion_1;
   var $numero_documento;
   var $departanebti_expedicion;
   var $departanebti_expedicion_1;
   var $municipio_expedicion;
   var $municipio_expedicion_1;
   var $primer_nombre;
   var $segundo_nombre;
   var $primer_apellido;
   var $segundo_apellido;
   var $firstname;
   var $lastname;
   var $genero;
   var $fecha_nacimiento;
   var $anos_cumplidos;
   var $dpto_nacimiento;
   var $dpto_nacimiento_1;
   var $municipio_nacimiento;
   var $municipio_nacimiento_1;
   var $address;
   var $barrio;
   var $zona;
   var $city;
   var $city_1;
   var $state;
   var $state_1;
   var $telefono;
   var $grado_anterior;
   var $grado_anterior_1;
   var $last_year;
   var $nombre_ult_plantel;
   var $resultado;
   var $resultado_1;
   var $grado_igreso;
   var $grado_igreso_1;
   var $id_nivel;
   var $id_nivel_1;
   var $subsidado;
   var $interno;
   var $id_grupo;
   var $id_grupo_1;
   var $otro_modelo;
   var $otro_modelo_1;
   var $caracter;
   var $especialidad;
   var $especialidad_1;
   var $eps;
   var $eps_1;
   var $ips;
   var $ars;
   var $tipo_sangre;
   var $tipo_sangre_1;
   var $victima_conflicto;
   var $victima_conflicto_1;
   var $estatus_vca;
   var $estatus_vca_1;
   var $depto_expulsor;
   var $depto_expulsor_1;
   var $municipio_expulsor;
   var $municipio_expulsor_1;
   var $fecha_expulsion;
   var $certificado;
   var $numero_carne_sisben;
   var $nivel_sisben;
   var $estrato;
   var $estrato_1;
   var $fuente_recurso;
   var $fuente_recurso_1;
   var $opcion;
   var $opcion_1;
   var $resguardo;
   var $negritudes;
   var $etnia;
   var $discapacidades;
   var $discapacidades_1;
   var $capacidades;
   var $capacidades_1;
   var $postalcode;
   var $email;
   var $login;
   var $photo;
   var $photo_scfile_name;
   var $photo_ul_name;
   var $photo_scfile_type;
   var $photo_ul_type;
   var $photo_limpa;
   var $photo_salva;
   var $out_photo;
   var $out1_photo;
   var $observaciones;
   var $peso;
   var $talla;
   var $cobertura;
   var $vive_con;
   var $subsidio;
   var $confirm_pswd;
   var $matricular;
   var $matricular_1;
   var $novedades;
   var $pswd;
   var $year_mat;
   var $year_mat_1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['address']))
          {
              $this->address = $this->NM_ajax_info['param']['address'];
          }
          if (isset($this->NM_ajax_info['param']['anos_cumplidos']))
          {
              $this->anos_cumplidos = $this->NM_ajax_info['param']['anos_cumplidos'];
          }
          if (isset($this->NM_ajax_info['param']['ars']))
          {
              $this->ars = $this->NM_ajax_info['param']['ars'];
          }
          if (isset($this->NM_ajax_info['param']['barrio']))
          {
              $this->barrio = $this->NM_ajax_info['param']['barrio'];
          }
          if (isset($this->NM_ajax_info['param']['capacidades']))
          {
              $this->capacidades = $this->NM_ajax_info['param']['capacidades'];
          }
          if (isset($this->NM_ajax_info['param']['caracter']))
          {
              $this->caracter = $this->NM_ajax_info['param']['caracter'];
          }
          if (isset($this->NM_ajax_info['param']['certificado']))
          {
              $this->certificado = $this->NM_ajax_info['param']['certificado'];
          }
          if (isset($this->NM_ajax_info['param']['city']))
          {
              $this->city = $this->NM_ajax_info['param']['city'];
          }
          if (isset($this->NM_ajax_info['param']['cobertura']))
          {
              $this->cobertura = $this->NM_ajax_info['param']['cobertura'];
          }
          if (isset($this->NM_ajax_info['param']['confirm_pswd']))
          {
              $this->confirm_pswd = $this->NM_ajax_info['param']['confirm_pswd'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['departanebti_expedicion']))
          {
              $this->departanebti_expedicion = $this->NM_ajax_info['param']['departanebti_expedicion'];
          }
          if (isset($this->NM_ajax_info['param']['depto_expulsor']))
          {
              $this->depto_expulsor = $this->NM_ajax_info['param']['depto_expulsor'];
          }
          if (isset($this->NM_ajax_info['param']['discapacidades']))
          {
              $this->discapacidades = $this->NM_ajax_info['param']['discapacidades'];
          }
          if (isset($this->NM_ajax_info['param']['dpto_nacimiento']))
          {
              $this->dpto_nacimiento = $this->NM_ajax_info['param']['dpto_nacimiento'];
          }
          if (isset($this->NM_ajax_info['param']['email']))
          {
              $this->email = $this->NM_ajax_info['param']['email'];
          }
          if (isset($this->NM_ajax_info['param']['eps']))
          {
              $this->eps = $this->NM_ajax_info['param']['eps'];
          }
          if (isset($this->NM_ajax_info['param']['especialidad']))
          {
              $this->especialidad = $this->NM_ajax_info['param']['especialidad'];
          }
          if (isset($this->NM_ajax_info['param']['estatus']))
          {
              $this->estatus = $this->NM_ajax_info['param']['estatus'];
          }
          if (isset($this->NM_ajax_info['param']['estatus_vca']))
          {
              $this->estatus_vca = $this->NM_ajax_info['param']['estatus_vca'];
          }
          if (isset($this->NM_ajax_info['param']['estrato']))
          {
              $this->estrato = $this->NM_ajax_info['param']['estrato'];
          }
          if (isset($this->NM_ajax_info['param']['etnia']))
          {
              $this->etnia = $this->NM_ajax_info['param']['etnia'];
          }
          if (isset($this->NM_ajax_info['param']['fecha_expulsion']))
          {
              $this->fecha_expulsion = $this->NM_ajax_info['param']['fecha_expulsion'];
          }
          if (isset($this->NM_ajax_info['param']['fecha_matricula']))
          {
              $this->fecha_matricula = $this->NM_ajax_info['param']['fecha_matricula'];
          }
          if (isset($this->NM_ajax_info['param']['fecha_nacimiento']))
          {
              $this->fecha_nacimiento = $this->NM_ajax_info['param']['fecha_nacimiento'];
          }
          if (isset($this->NM_ajax_info['param']['firstname']))
          {
              $this->firstname = $this->NM_ajax_info['param']['firstname'];
          }
          if (isset($this->NM_ajax_info['param']['fuente_recurso']))
          {
              $this->fuente_recurso = $this->NM_ajax_info['param']['fuente_recurso'];
          }
          if (isset($this->NM_ajax_info['param']['genero']))
          {
              $this->genero = $this->NM_ajax_info['param']['genero'];
          }
          if (isset($this->NM_ajax_info['param']['grado_anterior']))
          {
              $this->grado_anterior = $this->NM_ajax_info['param']['grado_anterior'];
          }
          if (isset($this->NM_ajax_info['param']['grado_igreso']))
          {
              $this->grado_igreso = $this->NM_ajax_info['param']['grado_igreso'];
          }
          if (isset($this->NM_ajax_info['param']['id_grupo']))
          {
              $this->id_grupo = $this->NM_ajax_info['param']['id_grupo'];
          }
          if (isset($this->NM_ajax_info['param']['id_jornada']))
          {
              $this->id_jornada = $this->NM_ajax_info['param']['id_jornada'];
          }
          if (isset($this->NM_ajax_info['param']['id_nivel']))
          {
              $this->id_nivel = $this->NM_ajax_info['param']['id_nivel'];
          }
          if (isset($this->NM_ajax_info['param']['id_sede']))
          {
              $this->id_sede = $this->NM_ajax_info['param']['id_sede'];
          }
          if (isset($this->NM_ajax_info['param']['idstudents']))
          {
              $this->idstudents = $this->NM_ajax_info['param']['idstudents'];
          }
          if (isset($this->NM_ajax_info['param']['interno']))
          {
              $this->interno = $this->NM_ajax_info['param']['interno'];
          }
          if (isset($this->NM_ajax_info['param']['ips']))
          {
              $this->ips = $this->NM_ajax_info['param']['ips'];
          }
          if (isset($this->NM_ajax_info['param']['last_year']))
          {
              $this->last_year = $this->NM_ajax_info['param']['last_year'];
          }
          if (isset($this->NM_ajax_info['param']['lastname']))
          {
              $this->lastname = $this->NM_ajax_info['param']['lastname'];
          }
          if (isset($this->NM_ajax_info['param']['login']))
          {
              $this->login = $this->NM_ajax_info['param']['login'];
          }
          if (isset($this->NM_ajax_info['param']['matricular']))
          {
              $this->matricular = $this->NM_ajax_info['param']['matricular'];
          }
          if (isset($this->NM_ajax_info['param']['municipio_expedicion']))
          {
              $this->municipio_expedicion = $this->NM_ajax_info['param']['municipio_expedicion'];
          }
          if (isset($this->NM_ajax_info['param']['municipio_expulsor']))
          {
              $this->municipio_expulsor = $this->NM_ajax_info['param']['municipio_expulsor'];
          }
          if (isset($this->NM_ajax_info['param']['municipio_nacimiento']))
          {
              $this->municipio_nacimiento = $this->NM_ajax_info['param']['municipio_nacimiento'];
          }
          if (isset($this->NM_ajax_info['param']['negritudes']))
          {
              $this->negritudes = $this->NM_ajax_info['param']['negritudes'];
          }
          if (isset($this->NM_ajax_info['param']['nivel_sisben']))
          {
              $this->nivel_sisben = $this->NM_ajax_info['param']['nivel_sisben'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_ult_plantel']))
          {
              $this->nombre_ult_plantel = $this->NM_ajax_info['param']['nombre_ult_plantel'];
          }
          if (isset($this->NM_ajax_info['param']['novedades']))
          {
              $this->novedades = $this->NM_ajax_info['param']['novedades'];
          }
          if (isset($this->NM_ajax_info['param']['numero_carne_sisben']))
          {
              $this->numero_carne_sisben = $this->NM_ajax_info['param']['numero_carne_sisben'];
          }
          if (isset($this->NM_ajax_info['param']['numero_documento']))
          {
              $this->numero_documento = $this->NM_ajax_info['param']['numero_documento'];
          }
          if (isset($this->NM_ajax_info['param']['observaciones']))
          {
              $this->observaciones = $this->NM_ajax_info['param']['observaciones'];
          }
          if (isset($this->NM_ajax_info['param']['opcion']))
          {
              $this->opcion = $this->NM_ajax_info['param']['opcion'];
          }
          if (isset($this->NM_ajax_info['param']['otro_modelo']))
          {
              $this->otro_modelo = $this->NM_ajax_info['param']['otro_modelo'];
          }
          if (isset($this->NM_ajax_info['param']['peso']))
          {
              $this->peso = $this->NM_ajax_info['param']['peso'];
          }
          if (isset($this->NM_ajax_info['param']['photo']))
          {
              $this->photo = $this->NM_ajax_info['param']['photo'];
          }
          if (isset($this->NM_ajax_info['param']['photo_limpa']))
          {
              $this->photo_limpa = $this->NM_ajax_info['param']['photo_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['photo_salva']))
          {
              $this->photo_salva = $this->NM_ajax_info['param']['photo_salva'];
          }
          if (isset($this->NM_ajax_info['param']['photo_ul_name']))
          {
              $this->photo_ul_name = $this->NM_ajax_info['param']['photo_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['photo_ul_type']))
          {
              $this->photo_ul_type = $this->NM_ajax_info['param']['photo_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['postalcode']))
          {
              $this->postalcode = $this->NM_ajax_info['param']['postalcode'];
          }
          if (isset($this->NM_ajax_info['param']['primer_apellido']))
          {
              $this->primer_apellido = $this->NM_ajax_info['param']['primer_apellido'];
          }
          if (isset($this->NM_ajax_info['param']['primer_nombre']))
          {
              $this->primer_nombre = $this->NM_ajax_info['param']['primer_nombre'];
          }
          if (isset($this->NM_ajax_info['param']['pswd']))
          {
              $this->pswd = $this->NM_ajax_info['param']['pswd'];
          }
          if (isset($this->NM_ajax_info['param']['resguardo']))
          {
              $this->resguardo = $this->NM_ajax_info['param']['resguardo'];
          }
          if (isset($this->NM_ajax_info['param']['resultado']))
          {
              $this->resultado = $this->NM_ajax_info['param']['resultado'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['segundo_apellido']))
          {
              $this->segundo_apellido = $this->NM_ajax_info['param']['segundo_apellido'];
          }
          if (isset($this->NM_ajax_info['param']['segundo_nombre']))
          {
              $this->segundo_nombre = $this->NM_ajax_info['param']['segundo_nombre'];
          }
          if (isset($this->NM_ajax_info['param']['semestre']))
          {
              $this->semestre = $this->NM_ajax_info['param']['semestre'];
          }
          if (isset($this->NM_ajax_info['param']['state']))
          {
              $this->state = $this->NM_ajax_info['param']['state'];
          }
          if (isset($this->NM_ajax_info['param']['subsidado']))
          {
              $this->subsidado = $this->NM_ajax_info['param']['subsidado'];
          }
          if (isset($this->NM_ajax_info['param']['subsidio']))
          {
              $this->subsidio = $this->NM_ajax_info['param']['subsidio'];
          }
          if (isset($this->NM_ajax_info['param']['talla']))
          {
              $this->talla = $this->NM_ajax_info['param']['talla'];
          }
          if (isset($this->NM_ajax_info['param']['telefono']))
          {
              $this->telefono = $this->NM_ajax_info['param']['telefono'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_identificacion']))
          {
              $this->tipo_identificacion = $this->NM_ajax_info['param']['tipo_identificacion'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_sangre']))
          {
              $this->tipo_sangre = $this->NM_ajax_info['param']['tipo_sangre'];
          }
          if (isset($this->NM_ajax_info['param']['victima_conflicto']))
          {
              $this->victima_conflicto = $this->NM_ajax_info['param']['victima_conflicto'];
          }
          if (isset($this->NM_ajax_info['param']['vive_con']))
          {
              $this->vive_con = $this->NM_ajax_info['param']['vive_con'];
          }
          if (isset($this->NM_ajax_info['param']['year_mat']))
          {
              $this->year_mat = $this->NM_ajax_info['param']['year_mat'];
          }
          if (isset($this->NM_ajax_info['param']['zona']))
          {
              $this->zona = $this->NM_ajax_info['param']['zona'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->entorno) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['entorno'] = $this->entorno;
      }
      if (isset($_POST["entorno"])) 
      {
          $_SESSION['entorno'] = $this->entorno;
      }
      if (isset($_GET["entorno"])) 
      {
          $_SESSION['entorno'] = $this->entorno;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_students']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_students($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->entorno)) 
          {
              $_SESSION['entorno'] = $this->entorno;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_students']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_students']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_students']['total']))
          {
              $_SESSION['sc_session'][$script_case_init]['form_novedades_x_estudiante_fecha']['reg_start'] = "";
              unset($_SESSION['sc_session'][$script_case_init]['form_novedades_x_estudiante_fecha']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_students']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_students']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->entorno)) 
          {
              $_SESSION['entorno'] = $this->entorno;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_students']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_students']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_students_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_students']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_students']['upload_field_info']['photo'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_students',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '150',
          'upload_file_width'  => '150',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_students']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_students'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_students']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_students']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_students') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_students']['label'] = "" . $this->Ini->Nm_lang['lang_tbl_students'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_students")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['firstname'] = '' . $this->Ini->Nm_lang['lang_students_fld_firstname'] . '';
      $this->nm_new_label['lastname'] = '' . $this->Ini->Nm_lang['lang_students_fld_lastname'] . '';
      $this->nm_new_label['address'] = '' . $this->Ini->Nm_lang['lang_students_fld_address'] . '';
      $this->nm_new_label['city'] = '' . $this->Ini->Nm_lang['lang_students_fld_city'] . '';
      $this->nm_new_label['state'] = '' . $this->Ini->Nm_lang['lang_students_fld_state'] . '';
      $this->nm_new_label['postalcode'] = '' . $this->Ini->Nm_lang['lang_students_fld_postalcode'] . '';
      $this->nm_new_label['email'] = '' . $this->Ini->Nm_lang['lang_students_fld_email'] . '';
      $this->nm_new_label['login'] = '' . $this->Ini->Nm_lang['lang_students_fld_login'] . '';
      $this->nm_new_label['photo'] = '' . $this->Ini->Nm_lang['lang_students_fld_photo'] . '';
      $this->nm_new_label['confirm_pswd'] = '' . $this->Ini->Nm_lang['lang_sec_users_fild_pswd_confirm'] . '';
      $this->nm_new_label['pswd'] = '' . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . '';

      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['sc_btn_0']['hint']             = "";
      $this->arr_buttons['sc_btn_0']['type']             = "button";
      $this->arr_buttons['sc_btn_0']['value']            = "Borrar/Modificar_Matricula";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_students']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_students'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['photo_ul_name']) && '' != $this->NM_ajax_info['param']['photo_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_field_ul_name'][$this->photo_ul_name]))
          {
              $this->NM_ajax_info['param']['photo_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_field_ul_name'][$this->photo_ul_name];
          }
          $this->photo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['photo_ul_name'];
          $this->photo_scfile_name = substr($this->NM_ajax_info['param']['photo_ul_name'], 12);
          $this->photo_scfile_type = $this->NM_ajax_info['param']['photo_ul_type'];
          $this->photo_ul_name = $this->NM_ajax_info['param']['photo_ul_name'];
          $this->photo_ul_type = $this->NM_ajax_info['param']['photo_ul_type'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->photo             = sc_convert_encoding($this->photo,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->photo_scfile_name = sc_convert_encoding($this->photo_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->photo_ul_name     = sc_convert_encoding($this->photo_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->photo_ul_name) && '' != $this->photo_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_field_ul_name'][$this->photo_ul_name]))
          {
              $this->photo_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_field_ul_name'][$this->photo_ul_name];
          }
          $this->photo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->photo_ul_name;
          $this->photo_scfile_name = substr($this->photo_ul_name, 12);
          $this->photo_scfile_type = $this->photo_ul_type;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->photo             = sc_convert_encoding($this->photo,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->photo_scfile_name = sc_convert_encoding($this->photo_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->photo_ul_name     = sc_convert_encoding($this->photo_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_students']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_students']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_students']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_students']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_students']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_students']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_students']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_students']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_students']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_students']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_students']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_students']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_students']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_students']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_students']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_students']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_students']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_students']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_students']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['dados_form'];
          if (!isset($this->idstudents)){$this->idstudents = $this->nmgp_dados_form['idstudents'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_students", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_students/form_students_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_students_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_students_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_students_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_students/form_students_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_students_erro.class.php"); 
      }
      $this->Erro      = new form_students_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opcao']))
         { 
             if ($this->idstudents != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_students']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_students']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['sc_btn_0'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['botoes']['sc_btn_0'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      if ($this->nmgp_opcao == "excluir")
      {
          $GLOBALS['script_case_init'] = $this->Ini->sc_page;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['embutida_form'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['embutida_proc'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['reg_start'] = "";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_novedades_x_estudiante_fecha') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_novedades_x_estudiante_fecha') . "/form_novedades_x_estudiante_fecha_apl.php");
          $this->form_novedades_x_estudiante_fecha = new form_novedades_x_estudiante_fecha_apl;
      }
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->id_sede)) { $this->nm_limpa_alfa($this->id_sede); }
      if (isset($this->id_jornada)) { $this->nm_limpa_alfa($this->id_jornada); }
      if (isset($this->semestre)) { $this->nm_limpa_alfa($this->semestre); }
      if (isset($this->estatus)) { $this->nm_limpa_alfa($this->estatus); }
      if (isset($this->tipo_identificacion)) { $this->nm_limpa_alfa($this->tipo_identificacion); }
      if (isset($this->numero_documento)) { $this->nm_limpa_alfa($this->numero_documento); }
      if (isset($this->departanebti_expedicion)) { $this->nm_limpa_alfa($this->departanebti_expedicion); }
      if (isset($this->municipio_expedicion)) { $this->nm_limpa_alfa($this->municipio_expedicion); }
      if (isset($this->primer_nombre)) { $this->nm_limpa_alfa($this->primer_nombre); }
      if (isset($this->segundo_nombre)) { $this->nm_limpa_alfa($this->segundo_nombre); }
      if (isset($this->primer_apellido)) { $this->nm_limpa_alfa($this->primer_apellido); }
      if (isset($this->segundo_apellido)) { $this->nm_limpa_alfa($this->segundo_apellido); }
      if (isset($this->firstname)) { $this->nm_limpa_alfa($this->firstname); }
      if (isset($this->lastname)) { $this->nm_limpa_alfa($this->lastname); }
      if (isset($this->genero)) { $this->nm_limpa_alfa($this->genero); }
      if (isset($this->anos_cumplidos)) { $this->nm_limpa_alfa($this->anos_cumplidos); }
      if (isset($this->dpto_nacimiento)) { $this->nm_limpa_alfa($this->dpto_nacimiento); }
      if (isset($this->municipio_nacimiento)) { $this->nm_limpa_alfa($this->municipio_nacimiento); }
      if (isset($this->address)) { $this->nm_limpa_alfa($this->address); }
      if (isset($this->barrio)) { $this->nm_limpa_alfa($this->barrio); }
      if (isset($this->zona)) { $this->nm_limpa_alfa($this->zona); }
      if (isset($this->city)) { $this->nm_limpa_alfa($this->city); }
      if (isset($this->state)) { $this->nm_limpa_alfa($this->state); }
      if (isset($this->telefono)) { $this->nm_limpa_alfa($this->telefono); }
      if (isset($this->grado_anterior)) { $this->nm_limpa_alfa($this->grado_anterior); }
      if (isset($this->nombre_ult_plantel)) { $this->nm_limpa_alfa($this->nombre_ult_plantel); }
      if (isset($this->resultado)) { $this->nm_limpa_alfa($this->resultado); }
      if (isset($this->grado_igreso)) { $this->nm_limpa_alfa($this->grado_igreso); }
      if (isset($this->id_nivel)) { $this->nm_limpa_alfa($this->id_nivel); }
      if (isset($this->subsidado)) { $this->nm_limpa_alfa($this->subsidado); }
      if (isset($this->interno)) { $this->nm_limpa_alfa($this->interno); }
      if (isset($this->id_grupo)) { $this->nm_limpa_alfa($this->id_grupo); }
      if (isset($this->otro_modelo)) { $this->nm_limpa_alfa($this->otro_modelo); }
      if (isset($this->caracter)) { $this->nm_limpa_alfa($this->caracter); }
      if (isset($this->especialidad)) { $this->nm_limpa_alfa($this->especialidad); }
      if (isset($this->eps)) { $this->nm_limpa_alfa($this->eps); }
      if (isset($this->ips)) { $this->nm_limpa_alfa($this->ips); }
      if (isset($this->ars)) { $this->nm_limpa_alfa($this->ars); }
      if (isset($this->tipo_sangre)) { $this->nm_limpa_alfa($this->tipo_sangre); }
      if (isset($this->victima_conflicto)) { $this->nm_limpa_alfa($this->victima_conflicto); }
      if (isset($this->estatus_vca)) { $this->nm_limpa_alfa($this->estatus_vca); }
      if (isset($this->depto_expulsor)) { $this->nm_limpa_alfa($this->depto_expulsor); }
      if (isset($this->municipio_expulsor)) { $this->nm_limpa_alfa($this->municipio_expulsor); }
      if (isset($this->certificado)) { $this->nm_limpa_alfa($this->certificado); }
      if (isset($this->numero_carne_sisben)) { $this->nm_limpa_alfa($this->numero_carne_sisben); }
      if (isset($this->nivel_sisben)) { $this->nm_limpa_alfa($this->nivel_sisben); }
      if (isset($this->estrato)) { $this->nm_limpa_alfa($this->estrato); }
      if (isset($this->fuente_recurso)) { $this->nm_limpa_alfa($this->fuente_recurso); }
      if (isset($this->opcion)) { $this->nm_limpa_alfa($this->opcion); }
      if (isset($this->resguardo)) { $this->nm_limpa_alfa($this->resguardo); }
      if (isset($this->negritudes)) { $this->nm_limpa_alfa($this->negritudes); }
      if (isset($this->etnia)) { $this->nm_limpa_alfa($this->etnia); }
      if (isset($this->discapacidades)) { $this->nm_limpa_alfa($this->discapacidades); }
      if (isset($this->capacidades)) { $this->nm_limpa_alfa($this->capacidades); }
      if (isset($this->postalcode)) { $this->nm_limpa_alfa($this->postalcode); }
      if (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
      if (isset($this->login)) { $this->nm_limpa_alfa($this->login); }
      if (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
      if (isset($this->peso)) { $this->nm_limpa_alfa($this->peso); }
      if (isset($this->talla)) { $this->nm_limpa_alfa($this->talla); }
      if (isset($this->cobertura)) { $this->nm_limpa_alfa($this->cobertura); }
      if (isset($this->vive_con)) { $this->nm_limpa_alfa($this->vive_con); }
      if (isset($this->subsidio)) { $this->nm_limpa_alfa($this->subsidio); }
      if (isset($this->novedades)) { $this->nm_limpa_alfa($this->novedades); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- fecha_matricula
      $this->field_config['fecha_matricula']                 = array();
      $this->field_config['fecha_matricula']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha_matricula']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_matricula']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha_matricula');
      //-- fecha_nacimiento
      $this->field_config['fecha_nacimiento']                 = array();
      $this->field_config['fecha_nacimiento']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha_nacimiento']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_nacimiento']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha_nacimiento');
      //-- anos_cumplidos
      $this->field_config['anos_cumplidos']               = array();
      $this->field_config['anos_cumplidos']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anos_cumplidos']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anos_cumplidos']['symbol_dec'] = '';
      $this->field_config['anos_cumplidos']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anos_cumplidos']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- last_year
      $this->field_config['last_year']                 = array();
      $this->field_config['last_year']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['last_year']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['last_year']['date_display'] = "aaaa";
      $this->new_date_format('DT', 'last_year');
      //-- peso
      $this->field_config['peso']               = array();
      $this->field_config['peso']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['peso']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['peso']['symbol_dec'] = '';
      $this->field_config['peso']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['peso']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- talla
      $this->field_config['talla']               = array();
      $this->field_config['talla']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['talla']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['talla']['symbol_dec'] = '';
      $this->field_config['talla']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['talla']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha_expulsion
      $this->field_config['fecha_expulsion']                 = array();
      $this->field_config['fecha_expulsion']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha_expulsion']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_expulsion']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha_expulsion');
      //-- semestre
      $this->field_config['semestre']               = array();
      $this->field_config['semestre']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['semestre']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['semestre']['symbol_dec'] = '';
      $this->field_config['semestre']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['semestre']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idstudents
      $this->field_config['idstudents']               = array();
      $this->field_config['idstudents']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idstudents']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idstudents']['symbol_dec'] = '';
      $this->field_config['idstudents']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idstudents']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_estatus' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatus');
          }
          if ('validate_fecha_matricula' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha_matricula');
          }
          if ('validate_genero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'genero');
          }
          if ('validate_fecha_nacimiento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha_nacimiento');
          }
          if ('validate_primer_apellido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'primer_apellido');
          }
          if ('validate_segundo_apellido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'segundo_apellido');
          }
          if ('validate_primer_nombre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'primer_nombre');
          }
          if ('validate_segundo_nombre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'segundo_nombre');
          }
          if ('validate_tipo_identificacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_identificacion');
          }
          if ('validate_numero_documento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_documento');
          }
          if ('validate_departanebti_expedicion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'departanebti_expedicion');
          }
          if ('validate_municipio_expedicion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'municipio_expedicion');
          }
          if ('validate_firstname' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'firstname');
          }
          if ('validate_lastname' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lastname');
          }
          if ('validate_anos_cumplidos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anos_cumplidos');
          }
          if ('validate_dpto_nacimiento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dpto_nacimiento');
          }
          if ('validate_municipio_nacimiento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'municipio_nacimiento');
          }
          if ('validate_observaciones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observaciones');
          }
          if ('validate_login' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'login');
          }
          if ('validate_pswd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pswd');
          }
          if ('validate_confirm_pswd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'confirm_pswd');
          }
          if ('validate_photo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'photo');
          }
          if ('validate_state' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'state');
          }
          if ('validate_city' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'city');
          }
          if ('validate_address' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'address');
          }
          if ('validate_barrio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'barrio');
          }
          if ('validate_postalcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'postalcode');
          }
          if ('validate_zona' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zona');
          }
          if ('validate_telefono' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'telefono');
          }
          if ('validate_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'email');
          }
          if ('validate_id_sede' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_sede');
          }
          if ('validate_id_jornada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_jornada');
          }
          if ('validate_id_nivel' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_nivel');
          }
          if ('validate_grado_igreso' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'grado_igreso');
          }
          if ('validate_id_grupo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_grupo');
          }
          if ('validate_grado_anterior' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'grado_anterior');
          }
          if ('validate_last_year' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'last_year');
          }
          if ('validate_nombre_ult_plantel' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_ult_plantel');
          }
          if ('validate_resultado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'resultado');
          }
          if ('validate_subsidado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'subsidado');
          }
          if ('validate_interno' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'interno');
          }
          if ('validate_otro_modelo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'otro_modelo');
          }
          if ('validate_caracter' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'caracter');
          }
          if ('validate_especialidad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'especialidad');
          }
          if ('validate_year_mat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'year_mat');
          }
          if ('validate_matricular' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'matricular');
          }
          if ('validate_eps' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'eps');
          }
          if ('validate_ips' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ips');
          }
          if ('validate_ars' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ars');
          }
          if ('validate_tipo_sangre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_sangre');
          }
          if ('validate_victima_conflicto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'victima_conflicto');
          }
          if ('validate_peso' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'peso');
          }
          if ('validate_talla' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'talla');
          }
          if ('validate_cobertura' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobertura');
          }
          if ('validate_vive_con' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vive_con');
          }
          if ('validate_subsidio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'subsidio');
          }
          if ('validate_estatus_vca' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estatus_vca');
          }
          if ('validate_depto_expulsor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'depto_expulsor');
          }
          if ('validate_municipio_expulsor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'municipio_expulsor');
          }
          if ('validate_fecha_expulsion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha_expulsion');
          }
          if ('validate_certificado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'certificado');
          }
          if ('validate_semestre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'semestre');
          }
          if ('validate_numero_carne_sisben' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_carne_sisben');
          }
          if ('validate_nivel_sisben' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nivel_sisben');
          }
          if ('validate_estrato' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estrato');
          }
          if ('validate_fuente_recurso' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fuente_recurso');
          }
          if ('validate_opcion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'opcion');
          }
          if ('validate_resguardo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'resguardo');
          }
          if ('validate_negritudes' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'negritudes');
          }
          if ('validate_etnia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'etnia');
          }
          if ('validate_discapacidades' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'discapacidades');
          }
          if ('validate_capacidades' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'capacidades');
          }
          if ('validate_novedades' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'novedades');
          }
          form_students_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_fecha_nacimiento_onchange' == $this->NM_ajax_opcao)
          {
              $this->fecha_nacimiento_onChange();
          }
          if ('event_victima_conflicto_onchange' == $this->NM_ajax_opcao)
          {
              $this->victima_conflicto_onChange();
          }
          form_students_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_students_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_students']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_students_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_students_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_students_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'estatus':
               return "Estatus";
               break;
           case 'fecha_matricula':
               return "Fecha Matricula";
               break;
           case 'genero':
               return "Genero";
               break;
           case 'fecha_nacimiento':
               return "Fecha Nacimiento";
               break;
           case 'primer_apellido':
               return "Primer Apellido";
               break;
           case 'segundo_apellido':
               return "Segundo Apellido";
               break;
           case 'primer_nombre':
               return "Primer Nombre";
               break;
           case 'segundo_nombre':
               return "Segundo Nombre";
               break;
           case 'tipo_identificacion':
               return "Tipo Identificacion";
               break;
           case 'numero_documento':
               return "Número Documento";
               break;
           case 'departanebti_expedicion':
               return "Departamento Expedición";
               break;
           case 'municipio_expedicion':
               return "Municipio Expedición";
               break;
           case 'firstname':
               return "" . $this->Ini->Nm_lang['lang_students_fld_firstname'] . "";
               break;
           case 'lastname':
               return "" . $this->Ini->Nm_lang['lang_students_fld_lastname'] . "";
               break;
           case 'anos_cumplidos':
               return "Años Cumplidos";
               break;
           case 'dpto_nacimiento':
               return "Dpto Nacimiento";
               break;
           case 'municipio_nacimiento':
               return "Municipio Nacimiento";
               break;
           case 'observaciones':
               return "Observaciones";
               break;
           case 'login':
               return "" . $this->Ini->Nm_lang['lang_students_fld_login'] . "";
               break;
           case 'pswd':
               return "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . "";
               break;
           case 'confirm_pswd':
               return "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd_confirm'] . "";
               break;
           case 'photo':
               return "" . $this->Ini->Nm_lang['lang_students_fld_photo'] . "";
               break;
           case 'state':
               return "" . $this->Ini->Nm_lang['lang_students_fld_state'] . "";
               break;
           case 'city':
               return "" . $this->Ini->Nm_lang['lang_students_fld_city'] . "";
               break;
           case 'address':
               return "" . $this->Ini->Nm_lang['lang_students_fld_address'] . "";
               break;
           case 'barrio':
               return "Barrio";
               break;
           case 'postalcode':
               return "" . $this->Ini->Nm_lang['lang_students_fld_postalcode'] . "";
               break;
           case 'zona':
               return "Zona";
               break;
           case 'telefono':
               return "Telefono";
               break;
           case 'email':
               return "" . $this->Ini->Nm_lang['lang_students_fld_email'] . "";
               break;
           case 'id_sede':
               return "Sede";
               break;
           case 'id_jornada':
               return "Jornada";
               break;
           case 'id_nivel':
               return "Nivel";
               break;
           case 'grado_igreso':
               return "Grado Ingreso";
               break;
           case 'id_grupo':
               return "Grupo";
               break;
           case 'grado_anterior':
               return "Grado Anterior";
               break;
           case 'last_year':
               return "Ultimo Año";
               break;
           case 'nombre_ult_plantel':
               return "Nombre Ult Plantel";
               break;
           case 'resultado':
               return "Resultado";
               break;
           case 'subsidado':
               return "Subsidiado";
               break;
           case 'interno':
               return "Interno";
               break;
           case 'otro_modelo':
               return "Otro Modelo";
               break;
           case 'caracter':
               return "Caracter";
               break;
           case 'especialidad':
               return "Especialidad";
               break;
           case 'year_mat':
               return "Año a matricular";
               break;
           case 'matricular':
               return "Matricular";
               break;
           case 'eps':
               return "Eps";
               break;
           case 'ips':
               return "Ips";
               break;
           case 'ars':
               return "Ars";
               break;
           case 'tipo_sangre':
               return "Tipo Sangre";
               break;
           case 'victima_conflicto':
               return "Victima Conflicto";
               break;
           case 'peso':
               return "Peso";
               break;
           case 'talla':
               return "Talla";
               break;
           case 'cobertura':
               return "Cobertura";
               break;
           case 'vive_con':
               return "Vive Con";
               break;
           case 'subsidio':
               return "Subsidio";
               break;
           case 'estatus_vca':
               return "Estatus Victima Conflicto Armado";
               break;
           case 'depto_expulsor':
               return "Departamento Expulsor";
               break;
           case 'municipio_expulsor':
               return "Municipio Expulsor";
               break;
           case 'fecha_expulsion':
               return "Fecha Expulsion";
               break;
           case 'certificado':
               return "Certificado";
               break;
           case 'semestre':
               return "Semestre";
               break;
           case 'numero_carne_sisben':
               return "Numero Carne Sisben";
               break;
           case 'nivel_sisben':
               return "Nivel Sisben";
               break;
           case 'estrato':
               return "Estrato";
               break;
           case 'fuente_recurso':
               return "Fuente Recurso";
               break;
           case 'opcion':
               return "Opcion";
               break;
           case 'resguardo':
               return "Resguardo";
               break;
           case 'negritudes':
               return "Negritudes";
               break;
           case 'etnia':
               return "Etnia";
               break;
           case 'discapacidades':
               return "Discapacidades";
               break;
           case 'capacidades':
               return "Capacidades";
               break;
           case 'novedades':
               return "Novedades";
               break;
           case 'idstudents':
               return "Idstudents";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_students']) || !is_array($this->NM_ajax_info['errList']['geral_form_students']))
              {
                  $this->NM_ajax_info['errList']['geral_form_students'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_students'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'estatus' == $filtro)
        $this->ValidateField_estatus($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fecha_matricula' == $filtro)
        $this->ValidateField_fecha_matricula($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'genero' == $filtro)
        $this->ValidateField_genero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fecha_nacimiento' == $filtro)
        $this->ValidateField_fecha_nacimiento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'primer_apellido' == $filtro)
        $this->ValidateField_primer_apellido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'segundo_apellido' == $filtro)
        $this->ValidateField_segundo_apellido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'primer_nombre' == $filtro)
        $this->ValidateField_primer_nombre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'segundo_nombre' == $filtro)
        $this->ValidateField_segundo_nombre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_identificacion' == $filtro)
        $this->ValidateField_tipo_identificacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'numero_documento' == $filtro)
        $this->ValidateField_numero_documento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'departanebti_expedicion' == $filtro)
        $this->ValidateField_departanebti_expedicion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'municipio_expedicion' == $filtro)
        $this->ValidateField_municipio_expedicion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'firstname' == $filtro)
        $this->ValidateField_firstname($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lastname' == $filtro)
        $this->ValidateField_lastname($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'anos_cumplidos' == $filtro)
        $this->ValidateField_anos_cumplidos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dpto_nacimiento' == $filtro)
        $this->ValidateField_dpto_nacimiento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'municipio_nacimiento' == $filtro)
        $this->ValidateField_municipio_nacimiento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'observaciones' == $filtro)
        $this->ValidateField_observaciones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'login' == $filtro)
        $this->ValidateField_login($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pswd' == $filtro)
        $this->ValidateField_pswd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'confirm_pswd' == $filtro)
        $this->ValidateField_confirm_pswd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'photo' == $filtro)
        $this->ValidateField_photo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'state' == $filtro)
        $this->ValidateField_state($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'city' == $filtro)
        $this->ValidateField_city($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'address' == $filtro)
        $this->ValidateField_address($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'barrio' == $filtro)
        $this->ValidateField_barrio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'postalcode' == $filtro)
        $this->ValidateField_postalcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'zona' == $filtro)
        $this->ValidateField_zona($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'telefono' == $filtro)
        $this->ValidateField_telefono($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'email' == $filtro)
        $this->ValidateField_email($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_sede' == $filtro)
        $this->ValidateField_id_sede($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_jornada' == $filtro)
        $this->ValidateField_id_jornada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_nivel' == $filtro)
        $this->ValidateField_id_nivel($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'grado_igreso' == $filtro)
        $this->ValidateField_grado_igreso($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_grupo' == $filtro)
        $this->ValidateField_id_grupo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'grado_anterior' == $filtro)
        $this->ValidateField_grado_anterior($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'last_year' == $filtro)
        $this->ValidateField_last_year($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nombre_ult_plantel' == $filtro)
        $this->ValidateField_nombre_ult_plantel($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'resultado' == $filtro)
        $this->ValidateField_resultado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'subsidado' == $filtro)
        $this->ValidateField_subsidado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'interno' == $filtro)
        $this->ValidateField_interno($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'otro_modelo' == $filtro)
        $this->ValidateField_otro_modelo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'caracter' == $filtro)
        $this->ValidateField_caracter($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'especialidad' == $filtro)
        $this->ValidateField_especialidad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'year_mat' == $filtro)
        $this->ValidateField_year_mat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'matricular' == $filtro)
        $this->ValidateField_matricular($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'eps' == $filtro)
        $this->ValidateField_eps($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ips' == $filtro)
        $this->ValidateField_ips($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ars' == $filtro)
        $this->ValidateField_ars($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_sangre' == $filtro)
        $this->ValidateField_tipo_sangre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'victima_conflicto' == $filtro)
        $this->ValidateField_victima_conflicto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'peso' == $filtro)
        $this->ValidateField_peso($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'talla' == $filtro)
        $this->ValidateField_talla($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobertura' == $filtro)
        $this->ValidateField_cobertura($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'vive_con' == $filtro)
        $this->ValidateField_vive_con($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'subsidio' == $filtro)
        $this->ValidateField_subsidio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'estatus_vca' == $filtro)
        $this->ValidateField_estatus_vca($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'depto_expulsor' == $filtro)
        $this->ValidateField_depto_expulsor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'municipio_expulsor' == $filtro)
        $this->ValidateField_municipio_expulsor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fecha_expulsion' == $filtro)
        $this->ValidateField_fecha_expulsion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'certificado' == $filtro)
        $this->ValidateField_certificado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'semestre' == $filtro)
        $this->ValidateField_semestre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'numero_carne_sisben' == $filtro)
        $this->ValidateField_numero_carne_sisben($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nivel_sisben' == $filtro)
        $this->ValidateField_nivel_sisben($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'estrato' == $filtro)
        $this->ValidateField_estrato($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fuente_recurso' == $filtro)
        $this->ValidateField_fuente_recurso($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'opcion' == $filtro)
        $this->ValidateField_opcion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'resguardo' == $filtro)
        $this->ValidateField_resguardo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'negritudes' == $filtro)
        $this->ValidateField_negritudes($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'etnia' == $filtro)
        $this->ValidateField_etnia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'discapacidades' == $filtro)
        $this->ValidateField_discapacidades($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'capacidades' == $filtro)
        $this->ValidateField_capacidades($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'novedades' == $filtro)
        $this->ValidateField_novedades($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
//-- converter datas   
      $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_students']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_id_sede = $this->id_sede;
}
         if($this->id_sede < 1){
$this->id_sede = 399;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_id_sede != $this->id_sede || (isset($bFlagRead_id_sede) && $bFlagRead_id_sede)))
    {
        $this->ajax_return_values_id_sede(true);
    }
}
$_SESSION['scriptcase']['form_students']['contr_erro'] = 'off'; 
      }
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_estatus(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->estatus == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->estatus != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus']) && !in_array($this->estatus, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['estatus']))
              {
                  $Campos_Erros['estatus'] = array();
              }
              $Campos_Erros['estatus'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['estatus']) || !is_array($this->NM_ajax_info['errList']['estatus']))
              {
                  $this->NM_ajax_info['errList']['estatus'] = array();
              }
              $this->NM_ajax_info['errList']['estatus'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_estatus

    function ValidateField_fecha_matricula(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->fecha_matricula, $this->field_config['fecha_matricula']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecha_matricula']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecha_matricula']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecha_matricula']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecha_matricula']['date_sep']) ; 
          if (trim($this->fecha_matricula) != "")  
          { 
              if ($teste_validade->Data($this->fecha_matricula, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Fecha Matricula; " ; 
                  if (!isset($Campos_Erros['fecha_matricula']))
                  {
                      $Campos_Erros['fecha_matricula'] = array();
                  }
                  $Campos_Erros['fecha_matricula'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecha_matricula']) || !is_array($this->NM_ajax_info['errList']['fecha_matricula']))
                  {
                      $this->NM_ajax_info['errList']['fecha_matricula'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecha_matricula'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecha_matricula']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_fecha_matricula

    function ValidateField_genero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->genero == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->genero != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_genero']) && !in_array($this->genero, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_genero']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['genero']))
              {
                  $Campos_Erros['genero'] = array();
              }
              $Campos_Erros['genero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['genero']) || !is_array($this->NM_ajax_info['errList']['genero']))
              {
                  $this->NM_ajax_info['errList']['genero'] = array();
              }
              $this->NM_ajax_info['errList']['genero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_genero

    function ValidateField_fecha_nacimiento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->fecha_nacimiento, $this->field_config['fecha_nacimiento']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecha_nacimiento']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecha_nacimiento']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecha_nacimiento']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecha_nacimiento']['date_sep']) ; 
          if (trim($this->fecha_nacimiento) != "")  
          { 
              if ($teste_validade->Data($this->fecha_nacimiento, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Fecha Nacimiento; " ; 
                  if (!isset($Campos_Erros['fecha_nacimiento']))
                  {
                      $Campos_Erros['fecha_nacimiento'] = array();
                  }
                  $Campos_Erros['fecha_nacimiento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecha_nacimiento']) || !is_array($this->NM_ajax_info['errList']['fecha_nacimiento']))
                  {
                      $this->NM_ajax_info['errList']['fecha_nacimiento'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecha_nacimiento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecha_nacimiento']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_fecha_nacimiento

    function ValidateField_primer_apellido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->primer_apellido) > 30) 
          { 
              $Campos_Crit .= "Primer Apellido " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['primer_apellido']))
              {
                  $Campos_Erros['primer_apellido'] = array();
              }
              $Campos_Erros['primer_apellido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['primer_apellido']) || !is_array($this->NM_ajax_info['errList']['primer_apellido']))
              {
                  $this->NM_ajax_info['errList']['primer_apellido'] = array();
              }
              $this->NM_ajax_info['errList']['primer_apellido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_primer_apellido

    function ValidateField_segundo_apellido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->segundo_apellido) > 30) 
          { 
              $Campos_Crit .= "Segundo Apellido " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['segundo_apellido']))
              {
                  $Campos_Erros['segundo_apellido'] = array();
              }
              $Campos_Erros['segundo_apellido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['segundo_apellido']) || !is_array($this->NM_ajax_info['errList']['segundo_apellido']))
              {
                  $this->NM_ajax_info['errList']['segundo_apellido'] = array();
              }
              $this->NM_ajax_info['errList']['segundo_apellido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_segundo_apellido

    function ValidateField_primer_nombre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->primer_nombre) > 30) 
          { 
              $Campos_Crit .= "Primer Nombre " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['primer_nombre']))
              {
                  $Campos_Erros['primer_nombre'] = array();
              }
              $Campos_Erros['primer_nombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['primer_nombre']) || !is_array($this->NM_ajax_info['errList']['primer_nombre']))
              {
                  $this->NM_ajax_info['errList']['primer_nombre'] = array();
              }
              $this->NM_ajax_info['errList']['primer_nombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_primer_nombre

    function ValidateField_segundo_nombre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->segundo_nombre) > 30) 
          { 
              $Campos_Crit .= "Segundo Nombre " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['segundo_nombre']))
              {
                  $Campos_Erros['segundo_nombre'] = array();
              }
              $Campos_Erros['segundo_nombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['segundo_nombre']) || !is_array($this->NM_ajax_info['errList']['segundo_nombre']))
              {
                  $this->NM_ajax_info['errList']['segundo_nombre'] = array();
              }
              $this->NM_ajax_info['errList']['segundo_nombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_segundo_nombre

    function ValidateField_tipo_identificacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->tipo_identificacion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']) && !in_array($this->tipo_identificacion, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['tipo_identificacion']))
                   {
                       $Campos_Erros['tipo_identificacion'] = array();
                   }
                   $Campos_Erros['tipo_identificacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['tipo_identificacion']) || !is_array($this->NM_ajax_info['errList']['tipo_identificacion']))
                   {
                       $this->NM_ajax_info['errList']['tipo_identificacion'] = array();
                   }
                   $this->NM_ajax_info['errList']['tipo_identificacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_tipo_identificacion

    function ValidateField_numero_documento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numero_documento) > 15) 
          { 
              $Campos_Crit .= "Número Documento " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numero_documento']))
              {
                  $Campos_Erros['numero_documento'] = array();
              }
              $Campos_Erros['numero_documento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numero_documento']) || !is_array($this->NM_ajax_info['errList']['numero_documento']))
              {
                  $this->NM_ajax_info['errList']['numero_documento'] = array();
              }
              $this->NM_ajax_info['errList']['numero_documento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_numero_documento

    function ValidateField_departanebti_expedicion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->departanebti_expedicion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']) && !in_array($this->departanebti_expedicion, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['departanebti_expedicion']))
                   {
                       $Campos_Erros['departanebti_expedicion'] = array();
                   }
                   $Campos_Erros['departanebti_expedicion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['departanebti_expedicion']) || !is_array($this->NM_ajax_info['errList']['departanebti_expedicion']))
                   {
                       $this->NM_ajax_info['errList']['departanebti_expedicion'] = array();
                   }
                   $this->NM_ajax_info['errList']['departanebti_expedicion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_departanebti_expedicion

    function ValidateField_municipio_expedicion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->municipio_expedicion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']) && !in_array($this->municipio_expedicion, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['municipio_expedicion']))
                   {
                       $Campos_Erros['municipio_expedicion'] = array();
                   }
                   $Campos_Erros['municipio_expedicion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['municipio_expedicion']) || !is_array($this->NM_ajax_info['errList']['municipio_expedicion']))
                   {
                       $this->NM_ajax_info['errList']['municipio_expedicion'] = array();
                   }
                   $this->NM_ajax_info['errList']['municipio_expedicion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_municipio_expedicion

    function ValidateField_firstname(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->firstname) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_students_fld_firstname'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['firstname']))
              {
                  $Campos_Erros['firstname'] = array();
              }
              $Campos_Erros['firstname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['firstname']) || !is_array($this->NM_ajax_info['errList']['firstname']))
              {
                  $this->NM_ajax_info['errList']['firstname'] = array();
              }
              $this->NM_ajax_info['errList']['firstname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_firstname

    function ValidateField_lastname(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lastname) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_students_fld_lastname'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lastname']))
              {
                  $Campos_Erros['lastname'] = array();
              }
              $Campos_Erros['lastname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lastname']) || !is_array($this->NM_ajax_info['errList']['lastname']))
              {
                  $this->NM_ajax_info['errList']['lastname'] = array();
              }
              $this->NM_ajax_info['errList']['lastname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_lastname

    function ValidateField_anos_cumplidos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->anos_cumplidos == "")  
      { 
          $this->anos_cumplidos = 0;
          $this->sc_force_zero[] = 'anos_cumplidos';
      } 
      nm_limpa_numero($this->anos_cumplidos, $this->field_config['anos_cumplidos']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anos_cumplidos != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->anos_cumplidos) > $iTestSize)  
              { 
                  $Campos_Crit .= "Años Cumplidos: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['anos_cumplidos']))
                  {
                      $Campos_Erros['anos_cumplidos'] = array();
                  }
                  $Campos_Erros['anos_cumplidos'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['anos_cumplidos']) || !is_array($this->NM_ajax_info['errList']['anos_cumplidos']))
                  {
                      $this->NM_ajax_info['errList']['anos_cumplidos'] = array();
                  }
                  $this->NM_ajax_info['errList']['anos_cumplidos'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->anos_cumplidos, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Años Cumplidos; " ; 
                  if (!isset($Campos_Erros['anos_cumplidos']))
                  {
                      $Campos_Erros['anos_cumplidos'] = array();
                  }
                  $Campos_Erros['anos_cumplidos'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anos_cumplidos']) || !is_array($this->NM_ajax_info['errList']['anos_cumplidos']))
                  {
                      $this->NM_ajax_info['errList']['anos_cumplidos'] = array();
                  }
                  $this->NM_ajax_info['errList']['anos_cumplidos'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_anos_cumplidos

    function ValidateField_dpto_nacimiento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->dpto_nacimiento) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']) && !in_array($this->dpto_nacimiento, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['dpto_nacimiento']))
                   {
                       $Campos_Erros['dpto_nacimiento'] = array();
                   }
                   $Campos_Erros['dpto_nacimiento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['dpto_nacimiento']) || !is_array($this->NM_ajax_info['errList']['dpto_nacimiento']))
                   {
                       $this->NM_ajax_info['errList']['dpto_nacimiento'] = array();
                   }
                   $this->NM_ajax_info['errList']['dpto_nacimiento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_dpto_nacimiento

    function ValidateField_municipio_nacimiento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->municipio_nacimiento) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']) && !in_array($this->municipio_nacimiento, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['municipio_nacimiento']))
                   {
                       $Campos_Erros['municipio_nacimiento'] = array();
                   }
                   $Campos_Erros['municipio_nacimiento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['municipio_nacimiento']) || !is_array($this->NM_ajax_info['errList']['municipio_nacimiento']))
                   {
                       $this->NM_ajax_info['errList']['municipio_nacimiento'] = array();
                   }
                   $this->NM_ajax_info['errList']['municipio_nacimiento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_municipio_nacimiento

    function ValidateField_observaciones(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observaciones) > 32767) 
          { 
              $Campos_Crit .= "Observaciones " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['observaciones']))
              {
                  $Campos_Erros['observaciones'] = array();
              }
              $Campos_Erros['observaciones'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['observaciones']) || !is_array($this->NM_ajax_info['errList']['observaciones']))
              {
                  $this->NM_ajax_info['errList']['observaciones'] = array();
              }
              $this->NM_ajax_info['errList']['observaciones'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_observaciones

    function ValidateField_login(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->login) > 255) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_students_fld_login'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['login']))
              {
                  $Campos_Erros['login'] = array();
              }
              $Campos_Erros['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['login']) || !is_array($this->NM_ajax_info['errList']['login']))
              {
                  $this->NM_ajax_info['errList']['login'] = array();
              }
              $this->NM_ajax_info['errList']['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_login

    function ValidateField_pswd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->pswd) > 20) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pswd']))
              {
                  $Campos_Erros['pswd'] = array();
              }
              $Campos_Erros['pswd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pswd']) || !is_array($this->NM_ajax_info['errList']['pswd']))
              {
                  $this->NM_ajax_info['errList']['pswd'] = array();
              }
              $this->NM_ajax_info['errList']['pswd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_pswd

    function ValidateField_confirm_pswd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->confirm_pswd) > 20) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_sec_users_fild_pswd_confirm'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['confirm_pswd']))
              {
                  $Campos_Erros['confirm_pswd'] = array();
              }
              $Campos_Erros['confirm_pswd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['confirm_pswd']) || !is_array($this->NM_ajax_info['errList']['confirm_pswd']))
              {
                  $this->NM_ajax_info['errList']['confirm_pswd'] = array();
              }
              $this->NM_ajax_info['errList']['confirm_pswd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_confirm_pswd

    function ValidateField_photo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->photo;
            if ("" != $this->photo && "S" != $this->photo_limpa && !$teste_validade->ArqExtensao($this->photo, array()))
            {
                $Campos_Crit .= "{lang_students_fld_photo}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['photo']))
                {
                    $Campos_Erros['photo'] = array();
                }
                $Campos_Erros['photo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['photo']) || !is_array($this->NM_ajax_info['errList']['photo']))
                {
                    $this->NM_ajax_info['errList']['photo'] = array();
                }
                $this->NM_ajax_info['errList']['photo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
    } // ValidateField_photo

    function ValidateField_state(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->state) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']) && !in_array($this->state, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['state']))
                   {
                       $Campos_Erros['state'] = array();
                   }
                   $Campos_Erros['state'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['state']) || !is_array($this->NM_ajax_info['errList']['state']))
                   {
                       $this->NM_ajax_info['errList']['state'] = array();
                   }
                   $this->NM_ajax_info['errList']['state'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_state

    function ValidateField_city(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->city) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']) && !in_array($this->city, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['city']))
                   {
                       $Campos_Erros['city'] = array();
                   }
                   $Campos_Erros['city'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['city']) || !is_array($this->NM_ajax_info['errList']['city']))
                   {
                       $this->NM_ajax_info['errList']['city'] = array();
                   }
                   $this->NM_ajax_info['errList']['city'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_city

    function ValidateField_address(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->address) > 255) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_students_fld_address'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['address']))
              {
                  $Campos_Erros['address'] = array();
              }
              $Campos_Erros['address'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['address']) || !is_array($this->NM_ajax_info['errList']['address']))
              {
                  $this->NM_ajax_info['errList']['address'] = array();
              }
              $this->NM_ajax_info['errList']['address'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_address

    function ValidateField_barrio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->barrio) > 60) 
          { 
              $Campos_Crit .= "Barrio " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['barrio']))
              {
                  $Campos_Erros['barrio'] = array();
              }
              $Campos_Erros['barrio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['barrio']) || !is_array($this->NM_ajax_info['errList']['barrio']))
              {
                  $this->NM_ajax_info['errList']['barrio'] = array();
              }
              $this->NM_ajax_info['errList']['barrio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_barrio

    function ValidateField_postalcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->postalcode) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_students_fld_postalcode'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['postalcode']))
              {
                  $Campos_Erros['postalcode'] = array();
              }
              $Campos_Erros['postalcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['postalcode']) || !is_array($this->NM_ajax_info['errList']['postalcode']))
              {
                  $this->NM_ajax_info['errList']['postalcode'] = array();
              }
              $this->NM_ajax_info['errList']['postalcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_postalcode

    function ValidateField_zona(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->zona == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->zona != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_zona']) && !in_array($this->zona, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_zona']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['zona']))
              {
                  $Campos_Erros['zona'] = array();
              }
              $Campos_Erros['zona'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['zona']) || !is_array($this->NM_ajax_info['errList']['zona']))
              {
                  $this->NM_ajax_info['errList']['zona'] = array();
              }
              $this->NM_ajax_info['errList']['zona'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_zona

    function ValidateField_telefono(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->telefono) > 30) 
          { 
              $Campos_Crit .= "Telefono " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['telefono']))
              {
                  $Campos_Erros['telefono'] = array();
              }
              $Campos_Erros['telefono'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['telefono']) || !is_array($this->NM_ajax_info['errList']['telefono']))
              {
                  $this->NM_ajax_info['errList']['telefono'] = array();
              }
              $this->NM_ajax_info['errList']['telefono'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_telefono

    function ValidateField_email(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->email) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_students_fld_email'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['email']))
              {
                  $Campos_Erros['email'] = array();
              }
              $Campos_Erros['email'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['email']) || !is_array($this->NM_ajax_info['errList']['email']))
              {
                  $this->NM_ajax_info['errList']['email'] = array();
              }
              $this->NM_ajax_info['errList']['email'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_email

    function ValidateField_id_sede(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_sede) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']) && !in_array($this->id_sede, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_sede']))
                   {
                       $Campos_Erros['id_sede'] = array();
                   }
                   $Campos_Erros['id_sede'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_sede']) || !is_array($this->NM_ajax_info['errList']['id_sede']))
                   {
                       $this->NM_ajax_info['errList']['id_sede'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_sede'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_sede

    function ValidateField_id_jornada(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_jornada) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']) && !in_array($this->id_jornada, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_jornada']))
                   {
                       $Campos_Erros['id_jornada'] = array();
                   }
                   $Campos_Erros['id_jornada'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_jornada']) || !is_array($this->NM_ajax_info['errList']['id_jornada']))
                   {
                       $this->NM_ajax_info['errList']['id_jornada'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_jornada'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_jornada

    function ValidateField_id_nivel(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_nivel) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']) && !in_array($this->id_nivel, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_nivel']))
                   {
                       $Campos_Erros['id_nivel'] = array();
                   }
                   $Campos_Erros['id_nivel'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_nivel']) || !is_array($this->NM_ajax_info['errList']['id_nivel']))
                   {
                       $this->NM_ajax_info['errList']['id_nivel'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_nivel'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_nivel

    function ValidateField_grado_igreso(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->grado_igreso) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']) && !in_array($this->grado_igreso, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['grado_igreso']))
                   {
                       $Campos_Erros['grado_igreso'] = array();
                   }
                   $Campos_Erros['grado_igreso'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['grado_igreso']) || !is_array($this->NM_ajax_info['errList']['grado_igreso']))
                   {
                       $this->NM_ajax_info['errList']['grado_igreso'] = array();
                   }
                   $this->NM_ajax_info['errList']['grado_igreso'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_grado_igreso

    function ValidateField_id_grupo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_grupo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']) && !in_array($this->id_grupo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_grupo']))
                   {
                       $Campos_Erros['id_grupo'] = array();
                   }
                   $Campos_Erros['id_grupo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_grupo']) || !is_array($this->NM_ajax_info['errList']['id_grupo']))
                   {
                       $this->NM_ajax_info['errList']['id_grupo'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_grupo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_grupo

    function ValidateField_grado_anterior(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->grado_anterior) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']) && !in_array($this->grado_anterior, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['grado_anterior']))
                   {
                       $Campos_Erros['grado_anterior'] = array();
                   }
                   $Campos_Erros['grado_anterior'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['grado_anterior']) || !is_array($this->NM_ajax_info['errList']['grado_anterior']))
                   {
                       $this->NM_ajax_info['errList']['grado_anterior'] = array();
                   }
                   $this->NM_ajax_info['errList']['grado_anterior'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_grado_anterior

    function ValidateField_last_year(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->last_year, $this->field_config['last_year']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['last_year']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['last_year']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['last_year']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['last_year']['date_sep']) ; 
          if (trim($this->last_year) != "")  
          { 
              if ($teste_validade->Data($this->last_year, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Ultimo Año; " ; 
                  if (!isset($Campos_Erros['last_year']))
                  {
                      $Campos_Erros['last_year'] = array();
                  }
                  $Campos_Erros['last_year'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['last_year']) || !is_array($this->NM_ajax_info['errList']['last_year']))
                  {
                      $this->NM_ajax_info['errList']['last_year'] = array();
                  }
                  $this->NM_ajax_info['errList']['last_year'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['last_year']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_last_year

    function ValidateField_nombre_ult_plantel(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_ult_plantel) > 150) 
          { 
              $Campos_Crit .= "Nombre Ult Plantel " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_ult_plantel']))
              {
                  $Campos_Erros['nombre_ult_plantel'] = array();
              }
              $Campos_Erros['nombre_ult_plantel'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_ult_plantel']) || !is_array($this->NM_ajax_info['errList']['nombre_ult_plantel']))
              {
                  $this->NM_ajax_info['errList']['nombre_ult_plantel'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_ult_plantel'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nombre_ult_plantel

    function ValidateField_resultado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->resultado == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->resultado = "null"; 
      } 
    } // ValidateField_resultado

    function ValidateField_subsidado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->subsidado == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->subsidado != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_subsidado']) && !in_array($this->subsidado, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_subsidado']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['subsidado']))
              {
                  $Campos_Erros['subsidado'] = array();
              }
              $Campos_Erros['subsidado'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['subsidado']) || !is_array($this->NM_ajax_info['errList']['subsidado']))
              {
                  $this->NM_ajax_info['errList']['subsidado'] = array();
              }
              $this->NM_ajax_info['errList']['subsidado'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_subsidado

    function ValidateField_interno(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->interno == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->interno != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_interno']) && !in_array($this->interno, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_interno']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['interno']))
              {
                  $Campos_Erros['interno'] = array();
              }
              $Campos_Erros['interno'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['interno']) || !is_array($this->NM_ajax_info['errList']['interno']))
              {
                  $this->NM_ajax_info['errList']['interno'] = array();
              }
              $this->NM_ajax_info['errList']['interno'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_interno

    function ValidateField_otro_modelo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->otro_modelo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
    } // ValidateField_otro_modelo

    function ValidateField_caracter(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->caracter == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->caracter != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_caracter']) && !in_array($this->caracter, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_caracter']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['caracter']))
              {
                  $Campos_Erros['caracter'] = array();
              }
              $Campos_Erros['caracter'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['caracter']) || !is_array($this->NM_ajax_info['errList']['caracter']))
              {
                  $this->NM_ajax_info['errList']['caracter'] = array();
              }
              $this->NM_ajax_info['errList']['caracter'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_caracter

    function ValidateField_especialidad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->especialidad == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
    } // ValidateField_especialidad

    function ValidateField_year_mat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->year_mat == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->year_mat == "")  
      { 
          $this->year_mat = 0;
          $this->sc_force_zero[] = 'year_mat';
      } 
    } // ValidateField_year_mat

    function ValidateField_matricular(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->matricular == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->matricular == "")  
      { 
          $this->matricular = 0;
          $this->sc_force_zero[] = 'matricular';
      } 
    } // ValidateField_matricular

    function ValidateField_eps(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->eps) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_eps']) && !in_array($this->eps, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_eps']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['eps']))
                   {
                       $Campos_Erros['eps'] = array();
                   }
                   $Campos_Erros['eps'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['eps']) || !is_array($this->NM_ajax_info['errList']['eps']))
                   {
                       $this->NM_ajax_info['errList']['eps'] = array();
                   }
                   $this->NM_ajax_info['errList']['eps'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_eps

    function ValidateField_ips(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ips) > 100) 
          { 
              $Campos_Crit .= "Ips " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ips']))
              {
                  $Campos_Erros['ips'] = array();
              }
              $Campos_Erros['ips'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ips']) || !is_array($this->NM_ajax_info['errList']['ips']))
              {
                  $this->NM_ajax_info['errList']['ips'] = array();
              }
              $this->NM_ajax_info['errList']['ips'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_ips

    function ValidateField_ars(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ars) > 100) 
          { 
              $Campos_Crit .= "Ars " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ars']))
              {
                  $Campos_Erros['ars'] = array();
              }
              $Campos_Erros['ars'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ars']) || !is_array($this->NM_ajax_info['errList']['ars']))
              {
                  $this->NM_ajax_info['errList']['ars'] = array();
              }
              $this->NM_ajax_info['errList']['ars'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_ars

    function ValidateField_tipo_sangre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->tipo_sangre) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_sangre']) && !in_array($this->tipo_sangre, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_sangre']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['tipo_sangre']))
                   {
                       $Campos_Erros['tipo_sangre'] = array();
                   }
                   $Campos_Erros['tipo_sangre'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['tipo_sangre']) || !is_array($this->NM_ajax_info['errList']['tipo_sangre']))
                   {
                       $this->NM_ajax_info['errList']['tipo_sangre'] = array();
                   }
                   $this->NM_ajax_info['errList']['tipo_sangre'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_tipo_sangre

    function ValidateField_victima_conflicto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->victima_conflicto == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->victima_conflicto == "")  
      { 
          $this->victima_conflicto = 0;
          $this->sc_force_zero[] = 'victima_conflicto';
      } 
    } // ValidateField_victima_conflicto

    function ValidateField_peso(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->peso == "")  
      { 
          $this->peso = 0;
          $this->sc_force_zero[] = 'peso';
      } 
      nm_limpa_numero($this->peso, $this->field_config['peso']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->peso != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->peso) > $iTestSize)  
              { 
                  $Campos_Crit .= "Peso: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['peso']))
                  {
                      $Campos_Erros['peso'] = array();
                  }
                  $Campos_Erros['peso'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['peso']) || !is_array($this->NM_ajax_info['errList']['peso']))
                  {
                      $this->NM_ajax_info['errList']['peso'] = array();
                  }
                  $this->NM_ajax_info['errList']['peso'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->peso, 12, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Peso; " ; 
                  if (!isset($Campos_Erros['peso']))
                  {
                      $Campos_Erros['peso'] = array();
                  }
                  $Campos_Erros['peso'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['peso']) || !is_array($this->NM_ajax_info['errList']['peso']))
                  {
                      $this->NM_ajax_info['errList']['peso'] = array();
                  }
                  $this->NM_ajax_info['errList']['peso'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_peso

    function ValidateField_talla(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->talla == "")  
      { 
          $this->talla = 0;
          $this->sc_force_zero[] = 'talla';
      } 
      nm_limpa_numero($this->talla, $this->field_config['talla']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->talla != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->talla) > $iTestSize)  
              { 
                  $Campos_Crit .= "Talla: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['talla']))
                  {
                      $Campos_Erros['talla'] = array();
                  }
                  $Campos_Erros['talla'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['talla']) || !is_array($this->NM_ajax_info['errList']['talla']))
                  {
                      $this->NM_ajax_info['errList']['talla'] = array();
                  }
                  $this->NM_ajax_info['errList']['talla'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->talla, 12, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Talla; " ; 
                  if (!isset($Campos_Erros['talla']))
                  {
                      $Campos_Erros['talla'] = array();
                  }
                  $Campos_Erros['talla'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['talla']) || !is_array($this->NM_ajax_info['errList']['talla']))
                  {
                      $this->NM_ajax_info['errList']['talla'] = array();
                  }
                  $this->NM_ajax_info['errList']['talla'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_talla

    function ValidateField_cobertura(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cobertura) > 1) 
          { 
              $Campos_Crit .= "Cobertura " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cobertura']))
              {
                  $Campos_Erros['cobertura'] = array();
              }
              $Campos_Erros['cobertura'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cobertura']) || !is_array($this->NM_ajax_info['errList']['cobertura']))
              {
                  $this->NM_ajax_info['errList']['cobertura'] = array();
              }
              $this->NM_ajax_info['errList']['cobertura'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cobertura

    function ValidateField_vive_con(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->vive_con) > 255) 
          { 
              $Campos_Crit .= "Vive Con " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['vive_con']))
              {
                  $Campos_Erros['vive_con'] = array();
              }
              $Campos_Erros['vive_con'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['vive_con']) || !is_array($this->NM_ajax_info['errList']['vive_con']))
              {
                  $this->NM_ajax_info['errList']['vive_con'] = array();
              }
              $this->NM_ajax_info['errList']['vive_con'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_vive_con

    function ValidateField_subsidio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->subsidio) > 50) 
          { 
              $Campos_Crit .= "Subsidio " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['subsidio']))
              {
                  $Campos_Erros['subsidio'] = array();
              }
              $Campos_Erros['subsidio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['subsidio']) || !is_array($this->NM_ajax_info['errList']['subsidio']))
              {
                  $this->NM_ajax_info['errList']['subsidio'] = array();
              }
              $this->NM_ajax_info['errList']['subsidio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_subsidio

    function ValidateField_estatus_vca(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->estatus_vca) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus_vca']) && !in_array($this->estatus_vca, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus_vca']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['estatus_vca']))
                   {
                       $Campos_Erros['estatus_vca'] = array();
                   }
                   $Campos_Erros['estatus_vca'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['estatus_vca']) || !is_array($this->NM_ajax_info['errList']['estatus_vca']))
                   {
                       $this->NM_ajax_info['errList']['estatus_vca'] = array();
                   }
                   $this->NM_ajax_info['errList']['estatus_vca'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_estatus_vca

    function ValidateField_depto_expulsor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->depto_expulsor) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_depto_expulsor']) && !in_array($this->depto_expulsor, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_depto_expulsor']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['depto_expulsor']))
                   {
                       $Campos_Erros['depto_expulsor'] = array();
                   }
                   $Campos_Erros['depto_expulsor'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['depto_expulsor']) || !is_array($this->NM_ajax_info['errList']['depto_expulsor']))
                   {
                       $this->NM_ajax_info['errList']['depto_expulsor'] = array();
                   }
                   $this->NM_ajax_info['errList']['depto_expulsor'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_depto_expulsor

    function ValidateField_municipio_expulsor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->municipio_expulsor) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expulsor']) && !in_array($this->municipio_expulsor, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expulsor']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['municipio_expulsor']))
                   {
                       $Campos_Erros['municipio_expulsor'] = array();
                   }
                   $Campos_Erros['municipio_expulsor'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['municipio_expulsor']) || !is_array($this->NM_ajax_info['errList']['municipio_expulsor']))
                   {
                       $this->NM_ajax_info['errList']['municipio_expulsor'] = array();
                   }
                   $this->NM_ajax_info['errList']['municipio_expulsor'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_municipio_expulsor

    function ValidateField_fecha_expulsion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->fecha_expulsion, $this->field_config['fecha_expulsion']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecha_expulsion']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecha_expulsion']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecha_expulsion']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecha_expulsion']['date_sep']) ; 
          if (trim($this->fecha_expulsion) != "")  
          { 
              if ($teste_validade->Data($this->fecha_expulsion, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Fecha Expulsion; " ; 
                  if (!isset($Campos_Erros['fecha_expulsion']))
                  {
                      $Campos_Erros['fecha_expulsion'] = array();
                  }
                  $Campos_Erros['fecha_expulsion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecha_expulsion']) || !is_array($this->NM_ajax_info['errList']['fecha_expulsion']))
                  {
                      $this->NM_ajax_info['errList']['fecha_expulsion'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecha_expulsion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecha_expulsion']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_fecha_expulsion

    function ValidateField_certificado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->certificado == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->certificado != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_certificado']) && !in_array($this->certificado, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_certificado']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['certificado']))
              {
                  $Campos_Erros['certificado'] = array();
              }
              $Campos_Erros['certificado'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['certificado']) || !is_array($this->NM_ajax_info['errList']['certificado']))
              {
                  $this->NM_ajax_info['errList']['certificado'] = array();
              }
              $this->NM_ajax_info['errList']['certificado'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_certificado

    function ValidateField_semestre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->semestre == "")  
      { 
          $this->semestre = 0;
          $this->sc_force_zero[] = 'semestre';
      } 
      nm_limpa_numero($this->semestre, $this->field_config['semestre']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->semestre != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->semestre) > $iTestSize)  
              { 
                  $Campos_Crit .= "Semestre: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['semestre']))
                  {
                      $Campos_Erros['semestre'] = array();
                  }
                  $Campos_Erros['semestre'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['semestre']) || !is_array($this->NM_ajax_info['errList']['semestre']))
                  {
                      $this->NM_ajax_info['errList']['semestre'] = array();
                  }
                  $this->NM_ajax_info['errList']['semestre'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->semestre, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Semestre; " ; 
                  if (!isset($Campos_Erros['semestre']))
                  {
                      $Campos_Erros['semestre'] = array();
                  }
                  $Campos_Erros['semestre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['semestre']) || !is_array($this->NM_ajax_info['errList']['semestre']))
                  {
                      $this->NM_ajax_info['errList']['semestre'] = array();
                  }
                  $this->NM_ajax_info['errList']['semestre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_semestre

    function ValidateField_numero_carne_sisben(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numero_carne_sisben) > 20) 
          { 
              $Campos_Crit .= "Numero Carne Sisben " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numero_carne_sisben']))
              {
                  $Campos_Erros['numero_carne_sisben'] = array();
              }
              $Campos_Erros['numero_carne_sisben'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numero_carne_sisben']) || !is_array($this->NM_ajax_info['errList']['numero_carne_sisben']))
              {
                  $this->NM_ajax_info['errList']['numero_carne_sisben'] = array();
              }
              $this->NM_ajax_info['errList']['numero_carne_sisben'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_numero_carne_sisben

    function ValidateField_nivel_sisben(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nivel_sisben) > 20) 
          { 
              $Campos_Crit .= "Nivel Sisben " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nivel_sisben']))
              {
                  $Campos_Erros['nivel_sisben'] = array();
              }
              $Campos_Erros['nivel_sisben'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nivel_sisben']) || !is_array($this->NM_ajax_info['errList']['nivel_sisben']))
              {
                  $this->NM_ajax_info['errList']['nivel_sisben'] = array();
              }
              $this->NM_ajax_info['errList']['nivel_sisben'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nivel_sisben

    function ValidateField_estrato(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->estrato) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estrato']) && !in_array($this->estrato, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estrato']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['estrato']))
                   {
                       $Campos_Erros['estrato'] = array();
                   }
                   $Campos_Erros['estrato'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['estrato']) || !is_array($this->NM_ajax_info['errList']['estrato']))
                   {
                       $this->NM_ajax_info['errList']['estrato'] = array();
                   }
                   $this->NM_ajax_info['errList']['estrato'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_estrato

    function ValidateField_fuente_recurso(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->fuente_recurso) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_fuente_recurso']) && !in_array($this->fuente_recurso, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_fuente_recurso']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['fuente_recurso']))
                   {
                       $Campos_Erros['fuente_recurso'] = array();
                   }
                   $Campos_Erros['fuente_recurso'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['fuente_recurso']) || !is_array($this->NM_ajax_info['errList']['fuente_recurso']))
                   {
                       $this->NM_ajax_info['errList']['fuente_recurso'] = array();
                   }
                   $this->NM_ajax_info['errList']['fuente_recurso'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_fuente_recurso

    function ValidateField_opcion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->opcion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_opcion']) && !in_array($this->opcion, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_opcion']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['opcion']))
                   {
                       $Campos_Erros['opcion'] = array();
                   }
                   $Campos_Erros['opcion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['opcion']) || !is_array($this->NM_ajax_info['errList']['opcion']))
                   {
                       $this->NM_ajax_info['errList']['opcion'] = array();
                   }
                   $this->NM_ajax_info['errList']['opcion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_opcion

    function ValidateField_resguardo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->resguardo) > 60) 
          { 
              $Campos_Crit .= "Resguardo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['resguardo']))
              {
                  $Campos_Erros['resguardo'] = array();
              }
              $Campos_Erros['resguardo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['resguardo']) || !is_array($this->NM_ajax_info['errList']['resguardo']))
              {
                  $this->NM_ajax_info['errList']['resguardo'] = array();
              }
              $this->NM_ajax_info['errList']['resguardo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_resguardo

    function ValidateField_negritudes(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->negritudes == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->negritudes != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_negritudes']) && !in_array($this->negritudes, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_negritudes']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['negritudes']))
              {
                  $Campos_Erros['negritudes'] = array();
              }
              $Campos_Erros['negritudes'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['negritudes']) || !is_array($this->NM_ajax_info['errList']['negritudes']))
              {
                  $this->NM_ajax_info['errList']['negritudes'] = array();
              }
              $this->NM_ajax_info['errList']['negritudes'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_negritudes

    function ValidateField_etnia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->etnia) > 60) 
          { 
              $Campos_Crit .= "Etnia " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['etnia']))
              {
                  $Campos_Erros['etnia'] = array();
              }
              $Campos_Erros['etnia'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['etnia']) || !is_array($this->NM_ajax_info['errList']['etnia']))
              {
                  $this->NM_ajax_info['errList']['etnia'] = array();
              }
              $this->NM_ajax_info['errList']['etnia'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_etnia

    function ValidateField_discapacidades(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->discapacidades) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']) && !in_array($this->discapacidades, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['discapacidades']))
                   {
                       $Campos_Erros['discapacidades'] = array();
                   }
                   $Campos_Erros['discapacidades'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['discapacidades']) || !is_array($this->NM_ajax_info['errList']['discapacidades']))
                   {
                       $this->NM_ajax_info['errList']['discapacidades'] = array();
                   }
                   $this->NM_ajax_info['errList']['discapacidades'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_discapacidades

    function ValidateField_capacidades(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->capacidades) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']) && !in_array($this->capacidades, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['capacidades']))
                   {
                       $Campos_Erros['capacidades'] = array();
                   }
                   $Campos_Erros['capacidades'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['capacidades']) || !is_array($this->NM_ajax_info['errList']['capacidades']))
                   {
                       $this->NM_ajax_info['errList']['capacidades'] = array();
                   }
                   $this->NM_ajax_info['errList']['capacidades'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_capacidades

    function ValidateField_novedades(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->novedades) != "")  
          { 
          } 
      } 
    } // ValidateField_novedades
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros) 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->photo == "none") 
          { 
              $this->photo = ""; 
          } 
          if ($this->photo != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_students_doc_name.php';
              }
              $this->photo = sc_upload_unprotect_chars($this->photo);
              $this->photo_scfile_name = sc_upload_unprotect_chars($this->photo_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->photo_scfile_type = substr($this->photo_scfile_type, 0, strpos($this->photo_scfile_type, ";")) ; 
              } 
              if ($this->photo_scfile_type == "image/pjpeg" || $this->photo_scfile_type == "image/jpeg" || $this->photo_scfile_type == "image/gif" ||  
                  $this->photo_scfile_type == "image/png" || $this->photo_scfile_type == "image/x-png" || $this->photo_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->photo))  
                  { 
                      if ($this->nmgp_opcao == "incluir")
                      { 
                          $this->SC_IMG_photo = $this->photo;
                      } 
                      else 
                      { 
                          $arq_photo = fopen($this->photo, "r") ; 
                          $reg_photo = fread($arq_photo, filesize($this->photo)) ; 
                          fclose($arq_photo) ;  
                      } 
                      $this->photo =  trim($this->photo_scfile_name) ;  
                      $dir_img = $this->Ini->root . $this->Ini->path_imagens . "estudiante" . "/"; 
                     if ($this->nmgp_opcao != "incluir")
                     { 
                      if (nm_mkdir($dir_img))  
                      { 
                          $_test_file = $this->fetchUniqueUploadName($this->photo_scfile_name, $dir_img, "photo");
                          if (trim($this->photo_scfile_name) != $_test_file)
                          {
                              $this->photo_scfile_name = $_test_file;
                              $this->photo = $_test_file;
                          }
                          $arq_photo = fopen($dir_img . trim($this->photo_scfile_name), "w") ; 
                          fwrite($arq_photo, $reg_photo) ;  
                          fclose($arq_photo) ;  
                      } 
                      else 
                      { 
                          $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_students_fld_photo'] . ": " . $this->Ini->Nm_lang['lang_errm_ivdr']; 
                          $this->photo = "";
                          if (!isset($Campos_Erros['photo']))
                          {
                              $Campos_Erros['photo'] = array();
                          }
                          $Campos_Erros['photo'][] = $this->Ini->Nm_lang['lang_errm_ivdr'];
                          if (!isset($this->NM_ajax_info['errList']['photo']) || !is_array($this->NM_ajax_info['errList']['photo']))
                          {
                              $this->NM_ajax_info['errList']['photo'] = array();
                          }
                          $this->NM_ajax_info['errList']['photo'][] = $this->Ini->Nm_lang['lang_errm_ivdr'];
                      } 
                     } 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_students_fld_photo'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->photo = "";
                      if (!isset($Campos_Erros['photo']))
                      {
                          $Campos_Erros['photo'] = array();
                      }
                      $Campos_Erros['photo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['photo']) || !is_array($this->NM_ajax_info['errList']['photo']))
                      {
                          $this->NM_ajax_info['errList']['photo'] = array();
                      }
                      $this->NM_ajax_info['errList']['photo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->photo = "" ; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_students_fld_photo'] . " " . $this->Ini->Nm_lang['lang_errm_ivtp']; 
                      if (!isset($Campos_Erros['photo']))
                      {
                          $Campos_Erros['photo'] = array();
                      }
                      $Campos_Erros['photo'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                      if (!isset($this->NM_ajax_info['errList']['photo']) || !is_array($this->NM_ajax_info['errList']['photo']))
                      {
                          $this->NM_ajax_info['errList']['photo'] = array();
                      }
                      $this->NM_ajax_info['errList']['photo'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                  } 
              } 
          } 
          elseif (!empty($this->photo_salva) && $this->photo_limpa != "S")
          {
              $this->photo = $this->photo_salva;
          }
      } 
      elseif (!empty($this->photo_salva) && $this->photo_limpa != "S")
      {
          $this->photo = $this->photo_salva;
      }
   }

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['estatus'] = $this->estatus;
    $this->nmgp_dados_form['fecha_matricula'] = $this->fecha_matricula;
    $this->nmgp_dados_form['genero'] = $this->genero;
    $this->nmgp_dados_form['fecha_nacimiento'] = $this->fecha_nacimiento;
    $this->nmgp_dados_form['primer_apellido'] = $this->primer_apellido;
    $this->nmgp_dados_form['segundo_apellido'] = $this->segundo_apellido;
    $this->nmgp_dados_form['primer_nombre'] = $this->primer_nombre;
    $this->nmgp_dados_form['segundo_nombre'] = $this->segundo_nombre;
    $this->nmgp_dados_form['tipo_identificacion'] = $this->tipo_identificacion;
    $this->nmgp_dados_form['numero_documento'] = $this->numero_documento;
    $this->nmgp_dados_form['departanebti_expedicion'] = $this->departanebti_expedicion;
    $this->nmgp_dados_form['municipio_expedicion'] = $this->municipio_expedicion;
    $this->nmgp_dados_form['firstname'] = $this->firstname;
    $this->nmgp_dados_form['lastname'] = $this->lastname;
    $this->nmgp_dados_form['anos_cumplidos'] = $this->anos_cumplidos;
    $this->nmgp_dados_form['dpto_nacimiento'] = $this->dpto_nacimiento;
    $this->nmgp_dados_form['municipio_nacimiento'] = $this->municipio_nacimiento;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $this->nmgp_dados_form['login'] = $this->login;
    $this->nmgp_dados_form['pswd'] = $this->pswd;
    $this->nmgp_dados_form['confirm_pswd'] = $this->confirm_pswd;
    if (empty($this->photo))
    {
        $this->photo = $this->nmgp_dados_form['photo'];
    }
    $this->nmgp_dados_form['photo'] = $this->photo;
    $this->nmgp_dados_form['photo_limpa'] = $this->photo_limpa;
    $this->nmgp_dados_form['state'] = $this->state;
    $this->nmgp_dados_form['city'] = $this->city;
    $this->nmgp_dados_form['address'] = $this->address;
    $this->nmgp_dados_form['barrio'] = $this->barrio;
    $this->nmgp_dados_form['postalcode'] = $this->postalcode;
    $this->nmgp_dados_form['zona'] = $this->zona;
    $this->nmgp_dados_form['telefono'] = $this->telefono;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['id_sede'] = $this->id_sede;
    $this->nmgp_dados_form['id_jornada'] = $this->id_jornada;
    $this->nmgp_dados_form['id_nivel'] = $this->id_nivel;
    $this->nmgp_dados_form['grado_igreso'] = $this->grado_igreso;
    $this->nmgp_dados_form['id_grupo'] = $this->id_grupo;
    $this->nmgp_dados_form['grado_anterior'] = $this->grado_anterior;
    $this->nmgp_dados_form['last_year'] = $this->last_year;
    $this->nmgp_dados_form['nombre_ult_plantel'] = $this->nombre_ult_plantel;
    $this->nmgp_dados_form['resultado'] = $this->resultado;
    $this->nmgp_dados_form['subsidado'] = $this->subsidado;
    $this->nmgp_dados_form['interno'] = $this->interno;
    $this->nmgp_dados_form['otro_modelo'] = $this->otro_modelo;
    $this->nmgp_dados_form['caracter'] = $this->caracter;
    $this->nmgp_dados_form['especialidad'] = $this->especialidad;
    $this->nmgp_dados_form['year_mat'] = $this->year_mat;
    $this->nmgp_dados_form['matricular'] = $this->matricular;
    $this->nmgp_dados_form['eps'] = $this->eps;
    $this->nmgp_dados_form['ips'] = $this->ips;
    $this->nmgp_dados_form['ars'] = $this->ars;
    $this->nmgp_dados_form['tipo_sangre'] = $this->tipo_sangre;
    $this->nmgp_dados_form['victima_conflicto'] = $this->victima_conflicto;
    $this->nmgp_dados_form['peso'] = $this->peso;
    $this->nmgp_dados_form['talla'] = $this->talla;
    $this->nmgp_dados_form['cobertura'] = $this->cobertura;
    $this->nmgp_dados_form['vive_con'] = $this->vive_con;
    $this->nmgp_dados_form['subsidio'] = $this->subsidio;
    $this->nmgp_dados_form['estatus_vca'] = $this->estatus_vca;
    $this->nmgp_dados_form['depto_expulsor'] = $this->depto_expulsor;
    $this->nmgp_dados_form['municipio_expulsor'] = $this->municipio_expulsor;
    $this->nmgp_dados_form['fecha_expulsion'] = $this->fecha_expulsion;
    $this->nmgp_dados_form['certificado'] = $this->certificado;
    $this->nmgp_dados_form['semestre'] = $this->semestre;
    $this->nmgp_dados_form['numero_carne_sisben'] = $this->numero_carne_sisben;
    $this->nmgp_dados_form['nivel_sisben'] = $this->nivel_sisben;
    $this->nmgp_dados_form['estrato'] = $this->estrato;
    $this->nmgp_dados_form['fuente_recurso'] = $this->fuente_recurso;
    $this->nmgp_dados_form['opcion'] = $this->opcion;
    $this->nmgp_dados_form['resguardo'] = $this->resguardo;
    $this->nmgp_dados_form['negritudes'] = $this->negritudes;
    $this->nmgp_dados_form['etnia'] = $this->etnia;
    $this->nmgp_dados_form['discapacidades'] = $this->discapacidades;
    $this->nmgp_dados_form['capacidades'] = $this->capacidades;
    $this->nmgp_dados_form['novedades'] = $this->novedades;
    $this->nmgp_dados_form['idstudents'] = $this->idstudents;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_data($this->fecha_matricula, $this->field_config['fecha_matricula']['date_sep']) ; 
      nm_limpa_data($this->fecha_nacimiento, $this->field_config['fecha_nacimiento']['date_sep']) ; 
      nm_limpa_numero($this->anos_cumplidos, $this->field_config['anos_cumplidos']['symbol_grp']) ; 
      nm_limpa_data($this->last_year, $this->field_config['last_year']['date_sep']) ; 
      nm_limpa_numero($this->peso, $this->field_config['peso']['symbol_grp']) ; 
      nm_limpa_numero($this->talla, $this->field_config['talla']['symbol_grp']) ; 
      nm_limpa_data($this->fecha_expulsion, $this->field_config['fecha_expulsion']['date_sep']) ; 
      nm_limpa_numero($this->semestre, $this->field_config['semestre']['symbol_grp']) ; 
      nm_limpa_numero($this->idstudents, $this->field_config['idstudents']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "anos_cumplidos")
      {
          nm_limpa_numero($this->anos_cumplidos, $this->field_config['anos_cumplidos']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "peso")
      {
          nm_limpa_numero($this->peso, $this->field_config['peso']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "talla")
      {
          nm_limpa_numero($this->talla, $this->field_config['talla']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "semestre")
      {
          nm_limpa_numero($this->semestre, $this->field_config['semestre']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idstudents")
      {
          nm_limpa_numero($this->idstudents, $this->field_config['idstudents']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ((!empty($this->fecha_matricula) && 'null' != $this->fecha_matricula) || (!empty($format_fields) && isset($format_fields['fecha_matricula'])))
      {
          nm_volta_data($this->fecha_matricula, $this->field_config['fecha_matricula']['date_format']) ; 
          nmgp_Form_Datas($this->fecha_matricula, $this->field_config['fecha_matricula']['date_format'], $this->field_config['fecha_matricula']['date_sep']) ;  
      }
      elseif ('null' == $this->fecha_matricula || '' == $this->fecha_matricula)
      {
          $this->fecha_matricula = '';
      }
      if ((!empty($this->fecha_nacimiento) && 'null' != $this->fecha_nacimiento) || (!empty($format_fields) && isset($format_fields['fecha_nacimiento'])))
      {
          nm_volta_data($this->fecha_nacimiento, $this->field_config['fecha_nacimiento']['date_format']) ; 
          nmgp_Form_Datas($this->fecha_nacimiento, $this->field_config['fecha_nacimiento']['date_format'], $this->field_config['fecha_nacimiento']['date_sep']) ;  
      }
      elseif ('null' == $this->fecha_nacimiento || '' == $this->fecha_nacimiento)
      {
          $this->fecha_nacimiento = '';
      }
      if (!empty($this->anos_cumplidos) || (!empty($format_fields) && isset($format_fields['anos_cumplidos'])))
      {
          nmgp_Form_Num_Val($this->anos_cumplidos, $this->field_config['anos_cumplidos']['symbol_grp'], $this->field_config['anos_cumplidos']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['anos_cumplidos']['symbol_fmt']) ; 
      }
      if ((!empty($this->last_year) && 'null' != $this->last_year) || (!empty($format_fields) && isset($format_fields['last_year'])))
      {
          nm_volta_data($this->last_year, $this->field_config['last_year']['date_format']) ; 
          nmgp_Form_Datas($this->last_year, $this->field_config['last_year']['date_format'], $this->field_config['last_year']['date_sep']) ;  
      }
      elseif ('null' == $this->last_year || '' == $this->last_year)
      {
          $this->last_year = '';
      }
      if (!empty($this->peso) || (!empty($format_fields) && isset($format_fields['peso'])))
      {
          nmgp_Form_Num_Val($this->peso, $this->field_config['peso']['symbol_grp'], $this->field_config['peso']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['peso']['symbol_fmt']) ; 
      }
      if (!empty($this->talla) || (!empty($format_fields) && isset($format_fields['talla'])))
      {
          nmgp_Form_Num_Val($this->talla, $this->field_config['talla']['symbol_grp'], $this->field_config['talla']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['talla']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecha_expulsion) && 'null' != $this->fecha_expulsion) || (!empty($format_fields) && isset($format_fields['fecha_expulsion'])))
      {
          nm_volta_data($this->fecha_expulsion, $this->field_config['fecha_expulsion']['date_format']) ; 
          nmgp_Form_Datas($this->fecha_expulsion, $this->field_config['fecha_expulsion']['date_format'], $this->field_config['fecha_expulsion']['date_sep']) ;  
      }
      elseif ('null' == $this->fecha_expulsion || '' == $this->fecha_expulsion)
      {
          $this->fecha_expulsion = '';
      }
      if (!empty($this->semestre) || (!empty($format_fields) && isset($format_fields['semestre'])))
      {
          nmgp_Form_Num_Val($this->semestre, $this->field_config['semestre']['symbol_grp'], $this->field_config['semestre']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['semestre']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['fecha_matricula']['date_format'];
      if ($this->fecha_matricula != "")  
      { 
          nm_conv_data($this->fecha_matricula, $this->field_config['fecha_matricula']['date_format']) ; 
          $this->fecha_matricula_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecha_matricula_hora = substr($this->fecha_matricula_hora, 0, -4);
          }
      } 
      if ($this->fecha_matricula == "" && $use_null)  
      { 
          $this->fecha_matricula = "null" ; 
      } 
      $this->field_config['fecha_matricula']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fecha_nacimiento']['date_format'];
      if ($this->fecha_nacimiento != "")  
      { 
          nm_conv_data($this->fecha_nacimiento, $this->field_config['fecha_nacimiento']['date_format']) ; 
          $this->fecha_nacimiento_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecha_nacimiento_hora = substr($this->fecha_nacimiento_hora, 0, -4);
          }
      } 
      if ($this->fecha_nacimiento == "" && $use_null)  
      { 
          $this->fecha_nacimiento = "null" ; 
      } 
      $this->field_config['fecha_nacimiento']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['last_year']['date_format'];
      if ($this->last_year != "")  
      { 
          nm_conv_data($this->last_year, $this->field_config['last_year']['date_format']) ; 
          $this->last_year_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->last_year_hora = substr($this->last_year_hora, 0, -4);
          }
      } 
      if ($this->last_year == "" && $use_null)  
      { 
          $this->last_year = "null" ; 
      } 
      $this->field_config['last_year']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fecha_expulsion']['date_format'];
      if ($this->fecha_expulsion != "")  
      { 
          nm_conv_data($this->fecha_expulsion, $this->field_config['fecha_expulsion']['date_format']) ; 
          $this->fecha_expulsion_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecha_expulsion_hora = substr($this->fecha_expulsion_hora, 0, -4);
          }
      } 
      if ($this->fecha_expulsion == "" && $use_null)  
      { 
          $this->fecha_expulsion = "null" ; 
      } 
      $this->field_config['fecha_expulsion']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_estatus();
          $this->ajax_return_values_fecha_matricula();
          $this->ajax_return_values_genero();
          $this->ajax_return_values_fecha_nacimiento();
          $this->ajax_return_values_primer_apellido();
          $this->ajax_return_values_segundo_apellido();
          $this->ajax_return_values_primer_nombre();
          $this->ajax_return_values_segundo_nombre();
          $this->ajax_return_values_tipo_identificacion();
          $this->ajax_return_values_numero_documento();
          $this->ajax_return_values_departanebti_expedicion();
          $this->ajax_return_values_municipio_expedicion();
          $this->ajax_return_values_firstname();
          $this->ajax_return_values_lastname();
          $this->ajax_return_values_anos_cumplidos();
          $this->ajax_return_values_dpto_nacimiento();
          $this->ajax_return_values_municipio_nacimiento();
          $this->ajax_return_values_observaciones();
          $this->ajax_return_values_login();
          $this->ajax_return_values_pswd();
          $this->ajax_return_values_confirm_pswd();
          $this->ajax_return_values_photo();
          $this->ajax_return_values_state();
          $this->ajax_return_values_city();
          $this->ajax_return_values_address();
          $this->ajax_return_values_barrio();
          $this->ajax_return_values_postalcode();
          $this->ajax_return_values_zona();
          $this->ajax_return_values_telefono();
          $this->ajax_return_values_email();
          $this->ajax_return_values_id_sede();
          $this->ajax_return_values_id_jornada();
          $this->ajax_return_values_id_nivel();
          $this->ajax_return_values_grado_igreso();
          $this->ajax_return_values_id_grupo();
          $this->ajax_return_values_grado_anterior();
          $this->ajax_return_values_last_year();
          $this->ajax_return_values_nombre_ult_plantel();
          $this->ajax_return_values_resultado();
          $this->ajax_return_values_subsidado();
          $this->ajax_return_values_interno();
          $this->ajax_return_values_otro_modelo();
          $this->ajax_return_values_caracter();
          $this->ajax_return_values_especialidad();
          $this->ajax_return_values_year_mat();
          $this->ajax_return_values_matricular();
          $this->ajax_return_values_eps();
          $this->ajax_return_values_ips();
          $this->ajax_return_values_ars();
          $this->ajax_return_values_tipo_sangre();
          $this->ajax_return_values_victima_conflicto();
          $this->ajax_return_values_peso();
          $this->ajax_return_values_talla();
          $this->ajax_return_values_cobertura();
          $this->ajax_return_values_vive_con();
          $this->ajax_return_values_subsidio();
          $this->ajax_return_values_estatus_vca();
          $this->ajax_return_values_depto_expulsor();
          $this->ajax_return_values_municipio_expulsor();
          $this->ajax_return_values_fecha_expulsion();
          $this->ajax_return_values_certificado();
          $this->ajax_return_values_semestre();
          $this->ajax_return_values_numero_carne_sisben();
          $this->ajax_return_values_nivel_sisben();
          $this->ajax_return_values_estrato();
          $this->ajax_return_values_fuente_recurso();
          $this->ajax_return_values_opcion();
          $this->ajax_return_values_resguardo();
          $this->ajax_return_values_negritudes();
          $this->ajax_return_values_etnia();
          $this->ajax_return_values_discapacidades();
          $this->ajax_return_values_capacidades();
          $this->ajax_return_values_novedades();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idstudents']['keyVal'] = form_students_pack_protect_string($this->nmgp_dados_form['idstudents']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['foreign_key']['idstudents'] = $this->nmgp_dados_form['idstudents'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['where_filter'] = "idstudents = " . $this->nmgp_dados_form['idstudents'] . "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['where_detal']  = "idstudents = " . $this->nmgp_dados_form['idstudents'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['reg_start'] = "";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['total']);
          }
   } // ajax_return_values

          //----- estatus
   function ajax_return_values_estatus($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatus", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatus);
              $aLookup = array();
              $this->_tmp_lookup_estatus = $this->estatus;

$aLookup[] = array(form_students_pack_protect_string('N') => form_students_pack_protect_string("Nuevo"));
$aLookup[] = array(form_students_pack_protect_string('C') => form_students_pack_protect_string("Continuidad"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus'][] = 'N';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus'][] = 'C';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['estatus']) && !empty($this->NM_ajax_info['select_html']['estatus']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['estatus'];
          }
          $this->NM_ajax_info['fldList']['estatus'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatus']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatus']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatus']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatus']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatus']['labList'] = $aLabel;
          }
   }

          //----- fecha_matricula
   function ajax_return_values_fecha_matricula($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha_matricula", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha_matricula);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecha_matricula'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- genero
   function ajax_return_values_genero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("genero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->genero);
              $aLookup = array();
              $this->_tmp_lookup_genero = $this->genero;

$aLookup[] = array(form_students_pack_protect_string('M') => form_students_pack_protect_string("Masculino"));
$aLookup[] = array(form_students_pack_protect_string('F') => form_students_pack_protect_string("Femenino"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_genero'][] = 'M';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_genero'][] = 'F';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['genero']) && !empty($this->NM_ajax_info['select_html']['genero']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['genero'];
          }
          $this->NM_ajax_info['fldList']['genero'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['genero']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['genero']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['genero']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['genero']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['genero']['labList'] = $aLabel;
          }
   }

          //----- fecha_nacimiento
   function ajax_return_values_fecha_nacimiento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha_nacimiento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha_nacimiento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecha_nacimiento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- primer_apellido
   function ajax_return_values_primer_apellido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("primer_apellido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->primer_apellido);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['primer_apellido'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- segundo_apellido
   function ajax_return_values_segundo_apellido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("segundo_apellido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->segundo_apellido);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['segundo_apellido'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- primer_nombre
   function ajax_return_values_primer_nombre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("primer_nombre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->primer_nombre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['primer_nombre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- segundo_nombre
   function ajax_return_values_segundo_nombre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("segundo_nombre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->segundo_nombre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['segundo_nombre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipo_identificacion
   function ajax_return_values_tipo_identificacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_identificacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_identificacion);
              $aLookup = array();
              $this->_tmp_lookup_tipo_identificacion = $this->tipo_identificacion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT Id_tipo_identificacion, tipo 
FROM tipo_identificacion 
ORDER BY tipo";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_identificacion'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_identificacion\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_identificacion']) && !empty($this->NM_ajax_info['select_html']['tipo_identificacion']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['tipo_identificacion'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->tipo_identificacion == $sValue)
                  {
                      $this->_tmp_lookup_tipo_identificacion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_identificacion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_identificacion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_identificacion']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_identificacion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_identificacion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_identificacion']['labList'] = $aLabel;
          }
   }

          //----- numero_documento
   function ajax_return_values_numero_documento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_documento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numero_documento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numero_documento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- departanebti_expedicion
   function ajax_return_values_departanebti_expedicion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("departanebti_expedicion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->departanebti_expedicion);
              $aLookup = array();
              $this->_tmp_lookup_departanebti_expedicion = $this->departanebti_expedicion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_departanebti_expedicion'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"departanebti_expedicion\"";
          if (isset($this->NM_ajax_info['select_html']['departanebti_expedicion']) && !empty($this->NM_ajax_info['select_html']['departanebti_expedicion']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['departanebti_expedicion'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->departanebti_expedicion == $sValue)
                  {
                      $this->_tmp_lookup_departanebti_expedicion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['departanebti_expedicion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['departanebti_expedicion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['departanebti_expedicion']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['departanebti_expedicion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['departanebti_expedicion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['departanebti_expedicion']['labList'] = $aLabel;
          }
   }

          //----- municipio_expedicion
   function ajax_return_values_municipio_expedicion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("municipio_expedicion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->municipio_expedicion);
              $aLookup = array();
              $this->_tmp_lookup_municipio_expedicion = $this->municipio_expedicion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'] = array(); 
}
if ($this->departanebti_expedicion != "")
{ 
   $this->nm_clear_val("departanebti_expedicion");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
WHERE iddepartamento = $this->departanebti_expedicion
ORDER BY nombreMunicipio";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expedicion'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"municipio_expedicion\"";
          if (isset($this->NM_ajax_info['select_html']['municipio_expedicion']) && !empty($this->NM_ajax_info['select_html']['municipio_expedicion']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['municipio_expedicion'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->municipio_expedicion == $sValue)
                  {
                      $this->_tmp_lookup_municipio_expedicion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['municipio_expedicion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['municipio_expedicion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['municipio_expedicion']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['municipio_expedicion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['municipio_expedicion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['municipio_expedicion']['labList'] = $aLabel;
          }
   }

          //----- firstname
   function ajax_return_values_firstname($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("firstname", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->firstname);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['firstname'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- lastname
   function ajax_return_values_lastname($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lastname", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lastname);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lastname'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- anos_cumplidos
   function ajax_return_values_anos_cumplidos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anos_cumplidos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anos_cumplidos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anos_cumplidos'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- dpto_nacimiento
   function ajax_return_values_dpto_nacimiento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dpto_nacimiento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dpto_nacimiento);
              $aLookup = array();
              $this->_tmp_lookup_dpto_nacimiento = $this->dpto_nacimiento;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_dpto_nacimiento'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"dpto_nacimiento\"";
          if (isset($this->NM_ajax_info['select_html']['dpto_nacimiento']) && !empty($this->NM_ajax_info['select_html']['dpto_nacimiento']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['dpto_nacimiento'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->dpto_nacimiento == $sValue)
                  {
                      $this->_tmp_lookup_dpto_nacimiento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['dpto_nacimiento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['dpto_nacimiento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['dpto_nacimiento']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['dpto_nacimiento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['dpto_nacimiento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['dpto_nacimiento']['labList'] = $aLabel;
          }
   }

          //----- municipio_nacimiento
   function ajax_return_values_municipio_nacimiento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("municipio_nacimiento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->municipio_nacimiento);
              $aLookup = array();
              $this->_tmp_lookup_municipio_nacimiento = $this->municipio_nacimiento;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'] = array(); 
}
if ($this->dpto_nacimiento != "")
{ 
   $this->nm_clear_val("dpto_nacimiento");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
where iddepartamento = $this->dpto_nacimiento
ORDER BY nombreMunicipio";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_nacimiento'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"municipio_nacimiento\"";
          if (isset($this->NM_ajax_info['select_html']['municipio_nacimiento']) && !empty($this->NM_ajax_info['select_html']['municipio_nacimiento']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['municipio_nacimiento'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->municipio_nacimiento == $sValue)
                  {
                      $this->_tmp_lookup_municipio_nacimiento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['municipio_nacimiento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['municipio_nacimiento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['municipio_nacimiento']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['municipio_nacimiento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['municipio_nacimiento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['municipio_nacimiento']['labList'] = $aLabel;
          }
   }

          //----- observaciones
   function ajax_return_values_observaciones($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("observaciones", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->observaciones);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['observaciones'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- login
   function ajax_return_values_login($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("login", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->login);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['login'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pswd
   function ajax_return_values_pswd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pswd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pswd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pswd'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

          //----- confirm_pswd
   function ajax_return_values_confirm_pswd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("confirm_pswd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->confirm_pswd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['confirm_pswd'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

          //----- photo
   function ajax_return_values_photo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("photo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->photo);
              $aLookup = array();
   $out_photo = '';
   $out1_photo = '';
   if ($this->photo != "" && $this->photo != "none")   
   { 
       $path_photo = $this->Ini->root . $this->Ini->path_imagens . "estudiante" . "/" . $this->photo;
       $md5_photo  = md5("estudiante" . $this->photo);
       if (is_file($path_photo))  
       { 
           $NM_ler_img = true;
           $out_photo = $this->Ini->path_imag_temp . "/sc_photo_" . $md5_photo . ".gif" ;  
           $out1_photo = $out_photo; 
           if (is_file($this->Ini->root . $out_photo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_photo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_photo = fopen($path_photo, "r") ; 
               $reg_photo = fread($tmp_photo, filesize($path_photo)) ; 
               fclose($tmp_photo) ;  
               $arq_photo = fopen($this->Ini->root . $out_photo, "w") ;  
               fwrite($arq_photo, $reg_photo) ;  
               fclose($arq_photo) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_photo);
           $this->nmgp_return_img['photo'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['photo'][1] = $sc_obj_img->getWidth();
           $NM_redim_img = true;
           $md5_photo  = md5($this->photo);
           $out_photo = $this->Ini->path_imag_temp . "/sc_photo_150150" . $md5_photo . ".gif" ;  
           if (is_file($this->Ini->root . $out_photo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_photo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_redim_img = false;
               } 
           } 
           if ($NM_redim_img) 
           { 
               if (!$this->Ini->Gd_missing)
               { 
                   $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_photo);
                   $sc_obj_img->setWidth(150);
                   $sc_obj_img->setHeight(150);
                   $sc_obj_img->setManterAspecto(true);
                   $sc_obj_img->createImg($this->Ini->root . $out_photo);
               } 
               else 
               { 
                   $out_photo = $out1_photo;
               } 
           } 
       } 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['photo'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($sTmpValue),
               'imgFile' => $out_photo,
               'imgOrig' => $out1_photo,
               'keepImg' => $sKeepImage,
               'hideName' => 'S',
              );
          }
   }

          //----- state
   function ajax_return_values_state($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("state", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->state);
              $aLookup = array();
              $this->_tmp_lookup_state = $this->state;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_state'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"state\"";
          if (isset($this->NM_ajax_info['select_html']['state']) && !empty($this->NM_ajax_info['select_html']['state']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['state'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->state == $sValue)
                  {
                      $this->_tmp_lookup_state = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['state'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['state']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['state']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['state']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['state']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['state']['labList'] = $aLabel;
          }
   }

          //----- city
   function ajax_return_values_city($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("city", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->city);
              $aLookup = array();
              $this->_tmp_lookup_city = $this->city;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'] = array(); 
}
if ($this->state != "")
{ 
   $this->nm_clear_val("state");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
WHERE iddepartamento = $this->state
ORDER BY nombreMunicipio";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_city'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"city\"";
          if (isset($this->NM_ajax_info['select_html']['city']) && !empty($this->NM_ajax_info['select_html']['city']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['city'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->city == $sValue)
                  {
                      $this->_tmp_lookup_city = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['city'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['city']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['city']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['city']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['city']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['city']['labList'] = $aLabel;
          }
   }

          //----- address
   function ajax_return_values_address($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("address", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->address);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['address'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- barrio
   function ajax_return_values_barrio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("barrio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->barrio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['barrio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- postalcode
   function ajax_return_values_postalcode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("postalcode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->postalcode);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['postalcode'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- zona
   function ajax_return_values_zona($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zona", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zona);
              $aLookup = array();
              $this->_tmp_lookup_zona = $this->zona;

$aLookup[] = array(form_students_pack_protect_string('Rural') => form_students_pack_protect_string("Rural"));
$aLookup[] = array(form_students_pack_protect_string('Urbana') => form_students_pack_protect_string("Urbana"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_zona'][] = 'Rural';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_zona'][] = 'Urbana';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['zona']) && !empty($this->NM_ajax_info['select_html']['zona']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['zona'];
          }
          $this->NM_ajax_info['fldList']['zona'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['zona']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['zona']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['zona']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['zona']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['zona']['labList'] = $aLabel;
          }
   }

          //----- telefono
   function ajax_return_values_telefono($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telefono", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->telefono);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['telefono'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- email
   function ajax_return_values_email($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("email", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->email);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['email'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- id_sede
   function ajax_return_values_id_sede($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_sede", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_sede);
              $aLookup = array();
              $this->_tmp_lookup_id_sede = $this->id_sede;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_sede, sede 
FROM sedes 
ORDER BY id_sede";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_sede'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_sede\"";
          if (isset($this->NM_ajax_info['select_html']['id_sede']) && !empty($this->NM_ajax_info['select_html']['id_sede']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_sede'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->id_sede == $sValue)
                  {
                      $this->_tmp_lookup_id_sede = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_sede'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_sede']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_sede']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_sede']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_sede']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_sede']['labList'] = $aLabel;
          }
   }

          //----- id_jornada
   function ajax_return_values_id_jornada($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_jornada", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_jornada);
              $aLookup = array();
              $this->_tmp_lookup_id_jornada = $this->id_jornada;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_jornada, jornada 
FROM jornadas 
ORDER BY id_jornada";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_jornada'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_jornada\"";
          if (isset($this->NM_ajax_info['select_html']['id_jornada']) && !empty($this->NM_ajax_info['select_html']['id_jornada']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_jornada'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->id_jornada == $sValue)
                  {
                      $this->_tmp_lookup_id_jornada = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_jornada'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_jornada']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_jornada']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_jornada']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_jornada']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_jornada']['labList'] = $aLabel;
          }
   }

          //----- id_nivel
   function ajax_return_values_id_nivel($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_nivel", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_nivel);
              $aLookup = array();
              $this->_tmp_lookup_id_nivel = $this->id_nivel;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_nivel, nivel 
FROM niveles 
ORDER BY id_nivel";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_nivel'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_nivel\"";
          if (isset($this->NM_ajax_info['select_html']['id_nivel']) && !empty($this->NM_ajax_info['select_html']['id_nivel']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_nivel'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->id_nivel == $sValue)
                  {
                      $this->_tmp_lookup_id_nivel = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_nivel'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_nivel']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_nivel']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_nivel']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_nivel']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_nivel']['labList'] = $aLabel;
          }
   }

          //----- grado_igreso
   function ajax_return_values_grado_igreso($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("grado_igreso", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->grado_igreso);
              $aLookup = array();
              $this->_tmp_lookup_grado_igreso = $this->grado_igreso;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'] = array(); 
}
if ($this->id_nivel != "")
{ 
   $this->nm_clear_val("id_nivel");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
WHERE id_nivel = $this->id_nivel
ORDER BY  id_grado";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_igreso'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"grado_igreso\"";
          if (isset($this->NM_ajax_info['select_html']['grado_igreso']) && !empty($this->NM_ajax_info['select_html']['grado_igreso']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['grado_igreso'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->grado_igreso == $sValue)
                  {
                      $this->_tmp_lookup_grado_igreso = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['grado_igreso'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['grado_igreso']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['grado_igreso']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['grado_igreso']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['grado_igreso']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['grado_igreso']['labList'] = $aLabel;
          }
   }

          //----- id_grupo
   function ajax_return_values_id_grupo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_grupo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_grupo);
              $aLookup = array();
              $this->_tmp_lookup_id_grupo = $this->id_grupo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'][] = 'null';
if ($this->grado_igreso != "")
{ 
   $this->nm_clear_val("grado_igreso");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_grupo, nombre_grupo 
FROM t_grupos 
WHERE id_grado = $this->grado_igreso AND entorno = '" . $_SESSION['entorno'] . "'
ORDER BY nombre_grupo";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_id_grupo'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_grupo\"";
          if (isset($this->NM_ajax_info['select_html']['id_grupo']) && !empty($this->NM_ajax_info['select_html']['id_grupo']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_grupo'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->id_grupo == $sValue)
                  {
                      $this->_tmp_lookup_id_grupo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_grupo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_grupo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_grupo']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_grupo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_grupo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_grupo']['labList'] = $aLabel;
          }
   }

          //----- grado_anterior
   function ajax_return_values_grado_anterior($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("grado_anterior", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->grado_anterior);
              $aLookup = array();
              $this->_tmp_lookup_grado_anterior = $this->grado_anterior;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_grado, grado 
FROM t_grados 
ORDER BY  id_grado";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_grado_anterior'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"grado_anterior\"";
          if (isset($this->NM_ajax_info['select_html']['grado_anterior']) && !empty($this->NM_ajax_info['select_html']['grado_anterior']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['grado_anterior'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->grado_anterior == $sValue)
                  {
                      $this->_tmp_lookup_grado_anterior = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['grado_anterior'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['grado_anterior']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['grado_anterior']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['grado_anterior']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['grado_anterior']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['grado_anterior']['labList'] = $aLabel;
          }
   }

          //----- last_year
   function ajax_return_values_last_year($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("last_year", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->last_year);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['last_year'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- nombre_ult_plantel
   function ajax_return_values_nombre_ult_plantel($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_ult_plantel", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_ult_plantel);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_ult_plantel'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- resultado
   function ajax_return_values_resultado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("resultado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->resultado);
              $aLookup = array();
              $this->_tmp_lookup_resultado = $this->resultado;

$aLookup[] = array(form_students_pack_protect_string('A') => form_students_pack_protect_string("Aprobado"));
$aLookup[] = array(form_students_pack_protect_string('R') => form_students_pack_protect_string("Reprobado"));
$aLookup[] = array(form_students_pack_protect_string('D') => form_students_pack_protect_string("Desertó"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_resultado'][] = 'A';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_resultado'][] = 'R';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_resultado'][] = 'D';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"resultado\"";
          if (isset($this->NM_ajax_info['select_html']['resultado']) && !empty($this->NM_ajax_info['select_html']['resultado']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['resultado'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->resultado == $sValue)
                  {
                      $this->_tmp_lookup_resultado = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['resultado'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['resultado']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['resultado']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['resultado']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['resultado']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['resultado']['labList'] = $aLabel;
          }
   }

          //----- subsidado
   function ajax_return_values_subsidado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("subsidado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->subsidado);
              $aLookup = array();
              $this->_tmp_lookup_subsidado = $this->subsidado;

$aLookup[] = array(form_students_pack_protect_string('Y') => form_students_pack_protect_string("Si"));
$aLookup[] = array(form_students_pack_protect_string('N') => form_students_pack_protect_string("No"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_subsidado'][] = 'Y';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_subsidado'][] = 'N';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['subsidado']) && !empty($this->NM_ajax_info['select_html']['subsidado']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['subsidado'];
          }
          $this->NM_ajax_info['fldList']['subsidado'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['subsidado']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['subsidado']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['subsidado']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['subsidado']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['subsidado']['labList'] = $aLabel;
          }
   }

          //----- interno
   function ajax_return_values_interno($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("interno", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->interno);
              $aLookup = array();
              $this->_tmp_lookup_interno = $this->interno;

$aLookup[] = array(form_students_pack_protect_string('Y') => form_students_pack_protect_string("Sí"));
$aLookup[] = array(form_students_pack_protect_string('N') => form_students_pack_protect_string("No"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_interno'][] = 'Y';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_interno'][] = 'N';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['interno']) && !empty($this->NM_ajax_info['select_html']['interno']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['interno'];
          }
          $this->NM_ajax_info['fldList']['interno'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['interno']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['interno']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['interno']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['interno']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['interno']['labList'] = $aLabel;
          }
   }

          //----- otro_modelo
   function ajax_return_values_otro_modelo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("otro_modelo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->otro_modelo);
              $aLookup = array();
              $this->_tmp_lookup_otro_modelo = $this->otro_modelo;

$aLookup[] = array(form_students_pack_protect_string('N1') => form_students_pack_protect_string("Nivel I"));
$aLookup[] = array(form_students_pack_protect_string('N2') => form_students_pack_protect_string("Nivel II"));
$aLookup[] = array(form_students_pack_protect_string('OM') => form_students_pack_protect_string("Otro Modelo"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_otro_modelo'][] = 'N1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_otro_modelo'][] = 'N2';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_otro_modelo'][] = 'OM';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"otro_modelo\"";
          if (isset($this->NM_ajax_info['select_html']['otro_modelo']) && !empty($this->NM_ajax_info['select_html']['otro_modelo']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['otro_modelo'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->otro_modelo == $sValue)
                  {
                      $this->_tmp_lookup_otro_modelo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['otro_modelo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['otro_modelo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['otro_modelo']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['otro_modelo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['otro_modelo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['otro_modelo']['labList'] = $aLabel;
          }
   }

          //----- caracter
   function ajax_return_values_caracter($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("caracter", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->caracter);
              $aLookup = array();
              $this->_tmp_lookup_caracter = $this->caracter;

$aLookup[] = array(form_students_pack_protect_string('A') => form_students_pack_protect_string("Académico"));
$aLookup[] = array(form_students_pack_protect_string('T') => form_students_pack_protect_string("Técnico"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_caracter'][] = 'A';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_caracter'][] = 'T';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['caracter']) && !empty($this->NM_ajax_info['select_html']['caracter']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['caracter'];
          }
          $this->NM_ajax_info['fldList']['caracter'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['caracter']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['caracter']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['caracter']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['caracter']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['caracter']['labList'] = $aLabel;
          }
   }

          //----- especialidad
   function ajax_return_values_especialidad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("especialidad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->especialidad);
              $aLookup = array();
              $this->_tmp_lookup_especialidad = $this->especialidad;

$aLookup[] = array(form_students_pack_protect_string('NULL') => form_students_pack_protect_string("Seleccione"));
$aLookup[] = array(form_students_pack_protect_string('C') => form_students_pack_protect_string("Comercial"));
$aLookup[] = array(form_students_pack_protect_string('A') => form_students_pack_protect_string("Agropecuario"));
$aLookup[] = array(form_students_pack_protect_string('T') => form_students_pack_protect_string("Turismo"));
$aLookup[] = array(form_students_pack_protect_string('N') => form_students_pack_protect_string("Normalista"));
$aLookup[] = array(form_students_pack_protect_string('I') => form_students_pack_protect_string("Industrial"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'NULL';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'C';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'A';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'T';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'N';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_especialidad'][] = 'I';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"especialidad\"";
          if (isset($this->NM_ajax_info['select_html']['especialidad']) && !empty($this->NM_ajax_info['select_html']['especialidad']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['especialidad'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->especialidad == $sValue)
                  {
                      $this->_tmp_lookup_especialidad = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['especialidad'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['especialidad']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['especialidad']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['especialidad']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['especialidad']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['especialidad']['labList'] = $aLabel;
          }
   }

          //----- year_mat
   function ajax_return_values_year_mat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("year_mat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->year_mat);
              $aLookup = array();
              $this->_tmp_lookup_year_mat = $this->year_mat;

$aLookup[] = array(form_students_pack_protect_string('2017') => form_students_pack_protect_string("2017"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_year_mat'][] = '2017';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"year_mat\"";
          if (isset($this->NM_ajax_info['select_html']['year_mat']) && !empty($this->NM_ajax_info['select_html']['year_mat']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['year_mat'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->year_mat == $sValue)
                  {
                      $this->_tmp_lookup_year_mat = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['year_mat'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['year_mat']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['year_mat']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['year_mat']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['year_mat']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['year_mat']['labList'] = $aLabel;
          }
   }

          //----- matricular
   function ajax_return_values_matricular($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("matricular", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->matricular);
              $aLookup = array();
              $this->_tmp_lookup_matricular = $this->matricular;

$aLookup[] = array(form_students_pack_protect_string('1') => form_students_pack_protect_string("Si"));
$aLookup[] = array(form_students_pack_protect_string('2') => form_students_pack_protect_string("No"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_matricular'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_matricular'][] = '2';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"matricular\"";
          if (isset($this->NM_ajax_info['select_html']['matricular']) && !empty($this->NM_ajax_info['select_html']['matricular']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['matricular'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->matricular == $sValue)
                  {
                      $this->_tmp_lookup_matricular = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['matricular'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['matricular']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['matricular']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['matricular']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['matricular']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['matricular']['labList'] = $aLabel;
          }
   }

          //----- eps
   function ajax_return_values_eps($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("eps", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->eps);
              $aLookup = array();
              $this->_tmp_lookup_eps = $this->eps;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_eps']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_eps'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_eps']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_eps'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_eps, eps_nombre 
FROM eps 
ORDER BY eps_nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_eps'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"eps\"";
          if (isset($this->NM_ajax_info['select_html']['eps']) && !empty($this->NM_ajax_info['select_html']['eps']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['eps'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->eps == $sValue)
                  {
                      $this->_tmp_lookup_eps = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['eps'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['eps']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['eps']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['eps']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['eps']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['eps']['labList'] = $aLabel;
          }
   }

          //----- ips
   function ajax_return_values_ips($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ips", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ips);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ips'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ars
   function ajax_return_values_ars($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ars", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ars);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ars'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipo_sangre
   function ajax_return_values_tipo_sangre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_sangre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_sangre);
              $aLookup = array();
              $this->_tmp_lookup_tipo_sangre = $this->tipo_sangre;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_sangre']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_sangre'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_sangre']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_sangre'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT tipo_sangre, tipo_sangre 
FROM tipo_sangre 
ORDER BY tipo_sangre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_tipo_sangre'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_sangre\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_sangre']) && !empty($this->NM_ajax_info['select_html']['tipo_sangre']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['tipo_sangre'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->tipo_sangre == $sValue)
                  {
                      $this->_tmp_lookup_tipo_sangre = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_sangre'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_sangre']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_sangre']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_sangre']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_sangre']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_sangre']['labList'] = $aLabel;
          }
   }

          //----- victima_conflicto
   function ajax_return_values_victima_conflicto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("victima_conflicto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->victima_conflicto);
              $aLookup = array();
              $this->_tmp_lookup_victima_conflicto = $this->victima_conflicto;

$aLookup[] = array(form_students_pack_protect_string('1') => form_students_pack_protect_string("Si"));
$aLookup[] = array(form_students_pack_protect_string('2') => form_students_pack_protect_string("No"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_victima_conflicto'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_victima_conflicto'][] = '2';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"victima_conflicto\"";
          if (isset($this->NM_ajax_info['select_html']['victima_conflicto']) && !empty($this->NM_ajax_info['select_html']['victima_conflicto']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['victima_conflicto'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->victima_conflicto == $sValue)
                  {
                      $this->_tmp_lookup_victima_conflicto = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['victima_conflicto'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['victima_conflicto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['victima_conflicto']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['victima_conflicto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['victima_conflicto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['victima_conflicto']['labList'] = $aLabel;
          }
   }

          //----- peso
   function ajax_return_values_peso($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("peso", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->peso);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['peso'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- talla
   function ajax_return_values_talla($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("talla", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->talla);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['talla'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cobertura
   function ajax_return_values_cobertura($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobertura", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobertura);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobertura'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- vive_con
   function ajax_return_values_vive_con($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vive_con", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vive_con);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['vive_con'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- subsidio
   function ajax_return_values_subsidio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("subsidio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->subsidio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['subsidio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- estatus_vca
   function ajax_return_values_estatus_vca($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estatus_vca", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estatus_vca);
              $aLookup = array();
              $this->_tmp_lookup_estatus_vca = $this->estatus_vca;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus_vca']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus_vca'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus_vca']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus_vca'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_victima_conflicto, tipo 
FROM victima_conflicto 
ORDER BY tipo";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estatus_vca'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"estatus_vca\"";
          if (isset($this->NM_ajax_info['select_html']['estatus_vca']) && !empty($this->NM_ajax_info['select_html']['estatus_vca']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['estatus_vca'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->estatus_vca == $sValue)
                  {
                      $this->_tmp_lookup_estatus_vca = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['estatus_vca'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estatus_vca']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estatus_vca']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estatus_vca']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estatus_vca']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estatus_vca']['labList'] = $aLabel;
          }
   }

          //----- depto_expulsor
   function ajax_return_values_depto_expulsor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("depto_expulsor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->depto_expulsor);
              $aLookup = array();
              $this->_tmp_lookup_depto_expulsor = $this->depto_expulsor;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_depto_expulsor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_depto_expulsor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_depto_expulsor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_depto_expulsor'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_depto_expulsor'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT iddepartamento, nombre 
FROM departamento 
ORDER BY nombre";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_depto_expulsor'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"depto_expulsor\"";
          if (isset($this->NM_ajax_info['select_html']['depto_expulsor']) && !empty($this->NM_ajax_info['select_html']['depto_expulsor']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['depto_expulsor'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->depto_expulsor == $sValue)
                  {
                      $this->_tmp_lookup_depto_expulsor = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['depto_expulsor'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['depto_expulsor']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['depto_expulsor']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['depto_expulsor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['depto_expulsor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['depto_expulsor']['labList'] = $aLabel;
          }
   }

          //----- municipio_expulsor
   function ajax_return_values_municipio_expulsor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("municipio_expulsor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->municipio_expulsor);
              $aLookup = array();
              $this->_tmp_lookup_municipio_expulsor = $this->municipio_expulsor;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expulsor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expulsor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expulsor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expulsor'] = array(); 
}
if ($this->depto_expulsor != "")
{ 
   $this->nm_clear_val("depto_expulsor");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
WHERE iddepartamento = $this->depto_expulsor
ORDER BY nombreMunicipio";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_municipio_expulsor'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"municipio_expulsor\"";
          if (isset($this->NM_ajax_info['select_html']['municipio_expulsor']) && !empty($this->NM_ajax_info['select_html']['municipio_expulsor']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['municipio_expulsor'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->municipio_expulsor == $sValue)
                  {
                      $this->_tmp_lookup_municipio_expulsor = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['municipio_expulsor'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['municipio_expulsor']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['municipio_expulsor']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['municipio_expulsor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['municipio_expulsor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['municipio_expulsor']['labList'] = $aLabel;
          }
   }

          //----- fecha_expulsion
   function ajax_return_values_fecha_expulsion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha_expulsion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha_expulsion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecha_expulsion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- certificado
   function ajax_return_values_certificado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("certificado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->certificado);
              $aLookup = array();
              $this->_tmp_lookup_certificado = $this->certificado;

$aLookup[] = array(form_students_pack_protect_string('Y') => form_students_pack_protect_string("Sí"));
$aLookup[] = array(form_students_pack_protect_string('N') => form_students_pack_protect_string("No"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_certificado'][] = 'Y';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_certificado'][] = 'N';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['certificado']) && !empty($this->NM_ajax_info['select_html']['certificado']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['certificado'];
          }
          $this->NM_ajax_info['fldList']['certificado'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['certificado']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['certificado']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['certificado']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['certificado']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['certificado']['labList'] = $aLabel;
          }
   }

          //----- semestre
   function ajax_return_values_semestre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("semestre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->semestre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['semestre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- numero_carne_sisben
   function ajax_return_values_numero_carne_sisben($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_carne_sisben", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numero_carne_sisben);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numero_carne_sisben'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nivel_sisben
   function ajax_return_values_nivel_sisben($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nivel_sisben", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nivel_sisben);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nivel_sisben'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- estrato
   function ajax_return_values_estrato($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estrato", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estrato);
              $aLookup = array();
              $this->_tmp_lookup_estrato = $this->estrato;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estrato']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estrato'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estrato']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estrato'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estrato'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_estrato, estrato 
FROM estrato 
ORDER BY estrato";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_estrato'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"estrato\"";
          if (isset($this->NM_ajax_info['select_html']['estrato']) && !empty($this->NM_ajax_info['select_html']['estrato']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['estrato'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->estrato == $sValue)
                  {
                      $this->_tmp_lookup_estrato = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['estrato'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['estrato']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['estrato']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['estrato']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['estrato']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['estrato']['labList'] = $aLabel;
          }
   }

          //----- fuente_recurso
   function ajax_return_values_fuente_recurso($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fuente_recurso", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fuente_recurso);
              $aLookup = array();
              $this->_tmp_lookup_fuente_recurso = $this->fuente_recurso;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_fuente_recurso']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_fuente_recurso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_fuente_recurso']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_fuente_recurso'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_fuente_recurso'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_fuente_recurso, fuente_recurso 
FROM fuente_recurso 
ORDER BY fuente_recurso";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_fuente_recurso'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"fuente_recurso\"";
          if (isset($this->NM_ajax_info['select_html']['fuente_recurso']) && !empty($this->NM_ajax_info['select_html']['fuente_recurso']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['fuente_recurso'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->fuente_recurso == $sValue)
                  {
                      $this->_tmp_lookup_fuente_recurso = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['fuente_recurso'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fuente_recurso']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fuente_recurso']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fuente_recurso']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fuente_recurso']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fuente_recurso']['labList'] = $aLabel;
          }
   }

          //----- opcion
   function ajax_return_values_opcion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("opcion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->opcion);
              $aLookup = array();
              $this->_tmp_lookup_opcion = $this->opcion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_opcion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_opcion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_opcion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_opcion'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_opcion'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_opcion, opcion 
FROM opcion 
ORDER BY opcion";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_opcion'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"opcion\"";
          if (isset($this->NM_ajax_info['select_html']['opcion']) && !empty($this->NM_ajax_info['select_html']['opcion']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['opcion'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->opcion == $sValue)
                  {
                      $this->_tmp_lookup_opcion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['opcion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['opcion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['opcion']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['opcion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['opcion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['opcion']['labList'] = $aLabel;
          }
   }

          //----- resguardo
   function ajax_return_values_resguardo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("resguardo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->resguardo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['resguardo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- negritudes
   function ajax_return_values_negritudes($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("negritudes", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->negritudes);
              $aLookup = array();
              $this->_tmp_lookup_negritudes = $this->negritudes;

$aLookup[] = array(form_students_pack_protect_string('Y') => form_students_pack_protect_string("Sí"));
$aLookup[] = array(form_students_pack_protect_string('N') => form_students_pack_protect_string("No"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_negritudes'][] = 'Y';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_negritudes'][] = 'N';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['negritudes']) && !empty($this->NM_ajax_info['select_html']['negritudes']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['negritudes'];
          }
          $this->NM_ajax_info['fldList']['negritudes'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['negritudes']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['negritudes']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['negritudes']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['negritudes']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['negritudes']['labList'] = $aLabel;
          }
   }

          //----- etnia
   function ajax_return_values_etnia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("etnia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->etnia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['etnia'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- discapacidades
   function ajax_return_values_discapacidades($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("discapacidades", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->discapacidades);
              $aLookup = array();
              $this->_tmp_lookup_discapacidades = $this->discapacidades;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_discapacidad, discapacidad 
FROM discapacidades 
ORDER BY discapacidad";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_discapacidades'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"discapacidades\"";
          if (isset($this->NM_ajax_info['select_html']['discapacidades']) && !empty($this->NM_ajax_info['select_html']['discapacidades']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['discapacidades'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->discapacidades == $sValue)
                  {
                      $this->_tmp_lookup_discapacidades = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['discapacidades'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['discapacidades']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['discapacidades']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['discapacidades']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['discapacidades']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['discapacidades']['labList'] = $aLabel;
          }
   }

          //----- capacidades
   function ajax_return_values_capacidades($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("capacidades", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->capacidades);
              $aLookup = array();
              $this->_tmp_lookup_capacidades = $this->capacidades;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'] = array(); 
}
$aLookup[] = array(form_students_pack_protect_string('null') => form_students_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'][] = 'null';
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fecha_matricula = $this->fecha_matricula;
   $old_value_fecha_nacimiento = $this->fecha_nacimiento;
   $old_value_anos_cumplidos = $this->anos_cumplidos;
   $old_value_last_year = $this->last_year;
   $old_value_peso = $this->peso;
   $old_value_talla = $this->talla;
   $old_value_fecha_expulsion = $this->fecha_expulsion;
   $old_value_semestre = $this->semestre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_matricula = $this->fecha_matricula;
   $unformatted_value_fecha_nacimiento = $this->fecha_nacimiento;
   $unformatted_value_anos_cumplidos = $this->anos_cumplidos;
   $unformatted_value_last_year = $this->last_year;
   $unformatted_value_peso = $this->peso;
   $unformatted_value_talla = $this->talla;
   $unformatted_value_fecha_expulsion = $this->fecha_expulsion;
   $unformatted_value_semestre = $this->semestre;

   $nm_comando = "SELECT id_capacidad_excp, capacidad 
FROM capacidades 
ORDER BY capacidad";

   $this->fecha_matricula = $old_value_fecha_matricula;
   $this->fecha_nacimiento = $old_value_fecha_nacimiento;
   $this->anos_cumplidos = $old_value_anos_cumplidos;
   $this->last_year = $old_value_last_year;
   $this->peso = $old_value_peso;
   $this->talla = $old_value_talla;
   $this->fecha_expulsion = $old_value_fecha_expulsion;
   $this->semestre = $old_value_semestre;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_students_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['Lookup_capacidades'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"capacidades\"";
          if (isset($this->NM_ajax_info['select_html']['capacidades']) && !empty($this->NM_ajax_info['select_html']['capacidades']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['capacidades'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->capacidades == $sValue)
                  {
                      $this->_tmp_lookup_capacidades = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['capacidades'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['capacidades']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['capacidades']['valList'][$i] = form_students_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['capacidades']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['capacidades']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['capacidades']['labList'] = $aLabel;
          }
   }

          //----- novedades
   function ajax_return_values_novedades($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("novedades", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->novedades);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['novedades'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_par_idstudents'] = $this->form_encode_input($this->nmgp_dados_form['idstudents']);
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
      }
      else
      {
          if (!isset($this->nmgp_cmp_hidden["confirm_pswd"]))
          {
              $this->nmgp_cmp_hidden["confirm_pswd"] = "off"; $this->NM_ajax_info['fieldDisplay']['confirm_pswd'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["pswd"]))
          {
              $this->nmgp_cmp_hidden["pswd"] = "off"; $this->NM_ajax_info['fieldDisplay']['pswd'] = 'off';
          }
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_students']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_anos_cumplidos = $this->anos_cumplidos;
    $original_fecha_nacimiento = $this->fecha_nacimiento;
    $original_grado_igreso = $this->grado_igreso;
    $original_id_grupo = $this->id_grupo;
    $original_matricular = $this->matricular;
    $original_victima_conflicto = $this->victima_conflicto;
}
        $this->calculaEdad();


$update_table  = 'students';      
$update_where  = "idstudents = '$this->idstudents'"; 
$update_fields = array(   
     "anos_cumplidos = '$this->anos_cumplidos'",
    
 );

$update_sql = 'UPDATE ' . $update_table
    . ' SET '   . implode(', ', $update_fields)
    . ' WHERE ' . $update_where;

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_students_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;



if ($this->victima_conflicto  == 1)
{
$this->Ini->nm_hidden_blocos[5] = "on"; $this->NM_ajax_info['blockDisplay']['5'] = 'on';
}
else
{
$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off';
}



$check_sql = "SELECT  idstudents"
   . " FROM t_estudiante_grupo"
   . " WHERE idstudents = '" .$this->idstudents . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->nmgp_cmp_hidden["id_grupo"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_grupo'] = 'off';
   
}
		else     
{
	    $this->nmgp_cmp_hidden["id_grupo"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_grupo'] = 'on';
}

$check_sql = "SELECT idstudents"
   . " FROM matricula"
   . " WHERE idstudents = '" .$this->idstudents . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0])||$this->grado_igreso  == 16 )        
{

     $this->nmgp_cmp_hidden["matricular"] = "off"; $this->NM_ajax_info['fieldDisplay']['matricular'] = 'off';
     $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes["sc_btn_0"] = "on";;
}
		else     
{
            $this->nmgp_cmp_hidden["matricular"] = "on"; $this->NM_ajax_info['fieldDisplay']['matricular'] = 'on';
            $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes["sc_btn_0"] = "off";;
			
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_anos_cumplidos != $this->anos_cumplidos || (isset($bFlagRead_anos_cumplidos) && $bFlagRead_anos_cumplidos)))
    {
        $this->ajax_return_values_anos_cumplidos(true);
    }
    if (($original_fecha_nacimiento != $this->fecha_nacimiento || (isset($bFlagRead_fecha_nacimiento) && $bFlagRead_fecha_nacimiento)))
    {
        $this->ajax_return_values_fecha_nacimiento(true);
    }
    if (($original_grado_igreso != $this->grado_igreso || (isset($bFlagRead_grado_igreso) && $bFlagRead_grado_igreso)))
    {
        $this->ajax_return_values_grado_igreso(true);
    }
    if (($original_id_grupo != $this->id_grupo || (isset($bFlagRead_id_grupo) && $bFlagRead_id_grupo)))
    {
        $this->ajax_return_values_id_grupo(true);
    }
    if (($original_matricular != $this->matricular || (isset($bFlagRead_matricular) && $bFlagRead_matricular)))
    {
        $this->ajax_return_values_matricular(true);
    }
    if (($original_victima_conflicto != $this->victima_conflicto || (isset($bFlagRead_victima_conflicto) && $bFlagRead_victima_conflicto)))
    {
        $this->ajax_return_values_victima_conflicto(true);
    }
}
$_SESSION['scriptcase']['form_students']['contr_erro'] = 'off'; 
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_students']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_primer_apellido = $this->primer_apellido;
    $original_primer_nombre = $this->primer_nombre;
    $original_segundo_apellido = $this->segundo_apellido;
    $original_segundo_nombre = $this->segundo_nombre;
}
         

$check_sql = "SELECT primer_nombre "
   . " FROM students"
   . " WHERE primer_nombre = '" .$this->primer_nombre . "' AND segundo_nombre = " .$this->segundo_nombre . " AND primer_apellido = " .$this->primer_apellido . "  AND segundo_apellido = " .$this->segundo_apellido . " ";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
   

 
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Nombre Duplicado";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_students' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Nombre Duplicado";
 }
;	


}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_primer_apellido != $this->primer_apellido || (isset($bFlagRead_primer_apellido) && $bFlagRead_primer_apellido)))
    {
        $this->ajax_return_values_primer_apellido(true);
    }
    if (($original_primer_nombre != $this->primer_nombre || (isset($bFlagRead_primer_nombre) && $bFlagRead_primer_nombre)))
    {
        $this->ajax_return_values_primer_nombre(true);
    }
    if (($original_segundo_apellido != $this->segundo_apellido || (isset($bFlagRead_segundo_apellido) && $bFlagRead_segundo_apellido)))
    {
        $this->ajax_return_values_segundo_apellido(true);
    }
    if (($original_segundo_nombre != $this->segundo_nombre || (isset($bFlagRead_segundo_nombre) && $bFlagRead_segundo_nombre)))
    {
        $this->ajax_return_values_segundo_nombre(true);
    }
}
$_SESSION['scriptcase']['form_students']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_students']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fecha_matricula = $this->fecha_matricula;
    $original_firstname = $this->firstname;
    $original_grado_igreso = $this->grado_igreso;
    $original_id_grupo = $this->id_grupo;
    $original_id_jornada = $this->id_jornada;
    $original_id_sede = $this->id_sede;
    $original_lastname = $this->lastname;
    $original_matricular = $this->matricular;
    $original_primer_apellido = $this->primer_apellido;
    $original_primer_nombre = $this->primer_nombre;
    $original_segundo_apellido = $this->segundo_apellido;
    $original_segundo_nombre = $this->segundo_nombre;
    $original_semestre = $this->semestre;
    $original_year_mat = $this->year_mat;
}
if (!isset($this->sc_temp_entorno)) {$this->sc_temp_entorno = (isset($_SESSION['entorno'])) ? $_SESSION['entorno'] : "";}
         $this->firstname =$this->primer_nombre ." ".$this->segundo_nombre ;
$this->lastname  = $this->primer_apellido ." ".$this->segundo_apellido ;








$check_sql = "SELECT idstudents"
   . " FROM matricula"
   . " WHERE idstudents = '" .$this->idstudents . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
 $a = 1;   
}
		else     
{
		   $check_sql = 'SELECT students.idstudents'
   . ' FROM students LEFT JOIN novedades_x_estudiante_fecha ON students.idstudents = novedades_x_estudiante_fecha.idstudents
LEFT JOIN novedades ON novedades_x_estudiante_fecha.id_novedad = novedades.id_novedad
LEFT JOIN nov_exclu ON novedades.id_novedad = nov_exclu.id_novedad'
  . " WHERE students.idstudents = ".$this->idstudents ." AND nov_exclu.id_novedad IS NULL";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]) && $this->matricular == 1)     
{

$insert_table  = 'matricula';      
$insert_fields = array(   
     'idstudents' => $this->idstudents ,
     'year_matricula' => $this->year_mat ,
	 'fecha' => $this->fecha_matricula ,
	 'id_grado' => $this->grado_igreso ,
	'id_sede' => $this->id_sede ,
	'id_jornada' => $this->id_jornada ,
	'semestre' => $this->semestre ,
	
 );

$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';


     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_students_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	
}
		else     
{
		   
}

}


$check_table = 't_estudiante_grupo';    
$check_where = "idstudent = '".$this->idstudents ."'AND entorno =".$this->sc_temp_entorno .""; 

$check_sql = 'SELECT *'
   . ' FROM '  . $check_table
   . ' WHERE ' . $check_where;
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->dataset = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 
;

if (false == $this->dataset )
{
}
elseif ($this->dataset->EOF)
{
  if($this->id_grupo >=1){
	
	
	

$insert_table  = 't_estudiante_grupo';      
$insert_fields = array(   
     'id_grupo' => $this->id_grupo ,
	 'entorno' => $this->sc_temp_entorno,
     'idstudent' =>$this->idstudents ,
 );

$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';


     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_students_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
}
else
{
	


$update_table  = 't_estudiante_grupo';      
$update_where  = "idstudent = '".$this->idstudents ."' AND entorno = '".$this->year_mat ."' "; 
$update_fields = array(   
     "id_grupo = '".$this->id_grupo ."'",
    
 );

$update_sql = 'UPDATE ' . $update_table
    . ' SET '   . implode(', ', $update_fields)
    . ' WHERE ' . $update_where;

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_students_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;	
	
	
}
	}
if (isset($this->sc_temp_entorno)) { $_SESSION['entorno'] = $this->sc_temp_entorno;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fecha_matricula != $this->fecha_matricula || (isset($bFlagRead_fecha_matricula) && $bFlagRead_fecha_matricula)))
    {
        $this->ajax_return_values_fecha_matricula(true);
    }
    if (($original_firstname != $this->firstname || (isset($bFlagRead_firstname) && $bFlagRead_firstname)))
    {
        $this->ajax_return_values_firstname(true);
    }
    if (($original_grado_igreso != $this->grado_igreso || (isset($bFlagRead_grado_igreso) && $bFlagRead_grado_igreso)))
    {
        $this->ajax_return_values_grado_igreso(true);
    }
    if (($original_id_grupo != $this->id_grupo || (isset($bFlagRead_id_grupo) && $bFlagRead_id_grupo)))
    {
        $this->ajax_return_values_id_grupo(true);
    }
    if (($original_id_jornada != $this->id_jornada || (isset($bFlagRead_id_jornada) && $bFlagRead_id_jornada)))
    {
        $this->ajax_return_values_id_jornada(true);
    }
    if (($original_id_sede != $this->id_sede || (isset($bFlagRead_id_sede) && $bFlagRead_id_sede)))
    {
        $this->ajax_return_values_id_sede(true);
    }
    if (($original_lastname != $this->lastname || (isset($bFlagRead_lastname) && $bFlagRead_lastname)))
    {
        $this->ajax_return_values_lastname(true);
    }
    if (($original_matricular != $this->matricular || (isset($bFlagRead_matricular) && $bFlagRead_matricular)))
    {
        $this->ajax_return_values_matricular(true);
    }
    if (($original_primer_apellido != $this->primer_apellido || (isset($bFlagRead_primer_apellido) && $bFlagRead_primer_apellido)))
    {
        $this->ajax_return_values_primer_apellido(true);
    }
    if (($original_primer_nombre != $this->primer_nombre || (isset($bFlagRead_primer_nombre) && $bFlagRead_primer_nombre)))
    {
        $this->ajax_return_values_primer_nombre(true);
    }
    if (($original_segundo_apellido != $this->segundo_apellido || (isset($bFlagRead_segundo_apellido) && $bFlagRead_segundo_apellido)))
    {
        $this->ajax_return_values_segundo_apellido(true);
    }
    if (($original_segundo_nombre != $this->segundo_nombre || (isset($bFlagRead_segundo_nombre) && $bFlagRead_segundo_nombre)))
    {
        $this->ajax_return_values_segundo_nombre(true);
    }
    if (($original_semestre != $this->semestre || (isset($bFlagRead_semestre) && $bFlagRead_semestre)))
    {
        $this->ajax_return_values_semestre(true);
    }
    if (($original_year_mat != $this->year_mat || (isset($bFlagRead_year_mat) && $bFlagRead_year_mat)))
    {
        $this->ajax_return_values_year_mat(true);
    }
}
$_SESSION['scriptcase']['form_students']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $SC_tem_cmp_update = true; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['estatus'] = $this->estatus;
      $NM_val_form['fecha_matricula'] = $this->fecha_matricula;
      $NM_val_form['genero'] = $this->genero;
      $NM_val_form['fecha_nacimiento'] = $this->fecha_nacimiento;
      $NM_val_form['primer_apellido'] = $this->primer_apellido;
      $NM_val_form['segundo_apellido'] = $this->segundo_apellido;
      $NM_val_form['primer_nombre'] = $this->primer_nombre;
      $NM_val_form['segundo_nombre'] = $this->segundo_nombre;
      $NM_val_form['tipo_identificacion'] = $this->tipo_identificacion;
      $NM_val_form['numero_documento'] = $this->numero_documento;
      $NM_val_form['departanebti_expedicion'] = $this->departanebti_expedicion;
      $NM_val_form['municipio_expedicion'] = $this->municipio_expedicion;
      $NM_val_form['firstname'] = $this->firstname;
      $NM_val_form['lastname'] = $this->lastname;
      $NM_val_form['anos_cumplidos'] = $this->anos_cumplidos;
      $NM_val_form['dpto_nacimiento'] = $this->dpto_nacimiento;
      $NM_val_form['municipio_nacimiento'] = $this->municipio_nacimiento;
      $NM_val_form['observaciones'] = $this->observaciones;
      $NM_val_form['login'] = $this->login;
      $NM_val_form['pswd'] = $this->pswd;
      $NM_val_form['confirm_pswd'] = $this->confirm_pswd;
      $NM_val_form['photo'] = $this->photo;
      $NM_val_form['state'] = $this->state;
      $NM_val_form['city'] = $this->city;
      $NM_val_form['address'] = $this->address;
      $NM_val_form['barrio'] = $this->barrio;
      $NM_val_form['postalcode'] = $this->postalcode;
      $NM_val_form['zona'] = $this->zona;
      $NM_val_form['telefono'] = $this->telefono;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['id_sede'] = $this->id_sede;
      $NM_val_form['id_jornada'] = $this->id_jornada;
      $NM_val_form['id_nivel'] = $this->id_nivel;
      $NM_val_form['grado_igreso'] = $this->grado_igreso;
      $NM_val_form['id_grupo'] = $this->id_grupo;
      $NM_val_form['grado_anterior'] = $this->grado_anterior;
      $NM_val_form['last_year'] = $this->last_year;
      $NM_val_form['nombre_ult_plantel'] = $this->nombre_ult_plantel;
      $NM_val_form['resultado'] = $this->resultado;
      $NM_val_form['subsidado'] = $this->subsidado;
      $NM_val_form['interno'] = $this->interno;
      $NM_val_form['otro_modelo'] = $this->otro_modelo;
      $NM_val_form['caracter'] = $this->caracter;
      $NM_val_form['especialidad'] = $this->especialidad;
      $NM_val_form['year_mat'] = $this->year_mat;
      $NM_val_form['matricular'] = $this->matricular;
      $NM_val_form['eps'] = $this->eps;
      $NM_val_form['ips'] = $this->ips;
      $NM_val_form['ars'] = $this->ars;
      $NM_val_form['tipo_sangre'] = $this->tipo_sangre;
      $NM_val_form['victima_conflicto'] = $this->victima_conflicto;
      $NM_val_form['peso'] = $this->peso;
      $NM_val_form['talla'] = $this->talla;
      $NM_val_form['cobertura'] = $this->cobertura;
      $NM_val_form['vive_con'] = $this->vive_con;
      $NM_val_form['subsidio'] = $this->subsidio;
      $NM_val_form['estatus_vca'] = $this->estatus_vca;
      $NM_val_form['depto_expulsor'] = $this->depto_expulsor;
      $NM_val_form['municipio_expulsor'] = $this->municipio_expulsor;
      $NM_val_form['fecha_expulsion'] = $this->fecha_expulsion;
      $NM_val_form['certificado'] = $this->certificado;
      $NM_val_form['semestre'] = $this->semestre;
      $NM_val_form['numero_carne_sisben'] = $this->numero_carne_sisben;
      $NM_val_form['nivel_sisben'] = $this->nivel_sisben;
      $NM_val_form['estrato'] = $this->estrato;
      $NM_val_form['fuente_recurso'] = $this->fuente_recurso;
      $NM_val_form['opcion'] = $this->opcion;
      $NM_val_form['resguardo'] = $this->resguardo;
      $NM_val_form['negritudes'] = $this->negritudes;
      $NM_val_form['etnia'] = $this->etnia;
      $NM_val_form['discapacidades'] = $this->discapacidades;
      $NM_val_form['capacidades'] = $this->capacidades;
      $NM_val_form['novedades'] = $this->novedades;
      $NM_val_form['idstudents'] = $this->idstudents;
      if ($this->idstudents == "")  
      { 
          $this->idstudents = 0;
      } 
      if ($this->id_jornada == "")  
      { 
          $this->id_jornada = 0;
          $this->sc_force_zero[] = 'id_jornada';
      } 
      if ($this->semestre == "")  
      { 
          $this->semestre = 0;
          $this->sc_force_zero[] = 'semestre';
      } 
      if ($this->departanebti_expedicion == "")  
      { 
          $this->departanebti_expedicion = 0;
          $this->sc_force_zero[] = 'departanebti_expedicion';
      } 
      if ($this->municipio_expedicion == "")  
      { 
          $this->municipio_expedicion = 0;
          $this->sc_force_zero[] = 'municipio_expedicion';
      } 
      if ($this->anos_cumplidos == "")  
      { 
          $this->anos_cumplidos = 0;
          $this->sc_force_zero[] = 'anos_cumplidos';
      } 
      if ($this->dpto_nacimiento == "")  
      { 
          $this->dpto_nacimiento = 0;
          $this->sc_force_zero[] = 'dpto_nacimiento';
      } 
      if ($this->municipio_nacimiento == "")  
      { 
          $this->municipio_nacimiento = 0;
          $this->sc_force_zero[] = 'municipio_nacimiento';
      } 
      if ($this->city == "")  
      { 
          $this->city = 0;
          $this->sc_force_zero[] = 'city';
      } 
      if ($this->state == "")  
      { 
          $this->state = 0;
          $this->sc_force_zero[] = 'state';
      } 
      if ($this->grado_anterior == "")  
      { 
          $this->grado_anterior = 0;
          $this->sc_force_zero[] = 'grado_anterior';
      } 
      if ($this->grado_igreso == "")  
      { 
          $this->grado_igreso = 0;
          $this->sc_force_zero[] = 'grado_igreso';
      } 
      if ($this->id_nivel == "")  
      { 
          $this->id_nivel = 0;
          $this->sc_force_zero[] = 'id_nivel';
      } 
      if ($this->id_grupo == "")  
      { 
          $this->id_grupo = 0;
          $this->sc_force_zero[] = 'id_grupo';
      } 
      if ($this->eps == "")  
      { 
          $this->eps = 0;
          $this->sc_force_zero[] = 'eps';
      } 
      if ($this->victima_conflicto == "")  
      { 
          $this->victima_conflicto = 0;
          $this->sc_force_zero[] = 'victima_conflicto';
      } 
      if ($this->estatus_vca == "")  
      { 
          $this->estatus_vca = 0;
          $this->sc_force_zero[] = 'estatus_vca';
      } 
      if ($this->depto_expulsor == "")  
      { 
          $this->depto_expulsor = 0;
          $this->sc_force_zero[] = 'depto_expulsor';
      } 
      if ($this->municipio_expulsor == "")  
      { 
          $this->municipio_expulsor = 0;
          $this->sc_force_zero[] = 'municipio_expulsor';
      } 
      if ($this->estrato == "")  
      { 
          $this->estrato = 0;
          $this->sc_force_zero[] = 'estrato';
      } 
      if ($this->fuente_recurso == "")  
      { 
          $this->fuente_recurso = 0;
          $this->sc_force_zero[] = 'fuente_recurso';
      } 
      if ($this->opcion == "")  
      { 
          $this->opcion = 0;
          $this->sc_force_zero[] = 'opcion';
      } 
      if ($this->discapacidades == "")  
      { 
          $this->discapacidades = 0;
          $this->sc_force_zero[] = 'discapacidades';
      } 
      if ($this->capacidades == "")  
      { 
          $this->capacidades = 0;
          $this->sc_force_zero[] = 'capacidades';
      } 
      if ($this->peso == "")  
      { 
          $this->peso = 0;
          $this->sc_force_zero[] = 'peso';
      } 
      if ($this->talla == "")  
      { 
          $this->talla = 0;
          $this->sc_force_zero[] = 'talla';
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->id_sede_before_qstr = $this->id_sede;
          $this->id_sede = substr($this->Db->qstr($this->id_sede), 1, -1); 
          $this->estatus_before_qstr = $this->estatus;
          $this->estatus = substr($this->Db->qstr($this->estatus), 1, -1); 
          if ($this->fecha_matricula == "")  
          { 
              $this->fecha_matricula = "null"; 
              $NM_val_null[] = "fecha_matricula";
          } 
          $this->tipo_identificacion_before_qstr = $this->tipo_identificacion;
          $this->tipo_identificacion = substr($this->Db->qstr($this->tipo_identificacion), 1, -1); 
          $this->numero_documento_before_qstr = $this->numero_documento;
          $this->numero_documento = substr($this->Db->qstr($this->numero_documento), 1, -1); 
          $this->primer_nombre_before_qstr = $this->primer_nombre;
          $this->primer_nombre = substr($this->Db->qstr($this->primer_nombre), 1, -1); 
          $this->segundo_nombre_before_qstr = $this->segundo_nombre;
          $this->segundo_nombre = substr($this->Db->qstr($this->segundo_nombre), 1, -1); 
          $this->primer_apellido_before_qstr = $this->primer_apellido;
          $this->primer_apellido = substr($this->Db->qstr($this->primer_apellido), 1, -1); 
          $this->segundo_apellido_before_qstr = $this->segundo_apellido;
          $this->segundo_apellido = substr($this->Db->qstr($this->segundo_apellido), 1, -1); 
          $this->firstname_before_qstr = $this->firstname;
          $this->firstname = substr($this->Db->qstr($this->firstname), 1, -1); 
          $this->lastname_before_qstr = $this->lastname;
          $this->lastname = substr($this->Db->qstr($this->lastname), 1, -1); 
          $this->genero_before_qstr = $this->genero;
          $this->genero = substr($this->Db->qstr($this->genero), 1, -1); 
          if ($this->fecha_nacimiento == "")  
          { 
              $this->fecha_nacimiento = "null"; 
              $NM_val_null[] = "fecha_nacimiento";
          } 
          $this->address_before_qstr = $this->address;
          $this->address = substr($this->Db->qstr($this->address), 1, -1); 
          $this->barrio_before_qstr = $this->barrio;
          $this->barrio = substr($this->Db->qstr($this->barrio), 1, -1); 
          $this->zona_before_qstr = $this->zona;
          $this->zona = substr($this->Db->qstr($this->zona), 1, -1); 
          $this->telefono_before_qstr = $this->telefono;
          $this->telefono = substr($this->Db->qstr($this->telefono), 1, -1); 
          if ($this->last_year == "")  
          { 
              $this->last_year = "null"; 
              $NM_val_null[] = "last_year";
          } 
          $this->nombre_ult_plantel_before_qstr = $this->nombre_ult_plantel;
          $this->nombre_ult_plantel = substr($this->Db->qstr($this->nombre_ult_plantel), 1, -1); 
          $this->resultado_before_qstr = $this->resultado;
          $this->resultado = substr($this->Db->qstr($this->resultado), 1, -1); 
          $this->subsidado_before_qstr = $this->subsidado;
          $this->subsidado = substr($this->Db->qstr($this->subsidado), 1, -1); 
          $this->interno_before_qstr = $this->interno;
          $this->interno = substr($this->Db->qstr($this->interno), 1, -1); 
          $this->otro_modelo_before_qstr = $this->otro_modelo;
          $this->otro_modelo = substr($this->Db->qstr($this->otro_modelo), 1, -1); 
          $this->caracter_before_qstr = $this->caracter;
          $this->caracter = substr($this->Db->qstr($this->caracter), 1, -1); 
          $this->especialidad_before_qstr = $this->especialidad;
          $this->especialidad = substr($this->Db->qstr($this->especialidad), 1, -1); 
          $this->ips_before_qstr = $this->ips;
          $this->ips = substr($this->Db->qstr($this->ips), 1, -1); 
          $this->ars_before_qstr = $this->ars;
          $this->ars = substr($this->Db->qstr($this->ars), 1, -1); 
          $this->tipo_sangre_before_qstr = $this->tipo_sangre;
          $this->tipo_sangre = substr($this->Db->qstr($this->tipo_sangre), 1, -1); 
          if ($this->fecha_expulsion == "")  
          { 
              $this->fecha_expulsion = "null"; 
              $NM_val_null[] = "fecha_expulsion";
          } 
          $this->certificado_before_qstr = $this->certificado;
          $this->certificado = substr($this->Db->qstr($this->certificado), 1, -1); 
          $this->numero_carne_sisben_before_qstr = $this->numero_carne_sisben;
          $this->numero_carne_sisben = substr($this->Db->qstr($this->numero_carne_sisben), 1, -1); 
          $this->nivel_sisben_before_qstr = $this->nivel_sisben;
          $this->nivel_sisben = substr($this->Db->qstr($this->nivel_sisben), 1, -1); 
          $this->resguardo_before_qstr = $this->resguardo;
          $this->resguardo = substr($this->Db->qstr($this->resguardo), 1, -1); 
          $this->negritudes_before_qstr = $this->negritudes;
          $this->negritudes = substr($this->Db->qstr($this->negritudes), 1, -1); 
          $this->etnia_before_qstr = $this->etnia;
          $this->etnia = substr($this->Db->qstr($this->etnia), 1, -1); 
          $this->postalcode_before_qstr = $this->postalcode;
          $this->postalcode = substr($this->Db->qstr($this->postalcode), 1, -1); 
          $this->email_before_qstr = $this->email;
          $this->email = substr($this->Db->qstr($this->email), 1, -1); 
          $this->login_before_qstr = $this->login;
          $this->login = substr($this->Db->qstr($this->login), 1, -1); 
          $this->photo_before_qstr = $this->photo;
          $this->photo = substr($this->Db->qstr($this->photo), 1, -1); 
          $this->observaciones_before_qstr = $this->observaciones;
          $this->observaciones = substr($this->Db->qstr($this->observaciones), 1, -1); 
          $this->cobertura_before_qstr = $this->cobertura;
          $this->cobertura = substr($this->Db->qstr($this->cobertura), 1, -1); 
          $this->vive_con_before_qstr = $this->vive_con;
          $this->vive_con = substr($this->Db->qstr($this->vive_con), 1, -1); 
          $this->subsidio_before_qstr = $this->subsidio;
          $this->subsidio = substr($this->Db->qstr($this->subsidio), 1, -1); 
          $this->novedades_before_qstr = $this->novedades;
          $this->novedades = substr($this->Db->qstr($this->novedades), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idstudents = $this->idstudents ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idstudents = $this->idstudents "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_students_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET id_sede = '$this->id_sede', id_jornada = $this->id_jornada, semestre = $this->semestre, estatus = '$this->estatus', fecha_matricula = " . $this->Ini->date_delim . $this->fecha_matricula . $this->Ini->date_delim1 . ", tipo_identificacion = '$this->tipo_identificacion', numero_documento = '$this->numero_documento', departanebti_expedicion = $this->departanebti_expedicion, municipio_expedicion = $this->municipio_expedicion, primer_nombre = '$this->primer_nombre', segundo_nombre = '$this->segundo_nombre', primer_apellido = '$this->primer_apellido', segundo_apellido = '$this->segundo_apellido', firstname = '$this->firstname', lastname = '$this->lastname', genero = '$this->genero', fecha_nacimiento = " . $this->Ini->date_delim . $this->fecha_nacimiento . $this->Ini->date_delim1 . ", anos_cumplidos = $this->anos_cumplidos, dpto_nacimiento = $this->dpto_nacimiento, municipio_nacimiento = $this->municipio_nacimiento, address = '$this->address', barrio = '$this->barrio', zona = '$this->zona', city = $this->city, state = $this->state, telefono = '$this->telefono', grado_anterior = $this->grado_anterior, last_year = " . $this->Ini->date_delim . $this->last_year . $this->Ini->date_delim1 . ", nombre_ult_plantel = '$this->nombre_ult_plantel', resultado = '$this->resultado', grado_igreso = $this->grado_igreso, id_nivel = $this->id_nivel, subsidado = '$this->subsidado', interno = '$this->interno', id_grupo = $this->id_grupo, otro_modelo = '$this->otro_modelo', caracter = '$this->caracter', especialidad = '$this->especialidad', eps = $this->eps, ips = '$this->ips', ars = '$this->ars', tipo_sangre = '$this->tipo_sangre', victima_conflicto = $this->victima_conflicto, estatus_vca = $this->estatus_vca, depto_expulsor = $this->depto_expulsor, municipio_expulsor = $this->municipio_expulsor, fecha_expulsion = " . $this->Ini->date_delim . $this->fecha_expulsion . $this->Ini->date_delim1 . ", certificado = '$this->certificado', numero_carne_sisben = '$this->numero_carne_sisben', nivel_sisben = '$this->nivel_sisben', estrato = $this->estrato, fuente_recurso = $this->fuente_recurso, opcion = $this->opcion, resguardo = '$this->resguardo', negritudes = '$this->negritudes', etnia = '$this->etnia', discapacidades = $this->discapacidades, capacidades = $this->capacidades, postalcode = '$this->postalcode', email = '$this->email', login = '$this->login', observaciones = '$this->observaciones', peso = $this->peso, talla = $this->talla, cobertura = '$this->cobertura', vive_con = '$this->vive_con', subsidio = '$this->subsidio'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET id_sede = '$this->id_sede', id_jornada = $this->id_jornada, semestre = $this->semestre, estatus = '$this->estatus', fecha_matricula = " . $this->Ini->date_delim . $this->fecha_matricula . $this->Ini->date_delim1 . ", tipo_identificacion = '$this->tipo_identificacion', numero_documento = '$this->numero_documento', departanebti_expedicion = $this->departanebti_expedicion, municipio_expedicion = $this->municipio_expedicion, primer_nombre = '$this->primer_nombre', segundo_nombre = '$this->segundo_nombre', primer_apellido = '$this->primer_apellido', segundo_apellido = '$this->segundo_apellido', firstname = '$this->firstname', lastname = '$this->lastname', genero = '$this->genero', fecha_nacimiento = " . $this->Ini->date_delim . $this->fecha_nacimiento . $this->Ini->date_delim1 . ", anos_cumplidos = $this->anos_cumplidos, dpto_nacimiento = $this->dpto_nacimiento, municipio_nacimiento = $this->municipio_nacimiento, address = '$this->address', barrio = '$this->barrio', zona = '$this->zona', city = $this->city, state = $this->state, telefono = '$this->telefono', grado_anterior = $this->grado_anterior, last_year = " . $this->Ini->date_delim . $this->last_year . $this->Ini->date_delim1 . ", nombre_ult_plantel = '$this->nombre_ult_plantel', resultado = '$this->resultado', grado_igreso = $this->grado_igreso, id_nivel = $this->id_nivel, subsidado = '$this->subsidado', interno = '$this->interno', id_grupo = $this->id_grupo, otro_modelo = '$this->otro_modelo', caracter = '$this->caracter', especialidad = '$this->especialidad', eps = $this->eps, ips = '$this->ips', ars = '$this->ars', tipo_sangre = '$this->tipo_sangre', victima_conflicto = $this->victima_conflicto, estatus_vca = $this->estatus_vca, depto_expulsor = $this->depto_expulsor, municipio_expulsor = $this->municipio_expulsor, fecha_expulsion = " . $this->Ini->date_delim . $this->fecha_expulsion . $this->Ini->date_delim1 . ", certificado = '$this->certificado', numero_carne_sisben = '$this->numero_carne_sisben', nivel_sisben = '$this->nivel_sisben', estrato = $this->estrato, fuente_recurso = $this->fuente_recurso, opcion = $this->opcion, resguardo = '$this->resguardo', negritudes = '$this->negritudes', etnia = '$this->etnia', discapacidades = $this->discapacidades, capacidades = $this->capacidades, postalcode = '$this->postalcode', email = '$this->email', login = '$this->login', observaciones = '$this->observaciones', peso = $this->peso, talla = $this->talla, cobertura = '$this->cobertura', vive_con = '$this->vive_con', subsidio = '$this->subsidio'";  
              } 
              $aDoNotUpdate = array();
              $aEraseFiles  = array();
              $temp_cmd_sql = "";
              if ($this->photo_limpa == "S") 
              { 
                  $sDirErase     = $this->Ini->root . $this->Ini->path_imagens . "estudiante" . "/"; 
                  $aEraseFiles[] = array('dir' => $sDirErase, 'file' => $this->nmgp_dados_form['photo']);
                  if ($this->photo != "null") 
                  { 
                      $this->photo = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", photo = '" . $this->photo . "'"; 
                      $comando_oracle .= ", photo = '" . $this->photo . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " photo = '" . $this->photo . "'"; 
                     $comando_oracle .= " photo = '" . $this->photo . "'"; 
                     $SC_ex_upd_or = true; 
                     $SC_ex_update = true; 
                  } 
                  $this->photo = "";
              } 
              else 
              { 
                  if ($this->photo != "none" && $this->photo != "") 
                  { 
                      $NM_conteudo =  $this->photo;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", photo = '$NM_conteudo'" ; 
                          $comando_oracle .= ", photo = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " photo = '$NM_conteudo'" ; 
                          $comando_oracle .= " photo = '$NM_conteudo'" ; 
                          $SC_ex_upd_or = true; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "photo";
                  }
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE idstudents = $this->idstudents ";  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_students_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              if ($this->photo_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['photo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              if (!empty($aEraseFiles))
              {
                  foreach ($aEraseFiles as $aEraseData)
                  {
                      $sEraseFile = $aEraseData['dir'] . $aEraseData['file'];
                      if (@is_file($sEraseFile))
                      {
                          @unlink($sEraseFile);
                      }
                  }
              }
          $this->id_sede = $this->id_sede_before_qstr;
          $this->estatus = $this->estatus_before_qstr;
          $this->tipo_identificacion = $this->tipo_identificacion_before_qstr;
          $this->numero_documento = $this->numero_documento_before_qstr;
          $this->primer_nombre = $this->primer_nombre_before_qstr;
          $this->segundo_nombre = $this->segundo_nombre_before_qstr;
          $this->primer_apellido = $this->primer_apellido_before_qstr;
          $this->segundo_apellido = $this->segundo_apellido_before_qstr;
          $this->firstname = $this->firstname_before_qstr;
          $this->lastname = $this->lastname_before_qstr;
          $this->genero = $this->genero_before_qstr;
          $this->address = $this->address_before_qstr;
          $this->barrio = $this->barrio_before_qstr;
          $this->zona = $this->zona_before_qstr;
          $this->telefono = $this->telefono_before_qstr;
          $this->nombre_ult_plantel = $this->nombre_ult_plantel_before_qstr;
          $this->resultado = $this->resultado_before_qstr;
          $this->subsidado = $this->subsidado_before_qstr;
          $this->interno = $this->interno_before_qstr;
          $this->otro_modelo = $this->otro_modelo_before_qstr;
          $this->caracter = $this->caracter_before_qstr;
          $this->especialidad = $this->especialidad_before_qstr;
          $this->ips = $this->ips_before_qstr;
          $this->ars = $this->ars_before_qstr;
          $this->tipo_sangre = $this->tipo_sangre_before_qstr;
          $this->certificado = $this->certificado_before_qstr;
          $this->numero_carne_sisben = $this->numero_carne_sisben_before_qstr;
          $this->nivel_sisben = $this->nivel_sisben_before_qstr;
          $this->resguardo = $this->resguardo_before_qstr;
          $this->negritudes = $this->negritudes_before_qstr;
          $this->etnia = $this->etnia_before_qstr;
          $this->postalcode = $this->postalcode_before_qstr;
          $this->email = $this->email_before_qstr;
          $this->login = $this->login_before_qstr;
          $this->photo = $this->photo_before_qstr;
          $this->observaciones = $this->observaciones_before_qstr;
          $this->cobertura = $this->cobertura_before_qstr;
          $this->vive_con = $this->vive_con_before_qstr;
          $this->subsidio = $this->subsidio_before_qstr;
          $this->novedades = $this->novedades_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id_sede'])) { $this->id_sede = $NM_val_form['id_sede']; }
              elseif (isset($this->id_sede)) { $this->nm_limpa_alfa($this->id_sede); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_jornada'])) { $this->id_jornada = $NM_val_form['id_jornada']; }
              elseif (isset($this->id_jornada)) { $this->nm_limpa_alfa($this->id_jornada); }
              if     (isset($NM_val_form) && isset($NM_val_form['semestre'])) { $this->semestre = $NM_val_form['semestre']; }
              elseif (isset($this->semestre)) { $this->nm_limpa_alfa($this->semestre); }
              if     (isset($NM_val_form) && isset($NM_val_form['estatus'])) { $this->estatus = $NM_val_form['estatus']; }
              elseif (isset($this->estatus)) { $this->nm_limpa_alfa($this->estatus); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_identificacion'])) { $this->tipo_identificacion = $NM_val_form['tipo_identificacion']; }
              elseif (isset($this->tipo_identificacion)) { $this->nm_limpa_alfa($this->tipo_identificacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero_documento'])) { $this->numero_documento = $NM_val_form['numero_documento']; }
              elseif (isset($this->numero_documento)) { $this->nm_limpa_alfa($this->numero_documento); }
              if     (isset($NM_val_form) && isset($NM_val_form['departanebti_expedicion'])) { $this->departanebti_expedicion = $NM_val_form['departanebti_expedicion']; }
              elseif (isset($this->departanebti_expedicion)) { $this->nm_limpa_alfa($this->departanebti_expedicion); }
              if     (isset($NM_val_form) && isset($NM_val_form['municipio_expedicion'])) { $this->municipio_expedicion = $NM_val_form['municipio_expedicion']; }
              elseif (isset($this->municipio_expedicion)) { $this->nm_limpa_alfa($this->municipio_expedicion); }
              if     (isset($NM_val_form) && isset($NM_val_form['primer_nombre'])) { $this->primer_nombre = $NM_val_form['primer_nombre']; }
              elseif (isset($this->primer_nombre)) { $this->nm_limpa_alfa($this->primer_nombre); }
              if     (isset($NM_val_form) && isset($NM_val_form['segundo_nombre'])) { $this->segundo_nombre = $NM_val_form['segundo_nombre']; }
              elseif (isset($this->segundo_nombre)) { $this->nm_limpa_alfa($this->segundo_nombre); }
              if     (isset($NM_val_form) && isset($NM_val_form['primer_apellido'])) { $this->primer_apellido = $NM_val_form['primer_apellido']; }
              elseif (isset($this->primer_apellido)) { $this->nm_limpa_alfa($this->primer_apellido); }
              if     (isset($NM_val_form) && isset($NM_val_form['segundo_apellido'])) { $this->segundo_apellido = $NM_val_form['segundo_apellido']; }
              elseif (isset($this->segundo_apellido)) { $this->nm_limpa_alfa($this->segundo_apellido); }
              if     (isset($NM_val_form) && isset($NM_val_form['firstname'])) { $this->firstname = $NM_val_form['firstname']; }
              elseif (isset($this->firstname)) { $this->nm_limpa_alfa($this->firstname); }
              if     (isset($NM_val_form) && isset($NM_val_form['lastname'])) { $this->lastname = $NM_val_form['lastname']; }
              elseif (isset($this->lastname)) { $this->nm_limpa_alfa($this->lastname); }
              if     (isset($NM_val_form) && isset($NM_val_form['genero'])) { $this->genero = $NM_val_form['genero']; }
              elseif (isset($this->genero)) { $this->nm_limpa_alfa($this->genero); }
              if     (isset($NM_val_form) && isset($NM_val_form['anos_cumplidos'])) { $this->anos_cumplidos = $NM_val_form['anos_cumplidos']; }
              elseif (isset($this->anos_cumplidos)) { $this->nm_limpa_alfa($this->anos_cumplidos); }
              if     (isset($NM_val_form) && isset($NM_val_form['dpto_nacimiento'])) { $this->dpto_nacimiento = $NM_val_form['dpto_nacimiento']; }
              elseif (isset($this->dpto_nacimiento)) { $this->nm_limpa_alfa($this->dpto_nacimiento); }
              if     (isset($NM_val_form) && isset($NM_val_form['municipio_nacimiento'])) { $this->municipio_nacimiento = $NM_val_form['municipio_nacimiento']; }
              elseif (isset($this->municipio_nacimiento)) { $this->nm_limpa_alfa($this->municipio_nacimiento); }
              if     (isset($NM_val_form) && isset($NM_val_form['address'])) { $this->address = $NM_val_form['address']; }
              elseif (isset($this->address)) { $this->nm_limpa_alfa($this->address); }
              if     (isset($NM_val_form) && isset($NM_val_form['barrio'])) { $this->barrio = $NM_val_form['barrio']; }
              elseif (isset($this->barrio)) { $this->nm_limpa_alfa($this->barrio); }
              if     (isset($NM_val_form) && isset($NM_val_form['zona'])) { $this->zona = $NM_val_form['zona']; }
              elseif (isset($this->zona)) { $this->nm_limpa_alfa($this->zona); }
              if     (isset($NM_val_form) && isset($NM_val_form['city'])) { $this->city = $NM_val_form['city']; }
              elseif (isset($this->city)) { $this->nm_limpa_alfa($this->city); }
              if     (isset($NM_val_form) && isset($NM_val_form['state'])) { $this->state = $NM_val_form['state']; }
              elseif (isset($this->state)) { $this->nm_limpa_alfa($this->state); }
              if     (isset($NM_val_form) && isset($NM_val_form['telefono'])) { $this->telefono = $NM_val_form['telefono']; }
              elseif (isset($this->telefono)) { $this->nm_limpa_alfa($this->telefono); }
              if     (isset($NM_val_form) && isset($NM_val_form['grado_anterior'])) { $this->grado_anterior = $NM_val_form['grado_anterior']; }
              elseif (isset($this->grado_anterior)) { $this->nm_limpa_alfa($this->grado_anterior); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_ult_plantel'])) { $this->nombre_ult_plantel = $NM_val_form['nombre_ult_plantel']; }
              elseif (isset($this->nombre_ult_plantel)) { $this->nm_limpa_alfa($this->nombre_ult_plantel); }
              if     (isset($NM_val_form) && isset($NM_val_form['resultado'])) { $this->resultado = $NM_val_form['resultado']; }
              elseif (isset($this->resultado)) { $this->nm_limpa_alfa($this->resultado); }
              if     (isset($NM_val_form) && isset($NM_val_form['grado_igreso'])) { $this->grado_igreso = $NM_val_form['grado_igreso']; }
              elseif (isset($this->grado_igreso)) { $this->nm_limpa_alfa($this->grado_igreso); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_nivel'])) { $this->id_nivel = $NM_val_form['id_nivel']; }
              elseif (isset($this->id_nivel)) { $this->nm_limpa_alfa($this->id_nivel); }
              if     (isset($NM_val_form) && isset($NM_val_form['subsidado'])) { $this->subsidado = $NM_val_form['subsidado']; }
              elseif (isset($this->subsidado)) { $this->nm_limpa_alfa($this->subsidado); }
              if     (isset($NM_val_form) && isset($NM_val_form['interno'])) { $this->interno = $NM_val_form['interno']; }
              elseif (isset($this->interno)) { $this->nm_limpa_alfa($this->interno); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_grupo'])) { $this->id_grupo = $NM_val_form['id_grupo']; }
              elseif (isset($this->id_grupo)) { $this->nm_limpa_alfa($this->id_grupo); }
              if     (isset($NM_val_form) && isset($NM_val_form['otro_modelo'])) { $this->otro_modelo = $NM_val_form['otro_modelo']; }
              elseif (isset($this->otro_modelo)) { $this->nm_limpa_alfa($this->otro_modelo); }
              if     (isset($NM_val_form) && isset($NM_val_form['caracter'])) { $this->caracter = $NM_val_form['caracter']; }
              elseif (isset($this->caracter)) { $this->nm_limpa_alfa($this->caracter); }
              if     (isset($NM_val_form) && isset($NM_val_form['especialidad'])) { $this->especialidad = $NM_val_form['especialidad']; }
              elseif (isset($this->especialidad)) { $this->nm_limpa_alfa($this->especialidad); }
              if     (isset($NM_val_form) && isset($NM_val_form['eps'])) { $this->eps = $NM_val_form['eps']; }
              elseif (isset($this->eps)) { $this->nm_limpa_alfa($this->eps); }
              if     (isset($NM_val_form) && isset($NM_val_form['ips'])) { $this->ips = $NM_val_form['ips']; }
              elseif (isset($this->ips)) { $this->nm_limpa_alfa($this->ips); }
              if     (isset($NM_val_form) && isset($NM_val_form['ars'])) { $this->ars = $NM_val_form['ars']; }
              elseif (isset($this->ars)) { $this->nm_limpa_alfa($this->ars); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_sangre'])) { $this->tipo_sangre = $NM_val_form['tipo_sangre']; }
              elseif (isset($this->tipo_sangre)) { $this->nm_limpa_alfa($this->tipo_sangre); }
              if     (isset($NM_val_form) && isset($NM_val_form['victima_conflicto'])) { $this->victima_conflicto = $NM_val_form['victima_conflicto']; }
              elseif (isset($this->victima_conflicto)) { $this->nm_limpa_alfa($this->victima_conflicto); }
              if     (isset($NM_val_form) && isset($NM_val_form['estatus_vca'])) { $this->estatus_vca = $NM_val_form['estatus_vca']; }
              elseif (isset($this->estatus_vca)) { $this->nm_limpa_alfa($this->estatus_vca); }
              if     (isset($NM_val_form) && isset($NM_val_form['depto_expulsor'])) { $this->depto_expulsor = $NM_val_form['depto_expulsor']; }
              elseif (isset($this->depto_expulsor)) { $this->nm_limpa_alfa($this->depto_expulsor); }
              if     (isset($NM_val_form) && isset($NM_val_form['municipio_expulsor'])) { $this->municipio_expulsor = $NM_val_form['municipio_expulsor']; }
              elseif (isset($this->municipio_expulsor)) { $this->nm_limpa_alfa($this->municipio_expulsor); }
              if     (isset($NM_val_form) && isset($NM_val_form['certificado'])) { $this->certificado = $NM_val_form['certificado']; }
              elseif (isset($this->certificado)) { $this->nm_limpa_alfa($this->certificado); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero_carne_sisben'])) { $this->numero_carne_sisben = $NM_val_form['numero_carne_sisben']; }
              elseif (isset($this->numero_carne_sisben)) { $this->nm_limpa_alfa($this->numero_carne_sisben); }
              if     (isset($NM_val_form) && isset($NM_val_form['nivel_sisben'])) { $this->nivel_sisben = $NM_val_form['nivel_sisben']; }
              elseif (isset($this->nivel_sisben)) { $this->nm_limpa_alfa($this->nivel_sisben); }
              if     (isset($NM_val_form) && isset($NM_val_form['estrato'])) { $this->estrato = $NM_val_form['estrato']; }
              elseif (isset($this->estrato)) { $this->nm_limpa_alfa($this->estrato); }
              if     (isset($NM_val_form) && isset($NM_val_form['fuente_recurso'])) { $this->fuente_recurso = $NM_val_form['fuente_recurso']; }
              elseif (isset($this->fuente_recurso)) { $this->nm_limpa_alfa($this->fuente_recurso); }
              if     (isset($NM_val_form) && isset($NM_val_form['opcion'])) { $this->opcion = $NM_val_form['opcion']; }
              elseif (isset($this->opcion)) { $this->nm_limpa_alfa($this->opcion); }
              if     (isset($NM_val_form) && isset($NM_val_form['resguardo'])) { $this->resguardo = $NM_val_form['resguardo']; }
              elseif (isset($this->resguardo)) { $this->nm_limpa_alfa($this->resguardo); }
              if     (isset($NM_val_form) && isset($NM_val_form['negritudes'])) { $this->negritudes = $NM_val_form['negritudes']; }
              elseif (isset($this->negritudes)) { $this->nm_limpa_alfa($this->negritudes); }
              if     (isset($NM_val_form) && isset($NM_val_form['etnia'])) { $this->etnia = $NM_val_form['etnia']; }
              elseif (isset($this->etnia)) { $this->nm_limpa_alfa($this->etnia); }
              if     (isset($NM_val_form) && isset($NM_val_form['discapacidades'])) { $this->discapacidades = $NM_val_form['discapacidades']; }
              elseif (isset($this->discapacidades)) { $this->nm_limpa_alfa($this->discapacidades); }
              if     (isset($NM_val_form) && isset($NM_val_form['capacidades'])) { $this->capacidades = $NM_val_form['capacidades']; }
              elseif (isset($this->capacidades)) { $this->nm_limpa_alfa($this->capacidades); }
              if     (isset($NM_val_form) && isset($NM_val_form['postalcode'])) { $this->postalcode = $NM_val_form['postalcode']; }
              elseif (isset($this->postalcode)) { $this->nm_limpa_alfa($this->postalcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['email'])) { $this->email = $NM_val_form['email']; }
              elseif (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
              if     (isset($NM_val_form) && isset($NM_val_form['login'])) { $this->login = $NM_val_form['login']; }
              elseif (isset($this->login)) { $this->nm_limpa_alfa($this->login); }
              if     (isset($NM_val_form) && isset($NM_val_form['observaciones'])) { $this->observaciones = $NM_val_form['observaciones']; }
              elseif (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
              if     (isset($NM_val_form) && isset($NM_val_form['peso'])) { $this->peso = $NM_val_form['peso']; }
              elseif (isset($this->peso)) { $this->nm_limpa_alfa($this->peso); }
              if     (isset($NM_val_form) && isset($NM_val_form['talla'])) { $this->talla = $NM_val_form['talla']; }
              elseif (isset($this->talla)) { $this->nm_limpa_alfa($this->talla); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobertura'])) { $this->cobertura = $NM_val_form['cobertura']; }
              elseif (isset($this->cobertura)) { $this->nm_limpa_alfa($this->cobertura); }
              if     (isset($NM_val_form) && isset($NM_val_form['vive_con'])) { $this->vive_con = $NM_val_form['vive_con']; }
              elseif (isset($this->vive_con)) { $this->nm_limpa_alfa($this->vive_con); }
              if     (isset($NM_val_form) && isset($NM_val_form['subsidio'])) { $this->subsidio = $NM_val_form['subsidio']; }
              elseif (isset($this->subsidio)) { $this->nm_limpa_alfa($this->subsidio); }
              if     (isset($NM_val_form) && isset($NM_val_form['novedades'])) { $this->novedades = $NM_val_form['novedades']; }
              elseif (isset($this->novedades)) { $this->nm_limpa_alfa($this->novedades); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('estatus', 'fecha_matricula', 'genero', 'fecha_nacimiento', 'primer_apellido', 'segundo_apellido', 'primer_nombre', 'segundo_nombre', 'tipo_identificacion', 'numero_documento', 'departanebti_expedicion', 'municipio_expedicion', 'firstname', 'lastname', 'anos_cumplidos', 'dpto_nacimiento', 'municipio_nacimiento', 'observaciones', 'login', 'pswd', 'confirm_pswd', 'state', 'city', 'address', 'barrio', 'postalcode', 'zona', 'telefono', 'email', 'id_sede', 'id_jornada', 'id_nivel', 'grado_igreso', 'id_grupo', 'grado_anterior', 'last_year', 'nombre_ult_plantel', 'resultado', 'subsidado', 'interno', 'otro_modelo', 'caracter', 'especialidad', 'year_mat', 'matricular', 'eps', 'ips', 'ars', 'tipo_sangre', 'victima_conflicto', 'peso', 'talla', 'cobertura', 'vive_con', 'subsidio', 'estatus_vca', 'depto_expulsor', 'municipio_expulsor', 'fecha_expulsion', 'certificado', 'semestre', 'numero_carne_sisben', 'nivel_sisben', 'estrato', 'fuente_recurso', 'opcion', 'resguardo', 'negritudes', 'etnia', 'discapacidades', 'capacidades', 'novedades'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $bInsertOk = true;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idstudents = $this->idstudents "; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idstudents = $this->idstudents "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_students_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $dir_file = $this->Ini->root . $this->Ini->path_imagens . "estudiante" . "/"; 
              $_test_file = $this->fetchUniqueUploadName($this->photo_scfile_name, $dir_file, "photo");
              if (trim($this->photo_scfile_name) != $_test_file)
              {
                  $this->photo_scfile_name = $_test_file;
                  $this->photo = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idstudents, id_sede, id_jornada, semestre, estatus, fecha_matricula, tipo_identificacion, numero_documento, departanebti_expedicion, municipio_expedicion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, firstname, lastname, genero, fecha_nacimiento, anos_cumplidos, dpto_nacimiento, municipio_nacimiento, address, barrio, zona, city, state, telefono, grado_anterior, last_year, nombre_ult_plantel, resultado, grado_igreso, id_nivel, subsidado, interno, id_grupo, otro_modelo, caracter, especialidad, eps, ips, ars, tipo_sangre, victima_conflicto, estatus_vca, depto_expulsor, municipio_expulsor, fecha_expulsion, certificado, numero_carne_sisben, nivel_sisben, estrato, fuente_recurso, opcion, resguardo, negritudes, etnia, discapacidades, capacidades, postalcode, email, login, photo, observaciones, peso, talla, cobertura, vive_con, subsidio) VALUES (" . $NM_seq_auto . "$this->idstudents, '$this->id_sede', $this->id_jornada, $this->semestre, '$this->estatus', " . $this->Ini->date_delim . $this->fecha_matricula . $this->Ini->date_delim1 . ", '$this->tipo_identificacion', '$this->numero_documento', $this->departanebti_expedicion, $this->municipio_expedicion, '$this->primer_nombre', '$this->segundo_nombre', '$this->primer_apellido', '$this->segundo_apellido', '$this->firstname', '$this->lastname', '$this->genero', " . $this->Ini->date_delim . $this->fecha_nacimiento . $this->Ini->date_delim1 . ", $this->anos_cumplidos, $this->dpto_nacimiento, $this->municipio_nacimiento, '$this->address', '$this->barrio', '$this->zona', $this->city, $this->state, '$this->telefono', $this->grado_anterior, " . $this->Ini->date_delim . $this->last_year . $this->Ini->date_delim1 . ", '$this->nombre_ult_plantel', '$this->resultado', $this->grado_igreso, $this->id_nivel, '$this->subsidado', '$this->interno', $this->id_grupo, '$this->otro_modelo', '$this->caracter', '$this->especialidad', $this->eps, '$this->ips', '$this->ars', '$this->tipo_sangre', $this->victima_conflicto, $this->estatus_vca, $this->depto_expulsor, $this->municipio_expulsor, " . $this->Ini->date_delim . $this->fecha_expulsion . $this->Ini->date_delim1 . ", '$this->certificado', '$this->numero_carne_sisben', '$this->nivel_sisben', $this->estrato, $this->fuente_recurso, $this->opcion, '$this->resguardo', '$this->negritudes', '$this->etnia', $this->discapacidades, $this->capacidades, '$this->postalcode', '$this->email', '$this->login', '$this->photo', '$this->observaciones', $this->peso, $this->talla, '$this->cobertura', '$this->vive_con', '$this->subsidio')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idstudents, id_sede, id_jornada, semestre, estatus, fecha_matricula, tipo_identificacion, numero_documento, departanebti_expedicion, municipio_expedicion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, firstname, lastname, genero, fecha_nacimiento, anos_cumplidos, dpto_nacimiento, municipio_nacimiento, address, barrio, zona, city, state, telefono, grado_anterior, last_year, nombre_ult_plantel, resultado, grado_igreso, id_nivel, subsidado, interno, id_grupo, otro_modelo, caracter, especialidad, eps, ips, ars, tipo_sangre, victima_conflicto, estatus_vca, depto_expulsor, municipio_expulsor, fecha_expulsion, certificado, numero_carne_sisben, nivel_sisben, estrato, fuente_recurso, opcion, resguardo, negritudes, etnia, discapacidades, capacidades, postalcode, email, login, photo, observaciones, peso, talla, cobertura, vive_con, subsidio) VALUES (" . $NM_seq_auto . "$this->idstudents, '$this->id_sede', $this->id_jornada, $this->semestre, '$this->estatus', " . $this->Ini->date_delim . $this->fecha_matricula . $this->Ini->date_delim1 . ", '$this->tipo_identificacion', '$this->numero_documento', $this->departanebti_expedicion, $this->municipio_expedicion, '$this->primer_nombre', '$this->segundo_nombre', '$this->primer_apellido', '$this->segundo_apellido', '$this->firstname', '$this->lastname', '$this->genero', " . $this->Ini->date_delim . $this->fecha_nacimiento . $this->Ini->date_delim1 . ", $this->anos_cumplidos, $this->dpto_nacimiento, $this->municipio_nacimiento, '$this->address', '$this->barrio', '$this->zona', $this->city, $this->state, '$this->telefono', $this->grado_anterior, " . $this->Ini->date_delim . $this->last_year . $this->Ini->date_delim1 . ", '$this->nombre_ult_plantel', '$this->resultado', $this->grado_igreso, $this->id_nivel, '$this->subsidado', '$this->interno', $this->id_grupo, '$this->otro_modelo', '$this->caracter', '$this->especialidad', $this->eps, '$this->ips', '$this->ars', '$this->tipo_sangre', $this->victima_conflicto, $this->estatus_vca, $this->depto_expulsor, $this->municipio_expulsor, " . $this->Ini->date_delim . $this->fecha_expulsion . $this->Ini->date_delim1 . ", '$this->certificado', '$this->numero_carne_sisben', '$this->nivel_sisben', $this->estrato, $this->fuente_recurso, $this->opcion, '$this->resguardo', '$this->negritudes', '$this->etnia', $this->discapacidades, $this->capacidades, '$this->postalcode', '$this->email', '$this->login', '$this->photo', '$this->observaciones', $this->peso, $this->talla, '$this->cobertura', '$this->vive_con', '$this->subsidio')"; 
              }
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_students_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total']);
              }

              $dir_img = $this->Ini->root . $this->Ini->path_imagens . "estudiante" . "/"; 
              if (nm_mkdir($dir_img))  
              { 
                  $arq_photo = fopen($this->SC_IMG_photo, "r") ; 
                  $reg_photo = fread($arq_photo, filesize($this->SC_IMG_photo)) ; 
                  fclose($arq_photo) ;  
                  $arq_photo = fopen($dir_img . trim($this->photo_scfile_name), "w") ; 
                  fwrite($arq_photo, $reg_photo) ;  
                  fclose($arq_photo) ;  
              } 
              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['sc_btn_0'] = "on";
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idstudents = substr($this->Db->qstr($this->idstudents), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "idstudents = " . $this->idstudents . "";
              $this->form_novedades_x_estudiante_fecha->ini_controle();
              if ($this->form_novedades_x_estudiante_fecha->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idstudents = $this->idstudents"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idstudents = $this->idstudents "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $aEraseFiles = array();
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idstudents = $this->idstudents "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idstudents = $this->idstudents "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_students_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
                  $sDirErase     = $this->Ini->root . $this->Ini->path_imagens . "estudiante" . "/"; 
                  $aEraseFiles[] = array('dir' => $sDirErase, 'file' => $this->nmgp_dados_form['photo']);
              if (!empty($aEraseFiles))
              {
                  foreach ($aEraseFiles as $aEraseData)
                  {
                      $sEraseFile = $aEraseData['dir'] . $aEraseData['file'];
                      if (@is_file($sEraseFile))
                      {
                          @unlink($sEraseFile);
                      }
                  }
              }
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['parms'] = "idstudents?#?$this->idstudents?@?"; 
      }
      $this->nmgp_dados_form['photo'] = ""; 
      $this->photo_limpa = ""; 
      $this->photo_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idstudents = substr($this->Db->qstr($this->idstudents), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idstudents)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->idstudents) === "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total']))
      { 
          $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_students = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total'] = $qt_geral_reg_form_students;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idstudents))
          {
              $Key_Where = "idstudents < $this->idstudents "; 
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_students = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] > $qt_geral_reg_form_students)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] = $qt_geral_reg_form_students; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] = $qt_geral_reg_form_students; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_students) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['parms'] = ""; 
          $nmgp_select = "SELECT idstudents, id_sede, id_jornada, semestre, estatus, fecha_matricula, tipo_identificacion, numero_documento, departanebti_expedicion, municipio_expedicion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, firstname, lastname, genero, fecha_nacimiento, anos_cumplidos, dpto_nacimiento, municipio_nacimiento, address, barrio, zona, city, state, telefono, grado_anterior, last_year, nombre_ult_plantel, resultado, grado_igreso, id_nivel, subsidado, interno, id_grupo, otro_modelo, caracter, especialidad, eps, ips, ars, tipo_sangre, victima_conflicto, estatus_vca, depto_expulsor, municipio_expulsor, fecha_expulsion, certificado, numero_carne_sisben, nivel_sisben, estrato, fuente_recurso, opcion, resguardo, negritudes, etnia, discapacidades, capacidades, postalcode, email, login, photo, observaciones, peso, talla, cobertura, vive_con, subsidio from " . $this->Ini->nm_tabela ; 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              $aWhere[] = "idstudents = $this->idstudents"; 
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "idstudents";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->idstudents = $rs->fields[0] ; 
              $this->nmgp_dados_select['idstudents'] = $this->idstudents;
              $this->id_sede = $rs->fields[1] ; 
              $this->nmgp_dados_select['id_sede'] = $this->id_sede;
              $this->id_jornada = $rs->fields[2] ; 
              $this->nmgp_dados_select['id_jornada'] = $this->id_jornada;
              $this->semestre = $rs->fields[3] ; 
              $this->nmgp_dados_select['semestre'] = $this->semestre;
              $this->estatus = $rs->fields[4] ; 
              $this->nmgp_dados_select['estatus'] = $this->estatus;
              $this->fecha_matricula = $rs->fields[5] ; 
              $this->nmgp_dados_select['fecha_matricula'] = $this->fecha_matricula;
              $this->tipo_identificacion = $rs->fields[6] ; 
              $this->nmgp_dados_select['tipo_identificacion'] = $this->tipo_identificacion;
              $this->numero_documento = $rs->fields[7] ; 
              $this->nmgp_dados_select['numero_documento'] = $this->numero_documento;
              $this->departanebti_expedicion = $rs->fields[8] ; 
              $this->nmgp_dados_select['departanebti_expedicion'] = $this->departanebti_expedicion;
              $this->municipio_expedicion = $rs->fields[9] ; 
              $this->nmgp_dados_select['municipio_expedicion'] = $this->municipio_expedicion;
              $this->primer_nombre = $rs->fields[10] ; 
              $this->nmgp_dados_select['primer_nombre'] = $this->primer_nombre;
              $this->segundo_nombre = $rs->fields[11] ; 
              $this->nmgp_dados_select['segundo_nombre'] = $this->segundo_nombre;
              $this->primer_apellido = $rs->fields[12] ; 
              $this->nmgp_dados_select['primer_apellido'] = $this->primer_apellido;
              $this->segundo_apellido = $rs->fields[13] ; 
              $this->nmgp_dados_select['segundo_apellido'] = $this->segundo_apellido;
              $this->firstname = $rs->fields[14] ; 
              $this->nmgp_dados_select['firstname'] = $this->firstname;
              $this->lastname = $rs->fields[15] ; 
              $this->nmgp_dados_select['lastname'] = $this->lastname;
              $this->genero = $rs->fields[16] ; 
              $this->nmgp_dados_select['genero'] = $this->genero;
              $this->fecha_nacimiento = $rs->fields[17] ; 
              $this->nmgp_dados_select['fecha_nacimiento'] = $this->fecha_nacimiento;
              $this->anos_cumplidos = $rs->fields[18] ; 
              $this->nmgp_dados_select['anos_cumplidos'] = $this->anos_cumplidos;
              $this->dpto_nacimiento = $rs->fields[19] ; 
              $this->nmgp_dados_select['dpto_nacimiento'] = $this->dpto_nacimiento;
              $this->municipio_nacimiento = $rs->fields[20] ; 
              $this->nmgp_dados_select['municipio_nacimiento'] = $this->municipio_nacimiento;
              $this->address = $rs->fields[21] ; 
              $this->nmgp_dados_select['address'] = $this->address;
              $this->barrio = $rs->fields[22] ; 
              $this->nmgp_dados_select['barrio'] = $this->barrio;
              $this->zona = $rs->fields[23] ; 
              $this->nmgp_dados_select['zona'] = $this->zona;
              $this->city = $rs->fields[24] ; 
              $this->nmgp_dados_select['city'] = $this->city;
              $this->state = $rs->fields[25] ; 
              $this->nmgp_dados_select['state'] = $this->state;
              $this->telefono = $rs->fields[26] ; 
              $this->nmgp_dados_select['telefono'] = $this->telefono;
              $this->grado_anterior = $rs->fields[27] ; 
              $this->nmgp_dados_select['grado_anterior'] = $this->grado_anterior;
              $this->last_year = $rs->fields[28] ; 
              $this->nmgp_dados_select['last_year'] = $this->last_year;
              $this->nombre_ult_plantel = $rs->fields[29] ; 
              $this->nmgp_dados_select['nombre_ult_plantel'] = $this->nombre_ult_plantel;
              $this->resultado = $rs->fields[30] ; 
              $this->nmgp_dados_select['resultado'] = $this->resultado;
              $this->grado_igreso = $rs->fields[31] ; 
              $this->nmgp_dados_select['grado_igreso'] = $this->grado_igreso;
              $this->id_nivel = $rs->fields[32] ; 
              $this->nmgp_dados_select['id_nivel'] = $this->id_nivel;
              $this->subsidado = $rs->fields[33] ; 
              $this->nmgp_dados_select['subsidado'] = $this->subsidado;
              $this->interno = $rs->fields[34] ; 
              $this->nmgp_dados_select['interno'] = $this->interno;
              $this->id_grupo = $rs->fields[35] ; 
              $this->nmgp_dados_select['id_grupo'] = $this->id_grupo;
              $this->otro_modelo = $rs->fields[36] ; 
              $this->nmgp_dados_select['otro_modelo'] = $this->otro_modelo;
              $this->caracter = $rs->fields[37] ; 
              $this->nmgp_dados_select['caracter'] = $this->caracter;
              $this->especialidad = $rs->fields[38] ; 
              $this->nmgp_dados_select['especialidad'] = $this->especialidad;
              $this->eps = $rs->fields[39] ; 
              $this->nmgp_dados_select['eps'] = $this->eps;
              $this->ips = $rs->fields[40] ; 
              $this->nmgp_dados_select['ips'] = $this->ips;
              $this->ars = $rs->fields[41] ; 
              $this->nmgp_dados_select['ars'] = $this->ars;
              $this->tipo_sangre = $rs->fields[42] ; 
              $this->nmgp_dados_select['tipo_sangre'] = $this->tipo_sangre;
              $this->victima_conflicto = $rs->fields[43] ; 
              $this->nmgp_dados_select['victima_conflicto'] = $this->victima_conflicto;
              $this->estatus_vca = $rs->fields[44] ; 
              $this->nmgp_dados_select['estatus_vca'] = $this->estatus_vca;
              $this->depto_expulsor = $rs->fields[45] ; 
              $this->nmgp_dados_select['depto_expulsor'] = $this->depto_expulsor;
              $this->municipio_expulsor = $rs->fields[46] ; 
              $this->nmgp_dados_select['municipio_expulsor'] = $this->municipio_expulsor;
              $this->fecha_expulsion = $rs->fields[47] ; 
              $this->nmgp_dados_select['fecha_expulsion'] = $this->fecha_expulsion;
              $this->certificado = $rs->fields[48] ; 
              $this->nmgp_dados_select['certificado'] = $this->certificado;
              $this->numero_carne_sisben = $rs->fields[49] ; 
              $this->nmgp_dados_select['numero_carne_sisben'] = $this->numero_carne_sisben;
              $this->nivel_sisben = $rs->fields[50] ; 
              $this->nmgp_dados_select['nivel_sisben'] = $this->nivel_sisben;
              $this->estrato = $rs->fields[51] ; 
              $this->nmgp_dados_select['estrato'] = $this->estrato;
              $this->fuente_recurso = $rs->fields[52] ; 
              $this->nmgp_dados_select['fuente_recurso'] = $this->fuente_recurso;
              $this->opcion = $rs->fields[53] ; 
              $this->nmgp_dados_select['opcion'] = $this->opcion;
              $this->resguardo = $rs->fields[54] ; 
              $this->nmgp_dados_select['resguardo'] = $this->resguardo;
              $this->negritudes = $rs->fields[55] ; 
              $this->nmgp_dados_select['negritudes'] = $this->negritudes;
              $this->etnia = $rs->fields[56] ; 
              $this->nmgp_dados_select['etnia'] = $this->etnia;
              $this->discapacidades = $rs->fields[57] ; 
              $this->nmgp_dados_select['discapacidades'] = $this->discapacidades;
              $this->capacidades = $rs->fields[58] ; 
              $this->nmgp_dados_select['capacidades'] = $this->capacidades;
              $this->postalcode = $rs->fields[59] ; 
              $this->nmgp_dados_select['postalcode'] = $this->postalcode;
              $this->email = $rs->fields[60] ; 
              $this->nmgp_dados_select['email'] = $this->email;
              $this->login = $rs->fields[61] ; 
              $this->nmgp_dados_select['login'] = $this->login;
              $this->photo = $rs->fields[62] ; 
              $this->nmgp_dados_select['photo'] = $this->photo;
              $this->observaciones = $rs->fields[63] ; 
              $this->nmgp_dados_select['observaciones'] = $this->observaciones;
              $this->peso = trim($rs->fields[64]) ; 
              $this->nmgp_dados_select['peso'] = $this->peso;
              $this->talla = trim($rs->fields[65]) ; 
              $this->nmgp_dados_select['talla'] = $this->talla;
              $this->cobertura = $rs->fields[66] ; 
              $this->nmgp_dados_select['cobertura'] = $this->cobertura;
              $this->vive_con = $rs->fields[67] ; 
              $this->nmgp_dados_select['vive_con'] = $this->vive_con;
              $this->subsidio = $rs->fields[68] ; 
              $this->nmgp_dados_select['subsidio'] = $this->subsidio;
              $this->novedades = $rs->fields[69] ; 
              $this->nmgp_dados_select['novedades'] = $this->novedades;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->idstudents = (string)$this->idstudents; 
              $this->id_jornada = (string)$this->id_jornada; 
              $this->semestre = (string)$this->semestre; 
              $this->departanebti_expedicion = (string)$this->departanebti_expedicion; 
              $this->municipio_expedicion = (string)$this->municipio_expedicion; 
              $this->anos_cumplidos = (string)$this->anos_cumplidos; 
              $this->dpto_nacimiento = (string)$this->dpto_nacimiento; 
              $this->municipio_nacimiento = (string)$this->municipio_nacimiento; 
              $this->city = (string)$this->city; 
              $this->state = (string)$this->state; 
              $this->grado_anterior = (string)$this->grado_anterior; 
              $this->grado_igreso = (string)$this->grado_igreso; 
              $this->id_nivel = (string)$this->id_nivel; 
              $this->id_grupo = (string)$this->id_grupo; 
              $this->eps = (string)$this->eps; 
              $this->victima_conflicto = (string)$this->victima_conflicto; 
              $this->estatus_vca = (string)$this->estatus_vca; 
              $this->depto_expulsor = (string)$this->depto_expulsor; 
              $this->municipio_expulsor = (string)$this->municipio_expulsor; 
              $this->estrato = (string)$this->estrato; 
              $this->fuente_recurso = (string)$this->fuente_recurso; 
              $this->opcion = (string)$this->opcion; 
              $this->discapacidades = (string)$this->discapacidades; 
              $this->capacidades = (string)$this->capacidades; 
              $this->peso = (strpos(strtolower($this->peso), "e")) ? (float)$this->peso : $this->peso; 
              $this->peso = (string)$this->peso; 
              $this->talla = (strpos(strtolower($this->talla), "e")) ? (float)$this->talla : $this->talla; 
              $this->talla = (string)$this->talla; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['parms'] = "idstudents?#?$this->idstudents?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sub_dir'][0]  = "estudiante";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] < $qt_geral_reg_form_students;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->idstudents = "";  
              $this->id_sede = "";  
              $this->id_jornada = "";  
              $this->semestre = "";  
              $this->estatus = "";  
              $this->fecha_matricula =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->tipo_identificacion = "";  
              $this->numero_documento = "";  
              $this->departanebti_expedicion = "";  
              $this->municipio_expedicion = "";  
              $this->primer_nombre = "";  
              $this->segundo_nombre = "";  
              $this->primer_apellido = "";  
              $this->segundo_apellido = "";  
              $this->firstname = "";  
              $this->lastname = "";  
              $this->genero = "";  
              $this->fecha_nacimiento = "";  
              $this->fecha_nacimiento_hora = "" ;  
              $this->anos_cumplidos = "";  
              $this->dpto_nacimiento = "";  
              $this->municipio_nacimiento = "";  
              $this->address = "";  
              $this->barrio = "";  
              $this->zona = "";  
              $this->city = "";  
              $this->state = "";  
              $this->telefono = "";  
              $this->grado_anterior = "";  
              $this->last_year = "";  
              $this->last_year_hora = "" ;  
              $this->nombre_ult_plantel = "";  
              $this->resultado = "";  
              $this->grado_igreso = "";  
              $this->id_nivel = "";  
              $this->subsidado = "";  
              $this->interno = "";  
              $this->id_grupo = "";  
              $this->otro_modelo = "";  
              $this->caracter = "";  
              $this->especialidad = "";  
              $this->eps = "";  
              $this->ips = "";  
              $this->ars = "";  
              $this->tipo_sangre = "";  
              $this->victima_conflicto = "";  
              $this->estatus_vca = "";  
              $this->depto_expulsor = "";  
              $this->municipio_expulsor = "";  
              $this->fecha_expulsion = "";  
              $this->fecha_expulsion_hora = "" ;  
              $this->certificado = "";  
              $this->numero_carne_sisben = "";  
              $this->nivel_sisben = "";  
              $this->estrato = "";  
              $this->fuente_recurso = "";  
              $this->opcion = "";  
              $this->resguardo = "";  
              $this->negritudes = "";  
              $this->etnia = "";  
              $this->discapacidades = "";  
              $this->capacidades = "";  
              $this->postalcode = "";  
              $this->email = "";  
              $this->login = "";  
              $this->photo = "";  
              $this->photo_ul_name = "" ;  
              $this->photo_ul_type = "" ;  
              $this->observaciones = "";  
              $this->peso = "";  
              $this->talla = "";  
              $this->cobertura = "";  
              $this->vive_con = "";  
              $this->subsidio = "";  
              $this->confirm_pswd = "";  
              $this->matricular = "";  
              $this->novedades = "";  
              $this->pswd = "";  
              $this->year_mat = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      $this->nm_proc_onload();
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_novedades_x_estudiante_fecha']['embutida_parms'] = "par_idestudiante?#?" . $this->nmgp_dados_form['idstudents'] . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idstudents) from " . $this->Ini->nm_tabela . " where idstudents < $this->idstudents" . $str_where_filter; 
     $rs = $this->Db->Execute("select max(idstudents) from " . $this->Ini->nm_tabela . " where idstudents < $this->idstudents" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idstudents = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idstudents) from " . $this->Ini->nm_tabela . " where idstudents > $this->idstudents" . $str_where_filter; 
     $rs = $this->Db->Execute("select min(idstudents) from " . $this->Ini->nm_tabela . " where idstudents > $this->idstudents" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idstudents = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idstudents) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
     $rs = $this->Db->Execute("select min(idstudents) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->idstudents = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idstudents) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idstudents) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->idstudents = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['reg_start'] + 1;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
//
function calculaEdad()
{
$_SESSION['scriptcase']['form_students']['contr_erro'] = 'on';
         
$fecha_nacimiento2  = $this->fecha_nacimiento ; 
$current_date = date('Y'); 
$Edad2 = $this->nm_data->Dif_Datas($current_date, 'aaaa', $fecha_nacimiento2 , 'aaaa'); 
$this->anos_cumplidos  = round($Edad2 / 365) ;


$_SESSION['scriptcase']['form_students']['contr_erro'] = 'off';
}
function fecha_nacimiento_onChange()
{
$_SESSION['scriptcase']['form_students']['contr_erro'] = 'on';
         
$original_fecha_nacimiento = $this->fecha_nacimiento;
$original_anos_cumplidos = $this->anos_cumplidos;
$this->calculaEdad();

$modificado_fecha_nacimiento = $this->fecha_nacimiento;
$modificado_anos_cumplidos = $this->anos_cumplidos;
$this->nm_formatar_campos('fecha_nacimiento', 'anos_cumplidos');
if ($original_fecha_nacimiento !== $modificado_fecha_nacimiento || (isset($bFlagRead_fecha_nacimiento) && $bFlagRead_fecha_nacimiento))
{
    $this->ajax_return_values_fecha_nacimiento(true);
}
if ($original_anos_cumplidos !== $modificado_anos_cumplidos || (isset($bFlagRead_anos_cumplidos) && $bFlagRead_anos_cumplidos))
{
    $this->ajax_return_values_anos_cumplidos(true);
}
form_students_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_students']['contr_erro'] = 'off';
}
function matricula()
{
$_SESSION['scriptcase']['form_students']['contr_erro'] = 'on';
         
$sql = "SELECT
   idclasses   
FROM
   classes 
WHERE idcourses = ". $this->id_grupo ."";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dsgrp = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dsgrp[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dsgrp = false;
          $this->dsgrp_erro = $this->Db->ErrorMsg();
      } 
;


foreach($this->dsgrp  as $arr_grp){
	
	
	

$insert_table  = 'students_x_classes';      
$insert_fields = array(   
     'idstudents' => "'$this->idstudents'",
     'idclasses' => "'$arr_grp[0]'",
 );

$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')
	ON DUPLICATE KEY
	UPDATE idstudents = idstudents, idclasses = idclasses
	 ';
	
	
	
	


     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_students_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	
}
$_SESSION['scriptcase']['form_students']['contr_erro'] = 'off';
}
function victima_conflicto_onChange()
{
$_SESSION['scriptcase']['form_students']['contr_erro'] = 'on';
         
$original_victima_conflicto = $this->victima_conflicto;

if ($this->victima_conflicto  == 1)
{
$this->Ini->nm_hidden_blocos[5] = "on"; $this->NM_ajax_info['blockDisplay']['5'] = 'on';
}
else
{
$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off';
}

$modificado_victima_conflicto = $this->victima_conflicto;
$this->nm_formatar_campos('victima_conflicto');
if ($original_victima_conflicto !== $modificado_victima_conflicto || (isset($bFlagRead_victima_conflicto) && $bFlagRead_victima_conflicto))
{
    $this->ajax_return_values_victima_conflicto(true);
}
form_students_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_students']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_students_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_photo = "";  
   } 
   else 
   { 
       $out_photo = $this->photo;  
   } 
   if ($this->photo != "" && $this->photo != "none")   
   { 
       $path_photo = $this->Ini->root . $this->Ini->path_imagens . "estudiante" . "/" . $this->photo;
       $md5_photo  = md5("estudiante" . $this->photo);
       if (is_file($path_photo))  
       { 
           $NM_ler_img = true;
           $out_photo = $this->Ini->path_imag_temp . "/sc_photo_" . $md5_photo . ".gif" ;  
           if (is_file($this->Ini->root . $out_photo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_photo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_photo = fopen($path_photo, "r") ; 
               $reg_photo = fread($tmp_photo, filesize($path_photo)) ; 
               fclose($tmp_photo) ;  
               $arq_photo = fopen($this->Ini->root . $out_photo, "w") ;  
               fwrite($arq_photo, $reg_photo) ;  
               fclose($arq_photo) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_photo);
           $this->nmgp_return_img['photo'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['photo'][1] = $sc_obj_img->getWidth();
           $NM_redim_img = true;
           $out1_photo = $out_photo; 
           $md5_photo  = md5("estudiante" . $this->photo);
           $out_photo = $this->Ini->path_imag_temp . "/sc_photo_150150" . $md5_photo . ".gif" ;  
           if (is_file($this->Ini->root . $out_photo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_photo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_redim_img = false;
               } 
           } 
           if ($NM_redim_img) 
           { 
               if (!$this->Ini->Gd_missing)
               { 
                   $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_photo);
                   $sc_obj_img->setWidth(150);
                   $sc_obj_img->setHeight(150);
                   $sc_obj_img->setManterAspecto(true);
                   $sc_obj_img->createImg($this->Ini->root . $out_photo);
               } 
               else 
               { 
                   $out_photo = $out1_photo;
               } 
           } 
       } 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_photo;
       if (isset($temp_out_photo))
       {
           $out_photo = $temp_out_photo;
       }
       global $temp_out1_photo;
       if (isset($temp_out1_photo))
       {
           $out1_photo = $temp_out1_photo;
       }
   }
        include_once("form_students_form0.php");
        include_once("form_students_form1.php");
        include_once("form_students_form2.php");
        include_once("form_students_form3.php");
        include_once("form_students_form4.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_students_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "primer_nombre", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "segundo_nombre", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "primer_apellido", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "segundo_apellido", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_students = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['total'] = $qt_geral_reg_form_students;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_students_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_students_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "idstudents";$nm_numeric[] = "id_jornada";$nm_numeric[] = "semestre";$nm_numeric[] = "departanebti_expedicion";$nm_numeric[] = "municipio_expedicion";$nm_numeric[] = "anos_cumplidos";$nm_numeric[] = "dpto_nacimiento";$nm_numeric[] = "municipio_nacimiento";$nm_numeric[] = "city";$nm_numeric[] = "state";$nm_numeric[] = "grado_anterior";$nm_numeric[] = "grado_igreso";$nm_numeric[] = "id_nivel";$nm_numeric[] = "id_grupo";$nm_numeric[] = "eps";$nm_numeric[] = "victima_conflicto";$nm_numeric[] = "estatus_vca";$nm_numeric[] = "depto_expulsor";$nm_numeric[] = "municipio_expulsor";$nm_numeric[] = "estrato";$nm_numeric[] = "fuente_recurso";$nm_numeric[] = "opcion";$nm_numeric[] = "discapacidades";$nm_numeric[] = "capacidades";$nm_numeric[] = "peso";$nm_numeric[] = "talla";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
      $Nm_datas['fecha_matricula'] = "date";$Nm_datas['fecha_nacimiento'] = "date";$Nm_datas['last_year'] = "date";$Nm_datas['fecha_expulsion'] = "date";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_students_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_students_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_students_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_students']['masterValue']);
?>
}
<?php
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
