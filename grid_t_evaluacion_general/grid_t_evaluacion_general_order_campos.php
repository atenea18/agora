<?php
   include_once('grid_t_evaluacion_general_session.php');
   session_start();
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
    $Ord_Cmp = new grid_t_evaluacion_general_Ord_cmp(); 
    $Ord_Cmp->Ord_cmp_init();
   
class grid_t_evaluacion_general_Ord_cmp
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
   $tab_ger_campos['id_estudiante'] = "on";
   $tab_def_campos['id_estudiante'] = "id_estudiante";
   $tab_converte["id_estudiante"]   = "id_estudiante";
   $tab_labels["id_estudiante"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["id_estudiante"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["id_estudiante"] : "Estudiante";
   $tab_ger_campos['asig1'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig1'] = "asig1";
       $tab_converte["asig1"]   = "asig1";
   }
   else
   {
       $tab_def_campos['asig1'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig1]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig1]'"]   = "asig1";
   }
   $tab_labels["asig1"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig1"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig1"] : " " . $_SESSION['par_assig1'] . "";
   $tab_ger_campos['asig2'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig2'] = "asig2";
       $tab_converte["asig2"]   = "asig2";
   }
   else
   {
       $tab_def_campos['asig2'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig2]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig2]'"]   = "asig2";
   }
   $tab_labels["asig2"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig2"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig2"] : " " . $_SESSION['par_assig2'] . "";
   $tab_ger_campos['asig3'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig3'] = "asig3";
       $tab_converte["asig3"]   = "asig3";
   }
   else
   {
       $tab_def_campos['asig3'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig3]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig3]'"]   = "asig3";
   }
   $tab_labels["asig3"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig3"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig3"] : " " . $_SESSION['par_assig3'] . " ";
   $tab_ger_campos['asig4'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig4'] = "asig4";
       $tab_converte["asig4"]   = "asig4";
   }
   else
   {
       $tab_def_campos['asig4'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig4]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig4]'"]   = "asig4";
   }
   $tab_labels["asig4"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig4"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig4"] : "" . $_SESSION['par_assig4'] . "";
   $tab_ger_campos['asig5'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig5'] = "asig5";
       $tab_converte["asig5"]   = "asig5";
   }
   else
   {
       $tab_def_campos['asig5'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig5]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig5]'"]   = "asig5";
   }
   $tab_labels["asig5"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig5"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig5"] : "" . $_SESSION['par_assig5'] . "";
   $tab_ger_campos['asig6'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig6'] = "asig6";
       $tab_converte["asig6"]   = "asig6";
   }
   else
   {
       $tab_def_campos['asig6'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig6]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig6]'"]   = "asig6";
   }
   $tab_labels["asig6"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig6"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig6"] : "" . $_SESSION['par_assig6'] . "";
   $tab_ger_campos['asig7'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig7'] = "asig7";
       $tab_converte["asig7"]   = "asig7";
   }
   else
   {
       $tab_def_campos['asig7'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig7]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig7]'"]   = "asig7";
   }
   $tab_labels["asig7"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig7"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig7"] : "" . $_SESSION['par_assig7'] . "";
   $tab_ger_campos['asig8'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig8'] = "asig8";
       $tab_converte["asig8"]   = "asig8";
   }
   else
   {
       $tab_def_campos['asig8'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig8]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig8]'"]   = "asig8";
   }
   $tab_labels["asig8"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig8"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig8"] : "" . $_SESSION['par_assig8'] . "";
   $tab_ger_campos['asig9'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig9'] = "asig9";
       $tab_converte["asig9"]   = "asig9";
   }
   else
   {
       $tab_def_campos['asig9'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig9]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig9]'"]   = "asig9";
   }
   $tab_labels["asig9"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig9"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig9"] : "" . $_SESSION['par_assig9'] . "";
   $tab_ger_campos['asig10'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig10'] = "asig10";
       $tab_converte["asig10"]   = "asig10";
   }
   else
   {
       $tab_def_campos['asig10'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig10]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig10]'"]   = "asig10";
   }
   $tab_labels["asig10"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig10"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig10"] : "" . $_SESSION['par_assig10'] . "";
   $tab_ger_campos['asig11'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig11'] = "asig11";
       $tab_converte["asig11"]   = "asig11";
   }
   else
   {
       $tab_def_campos['asig11'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig11]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig11]'"]   = "asig11";
   }
   $tab_labels["asig11"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig11"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig11"] : "" . $_SESSION['par_assig11'] . "";
   $tab_ger_campos['asig12'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig12'] = "asig12";
       $tab_converte["asig12"]   = "asig12";
   }
   else
   {
       $tab_def_campos['asig12'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig12]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig12]'"]   = "asig12";
   }
   $tab_labels["asig12"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig12"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig12"] : "" . $_SESSION['par_assig12'] . "";
   $tab_ger_campos['asig13'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig13'] = "asig13";
       $tab_converte["asig13"]   = "asig13";
   }
   else
   {
       $tab_def_campos['asig13'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig13]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig13]'"]   = "asig13";
   }
   $tab_labels["asig13"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig13"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig13"] : "" . $_SESSION['par_assig13'] . "";
   $tab_ger_campos['asig14'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig14'] = "asig14";
       $tab_converte["asig14"]   = "asig14";
   }
   else
   {
       $tab_def_campos['asig14'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig14]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig14]'"]   = "asig14";
   }
   $tab_labels["asig14"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig14"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig14"] : "" . $_SESSION['par_assig14'] . "";
   $tab_ger_campos['asig15'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig15'] = "asig15";
       $tab_converte["asig15"]   = "asig15";
   }
   else
   {
       $tab_def_campos['asig15'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig15]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig15]'"]   = "asig15";
   }
   $tab_labels["asig15"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig15"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig15"] : "" . $_SESSION['par_assig15'] . "";
   $tab_ger_campos['asig16'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig16'] = "asig16";
       $tab_converte["asig16"]   = "asig16";
   }
   else
   {
       $tab_def_campos['asig16'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig16]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig16]'"]   = "asig16";
   }
   $tab_labels["asig16"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig16"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig16"] : "" . $_SESSION['par_assig16'] . "";
   $tab_ger_campos['asig17'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig17'] = "asig17";
       $tab_converte["asig17"]   = "asig17";
   }
   else
   {
       $tab_def_campos['asig17'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig17]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig17]'"]   = "asig17";
   }
   $tab_labels["asig17"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig17"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig17"] : "" . $_SESSION['par_assig17'] . "";
   $tab_ger_campos['asig18'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig18'] = "asig18";
       $tab_converte["asig18"]   = "asig18";
   }
   else
   {
       $tab_def_campos['asig18'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig18]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig18]'"]   = "asig18";
   }
   $tab_labels["asig18"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig18"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig18"] : "" . $_SESSION['par_assig18'] . "";
   $tab_ger_campos['asig19'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig19'] = "asig19";
       $tab_converte["asig19"]   = "asig19";
   }
   else
   {
       $tab_def_campos['asig19'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig19]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig19]'"]   = "asig19";
   }
   $tab_labels["asig19"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig19"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig19"] : "" . $_SESSION['par_assig19'] . "";
   $tab_ger_campos['asig20'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig20'] = "asig20";
       $tab_converte["asig20"]   = "asig20";
   }
   else
   {
       $tab_def_campos['asig20'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig20]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig20]'"]   = "asig20";
   }
   $tab_labels["asig20"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig20"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig20"] : "" . $_SESSION['par_assig20'] . "";
   $tab_ger_campos['asig21'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig21'] = "asig21";
       $tab_converte["asig21"]   = "asig21";
   }
   else
   {
       $tab_def_campos['asig21'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig21]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig21]'"]   = "asig21";
   }
   $tab_labels["asig21"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig21"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig21"] : "" . $_SESSION['par_assig21'] . "";
   $tab_ger_campos['asig22'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig22'] = "asig22";
       $tab_converte["asig22"]   = "asig22";
   }
   else
   {
       $tab_def_campos['asig22'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig22]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig22]'"]   = "asig22";
   }
   $tab_labels["asig22"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig22"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig22"] : "" . $_SESSION['par_assig22'] . "";
   $tab_ger_campos['asig23'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig23'] = "asig23";
       $tab_converte["asig23"]   = "asig23";
   }
   else
   {
       $tab_def_campos['asig23'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig23]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig23]'"]   = "asig23";
   }
   $tab_labels["asig23"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig23"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig23"] : "" . $_SESSION['par_assig23'] . "";
   $tab_ger_campos['asig24'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig24'] = "asig24";
       $tab_converte["asig24"]   = "asig24";
   }
   else
   {
       $tab_def_campos['asig24'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig24]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig24]'"]   = "asig24";
   }
   $tab_labels["asig24"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig24"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig24"] : "" . $_SESSION['par_assig24'] . "";
   $tab_ger_campos['asig25'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig25'] = "asig25";
       $tab_converte["asig25"]   = "asig25";
   }
   else
   {
       $tab_def_campos['asig25'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig25]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig25]'"]   = "asig25";
   }
   $tab_labels["asig25"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig25"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig25"] : "" . $_SESSION['par_assig25'] . "";
   $tab_ger_campos['asig26'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig26'] = "asig26";
       $tab_converte["asig26"]   = "asig26";
   }
   else
   {
       $tab_def_campos['asig26'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig26]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig26]'"]   = "asig26";
   }
   $tab_labels["asig26"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig26"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig26"] : " " . $_SESSION['par_assig26'] . "";
   $tab_ger_campos['asig27'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig27'] = "asig27";
       $tab_converte["asig27"]   = "asig27";
   }
   else
   {
       $tab_def_campos['asig27'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig27]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig27]'"]   = "asig27";
   }
   $tab_labels["asig27"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig27"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig27"] : " " . $_SESSION['par_assig27'] . "";
   $tab_ger_campos['asig28'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig28'] = "asig28";
       $tab_converte["asig28"]   = "asig28";
   }
   else
   {
       $tab_def_campos['asig28'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig28]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig28]'"]   = "asig28";
   }
   $tab_labels["asig28"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig28"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig28"] : "" . $_SESSION['par_assig28'] . "";
   $tab_ger_campos['asig29'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig29'] = "asig29";
       $tab_converte["asig29"]   = "asig29";
   }
   else
   {
       $tab_def_campos['asig29'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig29]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig29]'"]   = "asig29";
   }
   $tab_labels["asig29"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig29"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig29"] : "" . $_SESSION['par_assig29'] . "";
   $tab_ger_campos['asig30'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['asig30'] = "asig30";
       $tab_converte["asig30"]   = "asig30";
   }
   else
   {
       $tab_def_campos['asig30'] = "SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig30]'";
       $tab_converte["SELECT eval_1_per 
FROM t_evaluacion 
WHERE id_estudiante = '{id_estudiante}' AND id_asignatura = '[par_id_asig30]'"]   = "asig30";
   }
   $tab_labels["asig30"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig30"])) ? $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['labels']["asig30"] : "" . $_SESSION['par_assig30'] . "";
   $tab_ger_campos['asig1'] = "none";
   $tab_ger_campos['asig2'] = "none";
   $tab_ger_campos['asig3'] = "none";
   $tab_ger_campos['asig4'] = "none";
   $tab_ger_campos['asig5'] = "none";
   $tab_ger_campos['asig6'] = "none";
   $tab_ger_campos['asig7'] = "none";
   $tab_ger_campos['asig8'] = "none";
   $tab_ger_campos['asig9'] = "none";
   $tab_ger_campos['asig10'] = "none";
   $tab_ger_campos['asig11'] = "none";
   $tab_ger_campos['asig12'] = "none";
   $tab_ger_campos['asig13'] = "none";
   $tab_ger_campos['asig14'] = "none";
   $tab_ger_campos['asig15'] = "none";
   $tab_ger_campos['asig16'] = "none";
   $tab_ger_campos['asig17'] = "none";
   $tab_ger_campos['asig18'] = "none";
   $tab_ger_campos['asig19'] = "none";
   $tab_ger_campos['asig20'] = "none";
   $tab_ger_campos['asig21'] = "none";
   $tab_ger_campos['asig22'] = "none";
   $tab_ger_campos['asig23'] = "none";
   $tab_ger_campos['asig24'] = "none";
   $tab_ger_campos['asig25'] = "none";
   $tab_ger_campos['asig26'] = "none";
   $tab_ger_campos['asig27'] = "none";
   $tab_ger_campos['asig28'] = "none";
   $tab_ger_campos['asig29'] = "none";
   $tab_ger_campos['asig30'] = "none";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_general']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_general']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_t_evaluacion_general']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['ordem_select']))
   {
       $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['ordem_select'] = array();
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
   $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['ordem_select'] = array();
   $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['ordem_grid']   = "";
   $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['ordem_cmp']    = "";
   foreach ($campos_sel as $campo_sort)
   {
       $ordem = (substr($campo_sort, 0, 1) == "+") ? "asc" : "desc";
       $campo = substr($campo_sort, 1);
       if (isset($tab_converte[$campo]))
       {
           $_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['ordem_select'][$campo] = $ordem;
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
   $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "evaluacion/evaluacion";
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
 <TITLE> <?php echo $_SESSION['par_nombre_institucion'] ?></TITLE>
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
    url: "grid_t_evaluacion_general_order_campos.php",
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
           if (!isset($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['ordem_select'][$tab_def_campos[$NM_cada_field]]))
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
   foreach ($_SESSION['sc_session'][$sc_init]['grid_t_evaluacion_general']['ordem_select'] as $NM_cada_field => $NM_cada_opc)
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
