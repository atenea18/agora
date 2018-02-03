<?php
   include_once('grid_t_estudiante_asist_grado_session.php');
   session_start();
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
    $Ord_Cmp = new grid_t_estudiante_asist_grado_Ord_cmp(); 
    $Ord_Cmp->Ord_cmp_init();
   
class grid_t_estudiante_asist_grado_Ord_cmp
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
   $tab_ger_campos['nombre'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['nombre'] = "nombre";
       $tab_converte["nombre"]   = "nombre";
   }
   else
   {
       $tab_def_campos['nombre'] = "concat_ws(' ',primer_apellido,segundo_apellido,primer_nombre,segundo_nombre)";
       $tab_converte["concat_ws(' ',primer_apellido,segundo_apellido,primer_nombre,segundo_nombre)"]   = "nombre";
   }
   $tab_labels["nombre"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["nombre"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["nombre"] : "Nombre";
   $tab_ger_campos['novedades_novedad'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['novedades_novedad'] = "novedades_novedad";
       $tab_converte["novedades_novedad"]   = "novedades_novedad";
   }
   else
   {
       $tab_def_campos['novedades_novedad'] = "novedades.novedad";
       $tab_converte["novedades.novedad"]   = "novedades_novedad";
   }
   $tab_labels["novedades_novedad"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["novedades_novedad"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["novedades_novedad"] : "Nov";
   $tab_ger_campos['col1'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col1'] = "col1";
       $tab_converte["col1"]   = "col1";
   }
   else
   {
       $tab_def_campos['col1'] = "";
       $tab_converte[""]   = "col1";
   }
   $tab_labels["col1"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col1"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col1"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col2'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col2'] = "col2";
       $tab_converte["col2"]   = "col2";
   }
   else
   {
       $tab_def_campos['col2'] = "";
       $tab_converte[""]   = "col2";
   }
   $tab_labels["col2"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col2"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col2"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col3'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col3'] = "col3";
       $tab_converte["col3"]   = "col3";
   }
   else
   {
       $tab_def_campos['col3'] = "";
       $tab_converte[""]   = "col3";
   }
   $tab_labels["col3"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col3"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col3"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col4'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col4'] = "col4";
       $tab_converte["col4"]   = "col4";
   }
   else
   {
       $tab_def_campos['col4'] = "";
       $tab_converte[""]   = "col4";
   }
   $tab_labels["col4"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col4"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col4"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col5'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col5'] = "col5";
       $tab_converte["col5"]   = "col5";
   }
   else
   {
       $tab_def_campos['col5'] = "";
       $tab_converte[""]   = "col5";
   }
   $tab_labels["col5"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col5"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col5"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col6'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col6'] = "col6";
       $tab_converte["col6"]   = "col6";
   }
   else
   {
       $tab_def_campos['col6'] = "";
       $tab_converte[""]   = "col6";
   }
   $tab_labels["col6"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col6"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col6"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col7'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col7'] = "col7";
       $tab_converte["col7"]   = "col7";
   }
   else
   {
       $tab_def_campos['col7'] = "";
       $tab_converte[""]   = "col7";
   }
   $tab_labels["col7"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col7"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col7"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col8'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col8'] = "col8";
       $tab_converte["col8"]   = "col8";
   }
   else
   {
       $tab_def_campos['col8'] = "";
       $tab_converte[""]   = "col8";
   }
   $tab_labels["col8"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col8"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col8"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col9'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col9'] = "col9";
       $tab_converte["col9"]   = "col9";
   }
   else
   {
       $tab_def_campos['col9'] = "";
       $tab_converte[""]   = "col9";
   }
   $tab_labels["col9"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col9"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col9"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col10'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col10'] = "col10";
       $tab_converte["col10"]   = "col10";
   }
   else
   {
       $tab_def_campos['col10'] = "";
       $tab_converte[""]   = "col10";
   }
   $tab_labels["col10"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col10"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col10"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col11'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col11'] = "col11";
       $tab_converte["col11"]   = "col11";
   }
   else
   {
       $tab_def_campos['col11'] = "";
       $tab_converte[""]   = "col11";
   }
   $tab_labels["col11"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col11"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col11"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col12'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col12'] = "col12";
       $tab_converte["col12"]   = "col12";
   }
   else
   {
       $tab_def_campos['col12'] = "";
       $tab_converte[""]   = "col12";
   }
   $tab_labels["col12"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col12"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col12"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col13'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col13'] = "col13";
       $tab_converte["col13"]   = "col13";
   }
   else
   {
       $tab_def_campos['col13'] = "";
       $tab_converte[""]   = "col13";
   }
   $tab_labels["col13"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col13"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col13"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col14'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col14'] = "col14";
       $tab_converte["col14"]   = "col14";
   }
   else
   {
       $tab_def_campos['col14'] = "";
       $tab_converte[""]   = "col14";
   }
   $tab_labels["col14"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col14"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col14"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col15'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col15'] = "col15";
       $tab_converte["col15"]   = "col15";
   }
   else
   {
       $tab_def_campos['col15'] = "";
       $tab_converte[""]   = "col15";
   }
   $tab_labels["col15"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col15"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col15"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col16'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col16'] = "col16";
       $tab_converte["col16"]   = "col16";
   }
   else
   {
       $tab_def_campos['col16'] = "";
       $tab_converte[""]   = "col16";
   }
   $tab_labels["col16"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col16"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col16"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col17'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col17'] = "col17";
       $tab_converte["col17"]   = "col17";
   }
   else
   {
       $tab_def_campos['col17'] = "";
       $tab_converte[""]   = "col17";
   }
   $tab_labels["col17"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col17"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col17"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col18'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col18'] = "col18";
       $tab_converte["col18"]   = "col18";
   }
   else
   {
       $tab_def_campos['col18'] = "";
       $tab_converte[""]   = "col18";
   }
   $tab_labels["col18"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col18"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col18"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col19'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col19'] = "col19";
       $tab_converte["col19"]   = "col19";
   }
   else
   {
       $tab_def_campos['col19'] = "";
       $tab_converte[""]   = "col19";
   }
   $tab_labels["col19"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col19"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col19"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col20'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col20'] = "col20";
       $tab_converte["col20"]   = "col20";
   }
   else
   {
       $tab_def_campos['col20'] = "";
       $tab_converte[""]   = "col20";
   }
   $tab_labels["col20"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col20"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col20"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col21'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col21'] = "col21";
       $tab_converte["col21"]   = "col21";
   }
   else
   {
       $tab_def_campos['col21'] = "";
       $tab_converte[""]   = "col21";
   }
   $tab_labels["col21"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col21"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col21"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col22'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col22'] = "col22";
       $tab_converte["col22"]   = "col22";
   }
   else
   {
       $tab_def_campos['col22'] = "";
       $tab_converte[""]   = "col22";
   }
   $tab_labels["col22"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col22"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col22"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col23'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col23'] = "col23";
       $tab_converte["col23"]   = "col23";
   }
   else
   {
       $tab_def_campos['col23'] = "";
       $tab_converte[""]   = "col23";
   }
   $tab_labels["col23"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col23"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col23"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col24'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col24'] = "col24";
       $tab_converte["col24"]   = "col24";
   }
   else
   {
       $tab_def_campos['col24'] = "";
       $tab_converte[""]   = "col24";
   }
   $tab_labels["col24"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col24"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col24"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col25'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col25'] = "col25";
       $tab_converte["col25"]   = "col25";
   }
   else
   {
       $tab_def_campos['col25'] = "";
       $tab_converte[""]   = "col25";
   }
   $tab_labels["col25"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col25"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col25"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col26'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col26'] = "col26";
       $tab_converte["col26"]   = "col26";
   }
   else
   {
       $tab_def_campos['col26'] = "";
       $tab_converte[""]   = "col26";
   }
   $tab_labels["col26"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col26"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col26"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col27'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col27'] = "col27";
       $tab_converte["col27"]   = "col27";
   }
   else
   {
       $tab_def_campos['col27'] = "";
       $tab_converte[""]   = "col27";
   }
   $tab_labels["col27"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col27"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col27"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col28'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col28'] = "col28";
       $tab_converte["col28"]   = "col28";
   }
   else
   {
       $tab_def_campos['col28'] = "";
       $tab_converte[""]   = "col28";
   }
   $tab_labels["col28"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col28"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col28"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col29'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col29'] = "col29";
       $tab_converte["col29"]   = "col29";
   }
   else
   {
       $tab_def_campos['col29'] = "";
       $tab_converte[""]   = "col29";
   }
   $tab_labels["col29"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col29"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col29"] : "&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['col30'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col30'] = "col30";
       $tab_converte["col30"]   = "col30";
   }
   else
   {
       $tab_def_campos['col30'] = "";
       $tab_converte[""]   = "col30";
   }
   $tab_labels["col30"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col30"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col30"] : "    ";
   $tab_ger_campos['col31'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['col31'] = "col31";
       $tab_converte["col31"]   = "col31";
   }
   else
   {
       $tab_def_campos['col31'] = "";
       $tab_converte[""]   = "col31";
   }
   $tab_labels["col31"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col31"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['labels']["col31"] : "    ";
   $tab_ger_campos['col1'] = "none";
   $tab_ger_campos['col2'] = "none";
   $tab_ger_campos['col3'] = "none";
   $tab_ger_campos['col4'] = "none";
   $tab_ger_campos['col5'] = "none";
   $tab_ger_campos['col6'] = "none";
   $tab_ger_campos['col7'] = "none";
   $tab_ger_campos['col8'] = "none";
   $tab_ger_campos['col9'] = "none";
   $tab_ger_campos['col10'] = "none";
   $tab_ger_campos['col11'] = "none";
   $tab_ger_campos['col12'] = "none";
   $tab_ger_campos['col13'] = "none";
   $tab_ger_campos['col14'] = "none";
   $tab_ger_campos['col15'] = "none";
   $tab_ger_campos['col16'] = "none";
   $tab_ger_campos['col17'] = "none";
   $tab_ger_campos['col18'] = "none";
   $tab_ger_campos['col19'] = "none";
   $tab_ger_campos['col20'] = "none";
   $tab_ger_campos['col21'] = "none";
   $tab_ger_campos['col22'] = "none";
   $tab_ger_campos['col23'] = "none";
   $tab_ger_campos['col24'] = "none";
   $tab_ger_campos['col25'] = "none";
   $tab_ger_campos['col26'] = "none";
   $tab_ger_campos['col27'] = "none";
   $tab_ger_campos['col28'] = "none";
   $tab_ger_campos['col29'] = "none";
   $tab_ger_campos['col30'] = "none";
   $tab_ger_campos['col31'] = "none";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_t_estudiante_asist_grado']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_t_estudiante_asist_grado']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_t_estudiante_asist_grado']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['ordem_select']))
   {
       $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['ordem_select'] = array();
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
   $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['ordem_select'] = array();
   $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['ordem_grid']   = "";
   $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['ordem_cmp']    = "";
   foreach ($campos_sel as $campo_sort)
   {
       $ordem = (substr($campo_sort, 0, 1) == "+") ? "asc" : "desc";
       $campo = substr($campo_sort, 1);
       if (isset($tab_converte[$campo]))
       {
           $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['ordem_select'][$campo] = $ordem;
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
   $str_schema_all = (isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['str_schema_all']) && !empty($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['str_schema_all'])) ? $_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['str_schema_all'] : "neutro_agora/neutro_agora";
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
 <TITLE><?php echo $this->Nm_lang['lang_othr_grid_titl'] ?> - </TITLE>
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
    url: "grid_t_estudiante_asist_grado_order_campos.php",
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
           if (!isset($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['ordem_select'][$tab_def_campos[$NM_cada_field]]))
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
   foreach ($_SESSION['sc_session'][$sc_init]['grid_t_estudiante_asist_grado']['ordem_select'] as $NM_cada_field => $NM_cada_opc)
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
