<?php
   include_once('grid_grupo_x_asig_x_doce_1_normal_cero_session.php');
   session_start();
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
    $Ord_Cmp = new grid_grupo_x_asig_x_doce_1_normal_cero_Ord_cmp(); 
    $Ord_Cmp->Ord_cmp_init();
   
class grid_grupo_x_asig_x_doce_1_normal_cero_Ord_cmp
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
   $tab_ger_campos['nom_estudiante'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['nom_estudiante'] = "nom_estudiante";
       $tab_converte["nom_estudiante"]   = "nom_estudiante";
   }
   else
   {
       $tab_def_campos['nom_estudiante'] = "CONCAT_WS(' ',students.primer_apellido,students.segundo_apellido,students.primer_nombre,students.segundo_nombre)";
       $tab_converte["CONCAT_WS(' ',students.primer_apellido,students.segundo_apellido,students.primer_nombre,students.segundo_nombre)"]   = "nom_estudiante";
   }
   $tab_labels["nom_estudiante"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["nom_estudiante"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["nom_estudiante"] : "Nombres y Apellidos";
   $tab_ger_campos['est'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['est'] = "est";
       $tab_converte["est"]   = "est";
   }
   else
   {
       $tab_def_campos['est'] = "";
       $tab_converte[""]   = "est";
   }
   $tab_labels["est"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["est"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["est"] : "Est";
   $tab_ger_campos['novedades_x_estudiante_fecha_id_novedad'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['novedades_x_estudiante_fecha_id_novedad'] = "cmp_maior_30_1";
       $tab_converte["cmp_maior_30_1"]   = "novedades_x_estudiante_fecha_id_novedad";
   }
   else
   {
       $tab_def_campos['novedades_x_estudiante_fecha_id_novedad'] = "novedades_x_estudiante_fecha.id_novedad";
       $tab_converte["novedades_x_estudiante_fecha.id_novedad"]   = "novedades_x_estudiante_fecha_id_novedad";
   }
   $tab_labels["novedades_x_estudiante_fecha_id_novedad"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["novedades_x_estudiante_fecha_id_novedad"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["novedades_x_estudiante_fecha_id_novedad"] : "Nov";
   $tab_ger_campos['fa'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['fa'] = "fa";
       $tab_converte["fa"]   = "fa";
   }
   else
   {
       $tab_def_campos['fa'] = "";
       $tab_converte[""]   = "fa";
   }
   $tab_labels["fa"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["fa"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["fa"] : "FA";
   $tab_ger_campos['re'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['re'] = "re";
       $tab_converte["re"]   = "re";
   }
   else
   {
       $tab_def_campos['re'] = "";
       $tab_converte[""]   = "re";
   }
   $tab_labels["re"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["re"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["re"] : "RE";
   $tab_ger_campos['p1'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['p1'] = "p1";
       $tab_converte["p1"]   = "p1";
   }
   else
   {
       $tab_def_campos['p1'] = "";
       $tab_converte[""]   = "p1";
   }
   $tab_labels["p1"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["p1"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["p1"] : "P1";
   $tab_ger_campos['p2'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['p2'] = "p2";
       $tab_converte["p2"]   = "p2";
   }
   else
   {
       $tab_def_campos['p2'] = "";
       $tab_converte[""]   = "p2";
   }
   $tab_labels["p2"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["p2"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["p2"] : "P2";
   $tab_ger_campos['p3'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['p3'] = "p3";
       $tab_converte["p3"]   = "p3";
   }
   else
   {
       $tab_def_campos['p3'] = "";
       $tab_converte[""]   = "p3";
   }
   $tab_labels["p3"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["p3"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["p3"] : "P3";
   $tab_ger_campos['p4'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['p4'] = "p4";
       $tab_converte["p4"]   = "p4";
   }
   else
   {
       $tab_def_campos['p4'] = "";
       $tab_converte[""]   = "p4";
   }
   $tab_labels["p4"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["p4"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["p4"] : "P4";
   $tab_ger_campos['vac'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['vac'] = "vac";
       $tab_converte["vac"]   = "vac";
   }
   else
   {
       $tab_def_campos['vac'] = "";
       $tab_converte[""]   = "vac";
   }
   $tab_labels["vac"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["vac"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["vac"] : "Vac";
   $tab_ger_campos['vra'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['vra'] = "vra";
       $tab_converte["vra"]   = "vra";
   }
   else
   {
       $tab_def_campos['vra'] = "";
       $tab_converte[""]   = "vra";
   }
   $tab_labels["vra"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["vra"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["vra"] : "VRa";
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
   $tab_labels["col1"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col1"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col1"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
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
   $tab_labels["col2"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col2"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col2"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
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
   $tab_labels["col3"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col3"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col3"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
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
   $tab_labels["col4"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col4"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col4"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
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
   $tab_labels["col5"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col5"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col5"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
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
   $tab_labels["col6"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col6"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col6"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
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
   $tab_labels["col7"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col7"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col7"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
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
   $tab_labels["col8"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col8"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col8"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
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
   $tab_labels["col9"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col9"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col9"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
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
   $tab_labels["col10"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col10"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["col10"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['par'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['par'] = "par";
       $tab_converte["par"]   = "par";
   }
   else
   {
       $tab_def_campos['par'] = "";
       $tab_converte[""]   = "par";
   }
   $tab_labels["par"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["par"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["par"] : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   $tab_ger_campos['val'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['val'] = "val";
       $tab_converte["val"]   = "val";
   }
   else
   {
       $tab_def_campos['val'] = "";
       $tab_converte[""]   = "val";
   }
   $tab_labels["val"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["val"])) ? $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['labels']["val"] : "Val";
   $tab_ger_campos['est'] = "none";
   $tab_ger_campos['fa'] = "none";
   $tab_ger_campos['re'] = "none";
   $tab_ger_campos['p1'] = "none";
   $tab_ger_campos['p2'] = "none";
   $tab_ger_campos['p3'] = "none";
   $tab_ger_campos['p4'] = "none";
   $tab_ger_campos['vac'] = "none";
   $tab_ger_campos['vra'] = "none";
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
   $tab_ger_campos['par'] = "none";
   $tab_ger_campos['val'] = "none";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_1_normal_cero']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_1_normal_cero']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_grupo_x_asig_x_doce_1_normal_cero']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_select']))
   {
       $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_select'] = array();
   }
   
   if ($fsel_ok == "cmp")
   {
       $this->Sel_processa_out_sel($campos_sel);
   }
   if ($fsel_ok == "regra" && !empty($sel_regra))
   {
       $this->Sel_processa_out_regr($sel_regra);
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
   $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_select'] = array();
   $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_grid']   = "";
   $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_cmp']    = "";
   foreach ($campos_sel as $campo_sort)
   {
       $ordem = (substr($campo_sort, 0, 1) == "+") ? "asc" : "desc";
       $campo = substr($campo_sort, 1);
       if (isset($tab_converte[$campo]))
       {
           $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_select'][$campo] = $ordem;
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
   
function Sel_processa_out_regr($sel_regra)
{
   global $sc_init, $tab_converte, $embbed;
   $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_select']  = array();
   $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_grid']    = "";
   $regras_ord = explode("#_fld_#", $sel_regra);
   foreach ($regras_ord as $cada_regra)
   {
       $campo_regra = explode(";", $cada_regra);
       $ordem = ($campo_regra[0] == "+") ? "asc" : "desc";
       $campo = $campo_regra[2];
       if (isset($tab_converte[$campo]))
       {
           $_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_select'][$campo] = $ordem;
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
    url: "grid_grupo_x_asig_x_doce_1_normal_cero_order_campos.php",
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
    <tr>
    <td colspan=5>
     <select  name="sel_regra" id="id_sel_regra_sel_ord" size=1 class="scAppDivToolbarInput">
       <OPTION value="+;40;nom_estudiante">Estudiantes</OPTION>
    </select>
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bok", "document.Fsel_ord.fsel_ok.value='regra';Fsel_ord.submit()", "document.Fsel_ord.fsel_ok.value='regra';Fsel_ord.submit()", "f_sub_regr", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bapply", "scSubmitOrderCampos('" . NM_encode_input($tbar_pos) . "', 'regra')", "scSubmitOrderCampos('" . NM_encode_input($tbar_pos) . "', 'regra')", "f_sub_regr", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
     <br />
     <br />
    </td>
   </tr>
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
           if (!isset($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_select'][$tab_def_campos[$NM_cada_field]]))
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
   foreach ($_SESSION['sc_session'][$sc_init]['grid_grupo_x_asig_x_doce_1_normal_cero']['ordem_select'] as $NM_cada_field => $NM_cada_opc)
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
