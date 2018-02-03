<?php
include_once('control_matricular_session.php');
@session_start() ;
class control_matricular_help
{
    function control_matricular_help()
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
        if ($nm_cod_campo ==  "grado")
        {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

    if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
    {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
    }

?>
 <link rel="stylesheet" href="<?php echo $_GET['help_css'] ?>" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $_GET['help_css']) ?>" type="text/css" media="screen" />
</head>
<body class="scFormHelpPage">
<?php echo "<b>Grado</b><br>" . nl2br("Grado en el cual se va a hacer la matricula"); ?>
</body>
</html>
<?php
        }
        if ($nm_cod_campo ==  "semestre")
        {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

    if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
    {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
    }

?>
 <link rel="stylesheet" href="<?php echo $_GET['help_css'] ?>" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $_GET['help_css']) ?>" type="text/css" media="screen" />
</head>
<body class="scFormHelpPage">
<?php echo "<b>Semestre</b><br>" . nl2br("Semestre para el cual se va a hacer la matricula"); ?>
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
$exec_help = new control_matricular_help();
?>
