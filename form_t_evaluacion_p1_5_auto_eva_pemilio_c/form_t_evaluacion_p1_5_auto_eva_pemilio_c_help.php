<?php
include_once('form_t_evaluacion_p1_5_auto_eva_pemilio_c_session.php');
@session_start() ;
class form_t_evaluacion_p1_5_auto_eva_pemilio_c_help
{
    function form_t_evaluacion_p1_5_auto_eva_pemilio_c_help()
    {
        global $language, $nm_cod_campo;
        ini_set('default_charset', $_SESSION['scriptcase']['charset']);
        include($language . ".lang.php");
        if (!function_exists("NM_is_utf8"))
        {
             include_once("../_lib/lib/php/nm_utf8.php");
        }
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
        if ($nm_cod_campo ==  "dc5_")
        {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <link rel="stylesheet" href="<?php echo $_GET['help_css'] ?>" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $_GET['help_css']) ?>" type="text/css" media="screen" />
</head>
<body class="scFormHelpPage">
<?php echo "<b>" . $_SESSION['par_cod_desemp5'] . "</b><br>" . nl2br(" " . $_SESSION['par_desmpeno5'] . ""); ?>
</body>
</html>
<?php
        }
    }
}
if (!empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        $$nmgp_var = $nmgp_val;
    }
}
$exec_help = new form_t_evaluacion_p1_5_auto_eva_pemilio_c_help();
?>
