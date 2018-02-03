<?php
 @session_start();
 $script_case_init = (isset($_GET['script_case_init'])) ? $_GET['script_case_init'] : "";
 $path_botoes      = (isset($_GET['path_botoes']))      ? $_GET['path_botoes']      : "";
 $apl_dependente   = (isset($_GET['apl_dependente']))   ? $_GET['apl_dependente']   : "";
 $apl_opcao        = (isset($_GET['opcao']))            ? $_GET['opcao']            : "print";
 $apl_atual        = (isset($_GET['apl_prt']))          ? $_GET['apl_prt']          : "index.php";
 $apl_cor_print    = (isset($_GET['cor_print']))        ? $_GET['cor_print']        : "PB";
 $apl_pag_ativa    = (isset($_GET['SC_Pdf_pag_ativa'])) ? $_GET['SC_Pdf_pag_ativa'] : "";
 $apl_tipo_print   =  "RC";
 $apl_saida        = (isset($_GET['apl_saida']))        ? $_GET['apl_saida']        : "";
?>
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
  <title>form_t_evaluacion_p1_m2_v1 :: PRINT</title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
  <META http-equiv="Pragma" content="no-cache">
 </head>
 <body>
  <form name="Fini" method="post" 
        action="<?php echo $apl_atual ?>" 
        target="_self"> 
    <input type="hidden" name="nmgp_opcao" value="<?php echo $apl_opcao;?>"/> 
    <input type="hidden" name="nmgp_tipo_print" value="<?php echo $apl_tipo_print;?>"/> 
    <input type="hidden" name="nmgp_cor_print" value="<?php echo $apl_cor_print;?>"/> 
    <input type="hidden" name="SC_Pdf_pag_ativa" value="<?php echo $apl_pag_ativa;?>"/> 
    <input type="hidden" name="nmgp_navegator_print" value=""/> 
    <input type="hidden" name="script_case_init" value="<?php echo $script_case_init ?>"/> 
    <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>"> 
  </form> 
 <script>
    document.Fini.nmgp_navegator_print.value = navigator.appName;
    document.Fini.submit();
 </script>
 </body>
</html>
