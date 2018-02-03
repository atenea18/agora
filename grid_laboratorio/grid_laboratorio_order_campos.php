<?php
   include_once('grid_laboratorio_session.php');
   session_start();
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
    $Ord_Cmp = new grid_laboratorio_Ord_cmp(); 
    $Ord_Cmp->Ord_cmp_init();
   
class grid_laboratorio_Ord_cmp
{
function Ord_cmp_init()
{
  global $sc_init, $path_img, $path_btn, $tab_ger_campos, $tab_def_campos, $tab_converte, $tab_labels, $embbed, $tbar_pos, $_POST, $_GET;
   if (isset($_POST['script_case_init']))
   {
       $sc_init    = $_POST['script_case_init'];
       $path_img   = $_POST['path_img'];
       $path_btn   = $_POST['path_btn'];
       $use_alias  = (isset($_POST['use_alias']))  ? $_POST['use_alias']  : "S";
       $fsel_ok    = (isset($_POST['fsel_ok']))    ? $_POST['fsel_ok']    : "";
       $campos_sel = (isset($_POST['campos_sel'])) ? $_POST['campos_sel'] : "";
       $sel_regra  = (isset($_POST['sel_regra']))  ? $_POST['sel_regra']  : "";
       $embbed     = isset($_POST['embbed_groupby']) && 'Y' == $_POST['embbed_groupby'];
       $tbar_pos   = isset($_POST['toolbar_pos']) ? $_POST['toolbar_pos'] : '';
   }
   elseif (isset($_GET['script_case_init']))
   {
       $sc_init    = $_GET['script_case_init'];
       $path_img   = $_GET['path_img'];
       $path_btn   = $_GET['path_btn'];
       $use_alias  = (isset($_GET['use_alias']))  ? $_GET['use_alias']  : "S";
       $fsel_ok    = (isset($_GET['fsel_ok']))    ? $_GET['fsel_ok']    : "";
       $campos_sel = (isset($_GET['campos_sel'])) ? $_GET['campos_sel'] : "";
       $sel_regra  = (isset($_GET['sel_regra']))  ? $_GET['sel_regra']  : "";
       $embbed     = isset($_GET['embbed_groupby']) && 'Y' == $_GET['embbed_groupby'];
       $tbar_pos   = isset($_GET['toolbar_pos']) ? $_GET['toolbar_pos'] : '';
   }
   $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
   $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
   $this->Nm_lang = array();
   if (is_file($NM_arq_lang))
   {
       include_once($NM_arq_lang);
   }
   
   $tab_ger_campos = array();
   $tab_def_campos = array();
   $tab_labels     = array();
   $tab_ger_campos['nombre_completo'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['nombre_completo'] = "nombre_completo";
       $tab_converte["nombre_completo"]   = "nombre_completo";
   }
   else
   {
       $tab_def_campos['nombre_completo'] = "";
       $tab_converte[""]   = "nombre_completo";
   }
   $tab_labels["nombre_completo"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["nombre_completo"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["nombre_completo"] : "Apellidos y Nombres del Estudian";
   $tab_ger_campos['students_semestre'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_semestre'] = "students_semestre";
       $tab_converte["students_semestre"]   = "students_semestre";
   }
   else
   {
       $tab_def_campos['students_semestre'] = "students.semestre";
       $tab_converte["students.semestre"]   = "students_semestre";
   }
   $tab_labels["students_semestre"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_semestre"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_semestre"] : "Semestre";
   $tab_ger_campos['students_estatus'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_estatus'] = "students_estatus";
       $tab_converte["students_estatus"]   = "students_estatus";
   }
   else
   {
       $tab_def_campos['students_estatus'] = "students.estatus";
       $tab_converte["students.estatus"]   = "students_estatus";
   }
   $tab_labels["students_estatus"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_estatus"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_estatus"] : "Estatus";
   $tab_ger_campos['students_fecha_matricula'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_fecha_matricula'] = "students_fecha_matricula";
       $tab_converte["students_fecha_matricula"]   = "students_fecha_matricula";
   }
   else
   {
       $tab_def_campos['students_fecha_matricula'] = "students.fecha_matricula";
       $tab_converte["students.fecha_matricula"]   = "students_fecha_matricula";
   }
   $tab_labels["students_fecha_matricula"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_fecha_matricula"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_fecha_matricula"] : "Fecha Matricula";
   $tab_ger_campos['students_tipo_identificacion'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_tipo_identificacion'] = "students_tipo_identificacion";
       $tab_converte["students_tipo_identificacion"]   = "students_tipo_identificacion";
   }
   else
   {
       $tab_def_campos['students_tipo_identificacion'] = "students.tipo_identificacion";
       $tab_converte["students.tipo_identificacion"]   = "students_tipo_identificacion";
   }
   $tab_labels["students_tipo_identificacion"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_tipo_identificacion"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_tipo_identificacion"] : "Tipo Identificacion";
   $tab_ger_campos['students_numero_documento'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_numero_documento'] = "students_numero_documento";
       $tab_converte["students_numero_documento"]   = "students_numero_documento";
   }
   else
   {
       $tab_def_campos['students_numero_documento'] = "students.numero_documento";
       $tab_converte["students.numero_documento"]   = "students_numero_documento";
   }
   $tab_labels["students_numero_documento"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_numero_documento"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_numero_documento"] : "Numero Documento";
   $tab_ger_campos['students_genero'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_genero'] = "students_genero";
       $tab_converte["students_genero"]   = "students_genero";
   }
   else
   {
       $tab_def_campos['students_genero'] = "students.genero";
       $tab_converte["students.genero"]   = "students_genero";
   }
   $tab_labels["students_genero"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_genero"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_genero"] : "Genero";
   $tab_ger_campos['students_fecha_nacimiento'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_fecha_nacimiento'] = "students_fecha_nacimiento";
       $tab_converte["students_fecha_nacimiento"]   = "students_fecha_nacimiento";
   }
   else
   {
       $tab_def_campos['students_fecha_nacimiento'] = "students.fecha_nacimiento";
       $tab_converte["students.fecha_nacimiento"]   = "students_fecha_nacimiento";
   }
   $tab_labels["students_fecha_nacimiento"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_fecha_nacimiento"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_fecha_nacimiento"] : "Fecha Nacimiento";
   $tab_ger_campos['students_anos_cumplidos'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_anos_cumplidos'] = "students_anos_cumplidos";
       $tab_converte["students_anos_cumplidos"]   = "students_anos_cumplidos";
   }
   else
   {
       $tab_def_campos['students_anos_cumplidos'] = "students.anos_cumplidos";
       $tab_converte["students.anos_cumplidos"]   = "students_anos_cumplidos";
   }
   $tab_labels["students_anos_cumplidos"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_anos_cumplidos"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_anos_cumplidos"] : "Años Cumplidos";
   $tab_ger_campos['students_telefono'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_telefono'] = "students_telefono";
       $tab_converte["students_telefono"]   = "students_telefono";
   }
   else
   {
       $tab_def_campos['students_telefono'] = "students.telefono";
       $tab_converte["students.telefono"]   = "students_telefono";
   }
   $tab_labels["students_telefono"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_telefono"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_telefono"] : "Telefono";
   $tab_ger_campos['students_etnia'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_etnia'] = "students_etnia";
       $tab_converte["students_etnia"]   = "students_etnia";
   }
   else
   {
       $tab_def_campos['students_etnia'] = "students.etnia";
       $tab_converte["students.etnia"]   = "students_etnia";
   }
   $tab_labels["students_etnia"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_etnia"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_etnia"] : "Etnia";
   $tab_ger_campos['students_email'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_email'] = "students_email";
       $tab_converte["students_email"]   = "students_email";
   }
   else
   {
       $tab_def_campos['students_email'] = "students.email";
       $tab_converte["students.email"]   = "students_email";
   }
   $tab_labels["students_email"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_email"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_email"] : "Email";
   $tab_ger_campos['students_zona'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['students_zona'] = "students_zona";
       $tab_converte["students_zona"]   = "students_zona";
   }
   else
   {
       $tab_def_campos['students_zona'] = "students.zona";
       $tab_converte["students.zona"]   = "students_zona";
   }
   $tab_labels["students_zona"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_zona"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["students_zona"] : "Comuna";
   $tab_ger_campos['campo_vac_1'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['campo_vac_1'] = "campo_vac_1";
       $tab_converte["campo_vac_1"]   = "campo_vac_1";
   }
   else
   {
       $tab_def_campos['campo_vac_1'] = "";
       $tab_converte[""]   = "campo_vac_1";
   }
   $tab_labels["campo_vac_1"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_1"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_1"] : "<FONT COLOR=DADADA>___________</FONT>";
   $tab_ger_campos['campo_vac_2'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['campo_vac_2'] = "campo_vac_2";
       $tab_converte["campo_vac_2"]   = "campo_vac_2";
   }
   else
   {
       $tab_def_campos['campo_vac_2'] = "";
       $tab_converte[""]   = "campo_vac_2";
   }
   $tab_labels["campo_vac_2"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_2"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_2"] : "<FONT COLOR=DADADA>___________</FONT>";
   $tab_ger_campos['campo_vac_3'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['campo_vac_3'] = "campo_vac_3";
       $tab_converte["campo_vac_3"]   = "campo_vac_3";
   }
   else
   {
       $tab_def_campos['campo_vac_3'] = "";
       $tab_converte[""]   = "campo_vac_3";
   }
   $tab_labels["campo_vac_3"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_3"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_3"] : "<FONT COLOR=DADADA>___________</FONT>";
   $tab_ger_campos['campo_vac_4'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['campo_vac_4'] = "campo_vac_4";
       $tab_converte["campo_vac_4"]   = "campo_vac_4";
   }
   else
   {
       $tab_def_campos['campo_vac_4'] = "";
       $tab_converte[""]   = "campo_vac_4";
   }
   $tab_labels["campo_vac_4"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_4"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_4"] : "<FONT COLOR=DADADA>___________</FONT>";
   $tab_ger_campos['campo_vac_5'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['campo_vac_5'] = "campo_vac_5";
       $tab_converte["campo_vac_5"]   = "campo_vac_5";
   }
   else
   {
       $tab_def_campos['campo_vac_5'] = "";
       $tab_converte[""]   = "campo_vac_5";
   }
   $tab_labels["campo_vac_5"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_5"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_5"] : "<FONT COLOR=DADADA>___________</FONT>";
   $tab_ger_campos['campo_vac_6'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['campo_vac_6'] = "campo_vac_6";
       $tab_converte["campo_vac_6"]   = "campo_vac_6";
   }
   else
   {
       $tab_def_campos['campo_vac_6'] = "";
       $tab_converte[""]   = "campo_vac_6";
   }
   $tab_labels["campo_vac_6"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_6"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_6"] : "<FONT COLOR=DADADA>___________</FONT>";
   $tab_ger_campos['campo_vac_7'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['campo_vac_7'] = "campo_vac_7";
       $tab_converte["campo_vac_7"]   = "campo_vac_7";
   }
   else
   {
       $tab_def_campos['campo_vac_7'] = "";
       $tab_converte[""]   = "campo_vac_7";
   }
   $tab_labels["campo_vac_7"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_7"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_7"] : "<FONT COLOR=DADADA>___________</FONT>";
   $tab_ger_campos['campo_vac_8'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['campo_vac_8'] = "campo_vac_8";
       $tab_converte["campo_vac_8"]   = "campo_vac_8";
   }
   else
   {
       $tab_def_campos['campo_vac_8'] = "";
       $tab_converte[""]   = "campo_vac_8";
   }
   $tab_labels["campo_vac_8"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_8"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_8"] : "<FONT COLOR=DADADA>___________</FONT>";
   $tab_ger_campos['campo_vac_9'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['campo_vac_9'] = "campo_vac_9";
       $tab_converte["campo_vac_9"]   = "campo_vac_9";
   }
   else
   {
       $tab_def_campos['campo_vac_9'] = "";
       $tab_converte[""]   = "campo_vac_9";
   }
   $tab_labels["campo_vac_9"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_9"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_9"] : "<FONT COLOR=DADADA>___________</FONT>";
   $tab_ger_campos['campo_vac_10'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['campo_vac_10'] = "campo_vac_10";
       $tab_converte["campo_vac_10"]   = "campo_vac_10";
   }
   else
   {
       $tab_def_campos['campo_vac_10'] = "";
       $tab_converte[""]   = "campo_vac_10";
   }
   $tab_labels["campo_vac_10"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_10"])) ? $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['labels']["campo_vac_10"] : "<FONT COLOR=DADADA>___________</FONT>";
   $tab_ger_campos['nombre_completo'] = "none";
   $tab_ger_campos['campo_vac_1'] = "none";
   $tab_ger_campos['campo_vac_2'] = "none";
   $tab_ger_campos['campo_vac_3'] = "none";
   $tab_ger_campos['campo_vac_4'] = "none";
   $tab_ger_campos['campo_vac_5'] = "none";
   $tab_ger_campos['campo_vac_6'] = "none";
   $tab_ger_campos['campo_vac_7'] = "none";
   $tab_ger_campos['campo_vac_8'] = "none";
   $tab_ger_campos['campo_vac_9'] = "none";
   $tab_ger_campos['campo_vac_10'] = "none";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_laboratorio']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_laboratorio']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_laboratorio']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['ordem_select']))
   {
       $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['ordem_select'] = array();
   }
   
   if ($fsel_ok == "cmp")
   {
       $this->Sel_processa_out_sel($campos_sel);
   }
   else
   {
       if ($embbed)
       {
           ob_start();
           $this->Sel_processa_form();
           $Temp = ob_get_clean();
           echo NM_charset_to_utf8($Temp);
       }
       else
       {
           $this->Sel_processa_form();
       }
   }
   exit;
   
}
function Sel_processa_out_sel($campos_sel)
{
   global $tab_ger_campos, $sc_init, $tab_def_campos, $tab_converte, $embbed;
   $arr_temp = array();
   $campos_sel = explode("@?@", $campos_sel);
   $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['ordem_select'] = array();
   $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['ordem_grid']   = "";
   $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['ordem_cmp']    = "";
   foreach ($campos_sel as $campo_sort)
   {
       $ordem = (substr($campo_sort, 0, 1) == "+") ? "asc" : "desc";
       $campo = substr($campo_sort, 1);
       if (isset($tab_converte[$campo]))
       {
           $_SESSION['sc_session'][$sc_init]['grid_laboratorio']['ordem_select'][$campo] = $ordem;
       }
   }
?>
    <script language="javascript"> 
<?php
   if (!$embbed)
   {
?>
      self.parent.tb_remove(); 
      parent.nm_gp_submit_ajax('inicio', ''); 
<?php
   }
   else
   {
?>
      nm_gp_submit_ajax('inicio', ''); 
<?php
   }
?>
   </script>
<?php
}
   
function Sel_processa_form()
{
  global $sc_init, $path_img, $path_btn, $tab_ger_campos, $tab_def_campos, $tab_converte, $tab_labels, $embbed, $tbar_pos;
   $size = 10;
   $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
   foreach ($this->Nm_lang as $ind => $dados)
   {
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
      {
          $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
          $this->Nm_lang[$ind] = $dados;
      }
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
      {
          $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   }
   $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_Citrine/Sc8_Citrine";
   include("../_lib/css/" . $str_schema_all . "_grid.php");
   $Str_btn_grid = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
   include("../_lib/buttons/" . $Str_btn_grid);
   if (!function_exists("nmButtonOutput"))
   {
       include_once("../_lib/lib/php/nm_gp_config_btn.php");
   }
   if (!$embbed)
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Nm_lang['lang_othr_grid_titl'] ?> - students</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_dir'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div_dir'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup'] ?>" /> 
</HEAD>
<BODY class="scGridPage" style="margin: 0px; overflow-x: hidden">
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery-ui.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.js"></script>
<?php
   }
?>
<script language="javascript"> 
<?php
if ($embbed)
{
?>
  function scSubmitOrderCampos(sPos, sType) {
    $("#id_fsel_ok_sel_ord").val(sType);
    if(sType == 'cmp')
    {
       scPackSelectedOrd();
    }
   $.ajax({
    type: "POST",
    url: "grid_laboratorio_order_campos.php",
    data: {
     script_case_init: $("#id_script_case_init_sel_ord").val(),
     script_case_session: $("#id_script_case_session_sel_ord").val(),
     path_img: $("#id_path_img_sel_ord").val(),
     path_btn: $("#id_path_btn_sel_ord").val(),
     campos_sel: $("#id_campos_sel_sel_ord").val(),
     sel_regra: $("#id_sel_regra_sel_ord").val(),
     fsel_ok: $("#id_fsel_ok_sel_ord").val(),
     embbed_groupby: 'Y'
    }
   }).success(function(data) {
    $("#sc_id_order_campos_placeholder_" + sPos).find("td").html(data);
    scBtnOrderCamposHide(sPos);
   });
  }
<?php
}
?>
 // Submeter o formularior
 //-------------------------------------
 function submit_form_Fsel_ord()
 {
     scPackSelectedOrd();
      document.Fsel_ord.submit();
 }
 function scPackSelectedOrd() {
  var fieldList, fieldName, i, selectedFields = new Array;
 fieldList = $("#sc_id_fldord_selected").sortable("toArray");
 for (i = 0; i < fieldList.length; i++) {
  fieldName  = fieldList[i].substr(14);
  selectedFields.push($("#sc_id_class_" + fieldName).val() + fieldName);
 }
 $("#id_campos_sel_sel_ord").val( selectedFields.join("@?@") );
 }
 </script>
<FORM name="Fsel_ord" method="POST">
  <INPUT type="hidden" name="script_case_init"    id="id_script_case_init_sel_ord"    value="<?php echo NM_encode_input($sc_init); ?>"> 
  <INPUT type="hidden" name="script_case_session" id="id_script_case_session_sel_ord" value="<?php echo NM_encode_input(session_id()); ?>"> 
  <INPUT type="hidden" name="path_img"            id="id_path_img_sel_ord"            value="<?php echo NM_encode_input($path_img); ?>"> 
  <INPUT type="hidden" name="path_btn"            id="id_path_btn_sel_ord"            value="<?php echo NM_encode_input($path_btn); ?>"> 
  <INPUT type="hidden" name="fsel_ok"             id="id_fsel_ok_sel_ord"             value=""> 
<?php
if ($embbed)
{
    echo "<div class='scAppDivMoldura'>";
    echo "<table id=\"main_table\" style=\"width: 100%\" cellspacing=0 cellpadding=0>";
}
elseif ($_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'")
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; right: 20px\">";
}
else
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; left: 20px\">";
}
?>
<?php
if (!$embbed)
{
?>
<tr>
<td>
<div class="scGridBorder">
<table width='100%' cellspacing=0 cellpadding=0>
<?php
}
?>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivHeader scAppDivHeaderText':'scGridLabelVert'; ?>">
   <?php echo $this->Nm_lang['lang_btns_sort_hint']; ?>
  </td>
 </tr>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivContent css_scAppDivContentText':'scGridTabelaTd'; ?>">
   <table class="<?php echo ($embbed)? '':'scGridTabela'; ?>" style="border-width: 0; border-collapse: collapse; width:100%;" cellspacing=0 cellpadding=0>
    <tr class="<?php echo ($embbed)? '':'scGridFieldOddVert'; ?>">
     <td style="vertical-align: top">
     <table>
   <tr><td style="vertical-align: top">
 <script language="javascript" type="text/javascript">
  $(function() {
   $(".sc_ui_litem").mouseover(function() {
    $(this).css("cursor", "all-scroll");
   });
   $("#sc_id_fldord_available").sortable({
    connectWith: ".sc_ui_fldord_selected",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    remove: function(event, ui) {
     var fieldName = $(ui.item[0]).find("select").attr("id");
     $("#" + fieldName).show();
     $('#f_sel_sub').css('display', 'inline-block');
    }
   }).disableSelection();
   $("#sc_id_fldord_selected").sortable({
    connectWith: ".sc_ui_fldord_available",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    remove: function(event, ui) {
     var fieldName = $(ui.item[0]).find("select").attr("id");
     $("#" + fieldName).hide();
     $('#f_sel_sub').css('display', 'inline-block');
    }
   });
   scUpdateListHeight();
  });
  function scUpdateListHeight() {
   $("#sc_id_fldord_available").css("min-height", "<?php echo sizeof($tab_ger_campos) * 35 ?>px");
   $("#sc_id_fldord_selected").css("min-height", "<?php echo sizeof($tab_ger_campos) * 35 ?>px");
  }
 </script>
 <style type="text/css">
  .sc_ui_sortable_ord {
   list-style-type: none;
   margin: 0;
   min-width: 225px;
  }
  .sc_ui_sortable_ord li {
   margin: 0 3px 3px 3px;
   padding: 1px 3px 1px 15px;
   min-height: 28px;
  }
  .sc_ui_sortable_ord li span {
   position: absolute;
   margin-left: -1.3em;
  }
 </style>
    <ul class="sc_ui_sort_groupby sc_ui_sortable_ord sc_ui_fldord_available scAppDivSelectFields" id="sc_id_fldord_available">
<?php
   foreach ($tab_ger_campos as $NM_cada_field => $NM_cada_opc)
   {
       if ($NM_cada_opc != "none")
       {
           if (!isset($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['ordem_select'][$tab_def_campos[$NM_cada_field]]))
           {
?>
     <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_itemord_<?php echo NM_encode_input($tab_def_campos[$NM_cada_field]); ?>">
      <?php echo $tab_labels[$NM_cada_field]; ?>
      <select id="sc_id_class_<?php echo NM_encode_input($tab_def_campos[$NM_cada_field]); ?>" class="scAppDivToolbarInput" style="display: none">
       <option value="+">Asc</option>
       <option value="-">Desc</option>
      </select><br/>
     </li>
<?php
           }
       }
   }
?>
    </ul>
   </td>
   <td style="vertical-align: top">
    <ul class="sc_ui_sort_groupby sc_ui_sortable_ord sc_ui_fldord_selected scAppDivSelectFields" id="sc_id_fldord_selected">
<?php
   foreach ($_SESSION['sc_session'][$sc_init]['grid_laboratorio']['ordem_select'] as $NM_cada_field => $NM_cada_opc)
   {
       if (isset($tab_converte[$NM_cada_field]))
       {
           $sAscSelected  = " selected";
           $sDescSelected = "";
           if ($NM_cada_opc == "desc")
           {
               $sAscSelected  = "";
               $sDescSelected = " selected";
           }
?>
     <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_itemord_<?php echo $NM_cada_field; ?>">
      <?php echo $tab_labels[$tab_converte[$NM_cada_field]]; ?>
      <select id="sc_id_class_<?php echo NM_encode_input($tab_def_campos[ $tab_converte[$NM_cada_field] ]); ?>" class="scAppDivToolbarInput" onchange="$('#f_sel_sub').css('display', 'inline-block');">
       <option value="+"<?php echo $sAscSelected; ?>>Asc</option>
       <option value="-"<?php echo $sDescSelected; ?>>Desc</option>
      </select>
     </li>
<?php
       }
   }
?>
    </ul>
    <input type="hidden" name="campos_sel" id="id_campos_sel_sel_ord" value="">
   </td>
   </tr>
   </table>
   </td>
   </tr>
   </table>
  </td>
 </tr>
   <tr><td class="<?php echo ($embbed)? 'scAppDivToolbar':'scGridToolbar'; ?>">
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bok", "document.Fsel_ord.fsel_ok.value='cmp';submit_form_Fsel_ord()", "document.Fsel_ord.fsel_ok.value='cmp';submit_form_Fsel_ord()", "f_sel_sub", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bapply", "scSubmitOrderCampos('" . NM_encode_input($tbar_pos) . "', 'cmp')", "scSubmitOrderCampos('" . NM_encode_input($tbar_pos) . "', 'cmp')", "f_sel_sub", "", "", "display: none;", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
  &nbsp;&nbsp;&nbsp;
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove()", "self.parent.tb_remove()", "Bsair", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnOrderCamposHide('" . NM_encode_input($tbar_pos) . "')", "scBtnOrderCamposHide('" . NM_encode_input($tbar_pos) . "')", "Bsair", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
   </td>
   </tr>
<?php
if (!$embbed)
{
?>
</table>
</div>
</td>
</tr>
<?php
}
?>
</table>
<?php
if ($embbed)
{
?>
    </div>
<?php
}
?>
</FORM>
<script language="javascript"> 
var bFixed = false;
function ajusta_window_Fsel_ord()
{
<?php
   if ($embbed)
   {
?>
  return false;
<?php
   }
?>
  var mt = $(document.getElementById("main_table"));
  if (0 == mt.width() || 0 == mt.height())
  {
    setTimeout("ajusta_window_Fsel_ord()", 50);
    return;
  }
  else if(!bFixed)
  {
    var oOrig = $(document.Fsel_ord.sel_orig),
        oDest = $(document.Fsel_ord.sel_dest),
        mHeight = Math.max(oOrig.height(), oDest.height()),
        mWidth = Math.max(oOrig.width() + 5, oDest.width() + 5);
    oOrig.height(mHeight);
    oOrig.width(mWidth);
    oDest.height(mHeight);
    oDest.width(mWidth + 15);
    bFixed = true;
    if (navigator.userAgent.indexOf("Chrome/") > 0)
    {
      strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
      self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
      setTimeout("ajusta_window_Fsel_ord()", 50);
      return;
    }
  }
  strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
  self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
}
$( document ).ready(function() {
  ajusta_window_Fsel_ord();
});
</script>
<script>
    ajusta_window_Fsel_ord();
</script>
</BODY>
</HTML>
<?php
}
}
